<?php
/**
 * Classe AcaoInexistente
 * @package model
 * @subpackage exception
 * @author Idealizza
 */
	class AcaoInexistente extends Exception {

		public function __construct(){
			parent::__construct('Ação Inexistente');
		}

	}
?>