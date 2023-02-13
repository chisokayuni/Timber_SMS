-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2023 at 02:12 AM
-- Server version: 10.3.37-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lilygoki_abusai_db_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bluegam`
--

CREATE TABLE `bluegam` (
  `id` int(11) NOT NULL,
  `sizes` varchar(100) NOT NULL,
  `order_price` int(11) NOT NULL,
  `total_order_price` int(11) NOT NULL DEFAULT 0,
  `selling_price` int(11) NOT NULL,
  `total_selling_price` int(11) NOT NULL DEFAULT 0 COMMENT 'Totals after selling',
  `quantity` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bluegam`
--

INSERT INTO `bluegam` (`id`, `sizes`, `order_price`, `total_order_price`, `selling_price`, `total_selling_price`, `quantity`, `date_added`) VALUES
(7, '2x6', 9000, 4905000, 11000, 5995000, 545, '2023-02-09'),
(8, '2x4', 5500, 1237500, 8000, 1800000, 225, '2023-02-07'),
(9, '1x6', 4500, 270000, 7500, 450000, 60, '2023-02-07'),
(10, '1x8', 9000, 126000, 11000, 154000, 14, '2023-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `pine`
--

CREATE TABLE `pine` (
  `id` int(11) NOT NULL,
  `sizes` varchar(100) NOT NULL,
  `order_price` int(11) NOT NULL,
  `total_order_price` int(11) NOT NULL DEFAULT 0,
  `selling_price` int(11) NOT NULL,
  `total_selling_price` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pine`
--

INSERT INTO `pine` (`id`, `sizes`, `order_price`, `total_order_price`, `selling_price`, `total_selling_price`, `quantity`, `date_added`) VALUES
(10, '2x6', 11000, 2068000, 12500, 2350000, 188, '2023-02-07'),
(12, '1x8', 11000, 1474000, 12500, 1675000, 134, '2023-02-07'),
(13, '2x4', 7000, 0, 9000, 0, 0, '2023-02-03'),
(14, '1x6', 5500, 0, 8000, 0, 0, '2023-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_timber`
--

CREATE TABLE `rejected_timber` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `sizes` varchar(100) NOT NULL,
  `order_price` int(11) NOT NULL,
  `total_order_price` int(11) NOT NULL DEFAULT 0,
  `selling_price` int(11) NOT NULL,
  `total_selling_price` int(11) NOT NULL DEFAULT 0,
  `rejection_reason` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rejected_timber`
--

INSERT INTO `rejected_timber` (`id`, `type`, `sizes`, `order_price`, `total_order_price`, `selling_price`, `total_selling_price`, `rejection_reason`, `quantity`, `date_added`) VALUES
(4, 'Bluegam', '2x6', 9000, 0, 10000, 0, 'cracks', 157, '2023-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `type_of_timber` varchar(100) NOT NULL,
  `sizes` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount_per_item` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `date_of_sale` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `type_of_timber`, `sizes`, `quantity`, `amount_per_item`, `total_amount`, `date_of_sale`) VALUES
(25, 'Bluegam', '2x6', 150, 11000, 1650000, '2023-01-31'),
(26, 'Bluegam', '2x4', 35, 8000, 280000, '2023-01-31'),
(27, 'Bluegam', '1x6', 2, 7500, 15000, '2023-01-31'),
(28, 'Pine', '2x6', 11, 12500, 137500, '2023-02-01'),
(29, 'Bluegam', '2x6', 17, 11000, 187000, '2023-02-01'),
(30, 'Bluegam', '2x4', 8, 8000, 64000, '2023-02-01'),
(31, 'Bluegam', '1x6', 22, 7500, 165000, '2023-02-01'),
(32, 'Bluegam', '2x4', 3, 8000, 24000, '2023-02-03'),
(33, 'Bluegam', '2x6', 2, 11000, 22000, '2023-02-06'),
(34, 'Bluegam', '2x4', 1, 8000, 8000, '2023-02-06'),
(35, 'Bluegam', '2x6', 4, 11000, 44000, '2023-02-07'),
(36, 'Pine', '2x6', 5, 12500, 62500, '2023-02-07'),
(37, 'Pine', '2x6', 5, 12500, 62500, '2023-02-08'),
(38, 'Bluegam', '2x6', 1, 11000, 11000, '2023-02-09'),
(39, 'Bluegam', '2x6', 28, 11000, 308000, '2023-02-11'),
(40, 'Bluegam', '1x6', 1, 7500, 7500, '2023-02-11'),
(41, 'Bluegam', '2x6', 1, 11000, 11000, '2023-02-11'),
(42, 'Bluegam', '2x4', 1, 8000, 8000, '2023-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'abusai', 'abusai@2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bluegam`
--
ALTER TABLE `bluegam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pine`
--
ALTER TABLE `pine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejected_timber`
--
ALTER TABLE `rejected_timber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bluegam`
--
ALTER TABLE `bluegam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pine`
--
ALTER TABLE `pine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rejected_timber`
--
ALTER TABLE `rejected_timber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
