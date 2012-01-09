<?php
/**
 * Classe CursoValores
 * @package model
 * @author Idealizza
 */
	class CursoValores {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $curso;
		private $data;
		private $valor;
		
                function __construct($id = 0, Curso $curso = null, $data = "", $valor = 0) {
                    $this->id = $id;
                    $this->curso = $curso;
                    $this->data = $data;
                    $this->valor = $valor;
                }


		/**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){
			if($this->getValor() == 0)
				return false;
			return true;
		}
		
		/**
		 * Metodo inserir()
		 * @return CursoValores
		 */
		public function inserir(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoValoresDAO::getInstancia();
			// executando o metodo //
			$cursoValores = $instancia->inserir($this);
			// retornando o CursoValores //
			return $cursoValores;
		}
		
		/**
		 * Metodo editar()
		 * @return CursoValores
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoValoresDAO::getInstancia();
			// executando o metodo //
			$cursoValores = $instancia->editar($this);
			// retornando o CursoValores //
			return $cursoValores;
		}
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoValoresDAO::getInstancia();
			// executando o metodo //
			$cursoValores = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $cursoValores;
		}
		
		/**
		 * Metodo listar()
		 * @return CursoValores[]
		 */
		public static function listar($sede){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoValoresDAO::getInstancia();
			// executando o metodo //
			$cursoValores = $instancia->listar($sede);
			// checando se o retorno foi falso //
			if(!$cursoValores)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::CURSOVALORES);
			// percorrendo os usuarios //
			foreach($cursoValores as $cursoValor){
				// instanciando e jogando dentro da colecao $objetos o CursoValores //
				$objetos[] = new CursoValores($cursoValor["id"],Curso::buscar($cursoValor["cursos_id"]), $cursoValor["data"], $cursoValor["valor"]);
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return CursoValores
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoValoresDAO::getInstancia();
			// executando o metodo //			
			$cursoValor = $instancia->buscar($id);
			// checando se o resultado foi falso //		
			
			if(!$cursoValor)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::CURSOVALOR);
				// instanciando e retornando o CursoValores //			
			return new CursoValores($cursoValor["id"],Curso::buscar($cursoValor["cursos_id"]), $cursoValor["data"], $cursoValor["valor"]);
		}
		
		/**
		 * Metodo buscarCursoId($id)
		 * @param $id
		 * @return CursoValores
		 */
		public static function buscarCursoId($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoValoresDAO::getInstancia();
			// executando o metodo //			
			$cursoValor = $instancia->buscarCursoId($id);
			// checando se o resultado foi falso //				
			if(!$cursoValor)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::CURSOVALOR);
				// instanciando e retornando o CursoValores //			
			return new CursoValores($cursoValor["id"],Curso::buscar($cursoValor["cursos_id"]), $cursoValor["data"], $cursoValor["valor"]);
		}
		
		
		
		
                public function getId() {
                    return $this->id;
                }

                public function setId($id) {
                    $this->id = $id;
                }

                public function getCurso() {
                    return $this->curso;
                }

                public function setCurso($curso) {
                    $this->curso = $curso;
                }

                public function getData() {
                    return $this->data;
                }

                public function setData($data) {
                    $this->data = $data;
                }

                public function getValor() {
                    return $this->valor;
                }

                public function setValor($valor) {
                    $this->valor = $valor;
                }



	}
?>