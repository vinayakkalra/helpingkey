-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 05:31 PM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `time` varchar(1000) NOT NULL,
  `from_ip` varchar(1000) NOT NULL,
  `from_browser` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_name`, `rating`, `name`, `email`, `subject`, `message`, `time`, `from_ip`, `from_browser`) VALUES
(4, 'witcher', 3, 'asda', '', 'aaaaaaaaaa', 'dsad', 'Mon, 13 Jan 2020 00:42:01 +0530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(5, 'witcher', 4, 'dsadas', 'sadad', 'dasdada', 'dsadasdsadasdada', 'Mon, 13 Jan 2020 00:42:52 +0530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(6, 'witcher', 3, 'sada', 'sadad', 'dsadads', 'dasd', 'Mon, 13 Jan 2020 00:44:26 +0530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(7, 'witcher', 3, 'sdadasdas', 'dsadasdasdasdad', 'dsdadsadsadadasdsada', 'adasddsadasdsadasddsadsadas', 'Mon, 13 Jan 2020 00:45:28 +0530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(8, 'witcher', 5, 'asda', 'dsadada', 'dsadadada', 'dsadadadsadas', 'Mon, 13 Jan 2020 00:48:49 +0530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(9, 'witcher', 5, '', '', '', 'sada', 'Mon, 13 Jan 2020 01:46:25 +0530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(10, 'witcher', 3, 'ree', '', '', 'cs', 'Mon, 13 Jan 2020 02:13:26 +0530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(11, 'witcher', 4, 'vinay', 'dsa', 'dsaaaaa', 'dsdadsa', 'Mon, 13 Jan 2020 03:42:12 +0530', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36'),
(12, 'witcher', 4, 'Test', 'kalravinayak07@gmail.com', 'dsadsadsa', 'sadsadsad', 'Mon, 13 Jan 2020 04:22:33 +0530', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36'),
(13, 'witcher', 5, '', '', '', 'It was really good', 'Mon, 13 Jan 2020 16:35:49 +0530', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36'),
(14, 'witcher', 4, 'vinayak kalra', 'kalravinayak07@gmail.com', 'bla blabla bla', 'It was really good', 'Mon, 13 Jan 2020 16:36:27 +0530', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36'),
(15, 'witcher', 5, '', '', '', 'It was really good', 'Mon, 13 Jan 2020 16:36:46 +0530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(16, 'pubg', 4, 'ddsad', 'dsada', 'aaa', 'It was really good', 'Mon, 13 Jan 2020 16:37:05 +0530', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36'),
(17, 'pubg', 5, '', '', '', 'dsadas', 'Mon, 13 Jan 2020 16:37:41 +0530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(18, 'fortnite', 3, 'sharan', '', '', 'It was really good', 'Mon, 13 Jan 2020 16:37:51 +0530', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36'),
(19, 'fortnite', 3, 'SG', '', '', 'It was really good', 'Mon, 13 Jan 2020 16:38:04 +0530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(20, 'pubg', 5, '', '', '', 'dasda', 'Mon, 13 Jan 2020 22:51:08 +0530', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1'),
(21, 'fortnite', 5, '', '', '', 'sad', 'Mon, 13 Jan 2020 22:52:11 +0530', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36'),
(22, 'fortnite', 5, '', '', '', 'dassfcdsfs', 'Fri, 05 Jun 2020 20:19:45 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36');

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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `time` varchar(100) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `quantity` varchar(100) DEFAULT NULL,
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

INSERT INTO `orders_razorpay` (`id`, `country`, `fname`, `lname`, `company`, `address`, `appartment`, `towncity`, `state`, `zipCode`, `phone`, `email`, `country1`, `fname1`, `lname1`, `company1`, `address1`, `appartment1`, `towncity1`, `state1`, `zipCode1`, `special_note`, `giftWrap`, `productName`, `quantity`, `amount`, `referral_id`, `coupon_code`, `discount`, `date_now`, `from_ip`, `from_browser`, `status`, `razorpay_payment_id`) VALUES
(1, 'Bangladesh', 'DSADD', 'DASDAS', 'DSADAS', 'DASDASD', 'DSADAS', 'DSADAS', 'SADD', 'DASDAS', '1234567890', 'Sharangopal36@gmail.com', 'Bangladesh', 'DSADD', 'DASDAS', 'DSADAS', 'DASDASD', 'DSADAS', 'DSADAS', 'SADD', 'DASDAS', '', '', 'helping-Key', '6', '3600', '', 'FEELSAFEAT600', '70', 'Wed, 17 Jun 2020 23:27:37 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.10', NULL, 'pay_F3mXbHiwrBQinc'),
(25, 'India', 'Sharan', 'Gopal', 'quadb', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin', 'v.p.o salana(j.s.wala) Teh. Amloh Distt. Fatehgarh Sahib', 'Khanna', 'near sai baba mandir amloh road  khanna', '141401', '9592235036', 'sharangopal36@gmail.com', 'India', 'Sharan', 'Gopal', 'quadb', 'V.p.o Salana(j.s.wala) Teh. amloh Distt. Fatehgarh Sahib Pin', 'v.p.o salana(j.s.wala) Teh. Amloh Distt. Fatehgarh Sahib', 'Khanna', 'near sai baba mandir amloh road  khanna', '141401', '', 'sdfb', 'helping-Key', '10', '6500', '', 'FEELSAFEAT600', '70', 'Sun, 21 Jun 2020 16:34:27 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.10', 'paid', 'pay_F5FdqlVEQ6jCc8'),
(26, 'Antigua & Barbuda', 'Sharan', 'Gopal', 'sdfgdsa', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '+918360070037', 'sharangopal36@gmail.com', 'Antigua & Barbuda', 'Sharan', 'Gopal', 'sdfgdsa', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '', '', 'helping-Key', '6', '3600', '', 'FEELSAFEAT600', '70', 'Tue, 23 Jun 2020 16:44:43 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.10', 'paid', 'pay_F62tn2vwrjNcjC'),
(27, 'Antigua & Barbuda', 'Sharan', 'Gopal', 'sdfgdsa', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '+918360070037', 'admin@admin.com', 'Antigua & Barbuda', 'Sharan', 'Gopal', 'sdfgdsa', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '', '', 'helping-Key', '6', '3600', '', 'FEELSAFEAT600', '70', 'Tue, 23 Jun 2020 16:47:32 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.10', 'paid', 'pay_F62vyze7aPdViQ'),
(28, 'India', 'asdfgh', 'asdfgh', 'sadfghj', 'asdfghjk', 'sdfghjkl', 'dsfghjk', 'sdfghjk', 'sdfghjkl', '08360070037', 'nanusalana36@gmail.com', 'India', 'asdfgh', 'asdfgh', 'sadfghj', 'asdfghjk', 'sdfghjkl', 'dsfghjk', 'sdfghjk', 'sdfghjkl', '', '', 'helping-Key', '6', '3600', '', 'FEELSAFEAT600', '70', 'Tue, 23 Jun 2020 16:58:57 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.10', 'paid', 'pay_F637uGjCKUVk8Q'),
(29, 'Australia', 'Sharan', 'Gopal', 'asdfghj', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '+918360070037', 'sharangopal36@gmail.com', 'Australia', 'Sharan', 'Gopal', 'asdfghj', 'V.p.o Salana Jiwan Singh wala', 'Teh.Amloh', 'amloh', 'PUNJAB', '147301', '', '', 'helping-Key', '6', '3600', '', 'FEELSAFEAT600', '70', 'Tue, 23 Jun 2020 17:07:24 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.10', 'paid', 'pay_F63GwuygmU6DTQ'),
(31, 'Austria', 'qwert', 'qwertyu', 'qwertyu', 'qwertyuio', 'qwertyuio', 'qwertyuio', 'qwertyui', 'qwertyuio', '09592235036', 'admin@admin.com', 'Austria', 'qwert', 'qwertyu', 'qwertyu', 'qwertyuio', 'qwertyuio', 'qwertyuio', 'qwertyui', 'qwertyuio', '', '', 'helping-Key', '6', '3600', '', 'FEELSAFEAT600', '70', 'Tue, 23 Jun 2020 17:14:04 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.10', 'paid', 'pay_F63NwquQbuk2GE'),
(32, 'Isle of Man', 'wergfh', 'werty', 'werty', 'wertyu', 'ertyui', 'wertyuk', 'wertyu', 'wertyuk', 'wertyuk', 'admin@admin.com', 'Isle of Man', 'wergfh', 'werty', 'werty', 'wertyu', 'ertyui', 'wertyuk', 'wertyu', 'wertyuk', '', '', 'helping-Key', '6', '3600', '', 'FEELSAFEAT600', '70', 'Tue, 23 Jun 2020 17:21:09 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.10', 'paid', 'pay_F63VMsImyueghM'),
(33, 'French Southern Ter', 'ertfy', 'wertfyghj', 'sdfghj', 'sdfghjkl', 'sdfghjkl;', 'dfghjkl', 'sdfghjk', 'sdfghjk', '2342342345', 'admin@admin.com', 'French Southern Ter', 'ertfy', 'wertfyghj', 'sdfghj', 'sdfghjkl', 'sdfghjkl;', 'dfghjkl', 'sdfghjk', 'sdfghjk', '', '', 'helping-Key', '6', '3600', '', 'FEELSAFEAT600', '70', 'Tue, 23 Jun 2020 17:22:56 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.10', 'paid', 'pay_F63XMDtEzCIXux'),
(34, 'French Southern Ter', 'ertfy', 'wertfyghj', 'sdfghj', 'sdfghjkl', 'sdfghjkl;', 'dfghjkl', 'sdfghjk', 'sdfghjk', '2342342345', 'admin@admin.com', 'French Southern Ter', 'ertfy', 'wertfyghj', 'sdfghj', 'sdfghjkl', 'sdfghjkl;', 'dfghjkl', 'sdfghjk', 'sdfghjk', '', '', 'helping-Key', '6', '3600', '', 'FEELSAFEAT600', '70', 'Tue, 23 Jun 2020 17:23:59 +0530', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.10', 'paid', 'pay_F63YJxI9COHCN4');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'Sharangopal36@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9');

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
(8, 'Test', 'kalravinayak07@gmail.com', '9530512748', '2af8a9104b3f64ed640d8c7e298d2d480f03a3610cbc2b33474321ec59024a48592ea8545e41e09d5d1108759df48ede0054f225df39d4f0f312450e0aa9dd25', '3250abb29c615dc3bcb850d870efeeaa', 5, 1, 0.2, '::1', 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36', 'Wed, 17 Jun 2020 22:00:17 +0530'),
(10, 'Test', 'royalknights07@gmail.com', '09530512748', 'a882f0ac848b0b6b4ca7b42bfa1d266afd0ddeba9204ae57a984a69376d59816b1ef3f4d442ea8a70396067ff5b70e0ae8eab3935b617b8e366d8e35c3bfe14c', '825b7430cf61647123594f357e5f935d', 0, 0, 0.3, '::1', 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Mobile Safari/537.36', 'Wed, 06 May 2020 17:55:52 +0530'),
(11, 'Sharan Gopal', 'DSADAS@SDAD.VOM', '1234567890', '8b2313e7634338df3137073e4274e31dd76cc580e85785b5d937f845a7a524e4ef24792af4df56b231650809e7af20d86048ceacee4d70fcbc63d6f2412b6f36', '3273908b61d285d31cb89c6bed7650cf', 0, 0, 0.3, '::1', 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36', 'Wed, 17 Jun 2020 23:44:38 +0530');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_quote`
--
ALTER TABLE `company_quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `company_quote`
--
ALTER TABLE `company_quote`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_razorpay`
--
ALTER TABLE `orders_razorpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webinar_signup_affiliate`
--
ALTER TABLE `webinar_signup_affiliate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
