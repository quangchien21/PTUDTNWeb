-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 10:21 AM
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
-- Database: `banhang2`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `hanghoa_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` decimal(10,0) NOT NULL,
  `giamtru` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `donhang_id`, `hanghoa_id`, `soluong`, `dongia`, `giamtru`) VALUES
(1, 1, 1, 100, 100000, 100),
(7, 8, 2, 12, 1233333, 1),
(8, 9, 2, 50, 15000000, 5),
(9, 10, 4, 10, 10000000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `ngayban` datetime NOT NULL,
  `ngaygiaohang` datetime NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `khachhang_id`, `trangthai`, `khuyenmai`, `ngayban`, `ngaygiaohang`, `ghichu`) VALUES
(1, 1, 0, 10, '2022-01-20 21:58:52', '2022-01-27 21:58:52', 'Không có'),
(8, 2, 1, 12, '2022-01-21 00:20:00', '2022-01-12 00:20:00', 'Không có'),
(9, 2, 1, 21, '2024-08-31 14:17:00', '2024-09-06 14:17:00', 'Tôi không muốn nói gì thêm, cảm ơn'),
(10, 1, 2, 10, '2024-08-31 14:28:00', '2024-09-02 14:28:00', 'Đơn hàng đang được vận chuyển');

-- --------------------------------------------------------

--
-- Stand-in structure for view `donhang_view`
-- (See below for the actual view)
--
CREATE TABLE `donhang_view` (
`id` int(11)
,`khachhang_id` int(11)
,`trangthai` int(11)
,`khuyenmai` int(11)
,`ngayban` datetime
,`ngaygiaohang` datetime
,`ghichu` text
,`hovaten` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `loaihang_id` int(11) NOT NULL,
  `quycach` int(11) NOT NULL,
  `gianiemyet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`id`, `ten`, `loaihang_id`, `quycach`, `gianiemyet`) VALUES
(1, 'Thốc nổ', 1, 1, 1000000),
(2, 'Dầu hỏa', 1, 2, 1000000),
(3, 'Kính bản to', 2, 3, 15000000),
(4, 'Gương nhà tắm', 2, 4, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(255) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `hovaten`, `dienthoai`, `email`, `diachi`) VALUES
(1, 'Quang Chiến', '86233421', 'quangchien@gmail.com', 'Hải Phòng'),
(2, 'Đức Hải', '1233234', 'duchai@gmail.com', 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `loaihang`
--

CREATE TABLE `loaihang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaihang`
--

INSERT INTO `loaihang` (`id`, `ten`, `mota`) VALUES
(1, 'Hàng dễ cháy', 'Tránh tiếp xúc với lửa'),
(2, 'Hàng dễ vỡ', 'Vận chuyển cẩn thận');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `tendaydu` varchar(255) NOT NULL,
  `quyenhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `matkhau`, `tendaydu`, `quyenhan`) VALUES
('admin', '1', 'Đặng Quang Chiến', 1),
('chien', '2', 'Quang Chiến', 0);

-- --------------------------------------------------------

--
-- Structure for view `donhang_view`
--
DROP TABLE IF EXISTS `donhang_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `donhang_view`  AS SELECT `donhang`.`id` AS `id`, `donhang`.`khachhang_id` AS `khachhang_id`, `donhang`.`trangthai` AS `trangthai`, `donhang`.`khuyenmai` AS `khuyenmai`, `donhang`.`ngayban` AS `ngayban`, `donhang`.`ngaygiaohang` AS `ngaygiaohang`, `donhang`.`ghichu` AS `ghichu`, `khachhang`.`hovaten` AS `hovaten` FROM (`donhang` join `khachhang` on(`donhang`.`khachhang_id` = `khachhang`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hanghoa_id` (`hanghoa_id`),
  ADD KEY `chitietdonhang_ibfk_1` (`donhang_id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhang_id` (`khachhang_id`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hanghoa_ibfk_1` (`loaihang_id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`hanghoa_id`) REFERENCES `hanghoa` (`id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`loaihang_id`) REFERENCES `loaihang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
