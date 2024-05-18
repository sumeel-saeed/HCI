-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 11:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeemanagement`
--

CREATE TABLE `employeemanagement` (
  `staff_id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `StaffRole` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeemanagement`
--

INSERT INTO `employeemanagement` (`staff_id`, `FirstName`, `LastName`, `Address`, `Email`, `Password`, `StaffRole`) VALUES
(1, 'ss', 'ee', '23,hh', 'd@g.com', 'wwww', 'cook'),
(2, 'SS', 'RR', '34,UG', 'S@N.COM', 'SSSS', 'cook'),
(3, 's', 's', '23,dd', 's@f', 'ss', 'xxx'),
(5, 'f', 's', '2,ff', 's@h', '3333', 'fff'),
(6, 'SS', 'S', 'D,FF', 'D@G.COM', '1234', 'COOK'),
(8, 'd', 'd', '2,mm', 'd@', '8877', 'g'),
(9, 'ss', 'ff', '34,pjh', 's@m', 'dd', 'ww');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `ordername` varchar(50) NOT NULL,
  `orderprice` int(11) NOT NULL,
  `orderdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `ordername`, `orderprice`, `orderdate`) VALUES
(5, '', 0, '0000-00-00'),
(6, 'dd', 34, '0000-00-00'),
(7, 'dd', 34, '0000-00-00'),
(8, '', 0, '0000-00-00'),
(18, 'DD', 89, '0000-00-00'),
(19, 'pizza', 10, '2023-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `price`) VALUES
(2, 'gf', 56),
(3, 'ww', 674),
(5, 'd', 21),
(7, 'rr', 67),
(8, 'ee', 11),
(9, '', 0),
(10, '', 0),
(11, 'f', 45),
(89, 'f', 1223);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `reportname` varchar(50) NOT NULL,
  `totalsale` int(11) NOT NULL,
  `inventoryvalue` int(11) NOT NULL,
  `reorder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `reportname`, `totalsale`, `inventoryvalue`, `reorder`) VALUES
(4, 'monday report', 1000, 15000, ''),
(5, 'monday report', 1345, 15000, '');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stockname` varchar(50) NOT NULL,
  `stockprice` int(11) NOT NULL,
  `stockquantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stockname`, `stockprice`, `stockquantity`) VALUES
(4, 'rr', 34, 'tt'),
(6, 'pizza', 10, '100'),
(7, 'qq', 23, '1098');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`) VALUES
(4, 'www', 'w@w', '1234', '2024-01-23 12:33:25'),
(5, 'babu', 'b@gmail.com', '1234', '2024-02-15 10:26:03'),
(6, 'sam', 'sam@gmail.com', '16787', '2024-02-15 22:18:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeemanagement`
--
ALTER TABLE `employeemanagement`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeemanagement`
--
ALTER TABLE `employeemanagement`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
