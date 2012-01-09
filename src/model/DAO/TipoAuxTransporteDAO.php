<?php
/**
 * Classe TipoAuxTransporteDAO
 * Camada de acesso a dados da entidade TipoAuxTransporte
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class TipoAuxTransporteDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'aux_transporte_tipo';

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
				self::$instancia = new TipoAuxTransporteDAO();
			return self::$instancia;
		}		
		
		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return TipoAuxTransporte
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			
			$ValorFormatado = gravandoValorNoBanco($obj->getValor());
			
			
			
			$sql = "INSERT INTO " . self::TABELA . "(nome,valor,sedes_id) 
													VALUES('".$obj->getNome()."',
														   '".$ValorFormatado."',
														   '".$obj->getSede()->getId()."')";
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
		 * @return TipoAuxTransporte
		 */
		public function editar($obj){
			// INSTRUCAO SQL //
			
			$ValorFormatado = gravandoValorNoBanco($obj->getValor());
			
			$sql = "UPDATE " . self::TABELA . " SET nome = '".$obj->getNome()."',
													valor =	'".$ValorFormatado."',
													sedes_id = '".$obj->getSede()->getId()."'
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
			$sql = "SELECT a.* FROM " . self::TABELA . " a WHERE a.id = '".$id."'";
			// EXECUTANDO A SQL //		
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		

		/**
		 * Metodo buscarNome($nome)
		 * @param $nome
		 * @return fetch_assoc
		 */
		public function buscarNome($obj){
			// INSTRUCAO SQL //
			$sql = "SELECT a.* FROM " . self::TABELA . " a WHERE a.nome = '".$obj->getNome()."'";
			// EXECUTANDO A SQL //			
		$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}		
		
				
		/**
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar($sede){
			// INSTRUCAO SQL //
			$sql = "SELECT a.* FROM " . self::TABELA . " a WHERE a.sedes_id = '".$sede."' ORDER BY a.nome";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
	
	}
?>