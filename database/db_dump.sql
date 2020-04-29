-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: capstone
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

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
-- Table structure for table `baskets`
--

DROP TABLE IF EXISTS `baskets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baskets` (
  `basket_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`basket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baskets`
--

LOCK TABLES `baskets` WRITE;
/*!40000 ALTER TABLE `baskets` DISABLE KEYS */;
INSERT INTO `baskets` VALUES (1,1,'west area','2020-04-19 10:16:26'),(2,1,'South area','2020-04-19 10:16:59'),(3,4,'best areas','2020-04-19 10:18:02'),(4,4,'crappy areas','2020-04-19 10:18:26'),(5,2,'cheapest','2020-04-19 10:19:02');
/*!40000 ALTER TABLE `baskets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `baskets_neighborhoods`
--

DROP TABLE IF EXISTS `baskets_neighborhoods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baskets_neighborhoods` (
  `basket_id` int(11) DEFAULT NULL,
  `hood_id` int(11) DEFAULT NULL,
  `list_items` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baskets_neighborhoods`
--

LOCK TABLES `baskets_neighborhoods` WRITE;
/*!40000 ALTER TABLE `baskets_neighborhoods` DISABLE KEYS */;
INSERT INTO `baskets_neighborhoods` VALUES (4,14,NULL),(4,20,NULL),(4,7,NULL),(5,2,NULL),(1,11,NULL);
/*!40000 ALTER TABLE `baskets_neighborhoods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `neighborhoods`
--

DROP TABLE IF EXISTS `neighborhoods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `neighborhoods` (
  `hood_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rating_scale` tinyint(1) DEFAULT NULL,
  `police_station` enum('yes','no') DEFAULT NULL,
  `fire_station` enum('yes','no') DEFAULT NULL,
  `library` enum('yes','no') DEFAULT NULL,
  `pool` enum('yes','no') DEFAULT NULL,
  `prim_schools` int(11) DEFAULT NULL,
  `sec_schools` int(11) DEFAULT NULL,
  `churches` int(11) DEFAULT NULL,
  `playgrounds` int(11) DEFAULT NULL,
  `comm_centres` varchar(255) DEFAULT NULL,
  `house_price_min` decimal(8,2) DEFAULT NULL,
  `house_price_max` decimal(9,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`hood_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `neighborhoods`
--

LOCK TABLES `neighborhoods` WRITE;
/*!40000 ALTER TABLE `neighborhoods` DISABLE KEYS */;
INSERT INTO `neighborhoods` VALUES (1,'Old Kildonam','north','Lorem Ipsum',NULL,'yes','yes','yes','yes',20,3,19,22,'Maples CC, Garden City CC',198000.00,400000.00,'2020-04-18 14:08:09',NULL),(2,'Point Douglas','north','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','yes',17,1,34,10,'Tyndal Park CC, Northwood CC, Sinclair Park CC',98000.00,290000.00,'2020-04-18 14:50:01','2020-04-18 14:50:01'),(3,'Mynarski','north','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','no',15,2,17,3,'Norquay, Sinclair Park',65000.00,360000.00,'2020-04-19 07:36:51',NULL),(4,'Downtown','central','Lorem ipsum dolor sit amet.',NULL,'yes','yes','yes','yes',12,2,33,4,'Burton Cummings, Freighthouse',54000.00,399000.00,'2020-04-19 07:39:40',NULL),(5,'North Kildonan','north east','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','no',11,1,15,9,'Gateway, North Kildonan',120000.00,750000.00,'2020-04-19 07:41:40',NULL),(6,'East Kildonan','north east','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','yes',12,2,7,6,'Bronx, Melrose, Morse Place',115000.00,470000.00,'2020-04-19 07:43:36',NULL),(7,'Elmwood','north east','Lorem ipsum dolor sit amet.',NULL,'no','yes','no','no',5,2,16,4,'Chalmers, East Elmwood',94000.00,350000.00,'2020-04-19 07:45:51',NULL),(8,'Transcona','east','Lorem ipsum dolor sit amet.',NULL,'yes','yes','yes','yes',14,2,20,9,'Park City West, Oxford Heights, East End',115000.00,595000.00,'2020-04-19 07:47:27',NULL),(9,'St Boniface','south east','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','yes',10,2,21,12,'Notre Dame, Norwood, Archwood, Winakwa',160000.00,725000.00,'2020-04-19 07:49:29',NULL),(10,'Ft Rouge','south west','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','no',7,1,11,10,'River Osborne, Earl Grey, Lord Roberts, Riverview',99000.00,509000.00,'2020-04-19 07:51:25',NULL),(11,'Ft Garry','south','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','yes',11,3,24,18,'Fort Garry, Westridge, Richmond Kings',179000.00,680000.00,'2020-04-19 08:22:16',NULL),(12,'River Heights','south west','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','yes',11,1,8,7,'Crescentwood, River Heights, Crescentwood',130000.00,1999000.00,'2020-04-19 08:28:24',NULL),(13,'St Vital','south east','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','yes',12,2,24,17,'Southdale, Dakota, Greendell',109000.00,999000.00,'2020-04-19 08:31:01',NULL),(14,'St Norbert','south','Lorem ipsum dolor sit amet.',NULL,'no','no','no','no',3,1,4,2,'St Norbert CC',195000.00,1000000.00,'2020-04-19 08:33:45',NULL),(15,'Whyte Ridge','south west','Lorem ipsum dolor sit amet.',NULL,'no','yes','no','no',2,0,3,1,'Whyteridge, Waverly Heights',400000.00,1001000.00,'2020-04-19 08:35:43',NULL),(16,'Tuxedo','south west','Lorem ipsum dolor sit amet.',NULL,'yes','no','no','no',2,2,3,3,'Tuxedo CC',150000.00,2200000.00,'2020-04-19 08:37:20',NULL),(17,'Charleswood','south west','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','no',8,1,9,15,'Roblin Park, Varsity View, Westdale',159000.00,1280000.00,'2020-04-19 08:39:08',NULL),(18,'St Charles','west','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','no',7,3,14,7,'Kirkfield, Assiniboia, Heritage',119000.00,700000.00,'2020-04-19 08:40:46',NULL),(19,'St James','west','Lorem ipsum dolor sit amet.',NULL,'no','yes','yes','yes',9,3,18,11,'Woodhaven, Sturgeon Heights, Deer Lodge',105000.00,988800.00,'2020-04-19 08:42:43',NULL),(20,'Brooklands/Weston','north west','Lorem ipsum dolor sit amet.',NULL,'no','yes','no','yes',10,3,17,7,'Valour, Weston Memorial',54000.00,190000.00,'2020-04-19 08:44:17',NULL);
/*!40000 ALTER TABLE `neighborhoods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_num` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `prov` varchar(255) DEFAULT NULL,
  `post_code` varchar(6) NOT NULL,
  `country` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Dawn','Baker','db@email.com','2041234567','123 Any St','Winnipeg','MB','R1A1A1','','','2020-04-25 16:33:07','2020-04-25 16:33:18'),(2,'Vikki','Biggs','vb@email.com','2041234567','123 Any St','Winnipeg','MB','R1A1A1','','','2020-04-25 16:33:07','2020-04-25 16:33:18'),(3,'Drae','Biggs','db2@email.com','2041234576','123 Another St','Winnipeg','MB','R1A1B1','','','2020-04-25 16:33:07','2020-04-25 16:33:18'),(4,'Leah','Timmermans','lt@email.com','2041234576','123 Another St','Winnipeg','MB','R1A1B1','','','2020-04-25 16:33:07','2020-04-25 16:33:18'),(5,'Paulette','Baker','pb@email.com','2041237890','123 That Ave','Winnipeg','MB','R1A1C1','','','2020-04-25 16:33:07','2020-04-25 16:33:18'),(6,'Foo','Bar','fb@email.com','+12041234567','123 any st','Winnipeg','Manitoba','R3E1B6','Canada','anytime','2020-04-28 12:52:00','2020-04-28 12:52:00'),(7,'Foo','Bar','fb@email.com','+12041234567','123 any st','Winnipeg','Manitoba','R3E1B6','Canada','anytime','2020-04-28 12:55:36','2020-04-28 12:55:36'),(8,'mookie','hunter','mooks@gmail.com','1234567890','52 this st','Winnipeg','Manitoba','r1a1a1','Canada','whatevs','2020-04-28 13:21:14','2020-04-28 13:21:14'),(9,'George','Jones','GJtheman@mail.com','2045233654','123 any st','texas','MB','R3E1B6','Canada','music','2020-04-28 14:05:27','2020-04-28 14:05:27'),(10,'Dawn','Baker','deltabravo73@gmail.com','2048033296','1430 Elgin Ave W','Winnipeg','Manitoba','R3E1B6','Canada','anytime','2020-04-28 14:22:57','2020-04-28 14:22:57'),(11,'John','Boy','jbwalton@mail.com','1112225566','123 Walton Mountain','Television','MB','r1a1a1','Canada','password','2020-04-28 18:03:57','2020-04-28 18:03:57');
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

-- Dump completed on 2020-04-29 16:19:46
