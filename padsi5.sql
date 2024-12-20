-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: padsi5
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `detail_pembelian`
--

DROP TABLE IF EXISTS `detail_pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_pembelian` (
  `id_stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_item_pembelian` int NOT NULL,
  `total_harga_pembelian` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_stok`,`id_pembelian`),
  KEY `detail_pembelian_id_pembelian_foreign` (`id_pembelian`),
  CONSTRAINT `detail_pembelian_id_pembelian_foreign` FOREIGN KEY (`id_pembelian`) REFERENCES `transaksi_pembelian` (`id_pembelian`),
  CONSTRAINT `detail_pembelian_id_stok_foreign` FOREIGN KEY (`id_stok`) REFERENCES `stok` (`id_stok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pembelian`
--

LOCK TABLES `detail_pembelian` WRITE;
/*!40000 ALTER TABLE `detail_pembelian` DISABLE KEYS */;
INSERT INTO `detail_pembelian` VALUES ('s001','Kopi Arabika','PB001','2024-12-06',50,250000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s002','Gula Pasir','PB002','2024-12-06',100,500000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s003','Lychee','PB003','2024-12-06',75,375000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s004','Bubuk Teh','PB004','2024-12-06',20,100000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s005','Susu Sapi','PB005','2024-12-06',30,150000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s006','Krim Kental','PB006','2024-12-06',45,225000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s007','Coklat Bubuk','PB007','2024-12-06',60,300000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s008','Kayu Manis','PB008','2024-12-06',90,450000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s009','Sirup Vanila','PB009','2024-12-06',15,75000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s010','Es Batu','PB010','2024-12-06',80,400000,'2024-12-06 14:33:19','2024-12-06 14:33:19');
/*!40000 ALTER TABLE `detail_pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_penjualan`
--

DROP TABLE IF EXISTS `detail_penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_penjualan` (
  `id_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_menu` int NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `id_penjualan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_penjualan` double NOT NULL,
  `id_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`,`id_penjualan`),
  KEY `detail_penjualan_id_penjualan_foreign` (`id_penjualan`),
  KEY `detail_penjualan_id_pelanggan_foreign` (`id_pelanggan`),
  CONSTRAINT `detail_penjualan_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE,
  CONSTRAINT `detail_penjualan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE,
  CONSTRAINT `detail_penjualan_id_penjualan_foreign` FOREIGN KEY (`id_penjualan`) REFERENCES `transaksi_penjualan` (`id_penjualan`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_penjualan`
--

LOCK TABLES `detail_penjualan` WRITE;
/*!40000 ALTER TABLE `detail_penjualan` DISABLE KEYS */;
INSERT INTO `detail_penjualan` VALUES ('m001','Kopi Latte',2,'2024-12-06','t001',50000,'p001','Cahyo Prasetyo','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m002','Kopi Espresso',3,'2024-12-06','t002',60000,'p002','Wulan Sari','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m003','Americano',1,'2024-12-06','t003',15000,'p003','Rudi Hartono','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m004','Cappuccino',4,'2024-12-06','t004',120000,'p004','Ayu Lestari','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m005','Roti Panggang',2,'2024-12-06','t005',30000,'p005','Bagus Pranoto','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m006','Matcha Latte',1,'2024-12-06','t006',28000,'p006','Diana Suryani','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m007','Teh Tarik',2,'2024-12-06','t007',36000,'p007','Eko Prabowo','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m008','Brownies',3,'2024-12-06','t008',60000,'p008','Fajar Aditya','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m009','Cheesecake',2,'2024-12-06','t009',60000,'p009','Gina Lestari','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m010','Frappuccino',1,'2024-12-06','t010',35000,'p010','Hendra Saputra','2024-12-06 14:33:19','2024-12-06 14:33:19');
/*!40000 ALTER TABLE `detail_penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_menu` text COLLATE utf8mb4_unicode_ci,
  `harga_menu` int NOT NULL,
  `kategori_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  UNIQUE KEY `menu_nama_menu_unique` (`nama_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES ('m001','Kopi Latte','Kopi latte dengan campuran susu',25000,'Minuman','kopi_latte.jpg','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m002','Kopi Espresso','Espresso dengan rasa kuat',20000,'Minuman','kopi_espresso.jpg','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m003','Americano','Kopi hitam tanpa gula',15000,'Minuman','americano.jpg','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m004','Cappuccino','Kopi dengan busa susu',30000,'Minuman','cappuccino.jpg','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m005','Roti Panggang','Roti panggang dengan selai',15000,'Makanan','roti_panggang.jpg','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m006','Matcha Latte','Teh hijau dengan susu',28000,'Minuman','matcha_latte.jpg','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m007','Teh Tarik','Teh dengan susu kental manis',18000,'Minuman','teh_tarik.jpg','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m008','Brownies','Kue cokelat lembut',20000,'Makanan','brownies.jpg','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m009','Cheesecake','Kue keju lembut',30000,'Makanan','cheesecake.jpg','2024-12-06 14:33:19','2024-12-06 14:33:19'),('m010','Frappuccino','Minuman kopi dingin dengan es krim',35000,'Minuman','frappuccino.jpg','2024-12-06 14:33:19','2024-12-06 14:33:19');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_reset_tokens_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2024_10_31_000000_create_users_table',1),(5,'2024_10_31_000001_create_menu_table',1),(6,'2024_10_31_000002_create_roles_table',1),(7,'2024_10_31_000003_create_stok_table',1),(8,'2024_10_31_000004_create_pelanggan_table',1),(9,'2024_10_31_000005_create_transaksi_penjualan_table',1),(10,'2024_10_31_000006_create_transaksi_pembelian_table',1),(11,'2024_10_31_000007_create_detail_penjualan_table',1),(12,'2024_10_31_000008_create_detail_pembelian_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin_pelanggan` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`),
  UNIQUE KEY `pelanggan_no_hp_pelanggan_unique` (`no_hp_pelanggan`),
  UNIQUE KEY `pelanggan_email_pelanggan_unique` (`email_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES ('p001','Cahyo Prasetyo','081234567900','cahyo.prasetyo@example.com',5,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('p002','Wulan Sari','081234567901','wulan.sari@example.com',1,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('p003','Rudi Hartono','081234567902','rudi.hartono@example.com',6,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('p004','Ayu Lestari','081234567903','ayu.lestari@example.com',10,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('p005','Bagus Pranoto','081234567904','bagus.pranoto@example.com',12,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('p006','Diana Suryani','081234567905','diana.suryani@example.com',3,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('p007','Eko Prabowo','081234567906','eko.prabowo@example.com',5,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('p008','Fajar Aditya','081234567907','fajar.aditya@example.com',5,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('p009','Gina Lestari','081234567908','gina.lestari@example.com',5,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('p010','Hendra Saputra','081234567909','hendra.saputra@example.com',6,'2024-12-06 14:33:19','2024-12-06 14:33:19');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id_role` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `roles_name_role_unique` (`name_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok`
--

DROP TABLE IF EXISTS `stok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stok` (
  `id_stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_stok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_stok` int NOT NULL,
  `kategori_stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_stok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_stok` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_stok`),
  UNIQUE KEY `stok_nama_stok_unique` (`nama_stok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok`
--

LOCK TABLES `stok` WRITE;
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
INSERT INTO `stok` VALUES ('s001','Kopi Arabika','Biji kopi Arabika premium',100,'Biji Kopi','kopi_arabika.jpg',80000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s002','Gula Pasir','Gula pasir berkualitas',200,'Bahan Minuman','gula_pasir.jpg',15000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s003','Lychee','Leci Segar',200,'Bahan Minuman','leci.jpg',5000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s004','Bubuk Teh','Bubuk Teh berkualitas',200,'Bahan Minuman','bubuk_teh.jpg',30000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s005','Susu Sapi','Susu segar untuk minuman kopi',150,'Bahan Minuman','susu_sapi.jpg',25000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s006','Krim Kental','Krim kental untuk topping',80,'Bahan Minuman','krim_kental.jpg',35000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s007','Coklat Bubuk','Bubuk coklat berkualitas tinggi',120,'Bahan Minuman','coklat_bubuk.jpg',40000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s008','Kayu Manis','Bubuk kayu manis untuk rasa ekstra',50,'Bahan Tambahan','kayu_manis.jpg',20000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s009','Sirup Vanila','Sirup vanila untuk menambah rasa',100,'Bahan Minuman','sirup_vanila.jpg',10000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('s010','Es Batu','Es batu untuk minuman dingin',500,'Bahan Minuman','es_batu.jpg',5000,'2024-12-06 14:33:19','2024-12-06 14:33:19');
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi_pembelian`
--

DROP TABLE IF EXISTS `transaksi_pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaksi_pembelian` (
  `id_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembelian` timestamp NOT NULL,
  `id_stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_item_pembelian` int NOT NULL,
  `total_harga_pembelian` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`),
  KEY `transaksi_pembelian_id_stok_foreign` (`id_stok`),
  CONSTRAINT `transaksi_pembelian_id_stok_foreign` FOREIGN KEY (`id_stok`) REFERENCES `stok` (`id_stok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_pembelian`
--

LOCK TABLES `transaksi_pembelian` WRITE;
/*!40000 ALTER TABLE `transaksi_pembelian` DISABLE KEYS */;
INSERT INTO `transaksi_pembelian` VALUES ('PB001','2024-12-06 14:33:19','s001','Kopi Arabika',50,250000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('PB002','2024-12-06 14:33:19','s002','Gula Pasir',100,500000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('PB003','2024-12-06 14:33:19','s003','Lychee',75,375000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('PB004','2024-12-06 14:33:19','s004','Bubuk Teh',20,100000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('PB005','2024-12-06 14:33:19','s005','Susu Sapi',30,150000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('PB006','2024-12-06 14:33:19','s006','Krim Kental',45,225000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('PB007','2024-12-06 14:33:19','s007','Coklat Bubuk',60,300000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('PB008','2024-12-06 14:33:19','s008','Kayu Manis',90,450000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('PB009','2024-12-06 14:33:19','s009','Sirup Vanila',15,75000,'2024-12-06 14:33:19','2024-12-06 14:33:19'),('PB010','2024-12-06 14:33:19','s010','Es Batu',80,400000,'2024-12-06 14:33:19','2024-12-06 14:33:19');
/*!40000 ALTER TABLE `transaksi_pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi_penjualan`
--

DROP TABLE IF EXISTS `transaksi_penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaksi_penjualan` (
  `id_penjualan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `id_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_menu` int NOT NULL,
  `harga_menu` decimal(10,2) NOT NULL,
  `total_penjualan` decimal(15,2) NOT NULL,
  `id_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`),
  UNIQUE KEY `transaksi_penjualan_id_menu_tanggal_penjualan_unique` (`id_menu`,`tanggal_penjualan`),
  KEY `transaksi_penjualan_id_pelanggan_foreign` (`id_pelanggan`),
  CONSTRAINT `transaksi_penjualan_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE,
  CONSTRAINT `transaksi_penjualan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_penjualan`
--

LOCK TABLES `transaksi_penjualan` WRITE;
/*!40000 ALTER TABLE `transaksi_penjualan` DISABLE KEYS */;
INSERT INTO `transaksi_penjualan` VALUES ('t001','2024-12-06','m001','Kopi Latte',2,25000.00,50000.00,'p001','Cahyo Prasetyo','2024-12-06 14:33:19','2024-12-06 14:33:19'),('t002','2024-12-06','m002','Kopi Espresso',3,20000.00,60000.00,'p002','Wulan Sari','2024-12-06 14:33:19','2024-12-06 14:33:19'),('t003','2024-12-06','m003','Americano',1,15000.00,15000.00,'p003','Rudi Hartono','2024-12-06 14:33:19','2024-12-06 14:33:19'),('t004','2024-12-06','m004','Cappuccino',4,30000.00,120000.00,'p004','Ayu Lestari','2024-12-06 14:33:19','2024-12-06 14:33:19'),('t005','2024-12-06','m005','Roti Panggang',2,15000.00,30000.00,'p005','Bagus Pranoto','2024-12-06 14:33:19','2024-12-06 14:33:19'),('t006','2024-12-06','m006','Matcha Latte',1,28000.00,28000.00,'p006','Diana Suryani','2024-12-06 14:33:19','2024-12-06 14:33:19'),('t007','2024-12-06','m007','Teh Tarik',2,18000.00,36000.00,'p007','Eko Prabowo','2024-12-06 14:33:19','2024-12-06 14:33:19'),('t008','2024-12-06','m008','Brownies',3,20000.00,60000.00,'p008','Fajar Aditya','2024-12-06 14:33:19','2024-12-06 14:33:19'),('t009','2024-12-06','m009','Cheesecake',2,30000.00,60000.00,'p009','Gina Lestari','2024-12-06 14:33:19','2024-12-06 14:33:19'),('t010','2024-12-06','m010','Frappuccino',1,35000.00,35000.00,'p010','Hendra Saputra','2024-12-06 14:33:19','2024-12-06 14:33:19');
/*!40000 ALTER TABLE `transaksi_penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pegawai',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Owner','valen@gmail.com','$2y$12$Bb8DWLZZ7YKwj0EZIU5QL.vSW431DqSBqGBFr.bxYKdl1DmwxwvHW','admin','2024-12-06 14:33:19',NULL),(2,'Staff','felix@gmail.com','$2y$12$7ylI2zLk1J2yflajHMCAquUgm1bcvlZFwKbpaomSFRX/ecp8wkgru','pegawai','2024-12-06 14:33:19',NULL);
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

-- Dump completed on 2024-12-07 12:46:40
