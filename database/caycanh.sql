-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 21, 2025 lúc 01:14 PM
-- Phiên bản máy phục vụ: 9.1.0
-- Phiên bản PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `caycanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `ChiTietDonHangID` int NOT NULL AUTO_INCREMENT,
  `DonHangID` int NOT NULL,
  `SanPhamID` int NOT NULL,
  `SoLuong` int NOT NULL,
  `GiaBanTaiThoiDiem` decimal(10,2) NOT NULL,
  `TongThanhTien` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ChiTietDonHangID`),
  KEY `SanPhamID` (`SanPhamID`),
  KEY `DonHangID` (`DonHangID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ChiTietDonHangID`, `DonHangID`, `SanPhamID`, `SoLuong`, `GiaBanTaiThoiDiem`, `TongThanhTien`) VALUES
(1, 1, 1, 2, 150000.00, 300000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `DonHangID` int NOT NULL AUTO_INCREMENT,
  `TaiKhoanID` int DEFAULT NULL,
  `NgayDatHang` datetime DEFAULT CURRENT_TIMESTAMP,
  `TongTien` decimal(10,2) NOT NULL,
  `TrangThaiDonHang` varchar(50) NOT NULL DEFAULT 'Đang chờ xử lý',
  `TenNguoiNhan` varchar(100) NOT NULL,
  `DiaChiGiaoHang` text NOT NULL,
  `DienThoaiNguoiNhan` varchar(20) DEFAULT NULL,
  `PhuongThucThanhToan` varchar(50) DEFAULT NULL,
  `TrangThaiThanhToan` varchar(50) DEFAULT 'Chưa thanh toán',
  PRIMARY KEY (`DonHangID`),
  KEY `TaiKhoanID` (`TaiKhoanID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`DonHangID`, `TaiKhoanID`, `NgayDatHang`, `TongTien`, `TrangThaiDonHang`, `TenNguoiNhan`, `DiaChiGiaoHang`, `DienThoaiNguoiNhan`, `PhuongThucThanhToan`, `TrangThaiThanhToan`) VALUES
(1, 2, '2025-12-08 20:07:57', 330000.00, 'Đang chờ xử lý', 'Trần Thị B', '45 Lê Lợi, Phường 1, TP. Hồ Chí Minh', '0912345678', 'COD', 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaicay`
--

DROP TABLE IF EXISTS `loaicay`;
CREATE TABLE IF NOT EXISTS `loaicay` (
  `LoaiCayID` int NOT NULL AUTO_INCREMENT,
  `TenLoai` varchar(100) NOT NULL,
  `MoTa` text,
  `NgayTao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`LoaiCayID`),
  UNIQUE KEY `TenLoai` (`TenLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `loaicay`
--

INSERT INTO `loaicay` (`LoaiCayID`, `TenLoai`, `MoTa`, `NgayTao`) VALUES
(1, 'Cây Cảnh Nội Thất', 'Các loại cây ưa bóng, phù hợp đặt trong nhà và văn phòng.', '2025-12-08 20:06:52'),
(2, 'Cây Cổ thụ', 'Các loại cây có táng lớn, độ phủ bóng to, phù hợp trồng ngoài khu vực lớn', '2025-12-08 20:06:52'),
(3, 'Cây văn phòng', 'Cây trồng trong văn phòng', '2025-12-21 20:12:18'),
(4, 'Cây cảnh ngoài trời', 'Cây trồng sân vườn', '2025-12-21 20:12:18'),
(5, 'Cây leo', 'Cây thân leo trang trí', '2025-12-21 20:12:18'),
(6, 'Xương rồng & sen đá', 'Cây dễ chăm sóc', '2025-12-21 20:12:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `SanPhamID` int NOT NULL AUTO_INCREMENT,
  `MaSKU` varchar(50) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `MoTa` text,
  `GiaBan` decimal(10,2) NOT NULL,
  `SoLuongTonKho` int DEFAULT '0',
  `LoaiCayID` int DEFAULT NULL,
  `HinhAnhURL` text,
  `TrangThai` varchar(50) NOT NULL DEFAULT 'Còn hàng',
  `NgayCapNhat` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`SanPhamID`),
  UNIQUE KEY `MaSKU` (`MaSKU`),
  KEY `LoaiCayID` (`LoaiCayID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`SanPhamID`, `MaSKU`, `TenSanPham`, `MoTa`, `GiaBan`, `SoLuongTonKho`, `LoaiCayID`, `HinhAnhURL`, `TrangThai`, `NgayCapNhat`) VALUES
(1, 'NTT01', 'Cây Lưỡi Hổ Mini', 'Cây dễ chăm sóc, lọc không khí tốt, phù hợp cho bàn làm việc.', 150000.00, 50, 1, '/image/cay1.jpg', 'Còn hàng', '2025-12-08 22:27:48'),
(2, 'NTT02', 'Cây Monstera', 'Cây lá to đẹp, phù hợp không gian rộng.', 220000.00, 40, 1, '/image/cay2.jpg', 'Còn hàng', '2025-12-08 22:27:59'),
(3, 'NTT03', 'Sen Đá Mini', 'Cây nhỏ gọn, dễ chăm sóc.', 80000.00, 100, 1, '/image/cay3.jpg', 'Còn hàng', '2025-12-08 22:28:10'),
(4, 'NTT04', 'Cây Bàng Singapore', 'Cây cao, sang trọng cho phòng khách.', 350000.00, 20, 1, '/image/cay4.jpg', 'Còn hàng', '2025-12-08 22:28:20'),
(5, 'NTT05', 'Cây Kim Tiền', 'Mang ý nghĩa phong thủy tốt.', 180000.00, 60, 1, '/image/cay5.jpg', 'Còn hàng', '2025-12-08 22:28:33'),
(6, 'NTT06', 'Cây Lan Ý', 'Thanh lọc không khí tốt.', 200000.00, 40, 1, '/image/cay1.jpg', 'Còn hàng', '2025-12-08 22:28:44'),
(7, 'NTT07', 'Cây Mẫu Tử', 'Cây thả rũ đẹp.', 120000.00, 30, 1, '/image/cay2.jpg', 'Còn hàng', '2025-12-08 22:28:57'),
(8, 'NTT08', 'Cây Bonsai Mini', 'Trang trí bàn làm việc.', 550000.00, 15, 1, '/image/cay3.jpg', 'Còn hàng', '2025-12-08 22:29:08'),
(9, 'CAY009', 'Cây Vạn Lộc', 'Màu sắc nổi bật', 300000.00, 40, 2, '/image/cay4.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(10, 'CAY010', 'Cây Lan Ý', 'Thanh lọc không khí', 270000.00, 45, 3, '/image/cay5.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(11, 'CAY011', 'Cây Bàng Singapore', 'Trang trí sang trọng', 950000.00, 20, 3, '/image/cay1.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(12, 'CAY012', 'Cây Dây Nhện', 'Dễ trồng', 160000.00, 60, 5, '/image/cay2.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(13, 'CAY013', 'Cây Trúc Phú Quý', 'Mang tài lộc', 220000.00, 55, 2, '/image/cay3.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(14, 'CAY014', 'Cây Hoa Giấy', 'Trang trí sân vườn', 400000.00, 25, 4, '/image/cay4.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(15, 'CAY015', 'Cây Hồng Môn', 'Hoa đẹp, bền', 350000.00, 30, 1, '/image/cay5.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(16, 'CAY016', 'Cây Cọ Nhật', 'Trang trí nội thất', 600000.00, 20, 3, '/image/cay1.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(17, 'CAY017', 'Cây Tùng La Hán', 'Cây cảnh ngoài trời', 1200000.00, 10, 4, '/image/cay2.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(18, 'CAY018', 'Cây Phú Quý', 'Dễ trồng', 240000.00, 45, 2, '/image/cay3.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(19, 'CAY019', 'Cây Trầu Bà Đế Vương', 'Lá to đẹp', 450000.00, 30, 5, '/image/cay4.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(20, 'CAY020', 'Sen Đá Chuỗi Ngọc', 'Trang trí bàn', 110000.00, 90, 6, '/image/cay5.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(21, 'CAY021', 'Xương Rồng Tai Thỏ', 'Dễ thương', 130000.00, 85, 6, '/image/cay1.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(22, 'CAY022', 'Cây Mai Vạn Phúc', 'Hoa thơm', 380000.00, 30, 4, '/image/cay2.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(23, 'CAY023', 'Cây Hạnh Phúc', 'Gia đình êm ấm', 500000.00, 25, 3, '/image/cay3.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(24, 'CAY024', 'Cây Ngũ Gia Bì', 'Đuổi muỗi', 260000.00, 50, 3, '/image/cay4.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(25, 'CAY025', 'Cây Trầu Bà Sữa', 'Lá viền trắng', 300000.00, 40, 5, '/image/cay5.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(26, 'CAY026', 'Cây Lộc Nhung', 'Phong thủy', 190000.00, 55, 2, '/image/cay1.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(27, 'CAY027', 'Cây Đa Búp Đỏ', 'Trang trí phòng khách', 850000.00, 15, 3, '/image/cay2.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(28, 'CAY028', 'Cây Sung Cảnh', 'Ý nghĩa phong thủy', 700000.00, 18, 4, '/image/cay3.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(29, 'CAY029', 'Cây Dương Xỉ', 'Lọc không khí', 210000.00, 50, 5, '/image/cay4.jpg', 'Đang bán', '2025-12-21 20:13:14'),
(30, 'CAY030', 'Sen Đá Kim Cương', 'Mini đẹp', 95000.00, 120, 6, '/image/cay5.jpg', 'Đang bán', '2025-12-21 20:13:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `TaiKhoanID` int NOT NULL AUTO_INCREMENT,
  `MaDinhDanh` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `LoaiTaiKhoan` varchar(20) NOT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `DiaChiGiaoHangMacDinh` text,
  `NgayTao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TaiKhoanID`),
  UNIQUE KEY `MaDinhDanh` (`MaDinhDanh`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`TaiKhoanID`, `MaDinhDanh`, `Email`, `MatKhau`, `HoTen`, `LoaiTaiKhoan`, `DienThoai`, `DiaChiGiaoHangMacDinh`, `NgayTao`) VALUES
(1, 'NV001', 'admin@gmail.com', 'letrongduy', 'Trong Duy', 'Admin', NULL, NULL, '2025-12-08 20:05:03'),
(2, 'KH1001', 'khachhang@gmail.com', '123456789', 'Khach hang', 'Customer', '0912345678', '45 Lê Lợi, Phường 1, TP. Hồ Chí Minh', '2025-12-08 20:05:03'),
(3, 'KH0003', '123@gmail.com', '123456', 'Nguyễn Văn a', 'Customer', '0905472984', 'không có', '2025-12-09 00:39:53'),
(4, 'KH0004', 'hauta@gmail.com', '123456', 'Tạ Minh Hậu', 'Admin', '0905472984', 'trường đại học công nghệ sài gòn', '2025-12-09 00:45:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

DROP TABLE IF EXISTS `thanhtoan`;
CREATE TABLE IF NOT EXISTS `thanhtoan` (
  `ThanhToanID` int NOT NULL AUTO_INCREMENT,
  `DonHangID` int NOT NULL,
  `SoTienThanhToan` decimal(10,2) NOT NULL,
  `NgayThanhToan` datetime DEFAULT CURRENT_TIMESTAMP,
  `PhuongThuc` varchar(50) NOT NULL,
  `MaGiaoDich` varchar(255) DEFAULT NULL,
  `TrangThai` varchar(50) NOT NULL,
  PRIMARY KEY (`ThanhToanID`),
  UNIQUE KEY `DonHangID` (`DonHangID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`ThanhToanID`, `DonHangID`, `SoTienThanhToan`, `NgayThanhToan`, `PhuongThuc`, `MaGiaoDich`, `TrangThai`) VALUES
(1, 1, 330000.00, '2025-12-08 20:08:25', 'VNPay', 'VNP_20251208_ABCXYZ', 'Thành công');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`SanPhamID`) REFERENCES `sanpham` (`SanPhamID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_3` FOREIGN KEY (`DonHangID`) REFERENCES `donhang` (`DonHangID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`TaiKhoanID`) REFERENCES `taikhoan` (`TaiKhoanID`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`LoaiCayID`) REFERENCES `loaicay` (`LoaiCayID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD CONSTRAINT `thanhtoan_ibfk_1` FOREIGN KEY (`DonHangID`) REFERENCES `donhang` (`DonHangID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
