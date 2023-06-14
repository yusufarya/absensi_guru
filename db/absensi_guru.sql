-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2023 pada 10.27
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_guru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `kode_absen` char(35) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id`, `kode_absen`, `semester`) VALUES
(1, '001', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id` int(11) NOT NULL,
  `kode` char(5) NOT NULL,
  `hari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`id`, `kode`, `hari`) VALUES
(1, '001', 'Senin'),
(2, '002', 'Selasa'),
(3, '003', 'Rabu'),
(4, '004', 'Kamis'),
(5, '005', 'Jumat'),
(6, '006', 'Sabtu'),
(7, '007', 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kd_minggu`
--

CREATE TABLE `kd_minggu` (
  `id` int(11) NOT NULL,
  `kode` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kd_minggu`
--

INSERT INTO `kd_minggu` (`id`, `kode`, `nama`) VALUES
(1, '001', 'Minggu ke satu'),
(2, '002', 'Minggu ke dua'),
(3, '003', 'Minggu ke tiga'),
(4, '004', 'Minggu ke empat'),
(5, '005', 'Minggu ke lima'),
(6, '006', 'Minggu ke enam'),
(7, '007', 'Minggu ke tujuh'),
(8, '008', 'Minggu ke delapan'),
(9, '009', 'Minggu ke sembilan'),
(10, '010', 'Minggu ke sepuluh'),
(11, '011', 'Minggu ke sebelas'),
(12, '012', 'Minggu ke duabelas'),
(13, '013', 'Minggu ke tigabelas'),
(14, '014', 'Minggu ke empatbelas'),
(15, '015', 'Minggu ke limabelas'),
(16, '016', 'Minggu ke enambelas'),
(17, '017', 'Minggu ke tujuhbelas'),
(18, '018', 'Minggu ke delapanbelas'),
(19, '019', 'Minggu ke sembilanbelas'),
(20, '020', 'Minggu ke duapuluh'),
(21, '021', 'Minggu ke duapuluhsatu'),
(22, '022', 'Minggu ke duapuluhdua'),
(23, '023', 'Minggu ke duapuluhtiga'),
(24, '024', 'Minggu ke duapuluhempat'),
(25, '024', 'Minggu ke duapuluhlima'),
(26, '026', 'Minggu ke duapuluhenam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `guru` int(11) NOT NULL,
  `kode` char(20) NOT NULL,
  `semester` char(15) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `status` char(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `mapel_id` char(20) NOT NULL,
  `hari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `guru`, `kode`, `semester`, `jam`, `tanggal`, `status`, `keterangan`, `mapel_id`, `hari`) VALUES
(9, 8, '001', '1', '00:56:00', '2023-06-01', 'Y', 'Hadir', '57', 'Kamis'),
(33, 10, '001', '1', '12:23:02', '2023-06-10', 'Y', 'Hadir', '1', 'Sabtu'),
(34, 13, '001', '1', '13:30:30', '2023-06-10', 'Y', 'Hadir', '9', 'Sabtu'),
(35, 14, '001', '1', '13:40:54', '2023-06-10', 'Y', 'Hadir', '0', 'Sabtu'),
(40, 2, '001', '1', '13:50:46', '2023-06-10', 'Y', 'Hadir', '0', 'Sabtu'),
(253, 6, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '', ''),
(254, 8, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '', ''),
(255, 9, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '', ''),
(256, 10, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '', ''),
(257, 11, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '', ''),
(258, 12, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '', ''),
(259, 13, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '', ''),
(260, 6, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '9', 'Sabtu'),
(261, 8, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '9', 'Sabtu'),
(262, 9, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '9', 'Sabtu'),
(263, 10, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '9', 'Sabtu'),
(264, 11, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '9', 'Sabtu'),
(265, 12, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '9', 'Sabtu'),
(266, 6, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '1', 'Sabtu'),
(267, 8, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '1', 'Sabtu'),
(268, 9, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '1', 'Sabtu'),
(269, 11, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '1', 'Sabtu'),
(270, 12, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '1', 'Sabtu'),
(271, 13, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '1', 'Sabtu'),
(272, 6, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '6', 'Sabtu'),
(273, 8, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '6', 'Sabtu'),
(274, 9, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '6', 'Sabtu'),
(275, 10, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '6', 'Sabtu'),
(276, 11, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '6', 'Sabtu'),
(277, 12, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '6', 'Sabtu'),
(278, 13, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '6', 'Sabtu'),
(279, 6, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '59', 'Sabtu'),
(280, 8, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '59', 'Sabtu'),
(281, 9, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '59', 'Sabtu'),
(282, 10, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '59', 'Sabtu'),
(283, 11, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '59', 'Sabtu'),
(284, 12, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '59', 'Sabtu'),
(285, 13, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '59', 'Sabtu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, '10'),
(2, '11'),
(3, '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(1, 'Administrator'),
(2, 'Staf II'),
(3, 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES
(63, 'YAD', '22:52:07', '2022-05-21', 'Mengganti kode pertemuan'),
(64, 'YAD', '22:52:11', '2022-05-21', 'Mengganti kode pertemuan'),
(65, 'YAD', '23:59:40', '2022-05-21', 'Mengganti kode pertemuan'),
(66, 'YAD', '00:04:05', '2022-05-22', 'Mengganti kode pertemuan'),
(67, 'YAD', '00:50:22', '2022-05-22', 'Mengganti kode pertemuan'),
(68, 'YAD', '19:27:49', '2022-05-22', 'Mengganti kode pertemuan'),
(69, 'YAD', '22:34:20', '2022-05-22', 'Mengganti kode pertemuan'),
(70, 'YAD', '22:34:31', '2022-05-22', 'Mengganti kode pertemuan'),
(71, 'YAD', '22:34:48', '2022-05-22', 'Mengganti kode pertemuan'),
(72, 'YAD', '22:34:59', '2022-05-22', 'Mengganti kode pertemuan'),
(73, 'YAD', '22:35:10', '2022-05-22', 'Mengganti kode pertemuan'),
(74, 'YAD', '22:35:33', '2022-05-22', 'Mengganti kode pertemuan'),
(75, 'YAD', '22:49:46', '2022-05-22', 'Mengganti kode pertemuan'),
(76, 'YAD', '21:37:11', '2022-05-23', 'Mengganti kode pertemuan'),
(77, 'YAD', '21:45:24', '2022-05-23', 'Mengganti kode pertemuan'),
(78, 'YAD', '01:17:18', '2022-05-26', 'Menambah data siswa'),
(79, 'YAD', '01:17:40', '2022-05-26', 'Mengubah data siswa '),
(80, 'YAD', '01:17:51', '2022-05-26', 'Mengubah data siswa '),
(81, 'YAD', '01:18:31', '2022-05-26', 'Menambah data siswa'),
(82, 'YAD', '01:19:20', '2022-05-26', 'Mengubah data siswa '),
(83, 'YAD', '01:20:01', '2022-05-26', 'Menambah data siswa'),
(84, 'YAD', '01:20:20', '2022-05-26', 'Mengubah data siswa '),
(85, 'YAD', '01:20:54', '2022-05-26', 'Mengubah data siswa '),
(86, 'YAD', '01:21:24', '2022-05-26', 'Menambah data siswa'),
(87, 'YAD', '01:21:49', '2022-05-26', 'Mengubah data siswa '),
(88, 'YAD', '01:23:05', '2022-05-26', 'Menambah data siswa'),
(89, 'YAD', '01:23:40', '2022-05-26', 'Menambah data siswa'),
(90, 'YAD', '01:24:04', '2022-05-26', 'Mengubah data siswa '),
(91, 'YAD', '01:24:24', '2022-05-26', 'Mengubah data siswa '),
(92, 'YAD', '01:25:02', '2022-05-26', 'Menambah data siswa'),
(93, 'YAD', '01:25:46', '2022-05-26', 'Menambah data siswa'),
(94, 'YAD', '01:26:19', '2022-05-26', 'Mengubah data siswa '),
(95, 'YAD', '01:26:39', '2022-05-26', 'Mengubah data siswa '),
(96, 'Administrator', '13:50:37', '2022-05-28', 'Melihat Jadwal Guru'),
(97, 'Administrator', '13:50:46', '2022-05-28', 'Melihat Jadwal Guru'),
(98, 'Administrator', '13:52:35', '2022-05-28', 'Melihat Jadwal Guru'),
(99, 'Administrator', '13:52:44', '2022-05-28', 'Melihat Jadwal Guru'),
(100, 'Administrator', '13:53:45', '2022-05-28', 'Melihat Jadwal Guru'),
(101, 'Administrator', '13:54:27', '2022-05-28', 'Melihat Jadwal Guru'),
(102, 'Administrator', '13:55:19', '2022-05-28', 'Melihat Jadwal Guru'),
(103, 'Administrator', '13:55:27', '2022-05-28', 'Melihat Jadwal Guru'),
(104, 'Administrator', '13:56:53', '2022-05-28', 'Melihat Jadwal Guru'),
(105, 'Administrator', '13:57:34', '2022-05-28', 'Melihat Jadwal Guru'),
(106, 'Administrator', '13:57:46', '2022-05-28', 'Melihat Jadwal Guru'),
(107, 'Administrator', '13:58:50', '2022-05-28', 'Melihat Jadwal Guru'),
(108, 'Administrator', '13:59:00', '2022-05-28', 'Melihat Jadwal Guru'),
(109, 'Administrator', '14:01:14', '2022-05-28', 'Melihat Jadwal Guru'),
(110, 'Administrator', '14:02:12', '2022-05-28', 'Melihat Jadwal Guru'),
(111, 'Administrator', '14:05:12', '2022-05-28', 'Mengubah Password'),
(112, 'Administrator', '14:05:32', '2022-05-28', 'Mengubah Password'),
(113, 'Administrator', '14:07:34', '2022-05-28', 'Mengubah Password'),
(114, 'Administrator', '14:08:44', '2022-05-28', 'Mengubah Password'),
(115, 'Administrator', '14:15:25', '2022-05-28', 'Melihat Jadwal Guru'),
(116, 'Administrator', '14:15:49', '2022-05-28', 'Melihat Data User'),
(117, 'Administrator', '14:15:51', '2022-05-28', 'Melihat Jadwal Guru'),
(118, 'Administrator', '14:17:55', '2022-05-28', 'Melihat Jadwal Guru'),
(119, 'Dr. Xyz', '14:54:17', '2022-05-28', 'Mengubah data siswa '),
(120, 'Dr. Xyz', '14:56:36', '2022-05-28', 'Menambah data siswa'),
(121, 'Dr. Xyz', '15:06:25', '2022-05-28', 'Mengubah data siswa '),
(122, 'Dr. Xyz', '15:07:11', '2022-05-28', 'Mengubah data siswa '),
(123, 'Dr. Xyz', '15:07:53', '2022-05-28', 'Mengubah data siswa '),
(124, 'YAD', '21:42:09', '2022-06-04', 'Mengganti kode pertemuan'),
(125, 'YAD', '21:43:13', '2022-06-04', 'Mengganti kode pertemuan'),
(126, 'YAD', '21:53:54', '2022-06-04', 'Mengganti kode pertemuan'),
(127, 'YAD', '21:54:12', '2022-06-04', 'Mengganti kode pertemuan'),
(128, 'Admin 1 xyz', '22:23:48', '2022-06-04', 'Melihat Data Guru '),
(129, 'Admin 1 xyz', '22:23:51', '2022-06-04', 'Melihat Jadwal Guru'),
(130, 'Admin 1 xyz', '22:25:30', '2022-06-04', 'Melihat Jadwal Guru'),
(131, 'Admin 1 xyz', '22:25:40', '2022-06-04', 'Melihat Jadwal Guru'),
(132, 'Admin 1 xyz', '22:26:05', '2022-06-04', 'Melihat Jadwal Guru'),
(133, 'Admin 1 xyz', '22:26:15', '2022-06-04', 'Melihat Jadwal Guru'),
(134, 'Admin 1 xyz', '22:26:33', '2022-06-04', 'Melihat Jadwal Guru'),
(135, 'Admin 1 xyz', '22:32:44', '2022-06-04', 'Melihat Jadwal Guru'),
(136, 'Admin 1 xyz', '22:32:54', '2022-06-04', 'Melihat Jadwal Guru'),
(137, 'Admin 1 xyz', '22:33:01', '2022-06-04', 'Melihat Jadwal Guru'),
(138, 'Admin 1 xyz', '22:41:13', '2022-06-04', 'Melihat Jadwal Guru'),
(139, 'Admin 1 xyz', '22:44:44', '2022-06-04', 'Melihat Jadwal Guru'),
(140, 'Admin 1 xyz', '22:45:20', '2022-06-04', 'Melihat Jadwal Guru'),
(141, 'Admin 1 xyz', '22:45:55', '2022-06-04', 'Melihat Jadwal Guru'),
(142, 'Admin 1 xyz', '22:46:30', '2022-06-04', 'Melihat Jadwal Guru'),
(143, 'Admin 1 xyz', '22:51:08', '2022-06-04', 'Melihat Jadwal Guru'),
(144, 'Admin 1 xyz', '22:54:55', '2022-06-04', 'Melihat Data Guru '),
(145, 'Admin 1 xyz', '22:55:03', '2022-06-04', 'Melihat Jadwal Guru'),
(146, 'Admin 1 xyz', '22:55:10', '2022-06-04', 'Melihat Jadwal Guru'),
(148, 'Admin 1 xyz', '23:06:45', '2022-06-04', 'Melihat Jadwal Guru'),
(150, 'Admin 1 xyz', '23:07:01', '2022-06-04', 'Melihat Jadwal Guru'),
(151, 'Admin 1 xyz', '23:07:49', '2022-06-04', 'Melihat Jadwal Guru'),
(153, 'Admin 1 xyz', '23:08:04', '2022-06-04', 'Melihat Jadwal Guru'),
(154, 'Admin 1 xyz', '02:31:31', '2022-06-05', 'Melihat Jadwal Guru'),
(156, 'Admin 1 xyz', '02:32:16', '2022-06-05', 'Melihat Jadwal Guru'),
(157, 'Admin 1 xyz', '02:51:52', '2022-06-05', 'Melihat Data User'),
(158, 'Admin 1 xyz', '02:52:18', '2022-06-05', 'Mengubah data user '),
(159, 'Admin 1 xyz', '02:52:19', '2022-06-05', 'Melihat Data User'),
(160, 'Admin 1 xyz', '02:52:33', '2022-06-05', 'Melihat Data Guru '),
(161, 'Admin 1 xyz', '02:53:10', '2022-06-05', 'Mengubah data user '),
(162, 'Admin 1 xyz', '02:53:10', '2022-06-05', 'Melihat Data Guru '),
(163, 'Admin 1 xyz', '02:54:03', '2022-06-05', 'Melihat Data Guru '),
(164, 'Admin 1 xyz', '02:55:08', '2022-06-05', 'Melihat Data Guru '),
(165, 'Admin 1 xyz', '02:55:15', '2022-06-05', 'Melihat Data Guru '),
(166, 'Admin 1 xyz', '02:55:36', '2022-06-05', 'Melihat Data Guru '),
(167, 'Admin 1 xyz', '02:55:46', '2022-06-05', 'Melihat Data Guru '),
(168, 'Admin 1 xyz', '02:55:56', '2022-06-05', 'Melihat Jadwal Guru'),
(169, 'YAD', '00:36:04', '2022-06-11', 'Mengganti kode pertemuan'),
(170, 'YAD', '00:43:26', '2022-06-11', 'Mengganti kode pertemuan'),
(173, 'Admin 1 xyz', '00:15:27', '2022-06-12', 'Melihat Jadwal Guru'),
(179, 'Admin 1 xyz', '00:26:09', '2022-06-12', 'Melihat Jadwal Guru'),
(198, 'Admin absensi', '15:04:37', '2023-05-27', 'Melihat Jadwal Guru'),
(199, 'Admin absensi', '15:17:01', '2023-05-27', 'Melihat Jadwal Guru'),
(200, 'Admin absensi', '15:17:32', '2023-05-27', 'Melihat Jadwal Guru'),
(201, 'Admin absensi', '15:18:18', '2023-05-27', 'Melihat Jadwal Guru'),
(202, 'Admin absensi', '15:19:06', '2023-05-27', 'Melihat Jadwal Guru'),
(203, 'Admin absensi', '15:19:13', '2023-05-27', 'Melihat Jadwal Guru'),
(204, 'Admin absensi', '15:20:52', '2023-05-27', 'Melihat Data Guru '),
(205, 'Admin absensi', '15:20:58', '2023-05-27', 'Melihat Jadwal Guru'),
(206, 'Admin absensi', '15:21:58', '2023-05-27', 'Melihat Jadwal Guru'),
(207, 'Admin absensi', '15:22:27', '2023-05-27', 'Melihat Jadwal Guru'),
(208, 'Admin absensi', '15:24:31', '2023-05-27', 'Melihat Jadwal Guru'),
(209, 'Admin absensi', '00:05:34', '2023-05-28', 'Melihat Data User'),
(210, 'Admin absensi', '00:06:06', '2023-05-28', 'Melihat Data User'),
(211, 'Admin absensi', '00:06:19', '2023-05-28', 'Melihat Data User'),
(212, 'Admin absensi', '00:06:41', '2023-05-28', 'Melihat Data User'),
(213, 'Admin absensi', '00:07:06', '2023-05-28', 'Melihat Data User'),
(214, 'Admin absensi', '00:07:54', '2023-05-28', 'Melihat Data User'),
(215, 'Admin absensi', '00:08:14', '2023-05-28', 'Melihat Data User'),
(216, 'Admin absensi', '00:19:14', '2023-05-28', 'Mengubah data user '),
(217, 'Admin absensi', '00:19:14', '2023-05-28', 'Melihat Data Guru '),
(218, 'Admin absensi', '00:19:17', '2023-05-28', 'Melihat Data User'),
(219, 'Admin absensi', '00:19:48', '2023-05-28', 'Mengubah data user '),
(220, 'Admin absensi', '00:19:48', '2023-05-28', 'Melihat Data User'),
(221, 'Admin absensi', '00:19:57', '2023-05-28', 'Melihat Data User'),
(222, 'Admin absensi', '00:19:59', '2023-05-28', 'Melihat Data Guru '),
(223, 'Admin absensi', '00:20:02', '2023-05-28', 'Melihat Data User'),
(224, 'Admin absensi', '00:20:12', '2023-05-28', 'Mengubah data user '),
(225, 'Admin absensi 1', '00:20:12', '2023-05-28', 'Melihat Data User'),
(226, 'Admin absensi 1', '00:20:30', '2023-05-28', 'Mengubah data user '),
(227, 'Admin absensi', '00:20:30', '2023-05-28', 'Melihat Data User'),
(228, 'Admin absensi', '00:20:53', '2023-05-28', 'Mengubah data user '),
(229, 'Admin absensi', '00:20:53', '2023-05-28', 'Melihat Data User'),
(230, 'Admin absensi', '00:21:29', '2023-05-28', 'Melihat Data User'),
(231, 'Admin absensi', '00:21:42', '2023-05-28', 'Melihat Data User'),
(232, 'Admin absensi', '00:22:55', '2023-05-28', 'Melihat Data Guru '),
(233, 'Admin absensi', '00:32:25', '2023-05-28', 'Melihat Jadwal Guru'),
(234, 'Admin absensi', '00:32:29', '2023-05-28', 'Melihat Data User'),
(235, 'Admin absensi', '00:32:31', '2023-05-28', 'Melihat Data Guru '),
(236, 'Admin absensi', '00:43:32', '2023-05-28', 'Mengubah data user '),
(237, 'Admin absensi', '00:43:33', '2023-05-28', 'Melihat Data Guru '),
(238, 'Admin absensi', '00:43:52', '2023-05-28', 'Mengubah data user '),
(239, 'Admin absensi', '00:43:52', '2023-05-28', 'Melihat Data Guru '),
(240, 'Admin absensi', '00:45:29', '2023-05-28', 'Menambah data guru '),
(241, 'Admin absensi', '00:45:29', '2023-05-28', 'Melihat Data Guru '),
(242, 'Admin absensi', '00:46:04', '2023-05-28', 'Melihat Data Guru '),
(243, 'Admin absensi', '14:18:55', '2023-05-28', 'Melihat Jadwal Guru'),
(244, 'Admin absensi', '14:19:42', '2023-05-28', 'Melihat Jadwal Guru'),
(245, 'Admin absensi', '14:20:39', '2023-05-28', 'Melihat Jadwal Guru'),
(246, 'Admin absensi', '14:21:39', '2023-05-28', 'Melihat Jadwal Guru'),
(247, 'Admin absensi', '14:21:45', '2023-05-28', 'Melihat Jadwal Guru'),
(248, 'Admin absensi', '14:22:31', '2023-05-28', 'Melihat Jadwal Guru'),
(249, 'Admin absensi', '14:22:52', '2023-05-28', 'Melihat Data User'),
(250, 'Admin absensi', '14:23:09', '2023-05-28', 'Melihat Data User'),
(251, 'Admin absensi', '14:23:14', '2023-05-28', 'Melihat Data Guru '),
(252, 'Admin absensi', '14:29:45', '2023-05-28', 'Mengganti kode pertemuan'),
(253, 'Admin absensi', '14:37:12', '2023-05-28', 'Melihat Jadwal Guru'),
(254, 'Admin absensi', '16:17:22', '2023-05-28', 'Melihat Jadwal Guru'),
(255, 'Admin absensi', '16:18:25', '2023-05-28', 'Melihat Jadwal Guru'),
(256, 'Admin absensi', '16:18:28', '2023-05-28', 'Melihat Jadwal Guru'),
(257, 'Admin absensi', '16:19:25', '2023-05-28', 'Melihat Jadwal Guru'),
(258, 'Admin absensi', '16:19:37', '2023-05-28', 'Melihat Jadwal Guru'),
(259, 'Admin absensi', '16:20:11', '2023-05-28', 'Melihat Jadwal Guru'),
(260, '', '16:21:06', '2023-05-28', 'Mengubah jadwal guru '),
(261, 'Admin absensi', '16:21:27', '2023-05-28', 'Melihat Jadwal Guru'),
(262, 'Admin absensi', '16:21:34', '2023-05-28', 'Melihat Jadwal Guru'),
(263, '', '16:22:20', '2023-05-28', 'Mengubah jadwal guru '),
(264, 'Admin absensi', '16:22:20', '2023-05-28', 'Melihat Jadwal Guru'),
(265, 'Admin absensi', '16:24:24', '2023-05-28', 'Melihat Jadwal Guru'),
(266, 'Admin absensi', '16:42:01', '2023-05-28', 'Melihat Jadwal Guru'),
(267, 'Admin absensi', '17:13:17', '2023-05-28', 'Melihat Jadwal Guru'),
(268, '', '17:14:07', '2023-05-28', 'Mengubah jadwal guru '),
(269, 'Admin absensi', '17:14:07', '2023-05-28', 'Melihat Jadwal Guru'),
(270, 'Admin absensi', '23:31:40', '2023-05-31', 'Melihat Jadwal Guru'),
(271, 'Admin absensi', '23:31:52', '2023-05-31', 'Melihat Data User'),
(272, 'Admin absensi', '23:31:55', '2023-05-31', 'Melihat Data Guru '),
(273, 'Admin absensi', '23:33:30', '2023-05-31', 'Melihat Jadwal Guru'),
(274, 'Admin absensi', '23:33:34', '2023-05-31', 'Melihat Data Guru '),
(275, 'Admin absensi', '23:33:42', '2023-05-31', 'Mengubah data user '),
(276, 'Admin absensi', '23:33:42', '2023-05-31', 'Melihat Data Guru '),
(277, 'Admin absensi', '00:05:07', '2023-06-01', 'Melihat Jadwal Guru'),
(278, '', '00:14:10', '2023-06-01', 'Mengubah jadwal guru '),
(279, 'Admin absensi', '00:14:10', '2023-06-01', 'Melihat Jadwal Guru'),
(280, 'Admin absensi', '00:14:45', '2023-06-01', 'Melihat Jadwal Guru'),
(281, 'Admin absensi', '00:15:13', '2023-06-01', 'Melihat Jadwal Guru'),
(282, '', '00:15:25', '2023-06-01', 'Mengubah jadwal guru '),
(283, 'Admin absensi', '00:15:25', '2023-06-01', 'Melihat Jadwal Guru'),
(284, '', '00:16:00', '2023-06-01', 'Mengubah jadwal guru '),
(285, 'Admin absensi', '00:16:00', '2023-06-01', 'Melihat Jadwal Guru'),
(286, 'Admin absensi', '00:17:14', '2023-06-01', 'Melihat Jadwal Guru'),
(287, '', '00:17:51', '2023-06-01', 'Mengubah jadwal guru '),
(288, 'Admin absensi', '00:17:51', '2023-06-01', 'Melihat Jadwal Guru'),
(289, 'Admin absensi', '00:18:12', '2023-06-01', 'Melihat Jadwal Guru'),
(290, 'Admin absensi', '00:18:18', '2023-06-01', 'Melihat Jadwal Guru'),
(291, 'Admin absensi', '00:18:20', '2023-06-01', 'Melihat Jadwal Guru'),
(292, 'Admin absensi', '00:18:25', '2023-06-01', 'Melihat Jadwal Guru'),
(293, 'Admin absensi', '00:19:46', '2023-06-01', 'Melihat Jadwal Guru'),
(294, 'Admin absensi', '00:19:50', '2023-06-01', 'Melihat Jadwal Guru'),
(295, 'Admin absensi', '00:20:06', '2023-06-01', 'Melihat Data User'),
(296, 'Admin absensi', '00:20:19', '2023-06-01', 'Melihat Jadwal Guru'),
(297, 'Admin absensi', '00:20:27', '2023-06-01', 'Melihat Data User'),
(298, 'Admin absensi', '00:20:29', '2023-06-01', 'Melihat Jadwal Guru'),
(299, '', '00:20:35', '2023-06-01', 'Mengubah jadwal guru '),
(300, 'Admin absensi', '00:20:35', '2023-06-01', 'Melihat Jadwal Guru'),
(301, 'Admin absensi', '00:20:39', '2023-06-01', 'Melihat Jadwal Guru'),
(302, '', '00:20:56', '2023-06-01', 'Mengubah jadwal guru '),
(303, 'Admin absensi', '00:20:56', '2023-06-01', 'Melihat Jadwal Guru'),
(304, 'Admin absensi', '20:47:20', '2023-06-09', 'Melihat Jadwal Guru'),
(305, 'Admin absensi', '20:47:32', '2023-06-09', 'Melihat Data User'),
(306, 'Admin absensi', '20:47:34', '2023-06-09', 'Melihat Data Guru '),
(307, 'Admin absensi', '20:47:58', '2023-06-09', 'Mengubah data user '),
(308, 'Admin absensi', '20:47:58', '2023-06-09', 'Melihat Data Guru '),
(309, 'Admin absensi', '20:50:56', '2023-06-09', 'Mengubah data user '),
(310, 'Admin absensi', '20:50:56', '2023-06-09', 'Melihat Data Guru '),
(311, 'Admin absensi', '20:51:01', '2023-06-09', 'Melihat Data User'),
(312, 'Admin absensi', '20:51:10', '2023-06-09', 'Mengubah data user '),
(313, 'Admin absensi', '20:51:10', '2023-06-09', 'Melihat Data User'),
(314, 'Admin absensi', '20:51:37', '2023-06-09', 'Melihat Data Guru '),
(315, 'Admin absensi', '20:51:53', '2023-06-09', 'Melihat Jadwal Guru'),
(316, '', '20:52:03', '2023-06-09', 'Mengubah jadwal guru '),
(317, 'Admin absensi', '20:52:03', '2023-06-09', 'Melihat Jadwal Guru'),
(318, 'Admin absensi', '20:52:12', '2023-06-09', 'Melihat Jadwal Guru'),
(319, 'Admin absensi', '20:52:15', '2023-06-09', 'Melihat Data User'),
(320, 'Admin absensi', '20:52:16', '2023-06-09', 'Melihat Data Guru '),
(321, 'Admin absensi', '20:52:43', '2023-06-09', 'Menambah data guru '),
(322, 'Admin absensi', '20:52:43', '2023-06-09', 'Melihat Data Guru '),
(323, 'Admin absensi', '20:53:35', '2023-06-09', 'Melihat Jadwal Guru'),
(324, 'Admin absensi', '20:57:23', '2023-06-09', 'Melihat Jadwal Guru'),
(325, 'Admin absensi', '20:57:25', '2023-06-09', 'Melihat Jadwal Guru'),
(326, 'Admin absensi', '20:57:37', '2023-06-09', 'Melihat Mapel Guru'),
(327, 'Admin absensi', '20:58:30', '2023-06-09', 'Melihat Mapel Guru'),
(328, 'Admin absensi', '20:58:36', '2023-06-09', 'Melihat Mapel Guru'),
(329, 'Admin absensi', '20:59:20', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(330, 'Admin absensi', '21:00:46', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(331, 'Admin absensi', '21:02:31', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(332, 'Admin absensi', '21:02:42', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(333, 'Admin absensi', '21:02:51', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(334, 'Admin absensi', '21:03:01', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(335, 'Admin absensi', '21:03:18', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(336, 'Admin absensi', '21:04:24', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(337, 'Admin absensi', '21:04:37', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(338, 'Admin absensi', '21:05:56', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(339, 'Admin absensi', '21:09:56', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(340, 'Admin absensi', '21:10:22', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(341, 'Admin absensi', '21:10:46', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(342, 'Admin absensi', '21:10:52', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(343, 'Admin absensi', '21:10:58', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(344, 'Admin absensi', '21:11:08', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(345, 'Admin absensi', '21:11:14', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(346, 'Admin absensi', '21:11:38', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(347, 'Admin absensi', '21:11:59', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(348, 'Admin absensi', '21:12:11', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(349, 'Admin absensi', '21:12:31', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(350, 'Admin absensi', '21:13:26', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(351, 'Admin absensi', '21:14:54', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(352, 'Admin absensi', '21:23:55', '2023-06-09', 'Melihat Jadwal Guru'),
(353, 'Admin absensi', '21:23:58', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(354, '', '21:29:15', '2023-06-09', 'Mengubah Mata Pelajaran Guru '),
(355, 'Admin absensi', '21:29:15', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(356, '', '21:31:46', '2023-06-09', 'Mengubah Mata Pelajaran Guru '),
(357, 'Admin absensi', '21:31:46', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(358, '', '21:31:55', '2023-06-09', 'Mengubah Mata Pelajaran Guru '),
(359, 'Admin absensi', '21:31:55', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(360, 'Admin absensi', '21:32:09', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(361, 'Admin absensi', '21:32:25', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(362, '', '21:34:46', '2023-06-09', 'Mengubah Mata Pelajaran Guru '),
(363, 'Admin absensi', '21:34:46', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(364, 'Admin absensi', '21:34:51', '2023-06-09', 'Melihat Data Guru '),
(365, 'Admin absensi', '21:35:06', '2023-06-09', 'Melihat Data Guru '),
(366, 'Admin absensi', '21:35:38', '2023-06-09', 'Menambah data guru '),
(367, 'Admin absensi', '21:35:39', '2023-06-09', 'Melihat Data Guru '),
(368, 'Admin absensi', '21:35:47', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(369, 'Admin absensi', '21:36:05', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(370, 'Admin absensi', '21:40:52', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(371, 'Admin absensi', '21:40:59', '2023-06-09', 'Melihat Data Guru '),
(372, 'Admin absensi', '21:43:27', '2023-06-09', 'Menambah data guru '),
(373, 'Admin absensi', '21:43:27', '2023-06-09', 'Melihat Data Guru '),
(374, 'Admin absensi', '21:43:31', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(375, 'Admin absensi', '21:44:22', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(376, 'Admin absensi', '21:44:46', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(377, 'Admin absensi', '21:44:54', '2023-06-09', 'Melihat Data Guru '),
(378, 'Admin absensi', '21:45:30', '2023-06-09', 'Menambah data guru '),
(379, 'Admin absensi', '21:45:30', '2023-06-09', 'Melihat Data Guru '),
(380, 'Admin absensi', '21:45:34', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(381, '', '21:45:50', '2023-06-09', 'Mengubah Mata Pelajaran Guru '),
(382, 'Admin absensi', '21:45:50', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(383, 'Admin absensi', '21:47:49', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(384, 'Admin absensi', '21:47:56', '2023-06-09', 'Melihat Jadwal Guru'),
(385, '', '21:48:25', '2023-06-09', 'Mengubah jadwal guru '),
(386, 'Admin absensi', '21:48:25', '2023-06-09', 'Melihat Jadwal Guru'),
(387, 'Admin absensi', '21:48:26', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(388, '', '21:48:37', '2023-06-09', 'Mengubah Mata Pelajaran Guru '),
(389, 'Admin absensi', '21:48:37', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(390, 'Admin absensi', '21:48:41', '2023-06-09', 'Melihat Data Guru '),
(391, 'Admin absensi', '22:01:35', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(392, 'Admin absensi', '22:03:00', '2023-06-09', 'Melihat Jadwal Guru'),
(393, 'Admin absensi', '22:03:10', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(394, 'Admin absensi', '22:03:52', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(395, 'Admin absensi', '22:06:58', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(396, 'Admin absensi', '22:08:34', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(397, 'Admin absensi', '22:09:36', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(398, 'Admin absensi', '22:10:22', '2023-06-09', 'Melihat Mata Pelanaran Guru'),
(399, 'Admin absensi', '22:11:46', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(400, 'Admin absensi', '22:11:53', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(401, 'Admin absensi', '22:12:00', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(402, 'Admin absensi', '22:12:18', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(403, 'Admin absensi', '22:12:23', '2023-06-09', 'Melihat Jadwal Guru'),
(404, 'Admin absensi', '22:12:24', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(405, 'Admin absensi', '22:12:46', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(406, 'Admin absensi', '22:13:04', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(407, 'Admin absensi', '22:14:25', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(408, 'Admin absensi', '22:14:41', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(409, 'Admin absensi', '22:14:52', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(410, '', '22:16:22', '2023-06-09', 'Mengubah Mata Pelajaran Guru '),
(411, 'Admin absensi', '22:16:22', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(412, 'Admin absensi', '22:16:39', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(413, 'Admin absensi', '22:16:59', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(414, 'Admin absensi', '22:17:23', '2023-06-09', 'Melihat Mata Pelajaran Guru'),
(415, 'Admin absensi', '22:17:25', '2023-06-09', 'Melihat Jadwal Guru'),
(416, 'Admin absensi', '22:18:11', '2023-06-09', 'Melihat Jadwal Guru'),
(417, 'Admin absensi', '22:22:47', '2023-06-09', 'Melihat Jadwal Guru'),
(418, '', '22:23:01', '2023-06-09', 'Mengubah jadwal guru '),
(419, 'Admin absensi', '22:23:01', '2023-06-09', 'Melihat Jadwal Guru'),
(420, 'Admin absensi', '23:48:21', '2023-06-09', 'Melihat Data User'),
(421, 'Admin absensi', '23:48:25', '2023-06-09', 'Melihat Data Guru '),
(422, 'Admin absensi', '23:49:04', '2023-06-09', 'Mengubah data user '),
(423, 'Admin absensi', '23:49:04', '2023-06-09', 'Melihat Data Guru '),
(424, 'Admin absensi', '23:49:12', '2023-06-09', 'Melihat Data User'),
(425, 'Admin absensi', '23:52:43', '2023-06-09', 'Melihat Data User'),
(426, 'Admin absensi', '23:52:58', '2023-06-09', 'Melihat Data User'),
(427, 'Admin absensi', '23:55:42', '2023-06-09', 'Mengubah data user '),
(428, 'Admin absensi', '23:55:42', '2023-06-09', 'Melihat Data User'),
(429, 'Admin absensi', '23:55:45', '2023-06-09', 'Melihat Data Guru '),
(430, 'Admin absensi', '23:55:52', '2023-06-09', 'Mengubah data user '),
(431, 'Admin absensi', '23:55:53', '2023-06-09', 'Melihat Data Guru '),
(432, 'Admin absensi', '23:55:58', '2023-06-09', 'Melihat Data User'),
(433, 'Admin absensi', '23:57:44', '2023-06-09', 'Mengubah data user '),
(434, 'Admin absensi', '23:57:44', '2023-06-09', 'Melihat Data User'),
(435, 'Admin absensi', '23:57:47', '2023-06-09', 'Melihat Data Guru '),
(436, 'Admin absensi', '23:59:12', '2023-06-09', 'Mengubah data user '),
(437, 'Admin absensi', '23:59:12', '2023-06-09', 'Melihat Data Guru '),
(438, 'Admin absensi', '23:59:16', '2023-06-09', 'Melihat Data User'),
(439, 'Admin absensi', '23:59:32', '2023-06-09', 'Mengubah data user '),
(440, 'Admin absensi', '23:59:32', '2023-06-09', 'Melihat Data User'),
(441, 'Admin absensi', '23:59:35', '2023-06-09', 'Melihat Data Guru '),
(442, 'Admin absensi', '23:59:40', '2023-06-09', 'Mengubah data user '),
(443, 'Admin absensi', '23:59:40', '2023-06-09', 'Melihat Data Guru '),
(444, 'Admin absensi', '00:00:27', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(445, '', '00:01:08', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(446, 'Admin absensi', '00:01:08', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(447, '', '00:01:22', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(448, 'Admin absensi', '00:01:22', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(449, '', '00:01:38', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(450, 'Admin absensi', '00:01:38', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(451, '', '00:01:43', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(452, 'Admin absensi', '00:01:43', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(453, 'Admin absensi', '00:03:31', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(454, '', '00:05:33', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(455, 'Admin absensi', '00:05:33', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(456, '', '00:05:42', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(457, 'Admin absensi', '00:05:42', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(458, '', '00:05:57', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(459, 'Admin absensi', '00:05:58', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(460, 'Admin absensi', '00:07:38', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(461, 'Admin absensi', '00:07:46', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(462, '', '00:10:07', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(463, 'Admin absensi', '00:10:07', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(464, 'Admin absensi', '00:10:54', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(465, '', '00:13:30', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(466, 'Admin absensi', '00:13:31', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(467, '', '00:13:40', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(468, 'Admin absensi', '00:13:40', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(469, '', '00:13:56', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(470, 'Admin absensi', '00:13:56', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(471, '', '00:14:47', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(472, 'Admin absensi', '00:14:47', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(473, '', '00:15:38', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(474, 'Admin absensi', '00:15:38', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(475, '', '00:15:44', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(476, 'Admin absensi', '00:15:44', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(477, 'Admin absensi', '00:15:53', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(478, 'Admin absensi', '00:16:20', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(479, '', '00:19:10', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(480, 'Admin absensi', '00:19:10', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(481, '', '00:19:20', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(482, 'Admin absensi', '00:19:20', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(483, '', '00:19:27', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(484, 'Admin absensi', '00:19:27', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(485, '', '00:19:43', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(486, 'Admin absensi', '00:19:43', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(487, '', '00:19:53', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(488, 'Admin absensi', '00:19:53', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(489, '', '00:20:01', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(490, 'Admin absensi', '00:20:01', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(491, '', '00:20:06', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(492, 'Admin absensi', '00:20:06', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(493, 'Admin absensi', '00:20:26', '2023-06-10', 'Melihat Jadwal Guru'),
(494, 'Admin absensi', '00:21:01', '2023-06-10', 'Melihat Jadwal Guru'),
(495, '', '00:21:51', '2023-06-10', 'Mengubah jadwal guru '),
(496, 'Admin absensi', '00:21:51', '2023-06-10', 'Melihat Jadwal Guru'),
(497, '', '00:22:03', '2023-06-10', 'Mengubah jadwal guru '),
(498, 'Admin absensi', '00:22:03', '2023-06-10', 'Melihat Jadwal Guru'),
(499, '', '00:22:12', '2023-06-10', 'Mengubah jadwal guru '),
(500, 'Admin absensi', '00:22:12', '2023-06-10', 'Melihat Jadwal Guru'),
(501, 'Admin absensi', '00:23:39', '2023-06-10', 'Mengganti kode pertemuan'),
(502, 'Admin absensi', '00:31:14', '2023-06-10', 'Melihat Data Guru '),
(503, 'Admin absensi', '00:31:15', '2023-06-10', 'Melihat Data User'),
(504, 'Admin absensi', '00:31:33', '2023-06-10', 'Mengubah data user '),
(505, 'Admin absensi', '00:31:33', '2023-06-10', 'Melihat Data User'),
(506, 'Admin absensi', '00:33:06', '2023-06-10', 'Mengubah data user '),
(507, 'Admin absensi', '00:33:06', '2023-06-10', 'Melihat Data User'),
(508, 'Admin absensi', '00:33:12', '2023-06-10', 'Mengubah data user '),
(509, 'Admin absensi', '00:33:12', '2023-06-10', 'Melihat Data User'),
(510, 'Admin absensi', '12:38:29', '2023-06-10', 'Melihat Data User'),
(511, 'Admin absensi', '12:38:45', '2023-06-10', 'Melihat Data Guru '),
(512, 'Admin absensi', '12:44:26', '2023-06-10', 'Melihat Data Guru '),
(513, 'Admin absensi', '12:45:30', '2023-06-10', 'Menambah data guru '),
(514, 'Admin absensi', '12:45:30', '2023-06-10', 'Melihat Data Guru '),
(515, 'Admin absensi', '12:45:43', '2023-06-10', 'Melihat Data User'),
(516, 'Admin absensi', '12:46:36', '2023-06-10', 'Melihat Data User'),
(517, 'Admin absensi', '12:49:15', '2023-06-10', 'Melihat Data User'),
(518, 'Admin absensi', '12:49:24', '2023-06-10', 'Melihat Data User'),
(519, 'Admin absensi', '12:49:27', '2023-06-10', 'Melihat Data User'),
(520, 'Admin absensi', '12:49:54', '2023-06-10', 'Melihat Data User'),
(521, 'Admin absensi', '12:50:09', '2023-06-10', 'Mengubah data user '),
(522, 'Admin absensi', '12:50:09', '2023-06-10', 'Melihat Data User'),
(523, 'Admin absensi', '12:50:12', '2023-06-10', 'Melihat Data User'),
(524, 'Admin absensi', '12:50:21', '2023-06-10', 'Melihat Data Staf'),
(525, 'Admin absensi', '12:52:56', '2023-06-10', 'Melihat Data User'),
(526, 'Admin absensi', '12:52:58', '2023-06-10', 'Melihat Data Staf'),
(527, 'Admin absensi', '12:53:32', '2023-06-10', 'Melihat Data Staf'),
(528, 'Admin absensi', '12:53:37', '2023-06-10', 'Melihat Data User'),
(529, 'Admin absensi', '12:53:39', '2023-06-10', 'Melihat Data Staf'),
(530, 'Admin absensi', '12:53:52', '2023-06-10', 'Melihat Data Staf'),
(531, 'Admin absensi', '12:54:33', '2023-06-10', 'Mengubah data user '),
(532, 'Admin absensi', '12:54:33', '2023-06-10', 'Melihat Data Staf'),
(533, 'Admin absensi', '12:55:03', '2023-06-10', 'Melihat Data Staf'),
(534, 'Admin absensi', '12:55:14', '2023-06-10', 'Melihat Data Staf'),
(535, 'Admin absensi', '12:55:19', '2023-06-10', 'Mengubah data user '),
(536, 'Admin absensi', '12:55:20', '2023-06-10', 'Melihat Data Staf'),
(537, 'Admin absensi', '12:55:25', '2023-06-10', 'Mengubah data user '),
(538, 'Admin absensi', '12:55:25', '2023-06-10', 'Melihat Data Staf'),
(539, 'Admin absensi', '12:55:53', '2023-06-10', 'Melihat Data Staf'),
(540, 'Admin absensi', '12:56:04', '2023-06-10', 'Melihat Data Staf'),
(541, 'Admin absensi', '12:59:04', '2023-06-10', 'Melihat Data Staf'),
(542, 'Admin absensi', '12:59:53', '2023-06-10', 'Melihat Data User'),
(543, 'Admin absensi', '13:01:57', '2023-06-10', 'Melihat Data User'),
(544, 'Admin absensi', '13:02:00', '2023-06-10', 'Melihat Data Staf'),
(545, 'Admin absensi', '13:02:04', '2023-06-10', 'Melihat Data Staf'),
(546, 'Admin absensi', '13:02:17', '2023-06-10', 'Menambah data user '),
(547, 'Admin absensi', '13:03:10', '2023-06-10', 'Melihat Data Staf'),
(548, 'Admin absensi', '13:04:57', '2023-06-10', 'Mengubah data user '),
(549, 'Admin absensi', '13:04:57', '2023-06-10', 'Melihat Data Staf'),
(550, 'Admin absensi', '13:05:06', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(551, 'Admin absensi', '13:05:10', '2023-06-10', 'Melihat Jadwal Guru'),
(552, '', '13:05:22', '2023-06-10', 'Mengubah jadwal guru '),
(553, 'Admin absensi', '13:05:22', '2023-06-10', 'Melihat Jadwal Guru'),
(554, '', '13:06:01', '2023-06-10', 'Mengubah jadwal guru '),
(555, 'Admin absensi', '13:06:01', '2023-06-10', 'Melihat Jadwal Guru'),
(556, '', '13:07:26', '2023-06-10', 'Mengubah jadwal guru '),
(557, 'Admin absensi', '13:07:26', '2023-06-10', 'Melihat Jadwal Guru'),
(558, '', '13:07:54', '2023-06-10', 'Mengubah jadwal guru '),
(559, 'Admin absensi', '13:07:54', '2023-06-10', 'Melihat Jadwal Guru'),
(560, 'Admin absensi', '13:08:14', '2023-06-10', 'Mengganti kode pertemuan'),
(561, 'Admin absensi', '13:16:55', '2023-06-10', 'Melihat Data User'),
(562, 'Admin absensi', '13:17:27', '2023-06-10', 'Melihat Data User'),
(563, 'Admin absensi', '13:17:32', '2023-06-10', 'Melihat Data User'),
(564, 'Admin absensi', '13:17:34', '2023-06-10', 'Melihat Data Guru '),
(565, 'Admin absensi', '13:17:40', '2023-06-10', 'Melihat Jadwal Guru'),
(566, 'Admin absensi', '13:18:53', '2023-06-10', 'Melihat Jadwal Guru'),
(567, 'Admin absensi', '13:19:05', '2023-06-10', 'Melihat Jadwal Guru'),
(568, 'Admin absensi', '13:19:11', '2023-06-10', 'Melihat Jadwal Guru'),
(569, 'Admin absensi', '13:19:29', '2023-06-10', 'Melihat Jadwal Guru'),
(570, 'Admin absensi', '13:19:39', '2023-06-10', 'Melihat Jadwal Guru'),
(571, 'Admin absensi', '13:19:49', '2023-06-10', 'Melihat Jadwal Guru'),
(572, 'Admin absensi', '13:20:08', '2023-06-10', 'Melihat Jadwal Guru'),
(573, 'Admin absensi', '13:20:43', '2023-06-10', 'Melihat Jadwal Guru'),
(574, 'Admin absensi', '13:21:07', '2023-06-10', 'Melihat Jadwal Guru'),
(575, 'Admin absensi', '13:21:34', '2023-06-10', 'Melihat Jadwal Guru'),
(576, 'Admin absensi', '13:21:48', '2023-06-10', 'Melihat Jadwal Guru'),
(577, 'Admin absensi', '13:21:55', '2023-06-10', 'Melihat Jadwal Guru'),
(578, 'Admin absensi', '13:21:59', '2023-06-10', 'Melihat Jadwal Guru'),
(579, 'Admin absensi', '13:23:04', '2023-06-10', 'Melihat Jadwal Guru'),
(580, 'Admin absensi', '13:23:45', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(581, '', '13:24:00', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(582, 'Admin absensi', '13:24:00', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(583, '', '13:24:11', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(584, 'Admin absensi', '13:24:11', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(585, '', '13:24:16', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(586, 'Admin absensi', '13:24:16', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(587, '', '13:24:23', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(588, 'Admin absensi', '13:24:23', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(589, '', '13:25:40', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(590, 'Admin absensi', '13:25:40', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(591, '', '13:25:54', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(592, 'Admin absensi', '13:25:54', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(593, 'Admin absensi', '13:26:19', '2023-06-10', 'Melihat Jadwal Guru'),
(594, 'Admin absensi', '13:27:39', '2023-06-10', 'Melihat Jadwal Guru'),
(595, '', '13:28:00', '2023-06-10', 'Mengubah jadwal guru '),
(596, 'Admin absensi', '13:28:00', '2023-06-10', 'Melihat Jadwal Guru'),
(597, 'Admin absensi', '13:33:05', '2023-06-10', 'Melihat Jadwal Guru'),
(598, 'Admin absensi', '13:33:13', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(599, '', '13:33:22', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(600, 'Admin absensi', '13:33:23', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(601, 'Admin absensi', '13:33:33', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(602, '', '13:33:45', '2023-06-10', 'Mengubah Mata Pelajaran Guru '),
(603, 'Admin absensi', '13:33:45', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(604, 'Admin absensi', '13:33:52', '2023-06-10', 'Melihat Jadwal Guru'),
(605, 'Admin absensi', '13:53:56', '2023-06-10', 'Mengganti kode pertemuan'),
(606, 'Admin absensi', '14:03:03', '2023-06-10', 'Mengganti kode pertemuan'),
(607, 'Admin absensi', '14:17:47', '2023-06-10', 'Mengganti kode pertemuan'),
(608, 'Admin absensi', '14:24:01', '2023-06-10', 'Mengganti kode pertemuan'),
(609, 'Admin absensi', '14:31:02', '2023-06-10', 'Mengganti kode pertemuan'),
(610, 'Admin absensi', '14:33:36', '2023-06-10', 'Mengganti kode pertemuan'),
(611, 'Admin absensi', '14:34:48', '2023-06-10', 'Mengganti kode pertemuan'),
(612, 'Admin absensi', '14:34:54', '2023-06-10', 'Mengganti kode pertemuan'),
(613, 'Admin absensi', '15:20:12', '2023-06-10', 'Melihat Mata Pelajaran Guru'),
(614, 'Admin absensi', '15:20:22', '2023-06-10', 'Mengganti kode pertemuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` char(11) NOT NULL,
  `pelajaran` varchar(50) NOT NULL,
  `jam_mulai` time NOT NULL,
  `batas_absen` time DEFAULT NULL,
  `jam_selesai` time NOT NULL,
  `guru` int(11) NOT NULL,
  `hari_id` int(11) NOT NULL,
  `kelas` char(20) NOT NULL,
  `jurusan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `kode_mapel`, `pelajaran`, `jam_mulai`, `batas_absen`, `jam_selesai`, `guru`, `hari_id`, `kelas`, `jurusan`) VALUES
(1, '00001', 'Bahasa Inggris', '12:20:00', '12:30:00', '12:50:00', 10, 6, '1', ''),
(2, '00002', 'Matematika', '10:06:30', NULL, '11:45:59', 0, 4, '1', ''),
(3, '00003', 'Sejarah', '11:02:00', '11:16:55', '12:11:00', 12, 2, '1', 'IPS'),
(4, '00004', 'Kewarganegaraan', '10:05:00', NULL, '11:00:00', 0, 6, '1', ''),
(5, '00006', 'Bahasa Indonesia', '08:35:00', '08:35:00', '09:31:00', 4, 2, '1', ''),
(6, '00007', 'Komputer', '12:05:00', '12:15:00', '13:14:00', 6, 6, '2', ''),
(7, '00005', 'Agama', '07:25:00', '07:35:00', '09:00:00', 0, 6, '1', ''),
(8, '00008', 'Sosiologi', '08:25:00', '08:35:00', '10:05:00', 13, 1, '1', 'IPS'),
(9, '00008', 'Sosiologi', '13:30:00', '13:40:00', '14:05:00', 13, 6, '1', 'IPS'),
(10, '00002', 'Matematika', '07:25:00', '07:35:00', '08:45:00', 0, 3, '1', ''),
(11, '00003', 'Sejarah', '10:05:00', '10:15:00', '11:25:00', 12, 4, '1', 'IPS'),
(12, '00001', 'Bahasa Inggris', '09:55:00', '11:05:00', '12:10:00', 10, 1, '2', ''),
(13, '00009', 'Geografi', '07:25:00', '07:35:00', '08:25:00', 0, 2, '1', 'IPS'),
(15, '00002', 'Matematika', '10:06:30', NULL, '11:45:59', 0, 6, '2', ''),
(16, '00003', 'Sejarah', '21:31:00', '21:50:55', '22:16:00', 12, 1, '2', 'IPS'),
(17, '00004', 'Kewarganegaraan', '10:05:00', NULL, '11:00:00', 0, 5, '2', ''),
(18, '00006', 'Bahasa Indonesia', '07:25:00', '07:35:00', '09:00:00', 4, 3, '3', ''),
(20, '00005', 'Agama', '07:25:00', '07:35:00', '09:00:00', 0, 4, '2', ''),
(21, '00008', 'Sosiologi', '08:25:00', '08:35:00', '10:05:00', 13, 1, '2', 'IPS'),
(22, '00008', 'Sosiologi', '10:25:00', '10:35:00', '12:05:00', 13, 3, '2', 'IPS'),
(23, '00002', 'Matematika', '07:25:00', '07:35:00', '08:45:00', 0, 4, '2', ''),
(24, '00003', 'Sejarah', '10:05:00', '10:15:00', '11:25:00', 12, 3, '2', 'IPS'),
(26, '00009', 'Geografi', '08:25:00', '08:35:00', '09:00:00', 0, 2, '2', 'IPS'),
(27, '00007', 'Komputer', '21:35:00', '21:48:58', '22:35:22', 6, 5, '1', ''),
(28, '00004', 'Kewarganegaraan', '10:10:00', '10:20:00', '11:05:00', 0, 2, '1', ''),
(29, '00010', 'Kimia', '11:05:00', '08:35:00', '12:05:00', 8, 1, '1', 'IPA'),
(30, '00011', 'Fisika', '10:25:00', '10:35:00', '12:05:00', 15, 6, '1', 'IPA'),
(31, '00012', 'Biologi', '10:05:00', '10:15:00', '11:25:00', 21, 3, '1', 'IPA'),
(32, '00010', 'Kimia', '09:25:00', '08:35:00', '10:05:00', 8, 3, '2', 'IPA'),
(33, '00011', 'Fisika', '10:25:00', '10:35:00', '12:05:00', 15, 2, '2', 'IPA'),
(34, '00012', 'Biologi', '10:05:00', '10:15:00', '11:25:00', 21, 2, '2', 'IPA'),
(35, '00009', 'Geografi', '08:25:00', '08:35:00', '09:00:00', 0, 4, '1', 'IPS'),
(36, '00006', 'Bahasa Indonesia', '07:25:00', '07:35:00', '09:00:00', 4, 4, '1', ''),
(37, '00006', 'Bahasa Indonesia', '07:25:00', '07:35:00', '09:00:00', 4, 5, '2', ''),
(38, '00005', 'Agama', '09:25:00', '10:35:00', '11:30:00', 0, 3, '3', ''),
(39, '00006', 'Bahasa Indonesia', '07:55:00', '08:05:00', '09:10:00', 4, 1, '3', ''),
(42, '00011', 'Fisika', '11:25:00', '11:35:00', '11:05:00', 15, 1, '3', 'IPA'),
(43, '00011', 'Fisika', '08:25:00', '08:35:00', '10:05:00', 15, 3, '3', 'IPA'),
(44, '00009', 'Geografi', '10:25:00', '10:35:00', '11:25:00', 0, 1, '3', 'IPS'),
(45, '00009', 'Geografi', '08:25:00', '08:35:00', '09:00:00', 0, 4, '3', 'IPS'),
(46, '00009', 'Geografi', '07:25:00', '07:35:00', '08:40:00', 0, 6, '2', 'IPS'),
(47, '00012', 'Biologi', '07:10:00', '07:25:00', '09:00:00', 21, 5, '1', 'IPA'),
(48, '00012', 'Biologi', '10:05:00', '10:15:00', '11:25:00', 21, 4, '3', 'IPA'),
(49, '00004', 'Kewarganegaraan', '10:05:00', '10:35:00', '11:00:00', 0, 4, '3', ''),
(50, '00004', 'Kewarganegaraan', '08:56:00', '09:10:00', '10:15:00', 0, 6, '3', ''),
(51, '00006', 'Bahasa Indonesia', '07:25:00', '07:35:00', '09:00:00', 4, 1, '2', ''),
(52, '00012', 'Biologi', '10:05:00', '10:15:00', '11:25:00', 21, 1, '2', 'IPA'),
(53, '00012', 'Biologi', '08:05:00', '08:15:00', '09:25:00', 21, 6, '3', 'IPA'),
(54, '00010', 'Kimia', '08:25:00', '08:35:00', '10:05:00', 8, 2, '3', 'IPA'),
(55, '00010', 'Kimia', '08:25:00', '08:35:00', '10:05:00', 8, 5, '1', 'IPA'),
(56, '00010', 'Kimia', '08:25:00', '08:35:00', '10:05:00', 8, 1, '2', 'IPA'),
(57, '00010', 'Kimia', '00:25:00', '08:35:00', '10:05:00', 8, 4, '3', 'IPA'),
(58, '00008', 'Sosiologi', '10:25:00', '10:35:00', '12:05:00', 13, 2, '3', 'IPS'),
(59, '00008', 'Sosiologi', '10:25:00', '10:35:00', '12:05:00', 13, 6, '3', 'IPS'),
(60, '00002', 'Matematika', '07:25:00', '07:35:00', '08:45:00', 0, 2, '3', ''),
(61, '00002', 'Matematika', '07:25:00', '07:35:00', '08:45:00', 0, 5, '3', ''),
(62, '00004', 'Kewarganegaraan', '10:05:00', '10:35:00', '11:00:00', 0, 3, '1', ''),
(63, '00013', 'Penjaskes', '07:05:00', '07:15:00', '08:25:00', 9, 3, '1', ''),
(64, '00013', 'Penjaskes', '07:05:00', '07:15:00', '08:30:00', 9, 2, '2', ''),
(65, '00013', 'Penjaskes', '07:05:00', '07:15:00', '08:30:00', 9, 4, '3', ''),
(66, '00014', 'Seni Budaya', '10:25:00', '10:35:00', '11:30:00', 0, 2, '1', ''),
(67, '00014', 'Seni Budaya', '10:25:00', '10:35:00', '11:30:00', 0, 3, '2', ''),
(68, '00014', 'Seni Budaya', '10:25:00', '10:35:00', '11:30:00', 0, 5, '3', ''),
(69, '00007', 'Komputer', '09:10:00', '09:15:00', '11:00:00', 6, 3, '3', ''),
(70, '00001', 'Bahasa Inggris II', '09:04:15', '09:14:58', '10:27:00', 11, 3, '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `kode` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `jurusan` varchar(20) NOT NULL,
  `jenis_kel` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(160) NOT NULL,
  `status` int(1) DEFAULT 0,
  `level_id` int(11) NOT NULL,
  `gambar` varchar(11) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `no_absen` char(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`kode`, `nama`, `nip`, `jurusan`, `jenis_kel`, `tempat_lahir`, `tgl_lahir`, `alamat`, `email`, `password`, `status`, `level_id`, `gambar`, `tgl_dibuat`, `no_absen`) VALUES
(1, 'Admin absensi', '0032C1121A1030', '', 'Laki-laki', 'Tangerang', '1996-05-02', '', 'admin@gmail.com', '$2y$10$8CZJudgt7aVQkmOt5faV0uk/EbbkxVXDDw.U8LXNeO2WDr8LS4vSi', 1, 1, 'default.jpg', '2023-05-27', '0'),
(2, 'Staff Abc', '032C11121A103', '', 'Laki-laki', 'Jakarta, Indonesia', '1999-05-10', '', 'staff@gmail.com', '$2y$10$I5mrJMtJYBtbAIotDq8dcehmiF8wZndHDNlQaDe2ow5wNrXD7xeHS', 1, 2, 'default.jpg', '2023-05-27', '10'),
(6, 'Yusuf Aryadilla', '032C11121A103', '', 'Laki-laki', 'Jakarta, Indonesia', '0000-00-00', '', 'aryaherby29nov2k@gmail.com', '$2y$10$Ag7jLPMEw/ul34M74sT/wuZWa0/wPq1gFpG1b1J7zVLC6Uxded6fi', 1, 3, 'default.jpg', '2023-05-27', '1'),
(8, 'Nan anani', '032C11121A020', '', 'Perempuan', 'Jakarta, Indonesia', '0000-00-00', '', 'nana@gmail.com', '$2y$10$4McQ3oi26c5iyd1sgVX6gO2yLdf1DRKL52FxrKHPjv6FEo4vi88K6', 1, 3, 'default.jpg', '2023-05-27', '3'),
(9, 'Guru Olahraga', '10011121A103', '', 'Laki-laki', '', NULL, '', 'guruolahraga@gmail.com', '$2y$10$u0UelxVfQk37bGlzRQj75ObcWa5zy0XT5aZ0arxYas6TYigrJfRmC', 1, 3, 'default.jpg', '2023-06-09', '4'),
(10, 'Ms. Gina khamila', '032000021A103', '', 'Perempuan', '', NULL, '', 'gk@gmail.com', '$2y$10$HdtOqkb8dgoBnyjpZKXkV.wKMWju9H3E5aSYVD/n9L8nXk1W2V5eu', 1, 3, 'default.jpg', '2023-06-09', '5'),
(11, 'Mr. Jhon', '0999811210103', '', 'Laki-laki', '', NULL, '', 'mrjhon@gmail.com', '$2y$10$1bWvJYIOPeikqLUBlkBgH.QjMxl4NHi1JXl036xOaqXxb4EDrj2Ti', 1, 3, 'default.jpg', '2023-06-09', '6'),
(12, 'Sunanjar', '00091121441030', '', 'Laki-laki', '', NULL, '', 'sunanjar@gmail.com', '$2y$10$MQ0m1VLMITWXJeBhD/wE7ONxkovECNhjeFCVT/vV1mGn7a..RhSKW', 1, 3, 'default.jpg', '2023-06-09', '7'),
(13, 'Burhan Kwg', '03231121000103', '', 'Laki-laki', '', NULL, '', 'kwg@gmail.com', '$2y$10$dEgBcIwAdjz.qbsc9TCyFebWklJedO3IEJxYHont4fogOEpjelLLe', 1, 3, 'default.jpg', '2023-06-10', '8'),
(14, 'Staff Tata Usaha', '-', '', 'Perempuan', 'Tangerang', '2000-06-29', '', 'staf_tu@gmail.com', '$2y$10$HFFx3xzayHdTf1UNYZqqmunWgMpe4LjmXjosbroKmR3I0QE0cORBK', 1, 2, 'default.jpg', '2023-06-10', '9');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kd_minggu`
--
ALTER TABLE `kd_minggu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kd_minggu`
--
ALTER TABLE `kd_minggu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=615;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
