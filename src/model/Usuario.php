<?php
/**
 * Classe Usuario
 * @package model
 * @author Idealizza
 */
	class Usuario {

		/**
		 * Atributos
		 */
		private $id;
		private $perfil;
		private $login;
		private $senha;


		/**
		 * Metodo construtor()
		 * @param $id
		 * @param $perfil
		 * @param $login
		 * @param $senha
		 * @return Usuario
		 */
		public function __construct($id = 0,Perfil $perfil = null,$login = '',$senha = null){
			$this->id = $id;
			$this->perfil = $perfil;
			$this->login = $login;
			$this->senha = $senha;			

		}

		/**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){
			if(($this->getPerfil() == null)||($this->getLogin() == '')||($this->getSenha() == null))
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
			$instancia = UsuarioDAO::getInstancia();
			// executando o metodo //
			$usuario = $instancia->inserir($this);
			// retornando o Usuario //
			return $usuario;
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
			$instancia = UsuarioDAO::getInstancia();
			// executando o metodo //
			$usuario = $instancia->editar($this);
			// retornando o Usuario //
			return $usuario;
		}

		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = UsuarioDAO::getInstancia();
			// executando o metodo //
			$usuario = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $usuario;
		}

		/**
		 * Metodo listar()
		 * @return Usuario[]
		 */
		public static function listar(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = UsuarioDAO::getInstancia();
			// executando o metodo //
			$usuarios = $instancia->listar();
			// checando se o retorno foi falso //
			if(!$usuarios)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::USUARIOS);
			// percorrendo os usuarios //
			foreach($usuarios as $usuario){
				// instanciando e jogando dentro da colecao $objetos o Usuario //
				$objetos[] = new Usuario($usuario['id'],Perfil::buscar($usuario['id_perfis']),$usuario['login'], null);
			}
			// retornando a colecao $objetos //
			return $objetos;
		}

		/**
		 * Metodo logar($login,$senha)
		 * @param $login
		 * @param $senha
		 * @return Usuario
		 */
		public static function logar($login,$senha){
			// verificando se $login ou $senha estao vazios //
			if((empty($login))||(empty($senha)))
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = UsuarioDAO::getInstancia();
			// executando o metodo //
			$usuario = $instancia->logar($login,$senha);
			// checando se o retorno foi falso //
			if(!$usuario)
				// levantando a excessao LoginInvalido //
				throw new LoginInvalido();
			// retornando o Usuario //                        
			return new Usuario($usuario['id'],Perfil::buscar($usuario['id_perfis']),$usuario['login'], null);
		}

		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Usuario
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = UsuarioDAO::getInstancia();
			// executando o metodo //
			$usuario = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$usuario)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::USUARIO);
			// instanciando e retornando o Usuario //
			return new Usuario($usuario['id'],Perfil::buscar($usuario['id_perfis']),$usuario['login'], null);
		}


		public function trocarSenha($senhaAtual,$novaSenha){
			if((empty($senhaAtual))||(empty($novaSenha)))
				throw new CamposObrigatorios();
			$instancia = UsuarioDAO::getInstancia();
			$usuario = $instancia->trocarSenha($this->getId(),$senhaAtual,$novaSenha);
			return $usuario;
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
		public function getPerfil(){
			return $this->perfil;
		}
		public function setPerfil(Perfil $perfil){
			$this->perfil = $perfil;
		}
		public function getLogin(){
			return $this->login;
		}
		public function setLogin($login){
			$this->login = $login;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}
	} ?>