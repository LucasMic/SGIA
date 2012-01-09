<?php
	class RegistroNaoEncontrado extends Exception {
		
		const ACAO = 1;
		const MODULO = 2;
		const PERFIL = 3;
		const USUARIO = 4;
		const SEDE = 5;
		const CURSO = 6;
		const MATRICULA = 7;
		const TIPOAUXILIOTRANSPORTE = 8;
		const DESCONTO = 9;
		const CONVENIO = 10;
                const COLABORADOR = 11;
                const CURSOVALOR =12;
                const PAGAMENTOSFORMA = 13;
		const PROJETOS = 14;
		public function __construct($tipo){
			switch($tipo){
				case self::ACAO:
					$msg = 'Ação não encontrada.';
					break;
				case self::MODULO:
					$msg = 'Modulo não encontrado.';
					break;
				case self::PERFIL:
					$msg = 'Perfil não encontrado.';
					break;
				case self::USUARIO:
					$msg = 'Usuário não encontrado.';
					break;
				case self::SEDE:
					$msg = 'Sede não encontrada.';
					break;
				case self::CURSO:
					$msg = 'Curso não encontrado.';
					break;
				case self::MATRICULA:
					$msg = 'Matrícula não encontrada.';
					break;
				case self::TIPOAUXILIOTRANSPORTE:
					$msg = 'Tipo de Auxilio não encontrado.';
					break;
				case self::DESCONTO:
					$msg = 'Tipo de Auxilio não encontrado.';
					break;
				case self::CONVENIO:
					$msg = 'Convênio não encontrado.';
					break;
                                case self::COLABORADOR:
                                    $msg = 'Colaborador não encontrado';
                                    break;
				case self::CURSOVALOR:
                                    $msg = 'curso valor não encontrado';
                                    break;     
				case self::PAGAMENTOSFORMA:
                                    $msg = 'forma de pagamento não encontrado';
                                    break;
                                case self::PROJETOS:
                                    $msg = 'Projeto não encontrado';
                                    break;
			}
			parent::__construct($msg);
		}
	}
?>