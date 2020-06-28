-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 10:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `sample_record`
--

CREATE TABLE `sample_record` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `pdf` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sample_record_log`
--

CREATE TABLE `sample_record_log` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL,
  `tags` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `loginCount` smallint(6) DEFAULT NULL,
  `subs_end_date` date DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_manager` tinyint(1) NOT NULL DEFAULT 0,
  `is_order` int(11) NOT NULL,
  `is_bar` tinyint(1) NOT NULL DEFAULT 0,
  `is_kitchen` tinyint(1) NOT NULL DEFAULT 0,
  `is_display` tinyint(1) NOT NULL DEFAULT 0,
  `is_serve` tinyint(1) NOT NULL DEFAULT 0,
  `no_of_screen_allowed` smallint(6) NOT NULL,
  `no_of_screen_used` smallint(6) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `name`, `contact`, `email`, `loginCount`, `subs_end_date`, `is_admin`, `is_manager`, `is_order`, `is_bar`, `is_kitchen`, `is_display`, `is_serve`, `no_of_screen_allowed`, `no_of_screen_used`, `is_active`) VALUES
(1, '', '1234567890', NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(2, 'Vishal', '8989829920', 'vishalshrivas@pageupsoft.com', 0, '2021-05-19', 1, 1, 1, 1, 1, 1, 1, 15, 1, 1),
(3, 'df', '', '', 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(4, 'df', '', '', 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(5, 'df', '', '', 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(6, 'df', '', '', 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(7, 'df', '', '', 0, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(8, 'abc', '1234567890', 'abc@gmail.com', 5, '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 5, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sample_record`
--
ALTER TABLE `sample_record`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sample_record_log`
--
ALTER TABLE `sample_record_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sample_record_log`
--
ALTER TABLE `sample_record_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
