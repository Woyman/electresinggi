-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 14 Mar 2020 pada 14.24
-- Versi server: 5.7.26
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elektre_singgi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

DROP TABLE IF EXISTS `alternatif`;
CREATE TABLE IF NOT EXISTS `alternatif` (
  `id_alternatif` int(10) NOT NULL AUTO_INCREMENT,
  `nama_alternatif` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `seri_produk` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_alternatif`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`, `merk`, `seri_produk`, `foto`, `deskripsi`) VALUES
(3, 'Kamera Baru', 'Canon', 'A220', 'DanauTahai.jpg', '<p>Et proident quis sed consectetur in exercitation id cillum voluptate tempor adipisicing eu enim velit voluptate amet eu ut pariatur deserunt mollit voluptate laborum culpa adipisicing aliquip aliquip sit elit eiusmod tempor velit.</p>\r\n'),
(4, 'Kamera terkenal', 'Sony', 'P232', 'Taman Nasional Tanjung Puting.jpg', '<p>Et proident quis sed consectetur in exercitation id cillum voluptate tempor adipisicing eu enim velit voluptate amet eu ut pariatur deserunt mollit voluptate laborum culpa adipisicing aliquip aliquip sit elit eiusmod tempor velit.</p>\r\n'),
(5, 'Kamera OP', 'Kodak', '323a', 'taman kumkum2.jpg', '<p>Do et officia dolore dolor sit incididunt consectetur veniam nulla cillum est dolor veniam deserunt laborum aute ea occaecat sint esse adipisicing cillum fugiat velit tempor aute.</p>\r\n'),
(6, 'Kamera Baru', 'Asus', 'J5', 'Taman Nasional Sebangau.jpg', '<p>Do et officia dolore dolor sit incididunt consectetur veniam nulla cillum est dolor veniam deserunt laborum aute ea occaecat sint esse adipisicing cillum fugiat velit tempor aute.</p>\r\n'),
(7, 'Kamera gagah', 'Kodak', '626a', 'Taman Nasional Tanjung Puting1.jpg', '<p>Do et officia dolore dolor sit incididunt consectetur veniam nulla cillum est dolor veniam deserunt laborum aute ea occaecat sint esse adipisicing cillum fugiat velit tempor aute.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_kamera`
--

DROP TABLE IF EXISTS `kriteria_kamera`;
CREATE TABLE IF NOT EXISTS `kriteria_kamera` (
  `id_kriteria` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(255) NOT NULL,
  `nilai_1` varchar(255) NOT NULL,
  `nilai_2` varchar(255) NOT NULL,
  `nilai_3` varchar(255) NOT NULL,
  `nilai_4` varchar(255) NOT NULL,
  `nilai_5` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria_kamera`
--

INSERT INTO `kriteria_kamera` (`id_kriteria`, `nama_kriteria`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`) VALUES
(2, 'CPU', '3', '4', '5', '2', '1'),
(3, 'RAM', '2gb', '4gb', '8gb ', '16gb', '32gb'),
(4, 'Harga', '1jt - 1.5 jt', '1.5jt - 2 jt', '2jt - 2.5', '2.5jt - 3jt ', '3.5jt - 4jt'),
(5, 'Kapasitas Harddisk', '100gb', '200gb', '300gb ', '400gb', '500gb ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_kriteria_kamera`
--

DROP TABLE IF EXISTS `nilai_kriteria_kamera`;
CREATE TABLE IF NOT EXISTS `nilai_kriteria_kamera` (
  `id_nilai` int(10) NOT NULL AUTO_INCREMENT,
  `id_alternatif` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai` int(10) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_kriteria_kamera`
--

INSERT INTO `nilai_kriteria_kamera` (`id_nilai`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 2, 2, 5),
(2, 3, 2, 1),
(3, 3, 3, 1),
(4, 3, 4, 1),
(5, 3, 5, 1),
(6, 4, 2, 3),
(7, 4, 3, 2),
(8, 4, 4, 2),
(9, 4, 5, 3),
(10, 5, 2, 1),
(11, 5, 3, 1),
(12, 5, 4, 3),
(13, 5, 5, 2),
(14, 6, 2, 3),
(15, 6, 3, 4),
(16, 6, 4, 3),
(17, 6, 5, 4),
(18, 7, 2, 4),
(19, 7, 3, 4),
(20, 7, 4, 4),
(21, 7, 5, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
