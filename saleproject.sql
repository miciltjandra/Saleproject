-- MySQL dump 10.13  Distrib 5.7.11, for Win64 (x86_64)
--
-- Host: localhost    Database: saleproject
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `likes` int(10) DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `price` int(20) NOT NULL,
  `image` longblob,
  `seller_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `seller` (`seller_id`),
  CONSTRAINT `seller` FOREIGN KEY (`seller_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `purchase_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_purchased` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `buyer_id` int(10) DEFAULT NULL,
  `consignee` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `postalcode` varchar(5) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `creditcard` varchar(12) DEFAULT NULL,
  `verification` varchar(3) DEFAULT NULL,
  `purchase_date` datetime DEFAULT NULL,
  PRIMARY KEY (`purchase_id`),
  KEY `product_purchased` (`product_purchased`),
  KEY `purchase_ibfk_2_idx` (`buyer_id`),
  KEY `purchase_ibfk_2_idx1` (`buyer_id`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`product_purchased`) REFERENCES `product` (`product_id`),
  CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `postalcode` varchar(5) DEFAULT NULL,
  `phonenumber` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Michael','chills12','miciltjandra@gmail.com','asdf','Pasar Selatan 29','40181','85223132878'),(2,'a','asd','a','a','a','a','a'),(3,'Michael','asdf','miciltjandra@gmail.com','asdf','Pasar Selatan 29','40181','85223132878'),(4,'Michael','asdfg','miciltjandra@gmail.com','asdf','Pasar Selatan 29','40181','85223132878'),(5,'Michael','asdfgh','miciltjandra@gmail.com','asdf','Pasar Selatan 29','40181','85223132878'),(6,'Michael','sadf','miciltjandra@gmail.com','asdf','Pasar Selatan 29','40181','85223132878'),(7,'Michael','qwe','miciltjandra@gmail.com','asdf','Pasar Selatan 29','40181','85223132878'),(8,'Michael','adqwd','miciltjandra@gmail.com','asdf','Pasar Selatan 29','40181','85223132878');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-29 20:36:57
