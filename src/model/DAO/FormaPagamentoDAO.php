<?php
/**
 * Classe FormaPagamentoDAO
 * Camada de acesso a dados da entidade FormaPagamento
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class FormaPagamentoDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'pagamentos_formas';

		/**
		 * Metodo construtor()
		 */
		private function __construct(){	
			$this->conexao = Connect::getInstancia();
		}
		
		/**
		 * Metodo getInstancia()
		 */
		public static function getInstancia(){
			if(!isset(self::$instancia))
				self::$instancia = new FormaPagamentoDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return fetch_assoc
		 */
		public function buscar($id){
			// INSTRUCAO SQL //
			$sql = "SELECT p.* FROM " . self::TABELA . " p WHERE p.id = '".$id."'";
			// EXECUTANDO A SQL //					
			$resultado = $this->conexao->fetch($sql);			
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		/**
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar(){
			// INSTRUCAO SQL //
			$sql = "SELECT p.* FROM " . self::TABELA . " p ORDER BY p.nome";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
	}
?>