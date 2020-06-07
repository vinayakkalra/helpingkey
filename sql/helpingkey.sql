-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 10:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpingkey`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code`
--

CREATE TABLE `coupon_code` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `coupon_value` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code`
--

INSERT INTO `coupon_code` (`id`, `coupon_code`, `coupon_value`, `discount`, `status`) VALUES
(1, 'FEELSAFEAT600', '600', '70', 'default'),
(2, 'FEELSAFEAT200', '200', '90', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_razorpay`
--

CREATE TABLE `orders_razorpay` (
  `id` int(11) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `appartment` varchar(2000) DEFAULT NULL,
  `towncity` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zipCode` varchar(100) DEFAULT NULL,
  `phone` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `country1` varchar(100) DEFAULT NULL,
  `fname1` varchar(100) DEFAULT NULL,
  `lname1` varchar(100) DEFAULT NULL,
  `company1` varchar(200) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `appartment1` varchar(100) DEFAULT NULL,
  `towncity1` varchar(100) DEFAULT NULL,
  `state1` varchar(100) DEFAULT NULL,
  `zipCode1` varchar(100) DEFAULT NULL,
  `special_note` varchar(200) DEFAULT NULL,
  `giftWrap` varchar(1000) DEFAULT NULL,
  `productName` varchar(200) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `referral_id` varchar(200) DEFAULT NULL,
  `coupon_code` varchar(200) DEFAULT NULL,
  `discount` varchar(200) DEFAULT NULL,
  `from_ip` varchar(100) DEFAULT NULL,
  `from_browser` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `razorpay_payment_id` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_razorpay`
--

INSERT INTO `orders_razorpay` (`id`, `country`, `fname`, `lname`, `company`, `address`, `appartment`, `towncity`, `state`, `zipCode`, `phone`, `email`, `password`, `country1`, `fname1`, `lname1`, `company1`, `address1`, `appartment1`, `towncity1`, `state1`, `zipCode1`, `special_note`, `giftWrap`, `productName`, `amount`, `referral_id`, `coupon_code`, `discount`, `from_ip`, `from_browser`, `status`, `razorpay_payment_id`) VALUES
(1, 'India', 'Sharan', 'Gopal', 'quadb', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'sdsa', 'Khanna', 'Punjab', '147301', '09592235036', 'admin@admin.com', '', 'India', 'Sharan', 'Gopal', 'quadb', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'sdsa', 'Khanna', 'Punjab', '147301', 'fghfdd', 'sgdsfgf', 'helping-Key', '650', '', 'FEELSAFEAT600', '70', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61', 'paid', 'pay_EzcDBnkB5AmWXQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon_code`
--
ALTER TABLE `coupon_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_razorpay`
--
ALTER TABLE `orders_razorpay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_razorpay`
--
ALTER TABLE `orders_razorpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
