<?php
/**
 * Classe SalarioDAO
 * Camada de acesso a dados da entidade Salario
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class SalarioDAO {
		
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
				self::$instancia = new SalarioDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Salario
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(data,valor,colaboradores_id) VALUES('".formataData($obj->getData())."',
																				   '".$obj->getValor()."',
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
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar($idColaborador){
			// INSTRUCAO SQL //
			$sql = "SELECT s.* FROM " . self::TABELA . " s WHERE s.colaboradores_id = '".$idColaborador."' ORDER BY s.data DESC";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		

	}
?>