-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 04:35 AM
-- Server version: 10.4.32-MariaDB
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
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `email`, `mobile`, `created_at`) VALUES
(1, 'vmathavan587@gmail.com', '8148668359', '2025-04-15 20:14:13'),
(2, 'vmathavan587@gmail.com', '8148668359', '2025-04-15 20:21:08'),
(3, 'vmathavan587@gmail.com', '8148668359', '2025-04-15 20:22:18'),
(4, 'vmathavan587@gmail.com', '8148668359', '2025-04-15 23:46:33'),
(5, 'vmathavan587@gmail.com', '8148668359', '2025-04-15 23:46:59'),
(6, 'vmathavan587@gmail.com', '8148668359', '2025-04-15 23:47:33'),
(7, 'vmathavan587@gmail.com', '8148668359', '2025-04-15 23:48:35'),
(8, 'vmathavan587@gmail.com', '8148668359', '2025-04-15 23:49:42'),
(9, 'vmathavan587@gmail.com', '8148668359', '2025-04-15 23:50:15'),
(10, 'vmathavan587@gmail.com', '8148668359', '2025-04-15 23:54:28'),
(11, 'vmathavan587@gmail.com', '8148668359', '2025-04-15 23:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `otp` varchar(20) DEFAULT NULL,
  `usertype` varchar(20) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `modified_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `status`, `otp`, `usertype`, `is_deleted`, `modified_at`, `created_at`) VALUES
(12, 'mathavan', 'vmathavan587@gmail.com', 'edfde2e93f66f7310c532e3d8432614b', '8148668359', 0, '48167179', 'user', 0, '2025-04-15', '2025-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `email`, `otp`) VALUES
(10, 'vmathavan587@gmail.com', 48167179);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
