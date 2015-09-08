-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2015 at 03:19 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pointofsale1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_assets`
--

CREATE TABLE IF NOT EXISTS `accounts_assets` (
  `assets_id` int(11) NOT NULL,
  `assets_type` varchar(128) NOT NULL,
  `assets_amount` varchar(32) NOT NULL,
  `assets_payment_mode` varchar(32) NOT NULL,
  `assets_bank` int(11) NOT NULL,
  `assets_due_date` varchar(32) NOT NULL,
  `assets_detail` text NOT NULL,
  `assets_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_assets`
--

INSERT INTO `accounts_assets` (`assets_id`, `assets_type`, `assets_amount`, `assets_payment_mode`, `assets_bank`, `assets_due_date`, `assets_detail`, `assets_timestamp`) VALUES
(0, 'building', '5000', 'cheque', 2, '2015-08-31', 'Taj Mahal Purchase for Gift...', '2015-08-29 05:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_capital`
--

CREATE TABLE IF NOT EXISTS `accounts_capital` (
  `capital_id` int(11) NOT NULL,
  `capital_name` varchar(128) NOT NULL,
  `capital_amount` varchar(64) NOT NULL,
  `capital_detail` text NOT NULL,
  `capital_date` varchar(32) NOT NULL,
  `capital_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_capital`
--

INSERT INTO `accounts_capital` (`capital_id`, `capital_name`, `capital_amount`, `capital_detail`, `capital_date`, `capital_timestamp`) VALUES
(1, 'Faizan', '200000', 'Extra Money Invest...', '2015-08-31', '2015-08-29 06:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_general_ledger`
--

CREATE TABLE IF NOT EXISTS `accounts_general_ledger` (
  `gl_id` int(11) NOT NULL,
  `gl_amount` float NOT NULL,
  `gl_type` varchar(32) NOT NULL,
  `gl_account` varchar(32) NOT NULL,
  `gl_account_type` varchar(32) NOT NULL,
  `gl_date` varchar(32) NOT NULL,
  `gl_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_general_ledger`
--

INSERT INTO `accounts_general_ledger` (`gl_id`, `gl_amount`, `gl_type`, `gl_account`, `gl_account_type`, `gl_date`, `gl_timestamp`) VALUES
(5, 20000, 'debit', 'bank', '1', '24-8-2015', '2015-08-24 14:29:24'),
(6, 5000, 'debit', 'bank', '3', '27-8-2015', '2015-08-27 07:43:07'),
(7, 2000, 'credit', 'Purchase', 'General Purchase', '24-08-2015', '2015-08-27 12:12:27'),
(8, 102, 'credit', 'supplier', 'bill', '2015-08-27 00:00:00', '2015-08-27 12:17:17'),
(9, 102, 'credit', 'supplier', 'bill', '2015-08-27 00:00:00', '2015-08-27 12:22:30'),
(10, 102, 'credit', 'supplier', 'bill', '2015-08-27 00:00:00', '2015-08-27 12:26:59'),
(11, 102, 'credit', 'supplier', 'bill', '2015-08-27 00:00:00', '2015-08-27 12:27:25'),
(12, 102, 'credit', 'supplier', 'bill', '2015-08-27 00:00:00', '2015-08-27 12:35:38'),
(13, 0, 'debit', 'Purchase', 'Stock', '2015-08-27 00:00:00', '2015-08-27 13:05:17'),
(14, 54000, 'debit', 'Purchase', 'Stock', '2015-08-27 00:00:00', '2015-08-27 13:06:02'),
(15, 54000, 'debit', 'Purchase', 'Stock', '2015-08-27 00:00:00', '2015-08-27 13:09:37'),
(16, 54000, 'debit', 'Purchase', 'Stock', '2015-08-27 00:00:00', '2015-08-27 13:13:49'),
(17, 500, 'credit', 'supplier', 'bill', '2015-08-29 00:00:00', '2015-08-29 07:01:22'),
(18, 600, 'credit', 'supplier', 'bill', '2015-08-29 00:00:00', '2015-08-29 07:01:58'),
(19, 2000, 'credit', 'supplier', 'bill', '2015-09-02 00:00:00', '2015-09-02 05:00:31'),
(20, 16800, 'debit', 'Purchase', 'Stock', '2015-09-02 00:00:00', '2015-09-02 05:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_payable_receviable`
--

CREATE TABLE IF NOT EXISTS `accounts_payable_receviable` (
  `pr_id` int(11) NOT NULL,
  `pr_amount` float NOT NULL,
  `pr_description` text NOT NULL,
  `pr_account` varchar(64) NOT NULL,
  `pr_account_type` varchar(128) NOT NULL,
  `pr_bank` int(11) NOT NULL,
  `pr_date` varchar(32) NOT NULL,
  `pr_due_date` varchar(32) NOT NULL,
  `pr_type` varchar(32) NOT NULL,
  `pr_status` int(11) NOT NULL,
  `pr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_payable_receviable`
--

INSERT INTO `accounts_payable_receviable` (`pr_id`, `pr_amount`, `pr_description`, `pr_account`, `pr_account_type`, `pr_bank`, `pr_date`, `pr_due_date`, `pr_type`, `pr_status`, `pr_timestamp`) VALUES
(3, 20000, '', 'supplier', '2', 3, '2015-08-24 00:00:00', '2015-08-31 00:00:00', 'receviable', 0, '2015-08-24 14:29:24'),
(4, 5000, '', 'supplier', '2', 2, '2015-08-27 00:00:00', '2015-08-28 00:00:00', 'payable', 0, '2015-08-27 07:43:07'),
(5, 102, '', 'supplier', '1', 1, '2015-08-27 00:00:00', '2015-08-27 00:00:00', 'payable', 0, '2015-08-27 12:22:30'),
(6, 102, '', 'supplier', '1', 1, '2015-08-28 00:00:00', '2015-08-28 00:00:00', 'payable', 0, '2015-08-27 12:27:26'),
(7, 102, '0000002', 'supplier', '1', 1, '2015-08-27 00:00:00', '2015-08-27 00:00:00', 'payable', 0, '2015-08-27 12:35:38'),
(8, 500, '', 'supplier', '2', 2, '2015-08-29 00:00:00', '2015-09-06 00:00:00', 'payable', 0, '2015-08-29 07:01:22'),
(9, 600, '1234567890', 'supplier', '2', 2, '2015-08-29 00:00:00', '2015-08-31 00:00:00', 'payable', 0, '2015-08-29 07:01:58'),
(10, 2000, '1234567899', 'supplier', '1', 1, '2015-09-02 00:00:00', '2015-09-02 00:00:00', 'payable', 0, '2015-09-02 05:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_profitloss`
--

CREATE TABLE IF NOT EXISTS `accounts_profitloss` (
  `pl_id` int(11) NOT NULL,
  `pl_product_id` int(11) NOT NULL,
  `pl_cost` float NOT NULL,
  `pl_price` float NOT NULL,
  `pl_quantity` int(11) NOT NULL,
  `pl_profit` float NOT NULL,
  `pl_date` varchar(32) NOT NULL,
  `pl_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_profitloss`
--

INSERT INTO `accounts_profitloss` (`pl_id`, `pl_product_id`, `pl_cost`, `pl_price`, `pl_quantity`, `pl_profit`, `pl_date`, `pl_timestamp`) VALUES
(1, 2, 20.5, 25, 2, 9, '2015-08-24 00:00:00', '2015-08-24 11:56:14'),
(2, 1, 20, 30, 1, 10, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(3, 1, 20, 30, 2, 20, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(4, 2, 45, 40, 2, -10, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(5, 2, 45, 40, 3, -15, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(6, 3, 45, 55, 4, 40, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(7, 1, 20, 30, 1, 10, '2015-09-02 00:00:00', '2015-09-02 07:15:40'),
(8, 2, 45, 40, 5, -25, '2015-09-02 00:00:00', '2015-09-02 07:15:41'),
(9, 3, 45, 55, 2, 20, '2015-09-02 00:00:00', '2015-09-02 07:15:41'),
(10, 4, 7, 10, 1, 3, '2015-09-02 00:00:00', '2015-09-02 07:15:41'),
(11, 1, 20, 30, 1, 10, '2015-09-02 00:00:00', '2015-09-02 07:15:48'),
(12, 2, 45, 40, 5, -25, '2015-09-02 00:00:00', '2015-09-02 07:15:48'),
(13, 3, 45, 55, 2, 20, '2015-09-02 00:00:00', '2015-09-02 07:15:48'),
(14, 4, 7, 10, 1, 3, '2015-09-02 00:00:00', '2015-09-02 07:15:48'),
(15, 1, 20, 30, 1, 10, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(16, 2, 45, 40, 5, -25, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(17, 3, 45, 55, 2, 20, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(18, 4, 7, 10, 1, 3, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(19, 1, 20, 30, 1, 10, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(20, 2, 45, 40, 1, -5, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(21, 3, 45, 55, 1, 10, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(22, 4, 7, 10, 1, 3, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(23, 1, 20, 30, 1, 10, '2015-09-07 00:00:00', '2015-09-07 12:59:15'),
(24, 2, 45, 40, 1, -5, '2015-09-07 00:00:00', '2015-09-07 12:59:15'),
(25, 3, 45, 55, 1, 10, '2015-09-07 00:00:00', '2015-09-07 12:59:16'),
(26, 4, 7, 10, 1, 3, '2015-09-07 00:00:00', '2015-09-07 12:59:16'),
(27, 1, 20, 30, 1, 10, '2015-09-08 00:00:00', '2015-09-08 12:55:11'),
(28, 2, 45, 40, 1, -5, '2015-09-08 00:00:00', '2015-09-08 12:55:12'),
(29, 3, 45, 55, 1, 10, '2015-09-08 00:00:00', '2015-09-08 12:55:12'),
(30, 4, 7, 10, 1, 3, '2015-09-08 00:00:00', '2015-09-08 12:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_purchases`
--

CREATE TABLE IF NOT EXISTS `accounts_purchases` (
  `purchase_id` int(11) NOT NULL,
  `purchase_product` varchar(128) NOT NULL,
  `purchase_cost` float NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `purchase_date` varchar(32) NOT NULL,
  `purchase_account` varchar(64) NOT NULL,
  `purchase_account_type` varchar(128) NOT NULL,
  `purchase_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_purchases`
--

INSERT INTO `accounts_purchases` (`purchase_id`, `purchase_product`, `purchase_cost`, `purchase_quantity`, `purchase_date`, `purchase_account`, `purchase_account_type`, `purchase_timestamp`) VALUES
(1, 'Chair', 250, 2, '2015-08-24 00:00:00', 'Expences', 'Fixed Expences', '2015-08-24 12:40:12'),
(2, 'Chair', 250, 2, '2015-08-25 00:00:00', 'Expences', 'Fixed Expences', '2015-08-24 13:06:37'),
(3, '2', 45, 100, '2015-08-27 00:00:00', 'purchase', 'stock', '2015-08-27 13:09:37'),
(4, '2', 45, 1200, '2015-08-27 00:00:00', 'purchase', 'stock', '2015-08-27 13:13:49'),
(5, '4', 7, 2400, '2015-09-02 00:00:00', 'purchase', 'stock', '2015-09-02 05:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_sales`
--

CREATE TABLE IF NOT EXISTS `accounts_sales` (
  `sales_id` int(11) NOT NULL,
  `sales_product_id` int(11) NOT NULL,
  `sales_cost` float NOT NULL,
  `sales_price` float NOT NULL,
  `sales_quantity` int(11) NOT NULL,
  `sales_total` float NOT NULL,
  `sales_date` varchar(32) NOT NULL,
  `sales_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_sales`
--

INSERT INTO `accounts_sales` (`sales_id`, `sales_product_id`, `sales_cost`, `sales_price`, `sales_quantity`, `sales_total`, `sales_date`, `sales_timestamp`) VALUES
(1, 2, 20, 25, 2, 50, '2015-08-24 00:00:00', '2015-08-24 11:39:11'),
(2, 1, 20.5, 25, 2, 50, '2015-08-25 00:00:00', '2015-08-24 11:39:34'),
(3, 1, 20.5, 25, 2, 50, '2015-08-25 00:00:00', '2015-08-28 11:39:34'),
(4, 1, 20.5, 25, 2, 50, '2015-08-30 00:00:00', '2015-08-25 11:39:34'),
(5, 1, 20.5, 25, 2, 50, '2015-08-28 00:00:00', '2015-08-30 11:39:34'),
(6, 2, 20.5, 25, 2, 50, '2015-08-24 00:00:00', '2015-08-25 04:49:52'),
(7, 1, 20, 30, 1, 30, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(8, 1, 20, 30, 2, 60, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(9, 2, 45, 40, 2, 80, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(10, 2, 45, 40, 3, 120, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(11, 3, 45, 55, 4, 220, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(12, 1, 20, 30, 1, 30, '2015-09-02 00:00:00', '2015-09-02 07:15:40'),
(13, 2, 45, 40, 5, 200, '2015-09-02 00:00:00', '2015-09-02 07:15:41'),
(14, 3, 45, 55, 2, 110, '2015-09-02 00:00:00', '2015-09-02 07:15:41'),
(15, 4, 7, 10, 1, 10, '2015-09-02 00:00:00', '2015-09-02 07:15:41'),
(16, 1, 20, 30, 1, 30, '2015-09-02 00:00:00', '2015-09-02 07:15:47'),
(17, 2, 45, 40, 5, 200, '2015-09-02 00:00:00', '2015-09-02 07:15:48'),
(18, 3, 45, 55, 2, 110, '2015-09-02 00:00:00', '2015-09-02 07:15:48'),
(19, 4, 7, 10, 1, 10, '2015-09-02 00:00:00', '2015-09-02 07:15:48'),
(20, 1, 20, 30, 1, 30, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(21, 2, 45, 40, 5, 200, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(22, 3, 45, 55, 2, 110, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(23, 4, 7, 10, 1, 10, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(24, 1, 20, 30, 1, 30, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(25, 2, 45, 40, 1, 40, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(26, 3, 45, 55, 1, 55, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(27, 4, 7, 10, 1, 10, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(28, 1, 20, 30, 1, 30, '2015-09-07 00:00:00', '2015-09-07 12:59:15'),
(29, 2, 45, 40, 1, 40, '2015-09-07 00:00:00', '2015-09-07 12:59:15'),
(30, 3, 45, 55, 1, 55, '2015-09-07 00:00:00', '2015-09-07 12:59:15'),
(31, 4, 7, 10, 1, 10, '2015-09-07 00:00:00', '2015-09-07 12:59:16'),
(32, 1, 20, 30, 1, 30, '2015-09-08 00:00:00', '2015-09-08 12:55:11'),
(33, 2, 45, 40, 1, 40, '2015-09-08 00:00:00', '2015-09-08 12:55:12'),
(34, 3, 45, 55, 1, 55, '2015-09-08 00:00:00', '2015-09-08 12:55:12'),
(35, 4, 7, 10, 1, 10, '2015-09-08 00:00:00', '2015-09-08 12:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `account_reconcilation`
--

CREATE TABLE IF NOT EXISTS `account_reconcilation` (
  `recon_id` int(11) NOT NULL,
  `recon_amount` varchar(264) NOT NULL,
  `recon_bank` varchar(264) NOT NULL,
  `recon_type` varchar(264) NOT NULL,
  `recon_date` varchar(32) NOT NULL,
  `recon_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_reconcilation`
--

INSERT INTO `account_reconcilation` (`recon_id`, `recon_amount`, `recon_bank`, `recon_type`, `recon_date`, `recon_timestamp`) VALUES
(1, '10000', '1', 'credit', '2015-08-24 00:00:00', '2015-08-25 11:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `assets_id` int(11) NOT NULL,
  `assets_type` varchar(128) NOT NULL,
  `assets_amount` varchar(32) NOT NULL,
  `assets_payment_mode` varchar(32) NOT NULL,
  `assets_bank` int(11) NOT NULL,
  `assets_due_date` varchar(32) NOT NULL,
  `assets_detail` text NOT NULL,
  `assets_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(264) NOT NULL,
  `bank_address` varchar(264) NOT NULL,
  `bank_branch` varchar(264) NOT NULL,
  `bank_account_no` varchar(264) NOT NULL,
  `bank_br_code` varchar(264) NOT NULL,
  `bank_ibn_no` varchar(264) NOT NULL,
  `bank_account_type` varchar(264) NOT NULL,
  `bank_account_title` varchar(264) NOT NULL,
  `bank_opening_balance` varchar(264) NOT NULL,
  `bank_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`, `bank_address`, `bank_branch`, `bank_account_no`, `bank_br_code`, `bank_ibn_no`, `bank_account_type`, `bank_account_title`, `bank_opening_balance`, `bank_timestamp`) VALUES
(1, 'Habib Bank Limited', 'New Chali Road, Light House, Karachi', 'New Chali Branch', '123456-124564-1645', '12345', 'HABIB1235465NCB12345', 'Current', 'Faizan Siddiqui', '20000', '2015-08-25 09:37:11'),
(2, 'Habib Bank Limited', 'New Chali Road, Light House, Karachi', 'Light House Branch', '123456-124564-1645', '12345', 'HABIB1235465NCB12345', 'Current', 'Faizan Siddiqui', '25000', '2015-08-26 09:13:42'),
(3, 'Allied Bank Limited', 'New Chali Road, Light House, Karachi', 'New Chali Branch', '123456-124564-1645', '12345', 'HABIB1235465NCB12345', 'Current', 'Faizan Siddiqui', '2500', '2015-08-26 09:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `banks_transection`
--

CREATE TABLE IF NOT EXISTS `banks_transection` (
  `transection_id` int(11) NOT NULL,
  `transection_bank` varchar(264) NOT NULL,
  `transection_amount` varchar(264) NOT NULL,
  `transection_type` varchar(32) NOT NULL,
  `transection_payment_mode` varchar(32) NOT NULL,
  `transection_detail` text NOT NULL,
  `transection_date` varchar(32) NOT NULL,
  `transection_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks_transection`
--

INSERT INTO `banks_transection` (`transection_id`, `transection_bank`, `transection_amount`, `transection_type`, `transection_payment_mode`, `transection_detail`, `transection_date`, `transection_timestamp`) VALUES
(1, '2', '65645', 'debit', 'cash', 'assda sd asd asd sa das dsad ', '26-8-2015, 11:48 am', '2015-08-26 09:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `bill_id` int(11) NOT NULL,
  `bill_supid` int(11) NOT NULL,
  `bill_number` varchar(32) NOT NULL,
  `bill_duedate` varchar(32) NOT NULL,
  `bill_amount` varchar(32) NOT NULL,
  `bill_type` varchar(32) NOT NULL,
  `bill_bankdetail` int(11) NOT NULL,
  `bill_cheque` varchar(32) NOT NULL,
  `bill_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `bill_supid`, `bill_number`, `bill_duedate`, `bill_amount`, `bill_type`, `bill_bankdetail`, `bill_cheque`, `bill_timestamp`) VALUES
(1, 2, 'MCA-001-D15', '2015-08-30', '5000', 'cheque', 3, '', '2015-08-27 08:28:11'),
(2, 1, 'MCA-001-D12', '2015-08-31', '20000', 'cash', 2, '', '2015-08-27 08:30:36'),
(3, 1, 'xx1', '2015-08-27', '100', 'cheque', 1, '0000001', '2015-08-27 11:59:17'),
(4, 1, 'xx2', '2015-08-27', '102', 'cheque', 1, '0000002', '2015-08-27 12:10:20'),
(5, 1, 'xx2', '2015-08-27', '102', 'cheque', 1, '0000002', '2015-08-27 12:15:20'),
(6, 1, 'xx2', '2015-08-27', '102', 'cheque', 1, '0000002', '2015-08-27 12:15:51'),
(7, 1, 'xx2', '2015-08-27', '102', 'cheque', 1, '0000002', '2015-08-27 12:16:42'),
(8, 1, 'xx2', '2015-08-27', '102', 'cheque', 1, '0000002', '2015-08-27 12:17:17'),
(9, 1, 'xx2', '2015-08-27', '102', 'cheque', 1, '0000002', '2015-08-27 12:22:30'),
(10, 1, 'xx2', '2015-08-27', '102', 'cheque', 1, '0000002', '2015-08-27 12:26:59'),
(11, 1, 'xx2', '2015-08-27', '102', 'cheque', 1, '0000002', '2015-08-27 12:27:25'),
(12, 1, 'xx2', '2015-08-27', '102', 'cheque', 1, '0000002', '2015-08-27 12:35:38'),
(13, 2, 'MCA-001-D13', '2015-09-06', '500', 'cash', 2, '', '2015-08-29 07:01:21'),
(14, 2, 'MCA-001-D14', '2015-08-31', '600', 'cheque', 2, '1234567890', '2015-08-29 07:01:58'),
(15, 1, 'MCA-001-D14', '2015-09-02', '2000', 'cheque', 1, '1234567899', '2015-09-02 05:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE IF NOT EXISTS `discount` (
  `discount_id` int(11) NOT NULL,
  `discount_product_id` int(11) NOT NULL,
  `discount_type` varchar(32) NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `discount_min_purchase_qty` int(11) NOT NULL,
  `discount_mode` varchar(16) NOT NULL,
  `discount_status` int(11) NOT NULL,
  `discount_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `discount_product_id`, `discount_type`, `discount_amount`, `discount_min_purchase_qty`, `discount_mode`, `discount_status`, `discount_datetime`) VALUES
(1, 2, 'flat', 10, 6, 'discount', 1, '2015-08-18 10:23:16'),
(2, 1, 'percent', 9, 1, 'discount', 1, '2015-08-18 10:40:22'),
(16, 3, '', 0, 6, 'offer', 1, '2015-08-19 06:44:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `inv_name`, `inv_pid`, `inv_cost`, `inv_price`, `inv_quantity`, `inv_barcode`, `inv_ts`) VALUES
(4, 'Pepsi Bottle 1Ltr', 3, '50', '55', 70, 159753825, '2015-08-15 10:08:07'),
(5, 'Pepsi Bottle 250ml', 1, '20', '35', 500, 987654321, '2015-08-15 10:08:41'),
(6, 'Pepsi Bottle 500ml', 2, '40', '45', 500, 1234567891, '2015-08-19 12:39:10'),
(7, 'Picasso Ball Pen Blue Color', 4, '7', '10', 150, 123456788, '2015-09-02 05:01:20'),
(8, 'Pepsi Bottle 500ml', 2, '45', '60', 300, 2147483647, '2015-09-07 07:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `offer_id` int(11) NOT NULL,
  `offer_discount_id` int(11) NOT NULL,
  `offer_product_id` int(11) NOT NULL,
  `offer_product_quantity` int(11) NOT NULL,
  `offer_status` int(11) NOT NULL,
  `offer_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `offer_discount_id`, `offer_product_id`, `offer_product_quantity`, `offer_status`, `offer_datetime`) VALUES
(63, 16, 3, 1, 1, '2015-08-22 15:01:02'),
(64, 16, 2, 1, 1, '2015-08-22 15:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `open_balance`
--

CREATE TABLE IF NOT EXISTS `open_balance` (
  `ob_id` int(11) NOT NULL,
  `ob_user` int(11) NOT NULL,
  `ob_balance` varchar(32) NOT NULL,
  `ob_date` varchar(32) NOT NULL,
  `ob_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `open_balance`
--

INSERT INTO `open_balance` (`ob_id`, `ob_user`, `ob_balance`, `ob_date`, `ob_timestamp`) VALUES
(1, 3, '2000', '2015-09-07', '2015-09-07 13:43:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_supplier`, `p_cost`, `p_price`, `p_gst`, `p_vat`, `p_barcode`, `p_volumetype`, `p_volumevalue`, `p_skucrate`, `p_skucarton`, `p_skubag`, `p_datetime`) VALUES
(1, 'Pepsi Bottle 250ml', 2, '20', '39', '10', '123', '987654321', 'piece', 'ml', 24, 1, 2, '2015-08-12 05:00:29'),
(2, 'Pepsi Bottle 500ml', 1, '45', '50', '10', '123', '1234567891', 'liter', 'Peace(s)', 12, 144, 864, '2015-08-12 06:00:56'),
(3, 'Pepsi Bottle 1Ltr', 2, '45', '55', '10', '123', '159753825', 'piece', 'Peace(s)', 6, 144, 864, '2015-08-12 08:05:49'),
(4, 'Picasso Ball Pen Blue Color', 1, '7', '10', '10', '123', '123456788', 'piece', '1', 144, 1728, 12, '2015-09-02 04:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `sale_id` int(11) NOT NULL,
  `sale_user_id` int(11) NOT NULL,
  `sale_shift_number` varchar(32) NOT NULL,
  `sale_terminal_number` int(11) NOT NULL,
  `sale_bill_number` varchar(128) NOT NULL,
  `sale_payment` varchar(32) NOT NULL,
  `sale_date` varchar(32) NOT NULL,
  `sale_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `sale_user_id`, `sale_shift_number`, `sale_terminal_number`, `sale_bill_number`, `sale_payment`, `sale_date`, `sale_datetime`) VALUES
(22, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-07-08 00:00:00', '2015-07-08 10:21:24'),
(23, 4, '9', 13, 'Macro-QAR-1234', 'cash', '2015-07-08 00:00:00', '2015-07-08 11:48:03'),
(24, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-07-08 00:00:00', '2015-07-08 12:59:19'),
(25, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-07-08 00:00:00', '2015-07-08 13:00:57'),
(26, 4, '9', 13, 'Macro-QAR-1234', 'cash', '2015-07-08 00:00:00', '2015-07-08 13:08:51'),
(27, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-07-08 00:00:00', '2015-07-08 13:09:04'),
(28, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-07-08 00:00:00', '2015-07-08 13:12:19'),
(29, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-07-08 00:00:00', '2015-07-08 13:19:37'),
(30, 4, '9', 13, 'Macro-QAR-1234', 'cash', '2015-07-08 00:00:00', '2015-07-08 13:23:07'),
(31, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 00:00:00', '2015-08-10 04:09:10'),
(32, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-10 00:00:00', '2015-08-10 04:09:28'),
(33, 4, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 00:00:00', '2015-08-10 04:21:33'),
(34, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 00:00:00', '2015-08-10 05:10:48'),
(35, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 00:00:00', '2015-08-10 05:17:33'),
(36, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 00:00:00', '2015-08-10 05:17:41'),
(37, 4, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 00:00:00', '2015-08-10 05:20:12'),
(38, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 00:00:00', '2015-08-10 05:20:15'),
(39, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 00:00:00', '2015-08-10 05:20:20'),
(40, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 00:00:00', '2015-08-10 05:20:27'),
(41, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 00:00:00', '2015-08-10 05:20:51'),
(42, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-10 00:00:00', '2015-08-10 05:22:27'),
(43, 3, '9', 13, 'Macro-QAR-1234', 'credit', '2015-08-10 00:00:00', '2015-08-10 05:23:41'),
(44, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-10 00:00:00', '2015-08-10 05:23:49'),
(45, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-17 00:00:00', '2015-08-17 04:45:38'),
(46, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-17 00:00:00', '2015-08-17 04:46:12'),
(47, 4, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-17 00:00:00', '2015-08-17 06:12:36'),
(48, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-19 00:00:00', '2015-08-19 13:11:41'),
(49, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-22 00:00:00', '2015-08-22 07:19:28'),
(50, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-24 00:00:00', '2015-08-24 06:37:53'),
(51, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-24 00:00:00', '2015-08-24 06:38:26'),
(52, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-24 00:00:00', '2015-08-24 06:38:40'),
(53, 3, '9', 13, 'Macro-QAR-1234', 'cash', '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(54, 3, '9', 13, 'Macro-QAR-1235', 'credit', '2015-09-02 00:00:00', '2015-09-02 07:15:40'),
(55, 4, '9', 13, 'Macro-QAR-1235', 'credit', '2015-09-02 00:00:00', '2015-09-02 07:15:47'),
(56, 3, '9', 13, 'Macro-QAR-1235', 'cash', '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(57, 4, '9', 13, 'Macro-QAR-1235', 'cash', '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(58, 3, '9', 13, 'Macro-QAR-1235', 'cash', '2015-09-07 00:00:00', '2015-09-07 12:59:15'),
(59, 3, '9', 13, 'Macro-QAR-1235', 'cash', '2015-09-08 00:00:00', '2015-09-08 12:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `sale_product`
--

CREATE TABLE IF NOT EXISTS `sale_product` (
  `salepro_id` int(11) NOT NULL,
  `salepro_sale_id` int(11) NOT NULL,
  `salepro_product_id` int(11) NOT NULL,
  `salepro_product_quantity` int(11) NOT NULL,
  `salepro_product_price` int(11) NOT NULL,
  `salepro_date` varchar(32) NOT NULL,
  `salepro_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_product`
--

INSERT INTO `sale_product` (`salepro_id`, `salepro_sale_id`, `salepro_product_id`, `salepro_product_quantity`, `salepro_product_price`, `salepro_date`, `salepro_datetime`) VALUES
(1, 22, 1, 2, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(2, 22, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(3, 22, 1, 2, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(4, 22, 1, 5, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(5, 23, 1, 5, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(6, 23, 1, 6, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(7, 23, 1, 7, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(8, 23, 1, 8, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(9, 24, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(10, 24, 1, 2, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(11, 24, 1, 5, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(12, 25, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(13, 25, 1, 2, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(14, 25, 1, 5, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(15, 25, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(16, 26, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(17, 26, 1, 2, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(18, 26, 1, 2, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(19, 26, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(20, 27, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(21, 27, 1, 2, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(22, 27, 1, 2, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(23, 27, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(24, 28, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(25, 28, 1, 2, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(26, 28, 1, 2, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(27, 28, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(28, 29, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(29, 29, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(30, 29, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(31, 29, 1, 5, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(32, 30, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(33, 30, 1, 5, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(34, 30, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(35, 33, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(36, 33, 1, 2, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(37, 33, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(38, 34, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(39, 34, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(40, 34, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(41, 34, 1, 4, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(42, 35, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(43, 35, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(44, 35, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(45, 35, 1, 9, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(46, 36, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(47, 36, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(48, 36, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(49, 36, 1, 9, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(50, 37, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(51, 37, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(52, 37, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(53, 37, 1, 9, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(54, 38, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(55, 38, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(56, 38, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(57, 38, 1, 9, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(58, 39, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(59, 39, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(60, 39, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(61, 39, 1, 9, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(62, 40, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(63, 40, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(64, 40, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(65, 40, 1, 9, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(66, 41, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(67, 41, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(68, 41, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(69, 41, 1, 9, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(70, 42, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(71, 42, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(72, 42, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(73, 42, 1, 9, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(74, 43, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(75, 43, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(76, 43, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(77, 43, 1, 9, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(78, 44, 1, 1, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(79, 44, 1, 10, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(80, 44, 1, 3, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(81, 44, 1, 9, 100, '2015-08-12 00:00:00', '2015-08-12 05:21:07'),
(82, 45, 4, 1, 40, '2015-08-17 00:00:00', '2015-08-17 04:45:38'),
(83, 45, 4, 2, 40, '2015-08-17 00:00:00', '2015-08-17 04:45:38'),
(84, 46, 4, 1, 40, '2015-08-17 00:00:00', '2015-08-17 04:46:12'),
(85, 46, 4, 2, 40, '2015-08-17 00:00:00', '2015-08-17 04:46:13'),
(86, 47, 4, 1, 40, '2015-08-17 00:00:00', '2015-08-17 06:12:36'),
(87, 47, 4, 2, 40, '2015-08-17 00:00:00', '2015-08-17 06:12:36'),
(88, 48, 4, 1, 30, '2015-08-19 00:00:00', '2015-08-19 13:11:41'),
(89, 48, 4, 2, 30, '2015-08-19 00:00:00', '2015-08-19 13:11:41'),
(90, 48, 4, 3, 30, '2015-08-19 00:00:00', '2015-08-19 13:11:41'),
(91, 48, 4, 35, 30, '2015-08-19 00:00:00', '2015-08-19 13:11:41'),
(92, 49, 4, 1, 30, '2015-08-22 00:00:00', '2015-08-22 07:19:28'),
(93, 49, 3, 2, 55, '2015-08-22 00:00:00', '2015-08-22 07:19:28'),
(94, 49, 4, 2, 30, '2015-08-22 00:00:00', '2015-08-22 07:19:28'),
(95, 49, 3, 1, 55, '2015-08-22 00:00:00', '2015-08-22 07:19:28'),
(96, 53, 1, 1, 30, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(97, 53, 1, 2, 30, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(98, 53, 2, 2, 40, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(99, 53, 2, 3, 40, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(100, 53, 3, 4, 55, '2015-08-29 00:00:00', '2015-08-29 10:20:25'),
(101, 54, 1, 1, 30, '2015-09-02 00:00:00', '2015-09-02 07:15:40'),
(102, 54, 2, 5, 40, '2015-09-02 00:00:00', '2015-09-02 07:15:40'),
(103, 54, 3, 2, 55, '2015-09-02 00:00:00', '2015-09-02 07:15:41'),
(104, 54, 4, 1, 10, '2015-09-02 00:00:00', '2015-09-02 07:15:41'),
(105, 55, 1, 1, 30, '2015-09-02 00:00:00', '2015-09-02 07:15:47'),
(106, 55, 2, 5, 40, '2015-09-02 00:00:00', '2015-09-02 07:15:48'),
(107, 55, 3, 2, 55, '2015-09-02 00:00:00', '2015-09-02 07:15:48'),
(108, 55, 4, 1, 10, '2015-09-02 00:00:00', '2015-09-02 07:15:48'),
(109, 56, 1, 1, 30, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(110, 56, 2, 5, 40, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(111, 56, 3, 2, 55, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(112, 56, 4, 1, 10, '2015-09-02 00:00:00', '2015-09-02 07:28:07'),
(113, 57, 1, 1, 30, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(114, 57, 2, 1, 40, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(115, 57, 3, 1, 55, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(116, 57, 4, 2, 10, '2015-09-07 00:00:00', '2015-09-07 12:08:03'),
(117, 58, 1, 1, 30, '2015-09-07 00:00:00', '2015-09-07 12:59:15'),
(118, 58, 2, 1, 40, '2015-09-07 00:00:00', '2015-09-07 12:59:15'),
(119, 58, 3, 1, 55, '2015-09-07 00:00:00', '2015-09-07 12:59:15'),
(120, 58, 4, 1, 10, '2015-09-07 00:00:00', '2015-09-07 12:59:16'),
(121, 59, 1, 1, 30, '2015-09-08 00:00:00', '2015-09-08 12:55:11'),
(122, 59, 2, 1, 40, '2015-09-08 00:00:00', '2015-09-08 12:55:12'),
(123, 59, 3, 1, 55, '2015-09-08 00:00:00', '2015-09-08 12:55:12'),
(124, 59, 4, 1, 10, '2015-09-08 00:00:00', '2015-09-08 12:55:12');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `login`, `password`, `mobile`, `phone`, `address`, `city`, `country`, `nic`, `dob`, `photo`, `designation`, `capabilities`, `datetime`) VALUES
(1, 'Faizan1', 'Siddiqui', 'faizan@test.com', 'faizan', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-03', '', 'depart_incharge', '["sales_page","view_inventory"]', '2015-08-12 05:23:11'),
(3, 'Faizan', 'Siddiqui', 'faizan@imagiacian.com', 'faizi', '037071532f2a3a236b858bf820e32267', '03432882794', '021-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '12345-1234567-1', '2015-08-02', '', 'sale_person', '["sales_page","add_inventory","add_user"]', '2015-08-12 05:23:11'),
(4, 'Qundeel', 'Shakeel', 'qundeel@imagiacian.com', 'qundeel', '037071532f2a3a236b858bf820e32267', '0300-1234567', '0300-1234567', 'Karachi, Pakistan', 'Karachi', 'Pakistan', '42301-1234567-1', '2015-01-01', '', 'sale_person', '["sales_page","add_inventory","add_user"]', '2015-09-08 08:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE IF NOT EXISTS `warehouse` (
  `warehouse_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_cost` int(11) NOT NULL,
  `warehouse_price` int(11) NOT NULL,
  `warehouse_quantity` int(11) NOT NULL,
  `warehouse_barcode` text NOT NULL,
  `warehouse_qtytype` varchar(32) NOT NULL,
  `warehouse_sp_bill` varchar(64) NOT NULL,
  `warehouse_skutype` varchar(32) NOT NULL,
  `warehouse_skuvalue` varchar(32) NOT NULL,
  `warehouse_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_id`, `product_id`, `warehouse_cost`, `warehouse_price`, `warehouse_quantity`, `warehouse_barcode`, `warehouse_qtytype`, `warehouse_sp_bill`, `warehouse_skutype`, `warehouse_skuvalue`, `warehouse_datetime`) VALUES
(1, 1, 20, 39, 900, '987654321', '', '', 'bottle', 'ml', '2015-08-12 11:07:31'),
(2, 3, 25, 30, 700, '159753825', '', '', '650', 'piece', '2015-08-12 11:12:02'),
(3, 1, 25, 40, 200, '987654321', '', '', 'bottle', 'ml', '2015-08-17 04:24:08'),
(4, 2, 45, 55, 400, '123456789123', 'box', '2', 'bottle', 'ml', '2015-08-19 11:55:12'),
(5, 2, 45, 50, 100, '1234567891', 'crate', '12', '', '', '2015-08-27 13:04:38'),
(6, 2, 45, 50, 100, '1234567891', 'crate', '12', '', '', '2015-08-27 13:05:17'),
(7, 2, 45, 50, 100, '1234567891', 'crate', '12', '', '', '2015-08-27 13:06:02'),
(8, 2, 45, 50, 100, '1234567891', 'crate', '12', '', '', '2015-08-27 13:09:37'),
(9, 2, 45, 50, 100, '1234567891', 'crate', '12', '', '', '2015-08-27 13:13:49'),
(10, 4, 7, 10, 200, '123456788', 'bag', '15', '', '', '2015-09-02 05:01:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_capital`
--
ALTER TABLE `accounts_capital`
  ADD PRIMARY KEY (`capital_id`);

--
-- Indexes for table `accounts_general_ledger`
--
ALTER TABLE `accounts_general_ledger`
  ADD PRIMARY KEY (`gl_id`);

--
-- Indexes for table `accounts_payable_receviable`
--
ALTER TABLE `accounts_payable_receviable`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `accounts_profitloss`
--
ALTER TABLE `accounts_profitloss`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `accounts_purchases`
--
ALTER TABLE `accounts_purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `accounts_sales`
--
ALTER TABLE `accounts_sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `account_reconcilation`
--
ALTER TABLE `account_reconcilation`
  ADD PRIMARY KEY (`recon_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`assets_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `banks_transection`
--
ALTER TABLE `banks_transection`
  ADD PRIMARY KEY (`transection_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `open_balance`
--
ALTER TABLE `open_balance`
  ADD PRIMARY KEY (`ob_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sale_product`
--
ALTER TABLE `sale_product`
  ADD PRIMARY KEY (`salepro_id`);

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
  ADD PRIMARY KEY (`warehouse_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_capital`
--
ALTER TABLE `accounts_capital`
  MODIFY `capital_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `accounts_general_ledger`
--
ALTER TABLE `accounts_general_ledger`
  MODIFY `gl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `accounts_payable_receviable`
--
ALTER TABLE `accounts_payable_receviable`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `accounts_profitloss`
--
ALTER TABLE `accounts_profitloss`
  MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `accounts_purchases`
--
ALTER TABLE `accounts_purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `accounts_sales`
--
ALTER TABLE `accounts_sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `account_reconcilation`
--
ALTER TABLE `account_reconcilation`
  MODIFY `recon_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `assets_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `banks_transection`
--
ALTER TABLE `banks_transection`
  MODIFY `transection_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `open_balance`
--
ALTER TABLE `open_balance`
  MODIFY `ob_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `sale_product`
--
ALTER TABLE `sale_product`
  MODIFY `salepro_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
