<?php
/**
 * Classe MatriculaDAO
 * Camada de acesso a dados da entidade Matricula
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class MatriculaDAO {

		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;
		const TABELA = 'matriculas';

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
				self::$instancia = new MatriculaDAO();
			return self::$instancia;
		}

		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Matricula
		 */
		public function inserir($obj){
			// INSTRUCAO SQL '".$obj->getParcelas()."', //

			$sql = "INSERT INTO " . self::TABELA . "(alunos_id, cursos_valores_id, situacao, contrato_assinado )VALUES(
						'".$obj->getAluno()->getId()."',
						'".$obj->getCursoValores()->getId()."',
						'".$obj->getSituacao()."',
                        '".$obj->getContratoAssinado()."')";
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
		 * @return Matricula
		 */
		public function confirmarMatricula($id, $autorizadoPor){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET situacao = 1, autorizado_por = ".$autorizadoPor."
					WHERE id = '".$id."'";            
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
			$sql = "SELECT m.* FROM " . self::TABELA . " m WHERE m.id = '".$id."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}




		/**
		 * Metodo buscarPorUsuario($idUsuario)
		 * @param $idUsuario
		 * @return fetch_assoc
		 */
		public function buscarPorAluno($idAlunos){
			// INSTRUCAO SQL //
			$sql = "SELECT m.* FROM " . self::TABELA . " m WHERE m.alunos_id = '".$idAlunos."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchall($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}





		public function buscarDesconto($id){
			// INSTRUCAO SQL //
			$sql = "SELECT d.* FROM descontos d WHERE d.matriculas_id = '".$id."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		/**
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar($filtroCurso = 0, $filtroStatus = 0){
			// INSTRUCAO SQL //
            // so status
            if(($filtroStatus != 0) && ($filtroCurso == 0)){
                $sql = "SELECT m.* FROM " . self::TABELA . " m JOIN alunos a  ON a.id = m.alunos_id WHERE a.sedes_id = '".$_SESSION["sede"]."' and m.situacao =  '".$filtroStatus."' ";
                $sql .= " ORDER BY a.nome";
                
            //so curso    
            }elseif(($filtroCurso != 0) && ($filtroStatus == 0)){
                $sql = "SELECT m.* FROM " . self::TABELA . " m JOIN alunos a  ON a.id = m.alunos_id 
                    JOIN cursos_valores c on m.cursos_valores_id = c.id
                    JOIN cursos d on c.cursos_id = d.id

                WHERE a.sedes_id = '".$_SESSION["sede"]."' and d.id =  '".$filtroCurso."' ";
                $sql .= " ORDER BY a.nome";
                
            //os dois    
            }elseif(($filtroCurso != 0) && ($filtroStatus != 0)){
                $sql = "SELECT m.* FROM " . self::TABELA . " m JOIN alunos a  ON a.id = m.alunos_id 
                    JOIN cursos_valores c on m.cursos_valores_id = c.id
                    JOIN cursos d on c.cursos_id = d.id

                WHERE a.sedes_id = '".$_SESSION["sede"]."' and d.id =  '".$filtroCurso."' and m.situacao =  '".$filtroStatus."' ";
                $sql .= " ORDER BY a.nome";
            }else{
                
                $sql = "SELECT m.* FROM " . self::TABELA . " m JOIN alunos a  ON a.id = m.alunos_id WHERE a.sedes_id = '".$_SESSION["sede"]."' ";
                $sql .= " ORDER BY a.nome";
            }
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}

		/**
		 * Metodo listarPagamentos()
		 * @param $id
		 * @return fetch_assoc[]
		 */
		public function listarPagamentos($id){
			// INSTRUCAO SQL //
			$sql = "SELECT m.* FROM " . self::TABELA . " m where m.alunos_id = '".$id."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
        
        
        /**
		 * Metodo editar($obj)
		 * @param $obj
		 * @return Matricula
		 */
		public function addContratoAssinado($idMatricula, $caminhoContrato){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET contrato_assinado = '".$caminhoContrato."'
					WHERE id = '".$idMatricula."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}

	} ?>