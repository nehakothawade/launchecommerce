-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 12:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `f_name`, `l_name`, `username`, `email`, `mobile`, `password`, `token`, `created_at`, `updated_at`) VALUES
(8, 'Lalita', 'Kothawade', 'lalita_92', 'lalitarkothawade68@gmail.com', '8987898767', '23f9a35493a6b3c664faf22edfa85e10', '9687166a381a885cc849c12ccfa434', '2022-04-14 08:28:27', '2022-04-14 08:28:27'),
(9, 'saurabh', 'kothawade', 'saurabh_92', 'saurabhkothawade671@gmail.com', '8987678765', '6c1e121286c974773703c06754a3f01f', 'e67c8982505905f279d7bf3f6e6c53', '2022-04-16 08:18:21', '2022-04-16 08:18:21'),
(19, 'Neha', 'Kothawade', 'Admin', 'nehakothawade671@gmail.com', '9423735245', '0e7517141fb53f21ee439b355b5a1d0a', '3b45e20bd842f34e3908ace2540184', '2022-05-14 07:21:53', '2022-05-14 07:21:53'),
(20, 'Neha', 'Kothawade', 'neha_92', 'harryden@gmail.com', '9423735245', 'f3de5e16d00fe7056839f6018f1f52ca', '52f920f26314a5be62719b8efdb063', '2022-05-14 12:00:01', '2022-05-14 12:00:01'),
(21, 'Shivani', 'paithane', 'shivani_48', 'shivanipaithane@gmail.com', '9809890987', '9e3ddfc90fba4ecb3053d890734da919', '975aa1589f13557aa424fa8e344322', '2022-05-26 05:42:38', '2022-05-26 05:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Id` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `File` varbinary(100) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Id`, `email`, `address`, `city`, `pincode`, `File`, `orderdate`) VALUES
(1, 'nehakothawade671@gmail.com', 'Near Makhamalabad Road, Panchavati.', 'Nashik', 422003, '', '2022-05-26 05:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `P_id` int(10) NOT NULL,
  `P_title` varchar(60) DEFAULT NULL,
  `P_price` float DEFAULT NULL,
  `P_image` varbinary(100) DEFAULT NULL,
  `P_quantity` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`P_id`, `P_title`, `P_price`, `P_image`, `P_quantity`) VALUES
(1, 'Sabudana Potato Chakali', 55, 0x3631502e6a7067, 35),
(2, 'Rice Papad', 110, 0x313130502e6a7067, 41),
(3, 'Kala Masala', 145, 0x3330502e6a7067, 29),
(4, 'Wheat Kurdai', 130, 0x3530502e6a7067, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`P_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `P_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
