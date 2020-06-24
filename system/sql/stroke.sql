-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Apr 2019 pada 13.25
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stroke`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `password`, `username`, `email`) VALUES
(2, 'sandra', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'sandrades@gmail.com'),
(3, 'wava', '21232f297a57a5a743894a0e4a801fc3', 'wava', 'wava@gmail.com'),
(5, 'sdm', '12345', 'sandes', 'sandrade.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `kode_diagnosa` int(5) NOT NULL,
  `nama_diagnosa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`kode_diagnosa`, `nama_diagnosa`) VALUES
(1, 'Stroke Hemoragik'),
(2, 'Stroke Iskemik'),
(3, 'Stroke, not specifie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` int(5) NOT NULL,
  `nama_gejala` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bobot` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`, `keterangan`, `bobot`) VALUES
(1, 'Muntah', '', 3),
(2, 'Bicara Pelo', '', 5),
(3, 'Badan Lemas', '', 1),
(4, 'usia diatas 50 tahun', '', 1),
(5, 'Kelemahan separuh anggota gerak satu sisi (kanan a', '', 5),
(6, 'Pusing', '', 1),
(7, 'Penurunan Kesadaran', '', 5),
(8, 'Nyeri Kepala', '', 3),
(9, 'Hipertensi', '', 3),
(10, 'Kesulitan berbicara dan memahami pembicaraan orang', '', 5),
(11, 'Jatuh', '', 1),
(12, 'Nafsu Makan Turun', '', 1),
(13, 'Kesulitan berbicara dan memahami pembicaraan orang', '', 5),
(14, 'Berkeringat Banyak', '', 1),
(15, 'Nyeri Menjalar pada Anggota Gerak', '', 1),
(16, 'Nyeri Ulu Hati', '', 1),
(17, 'Berdebar', '', 1),
(18, 'Sakit Perut', '', 1),
(19, 'Kejang', '', 5),
(20, 'Kehilangan Pengelihatan Mendadak', '', 3),
(21, 'Ngorok', '', 1),
(22, 'Kelemahan kedua kaki atau keempat anggota gerak', '', 1),
(23, 'Sakit Kepala Hebat', '', 3),
(24, 'Gangguan sensorik pada salah satu sisi wajah, leng', '', 3),
(25, 'Muka Pencong', '', 3),
(26, 'Riwayat Kencing Manis', '', 3),
(27, 'Penyakit Jantung Koroner', '', 3),
(28, 'Kesulitan Menelan', '', 3),
(29, 'Kesulitan Menulis dan Membaca', '', 1),
(30, 'Kehilangan Keseimbangan Tubuh', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasus`
--

CREATE TABLE `kasus` (
  `id_kasus` int(10) NOT NULL,
  `kode_diagnosa` int(5) NOT NULL,
  `kode_gejala` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasus`
--

INSERT INTO `kasus` (`id_kasus`, `kode_diagnosa`, `kode_gejala`) VALUES
(1, 2, 0),
(5, 1, 0),
(6, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `kode_tindakan` int(50) NOT NULL,
  `nama_tindakan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`kode_tindakan`, `nama_tindakan`) VALUES
(1, 'Cek Darah Lengkap'),
(2, 'Ct Scan	'),
(6, 'Pasang Kateter'),
(7, 'Pasang Infus'),
(8, 'EKG'),
(9, 'Monitor GCS'),
(10, 'Monitor input dan output cairan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`kode_diagnosa`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id_kasus`),
  ADD KEY `kode_diagnosa` (`kode_diagnosa`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`kode_tindakan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `kode_diagnosa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `kode_gejala` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `kasus`
--
ALTER TABLE `kasus`
  MODIFY `id_kasus` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `kode_tindakan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kasus`
--
ALTER TABLE `kasus`
  ADD CONSTRAINT `kasus_ibfk_1` FOREIGN KEY (`kode_diagnosa`) REFERENCES `diagnosa` (`kode_diagnosa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
