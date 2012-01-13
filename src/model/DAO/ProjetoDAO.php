<?php
/**
 * Classe ProjetoDAO
 * Camada de acesso a dados da entidade Projeto
 * @package model
 * @subpackage DAO
 * @author SoftLuc
 */
    class ProjetoDAO {		
        /*
        * Atributos
        */
        private static $instancia;
        private $conexao;	
        const TABELA = 'projeto';

        /*
        * Metodo construtor()
        */
        private function __construct(){	
            $this->conexao = Connect::getInstancia();
        }

        /*
        * Metodo getInstancia()
        */
        public static function getInstancia(){
            if(!isset(self::$instancia))
                    self::$instancia = new ProjetoDAO();
            return self::$instancia;
        }		

        /*
        * Metodo inserir($obj)
        * @param $obj
        * @return Proejto
        */
        public function inserir($obj){
            // INSTRUCAO SQL //
            $sql = "INSERT INTO " . self::TABELA . "
            (nome, descricao, introducao, metodologia, 
            descricao_areas_pesquisa, consideracoes_gerais_recomendacoes, 
            usuario_id, usuario_perfil_id) 
            VALUES('".$obj->getNome()."',
            '".$obj->getDescricao()."',
            '".$obj->getIntroducao()."',
            '".$obj->getMetodologia()."',
            '".$obj->getDescricaoAreasPesquisa()."',
            '".$obj->getConsideracoesGeraisRecomendacoes()."',
            '".$obj->getUsuario()->getId()."',
            '".$obj->getUsuario()->getPerfil()->getId()."')";
            // EXECUTANDO A SQL //
            $resultado = $this->conexao->exec($sql);

            // TRATANDO O RESULTADO //
            if($resultado){
                    $obj->setId(mysql_insert_id());
            } else {
                    $obj = $resultado;	
            } 
            // RETORNANDO O RESULTADO //
            return $obj;
        }

        /*
        * Metodo editar($obj)
        * @param $obj
        * @return Projeto
        */
        public function editar($obj){
            // INSTRUCAO SQL //
            $sql = "UPDATE " . self::TABELA . " SET 
            nome = '".$obj->getNome()."',
            descricao =	'".$obj->getDescricao()."',
            introducao = '".$obj->getIntroducao()."',
            metodologia = '".$obj->getMetodologia()."',
            descricao_areas_pesquisa = '".$obj->getDescricaoAreasPesquisa()."',
            consideracoes_gerais_recomendacoes = '".$obj->getConsideracoesGeraisRecomendacoes()."',    
            usuario_id = '".$obj->getUsuario_id()."',
            usuario_perfil_id = '".$obj->getUsuario_perfil_id()."'                    
            WHERE id = '".$obj->getId()."'";
            // EXECUTANDO A SQL //
            $resultado = $this->conexao->exec($sql);
            // RETORNANDO O RESULTADO //
            return $resultado;                    
        }

        /*
        * Metodo excluir($id)
        * @param $id
        * @return boolean
        */                
        public function excluir($id){
            // INSTRUCAO SQL //
            $sql = "DELETE FROM " . self::TABELA . " WHERE id = '".$id."'";
            // EXECUTANDO A SQL //
            $resultado = $this->conexao->exec($sql);
            // RETORNANDO O RESULTADO //
            return $resultado;
        }            

        /*
        * Metodo buscar($id)
        * @param $id
        * @return fetch_assoc
        */
        public function buscar($id){
            // INSTRUCAO SQL //
            $sql = "SELECT u.* FROM " . self::TABELA . " u WHERE u.id = '".$id."'";
            // EXECUTANDO A SQL //
            $resultado = $this->conexao->fetch($sql);
            // RETORNANDO O RESULTADO //
            return $resultado;
        }

        /*
        * Metodo listar()
        * @return fetch_assoc[]
        */
        public function listar(){
            // INSTRUCAO SQL //
            $sql = "SELECT u.* FROM " . self::TABELA . " u ORDER BY u.nome";
            // EXECUTANDO A SQL //
            $resultado = $this->conexao->fetchAll($sql);
            // RETORNANDO O RESULTADO //
            return $resultado;
        }          

    }
?>