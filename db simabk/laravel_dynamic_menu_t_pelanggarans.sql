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
-- Table structure for table `t_pelanggarans`
--

DROP TABLE IF EXISTS `t_pelanggarans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_pelanggarans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pendisiplinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kejadian` datetime NOT NULL,
  `lokasi_kejadian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_pelanggaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_pendisiplinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_pelanggarans`
--

LOCK TABLES `t_pelanggarans` WRITE;
/*!40000 ALTER TABLE `t_pelanggarans` DISABLE KEYS */;
INSERT INTO `t_pelanggarans` VALUES (1,'2018-05-27 09:09:36','2018-06-07 16:09:46','ringan','jp2','2018-05-28 00:00:00','sekolahan','-','9977','2','non_active','tes','tes'),(2,'2018-05-27 09:10:14','2018-05-27 09:10:14','ringan','jp2','2018-05-31 00:00:00','tes','-','0','2','active','tes','tes'),(3,'2018-06-06 10:01:17','2018-06-06 10:01:17','ringan','jp2','2018-06-11 00:00:00','sd','-','0','2','active','ds','sd'),(4,'2018-06-06 10:34:07','2018-06-06 10:34:07','sedang','jp2','2018-06-10 00:00:00','sdf','-','0','2','active','sdfd','sdf'),(5,'2018-06-06 10:35:23','2018-06-06 10:35:23','sedang','jp2','2018-06-06 00:00:00','asd','-','0','2','active','sad','sad'),(6,'2018-06-06 10:36:03','2018-06-06 10:36:03','sedang','jp2','2018-06-07 00:00:00','sdf','-','777','2','active','sdfd','dsfdf'),(7,'2018-06-06 10:37:04','2018-06-06 10:37:04','sedang','jp2','2018-06-07 00:00:00','wer','-','0','2','active','were','wer'),(8,'2018-06-06 10:39:21','2018-06-06 10:39:21','sedang','jp2','2018-06-07 00:00:00','sdf','-','777','2','active','sdf','sdf');
/*!40000 ALTER TABLE `t_pelanggarans` ENABLE KEYS */;
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
