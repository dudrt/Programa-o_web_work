-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Out-2022 às 20:36
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `logistica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(9) NOT NULL,
  `cnpj_cpf` bigint(14) NOT NULL,
  `nome` varchar(90) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cnpj_cpf`, `nome`) VALUES
(1, 65234585698523, 'Eduardo'),
(2, 24586521458754, 'awd'),
(16, 56473546732, 'maicon'),
(17, 87656473423, 'shrek'),
(18, 123456, 'cleber'),
(19, 123456789, 'thiago'),
(20, 87452136985, 'thiago Joséferson'),
(21, 789456123, 'robson'),
(22, 23452353, 'gustavo'),
(23, 1122334455, 'nicolau');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_pedido` int(11) NOT NULL,
  `cpf_cnpj` bigint(14) NOT NULL,
  `cep` int(8) NOT NULL,
  `estado` varchar(90) COLLATE utf8_bin NOT NULL,
  `cidade` varchar(90) COLLATE utf8_bin NOT NULL,
  `bairro` varchar(90) COLLATE utf8_bin NOT NULL,
  `rua` varchar(90) COLLATE utf8_bin NOT NULL,
  `nm_casa` int(5) NOT NULL,
  `complemento` varchar(90) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_pedido`, `cpf_cnpj`, `cep`, `estado`, `cidade`, `bairro`, `rua`, `nm_casa`, `complemento`) VALUES
(5, 1234567890, 88130520, 'SC', 'Palhoça', 'Ponte do Imaruim', 'Rua Poeta Carlos Napoleão', 150, 'casa com mato'),
(6, 65234585698523, 88130620, 'SC', 'Palhoça', 'Ponte do Imaruim', 'Rua Alferes Tiradentes', 677, 'casa vermelha'),
(7, 1122334455, 88130570, 'SC', 'Palhoça', 'Ponte do Imaruim', 'Rua Nascente do Sol', 567, 'casa amarela');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(9) NOT NULL,
  `nome_produto` varchar(90) COLLATE utf8_bin NOT NULL,
  `quant` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `nome_produto`, `quant`) VALUES
(13, 'relógio de ouro', 2),
(14, 'corrente de prata', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia_prima`
--

CREATE TABLE `materia_prima` (
  `nome_material` varchar(90) COLLATE utf8_bin NOT NULL,
  `quantidade` int(9) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `materia_prima`
--

INSERT INTO `materia_prima` (`nome_material`, `quantidade`, `id`) VALUES
('cobre', 100, 5),
('ouro', 400, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `cpf_cnpj` bigint(20) NOT NULL,
  `montante` int(9) NOT NULL,
  `docs_necessarios` varchar(90) COLLATE utf8_bin NOT NULL,
  `pendencias` varchar(90) COLLATE utf8_bin NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(90) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`cpf_cnpj`, `montante`, `docs_necessarios`, `pendencias`, `id_cliente`, `nome`) VALUES
(123456, 80000, 'todos', '9000', 18, 'cleber'),
(123456789, 90000, 'todos', 'não', 19, 'thiago'),
(1122334455, 600, 'todos', 'não', 23, 'nicolau'),
(87452136985, 230000, 'TODOS', 'NÃO', 20, 'thiago Joséferson');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cpf_cnpj` bigint(14) NOT NULL,
  `preco` int(9) NOT NULL,
  `id_produtos` int(2) NOT NULL,
  `quant_prod` int(2) NOT NULL,
  `entrega` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `cpf_cnpj`, `preco`, `id_produtos`, `quant_prod`, `entrega`) VALUES
(7, 1122334455, 5000, 13, 2, 'Em andamento');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cnpj_cpf` (`cnpj_cpf`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD UNIQUE KEY `id_pedido` (`id_pedido`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`cpf_cnpj`),
  ADD UNIQUE KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `materia_prima`
--
ALTER TABLE `materia_prima`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
