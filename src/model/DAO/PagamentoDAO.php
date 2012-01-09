<?php
/**
 * Classe PagamentoDAO
 * Camada de acesso a dados da entidade Pagamento
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class PagamentoDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'pagamentos';

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
				self::$instancia = new PagamentoDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Pagamento
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(data,descricao,valor, tipo, anexo, colaboradores_id) 
													VALUES('".formataData($obj->getData())."',
														   '".$obj->getDescricao()."',
														   '".gravandoValorNoBanco($obj->getValor())."',
														   '".$obj->getTipo()->getId()."',
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
		 * Metodo buscar($id)
		 * @param $id
		 * @return fetch_assoc
		 */
		public function buscar($id){
			// INSTRUCAO SQL //
			$sql = "SELECT p.* FROM " . self::TABELA . " p WHERE p.id = '".$id."'";
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
			$sql = "SELECT p.* FROM " . self::TABELA . " p WHERE p.colaboradores_id = '".$idColaborador."' ORDER BY p.data DESC";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		

	}
?>