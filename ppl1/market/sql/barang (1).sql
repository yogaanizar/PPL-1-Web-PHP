-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2022 pada 04.01
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `stok` int(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `stok`, `foto`) VALUES
('KTLG0001', 'Hina Amano AF', 10000, 21, 'hina.jpg'),
('KTLG0002', 'Hina Amano Nendoroid', 20000, 4, 'hinadroid.jpg'),
('KTLG0003', 'Megumin AF', 20000, 4, 'megumin.jpg'),
('KTLG0004', 'Megumin Nendoroid', 3000, 3, 'megumindroid.jpg'),
('KTLG0005', 'Hatsune Miku AF', 300000, 7, 'miku.jpg'),
('KTLG0006', 'Mitsuha Miyamizu AF', 10000, 8, 'mitsuha.jpg'),
('KTLG0007', 'Naruto Uzumaki AF', 3000, 3, 'naruto.jpg'),
('KTLG0008', 'Mikasa Ackerman AF', 10000, 21, 'mikasa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
