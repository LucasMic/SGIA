<?php
/**
 * Classe Colaborador
 * @package model
 * @author Idealizza
 */
	class Colaborador {
		
		/**
		 * Atributos
		 */		
		//cadastro de empregado	
		private	$id;
		private	$tipo;
		private	$sede;
		private	$nome;
		private	$endereco;
		private	$bairro;
		private	$cidade;
		private	$uf;
		private	$cep;
		private	$fone;
		private	$celular;
		private	$dataNascimento;
		private	$municipioNascimento;
		private	$ufNascimento;
		private	$nomePai;
		private	$nomeMae;
		private	$estadoCivil;
		private	$pendente;
			
			
		//Dados contratuiais	
		private	$grauInstrucao;
		private	$diaContratoExperiencia;
		private	$departamento;
		private	$funcao;
		private	$salarioContratual;
		private	$adiantamentoQuinzenal;
		private	$horarioEntrada;
		private	$horarioSaida;
		private	$horarioIntervalo;
		private	$duracaoIntervalo;
		private	$possuiAlimentacao;
		private	$auxAlimentacaoTipo;
		private $possuiTransporte;
		private	$auxilioTransporteTipo;
		private	$valeCasaTrabalho;
		private	$valeTrabalhoCasa;
			
			
		//Documentos	
		private	$rg;
		private	$orgaoExpedidor;
		private	$dataExpedicao;
		private	$habilitacao;
		private	$habilitacaoCategoria;
		private	$habilitacaoVencimento;
		private	$titulo;
		private	$tituloZona;
		private	$tituloSecao;
		private	$cpf;
		private	$carteiraTrabalho;
		private	$carteiraTrabalhoSerie;
		private	$carteiraUf;
		private	$pis;
		private	$certificadoReservista;
		
		//Complementares	
		private	$observacoes;
		private	$conjuge;
		private	$filhos;
		
		//novos campos
		private $status;
		private $dataAdmissao;
		private $dataDemissao;
		
		

		
		
                function __construct(  $id	=	0	,
												$tipo	=	null	,
												Sede $sede	=	null	,
												$nome	=	""	,
												$endereco	=	""	,
												$bairro	=	""	,
												$cidade	=	""	,
												$uf	=	""	,
												$cep	=	""	,
												$fone	=	""	,
												$celular	=	""	,
												$dataNascimento	=	""	,
												$municipioNascimento	=	""	,
												$ufNascimento	=	""	,
												$nomePai	=	""	,
												$nomeMae	=	""	,
												$estadoCivil	=	""	,
												$pendente	=	0	,
												$grauInstrucao	=	""	,
												$diaContratoExperiencia	=	""	,
												$departamento	=	""	,
												$funcao	=	""	,
												$salarioContratual	=	""	,
												$adiantamentoQuinzenal	=	""	,
												$horarioEntrada	=	""	,
												$horarioSaida	=	""	,
												$horarioIntervalo	=	""	,
												$duracaoIntervalo	=	""	,
												$possuiAlimentacao	=	0	,
												$auxAlimentacaoTipo	=	0	,
												$possuiTransporte	=	0	,
												$auxilioTransporteTipo	=	0	,
												$valeCasaTrabalho	=	0	,
												$valeTrabalhoCasa	=	0	,
												$rg	=	""	,
												$orgaoExpedidor	=	""	,
												$dataExpedicao	=	""	,
												$habilitacao	=	""	,
												$habilitacaoCategoria	=	""	,
												$habilitacaoVencimento	=	""	,
												$titulo	=	""	,
												$tituloZona	=	""	,
												$tituloSecao	=	""	,
												$cpf	=	""	,
												$carteiraTrabalho	=	""	,
												$carteiraTrabalhoSerie	=	""	,
												$carteiraUf	=	""	,
												$pis	=	""	,
												$certificadoReservista	=	""	,
												$observacoes	=	""	,
												$conjuge	=	""	,
												array $filhos	=	null,
												$status = 1,
												$dataAdmissao = "",
												$dataDemissao = "") {
                    $this->id	=	$id	;
					$this->tipo	=	$tipo	;
					$this->sede	=	$sede	;
					$this->nome	=	$nome	;
					$this->endereco	=	$endereco	;
					$this->bairro	=	$bairro	;
					$this->cidade	=	$cidade	;
					$this->uf	=	$uf	;
					$this->cep	=	$cep	;
					$this->fone	=	$fone	;
					$this->celular	=	$celular	;
					$this->dataNascimento	=	$dataNascimento	;
					$this->municipioNascimento	=	$municipioNascimento	;
					$this->ufNascimento	=	$ufNascimento	;
					$this->nomePai	=	$nomePai	;
					$this->nomeMae	=	$nomeMae	;
					$this->estadoCivil	=	$estadoCivil	;
					$this->pendente	=	$pendente	;
					$this->grauInstrucao	=	$grauInstrucao	;
					$this->diaContratoExperiencia	=	$diaContratoExperiencia	;
					$this->departamento	=	$departamento	;
					$this->funcao	=	$funcao	;
					$this->salarioContratual	=	$salarioContratual	;
					$this->adiantamentoQuinzenal	=	$adiantamentoQuinzenal	;
					$this->horarioEntrada	=	$horarioEntrada	;
					$this->horarioSaida	=	$horarioSaida	;
					$this->horarioIntervalo	=	$horarioIntervalo	;
					$this->duracaoIntervalo	=	$duracaoIntervalo	;
					$this->possuiAlimentacao	=	$possuiAlimentacao	;
					$this->auxAlimentacaoTipo	=	$auxAlimentacaoTipo	;
					$this->possuiTransporte	=	$possuiTransporte	;
					$this->auxilioTransporteTipo	=	$auxilioTransporteTipo	;
					$this->valeCasaTrabalho	=	$valeCasaTrabalho	;
					$this->valeTrabalhoCasa	=	$valeTrabalhoCasa	;
					$this->rg	=	$rg	;
					$this->orgaoExpedidor	=	$orgaoExpedidor	;
					$this->dataExpedicao	=	$dataExpedicao	;
					$this->habilitacao	=	$habilitacao	;
					$this->habilitacaoCategoria	=	$habilitacaoCategoria	;
					$this->habilitacaoVencimento	=	$habilitacaoVencimento	;
					$this->titulo	=	$titulo	;
					$this->tituloZona	=	$tituloZona	;
					$this->tituloSecao	=	$tituloSecao	;
					$this->cpf	=	$cpf	;
					$this->carteiraTrabalho	=	$carteiraTrabalho	;
					$this->carteiraTrabalhoSerie	=	$carteiraTrabalhoSerie	;
					$this->carteiraUf	=	$carteiraUf	;
					$this->pis	=	$pis	;
					$this->certificadoReservista	=	$certificadoReservista	;
					$this->observacoes	=	$observacoes	;
					$this->conjuge	=	$conjuge	;
					$this->filhos	=	$filhos	;
					$this->status = $status  ;  
					$this->dataAdmissao = $dataAdmissao;
					$this->dataDemissao = $dataDemissao;
                    
                }


		/**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){
			if(($this->getNome() == ""))
				return false;
			return true;
		}
		
		/**
		 * Metodo inserir()
		 * @return Colaborador
		 */
		public function inserir(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaborador = $instancia->inserir($this);
			// retornando o Colaborador //
			return $colaborador;
		}
		
		public function montarObjeto($colaborador){	
		
		$objColaborador = new Colaborador((isset($colaborador["id"]) ? $colaborador["id"] : 0),
																			(isset($colaborador["tipo"]) ? $colaborador["tipo"] : null),
																			(isset($_SESSION["sede"]) ? Sede::buscar($_SESSION["sede"]) : null),
																			(isset($colaborador["nome"]) ? $colaborador["nome"] : ""),
																			(isset($colaborador["endereco"]) ? $colaborador["endereco"] : ""),
																			(isset($colaborador["bairro"]) ? $colaborador["bairro"] : ""),
																			(isset($colaborador["cidade"]) ? $colaborador["cidade"] : ""),
																			(isset($colaborador["uf"]) ? $colaborador["uf"] : ""),
																			(isset($colaborador["cep"]) ? $colaborador["cep"] : ""),
																			(isset($colaborador["fone"]) ? $colaborador["fone"] : ""),
																			(isset($colaborador["celular"]) ? $colaborador["celular"] : ""),
																			(isset($colaborador["data_nascimento"]) ? $colaborador["data_nascimento"] : ""),
																			(isset($colaborador["mun_nascimento"]) ? $colaborador["mun_nascimento"] : ""),
																			(isset($colaborador["uf_nascimento"]) ? $colaborador["uf_nascimento"] : ""),
																			(isset($colaborador["pai"]) ? $colaborador["pai"] : ""),
																			(isset($colaborador["mae"]) ? $colaborador["mae"] : ""),
																			(isset($colaborador["estado_civil"]) ? $colaborador["estado_civil"] : ""),
																			(isset($colaborador["pendente"]) ? $colaborador["pendente"] : 0),
																			(isset($colaborador["grau_instrucao"]) ? $colaborador["grau_instrucao"] : ""),
																			(isset($colaborador["dias_contrato_experiencia"]) ? $colaborador["dias_contrato_experiencia"] : ""),
																			(isset($colaborador["departamento"]) ? $colaborador["departamento"] : ""),
																			(isset($colaborador["funcao"]) ? $colaborador["funcao"] : ""),
																			(isset($colaborador["salario_contratual"]) ? $colaborador["salario_contratual"] : ""),
																			(isset($colaborador["adiantamento_quinzenal"]) ? $colaborador["adiantamento_quinzenal"] : ""),
																			(isset($colaborador["horario_entrada"]) ? $colaborador["horario_entrada"] : ""),
																			(isset($colaborador["horario_saida"]) ? $colaborador["horario_saida"] : ""),
																			(isset($colaborador["horario_intervalo"]) ? $colaborador["horario_intervalo"] : ""),
																			(isset($colaborador["duracao_intervalo"]) ? $colaborador["duracao_intervalo"] : ""),
																			(isset($colaborador["possui_vAlimentacao"]) ? $colaborador["possui_vAlimentacao"] : 0),
																			(isset($colaborador["aux_alimentacao_tipo"]) ? $colaborador["aux_alimentacao_tipo"] : 0),
																			(isset($colaborador["possui_vTransporte"]) ? $colaborador["possui_vTransporte"] : 0),
																			
																			
																			
																			((isset($colaborador["aux_transporte_tipo_id"]) && $colaborador["aux_transporte_tipo_id"] != 0)   ? TipoAuxTransporte::buscar($colaborador["aux_transporte_tipo_id"] ): null),
																			(isset($colaborador["vale_transporte_casa_trabalho"]) ? $colaborador["vale_transporte_casa_trabalho"] : 0),
																			(isset($colaborador["vale_transporte_trabalho_casa"]) ? $colaborador["vale_transporte_trabalho_casa"] : 0),
																			(isset($colaborador["rg"]) ? $colaborador["rg"] : ""),
																			(isset($colaborador["orgao_expedidor"]) ? $colaborador["orgao_expedidor"] : ""),
																			(isset($colaborador["data_expedicao"]) ? $colaborador["data_expedicao"] : ""),
																			(isset($colaborador["habilitacao"]) ? $colaborador["habilitacao"] : ""),
																			(isset($colaborador["habilitacao_categoria"]) ? $colaborador["habilitacao_categoria"] : ""),
																			(isset($colaborador["habilitacao_vencimento"]) ? $colaborador["habilitacao_vencimento"] : ""),
																			(isset($colaborador["titulo"]) ? $colaborador["titulo"] : ""),
																			(isset($colaborador["titulo_zona"]) ? $colaborador["titulo_zona"] : ""),
																			(isset($colaborador["titulo_secao"]) ? $colaborador["titulo_secao"] : ""),
																			(isset($colaborador["cpf"]) ? $colaborador["cpf"] : ""),
																			(isset($colaborador["carteira_trabalho"]) ? $colaborador["carteira_trabalho"] : ""),
																			(isset($colaborador["carteira_trabalho_serie"]) ? $colaborador["carteira_trabalho_serie"] : ""),
																			(isset($colaborador["carteira_uf"]) ? $colaborador["carteira_uf"] : ""),
																			(isset($colaborador["pis"]) ? $colaborador["pis"] : ""),
																			(isset($colaborador["certificado_reservista"]) ? $colaborador["certificado_reservista"] : ""),
																			(isset($colaborador["observacoes"]) ? $colaborador["observacoes"] : ""),
																			(isset($colaborador["conjuge"]) ? $colaborador["conjuge"] : ""),
																			(isset($colaborador["filhos"]) ? $colaborador["filhos"] : null),
																			(isset($colaborador["status"]) ? $colaborador["status"] : 1),
																			(isset($colaborador["data_admissao"]) ? $colaborador["data_admissao"] : ""),
																			(isset($colaborador["data_demissao"]) ? $colaborador["data_demissao"] : ""));
			
		return $objColaborador;
		
		}
		
		/**
		 * Metodo editar()
		 * @return Colaborador
		 */
		public function dadosContratuais(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaborador = $instancia->dadosContratuais($this);
			// retornando o Colaborador //
			return $colaborador;
		}
		
		public function addAnexos($id, $data, $tipo, $caminho){
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaborador = $instancia->addAnexos($id, $data, $tipo, $caminho);
			// retornando o Colaborador //
			return $colaborador;
		}
		
		public function documentos(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaborador = $instancia->documentos($this);
			// retornando o Colaborador //
			return $colaborador;
		}
		
		public function concluirCadastro(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaborador = $instancia->concluirCadastro($this);
			// retornando o Colaborador //
			return $colaborador;
		}
		
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaborador = $instancia->editar($this);
			// retornando o Colaborador //
			return $colaborador;
		}
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaborador = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $colaborador;
		}
		
		/**
		 * Metodo listar()
		 * @return Colaborador[]
		 */
		public static function listar($sede){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //			
			$colaboradores = $instancia->listar($sede);
			// checando se o retorno foi falso //				
			if(!$colaboradores)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::COLABORADOR);
			// percorrendo os usuarios //
			foreach($colaboradores as $colaborador){							
				// instanciando e jogando dentro da colecao $objetos o Colaborador //
				$objetos[] = Colaborador::montarObjeto($colaborador);				
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		public static function obterDocumentos($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaboradores = $instancia->obterDocumentos($id);
			// checando se o retorno foi falso //
			if(!$colaboradores)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::COLABORADOR);
			// percorrendo os usuarios //
			return $colaboradores;
		}
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Colaborador
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaborador = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$colaborador)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::COLABORADOR);
			// instanciando e retornando o Colaborador //
			return Colaborador::montarObjeto($colaborador);
		}

		/**
		 * Metodo listarFuncioanriosPendentes($sedeId)
		 * @param $sedeId
		 * @return Colaboradores
		 */
		public static function listarFuncioanriosPendentes($sedeId){			
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaboradores = $instancia->listarFuncioanriosPendentes($sedeId);
			// checando se o resultado foi falso //								
			foreach($colaboradores as $colaborador){				
				// instanciando e jogando dentro da colecao $objetos o Colaborador //
				$objetos[] = Colaborador::montarObjeto($colaborador);				
			}
			// retornando a colecao $objetos //				
			return $objetos;
		}


		
		/**
		 * Metodo listarEstagiariosPendentes($sedeId)
		 * @param $sedeId
		 * @return Colaboradores
		 */
		public static function listarEstagiariosPendentes($sedeId){

			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaboradores = $instancia->listarEstagiariosPendentes($sedeId);
			// checando se o resultado foi falso //
			foreach($colaboradores as $colaborador){				
				// instanciando e jogando dentro da colecao $objetos o Colaborador //
				$objetos[] = Colaborador::montarObjeto($colaborador);				
			}
			// retornando a colecao $objetos //				
			return $objetos;
		}


		/**
		 * Metodo listarAniverssariantesDoMes($sedeId)
		 * @param $sedeId
		 * @return Colaboradores
		 */
		public static function listarAniverssariantesDoMes($sedeId){

			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaboradores = $instancia->listarAniverssariantesDoMes($sedeId);
			// checando se o resultado foi falso //
                        if ($colaboradores){
                            foreach($colaboradores as $colaborador){				
                                    // instanciando e jogando dentro da colecao $objetos o Colaborador //
                                    $objetos[] = Colaborador::montarObjeto($colaborador);				
                            }
                        }else{ throw new ListaVazia(ListaVazia::COLABORADOR); }
			// retornando a colecao $objetos //				
			return $objetos;                      
                        
                        
		}


		/**
		 * Metodo listarDadosPendentes($sedeId)
		 * @param $sedeId
		 * @return Colaboradores
		 */
		public static function listarDadosPendentes($sedeId){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaboradores = $instancia->listarDadosPendentes($sedeId);
			// checando se o resultado foi falso //
			foreach($colaboradores as $colaborador){				
				// instanciando e jogando dentro da colecao $objetos o Colaborador //
				$objetos[] = Colaborador::montarObjeto($colaborador);				
			}
			// retornando a colecao $objetos //				
			return $objetos;
		}



		/**
		 * Metodo listarDocPendenteFuncionario($sedeId)
		 * @param $sedeId
		 * @return Colaboradores
		 */
		public static function listarDocPendenteFuncionario($sedeId){
			// pra caso não existir documento pendente
			$objetos = null;			
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaboradores = $instancia->listarDocPendenteFuncionario($sedeId);	
			$incremento = 0;			 			
			foreach($colaboradores as $colaborador){
				if ($colaborador["id"]<> null){//testa se retornou algum id valido							
				// instanciando e jogando dentro da colecao $objetos o Colaborador //			
					if (($colaborador["totalanexos"]<6) && ($colaborador["totalanexos"]>=1)) {
						if ($incremento == 0){
							$txt1["id"] = 0;
							$txt1["nome"] = "--Funcionários--";			
							$objetos[] = Colaborador::montarObjeto($txt1);
							$objetos[] = Colaborador::montarObjeto($colaborador);						
						}else{
							$objetos[] = Colaborador::montarObjeto($colaborador);
						}
					}
					$incremento = $incremento+1;
				}
			}									
			return $objetos;
		}
		
		
		/**
		 * Metodo listarDocPendenteEstagiario($sedeId)
		 * @param $sedeId
		 * @return Colaboradores
		 */
		public static function listarDocPendenteEstagiario($sedeId){
			// pra caso não existir documento pendente
			$objetos = null;			
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaboradores = $instancia->listarDocPendenteEstagiario($sedeId);	
			$incremento = 0;			 			
			foreach($colaboradores as $colaborador){
				if ($colaborador["id"]<> null){//testa se retornou algum id valido							
				// instanciando e jogando dentro da colecao $objetos o Colaborador //			
					if (($colaborador["totalanexos"]<6) && ($colaborador["totalanexos"]>=1)) {
						if ($incremento == 0){
							$txt1["id"] = 0;
							$txt1["nome"] = "--Estagiários--";			
							$objetos[] = Colaborador::montarObjeto($txt1);
							$objetos[] = Colaborador::montarObjeto($colaborador);						
						}else{
							$objetos[] = Colaborador::montarObjeto($colaborador);
						}
					}
					$incremento = $incremento+1;
				}
			}	
											
			return $objetos;
		}
		
		
		/**
		* Metodo listarRenovacoesPendentesExameAdmissionalVencido($sedeId)
		* @param $sedeId
		* @return Colaboradores
		*/		
		public static function listarRenovacoesPendentesExameAdmissionalVencido($sedeId){
			$objetos = null;
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaboradores = $instancia->listarExameAdmissionalVencido($sedeId);
			// checando se o resultado foi falso //			
			$incremento = 0;			 			
			foreach($colaboradores as $colaborador){
				if ($colaborador["id"]<> null){//testa se retornou algum id valido							
				// instanciando e jogando dentro da colecao $objetos o Colaborador //			
					if ($incremento == 0){
						$txt1["id"] = 0;
						$txt1["nome"] = "--Exames Adimissionais--";			
						$objetos[] = Colaborador::montarObjeto($txt1);
						$objetos[] = Colaborador::montarObjeto($colaborador);			
						
					}else{
						$objetos[] = Colaborador::montarObjeto($colaborador);
					}					
					$incremento = $incremento+1;
				}
			}
			return $objetos;
		}
		

		/**
		 * Metodo listarRenovacoesPendentesContartoEstagioVencido($sedeId)
		 * @param $sedeId
		 * @return Colaboradores
		 */		
		public static function listarRenovacoesPendentesContartoEstagioVencido($sedeId){
			$objetos = null;
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaboradores = $instancia->listarContartoEstagioVencido($sedeId);
			// checando se o resultado foi falso //			
			$incremento = 0;			 			
			foreach($colaboradores as $colaborador){
				if ($colaborador["id"]<> null){//testa se retornou algum id valido							
				// instanciando e jogando dentro da colecao $objetos o Colaborador //			
					if ($incremento == 0){
						$txt1["id"] = 0;
						$txt1["nome"] = "--Contrato de Estágio--";			
						$objetos[] = Colaborador::montarObjeto($txt1);
						$objetos[] = Colaborador::montarObjeto($colaborador);			
						
					}else{
						$objetos[] = Colaborador::montarObjeto($colaborador);
					}					
					$incremento = $incremento+1;
				}
			}
			return $objetos;
		}
		
		

		/**
		 * Metodo exibirFeriasAvencer($sedeId)
		 * @param $sedeId
		 * @return Colaboradores
		 */
		public static function exibirFeriasAvencer($sedeId){
			// recuperando a instancia da classe de acesso a dados //		
			$instancia = ColaboradorDAO::getInstancia();
			// executando o metodo //
			$colaboradores = $instancia->exibirFeriasAvencer($sedeId);
			// checando se o resultado foi falso //
			
                        if ($colaboradores){                            
                        
			foreach($colaboradores as $colaborador){			
				// monta a variavel com o nome e quantidade de dias das ferias				
				$nomeColaboradorConcatenadoFim = $colaborador['nome']."(".$colaborador['quantDiasFerias'].")";				
				
				// instanciando e jogando dentro da colecao $objetos o Colaborador //
				$colaboradorMontado = Colaborador::montarObjeto($colaborador);
				// seta o novo nome ao objeto criado 
				$colaboradorMontado->setNome($nomeColaboradorConcatenadoFim);
				
				$objetos[] = $colaboradorMontado;				
								
			}
                        }else{ throw new ListaVazia(ListaVazia::COLABORADOR); }
			// retornando a colecao $objetos //			
			return $objetos;
		}
		
		
		
		
		
		function gerarAcorodIndividualCompensacaoJornada($colaborador){			
		$pdf = new mPDF();			
		$pdf->debug = false;
		$html="<div style='height:160px;margin-bottom:20px;'>
			<img src='". IMG . "/" . "logocomplexo.jpg' style='float:left;' width='268' height='157'/>
			<div style='width:600px;float:right;'>
			  <p align='left' style='font-family: Arial, Helvetica, sans-serif'>
				<span style='font-size: 20px;'>Complexo de Ensino Renato  Saraiva</span><br />
				Rua do Cupim, 44 — Graças<br />
				Recife — PE<br />
			  Fones: 81 3221 0406</p>
			</div>
		</div>
		
		<div style='border:solid 1px #000000;width:100%;'>
			<p align='center' style='font-family: Arial, Helvetica, sans-serif'><strong>ACORDO INDIVIDUAL DE COMPENSAÇÃO SEMANAL DE JORNADA</strong></p>
		</div>				
		<p align='justify' style='font-family: Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Através do presente instrumento nominado ACORDO INDIVIDUAL DE COMPENSAÇÃO DE JORNADA DE TRABALHO ajustado, com respeito às normas sociais da Constituição da República/1988 e da CLT/1943, em vigor, da jurisprudência consolidada e do item II, enunciado nº 85 da Súmula do Tribunal Superior do Trabalho, de um lado, ora Acordante, sociedade empresarial educacional <strong>COMPLEXO DE ENSINO RENATO SARAIVA/CERS</strong>, pessoa jurídica de direito privado, regularmente inscrita, no CNPJ, sob o nº 08.403.264.0001-06, com endereço à Rua do Cupim, nº 44, Bairro das Graças, Recife, Pernambuco, CEP 52.011-070, presentado e representado pela Diretoria ou sua preposta com poderes para tanto, subscritora da presente, e do outro lado, o(a) empregado(a) regularmente contratado(a) ora Acordado(a) e a seguir qualificado (a):</p>
		<div style='border:solid 1px #000000;width:100%;'>
			<p align='left' style='font-family: Arial, Helvetica, sans-serif'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOME:</strong>SR(a):&nbsp;".$colaborador->getNome()."</p>
			<p></p>
			<p align='left' style='font-family: Arial, Helvetica, sans-serif'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CTPS:</strong>(número e série):&nbsp;".$colaborador->getCarteiraTrabalho()."&nbsp;&nbsp;".$colaborador->getCarteiraTrabalhoSerie()."</p>
		</div>				
		<p align='justify' style='font-family: Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Celebram entre si, Acordado(a) e Acordante, por escrito, na melhor forma em Direito admitida, o presente acordo: na jornada diária, se o(a) empregado(a) ultrapassar em 01h (uma hora) será compensado em menos 01h (uma hora) a sua jornada em outro dia da semana,desde que na mesma semana; doutra maneira, caso o(a) empregado(a) labore 01h (uma hora) a menos será adicionada 01h (uma hora) a mais na sua jornada em outro dia da semana,desde que na mesma semana; em tudo respeitado o limite fixado de 44 h (quarenta e quatro horas) semanais (art. 7º, XIII, CR/1988) e as regras e princípios jurídicos do Direito do Trabalho. Lido, relido e assinado. Com cópia ao (à) empregado (a) ora Acordado (a). Em ".Sede::Buscar($_SESSION["sede"])->getNome()."/".Sede::Buscar($_SESSION["sede"])->getUf()." aos ".dataextenso(date("Y-m-d")).".</p>						
		<p></p>
		<p></p>
		<p align='center' style='font-family: Arial, Helvetica, sans-serif'>			
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___________________________</p>
		<p style='font-family: Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EMPREGADO(A)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIRETORIA</p>
		</p>
		<p></p>
		<p></p>
		<p></p>		
		<hr />
		<span style='font-family: Arial, Helvetica, sans-serif'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Complexo de Ensino Renato Saraiva | www.renatosaraiva.com.br | (081) 3221.0406</strong></span>
		";
		$pdf->WriteHTML($html);		
		$pdf->Output("AcordoIndividualDeCompensacaoDeJornada.pdf", "D");
		} 
		
		function gerarConsecaoValeRefeicao($colaborador){
				
			
		$pdf = new mPDF();			
		$pdf->debug = false;
		$html="<div style='height:160px;margin-bottom:20px;'>
			<img src='". IMG . "/" . "logocomplexo.jpg' style='float:left;' width='268' height='157'/>
			<div style='width:600px;float:right;'>
			  <p align='left' style='font-family: Arial, Helvetica, sans-serif'>
				<span style='font-size: 20px;'>Complexo de Ensino Renato  Saraiva</span><br />
				Rua do Cupim, 44 — Graças<br />
				Recife — PE<br />
			  Fones: 81 3221 0406</p>
			</div>
		</div>
		<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
		<p></p>
		<p></p>						
		<p align='justify' style='font-family: Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eu, <strong>".strtoupper($colaborador->getNome())."</strong>, declaro para os devidos fins, que aceito receber o VALE REFEIÇÃO mensal oferecido pelo Complexo de Ensino Renato Saraiva no valor de R$ 264,00. Declaro, também, que autorizo ser descontado sobre o meu salário o valor de R$ 7,92 (".valorMonetraioPorExtenso(7.92).") equivalente a 6% do valor do benefício, conforme previsto em lei.</p>
		
		<p></p><p></p><p></p><p></p>
		<p style='font-family: Arial, Helvetica, sans-serif'>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".Sede::Buscar($_SESSION["sede"])->getNome().", ".retornaData().".     
		</p>
		<p></p><p></p><p></p><p></p>
		
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________________________</p>
		<p style='font-family: Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>".strtoupper($colaborador->getNome())."</strong></p>
		
		<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
		<p></p>
		
		<hr />
		<span style='font-family: Arial, Helvetica, sans-serif'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Complexo de Ensino Renato Saraiva | www.renatosaraiva.com.br | (081) 3221.0406</strong></span>
		";
		$pdf->WriteHTML($html);		
		$pdf->Output("ConsecaoDeValeRefeicao.pdf", "D");
		} 
		
		
		
		function gerarContratoExperiencia($colaborador){
		$pdf = new mPDF();			
		$pdf->debug = false;
		$html="<div style='height:160px;margin-bottom:20px;'>
			<img src='". IMG . "/" . "logocomplexo.jpg' style='float:left;' width='268' height='157'/>
			<div style='width:600px;float:right;'>
			  <p align='left' style='font-family: Arial, Helvetica, sans-serif'>
				<span style='font-size: 20px;'>Complexo de Ensino Renato  Saraiva</span><br />
				Rua do Cupim, 44 — Graças<br />
				Recife — PE<br />
			  Fones: 81 3221 0406</p>
			</div>		
		<p></p>
		<p></p>
		<p></p>
		<p></p>
		<p></p>
		<p></p>
		<p></p>
		<p></p>
		<p></p>
		<p></p>
		
		<p align='center' style='font-family: Arial, Helvetica, sans-serif'><strong>CONTRATO DE EXPERIÊNCIA</strong></p>
		<span align='left' style='font-size:11px; font-style:italic; font-family:Arial, Helvetica, sans-serif'><strong>EMPREGADORA</strong></span>
		<hr>	
			
		<span style='font-size: 10px; font-family: Arial, Helvetica, sans-serif'>
		COMPLEXO DE ENSINO RENATO SARAIVA<br />
		Endereço: RUA CUPIM, Nº 44<br />
		Bairro: GRAÇAS<br />
		Cidade: RECIFE<br />
		CNPJ: 08403264000106<br /></span>
		
		<hr>		
		<span align='left' style='font-size:11px; font-style:italic; font-family:Arial, Helvetica, sans-serif'><strong>EMPREGADO</strong></span>		
		<hr>
		
		<strong><span style='font-size: 10px; font-family: Arial, Helvetica, sans-serif'>".strtoupper($colaborador->getNome())."</span></strong><p></p>		
		<span style='font-size: 10px; font-family: Arial, Helvetica, sans-serif'>
		Endereço: ".$colaborador->getEndereco()."<br />
		Bairro: ".$colaborador->getBairro()."<br />
		Cidade: ".$colaborador->getCidade()."<br />
		CEP: ".$colaborador->getCep()."<br />
		CTPS: Nº".$colaborador->getcarteiraTrabalho()." Série:".$colaborador->getcarteiraTrabalhoSerie()."<br />
		<p></p>
		<p></p>
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
		Pelo presente instrumento particular de Contrato de Experiência, as partes discriminadas acima celebram o presente Contrato Individual de Trabalho para fins de experiência, conforme Legislação Trabalhista em vigor, regido pelas cláusulas abaixo e demais disposições legais vigentes:				
		</p>				
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>				
			1-	Fica o EMPREGADO admitido no quadro de funcionários da EMPREGADORA para exercer a função de <strong>".strtoupper($colaborador->getFuncao())."</strong> mediante a remuneração de R$ ".gravandoValorNoBanco($colaborador->getSalarioContratual())." por mês.  A Circunstância, porém, de ser a função especificada não importa na intransferibilidade do EMPREGADO para outro serviço, no qual demonstre melhor capacidade de adaptação desde que compatível com sua condição pessoal.
		<p>					
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>		
			2-	O horário de trabalho será anotado na sua ficha de registro e a eventual redução da jornada do trabalho por determinação da EMPREGADORA, não inovará este ajuste, permanecendo sempre íntegra a obrigação do  EMPREGADO em cumprir o horário que lhe for determinado , observando o limite legal.				
		<p>				
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>				
			3-	Obriga-se também o EMPREGADO a prestar serviços em horas extraordinárias, sempre que lhe for determinado pela EMPREGADORA, na forma prevista em Lei. Na hipótese desta faculdade pela EMPREGADORA, o EMPREGADO receberá as horas extraordinárias com o acréscimo legal, salvo a ocorrência de compensação com a conseqüente redução da jornada de trabalho em outro dia.				
		<p>		
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
			4-	Aceita o EMPREGADO expressamente a condição de prestar serviços em qualquer dos turnos de trabalho, isto é, tanto durante o dia, como à noite, desde que sem simultaneidade, observando as prescrições legais reguladoras do assunto, quanto à remuneração.
		<p>		
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
			5-	Fica ajustado nos termos que dispõe o § 1º do artigo 469, da Consolidação das Leis do Trabalho, que o EMPREGADO acatará ordem emanada da EMPREGADORA para a prestação de serviços tanto naquela localidade de celebração do Contrato de Trabalho como em qualquer outra cidade, capital ou vila do território nacional, quer essa transferência seja transitória ou definitiva.
		<p>		
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
			6-	No ato da assinatura deste contrato, o EMPREGADO recebe o Regulamento Interno da Empresa, cujas cláusulas fazem parte  do Contrato de Trabalho, e a violação de qualquer delas implicará em sanção, cuja graduação dependerá da gravidade da mesma, culminando com a rescisão do contrato.
		<p>
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
			7-	Em caso de dano causado pelo EMPREGADO, fica a EMPREGADORA autorizada a efetivar descontos da importância correspondente ao prejuízo, o qual fará com fundamento no parágrafo único do artigo  462 da Consolidação  das  Leis do Trabalho, já que essa possibilidade fica expressamente prevista em contrato.
		<p>		
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>		
			8-	O presente contrato terá vigência durante 90 (noventa) dias, sendo celebrado para as partes verificarem reciprocamente a conveniência ou não de se vincularem em caráter definitivo a um contrato de trabalho. A EMPREGADORA passando a conhecer as aptidões do EMPREGADO e suas qualidades pessoais e morais; o EMPREGADO verificando se o ambiente e os métodos de trabalho atendem a sua conveniência de serviço.		
		<p>		
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
			9-	Opera-se a rescisão do presente contrato pela decorrência do prazo supra ou por vontade de cada uma das partes. Rescindindo-se por vontade do EMPREGADO ou pela EMPREGADORA com justa causa, nenhuma indenização é devida. Rescindindo-se antes do prazo, pela EMPREGADORA, fica esta obrigada a pagar 50% dos salários devidos até o final (metade do tempo combinado restante), nos termos no artigo 479 das Consolidações da Leis do Trabalho sem prejuízo no Regulamento do Fundo de Garantia por Tempo de Serviço. Rescindindo-se antes do prazo, pelo EMPREGADO, fica este obrigado a pagar 50% dos salários devidos até o final (metade do tempo combinado restante), nos termos do artigo 480 da Consolidação das Leis do Trabalho, assim como o seu parágrafo primeiro. Nenhum aviso prévio é devido pela rescisão do presente Contrato.     		
		<p>		
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
			10-	Na hipótese deste ajuste transformar-se em prazo indeterminado, pelo decurso do tempo, continuarão em plena vigência as cláusulas de 1 (um) a 7 (sete), enquanto durarem as relações do EMPREGADO com a EMPREGADORA. 		
		<p>		
		<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
			E por estarem de pleno acordo, as partes contratantes, assinam o presente Contrato de Experiência em duas vias, ficando a primeira em poder da EMPREGADORA, e a segunda com o EMPREGADO, que dela dará o competente recibo.		
		<p>		
		<p align='left' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
		".Sede::Buscar($_SESSION["sede"])->getNome()."<br />
		".dataextenso(date("Y-m-d")).".
		<p>	
		<p></p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________</p>
			<p align='left' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>TESTEMUNHA</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>EMPREGADORA</strong>
			</p>
		<p></p>
		<p></p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________</p>
			<p align='left' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>TESTEMUNHA</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Empregado ou Responsável quando menor</strong>.
			</p>
		<hr>		
		<p align='center' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'><strong>TERMO DE PRORROGAÇÃO.</strong></p>
		<p align='justify' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>
			Por mútuo acordo entre as partes, fica o Presente Contrato de Experiência, que deveria vencer nesta data, prorrogada até a data ___/___/_____.
		</p>		
		<p></p>
			<p align='justify' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".Sede::Buscar($_SESSION["sede"])->getNome().", ".dataextenso(date("Y-m-d")).".</p>
		<p>	
			<p></p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________</p>
			<p align='left' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>TESTEMUNHA</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>EMPREGADORA</strong>
			</p>
			<p></p>
			<p></p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________________________</p>
			<p align='left' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>TESTEMUNHA</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Empregado ou Responsável quando menor</strong>.
		</p>				
		";
		$pdf->WriteHTML($html);		
		$pdf->Output("ContratoDeExperiencia.pdf", "D");
		}
		
		
		function gerarReciboEntregaCarteiraProfissionalAnotacoes($colaborador){
		$pdf = new mPDF();			
		$pdf->debug = false;
		$html="<div style='height:160px;margin-bottom:20px;'>
			<img src='". IMG . "/" . "logocomplexo.jpg' style='float:left;' width='268' height='157'/>
			<div style='width:600px;float:right;'>
			  <p align='left' style='font-family: 'Times New Roman', Times, serif'>
				<span style='font-size: 20px;'>Complexo de Ensino Renato  Saraiva</span><br />
				Rua do Cupim, 44 — Graças<br />
				Recife — PE<br />
			  Fones: 81 3221 0406</p>
			</div>
		</div>

		<table width='100%' border='1' bordercolor='#000000'>
		  <tr>
		   	<td colspan='2' align='center' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>
		   		<strong>RECIBO DE ENTREGA DA CARTEIRA PROFISSIONAL PARA ANOTAÇÕES</strong><p></p>
		    </td>
		  </tr>
		  <tr>
			<td colspan='2' align='left' height='30' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    	<strong>EMPRESA: COMPLEXO DE ENSINO RENATO SARAIVA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(00214)</strong>
		    </td>
		  <tr>
		    
		    <td width='330'  height='74' align='center' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
				<strong>Decreto Lei nº 229, de 28/02/1967 (Alterando o Art. 29 da Lei 5.452 - CLT)</strong>
		    </td>
		    
		    <td width='191'  height='74' align='right' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    	".Sede::Buscar($_SESSION["sede"])->getNome().", ".dataextenso(date("Y-m-d")).".
		    </td>
		    
		  </tr>
		  <tr>
			<td colspan='2' height='30' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    	Carteira Profissional Nº".$colaborador->getCarteiraTrabalho()."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Série: ".$colaborador->getCarteiraTrabalhoSerie()."
		    </td>
		  </tr>
		  <tr>
		  	<td colspan='2' height='30' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    	<strong>NOME:</strong>&nbsp;".strtoupper($colaborador->getNome())."; 
		    </td>
		  </tr>
		  <tr>
			<td colspan='2' align='center' height='74' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    	Recebemos a Carteira Profissional supra discriminada para atender as anotações necessárias e que será devolvida dentro de 48 horas, de acordo com a Lei em vigor
		    </td>
		  </tr>
		  <tr>
		    <td colspan='2' height='74' align='right' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    ___________________________________<br />
		    Assinatura do empregador
		    </td>
		  </tr>  
		</table><br />
		<hr /><p></p>		
		<table width='100%' border='1' bordercolor='#000000'>
		  <tr>
		   	<td colspan='2' align='center' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>
		   		<strong>COMPROVANTE DE DEVOLUÇÃO DA CARTEIRA PROFISSIONAL </strong><p></p>
		    </td>
		  </tr>
		  <tr>
			<td colspan='2' align='left' height='30' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    	<strong>EMPRESA: COMPLEXO DE ENSINO RENATO SARAIVA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(00214)</strong>
		    </td>
		  <tr>
		    
		    <td width='330' height='74' align='center' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
				
		    </td>
		    
		    <td width='191' align='right' height='30' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    	".Sede::Buscar($_SESSION["sede"])->getNome().", ".dataextenso(date("Y-m-d")).".
		    </td>
		    
		  </tr>
		  <tr>
			<td colspan='2' height='30' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    	Carteira Profissional Nº".$colaborador->getCarteiraTrabalho()."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Série: ".$colaborador->getCarteiraTrabalhoSerie()."
		    </td>
		  </tr>
		  <tr>
		  	<td colspan='2' height='30' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    	<strong>NOME:</strong>&nbsp;".strtoupper($colaborador->getNome())."; 
		    </td>
		  </tr>
		  <tr>
			<td colspan='2' height='74' align='center' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    	Recebi em devolução a Carteira Profissional supra discriminada com as respectivas anotações.
		    </td>
		  </tr>
		  <tr>
		    <td colspan='2' height='74' align='right' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><p></p>
		    ___________________________________<br />
		    Assinatura do empregador
		    </td>
		  </tr>  
		</table>
		
		<hr />
		<span style='font-family: Arial, Helvetica, sans-serif'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Complexo de Ensino Renato Saraiva | www.renatosaraiva.com.br | (081) 3221.0406</strong></span>
		";
		$pdf->WriteHTML($html);
		$pdf->Output("ReciboDeEntregaDaCarteiraProfissionalParaAnotacoes.pdf", "D");
		}
		
		function gerarValeTransportePedidoConcessao($colaborador){
		$pdf = new mPDF();		
		
		/*echo("<pre>");
		var_dump($colaborador->getAuxilioTransporteTipo());
		die();*/
			
		$pdf->debug = false;
		$html="<div style='height:160px;margin-bottom:20px;'>
			<img src='". IMG . "/" . "logocomplexo.jpg' style='float:left;' width='268' height='157'/>
			<div style='width:600px;float:right;'>
			  <p align='left' style='font-family: 'Times New Roman', Times, serif'>
				<span style='font-size: 20px;'>Complexo de Ensino Renato  Saraiva</span><br />
				Rua do Cupim, 44 — Graças<br />
				Recife — PE<br />
			  Fones: 81 3221 0406</p>
			</div>
		</div>
		<p align='center' style='font-family: Arial, Helvetica, sans-serif'><strong>VALE TRANSPORTE - PEDIDO DE CONCESSÃO</strong></p>
		<table width='100%' border='1'>
			  <tr>
			    <td width='23%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Empresa:</strong></td>
			    <td colspan='2' align='center' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>COMPLEXO DE ENSINO RENATO SARAIVA     (00214)</td>
			
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>CNPJ:</strong></td>
			    <td colspan='2' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>08.403.264/0001 - 06</td>
			
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Endereço:</strong></td>
			    <td width='47%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>Rua do Cupim, 44 - Graças, Recife/PE</td>
			    <td width='30%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Código CNAE:</strong> 58115</td>
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Atividade:</strong></td>
			    <td colspan='2' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>teste</td>
			
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Data de Requisição:</strong></td>
			    <td>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Mês de Utilização:</strong></td>
			  </tr>
			</table>
			<p>&nbsp;</p>
			
			<table width='100%' border='1'>
			  <tr>
			    <td width='16%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Funcionário:</strong></td>
			    <td colspan='2' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".strtoupper($colaborador->getNome())."</td>
			
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Endereço</strong></td>
			    <td colspan='2' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".$colaborador->getEndereco()."</td>
			
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Bairro</strong></td>
			    <td width='51%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".$colaborador->getBairro()."</td>
			    <td width='33%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Cidade:&nbsp;</strong>".$colaborador->getCidade()."</td>
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>CTPS:</strong></td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".$colaborador->getCarteiraTrabalho()."</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>CPF:&nbsp;</strong>".$colaborador->getCpf()."</td>
			  </tr>
			</table>
			<p>&nbsp;</p>
			<table width='100%' border='1'>
			  <tr>
			    <td colspan='6' align='center' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>TRANSPORTES UTILIZADOS POR DIA</strong></td>
			
			  </tr>
			  <tr>
			    <td colspan='3' align='center' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>RESIDÊNCIA PARA O TRABALHO</strong></td>
			    <td colspan='3' align='center' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>TRABALHO PARA A RESIDÊNCIA</strong></td>
			  </tr>
			  <tr>
			    <td width='11%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>CÓDIGO</strong></td>
			    <td width='23%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif' ><strong>TRANSPORTE USADO</strong></td>
			    <td width='14%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>PREÇO</strong></td>
			    <td width='11%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>CÓDIGO</strong></td>
			    <td width='29%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>TRANSPORTE USADO</strong></td>
			    <td width='12%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>PREÇO</strong></td>
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".$colaborador->getValeCasaTrabalho()."</td>   
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".$colaborador->getAuxilioTransporteTipo()->getNome()."</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>R$ ".formatMoney($colaborador->getAuxilioTransporteTipo()->getValor(), true)."</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".$colaborador->getValeTrabalhoCasa()."</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".$colaborador->getAuxilioTransporteTipo()->getNome()."</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>R$ ".formatMoney($colaborador->getAuxilioTransporteTipo()->getValor(), true)."</td>
			  </tr>
			  <tr>
			   	<td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;</td>
			  </tr>
			  <tr>
			    <td colspan='6' align='center' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>Código: 01 onibus - 02 metro - 03 barca - 04 trem</td>
			   
			  </tr>
			</table>
			
			<p></p>
			<p></p>
			<p></p>
		
			<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>			
				1.	Interessado em receber o VALE – TRANSPORTE, ciente da minha participação referente ao desconto e percentual que me cabe em meu contra – cheque, nos termos da lei nº. 7.418, 16 de dezembro 1985, forneço acima as informações necessárias.
			</p>
		
			<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
				2.	Comprometo – me a utilizar o VALE – TRANSPOSTE exclusivamente para os deslocamentos RESIDÊNCIA/TRABALHO – TRABALHO/RESIDÊNCIA, bem como manter atualizadas as informações acima prestadas. Declaro, ainda, que as informações supra são a expressão da verdade, ciente de que o erro nas mesmas, ou o uso indevido do VALE, construíra falta grave, ensejando punição, nos termos da legislação especificada.
			</p>
		
			<p align='justify' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".Sede::Buscar($_SESSION["sede"])->getNome().", ".dataextenso(date("Y-m-d")).".</p>
		
			<p align='justify' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________________________________________.<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(assinatura do empregado)</p>
			
			<p></p>
			<hr />
			<span style='font-family: Arial, Helvetica, sans-serif'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Complexo de Ensino Renato Saraiva | www.renatosaraiva.com.br | (081) 3221.0406</strong></span>		
		
		
		";
		$pdf->WriteHTML($html);		
		$pdf->Output("ValeTransportePedidoDeConcecao.pdf", "D");
		}
		
		function gerarValeTransporteDeclaracaoDeNaoBeneficiario($colaborador){
		$pdf = new mPDF();			
		$pdf->debug = false;
		$html="<div style='height:160px;margin-bottom:20px;'>
			<img src='". IMG . "/" . "logocomplexo.jpg' style='float:left;' width='268' height='157'/>
			<div style='width:600px;float:right;'>
			  <p align='left' style='font-family: 'Times New Roman', Times, serif'>
				<span style='font-size: 20px;'>Complexo de Ensino Renato  Saraiva</span><br />
				Rua do Cupim, 44 — Graças<br />
				Recife — PE<br />
			  Fones: 81 3221 0406</p>
			</div>
		</div>
		
		<p>&nbsp;</p>
		
		<p align='center' style='font-family: Arial, Helvetica, sans-serif'><strong>VALE TRANSPORTE – DECLARAÇÃO DE NÃO BENEFICIÁRIO</strong></p>
		
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		
		<table width='100%' border='1'>
			  <tr>
			    <td width='23%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Empresa:</strong></td>
			    <td colspan='2' align='center' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>COMPLEXO DE ENSINO RENATO SARAIVA     (00214)</td>
			
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>CNPJ:</strong></td>
			    <td colspan='2' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>08.403.264/0001 - 06</td>
			
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Endereço:</strong></td>
			    <td width='47%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>Rua do Cupim, 44 - Graças, Recife/PE</td>
			    <td width='30%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Código CNAE:</strong> 58115</td>
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Atividade:</strong></td>
			    <td colspan='2' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>teste</td>
			
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Data de Requisição:</strong></td>
			    <td>&nbsp;</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Mês de Utilização:</strong></td>
			  </tr>
			</table>
			<p>&nbsp;</p>
			
			<table width='100%' border='1'>
			  <tr>
			    <td width='16%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Funcionário:</strong></td>
			    <td colspan='2' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".strtoupper($colaborador->getNome())."</td>
			
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Endereço</strong></td>
			    <td colspan='2' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".$colaborador->getEndereco()."</td>
			
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Bairro</strong></td>
			    <td width='51%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".$colaborador->getBairro()."</td>
			    <td width='33%' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>Cidade:&nbsp;".$colaborador->getCidade()."</strong></td>
			  </tr>
			  <tr>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>CTPS:</strong></td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>".$colaborador->getCarteiraTrabalho()."</td>
			    <td style='font-size:12px; font-family:Arial, Helvetica, sans-serif'><strong>CPF:&nbsp;".$colaborador->getCpf()."</strong></td>
			  </tr>
			</table>
			<p></p>
			<p></p>
		
			<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>		
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Declaro para os devidos fins que não desejo usufruir do Benefício VALE TRANSPORTE instituído pela Lei Nº 7418/85, pelos motivos(s) abaixo expostos:
			</p>
			
			<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( ) Utilizo meio próprio de transporte
			</p>
			
			<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( ) Custo do meu transporte e inferior a 6% do meu salário
			</p>
			
			<p align='justify' style='font-size:11px; font-family:Arial, Helvetica, sans-serif'>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( ) Não Utilizo transporte por morar próximo ao local de trabalho
			</p>
			
			<p>&nbsp;</p>
			
			<p align='justify' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".Sede::Buscar($_SESSION["sede"])->getNome().", ".dataextenso(date("Y-m-d")).".</p>
		
		
			<p align='justify' style='font-size:12px; font-family:Arial, Helvetica, sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____________________________________________________.<br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(assinatura do empregado)</p>
			
			
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<hr />
			<span style='font-family: Arial, Helvetica, sans-serif'><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Complexo de Ensino Renato Saraiva | www.renatosaraiva.com.br | (081) 3221.0406</strong></span>		
		
		";
		$pdf->WriteHTML($html);		
		$pdf->Output("ValeTransporteDeclaracaoDeNaoBeneficiario.pdf", "D");
		}
		
		
		
		
		
		
		
				
		public function getConjuge(){
			return $this->conjuge;
		}		
		
		public function setConjuge($conjuge){
			$this->conjuge = $conjuge;
			
		}		
		public function getValeTrabalhoCasa(){
			return $this->valeTrabalhoCasa;
		}
		
		public function setValeTrabalhoCasa($valeTrabalhoCasa){
			$this->valeTrabalhoCasa = $valeTrabalhoCasa;
		}
		
		public function getValeCasaTrabalho(){
			return $this->valeCasaTrabalho;	
		}
		public function setValeCasaTrabalho($valeCasaTrabalho){
			$this->valeCasaTrabalho = $valeCasaTrabalho;	
		}
		
		public function getHorarioEntrada(){
			return $this->horarioEntrada;
		}
		
		public function setHorarioEntrada($horarioEntrada){
			$this->horarioEntrada = $horarioEntrada;	
		}
		
		public function getHorarioSaida(){
			return $this->horarioSaida;
		}
		public function setHorarioSaida($horarioSaida){
			$this->horarioSaida = $horarioSaida;
		}
		
		public function getHorarioIntervalo(){
			return $this->horarioIntervalo;
		}
		public function setHorarioIntervalo($horarioIntervalo){
			$this->horarioIntervalo = $horarioIntervalo;
		}
		public function getDuracaoIntervalo(){
			return $this->duracaoIntervalo;
		}
		public function setDuracaoIntervalo($duracaoIntervalo){
			$this->duracaoIntervalo = $duracaoIntervalo;
		}

		public function getTipo(){
			return $this->tipo;
		}
		public function setTipo($tipo){
			$this->tipo = $tipo;
		}
		
	    public function getId() {
	        return $this->id;
	    }
	
	    public function setId($id) {
	        $this->id = $id;
	    }
	
	    public function getNome() {
	        return $this->nome;
	    }
	
	    public function setNome($nome) {
	        $this->nome = $nome;
	    }
	
	    public function getEndereco() {
	        return $this->endereco;
	    }
	
	    public function setEndereco($endereco) {
	        $this->endereco = $endereco;
	    }
	
	    public function getBairro() {
	        return $this->bairro;
	    }
	
	    public function setBairro($bairro) {
	        $this->bairro = $bairro;
	    }
	
	    public function getCidade() {
	        return $this->cidade;
	    }
	
	    public function setCidade($cidade) {
	        $this->cidade = $cidade;
	    }
	
	    public function getUf() {
	        return $this->uf;
	    }
	
	    public function setUf($uf) {
	        $this->uf = $uf;
	    }
	
	    public function getCep() {
	        return $this->cep;
	    }
	
	    public function setCep($cep) {
	        $this->cep = $cep;
	    }
	
	    public function getFone() {
	        return $this->fone;
	    }
	
	    public function setFone($fone) {
	        $this->fone = $fone;
	    }
	
	    public function getCelular() {
	        return $this->celular;
	    }
	
	    public function setCelular($celular) {
	        $this->celular = $celular;
	    }
	
	    public function getDataNascimento() {
	        return $this->dataNascimento;
	    }
	
	    public function setDataNascimento($dataNascimento) {
	        $this->dataNascimento = $dataNascimento;
	    }
	
	    public function getMunicipioNascimento() {
	        return $this->municipioNascimento;
	    }
	
	    public function setMunicipioNascimento($municipioNascimento) {
	        $this->municipioNascimento = $municipioNascimento;
	    }
	
	    public function getUfNascimento() {
	        return $this->ufNascimento;
	    }
	
	    public function setUfNascimento($ufNascimento) {
	        $this->ufNascimento = $ufNascimento;
	    }
	
	    public function getNomePai() {
	        return $this->nomePai;
	    }
	
	    public function setNomePai($nomePai) {
	        $this->nomePai = $nomePai;
	    }
	
	    public function getNomeMae() {
	        return $this->nomeMae;
	    }
	
	    public function setNomeMae($nomeMae) {
	        $this->nomeMae = $nomeMae;
	    }
	
	    public function getEstadoCivil() {
	        return $this->estadoCivil;
	    }
	
	    public function setEstadoCivil($estadoCivil) {
	        $this->estadoCivil = $estadoCivil;
	    }
	
	    public function getRg() {
	        return $this->rg;
	    }
	
	    public function setRg($rg) {
	        $this->rg = $rg;
	    }
	
	    public function getOrgaoExpedidor() {
	        return $this->orgaoExpedidor;
	    }
	
	    public function setOrgaoExpedidor($orgaoExpedidor) {
	        $this->orgaoExpedidor = $orgaoExpedidor;
	    }
	
	    public function getDataExpedicao() {
	        return $this->dataExpedicao;
	    }
	
	    public function setDataExpedicao($dataExpedicao) {
	        $this->dataExpedicao = $dataExpedicao;
	    }
	
	    public function getHabilitacao() {
	        return $this->habilitacao;
	    }
	
	    public function setHabilitacao($habilitacao) {
	        $this->habilitacao = $habilitacao;
	    }
	
	    public function getHabilitacaoCategoria() {
	        return $this->habilitacaoCategoria;
	    }
	
	    public function setHabilitacaoCategoria($habilitacaoCategoria) {
	        $this->habilitacaoCategoria = $habilitacaoCategoria;
	    }
	
	    public function getHabilitacaoVencimento() {
	        return $this->habilitacaoVencimento;
	    }
	
	    public function setHabilitacaoVencimento($habilitacaoVencimento) {
	        $this->habilitacaoVencimento = $habilitacaoVencimento;
	    }
	
	    public function getTitulo() {
	        return $this->titulo;
	    }
	
	    public function setTitulo($titulo) {
	        $this->titulo = $titulo;
	    }
	
	    public function getTituloZona() {
	        return $this->tituloZona;
	    }
	
	    public function setTituloZona($tituloZona) {
	        $this->tituloZona = $tituloZona;
	    }
	
	    public function getTituloSecao() {
	        return $this->tituloSecao;
	    }
	
	    public function setTituloSecao($tituloSecao) {
	        $this->tituloSecao = $tituloSecao;
	    }
	
	    public function getCpf() {
	        return $this->cpf;
	    }
	
	    public function setCpf($cpf) {
	        $this->cpf = $cpf;
	    }
	
	    public function getCarteiraTrabalho() {
	        return $this->carteiraTrabalho;
	    }
	
	    public function setCarteiraTrabalho($carteiraTrabalho) {
	        $this->carteiraTrabalho = $carteiraTrabalho;
	    }
		
		public function getCarteiraTrabalhoSerie() {
	        return $this->carteiraTrabalhoSerie;
	    }
	
	    public function setCarteiraTrabalhoSerie($carteiraTrabalhoSerie) {
	        $this->carteiraTrabalhoSerie = $carteiraTrabalhoSerie;
	    }
	
	    public function getCarteiraUf() {
	        return $this->carteiraUf;
	    }
	
	    public function setCarteiraUf($carteiraUf) {
	        $this->carteiraUf = $carteiraUf;
	    }
	
	    public function getPis() {
	        return $this->pis;
	    }
	
	    public function setPis($pis) {
	        $this->pis = $pis;
	    }
	
	    public function getCertificadoReservista() {
	        return $this->certificadoReservista;
	    }
	
	    public function setCertificadoReservista($certificadoReservista) {
	        $this->certificadoReservista = $certificadoReservista;
	    }
	
	    public function getObservacoes() {
	        return $this->observacoes;
	    }
	
	    public function setObservacoes($observacoes) {
	        $this->observacoes = $observacoes;
	    }
	
	    public function getGrauInstrucao() {
	        return $this->grauInstrucao;
	    }
	
	    public function setGrauInstrucao($grauInstrucao) {
	        $this->grauInstrucao = $grauInstrucao;
	    }
	
	    public function getDiaContratoExperiencia() {
	        return $this->diaContratoExperiencia;
	    }
	
	    public function setDiaContratoExperiencia($diaContratoExperiencia) {
	        $this->diaContratoExperiencia = $diaContratoExperiencia;
	    }
	
	    public function getDepartamento() {
	        return $this->departamento;
	    }
	
	    public function setDepartamento($departamento) {
	        $this->departamento = $departamento;
	    }
	
	    public function getFuncao() {
	        return $this->funcao;
	    }
	
	    public function setFuncao($funcao) {
	        $this->funcao = $funcao;
	    }
	
	    public function getSalarioContratual() {
	        return $this->salarioContratual;
	    }
	
	    public function setSalarioContratual($salarioContratual) {
	        $this->salarioContratual = $salarioContratual;
	    }
	
	    public function getAdiantamentoQuinzenal() {
	        return $this->adiantamentoQuinzenal;
	    }
	
	    public function setAdiantamentoQuinzenal($adiantamentoQuinzenal) {
	        $this->adiantamentoQuinzenal = $adiantamentoQuinzenal;
	    }
	
	    public function getSede() {
	        return $this->sede;
	    }
	
	    public function setSede($sede) {
	        $this->sede = $sede;
	    }
	
	    public function getAuxilioTransporteTipo() {
	        return $this->auxilioTransporteTipo;
	    }
	
	    public function setAuxilioTransporteTipo($auxilioTransporteTipo) {
	        $this->auxilioTransporteTipo = $auxilioTransporteTipo;
	    }
	
	    
	    public function getFilhos() {
	        return $this->filhos;
	    }
	
	    public function setFilhos($filhos) {
	        $this->filhos = $filhos;
	    }
	
		public function getPendente() {
	        return $this->pendente;
	    }
	
	    public function setPendente($pendente) {
	        $this->pendente = $pendente;
	    }

	    public function getPossuiAlimentacao(){
	    	return $this->possuiAlimentacao;
	    }
	    
	    public function setPossuiAlimentacao($possuiAlimentacao){
	    	$this->possuiAlimentacao = $possuiAlimentacao;
	    }
			
	    public function getPossuiTransporte(){
	    	return $this->possuiTransporte;
	    }
	    
	     public function setPossuiTransporte($possuiTransporte){
	    	$this->possuiTransporte = $possuiTransporte;	
	    }
	
		public function setAuxAlimentacaoTipo($auxAlimentacaoTipo){
			$this->auxAlimentacaoTipo = $auxAlimentacaoTipo;
		}
		
		public function getAuxAlimentacaoTipo(){
			return $this->auxAlimentacaoTipo;
		}
		
		public function getStatus(){
			return $this->status;
		}
		
		public function setStatus($status){
			$this->status = $status;
		}
		
		public function getDataAdmissao(){
			return $this->dataAdmissao;
		}

		public function setDataAdmissao($dataAdmissao){
			$this->dataAdmissao = $dataAdmissao;
		}

		public function getDataDemissao(){
			return $this->dataDemissao;
		}

		public function setDataDemissao($dataDemissao){
			$this->dataAdmissao = $dataDemissao;
		}			
}
?>