-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2014 at 07:33 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jcinventory`
--
CREATE DATABASE IF NOT EXISTS `jcinventory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jcinventory`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `last_update`) VALUES
(1, 'IT department', '2014-03-05 10:43:32'),
(3, 'test2', '2014-03-05 11:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `type` enum('staff','admin','user','','','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `username`, `password`, `fname`, `lname`, `type`) VALUES
(1, 'rrongie', '5f4dcc3b5aa765d61d8327deb882cf99', 'wrong', 'G', 'user'),
(2, 'staff', '5f4dcc3b5aa765d61d8327deb882cf99', 'katz', 'poy', 'staff'),
(8, 'katz123', '5f4dcc3b5aa765d61d8327deb882cf99', 'katz', 'katz', 'user'),
(9, 'test123', '5f4dcc3b5aa765d61d8327deb882cf99', 'test', 'test', 'staff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
