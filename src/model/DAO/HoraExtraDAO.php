<?php
/**
 * Classe HoraExtraDAO
 * Camada de acesso a dados da entidade HoraExtra
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class HoraExtraDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'horas_extras';

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
				self::$instancia = new HoraExtraDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return HoraExtra
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(data,pendentes,pagas, colaboradores_id, tipo_hora_extra_id) VALUES('".formataData($obj->getData())."',
																				   '".$obj->getPendentes()."',
																				   '".$obj->getPagas()."',
																				   '".$obj->getColaborador()->getId()."',
                                                                                   '".$obj->getTipoHoraExtra()->getId()."')";
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
		 * @return HoraExtra
		 */
		public function editar($obj){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET data = '".formataData($obj->getData())."',
													pendentes =	'".$obj->getPendentes()."',
													pagas = '".$obj->getPagas()."', 
													colaboradores_id = '".$obj->getColaborador()->getId()."',
                                                    tipo_hora_extra_id = '".$obj->getTipoHoraExtra()->getId()."'
					WHERE id = '".$obj->getId()."'";
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
			$sql = "SELECT h.* FROM " . self::TABELA . " h WHERE h.id = '".$id."'";
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
			$sql = "SELECT h.* FROM " . self::TABELA . " h WHERE h.colaboradores_id = '".$idColaborador."' ORDER BY h.data DESC";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
        
        public function listarTipos(){
			// INSTRUCAO SQL //
			$sql = "SELECT h.* FROM tipo_hora_extra h ORDER BY h.id ASC";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}

        public function buscarTipo($id){
			// INSTRUCAO SQL //
			$sql = "SELECT h.* FROM tipo_hora_extra h WHERE h.id = '".$id."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}


		
	}
?>