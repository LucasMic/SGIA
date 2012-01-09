<?php
/**
 * Classe RhControll
 * Controlador do modulo de rh
 * @package controll
 * @author Idealizza
 */
	class RecursosHumanosControll extends Controll {
		
		/**
		 * Constante referente ao número do modulo
		 */
		const MODULO = 3;
		
		/**
		 * Acao index()
		 */
		public function index(){
			// código da ação //
			static $acao = 1;
			// definindo a tela //
			$this->setTela('listar',array('rh'));
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
			$rh = Colaborador::buscar($id);
			// jogando o usuário no atributo $dados do controlador //
			$this->setDados($rh,'VIEW');
			// definindo a tela //
			$this->setTela('ver',array('rh'));
		}
		
		public function advertencia(){
			static $acao = 1;
			
			$dados = $this->getDados('POST');
			$rh = Colaborador::buscar($dados["id"]);

			$limitar_ext = "nao";
			$extensoes_validas = array(".txt", ".TXT");
			$caminho_absoluto = "anexos/";
			$limitar_tamanho = "nao";
			$tamanho_bytes = "10000000";
			$sobrescrever = "sim";

			set_time_limit (0);

			$nome_arquivo = $_FILES['arquivo']['name'];
			$tamanho_arquivo = $_FILES['arquivo']['size'];
			$arquivo_temporario = $_FILES['arquivo']['tmp_name'];
			
			
			if (!empty ($nome_arquivo)){
			    if ($sobrescrever == "nao" && file_exists("$caminho_absoluto/$nome_arquivo")){
			        $msg = "Arquivo já existe.";
			    }
			
			    if (($limitar_tamanho == "sim") && ($tamanho_arquivo > $tamanho_bytes)){
			        $msg = "Arquivo deve ter no máximo $tamanho_bytes bytes.";
			    }
			
			    $ext = strrchr($nome_arquivo,'.');
			    
			    if ($limitar_ext == "sim" && !in_array($ext,$extensoes_validas)){
			        $msg = "Extensão de arquivo inválida para upload.";
			    }
			
				$nome_arquivo = $_POST["nomeArquivo"] . $ext;
			    if(move_uploaded_file($arquivo_temporario, "$caminho_absoluto/$nome_arquivo")) {
			        $advertencia = new Advertencia(0, date("Y-m-d H:m:s"), $dados['descricao'], $caminho_absoluto.$nome_arquivo, $rh);
			        $advertencia->inserir();
			        $msg = "Advertência cadastrada com sucesso.";
			        
			    } else {
			        $msg = "O arquivo não pode ser copiado para o servidor.";
			    }
			
			
			}else{
			    $msg = "Selecione o arquivo a ser enviado";
			}

			$this->setDados($rh,'VIEW');
			$this->setFlash($msg);
			$this->setTela('ver',array('rh'));
		}
		
		/**
		 * Acao add()
		 */
		public function cadastroEmpregado(){
			static $acao = 2;
			try{
				$dados = $this->getDados('GET');
				$colaborador = Colaborador::montarObjeto($dados);
				try{
					$colaborador->inserir();
					if($colaborador->getId() != 0){
            			echo $colaborador->getId();
            		} else {
            			echo "erro";
            		}
				} catch(CamposObrigatorios $e){
					$this->setFlash($e->getMessage());
					echo "erro";
				}
            	
				
			}catch(ListaVazia $e){	
			}
		} 
		
		public function addFerias(){
			static $acao = 2;
			$dados = $this->getDados('POST');
			$colaborador = Colaborador::buscar($dados["id"]);
			$ferias = new Ferias($dados["data"], $dados["duracao"], $colaborador);
            try{
				$ferias->inserir();
				$this->setDados($colaborador,'VIEW');
				$this->setFlash("Férias cadastradas com sucesso.");
				$this->setPage();
    			
			} catch(CamposObrigatorios $e){
				$this->setDados($colaborador,'VIEW');
				$this->setFlash($e->getMessage());
				$this->setPage();
			}
		} 
		
		public function addHorasExtras(){
			static $acao = 2;
			$dados = $this->getDados('POST');
			$colaborador = Colaborador::buscar($dados["id"]);
            $horaExtra = TipoHoraExtra::buscar($dados["tipoHoraExtra"]);
			$horasExtras = new HoraExtra(0, $dados["data"], $dados["pendentes"], 0, $colaborador, $horaExtra);
            try{
				$horasExtras->inserir();
				$this->setDados($colaborador,'VIEW');
				$this->setFlash("Hora extra cadastrada com sucesso.");
				$this->setPage();
    			
			} catch(CamposObrigatorios $e){
				$this->setDados($colaborador,'VIEW');
				$this->setFlash($e->getMessage());
				$this->setPage();
			}
		} 
		
		public function addSalarios(){
			static $acao = 2;
			$dados = $this->getDados('POST');
			$colaborador = Colaborador::buscar($dados["id"]);
			$salario = new Salario(0, $dados["data"], $dados["valor"], $colaborador);
            try{
				$salario->inserir();
				$this->setDados($colaborador,'VIEW');
				$this->setFlash("Salário cadastrado com sucesso.");
				$this->setPage();
    			
			} catch(CamposObrigatorios $e){
				$this->setDados($colaborador,'VIEW');
				$this->setFlash($e->getMessage());
				$this->setPage();
			}
		} 
		
		public function addPagamentos(){
			static $acao = 2;
			$dados = $this->getDados('POST');
			$colaborador = Colaborador::buscar($dados["id"]);
			
			
			$limitar_ext = "nao";
			$extensoes_validas = array(".txt", ".TXT");
			$caminho_absoluto = "anexos/";
			$limitar_tamanho = "nao";
			$tamanho_bytes = "10000000";
			$sobrescrever = "sim";

			set_time_limit (0);

			$nome_arquivo = $_FILES['arquivo']['name'];
			$tamanho_arquivo = $_FILES['arquivo']['size'];
			$arquivo_temporario = $_FILES['arquivo']['tmp_name'];
			
			
			if (!empty ($nome_arquivo)){
			    if ($sobrescrever == "nao" && file_exists("$caminho_absoluto/$nome_arquivo")){
			        $msg = "Arquivo já existe.";
			    }
			
			    if (($limitar_tamanho == "sim") && ($tamanho_arquivo > $tamanho_bytes)){
			        $msg = "Arquivo deve ter no máximo $tamanho_bytes bytes.";
			    }
			
			    $ext = strrchr($nome_arquivo,'.');
			    
			    if ($limitar_ext == "sim" && !in_array($ext,$extensoes_validas)){
			        $msg = "Extensão de arquivo inválida para upload.";
			    }
			
				$nome_arquivo = $_POST["nomeArquivo"] . $ext;
			    if(move_uploaded_file($arquivo_temporario, "$caminho_absoluto/$nome_arquivo")) {
			        $msg = "Arquivo anexado, pagamento não cadastrado.";
					try{
						$pagamento = new Pagamento(0, $dados["data"], $dados["descricao"], $dados["valor"], TipoPagamento::buscar($dados["tipo"]), $caminho_absoluto.$nome_arquivo, $colaborador);
			        	$pagamento->inserir();
			        	$msg = "Pagamento cadastrado com sucesso.";
						$this->setDados($colaborador,'VIEW');
						$this->setFlash($msg);
						$this->setTela('ver', array('rh'));
		    			
					} catch(CamposObrigatorios $e){
						$this->setDados($colaborador,'VIEW');
						$this->setFlash($msg);
						$this->setPage();
					}
			        
			    } else {
			        $msg = "O arquivo não pode ser copiado para o servidor.";
			    }
			
			
			}else{
			    $msg = "Selecione o arquivo a ser enviado";
			}

			$this->setDados($colaborador,'VIEW');
			$this->setFlash($msg);
			$this->setTela('ver',array('rh'));
	}
		
		public function dadosContratuais(){
			static $acao = 2;
			try{
				$dados = $this->getDados('GET');
				$colaborador = Colaborador::buscar($dados["id"]);
                                $colaborador->setDataAdmissao($dados["dataAdmissao"]);                            
				$colaborador->setGrauInstrucao($dados["grauInstrucao"]);
				$colaborador->setDiaContratoExperiencia($dados["diasContratoExperiencia"]);
				$colaborador->setDepartamento($dados["departamento"]);
				$colaborador->setFuncao($dados["funcao"]);
				$colaborador->setSalarioContratual($dados["salarioContratual"]);
				$colaborador->setAdiantamentoQuinzenal($dados["adiantamentoQuinzenal"]);
				$colaborador->setHorarioEntrada($dados["horarioEntrada"]);
				$colaborador->setHorarioSaida($dados["horarioSaida"]);
				$colaborador->setHorarioIntervalo($dados["horarioIntervalo"]);
				$colaborador->setDuracaoIntervalo($dados["duracaoIntervalo"]);
				$colaborador->setPossuiTransporte($dados["possuivTransporte"]);
				$colaborador->setPossuiAlimentacao($dados["possuivAlimentacao"]);
				$colaborador->setAuxAlimentacaoTipo($dados["tipoRefeicao"]);
				$colaborador->setAuxilioTransporteTipo(TipoAuxTransporte::buscar($dados["aux_transporte_tipo"]));
				$colaborador->setValeTrabalhoCasa($dados["transporteTC"]);
				$colaborador->setValeCasaTrabalho($dados["transporteCT"]);
				try{
					if($colaborador->dadosContratuais()){
            			echo "ok";
            		} else {
            			echo "erro";
            		}
				} catch(CamposObrigatorios $e){
					$this->setFlash($e->getMessage());
					// definindo a tela //
					echo "erro";
				}
            	
				
			}catch(ListaVazia $e){	
			}
		}
		
		public function documentos(){
			static $acao = 2;
			try{
				$dados = $this->getDados('GET');
				
				$colaborador = Colaborador::buscar($dados["id"]);
				$colaborador->setRg($dados["rg"]);
				$colaborador->setOrgaoExpedidor($dados["orgaoExpedidor"]);
				$colaborador->setDataExpedicao($dados["dataExpedicao"]);
				$colaborador->setHabilitacao($dados["habilitacao"]);
				$colaborador->setHabilitacaoCategoria($dados["categoria"]);
				$colaborador->setHabilitacaoVencimento($dados["vencimentoHabilitacao"]);
				$colaborador->setTitulo($dados["tituloEleitoral"]);
				$colaborador->setTituloZona($dados["zonaEleitoral"]);
				$colaborador->setTituloSecao($dados["secaoEleitoral"]);
				$colaborador->setCpf($dados["cpf"]);
				$colaborador->setCarteiraTrabalho($dados["carteiraTrabalho"]);
				$colaborador->setCarteiraTrabalhoSerie($dados["carteiraTrabalhoSerie"]);
				$colaborador->setCarteiraUf($dados["ufCarteiraTrabalho"]);
				$colaborador->setPis($dados["pis"]);
				$colaborador->setCertificadoReservista($dados["reservista"]);
				
				try{
					if($colaborador->documentos()){
            			echo "ok";
            		} else {
            			echo "erro";
            		}
				} catch(CamposObrigatorios $e){
					$this->setFlash($e->getMessage());
					// definindo a tela //
					echo "erro";
				}
            	
				
			}catch(ListaVazia $e){	
			}
		}
		
		public function concluirCadastro(){
			static $acao = 2;
			try{
				$dados = $this->getDados('POST');
				
				$id = $dados["id"];
				$conjuge = $dados["conjuge"];
				$observacoes = $dados["observacoes"];
				
				
				if(isset($dados["filho"])){
					foreach($dados["filho"] as $filho){
						$filhos[] = new Filho(0, $filho["nome"], $filho["nascimento"], $filho["pensao"], Colaborador::buscar($id)); 					
					}
					
					
					foreach($filhos as $incluindo){
						$incluindo->inserir();
					}
					
				} else {
					$filhos = null;
				}
                
				$colaborador = Colaborador::buscar($id);
				$colaborador->setFilhos($filhos);
				$colaborador->setConjuge($conjuge);
				$colaborador->setObservacoes($observacoes);
				
				try{
					$colaborador->concluirCadastro();
					$this->setFlash('Colaborador cadastrado com sucesso.');
					// setando a url //
					$this->setPage();	
				}catch(CamposObrigatorios $e){}
				
					$this->setFlash($e->getMessage());
					// definindo a tela //
					$this->setTela('add',array('rh'));
				
				
				} catch(CamposObrigatorios $e){
					$this->setFlash($e->getMessage());
					// definindo a tela //
					$this->setTela('add',array('rh'));	
				}
			}
		
		public function add() {
			// código da ação //
			static $acao = 2;
			// checando se o formulário nao foi passado //
			if(!$this->getDados('POST')) {
                            //  definindo a  tela //
                            $this->setTela('add',array('rh'));
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
		
		
		/**
		 * Acao editar($id)
		 * @param $id
		 */
		public function editar($id){
			// código da ação //
			static $acao = 3;
			// Buscando o usuário //
			$rh = Colaborador::buscar($id);
			// checando se o formulário nao foi passado //
			if(!$this->getDados('POST')){
				// Jogando perfil no atributo $dados do controlador //
				$this->setDados($rh,'VIEW');
				// Definindo a tela //
				$this->setTela('editar',array('rh'));
			}
			// caso passar o formulario //
			else
				// chamando o metodo privado _editar() passando os dados do post por parametro //
				$this->_editar($this->getDados('POST'));
		}
		
		
		public function cadastroEmpregadoEdicao(){
			static $acao = 2;
			try{
				$dados = $this->getDados('GET');
                                $colaborador = Colaborador::buscar($dados["id"]);

                                $colaborador->setNome($dados["nome"]);
                                $colaborador->setEndereco($dados["endereco"]);
                                $colaborador->setBairro($dados["bairro"]);
                                $colaborador->setCidade($dados["cidade"]);
                                $colaborador->setUf($dados["uf"]);
                                $colaborador->setCep($dados["cep"]);
                                $colaborador->setFone($dados["telefone1"]);
                                $colaborador->setCelular($dados["telefone2"]);
                                $colaborador->setDataNascimento($dados["dataNascimento"]);
                                $colaborador->setMunicipioNascimento($dados["municipioNascimento"]);
                                $colaborador->setUfNascimento($dados["ufNascimento"]);
                                $colaborador->setNomePai($dados["pai"]);
                                $colaborador->setNomeMae($dados["mae"]);
                                $colaborador->setEstadoCivil($dados["estadoCivil"]);
                                $colaborador->setTipo($dados["tipo"]);
								$colaborador->setStatus($dados["status"]);

				try{
                    if($colaborador->editar()){
                            echo "ok";
                    } else {
                            echo "erro";
                    }
                } catch(CamposObrigatorios $e){
                        $this->setFlash($e->getMessage());
                        // definindo a tela //
                        echo "erro";
                }


            }catch(ListaVazia $e){
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
			$rh = Colaborador::buscar($id);
			// checando se o usuário a ser excluído é diferente do logado //
                        // excluíndo ele //
                        $rh->excluir();
                        // setando mensagem de sucesso //
                        $this->setFlash('Funcionário/Estagiário excluído com sucesso.');
			// setando a url //
			$this->setPage();
		}
		
			

		/**
		 * Acao ver($id)
		 * @param $id
		 */
		public function listarFuncioanriosPendentes(){
			// código da ação //
			static $acao = 1;
			// buscando o usuário //
			$rh = Colaborador::listarFuncioanriosPendentes($_SESSION["sede"]);
			// jogando o usuário no atributo $dados do controlador //
			$this->setDados($rh,'VIEW');
			// definindo a tela //
			$this->setTela('home',array('rh'));
		}
		
		
		
		/**
		 * Acao ver($id)
		 * @param $id
		 */
		public function listarEstagiariosPendentes(){
			// código da ação //
			static $acao = 1;
			// buscando o usuário //
			$rh = Colaborador::listarEstagiariosPendentes($_SESSION["sede"]);
			// jogando o usuário no atributo $dados do controlador //
			$this->setDados($rh,'VIEW');
			// definindo a tela //
			$this->setTela('home',array('rh'));
		}		
		
		
		
		
		/**
		 * Acao gerarAcorodIndividualCompensacaoJornada()
		 * @param 
		 */
		public function gerarAcorodIndividualCompensacaoJornada(){
			$dados = $this->getDados('POST');
									
			$rh = Colaborador::buscar($dados["idColaborador"]);			
			$rh->gerarAcorodIndividualCompensacaoJornada($rh);			
			
		}		
		/**
		 * Acao gerarAcorodIndividualCompensacaoJornada()
		 * @param 
		 */
		public function gerarConsecaoValeRefeicao(){						
			$dados = $this->getDados('POST');
									
			$rh = Colaborador::buscar($dados["idColaborador"]);			
			$rh->gerarConsecaoValeRefeicao($rh);
		}
		
		public function gerarContratoExperiencia(){						
			$dados = $this->getDados('POST');
									
			$rh = Colaborador::buscar($dados["idColaborador"]);			
			$rh->gerarContratoExperiencia($rh);
		}
		
		public function gerarReciboEntregaCarteiraProfissionalAnotacoes(){
			$dados = $this->getDados('POST');
									
			$rh = Colaborador::buscar($dados["idColaborador"]);			
			$rh->gerarReciboEntregaCarteiraProfissionalAnotacoes($rh);
		}
		
		
		public function gerarValeTransportePedidoConcessao(){
			$dados = $this->getDados('POST');
									
			$rh = Colaborador::buscar($dados["idColaborador"]);			
			$rh->gerarValeTransportePedidoConcessao($rh);
		}
		
		public function gerarValeTransporteDeclaracaoDeNaoBeneficiario(){
			$dados = $this->getDados('POST');
									
			$rh = Colaborador::buscar($dados["idColaborador"]);			
			$rh->gerarValeTransporteDeclaracaoDeNaoBeneficiario($rh);
		}
		
		public function listarColaboradoresPendentes(){
			// vou precisar buscar por sedes
		}
		
	}
?>