<?php
/**
 * Classe Convenio
 * @package model
 * @author Idealizza
 */
	class Convenio {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $nome;
		private $desconto;
        private $curso;
		private $sede;
		
		public function __construct($id = 0, $nome = "", $desconto = 0, Sede $sede = null, Curso $curso = null){
			$this->id = $id;
			$this->nome = $nome;
			$this->desconto = $desconto;
            $this->curso = $curso;
			$this->sede = $sede;
			
		}
		
		/**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){
			if(($this->getNome() == "")||($this->getDesconto() == "")){
				return false;
			}
			return true;
		}
		
		/**
		 * Metodo inserir()
		 * @return Convenio
		 */
		public function inserir(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ConvenioDAO::getInstancia();
			// executando o metodo //
			$convenio = $instancia->inserir($this);
			// retornando o Convenio //
			return $convenio;
		}
		
		/**
		 * Metodo editar()
		 * @return Convenio
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ConvenioDAO::getInstancia();
			// executando o metodo //
			$convenio = $instancia->editar($this);
			// retornando o Convenio //
			return $convenio;
		}
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ConvenioDAO::getInstancia();
			// executando o metodo //
			$convenio = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $convenio;
		}
	
		/**
		 * Metodo listar()
		 * @return Convenio[]
		 */
		public static function listar($cursoId){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ConvenioDAO::getInstancia();
			// executando o metodo //
			$convenios = $instancia->listar($cursoId);
			// checando se o retorno foi falso //
			if(!$convenios)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::CONVENIO);
			// percorrendo os convenios //
			foreach($convenios as $convenio){
				// instanciando e jogando dentro da colecao $objetos o Convenio //
				$objetos[] = new Convenio($convenio['id'], $convenio['nome'], $convenio['desconto'], Sede::buscar($convenio["sedes_id"]), Curso::buscar($convenio["cursos_id"]));
			}
			// retornando a colecao $objetos //
			return $objetos;
		}

		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Convenio
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = ConvenioDAO::getInstancia();
			// executando o metodo //
			$convenio = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$convenio)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::CONVENIO);
			// instanciando e retornando o Convenio //
			return new Convenio($convenio['id'], $convenio['nome'], $convenio['desconto'], Sede::buscar($convenio["sedes_id"]), Curso::buscar($convenio["cursos_id"]));
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
		public function getDesconto(){
			return $this->desconto;
		}
		public function setDesconto($desconto){
			$this->desconto = $desconto;
		}
		public function getSede(){
			return $this->sede;
		}
		public function setSede(Sede $sede){
			$this->sede = $sede;
		}
        public function getCurso(){
			return $this->curso;
		}
		public function setCurso(Curso $curso){
			$this->curso = $curso;
		}

	}
?>