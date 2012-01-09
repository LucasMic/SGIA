<?php
/**
 * Classe Modulo
 * @package model
 * @author Idealizza
 */
	class Modulo {

		/**
		 * Atributos
		 */
		private $id;
		private $nome;
		private $link;
		
		/**		
		 * Metodo construtor()
		 * @param $id
		 * @param $nome
		 * @return Modulo
		 */
		public function __construct($id = 0,$nome = '',$link = ''){
			$this->id = $id;
			$this->nome = $nome;
			$this->link = $link;
		}
		
		/**
		 * Metodo listar()
		 * @return Modulo[]
		 */
		public static function listar(){
			$instancia = ModuloDAO::getInstancia();
			$modulos = $instancia->listar();
			if(!$modulos)
				throw new ListaVazia(ListaVazia::MODULOS);
			foreach($modulos as $modulo){
				$objetos[] = new Modulo($modulo['id'],$modulo['nome'],$modulo['link']);
			}
			return $objetos;
		}
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Modulo
		 */
		public static function buscar($id){
			$instancia = ModuloDAO::getInstancia();
			$modulo = $instancia->buscar($id);
			if(!$modulo)
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::MODULO);
			return new Modulo($modulo['id'],$modulo['nome'],$modulo['link']);
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
		public function getLink(){
			return $this->link;
		}
		public function setLink($link){
			$this->link = $link;
		}

	}
?>