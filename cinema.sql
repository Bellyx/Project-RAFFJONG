-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2019 at 09:04 PM
-- Server version: 5.5.59-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `time_d` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `nname` varchar(200) COLLATE utf8_bin NOT NULL,
  `ppl` varchar(200) COLLATE utf8_bin NOT NULL,
  `t` varchar(50) COLLATE utf8_bin NOT NULL,
  `e` varchar(50) COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone2` varchar(255) COLLATE utf8_bin NOT NULL,
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `time_d`, `name`, `nname`, `ppl`, `t`,`e`,`phone`,`phone2`) VALUES
(1, '19', 'admin', 'min', '10', '1552657415','12,13','1552657415','225541');



-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE IF NOT EXISTS `seat` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `num` varchar(10) NOT NULL,
  `time_d` int(20) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `num`, `time_d`, `status`) VALUES
(1, '20', 10, 1),
(2, '19', 10, 1),
(3, '18', 10, 1),
(4, '17', 10, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
