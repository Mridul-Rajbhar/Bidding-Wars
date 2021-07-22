-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2021 at 08:08 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16328974_bidding_wars`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Sr_No` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `queries` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `name_product` varchar(100) NOT NULL,
  `info_product` varchar(1000) NOT NULL,
  `type_product` varchar(100) NOT NULL,
  `upload_product` mediumblob NOT NULL,
  `date` date NOT NULL,
  `Hours` text NOT NULL,
  `Minutes` text NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `status` varchar(50) DEFAULT 'available',
  `people_joined_bid` int(20) NOT NULL DEFAULT 0,
  `seller_name` varchar(500) NOT NULL,
  `baseID` int(10) NOT NULL,
  `Username1` varchar(50) DEFAULT NULL,
  `Username2` varchar(50) DEFAULT NULL,
  `Username3` varchar(50) DEFAULT NULL,
  `Username4` varchar(50) DEFAULT NULL,
  `Username5` varchar(50) DEFAULT NULL,
  `Username6` varchar(50) DEFAULT NULL,
  `Username7` varchar(50) DEFAULT NULL,
  `Username8` varchar(50) DEFAULT NULL,
  `Username9` varchar(50) DEFAULT NULL,
  `Username10` varchar(50) DEFAULT NULL,
  `winner` varchar(50) DEFAULT NULL,
  `Highest_Bid` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `uname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `room_no` varchar(100) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `station` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD UNIQUE KEY `Sr_No` (`Sr_No`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `uname` (`email`),
  ADD UNIQUE KEY `uname_2` (`uname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
