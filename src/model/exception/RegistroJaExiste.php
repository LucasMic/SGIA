<?php
	class RegistroJaExiste extends Exception {
		
		const ACAO = 1;
		const MODULO = 2;
		const PERFIL = 3;
		const USUARIO = 4;
		const SEDE = 5;
		const CURSO = 6;
		const MATRICULA = 7;		
		const DESCONTO = 9;
		const CONVENIO = 10;
        const COLABORADOR = 11;
        const TIPOAUXILIOTRANSPORTE = 13;
		
		public function __construct($tipo){
			switch($tipo){
				
				case self::COLABORADOR:
					$msg = 'Colaborado já adicionado.';
					break;
				
				case self::TIPOAUXILIOTRANSPORTE:
					$msg = 'Tarifa já adicionado.';
					break;
				
			}
			parent::__construct($msg);
		}
	}
?>
