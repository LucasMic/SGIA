<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Projeto
 *
 * @author softluc
 */
class Prospeccao {
    
    /*    
    *Atributos
    */
    private $id;
    private $elevacao;
    private $coordenada_UTM_N;
    private $coordenada_UTM_E;
    private $pontoDe;
    private $obs;        
    private $projeto;
    private $usuario;
    
    
    /*
    * Metodo construtor()
    * @param $id
    * @param $perfil
    * @param $login
    * @param $senha
    * @return Usuario
    */
    public function __construct(
            $id = 0, 
            $elevacao = "", 
            $coordenada_UTM_N = "", 
            $coordenada_UTM_E = "", 
            $pontoDe = "", 
            $obs = "", 
            $projeto = "", 
            $usuario = ""){
        
        $this->id = $id;
        $this->elevacao = $elevacao;
	$this->coordenada_UTM_N = $coordenada_UTM_N;        
        $this->coordenada_UTM_E = $coordenada_UTM_E;
        $this->pontoDe = $pontoDe;
        $this->obs = $obs;
        $this->projeto = $projeto;
        $this->usuario = $usuario;
    }
                        
    /*
    * Metodos getters() e setters()
    */
    public function getId(){
            return $this->id;
    }
    public function setId($id){
            $this->id = $id;
    }
    public function getElevacao(){
            return $this->elevacao;
    }
    public function setElevacao($elevacao){
            $this->elevacao = $elevacao;
    }    
    public function getCoordenada_UTM_N(){
            return $this->coordenada_UTM_N;
    }
    public function setCoordenada_UTM_N($coordenada_UTM_N){
            $this->coordenada_UTM_N = $coordenada_UTM_N;
    }    
    public function getCoordenada_UTM_E(){
            return $this->coordenada_UTM_E;
    }
    public function setCoordenada_UTM_E($coordenada_UTM_E){
            $this->coordenada_UTM_E = $coordenada_UTM_E;
    }    
    public function getPontoDe(){
            return $this->pontoDe;
    }
    public function setPontoDe($pontoDe){
            $this->pontoDe = $pontoDe;
    }      
    public function getObs(){
            return $this->obs;
    }
    public function setobs($obs){
            $this->obs = $obs;
    }
    public function getProjeto(){
            return $this->projeto;
    }
    public function setProjeto($projeto){
            $this->projeto = $projeto;
    }
    public function getUsuario(){
            return $this->usuario;
    }
    public function setUsuario($usuario){
            $this->usuario = $usuario;
    }    
        
                                                
                                                
        
    
    
    /*
    * Metodo _validarCampos()
    * @return boolean
    */
    private function _validarCampos(){
        if(($this->getElevacao() == "")||($this->getCoordenada_UTM_N() == "")||($this->getCoordenada_UTM_E() == "")||($this->getPontoDe() == 0))
            return false;
        else
            return true;
    }
    
    /**
    * Metodo inserir()    
    */
    public function inserir(){
        // validando os campos //
        if(!$this->_validarCampos()){            
            // levantando a excessao CamposObrigatorios //
            throw new CamposObrigatorios();
        }
            
        // recuperando a instancia da classe de acesso a dados //
        $instancia = ProspeccaoDAO::getInstancia();
        // executando o metodo //
        $retorno = $instancia->inserir($this);
        // retornando o Usuario //
        return $retorno;
    }
    
    /**
    * Metodo editar()
    */
    public function editar(){
        // validando os campos //
        if(!$this->_validarCampos()){
                // levantando a excessao 0,CamposObrigatorios //
                throw new CamposObrigatorios();
        }
        // recuperando a instancia da classe de acesso a dados //
        $instancia = ProspeccaoDAO::getInstancia();
        // executando o metodo //
        $retorno = $instancia->editar($this);
        // retornando o Usuario //
        return $retorno;
    }
    
    /**
    * Metodo excluir()
    * @return boolean
    */
    public function excluir(){
        // recuperando a instancia da classe de acesso a dados //
        $instancia = ProspeccaoDAO::getInstancia();
        // executando o metodo //
        $retorno = $instancia->excluir($this->getId());
        // retornando o resultado //
        return $retorno;
    }
    
    /**
    * Metodo listar()
    * @return Usuario[]
    */
    public static function listar($idProjeto){        
        // recuperando a instancia da classe de acesso a dados //
        $instancia = ProspeccaoDAO::getInstancia();
        // executando o metodo //
        $objetos = $instancia->listar($idProjeto);
        // checando se o retorno foi falso //
        if(!$objetos)
                // levantando a excessao ListaVazia //
                throw new ListaVazia(ListaVazia::PROSPECCAO);
        // percorrendo os usuarios //
        foreach($objetos as $objeto){
                // instanciando e jogando dentro da colecao $objetos o Usuario //
                $usuario = Usuario::buscar($objeto['usuario_id']);  
                $projeto = Projeto::buscar($objeto['projeto_id']);
            
                $listaObjetos[] = new Prospeccao($objeto['id'],$objeto['elevacao'], $objeto['coordenada_UTM_N'], $objeto['coordenada_UTM_E'], $objeto['ponto_de'], $objeto['observacao'], $projeto, $usuario);
        }
        // retornando a colecao $objetos //
        return $listaObjetos;
    }
    
    /*
    * Metodo buscar($id)
    * @param $id
    * @return Usuario
    */
    public static function buscar($id){
        // recuperando a instancia da classe de acesso a dados //
        $instancia = ProspeccaoDAO::getInstancia();
        // executando o metodo //
        $objeto = $instancia->buscar($id);
        // checando se o resultado foi falso //
        if(!$objeto){
                // levanto a excessao RegistroNaoEncontrado //
                throw new RegistroNaoEncontrado(RegistroNaoEncontrado::PROSPECCAO);
        }
        $usuario = Usuario::buscar($objeto['usuario_id']);  
        $projeto = Projeto::buscar($objeto['projeto_id']);
        // instanciando e retornando o Usuario //
        return new Prospeccao($objeto['id'],$objeto['elevacao'], $objeto['coordenada_UTM_N'], $objeto['coordenada_UTM_E'], $objeto['ponto_de'], $objeto['observacao'], $projeto, $usuario);
    }
    
}

?>
