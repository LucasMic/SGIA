<?php
/**
 * Classe AlunoControll
 * Controlador do modulo de rh
 * @package controll
 * @author Idealizza
 */
	class AlunoControll extends Controll {
		
		/**
		 * Constante referente ao número do modulo
		 */
		const MODULO = 5;
		
		/**
		 * Acao index()
		 */
		public function index(){
			// código da ação //
			static $acao = 1;
			// definindo a tela //
			$this->setTela('listar',array('aluno'));
			// guardando a url //
			$this->getPage();
		}
		
		/**
		 * Acao ver($id)
		 * @param $id
		 */
		public function ver($id){
			// código da ação //
			static $acao = 1;
			// buscando o usuário //
			$aluno = Aluno::buscar($id);
			// jogando o usuário no atributo $dados do controlador //
			$this->setDados($aluno,'VIEW');
			// definindo a tela //
			$this->setTela('ver',array('aluno'));
		}
		
		/**
		 * Acao add()
		 */
		public function add() {
			// código da ação //
			static $acao = 2;
			// checando se o formulário nao foi passado //
			if(!$this->getDados('POST')) {
                            //  definindo a  tela //
                            $this->setTela('add',array('aluno'));
                        } else {
                            // caso passar o formulário //
                            // chamando o metodo privado _add() passando os dados do post por parametro //
                            $this->_add($this->getDados('POST'));
                        }
		}

		/**
		 * Metodo _add($dados)
		 * @param $dados
		 * @return Usuario
		 */
		private function _add($dados){
			// instanciando o novo Usuário //
			$aluno = new Aluno(0, $dados["nome"], $dados["sexo"], $dados["rg"], $dados["orgao_expedidor"], $dados["cpf"], $dados["endereco"], 
									$dados["bairro"], $dados["cep"], $dados["cidade"], $dados["estado"], $dados["telefone_1"], $dados["telefone_2"], $dados["email"], 
									$dados["escolaridade"], $dados["profissao"], Sede::buscar($_SESSION["sede"]));
			// persistindo em inserir o usuário //
			try {
				$aluno->inserir();
				// setando a mensagem de sucesso //
				$this->setFlash('Aluno cadastrado com sucesso.');
				// setando a url //
				$this->setPage();
			}
			// capturando a excessão CamposObrigatorios //
			catch(CamposObrigatorios $e){
				// setando a mensagem de excessão //
				$this->setFlash($e->getMessage());
				// definindo a tela //
				$this->setTela('add',array('aluno'));
			}
		}
		
		/**
		 * Acao editar($id)
		 * @param $id
		 */
		public function editar($id){
			// código da ação //
			static $acao = 3;
			// Buscando o usuário //
			$aluno = Aluno::buscar($id);
			// checando se o formulário nao foi passado //
			if(!$this->getDados('POST')){
				// Jogando perfil no atributo $dados do controlador //
				$this->setDados($aluno,'VIEW');
				// Definindo a tela //
				$this->setTela('editar',array('aluno'));
			}
			// caso passar o formulario //
			else
				// chamando o metodo privado _editar() passando os dados do post por parametro //
				$this->_editar($this->getDados('POST'));
		}
		
		/**
		 * Metodo _editar($dados)
		 * @param $dados
		 * @return Usuario
		 */
		private function _editar($dados){
			$aluno = new Aluno($dados["id"], $dados["nome"], $dados["sexo"], $dados["rg"], $dados["orgao_expedidor"], $dados["cpf"], $dados["endereco"], 
									$dados["bairro"], $dados["cep"], $dados["cidade"], $dados["estado"], $dados["telefone_1"], $dados["telefone_2"], $dados["email"], 
									$dados["escolaridade"], $dados["profissao"], Sede::buscar($_SESSION["sede"]));
			try {
				$aluno->editar();
				$this->setFlash('Aluno editado com sucesso');
				$this->setPage();
			}
			catch(CamposObrigatorios $e){
				$this->setFlash($e->getMessage());
				$this->setDados($aluno,'VIEW');
				$this->setTela('editar',array('aluno'));
			}
		}
		
		/**
		 * Acao excluir($id)
		 * @param $id
		 */
		public function excluir($id){
			// código da ação //
			static $acao = 4;
			// buscando o usuário //			
			$aluno = Aluno::buscar($id);
			// checando se o usuário a ser excluído é diferente do logado //
			// excluíndo ele //
			$aluno->excluir();
			// setando mensagem de sucesso //
			$this->setFlash('Funcionário/Estagiário excluído com sucesso.');
			// setando a url //
			$this->setPage();
		}
		
		
		/**
		 * Acao excluir($id)
		 * @param $id
		 */
		public function cursoMatriculadoGet(){
			//se não existir matricula retorna 
			//todos os cursos se existir retorna os curso que não faz parte		
			$dados = $this->getDados("GET");			
			$cursos = Curso::listar($dados["idAluno"]);		
			$cursos = json_encode($cursos);			
			echo $cursos;
		}
			
	}
?>