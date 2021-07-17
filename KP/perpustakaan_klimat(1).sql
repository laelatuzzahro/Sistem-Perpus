-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2019 at 07:29 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_klimat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `pass`) VALUES
('perpusklimat', 'klimat');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `unit_kerja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `nip`, `unit_kerja`) VALUES
('IA01', 'yuyun', '87979 7979 ', 'observasi'),
('IA02', 'septi', '768 669', 'teknisi'),
('IA03', 'zahro', '76 786786 76876', 'teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `tanggal_masuk` date NOT NULL,
  `kode` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `universitas` text NOT NULL,
  `judul` text NOT NULL,
  `cover` varchar(50) NOT NULL,
  `tglsuratpernyataan` date NOT NULL,
  `tanggal_kesanggupan` date NOT NULL,
  `tanggal_penyerahan` date NOT NULL,
  `rak` varchar(5) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia','','') NOT NULL,
  `abstrak` text NOT NULL,
  `penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(10) NOT NULL,
  `tglpinjam` date NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `judul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_peminjaman`
--

CREATE TABLE `riwayat_peminjaman` (
  `id_pinjam` int(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kodebuku` varchar(10) NOT NULL,
  `judul` text NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_peminjaman`
--

INSERT INTO `riwayat_peminjaman` (`id_pinjam`, `tgl_pinjam`, `id_anggota`, `nama`, `kodebuku`, `judul`, `tgl_kembali`) VALUES
(1, '2019-01-01', 'IA02', 'Septi', 'PD01SNM', 'Survei studio perencanaan 3', '2019-01-31'),
(2, '2019-01-02', 'IA03', 'zahro', 'PD02SNM', 'Teknis Pengelolaan Pantai Bugel untuk Mengurangi Laju Abrasi di Desa Bugel Kecamatan Panjatan Kabupaten Kulonprogo', '2019-01-31'),
(3, '2019-01-11', 'IA02', 'niken', 'PD01SNM', 'Survei studio perencanaan 3', '2019-01-18'),
(4, '2019-01-10', 'IA03', 'zaza', 'PD03SNM', 'sdfdgfd', '2019-01-17'),
(5, '2019-02-13', 'IA01', 'asd', 'PD01SNM', 'Survei studio perencanaan 3', '2019-02-21'),
(6, '2019-03-06', 'IA01', 'ghkj', 'PD02SNM', 'Teknis Pengelolaan Pantai Bugel untuk Mengurangi Laju Abrasi di Desa Bugel Kecamatan Panjatan Kabupaten Kulonprogo', '2019-02-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  MODIFY `id_pinjam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
