-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 14. Agustus 2014 jam 10:08
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
-- Struktur dari tabel `tb_idpenilaianpelaksananpraktikum`
--

CREATE TABLE IF NOT EXISTS `tb_idpenilaianpelaksananpraktikum` (
  `idpenilaian` int(11) NOT NULL AUTO_INCREMENT,
  `idcategori` int(11) NOT NULL,
  `idcourse` varchar(11) NOT NULL,
  `modul` varchar(50) NOT NULL,
  `laporan` int(1) NOT NULL,
  `namapenilaianharian` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `nilaiawal` int(11) NOT NULL,
  `tglbuka` date NOT NULL,
  `tgltutup` date NOT NULL,
  `bobot` int(11) NOT NULL,
  PRIMARY KEY (`idpenilaian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `tb_idpenilaianpelaksananpraktikum`
--

INSERT INTO `tb_idpenilaianpelaksananpraktikum` (`idpenilaian`, `idcategori`, `idcourse`, `modul`, `laporan`, `namapenilaianharian`, `keterangan`, `nilaiawal`, `tglbuka`, `tgltutup`, `bobot`) VALUES
(14, 1, 'EL2193-1', '1', 0, 'Form Penilaian Buku Catatan Laboratorium', '', 100, '2012-11-18', '2012-11-30', 40),
(16, 1, 'EL2193-1', '1', 1, 'Formulir Penilaian Praktikum', '', 100, '2012-11-18', '2012-11-30', 60),
(17, 1, 'EL2193-2', '2', 0, 'Form Penilaian Buku Catatan Laboratorium', '', 100, '2012-11-18', '2012-11-30', 40),
(18, 1, 'EL2193-2', '2', 1, 'Formulir Penilaian Praktikum', '', 100, '2012-11-18', '2012-11-30', 60);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
