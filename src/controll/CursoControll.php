<?php
/**
 * Classe RhControll
 * Controlador do modulo de curso
 * @package controll
 * @author Idealizza
 */
	class CursoControll extends Controll {
		
		/**
		 * Constante referente ao número do modulo
		 */
		const MODULO = 4;
		
		/**
		 * Acao index()
		 */
		public function index(){
			// código da ação //
			static $acao = 1;
			// definindo a tela //
			$this->setTela('listar',array('curso'));
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
			$curso = Curso::buscar($id);
			// jogando o usuário no atributo $dados do controlador //
			$this->setDados($curso,'VIEW');
			// definindo a tela //
			$this->setTela('ver',array('curso'));
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
                            $this->setTela('add',array('curso'));
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
			// instanciando o novo Usuário //			
			$curso = new Curso(0, $dados['nome'],$dados['dataEncerramento'], $dados["dataEncerramentoPromocional"], $dados['valor'], $dados['valorPromocional'], Sede::buscar($_SESSION["sede"]));		
			// persistindo em inserir o usuário //
			try {
				$curso->inserir();
                if($dados["tem_convenio"]==1){
                    if(isset($dados["convenio"])){
                        foreach($dados["convenio"] as $dadosConvenios){
                            $convenio = new Convenio(0, $dadosConvenios["nome"], $dadosConvenios["valor"], Sede::buscar($_SESSION["sede"]), $curso);
                            $convenio->inserir();
                        }
                    }
                }

				// setando a mensagem de sucesso //
				$this->setFlash('Curso cadastrado com sucesso.');
				// setando a url //
				$this->setPage();
			}
			// capturando a excessão CamposObrigatorios //
			catch(CamposObrigatorios $e){
				// setando a mensagem de excessão //
				$this->setFlash($e->getMessage());
				// definindo a tela //
				$this->setTela('add',array('curso'));
			}
		}
		
		/**
		 * Acao editar($id)
		 * @param $id
		 */
		public function editar($id){
			// código da ação //
			static $acao = 3;
			// Buscando o usuário //
			$curso = Curso::buscar($id);		
			
			// checando se o formulário nao foi passado //
			$curso->setValor(Curso::buscarUltimoValor($curso->getId()));
			
			if(!$this->getDados('POST')){
				// Jogando perfil no atributo $dados do controlador //
				$this->setDados($curso,'VIEW');
				// Definindo a tela //
				$this->setTela('editar',array('curso'));
			}
			// caso passar o formulario //
			else			
			
				// chamando o metodo privado _editar() passando os dados do post por parametro //				
				$this->_editar($this->getDados('POST'));
		}
		
		/**
		 * Metodo _editar($dados)
		 * @param $dados
		 * @return Usuario
		 */
		private function _editar($dados){		
									
			$curso = new Curso($dados['id'], $dados['nome'],$dados['data_encerramento'], $dados['data_encerramento_promocional'], $dados['valor'], $dados['valor_promocional'], Sede::buscar($_SESSION["sede"]));
			try {
				$curso->editar();
				$this->setFlash('Curso editado com sucesso');
				$this->setPage();
			}
			catch(CamposObrigatorios $e){
				$this->setFlash($e->getMessage());
				$this->setDados($curso,'VIEW');
				$this->setTela('ver',array('curso'));
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
			$curso = Curso::buscar($id);
			// excluíndo ele //
			$a = $curso->excluir();
            
            if ($a==false){
                $this->setFlash('Curso vinculado a alguma matricula não pode ser excluido.');
                $this->setPage();
            }else{            
                // setando mensagem de sucesso //
                $this->setFlash('Curso excluído com sucesso.');
                // setando a url //
                $this->setPage();            
            }
		}
		
		/**
		 * Metodo cursoValido($_GET)
		 * @param $_GET
		 * @return $valorfinal
		 */
		public function cursoValido(){
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
		
		
		
		
		
		
		
	}
?>