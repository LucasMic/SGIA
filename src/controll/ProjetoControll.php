<?php
/**
 * Classe UsuarioControll
 * Controlador do modulo de usuários
 * @package controll
 * @author Idealizza
 */
	class ProjetoControll extends Controll {
		
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
                    $this->setTela('listar',array('projeto'));
                    // guardando a url //
                    $this->getPage();
            }

            /**
                * Acao ver($id)
                * @param $id
                */
            public	
                function ver($id){
                    // código da ação //
                    static $acao = 1;
                    // buscando o usuário //
                    $projeto = Projeto::buscar($id);
                    // jogando o usuário no atributo $dados do controlador //
                    $this->setDados($projeto,'VIEW');
                    // definindo a tela //
                    $this->setTela('ver',array('projeto'));
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
                        $this->setTela('add',array('projeto'));
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
                    $instancia = new Projeto(0,$dados['nome'],$dados['descricao'],
                                            $dados['introducao'], $dados['metodologia'],
                                            $dados['descricaoAreaPesquisa'], $dados['consideracoesGeraisRecomendacoes'], $this->getUsuario());
                    
                    // persistindo em inserir o usuário //
                    try {
                            $instancia->inserir();
                            // setando a mensagem de sucesso //
                            $this->setFlash('Projeto cadastrado com sucesso.');
                            // setando a url //
                            $this->setPage();
                    }
                    // capturando a excessão CamposObrigatorios //
                    catch(CamposObrigatorios $e){
                            // setando a mensagem de excessão //
                            $this->setFlash($e->getMessage());
                            // definindo a tela //
                            $this->setTela('add',array('projeto'));
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
                            $this->setTela('editar',array('projeto'));
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
                    $projeto = new Projeto($dados['id'],                        
                    $dados['nome'],
                    $dados['descricao']);
                    try {
                            $projeto->editar();
                            $this->setFlash('Projeto editado com sucesso');
                            $this->setPage();
                    }
                    catch(CamposObrigatorios $e){
                            $this->setFlash($e->getMessage());
                            $this->setDados($projeto,'VIEW');
                            $this->setTela('editar',array('projeto'));
                    }
            }

            /*public function mudarSede(){

                    $_SESSION["sede"] = $_POST["ns"];
                    $this->setPage();
            }*/		

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