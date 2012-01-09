<?php
/**
 * Classe Aluno
 * @package model
 * @author Idealizza
 */
	class Aluno {

		/**
		 * Atributos
		 */
		private $id;
		private $nome;
		private $sexo;
		private $rg;
		private $orgaoExpedidor;
		private $cpf;
		private $endereco;
		private $bairro;
		private $cep;
		private $cidade;
		private $estado;
		private $telefone1;
		private $telefone2;
		private $email;
		private $escolaridade;
		private $profissao;
		private $sede;


		public function __construct($id = 0, $nome = "", $sexo = "", $rg = "", $orgaoExpedidor = "", $cpf = "", $endereco = "", $bairro = "", $cep = "", $cidade = "", $estado = "",
									$telefone1 = "", $telefone2 = "", $email = "", $escolaridade = "", $profissao = "", Sede $sede = null){
			$this->id = $id;
			$this->nome = $nome;
			$this->sexo = $sexo;
			$this->rg = $rg;
			$this->orgaoExpedidor = $orgaoExpedidor;
			$this->cpf = $cpf;
			$this->endereco = $endereco;
			$this->bairro = $bairro;
			$this->cep = $cep;
			$this->cidade = $cidade;
			$this->estado = $estado;
			$this->telefone1 = $telefone1;
			$this->telefone2 = $telefone2;
			$this->email = $email;
			$this->escolaridade = $escolaridade;
			$this->profissao = $profissao;
			$this->sede = $sede;

		}

		/**
		 * Metodo _validarCampos()
		 * @return boolean
		 */
		private function _validarCampos(){
			if(($this->getNome() == null)||($this->getSexo() == ''))
				return false;
			return true;
		}

		/**
		 * Metodo inserir()
		 * @return Aluno
		 */
		public function inserir(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = AlunoDAO::getInstancia();
			// executando o metodo //
			$aluno = $instancia->inserir($this);
			// retornando o Aluno //
			return $aluno;
		}

		/**
		 * Metodo editar()
		 * @return Aluno
		 */
		public function editar(){
			// validando os campos //
			if(!$this->_validarCampos())
				// levantando a excessao CamposObrigatorios //
				throw new CamposObrigatorios();
			// recuperando a instancia da classe de acesso a dados //
			$instancia = AlunoDAO::getInstancia();
			// executando o metodo //
			$aluno = $instancia->editar($this);
			// retornando o Aluno //
			return $aluno;
		}

		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = AlunoDAO::getInstancia();
			// executando o metodo //
			$aluno = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $aluno;
		}

		/**
		 * Metodo listar()
		 * @param $sede
		 * @return Aluno[]
		 */
		public static function listar($sede){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = AlunoDAO::getInstancia();
			// executando o metodo //
			$alunos = $instancia->listar($sede);
			// checando se o retorno foi falso //
			if(!$alunos)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::ALUNOS);
			// percorrendo os alunos //
			foreach($alunos as $aluno){
				// instanciando e jogando dentro da colecao $objetos o Aluno //
				$objetos[] = new Aluno($aluno["id"], $aluno["nome"], $aluno["sexo"], $aluno["rg"], $aluno["orgao_expedidor"], $aluno["cpf"], $aluno["endereco"],
									$aluno["bairro"], $aluno["cep"], $aluno["cidade"], $aluno["estado"], $aluno["telefone_1"], $aluno["telefone_2"], $aluno["email"],
									$aluno["escolaridade"], $aluno["profissao"], Sede::buscar($aluno["sedes_id"]));
			}
			// retornando a colecao $objetos //
			return $objetos;
		}

		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Aluno
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = AlunoDAO::getInstancia();
			// executando o metodo //
			$aluno = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$aluno)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::ALUNOS);
			// instanciando e retornando o Aluno //
			return new Aluno($aluno["id"], $aluno["nome"], $aluno["sexo"], $aluno["rg"], $aluno["orgao_expedidor"], $aluno["cpf"], $aluno["endereco"],
							$aluno["bairro"], $aluno["cep"], $aluno["cidade"], $aluno["estado"], $aluno["telefone_1"], $aluno["telefone_2"], $aluno["email"],
							$aluno["escolaridade"], $aluno["profissao"], Sede::buscar($aluno["sedes_id"]));
		}


                public function getId() {
                    return $this->id;
                }

                public function setId($id) {
                    $this->id = $id;
                }

                public function getNome() {
                    return $this->nome;
                }

                public function setNome($nome) {
                    $this->nome = $nome;
                }

                public function getSexo() {
                    return $this->sexo;
                }

                public function setSexo($sexo) {
                    $this->sexo = $sexo;
                }

                public function getRg() {
                    return $this->rg;
                }

                public function setRg($rg) {
                    $this->rg = $rg;
                }

                public function getOrgaoExpedidor() {
                    return $this->orgaoExpedidor;
                }

                public function setOrgaoExpedidor($orgaoExpedidor) {
                    $this->orgaoExpedidor = $orgaoExpedidor;
                }

                public function getCpf() {
                    return $this->cpf;
                }

                public function setCpf($cpf) {
                    $this->cpf = $cpf;
                }

                public function getEndereco() {
                    return $this->endereco;
                }

                public function setEndereco($endereco) {
                    $this->endereco = $endereco;
                }

                public function getBairro() {
                    return $this->bairro;
                }

                public function setBairro($bairro) {
                    $this->bairro = $bairro;
                }

                public function getCep() {
                    return $this->cep;
                }

                public function setCep($cep) {
                    $this->cep = $cep;
                }

                public function getCidade() {
                    return $this->cidade;
                }

                public function setCidade($cidade) {
                    $this->cidade = $cidade;
                }

                public function getEstado() {
                    return $this->estado;
                }

                public function setEstado($estado) {
                    $this->estado = $estado;
                }

                public function getTelefone1() {
                    return $this->telefone1;
                }

                public function setTelefone1($telefone1) {
                    $this->telefone1 = $telefone1;
                }

                public function getTelefone2() {
                    return $this->telefone2;
                }

                public function setTelefone2($telefone2) {
                    $this->telefone2 = $telefone2;
                }

                public function getEmail() {
                    return $this->email;
                }

                public function setEmail($email) {
                    $this->email = $email;
                }

                public function getEscolaridade() {
                    return $this->escolaridade;
                }

                public function setEscolaridade($escolaridade) {
                    $this->escolaridade = $escolaridade;
                }

                public function getProfissao() {
                    return $this->profissao;
                }

                public function setProfissao($profissao) {
                    $this->profissao = $profissao;
                }

                public function getSede() {
                    return $this->sede;
                }

                public function setSede(Sede $sede) {
                    $this->sede = $sede;
                }


	} ?>