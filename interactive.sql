-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Sep 2020 pada 08.54
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interactive`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `depart` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `uid`, `password`, `depart`) VALUES
(4, 'admin', 'admin', 'admin', 'Teknik Elektro Manufaktur'),
(8, 'Rangga Ramadhan', 'angga', 'admin', 'Teknik Elektronika'),
(9, 'Rachmat Fauzan', 'rachmat', 'admin', 'Teknik Informatika'),
(10, 'Euis Putri', 'euis', 'admin', 'Teknik Perawatan Pesawat Udara'),
(11, 'Yusril Wiranda', 'yusril', 'admin', 'Administrasi Bisnis Terapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `psw` varchar(50) NOT NULL,
  `depart` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `lastactivity` datetime NOT NULL DEFAULT current_timestamp(),
  `logout` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `psw`, `depart`, `email`, `nim`, `lastactivity`, `logout`) VALUES
(25, 'awaludin jaeni', 'admin', 'Teknik Informatika', 'awaludinjaeni@polibatam.ac.id', '3311801033', '2020-09-19 13:53:02', '2020-09-19 13:53:12'),
(28, 'abdurrafi naufal ', 'admin3', 'Teknik Informatika', 'rafiinaufal@tfme.ac.id', '3311801039', '2020-09-17 09:54:41', '2020-09-17 09:55:44'),
(30, 'rachmat fauzan', 'admin', 'Teknik Informatika', 'rachmatfauzan07@gmail.com', '3311801036', '2020-09-16 12:00:50', '2020-09-16 12:01:59'),
(37, 'axel agatha ibrahim', 'admin', 'Teknik Informatika', 'admin@tfme.ac.id', '3311801035', '2020-09-15 21:39:30', '2020-09-16 08:56:55'),
(39, 'yudhi arma', 'admin', 'Teknik Informatika', 'yudiarma87@gmai.com', '3311801031', '2020-09-16 15:01:07', '2020-09-16 15:03:29'),
(40, 'aji ardiansyah', 'admin', 'Teknik Elektronika', 'admin@gmail.com', '3311801056', '2020-09-15 10:21:35', '2020-09-16 08:56:55'),
(41, 'andela ade putra', 'admin', 'Teknik Elektronika', 'admin@tfme.polibatam.ac.id', '3311801032', '2020-09-16 10:09:02', '2020-09-16 10:11:45'),
(42, 'resa pj', 'resapj00', 'Teknik Multimedia dan Jaringan', 'resapj02@gmail.com', '4311701033', '2020-09-16 09:35:07', '2020-09-16 09:35:41'),
(43, 'faradina perdana jodanayang', '123', 'Teknik Multimedia dan Jaringan', 'faradinapj19@gmail.com', '4311701021', '2020-09-16 15:06:03', '2020-09-16 15:06:38'),
(44, 'wina anca', 'admin', 'Teknik Informatika', 'arifangaul87@gmail.com', '3311801055', '2020-09-17 09:12:52', '2020-09-17 09:13:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
