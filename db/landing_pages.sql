-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2026 at 12:59 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landing_pages`
--

-- --------------------------------------------------------

--
-- Table structure for table `abandoned_carts`
--

CREATE TABLE `abandoned_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shipping_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abandoned_item` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` decimal(10,4) NOT NULL DEFAULT 0.0000,
  `discount` decimal(10,4) NOT NULL DEFAULT 0.0000,
  `subtotal` decimal(10,4) NOT NULL DEFAULT 0.0000,
  `total` decimal(10,4) NOT NULL DEFAULT 0.0000,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', NULL, NULL, '$2y$10$5KJ/vKLk27tOZVRJLFMBXuiw1/w1f08BxnK48M7F9/VCwj.D7y9dS', 1, NULL, '2022-02-06 19:22:05', '2022-02-06 19:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_image` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `title`, `is_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'সু সাইজ সিলেক্ট করুন', NULL, 1, '2022-04-04 19:47:51', '2022-09-02 19:05:24'),
(2, 'Color', NULL, 1, '2022-04-04 21:35:45', '2022-04-04 21:35:45'),
(3, 'Length', NULL, 1, '2023-02-09 14:58:14', '2023-02-09 14:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_items`
--

CREATE TABLE `attribute_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `item_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_items`
--

INSERT INTO `attribute_items` (`id`, `attribute_id`, `item_title`, `created_at`, `updated_at`) VALUES
(1, 1, 'M', '2022-04-04 19:47:59', '2022-04-04 19:47:59'),
(2, 2, 'Red', '2022-04-04 21:35:50', '2022-04-04 21:35:50'),
(3, 1, 'S', '2022-09-02 18:48:05', '2022-09-02 18:48:05'),
(4, 1, 'XL', '2022-09-02 18:48:08', '2022-09-02 18:48:08'),
(5, 2, 'Green', '2022-09-02 18:48:13', '2022-09-02 18:48:13'),
(6, 2, 'Blue', '2022-09-02 18:48:17', '2022-09-02 18:48:17'),
(7, 3, '8 Inch', '2023-02-09 14:58:23', '2023-02-09 14:58:23'),
(8, 3, '12 Inch', '2023-02-09 14:58:29', '2023-02-09 14:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_homepage` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `is_homepage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home & Gadgets', 1, 1, '2022-02-07 06:10:02', '2025-07-30 08:16:36'),
(2, 'Health & Beauty', 1, 1, '2022-02-07 06:10:26', '2025-07-30 08:23:03'),
(3, 'Hot Offer', 0, 1, '2022-02-07 06:10:41', '2022-02-07 06:10:41'),
(4, 'Kitchen Gadgets', 0, 1, '2022-02-07 06:11:11', '2022-02-07 06:11:11'),
(5, 'Security', 0, 1, '2022-02-07 06:11:25', '2022-02-07 06:11:25'),
(6, 'All Kinds Of Rack', 0, 1, '2022-02-07 06:11:31', '2022-02-07 06:11:31'),
(7, 'Footwear', 1, 1, '2022-04-04 06:51:57', '2025-07-30 08:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_products`
--

INSERT INTO `category_products` (`id`, `category_id`, `product_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 3, 2),
(5, 6, 2),
(6, 1, 3),
(7, 2, 3),
(8, 3, 3),
(9, 6, 3),
(10, 1, 4),
(11, 3, 4),
(12, 4, 4),
(13, 1, 5),
(14, 2, 5),
(15, 3, 5),
(16, 1, 6),
(17, 2, 6),
(18, 3, 6),
(19, 4, 6),
(20, 1, 7),
(21, 2, 7),
(22, 3, 7),
(23, 6, 7),
(24, 1, 8),
(25, 2, 8),
(26, 6, 8),
(27, 1, 9),
(28, 2, 9),
(29, 3, 9),
(30, 1, 10),
(31, 2, 10),
(32, 3, 10),
(33, 6, 10),
(34, 1, 11),
(35, 2, 11),
(36, 3, 11),
(37, 6, 11),
(38, 1, 12),
(39, 2, 12),
(40, 3, 12),
(41, 1, 13),
(42, 2, 13),
(43, 3, 13),
(44, 4, 13),
(45, 6, 13),
(46, 1, 14),
(47, 2, 14),
(48, 3, 14),
(49, 4, 14),
(50, 1, 15),
(51, 2, 15),
(52, 3, 15),
(53, 1, 16),
(54, 2, 16),
(55, 3, 16),
(56, 1, 17),
(57, 4, 17),
(58, 1, 18),
(59, 2, 18),
(60, 3, 18),
(61, 6, 18),
(62, 1, 19),
(63, 2, 19),
(64, 3, 19),
(65, 6, 19),
(66, 1, 20),
(67, 2, 20),
(68, 3, 20),
(69, 1, 21),
(70, 2, 21),
(71, 3, 21),
(72, 1, 22),
(73, 2, 22),
(74, 4, 22),
(75, 1, 23),
(76, 2, 23),
(77, 6, 23),
(78, 1, 24),
(79, 2, 24),
(80, 3, 24),
(81, 1, 25),
(82, 3, 25),
(83, 6, 25),
(84, 1, 26),
(85, 2, 26),
(86, 3, 26),
(87, 1, 27),
(88, 4, 27),
(89, 6, 27),
(90, 1, 28),
(91, 2, 28),
(92, 4, 28),
(93, 1, 29),
(94, 2, 29),
(95, 3, 29),
(96, 1, 30),
(97, 2, 30),
(98, 3, 30),
(99, 1, 31),
(100, 2, 31),
(101, 3, 31),
(102, 1, 32),
(103, 2, 32),
(104, 3, 32),
(105, 1, 33),
(106, 2, 33),
(107, 4, 33),
(108, 1, 34),
(109, 2, 34),
(110, 3, 34),
(111, 4, 34),
(112, 1, 35),
(113, 3, 35),
(114, 6, 35),
(115, 1, 36),
(116, 2, 36),
(117, 6, 36),
(118, 1, 37),
(119, 4, 37),
(120, 1, 38),
(121, 2, 38),
(122, 4, 38),
(123, 1, 39),
(124, 4, 39),
(125, 6, 39),
(126, 1, 40),
(127, 2, 40),
(128, 3, 40),
(129, 4, 40),
(130, 1, 41),
(131, 2, 41),
(132, 4, 41),
(133, 1, 42),
(134, 2, 42),
(135, 3, 42),
(136, 1, 43),
(137, 2, 43),
(138, 3, 43),
(139, 4, 43),
(140, 1, 44),
(141, 2, 44),
(142, 1, 45),
(143, 2, 45),
(144, 3, 45),
(145, 1, 46),
(146, 2, 46),
(147, 3, 46),
(148, 1, 47),
(149, 2, 47),
(150, 3, 47),
(151, 1, 48),
(152, 2, 48),
(153, 3, 48),
(154, 4, 48),
(155, 1, 49),
(156, 2, 49),
(157, 3, 49),
(158, 6, 49),
(159, 1, 50),
(160, 2, 50),
(161, 3, 50),
(162, 1, 51),
(163, 2, 51),
(164, 3, 51),
(165, 6, 51),
(166, 1, 52),
(167, 2, 52),
(168, 3, 52),
(169, 1, 53),
(170, 2, 53),
(171, 3, 53),
(172, 1, 54),
(173, 3, 54),
(174, 4, 54),
(175, 6, 54),
(176, 1, 55),
(177, 2, 55),
(178, 3, 55),
(179, 6, 55),
(180, 1, 56),
(181, 2, 56),
(182, 3, 56),
(183, 6, 56),
(184, 1, 57),
(185, 3, 57),
(186, 4, 57),
(187, 1, 58),
(188, 2, 58),
(189, 3, 58),
(190, 4, 58),
(191, 1, 59),
(192, 2, 59),
(193, 3, 59),
(194, 6, 59),
(198, 1, 61),
(199, 2, 61),
(200, 4, 61),
(201, 6, 61),
(202, 1, 62),
(203, 2, 62),
(204, 3, 62),
(205, 6, 62),
(206, 1, 63),
(207, 2, 63),
(208, 6, 63),
(209, 1, 64),
(210, 2, 64),
(211, 3, 64),
(212, 1, 65),
(213, 2, 65),
(214, 6, 65),
(215, 1, 66),
(216, 2, 66),
(217, 4, 66),
(218, 6, 66),
(219, 1, 67),
(220, 2, 67),
(221, 3, 67),
(222, 6, 67),
(223, 1, 68),
(224, 2, 68),
(225, 4, 68),
(226, 1, 69),
(227, 2, 69),
(228, 3, 69),
(229, 1, 70),
(230, 3, 70),
(231, 1, 71),
(232, 6, 71),
(233, 1, 72),
(234, 2, 72),
(235, 6, 72),
(236, 1, 73),
(237, 2, 73),
(238, 1, 74),
(239, 2, 74),
(240, 6, 74),
(241, 1, 75),
(242, 2, 75),
(243, 6, 75),
(244, 1, 76),
(245, 2, 76),
(246, 1, 77),
(247, 2, 77),
(248, 3, 77),
(249, 1, 78),
(250, 2, 78),
(251, 3, 78),
(252, 1, 79),
(253, 2, 79),
(254, 6, 79),
(255, 1, 80),
(256, 2, 80),
(257, 1, 81),
(258, 2, 81),
(259, 3, 81),
(260, 1, 82),
(261, 2, 82),
(262, 3, 82),
(263, 4, 83),
(264, 1, 84),
(265, 4, 84),
(266, 1, 85),
(267, 4, 85),
(268, 1, 86),
(269, 4, 86),
(270, 1, 87),
(271, 1, 88),
(272, 4, 88),
(273, 1, 89),
(274, 4, 89),
(275, 1, 90),
(276, 1, 91),
(277, 4, 91),
(278, 1, 92),
(279, 1, 93),
(280, 4, 93),
(281, 4, 94),
(282, 1, 95),
(283, 3, 95),
(284, 1, 96),
(285, 1, 97),
(286, 3, 98),
(287, 7, 99),
(299, 1, 110);

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_city` tinyint(4) DEFAULT 1,
  `is_zone` tinyint(4) DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`id`, `courier_name`, `courier_charge`, `is_city`, `is_zone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Stead Fast', '0', 0, 0, 1, '2022-06-04 09:50:35', '2022-06-04 09:50:35'),
(2, 'RedEx', '0', 0, 0, 1, '2022-06-04 09:50:43', '2022-06-04 09:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `courier_cities`
--

CREATE TABLE `courier_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courier_id` int(11) NOT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courier_zones`
--

CREATE TABLE `courier_zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courier_id` int(11) NOT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Employee', 'employee@gmail.com', NULL, NULL, '$2y$10$BDIskn0EEYa0jCkaLvIlWOwuVwI1ngxH1yPXQK1FONcFVoLkBH98e', 1, '2022-02-03 02:39:14', '2022-02-03 02:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landing_categories`
--

CREATE TABLE `landing_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landing_categories`
--

INSERT INTO `landing_categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mango', 'mango', 1, '2026-05-17 10:38:03', '2026-05-17 10:38:03'),
(2, 'Lichu', 'lichu', 1, '2026-05-17 10:58:21', '2026-05-17 10:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `landing_pages`
--

CREATE TABLE `landing_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content`)),
  `style` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`style`)),
  `theme_id` bigint(20) UNSIGNED NOT NULL,
  `product_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`product_ids`)),
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landing_pages`
--

INSERT INTO `landing_pages` (`id`, `title`, `slug`, `content`, `style`, `theme_id`, `product_ids`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sdfdsfsdf', 'sdfdsfsdf', NULL, NULL, 2, '[\"38\",\"37\"]', 1, '2026-05-17 10:48:31', '2026-05-17 10:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `landing_themes`
--

CREATE TABLE `landing_themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landing_themes`
--

INSERT INTO `landing_themes` (`id`, `title`, `slug`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Landing Page 1', 'landing-page-1', 1, '278', '2026-05-17 10:47:35', '2026-05-17 10:47:35'),
(2, 'Landing Page 2', 'landing-page-2', 2, '279', '2026-05-17 10:52:44', '2026-05-17 10:58:31'),
(3, 'Landing Page 3', 'landing-page-3', 1, NULL, '2026-05-17 10:55:52', '2026-05-17 10:55:52'),
(4, 'Landing Page 4', 'landing-page-4', 1, NULL, '2026-05-17 10:55:59', '2026-05-17 10:55:59'),
(5, 'Landing Page 5', 'landing-page-5', 1, NULL, '2026-05-17 10:56:05', '2026-05-17 10:56:11'),
(6, 'Landing Page 6', 'landing-page-6', 1, NULL, '2026-05-17 10:56:19', '2026-05-17 10:56:19'),
(7, 'Landing Page 7', 'landing-page-7', 1, NULL, '2026-05-17 10:56:26', '2026-05-17 10:56:26'),
(8, 'Landing Page 8', 'landing-page-8', 1, NULL, '2026-05-17 10:56:32', '2026-05-17 10:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Manager', 'manager@gmail.com', '0123456789', NULL, '$2y$10$gqvjhLcn7YWK9HnZedyfnOSGsXaj/BCXD23524rk2F96xfYxSHGPO', 1, '2022-08-18 14:17:35', '2022-08-18 14:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1=800x800, 2=180x180, 3=1110x280',
  `file_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `type`, `file_original_name`, `file_url`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '1', '61fea40b718d9.jpg', 'uploads/6200b851b6c12_800x800.jpg', 1, '2022-02-07 06:12:33', '2022-02-07 06:12:33'),
(3, '2', '61fea40b718d9.jpg', 'uploads/6200b851b6c12_180x180.jpg', 1, '2022-02-07 06:12:33', '2022-02-07 06:12:33'),
(4, '1', '61fea13ec56b9.jpg', 'uploads/6200b9303c487_800x800.jpg', 1, '2022-02-07 06:16:16', '2022-02-07 06:16:16'),
(5, '2', '61fea13ec56b9.jpg', 'uploads/6200b9303c487_180x180.jpg', 1, '2022-02-07 06:16:16', '2022-02-07 06:16:16'),
(6, '1', '61df1f0a5f4ed.jpg', 'uploads/6200b977b6bba_800x800.jpg', 1, '2022-02-07 06:17:27', '2022-02-07 06:17:27'),
(7, '2', '61df1f0a5f4ed.jpg', 'uploads/6200b977b6bba_180x180.jpg', 1, '2022-02-07 06:17:27', '2022-02-07 06:17:27'),
(8, '1', '61f2847ae1b38.jpg', 'uploads/6200b9cfe1786_800x800.jpg', 1, '2022-02-07 06:18:55', '2022-02-07 06:18:55'),
(9, '2', '61f2847ae1b38.jpg', 'uploads/6200b9cfe1786_180x180.jpg', 1, '2022-02-07 06:18:55', '2022-02-07 06:18:55'),
(10, '1', '61f015107942c.jpg', 'uploads/6200ba1ad9257_800x800.jpg', 1, '2022-02-07 06:20:10', '2022-02-07 06:20:10'),
(11, '2', '61f015107942c.jpg', 'uploads/6200ba1ad9257_180x180.jpg', 1, '2022-02-07 06:20:10', '2022-02-07 06:20:10'),
(12, '1', '61efd31b2baf9.jpg', 'uploads/6200ba5d5264c_800x800.jpg', 1, '2022-02-07 06:21:17', '2022-02-07 06:21:17'),
(13, '2', '61efd31b2baf9.jpg', 'uploads/6200ba5d5264c_180x180.jpg', 1, '2022-02-07 06:21:17', '2022-02-07 06:21:17'),
(14, '3', 'er.jpg', 'uploads/62485bba7c231_1110x280.jpg', 1, '2022-02-07 06:47:25', '2022-04-02 14:20:42'),
(15, '3', 'PicsArt_02-27-11.06.021.jpg', 'uploads/62485bb310c83_1110x280.jpg', 1, '2022-02-07 06:47:36', '2022-04-02 14:20:35'),
(16, '3', 'mobile.jpg', 'uploads/62485baa2ece4_1110x280.jpg', 1, '2022-02-07 06:47:51', '2022-04-02 14:20:26'),
(18, '1', '61e93e571c6b7.jpg', 'uploads/6200c13518776_800x800.jpg', 1, '2022-02-07 06:50:29', '2022-02-07 06:50:29'),
(19, '2', '61e93e571c6b7.jpg', 'uploads/6200c13518776_180x180.jpg', 1, '2022-02-07 06:50:29', '2022-02-07 06:50:29'),
(20, '1', '61e7ca25e69bc.jpg', 'uploads/6200c175130ca_800x800.jpg', 1, '2022-02-07 06:51:33', '2022-02-07 06:51:33'),
(21, '2', '61e7ca25e69bc.jpg', 'uploads/6200c175130ca_180x180.jpg', 1, '2022-02-07 06:51:33', '2022-02-07 06:51:33'),
(22, '1', '61dfd5b2de96c.jpg', 'uploads/6200c1c23f8b6_800x800.jpg', 1, '2022-02-07 06:52:50', '2022-02-07 06:52:50'),
(23, '2', '61dfd5b2de96c.jpg', 'uploads/6200c1c23f8b6_180x180.jpg', 1, '2022-02-07 06:52:50', '2022-02-07 06:52:50'),
(24, '1', '61ddb3138d723.jpg', 'uploads/6200c20f4299e_800x800.jpg', 1, '2022-02-07 06:54:07', '2022-02-07 06:54:07'),
(25, '2', '61ddb3138d723.jpg', 'uploads/6200c20f4299e_180x180.jpg', 1, '2022-02-07 06:54:07', '2022-02-07 06:54:07'),
(26, '1', '61dc523b1379f.jpg', 'uploads/6200c2611f0e9_800x800.jpg', 1, '2022-02-07 06:55:29', '2022-02-07 06:55:29'),
(27, '2', '61dc523b1379f.jpg', 'uploads/6200c2611f0e9_180x180.jpg', 1, '2022-02-07 06:55:29', '2022-02-07 06:55:29'),
(28, '1', '61db2dc6c33cb.jpg', 'uploads/6200c2f5c039e_800x800.jpg', 1, '2022-02-07 06:57:57', '2022-02-07 06:57:57'),
(29, '2', '61db2dc6c33cb.jpg', 'uploads/6200c2f5c039e_180x180.jpg', 1, '2022-02-07 06:57:57', '2022-02-07 06:57:57'),
(30, '1', '61d9b91a6d916.jpg', 'uploads/6200c335e5db1_800x800.jpg', 1, '2022-02-07 06:59:02', '2022-02-07 06:59:02'),
(31, '2', '61d9b91a6d916.jpg', 'uploads/6200c335e5db1_180x180.jpg', 1, '2022-02-07 06:59:02', '2022-02-07 06:59:02'),
(32, '1', '61d8673848f00.jpg', 'uploads/6200c379457a8_800x800.jpg', 1, '2022-02-07 07:00:09', '2022-02-07 07:00:09'),
(33, '2', '61d8673848f00.jpg', 'uploads/6200c379457a8_180x180.jpg', 1, '2022-02-07 07:00:09', '2022-02-07 07:00:09'),
(34, '1', '61dbc1fdf1dc6.jpg', 'uploads/6200c3b4d53f5_800x800.jpg', 1, '2022-02-07 07:01:08', '2022-02-07 07:01:08'),
(35, '2', '61dbc1fdf1dc6.jpg', 'uploads/6200c3b4d53f5_180x180.jpg', 1, '2022-02-07 07:01:08', '2022-02-07 07:01:08'),
(36, '1', '61d7299ea41ab.jpg', 'uploads/6200c40414afe_800x800.jpg', 1, '2022-02-07 07:02:28', '2022-02-07 07:02:28'),
(37, '2', '61d7299ea41ab.jpg', 'uploads/6200c40414afe_180x180.jpg', 1, '2022-02-07 07:02:28', '2022-02-07 07:02:28'),
(38, '1', '61d729072b1fd.jpg', 'uploads/6200c439817b2_800x800.jpg', 1, '2022-02-07 07:03:21', '2022-02-07 07:03:21'),
(39, '2', '61d729072b1fd.jpg', 'uploads/6200c439817b2_180x180.jpg', 1, '2022-02-07 07:03:21', '2022-02-07 07:03:21'),
(40, '1', '61d5aa27880f3.jpg', 'uploads/6200c47a12c22_800x800.jpg', 1, '2022-02-07 07:04:26', '2022-02-07 07:04:26'),
(41, '2', '61d5aa27880f3.jpg', 'uploads/6200c47a12c22_180x180.jpg', 1, '2022-02-07 07:04:26', '2022-02-07 07:04:26'),
(42, '1', '61d59c4c29db3.jpg', 'uploads/6200c4bc64516_800x800.jpg', 1, '2022-02-07 07:05:32', '2022-02-07 07:05:32'),
(43, '2', '61d59c4c29db3.jpg', 'uploads/6200c4bc64516_180x180.jpg', 1, '2022-02-07 07:05:32', '2022-02-07 07:05:32'),
(44, '1', '61d59bb95a287.jpg', 'uploads/6200c4eab43e1_800x800.jpg', 1, '2022-02-07 07:06:18', '2022-02-07 07:06:18'),
(45, '2', '61d59bb95a287.jpg', 'uploads/6200c4eab43e1_180x180.jpg', 1, '2022-02-07 07:06:18', '2022-02-07 07:06:18'),
(46, '1', '61d59a90a759b.jpg', 'uploads/6200c58d5deee_800x800.jpg', 1, '2022-02-07 07:09:01', '2022-02-07 07:09:01'),
(47, '2', '61d59a90a759b.jpg', 'uploads/6200c58d5deee_180x180.jpg', 1, '2022-02-07 07:09:01', '2022-02-07 07:09:01'),
(48, '1', '61d598e41af3b.jpg', 'uploads/6200c5cdd3df1_800x800.jpg', 1, '2022-02-07 07:10:05', '2022-02-07 07:10:05'),
(49, '2', '61d598e41af3b.jpg', 'uploads/6200c5cdd3df1_180x180.jpg', 1, '2022-02-07 07:10:05', '2022-02-07 07:10:05'),
(50, '1', '61d3233bc7e18.jpg', 'uploads/6200c602e1e06_800x800.jpg', 1, '2022-02-07 07:10:58', '2022-02-07 07:10:58'),
(51, '2', '61d3233bc7e18.jpg', 'uploads/6200c602e1e06_180x180.jpg', 1, '2022-02-07 07:10:58', '2022-02-07 07:10:58'),
(52, '1', '61c06b6a00ec9.jpg', 'uploads/6200c649770c0_800x800.jpg', 1, '2022-02-07 07:12:09', '2022-02-07 07:12:09'),
(53, '2', '61c06b6a00ec9.jpg', 'uploads/6200c649770c0_180x180.jpg', 1, '2022-02-07 07:12:09', '2022-02-07 07:12:09'),
(54, '1', '61c400de939fa.jpg', 'uploads/6200c68a86e15_800x800.jpg', 1, '2022-02-07 07:13:14', '2022-02-07 07:13:14'),
(55, '2', '61c400de939fa.jpg', 'uploads/6200c68a86e15_180x180.jpg', 1, '2022-02-07 07:13:14', '2022-02-07 07:13:14'),
(56, '1', '61d59d5076032.jpg', 'uploads/6200c6cced2cc_800x800.jpg', 1, '2022-02-07 07:14:21', '2022-02-07 07:14:21'),
(57, '2', '61d59d5076032.jpg', 'uploads/6200c6cced2cc_180x180.jpg', 1, '2022-02-07 07:14:21', '2022-02-07 07:14:21'),
(58, '1', '619d0ed794e74.jpg', 'uploads/6200c7c34331b_800x800.jpg', 1, '2022-02-07 07:18:27', '2022-02-07 07:18:27'),
(59, '2', '619d0ed794e74.jpg', 'uploads/6200c7c34331b_180x180.jpg', 1, '2022-02-07 07:18:27', '2022-02-07 07:18:27'),
(60, '1', '618b25292963e.jpg', 'uploads/6200c800a85c7_800x800.jpg', 1, '2022-02-07 07:19:28', '2022-02-07 07:19:28'),
(61, '2', '618b25292963e.jpg', 'uploads/6200c800a85c7_180x180.jpg', 1, '2022-02-07 07:19:28', '2022-02-07 07:19:28'),
(62, '1', '618a8ef4692ef.jpg', 'uploads/6200c84406bfe_800x800.jpg', 1, '2022-02-07 07:20:36', '2022-02-07 07:20:36'),
(63, '2', '618a8ef4692ef.jpg', 'uploads/6200c84406bfe_180x180.jpg', 1, '2022-02-07 07:20:36', '2022-02-07 07:20:36'),
(64, '1', '617254d0a9877.jpg', 'uploads/6200c8800e13f_800x800.jpg', 1, '2022-02-07 07:21:36', '2022-02-07 07:21:36'),
(65, '2', '617254d0a9877.jpg', 'uploads/6200c8800e13f_180x180.jpg', 1, '2022-02-07 07:21:36', '2022-02-07 07:21:36'),
(66, '1', '6164436741872 (1).jpg', 'uploads/6200c8bd205ee_800x800.jpg', 1, '2022-02-07 07:22:37', '2022-02-07 07:22:37'),
(67, '2', '6164436741872 (1).jpg', 'uploads/6200c8bd205ee_180x180.jpg', 1, '2022-02-07 07:22:37', '2022-02-07 07:22:37'),
(68, '1', '6161da3d7e592.jpg', 'uploads/6200c8f1bc9ce_800x800.jpg', 1, '2022-02-07 07:23:29', '2022-02-07 07:23:29'),
(69, '2', '6161da3d7e592.jpg', 'uploads/6200c8f1bc9ce_180x180.jpg', 1, '2022-02-07 07:23:29', '2022-02-07 07:23:29'),
(70, '1', '6161d03e4d744.jpg', 'uploads/6200cea7766aa_800x800.jpg', 1, '2022-02-07 07:47:51', '2022-02-07 07:47:51'),
(71, '2', '6161d03e4d744.jpg', 'uploads/6200cea7766aa_180x180.jpg', 1, '2022-02-07 07:47:51', '2022-02-07 07:47:51'),
(72, '1', '61609a0ff0df7.jpg', 'uploads/6200ced972ca4_800x800.jpg', 1, '2022-02-07 07:48:41', '2022-02-07 07:48:41'),
(73, '2', '61609a0ff0df7.jpg', 'uploads/6200ced972ca4_180x180.jpg', 1, '2022-02-07 07:48:41', '2022-02-07 07:48:41'),
(74, '1', '6134d2e4519db.jpg', 'uploads/6200cf23d72a4_800x800.jpg', 1, '2022-02-07 07:49:55', '2022-02-07 07:49:55'),
(75, '2', '6134d2e4519db.jpg', 'uploads/6200cf23d72a4_180x180.jpg', 1, '2022-02-07 07:49:55', '2022-02-07 07:49:55'),
(76, '1', '610c0a1d40175.jpg', 'uploads/6200d104ea168_800x800.jpg', 1, '2022-02-07 07:57:57', '2022-02-07 07:57:57'),
(77, '2', '610c0a1d40175.jpg', 'uploads/6200d104ea168_180x180.jpg', 1, '2022-02-07 07:57:57', '2022-02-07 07:57:57'),
(78, '1', '60e94148aa0a8.png', 'uploads/6200d1463f466_800x800.png', 1, '2022-02-07 07:59:02', '2022-02-07 07:59:02'),
(79, '2', '60e94148aa0a8.png', 'uploads/6200d1463f466_180x180.png', 1, '2022-02-07 07:59:02', '2022-02-07 07:59:02'),
(80, '1', '60e9403430101.jpg', 'uploads/6200d17131b04_800x800.jpg', 1, '2022-02-07 07:59:45', '2022-02-07 07:59:45'),
(81, '2', '60e9403430101.jpg', 'uploads/6200d17131b04_180x180.jpg', 1, '2022-02-07 07:59:45', '2022-02-07 07:59:45'),
(82, '1', '60d163cd16f6b.jpg', 'uploads/6200d1a7dfad9_800x800.jpg', 1, '2022-02-07 08:00:39', '2022-02-07 08:00:39'),
(83, '2', '60d163cd16f6b.jpg', 'uploads/6200d1a7dfad9_180x180.jpg', 1, '2022-02-07 08:00:39', '2022-02-07 08:00:39'),
(84, '1', '60c887f1491f8.jpg', 'uploads/6200d1dfa9da9_800x800.jpg', 1, '2022-02-07 08:01:35', '2022-02-07 08:01:35'),
(85, '2', '60c887f1491f8.jpg', 'uploads/6200d1dfa9da9_180x180.jpg', 1, '2022-02-07 08:01:35', '2022-02-07 08:01:35'),
(86, '1', '60b38c4ace29e.jpg', 'uploads/6200d21bd91d8_800x800.jpg', 1, '2022-02-07 08:02:35', '2022-02-07 08:02:35'),
(87, '2', '60b38c4ace29e.jpg', 'uploads/6200d21bd91d8_180x180.jpg', 1, '2022-02-07 08:02:35', '2022-02-07 08:02:35'),
(88, '1', '60c328a1a2ce5.jpg', 'uploads/6200d25b18535_800x800.jpg', 1, '2022-02-07 08:03:39', '2022-02-07 08:03:39'),
(89, '2', '60c328a1a2ce5.jpg', 'uploads/6200d25b18535_180x180.jpg', 1, '2022-02-07 08:03:39', '2022-02-07 08:03:39'),
(90, '1', '60adff3b62552.jpg', 'uploads/620100bba84c0_800x800.jpg', 1, '2022-02-07 11:21:31', '2022-02-07 11:21:31'),
(91, '2', '60adff3b62552.jpg', 'uploads/620100bba84c0_180x180.jpg', 1, '2022-02-07 11:21:31', '2022-02-07 11:21:31'),
(92, '1', '60adff3b3ed5e.jpg', 'uploads/62023c6c90921_800x800.jpg', 1, '2022-02-08 09:48:28', '2022-02-08 09:48:28'),
(93, '2', '60adff3b3ed5e.jpg', 'uploads/62023c6c90921_180x180.jpg', 1, '2022-02-08 09:48:28', '2022-02-08 09:48:28'),
(94, '1', '60adff3b00974.jpg', 'uploads/62023cbb6b046_800x800.jpg', 1, '2022-02-08 09:49:47', '2022-02-08 09:49:47'),
(95, '2', '60adff3b00974.jpg', 'uploads/62023cbb6b046_180x180.jpg', 1, '2022-02-08 09:49:47', '2022-02-08 09:49:47'),
(96, '1', '60adff3a9b37d.jpg', 'uploads/62023cf02abf0_800x800.jpg', 1, '2022-02-08 09:50:40', '2022-02-08 09:50:40'),
(97, '2', '60adff3a9b37d.jpg', 'uploads/62023cf02abf0_180x180.jpg', 1, '2022-02-08 09:50:40', '2022-02-08 09:50:40'),
(98, '1', '60adff3a86735.jpg', 'uploads/62023d2973570_800x800.jpg', 1, '2022-02-08 09:51:37', '2022-02-08 09:51:37'),
(99, '2', '60adff3a86735.jpg', 'uploads/62023d2973570_180x180.jpg', 1, '2022-02-08 09:51:37', '2022-02-08 09:51:37'),
(100, '1', '60adff3a442bc.jpg', 'uploads/62023d6625d04_800x800.jpg', 1, '2022-02-08 09:52:38', '2022-02-08 09:52:38'),
(101, '2', '60adff3a442bc.jpg', 'uploads/62023d6625d04_180x180.jpg', 1, '2022-02-08 09:52:38', '2022-02-08 09:52:38'),
(102, '1', '60adff38abf61.jpg', 'uploads/62023db59b26c_800x800.jpg', 1, '2022-02-08 09:53:57', '2022-02-08 09:53:57'),
(103, '2', '60adff38abf61.jpg', 'uploads/62023db59b26c_180x180.jpg', 1, '2022-02-08 09:53:57', '2022-02-08 09:53:57'),
(104, '1', '60adff3805b00.jpg', 'uploads/62023decac18c_800x800.jpg', 1, '2022-02-08 09:54:52', '2022-02-08 09:54:52'),
(105, '2', '60adff3805b00.jpg', 'uploads/62023decac18c_180x180.jpg', 1, '2022-02-08 09:54:52', '2022-02-08 09:54:52'),
(106, '1', '60adff37ac098.jpg', 'uploads/62023e3f0b7cf_800x800.jpg', 1, '2022-02-08 09:56:15', '2022-02-08 09:56:15'),
(107, '2', '60adff37ac098.jpg', 'uploads/62023e3f0b7cf_180x180.jpg', 1, '2022-02-08 09:56:15', '2022-02-08 09:56:15'),
(108, '1', '60adff3753279.jpg', 'uploads/62023e7dc4f1c_800x800.jpg', 1, '2022-02-08 09:57:17', '2022-02-08 09:57:17'),
(109, '2', '60adff3753279.jpg', 'uploads/62023e7dc4f1c_180x180.jpg', 1, '2022-02-08 09:57:17', '2022-02-08 09:57:17'),
(110, '1', '60adff373cdc5.jpg', 'uploads/62023eb71af74_800x800.jpg', 1, '2022-02-08 09:58:15', '2022-02-08 09:58:15'),
(111, '2', '60adff373cdc5.jpg', 'uploads/62023eb71af74_180x180.jpg', 1, '2022-02-08 09:58:15', '2022-02-08 09:58:15'),
(112, '1', '60adff36f3587.jpg', 'uploads/62023ef8d8fb8_800x800.jpg', 1, '2022-02-08 09:59:20', '2022-02-08 09:59:20'),
(113, '2', '60adff36f3587.jpg', 'uploads/62023ef8d8fb8_180x180.jpg', 1, '2022-02-08 09:59:20', '2022-02-08 09:59:20'),
(114, '1', '60adff3677448.jpg', 'uploads/62023f3cc56f1_800x800.jpg', 1, '2022-02-08 10:00:28', '2022-02-08 10:00:28'),
(115, '2', '60adff3677448.jpg', 'uploads/62023f3cc56f1_180x180.jpg', 1, '2022-02-08 10:00:28', '2022-02-08 10:00:28'),
(116, '1', '60adff365bf3d.jpg', 'uploads/62023f8127980_800x800.jpg', 1, '2022-02-08 10:01:37', '2022-02-08 10:01:37'),
(117, '2', '60adff365bf3d.jpg', 'uploads/62023f8127980_180x180.jpg', 1, '2022-02-08 10:01:37', '2022-02-08 10:01:37'),
(118, '1', '6197997480146.jpg', 'uploads/62023fd0a3d59_800x800.jpg', 1, '2022-02-08 10:02:56', '2022-02-08 10:02:56'),
(119, '2', '6197997480146.jpg', 'uploads/62023fd0a3d59_180x180.jpg', 1, '2022-02-08 10:02:56', '2022-02-08 10:02:56'),
(120, '1', '61d5a050cc716.jpg', 'uploads/6202400d18688_800x800.jpg', 1, '2022-02-08 10:03:57', '2022-02-08 10:03:57'),
(121, '2', '61d5a050cc716.jpg', 'uploads/6202400d18688_180x180.jpg', 1, '2022-02-08 10:03:57', '2022-02-08 10:03:57'),
(122, '1', '60adff3130006.jpg', 'uploads/6202404dcb3b3_800x800.jpg', 1, '2022-02-08 10:05:01', '2022-02-08 10:05:01'),
(123, '2', '60adff3130006.jpg', 'uploads/6202404dcb3b3_180x180.jpg', 1, '2022-02-08 10:05:01', '2022-02-08 10:05:01'),
(124, '1', '60adff3130006.jpg', 'uploads/62024084917dc_800x800.jpg', 1, '2022-02-08 10:05:56', '2022-02-08 10:05:56'),
(125, '2', '60adff3130006.jpg', 'uploads/62024084917dc_180x180.jpg', 1, '2022-02-08 10:05:56', '2022-02-08 10:05:56'),
(126, '1', '60adff2f98abe.jpg', 'uploads/620240bbe8a5f_800x800.jpg', 1, '2022-02-08 10:06:52', '2022-02-08 10:06:52'),
(127, '2', '60adff2f98abe.jpg', 'uploads/620240bbe8a5f_180x180.jpg', 1, '2022-02-08 10:06:52', '2022-02-08 10:06:52'),
(128, '1', '60adff2e8c35c.jpg', 'uploads/62024116873f4_800x800.jpg', 1, '2022-02-08 10:08:22', '2022-02-08 10:08:22'),
(129, '2', '60adff2e8c35c.jpg', 'uploads/62024116873f4_180x180.jpg', 1, '2022-02-08 10:08:22', '2022-02-08 10:08:22'),
(130, '1', '60adff2dbb739.jpg', 'uploads/620241604fa04_800x800.jpg', 1, '2022-02-08 10:09:36', '2022-02-08 10:09:36'),
(131, '2', '60adff2dbb739.jpg', 'uploads/620241604fa04_180x180.jpg', 1, '2022-02-08 10:09:36', '2022-02-08 10:09:36'),
(132, '1', '60adff2d9872c.jpg', 'uploads/620241a5eed86_800x800.jpg', 1, '2022-02-08 10:10:46', '2022-02-08 10:10:46'),
(133, '2', '60adff2d9872c.jpg', 'uploads/620241a5eed86_180x180.jpg', 1, '2022-02-08 10:10:46', '2022-02-08 10:10:46'),
(134, '1', '60adff2d678cf.jpg', 'uploads/620241e55f62c_800x800.jpg', 1, '2022-02-08 10:11:49', '2022-02-08 10:11:49'),
(135, '2', '60adff2d678cf.jpg', 'uploads/620241e55f62c_180x180.jpg', 1, '2022-02-08 10:11:49', '2022-02-08 10:11:49'),
(136, '1', '60adff2d146eb.jpg', 'uploads/62024235d316f_800x800.jpg', 1, '2022-02-08 10:13:09', '2022-02-08 10:13:09'),
(137, '2', '60adff2d146eb.jpg', 'uploads/62024235d316f_180x180.jpg', 1, '2022-02-08 10:13:09', '2022-02-08 10:13:09'),
(138, '1', '60adff2cc1534.jpg', 'uploads/6202429abdc7d_800x800.jpg', 1, '2022-02-08 10:14:50', '2022-02-08 10:14:50'),
(139, '2', '60adff2cc1534.jpg', 'uploads/6202429abdc7d_180x180.jpg', 1, '2022-02-08 10:14:50', '2022-02-08 10:14:50'),
(140, '1', '60adff2a685a9.jpg', 'uploads/620242d4ef0d9_800x800.jpg', 1, '2022-02-08 10:15:49', '2022-02-08 10:15:49'),
(141, '2', '60adff2a685a9.jpg', 'uploads/620242d4ef0d9_180x180.jpg', 1, '2022-02-08 10:15:49', '2022-02-08 10:15:49'),
(142, '1', '60adff2a356e1.jpg', 'uploads/6202432484643_800x800.jpg', 1, '2022-02-08 10:17:08', '2022-02-08 10:17:08'),
(143, '2', '60adff2a356e1.jpg', 'uploads/6202432484643_180x180.jpg', 1, '2022-02-08 10:17:08', '2022-02-08 10:17:08'),
(144, '1', '60adff2a19a70.jpg', 'uploads/6202438668eb6_800x800.jpg', 1, '2022-02-08 10:18:46', '2022-02-08 10:18:46'),
(145, '2', '60adff2a19a70.jpg', 'uploads/6202438668eb6_180x180.jpg', 1, '2022-02-08 10:18:46', '2022-02-08 10:18:46'),
(146, '1', '60adff2a04182.jpg', 'uploads/620243cdcdd69_800x800.jpg', 1, '2022-02-08 10:19:57', '2022-02-08 10:19:57'),
(147, '2', '60adff2a04182.jpg', 'uploads/620243cdcdd69_180x180.jpg', 1, '2022-02-08 10:19:57', '2022-02-08 10:19:57'),
(148, '1', '60adff28ebdf7.jpg', 'uploads/6202443147d66_800x800.jpg', 1, '2022-02-08 10:21:37', '2022-02-08 10:21:37'),
(149, '2', '60adff28ebdf7.jpg', 'uploads/6202443147d66_180x180.jpg', 1, '2022-02-08 10:21:37', '2022-02-08 10:21:37'),
(150, '1', '60adff28c506f.jpg', 'uploads/620244808abb3_800x800.jpg', 1, '2022-02-08 10:22:56', '2022-02-08 10:22:56'),
(151, '2', '60adff28c506f.jpg', 'uploads/620244808abb3_180x180.jpg', 1, '2022-02-08 10:22:56', '2022-02-08 10:22:56'),
(152, '1', '60adff2883ce1.jpg', 'uploads/620244d50d79c_800x800.jpg', 1, '2022-02-08 10:24:21', '2022-02-08 10:24:21'),
(153, '2', '60adff2883ce1.jpg', 'uploads/620244d50d79c_180x180.jpg', 1, '2022-02-08 10:24:21', '2022-02-08 10:24:21'),
(154, '1', '619919f45de36.jpg', 'uploads/6202451e03907_800x800.jpg', 1, '2022-02-08 10:25:34', '2022-02-08 10:25:34'),
(155, '2', '619919f45de36.jpg', 'uploads/6202451e03907_180x180.jpg', 1, '2022-02-08 10:25:34', '2022-02-08 10:25:34'),
(156, '1', '60adff281abec.jpg', 'uploads/62024567bf430_800x800.jpg', 1, '2022-02-08 10:26:47', '2022-02-08 10:26:47'),
(157, '2', '60adff281abec.jpg', 'uploads/62024567bf430_180x180.jpg', 1, '2022-02-08 10:26:47', '2022-02-08 10:26:47'),
(158, '1', 'Slimming-&-Toning-Belt--1200X1200.jpg', 'uploads/6203ee906ac0d_800x800.jpg', 1, '2022-02-09 16:40:48', '2022-02-09 16:40:48'),
(159, '2', 'Slimming-&-Toning-Belt--1200X1200.jpg', 'uploads/6203ee906ac0d_180x180.jpg', 1, '2022-02-09 16:40:48', '2022-02-09 16:40:48'),
(160, '1', 'gi1.jpg', 'uploads/6208dc5f4ed2d_800x800.jpg', 1, '2022-02-13 10:24:31', '2022-02-13 10:24:31'),
(161, '2', 'gi1.jpg', 'uploads/6208dc5f4ed2d_180x180.jpg', 1, '2022-02-13 10:24:31', '2022-02-13 10:24:31'),
(162, '0', 'RYAYS_BD__13_-removebg-preview.png', 'uploads/6208fec144c7d.png', 1, '2022-02-13 12:51:13', '2022-02-13 12:51:13'),
(163, '1', 'PicsArt_02-08-04.40_.26_.jpg', 'uploads/620b63285b32e_800x800.jpg', 1, '2022-02-15 08:24:08', '2022-02-15 08:24:08'),
(164, '2', 'PicsArt_02-08-04.40_.26_.jpg', 'uploads/620b63285b32e_180x180.jpg', 1, '2022-02-15 08:24:08', '2022-02-15 08:24:08'),
(165, '1', 'PicsArt_01-19-08.49_.56_1.jpg', 'uploads/620b88a7f3268_800x800.jpg', 1, '2022-02-15 11:04:08', '2022-02-15 11:04:08'),
(166, '2', 'PicsArt_01-19-08.49_.56_1.jpg', 'uploads/620b88a7f3268_180x180.jpg', 1, '2022-02-15 11:04:08', '2022-02-15 11:04:08'),
(167, '1', '87faf45e6ae4414914b24189e8a50003.jpg', 'uploads/620c1077ddda3_800x800.jpg', 1, '2022-02-15 20:43:35', '2022-02-15 20:43:35'),
(168, '2', '87faf45e6ae4414914b24189e8a50003.jpg', 'uploads/620c1077ddda3_180x180.jpg', 1, '2022-02-15 20:43:35', '2022-02-15 20:43:35'),
(169, '1', '73c80be566b5ac3d87459cf633344482.jpg', 'uploads/620c10d26258a_800x800.jpg', 1, '2022-02-15 20:45:06', '2022-02-15 20:45:06'),
(170, '2', '73c80be566b5ac3d87459cf633344482.jpg', 'uploads/620c10d26258a_180x180.jpg', 1, '2022-02-15 20:45:06', '2022-02-15 20:45:06'),
(172, '1', '118542334_363491301705908_7104595420334103093_n.jpg', 'uploads/620c13282266e_800x800.jpg', 1, '2022-02-15 20:55:04', '2022-02-15 20:55:04'),
(173, '1', '71KsHaoZy1L._AC_SL1500_.jpg', 'uploads/620e6907b4706_800x800.jpg', 1, '2022-02-17 15:25:59', '2022-02-17 15:25:59'),
(174, '2', '71KsHaoZy1L._AC_SL1500_.jpg', 'uploads/620e6907b4706_180x180.jpg', 1, '2022-02-17 15:25:59', '2022-02-17 15:25:59'),
(175, '1', '62205d5f8ae78.jpg', 'uploads/62213197a0e7c_800x800.jpg', 1, '2022-03-03 21:22:31', '2022-03-03 21:22:31'),
(176, '2', '62205d5f8ae78.jpg', 'uploads/62213197a0e7c_180x180.jpg', 1, '2022-03-03 21:22:31', '2022-03-03 21:22:31'),
(177, '1', '621bc17a961f9.jpg', 'uploads/6221320608028_800x800.jpg', 1, '2022-03-03 21:24:22', '2022-03-03 21:24:22'),
(178, '2', '621bc17a961f9.jpg', 'uploads/6221320608028_180x180.jpg', 1, '2022-03-03 21:24:22', '2022-03-03 21:24:22'),
(179, '1', '621a955161b9e.jpg', 'uploads/6221325f5fc73_800x800.jpg', 1, '2022-03-03 21:25:51', '2022-03-03 21:25:51'),
(180, '2', '621a955161b9e.jpg', 'uploads/6221325f5fc73_180x180.jpg', 1, '2022-03-03 21:25:51', '2022-03-03 21:25:51'),
(181, '1', '621a919d001d9.jpg', 'uploads/622132aba8a87_800x800.jpg', 1, '2022-03-03 21:27:07', '2022-03-03 21:27:07'),
(182, '2', '621a919d001d9.jpg', 'uploads/622132aba8a87_180x180.jpg', 1, '2022-03-03 21:27:07', '2022-03-03 21:27:07'),
(183, '1', '621a913aa434f.jpg', 'uploads/622132e9bac16_800x800.jpg', 1, '2022-03-03 21:28:09', '2022-03-03 21:28:09'),
(184, '2', '621a913aa434f.jpg', 'uploads/622132e9bac16_180x180.jpg', 1, '2022-03-03 21:28:09', '2022-03-03 21:28:09'),
(185, '1', '621a9095956f7.jpg', 'uploads/62213324f2d01_800x800.jpg', 1, '2022-03-03 21:29:09', '2022-03-03 21:29:09'),
(186, '2', '621a9095956f7.jpg', 'uploads/62213324f2d01_180x180.jpg', 1, '2022-03-03 21:29:09', '2022-03-03 21:29:09'),
(187, '1', '621a901d2574e.jpg', 'uploads/62213364d39d5_800x800.jpg', 1, '2022-03-03 21:30:12', '2022-03-03 21:30:12'),
(188, '2', '621a901d2574e.jpg', 'uploads/62213364d39d5_180x180.jpg', 1, '2022-03-03 21:30:12', '2022-03-03 21:30:12'),
(189, '1', '621a24ccb75ab (1).jpg', 'uploads/6221339e2c630_800x800.jpg', 1, '2022-03-03 21:31:10', '2022-03-03 21:31:10'),
(190, '2', '621a24ccb75ab (1).jpg', 'uploads/6221339e2c630_180x180.jpg', 1, '2022-03-03 21:31:10', '2022-03-03 21:31:10'),
(191, '1', '621a243cc5a05.jpg', 'uploads/622133ced172d_800x800.jpg', 1, '2022-03-03 21:31:58', '2022-03-03 21:31:58'),
(192, '2', '621a243cc5a05.jpg', 'uploads/622133ced172d_180x180.jpg', 1, '2022-03-03 21:31:58', '2022-03-03 21:31:58'),
(193, '1', '621a239c99a39.jpg', 'uploads/62213401bb706_800x800.jpg', 1, '2022-03-03 21:32:49', '2022-03-03 21:32:49'),
(194, '2', '621a239c99a39.jpg', 'uploads/62213401bb706_180x180.jpg', 1, '2022-03-03 21:32:49', '2022-03-03 21:32:49'),
(195, '1', '621a232387b17.jpg', 'uploads/6221342e9f61c_800x800.jpg', 1, '2022-03-03 21:33:34', '2022-03-03 21:33:34'),
(196, '2', '621a232387b17.jpg', 'uploads/6221342e9f61c_180x180.jpg', 1, '2022-03-03 21:33:34', '2022-03-03 21:33:34'),
(197, '1', '621a22aabd36b.jpg', 'uploads/62213459a3120_800x800.jpg', 1, '2022-03-03 21:34:17', '2022-03-03 21:34:17'),
(198, '2', '621a22aabd36b.jpg', 'uploads/62213459a3120_180x180.jpg', 1, '2022-03-03 21:34:17', '2022-03-03 21:34:17'),
(199, '1', '621a2202a5eb8.jpg', 'uploads/622134905deb2_800x800.jpg', 1, '2022-03-03 21:35:12', '2022-03-03 21:35:12'),
(200, '2', '621a2202a5eb8.jpg', 'uploads/622134905deb2_180x180.jpg', 1, '2022-03-03 21:35:12', '2022-03-03 21:35:12'),
(201, '1', '621a218a1df32.jpg', 'uploads/622134b996082_800x800.jpg', 1, '2022-03-03 21:35:53', '2022-03-03 21:35:53'),
(202, '2', '621a218a1df32.jpg', 'uploads/622134b996082_180x180.jpg', 1, '2022-03-03 21:35:53', '2022-03-03 21:35:53'),
(203, '1', '61G7atgE57L._AC_SS450_.jpg', 'uploads/6224bac458c67_800x800.jpg', 1, '2022-03-06 13:44:36', '2022-03-06 13:44:36'),
(204, '2', '61G7atgE57L._AC_SS450_.jpg', 'uploads/6224bac458c67_180x180.jpg', 1, '2022-03-06 13:44:36', '2022-03-06 13:44:36'),
(205, '1', '61G7atgE57L._AC_SS450_.jpg', 'uploads/6225e1471a1c9_800x800.jpg', 1, '2022-03-07 10:41:11', '2022-03-07 10:41:11'),
(206, '2', '61G7atgE57L._AC_SS450_.jpg', 'uploads/6225e1471a1c9_180x180.jpg', 1, '2022-03-07 10:41:11', '2022-03-07 10:41:11'),
(207, '1', '61G7atgE57L._AC_SS450_.jpg', 'uploads/6225e1b32e90c_800x800.jpg', 1, '2022-03-07 10:42:59', '2022-03-07 10:42:59'),
(208, '2', '61G7atgE57L._AC_SS450_.jpg', 'uploads/6225e1b32e90c_180x180.jpg', 1, '2022-03-07 10:42:59', '2022-03-07 10:42:59'),
(209, '1', 'download.jpg', 'uploads/6225e36a409ca_800x800.jpg', 1, '2022-03-07 10:50:18', '2022-03-07 10:50:18'),
(210, '2', 'download.jpg', 'uploads/6225e36a409ca_180x180.jpg', 1, '2022-03-07 10:50:18', '2022-03-07 10:50:18'),
(211, '1', '620e2fb483e9e.jpg', 'uploads/622649456aad9_800x800.jpg', 1, '2022-03-07 18:04:53', '2022-03-07 18:04:53'),
(212, '2', '620e2fb483e9e.jpg', 'uploads/622649456aad9_180x180.jpg', 1, '2022-03-07 18:04:53', '2022-03-07 18:04:53'),
(213, '1', 'Magic.PNG', 'uploads/6227c113702ca_800x800.PNG', 1, '2022-03-08 20:48:19', '2022-03-08 20:48:19'),
(214, '2', 'Magic.PNG', 'uploads/6227c113702ca_180x180.PNG', 1, '2022-03-08 20:48:19', '2022-03-08 20:48:19'),
(215, '1', '62271e658c61b.jpg', 'uploads/622a2d6dd6321_800x800.jpg', 1, '2022-03-10 16:55:09', '2022-03-10 16:55:09'),
(216, '2', '62271e658c61b.jpg', 'uploads/622a2d6dd6321_180x180.jpg', 1, '2022-03-10 16:55:09', '2022-03-10 16:55:09'),
(217, '1', '63b95bac35e49c3cba2a3b752f32d86b0f197d31_original.jpeg', 'uploads/6234d2b0abe94_800x800.jpeg', 1, '2022-03-18 18:42:56', '2022-03-18 18:42:56'),
(218, '2', '63b95bac35e49c3cba2a3b752f32d86b0f197d31_original.jpeg', 'uploads/6234d2b0abe94_180x180.jpeg', 1, '2022-03-18 18:42:56', '2022-03-18 18:42:56'),
(219, '1', '62306d8cdbc11.jpg', 'uploads/623a232298259_800x800.jpg', 1, '2022-03-22 19:27:30', '2022-03-22 19:27:30'),
(220, '2', '62306d8cdbc11.jpg', 'uploads/623a232298259_180x180.jpg', 1, '2022-03-22 19:27:30', '2022-03-22 19:27:30'),
(221, '1', 'WhatsApp Image 2022-03-25 at 11.09.42 PM.jpeg', 'uploads/623df7efe260b_800x800.jpeg', 1, '2022-03-25 17:12:15', '2022-03-25 17:12:15'),
(222, '2', 'WhatsApp Image 2022-03-25 at 11.09.42 PM.jpeg', 'uploads/623df7efe260b_180x180.jpeg', 1, '2022-03-25 17:12:15', '2022-03-25 17:12:15'),
(224, '1', 'WhatsApp Image 2022-04-02 at 8.43.56 PM.jpeg', 'uploads/624861f5cbb5f_800x800.jpeg', 1, '2022-04-02 14:47:17', '2022-04-02 14:47:17'),
(225, '2', 'WhatsApp Image 2022-04-02 at 8.43.56 PM.jpeg', 'uploads/624861f5cbb5f_180x180.jpeg', 1, '2022-04-02 14:47:17', '2022-04-02 14:47:17'),
(226, '1', 'WhatsApp Image 2022-04-02 at 8.43.55 PM (3).jpeg', 'uploads/624861f5e6dbd_800x800.jpeg', 1, '2022-04-02 14:47:18', '2022-04-02 14:47:18'),
(227, '1', 'WhatsApp Image 2022-04-02 at 8.43.55 PM (2).jpeg', 'uploads/624861f601491_800x800.jpeg', 1, '2022-04-02 14:47:18', '2022-04-02 14:47:18'),
(228, '1', 'WhatsApp Image 2022-04-02 at 8.43.55 PM.jpeg', 'uploads/624861f6101fe_800x800.jpeg', 1, '2022-04-02 14:47:18', '2022-04-02 14:47:18'),
(229, '1', 'WhatsApp Image 2022-04-02 at 8.43.54 PM (1).jpeg', 'uploads/624861f6239c1_800x800.jpeg', 1, '2022-04-02 14:47:18', '2022-04-02 14:47:18'),
(236, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (1).jpeg', 'uploads/624a98ac0aa51_800x800.jpeg', 1, '2022-04-04 07:05:16', '2022-04-04 07:05:16'),
(237, '2', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (1).jpeg', 'uploads/624a98ac0aa51_180x180.jpeg', 1, '2022-04-04 07:05:16', '2022-04-04 07:05:16'),
(238, '1', 'WhatsApp Image 2022-04-04 at 1.00.11 PM.jpeg', 'uploads/624a98ac1b32f_800x800.jpeg', 1, '2022-04-04 07:05:16', '2022-04-04 07:05:16'),
(239, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (2).jpeg', 'uploads/624a98ac2531c_800x800.jpeg', 1, '2022-04-04 07:05:16', '2022-04-04 07:05:16'),
(240, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM.jpeg', 'uploads/624a98ac2fbb7_800x800.jpeg', 1, '2022-04-04 07:05:16', '2022-04-04 07:05:16'),
(241, '1', 'WhatsApp Image 2022-04-04 at 1.00.09 PM (1).jpeg', 'uploads/624a98ac39e57_800x800.jpeg', 1, '2022-04-04 07:05:16', '2022-04-04 07:05:16'),
(242, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (1).jpeg', 'uploads/624a98b9cba64_800x800.jpeg', 1, '2022-04-04 07:05:29', '2022-04-04 07:05:29'),
(243, '2', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (1).jpeg', 'uploads/624a98b9cba64_180x180.jpeg', 1, '2022-04-04 07:05:29', '2022-04-04 07:05:29'),
(244, '1', 'WhatsApp Image 2022-04-04 at 1.00.11 PM.jpeg', 'uploads/624a98b9d9636_800x800.jpeg', 1, '2022-04-04 07:05:29', '2022-04-04 07:05:29'),
(245, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (2).jpeg', 'uploads/624a98b9e33c4_800x800.jpeg', 1, '2022-04-04 07:05:29', '2022-04-04 07:05:29'),
(246, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM.jpeg', 'uploads/624a98b9ed83e_800x800.jpeg', 1, '2022-04-04 07:05:30', '2022-04-04 07:05:30'),
(247, '1', 'WhatsApp Image 2022-04-04 at 1.00.09 PM (1).jpeg', 'uploads/624a98ba03d4b_800x800.jpeg', 1, '2022-04-04 07:05:30', '2022-04-04 07:05:30'),
(248, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (1).jpeg', 'uploads/624a98e8230c7_800x800.jpeg', 1, '2022-04-04 07:06:16', '2022-04-04 07:06:16'),
(249, '2', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (1).jpeg', 'uploads/624a98e8230c7_180x180.jpeg', 1, '2022-04-04 07:06:16', '2022-04-04 07:06:16'),
(250, '1', 'WhatsApp Image 2022-04-04 at 1.00.11 PM.jpeg', 'uploads/624a98e831471_800x800.jpeg', 1, '2022-04-04 07:06:16', '2022-04-04 07:06:16'),
(251, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (2).jpeg', 'uploads/624a98e83b0bb_800x800.jpeg', 1, '2022-04-04 07:06:16', '2022-04-04 07:06:16'),
(252, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM.jpeg', 'uploads/624a98e845696_800x800.jpeg', 1, '2022-04-04 07:06:16', '2022-04-04 07:06:16'),
(253, '1', 'WhatsApp Image 2022-04-04 at 1.00.09 PM (1).jpeg', 'uploads/624a98e84f8cc_800x800.jpeg', 1, '2022-04-04 07:06:16', '2022-04-04 07:06:16'),
(254, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (1).jpeg', 'uploads/624a9901251e8_800x800.jpeg', 1, '2022-04-04 07:06:41', '2022-04-04 07:06:41'),
(255, '2', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (1).jpeg', 'uploads/624a9901251e8_180x180.jpeg', 1, '2022-04-04 07:06:41', '2022-04-04 07:06:41'),
(256, '1', 'WhatsApp Image 2022-04-04 at 1.00.11 PM.jpeg', 'uploads/624a990138466_800x800.jpeg', 1, '2022-04-04 07:06:41', '2022-04-04 07:06:41'),
(257, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (2).jpeg', 'uploads/624a9901437e8_800x800.jpeg', 1, '2022-04-04 07:06:41', '2022-04-04 07:06:41'),
(258, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM.jpeg', 'uploads/624a99014f100_800x800.jpeg', 1, '2022-04-04 07:06:41', '2022-04-04 07:06:41'),
(259, '1', 'WhatsApp Image 2022-04-04 at 1.00.09 PM (1).jpeg', 'uploads/624a99015b139_800x800.jpeg', 1, '2022-04-04 07:06:41', '2022-04-04 07:06:41'),
(260, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (1).jpeg', 'uploads/624a9914c82b2_800x800.jpeg', 1, '2022-04-04 07:07:00', '2022-04-04 07:07:00'),
(261, '2', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (1).jpeg', 'uploads/624a9914c82b2_180x180.jpeg', 1, '2022-04-04 07:07:00', '2022-04-04 07:07:00'),
(262, '1', 'WhatsApp Image 2022-04-04 at 1.00.11 PM.jpeg', 'uploads/624a9914d5daf_800x800.jpeg', 1, '2022-04-04 07:07:00', '2022-04-04 07:07:00'),
(263, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM (2).jpeg', 'uploads/624a9914df747_800x800.jpeg', 1, '2022-04-04 07:07:00', '2022-04-04 07:07:00'),
(264, '1', 'WhatsApp Image 2022-04-04 at 1.00.10 PM.jpeg', 'uploads/624a9914ea0a3_800x800.jpeg', 1, '2022-04-04 07:07:00', '2022-04-04 07:07:00'),
(265, '1', 'WhatsApp Image 2022-04-04 at 1.00.09 PM (1).jpeg', 'uploads/624a9915001ba_800x800.jpeg', 1, '2022-04-04 07:07:01', '2022-04-04 07:07:01'),
(268, '0', '625bd6f721b93.png', 'uploads/6461c2e957c09.png', 1, '2023-05-15 05:28:09', '2023-05-15 05:28:09'),
(269, '1', '12months-anniversary-sale.jpeg', 'uploads/6900ab87c2257_800x800.jpeg', 1, '2025-10-28 11:39:53', '2025-10-28 11:39:53'),
(271, '1', '1724926359_66d049970280bjpg.jfif', 'uploads/69e087d5568b8_800x800.jfif', 1, '2026-04-16 06:55:17', '2026-04-16 06:55:17'),
(272, '2', '1724926359_66d049970280bjpg.jfif', 'uploads/69e087d5568b8_400x400.jfif', 1, '2026-04-16 06:55:17', '2026-04-16 06:55:17'),
(273, '1', '6200c47a12c22_180x180.jpg', 'uploads/69e9beb217e8a_800x800.jpg', 1, '2026-04-23 06:39:46', '2026-04-23 06:39:46'),
(274, '2', '6200c47a12c22_180x180.jpg', 'uploads/69e9beb217e8a_800x800.jpg', 1, '2026-04-23 06:39:46', '2026-04-23 06:39:46'),
(275, '1', '6200c439817b2_180x180.jpg', 'uploads/69e9beb27746c_800x800.jpg', 1, '2026-04-23 06:39:46', '2026-04-23 06:39:46'),
(276, '1', 'future-visions-business-technology-concept.jpg', 'uploads/69e9bf16d0466_800x800.jpg', 1, '2026-04-23 06:41:28', '2026-04-23 06:41:28'),
(277, '2', 'future-visions-business-technology-concept.jpg', 'uploads/69e9bf16d0466_800x800.jpg', 1, '2026-04-23 06:41:28', '2026-04-23 06:41:28'),
(278, '1', 'templates-sample-asset-1', 'uploads/6a099cc70a436_600x400.webp', 1, '2026-05-17 10:47:35', '2026-05-17 10:47:35'),
(279, '1', '6200c47a12c22_180x180', 'uploads/6a099dfc1fb19_600x400.webp', 1, '2026-05-17 10:52:44', '2026-05-17 10:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_01_22_153958_create_admins_table', 1),
(5, '2022_01_22_154615_create_web_settings_table', 1),
(6, '2022_01_23_111143_create_media_table', 1),
(7, '2022_01_23_195251_create_products_table', 1),
(8, '2022_01_24_151808_create_categories_table', 1),
(9, '2022_01_27_082838_create_orders_table', 1),
(10, '2022_01_27_090648_create_order_products_table', 1),
(11, '2022_01_27_091506_create_sliders_table', 1),
(12, '2022_01_27_120615_create_shipping_methods_table', 1),
(13, '2022_01_28_212449_create_category_products_table', 1),
(14, '2022_01_29_074445_create_couriers_table', 1),
(15, '2022_01_29_074538_create_courier_cities_table', 1),
(16, '2022_01_29_074809_create_courier_zones_table', 1),
(17, '2022_02_02_142217_create_employees_table', 1),
(18, '2022_02_02_142343_create_managers_table', 1),
(19, '2022_02_02_145904_create_order_assigns_table', 1),
(20, '2022_03_29_160933_create_attributes_table', 2),
(21, '2022_03_29_160940_create_attribute_items_table', 2),
(25, '2022_10_26_143127_create_product_attributes_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date DEFAULT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memo_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_id` int(11) DEFAULT NULL,
  `courier_city_id` int(11) DEFAULT NULL,
  `courier_zone_id` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `shipping_method` tinyint(4) DEFAULT NULL,
  `shipping_cost` double DEFAULT 0,
  `discount` double DEFAULT 0,
  `sub_total` double DEFAULT 0,
  `total` double DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=pre order, 2=confirmed, 3=hold, 4=printed, 5=on delivery, 6=delivered, 7=cancelled, 8=returned',
  `stead_fast_consignment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stead_fast_tracking_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_code` int(11) DEFAULT NULL,
  `is_otp_verified` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `invoice_id`, `memo_number`, `customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `courier_id`, `courier_city_id`, `courier_zone_id`, `payment_method`, `shipping_method`, `shipping_cost`, `discount`, `sub_total`, `total`, `status`, `stead_fast_consignment_id`, `stead_fast_tracking_code`, `tracking_link`, `source`, `order_note`, `staff_note`, `otp_code`, `is_otp_verified`, `created_at`, `updated_at`) VALUES
(1, '2025-05-23', 'INV1', NULL, 1, 'humayun kabir', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, NULL, 0, 0, 2280, 2280, 6, NULL, NULL, NULL, 'call', 'test order', NULL, NULL, 0, '2025-05-23 09:53:39', '2025-05-23 12:44:29'),
(2, '2025-05-23', 'INV2', NULL, 2, 'Rayhan Rafi', '01681636654', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, NULL, 100, 0, 5220, 5320, 6, NULL, NULL, NULL, 'direct', 'this is test order note', NULL, NULL, 0, '2025-05-23 09:54:44', '2025-05-23 09:54:44'),
(3, '2025-05-23', 'INV3', NULL, NULL, 'humayun kabir', '01681636068', NULL, 'test', NULL, NULL, NULL, NULL, NULL, 0, 0, 2280, 2280, 6, NULL, NULL, NULL, 'incomplete', NULL, NULL, NULL, 0, '2025-05-23 12:14:00', '2025-05-23 12:42:36'),
(4, '2025-05-23', 'INV4', NULL, 1, 'humayun kabir', '01681636068', NULL, 'test', NULL, NULL, NULL, NULL, 1, 0, 0, 2280, 2280, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-05-23 12:48:43', '2025-05-23 12:48:43'),
(5, '2025-05-23', 'INV5', NULL, 2, 'test', '01681636654', NULL, 'test', NULL, NULL, NULL, NULL, 1, 0, 0, 2280, 2280, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-05-23 12:49:14', '2025-05-23 12:49:14'),
(6, '2025-05-23', 'INV6', NULL, 1, 'Test Name', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 0, 0, 2280, 2280, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-05-23 12:50:38', '2025-05-23 12:50:38'),
(7, '2025-05-23', 'INV7', NULL, 3, 'Test Name', '01180402273', NULL, 'est', NULL, NULL, NULL, NULL, 1, 70, 0, NULL, 1010, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-05-23 13:13:42', '2025-05-23 13:13:42'),
(8, '2025-05-23', 'INV8', NULL, 1, 'humayun kabirf3', '01681636068', NULL, 'fef', NULL, NULL, NULL, NULL, 1, 70, 0, NULL, 560, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-05-23 14:22:22', '2025-05-23 14:22:22'),
(9, '2025-05-26', 'INV9', NULL, 1, 'humayun kabir', '01681636068', NULL, 'test address', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 490, 6, NULL, NULL, NULL, 'call', NULL, NULL, NULL, 0, '2025-05-25 21:19:48', '2025-05-25 21:20:35'),
(10, '2025-05-26', 'INV10', NULL, 1, 'Test Name', '01681636068', NULL, 'dhaka', NULL, NULL, NULL, NULL, NULL, 0, 0, 490, 490, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-05-26 08:12:48', '2025-05-26 08:12:48'),
(11, '2025-07-27', 'INV11', NULL, 1, 'test customer', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 0, 0, 2280, 2280, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-27 08:59:24', '2025-07-27 08:59:24'),
(12, '2025-07-27', 'INV12', NULL, 4, 'test customer', '01923384756', NULL, 'fefef', NULL, NULL, NULL, NULL, 1, 0, 0, 2280, 2280, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-27 09:18:18', '2025-07-27 09:18:18'),
(13, '2025-07-27', 'INV13', NULL, 5, 'test name', '01681636', NULL, 'ljko', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-27 09:24:02', '2025-07-27 09:24:02'),
(14, '2025-07-27', 'INV14', NULL, 6, 'test customer', '016816360', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 0, 0, 2280, 2280, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-27 11:29:54', '2025-07-27 11:29:54'),
(15, '2025-07-27', 'INV15', NULL, 7, 'test customer', '01681636063', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 0, 0, 2280, 2280, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-27 13:14:28', '2025-07-27 13:14:28'),
(16, '2025-07-30', 'INV16', NULL, 1, 'test name', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 0, 0, 2280, 2280, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 07:32:01', '2025-07-30 07:32:01'),
(17, '2025-07-30', 'INV17', NULL, 1, 'test name', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 0, 0, 2280, 2280, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 07:32:33', '2025-07-30 07:32:33'),
(18, '2025-07-30', 'USMINV18', NULL, 1, 'test customer', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, 8326, 0, '2025-07-30 07:54:21', '2025-07-30 07:54:21'),
(19, '2025-07-30', 'USMINV19', NULL, 1, 'test customer', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 07:55:16', '2025-07-30 07:55:16'),
(20, '2025-07-30', 'USMINV20', NULL, 1, 'test customer', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 07:55:48', '2025-07-30 07:55:48'),
(21, '2025-07-30', 'USMINV21', NULL, 1, 'test customer', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 07:58:33', '2025-07-30 07:58:33'),
(22, '2025-07-30', 'USMINV22', NULL, 1, 'test customer', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 07:58:38', '2025-07-30 07:58:38'),
(23, '2025-07-30', 'USMINV23', NULL, 1, 'test customer', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 07:58:47', '2025-07-30 07:58:47'),
(24, '2025-07-30', 'USMINV24', NULL, 1, 'test customer', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 08:00:56', '2025-07-30 08:00:56'),
(25, '2025-07-30', 'USMINV25', NULL, 1, 'test customer', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, 5819, 0, '2025-07-30 08:01:14', '2025-07-30 08:01:14'),
(26, '2025-07-30', 'USMINV26', NULL, 1, 'test customer', '01681636068', NULL, 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 1, '2025-07-30 08:06:07', '2025-07-30 08:06:48'),
(27, '2025-07-31', 'USMINV27', NULL, 8, 'test customer', '06816366543', NULL, 'fdf', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, 8772, 0, '2025-07-30 19:47:14', '2025-07-30 19:47:14'),
(28, '2025-07-31', 'USMINV28', NULL, 9, 'test customer', '08163606855', NULL, 'fe', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 19:48:09', '2025-07-30 19:48:09'),
(29, '2025-07-31', 'USMINV29', NULL, 10, 'test customer', '06816366544', NULL, 'fe', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 19:51:19', '2025-07-30 19:51:19'),
(30, '2025-07-31', 'USMINV30', NULL, 11, 'test customer', '06816360683', NULL, 'e', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 19:54:23', '2025-07-30 19:54:23'),
(31, '2025-07-31', 'USMINV31', NULL, 12, 'test customer', '09986666554', NULL, 'fef', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 19:57:19', '2025-07-30 19:57:19'),
(32, '2025-07-31', 'USMINV32', NULL, 13, 'test customer', '01575622354', NULL, 'fe', NULL, NULL, NULL, NULL, 1, 70, 0, 490, 560, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-07-30 20:01:06', '2025-07-30 20:01:06'),
(33, '2025-10-28', 'INVUSMINV33', NULL, 1, 'test name', '01681636068', NULL, 'test address', NULL, NULL, NULL, NULL, 2, 120, 0, 2280, 2400, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2025-10-28 11:44:15', '2025-10-28 11:44:15'),
(35, '2026-05-10', 'USMINVUSMINV34', NULL, 14, 'Motiur Rahman', '01577298633', NULL, 'Mirpur 10, Dhaka, Bangladesh', NULL, NULL, NULL, NULL, 1, 70, 0, 2870, 2940, 6, NULL, NULL, NULL, 'direct', NULL, NULL, NULL, 0, '2026-05-10 04:27:49', '2026-05-10 04:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_assigns`
--

CREATE TABLE `order_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_assigns`
--

INSERT INTO `order_assigns` (`id`, `order_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-05-23 09:53:39', '2025-05-23 09:53:39'),
(2, 2, 1, '2025-05-23 09:54:44', '2025-05-23 09:54:44'),
(3, 4, 1, '2025-05-23 12:48:43', '2025-05-23 12:48:43'),
(4, 5, 1, '2025-05-23 12:49:15', '2025-05-23 12:49:15'),
(5, 6, 1, '2025-05-23 12:50:38', '2025-05-23 12:50:38'),
(6, 7, 1, '2025-05-23 13:13:42', '2025-05-23 13:13:42'),
(7, 8, 1, '2025-05-23 14:22:22', '2025-05-23 14:22:22'),
(8, 9, 1, '2025-05-25 21:19:48', '2025-05-25 21:19:48'),
(9, 10, 1, '2025-05-26 08:12:48', '2025-05-26 08:12:48'),
(10, 11, 1, '2025-07-27 08:59:24', '2025-07-27 08:59:24'),
(11, 12, 1, '2025-07-27 09:18:18', '2025-07-27 09:18:18'),
(12, 13, 1, '2025-07-27 09:24:02', '2025-07-27 09:24:02'),
(13, 14, 1, '2025-07-27 11:29:54', '2025-07-27 11:29:54'),
(14, 15, 1, '2025-07-27 13:14:28', '2025-07-27 13:14:28'),
(15, 16, 1, '2025-07-30 07:32:01', '2025-07-30 07:32:01'),
(16, 17, 1, '2025-07-30 07:32:33', '2025-07-30 07:32:33'),
(17, 18, 1, '2025-07-30 07:54:21', '2025-07-30 07:54:21'),
(18, 19, 1, '2025-07-30 07:55:16', '2025-07-30 07:55:16'),
(19, 20, 1, '2025-07-30 07:55:48', '2025-07-30 07:55:48'),
(20, 21, 1, '2025-07-30 07:58:33', '2025-07-30 07:58:33'),
(21, 22, 1, '2025-07-30 07:58:38', '2025-07-30 07:58:38'),
(22, 23, 1, '2025-07-30 07:58:47', '2025-07-30 07:58:47'),
(23, 24, 1, '2025-07-30 08:00:56', '2025-07-30 08:00:56'),
(24, 25, 1, '2025-07-30 08:01:14', '2025-07-30 08:01:14'),
(25, 26, 1, '2025-07-30 08:06:07', '2025-07-30 08:06:07'),
(26, 27, 1, '2025-07-30 19:47:14', '2025-07-30 19:47:14'),
(27, 28, 1, '2025-07-30 19:48:09', '2025-07-30 19:48:09'),
(28, 29, 1, '2025-07-30 19:51:19', '2025-07-30 19:51:19'),
(29, 30, 1, '2025-07-30 19:54:23', '2025-07-30 19:54:23'),
(30, 31, 1, '2025-07-30 19:57:19', '2025-07-30 19:57:19'),
(31, 32, 1, '2025-07-30 20:01:06', '2025-07-30 20:01:06'),
(32, 33, 1, '2025-10-28 11:44:15', '2025-10-28 11:44:15'),
(33, 35, 1, '2026-05-10 04:27:49', '2026-05-10 04:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attributes`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_sku`, `qty`, `price`, `attributes`, `created_at`, `updated_at`) VALUES
(2, 2, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"S\"}', '2025-05-23 09:54:44', '2025-05-23 09:54:44'),
(3, 2, 98, NULL, 1, 2450, '{\"Color\":\"Green\",\"Length\":\"8 Inch\"}', '2025-05-23 09:54:44', '2025-05-23 09:54:44'),
(4, 2, 91, NULL, 1, 490, NULL, '2025-05-23 09:54:44', '2025-05-23 09:54:44'),
(6, 3, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"M\"}', '2025-05-23 12:42:36', '2025-05-23 12:42:36'),
(12, 1, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"S\"}', '2025-05-23 12:44:29', '2025-05-23 12:44:29'),
(13, 4, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"M\"}', '2025-05-23 12:48:43', '2025-05-23 12:48:43'),
(14, 5, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"M\"}', '2025-05-23 12:49:15', '2025-05-23 12:49:15'),
(15, 6, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"S\"}', '2025-05-23 12:50:38', '2025-05-23 12:50:38'),
(16, 7, 2, NULL, 1, 490, NULL, '2025-05-23 13:13:42', '2025-05-23 13:13:42'),
(17, 7, 3, NULL, 1, 450, NULL, '2025-05-23 13:13:42', '2025-05-23 13:13:42'),
(18, 8, 2, NULL, 1, 490, NULL, '2025-05-23 14:22:22', '2025-05-23 14:22:22'),
(20, 9, 2, NULL, 1, 490, NULL, '2025-05-25 21:20:35', '2025-05-25 21:20:35'),
(21, 10, 2, NULL, 1, 490, NULL, '2025-05-26 08:12:48', '2025-05-26 08:12:48'),
(22, 11, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"S\"}', '2025-07-27 08:59:24', '2025-07-27 08:59:24'),
(23, 12, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"M\"}', '2025-07-27 09:18:18', '2025-07-27 09:18:18'),
(24, 13, 2, NULL, 1, 490, NULL, '2025-07-27 09:24:02', '2025-07-27 09:24:02'),
(25, 14, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"M\"}', '2025-07-27 11:29:54', '2025-07-27 11:29:54'),
(26, 15, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"M\"}', '2025-07-27 13:14:28', '2025-07-27 13:14:28'),
(27, 16, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"S\"}', '2025-07-30 07:32:01', '2025-07-30 07:32:01'),
(28, 17, 99, NULL, 1, 2280, '{\"\\u09b8\\u09c1 \\u09b8\\u09be\\u0987\\u099c \\u09b8\\u09bf\\u09b2\\u09c7\\u0995\\u09cd\\u099f \\u0995\\u09b0\\u09c1\\u09a8\":\"S\"}', '2025-07-30 07:32:33', '2025-07-30 07:32:33'),
(29, 18, 2, NULL, 1, 490, NULL, '2025-07-30 07:54:21', '2025-07-30 07:54:21'),
(30, 19, 2, NULL, 1, 490, NULL, '2025-07-30 07:55:16', '2025-07-30 07:55:16'),
(31, 20, 2, NULL, 1, 490, NULL, '2025-07-30 07:55:48', '2025-07-30 07:55:48'),
(32, 21, 2, NULL, 1, 490, NULL, '2025-07-30 07:58:33', '2025-07-30 07:58:33'),
(33, 22, 2, NULL, 1, 490, NULL, '2025-07-30 07:58:38', '2025-07-30 07:58:38'),
(34, 23, 2, NULL, 1, 490, NULL, '2025-07-30 07:58:47', '2025-07-30 07:58:47'),
(35, 24, 2, NULL, 1, 490, NULL, '2025-07-30 08:00:56', '2025-07-30 08:00:56'),
(36, 25, 2, NULL, 1, 490, NULL, '2025-07-30 08:01:14', '2025-07-30 08:01:14'),
(37, 26, 2, NULL, 1, 490, NULL, '2025-07-30 08:06:07', '2025-07-30 08:06:07'),
(38, 27, 2, NULL, 1, 490, NULL, '2025-07-30 19:47:14', '2025-07-30 19:47:14'),
(39, 28, 2, NULL, 1, 490, NULL, '2025-07-30 19:48:09', '2025-07-30 19:48:09'),
(40, 29, 2, NULL, 1, 490, NULL, '2025-07-30 19:51:19', '2025-07-30 19:51:19'),
(41, 30, 2, NULL, 1, 490, NULL, '2025-07-30 19:54:23', '2025-07-30 19:54:23'),
(42, 31, 2, NULL, 1, 490, NULL, '2025-07-30 19:57:19', '2025-07-30 19:57:19'),
(43, 32, 2, NULL, 1, 490, NULL, '2025-07-30 20:01:06', '2025-07-30 20:01:06'),
(44, 33, 99, 'kbc258', 1, 2280, NULL, '2025-10-28 11:44:15', '2025-10-28 11:44:15'),
(49, 35, 97, 'mpp6', 1, 590, NULL, '2026-05-10 04:27:49', '2026-05-10 04:27:49'),
(50, 35, 99, 'kbc258', 1, 2280, NULL, '2026-05-10 04:27:49', '2026-05-10 04:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_us` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_policy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_policy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`id`, `about_us`, `delivery_policy`, `return_policy`, `created_at`, `updated_at`) VALUES
(1, NULL, '<p>Hello my name is motiur</p>', NULL, NULL, '2026-04-23 04:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `thumb` int(11) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `gallery_images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_variant` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) DEFAULT 0,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `sale_price` double DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_best_sell` tinyint(1) NOT NULL DEFAULT 0,
  `is_new_product` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_free_delivery` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_charge` double NOT NULL DEFAULT 0,
  `purchase_cost` double NOT NULL DEFAULT 0,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `position`, `thumb`, `image`, `gallery_images`, `video_url`, `has_variant`, `name`, `slug`, `stock`, `description`, `price`, `sale_price`, `is_featured`, `is_best_sell`, `is_new_product`, `status`, `is_free_delivery`, `delivery_charge`, `purchase_cost`, `brand_name`, `fb_description`, `created_at`, `updated_at`) VALUES
(1, 'SPR-001', 0, 3, 2, NULL, NULL, 0, 'Six Peptides Repair Concentrate', 'Six-Peptides-Repair-Concentrate', 0, '<li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: 64px; border: 0px;\">কুচকে যাওয়া ত্বককে টানটান করবে! ত্বক ফর্সা করে</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: 64px; border: 0px;\">ত্বকের প্রতিদিনের জমা হওয়া ময়লা পরিস্কার করে ত্বকে প্রয়োজনীয় ভিটামিন এবং পুস্টির যোগান দেয়</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: 64px; border: 0px;\">ব্রনের দাগ এবং রোদে পোড়া দাগ দূর করে চোখের নিচের কালো ভাব দূর করে</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: 64px; border: 0px;\">আপনার ত্বক করবে নিখুঁত ও মসৃণ করে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: 64px; border: 0px;\">তককে সুন্দর ও আকর্ষণীও করে ক্ষতিগ্রস্থ ত্বক পুনরুদ্ধার করে</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: 64px; border: 0px;\">Made in china</li>', 950, 690, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:12:33', '2022-02-07 06:12:33'),
(2, 'CDR-001', 0, 5, 4, NULL, NULL, 0, 'Car Dent Repair Tools Strong Suction Cup', 'Car-Dent-Repair-Tools-Strong-Suction-Cup', 1, '<p><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">2 inch small dents remover for pulling automotive car hail and door ding damage.</span><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">Designed to pull dents from nearly any vehicle surfaces including metal and plastic.</span><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">Can be used on glass, mirror or any smooth sheet material.</span><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">Heavy-duty rubber suction cup allows for gentle and scratch-free use.</span><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">Quick release handle design, easy to use.</span><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><strong style=\"box-sizing: inherit; font-weight: bold; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">Specification:</strong><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">Material: ABS.</span><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">Color: show as pictures.</span><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">Size: 5.8cm.</span><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><strong style=\"box-sizing: inherit; font-weight: bold; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">Note:</strong><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">There might be a bit color distortions due to different computer resolutions.</span><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">There might be size errors due to different computer resolutions.</span><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">Package include:</span><br style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\"><span style=\"box-sizing: inherit; color: rgb(102, 102, 102); font-family: raleway, sans-serif; font-size: 13px; padding: 0px; margin: 0px;\">1 * Car bodywork panel suction cup.</span><br></p>', 790, 490, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:16:16', '2025-05-25 21:20:35'),
(3, 'PC-001', 0, 222, 221, NULL, NULL, 0, 'Hustuo Hemorrhoids Cream ( 3 পিস 790 টাকা)', 'Hustuo-Hemorrhoids-Cream-(-3-পিস-790-টাকা)-1', 0, '<p style=\"margin: inherit; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\"><span style=\"color: rgb(255, 0, 0);\">#অবিশ্বাশ্য অফার 3 পিস 790 টাকা।</span></p><p style=\"margin: inherit; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\"><br></p><p style=\"margin: inherit; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">বিনা অপা-রেশনে পাই-লস, ফিস্টুলা ও এনাল ফিসার রোগের স্থায়ী চিকিৎসা।</p><p style=\"margin: inherit; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">ম-লদ্বারের যে কোন রোগ হোক না কেন, বিনা অপা-রেশনে ভালো করে।</p><p style=\"margin: inherit; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">১০ থেকে ১৫ দিনের মধ্যেই র-ক্তপাত সম্পূর্ণরূপে বন্ধ করে দেয়।</p><p style=\"margin: inherit; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">সকল ধরণের চুলকানি ও ব্যথা বন্ধ হয়ে যাবে।</p><p style=\"margin: inherit; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">এই ক্রিম নিয়মিত ব্যবহার করলে স্থায়ীভাবে ২ মাসেই এই রোগ থেকে চিরস্থায়ী মুক্তি পাবেন ইনশাআল্লাহ।</p><p style=\"margin: inherit; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">Net Wt: 20g</p>', 650, 450, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:17:27', '2022-03-29 09:32:41'),
(4, 'ISR-001', 0, 210, 209, NULL, NULL, 0, 'ইনস্ট্যান্ট দাগ রিমুভার রোল (1 পিস কিনলে 1 পিস ফ্রি)', 'ইনস্ট্যান্ট-দাগ-রিমুভার-রোল-(1-পিস-কিনলে-1-পিস-ফ্রি)', 0, '<p style=\"box-sizing: inherit; margin-bottom: 10px; color: rgb(117, 117, 117); line-height: 24px; padding: 0px; font-family: Poppins, sans-serif;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">এই দাগ রিমুভার বিশেষভাবে সব ধরনের দাগের সাথে মোকাবিলা করার জন্য তৈরি করা হয়েছে। এটি ত্বকে নিরাপদ এবং কোমল, আপনার কাপড়ের ক্ষতি করবে না এবং কাপড়ের সুন্দর রঙকে প্রভাবিত করবে না।</span><br></p><p style=\"box-sizing: inherit; margin-bottom: 10px; color: rgb(117, 117, 117); line-height: 24px; padding: 0px; font-family: Poppins, sans-serif;\"><span style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">কার্যকরভাবে সব ধরনের দাগ দূর করুন এটি খাবারের দাগ, প্রসাধনী দাগ, পানীয় (কফি, চা, ওয়াইন, দুধ, কোলা, ইত্যাদি), কেচাপ, তেলের দাগ ইত্যাদির জন্য ব্যবহার করা যেতে পারে৷ এটি ব্যবহারিক এবং ব্যবহার করা সহজ৷</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">বিভিন্ন ধরণের ফ্যাব্রিক পোশাকের জন্য উপযুক্ত এক বোতল বহুমুখী, জল, প্রচেষ্টা এবং অর্থ সাশ্রয় করে। এটি তুলা, লিনেন, পলিয়েস্টার, মিশ্রিত ফ্যাব্রিক, ডেনিম, ডাউন জ্যাকেট ইত্যাদির জন্য উপযুক্ত৷</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">পোর্টেবল সুবিধাজনক এবং কমপ্যাক্ট ডিজাইন, বহন করা সহজ, এটি আপনাকে নোংরা জামাকাপড়ের বিব্রতকর পরিস্থিতি থেকে বাঁচাতে পারে৷ স্টেইন রিমুভার পেন আপনার পার্স, ব্রিফকেস বা ব্যাকপ্যাকে যেতে যেতে দ্রুত দাগ অপসারণের জন্য সহজ এবং সুবিধাজনক করে তোলে৷ !</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">জরুরী দাগ অপসারণের জন্য ডিল যেকোন দাগ সংক্রান্ত সমস্যার সমাধান করতে মাত্র 1 মিনিট সময় লাগে! দাগযুক্ত জায়গায় দাগ অপসারণকারীর সাহায্যে সামনে পিছনে ঘুরুন, এবং দাগ অবিলম্বে একটি চিহ্ন ছাড়াই অদৃশ্য হয়ে যাবে। এটি বাইরের দাগের জন্য খুব উপযুক্ত, যেমন কাজ, পার্টি, ক্যাম্পিং ইত্যাদির কারণে হঠাৎ দাগ।<br style=\"box-sizing: inherit; padding: 0px; margin: 0px;\"></span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px;\"></p><div align=\"center\" style=\"box-sizing: content-box; padding: 0px; margin: 0px; color: rgb(66, 70, 70); font-family: Poppins, sans-serif; -webkit-tap-highlight-color: transparent; outline: 0px; text-align: center;\"><img width=\"328\" height=\"315\" src=\"https://cdn.shopifycdn.net/s/files/1/0252/4823/5625/files/02_480x480.gif?v=1631698556\" slate-data-type=\"image\" style=\"box-sizing: inherit; max-width: 100%; height: auto; border: 0px; padding: 0px; margin: 0px auto; transition: all 0.4s ease 0s; -webkit-tap-highlight-color: transparent; outline: 0px; display: block;\"></div><div style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(66, 70, 70); font-family: Poppins, sans-serif;\"><img width=\"371\" height=\"371\" src=\"https://cdn.shopifycdn.net/s/files/1/0252/4823/5625/products/Stain-Remover-Roll-Bead-Design_08_480x480.jpg?v=1631697425\" slate-data-type=\"image\" style=\"box-sizing: inherit; max-width: 100%; height: auto; border: 0px; padding: 0px; margin: 0px auto; transition: all 0.4s ease 0s; -webkit-tap-highlight-color: transparent; outline: 0px; font-family: \" open=\"\" sans\",=\"\" roboto,=\"\" arial,=\"\" helvetica,=\"\" sans-serif,=\"\" simsun;=\"\" display:=\"\" block;\"=\"\"><br style=\"box-sizing: inherit; padding: 0px; margin: 0px;\"><div style=\"box-sizing: content-box; padding: 0px; margin: 0px; -webkit-tap-highlight-color: transparent; outline: 0px;\"><img src=\"https://cdn.shopifycdn.net/s/files/1/0252/4823/5625/products/Stain-Remover-Roll-Bead-Design_05_480x480.jpg?v=1631697424\" slate-data-type=\"image\" style=\"box-sizing: inherit; max-width: 100%; height: auto; border: 0px; padding: 0px; margin: 0px auto; transition: all 0.4s ease 0s; -webkit-tap-highlight-color: transparent; outline: 0px; font-size: 1.4em; display: block;\"></div><ul style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; -webkit-tap-highlight-color: transparent; outline: 0px; margin-block-start: 1em;\"><li style=\"box-sizing: inherit; list-style: none; padding: 0px; margin: 0px; -webkit-tap-highlight-color: transparent; outline: 0px;\"><p data-spm-anchor-id=\"a2g0o.detail.1000023.i5.65b34c29tmpnnC\" style=\"box-sizing: inherit; margin-bottom: 10px; color: rgb(117, 117, 117); line-height: inherit; padding: 0px; -webkit-tap-highlight-color: transparent; outline: 0px;\"><span style=\"box-sizing: inherit; padding: 0px; margin: 0px; font-family: \" open=\"\" sans\",=\"\" roboto,=\"\" arial,=\"\" helvetica,=\"\" sans-serif,=\"\" simsun;\"=\"\"> </span><img src=\"https://ae03.alicdn.com/kf/H1b14f7a7212f499bbb7ff60a3d4629a0D.jpg\" alt=\"\" name=\"img01\" style=\"box-sizing: inherit; max-width: 100%; height: auto; border: 0px; padding: 0px; margin: 0px; transition: all 0.4s ease 0s; -webkit-tap-highlight-color: transparent; outline: 0px; font-family: \" open=\"\" sans\",=\"\" roboto,=\"\" arial,=\"\" helvetica,=\"\" sans-serif,=\"\" simsun;\"=\"\"><span style=\"box-sizing: inherit; padding: 0px; margin: 0px; font-family: \" open=\"\" sans\",=\"\" roboto,=\"\" arial,=\"\" helvetica,=\"\" sans-serif,=\"\" simsun;\"=\"\"> </span><img src=\"https://ae03.alicdn.com/kf/H9bf27c2707c34fad95df625cb3bf5fcc9.jpg\" alt=\"\" name=\"img01\" style=\"box-sizing: inherit; max-width: 100%; height: auto; border: 0px; padding: 0px; margin: 0px; transition: all 0.4s ease 0s; -webkit-tap-highlight-color: transparent; outline: 0px; font-family: \" open=\"\" sans\",=\"\" roboto,=\"\" arial,=\"\" helvetica,=\"\" sans-serif,=\"\" simsun;\"=\"\"><span style=\"box-sizing: inherit; padding: 0px; margin: 0px; font-family: \" open=\"\" sans\",=\"\" roboto,=\"\" arial,=\"\" helvetica,=\"\" sans-serif,=\"\" simsun;\"=\"\"> </span><img src=\"https://ae03.alicdn.com/kf/H081ca4f7ca174a129abeb641748d3ec3L.jpg\" alt=\"\" name=\"img01\" style=\"box-sizing: inherit; max-width: 100%; height: auto; border: 0px; padding: 0px; margin: 0px; transition: all 0.4s ease 0s; -webkit-tap-highlight-color: transparent; outline: 0px; font-family: \" open=\"\" sans\",=\"\" roboto,=\"\" arial,=\"\" helvetica,=\"\" sans-serif,=\"\" simsun;\"=\"\"></p></li></ul></div>', 1400, 690, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:18:55', '2022-03-07 10:50:18'),
(5, 'CHP-001', 0, 11, 10, NULL, NULL, 0, 'Copper High Pressure Water Spray Gun', 'Copper-High-Pressure-Water-Spray-Gun', 0, '<li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">বিডেট স্প্রেয়ারে পানির চাপ বৃদ্ধি পাবে এবং বিভিন্ন কাজে ব্যবহার করা যাবে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">পানি চাপের দূরত্ব: ১০ মিটার। বৈশিষ্ট্য: গাড়ি পরিষ্কার, ঘর পরিষ্কার, গাছ পানি দেওয়া এবং বাগানের জন্য ব্যবহার করুন। পানির চাপ আপনার চাহিদা অনুযায়ী ব্যবহার করতে পারেন। পণ্যের বিস্তারিতঃ ইনস্টল করা, পরিষ্কার করা এবং ব্যবহার করা সহজ। নিরাপদ পানি, পানির পথ আপনার চাহিদা অনুসারে সামঞ্জস্য করতে পারেন। পানির চাপ ৪০০% বৃদ্ধি করুন। এর মাথা বাজারের সাধারণ আইটেমের চেয়ে ৫০ গুণ শক্তিশালী এবং কখনও বালি-জ্যাম থাকে না। +পানির কোন ড্রপ ছাড়া এই পণ্যটি খুব উচ্চ চাপ নিতে পারে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Copper spray gun set, direct spray water gun, high pressure water gun, nipple water gun, household water gun set</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Product weight: 200 grams</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">product specifications: 4*3*3/10*3*3cm</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Usage scenarios: bathroom, washbasin, etc.</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Specifications:</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Copper spray gun set direct spray water gun high pressure water gun nipple water gun household water gun set</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">High-quality selection of materials, rest assured to use</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Exquisite and compact, durable</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Separate sets to meet demand</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Brass material, high-end quality</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">note:</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">1.Please allow 0-1cm errors due to manual measurement.</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">2.Item color displayed in photos may be showing slightly different on your computer monitor since monitors are not calibrated same.</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li 3.if=\"\" you=\"\" have=\"\" any=\"\" questions=\"\" about=\"\" the=\"\" product,=\"\" please=\"\" contact=\"\" us,=\"\" we=\"\" will=\"\" patiently=\"\" answer=\"\" for=\"\" you!<li=\"\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Package Included:</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\"></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">1*Interface set</li>', 990, 850, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:20:10', '2022-02-07 06:20:10'),
(6, 'MCG-001', 0, 13, 12, NULL, NULL, 0, 'মোল্ড ক্লিনার জেল', 'মোল্ড-ক্লিনার-জেল', 0, '<div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">বাথরুম, কিচেন, টাইলস এবং বেসিনের অনেক জায়গা পরিষ্কার রাখা সম্ভব হয়না।</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">তাই সে সকল কঠিন জায়গা পরিস্কার করতে ব্যবহার করুন মোল্ড ক্রিম।</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">ওজন 120 গ্রাম।</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">মেড বাই চায়না।</div>', 790, 550, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:21:17', '2022-02-07 06:21:17'),
(7, 'WHS-001', 0, 19, 18, NULL, NULL, 0, 'Wireless Headset Sunglasses', 'Wireless-Headset-Sunglasses', 0, '<li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Stereo music support,mobile music support</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">designed for sports,make sports more active,</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Fashion Headphones Features: Hi-metal headphones, super bass, ear headphones, pluggable, long wear no pain,</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">ergonomic engineering Built-in 180mA lithium polymer battery,safety and beautiful</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">Sunglasses+MP3+wireless ,Anti-UV400</li>', 1350, 1050, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:50:29', '2022-02-07 06:50:29'),
(8, 'FRC-001', 0, 21, 20, NULL, NULL, 0, 'Foot Repair Cream', 'Foot-Repair-Cream', 0, '<li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; list-style-type: none !important;\"><font color=\"#333333\" face=\"raleway, sans-serif\"><span style=\"font-size: 16px;\">1. রুক্ষ, শুষ্ক, ফাটা এবং ফাটা পায়ের ত্বক ৩ দিনের মধ্যে কার্যকরী ফল পাওয়া যায়।</span></font></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; list-style-type: none !important;\"><font color=\"#333333\" face=\"raleway, sans-serif\"><span style=\"font-size: 16px;\">2. ত্বকের গভীরে, পুঙ্খানুপুঙ্খভাবে ত্বক মেরামত করে, পুরু, রুক্ষ, কালো ত্বক দূর করে।</span></font></li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; list-style-type: none !important;\"><font color=\"#333333\" face=\"raleway, sans-serif\"><span style=\"font-size: 16px;\">3. অ্যান্টি-ফাঙ্গাল এবং অ্যান্টি-ব্যাকটেরিয়াল, অ্যাথলেটের পা অপসারণ করে এবং ত্বকে চুলকানি এবং অস্বস্তি দূর করে।</span></font></li>', 790, 490, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:51:33', '2022-02-07 06:51:33'),
(9, 'WRC-001', 0, 23, 22, NULL, NULL, 0, 'Wart Remover Cream', 'Wart-Remover-Cream', 0, '<p style=\"margin: 4px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">অনেকেরই সুন্দর ত্বকে ছোট ছোট বাদামি তিল অথবা ছোট আচিল দেখা দেয় যা দেখতে খুবই বাজে দেখায় আর ত্বকের সৌন্দর্য নষ্ট করে অনেকেই অনেক কিছু ব্যবহার করে রেজাল্ট পাচ্ছেন না... তবে আমরা আচিলের জন্য বেষ্ট একটা ক্রিম এনেছি... সবচেয়ে কম প্রাইজের মধ্যে দেয়ার ট্রাই করেছি এতো কমে কেউ দিতে পারবে না guarantee</p><p style=\"margin: 4px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">✅আচিল রিমুভ করবে ১০০%</p><p style=\"margin: 4px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">✅ ৭-১০ দিনের মধ্যে রেজাল্ট পাওয়া স্টার্ট হবে</p><p style=\"margin: 4px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">✅ যেকোনো কালো দাগ দূর করবে</p><p style=\"margin: 4px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">✅ কোনো সাইড ইফেক্ট নেই</p><p style=\"margin: 4px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">✅৫-৭দিন ব্যবহারের পর আচিলের জায়গায়টা একটু চুলকাতে পারে অথবা জ্বলতে পারে তবে ধৈর্য ধরে ইউজ করতে ভালো রেজাল্ট পাবেন</p><p style=\"margin: 4px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\"><span style=\"font-size: 0.875rem;\">✅ কটা টিউব ইউজ করলেই রেজাল্ট পাবেন।</span></p>', 790, 590, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:52:50', '2022-02-07 06:52:50'),
(10, 'SWCG-001', 0, 25, 24, NULL, NULL, 0, 'Shoes Whitening Cleansing Gel, Shoe Stain Remover', 'Shoes-Whitening-Cleansing-Gel,-Shoe-Stain-Remover', 0, '<p><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">How to Use:</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">1.Clean generally</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">2.Stick the tape</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">3.Apply the gel about 3-5mm</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">4.Let stand for 1-3hours</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">5.Wipe off and clean</span><br></p>', 790, 590, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:54:07', '2022-02-07 06:54:07'),
(11, 'FP-001', 0, 27, 26, NULL, NULL, 0, 'Furniture Polish', 'Furniture-Polish', 0, '<ul style=\"margin-right: 0px; margin-bottom: 11.5px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Lato;\"><li style=\"list-style-type: none;\">Beeswax Wood Polish</li><li style=\"list-style-type: none;\">আপনার বাসার পুরনো ফার্নিচার নতুন করে ফেলুন নিমিষেই!!</li><li style=\"list-style-type: none;\">এই মোমপলিশটি কাঠ, বাশ, বেত, লেদার, স্টিল যাবতীয় প্রয়োজনীয় যেকোন ফার্নিচারে ব্যাবহার করতে পারবেন।</li><li style=\"list-style-type: none;\">Wood Seasoning Beewax – Traditional Beeswax Polish for Wood &amp; Furniture</li><li style=\"list-style-type: none;\">All-Purpose Beewax for Wood Cleaner and Polish Wipes – Non Toxic for Furniture to Beautify &amp; Protect</li></ul>', 450, 300, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:55:29', '2022-02-07 06:55:29'),
(12, 'WP', 0, 29, 28, NULL, NULL, 0, 'Water Pump Car and Bike Washer', 'Water-Pump-Car-and-Bike-Washer', 0, '<p style=\"margin: 4px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\"><span style=\"color: rgb(51, 51, 51);\">নিজের মোটর সাইকেল, গাড়ি&nbsp; ওয়াশ করুন ১ বালতি পানি দিয়ে। বাগানে পানি দেওয়া, গাছে কিটনাশক ছিটানো যায় ।</span></p><ol style=\"margin-bottom: 10px; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><li style=\"list-style-type: none;\">Multi Use 12 Volt 40 Wate Hi Pressure Pump</li><li style=\"list-style-type: none;\">২ বছরের সার্ভিস গ্যারান্টী।</li><li style=\"list-style-type: none;\">পাম্পগুলো কারেন্ট,ব্যাটারি এবং সোলারে চলে।</li><li style=\"list-style-type: none;\">বাইক/কার/ট্রাক/বাস/পিকাপ এবং ট্রাক্টর পরিষ্কার করা।</li><li style=\"list-style-type: none;\">আম/লিচু বাগানে পানি/ কীটনাশক দিতে পাড়বেন।</li><li style=\"list-style-type: none;\">গরু/মুরগির ফার্মে ব্যাবহার করতে পাড়বেন।</li><li style=\"list-style-type: none;\">শাক/ সবজী ক্ষেতে পানি দিতে পাড়বেন।</li><li style=\"list-style-type: none;\">পুকুর/টিউবয়েল/ড্রাম/বালতি থেকে পানি নিয়ে ব্যাবহার করা যাবে।</li><li style=\"list-style-type: none;\">ফুলসেট ওয়াটার পাম্পের সাথে যা যা পাচ্ছেনঃ</li></ol><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><li style=\"list-style-type: none;\">৪০ ওয়াটের উন্নত মানের ১ টি পাম্প</li><li style=\"list-style-type: none;\">১ টি এডাপটার এবং &nbsp;স্প্রে গান</li><li style=\"list-style-type: none;\">১০&nbsp;ফিট পাইপ+ নজল সোহো আরো অন্যনো।</li></ul>', 1250, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:57:57', '2022-02-07 06:57:57'),
(13, 'BSB', 0, 31, 30, NULL, NULL, 0, 'Back Support Belt', 'Back-Support-Belt', 0, '<p><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: Lato;\">(আমদানি কৃত অরিজিনাল গ্রান্টেড বেল্ট) ফেব্রিক: ৭০% Neoprene, ৩০% পলিয়েস্টার, # কেন ব্যবহার করবেন?? যারা কুঁজো হয়ে চলাফেরা করেন, যাদের পিঠ ব্যথা, এবং দীর্ঘক্ষন কম্পিউটারের সামনে বসে /ঝুকে কাজ করে থাকেন , সোজা হয়ে কাজ করতে পারেন না তাদের জন্য এটা অত্যন্ত কার্যকরী একটি প্রডাক্ট যা ব্যবহারে আপনার মেরুদন্ড বাকা হতে দেবে না সোজা হয়েই কাজ করতে বা পড়তে পারবেন ,যার ফলে আপনাকে লম্বা ও ফিট দেখাবে, ছেলে মেয়ে উভয়ই ব্যাবহার করতে পারবেন</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: Lato;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: Lato;\">✔️ উপকারিতাঃ</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: Lato;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: Lato;\">(১) হালকা ব্যকপেইন বা মেরুদন্ডের ব্যাথাকে নিরাময় করে।</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: Lato;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: Lato;\">(২) এটা মেরুদন্ডকে সোজা রাখতে সাহায্যকরবে</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: Lato;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: Lato;\">(৩)বডি শেপকে রাখে সুন্দর ও আকর্ষনীয়!।</span><br></p>', 990, 690, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 06:59:02', '2022-02-07 06:59:02'),
(14, 'RS', 0, 33, 32, NULL, NULL, 0, 'Stainless Steel Hexagonal Aiwa 40 In 1 Pcs Wrench Tool Kit', 'Stainless-Steel-Hexagonal-Aiwa-40-In-1-Pcs-Wrench-Tool-Kit-1', NULL, '<p><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">✔1pc 3/8 Reversible Ratchet হ্যান্ডেল</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">✔14pc 1/4″ Dr.metric সকেট: ✔4mm,4.5mm,5mm,5.5mm,6mm,6.5mm,7mm,8mm,9mm,10mm,11mm,12mm,</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">✔14pc 1/4″Dr.SAE সকেট:</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">✔ 5/32,3/16,7/32,1/4,9/32,5/1611/32,3/8,13/32,</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">✔ 3pc 1/4″ Dr.SAE সকেট:1/4,5/16,3/8″</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">✔ 1pc 3/8″ 3″ext বার</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">✔1pc 1/4″*3/8 অ্যাডাপ্টার 1pc 3/8″ 21mm স্পার্ক প্লাগ স</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">✔1pc spanner হান্ডেল</span><br></p>', 890, 890, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:00:09', '2022-02-07 09:42:51');
INSERT INTO `products` (`id`, `sku`, `position`, `thumb`, `image`, `gallery_images`, `video_url`, `has_variant`, `name`, `slug`, `stock`, `description`, `price`, `sale_price`, `is_featured`, `is_best_sell`, `is_new_product`, `status`, `is_free_delivery`, `delivery_charge`, `purchase_cost`, `brand_name`, `fb_description`, `created_at`, `updated_at`) VALUES
(15, 'T9', 0, 35, 34, NULL, NULL, 0, 'T9 Electric Rechargeable Trimer', 'T9-Electric-Rechargeable-Trimer', 0, '<p><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Description:</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">জিরো থেকে ৪ সাইজ পর্যন্ত চুল দাড়ি কাটতে পারবেন খুব সহজে ।বাচ্চাদের চুল কাটার জন্য ব্যাবহার করতে পারবেন।</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">6 Month Battery warranty</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Origin: CN(Origin)</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Commodity Quality Certification：3C</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Size:15.5x4x2.5cm</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Item Type: Hair Trimmer</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Material: Stainless, Steel stainless, steel alloy</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Model Number: Hair Clipper</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Voltage：110V-240V 50Hz-60Hz.</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Battery capacity：1200mAh</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Charging time：2 hours</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Use time：Upto 4 hours</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Product size：2.4x2.4x15.8CM</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Product weight：370g</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Functions1：hair sculpting</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">Function2：hair trimming</span><br></p>', 1250, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:01:08', '2022-02-07 07:01:08'),
(16, 'MB', 0, 37, 36, NULL, NULL, 0, 'Miss Belt', 'Miss-Belt', 0, '<div dir=\"auto\" style=\"color: rgb(102, 102, 102); font-family: Lato;\">*আপনার পেটের অতিরিক্ত মেদ (ভুঁড়ি) ও চর্বি খুব সহজেই কমানোর</div><div dir=\"auto\" style=\"color: rgb(102, 102, 102); font-family: Lato;\">*জন্য আমরা আপনার জন্য নিয়ে এসেছি Hot Shaper Belt . যা খুব দ্রুত</div><div dir=\"auto\" style=\"color: rgb(102, 102, 102); font-family: Lato;\">*(এটি পরীক্ষিত ) ১০০% গ্যারান্টি আপনার অতিরিক্ত মেদ (ভুঁড়ি) ও চর্বি</div><div dir=\"auto\" style=\"color: rgb(102, 102, 102); font-family: Lato;\">*কমিয়ে আপনাকে স্লিম ও আকর্ষণীয় করে তুলবে ।</div><div dir=\"auto\" style=\"color: rgb(102, 102, 102); font-family: Lato;\">*আপনার বডি ফিগার কে আরও আকর্ষণীয় আরও স্লিম করতে সাহায্য</div><div dir=\"auto\" style=\"color: rgb(102, 102, 102); font-family: Lato;\">*করে এই MISS BELT বডি শেপারটি</div><div dir=\"auto\" style=\"color: rgb(102, 102, 102); font-family: Lato;\">*এটি আপনি বাসায়, হাঁটার সময়, কাজের মধ্যে , শপিং এ , জগিং এ *ব্যবহার করতে পারেন ।</div><div dir=\"auto\" style=\"color: rgb(102, 102, 102); font-family: Lato;\">*মহিলা ও পুরুষদের জন্য একটি অনন্য গেজেট (যা আপনার অতিরিক্ত *মেদ কমাতে সাহায্য করবে)।</div><div dir=\"auto\" style=\"color: rgb(102, 102, 102); font-family: Lato;\">*আপনার ফিগার শেপ এর মধ্যে থাকবে।</div><div dir=\"auto\" style=\"color: rgb(102, 102, 102); font-family: Lato;\">*ম্যাটেরিয়ালঃ পলিয়েস্টার, স্প্যানডেক্স, নাইলন, রাবার</div><div dir=\"auto\" style=\"color: rgb(102, 102, 102); font-family: Lato;\">ফ্রী সাইজ</div>', 790, 550, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:02:28', '2022-02-07 07:02:28'),
(17, 'OPS', 0, 39, 38, NULL, NULL, 0, 'Oil Purification Spray', 'Oil-Purification-Spray', 0, '<p style=\"margin-top: 4px; margin-bottom: 11.5px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato;\">*কার, ফার্নিচার, দেয়াল, লেদার, কমোড, টাইলস, বেসিন পরিস্কার করার ক্লিনার!</p><p style=\"margin-top: 4px; margin-bottom: 11.5px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato;\"><img class=\"emoji ic-fade-in wpc-no-lazy-loaded\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/13.1.0/svg/2705.svg\" alt=\"✅\" style=\"max-width: 100%; height: auto; border-style: initial; animation: 1s ease 0s 1 normal none running ICfadeIn; opacity: 1; vertical-align: -0.1em !important; border-width: initial !important; border-color: initial !important; border-image: initial !important; display: inline !important; box-shadow: none !important; width: 1em !important; margin: 0px 0.07em !important; background: none !important; padding: 0px !important;\">&nbsp;রান্না ঘরে তেল কাস্টে উঠানোর পারফেক্ট সলিউশন!</p><p style=\"margin-top: 4px; margin-bottom: 11.5px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato;\"><img class=\"emoji ic-fade-in wpc-no-lazy-loaded\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/13.1.0/svg/2705.svg\" alt=\"✅\" style=\"max-width: 100%; height: auto; border-style: initial; animation: 1s ease 0s 1 normal none running ICfadeIn; opacity: 1; vertical-align: -0.1em !important; border-width: initial !important; border-color: initial !important; border-image: initial !important; display: inline !important; box-shadow: none !important; width: 1em !important; margin: 0px 0.07em !important; background: none !important; padding: 0px !important;\">&nbsp;এটা দিয়ে সব কিছুই পরিষ্কার করতে পারবেন!</p><p style=\"margin-top: 4px; margin-bottom: 11.5px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato;\"><img class=\"emoji ic-fade-in wpc-no-lazy-loaded\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/13.1.0/svg/2705.svg\" alt=\"✅\" style=\"max-width: 100%; height: auto; border-style: initial; animation: 1s ease 0s 1 normal none running ICfadeIn; opacity: 1; vertical-align: -0.1em !important; border-width: initial !important; border-color: initial !important; border-image: initial !important; display: inline !important; box-shadow: none !important; width: 1em !important; margin: 0px 0.07em !important; background: none !important; padding: 0px !important;\">&nbsp;Oil Purification spray তাই অল্প পরিমানে দিলেই কাজ হয়ে যাবে!</p><p style=\"margin-top: 4px; margin-bottom: 11.5px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato;\"><img class=\"emoji ic-fade-in wpc-no-lazy-loaded\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/13.1.0/svg/2705.svg\" alt=\"✅\" style=\"max-width: 100%; height: auto; border-style: initial; animation: 1s ease 0s 1 normal none running ICfadeIn; opacity: 1; vertical-align: -0.1em !important; border-width: initial !important; border-color: initial !important; border-image: initial !important; display: inline !important; box-shadow: none !important; width: 1em !important; margin: 0px 0.07em !important; background: none !important; padding: 0px !important;\">&nbsp;100% কার্যকরী পণ্য।</p><p style=\"margin-top: 4px; margin-bottom: 11.5px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato;\"><img class=\"emoji ic-fade-in wpc-no-lazy-loaded\" role=\"img\" draggable=\"false\" src=\"https://s.w.org/images/core/emoji/13.1.0/svg/2705.svg\" alt=\"✅\" style=\"max-width: 100%; height: auto; border-style: initial; animation: 1s ease 0s 1 normal none running ICfadeIn; opacity: 1; vertical-align: -0.1em !important; border-width: initial !important; border-color: initial !important; border-image: initial !important; display: inline !important; box-shadow: none !important; width: 1em !important; margin: 0px 0.07em !important; background: none !important; padding: 0px !important;\">&nbsp;ওজন 400 মিলিগ্রাম।</p>', 890, 650, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:03:21', '2022-02-07 07:03:21'),
(18, 'LT', 0, 41, 40, NULL, NULL, 0, 'Multipurpose Laptop and Reading Table', 'Multipurpose-Laptop-and-Reading-Table', 0, '<p style=\"margin-top: 4px; margin-bottom: 11.5px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato;\">আকর্ষণীয় ডিজাইনের ল্যাপটপ টেবিল।</p><ul style=\"margin-right: 0px; margin-bottom: 11.5px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Lato;\"><li style=\"list-style-type: none;\">আপনার শখের ল্যাপটপটিকে এখন যেকোনো স্থানে বসে যেকোনো পজিশন থেকে খুব সহজে ব্যবহার করতে পারবেন । এর জন্য আর আলাদা করে কষ্ট করতে হবে না।</li><li style=\"list-style-type: none;\">এই টেবিলটি ব্যবহার করে আপনি আপনার ল্যাপটপে কাজ করার পাশাপাশি যেকোনো লেখালেখির কাজ করতে পারবেন,&nbsp; বাচ্চাদের পড়ার টেবিল হিসেবে ব্যবহার করতে পারবেন, ল্যাপটপ, ট্যাব, মোবাইল ইত্যাদি এর উপর রেখে ভিডিও দেখতে পারবেন।</li><li style=\"list-style-type: none;\">এটি আপনার ড্রইংরুমে, মেঝে বা কার্পেটের উপরে, বিছানার উপরে ইত্যাদি যেকোনো স্থানে অত্যন্ত সহজ ভাবে&nbsp; কোন রকম ঝামেলা ছাড়াই ব্যবহার করতে পারবেন।</li><li style=\"list-style-type: none;\">ল্যাপটপ টেবিলটি ওজনে হালকা যা সহজেই বহনযোগ্য।</li><li style=\"list-style-type: none;\">এই টেবিলটি রয়েছে পছন্দ অনুযায়ী কয়েকটি মাল্টি কালারের।</li><li style=\"list-style-type: none;\">টেবিলে &nbsp;রয়েছে অসাধারণ লক সিস্টেম যার কারণে খুবই মজবুত এবং যে কোন স্থানে দৃঢ়তার সাথে অবস্থান করে।</li></ul>', 1850, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:04:26', '2022-02-07 07:04:26'),
(19, '3D CL', 0, 43, 42, NULL, NULL, 0, '3D Large LED Digital Table Alarm Clock', '3D-Large-LED-Digital-Table-Alarm-Clock', 0, '<ul style=\"margin-right: 0px; margin-bottom: 11.5px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Lato;\"><li style=\"list-style-type: none;\"><div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\"><div dir=\"auto\"><p style=\"margin-bottom: 11.5px; line-height: 21px;\">Product Description:<br>— Weight: about 190 grams.<br>— Size: 235 mm * 93 mm * 18 mm<br>— Material: Acrylic<br>— Temperature range: 0-50℃（32-122℉）<br>— Color: White Shell<br>— Light: Pink Light, Blue Light, White Light<br>— Power supply: USB<br>— Output Voltage: DC 5V<br>— Input voltage: 100-240V</p><p style=\"margin-bottom: 11.5px; line-height: 21px;\">Package Included:<br>— 1*Led wall clock(without battery)<br>— 1*USB power plug<br>— 1*User manual</p></div></div></li></ul>', 1250, 1050, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:05:32', '2022-02-07 07:05:32'),
(20, 'LSWT', 0, 45, 44, NULL, NULL, 0, 'Leak Stopping Waterproof Tape', 'Leak-Stopping-Waterproof-Tape', 0, '<ul style=\"margin-right: 0px; margin-bottom: 11.5px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Lato;\"><li style=\"list-style-type: none;\"><div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\"><div dir=\"auto\">শখের প্রোডাক্ট গুলোর ব্যাপারে আরো যত্নশীল এবং সচেতন হতে আজকে “Ray-BD” নিয়ে এল এই ‘Leak Stopping Waterproof Tape ‘। হাইলি কোয়ালিটি সম্পন্ন এই প্রোডাক্টটি আমাদের দৈনন্দিন জীবনে ব্যবহৃত জিনিস গুলোকে নষ্ট হতে সব সময় বাঁচিয়ে রাখবে তাই স্টক শেষ হওয়ার পূর্বেই দ্রুত অর্ডার করুন।</div><div dir=\"auto\">Leak Stopping Waterproof Tape</div><div dir=\"auto\">(ডিসক্রিপশন দেখলেই বোঝা যাচ্ছে প্রোডাক্টটি কত কোয়ালিটিফুল এবং ব্যবহারযোগ্য)</div></div><div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\"><div dir=\"auto\">•Help to repair/bond/seal almost any item</div><div dir=\"auto\">•Super strong rubber waterproof tape</div><div dir=\"auto\">•Seal moisture and moistures instantly</div><div dir=\"auto\">•Quickly covers large cracks, gaps and holes</div><div dir=\"auto\">•Can be used in extreme weather conditions</div><div dir=\"auto\">•Color: As shown</div><div dir=\"auto\">•Per Pad Size: 4 x 5 inches</div></div></li></ul>', 790, 390, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:06:18', '2022-02-07 07:06:18'),
(21, 'GFHG', 0, 47, 46, NULL, NULL, 0, 'Ginger Fast Hair Growth Serum', 'Ginger-Fast-Hair-Growth-Serum', 0, '<ul style=\"margin-right: 0px; margin-bottom: 11.5px; margin-left: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Lato;\"><li style=\"list-style-type: none;\">Ginger Fast Hair Growth Serum Essential Oil Anti Preventing Hair Lose Liquid Damaged Hair Repair Growth Hair Care</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Features：</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Ingredients: Ginger, ginseng, polygonum multiflorum, and grape seed oil, those can effectively prevent hair loss by delivering nutrition to hair root, repair damaged hair, restore the vitality of hair Functional: Effectively promote hair growth and care, nourish hair follicles, inhibit greasy hair roots,prevent dryness and strengthen the scalp against external stimuli. With the unique hair conditioning function, it can make your hair thick and shiny Applicable Hair Symptoms: slow hair growth, hair urgent need to grow, inelastic, hair tangled dull, easy to break, rough and unruly, not supple</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Usage: After washing the hair, drop 3-5 drops of product on the hair removal area, massage until absorbed, no need to wash the hair again</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Description：</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Product : HAIR GROWTH Essential Oil</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Capacity: 20ml</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Net weight: 38g</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Gross weight: 40g</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Packing size: 3.3cm*5cm*9.7cm</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Solve problems: hair loss, frizz, split ends, slow growth</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Notes:</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">1.The real color of the item may be slightly different from the pictures shown on website caused by many factors such as brightness of your monitor and light brightness.</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">2. Please allow slight deviation for the measurement data.</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">3.Thanks for your understanding</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">Packing list:</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">1Pcs*Hair growth fluid</li></ul>', 790, 590, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:09:01', '2022-02-07 07:09:01'),
(22, 'MDC', 0, 214, 213, NULL, NULL, 0, 'Magic Drain Cleaner', 'Magic-Drain-Cleaner-1', 0, '<div class=\"\" data-block=\"true\" data-editor=\"9gai5\" data-offset-key=\"437gb-0-0\" style=\"color: rgb(102, 102, 102); font-family: Lato;\"><div class=\"_1mf _1mj\" data-offset-key=\"437gb-0-0\"><p style=\"margin-bottom: 11.5px; line-height: 21px;\">#দুইটি কিনলে (900 টাকা) একটি ফ্রি শুধুমাত্র আজকের জন্য (মোট ৩ পিস পাচ্ছেন)।</p><p style=\"margin-bottom: 11.5px; line-height: 21px;\">আমরা বাংলাদেশের সকল স্থানে হোম ডেলিভারি দিয়ে থাকি।ঢাকার ভিতরে হোম ডেলিভারি 60 টাকা। এবং ঢাকার বাইরে হোম ডেলিভারি 120 টাকা।</p><p style=\"margin-bottom: 11.5px; line-height: 21px;\"><span data-offset-key=\"437gb-0-0\">১) কিচেনে টয়লেটে বেসিনে জমে থাকা অতিরিক্ত তেল চর্বি চুল পরিষ্কার করুন নিমিষেই!</span></p></div></div><div class=\"\" data-block=\"true\" data-editor=\"9gai5\" data-offset-key=\"8dpt4-0-0\" style=\"color: rgb(102, 102, 102); font-family: Lato;\"><div class=\"_1mf _1mj\" data-offset-key=\"8dpt4-0-0\"><span data-offset-key=\"8dpt4-0-0\">২) এ ছাড়া পাইপলাইনে আটকা পড়া কাগজ চুল,যে কোনো ময়লা পরিষ্কার করুন কোন প্লাম্বার মিস্ত্রি ছাড়া!</span></div></div><div class=\"\" data-block=\"true\" data-editor=\"9gai5\" data-offset-key=\"513s3-0-0\" style=\"color: rgb(102, 102, 102); font-family: Lato;\"><div class=\"_1mf _1mj\" data-offset-key=\"513s3-0-0\"><span data-offset-key=\"513s3-0-0\">ব্যবহারের নিয়ম :</span></div></div><div class=\"\" data-block=\"true\" data-editor=\"9gai5\" data-offset-key=\"9jfe0-0-0\" style=\"color: rgb(102, 102, 102); font-family: Lato;\"><div class=\"_1mf _1mj\" data-offset-key=\"9jfe0-0-0\"><span data-offset-key=\"9jfe0-0-0\">৩) দুই চা চামুচ (৫০ মিলি) পরিমান পাউডার ময়লা যুক্ত জায়গা ছিটিয়ে দিন!</span></div></div><div class=\"\" data-block=\"true\" data-editor=\"9gai5\" data-offset-key=\"bvbd2-0-0\" style=\"color: rgb(102, 102, 102); font-family: Lato;\"><div class=\"_1mf _1mj\" data-offset-key=\"bvbd2-0-0\"><span data-offset-key=\"bvbd2-0-0\">১৫ মিনিট পর পানি দিয়ে পরিস্কার করে নিন.</span></div></div><div class=\"\" data-block=\"true\" data-editor=\"9gai5\" data-offset-key=\"1nvqc-0-0\" style=\"color: rgb(102, 102, 102); font-family: Lato;\"><div class=\"_1mf _1mj\" data-offset-key=\"1nvqc-0-0\"><span data-offset-key=\"1nvqc-0-0\"> </span></div></div><div class=\"\" data-block=\"true\" data-editor=\"9gai5\" data-offset-key=\"dqckp-0-0\" style=\"color: rgb(102, 102, 102); font-family: Lato;\"><div class=\"_1mf _1mj\" data-offset-key=\"dqckp-0-0\"><span data-offset-key=\"dqckp-0-0\">বিশেষ সতর্ক:</span></div></div><div class=\"\" data-block=\"true\" data-editor=\"9gai5\" data-offset-key=\"75gm6-0-0\" style=\"color: rgb(102, 102, 102); font-family: Lato;\"><div class=\"_1mf _1mj\" data-offset-key=\"75gm6-0-0\"><span data-offset-key=\"75gm6-0-0\">মুখে ব্যবহার করবেননা! যদি কোনো কারণে মুখে লেগে যায় তা হলে সাথে সাথে ঠান্ডা পানি দিয়ে ধুয়ে ফেলুন</span></div></div><div class=\"\" data-block=\"true\" data-editor=\"9gai5\" data-offset-key=\"bpuk2-0-0\" style=\"color: rgb(102, 102, 102); font-family: Lato;\"><div class=\"_1mf _1mj\" data-offset-key=\"bpuk2-0-0\"><span data-offset-key=\"bpuk2-0-0\">এবং বাচ্চাদের কাছ থেকে দূরে রাখুন</span></div></div><div class=\"\" data-block=\"true\" data-editor=\"9gai5\" data-offset-key=\"66jff-0-0\" style=\"color: rgb(102, 102, 102); font-family: Lato;\"><div class=\"_1mf _1mj\" data-offset-key=\"66jff-0-0\"><span data-offset-key=\"66jff-0-0\">পরিমান : 120ml</span></div></div>', 650, 450, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:10:05', '2022-03-08 20:48:19'),
(23, 'SFMT', 0, 51, 50, NULL, NULL, 0, 'Snow Flake Multi Tool', 'Snow-Flake-Multi-Tool-1', 0, NULL, 490, 490, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:10:58', '2022-02-07 11:22:19'),
(24, 'DMPT', 0, 53, 52, NULL, NULL, 0, 'DMPT Fishing Powder Food 100g', 'DMPT-Fishing-Powder-Food-100g-1', 0, '<div class=\" col-lg-12 col-sm-12 brand product-d\" style=\"padding: 0px; float: left; width: 955px; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><div id=\"my-tab-content\" class=\"tab-content\" style=\"padding-left: 20px; padding-bottom: 20px; border: 1px solid rgb(238, 238, 238);\"><div class=\"tab-pane active\" id=\"course-detail1340\" style=\"padding-top: 20px;\"><div class=\"tab-content panel-body\" style=\"padding: 0px;\"><div class=\"card-header card-warning\" style=\"box-sizing: inherit; padding: 5px; margin-right: 0px; margin-left: 0px; background-color: rgba(0, 0, 0, 0.03); border-bottom-color: rgba(0, 0, 0, 0.125); display: flex; justify-content: space-between; align-items: center; color: rgb(66, 70, 70); font-family: Poppins, sans-serif;\"><h2 class=\"float-left\" style=\"box-sizing: inherit; font-family: inherit; line-height: 1.2; color: inherit; margin-bottom: 0px; font-size: 14px; padding: 0px; transition: all 0.4s ease 0s;\">Discription</h2></div><div class=\"card-body product-gallery\" style=\"box-sizing: inherit; padding: 5px; margin: 0px; color: rgb(66, 70, 70); font-family: Poppins, sans-serif;\"><div class=\"container\" style=\"box-sizing: inherit; padding-top: 0px; padding-bottom: 0px; margin-top: 0px; margin-bottom: 0px; width: 1327px; max-width: 1440px;\"><div class=\"row\" style=\"box-sizing: inherit; margin-top: 0px; margin-bottom: 0px; padding: 0px;\"><div class=\"col-lg-12\" style=\"box-sizing: inherit; padding: 5px; margin: 0px; width: 1327px;\"><p style=\"box-sizing: inherit; margin-bottom: 0px; color: rgb(117, 117, 117); line-height: 24px; padding: 0px;\">বৈশিষ্ট্য: দ্রুত মাছ আকৃষ্ট করে, ব্যাপক এবং শক্তিশালী, অত্যন্ত কার্যকর, দীর্ঘ সময়ের জন্য স্থায়ী হয়। পরিবেশ বান্ধব এবং নিরাপদ, মাছ এবং জলের কোন ক্ষতি নেই। মাছ ধরার টোপ যোগ করে, টোপের আঠালো এবং আকর্ষণ উন্নত করে। গন্ধযুক্ত এবং মাছের কাছে জনপ্রিয় হবে। জলে গলে যাওয়া সহজ এবং সহজে ডিলিকেসেস। vestigital হবে না, মাছ ধরার জন্য চমৎকার.</p><p style=\"box-sizing: inherit; margin-bottom: 0px; color: rgb(117, 117, 117); line-height: 24px; padding: 0px;\"><br style=\"box-sizing: inherit; padding: 0px; margin: 0px;\"></p><p style=\"box-sizing: inherit; margin-bottom: 0px; color: rgb(117, 117, 117); line-height: 24px; padding: 0px;\">উপযুক্ত:</p><p style=\"box-sizing: inherit; margin-bottom: 0px; color: rgb(117, 117, 117); line-height: 24px; padding: 0px;\">মিঠা পানির মাছ: কার্প, ক্রুসিয়ান, ঈল, ক্রিকেট, রেইনবো ট্রাউট, রেইনবো ট্রাউট, তেলাপিয়া ইত্যাদি;</p><p style=\"box-sizing: inherit; margin-bottom: 0px; color: rgb(117, 117, 117); line-height: 24px; padding: 0px;\">সামুদ্রিক মাছ: বড় হলুদ ক্রোকার, সত্যিকারের তেলাপোকা, টার্বোট ইত্যাদি।</p><p style=\"box-sizing: inherit; margin-bottom: 0px; color: rgb(117, 117, 117); line-height: 24px; padding: 0px;\">ক্রাস্টেসিয়ান: চিংড়ি, কাঁকড়া, ইত্যাদি</p><p style=\"box-sizing: inherit; margin-bottom: 0px; color: rgb(117, 117, 117); line-height: 24px; padding: 0px;\"><br style=\"box-sizing: inherit; padding: 0px; margin: 0px;\"></p><p style=\"box-sizing: inherit; margin-bottom: 10px; color: rgb(117, 117, 117); line-height: 24px; padding: 0px;\">ব্যবহার এবং ডোজ: 0.5-1 গ্রাম প্রতি 500 গ্রাম টোপ, যা বসন্ত, গ্রীষ্ম এবং শরত্কালে উচ্চ জলের তাপমাত্রা এবং হালকা হাইপোক্সিয়ার জন্য কার্যকর। কম অক্সিজেন জলে চমৎকার কর্মক্ষমতা, অনেক সঙ্গে</p></div></div></div></div></div></div></div></div><div class=\"panel panel-info \" style=\"border-radius: 4px; margin-bottom: 20px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 1px; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><div class=\"panel-body mobile-padding-zero\" style=\"padding: 10px 0px;\"><div class=\"col-lg-12 col-md-12 col-sm-12 \" id=\"Product_AjaxRelated\" style=\"padding: 0px; float: left; width: 955px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin-bottom: 20px; border-right: 0px; border-bottom: 0px;\"><h4 class=\"modal-title\" id=\"gridSystemModalLabel\" style=\"font-family: inherit; font-weight: bold; line-height: 1.4; color: rgb(49, 49, 49); margin-bottom: 1.25em; font-size: 1.1429em; padding-top: 1.25em;\">রিলেটেড প্রোডাক্ট</h4></div></div></div>', 790, 790, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:12:09', '2022-02-07 11:22:39'),
(25, 'TCCBFP', 0, 55, 54, NULL, NULL, 0, 'Travel Casual Chest Bag for phone-wallet', 'Travel-Casual-Chest-Bag-for-phone-wallet-1', 0, NULL, 890, 890, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:13:14', '2022-02-07 11:21:58'),
(26, 'EFERO', 0, 57, 56, NULL, NULL, 0, 'Nail Repair and Fungus Treatment Solution', 'Nail-Repair-and-Fungus-Treatment-Solution', 0, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 23px 1em; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; list-style-position: initial; list-style-image: initial; line-height: 26px; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">Lanbena একটি বিখ্যাত স্কিন কেয়ার ব্রান্ড</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">এক নজরে Nail Repair Essence এর কাজ</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">নখের ফাটা এবং অপুস্টিজনিত যেসব কালো দাগ পড়ে দূর করে</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">ফাঙ্গাল এর কারনে নখের আগা ফেটে যাওয়া এবং নখ সম্পুর্ন বড় না হওয়া জনিত সমস্যার সমাধান করে</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">নখ সুন্দর , বড় করে তোলে, নখের উজ্জলতা বৃদ্ধি করে</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">এর পাশা পাশি পায়ের গোড়ালি এর ফাটা অংশে ব্যবহারেও সেখানের ত্বক কোমল এবং মসৃন হয়।<br>ব্যাবহারঃ</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">&nbsp;ব্যাবহারের কিছুক্ষন আগে হালকা গরম পানি দিয়ে নখ ভিজিয়ে নিন।</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">এর পর পরিস্কার কোন কিছু নিয়ে নখের ভেতরে যদি কোন ময়লা থাকে তা পরিস্কার করে নিন</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">এর পর ২/৩ ফোটা Nail Repair Essence দিনে দুইবার করে দিবেন নখের আক্রান্ত অংশে (সকালে এবং রাতে)</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">Weight: 15 ml</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; text-size-adjust: 100%; vertical-align: baseline; background: transparent;\">Made in china</li></ul>', 790, 590, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:14:21', '2022-02-07 07:14:21'),
(27, 'PG', 0, 59, 58, NULL, NULL, 0, 'পোর্টেবল গিজার', 'পোর্টেবল-গিজার', 0, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><li style=\"list-style-type: none;\">Super Instant, Shock proof</li><li style=\"list-style-type: none;\">Durable, Rustproof</li><li style=\"list-style-type: none;\">Economical, Automatic</li><li style=\"list-style-type: none;\">Installation : wall Mounted</li><li style=\"list-style-type: none;\">Guarantee:&nbsp; 1 Year</li></ul><p><span style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Note: -</span><span style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Wring 16amp plug point for the Geyser should be fixed separately with 3/20 gauge copper wiring and proper Earthing Earthing Is essential.</span></p><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><li style=\"list-style-type: none;\">Once the cold water starts coming out of the outlet, please switch On the electricity Supply</li><li style=\"list-style-type: none;\">Do Not Run Dry it will get damaged and warranty will be voided</li></ul>', 2690, 1690, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:18:27', '2022-02-07 07:18:27'),
(28, 'PSM', 0, 61, 60, NULL, NULL, 0, 'Portable Mini Sewing Machine', 'Portable-Mini-Sewing-Machine', 0, NULL, 1550, 1150, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:19:28', '2022-02-07 07:19:28'),
(29, 'PPT', 0, 63, 62, NULL, NULL, 0, 'Painting Projection Table', 'Painting-Projection-Table', 0, '<p style=\"box-sizing: inherit; margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 24px; padding: 0px; font-family: &quot;Work Sans&quot;, sans-serif;\">Description:</p><p style=\"box-sizing: inherit; margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 24px; padding: 0px; font-family: &quot;Work Sans&quot;, sans-serif;\">&nbsp;Furiously cultivate children\'s drawing skills. Early learning toys for boys and girls. Conducive to the development of children. Safe and non-toxic materials Create a precedent for children\'s education Teach children in a creative and fun way Encourage children to create amazing creativity&nbsp;</p><p style=\"box-sizing: inherit; margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 24px; padding: 0px; font-family: &quot;Work Sans&quot;, sans-serif;\">specification:&nbsp;</p><p style=\"box-sizing: inherit; margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 24px; padding: 0px; font-family: &quot;Work Sans&quot;, sans-serif;\">Dimensions: 25 x 34.5 x 21 cm Material: ABS Package Size: 38 x 9 x 26 cm Package content: 1x toy package</p>', 1550, 1050, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:20:36', '2022-02-07 07:20:36'),
(30, 'GMT', 0, 65, 64, NULL, NULL, 0, 'Green Mask Tea', 'Green-Mask-Tea', 0, '<p><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">বয়সে\'\'র ছাপ, চামড়া ভাজ, #চো\'\'খের ডা\'র্ক সার্কেল দূর করুন ন্যাচারাল গ্রীন মা\'-স্ক ব্যবহার করে।</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">- এটা সম্পূর্ণ পার্শ্ব প্রতিক্রিয়া মুক্ত।</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">- হয়ে উঠুন আরও বেশি লাবণ্যময়ী???? ও আত্মবিশ্বাসী।</span><br style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\"><span style=\"color: rgba(0, 0, 0, 0.85); font-family: Roboto, Arial, sans-serif; font-size: 12px;\">- ত্বককে করে সতেজ এবং আরো প্রানবন্ত।</span><br></p>', 890, 590, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:21:36', '2022-02-07 07:21:36'),
(31, 'BB', 0, 67, 66, NULL, NULL, 0, 'Baby Bouncer', 'Baby-Bouncer', 0, NULL, 1590, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:22:37', '2022-02-07 07:22:37'),
(32, 'WT', 0, 69, 68, NULL, NULL, 0, '8.5\' LCD Writing Tablet for Kids', '8.5\'-LCD-Writing-Tablet-for-Kids', 0, NULL, 790, 490, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:23:29', '2022-02-07 07:23:29'),
(33, 'ADC', 0, 71, 70, NULL, NULL, 0, 'Automatic Door Closer', 'Automatic-Door-Closer', 0, NULL, 650, 490, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:47:51', '2022-02-07 07:47:51'),
(34, 'FTD', 0, 73, 72, NULL, NULL, 0, 'Foil and Tissue Roll Dispenser ( TPD-03)', 'Foil-and-Tissue-Roll-Dispenser-(-TPD-03)', 0, NULL, 1250, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:48:41', '2022-02-07 07:48:41'),
(35, 'CT', 0, 75, 74, NULL, NULL, 0, 'CACTUS TOYS', 'CACTUS-TOYS', 0, '<p style=\"margin: 4px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\"><span style=\"font-size: 14px;\">1.বাচ্চাদের হাসি খুশি রাখবে&nbsp;</span></p><p style=\"margin: 4px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\"><span style=\"font-size: 14px;\">২.খেলনাটি রিচার্জেবল&nbsp;</span><br></p><p style=\"margin: 4px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\"><span style=\"font-size: 14px;\">৩.বাচ্চাদের সাথে কথা বলবে হাসবে&nbsp;</span></p>', 1250, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:49:55', '2022-02-07 07:49:55'),
(36, 'WMT', 0, 77, 76, NULL, NULL, 0, 'ফ্রিজ ওয়াশিং মেশিন মুভিং স্ট্যান্ড BIG SIZE', 'ফ্রিজ-ওয়াশিং-মেশিন-মুভিং-স্ট্যান্ড-BIG-SIZE', 0, '<p><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">Handy pallet is easy to navigate with 360 degrees rotating wheels</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">No more struggling and backaches. Rearrange bulky furniture with ease or move heavy objects effortlessly with the Handy Pallet</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">Max Weight 130KG</span><br style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\"><span style=\"color: rgb(102, 102, 102); font-size: 13px; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">Max Size: 54cm x 54cm</span><br></p>', 1550, 1250, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:57:57', '2022-02-07 07:57:57'),
(37, '3LDR', 0, 79, 78, NULL, NULL, 0, '3 LAYER DISH RACK', '3-LAYER-DISH-RACK', 0, '<p style=\"box-sizing: inherit; margin: 4px auto 1.25em; font-size: 21px; color: rgb(102, 102, 102); line-height: 1.476; -webkit-font-smoothing: antialiased; word-break: break-word; overflow-wrap: break-word; border: none; padding: 0px; max-width: 100vw; width: 1185.09px; font-family: NonBreakingSpaceOverride, &quot;Hoefler Text&quot;, Garamond, &quot;Times New Roman&quot;, serif;\">1. খুব সহজে আপনার রান্না ঘর সাজিয়ে রাখতে পারবেন</p><p style=\"box-sizing: inherit; margin: 4px auto 1.25em; font-size: 21px; color: rgb(102, 102, 102); line-height: 1.476; -webkit-font-smoothing: antialiased; word-break: break-word; overflow-wrap: break-word; border: none; padding: 0px; max-width: 100vw; width: 1185.09px; font-family: NonBreakingSpaceOverride, &quot;Hoefler Text&quot;, Garamond, &quot;Times New Roman&quot;, serif;\">2.সহজে মরিচা ধরবেন না</p><p style=\"box-sizing: inherit; margin: 4px auto; font-size: 21px; color: rgb(102, 102, 102); line-height: 1.476; -webkit-font-smoothing: antialiased; word-break: break-word; overflow-wrap: break-word; border: none; padding: 0px; max-width: 100vw; width: 1185.09px; font-family: NonBreakingSpaceOverride, &quot;Hoefler Text&quot;, Garamond, &quot;Times New Roman&quot;, serif;\">3.৬-৭ বছর ব্যবহার করতে পারবেন</p>', 1550, 1090, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:59:02', '2022-02-07 07:59:02'),
(38, '2LDR', 0, 81, 80, NULL, NULL, 0, '2 LAYER DISH RACK', '2-LAYER-DISH-RACK', 0, '<p style=\"box-sizing: inherit; margin: 4px auto 1.25em; font-size: 21px; color: rgb(102, 102, 102); line-height: 1.476; -webkit-font-smoothing: antialiased; word-break: break-word; overflow-wrap: break-word; border: none; padding: 0px; max-width: 100vw; width: 1185.09px; font-family: NonBreakingSpaceOverride, &quot;Hoefler Text&quot;, Garamond, &quot;Times New Roman&quot;, serif;\">1. খুব সহজে আপনার রান্না ঘর সাজিয়ে রাখতে পারবেন</p><p style=\"box-sizing: inherit; margin: 4px auto 1.25em; font-size: 21px; color: rgb(102, 102, 102); line-height: 1.476; -webkit-font-smoothing: antialiased; word-break: break-word; overflow-wrap: break-word; border: none; padding: 0px; max-width: 100vw; width: 1185.09px; font-family: NonBreakingSpaceOverride, &quot;Hoefler Text&quot;, Garamond, &quot;Times New Roman&quot;, serif;\">2.সহজে মরিচা ধরবেন না</p><p style=\"box-sizing: inherit; margin: 4px auto; font-size: 21px; color: rgb(102, 102, 102); line-height: 1.476; -webkit-font-smoothing: antialiased; word-break: break-word; overflow-wrap: break-word; border: none; padding: 0px; max-width: 100vw; width: 1185.09px; font-family: NonBreakingSpaceOverride, &quot;Hoefler Text&quot;, Garamond, &quot;Times New Roman&quot;, serif;\">3.৬-৭ বছর ব্যবহার করতে পারবেন</p>', 1250, 890, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 07:59:45', '2022-02-07 07:59:45'),
(39, 'DPCR', 0, 83, 82, NULL, NULL, 0, 'DOUBLE POLE CLOTH RACK', 'DOUBLE-POLE-CLOTH-RACK', 0, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 0px 30px; color: rgb(51, 51, 51); -webkit-tap-highlight-color: rgba(0, 0, 0, 0); list-style-position: initial; list-style-image: initial; font-family: Arial, Helvetica, sans-serif; font-size: 13px; letter-spacing: 0.007px;\"><li style=\"list-style-type: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px; padding: 2px 0px; list-style-position: initial; list-style-image: initial;\">Product Types: Cloth Rack</li><li style=\"list-style-type: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px; padding: 2px 0px; list-style-position: initial; list-style-image: initial;\">Heavy Duty Straight Clothes Rack</li><li style=\"list-style-type: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px; padding: 2px 0px; list-style-position: initial; list-style-image: initial;\">The classic straight shop/store room portable clothing garment rack.</li><li style=\"list-style-type: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px; padding: 2px 0px; list-style-position: initial; list-style-image: initial;\">These clothes hanger rack is truly industrial strength, mobile and of exceptionally strong.</li><li style=\"list-style-type: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px; padding: 2px 0px; list-style-position: initial; list-style-image: initial;\">Could be used as laundry clothes rack for drying, storage, and transportation of clothes.</li><li style=\"list-style-type: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px; padding: 2px 0px; list-style-position: initial; list-style-image: initial;\">The perfect solution for a fashion show and Exhibition</li></ul>', 1650, 1250, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 08:00:39', '2022-02-07 08:00:39'),
(40, 'NESG', 0, 85, 84, NULL, NULL, 0, 'Nima Electric Spice Grinder', 'Nima-Electric-Spice-Grinder', 0, '<p style=\"margin: 4px 4px 0px; font-size: 13px; color: rgb(102, 102, 102); line-height: 21px; font-family: &quot;Work Sans&quot;, Arial, sans-serif;\"><b style=\"font-weight: bold;\">===============</b></p><ol style=\"margin-bottom: 10px; padding-left: 20px; color: rgb(102, 102, 102); font-family: &quot;Work Sans&quot;, Arial, sans-serif;\"><li style=\"list-style-type: none; margin-bottom: 7px;\">It has Stainless Steel Bowl to mill coffee, cardamom, nuts ‍and spices.</li><li style=\"list-style-type: none; margin-bottom: 7px;\">It is durable and elegant with all stainless steel exterior.</li><li style=\"list-style-type: none; margin-bottom: 7px;\">&nbsp;&nbsp;&nbsp;&nbsp;Capacity: &nbsp;50 – 100gm</li><li style=\"list-style-type: none; margin-bottom: 7px;\">&nbsp;&nbsp;&nbsp;&nbsp;Spice grinder has a powerful 150W motor that gives sufficient speed to mills in a very short time</li><li style=\"list-style-type: none; margin-bottom: 7px;\">&nbsp;&nbsp;&nbsp;&nbsp;The button is positioned so as to be operated with ease</li><li style=\"list-style-type: none; margin-bottom: 7px;\">&nbsp;&nbsp;&nbsp;&nbsp;The cover is made of transparent plastic to be permanently visible in the drum mill</li><li style=\"list-style-type: none; margin-bottom: 7px;\">&nbsp;&nbsp;&nbsp;&nbsp;The blades are stainless steel, which gives an efficiency for a long time.</li><li style=\"list-style-type: none; margin-bottom: 7px;\">&nbsp;&nbsp;&nbsp;&nbsp;Power: &nbsp;200W, 220-240V</li><li style=\"list-style-type: none; margin-bottom: 7px;\">&nbsp;&nbsp;&nbsp;&nbsp;Dimensions: 17 x 10 cm</li><li style=\"list-style-type: none; margin-bottom: 7px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Color: Silver</li></ol>', 990, 690, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 08:01:35', '2022-02-07 08:01:35'),
(41, 'BT', 0, 87, 86, NULL, NULL, 0, 'Body Trimmer', 'Body-Trimmer', 0, '<li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">একের ভিতর সব।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">একটি মাত্র যন্ত্র দিয়ে সব ব্যায়াম চালিয়ে যাবেন নিজের বাসায়।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">এটি দিয়ে ঘরে বসেই বিভিন্ন ধরণের ব্যায়াম করতে পারবেন।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">ঝটপট আপনার শরীরের অতিরিক্ত চর্বি কমাবে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">মাত্র ১০ দিনেই আপনার শরীরকে ফিট ও আকর্ষণীয় করে তুলবে ।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">ভারী জিনিস দিয়ে যারা ব্যায়াম করতে ভয়পান তাদের জন্য এটাই যথেষ্ট ।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">ছেলে ও মেয়ে উভয়ই ব্যবহার করতে পারবেন।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যারা জিম এ গিয়ে ব্যায়াম করার কথা ভাবছেন তাদের জন্য আমরা নিয়ে এসেছি এই পন্যটি।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">খুব সহজেই আপনি বাসায় বসে ব্যায়াম করতে পারবেন।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">একের ভিতর সব।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">একটি মাত্র যন্ত্র দিয়ে সব ব্যায়াম চালিয়ে যাবেন নিজের বাসায়।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">প্রোডাক্ট এর রাবার ছিড়ে গেলে রিপ্লেসমেন্ট পাবেন না।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background: url(&quot;../../image/right-arrow.png&quot;) no-repeat; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">এক সাথে ২ টি বডি ট্রিমার অর্ডার করলেই পাচ্ছেন ডেলিভারি চার্জ ফ্রি</li>', 790, 490, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 08:02:35', '2022-02-07 08:02:35'),
(42, 'P360', 0, 89, 88, NULL, NULL, 0, 'Portable 360 degree rotation Mobile Stand', 'Portable-360-degree-rotation-Mobile-Stand', 0, '<p><span style=\"color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">Mobile Stand for Table Height Adjustable Phone Stand Desktop Mobile Phone Holder Stand 360 Rotate for Onilne Classes Live Streaming Shoot Video YouTube Round Base</span><br style=\"color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">【360 Degree Adjustable】：The cell phone holder can be adjustable with 360 degree. Very convenient whirling to any angle to catch the accurate postion. Compact and lightweight construction built conveniently fold for storage and easy transport.</span><br style=\"color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">【Height Adjustable】: The compact tabletop microphone stand smoothly quick and easy, raise or lower height adjustment from 10.6’’ to 13.8’’ inch high. It also has a built in reliable tightening clamp for safety measure to avoid slip off.</span><br style=\"color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">&nbsp;【Solid Round Base Plate】:Solid round rugged base plate with non-slip rubber,will provide stability and precise balance to avoid it from collapsing. The lock knob of our tabletop microphoe comes with a screw-in style stand which is quite tight and safe, ensuring that its height remains the same without sliding</span><br style=\"color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">&nbsp;【Stable Phone stand】 This desktop cell phone holder, which can keep your hands free and have a steady video recording without trills when doing recording or living broadcasting. The inner diameter is 5.7cm, one of the side can be prolong to 9cm maximum. It is suitable for the width of smartphone between 5.7cm-9cm.</span><br style=\"color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\"><span style=\"color: rgb(119, 119, 119); font-family: Inter, Arial, Helvetica, sans-serif;\">【QUALITY GUARANTEE】 Best quality. Our Brand is dedicated to provide high standard</span><br></p>', 450, 290, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 08:03:39', '2022-02-07 08:03:39'),
(43, 'SAL', 0, 91, 90, NULL, NULL, 0, 'Smart Alarm Lock', 'Smart-Alarm-Lock-1', 0, NULL, 790, 590, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-07 11:21:31', '2022-02-07 11:23:06');
INSERT INTO `products` (`id`, `sku`, `position`, `thumb`, `image`, `gallery_images`, `video_url`, `has_variant`, `name`, `slug`, `stock`, `description`, `price`, `sale_price`, `is_featured`, `is_best_sell`, `is_new_product`, `status`, `is_free_delivery`, `delivery_charge`, `purchase_cost`, `brand_name`, `fb_description`, `created_at`, `updated_at`) VALUES
(44, 'BR-001', 0, 93, 92, NULL, NULL, 0, 'Blackheads Remover', 'Blackheads-Remover', 0, '<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><div dir=\"auto\">কার্যকারিতাঃ</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><div dir=\"auto\">1. ব্ল্যাকহেড ধূর করে, মুখ গভীর থেকে পরিস্কার করে ।</div><div dir=\"auto\">2. একনি প্রবলেম এর জন্য, পিম্পল স্কিন ট্রিটমেন্ট ।</div><div dir=\"auto\">3. কুঁচকে যাওয়া ত্বক রিমুভ করে এবং কুঁচকে যাওয়া ত্বকের জন্য ভালো একটি ট্রিট্মেন্ট,</div><div dir=\"auto\">&nbsp; &nbsp; ত্বককে করে সতেজ এবং আরো প্রানবন্ত।</div><div dir=\"auto\">4. নিস্তেজ ত্বকের জন্য এবং ত্বকের দাগ ধূর করে, ত্বকের হাইপারপিগমেন্টটিও হ্রাস করে।</div><div dir=\"auto\"><div dir=\"auto\">&nbsp;</div><div dir=\"auto\">এটা use করার আগে Face ভেজা ভেজা করে নিতে হবে । মুখের blackheads and whiteheads দূর করবে । ব্রণ এর ভিতর থেকে ময়লা টা পরিষ্কার করবে । স্কিন কে ফুল ক্লিন করবে।</div></div></div>', 1550, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 09:48:28', '2022-02-08 09:48:28'),
(45, 'KDFP', 0, 95, 94, NULL, NULL, 0, 'Kinoki Detox Foot Pads', 'Kinoki-Detox-Foot-Pads', 0, '<li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">KINOKI কাদের জন্য ব্যবহার করা দরকার ?</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">ধূমপায়ীদের জন্য যারা শরীর থেকে নিকোটিন দূর করে সুস্থ থাকতে চান।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যারা ব্রন ও একজিমা তে আক্রান্ত।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যারা জন্ডিসে আক্রান্ত।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যারা ডায়াবেটিস নিয়ন্ত্রনে রাখতে চান।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যারা Acne and Pimple এর টক্সিন বের করে ফেয়ারনেস বৃদ্ধি করতে চান।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যারা সাইনাস ও মাথা ব্যাথায় আক্রান্ত</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">দূর্বল লোকদের জন্য,যারা দ্রুত ক্লান্ত হয়ে যায়।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যারা শরীরের ভিতরের বিষাক্ত টক্সিন দূর করতে চান।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যাদের জয়েন্টগুলোতে ব্যাথা,ঘাড় এবং ব্যাক পেইন আছে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যারা ধুলাবালিতে কঠোর পরিশ্রম করেন।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যাদের মানসিক চিন্তার কারনে ঘুম কম হয়।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যাদের শারিরীক যন্ত্রনায় ঘুম কম হয়।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যারা স্বাস্থ্য সম্পর্কে সচেতন।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">বৃদ্ধ এবং অসুস্থ যারা।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যারা রাস্তায় চলাফেরা করে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">যারা শরীরে বিষাক্ত টক্সিন আছে কিনা যাচাই করতে চান।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">হরমন জনিত সমস্যা দূর করে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">স্বাস্থ সচেতন সকলের জন্য kinoki Detox Pads আবশ্যক ।</li><p style=\"margin: inherit; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\"><span style=\"color: rgb(51, 51, 51);\">উপকারিতাঃ</span></p><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">KINOKI ব্যবহারে বাতের ব্যাথা, হাটু ব্যথা, কোমর ব্যথা এবং মাংসপেশীর ব্যথা কমিয়ে শরীরকে ঝরঝরে করে তুলে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">শরীরের মধ্যে অতিরিক্ত চর্বি জাতীয় পর্দাথ শোষন করে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">রক্তের কোলেষ্টরেল কমাতে সাহায্য করে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">ব্লাড প্রেসার নিয়ন্ত্রনে রাখে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">চামড়ার কালো দাগ ও কুচকানো রোধ করে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">এ্যাজমা ও ব্রংকাইটিসে বিশেষ উপকারী।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">ডায়াবেটিস নিয়ন্ত্রনে রাখে ।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">সাইনাসের সমস্যা দূর করে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">কঠিন ব্যক্তেরিয়া ও ভয়ানক আই ভাইরাস কে তরল আকারে বের করে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">রক্ত পরিষ্কার ও রক্ত প্রবাহ রাড়িয়ে দেয়।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">পরিপাক যন্ত্রের কার্যকারীতা বাড়িয়ে দেয়।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">শরীর থেকে বিষাক্ত নিকোটিন বের করে ।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">ঘামের দূগর্ন্ধ ও পায়ের মোজার দূগর্ন্ধ দূর করে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">তাই KINOKI ব্যবহার করুন সুস্থ সবল জীবন গড়ুন।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">KINOKI ব্যবহার বিধিঃ</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">KINOKI ডিটক্স প্যাড রাতে ঘুমানোর পূর্বে পায়ের তলায় ব্যবহার করতে হবে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">৭-৮ঘন্টা ব্যবহারের পর সকালে খুলে ফেলতে হবে।</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">এক প্যাকেটে ১০টি প্যাড থাকে, ৫ দিন ব্যবহার করা যাবে</li><li style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif; background-image: url(&quot;../../image/right-arrow.png&quot;); background-position: initial; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial; padding-left: 25px; margin-bottom: 10px; font-size: 16px; list-style-type: none !important;\">ভালো ফলাফলের জন্য ৬ প্যাকেট ৩০দিন ব্যবহার করতে হবে</li>', 690, 350, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 09:49:47', '2022-02-08 09:49:47'),
(46, 'SD-001', 0, 97, 96, NULL, NULL, 0, 'সিম ডিভাইস', 'সিম-ডিভাইস', 0, '<p style=\"margin-top: inherit; margin-bottom: 1.41575em; font-size: medium; color: rgb(109, 109, 109); line-height: 21px; font-family: &quot;Source Sans Pro&quot;, HelveticaNeue-Light, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;\">যেকোনো সিম কার্ড যুক্ত করে অ্যাকটিভ করুন, এর জন্য ইন্টারনেট সংযোগের প্রয়োজন নেই।<br><span class=\"_5mfr\">✔</span>&nbsp;ডিভাইসটির ভিতর আপনার পছন্দ মতো সিম ঢুকিয়ে কোন গোপন জায়গায় রেখে দিবেন,তারপর আপনার এই সিম নম্বরে আপনি পৃথিবীর যে কোন জায়গা থেকে কল দিন। এই ডিভাইসটি আপনার কল অটো রিসিভ করবে। কোন প্রকার ভাইব্রেশ্ন হবেনা, এমনকি কোন লাইট জলবে না। সেই জায়গার ২০ মিটারের মধ্যে যে বা যারা কথা বলবে তা আপনি শুনতে পারবেন, কেউ টেরই পাবে না আপনি শুনছেন।<br><span class=\"_5mfr\">✔</span>&nbsp;এই ডিভাইসটি দিয়ে জেনে নিন আপনার গাড়িটি কোথায় আছে। ব্যবহার করতে পারেন কার, মাইক্রোবাস, সিএনজি, মোটরবাইক, ট্রাক ইত্যাদিতে, চালক আর আপনাকে ফাঁকি দিতে পারবেনা। হারিয়ে বা চুরি হলেও জানতে পারবেন গাড়ির অবস্থান। এটা আপনি আপনার সন্তানের ব্যাগেও ভরে রাখতে পারেন।<br><span class=\"_5mfr\">✔</span>&nbsp;অবস্থান দেখার জন্য মোবাইল ফোন থেকে ” DW” লিখে SMS করতে হবে এই যন্ত্রে রাখা সিমে।<br>ফিরতি SMS এ Google Map এর একটি লিংক আসবে। এবার মোবাইলে ইন্টারনেট সংযোগ সচল করুন এবং লিংকে যান।–লিংকে Google Map এর মতই আসবে অবস্থান। এভাবেই জানতে পারবেন আপনার গাড়ি বা যেকোন পরিবহন কোথায় আছে।</p><p style=\"margin-top: inherit; margin-bottom: 1.41575em; font-size: medium; color: rgb(109, 109, 109); line-height: 21px; font-family: &quot;Source Sans Pro&quot;, HelveticaNeue-Light, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;\">স্ট্যান্ডবাই&nbsp;টাইমঃ&nbsp;৩&nbsp;দিন</p>', 1450, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 09:50:40', '2022-02-08 09:50:40'),
(47, 'RBM', 0, 99, 98, NULL, NULL, 0, 'Relax & Spin Tone Slimming Toning & Relaxing Body Massager', 'Relax-&-Spin-Tone-Slimming-Toning-&-Relaxing-Body-Massager', 0, '<ul class=\"\" style=\"margin-right: 0px; margin-bottom: 1.41575em; margin-left: 3em; padding: 0px; list-style-position: initial; list-style-image: initial; color: rgb(109, 109, 109); font-family: &quot;Source Sans Pro&quot;, HelveticaNeue-Light, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: medium;\"><li class=\"\" style=\"list-style-type: none;\">Suitable for use on all body parts</li><li class=\"\" style=\"list-style-type: none;\">Light, handy and convenient</li><li class=\"\" style=\"list-style-type: none;\">Streamlined design, aesthetic outer design</li><li class=\"\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i0.e360713ebvwSML\" style=\"list-style-type: none;\">Easy to use, helps relieve pain and relax muscles while having a slimming effect at the same time</li><li class=\"\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i1.e360713ebvwSML\" style=\"list-style-type: none;\">Multipurpose handheld massager comes with exchangeable heads: Wavy Attachment</li><li class=\"\" style=\"list-style-type: none;\">Mesh Cover Attachment</li><li class=\"\" style=\"list-style-type: none;\">Flat Attachment</li><li class=\"\" style=\"list-style-type: none;\">Micro Filler Attachment</li><li class=\"\" style=\"list-style-type: none;\">Roller Attachment</li></ul><ul style=\"margin-right: 0px; margin-bottom: 1.41575em; margin-left: 3em; padding: 0px; list-style-position: initial; list-style-image: initial; color: rgb(109, 109, 109); font-family: &quot;Source Sans Pro&quot;, HelveticaNeue-Light, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: medium;\"><li style=\"list-style-type: none;\">High-frequency vibration dislodges fats, resulting in decomposition of fats and achieving fat reduction</li><li style=\"list-style-type: none;\"><span data-spm-anchor-id=\"a2a0e.pdp.product_detail.i4.e360713ebvwSML\">Length of wire: 145cm</span></li><li style=\"list-style-type: none;\">Machine dimension: 17cm x 11cm x 14cm</li><li style=\"list-style-type: none;\">Input voltage: 110V/220V, 50Hz</li><li style=\"list-style-type: none;\">Maximum watt: 25W</li><li style=\"list-style-type: none;\">Speed: 2500 RPM</li><li style=\"list-style-type: none;\">Material:ABS/PVC</li><li style=\"list-style-type: none;\">360 Degree off-centered axis design</li></ul>', 1550, 1250, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 09:51:37', '2022-02-08 09:51:37'),
(48, 'CB-001', 0, 101, 100, NULL, NULL, 0, 'Crossbody Bags', 'Crossbody-Bags', 0, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 12px; line-height: inherit; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-senif, SimSun, 宋体; vertical-align: baseline; list-style-position: initial; list-style-image: initial;\"><li style=\"list-style: none; margin: 0px 0px 0px 30px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><p align=\"left\" style=\"margin: 10px; font: inherit; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline;\"><span data-spm-anchor-id=\"2114.12057483.0.i5.575f1866hfw3kl\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 11pt; line-height: inherit; font-family: Arial; vertical-align: baseline;\">Gender:Men</span></p></li><li style=\"list-style: none; margin: 0px 0px 0px 30px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><p align=\"left\" style=\"margin: 10px; font: inherit; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 11pt; line-height: inherit; font-family: Arial; vertical-align: baseline;\">Material:PU&nbsp;</span><span id=\"result_box\" class=\"short_text\" lang=\"en\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><span class=\"\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Leather</span></span></p></li><li style=\"list-style: none; margin: 0px 0px 0px 30px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><p align=\"left\" style=\"margin: 10px; font: inherit; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 11pt; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Pattern type:</span><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 11pt; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">Solid</span></p><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: x-small; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\"></span></li><li style=\"list-style: none; margin: 0px 0px 0px 30px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><p align=\"left\" style=\"margin: 10px; font: inherit; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 11pt; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Item type:Shoulder Bag</span></p></li><li style=\"list-style: none; margin: 0px 0px 0px 30px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><p align=\"left\" style=\"margin: 10px; font: inherit; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 11pt; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Closure type:</span><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 11pt; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">Zipper</span></p></li><li style=\"list-style: none; margin: 0px 0px 0px 30px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><p align=\"left\" style=\"margin: 10px; font: inherit; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 11pt; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Size:</span><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 11pt; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">33x16x8cm</span></p></li><li style=\"list-style: none; margin: 0px 0px 0px 30px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><p align=\"left\" data-spm-anchor-id=\"2114.12057483.0.i4.575f1866hfw3kl\" style=\"margin: 10px; font: inherit; color: rgb(102, 102, 102); padding: 0px; border: 0px; vertical-align: baseline;\"><span class=\"propery-des\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 11pt; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Style:Fashion</span></span></p></li></ul>', 1290, 690, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 09:52:38', '2022-02-08 09:52:38'),
(49, 'FSTT', 0, 103, 102, NULL, NULL, 0, 'Five Spring Tummy Trimmer', 'Five-Spring-Tummy-Trimmer', 0, '<p><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Functions:</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">ABS engineering plastic carbon spring steel wire tension is full and thick buckle.</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Specification:</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Material: ABS Engineering Plastic Carbon Spring</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Color: Black Red</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Product Dimensions: (Dual-purpose tensioner) 650*110*30mm/25.6*4.3*1.2in, (Triple-purpose tensioner) 680*340*30mm/26.8*13.4*1.2in</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Net weight: (Dual-purpose tensioner) 760g, (Triple-purpose tensioner) 1100g</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Gross weight: (Dual-purpose tensioner) 760g, (Three-purpose tensioner) 1100g</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Scope of application: Fitness</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Usage: Mainly train the muscles of the upper body and forechest.</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Main efficacy: Exercise arm strength/grip strength/waist strength.</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Notes:</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">1. Please allow 1-3cm measuring deviation due to manual measurement.</span><br style=\"padding: 0px; margin: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">2. Due to the different monitor and light effect, the actual color of the item might be slightly different from the color showed on the pictures. Thank you!&nbsp;</span><br></p>', 1550, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 09:53:57', '2022-02-08 09:53:57'),
(50, 'CHMP', 0, 105, 104, NULL, NULL, 0, 'Car & Home Massage Pillow', 'Car-&-Home-Massage-Pillow', 0, '<div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\">Car &amp; Home Massage Pillow</div><div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"vertical-align: top; max-width: 100%; height: auto; border: 0px;\">&nbsp;বডি ম্যাসেজ পিলো</div><div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"vertical-align: top; max-width: 100%; height: auto; border: 0px;\">আপনার শরীরের যে কোন জায়গায় ম্যাসেজ করতে পারবেন</div><div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"vertical-align: top; max-width: 100%; height: auto; border: 0px;\">&nbsp;ব্যাকপেইন এর বেথায় সহজেই নিজে নিজেই ম্যাসেজ করতে পারবেন</div><div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"vertical-align: top; max-width: 100%; height: auto; border: 0px;\">&nbsp;খুব অল্প সময়েই ব্যথা উপশম, পেশী ক্লান্তি দূর করার জন্য সহায়ক</div><div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"vertical-align: top; max-width: 100%; height: auto; border: 0px;\">&nbsp;চেয়ার এর সাথে লাগিয়ে সহজেই ঘাড় এর ম্যাসেজ করতে পারবেন</div><div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"vertical-align: top; max-width: 100%; height: auto; border: 0px;\">&nbsp;হাত , পা, পেট অর্থাৎ আপনার যেখানে ইচ্ছা নিজে নিজেই ম্যাসেজ করতে পারবেন</div><div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"vertical-align: top; max-width: 100%; height: auto; border: 0px;\">&nbsp;নিজে নিজেই ম্যাসেজ এর মাধ্যমে শরীরের অলসতা দূর করতে পারবেন</div><div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"vertical-align: top; max-width: 100%; height: auto; border: 0px;\">&nbsp;গাড়ী তে ব্যবহার এর জন্য ব্যাটারি জ্যাক দেয়া আছে</div><div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"vertical-align: top; max-width: 100%; height: auto; border: 0px;\">&nbsp;গাড়ি এর সিট এর সাথে সহজেই লাগাতে পারবেন</div><div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"vertical-align: top; max-width: 100%; height: auto; border: 0px;\">&nbsp;সহজে বহন যোগ্য</div><div class=\"product-details-text\" style=\"color: rgb(119, 119, 119); font-family: Roboto;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"vertical-align: top; max-width: 100%; height: auto; border: 0px;\">এটি সম্পুর্ন এক্সটারনাল তাই কোন পার্শপ্রতিক্রিয়া নেই</div>', 1550, 1290, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 09:54:52', '2022-02-08 09:54:52'),
(51, 'KSA', 0, 107, 106, NULL, NULL, 0, 'Kitchen Shelf Aluminium', 'Kitchen-Shelf-Aluminium', 0, '<ul class=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; overflow: hidden; columns: auto 2; column-gap: 32px; font-family: Roboto, -apple-system, BlinkMacSystemFont, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px;\"><li class=\"\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i1.4cba3771dEMr1I\" style=\"list-style: none; margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; word-break: break-word; break-inside: avoid;\">With this kitchen rack,you can hang your favorite pots and utensils for easy access and save precious counter and cabinet space,and then,this rack adds beauty and charm,It\'s constructed of aluminium alloy,the special design will easy to install.This rack can withstand 40 pounds.It Is also light weight.So you won\'t need a handyman to install it.Keep your kitchen accessories organized and convenient so you can spend less time fighting with your kitchen and more time loving it.</li><li class=\"\" style=\"list-style: none; margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; word-break: break-word; break-inside: avoid;\">Size: 60 x 11 x 9cm</li><li class=\"\" style=\"list-style: none; margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; word-break: break-word; break-inside: avoid;\">Packing List</li><li class=\"\" style=\"list-style: none; margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; word-break: break-word; break-inside: avoid;\">1 x Kitchen rack</li><li class=\"\" style=\"list-style: none; margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; word-break: break-word; break-inside: avoid;\">2 x Cups</li><li class=\"\" style=\"list-style: none; margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; word-break: break-word; break-inside: avoid;\">6 X Hooks</li><li class=\"\" style=\"list-style: none; margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; word-break: break-word; break-inside: avoid;\">1 x Towel rack</li><li class=\"\" style=\"list-style: none; margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; word-break: break-word; break-inside: avoid;\">3 x Swell Plastic Buttons</li><li class=\"\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i0.4cba3771dEMr1I\" style=\"list-style: none; margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; word-break: break-word; break-inside: avoid;\">3 x Screws</li></ul>', 1550, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 09:56:15', '2022-02-08 09:56:15'),
(52, 'DSTT', 0, 109, 108, NULL, NULL, 0, 'Double Spring Tummy Trimmer', 'Double-Spring-Tummy-Trimmer', 0, '<p style=\"margin-top: inherit; margin-bottom: 10px; color: rgb(51, 51, 51); line-height: 21px; font-family: &quot;open sans&quot;;\"><span style=\"font-weight: 700;\">Contoured foot pedals</span></p><p style=\"margin-top: inherit; margin-bottom: 10px; color: rgb(51, 51, 51); line-height: 21px; font-family: &quot;open sans&quot;;\"><span style=\"font-weight: 700;\">Steel Coil pull-up bar</span></p><p style=\"margin-top: inherit; margin-bottom: 10px; color: rgb(51, 51, 51); line-height: 21px; font-family: &quot;open sans&quot;;\"><span style=\"font-weight: 700;\">Portable &amp; lightweight - use it any where</span></p><p style=\"margin-top: inherit; margin-bottom: 10px; color: rgb(51, 51, 51); line-height: 21px; font-family: &quot;open sans&quot;;\"><span style=\"font-weight: 700;\">Flattens tummy in just days</span></p><p style=\"margin-top: inherit; margin-bottom: 10px; color: rgb(51, 51, 51); line-height: 21px; font-family: &quot;open sans&quot;;\"><span style=\"font-weight: 700;\">Firms chest and arms</span></p><p style=\"margin-top: inherit; margin-bottom: 10px; color: rgb(51, 51, 51); line-height: 21px; font-family: &quot;open sans&quot;;\"><span style=\"font-weight: 700;\">Tightens hips and thighs</span></p><p style=\"margin-top: inherit; margin-bottom: 10px; color: rgb(51, 51, 51); line-height: 21px; font-family: &quot;open sans&quot;;\"><span style=\"font-weight: 700;\">Easy<a href=\"https://shoprex.com/health-care/gym-equipment/ab-machines/tummy-trimmer-double-spring-mpid40725\" style=\"color: rgb(51, 51, 51); transition: all 0.3s ease-in-out 0s;\">&nbsp;Tummy Trimmer Exercise Machine</a>&nbsp;to burn of Calories and Tone your muscles</span></p>', 1250, 690, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 09:57:17', '2022-02-08 09:57:17'),
(53, 'YMFE', 0, 111, 110, NULL, NULL, 0, 'Yoga Mat Fitness Exercise', 'Yoga-Mat-Fitness-Exercise', 0, '<p style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">Feature:</p><p data-spm-anchor-id=\"a2g0o.detail.1000023.i3.76c811558rJ1kO\" style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">1, EVA material, efficient rebound, comfortable cushion;</p><p style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">2, Small light, after the volume with a backpack can be easily carried</p><p style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">3, Safe and non-slip-the water ripple road design improves the friction between the yoga mat and the ground and is not easy to slide</p><p style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">4, Closed stomata, non-absorbent, waterproof and moisture better</p><p style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">&nbsp;</p><p style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">Product description:</p><p data-spm-anchor-id=\"a2g0o.detail.1000023.i1.76c811558rJ1kO\" style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">Name: Yoga mat</p><p data-spm-anchor-id=\"a2g0o.detail.1000023.i2.76c811558rJ1kO\" style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">Material: EVA</p><p style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">Thickness: 6mm</p><p style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">Size: 173 * 60 * 0.6cm</p><p style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">Color: purple, blue, pink, green</p><p style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">Applicable scenes: fitness equipment, sports trends, fitness body, dance sports</p><p style=\"margin-top: inherit; margin-bottom: 0px; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">&nbsp;</p><p data-spm-anchor-id=\"a2g0o.detail.1000023.i0.76c811558rJ1kO\" style=\"margin-top: inherit; margin-bottom: inherit; font-size: 12px; line-height: inherit; padding: 0px; font-family: Verdana, Arial, Helvetica, sans-serif;\">Packing:<span style=\"padding: 0px; margin: 0px; max-width: 100%; word-break: break-word;\">&nbsp;</span>1* yoga mat</p>', 1190, 850, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 09:58:15', '2022-02-08 09:58:15'),
(54, 'VC', 0, 113, 112, NULL, NULL, 0, '2 IN1 ভ্যাকুম & সিলার', '2-IN1-ভ্যাকুম-&-সিলার', 0, '<ul style=\"margin-right: 0px; margin-bottom: 1.41575em; margin-left: 3em; padding: 0px; list-style-position: initial; list-style-image: initial; color: rgb(109, 109, 109); font-family: &quot;Source Sans Pro&quot;, HelveticaNeue-Light, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif; font-size: medium;\"><li style=\"list-style-type: none;\">Brand new and high quality.</li><li style=\"list-style-type: none;\">Automatic Food Vacuum Sealer: Vacuum packing machine can help you extend the fresh to keep taste of food and avoid insect, keeping ingredients and locking nutrients in food.</li><li style=\"list-style-type: none;\">Easy to Operate: Automatic Vacuum Sealing, adopting simple and fast vacuum sealing package, green button means vacuum state, green light flashes turn to red light, the then to green light flashes again, the sealing namely completed.</li><li style=\"list-style-type: none;\">Sealed &amp; Vacuum to Keep Food Fresh: Directly seal the food or keep vacuum state to seal food to keep the fresh. Vacuum packing machine can help you cook more delicious food for your families and friends; it is a good choice when you picnic or travel with a vacuum packaging food.</li><li style=\"list-style-type: none;\">Kind Reminder: Sealing bags must be face up and don’t fill the food exceeding the 2/3 of the sealed bag,so as not to affect the sealing effect.Before using it,please read the instructions carefully. Please write the date with the label to remind yourself on the bags.</li><li style=\"list-style-type: none;\">Vacuum preservation to extend the time of keeping food fresh.</li><li style=\"list-style-type: none;\">Vacuum &amp; Sealed keeping ingredients and locking nutrients in food.</li><li style=\"list-style-type: none;\">Name: Vacuum Sealing</li><li style=\"list-style-type: none;\">Material: ABS, Sponge</li><li style=\"list-style-type: none;\">Size: Length*Width*Height: 13.5″*2.5″*2″</li></ul>', 1990, 1450, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 09:59:20', '2022-02-08 09:59:20');
INSERT INTO `products` (`id`, `sku`, `position`, `thumb`, `image`, `gallery_images`, `video_url`, `has_variant`, `name`, `slug`, `stock`, `description`, `price`, `sale_price`, `is_featured`, `is_best_sell`, `is_new_product`, `status`, `is_free_delivery`, `delivery_charge`, `purchase_cost`, `brand_name`, `fb_description`, `created_at`, `updated_at`) VALUES
(55, 'TT', 0, 115, 114, NULL, NULL, 0, 'Tummy Trimmer', 'Tummy-Trimmer', 0, '<p><font color=\"#000000\" style=\"font-family: &quot;Open Sans&quot;, sans-serif;\"><span data-spm-anchor-id=\"2114.12057483.0.i4.5ac32e141uPqMr\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">Type: Abdominal Exerciser<br></span></font><font color=\"#000000\" style=\"font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">Quantity: 1PC<br></span></font><font color=\"#000000\" style=\"font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">Material: Spring steel<br></span></font><font color=\"#000000\" style=\"font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">Color: Blue/Purple<br></span></font><font color=\"#000000\" style=\"font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">Size: 32*25cm/12.58*9.83inch<br></span></font><font color=\"#000000\" style=\"font-family: &quot;Open Sans&quot;, sans-serif;\">Type: Abdominal Exerciser<br></font><font color=\"#000000\" style=\"font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">Quantity: 1PC<br></span></font><font color=\"#000000\" style=\"font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">Material: Spring steel<br></span></font><font color=\"#000000\" style=\"font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">Color: Blue/Purple<br></span></font><font color=\"#000000\" style=\"font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline;\">Size: 32*25cm/12.58*9.83inch<br></span></font><span style=\"color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; padding: 0px; margin: 0px; max-width: 100%; word-break: break-word; font-size: 20px;\"><span data-spm-anchor-id=\"a2g0o.detail.1000023.i1.33912774ACZTot\" style=\"padding: 0px; margin: 0px; max-width: 100%; word-break: break-word; font-family: &quot;Times New Roman&quot;, Times, serif;\"><font color=\"#000000\">Item Name: Tension Foot Pedal<br></font></span></span><span style=\"color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; padding: 0px; margin: 0px; max-width: 100%; word-break: break-word; font-size: 20px;\"><span style=\"padding: 0px; margin: 0px; max-width: 100%; word-break: break-word; font-family: &quot;Times New Roman&quot;, Times, serif;\"><font color=\"#000000\">Material: Spring Steel<br></font></span></span><span style=\"color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; padding: 0px; margin: 0px; max-width: 100%; word-break: break-word; font-size: 20px;\"><span style=\"padding: 0px; margin: 0px; max-width: 100%; word-break: break-word; font-family: &quot;Times New Roman&quot;, Times, serif;\"><font color=\"#000000\">Features: Durable, Elastic, Easy to Use, Fitness Tool<br></font></span></span><span style=\"color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif; padding: 0px; margin: 0px; max-width: 100%; word-break: break-word; font-size: 20px;\"><span style=\"padding: 0px; margin: 0px; max-width: 100%; word-break: break-word; font-family: &quot;Times New Roman&quot;, Times, serif;\"><font color=\"#000000\">Size: 34cm x 27cm/13.39\" x 10.63\" (Approx.)</font></span></span><br></p>', 990, 500, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:00:28', '2022-02-08 10:00:28'),
(56, 'ASSUB', 0, 117, 116, NULL, NULL, 0, 'Adjustable Suction Sit Up Bar', 'Adjustable-Suction-Sit-Up-Bar', 0, '<p><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">1.Please wipe the floor clean and free of dust!</span><br style=\"font-family: Verdana, sans-serif; font-size: 13px;\"><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">2.Please use it on the smooth and crack-free floor!</span><br style=\"font-family: Verdana, sans-serif; font-size: 13px;\"><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">3.Please Not for use on wooden floors!</span><br style=\"font-family: Verdana, sans-serif; font-size: 13px;\"><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">Specifications:</span><br style=\"font-family: Verdana, sans-serif; font-size: 13px;\"><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">Type: Sit Up Bars</span><br style=\"font-family: Verdana, sans-serif; font-size: 13px;\"><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">Material: Foam</span><br style=\"font-family: Verdana, sans-serif; font-size: 13px;\"><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">Color: Red, Black,Purple,Pink</span><br style=\"font-family: Verdana, sans-serif; font-size: 13px;\"><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">Quantity: 1pcs</span><br style=\"font-family: Verdana, sans-serif; font-size: 13px;\"><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">Size: 29*21*12cm</span><br style=\"font-family: Verdana, sans-serif; font-size: 13px;\"><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">Weight: 800g/28.21oz</span><br style=\"font-family: Verdana, sans-serif; font-size: 13px;\"><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">Package:</span><br style=\"font-family: Verdana, sans-serif; font-size: 13px;\"><span style=\"font-family: Verdana, sans-serif; font-size: 13px;\">1* Suction Cup Sit-up Cushion</span><br></p>', 1290, 690, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:01:37', '2022-02-08 10:01:37'),
(57, 'HWS', 0, 119, 118, NULL, NULL, 0, 'গরম পানির ঝর্ণা ( China )', 'গরম-পানির-ঝর্ণা-(-China-)', 0, '<div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif;\">কানেকশনের নিয়ম:বাসার মেইন সুইচ অথবা ফ্রিজ বা এসির লাইন থেকে হট শাওয়ার ডিভাইসের কানেকশন নিতে হবে</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: auto; border: 0px;\">বিদ্যুতের তার ব্যবহার করতে হবে ৭০/৪২আর্থিং কানেকশন অবশ্যই লাগাতে হবে</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: auto; border: 0px;\">ডিভাইসটি ৫৩০০ ওয়াট হলেও ভয় নেই এটি রেফ্রিজারেটর কম্প্রেসার এর মতন টানা লোড না নিয়ে থেমে থেমে লোড নেয়ার ফলে এটি ৭৫% বিদ্যুত সাশ্রয়ী</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: auto; border: 0px;\">অটোমেটিক হট ওয়াটার সাপ্লাই এই মডেলটি আপনি কিচেন সিঙ্কেও ব্যবহার করতে পারেন</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: auto; border: 0px;\">কম্প্যাক্ট ডিজাইন</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: auto; border: 0px;\">ব্যবহার করা সহজ</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: auto; border: 0px;\">শাওয়ারটি বৈদ্যুতিক লাইনের সাথে সেট করুন</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: auto; border: 0px;\">সুইচ টিপলেই সাথে সাথেই হট ওয়াটার বের হবে</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: auto; border: 0px;\">থার্মাল কন্ট্রোল ইন্সটলেশন</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: auto; border: 0px;\">খুবই সহজ</div>', 1450, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:02:56', '2022-02-08 10:02:56'),
(58, 'CC-001', 0, 121, 120, NULL, NULL, 0, 'মাংসের কিমা, আদা,রসুন,পেঁয়াজ পেস্ট, ফলের জুস, এক মেশিনে', 'মাংসের-কিমা,-আদা,রসুন,পেঁয়াজ-পেস্ট,-ফলের-জুস,-এক-মেশিনে', 0, '<p><span class=\"text_exposed_show\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><span class=\"_5mfr _47e3\"><span class=\"_7oe\">♦</span></span>&nbsp;power consumption: 200 W&nbsp;</span><span class=\"text_exposed_show\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><span class=\"_5mfr _47e3\"><span class=\"_7oe\">♦</span></span>&nbsp;rated voltage: 100V 50 / 60 Hz&nbsp;</span><span class=\"text_exposed_show\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><span class=\"_5mfr _47e3\"><span class=\"_7oe\">♦</span></span>&nbsp;size: width 11.6 x depth 11.6 x 23.3 cm (height)&nbsp;</span><span class=\"text_exposed_show\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><span class=\"_5mfr _47e3\"><span class=\"_7oe\">♦</span></span>&nbsp;weight:1.04kg&nbsp;</span><span class=\"text_exposed_show\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><span class=\"_5mfr _47e3\"><span class=\"_7oe\">♦</span></span>&nbsp;Guide: up to approx. 200 g (Cup MAX line before)&nbsp;</span><span class=\"text_exposed_show\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><span class=\"_5mfr _47e3\"><span class=\"_7oe\">♦</span></span>&nbsp;material&nbsp;</span><span class=\"text_exposed_show\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><span class=\"_5mfr _47e3\"><span class=\"_7oe\">♦</span></span>&nbsp;body: ABS plastic Cover: Triton Cup: Triton Blade: stainless steel</span><br></p>', 1450, 1050, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:03:57', '2022-02-08 10:03:57'),
(59, 'KRC', 0, 123, 122, NULL, NULL, 0, 'বাচ্চাদের দোলনা চেয়ার', 'বাচ্চাদের-দোলনা-চেয়ার', 0, '<h1 style=\"margin-top: 0.67em; margin-bottom: 0.67em; font-size: 2em; font-family: raleway, sans-serif; line-height: 1.1; color: rgb(51, 51, 51);\"><span id=\"fbPhotoSnowliftCaption\" class=\"fbPhotosPhotoCaption\" tabindex=\"0\" aria-live=\"polite\" data-ft=\"{&quot;tn&quot;:&quot;K&quot;}\">বেবি বাউন্সার</span></h1><p><span id=\"fbPhotoSnowliftCaption\" class=\"fbPhotosPhotoCaption\" tabindex=\"0\" aria-live=\"polite\" data-ft=\"{&quot;tn&quot;:&quot;K&quot;}\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">একটি শিশুই হতে পারে পরিবারের র্পূনতার উৎস। আর এই শিশুকে আনন্দে রাখতে হাসিমুখে রাখতে কোন বাবা-মা-না চায়। তাই আপনার সোনামনির জন্য আমাদের অতি প্রয়োজনীয একটি প্রোডাক্ট Baby Relexation Chair যাতে আপনার বেবীকে রেখে আপনি প্রয়োজনীয় কাজ ও সারতে পারবেন। আপনার বেবী থাকবে হাস্যজ্জ্বল।চমৎকার একটি পন্য যা দিয়ে আপনার বাচ্চা আনন্দের সাথে খেলা করবে।বাচ্চা পা নাড়াচাড়া করলে এটাও বাওঞ্চ(দুলতে) করতে থাকবে ।এটা ব্যাবহারে আপনার বাচ্চা নিজে নিজে খেলতে থাকবে ঘণ্টার পর ঘণ্টা। তাই এখনি আপনার বাচ্চার জন্য পন্যটি সংগ্রহ করুন।</span><span style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">&nbsp;&nbsp; &nbsp;&nbsp;</span><br></p>', 2150, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:05:01', '2022-02-08 10:05:01'),
(61, 'PA-001', 0, 127, 126, NULL, NULL, 0, 'Portable Almari (Wine Red)', 'Portable-Almari-(Wine-Red)', 0, '<div id=\"ali-title-AliPostDhMb-0p3xb\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><span data-spm-anchor-id=\"a2700.wholesale.pronpeci14.i1.642e46e4WYex3H\">Product Description</span></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><table class=\"aliDataTable\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-spacing: 0px; background-color: transparent;\"><tbody><tr align=\"left\"><td colspan=\"3\" style=\"padding: 0px;\">Brand</td><td colspan=\"9\" style=\"padding: 0px;\">&nbsp;QIDA</td></tr><tr align=\"left\"><td colspan=\"3\" style=\"padding: 0px;\">Item No.</td><td colspan=\"9\" style=\"padding: 0px;\">&nbsp;QD-wardrobe001&nbsp;&nbsp;cloth wardrobe</td></tr><tr align=\"left\"><td colspan=\"3\" style=\"padding: 0px;\">Material</td><td colspan=\"9\" style=\"padding: 0px;\">&nbsp;12 or 13 mm steel tube, 85 g non-woven cover, pp plastic connector</td></tr><tr align=\"left\"><td colspan=\"3\" style=\"padding: 0px;\">Size</td><td colspan=\"9\" style=\"padding: 0px;\">&nbsp;110 x 45 x 170 cm,130 x 45 x 170 cm, 145 x 45 x 170 cm</td></tr><tr align=\"left\"><td colspan=\"3\" style=\"padding: 0px;\">Product Feature</td><td colspan=\"9\" style=\"padding: 0px;\">Perfect for storing clothes / books / toys / shoes ..... absolutely anything! Dust-proof,Waterproof,Mildew Proofing,Antibacterial DIY Free Combination, Easy To Assemble And Detach Good sizes for different storage needs</td></tr><tr align=\"left\"><td colspan=\"3\" style=\"padding: 0px;\">Certification</td><td colspan=\"9\" style=\"padding: 0px;\">&nbsp;Load -bearing test</td></tr><tr align=\"left\"><td colspan=\"3\" style=\"padding: 0px;\">MOQ</td><td colspan=\"9\" style=\"padding: 0px;\">&nbsp;1</td></tr><tr align=\"left\"><td colspan=\"3\" style=\"padding: 0px;\">Packaging</td><td colspan=\"9\" style=\"padding: 0px;\">Each set with opp bag and put into one box,10 boxes packing into one &nbsp;carton</td></tr><tr align=\"left\"><td colspan=\"3\" style=\"padding: 0px;\">Delivery time</td><td colspan=\"9\" style=\"padding: 0px;\">&nbsp;1-2 Days</td></tr><tr align=\"left\"><td colspan=\"3\" style=\"padding: 0px;\">OEM Service</td><td colspan=\"9\" data-spm-anchor-id=\"a2700.wholesale.pronpeci14.i0.642e46e4WYex3H\" style=\"padding: 0px;\">&nbsp;Availabel</td></tr></tbody></table></div>', 2690, 1990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:06:52', '2022-02-08 10:06:52'),
(62, 'SSLP-001', 0, 129, 128, NULL, NULL, 0, 'সিঙ্গেল সিম সাপোর্টেড ল্যান্ডফোন কালো কালার', 'সিঙ্গেল-সিম-সাপোর্টেড-ল্যান্ডফোন-কালো-কালার', 0, '<p><span style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">আপনার শক্তিশালী নেটওয়ার্ক প্রয়োজন ? তাই এখুনি অর্ডার করুন GSM সিম সাপোর্টেড ল্যান্ডফোন!! ১০০%নেটওয়ার্ক পায় কর্ডলেস ফোনফিচার SMS Voice Mail, ২G GSM: 900/1800MHZGSM স্টান্ডার্ড হাই কোয়ালিটি ভয়েস সার্ভিসেস (FR, EFR, HR speech coding) ইমার্জেন্সি কল সার্ভিস, সাপ্লিমেন্টারি সার্ভিস: কলার আইডি, কল ফরোয়াডিং, কল ওয়েটিং, কল হোল্ড, থ্রি-ওয়ে কলিং, শর্ট মেসেজ ও 500 এন্ট্রি ফোনবুক এটা তে আপনা যে কোন মোবাইল অপারেটর এর সিম ব্যবহার করতে পারবেন রিচার্জেবেল তাই যেকোনো জায়জায় সহজেই নিয়ে যেতে পারবেন এন্টেনা থাকায় এটা সিগন্যাল খুব ভালো পায়।</span><br></p>', 3050, 1990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:08:22', '2022-02-08 10:08:22'),
(63, 'MHP', 0, 131, 130, NULL, NULL, 0, 'Magic Hose Pipe-50 Feet', 'Magic-Hose-Pipe-50-Feet', 0, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><li style=\"list-style-type: none;\">ম্যাজিক হস-পাইপ নরমাল অবস্থায় খুবই হাল্কা এবং ছোট থাকে, কিন্ত যখন এটির মধ্যে পানি যায় তখন এটি দিগুন লম্বা হয় এবং পানির গতি বাড়িয়ে দেয় ।</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">প্রতিনিয়ত বিভিন্ন কাজে আপনাকে গাড়ী ব্যবহার করতে হয় আর এতে করে আপনার গাড়িটি ধুলাবালিতে ভরে যায়; আপনার মূল্যবান গাড়িটি সুন্দরভাবে পানি দিয়ে পরিষ্কারের জন্য ব্যবহার করুন ম্যাজিক হোস পাইপ</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">এছাড়াও ম্যাজিক হোস পাইপ দিয়ে আপনি আপনার বাসা,অফিস,পরিস্কার কিংবা ফুল বাগানে খুব সহজে পানি দিতে পারেন</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">হাই কোয়ালিটি রাবারের তৈরী</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">ফ্লেক্সিবল ও এক্সটেন্ডেবল পাইপ</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">হাল্কা ওজন, তাই সহজে বহনযোগ্য</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">কালারঃ র‌্যান্ডম</li></ul>', 990, 690, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:09:36', '2022-02-08 10:09:36'),
(64, 'DSSLP-002', 0, 133, 132, NULL, NULL, 0, 'Dual-Sim-Supported-Land-Phone ( ডুয়েল সিম সাপোর্টেড ল্যান্ডফোন ( কালো কালার )', 'Dual-Sim-Supported-Land-Phone-(-ডুয়েল-সিম-সাপোর্টেড-ল্যান্ডফোন-(-কালো-কালার-)', 0, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><li style=\"list-style-type: none;\">আপনার শক্তিশালী নেটওয়ার্ক প্রয়োজন ?</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">তাই এখুনি অর্ডার করুন</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">GSM সিম সাপোর্টেড ল্যান্ডফোন!!</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">১০০%নেটওয়ার্ক পায়</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">&nbsp;কর্ডলেস ফোনফিচার</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">SMS Voice Mail, ২G GSM: 900/1800MHZGSM স্টান্ডার্ড</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">হাই কোয়ালিটি ভয়েস সার্ভিসেস (FR, EFR, HR speech coding)</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">ইমার্জেন্সি কল সার্ভিস,</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">সাপ্লিমেন্টারি সার্ভিস: কলার আইডি, কল ফরোয়াডিং, কল ওয়েটিং, কল হোল্ড, থ্রি-ওয়ে কলিং, শর্ট মেসেজ ও 500 এন্ট্রি ফোনবুক</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">এটা তে আপনা যে কোন মোবাইল অপারেটর এর সিম ব্যবহার করতে পারবেন</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">রিচার্জেবেল তাই যেকোনো জায়জায় সহজেই নিয়ে যেতে পারবেন</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">এন্টেনা থাকায় এটা সিগন্যাল খুব ভালো পায়।</li></ul>', 3550, 2390, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:10:46', '2022-02-08 10:10:46'),
(65, 'WSSSLP-003', 0, 135, 134, NULL, NULL, 0, 'Single-Sim-Supported-Land-Phone( সিঙ্গেল সিম সাপোর্টেড ল্যান্ডফোন ( সাদা কালার )', 'Single-Sim-Supported-Land-Phone(-সিঙ্গেল-সিম-সাপোর্টেড-ল্যান্ডফোন-(-সাদা-কালার-)', 0, '<div class=\"electro-description clearfix\" style=\"clear: both; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li style=\"list-style-type: none;\">আপনার শক্তিশালী নেটওয়ার্ক প্রয়োজন ?</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">তাই এখুনি অর্ডার করুন</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">GSM সিম সাপোর্টেড ল্যান্ডফোন!!</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">১০০%নেটওয়ার্ক পায়</li></ul></div><div class=\"electro-description clearfix\" style=\"clear: both; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">SMS Voice Mail, ২G GSM: 900/1800MHZGSM স্টান্ডার্ড</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">হাই কোয়ালিটি ভয়েস সার্ভিসেস (FR, EFR, HR speech coding)</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">ইমার্জেন্সি কল সার্ভিস,</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">সাপ্লিমেন্টারি সার্ভিস: কলার আইডি, কল ফরোয়াডিং, কল ওয়েটিং, কল হোল্ড, থ্রি-ওয়ে কলিং, শর্ট মেসেজ ও 500 এন্ট্রি ফোনবুক</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">এটা তে আপনা যে কোন মোবাইল অপারেটর এর সিম ব্যবহার করতে পারবেন</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">রিচার্জেবেল তাই যেকোনো জায়জায় সহজেই নিয়ে যেতে পারবেন</li><li style=\"list-style-type: none;\"></li><li style=\"list-style-type: none;\">এন্টেনা থাকায় এটা সিগন্যাল খুব ভালো পায়।</li></ul></div><p><span style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Made In China.</span><br></p>', 3050, 1990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:11:49', '2022-02-08 10:11:49'),
(66, 'RMFJM', 0, 137, 136, NULL, NULL, 0, 'Rechargeable-Multi-Factional-Jucher ( রিচার্জেবল বেলেন্ডার )', 'Rechargeable-Multi-Factional-Jucher-(-রিচার্জেবল-বেলেন্ডার-)', 0, '<p><span style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Color: blue/Pink/purple Material: food grade PC and ABS Blade material: stainless steel Capacity: 400ml Size: 82 * 82 * 240mm Battery type: 2000 mAh 3.7 V</span><br></p>', 1250, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:13:09', '2022-02-08 10:13:09'),
(67, 'SS-002', 0, 139, 138, NULL, NULL, 0, 'Suction Shelves', 'Suction-Shelves', 0, '<p><span style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Viscose design, fits to most smooth surfaces. Size:Appox 25x10x6.7cm. It will not damage the wall and can firmly adsorbed on smooth surfaces. It can disassembly and be using most time. Material: ABS plastic. Perfect for storage in the corner of the kitchen and bathroom. Package Including: 1 xShower Shelf+2xViscose</span><br></p>', 790, 590, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:14:50', '2022-02-08 10:14:50'),
(68, 'MRVG', 0, 141, 140, NULL, NULL, 0, '9 in 1 সবজি কাটা ধোয়া এক মেশিনে', '9-in-1-সবজি-কাটা-ধোয়া-এক-মেশিনে', 0, '<p><span style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Parameters: Material:&nbsp;stainless&nbsp;steel;&nbsp;plastic Weight:&nbsp;about&nbsp;600g List: Shredder&nbsp;*&nbsp;3 Slicer&nbsp;*&nbsp;2 Flower&nbsp;Cutter&nbsp;*&nbsp;1 Garlic&nbsp;Grinding&nbsp;*&nbsp;1 Paring&nbsp;Cutter&nbsp;*&nbsp;1</span></p><p data-spm-anchor-id=\"a2g0o.detail.1000023.i0.30e957b9H22e4u\" style=\"margin: inherit; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">Food&nbsp;Container&nbsp;*&nbsp;1</p><p data-spm-anchor-id=\"a2g0o.detail.1000023.i0.30e957b9H22e4u\" style=\"margin: inherit; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">বিশেষ দ্রষ্টব্য : ব্লেড সাদা-কালো দুইটা কালার</p>', 1250, 690, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:15:49', '2022-02-08 10:15:49'),
(69, 'APS-01', 0, 143, 142, NULL, NULL, 0, 'থেরাপিতে কার্যকরী জুতা', 'থেরাপিতে-কার্যকরী-জুতা', 0, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 1rem; padding: 0px; outline: 0px; list-style-position: outside; list-style-image: initial; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif;\"><li style=\"list-style-type: none; outline: 0px; margin: 0px; padding: 0px;\">Item Type: Massage Slippers</li><li style=\"list-style-type: none; outline: 0px; margin: 0px; padding: 0px;\">Material: EVA, Wood</li><li style=\"list-style-type: none; outline: 0px; margin: 0px; padding: 0px;\">Size: 38-39 (CN), 40-41 (CN), 42-43(CN), 44-45(CN) (Optional)</li><li style=\"list-style-type: none; outline: 0px; margin: 0px; padding: 0px;\">Weight: 500 g&nbsp; / 1.10 lbs</li></ul><p style=\"margin-top: inherit; margin-bottom: 1rem; color: rgb(68, 68, 68); line-height: 21px; outline: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; font-weight: bolder;\">Package Includes:</span></p><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 1rem; padding: 0px; outline: 0px; list-style-position: outside; list-style-image: initial; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif;\"><li style=\"list-style-type: none; outline: 0px; margin: 0px; padding: 0px;\">1 x Pc</li></ul>', 1190, 750, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:17:08', '2022-02-08 10:17:08'),
(70, 'EBBQ-01', 0, 145, 144, NULL, NULL, 0, 'ইলেকট্রিক বারবিকিউ মেশিন', 'ইলেকট্রিক-বারবিকিউ-মেশিন', 0, '<div class=\"html-content pdp-product-highlights\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li style=\"list-style-type: none;\">High Quality Table-top Cookware</li><li style=\"list-style-type: none;\">Low-fat, healthy cooking</li><li style=\"list-style-type: none;\">Cool-touch safety handles and base</li><li style=\"list-style-type: none;\">AC 220-240v/50Hz</li><li style=\"list-style-type: none;\">Power: 2000W</li><li style=\"list-style-type: none;\">Outer-casing: 6 PCS/CTN 51x50x37CMN.</li><li style=\"list-style-type: none;\">Weight: 15/17KG</li></ul></div><div class=\"html-content detail-content\" data-spm-anchor-id=\"a2a0e.pdp.product_detail.i0.4b47542c4QPcw3\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li style=\"list-style-type: none;\">High Quality Table-top Cookware</li><li style=\"list-style-type: none;\">Low-fat, healthy cooking</li><li style=\"list-style-type: none;\">Cool-touch safety handles and base</li><li style=\"list-style-type: none;\">AC 220-240v/50Hz</li><li style=\"list-style-type: none;\">Power: 2000W</li><li style=\"list-style-type: none;\">Outer-casing: 6 PCS/CTN 51x50x37CMN.</li><li style=\"list-style-type: none;\">Weight: 15/17KG</li></ul></div>', 2100, 1250, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:18:46', '2022-02-08 10:18:46'),
(71, 'KR-01', 0, 147, 146, NULL, NULL, 0, 'কাপড় রাখার রেক', 'কাপড়-রাখার-রেক', 0, '<p><span style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Product details: * Easy to Assemble.</span><span class=\"text_exposed_show\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">&nbsp;* Excellent Storage Solution. * Portable &amp; Multi-functional Clothes Rack. * Sturdy &amp; Durable, Stylish &amp; Mobile Design. * Keep Clothes Organized &amp; Easily Accessible. * Multi-pattern classification; Storage Racks and a coat hanger. * Side Hook design, simple and practical, beautiful and generous. * Model: GY-288 * Size: 170*36*55cm * Material: Metal, plastic and clothe * Load Capacity: 20 Kg (Approx.) * Color: Pink and Coffee..</span><br></p>', 1790, 1290, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:19:57', '2022-02-08 10:19:57'),
(72, 'AXON-01', 0, 149, 148, NULL, NULL, 0, 'কানে কম শোনেন তাদের জন্য (AXON Hearing Aids )', 'কানে-কম-শোনেন-তাদের-জন্য-(AXON-Hearing-Aids-)', 0, '<p><span style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Brand: AXON Model: F-188 Material: plastic Product Size: Approx. 43*19*9mm Color: beige Max sound output: 130dB±5dB Sound gain: ≥50dB Harmonic Wave Distortion: ≤5% Frequency response Range: 300Hz~4000Hz Input Noise: ≤ 30dB Power Voltage: 1.5 V Current: ≤ 4mA Battery Type: AG13</span><br></p>', 1690, 1350, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:21:37', '2022-02-08 10:21:37'),
(73, 'med-03', 0, 151, 150, NULL, NULL, 0, 'Mini Ear Hearing Aid Small Invisible Hearing Aids', 'Mini-Ear-Hearing-Aid-Small-Invisible-Hearing-Aids', 0, '<div data-spm-anchor-id=\"a2g0o.detail.1000023.i0.56f94b06DgE1F7\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><div><strong style=\"font-weight: bold;\">You\'ve seen them advertised on TV, in Newspapers &amp; Magazine</strong></div><div><strong style=\"font-weight: bold;\">Micro Ear Mini Hearing Aid&nbsp;sound amplifier for better hearing!</strong></div><div></div></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><div>This Super Wireless Listening Device is a real breakthrough in sound magnification technology.</div><div>You\'ll hear more clearly and distinctly.</div><div>Super Light&nbsp;weight and compact, it amplifies sounds up to 50 decibels.</div><div>The compact and discreet Super Ear will pick up the words distinctly.</div><div>High-Definition Digital Sound</div><div>Delivers More Distortion Free Sound</div><div>Quiet Performance with Less Circuit Noise</div><div>Increased Sensitivity for Better Hearing</div><div>More Accurate Sound Reproduction</div><div>New Ergonomic Design which is More Comfortable</div><div>New Design Offers Wind Noise Reduction too</div><div>Amazingly small design</div><div>Will fit both ears and is small enough to pop into your pocket</div></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><strong style=\"font-weight: bold;\">Super small size – 1.2cm x 1.7cm (0.5\" x 0.75\")</strong></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><strong style=\"font-weight: bold;\">They are so tiny, no-one will be able to tell you’re wearing one!</strong></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><strong style=\"font-weight: bold;\">These are surprisingly small but extremely effective!!</strong></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><strong style=\"font-weight: bold;\">There is no need for ugly hook-over hearing aids, these just pop safely into your ear as shown.</strong></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><strong style=\"font-weight: bold;\">Features:</strong></div><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><li style=\"list-style-type: none;\"><strong style=\"font-weight: bold;\">Super mini size and light weight --&nbsp;only 4g</strong></li><li style=\"list-style-type: none;\">Brand new and high quality hearing aid sound amplifie</li><li style=\"list-style-type: none;\">Adjust volume to the minimum before wearing</li><li style=\"list-style-type: none;\"><strong style=\"font-weight: bold;\">Come&nbsp;with 2x batteries and&nbsp;4pcs different sized ear plugs</strong></li><li style=\"list-style-type: none;\"><strong style=\"font-weight: bold;\">Increase volume gradually to avoid sudden increase in sound</strong></li><li style=\"list-style-type: none;\">Convenient for watching movies, enjoying the drama, attending meeting, or having class, it can help you to hear sounds clearly and loudly</li></ul><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><strong style=\"font-weight: bold;\">Specification:</strong></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">1. Max sound output: 110±5dB</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">2. Sound gain: ≥40dB</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">3. Total harmonic wave distortion: ≤5%</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">4. Frequency range: 300-4000Hz</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">5. Input noise: ≤40dB</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">6. Voltage: DC1.5V</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">7. Current: ≤4mA</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><span data-spm-anchor-id=\"a2g0o.detail.1000023.i1.56f94b06DgE1F7\">8. Colour: As pictures</span></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><strong style=\"font-weight: bold;\">Package Includes:</strong></div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">1 x Hearing Aid - 12mm x 17mm (1/2\" x 3/4\")</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">2 x AG3 Button Cells</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">1 x Instruction Manual</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">1 x Storage Case</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">4 x Units of different sized earplugs for different ear shapes</div>', 2250, 1690, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:22:56', '2022-02-08 10:22:56'),
(74, 'ETP-02', 0, 153, 152, NULL, NULL, 0, 'বাত,ব্যথা নিরাময়ে সহায়ক থেরাপি পেন', 'বাত,ব্যথা-নিরাময়ে-সহায়ক-থেরাপি-পেন', 0, '<p class=\"specification-title\" style=\"margin: inherit; color: rgb(102, 102, 102); line-height: 21px; font-family: raleway, sans-serif;\">Item specifics</p><div class=\"ui-box-body\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><ul class=\"product-property-list util-clearfix show-all\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><li id=\"product-prop-2\" class=\"property-item\" data-attr=\"202855983\" data-title=\"Beurha\" style=\"list-style-type: none;\"><span class=\"propery-title\">Brand Name:</span><span class=\"propery-des\" title=\"Beurha\">Beurha</span></li><li id=\"product-prop-10\" class=\"property-item\" data-attr=\"-1\" data-title=\"ABS+Metal\" style=\"list-style-type: none;\"><span class=\"propery-title\">Material:</span><span class=\"propery-des\" title=\"ABS+Metal\">ABS+Metal</span></li><li id=\"product-prop-1131\" class=\"property-item\" data-attr=\"586\" data-title=\"Body\" style=\"list-style-type: none;\"><span class=\"propery-title\">Application:</span><span class=\"propery-des\" title=\"Body\">Body</span></li><li id=\"product-prop--1\" class=\"property-item\" data-attr=\"-1\" data-title=\"TENS Acupuncture Pen massageador\" style=\"list-style-type: none;\"><span class=\"propery-title\">Model Number:</span><span class=\"propery-des\" title=\"TENS Acupuncture Pen massageador\">TENS Acupuncture Pen massageador</span></li><li id=\"product-prop--1\" class=\"property-item\" data-attr=\"-1\" data-title=\"Massage Pen\" style=\"list-style-type: none;\"><span class=\"propery-title\">Item:</span><span class=\"propery-des\" title=\"Massage Pen\">Massage Pen</span></li><li id=\"product-prop--1\" class=\"property-item\" data-attr=\"-1\" data-title=\"Therapy Heal Massage Pen\" style=\"list-style-type: none;\"><span class=\"propery-title\">Acupuncture pen:</span><span class=\"propery-des\" title=\"Therapy Heal Massage Pen\">Therapy Heal Massage Pen</span></li><li id=\"product-prop--1\" class=\"property-item\" data-attr=\"-1\" data-title=\"1pcs AA battery (not included)\" style=\"list-style-type: none;\"><span class=\"propery-title\">Power:</span><span class=\"propery-des\" title=\"1pcs AA battery (not included)\">1pcs AA battery (not included)</span></li><li id=\"product-prop--1\" class=\"property-item\" data-attr=\"-1\" data-title=\"Stimulating Nerve\" style=\"list-style-type: none;\"><span class=\"propery-title\">Function 1:</span><span class=\"propery-des\" title=\"Stimulating Nerve\">Stimulating Nerve</span></li><li id=\"product-prop--1\" class=\"property-item\" data-attr=\"-1\" data-title=\"Health care,regulate our body by stimulating\" style=\"list-style-type: none;\"><span class=\"propery-title\">Function 2:</span><span class=\"propery-des\" title=\"Health care,regulate our body by stimulating\">Health care,regulate our body by stimulating</span></li><li id=\"product-prop--1\" class=\"property-item\" data-attr=\"-1\" data-title=\"Relax Body\" style=\"list-style-type: none;\"><span class=\"propery-title\">Function 3:</span><span class=\"propery-des\" title=\"Relax Body\">Relax Body</span></li><li id=\"product-prop--1\" class=\"property-item\" data-attr=\"-1\" data-title=\"Acute and chronic physical pain\" style=\"list-style-type: none;\"><span class=\"propery-title\">Electric massager:</span><span class=\"propery-des\" title=\"Acute and chronic physical pain\">Acute and chronic physical pain</span></li><li id=\"product-prop--1\" class=\"property-item\" data-attr=\"-1\" data-title=\"Muscle joint pains Migraine\" style=\"list-style-type: none;\"><span class=\"propery-title\">Effective for:</span><span class=\"propery-des\" title=\"Muscle joint pains Migraine\">Muscle joint pains Migraine</span></li><li id=\"product-prop--1\" class=\"property-item\" data-attr=\"-1\" data-title=\"Accurate physical therapy\" style=\"list-style-type: none;\"><span class=\"propery-title\">Feature1:</span><span class=\"propery-des\" title=\"Accurate physical therapy\">Accurate physical therapy</span></li><li id=\"product-prop--1\" class=\"property-item\" data-attr=\"-1\" data-title=\"laser acupuncture pen\" data-spm-anchor-id=\"2114.12057483.0.i6.1675661dBsXuca\" style=\"list-style-type: none;\"><span class=\"propery-title\">Feature2:</span><span class=\"propery-des\" title=\"laser acupuncture pen\">laser acupuncture pen</span></li></ul></div>', 1490, 1290, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:24:21', '2022-02-08 10:24:21'),
(75, 'DHWTWS-01', 0, 155, 154, NULL, NULL, 0, 'Digital Hot Water Tap ( ডিজিটাল হট ওয়াটার ট্যাব )', 'Digital-Hot-Water-Tap-(-ডিজিটাল-হট-ওয়াটার-ট্যাব-)', 0, '<div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">&nbsp;এই শীতে ঠান্ডা পানি দিয়ে গোসল/কাজ করতে সমস্যা? বার বার গরম পানি করতে সমস্যা? আর নয় চিন্তা।</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">ফিচার্সঃ..................</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">১। ৩ সেকেন্ডের মধ্যে ওয়াটার হিটিং পক্রিয়া।</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">২। বিদ্যুৎ খরচ কম।</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">৩। সহজে স্থাপন করা যাবে।</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">৪। ইন্সট্যান্ট গরম পানি পাওয়া যাবে।</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">৫। চাহিদা মত গরম ও কুসুম গরম পানি সংগ্রহ করা যাবে।</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">৬। ট্যাপ ও হ্যান্ড শাওয়ার ২ টা অপশন এ ব্যবহার করা যায়।</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">স্পেসিফিকেশনঃ</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">১০০% নতুন এবং হাই কোয়ালিটি</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">বডি ম্যাটেরিয়ালঃ ক্রোম প্লেটেড জিঙ্ক অ্যালয়</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">ভোল্টেজঃ 220-240V</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">পাওয়ারঃ 2100-5000W</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">ক্যাপাসিটিঃ 40L</div><div class=\"product-details-text\" style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><img src=\"https://static.ajkerdeal.com/images/dealdetailsnew/dealdetails_arrow.svg\" style=\"max-width: 100%; height: inherit; border: 0px;\">ম্যাক্সিমাম টেম্পারেচারঃ ৫০ ডিগ্রী সেলসিয়াস</div>', 2650, 1950, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:25:34', '2022-02-08 10:25:34'),
(76, 'WIFIC-01', 0, 157, 156, NULL, NULL, 0, 'WiFi রিচার্জেবল মিনি ম্যাগনেট ক্যামেরা', 'WiFi-রিচার্জেবল-মিনি-ম্যাগনেট-ক্যামেরা', 0, '<div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Product Category: wireless HD Camera</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Model: A9</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Material: ABS(Acrylonitrile Butadiene Styrene)</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Color: Black, White</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Image sensor: H62</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Angle: 150° wide angle</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Video resolution: HD 1080P</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Frame rate: 25FPS</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Video format: AVI</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Video encoding: H.264</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Recording range: 5㎡</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Night Vision: Infrared Night Vision</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Battery type: built-in 400mah rechargeable lithium battery</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Consumption: 240MA/3.7V</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">WIFI connection: WiFi hotspot link, remote link, free to switch</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Storage : External card, support up to 128GB Micro SD card TF card (not included)</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Motion D etection camera shooting: Straight 6m</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Interface: Micro USB</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">System support: IOS, Android</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Size: Approx 43 x 25mm/1.7\" x 1\"</div><div style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">Net weight: 30g</div>', 1590, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-08 10:26:47', '2022-02-08 10:26:47'),
(77, 'SBWM', 0, 159, 158, NULL, NULL, 0, 'Belt With Massager (Hi-Quality)', 'Belt-With-Massager-(Hi-Quality)', 0, '<div dir=\"auto\" style=\"font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\"><div dir=\"auto\">মেদ ভুড়ি, ঘাড় ব্যথা, কোমর ব্যাথা, শরীর ব্যাথার দিন শেষ</div><div dir=\"auto\">Slimming Belt With Massager (Hi-Quality)</div></div><div dir=\"auto\" style=\"font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\">1. স্লিমিং বেল্টটি শরীরের অতিরিক্ত চর্বি কমায় এবং ওজন কমাতে সহায়তা করে।</div><div dir=\"auto\" style=\"font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\">2. বেল্টটি শরীরের যে কোন স্থানে ব্যবহার উপযোগী।</div><div dir=\"auto\" style=\"font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\">3. পুরুষ এবং মহিলা উভয় ব্যবহার করতে পারবে।</div><div dir=\"auto\" style=\"font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\">4. এটি ছোট হলেও কাযকর এবং ম্যাসেজের প্রয়োজনীয়তা পূরণ করার জন্য যথেষ্ট শক্তিশালী।</div><div dir=\"auto\" style=\"font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\">5. শরীরের ব্যথার প্রভাব হ্রাস করে এবং স্বাচ্ছন্দে ব্যবহার করা যায়।</div><div dir=\"auto\" style=\"font-family: \"Segoe UI Historic\", \"Segoe UI\", Helvetica, Arial, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\">6. শুধু স্লিমিং নয়, এটি আপনার রক্ত সঞ্চালনে সহায়তা করে।</div>', 1590, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-09 16:40:48', '2022-02-09 16:57:08');
INSERT INTO `products` (`id`, `sku`, `position`, `thumb`, `image`, `gallery_images`, `video_url`, `has_variant`, `name`, `slug`, `stock`, `description`, `price`, `sale_price`, `is_featured`, `is_best_sell`, `is_new_product`, `status`, `is_free_delivery`, `delivery_charge`, `purchase_cost`, `brand_name`, `fb_description`, `created_at`, `updated_at`) VALUES
(78, 'BDGEO', 0, 174, 173, NULL, NULL, 0, 'Belly Drainage Ginger Essential Oil', 'Belly-Drainage-Ginger-Essential-Oil-1', 0, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: raleway, sans-serif; list-style-type: circle;\"><li style=\"background: url(\" ..=\"\" image=\"\" right-arrow.png\")=\"\" no-repeat;=\"\" padding-left:=\"\" 25px;=\"\" margin-bottom:=\"\" 10px;=\"\" font-size:=\"\" 16px;=\"\" list-style-type:=\"\" none=\"\" !important;\"=\"\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: 600;\">বেলি ড্রেনেজ আদা তেল পেটের নাভিতে লাগান দিনে 1-2 বার এবং আলতোভাবে ম্যাসাজ করুন শোষিত হওয়া পর্যন্ত প্রায় 10-20 মিনিট।</span></li><li style=\"background: url(\" ..=\"\" image=\"\" right-arrow.png\")=\"\" no-repeat;=\"\" padding-left:=\"\" 25px;=\"\" margin-bottom:=\"\" 10px;=\"\" font-size:=\"\" 16px;=\"\" list-style-type:=\"\" none=\"\" !important;\"=\"\">এই তেলটি: ডিটক্সিফাই করে এবং স্লিম করে, তেল কমায় এবং ত্বককে সতেজ করে। রক্ত সঞ্চালনকে উৎসাহিত করে এবং রক্তের স্থবিরতা দূর করে।</li><li style=\"background: url(\" ..=\"\" image=\"\" right-arrow.png\")=\"\" no-repeat;=\"\" padding-left:=\"\" 25px;=\"\" margin-bottom:=\"\" 10px;=\"\" font-size:=\"\" 16px;=\"\" list-style-type:=\"\" none=\"\" !important;\"=\"\">ব্যবহার: পেট, পা, নিতম্ব, ঘাড় সহ শরীরের যেকোনো অংশে ব্যাবহার করতে পারবেন</li><li style=\"background: url(\" ..=\"\" image=\"\" right-arrow.png\")=\"\" no-repeat;=\"\" padding-left:=\"\" 25px;=\"\" margin-bottom:=\"\" 10px;=\"\" font-size:=\"\" 16px;=\"\" list-style-type:=\"\" none=\"\" !important;\"=\"\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; font-family: inherit; font-style: inherit; font-weight: 600;\">নেট: 10 মিলি</span></li><li style=\"background: url(\" ..=\"\" image=\"\" right-arrow.png\")=\"\" no-repeat;=\"\" padding-left:=\"\" 25px;=\"\" margin-bottom:=\"\" 10px;=\"\" font-size:=\"\" 16px;=\"\" list-style-type:=\"\" none=\"\" !important;\"=\"\">ব্যবহারবিধি:</li><li style=\"background: url(\" ..=\"\" image=\"\" right-arrow.png\")=\"\" no-repeat;=\"\" padding-left:=\"\" 25px;=\"\" margin-bottom:=\"\" 10px;=\"\" font-size:=\"\" 16px;=\"\" list-style-type:=\"\" none=\"\" !important;\"=\"\">অল্প পরিমাণে এসেনশিয়াল অয়েল নিন।</li><li style=\"background: url(\" ..=\"\" image=\"\" right-arrow.png\")=\"\" no-repeat;=\"\" padding-left:=\"\" 25px;=\"\" margin-bottom:=\"\" 10px;=\"\" font-size:=\"\" 16px;=\"\" list-style-type:=\"\" none=\"\" !important;\"=\"\">তালুতে 2-3 ফোঁটা এসেন্স পয়েন্ট ব্যবহার করুন।</li><li style=\"background: url(\" ..=\"\" image=\"\" right-arrow.png\")=\"\" no-repeat;=\"\" padding-left:=\"\" 25px;=\"\" margin-bottom:=\"\" 10px;=\"\" font-size:=\"\" 16px;=\"\" list-style-type:=\"\" none=\"\" !important;\"=\"\">আক্রান্ত স্থানে সমানভাবে এসেনশিয়াল অয়েল লাগান এবং আলতোভাবে ম্যাসাজ করুন।</li><li style=\"background: url(\" ..=\"\" image=\"\" right-arrow.png\")=\"\" no-repeat;=\"\" padding-left:=\"\" 25px;=\"\" margin-bottom:=\"\" 10px;=\"\" font-size:=\"\" 16px;=\"\" list-style-type:=\"\" none=\"\" !important;\"=\"\">শোষিত না হওয়া পর্যন্ত ম্যাসাজ করুন।</li><li style=\"background: url(\" ..=\"\" image=\"\" right-arrow.png\")=\"\" no-repeat;=\"\" padding-left:=\"\" 25px;=\"\" margin-bottom:=\"\" 10px;=\"\" font-size:=\"\" 16px;=\"\" list-style-type:=\"\" none=\"\" !important;\"=\"\">তেল শোষণ করতে সাহায্য করার জন্য আপনার আঙ্গুল দিয়ে ত্বকে ফ্লিক করুন।</li></ul>', 990, 790, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-13 10:24:31', '2022-02-17 15:26:13'),
(79, 'TWHP', 0, 164, 163, NULL, NULL, 0, 'Travel Waterproof Handbag Parpel', 'Travel-Waterproof-Handbag-Parpel', 1, '<p>Fashionable Women Shoulder Bags Waterproof Oxford Cloth Handbag Foldable Large Capacity Training Travel Gym Bag Function: hand carry/single shoulder Fabric: Waterproof Oxford cloth Color: Purple/Dark Black Weight: 43kg Application: business trip, travel, leisure Size:22\"*9\"*16 Inche Structure: large main bag, dry-temperature separation bag.<br></p>', 1250, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-15 08:24:08', '2025-05-19 07:52:36'),
(80, 'SS', 0, 170, 169, '172', NULL, 0, 'Scru Scrub', 'Scru-Scrub', 0, '<p>Scru Cream Lip Scrub</p><p>• পিক এর মতো পার্মানেন্টলি ঠোঁট পিংকিশ করার টিপস লাগবে?</p><p>• এটা একটা লিপ স্ক্রাবার।যা ঠোঁট এর উপর হাল্কাভাবে ম্যাসাজ করতে হয়।খুব সফট এটি।</p><p>• ইউজের সাথেসাথেই চেইন্জিং দেখা জায়।</p><p>• ময়লা উঠে আসে।</p><p>• এতে কালচে ভাব বের হয়ে ঠোঁট গোলাপি হয় । মরা কালো চামড়া বের করে আনে,সফট লাগে।</p><p>• জেল টাইপ।।।</p><p>• একটা ফুল ইউজ এই যথেষ্ট।ইউজ ছেড়ে দিলেও গোলাপি-ই থাকবে।</p><p>• এটি ব্যবহারে লিপ pink হবে</p><p>• ঠোঁটের যে কোন কালো দাগ সহ সিগারেটের কালো দাগ যাবে ঠোট থেকে।</p><p>• লিপ সফট হবে এন্ড গ্লোয়িং হবে ।</p><p>• ঠোঁট গোলাপি করবে এবং আকর্ষনিও করে তুলবে ।</p><p>• কোনো পার্শ্বপ্রতিক্রিয়া নেই।</p><p>ব্যবহারবিধি :</p><p>এইটা ঠোঁটে লাগিয়ে ভালোভাবে scrub করতে হয়,এতে ঠোঁটের ময়লা,ঠোঁট ফাটা ও ঠোঁটের কালো দাগ দূর হয়, এছাড়া ঠোঁট খুব মসৃণ ও সফট হয়ে যায়।</p><p>এইটা প্রতিদিন রাতে ঘুমানোর আগে লিপ এ এপ্লাই করবেন, সকালে ওঠে লিপস টা ওয়াশ করে ফেলবেন</p>', 990, 790, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-02-15 20:43:35', '2022-02-15 20:56:44'),
(81, 'DSD', 0, 176, 175, NULL, NULL, 0, 'Dancing And Singing Duck', 'Dancing-And-Singing-Duck', 0, '<p style=\"margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 21px; font-family: &quot;Work Sans&quot;, sans-serif;\"><strong style=\"font-weight: bold;\">Dancing Duck Toy – Rechargeable</strong></p><p style=\"margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 21px; font-family: &quot;Work Sans&quot;, sans-serif;\">ছোট্ট বাবু শিশুটির একাকীত্ব দূর করবে। ইহা আপনার শিশুকে গান শোনাবে, শিশুর সাথে কথা বলবে, গানের সঙ্গে সঙ্গে হেলে দুলে নাচবে ও নানা রকম আলো জ্বলবে।</p><p style=\"margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 21px; font-family: &quot;Work Sans&quot;, sans-serif;\">ক্যাকটাস টি হেলেদুলে নেচে গান গেয়ে ও কথার ব্যঙ্গ করে শিশুকে সব সময় আনন্দ দিবে।</p><p style=\"margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 21px; font-family: &quot;Work Sans&quot;, sans-serif;\">পণ্যের বিবরণ:</p><p style=\"margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 21px; font-family: &quot;Work Sans&quot;, sans-serif;\">&nbsp;ইহা ইউএসবি রিচার্জেবল।</p><p style=\"margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 21px; font-family: &quot;Work Sans&quot;, sans-serif;\">&nbsp;ইহার মধ্যে গান রয়েছে।</p><p style=\"margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 21px; font-family: &quot;Work Sans&quot;, sans-serif;\">&nbsp;এর মাধ্যমে কথা অটোমেটিক রেকর্ডিং ও প্লেব্যাক হবে।</p><p style=\"margin-top: 4px; margin-bottom: 10px; font-size: 13px; color: rgb(34, 34, 34); line-height: 21px; font-family: &quot;Work Sans&quot;, sans-serif;\">&nbsp;বিভিন্ন রকম আলো জ্বলবে।</p>', 1250, 990, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:22:31', '2022-03-03 21:22:31'),
(82, 'WCBBLC', 0, 178, 177, NULL, NULL, 0, 'Whitening Cream Bleaching Body Lightening Cream', 'Whitening-Cream-Bleaching-Body-Lightening-Cream', 0, '<p><span style=\"color: rgb(51, 51, 51); font-family: raleway, sans-serif;\">শরীরের বিভিন্ন গুরুত্বপূর্ণ অঙ্গের কালো দাগ দূর করার জন্য এবং বডি সম্পূর্ণরূপে হোয়াইটেনিং ক্রিম।</span><br></p>', 990, 790, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:24:22', '2022-03-03 21:24:22'),
(83, 'SBOSOP', 0, 180, 179, NULL, NULL, 0, 'Spray Bottle Oil Sprayer Oiler Pot', 'Spray-Bottle-Oil-Sprayer-Oiler-Pot', 0, '<p style=\"margin-top: 4px; margin-bottom: var(--wd-tags-mb); font-size: 13px; color: rgb(119, 119, 119); line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Lato, Arial, Helvetica, sans-serif;\">Name: stainless steel glass oil spray bottle<br>Quantity: 1pcs<br>Capacity: 100ml<br>Size: 18*4cm</p><p style=\"margin-top: 4px; margin-bottom: 4px; font-size: 13px; color: rgb(119, 119, 119); line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Lato, Arial, Helvetica, sans-serif;\">Material: ABS + glass<br>Color: Silver + transparent<br>Type: Storage Bottles &amp; Jars<br>Feature: Stocked,Eco-Friendly<br>Use: Spice<br>Condiments Container styles: Cover with Hole</p>', 990, 790, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:25:51', '2022-03-03 21:25:51'),
(84, 'HKWLDB', 0, 182, 181, NULL, NULL, 0, 'Household Kitchen Washing Liquid Dish Brush', 'Household-Kitchen-Washing-Liquid-Dish-Brush-1', 0, '<p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit;\">Add liquid cleaning pot brush, liquid storage design presses out liquid, PP bristles, strong cleaning power, easy to wash all kinds of materials, does not hurt the utensils</p><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit;\">The liquid storage hand-held pot brush makes the boring and clean cleaning interesting</p><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit;\">Gently press to flow out</p><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit;\">Add a liquid cleaning brush to add the detergent to the handle</p><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit;\">Intimate storage base for easy storage and let the brush drain naturally</p><p data-spm-anchor-id=\"a2g0o.detail.1000023.i0.605069a4T2kCdr\" style=\"margin-bottom: 10px; color: rgb(102, 102, 102); line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit;\">Round shape, touch every corner, small size, easy to clean the gap and dirty</p>', 590, 390, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:26:34', '2022-03-03 21:27:07'),
(85, 'FSM', 0, 184, 183, NULL, NULL, 0, 'Food Sealing Machine', 'Food-Sealing-Machine', 0, '<div style=\"color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit;\">Product specifications and features.</div><div style=\"color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit;\"><ul style=\"margin-bottom: var(--list-mb); margin-right: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: var(--li-pl); overflow-wrap: break-word; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; list-style-position: initial; list-style-image: initial; --list-mb: 20px; --li-mb: 10px; --li-pl: 17px;\"><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><div style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Brand new and high quality.</div></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><div style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Automatic Food Vacuum Sealer: Vacuum packing machine can help you extend the fresh to keep taste of food and avoid insect, keeping ingredients and locking nutrients in food.</div></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><div style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Easy to Operate: Automatic Vacuum Sealing, adopting simple and fast vacuum sealing package, green button means vacuum state, green light flashes turn to red light, the then to green light flashes again, the sealing namely completed.</div></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><div style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Sealed &amp; Vacuum to Keep Food Fresh: Directly seal the food or keep vacuum state to seal food to keep the fresh. Vacuum packing machine can help you cook more delicious food for your families and friends; it is a good choice when you picnic or travel with a vacuum packaging food.</div></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><div style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Kind Reminder: Sealing bags must be face up and don’t fill the food exceeding the 2/3 of the sealed bag,so as not to affect the sealing effect.Before using it,please read the instructions carefully. Please write the date with the label to remind yourself on the bags.</div></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><div style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Vacuum preservation to extend the time of keeping food fresh.</div></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><div style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Vacuum &amp; Sealed keeping ingredients and locking nutrients in food.</div></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><div style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Name: Vacuum Sealing</div></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><div style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Material: ABS, Sponge</div></li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><div style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Size: Length*Width*Height: 13.5″*2.5″*2″</div></li></ul></div>', 2290, 1790, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:28:09', '2022-03-03 21:28:09'),
(86, 'SFC', 0, 186, 185, NULL, NULL, 0, 'Silicon Folding Cup', 'Silicon-Folding-Cup', 0, '<div style=\"color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit;\">Foldable design and space saving. It fits conveniently into your pocket, hand bag, backpack and most car cup holders.</div><div style=\"color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit;\">Stainless steel rim at the top is strong and maintains the integrity of the collapsible cup, make the cup much easier to hold and drink.</div><div style=\"color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit;\">Leak-proof lid effectively prevents dust or other objects from falling into the cup, keeping the cup clean and hygienic at all times.</div><div style=\"color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit;\">Dishwasher and microwave safe.Temperature rated -40 centigrade degree to 250 centigrade degree. Suitable for coffee, tea, cold drinks, and other hot beverages.</div><div style=\"color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit;\">With a connective hand rope, the camping cup can be hung on the bag. Lightweight folding cup great for outdoor camping, hiking and travel.</div><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Features</span></p><ul style=\"margin-bottom: var(--list-mb); margin-right: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: var(--li-pl); color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif; overflow-wrap: break-word; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; list-style-position: initial; list-style-image: initial; --list-mb: 20px; --li-mb: 10px; --li-pl: 17px;\"><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Using 100% pure food grade silicone making.</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Non-toxic, health, environmental protection, without any odor.</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Abrasion, impact resistance, high temperature up to 220 degrees, the temperature can&nbsp;&nbsp; reach -30 degrees resistant bottom</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Unbreakable, space-saving, easy to clean, is your travel and go camping grill a good helper.<br>After folding in the crowded small bag will not be deformed, light is very convenient, can be used for travel, picnics.</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Material: Silicone</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Color: Pink / Yellow / Green / Blue</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Size: 8X4.3X7CM / 3.14”*1.69”*2.75”</li></ul>', 790, 650, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:29:09', '2022-03-03 21:29:09'),
(87, 'ID', 0, 188, 187, NULL, NULL, 0, 'Invisible Drawer', 'Invisible-Drawer', 0, '<div class=\"detailmodule_text-image\" align=\"start\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; color: rgb(119, 119, 119);\"><p class=\"detail-desc-decorate-title\" style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">How to Use:</p><p class=\"detail-desc-decorate-content\" style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">1. Make sure the place to be installed clean and smooth.<br>2. Tear off the tape from the back, and push the tray on the under desk side.<br>3. Keep pressing all areas of the drawer for more than 30 seconds to make it stronger.<br>4.Use after 24 hours of inactivity</p></div><div class=\"detailmodule_text-image\" align=\"start\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; color: rgb(119, 119, 119);\"><p class=\"detail-desc-decorate-title\" style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">Features:</p><p class=\"detail-desc-decorate-content\" style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">Material: ABS.<br>Color: white, black<br>Package Includes: 1 x Storage Box</p></div>', 520, 450, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:30:12', '2022-03-03 21:30:12'),
(88, 'SSSO', 0, 190, 189, NULL, NULL, 0, 'Sink Soap & Sponge Organizer', 'Sink-Soap-&-Sponge-Organizer', 0, '<div class=\"detailmodule_text\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; color: rgb(119, 119, 119);\"><p class=\"detail-desc-decorate-title\" data-spm-anchor-id=\"a2g0o.detail.1000023.i0.71a0272d0S6oLo\" style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">Description:</p><p class=\"detail-desc-decorate-content\" style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">Product name: Adjustable hanging buckle type sink drain hanging bag</p><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">Material: PVC</p><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">Size: length; 15cm width: 5cm height: 8cm manual measurement error</p><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">Weight: 65g</p><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">Color: Picture color (due to chromatic aberration of light)</p><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">Uses; it can be hung on the faucet in the kitchen or bathroom to place sponges, dishcloths, razors, etc., and the bottom is hollowed out to drain water to keep it dry and not easy to breed bacteria.</p></div><div class=\"detailmodule_text\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; color: rgb(119, 119, 119);\"><p class=\"detail-desc-decorate-title\" style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">Advantage</p><p class=\"detail-desc-decorate-content\" style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">High-quality PVC material, healthy and environmentally friendly, flexible and durable. It can be hung on the faucet in the kitchen or bathroom. Place sponges, dishcloths, razors, etc. The bottom is hollowed out to keep it dry and not easy to breed bacteria.</p></div>', 390, 250, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:31:10', '2022-03-03 21:31:10'),
(89, 'MEBFP', 0, 192, 191, NULL, NULL, 0, 'Multifunctional Egg boiler and Fry pan', 'Multifunctional-Egg-boiler-and-Fry-pan', 0, '<div class=\"s-top\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; color: rgb(119, 119, 119);\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Description</span></div><div class=\"s-top\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; color: rgb(119, 119, 119);\"><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">2 in 1 easiest egg cooker with innovative design and fresh color, a part from preparing 6/7 eggs together, It is also a small frying pan to prepare all kinds of food. easy to use-plugins and its done, It has an indicator light when turned on plus automatic temperature sensor, easy cleaning process with non-stick coating, the set includes a measuring cup to measure water for the number of eggs.</p></div><div class=\"b-top\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; color: rgb(119, 119, 119);\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Highlights</span></div><div class=\"s-top b-bottom\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; color: rgb(119, 119, 119);\"><p style=\"margin-bottom: var(--wd-tags-mb); color: rgb(102, 102, 102); font-weight: inherit; line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: inherit;\">1 x multifunctional egg boiler and fry pan<br>1 x Transparent cover<br>1 x measurement cup<br>6 / 7 eggs capacity<br>Ergonomic handel<br>450g weight</p></div>', 1590, 1290, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:31:58', '2022-03-03 21:31:58'),
(90, 'GH', 0, 194, 193, NULL, NULL, 0, 'Gadget Holder', 'Gadget-Holder', 0, '<p><span style=\"color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif; font-size: 13px;\">Mobile Phone Holders Phone Charger Wall Mounted 4 Hooks Storage Hanger Rack Bathroom Hanging Holder Mobile charger stand walls.</span><br></p>', 450, 350, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:32:49', '2022-03-03 21:32:49'),
(91, 'SBW', 0, 196, 195, NULL, NULL, 0, 'Silicon Body Washer', 'Silicon-Body-Washer', 0, '<ul style=\"margin-bottom: var(--list-mb); margin-right: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: var(--li-pl); overflow-wrap: break-word; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; list-style-position: initial; list-style-image: initial; --list-mb: 20px; --li-mb: 10px; --li-pl: 17px; color: rgb(119, 119, 119);\"><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Product Description :-</li></ul><ul style=\"margin-bottom: var(--list-mb); margin-right: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: var(--li-pl); overflow-wrap: break-word; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; list-style-position: initial; list-style-image: initial; --list-mb: 20px; --li-mb: 10px; --li-pl: 17px; color: rgb(119, 119, 119);\"><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Made up of food-grade silica gel, health, and environmental protection, BPA free, no harmful substances. high-temperature resistance, not easy to rot, safe and durable.</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Suitable for different groups of people, children, the elderly, men, women can be.</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">With bump design, it can effectively bring you a cleansing effect and give you a comfortable experience.</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Pull handle, good toughness, strong resistance to pull, can be hung, save space.</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Lengthen the 1cm dense brush head, deep into the pores to clean the dirt, and refresh and clean</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">A double-sided massage shower belt is suitable for active massage during bathing. Promote skin blood circulation and accelerate metabolism</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Cleaning Type: Belt Application: Body Material: Silicon Bath Brush Massage Brush</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Features: Lengthen design, soft brush, massage skin, hanging hole design</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Advantages: Remove dirt, deep cleansing, no skin damage.</li></ul>', 690, 490, 0, 0, 0, 1, 0, 80, 300, NULL, NULL, '2022-03-03 21:33:34', '2025-05-23 09:56:18'),
(92, 'MBM', 0, 198, 197, NULL, NULL, 0, 'Mimo Body Massager', 'Mimo-Body-Massager', 0, '<p id=\"title\" class=\"a-size-large a-spacing-none\" style=\"margin-top: 4px; margin-bottom: var(--wd-tags-mb); font-size: 13px; color: rgb(119, 119, 119); line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Lato, Arial, Helvetica, sans-serif;\"><span id=\"productTitle\" class=\"a-size-large product-title-word-break\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Handheld Portable Electric Mini Massager Mini Vibrating Massager with Function.&nbsp;</span></p><ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: var(--li-pl); overflow-wrap: break-word; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; list-style-position: initial; list-style-image: initial; --list-mb: 20px; --li-mb: 10px; --li-pl: 17px; color: rgb(119, 119, 119);\"><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><span class=\"a-list-item\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Releases aches and pains, makes you feel comfortable.</span></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><span class=\"a-list-item\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Can be used regardless of sitting, standing or lying down.</span></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><span class=\"a-list-item\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">High performance vibrator provide better massage effect anytime anywhere.</span></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><span class=\"a-list-item\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Ultra compact and light, convenient for transport.</span></li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\"><span class=\"a-list-item\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Suitable for head, neck, shoulder, arm, waist, hips, legs, feet, eyes, chest, full body massage, hands</span></li></ul>', 690, 590, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:34:17', '2022-03-03 21:34:17'),
(93, 'FSSSR', 0, 200, 199, NULL, NULL, 0, 'Fold-able Stainless Steel Sink Racks', 'Fold-able-Stainless-Steel-Sink-Racks', 0, '<p><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif;\">Type: Water Filter Frame</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif;\">Material: Stainless Steel</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif;\">Features: Foldable, Creative Sink Rack, Water Filter</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif;\">Size Details</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif;\">S: 37cm x 23cm/14.57″ x 9.06″&nbsp;(Approx.)</span><br style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; color: rgb(119, 119, 119); font-family: Lato, Arial, Helvetica, sans-serif;\">M: 47cm x 23cm/18.5″ x 9.06″&nbsp;(Approx.)</span><br></p>', 990, 790, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:35:12', '2022-03-03 21:35:12');
INSERT INTO `products` (`id`, `sku`, `position`, `thumb`, `image`, `gallery_images`, `video_url`, `has_variant`, `name`, `slug`, `stock`, `description`, `price`, `sale_price`, `is_featured`, `is_best_sell`, `is_new_product`, `status`, `is_free_delivery`, `delivery_charge`, `purchase_cost`, `brand_name`, `fb_description`, `created_at`, `updated_at`) VALUES
(94, 'MCS', 0, 202, 201, NULL, NULL, 0, 'Master cutting scissors', 'Master-cutting-scissors', 0, '<ul class=\"packing-list\" style=\"margin-bottom: var(--list-mb); margin-right: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: var(--li-pl); overflow-wrap: break-word; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Lato, Arial, Helvetica, sans-serif; list-style-position: initial; list-style-image: initial; --list-mb: 20px; --li-mb: 10px; --li-pl: 17px; color: rgb(119, 119, 119);\"><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Shipping Weight :&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">0.75 kg</em></li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Net Weight :&nbsp;0.55kg</li><li style=\"list-style-type: none; margin-top: 0px; margin-right: 0px; margin-bottom: var(--li-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">Package Size :&nbsp;25.0cm x 15.0cm x 15.0cm</li><li style=\"list-style-type: none; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">What’s in the box :&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit;\">1 set x kitchen scissor</em></li></ul><p style=\"margin-top: 4px; margin-bottom: 4px; font-size: 13px; color: rgb(119, 119, 119); line-height: inherit; overflow-wrap: break-word; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-family: Lato, Arial, Helvetica, sans-serif;\">Features:<br>100% brand new and high quality<br>1.Multifunction stainless steel kitchen scissors, sharp, hard, thick, easy-sectional cut chicken bone.<br>2.Six very practical (cut meat and other food, opening cans, open nut shells, scraping scales, frying, etc.)<br>3.Also scraping scales, peel walnuts, open bottle, facilitate your life</p>', 590, 450, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-03 21:35:53', '2022-03-03 21:35:53'),
(95, 'OHCSK', 0, 216, 215, NULL, NULL, 0, 'Ohico Hair Color Stick Korean', 'Ohico-Hair-Color-Stick-Korean', 0, '<p><span style=\"color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\">For easy application, just press the bottom of the test tube and apply it to the target area, just like painting a hair. Apply evenly for maximum satisfaction. Dry and rinse hair. It takes only 5 minutes to dry!</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\"><span style=\"color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\">Waterproof-shampooing will not reduce its effectiveness. It is long-lasting and can withstand several shampoos. Water-resistant formula, no dripping.</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\"><span style=\"color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\">the perfect travel size. Convenient and compact design fits your pocket, bag or wallet!</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\"><span style=\"color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\">Item Type: Hair Color</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\"><span style=\"color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\">Capacity: 20ml</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\"><span style=\"color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\">colour:black/brown</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\"><span style=\"color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\">Material:plastic</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\"><span style=\"color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\">Package Contents:</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\"><span style=\"color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\">1 * hair dye</span><br style=\"box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(66, 70, 70); font-family: &quot;Times New Roman&quot;; font-size: medium;\"></p>', 890, 650, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-10 16:55:09', '2022-03-10 16:55:09'),
(96, 'GCRT', 0, 218, 217, NULL, NULL, 0, 'Glass Crack Repair Tools', 'Glass-Crack-Repair-Tools', 0, '<p><span style=\"color: rgb(102, 102, 102); font-family: raleway, sans-serif;\">কাঁচের ভাঙ্গা টুকরোগুলো কয়েক সেকেন্ডের মধ্যে জোড়া লেগে যাবে এবং এটি আগের শক্ত অবস্থায় ফিরে আসবে।গাড়ির কাঁচ, চশমার কাঁচ, মোবাইলের স্কিন বা যেকোনো ধরনের ভাঙ্গা কাঁচ অনায়াসে জোড়া লাগবে</span><br></p>', 990, 750, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-18 18:42:56', '2022-03-18 18:42:56'),
(97, 'MPP6', 0, 220, 219, NULL, NULL, 0, 'Mini Portable Pocket Shaver', 'Mini-Portable-Pocket-Shaver', 90, '<p style=\"margin-top: inherit; margin-right: inherit; margin-bottom: 1.3em; margin-left: inherit; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><span style=\"font-weight: bolder;\">ওয়ারেন্টিঃ ২ বছর</span></p><p style=\"margin-top: inherit; margin-right: inherit; margin-bottom: 1.3em; margin-left: inherit; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\">* শক্তিশালী মোটর: শক্তিশালী কাটিং, ক্লিন শেভ করা এখন হবে দ্রুত এবং শ্রম-সঞ্চয়।<br>* USB চার্জিং: এই বৈদ্যুতিক হেয়ার ক্লিপার বিভিন্ন চার্জিং পদ্ধতি সমর্থন করে, এবং USB পোর্ট সহ ল্যাপটপ, পাওয়ার ব্যাঙ্ক এবং অন্যান্য ডিভাইসগুলির সাথে চার্জ করা যেতে পারে৷<br>* কাটার মাথা: ধারালো ব্লেড মসৃণভাবে ও বিভিন্ন সূক্ষ্ম দাড়ি কাটে।</p><p style=\"margin-top: inherit; margin-right: inherit; margin-bottom: 1.3em; margin-left: inherit; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\">বর্ণনা:<br>এই শেভারটি আকারে ছোট, বহন করা সহজ এবং এটি ভ্রমণের সময়ও আপনাকে একটি ভিন্ন স্টাইলিং অভিজ্ঞতা এনে দিতে পারে।</p><p style=\"margin-top: inherit; margin-right: inherit; margin-bottom: 1.3em; margin-left: inherit; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\">স্পেসিফিকেশন:<br>* উপাদান : aluminum alloy<br>* চার্জিং: 2X ইউএসবি ফাস্ট চারজিং।<br>* চার্জিং টাইম: 2 ঘণ্টা।<br>* উজিং টাইম: 30মিনিট<br>* সাইজ: 106*26 সেমি।<br>* ব্যাটারি ক্ষমতা: 600mAh</p><p style=\"margin-top: inherit; margin-right: inherit; margin-bottom: 1.3em; margin-left: inherit; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\">প্যাকেজ অন্তর্ভুক্ত:<br>* 1 পিসি শেভার।<br>* 1pc USB চার্জিং কেবল।<br>* 1 পিসি ইংরেজি ম্যানুয়াল।<br>* 1 পিসি কালার বক্স।</p><p style=\"margin-top: inherit; margin-right: inherit; margin-bottom: 1.3em; margin-left: inherit; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><img src=\"https://i0.wp.com/cdn.shopify.com/s/files/1/0586/3718/9283/files/01_1_8b76e39f-3d6f-474c-9ab9-7730db841337_480x480.gif?w=1020&ssl=1\" data-recalc-dims=\"1\" class=\"jetpack-lazy-image jetpack-lazy-image--handled\" data-lazy-loaded=\"1\" loading=\"eager\" style=\"max-width: 100%; height: auto; border: 0px; display: inline-block; transition: opacity 1s ease 0s; opacity: 1;\"></p>', 990, 590, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2022-03-22 19:27:30', '2025-03-21 10:25:15'),
(98, 'SJ-001', 0, 225, 224, '226,227,228,229', NULL, 1, 'V-Neck Noble Long Printed Dress', 'v-neck-noble-long-printed-dress', 60, '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><ul style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\"><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><span style=\"font-weight: bolder;\">Fabric  Material: 100% Satin Drill</span></p><div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"font-family: Lato, sans-serif; font-size: medium;\"><div dir=\"auto\"><span style=\"font-size: 14.4px;\">Material: Polyester-50%, Spandex-50%</span></div><div dir=\"auto\">Made in China</div></div><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\">Size: L, XL, 2XL</p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\">Color: Yellow, Red, Green</p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\">Package contents: V-Neck Noble Long Printed Dress*1</p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><span style=\"font-weight: bolder;\">1- GREEN </span></p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><img class=\"alignnone size-full wp-image-1192 jetpack-lazy-image entered lazyloaded jetpack-lazy-image--handled\" src=\"https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-283.jpg?is-pending-load=1\" alt=\"\" width=\"300\" height=\"300\" srcset=\"https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-283.jpg 300w, https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-283-280x280.jpg 280w, https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-283-100x100.jpg 100w\" data-ll-status=\"loaded\" sizes=\"(max-width: 300px) 100vw, 300px\" data-lazy-loaded=\"1\" loading=\"eager\" style=\"max-width: 100%; height: auto; border: 0px; display: inline-block; transition: opacity 1s ease 0s; opacity: 1; margin-bottom: 2em;\"></p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><span style=\"font-weight: bolder;\">2-RED</span></p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><img class=\"alignnone size-full wp-image-1191 jetpack-lazy-image entered lazyloaded jetpack-lazy-image--handled\" src=\"https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-183.jpg?is-pending-load=1\" alt=\"\" width=\"300\" height=\"300\" srcset=\"https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-183.jpg 300w, https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-183-280x280.jpg 280w, https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-183-100x100.jpg 100w\" data-ll-status=\"loaded\" sizes=\"(max-width: 300px) 100vw, 300px\" data-lazy-loaded=\"1\" loading=\"eager\" style=\"max-width: 100%; height: auto; border: 0px; display: inline-block; transition: opacity 1s ease 0s; opacity: 1; margin-bottom: 2em;\"></p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><span style=\"font-weight: bolder;\">3-YELLOW</span></p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><img class=\"alignnone size-full wp-image-1275 jetpack-lazy-image entered jetpack-lazy-image--handled lazyloaded\" src=\"https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-383-1.jpg?is-pending-load=1\" alt=\"\" width=\"300\" height=\"300\" srcset=\"https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-383-1.jpg 300w, https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-383-1-280x280.jpg 280w, https://nmartbd.com/wp-content/uploads/2022/03/v-neck-noble-long-printed-dress-383-1-100x100.jpg 100w\" data-ll-status=\"loaded\" sizes=\"(max-width: 300px) 100vw, 300px\" data-lazy-loaded=\"1\" loading=\"eager\" style=\"max-width: 100%; height: auto; border: 0px; display: inline-block; transition: opacity 1s ease 0s; opacity: 1; margin-bottom: 2em;\"></p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><b style=\"font-weight: bold;\">4-Back Side</b></p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><img class=\"alignnone size-medium wp-image-1277 jetpack-lazy-image entered jetpack-lazy-image--handled lazyloaded\" src=\"https://nmartbd.com/wp-content/uploads/2022/03/61HSOmkpWpL._AC_SX569_-400x400.jpg?is-pending-load=1\" alt=\"\" width=\"400\" height=\"400\" srcset=\"https://nmartbd.com/wp-content/uploads/2022/03/61HSOmkpWpL._AC_SX569_-400x400.jpg 400w, https://nmartbd.com/wp-content/uploads/2022/03/61HSOmkpWpL._AC_SX569_-280x280.jpg 280w, https://nmartbd.com/wp-content/uploads/2022/03/61HSOmkpWpL._AC_SX569_-300x300.jpg 300w, https://nmartbd.com/wp-content/uploads/2022/03/61HSOmkpWpL._AC_SX569_-100x100.jpg 100w, https://nmartbd.com/wp-content/uploads/2022/03/61HSOmkpWpL._AC_SX569_.jpg 569w\" data-ll-status=\"loaded\" sizes=\"(max-width: 400px) 100vw, 400px\" data-lazy-loaded=\"1\" loading=\"eager\" style=\"max-width: 100%; height: auto; border: 0px; display: inline-block; transition: opacity 1s ease 0s; opacity: 1;\"></p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><img class=\"alignnone size-full wp-image-1278 jetpack-lazy-image entered jetpack-lazy-image--handled lazyloaded\" src=\"https://nmartbd.com/wp-content/uploads/2022/03/51pUiYOWaYL._AC_US200_.jpg?is-pending-load=1\" alt=\"\" width=\"200\" height=\"200\" srcset=\"https://nmartbd.com/wp-content/uploads/2022/03/51pUiYOWaYL._AC_US200_.jpg 200w, https://nmartbd.com/wp-content/uploads/2022/03/51pUiYOWaYL._AC_US200_-100x100.jpg 100w\" data-ll-status=\"loaded\" sizes=\"(max-width: 200px) 100vw, 200px\" data-lazy-loaded=\"1\" loading=\"eager\" style=\"max-width: 100%; height: auto; border: 0px; display: inline-block; transition: opacity 1s ease 0s; opacity: 1; margin-bottom: 2em;\"><img class=\"alignnone size-full wp-image-1280 jetpack-lazy-image entered jetpack-lazy-image--handled lazyloaded\" src=\"https://nmartbd.com/wp-content/uploads/2022/03/51OTA-g82WL._AC_US200_.jpg?is-pending-load=1\" alt=\"\" width=\"200\" height=\"200\" srcset=\"https://nmartbd.com/wp-content/uploads/2022/03/51OTA-g82WL._AC_US200_.jpg 200w, https://nmartbd.com/wp-content/uploads/2022/03/51OTA-g82WL._AC_US200_-100x100.jpg 100w\" data-ll-status=\"loaded\" sizes=\"(max-width: 200px) 100vw, 200px\" data-lazy-loaded=\"1\" loading=\"eager\" style=\"max-width: 100%; height: auto; border: 0px; display: inline-block; transition: opacity 1s ease 0s; opacity: 1; margin-bottom: 2em;\"></p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><img class=\"alignnone size-medium wp-image-1279 jetpack-lazy-image entered jetpack-lazy-image--handled lazyloaded\" src=\"https://nmartbd.com/wp-content/uploads/2022/03/71pI74hAw2L._AC_SL1500_-400x400.jpg?is-pending-load=1\" alt=\"\" width=\"400\" height=\"400\" srcset=\"https://nmartbd.com/wp-content/uploads/2022/03/71pI74hAw2L._AC_SL1500_-400x400.jpg 400w, https://nmartbd.com/wp-content/uploads/2022/03/71pI74hAw2L._AC_SL1500_-800x800.jpg 800w, https://nmartbd.com/wp-content/uploads/2022/03/71pI74hAw2L._AC_SL1500_-280x280.jpg 280w, https://nmartbd.com/wp-content/uploads/2022/03/71pI74hAw2L._AC_SL1500_-768x768.jpg 768w, https://nmartbd.com/wp-content/uploads/2022/03/71pI74hAw2L._AC_SL1500_-1320x1320.jpg 1320w, https://nmartbd.com/wp-content/uploads/2022/03/71pI74hAw2L._AC_SL1500_-300x300.jpg 300w, https://nmartbd.com/wp-content/uploads/2022/03/71pI74hAw2L._AC_SL1500_-600x600.jpg 600w, https://nmartbd.com/wp-content/uploads/2022/03/71pI74hAw2L._AC_SL1500_-100x100.jpg 100w, https://nmartbd.com/wp-content/uploads/2022/03/71pI74hAw2L._AC_SL1500_.jpg 1500w\" data-ll-status=\"loaded\" sizes=\"(max-width: 400px) 100vw, 400px\" data-lazy-loaded=\"1\" loading=\"eager\" style=\"max-width: 100%; height: auto; border: 0px; display: inline-block; transition: opacity 1s ease 0s; opacity: 1;\"></p><p style=\"margin-bottom: 1.3em; font-size: medium; color: rgb(102, 102, 102); line-height: 21px; font-family: Lato, sans-serif;\"><img class=\"alignnone size-full wp-image-1194 jetpack-lazy-image entered lazyloaded jetpack-lazy-image--handled\" src=\"https://nmartbd.com/wp-content/uploads/2022/03/275159744_489264862853204_5382751775094761621_n.png?is-pending-load=1\" alt=\"\" width=\"573\" height=\"268\" data-ll-status=\"loaded\" data-lazy-loaded=\"1\" loading=\"eager\" style=\"max-width: 100%; height: auto; border: 0px; display: inline-block; transition: opacity 1s ease 0s; opacity: 1; margin-bottom: 2em;\"></p></ul></ul>', 2880, 2450, 0, 0, 0, 1, 1, 100, 1800, NULL, NULL, '2022-04-02 14:47:18', '2025-05-23 09:56:05'),
(99, 'KBC258', 0, 261, 260, '262,263,264,265', 'https://www.youtube.com/shorts/PI-LT0ftz4U', 0, 'Luxury Men Slipper Mules Backless Half shoes-Pre-Order', 'luxury-men-slipper-mules-backless-half-shoes-pre-order', 37, '<div class=\"rte\" style=\"font-family: var(--fonts_name); color: rgb(80, 80, 80); letter-spacing: 0.2px;\"><span data-mce-fragment=\"1\" style=\"font-weight: bolder;\">Color:</span><span data-mce-fragment=\"1\"> Black</span><br data-mce-fragment=\"1\"><span data-mce-fragment=\"1\" style=\"font-weight: bolder;\">Upper Material:</span><span data-mce-fragment=\"1\"> PU Leather</span><br data-mce-fragment=\"1\"><span data-mce-fragment=\"1\" style=\"font-weight: bolder;\">Outsole Material:</span><span data-mce-fragment=\"1\"> Rubber</span><br data-mce-fragment=\"1\"><span data-mce-fragment=\"1\" style=\"font-weight: bolder;\">Closure Type:</span><span data-mce-fragment=\"1\"> Slip-On</span><br data-mce-fragment=\"1\"><span data-mce-fragment=\"1\" style=\"font-weight: bolder;\">Fit:</span><span data-mce-fragment=\"1\"> Fits true to size, take your normal size</span><br data-mce-fragment=\"1\"><span data-mce-fragment=\"1\" style=\"font-weight: bolder;\">Shoes Type:</span><span data-mce-fragment=\"1\"> Mules</span><br data-mce-fragment=\"1\"><span data-mce-fragment=\"1\" style=\"font-weight: bolder;\">Pattern Type:</span><span data-mce-fragment=\"1\"> Solid</span><br data-mce-fragment=\"1\"><span data-mce-fragment=\"1\" style=\"font-weight: bolder;\">Feature:</span><span data-mce-fragment=\"1\"> Breathable</span><br data-mce-fragment=\"1\"><span data-mce-fragment=\"1\" style=\"font-weight: bolder;\">Insole Material:</span><span data-mce-fragment=\"1\"> PU</span><br data-mce-fragment=\"1\"><span data-mce-fragment=\"1\" style=\"font-weight: bolder;\">Lining Material:</span><span data-mce-fragment=\"1\"> PU </span></div><div><span data-mce-fragment=\"1\"><br></span></div>', 2880, 2280, 0, 0, 0, 1, 0, 100, 2000, 'test', 'sdfd', '2022-04-04 07:07:01', '2026-04-23 06:33:01'),
(110, 'SRP', 0, 277, 276, '275', NULL, 0, 'Software Related Products', 'software-related-products', 0, '<div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0px; padding: 0px; font-size: 16px; color: rgb(61, 70, 77); font-family: \"Noto Sans Bengali\", Roboto, \"sans-serif\";\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\">Mini Smart power bank. 20000 mah battery</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0px; padding: 0px; font-size: 16px; color: rgb(61, 70, 77); font-family: \"Noto Sans Bengali\", Roboto, \"sans-serif\";\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\">বর্তমান সময়ে ফোন ছাড়া আমাদের জীবন টা কল্পনায় করা যায় কিন্তু লোডশেডিং ও ঝড় বৃষ্টির সময় বিদ্যুৎ না থাকলে এই গুরুত্বপূর্ণ ফোনটিই আমাদের অফ থাকে।</div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\">কোথাও ভ্রমণে গেলে একই সমস্যার সম্মুখীন হতে হয়।</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0px; padding: 0px; font-size: 16px; color: rgb(61, 70, 77); font-family: \"Noto Sans Bengali\", Roboto, \"sans-serif\";\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\">আপনার এই সমস্যা থেকে মুক্তি দিতে আমরা নিয়ে এলাম Mini Smart power bank. 20000 mah battery</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0px; padding: 0px; font-size: 16px; color: rgb(61, 70, 77); font-family: \"Noto Sans Bengali\", Roboto, \"sans-serif\";\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\">এটি-</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0px; padding: 0px; font-size: 16px; color: rgb(61, 70, 77); font-family: \"Noto Sans Bengali\", Roboto, \"sans-serif\";\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span class=\"html-span xexx8yu x4uap5 x18d9i69 xkhd6sd x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xgzva0m xhhsvwb xxymvpz xlup9mm x1kky2od\" style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif;\"><img class=\"xz74otr\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t33/1/16/2705.png\" alt=\"✅\" width=\"16\" height=\"16\" style=\"margin: 0px; padding: 0px; max-width: 100%;\"></span>হালকা ও সহজে বহনযোগ্য। পকেটের মধ্যেই বহন করতে পারবেন।</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0px; padding: 0px; font-size: 16px; color: rgb(61, 70, 77); font-family: \"Noto Sans Bengali\", Roboto, \"sans-serif\";\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span class=\"html-span xexx8yu x4uap5 x18d9i69 xkhd6sd x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xgzva0m xhhsvwb xxymvpz xlup9mm x1kky2od\" style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif;\"><img class=\"xz74otr\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t33/1/16/2705.png\" alt=\"✅\" width=\"16\" height=\"16\" style=\"margin: 0px; padding: 0px; max-width: 100%;\"></span> ছোট স্মার্ট পাওয়ার ব্যাংক।</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0px; padding: 0px; font-size: 16px; color: rgb(61, 70, 77); font-family: \"Noto Sans Bengali\", Roboto, \"sans-serif\";\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span class=\"html-span xexx8yu x4uap5 x18d9i69 xkhd6sd x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xgzva0m xhhsvwb xxymvpz xlup9mm x1kky2od\" style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif;\"><img class=\"xz74otr\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t33/1/16/2705.png\" alt=\"✅\" width=\"16\" height=\"16\" style=\"margin: 0px; padding: 0px; max-width: 100%;\"></span>সাথে আছি টর্চ লাইট।</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0px; padding: 0px; font-size: 16px; color: rgb(61, 70, 77); font-family: \"Noto Sans Bengali\", Roboto, \"sans-serif\";\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span class=\"html-span xexx8yu x4uap5 x18d9i69 xkhd6sd x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xgzva0m xhhsvwb xxymvpz xlup9mm x1kky2od\" style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif;\"><img class=\"xz74otr\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t33/1/16/2705.png\" alt=\"✅\" width=\"16\" height=\"16\" style=\"margin: 0px; padding: 0px; max-width: 100%;\"></span>নিজে ব্যাবহার করার জন্য এবং গিফটের জন্য দারুন একটা প্রোডাক্ট।</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0px; padding: 0px; font-size: 16px; color: rgb(61, 70, 77); font-family: \"Noto Sans Bengali\", Roboto, \"sans-serif\";\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span class=\"html-span xexx8yu x4uap5 x18d9i69 xkhd6sd x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xgzva0m xhhsvwb xxymvpz xlup9mm x1kky2od\" style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif;\"><img class=\"xz74otr\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t33/1/16/2705.png\" alt=\"✅\" width=\"16\" height=\"16\" style=\"margin: 0px; padding: 0px; max-width: 100%;\"></span>গেম লাভার ও ভ্রমণপিয়াসু দের জন্য অত্যাবশকীয়।</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0px; padding: 0px; font-size: 16px; color: rgb(61, 70, 77); font-family: \"Noto Sans Bengali\", Roboto, \"sans-serif\";\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span class=\"html-span xexx8yu x4uap5 x18d9i69 xkhd6sd x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xgzva0m xhhsvwb xxymvpz xlup9mm x1kky2od\" style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif;\"><img class=\"xz74otr\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t33/1/16/2705.png\" alt=\"✅\" width=\"16\" height=\"16\" style=\"margin: 0px; padding: 0px; max-width: 100%;\"></span>এটার মাধ্যমে আপনি আপনার ফোনে নিমিষেই ইনস্ট্যান্ট ৩ থেকে ৫ বার চার্জ দিতে পারবেন।</div></div><div class=\"x11i5rnm xat24cr x1mh8g0r x1vvkbs xtlvy1s x126k92a\" style=\"margin: 0px; padding: 0px; font-size: 16px; color: rgb(61, 70, 77); font-family: \"Noto Sans Bengali\", Roboto, \"sans-serif\";\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\">যাদের প্রয়োজন অতি দ্রুত অর্ডার কনর্ফাম করুন।</div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><br style=\"margin: 0px; padding: 0px;\"></div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\" style=\"margin: 0px; padding: 0px;\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif; font-weight: bolder;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px; padding: 0px;\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" style=\"margin: 0px; padding: 0px; max-width: 100%;\"></span> <span style=\"margin: 0px; padding: 0px; font-family: verdana, geneva, sans-serif;\">ডেলিভারি পদ্ধতি-</span></span></div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: verdana, geneva, sans-serif;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif;\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t39/1.5/16/1f3d9.png\" alt=\"🏙️\" width=\"16\" height=\"16\" style=\"margin: 0px; padding: 0px; max-width: 100%;\"></span> ঢাকার মধ্যেঃ হোম ডেলিভারি।পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</span></div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: verdana, geneva, sans-serif;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif;\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/td0/1.5/16/1f3e1.png\" alt=\"🏡\" width=\"16\" height=\"16\" style=\"margin: 0px; padding: 0px; max-width: 100%;\"></span> ঢাকার বাইরেঃ দেশের সকল জেলা-উপজেলা এবং ইউনিয়ন পর্যায়ে পাচ্ছেন হোম ডেলিভারি সুবিধা।</span></div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: verdana, geneva, sans-serif;\">পণ্য হাতে পাবার পর দাম পরিশোধ করুন।</span></div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"> </div></div><div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\" style=\"margin: 0px; padding: 0px;\"><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: verdana, geneva, sans-serif;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif;\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb3/1.5/16/1f4b0.png\" alt=\"💰\" width=\"16\" height=\"16\" style=\"margin: 0px; padding: 0px; max-width: 100%;\"></span><span style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif; font-weight: bolder;\">ডেলিভারী চার্জ-</span></span></div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: verdana, geneva, sans-serif;\">ঢাকার মধ্যেঃ 60/- টাকা</span></div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: verdana, geneva, sans-serif;\">ঢাকার বাইরেঃ 130/- টাকা</span></div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"> </div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: verdana, geneva, sans-serif;\"><span style=\"margin: 0px; padding: 0px; font-family: Ador-Regular, sans-serif; font-weight: bolder;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px; padding: 0px;\"><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t6f/1.5/16/1f69a.png\" alt=\"🚚\" width=\"16\" height=\"16\" style=\"margin: 0px; padding: 0px; max-width: 100%;\"></span> রিটার্ন পলিসি-</span></span></div><div dir=\"auto\" style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: verdana, geneva, sans-serif;\">প্রোডাক্টটি অবশ্যই ডেলিভারি ম্যানের সামনে দেখে-বুঝে নিবেন। প্রোডাক্ট পছন্দ না হলে কিংবা কোন সমস্যা থাকলে আমাদের হেল্পলাইনে কল করে আপনার সমস্যার কথা জানাবেন। অন্যথায় প্রোডাক্ট আনবক্সিং করার সময় অবশ্যই ভিডিও করে সেটা আমাদের পাঠাবেন। সমস্যা থাকলে আমরা সেটা এক্সচেঞ্জ করে দিবো তবে আপনাকে পুনরায় ডেলিভারি চার্জ দিয়ে প্রোডাক্টটি রিসিভ করতে হবে।</span></div></div></div></div>', 40000, 25000, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, '2026-04-23 06:39:46', '2026-04-23 06:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `variant`, `sku`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(83, 98, 'red-8_inch', 'red-8_inch', 2450, 10, NULL, '2025-05-23 09:56:05', '2025-05-23 09:56:05'),
(84, 98, 'red-12_inch', 'red-12_inch', 2450, 10, NULL, '2025-05-23 09:56:05', '2025-05-23 09:56:05'),
(85, 98, 'green-8_inch', 'green-8_inch', 2450, 10, NULL, '2025-05-23 09:56:05', '2025-05-23 09:56:05'),
(86, 98, 'green-12_inch', 'green-12_inch', 2450, 10, NULL, '2025-05-23 09:56:05', '2025-05-23 09:56:05'),
(87, 98, 'blue-8_inch', 'blue-8_inch', 2450, 10, NULL, '2025-05-23 09:56:05', '2025-05-23 09:56:05'),
(88, 98, 'blue-12_inch', 'blue-12_inch', 2450, 10, NULL, '2025-05-23 09:56:05', '2025-05-23 09:56:05'),
(124, 99, 'm', 'm', 2280, 11, NULL, '2026-04-23 06:33:01', '2026-04-23 06:33:01'),
(125, 99, 's', 's', 2280, 16, NULL, '2026-04-23 06:33:01', '2026-04-23 06:33:01'),
(126, 99, 'xl', 'xl', 2280, 10, NULL, '2026-04-23 06:33:01', '2026-04-23 06:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_variants`
--

CREATE TABLE `product_attribute_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_attribute_id` int(11) DEFAULT NULL,
  `choice_attribute_item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute_variants`
--

INSERT INTO `product_attribute_variants` (`id`, `product_attribute_id`, `choice_attribute_item_name`, `created_at`, `updated_at`) VALUES
(33, 117, 'm', '2026-04-16 07:57:43', '2026-04-16 07:57:43'),
(34, 117, 'green', '2026-04-16 07:57:43', '2026-04-16 07:57:43'),
(35, 118, 'm', '2026-04-16 07:57:43', '2026-04-16 07:57:43'),
(36, 118, 'blue', '2026-04-16 07:57:43', '2026-04-16 07:57:43'),
(37, 119, 'xl', '2026-04-16 07:57:43', '2026-04-16 07:57:43'),
(38, 119, 'green', '2026-04-16 07:57:43', '2026-04-16 07:57:43'),
(39, 120, 'xl', '2026-04-16 07:57:43', '2026-04-16 07:57:43'),
(40, 120, 'blue', '2026-04-16 07:57:43', '2026-04-16 07:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_choice_attributes`
--

CREATE TABLE `product_choice_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_choice_attribute_items`
--

CREATE TABLE `product_choice_attribute_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `choice_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_item_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `type`, `text`, `amount`, `status`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'ঢাকার ভিতরে', 'ঢাকার ভিতরে ডেলিভারি', 70, 1, 0, '2022-02-07 06:31:45', '2024-10-25 13:15:27'),
(2, 'ঢাকার বাইরে', 'ঢাকার বাইরে ডেলিভারি', 120, 1, 1, '2022-02-07 06:31:54', '2024-10-25 13:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` int(11) DEFAULT NULL,
  `slider_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=unpublished, 1=published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `slider_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, NULL, 1, '2022-02-07 06:47:25', '2022-02-07 06:47:25'),
(2, 15, NULL, 1, '2022-02-07 06:47:36', '2022-02-07 06:47:36'),
(3, 16, NULL, 1, '2022-02-07 06:47:51', '2022-02-07 06:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `stead_fast_apis`
--

CREATE TABLE `stead_fast_apis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `api_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stead_fast_apis`
--

INSERT INTO `stead_fast_apis` (`id`, `is_active`, `api_key`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'humayun kabir', NULL, '01681636068', 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, '$2y$10$pj0iJNOZ2SQ78KojcEjR0epXCOUeTDJsj1YxRc/qhNwBXrqsbbGEW', 1, NULL, '2025-05-23 09:53:39', '2025-05-23 09:53:39'),
(2, 'Rayhan Rafi', NULL, '01681636654', 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, '$2y$10$xFRJNhbqj81GVng4gsheWuB7J1MUJzOIqKt4A8H32JE4TIMOfGuhe', 1, NULL, '2025-05-23 09:54:44', '2025-05-23 09:54:44'),
(3, 'Test Name', NULL, '01180402273', 'est', NULL, '$2y$10$Uo1GRzNuPj9HtRnhpC3sz.zTqZ6pfjmP0bqyIAHesZtOOR7Amw2Xy', 1, NULL, '2025-05-23 13:13:42', '2025-05-23 13:13:42'),
(4, 'test customer', NULL, '01923384756', 'fefef', NULL, '$2y$10$TcClHMgfr0g4Phb0Aqy2fO9yx9axk/OPSaMcNezaBKWPZb/co7Qjq', 1, NULL, '2025-07-27 09:18:18', '2025-07-27 09:18:18'),
(5, 'test name', NULL, '01681636', 'ljko', NULL, '$2y$10$2EenI3dsg3nqE7FpsTYUI.xWozlDKt9Uf2aU5UTutHzNHPNs0bmgK', 1, NULL, '2025-07-27 09:24:01', '2025-07-27 09:24:01'),
(6, 'test customer', NULL, '016816360', 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, '$2y$10$ikyyGeOkB2jNahg0dt4euu0iaxQWDkp0XiAWlpEY.pYb/VBoyqj7a', 1, NULL, '2025-07-27 11:29:54', '2025-07-27 11:29:54'),
(7, 'test customer', NULL, '01681636063', 'H#413,Back side of BRTA, Senpara Porbota, Mirpur 10, Dhaka', NULL, '$2y$10$H07ef8H8k95Lm401B8nyZeCoDyYzDncAvN9W46LLCrLr/NlVRJURi', 1, NULL, '2025-07-27 13:14:28', '2025-07-27 13:14:28'),
(8, 'test customer', NULL, '06816366543', 'fdf', NULL, '$2y$10$hn2TWJlWtSCqrCeNMbpYSu4pd/kQ2ucZqKMcL5tqL4sTxnBjTSoGe', 1, NULL, '2025-07-30 19:47:14', '2025-07-30 19:47:14'),
(9, 'test customer', NULL, '08163606855', 'fe', NULL, '$2y$10$5zsmL9O1UOi2.PsgnFqHC./lHlvuTRKyJ3MxEcJTVOLSH6tGK47RK', 1, NULL, '2025-07-30 19:48:09', '2025-07-30 19:48:09'),
(10, 'test customer', NULL, '06816366544', 'fe', NULL, '$2y$10$yonT0On18lKkxTl8ClmS1OaPG6yauTbtPtIOSFt8GDfOaz/o4jjj2', 1, NULL, '2025-07-30 19:51:19', '2025-07-30 19:51:19'),
(11, 'test customer', NULL, '06816360683', 'e', NULL, '$2y$10$7oEntDTZfm1tV.XdcArnNuq02Hv.ckotZ8SN.9Pqmjxh.6pO16o32', 1, NULL, '2025-07-30 19:54:23', '2025-07-30 19:54:23'),
(12, 'test customer', NULL, '09986666554', 'fef', NULL, '$2y$10$3QQC7OsOH9DE31qJnBKvF.95pMK70VRwfFF7yb6US6Io6106UCCYW', 1, NULL, '2025-07-30 19:57:19', '2025-07-30 19:57:19'),
(13, 'test customer', NULL, '01575622354', 'fe', NULL, '$2y$10$iQgZhtKkJwyelmuVSYca7OoC9m6eXHQ.zSY1zY0bSN781xl5EXRDu', 1, NULL, '2025-07-30 20:01:06', '2025-07-30 20:01:06'),
(14, 'Motiur Rahman', NULL, '01577298633', 'Mirpur 10, Dhaka, Bangladesh', NULL, '$2y$10$mUjgEBDNPCv6xhsPxruYxOwbtaDBF7YIUMPL3kJKLI/l2I4A0Bi9q', 1, NULL, '2026-05-10 04:27:49', '2026-05-10 04:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_phone3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_header_logo` int(11) DEFAULT NULL,
  `website_favicon` int(11) DEFAULT NULL,
  `website_copyright_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bkash_merchant_numb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_pixel` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_prefix` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gtm_head` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gtm_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_otp` tinyint(4) NOT NULL DEFAULT 0,
  `sender_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `website_address`, `website_phone`, `website_phone2`, `website_phone3`, `website_email`, `website_email2`, `website_facebook`, `website_twitter`, `website_linkedin`, `website_header_logo`, `website_favicon`, `website_copyright_text`, `currency_sign`, `bkash_merchant_numb`, `fb_pixel`, `invoice_prefix`, `gtm_head`, `gtm_body`, `is_otp`, `sender_id`, `api_key`, `otp_message`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '0123456789', '01255477874', '12547885541', 'info@unisalemart.com', NULL, 'https://www.facebook.com/', 'https://www.twitter.com', 'https://www.linkedin.com', 268, NULL, '<i class=\"fa fa-copyright\"></i> 2024 <a href=\"https://unisalemart.com\" target=\"_blank\">Unisale Mart</a> All Right Reserved.', '৳', NULL, NULL, 'USM', '<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-PK8PQVXN\');</script>', '<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-PK8PQVXN\"\r\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>', 0, '8809601013385', 'C300076965eb2adf0ccb99.25502263', 'Your OTP from Unisalemart is: {$otp}', '2022-02-06 19:22:05', '2026-05-03 04:46:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abandoned_carts`
--
ALTER TABLE `abandoned_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_items`
--
ALTER TABLE `attribute_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier_cities`
--
ALTER TABLE `courier_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier_zones`
--
ALTER TABLE `courier_zones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `employees_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_categories`
--
ALTER TABLE `landing_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `landing_pages`
--
ALTER TABLE `landing_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_page_theme` (`theme_id`);

--
-- Indexes for table `landing_themes`
--
ALTER TABLE `landing_themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_theme_category` (`category_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `managers_email_unique` (`email`),
  ADD UNIQUE KEY `managers_phone_unique` (`phone`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_invoice_id_unique` (`invoice_id`);

--
-- Indexes for table `order_assigns`
--
ALTER TABLE `order_assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_attribute_variants`
--
ALTER TABLE `product_attribute_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_choice_attributes`
--
ALTER TABLE `product_choice_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_choice_attribute_items`
--
ALTER TABLE `product_choice_attribute_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stead_fast_apis`
--
ALTER TABLE `stead_fast_apis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abandoned_carts`
--
ALTER TABLE `abandoned_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attribute_items`
--
ALTER TABLE `attribute_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courier_cities`
--
ALTER TABLE `courier_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courier_zones`
--
ALTER TABLE `courier_zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landing_categories`
--
ALTER TABLE `landing_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `landing_pages`
--
ALTER TABLE `landing_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landing_themes`
--
ALTER TABLE `landing_themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_assigns`
--
ALTER TABLE `order_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `product_attribute_variants`
--
ALTER TABLE `product_attribute_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_choice_attributes`
--
ALTER TABLE `product_choice_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_choice_attribute_items`
--
ALTER TABLE `product_choice_attribute_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stead_fast_apis`
--
ALTER TABLE `stead_fast_apis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `landing_pages`
--
ALTER TABLE `landing_pages`
  ADD CONSTRAINT `fk_page_theme` FOREIGN KEY (`theme_id`) REFERENCES `landing_themes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `landing_themes`
--
ALTER TABLE `landing_themes`
  ADD CONSTRAINT `fk_theme_category` FOREIGN KEY (`category_id`) REFERENCES `landing_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
