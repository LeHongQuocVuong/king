-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for king
CREATE DATABASE IF NOT EXISTS `king` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `king`;

-- Dumping structure for table king.chitietsanpham
CREATE TABLE IF NOT EXISTS `chitietsanpham` (
  `sp_ma` int(11) unsigned NOT NULL,
  `manhinh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `camera_sau` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `camera_truoc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ocung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sp_ma`) USING BTREE,
  CONSTRAINT `FK_chitietsanpham_sanpham` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table king.chitietsanpham: ~50 rows (approximately)
/*!40000 ALTER TABLE `chitietsanpham` DISABLE KEYS */;
INSERT INTO `chitietsanpham` (`sp_ma`, `manhinh`, `os`, `camera_sau`, `camera_truoc`, `cpu`, `ram`, `ocung`, `pin`) VALUES
	(1, 'Công nghệ màn hình LED-backlit IPS LCD rộng 5.5"', 'iOS 14', '2 camera 12 MP', '7 MP', 'Apple A10 Fusion 4 nhân', '3 GB', '128 GB', '3110 mAh, có sạc nhanh'),
	(2, 'Công nghệ màn hình LED-backlit IPS LCD rộng 5.5"', 'iOS 14', '2 camera 12 MP', '7 MP', 'Apple A10 Fusion 4 nhân', '3 GB', '128 GB', '3110 mAh, có sạc nhanh'),
	(3, 'IPS LCD, 6.1", Liquid Retina', 'iOS 14', '2 camera 12 MP', '12 MP', 'Apple A13 Bionic 6 nhân', '4 GB', '256 GB', '3110 mAh, có sạc nhanh'),
	(4, 'IPS LCD, 6.1", Liquid Retina', 'iOS 14', '2 camera 12 MP', '12 MP', 'Apple A13 Bionic 6 nhân', '4 GB', '256 GB', '3110 mAh, có sạc nhanh'),
	(5, 'IPS LCD, 4.7"', 'iOS 14', '12 MP', '7 MP', 'Apple A13 Bionic 6 nhân', '4 GB', '256 GB', '3110 mAh, có sạc nhanh'),
	(6, 'IPS LCD, 6.1", Liquid Retina', 'iOS 14', '2 camera 12 MP', '12 MP', 'Apple A13 Bionic 6 nhân', '4 GB', '256 GB', '3110 mAh, có sạc nhanh'),
	(7, 'Super AMOLED, 6.5", Full HD+', '	Android 10', 'Chính 48 MP & Phụ 12 MP, 5 MP, 5 MP', '32 MP', 'Exynos 9611 8 nhân', '8 GB', '128 GB', '4000 mAh, có sạc nhanh'),
	(14, 'Super AMOLED, 6.5", Full HD+', '	Android 10', 'Chính 48 MP & Phụ 12 MP, 5 MP, 5 MP', '32 MP', 'Exynos 9611 8 nhân', '8 GB', '128 GB', '4000 mAh, có sạc nhanh'),
	(16, 'Dynamic AMOLED 2X, 6.2", Quad HD+ (2K+)', 'Android 10', 'Chính 12 MP & Phụ 64 MP, 12 MP', '10 MP', 'Exynos 990 8 nhân', '8 GB', '128 GB', '4000 mAh, có sạc nhanh'),
	(17, 'Super AMOLED, 6.7", Full HD+', 'Android 10', 'Chính 48 MP & Phụ 12 MP, 5 MP, 5 MP', '10 MP', 'Exynos 990 8 nhân', '8 GB', '128 GB', '4000 mAh, có sạc nhanh'),
	(18, 'Super AMOLED Plus, 6.7", Full HD+', 'Android 10', 'Chính 12 MP & Phụ 64 MP, 12 MP', '10 MP', 'Exynos 990 8 nhân', '8 GB', '256 GB', '4000 mAh, có sạc nhanh'),
	(19, 'IPS LCD, 6.53", Full HD+', 'Android 10', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '13 MP', 'MediaTek Helio G85 8 nhân', '4 GB', '128 GB', '5020 mAh, có sạc nhanh'),
	(20, 'IPS LCD, 6.3", Full HD+', 'Android 9 (Pie)', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '13 MP', 'Snapdragon 665 8 nhân', '4 GB', '128 GB', '5020 mAh, có sạc nhanh'),
	(21, 'IPS LCD, 6.3", Full HD+', 'Android 9 (Pie)', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '13 MP', 'Snapdragon 665 8 nhân', '4 GB', '128 GB', '5020 mAh, có sạc nhanh'),
	(22, 'IPS LCD, 6.3", Full HD+', 'Android 10', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '13 MP', 'Snapdragon 665 8 nhân', '4 GB', '128 GB', '5020 mAh, có sạc nhanh'),
	(23, 'IPS LCD, 6.3", Full HD+', 'Android 10', 'Chính 12 MP & Phụ 64 MP, 12 MP', '13 MP', 'Snapdragon 665 8 nhân', '4 GB', '128 GB', '5020 mAh, có sạc nhanh'),
	(25, 'IPS LCD, 6.5", HD+', 'Android 10', 'Chính 12 MP & Phụ 2 MP, 2 MP', '5 MP', 'MediaTek Helio G70 8 nhân', '4 GB', '64 GB', '5000 mAh'),
	(26, 'IPS LCD, 6.6", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 12 MP, 8 MP, 2 MP', 'Chính 16 MP & Phụ 8 MP', 'Snapdragon 665 8 nhân', '8 GB', '128 GB', '4300 mAh, có sạc nhanh'),
	(27, 'IPS LCD, 6.6", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 12 MP, 8 MP, 2 MP', '7 MP', 'Snapdragon 665 8 nhân', '4 GB', '64 GB', '5000 mAh'),
	(28, 'IPS LCD, 6.6", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 12 MP, 8 MP, 2 MP', '7 MP', 'Snapdragon 665 8 nhân', '4 GB', '64 GB', '5000 mAh'),
	(29, 'IPS LCD, 6.6", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 12 MP, 8 MP, 2 MP', '7 MP', 'Snapdragon 665 8 nhân', '4 GB', '64 GB', '5000 mAh'),
	(30, 'IPS LCD, 6.6", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 12 MP, 8 MP, 2 MP', '7 MP', 'Snapdragon 665 8 nhân', '4 GB', '64 GB', '5000 mAh'),
	(31, '15.6 inch, Full HD (1920 x 1080), 144Hz', 'Windows 10 Home SL', NULL, NULL, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '8 GB, DDR4 (2 khe), 2933 MHz', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(32, '15.6 inch, Full HD (1920 x 1080), 144Hz', 'Windows 10 Home SL', NULL, NULL, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '8 GB, DDR4 (2 khe), 2933 MHz', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(33, '15.6 inch, Full HD (1920 x 1080), 144Hz', 'Windows 10 Home SL', NULL, NULL, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '8 GB, DDR4 (2 khe), 2933 MHz', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(34, '15.6 inch, Full HD (1920 x 1080), 144Hz', 'Windows 10 Home SL', NULL, NULL, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '8 GB, DDR4 (2 khe), 2933 MHz', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(35, '15.6 inch, Full HD (1920 x 1080), 144Hz', 'Windows 10 Home SL', NULL, NULL, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '8 GB, DDR4 (2 khe), 2933 MHz', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(36, '13.3 inch, Full HD (1920 x 1080)', 'Windows 10 Home SL', NULL, NULL, 'Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz', '8 GB, LPDDR4X (On board), 4267 MHz', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(37, '13.3 inch, Full HD (1920 x 1080)', 'Windows 10 Home SL', NULL, NULL, 'Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz', '8 GB, LPDDR4X (On board), 4267 MHz', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(38, '13.3 inch, Full HD (1920 x 1080)', 'Windows 10 Home SL', NULL, NULL, 'Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz', '8 GB, LPDDR4X (On board), 4267 MHz', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(39, '13.3 inch, Retina (2560 x 1600)', 'Mac OS', NULL, NULL, 'IApple M1', '8 GB', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(40, '13.3 inch, Retina (2560 x 1600)', 'Mac OS', NULL, NULL, 'IApple M1', '8 GB', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(41, '15.6 inch, Full HD (1920 x 1080), 144Hz', 'Windows 10 Home SL', NULL, NULL, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '16 GB, DDR4 (2 khe), 2666 MHz', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(42, '15.6 inch, Full HD (1920 x 1080), 144Hz', 'Windows 10 Home SL', NULL, NULL, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '16 GB, DDR4 (2 khe), 2666 MHz', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(43, '15.6 inch, Full HD (1920 x 1080), 144Hz', 'Windows 10 Home SL', NULL, NULL, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '16 GB, DDR4 (2 khe), 2666 MHz', 'SSD 512 GB M.2 PCIe', 'Li-Ion 3 cell'),
	(44, 'Retina IPS LCD, 10.2', 'iPadOS 14', '8 MP', '12 MP', 'Apple A12 Bionic 6 nh&acirc;n', '3 GB', '32 GB', '8600 mAh'),
	(45, 'Retina IPS LCD, 10.2"', 'iPadOS 14', '8 MP', '1.2 MP', 'Apple A12 Bionic 6 nhân', '3 GB', '32 GB', '8600 mAh'),
	(46, 'Retina IPS LCD, 10.2"', 'iPadOS 14', '8 MP', '1.2 MP', 'Apple A12 Bionic 6 nhân', '3 GB', '32 GB', '8600 mAh'),
	(47, 'Retina IPS LCD, 10.2"', 'iPadOS 14', '8 MP', '1.2 MP', 'Apple A12 Bionic 6 nhân', '3 GB', '32 GB', '8600 mAh'),
	(48, '	TFT LCD, 10.4"', 'Android 10', '8 MP', '5 MP', 'Snapdragon 662 8 nhân', '3 GB', '32 GB', '8600 mAh'),
	(49, '	TFT LCD, 10.4"', 'Android 10', '8 MP', '5 MP', 'Snapdragon 662 8 nhân', '3 GB', '32 GB', '8600 mAh'),
	(50, '	TFT LCD, 10.4"', 'Android 10', '8 MP', '5 MP', 'Snapdragon 662 8 nhân', '3 GB', '32 GB', '8600 mAh'),
	(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(55, 'OLED 1.64 inch', 'watchOS 7.0', NULL, NULL, NULL, NULL, NULL, 'Khoảng 1.5 ngày'),
	(56, 'OLED 1.64 inch', 'watchOS 7.0', NULL, NULL, NULL, NULL, NULL, 'Khoảng 1.5 ngày'),
	(57, 'AMOLED 1.64 inch', 'LiteOS', NULL, NULL, NULL, NULL, NULL, 'Khoảng 10 ngày'),
	(58, 'AMOLED 1.64 inch', 'LiteOS', NULL, NULL, NULL, NULL, NULL, 'Khoảng 10 ngày');
/*!40000 ALTER TABLE `chitietsanpham` ENABLE KEYS */;

-- Dumping structure for table king.chudegopy
CREATE TABLE IF NOT EXISTS `chudegopy` (
  `cdgy_ma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cdgy_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cdgy_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table king.chudegopy: ~2 rows (approximately)
/*!40000 ALTER TABLE `chudegopy` DISABLE KEYS */;
INSERT INTO `chudegopy` (`cdgy_ma`, `cdgy_ten`) VALUES
	(1, 'Giá'),
	(2, 'Chất lượng');
/*!40000 ALTER TABLE `chudegopy` ENABLE KEYS */;

-- Dumping structure for table king.dondathang
CREATE TABLE IF NOT EXISTS `dondathang` (
  `dh_ma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dh_ngaylap` datetime NOT NULL,
  `dh_ngaygiao` datetime DEFAULT NULL,
  `dh_noigiao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dh_trangthaithanhtoan` int(11) NOT NULL,
  `httt_ma` int(11) unsigned NOT NULL,
  `kh_tendangnhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dh_ma`),
  KEY `dondathang_khachhang_idx` (`kh_tendangnhap`),
  KEY `dondathang_hinhthucthanhtoan_idx` (`httt_ma`),
  CONSTRAINT `FK_dondathang_khachhang` FOREIGN KEY (`kh_tendangnhap`) REFERENCES `khachhang` (`kh_tendangnhap`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `dondathang_hinhthucthanhtoan` FOREIGN KEY (`httt_ma`) REFERENCES `hinhthucthanhtoan` (`httt_ma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table king.dondathang: ~9 rows (approximately)
/*!40000 ALTER TABLE `dondathang` DISABLE KEYS */;
INSERT INTO `dondathang` (`dh_ma`, `dh_ngaylap`, `dh_ngaygiao`, `dh_noigiao`, `dh_trangthaithanhtoan`, `httt_ma`, `kh_tendangnhap`) VALUES
	(1, '2020-02-21 16:45:44', '2020-02-01 00:00:00', 'Can Tho', 0, 1, 'nva'),
	(2, '2020-02-21 16:46:33', '2020-02-07 00:00:00', 'Vĩnh Long', 0, 1, 'admin'),
	(3, '2021-02-21 16:47:22', '2021-02-01 00:00:00', 'An Giang', 0, 1, 'quocvuong'),
	(4, '2021-02-21 16:48:10', '2021-02-08 00:00:00', 'Can Tho', 0, 1, 'nva'),
	(5, '2020-02-21 16:48:59', '2020-02-09 00:00:00', 'Can Tho', 0, 1, 'quocvuong'),
	(6, '2021-02-25 12:28:53', '2021-02-25 12:28:55', 'VL', 0, 3, 'nva'),
	(7, '2021-01-25 21:35:18', '2021-07-25 21:35:18', 'vvvv', 1, 2, 'quocvuong'),
	(10, '2021-02-26 00:00:00', '2021-02-26 00:00:00', '', 0, 1, 'nva'),
	(11, '2021-02-26 00:00:00', '2021-02-26 00:00:00', '', 0, 1, 'nva'),
	(12, '2021-02-26 00:00:00', '2021-02-26 00:00:00', '', 0, 1, 'nva'),
	(13, '2021-02-26 00:00:00', '2021-02-26 00:00:00', '', 0, 1, 'nva');
/*!40000 ALTER TABLE `dondathang` ENABLE KEYS */;

-- Dumping structure for table king.gopy
CREATE TABLE IF NOT EXISTS `gopy` (
  `gy_ma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gy_hoten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gy_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gy_diachi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gy_dienthoai` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gy_tieude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gy_noidung` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gy_ngaygopy` datetime DEFAULT NULL,
  `cdgy_ma` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`gy_ma`),
  KEY `gopy_chudegopy_idx` (`cdgy_ma`),
  CONSTRAINT `FK_gopy_chudegopy` FOREIGN KEY (`cdgy_ma`) REFERENCES `chudegopy` (`cdgy_ma`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table king.gopy: ~4 rows (approximately)
/*!40000 ALTER TABLE `gopy` DISABLE KEYS */;
INSERT INTO `gopy` (`gy_ma`, `gy_hoten`, `gy_email`, `gy_diachi`, `gy_dienthoai`, `gy_tieude`, `gy_noidung`, `gy_ngaygopy`, `cdgy_ma`) VALUES
	(1, 'Nguyễn Văn A', 'nva@gmail.com', 'Cần Thơ', '0123456789', 'Chất lượng sản phẩm kém', 'Sản phẩm dùng được 1 tháng thì hỏng màn hình', '2021-02-22 20:50:42', 2),
	(2, 'xxxxxxxxxxxxxxxx', 'ttttttttttt', 'fffffff', 'ggggggggg', 'ddddđ', 'aaaaaaaaaaaa&acirc;', '2021-02-26 00:31:25', 1),
	(3, 'xxxxxxxxxxx', 'xxxxxxxxxxxxx', 'xxxxxxxxxx', 'xxxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxxx', '2021-02-26 00:31:25', 1);
/*!40000 ALTER TABLE `gopy` ENABLE KEYS */;

-- Dumping structure for table king.hinhsanpham
CREATE TABLE IF NOT EXISTS `hinhsanpham` (
  `hsp_ma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hsp_tentaptin` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_ma` int(11) unsigned NOT NULL,
  PRIMARY KEY (`hsp_ma`),
  KEY `FK_hinhsanpham_sanpham` (`sp_ma`),
  CONSTRAINT `FK_hinhsanpham_sanpham` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table king.hinhsanpham: ~51 rows (approximately)
/*!40000 ALTER TABLE `hinhsanpham` DISABLE KEYS */;
INSERT INTO `hinhsanpham` (`hsp_ma`, `hsp_tentaptin`, `sp_ma`) VALUES
	(1, '6_i_iphone-7-plus-128gb.jpg', 1),
	(2, '6_i_iphone-8-plus-128gb.jpg', 2),
	(3, '6_i_iphone-11-256gb-black.jpg', 3),
	(4, 'iphone-11-pro-max-green-400x400.jpg', 4),
	(6, 'iphone-se-256gb-2020-261920-101916-200x200.jpg', 5),
	(7, 'iphone-xs-gold-600x600-2-600x600.jpg', 6),
	(8, '6_s_samsung-galaxy-a21s.jpg', 7),
	(9, '6_s_samsung-galaxy-a51.jpg', 14),
	(10, '6_s_samsung-galaxy-s20-plus.jpg', 16),
	(11, 'samsung-galaxy-a71-195420-105424-400x400.jpg', 17),
	(12, 'samsung-galaxy-note-20-062220-122200-400x400.jpg', 18),
	(13, '6_x_xiaomi-redmi-9.jpg', 19),
	(14, '6_x_xiaomi-redmi-note-8-pro.jpg', 20),
	(15, 'xiaomi-mi-note-10-lite-trang-600x600-600x600.jpg', 21),
	(16, 'xiaomi-mi-note-10-pro-black-600x600.jpg', 22),
	(17, 'xiaomi-redmi-note-9s-(21).jpg', 23),
	(18, 'realme-c3-64gb-263620-023637-200x200.jpg', 25),
	(19, 'realme-6-pro-do-new-600x600-600x600.jpg', 26),
	(21, 'vsmart-live-4-241720-071719-400x400.jpg', 28),
	(22, 'vsmart-star-3-xanh-400x460-400x460.png', 29),
	(24, 'vsmart-star-4-den-400x460-2-400x460.png', 30),
	(25, '2_lt_a_asus-gaming-rog-strix-g512.jpg', 31),
	(26, '2_lt_a_asus-ux333fa-i5-8265u.jpg', 32),
	(27, '2_lt_asus-expertbook-b9450f-i7.jpg', 33),
	(28, '2_lt_asus-vivobook-x509ja-i3.jpg', 34),
	(29, '2_lt_asus-vivobook-x509ma.jpg', 35),
	(30, '2_lt_d_dell-inspiron-7373.jpg', 36),
	(31, '2_lt_d_dell-vostro-3580.jpg', 37),
	(32, '2_lt_dell-xps-13-9300-i7.jpg', 38),
	(33, '2_lt_apple-macbook-air.jpg', 39),
	(34, '2_lt_apple-macbook-air-2020.jpg', 40),
	(35, '2_lt_hp-348-g7-i5.jpg', 41),
	(36, '2_lt_lenovo-ideapad-s145-81w8001xvn-a4-216292-400x400.jpg', 42),
	(37, '2_lt_msi-gaming-leopard-10sdr.jpg', 43),
	(38, '3_tl_ipad-10-2-inch-wifi-cellular-32gb-2019-gold.jpg', 44),
	(39, '3_tl_ipad-air-2019-gold.jpg', 45),
	(40, '3_tl_ipad-mini-64gb-2019-gold.jpg', 46),
	(41, '3_tl_ipad-pro-128gb-2020.jpg', 47),
	(42, '3_tl_samsung-galaxy-tab-a8-plus.jpg', 48),
	(43, '3_tl_samsung-galaxy-tab-a8-t295-2019-silver.jpg', 49),
	(44, '3_tl_samsung-galaxy-tab-s6-lite.jpg', 50),
	(45, '7-tai-nghe-bluetooth-airpods-pro-apple-mwp22-avatar-1-600x600.jpg', 51),
	(46, '7-tai-nghe-earpods-cong-lightning-apple-mmtn2-avatar-1-600x600.jpg', 52),
	(47, '7-tai-nghe-bluetooth-true-wireless-galaxy-buds-pro-avatar-1-600x600.jpg', 53),
	(48, '7-tai-nghe-nhet-tai-samsung-ig935b-avatar-1-600x600.jpg', 54),
	(49, '8-apple-watch-s5-lte-104520-104549-600x600.jpg', 55),
	(50, '8-apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-ava-600x600.jpg', 56),
	(51, '8-huawei-watch-fit-day-silicone-den-thumb-600x600.jpg', 57),
	(52, '8-watch-gt2-pro-46mm-day-silicone-ava-600x600.jpg', 58),
	(53, 'vsmart-joy-3-4gb-den-400x460-400x460.png', 27),
	(54, '20210226022401_1_dt_NoiBat.jpg', 61);
/*!40000 ALTER TABLE `hinhsanpham` ENABLE KEYS */;

-- Dumping structure for table king.hinhthucthanhtoan
CREATE TABLE IF NOT EXISTS `hinhthucthanhtoan` (
  `httt_ma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `httt_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`httt_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table king.hinhthucthanhtoan: ~3 rows (approximately)
/*!40000 ALTER TABLE `hinhthucthanhtoan` DISABLE KEYS */;
INSERT INTO `hinhthucthanhtoan` (`httt_ma`, `httt_ten`) VALUES
	(1, 'Tiền mặt'),
	(2, 'Chuyển khoản'),
	(3, 'Paypal');
/*!40000 ALTER TABLE `hinhthucthanhtoan` ENABLE KEYS */;

-- Dumping structure for table king.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `kh_tendangnhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kh_matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kh_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kh_gioitinh` int(11) NOT NULL,
  `kh_diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kh_dienthoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kh_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kh_ngaysinh` date DEFAULT NULL,
  `kh_cmnd` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kh_quantri` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`kh_tendangnhap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table king.khachhang: ~7 rows (approximately)
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` (`kh_tendangnhap`, `kh_matkhau`, `kh_ten`, `kh_gioitinh`, `kh_diachi`, `kh_dienthoai`, `kh_email`, `kh_ngaysinh`, `kh_cmnd`, `kh_quantri`) VALUES
	('admin', '123', 'Quản trị', 1, 'Số 01 - Lý Tự Trọng - Cần Thơ', '0354685880', 'lehongquocvuong@gmail.com', '1999-10-30', '33184377', 1),
	('kh_ngaysinh', 'kh_ngaysinh', 'kh_ngaysinh', 0, 'kh_ngaysinh', 'kh_ngaysinh', 'lehongquocvuong@gmail.com', '2020-09-20', 'kh_ngaysinh', 0),
	('nva', '123', 'Nguyễn Văn A', 1, 'Cần Thơ', '0111111111', 'lehongquocvuong@gmail.com', '1990-03-29', '33111111', 0),
	('quocvuong', '123', 'Quốc Vương', 1, 'Vĩnh Long', '0123456789', 'lehongquocvuong@gmail.com', '1988-07-20', '33123456', 0),
	('ssssssssss', 'dfdfdfdfdf', 'rtrtrtrt', 1, 'yuyuyuyuuy', '2222222222222222', 'lehongquocvuong@gmail.com', '1890-06-30', '00000000000009999999999999', 0),
	('thi', '123', 'V&otilde; Thị Thi', 0, 'An Giang', '1234567890', 'lehongquocvuong@gmail.com', '1999-08-26', '333333333333333', 0),
	('thithi', '123', 'v', 0, 'An Giang', '1234567890', 'lehongquocvuong@gmail.com', '2016-12-14', '333333333333333', 0);
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;

-- Dumping structure for table king.khuyenmai
CREATE TABLE IF NOT EXISTS `khuyenmai` (
  `km_ma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `km_ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `km_noidung` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `km_tungay` date DEFAULT NULL,
  `km_denngay` date DEFAULT NULL,
  PRIMARY KEY (`km_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table king.khuyenmai: ~3 rows (approximately)
/*!40000 ALTER TABLE `khuyenmai` DISABLE KEYS */;
INSERT INTO `khuyenmai` (`km_ma`, `km_ten`, `km_noidung`, `km_tungay`, `km_denngay`) VALUES
	(1, 'tết 2021', 'Giảm 20%', '2021-01-26', '2021-03-26'),
	(2, 'Quốc tế phụ nữ', 'Giảm 10%', '2021-02-26', '2021-03-26'),
	(3, 'test', 'test1', '2021-02-26', '2021-02-26');
/*!40000 ALTER TABLE `khuyenmai` ENABLE KEYS */;

-- Dumping structure for table king.loaisanpham
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `lsp_ma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lsp_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lsp_mota` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lsp_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table king.loaisanpham: ~6 rows (approximately)
/*!40000 ALTER TABLE `loaisanpham` DISABLE KEYS */;
INSERT INTO `loaisanpham` (`lsp_ma`, `lsp_ten`, `lsp_mota`) VALUES
	(1, 'Máy tính bản', NULL),
	(2, 'Máy tính xách tay', NULL),
	(3, 'Điện thoại', NULL),
	(4, 'Tai Nghe', NULL),
	(8, 'Đồng hồ thông minh', NULL),
	(11, '&lt;input value=&quot;aaa&quot;&gt;&lt;/input&gt;&lt;/br&gt;xxxxxxxxxxxxxx', 'aaaaaaccc');
/*!40000 ALTER TABLE `loaisanpham` ENABLE KEYS */;

-- Dumping structure for table king.nhasanxuat
CREATE TABLE IF NOT EXISTS `nhasanxuat` (
  `nsx_ma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nsx_ten` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nsx_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table king.nhasanxuat: ~12 rows (approximately)
/*!40000 ALTER TABLE `nhasanxuat` DISABLE KEYS */;
INSERT INTO `nhasanxuat` (`nsx_ma`, `nsx_ten`) VALUES
	(1, 'Apple'),
	(2, 'Samsung'),
	(3, 'Xiaomi'),
	(4, 'Huawei'),
	(5, 'Asus'),
	(6, 'Dell'),
	(7, 'HP'),
	(8, 'Lenovo'),
	(9, 'MSI'),
	(10, 'OPPO'),
	(11, 'Vsmart'),
	(12, 'Realme');
/*!40000 ALTER TABLE `nhasanxuat` ENABLE KEYS */;

-- Dumping structure for table king.sanpham
CREATE TABLE IF NOT EXISTS `sanpham` (
  `sp_ma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sp_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sp_gia` decimal(12,2) DEFAULT NULL,
  `sp_giacu` decimal(12,2) DEFAULT NULL,
  `sp_mota_ngan` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `sp_mota_chitiet` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `sp_ngaycapnhat` datetime NOT NULL,
  `sp_soluong` int(11) DEFAULT NULL,
  `lsp_ma` int(11) unsigned NOT NULL,
  `nsx_ma` int(11) unsigned NOT NULL,
  `km_ma` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`sp_ma`),
  KEY `sanpham_loaisanpham_idx` (`lsp_ma`),
  KEY `sanpham_nhasanxuat_idx` (`nsx_ma`),
  KEY `sanpham_khuyenmai_idx` (`km_ma`),
  CONSTRAINT `FK_sanpham_khuyenmai` FOREIGN KEY (`km_ma`) REFERENCES `khuyenmai` (`km_ma`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `FK_sanpham_loaisanpham` FOREIGN KEY (`lsp_ma`) REFERENCES `loaisanpham` (`lsp_ma`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_sanpham_nhasanxuat` FOREIGN KEY (`nsx_ma`) REFERENCES `nhasanxuat` (`nsx_ma`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table king.sanpham: ~51 rows (approximately)
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` (`sp_ma`, `sp_ten`, `sp_gia`, `sp_giacu`, `sp_mota_ngan`, `sp_mota_chitiet`, `sp_ngaycapnhat`, `sp_soluong`, `lsp_ma`, `nsx_ma`, `km_ma`) VALUES
	(1, 'Iphone 7 plus 128gb', 12000000.00, 12600000.00, 'Iphone 7 plus 128gb', 'Màn hình: Công nghệ màn hình LED-backlit IPS LCD rộng 5.5", Camera sau: Độ phân giải 2 camera 12 MP, Camera trước: Độ phân giải 7 MP, Hệ điều hành:	iOS 14, Chip xử lý (CPU): Apple A10 Fusion 4 nhân, Tốc độ CPU: 2.3 GHz, Chip đồ họa (GPU): Chip đồ họa 6 nhân, RAM: 3 GB, Bộ nhớ trong: 128 GB', '2020-12-22 11:20:30', 17, 3, 1, NULL),
	(2, 'Iphone 8 plus 128gb', 15800000.00, 16000000.00, 'Iphone 8 plus 128gb', 'Màn hình: Công nghệ màn hình LED-backlit IPS LCD rộng 5.5", Camera sau: Độ phân giải 2 camera 12 MP, Camera trước: Độ phân giải 7 MP, Hệ điều hành:	iOS 14, Chip xử lý (CPU): Apple A10 Fusion 4 nhân, Tốc độ CPU: 2.3 GHz, Chip đồ họa (GPU): Chip đồ họa 6 nhân, RAM: 3 GB, Bộ nhớ trong: 128 GB', '2021-01-12 10:04:45', 100, 3, 1, NULL),
	(3, 'Iphone 11 256gb black', 21890000.00, 22000000.00, 'Iphone 11 256gb black', 'Chi tiết iPhone 11', '2021-01-16 17:13:45', 100, 3, 1, NULL),
	(4, 'Iphone 11 pro max green', 24990000.00, 23000000.00, 'Iphone 11 pro max green', 'Chi tiết iPhone 11', '2021-01-16 17:14:55', 50, 3, 1, NULL),
	(5, 'Iphone SE 256gb', 15990000.00, 16000000.00, 'Iphone SE 256gb', 'Chi tiết iPhone SE', '2021-01-17 14:18:03', 50, 3, 1, NULL),
	(6, 'Iphone XS gold', 16990000.00, 17000000.00, 'Iphone XS gold', 'Chi tiết iPhone XS', '2021-01-17 14:19:10', 25, 3, 1, NULL),
	(7, 'Samsung Galaxy A21S', 7500000.00, 7950000.00, 'Samsung Galaxy A21S (8GB/128GB)', 'Chi tiết Samsung Galaxy A21S (8GB/128GB)', '2021-01-28 10:42:08', 13, 3, 2, NULL),
	(14, 'Samsung Galaxy A51', 8450000.00, 9000000.00, 'Samsung Galaxy A51 (8GB/128GB)', 'Samsung Galaxy A51 (8GB/128GB)', '2021-02-23 14:00:00', 50, 3, 2, NULL),
	(16, 'Samsung Galaxy S20', 17000000.00, 17500000.00, 'Samsung Galaxy S20', 'Samsung Galaxy S20', '2021-02-23 14:14:35', 53, 3, 2, NULL),
	(17, 'Samsung Galaxy A71', 8450000.00, 9450000.00, 'Samsung Galaxy A71', 'Samsung Galaxy A71', '2021-02-23 14:20:16', 40, 3, 2, NULL),
	(18, 'Samsung Galaxy Note 20', 21000000.00, 215000000.00, 'Samsung Galaxy Note 20', 'Samsung Galaxy Note 20', '2021-02-23 14:23:28', 30, 3, 2, NULL),
	(19, 'Xiaomi Redmi Note 9', 4000000.00, 5000000.00, 'Xiaomi Redmi Note 9', 'Xiaomi Redmi Note 9', '2021-02-23 14:26:07', 20, 3, 3, NULL),
	(20, 'Xiaomi Redmi Note 8', 4000000.00, 4500000.00, 'Xiaomi Redmi Note 8 (4GB/64GB)', 'Xiaomi Redmi Note 8 (4GB/64GB)', '2021-02-23 14:29:28', 20, 3, 3, NULL),
	(21, 'Xiaomi Mi Note 10 Lite', 13000000.00, 13500000.00, 'Xiaomi Mi Note 10 Lite', 'Xiaomi Mi Note 10 Lite', '2021-02-23 15:15:37', 20, 3, 3, NULL),
	(22, 'Xiaomi Mi Note 10 Pro', 15000000.00, 15500000.00, 'Xiaomi Mi Note 10 Pro', 'Xiaomi Mi Note 10 Pro', '2021-02-23 15:16:57', 30, 3, 3, NULL),
	(23, 'Xiaomi Redmi Note 9S', 12000000.00, 13000000.00, 'Xiaomi Redmi Note 9S', 'Xiaomi Redmi Note 9S', '2021-02-23 15:18:06', 50, 3, 3, NULL),
	(25, 'Realme C3', 3000000.00, 3500000.00, 'Realme C3', 'Realme C3', '2021-02-23 22:51:57', 20, 3, 12, NULL),
	(26, 'Realme 6 Pro', 7600000.00, 8000000.00, 'Realme 6 Pro', 'Realme 6 Pro', '2021-02-23 22:58:16', 30, 3, 12, NULL),
	(27, 'Vsmart Joy 3', 2600000.00, 3000000.00, 'Vsmart Joy 3 (4GB/64GB)', 'Vsmart Joy 3 (4GB/64GB)', '2021-02-23 23:01:35', 20, 3, 11, NULL),
	(28, 'Vsmart Live 4', 2600000.00, 3000000.00, 'Vsmart Live 4 6GB', 'Vsmart Live 4 6GB', '2021-03-23 00:00:00', 12, 3, 11, NULL),
	(29, 'Vsmart Star 3', 3400000.00, 3500000.00, 'Vsmart Star 3', 'Vsmart Star 3', '2021-02-23 23:11:43', 20, 3, 11, NULL),
	(30, 'Vsmart Star 4', 2300000.00, 2500000.00, 'Vsmart Star 4 (3GB/32GB)', 'Vsmart Star 4 (3GB/32GB)', '2021-02-23 23:12:46', 30, 3, 11, NULL),
	(31, 'Asus Gaming Rog Strix G512', 28490000.00, 29490000.00, 'Asus Gaming Rog Strix G512', 'Asus Gaming Rog Strix G512', '2021-02-23 23:30:47', 30, 2, 5, NULL),
	(32, 'Asus UX333FA', 25490000.00, 25490000.00, 'Asus UX333FA', 'Asus UX333FA', '2021-02-23 23:30:47', 30, 2, 5, NULL),
	(33, 'Asus Expertbook B9450F', 28490000.00, 29490000.00, 'Asus Asus Expertbook B9450F', 'Asus Expertbook B9450F', '2021-02-23 23:30:47', 30, 2, 5, NULL),
	(34, 'Asus Vivobook X509JA', 27490000.00, 27490000.00, 'Asus Asus Vivobook X509JA', 'Asus Vivobook X509JA', '2021-02-23 23:30:47', 30, 2, 5, NULL),
	(35, 'Asus vivobook X509MA', 28490000.00, 29490000.00, 'Asus Asus vivobook X509MA', 'Asus vivobook X509MA', '2021-02-23 23:30:47', 30, 2, 5, NULL),
	(36, 'DELL Inspiron 7373', 28890000.00, 29490000.00, 'DELL Inspiron 7373', 'DELL Inspiron 7373', '2021-02-23 23:40:27', 30, 2, 6, NULL),
	(37, 'DELL Vostro 3580', 25490000.00, 25490000.00, 'DELL Vostro 3580', 'DELL Vostro 3580', '2021-02-23 23:40:27', 30, 2, 6, NULL),
	(38, 'DELL XPS 13 9300', 30490000.00, 30490000.00, 'DELL XPS 13 9300', 'DELL XPS 13 9300', '2021-02-23 23:40:27', 30, 2, 6, NULL),
	(39, 'Macbook Air', 58890000.00, 59490000.00, 'Macbook Air', 'Macbook Air', '2021-02-23 23:50:14', 30, 2, 1, NULL),
	(40, 'Macbook Air 2020', 55490000.00, 55490000.00, 'Macbook Air 2020', 'Macbook Air 2020', '2021-02-23 23:50:14', 30, 2, 1, NULL),
	(41, 'HP 348 G7', 31490000.00, 31490000.00, 'HP 348 G7', 'HP 348 G7', '2021-02-23 23:50:14', 30, 2, 7, NULL),
	(42, 'Lenovo Ideapad S145', 22490000.00, 22490000.00, 'Lenovo Ideapad S145', 'Lenovo Ideapad S145', '2021-02-23 23:50:14', 30, 2, 8, NULL),
	(43, 'MSI Gaming Leopard 10SDR', 32490000.00, 31490000.00, 'MSI Gaming Leopard 10SDR', 'MSI Gaming Leopard 10SDR', '2021-02-23 23:50:14', 30, 2, 9, NULL),
	(44, 'Ipad Wifi Cellular 32gb 2019 gold', 10890000.00, 10490000.00, 'Ipad Wifi Cellular 32gb 2019 gold', 'Ipad Wifi Cellular 32gb 2019 gold', '2021-02-24 00:01:56', 30, 1, 1, NULL),
	(45, 'Ipad Air 2019 gold', 10790000.00, 10690000.00, 'Ipad Air 2019 gold', 'Ipad Air 2019 gold', '2021-02-24 00:01:56', 30, 1, 1, NULL),
	(46, 'Ipad mini 64gb 2019 gold', 10690000.00, 10590000.00, 'Ipad mini 64gb 2019 gold', 'Ipad mini 64gb 2019 gold', '2021-02-24 00:01:56', 30, 1, 1, NULL),
	(47, 'Ipad pro 128gb 2020', 10590000.00, 10490000.00, 'Ipad pro 128gb 2020', 'Ipad pro 128gb 2020', '2021-02-24 00:01:56', 30, 1, 1, NULL),
	(48, 'Samsung Galaxy tab A8 plus', 11890000.00, 11490000.00, 'Samsung Galaxy tab A8 plus', 'Samsung Galaxy tab A8 plus', '2021-02-24 00:01:56', 30, 1, 2, NULL),
	(49, 'Samsung Galaxy tab A8 T295 2019', 11790000.00, 11690000.00, 'Samsung Galaxy tab A8 T295 2019 silver', 'Samsung Galaxy tab A8 T295 2019 silver', '2021-02-24 00:01:56', 30, 1, 2, NULL),
	(50, 'Samsung Galaxy tab S6 lite', 10290000.00, 10390000.00, 'Samsung Galaxy tab S6 lite', 'Samsung Galaxy tab S6 lite', '2021-02-24 00:01:56', 30, 1, 2, NULL),
	(51, 'Tai nghe AirPods Pro sạc không dây Apple MWP22', 5890000.00, 6490000.00, 'Tai nghe AirPods Pro sạc không dây Apple MWP22', 'Tai nghe AirPods Pro sạc không dây Apple MWP22', '2021-02-24 00:10:51', 30, 4, 1, NULL),
	(52, 'Tai nghe nhét trong EarPods Lightning Apple MMTN2', 890000.00, 990000.00, 'Tai nghe nhét trong EarPods Lightning Apple MMTN2', 'Tai nghe nhét trong EarPods Lightning Apple MMTN2', '2021-02-24 00:10:51', 30, 4, 1, NULL),
	(53, 'Tai nghe Bluetooth True Wireless Samsung Buds Pro', 4790000.00, 4690000.00, 'Tai nghe Bluetooth True Wireless Samsung Buds Pro', 'Tai nghe Bluetooth True Wireless Samsung Buds Pro', '2021-02-24 00:10:51', 30, 4, 2, NULL),
	(54, 'Tai nghe nhét tai Samsung IG935B', 290000.00, 390000.00, 'Tai nghe nhét tai Samsung IG935B', 'Tai nghe nhét tai Samsung IG935B', '2021-02-24 00:10:51', 30, 4, 2, NULL),
	(55, 'Apple Watch S6 LTE 40mm', 5890000.00, 6490000.00, 'Tai nghe Apple Watch S6 LTE 40mm', 'Apple Watch S6 LTE 40mm', '2021-02-24 00:20:04', 30, 8, 1, NULL),
	(56, 'Apple Watch S5 LTE 44mm', 2890000.00, 2990000.00, 'Apple Watch S5 LTE 44mm', 'Apple Watch S5 LTE 44mm', '2021-02-24 00:20:04', 30, 8, 1, NULL),
	(57, 'Huawei Watch GT2 Pro 46mm dây silicone\r\n', 4790000.00, 4690000.00, 'Huawei Watch GT2 Pro 46mm dây silicone\r\n', 'Huawei Watch GT2 Pro 46mm dây silicone\r\n', '2021-02-24 00:20:04', 30, 8, 4, NULL),
	(58, 'Huawei Watch Fit dây silicone', 3290000.00, 3390000.00, 'Huawei Watch Fit dây silicone', 'Huawei Watch Fit dây silicone', '2021-02-24 00:20:04', 30, 8, 4, NULL),
	(61, 'aaaa', 3433333.00, 9999999999.99, 'aaaaaâ', 'ssssssssssssss', '2021-02-26 08:20:31', 12, 8, 4, NULL),
	(62, 'test 1', 2222.00, 2.00, '2', '2', '2021-02-26 13:27:11', 2, 3, 6, NULL);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;

-- Dumping structure for table king.sanpham_dondathang
CREATE TABLE IF NOT EXISTS `sanpham_dondathang` (
  `sp_ma` int(11) unsigned NOT NULL,
  `dh_ma` int(11) unsigned NOT NULL,
  `sp_dh_soluong` int(11) NOT NULL,
  `sp_dh_dongia` decimal(12,2) NOT NULL,
  PRIMARY KEY (`sp_ma`,`dh_ma`),
  KEY `sanpham_donhang_sanpham_idx` (`sp_ma`),
  KEY `sanpham_donhang_dondathang_idx` (`dh_ma`),
  CONSTRAINT `sanpham_donhang_dondathang` FOREIGN KEY (`dh_ma`) REFERENCES `dondathang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sanpham_donhang_sanpham` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table king.sanpham_dondathang: ~18 rows (approximately)
/*!40000 ALTER TABLE `sanpham_dondathang` DISABLE KEYS */;
INSERT INTO `sanpham_dondathang` (`sp_ma`, `dh_ma`, `sp_dh_soluong`, `sp_dh_dongia`) VALUES
	(1, 5, 3, 12000000.00),
	(5, 5, 2, 10990000.00),
	(7, 4, 1, 7500000.00),
	(17, 7, 1000, 8450000.00),
	(20, 7, 100, 4000000.00),
	(30, 13, 20, 2300000.00),
	(31, 7, 20, 28490000.00),
	(34, 12, 13, 27490000.00),
	(37, 7, 10, 25490000.00),
	(43, 11, 13, 32490000.00),
	(49, 5, 4, 7777777.00),
	(49, 10, 4, 11790000.00),
	(49, 11, 20, 11790000.00),
	(49, 13, 13, 11790000.00),
	(50, 5, 4, 7777777.00),
	(51, 5, 4, 7777777.00),
	(52, 5, 4, 7777777.00),
	(53, 5, 4, 7777777.00),
	(54, 5, 4, 7777777.00),
	(55, 5, 4, 7777777.00),
	(56, 5, 4, 7777777.00);
/*!40000 ALTER TABLE `sanpham_dondathang` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
