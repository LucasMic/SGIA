<?php
/**
 * Classe ConectException
 * Classe de excessão da conexão com a base de dados
 * @package lib
 * @author Idealizza
 */
	class ConnectException extends Exception {

		/**
		 * Constantes
		 */
		const SERVIDOR_NAO_ENCONTRADO = 1;
		const USUARIO_OU_SENHA_INVALIDOS = 2;
		const BANCO_NAO_ENCONTRADO = 3;
		const TABELA_NAO_ENCONTRADA = 4;
		const CAMPO_NAO_ENCONTRADO = 5;
		const SINTAXE_ERRO = 6;
		
		/**
		 * Método construtor
		 * @param $tipo
		 * @return Exception
		 */
		public function __construct($tipo = ''){
		
			/**
			 * Switch $tipo
			 */
			switch($tipo){
				case self::SERVIDOR_NAO_ENCONTRADO:
					$msg = 'Servidor não enconrado.';
					break;
				case self::USUARIO_OU_SENHA_INVALIDOS:
					$msg = 'Usuário e/ou senha inválidos.';
					break;
				case self::BANCO_NAO_ENCONTRADO:
					$msg = 'Banco não encontrado.';
					break;
				case self::TABELA_NAO_ENCONTRADA:
					$msg = 'Tabela não encontrada.';
					break;
				case self::CAMPO_NAO_ENCONTRADO:
					$msg = 'Campo não encontrado.';
					break;
				case self::SINTAXE_ERRO:
					$msg = 'Existe algum erro na sintaxe da sql';
					break;
				default:
					$msg = 'Excessão não capturada da conexão com a base de dados.';
					break;
			}
			
			/**
			 * Método construtor da classe parente (Exception)
			 */
			parent::__construct($msg);
		}
	}
?>