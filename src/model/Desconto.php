<?php
/**
 * Classe Desconto
 * @package model
 * @author Idealizza
 */
	class Desconto {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $valor;
		private $nome;
		private $matricula;
		
		
		/**
		 * Metodo construtor()
		 * @param $id
		 * @param $perfil
		 * @param $login
		 * @param $senha
		 * @return Desconto
		 */		
		public function __construct($id = 0,$valor = 0, $nome = '', Matricula $matricula = null){
			$this->id = $id;
			$this->valor = $valor;
			$this->nome = $nome;
			$this->matricula = $matricula;
		}
		
		
		/**
		 * Metodo inserir()
		 * @return Desconto
		 */
		public function inserir(){
			// validando os campos //
			$instancia = DescontoDAO::getInstancia();
			// executando o metodo //
			$desconto = $instancia->inserir($this);
			// retornando o Desconto //
			return $desconto;
		}
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Desconto
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = DescontoDAO::getInstancia();
			// executando o metodo //
			$desconto = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$desconto)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::DESCONTO);
			// instanciando e retornando o Desconto //
			return new Desconto($desconto['id'], $desconto['valor'], $desconto['nome'], Matricula::buscar($deconto["matriculas_id"]));
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
		public function getValor(){
			return $this->valor;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getMatricula(){
			return $this->matricula;
		}
		public function setMatricula(Matricula $matricula){
			$this->matricula = $matricula;
		}

	}
?>