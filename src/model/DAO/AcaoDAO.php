<?php
/**
 * Classe AcaoDAO
 * Camada de acesso a dados da entidade Ação
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class AcaoDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'acoes';

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
				self::$instancia = new AcaoDAO();
			return self::$instancia;
		}
		
		/**
		 * Metodo buscar($codigo,$modulo)
		 * @param $codigo
		 * @param $modulo
		 * @return fetch_assoc
		 */
		public function buscar($codigo,$modulos){
			// FILTRO //
			$where = array();
			if(!empty($codigo))
				$where[] = " a.codigo = '".$codigo."' ";
			if(!empty($modulos))
				$where[] = " a.id_modulos = '".$modulos."' ";
			$where = (count($where) ? ' WHERE ' . implode(' AND ',$where) : '');	
			// INSTRUCAO SQL //
			$sql = "SELECT a.* FROM " . self::TABELA . " a " . @$where;
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		/**
		 * Metodo listar($filtroModulo)
		 * @param $filtroModulo
		 * @return fetch_assoc[]
		 */
		public function listar($filtroModulo){
			// FILTRO //
			$where = array();
			if(!empty($filtroModulo))
				$where[] = " a.id_modulos = '".$filtroModulo."' ";
			$where = (count($where) ? ' WHERE ' . implode(' AND ',$where) : '');
			// INSTRUCAO SQL //
			$sql = "SELECT a.* FROM " . self::TABELA . " a "
							   . @$where .
							   " ORDER BY a.nome";
                        
                        
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
	}
?>