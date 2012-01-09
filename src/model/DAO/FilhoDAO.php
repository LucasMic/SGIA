<?php
/**
 * Classe FilhoDAO
 * Camada de acesso a dados da entidade Usuario
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class FilhoDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'filhos_colaboradores';

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
				self::$instancia = new FilhoDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Filho
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(nome, pensao, data_nascimento, colaboradores_id) VALUES('".$obj->getNome()."',
																				   '".gravandoValorNoBanco($obj->getPensao())."',
																				   '".formataData($obj->getDataNascimento())."',
																				   '".$obj->getPai()->getId()."')";
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
		 * @return Filho
		 */
		public function editar($obj){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET nome = '".$obj->getNome()."',
													pensao = '".gravandoValorNoBanco($obj->getPensao())."',
													data_nascimento = '".formataData($obj->getDataNascimento())."',
													colaboradores_id = '".$obj->getPai()->getId()."'
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
			$sql = "SELECT f.* FROM " . self::TABELA . " f WHERE f.id = '".$id."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		/**
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar($id){
			// INSTRUCAO SQL //
			$sql = "SELECT f.* FROM " . self::TABELA . " f WHERE colaboradores_id = '".$id."' ORDER BY f.nome";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}

	}
?>