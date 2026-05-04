-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2026 at 07:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kredit_motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kredit` bigint(20) UNSIGNED NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `total_bayar` double NOT NULL,
  `keterangan` text DEFAULT NULL,
  `macet` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id`, `id_kredit`, `tgl_bayar`, `angsuran_ke`, `total_bayar`, `keterangan`, `macet`, `created_at`, `updated_at`) VALUES
(13, 2, '2026-04-20', 1, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:27:46'),
(14, 2, '2026-04-20', 2, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:29:40'),
(15, 2, '2026-04-20', 3, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:29:51'),
(16, 2, '2026-04-20', 4, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:30:02'),
(17, 2, '2026-04-20', 5, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:30:15'),
(18, 2, '2026-04-20', 6, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:30:26'),
(19, 2, '2026-04-20', 7, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:30:42'),
(20, 2, '2026-04-20', 8, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:30:56'),
(21, 2, '2026-04-20', 9, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:31:13'),
(22, 2, '2026-04-20', 10, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:31:31'),
(23, 2, '2026-04-20', 11, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:32:01'),
(24, 2, '2026-04-20', 12, 3150000, 'Dibayar via Transfer BCA', 0, '2026-04-19 20:16:51', '2026-04-19 21:31:49'),
(25, 4, '2026-04-21', 1, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:04:44'),
(26, 4, '2026-04-21', 2, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:18:42'),
(27, 4, '2026-04-21', 3, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:18:54'),
(28, 4, '2026-04-21', 4, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:19:03'),
(29, 4, '2026-04-21', 5, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:19:13'),
(30, 4, '2026-04-21', 6, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:19:23'),
(31, 4, '2026-04-21', 7, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:19:32'),
(32, 4, '2026-04-21', 8, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:19:46'),
(33, 4, '2026-04-21', 9, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:19:55'),
(34, 4, '2026-04-21', 10, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:20:05'),
(35, 4, '2026-04-21', 11, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:20:15'),
(36, 4, '2026-04-21', 12, 3329166.6666667, 'Dibayar via Transfer BCA', 0, '2026-04-20 19:03:48', '2026-04-20 19:20:27'),
(37, 5, '2026-04-22', 1, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:34:19'),
(38, 5, '2026-04-22', 2, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:34:31'),
(39, 5, '2026-04-22', 3, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:34:50'),
(40, 5, '2026-04-22', 4, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:35:02'),
(41, 5, '2026-04-22', 5, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:35:14'),
(42, 5, '2026-04-22', 6, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:35:53'),
(43, 5, '2026-04-22', 7, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:36:10'),
(44, 5, '2026-04-22', 8, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:36:43'),
(45, 5, '2026-04-22', 9, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:37:10'),
(46, 5, '2026-04-22', 10, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:37:26'),
(47, 5, '2026-04-22', 11, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:37:44'),
(48, 5, '2026-04-22', 12, 1045833.3333333, 'Dibayar via Transfer BCA', 0, '2026-04-21 18:33:07', '2026-04-21 18:38:47'),
(49, 6, '2026-04-28', 1, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-04-27 19:17:17'),
(50, 6, '2026-04-28', 2, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-04-27 19:59:18'),
(51, 6, '2026-05-01', 3, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-05-01 05:15:46'),
(52, 6, '2026-05-02', 4, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-05-02 06:09:33'),
(53, 6, '2026-05-02', 5, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-05-02 06:11:38'),
(54, 6, '2026-05-02', 6, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-05-02 06:12:10'),
(55, 6, '2026-05-02', 7, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-05-02 06:12:47'),
(56, 6, '2026-05-02', 8, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-05-02 06:13:18'),
(57, 6, '2026-05-02', 9, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-05-02 06:13:53'),
(58, 6, '2026-05-02', 10, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-05-02 06:14:37'),
(59, 6, '2026-05-02', 11, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-05-02 06:15:39'),
(60, 6, '2026-05-02', 12, 1294667, 'Dibayar via Midtrans (credit_card)', 0, '2026-04-27 02:10:31', '2026-05-02 06:16:24'),
(61, 8, '2026-05-03', 1, 3951250, 'Dibayar via Midtrans (credit_card)', 0, '2026-05-02 20:51:47', '2026-05-02 20:54:30'),
(62, 8, NULL, 2, 3951250, 'Jatuh tempo 01/07/2026', 0, '2026-05-02 20:51:48', '2026-05-02 20:51:48'),
(63, 8, NULL, 3, 3951250, 'Jatuh tempo 01/08/2026', 0, '2026-05-02 20:51:48', '2026-05-02 20:51:48'),
(64, 8, NULL, 4, 3951250, 'Jatuh tempo 01/09/2026', 0, '2026-05-02 20:51:48', '2026-05-02 20:51:48'),
(65, 8, NULL, 5, 3951250, 'Jatuh tempo 01/10/2026', 0, '2026-05-02 20:51:48', '2026-05-02 20:51:48'),
(66, 8, NULL, 6, 3951250, 'Jatuh tempo 01/11/2026', 0, '2026-05-02 20:51:48', '2026-05-02 20:51:48'),
(67, 8, NULL, 7, 3951250, 'Jatuh tempo 01/12/2026', 0, '2026-05-02 20:51:48', '2026-05-02 20:51:48'),
(68, 8, NULL, 8, 3951250, 'Jatuh tempo 01/01/2027', 0, '2026-05-02 20:51:48', '2026-05-02 20:51:48'),
(69, 8, NULL, 9, 3951250, 'Jatuh tempo 01/02/2027', 0, '2026-05-02 20:51:48', '2026-05-02 20:51:48'),
(70, 8, NULL, 10, 3951250, 'Jatuh tempo 01/03/2027', 0, '2026-05-02 20:51:48', '2026-05-02 20:51:48'),
(71, 8, NULL, 11, 3951250, 'Jatuh tempo 01/04/2027', 0, '2026-05-02 20:51:48', '2026-05-02 20:51:48'),
(72, 8, NULL, 12, 3951250, 'Jatuh tempo 01/05/2027', 0, '2026-05-02 20:51:48', '2026-05-02 20:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `asuransi`
--

CREATE TABLE `asuransi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan_asuransi` varchar(30) NOT NULL,
  `nama_asuransi` varchar(50) NOT NULL,
  `margin_asuransi` decimal(8,2) NOT NULL,
  `no_rekening` varchar(25) DEFAULT NULL,
  `url_logo` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asuransi`
--

INSERT INTO `asuransi` (`id`, `nama_perusahaan_asuransi`, `nama_asuransi`, `margin_asuransi`, `no_rekening`, `url_logo`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Jasindo', 'Asuransi Kendaraan', 2.00, '129938872', NULL, NULL, '2026-04-19 03:21:09', '2026-04-20 18:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hero_settings`
--

CREATE TABLE `hero_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `subjudul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `teks_tombol` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_settings`
--

INSERT INTO `hero_settings` (`id`, `judul`, `subjudul`, `deskripsi`, `gambar`, `teks_tombol`, `created_at`, `updated_at`) VALUES
(1, 'Kredit Motor Mudah, Cepat & Terpercaya', NULL, 'Nikmati kemudahan kredit motor dengan cicilan ringan dan bunga kompetitif. Pilih berbagai jenis motor sesuai kebutuhanmu, ajukan secara online, dan pantau prosesnya secara real-time tanpa ribet.', 'hero/IAqrayUMcSzV6zBcivK8wmnXlcvF5aCrKWAcRe5G.jpg', NULL, '2026-05-01 18:16:49', '2026-05-01 18:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cicilan`
--

CREATE TABLE `jenis_cicilan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lama_cicilan` int(11) NOT NULL,
  `margin_kredit` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_cicilan`
--

INSERT INTO `jenis_cicilan` (`id`, `lama_cicilan`, `margin_kredit`, `created_at`, `updated_at`) VALUES
(1, 12, 10.00, '2026-04-19 03:19:49', '2026-04-19 03:19:49'),
(2, 24, 15.00, '2026-04-19 03:20:06', '2026-04-19 03:20:06'),
(3, 36, 20.00, '2026-04-19 03:20:21', '2026-04-19 03:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_motor`
--

CREATE TABLE `jenis_motor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merk` varchar(50) NOT NULL,
  `jenis` enum('Bebek','Skuter','Dual Sport','Naked Sport','Sport Bike','Retro','Cruiser','Sport Touring','Dirt Bike','Motocross','Scrambler','ATV','Motor Adventure','Lainnya') NOT NULL,
  `deskripsi_jenis` varchar(255) DEFAULT NULL,
  `image_uri` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_motor`
--

INSERT INTO `jenis_motor` (`id`, `merk`, `jenis`, `deskripsi_jenis`, `image_uri`, `created_at`, `updated_at`) VALUES
(1, 'Yamaha', 'Sport Bike', 'Motor dengan desain aerodinamis dan performa tinggi, biasanya digunakan untuk kecepatan dan gaya berkendara sporty.', NULL, '2026-04-19 03:27:09', '2026-04-19 23:52:51'),
(2, 'Honda', 'Sport Touring', 'Motor yang menggabungkan performa sport dan kenyamanan touring, cocok untuk perjalanan jarak jauh.', NULL, '2026-04-19 21:36:41', '2026-04-19 23:52:33'),
(3, 'Kawasaki', 'Sport Bike', 'Motor dengan desain aerodinamis dan performa tinggi, biasanya digunakan untuk kecepatan dan gaya berkendara sporty.', NULL, '2026-04-19 23:32:36', '2026-04-19 23:32:36'),
(4, 'Suzuki', 'Bebek', 'Motor dengan transmisi semi-otomatis, irit bahan bakar, dan cocok untuk penggunaan harian serta perjalanan jarak dekat.', NULL, '2026-04-19 23:50:41', '2026-04-19 23:50:41'),
(5, 'Vespa', 'Skuter', 'Motor otomatis (matic) yang mudah dikendarai, nyaman, dan praktis untuk aktivitas sehari-hari di perkotaan.', NULL, '2026-04-19 23:51:42', '2026-04-19 23:51:42'),
(6, 'Honda', 'Skuter', 'Motor otomatis (matic) yang mudah dikendarai, nyaman, dan praktis untuk aktivitas sehari-hari di perkotaan.', NULL, '2026-04-19 23:54:00', '2026-04-19 23:54:00'),
(7, 'Polytron', 'Lainnya', 'Kategori untuk motor yang tidak termasuk dalam jenis di atas, seperti motor listrik atau jenis khusus lainnya.', NULL, '2026-04-19 23:56:12', '2026-04-19 23:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kredit`
--

CREATE TABLE `kredit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengajuan_kredit` bigint(20) UNSIGNED NOT NULL,
  `id_metode_bayar` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_mulai_kredit` date DEFAULT NULL,
  `tgl_selesai_kredit` date DEFAULT NULL,
  `sisa_kredit` double NOT NULL DEFAULT 0,
  `status_kredit` enum('Dicicil','Macet','Lunas') NOT NULL DEFAULT 'Dicicil',
  `keterangan_status_kredit` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL,
  `tempat_bayar` varchar(50) DEFAULT NULL,
  `no_rekening` varchar(25) DEFAULT NULL,
  `url_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_04_132639_create_permission_tables', 1),
(5, '2026_04_04_135329_create_pelanggan_table', 1),
(6, '2026_04_04_135418_create_jenis_motor_table', 1),
(7, '2026_04_04_135420_create_motor_table', 1),
(8, '2026_04_04_135457_create_jenis_cicilan_table', 1),
(9, '2026_04_04_135511_create_asuransi_table', 1),
(10, '2026_04_04_135523_create_metode_bayar_table', 1),
(11, '2026_04_04_135609_create_pengajuan_kredit_table', 1),
(12, '2026_04_04_135625_create_angsuran_table', 1),
(13, '2026_04_04_135807_create_pengiriman_table', 1),
(14, '2026_04_20_113335_update_status_pengajuan_add_selesai', 2),
(15, '2026_05_01_111215_create_hero_settings_table', 3),
(16, '2026_05_01_111231_add_macet_to_angsuran_table', 3),
(17, '2026_05_01_111239_add_selesai_to_pengiriman_table', 3),
(18, '2026_05_01_111245_add_keterangan_to_asuransi_table', 3),
(19, '2026_05_01_125844_add_macet_to_angsuran_table', 4),
(20, '2026_05_01_125855_create_hero_settings_table', 5),
(21, '2026_05_01_125903_add_keterangan_to_asuransi_table', 5),
(22, '2026_05_01_125911_add_selesai_to_pengiriman_table', 5),
(23, '2026_05_04_070117_create_kredit_table', 6),
(24, '2026_05_04_070218_add_dp_dibayar_to_pengajuan_kredit', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merk` varchar(50) NOT NULL,
  `nama_motor` varchar(100) NOT NULL,
  `idjenis` bigint(20) UNSIGNED NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `deskripsi_motor` text DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `kapasitas_mesin` varchar(10) DEFAULT NULL,
  `tahun_produksi` varchar(4) DEFAULT NULL,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`id`, `merk`, `nama_motor`, `idjenis`, `harga_jual`, `deskripsi_motor`, `warna`, `kapasitas_mesin`, `tahun_produksi`, `foto1`, `foto2`, `foto3`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Yamaha', 'Yamaha R15', 1, 38000000, 'Motor sport fairing dari Yamaha dengan desain agresif ala motor balap. Ditenagai mesin 155cc VVA (Variable Valve Actuation) yang responsif dan irit bahan bakar.Dilengkapi fitur modern seperti assist & slipper clutch, traction control (di varian tertentu), serta suspensi depan upside down yang meningkatkan kenyamanan dan stabilitas saat berkendara.', 'Black', '155cc', '2024', 'motor/ZflRK7QqTIOSayjwlK5uBVZ3MXdLPsQBIOaubaho.png', 'motor/fV7I7RzGEyD5iCcuDH2wZHDNqqkwQBAwtGF58Viu.png', 'motor/bWh9HEjQAGHzAA5Xctby3yTClgXn0CX5hTBuQDOD.png', 5, '2026-04-19 03:46:52', '2026-05-03 09:15:25'),
(2, 'Honda', 'Vario 125', 2, 25000000, 'cepat', 'Black', '120cc', '2023', 'motor/EGs0p8FPhFsIkI5gvHw5DyVnhE13Ii0SJhTWJZRe.png', 'motor/klKcnoEL4LHATRPbHwccp5vMQJisAQgNZlE9Uv8R.png', 'motor/P6MZt5pggOUv4LGXRglv3YG8MDgwAeuyStBzlLx5.png', 3, '2026-04-19 21:38:43', '2026-05-03 09:14:57'),
(3, 'Vespa', 'Vespa spirint 150', 5, 54500000, 'Vespa Sprint 150 merupakan skuter premium dengan desain klasik khas Italia yang elegan dan modern. Cocok untuk penggunaan harian dengan gaya stylish.', 'White', '150cc', '2024', 'motor/G7MNcXsl7sNJEwyyO1aZFdcoib59d6DN7BzGNWmN.png', 'motor/Eqo45T55U3l2JOWkqDHUEo4G39RJcOGgnChfD4Lb.png', 'motor/vNnKorcCh3fpuDstzI71ThYBomgsm2ZoucVbl0pN.png', 4, '2026-04-20 00:02:07', '2026-05-03 09:14:36'),
(4, 'Polytron', 'Polytron Fox-R', 7, 20500000, 'Polytron Fox-R merupakan motor listrik modern yang ramah lingkungan dengan performa optimal untuk penggunaan harian. Ditenagai motor 3000W dengan kecepatan hingga 95 km/jam dan jarak tempuh mencapai 130 km', 'Green', '300w', '2024', 'motor/0SviqsqvJdzcmoU3AGoTywr2skTSIW38700leS9F.png', 'motor/aWYLuyzC8ePQCgyePoiusp8gs6GEPz4o0UXzrNwB.png', 'motor/KtoWgwKrLhbYylG9dMm8amgRcja3YPt1S3zMQfYG.png', 3, '2026-04-20 00:38:48', '2026-05-03 09:14:17'),
(5, 'Honda', 'Honda Scoopy', 6, 22800000, 'Honda Scoopy merupakan skuter bergaya retro modern dengan desain unik dan stylish. Ditenagai mesin 110cc yang irit bahan bakar serta nyaman dikendarai, motor ini sangat cocok untuk penggunaan harian di perkotaan.', 'Soft Green', '110cc', '2024', 'motor/VewIhnl9FSN7EiO0BcCkwvflEKU0MOkkqxYy5oeK.png', 'motor/MFMszPBzYDaUgeW26a2HcpDznr2BHwQpB5UBwL7T.png', 'motor/L7q00CQGdBybohUQBZA10HhahyQew7gBYH6w0WA2.png', 5, '2026-04-20 03:06:16', '2026-05-03 09:13:48'),
(6, 'Honda', 'Beat CBS', 6, 18000000, 'Honda BeAT CBS adalah motor skuter matic yang ringan, irit, dan sangat cocok untuk penggunaan harian. Dibekali mesin 110cc eSP yang efisien serta desain modern yang lincah untuk mobilitas di perkotaan. Cocok untuk pelajar, pekerja, dan penggunaan sehari-hari.', 'Deep Blue', '110cc', '2023', 'motor/LsRrLtFckmKxb4NwIpivOeI9XxR0hs4QaI20m8Ne.png', 'motor/KrYL7RUJ0ryFQ0diZcm7ajd2moDAmesIptsbELjf.png', 'motor/2DbtKWHCMMkJdvYNeTIrnSjZHNKhDKMo7cL1Fdno.png', 5, '2026-05-03 09:08:23', '2026-05-03 09:08:23'),
(7, 'Yamaha', 'Nmax', 1, 33000000, 'Yamaha NMAX 155 Connected ABS hadir dengan mesin 155cc VVA yang bertenaga dan nyaman untuk perjalanan jarak jauh. Dilengkapi fitur modern seperti ABS, traction control, dan konektivitas smartphone, menjadikannya pilihan ideal untuk kenyamanan dan performa.', 'Matte SIlver', '155cc', '2022', 'motor/JVCphrMuzXmqgJXPVmbF9wQTWtxXeZ0sSppqrnif.png', 'motor/huO0QA4bKX6fJym4kZKp5SGZtRVxGJGjoE5MySDI.png', 'motor/Jk6nahN2kvtFbGhbhHeQIgrjLNE4Bn2RcFl3314T.png', 5, '2026-05-03 09:09:49', '2026-05-03 09:09:49'),
(8, 'Yamaha', 'Aerox 155', 1, 27999998, 'Yamaha Aerox 155 Connected adalah skuter sporty dengan desain agresif dan performa tinggi. Mengusung mesin 155cc VVA yang responsif, cocok untuk pengendara muda yang mengutamakan gaya dan kecepatan dalam berkendara.', 'Black Blue', '155cc', '2024', 'motor/dbFfF8p3G9p4o06oYasrWSAO90EphZosKPyQKr1r.png', 'motor/CIcipjR9TVPORV0yIqkRCpNlvsqoU4tikjc8dfU6.png', 'motor/6tLbmi33TXiUxc1PA3YHhcIy67ZxuOgUaD7vgedj.png', 5, '2026-05-03 09:12:48', '2026-05-03 09:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `katakunci` varchar(15) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat1` varchar(255) DEFAULT NULL,
  `kota1` varchar(255) DEFAULT NULL,
  `propinsi1` varchar(255) DEFAULT NULL,
  `kodepos1` varchar(10) DEFAULT NULL,
  `alamat2` varchar(255) DEFAULT NULL,
  `kota2` varchar(255) DEFAULT NULL,
  `propinsi2` varchar(255) DEFAULT NULL,
  `kodepos2` varchar(10) DEFAULT NULL,
  `alamat3` varchar(255) DEFAULT NULL,
  `kota3` varchar(255) DEFAULT NULL,
  `propinsi3` varchar(255) DEFAULT NULL,
  `kodepos3` varchar(10) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `email`, `katakunci`, `no_telp`, `alamat1`, `kota1`, `propinsi1`, `kodepos1`, `alamat2`, `kota2`, `propinsi2`, `kodepos2`, `alamat3`, `kota3`, `propinsi3`, `kodepos3`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Arvin', 'arvin@gmail.com', NULL, '0812346758', 'Graha', 'Bogor', 'Jawa Barat', '14913', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pelanggan/ZTnW2nfheMWtXdJI3IRVG3jDXouvRTaOsWRecBTw.jpg', '2026-04-19 03:50:01', '2026-04-19 03:50:01'),
(2, 'Hildaz', 'hilda@gmail.com', NULL, '0892173623', 'Pondok Indah', 'Jakarta', 'Jawa Barat', '40921', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pelanggan/BTbVjVTfoU79xASOzmZTVs7YeOP29mOs0PS9tVOg.jpg', '2026-04-20 19:00:02', '2026-04-20 19:00:02'),
(3, 'Hadiya', 'arvin.hadiyyatullah.3@gmail.com', NULL, '083116255348', 'Summarecon Bogor', 'Bogor', 'Jawa Barat', '14039', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pelanggan/61WZlMbSb4J3fvXDTCZqXeEkhqL6o8oFZOdfIbSI.jpg', '2026-05-02 20:43:23', '2026-05-02 20:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_kredit`
--

CREATE TABLE `pengajuan_kredit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pengajuan_kredit` date NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `id_motor` bigint(20) UNSIGNED NOT NULL,
  `harga_cash` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `id_jenis_cicilan` bigint(20) UNSIGNED NOT NULL,
  `harga_kredit` double NOT NULL,
  `id_asuransi` bigint(20) UNSIGNED NOT NULL,
  `biaya_asuransi_perbulan` double NOT NULL,
  `cicilan_perbulan` double NOT NULL,
  `url_kk` varchar(255) DEFAULT NULL,
  `url_ktp` varchar(255) DEFAULT NULL,
  `url_npwp` varchar(255) DEFAULT NULL,
  `url_slip_gaji` varchar(255) DEFAULT NULL,
  `url_foto` varchar(255) DEFAULT NULL,
  `status_pengajuan` enum('Menunggu Konfirmasi','Diterima','DP Dibayar','Diproses','Selesai','Dibatalkan Pembeli','Dibatalkan Penjual','Bermasalah') DEFAULT 'Menunggu Konfirmasi',
  `keterangan_status_pengajuan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan_kredit`
--

INSERT INTO `pengajuan_kredit` (`id`, `tgl_pengajuan_kredit`, `id_pelanggan`, `id_motor`, `harga_cash`, `dp`, `id_jenis_cicilan`, `harga_kredit`, `id_asuransi`, `biaya_asuransi_perbulan`, `cicilan_perbulan`, `url_kk`, `url_ktp`, `url_npwp`, `url_slip_gaji`, `url_foto`, `status_pengajuan`, `keterangan_status_pengajuan`, `created_at`, `updated_at`) VALUES
(2, '2026-04-20', 1, 1, 38000000, 4000000, 1, 41800000, 1, 63333.333333333, 3150000, 'dokumen/emV0hzsZNZWTtk1EmXnLn5xB6n3u4Pjiih4PRzsF.png', 'dokumen/ROj0Cdt60OIlcI9vjnowN86A6etsGbVJN2RjIGb9.jpg', 'dokumen/RtEnVoas9Wf45n28mRnAgBh4XGdPtVCVHeinUBHQ.png', 'dokumen/uIv5GqzkNHQyOsV4P4DgJRglhHOm3dOPfHaZnlod.jpg', 'dokumen/TnYQpAwof2Qa2rAUJT6QAMGdbQh6F2vGAiCwmbOi.jpg', 'Selesai', NULL, '2026-04-19 20:14:28', '2026-04-21 06:17:48'),
(4, '2026-04-21', 2, 3, 54500000, 20000000, 1, 59950000, 1, 90833.333333333, 3329166.6666667, 'dokumen/X0w6HRT5c8mzxKkaEp0jsPhQLJXKO4hSPvLmDR3S.jpg', 'dokumen/47SV7lt25If4AIyRFWgIs9RzuiPzeE1jIzCSD9x6.png', 'dokumen/E69zIIANcIHuqO0odxA5sqTDg6iYLMZkICSeWzW7.png', 'dokumen/xQMd1GXeYhilpRTwlAfdkDHv3eTsHSOGUqk9TiuR.jpg', 'dokumen/t6u0p8SEaAiX8aMLehBgQgWmF16Peluenk0IrsrE.jpg', 'Selesai', NULL, '2026-04-20 19:02:10', '2026-04-20 19:20:27'),
(5, '2026-04-22', 2, 4, 20500000, 10000000, 1, 22550000, 1, 34166.666666667, 1045833.3333333, 'dokumen/Z44b8SIM4Cm1HqWFxkBJojU3rgyXzhd0DNo1J7R7.png', 'dokumen/ONzRkRFeYgzqF984uHOqQczyMZRXagQjiy7qTq93.jpg', 'dokumen/BcsnSAjvAOuqs2gWay0sU26k6tRGoYZfuBiMVMfb.jpg', 'dokumen/gOXISDZGBuM6IJaLy9BP3mopnWIV8qOgmAzgSzdm.jpg', 'dokumen/Z2IEEGLjEPKxJsNSLEoJyGFVRCFv7Hlegx4igZEe.jpg', 'Selesai', NULL, '2026-04-21 17:41:14', '2026-04-21 18:38:47'),
(6, '2026-04-26', 2, 5, 22800000, 10000000, 1, 25080000, 1, 38000, 1256666.6666667, 'dokumen/z17cVdao10bqaYr2OoSyh4aKelshFbwjL0gHfwgR.jpg', 'dokumen/0FZLPsh6Sh9OO7qFGi0NprG1BOZKJPkkvzgfbYgE.jpg', 'dokumen/vvyvPtc8tBWzqTQoFsd4O5IGqKioVRZwV2uHSzTt.jpg', 'dokumen/PyByXitxCaw5FQE803BNNLjX9tKnatLHT1FoaemH.jpg', 'dokumen/6MCXxzcKGUmtdYvKUXDbThlja2eig2jgclNUoH7E.jpg', 'Selesai', 'DP terverifikasi. Kredit aktif. Angsuran dimulai bulan depan.', '2026-04-26 08:28:22', '2026-05-02 06:16:24'),
(7, '2026-04-27', 1, 3, 54500000, 20000000, 1, 59950000, 1, 90833, 3329167, 'dokumen/AkUePELUJfbML1E1ZvwBb4HXhtzrPqWnSzswTRLY.jpg', 'dokumen/pCbAOw7kqhnoWl3k48cwtLKBxkeEAkLF0I2zTJM8.jpg', 'dokumen/m4rAFncBboBcAtmNOWQOocy0wBYbYa5oexyaNaAH.jpg', 'dokumen/sqy2YlCAo4Xbz5n5z6rCQdYCxjLl23MAvmiJGMyE.jpg', 'dokumen/uXUtHabcTYAg1NNjtmUtVBh7tpt0utnGDsss3GJ8.jpg', 'Diterima', 'iya nih di acc', '2026-04-26 21:21:48', '2026-04-26 21:45:46'),
(8, '2026-05-03', 3, 3, 54500000, 13625000, 1, 59950000, 1, 90833, 3860417, 'dokumen/bVT14rBvrgzTKcMl58YtKertZ25TUybWIEr5oDA9.jpg', 'dokumen/y43T0VNhh0irYnaKiZAJwKRN6LcSgio9EL3TnCVk.jpg', 'dokumen/qApSmiGy6yo7DdyniBKk6eCRw7m9qIIR34wJXBCl.jpg', 'dokumen/sE0l2N5UNjnR1hlhgNfR8CWmOicg6h00iXJ4pdvC.jpg', 'dokumen/IexF47CE05TW3ySrU09H32I1321oqJmA1mmushiH.jpg', 'Diproses', 'DP terverifikasi. Kredit aktif. Angsuran dimulai bulan depan.', '2026-05-02 20:46:47', '2026-05-02 20:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_invoice` varchar(255) DEFAULT NULL,
  `tgl_kirim` datetime DEFAULT NULL,
  `tgl_tiba` datetime DEFAULT NULL,
  `status_kirim` enum('Sedang Dikirim','Tiba Di Tujuan') NOT NULL DEFAULT 'Sedang Dikirim',
  `nama_kurir` varchar(30) DEFAULT NULL,
  `telpon_kurir` varchar(15) DEFAULT NULL,
  `bukti_foto` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `id_kredit` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `no_invoice`, `tgl_kirim`, `tgl_tiba`, `status_kirim`, `nama_kurir`, `telpon_kurir`, `bukti_foto`, `keterangan`, `id_kredit`, `created_at`, `updated_at`) VALUES
(1, 'INV-20260420-0002', NULL, NULL, 'Tiba Di Tujuan', 'JNE Express', '08123456789', NULL, 'Motor sudah tiba', 2, '2026-04-19 20:16:51', '2026-04-19 20:23:15'),
(2, 'INV-20260421-0004', NULL, NULL, 'Tiba Di Tujuan', 'MARK', '08926731522', NULL, 'Pengiriman Sudah tibaaaaaaaaaaaaaaaa', 4, '2026-04-20 19:03:48', '2026-04-21 18:32:34'),
(3, 'INV-20260422-0005', NULL, NULL, 'Tiba Di Tujuan', 'JNE Express', '08725179312', NULL, 'NIH SAMPE', 5, '2026-04-21 18:33:07', '2026-04-25 19:18:44'),
(4, 'INV-20260427-0006', NULL, NULL, 'Tiba Di Tujuan', 'JNE Express', '08926731522', 'pengiriman/XrTL5JEFSl3GP8AgQLtOs4KU0Bn2FkTt5I2m9iqe.jpg', 'dah sampe nih', 6, '2026-04-27 02:10:31', '2026-05-02 06:18:14'),
(5, 'INV-20260503-0008', NULL, NULL, 'Sedang Dikirim', 'JNE Express', '08926731522', 'pengiriman/tc9IIhQZwjI3O43oEm2HypACrBJE07ms4wgpglUE.jpg', 'Motor dalam proses pengiriman ke alamat pelanggan.', 8, '2026-05-02 20:51:48', '2026-05-03 10:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2026-04-18 07:33:00', '2026-04-18 07:33:00'),
(2, 'client', 'web', '2026-04-18 07:33:00', '2026-04-18 07:33:00'),
(3, 'marketing', 'web', '2026-05-01 05:25:29', '2026-05-01 05:25:29'),
(4, 'ceo', 'web', '2026-05-01 05:25:29', '2026-05-01 05:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JCUjZBaTW0htAgEsWUtsl5oZ9TemZy77uOFluYxd', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiY05lbGVJdzlHbkw0SDZMSnJQSHNLOW9ra05ZT1JwYXFoWDM0SW03MyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbGllbnQvcGVuZ2FqdWFuL2NyZWF0ZT9tb3Rvcl9pZD0zIjtzOjU6InJvdXRlIjtzOjIzOiJjbGllbnQucGVuZ2FqdWFuLmNyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzc3OTE0MTQyO319', 1777914198);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@kreditmotor.com', NULL, '$2y$12$6n49uPH1L95ZHQ/YHHbG0uv5Pt/NvVKksw7g7LPnWERJJ5dCz7F2O', NULL, '2026-04-18 07:33:00', '2026-04-18 07:33:00'),
(2, 'Arvin', 'arvin@gmail.com', NULL, '$2y$12$o.PUT7SDJaV7AtXO2t1ypOfjXh4WP1jUO/0.u8kwHTJJvkCJdt4lS', NULL, '2026-04-18 07:40:19', '2026-04-18 07:40:19'),
(4, 'Hilda', 'hilda@gmail.com', NULL, '$2y$12$GldWPaQWENEMZ/WQZxYy6eHb/MWlRC9D6bqrwVUbeyL3StC/wmjcO', NULL, '2026-04-20 18:58:00', '2026-04-20 18:58:00'),
(5, 'Marketing Staff', 'marketing@kreditmotor.com', NULL, '$2y$12$Jri9Wn/r/hKOZOzchpLXAOLORBMKwnXEoTMBEHtGdML7OtssXcuNm', NULL, '2026-05-01 05:25:38', '2026-05-01 05:25:38'),
(6, 'CEO / Owner', 'ceo@kreditmotor.com', NULL, '$2y$12$h2L0FAG3ybH1nj4RsitLge/nLGZWkPpYLR4HNoRg1C6nf9Vw3lB6C', NULL, '2026-05-01 05:25:38', '2026-05-01 05:25:38'),
(7, 'Hadi', 'arvin.hadiyyatullah.3@gmail.com', NULL, '$2y$12$H3lYEqTKXolAUKC3.PDkUOKzMgeyKASNWHRqRdq427aTaNpF.qqJS', NULL, '2026-05-02 20:40:20', '2026-05-02 20:40:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `angsuran_id_kredit_foreign` (`id_kredit`);

--
-- Indexes for table `asuransi`
--
ALTER TABLE `asuransi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hero_settings`
--
ALTER TABLE `hero_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_cicilan`
--
ALTER TABLE `jenis_cicilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_motor`
--
ALTER TABLE `jenis_motor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kredit`
--
ALTER TABLE `kredit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kredit_id_pengajuan_kredit_foreign` (`id_pengajuan_kredit`),
  ADD KEY `kredit_id_metode_bayar_foreign` (`id_metode_bayar`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `motor_idjenis_foreign` (`idjenis`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_kredit`
--
ALTER TABLE `pengajuan_kredit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_kredit_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `pengajuan_kredit_id_motor_foreign` (`id_motor`),
  ADD KEY `pengajuan_kredit_id_jenis_cicilan_foreign` (`id_jenis_cicilan`),
  ADD KEY `pengajuan_kredit_id_asuransi_foreign` (`id_asuransi`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_id_kredit_foreign` (`id_kredit`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `asuransi`
--
ALTER TABLE `asuransi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_settings`
--
ALTER TABLE `hero_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_cicilan`
--
ALTER TABLE `jenis_cicilan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_motor`
--
ALTER TABLE `jenis_motor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kredit`
--
ALTER TABLE `kredit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajuan_kredit`
--
ALTER TABLE `pengajuan_kredit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran_id_kredit_foreign` FOREIGN KEY (`id_kredit`) REFERENCES `pengajuan_kredit` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kredit`
--
ALTER TABLE `kredit`
  ADD CONSTRAINT `kredit_id_metode_bayar_foreign` FOREIGN KEY (`id_metode_bayar`) REFERENCES `metode_bayar` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kredit_id_pengajuan_kredit_foreign` FOREIGN KEY (`id_pengajuan_kredit`) REFERENCES `pengajuan_kredit` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `motor`
--
ALTER TABLE `motor`
  ADD CONSTRAINT `motor_idjenis_foreign` FOREIGN KEY (`idjenis`) REFERENCES `jenis_motor` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan_kredit`
--
ALTER TABLE `pengajuan_kredit`
  ADD CONSTRAINT `pengajuan_kredit_id_asuransi_foreign` FOREIGN KEY (`id_asuransi`) REFERENCES `asuransi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_kredit_id_jenis_cicilan_foreign` FOREIGN KEY (`id_jenis_cicilan`) REFERENCES `jenis_cicilan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_kredit_id_motor_foreign` FOREIGN KEY (`id_motor`) REFERENCES `motor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_kredit_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_id_kredit_foreign` FOREIGN KEY (`id_kredit`) REFERENCES `pengajuan_kredit` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
