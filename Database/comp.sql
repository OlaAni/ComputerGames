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

-- Dumping structure for table comp_games.admin
CREATE TABLE IF NOT EXISTS `admin` (
                                       `idAdmin` int NOT NULL,
                                       `name` int DEFAULT NULL,
                                       `email` int DEFAULT NULL,
                                       `password` int DEFAULT NULL,
                                       PRIMARY KEY (`idAdmin`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table comp_games.customer
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

-- Data exporting was unselected.

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
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table comp_games.sale
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

-- Data exporting was unselected.

-- Dumping structure for table comp_games.trade
CREATE TABLE IF NOT EXISTS `trade` (
    `tradeamo` varchar(50) DEFAULT NULL,
    `tradeName` varchar(50) DEFAULT NULL,
    `tradeValue` varchar(50) DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table comp_games.tradein
CREATE TABLE IF NOT EXISTS `tradein` (
                                         `idTrade` int NOT NULL,
                                         `discount` float DEFAULT NULL,
                                         `tradeamo` varchar(50) DEFAULT NULL,
    `tradeName` varchar(50) DEFAULT NULL,
    `tradeValue` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`idTrade`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

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
    ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;