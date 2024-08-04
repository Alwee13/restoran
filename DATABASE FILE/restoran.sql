-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2024 at 04:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(200) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `email_admin` varchar(200) NOT NULL,
  `password_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `password_admin`) VALUES
('10e0b6dc958adfb5b094d8935a13aeadbe783c25', 'System Admin', 'admin@mail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(20) NOT NULL,
  `nama_kasir` varchar(200) NOT NULL,
  `nomor_kasir` varchar(200) NOT NULL,
  `email_kasir` varchar(200) NOT NULL,
  `password_kasir` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `nomor_kasir`, `email_kasir`, `password_kasir`, `created_at`) VALUES
(4, 'panji', 'PYSR-3278', 'panji@gmail.com', 'a9a4c7ffaddade64bcac179e6537f026dc0a0c0a', '2024-07-31 10:34:52.769338'),
(5, 'kasir', 'UWYM-8579', 'kasir@gmail.com', '22a44e2ff721590111588f73cbb865dd8079d9ab', '2024-07-31 18:17:46.755473'),
(8, 'wawi', 'EVCH-9123', 'wawi@gmail.com', '09093be7fc53dede9d34941e8277fe61abb27beb', '2024-08-01 08:09:21.950766');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(200) NOT NULL,
  `kode_menu` varchar(200) NOT NULL,
  `nama_menu` varchar(200) NOT NULL,
  `gambar_menu` varchar(200) NOT NULL,
  `deskripsi_menu` longtext NOT NULL,
  `harga_menu` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `kode_menu`, `nama_menu`, `gambar_menu`, `deskripsi_menu`, `harga_menu`, `created_at`) VALUES
('89beaac6fa', 'XQPW-4873', 'Ocha', 'OCHA.jpg', 'afafa', '10000', '2024-08-03 14:50:45.210570'),
('a986a59b10', 'MVCS-3492', 'Blue Ocean', 'BLUE-OCEAN.jpg', 'afafafaefafafafafa', '20000', '2024-08-02 11:53:23.020829'),
('cede744f49', 'JKLU-7109', 'Unagi Shrimp Roll ', 'unagi.jpg', 'unagiiiiiiii', '50000', '2024-08-01 07:44:11.569140');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(200) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `no_telp` varchar(200) NOT NULL,
  `email_pelanggan` varchar(200) NOT NULL,
  `password_pelanggan` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_telp`, `email_pelanggan`, `password_pelanggan`, `created_at`) VALUES
('01cbcbd56ea3', 'aaaa', '44444', 'adada@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '2024-08-01 07:14:51.523116'),
('b24f9b0cbc0a', 'Rafi Alwi', '8395835', 'rafi@gmail.com', '8fdef279bfdc4377b3f433b6304528bd5f4e06f1', '2024-07-30 14:32:14.163885'),
('ce12b86a9ae4', 'farhan', '0000000', 'farhan@gmail.com', 'e51b930fb38ca4a1ab1139ac7d8e9dd5bdf9eb14', '2024-08-03 14:38:25.407549');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(200) NOT NULL,
  `kode_pembayaran` varchar(200) DEFAULT NULL,
  `kode_pesanan` varchar(200) NOT NULL,
  `id_pelanggan` varchar(200) NOT NULL,
  `harga_pembayaran` varchar(200) NOT NULL,
  `metode_pembayaran` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(200) NOT NULL,
  `kode_pesanan` varchar(200) NOT NULL,
  `id_pelanggan` varchar(200) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `id_menu` varchar(200) NOT NULL,
  `nama_menu` varchar(200) NOT NULL,
  `harga_menu` varchar(200) NOT NULL,
  `jumlah_menu` varchar(200) NOT NULL,
  `status_pesanan` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `status_menu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reset_pw`
--

CREATE TABLE `reset_pw` (
  `reset_id` int(20) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reset_pw`
--

INSERT INTO `reset_pw` (`reset_id`, `reset_code`, `reset_token`, `reset_email`, `reset_status`, `created_at`) VALUES
(1, '63KU9QDGSO', '4ac4cee0a94e82a2aedc311617aa437e218bdf68', 'sysadmin@icofee.org', 'Pending', '2020-08-17 15:20:14.318643');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `order` (`kode_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `ProductOrder` (`id_menu`),
  ADD KEY `PesananPelanggan` (`id_pelanggan`) USING BTREE;

--
-- Indexes for table `reset_pw`
--
ALTER TABLE `reset_pw`
  ADD PRIMARY KEY (`reset_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reset_pw`
--
ALTER TABLE `reset_pw`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `CustomerOrder` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ProductOrder` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
