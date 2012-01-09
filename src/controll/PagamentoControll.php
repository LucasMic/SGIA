<?php
/**
 * Classe RhControll
 * Controlador do modulo de rh
 * @package controll
 * @author Idealizza
 */
	class PagamentoControll extends Controll {
		
		/**
		 * Constante referente ao número do modulo
		 */
		const MODULO = 10;
		
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
			$rh = Rh::buscar($id);
			// jogando o usuário no atributo $dados do controlador //
			$this->setDados($rh,'VIEW');
			// definindo a tela //
			$this->setTela('ver',array('rh'));
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
		private function _add($dados){
			// instanciando o novo Usuário //
			$rh = new Rh();
			// persistindo em inserir o usuário //
			try {
				$rh->inserir();
				// setando a mensagem de sucesso //
				$this->setFlash('Funcionário/Estagiário cadastrado com sucesso.');
				// setando a url //
				$this->setPage();
			}
			// capturando a excessão CamposObrigatorios //
			catch(CamposObrigatorios $e){
				// setando a mensagem de excessão //
				$this->setFlash($e->getMessage());
				// definindo a tela //
				$this->setTela('add',array('rh'));
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
			$rh = Rh::buscar($id);
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
		
		/**
		 * Metodo _editar($dados)
		 * @param $dados
		 * @return Usuario
		 */
		private function _editar($dados){
			$rh = new Rh();
			try {
				$rh->editar();
				$this->setFlash('Funcionário/Estagiário editado com sucesso');
				$this->setPage();
			}
			catch(CamposObrigatorios $e){
				$this->setFlash($e->getMessage());
				$this->setDados($rh,'VIEW');
				$this->setTela('editar',array('rh'));
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
			$rh = Rh::buscar($id);
			// checando se o usuário a ser excluído é diferente do logado //
			if($rh->getId() != parent::getRh()->getId()){
				// excluíndo ele //
				$rh->excluir();
				// setando mensagem de sucesso //
				$this->setFlash('Funcionário/Estagiário excluído com sucesso.');
			}
			// setando a url //
			$this->setPage();
		}
		
	}
?>