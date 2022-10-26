-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql112.epizy.com
-- Generation Time: Oct 26, 2022 at 12:55 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sakura_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cat_id`, `cat_name`) VALUES
(11, 'Sushi'),
(12, '20 Pieces'),
(13, 'Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`product_id`, `cat_id`, `product_name`) VALUES
(12, 20, '20 Crab'),
(17, 11, 'Crab'),
(18, 12, 'Californi'),
(19, 11, '20 Crab');

-- --------------------------------------------------------

--
-- Table structure for table `store_details`
--

CREATE TABLE `store_details` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_num` bigint(20) NOT NULL,
  `created_on` varchar(200) NOT NULL,
  `updated_on` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_details`
--

INSERT INTO `store_details` (`store_id`, `store_name`, `store_num`, `created_on`, `updated_on`) VALUES
(3, 'store 1', 7778881, '27-Sep-22', '27-Sep-22 04:48 pm'),
(4, 'store 2', 7778882, '27-Sep-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `update_quantity`
--

CREATE TABLE `update_quantity` (
  `id` int(11) NOT NULL,
  `store_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `submit_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update_quantity`
--

INSERT INTO `update_quantity` (`id`, `store_id`, `product_id`, `quantity`, `submit_date`) VALUES
(103, '7778882', 19, 1, '2022-10-23'),
(104, '7778882', 18, 3, '2022-10-23'),
(105, '7778882', 17, 0, '2022-10-23'),
(106, '7778881', 19, 4, '2022-10-24'),
(107, '7778881', 18, 5, '2022-10-24'),
(108, '7778881', 17, 3, '2022-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `user_level`, `created_on`, `updated_on`) VALUES
(2, 'admin', 'admin', 'Admin', 'super_admin', NULL, NULL),
(9, '7778881', NULL, 'Store 1', 'store', '30-Sep-22', '30-Sep-22 11:00 pm'),
(10, '7778882', NULL, 'store 2', 'store', '30-Sep-22', '01-Oct-22 12:31 am'),
(11, '7778883', NULL, 'store 3', 'store', '30-Sep-22', '01-Oct-22 12:31 am'),
(12, '7778884', NULL, 'store 4', 'store', '30-Sep-22', '01-Oct-22 12:31 am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `store_details`
--
ALTER TABLE `store_details`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `update_quantity`
--
ALTER TABLE `update_quantity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `store_details`
--
ALTER TABLE `store_details`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `update_quantity`
--
ALTER TABLE `update_quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
