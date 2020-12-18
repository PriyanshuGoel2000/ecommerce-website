-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 07:50 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `serial` int(3) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`serial`, `image`, `name`, `qty`, `price`, `user`) VALUES
(1, 'image', 'design1', 1, 100, ''),
(2, 'image2', 'design2', 1, 500, ''),
(13, '2.jpg', 'D001', 1, 800, ''),
(15, '3.jpg', 'C002', 1, 800, ''),
(71, '3.jpg', 'C002', 1, 800, 'test1@gmail.com'),
(128, '', '', 52, 0, ''),
(147, '4.jpg', 'C003', 2, 800, 'test@gmail.com'),
(157, '5.jpg', 'C001', 3, 800, 'test@gmail.com'),
(158, '10.jpg', 'C005', 1, 800, 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(4) NOT NULL,
  `name` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `tag` varchar(4) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id`, `name`, `image`, `tag`, `Price`) VALUES
(3, 'Classical', '5.jpg', 'C001', 800),
(4, 'Broken Mirror', '2.jpg', 'D001', 800),
(5, 'Classical Shades', '3.jpg', 'C002', 800),
(6, 'Classical Mirror', '4.jpg', 'C003', 800),
(7, 'Classical Vines', '9.jpg', 'C004', 800),
(8, 'Classical Vines', '10.jpg', 'C005', 800),
(9, 'Dark', '11.jpg', 'D002', 800),
(11, 'Dark', '12.jpg', 'D003', 800),
(12, 'Classical Shades', '8.jpg', 'C006', 800),
(13, 'Symmetric Arrow', '6.jpg', 'S001', 800),
(14, 'Symmetric Maze', '14.jpg', 'S002', 800),
(15, 'Symmetric Inverted Arrow', '13.jpg', 'S003', 800);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `email`, `password`, `contact`, `fullname`, `course`, `year`) VALUES
(12, 'mannu', 'mansha@gmail.com', '8130', '9876543210', 'Mannu', 'B.tech(CSE)', 1),
(13, 'tannu', 'tanishka_bhatia@yahoo.com', '8130', '5626495563', 'Tannu', 'B.tech(CSE)', 1),
(14, 'tanishka21', 'tanishka21bhatia@gmail.com', '8130', '8882141024', 'Tanishka', 'B.tech(CSE)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `FName` text CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `LName` text CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `Email` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `Pass` varchar(30) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `DOB` date NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `Address` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `City` varchar(30) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `Pin` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`FName`, `LName`, `Email`, `Pass`, `DOB`, `Phone`, `Address`, `City`, `Pin`) VALUES
('test ', 'test ', 'test@gmail.com ', 'asd', '2000-02-02', 1324657980, 'test ', 'test ', 132465),
('test ', 'test ', ' ', 'qwe', '2020-02-02', 1324657980, 'test ', '132465 ', 0),
('keshu ', 'goel ', 'keshu@gmail.com ', 'asd', '2020-02-02', 1324657980, 'test ', '132465 ', 0),
('keshu ', 'goel ', 'keshug@gmail.com ', 'asd', '2020-02-02', 1324657980, 'test ', 'test ', 132465);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `serial` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
