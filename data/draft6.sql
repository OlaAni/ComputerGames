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
  `genre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `part` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'placeholder.png',
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'BLANK',
  `rarity` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'BLANK',
  `type` int DEFAULT '1',
  PRIMARY KEY (`idProduct`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.product: ~5 rows (approximately)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`idProduct`, `name`, `price`, `genre`, `part`, `image`, `description`, `rarity`, `type`) VALUES
	(1, 'DogWatch', 50, 'Action', '0', 'DogWatch.png', 'Hacking Game', 'COMMON', 1),
	(2, 'ATG5', 40, 'Adventure', '0', 'ATG5.png', 'Adventure Game', 'VERY', 1),
	(3, 'AMD5', 105, '0', 'CPU', 'AMD5.png', 'AMD 5', 'VERY', 0),
	(4, 'CrossingAnimals', 30, 'StoryTelling', '0', 'CrossingAnimals.png', 'StoryTelling game', 'COMMON', 1),
	(5, 'RTX 3090', 2000, '0', 'GPU', 'RTX3090.png', 'RTX3090', 'ULTRA', 0),
	(6, 'Intel 5', 25, '0', 'CPU', 'Intel5.png', 'Intel 5', 'COMMON', 0),
	(7, 'Elden Square', 60, 'Horror', '0', 'elden.png', 'Horror game', 'SUPER', 1),
	(8, 'Light Souls', 30, 'Horror', '0', 'light.png', 'Horror game', 'UNCOMMON', 1),
	(9, 'Shadow of Peace', 15, 'Adventure', '0', 'shadow.png', 'Adventure game', 'UNCOMMON', 1),
	(10, 'Marvel SuperVillians 2', 25, 'Adventure', '0', 'villian.png', 'Adventure game', 'ULTRA', 1),
	(11, 'CloseLaugh 3', 35, 'Shooter', '0', 'close.png', 'Shooter game', 'VERY', 1),
	(12, 'CenterSea 2', 34, 'Shooter', '0', 'center.png', 'Shooter game', 'COMMON', 1),
	(13, 'Dragon Age Indifference', 34, 'RPG', '0', 'dragon.png', 'RPG game', 'COMMON', 1),
	(14, 'Devils Line', 45, 'RPG', '0', 'devil.png', 'RPG game', 'VERY', 1),
	(15, 'Liberty', 23, 'Shooter', '0', 'liberty.png', 'Shooter game', 'ULTRA', 1),
	(16, 'NTX 500', 25, '0', 'Case', 'ntx500.png', 'NTX 500', 'VERY', 0),
	(17, 'Power', 25, '0', 'power', 'power.png', 'Power', 'VERY', 0),
	(18, 'Corsair Memory 4500', 25, '0', 'memory', 'memory4500.png', 'Corsair Memor 4500', 'COMMON', 0),
	(19, 'AMD 9', 700, '0', 'CPU', 'amd9.png', 'AMD 9', 'COMMON', 0),
	(20, 'RTX 1050', 500, '0', 'GPU', 'rtx1050.png', 'RTX 1050', 'VERY', 0),
	(21, 'Nvme.2', 50, '0', 'Storage', 'nvme.png', 'Nvme.2', 'Common', 0);
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

-- Dumping data for table comp_games.sale: ~4 rows (approximately)
DELETE FROM `sale`;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.trade: ~2 rows (approximately)
DELETE FROM `trade`;
/*!40000 ALTER TABLE `trade` DISABLE KEYS */;
INSERT INTO `trade` (`idTrade`, `tradeamo`, `tradeName`, `tradeValue`, `discount`) VALUES
	(1, '1', 'DogWatch', '50', NULL),
	(2, '1', 'DogWatch', '50', NULL),
	(3, '1', 'DogWatch', '50', NULL),
	(4, '1', 'DogWatch', '50', NULL),
	(5, '1', 'ATG5', '50', NULL),
	(6, '', 'DogWatch', '', NULL),
	(7, '1', 'DogWatch', '50', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table comp_games.user: ~6 rows (approximately)
DELETE FROM `user`;
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
