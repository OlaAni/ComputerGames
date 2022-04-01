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
  `favgenre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tradeamo` float DEFAULT '0',
  `emlpoyee` int DEFAULT '0',
  PRIMARY KEY (`idCustomer`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.customer: ~4 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`idCustomer`, `name`, `email`, `password`, `age`, `favgenre`, `tradeamo`, `emlpoyee`) VALUES
	(1, 'Test1', 'test1@gmail.com', 'pass', 0, 'Fill', 0, 0),
	(2, 'Test2', 'test2@gmail.com', 'pass', 0, 'Fill', 0, 0),
	(3, 'Test2', 'test2@gmail.com', 'password', 0, 'Fill', 0, 0),
	(4, 'OlaTest', 'olaTest@gmail.com', 'pass', 0, 'Blank', 0, 0);
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
  `type` int DEFAULT '1',
  PRIMARY KEY (`idProduct`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.product: ~4 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`idProduct`, `name`, `price`, `genre`, `part`, `image`, `description`, `rarity`, `type`) VALUES
	(1, 'DogWatch', 50, 'Action', '0', 'DogWatch.png', 'Hacking Game', 'COMMON', 1),
	(2, 'ATG5', 100, 'Adventure', '0', 'ATG5.png', 'Adventure Game', 'VERY', 1),
	(3, 'AMD5', 100, '0', 'CPU', 'AMD5.png', 'AMD 5', 'VERY', 0),
	(4, 'Test1', 30, 'Test', 'BLANK', 'Test.png', 'Test', 'Test', 1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table comp_games.sale
DROP TABLE IF EXISTS `sale`;
CREATE TABLE IF NOT EXISTS `sale` (
  `idSale` int NOT NULL AUTO_INCREMENT,
  `fullPrice` float DEFAULT NULL,
  `CustomerID` int DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.sale: ~6 rows (approximately)
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
INSERT INTO `sale` (`idSale`, `fullPrice`, `CustomerID`, `Customer_idCustomer`, `Product_idProduct`, `Admin_idCustomer`, `Tradein_idTradein`) VALUES
	(1, 210, NULL, NULL, NULL, NULL, NULL),
	(2, 160, NULL, NULL, NULL, NULL, NULL),
	(3, 100, NULL, NULL, NULL, NULL, NULL),
	(4, 0, NULL, NULL, NULL, NULL, NULL),
	(5, 110, NULL, NULL, NULL, NULL, NULL),
	(9, 100, 6, NULL, NULL, NULL, NULL);
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

-- Dumping structure for table comp_games.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `age` int NOT NULL DEFAULT '0',
  `favgenre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Set',
  `tradeamo` float DEFAULT '0',
  `employee` varchar(50) DEFAULT 'false',
  `location` varchar(100) DEFAULT 'NOWHERE',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`idUser`, `name`, `email`, `password`, `age`, `favgenre`, `tradeamo`, `employee`, `location`) VALUES
	(0, '0', '0', '0', 0, 'Set', 0, 'false', 'NOWHERE'),
	(1, 'Olamide', 'ola@gmail.com', 'pass', 18, 'Action', 0, 'false', 'NOWHERE'),
	(2, 'Test', 'test@gmail.com', 'pass', 8, 'Adventure', 0, 'false', 'NOWHERE'),
	(4, 'ADMINOla', 'adminola@gmail.com', 'pass', 0, 'Set', 0, 'true', 'NOWHERE'),
	(5, 'Ola', 'ola@gmial.com', 'pass', 0, 'Blank', 0, 'false', 'NOWHERE'),
	(6, 'Ola', 'test2@gmail.com', 'pass', 0, 'Blank', 0, 'false', 'TUD'),
	(7, 'MyName', 'myemail@gmail', 'pass', 0, 'Blank', 0, 'false', 'TUD');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
