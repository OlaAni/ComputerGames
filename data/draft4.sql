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
CREATE DATABASE IF NOT EXISTS `comp_games` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `comp_games`;

-- Dumping structure for table comp_games.product
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.product: ~6 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`idProduct`, `name`, `price`, `genre`, `part`, `image`, `description`, `rarity`, `type`) VALUES
	(1, 'DogWatch', 50, 'Action', '0', 'DogWatch.png', 'Hacking Game', 'COMMON', 1),
	(2, 'ATG5', 40, 'Adventure', '0', 'ATG5.png', 'Adventure Game', 'VERY', 1),
	(3, 'AMD5', 105, '0', 'CPU', 'AMD5.png', 'AMD 5', 'VERY', 0),
	(4, 'CrossingAnimals', 30, 'StoryTelling', '0', 'CrossingAnimals.png', 'StoryTelling game', 'COMMON', 1),
	(5, 'RTX 3090', 1000, '0', 'GPU', 'RTX3090.png', 'RTX3090', 'VERY', 0),
	(6, 'Intel 5', 25, '0', 'CPU', 'Intel5.png', 'Intel 5', 'COMMON', 0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table comp_games.sale
CREATE TABLE IF NOT EXISTS `sale` (
  `idSale` int NOT NULL AUTO_INCREMENT,
  `fullPrice` float DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Customer_idCustomer` int DEFAULT NULL,
  `Product_idProduct` int DEFAULT NULL,
  `amount` int DEFAULT NULL,
  PRIMARY KEY (`idSale`),
  KEY `FK_sale2_user` (`Customer_idCustomer`),
  KEY `FK_sale_product` (`Product_idProduct`),
  CONSTRAINT `FK_sale2_user` FOREIGN KEY (`Customer_idCustomer`) REFERENCES `user` (`idUser`),
  CONSTRAINT `FK_sale_product` FOREIGN KEY (`Product_idProduct`) REFERENCES `product` (`idProduct`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.sale: ~3 rows (approximately)
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
INSERT INTO `sale` (`idSale`, `fullPrice`, `date`, `Customer_idCustomer`, `Product_idProduct`, `amount`) VALUES
	(2, 117.5, NULL, 101, 2, NULL),
	(48, 47, '2022-04-07 12:44:21', 101, 1, 1),
	(49, 47, '2022-04-07 12:44:21', 101, 6, 2);
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;

-- Dumping structure for table comp_games.trade
CREATE TABLE IF NOT EXISTS `trade` (
  `idTrade` int NOT NULL AUTO_INCREMENT,
  `tradeamo` varchar(50) DEFAULT NULL,
  `tradeName` varchar(50) DEFAULT NULL,
  `tradeValue` varchar(50) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  PRIMARY KEY (`idTrade`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.trade: ~6 rows (approximately)
/*!40000 ALTER TABLE `trade` DISABLE KEYS */;
INSERT INTO `trade` (`idTrade`, `tradeamo`, `tradeName`, `tradeValue`, `discount`) VALUES
	(1, '1', 'DogWatch', '50', NULL),
	(2, '1', 'DogWatch', '50', NULL),
	(3, '1', 'DogWatch', '50', NULL),
	(4, '1', 'DogWatch', '50', NULL),
	(5, '1', 'ATG5', '50', NULL),
	(6, '', 'DogWatch', '', NULL);
/*!40000 ALTER TABLE `trade` ENABLE KEYS */;

-- Dumping structure for table comp_games.user
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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.user: ~9 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`idUser`, `name`, `email`, `password`, `age`, `favgenre`, `tradeamo`, `employee`, `location`) VALUES
	(0, '0', '0', '0', 0, 'Set', 0, 'false', 'NOWHERE'),
	(4, 'ADMINOla', 'adminola@gmail.com', 'pass', 0, 'Set', 0, 'true', 'NOWHERE'),
	(8, 'ADMINThomas', 'thomas@gmail.com', 'pass', 0, 'Set', 0, 'true', 'NOWHERE'),
	(101, 'Olamide', 'ola@gmail.com', 'pass', 18, 'Action', 0.53, 'false', 'NOWHERE'),
	(102, 'Test', 'test@gmail.com', 'pass', 8, 'Adventure', 0, 'false', 'NOWHERE'),
	(105, 'Ola', 'ola@gmial.com', 'pass', 12, 'Blank', 0, 'false', 'NOWHERE'),
	(106, 'Ola', 'test2@gmail.com', 'pass', 33, 'Blank', 0, 'false', 'TUD'),
	(107, 'MyName', 'myemail@gmail', 'pass', 32, 'Blank', 0, 'false', 'TUD'),
	(108, 'Test2', 'test2@gmail.com', 'pass', 101, 'Tycoon', 0.002, 'false', 'Blanch');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
