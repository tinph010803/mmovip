-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th2 23, 2023 lúc 01:53 PM
-- Phiên bản máy phục vụ: 10.3.37-MariaDB-cll-lve
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `clmmwin_code2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ctk` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `stk` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `toi_thieu` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chanle`
--

CREATE TABLE `chanle` (
  `id` int(11) NOT NULL,
  `noidung` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `tyle` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chanle`
--

INSERT INTO `chanle` (`id`, `noidung`, `data`, `min`, `max`, `tyle`) VALUES
(1, 'C', 'chan', 5000, 500000, '2.4'),
(2, 'L', 'le', 5000, 500000, '2.4'),
(3, 'C2', 'chan2', 5000, 500000, '1.95'),
(4, 'L2', 'le2', 5000, 500000, '1.95');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giftcode`
--

CREATE TABLE `giftcode` (
  `id` int(11) NOT NULL,
  `giftcode` varchar(225) DEFAULT NULL,
  `giatri` double DEFAULT NULL,
  `giatri1` double DEFAULT NULL,
  `giatri2` double DEFAULT NULL,
  `luot` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_bank`
--

CREATE TABLE `history_bank` (
  `id` int(11) NOT NULL,
  `id_nap` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `trans_id` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `description` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` double DEFAULT NULL,
  `pthucnap` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsuchoi`
--

CREATE TABLE `lichsuchoi` (
  `id` int(11) NOT NULL,
  `username` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trans_id` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `noidung` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `money` double DEFAULT NULL,
  `tiennhan` double DEFAULT NULL,
  `game` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsuchuyentien`
--

CREATE TABLE `lichsuchuyentien` (
  `id` int(11) NOT NULL,
  `trans_id` varchar(225) DEFAULT NULL,
  `username` varchar(225) DEFAULT NULL,
  `nguoinhan` varchar(225) DEFAULT NULL,
  `money` double DEFAULT NULL,
  `noidung` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `time` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsugiftcode`
--

CREATE TABLE `lichsugiftcode` (
  `id` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `giftcode` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsuruttien`
--

CREATE TABLE `lichsuruttien` (
  `id` int(11) NOT NULL,
  `trans_id` varchar(225) DEFAULT NULL,
  `username` varchar(225) DEFAULT NULL,
  `stk` varchar(225) DEFAULT NULL,
  `money` double DEFAULT NULL,
  `bank` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `time` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mbbank_code`
--

CREATE TABLE `mbbank_code` (
  `mgd_mbbank` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momo_code`
--

CREATE TABLE `momo_code` (
  `mgd_momo` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `motphanba`
--

CREATE TABLE `motphanba` (
  `id` int(11) NOT NULL,
  `noidung` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `tyle` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `motphanba`
--

INSERT INTO `motphanba` (`id`, `noidung`, `data`, `min`, `max`, `tyle`) VALUES
(1, 'N1', 'N1', 5000, 500000, '3.5'),
(2, 'N2', 'N2', 5000, 500000, '3.5'),
(3, 'N3', 'N3', 5000, 500000, '3.5'),
(4, 'N0', 'N0', 5000, 500000, '6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `noidung_nt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `noidung_nt`) VALUES
(12, 'dcm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ruttien`
--

CREATE TABLE `ruttien` (
  `id` int(11) NOT NULL,
  `min` double DEFAULT NULL,
  `max` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `ruttien`
--

INSERT INTO `ruttien` (`id`, `min`, `max`) VALUES
(1, 5000, 5000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `tenweb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `logo` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `biaweb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `faviconweb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `motaweb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `keywordweb` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status_website` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apizalopay` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apimomo` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apimbbank` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apitsr` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modal` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contacttele` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contactzalo` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `tenweb`, `logo`, `biaweb`, `faviconweb`, `motaweb`, `keywordweb`, `status_website`, `apizalopay`, `apimomo`, `apimbbank`, `apitsr`, `modal`, `contacttele`, `contactzalo`) VALUES
(1, 'XITRUM Software', 'https://i.imgur.com/TPPTYzS.png', 'https://sieuthicode.net/assets/storage/theme/logoD3J.png', 'https://preview.keenthemes.com/metronic/theme/html/demo2/dist/assets/media/svgmisc005-bebo.svg', 'NẠP RÚT 1S SIÊU XANH CHÍN', 'muasource, code free, share code, code bán mã nguồn, code gạch thẻ, cmsnt, tuanori, code bán mã nguồn tạo web, admin vn, code checkscam free, muasourceaisa, mua source', '', '', '5c73188f-8f8e-4428-9b12-423be15055d6', '', '', 'Chào Mừng Quý Khách !\n', 'https://t.me/DangNhuNam', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taixiu`
--

CREATE TABLE `taixiu` (
  `id` int(11) NOT NULL,
  `noidung` varchar(225) DEFAULT NULL,
  `data` varchar(225) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `tyle` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taixiu`
--

INSERT INTO `taixiu` (`id`, `noidung`, `data`, `min`, `max`, `tyle`) VALUES
(1, 'T', 'tai', 5000, 500000, '1.95'),
(2, 'X', 'xiu', 5000, 500000, '1.95'),
(3, 'T2', 'tai2', 5000, 500000, '1.95'),
(4, 'X2', 'xiu2', 5000, 500000, '1.95');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tong3so`
--

CREATE TABLE `tong3so` (
  `id` int(11) NOT NULL,
  `noidung` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `tyle` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tong3so`
--

INSERT INTO `tong3so` (`id`, `noidung`, `data`, `min`, `max`, `tyle`) VALUES
(1, 'T1', 'T1', 5000, 500000, '2.5'),
(2, 'T2', 'T2', 5000, 500000, '5'),
(3, 'T3', 'T3', 5000, 500000, '9');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tsr_pay`
--

CREATE TABLE `tsr_pay` (
  `mgd_tsr` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `password` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `tong_nap` double DEFAULT NULL,
  `money` double DEFAULT NULL,
  `tong_tru` double DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `bannd` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `lastdate` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `url_config` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `time` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `token`, `tong_nap`, `money`, `tong_tru`, `level`, `bannd`, `lastdate`, `url_config`, `time`) VALUES
(1, 'admincuto', '25f9e794323b453885f5181f1b624d0b', 'admin@admin.com', '5851545106b5911b24ccbf08374b8d8f', 0, 0, 0, '3', '0', '2023/02/20 19:27:54', 'CLZLPAY123.ME', '2023/02/20 19:27:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xien`
--

CREATE TABLE `xien` (
  `id` int(11) NOT NULL,
  `noidung` varchar(225) DEFAULT NULL,
  `data` varchar(225) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `tyle` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `xien`
--

INSERT INTO `xien` (`id`, `noidung`, `data`, `min`, `max`, `tyle`) VALUES
(1, 'CX', 'cx', 5000, 500000, '3.5'),
(2, 'LT', 'lt', 5000, 500000, '3.5'),
(3, 'CT', 'ct', 5000, 500000, '3.5'),
(4, 'LX', 'lx', 5000, 500000, '3.5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `zalopay_code`
--

CREATE TABLE `zalopay_code` (
  `mgd_zalopay` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chanle`
--
ALTER TABLE `chanle`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_bank`
--
ALTER TABLE `history_bank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsuchoi`
--
ALTER TABLE `lichsuchoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsuchuyentien`
--
ALTER TABLE `lichsuchuyentien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsugiftcode`
--
ALTER TABLE `lichsugiftcode`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsuruttien`
--
ALTER TABLE `lichsuruttien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mbbank_code`
--
ALTER TABLE `mbbank_code`
  ADD PRIMARY KEY (`mgd_mbbank`);

--
-- Chỉ mục cho bảng `momo_code`
--
ALTER TABLE `momo_code`
  ADD PRIMARY KEY (`mgd_momo`);

--
-- Chỉ mục cho bảng `motphanba`
--
ALTER TABLE `motphanba`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ruttien`
--
ALTER TABLE `ruttien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taixiu`
--
ALTER TABLE `taixiu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tong3so`
--
ALTER TABLE `tong3so`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tsr_pay`
--
ALTER TABLE `tsr_pay`
  ADD PRIMARY KEY (`mgd_tsr`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `xien`
--
ALTER TABLE `xien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `chanle`
--
ALTER TABLE `chanle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `giftcode`
--
ALTER TABLE `giftcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `history_bank`
--
ALTER TABLE `history_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `lichsuchoi`
--
ALTER TABLE `lichsuchoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `lichsuchuyentien`
--
ALTER TABLE `lichsuchuyentien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `lichsugiftcode`
--
ALTER TABLE `lichsugiftcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lichsuruttien`
--
ALTER TABLE `lichsuruttien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `motphanba`
--
ALTER TABLE `motphanba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `ruttien`
--
ALTER TABLE `ruttien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `taixiu`
--
ALTER TABLE `taixiu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tong3so`
--
ALTER TABLE `tong3so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT cho bảng `xien`
--
ALTER TABLE `xien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
