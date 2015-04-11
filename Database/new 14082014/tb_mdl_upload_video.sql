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
-- Struktur dari tabel `tb_mdl_upload_video`
--

CREATE TABLE IF NOT EXISTS `tb_mdl_upload_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `tb_mdl_upload_video`
--

INSERT INTO `tb_mdl_upload_video` (`id`, `video_name`, `size`, `type`, `path`, `date`, `time`) VALUES
(15, 'Mengukur Sinyal AC.flv', 4686796, 'application/octet-stream', 'teknisi/video/Mengukur Sinyal AC.flv', '2012-11-17', '20:47:12'),
(24, 'MengukurTeganganSinyalDC.flv', 4977962, 'application/octet-stream', 'tatausaha/video/MengukurTeganganSinyalDC.flv', '2014-08-14', '22:00:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
