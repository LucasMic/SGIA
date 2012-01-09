<?php
/**
 * Classe ListaVazia
 * @package model
 * @subpackage exception
 * @author Idealizza
 */
	class ListaVazia extends Exception {
		
		/**
		 * Constantes
		 */
        const ACOES = 1;
        const MODULOS = 2;
        const PERFIS = 3;
        const USUARIOS = 4;
        const RELATORIOS = 5;
        const COLABORADOR = 6;
        const CONVENIO = 7;
        const CURSO = 8;
        const ALUNOS = 9;
        const MATRICULA = 10;
        const FILHOS = 11;
        const ADVERTENCIAS = 12;
        const FERIAS = 13;
        const PAGAMENTOS = 14;
        const HORAEXTRA = 15;
        const TIPOAUXILIOTRANSPORTE = 16;
        const CHEQUES = 17;
        const FORMASPAGAMENTO = 18;
        const MATRICULAPAGAMENTOFORMA = 19;
        const PAGAMENTOSFORMA = 20;
        const TIPOPAGAMENTOS = 21;
        
        const PROJETOS = 22;
		
		public function __construct($tipo){
			switch($tipo){
				case self::ACOES:
					$msg = 'Nenhuma ação encontrada.';
					break;
				case self::MODULOS:
					$msg = 'Nenhum modulo encontrado.';
					break;
				case self::PERFIS:
					$msg = 'Nenhum perfil encontrado.';
					break;
				case self::USUARIOS:
					$msg = 'Nenhum usuário encontrado.';
					break;
                                case self::RELATORIOS:
					$msg = 'Nenhum relatório pode ser gerado.';
					break;
				case self::COLABORADOR:
					$msg = 'Nenhum colaborador encontrado.';
					break;
				case self::CONVENIO:
					$msg = 'Nenhum convênio encontrado. ';
					break;
				case self::CURSO:
					$msg = 'Nenhum curso encontrado. ';
					break;
				case self::ALUNOS:
					$msg = 'Nenhum aluno encontrado. ';
					break;
				case self::MATRICULA:
					$msg = 'Nenhuma matrícula encontrado. ';
					break;
				case self::FILHOS:
					$msg = 'Nenhum filho encontrado. ';
					break;
				case self::ADVERTENCIAS:
					$msg = 'Nenhuma advertência encontrada. ';
					break;
				case self::FERIAS:
					$msg = 'Nenhuma registro de férias encontrado. ';
					break;
				case self::PAGAMENTOS:
					$msg = 'Nenhuma registro de pagamento encontrado. ';
					break;
				case self::HORAEXTRA:
					$msg = 'Nenhuma registro de horas extras encontrado. ';
					break;
				case self::TIPOAUXILIOTRANSPORTE:
					$msg = 'Nenhum tipo auxilio encontrado.';
					break;
				case self::CHEQUES:
					$msg = 'Nenhum cheque encontrado.';
					break;	
				case self::FORMASPAGAMENTO:
					$msg = 'Nenhuma forma de pagamento encontrado.';
					break;				
				case self::MATRICULAPAGAMENTOFORMA:
					$msg = 'Nenhuma forma de pagamento de matricula encontrada.';
					break;		
				case self::PAGAMENTOSFORMA:
					$msg = 'Nenhuma forma de pagamento localizada.';
					break;
                                case self::TIPOPAGAMENTOS:
					$msg = 'Nenhuma tipo de pagamento localizado.';
					break;
				case self::PROJETOS:
					$msg = 'Nenhuma projeto localizado.';
					break;	
			}
			parent::__construct($msg);
		}

	}
?>