-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2022 pada 07.01
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iseng`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `process_log`
--

CREATE TABLE `process_log` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `min_support` double NOT NULL,
  `min_confidence` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nm_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `nm_lengkap`) VALUES
(1, 'admin@gmail.com', 'password', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_confidence`
--

CREATE TABLE `tbl_confidence` (
  `id` int(11) NOT NULL,
  `kombinasi1` varchar(255) NOT NULL,
  `kombinasi2` varchar(255) NOT NULL,
  `support_xUy` double NOT NULL,
  `support_x` double NOT NULL,
  `confidence` double NOT NULL,
  `lolos` tinyint(4) NOT NULL,
  `min_support` double NOT NULL,
  `min_confidence` double NOT NULL,
  `nilai_uji_lift` double NOT NULL,
  `korelasi_rule` varchar(255) NOT NULL,
  `id_process` int(11) NOT NULL,
  `jumlah_a` int(11) NOT NULL,
  `jumlah_b` int(11) NOT NULL,
  `jumlah_ab` int(11) NOT NULL,
  `px` double NOT NULL,
  `py` double NOT NULL,
  `pxuy` double NOT NULL,
  `from_itemset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id_barang` int(11) NOT NULL,
  `nmb` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jan` int(11) NOT NULL,
  `feb` int(11) NOT NULL,
  `mar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_data`
--

INSERT INTO `tbl_data` (`id_barang`, `nmb`, `stok`, `jan`, `feb`, `mar`) VALUES
(1, 'Yoesani Women Shoes A500', 45, 5, 10, 8),
(2, 'Yoesani Women Shoes A502', 31, 8, 5, 5),
(3, 'Yoesani Women Shoes A503', 38, 7, 11, 10),
(4, 'Yoesani Women Shoes A504', 21, 1, 3, 1),
(5, 'Yoesani Women Shoes A505', 35, 13, 10, 8),
(6, 'Yoesani Women Boots A600', 26, 9, 7, 6),
(7, 'Yoesani Women Boots A601', 36, 11, 9, 12),
(8, 'Yoesani Women Boots A602', 40, 9, 15, 13),
(9, 'Yoesani Women Boots A603', 30, 2, 6, 4),
(10, 'Yoesani Women Boots A604', 40, 19, 6, 11),
(11, 'Yoesani Men Shoes A01', 20, 4, 4, 4),
(12, 'Yoesani Men Shoes A02', 35, 9, 9, 14),
(13, 'Yoesani Men Shoes A03', 30, 6, 8, 0),
(14, 'Yoesani Men Shoes A04', 12, 2, 4, 2),
(15, 'Yoesani Men Shoes A05', 45, 14, 10, 12),
(16, 'Yoesani Men Boots A200', 29, 4, 3, 5),
(17, 'Yoesani Men Boots A201', 35, 10, 9, 11),
(18, 'Yoesani Men Boots A202', 36, 11, 8, 9),
(19, 'Yoesani Men Boots A203', 35, 9, 11, 6),
(20, 'Yoesani Men Boots A204', 38, 13, 13, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `id_hasil` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c1y` int(11) NOT NULL,
  `c2y` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_hasil`
--

INSERT INTO `tbl_hasil` (`id_hasil`, `c1`, `c2`, `c1y`, `c2y`) VALUES
(1, 45, 25, 30, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_itemset1`
--

CREATE TABLE `tbl_itemset1` (
  `id` int(11) NOT NULL,
  `atribut` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `support` double NOT NULL,
  `lolos` tinyint(4) NOT NULL,
  `id_process` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_itemset2`
--

CREATE TABLE `tbl_itemset2` (
  `id` int(11) NOT NULL,
  `atribut1` varchar(255) NOT NULL,
  `atribut2` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `support` double NOT NULL,
  `lolos` tinyint(4) NOT NULL,
  `id_process` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_itemset3`
--

CREATE TABLE `tbl_itemset3` (
  `id` int(11) NOT NULL,
  `atribut1` varchar(255) NOT NULL,
  `atribut2` varchar(255) NOT NULL,
  `atribut3` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `support` double NOT NULL,
  `lolos` tinyint(4) NOT NULL,
  `id_process` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nama_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `tgl_transaksi`, `nama_produk`) VALUES
(1, '2022-07-24', 'Bellagio,Essential Sport,Melati,Jimmy Choo Man,Black Intense,White Musk,Silver,Lovely KW 1,Sexy Gravity,Cool Water Man KW 1,Vanilla,Exotic Unisex,Aqua Digio Blue KW 1,Fantasy,Bubble Gum,Legend,Vanilla,Bulgary Pour Homme Soir,Blue Edition KW 1,Cool Game,Ferrari Man In Red KW 1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `process_log`
--
ALTER TABLE `process_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_confidence`
--
ALTER TABLE `tbl_confidence`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `tbl_itemset1`
--
ALTER TABLE `tbl_itemset1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_itemset2`
--
ALTER TABLE `tbl_itemset2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_itemset3`
--
ALTER TABLE `tbl_itemset3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `process_log`
--
ALTER TABLE `process_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_confidence`
--
ALTER TABLE `tbl_confidence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_itemset1`
--
ALTER TABLE `tbl_itemset1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_itemset2`
--
ALTER TABLE `tbl_itemset2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_itemset3`
--
ALTER TABLE `tbl_itemset3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
