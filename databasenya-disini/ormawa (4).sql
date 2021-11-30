-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2021 pada 14.20
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ormawa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses_surat`
--

CREATE TABLE `akses_surat` (
  `id_akses_surat` int(20) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_user_pengirim` varchar(20) NOT NULL,
  `id_user_penerima` varchar(20) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `keterangan` text NOT NULL,
  `total_bobot_prioritas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses_surat`
--

INSERT INTO `akses_surat` (`id_akses_surat`, `id_surat`, `id_user_pengirim`, `id_user_penerima`, `tgl_pengiriman`, `tgl_konfirmasi`, `keterangan`, `total_bobot_prioritas`) VALUES
(80, 14, 'U2', 'U3', '2021-07-29', '2021-08-11', '444', '3'),
(81, 23, 'U1', 'U2', '2021-07-30', '0000-00-00', 'halooo', '4'),
(82, 23, 'U1', 'U2', '2021-07-30', '0000-00-00', 'halooo', '4'),
(83, 23, 'U1', 'U2', '2021-07-31', '0000-00-00', 'halooo', '4'),
(84, 23, 'U1', 'U2', '2021-07-31', '0000-00-00', 'halooo', '4'),
(85, 23, 'U1', 'U2', '2021-07-31', '0000-00-00', 'halooo', '4'),
(86, 23, 'U1', 'U2', '2021-07-31', '0000-00-00', 'halooo', '4'),
(87, 23, 'U1', 'U2', '2021-07-31', '0000-00-00', 'halooo', '4'),
(88, 23, 'U1', 'U2', '2021-07-31', '0000-00-00', 'halooo', '4'),
(89, 23, 'U1', 'U2', '2021-07-31', '0000-00-00', 'halooo', '4'),
(90, 23, 'U1', 'U2', '2021-07-31', '0000-00-00', 'halooo', '4'),
(91, 26, 'U14', 'U3', '2021-07-31', '2021-08-03', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik', '4'),
(93, 27, 'U14', 'U15', '2021-07-31', '0000-00-00', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik\r\n', '4'),
(94, 28, 'U14', 'U16', '2021-07-31', '0000-00-00', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik\r\n', '4'),
(95, 29, 'U14', 'U1', '2021-07-31', '0000-00-00', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik\r\n', '4'),
(96, 30, 'U14', 'U1', '2021-07-31', '2021-08-02', 'Perancangan Undang-Undang Ormawa Fakutas Teknik\r\n', '4'),
(97, 31, 'U14', 'U3', '2021-07-31', '2021-08-03', 'Perancangan Undang-Undang Ormawa Fakutas Teknik\r\n', '4'),
(98, 31, 'U14', 'U15', '2021-07-31', '0000-00-00', 'Perancangan Undang-Undang Ormawa Fakutas Teknik\r\n', '4'),
(99, 31, 'U14', 'U16', '2021-07-31', '0000-00-00', 'Perancangan Undang-Undang Ormawa Fakutas Teknik\r\n', '4'),
(100, 32, 'U14', 'U1', '2021-07-31', '2021-08-04', 'Serah Terima Jabatan Ketua DPM Fakultas Teknik \r\n', '4'),
(101, 34, 'U1', 'U14', '2021-08-01', '0000-00-00', 'sdasdasdasdad', '4'),
(102, 34, 'U1', 'U14', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(103, 34, 'U1', 'U14', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(104, 34, 'U1', 'U14', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(105, 34, 'U1', 'U14', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(106, 34, 'U1', 'U14', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(107, 34, 'U1', 'U3', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(108, 34, 'U1', 'U14', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(109, 34, 'U1', 'U14', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(110, 34, 'U1', 'U20', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(111, 34, 'U1', 'U20', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(112, 34, 'U1', 'U14', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(113, 34, 'U1', 'U14', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(114, 34, 'U1', 'U2', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(115, 34, 'U1', 'U2', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(116, 34, 'U1', 'U2', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(117, 34, 'U1', 'U20', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(118, 34, 'U1', 'U20', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(119, 34, 'U1', 'U20', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(120, 34, 'U1', 'U2', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(121, 34, 'U1', 'U2', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(122, 34, 'U1', 'U2', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(123, 34, 'U1', 'U3', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(124, 34, 'U1', 'U14', '2021-08-02', '0000-00-00', 'sdasdasdasdad', '4'),
(125, 35, 'U3', 'U14', '2021-08-03', '0000-00-00', 'nganu', '3'),
(126, 36, 'U2', 'U1', '2021-08-03', '0000-00-00', 'Mahasiswa UNIMMA ', '5'),
(127, 37, 'U2', 'U1', '2021-08-03', '0000-00-00', 'LDK UNIV', '5'),
(128, 38, 'U2', 'U1', '2021-08-03', '2021-08-04', 'Sosialisasi Panduan Program Penghargaan Akademik \r\n', '5'),
(130, 39, 'U14', 'U1', '2021-08-03', '2021-08-04', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik II\r\n', '4'),
(131, 40, 'U4', 'U1', '2021-08-03', '0000-00-00', 'Law Fair Pemberitahuaan acara Law Fair 3 Hari\r\n', '3'),
(132, 41, 'U4', 'U1', '2021-08-03', '0000-00-00', '184/Und/Pan-Pel/BEMFH-UNIMMA/VI/2021\r\n', '4'),
(133, 42, 'U13', 'U1', '2021-08-03', '2021-08-11', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(134, 52, 'U21', 'U1', '2021-08-03', '0000-00-00', 'Pengesahan Ad Art', '3'),
(135, 53, 'U2', 'U1', '2021-08-03', '2021-08-12', 'Sarasehan BEM Unimma', '5'),
(136, 54, 'U3', 'U1', '2021-08-03', '2021-08-04', 'Peminjaman Printer untuk monitoring arsip \r\n', '3'),
(137, 49, 'U1', 'U14', '2021-08-03', '2021-08-10', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', '4'),
(138, 49, 'U1', 'U14', '2021-08-03', '0000-00-00', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', '4'),
(140, 49, 'U1', 'U14', '2021-08-03', '0000-00-00', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', '4'),
(141, 49, 'U1', 'U3', '2021-08-03', '0000-00-00', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', '4'),
(142, 55, 'U21', 'U3', '2021-08-04', '0000-00-00', 'coba', '4'),
(143, 56, 'U21', 'U3', '2021-08-04', '2021-08-11', 'coba cek', '4'),
(144, 39, 'U14', 'U15', '2021-08-10', '0000-00-00', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik II\r\n', '4'),
(145, 39, 'U14', 'U15', '2021-08-10', '0000-00-00', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik II\r\n', '4'),
(146, 59, 'U26', '', '2021-08-11', '0000-00-00', 'PORSAJUR (Pekan Olahraga dan Seni Antar Jurusan)', '3'),
(147, 59, 'U26', '', '2021-08-11', '0000-00-00', 'PORSAJUR (Pekan Olahraga dan Seni Antar Jurusan)', '3'),
(148, 59, 'U26', '', '2021-08-11', '0000-00-00', 'PORSAJUR (Pekan Olahraga dan Seni Antar Jurusan)', '3'),
(149, 59, 'U26', '', '2021-08-11', '0000-00-00', 'PORSAJUR (Pekan Olahraga dan Seni Antar Jurusan)', '3'),
(150, 42, 'U13', '', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(151, 42, 'U13', '', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(152, 42, 'U13', '', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(153, 42, 'U13', '', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(154, 42, 'U13', '', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(155, 42, 'U13', '', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(156, 42, 'U13', '', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(157, 42, 'U13', 'U2', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(158, 42, 'U13', '', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(159, 42, 'U13', '', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(160, 42, 'U13', '', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(161, 42, 'U13', 'U2', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(162, 42, 'U13', 'U11', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(163, 42, 'U13', 'U1', '2021-08-11', '0000-00-00', '“PIALA ORMAWA UNIMMA 2021”', '4'),
(164, 54, 'U3', 'U2', '2021-08-12', '0000-00-00', 'Peminjaman Printer untuk monitoring arsip \r\n', '3'),
(165, 54, 'U3', 'U2', '2021-08-12', '0000-00-00', 'Peminjaman Printer untuk monitoring arsip \r\n', '3'),
(166, 60, 'U3', 'U1', '2021-08-12', '0000-00-00', 'fffff', '3'),
(167, 61, 'U2', 'U1', '2021-08-12', '0000-00-00', 'kkkkk', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_surat`
--

CREATE TABLE `status_surat` (
  `id_status_surat` varchar(20) NOT NULL,
  `nama_status_surat` varchar(20) NOT NULL,
  `prioritas_surat` varchar(3) NOT NULL,
  `keterangan_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_surat`
--

INSERT INTO `status_surat` (`id_status_surat`, `nama_status_surat`, `prioritas_surat`, `keterangan_surat`) VALUES
('S1', 'Undangan', '2', 'Undangan memiliki prioritas surat terbesar'),
('S2', 'Peminjaman', '2', 'Peminjaman memiliki prioritas surat terbesar'),
('S3', 'Pemberitahuan', '1', 'Pemberitahuan memiliki prioritas surat terkecil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_user`
--

CREATE TABLE `status_user` (
  `id_status` varchar(20) NOT NULL,
  `nama_status` varchar(20) NOT NULL,
  `prioritas` varchar(3) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_user`
--

INSERT INTO `status_user` (`id_status`, `nama_status`, `prioritas`, `keterangan`) VALUES
('T1', 'Universitas', '3', 'Untuk 3 Ormawa Tertinggi di Universitas yang memiliki prioritas tertinggi'),
('T2', 'Fakultas dan UKM', '2', 'Untuk Ormawa di tingkat Fakultas dan UKM yang memiliki prioritas sama'),
('T3', 'Program Studi', '1', 'Untuk Ormawa di Tingkat Program Studi yang memiliki prioritas terendah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_status_surat` varchar(20) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `jam` time NOT NULL,
  `keterangan` text NOT NULL,
  `file_surat` varchar(100) NOT NULL,
  `id_pengirim` varchar(20) NOT NULL,
  `created_add` datetime DEFAULT NULL,
  `modified_add` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `id_status_surat`, `no_surat`, `tgl_pelaksanaan`, `jam`, `keterangan`, `file_surat`, `id_pengirim`, `created_add`, `modified_add`) VALUES
(14, 'S1', '444444444', '2021-01-01', '10:30:00', '444', 'KSM.pdf', 'U15', NULL, NULL),
(15, 'S1', 'coba', '2021-01-01', '10:30:00', 'coba', 'beritaacara3.pdf', 'U1', NULL, NULL),
(17, 'S1', 'coba1', '2021-01-02', '10:30:00', 'coba', 'buktikp7.pdf', 'U1', NULL, NULL),
(18, 'S3', 'coba3', '2021-01-01', '10:30:00', 'sasasasa', 'KSM1.pdf', 'U1', NULL, NULL),
(19, 'S1', '999999', '2021-01-05', '10:30:00', 'buktikp12.pdf', 'KSM7.pdf', 'U1', NULL, NULL),
(20, 'S1', '1', '2021-01-01', '10:30:00', 'ppp', 'ppp', 'U2', '2021-01-01 00:00:00', '2021-01-01 00:00:00'),
(21, 'S1', '999999', '2021-07-26', '10:30:00', 'popopopo', 'EDARAN.pdf', 'U1', NULL, NULL),
(23, 'S2', '999999', '2021-07-30', '10:30:00', 'halooo', 'SK_BEM_FT_,_HIMANIFO1.pdf', 'U1', '2021-07-27 09:24:23', '2021-07-27 09:26:17'),
(24, 'S1', 'dsdsd', '2021-07-29', '10:30:00', 'dsdsdsd', 'document_(7).pdf', 'U2', '2021-07-28 21:55:56', NULL),
(25, 'S1', '999999', '2021-07-30', '10:30:00', 'ddddddddddd', 'FORM_PENCAIRAN_DANA_(1).pdf', 'U1', '2021-07-30 09:44:13', NULL),
(26, 'S1', '001/XII-2/B/UNIMMA/XI/2020            ', '2021-05-19', '09:30:00', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik', 'aarsip22.pdf', 'U14', '2021-07-31 11:21:49', NULL),
(27, 'S1', '002/XII-2/B/UNIMMA/XI/2020               ', '2021-05-19', '09:30:00', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik\r\n', 'arsip2.pdf', 'U14', '2021-07-31 11:23:03', NULL),
(28, 'S1', '003/XII-2/B/UNIMMA/XI/2020               ', '2021-05-19', '09:30:00', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik\r\n', 'suratview1.pdf', 'U14', '2021-07-31 11:23:47', NULL),
(29, 'S1', '004/XII-2/B/UNIMMA/XI/2020               ', '2021-05-19', '09:30:00', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik\r\n', 'arsip21.pdf', 'U14', '2021-07-31 11:24:28', NULL),
(30, 'S1', '005/Pan-RUU/XII-2/B/UNIMMA/II/2021', '2021-02-18', '09:30:00', 'Perancangan Undang-Undang Ormawa Fakutas Teknik\r\n', 'view6.pdf', 'U14', '2021-07-31 11:27:54', NULL),
(31, 'S1', '006/Pan-RUU/XII-2/B/UNIMMA/II/2021', '2021-02-18', '10:30:00', 'Perancangan Undang-Undang Ormawa Fakutas Teknik\r\n', 'suratview11.pdf', 'U14', '2021-07-31 11:29:23', NULL),
(32, 'S1', '004/Pan-SERTIJAB/XII-2/B/UNIMMA/III/2021               ', '2021-03-23', '09:00:00', 'Serah Terima Jabatan Ketua DPM Fakultas Teknik \r\n', 'Undangan_bem_teknik.pdf', 'U14', '2021-07-31 11:31:11', NULL),
(33, 'S3', '267/LP2Ma/II.3. AU/F/2020', '2021-01-01', '10:30:00', 'Silaturahmi \r\n', 'Agenda_Musma.pdf', 'U1', '2021-07-31 12:06:11', NULL),
(36, 'S1', '171/I/B/UNIMMA/2021', '2021-05-29', '08:00:00', 'Mahasiswa UNIMMA ', '26102020-Bem_F-Imm_F-DPM_F.pdf', 'U2', '2021-08-03 10:39:57', NULL),
(37, 'S1', '122/LP2Ma/II.3.AU/F/2021', '2021-05-01', '07:30:00', 'LDK UNIV', '26102020-Bem_F-Imm_F-DPM_F1.pd', 'U2', '2021-08-03 10:41:08', NULL),
(38, 'S1', '172/LP2Ma/II.3. AU/F/2021', '2021-06-24', '13:00:00', 'Sosialisasi Panduan Program Penghargaan Akademik \r\n', '26102020-Bem_F-Imm_F-DPM_F2.pd', 'U2', '2021-08-03 10:45:35', NULL),
(39, 'S1', '004/XII-2/B/UNIMMA/XI/2020               ', '2021-06-12', '09:00:00', 'Monitoring dan Evaluasi Ormawa Fakultas Teknik II\r\n', 'undangan_bem_ft.pdf', 'U14', '2021-08-03 10:53:50', NULL),
(40, 'S3', '149/Und/Pan-Pel/BEMFH-UNIMMA/VI/2021', '2021-06-21', '13:00:00', 'Law Fair Pemberitahuaan acara Law Fair 3 Hari\r\n', 'BEM_FT_UNIMMA_(SURAT_PEMBERITA', 'U4', '2021-08-03 11:00:37', '2021-08-03 11:02:28'),
(41, 'S1', '184/Und/Pan-Pel/BEMFH-UNIMMA/VI/2021', '2021-06-26', '13:00:00', '184/Und/Pan-Pel/BEMFH-UNIMMA/VI/2021\r\n', 'undangan_bem_ft2.pdf', 'U4', '2021-08-03 11:03:18', NULL),
(42, 'S1', '18/XV-6/B/UMMgl/2021', '2021-07-17', '08:00:00', '“PIALA ORMAWA UNIMMA 2021”', 'Undangan_bem_teknik1.pdf', 'U13', '2021-08-03 11:06:56', '2021-08-11 14:00:26'),
(43, 'S1', '017/Pan-Porseni/XII-3/B/UNIMMA/VI/B/2021     ', '2021-06-25', '08:30:00', 'Pekan Olahraga Mahasiswa Fakultas Teknik 2021', 'undangan_presma_.pdf', 'U1', '2021-08-03 11:58:11', '2021-08-03 12:18:20'),
(44, 'S3', '009/Pan-Porseni/XII-3/B/UNIMMA/VI/B/2021', '2021-06-25', '08:30:00', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', 'pemberitahuan_presma.pdf', 'U1', '2021-08-03 12:19:11', NULL),
(45, 'S3', '010/Pan-Porseni/XII-3/B/UNIMMA/VI/B/2021', '2021-06-25', '08:30:00', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', 'pemberitahuan_ukm.pdf', 'U1', '2021-08-03 12:20:14', NULL),
(46, 'S3', '011/Pan-Porseni/XII-3/B/UNIMMA/VI/B/2021', '2021-06-25', '08:30:00', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', 'pemberitahuan_BEM.pdf', 'U1', '2021-08-03 12:21:10', NULL),
(47, 'S1', '012/Pan-Porseni/XII-3/B/UNIMMA/VI/B/2021', '2021-06-25', '08:30:00', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', 'undangan_HMJ.pdf', 'U1', '2021-08-03 12:21:58', NULL),
(48, 'S1', '015/Pan-Porseni/XII-3/B/UNIMMA/VI/B/2021     ', '2021-06-25', '08:30:00', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', 'undangan_imm.pdf', 'U1', '2021-08-03 12:22:44', NULL),
(49, 'S1', '018/Pan-Porseni/XII-3/B/UNIMMA/VI/B/2021           ', '2021-06-25', '08:30:00', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', 'undangan_dpm_ft.pdf', 'U1', '2021-08-03 12:24:11', NULL),
(50, 'S2', '021/Pan-Porseni/XII-3/B/UNIMMA/VI/B/2021          ', '2021-06-22', '08:30:00', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', 'peminjmanor.pdf', 'U1', '2021-08-03 12:30:25', NULL),
(51, 'S2', '023/Pan-Porseni/XII-3/B/UNIMMA/VI/B/2021', '2021-06-25', '08:30:00', 'PEKAN OLAHRAGA DAN SENI (PORSENI) 2021 FAKULTAS TEKNIK\r\n', 'peminjamanukmmusik.pdf', 'U1', '2021-08-03 12:31:18', NULL),
(52, 'S3', '20/XV-4/B/UNIMMA/2021', '2021-06-19', '09:00:00', 'Pengesahan Ad Art', '12-08-2021-07_48_39.pdf', 'U21', '2021-08-03 18:20:49', '2021-08-12 03:38:03'),
(53, 'S1', '180/I/B/UNIMMA/2021', '2021-06-19', '09:00:00', 'Sarasehan BEM Unimma', 'undanganbem.pdf', 'U2', '2021-08-03 18:25:53', NULL),
(54, 'S2', '049/XIV-11/B/VI/2021', '2021-06-20', '08:00:00', 'Peminjaman Printer untuk monitoring arsip \r\n', 'peminjamanhimanifo.pdf', 'U3', '2021-08-03 18:28:29', NULL),
(55, 'S1', '222222', '2021-01-01', '10:30:00', 'coba', '', 'U21', '2021-08-04 14:23:15', NULL),
(56, 'S2', '9999999999', '2021-08-04', '21:00:00', 'coba cek', '', 'U21', '2021-08-04 14:23:44', NULL),
(57, 'S1', '999999', '2021-08-10', '10:30:00', 'monitoring', 'Formulir_Pendaftaran_Sidang_Tu', 'U15', '2021-08-10 14:15:57', NULL),
(58, 'S1', '999999', '2021-08-11', '10:30:00', 'asasas', 'surat_edaran_dekan_tentang_per', 'U15', '2021-08-11 11:57:43', NULL),
(59, 'S3', '25/XIII-2/C/UNIMMA/2021 ', '2021-07-23', '09:30:00', 'PORSAJUR (Pekan Olahraga dan Seni Antar Jurusan)', '5_Pemberitahuan_Gubernur_BEM_T', 'U26', '2021-08-11 13:43:25', NULL),
(60, 'S1', '999999', '2021-08-12', '13:00:00', 'fffff', '', 'U3', '2021-08-12 06:24:33', NULL),
(61, 'S1', '88888', '2021-08-12', '13:00:00', 'kkkkk', '5_Pemberitahuan_Gubernur_BEM_Teknik1.pdf', 'U2', '2021-08-12 06:26:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `id_status` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_status`, `username`, `password`, `nama`, `email`, `foto`) VALUES
('U1', 'T2', 'bemftunimma', 'bemftunimma', 'BEM FT Unimma', 'bemteknikummgl@gmail.com', 'BEMPNG5.png'),
('U10', 'T3', 'ertunimma', 'ertunimma', 'Emergency Rescue Team Unimma', '', '21985324_398053983943556_3318509474846605312_n_(1)_-_alfattaah_randhika.png'),
('U11', 'T2', 'dpmfikesunimma', 'dpmfikesunimma', 'DPM Fikes Unimma', 'dpmfikesummgl@gmail.com', 'Logo_DPM_-_Aqila_Pradita.jpg'),
('U12', 'T2', 'ukmmenwaunimma', 'ukmmenwaunimma', 'UKM Menwa Unimma', 'menwaummagelang932csc@gmail.com', 'IMG_7122_-_Vivi_Nuraini.PNG'),
('U13', 'T2', 'ukmolahragaunimma', 'ukmolahragaunimma', 'UKM Olahraga Unimma', 'ukmolahragaxummgl@gmail.com', 'logo_ukm_or_png.png'),
('U14', 'T2', 'dpmftunimma', 'dpmftunimma', 'DPM Fakultas Teknik Unimma', 'prasetya038@gmail.com', 'DPM.png'),
('U15', 'T3', 'hmtiunimma', 'hmtiunimma', 'HMTI Unimma', 'prasetya038@gmail.com', 'default.jpg'),
('U16', 'T3', 'hmtounimma', 'hmtounimma', 'HMTO Unimma', 'prasetya038@gmail.com', 'default.jpg'),
('U17', 'T3', 'hmjpgmiunimma', 'hmjpgmiunimma', 'HMJ PGMI Unimma', 'hmjpgmiunimma@gmail.com', 'default.jpg'),
('U18', 'T2', 'immfaiunimma', 'immfaiunimma', 'IMM FAI Unimma', 'komaiummgl@gmail.com', 'default.jpg'),
('U19', 'T3', 'lseiunimma', 'lseiunimma', 'Lingkar Studi Ekonomi Islam', 'lseiummgl@gmail.com', 'default.jpg'),
('U2', 'T1', 'bemunimma', 'bemunimma', 'BEM Universitas UNIMMA', 'prasetya038@gmail.com', 'BEM2_copy.png'),
('U20', 'T2', 'dpmftunimma', 'dpmftunimma', 'DPM Fakultas Teknik Unimma', 'prasetya038@gmail.com', 'default.jpg'),
('U21', 'T2', 'ukmmusiksevenunimma', 'ukmmusiksevenunimma', 'UKM Musik Seven \r\nunimma', 'prasetya038@gmail.com', 'default.jpg'),
('U22', 'T3', 'himapsiunimma', 'himapsiunimma', 'Himpunan Mahasiswa Psikologi Unimma', 'himapsiunimma@gmail.com', 'default.jpg'),
('U23', 'T2', 'bemfphunimma', 'bemfphunimma', 'BEM FPH Unimma', 'prasetya038@gmail.com', 'default.jpg'),
('U24', 'T3', 'himanikaunimma', 'himanikaunimma', 'Himanika Ilmu Komunikasi Unimma', 'prasetya038@gmail.com', 'default.jpg'),
('U25', 'T1', 'dpmunimma', 'dpmunimma', 'DPM Universitas Unimma', 'prasetya038@gmail.com', 'default.jpg'),
('U26', 'T2', 'bemfkipunimma', 'bemfkipunimma', 'BEM FKIP UNIMMA', 'prasetya038@gmail.com', 'default.jpg'),
('U3', 'T3', 'himanifo', 'himanifo', 'HIMANIFO Unimma', 'prasetya038@gmail.com', 'himanifo.png'),
('U4', 'T2', 'bemfhunimma', 'bemfhunimma', 'BEM Fakultas Hukum UNIMMA', 'bemfh@unimma.ac.id', 'BEM_FH_UNIMMA_-_Teddy_Prayoga.png'),
('U5', 'T2', 'bemfebunimma', 'bemfebunimma', 'BEM FEB Unimma', 'bemfebunimma@gmail.com', 'Logo_BEM_FEB_-_Anita_Viani.png'),
('U6', 'T3', 'hmafebunimma', 'hmafebunimma', 'Himpunan Akutansi FEB Unimma', 'hmafebummgl@gmail.com', 'LOGO_HMA_UNIMMA_-_Aulia_Nuraini.png'),
('U7', 'T2', 'bemfikesunimma', 'bemfikesunimma', 'BEM Fikes Unimma', 'prasetya038@gmail.com', 'default.jpg'),
('U8', 'T3', 'hmmunimma', 'hmmunimma', 'Himpunan Mahasiswa Manajemen Unimma', 'mahasiswa.manajemenummgl@gmail', 'IMG-20190714-WA0017_-_Diana_SK.jpg'),
('U9', 'T2', 'ukmdisasterunimma', 'ukmdisasterunimma', 'UKM disaster Unimma', 'disaster@ummgl.ac.id', 'IMG-20200809-WA0015_-_Achmad_Sutiyo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses_surat`
--
ALTER TABLE `akses_surat`
  ADD PRIMARY KEY (`id_akses_surat`);

--
-- Indeks untuk tabel `status_surat`
--
ALTER TABLE `status_surat`
  ADD PRIMARY KEY (`id_status_surat`);

--
-- Indeks untuk tabel `status_user`
--
ALTER TABLE `status_user`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses_surat`
--
ALTER TABLE `akses_surat`
  MODIFY `id_akses_surat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
