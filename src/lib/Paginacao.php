<?php
/**
 * Classe Paginacao
 * @author Idealizza
 */
	class Paginacao {
		
		/**
		 * Atributo referente aos dados
		 */
		private $dados;
		/**
		 * Atributo referente a quantidade de registros por páginas
		 */
		private $perPage;
		/**
		 * Atributo referente ao delta dos links
		 */
		private $delta;
		/**
		 * Atributo referente aos parametros
		 */
		private $params;
		
		/**
		 * Metodo construtor()
		 * @param $dados
		 * @param $perPage
		 * @param $delta
		 * @param $params
		 * @return Paginacao
		 */
		public function __construct(array $dados,$perPage = 5,$delta = 2,array $params = null){
			$this->dados = $dados;
			$this->perPage = $perPage;
			$this->delta = $delta;
			$this->params = (is_null($params)) ? $this->_setParamsDefault() : $params;
		}
		
		/**
		 * Metodo _setParamsDefault
		 * Seta os parametros com os valores default
		 */
		private function _setParamsDefault(){
			return array('urlVar'					=> 'page',
						 'modRewrite'				=> true,
						 'currentPageClass'			=> 'paginaAtual',
						 'linkPageClass'			=> 'paginaLink',
						 'titleFirst'				=> 'Primeira Página',
						 'titleLast'				=> 'Última página',
						 'titlePage'				=> 'Página',
						 'titlePrev'				=> 'Página anterior',
						 'titleNext'				=> 'Próxima página',
						 'pageSeparator'			=> '|',
						 'spacesBeforeSeparator'	=> 1,
						 'spacesAfterSeparator'		=> 1,
						 'prevImg'					=> '&laquo;',
						 'nextImg'					=> '&raquo;'
						);
		}

		/**
		 * Metodo _setQuantidadePaginas()
		 * Retorna a quantidade de páginas
		 * @return int
		 */
		private function _setQuantidadePaginas(){
			return ceil(count($this->dados) / $this->perPage);
		}		
		
		/**
		 * Metodo _setPage()
		 * Recupera do ambiente a página atual
		 * @return int
		 */
		private function _setPage(){
			/**
			 * 1. Checando se alguma página foi passada
			 * 2. Checando se a página passada é maior que a quantidade de páginas, se for, leve em consideração a última
			 */
			return (!empty($_GET[$this->params['urlVar']])) ? (($_GET[$this->params['urlVar']] > $this->_setQuantidadePaginas()) ? $this->_setQuantidadePaginas()
																																 : $_GET[$this->params['urlVar']]) 
															: 1;
		}
		
		private function _getRaiz(){
			$string = (!empty($_GET['url'])) ? $_GET['url'] . "?" : '?';
			foreach($_GET as $diretiva => $valor){
				if(($diretiva != 'url')&&($diretiva != 'page'))
					$string .= $diretiva . "=" . $valor . "&";
			}
//			if((substr($string,-1) == '?')||(substr($string,-1) == '&'))
//				$string = substr($string,0,-1);
			return BASE . "/" . $string;
		}

		/**
		 * Metodo _createFirstLinks()
		 * Cria os links Primeira Página e Página Anterior
		 * @return string
		 */
		private function _createFirstLinks(){
			return 
			"<a class=\"" . $this->params['linkPageClass'] ."\" title=\"" . $this->params['titleFirst'] . "\" href=\"" . $this->_getRaiz() . $this->params['urlVar'] . "=1" . "\">[1]</a>&nbsp;" .
			"<a class=\"" . $this->params['linkPageClass'] ."\" title=\"" . $this->params['titlePrev'] . "\" href=\""  . $this->_getRaiz() . $this->params['urlVar'] . "=" . ($this->_setPage()-1) . "\">" . $this->params['prevImg'] . "</a>&nbsp;";
		}
		
		/**
		 * Metodo _createTrunkLinks()
		 * Cria os links do meio e identifica a página atual
		 * @return string
		 */
		private function _createTrunkLinks(){
			
			$paginaAtual = $this->_setPage();
			$delta = $this->delta;
			$retorno = '';
			
			for($i = 1;$i <= $this->_setQuantidadePaginas() ; $i++){

				if(($i >= ($paginaAtual - $delta))&&($i <= ($paginaAtual + $delta))){

					$retorno .= ($i != $paginaAtual) ? "<a class=\"" . $this->params['linkPageClass'] ."\" title=\"" . $this->params['titlePage'] . " " . $i . "\" href=\"" . $this->_getRaiz() . $this->params['urlVar'] . "=" . $i . "\">" . $i . "</a>"
													 : "<b><span class=\"" . $this->params['currentPageClass'] . "\">" . $i . "</span></b>";
					
					if($i != $this->_setQuantidadePaginas())

					$retorno .= "&nbsp;" . $this->params['pageSeparator'] . "&nbsp;";
				} 
			}
			
			return $retorno;
		}		
		
		/**
		 * Metodo _createLastLinks()
		 * Cria os Links Última Página e Próxima Página
		 * @return string
		 */
		private function _createLastLinks(){
			return
			"&nbsp;<a class=\"" . $this->params['linkPageClass'] ."\" title=\"" . $this->params['titleNext'] . "\" href=\"" . $this->_getRaiz() . $this->params['urlVar'] . "=" . ($this->_setPage() + 1) . "\">" . $this->params['nextImg'] . "</a>&nbsp;" .
			"&nbsp;<a class=\"" . $this->params['linkPageClass'] ."\" title=\"" . $this->params['titleLast'] . "\" href=\"" . $this->_getRaiz() . $this->params['urlVar'] . "=" . $this->_setQuantidadePaginas() . "\">[" . $this->_setQuantidadePaginas() . "]</a>";
		}
		
		/**
		 * Metodo _createLinks()
		 * Cria a string com todos os links
		 * @return string
		 */
		private function _createLinks(){
			/**
			 * Inicializando a váriavel
			 * @var string
			 */
			$links = '';
			/**
			 * Checando se é para criar os Primeiros Links (Primeira Página/Página Anterior)
			 */
			if($this->_setPage() != 1)
				$links .= $this->_createFirstLinks();
			/**
			 * Criando os Links do meio
			 */
			$links .= $this->_createTrunkLinks();
			/**
			 * Checando se é para criar os Últimos Links (Última Página/Próxima Anterior)
			 */
			if($this->_setPage() != $this->_setQuantidadePaginas())
				$links .= $this->_createLastLinks();
			/**
			 * Retornand os Links
			 */
			return $links;
		}

		/**
		 * Metodo getDados()
		 * @return array
		 */
		public function getDados(){
			$paginaAtual = $this->_setPage();
			$inicio = (($paginaAtual - 1) * $this->perPage);
			$fim = ($inicio + $this->perPage);
			$retorno = array();
			for($i = $inicio; $i < $fim ; $i++){
				if(!isset($this->dados[$i]))
					break;
				$retorno[] = $this->dados[$i];
			}
			return $retorno;
		}
		
		/**
		 * Metodo getLinks()
		 * @return string
		 */
		public function getLinks(){
			return ($this->_setQuantidadePaginas() != 1) ? $this->_createLinks() : false;
		}

	}
?>