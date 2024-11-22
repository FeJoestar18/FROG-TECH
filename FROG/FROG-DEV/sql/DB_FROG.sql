
-- Banco de dados: `frog`

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
(3, 'Vendas', 'Responsável por realizar as vendas dos produtos, tanto online quanto presenciais.', '2024-11-13 15:57:46'),
(4, 'Marketing', 'Responsável por criar campanhas publicitárias, estratégias de marketing digital e branding.', '2024-11-13 15:57:46'),
(5, 'Suporte ao Cliente', 'Responsável por oferecer suporte aos clientes, respondendo dúvidas e solucionando problemas relacionados aos produtos.', '2024-11-13 15:57:46'),
(6, 'Logística', 'Cuida do estoque, envio e recebimento de produtos, além da organização da distribuição.', '2024-11-13 15:57:46'),
(7, 'Compras', 'Responsável por adquirir novos produtos e negociar com fornecedores.', '2024-11-13 15:57:46'),
(8, 'Financeiro', 'Cuida da gestão financeira da empresa, incluindo contas a pagar e a receber, orçamentos e investimentos.', '2024-11-13 15:57:46'),
(9, 'Recursos Humanos (RH)', 'Responsável pelo recrutamento, treinamento, desenvolvimento e gestão de pessoal.', '2024-11-13 15:57:46'),
(10, 'TI (Tecnologia da Informação)', 'Responsável pela infraestrutura tecnológica da empresa, incluindo sistemas, servidores e manutenção de redes.', '2024-11-13 15:57:46'),
(11, 'Desenvolvimento de Produto', 'Equipe dedicada à pesquisa e desenvolvimento de novos produtos ou melhorias nos produtos existentes.', '2024-11-13 15:57:46'),
(12, 'Gestão de Qualidade', 'Responsável por garantir que os produtos atendam aos padrões de qualidade e sejam compatíveis com os requisitos de segurança.', '2024-11-13 15:57:46'),
(13, 'Jurídico', 'Cuida dos assuntos legais da empresa, contratos, direitos autorais e compliance.', '2024-11-13 15:57:46'),
(14, 'Atendimento ao Cliente (Call Center)', 'Focado em resolver problemas de clientes e realizar atendimento telefônico.', '2024-11-13 15:57:46'),
(15, 'Design e UX (Experiência do Usuário)', 'Equipe de design responsável pela experiência do cliente no site, embalagens e interação com os produtos.', '2024-11-13 15:57:46'),
(16, 'Pesquisa de Mercado', 'Responsável por coletar e analisar dados de mercado, tendências de consumo e comportamento do cliente.', '2024-11-13 15:57:46'),
(17, 'Administração', 'Responsável pelas atividades administrativas gerais, como gestão de agenda, organização de documentos e suporte à alta direção da empresa.', '2024-11-13 15:57:46');

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
  `salario` decimal(10,2) DEFAULT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rg` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `atividade` enum('ativo','inativo') COLLATE utf8mb4_general_ci DEFAULT 'ativo',
  `carteira_trabalho` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `turno` enum('matutino','noturno') COLLATE utf8mb4_general_ci NOT NULL,
  `idade` int DEFAULT NULL,
  `unidade_tempo` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_id`, `total`, `status`) VALUES
(54, 1, 0.00, 'Pendente'),
(53, 1, 0.00, 'Pendente'),
(52, 1, 0.00, 'Pendente'),
(51, 1, 0.00, 'Pendente'),
(50, 1, 0.00, 'Pendente'),
(49, 1, 0.00, 'Pendente'),
(48, 1, 0.00, 'Pendente'),
(47, 1, 0.00, 'Pendente'),
(46, 1, 0.00, 'Pendente'),
(45, 1, 0.00, 'Pendente'),
(44, 1, 0.00, 'Pendente'),
(43, 1, 0.00, 'Pendente'),
(42, 1, 0.00, 'Pendente'),
(41, 1, 0.00, 'Pendente'),
(40, 1, 0.00, 'Pendente'),
(39, 1, 0.00, 'Pendente'),
(38, 1, 0.00, 'Pendente'),
(37, 1, 0.00, 'Pendente'),
(36, 1, 0.00, 'Pendente'),
(35, 1, 0.00, 'Pendente'),
(34, 1, 0.00, 'Pendente'),
(33, 1, 0.00, 'Pendente'),
(32, 1, 0.00, 'Pendente'),
(31, 1, 0.00, 'Pendente'),
(30, 1, 0.00, 'Pendente'),
(29, 1, 0.00, 'Pendente'),
(28, 1, 37000.00, 'Pendente'),
(55, 1, 0.00, 'Pendente'),
(56, 1, 0.00, 'Pendente'),
(57, 1, 0.00, 'Pendente'),
(58, 1, 0.00, 'Pendente'),
(59, 1, 0.00, 'Pendente'),
(60, 1, 0.00, 'Pendente'),
(61, 1, 0.00, 'Pendente'),
(62, 1, 0.00, 'Pendente'),
(63, 1, 0.00, 'Pendente'),
(64, 1, 0.00, 'Pendente'),
(65, 1, 0.00, 'Pendente'),
(66, 1, 0.00, 'Pendente'),
(67, 1, 0.00, 'Pendente'),
(68, 1, 0.00, 'Pendente'),
(69, 1, 0.00, 'Pendente'),
(70, 1, 0.00, 'Pendente'),
(71, 1, 0.00, 'Pendente'),
(72, 1, 0.00, 'Pendente'),
(73, 1, 0.00, 'Pendente'),
(74, 1, 0.00, 'Pendente'),
(75, 1, 0.00, 'Pendente'),
(76, 1, 0.00, 'Pendente'),
(77, 1, 0.00, 'Pendente'),
(78, 1, 0.00, 'Pendente'),
(79, 1, 0.00, 'Pendente'),
(80, 1, 0.00, 'Pendente'),
(81, 1, 0.00, 'Pendente'),
(82, 1, 0.00, 'Pendente'),
(83, 1, 0.00, 'Pendente'),
(84, 1, 0.00, 'Pendente'),
(85, 1, 0.00, 'Pendente'),
(86, 1, 0.00, 'Pendente'),
(87, 1, 0.00, 'Pendente'),
(88, 1, 0.00, 'Pendente'),
(89, 1, 0.00, 'Pendente'),
(90, 1, 0.00, 'Pendente'),
(91, 1, 0.00, 'Pendente'),
(92, 1, 0.00, 'Pendente'),
(93, 1, 0.00, 'Pendente'),
(94, 1, 0.00, 'Pendente'),
(95, 1, 0.00, 'Pendente'),
(96, 1, 0.00, 'Pendente'),
(97, 1, 0.00, 'Pendente'),
(98, 1, 0.00, 'Pendente'),
(99, 1, 0.00, 'Pendente'),
(100, 1, 0.00, 'Pendente'),
(101, 1, 0.00, 'Pendente'),
(102, 1, 0.00, 'Pendente'),
(103, 1, 0.00, 'Pendente'),
(104, 1, 0.00, 'Pendente'),
(105, 1, 0.00, 'Pendente'),
(106, 1, 0.00, 'Pendente'),
(107, 1, 0.00, 'Pendente'),
(108, 1, 0.00, 'Pendente'),
(109, 1, 0.00, 'Pendente'),
(110, 1, 0.00, 'Pendente'),
(111, 1, 0.00, 'Pendente'),
(112, 1, 0.00, 'Pendente'),
(113, 1, 0.00, 'Pendente'),
(114, 1, 0.00, 'Pendente'),
(115, 1, 0.00, 'Pendente'),
(116, 1, 0.00, 'Pendente'),
(117, 1, 0.00, 'Pendente'),
(118, 1, 0.00, 'Pendente'),
(119, 1, 0.00, 'Pendente'),
(120, 1, 0.00, 'Pendente'),
(121, 1, 0.00, 'Pendente'),
(122, 1, 0.00, 'Pendente'),
(123, 1, 0.00, 'Pendente'),
(124, 1, 0.00, 'Pendente'),
(125, 1, 0.00, 'Pendente'),
(126, 1, 0.00, 'Pendente'),
(127, 1, 0.00, 'Pendente'),
(128, 1, 0.00, 'Pendente'),
(129, 1, 0.00, 'Pendente'),
(130, 1, 0.00, 'Pendente'),
(131, 1, 0.00, 'Pendente'),
(132, 1, 0.00, 'Pendente'),
(133, 1, 0.00, 'Pendente'),
(134, 1, 0.00, 'Pendente'),
(135, 1, 0.00, 'Pendente'),
(136, 1, 0.00, 'Pendente'),
(137, 1, 0.00, 'Pendente'),
(138, 1, 0.00, 'Pendente'),
(139, 1, 0.00, 'Pendente'),
(140, 1, 0.00, 'Pendente'),
(141, 1, 0.00, 'Pendente'),
(142, 1, 0.00, 'Pendente'),
(143, 1, 0.00, 'Pendente'),
(144, 1, 0.00, 'Pendente'),
(145, 1, 0.00, 'Pendente'),
(146, 1, 0.00, 'Pendente'),
(147, 1, 0.00, 'Pendente'),
(148, 1, 1200.00, 'Pendente'),
(149, 1, 35000.00, 'Pendente'),
(150, 1, 29250.00, 'Pendente'),
(151, 1, 3500.00, 'Pendente');

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
  `cep` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ponto_referencia` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `email`, `senha`, `cpf`, `telefone`, `cep`, `endereco`, `cidade`, `pais`, `ponto_referencia`) VALUES
(6, 'Camila Alessandra Valentina Galvão', 'camilaalessandragalvao@comercialmendes.net', '@123ixkwcCdAoH', '02102102132', '66666666666', '07807270', 'Rua Rio Branco', 'Franco da Rocha', 'Brasil', 'TESTE'),
(8, 'Enrico Henrique Kaique da Costa', 'enrico_dacosta@hotmail.com', '@feCyYCJyOh89', '30301498932', NULL, '07807270', 'Rua Rio Branco', 'Franco da Rocha', 'Brasil', 'TESTE'),
(9, 'Emilly Rosângela Caldeira', 'emilly.rosangela.caldeira@publiconsult.com.br', '@12mDJphdurQA', '48639512532', '99999999998', '07807270', 'Rua Rio Branco', 'Franco da Rocha', 'Brasil', 'Casa do Caralho');

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
(25, 'Teclado Mecânico Corsair K70 RGB', 'Teclado mecânico gamer com iluminação RGB', 800.00, 106, 'cinco.png'),
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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `produto_id`, `quantidade`, `data_venda`) VALUES
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

