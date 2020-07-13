-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jul-2020 às 20:30
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `orbi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contractfiles`
--

CREATE TABLE `contractfiles` (
  `id` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `name_server` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contractfiles`
--

INSERT INTO `contractfiles` (`id`, `id_contract`, `name`, `name_server`, `link`, `date`) VALUES
(9, 2, 'José Bruno', '4b1abcb6405c75a5cccb15d84b7e6760.pdf', 'http://localhost/orbi_projeto/public/media/contracts/2253-2020/4b1abcb6405c75a5cccb15d84b7e6760.pdf', '2020-05-15'),
(15, 7, 'Contrato 19052020', 'c5d5cf97977e6df4cd08b470f53ef772.pdf', 'http://localhost/orbi_projeto/public/media/contracts/19052020/c5d5cf97977e6df4cd08b470f53ef772.pdf', '2020-05-20'),
(19, 3, 'Documento para Testar 2', 'fe7de917d689ee4a6cbfa49922b96a67.pdf', 'http://localhost/orbi_projeto/public/media/contracts/15052020-20/fe7de917d689ee4a6cbfa49922b96a67.pdf', '2020-05-22'),
(20, 9, 'Contrato 12312', 'e11c5ef6113c007f3a575502ecf9dba6.pdf', 'http://localhost/orbi_projeto/public/media/contracts/Contrato 12303/e11c5ef6113c007f3a575502ecf9dba6.pdf', '2020-07-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email_user` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contracts`
--

INSERT INTO `contracts` (`id`, `id_user`, `email_user`, `name`, `date`) VALUES
(3, 8, 'cliente@teste.com', '15052020-20', '2020-05-15'),
(4, 3, 'jose@teste.com', '12032020-2022', '2020-05-22'),
(9, 13, 'clientemenor@teste.com', 'Contrato 12303', '2020-07-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hvifiles`
--

CREATE TABLE `hvifiles` (
  `id` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  `id_tender` int(11) NOT NULL,
  `name_server` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `hvifiles`
--

INSERT INTO `hvifiles` (`id`, `id_contract`, `id_tender`, `name_server`, `name`, `link`, `date`) VALUES
(3, 4, 0, 'fe7de917d689ee4a6cbfa49922b96a67.pdf', 'HVI 1', 'http://localhost/orbi_projeto/public/media/contracts/12032020-2020/fe7de917d689ee4a6cbfa49922b96a67.pdf', '2020-02-02'),
(14, 0, 2, '4b2693e57b8aeb3ea254cbc969575310.pdf', 'Proposta 001', 'http://localhost/orbi_projeto/public/media/tenders/Proposta 001/4b2693e57b8aeb3ea254cbc969575310.pdf', '2020-05-22'),
(15, 3, 0, '51f72c6f192fec4474e3c9c2c75633e3.pdf', 'Teste de HVI', 'http://localhost/orbi_projeto/public/media/contracts/15052020-20/51f72c6f192fec4474e3c9c2c75633e3.pdf', '2020-05-19'),
(16, 0, 4, 'c175d3c3d72de65836e1e63fdddba0f9.pdf', 'HVI 001', 'http://localhost/orbi_projeto/public/media/tenders/Proposta 002/c175d3c3d72de65836e1e63fdddba0f9.pdf', '2020-05-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nffiles`
--

CREATE TABLE `nffiles` (
  `id` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  `name_server` varchar(200) NOT NULL,
  `name` varchar(150) NOT NULL,
  `link` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nffiles`
--

INSERT INTO `nffiles` (`id`, `id_contract`, `name_server`, `name`, `link`, `date`) VALUES
(6, 3, 'db7b2b87e146c36ea91b6cda99982d8e.pdf', 'NF de teste', 'http://localhost/orbi_projeto/public/media/contracts/15052020-20/db7b2b87e146c36ea91b6cda99982d8e.pdf', '2020-05-15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `name`, `email`, `tel`, `body`, `created_at`) VALUES
(1, 'José Bruno Campanholi dos Santos', 'josebrunocampanholi@gmail.com', '(44) 988447123', 'Mensagem de teste!', '2020-04-22 14:04:49'),
(2, 'José Bruno Campanholi dos Santos', 'josebrunocampanholi@gmail.com', '44988447123', 'Teste', '2020-05-08 19:42:20'),
(8, 'Bruno', 'bruno@teste.com', '(44)98844-7123', 'Olá, muito bom o seu site! Gostaria de ter mais informações sobre...', '2020-07-10 21:17:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `radarfiles`
--

CREATE TABLE `radarfiles` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `name_server` varchar(150) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `radarfiles`
--

INSERT INTO `radarfiles` (`id`, `name`, `name_server`, `date`) VALUES
(4, 'NOTICIAS RADAR - Jul20 -02', '74cc6e082af932dd09ded8d6835ce260.pdf', '2020-07-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tenders`
--

CREATE TABLE `tenders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tenders`
--

INSERT INTO `tenders` (`id`, `name`, `id_user`, `email_user`, `date`, `status`) VALUES
(2, 'Proposta 001', 8, 'cliente@teste.com', '2020-05-21', 0),
(4, 'Proposta 002', 8, 'cliente@teste.com', '1997-03-12', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `email_user` varchar(150) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `times`
--

INSERT INTO `times` (`id`, `email_user`, `type`, `date`, `time`, `ip`) VALUES
(74, 'jose@teste.com', 'Saida', '2020-05-13', '20:55:58', ''),
(75, 'cliente@teste.com', 'Entrada', '2020-05-13', '20:56:09', ''),
(76, 'cliente@teste.com', 'Saida', '2020-05-13', '20:56:12', ''),
(77, 'funcionario@teste.com', 'Entrada', '2020-05-13', '20:56:18', ''),
(78, 'funcionario@teste.com', 'Saida', '2020-05-13', '20:56:23', ''),
(79, 'jose@teste.com', 'Entrada', '2020-05-13', '20:56:28', ''),
(80, 'jose@teste.com', 'Saida', '2020-05-13', '21:17:36', ''),
(81, 'jose@teste.com', 'Entrada', '2020-05-13', '21:17:53', ''),
(82, 'jose@teste.com', 'Saida', '2020-05-13', '21:19:45', ''),
(83, 'cliente@teste.com', 'Entrada', '2020-05-13', '21:19:52', ''),
(84, 'cliente@teste.com', 'Saida', '2020-05-13', '21:20:05', ''),
(85, 'funcionario@teste.com', 'Entrada', '2020-05-13', '21:20:12', ''),
(86, 'funcionario@teste.com', 'Saida', '2020-05-13', '21:23:28', ''),
(87, 'jose@teste.com', 'Entrada', '2020-05-13', '21:23:34', ''),
(88, 'jose@teste.com', 'Saida', '2020-05-13', '21:58:05', ''),
(89, 'cliente@teste.com', 'Entrada', '2020-05-13', '21:58:15', ''),
(90, 'cliente@teste.com', 'Saida', '2020-05-13', '21:58:35', ''),
(91, 'jose@teste.com', 'Entrada', '2020-05-13', '21:58:39', ''),
(92, 'jose@teste.com', 'Saida', '2020-05-13', '22:03:07', ''),
(93, 'funcionario@teste.com', 'Entrada', '2020-05-13', '22:03:12', ''),
(94, 'funcionario@teste.com', 'Saida', '2020-05-13', '22:04:55', ''),
(95, 'jose@teste.com', 'Entrada', '2020-05-13', '22:05:00', ''),
(97, 'jose@teste.com', 'Saida', '2020-05-14', '17:24:31', ''),
(98, 'cliente@teste.com', 'Entrada', '2020-05-14', '17:24:38', ''),
(99, 'cliente@teste.com', 'Saida', '2020-05-14', '17:32:46', ''),
(100, 'jose@teste.com', 'Entrada', '2020-05-14', '17:35:25', ''),
(101, 'jose@teste.com', 'Saida', '2020-05-14', '17:47:26', ''),
(102, 'cliente@teste.com', 'Entrada', '2020-05-14', '17:47:32', ''),
(103, 'cliente@teste.com', 'Saida', '2020-05-14', '17:50:48', ''),
(104, 'jose@teste.com', 'Entrada', '2020-05-14', '17:50:53', ''),
(105, 'jose@teste.com', 'Saida', '2020-05-14', '17:54:00', ''),
(106, 'jose@teste.com', 'Entrada', '2020-05-14', '17:54:47', ''),
(107, 'jose@teste.com', 'Saida', '2020-05-15', '18:17:31', ''),
(108, 'cliente@teste.com', 'Entrada', '2020-05-15', '18:17:40', ''),
(109, 'cliente@teste.com', 'Saida', '2020-05-15', '18:18:08', ''),
(110, 'funcionario@teste.com', 'Entrada', '2020-05-15', '18:18:13', ''),
(111, 'funcionario@teste.com', 'Saida', '2020-05-15', '18:18:19', ''),
(112, 'jose@teste.com', 'Entrada', '2020-05-15', '18:18:24', ''),
(113, 'jose@teste.com', 'Entrada', '2020-05-15', '19:38:27', ''),
(114, 'jose@teste.com', 'Saida', '2020-05-15', '19:55:17', ''),
(115, 'cliente@teste.com', 'Entrada', '2020-05-15', '19:55:24', ''),
(116, 'cliente@teste.com', 'Saida', '2020-05-15', '19:55:41', ''),
(117, 'jose@teste.com', 'Entrada', '2020-05-15', '19:55:49', ''),
(118, 'jose@teste.com', 'Entrada', '2020-05-15', '20:17:55', ''),
(119, 'jose@teste.com', 'Entrada', '2020-05-15', '20:40:03', ''),
(120, 'jose@teste.com', 'Saida', '2020-05-15', '20:40:08', ''),
(121, 'cliente@teste.com', 'Entrada', '2020-05-15', '20:40:16', ''),
(122, 'cliente@teste.com', 'Saida', '2020-05-15', '20:42:21', ''),
(123, 'jose@teste.com', 'Entrada', '2020-05-15', '20:42:29', ''),
(124, 'jose@teste.com', 'Entrada', '2020-05-15', '20:45:25', ''),
(125, 'jose@teste.com', 'Entrada', '2020-05-15', '21:45:48', ''),
(126, 'jose@teste.com', 'Entrada', '2020-05-15', '21:49:45', ''),
(127, 'jose@teste.com', 'Saida', '2020-05-15', '22:02:03', ''),
(128, 'cliente@teste.com', 'Entrada', '2020-05-15', '22:02:13', ''),
(129, 'cliente@teste.com', 'Saida', '2020-05-15', '22:02:19', ''),
(130, 'funcionario@teste.com', 'Entrada', '2020-05-15', '22:02:24', ''),
(131, 'funcionario@teste.com', 'Saida', '2020-05-15', '22:03:49', ''),
(132, 'cliente@teste.com', 'Entrada', '2020-05-15', '22:03:55', ''),
(133, 'cliente@teste.com', 'Saida', '2020-05-15', '22:04:07', ''),
(134, 'funcionario@teste.com', 'Entrada', '2020-05-15', '22:04:14', ''),
(135, 'funcionario@teste.com', 'Saida', '2020-05-15', '22:05:37', ''),
(136, 'jose@teste.com', 'Entrada', '2020-05-15', '22:05:42', ''),
(137, 'jose@teste.com', 'Saida', '2020-05-15', '22:17:49', ''),
(138, 'cliente@teste.com', 'Entrada', '2020-05-15', '22:17:55', ''),
(139, 'cliente@teste.com', 'Saida', '2020-05-15', '23:34:21', ''),
(140, 'jose@teste.com', 'Entrada', '2020-05-15', '23:34:27', ''),
(141, 'jose@teste.com', 'Saida', '2020-05-16', '00:05:32', ''),
(142, 'cliente@teste.com', 'Entrada', '2020-05-16', '00:05:44', ''),
(143, 'cliente@teste.com', 'Saida', '2020-05-16', '00:06:06', ''),
(144, 'jose@teste.com', 'Entrada', '2020-05-16', '00:07:27', ''),
(145, 'jose@teste.com', 'Saida', '2020-05-16', '00:51:56', ''),
(146, 'jose@teste.com', 'Entrada', '2020-05-16', '00:52:13', ''),
(147, 'jose@teste.com', 'Entrada', '2020-05-18', '14:50:45', ''),
(148, 'jose@teste.com', 'Entrada', '2020-05-18', '15:56:00', ''),
(149, 'jose@teste.com', 'Saida', '2020-05-18', '16:25:45', ''),
(150, 'cliente@teste.com', 'Entrada', '2020-05-18', '16:25:49', ''),
(151, 'cliente@teste.com', 'Saida', '2020-05-18', '16:32:36', ''),
(152, 'jose@teste.com', 'Entrada', '2020-05-18', '16:32:41', ''),
(153, 'jose@teste.com', 'Saida', '2020-05-18', '16:57:37', ''),
(154, 'cliente@teste.com', 'Entrada', '2020-05-18', '16:57:44', ''),
(155, 'cliente@teste.com', 'Saida', '2020-05-18', '17:05:05', ''),
(156, 'jose@teste.com', 'Entrada', '2020-05-18', '17:05:11', ''),
(157, 'jose@teste.com', 'Entrada', '2020-05-19', '13:58:03', ''),
(158, 'jose@teste.com', 'Saida', '2020-05-19', '14:06:33', ''),
(159, 'jose@teste.com', 'Entrada', '2020-05-19', '14:06:38', ''),
(160, 'jose@teste.com', 'Saida', '2020-05-19', '16:36:25', ''),
(161, 'jose@teste.com', 'Entrada', '2020-05-19', '21:00:01', ''),
(162, 'jose@teste.com', 'Saida', '2020-05-19', '16:38:59', ''),
(163, 'jose@teste.com', 'Entrada', '2020-05-19', '16:39:51', '::1'),
(164, 'jose@teste.com', 'Saida', '2020-05-19', '16:40:30', '::1'),
(165, 'jose@teste.com', 'Entrada', '2020-05-19', '16:41:28', '::1'),
(166, 'jose@teste.com', 'Entrada', '2020-05-21', '15:47:07', '::1'),
(167, 'jose@teste.com', 'Saida', '2020-05-21', '16:27:21', '::1'),
(168, 'cliente@teste.com', 'Entrada', '2020-05-21', '16:27:27', '::1'),
(169, 'cliente@teste.com', 'Saida', '2020-05-21', '16:28:22', '::1'),
(170, 'jose@teste.com', 'Entrada', '2020-05-21', '16:28:27', '::1'),
(171, 'jose@teste.com', 'Entrada', '2020-05-21', '16:59:16', '::1'),
(172, 'jose@teste.com', 'Saida', '2020-05-21', '17:02:28', '::1'),
(173, 'cliente@teste.com', 'Entrada', '2020-05-21', '17:03:05', '::1'),
(174, 'cliente@teste.com', 'Saida', '2020-05-21', '17:03:21', '::1'),
(175, 'jose@teste.com', 'Entrada', '2020-05-21', '17:04:02', '::1'),
(176, 'jose@teste.com', 'Saida', '2020-05-21', '20:04:13', '::1'),
(177, 'cliente@teste.com', 'Entrada', '2020-05-21', '20:04:18', '::1'),
(178, 'cliente@teste.com', 'Saida', '2020-05-21', '20:18:04', '::1'),
(179, 'jose@teste.com', 'Entrada', '2020-05-21', '20:18:11', '::1'),
(180, 'jose@teste.com', 'Entrada', '2020-05-22', '16:22:27', '::1'),
(181, 'jose@teste.com', 'Saida', '2020-05-22', '17:06:55', '::1'),
(182, 'cliente@teste.com', 'Entrada', '2020-05-22', '17:07:01', '::1'),
(183, 'cliente@teste.com', 'Saida', '2020-05-22', '17:07:12', '::1'),
(184, 'jose@teste.com', 'Entrada', '2020-05-22', '17:07:17', '::1'),
(185, 'jose@teste.com', 'Entrada', '2020-05-22', '21:58:19', '::1'),
(186, 'jose@teste.com', 'Entrada', '2020-05-22', '22:03:57', '::1'),
(187, 'jose@teste.com', 'Saida', '2020-05-22', '23:20:51', '::1'),
(188, 'jose@teste.com', 'Entrada', '2020-05-25', '14:47:24', '::1'),
(189, 'jose@teste.com', 'Saida', '2020-05-25', '15:52:42', '::1'),
(190, 'jose@teste.com', 'Entrada', '2020-05-25', '15:53:19', '::1'),
(191, 'jose@teste.com', 'Entrada', '2020-05-25', '16:08:33', '::1'),
(192, 'jose@teste.com', 'Saida', '2020-05-25', '16:11:52', '::1'),
(193, 'jose@teste.com', 'Entrada', '2020-05-25', '16:13:22', '::1'),
(194, 'jose@teste.com', 'Entrada', '2020-05-25', '16:23:19', '::1'),
(195, 'jose@teste.com', 'Saida', '2020-05-25', '16:23:27', '::1'),
(196, 'jose@teste.com', 'Entrada', '2020-05-25', '16:29:28', '::1'),
(197, 'jose@teste.com', 'Entrada', '2020-05-25', '16:56:03', '::1'),
(198, 'jose@teste.com', 'Entrada', '2020-05-25', '17:05:13', '::1'),
(199, 'jose@teste.com', 'Saida', '2020-05-25', '17:07:20', '::1'),
(200, 'jose@teste.com', 'Entrada', '2020-05-25', '17:46:07', '::1'),
(201, 'jose@teste.com', 'Entrada', '2020-05-25', '19:11:28', '::1'),
(202, 'jose@teste.com', 'Entrada', '2020-05-26', '19:46:09', '::1'),
(203, 'jose@teste.com', 'Saida', '2020-05-26', '19:47:10', '::1'),
(204, 'cliente2@teste.com', 'Entrada', '2020-05-26', '19:47:18', '::1'),
(205, 'cliente2@teste.com', 'Saida', '2020-05-26', '19:47:21', '::1'),
(206, 'cliente2@teste.com', 'Entrada', '2020-05-26', '19:48:58', '::1'),
(207, 'cliente2@teste.com', 'Saida', '2020-05-26', '19:49:06', '::1'),
(208, 'jose@teste.com', 'Entrada', '2020-05-26', '19:49:17', '::1'),
(209, 'jose@teste.com', 'Saida', '2020-05-26', '20:01:33', '::1'),
(210, 'cliente@teste.com', 'Entrada', '2020-05-26', '20:01:40', '::1'),
(211, 'cliente@teste.com', 'Saida', '2020-05-26', '20:01:41', '::1'),
(212, 'cliente@teste.com', 'Entrada', '2020-05-26', '20:02:21', '::1'),
(213, 'cliente@teste.com', 'Saida', '2020-05-26', '20:02:28', '::1'),
(214, 'jose@teste.com', 'Entrada', '2020-05-26', '20:02:34', '::1'),
(215, 'jose@teste.com', 'Saida', '2020-05-26', '20:50:27', '::1'),
(216, 'jose@teste.com', 'Entrada', '2020-05-26', '20:55:54', '::1'),
(217, 'jose@teste.com', 'Saida', '2020-05-26', '23:09:07', '::1'),
(218, 'jose@teste.com', 'Entrada', '2020-05-26', '23:10:47', '::1'),
(219, 'jose@teste.com', 'Saida', '2020-05-26', '23:17:52', '::1'),
(220, 'jose@teste.com', 'Entrada', '2020-05-26', '23:22:07', '::1'),
(221, 'jose@teste.com', 'Saida', '2020-05-26', '23:27:31', '::1'),
(222, 'jose@teste.com', 'Entrada', '2020-05-27', '14:50:17', '::1'),
(223, 'jose@teste.com', 'Saida', '2020-05-27', '14:50:22', '::1'),
(224, 'jose@teste.com', 'Entrada', '2020-05-27', '14:51:10', '::1'),
(225, 'jose@teste.com', 'Saida', '2020-05-27', '14:54:43', '::1'),
(226, 'jose@teste.com', 'Entrada', '2020-05-27', '16:02:18', '::1'),
(227, 'jose@teste.com', 'Saida', '2020-05-27', '16:55:03', '::1'),
(228, 'jose@teste.com', 'Entrada', '2020-05-28', '15:23:36', '::1'),
(229, 'jose@teste.com', 'Entrada', '2020-06-01', '16:12:05', '::1'),
(230, 'jose@teste.com', 'Saida', '2020-06-01', '16:23:51', '::1'),
(231, 'cliente@teste.com', 'Entrada', '2020-06-01', '16:23:59', '::1'),
(232, 'jose@teste.com', 'Entrada', '2020-06-03', '01:21:01', '::1'),
(233, 'jose@teste.com', 'Entrada', '2020-06-03', '14:52:31', '::1'),
(234, 'jose@teste.com', 'Saida', '2020-06-03', '15:05:27', '::1'),
(235, 'cliente@teste.com', 'Entrada', '2020-06-03', '15:05:33', '::1'),
(236, 'jose@teste.com', 'Entrada', '2020-06-04', '15:21:55', '127.0.0.1'),
(237, 'jose@teste.com', 'Saida', '2020-06-04', '16:05:53', '127.0.0.1'),
(238, 'jose@teste.com', 'Entrada', '2020-06-04', '17:33:10', '::1'),
(239, 'jose@teste.com', 'Entrada', '2020-06-08', '16:14:15', '::1'),
(240, 'jose@teste.com', 'Saida', '2020-06-08', '16:14:27', '::1'),
(241, 'jose@teste.com', 'Entrada', '2020-06-08', '16:53:59', '::1'),
(242, 'jose@teste.com', 'Entrada', '2020-06-09', '17:58:12', '::1'),
(243, 'jose@teste.com', 'Entrada', '2020-06-10', '16:21:41', '::1'),
(244, 'jose@teste.com', 'Saida', '2020-06-10', '20:15:26', '::1'),
(245, 'jose@teste.com', 'Entrada', '2020-06-10', '20:16:01', '::1'),
(246, 'jose@teste.com', 'Entrada', '2020-06-10', '23:27:09', '::1'),
(247, 'jose@teste.com', 'Saida', '2020-06-10', '23:29:21', '::1'),
(248, 'jose@teste.com', 'Entrada', '2020-06-12', '18:09:34', '::1'),
(249, 'jose@teste.com', 'Entrada', '2020-06-12', '19:52:30', '::1'),
(250, 'jose@teste.com', 'Saida', '2020-06-13', '00:38:01', '::1'),
(251, 'jose@teste.com', 'Entrada', '2020-06-15', '15:08:21', '::1'),
(252, 'jose@teste.com', 'Saida', '2020-06-15', '15:12:01', '::1'),
(253, 'jose@teste.com', 'Entrada', '2020-06-15', '15:15:24', '::1'),
(254, 'jose@teste.com', 'Entrada', '2020-06-15', '17:13:59', '::1'),
(255, 'jose@teste.com', 'Saida', '2020-06-15', '18:39:51', '::1'),
(256, 'jose@teste.com', 'Entrada', '2020-07-08', '16:22:03', '::1'),
(257, 'jose@teste.com', 'Entrada', '2020-07-10', '19:51:01', '::1'),
(258, 'jose@teste.com', 'Saida', '2020-07-10', '19:51:26', '::1'),
(259, 'jose@teste.com', 'Entrada', '2020-07-10', '20:39:58', '::1'),
(260, 'jose@teste.com', 'Saida', '2020-07-10', '20:40:21', '::1'),
(261, 'jose@teste.com', 'Entrada', '2020-07-13', '14:39:07', '::1'),
(262, 'jose@teste.com', 'Entrada', '2020-07-13', '15:01:44', '::1'),
(263, 'jose@teste.com', 'Saida', '2020-07-13', '15:16:16', '::1'),
(264, 'jose@teste.com', 'Entrada', '2020-07-13', '15:28:38', '::1'),
(265, 'jose@teste.com', 'Saida', '2020-07-13', '16:29:59', '::1'),
(266, 'clientemenor@teste.com', 'Entrada', '2020-07-13', '16:30:08', '::1'),
(267, 'clientemenor@teste.com', 'Saida', '2020-07-13', '16:33:22', '::1'),
(268, 'cliente@teste.com', 'Entrada', '2020-07-13', '16:33:28', '::1'),
(269, 'cliente@teste.com', 'Saida', '2020-07-13', '16:54:09', '::1'),
(270, 'jose@teste.com', 'Entrada', '2020-07-13', '17:21:10', '::1'),
(271, 'jose@teste.com', 'Saida', '2020-07-13', '17:51:37', '::1'),
(272, 'jose@teste.com', 'Entrada', '2020-07-13', '17:51:52', '::1'),
(273, 'jose@teste.com', 'Saida', '2020-07-13', '17:59:54', '::1'),
(274, 'jose@teste.com', 'Entrada', '2020-07-13', '18:00:49', '::1'),
(275, 'jose@teste.com', 'Saida', '2020-07-13', '18:01:13', '::1'),
(276, 'jose@teste.com', 'Entrada', '2020-07-13', '18:36:39', '::1'),
(277, 'jose@teste.com', 'Saida', '2020-07-13', '18:42:19', '::1'),
(278, 'jose@teste.com', 'Entrada', '2020-07-13', '19:25:48', '::1'),
(279, 'jose@teste.com', 'Saida', '2020-07-13', '19:28:22', '::1'),
(280, 'clientemenor@teste.com', 'Entrada', '2020-07-13', '19:28:28', '::1'),
(281, 'clientemenor@teste.com', 'Saida', '2020-07-13', '19:45:10', '::1'),
(282, 'jose@teste.com', 'Entrada', '2020-07-13', '19:45:17', '::1'),
(283, 'jose@teste.com', 'Saida', '2020-07-13', '19:46:52', '::1'),
(284, 'deletar@teste.com', 'Entrada', '2020-07-13', '19:46:59', '::1'),
(285, 'deletar@teste.com', 'Saida', '2020-07-13', '19:47:38', '::1'),
(286, 'jose@teste.com', 'Entrada', '2020-07-13', '19:47:43', '::1'),
(287, 'jose@teste.com', 'Saida', '2020-07-13', '20:16:20', '::1'),
(288, 'jose@teste.com', 'Entrada', '2020-07-13', '20:19:38', '::1'),
(289, 'jose@teste.com', 'Saida', '2020-07-13', '20:26:27', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tel` varchar(150) DEFAULT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(2) NOT NULL,
  `avatar` varchar(150) NOT NULL DEFAULT 'default.png',
  `token` varchar(200) NOT NULL,
  `group` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `tel`, `city`, `state`, `avatar`, `token`, `group`, `created_by`) VALUES
(3, 'José Bruno C.', 'jose@teste.com', '$2y$10$TRI2SIqX/rxpTotEukK8MuHgZB2eOU9L8IEnQqpWF.0upKoWNU2Pe', '(44) 98844-7123', 'Maringá', 'pr', '126ecfe3d5d19378e6e5af445a8379de.png', '5348d98613e5afb9b874e55bde174f94', 'admin', 0),
(8, 'Cliente de Teste', 'cliente@teste.com', '$2y$10$G9Sh8KB76u.SZcywvT1BVeV1yObHDf6qI86GkYEml2tWO28P1qFKS', '', 'Maringá', 'pr', '36786b6239d94743b078651479904aab.jpg', 'a784ca984ea10396e7aa563474513c2a', 'client', 0),
(9, 'Funcionário de Teste', 'funcionario@teste.com', '$2y$10$gao5/f.jfD/fpmIsUmE.HufoJhX7BG5h/AKS33kZOCdNiGoj88fyW', '(54) 98877-5478', '', '', 'default.png', '3be8d6859d8d82ad1629528ffe40086d', 'employee', 0),
(13, 'Cliente Menor Teste', 'clientemenor@teste.com', '$2y$10$IohVWehWf9kDGisc/2xzC.eT9KwpEUSJ8zQ0HqA9x5e1h4fsU5j.W', NULL, 'Maringá', 'pr', 'default.png', '2ac238fd06941a3a1425019348fbd8a1', 'client2', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `views`
--

INSERT INTO `views` (`id`, `ip`, `date`, `time`) VALUES
(1, '::1', '2020-05-27', '15:59:00'),
(2, '::1', '2020-05-27', '16:55:00'),
(3, '::1', '2020-05-27', '20:57:00'),
(4, '::1', '2020-05-28', '15:15:00'),
(5, '::1', '2020-05-28', '16:32:00'),
(6, '::1', '2020-06-01', '16:11:00'),
(7, '::1', '2020-06-01', '16:23:00'),
(8, '::1', '2020-06-02', '16:07:00'),
(9, '::1', '2020-06-02', '16:07:00'),
(10, '::1', '2020-06-03', '01:12:00'),
(11, '::1', '2020-06-03', '14:52:00'),
(12, '::1', '2020-06-03', '15:05:00'),
(13, '::1', '2020-06-03', '21:38:00'),
(14, '127.0.0.1', '2020-06-03', '22:43:00'),
(15, '127.0.0.1', '2020-06-03', '22:43:00'),
(16, '127.0.0.1', '2020-06-03', '23:04:00'),
(17, '::1', '2020-06-03', '23:06:00'),
(18, '127.0.0.1', '2020-06-04', '15:17:00'),
(19, '127.0.0.1', '2020-06-04', '15:19:00'),
(20, '127.0.0.1', '2020-06-04', '15:19:00'),
(21, '127.0.0.1', '2020-06-04', '15:19:00'),
(22, '127.0.0.1', '2020-06-04', '15:19:00'),
(23, '127.0.0.1', '2020-06-04', '15:20:00'),
(24, '127.0.0.1', '2020-06-04', '15:21:00'),
(25, '127.0.0.1', '2020-06-04', '16:05:00'),
(26, '127.0.0.1', '2020-06-04', '16:05:00'),
(27, '::1', '2020-06-04', '17:33:00'),
(28, '::1', '2020-06-08', '15:32:00'),
(29, '::1', '2020-06-08', '15:32:00'),
(30, '::1', '2020-06-08', '15:34:00'),
(31, '::1', '2020-06-08', '16:14:00'),
(32, '::1', '2020-06-09', '16:17:00'),
(33, '::1', '2020-06-09', '16:17:00'),
(34, '::1', '2020-06-09', '16:17:00'),
(35, '::1', '2020-06-09', '16:19:00'),
(36, '::1', '2020-06-09', '16:20:00'),
(37, '::1', '2020-06-09', '16:20:00'),
(38, '::1', '2020-06-09', '16:20:00'),
(39, '::1', '2020-06-09', '16:21:00'),
(40, '::1', '2020-06-09', '16:22:00'),
(41, '::1', '2020-06-09', '16:29:00'),
(42, '::1', '2020-06-09', '16:30:00'),
(43, '::1', '2020-06-09', '16:35:00'),
(44, '::1', '2020-06-09', '16:35:00'),
(45, '::1', '2020-06-09', '16:36:00'),
(46, '::1', '2020-06-09', '16:37:00'),
(47, '::1', '2020-06-09', '16:37:00'),
(48, '::1', '2020-06-09', '16:37:00'),
(49, '::1', '2020-06-09', '16:45:00'),
(50, '::1', '2020-06-09', '17:08:00'),
(51, '::1', '2020-06-09', '17:09:00'),
(52, '::1', '2020-06-09', '17:14:00'),
(53, '::1', '2020-06-09', '17:28:00'),
(54, '::1', '2020-06-09', '17:31:00'),
(55, '::1', '2020-06-09', '17:31:00'),
(56, '::1', '2020-06-09', '17:31:00'),
(57, '::1', '2020-06-09', '17:54:00'),
(58, '::1', '2020-06-09', '17:54:00'),
(59, '::1', '2020-06-09', '17:55:00'),
(60, '::1', '2020-06-09', '17:55:00'),
(61, '::1', '2020-06-09', '17:56:00'),
(62, '::1', '2020-06-09', '17:56:00'),
(63, '::1', '2020-06-09', '17:56:00'),
(64, '::1', '2020-06-09', '17:57:00'),
(65, '::1', '2020-06-09', '17:57:00'),
(66, '::1', '2020-06-09', '17:58:00'),
(67, '::1', '2020-06-09', '23:49:00'),
(68, '::1', '2020-06-10', '00:21:00'),
(69, '::1', '2020-06-10', '15:37:00'),
(70, '::1', '2020-06-10', '15:42:00'),
(71, '::1', '2020-06-10', '15:42:00'),
(72, '::1', '2020-06-10', '15:42:00'),
(73, '::1', '2020-06-10', '15:42:00'),
(74, '::1', '2020-06-10', '20:15:00'),
(75, '::1', '2020-06-10', '23:15:00'),
(76, '::1', '2020-06-10', '23:17:00'),
(77, '::1', '2020-06-10', '23:17:00'),
(78, '::1', '2020-06-10', '23:20:00'),
(79, '::1', '2020-06-10', '23:21:00'),
(80, '::1', '2020-06-10', '23:21:00'),
(81, '::1', '2020-06-10', '23:21:00'),
(82, '::1', '2020-06-10', '23:29:00'),
(83, '::1', '2020-06-12', '18:08:00'),
(84, '::1', '2020-06-12', '19:51:00'),
(85, '::1', '2020-06-13', '00:38:00'),
(86, '::1', '2020-06-15', '15:07:00'),
(87, '::1', '2020-06-15', '15:08:00'),
(88, '::1', '2020-06-15', '15:12:00'),
(89, '::1', '2020-06-15', '15:14:00'),
(90, '::1', '2020-06-15', '17:13:00'),
(91, '::1', '2020-06-15', '18:39:00'),
(92, '::1', '2020-06-15', '18:40:00'),
(93, '::1', '2020-06-15', '19:02:00'),
(94, '::1', '2020-06-30', '16:45:00'),
(95, '::1', '2020-07-08', '16:20:00'),
(96, '::1', '2020-07-10', '17:01:00'),
(97, '::1', '2020-07-10', '18:22:00'),
(98, '::1', '2020-07-10', '18:29:00'),
(99, '::1', '2020-07-10', '18:29:00'),
(100, '::1', '2020-07-10', '18:30:00'),
(101, '::1', '2020-07-10', '18:30:00'),
(102, '::1', '2020-07-10', '18:30:00'),
(103, '::1', '2020-07-10', '18:31:00'),
(104, '::1', '2020-07-10', '18:31:00'),
(105, '::1', '2020-07-10', '18:31:00'),
(106, '::1', '2020-07-10', '18:32:00'),
(107, '::1', '2020-07-10', '18:55:00'),
(108, '::1', '2020-07-10', '18:55:00'),
(109, '::1', '2020-07-10', '18:55:00'),
(110, '::1', '2020-07-10', '18:57:00'),
(111, '::1', '2020-07-10', '18:57:00'),
(112, '::1', '2020-07-10', '18:57:00'),
(113, '::1', '2020-07-10', '18:57:00'),
(114, '::1', '2020-07-10', '18:58:00'),
(115, '::1', '2020-07-10', '18:58:00'),
(116, '::1', '2020-07-10', '18:59:00'),
(117, '::1', '2020-07-10', '18:59:00'),
(118, '::1', '2020-07-10', '18:59:00'),
(119, '::1', '2020-07-10', '19:00:00'),
(120, '::1', '2020-07-10', '19:01:00'),
(121, '::1', '2020-07-10', '19:01:00'),
(122, '::1', '2020-07-10', '19:01:00'),
(123, '::1', '2020-07-10', '19:01:00'),
(124, '::1', '2020-07-10', '19:01:00'),
(125, '::1', '2020-07-10', '19:01:00'),
(126, '::1', '2020-07-10', '19:01:00'),
(127, '::1', '2020-07-10', '19:01:00'),
(128, '::1', '2020-07-10', '19:01:00'),
(129, '::1', '2020-07-10', '19:01:00'),
(130, '::1', '2020-07-10', '19:01:00'),
(131, '::1', '2020-07-10', '19:01:00'),
(132, '::1', '2020-07-10', '19:10:00'),
(133, '::1', '2020-07-10', '19:10:00'),
(134, '::1', '2020-07-10', '19:10:00'),
(135, '::1', '2020-07-10', '19:10:00'),
(136, '::1', '2020-07-10', '19:11:00'),
(137, '::1', '2020-07-10', '19:11:00'),
(138, '::1', '2020-07-10', '19:11:00'),
(139, '::1', '2020-07-10', '19:11:00'),
(140, '::1', '2020-07-10', '19:11:00'),
(141, '::1', '2020-07-10', '19:11:00'),
(142, '::1', '2020-07-10', '19:11:00'),
(143, '::1', '2020-07-10', '19:11:00'),
(144, '::1', '2020-07-10', '19:11:00'),
(145, '::1', '2020-07-10', '19:12:00'),
(146, '::1', '2020-07-10', '19:36:00'),
(147, '::1', '2020-07-10', '19:36:00'),
(148, '::1', '2020-07-10', '19:36:00'),
(149, '::1', '2020-07-10', '19:36:00'),
(150, '::1', '2020-07-10', '19:36:00'),
(151, '::1', '2020-07-10', '19:42:00'),
(152, '::1', '2020-07-10', '19:42:00'),
(153, '::1', '2020-07-10', '19:43:00'),
(154, '::1', '2020-07-10', '19:43:00'),
(155, '::1', '2020-07-10', '19:43:00'),
(156, '::1', '2020-07-10', '19:43:00'),
(157, '::1', '2020-07-10', '19:43:00'),
(158, '::1', '2020-07-10', '19:43:00'),
(159, '::1', '2020-07-10', '19:45:00'),
(160, '::1', '2020-07-10', '19:45:00'),
(161, '::1', '2020-07-10', '19:45:00'),
(162, '::1', '2020-07-10', '19:45:00'),
(163, '::1', '2020-07-10', '19:45:00'),
(164, '::1', '2020-07-10', '19:45:00'),
(165, '::1', '2020-07-10', '19:45:00'),
(166, '::1', '2020-07-10', '19:46:00'),
(167, '::1', '2020-07-10', '19:46:00'),
(168, '::1', '2020-07-10', '19:47:00'),
(169, '::1', '2020-07-10', '19:47:00'),
(170, '::1', '2020-07-10', '19:48:00'),
(171, '::1', '2020-07-10', '19:48:00'),
(172, '::1', '2020-07-10', '19:48:00'),
(173, '::1', '2020-07-10', '19:49:00'),
(174, '::1', '2020-07-10', '19:50:00'),
(175, '::1', '2020-07-10', '19:51:00'),
(176, '::1', '2020-07-10', '19:53:00'),
(177, '::1', '2020-07-10', '19:53:00'),
(178, '::1', '2020-07-10', '19:55:00'),
(179, '::1', '2020-07-10', '19:55:00'),
(180, '::1', '2020-07-10', '19:55:00'),
(181, '::1', '2020-07-10', '19:55:00'),
(182, '::1', '2020-07-10', '19:55:00'),
(183, '::1', '2020-07-10', '19:56:00'),
(184, '::1', '2020-07-10', '19:56:00'),
(185, '::1', '2020-07-10', '19:56:00'),
(186, '::1', '2020-07-10', '19:56:00'),
(187, '::1', '2020-07-10', '19:57:00'),
(188, '::1', '2020-07-10', '19:57:00'),
(189, '::1', '2020-07-10', '19:58:00'),
(190, '::1', '2020-07-10', '20:00:00'),
(191, '::1', '2020-07-10', '20:00:00'),
(192, '::1', '2020-07-10', '20:00:00'),
(193, '::1', '2020-07-10', '20:04:00'),
(194, '::1', '2020-07-10', '20:04:00'),
(195, '::1', '2020-07-10', '20:05:00'),
(196, '::1', '2020-07-10', '20:05:00'),
(197, '::1', '2020-07-10', '20:06:00'),
(198, '::1', '2020-07-10', '20:07:00'),
(199, '::1', '2020-07-10', '20:07:00'),
(200, '::1', '2020-07-10', '20:07:00'),
(201, '::1', '2020-07-10', '20:18:00'),
(202, '::1', '2020-07-10', '20:22:00'),
(203, '::1', '2020-07-10', '20:22:00'),
(204, '::1', '2020-07-10', '20:40:00'),
(205, '::1', '2020-07-10', '20:43:00'),
(206, '::1', '2020-07-10', '20:44:00'),
(207, '::1', '2020-07-10', '20:44:00'),
(208, '::1', '2020-07-10', '20:45:00'),
(209, '::1', '2020-07-10', '20:45:00'),
(210, '::1', '2020-07-10', '20:45:00'),
(211, '::1', '2020-07-10', '20:48:00'),
(212, '::1', '2020-07-10', '20:48:00'),
(213, '::1', '2020-07-10', '20:48:00'),
(214, '::1', '2020-07-10', '20:48:00'),
(215, '::1', '2020-07-10', '20:48:00'),
(216, '::1', '2020-07-10', '20:48:00'),
(217, '::1', '2020-07-10', '20:48:00'),
(218, '::1', '2020-07-10', '21:04:00'),
(219, '::1', '2020-07-10', '21:19:00'),
(220, '::1', '2020-07-10', '21:41:00'),
(221, '::1', '2020-07-10', '21:42:00'),
(222, '::1', '2020-07-10', '21:42:00'),
(223, '::1', '2020-07-10', '21:43:00'),
(224, '::1', '2020-07-10', '21:43:00'),
(225, '::1', '2020-07-10', '21:43:00'),
(226, '::1', '2020-07-10', '21:59:00'),
(227, '::1', '2020-07-10', '22:59:00'),
(228, '::1', '2020-07-13', '14:24:00'),
(229, '::1', '2020-07-13', '15:01:00'),
(230, '::1', '2020-07-13', '15:16:00'),
(231, '::1', '2020-07-13', '16:29:00'),
(232, '::1', '2020-07-13', '16:33:00'),
(233, '::1', '2020-07-13', '16:54:00'),
(234, '::1', '2020-07-13', '17:51:00'),
(235, '::1', '2020-07-13', '17:59:00'),
(236, '::1', '2020-07-13', '18:01:00'),
(237, '::1', '2020-07-13', '18:42:00'),
(238, '::1', '2020-07-13', '19:28:00'),
(239, '::1', '2020-07-13', '19:45:00'),
(240, '::1', '2020-07-13', '19:46:00'),
(241, '::1', '2020-07-13', '19:47:00'),
(242, '::1', '2020-07-13', '20:16:00'),
(243, '::1', '2020-07-13', '20:17:00'),
(244, '::1', '2020-07-13', '20:17:00'),
(245, '::1', '2020-07-13', '20:17:00'),
(246, '::1', '2020-07-13', '20:17:00'),
(247, '::1', '2020-07-13', '20:17:00'),
(248, '::1', '2020-07-13', '20:17:00'),
(249, '::1', '2020-07-13', '20:19:00'),
(250, '::1', '2020-07-13', '20:19:00'),
(251, '::1', '2020-07-13', '20:26:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contractfiles`
--
ALTER TABLE `contractfiles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `hvifiles`
--
ALTER TABLE `hvifiles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `nffiles`
--
ALTER TABLE `nffiles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `radarfiles`
--
ALTER TABLE `radarfiles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contractfiles`
--
ALTER TABLE `contractfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `hvifiles`
--
ALTER TABLE `hvifiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `nffiles`
--
ALTER TABLE `nffiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `radarfiles`
--
ALTER TABLE `radarfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `times`
--
ALTER TABLE `times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
