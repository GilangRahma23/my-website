-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 03:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `keterangan` char(1) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `nip`, `keterangan`, `alasan`, `bukti`, `waktu`) VALUES
(7, 999, 'S', 'sakti', '999_20241216_084427.jpg', '2024-12-16 08:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `detail_gaji`
--

CREATE TABLE `detail_gaji` (
  `id_detail_gaji` int(11) NOT NULL,
  `no_slipgaji` int(11) NOT NULL,
  `id_kehadiran` int(11) NOT NULL,
  `id_potongan` int(11) NOT NULL,
  `total_kehadiran` varchar(8) NOT NULL,
  `total_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `no_slipgaji` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `bulan` int(11) NOT NULL,
  `gaji_kotor` int(11) NOT NULL,
  `gaji_bersih` int(11) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`no_slipgaji`, `nip`, `tgl_gaji`, `bulan`, `gaji_kotor`, `gaji_bersih`, `status`) VALUES
(40, 666, '2024-11-30', 11, 4000000, 3300000, 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `nm_golongan` text NOT NULL,
  `pend_akhir` varchar(8) NOT NULL,
  `gapok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nm_golongan`, `pend_akhir`, `gapok`) VALUES
(43357, 'A', 'Magister', 4000000);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `jmlh_kehadiran` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `username_m` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`username_m`, `password`) VALUES
('manager', 'fae0b27c451c728867a567e8c1bb4e53');

-- --------------------------------------------------------

--
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `id_potongan` int(11) NOT NULL,
  `potongan_bpjs` int(11) NOT NULL,
  `potongan_kehadiran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `potongan_bpjs`, `potongan_kehadiran`) VALUES
(13, 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `nip`, `waktu`) VALUES
(1, 666, '2024-11-01 08:17:39'),
(2, 666, '2024-11-02 08:46:08'),
(4, 666, '2024-11-04 08:17:39'),
(5, 666, '2024-11-05 08:17:39'),
(6, 666, '2024-11-06 08:17:39'),
(7, 666, '2024-11-07 08:17:39'),
(8, 666, '2024-11-08 08:17:39'),
(9, 666, '2024-11-09 08:17:39'),
(11, 666, '2024-11-11 08:17:39'),
(12, 666, '2024-11-12 08:17:39'),
(13, 666, '2024-11-13 08:17:39'),
(14, 666, '2024-11-14 08:17:39'),
(15, 666, '2024-11-15 08:17:39'),
(16, 666, '2024-11-16 08:17:39'),
(18, 666, '2024-11-18 08:50:31'),
(19, 666, '2024-11-19 08:17:39'),
(20, 666, '2024-11-20 08:17:39'),
(21, 666, '2024-11-21 08:17:39'),
(22, 666, '2024-11-22 08:17:39'),
(23, 666, '2024-11-23 08:17:39'),
(25, 666, '2024-11-25 00:00:00'),
(30, 666, '2024-11-30 08:17:39'),
(41, 666, '2024-12-16 00:00:00'),
(42, 777, '2024-12-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

CREATE TABLE `staf` (
  `nip` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `nm_staf` text NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `tgl_masuk_kerja` date NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`nip`, `password`, `id_golongan`, `nm_staf`, `alamat`, `tgl_masuk_kerja`, `no_telp`) VALUES
(666, 'fae0b27c451c728867a567e8c1bb4e53', 43357, 'Aji', 'Gedongan RT 01/RW 01, Purbayan, Kotagede', '2024-11-18', '089636418040'),
(777, 'f1c1592588411002af340cbaedd6fc33', 43357, 'Citra', 'Jalan Baik ', '2024-11-01', '087738883554'),
(888, '0a113ef6b61820daa5611c870ed8d5ee', 43357, 'jojjok', 'jogja', '2024-12-16', '089922299931'),
(999, 'b706835de79a2b4e80506f582af3676a', 43357, 'koeo', 'sleman', '2024-12-16', '123092183');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'aji', 'fae0b27c451c728867a567e8c1bb4e53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_gaji`
--
ALTER TABLE `detail_gaji`
  ADD PRIMARY KEY (`id_detail_gaji`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`no_slipgaji`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`username_m`);

--
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_golongan` (`id_golongan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_gaji`
--
ALTER TABLE `detail_gaji`
  MODIFY `id_detail_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `no_slipgaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43358;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=565672;

--
-- AUTO_INCREMENT for table `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `staf`
--
ALTER TABLE `staf`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
