<?php
/**
 * Classe PerfilControll
 * Controlador do modulo de perfis
 * @package controll
 * @author Idealizza
 */
	class PerfilControll extends Controll {
		
		/**
		 * Constante referente ao número do modulo
		 */
		const MODULO = 2;

		/**
		 * Acao index()
		 */
		public function index(){
			// Codigo da ação //
			static $acao = 1;
			// Definindo a tela //
			$this->setTela('listar',array('perfil'));
			// Guardando a url //
			$this->getPage();
		}

		/**
		 * Acao ver($id)
		 * @param $id
		 */
		public function ver($id){
			// Código da ação //
			static $acao = 1;
			// Buscando o perfil //
			$perfil = Perfil::buscar($id);
			// Jogando o perfil no atributo $dados do controlador //
			$this->setDados($perfil,'VIEW');
			// Definindo a tela //
			$this->setTela('ver',array('perfil'));
		}
		
		/**
		 * Acao add()
		 */
		public function add(){
			// Código da ação //
			static $acao = 2;
			// checando se o formulário nao foi passado //
			if(!$this->getDados('POST'))
				//  definindo a  tela //
				$this->setTela('add',array('perfil'));
			// caso passar o formulário //
			else
				// chamando o metodo privado _add() passando os dados do post por parametro //
				$this->_add($this->getDados('POST'));
		}
		
		/**
		 * Metodo _add($dados)
		 * @param $dados
		 * @return Perfil
		 */
		private function _add($dados){
			// recuperando os dados dos checkboxes //
			foreach($dados as $diretiva => $value){
				if(substr($diretiva, 0, 2) == 'ch'){
					$temp = explode('_',$diretiva);
					$checks[] = array('modulo' => $temp[1],'acao' => $temp[2]);
				}
			}
			// verificando se o array $checks existe //
			if(isset($checks)){
				// percorrendo //
				foreach($checks as $acao){
					// buscando a ação e jogando dentro da coleção $acoes //
					$acoes[] = Acao::buscar($acao['acao'],$acao['modulo']); 
				}
			}
			// instanciando o novo perfil //
			$perfil = new Perfil(0,$dados['nome'],(isset($acoes)) ? $acoes : null, Sede::buscar($_SESSION["sede"]));
			// persistindo em inserir o perfil //
			try {
				$perfil->inserir();
				// setando a mensagem de sucesso //
				$this->setFlash('Perfil Cadastrado com sucesso');
				// setando a url //
				$this->setPage();
			}
			// tratando a excessao CamposObrigatorios //
			catch(CamposObrigatorios $e){
				// setando a mensagem de excessao //
				$this->setFlash($e->getMessage());
				// definindo a tela //
				$this->setTela('add',array('perfil'));
			}
		}
		
		/**
		 * Acao editar($id)
		 * @param $id
		 */
		public function editar($id){
			// Código da ação //
			static $acao = 2;
			// Buscando o perfil //
			$perfil = Perfil::buscar($id);
			// checando se o formulário nao foi passado //
			if(!$this->getDados('POST')){
				// Jogando perfil no atributo $dados do controlador //
				$this->setDados($perfil,'VIEW');
				// Definindo a tela //
				$this->setTela('editar',array('perfil'));
			}
			// caso passar o formulario //
			else
				// chamando o metodo privado _editar() passando os dados do post por parametro //
				$this->_editar($this->getDados('POST'));
		}
		
		/**
		 * Metodo _editar($dados)
		 * @param $dados
		 * @return Perfil
		 */
		private function _editar($dados){
			// recuperando os dados dos checkboxes //
			foreach($dados as $diretiva => $value){
				if(substr($diretiva, 0, 2) == 'ch'){
					$temp = explode('_',$diretiva);
					$checks[] = array('modulo' => $temp[1],'acao' => $temp[2]);
				}
			}
			// verificando se o array $checks existe //
			if(isset($checks)){
				// percorrendo //
				foreach($checks as $acao){
					// buscando a ação e jogando dentro da coleção $acoes //
					$acoes[] = Acao::buscar($acao['acao'],$acao['modulo']); 
				}
			}
			// instanciando o perfil antigo, com os novos dados //
			$perfil = new Perfil($dados['id'],$dados['nome'],(isset($acoes)) ? $acoes : null);
			// persistindo em editar o objeto //
			try {
				$perfil->editar();			
				
				
				
				// checando se o usuário logado, possui o mesmo perfil e atualizando o perfil //
				if(parent::getUsuario()->getPerfil()->getId() == $perfil->getId()){
					$usuario = parent::getUsuario();				
					$usuario->setPerfil($perfil);
					parent::setUsuario($usuario);						
				}
				// setando a mensagem de sucesso //
				$this->setFlash('Perfil Editado com sucesso.');
				// definindo a url //
				$this->setPage();
			}
			// capturando a excessao CamposObrigatorios //
			catch(CamposObrigatorios $e){
				// setando a mensagem de excessao //
				$this->setFlash($e->getMessage());
				// Definindo a tela //
				$this->setTela('editar',array('perfil'));
			}
		}
		
		/**
		 * Acao excluir($id)
		 * @param $id
		 */
		public function excluir($id){
			// Código da ação //
			static $acao = 2;
			// Buscando o perfil //			
			$perfil = Perfil::buscar($id);
			// persistindo em excluir o perfil //
			try {
				$perfil->excluir();
				// setando mensagem de sucesso //
				$this->setFlash('Perfil excluído com sucesso.');
			}
			// capturando a excessão //
			catch(RegistroNaoExcluido $e){
				$this->setFlash($e->getMessage());
			}
			// setando a url //
			$this->setPage();
		}

	}
?>