-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 04:28 AM
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
-- Database: `test_peminjaman_alat`
--

-- --------------------------------------------------------

--
-- Table structure for table `alats`
--

CREATE TABLE `alats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jenis` bigint(20) UNSIGNED NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `batas_pinjam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alats`
--

INSERT INTO `alats` (`id`, `id_jenis`, `nama_alat`, `stok`, `denda`, `batas_pinjam`, `created_at`, `updated_at`) VALUES
(3, 1, 'Mata Bor 1 inch', 10, 5000, 5, '2023-11-15 20:07:54', '2023-11-15 20:07:54'),
(4, 1, 'Mesin Drill', 10, 6000, 2, '2023-11-15 20:08:37', '2023-11-15 20:22:12');

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
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama_jenis`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Perlengkapan Drill', 'Segala Macam Perlengkapan Untuk Mesin Drill', '2023-11-15 19:08:57', '2023-11-15 19:08:57'),
(5, 'Perlengkapan Bor', 'Segala Macam Perlengkapan Untuk Mesin Bor', '2023-11-15 20:06:45', '2023-11-15 20:06:45');

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
(97, '2014_10_12_000000_create_users_table', 1),
(98, '2014_10_12_100000_create_password_resets_table', 1),
(99, '2019_08_19_000000_create_failed_jobs_table', 1),
(100, '2023_11_06_060441_create_jenis_table', 1),
(101, '2023_11_06_063425_create_alats_table', 1),
(102, '2023_11_06_074337_create_peminjamen_table', 1);

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
-- Table structure for table `peminjamen`
--

CREATE TABLE `peminjamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_member` varchar(255) NOT NULL,
  `id_alat` bigint(20) UNSIGNED NOT NULL,
  `id_petugas` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `total_denda` int(11) NOT NULL DEFAULT 0,
  `status` enum('Kembali','Pinjam') NOT NULL DEFAULT 'Pinjam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjamen`
--

INSERT INTO `peminjamen` (`id`, `id_member`, `id_alat`, `id_petugas`, `tanggal_pinjam`, `tanggal_kembali`, `jumlah_pinjam`, `total_denda`, `status`, `created_at`, `updated_at`) VALUES
(10, 'M1982', 4, 1, '2023-11-16', '2023-11-16', 5, 0, 'Kembali', '2023-11-15 20:19:53', '2023-11-15 20:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_member` varchar(5) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `level` enum('Admin','Petugas','Member') NOT NULL DEFAULT 'Member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_member`, `nama`, `username`, `password`, `no_telp`, `email`, `alamat`, `level`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Aldy Aditia H', 'SuperAdmin1', '$2y$10$YSnYojBWO.mEDuw26/jGxe5VOtMHmb9IVIS4GwSbHT6ovfHQGtMIO', '089691317764', 'aldyah@gmail.com', NULL, 'Admin', '2023-11-15 19:01:31', '2023-11-15 20:17:07'),
(2, NULL, 'Petugas Dummy', 'Petugas1', '$2y$10$s7nqvNLbmNCv8ZeLZpcNkeKVIWwUiQvTSNOOsVNDNHpTbuDcsFuYu', '083828265400', 'aldyah@gmail.com', NULL, 'Petugas', '2023-11-15 19:01:59', '2023-11-15 19:01:59'),
(3, 'M1982', 'Member Dummy', 'Member 1', '$2y$10$60bGqJj9iZUV3n0wtouhTuK8eKZQOohG8oUsKUJ194RCD6L1fAmlm', '089691317764', 'aldyah@gmail.com', 'Jl. Margaasih', 'Member', '2023-11-15 19:02:38', '2023-11-15 20:21:42'),
(6, 'M9020', 'Aldy Aditia Hidayat', 'Member 2', '$2y$10$MFc0l6dwd0Hy.NMSmi5b/eG5xXfhX0nlPVvrqCjGonm9DlZIwOzB6', '083828265400', 'aldyah@proton.me', 'Jl. Margaasih', 'Member', '2023-11-15 19:57:58', '2023-11-15 19:57:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alats`
--
ALTER TABLE `alats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alats_id_jenis_foreign` (`id_jenis`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
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
-- Indexes for table `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamen_id_petugas_foreign` (`id_petugas`),
  ADD KEY `peminjamen_id_alat_foreign` (`id_alat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alats`
--
ALTER TABLE `alats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alats`
--
ALTER TABLE `alats`
  ADD CONSTRAINT `alats_id_jenis_foreign` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD CONSTRAINT `peminjamen_id_alat_foreign` FOREIGN KEY (`id_alat`) REFERENCES `alats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjamen_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
