<?php
/**
 * Classe ProspeccaoControll
 * Controlador do modulo de prospeccao
 * @package controll
 * @author LucasMichel
 */
	class ProspeccaoControll extends Controll {
		
            /**
                * Constante referente ao número do modulo
                */
            const MODULO = 4;
            private $ENTIDADE = 'prospeccao';

            /**
                * Acao index()
                */
            public function index(){
                    // código da ação //
                    static $acao = 1;
                    // definindo a tela //
                    $this->setTela('listar',array($this->ENTIDADE));
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
                    $instancia = Prospeccao::buscar($id);
                    // jogando o usuário no atributo $dados do controlador //
                    $this->setDados($instancia,'VIEW');
                    // definindo a tela //
                    $this->setTela('ver',array($this->ENTIDADE));
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
                        $this->setTela('add',array($this->ENTIDADE));
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
            private function _add($objeto){
                    $usuario = $this->getUsuario();
                    $projeto = Projeto::buscar($_SESSION["idProjeto"]);                           
                
                    $instancia = new Prospeccao(0,$objeto['elevacao'], $objeto['coordenada_UTM_N'], $objeto['coordenada_UTM_E'], $objeto['ponto_de'], $objeto['observacao'], $projeto, $usuario);
                
                    // persistindo em inserir o usuário //
                    try {
                            $instancia->inserir();
                            // setando a mensagem de sucesso //
                            $this->setFlash('Prospecção cadastrada com sucesso.');
                            // setando a url //
                            $this->setPage();
                    }
                    // capturando a excessão CamposObrigatorios //
                    catch(CamposObrigatorios $e){
                            // setando a mensagem de excessão //
                            $this->setFlash($e->getMessage());
                            // definindo a tela //
                            $this->setTela('add',array($this->ENTIDADE));
                    }
            }

            /**
                * Acao editar($id)
                * @param $id
                */
            public function editar($id){
                    // código da ação //
                    static $acao = 2;
                    // Buscando o usuário //
                    $projeto = Projeto::buscar($id);
                    // checando se o formulário nao foi passado //
                    if(!$this->getDados('POST')){
                            // Jogando perfil no atributo $dados do controlador //
                            $this->setDados($projeto,'VIEW');
                            // Definindo a tela //
                            $this->setTela('editar',array($this->ENTIDADE));
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
            private function _editar($objeto){                
                    $usuario = $this->getUsuario();
                    $projeto = Projeto::buscar($_SESSION["idProjeto"]);
                    
                    $instancia = new Prospeccao($objeto['id'],$objeto['elevacao'], $objeto['coordenada_UTM_N'], $objeto['coordenada_UTM_E'], $objeto['ponto_de'], $objeto['observacao'], $projeto, $usuario);
                
                    try {
                            $instancia->editar();
                            $this->setFlash('Prospecção editada com sucesso');
                            $this->setPage();
                    }
                    catch(CamposObrigatorios $e){
                            $this->setFlash($e->getMessage());
                            $this->setDados($instancia,'VIEW');
                            $this->setTela('editar',array($this->ENTIDADE));
                    }
            }
            /**
                * Acao excluir($id)
                * @param $id
                */
            public function excluir($id){
                    // código da ação //
                    static $acao = 2;
                    // buscando o usuário //			
                    $projeto = Projeto::buscar($id);
                    // checando se o usuário a ser excluído é diferente do logado //
                    if($projeto->getId() != parent::getUsuario()->getId()){
                            // excluíndo ele //
                            $usuario->excluir();
                            // setando mensagem de sucesso //
                            $this->setFlash('Usuário excluído com sucesso.');
                    }
                    else
                            $this->setFlash('Você não pode se auto-excluir.');
                    // setando a url //
                    $this->setPage();
            }
	}
?>