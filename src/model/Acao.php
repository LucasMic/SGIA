<?php
/**
 * Classe Acao
 * @package model
 * @author Idealizza
 */
	class Acao {
		
		/**
		 * Atributos
		 */
		private $codigo;
		private $nome;
		private $modulos;

		/**
		 * Metodo construtor()
		 * @param $codigo
		 * @param $nome
		 * @param $modulo
		 * @return Acao
		 */
		public function __construct($codigo = 0,$nome = '',Modulo $modulos = null){
			$this->codigo = $codigo;
			$this->nome = $nome;
			$this->modulos = $modulos;
		}
		
		/**
		 * Metodo listar($filtroModulo,$filtroPerfil)
		 * @param $filtroModulo
		 * @param $filtroPerfil
		 * @return Acao[]
		 */
		public static function listar($filtroModulo = 0,$filtroPerfil = 0){
			$instancia = AcaoDAO::getInstancia();
			$acoes = $instancia->listar($filtroModulo,$filtroPerfil);
			if(!$acoes)
				throw new ListaVazia(ListaVazia::ACOES);
			foreach($acoes as $acao){
				$objetos[] = new Acao($acao['codigo'],$acao['nome'],Modulo::buscar($acao['id_modulos']));
			}
			return $objetos;
		}
		
		/**
		 * Metodo buscar($codigo,$modulo)
		 * @param $codigo
		 * @param $modulo
		 * @return Acao
		 */
		public static function buscar($codigo = 0,$modulos = 0){
			$instancia = AcaoDAO::getInstancia();
			$acao = $instancia->buscar($codigo,$modulos);
			if(!$acao)
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::ACAO);
			return new Acao($acao['codigo'],$acao['nome'],Modulo::buscar($acao['id_modulos']));
		}
		
		/**
		 * Metodo checarPermissao($codigo,$modulo)
		 * @param $codigo
		 * @param $modulo
		 * @return boolean
		 */
		public static function checarPermissao($codigo = 0, $modulos = 0) {
		
			$controll = Controll::getControll();
			
			if((empty($codigo)) || (empty($modulos)))
				return false;
				
			foreach($controll->getUsuario()->getPerfil()->getAcoes() as $acao){
				if(($acao->getCodigo() == $codigo)&&($acao->getModulos()->getId() == $modulos))
					return true;
			}
			return false;
		}
		
		/**
		 * Metodos getters() e setters()
		 */
		public function getCodigo(){
			return $this->codigo;
		}
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getModulos(){
			return $this->modulos;
		}
		public function setModulos(Modulo $modulo){
			$this->modulos = $modulos;
		}
	}
?>