<?php
/**
 * Classe Filho
 * @package model
 * @author Idealizza
 */
	class Filho {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $nome;
		private $dataNascimento;
		private $pensao;
		private $pai;
		
		/**
		 * Metodo construtor()
		 * @param $id
		 * @param $perfil
		 * @param $login
		 * @param $senha
		 * @return Filho
		 */		
		public function __construct($id = 0, $nome = "", $dataNascimento = "", $pensao = 0, Colaborador $pai = null){
			$this->id = $id;
			$this->nome = $nome;
			$this->dataNascimento = $dataNascimento;
			$this->pensao = $pensao;
			$this->pai = $pai;
			
		}
		
		/**
		 * Metodo inserir()
		 * @return Filho
		 */
		public function inserir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = FilhoDAO::getInstancia();
			// executando o metodo //
			$filho = $instancia->inserir($this);
			// retornando o Filho //
			return $filho;
		}
		
		/**
		 * Metodo editar()
		 * @return Filho
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = FilhoDAO::getInstancia();
			// executando o metodo //
			$filho = $instancia->editar($this);
			// retornando o Filho //
			return $filho;
		}
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = FilhoDAO::getInstancia();
			// executando o metodo //
			$filho = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $filho;
		}
		
		/**
		 * Metodo listar()
		 * @return Filho[]
		 */
		public static function listar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = FilhoDAO::getInstancia();
			// executando o metodo //
			$filhos = $instancia->listar($id);
			// checando se o retorno foi falso //
			if(!$filhos)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::FILHOS);
			// percorrendo os usuarios //
			foreach($filhos as $filho){
				// instanciando e jogando dentro da colecao $objetos o Filho //
				$objetos[] = new Filho($filho['id'], $filho['nome'], $filho['data_nascimento'], $filho["pensao"], Colaborador::buscar($filho['colaboradores_id']));
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Filho
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = FilhoDAO::getInstancia();
			// executando o metodo //
			$filho = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$filho)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::FILHO);
			// instanciando e retornando o Filho //
			return new Filho($filho['id'], $filho['nome'], $filho['data_nascimento'], $filho["pensao"], Colaborador::buscar($filho['colaboradores_id']));
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
		public function getDataNascimento(){
			return $this->dataNascimento;
		}
		public function setDataNascimento($dataNascimento){
			$this->dataNascimento = $dataNascimento;
		}
		public function getPensao(){
			return $this->pensao;
		}
		public function setPensao($pensao){
			$this->pensao = $pensao;
		}
		
		public function getPai(){
			return $this->pai;
		}
		public function setSedes(Colaborador $pai){
			$this->pai = $pai;
		}

	}
?>