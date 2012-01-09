<?php
/**
 * Classe TipoPagamentoDAO
 * Camada de acesso a dados da entidade TipoPagamento
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class TipoPagamentoDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'pagamentos_tipo';

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
				self::$instancia = new TipoPagamentoDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return TipoPagamento
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(nome) VALUES('".$obj->getNome()."')";
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
		 * Metodo editar($obj)
		 * @param $obj
		 * @return TipoPagamento
		 */
		public function editar($obj){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET nome = '".$obj->getNome()."'
					WHERE id = '".$obj->getId()."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
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
		 * Metodo buscar($id)
		 * @param $id
		 * @return fetch_assoc
		 */
		public function buscar($id){
			// INSTRUCAO SQL //
			$sql = "SELECT pt.* FROM " . self::TABELA . " pt WHERE pt.id = '".$id."'";
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
			$sql = "SELECT pt.* FROM " . self::TABELA . " pt ORDER BY pt.nome";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
	}
?>