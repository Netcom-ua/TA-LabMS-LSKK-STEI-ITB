-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 15. Juli 2014 jam 09:46
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
-- Struktur dari tabel `tb_mdl_newsfeed`
--

CREATE TABLE IF NOT EXISTS `tb_mdl_newsfeed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topik` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `link` varchar(225) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tb_mdl_newsfeed`
--

INSERT INTO `tb_mdl_newsfeed` (`id`, `topik`, `deskripsi`, `link`, `tanggal`) VALUES
(1, 'Seminar Robotika', 'Dalam Seminar Robotika akan di demokan berbagai macam jenis robot, baik ber kaki atau ber roda.saya', 'www.detik.com', '2014-07-29 00:00:00'),
(2, 'Seminar Teknologi', 'Dalam Seminar Teknologi akan di demokan berbagai macam teknologi baru dan canggih saat ini.', 'www.itb.ac.id', '2014-07-15 00:00:00'),
(7, 'saya', 'mentari', 'sayamentari.com', '2014-07-15 14:20:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
