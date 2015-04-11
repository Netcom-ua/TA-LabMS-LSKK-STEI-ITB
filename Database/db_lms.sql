-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 11. Juli 2014 jam 09:18
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
-- Struktur dari tabel `tb_asisten`
--

CREATE TABLE IF NOT EXISTS `tb_asisten` (
  `id_asisten` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` blob NOT NULL,
  `status` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_asisten`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_atk`
--

CREATE TABLE IF NOT EXISTS `tb_atk` (
  `kode_alat` char(50) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `kode_lab` varchar(40) NOT NULL,
  `nama_lab` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_pengapusan` date NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `foto` blob NOT NULL,
  PRIMARY KEY (`kode_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank_penilaian`
--

CREATE TABLE IF NOT EXISTS `tb_bank_penilaian` (
  `noid` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penilaian` varchar(50) NOT NULL,
  `ket_nama_penilaian` text NOT NULL,
  PRIMARY KEY (`noid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `id_dosen` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` blob NOT NULL,
  `status` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inventaris`
--

CREATE TABLE IF NOT EXISTS `tb_inventaris` (
  `kode_alat` char(50) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `kode_lab` varchar(50) NOT NULL,
  `nama_lab` varchar(50) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_penghapusan` date NOT NULL,
  `spesifikasi` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `thn_pembuatan` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `foto` blob NOT NULL,
  PRIMARY KEY (`kode_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kepalalab`
--

CREATE TABLE IF NOT EXISTS `tb_kepalalab` (
  `id_kepalalab` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` blob NOT NULL,
  `status` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kepalalab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_klasifikasipenilaian`
--

CREATE TABLE IF NOT EXISTS `tb_klasifikasipenilaian` (
  `index_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `noid` int(11) NOT NULL,
  `jenis_penilaian` varchar(50) NOT NULL,
  `ket_jenis_penilaian` text NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`index_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE IF NOT EXISTS `tb_komentar` (
  `id_balasan` int(11) NOT NULL AUTO_INCREMENT,
  `id_topik` int(25) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `penjawab` varchar(20) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_balasan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kordas`
--

CREATE TABLE IF NOT EXISTS `tb_kordas` (
  `id_kordas` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` blob NOT NULL,
  `status` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kordas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `id_mahasiswa` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `foto` blob NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjam`
--

CREATE TABLE IF NOT EXISTS `tb_pinjam` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `id_peminjam` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kode_alat` varchar(50) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tatausaha`
--

CREATE TABLE IF NOT EXISTS `tb_tatausaha` (
  `id_tatausaha` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` blob NOT NULL,
  `status` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tatausaha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_topik`
--

CREATE TABLE IF NOT EXISTS `tb_topik` (
  `id_topik` int(11) NOT NULL AUTO_INCREMENT,
  `pengirim` varchar(20) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `dilihat` int(255) NOT NULL,
  `total_balasan` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_topik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
