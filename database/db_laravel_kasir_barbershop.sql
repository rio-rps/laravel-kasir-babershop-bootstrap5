-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 11:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laravel_kasir_barbershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cpar_001_satuan`
--

CREATE TABLE `cpar_001_satuan` (
  `id_satuan` bigint(20) UNSIGNED NOT NULL,
  `nm_satuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpar_001_satuan`
--

INSERT INTO `cpar_001_satuan` (`id_satuan`, `nm_satuan`, `created_at`, `updated_at`) VALUES
(1, 'Botol', '2023-01-07 01:33:48', '2023-01-07 02:07:43'),
(2, 'Buah', '2023-01-07 01:34:09', '2023-01-07 01:34:27'),
(3, 'Jasa Pelayanan', '2023-01-07 01:34:41', '2023-01-07 02:04:54'),
(4, 'Service', '2023-01-07 01:34:50', '2023-01-07 02:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `cpar_002_kategori`
--

CREATE TABLE `cpar_002_kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nm_kategori` varchar(255) NOT NULL,
  `status_layanan` enum('1','2') NOT NULL COMMENT '1 = untuk pelayanan tanpa mengurangi stok, 2 = untuk product mengurangi stok',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpar_002_kategori`
--

INSERT INTO `cpar_002_kategori` (`id_kategori`, `nm_kategori`, `status_layanan`, `created_at`, `updated_at`) VALUES
(1, 'Pelayanan', '1', '2023-01-05 03:15:22', '2023-01-05 03:15:22'),
(2, 'Produk', '2', '2023-01-05 03:15:22', '2023-01-05 03:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `cpar_003_barangjasa`
--

CREATE TABLE `cpar_003_barangjasa` (
  `id_brgjasa` bigint(20) UNSIGNED NOT NULL,
  `nm_brgjasa` varchar(255) NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `id_satuan` bigint(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_jual_real` int(11) NOT NULL,
  `ket_brgjasa` text NOT NULL,
  `status_tersedia` enum('1','2') NOT NULL COMMENT '1 = tampil / barang tersedia, 2 = tidak tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpar_003_barangjasa`
--

INSERT INTO `cpar_003_barangjasa` (`id_brgjasa`, `nm_brgjasa`, `id_kategori`, `id_satuan`, `stok`, `harga_beli`, `harga_jual`, `diskon`, `harga_jual_real`, `ket_brgjasa`, `status_tersedia`, `created_at`, `updated_at`) VALUES
(3, 'Potong Rambut Anak', 1, 2, 0, 10000, 15000, 0, 15000, 'Potong rambut khusus anak anak', '1', '2023-01-05 04:17:43', '2023-01-05 04:17:43'),
(4, 'Potong Rambut Khusus Dewasa', 1, 2, 0, 20000, 25000, 10000, 15000, 'Potong Rambut Khusus Dewasa', '1', '2023-01-05 04:21:44', '2023-01-06 01:26:14'),
(5, 'Capiar', 2, 1, 0, 10000, 20000, 2000, 18000, 'Capiar Penumbuh Rambut Cap Kuda\r\nSangat Ampuh', '1', '2023-01-05 04:32:41', '2023-01-05 04:32:41'),
(6, 'Penumbuh Jenggot', 2, 1, 0, 30000, 50000, 10000, 40000, 'Obat Penumbuh Jenggot', '1', '2023-01-05 05:34:15', '2023-01-06 01:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `cpar_004_akun_potongan`
--

CREATE TABLE `cpar_004_akun_potongan` (
  `id_pot` bigint(20) UNSIGNED NOT NULL,
  `nm_pot` varchar(255) NOT NULL,
  `ket_pot` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpar_004_akun_potongan`
--

INSERT INTO `cpar_004_akun_potongan` (`id_pot`, `nm_pot`, `ket_pot`, `created_at`, `updated_at`) VALUES
(1, 'Potongan Minuman', 'Digunakan untuk potongan minuman', '2023-01-06 02:28:08', '2023-01-07 02:16:39'),
(2, 'Potongan Makanan', 'Digunakan untuk potongan makanan', '2023-01-06 02:28:38', '2023-01-07 02:18:43'),
(3, 'Voucher Hari Pahlawan', 'Voucher di bagian pada hari pahlawan', '2023-01-06 02:29:09', '2023-01-06 02:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `ddd_001_beli_barang`
--

CREATE TABLE `ddd_001_beli_barang` (
  `id_beli_brg` bigint(20) UNSIGNED NOT NULL,
  `id_barangjasa` bigint(20) UNSIGNED NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `ket_beli` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_30_015731_create_cpar_001_satuan_table', 1),
(6, '2022_12_30_015759_create_cpar_002_kategori_table', 1),
(7, '2022_12_30_015828_create_cpar_003_barangjasa_table', 1),
(8, '2023_01_05_023732_create_cpar_004_akun_potongan_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(5) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '2023-01-05 03:08:14', '$2y$10$zzgeGTtZydNl7yy9epNOYuW6nwqxz4QUe2RNE7LrdZGs2p7Mafmf.', '1', NULL, NULL, NULL),
(2, 'kasir', 'kasir@gmail.com', 'kasir', '2023-01-05 03:08:14', '$2y$10$zzgeGTtZydNl7yy9epNOYuW6nwqxz4QUe2RNE7LrdZGs2p7Mafmf.', '2', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cpar_001_satuan`
--
ALTER TABLE `cpar_001_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `cpar_002_kategori`
--
ALTER TABLE `cpar_002_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `cpar_003_barangjasa`
--
ALTER TABLE `cpar_003_barangjasa`
  ADD PRIMARY KEY (`id_brgjasa`),
  ADD KEY `cpar_003_barangjasa_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `cpar_004_akun_potongan`
--
ALTER TABLE `cpar_004_akun_potongan`
  ADD PRIMARY KEY (`id_pot`);

--
-- Indexes for table `ddd_001_beli_barang`
--
ALTER TABLE `ddd_001_beli_barang`
  ADD PRIMARY KEY (`id_beli_brg`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cpar_001_satuan`
--
ALTER TABLE `cpar_001_satuan`
  MODIFY `id_satuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cpar_002_kategori`
--
ALTER TABLE `cpar_002_kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cpar_003_barangjasa`
--
ALTER TABLE `cpar_003_barangjasa`
  MODIFY `id_brgjasa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cpar_004_akun_potongan`
--
ALTER TABLE `cpar_004_akun_potongan`
  MODIFY `id_pot` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ddd_001_beli_barang`
--
ALTER TABLE `ddd_001_beli_barang`
  MODIFY `id_beli_brg` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cpar_003_barangjasa`
--
ALTER TABLE `cpar_003_barangjasa`
  ADD CONSTRAINT `cpar_003_barangjasa_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `cpar_002_kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
