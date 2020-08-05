-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Maio-2015 às 02:06
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mindup`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `idUsuario` bigint(20) NOT NULL,
  `idIdeia` bigint(20) NOT NULL,
  PRIMARY KEY (`idUsuario`,`idIdeia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_ideias`
--

CREATE TABLE IF NOT EXISTS `fotos_ideias` (
  `idfoto` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) NOT NULL,
  `id_ideia` bigint(20) NOT NULL,
  `foto` varchar(300) NOT NULL,
  PRIMARY KEY (`idfoto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ideiasusuarios`
--

CREATE TABLE IF NOT EXISTS `ideiasusuarios` (
  `idideia` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idusuario` bigint(20) NOT NULL,
  `ideia` longtext NOT NULL,
  `data` date NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `fraseDaIdeia` varchar(100) NOT NULL,
  `avaliacao` decimal(10,2) NOT NULL,
  `valor` varchar(80) NOT NULL,
  `ideia_paga` tinyint(1) NOT NULL,
  PRIMARY KEY (`idideia`),
  UNIQUE KEY `idideia` (`idideia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=188 ;

--
-- Extraindo dados da tabela `ideiasusuarios`
--

INSERT INTO `ideiasusuarios` (`idideia`, `idusuario`, `ideia`, `data`, `categoria`, `fraseDaIdeia`, `avaliacao`, `valor`, `ideia_paga`) VALUES
(185, 37, 'aqui é um teste ', '2015-05-01', 'computação', 'aqui é um teste ', '0.00', '2000', 1),
(186, 38, 'Gustavo', '2015-05-01', 'outros', 'Gustavooooo', '0.00', '50000', 1),
(187, 37, 'Maria Teste', '2015-05-01', 'saúde', 'Maria Teste', '0.00', '20000', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ideias_de_amigos`
--

CREATE TABLE IF NOT EXISTS `ideias_de_amigos` (
  `id_divulgacao` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_ideia` bigint(20) NOT NULL,
  `id_amigo` bigint(20) NOT NULL,
  `id_autor_ideia` bigint(20) NOT NULL,
  PRIMARY KEY (`id_divulgacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `ideias_de_amigos`
--

INSERT INTO `ideias_de_amigos` (`id_divulgacao`, `id_ideia`, `id_amigo`, `id_autor_ideia`) VALUES
(10, 185, 38, 37),
(11, 187, 38, 37);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas_e_respostas_interessados`
--

CREATE TABLE IF NOT EXISTS `perguntas_e_respostas_interessados` (
  `id_pergunta` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_ideia` bigint(20) NOT NULL,
  `id_interessado` bigint(20) NOT NULL,
  `id_dono_da_ideia` bigint(20) NOT NULL,
  `pergunta` varchar(5000) NOT NULL,
  `resposta` varchar(5000) NOT NULL,
  `data_pergunta` date NOT NULL,
  `data_resposta` date NOT NULL,
  PRIMARY KEY (`id_pergunta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Extraindo dados da tabela `perguntas_e_respostas_interessados`
--

INSERT INTO `perguntas_e_respostas_interessados` (`id_pergunta`, `id_ideia`, `id_interessado`, `id_dono_da_ideia`, `pergunta`, `resposta`, `data_pergunta`, `data_resposta`) VALUES
(95, 185, 38, 37, 'olá fera tudo bem ?', 'sim e tu ?', '2015-04-30', '2015-04-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatoscontasremovidas`
--

CREATE TABLE IF NOT EXISTS `relatoscontasremovidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relato` varchar(50000) NOT NULL,
  `nomeusuariorelatou` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestoes`
--

CREATE TABLE IF NOT EXISTS `sugestoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sugestao` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `dataNascimento` date NOT NULL,
  `telefoneCelular` varchar(150) NOT NULL,
  `telefoneFixo` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `confirmaemail` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `confirmasenha` varchar(200) NOT NULL,
  `investimento` decimal(10,2) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `dataNascimento`, `telefoneCelular`, `telefoneFixo`, `email`, `confirmaemail`, `senha`, `confirmasenha`, `investimento`, `imagem`) VALUES
(37, 'Gustavo Marques', '1992-03-16', '(34) 9659-9328', '(34) 3313-1178', 'guriposa@gmail.com', 'guriposa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '0.00', '3763a873806c05312254e0827dd351a2.jpg'),
(38, 'Fabiana Bartonelli', '1985-08-15', '(34) 8827-3499', '', 'fabiana@gmail.com', 'fabiana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '0.00', '247cc0d1513fd00c1d2b9386a5535e3b.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariosinteressados`
--

CREATE TABLE IF NOT EXISTS `usuariosinteressados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idideia` int(11) NOT NULL,
  `ideia` longtext NOT NULL,
  `fraseideia` varchar(50000) NOT NULL,
  `idusuariointeressado` int(11) NOT NULL,
  `nomeusuariointeressado` varchar(2000) NOT NULL,
  `idusuarioautordaideia` int(11) NOT NULL,
  `nomeusuarioautordaideia` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Extraindo dados da tabela `usuariosinteressados`
--

INSERT INTO `usuariosinteressados` (`id`, `idideia`, `ideia`, `fraseideia`, `idusuariointeressado`, `nomeusuariointeressado`, `idusuarioautordaideia`, `nomeusuarioautordaideia`) VALUES
(44, 185, 'aqui é um teste ', 'aqui é um teste ', 38, 'Fabiana Bartonelli', 37, 'Gustavo Marques');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
