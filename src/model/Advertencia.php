<?php
/**
 * Classe Advertencia
 * @package model
 * @author Idealizza
 */
	class Advertencia {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $data;
		private $descricao;
		private $anexo;
		private $colaborador;
		
		/**
		 * Metodo construtor()
		 * @param $id
		 * @param $perfil
		 * @param $login
		 * @param $senha
		 * @return Advertencia
		 */		
		public function __construct($id = 0, $data = "",$descricao = "",$anexo = "", Colaborador $colaborador = null){
			$this->id = $id;
			$this->data = $data;
			$this->descricao = $descricao;
			$this->anexo = $anexo;
			$this->colaborador = $colaborador;
			
		}
		
		
		private function _validarCampos(){
			if($this->getData() == ""){
				return false;
			} else {
				return true;
			}
		}
		/**
		 * Metodo inserir()
		 * @return Advertencia
		 */
		public function inserir(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = AdvertenciaDAO::getInstancia();
			// executando o metodo //
			$advertencia = $instancia->inserir($this);
			// retornando o Advertencia //
			return $advertencia;
		}
		
		/**
		 * Metodo editar()
		 * @return Advertencia
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = AdvertenciaDAO::getInstancia();
			// executando o metodo //
			$advertencia = $instancia->editar($this);
			// retornando o Advertencia //
			return $advertencia;
		}
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = AdvertenciaDAO::getInstancia();
			// executando o metodo //
			$advertencia = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $advertencia;
		}
		
		/**
		 * Metodo listar()
		 * @return Advertencia[]
		 */
		public static function listar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = AdvertenciaDAO::getInstancia();
			// executando o metodo //
			$advertencias = $instancia->listar($id);
			// checando se o retorno foi falso //
			if(!$advertencias)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::ADVERTENCIAS);
			// percorrendo os usuarios //
			foreach($advertencias as $advertencia){
				// instanciando e jogando dentro da colecao $objetos o Advertencia //
				$objetos[] = new Advertencia($advertencia['id'], $advertencia["data"], $advertencia['descricao'], $advertencia["anexo"], Colaborador::buscar($advertencia['colaboradores_id']));
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
	
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Advertencia
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = AdvertenciaDAO::getInstancia();
			// executando o metodo //
			$advertencia = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$advertencia)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::ADVERTENCIA);
			// instanciando e retornando o Advertencia //
			return new Advertencia($advertencia['id'], $advertencia["data"], $advertencia['descricao'], $advertencia["anexo"], Colaborador::buscar($advertencia['colaboradores_id']));
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
		public function getAnexo(){
			return $this->anexo;
		}
		public function setAnexo($anexo){
			$this->anexo = $anexo;
		}
		
		public function getColaborador(){
			return $this->colaborador;
		}
		public function setColaborador(Colaborador $colaborador){
			$this->colaborador = $colaborador;
		}

	}
?>