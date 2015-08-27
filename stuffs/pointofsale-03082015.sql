-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2015 at 04:45 PM
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
(1, 'Pepsi Cane 250ml', '22', '25', 100, 120210245, '2015-08-03 12:57:23');

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
(1, 'Faizan', 'Siddiqui', 'faizan@test.com', 'faizan', '744cf14ef3a45a73677f68867e5ac40c', '', '', '', '', '', '', '', '', '', ''),
(3, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'faizi', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-02', '', 'depart_incharge', '["sales_page","add_inventory","add_user"]'),
(4, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'faiz', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-13', '', 'manager', '["sales_page","view_inventory","add_inventory"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inv_id`);

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
