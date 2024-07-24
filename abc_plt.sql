-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 05:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc_plt`
--

-- --------------------------------------------------------

--
-- Table structure for table `normal_admin`
--

CREATE TABLE `normal_admin` (
  `aId` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `normal_admin`
--

INSERT INTO `normal_admin` (`aId`, `name`, `email`, `number`, `password`) VALUES
(3, 'Visura Malawara Aarchchi', 'visuraima@gmail.com', 702028303, '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'pasan', 'pasan@gmail.com', 123456789, '7bfffb47b36e7678a3d7680b7b2b6bf0'),
(10, 'kamal', 'kamal@gmail.com', 123455789, 'aa63b0d5d950361c05012235ab520512');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `pId` int(100) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `pPrice` int(255) NOT NULL,
  `pQuantity` int(255) NOT NULL,
  `pDescription` varchar(255) NOT NULL,
  `pImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`pId`, `pName`, `pPrice`, `pQuantity`, `pDescription`, `pImg`) VALUES
(14, 'Treadmil', 100000, 1, 'Acer Model 1.2', '5.jpg'),
(15, 'Commercial Equipment', 20000, 1, 'Life Core Model 3.1', '7.jpeg'),
(16, 'Supplement', 30000, 5, 'Gold standard whey', '2.jpg'),
(17, 'Gym Bottle', 3000, 10, ' Atlas Water Bottle GYM FIT 750ml', '1.jpg'),
(18, 'Seated Row', 250000, 3, 'TRUE Model 2.0', '3.jpg'),
(19, 'Gym Cycle', 90000, 4, 'Model 4.1 Accer', '10.jpg'),
(20, 'In Line Bencher', 150000, 2, 'Model 3.3', '6.jpg'),
(21, 'Gym Roller', 200000, 10, 'Accer Gym Roller', '4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `sid` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`sid`, `name`, `email`, `number`, `password`) VALUES
(3, 'Visura Malawara Aarchchi', 'visuraima@gmail.com', 702028303, '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `uId` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(255) NOT NULL,
  `epassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`uId`, `name`, `email`, `number`, `epassword`) VALUES
(7, 'Visura Malawara Aarchchi', 'visuraima@gmail.com', 702028303, '827ccb0eea8a706c4c34a16891f84e7b'),
(9, 'saman', 'saman@gmail.com', 767189923, '154764725b4bf51b66df135acefa985f'),
(10, 'pasan', 'pasan@gmail.com', 123456789, '7bfffb47b36e7678a3d7680b7b2b6bf0'),
(14, 'abcd', 'abcd@gmail.com', 767189923, 'e2fc714c4727ee9395f324cd2e7f331f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `normal_admin`
--
ALTER TABLE `normal_admin`
  ADD PRIMARY KEY (`aId`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`uId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `normal_admin`
--
ALTER TABLE `normal_admin`
  MODIFY `aId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `pId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `sid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `uId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
