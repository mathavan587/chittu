-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2025 at 12:47 PM
-- Server version: 9.1.0
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chittu`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categories` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `percentage` int NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories_import`
--

DROP TABLE IF EXISTS `categories_import`;
CREATE TABLE IF NOT EXISTS `categories_import` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categories` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `percentage` int NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_import`
--

DROP TABLE IF EXISTS `custom_import`;
CREATE TABLE IF NOT EXISTS `custom_import` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cname` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `set_rate` decimal(10,2) NOT NULL,
  `min` int DEFAULT NULL,
  `max` int DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `import_logs`
--

DROP TABLE IF EXISTS `import_logs`;
CREATE TABLE IF NOT EXISTS `import_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `api_url` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `api_key` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `import_logs`
--

INSERT INTO `import_logs` (`id`, `api_url`, `api_key`, `created_at`) VALUES
(1, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', '2025-04-30 17:08:26'),
(3, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', '2025-04-30 17:14:31'),
(4, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', '2025-04-30 17:14:37'),
(5, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', '2025-04-30 17:16:54'),
(6, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', '2025-04-30 17:19:23'),
(7, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', '2025-04-30 17:19:39'),
(8, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', '2025-04-30 17:21:56'),
(9, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', '2025-04-30 17:26:11'),
(10, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', '2025-05-02 04:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `email`, `mobile`, `created_at`) VALUES
(1, 'mano@gmail.com', '9887766554', '2025-04-30 11:29:21'),
(2, 'mano@gmail.com', '9887766554', '2025-05-01 23:28:26'),
(3, 'mano@gmail.com', '9887766554', '2025-05-01 23:28:33'),
(4, 'mano@gmail.com', '9887766554', '2025-05-02 22:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `service_id` int NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `amount` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `paymentId` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `orderId` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `signature` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `category` text COLLATE utf8mb4_unicode_ci,
  `cname` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `set_rate` decimal(10,2) NOT NULL,
  `min` int DEFAULT NULL,
  `max` int DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `otp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usertype` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `modified_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `status`, `otp`, `usertype`, `is_deleted`, `modified_at`, `created_at`) VALUES
(12, 'mathavan', 'vmathavan587@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8148668359', 0, '48167179', 'user', 0, '2025-04-15', '2025-04-15'),
(14, 'manojkumar', 'mano@gmail.com', '25d55ad283aa400af464c76d713c07ad', '9887766554', 0, '98787634', 'admin', 0, '2025-04-28', '2025-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

DROP TABLE IF EXISTS `verification`;
CREATE TABLE IF NOT EXISTS `verification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `otp` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
