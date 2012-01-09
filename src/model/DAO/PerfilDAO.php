<?php
/**
 * Classe PerfilDAO
 * Camada de acesso a dados da entidade Perfil
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class PerfilDAO {

		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'perfis';

		/**
		 * Metodo construtor()
		 */
		private function __construct(){	
			$this->conexao = Connect::getInstancia();
		}
		
		/**
		 * Metodo getInstancia()
		 */
		public static function getInstancia(){
			if(!isset(self::$instancia))
				self::$instancia = new PerfilDAO();
			return self::$instancia;
		}
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Perfil
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(nome, sedes_id) VALUES('".$obj->getNome()."', '".$obj->getSede()->getId()."')";
			// EXECUTANDO A SQL //
			$perfil = $this->conexao->exec($sql);
			// RECUPERANDO O ID //
			$obj->setId(mysql_insert_id());
			// PERCORRENDO AS ACOES //
			foreach($obj->getAcoes() as $acao){
				// INSTRUCAO SQL 2 //
				$sql2 = "INSERT INTO acoes_modulos_perfis(codigo,id_modulos,id_perfis) VALUES('".$acao->getCodigo()."',
																							 '".$acao->getModulos()->getId()."',
																							 '".$obj->getId()."')";
				// EXECUTANDO A SQL 2 //
				$this->conexao->exec($sql2);
			}
			// RETORNANDO O RESULTADO //
			return $perfil;
		}		
		
		/**
		 * Metodo editar($obj)
		 * @param $obj
		 * @return Perfil
		 */
		public function editar($obj){
			// INSTRUCAO SQL //		
			
			$sql = "UPDATE " . self::TABELA . " SET nome = '".$obj->getNome()."', sedes_id = '".$obj->getSede()->getId()."' WHERE id = '".$obj->getId()."'";
			$this->conexao->exec($sql);
						
							
			// INSTRUCAO SQL 2 //
			$sql2 = "DELETE FROM acoes_modulos_perfis WHERE id_perfis = '".$obj->getId()."'";
			$this->conexao->exec($sql2);
			
						
			$a = 0;
			foreach($obj->getAcoes() as $acao){
				// INSTRUCAO SQL 3 //				
				$a=$a+1;
				$sql3 = "INSERT INTO acoes_modulos_perfis(codigo,id_modulos,id_perfis) VALUES('".$acao->getCodigo()."',
																							 '".$acao->getModulos()->getId()."',																							 
																							 '".$obj->getId()."')";

				$this->conexao->exec($sql3);
			}
		}		
		
		/**
		 * Metodo excluir($id)
		 * @param $id
		 * @return boolean
		 */
		public function excluir($id){
			// checando se existe algum vinculo desse registro com outros //
			$validacao = "SELECT u.id FROM usuarios u WHERE id_perfis = '".$id."'";
			if($this->conexao->fetch($validacao)) 
				throw new RegistroNaoExcluido(RegistroNaoExcluido::PERFIL); 
			// INSTRUCOES SQL //
			$sql[] = "DELETE FROM " . self::TABELA . " WHERE id = '".$id."'";
			$sql[] = "DELETE FROM acoes_modulos_perfis WHERE id_perfis = '".$id."'";
			// PERCORRENDO AS SQL //
			foreach($sql as $item){
				// EXECUTANDO A SQL //
				$resultado = $this->conexao->exec($item);
			}
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return fetch_assoc
		 */
		public function buscar($id){
			// INSTRUCAO SQL //
			$sql = "SELECT p.* FROM " . self::TABELA . " p WHERE p.id = '".$id."'";
                        // EXECUTANDO A SQL //
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		/**
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar(){
			// INSTRUCAO SQL //
			$sql = "SELECT p.* FROM " . self::TABELA . " p  ORDER BY p.nome";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);                        
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		/**
		 * Metodo setAcoes($perfil)
		 * @param $perfil
		 * @return fetch_assoc[]
		 */
		public function setAcoes($perfil){
			// INSTRUCAO SQL //			
			$sql = "SELECT amp.codigo,amp.id_modulos FROM acoes_modulos_perfis amp 
					WHERE amp.id_perfis = '".$perfil."'
					ORDER BY amp.codigo";
			// EXECUTANDO A SQL //	
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //			
			return $resultado;
			
		}
	}
?>