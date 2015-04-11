-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 20. Agustus 2014 jam 06:57
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
-- Struktur dari tabel `tb_list_logbook`
--

CREATE TABLE IF NOT EXISTS `tb_list_logbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judulLogbook` varchar(50) NOT NULL,
  `ketLogbook` text NOT NULL,
  `showpraktikan` int(11) NOT NULL,
  `showkerusakan` int(11) NOT NULL,
  `showlain` int(11) NOT NULL,
  `idcategori` int(11) NOT NULL,
  `idcourse` varchar(11) NOT NULL,
  `modul` varchar(50) NOT NULL,
  `tglbuka` date NOT NULL,
  `tgltutup` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_list_logbook`
--

INSERT INTO `tb_list_logbook` (`id`, `judulLogbook`, `ketLogbook`, `showpraktikan`, `showkerusakan`, `showlain`, `idcategori`, `idcourse`, `modul`, `tglbuka`, `tgltutup`) VALUES
(1, 'Berita Acara 1', '', 1, 1, 1, 1, 'EL2193-1', '1', '2012-11-18', '2012-11-26'),
(2, 'Berita Acara 2', '', 1, 1, 1, 1, 'EL2193-2', '2', '2012-11-18', '2012-11-30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
