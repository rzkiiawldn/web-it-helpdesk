-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2021 pada 09.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kerusakan`
--

CREATE TABLE `tb_kerusakan` (
  `kode` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `jenis_kerusakan` varchar(100) NOT NULL,
  `waktu_pembuatan` time NOT NULL,
  `status_pengerjaan` varchar(100) NOT NULL,
  `waktu_selesai` time NOT NULL,
  `foto_kerusakan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kerusakan`
--

INSERT INTO `tb_kerusakan` (`kode`, `id_user`, `deskripsi`, `jenis_kerusakan`, `waktu_pembuatan`, `status_pengerjaan`, `waktu_selesai`, `foto_kerusakan`) VALUES
(1, 1, 'rusak bgt', 'Low', '11:30:00', 'Selesai', '13:41:00', 'nanti'),
(2, 1, 'keyboard rusak', 'Low', '11:33:00', 'Selesai', '14:08:00', 'nanti'),
(3, 1, 'keyboardnya gaenak', 'Low', '11:33:00', 'Selesai', '13:40:00', 'nanti'),
(4, 1, 'wifi rusak', 'Urgent', '12:48:00', 'Selesai', '13:44:00', 'nanti'),
(5, 1, 'dari ibu is yang nanti sore potong rambut', 'Medium', '13:03:00', 'Selesai', '14:05:00', 'nanti'),
(6, 1, 'keyboard rusak', 'Low', '18:00:00', 'Selesai', '18:01:00', 'nanti'),
(7, 1, 'keyboard rusak', 'Medium', '02:44:00', 'Selesai', '02:45:00', 'nanti'),
(8, 1, 'Hati retak-retak', 'Urgent', '03:36:00', 'Selesai', '03:36:00', 'nanti'),
(9, 1, 'keyboard rusak bgt anjim', 'Urgent', '12:08:00', 'Selesai', '12:01:00', 'pesantren-dan--zud.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `jabatan`, `level`) VALUES
(1, 'rizki awaludin', 'admin', '$2y$10$Jk1S1UhYPDwvxZo1K6QZ/e5FHsfNvdAnDLxziO6AJIQh2vV82V7yW', 'programmer', 'Admin'),
(2, 'rizki muhammad', 'staff', '$2y$10$2uXy1nJkmn5ktzCdvfZsUeD/3oplVSMCVv4E6ZYX/utTmMTGQWxQK', 'sistem analis', 'Staff'),
(3, 'awaludin', 'it', '$2y$10$Oeig99RToDneoOVcnWusjOshMm4hLs1jP3lXG9gnU86Z07OvC4ffS', 'IT Support', 'IT');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kerusakan`
--
ALTER TABLE `tb_kerusakan`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kerusakan`
--
ALTER TABLE `tb_kerusakan`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
