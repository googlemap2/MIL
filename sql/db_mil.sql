-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 09, 2020 lúc 06:57 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_mil`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id_account` varchar(50) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `dateRegister` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id_account`, `password`, `dateRegister`, `email`) VALUES
('admin', '$2y$10$W7oXfWgCFUWb4BgnRcE6Qerg7sRGrbebDhmNJFGOfbAcooCcb0z/W', '2020-08-07', 'hieu@gmail.com'),
('asd', '$2y$10$VTgcI1z/5OD5CsYh3bYnSu61fdNywgR0WJkVn5kFgZ1kIQQji9F.G', '2020-08-07', 'hieu@gmail.com'),
('hieu', '$2y$10$cYjC8NxOvweXSJsSyxECi.vuEBGRjao6.rQ2MhMQqViU2/iYdJW.q', '2020-08-07', 'hieu@gmail.com'),
('nhuy', '$2y$10$zo0cIgEkDbVLvKblI6fkHuMbOshbB4xdonHkOC9E0JWXyMBSN7Lna', '2020-08-09', 'Azami.Mika.Aki@gmail.com'),
('user', '$2y$10$8sj4S/0LSamAt2x3gRYUteVpn2OR1SdAp9b4SCLQjFs3aLAgL/HU2', '2020-08-07', 'hieu@gmail.com'),
('vinh', '$2y$10$JiNFsOcEbUcyA5g51KLZU.QMUoUSRTF.fGSCP1QnUlCheSmRFrzOK', '2020-08-09', 'Azami.Mika.Aki@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `ID_Categories` varchar(50) NOT NULL,
  `Category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`ID_Categories`, `Category`) VALUES
('CG01', 'Nhạc trẻ'),
('CG02', 'Nhạc vàng'),
('CG03', 'Nhạc cách mạng'),
('CG04', 'Nhạc Rock'),
('CG05', 'Nhạc Dance'),
('CG06', 'Nhạc trữ tình'),
('CG07', 'Nhạc dân ca');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `infoplaylist`
--

CREATE TABLE `infoplaylist` (
  `id_playlist` varchar(50) NOT NULL,
  `ID_Song` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `infoplaylist`
--

INSERT INTO `infoplaylist` (`id_playlist`, `ID_Song`) VALUES
('Playlist của Ý_5f2fd5cfdb9a7', 'Chim trắng mồ côi)5f2fc81bc4ada'),
('Playlist của Ý_5f2fd5cfdb9a7', 'Duyên Phận)5f2fc9fb48e1b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `musican`
--

CREATE TABLE `musican` (
  `ID_Musican` varchar(50) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Sex` tinyint(1) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `NumberPhone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlist`
--

CREATE TABLE `playlist` (
  `id_playlist` varchar(50) NOT NULL,
  `id_account` varchar(50) DEFAULT NULL,
  `namePlaylist` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `id_account`, `namePlaylist`) VALUES
('Playlist của Hiếu_5f2fdc6a69dde', 'nhuy', 'Playlist của Hiếu'),
('Playlist của Ý_5f2fd5cfdb9a7', 'nhuy', 'Playlist của Ý'),
('Playlist Nhân_5f2fdc5f91d81', 'nhuy', 'Playlist Nhân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `poster`
--

CREATE TABLE `poster` (
  `ID_Poster` varchar(50) NOT NULL,
  `ID_Song` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `poster`
--

INSERT INTO `poster` (`ID_Poster`, `ID_Song`) VALUES
('Anh thanh niên5f2fca2a224bd', 'Anh thanh niên)5f2fca2a224bb'),
('Chim trắng mồ côi5f2fc81bc4adf', 'Chim trắng mồ côi)5f2fc81bc4ada'),
('Duyên Phận5f2fc9fb48e1d', 'Duyên Phận)5f2fc9fb48e1b'),
('Gió vẫn hát5f2fe17750002', 'Gió vẫn hát)5f2fe17750000'),
('Hoa nở không màu5f2fc98b52566', 'Hoa nở không màu)5f2fc98b52562'),
('Hương tóc mạ non5f2fc95c8be82', 'Hương tóc mạ non)5f2fc95c8be7b'),
('Nắm bàn tay say cả đời5f2fc9cd855ce', 'Nắm bàn tay say cả đời)5f2fc9cd855cb'),
('Nối lại tình xưa5f2fcbf3a16b5', 'Nối lại tình xưa)5f2fcbf3a16b3'),
('Tình đơn phương5f2fc849dc3b8', 'Tình đơn phương)5f2fc849dc3b6'),
('Trưởng thành5f2fe1dc1be07', 'Trưởng thành)5f2fe1dc1be04'),
('Võ Đông Sơn Bạch Thu Hà5f2fcfb64c519', 'Võ Đông Sơn Bạch Thu Hà)5f2fcfb64c513'),
('Đón xuân này nhớ xuân xưa5f2fce68ddcac', 'Đón xuân này nhớ xuân xưa)5f2fce68ddca8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producer`
--

CREATE TABLE `producer` (
  `ID_Producer` varchar(50) NOT NULL,
  `FullName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `song`
--

CREATE TABLE `song` (
  `ID_Song` varchar(50) NOT NULL,
  `ID_Producer` varchar(50) DEFAULT NULL,
  `ID_Categories` varchar(50) DEFAULT NULL,
  `id_account` varchar(50) DEFAULT NULL,
  `ID_Musican` varchar(50) DEFAULT NULL,
  `nameSong` varchar(50) DEFAULT NULL,
  `viewSong` bigint(50) DEFAULT NULL,
  `datePost` date DEFAULT NULL,
  `license` tinyint(1) DEFAULT NULL,
  `singer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `song`
--

INSERT INTO `song` (`ID_Song`, `ID_Producer`, `ID_Categories`, `id_account`, `ID_Musican`, `nameSong`, `viewSong`, `datePost`, `license`, `singer`) VALUES
('Anh thanh niên)5f2fca2a224bb', NULL, 'CG01', 'admin', NULL, 'Anh thanh niên', 0, '2020-08-09', 1, 'Huy R'),
('Chim trắng mồ côi)5f2fc81bc4ada', NULL, 'CG07', 'admin', NULL, 'Chim trắng mồ côi', 0, '2020-08-09', 1, 'Cẩm Ly'),
('Duyên Phận)5f2fc9fb48e1b', NULL, 'CG06', 'admin', NULL, 'Duyên Phận', 0, '2020-08-09', 1, 'Như Quỳnh'),
('Gió vẫn hát)5f2fe17750000', NULL, 'CG01', 'nhuy', NULL, 'Gió vẫn hát', 0, '2020-08-09', 0, 'Long Phạm'),
('Hoa nở không màu)5f2fc98b52562', NULL, 'CG01', 'admin', NULL, 'Hoa nở không màu', 0, '2020-08-09', 1, 'Hoài Lâm'),
('Hương tóc mạ non)5f2fc95c8be7b', NULL, 'CG07', 'admin', NULL, 'Hương tóc mạ non', 0, '2020-08-09', 1, 'Cẩm Ly, Quốc Đại'),
('Nắm bàn tay say cả đời)5f2fc9cd855cb', NULL, 'CG01', 'admin', NULL, 'Nắm bàn tay say cả đời', 0, '2020-08-09', 1, 'Đạt Trần, Nâu'),
('Nối lại tình xưa)5f2fcbf3a16b3', NULL, 'CG06', 'admin', NULL, 'Nối lại tình xưa', 0, '2020-08-09', 1, 'Như Quỳnh, Mạnh Quỳnh'),
('Tình đơn phương)5f2fc849dc3b6', NULL, 'CG01', 'admin', NULL, 'Tình đơn phương', 0, '2020-08-09', 1, 'Đan Trường'),
('Trưởng thành)5f2fe1dc1be04', NULL, 'CG01', 'nhuy', NULL, 'Trưởng thành', 0, '2020-08-09', 0, 'Triệu Anh Đức'),
('Võ Đông Sơn Bạch Thu Hà)5f2fcfb64c513', NULL, 'CG06', 'admin', NULL, 'Võ Đông Sơn Bạch Thu Hà', 0, '2020-08-09', 1, 'Kim Tử Long'),
('Đón xuân này nhớ xuân xưa)5f2fce68ddca8', NULL, 'CG06', 'admin', NULL, 'Đón xuân này nhớ xuân xưa', 0, '2020-08-09', 1, 'Trường Vũ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_Categories`);

--
-- Chỉ mục cho bảng `infoplaylist`
--
ALTER TABLE `infoplaylist`
  ADD PRIMARY KEY (`id_playlist`,`ID_Song`),
  ADD KEY `FK_INFOPLAYLIST2` (`ID_Song`);

--
-- Chỉ mục cho bảng `musican`
--
ALTER TABLE `musican`
  ADD PRIMARY KEY (`ID_Musican`);

--
-- Chỉ mục cho bảng `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id_playlist`),
  ADD KEY `FK_RELATIONSHIP_1` (`id_account`);

--
-- Chỉ mục cho bảng `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`ID_Poster`),
  ADD KEY `fk_song` (`ID_Song`);

--
-- Chỉ mục cho bảng `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`ID_Producer`);

--
-- Chỉ mục cho bảng `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`ID_Song`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_Categories`),
  ADD KEY `FK_RELATIONSHIP_4` (`id_account`),
  ADD KEY `ID_Producer` (`ID_Producer`),
  ADD KEY `ID_Musican` (`ID_Musican`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `infoplaylist`
--
ALTER TABLE `infoplaylist`
  ADD CONSTRAINT `FK_INFOPLAYLIST` FOREIGN KEY (`id_playlist`) REFERENCES `playlist` (`id_playlist`),
  ADD CONSTRAINT `FK_INFOPLAYLIST2` FOREIGN KEY (`ID_Song`) REFERENCES `song` (`ID_Song`);

--
-- Các ràng buộc cho bảng `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`);

--
-- Các ràng buộc cho bảng `poster`
--
ALTER TABLE `poster`
  ADD CONSTRAINT `fk_song` FOREIGN KEY (`ID_Song`) REFERENCES `song` (`ID_Song`);

--
-- Các ràng buộc cho bảng `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_Categories`) REFERENCES `categories` (`ID_Categories`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`),
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`ID_Producer`) REFERENCES `producer` (`ID_Producer`),
  ADD CONSTRAINT `song_ibfk_2` FOREIGN KEY (`ID_Musican`) REFERENCES `musican` (`ID_Musican`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
