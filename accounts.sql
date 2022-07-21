-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 01:18 PM
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
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `accmoney`
--

CREATE TABLE `accmoney` (
  `indexno` int(11) NOT NULL,
  `accno` bigint(12) NOT NULL,
  `accholdername` varchar(255) NOT NULL,
  `branch_code` int(6) NOT NULL,
  `depositmoney` int(100) NOT NULL,
  `acctype` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accmoney`
--

INSERT INTO `accmoney` (`indexno`, `accno`, `accholdername`, `branch_code`, `depositmoney`, `acctype`) VALUES
(2, 727317, 'Kunal Wagh', 4, 799, 1),
(3, 262678, 'Sahil Bane', 4, 301, 1);

-- --------------------------------------------------------

--
-- Table structure for table `accountholdersinfo`
--

CREATE TABLE `accountholdersinfo` (
  `indexno` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `acc_type` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phoneno` int(10) NOT NULL,
  `aadhar` bigint(15) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `created at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountholdersinfo`
--

INSERT INTO `accountholdersinfo` (`indexno`, `firstname`, `lastname`, `email`, `acc_type`, `address`, `phoneno`, `aadhar`, `city`, `state`, `zipcode`, `created at`) VALUES
(2, 'Kunal', 'Wagh', 'kw@gmail.com', '1', 'andheri', 2147483647, 4543699738786, 'mumbai', 'Choose...', 4723836, '0000-00-00 00:00:00'),
(3, 'Sahil', 'Bane', 'sb@gmail.com', '1', 'Goregaon', 2147483647, 789465415862, 'Mumbai', 'Choose...', 685425, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `indexno` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `sourceacc` int(10) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `destinationacc` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`indexno`, `source`, `sourceacc`, `destination`, `destinationacc`, `amount`, `timestamp`) VALUES
(1, 'Kunal Wagh', 727317, 'Kunal Wagh', 262678, 1, '2022-07-21 01:29:23'),
(2, 'Sahil Bane', 262678, 'Kunal Wagh', 727317, 200, '2022-07-21 01:34:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accmoney`
--
ALTER TABLE `accmoney`
  ADD UNIQUE KEY `indexno` (`indexno`);

--
-- Indexes for table `accountholdersinfo`
--
ALTER TABLE `accountholdersinfo`
  ADD PRIMARY KEY (`indexno`),
  ADD UNIQUE KEY `index` (`indexno`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`indexno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accmoney`
--
ALTER TABLE `accmoney`
  MODIFY `indexno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `accountholdersinfo`
--
ALTER TABLE `accountholdersinfo`
  MODIFY `indexno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `indexno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
