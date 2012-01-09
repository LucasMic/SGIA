<?php
/**
 * Classe PagamentosFormaDAO
 * Camada de acesso a dados da entidade PagamentosForma
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class PagamentosFormaDAO {
		
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
				self::$instancia = new PagamentosFormaDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Matricula
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //			
			$sql = "INSERT INTO " . self::TABELA . "(nome )VALUES('".$obj->getNome()."')";												   
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);			
			// TRATANDO O RESULTADO //
			if($resultado){
				$obj->setId(mysql_insert_id());
			} else {
				$obj = $resultado;	
			} 			
			// RETORNANDO O RESULTADO //
			return $obj;
		}
		
		/**
		 * Metodo excluir($id)
		 * @param $id
		 * @return boolean
		 */
		public function excluir($id){
			// INSTRUCAO SQL //
			$sql = "DELETE FROM " . self::TABELA . " WHERE id = '".$id."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		/**
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar(){
			// INSTRUCAO SQL //
			$sql = "SELECT m.* FROM " . self::TABELA . " m ORDER BY a.nome";
			// EXECUTANDO A SQL //		
			$resultado = $this->conexao->fetchAll($sql);		
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return fetch_assoc
		 */
		public function buscar($id){
			// INSTRUCAO SQL //
			$sql = "SELECT m.* FROM " . self::TABELA . " m WHERE m.id = '".$id."'";			
			// EXECUTANDO A SQL //			
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
	
	}
?>