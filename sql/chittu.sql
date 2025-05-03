-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2025 at 05:24 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(500) NOT NULL,
  `percentage` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories_import`
--

CREATE TABLE `categories_import` (
  `id` int(11) NOT NULL,
  `categories` varchar(500) NOT NULL,
  `percentage` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories_import`
--

INSERT INTO `categories_import` (`id`, `categories`, `percentage`, `is_deleted`, `created_at`) VALUES
(1, 'Instagram Comment Likes HQ]', 0, 0, '2025-05-03 02:41:22'),
(2, '🆕 ᴺᴱᵂExclusive Services ', 0, 0, '2025-05-03 02:41:22'),
(3, 'Youtube Cheapest Services', 0, 0, '2025-05-03 02:41:22'),
(4, 'Facebook Cheapest Services', 0, 0, '2025-05-03 02:41:22'),
(5, 'Instagram Cheapest Services', 0, 0, '2025-05-03 02:41:22'),
(6, '🇮🇳 High Quality Indian Services ', 0, 0, '2025-05-03 02:41:22'),
(7, '⚡ Our Fast And Best Services 👑 ', 0, 0, '2025-05-03 02:41:22'),
(8, 'Instagram Reel Views 🎥', 0, 0, '2025-05-03 02:41:22'),
(9, 'Instagram Indian 🇮🇳 Likes ', 0, 0, '2025-05-03 02:41:22'),
(10, 'Instagram Likes [ Non Drop ] ', 0, 0, '2025-05-03 02:41:22'),
(11, 'Instagram Likes [ Fast Speed ] ', 0, 0, '2025-05-03 02:41:22'),
(12, 'Instagram Likes [ High-Quality ]', 0, 0, '2025-05-03 02:41:22'),
(13, 'Instagram Indian 🇮🇳 Followers ', 0, 0, '2025-05-03 02:41:22'),
(14, 'Instagram Followers [ OWN  👑 ]', 0, 0, '2025-05-03 02:41:22'),
(15, 'Instagram Followers [ No Refill ]', 0, 0, '2025-05-03 02:41:22'),
(16, 'Instagram Followers [ Lifetime 💎 ]', 0, 0, '2025-05-03 02:41:22'),
(17, 'Instagram Followers [ Premium 👑 ]', 0, 0, '2025-05-03 02:41:22'),
(18, 'Instagram Followers [ Fast Speed ✈️ ]', 0, 0, '2025-05-03 02:41:22'),
(19, 'Instagram Comments 💬 Working', 0, 0, '2025-05-03 02:41:22'),
(20, 'Instagram Instant Reel Services ', 0, 0, '2025-05-03 02:41:22'),
(21, 'Instagram Reach &amp; Impressions', 0, 0, '2025-05-03 02:41:22'),
(22, 'Instagram Live Views + Like 📹', 0, 0, '2025-05-03 02:41:22'),
(23, 'Instagram Post View [ Instant ]', 0, 0, '2025-05-03 02:41:22'),
(24, 'Instagram Story Views [ Instant ]', 0, 0, '2025-05-03 02:41:22'),
(25, 'Instagram Post Save [ Instant ]', 0, 0, '2025-05-03 02:41:22'),
(26, 'Instagram Post Share [ Instant ]', 0, 0, '2025-05-03 02:41:22'),
(27, 'Instagram Profile Visit [ Instant ]', 0, 0, '2025-05-03 02:41:22'),
(28, 'Instagram Highlights Views', 0, 0, '2025-05-03 02:41:22'),
(29, 'Instagram Channel [ Members ]', 0, 0, '2025-05-03 02:41:22'),
(30, '💎 Instagram Influencer Services 💎', 0, 0, '2025-05-03 02:41:22'),
(31, 'Cheapest Telegram Services', 0, 0, '2025-05-03 02:41:22'),
(32, 'Telegram Single Post View ', 0, 0, '2025-05-03 02:41:22'),
(33, 'Telegram Multiple Post View', 0, 0, '2025-05-03 02:41:22'),
(34, 'Telegram Indian Members 🇮🇳', 0, 0, '2025-05-03 02:41:22'),
(35, 'Telegram Members Non-Guaranteed', 0, 0, '2025-05-03 02:41:22'),
(36, 'Telegram Members [ 30 - 90Days Refill ]', 0, 0, '2025-05-03 02:41:22'),
(37, 'Telegram Members [ 120 - Lifetime Refill ]', 0, 0, '2025-05-03 02:41:22'),
(38, 'Telegram Indian Services 🇮🇳', 0, 0, '2025-05-03 02:41:22'),
(39, 'Telegram Post Share', 0, 0, '2025-05-03 02:41:22'),
(40, 'Telegram Story Views', 0, 0, '2025-05-03 02:41:22'),
(41, 'Telegram Best Services ', 0, 0, '2025-05-03 02:41:22'),
(42, 'Youtube Monetization Package', 0, 0, '2025-05-03 02:41:22'),
(43, 'Youtube Watchtime [ Own ⚡ ]', 0, 0, '2025-05-03 02:41:22'),
(44, 'YouTube Live Stream Views ', 0, 0, '2025-05-03 02:41:22'),
(45, 'Youtube Short Services', 0, 0, '2025-05-03 02:41:22'),
(46, 'Youtube Likes [ Cheapest ]', 0, 0, '2025-05-03 02:41:22'),
(47, 'Youtube Likes [ Guaranteed ]', 0, 0, '2025-05-03 02:41:22'),
(48, 'Youtube Subscriber [ Cheapest ]', 0, 0, '2025-05-03 02:41:22'),
(49, 'Youtube Subscriber [ ⭐ Organic ]', 0, 0, '2025-05-03 02:41:22'),
(50, 'Youtube Subscribers [ Guaranteed ]', 0, 0, '2025-05-03 02:41:22'),
(51, 'Youtube AdWord Views [0% Drop]', 0, 0, '2025-05-03 02:41:22'),
(52, 'Youtube Native Views [0% Drop]', 0, 0, '2025-05-03 02:41:22'),
(53, 'Youtube Views [ Guaranteed ]', 0, 0, '2025-05-03 02:41:22'),
(54, 'Youtube Views 💎 [ Stable &amp; Fast ]', 0, 0, '2025-05-03 02:41:22'),
(55, 'Youtube Views ✨ [ HQ With Refill ]', 0, 0, '2025-05-03 02:41:22'),
(56, 'Youtube Views [ Video Ranking ]', 0, 0, '2025-05-03 02:41:22'),
(57, 'Facebook Monetization Package ', 0, 0, '2025-05-03 02:41:22'),
(58, 'Facebook 60K Minutes WatchTime', 0, 0, '2025-05-03 02:41:22'),
(59, 'Facebook Post Share', 0, 0, '2025-05-03 02:41:22'),
(60, 'Facebook Reel Services', 0, 0, '2025-05-03 02:41:22'),
(61, 'Facebook Views Working', 0, 0, '2025-05-03 02:41:22'),
(62, 'Facebook Group Members', 0, 0, '2025-05-03 02:41:22'),
(63, 'Facebook Follower [ 🇮🇳  Indian ]', 0, 0, '2025-05-03 02:41:22'),
(64, 'Facebook Page Followers', 0, 0, '2025-05-03 02:41:22'),
(65, 'Facebook Profile Followers ', 0, 0, '2025-05-03 02:41:22'),
(66, 'Facebook Page [ Follower &amp; Like ]', 0, 0, '2025-05-03 02:41:22'),
(67, 'Facebook Post Likes [ 🇮🇳 Indian ]', 0, 0, '2025-05-03 02:41:22'),
(68, 'Facebook Post Likes [NonDrop]', 0, 0, '2025-05-03 02:41:22'),
(69, 'Facebook Post Reaction S-3', 0, 0, '2025-05-03 02:41:22'),
(70, 'Facebook Post Reactions [NonDrop]', 0, 0, '2025-05-03 02:41:22'),
(71, 'Facebook Live Stream Views ', 0, 0, '2025-05-03 02:41:22'),
(72, 'Spotify Followers', 0, 0, '2025-05-03 02:41:22'),
(73, 'X-Twitter Instant Views ', 0, 0, '2025-05-03 02:41:22'),
(74, 'X- Twitter Statistics Services', 0, 0, '2025-05-03 02:41:22'),
(75, 'X-Twitter Likes [ Real Mix ]', 0, 0, '2025-05-03 02:41:22'),
(76, 'X-Twitter Retweets  [ Real Mix ]', 0, 0, '2025-05-03 02:41:22'),
(77, 'X-Twitter Followers  [ 30Days Refill ]', 0, 0, '2025-05-03 02:41:22'),
(78, 'Tiktok Cheapest Services', 0, 0, '2025-05-03 02:41:22'),
(79, ' Tiktok Views [ Working ]🔥', 0, 0, '2025-05-03 02:41:22'),
(80, 'Tiktok LIkes [ Working ]🔥', 0, 0, '2025-05-03 02:41:22'),
(81, 'Tiktok Followers [ Working ]🔥', 0, 0, '2025-05-03 02:41:22'),
(82, 'Instagram Threads Services', 0, 0, '2025-05-03 02:41:22'),
(83, 'WhatsApp Channel [ Members ]', 0, 0, '2025-05-03 02:41:22'),
(84, 'WhatsApp Channel Post Reaction', 0, 0, '2025-05-03 02:41:22'),
(85, 'Snapchat Followers NonDrop', 0, 0, '2025-05-03 02:41:22'),
(86, 'Website Development', 0, 0, '2025-05-03 02:41:22'),
(87, 'Website Worldwide Traffic ', 0, 0, '2025-05-03 02:41:22'),
(88, 'PlayStore App Downloads', 0, 0, '2025-05-03 02:41:22'),
(89, '⭐ Virtual [ WP &amp; TG ] Numbers', 0, 0, '2025-05-03 02:41:22'),
(90, 'Ullu Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(91, 'Zee5 Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(92, 'Tinder Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(93, 'Netflix Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(94, 'Gaana Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(95, 'Spotify Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(96, 'Hotstar Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(97, 'Altbalaji Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(98, 'Hoichoi Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(99, 'Audible Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(100, 'YouTube Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(101, 'LinkedIn Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(102, 'Lenskart Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(103, 'Sonylive Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(104, 'Fancode Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(105, 'PornHub Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(106, 'CanvaPro Premium Subscription  ', 0, 0, '2025-05-03 02:41:22'),
(107, 'Prime Video Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(108, 'Perplexity AI Premium Subscription ', 0, 0, '2025-05-03 02:41:22'),
(109, 'START YOUR ONLINE BUSINESS MAKE YOUR OWN SMM PANEL', 0, 0, '2025-05-03 02:41:22'),
(110, '🚨 Api / Private Catagory 🚨', 0, 0, '2025-05-03 02:41:22'),
(111, 'Spotify Cheapest Services', 0, 0, '2025-05-03 02:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `import_logs`
--

CREATE TABLE `import_logs` (
  `id` int(11) NOT NULL,
  `api_url` varchar(500) NOT NULL,
  `api_key` varchar(500) NOT NULL,
  `cname` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `import_logs`
--

INSERT INTO `import_logs` (`id`, `api_url`, `api_key`, `cname`, `created_at`) VALUES
(1, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', 'insta', '2025-05-03 02:41:19'),
(2, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', 'insta', '2025-05-03 02:48:31'),
(3, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', 'insta', '2025-05-03 02:50:49'),
(4, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', 'insta', '2025-05-03 03:01:48'),
(5, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', 'insta', '2025-05-03 03:03:31'),
(6, 'https://www.cheapsmmhub.com/api/v2', '4c514bc5d240393a9f4f357d132aea17ce59937c', 'insta', '2025-05-03 03:04:05');

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

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `paymentId` varchar(500) NOT NULL,
  `orderId` varchar(500) NOT NULL,
  `signature` varchar(500) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `cname` varchar(500) NOT NULL,
  `category` text DEFAULT NULL,
  `percentage` int(11) NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `set_rate` decimal(10,2) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_import`
--

CREATE TABLE `services_import` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `cname` varchar(500) NOT NULL,
  `category` text DEFAULT NULL,
  `percentage` int(11) NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `set_rate` decimal(10,2) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(12, 'mathavan', 'vmathavan587@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8148668359', 0, '48167179', 'user', 0, '2025-04-15', '2025-04-15'),
(14, 'manojkumar', 'mano@gmail.com', '25d55ad283aa400af464c76d713c07ad', '9887766554', 0, '98787634', 'admin', 0, '2025-04-28', '2025-04-27');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_import`
--
ALTER TABLE `categories_import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_logs`
--
ALTER TABLE `import_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_import`
--
ALTER TABLE `services_import`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories_import`
--
ALTER TABLE `categories_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `import_logs`
--
ALTER TABLE `import_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services_import`
--
ALTER TABLE `services_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
