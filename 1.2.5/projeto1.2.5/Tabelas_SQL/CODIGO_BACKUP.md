CREATE TABLE categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `descrição` varchar(255) DEFAULT NULL,
  `gerente` varchar(100) DEFAULT NULL,
  `num_funcionario` int(11) DEFAULT 0,
  `nome_departamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



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


ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);


ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

CREATE TABLE estoque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto_id INT,
    quantidade INT NOT NULL,
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




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



INSERT INTO `funcionarios` (`id_funcionario`, `nome`, `email`, `tempo_contrato`, `endereco`, `foto_usuario`, `salario`, `cpf`, `rg`, `atividade`, `carteira_trabalho`, `turno`, `idade`) VALUES
(1, 'Tainá Sousa da Silva', 'taina.ts.sousa@gmail.com', 12, 'Rua João Antônio Mendes Carricondo, ', NULL, 2.00, '454.852.456', '78.456.451-', 'ativo', '4569873-152', '', NULL);



ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);



ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;


CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_nome VARCHAR(255) NOT NULL,
    cliente_email VARCHAR(255),
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2),
    status ENUM('pendente', 'pago', 'enviado', 'cancelado') DEFAULT 'pendente'
);

CREATE TABLE pessoa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf CHAR(11) UNIQUE,
    telefone VARCHAR(15)
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    categoria_id INT,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categoria(id)
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    categoria_id INT,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categoria(id)
);

CREATE TABLE vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT,
    produto_id INT,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10, 2),
    total_item DECIMAL(10, 2) AS (quantidade * preco_unitario) STORED,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);

-- Inserindo dados na tabela 'categoria'
INSERT INTO categoria (nome, descricao) VALUES
('Eletrônico', 'Produtos eletrônicos e dispositivos'),
('Periférico', 'Acessórios e dispositivos periféricos para computadores'),
('Networking', 'Equipamentos e acessórios de rede'),
('Armazenamento', 'Dispositivos de armazenamento de dados'),
('Acessório', 'Acessórios diversos para equipamentos');

-- Inserindo dados na tabela 'produtos' com referência à categoria
INSERT INTO produtos (nome, descricao, preco, categoria_id) VALUES
('Notebook Dell Inspiron 15', 'Notebook de alta performance para uso geral', 3500.00, 1),
('Mouse Gamer Logitech G502', 'Mouse gamer com alta precisão e customizável', 250.00, 2),
('Switch Gigabit TP-Link TL-SG105', 'Switch de rede gigabit com 5 portas', 150.00, 3),
('Monitor Samsung 27" Curved', 'Monitor de 27 polegadas com tela curva', 1200.00, 1),
('Teclado Mecânico Corsair K70 RGB', 'Teclado mecânico gamer com iluminação RGB', 800.00, 2),
('Fone de Ouvido Bluetooth JBL TUNE 500BT', 'Fone de ouvido bluetooth com som de alta qualidade', 200.00, 2),
('HD Externo Seagate 1TB', 'HD externo portátil com 1TB de capacidade', 400.00, 4),
('Placa de Vídeo NVIDIA GeForce RTX 3060', 'Placa de vídeo de alta performance para jogos', 3500.00, 1),
('Roteador TP-Link Archer C6', 'Roteador wireless com suporte a dual-band', 300.00, 3),
('SSD Kingston A400 480GB', 'SSD de alto desempenho com 480GB de capacidade', 350.00, 4),
('Cabo HDMI 2.0 de 2 Metros', 'Cabo HDMI para transmissão de vídeo em alta resolução', 50.00, 5),
('Hub USB-C com 4 Portas', 'Hub USB-C com quatro portas USB 3.0', 100.00, 5),
('Carregador Universal para Notebook', 'Carregador universal para notebooks de diversas marcas', 150.00, 5),
('Suporte para Notebook Ajustável', 'Suporte ajustável para notebooks', 80.00, 5),
('Webcam Logitech HD C920', 'Webcam de alta definição para videoconferências', 300.00, 2),
('Headset Gamer HyperX Cloud Stinger', 'Headset gamer com som surround e microfone acoplado', 250.00, 2),
('Teclado Wireless Logitech K400', 'Teclado wireless com touchpad integrado', 200.00, 2),
('Caixa de Som Bluetooth JBL GO 3', 'Caixa de som portátil com Bluetooth', 150.00, 2),
('Impressora Multifuncional HP DeskJet 2776', 'Impressora multifuncional com Wi-Fi', 400.00, 1),
('Apc Back-UPS BZ600-BR 600VA', 'No-break para proteção de equipamentos eletrônicos', 500.00, 1);

-- Inserindo dados na tabela 'estoque' ligados aos produtos
INSERT INTO estoque (produto_id, quantidade) VALUES
(1, 10),
(2, 30),
(3, 20),
(4, 15),
(5, 25),
(6, 40),
(7, 50),
(8, 5),
(9, 10),
(10, 20),
(11, 100),
(12, 50),
(13, 30),
(14, 40),
(15, 25),
(16, 30),
(17, 50),
(18, 60),
(19, 20),
(20, 15);

-- Exemplo de inserção de um pedido
INSERT INTO pedidos (cliente_nome, cliente_email, total, status)
VALUES ('João Silva', 'joao@gmail.com', 7000.00, 'pago');

-- Exemplo de inserção de uma venda para o pedido
INSERT INTO vendas (pedido_id, produto_id, quantidade, preco_unitario)
VALUES (1, 1, 2, 3500.00);

-- Atualizar o estoque após a venda
UPDATE estoque
SET quantidade = quantidade - 2
WHERE produto_id = 1;

-- Outro exemplo de inserção de pedido e venda
INSERT INTO pedidos (cliente_nome, cliente_email, total, status)
VALUES ('Maria Souza', 'maria@gmail.com', 500.00, 'pago');

INSERT INTO vendas (pedido_id, produto_id, quantidade, preco_unitario)
VALUES (2, 2, 2, 250.00);

-- Atualizar o estoque após a venda
UPDATE estoque
SET quantidade = quantidade - 2
WHERE produto_id = 2;
