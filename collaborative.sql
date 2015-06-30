-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Mei 2015 pada 11.45
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `collaborative`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `kelamin` tinyint(1) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nama`, `alamat`, `kelamin`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bayu Darmantra', 'Jalan Wr.Supratman No.202, Denpasar', 0, '', 1, '2015-03-22 09:14:46', '2015-03-22 09:14:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_grup`
--

CREATE TABLE IF NOT EXISTS `anggota_grup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grup` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `kodekelas` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `anggota_grup`
--

INSERT INTO `anggota_grup` (`id`, `id_grup`, `nim`, `kodekelas`, `created_at`, `updated_at`) VALUES
(3, 6, '110010057', 'AC111', '2015-04-24 12:26:12', '2015-04-24 12:26:12'),
(4, 7, '110010077', 'AC111', '2015-05-02 03:15:13', '2015-05-02 03:15:13'),
(5, 8, '110010077', 'AC111', '2015-05-02 03:49:10', '2015-05-02 03:49:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `kelamin` tinyint(1) NOT NULL,
  `alamat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tmplahir` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgllahir` date NOT NULL,
  `nohp` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `notlp` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statuspeg` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `nama`, `kelamin`, `alamat`, `tmplahir`, `tgllahir`, `nohp`, `notlp`, `email`, `agama`, `foto`, `statuspeg`, `status`, `created_at`, `updated_at`) VALUES
(1, '01.01.001', 'Permana Herdianti', 0, 'Denpasar', '', '0000-00-00', '', '', '', '', '', 'Tetap', 1, '2015-03-10 20:59:45', '2015-03-10 20:59:45'),
(2, '01.02.002', 'Alrendy Reynaldi Qosthory', 1, '', '', '0000-00-00', '', '', '', '', '', '', 1, '2015-03-10 21:00:39', '2015-03-10 21:00:39'),
(3, '01.03.003', 'Alditio Villaransi', 1, '', '', '0000-00-00', '', '', '', '', '', '', 1, '2015-03-10 21:01:06', '2015-03-10 21:01:06'),
(4, '01.10.100', 'Revo Primavera', 1, '', '', '0000-00-00', '', '', '', '', '', '', 1, '2015-03-10 21:01:37', '2015-03-10 21:01:37'),
(5, '01.34.245', 'Fahdnul Hadian', 1, '', '', '0000-00-00', '', '', '', '', '', '', 1, '2015-03-10 21:02:10', '2015-03-10 21:02:10'),
(6, '15.90.200', 'Sigit Erditya', 1, '', '', '0000-00-00', '', '', '', '', '', '', 1, '2015-03-10 21:02:43', '2015-03-10 21:02:43'),
(7, '20.14.105', 'Sumandi Arieska', 1, '', '', '0000-00-00', '', '', '', '', '', '', 1, '2015-03-10 21:03:26', '2015-03-10 21:03:26'),
(8, '12345678', 'Bayu Darmantra', 1, 'Jalan Wr.Supratman No.202, Denpasar', 'Denpasar', '0000-00-00', '089685640211', '0361249657', 'bayu@gmail.com', 'Hindu', '', 'Tetap', 1, '2015-05-03 04:23:20', '2015-05-03 04:23:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

CREATE TABLE IF NOT EXISTS `grup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `kodekelas` varchar(10) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`id`, `nama`, `kodekelas`, `nim`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Grup 1', 'AB111', '110010069', 0, '2015-03-25 05:18:13', '2015-03-25 05:18:13'),
(6, 'Grup Tes', 'AC111', '110010069', 0, '2015-04-24 12:26:12', '2015-04-24 12:26:12'),
(8, 'tes', 'AC111', '110010077', 0, '2015-05-02 03:49:10', '2015-05-02 03:49:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `creator` varchar(10) NOT NULL,
  `creator_sts` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `post_id`, `isi`, `creator`, `creator_sts`, `status`, `created_at`, `updated_at`) VALUES
(19, 28, 'aaaa', '12345678', 'dosen', 1, '2015-05-16 13:04:57', '2015-05-16 13:04:57'),
(22, 28, 'kmmk', '110010077', 'mahasiswa', 1, '2015-05-16 13:06:08', '2015-05-16 13:06:08'),
(24, 28, 'post id 28', '110010077', 'mahasiswa', 1, '2015-05-16 13:38:35', '2015-05-16 13:38:35'),
(25, 25, 'post id 25', '110010077', 'mahasiswa', 1, '2015-05-16 13:38:46', '2015-05-16 13:38:46'),
(26, 22, 'post id 22', '110010077', 'mahasiswa', 1, '2015-05-16 13:38:57', '2015-05-16 13:38:57'),
(27, 28, 'post 28', '12345678', 'dosen', 1, '2015-05-16 13:39:09', '2015-05-16 13:39:09'),
(28, 25, 'post 25', '12345678', 'dosen', 1, '2015-05-16 13:39:15', '2015-05-16 13:39:15'),
(29, 22, 'post 22', '12345678', 'dosen', 1, '2015-05-16 13:39:21', '2015-05-16 13:39:21'),
(30, 27, 'yhsjfgdjshdf', '110010077', 'mahasiswa', 1, '2015-05-16 15:33:09', '2015-05-16 15:33:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `kelamin` tinyint(1) NOT NULL,
  `alamat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tmplahir` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgllahir` date NOT NULL,
  `nohp` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `notlp` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prodi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `angkatan` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `stskelas` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stsinvestasi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ststransfer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stskuliah` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dosenwali` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mahasiswa_nim_unique` (`nim`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `kelamin`, `alamat`, `tmplahir`, `tgllahir`, `nohp`, `notlp`, `email`, `agama`, `foto`, `prodi`, `angkatan`, `stskelas`, `stsinvestasi`, `ststransfer`, `stskuliah`, `dosenwali`, `status`, `created_at`, `updated_at`) VALUES
(4, '110010069', 'Anak Agung Bayu Darmantra', 1, 'Jalan Wr.Supratman No.202, Denpasar', 'Denpasar', '0000-00-00', '089685640211', '0361249657', 'darmantra@gmail.com', 'Hindu', '', 'S1-Sistem Komputer', '2011', 'Regular', 'Bukan Investasi', 'Bukan Transfer', 'Pagi-siang', '01.02.002', 1, '2015-04-04 04:02:49', '2015-04-05 03:02:25'),
(5, '110010057', 'Agus Nam Arta Wiranata', 1, 'Denpasar', 'Denpasar', '0000-00-00', '081234112321', '', 'agus@gmail.com', 'Hindu', '', 'S1-Sistem Komputer', '2011', 'Regular', 'Bukan Investasi', 'Bukan Transfer', 'Pagi-siang', '15.90.200', 1, '2015-04-10 14:05:25', '2015-04-10 14:13:58'),
(6, '110010077', 'Budi Santoso', 1, 'Jalan Batur Sari no.300 Bangli', 'Tabanan', '0000-00-00', '081223123445', '', 'budi@gmail.com', 'Islam', 'php3C34.tmp.jpg', 'S1-Sistem Komputer', '2011', 'Regular', 'Bukan Investasi', 'Bukan Transfer', 'Siang-sore', '01.02.002', 1, '2015-04-24 15:25:44', '2015-04-24 15:43:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `kodemk` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `namamk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sks` int(11) NOT NULL,
  `prodi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`kodemk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kodemk`, `namamk`, `sks`, `prodi`, `status`, `created_at`, `updated_at`) VALUES
('SK0101', 'PENDIDIKAN AGAMA', 2, 'S1-Sistem Komputer', 1, '2015-03-10 20:12:51', '2015-03-10 20:12:51'),
('SK0102', 'PANCASILA', 2, 'S1-Sistem Komputer', 1, '2015-03-10 20:12:51', '2015-03-10 20:12:51'),
('SK0104', 'BAHASA INDONESIA', 2, 'S1-Sistem Komputer', 1, '2015-03-10 20:12:51', '2015-03-10 20:12:51'),
('SK0205', 'KOMUNIKASI DATA', 4, 'S1-Sistem Komputer', 1, '2015-03-10 20:12:51', '2015-03-10 20:12:51'),
('SK0208', 'ORGANISASI DAN ARSITEKTUR KOMPUTER', 4, 'S1-Sistem Komputer', 1, '2015-03-10 20:12:51', '2015-03-10 20:12:51'),
('SK0210', 'JARINGAN KOMPUTER DASAR', 4, 'S1-Sistem Komputer', 1, '2015-03-10 20:12:51', '2015-03-10 20:12:51'),
('SK0218', 'KEWIRAUSAHAAN', 2, 'S1-Sistem Komputer', 1, '2015-03-10 20:12:51', '2015-03-10 20:12:51'),
('SK9105', 'BAHASA INGGRIS I', 2, 'S1-Sistem Komputer', 1, '2015-03-10 20:12:51', '2015-03-10 20:12:51'),
('SK9216', 'PROJECT MANAGEMENT', 4, 'S1-Sistem Komputer', 1, '2015-03-10 20:12:51', '2015-03-10 20:12:51'),
('SK9217', 'METODE PENULISAN ILMIAH', 2, 'S1-Sistem Komputer', 1, '2015-03-10 20:12:51', '2015-03-10 20:12:51'),
('SK9501', 'KOMUNIKASI BISNIS', 2, 'S1-Sistem Komputer', 1, '2015-03-10 20:12:51', '2015-03-10 20:12:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhskelas`
--

CREATE TABLE IF NOT EXISTS `mhskelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kodekelas` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kodemk` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data untuk tabel `mhskelas`
--

INSERT INTO `mhskelas` (`id`, `kodekelas`, `id_mhs`, `nim`, `kodemk`, `created_at`, `updated_at`) VALUES
(18, 'AB111', 4, '110010069', 'SK0104', '2015-03-27 06:55:24', '2015-03-27 06:55:24'),
(19, 'AB111', 5, '110010057', 'SK0104', '2015-04-10 14:05:39', '2015-04-10 14:05:39'),
(20, 'AC111', 4, '110010069', 'SK0205', '2015-04-19 04:36:21', '2015-04-19 04:36:21'),
(21, 'AC111', 5, '110010057', 'SK0205', '2015-04-19 04:36:30', '2015-04-19 04:36:30'),
(22, 'AB111', 6, '110010077', 'SK0104', '2015-04-24 15:27:51', '2015-04-24 15:27:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_01_24_110814_create_mahasiswa_table', 1),
('2015_04_27_105233_create_notifikasis_table', 2),
('2015_05_11_235720_create_tugas_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender` int(11) NOT NULL,
  `recepient` int(11) NOT NULL,
  `id_grup` int(11) NOT NULL,
  `kodekelas` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `messageData` text COLLATE utf8_unicode_ci NOT NULL,
  `isRead` tinyint(1) NOT NULL,
  `accept` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `tipe`, `sender`, `recepient`, `id_grup`, `kodekelas`, `messageData`, `isRead`, `accept`, `created_at`, `updated_at`) VALUES
(1, 'grup', 110010077, 110010069, 0, '', 'Grup member invite', 0, 0, '2015-05-16 15:57:03', '2015-05-16 15:57:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkuliahan`
--

CREATE TABLE IF NOT EXISTS `perkuliahan` (
  `kodekelas` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kodemk` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nip` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hari` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jam` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`kodekelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `perkuliahan`
--

INSERT INTO `perkuliahan` (`kodekelas`, `kodemk`, `nip`, `hari`, `jam`, `status`, `created_at`, `updated_at`) VALUES
('AB111', 'SK0104', '12345678', 'selasa', '15.00 - 17.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('AC111', 'SK0205', '01.01.001', 'senin', '08.00 - 10.00', 1, '2015-03-10 21:29:37', '2015-03-10 21:29:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inherit_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permissions_inherit_id_index` (`inherit_id`),
  KEY `permissions_name_index` (`name`),
  KEY `permissions_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_user`
--

CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isi` text NOT NULL,
  `scope` varchar(10) NOT NULL,
  `id_scope` varchar(10) NOT NULL,
  `creator` varchar(10) NOT NULL,
  `creator_sts` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `isi`, `scope`, `id_scope`, `creator`, `creator_sts`, `status`, `created_at`, `updated_at`) VALUES
(22, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus congue sapien quis enim pellentesque, ut pharetra risus luctus. Maecenas ornare, risus ac vestibulum tincidunt, tortor urna pharetra lacus, ac iaculis risus metus vel tortor. Proin vehicula purus vel ex tincidunt maximus. Phasellus lobortis quam et sapien consectetur faucibus. Proin gravida turpis eget dui iaculis blandit. Fusce viverra, arcu vel facilisis feugiat, neque sapien rhoncus urna, a suscipit felis dui molestie augue. Curabitur et enim id tellus dapibus commodo. Ut condimentum dolor magna. Morbi vel justo non tellus vestibulum sodales fermentum a ipsum.\r\nhttp://id.lipsum.com/feed/html\r\nhttp://id.lipsum.com/feed/html\r\n', 'kelas', 'AB111', '110010069', 'mahasiswa', 1, '2015-04-16 22:30:11', '2015-05-04 04:37:59'),
(23, 'test pos', 'kelas', 'AC111', '110010057', 'mahasiswa', 1, '2015-04-24 22:13:21', '2015-04-24 14:42:41'),
(25, 'Budisantoso Post', 'kelas', 'AB111', '12345678', 'dosen', 1, '2015-04-30 11:24:44', '2015-04-30 03:24:44'),
(27, 'sdsdfsdfsdf', 'grup', '8', '110010077', 'mahasiswa', 1, '2015-05-02 13:23:14', '2015-05-02 05:23:14'),
(28, 'tes post', 'kelas', 'AB111', '110010077', 'mahasiswa', 1, '2015-05-16 20:51:57', '2015-05-16 12:51:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Mahasiswa', 'mahasiswa', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Dosen', 'dosen', NULL, '2015-03-22 16:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-03-22 09:15:27', '2015-03-22 09:15:27'),
(3, 2, 3, '2015-04-04 04:02:49', '2015-04-04 04:02:49'),
(4, 2, 4, '2015-04-10 14:05:26', '2015-04-10 14:05:26'),
(5, 2, 5, '2015-04-24 15:25:44', '2015-04-24 15:25:44'),
(7, 3, 7, '2015-05-03 04:23:20', '2015-05-03 04:23:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE IF NOT EXISTS `tugas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `kelas` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pengumpulan` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `judul`, `deskripsi`, `kelas`, `pengumpulan`, `created_at`, `updated_at`) VALUES
(2, 'Tugas II', 'Buatlah sebuah karangan tentang kehidupanmu', 'AB111', '2015-05-30 04:00:00', '2015-05-13 15:22:59', '2015-05-16 05:39:37'),
(3, 'Tugas Kadaluarsa', 'dfgdfgdfgdfg', 'AB111', '2015-05-15 05:15:00', '2015-05-14 05:29:49', '2015-05-14 05:29:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` text COLLATE utf8_unicode_ci NOT NULL,
  `refresh_token` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `remember_token`, `access_token`, `refresh_token`, `created_at`, `updated_at`) VALUES
(1, 'tokeknempel', '$2y$10$ToNxi4Z6iWxbOvT0k2fuE.8G58K1PyVjfU4oFzBBKxt9F77UFkMg.', 'admin', 't9anLkBZgIHrRfKBG7d40rgJwAUmKDwmFrKrc9vdTLDVMaQmnAfTEX2Pq7SC', '', '', '2015-03-22 09:15:27', '2015-05-16 10:50:22'),
(3, '110010069', '$2y$10$4a7kHWeragKp/EyDN.H9huKwuoChMAT4AMkIhqbaJuJtmi4MfdxQq', 'mahasiswa', 'rJx99IfFSiJrHtX5E7eGwZC68IXzEvtnMNuFmn7XGwzAC3IYsf0xeTK37T9j', '{"access_token":"ya29.XAGJXQ0T7bIzit64AFrE3STBIY1dVNOHhpgj1HLzbP78vV-36yf9ndtnF-PwtZODjUV7eP5XTRszGQ","token_type":"Bearer","expires_in":3600,"id_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6ImE1MjU0YWVhZmQ5YzAyMTJhM2E2ZDI1OGJkMGU1N2M4YmRiNjYxZTMifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwic3ViIjoiMTAxMjQ1ODE0NDk0ODAxMDMyMjgzIiwiYXpwIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJkYXJtYW50cmFAZ21haWwuY29tIiwiYXRfaGFzaCI6IldLdVVpZmx0U0FfRFNBLTM4SXVqU0EiLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXVkIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiaWF0IjoxNDI5NjIyMjcxLCJleHAiOjE0Mjk2MjU4NzF9.liXCyGcGslCNHIY4_oyszCqN6SlhTMG-dIkL93Snap2iz3Vs1vtGtzJ0ApmGCjoKFRYZNMtyOYoclF0oh_SnA3PLGNAl6bWh6EoBnGbV4Y0RFERLz5n_Dieb_8xrf4pPVpria6E1FNIwuIKkfakSs3k0xk14frKFf3UdQoSDLPc","refresh_token":"1\\/MsglP-PrmEqmv6HllSUC55W3qXPFP1kcu5jQVX8EMS0MEudVrK5jSpoR30zcRFq6","created":1429622271}', '{"id_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6IjRjZWVlZjBiZmM3NDYxNDljY2YyOWQyYzk1NTA2ZDEyYTg5MDZkZTcifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwic3ViIjoiMTAxMjQ1ODE0NDk0ODAxMDMyMjgzIiwiYXpwIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJkYXJtYW50cmFAZ21haWwuY29tIiwiYXRfaGFzaCI6Ijg5T3ozMTdlRVpCcWVISGtzbjkzenciLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXVkIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiaWF0IjoxNDI5ODQ5MDgwLCJleHAiOjE0Mjk4NTI2ODB9.rYpni3sI-uqDwi5otBpsBwwNVjLJzZBL-Yfmask3q-oIYnI4-1A-CDHmTDO1UWtnMnrmf3Uhczhwois4ZjZC37W1rRf4Xpjq4ApXZi7-oq1eltGt4v4t_rUgI3KEKapBklB80hFTXcPAtLEQIOGpI7NSgUP2aVcqkRDHr2MRlM8","access_token":"ya29.XwH7bUvpJnJ-q8fk8jDjWymKbu_igoBgOwbhvS6Pq2GktS0Wayw4OUS-I_Z64W5h46aFW9hVDdcHHw","expires_in":3600,"created":1429849080}', '2015-04-04 04:02:49', '2015-04-24 04:18:00'),
(4, '110010057', '$2y$10$vwm0xD0cV014K.kvt86HDuPiKxXXAay54LKCtff7Ocso8dH0HtyKS', 'mahasiswa', 'Lcu9LgVBdnUj3h7rUfp8WKOWuFVUsbuu63irM5DrFtxGIsb0uYKi9Sz5JDNf', '{"access_token":"ya29.XwEBTxS-uNSd2EX4lmoAkonQNlPoluZcB1-GuevgNGBHX_3q3ktwHD7FOXfUKUrCTLC4PpU8gpDqFQ","token_type":"Bearer","expires_in":3600,"id_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6IjRjZWVlZjBiZmM3NDYxNDljY2YyOWQyYzk1NTA2ZDEyYTg5MDZkZTcifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwic3ViIjoiMTE3NzY5NTU4MzQ4MDYzOTA1NzIxIiwiYXpwIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJ0b2tla25lbXBlbEBnbWFpbC5jb20iLCJhdF9oYXNoIjoiakZQQnI3OU1lYlRRNXg1a2FsZzlkZyIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdWQiOiI2MjA5ODAwODYxNTMtamcxNzY4MjFjcjF2bWpkMWtsNTVyNDhraGNhNjM4NWQuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJpYXQiOjE0Mjk4NTEwNjIsImV4cCI6MTQyOTg1NDY2Mn0.RuIp0HJ2s09MPKM0gtB-5ZIKlr6ixa6NRTBz-D77WcJshoR3KYne6MWH4iYWGAKVLwfku_2rx4yaVNyOuOkrwOGv5cSBQ4xLcuCL8BagqjryHUJ0js-u7n5ezSF-uLNDG9kl-PJ46ZXus-hukx5aHRcgSLiyLelPwgcDbgdlllc","refresh_token":"1\\/ogsisYdKkIl_JfnX2tJOTe9eJ6wFATv_hnUaWG6kjFk","created":1429851062}', '{"id_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6IjRjZWVlZjBiZmM3NDYxNDljY2YyOWQyYzk1NTA2ZDEyYTg5MDZkZTcifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwic3ViIjoiMTE3NzY5NTU4MzQ4MDYzOTA1NzIxIiwiYXpwIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJ0b2tla25lbXBlbEBnbWFpbC5jb20iLCJhdF9oYXNoIjoiQkluYk9ybUpZeWZNUDFPWDhJX1lZdyIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdWQiOiI2MjA5ODAwODYxNTMtamcxNzY4MjFjcjF2bWpkMWtsNTVyNDhraGNhNjM4NWQuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJpYXQiOjE0Mjk4NTEyNzksImV4cCI6MTQyOTg1NDg3OX0.P-l4GnYJEvrH7VPQPEH6amFwdsWAflw_ULrowRbkz1VDeA7MR9ce2KiSfcQRDrPCbPGFgSInjNGxUWIQWACy5khqWYvotGz24jOWVaqjuMUTFpD8HbxlxsB_AJAdlph4Zu1bug4HpOMIZcaAcCtPl15nw90e01qbLBfpWpz-qi0","access_token":"ya29.XwF0IlrkiJXENPhlvuG_qGPEmvO76cmDaBg1xsVtsbhCteKQtfr-YcT7WrUW619DF-6p1oyXVWBTuA","expires_in":3600,"created":1429851279}', '2015-04-10 14:05:25', '2015-04-28 13:23:45'),
(5, '110010077', '$2y$10$MjKxB..pj4QkPnR.s2jtN.URuiIH8SuTrqA5LjKqTNs53TuaSba/e', 'mahasiswa', 'VsZUzVnSi356avOdSztOCDXOPWHyUNz5sKGB9lUPihd4c90cFIdacCiGZmYB', '{"access_token":"ya29.dwG0Bn2mCgCCaK50To_Ur6lhZQhF2KHU-L8gDKn7kKJvS5yrtcGScV4QGY8QU3mxRStDMFN1jSqT_Q","token_type":"Bearer","expires_in":3600,"id_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6IjYyNTViMDE5MzRhYmJhMzZhZGMzZTQ4MmJmMWRjMmIxZDVkNDliNDIifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwic3ViIjoiMTE3NzY5NTU4MzQ4MDYzOTA1NzIxIiwiYXpwIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJ0b2tla25lbXBlbEBnbWFpbC5jb20iLCJhdF9oYXNoIjoiTjhKZzc0YWNScXRTbGNtRmpNc2s5QSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdWQiOiI2MjA5ODAwODYxNTMtamcxNzY4MjFjcjF2bWpkMWtsNTVyNDhraGNhNjM4NWQuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJpYXQiOjE0MzE5Mzg4ODYsImV4cCI6MTQzMTk0MjQ4Nn0.kv71hHAGmFfP9npfsEIZ9UjPDasBGqvPYHZGosBgLge1-eZw60hvNlp0jt-vcrwBpaqsUFKjB_f-tTcmJ99c0IeRSQxoD2mEgWa1D80x_jPaPiGvmlrV3w7OHGJp4TIkrLUgAufLyszVnhFBvsh0myPrwpoxAOvY8E_xnZuC7KA","refresh_token":"1\\/Ny9keJvdCOxWpqZoEHEGmqb6Pfwkqhcbk3Y4QJPd-zoMEudVrK5jSpoR30zcRFq6","created":1431938885}', '{"id_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6IjYyNTViMDE5MzRhYmJhMzZhZGMzZTQ4MmJmMWRjMmIxZDVkNDliNDIifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwic3ViIjoiMTE3NzY5NTU4MzQ4MDYzOTA1NzIxIiwiYXpwIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJ0b2tla25lbXBlbEBnbWFpbC5jb20iLCJhdF9oYXNoIjoibGw0ajIyWHNBMWt1UHV6WVFCdjhHZyIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdWQiOiI2MjA5ODAwODYxNTMtamcxNzY4MjFjcjF2bWpkMWtsNTVyNDhraGNhNjM4NWQuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJpYXQiOjE0MzE5NDIyMTYsImV4cCI6MTQzMTk0NTgxNn0.Wx7XkO-vi4JaPXKBnkdSAs_egOFScJJYys1nDtGXnbcug4M7f_j4V9zxshvKbiKoDq-fEVQByxwmsp82XmfbYcapnnQJdQxseYgUeCqKkYjEFEecs8VGBZYXCVqjox4O3L7nG0t2yPXdMMewkpqul5KYgZk3n8QZF2qkgVuh03c","access_token":"ya29.dwHFQRgF2mm4x4de5t3MDQijda-ZEdyX7O2_4IbkJJLK29FijzcBeyci6NqPG3eDVzMhkQM8Fuwehg","expires_in":3600,"created":1431942215}', '2015-04-24 15:25:44', '2015-05-18 09:43:35'),
(7, '12345678', '$2y$10$zD9vVQew1BxagGXmqHi/Iuj2DtfL2OGq9frrpt9D4Jqrvhifg/PAq', 'dosen', 'IbpnJS5OyG28O4zGLfIMc5sP00QtauYdUOptlbBL6hchEvgCftqjq0HQhgLT', '{"access_token":"ya29.bQHN0JJ8MHpv2mDjB6I3rlyI2G_0dB-Iw-DVJSdhxqn5xAgLncXe2PCZcVQX9I5Cej3c3zOLsrzhTA","token_type":"Bearer","expires_in":3600,"id_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6IjgwNmFlMDIxZjNmZDA5M2EzYWIzODE1NjQwMzUzMjhiMDQ0MjNlNmYifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwic3ViIjoiMTAxMjQ1ODE0NDk0ODAxMDMyMjgzIiwiYXpwIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJkYXJtYW50cmFAZ21haWwuY29tIiwiYXRfaGFzaCI6IlVfMjlQa0NwSGN3bUthZE1uZldiMHciLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXVkIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiaWF0IjoxNDMxMDYwOTEyLCJleHAiOjE0MzEwNjQ1MTJ9.fdlu4hZYg8t3zU2If7yf0ABsX9NshxiI3TpvAtSR37Ipzat-17Pi_i5xRUhlxcDGoILAoSLY86AhY3rgNcWhehXznJg1v5zagfDSATADKAAcsvdMAo5gN8dlUQj_nvXvEK6qB9errOxR-_gNzUUPyCC7pHPpmh4INpJRvqhb_OI","refresh_token":"1\\/p7wRaPDXJ8JeUs0Pyqzv6HvoghvGDt6N_za9FVXy_pAMEudVrK5jSpoR30zcRFq6","created":1431060915}', '{"id_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6ImNjZmQ4YWQ0NzlmMDhmNzFlYWZlZTQ3MTcxMWJlYTUzNzQzODY2NmIifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwic3ViIjoiMTAxMjQ1ODE0NDk0ODAxMDMyMjgzIiwiYXpwIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiZW1haWwiOiJkYXJtYW50cmFAZ21haWwuY29tIiwiYXRfaGFzaCI6IlNqTW1nOEpkWmJXQ3V2dGxULXlNY0EiLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXVkIjoiNjIwOTgwMDg2MTUzLWpnMTc2ODIxY3Ixdm1qZDFrbDU1cjQ4a2hjYTYzODVkLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiaWF0IjoxNDMxODc4NDMwLCJleHAiOjE0MzE4ODIwMzB9.S4mXpQQ4Lex1_7uz2TQfQM-rPuxhJ6UukNCxJh5DWBTL4vLQpwC-GafVpQqLAQdQc0E6YfEPp8i-bJ7IrNIghrecOqS7WD6V1mgF3XAJSzRO33vr-iNG47xFQOupNMZBwNLfeeoZm-Q43ZOGB4l4MSMNHxv5fXeDINFap6LXR40","access_token":"ya29.dgEv_bF1qRL79Hb4nXXCxtsNF-AsOc5kvZIwNn2mWU0HVuxNBtm3OZASa8MnsSt7msfKxkSH_9aMkg","expires_in":3600,"created":1431878429}', '2015-05-03 04:23:20', '2015-05-17 16:00:29');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_inherit_id_foreign` FOREIGN KEY (`inherit_id`) REFERENCES `permissions` (`id`);

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
