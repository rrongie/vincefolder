-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 06:41 PM
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
-- Table structure for table `consumable_items`
--

CREATE TABLE IF NOT EXISTS `consumable_items` (
  `consumable_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_unit` varchar(255) NOT NULL,
  `item_amount` float(10,2) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`consumable_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `consumable_items`
--

INSERT INTO `consumable_items` (`consumable_id`, `department_id`, `supplier_id`, `supplier`, `item_name`, `item_qty`, `item_unit`, `item_amount`, `date_add`) VALUES
(1, 1, 2, 'desire	', 'mineral water	', 10, 'container', 25.00, '2014-03-19 17:27:38'),
(2, 2, 2, 'thinking tools	', 'epson ink cartridge 141 black', 2, 'pcs', 123.00, '2014-03-19 17:28:09'),
(3, 1, 1, 'copylanda', 'paper assembly fussing 230v', 16, 'pcs', 199.00, '2014-03-19 17:28:54'),
(4, 1, 2, 'visayan Educational Supply', 'white envelope(trojan)	', 15, '1', 3200.00, '2014-03-19 17:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `last_update`) VALUES
(1, 'IT department', '2014-03-05 10:43:32'),
(3, 'Accounting', '2014-03-10 02:40:52'),
(4, 'Leasing', '2014-03-10 02:41:25'),
(5, 'New Department', '2014-03-10 05:05:37'),
(6, 'Again ', '2014-03-10 05:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_items`
--

CREATE TABLE IF NOT EXISTS `fixed_items` (
  `fixed_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_amount` float(10,2) NOT NULL,
  `item_serial` varchar(255) NOT NULL,
  `dateadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`fixed_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fixed_items`
--

INSERT INTO `fixed_items` (`fixed_id`, `department_id`, `supplier`, `item_name`, `item_qty`, `item_amount`, `item_serial`, `dateadd`, `supplier_id`) VALUES
(1, 2, 'desire	', 'low back office chair	', 16, 2599.00, 'low back office chair	', '2014-03-19 17:40:12', 9),
(2, 1, 'thinking tools', 'visitor chair', 10, 1500.00, 'YC128', '2014-03-19 17:39:31', 2),
(3, 2, 'copyland', 'writing table', 16, 17900.00, 'sdlkas23', '2014-03-19 17:39:35', 1),
(4, 1, 'desire	', 'wenge office desk', 23, 2700.00, 'ykxd2', '2014-03-19 17:39:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `item_brand` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_type` enum('Fixed','Consumable','','') NOT NULL,
  `item_unit` varchar(255) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_serial` varchar(255) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `supplier_id`, `department_id`, `item_brand`, `item_name`, `item_type`, `item_unit`, `item_qty`, `item_price`, `item_serial`, `date_add`) VALUES
(1, 1, 1, 'eqweqweqw', 'eqeqeqqew', 'Fixed', '12', 23, 3.00, '12', '2014-03-19 15:27:30'),
(2, 1, 1, 'asdada', 'dadada', 'Fixed', '134', 3, 3.00, '13', '2014-03-19 15:29:56'),
(3, 1, 1, 'asdasa', 'asdad', 'Consumable', '32', 2323, 3.00, '23', '2014-03-19 15:31:32'),
(4, 0, 0, 'brand', 'mineral water', 'Fixed', 'container', 5, 200.00, '2345', '2014-03-11 07:00:14'),
(5, 1, 0, 'brand', 'mineral water', 'Consumable', 'container', 4, 23.00, '9999', '2014-03-11 07:00:07'),
(6, 9, 4, 'brand', 'mineral water', 'Fixed', 'container', 4, 43.00, '345', '2014-03-11 06:59:58'),
(7, 1, 1, 'test', 'chair', 'Fixed', 'chair', 7, 6.00, '879978', '2014-03-10 03:02:29'),
(8, 9, 4, 'brand', 'epson ink cartridge 141 black', 'Consumable', 'pcs', 7, 6.00, '343242', '2014-03-10 03:04:27'),
(9, 9, 1, 'last', 'last', 'Consumable', 'last', 3, 23.00, '654', '2014-03-10 03:05:27');

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
(8, 'katz123', '5f4dcc3b5aa765d61d8327deb882cf99', 'katz', 'katz', 'staff'),
(9, 'test123', '5f4dcc3b5aa765d61d8327deb882cf99', 'test', 'test', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_fname` varchar(255) NOT NULL,
  `supplier_lname` varchar(255) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_fname`, `supplier_lname`, `address`, `mobile`) VALUES
(1, 'katz', 'vinz', 'talamban Cebu City', '0999999999'),
(2, 'vinz', 'Oblad', 'Lahug Cebu City', '09888888888'),
(9, 'Rongie', 'Andrade', 'Bacyan Cebu City', '09353433738'),
(10, 'Mariz', 'Mariz', 'Talamban Cebu City', '0999999999'),
(11, 'Bry', 'secret', 'Cebu City', '09297982124');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
