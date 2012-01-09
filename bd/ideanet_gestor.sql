-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Out 14, 2011 as 09:19 PM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `ideanet_gestor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acoes`
--

CREATE TABLE IF NOT EXISTS `acoes` (
  `id_modulos` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nome` varchar(64) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_modulos`,`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `acoes`
--

INSERT INTO `acoes` (`id_modulos`, `codigo`, `nome`) VALUES
(1, 1, 'Visualizar'),
(1, 2, 'Adicionar, Editar e Excluir'),
(2, 1, 'Visualizar'),
(2, 2, 'Adicionar, Editar e Excluir'),
(3, 1, 'Visualizar'),
(3, 2, 'Adicionar'),
(3, 3, 'Editar'),
(3, 4, 'Excluir'),
(4, 1, 'Visualizar'),
(4, 2, 'Adicionar'),
(4, 3, 'Editar'),
(4, 4, 'Excluir'),
(4, 5, 'Mudar Valor'),
(5, 1, 'Visualizar'),
(5, 2, 'Adicionar'),
(5, 3, 'Editar'),
(5, 4, 'Excluir'),
(7, 1, 'Visualizar'),
(7, 2, 'Adicionar'),
(7, 3, 'Editar'),
(7, 4, 'Excluir'),
(7, 5, 'Cancelar Matrícula'),
(7, 6, 'Gerar Extorno'),
(7, 7, 'Autorizar Matricula'),
(7, 8, 'RegerarContrato'),
(8, 1, 'Visualizar'),
(8, 2, 'Adicionar'),
(8, 3, 'Editar'),
(8, 4, 'Excluir'),
(8, 5, 'Dar baixa'),
(9, 1, 'Visualizar'),
(10, 1, 'Visualizar'),
(10, 2, 'Cadastrar Pagamento'),
(10, 3, 'Editar Pagamentos'),
(11, 1, 'Visualizar'),
(12, 1, 'Consultar Resultado'),
(13, 1, 'Visualizar'),
(13, 2, 'Adicionar, Editar e Excluir');

-- --------------------------------------------------------

--
-- Estrutura da tabela `acoes_modulos_perfis`
--

CREATE TABLE IF NOT EXISTS `acoes_modulos_perfis` (
  `codigo` int(11) NOT NULL,
  `id_modulos` int(11) NOT NULL,
  `id_perfis` int(11) NOT NULL,
  PRIMARY KEY (`codigo`,`id_modulos`,`id_perfis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `acoes_modulos_perfis`
--

INSERT INTO `acoes_modulos_perfis` (`codigo`, `id_modulos`, `id_perfis`) VALUES
(1, 1, 5),
(1, 2, 5),
(1, 3, 1),
(1, 3, 5),
(1, 4, 3),
(1, 4, 5),
(1, 5, 3),
(1, 5, 5),
(1, 7, 3),
(1, 7, 5),
(1, 8, 3),
(1, 8, 5),
(1, 11, 5),
(1, 12, 1),
(1, 12, 5),
(1, 13, 1),
(1, 13, 5),
(2, 1, 5),
(2, 2, 5),
(2, 3, 1),
(2, 3, 5),
(2, 4, 3),
(2, 4, 5),
(2, 5, 3),
(2, 5, 4),
(2, 5, 5),
(2, 7, 3),
(2, 7, 5),
(2, 8, 3),
(2, 8, 5),
(2, 13, 1),
(2, 13, 5),
(3, 3, 1),
(3, 3, 5),
(3, 4, 3),
(3, 4, 5),
(3, 5, 3),
(3, 5, 4),
(3, 5, 5),
(3, 7, 5),
(3, 8, 5),
(4, 3, 1),
(4, 3, 5),
(4, 4, 5),
(4, 5, 3),
(4, 5, 5),
(4, 7, 5),
(4, 8, 5),
(5, 4, 5),
(5, 7, 5),
(5, 8, 5),
(6, 7, 5),
(7, 7, 5),
(8, 7, 3),
(8, 7, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `advertencias`
--

CREATE TABLE IF NOT EXISTS `advertencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colaboradores_id` int(11) NOT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `descricao` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `anexo` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `advertencias`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(256) COLLATE utf8_bin NOT NULL,
  `sexo` char(1) COLLATE utf8_bin NOT NULL,
  `rg` int(11) NOT NULL,
  `orgao_expedidor` varchar(11) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(20) COLLATE utf8_bin NOT NULL,
  `endereco` varchar(256) COLLATE utf8_bin NOT NULL,
  `bairro` varchar(128) COLLATE utf8_bin NOT NULL,
  `cep` int(8) NOT NULL,
  `cidade` varchar(128) COLLATE utf8_bin NOT NULL,
  `estado` varchar(128) COLLATE utf8_bin NOT NULL,
  `telefone_1` varchar(15) COLLATE utf8_bin NOT NULL,
  `telefone_2` varchar(15) COLLATE utf8_bin NOT NULL,
  `email` varchar(256) COLLATE utf8_bin NOT NULL,
  `escolaridade` varchar(20) COLLATE utf8_bin NOT NULL,
  `profissao` varchar(256) COLLATE utf8_bin NOT NULL,
  `sedes_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `sexo`, `rg`, `orgao_expedidor`, `cpf`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `telefone_1`, `telefone_2`, `email`, `escolaridade`, `profissao`, `sedes_id`) VALUES
(1, 'Fernanda Fidelis Pereira', 'F', 5822465, 'sss', '332.546.897-78', 'av garanhuns 241', 'Timbi', 54750, 'Camaragibe', 'PE', '(81) 3458-9997', '(81) 9274-0583', 'fernandinhafidelis81@hotmail.com', '3 grau completo', 'coordenadora RH', 1),
(2, 'mara', 'F', 5901103, 'sds', '042.028.794-90', 'asd', 'asd', 54800, 'asd', 'asd', '(01) 1121-2121', '(21) 1212-1212', 'asdfsad@gmai.com', 'as', 'as', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anexos`
--

CREATE TABLE IF NOT EXISTS `anexos` (
  `data` date NOT NULL,
  `arquivo` varchar(255) COLLATE utf8_bin NOT NULL,
  `tipo` set('Exame Admissional','Exame Demissional','Contrato de Estagio','Vale transporte','Vale Refeição','Contrato de trabalho','Comprovante de Entrega de CTPS') COLLATE utf8_bin NOT NULL,
  `colaboradores_id` int(11) NOT NULL,
  KEY `colaboradores_id` (`colaboradores_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `anexos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `aux_transporte_tipo`
--

CREATE TABLE IF NOT EXISTS `aux_transporte_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sedes_id` int(11) NOT NULL,
  `nome` char(1) COLLATE utf8_bin DEFAULT NULL,
  `valor` float DEFAULT NULL,
  PRIMARY KEY (`id`,`sedes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `aux_transporte_tipo`
--

INSERT INTO `aux_transporte_tipo` (`id`, `sedes_id`, `nome`, `valor`) VALUES
(1, 1, 'A', 1.85),
(2, 1, 'B', 2.8),
(3, 1, 'D', 2.25),
(4, 1, 'G', 1.2),
(12, 3, 'A', 2.5),
(14, 3, 'B', 3.1),
(15, 3, 'C', 4),
(16, 3, 'D', 5.3),
(17, 2, 'A', 3),
(18, 2, 'B', 4.49),
(19, 4, 'A', 2.5),
(20, 5, 'A', 2.5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cheques`
--

CREATE TABLE IF NOT EXISTS `cheques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `situacao` int(11) NOT NULL,
  `baixa` int(11) NOT NULL,
  `vencimento` date NOT NULL,
  `data` date NOT NULL,
  `valor` double NOT NULL,
  `sedes_id` int(11) NOT NULL DEFAULT '1',
  `agencia` varchar(13) COLLATE utf8_bin NOT NULL,
  `conta` varchar(15) COLLATE utf8_bin NOT NULL,
  `numero_cheque` varchar(15) COLLATE utf8_bin NOT NULL,
  `matriculas_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cheques`
--

INSERT INTO `cheques` (`id`, `situacao`, `baixa`, `vencimento`, `data`, `valor`, `sedes_id`, `agencia`, `conta`, `numero_cheque`, `matriculas_id`) VALUES
(1, 0, 0, '2012-01-01', '2011-10-03', 10, 1, '01', '02', '01', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE IF NOT EXISTS `colaboradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aux_transporte_tipo_id` int(11) NOT NULL,
  `sedes_id` int(11) NOT NULL,
  `vale_transporte_casa_trabalho` int(11) DEFAULT NULL,
  `vale_transporte_trabalho_casa` int(11) NOT NULL,
  `nome` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `endereco` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `bairro` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `cidade` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `uf` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `cep` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `fone` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `celular` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `mun_nascimento` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `uf_nascimento` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `pai` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `mae` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `estado_civil` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `rg` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `orgao_expedidor` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `data_expedicao` date DEFAULT NULL,
  `habilitacao` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `habilitacao_categoria` set('A','B','C','D','E') COLLATE utf8_bin DEFAULT NULL,
  `habilitacao_vencimento` date DEFAULT NULL,
  `titulo` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `titulo_zona` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `titulo_secao` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `cpf` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `carteira_trabalho` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `carteira_trabalho_serie` varchar(25) COLLATE utf8_bin NOT NULL,
  `carteira_uf` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `pis` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `certificado_reservista` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `observacoes` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `grau_instrucao` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `dias_contrato_experiencia` int(11) DEFAULT NULL,
  `departamento` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `funcao` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `salario_contratual` double DEFAULT NULL,
  `adiantamento_quinzenal` double DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `horario_entrada` time NOT NULL,
  `horario_saida` time NOT NULL,
  `duracao_intervalo` time NOT NULL,
  `horario_intervalo` time NOT NULL,
  `pendente` int(11) NOT NULL,
  `conjuge` varchar(128) COLLATE utf8_bin NOT NULL,
  `aux_alimentacao_tipo` int(11) NOT NULL,
  `possui_vTransporte` int(11) NOT NULL,
  `possui_vAlimentacao` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_bin NOT NULL,
  `data_admissao` date NOT NULL,
  `data_demissao` date NOT NULL,
  PRIMARY KEY (`id`,`aux_transporte_tipo_id`,`sedes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `aux_transporte_tipo_id`, `sedes_id`, `vale_transporte_casa_trabalho`, `vale_transporte_trabalho_casa`, `nome`, `endereco`, `bairro`, `cidade`, `uf`, `cep`, `fone`, `celular`, `data_nascimento`, `mun_nascimento`, `uf_nascimento`, `pai`, `mae`, `estado_civil`, `rg`, `orgao_expedidor`, `data_expedicao`, `habilitacao`, `habilitacao_categoria`, `habilitacao_vencimento`, `titulo`, `titulo_zona`, `titulo_secao`, `cpf`, `carteira_trabalho`, `carteira_trabalho_serie`, `carteira_uf`, `pis`, `certificado_reservista`, `observacoes`, `grau_instrucao`, `dias_contrato_experiencia`, `departamento`, `funcao`, `salario_contratual`, `adiantamento_quinzenal`, `tipo`, `horario_entrada`, `horario_saida`, `duracao_intervalo`, `horario_intervalo`, `pendente`, `conjuge`, `aux_alimentacao_tipo`, `possui_vTransporte`, `possui_vAlimentacao`, `status`, `data_admissao`, `data_demissao`) VALUES
(2, 1, 1, 2, 2, 'ANA CATARINA LEMOS MUNIZ DA SILVA', 'Rua Cumari , 31', 'Casa Amarela', 'Recife', 'PE', '52070-512', '', '(81) 8836-5951', '1989-01-19', 'Recife', 'PE', 'Marcos Muniz da Silva', 'Gercina Maria de Lemos', 'Solteiro', '7788309', 'SSP - PE', '0000-00-00', '', 'A', '0000-00-00', '080985200833', '006', '0318', '073.886.644-08', '', '', 'A', '', '', '', 'Superior em Andamento', 0, 'Estúdio', 'Estagiária', 550, 0, 1, '08:00:00', '13:00:00', '11:00:00', '11:15:00', 0, '', 0, 1, 0, '0', '0000-00-00', '0000-00-00'),
(3, 1, 1, 1, 1, 'ANA CLAUDIA LARANJEIRA DE ARAUJO', 'Rua da Harmonia, 430, Apt ,202', 'Casa Amarela', 'Recife ', 'PE', '52051-390', '', '(81) 9976-1564', '1986-10-24', 'Recife ', 'PE', 'Hilário Augusto de Araújo', 'Cecilia Esteves Laranjeira', 'Solteiro', '7335743', 'SDS', '0000-00-00', '', 'A', '0000-00-00', '075310630850', '5', '180', '075.241.404-60', '58971', '00097', 'PE', '13680647459', '', '', 'Superior Completo', 45, 'Comunicação', 'Jornalista', 1600, 0, 0, '08:00:00', '14:00:00', '11:00:00', '11:15:00', 0, '', 0, 1, 1, '0', '0000-00-00', '0000-00-00'),
(4, 2, 1, 1, 1, 'ALLISSA RODRIGUES DE ANDRADE', 'Rua Maria Judiht Lins, 133', 'Casa Caiada', 'Olinda ', 'PE', '53130-080', '', '(81) 9267-4291', '1989-08-04', 'Recife', 'PE', 'Paulo Roberto de Andrade Silva', 'Monica Rodrigues de Andrade Silva', 'Solteiro', '7106758', 'SDS', '2002-07-22', '', 'A', '0000-00-00', '', '', '', '065.501.144-70', '', '', '', '', '', '', 'uperior em Andamento', 0, 'Estúdio', 'Estagiária', 550, 0, 1, '17:15:00', '22:15:00', '19:00:00', '19:15:00', 0, '', 0, 1, 0, '0', '0000-00-00', '0000-00-00'),
(5, 1, 1, 1, 1, 'ARNOLD SCHWARZENEGGER ARANTES DE SOUZA', 'Rua Itaicaba, 407', 'Ibura', 'Recife', 'PE', '51330-310', '', '(81) 9493-7412', '1992-12-30', 'Recife', 'PE', 'Cicero Jose de Souza', 'Maria de Fatima Arantes', 'Solteiro', '8278308', 'SDS', '2007-04-20', '', 'A', '0000-00-00', '', '', '', '088.383.964-42', '00002189', '00095', 'PE', '13847239456', '', '', '2ª Grau Completo', 0, 'Estúdio ', 'Assistente de Estúdio', 1100, 0, 0, '08:00:00', '17:00:00', '12:15:00', '13:15:00', 0, '', 1, 1, 1, '0', '0000-00-00', '0000-00-00'),
(6, 1, 4, 1, 1, 'ANDRE CHAVES AVILA', 'Rua: Nita Costa , 145  Apt. 802 A', 'Jardim Apipemas', 'Salvador ', 'BA', '40155-000', '', '(71) 8813-9594', '0000-00-00', '', '', 'Paulo Cesar do Lago Avila', 'Liana Chaves Avila', 'Solteiro', '1310489700', 'SSP - BA', '2006-09-21', '04782570371', 'B', '2014-04-28', '132308370515', '001', '0052', '044.325.115-08', '', '', '', '', '', '', 'Superior em Andamento', 0, 'Estúdio', 'Estagiário', 550, 0, 1, '17:00:00', '22:00:00', '18:30:00', '18:45:00', 0, '', 0, 1, 0, '0', '0000-00-00', '0000-00-00'),
(7, 1, 3, 1, 1, 'ANA LUCIA SPECHT DE SOUZA MONTEIRO', 'Rua : Das Laranjeiras , 336  Apt. 414', 'Laranjeiras', 'Rio de Janeiro', 'RJ', '22240-006', '', '(21) 8228-0046', '1984-04-16', 'Recife', 'PE', 'Ricardo Augusto de Souza Monteiro', 'Ana Maria Specht de Freitas Lins', 'Solteiro', '6713065', 'SDS  - PE', '0000-00-00', '03127740522', 'B', '2013-11-20', '64381600892', '008', '0087', '049.221.754-82', '15712', '00074', 'PE', '13276203455', '', '', 'Superior Completo', 0, 'Estúdio', 'Chefe Local', 1400, 0, 0, '07:00:00', '16:00:00', '12:00:00', '13:00:00', 0, '', 1, 1, 1, '0', '0000-00-00', '0000-00-00'),
(8, 0, 3, NULL, 0, 'KARINA DE OLIVEIRA BRANCO', 'R - Riachuelo,Nº54 - Ap:206', 'Centro', 'Rio de Janeiro', 'RJ', '20230-014', '', '', '1990-03-28', 'Centro', 'RJ', 'José Carlos Madeira Rodrigues  Branco', 'Maria da  Conceição Oliveira Branco', 'Solteiro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '', 0, 0, 0, '0', '0000-00-00', '0000-00-00'),
(11, 0, 3, NULL, 0, 'Luiz Alberto Cristiano Junior', 'Rua: Campos Sales, nº16,Apt:701,Bl:03', 'Tijuca', 'Rio de Janeiro', 'Rio de Janeiro', '20270-310', '', '', '1980-05-24', 'Rio de Janeiro', 'Rio de Janeiro', 'Luiz Alberto Cristiano', 'Amelia Fatima Passos Cristiano', 'Solteiro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '', 0, 0, 0, '0', '0000-00-00', '0000-00-00'),
(12, 12, 3, 1, 1, 'RODRIGO ALVES MESQUITA', 'Rua:Moravia nº325', 'Jardim Carioca', 'Rio de Janeiro', 'RJ', '', '(21) 2467-3505', '', '2011-06-10', 'RJ', 'RJ', 'Henrique de Jesus Alves  de Mesquita', 'Delma de Souza Alves', 'Solteiro', '686297-7', '', '2007-11-29', '', 'A', '0000-00-00', '', '', '', '003.676.332-21', '', '', '', '', '', '', 'Superior em andamento', 0, 'Estúdio', 'Estagiario', 550, 0, 1, '08:00:00', '13:00:00', '00:00:00', '00:00:00', 0, '', 0, 1, 0, '0', '0000-00-00', '0000-00-00'),
(13, 12, 3, 1, 1, 'THIAGO BRAVO PINHEIRO DE FRETAS QUINTES', 'Rua:Presidente Backer,331 - Apt:207', 'Santa Rosa', 'Niterói', 'RJ', '24220-04', '', '', '1989-03-17', 'Rio de Janeiro', 'RJ', 'Nilo Bravo Pinheiro de Freitas Quintes', 'Marise Bravo Pinheiro de Freitas Quintes', 'Solteiro', '20.468.657-0', 'Rio de Janeiro', '2011-04-03', '', 'A', '0000-00-00', '1368.4546.0353', '062', '0080', '126.119.537-08', '52489', '153', 'RJ', '', '', '', 'Superior completo', 0, 'Assistente de Estúdio', '', 1100, 0, 0, '13:00:00', '22:00:00', '17:00:00', '18:00:00', 0, '', 0, 1, 1, '0', '0000-00-00', '0000-00-00'),
(14, 12, 3, 1, 1, 'MICHEL TITO BEZERRA', 'Rua:Mena Barreto,75 - Ap:302', 'Botafogo', 'Rio de Janeiro', 'RJ', '22271-100', '', '', '1983-03-06', 'Rio de Janeiro', 'RJ', 'Erinaldo Bezerra da Silva', 'Gilca Maria Tito Bezerra', 'Solteiro', '09173680-37', 'PE', '1996-08-09', '', 'A', '0000-00-00', '0626.9606.0884', '004', '0088', '', '128.01835.06-6', '001-0', 'PA', '1280183506601', '21-149-240650-2', '', 'Superior Completo', 0, 'Estúdio', 'Assistente de Estúdio', 1100, 0, 0, '08:00:00', '17:00:00', '12:00:00', '13:00:00', 0, '', 0, 1, 1, '0', '0000-00-00', '0000-00-00'),
(15, 0, 2, NULL, 0, 'BRUNA ARAÚJODE OLIVEIRA', 'Rua: Pupo Nogueira.nº153 - Casa - A', 'Sacana', 'São Paulo', 'São Paulo', '04248-020', '', '', '1988-04-20', 'SÃO Paulo', 'SP', 'Valdemir de Oliveira', 'Meire Aparecida de Araújo Oliveira ', 'Solteiro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '', 0, 0, 0, '0', '0000-00-00', '0000-00-00'),
(16, 17, 2, 1, 1, 'RENATA VIRIATO DE MEDEIROS', 'Rua:Francisco Leopodino,Nº403 - Blo:C - Apt: 03', 'Varzea', 'Recife', 'PE', '50980-060', '', '(81) 8714-8057', '1988-07-28', 'PE', 'PE', 'Roberto Amorim Viriato de Medeiros', 'Celia Maria da Conceição', 'Solteiro', '7210802', 'PE', '0202-11-26', '', 'A', '0000-00-00', '', '', '', '069.556.214-24', '43143', '00085', 'PE', '', '', '', 'Superior Completo', 0, 'Estúdio', 'Chefe Local', 1400, 0, 0, '08:00:00', '17:00:00', '12:00:00', '13:00:00', 0, '', 0, 1, 1, '0', '0000-00-00', '0000-00-00'),
(17, 18, 2, 1, 1, 'ROGÉRIO DELGADO', 'R:Heraclito Odilon,Nº48 -  ', 'Jardim  Ana Rosa', 'São Paulo', 'SP', '03287-010', '', '', '1979-03-23', 'SP', 'SP', 'José Custodio Delgado', 'Dolores Cruz Delgado', 'Solteiro', '27.250.060-4', 'SP', '1999-03-23', '', 'A', '0000-00-00', '2854357801/75', '350', '0247', '266.040.428-39', '097069', '00488', 'SP', '', '', '', 'Superior Completo', 0, 'Estúdio ', 'Designer', 3180, 0, 0, '08:00:00', '17:00:00', '12:00:00', '13:00:00', 0, '', 0, 1, 1, '0', '0000-00-00', '0000-00-00'),
(18, 17, 2, 1, 1, 'FELIPE SANTOS FERREIRA', 'R:Maria Santissima,Nº07 - ', 'Cidade Nova Heliopolis', 'São Paulo', 'SP', '04236-310', '', '', '1988-09-10', 'SP', 'SP', 'José Antonio Alves Ferreira', 'Maria de Fatima Santos de Gusmão', 'Solteiro', '33.680.608-5', 'SP', '2001-01-24', '', 'A', '0000-00-00', '3293.9378.0124', '260', '0424', '358.560.958-98', '041262', '00294', 'SP', '', '', '', 'Superior Completo', 0, 'Estúdio', 'Assistente de Estúdio', 1100, 0, 0, '13:15:00', '22:15:00', '17:00:00', '18:00:00', 0, '', 0, 1, 1, '0', '0000-00-00', '0000-00-00'),
(19, 19, 4, 1, 1, 'CAIO BARBOSA CONCEIÇÃO', 'r: Prof.Arnaldo Silveira,Nº330 - Bl.A - Apt.202', 'Saõ Marcos', 'Salvador', 'BA', '41250-423', '', '', '1987-08-01', 'BA', 'BA', 'Silvio da Silva Conceição', 'Ana Cristina Barbosa Conceição', 'Solteiro', '1014869013', 'BA', '2009-04-02', '', 'A', '0000-00-00', '12.255.267-05/90', '0019', '202', '024.707.125-94', '9904530', '001-0', 'BA', '129.34002-94', '', '', 'Superior Completo', 0, 'Estúdio', 'Chefe Local', 1400, 0, 0, '07:00:00', '16:00:00', '12:00:00', '13:00:00', 0, '', 0, 1, 1, '0', '0000-00-00', '0000-00-00'),
(20, 0, 4, NULL, 0, 'FABIO CONCEIÇÃO DA SILVA', 'Rua: Doze Setembro - nº46', 'Cosme Farias', 'Salvador', 'BA', '40253-220', '', '(75) 8827-5613', '1986-06-15', 'Ba', 'BA', 'IZIDORO RAIMUNDO MONTEIRO SA SILVA', 'BERALICE MARIA DA CONCEIÇÃO SILVA', 'Solteiro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '', 0, 0, 0, '0', '0000-00-00', '0000-00-00'),
(21, 19, 4, 1, 1, 'Fabio Conceição da Silva', 'Rua: Doze Setembro - nº46', 'Cosme Farias', 'Salvador', 'Bahia', '40253-220', '', '(75) 8827-5613', '1986-06-15', 'BA', 'BA', 'Izidoro Raimundo Monteiro da Silva', 'Beralice Maria da Conceição Silva', 'Solteiro', '08420067-70', 'BA', '2003-01-31', '', 'A', '0000-00-00', '119631560031', '014', '188', '775.770.001-5', '5971577', '0030', 'BA', '200.11193-9', '', '', 'Superior Completo', 0, 'Estúdio', 'Assitente de Estúdio', 1100, 0, 0, '13:15:00', '22:15:00', '17:00:00', '18:00:00', 0, '', 0, 1, 1, '0', '2011-01-03', '0000-00-00'),
(22, 19, 4, 1, 1, 'TALITA SOARES REIS COSTA', 'Rua: Vicente Celestino - nº15y', 'Marechal Rondon', 'Salvador', 'BA', '41280-000', '', '', '1987-06-02', 'BA', 'BA', 'Luis Antonio Rocha Costa', 'Lola Soares Reis Costa', 'Solteiro', '11640700.02', 'BA', '0000-00-00', '', 'A', '0000-00-00', '1133.9862.0507', '143', '0188', '026.033.875-37', '8120228', '001-0', 'BA', '128.85517.05-2', '', '', 'Superior Completo', 0, 'Estúdio', 'Assistente de Estúdio', 1100, 0, 0, '08:00:00', '17:00:00', '12:00:00', '13:00:00', 0, '', 0, 1, 1, '0', '2011-01-18', '0000-00-00'),
(23, 19, 4, 1, 1, 'JÚLIO CESAR ALCÂNTARA DOS SANTOS SANCHES DE SOUSA', 'Rua: Matadouro Cam - nº05 - 5zy - apt:01 1º andar', 'Cajazeiras VII', 'Salvador', 'BA', '40000-000', '', '(75) 9238-4446', '1988-11-22', 'BA', 'BA', 'Jorge Alberto Sanches de Sousa', 'Rosene Alcantara dos Santos', 'Solteiro', '1204.2096-18', 'SSP', '2006-08-02', '', 'A', '0000-00-00', '1288.3704.0574', '019', '0208', '039.127.115-34', '', '', '', '', '', '', 'Superior Cursando', 0, 'Estúdio', 'Assistente de Estúdio', 550, 0, 1, '17:00:00', '22:00:00', '00:00:00', '00:00:00', 0, '', 0, 1, 0, '0', '2011-01-22', '0000-00-00'),
(24, 19, 4, 1, 1, 'MAISA LIMA ALMEIDA', 'Rua: Humberto de Campos - nº99 zz a 303', 'Graças ', 'Salvador', 'BA', '40150-130', '', '', '1988-04-29', 'BA', 'BA', 'Theodoro Rodrigues Almeida', 'Maria Izabel Gomes de Lima Almeida', 'Solteiro', '10059730-30', 'SSP/BA', '1998-03-21', '', 'A', '0000-00-00', '120078010558', '062', '0041', '032.977.115-90', '34.30177', '002-0', 'BA', '130.31300-05-9', '', '', 'Superior Completo', 0, 'Estúdio ', 'Assistente de Estúdio', 1100, 0, 0, '08:00:00', '17:00:00', '12:00:00', '13:00:00', 0, '', 0, 1, 1, '0', '2010-11-03', '0000-00-00'),
(25, 20, 5, 1, 1, 'ANDREA FERNANDA GONÇALVES', 'Rua:Amazonas - nº1326 - Apt;13 - Blc:B', 'Centro', 'Curitiba', 'PR', '80610-030', '', '', '1989-01-25', 'PR', '', 'Antonio Armando Gonçalves', 'Vera Alice Gonçalves', 'Solteiro', '7797.7615-9', 'SESP', '0000-00-00', '04767474547', 'B', '2014-03-13', '00916311306-04', '004', '225', '058.797.059-60', '', '', '', '', '', '', 'Superoir Cursando', 0, 'Estúdio', 'Assistente de Estúdio', 550, 0, 1, '13:00:00', '17:00:00', '00:00:00', '00:00:00', 0, '', 0, 1, 0, '0', '2011-05-05', '0000-00-00'),
(26, 20, 5, 0, 0, 'SAMUEL SAMWAYS KELCHESTSCLI', 'Av:Luiz Xavier - nº68  -  Ap: 2906', 'Centro', 'Curitiba', 'PR', '80020-020', '', '', '1984-10-27', 'PR', 'PR', 'Luiz Kulchetscki', 'Serley Samways Kelchetscki', 'Solteiro', '4668594-6', '047.534.559-20', '2002-03-12', '', 'A', '0000-00-00', '083506240612', '197', '0071', '047.534.559-20', '6727373', '0030', 'PR', '149.11211.27-6', '', '', 'Superior Completo', 0, 'Estúdio', 'Editor de Imagem', 1400, 0, 0, '08:00:00', '17:00:00', '12:00:00', '13:00:00', 0, '', 0, 0, 1, '0', '2011-04-15', '0000-00-00'),
(27, 1, 1, 0, 0, 'ADRIANA PAULASILVA FREIRE', 'Rua: Min.Salgado Filho - nº36 - BL:06 - Apt:102', 'Boa Viagem ', 'Recife', 'PE', '51130-500', '(81) 3461-3503', '', '1980-12-28', 'PE', 'PE', 'Luiz Carlos Freire', 'Amara Maria Silva Freire', 'Casado', '50.411.808-3', 'SSP/PE', '0000-00-00', '', 'A', '0000-00-00', '', '', '', '027.815.914-16', '77193', '00057', 'PE', '127.94125453', '', '', 'Superior Cursando', 0, 'Administração', 'Coordenadora de Cursos', 1728, 0, 0, '08:00:00', '17:00:00', '12:00:00', '13:00:00', 0, '', 0, 0, 1, '0', '2010-06-29', '0000-00-00'),
(28, 1, 1, 1, 1, 'MERLY ROSE DA SILVA MARTINS', 'AV. COMENDADOR MUNIS MACHADO, 533', 'VILA DA FABRICA ', 'CAMARAGIBE', 'PE', '54759-540', '', '(81) 8651-4714', '1984-10-10', 'RECIFE', 'PE', 'PAULO JOSÉ MARTINS', 'CLEONICE MARIA DA SILVA MARTINS', 'Casado', '7123527', 'SDS', '0000-00-00', '', 'A', '0000-00-00', '070295180825', '127', '132', '056.059.874-29', '03499', '00078', 'PE', '16488013786', '', '', '2º COMPLETO', 45, 'RECEPÇÃO', 'RECEPCIONISTA', 654.76, 0, 0, '07:30:00', '16:30:00', '13:00:00', '14:00:00', 0, 'ELIO PEREIRA DE SOUZA', 1, 1, 1, '0', '2010-07-20', '0000-00-00'),
(29, 2, 1, 1, 1, 'LEILKA LAMARK COUTINHO DE AZEVEDO', 'RUA : AUGUSTO CALHEIROS , 544 A ', 'CAVALEIRO ', 'JABOATAO GUARARAPES ', 'PE', '54250-121', '(81) 3034-8946', '(81) 9457-5839', '1975-10-29', 'GARANHUNS', 'PE', 'JOSE ZANONI AZEVEDO', 'MARIA DO CARMO C AZEVEDO', 'Casado', '5026594', 'SSP', '2003-07-24', '', 'A', '0000-00-00', '458495608091', '118', '0157', '962.910.444-04', '0018693', '00046', 'PE', '12531835395', '', '', '2º COMPLETO', 45, 'RECEPÇÃO', 'RECEPCIONISTA', 500, 0, 0, '08:00:00', '17:00:00', '13:00:00', '14:00:00', 0, '', 1, 1, 1, '0', '2009-01-12', '0000-00-00'),
(30, 1, 1, 1, 1, 'DARLLY DAIANNA DE CASTRO PEREIRA', 'RUA JOSÉ SANTOS ARAQUAM , 58', 'AFOGADOS', 'RECIFE', 'PE', '50820-420', '', '(81) 8699-1209', '1987-11-16', 'RECIFE', 'PE', 'AIRTON COELHO PEREIRA', 'ELAINE DO CARMO C.C.PEREIRA', 'Solteiro', '7600655', 'SDS - PE', '0000-00-00', '', 'A', '0000-00-00', '074969800817', '150', '0188', '071.519.454-26', '00060443', '00097', 'PE', '13604365898', '', '', '3º COMPLETO', 45, 'ADMINISTRATIVO', 'ASSISTENTE ADMINISTRATIVA', 800, 0, 0, '08:00:00', '17:00:00', '12:00:00', '13:00:00', 0, '', 0, 1, 1, '0', '2009-09-01', '0000-00-00'),
(31, 1, 1, 1, 1, 'DANIELLY ANDRADE CAVALCANTI SIMÕES', 'RUA . DJALMA DUTRA, 136  APT 302 - EDF. ITU ', 'JANGA', 'PAULISTA', 'PE', '', '', '(81) 8658-8065', '1984-03-18', 'RECIFE', 'PE', 'JOSE RAMOS CAVALCANTI SIMÕES', 'AVANY DE ANDRADE CAVALCANTI', 'Solteiro', '5981978', 'SDS', '2005-11-18', '', 'A', '0000-00-00', '065319010809', '9', '258', '013.274.954-81', '40278', '00072', 'PE', '13702378455', '', '', '3º COMPLETO', 45, 'ATENDIMENTO', 'TELEMARKETING', 700, 0, 0, '08:00:00', '14:00:00', '00:00:00', '00:00:00', 0, '', 0, 1, 1, '0', '2010-07-12', '0000-00-00'),
(32, 1, 1, 0, 0, 'JEFFERSON JOSE DA CRUZ', 'RUA. JOSE NUNES DA CUNHA , 582', 'PIEDADE ', 'JABOATÃO', 'PE', '54410-281', '', '(81) 9294-0761', '1979-04-07', 'SÃO APULO', 'SP', 'JOSE DA CRUZ', 'SOLANGE APARECIDA BEVILACQUA DA CRUZ', 'Casado', '324182132', '', '0000-00-00', '', 'A', '0000-00-00', '', '', '', '293.845.158-09', '0060312', '00218', 'SP', '12659520163', '', '', '3º COMPLETO', 45, 'ESTÚDIO', 'CHEFE DE ESTÚDIO', 2500, 0, 0, '08:00:00', '17:00:00', '12:00:00', '13:00:00', 0, '', 1, 0, 1, '0', '2009-03-12', '0000-00-00'),
(33, 1, 1, 1, 1, 'DAVID GOMES DE ARAUJO', 'RUA INDAIA DO SUL, 36', 'TRES CARNEIROS ALTO', 'IBURA', 'PE', '51330-280', '', '(81) 8640-1832', '2009-01-30', 'RECIFE', 'PE', 'JOSE FRANCISCO DE ARAUJO', 'SEVERINA GOMES DE ARAUJO', 'Casado', '6760131', 'SDS', '2000-11-20', '', 'A', '0000-00-00', '077791420984', '148', '0219', '085.811.844-05', '0092975', '00085', 'PE', '13655115457', '', '', '2º COMPLETO', 45, 'ESTÚDIO', 'ASSISTENTE DE ESTÚDIO', 700, 0, 0, '08:00:00', '17:00:00', '12:00:00', '14:00:00', 0, '', 1, 1, 1, '0', '2009-01-30', '0000-00-00'),
(34, 1, 1, 1, 1, 'JAIRO DE LIMA BEZERRA', 'RUA. TODOS OS SANTOS, 80 C ', 'IBURA ', 'RECIFE', 'PE', '51340-390', '', '(81) 8687-9135', '1985-03-13', 'RIBEIRÃO', 'PE', 'RAMIRO BEZERRA DE MELO', 'IVETE MARIA DE LIMA', 'Casado', '6873892', 'SDS', '2008-05-26', '', 'A', '0000-00-00', '065066340809', '028', '0809', '060.717.134-90', '85356', '00062', 'PE', '13265011452', '', '', '2º COMPLETO', 45, 'ESTÚDIO ', 'ASSISTENTE DE ESTÚDIO', 700, 0, 0, '13:15:00', '22:15:00', '17:00:00', '16:00:00', 0, '', 0, 1, 1, '0', '2009-03-02', '0000-00-00'),
(35, 0, 1, NULL, 0, 'IGOR PIMENTEL MOREIRA', 'RUA. JEQUIEL, 260', 'JARDIM BRASIL', 'RECIFE', 'PE', '53300-280', '(81) 3427-3258', '(81) 8677-8747', '1988-08-17', 'RECIFE', 'PE ', 'JOSE IZIS MOREIRA BARRETO', 'JOZIRENE PIMENTEL MOREIRA', 'Solteiro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '', 0, 0, 0, '0', '0000-00-00', '0000-00-00'),
(36, 1, 1, 1, 1, 'JOÃO PAULO CAMPELLO CORREIA', 'RUA . DOUTOR JOSÉ FULCO, 157', 'ARRUDA', 'RECIFE ', 'PE', '52111-000', '(81) 3444-5624', '(81) 9166-0848', '1985-08-30', 'RECIFE', 'PE', 'JOÃO CORREIA NETO', 'BRANCA MARIA CAMPELLO', 'Solteiro', '6277308', 'SDS - PE', '1999-05-04', '', 'A', '0000-00-00', '', '', '', '077.869.204-39', '044806', '000084', 'PE', '13863498452', '', NULL, '3º COMPLETO', 45, 'ESTÚDIO ', '', 465, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '', 0, 1, 1, '0', '2009-09-01', '0000-00-00'),
(37, 1, 1, 1, 1, 'PEDRO INOJOSA ZANRÉ', 'ESTRADA DO ARRAIAL, 2405  APT. 1601', 'TAMARINEIRA', 'RECIFE ', 'PE', '52051-380', '(81) 3269-2989', '(81) 8640-6907', '1987-11-09', 'RECIFE', 'PE', 'ANGELO ZANRÉ', 'MARIA DO CARMO INOJOSA', 'Solteiro', '7614767', 'SDS', '0000-00-00', '', 'A', '0000-00-00', '', '', '', '068.918.364-09', '60244', '00101', 'PE', '13819944450', '', '', '3', 0, 'ESTÚDIO', '', 0, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, '', 0, 1, 1, '0', '2009-04-16', '0000-00-00'),
(38, 1, 1, 1, 1, 'ANA LUCIA DA SILVA', 'RUA. SERTANIA, 75  ', 'VISTA ALEGRE', 'JABOATÃO DOS GUARARAPES', 'PE', '53000-000', '', '(81) 8500-3981', '1975-05-05', 'RECIFE', 'PE', 'SEVERINO ARLINDO DA SILVA', 'MARIA JOSE DA SILVA', 'Solteiro', '5543103', '', '0000-00-00', '', 'A', '0000-00-00', '', '', '', '031.278.544-55', '000033349', '00057', 'PE', '20706176884', '', NULL, '2º EM ANDAMENTO', 45, 'LIMPEZA', 'AUXILIAR DE LIMPEZA', 500, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '', 1, 1, 1, '0', '2009-04-22', '0000-00-00'),
(39, 1, 1, 1, 1, 'JAQUELINE MARIA DE MELO', 'RUA GUAIRAÇA,21', 'TRES CARNEIROS/ IBURA', 'RECIFE', 'PE', '51330-030', '', '(81) 8719-0082', '1983-02-15', 'RIBEIRÃO', 'PE', 'RAMIRO BEZERRA DE MELO', 'IVETE MARIA DE LIMA', '', '8338040', 'SSP', '0000-00-00', '', 'A', '0000-00-00', '', '', '', '090.063.554-10', '050828', '000069', 'PE', '16244242034', '', NULL, '2º EM ANDAMENTO', 45, 'LIMPEZA', 'AUXILIAR DE LIMPEZA', 500, 0, 0, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 1, '', 1, 1, 1, '0', '2009-07-11', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convenios`
--

CREATE TABLE IF NOT EXISTS `convenios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(256) COLLATE utf8_bin NOT NULL,
  `desconto` double NOT NULL,
  `sedes_id` int(11) NOT NULL,
  `cursos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `convenios`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sedes_id` int(11) NOT NULL,
  `nome` varchar(128) COLLATE utf8_bin NOT NULL,
  `data_encerramento` date NOT NULL,
  `data_encerramento_promocional` date NOT NULL,
  `valor_promocional` double(10,3) NOT NULL,
  PRIMARY KEY (`id`,`sedes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `sedes_id`, `nome`, `data_encerramento`, `data_encerramento_promocional`, `valor_promocional`) VALUES
(2, 1, 'PROJETO UTI 60 HORAS - OAB 2011.1', '2011-07-30', '0000-00-00', 140.740),
(3, 1, 'Merly Rose da Silva Martins', '2011-07-30', '2011-07-30', 140.740),
(4, 1, 'teste', '2012-12-31', '0011-12-12', 500.000),
(5, 1, 'bb', '2012-01-01', '2011-12-12', 50.000),
(8, 1, 'teste2', '2012-12-31', '2011-12-31', 750.000),
(9, 1, 'noooovo', '2011-12-31', '2011-09-01', 350.000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos_valores`
--

CREATE TABLE IF NOT EXISTS `cursos_valores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cursos_id` int(11) NOT NULL,
  `valor` double(10,3) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`cursos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `cursos_valores`
--

INSERT INTO `cursos_valores` (`id`, `cursos_id`, `valor`, `data`) VALUES
(1, 1, 500.000, '2011-06-15 15:10:42'),
(2, 2, 180.740, '2011-06-15 16:33:04'),
(3, 3, 180.740, '2011-06-15 16:42:33'),
(4, 3, 180.740, '2011-06-17 14:23:50'),
(5, 3, 180.740, '2011-09-08 14:42:49'),
(6, 4, 350.000, '2011-10-03 10:40:42'),
(7, 5, 700.000, '2011-10-03 10:44:24'),
(8, 6, 500.000, '2011-10-14 15:16:46'),
(9, 7, 1000.000, '2011-10-14 15:26:03'),
(10, 8, 1500.000, '2011-10-14 15:26:36'),
(11, 9, 800.000, '2011-10-14 16:18:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento_funcoes`
--

CREATE TABLE IF NOT EXISTS `departamento_funcoes` (
  `departamento` varchar(255) COLLATE utf8_bin NOT NULL,
  `funcao` varchar(255) COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL,
  `colaboradores_id` int(11) NOT NULL,
  PRIMARY KEY (`colaboradores_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `departamento_funcoes`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `ferias`
--

CREATE TABLE IF NOT EXISTS `ferias` (
  `data` date DEFAULT NULL,
  `duracao` date DEFAULT NULL,
  `colaboradores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `ferias`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `filhos_colaboradores`
--

CREATE TABLE IF NOT EXISTS `filhos_colaboradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colaboradores_id` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `pensao` double DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `filhos_colaboradores`
--

INSERT INTO `filhos_colaboradores` (`id`, `colaboradores_id`, `nome`, `pensao`, `data_nascimento`) VALUES
(1, 28, 'JULIA MARTINS DE SOUZA ', 0, '2006-02-27'),
(2, 28, 'VICTÓRIA REGINA MARTINS DE SOUZA', 0, '2001-02-17'),
(3, 28, 'MARIA EDUARDA MARTINS DE SOUZA', 0, '2003-12-12'),
(4, 28, '', 0, '0000-00-00'),
(5, 28, '', 0, '0000-00-00'),
(6, 28, '', 0, '0000-00-00'),
(7, 28, '', 0, '0000-00-00'),
(8, 29, 'LAUDSON L C AZEVEDO SILVA', 0, '1999-03-03'),
(9, 29, 'ARTHUR COUTINHO B LUZ', 0, '2006-04-21'),
(10, 29, 'LETICIA VICTÓRIA COUTINHO BANDEIRA', 0, '2009-09-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horas_extras`
--

CREATE TABLE IF NOT EXISTS `horas_extras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colaboradores_id` int(11) NOT NULL,
  `tipo_hora_extra_id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `pendentes` double DEFAULT NULL,
  `pagas` double DEFAULT NULL,
  PRIMARY KEY (`id`,`tipo_hora_extra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `horas_extras`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alunos_id` int(11) NOT NULL,
  `cursos_valores_id` int(11) NOT NULL,
  `situacao` int(11) NOT NULL,
  `autorizado_por` int(11) DEFAULT NULL,
  `contrato_assinado` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`,`alunos_id`,`cursos_valores_id`),
  KEY `autorizado_por_usuario` (`autorizado_por`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`id`, `alunos_id`, `cursos_valores_id`, `situacao`, `autorizado_por`, `contrato_assinado`) VALUES
(1, 1, 2, 0, NULL, '03102011161958Matricula.pdf'),
(2, 2, 2, 0, NULL, '2011-06-15'),
(3, 1, 3, 0, NULL, '03102011162537Matricula.pdf'),
(4, 1, 6, 0, NULL, '2011-10-03Matricula.pdf'),
(5, 1, 7, 0, NULL, '03102011163039Matricula.pdf'),
(6, 2, 7, 1, 1, '2011-10-03Matricula.pdf'),
(7, 2, 6, 0, NULL, ''),
(8, 2, 10, 0, NULL, ''),
(9, 1, 11, 0, NULL, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matr_paga_formas`
--

CREATE TABLE IF NOT EXISTS `matr_paga_formas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matriculas_id` int(11) NOT NULL,
  `pagamentos_formas_id` int(11) NOT NULL,
  `cheques_id` int(11) DEFAULT NULL,
  `valor` double NOT NULL,
  `caminho_arquivo` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `quantidade_parcelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`matriculas_id`,`pagamentos_formas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `matr_paga_formas`
--

INSERT INTO `matr_paga_formas` (`id`, `matriculas_id`, `pagamentos_formas_id`, `cheques_id`, `valor`, `caminho_arquivo`, `quantidade_parcelas`) VALUES
(1, 1, 6, NULL, 180, '', 0),
(2, 2, 4, NULL, 180, '', 0),
(3, 3, 6, NULL, 180, '', 0),
(4, 4, 4, NULL, 50, '', 0),
(5, 4, 3, NULL, 100, '', 1),
(6, 4, 6, NULL, 200, '', 0),
(7, 5, 4, NULL, 20, '', 0),
(8, 5, 6, NULL, 10, '', 0),
(9, 5, 3, NULL, 20, '', 12),
(10, 6, 6, NULL, 40, '', 0),
(11, 6, 5, 1, 10, '', 0),
(12, 7, 6, NULL, 350, '', 0),
(13, 8, 6, NULL, 750, '', 0),
(14, 9, 6, NULL, 800, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `link` varchar(128) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`id`, `nome`, `link`) VALUES
(1, 'Usuário', 'usuario'),
(2, 'Perfis', 'perfil'),
(3, 'Recursos Humanos', 'recursosHumanos'),
(4, 'Cursos', 'curso'),
(5, 'Alunos', 'aluno'),
(7, 'Matrículas', 'matricula'),
(8, 'Cheques', 'cheque'),
(9, 'PagSeguro', 'pagSeguro'),
(10, 'Pagamentos', 'pagamento'),
(11, 'Relatórios', 'relatorio'),
(12, 'Concursos', 'concurso'),
(13, 'Tarifas', 'tarifas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE IF NOT EXISTS `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagamentos_tipo_id` int(11) NOT NULL,
  `colaboradores_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(256) COLLATE utf8_bin NOT NULL,
  `valor` double NOT NULL,
  `anexo` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`,`pagamentos_tipo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `pagamentos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos_formas`
--

CREATE TABLE IF NOT EXISTS `pagamentos_formas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `pagamentos_formas`
--

INSERT INTO `pagamentos_formas` (`id`, `nome`) VALUES
(1, 'Bolsa de estudos'),
(2, 'Carta de crédito'),
(3, 'Cartão de crédito'),
(4, 'Cartão de débito'),
(5, 'Cheque'),
(6, 'Espécie');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos_tipo`
--

CREATE TABLE IF NOT EXISTS `pagamentos_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `pagamentos_tipo`
--

INSERT INTO `pagamentos_tipo` (`id`, `nome`) VALUES
(1, 'Salário'),
(2, 'Gratificação'),
(3, 'Aux. Transporte'),
(4, 'Aux. Alimentação'),
(5, 'Horas Extras');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

CREATE TABLE IF NOT EXISTS `perfis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sedes_id` int(11) NOT NULL,
  `nome` varchar(128) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`,`sedes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `perfis`
--

INSERT INTO `perfis` (`id`, `sedes_id`, `nome`) VALUES
(1, 1, 'Administrativo'),
(3, 1, 'Recepção'),
(4, 3, 'RIO'),
(5, 1, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salarios`
--

CREATE TABLE IF NOT EXISTS `salarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `colaboradores_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`colaboradores_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=37 ;

--
-- Extraindo dados da tabela `salarios`
--

INSERT INTO `salarios` (`id`, `data`, `valor`, `colaboradores_id`) VALUES
(1, '2011-05-25', 550, 2),
(2, '2011-05-25', 1600, 3),
(3, '2011-05-25', 550, 4),
(4, '2011-05-25', 1100, 5),
(5, '2009-09-01', 465, 5),
(6, '2010-01-01', 700, 5),
(7, '2010-04-01', 900, 5),
(8, '2010-07-01', 951, 5),
(9, '2010-09-01', 1.1, 5),
(10, '2011-05-28', 550, 6),
(11, '2011-05-28', 1400, 7),
(12, '2011-06-20', 550, 12),
(13, '2011-06-20', 1100, 13),
(14, '2011-06-20', 1100, 14),
(15, '2011-06-27', 1400, 16),
(16, '2011-06-27', 3180, 17),
(17, '2011-06-27', 1100, 18),
(18, '2011-06-27', 1400, 19),
(19, '2011-08-08', 1100, 21),
(20, '2011-08-08', 1100, 22),
(21, '2011-08-08', 550, 23),
(22, '2011-08-08', 1100, 24),
(23, '2011-08-08', 550, 25),
(24, '2011-08-08', 1400, 26),
(25, '2011-08-08', 1728, 27),
(26, '2011-09-20', 654.76, 28),
(27, '2011-09-20', 500, 29),
(28, '2011-09-20', 800, 30),
(29, '2011-09-20', 700, 31),
(30, '2011-09-20', 2500, 32),
(31, '2011-09-20', 700, 33),
(32, '2011-09-20', 700, 34),
(33, '2011-09-20', 465, 36),
(34, '2011-09-20', 0, 37),
(35, '2011-09-20', 500, 38),
(36, '2011-09-20', 500, 39);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sedes`
--

CREATE TABLE IF NOT EXISTS `sedes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) COLLATE utf8_bin NOT NULL,
  `uf` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `sedes`
--

INSERT INTO `sedes` (`id`, `nome`, `uf`) VALUES
(1, 'Recife', 'Pernambuco'),
(2, 'São Paulo', 'São Paulo'),
(3, 'Rio de Janeiro', 'Rio de Janeiro'),
(4, 'Salvador', 'Bahia'),
(5, 'Curitiba', 'Paraná');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_hora_extra`
--

CREATE TABLE IF NOT EXISTS `tipo_hora_extra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tipo_hora_extra`
--

INSERT INTO `tipo_hora_extra` (`id`, `valor`) VALUES
(1, 0.5),
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) NOT NULL,
  `login` varchar(32) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `senha` varchar(64) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `sedes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`sedes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_perfil`, `login`, `senha`, `sedes_id`) VALUES
(1, 5, 'admin', 'b6dcca3fc60643b35c679711598808cd', 1),
(6, 1, 'teste', '698dc19d489c4e4db73e28a713eab07b', 2),
(8, 1, 'fernanda', 'e10adc3949ba59abbe56e057f20f883e', 1),
(9, 3, 'merly', 'e10adc3949ba59abbe56e057f20f883e', 1),
(11, 1, 'darlly', 'f9502068b22b7bdd3deafc74f1e69748', 1),
(12, 5, 'complexo', 'f7fec90e2dd77259288095a382369ed7', 1);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `anexos`
--
ALTER TABLE `anexos`
  ADD CONSTRAINT `colaboradores_id` FOREIGN KEY (`colaboradores_id`) REFERENCES `colaboradores` (`id`);

--
-- Restrições para a tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `autorizado_por_usuario` FOREIGN KEY (`autorizado_por`) REFERENCES `usuarios` (`id`);
