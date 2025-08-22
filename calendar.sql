-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Ago-2025 às 21:26
-- Versão do servidor: 9.1.0
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `calendar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(220) COLLATE utf8mb3_unicode_ci NOT NULL,
  `color` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Tutorial 1', '#1E90FF', '2025-08-17 10:05:00', '2025-08-17 11:00:00'),
(2, 'Tutorial 2', '#FF0000', '2025-08-17 10:06:00', '2025-08-18 11:05:00'),
(3, 'Tutorial 3', '#9400D3', '2025-08-18 10:07:00', '2025-08-19 11:06:00'),
(4, 'Tutorial 4', '#FFD700', '2025-08-19 10:08:00', '2025-08-21 11:07:00'),
(5, 'Tutorial 5', '#32CD32', '2025-08-19 00:29:58', '2025-08-19 11:08:00'),
(6, 'Tutorial 6', '#FFA500', '2025-08-18 10:10:00', '2025-08-18 11:10:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
