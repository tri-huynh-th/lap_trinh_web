-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 03:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tra_sua`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(1, 'trihuynh', '25f9e794323b453885f5181f1b624d0b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`) VALUES
(1, 1, '2781', 1),
(2, 1, '4177', 1),
(3, 1, '4718', 1),
(4, 1, '1929', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(1, '2781', 16, 3),
(2, '2781', 7, 4),
(3, '4177', 15, 2),
(4, '4718', 15, 1),
(5, '4718', 7, 1),
(6, '4718', 23, 1),
(7, '1929', 8, 1),
(8, '1929', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(1, 'shark thuỷ', 'sharktank@gmail.com', 'District 1, Viet Nam ', '25f9e794323b453885f5181f1b624d0b', '0147258369');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(1, 'Loại khác', 1),
(2, 'Lục trà', 2),
(3, 'Trà olong', 3),
(4, 'Trà atiso', 4),
(5, 'Trà lài', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensp` varchar(250) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `tomtat` tinytext NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensp`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`) VALUES
(1, 'Freeze trà xanh', 'lk_1', '29000', 100, '1723462868_Freeze trà xanh.jpeg', '', '', 1, 1),
(2, 'Lệ chi liên tâm', 'lk_2', '29000', 100, '1723462927_Lệ chi liên tâm.jpg', '', '', 1, 1),
(3, 'Trà đen macchiato', 'lk_3', '29000', 100, '1723462979_Trà đen Macchiato.jpg', '', '', 1, 1),
(4, 'Trà quả mọng anh đào', 'lk_4', '29000', 100, '1723463048_Trà quả mọng anh đào.jpeg', '', '', 1, 1),
(5, 'Trà sen vàng', 'lk_5', '29000', 100, '1723463087_Trà sen vàng.jpeg', '', '', 1, 1),
(6, 'Trà thạch đào', 'lk_6', '29000', 100, '1723463134_Trà thạch đào.jpeg', '', '', 1, 1),
(7, 'Trà xanh đậu đỏ', 'lk_7', '29000', 100, '1723463188_Trà xanh đậu đỏ.jpeg', '', '', 1, 1),
(8, 'Trà hoa cúc mật ong', 'lk_8', '29000', 100, '1723463303_Trà hoa cúc mật ong.jpg', '', '', 1, 1),
(9, 'Lục trà dưa gan', 'lt_1', '29000', 100, '1723463440_Lục trà dưa gan.jpg', '', '', 1, 2),
(10, 'Lục trà dưa lưới', 'lt_2', '29000', 100, '1723463468_Lục trà dưa lưới.jpg', '', '', 1, 2),
(11, 'Lục trà hồng phúc', 'lt_3', '29000', 100, '1723463515_Lục trà hồng phúc.jpeg', '', '', 1, 2),
(12, 'Lục trà kem phô mai', 'lt_4', '29000', 100, '1723463549_Lục trà kem phô mai.jpeg', '', '', 1, 2),
(13, 'Lục trà kiwi chanh leo', 'lt_5', '29000', 100, '1723463599_Lục trà kiwwi chanh leo.jpg', '', '', 1, 2),
(14, 'Lục trà lài', 'lt_6', '29000', 100, '1723463639_Lục trà lài.jpeg', '', '', 1, 2),
(15, 'Lục trà vải', 'lt_7', '29000', 100, '1723463665_Lục trà vải.jpg', '', '', 1, 2),
(16, 'Lục trà xoài macchiato', 'lt_8', '29000', 100, '1723463707_Lục trà xoài Macchiato.jpeg', '', '', 1, 2),
(17, 'Olong cóc đác', 'ol_1', '29000', 100, '1723463866_Olong cóc đác.jpg', '', '', 1, 3),
(18, 'Olong dâu mai sơn', 'ol_2', '29000', 100, '1723463890_Olong dâu mai sơn.jpg', '', '', 1, 3),
(19, 'Olong sen vàng', 'ol_3', '29000', 100, '1723463992_Olong sen vàng.png', '', '', 1, 3),
(20, 'Olong sữa nướng', 'ol_4', '29000', 100, '1723463972_Olong sữa nướng.jpg', '', '', 1, 3),
(21, 'Olong xoài chanh dây', 'ol_5', '29000', 100, '1723464079_Olong xoài chanh dây.jpg', '', '', 1, 3),
(22, 'Olong mãng cầu', 'ol_6', '29000', 100, '1723464124_Olong mãng cầu.jpg', '', '', 1, 3),
(23, 'Olong me dứa đác thơm', 'ol_7', '29000', 100, '1723464171_Olong me dứa đác thơm.jpg', '', '', 1, 3),
(24, 'Olong sữa trân châu trà', 'ol_8', '29000', 100, '1723464211_Olong sữa trân châu trà.jpg', '', '', 1, 3),
(25, 'Trà atiso bưởi đỏ', 'ta_1', '29000', 100, '1723468032_Trà atiso bưởi đỏ.jpg', '', '', 1, 4),
(26, 'Trà atiso đào hồng đài', 'ta_2', '29000', 100, '1723468070_Trà atiso đào Hồng đài.jpg', '', '', 1, 4),
(27, 'Trà atiso đỏ chanh dây', 'ta_3', '29000', 100, '1723468098_Trà atiso đỏ chanh dây.jpg', '', '', 1, 4),
(28, 'Trà atiso đỏ hạt boba', 'ta_4', '29000', 100, '1723468153_Trà atiso đỏ hạt boba.png', '', '', 1, 4),
(29, 'Trà atiso đỏ hạt chia', 'ta_5', '29000', 100, '1723468166_Trà atiso đỏ hạt chia.jpg', '', '', 1, 4),
(30, 'Trà atiso đỏ ', 'ta_6', '29000', 100, '1723468363_Trà atiso đỏ.jpg', '', '', 1, 4),
(31, 'Trà atiso nha đam', 'ta_7', '29000', 100, '1723468273_Trà atiso nha đam.jpg', '', '', 1, 4),
(32, 'Trà atiso nhãn', 'ta_8', '29000', 100, '1723468409_Trà atiso nhãn.jpg', '', '', 1, 4),
(33, 'Trà lài đác thơm', 'tl_1', '29000', 100, '1723468474_Trà lài đác thơm.jpg', '', '', 1, 5),
(34, 'Trà lài hạnh nhân', 'tl_2', '29000', 100, '1723468493_Trà lài hạnh nhân.jpg', '', '', 1, 5),
(35, 'Trà lài hương cam', 'tl_3', '29000', 100, '1723468511_Trà lài hương cam.jpg', '', '', 1, 5),
(36, 'Trà lài kem chesse', 'tl_4', '29000', 100, '1723468548_Trà lài kem chesse.jpg', '', '', 1, 5),
(37, 'Trà lài sữa', 'tl_5', '29000', 100, '1723468569_Trà lài sữa.jpg', '', '', 1, 5),
(38, 'Trà lài thơm dứa', 'tl_6', '29000', 100, '1723468589_Trà lài thơm dứa.jpg', '', '', 1, 5),
(39, 'Trà lài thơm sữa', 'tl_7', '29000', 100, '1723468614_Trà lài thơm sữa.jpg', '', '', 1, 5),
(40, 'Trà lài trân châu trắng', 'tl_8', '29000', 100, '1723468635_Trà lài trân châu trắng.jpg', '', '', 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`);

--
-- Indexes for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
