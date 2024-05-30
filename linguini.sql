-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2024 pada 17.57
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linguini`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chef_profiles`
--

CREATE TABLE `chef_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `chef_profiles`
--

INSERT INTO `chef_profiles` (`id`, `user_id`, `profile_picture`, `cover_photo`, `name`, `skills`, `bio`, `created_at`, `updated_at`) VALUES
(2, 3, NULL, NULL, 'Rizna', 'chop-chop', 'aku rizna', '2024-05-16 19:54:10', '2024-05-16 19:54:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idPelanggan` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'eastern', '2024-05-12 02:36:24', '2024-05-23 01:59:33'),
(3, 'masakan mamah', '2024-05-12 03:10:59', '2024-05-12 03:10:59'),
(4, 'pizza', '2024-05-12 03:15:05', '2024-05-12 03:15:05'),
(6, 'soto', '2024-05-13 23:45:15', '2024-05-13 23:45:15'),
(7, 'snack', '2024-05-21 06:00:02', '2024-05-21 06:00:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id_menu` int(11) NOT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga_menu` varchar(12) NOT NULL,
  `gambar_menu` varchar(100) NOT NULL,
  `berita_menu` text NOT NULL,
  `tanggal_menu` date NOT NULL,
  `dilihat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id_menu`, `penulis`, `id_kategori`, `nama_menu`, `harga_menu`, `gambar_menu`, `berita_menu`, `tanggal_menu`, `dilihat`, `created_at`, `updated_at`) VALUES
(5, 'Arnold Linguini', 2, 'PIZZA BROWSKI', '20.80 $', 'public/images/qzaiHtuFIY2KN5un3XO5w9VLlzjVxFpv7SMQY9S2.jpg', 'Delicious Food', '2024-05-01', 300, NULL, '2024-05-23 03:10:35'),
(6, 'Arnold Linguini', 1, 'KEBAB ANJIR', '15.10 $', 'public/images/BUBVjsTNTvnqNPyaEnsrc23lQ4TaeqZzRBpE4Nw7.jpg', 'Delicious Food', '2024-05-01', 241, NULL, '2024-05-18 02:45:26'),
(7, 'Arnold Linguini', 4, 'NASI MAMAH LINA', '8.90 $', 'public/images/v8ZtROignEPTWAOuVh0Lh76lBTmt2ZF5CPAwnPtO.jpg', 'Delicious Food', '2024-05-01', 80, NULL, '2024-05-18 02:45:35'),
(8, 'Arnold Linguini', 2, 'PASTA RADATULI', '60.80 $', 'public/images/51hQRSqbcQdqXuPm0CuzNOlyjP5glmHL1KS5kaJM.jpg', 'Delicious Food', '2024-05-01', 900, NULL, '2024-05-23 03:06:51'),
(11, 'Arnold Linguini', 4, 'NASI TUMPENG', '53.45 $', 'public/images/7ASrdmamQfLGGRJbtCryamV3Y45APK2fwnzmEdZK.jpg', 'Delicious Food', '2024-05-16', 890, '2024-05-15 10:22:51', '2024-05-18 02:45:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_sets`
--

CREATE TABLE `menu_sets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_08_021532_add_role_to_users_table', 2),
(6, '2024_05_12_090046_create_kategoris_table', 3),
(7, '2024_05_14_070428_create_menu_sets_table', 4),
(8, '2024_05_14_071606_add_updated_at_to_menus_table', 4),
(9, '2024_05_15_174847_create_chef_profiles_table', 5),
(10, '2024_05_19_025924_create_feedback_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idPelanggan` bigint(20) UNSIGNED NOT NULL,
  `idMenu` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `idPelanggan` int(11) DEFAULT NULL,
  `idMeja` int(11) DEFAULT NULL,
  `hargaMeja` int(11) DEFAULT NULL,
  `tipeMeja` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jamMasuk` time DEFAULT NULL,
  `jamKeluar` time DEFAULT NULL,
  `biaya` decimal(10,2) DEFAULT NULL,
  `atasNama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `buktiBayar` varchar(255) DEFAULT NULL,
  `status` enum('processing','waiting','confirmed','rejected','attended','absent') DEFAULT 'processing',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reservation`
--

INSERT INTO `reservation` (`id`, `idPelanggan`, `idMeja`, `hargaMeja`, `tipeMeja`, `tanggal`, `jamMasuk`, `jamKeluar`, `biaya`, `atasNama`, `email`, `telepon`, `buktiBayar`, `status`, `created_at`, `updated_at`) VALUES
(77, 9, 8, 100000, '4 Orang', '2024-05-30', '18:01:00', '21:01:00', 300000.00, 'geri', 'geri@gmail.com', '081234567898', 'public/images/bukti_bayar/HxRXRsOOUAxvAU5dJoemholYQPl02ucJ6wlZSxVX.jpg', 'confirmed', '2024-05-21 10:01:24', '2024-05-21 03:56:53'),
(78, 9, 2, 200000, '8 Orang', '2024-06-04', '19:13:00', '21:13:00', 400000.00, 'geri', 'geri@gmail.com', '081234567898', 'public/images/bukti_bayar/QTxpAUTGKjFUvqDZsX3k4pVTg4GuqliPU7WvlrED.jpg', 'waiting', '2024-05-21 11:13:12', '2024-05-21 11:13:35'),
(79, 9, 9, 200000, '8 Orang', '2024-06-03', '17:02:00', '19:02:00', 400000.00, 'geri', 'geri@gmail.com', '083456789', 'public/images/bukti_bayar/JecWbZudoYxqZQj23NaIeJlmL3W4hS111DI4aoPq.png', 'waiting', '2024-05-23 09:02:32', '2024-05-23 09:03:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `namaMeja` varchar(100) NOT NULL,
  `tipeMeja` varchar(20) NOT NULL,
  `hargaMeja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tables`
--

INSERT INTO `tables` (`id`, `namaMeja`, `tipeMeja`, `hargaMeja`) VALUES
(1, 'Meja 1', '8 Orang', 200000),
(2, 'Meja 2', '8 Orang', 200000),
(3, 'Meja 3', '4 Orang', 100000),
(4, 'Meja 4', '4 Orang', 100000),
(5, 'Meja 5', '4 Orang', 100000),
(6, 'Meja 6', '4 Orang', 100000),
(7, 'Meja 7', '4 Orang', 100000),
(8, 'Meja 8', '4 Orang', 100000),
(9, 'Meja 9', '8 Orang', 200000),
(10, 'Meja 10', '8 Orang', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `idPelanggan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pesanan` longtext NOT NULL,
  `total` int(10) NOT NULL,
  `nomorMeja` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `payment` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ticket`
--

INSERT INTO `ticket` (`id`, `idPelanggan`, `tanggal`, `pesanan`, `total`, `nomorMeja`, `status`, `payment`, `created_at`, `updated_at`) VALUES
(20, 24, '2023-12-09', '[{\"namaMenu\":\"Strawberry Cream Puffs\",\"quantity\":\"1\",\"subtotalMenu\":20000},{\"namaMenu\":\"Gingerbread White Russian\",\"quantity\":\"2\",\"subtotalMenu\":60000}]', 80000, 2, 'done', '', NULL, NULL),
(21, 26, '2024-05-21', '[{\"namaMenu\":\"Souffle Pancakes\",\"quantity\":\"1\",\"subtotalMenu\":30000}]', 30000, 0, 'done', '', NULL, '2024-05-23 00:57:23'),
(32, 9, '2024-05-23', '[{\"namaMenu\":\"KEBAB ANJIR\",\"quantity\":5,\"subtotalMenu\":75.5},{\"namaMenu\":\"PIZZA BROWSKI\",\"quantity\":4,\"subtotalMenu\":83.2}]', 159, 5, 'confirmed', 'done', '2024-05-22 23:51:52', '2024-05-23 00:57:29'),
(33, 2, NULL, '[{\"namaMenu\":null,\"quantity\":0,\"subtotalMenu\":0}]', 0, NULL, 'waiting', NULL, '2024-05-23 00:19:33', '2024-05-23 00:19:33'),
(34, 9, '2024-05-23', '[{\"namaMenu\":\"KEBAB ANJIR\",\"quantity\":8,\"subtotalMenu\":120.8},{\"namaMenu\":\"NASI TUMPENG\",\"quantity\":3,\"subtotalMenu\":160.35000000000002}]', 281, 5, 'confirmed', '', '2024-05-23 02:03:48', '2024-05-23 02:04:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` int(15) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telepon`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(2, 'angel', 'angelvtobing@gmail.com', 0, NULL, '$2y$12$Y.QzKnqusdWh0t0LTjX4Re2T/uP1BPIuBrFR2bVu3Lam66DhoxIX2', NULL, '2024-05-07 19:28:28', '2024-05-07 19:28:28', 'admin'),
(3, 'rizna', 'riznainda@gmail.com', 0, NULL, '$2y$12$m02xHcfPqZNGPS2pMkbRo.CCSw9NDyv0QhmcQ3NTiEKNll2KSz4vu', NULL, '2024-05-07 20:10:04', '2024-05-07 20:10:04', 'chef'),
(5, 'Fatimah Azzahara', 'fatimah123@gmail.com', 0, NULL, '$2y$12$Hs9oR3lWYPAzr.3.b8MveuWIen4qOttAtBiJMD25VuxxDggXRNzXm', NULL, '2024-05-14 01:06:01', '2024-05-14 01:06:01', 'user'),
(8, 'Gabriel Arthur', 'idogabriel2@gmail.com', 0, '2024-05-15 10:15:48', '$2y$12$nauntK7/fsvWMLzUdEzMoODdSGeofGy9pLqdBAF.EEd40cx8nBpdu', NULL, '2024-05-15 10:14:43', '2024-05-15 10:15:48', 'admin'),
(9, 'geri', 'geri@gmail.com', NULL, NULL, '$2y$12$tiLLTBipTAKoZRTVNF2sge4Oxi.z0BNFSwsHLQLw4NbSPistPCZlK', NULL, '2024-05-19 03:59:37', '2024-05-19 03:59:37', 'user'),
(10, 'brisbane', 'brisbane@gmail.com', NULL, NULL, '$2y$12$gp4jzvuAdy3Hqz2BtmLEWeA8OzZJpkW7SA1v9/McrWsxoDwj8Qc7C', NULL, '2024-05-21 00:25:59', '2024-05-21 00:27:10', 'chef'),
(12, 'angel', 'angelvtbg@gmail.com', NULL, '2024-05-23 06:01:44', '$2y$12$CjX2Jgamq1u1zuMjyrcqOeKzM0TzeKe.xiXeEBJSodV1sXZlWjJEC', NULL, '2024-05-23 05:59:24', '2024-05-23 06:02:22', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chef_profiles`
--
ALTER TABLE `chef_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chef_profiles_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_idpelanggan_foreign` (`idPelanggan`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `menus_id_kategori_foreign_key` (`id_kategori`);

--
-- Indeks untuk tabel `menu_sets`
--
ALTER TABLE `menu_sets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_idpelanggan_foreign` (`idPelanggan`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`idPelanggan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chef_profiles`
--
ALTER TABLE `chef_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `menu_sets`
--
ALTER TABLE `menu_sets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chef_profiles`
--
ALTER TABLE `chef_profiles`
  ADD CONSTRAINT `chef_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_idpelanggan_foreign` FOREIGN KEY (`idPelanggan`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_id_kategori_foreign_key` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_idpelanggan_foreign` FOREIGN KEY (`idPelanggan`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
