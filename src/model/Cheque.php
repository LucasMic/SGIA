<?php
/**
 * Classe Cheque
 * @package model
 * @author Idealizza
 */
	class Cheque {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $situacao;
		private $baixa;
		private $vencimento;
		private $data;
        private $valor;
        
        private $agencia;
        private $conta;
        private $numeroCheque;
        
		
		
                function __construct($id = 0, $situacao = 0, $baixa = 0, $vencimento = "", $data = "", $valor = 0, $agencia = "", $conta = "", $numeroCheque = "") {
                    $this->id = $id;
                    $this->situacao = $situacao;
                    $this->baixa = $baixa;
                    $this->vencimento = $vencimento;
                    $this->data = $data;
                    $this->valor = $valor;
                    
                    $this->agencia = $agencia;
                    $this->conta = $conta;
                    $this->numeroCheque = $numeroCheque;
                    
                }

                /**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){
			if($this->getVencimento() == "")
				return false;
			return true;
		}
		
		/**
		 * Metodo inserir()
		 * @return Cheque
		 */
		public function inserir(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ChequeDAO::getInstancia();
			// executando o metodo //
			$cheque = $instancia->inserir($this);
			// retornando o Cheque //
			return $cheque;
		}
		
		/**
		 * Metodo editar()
		 * @return Cheque
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ChequeDAO::getInstancia();
			// executando o metodo //
			$cheque = $instancia->editar($this);
			// retornando o Cheque //
			return $cheque;
		}
		
		public function mudarSituacao(){
			// validando os campos //
			$instancia = ChequeDAO::getInstancia();
			// executando o metodo //
			$cheque = $instancia->mudarSituacao($this);
			// retornando o Cheque //
			return $cheque;
		}
		
		public function darBaixa(){
			// validando os campos //
			$instancia = ChequeDAO::getInstancia();
			// executando o metodo //
			$cheque = $instancia->darBaixa($this);
			// retornando o Cheque //
			return $cheque;
		}
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ChequeDAO::getInstancia();
			// executando o metodo //
			$cheque = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $cheque;
		}
		
		/**
		 * Metodo listar()
		 * @return Cheque[]
		 */
		public static function listar($sede){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ChequeDAO::getInstancia();
			// executando o metodo //
			$cheques = $instancia->listar($sede);
			// checando se o retorno foi falso //
			if(!$cheques)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::CHEQUES);
			// percorrendo os usuarios //
			foreach($cheques as $cheque){
				// instanciando e jogando dentro da colecao $objetos o Cheque //
				$objetos[] = new Cheque($cheque["id"], $cheque["situacao"], $cheque["baixa"], $cheque["vencimento"], 
                                                            $cheque["data"], $cheque["valor"],
                                                            $cheque["agencia"], $cheque["conta"], $cheque["numero_cheque"]);
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Cheque
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ChequeDAO::getInstancia();
			// executando o metodo //
			$cheque = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$cheque)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::CHEQUE);
			// instanciando e retornando o Cheque //
			return new Cheque($cheque["id"], $cheque["situacao"], $cheque["baixa"], $cheque["vencimento"],
                                                            $cheque["data"], $cheque["valor"],
                                                            $cheque["agencia"], $cheque["conta"], $cheque["numero_cheque"]);
		}

                public function getId() {
                    return $this->id;
                }

                public function setId($id) {
                    $this->id = $id;
                }

                public function getSituacao() {
                    return $this->situacao;
                }

                public function setSituacao($situacao) {
                    $this->situacao = $situacao;
                }

                public function getBaixa() {
                    return $this->baixa;
                }

                public function setBaixa($baixa) {
                    $this->baixa = $baixa;
                }

                public function getVencimento() {
                    return $this->vencimento;
                }

                public function setVencimento($vencimento) {
                    $this->vencimento = $vencimento;
                }

                public function getData() {
                    return $this->data;
                }

                public function setData($data) {
                    $this->data = $data;
                }

                public function getValor() {
                    return $this->valor;
                }

                public function setValor($valor) {
                    $this->valor = $valor;
                }


                public function getAgencia() {
                    return $this->agencia;
                }

                public function setAgencia($agencia) {
                    $this->agencia = $agencia;
                }

                public function getConta() {
                    return $this->conta;
                }

                public function setConta($conta) {
                    $this->conta = $conta;
                }

                public function getNumeroCheque() {
                    return $this->numeroCheque;
                }

                public function setNumeroCheque($numeroCheque) {
                    $this->numeroCheque = $numeroCheque;
                }               
                


	}
?>