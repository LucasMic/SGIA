<?php
/**
 * Classe CursoValoresDAO
 * Camada de acesso a dados da entidade CursoValores
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class CursoValoresDAO {

		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;
		const TABELA = 'cursos_valores';

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
				self::$instancia = new CursoValoresDAO();
			return self::$instancia;
		}

		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Curso
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //

			$ValorFormatado = gravandoValorNoBanco($obj->getValor);

			$sql = "INSERT INTO " . self::TABELA . "(cursos_id, valor, data) VALUES(
														'".$obj->getCursosId()."',
														'".$ValorFormatado."',
                                                        '".formataData($obj->getData())."')";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);

			// TRATANDO O RESULTADO //
			if($resultado){
				// RETORNANDO O RESULTADO //
				return $obj;
			}

		}

		/**
		 * Metodo editar($obj)
		 * @param $obj
		 * @return Curso
		 */
		public function editar($obj){
			// INSTRUCAO SQL //
			$ValorFormatado = gravandoValorNoBanco($obj->getValor);
			$sql = "UPDATE " . self::TABELA . " SET cursos_id = '".$obj->getCursosId()."',
													valor =	'".$ValorFormatado."',
													data = '".formataData($obj->getData())."'
					WHERE id = '".$obj->getId()."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);

			if($resultado){
			// RETORNANDO O RESULTADO //
			return $resultado;
			}
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
			$resultado = $this->conexao->fetch($sql);
			return $resultado;
		}


		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return fetch_assoc
		 */
		public function buscar($id){
			// INSTRUCAO SQL //
			$sql = "SELECT c.* FROM " . self::TABELA . " c WHERE c.id = '".$id."' ";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}

		/**
		 * Metodo buscarCursoId($id)
		 * @param $id
		 * @return fetch_assoc
		 */
		public function buscarCursoId($id){
			// INSTRUCAO SQL //
			$sql = "SELECT c.* FROM " . self::TABELA . " c WHERE c.cursos_id = '".$id."' ";
			//EXECUTANDO A SQL //
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
			$sql = "SELECT c.* FROM " . self::TABELA . " c WHERE sedes_id = '".$sede."' ORDER BY c.nome";
			// EXECUTANDO A SQL //

			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
	} ?>