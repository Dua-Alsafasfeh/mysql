-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 02:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tables_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `account-id` int(10) NOT NULL,
  `account-type` text NOT NULL,
  `customer-id` int(10) NOT NULL,
  `account-status` text NOT NULL,
  `account-activation-date` date NOT NULL,
  `total-balance` decimal(10,0) NOT NULL,
  `created-at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated-at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer-id` int(10) NOT NULL,
  `customer-name` text NOT NULL,
  `customer-birthdate` date NOT NULL,
  `street` varchar(10) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `pin-code` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(14) NOT NULL,
  `created-at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated-at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `preferred-customer-info`
--

CREATE TABLE `preferred-customer-info` (
  `rel-manager-id` int(10) NOT NULL,
  `customer-id` int(10) NOT NULL,
  `created-at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated-at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `relationship-manager-info`
--

CREATE TABLE `relationship-manager-info` (
  `rel-manager-id` int(10) NOT NULL,
  `rel-manager-name` text NOT NULL,
  `bank-branch` text NOT NULL,
  `pin-code` int(10) NOT NULL,
  `email` varchar(10) NOT NULL,
  `phone` int(15) NOT NULL,
  `created-at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated-at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`account-id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer-id`);

--
-- Indexes for table `relationship-manager-info`
--
ALTER TABLE `relationship-manager-info`
  ADD PRIMARY KEY (`rel-manager-id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `account-id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `customer-id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relationship-manager-info`
--
ALTER TABLE `relationship-manager-info`
  MODIFY `rel-manager-id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
