<?php
/**
 * Classe MatriculaPagamentosFormas
 * @package model
 * @author Idealizza
 */
	class MatriculaPagamentosFormas {
		
		/**
		 * Atributos
		 */		
		private $id;
		private $matricula;
		private $pagamentosForma;
		private $cheque;
		private $valor;
		private $caminhoArquivo;
		private $quantidadeParcelas;
        
	

        function __construct($id = 0,  Matricula $matricula = null, PagamentosForma $pagamentosForma = null, Cheque $cheque = null, $valor, $caminhoArquivo, $quantidadeParcelas) {
            $this->id = $id;
            $this->matricula = $matricula;
            $this->pagamentosForma = $pagamentosForma;
            $this->cheque = $cheque;
            $this->valor = $valor;
            $this->caminhoArquivo = $caminhoArquivo;
            $this->quantidadeParcelas = $quantidadeParcelas;      
        }
        
		/**
		 * Metodo inserir()
		 * @return MatriculaPagamentoFormas
		 */
		public function inserir(){
			// validando os campos //
			$instancia = MatriculaPagamentosFormasDAO::getInstancia();
			// executando o metodo //
			$matriculaPagamentoFormas = $instancia->inserir($this);
			// retornando o Matricula //
			return $matriculaPagamentoFormas;
		}		
		
		/**
		 * Metodo excluir()
		 * @return boolean
		 */
		public function excluir(){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = MatriculaPagamentosFormasDAO::getInstancia();
			// executando o metodo //
			$matriculaPagamentoFormas = $instancia->excluir($this->getId());
			// retornando o resultado //
			return $matriculaPagamentoFormas;
		}
		
		/**
		 * Metodo listar()
		 * @return Matricula[]
		 */
		public static function listar($matriculasId = 0){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = MatriculaPagamentosFormasDAO::getInstancia();
			// executando o metodo //
			$MatriculaPagamentoFormas = $instancia->listar($matriculasId);				
			
			// checando se o retorno foi falso //
			if(!$MatriculaPagamentoFormas)
				// levantando a excessao ListaVazia //
				throw new ListaVazia(ListaVazia::MATRICULAPAGAMENTOFORMA);
			// percorrendo os usuarios //
			foreach($MatriculaPagamentoFormas as $MatriculaPagamentoForma){			
				
				if($MatriculaPagamentoForma["cheques_id"] == null){
					$cheque = NULL;
				}else{$cheque = Cheque::buscar($MatriculaPagamentoForma["cheques_id"]);}			
				
				$matricula = Matricula::buscar($MatriculaPagamentoForma["matriculas_id"]);
				
				$PagamentosForma = PagamentosForma::buscar($MatriculaPagamentoForma["pagamentos_formas_id"]);			
				
				// instanciando e jogando dentro da colecao $objetos o MatriculaPagamentoForma //				
				$objetos[] = new MatriculaPagamentosFormas
					($MatriculaPagamentoForma["id"], 
					$matricula, 
					$PagamentosForma,
					$cheque,
					$MatriculaPagamentoForma["valor"],
					$MatriculaPagamentoForma["caminho_arquivo"],
					$MatriculaPagamentoForma["quantidade_parcelas"]);
			}
			// retornando a colecao $objetos //
			return $objetos;
		}
		
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return Matricula
		 */
		public static function buscar($id){
			// recuperando a instancia da classe de acesso a dados //
			$instancia = MatriculaPagamentosFormasDAO::getInstancia();
			// executando o metodo //
			$matriculapagamentoFormas = $instancia->buscar($id);
			// checando se o resultado foi falso //
			if(!$matriculapagamentoFormas)
				// levanto a excessao RegistroNaoEncontrado //
				throw new RegistroNaoEncontrado(RegistroNaoEncontrado::MATRICULAPAGAMENTOFORMA);
			// instanciando e retornando o Matricula //
			if ($matriculapagamentoFormas["cheques_id"] == null){$cheque = null;}else{$cheque = Cheque::buscar($matriculapagamentoFormas["cheques_id"]);}

			return new MatriculaPagamentosFormas($matriculapagamentoFormas["id"], 
												Matricula::buscar($matriculapagamentoFormas["matriculas_id"]),
												PagamentosForma::buscar($matriculapagamentoFormas["pagamentos_formas_id"]),
												$cheque,
												$matriculapagamentoFormas["valor"],
												$matriculapagamentoFormas["caminho_arquivo"],
												$matriculapagamentoFormas["quantidade_parcelas"]);
		}
		
		
		public function getId(){
        	return $this->id;
        }
        
        public function setId($id){
        	$this->id = $id;
        }       
        
		public function getMatricula(){
        	return $this->matricula;
        }
        
        public function setMatricula(Matricula $matricula){
        	$this->matricula = $matricula;
        }        
        
		public function getPagamentosForma(){
        	return $this->pagamentosForma;
        }
        
        public function setPagamentosForma(PagamentosForma $pagamentosForma){
        	$this->matricula = $pagamentosForma;
        }         
        
		public function getCheque(){
        	return $this->cheque;
        }
        
        public function setCheque(Cheque $cheque){
        	$this->cheque = $cheque;
        }        
        
		public function getValor(){
        	return $this->valor;
        }
        
        public function setValor(Valor $valor){
        	$this->valor = $valor;
        }		

		public function getCaminhoArquivo(){
        	return $this->caminhoArquivo;
        }
        
        public function setCaminhoArqivo($caminhoArquivo){
        	$this->caminhoArquivo = $caminhoArquivo;
        }
        
		public function getQuantidaDeParcelas(){
        	return $this->quantidadeParcelas;
        }
        
        public function setQuantidadeDeParcelas($quantidadeParcelas){
        	$this->quantidadeDeParcelas = $quantidadeParcelas;
        }      
        
	}
		
?>