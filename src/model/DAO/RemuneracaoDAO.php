<?php
/**
 * Classe RemuneracaoDAO
 * Camada de acesso a dados da entidade Remuneracao
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class RemuneracaoDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'salarios';

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
				self::$instancia = new RemuneracaoDAO();
			return self::$instancia;
		}		
		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return fetch_assoc
		 */
		public function buscar($id){
			// INSTRUCAO SQL //
			$sql = "SELECT s.* FROM " . self::TABELA . " s WHERE s.id = '".$id."'";
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
			$sql = "SELECT s.* FROM " . self::TABELA . " s ORDER BY s.login";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		
		public function buscarMinhasSedes($id){
			// INSTRUCAO SQL //
			$sql = "SELECT u.id_sede FROM usuarios_sedes u WHERE u.id_usuario = '".$id."' ";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		/**
		 * Metodo trocarSenha($id,$senhaAtual,$novaSenha)
		 * @param $id
		 * @param $senhaAtual
		 * @param $novaSenha
		 * @return boolean
		 */
		public function trocarSenha($id,$senhaAtual,$novaSenha){
			// checando se a senha atual está correta //
			if(!$this->conexao->fetch("SELECT u.id FROM " . self::TABELA . " u WHERE u.id = '".$id."' AND u.senha = '".md5($senhaAtual)."'"))
				throw new SenhaInvalida();
			// instrução sql //
			$sql = "UPDATE " . self::TABELA . " SET senha = '".md5($novaSenha)."' WHERE id = '".$id."'";
			// executando a sql //
			$resultado = $this->conexao->exec($sql);
			// retornando o resultado //
			return $resultado;
		}

	}
?>