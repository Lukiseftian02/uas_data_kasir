-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 08:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_table`
--

CREATE TABLE `db_table` (
  `id` int(10) NOT NULL,
  `waktu_kedatangan` time NOT NULL,
  `selisih_kedatangan` int(128) NOT NULL,
  `waktu_awal_pelayanan` time NOT NULL,
  `selisih_pelayanan_kasir` int(128) NOT NULL,
  `waktu_selesai` time NOT NULL,
  `selisih_keluar_antrian` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_table`
--

INSERT INTO `db_table` (`id`, `waktu_kedatangan`, `selisih_kedatangan`, `waktu_awal_pelayanan`, `selisih_pelayanan_kasir`, `waktu_selesai`, `selisih_keluar_antrian`) VALUES
(4, '21:50:00', 4, '21:51:00', 3, '21:55:00', 2),
(7, '01:46:00', 9, '01:48:00', 1, '01:50:00', 5),
(8, '01:50:00', 1, '01:53:00', 1, '01:55:00', 3),
(9, '22:49:00', 2, '22:50:00', 3, '22:53:00', 9),
(12, '01:55:00', 9, '01:57:00', 6, '01:59:00', 8),
(13, '10:19:00', 5, '10:21:00', 6, '10:22:00', 2),
(14, '10:22:00', 8, '10:24:00', 6, '10:25:00', 1),
(15, '10:27:00', 5, '10:30:00', 3, '10:32:00', 2),
(16, '11:00:00', 2, '11:01:00', 6, '11:05:00', 7),
(17, '10:57:00', 1, '10:58:00', 1, '10:00:00', 1),
(18, '11:07:00', 1, '11:08:00', 1, '11:09:00', 2),
(19, '11:52:00', 4, '11:53:00', 6, '11:55:00', 1),
(20, '11:54:00', 2, '11:55:00', 2, '11:57:00', 2),
(21, '11:57:00', 3, '11:59:00', 3, '11:00:00', 3),
(22, '12:06:00', 1, '12:07:00', 1, '12:08:00', 1),
(23, '14:11:00', 3, '14:12:00', 3, '14:14:00', 3),
(24, '14:15:00', 4, '14:17:00', 4, '14:19:00', 5),
(25, '14:23:00', 3, '14:26:00', 7, '14:27:00', 4),
(26, '14:26:00', 5, '14:29:00', 4, '14:31:00', 4),
(27, '14:29:00', 2, '14:31:00', 2, '14:35:00', 2),
(28, '14:32:00', 3, '14:34:00', 6, '14:35:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_password`) VALUES
(1, 'luki', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_table`
--
ALTER TABLE `db_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_table`
--
ALTER TABLE `db_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
