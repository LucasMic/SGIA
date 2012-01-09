<?php
/**
 * Classe Pagamento
 * @package model
 * @author Idealizza
 */
	class Pagamento {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $data;
		private $descricao;
		private $valor;
		private $tipo;
		private $anexo;
		private $colaborador;
		
		
		public function __construct($id = 0, $data = "", $descricao = "", $valor = 0, $tipo = 0, $anexo = "", Colaborador $colaborador){
                        $this->id = $id;
                        $this->data = $data;
                        $this->descricao = $descricao;
                        $this->valor = $valor;
                        $this->tipo = $tipo;
                        $this->anexo = $anexo;
                        $this->colaborador = $colaborador;
		}
				
		private function _validarCampos(){
			if(($this->getData() == "")||($this->getValor() == 0)||($this->getColaborador() == null))
				return false;
			return true;
		}
		
		/**
		 * Metodo inserir()
		 * @return Pagamento
		 */
		public function inserir(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = PagamentoDAO::getInstancia();
			// executando o metodo //
			$pagamento = $instancia->inserir($this);
			// retornando o Pagamento //
			return $pagamento;
		}
		
		/**
		 * Metodo editar()
		 * @return Pagamento
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = PagamentoDAO::getInstancia();
			// executando o metodo //
			$pagamento = $instancia->editar($this);
			// retornando o Pagamento //
			return $pagamento;
		}
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = PagamentoDAO::getInstancia();
			// executando o metodo //
			$pagamento = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $pagamento;
		}
		
		/**
		 * Metodo listar()
		 * @return Pagamento[]
		 */
		public static function listar($idColaborador){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = PagamentoDAO::getInstancia();
			// executando o metodo //
			$pagamentos = $instancia->listar($idColaborador);
			// checando se o retorno foi falso //
			if(!$pagamentos)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::PAGAMENTOS);
			// percorrendo os usuarios //
			foreach($pagamentos as $pagamento){
				// instanciando e jogando dentro da colecao $objetos o Pagamento //
				$objetos[] = new Pagamento($pagamento['id'], $pagamento['data'], $pagamento['descricao'], $pagamento["valor"], TipoPagamento::buscar($pagamento["tipo"]), $pagamento['anexo'], Colaborador::buscar($pagamento["colaboradores_id"]));
			}
			// retornando a colecao $objetos //
			return $objetos;
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
		public function getData(){
			return $this->data;
		}
		public function setData($data){
			$this->data = $data;
		}
		public function getDescricao(){
			return $this->descricao;
		}
		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}
		public function getValor(){
			return $this->valor;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
                
        public function getTipo() {
            return $this->tipo;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

		public function getAnexo(){
			return $this->anexo;
		}

        public function setAnexo($anexo){
			$this->anexo = $anexo;
		}
		
		public function getColaborador(){
			return $this->colaborador;
		}
		
		public function setColaborador($colaborador){
			$this->colaborador = $colaborador;
		}

	}
?>