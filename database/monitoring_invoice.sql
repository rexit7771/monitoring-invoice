-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 06:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `id_invoice` varchar(150) NOT NULL,
  `nominal` varchar(150) DEFAULT NULL,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `kategori` varchar(10) NOT NULL,
  `tgl_resepsionis_terima` date DEFAULT NULL,
  `tgl_sign_pp_invoice` date DEFAULT NULL,
  `tgl_input_pr_sap` date DEFAULT NULL,
  `tgl_approve_pr_direksi` date DEFAULT NULL,
  `tgl_invoice_hcm_ke_finance` date DEFAULT NULL,
  `tgl_email_ke_ga` date DEFAULT NULL,
  `tgl_ses_user` date DEFAULT NULL,
  `tgl_rilis_ses_user` date DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `id_invoice`, `nominal`, `nama_perusahaan`, `keterangan`, `kategori`, `tgl_resepsionis_terima`, `tgl_sign_pp_invoice`, `tgl_input_pr_sap`, `tgl_approve_pr_direksi`, `tgl_invoice_hcm_ke_finance`, `tgl_email_ke_ga`, `tgl_ses_user`, `tgl_rilis_ses_user`, `tgl_bayar`, `created_at`, `updated_at`) VALUES
(6, 'XVII54325', 'Rp. 8.600.000', 'PT. Inacofood', 'Sewa mobil 1 unit', '', '2023-04-12', '2023-04-13', '2023-04-14', '2023-04-17', '2023-04-18', '2023-04-20', '2023-04-21', '2023-04-24', NULL, '2023-04-11 13:09:51', '2023-04-11 06:11:32'),
(9, 'XVII123', 'Rp. 10.000.000', 'PT. Inaco', 'Sewa Mobil', 'yes', '2023-12-22', '2222-02-22', '2222-02-22', '2222-02-22', '2222-02-22', '2222-02-22', '2222-02-22', '2222-02-22', NULL, '2023-04-17 08:30:33', NULL),
(10, '321', 'Rp. 4.000.000', '123fdssdf', '321312', 'non', '2023-05-09', '2023-05-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-08 13:56:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'pramaskoro@gmail.com', '$2a$12$ejCF5C9rghqC.tu8KqSMSe/SSJxAJOw6zJC.RbOECpmSa41flKhXS', '2023-04-13 11:09:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
