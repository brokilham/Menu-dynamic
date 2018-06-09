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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_03_07_164608_create_webpages_table',2),(4,'2018_03_08_144555_add_field_webpages',3),(5,'2018_03_08_160000_create_table_main_menu',4),(9,'2018_03_09_151149_create_privilage_webpages_table',5),(10,'2018_03_10_073529_create_mstr_privilages_table',6),(11,'2018_03_24_145040_create_mstr_siswas_table',7),(12,'2018_03_24_151505_create_mstr_walimurids_table',8),(13,'2018_03_24_151639_create_mstr_kelas_table',9),(14,'2018_03_24_161719_add_field_mstr_kelas',10),(15,'2018_03_24_161919_add_field_mstr_kelas',11),(16,'2018_03_25_032038_create_mstr_jabatans_table',12),(17,'2018_03_25_033556_add_field_mstr_jabatans',13),(18,'2018_03_25_043159_create_mstr_gurus_table',14),(19,'2018_03_26_110328_add_field_mstr_siswas',15),(20,'2018_04_03_114819_add_field_master_siswas',16),(24,'2018_04_14_080931_change_name_field_mstr_walimurids',17),(25,'2018_04_14_085511_change_name_field_mstr_walimurids',18),(26,'2018_05_03_150123_create_t_distribusi_kelas_table',19),(27,'2018_05_03_150154_create_t_distribusi_jabatans_table',19),(28,'2018_05_03_150208_create_t_distribusi_walikelas_table',19),(29,'2018_05_08_142545_add_field_t_distribusi_walikelas',20),(30,'2018_05_21_145121_create_mstr_jadwals_table',21),(31,'2018_05_21_145142_create_t_pelanggarans_table',21),(32,'2018_05_21_145158_create_t_bimbingans_table',21),(33,'2018_05_21_145219_create_t_distribusi_jadwals_table',21),(34,'2018_05_21_160329_create_mstr_jams_table',22),(35,'2018_05_22_145137_add_field_user_table',23),(36,'2018_05_26_133121_add_field_distribusi_jadwal',24),(37,'2018_05_27_130244_add_field_pelanggaran',25),(38,'2018_05_27_134319_add_field_pelanggarn',26),(39,'2018_05_27_164705_add_field_bimbingan',27),(40,'2018_05_29_055910_create_mstr_ket_realisasis_table',28),(41,'2018_05_29_072951_create_mstr_ket_approvals_table',29),(43,'2018_05_29_074959_add_field_bimbingan',30),(44,'2018_05_29_121758_add_field_bimbingan',31),(45,'2018_06_01_175106_add_field_user',32),(46,'2018_06_02_142324_add_field_master_jabatan',33),(47,'2018_06_02_184409_add_field_master_jabatan',34),(48,'2018_06_03_112805_change_type_id_walimurid',35);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
