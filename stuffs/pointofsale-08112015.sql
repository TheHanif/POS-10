-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2015 at 03:27 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `inv_name`, `inv_cost`, `inv_price`, `inv_quantity`, `inv_barcode`, `inv_ts`) VALUES
(1, 'Pepsi Cane 250ml', '22', '26', 110, 120210245, '2015-08-03 12:57:23'),
(2, 'Pepsi Bottle 250ml', '18', '25', 100, 120210246, '2015-08-10 13:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `p_supplier` int(11) NOT NULL,
  `p_cost` decimal(10,0) NOT NULL,
  `p_price` decimal(10,0) NOT NULL,
  `p_gst` decimal(10,0) NOT NULL,
  `p_vat` decimal(10,0) NOT NULL,
  `p_volumetype` varchar(32) NOT NULL,
  `p_volumevalue` varchar(32) NOT NULL,
  `p_skucrate` int(11) NOT NULL,
  `p_skucarton` int(11) NOT NULL,
  `p_skubag` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_supplier`, `p_cost`, `p_price`, `p_gst`, `p_vat`, `p_volumetype`, `p_volumevalue`, `p_skucrate`, `p_skucarton`, `p_skubag`) VALUES
(1, 'Pepsi Bottle 250ml', 2, '18', '25', '10', '123', 'ml', 'ml', 24, 1, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

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
(28, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 13:12:19'),
(29, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 13:19:37'),
(30, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-08 13:23:07'),
(31, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 04:09:10'),
(32, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-10 04:09:28'),
(33, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 04:21:33'),
(34, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 05:10:48'),
(35, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 05:17:33'),
(36, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 05:17:41'),
(37, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 05:20:12'),
(38, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 05:20:15'),
(39, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 05:20:20'),
(40, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 05:20:27'),
(41, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 05:20:51'),
(42, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-10 05:22:27'),
(43, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 05:23:41'),
(44, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-10 05:23:49');

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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

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
(27, 28, 1, 1, 100),
(28, 29, 1, 3, 100),
(29, 29, 1, 10, 100),
(30, 29, 1, 1, 100),
(31, 29, 1, 5, 100),
(32, 30, 1, 3, 100),
(33, 30, 1, 5, 100),
(34, 30, 1, 3, 100),
(35, 33, 1, 3, 100),
(36, 33, 1, 2, 100),
(37, 33, 1, 1, 100),
(38, 34, 1, 1, 100),
(39, 34, 1, 10, 100),
(40, 34, 1, 3, 100),
(41, 34, 1, 4, 100),
(42, 35, 1, 1, 100),
(43, 35, 1, 10, 100),
(44, 35, 1, 3, 100),
(45, 35, 1, 9, 100),
(46, 36, 1, 1, 100),
(47, 36, 1, 10, 100),
(48, 36, 1, 3, 100),
(49, 36, 1, 9, 100),
(50, 37, 1, 1, 100),
(51, 37, 1, 10, 100),
(52, 37, 1, 3, 100),
(53, 37, 1, 9, 100),
(54, 38, 1, 1, 100),
(55, 38, 1, 10, 100),
(56, 38, 1, 3, 100),
(57, 38, 1, 9, 100),
(58, 39, 1, 1, 100),
(59, 39, 1, 10, 100),
(60, 39, 1, 3, 100),
(61, 39, 1, 9, 100),
(62, 40, 1, 1, 100),
(63, 40, 1, 10, 100),
(64, 40, 1, 3, 100),
(65, 40, 1, 9, 100),
(66, 41, 1, 1, 100),
(67, 41, 1, 10, 100),
(68, 41, 1, 3, 100),
(69, 41, 1, 9, 100),
(70, 42, 1, 1, 100),
(71, 42, 1, 10, 100),
(72, 42, 1, 3, 100),
(73, 42, 1, 9, 100),
(74, 43, 1, 1, 100),
(75, 43, 1, 10, 100),
(76, 43, 1, 3, 100),
(77, 43, 1, 9, 100),
(78, 44, 1, 1, 100),
(79, 44, 1, 10, 100),
(80, 44, 1, 3, 100),
(81, 44, 1, 9, 100);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(64) NOT NULL,
  `sup_email` varchar(64) NOT NULL,
  `sup_phone` varchar(64) NOT NULL,
  `sup_address` mediumtext NOT NULL,
  `sup_city` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `sup_email`, `sup_phone`, `sup_address`, `sup_city`) VALUES
(1, 'Waqar Zaka', 'waqar_zaka@gmail.com', '0300-1234567', 'Karachi, Pakistan', 'Karachi'),
(2, 'Aamir Liaqat', 'aamir_liaqat@hotmail.com', '0300-7654321', 'Karachi, Pakistan', 'Karachi');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `login`, `password`, `mobile`, `phone`, `address`, `city`, `country`, `nic`, `dob`, `photo`, `designation`, `capabilities`) VALUES
(1, 'Faizan', 'Siddiqui', 'faizan@test.com', 'faizan', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-03', '', 'depart_incharge', '["sales_page","view_inventory"]'),
(3, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'faizi', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-02', '', 'depart_incharge', '["sales_page","add_inventory","add_user"]'),
(5, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'faiz', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-04', '', 'depart_incharge', '["sales_page","add_inventory"]'),
(6, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'fai', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-01', '', 'sales_person', '["sales_page","view_inventory","add_user"]'),
(7, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'fa', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-07', '', 'depart_incharge', '["sales_page","view_inventory","add_user"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

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
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

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
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `sale_product`
--
ALTER TABLE `sale_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
