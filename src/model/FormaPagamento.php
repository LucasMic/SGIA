<?php
/**
 * Classe FormaPagamento
 * @package model
 * @author Idealizza
 */
	class FormaPagamento {
		
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
		 * Metodo listar()
		 * @return FormaPagamento[]
		 */
		public static function listar(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = FormaPagamentoDAO::getInstancia();
			// executando o metodo //
			$formaPagamentos = $instancia->listar();
			// checando se o retorno foi falso //
			if(!$formaPagamentos)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::FORMASPAGAMENTOS);
			// percorrendo os usuarios //
			foreach($formaPagamentos as $formaPagamento){
				// instanciando e jogando dentro da colecao $objetos o FormaPagamento //
				$objetos[] = new FormaPagamento($formaPagamento['id'], $formaPagamento['nome']);
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return FormaPagamento
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //			
			$instancia = FormaPagamentoDAO::getInstancia();
			// executando o metodo //
			$formaPagamento = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$formaPagamento)				
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::PAGAMENTOSFORMA);
			// instanciando e retornando o FormaPagamento //			
			return new FormaPagamento($formaPagamento['id'], $formaPagamento['nome']);
		}
		
		/**
		 * Metodos getters() e setters()
		 */
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}

	}
?>