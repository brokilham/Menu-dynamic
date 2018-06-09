-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: laravel_dynamic_menu
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.17.10.1

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `login_as` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'administrator','admin','$2y$10$My7HJ5rmrrK.XYPERfhB7unaZpFKF9uKyjgqxCc672g/68CYpGPlW','53W4HF34Tcs624cBpR745eXdDmKuqL0GuVmlxCxvHrEt9llTa3cf0jtgEuPo','2018-03-07 09:15:09','2018-03-07 09:15:09','administrator','active','web'),(2,'iman nahrawi','999','$2y$10$fREidFW.bYxliYd827UsJOsbbdxnY0/lMQ9t8JpwJ5XY59u5P8en2','mmhxewlUzN1NGuj47XzY7yGtKD6C1CR2PvmomKGR3GNBVy9aPfewzwv99pbz','2018-05-23 15:28:32','2018-05-23 15:28:32','guru_bk','active','web'),(3,'ilham agung','31111010','$2y$10$sFwmH3fxiI9PbNNVedzybuzygSCgFBDEfMnyS2UPX9kbxUFkPRRuS',NULL,'2018-06-02 11:53:28','2018-06-02 23:46:05','walikelas','active','mobile'),(10,'ilham','9797','$2y$10$h4/kfOPL2nGudzffkmK1cOyWN84sZ3bcaJmM0E.P5U1urujQO4BIm',NULL,'2018-06-03 11:47:52','2018-06-03 11:47:52','siswa','non_active','mobile'),(11,'tew','20180603529797','$2y$10$MadNlIgx6wy8NikvWUOtd.EZguNdwi9w1M6vBjn7Yd/K5uQPI8SzS',NULL,'2018-06-03 11:47:52','2018-06-03 11:47:52','walimurid','non_active','mobile'),(12,'wr','9999','$2y$10$lpicJY/eD5O5OxXwI6UuvuafEVH9GLl15Ky3BSycuMC/PQ4qigXCW',NULL,'2018-06-03 11:58:04','2018-06-03 11:58:04','siswa','non_active','mobile'),(13,'sdfds','20180603039999','$2y$10$AkBofrKWT9Xa/fGOoScbBer8x4q/fU6lmGyVP81fmtwkmJe3jbU3a',NULL,'2018-06-03 11:58:04','2018-06-03 11:58:04','walimurid','non_active','mobile'),(14,'asdsa','777','$2y$10$IjOMCCcDa5Vbwf2.i4VJxO3EBrXRPaF7vFNouMLbAJo/jVXlh/OYW',NULL,'2018-06-03 12:17:16','2018-06-03 12:17:16','siswa','non_active','mobile'),(15,'sadsa','2018060316777','$2y$10$DIeIIE1nOUXdJN68dq7UWOZC0d3JtNGedsuobPCRe2ee21NY8RztS',NULL,'2018-06-03 12:17:16','2018-06-03 12:17:16','walimurid','non_active','mobile');
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

-- Dump completed on 2018-06-09 15:17:21
