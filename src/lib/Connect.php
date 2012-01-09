<?php
/**
 * Classe Connect
 * Classe de conexao com MySQL usando o padrao Singleton
 * @package lib
 * @author Idealizza
 */
	class Connect {

		/**
		 * Atributo referente a instancia da Classe
		 */
		private static $instancia;
		/**
		 * Conexão com o banco
		 */
		private $conexao;

		/**
		 * Método construtor
		 * @return Connect
		 */
 		private function __construct(){
			/**
			 * Carrega informações de configuração a partir do controlador principal do Framework (Singleton)
			 */
			$database = Controll::getControll()->getConfig('database');			
 			/**
			 * Conexão com a base de dados MySQL
			 */
			$this->conexao = @mysql_connect($database['host'], $database['user'], $database['pass']);
			/**
			 * Tratando erros da conexão
			 */
			if(mysql_errno() == 2005)
				throw new ConnectException(ConnectException::SERVIDOR_NAO_ENCONTRADO);
			if(mysql_errno() == 1045)
				throw new ConnectException(ConnectException::USUARIO_OU_SENHA_INVALIDOS);
			/**
			 * Checando se o banco existe
			 */
			if(!mysql_select_db($database['db'], $this->conexao))
				throw new ConnectException(ConnectException::BANCO_NAO_ENCONTRADO);
			/**
			 * Executando a SQL para setar a codificação do retorno das consultas
			 */
			$this->exec('SET NAMES ' . $database['encoding']);
		}
		
		/**
		 * Método getInstancia
		 * @return self::$instancia
		 */
		public static function getInstancia(){
			if(!isset(self::$instancia))
				self::$instancia = new Connect();
			return self::$instancia;
		}
		
		/**
		 * Método _execQuery($sql)
		 * @param $sql
		 * @return boolean
		 */
		private function _execQuery($sql){
			/**
			 * Executando a sql
			 */
			$retorno = mysql_query($sql);
			/**
			 * Checando se a sql levantou algum erro
			 */
			if(mysql_errno() == 1146)
				throw new ConnectException(ConnectException::TABELA_NAO_ENCONTRADA);
			if(mysql_errno() == 1054)
				throw new ConnectException(ConnectException::CAMPO_NAO_ENCONTRADO);
			if(mysql_errno() == 1064)
				throw new ConnectException(ConnectException::SINTAXE_ERRO);
			if(mysql_errno() != 0)
				throw new ConnectException();
			/**
			 * Retornando o resultado
			 */
			return $retorno;
	   	}

		/**
		 * Método exec($sql)
		 * @param $sql
		 * @return boolean
		 */
	   	public function exec($sql){
			return $this->_execQuery($sql);
		}
		
		/**
		 * Método fetch($sql)
		 * @param $sql
		 * @return fetch_assoc
		 */
		public function fetch($sql){
			return mysql_fetch_assoc( $this->exec($sql . " LIMIT 1") );
		}
		
		/**
		 * Método fetchAll($sql)
		 * @param $sql
		 * @return fetch_assoc[]
		 */
		public function fetchAll($sql){
			$exec = $this->exec($sql);
			while($item = mysql_fetch_assoc( $exec )){
				$retorno[] = $item;
			}
			return isset($retorno) ? $retorno : false;
		}

	}
?>