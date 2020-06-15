-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 06:39 PM
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
-- Database: `test_helpingkey`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_quote`
--

CREATE TABLE `company_quote` (
  `id` int(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `company` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `appartment` varchar(1000) NOT NULL,
  `towncity` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipCode` varchar(100) NOT NULL,
  `phone` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `date_now` varchar(100) NOT NULL,
  `from_ip` varchar(100) NOT NULL,
  `from_browser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_quote`
--

INSERT INTO `company_quote` (`id`, `country`, `fname`, `lname`, `company`, `address`, `appartment`, `towncity`, `state`, `zipCode`, `phone`, `email`, `date_now`, `from_ip`, `from_browser`) VALUES
(1, 'Azerbaijan', 'Sharan', 'Gopal', 'SDFFDGG', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'DSGSDGDS', 'Khanna', 'PUNJAB', '147301', '09592235036', 'sharangopal36@gmail.com', 'Sun, 14 Jun 2020 22:07:00 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97');

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
  `date_now` varchar(100) NOT NULL,
  `from_ip` varchar(100) DEFAULT NULL,
  `from_browser` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `razorpay_payment_id` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_razorpay`
--

INSERT INTO `orders_razorpay` (`id`, `country`, `fname`, `lname`, `company`, `address`, `appartment`, `towncity`, `state`, `zipCode`, `phone`, `email`, `password`, `country1`, `fname1`, `lname1`, `company1`, `address1`, `appartment1`, `towncity1`, `state1`, `zipCode1`, `special_note`, `giftWrap`, `productName`, `amount`, `referral_id`, `coupon_code`, `discount`, `date_now`, `from_ip`, `from_browser`, `status`, `razorpay_payment_id`) VALUES
(1, 'India', 'Sharan', 'Gopal', 'quadb', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'sdsa', 'Khanna', 'Punjab', '147301', '09592235036', 'kalravinayak07@gmail.com', '', 'India', 'Sharan', 'Gopal', 'quadb', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'sdsa', 'Khanna', 'Punjab', '147301', 'fghfdd', 'sgdsfgf', 'helping-Key', '650', '3250abb29c615dc3bcb850d870efeeaa', 'FEELSAFEAT600', '70', 'Tue, 31 Mar 2020 15:36:17 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61', 'paid', 'pay_EzcDBnkB5AmWXQ'),
(2, 'Aruba', 'Sharan', 'Gopal', 'csvscdb ', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '+918360070037', 'sharangopal36@gmail.com', '', 'Aruba', 'Sharan', 'Gopal', 'csvscdb ', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '', '', 'helping-Key', 'NaN', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(3, 'Aruba', 'Sharan', 'Gopal', 'csvscdb ', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '+918360070037', 'sharangopal36@gmail.com', '', 'Aruba', 'Sharan', 'Gopal', 'csvscdb ', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '', '', 'helping-Key', 'NaN', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(4, 'Aruba', 'Sharan', 'Gopal', 'csvscdb ', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '+918360070037', 'sharangopal36@gmail.com', '', 'Aruba', 'Sharan', 'Gopal', 'csvscdb ', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '', '', 'helping-Key', 'NaN', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(5, 'American Samoa', 'Sharan', 'Gopal', 'dsadc', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '+918360070037', 'sharangopal36@gmail.com', '', 'American Samoa', 'Sharan', 'Gopal', 'dsadc', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '', '', 'helping-Key', 'NaN', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(6, 'Algeria', 'saSas', 'Gopal', 'sASAs', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '+918360070037', 'sharangopal36@gmail.com', '', 'Algeria', 'saSas', 'Gopal', 'sASAs', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '', '', 'helping-Key', 'NaN', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(7, 'Angola', 'Sharan', 'Gopal', 'dass', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '+918360070037', 'sharangopal36@gmail.com', '', 'Angola', 'Sharan', 'Gopal', 'dass', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '', '', 'helping-Key', 'NaN', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(8, 'Angola', 'Sharan', 'Gopal', 'dass', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '+918360070037', 'sharangopal36@gmail.com', '', 'Angola', 'Sharan', 'Gopal', 'dass', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '', '', 'helping-Key', 'NaN', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(9, 'Angola', 'Sharan', 'Gopal', 'dass', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '+918360070037', 'sharangopal36@gmail.com', '', 'Angola', 'Sharan', 'Gopal', 'dass', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '', '', 'helping-Key', '3600', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(10, 'Algeria', 'sharan', 'gopal', 'sasAASA', 'V.p.o Salana(j.s.wala)  Distt. Fatehgarh Sahib', 'DSASDA', 'Amloh', 'PUNJAB', '147301', '09592235036', 'sharangopal36@gmail.com', '', 'Algeria', 'sharan', 'gopal', 'sasAASA', 'V.p.o Salana(j.s.wala)  Distt. Fatehgarh Sahib', 'DSADASD', 'Amloh', 'PUNJAB', '147301', '', '', 'helping-Key', 'NaN', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(11, 'Argentina', 'Sharan', 'Gopal', 'eweq', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'weqwe', 'Khanna', '—', '147301', '09592235036', 'sharangopal36@gmail.com', '', 'Argentina', 'Sharan', 'Gopal', 'eweq', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'weqwe', 'Khanna', '—', '147301', '', '', 'helping-Key', '3000', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(12, 'Argentina', 'Sharan', 'Gopal', 'eweq', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'weqwe', 'Khanna', '—', '147301', '09592235036', 'sharangopal36@gmail.com', '', 'Argentina', 'Sharan', 'Gopal', 'eweq', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'weqwe', 'Khanna', '—', '147301', '', '', 'helping-Key', '3250', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(13, 'Argentina', 'Sharan', 'Gopal', 'eweq', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'weqwe', 'Khanna', '—', '147301', '09592235036', 'sharangopal36@gmail.com', '', 'Argentina', 'Sharan', 'Gopal', 'eweq', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'weqwe', 'Khanna', '—', '147301', '', '', 'helping-Key', '3000', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', ''),
(14, 'Armenia', 'ddwq', 'Gopal', 'weqe', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'qeqweqw', 'Khanna', 'eewqe', '147301', '09592235036', 'sharangopal36@gmail.com', '', 'Armenia', 'ddwq', 'Gopal', 'weqe', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin Code 147301', 'qeqweqw', 'Khanna', 'eewqe', '147301', '', '', 'helping-Key', '3000', '', 'FEELSAFEAT600', '70', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97', 'processing', '');

-- --------------------------------------------------------

--
-- Table structure for table `redeem_requests`
--

CREATE TABLE `redeem_requests` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `gpay_number` varchar(20) DEFAULT NULL,
  `phonepay_number` varchar(20) DEFAULT NULL,
  `paytm_number` varchar(20) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `account_ifsc` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `redeem_amount` varchar(100) DEFAULT NULL,
  `from_ip` varchar(100) DEFAULT NULL,
  `from_browser` varchar(200) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `redeem_requests`
--

INSERT INTO `redeem_requests` (`id`, `email`, `gpay_number`, `phonepay_number`, `paytm_number`, `account_number`, `account_name`, `account_ifsc`, `status`, `redeem_amount`, `from_ip`, `from_browser`, `time`) VALUES
(13, 'kalravinayak07@gmail.com', '9530512748', NULL, NULL, NULL, NULL, NULL, 'paid', '99', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36', 'Thu, 16 Apr 2020 04:11:42 +0530');

-- --------------------------------------------------------

--
-- Table structure for table `rewards_request`
--

CREATE TABLE `rewards_request` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `badge` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `from_ip` varchar(100) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rewards_request`
--

INSERT INTO `rewards_request` (`id`, `email`, `badge`, `status`, `from_ip`, `from_browser`, `time`) VALUES
(39, 'sharangopal36@gmail.com', '1', 'paid', '::1', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Mobile Safari/537.36', 'Mon, 20 Apr 2020 17:35:36 +0530'),
(40, 'sharangopal36@gmail.com', '2', 'paid', '::1', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Mobile Safari/537.36', 'Mon, 20 Apr 2020 17:35:39 +0530'),
(41, 'sharangopal36@gmail.com', '3', 'paid', '::1', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Mobile Safari/537.36', 'Mon, 20 Apr 2020 17:35:42 +0530');

-- --------------------------------------------------------

--
-- Table structure for table `webinar_signup_affiliate`
--

CREATE TABLE `webinar_signup_affiliate` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `referral_id` varchar(200) DEFAULT NULL,
  `total_clicks` int(11) NOT NULL DEFAULT 0,
  `unique_visitors` int(11) NOT NULL DEFAULT 0,
  `commission` float DEFAULT NULL,
  `from_ip` varchar(200) DEFAULT NULL,
  `from_browser` varchar(1000) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webinar_signup_affiliate`
--

INSERT INTO `webinar_signup_affiliate` (`id`, `name`, `email`, `phone`, `password`, `referral_id`, `total_clicks`, `unique_visitors`, `commission`, `from_ip`, `from_browser`, `time`) VALUES
(8, 'Test', 'kalravinayak07@gmail.com', '9530512748', 'dddb9ec4c4ac04a2559d9b711eaa8e35475db3c4d6a7a06dde785dc83f3ed121710cb512733c8095ff346fc8601e7a73ecb53fac752010116e692b1ce73c8e59', '3250abb29c615dc3bcb850d870efeeaa', 5, 1, 0.2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Sun, 14 Jun 2020 07:37:22 +0530'),
(10, 'Test', 'royalknights07@gmail.com', '09530512748', 'a882f0ac848b0b6b4ca7b42bfa1d266afd0ddeba9204ae57a984a69376d59816b1ef3f4d442ea8a70396067ff5b70e0ae8eab3935b617b8e366d8e35c3bfe14c', '825b7430cf61647123594f357e5f935d', 0, 0, 0.3, '::1', 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Mobile Safari/537.36', 'Wed, 06 May 2020 17:55:52 +0530');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_quote`
--
ALTER TABLE `company_quote`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `redeem_requests`
--
ALTER TABLE `redeem_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rewards_request`
--
ALTER TABLE `rewards_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webinar_signup_affiliate`
--
ALTER TABLE `webinar_signup_affiliate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_quote`
--
ALTER TABLE `company_quote`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_razorpay`
--
ALTER TABLE `orders_razorpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `redeem_requests`
--
ALTER TABLE `redeem_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rewards_request`
--
ALTER TABLE `rewards_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `webinar_signup_affiliate`
--
ALTER TABLE `webinar_signup_affiliate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
