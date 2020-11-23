-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18/11/2020 às 02:14
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `f5tecnologia`
--
CREATE DATABASE IF NOT EXISTS `f5tecnologia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `f5tecnologia`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendaVisita`
--

CREATE TABLE `agendaVisita` (
  `id_agenda` int(100) NOT NULL,
  `nome` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `empresa` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `email` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `telefone` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `diaDaVisita` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `horarioDaVisita` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `assunto` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `descricao` varchar(255) CHARACTER SET armscii8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `agendaVisita`
--

INSERT INTO `agendaVisita` (`id_agenda`, `nome`, `empresa`, `email`, `telefone`, `diaDaVisita`, `horarioDaVisita`, `assunto`, `descricao`) VALUES
(10, 'pedro', 'ferreiro S/A', 'contatoferreirosp@gmail.com', '(11) 95858-1905', '08/06/2020', '09:00', 'Servidores', 'texto da Pedro'),
(20, 'eduardo', 'python s/a', 'edu@gmail.com', '(11) 98585-8842', '01/06/2020', '09:00', 'Servidores', 'caiu o servidor!!!'),
(22, 'giovanna', 'gga doces', 'ggadoces@hotmail.com', '(11) 1234-1234', '08/06/2020', '12:00', 'Servidores', 'caiu um doce do chocolate dentro do servidor'),
(24, 'aline', 'aline manicure', 'aline@hotmail.com', '(11) 96565-7890', '22/06/2020', '09:00', 'Manut. Computadores', 'trocar o hd e o mouse'),
(25, 'jonathan', 'raczinfo', 'raczinfo@hotmail.com', '(11) 97070-5670', '29/06/2020', '15:00', 'Manut. Computadores', 'troca do gabinete, tela e mouse'),
(26, 'maria', 'mercadinho da vila', 'davila@yahoo.com', '(11) 2723-4518', '30/06/2020', '14:00', 'Cabeamento Estruturado', 'refazer todo o cabeamento do mercado !!!'),
(31, 'josaniel', 'hacker brasil', 'josa@gmail.com', '(11) 97654-8756', '02/06/2020', '09:00', 'Servidores', 'hackearam o servidor para jogar minecraft');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(100) NOT NULL,
  `nome` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `email` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `login` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `senha` varchar(255) CHARACTER SET armscii8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `nome`, `email`, `login`, `senha`) VALUES
(8, 'eduardoch', 'edu@hotmail.com', 'eduardo', '202cb962ac59075b964b07152d234b70'),
(40, 'jonathan', 'jonathan@hotmail.com', 'jonathan', '202cb962ac59075b964b07152d234b70'),
(41, 'josaniel', 'josaniel@hotmail.com', 'josaniel', '202cb962ac59075b964b07152d234b70'),
(42, 'henrique silva', 'henrique@hotmail.com', 'henrique', '202cb962ac59075b964b07152d234b70');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `agendaVisita`
--
ALTER TABLE `agendaVisita`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `agendaVisita`
--
ALTER TABLE `agendaVisita`
  MODIFY `id_agenda` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
