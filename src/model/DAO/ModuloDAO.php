<?php
/**
 * Classe ModuloDAO
 * Camada de acesso a dados da entidade Modulo
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class ModuloDAO {

		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'modulos';

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
				self::$instancia = new ModuloDAO();
			return self::$instancia;
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
		
		/**
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar(){
			// INSTRUCAO SQL //
			$sql = "SELECT m.* FROM " . self::TABELA . " m ORDER BY m.nome";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}

	}
?>