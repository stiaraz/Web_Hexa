-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2018 pada 18.49
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webhexa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggotas`
--

CREATE TABLE `anggotas` (
  `id_ang` int(10) UNSIGNED NOT NULL,
  `id_kel` int(11) NOT NULL,
  `nama_ang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggotas`
--

INSERT INTO `anggotas` (`id_ang`, `id_kel`, `nama_ang`, `created_at`, `updated_at`) VALUES
(1, 1, 'kucing', '2018-08-17 04:05:03', '2018-08-17 04:05:03'),
(2, 1, 'anjing', '2018-08-17 04:06:03', '2018-08-17 04:06:03'),
(3, 1, 'jerapah', '2018-08-17 04:06:03', '2018-08-17 04:06:03'),
(4, 1, 'kancil', '2018-08-17 04:07:03', '2018-08-17 04:07:03'),
(5, 1, 'katak', '2018-08-17 04:07:03', '2018-08-17 04:07:03'),
(6, 2, 'beringin', '2018-08-17 05:20:05', '2018-08-17 05:20:05'),
(7, 2, 'melati', '2018-08-17 05:20:05', '2018-08-17 05:20:05'),
(8, 2, 'mawar', '2018-08-17 05:20:05', '2018-08-17 05:20:05'),
(9, 2, 'anggur', '2018-08-17 05:20:05', '2018-08-17 05:20:05'),
(10, 2, 'kelapa', '2018-08-17 05:20:05', '2018-08-17 05:20:05'),
(11, 3, 'mobil', '2018-08-17 05:22:06', '2018-08-17 05:22:06'),
(12, 3, 'motor', '2018-08-17 05:22:06', '2018-08-17 05:22:06'),
(13, 3, 'sepeda', '2018-08-17 05:22:06', '2018-08-17 05:22:06'),
(14, 3, 'kereta api', '2018-08-17 05:22:06', '2018-08-17 05:22:06'),
(15, 3, 'pesawat', '2018-08-17 05:22:06', '2018-08-17 05:22:06'),
(16, 3, 'kapal', '2018-08-17 05:22:06', '2018-08-17 05:22:06'),
(17, 4, 'rumah', '2018-08-17 05:25:03', '2018-08-17 05:25:03'),
(18, 4, 'kantor', '2018-08-17 05:25:03', '2018-08-17 05:25:03'),
(19, 4, 'ruko', '2018-08-17 05:25:03', '2018-08-17 05:25:03'),
(20, 4, 'gedung', '2018-08-17 05:25:03', '2018-08-17 05:25:03'),
(21, 4, 'sekolah', '2018-08-17 05:25:03', '2018-08-17 05:25:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_art` int(10) UNSIGNED NOT NULL,
  `id` int(11) NOT NULL,
  `kategori_art` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_art` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_art` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_art` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_art`, `id`, `kategori_art`, `judul_art`, `gambar_art`, `isi_art`, `created_at`, `updated_at`) VALUES
(1, 1, 'Other', 'Galaxy Edited', '1534782660.png', '<p style=\"text-align: justify;\">That&#39;s it Bromo Mt.</p>', '2018-08-15 05:53:08', '2018-08-20 09:31:03'),
(2, 1, 'IT', 'lomba', '1534338091.jpg', '<p>hwheh schematics</p>', '2018-08-15 06:01:32', '2018-08-15 06:01:32'),
(3, 1, 'Activity', 'Schematics', '1534339453.jpg', '<p>Lomba Schematics 2016</p>', '2018-08-15 06:24:14', '2018-08-15 06:24:14'),
(4, 1, 'Other', 'Bedugul, Bali', '1534396343.png', '<p style=\"text-align: justify;\">Bedugul&nbsp;adalah sebuah daerah atau kawasan wisata di Bali yang terletak di desa Candikuning, kecamatan Baturiti, Kabupaten Tabanan&nbsp;terletak kira-kira 54 km dari Denpasar.</p>\r\n\r\n<p style=\"text-align: justify;\">Bedugul Bali adalah sebuah daerah pegunungan yang mempunyai udara yang sejuk dengan pemandangan yang indah dari danau Beratan/Bratan yang membuat daerah ini</p>\r\n\r\n<p style=\"text-align: justify;\">menjadi tempat wisata yang menarik dan terkenal yang wajib dikunjungi di Bali dan salah satu tujuan wisata yang terbaik di Bali&nbsp;yang dikunjungi oleh ribuan wisatawan baik lokal maupun internasional.</p>', '2018-08-15 22:12:26', '2018-08-15 22:12:26'),
(5, 1, 'Other', 'Candi Borobudur', '1534396649.png', '<p><strong>Borobudur</strong>&nbsp;adalah sebuah Candi Budha&nbsp;yang terletak di Magelang, Jawa Tengah. Candi ini berlokasi di kurang lebih 100 km&nbsp;di sebelah barat daya&nbsp;Semarang, 86&nbsp;km di sebelah barat&nbsp;Surakarta, dan 40&nbsp;km di sebelah barat laut&nbsp;Yogyakarta. Candi berbentuk&nbsp;stupa&nbsp;ini didirikan oleh para penganut&nbsp;agama&nbsp;Buddha Mahayana&nbsp;sekitar abad ke-8 masehi pada masa pemerintahan&nbsp;wangsa&nbsp;Syailendra. Borobudur adalah candi atau kuil Buddha terbesar di dunia,&nbsp;sekaligus salah satu monumen Buddha terbesar di dunia.&nbsp;Borobudur kini masih digunakan sebagai tempat ziarah keagamaan; tiap tahun&nbsp;umat Buddha&nbsp;yang datang dari seluruh Indonesia dan mancanegara berkumpul di Borobudur untuk memperingati Trisuci&nbsp;Waisak. Dalam dunia pariwisata, Borobudur adalah objek wisata tunggal di Indonesia yang paling banyak dikunjungi wisatawan.</p>', '2018-08-15 22:17:30', '2018-08-15 22:17:30'),
(6, 1, 'Global', 'Majalah APP Surabaya', '1534422646.JPG', '<p>Majalah PT PLN (persero) APP Surabaya</p>', '2018-08-16 05:30:48', '2018-08-16 05:30:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompoks`
--

CREATE TABLE `kelompoks` (
  `id_kel` int(10) UNSIGNED NOT NULL,
  `nama_kel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelompoks`
--

INSERT INTO `kelompoks` (`id_kel`, `nama_kel`, `created_at`, `updated_at`) VALUES
(1, 'Hewan', '2018-08-17 03:58:00', '2018-08-17 03:58:00'),
(2, 'Tumbuhan', '2018-08-17 04:03:05', '2018-08-17 04:03:05'),
(3, 'Kendaraan', '2018-08-17 04:04:05', '2018-08-17 04:04:05'),
(4, 'Bangunan', '2018-08-17 04:04:25', '2018-08-17 04:04:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_15_055815_create_artikel_table', 1),
(4, '2018_08_15_061444_create_kelompoks_table', 1),
(5, '2018_08_15_061511_create_anggotas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$ZSZopC8y4HQG9kKJknO9POpjtGoJ0EVu9DK9VVxpjHttpO78W4/KW', '1lVEU9cOvdYAy5WFFD1LQhh1oAptqPmbIj4UhIBS2JkVQPRVBohR9L3icPxQ', '2018-08-15 00:01:34', '2018-08-15 00:01:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id_ang`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_art`);

--
-- Indeks untuk tabel `kelompoks`
--
ALTER TABLE `kelompoks`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT untuk tabel `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id_ang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_art` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelompoks`
--
ALTER TABLE `kelompoks`
  MODIFY `id_kel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
