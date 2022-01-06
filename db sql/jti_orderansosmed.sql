-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 03:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jti_orderansosmed`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_via`
--

CREATE TABLE `payment_via` (
  `payvia_id` int(11) NOT NULL,
  `payvia_nama` text NOT NULL,
  `payvia_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_via`
--

INSERT INTO `payment_via` (`payvia_id`, `payvia_nama`, `payvia_ket`) VALUES
(1, 'TUNAI', ''),
(2, 'BCA - 0900 732 732', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` bigint(20) NOT NULL,
  `sale_tgl` datetime NOT NULL,
  `sale_nama` text NOT NULL,
  `sale_hp` text NOT NULL,
  `sale_alamat` text NOT NULL,
  `sale_deskripsi` text NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `hargabarang` int(255) NOT NULL,
  `jumlahbarang` int(255) NOT NULL,
  `sale_dp_tgl` datetime DEFAULT NULL,
  `sale_dp_nom` varchar(21) DEFAULT '0',
  `sale_dp_via` int(1) NOT NULL DEFAULT 1,
  `sale_lunas_tgl` datetime DEFAULT NULL,
  `sale_lunas_nom` varchar(21) NOT NULL DEFAULT '0',
  `sale_lunas_via` int(1) NOT NULL DEFAULT 1,
  `sale_kirim_tgl` datetime DEFAULT NULL,
  `sale_kirim_nom` varchar(21) NOT NULL DEFAULT '0',
  `sale_kirim_via` int(2) NOT NULL DEFAULT 0,
  `sale_kirim_resi` text NOT NULL,
  `sale_kirim_diterima` int(1) NOT NULL DEFAULT 0,
  `sale_refund_nom` varchar(21) NOT NULL DEFAULT '0',
  `sale_refund_tgl` datetime DEFAULT NULL,
  `sale_refund_ket` text NOT NULL,
  `sale_ttl_bayar` varchar(21) NOT NULL DEFAULT '0',
  `sale_user_id` int(11) NOT NULL,
  `sale_at_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `sale_at_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `sale_deleted` int(1) NOT NULL DEFAULT 0,
  `sale_deleted_by` int(11) NOT NULL DEFAULT 0,
  `sale_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sale_tgl`, `sale_nama`, `sale_hp`, `sale_alamat`, `sale_deskripsi`, `namabarang`, `hargabarang`, `jumlahbarang`, `sale_dp_tgl`, `sale_dp_nom`, `sale_dp_via`, `sale_lunas_tgl`, `sale_lunas_nom`, `sale_lunas_via`, `sale_kirim_tgl`, `sale_kirim_nom`, `sale_kirim_via`, `sale_kirim_resi`, `sale_kirim_diterima`, `sale_refund_nom`, `sale_refund_tgl`, `sale_refund_ket`, `sale_ttl_bayar`, `sale_user_id`, `sale_at_created_date`, `sale_at_updated_date`, `sale_deleted`, `sale_deleted_by`, `sale_deleted_at`) VALUES
(1, '2022-01-06 02:57:37', 'Zidane', '081', '', '', '', 0, 0, '2022-01-06 02:57:37', '0', 1, '2022-01-06 02:57:37', '0', 1, '2022-01-06 02:57:37', '0', 0, '', 0, '0', '2022-01-06 02:57:37', '', '0', 0, '2022-01-06 01:58:00', '2022-01-06 01:58:00', 0, 0, '2022-01-06 02:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `item_id` bigint(20) NOT NULL,
  `item_sales_id` bigint(20) NOT NULL,
  `item_deskripsi` text NOT NULL,
  `item_photo_path` text DEFAULT NULL,
  `item_jual_nom` varchar(21) NOT NULL DEFAULT '0',
  `item_hpp_nom` varchar(21) NOT NULL DEFAULT '0',
  `item_po_marking` int(1) NOT NULL DEFAULT 0,
  `item_po_req_tgl` datetime DEFAULT NULL,
  `item_po_masuk` int(1) NOT NULL DEFAULT 0,
  `item_kirim_tgl` datetime DEFAULT NULL,
  `item_kirim_via` int(2) NOT NULL DEFAULT 0,
  `item_kirim_resi` text NOT NULL,
  `item_kirim_diterima` int(1) NOT NULL DEFAULT 0,
  `item_komplain` int(1) NOT NULL DEFAULT 0,
  `item_komplain_tgl` datetime DEFAULT NULL,
  `item_komplain_reason` text NOT NULL,
  `item_refund_nom` varchar(21) NOT NULL DEFAULT '0',
  `item_refund_tgl` datetime DEFAULT NULL,
  `item_refund_ket` text NOT NULL,
  `item_status` int(1) NOT NULL DEFAULT 0,
  `item_user_id` int(11) NOT NULL,
  `item_at_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_at_updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `z_status`
--

CREATE TABLE `z_status` (
  `sts_id` int(11) NOT NULL,
  `sts_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `z_status`
--

INSERT INTO `z_status` (`sts_id`, `sts_nama`) VALUES
(1, 'Pending'),
(2, 'Proses'),
(3, 'Pengiriman'),
(4, 'Complete'),
(5, 'Cancel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_via`
--
ALTER TABLE `payment_via`
  ADD PRIMARY KEY (`payvia_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `z_status`
--
ALTER TABLE `z_status`
  ADD PRIMARY KEY (`sts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_via`
--
ALTER TABLE `payment_via`
  MODIFY `payvia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `z_status`
--
ALTER TABLE `z_status`
  MODIFY `sts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
