-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2025 at 12:17 PM
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
-- Database: `teams`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

DROP TABLE IF EXISTS `activitylog`;
CREATE TABLE IF NOT EXISTS `activitylog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `platform` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `browser` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `robot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referrer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=290 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`id`, `uid`, `message`, `createAt`, `updateAt`, `ip_address`, `platform`, `browser`, `mobile`, `robot`, `referrer`, `user_agent`) VALUES
(187, 9, 'Logged In', '2024-01-15 04:17:47', '2024-01-15 04:17:47', '', '', '', '', '', '', ''),
(201, 9, 'Logged In', '2025-01-19 16:40:19', '2025-01-19 16:40:19', '', '', '', '', '', '', ''),
(202, 9, 'Logged Out', '2025-01-19 17:19:08', '2025-01-19 17:19:08', '', '', '', '', '', '', ''),
(203, 9, 'Logged Out', '2025-01-19 17:20:45', '2025-01-19 17:20:45', '', '', '', '', '', '', ''),
(204, 9, 'Logged Out', '2025-01-19 17:36:56', '2025-01-19 17:36:56', '', '', '', '', '', '', ''),
(205, 9, 'Android App is completed', '2025-01-19 18:47:22', '2025-01-19 18:47:22', '', '', '', '', '', '', ''),
(206, 9, 'User Edited Profile', '2025-01-19 18:49:42', '2025-01-19 18:49:42', '', '', '', '', '', '', ''),
(207, 9, 'User Edited Profile', '2025-01-19 18:49:47', '2025-01-19 18:49:47', '', '', '', '', '', '', ''),
(208, 9, 'User Views Profile of Gokulakrishnan', '2025-01-19 18:51:06', '2025-01-19 18:51:06', '', '', '', '', '', '', ''),
(209, 9, 'User Views Profile of Gokulakrishnan', '2025-01-19 18:51:07', '2025-01-19 18:51:07', '', '', '', '', '', '', ''),
(210, 9, 'User Views Profile of Dinesh Kumar', '2025-01-20 05:04:10', '2025-01-20 05:04:10', '', '', '', '', '', '', ''),
(211, 9, 'User Views Profile of Dinesh Kumar', '2025-01-20 05:04:11', '2025-01-20 05:04:11', '', '', '', '', '', '', ''),
(212, 9, 'Logged Out', '2025-01-20 05:04:18', '2025-01-20 05:04:18', '', '', '', '', '', '', ''),
(213, 9, 'User Views Profile of Dinesh Kumar', '2025-01-20 05:42:10', '2025-01-20 05:42:10', '', '', '', '', '', '', ''),
(214, 9, 'User Views Profile of Dinesh Kumar', '2025-01-20 05:42:10', '2025-01-20 05:42:10', '', '', '', '', '', '', ''),
(215, 9, 'Logged Out', '2025-01-20 05:45:38', '2025-01-20 05:45:38', '', '', '', '', '', '', ''),
(216, 9, 'User Views Profile of Dinesh Kumar', '2025-01-20 08:31:49', '2025-01-20 08:31:49', '', '', '', '', '', '', ''),
(217, 9, 'User Views Profile of Dinesh Kumar', '2025-01-20 08:31:49', '2025-01-20 08:31:49', '', '', '', '', '', '', ''),
(218, 9, 'Logged Out', '2025-01-20 08:32:06', '2025-01-20 08:32:06', '', '', '', '', '', '', ''),
(219, 9, 'User Views Profile of Dinesh', '2025-01-20 08:51:26', '2025-01-20 08:51:26', '', '', '', '', '', '', ''),
(220, 9, 'User Views Profile of Dinesh', '2025-01-20 08:51:26', '2025-01-20 08:51:26', '', '', '', '', '', '', ''),
(221, 9, 'Logged Out', '2025-01-20 11:35:27', '2025-01-20 11:35:27', '', '', '', '', '', '', ''),
(222, 9, 'User Views Profile of Dinesh Kumar', '2025-01-20 11:48:54', '2025-01-20 11:48:54', '', '', '', '', '', '', ''),
(223, 9, 'User Views Profile of Dinesh Kumar', '2025-01-20 11:48:55', '2025-01-20 11:48:55', '', '', '', '', '', '', ''),
(224, 9, 'User Views Profile of Dinesh Kumar', '2025-01-20 11:53:18', '2025-01-20 11:53:18', '', '', '', '', '', '', ''),
(225, 9, 'User Views Profile of Dinesh Kumar', '2025-01-20 11:53:18', '2025-01-20 11:53:18', '', '', '', '', '', '', ''),
(226, 9, 'User Views Profile of Dinesh', '2025-01-21 11:11:17', '2025-01-21 11:11:17', '', '', '', '', '', '', ''),
(227, 9, 'User Views Profile of Dinesh', '2025-01-21 11:11:17', '2025-01-21 11:11:17', '', '', '', '', '', '', ''),
(228, 9, 'User Views Profile of Dinesh', '2025-01-21 11:11:45', '2025-01-21 11:11:45', '', '', '', '', '', '', ''),
(229, 9, 'User Views Profile of Dinesh', '2025-01-21 11:11:46', '2025-01-21 11:11:46', '', '', '', '', '', '', ''),
(230, 9, 'Logged Out', '2025-01-21 11:51:27', '2025-01-21 11:51:27', '', '', '', '', '', '', ''),
(231, 9, 'Logged In', '2025-01-27 04:26:46', '2025-01-27 04:26:46', '::1', 'Windows 10', 'Chrome 132.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(232, 9, 'User Views Profile of Dinesh Kumar', '2025-01-27 04:28:15', '2025-01-27 04:28:15', '', '', '', NULL, NULL, '', ''),
(233, 9, 'User Views Profile of Dinesh Kumar', '2025-01-27 04:28:15', '2025-01-27 04:28:15', '', '', '', NULL, NULL, '', ''),
(234, 9, 'User Views Profile of Logesh R', '2025-01-27 04:28:22', '2025-01-27 04:28:22', '', '', '', NULL, NULL, '', ''),
(235, 9, 'User Views Profile of Logesh R', '2025-01-27 04:28:22', '2025-01-27 04:28:22', '', '', '', NULL, NULL, '', ''),
(236, 9, 'User Views Profile of Gokulakrishnan', '2025-01-27 04:28:29', '2025-01-27 04:28:29', '', '', '', NULL, NULL, '', ''),
(237, 9, 'User Views Profile of Gokulakrishnan', '2025-01-27 04:28:29', '2025-01-27 04:28:29', '', '', '', NULL, NULL, '', ''),
(238, 9, 'Logged Out', '2025-01-27 04:29:08', '2025-01-27 04:29:08', '', '', '', NULL, NULL, '', ''),
(239, 9, 'Logged In', '2025-01-27 04:45:55', '2025-01-27 04:45:55', '::1', 'Windows 10', 'Chrome 132.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(240, 9, 'User Views Profile of Dinesh Kumar', '2025-01-27 04:48:45', '2025-01-27 04:48:45', '', '', '', NULL, NULL, '', ''),
(241, 9, 'User Views Profile of Dinesh Kumar', '2025-01-27 04:48:46', '2025-01-27 04:48:46', '', '', '', NULL, NULL, '', ''),
(242, 9, 'User Views Profile of Arun', '2025-01-27 04:48:56', '2025-01-27 04:48:56', '', '', '', NULL, NULL, '', ''),
(243, 9, 'User Views Profile of Arun', '2025-01-27 04:48:56', '2025-01-27 04:48:56', '', '', '', NULL, NULL, '', ''),
(244, 9, 'Logged Out', '2025-01-27 04:49:16', '2025-01-27 04:49:16', '', '', '', NULL, NULL, '', ''),
(245, 9, 'Logged In', '2025-01-27 05:14:00', '2025-01-27 05:14:00', '::1', 'Windows 10', 'Chrome 132.0.0.0', NULL, NULL, 'http://localhost/nutZ/main/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(246, 9, 'User Views Profile of Employee', '2025-01-27 05:24:39', '2025-01-27 05:24:39', '', '', '', NULL, NULL, '', ''),
(247, 9, 'User Views Profile of Employee', '2025-01-27 05:24:39', '2025-01-27 05:24:39', '', '', '', NULL, NULL, '', ''),
(248, 9, 'User Views Profile of Employee', '2025-01-27 05:33:22', '2025-01-27 05:33:22', '', '', '', NULL, NULL, '', ''),
(249, 9, 'User Views Profile of Employee', '2025-01-27 05:33:23', '2025-01-27 05:33:23', '', '', '', NULL, NULL, '', ''),
(250, 9, 'User Views Profile of Arun', '2025-01-27 05:33:49', '2025-01-27 05:33:49', '', '', '', NULL, NULL, '', ''),
(251, 9, 'User Views Profile of Arun', '2025-01-27 05:33:49', '2025-01-27 05:33:49', '', '', '', NULL, NULL, '', ''),
(252, 9, 'User Views Profile of Dinesh Kumar', '2025-01-27 06:10:59', '2025-01-27 06:10:59', '', '', '', NULL, NULL, '', ''),
(253, 9, 'User Views Profile of Dinesh Kumar', '2025-01-27 06:10:59', '2025-01-27 06:10:59', '', '', '', NULL, NULL, '', ''),
(254, 9, 'Logged Out', '2025-01-27 06:14:13', '2025-01-27 06:14:13', '', '', '', NULL, NULL, '', ''),
(255, 9, 'Logged In', '2025-01-27 06:16:37', '2025-01-27 06:16:37', '::1', 'Windows 10', 'Chrome 132.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(256, 9, 'Logged Out', '2025-01-27 06:25:35', '2025-01-27 06:25:35', '', '', '', NULL, NULL, '', ''),
(257, 9, 'Logged In', '2025-02-04 06:03:22', '2025-02-04 06:03:22', '::1', 'Windows 10', 'Chrome 132.0.0.0', NULL, NULL, 'http://localhost/nutZ/main/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(258, 9, 'User Views Profile of Dinesh Kumar', '2025-02-04 06:05:20', '2025-02-04 06:05:20', '', '', '', NULL, NULL, '', ''),
(259, 9, 'User Views Profile of Dinesh Kumar', '2025-02-04 06:05:20', '2025-02-04 06:05:20', '', '', '', NULL, NULL, '', ''),
(260, 9, 'Logged Out', '2025-02-04 06:11:56', '2025-02-04 06:11:56', '', '', '', NULL, NULL, '', ''),
(261, 9, 'Logged In', '2025-02-04 06:12:06', '2025-02-04 06:12:06', '::1', 'Windows 10', 'Chrome 132.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(262, 9, 'Logged In', '2025-02-05 05:28:41', '2025-02-05 05:28:41', '::1', 'Windows 10', 'Chrome 132.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(263, 9, 'User Views Profile of Employee', '2025-02-05 05:30:35', '2025-02-05 05:30:35', '', '', '', NULL, NULL, '', ''),
(264, 9, 'User Views Profile of Employee', '2025-02-05 05:30:35', '2025-02-05 05:30:35', '', '', '', NULL, NULL, '', ''),
(265, 9, 'User Views Profile of Arun', '2025-02-05 05:37:46', '2025-02-05 05:37:46', '', '', '', NULL, NULL, '', ''),
(266, 9, 'User Views Profile of Arun', '2025-02-05 05:37:47', '2025-02-05 05:37:47', '', '', '', NULL, NULL, '', ''),
(267, 9, 'User Views Profile of raja', '2025-02-05 05:37:56', '2025-02-05 05:37:56', '', '', '', NULL, NULL, '', ''),
(268, 9, 'User Views Profile of raja', '2025-02-05 05:37:56', '2025-02-05 05:37:56', '', '', '', NULL, NULL, '', ''),
(269, 9, 'User Views Profile of mohan', '2025-02-05 05:38:01', '2025-02-05 05:38:01', '', '', '', NULL, NULL, '', ''),
(270, 9, 'User Views Profile of mohan', '2025-02-05 05:38:01', '2025-02-05 05:38:01', '', '', '', NULL, NULL, '', ''),
(271, 9, 'User Views Profile of Dinesh', '2025-02-05 05:38:06', '2025-02-05 05:38:06', '', '', '', NULL, NULL, '', ''),
(272, 9, 'User Views Profile of Dinesh', '2025-02-05 05:38:06', '2025-02-05 05:38:06', '', '', '', NULL, NULL, '', ''),
(273, 9, 'Logged In', '2025-02-05 12:01:59', '2025-02-05 12:01:59', '::1', 'Windows 10', 'Chrome 132.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(274, 9, 'Logged In', '2025-02-06 08:43:08', '2025-02-06 08:43:08', '::1', 'Windows 10', 'Chrome 132.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(275, 9, 'User Views Profile of Employee', '2025-02-06 08:43:40', '2025-02-06 08:43:40', '', '', '', NULL, NULL, '', ''),
(276, 9, 'User Views Profile of Employee', '2025-02-06 08:43:41', '2025-02-06 08:43:41', '', '', '', NULL, NULL, '', ''),
(277, 9, 'Logged In', '2025-02-12 04:44:27', '2025-02-12 04:44:27', '::1', 'Windows 10', 'Chrome 133.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(278, 9, 'Logged Out', '2025-02-12 04:48:49', '2025-02-12 04:48:49', '', '', '', NULL, NULL, '', ''),
(279, 9, 'Logged In', '2025-02-12 06:56:38', '2025-02-12 06:56:38', '::1', 'Windows 10', 'Chrome 133.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(280, 9, 'Logged Out', '2025-02-12 08:10:28', '2025-02-12 08:10:28', '', '', '', NULL, NULL, '', ''),
(281, 9, 'Logged In', '2025-03-05 06:33:58', '2025-03-05 06:33:58', '::1', 'Windows 10', 'Chrome 133.0.0.0', NULL, NULL, 'http://localhost/Nutz/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(282, 9, 'Logged Out', '2025-03-05 06:38:48', '2025-03-05 06:38:48', '', '', '', NULL, NULL, '', ''),
(283, 9, 'Logged In', '2025-03-20 09:13:15', '2025-03-20 09:13:15', '::1', 'Windows 10', 'Chrome 134.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(284, 9, 'Logged Out', '2025-03-20 09:20:47', '2025-03-20 09:20:47', '', '', '', NULL, NULL, '', ''),
(285, 9, 'Logged In', '2025-03-21 06:41:03', '2025-03-21 06:41:03', '::1', 'Windows 10', 'Chrome 134.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(286, 9, 'Logged In', '2025-03-24 05:09:05', '2025-03-24 05:09:05', '::1', 'Windows 10', 'Chrome 134.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(287, 9, 'Logged Out', '2025-03-24 05:10:31', '2025-03-24 05:10:31', '', '', '', NULL, NULL, '', ''),
(288, 9, 'Logged In', '2025-04-08 03:57:05', '2025-04-08 03:57:05', '::1', 'Windows 10', 'Chrome 134.0.0.0', NULL, NULL, 'http://localhost/nutZ/', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb'),
(289, 9, 'Logged Out', '2025-04-08 03:57:11', '2025-04-08 03:57:11', '', '', '', NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `teamId` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `teamName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `checkIn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `checkOut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `workfromhome` tinyint NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `teamId`, `teamName`, `date`, `checkIn`, `checkOut`, `workfromhome`, `reason`) VALUES
(18, '9', 'Employee', '15-01-2024', '16-01-2024 10:50:51', '16-01-2024 10:53:15', 0, NULL),
(19, '9', 'Employee', '14-01-2024', '16-01-2024 10:55:05', '16-01-2024 10:55:18', 1, NULL),
(20, '4', 'Employee', '16-01-2024', '16-01-2024 11:08:16', '16-01-2024 11:22:11', 0, NULL),
(32, '9', 'Employee', '16-01-2024', NULL, '16-01-2024 12:39:26', 2, 'fever'),
(33, '5', 'Employee', '16-01-2024', '16-01-2024 11:08:16', '16-01-2024 11:22:11', 1, NULL),
(34, '9', 'Employee', '19-01-2025', NULL, '19-01-2025 23:06:49', 2, 'leave'),
(35, '9', 'Employee', '31-01-2025', NULL, NULL, 2, 'office'),
(38, '9', 'Employee', '27-01-2025', '27-01-2025 10:16:02', NULL, 0, NULL),
(39, '9', 'Employee', '28-01-2025', NULL, NULL, 2, 'office');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wallet` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `wallet`, `status`, `createAt`, `updateAt`) VALUES
(1, 'HDFC', 0, 1, '2021-08-09 03:06:00', '2024-01-15 08:08:49'),
(2, 'IDFC', 0, 1, '2021-08-09 03:47:26', '2024-01-14 13:01:42'),
(3, 'Cash (HDFC)', 0, 1, '2021-08-09 03:47:26', '2024-01-14 11:38:09'),
(4, 'Cash (IDFC)', 0, 1, '2021-08-09 03:47:26', '2024-01-14 11:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(1, 'Design', 1),
(2, 'Development', 1),
(5, 'UiUx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `company`, `email`, `phone`, `delete`, `created_at`, `modified_at`) VALUES
(1, 'mathavan', 'orm', 'vmathavan587@gmail.com', '8148668359', 1, '2025-03-28 06:48:24', '2025-03-28 06:49:53'),
(2, 'MANOJKUMAR B', 'crm', 'vmathavan587@gmail.com', '9845327826', 1, '2025-03-29 04:56:49', '2025-03-29 04:56:49'),
(3, 'mano', 'rrr', 'manoj@gmail.com', '9354638546', 2, '2025-03-29 04:58:15', '2025-03-29 04:58:15'),
(4, 'raja', 'sisdhb', 'raja@gmail.com', '8148668359', 2, '2025-03-31 05:45:03', '2025-03-31 05:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

DROP TABLE IF EXISTS `college`;
CREATE TABLE IF NOT EXISTS `college` (
  `id` int NOT NULL AUTO_INCREMENT,
  `College` varchar(130) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `College`) VALUES
(1, ' N.G.P. Arts and Science'),
(2, 'Nandha Arts and Science ');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int NOT NULL AUTO_INCREMENT,
  `com_name` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `com_name`) VALUES
(1, 'Nutz Technovation Pvt Ltd'),
(2, 'RPP');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'SME',
  `contact` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `whatsapp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `industry` int DEFAULT NULL,
  `service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '2',
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `cname`, `contact`, `address`, `whatsapp`, `email`, `industry`, `service`, `message`, `status`, `createAt`, `updateAt`) VALUES
(12, 'Logesh R', '1', '9898989898', 'Palayapalayam', '9898989898', 'user@gmail.com', 8, NULL, 'None', 1, '2024-01-14 06:47:38', '2025-01-18 16:53:05'),
(13, 'Saravanan', '2', '9898989898', 'Erode', '8787878787', 'rpp@gmail.com', 1, '[\"Application Development\"]', 'We need an application to manage bookings for Mahal', 2, '2024-01-14 10:35:11', '2025-02-06 08:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) NOT NULL,
  `event_date` date DEFAULT NULL,
  `Reminder_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `event_description` text,
  `event_location` varchar(255) DEFAULT NULL,
  `recurrence` varchar(20) DEFAULT NULL,
  `weekly_day` varchar(20) DEFAULT NULL,
  `monthly_month` varchar(20) DEFAULT NULL,
  `monthly_day` int DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `projectType` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `Reminder_date`, `event_time`, `event_description`, `event_location`, `recurrence`, `weekly_day`, `monthly_month`, `monthly_day`, `category`, `projectType`, `created_at`, `updated_at`) VALUES
(1, '2DEDEDED23', '2025-03-21', '2025-03-21', '14:56:00', 'REGRG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-21 06:26:45', '2025-03-21 06:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `financestatement`
--

DROP TABLE IF EXISTS `financestatement`;
CREATE TABLE IF NOT EXISTS `financestatement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fromacc` int NOT NULL,
  `fromtype` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `toacc` int NOT NULL,
  `totype` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `oldamount` int NOT NULL,
  `newamount` int NOT NULL,
  `amount` int NOT NULL,
  `remark` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transactiontype` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transactionby` int NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financestatement`
--

INSERT INTO `financestatement` (`id`, `fromacc`, `fromtype`, `toacc`, `totype`, `oldamount`, `newamount`, `amount`, `remark`, `transactiontype`, `transactionby`, `created_time`, `modified_time`) VALUES
(17, 6, 'user', 1, 'bank', 0, 300, 300, 'advance', 'credit', 6, '2024-01-14 11:52:16', '2024-01-14 11:52:16'),
(18, 1, 'bank', 6, 'user', 0, -300, 300, 'advance', 'debit', 6, '2024-01-14 11:52:16', '2024-01-14 11:52:16'),
(19, 6, 'user', 2, 'bank', 0, 1000, 1000, 'Rent', 'credit', 6, '2024-01-14 12:16:21', '2024-01-14 12:16:21'),
(20, 2, 'bank', 6, 'user', -300, -1300, 1000, 'Rent', 'debit', 6, '2024-01-14 12:16:21', '2024-01-14 12:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

DROP TABLE IF EXISTS `industry`;
CREATE TABLE IF NOT EXISTS `industry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`, `status`) VALUES
(1, 'Ecommerce', 1),
(6, 'Education', 1),
(7, 'Manufacturing', 1),
(8, 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `intership`
--

DROP TABLE IF EXISTS `intership`;
CREATE TABLE IF NOT EXISTS `intership` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `regno` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `college` int NOT NULL,
  `rol` int NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `duration` int NOT NULL,
  `createAt` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `intership`
--

INSERT INTO `intership` (`id`, `name`, `regno`, `gender`, `college`, `rol`, `start`, `end`, `duration`, `createAt`) VALUES
(1, 'Mathavan', '2122j0700', 'M', 2, 2, '2025-01-01', '2025-01-30', 30, '2025-01-22 06:30:51'),
(2, 'mano', '2122j0702', 'M', 1, 1, '2025-01-01', '2025-01-31', 13, '2025-01-22 07:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
CREATE TABLE IF NOT EXISTS `leads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` enum('New','Contacted','Qualified','Closed') DEFAULT 'New',
  `project_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `delete` enum('False','True') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `due_date` date NOT NULL,
  `user_id` int NOT NULL,
  `priority` enum('Heigh','Low','Medium') NOT NULL,
  `worke_state` enum('Design','Development','UiUx','Marketing') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `working_state` enum('start','in progress','pandding','completed') NOT NULL,
  `refered_by` varchar(500) NOT NULL,
  `Cid` int NOT NULL,
  `Amt` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `status`, `project_name`, `created_at`, `delete`, `due_date`, `user_id`, `priority`, `worke_state`, `working_state`, `refered_by`, `Cid`, `Amt`) VALUES
(47, 'New', 'WEWEWS1', '2025-03-31 05:03:16', 'False', '2025-03-31', 1, 'Heigh', 'Design', 'start', 'Kumar', 1, '170000'),
(45, 'New', 'WEWEWS', '2025-03-31 05:01:49', 'False', '2025-03-31', 1, 'Heigh', 'Design', 'start', 'Kumar', 1, '170000'),
(55, 'Contacted', 'WEWEWS', '2025-04-07 11:44:11', 'True', '2025-04-07', 2, 'Low', 'Development', 'in progress', 'qqwqd', 1, ''),
(49, 'New', 'WEWEWS', '2025-03-31 05:52:39', 'False', '2025-03-31', 2, 'Heigh', 'Design', 'start', 'ram', 2, '170000'),
(48, 'New', 'WEWEWS', '2025-03-31 05:45:49', 'True', '2025-03-31', 1, 'Heigh', 'Design', 'in progress', '0', 2, ''),
(50, 'New', 'WEWEWS', '2025-03-31 05:58:08', 'True', '2025-03-31', 2, 'Heigh', 'Design', 'in progress', '', 2, ''),
(51, 'New', 'WEWEWS', '2025-03-31 05:58:28', 'True', '2025-03-31', 2, 'Low', 'Design', 'in progress', '', 2, ''),
(52, 'New', 'WEWEWS', '2025-03-31 06:00:05', 'True', '2025-03-31', 2, 'Low', 'Design', 'in progress', '', 2, ''),
(53, 'Contacted', 'WEWEWS', '2025-03-31 06:01:54', 'True', '2025-03-31', 4, 'Medium', 'Design', 'pandding', '', 2, ''),
(54, 'New', 'WEWEWS', '2025-03-31 06:04:58', 'True', '2025-03-31', 1, 'Heigh', 'Design', 'start', '', 2, ''),
(56, 'Contacted', 'WEWEWS', '2025-04-12 06:43:33', 'True', '2025-04-12', 2, 'Low', 'Development', 'in progress', 'mohan', 2, ''),
(57, 'Contacted', 'WEWEWS', '2025-04-12 06:44:13', 'False', '2025-04-12', 2, 'Low', 'Development', 'in progress', 'qqwqd', 2, ''),
(58, 'New', 'wegrg ', '2025-04-15 05:34:11', 'True', '2025-04-15', 1, 'Heigh', 'Design', 'start', 'fefqefqwef', 1, '170000');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `link` varchar(255) NOT NULL,
  `catagery` varchar(125) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loginlogs`
--

DROP TABLE IF EXISTS `loginlogs`;
CREATE TABLE IF NOT EXISTS `loginlogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `loggedtime` int NOT NULL,
  `lastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `loginAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderlog`
--

DROP TABLE IF EXISTS `orderlog`;
CREATE TABLE IF NOT EXISTS `orderlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `orderid` int NOT NULL,
  `userid` int NOT NULL,
  `details` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `priority` int NOT NULL DEFAULT '0',
  `stage` int NOT NULL DEFAULT '0',
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateBy` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `projectid` int NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categoryid` int NOT NULL,
  `subcategoryid` int NOT NULL,
  `assign` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `assignby` int NOT NULL,
  `kanban` int NOT NULL DEFAULT '0',
  `payment` int NOT NULL DEFAULT '0',
  `paymentstatus` int NOT NULL DEFAULT '1',
  `status` int NOT NULL DEFAULT '2',
  `completedAt` timestamp NULL DEFAULT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `projectid`, `name`, `categoryid`, `subcategoryid`, `assign`, `assignby`, `kanban`, `payment`, `paymentstatus`, `status`, `completedAt`, `createAt`, `updateAt`) VALUES
(16, 8, 'Android App', 2, 4, '[\"9\"]', 6, 1, 30000, 1, 3, NULL, '2024-01-14 11:19:49', '2025-01-19 18:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `projectlog`
--

DROP TABLE IF EXISTS `projectlog`;
CREATE TABLE IF NOT EXISTS `projectlog` (
  `id` int NOT NULL,
  `orderid` int NOT NULL,
  `olddata` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `newdata` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `changedby` int NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customerid` int NOT NULL,
  `payment` int NOT NULL DEFAULT '0',
  `paymentstatus` int NOT NULL DEFAULT '1',
  `status` int NOT NULL DEFAULT '1',
  `completeAt` timestamp NULL DEFAULT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `cname`, `description`, `customerid`, `payment`, `paymentstatus`, `status`, `completeAt`, `createAt`, `updateAt`) VALUES
(8, 'Booking Application', '1', 'Bokking App for Marriage', 12, 5000, 1, 1, NULL, '2024-01-14 11:19:12', '2025-01-20 08:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logid` int NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `logid`, `token`, `createAt`, `updateAt`) VALUES
(1, 1, '245070d6dcb70163de3862b4bd585348', '2021-08-12 09:23:15', '2021-08-12 11:20:03'),
(2, 1, 'c25f56d89932ea02a76e29f50dcc0dd0', '2021-08-14 04:29:20', '2021-08-14 04:29:20'),
(3, 1, 'ff19414570670b010f10caf6204aec1f', '2021-08-14 04:29:42', '2021-08-14 04:29:42'),
(4, 1, 'e93643302214351136bf4cffad135366', '2021-08-14 04:31:25', '2021-08-14 04:31:25'),
(5, 1, '2f2d07e18ab280e1c8783bda735a6d32', '2021-08-15 02:52:35', '2021-08-15 02:52:35'),
(6, 1, 'bd9c5cb2e7b0ed5a0b31b17ff246057c', '2021-08-15 09:22:29', '2021-08-15 09:22:29'),
(7, 1, 'e05d57b502260dc3cdaf032ceb349b4d', '2021-08-15 14:41:33', '2021-08-15 14:41:33'),
(8, 3, '93a98a646d6eccf81d6a462859fab108', '2021-08-15 16:53:39', '2021-08-15 16:53:39'),
(9, 1, '7357c07ecc02c195c4355d3fb6b4cd88', '2021-08-16 02:57:19', '2021-08-16 02:57:19'),
(10, 3, '73bd8fb877675ba0c57bd9396f9c3c57', '2021-08-16 03:53:53', '2021-08-16 03:53:53'),
(11, 1, 'cce4c4ceaf20a9ae4dfa653e777a0507', '2021-08-16 16:10:27', '2021-08-16 16:10:27'),
(12, 3, '2c900e0b4f308ed546edca2e2be5895f', '2021-08-16 16:10:38', '2021-08-16 16:10:38'),
(13, 5, '40096551bf8a595dd6dfc5565ce5f397', '2021-08-16 16:41:52', '2021-08-16 16:41:52'),
(14, 2, '5eba89020fd35560b950fb11b21e95c0', '2021-08-16 17:15:04', '2021-08-16 17:15:04'),
(15, 1, 'b51771b78d1f4562e5902f7b3e06b704', '2021-08-17 04:53:37', '2021-08-17 04:53:37'),
(16, 3, 'ad6555b6e61e44428f41027e3874fbc5', '2021-08-17 04:54:17', '2021-08-17 04:54:17'),
(17, 5, '7bac52b0492d29bc1d1335df48e2556b', '2021-08-17 04:55:04', '2021-08-17 04:55:04'),
(18, 1, 'e1ec0cf5b8a05c49ffb50b1dad6108d4', '2021-08-17 08:14:23', '2021-08-17 08:14:23'),
(19, 1, 'e0f63c23fcbc3ea2af27d532ec7a7756', '2021-08-17 08:59:20', '2021-08-17 08:59:20'),
(20, 1, '3a1599b190defcf6a8b2284ee916b0ac', '2021-08-17 09:01:10', '2021-08-17 09:01:10'),
(21, 5, '3cdaf361fb92f4de29856394208c279b', '2021-08-17 09:01:23', '2021-08-17 09:01:23'),
(22, 5, 'a1b17fffcd83da0ea07d040ca9d37237', '2021-08-18 03:21:58', '2021-08-18 03:21:58'),
(23, 1, 'c043080bed9d1ac1ce94c59843a1833a', '2021-08-18 03:23:39', '2021-08-18 03:23:39'),
(24, 5, '23909bfccb678bc22684dbe54155797f', '2021-08-18 07:48:55', '2021-08-18 07:48:55'),
(25, 5, 'ffaa9445fd36cbf7e76948667ec25916', '2021-08-18 08:26:56', '2021-08-18 08:26:56'),
(26, 5, 'cfc3e1d13c38d73659b4e30f6b024aa4', '2021-08-18 08:35:12', '2021-08-18 08:35:12'),
(27, 5, '069c109f94c94bc6a1f6edcb0a2561f4', '2021-08-18 08:36:11', '2021-08-18 08:36:11'),
(28, 1, '618e0655c85f6e78f5613f75ea0c9bc4', '2021-08-18 11:16:08', '2021-08-18 11:16:08'),
(29, 1, '5c35d802387ca5d2128bc4b7e29a9f4d', '2021-08-25 07:17:57', '2021-08-25 07:17:57'),
(30, 1, 'e3aee05add67b2c6357910f260e94908', '2021-08-28 13:21:00', '2021-08-28 13:21:00'),
(31, 1, '3e1d1097f83487cfea9bae2aec4e243a', '2021-08-29 08:00:33', '2021-08-29 08:00:33'),
(32, 1, '45439332d407ed346a5b53c942eb4940', '2021-08-29 10:50:41', '2021-08-29 10:50:41'),
(33, 5, '62e4f8b8f3c5c7ab56742affa1aea5e0', '2021-08-29 13:02:19', '2021-08-29 13:02:19'),
(34, 1, 'cc7453b749d7999340f2e2ccd197d268', '2021-08-30 01:21:41', '2021-08-30 01:21:41'),
(35, 5, 'b1e1a90a562f8e4e8ee520a5573fd8dd', '2021-08-30 01:36:11', '2021-08-30 01:36:11'),
(36, 4, 'aa429cb6da42f9eddfa919617752c2b8', '2021-08-30 02:10:56', '2021-08-30 02:10:56'),
(37, 4, '005619b5c920191195acda87b1c161b3', '2021-08-30 06:58:51', '2021-08-30 06:58:51'),
(38, 4, 'f96fdf8bf768d385a103d727bbdf97ec', '2021-08-30 11:58:08', '2021-08-30 11:58:08'),
(39, 1, '906c8d2222714803350a34d015f73193', '2021-08-30 14:42:48', '2021-08-30 14:42:48'),
(40, 2, 'dadacd095b45bcd2890dcab06f2a1545', '2021-08-30 14:53:20', '2021-08-30 14:53:20'),
(41, 1, 'd06c18f6eb0190926bc62ff3ab6c75c1', '2021-08-31 04:31:21', '2021-08-31 04:31:21'),
(42, 2, '78a4d18ace06bf4d138e0265cb8b0f41', '2021-08-31 04:31:50', '2021-08-31 04:31:50'),
(43, 2, '3d7f187c55d63b76b5c917e2aa559ee1', '2021-08-31 07:36:25', '2021-08-31 07:36:25'),
(44, 2, '2758526baf96a3254596cb9c9198415b', '2021-08-31 09:10:49', '2021-08-31 09:10:49'),
(45, 2, '40af0b086d9c7430ee1a9869ec7b9d12', '2021-08-31 13:57:15', '2021-08-31 13:57:15'),
(46, 1, '1315b1fc64037034e94a5c5a3da29f3a', '2021-09-01 08:04:24', '2021-09-01 08:04:24'),
(47, 2, '3103d7e25163cd523912684b8df4aab7', '2021-09-01 08:32:01', '2021-09-01 08:32:01'),
(48, 1, 'cb048bf9b8b369d7e65a60c53f8d2b90', '2021-09-01 08:37:51', '2021-09-01 08:37:51'),
(49, 6, '48e708dd8ce8c3d99e7f5fb8750a55b5', '2023-12-04 09:46:00', '2023-12-04 09:46:00'),
(50, 6, '01b864b6a13685b131b66a60a89ef08d', '2023-12-05 08:08:31', '2023-12-05 08:08:31'),
(51, 6, '3da714854bd14b2a731b8eab80f48453', '2023-12-05 08:23:51', '2023-12-05 08:23:51'),
(52, 6, '251160d0dace74e1d4bfadd096f779dc', '2023-12-05 08:34:00', '2023-12-05 08:34:00'),
(53, 6, '06928e98dd9e5df3633ec49bb7a31192', '2023-12-05 11:42:20', '2023-12-05 11:42:20'),
(54, 6, '5399e803f577ba956b38a5ec4c664de4', '2023-12-05 12:56:12', '2023-12-05 12:56:12'),
(55, 6, 'a846f880d0153f1ef90debb92b7a70f6', '2023-12-05 12:57:20', '2023-12-05 12:57:20'),
(56, 6, 'a9fef3ed1f10b5e7f1fbd6f8759ce292', '2023-12-05 13:25:27', '2023-12-05 13:25:27'),
(57, 6, 'bade171f01c803b147c260a92beb17a1', '2023-12-05 13:26:38', '2023-12-05 13:26:38'),
(58, 6, 'e84a89b6f2803fe3bf94a6dbd485c683', '2023-12-05 13:29:52', '2023-12-05 13:29:52'),
(59, 6, '20bb96d10878b4168665bc5706e1d854', '2023-12-06 04:44:53', '2023-12-06 04:44:53'),
(60, 6, 'a5a0a243b6a7cd6453862c6520af8107', '2023-12-06 04:48:51', '2023-12-06 04:48:51'),
(61, 6, 'e5c2a75c0a92106ac6c83cf50fdc71dc', '2023-12-06 04:49:37', '2023-12-06 04:49:37'),
(62, 6, '5f8acebba6af0a6eaccbb4d557adca67', '2023-12-06 04:56:16', '2023-12-06 04:56:16'),
(63, 6, '8cb02391a229c05828077c30930a30de', '2023-12-06 08:30:41', '2023-12-06 08:30:41'),
(64, 6, 'e08f5e70fa1ac46e131d6f96a8e4cccf', '2023-12-06 08:31:38', '2023-12-06 08:31:38'),
(65, 7, 'a62839944e296f4a021fb4a8da867699', '2023-12-06 09:29:12', '2023-12-06 09:29:12'),
(66, 6, '97fe85f20be2ec2744d4b7eda4456b65', '2023-12-06 10:48:15', '2023-12-06 10:48:15'),
(67, 8, 'fe93064cce02a4dc21229ff700082c0b', '2023-12-06 10:49:17', '2023-12-06 10:49:17'),
(68, 6, '7a22a1b489233d421e3952fbc707e57b', '2024-01-06 05:52:46', '2024-01-06 05:52:46'),
(69, 9, 'ef557e9d8626467e751b6af7da6d4ce0', '2024-01-06 11:24:47', '2024-01-06 11:24:47'),
(70, 6, '2b03bb781d2a6d5158163c2ff72f7355', '2024-01-08 12:03:14', '2024-01-08 12:03:14'),
(71, 6, '6c053f64e3b8c883f78a2fc31acb8505', '2024-01-13 08:24:12', '2024-01-13 08:24:12'),
(72, 9, '2929ac16ade557915445f42fc688a00c', '2024-01-13 11:25:32', '2024-01-13 11:25:32'),
(73, 9, '04db1777eae3c74108613dc1449ddacf', '2024-01-13 11:35:07', '2024-01-13 11:35:07'),
(74, 9, '0fdcf309f7dab929b18149d1b0504932', '2024-01-13 11:36:11', '2024-01-13 11:36:11'),
(75, 9, '699dd4342f937ebdcdb60a5bcddd2010', '2024-01-13 11:38:48', '2024-01-13 11:38:48'),
(76, 9, 'fd76b395bcb1df05791bfe06acb41fc0', '2024-01-13 11:40:52', '2024-01-13 11:40:52'),
(77, 9, 'c020476e9d06685193c9d52d54bbf16b', '2024-01-13 12:19:49', '2024-01-13 12:19:49'),
(78, 9, '846ed335f9d5c63d8dae31c14a7ea0a6', '2024-01-13 13:26:30', '2024-01-13 13:26:30'),
(79, 9, '518dd97e6a90d059cd5167b200b738f4', '2024-01-13 13:27:00', '2024-01-13 13:27:00'),
(80, 9, '0f2e73c6ff1d907461208173582a25ea', '2024-01-13 13:33:40', '2024-01-13 13:33:40'),
(81, 9, '284804a5dfbf5ec82d0c849c87e37638', '2024-01-13 13:35:22', '2024-01-13 13:35:22'),
(82, 9, 'f657b6c95ff671b915f1b0cb96be4dd7', '2024-01-13 13:36:03', '2024-01-13 13:36:03'),
(83, 9, '3acb3f5492b0c01e83e675264d97ed90', '2024-01-13 13:41:10', '2024-01-13 13:41:10'),
(84, 9, '38214e27b0172a61758413c2bb9a2163', '2024-01-13 13:43:10', '2024-01-13 13:43:10'),
(85, 9, 'a8d8a4425ea81c6166af34098b93f3d5', '2024-01-13 13:46:32', '2024-01-13 13:46:32'),
(86, 9, '01a2f44352555971c3e48dc6177b67ef', '2024-01-13 13:50:05', '2024-01-13 13:50:05'),
(87, 9, 'fde900e360dfbc0145a9b3abf2f0980f', '2024-01-13 13:53:00', '2024-01-13 13:53:00'),
(88, 9, 'ae6e7760d02356e4d95ead01e6ab6d2a', '2024-01-13 13:57:24', '2024-01-13 13:57:24'),
(89, 9, 'aecc79cf76d854f4935caa4dbcddaf03', '2024-01-14 04:36:44', '2024-01-14 04:36:44'),
(90, 9, 'd39f4348d40d1ee37e44d26563348017', '2024-01-14 04:37:53', '2024-01-14 04:37:53'),
(91, 9, '8d005972002397251412c70dce5bef2d', '2024-01-14 05:08:47', '2024-01-14 05:08:47'),
(92, 9, 'c66e35b6e6008667a4b2ef17c5a80961', '2024-01-14 05:09:57', '2024-01-14 05:09:57'),
(93, 9, '32f04ef224bdb64c8c6bc01e4c4d23cf', '2024-01-14 05:13:59', '2024-01-14 05:13:59'),
(94, 9, '8601df5a06fe3925bbbad5cfa3c21e3a', '2024-01-14 05:15:28', '2024-01-14 05:15:28'),
(95, 9, '3aebf763eed69462107c87a87741b346', '2024-01-14 05:16:29', '2024-01-14 05:16:29'),
(96, 9, '2ab060cd2ae6ca1153fc486b18b6f793', '2024-01-14 05:17:46', '2024-01-14 05:17:46'),
(97, 6, 'b667a7844f89ddf650335f62391d3074', '2024-01-14 05:19:19', '2024-01-14 05:19:19'),
(98, 6, '7dc23730055b3e8ecbc8e5cd9266f193', '2024-01-15 04:15:16', '2024-01-15 04:15:16'),
(99, 9, '3fbedb09bef89d472eda688456730c76', '2024-01-15 04:17:47', '2024-01-15 04:17:47'),
(100, 9, '40fa444735eba1e5bad58809e6d3fb2a', '2024-01-15 04:18:16', '2024-01-15 04:18:16'),
(101, 6, 'f1b67768bbd6bb18ecd46e83655f82f7', '2024-01-16 04:34:22', '2024-01-16 04:34:22'),
(102, 9, 'f05a5f6072552901e3b3c787bf0ad027', '2024-01-16 04:36:29', '2024-01-16 04:36:29'),
(103, 9, 'a604f4ff9b86bc3d2a0a7cc6e49b941a', '2025-01-18 15:09:29', '2025-01-18 15:09:29'),
(104, 9, '9be52ea8e3d990946495fd7dcb2392de', '2025-01-18 15:45:48', '2025-01-18 15:45:48'),
(105, 9, '93e0b5aff27fdd77222b33bfc0b38631', '2025-01-18 16:39:57', '2025-01-18 16:39:57'),
(106, 9, 'dafc0aa454cf16754dab4e7add7cafdc', '2025-01-18 16:42:15', '2025-01-18 16:42:15'),
(107, 6, '7c2f679bc6230a96518fe507faaeb374', '2025-01-18 16:47:33', '2025-01-18 16:47:33'),
(108, 9, '626e0773131d197210f541d72cbf6f38', '2025-01-19 08:16:49', '2025-01-19 08:16:49'),
(109, 6, 'f2f462341030b45b80c2e2e702643033', '2025-01-19 08:17:38', '2025-01-19 08:17:38'),
(110, 6, '72978316b06d5df0250f9259106dc7c9', '2025-01-19 13:24:00', '2025-01-19 13:24:00'),
(111, 9, '113af16f1d5bbe0874a8ddf81a19f774', '2025-01-19 16:40:19', '2025-01-19 16:40:19'),
(112, 9, '2c58069505a43e730d2bf26329963149', '2025-01-19 17:19:23', '2025-01-19 17:19:23'),
(113, 6, '0f5b8b3787dfe24543c99b08e4d660fd', '2025-01-19 17:21:09', '2025-01-19 17:21:09'),
(114, 9, '02e74687611b32f8a31abc88f8ef994e', '2025-01-19 17:22:39', '2025-01-19 17:22:39'),
(115, 6, '87d7f6e90f47961ca154889a96ce835f', '2025-01-19 17:37:21', '2025-01-19 17:37:21'),
(116, 9, '2cb839949a020d5cf74bd37878775256', '2025-01-19 18:45:04', '2025-01-19 18:45:04'),
(117, 9, '15cc4df0af96a50525706bdcb47935dd', '2025-01-19 22:49:55', '2025-01-19 22:49:55'),
(118, 9, 'd70f8b1b1a13fa2ec8f092520a3fb81b', '2025-01-20 04:44:45', '2025-01-20 04:44:45'),
(119, 6, '7049fd24f69d88c04a8f991d982b471e', '2025-01-20 05:04:58', '2025-01-20 05:04:58'),
(120, 9, '61516836bf37b2b77d6ec58b6317db52', '2025-01-20 05:14:16', '2025-01-20 05:14:16'),
(121, 6, '40ca4c4af2cb07e611b101664f78bb15', '2025-01-20 05:46:06', '2025-01-20 05:46:06'),
(122, 9, '79d1af3bbdc1202c96a67e6de0f46234', '2025-01-20 06:01:10', '2025-01-20 06:01:10'),
(123, 6, '108a46f4044e36bc9920712102167c51', '2025-01-20 08:32:26', '2025-01-20 08:32:26'),
(124, 9, '10bf8a87ce9f021bbdb7d20774c53d97', '2025-01-20 08:48:34', '2025-01-20 08:48:34'),
(125, 9, 'a85192952eb4234d83be9b1c2511b6d1', '2025-01-20 11:35:39', '2025-01-20 11:35:39'),
(126, 9, '7ad331b778746c5b35378812d766a9b9', '2025-01-21 04:53:01', '2025-01-21 04:53:01'),
(127, 9, '883e87f64866b86b95a1f682142559c4', '2025-01-21 09:47:44', '2025-01-21 09:47:44'),
(128, 6, '2843aa3972b98e7b4a331f0750ebbc01', '2025-01-21 11:51:44', '2025-01-21 11:51:44'),
(129, 6, 'd7454cb694a1e71fc53add56120aaeeb', '2025-01-22 04:18:06', '2025-01-22 04:18:06'),
(130, 6, '3ad6306a0bd3cd73b48470ae9e2c9e7b', '2025-01-23 07:32:25', '2025-01-23 07:32:25'),
(131, 6, '9cbdddfbd1d88f32e1942567bc767293', '2025-01-24 04:35:31', '2025-01-24 04:35:31'),
(132, 6, '627611d97979515134514178c96c0e08', '2025-01-24 11:33:13', '2025-01-24 11:33:13'),
(133, 9, 'f864019f72ba26c37ba620f371c1fe11', '2025-01-24 12:31:18', '2025-01-24 12:31:18'),
(134, 6, '3fb85ee17b2e57d3da299c9f965f898d', '2025-01-25 08:33:04', '2025-01-25 08:33:04'),
(135, 6, '749b99811380b3b10d9207daf5e1e8c1', '2025-01-25 09:12:32', '2025-01-25 09:12:32'),
(136, 9, '903fed6b62c9f16e061e41f3da2a888e', '2025-01-27 04:24:24', '2025-01-27 04:24:24'),
(137, 9, '220844bed918396a89d65d661fc2f1e0', '2025-01-27 04:26:29', '2025-01-27 04:26:29'),
(138, 9, 'c6a83b32ad9f1288ace771a3f5887af7', '2025-01-27 04:26:46', '2025-01-27 04:26:46'),
(139, 6, '71cefc5904545d7d6b30e8f744f57f44', '2025-01-27 04:29:18', '2025-01-27 04:29:18'),
(140, 9, '406ce749c271d3d914c4e729d0ea3b24', '2025-01-27 04:45:55', '2025-01-27 04:45:55'),
(141, 6, '571df446cf0245674bffa6d9ecce6a4f', '2025-01-27 04:49:23', '2025-01-27 04:49:23'),
(142, 11, '4259feb728689cacfa075c7a7cbeb887', '2025-01-27 04:58:01', '2025-01-27 04:58:01'),
(143, 11, '236acddacb84d89bcc3781864ae0fcc0', '2025-01-27 04:59:07', '2025-01-27 04:59:07'),
(144, 9, 'cc6fad98e9a9740e42fbefe5e8cc2018', '2025-01-27 05:14:00', '2025-01-27 05:14:00'),
(145, 6, 'a1b1da5f86f3c3f5f5b6dd047110cd88', '2025-01-27 06:14:29', '2025-01-27 06:14:29'),
(146, 9, 'fe2a6885a97e9cd57d43a2e0a068a60e', '2025-01-27 06:16:36', '2025-01-27 06:16:36'),
(147, 6, 'ab514fd4466b7429c909ebaa5300278c', '2025-01-27 06:37:17', '2025-01-27 06:37:17'),
(148, 6, '50479f44fde14a42aa43bfb020f2bc8d', '2025-01-27 06:41:09', '2025-01-27 06:41:09'),
(149, 6, '596a0e375a586c2e351c20f53e10bfed', '2025-01-27 06:42:44', '2025-01-27 06:42:44'),
(150, 6, '49423c9e2e7b3d49945ec618b5a13288', '2025-01-27 06:45:13', '2025-01-27 06:45:13'),
(151, 6, '273af0586748e9b83abc0c266579e74c', '2025-01-27 06:53:02', '2025-01-27 06:53:02'),
(152, 6, '4e9a731b099bfbf197708009f1128a90', '2025-01-27 06:55:36', '2025-01-27 06:55:36'),
(153, 6, '76db137e65e0a07b93059ca8920a65bf', '2025-01-27 06:57:13', '2025-01-27 06:57:13'),
(154, 6, 'ee8834c0a2b8552f7b690757db3bae92', '2025-01-27 07:24:19', '2025-01-27 07:24:19'),
(155, 6, '0093ffddec4a1c6f63cf76c93d893ba0', '2025-01-27 07:32:17', '2025-01-27 07:32:17'),
(156, 6, '201275cabc6f8cbc63b72dabe6e65a0d', '2025-01-27 07:32:31', '2025-01-27 07:32:31'),
(157, 6, 'b83f11577572fde4e59b4bb2e0001181', '2025-01-27 07:33:43', '2025-01-27 07:33:43'),
(158, 6, '6e279a59a3d8454c5f7dcd1e06e59e22', '2025-01-27 07:35:03', '2025-01-27 07:35:03'),
(159, 6, 'ab8baa62e2ee20b0f044731f6e0c3f3a', '2025-01-27 07:37:24', '2025-01-27 07:37:24'),
(160, 6, '3ba78d30e2885929a0685e8097bb1f5d', '2025-01-27 07:47:50', '2025-01-27 07:47:50'),
(161, 6, 'e9c00c9d172e6df12870b670b62b539b', '2025-01-27 07:48:23', '2025-01-27 07:48:23'),
(162, 6, '03bb7a752b1c3141e35ee9c54847a3f8', '2025-01-27 08:44:56', '2025-01-27 08:44:56'),
(163, 6, '8f754cc0617b88bda6ce7352c8e48aed', '2025-01-27 09:03:32', '2025-01-27 09:03:32'),
(164, 6, '921fc78c7c23d3d99ec3c30772279cb6', '2025-01-27 10:08:33', '2025-01-27 10:08:33'),
(165, 6, 'c0f87e1a32ed9711496ad3fc767aed67', '2025-02-04 04:58:22', '2025-02-04 04:58:22'),
(166, 6, 'd0e1eb0edf0c111a533e94e336516fec', '2025-02-04 05:30:05', '2025-02-04 05:30:05'),
(167, 9, 'ce7c764a6ac711c38897e94c358c1420', '2025-02-04 06:03:22', '2025-02-04 06:03:22'),
(168, 9, 'ef4dc39dd2b4980829112f4c1b44cb55', '2025-02-04 06:12:06', '2025-02-04 06:12:06'),
(169, 6, '774479f2452aa26c7a527c276a3612bb', '2025-02-05 05:26:46', '2025-02-05 05:26:46'),
(170, 9, '9f59ed3e5e88ca79b35ff3633bf4311f', '2025-02-05 05:28:41', '2025-02-05 05:28:41'),
(171, 6, 'dbd629d3785b7e363b854445ed4b36bc', '2025-02-05 10:00:37', '2025-02-05 10:00:37'),
(172, 6, '93fc0ea72e61863c26b8b5449ced37e1', '2025-02-05 11:49:45', '2025-02-05 11:49:45'),
(173, 6, 'e227f4472e6232f9666870faa5bf5795', '2025-02-05 12:01:07', '2025-02-05 12:01:07'),
(174, 9, '3877a365770c58299ec4bef1e1829f91', '2025-02-05 12:01:59', '2025-02-05 12:01:59'),
(175, 6, '83ebc27e62bf0f541e7ffcc724e30819', '2025-02-06 04:22:50', '2025-02-06 04:22:50'),
(176, 6, '71ccc49cc5ad485c69d41902f255ac8d', '2025-02-06 08:37:45', '2025-02-06 08:37:45'),
(177, 9, '85c4bea8881a2b10b1062305139287ce', '2025-02-06 08:43:08', '2025-02-06 08:43:08'),
(178, 9, 'fdb02210626aa0c21e4ebf6ec36f06d3', '2025-02-12 04:44:27', '2025-02-12 04:44:27'),
(179, 6, 'cd64e3b188ba1b432860855150d94c51', '2025-02-12 04:50:54', '2025-02-12 04:50:54'),
(180, 9, '50ece148c88fae0ce6f222fac782f69f', '2025-02-12 06:56:38', '2025-02-12 06:56:38'),
(181, 6, '170ace0781696a6fe255c4805bf91d33', '2025-02-12 09:25:02', '2025-02-12 09:25:02'),
(182, 9, '6ff60f63850df3ce0b9b865dc022f658', '2025-03-05 06:33:58', '2025-03-05 06:33:58'),
(183, 6, '50aec64c020d539ae28da887705a031b', '2025-03-05 06:39:46', '2025-03-05 06:39:46'),
(184, 6, 'b1b1d5ca0cb66ebd359770c744d0d794', '2025-03-05 11:56:19', '2025-03-05 11:56:19'),
(185, 6, '0def419b00ec85d74ac91e7179bcba14', '2025-03-06 04:29:49', '2025-03-06 04:29:49'),
(186, 6, '255459ce2ac3af1f83d6a06c154ea2c1', '2025-03-07 05:45:38', '2025-03-07 05:45:38'),
(187, 6, 'eb66fb6761338ce5b4cfb28324fec8ee', '2025-03-08 04:46:53', '2025-03-08 04:46:53'),
(188, 6, '5afecdd13b5e13e11133c27bc5fdf944', '2025-03-11 06:52:50', '2025-03-11 06:52:50'),
(189, 9, '6ef1a007a02659116775959395de230f', '2025-03-20 09:13:15', '2025-03-20 09:13:15'),
(190, 6, 'd37fe8695c2683b77cd291475728bcc3', '2025-03-20 09:21:05', '2025-03-20 09:21:05'),
(191, 6, '14a7a546fc32ed71f5c88e1a65a6050c', '2025-03-21 04:57:44', '2025-03-21 04:57:44'),
(192, 9, '3358d8279be8b95ca1b530e33fc2d1dc', '2025-03-21 06:41:03', '2025-03-21 06:41:03'),
(193, 6, '3d972c2f1286895364960da913a2b319', '2025-03-22 03:45:21', '2025-03-22 03:45:21'),
(194, 6, 'c963fd93b859adbc8ba77d2dd010f654', '2025-03-22 08:39:06', '2025-03-22 08:39:06'),
(195, 9, '9ad3ee179cd13a467e9e548d9a2f6c8d', '2025-03-24 05:09:05', '2025-03-24 05:09:05'),
(196, 6, 'cf31a5e9ee7274d4e38b0989ed23a38c', '2025-03-24 05:18:17', '2025-03-24 05:18:17'),
(197, 6, '12bd718b6550c9b0a333ae4f897cde3e', '2025-03-24 12:39:28', '2025-03-24 12:39:28'),
(198, 6, '6f7b1dd8a9e380706d060ae3bc3907eb', '2025-03-28 03:46:48', '2025-03-28 03:46:48'),
(199, 6, 'c8436be547f91aa6a712c554bbbc48af', '2025-03-29 03:39:29', '2025-03-29 03:39:29'),
(200, 6, '3ed7d9e69bad2995ca9fd33c54c36b04', '2025-03-31 04:46:24', '2025-03-31 04:46:24'),
(201, 6, '2c53cdfba87246cd806063e9cef494ae', '2025-04-07 07:20:19', '2025-04-07 07:20:19'),
(202, 9, '9077b45c28e0c82106864b7abd5cdb54', '2025-04-08 03:57:05', '2025-04-08 03:57:05'),
(203, 6, '127cfeccaf2629965bee971741b90dcd', '2025-04-08 03:57:26', '2025-04-08 03:57:26'),
(204, 6, '4c3ade58b54933059934d02fb87f1d5f', '2025-04-08 08:38:53', '2025-04-08 08:38:53'),
(205, 6, '492a01dac36601aba325a715461c8253', '2025-04-12 04:38:24', '2025-04-12 04:38:24'),
(206, 6, '70459a3dd09a27df09de3acf3f465ef9', '2025-04-15 05:24:46', '2025-04-15 05:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoryid` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `name`, `status`) VALUES
(1, 1, 'Logo', 1),
(2, 2, 'E-commerce', 1),
(3, 1, 'Visiting Card', 1),
(4, 2, 'App', 1),
(5, 1, 'Brochure', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bankId` int NOT NULL,
  `bankName` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` int NOT NULL,
  `newBalance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transactiontype` enum('credit','debit') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `memberId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `memberName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `projectId` int DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `bankId`, `bankName`, `amount`, `newBalance`, `remarks`, `reason`, `transactiontype`, `memberId`, `memberName`, `projectId`, `created_time`, `modified_time`) VALUES
(9, 1, 'HDFC', 1000, '123', 'Rent', NULL, 'debit', '6', 'Logesh R', NULL, '2024-01-15 13:10:57', '2024-01-14 14:48:46'),
(11, 1, 'HDFC', 300, '600', 'Logo Advance Amount', NULL, 'credit', '6', 'Logesh R', NULL, '2024-01-13 13:50:50', '2024-01-14 14:56:19'),
(12, 1, 'HDFC', 300, '900', 'advance', NULL, 'credit', '6', 'Logesh R', NULL, '2024-01-13 13:50:50', '2024-01-14 14:56:21'),
(13, 1, 'HDFC', 900, '0', 'advance', 'Rent', 'debit', '6', 'Logesh R', NULL, '2024-01-13 13:50:50', '2024-01-14 14:56:23'),
(14, 1, 'HDFC', 300, '300', 'advance', NULL, 'credit', '6', 'Logesh R', 8, '2024-01-13 13:50:50', '2024-01-14 14:56:25'),
(15, 1, 'HDFC', 300, '0', 'Salary', 'Salary', 'debit', '6', 'Logesh R', NULL, '2024-01-14 16:08:30', '2024-01-14 16:15:49'),
(16, 1, 'HDFC', 1000, '0', 'Salary', 'Salary', 'debit', '6', 'Logesh R', NULL, '2024-01-14 16:09:28', '2024-01-14 16:15:46'),
(17, 1, 'HDFC', 1000, '0', 'Salary', 'Salary', 'debit', '6', 'Logesh R', NULL, '2024-01-14 16:10:33', '2024-01-14 16:15:51'),
(18, 1, 'HDFC', 500, '500', 'Vignesh\'s Salary : Salary', 'Salary', 'debit', '6', 'Logesh R', NULL, '2024-01-14 16:15:21', '2024-01-14 16:15:21'),
(19, 1, 'HDFC', 300, '200', 'Vignesh\'s Salary : ', 'Salary', 'debit', '6', 'Logesh R', NULL, '2024-01-14 16:18:12', '2024-01-14 16:18:12'),
(20, 1, 'HDFC', 200, '0', '8-Vignesh\'s Salary : ', 'Salary', 'debit', '6', 'Logesh R', NULL, '2024-01-14 16:18:46', '2024-01-14 16:18:46'),
(21, 1, 'HDFC', 500, '500', 'Murali\'s Salary : ', 'Salary', 'debit', '6', 'Logesh R', 4, '2024-01-14 16:20:57', '2024-01-14 16:20:57'),
(22, 1, 'HDFC', 500, '0', '\'s Salary : ', 'Purchase', 'debit', '6', 'Logesh R', 0, '2024-01-14 16:54:00', '2024-01-14 16:54:00'),
(23, 1, 'HDFC', 1000, '1000', '\'s Salary : ', 'Income', 'credit', '6', 'Logesh R', 0, '2024-01-14 16:55:36', '2024-01-14 16:55:36'),
(24, 1, 'HDFC', 1100, '-100', '\'s Salary : ', 'Rent', 'debit', '6', 'Logesh R', 0, '2024-01-14 16:57:09', '2024-01-14 16:57:09'),
(25, 1, 'HDFC', 100, '0', '\'s Salary : ', 'Income', 'credit', '6', 'Logesh R', 0, '2024-01-14 16:58:11', '2024-01-14 16:58:11'),
(26, 1, 'HDFC', 1000, '1000', '\'s Salary : ', 'Income', 'credit', '6', 'Logesh R', 0, '2024-01-14 16:58:23', '2024-01-14 16:58:23'),
(27, 1, 'HDFC', 1200, '2200', '\'s Salary : ', 'Income', 'credit', '6', 'Logesh R', 0, '2024-01-14 17:01:13', '2024-01-14 17:01:13'),
(28, 1, 'HDFC', 2200, '0', 'Dinesh Kumar\'s Salary : ', 'Salary', 'debit', '6', 'Logesh R', 1, '2024-01-14 17:02:32', '2024-01-14 17:02:32'),
(29, 1, 'HDFC', 1000, '1000', '\'s Salary : ', 'Income', 'credit', '6', 'Logesh R', 0, '2024-01-14 17:07:04', '2024-01-14 17:07:04'),
(30, 1, 'HDFC', 100, '900', '\'s Salary : ', 'Electricity', 'debit', '6', 'Logesh R', 0, '2024-01-15 08:06:09', '2024-01-15 08:06:09'),
(31, 1, 'HDFC', 100, '800', '\'s Salary : ', 'Rent', 'debit', '6', 'Logesh R', 0, '2024-01-15 08:07:47', '2024-01-15 08:07:47'),
(32, 1, 'HDFC', 100, '700', '\'s Salary : ', 'Rent', 'debit', '6', 'Logesh R', 0, '2024-01-15 08:08:00', '2024-01-15 08:08:00'),
(33, 1, 'HDFC', 100, '600', '', 'Rent', 'debit', '6', 'Logesh R', 0, '2024-01-15 08:08:21', '2024-01-15 08:08:21'),
(34, 1, 'HDFC', 600, '0', 'Dinesh Kumar\'s Salary : none', 'Salary', 'debit', '6', 'Logesh R', 1, '2024-01-15 08:08:49', '2024-01-15 08:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profilepic` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.jpg',
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `skill` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hobbies` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `dateofjoin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alternatemobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bloodgroup` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `role` enum('Admin','Designer','Developer','Intern','','') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `accountnumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `accountname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ifsc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Aadhaar` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `Resume` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `Agreement` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Photo` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `lastLogin` timestamp NULL DEFAULT NULL,
  `onlinestatus` int NOT NULL DEFAULT '3',
  `status` int NOT NULL DEFAULT '1',
  `wallet` int NOT NULL DEFAULT '0',
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `email`, `password`, `profilepic`, `mobile`, `skill`, `hobbies`, `dateofjoin`, `alternatemobile`, `bloodgroup`, `address`, `dob`, `role`, `accountnumber`, `accountname`, `ifsc`, `about`, `Aadhaar`, `Resume`, `Agreement`, `Photo`, `lastLogin`, `onlinestatus`, `status`, `wallet`, `createAt`, `updateAt`) VALUES
(1, 'Dinesh Kumar', 'M', 'mathavan202004@gmail.com', '43b86098c01d7873fe66d512b0ac9b30', 'https://ik.imagekit.io/bfzb9z4tav/logo@3x_Ja0ya1BoC.png?updatedAt=1701864624822', '9898989899', '', NULL, '2020-07-06', '9898989899', 'B+ve', 'Palayapalayam', '2024-01-06', 'Developer', '123123123123', 'Dinesh', 'HDFC0001', NULL, '', '', '', '', NULL, 3, 1, 0, '2021-08-06 05:19:21', '2025-04-12 07:01:05'),
(2, 'Dinesh', 'M', 'dineshdk18590@gmail.com', '43b86098c01d7873fe66d512b0ac9b30', 'https://ik.imagekit.io/bfzb9z4tav/HackerJi/png-clipart-avatar-user-computer-icons-software-developer-avatar-child-face-thumbnail-removebg-preview_LrInMkd5cL.png?updatedAt=1617469416657', NULL, '', NULL, '2020-07-06', NULL, NULL, NULL, NULL, 'Developer', NULL, NULL, NULL, NULL, '', '', '', '', NULL, 3, 1, 0, '2021-08-10 05:35:32', '2025-01-23 20:44:51'),
(4, 'murali', 'M', 'murali@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'https://ik.imagekit.io/bfzb9z4tav/HackerJi/avatar3_cQUAp0m5o.png?updatedAt=1623738233499', NULL, '', NULL, '2020-07-06', NULL, NULL, NULL, NULL, 'Developer', NULL, NULL, NULL, NULL, '', '', '', '', NULL, 3, 1, 0, '2021-08-12 01:32:05', '2025-01-23 20:44:51'),
(5, 'Arun', 'M', 'arun@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'https://i.pinimg.com/736x/3b/ed/41/3bed41ea8eeaab4fbdc572d2a0ba9cb6.jpg', NULL, '', NULL, '2020-07-06', NULL, NULL, NULL, NULL, 'Designer', NULL, NULL, NULL, NULL, '', '', '', '', NULL, 3, 1, 0, '2021-08-12 01:40:09', '2025-01-23 20:44:51'),
(6, 'Logesh R', 'M', 'user@gmail.com', 'b26162755082e2857df915a31fba9369', 'https://www.dayzrp.com/uploads/monthly_2019_05/1510582678_source.thumb.gif.157c8b8c4b2d1062eb5611c5ff63bc9f.thumb.gif.5a1aaf77ac677e6a3e02bc868eaf1270.gif', '9578078950', '[\"js\",\"html\",\"css\",\"php\",\"codeigniter\",\"mysql\"]', NULL, '2020-07-06', '9578078950', 'O+ve', 'Palayapalayam', '1999-03-05', 'Admin', '6467371890', 'Logesh R', 'IDIB000T137', 'Full stack Dev with Strong collaboration skills and proven history of Application Development. Vast experience in User Interfaces, APIs, DB management.', '', '', '', '', NULL, 3, 1, -1300, '2021-08-12 01:40:09', '2025-03-05 07:13:50'),
(8, 'vignesh', 'M', 'vignesh@gmail.com', '43b86098c01d7873fe66d512b0ac9b30', 'https://ik.imagekit.io/bfzb9z4tav/HackerJi/png-clipart-avatar-user-computer-icons-software-developer-avatar-child-face-thumbnail-removebg-preview_LrInMkd5cL.png?updatedAt=1617469416657', NULL, '', NULL, '2020-07-06', NULL, NULL, NULL, NULL, 'Developer', NULL, NULL, NULL, NULL, '', '', '', '', NULL, 3, 1, 0, '2023-12-06 05:18:50', '2025-01-23 20:44:51'),
(9, 'Employee', 'M', 'emp@gmail.com', 'b26162755082e2857df915a31fba9369', 'https://ik.imagekit.io/bfzb9z4tav/logo@3x_Ja0ya1BoC.png?updatedAt=1701864624822', '9898989899', '[\"js\",\"php\",\"mysql\"]', NULL, '2020-07-06', '9578078950', 'O+ve', 'Palayapalayam', '2024-01-14', 'Developer', '324234324324', 'Lokki', 'IDIB2323', 'lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew  lorem ipsum seef ew vwdvew ', '', '', '', '', NULL, 3, 1, 0, '2024-01-06 05:54:39', '2025-02-12 07:11:43'),
(10, 'Gokulakrishnan', 'M', 'gokulakrishnan@gmail.com', '43b86098c01d7873fe66d512b0ac9b30', 'https://ik.imagekit.io/bfzb9z4tav/logo@3x_Ja0ya1BoC.png?updatedAt=1701864624822', '78878878877', '', NULL, '2020-07-06', '76676767677667', 'B-ve', 'Palayapalayam', '2024-01-06', 'Designer', '2314234234234', 'Gokulakrishnan', 'HDFC0001', NULL, '', '', '', '', NULL, 3, 1, 0, '2024-01-06 06:32:53', '2025-01-23 20:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `worklogs`
--

DROP TABLE IF EXISTS `worklogs`;
CREATE TABLE IF NOT EXISTS `worklogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `orderid` int NOT NULL,
  `starttime` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `endtime` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
