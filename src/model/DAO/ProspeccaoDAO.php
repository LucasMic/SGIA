<?php
/**
 * Classe ProspeccaoDAO
 * Camada de acesso a dados da entidade Prospeccao
 * @package model
 * @subpackage DAO
 * @author SoftLuc
 */
    class ProspeccaoDAO {		
        /*
        * Atributos
        */
        private static $instancia;
        private $conexao;	
        const TABELA = 'prospeccao';

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
                    self::$instancia = new ProspeccaoDAO();
            return self::$instancia;
        }		

        /*
        * Metodo inserir($obj)
        * @param $obj
        * @return Proejto
        */
        public function inserir($obj){
            //isso foi por conta da hospedagem
            $projeto = $obj->getProjeto();
            $usuarioProjeto = $projeto->getUsuario();
            $perfilUsuarioProjeto = $usuarioProjeto->getPerfil();            
            
            $usuario = $obj->getUsuario();
            $perfilUsuario = $usuario->getPerfil();
            //isso foi por conta da hospedagem
            
            // INSTRUCAO SQL //
            $sql = "INSERT INTO " . self::TABELA . "
            (elevacao, 
            coordenada_UTM_N, 
            coordenada_UTM_E, 
            ponto_de, 
            observacao, 
            usuario_id, 
            usuario_perfil_id,
            projeto_id,
            projeto_usuario_id,
            projeto_usuario_perfil_id) 
            VALUES('".$obj->getElevacao()."',
            '".$obj->getCoordenada_UTM_N()."',
            '".$obj->getCoordenada_UTM_E()."',
            '".$obj->getPontoDe()."',
            '".$obj->getObs()."',
                
            '".$usuario->getId()."',
            '".$perfilUsuario->getId()."',
                
            '".$projeto->getId()."',
            '".$usuarioProjeto->getId()."',    
            '".$perfilUsuarioProjeto->getId()."')";
            
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
            
            $projeto = $obj->getProjeto();
            $usuarioProjeto = $projeto->getUsuario();
            $perfilUsuarioProjeto = $usuarioProjeto->getPerfil();            
            
            $usuario = $obj->getUsuario();
            $perfilUsuario = $usuario->getPerfil();
            
                       
            $sql = "UPDATE " . self::TABELA . " SET 
            elevacao = '".$obj->getElevacao()."',
            coordenada_UTM_N = '".$obj->getCoordenada_UTM_N()."',
            coordenada_UTM_E = '".$obj->getCoordenada_UTM_E()."',
            ponto_de = '".$obj->getPontoDe()."',                
            observacao = '".$obj->getObs()."',    

            usuario_id = '".$usuario->getId()."',
            usuario_perfil_id =	'".$perfilUsuario->getId()."',

            projeto_id = '".$projeto->getId()."',
            projeto_usuario_id = '".$usuarioProjeto->getId()."',
            projeto_usuario_perfil_id =	'".$perfilUsuarioProjeto->getId()."'

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
        public function listar($idProjeto){
            // INSTRUCAO SQL //
            $txtWhere = "";
            if($idProjeto != 0){
                $txtWhere = " where projeto_id = ".$idProjeto." ";
            }            
            $sql = "SELECT u.* FROM " . self::TABELA . " u ".$txtWhere." ORDER BY u.elevacao";                
            // EXECUTANDO A SQL //
            $resultado = $this->conexao->fetchAll($sql);
            // RETORNANDO O RESULTADO //
            return $resultado;
        }          

    }
?>