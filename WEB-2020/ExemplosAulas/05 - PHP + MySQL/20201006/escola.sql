-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Out-2020 às 01:16
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `escola`
--
CREATE DATABASE IF NOT EXISTS `escola` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `escola`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `prontuario` varchar(8) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  PRIMARY KEY (`prontuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`prontuario`, `nome`, `email`, `data_nascimento`, `sexo`) VALUES
('1111111', 'Ricardo dos Santos Ferreira', 'ricardoferreira@email.com', '2000-09-20', 'm'),
('123123', 'Gisele dos Santos ferreira', 'gisantos@email.com', '1999-01-05', 'f'),
('123456', 'Ana da Silva Santos', 'anasilva@email.com', '2000-01-01', 'f'),
('61213456', 'Maria Aparecida de Oliveira', 'maria.oliveira@email.cmo', '1999-06-20', 'f'),
('654321', 'Joao da Silva Santos', 'joaosilvasantos@email.com', '1999-02-03', 'm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `cod_professor` varchar(8) NOT NULL,
  PRIMARY KEY (`id_disciplina`),
  KEY `cod_professor` (`cod_professor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome`, `descricao`, `cod_professor`) VALUES
(1, 'Fisica I', 'Fisica modulo 1', '33333333'),
(2, 'Fisica II', 'Fisica modulo 2', '33333333'),
(3, 'Quimica', 'estudo da composicao, estrutura e propriedades da matéria', '2222222'),
(4, 'Trigonometria', 'Estudo de triangulos', '11111111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_aluno`
--

CREATE TABLE IF NOT EXISTS `disciplina_aluno` (
  `id_disciplina_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` varchar(8) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  PRIMARY KEY (`id_disciplina_aluno`),
  KEY `id_aluno` (`id_aluno`,`id_disciplina`),
  KEY `id_aluno_2` (`id_aluno`),
  KEY `id_disciplina` (`id_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `prontuario` varchar(8) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `formacao` varchar(100) NOT NULL,
  PRIMARY KEY (`prontuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`prontuario`, `nome`, `email`, `formacao`) VALUES
('11111111', 'Jose', 'jose@email.com', 'Matematica'),
('2222222', 'Maria', 'maria@email.com', 'Quimica'),
('33333333', 'Joao', 'joao@email.com', 'Fisica');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`cod_professor`) REFERENCES `professor` (`prontuario`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `disciplina_aluno`
--
ALTER TABLE `disciplina_aluno`
  ADD CONSTRAINT `disciplina_aluno_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`prontuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `disciplina_aluno_ibfk_2` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
