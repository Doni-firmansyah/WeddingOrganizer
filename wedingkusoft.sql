-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 11:23 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedingkusoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_category`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Weding Organizer', 'Weding Organizer', '2021-11-12 05:38:07', '2021-11-12 05:38:07'),
(2, 'Gedung', 'Gedung', '2021-11-12 05:38:07', '2021-11-12 05:38:07'),
(3, 'Katering', 'Katering', '2021-11-12 05:38:07', '2021-11-12 05:38:07'),
(4, 'Riasan', 'Riasan', '2021-11-12 05:38:07', '2021-11-12 05:38:07'),
(5, 'Dekor', 'Dekor', '2021-11-12 05:38:07', '2021-11-12 05:38:07'),
(6, 'Hiburan', 'Hiburan', '2021-11-12 05:38:07', '2021-11-12 05:38:07'),
(7, 'Lain-Lain', 'Lain-Lain', '2021-11-12 05:38:07', '2021-11-12 05:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logativitas`
--

CREATE TABLE `logativitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_route` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logativitas`
--

INSERT INTO `logativitas` (`id`, `user_id`, `nama_route`, `keterangan`, `detail`, `created_at`, `updated_at`) VALUES
(1, 1, '/pesanan', 'view pesanan', '-', '2021-11-12 05:40:53', '2021-11-12 05:40:53'),
(2, 2, 'login', 'login', '-', '2021-11-12 05:41:04', '2021-11-12 05:41:04'),
(3, 2, 'dashboard/user', 'view dashboard user', '-', '2021-11-12 05:41:05', '2021-11-12 05:41:05'),
(4, 5, 'dashboard/paket-wo', 'view dashboard paket wo', '-', '2021-11-12 05:41:08', '2021-11-12 05:41:08'),
(5, 5, 'login', 'login', '-', '2021-11-12 05:41:43', '2021-11-12 05:41:43'),
(6, 5, 'logout', 'logout', '-', '2021-11-12 05:41:59', '2021-11-12 05:41:59'),
(7, 4, 'login', 'login', '-', '2021-11-12 05:42:15', '2021-11-12 05:42:15'),
(8, 2, 'dashboard/user/id', 'view detail user Doni', '-', '2021-11-12 05:44:28', '2021-11-12 05:44:28'),
(9, 2, 'dashboard/user/1/edit', 'view edit user Doni', '-', '2021-11-12 05:44:32', '2021-11-12 05:44:32'),
(10, 2, 'dashboard/user/1/edit', 'proses update role Donimenjadi vendor', '-', '2021-11-12 05:44:40', '2021-11-12 05:44:40'),
(11, 2, 'dashboard/user', 'view dashboard user', '-', '2021-11-12 05:44:40', '2021-11-12 05:44:40'),
(12, 3, 'login', 'login', '-', '2021-11-12 05:50:35', '2021-11-12 05:50:35'),
(13, 6, '/', 'view home user', '-', '2021-11-12 06:20:45', '2021-11-12 06:20:45'),
(14, 6, '/', 'view home user', '-', '2021-11-12 06:26:19', '2021-11-12 06:26:19'),
(15, 6, '/', 'view home user', '-', '2021-11-12 06:27:55', '2021-11-12 06:27:55'),
(16, 5, 'dashboard/paket-wo', 'view dashboard paket wo', '-', '2021-11-12 06:39:49', '2021-11-12 06:39:49'),
(17, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:39:53', '2021-11-12 06:39:53'),
(18, 5, 'dashboard/layanan-vendor/16', 'view detail layanan-vendorSound Sistem By Saya', '-', '2021-11-12 06:40:14', '2021-11-12 06:40:14'),
(19, 5, 'dashboard/layanan-vendor/16/edit', 'view edit layanan-vendorSound Sistem By Saya', '-', '2021-11-12 06:40:18', '2021-11-12 06:40:18'),
(20, 5, 'dashboard/layanan-vendor/16', 'proses edit layanan-vendor', '-', '2021-11-12 06:40:25', '2021-11-12 06:40:25'),
(21, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:40:26', '2021-11-12 06:40:26'),
(22, 5, 'dashboard/layanan-vendor/15', 'view detail layanan-vendorPembawa Acara By Saya', '-', '2021-11-12 06:40:32', '2021-11-12 06:40:32'),
(23, 5, 'dashboard/layanan-vendor/15/edit', 'view edit layanan-vendorPembawa Acara By Saya', '-', '2021-11-12 06:40:35', '2021-11-12 06:40:35'),
(24, 5, 'dashboard/layanan-vendor/15', 'proses edit layanan-vendor', '-', '2021-11-12 06:40:41', '2021-11-12 06:40:41'),
(25, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:40:41', '2021-11-12 06:40:41'),
(26, 5, 'dashboard/layanan-vendor/14', 'view detail layanan-vendorDekor Tema Mewah By Saya', '-', '2021-11-12 06:40:48', '2021-11-12 06:40:48'),
(27, 5, 'dashboard/layanan-vendor/14/edit', 'view edit layanan-vendorDekor Tema Mewah By Saya', '-', '2021-11-12 06:40:51', '2021-11-12 06:40:51'),
(28, 5, 'dashboard/layanan-vendor/14', 'proses edit layanan-vendor', '-', '2021-11-12 06:40:56', '2021-11-12 06:40:56'),
(29, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:40:57', '2021-11-12 06:40:57'),
(30, 5, 'dashboard/layanan-vendor/13', 'view detail layanan-vendorDekor Tema Gold By Saya', '-', '2021-11-12 06:41:03', '2021-11-12 06:41:03'),
(31, 5, 'dashboard/layanan-vendor/13/edit', 'view edit layanan-vendorDekor Tema Gold By Saya', '-', '2021-11-12 06:41:07', '2021-11-12 06:41:07'),
(32, 5, 'dashboard/layanan-vendor/13', 'proses edit layanan-vendor', '-', '2021-11-12 06:41:12', '2021-11-12 06:41:12'),
(33, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:41:13', '2021-11-12 06:41:13'),
(34, 5, 'dashboard/layanan-vendor/12', 'view detail layanan-vendorRias By Saya dengan 1 gaunt', '-', '2021-11-12 06:41:19', '2021-11-12 06:41:19'),
(35, 5, 'dashboard/layanan-vendor/12/edit', 'view edit layanan-vendorRias By Saya dengan 1 gaunt', '-', '2021-11-12 06:41:22', '2021-11-12 06:41:22'),
(36, 5, 'dashboard/layanan-vendor/12', 'proses edit layanan-vendor', '-', '2021-11-12 06:41:28', '2021-11-12 06:41:28'),
(37, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:41:29', '2021-11-12 06:41:29'),
(38, 5, 'dashboard/layanan-vendor/11', 'view detail layanan-vendorRias By Saya dengan 2 gaunt', '-', '2021-11-12 06:41:35', '2021-11-12 06:41:35'),
(39, 5, 'dashboard/layanan-vendor/11/edit', 'view edit layanan-vendorRias By Saya dengan 2 gaunt', '-', '2021-11-12 06:41:39', '2021-11-12 06:41:39'),
(40, 5, 'dashboard/layanan-vendor/11', 'proses edit layanan-vendor', '-', '2021-11-12 06:41:44', '2021-11-12 06:41:44'),
(41, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:41:45', '2021-11-12 06:41:45'),
(42, 5, 'dashboard/layanan-vendor/10', 'view detail layanan-vendorRias By Saya dengan 4 gaunt', '-', '2021-11-12 06:41:52', '2021-11-12 06:41:52'),
(43, 5, 'dashboard/layanan-vendor/10/edit', 'view edit layanan-vendorRias By Saya dengan 4 gaunt', '-', '2021-11-12 06:41:55', '2021-11-12 06:41:55'),
(44, 5, 'dashboard/layanan-vendor/10', 'proses edit layanan-vendor', '-', '2021-11-12 06:42:01', '2021-11-12 06:42:01'),
(45, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:42:02', '2021-11-12 06:42:02'),
(46, 5, 'dashboard/layanan-vendor/9', 'view detail layanan-vendorCatering 1000 orang by saya', '-', '2021-11-12 06:42:09', '2021-11-12 06:42:09'),
(47, 5, 'dashboard/layanan-vendor/9/edit', 'view edit layanan-vendorCatering 1000 orang by saya', '-', '2021-11-12 06:42:12', '2021-11-12 06:42:12'),
(48, 5, 'dashboard/layanan-vendor/9', 'proses edit layanan-vendor', '-', '2021-11-12 06:42:19', '2021-11-12 06:42:19'),
(49, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:42:19', '2021-11-12 06:42:19'),
(50, 5, 'dashboard/layanan-vendor/8', 'view detail layanan-vendorCatering 500 orang by Zalza', '-', '2021-11-12 06:42:26', '2021-11-12 06:42:26'),
(51, 5, 'dashboard/layanan-vendor/8/edit', 'view edit layanan-vendorCatering 500 orang by Zalza', '-', '2021-11-12 06:42:30', '2021-11-12 06:42:30'),
(52, 5, 'dashboard/layanan-vendor/8', 'proses edit layanan-vendor', '-', '2021-11-12 06:42:36', '2021-11-12 06:42:36'),
(53, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:42:36', '2021-11-12 06:42:36'),
(54, 5, 'dashboard/layanan-vendor/7', 'view detail layanan-vendorCatering 1000 orang by Zalza', '-', '2021-11-12 06:42:43', '2021-11-12 06:42:43'),
(55, 5, 'dashboard/layanan-vendor/7/edit', 'view edit layanan-vendorCatering 1000 orang by Zalza', '-', '2021-11-12 06:42:46', '2021-11-12 06:42:46'),
(56, 5, 'dashboard/layanan-vendor/7', 'proses edit layanan-vendor', '-', '2021-11-12 06:42:52', '2021-11-12 06:42:52'),
(57, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:42:53', '2021-11-12 06:42:53'),
(58, 5, 'dashboard/layanan-vendor/6', 'view detail layanan-vendorHotel Haris Suites', '-', '2021-11-12 06:43:00', '2021-11-12 06:43:00'),
(59, 5, 'dashboard/layanan-vendor/6/edit', 'view edit layanan-vendorHotel Haris Suites', '-', '2021-11-12 06:43:04', '2021-11-12 06:43:04'),
(60, 5, 'dashboard/layanan-vendor/6', 'proses edit layanan-vendor', '-', '2021-11-12 06:43:10', '2021-11-12 06:43:10'),
(61, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:43:11', '2021-11-12 06:43:11'),
(62, 5, 'dashboard/layanan-vendor/5', 'view detail layanan-vendorHotel Morom', '-', '2021-11-12 06:43:17', '2021-11-12 06:43:17'),
(63, 5, 'dashboard/layanan-vendor/5/edit', 'view edit layanan-vendorHotel Morom', '-', '2021-11-12 06:43:21', '2021-11-12 06:43:21'),
(64, 5, 'dashboard/layanan-vendor/5', 'proses edit layanan-vendor', '-', '2021-11-12 06:43:28', '2021-11-12 06:43:28'),
(65, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:43:28', '2021-11-12 06:43:28'),
(66, 5, 'dashboard/layanan-vendor/4', 'view detail layanan-vendorHotel Helios Premium', '-', '2021-11-12 06:43:35', '2021-11-12 06:43:35'),
(67, 5, 'dashboard/layanan-vendor/4/edit', 'view edit layanan-vendorHotel Helios Premium', '-', '2021-11-12 06:43:39', '2021-11-12 06:43:39'),
(68, 5, 'dashboard/layanan-vendor/4', 'proses edit layanan-vendor', '-', '2021-11-12 06:43:45', '2021-11-12 06:43:45'),
(69, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:43:45', '2021-11-12 06:43:45'),
(70, 5, 'dashboard/layanan-vendor/3', 'view detail layanan-vendorWeding Organzer Silver', '-', '2021-11-12 06:43:52', '2021-11-12 06:43:52'),
(71, 5, 'dashboard/layanan-vendor/3/edit', 'view edit layanan-vendorWeding Organzer Silver', '-', '2021-11-12 06:43:56', '2021-11-12 06:43:56'),
(72, 5, 'dashboard/layanan-vendor/3', 'proses edit layanan-vendor', '-', '2021-11-12 06:44:01', '2021-11-12 06:44:01'),
(73, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:44:02', '2021-11-12 06:44:02'),
(74, 5, 'dashboard/layanan-vendor/2', 'view detail layanan-vendorWeding Organzer Gold', '-', '2021-11-12 06:44:09', '2021-11-12 06:44:09'),
(75, 5, 'dashboard/layanan-vendor/2/edit', 'view edit layanan-vendorWeding Organzer Gold', '-', '2021-11-12 06:44:12', '2021-11-12 06:44:12'),
(76, 5, 'dashboard/layanan-vendor/2', 'proses edit layanan-vendor', '-', '2021-11-12 06:44:19', '2021-11-12 06:44:19'),
(77, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:44:20', '2021-11-12 06:44:20'),
(78, 5, 'dashboard/layanan-vendor/1', 'view detail layanan-vendorWeding Organzer Platinum', '-', '2021-11-12 06:44:27', '2021-11-12 06:44:27'),
(79, 5, 'dashboard/layanan-vendor/1/edit', 'view edit layanan-vendorWeding Organzer Platinum', '-', '2021-11-12 06:44:30', '2021-11-12 06:44:30'),
(80, 5, 'dashboard/layanan-vendor/1', 'proses edit layanan-vendor', '-', '2021-11-12 06:44:35', '2021-11-12 06:44:35'),
(81, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 06:44:36', '2021-11-12 06:44:36'),
(82, 5, 'login', 'login', '-', '2021-11-12 09:49:10', '2021-11-12 09:49:10'),
(83, 5, 'dashboard/layanan-vendor', 'view dashboard layanan-vendor', '-', '2021-11-12 09:49:11', '2021-11-12 09:49:11'),
(84, 4, 'login', 'login', '-', '2021-11-12 09:49:52', '2021-11-12 09:49:52'),
(85, 3, 'login', 'login', '-', '2021-11-12 09:50:15', '2021-11-12 09:50:15'),
(86, 5, 'dashboard/paket-wo', 'view dashboard paket wo', '-', '2021-11-12 09:50:40', '2021-11-12 09:50:40'),
(87, 5, 'dashboard/paket-wo/create', 'view penambahan paket wo', '-', '2021-11-12 09:50:47', '2021-11-12 09:50:47'),
(88, 5, 'dashboard/paket-wo/create', 'proses penambahan paket wo Paket Platinum', '-', '2021-11-12 09:52:01', '2021-11-12 09:52:01'),
(89, 5, 'dashboard/paket-wo', 'view dashboard paket wo', '-', '2021-11-12 09:52:02', '2021-11-12 09:52:02'),
(90, 5, 'dashboard/paket-wo/create', 'view penambahan paket wo', '-', '2021-11-12 09:52:09', '2021-11-12 09:52:09'),
(91, 5, 'dashboard/paket-wo', 'view dashboard paket wo', '-', '2021-11-12 09:53:07', '2021-11-12 09:53:07'),
(92, 5, 'dashboard/paket-wo/create', 'view penambahan paket wo', '-', '2021-11-12 10:15:31', '2021-11-12 10:15:31'),
(93, 5, 'dashboard/paket-wo/create', 'proses penambahan paket wo Paket Gold', '-', '2021-11-12 10:16:40', '2021-11-12 10:16:40'),
(94, 5, 'dashboard/paket-wo', 'view dashboard paket wo', '-', '2021-11-12 10:16:41', '2021-11-12 10:16:41'),
(95, 5, 'dashboard/paket-wo/create', 'view penambahan paket wo', '-', '2021-11-12 10:16:47', '2021-11-12 10:16:47'),
(96, 5, 'dashboard/paket-wo/create', 'proses penambahan paket wo Paket Silver', '-', '2021-11-12 10:18:16', '2021-11-12 10:18:16'),
(97, 5, 'dashboard/paket-wo', 'view dashboard paket wo', '-', '2021-11-12 10:18:17', '2021-11-12 10:18:17'),
(98, 4, 'dashboard/paket-undangan', 'view dashboard undanganr', '-', '2021-11-12 10:19:12', '2021-11-12 10:19:12'),
(99, 4, 'dashboard/paket-undangan/create', 'view dashboard tambah undangan', '-', '2021-11-12 10:19:18', '2021-11-12 10:19:18'),
(100, 4, 'dashboard/paket-undangan/create', 'proses penambahan data undangan Undangan Tema Gelap', '-', '2021-11-12 10:20:42', '2021-11-12 10:20:42'),
(101, 4, 'dashboard/paket-undangan', 'view dashboard undanganr', '-', '2021-11-12 10:20:43', '2021-11-12 10:20:43'),
(102, 4, 'dashboard/paket-undangan/create', 'view dashboard tambah undangan', '-', '2021-11-12 10:21:04', '2021-11-12 10:21:04'),
(103, 4, 'dashboard/paket-undangan/create', 'proses penambahan data undangan Undangan Tema Emas', '-', '2021-11-12 10:21:49', '2021-11-12 10:21:49'),
(104, 4, 'dashboard/paket-undangan', 'view dashboard undanganr', '-', '2021-11-12 10:21:49', '2021-11-12 10:21:49'),
(105, 4, 'dashboard/paket-undangan/create', 'view dashboard tambah undangan', '-', '2021-11-12 10:21:53', '2021-11-12 10:21:53'),
(106, 4, 'dashboard/paket-undangan/create', 'proses penambahan data undangan Undangan Tema Mewah', '-', '2021-11-12 10:22:31', '2021-11-12 10:22:31'),
(107, 4, 'dashboard/paket-undangan', 'view dashboard undanganr', '-', '2021-11-12 10:22:32', '2021-11-12 10:22:32');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_15_060651_create_undangans_table', 1),
(6, '2021_09_16_092559_create_categories_table', 1),
(7, '2021_09_16_092636_create_vendors_table', 1),
(8, '2021_09_17_051039_create_statuses_table', 1),
(9, '2021_09_18_020856_create_wos_table', 1),
(10, '2021_09_18_021443_vendor_wo_table', 1),
(11, '2021_09_23_062421_create_pesanans_table', 1),
(12, '2021_09_25_035653_create_riwayats_table', 1),
(13, '2021_09_26_084320_create_roles_table', 1),
(14, '2021_10_16_032017_create_transaksis_table', 1),
(15, '2021_10_16_061228_create_transaksidetails_table', 1),
(16, '2021_10_16_124152_create_statustransaksi_table', 1),
(17, '2021_10_22_040241_create_logativitas_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan_paket` enum('undangan','wo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('belum','menunggu','sudah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` enum('custom','hotel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayats`
--

CREATE TABLE `riwayats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_acara` date DEFAULT NULL,
  `nama_pemesan` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_harga` int(11) DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `status_dp` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal_dp` int(11) DEFAULT NULL,
  `gambar_dp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelunasan` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal_pelunasan` int(11) DEFAULT NULL,
  `gambar_pelunasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttlpria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaayahpria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaibupria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namawanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttlwanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaayahwanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaibuwanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamatacara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'user', '2021-11-12 05:38:08', '2021-11-12 05:38:08'),
(2, 'vendor', '2021-11-12 05:38:08', '2021-11-12 05:38:08'),
(3, 'Ceo', '2021-11-12 05:38:08', '2021-11-12 05:38:08'),
(4, 'Finance', '2021-11-12 05:38:08', '2021-11-12 05:38:08'),
(5, 'Clientmanagent', '2021-11-12 05:38:08', '2021-11-12 05:38:08'),
(6, 'Vendormanagent', '2021-11-12 05:38:08', '2021-11-12 05:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembayaran_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembayaran_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesanan_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesanan_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `nama_status`, `keterangan`, `pembayaran_user`, `pembayaran_admin`, `pesanan_user`, `pesanan_admin`, `created_at`, `updated_at`) VALUES
(1, 'Menunggu', 'Menunggu', 'Menunggu Verifikasi', 'Menunggu', 'Sudah Pesan, Menunggu Pembayaran', 'Menunggu', '2021-11-12 05:38:07', '2021-11-12 05:38:07'),
(2, 'Diterima', 'Diterima', 'Terverifikasi', 'Diterima', 'Pesanan Diproses', 'Diterima', '2021-11-12 05:38:07', '2021-11-12 05:38:07'),
(3, 'Tidak', 'Tidak', 'Pembayaran tidak valid', 'Tidak', 'Pesanan Selesai', 'Selesai', '2021-11-12 05:38:07', '2021-11-12 05:38:07'),
(4, NULL, NULL, NULL, NULL, 'Pesanan Gagal Pembayaran Tidak Valid', 'Tidak', '2021-11-12 05:38:07', '2021-11-12 05:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `statustransaksi`
--

CREATE TABLE `statustransaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statustransaksi`
--

INSERT INTO `statustransaksi` (`id`, `admin`, `user`, `created_at`, `updated_at`) VALUES
(1, 'Belum', 'Belum', '2021-11-12 05:38:08', '2021-11-12 05:38:08'),
(2, 'Sudah', 'Sudah', '2021-11-12 05:38:08', '2021-11-12 05:38:08'),
(3, 'Tidak', 'Tidak', '2021-11-12 05:38:08', '2021-11-12 05:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `transaksidetails`
--

CREATE TABLE `transaksidetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_acara` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pemesan` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_dp` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal_dp` int(11) DEFAULT NULL,
  `bukti_dp` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pelunasan` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal_pelunasan` int(11) DEFAULT NULL,
  `bukti_pelunasan` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_vendor` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_vendor` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `riwayat_id` bigint(20) UNSIGNED NOT NULL,
  `wo_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_acara` date DEFAULT NULL,
  `nama_product` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pemesan` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `undangans`
--

CREATE TABLE `undangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_paket` enum('undangan','wo') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_pengerjaan` int(11) DEFAULT NULL,
  `harga` enum('0') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bintang` int(11) DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `undangans`
--

INSERT INTO `undangans` (`id`, `nama`, `keterangan_paket`, `lama_pengerjaan`, `harga`, `bintang`, `keterangan`, `gambar`, `gambar2`, `gambar3`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Undangan Tema Gelap', 'undangan', 7, '0', 5, 'Paket undangan dengan tema gelap', 'Capture22.PNG-1636712442.png', 'Capture222.PNG-1636712442.png', 'Capture22.PNG-1636712442.png', NULL, '2021-11-12 10:20:42', '2021-11-12 10:20:42'),
(2, 'Undangan Tema Emas', 'undangan', 7, '0', 5, 'Paket undangan dengan tema Emas', 'Capture33.PNG-1636712508.png', 'Capture333.PNG-1636712508.png', 'Capture3333.PNG-1636712509.png', NULL, '2021-11-12 10:21:49', '2021-11-12 10:21:49'),
(3, 'Undangan Tema Mewah', 'undangan', 7, '0', 5, 'Paket undangan dengan tema mewah', 'Capture.PNG-1636712551.png', 'Capture2.PNG-1636712551.png', 'Capture3.PNG-1636712551.png', NULL, '2021-11-12 10:22:31', '2021-11-12 10:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handphone` char(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_vendor` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_vendor` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_vendor` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp_vendor` char(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `alamat`, `handphone`, `email`, `email_verified_at`, `password`, `nama_vendor`, `email_vendor`, `instagram_vendor`, `alamat_usaha`, `telp_vendor`, `gambar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Doni', 'vendor', 'malang', '0812345678', 'doni@gmail.com', '2021-10-20 02:56:11', '$2y$10$pOpy4GXghLYPaOPTaOHizOIU/DAbK2rCJXAI0sCF5Gc5tpi6xw5UK', 'Doni Vendor', 'doni@gmail.com', 'donifirmansyah_', 'gak punya usaha', '08122333', NULL, NULL, '2021-11-12 05:38:08', '2021-11-12 05:44:40'),
(2, 'DoniCeo', 'Ceo', 'malang', '0812345678', 'DoniCeo@gmail.com', '2021-10-20 02:56:11', '$2y$10$skLKbJUDjTP2PJ2siwfZluSU8kwXkARhRx6nOF5uWCcS4GUTahymS', 'Doni Vendor', 'doni@gmail.com', 'donifirmansyah_', 'gak punya usaha', '08122333', NULL, NULL, '2021-11-12 05:38:08', '2021-11-12 05:38:08'),
(3, 'DoniFinance', 'Finance', 'malang', '0812345678', 'DoniFinance@gmail.com', '2021-10-20 02:56:11', '$2y$10$baKHd8VROOM9FNI80Jq53Ob7KWcJ/8ct1Dsc6Wau/NpQOi799S.RC', 'Doni Vendor', 'doni@gmail.com', 'donifirmansyah_', 'gak punya usaha', '08122333', NULL, NULL, '2021-11-12 05:38:08', '2021-11-12 05:38:08'),
(4, 'DoniClientmanagent', 'Clientmanagent', 'malang', '0812345678', 'DoniClientmanagent@gmail.com', '2021-10-20 02:56:11', '$2y$10$ctNOPoWePkIudUnLGLTFB.qUFeQdj9pojLPcmy7orMbDDtWobXJT2', 'Doni Vendor', 'doni@gmail.com', 'donifirmansyah_', 'gak punya usaha', '08122333', NULL, NULL, '2021-11-12 05:38:08', '2021-11-12 05:38:08'),
(5, 'DoniVendormanagent', 'Vendormanagent', 'malang', '0812345678', 'DoniVendormanagent@gmail.com', '2021-10-20 02:56:11', '$2y$10$iSyJHDDCxtG3.3M5LpHMLup.TboyoiCpQa0VxwQkEsT6fRjrpqG6C', 'Doni Vendor', 'doni@gmail.com', 'donifirmansyah_', 'gak punya usaha', '08122333', NULL, NULL, '2021-11-12 05:38:08', '2021-11-12 05:38:08'),
(6, 'Firmansyah', 'vendor', 'Malang', '081333425285', 'didonifirmansyah@gmail.com', '2021-11-12 06:26:18', '$2y$10$7d3PWD8VWGOnOKTWD/MAAuvvTB0gdfo05Q5KPQU1k5GVKX/PC.wt6', 'firmansyah Vendor', 'didonifirmansyah@gmail.com', 'didoni', 'malang', '081333425285', NULL, NULL, '2021-11-12 06:20:15', '2021-11-12 06:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_product` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `categorys` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar2` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar3` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar4` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar5` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `nama_product`, `category_id`, `user_id`, `categorys`, `harga`, `keterangan`, `gambar`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Weding Organzer Platinum', 1, 1, 'Weding Organizer', 5000000, 'Paket weding organizer dengan dokumentasi dan video sinematik', 'Capture3.PNG-1636696393.png', 'Capture2.PNG-1636696393.png', 'Capture.PNG-1636696393.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 05:53:13', '2021-11-12 06:44:35'),
(2, 'Weding Organzer Gold', 1, 1, 'Weding Organizer', 4000000, 'Paket weding organizer dengan dokumentasi dan video sinematik', 'Capture222weddingorganizerzalza.PNG-1636696463.png', 'Capture33.PNG-1636696463.png', 'Capture22.PNG-1636696463.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 05:54:23', '2021-11-12 06:44:19'),
(3, 'Weding Organzer Silver', 1, 1, 'Weding Organizer', 3000000, 'Paket weding organizer dengan dokumentasi dan video sinematik', 'Capture11.PNG-1636696567.png', 'Capture-queen_wedding_organizer.PNG-1636696567.png', 'Capture1.PNG-1636696567.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 05:56:07', '2021-11-12 06:44:01'),
(4, 'Hotel Helios Premium', 2, 1, 'Gedung', 15000000, 'Paket Gedung acara hotel dengan paket keamanan dan waktu pelayanan 12 jam', 'Capture3.PNG-1636696741.png', 'Capture2.PNG-1636696741.png', 'Capture.PNG-1636696741.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 05:59:01', '2021-11-12 06:43:45'),
(5, 'Hotel Morom', 2, 1, 'Gedung', 13000000, 'Paket Gedung acara hotel dengan paket keamanan dan waktu pelayanan 12 jam', 'Capture3.PNG-1636696999.png', 'Capture2.PNG-1636696999.png', 'Capture3.PNG-1636696999.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:03:19', '2021-11-12 06:43:28'),
(6, 'Hotel Haris Suites', 2, 1, 'Gedung', 12000000, 'Paket Gedung acara hotel dengan paket keamanan dan waktu pelayanan 12 jam', 'Capture4.PNG-1636697591.png', 'Capture3.PNG-1636697591.png', 'Capture.PNG-1636697591.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:13:12', '2021-11-12 06:43:10'),
(7, 'Catering 1000 orang by Zalza', 3, 1, 'Katering', 15000000, 'Catering 1000 orang by Zalza', 'Capture3.PNG-1636697713.png', 'Capture3.PNG-1636697713.png', 'Capture3.PNG-1636697713.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:15:13', '2021-11-12 06:42:52'),
(8, 'Catering 500 orang by Zalza', 3, 1, 'Katering', 8000000, 'Catering 500 orang by Zalza', 'Capture3.PNG-1636697779.png', 'Capture3.PNG-1636697779.png', 'Capture3.PNG-1636697779.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:16:19', '2021-11-12 06:42:36'),
(9, 'Catering 1000 orang by saya', 3, 1, 'Katering', 15000000, 'Catering 1000 orang by saya', 'Capture3.PNG-1636697852.png', 'Capture3.PNG-1636697852.png', 'Capture3.PNG-1636697852.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:17:32', '2021-11-12 06:42:19'),
(10, 'Rias By Saya dengan 4 gaunt', 4, 6, 'Riasan', 15000000, 'Rias By Saya dengan 4 gaunt', 'Capture3.PNG-1636698598.png', 'Capture.PNG-1636698598.png', 'Capture4.PNG-1636698598.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:29:58', '2021-11-12 06:42:01'),
(11, 'Rias By Saya dengan 2 gaunt', 4, 6, 'Riasan', 10000000, 'Rias By Saya dengan 2 gaunt', 'Capture.PNG-1636698670.png', 'Capture3.PNG-1636698670.png', 'Capture2.PNG-1636698670.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:31:10', '2021-11-12 06:41:44'),
(12, 'Rias By Saya dengan 1 gaunt', 4, 6, 'Riasan', 7000000, 'Rias By Saya dengan 1 gaunt', 'Capture.PNG-1636698743.png', 'Capture3.PNG-1636698744.png', 'Capture2.PNG-1636698744.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:32:24', '2021-11-12 06:41:28'),
(13, 'Dekor Tema Gold By Saya', 5, 6, 'Dekor', 9000000, 'Dekor Tema Gold By Saya', 'Capture3.PNG-1636698843.png', 'Capture2.PNG-1636698843.png', 'Capture.PNG-1636698843.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:34:03', '2021-11-12 06:41:12'),
(14, 'Dekor Tema Mewah By Saya', 5, 6, 'Dekor', 7000000, 'Dekor Tema Mewah By Saya', 'Capture3.PNG-1636698959.png', 'Capture2.PNG-1636698959.png', 'Capture.PNG-1636698959.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:35:59', '2021-11-12 06:40:56'),
(15, 'Pembawa Acara By Saya', 6, 6, 'Hiburan', 5000000, 'Pembawa Acara By Saya', 'ray_wahagheghe.PNG-1636699079.png', 'ray_wahagheghe.PNG-1636699079.png', 'ray_wahagheghe.PNG-1636699079.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:37:59', '2021-11-12 06:40:41'),
(16, 'Sound Sistem By Saya', 7, 6, 'Lain-Lain', 8000000, 'Sound Sistem By Saya', 'sound_system_eastjava.PNG-1636699158.png', 'sound_system_eastjava.PNG-1636699158.png', 'sound_system_eastjava.PNG-1636699158.png', NULL, NULL, 'Diterima', NULL, '2021-11-12 06:39:18', '2021-11-12 06:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_wo`
--

CREATE TABLE `vendor_wo` (
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `wo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_wo`
--

INSERT INTO `vendor_wo` (`vendor_id`, `wo_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-11-12 09:52:01', '2021-11-12 09:52:01'),
(4, 1, '2021-11-12 09:52:01', '2021-11-12 09:52:01'),
(7, 1, '2021-11-12 09:52:01', '2021-11-12 09:52:01'),
(10, 1, '2021-11-12 09:52:01', '2021-11-12 09:52:01'),
(13, 1, '2021-11-12 09:52:01', '2021-11-12 09:52:01'),
(15, 1, '2021-11-12 09:52:01', '2021-11-12 09:52:01'),
(2, 2, '2021-11-12 10:16:40', '2021-11-12 10:16:40'),
(6, 2, '2021-11-12 10:16:40', '2021-11-12 10:16:40'),
(7, 2, '2021-11-12 10:16:40', '2021-11-12 10:16:40'),
(11, 2, '2021-11-12 10:16:40', '2021-11-12 10:16:40'),
(14, 2, '2021-11-12 10:16:40', '2021-11-12 10:16:40'),
(3, 3, '2021-11-12 10:18:16', '2021-11-12 10:18:16'),
(6, 3, '2021-11-12 10:18:16', '2021-11-12 10:18:16'),
(8, 3, '2021-11-12 10:18:16', '2021-11-12 10:18:16'),
(12, 3, '2021-11-12 10:18:16', '2021-11-12 10:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `wos`
--

CREATE TABLE `wos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keterangan_paket` enum('undangan','wo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` enum('custom','reguler','belum') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `bintang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wos`
--

INSERT INTO `wos` (`id`, `user_id`, `keterangan_paket`, `tipe`, `nama`, `gambar`, `harga`, `bintang`, `keterangan`, `product1`, `product2`, `product3`, `product4`, `product5`, `product6`, `product7`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 5, 'wo', 'reguler', 'Paket Platinum', 'Capture3.PNG-1636710721.png', 64000000, '5', 'Paket Weding Organizer Lengkap Super Mewah', '1', '4', '7', '10', '13', '15', NULL, NULL, '2021-11-12 09:52:01', '2021-11-12 09:52:01'),
(2, 5, 'wo', 'reguler', 'Paket Gold', 'Capture22.PNG-1636712200.png', 48000000, '5', 'Paket Weding Organizer Lengkap dan Mewah', '2', '6', '7', '11', '14', NULL, NULL, NULL, '2021-11-12 10:16:40', '2021-11-12 10:16:40'),
(3, 5, 'wo', 'reguler', 'Paket Silver', 'Capture-queen_wedding_organizer.PNG-1636712296.png', 30000000, '5', 'Paket weding Organizeer dengan harga Terjangkau', '3', '6', '8', '12', NULL, NULL, NULL, NULL, '2021-11-12 10:18:16', '2021-11-12 10:18:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logativitas`
--
ALTER TABLE `logativitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_user_id_foreign` (`user_id`);

--
-- Indexes for table `riwayats`
--
ALTER TABLE `riwayats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayats_user_id_foreign` (`user_id`),
  ADD KEY `riwayats_status_id_foreign` (`status_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statustransaksi`
--
ALTER TABLE `statustransaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksidetails`
--
ALTER TABLE `transaksidetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `undangans`
--
ALTER TABLE `undangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_nama_product_unique` (`nama_product`);

--
-- Indexes for table `vendor_wo`
--
ALTER TABLE `vendor_wo`
  ADD KEY `vendor_wo_vendor_id_foreign` (`vendor_id`),
  ADD KEY `vendor_wo_wo_id_foreign` (`wo_id`);

--
-- Indexes for table `wos`
--
ALTER TABLE `wos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logativitas`
--
ALTER TABLE `logativitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayats`
--
ALTER TABLE `riwayats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statustransaksi`
--
ALTER TABLE `statustransaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksidetails`
--
ALTER TABLE `transaksidetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `undangans`
--
ALTER TABLE `undangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wos`
--
ALTER TABLE `wos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `riwayats`
--
ALTER TABLE `riwayats`
  ADD CONSTRAINT `riwayats_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `riwayats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vendor_wo`
--
ALTER TABLE `vendor_wo`
  ADD CONSTRAINT `vendor_wo_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vendor_wo_wo_id_foreign` FOREIGN KEY (`wo_id`) REFERENCES `wos` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
