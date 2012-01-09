<?php
/**
 * Classe TipoPagamento
 * @package model
 * @author Idealizza
 */
	class TipoPagamento {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $nome;
		
		
		public function __construct($id = 0, $nome = ""){
			$this->id = $id;
			$this->nome = $nome;
			
		}
		
		/**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){
			if($this->getNome() == "")
				return false;
			return true;
		}
		
		/**
		 * Metodo listar()
		 * @return TipoPagamento[]
		 */
		public static function listar(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TipoPagamentoDAO::getInstancia();
			// executando o metodo //
			$tipoPagamentos = $instancia->listar();
			// checando se o retorno foi falso //
			if(!$tipoPagamentos)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::TIPOPAGAMENTOS);
			// percorrendo os usuarios //
			foreach($tipoPagamentos as $tipoPagamento){
				// instanciando e jogando dentro da colecao $objetos o TipoPagamento //
				$objetos[] = new TipoPagamento($tipoPagamento['id'],$tipoPagamento['nome']);
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return TipoPagamento
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TipoPagamentoDAO::getInstancia();
			// executando o metodo //
			$tipoPagamento = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$tipoPagamento)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::TIPOPAGAMENTO);
			// instanciando e retornando o TipoPagamento //
			return new TipoPagamento($tipoPagamento['id'],$tipoPagamento['nome']);
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



	}
?>