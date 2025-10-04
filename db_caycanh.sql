-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 10:39 AM
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
-- Database: `caycanh1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `TENDANGNHAP` varchar(30) DEFAULT NULL,
  `MATKHAU` varchar(20) DEFAULT NULL,
  `EMAILADMIN` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `TENDANGNHAP`, `MATKHAU`, `EMAILADMIN`) VALUES
(7, 'te', '202cb962ac59075b964b', 'tran@gmail.com'),
(8, 'tien', 'c4ca4238a0b923820dcc', 'tien@gmail.com'),
(9, 'nghia', '202cb962ac59075b964b', 'nghia@gmail.com'),
(10, 'thinh', 'caf1a3dfb505ffed0d02', 'thinh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MASANPHAM` char(10) NOT NULL,
  `MADONHANG` char(10) NOT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `TONGTIEN` double DEFAULT NULL,
  `gia` float NOT NULL,
  `TIENSAUGIAMGIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MASANPHAM`, `MADONHANG`, `SOLUONG`, `TONGTIEN`, `gia`, `TIENSAUGIAMGIA`) VALUES
('3', '1', 1, 500000, 500000, 700000),
('3', '2', 1, 500000, 500000, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `cungcap`
--

CREATE TABLE `cungcap` (
  `MADANHMUC` char(10) NOT NULL,
  `MANCC` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MADANHMUC` char(10) NOT NULL,
  `TENDANHMUC` char(200) DEFAULT NULL,
  `ANHDANHMUC` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`MADANHMUC`, `TENDANHMUC`, `ANHDANHMUC`) VALUES
('1', 'Cây Cảnh Mini', 'assets/img/categories/cay-tet.jpg'),
('2', 'cây dây leo', 'assets/img/categories/cay-day-leo.jpg'),
('3', 'cây thủy sinh', 'assets/img/categories/cay-ngoai-vuon.jpg'),
('4', 'Cây Để Bàn', 'assets/img/categories/cay-de-ban.jpg'),
('5', 'cây cảnh lớn', 'assets/img/categories/cay-trong-nha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MADONHANG` char(10) NOT NULL,
  `USERID` int(11) NOT NULL,
  `NGAYDATHANG` datetime DEFAULT NULL,
  `TONGTIEN` float DEFAULT NULL,
  `MAGIAMGIA` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MADONHANG`, `USERID`, `NGAYDATHANG`, `TONGTIEN`, `MAGIAMGIA`) VALUES
('1', 3, '2024-04-03 00:00:00', 700000, 0),
('2', 3, '2024-04-03 00:00:00', 350000, 30);

-- --------------------------------------------------------

--
-- Table structure for table `giamgia`
--

CREATE TABLE `giamgia` (
  `MAGIAMGIA` char(10) NOT NULL,
  `TENGIAMGIA` char(200) DEFAULT NULL,
  `TILEGIAMGIA` double DEFAULT NULL,
  `NGAYKETTHUC` datetime DEFAULT NULL,
  `GHICHUGG` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giamgia`
--

INSERT INTO `giamgia` (`MAGIAMGIA`, `TENGIAMGIA`, `TILEGIAMGIA`, `NGAYKETTHUC`, `GHICHUGG`) VALUES
('1', 'Tet', 20, NULL, NULL),
('2', 'Noel', 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` float NOT NULL,
  `anh` text NOT NULL,
  `USERID` int(11) NOT NULL,
  `magiamgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhacuncap`
--

CREATE TABLE `nhacuncap` (
  `MANCC` char(10) NOT NULL,
  `TENNCC` char(200) DEFAULT NULL,
  `DCNCC` text DEFAULT NULL,
  `SDTNCC` char(11) DEFAULT NULL,
  `EMAILNCC` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhacuncap`
--

INSERT INTO `nhacuncap` (`MANCC`, `TENNCC`, `DCNCC`, `SDTNCC`, `EMAILNCC`) VALUES
('1', 'Công ty xanh', '502/14 Xô Viết Nghệ Tĩnh, p 25, q Bình Thạnh', '113', 'xanh@gmail.com'),
('2', 'Vườn Thủy Tề', 'q2, tp Hồ Chí Minh', '114', 'sontinh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MASANPHAM` char(10) NOT NULL,
  `MADANHMUC` char(10) NOT NULL,
  `MAGIAMGIA` char(10) DEFAULT NULL,
  `TENSANPHAM` char(200) DEFAULT NULL,
  `ANHSANPHAM` varchar(100) DEFAULT NULL,
  `MOTASANPHAM` text DEFAULT NULL,
  `GIABAN` double DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `GIANHAP` double DEFAULT NULL,
  `NGAYNHAP` datetime DEFAULT NULL,
  `MANCC` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MASANPHAM`, `MADANHMUC`, `MAGIAMGIA`, `TENSANPHAM`, `ANHSANPHAM`, `MOTASANPHAM`, `GIABAN`, `SOLUONG`, `GIANHAP`, `NGAYNHAP`, `MANCC`) VALUES
('1', '1', NULL, 'Cây Vạn Thọ', 'img/product/product-1.jpg', '', 250000, 10, 200000, '2023-05-12 00:00:00', '1'),
('2', '1', NULL, 'Sen Đá', 'img/product/product-1_2.jpg', '', 125000, 5, 100000, '2023-03-04 00:00:00', '2'),
('3', '5', NULL, 'Cây Chỉ Thiên', 'img/product/product-7.jpg', '', 500000, 10, 400000, '2023-01-01 00:00:00', '1'),
('4', '1', NULL, 'Cây Táo Mỹ', 'img/product/product-8.jpg', '', 300000, 5, 250000, '2023-03-03 00:00:00', '2'),
('5', '4', NULL, 'Cây Đùi Gà', 'img/product/product-10.jpg', '', 65000, 20, 50000, '1998-12-06 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USERID` int(11) NOT NULL,
  `USERNAME` char(50) DEFAULT NULL,
  `EMAILUS` char(50) DEFAULT NULL,
  `PASSWORD` char(50) DEFAULT NULL,
  `FULLNAME` char(50) DEFAULT NULL,
  `DIACHIUS` char(100) DEFAULT NULL,
  `PHONEUS` char(10) DEFAULT NULL,
  `DATEOFBIRTH` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERID`, `USERNAME`, `EMAILUS`, `PASSWORD`, `FULLNAME`, `DIACHIUS`, `PHONEUS`, `DATEOFBIRTH`) VALUES
(3, 'tienctn', 'tienctn@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Tiến', '300 Nam Kì Khởi Nghĩa, Quận Bình Thạnh, Bình Thuận', '0383299400', '2003-12-12'),
(5, 'thinhctn', '11@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Thịnh', '402/20 Xô Viết Nghệ Tĩnh, Thị Xã Ba Càng, An Giang', '1212', '2003-12-12'),
(6, 'nghiadia', 'nghiango@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Ngô Văn Nghĩa', '123 Hố Nai, Huyện Nai Giống, Đồng Nai', '0383244422', '1991-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `vanchuyen`
--

CREATE TABLE `vanchuyen` (
  `MAVC` char(20) NOT NULL,
  `TENVC` char(200) DEFAULT NULL,
  `DCVC` char(200) DEFAULT NULL,
  `SDTVC` char(20) DEFAULT NULL,
  `EMAILVC` char(200) DEFAULT NULL,
  `GHICHUVC` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vanchuyendonhang`
--

CREATE TABLE `vanchuyendonhang` (
  `MADONHANG` char(10) NOT NULL,
  `MAVC` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MASANPHAM`,`MADONHANG`),
  ADD KEY `FK_CHITIETDONHANG2` (`MADONHANG`);

--
-- Indexes for table `cungcap`
--
ALTER TABLE `cungcap`
  ADD PRIMARY KEY (`MADANHMUC`,`MANCC`),
  ADD KEY `FK_CUNGCAP2` (`MANCC`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MADANHMUC`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MADONHANG`),
  ADD KEY `FK_DAT` (`USERID`);

--
-- Indexes for table `giamgia`
--
ALTER TABLE `giamgia`
  ADD PRIMARY KEY (`MAGIAMGIA`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhacuncap`
--
ALTER TABLE `nhacuncap`
  ADD PRIMARY KEY (`MANCC`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASANPHAM`),
  ADD KEY `FK_CO` (`MAGIAMGIA`),
  ADD KEY `FK_THUOC` (`MADANHMUC`),
  ADD KEY `fk_manhacungcap_id` (`MANCC`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERID`);

--
-- Indexes for table `vanchuyen`
--
ALTER TABLE `vanchuyen`
  ADD PRIMARY KEY (`MAVC`);

--
-- Indexes for table `vanchuyendonhang`
--
ALTER TABLE `vanchuyendonhang`
  ADD PRIMARY KEY (`MADONHANG`,`MAVC`),
  ADD KEY `FK_VANCHUYENDONHANG2` (`MAVC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `FK_CHITIETDONHANG` FOREIGN KEY (`MASANPHAM`) REFERENCES `sanpham` (`MASANPHAM`),
  ADD CONSTRAINT `FK_CHITIETDONHANG2` FOREIGN KEY (`MADONHANG`) REFERENCES `donhang` (`MADONHANG`);

--
-- Constraints for table `cungcap`
--
ALTER TABLE `cungcap`
  ADD CONSTRAINT `FK_CUNGCAP` FOREIGN KEY (`MADANHMUC`) REFERENCES `danhmuc` (`MADANHMUC`),
  ADD CONSTRAINT `FK_CUNGCAP2` FOREIGN KEY (`MANCC`) REFERENCES `nhacuncap` (`MANCC`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `FK_DAT` FOREIGN KEY (`USERID`) REFERENCES `user` (`USERID`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_CO` FOREIGN KEY (`MAGIAMGIA`) REFERENCES `giamgia` (`MAGIAMGIA`),
  ADD CONSTRAINT `FK_THUOC` FOREIGN KEY (`MADANHMUC`) REFERENCES `danhmuc` (`MADANHMUC`),
  ADD CONSTRAINT `fk_manhacungcap_id` FOREIGN KEY (`MANCC`) REFERENCES `nhacuncap` (`MANCC`);

--
-- Constraints for table `vanchuyendonhang`
--
ALTER TABLE `vanchuyendonhang`
  ADD CONSTRAINT `FK_VANCHUYENDONHANG` FOREIGN KEY (`MADONHANG`) REFERENCES `donhang` (`MADONHANG`),
  ADD CONSTRAINT `FK_VANCHUYENDONHANG2` FOREIGN KEY (`MAVC`) REFERENCES `vanchuyen` (`MAVC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
