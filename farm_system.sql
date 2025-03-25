-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2024 at 09:19 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_login`
--

DROP TABLE IF EXISTS `mst_login`;
CREATE TABLE IF NOT EXISTS `mst_login` (
  `UID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_login`
--

INSERT INTO `mst_login` (`UID`, `Name`, `Mobile`, `Pass`, `Address`, `status`) VALUES
(1, 'User1', '8551991006', '123', 'Ichi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_order`
--

DROP TABLE IF EXISTS `mst_order`;
CREATE TABLE IF NOT EXISTS `mst_order` (
  `OID` int NOT NULL AUTO_INCREMENT,
  `UID` int NOT NULL,
  `PID` int NOT NULL,
  `QTY` int NOT NULL,
  `Total` float NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`OID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_order`
--

INSERT INTO `mst_order` (`OID`, `UID`, `PID`, `QTY`, `Total`, `status`) VALUES
(1, 1, 2, 2, 120, 0),
(2, 1, 1, 1, 80, 0),
(3, 1, 1, 1, 80, 0),
(4, 1, 1, 1, 80, 0),
(5, 1, 1, 2, 160, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst_products`
--

DROP TABLE IF EXISTS `mst_products`;
CREATE TABLE IF NOT EXISTS `mst_products` (
  `PID` int NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` float NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`PID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_products`
--

INSERT INTO `mst_products` (`PID`, `Product_Name`, `Price`, `status`) VALUES
(1, 'Apple', 80, 1),
(2, 'Kiwi', 60, 1),
(3, 'Potato', 40, 1),
(4, 'Onion', 50, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
