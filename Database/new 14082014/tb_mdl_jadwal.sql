-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 14. Agustus 2014 jam 09:57
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
-- Struktur dari tabel `tb_mdl_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_mdl_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(11) NOT NULL,
  `courseid` varchar(11) NOT NULL,
  `asisstenid` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `group` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`userid`,`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data untuk tabel `tb_mdl_jadwal`
--

INSERT INTO `tb_mdl_jadwal` (`id`, `userid`, `courseid`, `asisstenid`, `date`, `group`) VALUES
(1, 'M2', 'EL2193-1', 'A1', '2012-11-23', 'GROUP1'),
(2, 'M4', 'EL2193-1', 'A1', '2012-11-29', 'GROUP1'),
(161, 'M3', 'EL2193-1', 'A1', '2012-11-23', 'GROUP1'),
(162, 'M1', 'EL2193-1', 'A2', '2012-11-23', 'GROUP2'),
(163, 'M5', 'EL2193-1', 'A2', '2012-11-29', 'GROUP2'),
(165, 'M5', 'EL2193-2', 'A1', '2012-12-05', 'GROUP2'),
(166, 'M6', 'EL2193-1', 'A2', '2012-11-23', 'GROUP2'),
(167, 'M1', 'EL2193-2', 'A2', '2012-12-05', 'GROUP1'),
(168, 'M3', 'EL2193-2', 'A1', '2012-12-05', 'GROUP1'),
(169, 'M4', 'EL2193-2', 'A2', '2012-11-30', 'GROUP2'),
(170, 'M2', 'EL2193-2', 'A2', '2012-12-05', 'GROUP2'),
(171, 'M6', 'EL2193-2', 'A2', '2012-11-30', 'GROUP2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
