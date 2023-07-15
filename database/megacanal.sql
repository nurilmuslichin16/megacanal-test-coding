-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for megacanal
CREATE DATABASE IF NOT EXISTS `megacanal` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `megacanal`;

-- Dumping structure for table megacanal.t_pesanan
CREATE TABLE IF NOT EXISTS `t_pesanan` (
  `id_pesanan` bigint NOT NULL AUTO_INCREMENT,
  `no_pesanan` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nm_supplier` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nm_produk` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table megacanal.t_pesanan: ~3 rows (approximately)
INSERT INTO `t_pesanan` (`id_pesanan`, `no_pesanan`, `tanggal`, `nm_supplier`, `nm_produk`, `total`) VALUES
	(1, 'NO-124', '2023-07-15 08:18:00', 'PT Mayora', 'Biskuit Roma', 100),
	(2, 'NO-125', '2023-07-14 08:20:00', 'PT Nusantara Tektil', 'Sarung Semut', 12),
	(3, 'NO-126', '2023-07-15 08:21:00', 'PT Nusantara Tektil', 'Sarung Gajah', 12000000);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
