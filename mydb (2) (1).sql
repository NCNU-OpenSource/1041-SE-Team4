-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2015 at 05:56 PM
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
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `breadid` int(11) NOT NULL,
  `breadname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `time` time NOT NULL,
  `Material` int(11) NOT NULL,
  `LV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`breadid`, `breadname`, `price`, `exp`, `time`, `Material`, `LV`) VALUES
(1, '小餐包', 15, 20, '00:00:30', 1, 1),
(2, '波羅麵包', 40, 50, '00:01:00', 2, 2),
(3, '蛋塔', 110, 130, '00:02:30', 5, 3),
(4, '牛角麵包', 250, 320, '00:05:00', 10, 4),
(5, '吐司', 750, 800, '00:10:00', 20, 5),
(6, '總匯麵包', 3000, 2000, '00:30:00', 50, 6),
(7, '水果蛋糕', 15000, 10000, '01:30:00', 200, 7);

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
  `money` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`userid`, `user`, `bread1`, `bread2`, `bread3`, `bread4`, `bread5`, `bread6`, `bread7`, `oven1`, `oven2`, `oven3`, `oven4`, `Material`, `money`) VALUES
(1, 'abcd', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 10),
(2, 'sam', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 10),
(3, 'aaa', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 10),
(4, 'KKBB', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 10);

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
(1, 'abcd', '123456', 0, 1),
(2, 'sam', '123', 0, 1),
(3, 'KKBB', '123', 0, 1),
(4, 'aaa', '123', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`breadid`);

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
