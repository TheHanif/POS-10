-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2015 at 03:15 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pointofsale`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inv_id` int(11) NOT NULL,
  `inv_name` varchar(128) NOT NULL,
  `inv_cost` decimal(10,0) NOT NULL,
  `inv_price` decimal(10,0) NOT NULL,
  `inv_quantity` int(11) NOT NULL,
  `inv_barcode` int(11) NOT NULL,
  `inv_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `inv_name`, `inv_cost`, `inv_price`, `inv_quantity`, `inv_barcode`, `inv_ts`) VALUES
(1, 'Pepsi Cane 250ml', '22', '26', 100, 120210245, '2015-08-03 12:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shift_number` varchar(32) NOT NULL,
  `terminal_number` int(11) NOT NULL,
  `bill_number` varchar(128) NOT NULL,
  `payment` varchar(32) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `user_id`, `shift_number`, `terminal_number`, `bill_number`, `payment`, `datetime`) VALUES
(1, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:05:58'),
(2, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-08 09:06:10'),
(3, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:10:10'),
(4, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:10:48'),
(5, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:10:51'),
(6, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:10:52'),
(7, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:42:53'),
(8, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:42:53'),
(9, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:44:21'),
(10, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:44:21'),
(11, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:44:21'),
(12, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:44:21'),
(13, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:44:21'),
(14, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:47:24'),
(15, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:48:09'),
(16, 3, '9', 13, '', 'cash', '2015-08-08 09:53:52'),
(17, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 09:57:49'),
(18, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 10:05:56'),
(19, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-08 10:11:37'),
(20, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-08 10:14:01'),
(21, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-08 10:17:25'),
(22, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-08 10:21:24'),
(23, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 11:48:03'),
(24, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 12:59:19'),
(25, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 13:00:57'),
(26, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 13:08:51'),
(27, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 13:09:04'),
(28, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 13:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `sale_product`
--

CREATE TABLE IF NOT EXISTS `sale_product` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_product`
--

INSERT INTO `sale_product` (`id`, `sale_id`, `product_id`, `product_quantity`, `product_price`) VALUES
(1, 22, 1, 2, 100),
(2, 22, 1, 3, 100),
(3, 22, 1, 2, 100),
(4, 22, 1, 5, 100),
(5, 23, 1, 5, 100),
(6, 23, 1, 6, 100),
(7, 23, 1, 7, 100),
(8, 23, 1, 8, 100),
(9, 24, 1, 3, 100),
(10, 24, 1, 2, 100),
(11, 24, 1, 5, 100),
(12, 25, 1, 3, 100),
(13, 25, 1, 2, 100),
(14, 25, 1, 5, 100),
(15, 25, 1, 1, 100),
(16, 26, 1, 3, 100),
(17, 26, 1, 2, 100),
(18, 26, 1, 2, 100),
(19, 26, 1, 1, 100),
(20, 27, 1, 3, 100),
(21, 27, 1, 2, 100),
(22, 27, 1, 2, 100),
(23, 27, 1, 1, 100),
(24, 28, 1, 3, 100),
(25, 28, 1, 2, 100),
(26, 28, 1, 2, 100),
(27, 28, 1, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(32) NOT NULL,
  `country` varchar(32) NOT NULL,
  `nic` tinytext NOT NULL,
  `dob` varchar(32) NOT NULL,
  `photo` tinytext NOT NULL,
  `designation` varchar(32) NOT NULL,
  `capabilities` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `login`, `password`, `mobile`, `phone`, `address`, `city`, `country`, `nic`, `dob`, `photo`, `designation`, `capabilities`) VALUES
(1, 'Faizan', 'Siddiqui', 'faizan@test.com', 'faizan', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-03', '', 'depart_incharge', '["sales_page","view_inventory"]'),
(3, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'faizi', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-02', '', 'depart_incharge', '["sales_page","add_inventory","add_user"]'),
(4, 'Faizan1', 'Siddiqui', 'faizan@imagiacian.com', 'faiz', '3675e1326cc35bf3d2518ebc21eb4ead', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-13', '', 'manager', '["sales_page","add_inventory"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_product`
--
ALTER TABLE `sale_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sale_product`
--
ALTER TABLE `sale_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
