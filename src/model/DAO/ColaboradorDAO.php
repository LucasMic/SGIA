<?php
/**
 * Classe UsuarioDAO
 * Camada de acesso a dados da entidade Usuario
 * @package model
 * @subpackage DAO
 * @author Idealizza
 */
	class ColaboradorDAO {
		
		/**
		 * Atributos
		 */
		private static $instancia;
		private $conexao;	
		const TABELA = 'colaboradores';

		/**
		 * Metodo construtor()
		 */
		private function __construct(){	
			$this->conexao = Connect::getInstancia();
		}
		
		/**
		 * Metodo getInstancia()
		 */
		public static function getInstancia(){
			if(!isset(self::$instancia))
				self::$instancia = new ColaboradorDAO();
			return self::$instancia;
		}		
		
		/**
		 * Metodo inserir($obj)
		 * @param $obj
		 * @return Usuario
		 */
		public function inserir($obj){
			// INSTRUCAO SQL //
			$sql = "INSERT INTO " . self::TABELA . "(nome,endereco,bairro, cidade, uf, cep, fone, celular, data_nascimento, mun_nascimento, uf_nascimento, pai, mae, estado_civil, tipo, pendente, sedes_id, status)
											VALUES('".$obj->getNome()."', 
												   '".$obj->getEndereco()."', 
											   	   '".$obj->getBairro()."', 
											   	   '".$obj->getCidade()."',
											   	   '".$obj->getUf()."',
											   	   '".$obj->getCep()."',
											   	   '".$obj->getFone()."',
											   	   '".$obj->getCelular()."',
											   	   '".formataData($obj->getDataNascimento())."',
											   	   '".$obj->getMunicipioNascimento()."',
											   	   '".$obj->getUfNascimento()."',
											   	   '".$obj->getNomePai()."',
											   	   '".$obj->getNomeMae()."',
											   	   '".$obj->getEstadoCivil()."',
											   	   '".$obj->getTipo()."', '1',
                                           		   '".$obj->getSede()->getId()."'," . 1 . ")";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);
			
			// TRATANDO O RESULTADO //
			if($resultado){
				$obj->setId(mysql_insert_id());
			} else {
				$obj = $resultado;	
			} 
			
			
			// RETORNANDO O RESULTADO //
			return $obj;
		}
		
		/**
		 * Metodo editar($obj)
		 * @param $obj
		 * @return Usuario
		 */
		public function editar($obj){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET nome = '".$obj->getNome()."',
													endereco =	'".$obj->getEndereco()."',
													bairro =	'".$obj->getBairro()."',
													cidade =	'".$obj->getCidade()."',
													uf =	'".$obj->getUf()."',
													cep =	'".$obj->getCep()."',
													fone =	'".$obj->getFone()."',
													celular =	'".$obj->getCelular()."',
													data_nascimento =	'".formataData($obj->getDataNascimento())."',
													mun_nascimento =	'".$obj->getMunicipioNascimento()."',
													uf_nascimento =	'".$obj->getUfNascimento()."',
													pai =	'".$obj->getNomePai()."',
													mae =	'".$obj->getNomeMae()."',
													estado_civil =	'".$obj->getEstadoCivil()."',
													tipo =	'".$obj->getTipo()."',
													sedes_id = '".$obj->getSede()->getId()."',
													status = ". $obj->getStatus() . "
					WHERE id = '".$obj->getId()."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);
			
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		public function addAnexos($id, $data, $tipo, $caminho){
			
			switch($tipo){
				case 0:
					$tipo = "Exame Admissional";
					break;
				case 1:
					$tipo = "Exame Demissional";
					break;
				case 2:
					$tipo = "Contrato de Estagio";
					break;
				case 3:
					$tipo = "Vale transporte";
					break;
				case 4:
					$tipo = "Vale Refeição";
					break;
				case 5:
					$tipo = "Contrato de trabalho";
					break;
				case 6;
					$tipo = "Comprovante de Entrega de CTPS";
					break;
			}

            $sql = "INSERT INTO anexos (arquivo, data, colaboradores_id, tipo) VALUES ('".$caminho."', '".$data."', '".$id."', '".$tipo."')";
            $resultado = $this->conexao->exec($sql);
			
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		
		public function dadosContratuais($obj){
			// INSTRUCAO SQL //
			$sql = "UPDATE " . self::TABELA . " SET grau_instrucao = '".$obj->getGrauInstrucao()."',
                                            dias_contrato_experiencia =	'".$obj->getDiaContratoExperiencia()."',
                                            departamento =	'".$obj->getDepartamento()."',
                                            funcao =	'".$obj->getFuncao()."',
                                            salario_contratual = '".gravandoValorNoBanco($obj->getSalarioContratual())."',
                                            adiantamento_quinzenal =	'".gravandoValorNoBanco($obj->getAdiantamentoQuinzenal())."',
                                            horario_entrada =	'".$obj->getHorarioEntrada()."',
                                            horario_saida =	'".$obj->getHorarioSaida()."',
                                            duracao_intervalo =	'".$obj->getDuracaoIntervalo()."',
                                            horario_intervalo =	'".$obj->getHorarioIntervalo()."',
                                            aux_alimentacao_tipo = '".$obj->getAuxAlimentacaoTipo()."',
                                            possui_vTransporte = '".$obj->getPossuiTransporte()."',
                                            possui_vAlimentacao = '".$obj->getPossuiAlimentacao()."',
                                            aux_transporte_tipo_id = '".$obj->getAuxilioTransporteTipo()->getId()."',
                                            vale_transporte_casa_trabalho =	'".$obj->getValeCasaTrabalho()."',
                                            vale_transporte_trabalho_casa =	'".$obj->getValeTrabalhoCasa()."',
                                            data_admissao = '".formataData($obj->getDataAdmissao())."'
					WHERE id = '".$obj->getId()."'";
			// EXECUTANDO A SQL //                   
                        
			$resultado = $this->conexao->exec($sql);
			
			$sql = "INSERT INTO salarios (data, valor, colaboradores_id) VALUES (NOW(), '" . gravandoValorNoBanco($obj->getSalarioContratual()) . "', '" . $obj->getId() . "')";
			
			$resultado2 = $this->conexao->exec($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		public function documentos($obj){
			$sql = "UPDATE " . self::TABELA . " SET rg = '".$obj->getRg()."',
													orgao_expedidor =	'".$obj->getOrgaoExpedidor()."',
													data_expedicao =	'".formataData($obj->getDataExpedicao())."',
													habilitacao =	'".$obj->getHabilitacao()."',
													habilitacao_categoria =	'".$obj->getHabilitacaoCategoria()."',
													habilitacao_vencimento =	'".formataData($obj->getHabilitacaoVencimento())."',
													titulo =	'".$obj->getTitulo()."',
													titulo_zona =	'".$obj->getTituloZona()."',
													titulo_secao =	'".$obj->getTituloSecao()."',
													cpf =	'".$obj->getCpf()."',
													carteira_trabalho =	'".$obj->getCarteiraTrabalho()."',
													carteira_trabalho_serie =	'".$obj->getCarteiraTrabalhoSerie()."',
													carteira_uf =	'".$obj->getCarteiraUf()."',
													pis =	'".$obj->getPis()."',
													certificado_reservista =	'".$obj->getCertificadoReservista()."'
													
					WHERE id = '".$obj->getId()."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);
			
			return $resultado;
		}
		
		
		
		public function concluirCadastro($obj){

            if($obj->getFilhos() == null){
                $sql = "DELETE FROM filhos_colaboradores WHERE colaboradores_id = '" . $obj->getId() . "' ";
                $this->conexao->exec($sql);
            }
            
			$sql = "UPDATE " . self::TABELA . " SET conjuge = '".$obj->getConjuge()."',
													observacoes =	'".$obj->getObservacoes()."',
													pendente =	'0'
					WHERE id = '".$obj->getId()."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->exec($sql);
			
			return $resultado;
		}
		
		/**
		 * Metodo excluir($id)
		 * @param $id
		 * @return boolean
		 */
		public function excluir($id){
		}
		
		/**
		 * Metodo buscar($id)
		 * @param $id
		 * @return fetch_assoc
		 */
		public function buscar($id){
			// INSTRUCAO SQL //
			$sql = "SELECT c.* FROM " . self::TABELA . " c WHERE c.id = '".$id."'";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetch($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		/**
		 * Metodo listar()
		 * @return fetch_assoc[]
		 */
		public function listar($sede){
			
			// INSTRUCAO SQL //
			$sql = "SELECT c.* FROM " . self::TABELA . " c WHERE sedes_id='".$sede."' ORDER by c.nome";
			// EXECUTANDO A SQL //		
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		public function obterDocumentos($id){
			
			// INSTRUCAO SQL //
			$sql = "SELECT a.* FROM anexos a WHERE colaboradores_id='".$id."' ORDER by a.data DESC";
			// EXECUTANDO A SQL //
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		
		public function listarFuncioanriosPendentes($sedeId){  
			// INSTRUCAO SQL //
			$sql = " SELECT c.* FROM " . self::TABELA . " c inner join anexos on 
					c.id = anexos.colaboradores_id
					where (DATEDIFF(curdate( ), anexos.data) >= 700) and 
					(month(anexos.data - INTERVAL 1 MONTH) <= month(curdate())) and c.tipo = 0 and c.sedes_id =".$sedeId." ";			
			// EXECUTANDO A SQL //			
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		public function listarEstagiariosPendentes($sedeId){
			// INSTRUCAO SQL //
			$sql = " SELECT c.* FROM " . self::TABELA . " c inner join anexos on 
					c.id = anexos.colaboradores_id
					where (DATEDIFF(curdate( ), anexos.data) >= 120)  and c.tipo = 1 and c.sedes_id =".$sedeId." ";								
			// EXECUTANDO A SQL //			
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		public function listarAniverssariantesDoMes($sedeId){
			// INSTRUCAO SQL //			
			$sql = " Select * From " . self::TABELA . " c 
			Where MONTH(c.data_nascimento) = MONTH(CURDATE()) and c.sedes_id = ".$sedeId." ";								
			// EXECUTANDO A SQL //                        
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //                    
			return $resultado;
		}
		
		
		public function listarDadosPendentes($sedeId){
			// INSTRUCAO SQL //			
			$sql = " Select * From " . self::TABELA . " c Where
			(sedes_id = ".$sedeId.") and
			(endereco = '' or 
			bairro = '' or
			cidade = '' or
			uf = '' or
			cep = '' or
			fone = '' or
			celular = '' or
			data_nascimento = '0000-00-00' or
			mun_nascimento = '' or
			uf_nascimento = '' or
			pai = '' or
			mae = '' or
			estado_civil = '' or
			rg = '' or
			orgao_expedidor = '' or
			data_expedicao  = '0000-00-00' or
			habilitacao = '' or
			habilitacao_categoria = '' or
			habilitacao_vencimento = '0000-00-00' or
			titulo = '' or
			titulo_zona = '' or
			titulo_secao = '' or
			cpf = '' or
			carteira_trabalho = '' or
			carteira_trabalho_serie = '' or
			carteira_uf = '' or
			pis = '' or
			certificado_reservista = '' or
			observacoes = '' or
			grau_instrucao = '' or
			dias_contrato_experiencia = '0' or
			departamento = '' or
			funcao = '' or
			salario_contratual = '0' or
			adiantamento_quinzenal = '0' or
			tipo = '0' or
			horario_entrada = '00:00:00' or
			horario_saida = '00:00:00' or
			duracao_intervalo = '00:00:00' or
			horario_intervalo = '00:00:00' or
			pendente = 0 or
			status = 0 or
			data_admissao = '0000-00-00')";								
			// EXECUTANDO A SQL //			
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		public function listarDocPendenteFuncionario($sedeId){						
			
			// INSTRUCAO SQL //			
			
			//tem que ser restruturada pela data pois se existir vale transporte todo mes tem anexos
			
			$sql = " select *, count(a.colaboradores_id) as totalanexos from " . self::TABELA . " c inner join anexos a
			where (c.id = a.colaboradores_id) and (c.sedes_id = '".$sedeId."' ) and (c.status = '1') and (c.tipo = '0') order by c.nome;"; 
			// EXECUTANDO A SQL //			
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //			
			return $resultado;
		}
		
		public function listarDocPendenteEstagiario($sedeId){						
			
			// INSTRUCAO SQL //			
			$sql = " select *, count(a.colaboradores_id) as totalanexos from " . self::TABELA . " c inner join anexos a
			where (c.id = a.colaboradores_id) and (c.sedes_id = '".$sedeId."' ) and (c.status = '1') and (c.tipo = '1') order by c.nome;"; 
			// EXECUTANDO A SQL //			
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		
		public function listarExameAdmissionalVencido($sedeId){						
			
			// INSTRUCAO SQL //			
			$sql = " select * from " . self::TABELA . " inner join anexos on
			" . self::TABELA . ".id = anexos.colaboradores_id where
			(DATEDIFF(curdate( ), anexos.data) >= 700) and 
			(anexos.tipo = 'Exame Admissional') and
			(month(anexos.data - INTERVAL 1 MONTH) <= month(curdate())) and 
			(colaboradores.tipo = 0) and 
			(colaboradores.sedes_id = '".$sedeId."')
			order by colaboradores.nome;";			 
			// EXECUTANDO A SQL //			
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		public function listarContartoEstagioVencido($sedeId){			
			// INSTRUCAO SQL //			
			$sql = " select * from " . self::TABELA . " inner join anexos on
			" . self::TABELA . ".id = anexos.colaboradores_id where			
			(DATEDIFF(curdate( ), anexos.data) >= 120)  and 
			(anexos.tipo = 'Contrato de Estagio') and
			(colaboradores.tipo = 1) and 
			(colaboradores.sedes_id = '".$sedeId."')
			order by colaboradores.nome;";			
			 
			// EXECUTANDO A SQL //			
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
			return $resultado;
		}
		
		public function exibirFeriasAvencer($sedeId){
			// INSTRUCAO SQL //
				
			$sql = " SELECT *, DATEDIFF( ferias.duracao, ferias.data ) 
			as quantDiasFerias FROM " . self::TABELA . " inner join ferias on
			" . self::TABELA . ".id = ferias.colaboradores_id where 
			ferias.duracao >= curdate( ) and colaboradores.sedes_id = '".$sedeId."'
			order by colaboradores.nome;";			
			 
			// EXECUTANDO A SQL //			
			$resultado = $this->conexao->fetchAll($sql);
			// RETORNANDO O RESULTADO //
					
			return $resultado;
		} 
	}
?>