-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/11/2024 às 01:33
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`) VALUES
(1, 'Eletrônico', 'Produtos eletrônicos e dispositivos'),
(2, 'Periférico', 'Acessórios e dispositivos periféricos para computadores'),
(3, 'Networking', 'Equipamentos e acessórios de rede'),
(4, 'Armazenamento', 'Dispositivos de armazenamento de dados'),
(5, 'Acessório', 'Acessórios diversos para equipamentos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `descrição` varchar(255) DEFAULT NULL,
  `gerente` varchar(100) DEFAULT NULL,
  `num_funcionario` int(11) DEFAULT 0,
  `nome_departamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`id`, `produto_id`, `quantidade`, `atualizado_em`) VALUES
(1, 1, 10, '2024-11-01 19:38:18'),
(2, 4, 10, '2024-11-01 19:38:18'),
(3, 8, 10, '2024-11-01 19:38:18'),
(4, 19, 10, '2024-11-01 19:38:18'),
(5, 20, 10, '2024-11-01 19:38:18'),
(6, 2, 10, '2024-11-01 19:38:18'),
(7, 5, 10, '2024-11-01 19:38:18'),
(8, 6, 10, '2024-11-01 19:38:18'),
(9, 15, 10, '2024-11-01 19:38:18'),
(10, 16, 10, '2024-11-01 19:38:18'),
(11, 17, 10, '2024-11-01 19:38:18'),
(12, 18, 10, '2024-11-01 19:38:18'),
(13, 3, 10, '2024-11-01 19:38:18'),
(14, 9, 10, '2024-11-01 19:38:18'),
(15, 7, 10, '2024-11-01 19:38:18'),
(16, 10, 10, '2024-11-01 19:38:18'),
(17, 11, 10, '2024-11-01 19:38:18'),
(18, 12, 10, '2024-11-01 19:38:18'),
(19, 13, 10, '2024-11-01 19:38:18'),
(20, 14, 10, '2024-11-01 19:38:18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `tempo_contrato` int(11) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `foto_usuario` blob DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` varchar(11) DEFAULT NULL,
  `atividade` enum('ativo','inativo') DEFAULT 'ativo',
  `carteira_trabalho` varchar(11) DEFAULT NULL,
  `turno` enum('matutino','noturno') NOT NULL,
  `idade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `nome`, `email`, `tempo_contrato`, `endereco`, `foto_usuario`, `salario`, `cpf`, `rg`, `atividade`, `carteira_trabalho`, `turno`, `idade`) VALUES
(1, 'Tainá Sousa da Silva', 'taina.ts.sousa@gmail.com', 12, 'Rua João Antônio Mendes Carricondo, ', NULL, 2.00, '454.852.456', '78.456.451-', 'ativo', '4569873-152', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cliente_nome` varchar(255) NOT NULL,
  `cliente_email` varchar(255) DEFAULT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) DEFAULT NULL,
  `status` enum('pendente','pago','enviado','cancelado') DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` char(11) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `email`, `senha`, `cpf`, `telefone`) VALUES
(1, 'Rayssa Geyziele Leite Pires', 'rayssaleitepires@gmail.com', '123456789@', '48369979840', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `link` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`nome`, `descricao`, `preco`, `estoque`, `imagem`) VALUES
('Notebook Dell Inspiron 15', 'Notebook de alta performance para uso geral', 3500.00, 10, 'um.png'),
('Mouse Gamer Logitech G502', 'Mouse gamer com alta precisão e customizável', 250.00, 15, 'dois.png'),
('Switch Gigabit TP-Link TL-SG105', 'Switch de rede gigabit com 5 portas', 150.00, 20, 'tres.png'),
('Monitor Samsung 27\" Curved', 'Monitor de 27 polegadas com tela curva', 1200.00, 5, 'quatro.png'),
('Teclado Mecânico Corsair K70 RGB', 'Teclado mecânico gamer com iluminação RGB', 800.00, 12, 'cinco.png'),
('Fone de Ouvido Bluetooth JBL TUNE 500BT', 'Fone de ouvido bluetooth com som de alta qualidade', 200.00, 25, 'seis.png'),
('HD Externo Seagate 1TB', 'HD externo portátil com 1TB de capacidade', 400.00, 30, 'sete.png'),
('Placa de Vídeo NVIDIA GeForce RTX 3060', 'Placa de vídeo de alta performance para jogos', 3500.00, 8, 'oito.png'),
('Roteador TP-Link Archer C6', 'Roteador wireless com suporte a dual-band', 300.00, 50, 'nove.png'),
('SSD Kingston A400 480GB', 'SSD de alto desempenho com 480GB de capacidade', 350.00, 40, 'dez.png'),
('Cabo HDMI 2.0 de 2 Metros', 'Cabo HDMI para transmissão de vídeo em alta resolução', 50.00, 100, 'onze.png'),
('Hub USB-C com 4 Portas', 'Hub USB-C com quatro portas USB 3.0', 100.00, 60, 'doze.png'),
('Carregador Universal para Notebook', 'Carregador universal para notebooks de diversas marcas', 150.00, 35, 'treze.png'),
('Suporte para Notebook Ajustável', 'Suporte ajustável para notebooks', 80.00, 80, 'quatorze.png'),
('Webcam Logitech HD C920', 'Webcam de alta definição para videoconferências', 300.00, 22, 'quinze.png'),
('Headset Gamer HyperX Cloud Stinger', 'Headset gamer com som surround e microfone acoplado', 250.00, 18, 'dezesseis.png'),
('Teclado Wireless Logitech K400', 'Teclado wireless com touchpad integrado', 200.00, 45, 'dezessete.png'),
('Caixa de Som Bluetooth JBL GO 3', 'Caixa de som portátil com Bluetooth', 150.00, 60, 'dezoito.png'),
('Impressora Multifuncional HP DeskJet 2776', 'Impressora multifuncional com Wi-Fi', 400.00, 20, 'dezenove.png'),
('Apc Back-UPS BZ600-BR 600VA', 'No-break para proteção de equipamentos eletrônicos', 500.00, 10, 'vinte.png');


-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL,
  `total_item` decimal(10,2) GENERATED ALWAYS AS (`quantidade` * `preco_unitario`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
