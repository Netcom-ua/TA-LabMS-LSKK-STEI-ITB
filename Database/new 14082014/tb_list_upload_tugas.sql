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
-- Struktur dari tabel `tb_list_upload_tugas`
--

CREATE TABLE IF NOT EXISTS `tb_list_upload_tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `juduluploadtugas` varchar(100) NOT NULL,
  `ketuploadtugas` text NOT NULL,
  `modul` varchar(11) NOT NULL,
  `idcategori` int(11) NOT NULL,
  `idcourse` varchar(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `tglbuka` datetime NOT NULL,
  `tgltutup` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `juduluploadtugas` (`juduluploadtugas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tb_list_upload_tugas`
--

INSERT INTO `tb_list_upload_tugas` (`id`, `juduluploadtugas`, `ketuploadtugas`, `modul`, `idcategori`, `idcourse`, `bobot`, `tglbuka`, `tgltutup`) VALUES
(1, 'Tugas Modul 1', '', '1', 1, 'EL2193-1', 0, '2012-11-09 05:00:00', '2012-11-30 06:00:00'),
(5, 'Tugas Modul 2', '', '2', 1, 'EL2193-2', 0, '2012-11-18 05:00:00', '2012-11-30 06:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
