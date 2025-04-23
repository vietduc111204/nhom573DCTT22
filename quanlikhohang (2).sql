-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2025 lúc 10:46 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlikhohang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `Madanhmuc` varchar(100) NOT NULL,
  `Tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsp`
--

INSERT INTO `danhmucsp` (`Madanhmuc`, `Tendanhmuc`) VALUES
('DM001', 'Quần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `Madonhang` varchar(50) NOT NULL,
  `Tendonhang` varchar(100) NOT NULL,
  `Makhuyenmai` varchar(50) NOT NULL,
  `MaSP` varchar(100) NOT NULL,
  `Makh` varchar(200) NOT NULL,
  `Thanhtien` int(255) NOT NULL,
  `Trangthai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`Madonhang`, `Tendonhang`, `Makhuyenmai`, `MaSP`, `Makh`, `Thanhtien`, `Trangthai`) VALUES
('DH001', 'Áo', 'KM002', 'SP001', 'KH001', 22000000, 'Đã thanh toán'),
('DH002', 'Quần', 'KM002', 'SP002', 'KH002', 100000, 'còn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `Makh` varchar(50) NOT NULL,
  `Tenkh` varchar(50) NOT NULL,
  `Sdt` varchar(11) NOT NULL,
  `Diachi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`Makh`, `Tenkh`, `Sdt`, `Diachi`) VALUES
('KH001', 'Đào Huy Hoàng', '0986356126', 'Ba Vì'),
('KH002', 'Trần Hữu Toàn', '0874683921', 'Hà Nội'),
('KH003', 'Nguyễn Văn Hoàn', '0748392493', 'Nghệ An'),
('KH004', 'Lê Tuấn Đạt', '0974382193', 'Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khohang`
--

CREATE TABLE `khohang` (
  `Makho` varchar(100) NOT NULL,
  `Tenkho` varchar(100) NOT NULL,
  `Diachi` varchar(255) NOT NULL,
  `Sdt` varchar(100) NOT NULL,
  `Tenquanly` varchar(100) NOT NULL,
  `Ghichu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khohang`
--

INSERT INTO `khohang` (`Makho`, `Tenkho`, `Diachi`, `Sdt`, `Tenquanly`, `Ghichu`) VALUES
('KH002', 'Kho hàng B', 'Địa chỉ kho B', '0987654321', 'Quản lý B', 'Ghi chú B'),
('KH003', 'Kho hàng B', 'Địa chỉ kho B', '0987654321', 'Quản lý B', 'Ghi chú B'),
('KH004', 'Kho hàng B', 'Địa chỉ kho B', '0987654321', 'Quản lý B', 'Ghi chú B'),
('KH005', 'Kho hàng B', 'Địa chỉ kho B', '0987654321', 'Quản lý B', 'Ghi chú B'),
('MK001', 'Hà Tĩnh', 'Hà Tĩnh', '0984827123', 'Bùi Việt Đức', 'không'),
('MK002', 'Kho hang M', 'Lao Cai', '0822483729', 'Bùi Việt Đức', 'không'),
('MK003', 'Hải Dương', 'Hải Dương', '0987129485', 'Vũ Đức Chung', 'không'),
('MK004', 'Hà Nội', 'Hà Nội', '0324875483', 'Lê Tuấn Đạt', 'không'),
('MK006', 'Kho hang Z', 'Hà Giang', '0983748329', 'Nguyễn Tấn Khoa', 'không');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `Makhuyenmai` varchar(100) NOT NULL,
  `Giatrikm` varchar(50) NOT NULL,
  `MaSP` varchar(50) NOT NULL,
  `Mota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`Makhuyenmai`, `Giatrikm`, `MaSP`, `Mota`) VALUES
('', 'Giảm giá 10%', 'SP001', 'Giảm giá cho khách hàng'),
('KM001', '10%', 'SP001', 'không'),
('KM002', '20%', 'SP002', 'không'),
('KM003', '50%', 'SP003', 'không'),
('KM004', '15%', 'SP004', 'không'),
('KM005', 'Giảm giá 20%', 'SP002', 'Giảm giá cho khách hàng mới');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `Mancc` varchar(50) NOT NULL,
  `Tenncc` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Sdt` varchar(100) NOT NULL,
  `Diachi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`Mancc`, `Tenncc`, `Email`, `Sdt`, `Diachi`) VALUES
('NCC002', 'Bùi Việt Đức', 'duc@gmail.com', '0822483729', 'Lạng Sơn'),
('NCC004', 'Lê Tuấn Đạt', 'ledat@gmail.com', '0975382951', 'Hà Nội'),
('NCC001', 'Nguyễn Văn Hoàn', 'Hoan@gmail.com', '0975734654', 'Hà Tĩnh'),
('NCC003', 'Vũ Đức Chung', 'chunghd@gmail.com', '0987129485', 'Hải Dương');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhapkho`
--

CREATE TABLE `nhapkho` (
  `Manhapkho` varchar(50) NOT NULL,
  `Tenncc` varchar(50) NOT NULL,
  `Tennguoinhap` varchar(50) NOT NULL,
  `MaSP` varchar(50) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `Mancc` varchar(50) NOT NULL,
  `Makho` varchar(50) NOT NULL,
  `Soluong` int(50) NOT NULL,
  `Dongia` decimal(50,0) NOT NULL,
  `Ngaynhap` date NOT NULL,
  `Mota` varchar(50) NOT NULL,
  `Madanhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhapkho`
--

INSERT INTO `nhapkho` (`Manhapkho`, `Tenncc`, `Tennguoinhap`, `MaSP`, `TenSP`, `Mancc`, `Makho`, `Soluong`, `Dongia`, `Ngaynhap`, `Mota`, `Madanhmuc`) VALUES
('NK001', 'Nguyễn Văn Hoàn', 'Hoàng Văn Quân', 'SP001', 'Quần Jeans', 'NCC001', 'MK002', 0, 100000, '1111-11-11', 'không', 'DM001'),
('NK002', 'Bùi Việt Đức', 'Hoàng Văn Quân', 'SP002', 'Giày Jordan', 'NCC002', 'MK002', 50, 1000000, '1111-11-11', 'không', 'DM001'),
('NK003', 'Lê Tuấn Đạt', 'Hoàng Văn Quân', 'SP003', 'Giày Jordan', 'NCC004', 'MK001', 112, 20000, '2024-05-11', 'không', 'DM001'),
('NK004', 'Vũ Đức Chung', 'Hoàng Văn Quân', '', '', 'NCC003', '', 50, 0, '2024-02-20', '', ''),
('NK006', 'Bùi Việt Đức', 'Hoàng Văn Quân', '', '', 'NCC002', '', 15, 0, '2023-11-11', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` varchar(100) NOT NULL,
  `TenSP` varchar(100) NOT NULL,
  `Madanhmuc` varchar(50) NOT NULL,
  `Manhacc` varchar(50) NOT NULL,
  `Makho` varchar(50) NOT NULL,
  `Mota` varchar(50) NOT NULL,
  `Dongia` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Madanhmuc`, `Manhacc`, `Makho`, `Mota`, `Dongia`) VALUES
('SP001', 'Quần Jeans', '', '0', '', '', 0),
('SP002', 'Giày Jordan', '', '0', '', '', 0),
('SP003', 'Áo thun', '', '0', '', '', 0),
('SP004', 'Áo khoác', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Taikhoan` varchar(100) NOT NULL,
  `Matkhau` varchar(100) NOT NULL,
  `Tennguoidung` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Sodienthoai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`Taikhoan`, `Matkhau`, `Tennguoidung`, `Email`, `Sodienthoai`) VALUES
('admin', '1234567', 'Bùi Việt Đức', 'buiduc1248@gmail.com', '0822320902');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tonkho`
--

CREATE TABLE `tonkho` (
  `Makho` varchar(50) NOT NULL,
  `MaSP` varchar(50) NOT NULL,
  `Soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tonkho`
--

INSERT INTO `tonkho` (`Makho`, `MaSP`, `Soluong`) VALUES
('MK001', 'SP001', 53),
('MK001', 'SP004', 3),
('MK002', 'SP001', 57),
('MK002', 'SP004', 1),
('MK004', 'SP004', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatkho`
--

CREATE TABLE `xuatkho` (
  `Maxuatkho` varchar(50) NOT NULL,
  `Nguoixuatkho` varchar(50) NOT NULL,
  `Madonhang` varchar(50) NOT NULL,
  `MaSP` varchar(50) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `Dongia` decimal(50,0) NOT NULL,
  `Soluong` int(55) NOT NULL,
  `Makho` varchar(50) NOT NULL,
  `Ngayxuatkho` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xuatkho`
--

INSERT INTO `xuatkho` (`Maxuatkho`, `Nguoixuatkho`, `Madonhang`, `MaSP`, `TenSP`, `Dongia`, `Soluong`, `Makho`, `Ngayxuatkho`) VALUES
('XK001', 'Nguyễn Văn Hoàn', 'DH001', 'SP001', 'Quần Jeans', 200000, 47, 'MK002', '2023-11-11'),
('XK002', 'Nguyễn Văn Hoàn', 'DH001', 'SP002', 'Giày Jordan', 500000, 10, 'MK002', '2023-11-11'),
('XK003', 'Nguyễn Văn Hoàn', '', '', '', 0, 20, '', '2023-11-11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`Madanhmuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`Madonhang`),
  ADD KEY `tbmspp` (`MaSP`),
  ADD KEY `tbmkm` (`Makhuyenmai`),
  ADD KEY `tbmkh` (`Makh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Makh`);

--
-- Chỉ mục cho bảng `khohang`
--
ALTER TABLE `khohang`
  ADD PRIMARY KEY (`Makho`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`Makhuyenmai`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`Tenncc`);

--
-- Chỉ mục cho bảng `nhapkho`
--
ALTER TABLE `nhapkho`
  ADD PRIMARY KEY (`Manhapkho`),
  ADD KEY `tbmncc` (`Mancc`),
  ADD KEY `tbmk` (`Makho`),
  ADD KEY `tbmdm` (`Madanhmuc`),
  ADD KEY `MaSP` (`MaSP`),
  ADD KEY `Tenncc` (`Tenncc`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Tennguoidung`);

--
-- Chỉ mục cho bảng `tonkho`
--
ALTER TABLE `tonkho`
  ADD PRIMARY KEY (`Makho`,`MaSP`);

--
-- Chỉ mục cho bảng `xuatkho`
--
ALTER TABLE `xuatkho`
  ADD PRIMARY KEY (`Maxuatkho`),
  ADD KEY `tbmdhh` (`Madonhang`),
  ADD KEY `tbmkkkk` (`Makho`),
  ADD KEY `tbmspppp` (`MaSP`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`Makhuyenmai`) REFERENCES `khuyenmai` (`Makhuyenmai`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`Makh`) REFERENCES `khachhang` (`Makh`);

--
-- Các ràng buộc cho bảng `nhapkho`
--
ALTER TABLE `nhapkho`
  ADD CONSTRAINT `nhapkho_ibfk_3` FOREIGN KEY (`Tenncc`) REFERENCES `nhacungcap` (`Tenncc`);

--
-- Các ràng buộc cho bảng `tonkho`
--
ALTER TABLE `tonkho`
  ADD CONSTRAINT `tbmk` FOREIGN KEY (`Makho`) REFERENCES `khohang` (`Makho`);

--
-- Các ràng buộc cho bảng `xuatkho`
--
ALTER TABLE `xuatkho`
  ADD CONSTRAINT `xuatkho_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `nhapkho` (`MaSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
