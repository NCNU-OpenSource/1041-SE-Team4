-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2015 at 10:15 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
  `id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `msg` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `title`, `msg`, `name`) VALUES
(5, '7', 'hgfh', 'gfdhg');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `breadid` int(11) NOT NULL,
  `breadname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `time` time NOT NULL,
  `Material` int(11) NOT NULL,
  `LV` int(11) NOT NULL,
  `timeout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`breadid`, `breadname`, `price`, `exp`, `time`, `Material`, `LV`, `timeout`) VALUES
(1, '小餐包', 15, 20, '00:00:30', 1, 1, 3000),
(2, '波羅麵包', 40, 50, '00:01:00', 2, 2, 60000),
(3, '蛋塔', 110, 130, '00:02:30', 5, 3, 150000),
(4, '牛角麵包', 250, 320, '00:05:00', 10, 4, 300000),
(5, '吐司', 750, 800, '00:10:00', 20, 5, 600000),
(6, '總匯麵包', 3000, 2000, '00:30:00', 50, 6, 1800000),
(7, '水果蛋糕', 15000, 10000, '01:30:00', 200, 7, 5400000);

-- --------------------------------------------------------

--
-- Table structure for table `lv`
--

CREATE TABLE IF NOT EXISTS `lv` (
  `lv` int(11) NOT NULL,
  `totallv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lv`
--

INSERT INTO `lv` (`lv`, `totallv`) VALUES
(1, 100),
(2, 500),
(3, 1700),
(4, 5300),
(5, 14000),
(6, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `productid` int(11) NOT NULL,
  `productprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`productid`, `productprice`) VALUES
(1, 1000),
(2, 10000),
(3, 100000),
(4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `userid` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `bread1` int(11) NOT NULL DEFAULT '0',
  `bread2` int(11) NOT NULL DEFAULT '0',
  `bread3` int(11) NOT NULL DEFAULT '0',
  `bread4` int(11) NOT NULL DEFAULT '0',
  `bread5` int(11) NOT NULL DEFAULT '0',
  `bread6` int(11) NOT NULL DEFAULT '0',
  `bread7` int(11) NOT NULL DEFAULT '0',
  `oven1` int(11) NOT NULL DEFAULT '1',
  `oven2` int(11) NOT NULL DEFAULT '0',
  `oven3` int(11) NOT NULL DEFAULT '0',
  `oven4` int(11) NOT NULL DEFAULT '0',
  `Material` int(11) NOT NULL DEFAULT '0',
  `money` int(11) NOT NULL DEFAULT '10',
  `lv` int(11) NOT NULL,
  `EXP` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`userid`, `user`, `bread1`, `bread2`, `bread3`, `bread4`, `bread5`, `bread6`, `bread7`, `oven1`, `oven2`, `oven3`, `oven4`, `Material`, `money`, `lv`, `EXP`) VALUES
(1, 'abcd', 8, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 2, 190),
(2, 'sam', 12, 6, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 500, 2, 350),
(3, 'KKBB', 50, 8, 0, 5, 0, 0, 0, 1, 1, 1, 0, 58, 1500, 6, 14040),
(4, 'aaa', 25, 6, 9, 7, 20, 56, 45, 1, 1, 1, 1, 979, 8000, 27, 60420);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  `EXP` int(11) NOT NULL,
  `lv` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `EXP`, `lv`) VALUES
(1, 'abcd', '123456', 50, 1),
(2, 'sam', '123', 150, 2),
(3, 'KKBB', '123', 5500, 5),
(4, 'aaa', '123', 60000, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`breadid`);

--
-- Indexes for table `lv`
--
ALTER TABLE `lv`
  ADD PRIMARY KEY (`lv`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
