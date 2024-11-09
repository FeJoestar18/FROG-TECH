-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09/11/2024 às 17:22
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
-- Banco de dados: `teste`
--

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_id`, `total`, `status`) VALUES
(1, 1, 0.00, 'Pendente'),
(2, 1, 250.00, 'Pendente'),
(3, 1, 1000.00, 'Pendente'),
(4, 1, 1250.00, 'Pendente'),
(5, 1, 1800.00, 'Pendente'),
(6, 1, 5400.00, 'Pendente');

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `estoque`, `imagem`) VALUES
(1, 'Teclado Mecânico', 'Teclado mecânico RGB', 250.00, 10, 'teclado.jpg'),
(2, 'Mouse Gamer', 'Mouse gamer com DPI ajustável', 120.00, 15, 'mouse.jpg'),
(3, 'Gabinete ATX', 'Gabinete ATX com vidro temperado', 300.00, 2, 'gabinete.jpg'),
(4, 'Monitor 24\"', 'Monitor Full HD 24 polegadas', 700.00, 5, 'monitor.jpg'),
(5, 'Placa de Vídeo', 'Placa de vídeo NVIDIA GTX 1650', 1500.00, 4, 'gpu.jpg'),
(6, 'Processador i5', 'Processador Intel Core i5', 900.00, 0, 'cpu.jpg'),
(7, 'Memória RAM 8GB', 'Memória RAM DDR4 8GB', 300.00, 12, 'ram.jpg'),
(8, 'SSD 256GB', 'SSD Kingston 256GB', 280.00, 9, 'ssd.jpg'),
(9, 'Fonte 500W', 'Fonte ATX 500W', 200.00, 7, 'fonte.jpg'),
(10, 'Headset Gamer', 'Headset com microfone', 180.00, 10, 'headset.jpg'),
(11, 'Placa Mãe', 'Placa mãe ATX para Intel', 500.00, 6, 'placa_mae.jpg'),
(12, 'Cooler para CPU', 'Cooler com LED', 90.00, 20, 'cooler.jpg'),
(13, 'Ventoinha RGB', 'Ventoinha RGB 120mm', 40.00, 25, 'ventoinha.jpg'),
(14, 'Hub USB', 'Hub USB 3.0 com 4 portas', 60.00, 15, 'hub.jpg'),
(15, 'Cabo HDMI', 'Cabo HDMI 2 metros', 20.00, 30, 'hdmi.jpg'),
(16, 'raissa', 'RAYSSA', 1000.00, 1000, 'die lit carti.jpg'),
(17, 'raissa', 'RAYSSA', 1000.00, 1000, 'die_lit_carti.jpg'),
(18, 'raissa', 'RAYSSA', 1000.00, 1000, 'die_lit_carti.jpg'),
(19, 'raissa', 'RAYSSA', 1000.00, 1000, 'die_lit_carti.jpg'),
(20, 'produto 5', 'produto 5', 1000.00, 100, 'die_lit_carti.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `produto_id`, `quantidade`, `data_venda`) VALUES
(1, 3, 6, '2024-11-09 14:17:19'),
(2, 6, 6, '2024-11-09 14:20:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
