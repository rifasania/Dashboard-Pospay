-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2024 pada 03.36
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pospay`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_transaksi`
--

CREATE TABLE `file_transaksi` (
  `id_file` int(11) NOT NULL,
  `tanggal_insert` date NOT NULL,
  `nama_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `file_transaksi`
--

INSERT INTO `file_transaksi` (`id_file`, `tanggal_insert`, `nama_file`) VALUES
(4, '2024-05-31', '20240430_wilpos.xls');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pks`
--

CREATE TABLE `t_pks` (
  `id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `pks` varchar(255) NOT NULL,
  `tanggal_habis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_pks`
--

INSERT INTO `t_pks` (`id`, `pic`, `pks`, `tanggal_habis`) VALUES
(1, 'Robby', 'IMFI (SYB)', '2021-06-21'),
(2, 'Robby', 'PT Pos Finansial Indonesia', '2022-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `id_role`) VALUES
(1, 'rifasania', '12345678', 'Rifa Sania', 1),
(2, 'ameliazalfa', '12345678', 'Amelia Zalfa Julianti', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `file_transaksi`
--
ALTER TABLE `file_transaksi`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `t_pks`
--
ALTER TABLE `t_pks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `file_transaksi`
--
ALTER TABLE `file_transaksi`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_pks`
--
ALTER TABLE `t_pks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
