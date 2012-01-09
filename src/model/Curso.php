<?php
/**
 * Classe Curso
 * @package model
 * @author Idealizza
 */
	class Curso {

		/**
		 * Atributos
		 */
		private $id;
		private $nome;
		private $dataEncerramento;
        private $dataEncerramentoPromocional;
		private $valor;
        private $valorPromocional;
		private $sede;

		public function __construct($id = 0, $nome = "", $dataEncerramento = '', $dataEncerramentoPromocional = "", $valor = 0, $valorPromocional = 0, Sede $sede = null){
			$this->id = $id;
			$this->nome = $nome;
			$this->dataEncerramento = $dataEncerramento;
            $this->dataEncerramentoPromocional = $dataEncerramentoPromocional;
			$this->valor = $valor;
            $this->valorPromocional = $valorPromocional;
			$this->sede = $sede;
		}

		/**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){

			if(($this->getNome() == "")||($this->getDataEncerramento() == '')||($this->getValor() == '0,00'))
				return false;
			return true;
		}

		/**
		 * Metodo inserir()
		 * @return Usuario
		 */
		public function inserir(){
			// validando os campos //

			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoDAO::getInstancia();
			// executando o metodo //
			$curso = $instancia->inserir($this);
			// retornando o Usuario //
			return $curso;
		}

		/**
		 * Metodo editar()
		 * @return Usuario
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoDAO::getInstancia();
			// executando o metodo //
			$curso = $instancia->editar($this);
			// retornando o Usuario //
			return $curso;
		}

		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoDAO::getInstancia();
			// executando o metodo //
			$curso = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $curso;
		}


		/**
		 * Metodo listar()
		 * @return Usuario[]
		 */
		public static function listar($aluno = 0){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoDAO::getInstancia();
			// executando o metodo //
			$cursos = $instancia->listar($aluno);
			// checando se o retorno foi falso //

			if(!$cursos)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::CURSO);
			// percorrendo os usuarios //

			foreach($cursos as $curso){
				// instanciando e jogando dentro da colecao $objetos o Usuario //
				$objetos[] = new Curso($curso['id'], $curso['nome'],$curso['data_encerramento'], $curso['data_encerramento_promocional'], Curso::buscarUltimoValor($curso['id']), $curso["valor_promocional"], Sede::buscar($curso["sedes_id"]));

			}
			if($aluno){
				return $cursos;
			} else {
				return $objetos;
			}

		}



		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Usuario
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoDAO::getInstancia();
			// executando o metodo //
			$curso = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$curso)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::CURSO);

			$data = Curso::buscarUltimoValor($curso['id']);
    		$valor = $data[0]["valor"];

			// instanciando e retornando o Usuario //
			return new Curso($curso['id'],$curso['nome'],$curso['data_encerramento'], $curso['data_encerramento_promocional'], $valor, $curso["valor_promocional"], Sede::buscar($curso["sedes_id"]));
		}



		public static function buscarUltimoValor($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = CursoDAO::getInstancia();
			// executando o metodo //
			$curso = $instancia->buscarUltimoValor($id);

			// checando se o resultado foi falso //
			if(!$curso)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::CURSO);
			// instanciando e retornando o Usuario //
			return $curso;
		}



		public static  function buscarValorPromocional($id){
			// recuperando a instancia da classe de acesso a dados //echo"<pre>";
			$instancia = CursoDAO::getInstancia();
			// executando o metodo //
			$curso = $instancia->buscarValorPromocional($id);
			// checando se o resultado foi falso //
			if(!$curso)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::CURSO);
			// retorna um array associativo //
			return $curso;
		}

		/**
		 * Metodo getValorPromocionalValido()
		 * @return valor do Curso
		 *
		 */

		public function getValorPromocionalValido(){
            
            $dtEnc = $this->getDataEncerramentoPromocional();
            $hoj = date("Y-m-d");            
            
            $dtEncerramento = strtotime($dtEnc);            
            $hoje = strtotime($hoj);
            
			if($dtEncerramento <= $hoje){
                return $this->valor;
			
			}
			else{
				return $this->valorPromocional;
                
			}
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
		public function getDataEncerramento(){
			return $this->dataEncerramento;
		}
		public function setDataEncerramento($dataEncerramento){
			$this->dataEncerramento = $dataEncerramento;
		}
        public function getDataEncerramentoPromocional(){
			return $this->dataEncerramentoPromocional;
		}
		public function setDataEncerramentoPromocional($dataEncerramentoPromocional){
			$this->dataEncerramentoPromocional = $dataEncerramentoPromocional;
		}

		public function getValor(){
			return $this->valor;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
        public function getValorPromocional(){
			return $this->valorPromocional;
		}
		public function setValorPromocional($valorPromocional){
			$this->valorPromocional = $valorPromocional;
		}

		public function getSede(){
			return $this->sede;
		}
		public function setSede(Sede $sede){
			$this->sede = $sede;
		}

	} ?>