<?php
/**
 * Classe Controll
 * Controlador principal do framework seguindo o padrao Singleton
 * @package controll
 * @author Idealizza
 */
	class Controll {
		
		/**
		 * Controlador padrão do framework
		 */
		const CONTROLL_DEFAULT = 'Default';
		/**
		 * Ação default do framework
		 */		
		const ACAO_DEFAULT = 'index';
		/**
		 * Extensão default do framework
		 */
		const EXTENSAO_DEFAULT = '.php';
		/**
		 * Tela default do framework
		 */		
		const TELA_DEFAULT = 'index';
		/**
		 * Diretório das telas DEFAULT
		 */
		const TELA_DIRECTORY_DEFAULT = 'default';
		/**
		 * Nome da sessão onde o usuário ficará guardado
		 */
		const USER_SESSION_NAME = BASE;
		
		private static $instancia;
		
		private static $url;
		
		private static $config;
		
		private static $controll;
		
		private static $acao;
		
		private static $objeto;
		
		private static $metodo;
		
		private static $parametros;
		
		private static $usuario;
		
		private $dados = null;
		
		/**
		 * Metodo construtor()
		 * @return Controll
		 */
		private function __construct(){
			// RECUPERANDO A URL //
			self::_recuperarUrl();
			// CARREGANDO AS CONFIGURACOES //
			self::_carregarConfiguracoes();
			// DEFINI AS CONFIGURACOES DE ERRO //
			self::_definirErros();
			// RECUPERANDO OS DADOS DA REQUISICAO //
			$this->_setDados();
		}
		
		/**
		 * Metodo getControll()
		 * Retorna a instancia do controlador
		 * @return self::$instancia
		 */
		public static function getControll(){
			if(!isset(self::$instancia))
				self::$instancia = new Controll();
			return self::$instancia;
		}
		
		/**
		 * Metodo disparar()
		 * Dispara o controlador executando a requisição
		 */
		public function disparar(){
			self::_checaPublicacao();
			// TRATANDO A URL //
			$this->_tratarUrl();
			// SETANDO O CONTROLADOR E A ACAO //
			$this->_setControll();
			// SETANDO OS PARAMETROS //
			$this->_setParametros();
			// CHECANDO A PERMISSAO //
			$this->_checarPermissao();
			// INVOCANDO O METODO //
			$this->_executarAcao();
		}
		
		/**
		 * Metodo _executarAcao()
		 * Invoca o método do controlador filho requisitado
		 */
		private function _executarAcao(){
			self::$metodo->invokeArgs(self::$objeto,(isset(self::$parametros)) ? self::$parametros : array());
		}
		
		private function _checarPermissao() {
		
			$rc = new ReflectionClass(self::$controll . "Controll");
			
			if($constante = $rc->getConstant('MODULO')) {
			
				if(!isset($_SESSION[BASE])){
					/**
					 * Guardando a ação requisitada
					 */
					$_SESSION['url_recover']['controll'] = self::$controll;
					$_SESSION['url_recover']['acao'] = self::$acao;
					$_SESSION['url_recover']['parametros'] = self::$parametros;
					throw new ControllException(ControllException::USUARIO_NAO_LOGADO);
				}
				
				$usuario = self::getUsuario();
				
				foreach(self::$metodo->getStaticVariables() as $diretiva => $valor){
					if($diretiva == 'acao'){
						foreach($usuario->getPerfil()->getAcoes() as $acao){
							if(($acao->getCodigo() == $valor)&&($acao->getModulos()->getId() == $constante))
								return;
						}
						throw new ControllException(ControllException::PERMISSAO_INVALIDA);
					}
				}
			}
		}
		
		/**
		 * Metodo setFlash($msg)
		 * Define uma mensagem para o usuário
		 * @param string $msg
		 */
		public function setFlash($msg){
			$_SESSION['flash'] = $msg;
		}
		
		public function getFlash(){
			if(!isset($_SESSION['flash']))
				return;
			$retorno = $_SESSION['flash'];
			unset($_SESSION['flash']);
			return $retorno;
		}
		
		/**
		 * Metodo getHtmlBase()
		 * @return string
		 */
		protected function getHtmlBase(){
			return "<base href=\"http://" . SERVIDOR . BASE . "/\"/>";
		}
		
		protected function getHtmlContent(){
			if(isset($GLOBALS['view'])){
				ob_start();
				include_once(VIEW . DS . $GLOBALS['view']);
				$saida = ob_get_contents();
				ob_end_clean();
				$saida = self::resolverLinks($saida);
				echo $saida;
			}
		}

		/**
		 * Metodo getTitle()
		 * Retorna o título do sistema, definido no arquivo de configuração
		 * @return string
		 */		
		protected function getTitle(){
			return self::$config['config']['title'];
		}				
		
		/**
		 * Metodo setTela($tela,$diretorio)
		 * Define a tela que é para carregar
		 * TODO Falta fazer a opção onde a tela será sempre recarregada
		 * @param $tela
		 * @param $diretorio
		 */
		protected function setTela($arquivo, array $diretorio = null){
			// checando se foi passado o diretório //
			$dir = (($diretorio)||(count($diretorio))) ? implode(DS,$diretorio) : self::TELA_DIRECTORY_DEFAULT;
			// checando se o arquivo foi passado com extensão //
			$view = (strpos($arquivo,'.') === false) ? $arquivo . self::EXTENSAO_DEFAULT
													 : $arquivo;
			// checando se a view existe //
			if(!file_exists(VIEW . DS . $dir . DS . $view))
				throw new ControllException(ControllException::VIEW_INVALIDA);
			// checando se existe uma tela default configurada //
			if((defined('self::TELA_DEFAULT'))&&(trim(self::TELA_DEFAULT) != '')){
				// definindo a tela de conteúdo //
				$GLOBALS['view'] = $dir . DS . $view;
				// inicializando o buffer //
				ob_start();
				// incluindo a tela default //
				include_once(VIEW . DS . self::TELA_DIRECTORY_DEFAULT . DS . ((strpos(self::TELA_DEFAULT,'.') === false) ? self::TELA_DEFAULT . self::EXTENSAO_DEFAULT 
																														 : self::TELA_DEFAULT));
				// pegando o conteúdo do buffer //
				$saida = ob_get_contents();
				// limpando o buffer //
				ob_end_clean();
				// resolvendo os links //
				$saida = self::resolverLinks($saida);
				// escrevendo a saída //
				echo $saida;
			}
			else {
				// aqui é onde vai ficar o código caso não exista uma tela default //
			}
		}
		
		/**
		 * Metodo resolverLinks($entrada)
		 * Resolve os links da tela
		 * @param $entrada
		 */
		public static function resolverLinks($entrada) {
			$path= "";
			if (!empty($_GET['url'])) {
				// localizando a posição inicial dos parâmetros na URL
				$posicao_inicial = strpos($_GET['url'], self::$acao) + strlen(self::$acao);
				// capturando quantas barras existem a partir dessa posição
				$total = substr_count($_GET['url'], "/", $posicao_inicial);
				// inserindo links ../ para subir o diretório do link
				$path = str_repeat("../", $total);
					
			}
			// Varrendo todas as operções do módulo atual
			$classe = new ReflectionClass(get_class(self::$objeto));
			$metodos = array();
			foreach ($classe->getMethods() as $metodo) {
				if ($metodo->isPublic()) {
					$metodos[] = strtolower($metodo->getName());
				}
			}
			// Inserindo o caminho em BASE para todos os links do arquivo HTML recuperado (segunda etapa: metodos do modulo atual)
			$saida = preg_replace("@((href)|(action))\\s*=\\s*(['\"]?)(" . implode("|", $metodos). ")([/ '\"])@i", 
							"\\1=\\4$path\\5\\6", $entrada);
			return $saida;
		}
					
		/**
		 * Metodo _recuperarUrl()
		 * O nome ja diz tudo
		 */
		private static function _recuperarUrl(){
			if(!empty($_GET['url'])){
				self::$url = array();
				foreach(explode('/',$_GET['url']) as $item){
					if(!empty($item))
						self::$url[] = trim(strtolower($item)); 
				}
			}
		}

		/**
		 * Metodo _carregarConfiguracoes()
		 * Responsavel por carregar em self::$config as configurações definidas no arquivo config.ini
		 */
		private static function _carregarConfiguracoes(){
			self::$config = array();
			self::$config = parse_ini_file(CONFIG , true);
		}
		
		/**
		 * Metodo getConfig($grupo)
		 * Retorna informações do arquivo config.ini
		 * @param string $grupo
		 */
		public function getConfig($grupo){
			return self::$config[$grupo];
		}		
		
		private static function _checaPublicacao(){
			/* checa se a váriavel publicado está setada */
			if(isset(self::$config['config']['publicado'])){
				/* se o sistema não estiver publicado */
				if(!self::$config['config']['publicado']){
					if(isset(self::$config['config']['hora_publicacao']))
						$GLOBALS['erro']['hora_publicacao'] = self::$config['config']['hora_publicacao'];
					throw new ControllException(ControllException::NAO_PUBLICADO);
				}
			}
		}
		
		/**
		 * Metodo _definirErros()
		 * Responsavel por definir como o erro sera estorado na aplicacao apartir das configurações definidas no arquivo config.php
		 */
		private static function _definirErros(){
			foreach(self::$config['erros'] as $diretiva => $valor){
				ini_set($diretiva, $valor);
			}
			set_exception_handler(array('ControllException','capturar'));
		}
		
		/**
		 * Metodo _setDados()
		 * Recupera todos os dados vindo do navegador e joga no atributo $dados
		 */
		private function _setDados(){
			if(!empty($_GET))
				$this->dados['GET'] = $_GET;
			if(!empty($_POST))
				$this->dados['POST'] = $_POST;
		}
		
		protected function setDados($dados,$indice){
			$this->dados[$indice] = $dados;
		}
		
		/**
		 * Metodo getDados()
		 * Retorna os dados recuperados do navegador, caso não exista, retorna falso
		 * @param $metodo
		 */		
		protected function getDados($metodo = null){
			if(is_null($this->dados))
				return false;
			if(is_null($metodo))
				return $this->dados;
			if(($metodo == 'GET')&&(isset($this->dados['GET'])))
				return $this->dados['GET'];
			if(($metodo == 'POST')&&(isset($this->dados['POST'])))
				return $this->dados['POST'];
			if(($metodo == $metodo)&&(isset($this->dados[$metodo])))
				return $this->dados[$metodo];
			return false;
		}
		
		/**
		 * Metodo _tatarUrl()
		 * O nome também ja diz tudo
		 */
		private function _tratarUrl() {
			if(isset(self::$url)){
				if(count(self::$url) > 0){
					self::$controll = array_shift(self::$url);
					if(count(self::$url) > 0){
						self::$acao = array_shift(self::$url);
						if(count(self::$url) > 0){
							self::$parametros =  self::$url;
						}
					} 
					else {
						self::$acao = self::ACAO_DEFAULT;
					}
				} 
			}
			else {
				self::$controll = self::CONTROLL_DEFAULT;
				self::$acao   = self::ACAO_DEFAULT;
			}
		}		
		
		/**
		 * Metodo _setControll
		 * Define o controlador da requisição e trata a ação também
		 */
		private function _setControll(){
			if(class_exists(ucfirst(self::$controll) . "Controll"))
				$this->_setAcao();
			else {
				self::$acao = self::$controll;
				self::$controll = self::CONTROLL_DEFAULT;
				try {
					$this->_setMetodo();
				}
				catch(ReflectionException $e){
					throw new ControllException(ControllException::CONTROLADOR_E_OU_ACAO_INVALIDA);
				}
			}
			$objeto = ucfirst(self::$controll) . 'Controll';
			self::$objeto = new $objeto();
		}
		
		/**
		 * Metodo _setAcao()
		 * Trata e define a ação requisitada
		 */
		private function _setAcao(){
			try {
				$this->_setMetodo();
			}
			catch(ReflectionException $e){
				throw new ControllException(ControllException::ACAO_INVALIDA);
			}
		}
		
		/**
		 * Metodo _setMetodo()
		 * Define o metodo da requisição
		 */
		private function _setMetodo(){
			$rc = new ReflectionClass(ucfirst(self::$controll) . "Controll");
			$metodo = $rc->getMethod(self::$acao);
			if(!$metodo->isPublic())
				throw new ControllException(ControllException::ACAO_NAO_E_PUBLICA);
			self::$metodo = $metodo;
		}
		
		/**
		 * Metodo _setParametros()
		 * Verifica se o metodo requisitado, tem parametros obrigatórios e se a quantidade passada é maior ou igual que isso
		 */
		private function _setParametros(){
			if(self::$metodo->getNumberOfRequiredParameters() > 0)
				if((!isset(self::$parametros))||(count(self::$parametros) < self::$metodo->getNumberOfRequiredParameters()))
					throw new ControllException(ControllException::PARAMETROS_INSUFICIENTES);
		}
		
			
		protected function getPage(){
//			$_SESSION['page'] = (!empty($_GET['url'])) ? $_GET['url'] : '';
			$string = '';
			if(!empty($_GET))
				foreach($_GET as $indice => $valor){
					$string .= ($indice != 'url') ?  "?" . $indice . "=" . $valor 
												  : $valor;
				}
			$_SESSION['page'] = $string;
		}
		
		protected function setPage($controll = null,$acao = null,array $parametros = null){
			if((is_null($controll))&&(is_null($acao))&&(is_null($parametros)))
				header("Location: " . BASE . "/" . $_SESSION['page']);
			$retorno = (!is_null($controll)) ? $contoll : self::CONTROLL_DEFAULT;
			$retorno .= (!is_null($acao)) ? $acao : self::ACAO_DEFAULT;
			if(count($parametros))
				$retorno .= implode('/',$parametros);
		}
		
		public function getUsuario(){
			return (isset($_SESSION[self::USER_SESSION_NAME])) ? unserialize($_SESSION[self::USER_SESSION_NAME]) : false;
		}
		
		protected function setUsuario($usuario){
			$_SESSION[self::USER_SESSION_NAME] = serialize($usuario);
		}
		
		protected function getUrlRecover(){
			if(isset($_SESSION['url_recover'])){
				$retorno = $_SESSION['url_recover']['controll'] . "/" . $_SESSION['url_recover']['acao'] . "/";
				if(count($_SESSION['url_recover']['parametros']))
					$retorno .= implode('/',$_SESSION['url_recover']['parametros']);
				unset($_SESSION['url_recover']);
			}
			return (isset($retorno)) ? $retorno : false;
		}
		
	}
?>