-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2015 at 12:28 PM
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
  `inv_pid` int(11) NOT NULL,
  `inv_cost` decimal(10,0) NOT NULL,
  `inv_price` decimal(10,0) NOT NULL,
  `inv_quantity` int(11) NOT NULL,
  `inv_barcode` int(11) NOT NULL,
  `inv_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `inv_name`, `inv_pid`, `inv_cost`, `inv_price`, `inv_quantity`, `inv_barcode`, `inv_ts`) VALUES
(4, '', 3, '25', '30', 700, 159753825, '2015-08-15 10:08:07'),
(5, 'Pepsi Bottle 250ml', 1, '20', '40', 1000, 987654321, '2015-08-15 10:08:41');

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
  `p_barcode` tinytext NOT NULL,
  `p_volumetype` varchar(32) NOT NULL,
  `p_volumevalue` varchar(32) NOT NULL,
  `p_skucrate` int(11) NOT NULL,
  `p_skucarton` int(11) NOT NULL,
  `p_skubag` int(11) NOT NULL,
  `p_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_supplier`, `p_cost`, `p_price`, `p_gst`, `p_vat`, `p_barcode`, `p_volumetype`, `p_volumevalue`, `p_skucrate`, `p_skucarton`, `p_skubag`, `p_datetime`) VALUES
(1, 'Pepsi Bottle 250ml', 2, '20', '30', '10', '123', '987654321', 'piece', 'ml', 24, 1, 2, '2015-08-12 05:00:29'),
(2, 'Pepsi Bottle 500ml', 1, '25', '30', '10', '123', '123456789123', 'liter', 'Peace(s)', 12, 144, 864, '2015-08-12 06:00:56'),
(3, 'Pepsi Bottle 1Ltr', 2, '45', '55', '10', '123', '159753825', 'piece', 'Peace(s)', 6, 144, 864, '2015-08-12 08:05:49');

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
  `product_price` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_product`
--

INSERT INTO `sale_product` (`id`, `sale_id`, `product_id`, `product_quantity`, `product_price`, `datetime`) VALUES
(1, 22, 1, 2, 100, '2015-08-12 05:21:07'),
(2, 22, 1, 3, 100, '2015-08-12 05:21:07'),
(3, 22, 1, 2, 100, '2015-08-12 05:21:07'),
(4, 22, 1, 5, 100, '2015-08-12 05:21:07'),
(5, 23, 1, 5, 100, '2015-08-12 05:21:07'),
(6, 23, 1, 6, 100, '2015-08-12 05:21:07'),
(7, 23, 1, 7, 100, '2015-08-12 05:21:07'),
(8, 23, 1, 8, 100, '2015-08-12 05:21:07'),
(9, 24, 1, 3, 100, '2015-08-12 05:21:07'),
(10, 24, 1, 2, 100, '2015-08-12 05:21:07'),
(11, 24, 1, 5, 100, '2015-08-12 05:21:07'),
(12, 25, 1, 3, 100, '2015-08-12 05:21:07'),
(13, 25, 1, 2, 100, '2015-08-12 05:21:07'),
(14, 25, 1, 5, 100, '2015-08-12 05:21:07'),
(15, 25, 1, 1, 100, '2015-08-12 05:21:07'),
(16, 26, 1, 3, 100, '2015-08-12 05:21:07'),
(17, 26, 1, 2, 100, '2015-08-12 05:21:07'),
(18, 26, 1, 2, 100, '2015-08-12 05:21:07'),
(19, 26, 1, 1, 100, '2015-08-12 05:21:07'),
(20, 27, 1, 3, 100, '2015-08-12 05:21:07'),
(21, 27, 1, 2, 100, '2015-08-12 05:21:07'),
(22, 27, 1, 2, 100, '2015-08-12 05:21:07'),
(23, 27, 1, 1, 100, '2015-08-12 05:21:07'),
(24, 28, 1, 3, 100, '2015-08-12 05:21:07'),
(25, 28, 1, 2, 100, '2015-08-12 05:21:07'),
(26, 28, 1, 2, 100, '2015-08-12 05:21:07'),
(27, 28, 1, 1, 100, '2015-08-12 05:21:07'),
(28, 29, 1, 3, 100, '2015-08-12 05:21:07'),
(29, 29, 1, 10, 100, '2015-08-12 05:21:07'),
(30, 29, 1, 1, 100, '2015-08-12 05:21:07'),
(31, 29, 1, 5, 100, '2015-08-12 05:21:07'),
(32, 30, 1, 3, 100, '2015-08-12 05:21:07'),
(33, 30, 1, 5, 100, '2015-08-12 05:21:07'),
(34, 30, 1, 3, 100, '2015-08-12 05:21:07'),
(35, 33, 1, 3, 100, '2015-08-12 05:21:07'),
(36, 33, 1, 2, 100, '2015-08-12 05:21:07'),
(37, 33, 1, 1, 100, '2015-08-12 05:21:07'),
(38, 34, 1, 1, 100, '2015-08-12 05:21:07'),
(39, 34, 1, 10, 100, '2015-08-12 05:21:07'),
(40, 34, 1, 3, 100, '2015-08-12 05:21:07'),
(41, 34, 1, 4, 100, '2015-08-12 05:21:07'),
(42, 35, 1, 1, 100, '2015-08-12 05:21:07'),
(43, 35, 1, 10, 100, '2015-08-12 05:21:07'),
(44, 35, 1, 3, 100, '2015-08-12 05:21:07'),
(45, 35, 1, 9, 100, '2015-08-12 05:21:07'),
(46, 36, 1, 1, 100, '2015-08-12 05:21:07'),
(47, 36, 1, 10, 100, '2015-08-12 05:21:07'),
(48, 36, 1, 3, 100, '2015-08-12 05:21:07'),
(49, 36, 1, 9, 100, '2015-08-12 05:21:07'),
(50, 37, 1, 1, 100, '2015-08-12 05:21:07'),
(51, 37, 1, 10, 100, '2015-08-12 05:21:07'),
(52, 37, 1, 3, 100, '2015-08-12 05:21:07'),
(53, 37, 1, 9, 100, '2015-08-12 05:21:07'),
(54, 38, 1, 1, 100, '2015-08-12 05:21:07'),
(55, 38, 1, 10, 100, '2015-08-12 05:21:07'),
(56, 38, 1, 3, 100, '2015-08-12 05:21:07'),
(57, 38, 1, 9, 100, '2015-08-12 05:21:07'),
(58, 39, 1, 1, 100, '2015-08-12 05:21:07'),
(59, 39, 1, 10, 100, '2015-08-12 05:21:07'),
(60, 39, 1, 3, 100, '2015-08-12 05:21:07'),
(61, 39, 1, 9, 100, '2015-08-12 05:21:07'),
(62, 40, 1, 1, 100, '2015-08-12 05:21:07'),
(63, 40, 1, 10, 100, '2015-08-12 05:21:07'),
(64, 40, 1, 3, 100, '2015-08-12 05:21:07'),
(65, 40, 1, 9, 100, '2015-08-12 05:21:07'),
(66, 41, 1, 1, 100, '2015-08-12 05:21:07'),
(67, 41, 1, 10, 100, '2015-08-12 05:21:07'),
(68, 41, 1, 3, 100, '2015-08-12 05:21:07'),
(69, 41, 1, 9, 100, '2015-08-12 05:21:07'),
(70, 42, 1, 1, 100, '2015-08-12 05:21:07'),
(71, 42, 1, 10, 100, '2015-08-12 05:21:07'),
(72, 42, 1, 3, 100, '2015-08-12 05:21:07'),
(73, 42, 1, 9, 100, '2015-08-12 05:21:07'),
(74, 43, 1, 1, 100, '2015-08-12 05:21:07'),
(75, 43, 1, 10, 100, '2015-08-12 05:21:07'),
(76, 43, 1, 3, 100, '2015-08-12 05:21:07'),
(77, 43, 1, 9, 100, '2015-08-12 05:21:07'),
(78, 44, 1, 1, 100, '2015-08-12 05:21:07'),
(79, 44, 1, 10, 100, '2015-08-12 05:21:07'),
(80, 44, 1, 3, 100, '2015-08-12 05:21:07'),
(81, 44, 1, 9, 100, '2015-08-12 05:21:07');

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
  `sup_city` varchar(64) NOT NULL,
  `sup_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `sup_email`, `sup_phone`, `sup_address`, `sup_city`, `sup_datetime`) VALUES
(1, 'Waqar Zaka', 'waqar_zaka@gmail.com', '0300-1234567', 'Karachi, Pakistan', 'Karachi', '2015-08-12 05:22:10'),
(2, 'Aamir Liaqat', 'aamir_liaqat@hotmail.com', '0300-7654321', 'Karachi, Pakistan', 'Karachi', '2015-08-12 05:22:10');

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
  `capabilities` tinytext NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `login`, `password`, `mobile`, `phone`, `address`, `city`, `country`, `nic`, `dob`, `photo`, `designation`, `capabilities`, `datetime`) VALUES
(1, 'Faizan', 'Siddiqui', 'faizan@test.com', 'faizan', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-03', '', 'depart_incharge', '["sales_page","view_inventory"]', '2015-08-12 05:23:11'),
(3, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'faizi', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-02', '', 'depart_incharge', '["sales_page","add_inventory","add_user"]', '2015-08-12 05:23:11'),
(5, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'faiz', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-04', '', 'depart_incharge', '["sales_page","add_inventory"]', '2015-08-12 05:23:11'),
(6, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'fai', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-01', '', 'sales_person', '["sales_page","view_inventory","add_user"]', '2015-08-12 05:23:11'),
(7, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'fa', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-07', '', 'depart_incharge', '["sales_page","view_inventory","add_user"]', '2015-08-12 05:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE IF NOT EXISTS `warehouse` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `barcode` text NOT NULL,
  `skutype` varchar(32) NOT NULL,
  `skuvalue` varchar(32) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `product_id`, `cost`, `price`, `quantity`, `barcode`, `skutype`, `skuvalue`, `datetime`) VALUES
(1, 1, 20, 40, 1000, '987654321', 'ML', 'liter', '2015-08-12 11:07:31'),
(2, 3, 25, 30, 700, '159753825', '650', 'piece', '2015-08-12 11:12:02');

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
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
