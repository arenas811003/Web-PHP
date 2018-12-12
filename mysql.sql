-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 12 日 07:01
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ten`
--
CREATE DATABASE IF NOT EXISTS `ten` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ten`;

-- --------------------------------------------------------

--
-- 資料表結構 `manual`
--

CREATE TABLE `manual` (
  `FID` int(50) NOT NULL,
  `F_TYPE` varchar(50) CHARACTER SET utf8 NOT NULL,
  `F_NAME` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `manual`
--

INSERT INTO `manual` (`FID`, `F_TYPE`, `F_NAME`) VALUES
(1, 'TK', '無捆包'),
(2, 'TK', 'V12無捆包'),
(10, 'TK', '12V無捆包'),
(26, 'TK2', '12V無捆包'),
(27, 'TK3', '12V無捆包'),
(28, 'TK4', '12V無捆包'),
(29, 'TK5', '12V無捆包'),
(30, 'TK56', '12V無捆包'),
(31, 'TK57', '123V無捆包');

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE `type` (
  `FID` int(50) NOT NULL,
  `F_TYPE` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `type`
--

INSERT INTO `type` (`FID`, `F_TYPE`) VALUES
(18, 'TK'),
(19, 'TK2'),
(20, 'TK4'),
(113, 'TK3'),
(114, 'TK5'),
(115, 'TK56'),
(116, 'TK57');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `manual`
--
ALTER TABLE `manual`
  ADD PRIMARY KEY (`FID`);

--
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`FID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `manual`
--
ALTER TABLE `manual`
  MODIFY `FID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表 AUTO_INCREMENT `type`
--
ALTER TABLE `type`
  MODIFY `FID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
