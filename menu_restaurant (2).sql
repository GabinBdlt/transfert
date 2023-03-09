-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2023 at 03:40 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menu restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `entrée` text NOT NULL,
  `plat` text NOT NULL,
  `dessert` text NOT NULL,
  `boisson` text NOT NULL,
  `tarif` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `entrée`, `plat`, `dessert`, `boisson`, `tarif`) VALUES
(1, 'Légumes', 'Carpaccio de betteraves marinées au soja et gingembre', 'Tourte feuilletée – céleri et truffe, jus concentré de légumes', 'Topi noisettes – topinambour poché au sirop, condiment passion , crème glacée noisette', 'Vin rouge Ventoux – Les grains marsellan 2015', 80),
(2, 'Au rythme des saisons', 'Foie-gras mi-cuit au sichuan\r\n', 'Turbot rôti au ras el-hanout, chou-fleur et choux de bruxelles\r\n', 'Agrumes – crème diplomate au citron, pesto à l’estragon\r\n', 'Bourgogne Pinot noir 2017\r\n\r\n\r\n\r\n\r\n', 71);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
