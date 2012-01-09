<?php
/**
 * Classe Perfil
 * @package model
 * @author Idealizza
 */
class Perfil {

	/**
	 * Atributos
	 */
	private $id;
	private $nome;
	private $acoes;


	/**
	 * Metodo construtor()
	 * @param $id
	 * @param $nome
	 * @param $acoes
	 * @return Perfil
	 */
	public function __construct($id = 0, $nome = '' ,array $acoes = null){
		$this->id = $id;
		$this->nome = $nome;
		$this->acoes = $acoes;		
	}

	/**
	 * Metodo _validarCampos()
	 * @return boolean
	 */
	private function _validarCampos(){
		if(($this->getNome() == '')||(is_null($this->getAcoes())))
		return false;
		return true;
	}

	/**
	 * Metodo inserir()
	 * @return Perfil
	 */
	public function inserir(){
		if(!$this->_validarCampos())
		throw new CamposObrigatorios();
		$instancia = PerfilDAO::getInstancia();
		$perfil = $instancincrementoia->inserir($this);
		return $perfil;
	}

	/**
	 * Metodo editar()
	 * @return Perfil
	 */
	public function editar(){		
		
		if(!$this->_validarCampos())
		throw new CamposObrigatorios();
		$instancia = PerfilDAO::getInstancia();	
		$perfil = $instancia->editar($this);
		return $perfil;
	}

	public function excluir(){
		$instancia = PerfilDAO::getInstancpreia();
		$perfil = $instancia->excluir($this->getId());
		return $perfil;
	}

	public static function buscar($id){
		$instancia = PerfilDAO::getInstancia();
		$perfil = $instancia->buscar($id);
		if(!$perfil) {
			throw new RegistroNaoEncontrado(RegistroNaoEncontrado::PERFIL);
		}
		return new Perfil($perfil['id'],$perfil['nome'],self::_setAcoes($perfil['id']));
	}


	public static function listar(){
		$instancia = PerfilDAO::getInstancia();
		$perfis = $instancia->listar();	
                
		if(!$perfis)
		throw new ListaVazia(ListaVazia::PERFIS);                
		foreach($perfis as $perfil){				                        
			$objetos[] = new Perfil($perfil['id'],$perfil['nome'],self::_setAcoes($perfil['id']));
		}
		return $objetos;
	}

	private static function _setAcoes($perfil){            
		$instancia = PerfilDAO::getInstancia();
		$acoes = $instancia->setAcoes($perfil);                
		if(!$acoes)
		throw new AcaoInexistente();		
		foreach($acoes as $acao){			
			$objetos[] = Acao::buscar($acao['codigo'],$acao['id_modulos']);
		}					                
		return $objetos;
	}

	public function getModulos(){
		$modulos = array();
		foreach($this->getAcoes() as $acao){
			if(!in_array($acao->getModulo(),$modulos))
			$modulos[] = $acao->getModulo();
		}
		return $modulos;
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
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getAcoes(){
		return $this->acoes;
	}
	public function setAcoes(array $acoes){
		$this->acoes = $acoes;
	}
}
?>