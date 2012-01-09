<?php
/**
 * Classe Matricula
 * @package model
 * @author Idealizza
 */
	class Matricula {

		/**
		 * Atributos
		 */
		private $id;
		private $cursoValores;
		private $aluno;
		private $situacao;
		private $autorizadoPor;
        private $contratoAssinado;



        function __construct($id = 0, CursoValores $cursoValores = null, Aluno $aluno = null, $situacao = "", $autorizadoPor = null, $contratoAssinado = "") {
            $this->id = $id;
            $this->cursoValores = $cursoValores;
            $this->aluno = $aluno;
            $this->situacao = $situacao;
            $this->autorizadoPor = $autorizadoPor;
            $this->contratoAssinado = $contratoAssinado;

        }

		/**
		 * Metodo inserir()
		 * @return Matricula
		 */
		public function inserir(){
			// validando os campos //
			$instancia = MatriculaDAO::getInstancia();
			// executando o metodo //
			$matricula = $instancia->inserir($this);
			// retornando o Matricula //
			return $matricula;
		}

        public function listarPagamentos($id){
			// validando os campos //
			$instancia = MatriculaDAO::getInstancia();
			// executando o metodo //
			$matricula = $instancia->listarPagamentos($id);
			// retornando o Matricula //
			return $matricula;
		}


        public function addPagamento($parcelas, $valor, $tipo){
			// validando os campos //
			$instancia = MatriculaDAO::getInstancia();
			// executando o metodo //
			$matricula = $instancia->addPagamento($this, $parcelas, $valor, $tipo);
			// retornando o Matricula //
			return $matricula;
		}


		/**
		 * Metodo editar()
		 * @return Matricula
		 */
		public function confirmarMatricula(){
			// validando os campos //
			$instancia = MatriculaDAO::getInstancia();
			// executando o metodo //
			$matricula = $instancia->confirmarMatricula($this->getId(), $this->getAutorizadoPor());
			// retornando o Matricula //
			return $matricula;
		}

		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = MatriculaDAO::getInstancia();
			// executando o metodo //
			$matricula = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $matricula;
		}

		/**
		 * Metodo listar()
		 * @return Matricula[]
		 */
		public static function listar($filtroCurso, $filtroStatus){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = MatriculaDAO::getInstancia();
			// executando o metodo //
			$matriculas = $instancia->listar($filtroCurso, $filtroStatus);


			// checando se o retorno foi falso //
			if(!$matriculas)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::MATRICULA);
			// percorrendo os usuarios //
			foreach($matriculas as $matricula){

				// instanciando e jogando dentro da colecao $objetos o Matricula //
				$objetos[] = new Matricula($matricula["id"], CursoValores::buscar($matricula["cursos_valores_id"]),
																Aluno::buscar($matricula["alunos_id"]),
                                                                $matricula["situacao"],
                                                                $matricula["autorizado_por"],
                                                                $matricula["contrato_assinado"]);
			}
			// retornando a colecao $objetos //
			return $objetos;
		}

		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Matricula
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = MatriculaDAO::getInstancia();
			// executando o metodo //
			$matricula = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$matricula)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::MATRICULA);
			// instanciando e retornando o Matricula //

			return new Matricula($matricula["id"],
			                        CursoValores::buscar($matricula["cursos_valores_id"]),
			                        Aluno::buscar($matricula["alunos_id"]),
                                    $matricula["situacao"],
                                    $matricula["autorizado_por"],
                                    $matricula["contrato_assinado"]);
		}



		/**
		 * buscarPorAluno($idAluno)
		 * @param $idUsuario
		 * @return Matricula
		 */
		public static function buscarPorAluno($idAluno){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = MatriculaDAO::getInstancia();
			// executando o metodo //
			$matriculas = $instancia->buscarPorAluno($idAluno);
			// checando se o resultado foi falso //
			if(!$matriculas)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::MATRICULA);
			// instanciando e retornando o Matricula //

			foreach ($matriculas as $matricula){
				$objetos[] = new Matricula($matricula["id"],
											CursoValores::buscar($matricula["cursos_valores_id"]),
											Aluno::buscar($matricula["alunos_id"]),
                                            $matricula["situacao"],
                                            $matricula["autorizado_por"],
                                            $matricula["contrato_assinado"]);
			}
			return $objetos;
		}



		public static function buscarDesconto($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = MatriculaDAO::getInstancia();
			// executando o metodo //
			$matricula = $instancia->buscarDesconto($id);
			// checando se o resultado foi falso //
			if(!$matricula)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::DESCONTO);
			// instanciando e retornando o Matricula //
			return new Desconto($matricula["id"], $matricula["valor"], $matricula["nome"], null);
		}



		public function anexarContrato($_FILES, $caminho_absoluto){

			set_time_limit (0);
			$nome_arquivo = date("dmYHis").$_FILES['contratoAnexo']['name'];
			$arquivo_temporario = $_FILES['contratoAnexo']['tmp_name'];
            if(move_uploaded_file($arquivo_temporario, $caminho_absoluto . DS . $nome_arquivo)) {
					$retorno = "Arquivo anexado com sucesso";
				}
            else
            {
                $retorno = "O arquivo não pode ser copiado para o servidor.";
            }
			return $retorno;
		}
        
        public function addContratoAssinado($idMatricula, $caminhoContrato){       
            // validando os campos //
			$instancia = MatriculaDAO::getInstancia();
			// executando o metodo //
			$matricula = $instancia->addContratoAssinado($idMatricula, $caminhoContrato);
			// retornando o Matricula //
			return $matricula;
        
        
        }

        public function getId(){
        	return $this->id;
        }
        public function setId($id){
        	$this->id = $id;
        }
        public function getCursoValores(){
        	return $this->cursoValores;
        }
        public function setCursoValores(CursoValores $cursoValores){
        	$this->cursoValores = $cursoValores;
        }
        public function getAluno(){
        	return $this->aluno;
        }
        public function setAluno(Aluno $aluno){
        	$this->aluno = $aluno;
        }
        public function getSituacao(){
        	return $this->situacao;
        }
        public function setSituacao($situacao){
        	$this->situacao = $situacao;
        }
        public function getAutorizadoPor(){
            return $this->autorizadoPor;
        }
        public function setAutorizadoPor($autorizadoPor){
            $this->autorizadoPor = $autorizadoPor;
        }        
        public function getContratoAssinado(){
            return $this->contratoAssinado;
        }
        public function setContratoAssinado($contratoAssinado){
            $this->contratoAssinado = $contratoAssinado;
        }

	} ?>