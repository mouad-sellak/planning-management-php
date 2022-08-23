-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2021 at 08:17 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_plannings`
--

-- --------------------------------------------------------

--
-- Table structure for table `annee`
--

CREATE TABLE `annee` (
  `id` int(11) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annee`
--

INSERT INTO `annee` (`id`, `annee`) VALUES
(1, 2021),
(2, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `groupes`
--

CREATE TABLE `groupes` (
  `id` int(10) NOT NULL,
  `nom_groupe` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `visible` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupes`
--

INSERT INTO `groupes` (`id`, `nom_groupe`, `image`, `visible`, `id_region`) VALUES
(1, 'FES1', '1.jpg', 1, 1),
(2, 'FES4', '2.jpg', 1, 1),
(3, 'FES5', '3.jpg', 1, 1),
(4, 'FES6', '4.jpg', 0, 1),
(5, 'MEK1', '5.png', 0, 1),
(6, 'RBT1', '6.jpg', 0, 2),
(7, 'RBT2', '7.jpg', 0, 2),
(8, 'RBT6', '8.jpg', 0, 2),
(9, 'RBT8', '9.jpg', 0, 2),
(10, 'Sale', '10.jpg', 0, 2),
(11, 'KEN1', '11.png', 0, 2),
(12, 'AGA2', '13.jpg', 0, 3),
(13, 'AGA3', '14.jpg', 0, 3),
(14, 'AGA4', '15.jpg', 0, 3),
(15, 'MRK1', '10.jpg', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `horaires`
--

CREATE TABLE `horaires` (
  `id` int(11) NOT NULL,
  `heure` varchar(20) NOT NULL,
  `etat` int(11) NOT NULL,
  `absence` varchar(20) NOT NULL,
  `id_jour` int(11) NOT NULL,
  `id_tech` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `horaires`
--

INSERT INTO `horaires` (`id`, `heure`, `etat`, `absence`, `id_jour`, `id_tech`) VALUES
(1, '07h00', 1, 'Maladie', 1, 1),
(2, '08h00', 1, 'Maladie', 1, 1),
(3, '09h00', 1, 'Maladie', 1, 1),
(4, '10h00', 1, 'Maladie', 1, 1),
(5, '11h00', 1, 'Maladie', 1, 1),
(6, '12h00', 0, 'Non', 1, 1),
(7, '13h00', 0, 'Non', 1, 1),
(8, '14h00', 1, 'Maladie', 1, 1),
(9, '15h00', 1, 'Maladie', 1, 1),
(10, '16h00', 1, 'Maladie', 1, 1),
(11, '17h00', 0, 'Non', 1, 1),
(12, '18h00', 0, 'Non', 1, 1),
(13, '19h00', 0, 'Non', 1, 1),
(14, '20h00', 0, 'Non', 1, 1),
(15, '07h00', 1, 'Non', 2, 1),
(16, '08h00', 1, 'Conge', 2, 1),
(17, '09h00', 1, 'Conge', 2, 1),
(18, '10h00', 1, 'Conge', 2, 1),
(19, '11h00', 1, 'Conge', 2, 1),
(20, '12h00', 0, 'Non', 2, 1),
(21, '13h00', 0, 'Non', 2, 1),
(22, '14h00', 1, 'Non', 2, 1),
(23, '15h00', 1, 'Conge', 2, 1),
(24, '16h00', 1, 'Conge', 2, 1),
(25, '17h00', 0, 'Non', 2, 1),
(26, '18h00', 0, 'Non', 2, 1),
(27, '19h00', 0, 'Non', 2, 1),
(28, '20h00', 0, 'Non', 2, 1),
(29, '07h00', 1, 'Maladie', 3, 1),
(30, '08h00', 1, 'Maladie', 3, 1),
(31, '09h00', 1, 'Maladie', 3, 1),
(32, '10h00', 1, 'Maladie', 3, 1),
(33, '11h00', 1, 'Maladie', 3, 1),
(34, '12h00', 0, 'Non', 3, 1),
(35, '13h00', 0, 'Non', 3, 1),
(36, '14h00', 1, 'Maladie', 3, 1),
(37, '15h00', 1, 'Maladie', 3, 1),
(38, '16h00', 1, 'Maladie', 3, 1),
(39, '17h00', 0, 'Non', 3, 1),
(40, '18h00', 0, 'Non', 3, 1),
(41, '19h00', 0, 'Non', 3, 1),
(42, '20h00', 0, 'Non', 3, 1),
(43, '07h00', 1, 'Non', 4, 1),
(44, '08h00', 1, 'Non', 4, 1),
(45, '09h00', 1, 'Non', 4, 1),
(46, '10h00', 1, 'Non', 4, 1),
(47, '11h00', 1, 'Non', 4, 1),
(48, '12h00', 0, 'Non', 4, 1),
(49, '13h00', 0, 'Non', 4, 1),
(50, '14h00', 1, 'Non', 4, 1),
(51, '15h00', 1, 'Non', 4, 1),
(52, '16h00', 1, 'Non', 4, 1),
(53, '17h00', 0, 'Non', 4, 1),
(54, '18h00', 0, 'Non', 4, 1),
(55, '19h00', 0, 'Non', 4, 1),
(56, '20h00', 0, 'Non', 4, 1),
(57, '07h00', 1, 'Non', 5, 1),
(58, '08h00', 1, 'Non', 5, 1),
(59, '09h00', 1, 'Non', 5, 1),
(60, '10h00', 1, 'Non', 5, 1),
(61, '11h00', 1, 'Non', 5, 1),
(62, '12h00', 0, 'Non', 5, 1),
(63, '13h00', 0, 'Non', 5, 1),
(64, '14h00', 1, 'Non', 5, 1),
(65, '15h00', 1, 'Non', 5, 1),
(66, '16h00', 1, 'Non', 5, 1),
(67, '17h00', 0, 'Non', 5, 1),
(68, '18h00', 0, 'Non', 5, 1),
(69, '19h00', 0, 'Non', 5, 1),
(70, '20h00', 0, 'Non', 5, 1),
(71, '09h00', 1, 'Conge', 6, 1),
(72, '10h00', 1, 'Conge', 6, 1),
(73, '11h00', 1, 'Conge', 6, 1),
(74, '12h00', 1, 'Non', 6, 1),
(75, '13h00', 0, 'Non', 6, 1),
(76, '14h00', 0, 'Non', 6, 1),
(77, '15h00', 0, 'Non', 6, 1),
(78, '16h00', 0, 'Non', 6, 1),
(79, '17h00', 0, 'Non', 6, 1),
(80, '07h00', 0, 'Non', 1, 2),
(81, '08h00', 1, 'Maladie', 1, 2),
(82, '09h00', 1, 'Maladie', 1, 2),
(83, '10h00', 1, 'Maladie', 1, 2),
(84, '11h00', 1, 'Maladie', 1, 2),
(85, '12h00', 1, 'Non', 1, 2),
(86, '13h00', 0, 'Non', 1, 2),
(87, '14h00', 0, 'Non', 1, 2),
(88, '15h00', 1, 'Maladie', 1, 2),
(89, '16h00', 1, 'Maladie', 1, 2),
(90, '17h00', 1, 'Non', 1, 2),
(91, '18h00', 0, 'Non', 1, 2),
(92, '19h00', 0, 'Non', 1, 2),
(93, '20h00', 0, 'Non', 1, 2),
(94, '07h00', 0, 'Non', 2, 2),
(95, '08h00', 1, 'Conge', 2, 2),
(96, '09h00', 1, 'Conge', 2, 2),
(97, '10h00', 1, 'Conge', 2, 2),
(98, '11h00', 1, 'Conge', 2, 2),
(99, '12h00', 1, 'Non', 2, 2),
(100, '13h00', 0, 'Non', 2, 2),
(101, '14h00', 0, 'Non', 2, 2),
(102, '15h00', 1, 'Conge', 2, 2),
(103, '16h00', 1, 'Conge', 2, 2),
(104, '17h00', 1, 'Non', 2, 2),
(105, '18h00', 0, 'Non', 2, 2),
(106, '19h00', 0, 'Non', 2, 2),
(107, '20h00', 0, 'Non', 2, 2),
(108, '07h00', 0, 'Conge', 3, 2),
(109, '08h00', 0, 'Conge', 3, 2),
(110, '09h00', 0, 'Conge', 3, 2),
(111, '10h00', 0, 'Conge', 3, 2),
(112, '11h00', 0, 'Conge', 3, 2),
(113, '12h00', 0, 'Conge', 3, 2),
(114, '13h00', 0, 'Conge', 3, 2),
(115, '14h00', 0, 'Conge', 3, 2),
(116, '15h00', 0, 'Conge', 3, 2),
(117, '16h00', 0, 'Conge', 3, 2),
(118, '17h00', 0, 'Conge', 3, 2),
(119, '18h00', 0, 'Conge', 3, 2),
(120, '19h00', 0, 'Conge', 3, 2),
(121, '20h00', 0, 'Conge', 3, 2),
(122, '07h00', 0, 'Non', 4, 2),
(123, '08h00', 1, 'Non', 4, 2),
(124, '09h00', 1, 'Non', 4, 2),
(125, '10h00', 1, 'Non', 4, 2),
(126, '11h00', 1, 'Non', 4, 2),
(127, '12h00', 1, 'Non', 4, 2),
(128, '13h00', 0, 'Non', 4, 2),
(129, '14h00', 0, 'Non', 4, 2),
(130, '15h00', 1, 'Non', 4, 2),
(131, '16h00', 1, 'Non', 4, 2),
(132, '17h00', 1, 'Non', 4, 2),
(133, '18h00', 0, 'Non', 4, 2),
(134, '19h00', 0, 'Non', 4, 2),
(135, '20h00', 0, 'Non', 4, 2),
(136, '07h00', 0, 'Non', 5, 2),
(137, '08h00', 1, 'Non', 5, 2),
(138, '09h00', 1, 'Non', 5, 2),
(139, '10h00', 1, 'Non', 5, 2),
(140, '11h00', 1, 'Non', 5, 2),
(141, '12h00', 1, 'Non', 5, 2),
(142, '13h00', 0, 'Non', 5, 2),
(143, '14h00', 0, 'Non', 5, 2),
(144, '15h00', 1, 'Non', 5, 2),
(145, '16h00', 1, 'Non', 5, 2),
(146, '17h00', 1, 'Non', 5, 2),
(147, '18h00', 0, 'Non', 5, 2),
(148, '19h00', 0, 'Non', 5, 2),
(149, '20h00', 0, 'Non', 5, 2),
(150, '09h00', 1, 'Conge', 6, 2),
(151, '10h00', 1, 'Conge', 6, 2),
(152, '11h00', 1, 'Conge', 6, 2),
(153, '12h00', 1, 'Conge', 6, 2),
(154, '13h00', 0, 'Non', 6, 2),
(155, '14h00', 0, 'Non', 6, 2),
(156, '15h00', 0, 'Non', 6, 2),
(157, '16h00', 0, 'Non', 6, 2),
(158, '17h00', 0, 'Non', 6, 2),
(159, '07h00', 0, 'Non', 1, 3),
(160, '08h00', 0, 'Non', 1, 3),
(161, '09h00', 1, 'Maladie', 1, 3),
(162, '10h00', 1, 'Maladie', 1, 3),
(163, '11h00', 1, 'Maladie', 1, 3),
(164, '12h00', 1, 'Non', 1, 3),
(165, '13h00', 1, 'Non', 1, 3),
(166, '14h00', 0, 'Non', 1, 3),
(167, '15h00', 0, 'Non', 1, 3),
(168, '16h00', 1, 'Maladie', 1, 3),
(169, '17h00', 1, 'Non', 1, 3),
(170, '18h00', 1, 'Non', 1, 3),
(171, '19h00', 0, 'Non', 1, 3),
(172, '20h00', 0, 'Non', 1, 3),
(173, '07h00', 0, 'Non', 2, 3),
(174, '08h00', 0, 'Non', 2, 3),
(175, '09h00', 1, 'Conge', 2, 3),
(176, '10h00', 1, 'Conge', 2, 3),
(177, '11h00', 1, 'Conge', 2, 3),
(178, '12h00', 1, 'Non', 2, 3),
(179, '13h00', 1, 'Non', 2, 3),
(180, '14h00', 0, 'Non', 2, 3),
(181, '15h00', 0, 'Non', 2, 3),
(182, '16h00', 1, 'Conge', 2, 3),
(183, '17h00', 1, 'Non', 2, 3),
(184, '18h00', 1, 'Non', 2, 3),
(185, '19h00', 0, 'Non', 2, 3),
(186, '20h00', 0, 'Non', 2, 3),
(187, '07h00', 0, 'Non', 3, 3),
(188, '08h00', 0, 'Non', 3, 3),
(189, '09h00', 1, 'Maladie', 3, 3),
(190, '10h00', 1, 'Maladie', 3, 3),
(191, '11h00', 1, 'Maladie', 3, 3),
(192, '12h00', 1, 'Maladie', 3, 3),
(193, '13h00', 1, 'Maladie', 3, 3),
(194, '14h00', 0, 'Non', 3, 3),
(195, '15h00', 0, 'Non', 3, 3),
(196, '16h00', 1, 'Maladie', 3, 3),
(197, '17h00', 1, 'Maladie', 3, 3),
(198, '18h00', 1, 'Maladie', 3, 3),
(199, '19h00', 0, 'Non', 3, 3),
(200, '20h00', 0, 'Non', 3, 3),
(201, '07h00', 0, 'Maladie', 4, 3),
(202, '08h00', 0, 'Maladie', 4, 3),
(203, '09h00', 0, 'Maladie', 4, 3),
(204, '10h00', 0, 'Maladie', 4, 3),
(205, '11h00', 0, 'Maladie', 4, 3),
(206, '12h00', 0, 'Maladie', 4, 3),
(207, '13h00', 0, 'Maladie', 4, 3),
(208, '14h00', 0, 'Maladie', 4, 3),
(209, '15h00', 0, 'Maladie', 4, 3),
(210, '16h00', 0, 'Maladie', 4, 3),
(211, '17h00', 0, 'Maladie', 4, 3),
(212, '18h00', 0, 'Maladie', 4, 3),
(213, '19h00', 0, 'Maladie', 4, 3),
(214, '20h00', 0, 'Maladie', 4, 3),
(215, '07h00', 0, 'Non', 5, 3),
(216, '08h00', 0, 'Non', 5, 3),
(217, '09h00', 1, 'Non', 5, 3),
(218, '10h00', 1, 'Non', 5, 3),
(219, '11h00', 1, 'Non', 5, 3),
(220, '12h00', 1, 'Non', 5, 3),
(221, '13h00', 1, 'Non', 5, 3),
(222, '14h00', 0, 'Non', 5, 3),
(223, '15h00', 0, 'Non', 5, 3),
(224, '16h00', 1, 'Non', 5, 3),
(225, '17h00', 1, 'Non', 5, 3),
(226, '18h00', 1, 'Non', 5, 3),
(227, '19h00', 0, 'Non', 5, 3),
(228, '20h00', 0, 'Non', 5, 3),
(229, '09h00', 1, 'Conge', 6, 3),
(230, '10h00', 1, 'Conge', 6, 3),
(231, '11h00', 1, 'Conge', 6, 3),
(232, '12h00', 1, 'Conge', 6, 3),
(233, '13h00', 0, 'Non', 6, 3),
(234, '14h00', 0, 'Non', 6, 3),
(235, '15h00', 0, 'Non', 6, 3),
(236, '16h00', 0, 'Non', 6, 3),
(237, '17h00', 0, 'Non', 6, 3),
(238, '07h00', 0, 'Non', 1, 4),
(239, '08h00', 0, 'Non', 1, 4),
(240, '09h00', 0, 'Non', 1, 4),
(241, '10h00', 1, 'Maladie', 1, 4),
(242, '11h00', 1, 'Maladie', 1, 4),
(243, '12h00', 1, 'Non', 1, 4),
(244, '13h00', 1, 'Non', 1, 4),
(245, '14h00', 1, 'Maladie', 1, 4),
(246, '15h00', 0, 'Non', 1, 4),
(247, '16h00', 0, 'Non', 1, 4),
(248, '17h00', 1, 'Non', 1, 4),
(249, '18h00', 1, 'Non', 1, 4),
(250, '19h00', 1, 'Non', 1, 4),
(251, '20h00', 0, 'Non', 1, 4),
(252, '07h00', 0, 'Non', 2, 4),
(253, '08h00', 0, 'Non', 2, 4),
(254, '09h00', 0, 'Non', 2, 4),
(255, '10h00', 1, 'Conge', 2, 4),
(256, '11h00', 1, 'Conge', 2, 4),
(257, '12h00', 1, 'Non', 2, 4),
(258, '13h00', 1, 'Non', 2, 4),
(259, '14h00', 1, 'Non', 2, 4),
(260, '15h00', 0, 'Non', 2, 4),
(261, '16h00', 0, 'Non', 2, 4),
(262, '17h00', 1, 'Non', 2, 4),
(263, '18h00', 1, 'Non', 2, 4),
(264, '19h00', 1, 'Non', 2, 4),
(265, '20h00', 0, 'Non', 2, 4),
(266, '07h00', 0, 'Non', 3, 4),
(267, '08h00', 0, 'Non', 3, 4),
(268, '09h00', 0, 'Non', 3, 4),
(269, '10h00', 1, 'Maladie', 3, 4),
(270, '11h00', 1, 'Maladie', 3, 4),
(271, '12h00', 1, 'Maladie', 3, 4),
(272, '13h00', 1, 'Maladie', 3, 4),
(273, '14h00', 1, 'Maladie', 3, 4),
(274, '15h00', 0, 'Non', 3, 4),
(275, '16h00', 0, 'Non', 3, 4),
(276, '17h00', 1, 'Maladie', 3, 4),
(277, '18h00', 1, 'Maladie', 3, 4),
(278, '19h00', 1, 'Maladie', 3, 4),
(279, '20h00', 0, 'Non', 3, 4),
(280, '07h00', 0, 'Non', 4, 4),
(281, '08h00', 0, 'Non', 4, 4),
(282, '09h00', 0, 'Non', 4, 4),
(283, '10h00', 1, 'Non', 4, 4),
(284, '11h00', 1, 'Non', 4, 4),
(285, '12h00', 1, 'Non', 4, 4),
(286, '13h00', 1, 'Non', 4, 4),
(287, '14h00', 1, 'Non', 4, 4),
(288, '15h00', 0, 'Non', 4, 4),
(289, '16h00', 0, 'Non', 4, 4),
(290, '17h00', 1, 'Non', 4, 4),
(291, '18h00', 1, 'Non', 4, 4),
(292, '19h00', 1, 'Non', 4, 4),
(293, '20h00', 0, 'Non', 4, 4),
(294, '07h00', 0, 'Non', 5, 4),
(295, '08h00', 0, 'Non', 5, 4),
(296, '09h00', 0, 'Non', 5, 4),
(297, '10h00', 1, 'Non', 5, 4),
(298, '11h00', 1, 'Non', 5, 4),
(299, '12h00', 1, 'Non', 5, 4),
(300, '13h00', 1, 'Non', 5, 4),
(301, '14h00', 1, 'Non', 5, 4),
(302, '15h00', 0, 'Non', 5, 4),
(303, '16h00', 0, 'Non', 5, 4),
(304, '17h00', 1, 'Non', 5, 4),
(305, '18h00', 1, 'Non', 5, 4),
(306, '19h00', 1, 'Non', 5, 4),
(307, '20h00', 0, 'Non', 5, 4),
(308, '09h00', 1, 'Conge', 6, 4),
(309, '10h00', 1, 'Conge', 6, 4),
(310, '11h00', 1, 'Conge', 6, 4),
(311, '12h00', 1, 'Conge', 6, 4),
(312, '13h00', 0, 'Non', 6, 4),
(313, '14h00', 0, 'Non', 6, 4),
(314, '15h00', 0, 'Non', 6, 4),
(315, '16h00', 0, 'Non', 6, 4),
(316, '17h00', 0, 'Non', 6, 4),
(317, '07h00', 0, 'Non', 8, 1),
(318, '08h00', 0, 'Non', 8, 1),
(319, '09h00', 0, 'Non', 8, 1),
(320, '10h00', 1, 'Maladie', 8, 1),
(321, '11h00', 1, 'Maladie', 8, 1),
(322, '12h00', 1, 'Non', 8, 1),
(323, '13h00', 1, 'Non', 8, 1),
(324, '14h00', 1, 'Non', 8, 1),
(325, '15h00', 0, 'Non', 8, 1),
(326, '16h00', 0, 'Non', 8, 1),
(327, '17h00', 1, 'Non', 8, 1),
(328, '18h00', 1, 'Non', 8, 1),
(329, '19h00', 1, 'Non', 8, 1),
(330, '20h00', 0, 'Non', 8, 1),
(331, '07h00', 0, 'Non', 9, 1),
(332, '08h00', 0, 'Non', 9, 1),
(333, '09h00', 0, 'Non', 9, 1),
(334, '10h00', 1, 'Conge', 9, 1),
(335, '11h00', 1, 'Conge', 9, 1),
(336, '12h00', 1, 'Non', 9, 1),
(337, '13h00', 1, 'Non', 9, 1),
(338, '14h00', 1, 'Non', 9, 1),
(339, '15h00', 0, 'Non', 9, 1),
(340, '16h00', 0, 'Non', 9, 1),
(341, '17h00', 1, 'Non', 9, 1),
(342, '18h00', 1, 'Non', 9, 1),
(343, '19h00', 1, 'Non', 9, 1),
(344, '20h00', 0, 'Non', 9, 1),
(345, '07h00', 0, 'Non', 10, 1),
(346, '08h00', 0, 'Non', 10, 1),
(347, '09h00', 0, 'Non', 10, 1),
(348, '10h00', 1, 'Maladie', 10, 1),
(349, '11h00', 1, 'Maladie', 10, 1),
(350, '12h00', 1, 'Maladie', 10, 1),
(351, '13h00', 1, 'Maladie', 10, 1),
(352, '14h00', 1, 'Maladie', 10, 1),
(353, '15h00', 0, 'Non', 10, 1),
(354, '16h00', 0, 'Non', 10, 1),
(355, '17h00', 1, 'Maladie', 10, 1),
(356, '18h00', 1, 'Maladie', 10, 1),
(357, '19h00', 1, 'Maladie', 10, 1),
(358, '20h00', 0, 'Non', 10, 1),
(359, '07h00', 0, 'Non', 11, 1),
(360, '08h00', 0, 'Non', 11, 1),
(361, '09h00', 0, 'Non', 11, 1),
(362, '10h00', 1, 'Non', 11, 1),
(363, '11h00', 1, 'Non', 11, 1),
(364, '12h00', 1, 'Non', 11, 1),
(365, '13h00', 1, 'Non', 11, 1),
(366, '14h00', 1, 'Non', 11, 1),
(367, '15h00', 0, 'Non', 11, 1),
(368, '16h00', 0, 'Non', 11, 1),
(369, '17h00', 1, 'Non', 11, 1),
(370, '18h00', 1, 'Non', 11, 1),
(371, '19h00', 1, 'Non', 11, 1),
(372, '20h00', 0, 'Non', 11, 1),
(373, '07h00', 0, 'Non', 12, 1),
(374, '08h00', 0, 'Non', 12, 1),
(375, '09h00', 0, 'Non', 12, 1),
(376, '10h00', 1, 'Non', 12, 1),
(377, '11h00', 1, 'Non', 12, 1),
(378, '12h00', 1, 'Non', 12, 1),
(379, '13h00', 1, 'Non', 12, 1),
(380, '14h00', 1, 'Non', 12, 1),
(381, '15h00', 0, 'Non', 12, 1),
(382, '16h00', 0, 'Non', 12, 1),
(383, '17h00', 1, 'Non', 12, 1),
(384, '18h00', 1, 'Non', 12, 1),
(385, '19h00', 1, 'Non', 12, 1),
(386, '20h00', 0, 'Non', 12, 1),
(387, '09h00', 0, 'Non', 13, 1),
(388, '10h00', 0, 'Non', 13, 1),
(389, '11h00', 0, 'Non', 13, 1),
(390, '12h00', 1, 'Conge', 13, 1),
(391, '13h00', 1, 'Non', 13, 1),
(392, '14h00', 1, 'Non', 13, 1),
(393, '15h00', 1, 'Non', 13, 1),
(394, '16h00', 0, 'Non', 13, 1),
(395, '17h00', 0, 'Non', 13, 1),
(396, '07h00', 0, 'Non', 8, 2),
(397, '08h00', 0, 'Non', 8, 2),
(398, '09h00', 1, 'Maladie', 8, 2),
(399, '10h00', 1, 'Maladie', 8, 2),
(400, '11h00', 1, 'Maladie', 8, 2),
(401, '12h00', 1, 'Non', 8, 2),
(402, '13h00', 1, 'Non', 8, 2),
(403, '14h00', 0, 'Non', 8, 2),
(404, '15h00', 0, 'Non', 8, 2),
(405, '16h00', 1, 'Maladie', 8, 2),
(406, '17h00', 1, 'Non', 8, 2),
(407, '18h00', 1, 'Non', 8, 2),
(408, '19h00', 0, 'Non', 8, 2),
(409, '20h00', 0, 'Non', 8, 2),
(410, '07h00', 0, 'Conge', 9, 2),
(411, '08h00', 0, 'Conge', 9, 2),
(412, '09h00', 0, 'Conge', 9, 2),
(413, '10h00', 0, 'Conge', 9, 2),
(414, '11h00', 0, 'Conge', 9, 2),
(415, '12h00', 0, 'Conge', 9, 2),
(416, '13h00', 0, 'Conge', 9, 2),
(417, '14h00', 0, 'Conge', 9, 2),
(418, '15h00', 0, 'Conge', 9, 2),
(419, '16h00', 0, 'Conge', 9, 2),
(420, '17h00', 0, 'Conge', 9, 2),
(421, '18h00', 0, 'Conge', 9, 2),
(422, '19h00', 0, 'Conge', 9, 2),
(423, '20h00', 0, 'Conge', 9, 2),
(424, '07h00', 0, 'Non', 10, 2),
(425, '08h00', 0, 'Non', 10, 2),
(426, '09h00', 1, 'Maladie', 10, 2),
(427, '10h00', 1, 'Maladie', 10, 2),
(428, '11h00', 1, 'Maladie', 10, 2),
(429, '12h00', 1, 'Maladie', 10, 2),
(430, '13h00', 1, 'Maladie', 10, 2),
(431, '14h00', 0, 'Non', 10, 2),
(432, '15h00', 0, 'Non', 10, 2),
(433, '16h00', 1, 'Maladie', 10, 2),
(434, '17h00', 1, 'Maladie', 10, 2),
(435, '18h00', 1, 'Maladie', 10, 2),
(436, '19h00', 0, 'Non', 10, 2),
(437, '20h00', 0, 'Non', 10, 2),
(438, '07h00', 0, 'Non', 11, 2),
(439, '08h00', 0, 'Non', 11, 2),
(440, '09h00', 1, 'Non', 11, 2),
(441, '10h00', 1, 'Non', 11, 2),
(442, '11h00', 1, 'Non', 11, 2),
(443, '12h00', 1, 'Non', 11, 2),
(444, '13h00', 1, 'Non', 11, 2),
(445, '14h00', 0, 'Non', 11, 2),
(446, '15h00', 0, 'Non', 11, 2),
(447, '16h00', 1, 'Non', 11, 2),
(448, '17h00', 1, 'Non', 11, 2),
(449, '18h00', 1, 'Non', 11, 2),
(450, '19h00', 0, 'Non', 11, 2),
(451, '20h00', 0, 'Non', 11, 2),
(452, '07h00', 0, 'Non', 12, 2),
(453, '08h00', 0, 'Non', 12, 2),
(454, '09h00', 1, 'Non', 12, 2),
(455, '10h00', 1, 'Non', 12, 2),
(456, '11h00', 1, 'Non', 12, 2),
(457, '12h00', 1, 'Non', 12, 2),
(458, '13h00', 1, 'Non', 12, 2),
(459, '14h00', 0, 'Non', 12, 2),
(460, '15h00', 0, 'Non', 12, 2),
(461, '16h00', 1, 'Non', 12, 2),
(462, '17h00', 1, 'Non', 12, 2),
(463, '18h00', 1, 'Non', 12, 2),
(464, '19h00', 0, 'Non', 12, 2),
(465, '20h00', 0, 'Non', 12, 2),
(466, '09h00', 1, 'Conge', 13, 2),
(467, '10h00', 1, 'Conge', 13, 2),
(468, '11h00', 1, 'Conge', 13, 2),
(469, '12h00', 1, 'Conge', 13, 2),
(470, '13h00', 0, 'Non', 13, 2),
(471, '14h00', 0, 'Non', 13, 2),
(472, '15h00', 0, 'Non', 13, 2),
(473, '16h00', 0, 'Non', 13, 2),
(474, '17h00', 0, 'Non', 13, 2),
(475, '07h00', 0, 'Non', 8, 3),
(476, '08h00', 1, 'Maladie', 8, 3),
(477, '09h00', 1, 'Maladie', 8, 3),
(478, '10h00', 1, 'Maladie', 8, 3),
(479, '11h00', 1, 'Maladie', 8, 3),
(480, '12h00', 1, 'Non', 8, 3),
(481, '13h00', 0, 'Non', 8, 3),
(482, '14h00', 0, 'Non', 8, 3),
(483, '15h00', 1, 'Maladie', 8, 3),
(484, '16h00', 1, 'Maladie', 8, 3),
(485, '17h00', 1, 'Non', 8, 3),
(486, '18h00', 0, 'Non', 8, 3),
(487, '19h00', 0, 'Non', 8, 3),
(488, '20h00', 0, 'Non', 8, 3),
(489, '07h00', 0, 'Non', 9, 3),
(490, '08h00', 1, 'Conge', 9, 3),
(491, '09h00', 1, 'Conge', 9, 3),
(492, '10h00', 1, 'Conge', 9, 3),
(493, '11h00', 1, 'Conge', 9, 3),
(494, '12h00', 1, 'Non', 9, 3),
(495, '13h00', 0, 'Non', 9, 3),
(496, '14h00', 0, 'Non', 9, 3),
(497, '15h00', 1, 'Conge', 9, 3),
(498, '16h00', 1, 'Conge', 9, 3),
(499, '17h00', 1, 'Non', 9, 3),
(500, '18h00', 0, 'Non', 9, 3),
(501, '19h00', 0, 'Non', 9, 3),
(502, '20h00', 0, 'Non', 9, 3),
(503, '07h00', 0, 'Non', 10, 3),
(504, '08h00', 1, 'Maladie', 10, 3),
(505, '09h00', 1, 'Maladie', 10, 3),
(506, '10h00', 1, 'Maladie', 10, 3),
(507, '11h00', 1, 'Maladie', 10, 3),
(508, '12h00', 1, 'Maladie', 10, 3),
(509, '13h00', 0, 'Non', 10, 3),
(510, '14h00', 0, 'Non', 10, 3),
(511, '15h00', 1, 'Maladie', 10, 3),
(512, '16h00', 1, 'Maladie', 10, 3),
(513, '17h00', 1, 'Maladie', 10, 3),
(514, '18h00', 0, 'Non', 10, 3),
(515, '19h00', 0, 'Non', 10, 3),
(516, '20h00', 0, 'Non', 10, 3),
(517, '07h00', 0, 'Maladie', 11, 3),
(518, '08h00', 0, 'Maladie', 11, 3),
(519, '09h00', 0, 'Maladie', 11, 3),
(520, '10h00', 0, 'Maladie', 11, 3),
(521, '11h00', 0, 'Maladie', 11, 3),
(522, '12h00', 0, 'Maladie', 11, 3),
(523, '13h00', 0, 'Maladie', 11, 3),
(524, '14h00', 0, 'Maladie', 11, 3),
(525, '15h00', 0, 'Maladie', 11, 3),
(526, '16h00', 0, 'Maladie', 11, 3),
(527, '17h00', 0, 'Maladie', 11, 3),
(528, '18h00', 0, 'Maladie', 11, 3),
(529, '19h00', 0, 'Maladie', 11, 3),
(530, '20h00', 0, 'Maladie', 11, 3),
(531, '07h00', 0, 'Non', 12, 3),
(532, '08h00', 1, 'Non', 12, 3),
(533, '09h00', 1, 'Non', 12, 3),
(534, '10h00', 1, 'Non', 12, 3),
(535, '11h00', 1, 'Non', 12, 3),
(536, '12h00', 1, 'Non', 12, 3),
(537, '13h00', 0, 'Non', 12, 3),
(538, '14h00', 0, 'Non', 12, 3),
(539, '15h00', 1, 'Non', 12, 3),
(540, '16h00', 1, 'Non', 12, 3),
(541, '17h00', 1, 'Non', 12, 3),
(542, '18h00', 0, 'Non', 12, 3),
(543, '19h00', 0, 'Non', 12, 3),
(544, '20h00', 0, 'Non', 12, 3),
(545, '09h00', 1, 'Conge', 13, 3),
(546, '10h00', 1, 'Conge', 13, 3),
(547, '11h00', 1, 'Conge', 13, 3),
(548, '12h00', 1, 'Conge', 13, 3),
(549, '13h00', 0, 'Non', 13, 3),
(550, '14h00', 0, 'Non', 13, 3),
(551, '15h00', 0, 'Non', 13, 3),
(552, '16h00', 0, 'Non', 13, 3),
(553, '17h00', 0, 'Non', 13, 3),
(554, '07h00', 1, 'Maladie', 8, 4),
(555, '08h00', 1, 'Maladie', 8, 4),
(556, '09h00', 1, 'Maladie', 8, 4),
(557, '10h00', 1, 'Maladie', 8, 4),
(558, '11h00', 1, 'Maladie', 8, 4),
(559, '12h00', 0, 'Non', 8, 4),
(560, '13h00', 0, 'Non', 8, 4),
(561, '14h00', 1, 'Maladie', 8, 4),
(562, '15h00', 1, 'Maladie', 8, 4),
(563, '16h00', 1, 'Maladie', 8, 4),
(564, '17h00', 0, 'Non', 8, 4),
(565, '18h00', 0, 'Non', 8, 4),
(566, '19h00', 0, 'Non', 8, 4),
(567, '20h00', 0, 'Non', 8, 4),
(568, '07h00', 1, 'Non', 9, 4),
(569, '08h00', 1, 'Conge', 9, 4),
(570, '09h00', 1, 'Conge', 9, 4),
(571, '10h00', 1, 'Conge', 9, 4),
(572, '11h00', 1, 'Conge', 9, 4),
(573, '12h00', 0, 'Non', 9, 4),
(574, '13h00', 0, 'Non', 9, 4),
(575, '14h00', 1, 'Non', 9, 4),
(576, '15h00', 1, 'Conge', 9, 4),
(577, '16h00', 1, 'Conge', 9, 4),
(578, '17h00', 0, 'Non', 9, 4),
(579, '18h00', 0, 'Non', 9, 4),
(580, '19h00', 0, 'Non', 9, 4),
(581, '20h00', 0, 'Non', 9, 4),
(582, '07h00', 1, 'Maladie', 10, 4),
(583, '08h00', 1, 'Maladie', 10, 4),
(584, '09h00', 1, 'Maladie', 10, 4),
(585, '10h00', 1, 'Maladie', 10, 4),
(586, '11h00', 1, 'Maladie', 10, 4),
(587, '12h00', 0, 'Non', 10, 4),
(588, '13h00', 0, 'Non', 10, 4),
(589, '14h00', 1, 'Maladie', 10, 4),
(590, '15h00', 1, 'Maladie', 10, 4),
(591, '16h00', 1, 'Maladie', 10, 4),
(592, '17h00', 0, 'Non', 10, 4),
(593, '18h00', 0, 'Non', 10, 4),
(594, '19h00', 0, 'Non', 10, 4),
(595, '20h00', 0, 'Non', 10, 4),
(596, '07h00', 1, 'Non', 11, 4),
(597, '08h00', 1, 'Non', 11, 4),
(598, '09h00', 1, 'Non', 11, 4),
(599, '10h00', 1, 'Non', 11, 4),
(600, '11h00', 1, 'Non', 11, 4),
(601, '12h00', 0, 'Non', 11, 4),
(602, '13h00', 0, 'Non', 11, 4),
(603, '14h00', 1, 'Non', 11, 4),
(604, '15h00', 1, 'Non', 11, 4),
(605, '16h00', 1, 'Non', 11, 4),
(606, '17h00', 0, 'Non', 11, 4),
(607, '18h00', 0, 'Non', 11, 4),
(608, '19h00', 0, 'Non', 11, 4),
(609, '20h00', 0, 'Non', 11, 4),
(610, '07h00', 1, 'Non', 12, 4),
(611, '08h00', 1, 'Non', 12, 4),
(612, '09h00', 1, 'Non', 12, 4),
(613, '10h00', 1, 'Non', 12, 4),
(614, '11h00', 1, 'Non', 12, 4),
(615, '12h00', 0, 'Non', 12, 4),
(616, '13h00', 0, 'Non', 12, 4),
(617, '14h00', 1, 'Non', 12, 4),
(618, '15h00', 1, 'Non', 12, 4),
(619, '16h00', 1, 'Non', 12, 4),
(620, '17h00', 0, 'Non', 12, 4),
(621, '18h00', 0, 'Non', 12, 4),
(622, '19h00', 0, 'Non', 12, 4),
(623, '20h00', 0, 'Non', 12, 4),
(624, '09h00', 1, 'Conge', 13, 4),
(625, '10h00', 1, 'Conge', 13, 4),
(626, '11h00', 1, 'Conge', 13, 4),
(627, '12h00', 1, 'Conge', 13, 4),
(628, '13h00', 0, 'Non', 13, 4),
(629, '14h00', 0, 'Non', 13, 4),
(630, '15h00', 0, 'Non', 13, 4),
(631, '16h00', 0, 'Non', 13, 4),
(632, '17h00', 0, 'Non', 13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `jours`
--

CREATE TABLE `jours` (
  `id` int(11) NOT NULL,
  `jour` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `id_semaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jours`
--

INSERT INTO `jours` (`id`, `jour`, `date`, `id_semaine`) VALUES
(1, 'Lundi', '2021-09-20', 38),
(2, 'Mardi', '2021-09-21', 38),
(3, 'Mercredi', '2021-09-22', 38),
(4, 'Jeudi', '2021-09-23', 38),
(5, 'Vendredi', '2021-09-24', 38),
(6, 'Samedi', '2021-09-25', 38),
(7, 'Dimanche', '2021-09-26', 38),
(8, 'Lundi', '2021-09-27', 39),
(9, 'Mardi', '2021-09-28', 39),
(10, 'Mercredi', '2021-09-29', 39),
(11, 'Jeudi', '2021-09-30', 39),
(12, 'Vendredi', '2021-10-01', 39),
(13, 'Samedi', '2021-10-02', 39);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(10) NOT NULL,
  `nom_region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `nom_region`) VALUES
(1, 'Fes-Meknès'),
(2, 'Rabat-Salé-Kenitra'),
(3, 'Agadir'),
(4, 'Marakech');

-- --------------------------------------------------------

--
-- Table structure for table `semaine`
--

CREATE TABLE `semaine` (
  `id` int(11) NOT NULL,
  `num_semaine` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semaine`
--

INSERT INTO `semaine` (`id`, `num_semaine`, `id_annee`) VALUES
(1, 38, 1),
(2, 39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `techniciens`
--

CREATE TABLE `techniciens` (
  `id` int(10) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `astreinte` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `email_tech` varchar(50) DEFAULT NULL,
  `login_tech` varchar(50) DEFAULT NULL,
  `pwd_tech` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `techniciens`
--

INSERT INTO `techniciens` (`id`, `id_groupe`, `nom`, `prenom`, `role`, `astreinte`, `etat`, `email_tech`, `login_tech`, `pwd_tech`) VALUES
(1, 2, 'Amine', 'Mohamed', 'TeamLeader', 1, 1, 'amine@g.com', 'amine', '6512bd43d9caa6e02c990b0a82652dca'),
(2, 2, 'Zidane', 'Rachid', 'Technicien', 0, 1, 'zidan@gm.com', 'zidane', '6512bd43d9caa6e02c990b0a82652dca'),
(3, 2, 'Ouali Idrissi', 'Mohamed', 'Technicien', 0, 1, '', '', ''),
(4, 2, 'Boujnoun', 'Nour Eddine ', 'Technicien', 0, 1, '', '', ''),
(5, 1, 'Tech1-Fes1', 'Tech1-Fes1', 'TeamLeader', 0, 1, '', '', ''),
(6, 1, 'Tech2-Fes1', 'Tech2-Fes1', 'Technicien', 0, 1, '', '', ''),
(7, 1, 'Tech3-Fes1', 'Tech3-Fes1', 'Technicien', 0, 1, '', '', ''),
(8, 1, 'Tech4-Fes1', 'Tech4-Fes1', 'Technicien', 0, 1, '', '', ''),
(9, 3, 'Tech1-Fes5', 'Tech1-Fes5', 'Technicien', 0, 1, '', '', ''),
(10, 3, 'Tech2-Fes5', 'Tech2-Fes5', 'Technicien', 0, 1, '', '', ''),
(11, 3, 'Tech3-Fes5', 'Tech3-Fes5', 'Technicien', 0, 1, '', '', ''),
(12, 3, 'Tech4-Fes5', 'Tech4-Fes5', 'Technicien', 0, 1, '', '', ''),
(13, 4, 'Tech1-Fes6', 'Tech1-Fes6', 'Technicien', 0, 1, '', '', ''),
(14, 4, 'Tech2-Fes6', 'Tech2-Fes6', 'Technicien', 0, 1, '', '', ''),
(15, 4, 'Tech3-Fes6', 'Tech3-Fes6', 'TeamLeader', 0, 1, '', '', ''),
(16, 4, 'Tech4-Fes6', 'Tech4-Fes6', 'Technicien', 0, 1, '', '', ''),
(17, 5, 'Tech1-Mek1', 'Tech1-Mek1', 'Technicien', 0, 1, '', '', ''),
(18, 5, 'Tech2-Mek1', 'Tech2-Mek1', 'Technicien', 0, 1, '', '', ''),
(19, 5, 'Tech3-Mek1', 'Tech3-Mek1', 'TeamLeader', 0, 1, '', '', ''),
(20, 5, 'Tech4-Mek1', 'Tech4-Mek1', 'Technicien', 0, 1, '', '', ''),
(21, 15, 'Tech1-Mrk1', 'Tech1-Mrk1', 'Technicien', 0, 1, '', '', ''),
(22, 15, 'Tech2-Mrk1', 'Tech2-Mrk1', 'Technicien', 0, 1, '', '', ''),
(23, 15, 'Tech3-Mrk1', 'Tech3-Mrk1', 'Technicien', 0, 1, '', '', ''),
(24, 15, 'Tech4-Mrk1', 'Tech4-Mrk1', 'Technicien', 0, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL DEFAULT '''''',
  `prenom` varchar(50) NOT NULL DEFAULT '''''',
  `image` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `etat` int(11) NOT NULL,
  `id_region` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL DEFAULT '',
  `pass` varchar(50) NOT NULL DEFAULT '',
  `admin_pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `nom`, `prenom`, `image`, `role`, `etat`, `id_region`, `email`, `login`, `pass`, `admin_pass`) VALUES
(46, 'Sellak', 'Mouad', 'Me1.jpg', 'Admin', 1, 1, 'mouaadsellak123@gmail.com', 'Ahmed', '4a7d1ed414474e4033ac29ccb8653d9b', '81dc9bdb52d04dc20036dbd8313ed055'),
(47, 'Samir', 'Samir', 'Samir1.jpg', 'Responsable', 1, 1, 'samir@gmail.com', 'samir', '6512bd43d9caa6e02c990b0a82652dca', '4a7d1ed414474e4033ac29ccb8653d9b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annee`
--
ALTER TABLE `annee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_region` (`id_region`);

--
-- Indexes for table `horaires`
--
ALTER TABLE `horaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jour` (`id_jour`),
  ADD KEY `id_tech` (`id_tech`);

--
-- Indexes for table `jours`
--
ALTER TABLE `jours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_semaine` (`id_semaine`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semaine`
--
ALTER TABLE `semaine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num_semaine` (`num_semaine`),
  ADD KEY `id_annee` (`id_annee`);

--
-- Indexes for table `techniciens`
--
ALTER TABLE `techniciens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `techniciens_ibfk_1` (`id_groupe`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annee`
--
ALTER TABLE `annee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `horaires`
--
ALTER TABLE `horaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=633;

--
-- AUTO_INCREMENT for table `jours`
--
ALTER TABLE `jours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semaine`
--
ALTER TABLE `semaine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `techniciens`
--
ALTER TABLE `techniciens`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groupes`
--
ALTER TABLE `groupes`
  ADD CONSTRAINT `groupes_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `horaires`
--
ALTER TABLE `horaires`
  ADD CONSTRAINT `horaires_ibfk_1` FOREIGN KEY (`id_jour`) REFERENCES `jours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horaires_ibfk_2` FOREIGN KEY (`id_tech`) REFERENCES `techniciens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jours`
--
ALTER TABLE `jours`
  ADD CONSTRAINT `jours_ibfk_1` FOREIGN KEY (`id_semaine`) REFERENCES `semaine` (`num_semaine`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semaine`
--
ALTER TABLE `semaine`
  ADD CONSTRAINT `semaine_ibfk_1` FOREIGN KEY (`id_annee`) REFERENCES `annee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
