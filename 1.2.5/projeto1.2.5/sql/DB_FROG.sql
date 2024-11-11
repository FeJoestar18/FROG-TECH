-- TER O BANCO DE DADAOS CRIADO -- frog --

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `id_departamento` int NOT NULL AUTO_INCREMENT,
  `descrição` varchar(255) DEFAULT NULL,
  `gerente` varchar(100) DEFAULT NULL,
  `num_funcionario` int DEFAULT '0',
  `nome_departamento` varchar(100) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `departamento` (`id_departamento`, `descrição`, `gerente`, `num_funcionario`, `nome_departamento`) VALUES
(1, 'Desenvolvimento', 'Carlos Silva', 10, 'Desenvolvimento'),
(2, 'Suporte Técnico', 'Ana Pereira', 12, 'Suporte Técnico');


DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE `funcionarios` (
  `id_funcionario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `tempo_contrato` int DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `foto_usuario` blob,
  `salario` decimal(10,2) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` varchar(11) DEFAULT NULL,
  `atividade` enum('ativo','inativo') DEFAULT 'ativo',
  `carteira_trabalho` varchar(11) DEFAULT NULL,
  `turno` enum('matutino','noturno') NOT NULL,
  `idade` int DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `funcionarios` (`id_funcionario`, `nome`, `email`, `tempo_contrato`, `endereco`, `salario`, `cpf`, `rg`, `atividade`, `carteira_trabalho`, `turno`, `idade`) VALUES
(1, 'Tainá Sousa da Silva', 'taina.ts.sousa@gmail.com', 12, 'Rua João Antônio Mendes Carricondo', 2.00, '454852456', '78456451', 'ativo', '4569873152', 'matutino', 30);


DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` char(11) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pessoa` (`id`, `nome`, `email`, `senha`, `cpf`, `telefone`) VALUES
(1, 'Rayssa Geyziele Leite Pires', 'rayssaleitepires@gmail.com', '123456789@', '48369979840', NULL),
(2, 'Julia Alves Souza', 'Teste5@gmail.com', 'felipe02@', '11111111111', NULL);


DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text,
  `preco` decimal(10,2) DEFAULT NULL,
  `estoque` int DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `estoque`, `imagem`) VALUES
(28, 'Placa de Vídeo NVIDIA GeForce RTX 3060', 'Placa de vídeo de alta performance', 3500.00, 799, 'oito.png');


DROP TABLE IF EXISTS `vendas`;
CREATE TABLE `vendas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produto_id` int DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `data_venda` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
