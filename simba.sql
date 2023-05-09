-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 12:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `iduser` int(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Pegawai','Admin','Supplier','Arsip','Arsip Sekretariat','Arsip Anggaran','Arsip Perbendaharaan','Arsip Aset','Arsip Akuntansi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftaruser`
--

CREATE TABLE `daftaruser` (
  `no_urut` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datasupplier`
--

CREATE TABLE `datasupplier` (
  `idsupplier` int(11) NOT NULL,
  `namasupplier` varchar(50) NOT NULL,
  `awalkontrak` date NOT NULL,
  `akhirkontrak` date NOT NULL,
  `nokontrak` varchar(50) NOT NULL,
  `nilaikontrak` varchar(50) NOT NULL,
  `kodebarangsup` varchar(50) NOT NULL,
  `namabarangsup` varchar(50) NOT NULL,
  `ktgbarang` varchar(50) NOT NULL,
  `hargabarang` int(11) NOT NULL,
  `jumlahbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_arsip`
--

CREATE TABLE `data_arsip` (
  `idberkas` bigint(11) NOT NULL,
  `namaberkas` varchar(200) NOT NULL,
  `nm_pengunggah` varchar(99) NOT NULL,
  `wkt_unggah` date NOT NULL,
  `berkas` varchar(200) NOT NULL,
  `keterangan_berkas` varchar(200) NOT NULL,
  `bidang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(45) NOT NULL,
  `kodebarang` varchar(50) NOT NULL,
  `ktgbarang` varchar(50) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL,
  `tanggalkeluar` date NOT NULL,
  `penerimabk` varchar(100) NOT NULL,
  `bahanrangkabarangbk` varchar(50) NOT NULL,
  `kondisibarangbk` varchar(30) NOT NULL,
  `sumberdanabk` varchar(30) NOT NULL,
  `tahunbk` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `hargasatuan` int(11) NOT NULL,
  `hargatotalbk` int(11) NOT NULL,
  `gambarbarangbk` longblob NOT NULL,
  `keteranganbk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(45) NOT NULL,
  `kodebarang` varchar(50) NOT NULL,
  `ktgbarang` varchar(50) NOT NULL,
  `spesifikasi` varchar(90) NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `penerimabm` varchar(100) NOT NULL,
  `bahanrangkabarangbm` varchar(50) NOT NULL,
  `kondisibarangbm` varchar(20) NOT NULL,
  `sumberdanabm` varchar(20) NOT NULL,
  `tahunbm` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `hargasatuan` int(11) NOT NULL,
  `hargatotalbm` int(11) NOT NULL,
  `gambarbarangbm` longblob NOT NULL,
  `keteranganbm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `idreq` int(11) NOT NULL,
  `waktu` date NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(30) NOT NULL,
  `jumlah_permintaan` int(20) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `validasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namacv` varchar(50) NOT NULL,
  `kodebarang` varchar(50) NOT NULL,
  `ktgbarang` varchar(50) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `bahanrangkabarang` varchar(30) NOT NULL,
  `sumberdana` varchar(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `kondisibarang` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `hargasatuan` int(11) NOT NULL,
  `hargatotal` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `gambar` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `datasupplier`
--
ALTER TABLE `datasupplier`
  ADD PRIMARY KEY (`kodebarangsup`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`idreq`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `iduser` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
