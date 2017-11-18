-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-11-18 14:45:37
-- 伺服器版本: 10.1.21-MariaDB
-- PHP 版本： 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ohndejkc_svList`
--

-- --------------------------------------------------------

--
-- 資料表結構 `svList_account`
--

CREATE TABLE `svList_account` (
  `No` int(111) NOT NULL,
  `account` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `vpw` varchar(11111) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `brule` int(11) NOT NULL DEFAULT '0',
  `locked` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 資料表結構 `svList_bc`
--

CREATE TABLE `svList_bc` (
  `No` int(11) NOT NULL,
  `contect` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `svList_comment`
--

CREATE TABLE `svList_comment` (
  `No` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `server` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locked` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `svList_list`
--

CREATE TABLE `svList_list` (
  `No` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` varchar(11111) NOT NULL,
  `query` varchar(11111) NOT NULL,
  `owner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `describtion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` text NOT NULL,
  `registered` text NOT NULL,
  `enable` int(1) NOT NULL DEFAULT '1',
  `ipshow` int(11) NOT NULL DEFAULT '0',
  `ipbecause` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 資料表結構 `svList_loginlog`
--

CREATE TABLE `svList_loginlog` (
  `No` int(11) NOT NULL,
  `account` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `svList_op`
--

CREATE TABLE `svList_op` (
  `No` int(11) NOT NULL,
  `contect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reporter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `opened` int(1) NOT NULL DEFAULT '0',
  `adminre` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `svList_account`
--
ALTER TABLE `svList_account`
  ADD PRIMARY KEY (`No`);

--
-- 資料表索引 `svList_bc`
--
ALTER TABLE `svList_bc`
  ADD PRIMARY KEY (`No`);

--
-- 資料表索引 `svList_comment`
--
ALTER TABLE `svList_comment`
  ADD PRIMARY KEY (`No`);

--
-- 資料表索引 `svList_list`
--
ALTER TABLE `svList_list`
  ADD PRIMARY KEY (`No`);

--
-- 資料表索引 `svList_loginlog`
--
ALTER TABLE `svList_loginlog`
  ADD PRIMARY KEY (`No`);

--
-- 資料表索引 `svList_op`
--
ALTER TABLE `svList_op`
  ADD PRIMARY KEY (`No`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `svList_account`
--
ALTER TABLE `svList_account`
  MODIFY `No` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `svList_bc`
--
ALTER TABLE `svList_bc`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `svList_comment`
--
ALTER TABLE `svList_comment`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `svList_list`
--
ALTER TABLE `svList_list`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- 使用資料表 AUTO_INCREMENT `svList_loginlog`
--
ALTER TABLE `svList_loginlog`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用資料表 AUTO_INCREMENT `svList_op`
--
ALTER TABLE `svList_op`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
