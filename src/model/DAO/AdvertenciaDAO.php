<?php
/**
 * Classe AdvertenciaDAO
 * Camada de acesso a dados da entidade Advertencia
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class AdvertenciaDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'advertencias';

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
				self::$instancia = new AdvertenciaDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Advertencia
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(data,descricao,anexo, colaboradores_id) 
													VALUES(NOW(),
														   '".$obj->getDescricao()."',
														   '".$obj->getAnexo()."',
														   '".$obj->getColaborador()->getId()."')";
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
		 * @return Advertencia
		 */
		public function editar($obj){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET data = '".$obj->getData()."',
													descricao =	'".$obj->getDescricao()."',
													anexo = '".$obj->getAnexo()."', 
													colaboradores_id = '".$obj->getColaborador()->getId()."'
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
		public function listar($idColaborador){
			// INSTRUCAO SQL //
			$sql = "SELECT a.* FROM " . self::TABELA . " a WHERE a.colaboradores_id = '".$idColaborador."' ORDER BY a.data DESC";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
	}
?>