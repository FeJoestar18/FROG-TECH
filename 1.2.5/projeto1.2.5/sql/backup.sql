-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10/11/2024 às 23:56
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
-- Banco de dados: `frog`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int NOT NULL AUTO_INCREMENT,
  `descrição` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gerente` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `num_funcionario` int DEFAULT '0',
  `nome_departamento` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `descrição`, `gerente`, `num_funcionario`, `nome_departamento`) VALUES
(1, 'Desenvolvimento', 'Responsável pelo desenvolvimento de software', 10, 'Carlos Silva'),
(2, 'Suporte Técnico', 'Atendimento e suporte a clientes', 12, 'Ana Pereira'),
(3, 'Infraestrutura e Redes', 'Gerenciamento de redes e servidores', 8, 'Roberto Costa'),
(4, 'Segurança da Informação', 'Proteção de dados e sistemas', 5, 'Fernanda Almeida'),
(5, 'Recursos Humanos', 'Gerenciamento de pessoas e benefícios', 7, 'Luciana Mendes'),
(6, 'Marketing e Vendas', 'Promoção e venda dos produtos', 15, 'Pedro Souza'),
(7, 'Financeiro', 'Gestão financeira e contabilidade', 6, 'Juliana Lima'),
(8, 'Design/UI/UX', 'Design e experiência do usuário', 4, 'Mariana Oliveira'),
(9, 'DevOps', 'Integração e entrega contínua', 9, 'André Gomes');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id_funcionario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `tempo_contrato` int DEFAULT NULL,
  `endereco` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto_usuario` blob,
  `salario` decimal(10,2) DEFAULT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rg` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `atividade` enum('ativo','inativo') COLLATE utf8mb4_general_ci DEFAULT 'ativo',
  `carteira_trabalho` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `turno` enum('matutino','noturno') COLLATE utf8mb4_general_ci NOT NULL,
  `idade` int DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `nome`, `email`, `tempo_contrato`, `endereco`, `foto_usuario`, `salario`, `cpf`, `rg`, `atividade`, `carteira_trabalho`, `turno`, `idade`) VALUES
(1, 'Tainá Sousa da Silva', 'taina.ts.sousa@gmail.com', 12, 'Rua João Antônio Mendes Carricondo, ', NULL, 2.00, '454.852.456', '78.456.451-', 'ativo', '4569873-152', '', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_id`, `total`, `status`) VALUES
(1, 1, 0.00, 'Pendente'),
(2, 1, 250.00, 'Pendente'),
(3, 1, 1000.00, 'Pendente'),
(4, 1, 1250.00, 'Pendente'),
(5, 1, 1800.00, 'Pendente'),
(6, 1, 5400.00, 'Pendente'),
(7, 1, 600.00, 'Pendente'),
(8, 1, 3000.00, 'Pendente'),
(9, 1, 1400.00, 'Pendente'),
(10, 1, 3500.00, 'Pendente'),
(11, 1, 200.00, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` char(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `email`, `senha`, `cpf`, `telefone`) VALUES
(1, 'Rayssa Geyziele Leite Pires', 'rayssaleitepires@gmail.com', '123456789@', '48369979840', NULL),
(2, 'Julia Alves Souza', 'Teste5@gmail.com', 'felipe02@', '11111111111', NULL);

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
(28, 'Placa de Vídeo NVIDIA GeForce RTX 3060', 'Placa de vídeo de alta performance para jogos', 3500.00, 799, 'oito.png'),
(27, 'HD Externo Seagate 1TB', 'HD externo portátil com 1TB de capacidade', 400.00, 300, 'sete.png'),
(26, 'Fone de Ouvido Bluetooth JBL TUNE 500BT', 'Fone de ouvido bluetooth com som de alta qualidade', 200.00, 249, 'seis.png'),
(25, 'Teclado Mecânico Corsair K70 RGB', 'Teclado mecânico gamer com iluminação RGB', 800.00, 120, 'cinco.png'),
(24, 'Monitor Samsung 27\" Curved', 'Monitor de 27 polegadas com tela curva', 1200.00, 500, 'quatro.png'),
(23, 'Switch Gigabit TP-Link TL-SG105', 'Switch de rede gigabit com 5 portas', 150.00, 200, 'tres.png'),
(22, 'Mouse Gamer Logitech G502', 'Mouse gamer com alta precisão e customizável', 250.00, 150, 'dois.png'),
(21, 'Notebook Dell Inspiron 15', 'Notebook de alta performance para uso geral', 3500.00, 100, 'um.png'),
(30, 'SSD Kingston A400 480GB', 'SSD de alto desempenho com 480GB de capacidade', 350.00, 400, 'dez.png'),
(29, 'Roteador TP-Link Archer C6', 'Roteador wireless com suporte a dual-band', 300.00, 500, 'nove.png'),
(31, 'Cabo HDMI 2.0 de 2 Metros', 'Cabo HDMI para transmissão de vídeo em alta resolução', 50.00, 100, 'onze.png'),
(32, 'Hub USB-C com 4 Portas', 'Hub USB-C com quatro portas USB 3.0', 100.00, 600, 'doze.png'),
(33, 'Carregador Universal para Notebook', 'Carregador universal para notebooks de diversas marcas', 150.00, 350, 'treze.png'),
(34, 'Suporte para Notebook Ajustável', 'Suporte ajustável para notebooks', 80.00, 800, 'quatorze.png'),
(35, 'Webcam Logitech HD C920', 'Webcam de alta definição para videoconferências', 300.00, 220, 'quinze.png'),
(36, 'Headset Gamer HyperX Cloud Stinger', 'Headset gamer com som surround e microfone acoplado', 250.00, 180, 'dezeseis.png'),
(37, 'Teclado Wireless Logitech K400', 'Teclado wireless com touchpad integrado', 200.00, 450, 'dezesete.png'),
(38, 'Caixa de Som Bluetooth JBL GO 3', 'Caixa de som portátil com Bluetooth', 150.00, 600, 'dezoito.png'),
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `produto_id`, `quantidade`, `data_venda`) VALUES
(1, 3, 6, '2024-11-09 14:17:19'),
(2, 6, 6, '2024-11-09 14:20:22'),
(3, 3, 2, '2024-11-09 14:36:37'),
(4, 5, 2, '2024-11-09 14:43:28'),
(5, 4, 2, '2024-11-09 14:47:02'),
(6, 1, 3, '2024-11-09 14:50:20'),
(7, 28, 1, '2024-11-10 20:01:46'),
(8, 26, 1, '2024-11-10 20:03:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
