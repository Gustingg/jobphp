-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Jun-2022 às 02:06
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `adega_casablancas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `nome`, `telefone`, `email`, `senha`, `cargo`) VALUES
(11122233344, 'Admin', '17 99999-9999', 'admin@aadmin.com', '486684', 1),
(44433344488, 'Gust22', '(17)', 's@s.com', '486684', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudopedido`
--

DROP TABLE IF EXISTS `conteudopedido`;
CREATE TABLE IF NOT EXISTS `conteudopedido` (
  `fk_idPedido` int(11) NOT NULL,
  `fk_idProduto` int(11) NOT NULL,
  `qtdProduto` int(11) NOT NULL,
  PRIMARY KEY (`fk_idPedido`),
  KEY `fk_idProduto` (`fk_idProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `fk_cpfCliente` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cpfCliente` (`fk_cpfCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `endereco`, `complemento`, `numero`, `fk_cpfCliente`) VALUES
(3, '15045000', 'asdw', 'asdw', '15', '11122233344'),
(6, '15045asdw', 'asdw', 'asdw', '15', '44433344488');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `fk_cpf` int(11) NOT NULL,
  `fk_tipoPag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cpf` (`fk_cpf`),
  KEY `fk_tipoPag` (`fk_tipoPag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `qtd` int(11) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `qtd`, `preco`, `img`) VALUES
(1, 'Vinho Tinto Argentino - Aatrox 1974', 54, '374,99', 'img/vinhos/ex1.jpg'),
(2, 'Vinho Tinto Chileno - Zahir 1986', 21, '199,99', 'img/vinhos/ex2.jpg'),
(3, 'Vinho Tinto AlemÃ£o - Tiamat 1954', 2, '499,99', 'img/vinhos/ex3.jpg'),
(4, 'Vinho Tinto - Sangue de Boi', 5, '299,99', 'img/vinhos/ex4.jpg'),
(5, 'Vinho Tinto AlemÃ£o - Tiamat 1954', 2, '499,99', 'img/vinhos/ex3.jpg'),
(6, 'Vinho Tinto - Sangue de Boi', 5, '299,99', 'img/vinhos/ex4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipopagamento`
--

DROP TABLE IF EXISTS `tipopagamento`;
CREATE TABLE IF NOT EXISTS `tipopagamento` (
  `id` int(11) NOT NULL,
  `nomeTipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
