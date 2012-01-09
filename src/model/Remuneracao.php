<?php
/**
 * Classe Remuneracao
 * @package model
 * @author Idealizza
 */
	class Remuneracao {
		
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