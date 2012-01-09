<?php
/**
 * Classe DefaultControll
 * Controlador default da aplicação
 * @package controll
 * @author Idealizza
 */
	class DefaultControll extends Controll {

		/**
		 * Acao index()
		 */
		public function index(){
			$this->setTela(($this->getUsuario()) ? 'home' : 'login');
			$this->getPage();
		}

		/**
		 * Acao logar()
		 * Verifica se foram passados os dados do formulário POST
		 */
		public function logar(){
			parent::getUsuario() ? $this->setTela('home')
			   				     : ($this->getDados('POST') ? $this->_logar($this->getDados('POST'))
														    : $this->setTela('login'));
		}

		/**
		 * Metodo _logar($dados)
		 * Persiste em logar o usuário com os dados passados por parametro no formulário
		 * @param $dados
		 */
		private function _logar($dados){
			/**
			 * Persistindo em logar
			 */
			try {
				$usuario = Usuario::logar($dados['login'],$dados['senha']);

				//$_SESSION["sede"] = $usuario->getSedes()->getId();

				//guardando o usuário no controlador
				$this->setUsuario($usuario);
				//recuperando se houver alguma url guardada
				$urlRecover = $this->getUrlRecover();
				//redirecionando
				header("Location: " . (($urlRecover) ? $urlRecover : 'index'));
			}

			/**
			 * Capturando a excessão CamposObrigatorios
			 */
			catch(CamposObrigatorios $e){
				$this->setFlash($e->getMessage());
				$this->setTela('login');
			}

			/**
			 * Capturando a excessão LoginInvalido
			 */
			catch(LoginInvalido $e){
				$this->setFlash($e->getMessage());
				$this->setTela('login');
			}
		}

		/**
		 * Acao logout()
		 * Destroi a sessão e redireciona para a tela default de login
		 */
		public function logout(){
			session_destroy();
			header("Location: index");
		}

		public function voltar(){
			$this->setPage();
		}
	} ?>