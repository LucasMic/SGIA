<?php
/**
 * Classe FeriasDAO
 * Camada de acesso a dados da entidade Ferias
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class FeriasDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'ferias';

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
				self::$instancia = new FeriasDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Ferias
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(data, duracao, colaboradores_id) VALUES('".formataData($obj->getData())."',
																				   '" .formataData($obj->getDuracao()). "',
																				   '".$obj->getColaborador()->getId()."')";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);
			return $resultado;
		}
		
		
		/**
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar($idColaborador){
			// INSTRUCAO SQL //
			$sql = "SELECT f.* FROM " . self::TABELA . " f WHERE f.colaboradores_id = '".$idColaborador."' ORDER BY f.data DESC";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return fetch
		 */
		public function buscarPorColaborador($idColaborador){
			// INSTRUCAO SQL //
			$sql = "SELECT c.* FROM " . self::TABELA . " c WHERE c.colaboradores_id  = '".$idColaborador."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}

	}
?>