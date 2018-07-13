-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yabukic`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `attendances`
--

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `userId` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `attendances`
--

INSERT INTO `attendances` (`id`, `subjectId`, `userId`) VALUES
(1, 1, '1642001'),
(2, 1, '1642001'),
(3, 1, '1642001'),
(4, 1, '1642001'),
(5, 1, '1642001'),
(6, 1, '1642001'),
(7, 1, '1642001'),
(8, 1, '1642001'),
(9, 1, '1642001');

-- --------------------------------------------------------

--
-- テーブルの構造 `passwords`
--

DROP TABLE IF EXISTS `passwords`;
CREATE TABLE `passwords` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `subjectId` int(11) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `passwords`
--

INSERT INTO `passwords` (`id`, `date`, `subjectId`, `password`) VALUES
(1, '2018-07-11', 1, '12345678'),
(2, '2018-07-11', 5, '00000000');

-- --------------------------------------------------------

--
-- テーブルの構造 `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `userId` varchar(8) NOT NULL,
  `period` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `subjects`
--

INSERT INTO `subjects` (`id`, `userId`, `period`, `name`) VALUES
(1, '1000001', 2, '情報リテラシ'),
(2, '1000001', 3, '情報リテラシ'),
(3, '2000002', 2, 'プロジェクトエンジニアリング'),
(4, '2000002', 3, 'プロジェクトエンジニアリング'),
(5, '1000001', 4, 'データ解析入門');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` varchar(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `teacherFlag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `teacherFlag`) VALUES
('1000001', '矢吹太朗', 'd', 1),
('1642001', '内藤大輝', 'a', 0),
('1642002', '戸田洸希', 'b', 0),
('1642003', '小玉悠太', 'c', 0),
('2000002', '田隈広紀', 'e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `passwords`
--
ALTER TABLE `passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
