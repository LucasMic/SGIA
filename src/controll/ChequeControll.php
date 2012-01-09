<?php
/**
 * Classe ChequeControll
 * Controlador do modulo de cheque
 * @package controll
 * @author Idealizza
 */
	class ChequeControll extends Controll {
		
		/**
		 * Constante referente ao número do modulo
		 */
		const MODULO = 8;
		
		/**
		 * Acao index()
		 */
		public function index(){
			// código da ação //
			static $acao = 1;
			// definindo a tela //
			$this->setTela('listar',array('cheque'));
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
			$cheque = Cheque::buscar($id);
			// jogando o usuário no atributo $dados do controlador //
			$this->setDados($cheque,'VIEW');
			// definindo a tela //
			$this->setTela('ver',array('cheque'));
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
                            $this->setTela('add',array('cheque'));
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
			$cheque = new Cheque();
			// persistindo em inserir o usuário //
			try {
				$cheque->inserir();
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
				$this->setTela('add',array('cheque'));
			}
		}
		
		/**
		 * Acao editar($id)
		 * @param $id
		 */
		public function mudarSituacao($id){
			// código da ação //
			static $acao = 3;
			// Buscando o usuário //
			$cheque = Cheque::buscar($id);
			// checando se o formulário nao foi passado //
			
			try {
				$cheque->mudarSituacao();
				$this->setFlash('Situação editada com sucesso');
				$this->setPage();
			}
			catch(CamposObrigatorios $e){
				$this->setFlash($e->getMessage());
				$this->setDados($cheque,'VIEW');
				$this->setTela('ver',array('cheque'));
			}
			
		}
		
		public function darBaixa($id){
			// código da ação //
			static $acao = 3;
			// Buscando o usuário //
			$cheque = Cheque::buscar($id);
			// checando se o formulário nao foi passado //
			
			try {
				$cheque->darBaixa();
				$this->setFlash('Baixa editada com sucesso');
				$this->setPage();
			}
			catch(CamposObrigatorios $e){
				$this->setFlash($e->getMessage());
				$this->setDados($cheque,'VIEW');
				$this->setTela('ver',array('cheque'));
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
			$cheque = Cheque::buscar($id);
			// checando se o usuário a ser excluído é diferente do logado //
			if($cheque->getId() != parent::getCheque()->getId()){
				// excluíndo ele //
				$cheque->excluir();
				// setando mensagem de sucesso //
				$this->setFlash('Funcionário/Estagiário excluído com sucesso.');
			}
			// setando a url //
			$this->setPage();
		}
		
	}
?>