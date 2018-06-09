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
-- Table structure for table `t_bimbingans`
--

DROP TABLE IF EXISTS `t_bimbingans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_bimbingans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengajuan` datetime NOT NULL,
  `tgl_approval` datetime NOT NULL,
  `tgl_kadaluarsa` datetime NOT NULL,
  `tgl_realisasi` datetime NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topik_bimbingan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_approval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_realisasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kadaluarsa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_approval_pengajuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_realisasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_bimbingans`
--

LOCK TABLES `t_bimbingans` WRITE;
/*!40000 ALTER TABLE `t_bimbingans` DISABLE KEYS */;
INSERT INTO `t_bimbingans` VALUES (1,'0000-00-00 00:00:00','2018-06-08 07:54:23','999','tes1','tes2','0000-00-00 00:00:00','2018-06-08 21:53:21','0000-00-00 00:00:00','2018-06-08 21:54:23','tes3','tes4','1','1','','tes5','tes6','-','-');
/*!40000 ALTER TABLE `t_bimbingans` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-09 15:17:19
