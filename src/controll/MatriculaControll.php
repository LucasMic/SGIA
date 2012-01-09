<?php
/**
 * Classe RhControll
 * Controlador do modulo de rh
 * @package controll
 * @author Idealizza
 */
	class MatriculaControll extends Controll {

		/**
		 * Constante referente ao número do modulo
		 */
		const MODULO = 7;

		/**
		 * Acao index()
		 */
		public function index(){
			// código da ação //
			static $acao = 1;
			// definindo a tela //
			$this->setTela('listar',array('matricula'));
			// guardando a url //
			$this->getPage();
		}

		/**
		 * Acao ver($id)
		 * @param $id
		 */
		public function ver($id){
			// código da ação //
			static $acao = 1;
			// buscando o usuário //
			$matricula = Matricula::buscar($id);
			// jogando o usuário no atributo $dados do controlador //
			$this->setDados($matricula,'VIEW');
			// definindo a tela //
			$this->setTela('ver',array('matricula'));
		}

		/**
		 * Acao add()
		 */
		public function add() {
			// código da ação //
			static $acao = 2;
			// checando se o formulário nao foi passado //

			if(!$this->getDados('POST')) {
                            //  definindo a  tela //
                            $this->setTela('add',array('matricula'));
                        } else {
                            // caso passar o formulário //
                            // chamando o metodo privado _add() passando os dados do post por parametro //
                            $this->_add($this->getDados('POST'));
                        }
		}

		/**
		 * Metodo _add($dados)
		 * @param $dados
		 * @return Usuario
		 */
		private function _add($dados){
			try{
				$cursoValor = CursoValores::buscarCursoId($dados["cursos_id"]);
				$aluno = Aluno::buscar($dados["alunos_id"]);
				$curso = Curso::buscar($dados["cursos_id"]);
				$situacao = "";
				$matricula = new Matricula(0, $cursoValor, $aluno, $situacao);
				$UltimaMatriculaInserida = $matricula->inserir();

				$controladorcheque = true;// para inserir o cheque uma unica vez;
				$caminhoArquivo = "";
				$retornoAnexo = "";

			foreach ($dados["Pagamento"] as $nomeFormaPagamento => $pagamento){
				//identifica o tipo de pagamento
				$pagamentosForma = PagamentosForma::buscar($nomeFormaPagamento);

				//identifica se existe parcelas
				if ($nomeFormaPagamento == 3){
					$quantParcelas = $dados["parcelasCartaoCredito"];
				}
				else{$quantParcelas=0;}

				//identifica se existe arquivo pra upload
				if(isset($_FILES) && ($pagamentosForma->getNome()=="Carta de crédito")){
					$caminhoArquivo = date("Y-m-d").$_FILES["arquivoAnexo"]["name"];
					$retornoAnexo = $matricula->anexarContrato($_FILES, "anexos/anexosCartaCredito");
				}
				else{$caminhoArquivo="";}

				if(($controladorcheque==true) && ($pagamentosForma->getNome() =="Cheque")){// grava pagamento se for cheque
					if(isset($dados['cheques'])){
                   		foreach($dados["cheques"] as $cheque){
                	  		$cheque = new Cheque(0, 0, 0, $cheque["data_vencimento"], date("Y-m-d"), $cheque["valor"], $cheque["agencia"], $cheque["conta"], $cheque["numero_cheque"]);
							$cheque->inserir();
                    		$matriculaPagamentosFormas = new MatriculaPagamentosFormas($id = 0,  $UltimaMatriculaInserida, $pagamentosForma, $cheque, $cheque->getValor(), $caminhoArquivo, $quantParcelas);
                    		$matriculaPagamentosFormas->inserir();
                    	}
                    	$controladorcheque = false;
	                }//fim isset

				}//fim controladorcheque
                else{
                	// grava pagamento que não é cheque
                	$matriculaPagamentosFormas = new MatriculaPagamentosFormas($id = 0,  $UltimaMatriculaInserida, $pagamentosForma, null, $pagamento, $caminhoArquivo, $quantParcelas);
               		$matriculaPagamentosFormas->inserir();
                }
			}//fim for each	$dados["Pagamento"]

			//gerarContratoMatricula($aluno, $curso);

			$this->setFlash('Matrícula cadastrada com sucesso. <br>'.$retornoAnexo);
			// setando a url //
			$this->setPage();

			}catch(CamposObrigatorios $e){
				$this->setFlash($e->getMessage());
				// definindo a tela //
				$this->setTela('add',array('matricula'));
			}
		}


        public function confirmarMatricula(){
			// código da ação //
        	static $acao = 7;
            $dados = $this->getDados("GET");
			// Buscando o usuário //
			$matricula = Matricula::buscar($dados["id"]);
			// checando se o formulário nao foi passado //
			$matricula->setSituacao(1);
			$matricula->setAutorizadoPor($this->getUsuario()->getId());

            if($matricula->confirmarMatricula()){
                echo "ok";
            } else {
                echo "erro";
            }


		}

		/**
		 * Metodo valorCursoGet($_GET)
		 * @param $_GET
		 * @return $valorfinal
		 */
		public function valorCursoGet(){
			$curso = $this->getDados("GET");
			// pega a data atual
			$data = date("Y-m-d");
			$dados = Curso::buscarValorPromocional((int)$curso["id"]);
			$datapromocional =  $dados[0]["data_encerramento_promocional"];
			$valor = $dados[0]["valor_promocional"];

			//se data promocional valida retorna valor da promoção
			if ( $data <= $datapromocional){
				$valorfinal = number_format($valor, 2, ",", ".");
			}
			else{
				// faz a buscarUltimoValor
				$dados2 = Curso::buscarUltimoValor((int)$curso["id"]);
				$val2 = $dados2[0]["valor"];
				$valorfinal = number_format($val2, 2, ",", ".");
			}

			if ($valorfinal){
				echo $valorfinal;
			}else{
				echo "erro";
			}

		}



		/**
		 * Metodo valorCursoId($id)
		 * @param $_GET
		 * @return $valorfinal
		 */
		public function valorCursoId($id){

			// pega a data atual
			$data = date("Y-m-d");
			$dados = Curso::buscarValorPromocional((int)$id);
			$datapromocional =  $dados[0]["data_encerramento_promocional"];
			$valor = $dados[0]["valor_promocional"];

			//se data promocional valida retorna valor da promoção
			if ( $data <= $datapromocional){
				$valorfinal = number_format($valor, 2, ",", ".");
			}
			else{
				// faz a buscarUltimoValor
				$dados2 = Curso::buscarUltimoValor((int)$curso["id"]);
				$val2 = $dados2[0]["valor"];
				$valorfinal = number_format($val2, 2, ",", ".");
			}

			if ($valorfinal){
				echo $valorfinal;
			}else{
				echo "erro";
			}

		}




		/**
		 * Metodo _editar($dados)
		 * @param $dados
		 * @return Usuario
		 */
		private function _editar($dados){
			$matricula = new Matricula($dados["id"], Curso::buscar($dados["cursos_id"]), Aluno::buscar($dados["alunos_id"]),
                                                                $dados["situacao"], TipoPagamento::buscar($dados["tipo_pagamento_id"]), $dados["parcelas"],
                                                                Cheque::buscar($dados["cheques_id"]), ValorCurso::buscar($dados["cursos_valores_id"]));
			try {
				$matricula->editar();
				$this->setFlash('Matrícula editada com sucesso');
				$this->setPage();
			}
			catch(CamposObrigatorios $e){
				$this->setFlash($e->getMessage());
				$this->setDados($matricula,'VIEW');
				$this->setTela('editar',array('matricula'));
			}
		}

		/**
		 * Acao excluir($id)
		 * @param $id
		 */
		public function excluir($id){
			// código da ação //
			static $acao = 4;
			// buscando o usuário //
			$matricula = Matricula::buscar($id);
			// checando se o usuário a ser excluído é diferente do logado //
			// excluíndo ele //
			$matricula->excluir();
			// setando mensagem de sucesso //
			$this->setFlash('Matrícula excluída com sucesso.');
			// setando a url //
			$this->setPage();
		}


		/**
		 * Acao gerarContratoMatricula($aluno, $curso)
		 * @param $aluno, $curso
		 */
		public function gerarContratoMatriculaGet(){
		 	$dados = $this->getDados("GET");
			// código da ação //
		 	$aluno = Aluno::buscar($dados["idAluno"]);
		 	$curso = Curso::buscar($dados["idCurso"]);		 	              
            
            gerarContratoMatricula($aluno, $curso);
            

		}
        
        public function anexarContratoAssinado(){            
            //identifica se existe arquivo pra upload
            $dados = $this->getDados('POST');
            
            $idMatricula = $dados["id"];           
            
            $matricula = Matricula::buscar($idMatricula);
            
			if(isset($_FILES)){
				$caminhoArquivo = date("dmYHis").$_FILES["contratoAnexo"]["name"];
                
                $_FILES["name"] = $caminhoArquivo;
				
                $matricula->anexarContrato($_FILES, "anexos/anexosContratoAssinado");
                
                $matricula->addContratoAssinado($idMatricula, $caminhoArquivo);
                
                $this->setFlash('contrato anexado com sucesso. <br>');
                // setando a url //
                $this->setPage();
			}
        }



	} ?>