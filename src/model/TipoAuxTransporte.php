<?php
/**
 * Classe TipoAuxTransporte
 * @package model
 * @author Idealizza
 */
	class TipoAuxTransporte {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $nome;
		private $valor;
		private $sede;
		
		public function __construct($id = 0, $nome = "", $valor = 0, $sede = null){
			$this->id = $id;
			$this->nome = $nome;
			$this->valor = $valor;
			$this->sede = $sede;
			
		}
		
		/**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){
			if(($this->getNome() == null)||($this->getValor() == '0,00'))
				return false;
			return true;
		}
		
		
		public function montarObjeto($objeto){
			return new TipoAuxTransporte((isset($objeto["id"])? $objeto["id"] :0),
										 (isset($objeto["nome"])? $objeto["nome"] :""),
										 (isset($objeto["valor"])? $objeto["valor"] : 0),
										 (isset($_SESSION["sede"])? Sede::buscar($_SESSION["sede"]):null));
		}
		
		/**
		 * Metodo inserir()
		 * @return TipoAuxTransporte
		 */
		public function inserir(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();					
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TipoAuxTransporteDAO::getInstancia();
			// executando o metodo //
			$TipoAuxTransporte = $instancia->inserir($this);
			// retornando o Aluno //
			return $TipoAuxTransporte;
		}	

		
		/**
		 * Metodo editar()
		 * @return TipoAuxTransporte
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TipoAuxTransporteDAO::getInstancia();
			// executando o metodo //
			$TipoAuxTransporte = $instancia->editar($this);
			// retornando o Aluno //
			return $TipoAuxTransporte;
		}		
		
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TipoAuxTransporteDAO::getInstancia();
			// executando o metodo //
			$TipoAuxTransporte = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $TipoAuxTransporte;
		}		
		
		/**
		 * Metodo listar()
		 * @param $sede
		 * @return TipoAuxTransporte[]
		 */
		public static function listar(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TipoAuxTransporteDAO::getInstancia();
			// executando o metodo //		
			$tipoAuxTransportes = $instancia->listar($_SESSION['sede']);			
			// checando se o retorno foi falso //
			if(!$tipoAuxTransportes)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::TIPOAUXILIOTRANSPORTE);
			// percorrendo os usuarios //
			foreach($tipoAuxTransportes as $tipoAuxTransporte){
				// instanciando e jogando dentro da colecao $objetos o TipoAuxTransporte //
				$objetos[] = new TipoAuxTransporte($tipoAuxTransporte['id'], $tipoAuxTransporte['nome'], $tipoAuxTransporte['valor'], Sede::buscar($tipoAuxTransporte["sedes_id"]));
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return TipoAuxTransporte
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TipoAuxTransporteDAO::getInstancia();
			// executando o metodo //
			$tipoAuxTransporte = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$tipoAuxTransporte)
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::TIPOAUXILIOTRANSPORTE);
				
				
			// instanciando e retornando o TipoAuxTransporte //
			return new TipoAuxTransporte($tipoAuxTransporte['id'], $tipoAuxTransporte['nome'],$tipoAuxTransporte['valor'], $tipoAuxTransporte['sedes_id']);
		}
		
		/**
		 * Metodo testaExistencia($obj)
		 * @param $nome
		 * @return boolean
		 */
		public static function testaExistencia($obj){			
			// recuperando a instancia da classe de acesso a dados //
			$instancia = TipoAuxTransporteDAO::getInstancia();
			// executando o metodo //
			$tipoAuxTransporte = $instancia->buscarNome($obj);
			// checando o resultado //			
			if($tipoAuxTransporte != false){
				$tipoAuxTransporte = TipoAuxTransporte::montarObjeto($tipoAuxTransporte);				
				if($obj->getId() == $tipoAuxTransporte->getId()){					
					return true;					
				} else {
					return false;
				}					
			} else {
				return true;				
			} 
						
		}
		
		
		
		
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($perfil){
			$this->nome = $nome;
		}
		public function getValor(){
			return $this->valor;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
		
		public function getSede(){
			return $this->sede;
		}
		public function setSede($sede){
			$this->sede = $sede;
		}		

	}
?>