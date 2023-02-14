-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Feb 2023 pada 17.44
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
-- Struktur dari tabel `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id_barang` int(11) NOT NULL,
  `nmb` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `mar` varchar(255) NOT NULL,
  `apr` varchar(255) NOT NULL,
  `mei` varchar(255) NOT NULL,
  `minat` varchar(255) NOT NULL,
  `minat_hasil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_data`
--

INSERT INTO `tbl_data` (`id_barang`, `nmb`, `jenis_barang`, `stok`, `mar`, `apr`, `mei`, `minat`, `minat_hasil`) VALUES
(1, 'I - 17 MARINA COOLER BOX 18 S ( 16 LTR )', 'PERALATAN DAPUR', '45', '10', '15', '13', 'Rendah', '-'),
(2, 'AP - 2 THERMOS PANAS \" AIR POT \" 2 LITER', 'PERALATAN DAPUR', '31', '5', '10', '10', 'Tinggi', '-'),
(3, 'BR - 10 WIPER GLASS CLEANER', 'PERALATAN KEBERSIHAN', '38', '12', '13', '10', 'Tinggi', '-'),
(4, 'BR - 66 LIVINA BATHROOM BRUSH NO. 201', 'PERALATAN KEBERSIHAN', '35', '5', '10', '10', 'Rendah', '-'),
(5, 'PT - 6 TIFFANY CANDY POT L (1600 ML)', 'PERALATAN MAKANAN', '40', '12', '13', '14', 'Tinggi', '-'),
(6, 'R - 10 RANTANG UKIR SUSUN-4', 'PERALATAN MAKANAN', '30', '5', '10', '12', 'Tinggi', '-'),
(7, 'NA - 8 REGEN BOTTLE 1000 ML', 'PERALATAN MAKANAN', '40', '12', '14', '10', 'Tinggi', '-'),
(8, 'GL - 12 GELAS C-2 + TUTUP + SEDOTAN', 'PERALATAN MAKANAN', '45', '13', '16', '10', 'Tinggi', '-'),
(9, 'K - 1 THERMO WATER JUG 1,3 LTR', 'PERALATAN DAPUR', '35', '7', '12', '15', 'Tinggi', '-'),
(10, 'K - 7 THERMO WATER JUG 1,7 LTR', 'PERALATAN DAPUR', '45', '9', '12', '15', 'Rendah', '-'),
(11, 'K - 13 THERMO WATER JUG 2,5 LTR', 'PERALATAN DAPUR', '25', '5', '7', '12', 'Tinggi', '-'),
(12, 'R - 10 RANTANG UKIR SUSUN-4', 'PERALATAN MAKANAN', '30', '10', '13', '5', 'Tinggi', '-'),
(13, 'NH - 80 INFUSER CHAMP BOTTLE 820 ML', 'PERALATAN MAKANAN', '40', '6', '17', '10', 'Rendah', '-'),
(14, 'J - 4 JUMBO COOLER 2,5 LITER', 'PERALATAN MAKANAN', '40', '8', '14', '15', 'Tinggi', '-'),
(15, 'SW - 30 FRESH SEAL WARE SW-30 370 ML SEKAT/TRANS', 'PERALATAN MAKANAN', '35', '5', '13', '9', 'Rendah', '-'),
(16, 'BA - 31 BASKOM HATI', 'PERALATAN DAPUR', '50', '15', '13', '10', 'Rendah', '-'),
(17, 'BBC - 3 EMILIA FOOD CASE 270 ML', 'PERALATAN MAKANAN', '45', '7', '10', '13', 'Rendah', '-'),
(18, 'I - 15 MARINA COOLER BOX 6 S ( 5,5 LTR )', 'PERALATAN DAPUR', '36', '10', '5', '3', 'Rendah', '-'),
(19, 'PL - 8 EMBER 1/2 GL LUX + FILM', 'PERALATAN KEBERSIHAN', '25', '5', '9', '3', 'Rendah', '-'),
(20, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '7', '10', '4', 'Tinggi', '-'),
(21, 'DC - 4 TUDUNG SAJI PERSEGI', 'PERALATAN DAPUR', '35', '10', '6', '12', 'Rendah', '-'),
(22, 'MB - 15 STAR SOAP CASE 02', 'PERALATAN KEBERSIHAN', '40', '7', '12', '17', 'Tinggi', '-'),
(23, 'MUG ELEKTRIK 1.5 LION STAR NIKITA', 'PERALATAN DAPUR', '20', '4', '9', '6', 'Tinggi', '-'),
(24, 'SB - 2 SCHOOL BOX', 'PERALATAN MAKANAN', '45', '10', '13', '7', 'Rendah', '-'),
(25, 'BW - 2 MANGKOK KOCOKAN TELOR B - 20', 'PERALATAN DAPUR', '50', '14', '10', '12', 'Rendah', '-'),
(26, 'NH - 81 HYDRO BOTTLE 1500 ML', 'PERALATAN MAKANAN', '35', '9', '9', '14', 'Tinggi', '-'),
(27, 'PP - 35 TOPLES HUGO ROUND JAR 105 ( 8 LT)', 'PERALATAN DAPUR', '50', '9', '15', '13', 'Rendah', '-'),
(28, 'KERANJANG SAMPAH REGE 353 KW CORNELIUS', 'PERALATAN KEBESIHAN', '50', '12', '6', '11', 'Rendah', '-'),
(29, 'SB - 7 LUNCH KID', 'PERALATAN MAKANAN', '30', '6', '8', '12', 'Tinggi', '-'),
(30, 'NN - 85 FRONTIER BOTTLE 500 ML', 'PERALATAN MAKANAN', '25', '10', '9', '4', 'Tinggi', '-'),
(31, 'I - 16 MARINA COOLER BOX 12 S ( 10 LTR )', 'PERALATAN DAPUR', '35', '13', '10', '6', 'Tinggi', '-'),
(32, 'GL - 34 JUNIOR MUG 240 ML + TUTUP', 'PERALATAN MAKANAN', '40', '19', '11', '6', 'Tinggi', '-'),
(33, 'BASKOM JERMAN 4423 FRIEND', 'PERALATAN DAPUR', '25', '9', '7', '6', 'Tinggi', '-'),
(34, 'GL - 15 GAYUNG AIR DELUXE', 'PERALATAN KEBERSIHAN', '35', '13', '10', '8', 'Tinggi', '-'),
(35, 'BAKING PAN 28 CM ORCHID', 'PERALATAN DAPUR', '40', '14', '10', '12', 'Tinggi', '-'),
(36, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '9', '7', '3', 'Tinggi', '-'),
(37, 'BA - 9 BASKOM 20\" DELUXE POLOS ( Ø 44 CM )', 'PERALATAN DAPUR', '35', '13', '10', '7', 'Tinggi', '-'),
(38, 'BA - 7 BASKOM 16\" DELUXE POLOS ( Ø 38 CM )', 'PERALATAN DAPUR', '40', '15', '7', '13', 'Tinggi', '-'),
(39, 'BA - 20 BASKOM U.S.A 18\" POLOS ( Ø 39 CM )', 'PERALATAN DAPUR', '25', '6', '7', '9', 'Tinggi', '-'),
(40, 'BA - 22 BASKOM U.S.A 22\" POLOS ( Ø 53 CM )', 'PERALATAN DAPUR', '40', '19', '5', '11', 'Tinggi', '-'),
(41, 'BA - 27 BASKOM U.S.A 30\" POLOS ( Ø 71 CM )', 'PERALATAN DAPUR', '35', '4', '7', '12', 'Rendah', '-'),
(42, 'NH - 93 OLIF BOTTLE 500 ML \"TRITAN\"', 'PERALATAN MAKANAN', '45', '10', '12', '14', 'Rendah', '-'),
(43, 'NH - 98 MINIGO BOTTLE 600 ML', 'PERALATAN MAKANAN', '25', '8', '6', '9', 'Tinggi', '-'),
(44, 'BO - 3 LIVINA TOILET BRUSH NO. 103 + POT', 'PERALATAN KEBERSIHAN', '45', '13', '10', '11', 'Rendah', '-'),
(45, 'BO - 2 LIVINA TOILET BRUSH NO. 102 + POT', 'PERALATAN KEBERSIHAN', '20', '11', '3', '5', 'Tinggi', '-'),
(46, 'BMW - 4 MANGKOK 18 CM', 'PERALATAN MAKANAN', '35', '5', '10', '5', 'Rendah', '-'),
(47, 'T - 49 NAMPAN NO. 10', 'PERALATAN DAPUR', '45', '12', '15', '10', 'Rendah', '-'),
(48, 'BR - 21 LIVINA KITCHEN BRUSH NO. 21', 'PERALATAN DAPUR', '25', '6', '3', '9', 'Rendah', '-'),
(49, 'TOPLES CT 250', 'PERALATAN MAKANAN', '30', '10', '7', '5', 'Rendah', '-'),
(50, ' WATER JUG 4,1 LTR', 'PERALATAN DAPUR', '40', '10', '15', '9', 'Tinggi', '-'),
(51, 'NN - 85 FRONTIER BOTTLE 500 ML', 'PERALATAN MAKANAN', '25', '10', '9', '4', 'Tinggi', '-'),
(52, 'I - 16 MARINA COOLER BOX 12 S ( 10 LTR )', 'PERALATAN DAPUR', '35', '13', '10', '6', 'Tinggi', '-'),
(53, 'GL - 34 JUNIOR MUG 240 ML + TUTUP', 'PERALATAN MAKANAN', '40', '19', '11', '6', 'Tinggi', '-'),
(54, 'BASKOM JERMAN 4423 FRIEND', 'PERALATAN DAPUR', '25', '9', '7', '6', 'Tinggi', '-'),
(55, 'GL - 15 GAYUNG AIR DELUXE', 'PERALATAN KEBERSIHAN', '35', '13', '10', '8', 'Tinggi', '-'),
(56, 'BAKING PAN 28 CM ORCHID', 'PERALATAN DAPUR', '40', '14', '10', '12', 'Tinggi', '-'),
(57, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '9', '7', '3', 'Tinggi', '-'),
(58, 'BA - 9 BASKOM 20\" DELUXE POLOS ( Ø 44 CM )', 'PERALATAN DAPUR', '35', '13', '10', '7', 'Tinggi', '-'),
(59, 'BA - 7 BASKOM 16\" DELUXE POLOS ( Ø 38 CM )', 'PERALATAN DAPUR', '40', '15', '7', '13', 'Tinggi', '-'),
(60, 'BA - 20 BASKOM U.S.A 18\" POLOS ( Ø 39 CM )', 'PERALATAN DAPUR', '25', '6', '7', '9', 'Tinggi', '-'),
(61, 'BA - 22 BASKOM U.S.A 22\" POLOS ( Ø 53 CM )', 'PERALATAN DAPUR', '40', '19', '5', '11', 'Tinggi', '-'),
(62, 'BA - 27 BASKOM U.S.A 30\" POLOS ( Ø 71 CM )', 'PERALATAN DAPUR', '35', '4', '7', '12', 'Rendah', '-'),
(63, 'NH - 93 OLIF BOTTLE 500 ML \"TRITAN\"', 'PERALATAN MAKANAN', '45', '10', '12', '14', 'Rendah', '-'),
(64, 'NH - 98 MINIGO BOTTLE 600 ML', 'PERALATAN MAKANAN', '25', '8', '6', '9', 'Tinggi', '-'),
(65, 'BO - 3 LIVINA TOILET BRUSH NO. 103 + POT', 'PERALATAN KEBERSIHAN', '45', '13', '10', '11', 'Rendah', '-'),
(66, 'BO - 2 LIVINA TOILET BRUSH NO. 102 + POT', 'PERALATAN KEBERSIHAN', '20', '11', '3', '5', 'Tinggi', '-'),
(67, 'BMW - 4 MANGKOK 18 CM', 'PERALATAN MAKANAN', '35', '5', '10', '5', 'Rendah', '-'),
(68, 'T - 49 NAMPAN NO. 10', 'PERALATAN DAPUR', '45', '12', '15', '10', 'Rendah', '-'),
(69, 'BR - 21 LIVINA KITCHEN BRUSH NO. 21', 'PERALATAN DAPUR', '25', '6', '3', '9', 'Rendah', '-'),
(70, 'TOPLES CT 250', 'PERALATAN MAKANAN', '30', '10', '7', '5', 'Rendah', '-'),
(71, ' WATER JUG 4,1 LTR', 'PERALATAN DAPUR', '40', '10', '15', '9', 'Tinggi', '-'),
(72, 'I - 17 MARINA COOLER BOX 18 S ( 16 LTR )', 'PERALATAN DAPUR', '45', '10', '15', '13', 'Rendah', '-'),
(73, 'AP - 2 THERMOS PANAS \" AIR POT \" 2 LITER', 'PERALATAN DAPUR', '31', '5', '10', '10', 'Tinggi', '-'),
(74, 'BR - 10 WIPER GLASS CLEANER', 'PERALATAN KEBERSIHAN', '38', '12', '13', '10', 'Tinggi', '-'),
(75, 'BR - 66 LIVINA BATHROOM BRUSH NO. 201', 'PERALATAN KEBERSIHAN', '35', '5', '10', '10', 'Rendah', '-'),
(76, 'PT - 6 TIFFANY CANDY POT L (1600 ML)', 'PERALATAN MAKANAN', '40', '12', '13', '14', 'Tinggi', '-'),
(77, 'R - 10 RANTANG UKIR SUSUN-4', 'PERALATAN MAKANAN', '30', '5', '10', '12', 'Tinggi', '-'),
(78, 'NA - 8 REGEN BOTTLE 1000 ML', 'PERALATAN MAKANAN', '40', '12', '14', '10', 'Tinggi', '-'),
(79, 'GL - 12 GELAS C-2 + TUTUP + SEDOTAN', 'PERALATAN MAKANAN', '45', '13', '16', '10', 'Tinggi', '-'),
(80, 'K - 1 THERMO WATER JUG 1,3 LTR', 'PERALATAN DAPUR', '35', '7', '12', '15', 'Tinggi', '-'),
(81, 'K - 7 THERMO WATER JUG 1,7 LTR', 'PERALATAN DAPUR', '45', '9', '12', '15', 'Rendah', '-'),
(82, 'K - 13 THERMO WATER JUG 2,5 LTR', 'PERALATAN DAPUR', '25', '5', '7', '12', 'Tinggi', '-'),
(83, 'R - 10 RANTANG UKIR SUSUN-4', 'PERALATAN MAKANAN', '30', '10', '13', '5', 'Tinggi', '-'),
(84, 'NH - 80 INFUSER CHAMP BOTTLE 820 ML', 'PERALATAN MAKANAN', '40', '6', '17', '10', 'Rendah', '-'),
(85, 'J - 4 JUMBO COOLER 2,5 LITER', 'PERALATAN MAKANAN', '40', '8', '14', '15', 'Tinggi', '-'),
(86, 'SW - 30 FRESH SEAL WARE SW-30 370 ML SEKAT/TRANS', 'PERALATAN MAKANAN', '35', '5', '13', '9', 'Rendah', '-'),
(87, 'BA - 31 BASKOM HATI', 'PERALATAN DAPUR', '50', '15', '13', '10', 'Rendah', '-'),
(88, 'BBC - 3 EMILIA FOOD CASE 270 ML', 'PERALATAN MAKANAN', '45', '7', '10', '13', 'Rendah', '-'),
(89, 'I - 15 MARINA COOLER BOX 6 S ( 5,5 LTR )', 'PERALATAN DAPUR', '36', '10', '5', '3', 'Rendah', '-'),
(90, 'PL - 8 EMBER 1/2 GL LUX + FILM', 'PERALATAN KEBERSIHAN', '25', '5', '9', '3', 'Rendah', '-'),
(91, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '7', '10', '4', 'Tinggi', '-'),
(92, 'DC - 4 TUDUNG SAJI PERSEGI', 'PERALATAN DAPUR', '35', '10', '6', '12', 'Rendah', '-'),
(93, 'MB - 15 STAR SOAP CASE 02', 'PERALATAN KEBERSIHAN', '40', '7', '12', '17', 'Tinggi', '-'),
(94, 'MUG ELEKTRIK 1.5 LION STAR NIKITA', 'PERALATAN DAPUR', '20', '4', '9', '6', 'Tinggi', '-'),
(95, 'SB - 2 SCHOOL BOX', 'PERALATAN MAKANAN', '45', '10', '13', '7', 'Rendah', '-'),
(96, 'BW - 2 MANGKOK KOCOKAN TELOR B - 20', 'PERALATAN DAPUR', '50', '14', '10', '12', 'Rendah', '-'),
(97, 'NH - 81 HYDRO BOTTLE 1500 ML', 'PERALATAN MAKANAN', '35', '9', '9', '14', 'Tinggi', '-'),
(98, 'PP - 35 TOPLES HUGO ROUND JAR 105 ( 8 LT)', 'PERALATAN DAPUR', '50', '9', '15', '13', 'Rendah', '-'),
(99, 'KERANJANG SAMPAH REGE 353 KW CORNELIUS', 'PERALATAN KEBESIHAN', '50', '12', '6', '11', 'Rendah', '-'),
(100, 'SB - 7 LUNCH KID', 'PERALATAN MAKANAN', '30', '6', '8', '12', 'Tinggi', '-'),
(101, 'BA - 22 BASKOM U.S.A 22\" POLOS ( Ø 53 CM )', 'PERALATAN DAPUR', '40', '19', '5', '11', 'Tinggi', '-'),
(102, 'BA - 27 BASKOM U.S.A 30\" POLOS ( Ø 71 CM )', 'PERALATAN DAPUR', '35', '4', '7', '12', 'Rendah', '-'),
(103, 'NH - 93 OLIF BOTTLE 500 ML \"TRITAN\"', 'PERALATAN MAKANAN', '45', '10', '12', '14', 'Rendah', '-'),
(104, 'NH - 98 MINIGO BOTTLE 600 ML', 'PERALATAN MAKANAN', '25', '8', '6', '9', 'Tinggi', '-'),
(105, 'BO - 3 LIVINA TOILET BRUSH NO. 103 + POT', 'PERALATAN KEBERSIHAN', '45', '13', '10', '11', 'Rendah', '-'),
(106, 'BO - 2 LIVINA TOILET BRUSH NO. 102 + POT', 'PERALATAN KEBERSIHAN', '20', '11', '3', '5', 'Tinggi', '-'),
(107, 'BMW - 4 MANGKOK 18 CM', 'PERALATAN MAKANAN', '35', '5', '10', '5', 'Rendah', '-'),
(108, 'T - 49 NAMPAN NO. 10', 'PERALATAN DAPUR', '45', '12', '15', '10', 'Rendah', '-'),
(109, 'BR - 21 LIVINA KITCHEN BRUSH NO. 21', 'PERALATAN DAPUR', '25', '6', '3', '9', 'Rendah', '-'),
(110, 'TOPLES CT 250', 'PERALATAN MAKANAN', '30', '10', '7', '5', 'Rendah', '-'),
(111, ' WATER JUG 4,1 LTR', 'PERALATAN DAPUR', '40', '10', '15', '9', 'Tinggi', '-'),
(112, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '7', '10', '4', 'Tinggi', '-'),
(113, 'DC - 4 TUDUNG SAJI PERSEGI', 'PERALATAN DAPUR', '35', '10', '6', '12', 'Rendah', '-'),
(114, 'MB - 15 STAR SOAP CASE 02', 'PERALATAN KEBERSIHAN', '40', '7', '12', '17', 'Tinggi', '-'),
(115, 'MUG ELEKTRIK 1.5 LION STAR NIKITA', 'PERALATAN DAPUR', '20', '4', '9', '6', 'Tinggi', '-'),
(116, 'SB - 2 SCHOOL BOX', 'PERALATAN MAKANAN', '45', '10', '13', '7', 'Rendah', '-'),
(117, 'BW - 2 MANGKOK KOCOKAN TELOR B - 20', 'PERALATAN DAPUR', '50', '14', '10', '12', 'Rendah', '-'),
(118, 'NH - 81 HYDRO BOTTLE 1500 ML', 'PERALATAN MAKANAN', '35', '9', '9', '14', 'Tinggi', '-'),
(119, 'PP - 35 TOPLES HUGO ROUND JAR 105 ( 8 LT)', 'PERALATAN DAPUR', '50', '9', '15', '13', 'Rendah', '-'),
(120, 'KERANJANG SAMPAH REGE 353 KW CORNELIUS', 'PERALATAN KEBESIHAN', '50', '12', '6', '11', 'Rendah', '-'),
(121, 'SB - 7 LUNCH KID', 'PERALATAN MAKANAN', '30', '6', '8', '12', 'Tinggi', '-'),
(122, 'NN - 85 FRONTIER BOTTLE 500 ML', 'PERALATAN MAKANAN', '25', '10', '9', '4', 'Tinggi', '-'),
(123, 'I - 17 MARINA COOLER BOX 18 S ( 16 LTR )', 'PERALATAN DAPUR', '45', '10', '15', '13', 'Rendah', '-'),
(124, 'AP - 2 THERMOS PANAS \" AIR POT \" 2 LITER', 'PERALATAN DAPUR', '31', '5', '10', '10', 'Tinggi', '-'),
(125, 'BR - 10 WIPER GLASS CLEANER', 'PERALATAN KEBERSIHAN', '38', '12', '13', '10', 'Tinggi', '-'),
(126, 'BR - 66 LIVINA BATHROOM BRUSH NO. 201', 'PERALATAN KEBERSIHAN', '35', '5', '10', '10', 'Rendah', '-'),
(127, 'PT - 6 TIFFANY CANDY POT L (1600 ML)', 'PERALATAN MAKANAN', '40', '12', '13', '14', 'Tinggi', '-'),
(128, 'R - 10 RANTANG UKIR SUSUN-4', 'PERALATAN MAKANAN', '30', '5', '10', '12', 'Tinggi', '-'),
(129, 'NA - 8 REGEN BOTTLE 1000 ML', 'PERALATAN MAKANAN', '40', '12', '14', '10', 'Tinggi', '-'),
(130, 'GL - 12 GELAS C-2 + TUTUP + SEDOTAN', 'PERALATAN MAKANAN', '45', '13', '16', '10', 'Tinggi', '-'),
(131, 'K - 1 THERMO WATER JUG 1,3 LTR', 'PERALATAN DAPUR', '35', '7', '12', '15', 'Tinggi', '-'),
(132, 'K - 7 THERMO WATER JUG 1,7 LTR', 'PERALATAN DAPUR', '45', '9', '12', '15', 'Rendah', '-'),
(133, 'BBC - 3 EMILIA FOOD CASE 270 ML', 'PERALATAN MAKANAN', '45', '7', '10', '13', 'Rendah', '-'),
(134, 'I - 15 MARINA COOLER BOX 6 S ( 5,5 LTR )', 'PERALATAN DAPUR', '36', '10', '5', '3', 'Rendah', '-'),
(135, 'PL - 8 EMBER 1/2 GL LUX + FILM', 'PERALATAN KEBERSIHAN', '25', '5', '9', '3', 'Rendah', '-'),
(136, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '7', '10', '4', 'Tinggi', '-'),
(137, 'DC - 4 TUDUNG SAJI PERSEGI', 'PERALATAN DAPUR', '35', '10', '6', '12', 'Rendah', '-'),
(138, 'MB - 15 STAR SOAP CASE 02', 'PERALATAN KEBERSIHAN', '40', '7', '12', '17', 'Tinggi', '-'),
(139, 'MUG ELEKTRIK 1.5 LION STAR NIKITA', 'PERALATAN DAPUR', '20', '4', '9', '6', 'Tinggi', '-'),
(140, 'SB - 2 SCHOOL BOX', 'PERALATAN MAKANAN', '45', '10', '13', '7', 'Rendah', '-'),
(141, 'BW - 2 MANGKOK KOCOKAN TELOR B - 20', 'PERALATAN DAPUR', '50', '14', '10', '12', 'Rendah', '-'),
(142, 'NH - 81 HYDRO BOTTLE 1500 ML', 'PERALATAN MAKANAN', '35', '9', '9', '14', 'Tinggi', '-'),
(143, 'PT - 6 TIFFANY CANDY POT L (1600 ML)', 'PERALATAN MAKANAN', '40', '12', '13', '14', 'Tinggi', '-'),
(144, 'R - 10 RANTANG UKIR SUSUN-4', 'PERALATAN MAKANAN', '30', '5', '10', '12', 'Tinggi', '-'),
(145, 'NA - 8 REGEN BOTTLE 1000 ML', 'PERALATAN MAKANAN', '40', '12', '14', '10', 'Tinggi', '-'),
(146, 'GL - 12 GELAS C-2 + TUTUP + SEDOTAN', 'PERALATAN MAKANAN', '45', '13', '16', '10', 'Tinggi', '-'),
(147, 'K - 1 THERMO WATER JUG 1,3 LTR', 'PERALATAN DAPUR', '35', '7', '12', '15', 'Tinggi', '-'),
(148, 'K - 7 THERMO WATER JUG 1,7 LTR', 'PERALATAN DAPUR', '45', '9', '12', '15', 'Rendah', '-'),
(149, 'K - 13 THERMO WATER JUG 2,5 LTR', 'PERALATAN DAPUR', '25', '5', '7', '12', 'Tinggi', '-'),
(150, 'R - 10 RANTANG UKIR SUSUN-4', 'PERALATAN MAKANAN', '30', '10', '13', '5', 'Tinggi', '-'),
(151, 'NH - 80 INFUSER CHAMP BOTTLE 820 ML', 'PERALATAN MAKANAN', '40', '6', '17', '10', 'Rendah', '-'),
(152, 'NN - 85 FRONTIER BOTTLE 500 ML', 'PERALATAN MAKANAN', '25', '10', '9', '4', 'Tinggi', '-'),
(153, 'I - 16 MARINA COOLER BOX 12 S ( 10 LTR )', 'PERALATAN DAPUR', '35', '13', '10', '6', 'Tinggi', '-'),
(154, 'GL - 34 JUNIOR MUG 240 ML + TUTUP', 'PERALATAN MAKANAN', '40', '19', '11', '6', 'Tinggi', '-'),
(155, 'BASKOM JERMAN 4423 FRIEND', 'PERALATAN DAPUR', '25', '9', '7', '6', 'Tinggi', '-'),
(156, 'GL - 15 GAYUNG AIR DELUXE', 'PERALATAN KEBERSIHAN', '35', '13', '10', '8', 'Tinggi', '-'),
(157, 'BAKING PAN 28 CM ORCHID', 'PERALATAN DAPUR', '40', '14', '10', '12', 'Tinggi', '-'),
(158, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '9', '7', '3', 'Tinggi', '-'),
(159, 'BA - 9 BASKOM 20\" DELUXE POLOS ( Ø 44 CM )', 'PERALATAN DAPUR', '35', '13', '10', '7', 'Tinggi', '-'),
(160, 'BA - 7 BASKOM 16\" DELUXE POLOS ( Ø 38 CM )', 'PERALATAN DAPUR', '40', '15', '7', '13', 'Tinggi', '-'),
(161, 'BA - 20 BASKOM U.S.A 18\" POLOS ( Ø 39 CM )', 'PERALATAN DAPUR', '25', '6', '7', '9', 'Tinggi', '-'),
(162, 'BA - 22 BASKOM U.S.A 22\" POLOS ( Ø 53 CM )', 'PERALATAN DAPUR', '40', '19', '5', '11', 'Tinggi', '-'),
(163, 'NH - 93 OLIF BOTTLE 500 ML \"TRITAN\"', 'PERALATAN MAKANAN', '45', '10', '12', '14', 'Rendah', '-'),
(164, 'NH - 98 MINIGO BOTTLE 600 ML', 'PERALATAN MAKANAN', '25', '8', '6', '9', 'Tinggi', '-'),
(165, 'BO - 3 LIVINA TOILET BRUSH NO. 103 + POT', 'PERALATAN KEBERSIHAN', '45', '13', '10', '11', 'Rendah', '-'),
(166, 'BO - 2 LIVINA TOILET BRUSH NO. 102 + POT', 'PERALATAN KEBERSIHAN', '20', '11', '3', '5', 'Tinggi', '-'),
(167, 'BMW - 4 MANGKOK 18 CM', 'PERALATAN MAKANAN', '35', '5', '10', '5', 'Rendah', '-'),
(168, 'T - 49 NAMPAN NO. 10', 'PERALATAN DAPUR', '45', '12', '15', '10', 'Rendah', '-'),
(169, 'BR - 21 LIVINA KITCHEN BRUSH NO. 21', 'PERALATAN DAPUR', '25', '6', '3', '9', 'Rendah', '-'),
(170, 'TOPLES CT 250', 'PERALATAN MAKANAN', '30', '10', '7', '5', 'Rendah', '-'),
(171, 'NN - 85 FRONTIER BOTTLE 500 ML', 'PERALATAN MAKANAN', '25', '10', '9', '4', 'Tinggi', '-'),
(172, 'I - 17 MARINA COOLER BOX 18 S ( 16 LTR )', 'PERALATAN DAPUR', '45', '10', '15', '13', 'Rendah', '-'),
(173, 'AP - 2 THERMOS PANAS \" AIR POT \" 2 LITER', 'PERALATAN DAPUR', '31', '5', '10', '10', 'Tinggi', '-'),
(174, 'BR - 10 WIPER GLASS CLEANER', 'PERALATAN KEBERSIHAN', '38', '12', '13', '10', 'Tinggi', '-'),
(175, 'BR - 66 LIVINA BATHROOM BRUSH NO. 201', 'PERALATAN KEBERSIHAN', '35', '5', '10', '10', 'Rendah', '-'),
(176, 'PT - 6 TIFFANY CANDY POT L (1600 ML)', 'PERALATAN MAKANAN', '40', '12', '13', '14', 'Tinggi', '-'),
(177, 'R - 10 RANTANG UKIR SUSUN-4', 'PERALATAN MAKANAN', '30', '5', '10', '12', 'Tinggi', '-'),
(178, 'NA - 8 REGEN BOTTLE 1000 ML', 'PERALATAN MAKANAN', '40', '12', '14', '10', 'Tinggi', '-'),
(179, 'GL - 12 GELAS C-2 + TUTUP + SEDOTAN', 'PERALATAN MAKANAN', '45', '13', '16', '10', 'Tinggi', '-'),
(180, 'K - 1 THERMO WATER JUG 1,3 LTR', 'PERALATAN DAPUR', '35', '7', '12', '15', 'Tinggi', '-'),
(181, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '7', '10', '4', 'Tinggi', '-'),
(182, 'DC - 4 TUDUNG SAJI PERSEGI', 'PERALATAN DAPUR', '35', '10', '6', '12', 'Rendah', '-'),
(183, 'MB - 15 STAR SOAP CASE 02', 'PERALATAN KEBERSIHAN', '40', '7', '12', '17', 'Tinggi', '-'),
(184, 'MUG ELEKTRIK 1.5 LION STAR NIKITA', 'PERALATAN DAPUR', '20', '4', '9', '6', 'Tinggi', '-'),
(185, 'SB - 2 SCHOOL BOX', 'PERALATAN MAKANAN', '45', '10', '13', '7', 'Rendah', '-'),
(186, 'BW - 2 MANGKOK KOCOKAN TELOR B - 20', 'PERALATAN DAPUR', '50', '14', '10', '12', 'Rendah', '-'),
(187, 'NH - 81 HYDRO BOTTLE 1500 ML', 'PERALATAN MAKANAN', '35', '9', '9', '14', 'Tinggi', '-'),
(188, 'PP - 35 TOPLES HUGO ROUND JAR 105 ( 8 LT)', 'PERALATAN DAPUR', '50', '9', '15', '13', 'Rendah', '-'),
(189, 'BR - 10 WIPER GLASS CLEANER', 'PERALATAN KEBERSIHAN', '38', '12', '13', '10', 'Tinggi', '-'),
(190, 'BR - 66 LIVINA BATHROOM BRUSH NO. 201', 'PERALATAN KEBERSIHAN', '35', '5', '10', '10', 'Rendah', '-'),
(191, 'PT - 6 TIFFANY CANDY POT L (1600 ML)', 'PERALATAN MAKANAN', '40', '12', '13', '14', 'Tinggi', '-'),
(192, 'R - 10 RANTANG UKIR SUSUN-4', 'PERALATAN MAKANAN', '30', '5', '10', '12', 'Tinggi', '-'),
(193, 'NA - 8 REGEN BOTTLE 1000 ML', 'PERALATAN MAKANAN', '40', '12', '14', '10', 'Tinggi', '-'),
(194, 'GL - 12 GELAS C-2 + TUTUP + SEDOTAN', 'PERALATAN MAKANAN', '45', '13', '16', '10', 'Tinggi', '-'),
(195, 'K - 1 THERMO WATER JUG 1,3 LTR', 'PERALATAN DAPUR', '35', '7', '12', '15', 'Tinggi', '-'),
(196, 'K - 7 THERMO WATER JUG 1,7 LTR', 'PERALATAN DAPUR', '45', '9', '12', '15', 'Rendah', '-'),
(197, 'BBC - 3 EMILIA FOOD CASE 270 ML', 'PERALATAN MAKANAN', '45', '7', '10', '13', 'Rendah', '-'),
(198, 'I - 15 MARINA COOLER BOX 6 S ( 5,5 LTR )', 'PERALATAN DAPUR', '36', '10', '5', '3', 'Rendah', '-'),
(199, 'PL - 8 EMBER 1/2 GL LUX + FILM', 'PERALATAN KEBERSIHAN', '25', '5', '9', '3', 'Rendah', '-'),
(200, 'PT - 6 TIFFANY CANDY POT L (1600 ML)', 'PERALATAN MAKANAN', '40', '12', '13', '14', 'Tinggi', '-'),
(201, 'R - 10 RANTANG UKIR SUSUN-4', 'PERALATAN MAKANAN', '30', '5', '10', '12', 'Tinggi', '-'),
(202, 'NA - 8 REGEN BOTTLE 1000 ML', 'PERALATAN MAKANAN', '40', '12', '14', '10', 'Tinggi', '-'),
(203, 'GL - 12 GELAS C-2 + TUTUP + SEDOTAN', 'PERALATAN MAKANAN', '45', '13', '16', '10', 'Tinggi', '-'),
(204, 'K - 1 THERMO WATER JUG 1,3 LTR', 'PERALATAN DAPUR', '35', '7', '12', '15', 'Tinggi', '-'),
(205, 'PL - 8 EMBER 1/2 GL LUX + FILM', 'PERALATAN KEBERSIHAN', '25', '5', '9', '3', 'Rendah', '-'),
(206, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '7', '10', '4', 'Tinggi', '-'),
(207, 'DC - 4 TUDUNG SAJI PERSEGI', 'PERALATAN DAPUR', '35', '10', '6', '12', 'Rendah', '-'),
(208, 'MB - 15 STAR SOAP CASE 02', 'PERALATAN KEBERSIHAN', '40', '7', '12', '17', 'Tinggi', '-'),
(209, 'MUG ELEKTRIK 1.5 LION STAR NIKITA', 'PERALATAN DAPUR', '20', '4', '9', '6', 'Tinggi', '-'),
(210, 'SB - 2 SCHOOL BOX', 'PERALATAN MAKANAN', '45', '10', '13', '7', 'Rendah', '-'),
(211, 'BW - 2 MANGKOK KOCOKAN TELOR B - 20', 'PERALATAN DAPUR', '50', '14', '10', '12', 'Rendah', '-'),
(212, 'GL - 34 JUNIOR MUG 240 ML + TUTUP', 'PERALATAN MAKANAN', '40', '19', '11', '6', 'Tinggi', '-'),
(213, 'BASKOM JERMAN 4423 FRIEND', 'PERALATAN DAPUR', '25', '9', '7', '6', 'Tinggi', '-'),
(214, 'GL - 15 GAYUNG AIR DELUXE', 'PERALATAN KEBERSIHAN', '35', '13', '10', '8', 'Tinggi', '-'),
(215, 'BAKING PAN 28 CM ORCHID', 'PERALATAN DAPUR', '40', '14', '10', '12', 'Tinggi', '-'),
(216, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '9', '7', '3', 'Tinggi', '-'),
(217, 'BA - 9 BASKOM 20\" DELUXE POLOS ( Ø 44 CM )', 'PERALATAN DAPUR', '35', '13', '10', '7', 'Tinggi', '-'),
(218, 'BA - 7 BASKOM 16\" DELUXE POLOS ( Ø 38 CM )', 'PERALATAN DAPUR', '40', '15', '7', '13', 'Tinggi', '-'),
(219, 'DC - 4 TUDUNG SAJI PERSEGI', 'PERALATAN DAPUR', '35', '10', '6', '12', 'Rendah', '-'),
(220, 'MB - 15 STAR SOAP CASE 02', 'PERALATAN KEBERSIHAN', '40', '7', '12', '17', 'Tinggi', '-'),
(221, 'MUG ELEKTRIK 1.5 LION STAR NIKITA', 'PERALATAN DAPUR', '20', '4', '9', '6', 'Tinggi', '-'),
(222, 'SB - 2 SCHOOL BOX', 'PERALATAN MAKANAN', '45', '10', '13', '7', 'Rendah', '-'),
(223, 'BW - 2 MANGKOK KOCOKAN TELOR B - 20', 'PERALATAN DAPUR', '50', '14', '10', '12', 'Rendah', '-'),
(224, 'NH - 81 HYDRO BOTTLE 1500 ML', 'PERALATAN MAKANAN', '35', '9', '9', '14', 'Tinggi', '-'),
(225, 'PT - 6 TIFFANY CANDY POT L (1600 ML)', 'PERALATAN MAKANAN', '40', '12', '13', '14', 'Tinggi', '-'),
(226, ' WATER JUG 4,1 LTR', 'PERALATAN DAPUR', '40', '10', '15', '9', 'Tinggi', '-'),
(227, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '7', '10', '4', 'Tinggi', '-'),
(228, 'DC - 4 TUDUNG SAJI PERSEGI', 'PERALATAN DAPUR', '35', '10', '6', '12', 'Rendah', '-'),
(229, 'MB - 15 STAR SOAP CASE 02', 'PERALATAN KEBERSIHAN', '40', '7', '12', '17', 'Tinggi', '-'),
(230, 'MUG ELEKTRIK 1.5 LION STAR NIKITA', 'PERALATAN DAPUR', '20', '4', '9', '6', 'Tinggi', '-'),
(231, 'SB - 2 SCHOOL BOX', 'PERALATAN MAKANAN', '45', '10', '13', '7', 'Rendah', '-'),
(232, 'BW - 2 MANGKOK KOCOKAN TELOR B - 20', 'PERALATAN DAPUR', '50', '14', '10', '12', 'Rendah', '-'),
(233, 'NH - 81 HYDRO BOTTLE 1500 ML', 'PERALATAN MAKANAN', '35', '9', '9', '14', 'Tinggi', '-'),
(234, 'PP - 35 TOPLES HUGO ROUND JAR 105 ( 8 LT)', 'PERALATAN DAPUR', '50', '9', '15', '13', 'Rendah', '-'),
(235, 'KERANJANG SAMPAH REGE 353 KW CORNELIUS', 'PERALATAN KEBESIHAN', '50', '12', '6', '11', 'Rendah', '-'),
(236, 'SB - 7 LUNCH KID', 'PERALATAN MAKANAN', '30', '6', '8', '12', 'Tinggi', '-'),
(237, 'NN - 85 FRONTIER BOTTLE 500 ML', 'PERALATAN MAKANAN', '25', '10', '9', '4', 'Tinggi', '-'),
(238, 'GL - 15 GAYUNG AIR DELUXE', 'PERALATAN KEBERSIHAN', '35', '13', '10', '8', 'Tinggi', '-'),
(239, 'BAKING PAN 28 CM ORCHID', 'PERALATAN DAPUR', '40', '14', '10', '12', 'Tinggi', '-'),
(240, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '9', '7', '3', 'Tinggi', '-'),
(241, 'BA - 9 BASKOM 20\" DELUXE POLOS ( Ø 44 CM )', 'PERALATAN DAPUR', '35', '13', '10', '7', 'Tinggi', '-'),
(242, 'BA - 7 BASKOM 16\" DELUXE POLOS ( Ø 38 CM )', 'PERALATAN DAPUR', '40', '15', '7', '13', 'Tinggi', '-'),
(243, 'DC - 4 TUDUNG SAJI PERSEGI', 'PERALATAN DAPUR', '35', '10', '6', '12', 'Rendah', '-'),
(244, 'NH - 81 HYDRO BOTTLE 1500 ML', 'PERALATAN MAKANAN', '35', '9', '9', '14', 'Tinggi', '-'),
(245, 'PT - 6 TIFFANY CANDY POT L (1600 ML)', 'PERALATAN MAKANAN', '40', '12', '13', '14', 'Tinggi', '-'),
(246, ' WATER JUG 4,1 LTR', 'PERALATAN DAPUR', '40', '10', '15', '9', 'Tinggi', '-'),
(247, 'GL - 3 GAYUNG AIR POLOS', 'PERALATAN KEBERSIHAN', '25', '7', '10', '4', 'Tinggi', '-'),
(248, 'DC - 4 TUDUNG SAJI PERSEGI', 'PERALATAN DAPUR', '35', '10', '6', '12', 'Rendah', '-'),
(249, 'MB - 15 STAR SOAP CASE 02', 'PERALATAN KEBERSIHAN', '40', '7', '12', '17', 'Tinggi', '-'),
(250, 'MUG ELEKTRIK 1.5 LION STAR NIKITA', 'PERALATAN DAPUR', '20', '4', '9', '6', 'Tinggi', '-');

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
(1, 28, 42, 22, 34);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT untuk tabel `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
