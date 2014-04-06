-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2014 at 09:39 PM
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
-- Table structure for table `asset_code`
--

CREATE TABLE IF NOT EXISTS `asset_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `asset_code` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE IF NOT EXISTS `borrowers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `borrower_id` int(11) NOT NULL,
  `borrower_name` varchar(50) NOT NULL,
  `borrower_idnum` int(11) NOT NULL,
  `borrower_dept` varchar(70) NOT NULL,
  `borrower_status` enum('Not Returned','Returned') DEFAULT 'Not Returned',
  `borrowed_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `itemid` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `borrower_id`, `borrower_name`, `borrower_idnum`, `borrower_dept`, `borrower_status`, `borrowed_date`, `return_date`, `timestamp`, `itemid`, `remarks`) VALUES
(16, 497534, 'test', 2131312, 'Leasing', 'Returned', '2014-04-07 02:07:15', '2014-04-07 03:20:00', '2014-04-06 19:20:00', 4, 'ok'),
(17, 497534, 'test', 2131312, 'Leasing', 'Returned', '2014-04-07 02:07:15', '2014-04-07 03:20:00', '2014-04-06 19:20:00', 6, 'ok'),
(18, 76709, 'rongie', 23121312, 'IT department', 'Returned', '2014-04-07 02:31:18', '2014-04-07 03:19:53', '2014-04-06 19:19:53', 1, 'retuern'),
(19, 678534, 'ringie', 9304967, 'Leasing', 'Returned', '2014-04-07 02:41:48', '2014-04-07 02:44:53', '2014-04-06 18:44:53', 6115, 'naguba'),
(20, 845341, 'tester', 13132312, 'Snack Bar', 'Returned', '2014-04-07 02:51:58', '2014-04-07 03:03:38', '2014-04-06 19:03:39', 6115, 'naguba nasad'),
(21, 341, 'testes', 3123112, 'Accounting', 'Returned', '2014-04-07 03:05:32', '2014-04-07 03:19:40', '2014-04-06 19:19:40', 6115, 'ayo na'),
(22, 5341, 'test agan', 213132, 'Again', 'Returned', '2014-04-07 03:23:35', '2014-04-07 03:24:49', '2014-04-06 19:24:49', 6115, 'giuli na'),
(23, 5341, 'test many', 1231331, 'Leasing', 'Returned', '2014-04-07 03:25:32', '2014-04-07 03:26:04', '2014-04-06 19:26:05', 753417, 'thia'),
(24, 5341, 'test many', 1231331, 'Leasing', 'Returned', '2014-04-07 03:25:32', '2014-04-07 03:26:18', '2014-04-06 19:26:18', 24, '3232'),
(25, 5341, 'test many', 1231331, 'Leasing', 'Returned', '2014-04-07 03:25:32', '2014-04-07 03:26:25', '2014-04-06 19:26:25', 6115, 'tes'),
(26, 828424, 'test', 9304967, 'IT department', 'Returned', '2014-04-07 03:32:14', '2014-04-07 03:33:25', '2014-04-06 19:33:25', 6115, 'suki');

-- --------------------------------------------------------

--
-- Table structure for table `consumables`
--

CREATE TABLE IF NOT EXISTS `consumables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requestor_dept` varchar(50) NOT NULL,
  `requestor_name` varchar(80) NOT NULL,
  `requestor_id` int(11) NOT NULL,
  `request_date` datetime NOT NULL,
  `cart_data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `consumables`
--

INSERT INTO `consumables` (`id`, `requestor_dept`, `requestor_name`, `requestor_id`, `request_date`, `cart_data`) VALUES
(1, 'IT department', 'Bryan', 123942, '0000-00-00 00:00:00', 'a:1:{s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:10:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:2:"10";s:5:"price";s:4:"3.00";s:4:"name";s:13:"mineral water";s:6:"serial";s:5:"test ";s:5:"asset";s:5:"mn2gy";s:5:"brand";s:6:"Desire";s:4:"type";s:6:"Desire";s:8:"subtotal";d:30;}}'),
(2, 'IT department', 'bryan', 0, '2014-03-30 00:00:00', 'a:1:{s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:10:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:1:"1";s:5:"price";s:4:"3.00";s:4:"name";s:13:"mineral water";s:6:"serial";s:5:"test ";s:5:"asset";s:5:"mn2gy";s:5:"brand";s:6:"Desire";s:4:"type";s:6:"Desire";s:8:"subtotal";d:3;}}'),
(3, 'IT department', 'bryan', 23231, '2014-03-30 00:00:00', 'a:2:{s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:9:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:2:"10";s:5:"price";s:4:"3.00";s:4:"name";s:13:"mineral water";s:6:"serial";s:5:"test ";s:5:"asset";s:5:"mn2gy";s:5:"brand";s:6:"Desire";s:8:"subtotal";d:30;}s:32:"c20ad4d76fe97759aa27a0c99bff6710";a:9:{s:5:"rowid";s:32:"c20ad4d76fe97759aa27a0c99bff6710";s:2:"id";s:2:"12";s:3:"qty";s:2:"10";s:5:"price";s:4:"2.00";s:4:"name";s:6:"asdasd";s:6:"serial";s:6:"asdasd";s:5:"asset";s:0:"";s:5:"brand";s:6:"asdasd";s:8:"subtotal";d:20;}}'),
(4, 'IT department', 'Vince', 231321321, '2014-03-30 00:00:00', 'a:1:{s:32:"c20ad4d76fe97759aa27a0c99bff6710";a:9:{s:5:"rowid";s:32:"c20ad4d76fe97759aa27a0c99bff6710";s:2:"id";s:2:"12";s:3:"qty";s:3:"100";s:5:"price";s:4:"2.00";s:4:"name";s:6:"asdasd";s:6:"serial";s:6:"asdasd";s:5:"asset";s:0:"";s:5:"brand";s:6:"asdasd";s:8:"subtotal";d:200;}}'),
(5, 'IT department', 'bryan', 12314, '2014-03-30 00:00:00', 'a:1:{s:32:"c20ad4d76fe97759aa27a0c99bff6710";a:9:{s:5:"rowid";s:32:"c20ad4d76fe97759aa27a0c99bff6710";s:2:"id";s:2:"12";s:3:"qty";s:2:"10";s:5:"price";s:4:"2.00";s:4:"name";s:6:"asdasd";s:6:"serial";s:6:"asdasd";s:5:"asset";s:0:"";s:5:"brand";s:6:"asdasd";s:8:"subtotal";d:20;}}'),
(6, 'Accounting', 'vinz', 0, '2014-03-30 00:00:00', 'a:1:{s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:9:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:2:"12";s:5:"price";s:4:"3.00";s:4:"name";s:13:"mineral water";s:6:"serial";s:5:"test ";s:5:"asset";s:5:"mn2gy";s:5:"brand";s:6:"Desire";s:8:"subtotal";d:36;}}'),
(7, 'IT department', 'hello', 2147483647, '2014-03-30 00:00:00', 'a:1:{s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:9:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:1:"1";s:5:"price";s:4:"3.00";s:4:"name";s:13:"mineral water";s:6:"serial";s:5:"test ";s:5:"asset";s:5:"mn2gy";s:5:"brand";s:6:"Desire";s:8:"subtotal";d:3;}}'),
(8, 'Accounting', 'Vince', 12314, '2014-03-30 00:00:00', 'a:1:{s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:10:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:2:"12";s:5:"price";s:4:"3.00";s:4:"name";s:13:"mineral water";s:6:"serial";s:5:"test ";s:5:"asset";s:5:"mn2gy";s:5:"brand";s:6:"Desire";s:4:"type";s:6:"Desire";s:8:"subtotal";d:36;}}'),
(9, 'Accounting', 'this is a test', 2147483647, '2014-03-30 00:00:00', 'a:2:{s:32:"c20ad4d76fe97759aa27a0c99bff6710";a:9:{s:5:"rowid";s:32:"c20ad4d76fe97759aa27a0c99bff6710";s:2:"id";s:2:"12";s:3:"qty";s:2:"12";s:5:"price";s:4:"2.00";s:4:"name";s:6:"asdasd";s:6:"serial";s:6:"asdasd";s:5:"asset";s:0:"";s:5:"brand";s:6:"asdasd";s:8:"subtotal";d:24;}s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:9:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:2:"12";s:5:"price";s:4:"3.00";s:4:"name";s:13:"mineral water";s:6:"serial";s:5:"test ";s:5:"asset";s:5:"mn2gy";s:5:"brand";s:6:"Desire";s:8:"subtotal";d:36;}}'),
(10, 'IT department', 'bryan', 12314, '2014-03-31 00:00:00', 'a:1:{s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:9:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:1:"1";s:5:"price";s:4:"3.00";s:4:"name";s:13:"mineral water";s:6:"serial";s:5:"test ";s:5:"asset";s:5:"mn2gy";s:5:"brand";s:6:"Desire";s:8:"subtotal";d:3;}}'),
(11, 'IT department', 'eqe', 123942, '2014-03-31 00:00:00', 'a:1:{s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:9:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:2:"10";s:5:"price";s:4:"3.00";s:4:"name";s:13:"mineral water";s:6:"serial";s:5:"test ";s:5:"asset";s:5:"mn2gy";s:5:"brand";s:6:"Desire";s:8:"subtotal";d:30;}}'),
(12, 'Accounting', 'bryan', 11111, '2014-03-31 00:00:00', 'a:2:{s:32:"c20ad4d76fe97759aa27a0c99bff6710";a:9:{s:5:"rowid";s:32:"c20ad4d76fe97759aa27a0c99bff6710";s:2:"id";s:2:"12";s:3:"qty";s:2:"12";s:5:"price";s:4:"2.00";s:4:"name";s:6:"asdasd";s:6:"serial";s:6:"asdasd";s:5:"asset";s:0:"";s:5:"brand";s:6:"asdasd";s:8:"subtotal";d:24;}s:32:"c74d97b01eae257e44aa9d5bade97baf";a:9:{s:5:"rowid";s:32:"c74d97b01eae257e44aa9d5bade97baf";s:2:"id";s:2:"16";s:3:"qty";s:2:"12";s:5:"price";s:5:"21.00";s:4:"name";s:9:"red fanty";s:6:"serial";s:0:"";s:5:"asset";s:0:"";s:5:"brand";s:5:"fanty";s:8:"subtotal";d:252;}}'),
(13, 'Accounting', 'Vince', 123942, '2014-03-31 00:00:00', 'a:1:{s:32:"c74d97b01eae257e44aa9d5bade97baf";a:9:{s:5:"rowid";s:32:"c74d97b01eae257e44aa9d5bade97baf";s:2:"id";s:2:"16";s:3:"qty";s:2:"12";s:5:"price";s:5:"21.00";s:4:"name";s:9:"red fanty";s:6:"serial";s:0:"";s:5:"asset";s:0:"";s:5:"brand";s:5:"fanty";s:8:"subtotal";d:252;}}'),
(14, 'Accounting', 'ahahaha', 123942, '2014-03-31 00:00:00', 'a:1:{s:32:"c74d97b01eae257e44aa9d5bade97baf";a:9:{s:5:"rowid";s:32:"c74d97b01eae257e44aa9d5bade97baf";s:2:"id";s:2:"16";s:3:"qty";s:2:"12";s:5:"price";s:5:"21.00";s:4:"name";s:9:"red fanty";s:6:"serial";s:0:"";s:5:"asset";s:0:"";s:5:"brand";s:5:"fanty";s:8:"subtotal";d:252;}}'),
(15, 'Accounting', 'Vince2', 12314, '2014-03-31 00:00:00', 'a:1:{s:32:"c74d97b01eae257e44aa9d5bade97baf";a:9:{s:5:"rowid";s:32:"c74d97b01eae257e44aa9d5bade97baf";s:2:"id";s:2:"16";s:3:"qty";s:2:"12";s:5:"price";s:5:"21.00";s:4:"name";s:9:"red fanty";s:6:"serial";s:0:"";s:5:"asset";s:0:"";s:5:"brand";s:5:"fanty";s:8:"subtotal";d:252;}}'),
(16, 'IT department', 'ahahaha', 123942, '2014-03-31 11:34:30', 'a:1:{s:32:"6f4922f45568161a8cdf4ad2299f6d23";a:9:{s:5:"rowid";s:32:"6f4922f45568161a8cdf4ad2299f6d23";s:2:"id";s:2:"18";s:3:"qty";s:2:"12";s:5:"price";s:5:"21.00";s:4:"name";s:1:"1";s:6:"serial";s:0:"";s:5:"asset";s:0:"";s:5:"brand";s:1:"1";s:8:"subtotal";d:252;}}');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `last_update`) VALUES
(1, 'IT department', '2014-03-05 10:43:32'),
(3, 'Accounting', '2014-03-10 02:40:52'),
(4, 'Leasing', '2014-03-10 02:41:25'),
(5, 'Snack Bar', '2014-03-22 10:42:39'),
(6, 'Again ', '2014-03-10 05:10:25'),
(7, 'test', '2014-03-22 06:52:03');

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
  `item_unit` varchar(255) NOT NULL DEFAULT 'None',
  `item_qty` int(11) NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_serial` varchar(255) NOT NULL,
  `item_status` enum('Not Available','Available') NOT NULL DEFAULT 'Available',
  `item_asset` varchar(255) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=775342 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `supplier_id`, `department_id`, `item_brand`, `item_name`, `item_type`, `item_unit`, `item_qty`, `item_price`, `item_serial`, `item_status`, `item_asset`, `date_add`) VALUES
(1, 1, 1, 'Desire', 'low back office chair', 'Fixed', '0', 84, 6.00, 'sjt27', 'Available', 'djh5', '2014-04-07 02:31:18'),
(2, 1, 2, 'Thinking Tools', 'visitor chair	', 'Fixed', 'none', 73, 3.00, 'YC128', 'Available', 'lpjh8', '2014-04-06 23:16:18'),
(3, 1, 1, 'Desire', 'mineral water', 'Consumable', 'container', 411, 3.00, 'test ', 'Available', 'mn2gy', '2014-04-06 23:24:35'),
(4, 2, 3, 'Copyland', 'meeting table', 'Fixed', 'none', 136, 200.00, 'ykxd2', 'Available', 'b8dh5', '2014-04-07 02:07:15'),
(5, 1, 2, 'Coca Cola', 'real leaf lemon', 'Consumable', 'cs', 74, 23.00, '9999', 'Available', 'svz8dw', '2014-04-06 23:16:18'),
(6, 9, 4, 'ATX 9000', 'wenge office desk', 'Fixed', '0', 136, 43.00, 'uashk23', 'Available', '1ds7h', '2014-04-07 02:10:18'),
(7, 1, 1, 'Desire', 'chair', 'Fixed', 'none', 99, 6.00, 'sdlkas23', 'Available', 'pj6sd', '2014-04-07 01:33:43'),
(9, 9, 2, 'Coca Cola', 'last', 'Consumable', 'last', 115, 23.00, '654', 'Available', '1sgsvh', '2014-04-06 23:16:18'),
(10, 2, 3, 'Thinking Tools	', 'cable', 'Fixed', 'none', 229, 4.00, 'sd123x', 'Available', 'kg3ps', '2014-04-07 01:29:26'),
(13, 2, 1, 'ATX 9001', 'refrigerator', 'Fixed', '0', 99, 12.00, '239482kfjdh2gs2j', 'Available', 'adasda', '2014-04-07 01:33:43'),
(14, 10, 3, 'SONY', 'LAPTOP', 'Fixed', '', 69, 200.00, '1239482245', 'Available', 'LAP29442942', '2014-04-07 01:33:43'),
(21, 2, 1, 'BondPaper', 'Bond Paper', 'Consumable', 'Bundle', 199, 120.00, '', 'Available', '', '2014-04-06 23:16:18'),
(22, 1, 0, 'test', 'test1231241354', 'Consumable', 'dasdas', 52, 2.00, '', 'Available', '', '2014-04-06 23:16:18'),
(24, 9, 1, 'tet', 'test', 'Fixed', '', 49, 2.00, '23', 'Available', '34ds', '2014-04-07 01:33:43'),
(25, 1, 1, 'eqweqweqws22s', '23', 'Consumable', '32', 345, 2.00, '', 'Available', '', '2014-04-07 01:46:23'),
(26, 1, 1, 'recieved', 'dasd', 'Fixed', '', 49, 2.00, 'sad2', 'Available', 'sdaw2', '2014-04-07 01:33:43'),
(6115, 1, 1, 'Desire', 'chair', 'Fixed', 'None', 0, 6.00, 'sample', 'Available', 'sample', '2014-04-07 03:03:38'),
(365341, 1, 1, 'Desire', 'chair', 'Fixed', 'None', 49, 6.00, '34342', 'Available', '423', '2014-04-07 01:33:43'),
(467534, 1, 1, 'Desire', 'low back office chair', 'Fixed', 'None', 0, 6.00, 'ambot', 'Available', 'ambot', '2014-04-07 01:50:19'),
(653416, 1, 1, 'Desire', 'low back office chair', 'Fixed', 'None', 49, 6.00, '113', 'Available', '313312', '2014-04-06 23:16:18'),
(753416, 1, 1, 'Desire', 'low back office chair', 'Fixed', '', 49, 6.00, '1231', 'Available', '132131', '2014-04-06 23:16:18'),
(753417, 1, 1, 'Desire', 'low back office chair', 'Fixed', 'None', 49, 6.00, 'weqwe', 'Available', 'qeqewq', '2014-04-07 01:33:43'),
(775341, 1, 1, 'Desire', 'chair', 'Fixed', 'None', 0, 6.00, '12313', 'Available', '11313', '2014-04-07 01:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `logger`
--

CREATE TABLE IF NOT EXISTS `logger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_type` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `logger`
--

INSERT INTO `logger` (`id`, `log_type`, `qty`, `itemid`, `date_add`) VALUES
(1, 'Consumable', 1, 15, '0000-00-00 00:00:00'),
(2, 'Consumable', 2, 20, '2014-03-30 18:47:05'),
(3, 'Consumable', 150, 21, '2014-03-31 07:15:21'),
(4, 'Consumable', 3, 22, '2014-04-03 12:48:46'),
(5, 'Consumable', 3, 23, '2014-04-03 12:50:14'),
(6, 'Fixed', 1, 24, '2014-04-03 13:41:59'),
(7, 'Consumable', 3, 25, '2014-04-03 14:58:53'),
(8, 'Fixed', 1, 26, '2014-04-03 15:25:10'),
(9, 'Fixed', 1, 1, '2014-04-06 14:11:22'),
(10, 'Fixed', 1, 1, '2014-04-06 14:15:47'),
(11, 'Fixed', 1, 1, '2014-04-06 14:15:47'),
(12, 'Fixed', 1, 1, '2014-04-06 14:33:14'),
(13, 'Consumable', 21, 3, '2014-04-06 15:09:39'),
(14, 'Consumable', 21, 3, '2014-04-06 15:12:38'),
(15, 'Consumable', 1, 25, '2014-04-06 15:13:40'),
(16, 'Consumable', 1, 3, '2014-04-06 15:14:31'),
(17, 'Consumable', 1, 3, '2014-04-06 15:15:18'),
(18, 'Consumable', 1, 25, '2014-04-06 15:15:18'),
(19, 'Consumable', 1, 3, '2014-04-06 15:16:18'),
(20, 'Consumable', 2, 25, '2014-04-06 15:16:18'),
(21, 'Consumable', 1, 3, '2014-04-06 15:18:58'),
(22, 'Consumable', 2, 25, '2014-04-06 15:18:58'),
(23, 'Consumable', 1, 3, '2014-04-06 15:19:28'),
(24, 'Consumable', 2, 25, '2014-04-06 15:19:28'),
(25, 'Consumable', 21, 3, '2014-04-06 15:20:07'),
(26, 'Consumable', 42, 3, '2014-04-06 15:22:10'),
(27, 'Consumable', 42, 3, '2014-04-06 15:22:27'),
(28, 'Consumable', 42, 3, '2014-04-06 15:22:31'),
(29, 'Consumable', 42, 3, '2014-04-06 15:22:35'),
(30, 'Consumable', 42, 3, '2014-04-06 15:22:42'),
(31, 'Consumable', 42, 3, '2014-04-06 15:24:35'),
(32, 'Consumable', 1, 25, '2014-04-06 17:42:45'),
(57, 'Fixed', 1, 1, '2014-04-06 17:48:49'),
(58, 'Fixed', 1, 1, '2014-04-06 17:50:19'),
(59, 'Fixed', 1, 1, '2014-04-06 17:51:05');

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
(1, 'rrongie', '5f4dcc3b5aa765d61d8327deb882cf99', 'wrong', 'G', 'admin'),
(2, 'staff', '5f4dcc3b5aa765d61d8327deb882cf99', 'katz', 'poy', 'staff'),
(8, 'katz123', '5f4dcc3b5aa765d61d8327deb882cf99', 'katz', 'katz', 'staff'),
(9, 'test123', '5f4dcc3b5aa765d61d8327deb882cf99', 'test', 'test', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_total` int(11) NOT NULL,
  `purchase_status` enum('Pending','Purchased') NOT NULL,
  `date_order` datetime NOT NULL,
  `cart_data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `dept_id`, `supplier_id`, `purchase_total`, `purchase_status`, `date_order`, `cart_data`) VALUES
(1, 1, 1, 288, 'Purchased', '2014-03-24 17:04:26', 'a:2:{s:32:"c4ca4238a0b923820dcc509a6f75849b";a:8:{s:5:"rowid";s:32:"c4ca4238a0b923820dcc509a6f75849b";s:2:"id";s:1:"1";s:3:"qty";s:2:"32";s:5:"price";s:4:"6.00";s:4:"name";s:21:"low back office chair";s:5:"brand";s:6:"Desire";s:4:"type";s:5:"Fixed";s:8:"subtotal";d:192;}s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:8:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:2:"32";s:5:"price";s:4:"3.00";s:4:"name";s:13:"mineral water";s:5:"brand";s:6:"Desire";s:4:"type";s:10:"Consumable";s:8:"subtotal";d:96;}}'),
(2, 1, 1, 12, 'Pending', '2014-04-03 21:55:13', 'a:1:{s:32:"c4ca4238a0b923820dcc509a6f75849b";a:9:{s:5:"rowid";s:32:"c4ca4238a0b923820dcc509a6f75849b";s:2:"id";s:1:"1";s:3:"qty";s:1:"2";s:4:"unit";s:1:"3";s:5:"price";s:4:"6.00";s:4:"name";s:21:"low back office chair";s:5:"brand";s:6:"Desire";s:4:"type";s:5:"Fixed";s:8:"subtotal";d:12;}}'),
(3, 1, 1, 9, 'Pending', '2014-04-03 22:14:22', 'a:1:{s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:9:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:1:"3";s:4:"unit";s:9:"container";s:5:"price";s:4:"3.00";s:4:"name";s:13:"mineral water";s:5:"brand";s:6:"Desire";s:4:"type";s:10:"Consumable";s:8:"subtotal";d:9;}}'),
(4, 4, 1, 6, 'Pending', '2014-04-06 15:41:46', 'a:1:{s:32:"c4ca4238a0b923820dcc509a6f75849b";a:10:{s:5:"rowid";s:32:"c4ca4238a0b923820dcc509a6f75849b";s:2:"id";s:1:"1";s:3:"qty";s:1:"1";s:5:"price";s:4:"6.00";s:4:"name";s:21:"low back office chair";s:6:"serial";s:5:"sjt27";s:5:"asset";s:4:"djh5";s:5:"brand";s:6:"Desire";s:4:"type";s:6:"Desire";s:8:"subtotal";d:6;}}'),
(5, 1, 1, 12, 'Pending', '2014-04-06 17:12:16', 'a:1:{s:32:"c4ca4238a0b923820dcc509a6f75849b";a:9:{s:5:"rowid";s:32:"c4ca4238a0b923820dcc509a6f75849b";s:2:"id";s:1:"1";s:3:"qty";s:1:"2";s:4:"unit";s:1:"0";s:5:"price";s:4:"6.00";s:4:"name";s:21:"low back office chair";s:5:"brand";s:6:"Desire";s:4:"type";s:5:"Fixed";s:8:"subtotal";d:12;}}'),
(6, 1, 1, 0, 'Pending', '2014-04-06 17:15:00', 'a:0:{}'),
(7, 0, 0, 0, 'Pending', '2014-04-06 22:44:10', 'a:0:{}'),
(8, 0, 0, 0, 'Pending', '2014-04-06 22:44:19', 'a:0:{}'),
(9, 0, 0, 0, 'Pending', '2014-04-06 22:44:45', 'a:0:{}'),
(10, 0, 0, 0, 'Pending', '2014-04-06 22:44:57', 'a:0:{}');

-- --------------------------------------------------------

--
-- Table structure for table `receivables`
--

CREATE TABLE IF NOT EXISTS `receivables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `supplier` varchar(40) NOT NULL,
  `item_name` varchar(40) NOT NULL,
  `quantity` int(11) NOT NULL,
  `units` int(11) NOT NULL,
  `requestor` varchar(100) NOT NULL,
  `net_cost` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `receivables`
--

INSERT INTO `receivables` (`id`, `date`, `supplier`, `item_name`, `quantity`, `units`, `requestor`, `net_cost`) VALUES
(1, '2014-03-24', 'Test Company', 'low back office chair', 32, 6, 'IT department', 192),
(2, '2014-03-24', 'Test Company', 'mineral water', 32, 3, 'IT department', 96),
(3, '2014-03-24', 'Test Company', 'low back office chair', 32, 6, 'IT department', 192),
(4, '2014-03-24', 'Test Company', 'mineral water', 32, 3, 'IT department', 96),
(5, '2014-03-24', 'Test Company', 'low back office chair', 32, 6, 'IT department', 192),
(6, '2014-03-24', 'Test Company', 'mineral water', 32, 3, 'IT department', 96),
(7, '2014-03-24', 'Test Company', 'low back office chair', 32, 6, 'IT department', 192),
(8, '2014-03-24', 'Test Company', 'mineral water', 32, 3, 'IT department', 96);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_fname` varchar(255) NOT NULL,
  `supplier_lname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `company` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_fname`, `supplier_lname`, `email`, `address`, `mobile`, `company`) VALUES
(1, 'katz', 'vinz', 'test@email.com', 'talamban Cebu City', '0999999999', 'Test Company'),
(2, 'vinz', 'Oblad', 'test@email.com', 'Lahug Cebu City', '09888888888', 'ABC Company'),
(9, 'Rongie', 'Andrade', 'test@email.com', 'Bacyan Cebu City', '09353433738', 'XYZ Company'),
(10, 'Mariz', 'Mariz', 'test@email.com', 'Talamban Cebu City', '0999999999', 'company name'),
(11, 'Bry', 'secret', 'test@email.com', 'Cebu City', '09297982124', 'company name'),
(14, 'vinx', 'katsss', 'test@email.com', 'talamban', '0945435345', 'company name');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
