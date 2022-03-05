-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 09:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `16_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Role Administrator'),
(2, 'petugas', 'Role Petugas'),
(3, 'user', 'Role User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 3),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin@spp.com', 1, '2022-02-20 19:01:56', 1),
(2, '::1', 'admin@spp.com', 1, '2022-02-20 19:31:28', 1),
(3, '::1', 'admin@spp.sch.id', 1, '2022-02-21 17:53:09', 1),
(4, '::1', 'admin@spp.sch.id', 1, '2022-02-21 19:27:21', 1),
(5, '::1', 'admin@spp.sch.id', 1, '2022-02-23 20:37:56', 1),
(6, '::1', 'admin@spp.sch.id', 1, '2022-02-23 20:40:22', 1),
(7, '::1', 'admin@spp.sch.id', 1, '2022-02-24 01:27:22', 1),
(8, '::1', 'admin@spp.sch.id', 1, '2022-02-24 06:39:10', 1),
(9, '::1', 'admin@spp.sch.id', 1, '2022-02-24 18:41:49', 1),
(10, '::1', 'admin@spp.sch.id', 1, '2022-02-25 19:34:35', 1),
(11, '::1', 'admin@spp.sch.id', 1, '2022-02-26 06:23:03', 1),
(12, '::1', 'admin@spp.sch.id', 1, '2022-02-26 19:08:59', 1),
(13, '::1', 'admin@spp.sch.id', 1, '2022-02-27 00:42:25', 1),
(14, '::1', 'petugas', NULL, '2022-02-27 07:05:39', 0),
(15, '::1', 'petugas@spp.sch.id', 3, '2022-02-27 07:05:53', 1),
(16, '::1', 'admin@spp.sch.id', 1, '2022-02-27 07:37:11', 1),
(17, '::1', '12345', NULL, '2022-02-27 07:48:16', 0),
(18, '::1', '12345', NULL, '2022-02-27 07:48:24', 0),
(19, '::1', '12345', NULL, '2022-02-27 07:48:43', 0),
(20, '::1', 'admin@spp.sch.id', 1, '2022-02-27 08:05:43', 1),
(21, '::1', 'petugas@spp.sch.id', 3, '2022-02-27 08:11:02', 1),
(22, '::1', '00526775243', NULL, '2022-02-27 08:30:43', 0),
(23, '::1', 'admin@spp.sch.id', 1, '2022-02-27 19:22:08', 1),
(24, '::1', 'admin@spp.sch.id', 1, '2022-02-27 19:29:40', 1),
(25, '::1', 'admin@spp.sch.id', 1, '2022-02-27 19:40:26', 1),
(26, '::1', 'admin@spp.sch.id', 1, '2022-02-27 19:40:50', 1),
(27, '::1', 'admin@spp.sch.id', 1, '2022-02-27 19:41:33', 1),
(28, '::1', 'admin@spp.sch.id', 1, '2022-02-27 19:43:03', 1),
(29, '::1', 'petugas@spp.sch.id', 3, '2022-02-27 20:10:59', 1),
(30, '::1', 'petugas', NULL, '2022-02-27 20:14:29', 0),
(31, '::1', 'petugas@spp.sch.id', 3, '2022-02-27 20:14:43', 1),
(32, '::1', 'admin@spp.sch.id', 1, '2022-02-27 20:29:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) UNSIGNED NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `jurusan`) VALUES
(2, 'XII', 'RPL'),
(3, 'XII', 'OTKP');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-02-17-192634', 'App\\Database\\Migrations\\CreateKelasTable', 'default', 'App', 1645404791, 1),
(2, '2022-02-17-192641', 'App\\Database\\Migrations\\CreateSppTable', 'default', 'App', 1645404792, 1),
(3, '2022-02-17-192651', 'App\\Database\\Migrations\\CreateSiswaTable', 'default', 'App', 1645404793, 1),
(4, '2022-02-17-192747', 'App\\Database\\Migrations\\CreatePembayaranTable', 'default', 'App', 1645404793, 1),
(5, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1645404799, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) UNSIGNED NOT NULL,
  `nisn` char(10) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` enum('Belum Lunas','Lunas') NOT NULL DEFAULT 'Belum Lunas',
  `id_spp` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nisn`, `tanggal`, `status`, `id_spp`) VALUES
(17, '0046652087', '2022-02-27 19:26:39', 'Belum Lunas', 1),
(18, '0052677524', '2022-02-27 20:05:50', 'Lunas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `tagihan` enum('0','1') NOT NULL DEFAULT '0',
  `id_kelas` int(11) UNSIGNED NOT NULL,
  `id_spp` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `alamat`, `telp`, `tagihan`, `id_kelas`, `id_spp`) VALUES
('0046652087', '10234', NULL, NULL, '0', 2, 1),
('0052677524', '10253', '', '', '0', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` int(11) UNSIGNED NOT NULL,
  `tahun` varchar(9) NOT NULL,
  `nominal` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `tahun`, `nominal`) VALUES
(1, '2021/2022', 260000),
(2, '2022/2023', 270000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nisn` char(10) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `role` enum('admin','petugas','user') NOT NULL DEFAULT 'user',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `nisn`, `nama`, `role`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@spp.sch.id', 'admin', NULL, 'Administrator', 'admin', '$2y$10$4pG5o7t9X4QzOCPRVG0chOIZWAPksNRhhsHrk1wGa.ktkcqeNGnju', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-02-20 18:58:09', NULL, NULL),
(3, 'petugas@spp.sch.id', 'petugas', NULL, 'Petugas', 'petugas', '$2y$10$kZTLNJ1MMD7QNpYNBZJPIeaeiM5KbAZURKVP9g5z1EnviXvT0LAue', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-02-21 19:17:17', '2022-02-21 19:17:17', NULL),
(8, NULL, '0046652087', '0046652087', 'JONATHAN CHRISTOPER BASUKI', 'user', '$2y$10$ip.j2HmKVUY0xhaIuGxTxOc1Sa52FyGBMvs81VdNDIZF25b0vKFfS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-02-25 20:31:26', NULL, NULL),
(16, NULL, '00526775243', '0052677524', 'JOKO', 'user', '$2y$10$7ZrsqwA97BsRdXmsCHBp5u6Ek8V6p0Bf9Qe10NObTIsKSRBkAL6EG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-02-26 07:16:33', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `siswa_id_kelas_foreign` (`id_kelas`),
  ADD KEY `siswa_id_spp_foreign` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_spp`) REFERENCES `siswa` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_id_spp_foreign` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
