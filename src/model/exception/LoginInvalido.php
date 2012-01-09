<?php
/**
 * Classe LoginInvalido
 * @package model
 * @subpackage exception
 * @author Idealizza
 */
	class LoginInvalido extends Exception {
		
		public function __construct(){
			parent::__construct("Login e/ou senha inválidos.");
		}

	}
?>