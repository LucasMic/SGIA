<?php
/**
 * Classe Ferias
 * @package model
 * @author Idealizza
 */
	class Ferias {
		
		/**
		 * Atributos
		 */		
		private $data;
		private $duracao;
		private $colaborador;
		
	
		public function __construct($data = "", $duracao = "", Colaborador $colaborador = null){
			$this->data = $data;
			$this->duracao = $duracao;
			$this->colaborador = $colaborador;
		}
		
		/**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){
			if(($this->getData() == "")||($this->getDuracao() == 0))
				return false;
			return true;
		}
		
		/**
		 * Metodo inserir()
		 * @return Ferias
		 */
		public function inserir(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = FeriasDAO::getInstancia();
			// executando o metodo //
			$ferias = $instancia->inserir($this);
			// retornando o Ferias //
			return $ferias;
		}
		
		/**
		 * Metodo editar()
		 * @return Ferias
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = FeriasDAO::getInstancia();
			// executando o metodo //
			$ferias = $instancia->editar($this);
			// retornando o Ferias //
			return $ferias;
		}
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = FeriasDAO::getInstancia();
			// executando o metodo //
			$ferias = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $ferias;
		}
		
		/**
		 * Metodo buscarPorColaborador($id)
		 * @param $id
		 * @return ferias
		 */
		public static function buscarPorColaborador($idColaborador){
			// recuperando a instancia da classe de acesso a dados //			
			$instancia = FeriasDAO::getInstancia();
			// executando o metodo //
			$ferias = $instancia->buscarPorColaborador($idColaborador);

			$colaborador = Colaborador::Buscar($ferias['colaboradores_id']);			

			$objeto = new Ferias($ferias['data'], $ferias['duracao'], $colaborador);
			// checando se o resultado foi falso //
			/*
			if(!$colaborador)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::COLABORADOR);*/
				
				
			// instanciando e retornando o Colaborador //
			return $objeto;
		}
		
		/**
		 * Metodo listar()
		 * @return Ferias[]
		 */
		public static function listar($idColaborador){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = FeriasDAO::getInstancia();
			// executando o metodo //
			$ferias = $instancia->listar($idColaborador);
			// checando se o retorno foi falso //
			if(!$ferias)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::FERIAS);
			// percorrendo os usuarios //
			foreach($ferias as $feria){
				// instanciando e jogando dentro da colecao $objetos o Ferias //
				$objetos[] = new Ferias($feria['data'], $feria['duracao'], Colaborador::buscar($feria['colaboradores_id']));
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		
		/**
		 * Metodos getters() e setters()
		 */
		public function getData(){
			return $this->data;
		}
		public function setData($data){
			$this->data = $data;
		}
		public function getDuracao(){
			return $this->duracao;
		}
		public function setDuracao($duracao){
			$this->duracao = $duracao;
		}
		public function getColaborador(){
			return $this->colaborador;
		}
		public function setColaborador(Colaborador $colaborador){
			$this->colaborador = $colaborador;
		}

	}
?>