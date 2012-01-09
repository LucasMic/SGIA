<?php
/**
 * Arquivo de Constantes
 * Definição de constantes de acesso a pastas e estruturas do Framework
 * ATENÇÃO: só mexer se desejar alterar o funcionamento do framework
 * @author Idealizza
 */

	/**
	 * Inicio do Script
	 */
	define('INICIO',microtime(true));
	/**
	 * Separador do Diretório de acordo com S.O
	 */
	define('DS',DIRECTORY_SEPARATOR);
	/**
	 * Ponto e virgula ou dois pontos de acordo com S.O
	 */
	define('PS',PATH_SEPARATOR);
	/**
	 * Servidor da aplicação
	 */
	define('SERVIDOR',$_SERVER['SERVER_NAME']);
	/**
	 * Raiz da aplicação
	 */
	define('RAIZ',dirname(__FILE__));
	/**
	 * Raiz da aplicação apartir do DOCUMENT_ROOT da URL
	 */
	define('BASE', dirname($_SERVER['PHP_SELF']) == '/' ? '' : dirname($_SERVER['PHP_SELF']));
	/**
	 * Arquivo de configuração
	 */
	 define('CONFIG', RAIZ . DS . "config.ini");
	/**
	 * Diretório dos controladores
	 */
	define('CONTROLL', RAIZ . DS . "controll");
	/**
	 * Diretório de bibliotecas externas
	 */
	define('LIB', RAIZ . DS . "lib");
	define('IMG', BASE. "/" . "img");
	/**
	 * Diretório das entidades (classes)
	 */
	define('MODEL', RAIZ . DS . "model");
	/**
	 * Diretório das telas
	 */
	define('VIEW', RAIZ . DS . "view");
?>