<?php
/**
 * Classe CursoDAO
 * Camada de acesso a dados da entidade Curso
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class CursoDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'cursos';

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
				self::$instancia = new CursoDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Curso
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			
			$ValorFormatado = gravandoValorNoBanco($obj->getValorPromocional());
			
			$sql = "INSERT INTO " . self::TABELA . "(nome, data_encerramento, data_encerramento_promocional, valor_promocional, sedes_id) VALUES(
                                                                                   '".$obj->getNome()."',
																				   '".formataData($obj->getDataEncerramento())."',
                                                                                   '".formataData($obj->getDataEncerramentoPromocional())."',
                                                                                   '".$ValorFormatado."',
                                                                                   '".$obj->getSede()->getId()."')";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);
			
			// TRATANDO O RESULTADO //
			if($resultado){
				$obj->setId(mysql_insert_id());
				$sql = "INSERT INTO cursos_valores (cursos_id, valor, data) VALUES('".$obj->getId()."','".gravandoValorNoBanco($obj->getValor())."', NOW())";
				$this->conexao->exec($sql);
			} else {
				$obj = $resultado;	
			} 
			// RETORNANDO O RESULTADO //
			return $obj;
		}
		
		/**
		 * Metodo editar($obj)
		 * @param $obj
		 * @return Curso
		 */
		public function editar($obj){
			// INSTRUCAO SQL //			
			$sql = "UPDATE " . self::TABELA . " SET nome = '".$obj->getNome()."',
													data_encerramento =	'".formataData($obj->getDataEncerramento())."',
                                                    data_encerramento_promocional =	'".formataData($obj->getDataEncerramentoPromocional())."',
                                                    valor_promocional =	'".gravandoValorNoBanco($obj->getValorPromocional())."',
													sedes_id = '".$obj->getSede()->getId()."'
					WHERE id = '".$obj->getId()."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);
			
			if($resultado){
				$sql = "INSERT INTO cursos_valores (cursos_id, valor, data) VALUES('".$obj->getId()."', '".gravandoValorNoBanco($obj->getValor())."', NOW())";
				$this->conexao->exec($sql);
			} else {
				$obj = $resultado;	
			} 
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
			//$sql = "SELECT cursos_id FROM cursos_valores WHERE cursos_id ='" .$id . "'";			
			
			
			$sql = "select * from cursos
					inner join cursos_valores on (cursos.id = cursos_valores.cursos_id)
					inner join matriculas on (cursos_valores.id = matriculas.cursos_valores_id)
					where cursos.id ='" .$id . "'";
			
			$resultado = $this->conexao->fetchAll($sql);		
			
			
			if(!$resultado){
				$sql = "DELETE FROM " . self::TABELA . " WHERE id = '".$id."'";
				// EXECUTANDO A SQL //			
				
				$resultado = $this->conexao->exec($sql);	
			} else {
				$resultado = false;
			}
		
			return $resultado;
		}
		
		
		public function buscarUltimoValor($id){
			$sql = "SELECT id, valor FROM cursos_valores WHERE cursos_id = '".$id."' ORDER by data DESC LIMIT 1";			
			$resultado = $this->conexao->fetchAll($sql);			
			return $resultado;
		}
		
		
		public function buscarValorPromocional($id){
			$sql = "SELECT data_encerramento_promocional, valor_promocional  FROM cursos WHERE id = '".$id."' ORDER by data_encerramento_promocional DESC LIMIT 1";
			$resultado = $this->conexao->fetchAll($sql);			
			return $resultado;
		}
		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return fetch_assoc
		 */
		public function buscar($id){
			// INSTRUCAO SQL//			
			$sql = "SELECT c.* FROM " . self::TABELA . " c WHERE c.id = '".$id."' ";			
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetch($sql);			
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		/**
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar($aluno = 0){
			// INSTRUCAO SQL //
			$sql = "SELECT c.* FROM " . self::TABELA . " c  WHERE sedes_id = '".$_SESSION["sede"]."' ORDER BY c.nome";
			
			if($aluno){
				$sql = "SELECT * FROM cursos WHERE id NOT IN (SELECT c.id FROM cursos c LEFT JOIN cursos_valores cv ON cv.cursos_id = c.id LEFT JOIN matriculas m ON cursos_valores_id = cv.id WHERE m.alunos_id = '".$aluno."') and sedes_id = '".$_SESSION["sede"]."' ORDER by nome";
			}
			// EXECUTANDO A SQL //	
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
	}
?>