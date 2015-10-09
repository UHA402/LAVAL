-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: laval
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbricks`
--

DROP TABLE IF EXISTS `tbricks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbricks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `type` enum('WAVE','MIDI','TEXT','RESP','IMG') DEFAULT NULL,
  `data` text,
  `type_response` enum('WAVE','MIDI','TEXT','IMG') DEFAULT NULL,
  `duree` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbricks`
--

LOCK TABLES `tbricks` WRITE;
/*!40000 ALTER TABLE `tbricks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbricks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbricks_medias`
--

DROP TABLE IF EXISTS `tbricks_medias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbricks_medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Bricks` int(11) DEFAULT NULL,
  `id_Medias` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Bricks` (`id_Bricks`),
  KEY `id_Medias` (`id_Medias`),
  CONSTRAINT `tbricks_medias_ibfk_1` FOREIGN KEY (`id_Bricks`) REFERENCES `tbricks` (`id`),
  CONSTRAINT `tbricks_medias_ibfk_2` FOREIGN KEY (`id_Medias`) REFERENCES `tmedias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbricks_medias`
--

LOCK TABLES `tbricks_medias` WRITE;
/*!40000 ALTER TABLE `tbricks_medias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbricks_medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tlessons`
--

DROP TABLE IF EXISTS `tlessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tlessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `duree` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tlessons`
--

LOCK TABLES `tlessons` WRITE;
/*!40000 ALTER TABLE `tlessons` DISABLE KEYS */;
/*!40000 ALTER TABLE `tlessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tlessons_bricks`
--

DROP TABLE IF EXISTS `tlessons_bricks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tlessons_bricks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Bricks` int(11) DEFAULT NULL,
  `id_Lessons` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Bricks` (`id_Bricks`),
  KEY `id_Lessons` (`id_Lessons`),
  CONSTRAINT `tlessons_bricks_ibfk_1` FOREIGN KEY (`id_Bricks`) REFERENCES `tbricks` (`id`),
  CONSTRAINT `tlessons_bricks_ibfk_2` FOREIGN KEY (`id_Lessons`) REFERENCES `tlessons` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tlessons_bricks`
--

LOCK TABLES `tlessons_bricks` WRITE;
/*!40000 ALTER TABLE `tlessons_bricks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tlessons_bricks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmedias`
--

DROP TABLE IF EXISTS `tmedias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmedias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmedias`
--

LOCK TABLES `tmedias` WRITE;
/*!40000 ALTER TABLE `tmedias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmedias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tresponse`
--

DROP TABLE IF EXISTS `tresponse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tresponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Users` int(11) DEFAULT NULL,
  `id_Lessons` int(11) DEFAULT NULL,
  `id_Bricks` int(11) DEFAULT NULL,
  `response` varchar(255) DEFAULT NULL,
  `type` enum('WAVE','MIDI','TEXT','RESP','IMG') DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Users` (`id_Users`),
  KEY `id_Lessons` (`id_Lessons`),
  KEY `id_Bricks` (`id_Bricks`),
  CONSTRAINT `tresponse_ibfk_1` FOREIGN KEY (`id_Users`) REFERENCES `tusers` (`id`),
  CONSTRAINT `tresponse_ibfk_2` FOREIGN KEY (`id_Lessons`) REFERENCES `tlessons` (`id`),
  CONSTRAINT `tresponse_ibfk_3` FOREIGN KEY (`id_Bricks`) REFERENCES `tbricks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tresponse`
--

LOCK TABLES `tresponse` WRITE;
/*!40000 ALTER TABLE `tresponse` DISABLE KEYS */;
/*!40000 ALTER TABLE `tresponse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tsessions`
--

DROP TABLE IF EXISTS `tsessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tsessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tsessions`
--

LOCK TABLES `tsessions` WRITE;
/*!40000 ALTER TABLE `tsessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tsessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tsessions_tlessons`
--

DROP TABLE IF EXISTS `tsessions_tlessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tsessions_tlessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Sessions` int(11) DEFAULT NULL,
  `id_Lessons` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Sessions` (`id_Sessions`),
  KEY `id_Lessons` (`id_Lessons`),
  CONSTRAINT `tsessions_tlessons_ibfk_1` FOREIGN KEY (`id_Sessions`) REFERENCES `tsessions` (`id`),
  CONSTRAINT `tsessions_tlessons_ibfk_2` FOREIGN KEY (`id_Lessons`) REFERENCES `tlessons` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tsessions_tlessons`
--

LOCK TABLES `tsessions_tlessons` WRITE;
/*!40000 ALTER TABLE `tsessions_tlessons` DISABLE KEYS */;
/*!40000 ALTER TABLE `tsessions_tlessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tusers`
--

DROP TABLE IF EXISTS `tusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `mail` varchar(60) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role` enum('ADMIN','MEMBER') DEFAULT NULL,
  `token` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tusers`
--

LOCK TABLES `tusers` WRITE;
/*!40000 ALTER TABLE `tusers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tusers_lessons`
--

DROP TABLE IF EXISTS `tusers_lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tusers_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Lessons` int(11) DEFAULT NULL,
  `id_Users` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Lessons` (`id_Lessons`),
  KEY `id_Users` (`id_Users`),
  CONSTRAINT `tusers_lessons_ibfk_1` FOREIGN KEY (`id_Lessons`) REFERENCES `tlessons` (`id`),
  CONSTRAINT `tusers_lessons_ibfk_2` FOREIGN KEY (`id_Users`) REFERENCES `tusers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tusers_lessons`
--

LOCK TABLES `tusers_lessons` WRITE;
/*!40000 ALTER TABLE `tusers_lessons` DISABLE KEYS */;
/*!40000 ALTER TABLE `tusers_lessons` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-09  9:41:28
