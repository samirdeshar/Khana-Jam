-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2024 at 05:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_year`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_text` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `description` text COLLATE utf8mb4_unicode_ci,
  `team_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_backgroundtext` text COLLATE utf8mb4_unicode_ci,
  `team_description` text COLLATE utf8mb4_unicode_ci,
  `team_features` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `user_id`, `title`, `slug`, `image`, `slogan`, `background_text`, `status`, `description`, `team_title`, `team_backgroundtext`, `team_description`, `team_features`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Velit exercitationem', 'about', 'Earum a delectus do', 'Beatae velit optio', 'Qui sit aut commodi', 'active', NULL, 'Iure veniam et esse', 'Et delectus qui eos', NULL, NULL, '2024-02-24 21:34:55', '2024-02-24 21:36:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `res_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `res_id`, `name`, `email`, `comment`, `rating`, `created_at`, `updated_at`) VALUES
(11, NULL, '1', 'Oprah Blake', 'cuzibyr@mailinator.com', 'Dolor voluptate ipsa', '3', '2024-03-06 09:50:57', '2024-03-06 09:50:57'),
(12, '1', '1', 'Mikayla Bush', 'duhe@mailinator.com', 'Aut et sed qui excep', '3', '2024-03-06 16:59:40', '2024-03-06 16:59:40'),
(13, '1', '1', 'Kay Cortez', 'dafutiz@mailinator.com', 'Assumenda eius assum', '5', '2024-03-06 16:59:51', '2024-03-06 16:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(42, 'Ruth Finley', 'vasomuby@mailinator.com', 'Aut modi omnis minim', 'Eiusmod enim explica', '2024-03-06 15:58:37', '2024-03-06 15:58:37'),
(43, 'Ruth Finley', 'vasomuby@mailinator.com', 'Aut modi omnis minim', 'Eiusmod enim explica', '2024-03-06 15:58:47', '2024-03-06 15:58:47'),
(44, 'Orson Stout', 'cahe@mailinator.com', 'Commodo molestias el', 'Voluptate et nisi in', '2024-03-06 15:58:55', '2024-03-06 15:58:55'),
(45, 'Orson Stout', 'cahe@mailinator.com', 'Commodo molestias el', 'Voluptate et nisi in', '2024-03-06 15:59:11', '2024-03-06 15:59:11'),
(46, 'Logan Knapp', 'hugelyf@mailinator.com', 'Minus qui occaecat s', 'Eos harum et est v', '2024-03-06 16:04:28', '2024-03-06 16:04:28'),
(47, 'Logan Knapp', 'hugelyf@mailinator.com', 'Minus qui occaecat s', 'Eos harum et est v', '2024-03-06 16:04:38', '2024-03-06 16:04:38'),
(48, 'Logan Knapp', 'hugelyf@mailinator.com', 'Minus qui occaecat s', 'Eos harum et est v', '2024-03-06 16:05:02', '2024-03-06 16:05:02'),
(49, 'Logan Knapp', 'hugelyf@mailinator.com', 'Minus qui occaecat s', 'Eos harum et est v', '2024-03-06 16:05:28', '2024-03-06 16:05:28'),
(50, 'Logan Knapp', 'hugelyf@mailinator.com', 'Minus qui occaecat s', 'Eos harum et est v', '2024-03-06 16:09:20', '2024-03-06 16:09:20'),
(51, 'Logan Knapp', 'hugelyf@mailinator.com', 'Minus qui occaecat s', 'Eos harum et est v', '2024-03-06 16:09:40', '2024-03-06 16:09:40'),
(52, 'Maile Kirkland', 'vazovi@mailinator.com', 'Eveniet sunt neque', 'Dolor consequuntur u', '2024-03-06 16:11:40', '2024-03-06 16:11:40'),
(53, 'Blossom Harmon', 'zizulakal@mailinator.com', 'Sed Nam laudantium', 'Quas suscipit repell', '2024-03-07 10:40:27', '2024-03-07 10:40:27'),
(54, 'Samir Deshar', 'sameerdeshar99@gmail.com', 'hello', 'this is a test message', '2024-03-07 10:41:28', '2024-03-07 10:41:28'),
(55, 'test', 'test@gmail.com', 'test', 'testtttt1', '2024-03-07 11:00:58', '2024-03-07 11:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `title` enum('mr','mrs','ms') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mr',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `title`, `first_name`, `middle_name`, `last_name`, `country`, `city`, `email`, `contact_num`, `password`, `created_at`, `updated_at`) VALUES
(8, 'mr', 'Ava', 'Basil Rosario', 'Avila', 'Perspiciatis ullamc', 'Expedita explicabo', 'xuvelarata@mailinator.com', 'Dolorem qui saepe do', '$2y$10$DjO0EhtcG1r.Ne7KpJ5k5.Jx7N3XmxzTqkc718NhgKH0U7AdjhMMy', '2024-01-03 11:22:54', '2024-01-03 11:22:54'),
(9, 'mr', 'Eugenia', 'Mercedes Espinoza', 'Durham', 'Velit sint molestia', 'lalitpur', 'sameerdeshar99@gmail.com', 'Ad ut aut accusamus', '$2y$10$9yqpL2ehCGttm9Im.QR3..jvamvfKPMOKeGIZWJf9pxZ4nINANLny', '2024-01-03 13:22:22', '2024-01-03 13:22:22'),
(10, 'mr', 'sandip', NULL, 'dangol', 'nepal', 'lalitpur', 'shymondgl12@gmail.com', '989728887', '$2y$10$mkdAm0aJhkfmqbKF7ceqG.26Ch29GT6EFb1QX7OmsNkGGnXXuxpnW', '2024-01-04 23:34:43', '2024-01-04 23:34:43'),
(11, 'mr', 'aseem', NULL, 'maharjan', 'nepal', 'lalitpur', 'aseem@gmail.com', '12334555', '$2y$10$G9AvtqAcwx2LhWt6CwgWWeo5WqTVTCuoRt53XGk8oDAofzjP/rlJe', '2024-01-04 23:44:32', '2024-01-04 23:44:32'),
(12, 'mr', 'sunset', 'kim', 'tan', 'Nepal', 'Lalitpur', 'sunset@gmail.com', '9878765689', '$2y$10$dHQ.Tehkx9YeKBZo/g9qj.ub.AUT6yxvNVs7MVtZorYF7feRVs0A6', '2024-01-05 03:45:36', '2024-01-05 03:45:36'),
(13, 'mr', 'Aquila', 'Elton Wheeler', 'Valdez', 'Sapiente quo volupta', 'Unde adipisci ipsum', 'xalytijanu@mailinator.com', 'Illum qui autem qui', '$2y$10$nXCLSI5gzZcSWjoGURNUzexZ2IAXCd.OUgLEAEemhGW/7lN.73BFG', '2024-02-01 06:37:40', '2024-02-01 06:37:40'),
(14, 'mr', 'Ferris', 'Dieter Ferguson', 'Nolan', 'Aute est autem debit', 'Aliquid rem quibusda', 'kycih@mailinator.com', 'Aut vero aspernatur', '$2y$10$MRZZK3Y7tuGSSTfy5ulYu.3BIf0jL6vh4Ed.t0uFQg42SyktSczzu', '2024-03-04 08:49:34', '2024-03-04 08:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `general_faqs`
--

CREATE TABLE `general_faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_faqs`
--

INSERT INTO `general_faqs` (`id`, `user_id`, `slug`, `title`, `description`, `status`, `meta_title`, `meta_keywords`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 1, 'what-is-dinescape5791', 'What is DineScape?', '<p>DineScape is a resturant recommendation platform that helps to fill the hunger with the taste of local and galli vibes without having to ask to anyone.</p>', 'active', NULL, NULL, NULL, NULL, '2024-02-01 06:04:49', '2024-02-01 06:04:49'),
(6, 1, 'is-this-project-live86695', 'Is this project live?', '<p>This is just the demo project made as final year project so it is not live.</p>', 'active', NULL, NULL, NULL, NULL, '2024-03-01 07:35:19', '2024-03-01 07:35:19'),
(7, 1, 'quia-ex-iure-natus-q44557', 'Quia ex iure natus q', '<p>asdasd</p>', 'active', NULL, NULL, NULL, '2024-03-06 10:03:12', '2024-03-06 03:03:56', '2024-03-06 10:03:12'),
(8, 1, 'animi-molestiae-aut53723', 'Animi molestiae aut', '<p>asdasdas</p>', 'active', NULL, NULL, NULL, '2024-03-06 10:03:12', '2024-03-06 10:02:03', '2024-03-06 10:03:12'),
(9, 1, 'ipsum-aspernatur-te27639', 'Ipsum aspernatur te', '<p>asdasd</p>', 'inactive', NULL, NULL, NULL, '2024-03-06 10:03:12', '2024-03-06 10:02:53', '2024-03-06 10:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `maps_data`
--

CREATE TABLE `maps_data` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `city` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive' COMMENT 'inactive|active',
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maps_data`
--

INSERT INTO `maps_data` (`id`, `name`, `slug`, `image`, `city`, `description`, `status`, `latitude`, `longitude`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 'Taylor Jenkins', 'taylor-jenkins', 'http://127.0.0.1:8000/storage/photos/1/cute.png', 'Lalitpur', '<p>asd</p>', 'active', 27.607414977290098, 85.32895450367431, 'Consequatur Hic aut, asd, lalitpur', '2024-03-06 16:41:53', '2024-03-06 16:41:53'),
(2, 'Dorothy Vargas', 'dorothy-vargas', 'http://127.0.0.1:8000/storage/photos/1/logo (1).png', 'Kathmandu', '<p>asdasd</p>', 'active', 27.699178876071663, 85.32084350361328, 'Veniam itaque quaer', '2024-03-06 16:42:42', '2024-03-06 16:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int NOT NULL,
  `main_child` tinyint(1) NOT NULL,
  `title_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `header_footer` int DEFAULT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` longtext COLLATE utf8mb4_unicode_ci,
  `page_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `external_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_status` tinyint(1) DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `og_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trip_selection` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `category_slug`, `position`, `main_child`, `title_slug`, `content_slug`, `parent_id`, `header_footer`, `banner_image`, `image`, `icon`, `page_title`, `content`, `external_link`, `publish_status`, `meta_title`, `meta_keywords`, `meta_description`, `og_image`, `created_at`, `updated_at`, `trip_selection`) VALUES
(4, 'Contact Us', 'contact-us', 'contact-us', 3, 0, 'contact-us', NULL, NULL, 3, 'storage/photos/1/About Us/26.jpg', 'storage/photos/1/Icon/Contact (1).png', NULL, 'Contact Us', NULL, NULL, 1, NULL, NULL, 'PLAN YOUR NEXT VACATION, SPEAK TO OUR TRAVEL EXPERTS TODAY \r\n 01-4520907 \r\n+977-9851183906 ( Viber/Whatsapp )\r\n+977-9849083907\r\ninfo@himalayanglimpse.com\r\nFIND US IN KATHMANDU, NEPAL\r\nHIMALAYAN GLIMPSE NEPAL PVT.LTD\r\nJyatha, Thamel, Kathmandu Nepal\r\nPhone : +977- 4520907 \r\nCell : 9851183906 ( Viber/Whatsapp )\r\n+977-9849083907\r\n\r\nSUBSCRIBE TO OUR MAILING LIST\r\nSign up today for monthly giveaways, engaging stories & videos, special offers & more!\r\nEnter your email here\r\nCAPTCHA\r\n\r\nTrip Advisor\r\nSISTER CONCERNS\r\n  \r\nOUR AFFILIATES', NULL, '2022-08-04 03:38:39', '2024-02-01 07:17:37', NULL),
(71, 'About Us', 'about-us', 'about-us', 4, 0, 'about-us', NULL, NULL, 1, 'https://beta.megaadventuresintl.com/public/storage/photos/1/02-Phakding-300x178.jpg', 'http://127.0.0.1:8000/storage/photos/ddeec10f5cc15cd977eebf732242fed5.jpg', NULL, 'about-us', '<p>This is About Page</p>', 'about', 1, NULL, NULL, NULL, NULL, '2023-05-04 09:56:13', '2024-02-01 07:17:37', NULL),
(73, 'Explore Resturants', 'explore-resturants', 'page', 2, 0, 'explore-resturants', NULL, NULL, 1, 'Et eu possimus vel', 'Accusantium eu delec', NULL, 'Explore Resturants', NULL, 'explore_resturants', 1, 'Quis elit tempora a', 'Irure asperiores vol', 'Id dolorum unde aut', NULL, '2024-02-01 06:13:56', '2024-02-01 07:17:37', NULL),
(74, 'Home', 'home', 'page', 1, 0, 'home', NULL, NULL, 3, 'asd', 'asd', NULL, 'home', NULL, '/', 1, NULL, NULL, NULL, NULL, '2024-02-01 06:26:43', '2024-03-01 07:55:04', NULL),
(76, 'FAQ', 'faq', 'faq', 5, 0, '', NULL, NULL, 2, 'http://127.0.0.1:8000/storage/photos/1/panda.png', 'sad', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-03-05 23:46:40', '2024-03-05 23:46:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'ABOUT US', 'about-us', '2022-08-04 03:31:16', '2022-08-04 03:31:16'),
(4, 'CONTACT US', 'contact-us', '2022-08-04 03:31:16', '2022-08-04 03:31:16'),
(6, 'page', 'page', NULL, NULL),
(7, 'BLOG', 'blog', '2022-11-27 04:42:34', '2022-11-27 04:42:34'),
(11, 'FAQ', 'faq', '2024-02-01 06:11:31', '2024-02-01 06:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2024_02_16_103725_create_sliders_table', 2),
(3, '2024_02_25_023120_create_abouts_table', 3),
(5, '2024_03_06_042423_create_contacts_table', 4),
(6, '2024_03_06_104746_create_notifications_table', 5),
(7, '2023_12_30_150930_create_maps_data_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('3abe1927-53bb-409f-bc9f-8ae8b9a2cae0', 'App\\Notifications\\ContactFormNotification', 'App\\Models\\User', 1, '{\"message\":\"New contact message from Blossom Harmon\"}', '2024-03-07 11:00:08', '2024-03-07 10:40:30', '2024-03-07 10:40:30'),
('49286499-dff9-45da-b6e1-090cc41dc214', 'App\\Notifications\\ContactFormNotification', 'App\\Models\\User', 1, '{\"message\":\"New contact message from Logan Knapp\"}', NULL, '2024-03-06 16:09:40', '2024-03-06 16:09:40'),
('6bf8e1e8-f0be-4409-b67e-69e2f6009a12', 'App\\Notifications\\ContactFormNotification', 'App\\Models\\User', 1, '{\"message\":\"New contact message from Maile Kirkland\"}', NULL, '2024-03-06 16:11:40', '2024-03-06 16:11:40'),
('dc021ef3-b64f-41ad-9c08-f690e4366ac2', 'App\\Notifications\\ContactFormNotification', 'App\\Models\\User', 1, '{\"message\":\"New contact message from Samir Deshar\"}', NULL, '2024-03-07 10:41:28', '2024-03-07 10:41:28'),
('e2ea2c0e-5758-4605-bd70-66e6477bacac', 'App\\Notifications\\ContactFormNotification', 'App\\Models\\User', 1, '{\"message\":\"New contact message from test\"}', '2024-03-07 11:02:38', '2024-03-07 11:00:58', '2024-03-07 11:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int UNSIGNED NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `column_name`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'user', 'View User', 'view-user', NULL, NULL),
(2, 'user', 'Create User', 'create-user', NULL, NULL),
(3, 'user', 'Edit User', 'edit-user', NULL, NULL),
(4, 'user', 'Remove User', 'remove-user', NULL, NULL),
(5, 'role', 'View Role', 'view-role', NULL, NULL),
(6, 'role', 'Create Role', 'create-role', NULL, NULL),
(7, 'role', 'Edit Role', 'edit-role', NULL, NULL),
(8, 'role', 'Remove Role', 'remove-role', NULL, NULL),
(9, 'permission', 'View Permission', 'view-permission', NULL, NULL),
(10, 'permission', 'Create Permission', 'create-permission', NULL, NULL),
(11, 'permission', 'Edit Permission', 'edit-permission', NULL, NULL),
(12, 'permission', 'Remove Permission', 'remove-permission', NULL, NULL),
(13, 'banner', 'View Banner', 'view-banner', NULL, NULL),
(14, 'banner', 'Create Banner', 'create-banner', NULL, NULL),
(15, 'banner', 'Edit Banner', 'edit-banner', NULL, NULL),
(16, 'banner', 'Remove Banner', 'remove-banner', NULL, NULL),
(17, 'post', 'View Post', 'view-post', NULL, NULL),
(18, 'post', 'Create Post', 'create-post', NULL, NULL),
(19, 'post', 'Edit Post', 'edit-post', NULL, NULL),
(20, 'post', 'Remove Post', 'remove-post', NULL, NULL),
(21, 'setting', 'Create Setting', 'create-setting', NULL, NULL),
(22, 'setting', 'Edit Setting', 'edit-setting', NULL, NULL),
(23, 'generalpage', 'View Generalpage', 'view-generalpage', NULL, NULL),
(24, 'generalpage', 'Create Generalpage', 'create-generalpage', NULL, NULL),
(25, 'generalpage', 'Edit Generalpage', 'edit-generalpage', NULL, NULL),
(26, 'generalpage', 'Remove Generalpage', 'remove-generalpage', NULL, NULL),
(27, 'testimonial', 'View Testimonial', 'view-testimonial', NULL, NULL),
(28, 'testimonial', 'Create Testimonial', 'create-testimonial', NULL, NULL),
(29, 'testimonial', 'Edit Testimonial', 'edit-testimonial', NULL, NULL),
(30, 'testimonial', 'Remove Testimonial', 'remove-testimonial', NULL, NULL),
(31, 'partner', 'View Partner', 'view-partner', NULL, NULL),
(32, 'partner', 'Create Partner', 'create-partner', NULL, NULL),
(33, 'partner', 'Edit Partner', 'edit-partner', NULL, NULL),
(34, 'partner', 'Remove Partner', 'remove-partner', NULL, NULL),
(35, 'about', 'View About', 'view-about', NULL, NULL),
(36, 'about', 'Create Testimonial', 'create-about', NULL, NULL),
(37, 'about', 'Edit About', 'edit-about', NULL, NULL),
(38, 'about', 'Remove About', 'remove-about', NULL, NULL),
(59, 'generalfaq', 'View Generalfaq', 'view-generalfaq', NULL, NULL),
(60, 'generalfaq', 'Create Generalfaq', 'create-generalfaq', NULL, NULL),
(61, 'generalfaq', 'Edit Generalfaq', 'edit-generalfaq', NULL, NULL),
(62, 'generalfaq', 'Remove Generalfaq', 'remove-generalfaq', NULL, NULL),
(63, 'teammember', 'View Teammember', 'view-teammember', NULL, NULL),
(64, 'teammember', 'Create Teammember', 'create-teammember', NULL, NULL),
(65, 'teammember', 'Edit Teammember', 'edit-teammember', NULL, NULL),
(66, 'teammember', 'Remove Teammember', 'remove-teammember', NULL, NULL),
(99, 'dashboard', 'View Dashboard', 'view-dashboard', NULL, NULL),
(100, 'information', 'View Information', 'view-information', NULL, NULL),
(101, 'information', 'Create Information', 'create-information', NULL, NULL),
(102, 'information', 'Edit Information', 'edit-information', NULL, NULL),
(103, 'information', 'Remove Information', 'remove-information', NULL, NULL),
(104, 'menu', 'View Menu', 'view-menu', NULL, NULL),
(105, 'menu', 'Create Menu', 'create-menu', NULL, NULL),
(106, 'menu', 'Edit Menu', 'edit-menu', NULL, NULL),
(107, 'menu', 'Remove Menu', 'remove-menu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `cat_id` int DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `summary` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_titles` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `meta_descriptions` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` bigint NOT NULL DEFAULT '0',
  `icon` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `tag_id`, `user_id`, `cat_id`, `slug`, `description`, `summary`, `status`, `image`, `meta_titles`, `meta_keywords`, `meta_descriptions`, `created_at`, `updated_at`, `position`, `icon`) VALUES
(9, 'Ultra Flights', NULL, 1, 11, 'ultra-flights', '<p>Ultra light aircraft was introduced in Nepal in 1996 and has been offering zipping sky tours in and around Pokhara valley from Pokhara airport. Due to the wonderful proximity of the mountains and the scenic Fewa lake, Pokhara is the appropriate place for this activity as these white pea shaped aircraft share airspace with Himalayan griffin vultures, eagles, kites and float over villages like lazy well fed vultures; the aircraft also fly over monasteries, temples, lakes and jungles with a fantastic view of the regal Himalayas.&nbsp;</p>', 'Ultra light Flights: Ultra charms in the sky with the eagles…', 'active', 'https://rupakotholidays.com/storage/photos/1/Blog/65bf49178eb1d672bff323d9da231ddeulftra_flights.jpg', NULL, NULL, NULL, '2023-05-04 11:45:39', '2023-05-08 05:56:47', 1, 'https://rupakotholidays.com/storage/photos/1/Blog/65bf49178eb1d672bff323d9da231ddeulftra_flights.jpg'),
(10, 'Rafting', NULL, 1, 12, 'rafting', '<p><strong>Rafting</strong></p>\r\n\r\n<p><strong>White Water Rafting in Nepal</strong></p>\r\n\r\n<p>The rafting in Nepal can be a superb adventure you would have probably never thought about. These River journey are just like cherry on top after your tour/trek. From leisurely floats to adreline pumping rapids we offer enjoyable and challenging rafting and kayaking options for all levels from single to multi-days.</p>\r\n\r\n<p>On the overnight camping trips on the banks of the river under the starry skies on a moonlight night can be a very laidback special romantic experience.</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.rupakot.nectar.com.np/#home\">Information</a></li>\r\n</ul>\r\n\r\n<p>Rafting is practiced on various rivers in Nepal. You can choose the package as per your preferences&nbsp; and time availability. We do havepackages for longer rafting experience on the below rivers!!!!!</p>\r\n\r\n<ol>\r\n	<li>Trisuli River- 2 days</li>\r\n	<li>Bhotekoshi River- 2 days</li>\r\n	<li>Kali Gandaki River &ndash; 4 days</li>\r\n	<li>Marsyangdi River &ndash; 6 days</li>\r\n	<li>Sunkoshi River- 9 days</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Come and enjoy the white water rafting in the rapids to feel your adrenaline.</em></p>', NULL, 'active', 'https://rupakotholidays.com/storage/photos/1/Blog/6c844ec3638b9efe6ffe9db027b2bca5rafting.jpg', NULL, NULL, NULL, '2023-05-04 11:51:45', '2023-05-08 06:17:14', 2, 'https://rupakotholidays.com/storage/photos/1/Blog/6c844ec3638b9efe6ffe9db027b2bca5rafting.jpg'),
(11, 'Paragliding', NULL, 1, 13, 'paragliding', '<p><em><strong>Paragliding</strong></em></p>\r\n\r\n<p><strong><em>Cruising like a bird on cloud 9&hellip;</em></strong>.</p>\r\n\r\n<p>Paragliding is a new adventure introduced in the late 90&rsquo;s in Nepal but has become one of the most loved adventures in Annapurna region. Pokhara, the city of lakes, is the most popular region for this sport. As we soar like a bird, enjoy the breathtaking views of snowy peaks soaring up the skies and fertile valley and lakes below it. All the logistics and the details will be provided in the spot and it does not need earlier training as it will be completely handled by the pilot. So do not worry and savor the enjoyable experience. This epic Himalayan adventure is a must for every visitor in Pokhara.</p>\r\n\r\n<p>Gliding is a weather dependent sport and flying season in Nepal commences from October through February, the best time being November and December esp if it&rsquo;s a clear way.</p>\r\n\r\n<p>Most of the take off point for paragliding is Sarangkot (1592m) which offer awesome views of Macchapuchre and Annapurna range on top and Fewa lake below.</p>\r\n\r\n<p>There are 3 different types and regions of Paraglidng you can enjoy with Rupakot Holidays!!!</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.rupakot.nectar.com.np/#home\">Information</a></li>\r\n</ul>\r\n\r\n<p><strong>Phewa Tal View:</strong></p>\r\n\r\n<p>In the morning and late afternoon these 15min flights give you a taste of uncovered flight, taking you over Pokhara Lake and then landing by a Lakeside bar to top it off and release the nerves; its then bottoms up before the meal if you feel like one.</p>\r\n\r\n<p>Cloud buster: This midday flight gives you the thrill of high flight as we thermal up above Sarangkot in the company of eagles and vultures. It takes from 30minutes to 1 hour. We land by the lake.</p>\r\n\r\n<p><strong>Cross-country:</strong></p>\r\n\r\n<p>This offers you the chance to experience flying from one valley to another. Using thermals, clouds and birds to guide us, we take you on an unforgettable journey north of Pokhara towards the big mountains. We fly as long as we can and aim to return to Pokhara the same afternoon. This flight is a literal sky blazer.</p>\r\n\r\n<p><strong>Acrobatic Flying:</strong></p>\r\n\r\n<p>This is the biggest shot of adrenaline in the Himalayas. See what world class aero pilots can do with a wing as you loop, spin and spiral through the air. Performing maneuvers are called&nbsp;<strong>&ldquo;Helicopter&rdquo; &ldquo;SAT&rdquo; &ldquo;Back-fly&rdquo; &ldquo;Tumble&rdquo; and &ldquo;Wingover&rdquo;.</strong>&nbsp;This 10 to 20 minutes flight will leave you breathless to the core.</p>\r\n\r\n<p><strong>Just call up Rupakot Adventures or mail us at:</strong>&nbsp;<a href=\"mailto:tours@rupakotholidays.com\">tours@rupakotholidays.com</a><strong>&nbsp;for more information on any paragliding trips of your choice.</strong></p>', NULL, 'active', 'https://rupakotholidays.com/storage/photos/1/Blog/886abb96d96ae45c32d44ecce1c5f468paragliding-in-nepal.jpg', NULL, NULL, NULL, '2023-05-04 11:57:15', '2023-05-08 06:09:49', 3, 'https://rupakotholidays.com/storage/photos/1/Blog/886abb96d96ae45c32d44ecce1c5f468paragliding-in-nepal.jpg'),
(12, 'Mountain Flights', NULL, 1, 14, 'mountain-flights', '<p><strong>MOUNTAIN FLIGHTS OF FANTASY&hellip;</strong><strong><em>but this is for real&hellip;</em></strong></p>\r\n\r\n<p>Mountain flights are for those who wish to grasp an opportunities to see all the Himalayas with extreme comfort. It is a 60 minutes flight that runs between Langtang in central to Everest in the east. There are more than 9 flights everyday depending on the weather by major airlines in Nepal. Nepal houses eight mountains that stand over 8,000m out of 14. Mountain flight offers you spectacular view of Mt. Everest, Kanchenjunga and many other snow capped mountains and beautiful peaks. On a clear weather one can view beautiful landscapes of Nepali hills and mountains as well as Tibetan plateau.</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.rupakot.nectar.com.np/#home\">Information</a></li>\r\n</ul>\r\n\r\n<p><strong>THIS IS HOW YOUR MOUTAIN FLIGHT READS:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></p>\r\n\r\n<p><strong>Trip Factors:</strong></p>\r\n\r\n<p>Departure: Daily (Early Morning)<br />\r\nDuration: 1 Hour<br />\r\nStarts from: Kathmandu<br />\r\nEnds at: Kathmandu airport</p>\r\n\r\n<p><strong>Transportation:</strong>&nbsp;&nbsp;<strong>Airport transfer by car and 1 hour flight</strong></p>\r\n\r\n<p><strong>Mountain Views you get:</strong></p>\r\n\r\n<p>Mount Everest , Kangchenjunga, Annapurna, Makalu, Ganesh Himal, Gauri Shankar, Lhotse, Nuptse, Langtang, Cho-Oyu , Shringi Himal, Manaslu, Lamjung Himal, Dhaulagiri and many named and unnamed mountain ranges/peaks</p>\r\n\r\n<p><strong>Airlines:&nbsp;Buddha and Yeti Air</strong></p>\r\n\r\n<p><strong>Trip Itinerary:</strong></p>\r\n\r\n<p>~ Pick up from your hotel at 6:00 AM, 6:30 AM, 7:00 AM, 7:30 AM, 8:00 Am in the morning.&nbsp;<strong>The time choice is exclusively yours, early birds generally find the worms. The weather can be very fair early morning and suddenly turn hazy after 7 am or vice versa. Flights can be cancelled due to unpredictable weather patterns and full refunds are made in the event of this happening.</strong><br />\r\n~ Transfer from your hotel to domestic airport<br />\r\n~ Fly around the Mountains for 50 to 60 minutes<br />\r\n~ Land at the Domestic airport<br />\r\n~ Pick up from domestic airport<br />\r\n~ Transfer back to your hotel</p>\r\n\r\n<p><strong>Trip Cost Includes:</strong></p>\r\n\r\n<p>- Mountain Flight ticket.<br />\r\n- Car to domestic airport and back.<br />\r\n- Pick up and drop service from and to the hotel.</p>\r\n\r\n<p><strong>Trip Cost Excludes:</strong></p>\r\n\r\n<p>- Everything except flight Ticket and Car.</p>', NULL, 'active', 'https://rupakotholidays.com/storage/photos/1/Blog/eecd97dec27ee0fb47f424c51b7b9ceamountainflight.jpg', NULL, NULL, NULL, '2023-05-04 11:59:20', '2023-05-08 06:15:16', 4, 'https://rupakotholidays.com/storage/photos/1/Blog/eecd97dec27ee0fb47f424c51b7b9ceamountainflight.jpg'),
(13, 'Jungle Safari', NULL, 1, 15, 'jungle-safari', '<p><strong>Jungle safari</strong></p>\r\n\r\n<p>One of the great ways to explore the flora and fauna inside a wildlife reserve is via Jeep safari. You can sit back of the jeep to see the animals. Jungle safari tour in Nepal attracts some of the world endangered species of wildlife such as one horned rhino, exclusive, royal Bengal tiger, slot bear, leopards, Gaurs, crocodile, pythons, Sambaras and different residential and migratory birds.</p>\r\n\r\n<p>Any animals or special landscapes ahead, the driver will stop the jeep and you can enjoy them. Don&rsquo;t forget to snap quick pictures every now and then. Our professional guide will guide you throughout the trip with necessary information. You can have lunch during the safari depending on the length of the safari you pick.</p>\r\n\r\n<p>Don&rsquo;t worry; you won&rsquo;t have to find your food yourself!!!</p>\r\n\r\n<p><strong>Tips:</strong>&nbsp;Please avoid using or wearing bright color clothes. This might scare the animals so dim color such as grey, dark green, off white or black are preferred.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>There are other alternatives for jungle watching available too. Don&rsquo;t forget to explore them too.</p>\r\n\r\n<p>Bird watching</p>\r\n\r\n<p>Elephant Bathing</p>\r\n\r\n<p>Visiting elephant sanctuary</p>\r\n\r\n<p>Canoeing</p>\r\n\r\n<p>Jungle walk</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.rupakot.nectar.com.np/#home\">Information</a></li>\r\n</ul>\r\n\r\n<p>Over 14 national parks and wildlife reserve, there are three which are majorly famous for jungle safari</p>\r\n\r\n<ol>\r\n	<li><strong>Chitwan national park</strong></li>\r\n</ol>\r\n\r\n<p>Chitwan National Park is the exciting spot for&nbsp;<strong>wild life safari</strong>&nbsp;for the interested trekkers to be all the way into the wild or into the beauty of the nature. Amazing view of local mountains at winters and adventurous fast flowing rivers in the summer adds the excitement to the tour. This is also the most famous national parks among the others. Endangered animals such as one horned rhino and Bengal tiger are the major attraction here.</p>\r\n\r\n<p>You can also enjoy various activities such as elephant bathing, canoeing, crocodile breeding centre and many more. You can also enjoy various traditional recreations around the national park such as cultural Tharu dance, Village walk or hike to Bish Hazari lake(20 thousands lake; literally).</p>\r\n\r\n<ol>\r\n	<li><strong>Bardiya National Park</strong></li>\r\n</ol>\r\n\r\n<p>Bardiya National park is the largest conservation area in the Terai region of Nepal. Situated in the mid western Terai region of Nepal, Bardiya National Park is home to more than thirty different mammals over two hundred species of birds and many lizards and snakes have been recorded.&nbsp;</p>\r\n\r\n<p>Safari In this sanctuary is a lifetime experience of being into the nature. Top things to enjoy in Bardiya National park are: amazing sunset views, Tharu culture Museum, elephant breeding centre and many more.</p>\r\n\r\n<ol>\r\n	<li><strong>Koshi Tappu Wildlife reserve.</strong></li>\r\n</ol>\r\n\r\n<p>Koshi Tappu Wildlife Reserve is well equipped and has modernized camp facilities for the tourists. Covering the land of 175 sq. km it lies in south eastern belt of the country.&nbsp; The wildlife here is very fascinating and it is majorly famous for river vine forest, variety of wild buffalo, deer, crocodile and even dolphins. This sanctuary is very famous for bird watching. The small wetland inside the reserve is also home to fishing cat and smooth coated otters.</p>\r\n\r\n<p>Major things not to miss here are awesome birds, epic sunset view, wildlife safari.&nbsp;<em>Don&rsquo;t miss your binocular when in Koshi Tappu. We don&rsquo;t want to miss endangered species even far away do we!!!</em></p>', NULL, 'active', 'https://rupakotholidays.com/storage/photos/1/Blog/f36acd6cef3a9031d40b64829b8e8b44chiwan.jpg', NULL, NULL, NULL, '2023-05-04 12:02:05', '2023-05-08 06:15:39', 5, 'https://rupakotholidays.com/storage/photos/1/Blog/f36acd6cef3a9031d40b64829b8e8b44chiwan.jpg'),
(14, 'Hiking', NULL, 1, 16, 'hiking', '<p><strong>HIKINGS</strong></p>\r\n\r\n<p>Nepal home to mountains, hills and flat region has wide variety of treks, excursions and hiking to enjoy and explore. There are treks that will last for one hundred days and some fantastic views within 1 day hiking. For the travelers with very short time we have some great hiking routes to enjoy.</p>\r\n\r\n<p><strong>Hiking</strong>&nbsp;are likely to be a short (average walk of couple of hours in the park) or it could be a two weeks to a month in the mountain range, it is depending on the hiking conditions and hike length. Trekking, Bush-walking, Mountaineering are seemed different activities but it will not be false to say these are the long disciplines or variations of Hiking.</p>\r\n\r\n<p>&nbsp;In Hiking, the most important thing to remember is &ldquo;The journey is more important than the destination&rdquo;. When you think about Hiking, you most think of beautiful nature, landscapes, forests, rivers and walking there to enjoy natural scenery.</p>\r\n\r\n<p>You don&rsquo;t have to travel for weeks to enjoy the beauty of Nepal we have hiking ranging from few hours to weeks depending on your choice</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.rupakot.nectar.com.np/#home\">Information</a></li>\r\n</ul>\r\n\r\n<p><strong>Budhanilkantha- Sundarijal hiking.</strong></p>\r\n\r\n<p>This is a small 1 day hiking near Kathmandu valley. If you have spare time after your tour you can always enjoy the serenity of Kathmandu valley from the top of the Shivapuri hills.</p>\r\n\r\n<p>Budhanilkantha is a holy site of Hindu god Lord Visnu. The statute seems as if it is floating in the water. After clicking some pictures we start our day. After a moderate hiking from Budhanilkantha for about 1.5 hours to 2 hours we reach Nagi Gumba atop of Shivapuri hills. It is a Buddhist monastery where girls are given Buddhist education by Buddhist nuns. Sometimes even foreigners are here for meditation. The view of Kathmandu valley from there is serene. On a good weather day you might as well see the snow capped mountains.</p>\r\n\r\n<p>After a good rest and some picture clicking, we descend down to Sundarijal. The trail is midst the foothills of Shivapuri woodlands and is a narrow path. On our way we pass waterfall and various flora and fauna. It takes appx 2.5 hours to reach Sundarijal, our destination.</p>\r\n\r\n<p>We take a bus from there and get back to Kathmandu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Nagarkot- Dhulikhel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></p>\r\n\r\n<p>After being in Kathmandu for few days with all the cultural tour and huffings in the city you might want something more natural and calm near about. This hiking is great to stretch your legs and see the Himalayas nearby.</p>\r\n\r\n<p>It is a sixteen kilometers hike which will take good 5hours walk and bring two hills station (Dhulikhel and Nagarkot) on the trail. Walking though pine frests, villages , jungles you will also meet hospitable locals and enjoy panoramic views before reaching Nagarkot.</p>\r\n\r\n<p>Drive to Nagarkot then start hike passing from the pine forest and different faunas. You hike past beautiful countryside villages (especially Tamang Village). The trail passes along Rhonnie Bhanjyan,kankre, Talchowk with mountain view alongside. Dhulikhel has admirable majestic Himalayan views from its hilltop.</p>\r\n\r\n<p>After completing the hike drive back to Kathmandu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Nagarkot- Changunarayan Hike</strong></p>\r\n\r\n<p>Nagarkot ChanguNarayan Hike is an excellent day tour nearby Kathmandu Valley. If you just have one day spare and you wish to fill everything in your cup them this hike may be perfect for you. From local Tamang Village with rural livelihood to 5 star hotels you can enjoy it all not foe forget the panoramic Himalayan views.</p>\r\n\r\n<p>We will organize to pick you up from your hotel and drop to Nagarkot or you might wish to stay in Nagarkot overnight to enjoy the sunrise from hill top, the choice is yours. Nagarkot is a hills station at 2100 meters and its famous for its Himalayan views with sunrise and sunset. It is where we start our hike from.</p>\r\n\r\n<p>Hike to Changu Narayan decends through terraced fields through villages. Local wine making is very common on this trail. We encounter various cultural diversities on the first half of the trail whereas on the second half is all about enjoying the natural scenery. One might wonder the amount of remotenesss and undisturbed livelihood of people although the capital city of the country is just few kilometers away.</p>\r\n\r\n<p>It takes us 4 hours to reach Changu Narayan temple, oldest pagoda style Hindu temple in Nepal. After visiting the UNESCO site we hop into our vechicle and come back to Kathmandu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Rupa Lake- Rupakot</strong></p>\r\n\r\n<p>Splendid view of Begnas, Rupa and Fewa lakes, couple of hiking routes, an infinity pool, a world-class spa, Panorama restaurant, exotic bar and much more to explore is what makes Rupakot one of the splendid resort in Nepal.</p>\r\n\r\n<p>Spectacular views of Annapurna Range, Macchapuchre Range and other Himalayas are just awesome from Resort.</p>\r\n\r\n<p>&nbsp;Drive to Rupa lake which for an hour, we slowly start hiking towards Rupakot . The view of Pokhara city from above as the altitude increase is just unforgettable. You will walk though unspoilt villagelife, wildlife and Flora. We reach to Rupakot Resort for lunch. We take a small stroll to Chisapani which is about 1 hour walk from resort. The view of Machhapuchre and Annapurna mountains is awe from here. We stop to enjoy the wonderful views and take some rest. We walk down to the resort and call it a day with the views of himalayas on the top and lake view on the bottom.</p>\r\n\r\n<p>The sunrise in the morning from this point is just awesome so we do recommend you to spend your night in Rupakot</p>', NULL, 'active', 'https://rupakotholidays.com/storage/photos/1/Blog/ba77c88f33e5f8180eeb68ba4052cfc74ec9801d447a4c4507a167477fe4b912annapurna-trekking.jpg', NULL, NULL, NULL, '2023-05-04 12:07:12', '2023-05-08 06:00:56', 6, 'https://rupakotholidays.com/storage/photos/1/Blog/b8122751c613a290106b13738b74847amardi_trek_02.jpg'),
(15, 'Canyoning', NULL, 1, 17, 'canyoning', '<p><em>An adventure on your own!!!</em></p>\r\n\r\n<p>Besides rafting in a group, the one who enjoys the single adventure is also fascinated here in Nepal i.e. Cannoning and Kayaking to explore the hidden landscapes. The Government of Nepal has opened sections of 16 rivers graded on a scale of 1 to 5 for commercial rafting. Since, safety is the utmost important major so here we are to provide the best service and carrying for you.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>While canyoning you will be in abseiling, jumping and sliding down the canyon walls and waterfalls to deep pools below. Its wet, wild and you will have a great time!!</p>\r\n\r\n<p>Your Guides set safety standards for others to follow, leaving you free to enjoy your adventure with knowledge that you are in the most capable hands. Remember this adventure is all wild on the rivers and falls in Nepal not artificial. So enjoy the nature with adventure.</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'active', 'https://rupakotholidays.com/storage/photos/1/Blog/5cae593c96d8cd15c4c2dfb7b74d9cc9e9b2f47a4b564144aa698302b364c3c4canyoning-nepal.jpg', NULL, NULL, NULL, '2023-05-04 12:09:06', '2023-05-08 06:03:03', 7, 'https://rupakotholidays.com/storage/photos/1/Blog/e9b2f47a4b564144aa698302b364c3c4canyoning-cabarete.jpg'),
(16, 'Bungee Jumping', NULL, 1, 18, 'bungee-jumping', '<p><strong><em>Bungee Jumping in Nepal&hellip;.</em></strong></p>\r\n\r\n<p>Nepal is a landlocked country with different geographical structures. Steep hills, beautiful mountains, dangerous passes and thousands of rivers and rivulets are what makes Nepal untouched beauty. Rivers such as Bhotekoshi, Seti, Trisuli are heaven to river adventurists.</p>\r\n\r\n<p>In the world of adventures, there is nothing that meets the thrills of bungee jumping. One of the shortest adventures that utmost guarantees you to provide the thrill you will ever feel in those 30 seconds.</p>\r\n\r\n<p>The Literal meaning of Bungee is a rubber rope, so this in this adventure person jumps from a bridge at a high altitude with support of an elastic rope. There is only one agency offering this sport. The jump, at 160m, was designed by one of New Zealand&rsquo;s leading bungeejumping consultants and is operated by some of the most experienced jump masters in the business.&nbsp;<strong>It&rsquo;s mishap-proof</strong>. The agency ensures safety&nbsp;<strong>&ldquo;very, very seriously&rdquo;,</strong>&nbsp;at the highest standards.</p>\r\n\r\n<p>The Bungee Bridge happens to be the only privately owned bridge in Nepal. It has been specially designed for bungee jumping with a 4x-safety factor and has a loading factor of 41,500 kg or 4.5 tons according to Swiss measurements.</p>\r\n\r\n<p>Nepal has two places running Bungee jumping as the adventure.</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.rupakot.nectar.com.np/#home\">Information</a></li>\r\n</ul>\r\n\r\n<p>Nepal has two places running Bungee as the adventure.</p>\r\n\r\n<ol>\r\n	<li><strong>Bhotekoshi</strong></li>\r\n</ol>\r\n\r\n<p>The jump point is Less than 3 hours outside Kathmandu by an Ultimate Bungee Shuttle. You will drive through the Araniko (Kathmandu/Lhasa) Highway to within 12km of the Tibet Border and the famous Friendship Bridge. Ultimate Bungee Nepal takes place on a 166m wide steel suspension bridge over the Bhoti Koshi River.</p>\r\n\r\n<p><em>The bungee fall here is the 2nd&nbsp;deepest fall in this world.</em></p>\r\n\r\n<p><strong>2.Pokhara</strong></p>\r\n\r\n<p>Pokhara is renown for its beauty and adventure. But wait can we make it more adventurous and thrilling? YES sure. How about we add bungee to it? And here we go.</p>\r\n\r\n<p>In Pokhara enjoy bungee jumping from a 70- meter high tower bridge. The bungee jumping site is located less than an hours&rsquo; drive from central Pokhara. It is located at Hemja, Pokhara (Near Lakeside). Enjoy an adrenaline rush as you leap off from the platform down below, amidst a spectacular landscape.</p>\r\n\r\n<p><strong>Professionals from Europe operate this adventure.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Please Note:</strong>&nbsp;<strong>This adventure is not for you if you are pregnant, have a heart condition, low/high blood pressure, and epilepsy, neurological, psychological or bone-related issues.</strong></p>', NULL, 'active', 'https://rupakotholidays.com/storage/photos/1/Blog/de9d4047ef17ce78790b7f68f25a5c32bujeejump.jpeg', NULL, NULL, NULL, '2023-05-04 12:11:28', '2023-05-08 06:08:54', 8, 'https://rupakotholidays.com/storage/photos/1/Blog/de9d4047ef17ce78790b7f68f25a5c32bujeejump.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `map_id` bigint UNSIGNED NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `title`, `full_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'dfvgbd', 'Sumit Karn', 'fgvsdgv', '2023-05-09 10:42:37', '2023-05-09 10:42:37'),
(4, 'Voluptatem sequi ad', 'Marny Leach', 'Sunt beatae sunt il', '2023-05-10 07:54:03', '2023-05-10 07:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Editor', 'editor', NULL, NULL),
(3, 'User', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` int UNSIGNED NOT NULL,
  `permission_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quatation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trip_advisor` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_url` longtext COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_second` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mega_title` longtext COLLATE utf8mb4_unicode_ci,
  `mega_sub_title` longtext COLLATE utf8mb4_unicode_ci,
  `mega_background_text` longtext COLLATE utf8mb4_unicode_ci,
  `mega_banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trip_title` longtext COLLATE utf8mb4_unicode_ci,
  `trip_sub_title` longtext COLLATE utf8mb4_unicode_ci,
  `trip_background_text` longtext COLLATE utf8mb4_unicode_ci,
  `trip_banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information_title` longtext COLLATE utf8mb4_unicode_ci,
  `information_sub_title` longtext COLLATE utf8mb4_unicode_ci,
  `information_background_text` longtext COLLATE utf8mb4_unicode_ci,
  `information_banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adventure_title` longtext COLLATE utf8mb4_unicode_ci,
  `adventure_sub_title` longtext COLLATE utf8mb4_unicode_ci,
  `adventure_background_text` longtext COLLATE utf8mb4_unicode_ci,
  `adventure_banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hikes_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hikes_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `hikes_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` longtext COLLATE utf8mb4_unicode_ci,
  `adventure1_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outbound_sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adventure1_sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adventure1_background_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outbound_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outbound_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adventure1_image` text COLLATE utf8mb4_unicode_ci,
  `outbound_background_text` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `icon`, `logo`, `logo2`, `site_name`, `quatation`, `fb_link`, `twitter_link`, `linkedin_link`, `insta_link`, `youtube_link`, `pinterest_link`, `google_plus`, `trip_advisor`, `address`, `location_url`, `email`, `phone`, `contact`, `contact_second`, `meta_title`, `meta_keywords`, `meta_description`, `deleted_at`, `created_at`, `updated_at`, `mega_title`, `mega_sub_title`, `mega_background_text`, `mega_banner_image`, `trip_title`, `trip_sub_title`, `trip_background_text`, `trip_banner_image`, `information_title`, `information_sub_title`, `information_background_text`, `information_banner_image`, `adventure_title`, `adventure_sub_title`, `adventure_background_text`, `adventure_banner_image`, `hikes_title`, `hikes_description`, `hikes_image`, `certificate_image`, `payment_image`, `copyright`, `adventure1_title`, `outbound_sub_title`, `adventure1_sub_title`, `adventure1_background_text`, `outbound_title`, `outbound_image`, `adventure1_image`, `outbound_background_text`) VALUES
(1, '1', 'http://127.0.0.1:8000/storage/photos/1/cute.png', 'http://127.0.0.1:8000/storage/photos/1/logo (1).png', 'http://127.0.0.1:8000/storage/photos/1/cute.png', 'Khana Jam', 'thi is footer and we have beenn dash dash dash', 'facebook.com', 'twitter.com', NULL, 'instagram.com', NULL, NULL, NULL, 'https://www.tripadvisor.com/Attraction_Review-g293890-d4747682-Reviews-Mega_Adventures_International-Kathmandu_Kathmandu_Valley_Bagmati_Zone_Central_Reg.html', NULL, NULL, 'admin@gmail.com', '1 - 4004774', '40047752', '4543531', 'Order MUNCH', 'Email : odermunch@gmail.com', NULL, NULL, NULL, '2024-03-04 23:16:31', 'POPULAR DESTINATIONS', 'POPULAR DESTINATIONS', 'POPULAR DESTINATIONS', 'https://rupakotholidays.com/storage/photos/1/c6ce4608447d46dc5cf49f8648bc6823amazing.jpg', 'asdsadas', 'asdsad', 'asdasd', NULL, 'RUPAKOT SPECIAL PACKAGES', 'RUPAKOT SPECIAL PACKAGES', 'RUPAKOT SPECIAL PACKAGES', NULL, 'OUTBOUND TOUR PACKAGESssss', 'OUTBOUND TOUR PACKAGES', 'OUTBOUND TOUR PACKAGES', 'https://rupakotholidays.com/storage/photos/1/56bbb.jpg', NULL, NULL, NULL, NULL, 'storage/photos/1/accept (1).png', 'Copyrights All Rights Reserved', 'ADVENTURE ACTIVITIES', 'Rupakot Holidays Packages', 'Adventure Sports', 'Adventure Sports', 'Rupakot Holidays Packages', 'https://rupakotholidays.com/storage/photos/1/Banner/dummy.jpg', 'https://rupakotholidays.com/storage/photos/1/dummy-bg.jpg', 'Book travel packages and enjoy your holidays with distinctive experience');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive' COMMENT 'inactive|active',
  `external_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `external_link`, `created_at`, `updated_at`) VALUES
(2, 'Test1 test tes', '<p>test</p>', 'http://127.0.0.1:8000/storage/photos/1/food.jpg', 'active', 'Adipisicing blanditi', '2024-02-16 05:27:11', '2024-03-07 15:50:03'),
(3, 'demo demo demo', '<p>demoooo</p>', 'http://127.0.0.1:8000/storage/photos/1/food3.jpg', 'active', 'Adipisicing blanditi', '2024-02-16 05:27:49', '2024-03-07 15:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Saggy Boy', 'amrit@nectardigit.com', '2022-08-22 09:17:32', '2022-08-22 09:17:32'),
(2, 'Saggy Boy', 'admin@admin.com', '2022-09-07 12:24:50', '2022-09-07 12:24:50'),
(3, 'Saroj Khanal', 'amrit@nectardigit.com', '2022-09-07 12:25:26', '2022-09-07 12:25:26'),
(4, 'Dharma', 'admin@admin.com', '2022-09-08 04:26:20', '2022-09-08 04:26:20'),
(5, 'Mir Husen ray', 'nectardigit@gmail.com', '2022-09-26 06:25:26', '2022-09-26 06:25:26'),
(6, 'Sirjana Sen', 'pabitra.shrestha@nectardigit.com', '2022-10-12 06:40:10', '2022-10-12 06:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr.Admin', 'admin@admin.com', NULL, '$2y$10$5WUx0u6.mymG1d68A5s0meh9NGACvYpX2JDWZ355/558X6CSeHX6y', 'RbPgIg2zJX5yzEeLOH1vJLMow5kFLrnUZm1jyzfeQnwwUfM4GfQMOkXFOIXc', '2022-08-04 03:31:15', '2023-03-20 06:18:20'),
(2, 'Mr.Editor', 'editor@editor.com', NULL, '$2y$10$lDQyMY9AY1h8myf5ivq/qusq98a0.gmv2OAqes2ZbnxjXrZ7Ua0uS', NULL, '2022-08-04 03:31:16', '2024-02-24 21:38:20'),
(3, 'Mr.User', 'user@user.com', NULL, '$2y$10$wvArNN.NeN.w68EZ2ZCIpOa4c5GAgoSc7Kc3Dh62xIwYxNTMA5Nbi', NULL, '2022-08-04 03:31:16', '2022-08-04 03:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `user_id` int UNSIGNED NOT NULL,
  `permission_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`user_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` int UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `general_faqs`
--
ALTER TABLE `general_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maps_data`
--
ALTER TABLE `maps_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ratings_user_id_map_id_unique` (`user_id`,`map_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `roles_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `users_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `general_faqs`
--
ALTER TABLE `general_faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `maps_data`
--
ALTER TABLE `maps_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
