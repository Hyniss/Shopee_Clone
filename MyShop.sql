

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `stt` int(11) NOT NULL,
  `nameCategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `Category` (`id`, `stt`, `nameCategory`) VALUES
(18, 1, 'Apple'),
(19, 2, 'Samsung'),
(20, 3, 'Oppo');

-- --------------------------------------------------------





-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiethoadon`
--

CREATE TABLE `OrderDetail` (
  `orderId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `Orders` (
  `id` int(11) NOT NULL,
  `userId` int(255) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orderStatus` varchar(255) NOT NULL,
  `typePay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbnguoidung`
--

CREATE TABLE `Users` (
  `id` int(255) NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` bit
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbnguoidung`
--

INSERT INTO `Users` (`id`, `userName`, `fullname`, `passwords`, `email`, `phone`, `adress`, `gender`, `avatar`, `dob`, `mob`, `yob`,`roles`) VALUES
(27, 'admin', 'admin', '123456', 'admin123@gmail.com', '0421312', 'nam định', '0', 'apple.png', '7', '4', '2001',true),
(37, 'huyhuy', 'tienhuy', '1234', '', '02312', 'ha noi', '', '', '', '', '',false),
(38, 'huynguyen7420211', 'dsads', '1234', '', '1312321', 'ha noi', '', '', '', '', '',false),
(39, 'huy12321', 'Nguyễn Tiến Huy', '123123', 'huynguyen74201@gmail.com', '0973037211', 'Hà nội', '0', 'avt.png', '7', '4', '2001',false);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbsanpham`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `nameProduct` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `descript` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `productStatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbsanpham`
--

INSERT INTO `Product` (`id`, `nameProduct`, `img`, `descript`, `color`, `quantity`, `price`, `categoryId`, `productStatus`) VALUES
(12, 'Samsung Flex', 'hkc_mb24v9_gearvn_be09fd4ac7104552977afe25336e55b1_large.jpg', '', 'xanh', 25, 30000000, 19, 1),
(13, 'oppo', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'vàng', 12, 12300000, 20, 1),
(14, 'iphone 12', 'iphone.png', '', 'xanh', 42, 32000000, 18, 1),
(15, 'apple', '4.png', '', 'xanh', 5, 3900000, 18, 1),
(19, 'macbook', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'trắng', 12, 30000000, 18, 1),
(20, 'IPhone 13 Pro Max 256G', 'iphone13.png', '<p><a href=\"https://www.thegioididong.com/dtdd/iphone-13-pro-max\" target=\"_blank\">iPhone 13 Pro Max 128GB</a>&nbsp;- si&ecirc;u phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ&nbsp;<a href=\"https://www.thegioididong.com/apple\" target=\"_blank\">Apple</a>. M&aacute;y c&oacute; thiết kế kh&ocirc;ng mấy đột ph&aacute; khi so với người tiền nhiệm, b&ecirc;n trong đ&acirc;y vẫn l&agrave; một sản phẩm c&oacute; m&agrave;n h&igrave;nh si&ecirc;u đẹp, tần số qu&eacute;t được n&acirc;ng cấp l&ecirc;n 120 Hz mượt m&agrave;, cảm biến camera c&oacute; k&iacute;ch thước lớn hơn, c&ugrave;ng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn s&agrave;ng c&ugrave;ng bạn chinh phục mọi thử th&aacute;ch.</p>\r\n', 'vàng', 213, 32000000, 18, 1),
(21, ' IPhone 12 Pro Max 256GB ', 'iphone12.png', '<p>iPhone 12 Pro. M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch s&aacute;ng đẹp ấn tượng (1). Ceramic Shield với khả năng chịu va đập khi rơi tốt hơn gấp 4 lần (2). Ảnh chụp tuyệt đẹp trong điều kiện &aacute;nh s&aacute;ng yếu với hệ thống camera chuy&ecirc;n nghiệp mới v&agrave; phạm vi thu ph&oacute;ng quang học 4x. Quay phim, bi&ecirc;n tập v&agrave; ph&aacute;t video Dolby Vision đẳng cấp điện ảnh. Chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m v&agrave; trải nghiệm thực tế ảo tăng cường đẳng cấp mới với LiDAR Scanner. Chip A14 Bionic mạnh mẽ. Cho bất tận những năng lực ấn tượng.</p>\r\n\r\n<p>T&iacute;nh năng nổi bật</p>\r\n\r\n<p>&bull; M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch (1)</p>\r\n\r\n<p>&bull; Ceramic Shield, chất liệu k&iacute;nh bền chắc nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh &bull; A14 Bionic, chip nhanh nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh</p>\r\n\r\n<p>&bull; Hệ thống camera chuy&ecirc;n nghiệp 12MP với c&aacute;c camera Ultra Wide, Wide v&agrave; Telephoto; phạm vi thu ph&oacute;ng quang học 4x; chế độ Ban Đ&ecirc;m, Deep Fusion, HDR th&ocirc;ng minh thế hệ 3, Apple ProRAW (3), khả năng quay video HDR Dolby Vision 4K</p>\r\n\r\n<p>&bull; LiDAR Scanner cải thiện trải nghiệm thực tế ảo tăng cường v&agrave; chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m &bull; Camera trước TrueDepth 12MP với chế độ Ban Đ&ecirc;m v&agrave; khả năng quay video HDR Dolby Vision 4K &bull; Khả năng chống nước đạt chuẩn IP68 đứng đầu thị trường (4)</p>\r\n\r\n<p>&bull; iOS 14 với c&aacute;c tiện &iacute;ch được thiết kế lại tr&ecirc;n M&agrave;n H&igrave;nh Ch&iacute;nh, Thư Viện Ứng Dụng ho&agrave;n to&agrave;n mới, App Clips c&ugrave;ng nhiều t&iacute;nh năng kh&aacute;c.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;</p>\r\n\r\n<p>(1) M&agrave;n h&igrave;nh c&oacute; c&aacute;c g&oacute;c bo tr&ograve;n. Khi t&iacute;nh theo h&igrave;nh chữ nhật, k&iacute;ch thước m&agrave;n h&igrave;nh l&agrave; 6.06 inch theo đường ch&eacute;o. Diện t&iacute;ch hiển thị thực tế nhỏ hơn.</p>\r\n\r\n<p>(2) X&aacute;c nhận dựa v&agrave;o mặt trước c&oacute; Ceramic Shield của iPhone 12 Pro so với iPhone thế hệ trước.</p>\r\n\r\n<p>(3) Apple ProRAW sắp ra mắt.</p>\r\n\r\n<p>(4) iPhone 12 Pro Max c&oacute; khả năng chống tia nước, chống nước v&agrave; chống bụi. Sản phẩm đ&atilde; qua kiểm nghiệm trong điều kiện ph&ograve;ng th&iacute; nghiệm c&oacute; kiểm so&aacute;t đạt mức IP68 theo ti&ecirc;u chuẩn IEC 60529 (chống nước ở độ s&acirc;u tối đa 6 m&eacute;t trong v&ograve;ng tối đa 30 ph&uacute;t). Khả năng chống tia nước, chống nước v&agrave; chống bụi kh&ocirc;ng phải l&agrave; c&aacute;c điều kiện vĩnh viễn. Khả năng n&agrave;y c&oacute; thể giảm do hao m&ograve;n th&ocirc;ng thường. Kh&ocirc;ng sạc pin khi iPhone đang bị ướt. Vui l&ograve;ng tham khảo hướng dẫn sử dụng để biết c&aacute;ch lau sạch v&agrave; l&agrave;m kh&ocirc; m&aacute;y. Kh&ocirc;ng bảo h&agrave;nh sản phẩm bị hỏng do thấm chất lỏng.</p>\r\n\r\n<p>Bộ sản phẩm bao gồm:</p>\r\n\r\n<p>&bull; Điện thoại</p>\r\n\r\n<p>&bull; D&acirc;y sạc</p>\r\n\r\n<p>&bull; HDSD Bảo h&agrave;nh điện tử 12 th&aacute;ng.</p>\r\n', 'Đen ', 145, 29000000, 18, 1),
(22, 'Samsung', 'iphone12.png', '', 'vàng', 25, 24000000, 19, 1),
(23, 'Samsung Flex', 'hkc_mb24v9_gearvn_be09fd4ac7104552977afe25336e55b1_large.jpg', '', 'xanh', 25, 30000000, 19, 1),
(24, 'oppo', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'vàng', 12, 12300000, 20, 1),
(25, 'iphone 12', 'iphone.png', '', 'xanh', 42, 32000000, 18, 1),
(26, 'apple', '4.png', '', 'xanh', 5, 3900000, 18, 1),
(27, 'macbook', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'trắng', 12, 30000000, 18, 1),
(28, 'IPhone 13 Pro Max 256G', 'iphone13.png', '<p><a href=\"https://www.thegioididong.com/dtdd/iphone-13-pro-max\" target=\"_blank\">iPhone 13 Pro Max 128GB</a>&nbsp;- si&ecirc;u phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ&nbsp;<a href=\"https://www.thegioididong.com/apple\" target=\"_blank\">Apple</a>. M&aacute;y c&oacute; thiết kế kh&ocirc;ng mấy đột ph&aacute; khi so với người tiền nhiệm, b&ecirc;n trong đ&acirc;y vẫn l&agrave; một sản phẩm c&oacute; m&agrave;n h&igrave;nh si&ecirc;u đẹp, tần số qu&eacute;t được n&acirc;ng cấp l&ecirc;n 120 Hz mượt m&agrave;, cảm biến camera c&oacute; k&iacute;ch thước lớn hơn, c&ugrave;ng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn s&agrave;ng c&ugrave;ng bạn chinh phục mọi thử th&aacute;ch.</p>\r\n', 'vàng', 213, 32000000, 18, 1),
(29, ' IPhone 12 Pro Max 256GB ', 'iphone12.png', '<p>iPhone 12 Pro. M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch s&aacute;ng đẹp ấn tượng (1). Ceramic Shield với khả năng chịu va đập khi rơi tốt hơn gấp 4 lần (2). Ảnh chụp tuyệt đẹp trong điều kiện &aacute;nh s&aacute;ng yếu với hệ thống camera chuy&ecirc;n nghiệp mới v&agrave; phạm vi thu ph&oacute;ng quang học 4x. Quay phim, bi&ecirc;n tập v&agrave; ph&aacute;t video Dolby Vision đẳng cấp điện ảnh. Chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m v&agrave; trải nghiệm thực tế ảo tăng cường đẳng cấp mới với LiDAR Scanner. Chip A14 Bionic mạnh mẽ. Cho bất tận những năng lực ấn tượng.</p>\r\n\r\n<p>T&iacute;nh năng nổi bật</p>\r\n\r\n<p>&bull; M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch (1)</p>\r\n\r\n<p>&bull; Ceramic Shield, chất liệu k&iacute;nh bền chắc nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh &bull; A14 Bionic, chip nhanh nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh</p>\r\n\r\n<p>&bull; Hệ thống camera chuy&ecirc;n nghiệp 12MP với c&aacute;c camera Ultra Wide, Wide v&agrave; Telephoto; phạm vi thu ph&oacute;ng quang học 4x; chế độ Ban Đ&ecirc;m, Deep Fusion, HDR th&ocirc;ng minh thế hệ 3, Apple ProRAW (3), khả năng quay video HDR Dolby Vision 4K</p>\r\n\r\n<p>&bull; LiDAR Scanner cải thiện trải nghiệm thực tế ảo tăng cường v&agrave; chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m &bull; Camera trước TrueDepth 12MP với chế độ Ban Đ&ecirc;m v&agrave; khả năng quay video HDR Dolby Vision 4K &bull; Khả năng chống nước đạt chuẩn IP68 đứng đầu thị trường (4)</p>\r\n\r\n<p>&bull; iOS 14 với c&aacute;c tiện &iacute;ch được thiết kế lại tr&ecirc;n M&agrave;n H&igrave;nh Ch&iacute;nh, Thư Viện Ứng Dụng ho&agrave;n to&agrave;n mới, App Clips c&ugrave;ng nhiều t&iacute;nh năng kh&aacute;c.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;</p>\r\n\r\n<p>(1) M&agrave;n h&igrave;nh c&oacute; c&aacute;c g&oacute;c bo tr&ograve;n. Khi t&iacute;nh theo h&igrave;nh chữ nhật, k&iacute;ch thước m&agrave;n h&igrave;nh l&agrave; 6.06 inch theo đường ch&eacute;o. Diện t&iacute;ch hiển thị thực tế nhỏ hơn.</p>\r\n\r\n<p>(2) X&aacute;c nhận dựa v&agrave;o mặt trước c&oacute; Ceramic Shield của iPhone 12 Pro so với iPhone thế hệ trước.</p>\r\n\r\n<p>(3) Apple ProRAW sắp ra mắt.</p>\r\n\r\n<p>(4) iPhone 12 Pro Max c&oacute; khả năng chống tia nước, chống nước v&agrave; chống bụi. Sản phẩm đ&atilde; qua kiểm nghiệm trong điều kiện ph&ograve;ng th&iacute; nghiệm c&oacute; kiểm so&aacute;t đạt mức IP68 theo ti&ecirc;u chuẩn IEC 60529 (chống nước ở độ s&acirc;u tối đa 6 m&eacute;t trong v&ograve;ng tối đa 30 ph&uacute;t). Khả năng chống tia nước, chống nước v&agrave; chống bụi kh&ocirc;ng phải l&agrave; c&aacute;c điều kiện vĩnh viễn. Khả năng n&agrave;y c&oacute; thể giảm do hao m&ograve;n th&ocirc;ng thường. Kh&ocirc;ng sạc pin khi iPhone đang bị ướt. Vui l&ograve;ng tham khảo hướng dẫn sử dụng để biết c&aacute;ch lau sạch v&agrave; l&agrave;m kh&ocirc; m&aacute;y. Kh&ocirc;ng bảo h&agrave;nh sản phẩm bị hỏng do thấm chất lỏng.</p>\r\n\r\n<p>Bộ sản phẩm bao gồm:</p>\r\n\r\n<p>&bull; Điện thoại</p>\r\n\r\n<p>&bull; D&acirc;y sạc</p>\r\n\r\n<p>&bull; HDSD Bảo h&agrave;nh điện tử 12 th&aacute;ng.</p>\r\n', 'Đen ', 145, 29000000, 18, 1),
(30, 'Samsung', 'iphone12.png', '', 'vàng', 25, 24000000, 19, 1),
(31, 'Samsung Flex', 'hkc_mb24v9_gearvn_be09fd4ac7104552977afe25336e55b1_large.jpg', '', 'xanh', 25, 30000000, 19, 1),
(32, 'oppo', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'vàng', 12, 12300000, 20, 1),
(33, 'iphone 12', 'iphone.png', '', 'xanh', 42, 32000000, 18, 1),
(34, 'apple', '4.png', '', 'xanh', 5, 3900000, 18, 1),
(35, 'macbook', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'trắng', 12, 30000000, 18, 1),
(36, 'IPhone 13 Pro Max 256G', 'iphone13.png', '<p><a href=\"https://www.thegioididong.com/dtdd/iphone-13-pro-max\" target=\"_blank\">iPhone 13 Pro Max 128GB</a>&nbsp;- si&ecirc;u phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ&nbsp;<a href=\"https://www.thegioididong.com/apple\" target=\"_blank\">Apple</a>. M&aacute;y c&oacute; thiết kế kh&ocirc;ng mấy đột ph&aacute; khi so với người tiền nhiệm, b&ecirc;n trong đ&acirc;y vẫn l&agrave; một sản phẩm c&oacute; m&agrave;n h&igrave;nh si&ecirc;u đẹp, tần số qu&eacute;t được n&acirc;ng cấp l&ecirc;n 120 Hz mượt m&agrave;, cảm biến camera c&oacute; k&iacute;ch thước lớn hơn, c&ugrave;ng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn s&agrave;ng c&ugrave;ng bạn chinh phục mọi thử th&aacute;ch.</p>\r\n', 'vàng', 213, 32000000, 18, 1),
(37, ' IPhone 12 Pro Max 256GB ', 'iphone12.png', '<p>iPhone 12 Pro. M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch s&aacute;ng đẹp ấn tượng (1). Ceramic Shield với khả năng chịu va đập khi rơi tốt hơn gấp 4 lần (2). Ảnh chụp tuyệt đẹp trong điều kiện &aacute;nh s&aacute;ng yếu với hệ thống camera chuy&ecirc;n nghiệp mới v&agrave; phạm vi thu ph&oacute;ng quang học 4x. Quay phim, bi&ecirc;n tập v&agrave; ph&aacute;t video Dolby Vision đẳng cấp điện ảnh. Chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m v&agrave; trải nghiệm thực tế ảo tăng cường đẳng cấp mới với LiDAR Scanner. Chip A14 Bionic mạnh mẽ. Cho bất tận những năng lực ấn tượng.</p>\r\n\r\n<p>T&iacute;nh năng nổi bật</p>\r\n\r\n<p>&bull; M&agrave;n h&igrave;nh Super Retina XDR 6.1 inch (1)</p>\r\n\r\n<p>&bull; Ceramic Shield, chất liệu k&iacute;nh bền chắc nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh &bull; A14 Bionic, chip nhanh nhất từng c&oacute; tr&ecirc;n điện thoại th&ocirc;ng minh</p>\r\n\r\n<p>&bull; Hệ thống camera chuy&ecirc;n nghiệp 12MP với c&aacute;c camera Ultra Wide, Wide v&agrave; Telephoto; phạm vi thu ph&oacute;ng quang học 4x; chế độ Ban Đ&ecirc;m, Deep Fusion, HDR th&ocirc;ng minh thế hệ 3, Apple ProRAW (3), khả năng quay video HDR Dolby Vision 4K</p>\r\n\r\n<p>&bull; LiDAR Scanner cải thiện trải nghiệm thực tế ảo tăng cường v&agrave; chụp ảnh ch&acirc;n dung ở chế độ Ban Đ&ecirc;m &bull; Camera trước TrueDepth 12MP với chế độ Ban Đ&ecirc;m v&agrave; khả năng quay video HDR Dolby Vision 4K &bull; Khả năng chống nước đạt chuẩn IP68 đứng đầu thị trường (4)</p>\r\n\r\n<p>&bull; iOS 14 với c&aacute;c tiện &iacute;ch được thiết kế lại tr&ecirc;n M&agrave;n H&igrave;nh Ch&iacute;nh, Thư Viện Ứng Dụng ho&agrave;n to&agrave;n mới, App Clips c&ugrave;ng nhiều t&iacute;nh năng kh&aacute;c.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;</p>\r\n\r\n<p>(1) M&agrave;n h&igrave;nh c&oacute; c&aacute;c g&oacute;c bo tr&ograve;n. Khi t&iacute;nh theo h&igrave;nh chữ nhật, k&iacute;ch thước m&agrave;n h&igrave;nh l&agrave; 6.06 inch theo đường ch&eacute;o. Diện t&iacute;ch hiển thị thực tế nhỏ hơn.</p>\r\n\r\n<p>(2) X&aacute;c nhận dựa v&agrave;o mặt trước c&oacute; Ceramic Shield của iPhone 12 Pro so với iPhone thế hệ trước.</p>\r\n\r\n<p>(3) Apple ProRAW sắp ra mắt.</p>\r\n\r\n<p>(4) iPhone 12 Pro Max c&oacute; khả năng chống tia nước, chống nước v&agrave; chống bụi. Sản phẩm đ&atilde; qua kiểm nghiệm trong điều kiện ph&ograve;ng th&iacute; nghiệm c&oacute; kiểm so&aacute;t đạt mức IP68 theo ti&ecirc;u chuẩn IEC 60529 (chống nước ở độ s&acirc;u tối đa 6 m&eacute;t trong v&ograve;ng tối đa 30 ph&uacute;t). Khả năng chống tia nước, chống nước v&agrave; chống bụi kh&ocirc;ng phải l&agrave; c&aacute;c điều kiện vĩnh viễn. Khả năng n&agrave;y c&oacute; thể giảm do hao m&ograve;n th&ocirc;ng thường. Kh&ocirc;ng sạc pin khi iPhone đang bị ướt. Vui l&ograve;ng tham khảo hướng dẫn sử dụng để biết c&aacute;ch lau sạch v&agrave; l&agrave;m kh&ocirc; m&aacute;y. Kh&ocirc;ng bảo h&agrave;nh sản phẩm bị hỏng do thấm chất lỏng.</p>\r\n\r\n<p>Bộ sản phẩm bao gồm:</p>\r\n\r\n<p>&bull; Điện thoại</p>\r\n\r\n<p>&bull; D&acirc;y sạc</p>\r\n\r\n<p>&bull; HDSD Bảo h&agrave;nh điện tử 12 th&aacute;ng.</p>\r\n', 'Đen ', 145, 29000000, 18, 1),
(38, 'Samsung', 'iphone12.png', '', 'vàng', 25, 24000000, 19, 1),
(39, 'Samsung Flex', 'hkc_mb24v9_gearvn_be09fd4ac7104552977afe25336e55b1_large.jpg', '', 'xanh', 25, 30000000, 19, 1),
(40, 'oppo', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'vàng', 12, 12300000, 20, 1),
(41, 'iphone 12', 'iphone.png', '', 'xanh', 42, 32000000, 18, 1),
(42, 'apple', '4.png', '', 'xanh', 5, 3900000, 18, 1),
(43, 'macbook', 'laptop_asus_d515da_ej711t_1eb129ba0fbd4104995d58a73da8bd4c_large.jpg', '', 'trắng', 12, 30000000, 18, 1),
(44, 'IPhone 13 Pro Max 256G', 'iphone13.png', '<p><a href=\"https://www.thegioididong.com/dtdd/iphone-13-pro-max\" target=\"_blank\">iPhone 13 Pro Max 128GB</a>&nbsp;- si&ecirc;u phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ&nbsp;<a href=\"https://www.thegioididong.com/apple\" target=\"_blank\">Apple</a>. M&aacute;y c&oacute; thiết kế kh&ocirc;ng mấy đột ph&aacute; khi so với người tiền nhiệm, b&ecirc;n trong đ&acirc;y vẫn l&agrave; một sản phẩm c&oacute; m&agrave;n h&igrave;nh si&ecirc;u đẹp, tần số qu&eacute;t được n&acirc;ng cấp l&ecirc;n 120 Hz mượt m&agrave;, cảm biến camera c&oacute; k&iacute;ch thước lớn hơn, c&ugrave;ng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn s&agrave;ng c&ugrave;ng bạn chinh phục mọi thử th&aacute;ch.</p>\r\n', 'vàng', 213, 32000000, 18, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);


--
-- Chỉ mục cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `OrderDetail`
  ADD PRIMARY KEY (`orderId`,`productId`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbnguoidung`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbsanpham`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),


--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;





--
-- AUTO_INCREMENT cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `OrderDetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `Orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `tbnguoidung`
--
ALTER TABLE `Users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `tbsanpham`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `categoryid_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `Category` (`id`);

--
-- Các ràng buộc cho bảng `tbsanpham`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `userid_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
