-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 14. Agustus 2014 jam 10:12
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_lms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mdl_course`
--

CREATE TABLE IF NOT EXISTS `tb_mdl_course` (
  `id` varchar(10) NOT NULL,
  `category` bigint(10) unsigned NOT NULL DEFAULT '0',
  `fullname` varchar(254) NOT NULL DEFAULT '',
  `shortname` varchar(100) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `kordasid` varchar(10) NOT NULL,
  `toleransi` int(11) NOT NULL DEFAULT '0',
  `timecreated` bigint(10) unsigned NOT NULL DEFAULT '0',
  `waktu` time NOT NULL,
  `bobot` int(11) NOT NULL,
  `praktikan_max` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mdl_cour_cat_ix` (`category`),
  KEY `mdl_cour_sho_ix` (`shortname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Central course table';

--
-- Dumping data untuk tabel `tb_mdl_course`
--

INSERT INTO `tb_mdl_course` (`id`, `category`, `fullname`, `shortname`, `description`, `kordasid`, `toleransi`, `timecreated`, `waktu`, `bobot`, `praktikan_max`) VALUES
('01', 3, 'modul cgi', 'cgi', 'cgi good', 'K1', 2, 14, '00:00:02', 0, 20),
('EL2193-1', 1, 'Pengenalan Instrumentasi Laboratorium', 'PIL', '<p style="text-align: justify;">\r\n	Mengenal multimeter sebagai pengukuran tegangan (Voltmeter) dan pengukur arus (Amperemeter)</p>\r\n', 'K1', 0, 2012, '08:00:00', 40, 30),
('EL2193-2', 1, 'Rangkaian Arus Searah dan Nilai Statistik Resistansi', 'RAS', '<p style="text-align: justify;">\r\n	Memahami penggunaan teorema Thevenin dan teorema Norton pada rangkaian arus searah</p>\r\n', 'K1', 0, 0, '08:00:00', 60, 20),
('EL2195-1', 2, 'Parameter Gerbang Logika', 'PGL', '<p style="text-align: justify;">\r\n	Mengenal dan memahami beberapa karakteristik dari gerbang logika diantaranya voltage transfer, noise margin,dan propagation delay. k</p>\r\n', '', 0, 0, '08:00:00', 0, 0),
('EL2195-3', 2, 'Rangakaian Logika Kombinasional', 'RLK', '<p>\r\n	Mendesain rangkaian kombinasional berupa decoder BCD&#8208;to&#8208;7&#8208;segment untuk diimplementasikan di dalam FPGA<br />\r\n	&nbsp;</p>\r\n', '', 0, 2012, '08:00:00', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
