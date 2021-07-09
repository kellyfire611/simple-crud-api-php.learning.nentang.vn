-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for netashop
CREATE DATABASE IF NOT EXISTS `netashop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `netashop`;

-- Dumping structure for table netashop.shop_categories
CREATE TABLE IF NOT EXISTS `shop_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã chuyên mục',
  `category_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên chuyên mục',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Diễn giải',
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ảnh đại diện',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_code` (`category_code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table netashop.shop_categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `shop_categories` DISABLE KEYS */;
INSERT INTO `shop_categories` (`id`, `category_code`, `category_name`, `description`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'CAT1', 'Laptop', 'All laptop products', 'categories/laptop_20200217170111.jpg', NULL, NULL),
	(2, 'CAT2', 'Phone', 'All phones', 'categories/phone_20200217170111.jpg', NULL, NULL),
	(3, 'CAT3', 'Camera', 'PhotographCamera', 'categories/camera_20200217170111.jpg', NULL, NULL),
	(4, 'CAT4', 'Tablet', 'Tablet', 'categories/tablet_20200217170111.jpg', NULL, NULL);
/*!40000 ALTER TABLE `shop_categories` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
