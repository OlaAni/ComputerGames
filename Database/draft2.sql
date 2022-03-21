-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.26 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for comp_games
DROP DATABASE IF EXISTS `comp_games`;
CREATE DATABASE IF NOT EXISTS `comp_games` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `comp_games`;

-- Dumping structure for table comp_games.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int NOT NULL,
  `name` int DEFAULT NULL,
  `email` int DEFAULT NULL,
  `password` int DEFAULT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table comp_games.customer
DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `idCustomer` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `age` int NOT NULL DEFAULT '0',
  `favgenre` text NOT NULL,
  PRIMARY KEY (`idCustomer`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.customer: ~0 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table comp_games.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `idProduct` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` float NOT NULL DEFAULT '-1',
  `genre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'BLANK',
  `part` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'BLANK',
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'BLANK',
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'BLANK',
  `rarity` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'BLANK',
  PRIMARY KEY (`idProduct`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.product: ~0 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`idProduct`, `name`, `price`, `genre`, `part`, `image`, `description`, `rarity`) VALUES
	(1, 'DogWatch', 50, 'Action', '0', 'DogWatch.png', 'Hacking Game', 'COMMON'),
	(2, 'ATG5', 60, 'Adventure', '0', 'ATG5.png', 'Advenutee Game', 'VERY'),
	(3, 'AMD5', 100, '0', 'CPU', 'AMD5.png', 'AMD 5 Cpu', 'VERY');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table comp_games.sale
DROP TABLE IF EXISTS `sale`;
CREATE TABLE IF NOT EXISTS `sale` (
  `idSale` int NOT NULL AUTO_INCREMENT,
  `fullPrice` float DEFAULT NULL,
  `Customer_idCustomer` int DEFAULT NULL,
  `Product_idProduct` int DEFAULT NULL,
  `Admin_idCustomer` int DEFAULT NULL,
  `Tradein_idTradein` int DEFAULT NULL,
  PRIMARY KEY (`idSale`) USING BTREE,
  KEY `fk_Cart_Customer` (`Customer_idCustomer`),
  KEY `fk_Cart_Prodcut` (`Product_idProduct`),
  KEY `fk_Cart_Admin` (`Admin_idCustomer`),
  KEY `fk_Cart_Tradein` (`Tradein_idTradein`),
  CONSTRAINT `fk_Cart_Admin` FOREIGN KEY (`Admin_idCustomer`) REFERENCES `admin` (`idAdmin`),
  CONSTRAINT `fk_Cart_Customer` FOREIGN KEY (`Customer_idCustomer`) REFERENCES `customer` (`idCustomer`),
  CONSTRAINT `fk_Cart_Tradein` FOREIGN KEY (`Tradein_idTradein`) REFERENCES `tradein` (`idTrade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.sale: ~0 rows (approximately)
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;

-- Dumping structure for table comp_games.tradein
DROP TABLE IF EXISTS `tradein`;
CREATE TABLE IF NOT EXISTS `tradein` (
  `idTrade` int NOT NULL,
  `discount` float DEFAULT NULL,
  PRIMARY KEY (`idTrade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.tradein: ~0 rows (approximately)
/*!40000 ALTER TABLE `tradein` DISABLE KEYS */;
/*!40000 ALTER TABLE `tradein` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
