<?php
/**
 * Classe Salario
 * @package model
 * @author Idealizza
 */
	class Salario {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $data;
		private $valor;
		private $colaborador;
		
	
		public function __construct($id = 0, $data = "", $valor = 0, Colaborador $colaborador = null){
			$this->id = $id;
			$this->data = $data;
			$this->valor = $valor;
			$this->colaborador = $colaborador;
		}
		
		/**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){
			if(($this->getData() == "")||($this->getValor() == 0))
				return false;
			return true;
		}
		
		/**
		 * Metodo inserir()
		 * @return Salario
		 */
		public function inserir(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = SalarioDAO::getInstancia();
			// executando o metodo //
			$salario = $instancia->inserir($this);
			// retornando o Salario //
			return $salario;
		}
		
		/**
		 * Metodo editar()
		 * @return Salario
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = SalarioDAO::getInstancia();
			// executando o metodo //
			$salario = $instancia->editar($this);
			// retornando o Salario //
			return $salario;
		}
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = SalarioDAO::getInstancia();
			// executando o metodo //
			$salario = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $salario;
		}
		
		/**
		 * Metodo listar()
		 * @return Salario[]
		 */
		public static function listar($idColaborador){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = SalarioDAO::getInstancia();
			// executando o metodo //
			$salarios = $instancia->listar($idColaborador);
			// checando se o retorno foi falso //
			if(!$salarios)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::FERIAS);
			// percorrendo os usuarios //
			foreach($salarios as $salario){
				// instanciando e jogando dentro da colecao $objetos o Salario //
				$objetos[] = new Salario($salario["id"], $salario['data'], $salario['valor'], Colaborador::buscar($salario['colaboradores_id']));
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
		public function getValor(){
			return $this->valor;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
		public function getColaborador(){
			return $this->colaborador;
		}
		public function setColaborador(Colaborador $colaborador){
			$this->colaborador = $colaborador;
		}

	}
?>