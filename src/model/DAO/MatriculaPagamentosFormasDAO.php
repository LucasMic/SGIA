<?php
/**
 * Classe MareiculaPagamentosFormasDAO
 * @package model/DAO
 * @author Idealizza
 */
	class MatriculaPagamentosFormasDAO {

		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'matr_paga_formas';

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
				self::$instancia = new MatriculaPagamentosFormasDAO();
			return self::$instancia;
		}
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Matricula
		 */
		public function inserir($obj){			
			//testa se o cheque foi passado ou não pra evitar erro de inserção
			if(!$obj->getCheque()){
				$chequeid = "NULL";
			}else{$chequeid = $obj->getCheque()->getId();}			
		
			// INSTRUCAO SQL '".$obj->getParcelas()."', //			
			$sql = "INSERT INTO " . self::TABELA . " (matriculas_id, pagamentos_formas_id,cheques_id, valor, caminho_arquivo, quantidade_parcelas)VALUES(".$obj->getMatricula()->getId().",'".$obj->getPagamentosForma()->getId()."',".$chequeid.",'".$obj->getValor()."','".$obj->getCaminhoArquivo()."','".$obj->getQuantidaDeParcelas()."')";											   

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
			$sql = "SELECT m.* FROM " . self::TABELA . " m WHERE m.id = '".$id."'";
			// EXECUTANDO A SQL //			
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
				
		/**
		 * Metodo buscar($id)
		 * @param $matriculasId
		 * @return fetch_assoc
		 */
		public function listar($matriculasId){
			// INSTRUCAO SQL //
			$sql = "SELECT m.* FROM " . self::TABELA . " m  WHERE m.matriculas_id = '".$matriculasId."'";
			// EXECUTANDO A SQL //		
			$resultado = $this->conexao->fetchAll($sql);		
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
	}
?>