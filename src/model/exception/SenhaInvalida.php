<?php
	class SenhaInvalida extends Exception {
		public function __construct(){
			parent::__construct('Senha atual inválida.');
		}
	}
?>