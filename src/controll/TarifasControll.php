<?php
/**
 * Classe TarifasControll
 * Controlador do modulo de tarifas
 * @package controll
 * @author Idealizza
 */

	class TarifasControll extends Controll{

		/**
		 * Constante referente ao número do modulo
		 */
		const MODULO = 13;
		
		/**
		 * Acao index()
		 */
		public function index(){
			// código da ação //
			static $acao = 1;
			// definindo a tela //
			$this->setTela('listar',array('tarifas'));
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
			// buscando a tarifa //
			$tarifa = TipoAuxTransporte::buscar($id);
			// jogando a tarifa no atributo $dados do controlador //
			$this->setDados($tarifa,'VIEW');
			// definindo a tela //
			$this->setTela('ver',array('tarifas'));
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
                            $this->setTela('add',array('tarifas'));
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
			// instanciando a nova tarifa //
			$tipoAuxTrasnporte = new TipoAuxTransporte(0, $dados["nome_tarifa"], $dados["valor_tarifa"], Sede::buscar($_SESSION["sede"]));
			// persistindo em inserir tarifa //
			try {
				$tipoAuxTrasnporte->inserir();
				// setando a mensagem de sucesso //
				$this->setFlash('Tarifa cadastrada com sucesso.');
				// setando a url //
				$this->setPage();
			}
			// capturando a excessão CamposObrigatorios //
			catch(CamposObrigatorios $e){
				// setando a mensagem de excessão //
				$this->setFlash($e->getMessage());
				// definindo a tela //
				$this->setTela('add',array('tarifas'));
			}
		}		
		
		
		/**
		 * Acao editar($id)
		 * @param $id
		 */
		public function editar($id){
			// código da ação //
			static $acao = 2;
			// Buscando a tarifa //
			$tipoAuxTrasnporte = TipoAuxTransporte::buscar($id);
			// checando se o formulário nao foi passado //
			if(!$this->getDados('POST')){
				// Jogando perfil no atributo $dados do controlador //
				$this->setDados($tipoAuxTrasnporte,'VIEW');
				// Definindo a tela //
				$this->setTela('editar',array('tarifas'));
			}
			// caso passar o formulario //
			else
				// chamando o metodo privado _editar() passando os dados do post por parametro //
				$this->_editar($this->getDados('POST'));
		}		
		
		
		
		/**
		 * Metodo _editar($dados)
		 * @param $dados
		 * @return TipoAuxTrasnporte
		 */
		private function _editar($dados){
			$tipoAuxTrasnporte = new TipoAuxTransporte($dados["id"], $dados["nome"], $dados["valor"], Sede::buscar($_SESSION["sede"]));
			try {
				$tipoAuxTrasnporte->editar();
				$this->setFlash('Tarifa editada com sucesso');
				$this->setPage();
			}
			catch(CamposObrigatorios $e){
				$this->setFlash($e->getMessage());
				$this->setDados($tipoAuxTrasnporte,'VIEW');
				$this->setTela('ver',array('tarifas'));
			}
			
		}		
		
		public function verificaExistencia(){
			$tipoTarifa = TipoAuxTransporte::montarObjeto($_GET);		
			if(TipoAuxTransporte::testaExistencia($tipoTarifa)){			
				echo "ok";
			} else {
				echo "erro";
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
			$tipoAuxTrasnporte = TipoAuxTransporte::buscar($id);
			// checando se o usuário a ser excluído é diferente do logado //
			// excluíndo ele //
			$tipoAuxTrasnporte->excluir();
			// setando mensagem de sucesso //
			$this->setFlash('Tarifa excluído com sucesso.');
			// setando a url //
			$this->setPage();
		}		
	}
?>