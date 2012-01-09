<?php
/**
 * Classe ChequeDAO
 * Camada de acesso a dados da entidade Cheque
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class ChequeDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'cheques';

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
				self::$instancia = new ChequeDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Cheque
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(situacao,baixa,vencimento, data, valor, agencia, conta, numero_cheque) 
																	VALUES('".$obj->getSituacao()."',
																		   '".$obj->getBaixa()."',
																		   '".formataData($obj->getVencimento())."',
																		   '".$obj->getData()."',
																		   '".gravandoValorNoBanco($obj->getValor())."',
																		   
																		   '".$obj->getAgencia()."',
																		   '".$obj->getConta()."',
																		   '".$obj->getNumeroCheque()."')";
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
		 * @return Cheque
		 */
		public function mudarSituacao($obj){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET situacao = '1'
					WHERE id = '".$obj->getId()."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		public function darBaixa($obj){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET baixa = '1'
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
			$sql = "SELECT u.* FROM " . self::TABELA . " u WHERE u.id = '".$id."'";
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
			$sql = "SELECT c.* FROM " . self::TABELA . " c WHERE c.sedes_id = '".$sede."' ORDER BY c.data ASC";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
	
	}
?>