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
class Projeto {
    
    /*    
    *Atributos
    */
    private $id;
    private $nome;
    private $descricao;
    private $introducao;
    private $metodologia;
    private $descricaoAreasPesquisa;
    private $consideracoesGeraisRecomendacoes;
    private $usuario_id;
    private $usuario_perfil_id;
    
    /*
    * Metodo construtor()
    * @param $id
    * @param $perfil
    * @param $login
    * @param $senha
    * @return Usuario
    */
    public function __construct($id = 0, $nome = "", 
            $descricao = "", $introducao = "", 
            $metodologia = "", $descricaoAreasPesquisa = "", $consideracoesGeraisRecomendacoes = "", 
            Usuario $usuario = null){
        
        $this->id = $id;
	$this->nome = $nome;        
	$this->descricao = $descricao;        
	$this->introducao = $introducao;
        $this->metodologia = $metodologia;
        $this->descricaoAreasPesquisa = $descricaoAreasPesquisa;
        $this->consideracoesGeraisRecomendacoes = $consideracoesGeraisRecomendacoes;
        $this->usuario_id = $usuario->getId();
        $this->usuario_perfil_id = $usuario->getPerfil()->getId();
                
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
    public function getNome(){
            return $this->nome;
    }
    public function setNome($nome){
            $this->nome = $nome;
    }    
    public function getDescricao(){
            return $this->descricao;
    }
    public function setDescricao($descricao){
            $this->descricao = $descricao;
    }    
    public function getIntroducao(){
            return $this->introducao;
    }
    public function setIntroducao($introducao){
            $this->introducao = $introducao;
    }    
    public function getMetodologia(){
            return $this->metodologia;
    }
    public function setMetodologia($metodologia){
            $this->metodologia = $metodologia;
    }        
    public function getDescricaoAreasPesquisa(){
            return $this->descricaoAreasPesquisa;
    }
    public function setDescricaoAreasPesquisa($descricaoAreasPesquisa){
            $this->descricaoAreasPesquisa = $descricaoAreasPesquisa;
    }
    public function getConsideracoesGeraisRecomendacoes(){
            return $this->consideracoesGeraisRecomendacoes;
    }
    public function setConsideracoesGeraisRecomendacoes($consideracoesGeraisRecomendacoes){
            $this->consideracoesGeraisRecomendacoes = $consideracoesGeraisRecomendacoes;
    }
    public function getUsuario_id(){
            return $this->usuario_id;
    }
    public function setUsuario_id($usuario_id){
            $this->usuario_id = $usuario_id;
    }    
    public function getUsuario_perfil_id(){
            return $this->usuario_perfil_id;    
    }
    public function setUsuario_perfil_id($usuario_perfil_id){
            $this->usuario_perfil_id = $usuario_perfil_id;
    }
    
    /*
    * Metodo _validarCampos()
    * @return boolean
    */
    private function _validarCampos(){
            //if(($this->getPerfil() == null)||($this->getLogin() == '')||($this->getSenha() == null))
                    //return false;
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
        $instancia = ProjetoDAO::getInstancia();
        // executando o metodo //
        $projeto = $instancia->inserir($this);
        // retornando o Usuario //
        return $projeto;
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
        $instancia = ProjetoDAO::getInstancia();
        // executando o metodo //
        $projeto = $instancia->editar($this);
        // retornando o Usuario //
        return $projeto;
    }
    
    /**
    * Metodo excluir()
    * @return boolean
    */
    public function excluir(){
        // recuperando a instancia da classe de acesso a dados //
        $instancia = ProjetoDAO::getInstancia();
        // executando o metodo //
        $projeto = $instancia->excluir($this->getId());
        // retornando o resultado //
        return $projeto;
    }
    
    /**
    * Metodo listar()
    * @return Usuario[]
    */
    public static function listar(){
        // recuperando a instancia da classe de acesso a dados //
        $instancia = ProjetoDAO::getInstancia();
        // executando o metodo //
        $projetos = $instancia->listar();
        // checando se o retorno foi falso //
        if(!$projetos)
                // levantando a excessao ListaVazia //
                throw new ListaVazia(ListaVazia::PROJETOS);
        // percorrendo os usuarios //
        foreach($projetos as $projeto){
                // instanciando e jogando dentro da colecao $objetos o Usuario //
                $objetos[] = new Projeto($projeto['id'],$projeto['nome'],$projeto['descricao'], $projeto['introducao'], $projeto['metodologia'], $projeto['descricao_areas_pesquisa'], $projeto['consideracoes_gerais_recomendacoes'], $projeto['usuario_id'], $projeto['usuario_perfil_id']);
        }
        // retornando a colecao $objetos //
        return $objetos;
    }
    
    /*
    * Metodo buscar($id)
    * @param $id
    * @return Usuario
    */
    public static function buscar($id){
        // recuperando a instancia da classe de acesso a dados //
        $instancia = ProjetoDAO::getInstancia();
        // executando o metodo //
        $projeto = $instancia->buscar($id);
        // checando se o resultado foi falso //
        if(!$projeto)
                // levanto a excessao RegistroNaoEncontrado //
                throw new RegistroNaoEncontrado(RegistroNaoEncontrado::PROJETOS);
        // instanciando e retornando o Usuario //
        return new Projeto($projeto['id'],$projeto['nome'],$projeto['descricao'], $projeto['introducao'], $projeto['metodologia'], $projeto['descricao_areas_pesquisa'], $projeto['consideracoes_gerais_recomendacoes'], $projeto['usuario_id'], $projeto['usuario_perfil_id']);
    }
    
}

?>
