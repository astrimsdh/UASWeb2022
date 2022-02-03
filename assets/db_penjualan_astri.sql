-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2022 pada 17.00
-- Versi server: 10.4.21-MariaDB-log
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan_astri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi_astri`
--

CREATE TABLE `detail_transaksi_astri` (
  `id_order` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi_astri`
--

INSERT INTO `detail_transaksi_astri` (`id_order`, `id_transaksi`, `id_masakan`, `qty`, `total`) VALUES
(87, 1, 6, 6, 114000),
(88, 96, 8, 6, 150000);

--
-- Trigger `detail_transaksi_astri`
--
DELIMITER $$
CREATE TRIGGER `batal_transaksi` AFTER DELETE ON `detail_transaksi_astri` FOR EACH ROW BEGIN
	UPDATE masakan SET stok = stok + OLD.qty
    WHERE id_masakan = OLD.id_masakan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_transaksi` AFTER INSERT ON `detail_transaksi_astri` FOR EACH ROW BEGIN
	UPDATE masakan SET stok = stok - NEW.qty
    WHERE id_masakan = NEW.id_masakan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_astri`
--

CREATE TABLE `level_astri` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level_astri`
--

INSERT INTO `level_astri` (`id_level`, `nama_level`) VALUES
(1, 'administrator'),
(2, 'kasir'),
(3, 'owner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan_astri`
--

CREATE TABLE `masakan_astri` (
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masakan_astri`
--

INSERT INTO `masakan_astri` (`id_masakan`, `nama_masakan`, `harga`, `stok`, `gambar`, `kategori`, `deskripsi`) VALUES
(1, 'Classic Kebab', 25000, 66, '', 'biasa', ''),
(3, 'Full Beef Kebab', 22000, 63, '', 'favorit', ''),
(6, 'Vegetable Kebab', 19000, 56, '', 'biasa', ''),
(8, 'Beef Cheesy Mayo Kebab', 25000, 60, '', 'favorit', ''),
(9, 'Smoke Beef Kebab', 31000, 18, '', 'favorit', ''),
(10, 'Barbeque Kebab', 22000, 13, '', 'favorit', ''),
(11, 'Blackpepper Kebab', 25000, 20, '', 'biasa', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_astri`
--

CREATE TABLE `transaksi_astri` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_astri`
--

INSERT INTO `transaksi_astri` (`id_transaksi`, `id_user`, `tanggal`, `total_bayar`) VALUES
(95, 7, '2022-02-03', 114000),
(96, 7, '2022-02-03', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_astri`
--

CREATE TABLE `user_astri` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `id_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_astri`
--

INSERT INTO `user_astri` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(1, 'admin', '$2y$10$MpswdqzkH0V2FJEfSm7iPuV2ImhMbocqMcA/rtQf1yjlmeiFcmXEW', 'Admin', 1),
(5, 'superadmin', '$2y$10$xZi0wZPSwm/VW512Vfgt0eDoy4N7vggsVXLivEEYkRZPMwcxIe2Ea', 'Mang Admin', 1),
(6, 'owner', '$2y$10$jermOQ9Tnknik5O.n0aOEeymhIDi8r4oiZcEQDFmsCd3pHq5a5CJO', 'Owner', 3),
(7, 'kasir', '$2y$10$7F1BHJ65tgY1WrxRx5u4Le08Whdq4HrNyNOH7/wmmhesl6uCTdGJm', 'Kasir', 2),
(8, 'kasir2', '$2y$10$69iuKJ/kCkefZ6DzFV/Ip.z3rCc64bLVdVsOvZgMkPtswW95J2NLy', 'Kasir 2', 2),
(9, 'astrimsdh', '21232f297a57a5a743894a0e4a801fc3', 'Astri Musidah', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi_astri`
--
ALTER TABLE `detail_transaksi_astri`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `level_astri`
--
ALTER TABLE `level_astri`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `masakan_astri`
--
ALTER TABLE `masakan_astri`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indeks untuk tabel `transaksi_astri`
--
ALTER TABLE `transaksi_astri`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user_astri`
--
ALTER TABLE `user_astri`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi_astri`
--
ALTER TABLE `detail_transaksi_astri`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `masakan_astri`
--
ALTER TABLE `masakan_astri`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi_astri`
--
ALTER TABLE `transaksi_astri`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `user_astri`
--
ALTER TABLE `user_astri`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi_astri`
--
ALTER TABLE `transaksi_astri`
  ADD CONSTRAINT `transaksi_astri_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_astri` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_astri`
--
ALTER TABLE `user_astri`
  ADD CONSTRAINT `user_astri_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level_astri` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
