<?php
/**
 * Classe UsuarioControll
 * Controlador do modulo de usuários
 * @package controll
 * @author Idealizza
 */
	class UsuarioControll extends Controll {
		
		/**
		 * Constante referente ao número do modulo
		 */
		const MODULO = 1;
		
		/**
		 * Acao index()
		 */
		public function index(){
			// código da ação //
			static $acao = 1;
			// definindo a tela //
			$this->setTela('listar',array('usuario'));
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
			$usuario = Usuario::buscar($id);
			// jogando o usuário no atributo $dados do controlador //
			$this->setDados($usuario,'VIEW');
			// definindo a tela //
			$this->setTela('ver',array('usuario'));
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
                            $this->setTela('add',array('usuario'));
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
			$usuario = new Usuario(0,(!empty($dados['perfil'])) ? Perfil::buscar($dados['perfil']) : null,$dados['login'],$dados['senha']);
			// persistindo em inserir o usuário //
			try {
				$usuario->inserir();
				// setando a mensagem de sucesso //
				$this->setFlash('Usuário cadastrado com sucesso.');
				// setando a url //
				$this->setPage();
			}
			// capturando a excessão CamposObrigatorios //
			catch(CamposObrigatorios $e){
				// setando a mensagem de excessão //
				$this->setFlash($e->getMessage());
				// definindo a tela //
				$this->setTela('add',array('usuario'));
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
			$usuario = Usuario::buscar($id);
			// checando se o formulário nao foi passado //
			if(!$this->getDados('POST')){
				// Jogando perfil no atributo $dados do controlador //
				$this->setDados($usuario,'VIEW');
				// Definindo a tela //
				$this->setTela('editar',array('usuario'));
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
			$usuario = new Usuario($dados['id'],(!empty($dados['perfil'])) ? Perfil::buscar($dados['perfil']) : null,$dados['login'],
								   $dados['senha']);
			try {
				$usuario->editar();
				$this->setFlash('Usuário editado com sucesso');
				$this->setPage();
			}
			catch(CamposObrigatorios $e){
				$this->setFlash($e->getMessage());
				$this->setDados($usuario,'VIEW');
				$this->setTela('editar',array('usuario'));
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
			$usuario = Usuario::buscar($id);
			// checando se o usuário a ser excluído é diferente do logado //
			if($usuario->getId() != parent::getUsuario()->getId()){
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

		/**
		 * Acao trocarSenha()
		 */
		public function trocarSenha(){
			(!$this->getDados('POST')) ? $this->setTela('trocarSenha',array('usuario'))
									   : $this->_trocarSenha($this->getDados('POST'));
		}

		/**
		 * Metodo _trocarSenha($dados)
		 * @param $dados
		 */
		private function _trocarSenha($dados){
			try {
				parent::getUsuario()->trocarSenha($dados['senhaAtual'],$dados['novaSenha']);
				$this->setFlash('Senha trocada com sucesso.');
				$this->setPage();
			}
			catch(SenhaInvalida $e){
				$this->setFlash($e->getMessage());
				$this->setTela('trocarSenha',array('usuario'));
			}
		}
		
	}
?>