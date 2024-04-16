CREATE DATABASE  IF NOT EXISTS `resumesrus` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `resumesrus`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: resumesrus
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `resumesrus`
--

DROP TABLE IF EXISTS `resumesrus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resumesrus` (
  `user_id` int DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `jobTitle` varchar(500) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resumesrus`
--

LOCK TABLES `resumesrus` WRITE;
/*!40000 ALTER TABLE `resumesrus` DISABLE KEYS */;
INSERT INTO 'resumesrus' VALUES (1, 'Joe', 'Poppi','ForkLift driver', 'Wearhouse worker', 'jpoppi@yahoo.com', 'LittleHouse123', 867-5309),
(2, 'Martha', 'Washington','Writer', 'Author', 'mwashington@yahoo.com', 'WhiteHouse123', 167-5309),
(3, 'Abigail', 'Adams','Nurse', 'ER nurse', 'aadams@yahoo.com', 'MTVwillpower123', 267-5309),
(4, 'Pasty', 'Jefferson','Farm Hand', 'Cowboy', 'pjefferson@yahoo.com', 'BackToNature123', 367-5309),
(5, 'Dolley', 'Madison','Cop', 'Cop', 'dmadison@yahoo.com', 'TheThinBlueLine123', 467-5309),
(6, 'Eddy', 'Smith','Office Assisant', 'Secreary', 'esmith@yahoo.com', 'FaxIsLife123', 567-5309),
(7, 'Josh', 'Davis','CAD Drafter', 'CAD Designer', 'jdavis@yahoo.com', 'CADyoubeMorefunny123', 667-5309)
/*!40000 ALTER TABLE `resumesrus` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-10 10:04:18
