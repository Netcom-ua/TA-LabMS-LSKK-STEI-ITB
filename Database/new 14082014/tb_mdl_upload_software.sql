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
-- Struktur dari tabel `tb_mdl_upload_software`
--

CREATE TABLE IF NOT EXISTS `tb_mdl_upload_software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `praktikumid` varchar(25) NOT NULL,
  `software_name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `tb_mdl_upload_software`
--

INSERT INTO `tb_mdl_upload_software` (`id`, `praktikumid`, `software_name`, `size`, `type`, `path`, `date`, `time`) VALUES
(16, '1', 'File Zilla.exe', 4518720, 'application/octet-stream', 'upload/data/EL2193-Rangkaian Elektrik/software_tambahan/File Zilla.exe', '2012-11-17', '19:33:37'),
(29, '2', 'jadwal1.zip', 6179, 'application/octet-stream', 'upload/data/EL2195-Sistem Digital/software_tambahan/jadwal1.zip', '2014-08-13', '11:49:12'),
(30, '2', 'jadwal2.zip', 6179, 'application/octet-stream', 'upload/data/EL2195-Sistem Digital/software_tambahan/jadwal2.zip', '2014-08-13', '14:14:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
