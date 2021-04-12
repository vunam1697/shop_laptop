-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2021 lúc 07:16 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_laptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tensp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thuvienanh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giaban` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ocung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carddohoa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manhinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trongluong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mausac` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kichthuoc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noibat` int(11) DEFAULT NULL,
  `hienthi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `mota`, `noidung`, `hinhanh`, `thuvienanh`, `giaban`, `soluong`, `cpu`, `ram`, `ocung`, `carddohoa`, `manhinh`, `pin`, `trongluong`, `mausac`, `kichthuoc`, `noibat`, `hienthi`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Laptop Lenovo ThinkBook 15IIL i3 1005G1/4GB/512GB/Win10 (20SM00D9VN)', 'Laptop Lenovo ThinkBook 15IIL i3 (20SM00D9VN) sở hữu thiết kế từ kim loại toát lên vẻ sang trọng, sắc sảo, cấu hình lí tưởng cho học tập, trình duyệt web khi trang bị bộ vi xử lý Intel thế hệ thứ 10 mới và ổ cứng SSD cực nhanh.', 'Đặc điểm nổi bật của Lenovo ThinkBook 15IIL i3 1005G1/4GB/512GB/Win10 (20SM00D9VN)\r\n\r\nTìm hiểu thêm\r\nTìm hiểu thêm\r\nTìm hiểu thêm\r\nTìm hiểu thêm\r\nLaptop Lenovo ThinkBook 15IIL i3 (20SM00D9VN) sở hữu thiết kế từ kim loại toát lên vẻ sang trọng, sắc sảo, cấu hình lí tưởng cho học tập, trình duyệt web khi trang bị bộ vi xử lý Intel thế hệ thứ 10 mới và ổ cứng SSD cực nhanh.\r\nThiết kế mỏng nhẹ, bền bỉ\r\nThiết kế của Laptop Lenovo ThinkBook 15 IML hướng đến sự tối giản và hiện đại. Vỏ máy được làm từ kim loại vừa mang lại vẻ sang trọng, vừa bền bỉ. Máy có độ dày chỉ 18.9 mm, trọng lượng chỉ 1.8 kg, khá mỏng nhẹ đối với laptop cùng phân khúc, dễ dàng cho vào balo hay túi xách, sẵn sàng cùng bạn “lên đường”.\r\n\r\nLaptop Lenovo ThinkBook 15IIL i3 (20SM00D9VN) - Thiết kế\r\n\r\nLaptop Lenovo ThinkBook 15 IIL được tích hợp rất nhiều cổng kết nối, bao gồm cổng USB 3.1 tiện lợi để sạc thiết bị ngoại vi như điện thoại, cổng USB Type-C, cổng USB 2.0, HDMI, đầu đọc thẻ SD, jack tai nghe, cổng mạng LAN để kết nối mạng có dây. \r\n\r\nLaptop Lenovo ThinkBook 15IIL i3 (20SM00D9VN) - Kết nối\r\n\r\nBạn hoàn toàn có thể an tâm về độ an toàn, tin cậy của dữ liệu trên máy nhờ có tính năng bảo mật vân tay, chạm nhẹ để mở khóa tương tự như trên smartphone.\r\n\r\nLaptop Lenovo ThinkBook 15IIL i3 (20SM00D9VN) - Vân tay\r\n\r\nLàm việc, học tập năng suất \r\nLenovo ThinkBook 15-IML 20RW008WVN được trang bị bộ vi xử lý Intel Core i3 Ice Lake thế hệ 10, với 2 nhân 4 luồng, xung nhịp tối đa đạt 3.4 GHz cho hiệu năng mạnh mẽ, xử lý trơn tru các tác vụ văn phòng, trình duyệt web, các ứng dụng học tập phổ biến.\r\n\r\nLaptop Lenovo ThinkBook 15IIL i3 (20SM00D9VN) - Hiệu năng\r\n\r\nDung lượng RAM 4 GB hỗ trợ đa nhiệm ở mức trung bình, có thể chạy cùng lúc một số ứng dụng như vừa lướt web, vừa làm việc trên Excel,... Bạn có thể nâng cấp RAM lên tối đa đến 32 GB để đa nhiệm, xử lý nhiều tác vụ nặng khác mượt mà hơn. \r\n\r\nỔ cứng SSD 512 GB M.2 PCIe sẽ giúp bạn làm việc có hiệu suất cao hơn khi máy có tốc độ truy xuất dữ liệu, tốc độ khởi động cũng như dung lượng lưu trữ lớn.\r\n\r\nLaptop Lenovo ThinkBook 15IIL i3 (20SM00D9VN) - SSD\r\n\r\nChiếc laptop 15,6 inch siêu mỏng nhẹ\r\nLenovo có màn hình 15,6 inch trong thân máy gọn gàng như laptop 14 inch nhờ thiết viền màn hình mỏng cho tỉ lệ màn hình trên thân máy lên tới 83%.\r\n\r\nĐộ phân giải Full HD (1920 x 1080) cho bạn những thước phim tuyệt hảo, độ sắc nét cao, màu sắc chân thật. Tấm nền IPS giúp góc nhìn rộng hơn, có nghĩa là cho dù bạn nhìn từ góc nào thì hình ảnh vẫn không bị mờ hay nhòe.\r\n\r\nLaptop Lenovo ThinkBook 15IIL i3 (20SM00D9VN) - Màn hình\r\n\r\nCông nghệ âm thanh Dolby Audio cung cấp âm thanh vòm 3D sống động như trong rạp hát, nghe nhạc, học ngoại ngữ hay call video sẽ rất tiện lợi với chất lượng âm thanh tốt.\r\n\r\nLaptop Lenovo ThinkBook 15IIL i3 (20SM00D9VN) -  Âm thanh\r\n\r\nLaptop Lenovo ThinkBook 15IIL i3 (20SM00D9VN) là chiếc laptop học tập - văn phòng hiện đại, phù hợp với những người yêu thích một chiếc laptop sang trọng, mạnh mẽ và bảo mật tốt.', 'lenovo-thinkbook-1.jpg', NULL, 11690000, 10, 'Intel Core i3 Ice Lake, 1005G1, 1.20 GHz', '4 GB, DDR4 (1 khe), 2666 MHz', 'SSD: 512 GB, M.2 PCIe, Hỗ trợ khe cắm HDD SATA', 'Card đồ họa tích hợp, Intel UHD Graphics', '15.6\", Full HD (1920 x 1080)', 'PIN liền Li-Ion 3 cell', '1.8 Kg', 'trắng', 'Dài 364 mm - Rộng 245 mm - Dày 18.9 mm', NULL, NULL, NULL, NULL, NULL),
(2, 'Laptop Lenovo ThinkBook 14IML i3 10110U/4GB/256GB/Win10 (20RV00B7VN)', 'Nếu bạn là nhân viên văn phòng cần một chiếc laptop có độ bảo mật cao cũng như xử lý tác vụ mạnh mẽ hơn thì chiếc laptop Lenovo ThinkBook 14IML i3 (20RV00B7VN) hoàn toàn có thể đáp ứng được nhu cầu đó. Với giá thành rẻ, hiệu năng tốt thì đây quả là sản phẩm laptop văn phòng đáng để xem qua.', '<h2>Đặc điểm nổi bật của Lenovo ThinkBook 14IML i3 10110U/4GB/256GB/Win10 (20RV00B7VN)</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/44/220898/Slider/vi-vn-lenovo-thinkbook-14iml-i3-20rv00b7vn.jpg\" /><img src=\"https://www.thegioididong.com/Content/desktop/images/V4/icon-yt.png\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-vi-xu-ly-intel-core-the-he-10-1212148\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/o-cung-ssd-la-gi-923073\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/fingerprint-sensor-la-gi-va-co-tac-dung-gi-904389\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-cong-nghe-dolby-audio-premium-1017812\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: S&aacute;ch hướng dẫn, Th&ugrave;ng m&aacute;y, Sạc Laptop Lenovo</p>\r\n\r\n<h2>Nếu bạn l&agrave; nh&acirc;n vi&ecirc;n văn ph&ograve;ng cần một chiếc laptop c&oacute; độ bảo mật cao cũng như xử l&yacute; t&aacute;c vụ mạnh mẽ hơn th&igrave; chiếc&nbsp;<a href=\"https://www.dienmayxanh.com/laptop/lenovo-thinkbook-14iml-i3-20rv00b7vn\" target=\"_blank\" title=\"Laptop Lenovo ThinkBook 14IML i3 (20RV00B7VN)\" type=\"Laptop Lenovo ThinkBook 14IML i3 (20RV00B7VN)\">laptop Lenovo ThinkBook 14IML&nbsp;i3 (20RV00B7VN)</a>&nbsp;ho&agrave;n to&agrave;n c&oacute; thể đ&aacute;p ứng được nhu cầu đ&oacute;. Với gi&aacute; th&agrave;nh rẻ, hiệu năng tốt th&igrave; đ&acirc;y quả l&agrave; sản phẩm&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=hoc-tap-van-phong\" target=\"_blank\" title=\"Xem thêm các sản phẩm Laptop văn phòng chính hãng được kinh doanh tại thegioididong.com\">laptop văn ph&ograve;ng</a>&nbsp;đ&aacute;ng để xem qua.&nbsp;</h2>\r\n\r\n<h3 dir=\"ltr\">Bảo mật tối đa mọi dữ liệu tr&ecirc;n m&aacute;y</h3>\r\n\r\n<p dir=\"ltr\">Lenovo rất tinh &yacute; trong vấn đề bảo mật. Ở d&ograve;ng sản phẩm Thinkbook n&agrave;y bạn kh&ocirc;ng chỉ c&aacute; nh&acirc;n h&oacute;a thiết bị của m&igrave;nh bằng kh&oacute;a v&acirc;n tay m&agrave; c&ograve;n c&oacute; thể m&atilde; h&oacute;a mọi dữ liệu trong m&aacute;y bằng phần mềm bảo mật Firmware TPM 2.0.&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-va%CC%82ntay.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo ThinkBook 14IML  trang bị cảm biến vân tay \" src=\"https://cdn.tgdd.vn/Products/Images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-va%CC%82ntay.jpg\" title=\"Laptop Lenovo ThinkBook 14IML  trang bị cảm biến vân tay \" /></a></p>\r\n\r\n<p dir=\"ltr\">Ngo&agrave;i ra laptop c&oacute; th&ecirc;m t&iacute;nh năng tắt camera khi kh&ocirc;ng sử dụng gi&uacute;p tối ưu việc bảo mật mọi h&igrave;nh ảnh, th&ocirc;ng tin của bạn khi đi l&agrave;m.</p>\r\n\r\n<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-khoa%CC%81cam.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo ThinkBook 14IML | Công tắc khóa camera \" src=\"https://cdn.tgdd.vn/Products/Images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-khoa%CC%81cam.jpg\" title=\"Laptop Lenovo ThinkBook 14IML | Công tắc khóa camera \" /></a></p>\r\n\r\n<h3 dir=\"ltr\">Bền hơn, chắc chắn hơn</h3>\r\n\r\n<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/laptop-lenovo\" target=\"_blank\" title=\"Xem thêm các sản phẩm laptop Lenovo đang bán tại Thegioididong.com\" type=\"Xem thêm các sản phẩm laptop Lenovo đang bán tại Thegioididong.com\">Lenovo</a>&nbsp;rất tinh &yacute; khi tạo vỏ kim loại nguy&ecirc;n khối cho sản phẩm của m&igrave;nh, vừa thanh lịch, cầm chắc tay lại bảo vệ được m&aacute;y khỏi những hư hỏng do va đập, rơi từ tr&ecirc;n b&agrave;n xuống,... r&otilde; r&agrave;ng h&atilde;ng kh&aacute; hiểu cho những ai vụng về hay l&agrave;m rơi đồ đ&uacute;ng kh&ocirc;ng.&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-kg.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo ThinkBook 14IML i3 (20RV00B7VN) thuộc dòng laptop văn phòng \" src=\"https://cdn.tgdd.vn/Products/Images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-kg.jpg\" title=\"Laptop Lenovo ThinkBook 14IML i3 (20RV00B7VN) thuộc dòng laptop văn phòng \" /></a></p>\r\n\r\n<p dir=\"ltr\">T&iacute;nh năng xoay gập 180 độ hỗ trợ người d&ugrave;ng dễ điều chỉnh m&agrave;n h&igrave;nh theo tầm mắt v&agrave; tương t&aacute;c ở nhiều g&oacute;c độ hơn kể cả khi đứng.&nbsp;</p>\r\n\r\n<p dir=\"ltr\">M&agrave;n h&igrave;nh Thinkbook&nbsp;<strong><a href=\"https://www.thegioididong.com/laptop-14-inch\" target=\"_blank\" title=\"Laptop có màn hình 14 inch được kình doanh tại thegoididong.com\">14 inch</a></strong>&nbsp;tuy nhi&ecirc;n với thiết kế viền mỏng 2 cạnh gi&uacute;p mở rộng kh&ocirc;ng gian hiển thị, thoải m&aacute;i hơn cho đ&ocirc;i mắt bạn khi l&agrave;m việc cả ng&agrave;y.</p>\r\n\r\n<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-inch.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo ThinkBook 14IML có màn hình kích thước tiêu chuẩn 14 inch\" src=\"https://cdn.tgdd.vn/Products/Images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-inch.jpg\" title=\"Laptop Lenovo ThinkBook 14IML có màn hình kích thước tiêu chuẩn 14 inch\" /></a></p>\r\n\r\n<p dir=\"ltr\">Độ ph&acirc;n giải Full HD hiển thị sắc n&eacute;t mọi h&igrave;nh ảnh, m&agrave;u sắc tươi tắn bắt mắt. Nếu bạn kh&ocirc;ng th&iacute;ch người kh&aacute;c d&ograve;m ng&oacute; v&agrave;o&nbsp;<a href=\"https://www.thegioididong.com/laptop\" target=\"_blank\" title=\"Xem thêm Laptop chính hãng đang được kinh doanh tại thegiodidong\">laptop</a>&nbsp;của m&igrave;nh th&igrave; tấm nền TN sẽ gi&uacute;p hạn chế g&oacute;c nh&igrave;n từ c&aacute;c ph&iacute;a, tạo kh&ocirc;ng gian ri&ecirc;ng tư hơn khi l&agrave;m việc ở nơi đ&ocirc;ng người như qu&aacute;n c&agrave; ph&ecirc;, m&aacute;y bay,...</p>\r\n\r\n<h3 dir=\"ltr\">Xử l&yacute; th&ocirc;ng tin nhanh ch&oacute;ng hơn&nbsp;</h3>\r\n\r\n<p dir=\"ltr\">Với Chip intel&nbsp;<strong><a href=\"https://www.thegioididong.com/laptop?g=core-i3\" target=\"_blank\" title=\"Xem thêm các laptop Core i3 đang bán tại Thegioididong.com\" type=\"Xem thêm các laptop Core i3 đang bán tại Thegioididong.com\">Core i3</a></strong>&nbsp;thế hệ thứ 10 mới nhất,&nbsp;<strong><a href=\"https://www.thegioididong.com/laptop?g=4-gb\" target=\"_blank\" title=\"Laptop có RAM 4GB chính hãng được kinh doanh tại thegioididong.com\">RAM 4 GB</a></strong>&nbsp;th&igrave; m&aacute;y đ&aacute;p ứng được nhu cầu văn ph&ograve;ng cơ bản như lướt web, soạn thảo Word, Excel,... hạn chế việc giật lag khi sử dụng.</p>\r\n\r\n<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-i3.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo ThinkBook 14IML được trang bị bộ vi xử lý Intel Core i3\" src=\"https://cdn.tgdd.vn/Products/Images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-i3.jpg\" title=\"Laptop Lenovo ThinkBook 14IML được trang bị bộ vi xử lý Intel Core i3\" /></a></p>\r\n\r\n<p dir=\"ltr\">Xử l&yacute; c&aacute;c thao t&aacute;c nhanh ch&oacute;ng với&nbsp;<a href=\"https://www.thegioididong.com/laptop-lenovo-o-cung-ssd\" target=\"_blank\" title=\"Xem thêm laptop Lenovo tại thegioididong.comcó ổ cứng SSD tại theg\">ổ cứng SSD</a>&nbsp;<strong>256 GB</strong>&nbsp;như khởi động m&aacute;y chỉ trong 10 gi&acirc;y hay mở c&aacute;c ứng dụng trong 3 gi&acirc;y để bạn c&oacute; thể bắt tay v&agrave;o việc tức th&igrave;.&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><a href=\"https://www.thegioididong.com/images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-256.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo ThinkBook 14IML sử dụng ổ cứng SSD với dung lượng 256 GB\" src=\"https://cdn.tgdd.vn/Products/Images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-256.jpg\" title=\"Laptop Lenovo ThinkBook 14IML sử dụng ổ cứng SSD với dung lượng 256 GB\" /></a></p>\r\n\r\n<h3>&Acirc;m thanh được tinh chỉnh bởi chuy&ecirc;n gia</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/laptop-lenovo?g=lenovo-thinkbook\" target=\"_blank\" title=\"Xem thêm các Laptop Lenovo ThinkBook đang bán tại Thegioididong.com\">Lenovo ThinkBook</a>&nbsp;14IML được tinh chỉnh &acirc;m thanh&nbsp;<strong>Dolby Audio</strong>, cho &acirc;m lượng d&agrave;y hơn, chất &acirc;m trầm ấm v&agrave; giả lập &acirc;m thanh nổi sống động. Sẽ rất tuyệt vời nếu bạn xem phim tr&ecirc;n ThinkBook 14IML với h&igrave;nh ảnh sắc n&eacute;t, &acirc;m thanh chất lượng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-audio.jpg\" onclick=\"return false;\"><img alt=\"Laptop Lenovo ThinkBook 14IML được tinh chỉnh âm thanh Dolby Audio\" src=\"https://cdn.tgdd.vn/Products/Images/44/220898/lenovo-thinkbook-14iml-i3-20rv00b7vn-audio.jpg\" title=\"Laptop Lenovo ThinkBook 14IML được tinh chỉnh âm thanh Dolby Audio\" /></a></p>', '130289565_194968775632310_804802940035357581_n.png', '[\"130289565_194968775632310_804802940035357581_n.png\",\"132987859_1084398511985126_1885461142850705294_o.jpg\"]', 11240000, 10, 'Intel Core i3 Comet Lake, 10110U, 2.10 GHz', '32323', 'SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA', '32323', '14\", Full HD (1920 x 1080)', 'PIN liền,	Li - Polymer 3 cell', '1.5 kg', 'Trắng', NULL, NULL, NULL, '2021-04-11 08:31:23', '2021-04-12 09:14:51', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
