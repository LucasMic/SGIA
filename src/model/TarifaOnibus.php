<?php
/**
 * Classe TarifaOnibus
 * @package model
 * @author Idealizza
 */
	class TarifaOnibus {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $valor;
		private $sede;
		private $sigla;
		
		/**
		 * Metodo construtor()
		 * @param $id
		 * @param $valor
		 * @param $sede
		 * @param $sigla
		 * @return TarifaOnibus
		 */		
		public function __construct($id = 0, $valor = 0, Sede $sede = null, $sigla = ""){
			$this->id = $id;
			$this->valor = $valor;
			$this->sede = $sede;
			$this->sigla = $sigla;
			
		}
		
		/**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){
			if(($this->getSede() == null)||($this->getValor() == 0)||($this->getSigla() == ""))
				return false;
			return true;
		}
		
		/**
		 * Metodo inserir()
		 * @return TarifaOnibus
		 */
		public function inserir(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TarifaOnibusDAO::getInstancia();
			// executando o metodo //
			$tarifa = $instancia->inserir($this);
			// retornando o TarifaOnibus //
			return $tarifa;
		}
		
		/**
		 * Metodo editar()
		 * @return TarifaOnibus
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TarifaOnibusDAO::getInstancia();
			// executando o metodo //
			$tarifa = $instancia->editar($this);
			// retornando o TarifaOnibus //
			return $tarifa;
		}
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TarifaOnibusDAO::getInstancia();
			// executando o metodo //
			$tarifa = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $tarifa;
		}
		
		/**
		 * Metodo listar()
		 * @return TarifaOnibus[]
		 */
		public static function listar($sede){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TarifaOnibusDAO::getInstancia();
			// executando o metodo //
			$tarifas = $instancia->listar($sede);
			// checando se o retorno foi falso //
			if(!$tarifas)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::TARIFA);
			// percorrendo os tarifas //
			foreach($tarifas as $tarifa){
				// instanciando e jogando dentro da colecao $objetos o TarifaOnibus //
				$objetos[] = new TarifaOnibus($tarifa['id'], $tarifa['valor'], Sede::buscar($tarifa['sede_id']), $tarifa['sigla']);
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return TarifaOnibus
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TarifaOnibusDAO::getInstancia();
			// executando o metodo //
			$tarifa = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$tarifa)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::TARIFA);
			// instanciando e retornando o TarifaOnibus //
			return new TarifaOnibus($tarifa['id'], $tarifa['valor'], Sede::buscar($tarifa['sede_id']), $tarifa['sigla']);
		}

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getValor() {
            return $this->valor;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function getSede() {
            return $this->sede;
        }

        public function setSede(Sede $sede) {
            $this->sede = $sede;
        }

        public function getSigla() {
            return $this->sigla;
        }

        public function setSigla($sigla) {
            $this->sigla = $sigla;
        }



	}
?>