-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 02:47 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epayments`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `contact` varchar(16) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`contact`, `password`) VALUES
('1234567890', '1234567890'),
('8076187250', 'abhi9121998'),
('8700301589', 'simran@158'),
('8700654001', 'ri9968804890swa'),
('9711495489', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `sender_name` varchar(50) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `amount` double NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`sender_id`, `receiver_id`, `sender_name`, `receiver_name`, `timestamp`, `amount`, `transaction_id`, `comment`) VALUES
(6, 0, 'Abhishek Sharma', 'Admin', '2020-11-29 09:25:09', 2, 7, 'Service Charge'),
(NULL, 6, 'Bank', 'Abhishek Sharma', '2020-11-29 09:25:09', 98, 8, 'Rupees 98/- added to your wallet'),
(6, NULL, 'Abhishek Sharma', 'BOB', '2020-11-29 09:25:59', 50, 9, 'chicken'),
(6, 0, 'Abhishek Sharma', 'Admin', '2020-11-29 09:25:59', 1, 10, 'Service Charge'),
(6, NULL, 'Abhishek Sharma', 'BOB', '2020-11-29 09:31:35', 48, 11, 'LIC'),
(6, 0, 'Abhishek Sharma', 'Admin', '2020-11-29 09:31:35', 0.96, 12, 'Service Charge'),
(NULL, 7, 'Bank', 'Simran Sharma', '2020-11-29 10:58:01', 1500, 13, 'Rupees 1500/- added to your wallet'),
(7, 6, 'Simran Sharma', 'Abhishek Sharma', '2020-11-29 11:00:08', 500, 14, ''),
(6, NULL, 'Abhishek Sharma', 'BOB', '2020-11-29 11:02:53', 98, 15, 'LIC'),
(6, 0, 'Abhishek Sharma', 'Admin', '2020-11-29 11:02:53', 2, 16, 'Service Charge'),
(NULL, 8, 'Bank', 'Ankush Khanna', '2020-11-29 13:20:48', 254.45, 17, 'Rupees 254.45/- added to your wallet'),
(8, NULL, 'Ankush Khanna', 'BOB', '2020-11-29 13:22:19', 98, 18, 'fee'),
(8, 0, 'Ankush Khanna', 'Admin', '2020-11-29 13:22:19', 2, 19, 'Service Charge'),
(8, 6, 'Ankush Khanna', 'Abhishek Sharma', '2020-11-29 13:25:13', 20, 20, 'cash'),
(NULL, 9, 'Bank', 'Riya Swami', '2021-09-27 23:17:14', 1000000, 21, 'Rupees 1000000/- added to your wallet'),
(9, NULL, 'Riya Swami', 'BOB', '2021-09-27 23:24:38', 1.96, 22, 'itna hi milega'),
(9, 0, 'Riya Swami', 'Admin', '2021-09-27 23:24:38', 0.04, 23, 'Service Charge'),
(9, 9, 'Riya Swami', 'Riya Swami', '2021-09-27 23:27:39', 2, 24, 'itna hi milega'),
(9, 5, 'Riya Swami', 'Raj Kumar Rao', '2021-09-28 17:45:37', 100, 25, 'money');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `contact` varchar(16) NOT NULL,
  `address` varchar(50),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`first_name`, `middle_name`, `last_name`, `contact`, `user_id`) VALUES
('Raj', 'Kumar', 'Rao', '9711495489', 5),
('Abhishek', '', 'Sharma', '8076187250', 6),
('Simran', '', 'Sharma', '8700301589', 7),
('Ankush', '', 'Khanna', '1234567890', 8),
('Riya', '', 'Swami', '8700654001', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet`
--

CREATE TABLE `user_wallet` (
  `user_id` int(11) NOT NULL,
  `wallet_balance` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_wallet`
--

INSERT INTO `user_wallet` (`user_id`, `wallet_balance`) VALUES
(5, 100),
(6, 420),
(7, 1000),
(8, 134.45),
(9, 999898);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD PRIMARY KEY (`contact`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD KEY `contact_2` (`contact`);

--
-- Indexes for table `user_wallet`
--
ALTER TABLE `user_wallet`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD CONSTRAINT `login_credentials_ibfk_1` FOREIGN KEY (`contact`) REFERENCES `user_details` (`contact`);

--
-- Constraints for table `user_wallet`
--
ALTER TABLE `user_wallet`
  ADD CONSTRAINT `user_wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
