<?php
/**
 * Classe Sede
 * @package model
 * @author Idealizza
 */
	class Sede {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $nome;
		private $uf;
		
		/**
		 * Metodo construtor()
		 * @param $id
		 * @param $nome
		 */		
		public function __construct($id = 0, $nome = "", $uf =""){
			$this->id = $id;
			$this->nome = $nome;
			$this->uf = $uf;
		}
		
		public static function listar(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = SedeDAO::getInstancia();
			// executando o metodo //
			$sedes = $instancia->listar();
			// checando se o retorno foi falso //
			if(!$sedes)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::SEDE);
			// percorrendo os usuarios //
			foreach($sedes as $sede){
				// instanciando e jogando dentro da colecao $objetos o Usuario //
				$objetos[] = new Sede($sede['id'], $sede['nome'], $sede['uf']);
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Usuario
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = SedeDAO::getInstancia();
			// executando o metodo //
			$sede = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$sede)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::SEDE);
			// instanciando e retornando o Usuario //
			return new Sede($sede['id'], $sede['nome'], $sede['uf']);
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
		
		public function getUf(){
			return $this->uf;
		}
		public function setUf($uf){
			$this->uf = $uf;
		}

	}
?>