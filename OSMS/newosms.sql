-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 10:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newosms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Pradeep', 'pradeep@osms.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `assets_tb`
--

CREATE TABLE `assets_tb` (
  `pid` int(11) NOT NULL,
  `pname` varchar(60) COLLATE utf8_bin NOT NULL,
  `pdop` date NOT NULL,
  `pava` int(11) NOT NULL,
  `ptotal` int(11) NOT NULL,
  `poriginalcost` int(11) NOT NULL,
  `psellingcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assets_tb`
--

INSERT INTO `assets_tb` (`pid`, `pname`, `pdop`, `pava`, `ptotal`, `poriginalcost`, `psellingcost`) VALUES
(2, 'Keyboard', '2022-07-05', 3, 5, 200, 500),
(3, 'Mic', '2022-07-05', 2, 4, 200, 300),
(4, 'Mother Board', '2022-09-06', 14, 30, 15000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `request_date` date NOT NULL,
  `assign_tech` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `request_date`, `assign_tech`, `assign_date`) VALUES
(2, 4, 'Mobile is not working', 'Mobile is not working i dont know why', 'Rani', 'Ranibagh', 'Address line something', 'Ranchi', 'Jh', 456787, 'user@osms.com', 98456653, '0000-00-00', 'Raja', '2022-07-07'),
(8, 9, 'For mouse', 'Buy new mouse', 'Sonam', 'Gorakhpur', 'UP', 'Gorakhpur', 'UP', 273401, 'sonam@osms.com', 38724759, '0000-00-00', 'Sonam', '2022-08-02'),
(9, 10, 'Mouse', 'New mouse', 'Sonam', 'Khorabar', 'Near MMM', 'Gorakhpur', 'UP', 273001, 'sonam@osms.com', 8965456, '0000-00-00', 'Pm', '2022-08-02'),
(12, 11, 'Some problem in projector.', ' Projector does not turn on.', 'User', 'Gorakhpur', 'Near MMM', 'Gorakhpur', 'UP', 273010, 'user@osms.com', 1234567890, '0000-00-00', 'Raja', '2022-09-17'),
(13, 12, 'Camera Problem.', 'Some time camera is not working properly.', 'User', 'Kauriram', 'Near RPM School', 'Gorakhpur', 'UP', 273403, 'user@osms.com', 1234567890, '0000-00-00', 'Pm', '2022-09-16'),
(15, 15, 'Test2', 'Testing phase 2', 'Pradeep', 'Lko', 'Lko', 'Lucknow', 'UP', 274010, 'pradeep@osms.com', 9695437614, '2022-09-22', 'Pm', '2022-09-22'),
(16, 7, 'for tab', 'want to buy new tab', 'Pradeep', 'house no 580', 'Gorakhpur', 'Gorakhpur', 'UP', 273401, 'pmpradeep2812@gmail.com', 9695437614, '2022-07-29', 'Raja', '2022-09-22'),
(17, 16, 'System does not connect to wifi.', 'Wifi driver is missing.', 'Aditya', 'Kauriram', 'Gorakhpur', 'Gorakhpur', 'UP', 273403, 'aditya@osms.com', 1234567890, '2022-10-01', 'Pm', '2022-09-27'),
(18, 7, 'for tab', 'want to buy new tab', 'Pradeep', 'house no 580', 'Gorakhpur', 'Gorakhpur', 'UP', 273401, 'pmpradeep2812@gmail.com', 9695437614, '2022-07-29', 'Raja', '2022-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `custid` int(11) NOT NULL,
  `custname` varchar(60) COLLATE utf8_bin NOT NULL,
  `custadd` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpquantity` int(11) NOT NULL,
  `cpeach` int(11) NOT NULL,
  `cptotal` int(11) NOT NULL,
  `cpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`custid`, `custname`, `custadd`, `cpname`, `cpquantity`, `cpeach`, `cptotal`, `cpdate`) VALUES
(1, 'Rohan', 'Kolkata', 'Keyboard', 2, 3000, 6000, '2022-07-05'),
(2, 'Pradeep', 'Gorakhpur', 'Mic', 2, 300, 500, '2022-08-01'),
(3, 'Aditya', 'Gorakhpur', 'Mother Board', 3, 20000, 60000, '2022-09-20'),
(4, 'Mukesh', 'Gorakhpur', 'Mother Board', 1, 20000, 22000, '2022-09-22'),
(5, 'zzz', 'gkp', 'Mother Board', 2, 20000, 41000, '2022-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_tb`
--

CREATE TABLE `requesterlogin_tb` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requesterlogin_tb`
--

INSERT INTO `requesterlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(9, 'User', 'user@osms.com', '123456'),
(10, 'John', 'john@osms.com', '123456'),
(11, 'Sumit', 'sumit@osms.com', '123456'),
(14, 'New User', 'newuser@osms.com', '123456'),
(15, 'Pradeep', 'pradeep@osms.com', 'Pradeep'),
(18, 'Sandeep', 'sandeep@osms.com', '123456'),
(19, 'Sm', 'sm@osms.com', '123456'),
(20, 'Aditya', 'aditya@osms.com', 'Aditya@123');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `request_date`) VALUES
(7, 'for tab', 'want to buy new tab', 'Pradeep', 'house no 580', 'Gorakhpur', 'Gorakhpur', 'UP', 273401, 'pmpradeep2812@gmail.com', 9695437614, '2022-07-29'),
(8, 'Check', 'check admin dashboard', 'Abc', 'Basti', 'UP', 'Basti', 'UP', 157718, 'abc@osms.com', 7763483435, '2022-08-01'),
(9, 'For mouse', 'Buy new mouse', 'Sonam', 'Gorakhpur', 'UP', 'Gorakhpur', 'UP', 273401, 'sonam@osms.com', 38724759, '2022-08-02'),
(11, 'Some problem in projector.', ' Projector does not turn on.', 'User', 'Gorakhpur', 'Near MMM', 'Gorakhpur', 'UP', 273010, 'user@osms.com', 1234567890, '2022-09-19'),
(12, 'Camera Problem.', 'Some time camera is not working properly.', 'User', 'Kauriram', 'Near RPM School', 'Gorakhpur', 'UP', 273403, 'user@osms.com', 1234567890, '2022-09-22'),
(13, 'Hanging Problem', 'My system take too much time to boot and also face hanging problem.', 'Pradeep', 'Gorakhpur', 'Near MMM', 'Gorakhpur', 'UP', 273010, 'pradeep@osms.com', 9695437614, '2022-09-24'),
(14, 'Test', 'Testing phase', 'Pradeep', 'Basti', 'UP', 'Basti', 'UP', 273400, 'pradeep@osms.com', 1234567890, '2022-09-24'),
(15, 'Test2', 'Testing phase 2', 'Pradeep', 'Lko', 'Lko', 'Lucknow', 'UP', 274010, 'pradeep@osms.com', 9695437614, '2022-09-22'),
(16, 'System does not connect to wifi.', 'Wifi driver is missing.', 'Aditya', 'Kauriram', 'Gorakhpur', 'Gorakhpur', 'UP', 273403, 'aditya@osms.com', 1234567890, '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `empid` int(11) NOT NULL,
  `empName` varchar(60) COLLATE utf8_bin NOT NULL,
  `empCity` varchar(60) COLLATE utf8_bin NOT NULL,
  `empMobile` bigint(20) NOT NULL,
  `empEmail` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`empid`, `empName`, `empCity`, `empMobile`, `empEmail`) VALUES
(2, 'Pradeep', 'Gorakhpur', 9695437614, 'pradeep@osms.com'),
(3, 'Raja', 'Kolkata', 999111, 'raja@osms.com'),
(4, 'Pm', 'Gorakhpur', 9695437614, 'pm@osms.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `assets_tb`
--
ALTER TABLE `assets_tb`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets_tb`
--
ALTER TABLE `assets_tb`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
