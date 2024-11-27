-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27/11/2024 às 13:45
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `frog teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `departamentos`
--

INSERT INTO `departamentos` (`id`, `nome`, `descricao`, `data_criacao`) VALUES
(3, 'Vendas', 'Responsável por realizar as vendas dos produtos, tanto online quanto presenciais.', '2024-11-13 18:57:46'),
(4, 'Marketing', 'Responsável por criar campanhas publicitárias, estratégias de marketing digital e branding.', '2024-11-13 18:57:46'),
(5, 'Suporte ao Cliente', 'Responsável por oferecer suporte aos clientes, respondendo dúvidas e solucionando problemas relacionados aos produtos.', '2024-11-13 18:57:46'),
(6, 'Logística', 'Cuida do estoque, envio e recebimento de produtos, além da organização da distribuição.', '2024-11-13 18:57:46'),
(7, 'Compras', 'Responsável por adquirir novos produtos e negociar com fornecedores.', '2024-11-13 18:57:46'),
(8, 'Financeiro', 'Cuida da gestão financeira da empresa, incluindo contas a pagar e a receber, orçamentos e investimentos.', '2024-11-13 18:57:46'),
(9, 'Recursos Humanos (RH)', 'Responsável pelo recrutamento, treinamento, desenvolvimento e gestão de pessoal.', '2024-11-13 18:57:46'),
(10, 'TI (Tecnologia da Informação)', 'Responsável pela infraestrutura tecnológica da empresa, incluindo sistemas, servidores e manutenção de redes.', '2024-11-13 18:57:46'),
(11, 'Desenvolvimento de Produto', 'Equipe dedicada à pesquisa e desenvolvimento de novos produtos ou melhorias nos produtos existentes.', '2024-11-13 18:57:46'),
(12, 'Gestão de Qualidade', 'Responsável por garantir que os produtos atendam aos padrões de qualidade e sejam compatíveis com os requisitos de segurança.', '2024-11-13 18:57:46'),
(13, 'Jurídico', 'Cuida dos assuntos legais da empresa, contratos, direitos autorais e compliance.', '2024-11-13 18:57:46'),
(14, 'Atendimento ao Cliente (Call Center)', 'Focado em resolver problemas de clientes e realizar atendimento telefônico.', '2024-11-13 18:57:46'),
(15, 'Design e UX (Experiência do Usuário)', 'Equipe de design responsável pela experiência do cliente no site, embalagens e interação com os produtos.', '2024-11-13 18:57:46'),
(16, 'Pesquisa de Mercado', 'Responsável por coletar e analisar dados de mercado, tendências de consumo e comportamento do cliente.', '2024-11-13 18:57:46'),
(17, 'Administração', 'Responsável pelas atividades administrativas gerais, como gestão de agenda, organização de documentos e suporte à alta direção da empresa.', '2024-11-13 18:57:46');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id_funcionario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tempo_contrato` int DEFAULT NULL,
  `endereco` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `cpf` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rg` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `atividade` enum('ativo','inativo') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'ativo',
  `carteira_trabalho` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `turno` enum('matutino','noturno') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idade` int DEFAULT NULL,
  `unidade_tempo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `departamento_id` int DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `nome`, `email`, `tempo_contrato`, `endereco`, `salario`, `cpf`, `rg`, `atividade`, `carteira_trabalho`, `turno`, `idade`, `unidade_tempo`, `departamento_id`) VALUES
(7, 'Gisele Ramos', 'gisele.ramos@example.com', 5, 'Rua G, 145', 4800.00, '55566677788', 'MG5556667', 'ativo', '789012', 'matutino', 38, 'anos', 9),
(8, 'Henrique Dias', 'henrique.dias@example.com', 2, 'Rua H, 157', 6200.00, '12312312312', 'SP1231231', 'ativo', '890123', 'noturno', 30, 'anos', 10),
(9, 'Isabela Moreira', 'isabela.moreira@example.com', 1, 'Rua I, 165', 3700.00, '23423423423', 'RJ2342342', 'ativo', '901234', 'matutino', 27, 'anos', 11),
(10, 'João Silva', 'joao.silva@example.com', 3, 'Rua J, 171', 4200.00, '34534534534', 'MG3453453', 'ativo', '012345', 'matutino', 33, 'anos', 12),
(11, 'Karina Santos', 'karina.santos@example.com', 2, 'Rua K, 180', 5000.00, '45645645645', 'SP4564564', 'ativo', '123456', 'matutino', 40, 'anos', 13),
(12, 'Leonardo Pires', 'leonardo.pires@example.com', 3, 'Rua L, 190', 2600.00, '56756756756', 'RJ5675675', 'ativo', '234567', 'matutino', 24, 'anos', 14),
(13, 'Mariana Castro', 'mariana.castro@example.com', 2, 'Rua M, 200', 4400.00, '67867867867', 'MG6786786', 'ativo', '345678', 'noturno', 28, 'anos', 15),
(14, 'Nicolas Fernandes', 'nicolas.fernandes@example.com', 4, 'Rua N, 210', 5100.00, '78978978978', 'SP7897897', 'ativo', '456789', 'noturno', 36, 'anos', 16),
(15, 'Olivia Correia', 'olivia.correia@example.com', 1, 'Rua O, 220', 3500.00, '89089089089', 'RJ8908908', 'ativo', '567890', 'noturno', 26, 'anos', 17),
(16, 'Pedro Azevedo', 'pedro.azevedo@example.com', 2, 'Rua P, 230', 4700.00, '11111111111', 'MG1111111', 'ativo', '678901', 'matutino', 31, 'anos', 3),
(20, 'Victor Mendes', 'victor.mendes@example.com', 1, 'Rua T, 270', 4500.00, '55555555555', 'SP5555555', 'ativo', '012345', 'noturno', 29, 'anos', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_id`, `total`, `status`) VALUES
(1, 101, 450.00, 'Pendente'),
(2, 102, 150.50, 'Pago');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` char(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cep` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cidade` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pais` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ponto_referencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `email`, `senha`, `cpf`, `telefone`, `cep`, `endereco`, `cidade`, `pais`, `ponto_referencia`) VALUES
(146, 'teste 25 nov sp', 'teste25novsp@mail.com', 'teste@123', '889.712.330-95', '(13) 3702-7749', '64012618', 'Quadra E1', 'Teresina', 'Brasil', 'TESTE-25-NOV-SP'),
(147, 'Teste 25 nov sp 2', 'teste25novsp2@mail.com', 'teste@123', '738.851.928-96', '(16) 2676-1793', '04171005', 'Travessa Bodocó', 'São Paulo', 'Brasil', 'TESTE-25-NOV-SP-2'),
(148, 'Teste 25 nov sp 3', 'teste25novsp3@mail.com', 'teste@123', '123.456.789-00', '(11) 3456-7890', '12345678', 'Rua Exemplo', 'São Paulo', 'Brasil', 'EXEMPLO-25-NOV-SP-3'),
(149, 'Teste 25 nov sp 4', 'teste25novsp4@mail.com', 'teste@123', '987.654.321-00', '(21) 4002-8922', '23456789', 'Av. Brasil', 'Rio de Janeiro', 'Brasil', 'EXEMPLO-25-NOV-SP-4'),
(150, 'Teste 25 nov sp 5', 'teste25novsp5@mail.com', 'teste@123', '111.222.333-44', '(31) 3221-4567', '34567890', 'Rua das Flores', 'Belo Horizonte', 'Brasil', 'EXEMPLO-25-NOV-SP-5'),
(151, 'Teste 25 nov sp 6', 'teste25novsp6@mail.com', 'teste@123', '223.344.556-77', '(21) 3221-1234', '45678901', 'Rua da Liberdade', 'Rio de Janeiro', 'Brasil', 'EXEMPLO-25-NOV-SP-6'),
(152, 'Teste 25 nov sp 7', 'teste25novsp7@mail.com', 'teste@123', '334.455.667-88', '(85) 3311-2233', '56789012', 'Rua Sol', 'Fortaleza', 'Brasil', 'EXEMPLO-25-NOV-SP-7'),
(153, 'Teste 25 nov sp 8', 'teste25novsp8@mail.com', 'teste@123', '445.566.778-97', '(11) 4567-8901', '67890123', 'Rua do Comércio', 'São Paulo', 'Brasil', 'EXEMPLO-25-NOV-SP-8'),
(154, 'Teste 25 nov sp 9', 'teste25novsp9@mail.com', 'teste@123', '556.677.889-00', '(41) 3321-4444', '78901234', 'Av. Afonso Pena', 'Curitiba', 'Brasil', 'EXEMPLO-25-NOV-SP-9'),
(155, 'Teste 25 nov sp 10', 'teste25novsp10@mail.com', 'teste@123', '667.788.990-11', '(62) 3221-5566', '89012345', 'Rua Paraná', 'Goiânia', 'Brasil', 'EXEMPLO-25-NOV-SP-10'),
(156, 'Teste 25 nov sp 11', 'teste25novsp11@mail.com', 'teste@123', '778.899.001-22', '(21) 3102-6677', '90123456', 'Rua São José', 'Rio de Janeiro', 'Brasil', 'EXEMPLO-25-NOV-SP-11'),
(157, 'Teste 25 nov sp 12', 'teste25novsp12@mail.com', 'teste@123', '889.910.112-33', '(62) 3333-7788', '01234567', 'Avenida Paulista', 'São Paulo', 'Brasil', 'EXEMPLO-25-NOV-SP-12'),
(158, 'Teste 25 nov sp 13', 'teste25novsp13@mail.com', 'teste@123', '990.101.223-44', '(11) 3222-8899', '12345678', 'Rua da Paz', 'São Paulo', 'Brasil', 'EXEMPLO-25-NOV-SP-13'),
(159, 'Teste 25 nov sp 14', 'teste25novsp14@mail.com', 'teste@123', '101.112.233-55', '(11) 4455-6677', '23456789', 'Rua do Sol', 'São Paulo', 'Brasil', 'EXEMPLO-25-NOV-SP-14'),
(160, 'Teste 25 nov sp 15', 'teste25novsp15@mail.com', 'teste@123', '112.233.344-66', '(21) 3111-2233', '34567890', 'Rua Central', 'Rio de Janeiro', 'Brasil', 'EXEMPLO-25-NOV-SP-15'),
(161, 'Teste 25 nov sp 16', 'teste25novsp16@mail.com', 'teste@123', '223.344.455-77', '(31) 4111-3344', '45678901', 'Rua das Palmeiras', 'Belo Horizonte', 'Brasil', 'EXEMPLO-25-NOV-SP-16'),
(162, 'Teste 25 nov sp 17', 'teste25novsp17@mail.com', 'teste@123', '334.455.566-88', '(62) 3211-4455', '56789012', 'Rua Santa Catarina', 'Goiânia', 'Brasil', 'EXEMPLO-25-NOV-SP-17'),
(163, 'Teste 25 nov sp 18', 'teste25novsp18@mail.com', 'teste@123', '445.566.677-99', '(21) 3222-5566', '67890123', 'Av. Rio Branco', 'Rio de Janeiro', 'Brasil', 'EXEMPLO-25-NOV-SP-18'),
(164, 'Teste 25 nov sp 19', 'teste25novsp19@mail.com', 'teste@123', '556.677.788-00', '(11) 3333-6677', '78901234', 'Rua do Imperador', 'São Paulo', 'Brasil', 'EXEMPLO-25-NOV-SP-19'),
(165, 'Teste 25 nov sp 20', 'teste25novsp20@mail.com', 'teste@123', '667.788.899-11', '(41) 4444-7788', '89012345', 'Rua da Liberdade', 'Curitiba', 'Brasil', 'EXEMPLO-25-NOV-SP-20'),
(166, 'teste 25 nov sp', 'teste25novsp21@mail.com', 'teste@123', '888.712.330-95', '(13) 3702-7749', '64012618', 'Quadra E1', 'Teresina', 'Brasil', 'TESTE-25-NOV-SP'),
(167, 'Teste 25 nov sp 2', 'teste25novsp22@mail.com', 'teste@123', '737.851.928-96', '(16) 2676-1793', '04171005', 'Travessa Bodocó', 'São Paulo', 'Brasil', 'TESTE-25-NOV-SP-2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text,
  `preco` decimal(10,2) DEFAULT NULL,
  `estoque` int DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `estoque`, `imagem`) VALUES
(28, 'Placa de Vídeo NVIDIA GeForce RTX 3060', 'Placa de vídeo de alta performance para jogos', 3500.00, 778, 'oito.png'),
(27, 'HD Externo Seagate 1TB', 'HD externo portátil com 1TB de capacidade', 400.00, 290, 'sete.png'),
(26, 'Fone de Ouvido Bluetooth JBL TUNE 500BT', 'Fone de ouvido bluetooth com som de alta qualidade', 200.00, 247, 'seis.png'),
(25, 'Teclado Mecânico Corsair K70 RGB', 'Teclado mecânico gamer com iluminação RGB', 800.00, 105, 'cinco.png'),
(24, 'Monitor Samsung 27\" Curved', 'Monitor de 27 polegadas com tela curva', 1200.00, 487, 'quatro.png'),
(23, 'Switch Gigabit TP-Link TL-SG105', 'Switch de rede gigabit com 5 portas', 150.00, 1000, 'tres.png'),
(22, 'Mouse Gamer Logitech G502', 'Mouse gamer com alta precisão e customizável', 250.00, 150, 'dois.png'),
(21, 'Notebook Dell Inspiron 15', 'Notebook de alta performance para uso geral', 3500.00, 100, 'um.png'),
(30, 'SSD Kingston A400 480GB', 'SSD de alto desempenho com 480GB de capacidade', 350.00, 400, 'dez.png'),
(29, 'Roteador TP-Link Archer C6', 'Roteador wireless com suporte a dual-band', 300.00, 400, 'nove.png'),
(31, 'Cabo HDMI 2.0 de 2 Metros', 'Cabo HDMI para transmissão de vídeo em alta resolução', 50.00, 100, 'onze.png'),
(32, 'Hub USB-C com 4 Portas', 'Hub USB-C com quatro portas USB 3.0', 100.00, 600, 'doze.png'),
(33, 'Carregador Universal para Notebook', 'Carregador universal para notebooks de diversas marcas', 150.00, 350, 'treze.png'),
(34, 'Suporte para Notebook Ajustável', 'Suporte ajustável para notebooks', 80.00, 800, 'quatorze.png'),
(35, 'Webcam Logitech HD C920', 'Webcam de alta definição para videoconferências', 300.00, 220, 'quinze.png'),
(36, 'Headset Gamer HyperX Cloud Stinger', 'Headset gamer com som surround e microfone acoplado', 250.00, 180, 'dezeseis.png'),
(37, 'Teclado Wireless Logitech K400', 'Teclado wireless com touchpad integrado', 200.00, 450, 'dezesete.png'),
(38, 'Caixa de Som Bluetooth JBL GO 3', 'Caixa de som portátil com Bluetooth', 150.00, 598, 'dezoito.png'),
(39, 'Impressora Multifuncional HP DeskJet 2776', 'Impressora multifuncional com Wi-Fi', 400.00, 200, 'dezenove.png'),
(40, 'Apc Back-UPS BZ600-BR 600VA', 'No-break para proteção de equipamentos eletrônicos', 500.00, 100, 'vinte.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produto_id` int DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `data_venda` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `produto_id` (`produto_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `produto_id`, `quantidade`, `data_venda`) VALUES
(28, 25, 1, '2024-11-25 11:50:42'),
(27, 28, 1, '2024-11-22 13:22:21'),
(26, 23, 195, '2024-11-22 13:20:32'),
(25, 28, 10, '2024-11-22 13:18:10'),
(24, 24, 1, '2024-11-22 13:17:45'),
(23, 24, 1, '2024-11-22 13:17:10'),
(22, 28, 10, '2024-11-22 13:17:10'),
(21, 25, 1, '2024-11-22 13:17:10'),
(20, 29, 100, '2024-11-15 15:25:50'),
(19, 25, 11, '2024-11-14 10:30:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
