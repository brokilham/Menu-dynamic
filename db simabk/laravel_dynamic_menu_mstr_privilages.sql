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
-- Table structure for table `mstr_privilages`
--

DROP TABLE IF EXISTS `mstr_privilages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mstr_privilages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mstr_privilages`
--

LOCK TABLES `mstr_privilages` WRITE;
/*!40000 ALTER TABLE `mstr_privilages` DISABLE KEYS */;
INSERT INTO `mstr_privilages` VALUES (1,'2018-03-07 17:00:00','2018-03-19 08:19:16','DEVELOPER','ILHAM','non_active'),(2,'2018-03-17 08:46:06','2018-03-20 07:36:03','tes','ILHAM','non_active'),(3,'2018-03-17 08:46:29','2018-03-20 07:36:07','tes','ILHAM','non_active'),(4,'2018-03-17 08:46:30','2018-03-20 08:55:10','tes','ILHAM','non_active'),(5,'2018-03-17 08:46:31','2018-03-20 10:05:25','tes123','JOKO','non_active'),(6,'2018-03-17 08:46:31','2018-03-19 08:18:33','tes','ILHAM','non_active'),(7,'2018-03-17 08:46:32','2018-03-20 08:12:36','tes','ILHAM','non_active'),(8,'2018-03-17 08:46:32','2018-03-19 16:32:27','tes','ILHAM','non_active'),(9,'2018-03-17 08:46:33','2018-03-19 16:13:42','tes','ILHAM','non_active'),(10,'2018-03-17 08:46:39','2018-03-19 08:17:39','tes','ILHAM','non_active'),(11,'2018-03-17 08:46:40','2018-03-19 16:13:37','tes','ILHAM','non_active'),(12,'2018-03-17 08:46:41','2018-03-19 15:48:49','tes','ILHAM','non_active'),(13,'2018-03-17 08:46:43','2018-03-19 15:44:18','tes','ILHAM','non_active'),(14,'2018-03-17 08:46:44','2018-03-19 15:44:26','tes','ILHAM','non_active'),(15,'2018-03-17 08:46:45','2018-03-19 15:47:12','tes','ILHAM','non_active'),(16,'2018-03-19 06:50:46','2018-03-19 06:50:46','HALO','AGUNG','non_Active'),(17,'2018-03-19 06:51:59','2018-03-19 06:51:59','HALO','AGUNG','non_Active'),(18,'2018-03-19 06:53:19','2018-03-19 15:48:27','HALO123','AGUNG','non_active'),(19,'2018-03-19 06:58:17','2018-03-19 06:58:17','tes','AGUNG','non_Active'),(20,'2018-03-19 06:58:30','2018-03-19 06:58:30','tes','AGUNG','non_Active'),(21,'2018-03-19 07:05:35','2018-03-19 07:05:35','TES777','AGUNG','non_Active'),(22,'2018-03-19 07:11:34','2018-03-19 07:11:34','dfgf','AGUNG','non_Active'),(23,'2018-03-19 16:13:50','2018-03-19 16:14:07','HALO','AGUNG','non_active'),(24,'2018-03-19 16:32:40','2018-03-20 07:55:20','halo999','AGUNG','non_active'),(25,'2018-03-20 09:08:02','2018-03-20 10:05:22','sadsadsadasd','AGUNG','non_active'),(26,'2018-03-20 10:05:32','2018-03-22 08:49:01','yuhu','AGUNG','non_active'),(27,'2018-03-22 07:26:53','2018-03-22 09:01:30','tes','AGUNG','non_active'),(28,'2018-03-22 07:27:00','2018-03-22 09:01:33','tes','AGUNG','non_active'),(29,'2018-03-22 08:41:39','2018-03-22 08:48:55','tes','RqJSwVRDHlQaJbNZMgpQupyDKBrgenBtwS8l5Kdi','non_active'),(30,'2018-03-22 08:46:50','2018-03-22 08:46:50','uuu','1','active'),(31,'2018-03-22 08:48:30','2018-03-22 09:01:27','ppp','ilham','non_active'),(32,'2018-03-24 07:41:58','2018-03-24 07:47:31','tau','1','active');
/*!40000 ALTER TABLE `mstr_privilages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-09 15:17:22
