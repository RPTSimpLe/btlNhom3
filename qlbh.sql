-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th12 25, 2023 lúc 06:29 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hoa_dons`
--

CREATE TABLE `chi_tiet_hoa_dons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `soLuong` varchar(255) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `tienHang` int(11) NOT NULL,
  `hoaDon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hoa_dons`
--

INSERT INTO `chi_tiet_hoa_dons` (`id`, `soLuong`, `tenSanPham`, `tienHang`, `hoaDon_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'Laptop Dell Vostro 3530 V5I3001W1 Gray', 20000, 1, '2023-12-17 09:15:45', '2023-12-17 09:15:45'),
(2, '2', 'Laptop Acer Aspire 3 A315 59 321N', 10000000, 1, '2023-12-17 09:15:45', '2023-12-17 09:15:45'),
(3, '1', 'Laptop gaming Lenovo LOQ 15IRH8 82XV00D5VN', 5620000, 2, '2023-12-17 09:16:08', '2023-12-17 09:16:08'),
(4, '1', 'Laptop gaming Acer Predator Helios 300 PH315 55 751D', 9780000, 3, '2023-12-17 09:16:40', '2023-12-17 09:16:40'),
(5, '1', 'Laptop Acer Aspire 3 A315 59 321N', 5000000, 4, '2023-12-17 09:17:19', '2023-12-17 09:17:19'),
(6, '1', 'Laptop Dell Vostro 3530 V5I3001W1 Gray', 20000, 5, '2023-12-19 18:38:35', '2023-12-19 18:38:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gias`
--

CREATE TABLE `danh_gias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `danhGia` varchar(2000) NOT NULL,
  `soSao` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sanPham_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_gias`
--

INSERT INTO `danh_gias` (`id`, `danhGia`, `soSao`, `user_id`, `sanPham_id`, `created_at`, `updated_at`) VALUES
(1, 'hàng đẹp', 4, 2, 3, '2023-12-17 09:19:18', '2023-12-17 09:19:18'),
(2, '`10 diem', 5, 2, 3, '2023-12-19 18:39:23', '2023-12-19 18:39:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Gaming', '2023-12-17 08:38:33', '2023-12-17 08:38:33'),
(2, 'Sinh Viên - VP', '2023-12-17 08:38:39', '2023-12-17 08:38:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `soLuong` int(11) NOT NULL,
  `tongTien` bigint(20) NOT NULL,
  `sanPham_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_dons`
--

CREATE TABLE `hoa_dons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `ghiChu` varchar(255) NOT NULL,
  `tongTien` bigint(20) NOT NULL,
  `ship` int(11) NOT NULL DEFAULT 20000,
  `giamGia` int(11) NOT NULL DEFAULT 0,
  `danhGia` varchar(255) DEFAULT NULL,
  `TrangThai` varchar(255) NOT NULL DEFAULT 'Chờ xác nhận',
  `hinhThucThanhToan` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_dons`
--

INSERT INTO `hoa_dons` (`id`, `diaChi`, `ghiChu`, `tongTien`, `ship`, `giamGia`, `danhGia`, `TrangThai`, `hinhThucThanhToan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'rtrt', 'weerewtty', 10040000, 20000, 0, 'đã đánh giá', 'Đã giao', 'VNpay', 2, '2023-12-17 09:15:45', '2023-12-17 09:19:18'),
(2, 'fsfs', 'fsfwsteeyhrtyfu', 5640000, 20000, 0, NULL, 'Chờ giao hàng', 'Thanh toán khi nhận hàng', 2, '2023-12-17 09:16:08', '2023-12-17 09:18:07'),
(3, 'asdasdasdas', 'soudfheosfhs', 9800000, 20000, 0, NULL, 'Chờ xác nhận', 'Thanh toán khi nhận hàng', 2, '2023-12-17 09:16:40', '2023-12-17 09:16:40'),
(4, 'yhrtfew', 'er3wt4e5yit78uipo[', 4520000, 20000, 0, 'đã đánh giá', 'Đã giao', 'VNpay', 2, '2023-12-17 09:17:19', '2023-12-19 18:39:23'),
(5, 'adasd', 'asdasasda', 38000, 20000, 0, NULL, 'Chờ xác nhận', 'VNpay', 2, '2023-12-19 18:38:35', '2023-12-19 18:38:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sanPham_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `url`, `user_id`, `created_at`, `updated_at`, `sanPham_id`) VALUES
(1, 'img_1702827606_.webp', NULL, '2023-12-17 08:40:06', '2023-12-17 08:40:06', 1),
(2, 'img_1702827708_.webp', NULL, '2023-12-17 08:41:48', '2023-12-17 08:41:48', 2),
(3, 'img_1702827794_.webp', NULL, '2023-12-17 08:43:14', '2023-12-17 08:43:14', 3),
(4, 'img_1702828026_.webp', NULL, '2023-12-17 08:47:06', '2023-12-17 08:47:06', 5),
(5, 'img_1702828103_.webp', NULL, '2023-12-17 08:48:23', '2023-12-17 08:48:23', 6),
(6, 'img_1702828159_.webp', NULL, '2023-12-17 08:49:19', '2023-12-17 08:49:19', 7),
(7, 'img_1702828231_.webp', NULL, '2023-12-17 08:50:31', '2023-12-17 08:50:31', 8),
(8, 'img_1702828296_.webp', NULL, '2023-12-17 08:51:36', '2023-12-17 08:51:36', 9),
(9, 'img_1702828348_.webp', NULL, '2023-12-17 08:52:28', '2023-12-17 08:52:28', 10),
(10, 'img_1702828419_.webp', NULL, '2023-12-17 08:53:39', '2023-12-17 08:53:39', 11),
(11, 'img_1702828569_.webp', NULL, '2023-12-17 08:56:09', '2023-12-17 08:56:09', 12),
(12, 'img_1702829572_.png', NULL, '2023-12-17 09:12:52', '2023-12-17 09:12:52', 4),
(13, 'img_1703036516_.webp', NULL, '2023-12-19 18:41:56', '2023-12-19 18:41:56', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_10_08_092958_create_images_table', 1),
(5, '2023_11_01_143712_create_danh_mucs_table', 1),
(6, '2023_11_01_143815_create_san_phams_table', 1),
(7, '2023_11_01_145247_create_gio_hangs_table', 1),
(8, '2023_11_01_145344_create_hoa_dons_table', 1),
(9, '2023_11_01_149221_create_chi_tiet_hoa_dons_table', 1),
(10, '2023_11_01_150616_add_image_id_to_sanPhams', 1),
(11, '2023_11_03_015604_create_thong_ke_tong', 1),
(12, '2023_11_03_164030_create_thong_ke_chi', 1),
(13, '2023_11_04_021722_create_thong_ke_thu', 1),
(14, '2023_11_06_163922_create_danh_gias_table', 1),
(15, '2023_11_20_144119_create_thong_ke_ngays_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_phams`
--

CREATE TABLE `san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(255) NOT NULL,
  `nhaSX` varchar(255) NOT NULL,
  `namSX` int(11) NOT NULL,
  `tonKho` varchar(255) NOT NULL,
  `moTa` varchar(2000) NOT NULL,
  `baoHanh` varchar(255) NOT NULL,
  `giaBan` bigint(20) NOT NULL,
  `giaNhap` bigint(20) NOT NULL,
  `danhMuc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten`, `nhaSX`, `namSX`, `tonKho`, `moTa`, `baoHanh`, `giaBan`, `giaNhap`, `danhMuc_id`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Dell Vostro 3530 V5I3001W1 Gray', 'Acer', 2021, '22', 'CPU	Intel Core i3-1305U (3.3GHz~ 4.5GHz) 5 Cores 6 Threads\r\nRAM	8GB (8x1) DDR4 2666MHz (2x SO-DIMM socket, up to 16GB SDRAM)\r\nỔ cứng	256GB SSD M.2 PCIE\r\nCard đồ họa	\r\nIntel® UHD Graphics \r\nMàn hình	15.6 Inch FHD (1920 x 1080), 120Hz, WVA,  Anti-glare, 250 nits\r\nCổng kết nối	\r\n1 x USB 3.2 Gen 1 port\r\n1 x USB 2.0 port\r\n1 x USB 3.2 Gen 1 Type-Cport\r\n1 x Universal audio \r\n1 x HDMI 1.4 \r\n1 x RJ45 Ethernet\r\n1 x Power-adapter\r\nAudio	Stereo speakers, 2 W x 2 = 4 W total\r\nWebcam	720p@30FPS HD Camera\r\nĐọc thẻ nhớ	SD card slot\r\nChuẩn WiFi	802.11 AC\r\nChuẩn LAN	RJ45\r\nBluetooth	5.2\r\nWebcam	720p at 30 fps HD camera, single-integrated microphone\r\nHệ điều hành	Windows 11 Home + Office Home & Student 2021\r\nPin	3 Cell 41WHr\r\nTrọng lượng	1.66 kg\r\nMàu sắc	Xám\r\nKích thước	358.5 x 235.56 x 16.96 ~ 18.99 mm', '12 tháng', 20000, 2000, 2, '2023-12-17 08:40:06', '2023-12-19 18:38:35'),
(2, 'Laptop ASUS Vivobook S 14 Flip TN3402YA LZ192W', 'ASUS', 2022, '12', 'CPU	AMD Ryzen™ 5 7530U Mobile Processor (6-core/12-thread, 16MB cache, up to 4.3 GHz max boost)\r\nRAM	16GB (8GB Onboard + 8GB) DDR4 3200MHz (1x SO-DIMM socket, up to 16GB SDRAM)\r\nỔ cứng	512GB SSD M.2 PCIE G3X4\r\nCard đồ họa	AMD Radeon™ Graphics\r\nMàn hình	14\" WUXGA (1920 x 1200) 16:10 aspect ratio, LED Backlit, IPS-level Panel, 60Hz, 300nits, 45% NTSC color gamut, Glossy display, TÜV Rheinland-certified, Touch screen, Screen-to-body ratio: 85 ％\r\nBàn phím 	LED Backlit\r\nAudio	Harman/Kardon \r\nKết nối có dây (LAN)	None\r\nKết nối không dây	Wi-Fi 6E(802.11ax) (Dual band) (2x2), Bluetooth v5.0\r\nWebcam	1080p FHD camera With privacy shutter\r\nCổng kết nối	\r\n1x USB 2.0 Type-A\r\n1x USB 3.2 Gen 2 Type-A\r\n1x USB 3.2 Gen 2 Type-C support display / power delivery\r\n1x HDMI 2.1 TMDS\r\n1x 3.5mm Combo Audio Jack\r\n1x DC-in\r\nHệ điều hành	Windows 11 Home\r\nTrọng lượng	1.5 kg\r\nPin	3 Cells 50WHrs\r\nMàu sắc	Cool Silver \r\nKích thước	31.32 x 22.76 x 1.89 (cm)', '3 tháng', 100000, 2000, 2, '2023-12-17 08:41:48', '2023-12-17 08:41:48'),
(3, 'Laptop Acer Aspire 3 A315 59 321N', 'Acer', 2020, '7', 'CPU	Intel® Core™ i3-1215U, upto 4.40GHz, 10 MB Intel® Smart Cache\r\nRAM	8GB (1 x 8GB) DDR4 2400MHz (2x SO-DIMM socket, up to 32GB SDRAM)\r\nỔ cứng	256GB PCIe NVMe SSD (nâng cấp tối đa 1 TB SSD PCIe Gen3)\r\nCard đồ họa	Intel® UHD Graphics\r\nMàn hình	15.6\" FHD (1920 x 1080), 60Hz, Acer ComfyView LED-backlit TFT LCD\r\nCổng giao tiếp\r\n\r\n3 x USB 3.2 Gen 1 ports with one featuring power-off USB charging\r\n1 x DC-in jack for AC adapter\r\n1 x HDMI®2.1 port with HDCP support\r\n1 x 3.5 mm headphone/speaker jack, supporting headsets with built-in microphone\r\n1 x Ethernet (RJ-45) port\"\r\nAudio	Acer TrueHarmony technology\r\nBàn phím	Không led, có phím số\r\nBảo mật	Firmware Trusted Platform Module (TPM) solution \r\nBIOS user, supervisor passwords, \r\nKensington lock slot\r\nChuẩn Lan	Gigabit Ethernet\r\nChuẩn WIFI	Intel® Wireless Wi-Fi 6e AX201 (2x2)\r\nBluetooth	v5.1\r\nWebcam	HD Camera\r\nHệ điều hành	Windows 11 Home\r\nTrọng lượng	1.7kg\r\nPin	3 Cell 40WHrs\r\nKích thước	362.9 (W) x 241.26 (D) x 19.9 (H) mm\r\nMàu sắc	Pure Silver', '3 tháng', 5000000, 5000, 2, '2023-12-17 08:43:14', '2023-12-17 09:17:19'),
(4, 'Laptop HP 240 G9 6L1Y2PA', 'HP', 2028, '10', 'CPU	Intel Core i5-1235U Processor 3.30Ghz (12M Cache, upto 4.40Ghz, 10 Cores 12 Threads)\r\nRAM	8GB DDR4 3200MHz (Còn 1 slot SO-DIMM, nâng cấp tối đa 16GB)\r\nỔ cứng	512GB SSD M.2 NVMe™ PCIe® 3.0 (1 Slot, nâng cấp tối đa 1TB)\r\nVGA	Intel® UHD Graphics\r\nMàn hình	14\" FHD (1920 x 1080), IPS, narrow bezel, anti-glare, 250 nits, 45% NTSC\r\nCổng giao tiếp	\r\n1 x USB 3.2 Gen 1 Type-C\r\n2 x USB 3.1 Gen 1 Type-A\r\n1 x HDMI 1.4b\r\n1 x 3.5mm Combo Audio Jack\r\n1 x DC-in\r\nBàn phím	Không LED\r\nAudio	Dual stereo speakers, dual array microphones\r\nĐọc thẻ nhớ	None\r\nChuẩn LAN	Realtek RTL8111HSH-CG 10/100/1000 GbE NIC\r\nChuẩn WIFI	Wi-Fi 6(802.11ax) (Dual band) 2*2\r\nBluetooth	v5.2\r\nWebcam	720p HD camera With privacy shutter\r\nHệ điều hành	Windows 11 Home\r\nPin	41WHrs, 3S1P, 3-cell Li-ion\r\nTrọng lượng	1.47 kg\r\nMàu sắc	Asteroid silver\r\nKích thước	324 x 225.9 x 19.9 mm', '34 tháng', 8000000, 5000, 2, '2023-12-17 08:45:26', '2023-12-17 08:45:26'),
(5, 'Laptop Lenovo V15 G4 IRU 83A1000RVN', 'Lenovo', 2021, '10', 'CPU	Intel® Core™ i5-1335U, 10 Cores (2P + 8E) / 12 Threads, P-core 1.3 / 4.6GHz, E-core 0.9 / 3.4GHz, 12MB\r\nRam	8GB DDR4 3200MHz Onboard (1x SO-DIMM socket, up to 16GB SDRAM)\r\nỔ cứng	512GB SSD M.2 2242 PCIe® 4.0x4 NVMe (Trống 1 Slot 2.5\" SATA)\r\nCard đồ họa	Intel Iris Xe Graphics (with dual channel memory)\r\nIntel® UHD Graphics\r\nMàn hình	15.6\" FHD (1920x1080) IPS 300nits Anti-glare, 45% NTSC\r\nCổng giao tiếp	\r\n1x USB 2.0\r\n1x USB 3.2 Gen 1\r\n1x USB-C® 3.2 Gen 1 (support data transfer, Power Delivery 3.0 and DisplayPort™ 1.2)\r\n1x HDMI® 1.4b\r\n1x Ethernet (RJ-45)\r\n1x Headphone / microphone combo jack (3.5mm)\r\n1x Power connector\r\nBàn phím	Bàn phím tiêu chuẩn không LED\r\nChuẩn LAN	100/1000M\r\nChuẩn WIFI	802.11AC (2x2)\r\nBluetooth	v5.1\r\nAudio	Stereo speakers, 1.5W x2, Dolby® Audio™\r\nWebcam	HD 720p with Privacy Shutter\r\nHệ điều hành	Windows 11 Home\r\nPin	3 Cells 65WHrs\r\nTrọng lượng	1.67 kg\r\nMàu sắc	Iron Grey\r\nKích thước	359.2 x 235.8 x 19.9 mm', '34 tháng', 9000000, 5000, 2, '2023-12-17 08:47:06', '2023-12-17 08:47:06'),
(6, 'Laptop MSI Modern 14 C13M 607VN', 'MSI', 2020, '10', 'CPU\r\n\r\nIntel Core i7-1355U 1.7GHz up to 5.0GHz 12MB\r\nRAM\r\n\r\n16GB Onboard DDR4 3200MHz\r\nỔ cứng\r\n\r\n512GB NVMe PCIe Gen 3x4 SSD (1 Slot)\r\n\r\nCard đồ họa\r\n\r\nIntel Iris Xe Graphics\r\nMàn hình\r\n\r\n14\" FHD (1920 x 1080) IPS-Level, 60Hz, 45% NTSC, Thin Bezel, 65% sRGB\r\nCổng giao tiếp\r\n\r\n1x Type-C (USB 3.2 Gen 2 / DP) with PD charging\r\n1x Type-A USB 3.2 Gen 2\r\n2x Type-A USB 2.0\r\n1x HDMI™ (4K @ 30Hz)\r\n1x Mic-in/Headphone-out Combo Jack\r\nMicro SD Card Reader\r\nBàn phím\r\n\r\nBacklight Keyboard (Single-Color, White)\r\n\r\nChuẩn LAN\r\n\r\nKhông có\r\n\r\nChuẩn WIFI\r\n\r\nIntel Wi-Fi 6 AX201 (2x2)\r\nBluetooth\r\n\r\nBluetooth 5.2\r\n\r\nWebcam\r\n\r\nHD 720p 30fps\r\n\r\nHệ điều hành\r\n\r\nWindows 11 Home\r\n\r\nPin\r\n\r\n3 cell, 39.3Whr\r\n\r\nTrọng lượng\r\n\r\n1.4 kg\r\n\r\nMàu sắc\r\n\r\nClassic Black\r\nKích thước\r\n\r\n319.9 x 223 x 19.35 (mm)', '34 tháng', 7500000, 5000, 2, '2023-12-17 08:48:23', '2023-12-17 08:48:23'),
(7, 'Laptop gaming MSI GE76 12UHS 480VN', 'MSI', 2026, '10', 'CPU	Intel Core i9-12900HK 3.8GHz up to 5.0GHz 24MB\r\nRAM	64GB (32GB x2) DDR5 4800MHz (2x SO-DIMM socket, up to 64GB SDRAM)\r\nỔ cứng	2TB SSD PCIE G4X4 (2 slots)\r\nCard đồ họa	NVIDIA GeForce RTX 3080Ti 16GB GDDR6 Up to 1690MHz Boost Clock, 175W Maximum Graphics Power with Dynamic Boost. Max. 220W CPU-GPU Power with MSI OverBoost Technology\r\nMàn hình	17.3\" UHD (3840 x 2160) IPS, 120Hz, 100% sRGB, 100% Adobe RGB, NanoEdge\r\nKeyboard	Per key RGB steelseries KB\r\nĐọc thẻ nhớ	Dynaudio\r\nKết nối có dây (LAN)	Killer Gb LAN (Up to 2.5G)\r\nKết nối không dây	Killer Wi-Fi 6E AX1675, Bluetooth 5.2\r\nWebcam	FHD type (30fps@1080p)\r\nCổng giao tiếp	1x Type-C (USB / DP / Thunderbolt™ 4)\r\n1x Type-C USB3.2 Gen2\r\n2x Type-A USB3.2 Gen1\r\n1x Type-A USB3.2 Gen2\r\n1x RJ45\r\n1x (8K @ 60Hz / 4K @ 120Hz) HDMI\r\n1x Mini-DisplayPort\r\n1x Mic-in/Headphone-out Combo Jack\r\n1x SD Express\r\nHệ điều hành	Windows 11 Home\r\nPin	4 cell, 99.9Whr\r\nTrọng lượng	2.9 kg\r\nMàu sắc	Titanium Blue\r\nKích thước	397 x 268.5 x 27.5 cm', '34 tháng', 6500000, 5000, 1, '2023-12-17 08:49:19', '2023-12-17 08:49:19'),
(8, 'Laptop gaming Dell Alienware M15 R6 P109F001CBL', 'DELL', 2026, '10', 'CPU	Intel Core i7-11800H 2.3GHz up to 4.6GHz 24MB\r\nRAM	32GB (16x2) DDR4 3200MHz (2x SO-DIMM socket, up to 64GB SDRAM)\r\nỔ cứng	1TB SSD M.2 PCIe\r\nCard đồ họa	NVIDIA GeForce RTX 3060 6GB GDDR6\r\nMàn hình	15.6 inch QHD (2560 x 1440) 240Hz, 2ms, with ComfortView plus, NVIDIA G-SYNC and Advanced Optimus, WVA Display\r\nCổng giao tiếp	\r\n1x Type-C port (Includes Thunderbolt™ 4i, USB 3.2 Gen 2, Display Port 1.4, and Power Delivery 15W Output (5V/3A) capabilities)\r\n3x Type-A USB 3.2 Gen 1 ports (one with PowerShare)\r\n1x HDMI 2.1 Output port\r\n1x Killer E2600 1 Gbps rated RJ-45 Ethernet port\r\n1x Global Headset jack\r\n1x Power/DC-In port\r\nBàn phím	Alienware CherryMX ultra low-profile mechanical keyboard with per-key AlienFX RGB \r\nAudio	Realtek ALC3254 with A-Volute Nahimic audio processing software – Integrated in Alienware Sound Center (AWSC), 2 W x 2 = 4 W total\r\nChuẩn WIFI	802.11AX (WiFi 6)\r\nBluetooth	v5.2\r\nWebcam	Alienware HD (1280x720 resolution) camera with dual-array microphones\r\nHệ điều hành	Windows 11 Home + Office Home & Student\r\nPin	6 Cell 86WHr \r\nTrọng lượng	2.69 kg\r\nMàu sắc	Dark Side of the Moon\r\nKích thước	356.2 x 272.5 x 22.85 (mm)', '34 tháng', 4540000, 5000, 1, '2023-12-17 08:50:31', '2023-12-17 08:50:31'),
(9, 'Laptop gaming Acer Predator Helios 300 PH315 55 751D', 'Acer', 2026, '9', 'CPU	Intel® Core™ i7-12700H (up to 4.7Ghz, 24MB cache)\r\nRam	16GB DDR5 4800Mhz (2x8GB) (2x SO-DIMM socket, up to 32GB SDRAM)\r\nỔ cứng	512GB NVMe PCIe Gen3x4 SSD (2 slot)\r\nVGA	NVIDIA GeForce RTX 3070Ti 8GB GDDR6\r\nMàn hình	15.6 inch QHD (2560 x1440) IPS 165Hz, DCI-P3 100%, 5ms, 300nits, SlimBezel\r\n\r\nCổng giao tiếp	1 x USB 3.2 Gen 2 port featuring power-off USB charging,\r\n1 x USB 3.2 Gen 2 port,\r\n1 x USB 3.2 Gen 1 port,\r\n1 x HDMI®2.1 port with HDCP support,\r\n1 x Mini DisplayPort 1.4 \r\n1 x 3.5 mm headphone/speaker jack, supporting headsets with built-in microphone\r\nBàn phím	RGB 4 Zone\r\nChuẩn LAN	Killer Ethernet E2600\r\nChuẩn WIFI	Intel Wi-Fi 6E (2*2 ax)\r\nBluetooth	v5.2\r\nWebcam	HD type (30fps@720p)\r\nHệ điều hành	Windows 11 Home\r\nPin	4 cell, 90Whr\r\nTrọng lượng	2.4 kg\r\nMàu sắc	Đen\r\nKích thước	359.4 x 276.4 x 25.55 mm', '34 tháng', 9780000, 5000, 1, '2023-12-17 08:51:36', '2023-12-17 09:16:40'),
(10, 'Laptop gaming ASUS ROG Zephyrus G14 GA401QC K2199W', 'ASUS', 2026, '10', 'CPU	AMD Ryzen 7 5800HS 2.8GHz up to 4.4GHz 16MB\r\nRAM	8GB Onboard DDR4 3200MHz (1x SO-DIMM socket, up to 24GB SDRAM)\r\nỔ cứng	512GB M.2 NVMe™ PCIe® 3.0 SSD (1 slot)\r\nCard đồ họa	NVIDIA® GeForce RTX 3050 4GB GDDR6 With ROG Boost up to 1600MHz at 60W (75W with Dynamic Boost)\r\nMàn hình	14\" WQHD (2560 x 1440) 16:9, IPS, anti-glare display, 120Hz, 100% DCI-P3, Pantone Validated, 300nits, Adaptive-Sync, Optimus\r\nCổng giao tiếp	1x USB 3.2 Gen 2 Type-C support DisplayPort™ / power delivery / G-SYNC\r\n1x USB 3.2 Gen 2 Type-C\r\n2x USB 3.2 Gen 1 Type-A\r\n1x HDMI 2.0b\r\n1x 3.5mm Combo Audio Jack\r\nFingerPrint\r\nBàn phím	Phím led trắng\r\nAudio	2x 2.5W speaker with smart AMP technology, Dolby Atmos Software\r\nBảo mật	FingerPrint\r\nChuẩn LAN	None\r\nChuẩn Wi-Fi	Wi-Fi 6(802.11ax) (2x2)\r\nBluetooth	v5.1\r\nLed Anime Matrix	Không\r\nHệ điều hành	Windows 11 Home\r\nPin	4 Cell 76WHr\r\nTrọng lượng	1.6 kg\r\nMàu sắc	Eclipse Gray - Không AnimeMatrix\r\nKích thước	32.4 x 22.2 x 1.79 ~ 1.79 (cm)', '34 tháng', 4560000, 5000, 1, '2023-12-17 08:52:28', '2023-12-17 08:52:28'),
(11, 'Laptop gaming HP Victus 16 r0128T 8C5N3PA', 'HP', 2029, '6', 'CPU	Intel Core i5-13450HX (3.4GHz up to 4.6GHz, 20MB Cache), 10 Cores 16 Threads\r\nRAM	16GB (8 x 2) DDR5 4800MHz (2x SO-DIMM socket, up to 32GB SDRAM)\r\nỔ cứng	512GB M.2 NVMe™ PCIe® 4.0 SSD\r\nCard đồ họa	NVIDIA® GeForce RTX™ 4050 6GB GDDR6\r\nMàn hình	16.1\" FHD (1920 x 1080), 144 Hz, IPS, micro-edge, anti-glare, 250 nits, 45% NTSC\r\nCổng giao tiếp	\r\n1x USB Type-A 5Gbps signaling rate (HP Sleep and Charge)\r\n1x USB Type-C® 5Gbps signaling rate (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)\r\n2x USB Type-A 5Gbps signaling rate\r\n1x HDMI 2.1\r\n1x RJ-45\r\n1x AC smart pin\r\n1x headphone/microphone combo\r\nLed keyboard	Full-size, 1-zone RGB backlit, moonstone grey keyboard with numeric keypad\r\nAudio	Audio by B&O; Dual speakers; HP Audio Boost\r\nWifi + Bluetooth	Intel® Wi-Fi 6E AX211 (2x2) + BT v5.3\r\nWebcam	HP True Vision 1080p FHD camera with temporal noise reduction and integrated dual array digital microphones\r\nHệ điều hành	Windows 11 Home\r\nPin	4 Cell 70WHr Li-ion polymer\r\nTrọng lượng	2.31 kg\r\nMàu sắc	Mica silver\r\nKích thước	36.9 x 25.94 x 2.29 ~ 2.39 cm', '34 tháng', 2440000, 8000, 1, '2023-12-17 08:53:39', '2023-12-17 08:53:39'),
(12, 'Laptop gaming Lenovo LOQ 15IRH8 82XV00D5VN', 'Lenovo', 2022, '5', 'CPU	Intel Core i5-13450HX (3.4GHz up to 4.6GHz, 20MB Cache), 10 Cores 16 Threads\r\nRAM	16GB (8 x 2) DDR5 4800MHz (2x SO-DIMM socket, up to 32GB SDRAM)\r\nỔ cứng	512GB M.2 NVMe™ PCIe® 4.0 SSD\r\nCard đồ họa	NVIDIA® GeForce RTX™ 4050 6GB GDDR6\r\nMàn hình	16.1\" FHD (1920 x 1080), 144 Hz, IPS, micro-edge, anti-glare, 250 nits, 45% NTSC\r\nCổng giao tiếp	\r\n1x USB Type-A 5Gbps signaling rate (HP Sleep and Charge)\r\n1x USB Type-C® 5Gbps signaling rate (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)\r\n2x USB Type-A 5Gbps signaling rate\r\n1x HDMI 2.1\r\n1x RJ-45\r\n1x AC smart pin\r\n1x headphone/microphone combo\r\nLed keyboard	Full-size, 1-zone RGB backlit, moonstone grey keyboard with numeric keypad\r\nAudio	Audio by B&O; Dual speakers; HP Audio Boost\r\nWifi + Bluetooth	Intel® Wi-Fi 6E AX211 (2x2) + BT v5.3\r\nWebcam	HP True Vision 1080p FHD camera with temporal noise reduction and integrated dual array digital microphones\r\nHệ điều hành	Windows 11 Home\r\nPin	4 Cell 70WHr Li-ion polymer\r\nTrọng lượng	2.31 kg\r\nMàu sắc	Mica silver\r\nKích thước	36.9 x 25.94 x 2.29 ~ 2.39 cm', '34 tháng', 5620000, 8000, 1, '2023-12-17 08:56:09', '2023-12-17 09:16:08'),
(13, 'Laptop gaming test', 'Lenovo', 2022, '6', 'user', '34 tháng', 5620000, 8000, 1, '2023-12-19 18:41:56', '2023-12-19 18:41:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_ke_chis`
--

CREATE TABLE `thong_ke_chis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `soLuongNhap` bigint(20) NOT NULL,
  `giaNhap` bigint(20) NOT NULL,
  `tongTienNhapHang` bigint(20) NOT NULL,
  `thongKeTong_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_ke_chis`
--

INSERT INTO `thong_ke_chis` (`id`, `tenSanPham`, `soLuongNhap`, `giaNhap`, `tongTienNhapHang`, `thongKeTong_id`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Dell Vostro 3530 V5I3001W1 Gray', 24, 2000, 48000, 1, '2023-12-17 08:40:06', '2023-12-17 08:40:06'),
(2, 'Laptop ASUS Vivobook S 14 Flip TN3402YA LZ192W', 12, 2000, 24000, 1, '2023-12-17 08:41:48', '2023-12-17 08:41:48'),
(3, 'Laptop Acer Aspire 3 A315 59 321N', 10, 5000, 50000, 1, '2023-12-17 08:43:14', '2023-12-17 08:43:14'),
(4, 'Laptop HP 240 G9 6L1Y2PA', 10, 5000, 50000, 1, '2023-12-17 08:45:26', '2023-12-17 08:45:26'),
(5, 'Laptop Lenovo V15 G4 IRU 83A1000RVN', 10, 5000, 50000, 1, '2023-12-17 08:47:06', '2023-12-17 08:47:06'),
(6, 'Laptop MSI Modern 14 C13M 607VN', 10, 5000, 50000, 1, '2023-12-17 08:48:23', '2023-12-17 08:48:23'),
(7, 'Laptop gaming MSI GE76 12UHS 480VN', 10, 5000, 50000, 1, '2023-12-17 08:49:19', '2023-12-17 08:49:19'),
(8, 'Laptop gaming Dell Alienware M15 R6 P109F001CBL', 10, 5000, 50000, 1, '2023-12-17 08:50:31', '2023-12-17 08:50:31'),
(9, 'Laptop gaming Acer Predator Helios 300 PH315 55 751D', 10, 5000, 50000, 1, '2023-12-17 08:51:36', '2023-12-17 08:51:36'),
(10, 'Laptop gaming ASUS ROG Zephyrus G14 GA401QC K2199W', 10, 5000, 50000, 1, '2023-12-17 08:52:28', '2023-12-17 08:52:28'),
(11, 'Laptop gaming HP Victus 16 r0128T 8C5N3PA', 6, 8000, 48000, 1, '2023-12-17 08:53:39', '2023-12-17 08:53:39'),
(12, 'Laptop gaming Lenovo LOQ 15IRH8 82XV00D5VN', 6, 8000, 48000, 1, '2023-12-17 08:56:09', '2023-12-17 08:56:09'),
(13, 'Laptop gaming test', 6, 8000, 48000, 1, '2023-12-19 18:41:56', '2023-12-19 18:41:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_ke_ngays`
--

CREATE TABLE `thong_ke_ngays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenSP` varchar(255) NOT NULL,
  `soLuong` bigint(20) NOT NULL,
  `tienBan` bigint(20) NOT NULL,
  `doanhThu` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_ke_ngays`
--

INSERT INTO `thong_ke_ngays` (`id`, `tenSP`, `soLuong`, `tienBan`, `doanhThu`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Dell Vostro 3530 V5I3001W1 Gray', 1, 20000, 18000, '2023-12-17 09:15:45', '2023-12-17 09:15:45'),
(2, 'Laptop Acer Aspire 3 A315 59 321N', 2, 10000000, 9990000, '2023-12-17 09:15:45', '2023-12-17 09:15:45'),
(3, 'Laptop gaming Lenovo LOQ 15IRH8 82XV00D5VN', 1, 5620000, 5612000, '2023-12-17 09:16:08', '2023-12-17 09:16:08'),
(4, 'Laptop gaming Acer Predator Helios 300 PH315 55 751D', 1, 9780000, 9775000, '2023-12-17 09:16:40', '2023-12-17 09:16:40'),
(5, 'Laptop Acer Aspire 3 A315 59 321N', 1, 5000000, 4995000, '2023-12-17 09:17:19', '2023-12-17 09:17:19'),
(6, 'Laptop Dell Vostro 3530 V5I3001W1 Gray', 1, 20000, 18000, '2023-12-19 18:38:35', '2023-12-19 18:38:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_ke_thus`
--

CREATE TABLE `thong_ke_thus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `soLuongBan` bigint(20) NOT NULL,
  `giaBan` bigint(20) NOT NULL,
  `tongTienBan` bigint(20) NOT NULL,
  `thongKeTong_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_ke_thus`
--

INSERT INTO `thong_ke_thus` (`id`, `tenSanPham`, `soLuongBan`, `giaBan`, `tongTienBan`, `thongKeTong_id`, `created_at`, `updated_at`) VALUES
(1, 'Laptop Dell Vostro 3530 V5I3001W1 Gray', 2, 20000, 20000, 1, '2023-12-17 08:40:06', '2023-12-19 18:38:35'),
(2, 'Laptop ASUS Vivobook S 14 Flip TN3402YA LZ192W', 0, 100000, 0, 1, '2023-12-17 08:41:48', '2023-12-17 08:41:48'),
(3, 'Laptop Acer Aspire 3 A315 59 321N', 3, 5000000, 5000000, 1, '2023-12-17 08:43:14', '2023-12-17 09:17:19'),
(4, 'Laptop HP 240 G9 6L1Y2PA', 0, 8000000, 5000, 1, '2023-12-17 08:45:26', '2023-12-17 09:12:52'),
(5, 'Laptop Lenovo V15 G4 IRU 83A1000RVN', 0, 9000000, 0, 1, '2023-12-17 08:47:06', '2023-12-17 08:47:06'),
(6, 'Laptop MSI Modern 14 C13M 607VN', 0, 7500000, 0, 1, '2023-12-17 08:48:23', '2023-12-17 08:48:23'),
(7, 'Laptop gaming MSI GE76 12UHS 480VN', 0, 6500000, 0, 1, '2023-12-17 08:49:19', '2023-12-17 08:49:19'),
(8, 'Laptop gaming Dell Alienware M15 R6 P109F001CBL', 0, 4540000, 0, 1, '2023-12-17 08:50:31', '2023-12-17 08:50:31'),
(9, 'Laptop gaming Acer Predator Helios 300 PH315 55 751D', 1, 9780000, 9780000, 1, '2023-12-17 08:51:36', '2023-12-17 09:16:40'),
(10, 'Laptop gaming ASUS ROG Zephyrus G14 GA401QC K2199W', 0, 4560000, 0, 1, '2023-12-17 08:52:28', '2023-12-17 08:52:28'),
(11, 'Laptop gaming HP Victus 16 r0128T 8C5N3PA', 0, 2440000, 0, 1, '2023-12-17 08:53:39', '2023-12-17 08:53:39'),
(12, 'Laptop gaming Lenovo LOQ 15IRH8 82XV00D5VN', 1, 5620000, 5620000, 1, '2023-12-17 08:56:09', '2023-12-17 09:16:08'),
(13, 'Laptop gaming test', 0, 5620000, 0, 1, '2023-12-19 18:41:56', '2023-12-19 18:41:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_ke_tongs`
--

CREATE TABLE `thong_ke_tongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tienChi` bigint(20) NOT NULL DEFAULT 0,
  `tienThu` bigint(20) NOT NULL DEFAULT 0,
  `doanhThu` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_ke_tongs`
--

INSERT INTO `thong_ke_tongs` (`id`, `tienChi`, `tienThu`, `doanhThu`, `created_at`, `updated_at`) VALUES
(1, 616000, 30440000, 29824000, '2023-12-17 08:40:06', '2023-12-19 18:41:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `hoTen` varchar(255) NOT NULL,
  `ngaySinh` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sDT` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vaiTro` varchar(255) NOT NULL,
  `KHTT` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `hoTen`, `ngaySinh`, `email`, `sDT`, `password`, `vaiTro`, `KHTT`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'le thai duong', '2023-12-22', 'duongewrwrwer@gmail.com', '0457845623', '$2y$10$AsrdIqYsTjYBPmbrvZDzPOIQ9thi8jNgehF/ODXDoRH8Yaeqa1TJa', 'admin', 0, NULL, '2023-12-17 08:37:16', '2023-12-17 08:37:16'),
(2, 'user', 'minh', '2023-12-19', 'duong096er@gmail.com', '0457845623', '$2y$10$pct3MpeUXFGP18MJzkAstu522kVGHV.vSQ..XY/0/3bjHRc6BqgNe', 'user', 1, NULL, '2023-12-17 08:37:43', '2023-12-17 09:16:40'),
(3, 'user1', 'duong', '2023-12-31', 'duongfsddser@gmail.com', '0457845623', '$2y$10$4F5iRDMp5ujc0TWM5M8s5eb0sAQcGkZlDWHELfH6NHIWXn4aWSprK', 'user', 0, NULL, '2023-12-19 18:27:25', '2023-12-19 18:27:25');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_hoa_dons_hoadon_id_foreign` (`hoaDon_id`);

--
-- Chỉ mục cho bảng `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_gias_user_id_foreign` (`user_id`),
  ADD KEY `danh_gias_sanpham_id_foreign` (`sanPham_id`);

--
-- Chỉ mục cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hangs_sanpham_id_foreign` (`sanPham_id`),
  ADD KEY `gio_hangs_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoa_dons_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`),
  ADD KEY `images_sanpham_id_foreign` (`sanPham_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_phams_danhmuc_id_foreign` (`danhMuc_id`);

--
-- Chỉ mục cho bảng `thong_ke_chis`
--
ALTER TABLE `thong_ke_chis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thong_ke_chis_thongketong_id_foreign` (`thongKeTong_id`);

--
-- Chỉ mục cho bảng `thong_ke_ngays`
--
ALTER TABLE `thong_ke_ngays`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_ke_thus`
--
ALTER TABLE `thong_ke_thus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thong_ke_thus_thongketong_id_foreign` (`thongKeTong_id`);

--
-- Chỉ mục cho bảng `thong_ke_tongs`
--
ALTER TABLE `thong_ke_tongs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danh_gias`
--
ALTER TABLE `danh_gias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hoa_dons`
--
ALTER TABLE `hoa_dons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `thong_ke_chis`
--
ALTER TABLE `thong_ke_chis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `thong_ke_ngays`
--
ALTER TABLE `thong_ke_ngays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thong_ke_thus`
--
ALTER TABLE `thong_ke_thus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `thong_ke_tongs`
--
ALTER TABLE `thong_ke_tongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  ADD CONSTRAINT `chi_tiet_hoa_dons_hoadon_id_foreign` FOREIGN KEY (`hoaDon_id`) REFERENCES `hoa_dons` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD CONSTRAINT `danh_gias_sanpham_id_foreign` FOREIGN KEY (`sanPham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `danh_gias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `gio_hangs_sanpham_id_foreign` FOREIGN KEY (`sanPham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gio_hangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD CONSTRAINT `hoa_dons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_sanpham_id_foreign` FOREIGN KEY (`sanPham_id`) REFERENCES `san_phams` (`id`),
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_danhmuc_id_foreign` FOREIGN KEY (`danhMuc_id`) REFERENCES `danh_mucs` (`id`);

--
-- Các ràng buộc cho bảng `thong_ke_chis`
--
ALTER TABLE `thong_ke_chis`
  ADD CONSTRAINT `thong_ke_chis_thongketong_id_foreign` FOREIGN KEY (`thongKeTong_id`) REFERENCES `thong_ke_tongs` (`id`);

--
-- Các ràng buộc cho bảng `thong_ke_thus`
--
ALTER TABLE `thong_ke_thus`
  ADD CONSTRAINT `thong_ke_thus_thongketong_id_foreign` FOREIGN KEY (`thongKeTong_id`) REFERENCES `thong_ke_tongs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
