-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 20. Agustus 2014 jam 06:58
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
-- Struktur dari tabel `tb_mdl_data_file`
--

CREATE TABLE IF NOT EXISTS `tb_mdl_data_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategori` int(11) NOT NULL,
  `idcourse` varchar(11) NOT NULL,
  `judulfile` varchar(50) NOT NULL,
  `keteranganfile` text NOT NULL,
  `tanggal` date NOT NULL,
  `tglbuka` date NOT NULL,
  `tgltutup` date NOT NULL,
  `namafolder` varchar(500) NOT NULL,
  `namafile` varchar(300) NOT NULL,
  `namatypefile` varchar(30) NOT NULL,
  `visible` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tb_mdl_data_file`
--

INSERT INTO `tb_mdl_data_file` (`id`, `idcategori`, `idcourse`, `judulfile`, `keteranganfile`, `tanggal`, `tglbuka`, `tgltutup`, `namafolder`, `namafile`, `namatypefile`, `visible`) VALUES
(1, 1, 'EL2193-1', 'Modul 1', '<p>\r\n	Pengenalan Instrumentasi Laboratorium</p>\r\n', '2012-11-14', '2012-11-13', '2012-11-30', 'Modul/', 'Modul Pengenalan Instrumentasi Laboratorium', 'pdf', 1),
(2, 2, 'EL2195-1', 'Modul 1', '<p>\r\n	Sistem Digital</p>\r\n', '2012-11-15', '2012-11-14', '2012-11-30', '', 'Sistem Digital', 'pdf', 1),
(3, 1, 'EL2193-2', 'Modul 2', '<p>\r\n	Modul 2</p>\r\n', '2012-11-19', '2012-11-18', '2012-11-30', 'Modul/', 'Modul Pengenalan Instrumentasi Laboratorium', 'pdf', 1),
(4, 3, '01', 'cgi', 'cgi good						', '2014-07-08', '2014-07-08', '2014-07-09', '', 'ManualBookSISFOLAB', 'pdf', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
