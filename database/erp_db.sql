-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2021 at 07:14 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `district` varchar(50) NOT NULL,
  `active` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `title`, `first_name`, `last_name`, `contact_no`, `district`, `active`) VALUES
(1, 'Dr', 'SHANGAVI', 'SIVARAJAH', '0758845009', '1', 1),
(2, 'Miss', 'Nila', 'Anthony ', '678905678', '5', 1),
(3, 'Mrs', 'Raja', 'Kamala', '987654', '7', 1),
(4, 'Mr', 'Jhone', 'Leo', '1234567', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `district` varchar(50) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district`, `active`, `id`) VALUES
('Ampara', 'yes', 1),
('Anuradhapura', 'yes', 2),
('Badulla', 'yes', 3),
('Batticaloa', 'yes', 4),
('Colombo', 'yes', 5),
('Galle', 'yes', 6),
('Gampaha', 'yes', 7),
('Hambantota', 'yes', 8),
('Jaffna', 'yes', 9),
('Kalutara', 'yes', 10),
('Kalutara', 'yes', 11),
('Kandy', 'yes', 12),
('Kegalle', 'yes', 13),
('Kilinochchi', 'yes', 14),
('Kurunegala', 'yes', 15),
('Mannar', 'yes', 16),
('Matale', 'yes', 17),
('Matara', 'yes', 18),
('Moneragala', 'yes', 19),
('Mullaitivu', 'yes', 20),
('Nuwara Eliya', 'yes', 21),
('Polonnaruwa', 'yes', 22),
('Puttalam', 'yes', 23),
('Rathnapura', 'yes', 24),
('Vavuniya', 'yes', 25);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `customer` varchar(10) NOT NULL,
  `item_count` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `date`, `time`, `invoice_no`, `customer`, `item_count`, `amount`) VALUES
(1, '2021-04-01', '07:00:14', '1001', '1', '2', '7500'),
(2, '2021-04-01', '14:23:12', '1002', '2', '1', '75000'),
(3, '2021-05-02', '10:12:55', '1003', '3', '1', '117000'),
(4, '2021-04-04', '15:44:22', '1004', '1', '2', '21000'),
(5, '2021-04-06', '13:15:52', '1005', '3', '4', '15000'),
(6, '2021-04-07', '14:22:36', '1006', '4', '10', '117500'),
(7, '2021-04-07', '16:11:48', '1006', '2', '32', '24016'),
(8, '2021-04-09', '12:11:55', '1007', '2', '2', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_master`
--

DROP TABLE IF EXISTS `invoice_master`;
CREATE TABLE IF NOT EXISTS `invoice_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(50) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_master`
--

INSERT INTO `invoice_master` (`id`, `invoice_no`, `item_id`, `quantity`, `unit_price`, `amount`) VALUES
(1, '1001', '1', '1', '5000', '5000'),
(2, '1001', '4', '1', '2500', '2500'),
(3, '1002', '2', '1', '75000', '75000'),
(4, '1003', '5', '2', '58500', '117000'),
(5, '1004', '3', '1', '18500', '18500'),
(6, '1004', '4', '1', '2500', '2500'),
(7, '1004', '1', '2', '5000', '10000'),
(8, '1004', '4', '2', '2500', '5000'),
(9, '1005', '3', '5', '18500', '92500'),
(10, '1005', '1', '5', '5000', '25000'),
(11, '1006', '6', '32', '750.50', '24016'),
(12, '1007', '2', '2', '75000', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(20) NOT NULL,
  `item_category` varchar(20) NOT NULL,
  `item_subcategory` varchar(20) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `unit_price` varchar(20) NOT NULL,
  `active` int(100) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_code`, `item_category`, `item_subcategory`, `item_name`, `quantity`, `unit_price`, `active`) VALUES
(1, 'KM95', '1', '1', 'HP VivoBook', '10', '100000001', 1),
(2, 'K001', '3', '5', 'Headphones ', '100', '1000', 1),
(3, 'I001', '4', '3', 'Sample', '5', '500', 1),
(4, 'D001', '2', '2', 'Dell', '4', '100000', 1),
(5, 'P001', '1', '3', 'sampleLesser ', '10', '500', 1),
(6, 'A001', '2', '4', 'Acer VivoBook', '10', '100000001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

DROP TABLE IF EXISTS `item_category`;
CREATE TABLE IF NOT EXISTS `item_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `category`) VALUES
(1, 'Printers'),
(2, 'Laptops'),
(3, 'Gadgets'),
(4, 'Ink bottels'),
(5, 'Cartridges');

-- --------------------------------------------------------

--
-- Table structure for table `item_subcategory`
--

DROP TABLE IF EXISTS `item_subcategory`;
CREATE TABLE IF NOT EXISTS `item_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_subcategory`
--

INSERT INTO `item_subcategory` (`id`, `sub_category`) VALUES
(1, 'HP'),
(2, 'Dell'),
(3, 'Lenovo'),
(4, 'Acer'),
(5, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `nic` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `userimg` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `joindate` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tocken` varchar(100) NOT NULL,
  `code` int(100) NOT NULL,
  `active` varchar(100) NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `fullname`, `dob`, `nic`, `address`, `gender`, `userimg`, `usertype`, `joindate`, `username`, `phone`, `email`, `password`, `tocken`, `code`, `active`) VALUES
(1, 'shangavi', '2021-09-04', '6576576', 'Newkali kovil road ,Arayampathy-01 batticaloa,', 0, '', 'Admin', '2021-09-04', 'shangavi', '0758845009', 'shangavis95@gmail.com', '6ebf4287fd922950f323f3663e389c0b', '5eb13a55069e447a82551c4b566d6910', 1631189418, '1'),
(2, 'Shangavi S', '2021-09-03', '42435', 'Newkali kovil road ,Arayampathy-01 batticaloa,', 1, '', 'Admin', '2021-09-03', 'raja', '5657', 's@gmail.com', 'ee772ec86b5fcf082cc62f0ee0422f3e', 'f6d9a2a4a4c097d1ec344cf9e1ed29e5', 1630727773, '0'),
(3, 'admin', '2021-09-04', '3657365', 'colombo', 1, '', 'Admin', '2021-09-04', 'admin', '546356565', 'admin@gmail.com', '123456895829cf111785f33f24279f2dd74adb', '7583c660e28e463b4d4bdfa453e5e136', 1630730164, '0'),
(4, 'Raja', '2021-10-12', '42435', 'colombo', 1, '', 'Instructor', '2021-10-12', 'instructor', '123456', 'instructor@gmail.com', '895829cf111785f33f24279f2dd74adb', '344973248312d12ed33830402a7c3f4c', 1631784244, '0'),
(5, 'TKM Theesan', '1996-05-26', '961472385v', 'Colombo', 0, '', 'Instructor', '2021-10-12', 'Theesan', '0767078650', 'tkmtheesan1996@gmail.com', '389fc83406e67ff12224ae044a86c6e1', 'ce10f0cd964a98c270182e26196c1bc2', 1631528209, '0'),
(6, 'testing', '2021-10-12', '09876', 'colombo', 1, '', 'BranchHead', '2021-10-12', 'instructor', '12345', 'test@gmail', '895829cf111785f33f24279f2dd74adb', '7848d7184ee29e61ca61761b2cd6fe37', 1631785598, '0'),
(7, 'admin', '2021-10-12', '6576576', 'Newkali kovil road ,Arayampathy-01 batticaloa,', 1, '', 'Admin', '2021-10-12', 'admin', '07588', 'admin@gmail.com', 'ee772ec86b5fcf082cc62f0ee0422f3e', '68308b515aa98e6fb618362b6fa33e66', 1632724847, '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
