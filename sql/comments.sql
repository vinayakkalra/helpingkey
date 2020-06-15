-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 07:31 PM
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
-- Database: `thetopcontroller`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
