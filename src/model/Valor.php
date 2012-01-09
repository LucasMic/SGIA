<?php
/**
 * Classe Salario
 * @package model
 * @author Idealizza
 */
	class Valor{	
		
		private $curso;		
		private $cursoValorId;
		private $cursoValor;
		

		
		
	public function __construct($curso = null, $cursoValorId = 0, $cursoValor = 0){
			$this->curso = $curso;			
            $this->cursoValorId = $cursoValorId;            
			$this->cursoValor = $cursoValor;
		}
		
				
		/**
		 * Metodos getters() e setters()
		 */
		 
		public function getCurso(){
			return $this->curso;
		}
		public function setCurso($curso){
			$this->curso = $curso;
		}	
		
		public function getCursoValorId(){
			return $this->cursoValorId;
		}
		public function setCursoValorId($cursoValorId){
			$this->cursoValorId = $cursoValorId;
		}		
		
		public function getCursoValor(){
			return $this->CursoValor;
		}
		public function setCursoValor($cursoValor){
			$this->cursoValor = $cursoValor;
		}		
		
	}
	