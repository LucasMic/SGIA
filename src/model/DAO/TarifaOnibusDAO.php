<?php
/**
 * Classe TarifaOnibusDAO
 * Camada de acesso a dados da entidade TarifaOnibus
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class TarifaOnibusDAO {
		
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
				self::$instancia = new TarifaOnibusDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return TarifaOnibus
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(sigla, valor, sede_id) VALUES('".$obj->getSigla()."',
																				   '".$obj->getvalor()."',
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
		 * @return TarifaOnibus
		 */
		public function editar($obj){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET sigla = '".$obj->getSigla()."',
													valor =	'".$obj->getValor()."',
													sede_id = '".$obj->getSede()->getId()."'
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
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar($sede){
			// INSTRUCAO SQL //
			$sql = "SELECT a.* FROM " . self::TABELA . " a WHERE a.sede_id = '".$sede."' ORDER BY a.login";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}

	}
?>