-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 23-Out-2025 às 18:31
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventariocadeiras`
--
CREATE SCHEMA IF NOT EXISTS `inventariocadeiras` ;
USE `inventarioCadeiras` ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventario`
--

CREATE TABLE `inventario` (
  `lote` int(11) NOT NULL,
  `dataFabricacao` varchar(7) DEFAULT NULL,
  `carcaMax` int(11) DEFAULT NULL,
  `tempoVida` float DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `classe` varchar(45) DEFAULT NULL,
  `CNPJ` varchar(20) DEFAULT NULL,
  `nomeEmpresa` varchar(45) DEFAULT NULL,
  `usuarios_usuariosID` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `inventario`
--

INSERT INTO `inventario` (`lote`, `dataFabricacao`, `carcaMax`, `tempoVida`, `nome`, `preco`, `classe`, `CNPJ`, `nomeEmpresa`, `usuarios_usuariosID`, `quantidade`) VALUES
(4, '01-2025', 30, 5, 'Cadeira Executiva Confort', 799.9, 'Irrestrito', '11.222.333/0001-44', 'Móveis Corporativos S.A.', 1, 25),
(5, '01-2025', 30, 5, 'Cadeira Presidente Luxo', 1199.9, 'Irrestrito', '11.222.333/0001-44', 'Móveis Corporativos S.A.', 1, 5),
(6, '02-2025', 30, 3, 'Cadeira Secretária Basic', 249.5, 'Residencial', '11.222.333/0001-44', 'Móveis Corporativos S.A.', 1, 30),
(7, '02-2025', 30, 5, 'Cadeira Diretor Mesh', 650, 'Irrestrito', '11.222.333/0001-44', 'Móveis Corporativos S.A.', 1, 22),
(8, '03-2025', 30, 3, 'Cadeira Interlocutor Fixa', 199.9, 'Residencial', '11.222.333/0001-44', 'Móveis Corporativos S.A.', 1, 18),
(9, '03-2025', 30, 8, 'Cadeira Ergonômica Premium', 950, 'Irrestrito', '11.222.333/0001-44', 'Móveis Corporativos S.A.', 1, 12),
(10, '04-2025', 30, 5, 'Cadeira Operacional Plus', 450, 'Irrestrito', '11.222.333/0001-44', 'Móveis Corporativos S.A.', 1, 28),
(11, '11-2024', 30, 5, 'Cadeira Gamer Pro-X', 1299, 'Residencial', '22.333.444/0001-55', 'FlexOffice Design Ltda.', 1, 14),
(12, '11-2024', 30, 5, 'Cadeira Gamer Light', 899, 'Residencial', '22.333.444/0001-55', 'FlexOffice Design Ltda.', 1, 20),
(13, '12-2024', 30, 6, 'Cadeira Presidente ErgoMax', 1500, 'Irrestrito', '22.333.444/0001-55', 'FlexOffice Design Ltda.', 1, 11),
(14, '12-2024', 30, 4, 'Cadeira Diretor Slim', 720, 'Irrestrito', '22.333.444/0001-55', 'FlexOffice Design Ltda.', 1, 23),
(15, '01-2025', 30, 3, 'Cadeira Reunião Style', 380, 'Irrestrito', '22.333.444/0001-55', 'FlexOffice Design Ltda.', 1, 29),
(16, '01-2025', 30, 3, 'Cadeira Secretária Flex', 310, 'Residencial', '22.333.444/0001-55', 'FlexOffice Design Ltda.', 1, 16),
(17, '02-2025', 30, 5, 'Cadeira Executiva Couro', 890, 'Irrestrito', '22.333.444/0001-55', 'FlexOffice Design Ltda.', 1, 19),
(18, '02-2025', 30, 5, 'Cadeira Ergonômica Office', 990, 'Irrestrito', '22.333.444/0001-55', 'FlexOffice Design Ltda.', 1, 24),
(19, '09-2024', 30, 10, 'Cadeira ErgoTotal Advanced', 2100, 'Irrestrito', '33.444.555/0001-66', 'ErgoSistemas Cadeiras', 1, 13),
(20, '09-2024', 30, 8, 'Cadeira ErgoFit Mesh', 1300, 'Irrestrito', '33.444.555/0001-66', 'ErgoSistemas Cadeiras', 1, 17),
(21, '10-2024', 30, 5, 'Cadeira Operacional Ergo', 550, 'Irrestrito', '33.444.555/0001-66', 'ErgoSistemas Cadeiras', 1, 26),
(22, '10-2024', 30, 5, 'Cadeira Home Office Comfort', 499, 'Residencial', '33.444.555/0001-66', 'ErgoSistemas Cadeiras', 1, 21),
(23, '11-2024', 30, 7, 'Cadeira Presidente ErgoPrime', 1800, 'Irrestrito', '33.444.555/0001-66', 'ErgoSistemas Cadeiras', 1, 10),
(24, '11-2024', 30, 3, 'Cadeira de Escritório Simples', 180, 'Residencial', '33.444.555/0001-66', 'ErgoSistemas Cadeiras', 1, 30),
(25, '01-2025', 30, 3, 'Cadeira Gamer X-Fire', 920, 'Residencial', '44.555.666/0001-77', 'Imports.com Atacadista', 1, 27),
(26, '01-2025', 30, 2, 'Cadeira Secretária Import', 220, 'Residencial', '44.555.666/0001-77', 'Imports.com Atacadista', 1, 29),
(27, '02-2025', 30, 5, 'Cadeira Executiva Import', 680, 'Irrestrito', '44.555.666/0001-77', 'Imports.com Atacadista', 1, 14),
(28, '02-2025', 30, 3, 'Cadeira Interlocutor Soft', 280, 'Irrestrito', '44.555.666/0001-77', 'Imports.com Atacadista', 1, 22),
(29, '03-2025', 30, 4, 'Cadeira Diretor Couro PU', 710, 'Irrestrito', '44.555.666/0001-77', 'Imports.com Atacadista', 1, 18),
(30, '03-2025', 30, 5, 'Cadeira Gamer RedDragon', 1150, 'Residencial', '44.555.666/0001-77', 'Imports.com Atacadista', 1, 15),
(31, '04-2025', 30, 8, 'Cadeira Presidente Topazio', 1450, 'Irrestrito', '44.555.666/0001-77', 'Imports.com Atacadista', 1, 11),
(32, '04-2025', 30, 3, 'Cadeira Reunião Black', 330, 'Irrestrito', '44.555.666/0001-77', 'Imports.com Atacadista', 1, 26),
(33, '05-2025', 30, 3, 'Cadeira Home Office Basic', 299, 'Residencial', '44.555.666/0001-77', 'Imports.com Atacadista', 1, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuariosID` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(75) NOT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuariosID`, `nome`, `email`, `senha`) VALUES
(1, 'Hiago', 'hiago@hiago', 'hiago'),
(2, 'Rabinson', 'rabinson@rabinson', 'rabinson'),
(3, 'Rodrigo', 'rodrigo@rodrigo', 'rodrigo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`lote`,`usuarios_usuariosID`),
  ADD KEY `fk_inventario_usuarios_idx` (`usuarios_usuariosID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuariosID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `lote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuariosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_usuarios` FOREIGN KEY (`usuarios_usuariosID`) REFERENCES `usuarios` (`usuariosID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
