<?php
	class ControllException extends Exception {
		
		/**
		 * Constantes
		 */
		const CONTROLADOR_E_OU_ACAO_INVALIDA = 1;
		const ACAO_NAO_E_PUBLICA = 2;
		const ACAO_INVALIDA = 3;
		const PARAMETROS_INSUFICIENTES = 4;
		const USUARIO_NAO_LOGADO = 5;
		const PERMISSAO_INVALIDA = 6;
		const VIEW_INVALIDA = 7;
		const NAO_PUBLICADO = 8;
				
		public function __construct($tipo){
			switch($tipo){
				case self::CONTROLADOR_E_OU_ACAO_INVALIDA:
					$msg = "Controlador e/ou ação inválida.";
					break;
				case self::ACAO_NAO_E_PUBLICA:
					$msg = "Ação inválida. Essa ação não é pública, não pode ser executado de fora do controlador.";
					break;
				case self::ACAO_INVALIDA:
					$msg = "Ação inválida. Não foi encontrada ou não existe.";
					break;
				case self::PARAMETROS_INSUFICIENTES:
					$msg = 'Parametros insuficientes.';
					break;
				case self::USUARIO_NAO_LOGADO:
					$msg = 'Para acessar essa página você precisa está logado.';
					break;
				case self::PERMISSAO_INVALIDA:
					$msg = 'Você não tem permissão para essa ação e/ou modulo.';
					break;
				case self::VIEW_INVALIDA:
					$msg = 'View inválida. Não foi encontrada ou não existe.';
					break;
				case self::NAO_PUBLICADO:
					$msg = 'O sistema está temporariamente fora do ar.';
					break;
			}
			parent::__construct($msg);
		}
		
		
		/**
		 * Método estático para capturar qualquer exceção
		 *
		 * @param Exception $excecao
		 */
		public static function capturar($excecao) {
			$GLOBALS["erro"]["msg"] = $excecao->getMessage();
			include_once(VIEW . "/default/" .  "erro" . Controll::EXTENSAO_DEFAULT);
			exit();
//			$capturar = $detalhar = $depurar = "";
//			$dados_ambiente = Controll::getConfig();
//			switch ($dados_ambiente['excecoes']['capturar']) {
//				// --------------------------------------
//				case 3: // Depurar
//					$depurar  = "<h4>Exceção lançada no arquivo: " .
//					$excecao->getFile() .
//	                    " - Na linha: " . $excecao->getLine() .
//	                    "</h4>\n" .
//	                    "<h4>Rastro do stack trace:</h4><ol>";
//					$pilha = $excecao->getTrace();
//					array_unshift($pilha, array('file'=> $excecao->getFile(), 'line'=> $excecao->getLine()));
//					foreach ($pilha as $objPilha) {
//						if (!file_exists(@$objPilha['file'])) continue;
//						$depurar .= "<li><span style='cursor:pointer' onclick='this.nextSibling.style.display = this.nextSibling.style.display == \"none\" ? \"block\" : \"none\" '>
//						$objPilha[file]: linha $objPilha[line]</span>";
//						$depurar .= "<div style='background-color: #EEEEEE; " .
//		                    "padding: 10px; display: none; " . 
//		                    "border: 1px dashed #000000; margin: 3px " .
//						 "display: block'><pre>";
//						$fonte     = explode("<br />",
//						highlight_file($objPilha['file'], true));
//						$fonte_str = "";
//						foreach($fonte as $linha => $valor) {
//							$linha++;
//							if ($linha == $objPilha['line']) {
//								$fonte_str .= sprintf("<b " .
//		                                  "style='background-color: " . 
//		                                  "#DDDDDD'>" . 
//		                                  "<span style='color: " . 
//		                                  "#000000'>%03d:</span> " .
//		                                  "%s</span></b>\n", $linha, 
//								$valor);
//							} else {
//								$fonte_str .= sprintf("<span style='color: " .
//		                                  "#000000'>%03d:</span>" .
//		                                  "%s\n", $linha, $valor);
//							}
//						}
//						$depurar .= "$fonte_str</pre></div></li>\n";
//					}
//					$depurar .= "</ol>";
//				case 2: // Detalhar
//					$detalhar = "<h4>Pilha de chamadas</h4>".
//	                    "<div style='background-color: #EEEEEE; " . 
//	                    "padding: 10px; " . 
//	                    "white-space: pre; border: 1px dashed " . 
//	                    "#000000; margin: 3px'>" . 
//					$excecao->getTraceAsString() . "</div>\n";
//					$detalhar .= "<h4>Var Export da Exceção</h4>".
//	                    "<div style='background-color: #EEEEEE; " . 
//	                    "padding: 10px; " . 
//	                    "white-space: pre; border: 1px dashed " . 
//	                    "#000000; margin: 3px'>" . 
//					var_export($excecao, true) . "</div>\n";
//				case 1: // Capturar
//					$capturar = "<h2>Fácil MVC</h2>" . 
//	                    "<h3>Exceção Capturada</h3>" .  
//	                    "<h4>" . $excecao->getCode() . " - " . 
//					$excecao->getMessage() . "</h4>\n";
//					break;
//					// --------------------------------------
//				case 0: // Não capturar
//					// Relançamento da exceção
//					throw $excecao;
//					break;
//			}
//			echo $capturar;
//			echo $detalhar;
//			echo $depurar;
		}
	}
?>