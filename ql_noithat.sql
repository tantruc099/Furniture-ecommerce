-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 07:16 PM
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
-- Database: `ql_noithat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `ma_cthd` int(11) NOT NULL,
  `ma_hd` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(11) NOT NULL,
  `ten_kh` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dia_chi` varchar(500) NOT NULL,
  `sdt` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`ma_loai`, `ten_loai`) VALUES
(1, 'Sản phẩm hot'),
(2, 'Sản phẩm khuyến mãi'),
(3, 'Sản phẩm mới'),
(4, 'Nội thất phòng khách'),
(5, 'Nội thất phòng ngủ'),
(6, 'Nội thất phòng ăn'),
(7, 'Nội thất phòng bếp'),
(8, 'Phòng làm việc'),
(9, 'Hàng trang trí'),
(10, 'Bộ sưu tập');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(100) NOT NULL,
  `mo_ta` varchar(500) NOT NULL,
  `gia` double NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `ma_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ten_sp`, `mo_ta`, `gia`, `hinh`, `ma_loai`) VALUES
(1, 'Tủ Kệ Tivi Gỗ MOHO OSLO 201', '', 2290000, 'pk1.jpg', 4),
(2, 'Kệ Gỗ - Kệ Sách MOHO OSLO 901', '', 1690000, 'pk2.jpg', 4),
(3, 'Bàn Sofa – Bàn Café – Bàn Trà Gỗ MOHO OSLO 901', '', 1290000, 'pk3.jpg', 4),
(4, 'Ghế Sofo Gỗ Tràm Tự Nhiên MOHO VLINE 601', '', 7490000, 'pk4.jpg', 4),
(5, 'Ghế Sofa Gỗ Cao Su Tự Nhiên MOHO VLINE 601', '', 7490000, 'pk5.jpg', 4),
(6, 'Bàn Sofa – Bàn Cafe – Bàn Trà Tròn Gỗ MOHO OSLO 901', '', 1290000, 'pk6.jpg', 4),
(7, 'Tủ Giày – Tủ Trang Trí Gỗ MOHO OSLO 901', '', 2190000, 'pk7.jpg', 4),
(8, 'Tủ Kệ Tivi Gỗ Tràm MOHO VLINE 301', '', 2990000, 'pk8.jpg', 4),
(9, 'Tủ Giày – Tủ Trang Trí Gỗ Tràm MOHO VLINE 601', '', 2490000, 'pk9.jpg', 4),
(10, 'Bàn sofa – Bàn café – Bàn trà tròn cao gỗ MOHO OSLO 901', '', 590000, 'pk10.jpg', 4),
(11, 'Kệ gỗ - Kệ sách MOHO OSLO 902', '', 1990000, 'pk11.jpg', 4),
(12, 'Bàn Sofa – Bàn Cafe – Bàn trà gỗ MOHO VLINE 501', '', 1390000, 'pk12.jpg', 4),
(13, 'Bàn Sofa – Bàn Cafe – Bàn trà gỗ cao su MOHO MILAN 601 xám', '', 590000, 'pk13.jpg', 4),
(14, 'Bàn Sofa – Bàn Café – Bàn trà gỗ cao su MOHO MILAN 602', '', 590000, 'pk14.jpg', 4),
(15, 'Tủ kệ tivi gỗ MOHO VLINE 301', '', 2990000, 'pk15.jpg', 4),
(16, 'Bàn Sofa – Bàn Cafe – Bàn trà gỗ cao su MOHO MILAN 601 trắng', '', 590000, 'pk16.jpg', 4),
(17, 'Set 2 bàn Sofa – Bàn Cafe – Bàn trà gỗ cao su MOHO MILAN 601', '', 1120000, 'pk17.jpg', 4),
(18, 'Tủ  giày – Tủ trang trí gỗ MOHO VIENNA 203', '', 2990000, 'pk18.jpg', 4),
(19, 'Ghế Sofa gỗ cao su tự nhiên MOHO FYN 901', '', 11990000, 'pk19.jpg', 4),
(20, 'Tủ giày – Tủ trang trí gỗ MOHO VLINE 601', '', 2490000, 'pk20.jpg', 4),
(21, 'Giường ngủ gỗ tràm MOHO VLINE 601 Nhiều kích thước', '', 4490000, 'pn1.jpg', 5),
(22, 'Tủ đầu giường gỗ MOHO VLINE 801', '', 1990000, 'pn2.jpg', 5),
(23, 'Giường ngủ gỗ tram MOHO DALUMD 301', '', 5290000, 'pn3.jpg', 5),
(24, 'Full combo phòng ngủ MOHO KOSTER màu nâu', '', 13870000, 'pn4.jpg', 5),
(25, 'Set tủ quần áo gỗ MOHO VIENNA 2013 3 cánh kệ ngăn 4 màu', '', 8290000, 'pn5.jpg', 5),
(26, 'Bàn trang điểm gỗ đa năng MOHO VIENNA 202 màu tự nhiên', '', 3990000, 'pn6.jpg', 5),
(27, 'Giường ngủ gỗ cao su MOHO HOBRO 301', '', 7490000, 'pn7.jpg', 5),
(28, 'Full combo phòng ngủ Ubeda 201 màu tự nhiên', '', 10960000, 'pn8.jpg', 5),
(29, 'Giường ngủ gỗ tram MOHO MALAGA 301 V2', '', 5490000, 'pn9.jpg', 5),
(30, 'Combo basic phòng ngủ Ubeda 201 màu nâu', '', 4780000, 'pn10.jpg', 5),
(31, 'Full combo phòng ngủ MOHO LANGO màu nâu cam', '', 12070000, 'pn11.jpg', 5),
(32, 'Giường ngủ gỗ MOHO VLINE 601 nhiều kích thước', '', 4490000, 'pn12.jpg', 5),
(33, 'Tủ quần áo gỗ 2 cánh MOHO VIENNA 201 4 màu', '', 5290000, 'pn13.jpg', 5),
(34, 'Tủ quần áo gỗ kệ ngăn MOHO VIENNA 201 4 màu', '', 3990000, 'pn14.jpg', 5),
(35, 'Tủ đầu giường gỗ MOHO VIENNA 201', '', 1290000, 'pn15.jpg', 5),
(36, 'Tủ quần áo gỗ MOHO VLINE 601', '', 3490000, 'pn16.jpg', 5),
(37, 'Giường tủ gỗ tram MOHO MALAGA 302 nhiều kích thước', '', 4290000, 'pn17.jpg', 5),
(38, 'Tủ đầu giường gỗ MOHO VLINE 801 màu tự nhiên', '', 1990000, 'pn18.jpg', 5),
(39, 'Tủ quần áo gỗ thanh treo MOHO VIENNA 201 4 màu', '', 3990000, 'pn19.jpg', 5),
(40, 'Tủ đầu giường gỗ MOHO MALAGA 302', '', 1490000, 'pn20.jpg', 5),
(41, 'Ghế ăn gỗ cao su tự nhiên MOHO OSLO 601', '', 1090000, 'pa1.jpg', 6),
(42, 'Ghế ăn gỗ cao su tự nhiên MOHO VLINE 601', '', 1290000, 'pa2.jpg', 6),
(43, 'Ghế ăn gỗ cao su tự nhiên MOHO FYN', '', 1590000, 'pa3.jpg', 6),
(44, 'Ghế ăn gỗ cao su tự nhiên MOHO ODESSA', '', 1190000, 'pa4.jpg', 6),
(45, 'Ghế ăn gỗ cao su tự nhiên MOHO MILAN 601 màu nâu', '', 1390000, 'pa5.jpg', 6),
(46, 'Ghế băng dài gỗ cao su tự nhiên MOHO VLINE 602', '', 1390000, 'pa6.jpg', 6),
(47, 'Ghế ăn gỗ cao su tự nhiên MOHO MILAN 601 màu gỗ', '', 1390000, 'pa7.jpg', 6),
(48, 'Ghế băng tựa gỗ cao su tự nhiên MOHO VLINE 601', '', 1890000, 'pa8.jpg', 6),
(49, 'Bàn gỗ cao su MOHO OSLO 901', '', 3790000, 'pa9.jpg', 6),
(50, 'Bàn ăn gỗ MOHO MILAN 901 màu gỗ', '', 2990000, 'pa10.jpg', 6),
(51, 'Bàn ăn gỗ cao su tự nhiên MOHO VLINE 601 1m6', '', 3790000, 'pa11.jpg', 6),
(52, 'Bộ bàn ăn gỗ cao su tự nhiên MOHO VLINE 601', '', 5770000, 'pa12.jpg', 6),
(53, 'Ghế ăn gỗ cao su tự nhiên MOHO VERONA 601', '', 1190000, 'pa13.jpg', 6),
(54, 'Bộ bàn ăn gỗ 4 ghế cao su MOHO OSLO 601', '', 6950000, 'pa14.jpg', 6),
(55, 'Bàn ăn gỗ cao su tự nhiên MOHO VLINE 601 90cm', '', 2790000, 'pa15.jpg', 6),
(56, 'Ghế ăn gỗ cao su tự nhiên MOHO MALAGA 601', '', 1190000, 'pa16.jpg', 6),
(57, 'Ghế ăn gỗ cao su tự nhiên MOHO NEXO 601', '', 1190000, 'pa17.jpg', 6),
(58, 'Bộ bàn ghế gỗ MOHO MILAN 901 (1m25)', '', 7350000, 'pa18.jpg', 6),
(59, 'Bàn ăn gỗ cao su tự nhiên MOHO VLINE 602', '', 3990000, 'pa19.jpg', 6),
(60, 'Bàn ăn gỗ cao su tự nhiên MOHO VLINE 602', '', 3990000, 'pa20.jpg', 6),
(61, 'Hệ tủ bếp MOHO Kitchen Premium Grenaa nhiều kích thước', '', 11890000, 'pb1.jpg', 7),
(62, 'Hệ tủ bếp MOH Kitchen Prmium Ubeda nhiều kích thước', '', 11890000, 'pb2.jpg', 7),
(63, 'Hệ tủ bếp MOHO Kitchen Premium Narvik nhiều kích thước', '', 11890000, 'pb3.jpg', 7),
(64, 'Hệ tủ bếp MOHO Kitchen Smart Grenaa nhiều kích thước', '', 8490000, 'pb4.jpg', 7),
(65, 'Hệ tủ bếp MOHO Kitchen Smart Ubeda nhiều kích thước', '', 8490000, 'pb5.jpg', 7),
(66, 'Hệ tủ bếp MOHO Kitchen Smart Narvik nhiều kích thước', '', 8490000, 'pb6.jpg', 7),
(67, 'Hệ tủ bếp MOHO Kitchen Essential Grenaa nhiều kích thước', '', 7890000, 'pb7.jpg', 7),
(68, 'Hệ tủ bếp MOHO Kitchen Essential Ubeda nhiều kích thước', '', 7890000, 'pb8.jpg', 7),
(69, 'Hệ tủ bếp MOHO Kitchen Essential Narvik nhiều kích thước', '', 7890000, 'pb9.jpg', 7),
(70, 'Hệ tủ bếp MOHO Kitchen dòng Premium', '', 45000000, 'pb10.jpg', 7),
(71, 'Hệ tủ bếp MOHO Kitchen dòng STANDARD', '', 35000000, 'pb11.jpg', 7),
(72, 'Hệ tủ bếp MOHO Kitchen dòng ESSENTIAL', '', 30000000, 'pb12.jpg', 7),
(73, 'Kệ gỗ - Kệ sách MOHO OSLO 901', '', 1690000, 'plv1.jpg', 8),
(74, 'Bàn làm việc gỗ MOHO VLINE 601 màu nâu', '', 1590000, 'plv2.jpg', 8),
(75, 'Bàn làm việc gỗ MOHO VLINE 601 màu tự nhiên', '', 1590000, 'plv3.jpg', 8),
(76, 'Bàn làm việc gỗ MOHO WORKS 701', '', 1490000, 'plv4.jpg', 8),
(77, 'Hộc tủ 3 năng lưu trữ tài liệu có khoá MOHO WORKS 201', '', 990000, 'plv5.jpg', 8),
(78, 'Kệ gỗ - Kệ sách MOHO OSLO 902', '', 1990000, 'plv6.jpg', 8),
(79, 'Ghế xoay văn phòng tay gập thông minh MOHO RIGA 701', '', 1190000, 'plv7.jpg', 8),
(80, 'Ghế văn phòng chân xoay MOHO MAJOR 701', '', 1190000, 'plv8.jpg', 8),
(81, 'Bàn máy tính gỗ MOHO WORKS 702', '', 1690000, 'plv9.jpg', 8),
(82, 'Bàn làm việc gỗ có kệ MOHO VLINE 602 màu nâu', '', 1790000, 'plv10.jpg', 8),
(83, 'Bàn làm việc gỗ MOHO FYN 601 màu nâu', '', 1990000, 'plv11.jpg', 8),
(84, 'Ghế văn phòng ngả lưng MOHO JEFE 701', '', 2190000, 'plv12.jpg', 8),
(85, 'Kệ để sách 3 tầng MOHO WORKS 703', '', 1390000, 'plv13.jpg', 8),
(86, 'Bàn làm việc gỗ có kệ MOHO VLINE 602 màu tự nhiên', '', 1790000, 'plv14.jpg', 8),
(87, 'Kệ để sách 5 tầng MOHO WORKS 701', '', 2490000, 'plv15.jpg', 8),
(88, 'Bàn làm việc gỗ MOHO FYN 601 màu tự nhiên', '', 1990000, 'plv16.jpg', 8),
(89, 'Kệ để sách tủ khoá MOHO WORKS 702', '', 3190000, 'plv17.jpg', 8),
(90, 'Ghế văn phòng chân quỳ MOHO CALLOSO 701', '', 1090000, 'plv18.jpg', 8),
(91, 'Tủ giày – Tủ trang trí Gỗ MOHO OSLO 901', '', 2190000, 'tt1.jpg', 9),
(92, 'Tủ giày – Tủ trang trí gỗ MHO VLINE 601', '', 2490000, 'tt2.jpg', 9),
(93, 'Tủ giày – Tủ trang trí gỗ MOHO VIENNA 203', '', 2990000, 'tt3.jpg', 9),
(94, 'Tủ giày – Tủ trang trí gỗ MOHO VIENNA 204', '', 2490000, 'tt4.jpg', 9),
(95, 'Tủ giày – Tủ trang trí gỗ MOHO VIENNA 201', '', 1990000, 'tt5.jpg', 9),
(96, 'Tủ giày – Tủ trang trí gỗ MOHO VIENNA 202', '', 3490000, 'tt6.jpg', 9),
(97, 'Tủ giày – Tủ trang trí gỗ tràm MOHO VLINE 601', '', 2490000, 'tt7.jpg', 9),
(98, 'Bàn trang điểm 02', '', 1200000, 'sph1.jpg', 1),
(99, 'Ghế sofa nâu cao cấp', '', 2400000, 'sph2.jpg', 1),
(100, 'Giường đôi cao cấp', '', 5700000, 'sph3.jpg', 1),
(101, 'Ghế nỉ cốm', '', 2200000, 'sph4.jpg', 1),
(102, 'Ghế da nâu', '', 1200000, 'sph5.jpg', 1),
(103, 'Bàn làm việc cao', '', 2100000, 'sph6.jpg', 1),
(104, 'Bàn làm việc gỗ thấp', '', 2700000, 'sph7.jpg', 1),
(105, 'Bàn ăn gỗ ', '', 2500000, 'sph8.jpg', 1),
(106, 'Ghế da hiện đại', '', 1299999, 'sph9.jpg', 1),
(107, 'Sofa phòng khách', '', 5850000, 'sph10.jpg', 1),
(108, 'Ghế nỉ kem', '', 1500000, 'sph11.jpg', 1),
(109, 'Ghế sofa nâu', '', 1200000, 'sph12.jpg', 1),
(110, 'Bàn trang điểm', '', 2400000, 'sph13.jpg', 1),
(111, 'Ghế sofa gỗ tram tự nhiên MOHO VLINE 601', '', 7490000, 'spkm1.jpg', 2),
(112, 'Giường ngủ gỗ tràm MOHO VLINE 601 nhiều kích thước', '', 4490000, 'spkm2.jpg', 2),
(113, 'Tủ đầu giường gỗ MOHO VLINE 801', '', 1990000, 'spkm3.jpg', 2),
(114, 'Kệ gỗ - Kệ sách MOHO OSLO 901', '', 1690000, 'spkm4.jpg', 2),
(115, 'Ghế sofa gỗ cao su tự nhiên MOHO HOBRO 601', '', 10990000, 'spkm5.jpg', 2),
(116, 'Set tủ quần áo MOHO VLINE 601 3 cánh', '', 9490000, 'spkm6.jpg', 2),
(117, 'Ghế ăn gỗ cao su tự nhiên MOHO NEXO 601', '', 1190000, 'spkm7.jpg', 2),
(118, 'Bàn làm việc gỗ MOHO FYN 601 màu nâu', '', 1990000, 'spkm8.jpg', 2),
(119, 'Tủ tài liệu SM8450H', '', 4898031, 'spm1.jpg', 3),
(120, 'Tủ tài liệu SM8350', '', 2906156, 'spm2.jpg', 3),
(121, 'Hộc di động', '', 780000, 'spm3.jpg', 3),
(122, 'Tủ tài liệu SM8650', '', 3568530, 'spm4.jpg', 3),
(123, 'Tủ tài liệu SM6220', '', 1117500, 'spm5.jpg', 3),
(124, 'Tủ tài liệu SM8550', '', 3765180, 'spm6.jpg', 3),
(125, 'Tủ tài liệu SM8150', '', 1894255, 'spm7.jpg', 3),
(126, 'Tủ tài liệu SM8710H', '', 2610850, 'spm8.jpg', 3),
(127, 'Giường sắt sinh viên JSV', '', 9592000, 'spm9.jpg', 3),
(128, 'Giường gỗ khung sắt 2', '', 7463500, 'spm10.jpg', 3),
(129, 'Giường sắt 2 tầng JS-2T', '', 2755500, 'spm11.jpg', 3),
(130, 'Combo basic phòng ăn Grenaa 201 màu nâu', '', 4450000, 'bst1.jpg', 10),
(131, 'Combo basic phòng khách Grenaa 201 màu nâu', '', 5870000, 'bst2.jpg', 10),
(132, 'Combo basic phòng ngủ Grenaa 201 màu nâu', '', 5080000, 'bst3.jpg', 10),
(133, 'Full combo phòng khách Grenaa 201 màu nâu', '', 7460000, 'bst4.jpg', 10),
(134, 'Full combo phòng ngủ Grenaa 201 màu nâu', '', 12060000, 'bst5.jpg', 10),
(135, 'Full combo (Combo basic) bộ sưu tập Grenaa 201 màu nâu', '', 14600000, 'bst6.jpg', 10),
(136, 'Full house bộ sưu tập Grenaa 201 màu nâu', '', 22770000, 'bst7.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `thanh_toan`
--

CREATE TABLE `thanh_toan` (
  `ma_tt` int(11) NOT NULL,
  `ma_hd` int(11) NOT NULL,
  `phuong_thuc` varchar(100) NOT NULL DEFAULT 'Tiền mặt',
  `ngay_tt` int(11) NOT NULL,
  `tong_tien` double NOT NULL,
  `trang_thai` varchar(100) NOT NULL DEFAULT 'Chưa thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `ma_kh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD PRIMARY KEY (`ma_cthd`),
  ADD KEY `ma_hd` (`ma_hd`,`ma_sp`),
  ADD KEY `FK_CTHD_SP` (`ma_sp`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `loai_sp` (`ma_loai`);

--
-- Indexes for table `thanh_toan`
--
ALTER TABLE `thanh_toan`
  ADD PRIMARY KEY (`ma_tt`),
  ADD KEY `ma_hd` (`ma_hd`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  MODIFY `ma_cthd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `thanh_toan`
--
ALTER TABLE `thanh_toan`
  MODIFY `ma_tt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `FK_CTHD_HD` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CTHD_SP` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `FK_HD_KH` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `FK_SP_LOAISP` FOREIGN KEY (`ma_loai`) REFERENCES `loai_san_pham` (`ma_loai`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `thanh_toan`
--
ALTER TABLE `thanh_toan`
  ADD CONSTRAINT `FK_TT_HD` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_USER_KH` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
