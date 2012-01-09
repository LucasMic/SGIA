<?php
/**
 * Classe UsuarioDAO
 * Camada de acesso a dados da entidade Usuario
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class UsuarioDAO {
		
		/*
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'usuarios';
                
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
				self::$instancia = new UsuarioDAO();
			return self::$instancia;
		}		
		
		/*
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Usuario
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(id_perfis,login,senha) VALUES('".$obj->getPerfil()->getId()."',
                        '".$obj->getLogin()."',
			'".md5($obj->getSenha())."')";
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
		 * @return Usuario
		 */
		public function editar($obj){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET id_perfil = '".$obj->getPerfil()->getId()."',
                        login =	'".$obj->getLogin()."',
			senha = '".md5($obj->getSenha())."'													
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
		
		/*$sede
		 * Metodo logar($login,$senha)
		 * @param $login
		 * @param $senha
		 * @return fetch_assoc
		 */
		public function logar($login,$senha){
			// INSTRUCAO SQL //
			$sql = "SELECT u.* FROM " . self::TABELA . " u WHERE u.login = '".$login."' AND 
                        u.senha = '".md5($senha)."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetch($sql);		
			
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
			$sql = "SELECT u.* FROM " . self::TABELA . " u ORDER BY u.login";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}	
		
		/*
		 * Metodo trocarSenha($id,$senhaAtual,$novaSenha)
		 * @param $id
		 * @param $senhaAtual
		 * @param $novaSenha
		 * @return boolean
		 */
		public function trocarSenha($id,$senhaAtual,$novaSenha){
			// checando se a senha atual está correta //
			if(!$this->conexao->fetch("SELECT u.id FROM " . self::TABELA . " u WHERE u.id = '".$id."' AND u.senha = '".md5($senhaAtual)."'"))
				throw new SenhaInvalida();
			// instrução sql //
			$sql = "UPDATE " . self::TABELA . " SET senha = '".md5($novaSenha)."' WHERE id = '".$id."'";
			// executando a sql //
			$resultado = $this->conexao->exec($sql);
			// retornando o resultado //
			return $resultado;
		}

	}
?>