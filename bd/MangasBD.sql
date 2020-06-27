-- MariaDB dump 10.17  Distrib 10.4.8-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: webCRUD
-- ------------------------------------------------------
-- Server version	10.4.8-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `manga`
--

DROP TABLE IF EXISTS `manga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manga` (
  `manga_id` int(11) NOT NULL AUTO_INCREMENT,
  `manga_title` varchar(50) NOT NULL,
  `manga_author` varchar(50) NOT NULL,
  `manga_genre` varchar(7) NOT NULL,
  `manga_chapter_tally` mediumint(9) NOT NULL,
  PRIMARY KEY (`manga_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manga`
--

LOCK TABLES `manga` WRITE;
/*!40000 ALTER TABLE `manga` DISABLE KEYS */;
INSERT INTO `manga` VALUES (1,'Berserk','Kentarou Miura','Seinen',374),(3,'JoJo no Kimyou na Bouken Part 7: Steel Ball Run','Hirohiko Araki','Shounen',96),(4,'Fullmetal Alchemist','Irakawa Himoru','Shounen',116),(5,'Monster','Urasawa Naoki','Seinen',162),(6,'One piece','Oda Eiichiro','Shounen',807),(7,'Vagabond','Inoue Takehiko','Seinen',327),(8,'Oyasumi punpun','Inio Asano','Seinen',147),(9,'Kingdom','Hara Yasuhisa ','Seinen',561),(10,'Grand blue','Inoue Kenji','Comedy',414),(11,'Slam Dunk','Inoue Takehiko ','Shounen',276),(12,'20th Century Boys','Urasawa Naoki','Seinen',249),(13,'Solo Leveling','Chugong','Fantasy',303),(14,'Monogatari Series: First Season','NISIO ISIN ','Mystery',107),(15,'Made in Abyss','Tsukushi Akihito','Sci-Fi',150),(16,'My Youth Romantic Comedy Is Wrong, As I Expected','Watari Wataru','Comedy',550),(17,'GTO','Fujisawa Tohru','Comedy',208),(18,'Spice & Wolf','Hasekura Isuna ','Drama',60),(19,'Kaguya-sama: Love is War','Akasaka Aka','Comedy',216),(20,'Yotsuba&!','Azuma Kiyohiko','Comedy',500),(21,'Vinland Saga','Yukimura Makoto ','Seinen',498);
/*!40000 ALTER TABLE `manga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reading`
--

DROP TABLE IF EXISTS `reading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reading` (
  `user_id` int(11) NOT NULL,
  `manga_id` int(11) NOT NULL,
  `current_chapter` mediumint(9) NOT NULL,
  `score` tinyint(4) NOT NULL,
  `read_status` varchar(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `manga_id` (`manga_id`),
  CONSTRAINT `reading_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `reading_ibfk_2` FOREIGN KEY (`manga_id`) REFERENCES `manga` (`manga_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reading`
--

LOCK TABLES `reading` WRITE;
/*!40000 ALTER TABLE `reading` DISABLE KEYS */;
/*!40000 ALTER TABLE `reading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-26 23:22:40
