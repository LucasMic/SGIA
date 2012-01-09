<?php
/**
 * Classe AlunoDAO
 * Camada de acesso a dados da entidade Aluno
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class AlunoDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'alunos';

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
				self::$instancia = new AlunoDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Aluno
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(nome,sexo,rg, orgao_expedidor, cpf, endereco, bairro, cep, 
													cidade, estado, telefone_1, telefone_2, email, escolaridade, 
													profissao, sedes_id) 
													VALUES('".$obj->getNome()."',
														   '".$obj->getSexo()."',
														   '".$obj->getRg()."',
														   '".$obj->getOrgaoExpedidor()."',
														   '".$obj->getCpf()."',
														   '".$obj->getEndereco()."',
														   '".$obj->getBairro()."',
														   '".$obj->getCep()."',
														   '".$obj->getCidade()."',
														   '".$obj->getEstado()."',
														   '".$obj->getTelefone1()."',
														   '".$obj->getTelefone2()."',
														   '".$obj->getEmail()."',
														   '".$obj->getEscolaridade()."',
														   '".$obj->getProfissao()."',
														   '".$obj->getSede()->getId()."')";
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
		 * @return Aluno
		 */
		public function editar($obj){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET nome = '".$obj->getNome()."',
													sexo =	'".$obj->getSexo()."',
													rg =	'".$obj->getRg()."',
													orgao_expedidor =	'".$obj->getOrgaoExpedidor()."',
													cpf =	'".$obj->getCpf()."',
													endereco =	'".$obj->getEndereco()."',
													bairro =	'".$obj->getBairro()."',
													cep =	'".$obj->getCep()."',
													cidade =	'".$obj->getCidade()."',
													estado =	'".$obj->getEstado()."',
													telefone_1 =	'".$obj->getTelefone1()."',
													telefone_2 =	'".$obj->getTelefone2()."',
													email =	'".$obj->getEmail()."',
													escolaridade =	'".$obj->getEscolaridade()."',
													profissao =	'".$obj->getProfissao()."',
													sedes_id = '".$obj->getSede()->getId()."'
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
		public function listar($sede){
			// INSTRUCAO SQL //
			$sql = "SELECT a.* FROM " . self::TABELA . " a WHERE a.sedes_id = '".$sede."' ORDER BY a.nome";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}

	}
?>