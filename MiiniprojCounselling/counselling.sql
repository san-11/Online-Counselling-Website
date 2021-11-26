-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 09:32 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `counselling`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `tele` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `counsellers`
--

CREATE TABLE `counsellers` (
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `country` text NOT NULL,
  `contact` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coun_req`
--

CREATE TABLE `coun_req` (
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `country` varchar(20) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coun_req`
--

INSERT INTO `coun_req` (`first_name`, `last_name`, `email`, `country`, `contact`) VALUES
('abc', 'xyz', 'xyz@gmail.com', 'India', 1234567654),
('abc', 'xyz', 'abc@gmail.com', 'India', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE `invite` (
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `telephone` int(10) NOT NULL,
  `location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `birthday` date NOT NULL,
  `telephone` int(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`first_name`, `last_name`, `email`, `birthday`, `telephone`, `country`, `user_name`, `password`, `member_id`) VALUES
('sanika', 'acharya', 'sanika@gmail.com', '2001-06-11', 1234567889, 'India', 'sanika11', 'sanika123', 1),
('abc', 'acharya', 'abc@gmail.com', '2021-08-03', 2147483647, 'India', 'sanika11', 'sanika11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `name` text NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` int(10) NOT NULL,
  `skype_id` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`name`, `age`, `email`, `contact`, `skype_id`, `date`) VALUES
('abc', 20, 'abc@gmail.com', 2147483647, '', '2021-08-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coun_req`
--
ALTER TABLE `coun_req`
  ADD PRIMARY KEY (`contact`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
