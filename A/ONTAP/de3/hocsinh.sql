-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 10:06 PM
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
-- Database: `hocsinh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tongketnam`
--

CREATE TABLE `tongketnam` (
  `id` int(11) NOT NULL,
  `hocsinh_id` varchar(32) NOT NULL,
  `namhoc` varchar(9) NOT NULL,
  `nhanxetchung` text NOT NULL,
  `uudiem` text NOT NULL,
  `cankhacphuc` text NOT NULL,
  `duoclenlop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tongketnam`
--

INSERT INTO `tongketnam` (`id`, `hocsinh_id`, `namhoc`, `nhanxetchung`, `uudiem`, `cankhacphuc`, `duoclenlop`) VALUES
(4, '2', '2050', 'qqqqqqqqqqqqqqqqq', 'eeeeeeeeeeeeeeeeeeeeeeee', 'qqqqqqqqqqqqqqqqqq', 1),
(12, '100', '2030', 'NNNNNNNNNNNN', 'kkkkkkkkkkkkkkkkkk', 'eeeeeeeeeeeeeee', 1),
(17, '2', '2030', 'Học kém', 'kkkkkkkkkkkkkkkkkk', 'Không cần ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `tendaydu` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `matkhau`, `tendaydu`, `role`) VALUES
(1, 'chien', '1', 'Quang Chiến', 'admin'),
(2, 'hai', '1', 'Đức Hải', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tongketnam`
--
ALTER TABLE `tongketnam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tongketnam`
--
ALTER TABLE `tongketnam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
