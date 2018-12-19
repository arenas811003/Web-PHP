-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 19 日 09:42
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
(1, 'TK', '1234'),
(10, 'TK', '12V無捆包'),
(26, 'TK2', '12V無捆包'),
(27, 'TK3', '12V無捆包'),
(28, 'TK4', '12V無捆包'),
(29, 'TK5', '12V無捆包'),
(35, 'TK', 'sssss'),
(36, 'TK4', 'sdsf');

-- --------------------------------------------------------

--
-- 資料表結構 `pi_list`
--

CREATE TABLE `pi_list` (
  `PID` int(50) NOT NULL,
  `P_NAME` varchar(50) CHARACTER SET utf8 NOT NULL,
  `P_DESCRIBE` varchar(50) CHARACTER SET utf8 NOT NULL,
  `P_FID` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `pi_list`
--

INSERT INTO `pi_list` (`PID`, `P_NAME`, `P_DESCRIBE`, `P_FID`) VALUES
(1, '00-11-26-57-F1-04 ', 'Yellow', '26'),
(2, '11-00-26-57-F1-04', 'Green', '26');

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
(116, 'TK57'),
(118, 'ddd'),
(119, 'dsfdsf'),
(120, 'sadsad'),
(121, 'dsfsdf');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `ID` int(50) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `account` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `permission` varchar(1) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`ID`, `username`, `account`, `password`, `email`, `permission`) VALUES
(1, 'Admin', 'Admin', '666', 'tenpercent@mail.com', '0'),
(10, 'Tenpercent', 'Tenpercent', '666', 'arenas@gmail.com', '1'),
(11, 'Mick', 'Mick', '666', 'Mick@gmail.com', '2');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `manual`
--
ALTER TABLE `manual`
  ADD PRIMARY KEY (`FID`);

--
-- 資料表索引 `pi_list`
--
ALTER TABLE `pi_list`
  ADD PRIMARY KEY (`PID`);

--
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`FID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `manual`
--
ALTER TABLE `manual`
  MODIFY `FID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- 使用資料表 AUTO_INCREMENT `pi_list`
--
ALTER TABLE `pi_list`
  MODIFY `PID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `type`
--
ALTER TABLE `type`
  MODIFY `FID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
