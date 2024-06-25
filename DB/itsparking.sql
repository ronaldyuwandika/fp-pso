-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 04:13 PM
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
-- Database: `itsparking`
--

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_17_203341_create_parkir_table', 1),
(6, '2023_06_17_203611_create_user_parkir_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parkir`
--

CREATE TABLE `parkir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_parkir` varchar(255) NOT NULL,
  `nama_parkir` varchar(255) NOT NULL,
  `kuota_parkir` int(11) NOT NULL,
  `kendaraan_parkir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parkir`
--

INSERT INTO `parkir` (`id`, `kode_parkir`, `nama_parkir`, `kuota_parkir`, `kendaraan_parkir`, `created_at`, `updated_at`) VALUES
(1, 'K87F6H', 'Parkiran Sistem Informasi', 100, 2, NULL, '2023-06-18 05:24:01'),
(2, 'A2', 'Parkiran Informatika', 200, 0, NULL, NULL),
(3, 'A3', 'Parkiran Teknologi Informasi', 250, 0, NULL, NULL),
(4, 'A4', 'Parkiran Teknik Elektro', 200, 0, NULL, NULL),
(5, 'A5', 'Parkiran Teknik Biomedik', 100, 0, NULL, NULL),
(6, 'A6', 'Parkiran Teknik Komputer', 120, 0, NULL, NULL),
(7, 'A7', 'Parkiran Teknik Telekomunikasi', 140, 0, NULL, NULL),
(8, 'A8', 'Parkiran Perpustakaan', 300, 0, NULL, NULL);

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
  `username` varchar(255) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `nrp` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `plate_number`, `nrp`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'B 1234 ABC', '05111940000001', 'admin', NULL, '$2y$10$b890Kzfim5f8hZALAgl6B.jTh9sp89Mrm4p32v.9HYapMDVSCTf06', NULL, '2023-06-18 05:21:37', '2023-06-18 05:21:37'),
(2, 'Agung Jaya', 'agung.hiswara15@gmail.com', 'AJ', 'DR 2185 UA', '5026211122', 'user', NULL, '$2y$10$t8Astn4HlBvu4/iB7axrJe5fOaGsTWrYpWZMrfCMm8un7urLbamtO', NULL, '2023-06-18 05:23:08', '2023-06-18 05:23:08'),
(3, 'Danish Carnagie', 'tes@tes.com', 'Danish', 'L4321JJ', '5026211046', 'user', NULL, '$2y$10$DSEuHJPaZrgAkJJ8Yuy7C.bXDDPFTbokZ0j6dGt8.BdzM5PuAO572', NULL, '2023-06-18 05:26:31', '2023-06-18 05:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_parkir`
--

CREATE TABLE `user_parkir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parkir_id` bigint(20) UNSIGNED NOT NULL,
  `kode_parkir` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_parkir`
--

INSERT INTO `user_parkir` (`id`, `user_id`, `parkir_id`, `kode_parkir`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'K87F6H', '2023-06-18 05:24:42', '2023-06-18 05:24:42'),
(2, 3, 1, 'K87F6H', '2023-06-18 05:27:37', '2023-06-18 05:27:37');

--
-- Triggers `user_parkir`
--
DELIMITER $$
CREATE TRIGGER `user_parkir_after_delete` AFTER DELETE ON `user_parkir` FOR EACH ROW BEGIN
                UPDATE parkir SET kendaraan_parkir = kendaraan_parkir - 1 WHERE id = OLD.parkir_id;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `user_parkir_after_insert` AFTER INSERT ON `user_parkir` FOR EACH ROW BEGIN
                UPDATE parkir SET kendaraan_parkir = kendaraan_parkir + 1 WHERE id = NEW.parkir_id;
            END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `parkir`
--
ALTER TABLE `parkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_plate_number_unique` (`plate_number`);

--
-- Indexes for table `user_parkir`
--
ALTER TABLE `user_parkir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_parkir_user_id_foreign` (`user_id`),
  ADD KEY `user_parkir_parkir_id_foreign` (`parkir_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parkir`
--
ALTER TABLE `parkir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_parkir`
--
ALTER TABLE `user_parkir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_parkir`
--
ALTER TABLE `user_parkir`
  ADD CONSTRAINT `user_parkir_parkir_id_foreign` FOREIGN KEY (`parkir_id`) REFERENCES `parkir` (`id`),
  ADD CONSTRAINT `user_parkir_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
