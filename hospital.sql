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


-- Dumping database structure for hospital
CREATE DATABASE IF NOT EXISTS `hospital` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hospital`;

-- Dumping structure for table hospital.dokter
CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` int NOT NULL AUTO_INCREMENT,
  `nama_dokter` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `spesialisasi_id` int NOT NULL,
  `jadwal_kerja` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_dokter`),
  KEY `FK_dokter_spesialisasi` (`spesialisasi_id`),
  CONSTRAINT `FK_dokter_spesialisasi` FOREIGN KEY (`spesialisasi_id`) REFERENCES `spesialisasi` (`id_spesialisasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table hospital.dokter: ~0 rows (approximately)
INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialisasi_id`, `jadwal_kerja`, `created_at`, `updated_at`) VALUES
	(2, 'Dr. Dibyo', 2, 'Sabtu', '2024-07-16 10:09:32', '2024-07-16 11:01:05');

-- Dumping structure for table hospital.jadwal_periksa
CREATE TABLE IF NOT EXISTS `jadwal_periksa` (
  `id_jadwal` int NOT NULL AUTO_INCREMENT,
  `pasien_id` int NOT NULL,
  `dokter_id` int NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table hospital.jadwal_periksa: ~1 rows (approximately)
INSERT INTO `jadwal_periksa` (`id_jadwal`, `pasien_id`, `dokter_id`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, '2024-07-25', 'Waiting', '2024-07-16 11:01:56', '2024-07-16 11:11:32');

-- Dumping structure for table hospital.pasien
CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `usia` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table hospital.pasien: ~1 rows (approximately)
INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `usia`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 'fadhil abdillah', '24', '00000', 'subang', NULL, '2024-07-16 07:30:27'),
	(3, 'dil', '23', '11310231', '12121212', '2024-07-16 10:33:44', '2024-07-16 11:00:49');

-- Dumping structure for table hospital.riwayat_medis
CREATE TABLE IF NOT EXISTS `riwayat_medis` (
  `id_riwayat` int NOT NULL AUTO_INCREMENT,
  `pasien_id` int NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id_riwayat`),
  KEY `FK_riwayat_medis_pasien` (`pasien_id`),
  CONSTRAINT `FK_riwayat_medis_pasien` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table hospital.riwayat_medis: ~0 rows (approximately)

-- Dumping structure for table hospital.spesialisasi
CREATE TABLE IF NOT EXISTS `spesialisasi` (
  `id_spesialisasi` int NOT NULL AUTO_INCREMENT,
  `nama_spesialisasi` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_spesialisasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table hospital.spesialisasi: ~0 rows (approximately)
INSERT INTO `spesialisasi` (`id_spesialisasi`, `nama_spesialisasi`, `created_at`, `updated_at`) VALUES
	(2, 'UMUM', '2024-07-16 09:04:17', '2024-07-16 09:04:17');

-- Dumping structure for table hospital.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table hospital.user: ~1 rows (approximately)
INSERT INTO `user` (`id_user`, `username`, `email`, `password`) VALUES
	(1, '456', 'fadhil1023@gmail.com', '$2y$10$EeRg0ILiMxfSj0MrhBH.iOiRfizaD9rdPdn.D2a889/Pm3h1FXe7q');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
