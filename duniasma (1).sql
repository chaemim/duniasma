-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 11:28 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duniasma`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `featured_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `id_admin` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `title`, `slug`, `deskripsi`, `featured_img`, `accepted`, `id_kategori`, `id_admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Amanah Febrian Indriani', 'asdsa-asdasda-asdsad', '<p>Amanah Febrian Indriani NIM 4611415001 Ilmu Komputer 2015</p>', '1511860658.jpg', 1, 2, 2, '2017-11-22 01:45:05', '2017-12-01 04:09:10', NULL),
(8, 'post kedua gan', 'sadasdasdasd-asdsa-asdas', '<p>halo halo ini post baru</p>', '1511341907.jpg', 1, 1, 1, '2017-11-22 02:11:47', '2017-11-29 22:18:59', NULL),
(10, 'asdsa ds d', 'asdsa-ds-d', '<p>asdasd asdasdas asdas</p>', '1511971837.jpg', 1, 3, 1, '2017-11-29 09:10:37', '2017-11-29 09:10:37', NULL),
(12, 'Ini bulan desembaer', 'ini-bulan-desembaer', '<p>ini bulan desemberbrohh</p>', '1512098279.jpg', 1, 1, 1, '2017-11-30 20:17:59', '2017-11-30 20:17:59', NULL),
(14, 'post pertamax dari saya', 'post-pertamax-dari-saya', '<p>ini post pertama saya</p>', '1512100622.png', 1, 1, 8, '2017-11-30 20:57:02', '2017-12-06 02:14:06', NULL),
(16, 'Tips dan Trik Belajar', 'tips-dan-trik-belajar', '<p>Tips dan Tips Belajar brohh</p>', '1512121138.jpg', 1, 3, 8, '2017-12-01 02:38:58', '2017-12-05 04:13:26', NULL),
(17, 'Hai brohhhh', 'hai-brohhhh', '<p>ini artikel testing terbaruu</p>', '1512126626.jpg', 0, 1, 3, '2017-12-01 04:10:26', '2017-12-02 04:09:13', NULL),
(18, 'asdasdsa', 'asdasdsa', '<p>dasdc asdasd asdasd</p>', '1512549224.jpg', 0, 2, 1, '2017-12-06 01:33:44', '2017-12-06 01:33:44', NULL),
(19, 'nanag', 'nanag', '<p>asdsadsaf</p>', '1513615914.png', 1, 2, 3, '2017-12-18 09:51:54', '2017-12-18 09:52:22', NULL),
(20, 'Jalur Alternatif Masuk PTN', 'jalur-alternatif-masuk-ptn', '<p>Di bulan Maret sampai Mei nanti bisa dibilang sebagian besar waktu sekolah anak kelas 12 bakal diisi lebih banyak ujian dari pada pembelajaran sekolah. Kemudian Mulai bulan Maret ada ujian praktek dan USBN, bulan April ada UNBK dan mungkin aja seleksi perguruan tinggi kedinasan atau perguruan tinggi swasta (PTS), bulan Mei ada SBMPTN, SIMAK UI, UM UGM dan beberapa ujian mandiri lain.</p>\r\n<p>Nah, sebetulnya di luar jalur tes tersebut. Ada beberapa alternatif jalur masuk yang bisa kamu&nbsp;perhitungkan sebagai \"peluru tambahan\"&nbsp;untuk memperbesar kemungkinan kamu masuk universitas.&nbsp;Jalur alternatif ini gampangnya&nbsp;aku&nbsp;beri nama sebagai \"jalur prestasi\" yang proses seleksinya berfokus pada prestasi-prestasi dan pencapaian kamu baik dalam hal akademis maupun non-akademis selama masa SMA/sederajat. Ada apa aja jalur prestasi yang tersedia? Yuk kita bahas satu per satu!</p>', '1513828979.png', 1, 1, 1, '2017-12-20 21:02:59', '2017-12-20 21:10:29', NULL),
(21, 'asdsafasf', 'asdsafasf', '<p>Di bulan Maret sampai Mei nanti bisa dibilang sebagian besar waktu sekolah anak kelas 12 bakal diisi lebih banyak ujian dari pada pembelajaran sekolah. Kemudian Mulai bulan Maret ada ujian praktek dan USBN, bulan April ada UNBK dan mungkin aja seleksi ', '1513829077.png', 0, 1, 1, '2017-12-20 21:04:37', '2017-12-20 21:08:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artikelcomments`
--

CREATE TABLE `artikelcomments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_artikel` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `artikelcomments`
--

INSERT INTO `artikelcomments` (`id`, `comment`, `id_artikel`, `id_user`, `created_at`, `updated_at`) VALUES
(3, 'komentar baru\r\npertamax', 8, 1, '2017-11-24 00:27:20', '2017-11-29 22:31:27'),
(4, 'adasd', 6, 3, '2017-11-24 00:29:37', '2017-11-24 00:29:37'),
(5, 'hjfhjf', 6, 1, '2017-11-27 06:45:16', '2017-11-27 06:45:16'),
(6, 'makasih broo', 6, 3, '2017-11-27 11:17:02', '2017-11-27 11:17:02'),
(7, 'up gann', 6, 1, '2017-11-28 01:43:46', '2017-11-28 01:43:46'),
(8, 'Up gan', 8, 8, '2017-12-05 07:33:59', '2017-12-05 07:33:59'),
(9, 'fyfhfh', 19, 1, '2017-12-18 09:53:21', '2017-12-18 09:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriartikel`
--

CREATE TABLE `kategoriartikel` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategoriartikel`
--

INSERT INTO `kategoriartikel` (`id`, `kategori`) VALUES
(1, 'materi'),
(2, 'artikel'),
(3, 'tips');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(1, 'X IPA'),
(2, 'X IPS'),
(4, 'XI IPA'),
(5, 'XI IPS'),
(6, 'XII IPA'),
(7, 'XII IPS');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(10) UNSIGNED NOT NULL,
  `mapel` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `mapel`) VALUES
(1, 'Matematika'),
(2, 'Kimia'),
(3, 'Fisika'),
(4, 'Biologi'),
(5, 'Bahasa Indonesia'),
(6, 'Sejarah'),
(7, 'Sosiologi'),
(8, 'Geografi');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_10_24_115418_create_artikel__table', 1),
('2017_10_25_100734_create_video_table', 2),
('2017_10_25_102754_create_kategoriartikel_table', 3),
('2017_10_25_112952_create_videos_table', 3),
('2017_11_22_072425_create_tambahdatauser', 4),
('2017_11_22_074006_create_tambahartikel_table', 5),
('2017_11_22_074606_create_artikel_table', 6),
('2017_11_22_075300_create_artikelss_table', 7),
('2017_11_22_080242_create_mapel_table', 7),
('2017_11_23_153032_create_artikel_comment_table', 8),
('2017_11_27_175409_create_notification_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_model` int(10) UNSIGNED NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `subject`, `id_user`, `id_model`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'Ada Komentar dari Test', 2, 6, 1, '2017-11-27 11:17:02', '2017-12-01 05:04:05'),
(2, 'Ada Komentar dari Abdul Khamim', 2, 6, 1, '2017-11-28 01:43:46', '2017-12-01 05:04:05'),
(3, 'Ada Komentar dari Fairuz Zabadi', 1, 8, 1, '2017-11-30 00:11:36', '2017-11-30 00:11:53'),
(5, 'Artikel berjudul Tips dan Trik Belajar Diterima oleh Admin chaemim', 8, 16, 1, '2017-12-01 03:47:51', '2017-12-01 03:48:13'),
(6, 'Artikel berjudul Hai bRohhhh Diterima oleh Admin Abdul Khamim', 3, 17, 1, '2017-12-01 04:11:36', '2017-12-01 04:11:51'),
(7, 'Artikel berjudul Tips dan Trik Belajar Diterima oleh Admin Abdul Khamim', 8, 16, 1, '2017-12-05 04:13:26', '2017-12-05 07:36:47'),
(8, 'Ada Komentar dari Fairuz Zabadi di post kedua gan', 1, 8, 1, '2017-12-05 07:36:19', '2017-12-06 01:33:04'),
(9, 'Artikel berjudul post pertamax dari saya Diterima oleh Admin Abdul Khamim', 8, 14, 0, '2017-12-06 02:14:06', '2017-12-06 02:14:06'),
(10, 'Artikel berjudul nanag Diterima oleh Admin Abdul Khamim', 3, 19, 1, '2017-12-18 09:52:22', '2017-12-18 09:53:45'),
(11, 'Ada Komentar dari Abdul Khamim di nanag', 3, 19, 1, '2017-12-18 09:53:21', '2017-12-18 09:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tempatasal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `sekolah` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `tempatasal`, `tanggal_lahir`, `sekolah`) VALUES
(1, 'Abdul Khamim', 'chaemim13@gmail.com', 2, '$2y$10$UA1R88iahO7Dc608r32fCOkdT3K0tVOwHpnuPEuwQA8I9vSftdayq', 'ltmrDRrn8tWCxaLXzEjj8n8oDYy3ix4CAyVCkAZLj8KQE21Svh3P4iUozlDO', '2017-09-22 00:41:15', '2017-12-18 09:56:36', 'Pemalang', '1996-02-13', 'SMA N 1 Moga'),
(2, 'chaemim', 'chaemim@yahoo.com', 2, '$2y$10$zDhupjNOgrnxNPPAln7RK.GcLibOT.1cb2bXgy/oU13Gvxj2U5zPq', '0wSgudrYgnK5UeYCCPfCEwvcMlMRk0WUVokISzm8deDoHZkZgDx712QrKyNg', '2017-10-22 00:47:16', '2017-12-01 04:45:21', 'Pekalongan', '0000-00-00', 'Sma N 1 Pekalongan'),
(3, 'Andri', 'test@test.com', 1, '$2y$10$o8VRLJ/oTOICBNcFC6criuUzXfOCL3s4jh1OrhwPFRSKfIiZhhIr2', 'f0pcvOhS1Hm37TWTu19xp6a4vwGawvcQKjnKPfXSCQVDjwKGgLnRKzQSszPx', '2017-11-24 00:29:14', '2017-12-18 09:54:42', 'Kendal', '1999-12-03', 'SMA 2 Kendal'),
(8, 'Fairuz Zabadi', 'test1@test.com', 1, '$2y$10$XQim3iXGPVKjTJsxqaq7guZlZbdIjkUUc1HWwofi3iuQr95sHkAX.', 'U3FDtE6N2wuxMArcGIMlF2titCbKNTw7lFXS0w9agEDBiHj8R4OH858bztES', '2017-11-30 00:48:15', '2017-12-05 07:38:43', 'Semarang', '2001-02-16', 'SMA N 1 Semarang'),
(9, 'Rohmatul Aziz', 'aziz@gmail.com', 1, '$2y$10$X3rlIGELHB.d/CTZ/tSkxOZKzYyDo4Pavn.k74PPgwezviHPbaD9y', 'ObK45ewDCYENZGuAYTCK5D0I949yxe37SNZB8yiBv1hFvi1yuIgsR4WnA68u', '2017-12-09 18:08:31', '2017-12-20 18:08:37', 'Demak', '1999-02-23', 'SMA N 1 Demak'),
(10, 'Isna Ulfa', 'isna@gmail.com', 1, '$2y$10$DqFqU1bSIGhzNLaGstRRuuAGXKg2ypJ6.rHJ6w/eZk9HYqLzOBRkK', '4GIvd1XzBDN0N5y1J2xsGHeF1rAIR1vvx8VgA8jOPHRANeGmPjmIXBuOeoR1', '2017-11-27 18:09:35', '2017-12-20 18:09:43', 'Semarang', '1998-11-24', 'SMA N 2 Semarang'),
(11, 'Kholifatun Nisa', 'fatun@gmail.com', 1, '$2y$10$8ugWuY0lxyRU6iQtuBJmsuEjUBIfWyS0MnHdpHtTgp8fMXf6VpXcO', 'D2xRG6rdReKLphgr4Wyfa6U6mgb0Q5sKXLfYbD0JyUasy8lUTZv4icmp4DhK', '2017-11-30 18:10:34', '2017-12-20 18:10:37', 'Tegal', '1999-11-21', 'SMA N 2 Tegal'),
(12, 'Muhammad Ilham', 'ilham@gmail.com', 1, '$2y$10$76BsdUgdf1wkUlXRv9ls0.6S6kjMcoPw7dvTLYg0qjkejF/BdM0nO', 'G8EJoezZwr1pDmMtH2wmLkTXqmujRQtBNIseMAX2VnCtnqItGwryXMumLIiF', '2017-12-20 18:11:27', '2017-12-20 18:11:31', 'Semarang', '2017-10-25', 'SMA N 1 Semarang'),
(13, 'Khadikkil Fahmi', 'khadil@gmail.com', 1, '$2y$10$IqU2NCZjuE6HHU3lYye4GOGf30e1CjYIFCDVCLG92eAXTlZeADhSC', 'J9IRA7x4RErfukrDR1HjarjdsXrvuL4ab3SrYIxFGneENp3aVuUyl9dyS3BQ', '2017-11-19 18:12:14', '2017-12-20 18:16:11', 'Semarang', '1998-12-19', 'SMA N 2 Semarang'),
(14, 'Salsabila', 'salsabila@gmail.com', 1, '$2y$10$FfNBHQPaMXv1ra3h57zcBOOQFvm0KZDiM351TPBkMPFCxVs1PeYoy', 'zAIr6JGR0tUqSXKAsD0vvYv3RS3MxVLYAV1e6Tc4a6MKEqHGxyoRpiNYJZ1Z', '2017-12-11 18:13:13', '2017-12-20 18:14:06', 'Pemalang', '1997-12-29', 'SMA N 1 Pemalang');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_kelas` int(11) UNSIGNED NOT NULL,
  `id_mapel` int(11) UNSIGNED NOT NULL,
  `id_admin` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `deskripsi`, `file_video`, `id_kelas`, `id_mapel`, `id_admin`, `created_at`, `updated_at`) VALUES
(1, 'Matematika Kelas X', 'BAB Fungsi', '2DjVbbc_d1w', 1, 1, 1, '2017-12-16 17:00:00', '0000-00-00 00:00:00'),
(3, 'Biologi Kelas X', 'BAB SEL', 'XG-IZQMI6Ec', 1, 4, 1, '2017-10-27 14:17:05', '2017-12-20 18:53:49'),
(7, 'Matematika Kelas X', 'Bab Persamaan ', 'FLmDJeoQzbU', 4, 1, 1, '2017-10-31 21:00:49', '2017-12-20 18:57:56'),
(10, 'Kimia Kelas X', 'Bab Atom', 'Xr0IC5iHTcA', 1, 2, 1, '2017-11-20 18:57:42', '2017-12-20 18:57:42'),
(11, 'Biologi Kelas XII', 'Bab Genetika', '_HPH2YampvM', 6, 4, 1, '2017-10-20 18:59:14', '2017-12-20 18:59:14'),
(12, 'Sejarah Kelas XI', 'Bab Kemerdekaan', '_nr6zCbL7z0', 5, 6, 1, '2017-12-20 19:00:21', '2017-12-20 19:00:21'),
(13, 'Geografi Kelas XII', 'Bab Atmosfer', 'uS4IFiPTYHE', 2, 8, 1, '2017-11-20 19:03:21', '2017-12-20 19:03:21'),
(14, 'Kimia Kelas XI', 'Bab Atom', '_SvRmt71jZk', 4, 2, 1, '2017-12-20 19:04:04', '2017-12-20 19:04:04'),
(15, 'Fisika Kelas XII', 'Bab Gerak', 'O3yTPSuMlrI', 4, 3, 1, '2017-12-20 19:04:59', '2017-12-20 19:04:59'),
(16, 'Matematika Kelas XII', 'Bab Eksponen', 'NGNhPzvITh4', 6, 1, 1, '2017-12-20 19:05:52', '2017-12-20 19:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `video_view`
--

CREATE TABLE `video_view` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_video` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_view`
--

INSERT INTO `video_view` (`id`, `id_user`, `id_video`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '2017-12-02 11:47:07', '2017-12-02 11:47:07'),
(2, 8, 1, '2017-12-02 11:47:26', '2017-12-02 11:47:26'),
(4, 1, 7, '2017-12-05 04:13:54', '2017-12-05 04:13:54'),
(5, 8, 7, '2017-12-05 07:30:40', '2017-12-05 07:30:40'),
(6, 8, 1, '2017-12-05 07:30:49', '2017-12-05 07:30:49'),
(8, 1, 1, '2017-12-08 01:09:47', '2017-12-08 01:09:47'),
(10, 3, 7, '2017-12-12 06:49:34', '2017-12-12 06:49:34'),
(11, 3, 7, '2017-12-12 06:49:54', '2017-12-12 06:49:54'),
(12, 1, 7, '2017-12-12 06:51:01', '2017-12-12 06:51:01'),
(14, 1, 7, '2017-12-12 09:02:28', '2017-12-12 09:02:28'),
(15, 1, 7, '2017-12-20 18:51:44', '2017-12-20 18:51:44'),
(16, 1, 7, '2017-12-20 18:56:03', '2017-12-20 18:56:03'),
(17, 1, 7, '2017-12-20 18:56:09', '2017-12-20 18:56:09'),
(18, 1, 7, '2017-12-20 18:56:26', '2017-12-20 18:56:26'),
(19, 1, 7, '2017-12-20 18:56:46', '2017-12-20 18:56:46'),
(20, 1, 16, '2017-12-20 19:07:03', '2017-12-20 19:07:03'),
(21, 1, 14, '2017-12-20 19:07:07', '2017-12-20 19:07:07'),
(22, 1, 14, '2017-12-20 19:07:10', '2017-12-20 19:07:10'),
(23, 1, 15, '2017-12-20 19:07:12', '2017-12-20 19:07:12'),
(24, 1, 15, '2017-12-20 19:07:14', '2017-12-20 19:07:14'),
(25, 1, 15, '2017-12-20 19:07:16', '2017-12-20 19:07:16'),
(26, 1, 12, '2017-12-20 19:07:18', '2017-12-20 19:07:18'),
(27, 1, 15, '2017-12-20 19:13:40', '2017-12-20 19:13:40'),
(28, 1, 16, '2017-12-20 19:42:54', '2017-12-20 19:42:54'),
(29, 1, 16, '2017-12-20 21:12:24', '2017-12-20 21:12:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `artikelcomments`
--
ALTER TABLE `artikelcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikelcomments_id_artikel_foreign` (`id_artikel`),
  ADD KEY `artikelcomments_id_user_foreign` (`id_user`);

--
-- Indexes for table `kategoriartikel`
--
ALTER TABLE `kategoriartikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_id_user_foreign` (`id_user`),
  ADD KEY `notifications_id_model_foreign` (`id_model`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `video_view`
--
ALTER TABLE `video_view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_view_id_user_foreign` (`id_user`),
  ADD KEY `video_view_ibfk_1` (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `artikelcomments`
--
ALTER TABLE `artikelcomments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kategoriartikel`
--
ALTER TABLE `kategoriartikel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `video_view`
--
ALTER TABLE `video_view`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategoriartikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `artikelcomments`
--
ALTER TABLE `artikelcomments`
  ADD CONSTRAINT `artikelcomments_id_artikel_foreign` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artikelcomments_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_id_model_foreign` FOREIGN KEY (`id_model`) REFERENCES `artikel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_view`
--
ALTER TABLE `video_view`
  ADD CONSTRAINT `video_view_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_view_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
