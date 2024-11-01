
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

