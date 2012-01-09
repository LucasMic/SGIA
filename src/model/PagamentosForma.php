<?php
/**
 * Classe Matricula
 * @package model
 * @author Idealizza
 */
	class PagamentosForma {		
		/**
		 * Atributos
		 */		
		private $id;
		private $nome;
		
		function __construct($id = 0, $nome = "") {
            $this->id = $id;
            $this->nome = $nome;        
        }
        
        
		/**
		 * Metodo inserir()
		 * @return Matricula
		 */
		public function inserir(){
			// validando os campos //
			$instancia = PagamentosFormaDAO::getInstancia();
			// executando o metodo //
			$PagamentosForma = $instancia->inserir($this);
			// retornando o Matricula //
			return $PagamentosForma;
		}
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = PagamentosFormaDAO::getInstancia();
			// executando o metodo //
			$PagamentosForma = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $PagamentosForma;
		}		
		
		/**
		 * Metodo listar()
		 * @return PagamentosForma[]
		 */
		public static function listar(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = PagamentosFormaDAO::getInstancia();
			// executando o metodo //
			$PagamentosForma = $instancia->listar();			
			// checando se o retorno foi falso //
			if(!$PagamentosForma)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::PAGAMENTOSFORMA);
			// percorrendo os usuarios //
			foreach($PagamentosForma as $forma){				
				// instanciando e jogando dentro da colecao $objetos o forma //				
				$objetos[] = new PagamentosForma($forma["id"], $forma["nome"]);
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return PagamentosForma
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = PagamentosFormaDAO::getInstancia();
			// executando o metodo //
			$PagamentosForma = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$PagamentosForma)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::PAGAMENTOSFORMA);
			// instanciando e retornando o Matricula //			
			return new PagamentosForma($PagamentosForma["id"],$PagamentosForma["nome"]);
		}		
		
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