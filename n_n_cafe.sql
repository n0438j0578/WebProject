-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 06:23 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n&n_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `des` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `des`, `img`) VALUES
(8, 'Pomegranate Juice', 50, '', '/OnlineStore/food/Pomegranate Juice.jpg'),
(9, 'AmericanBurger', 75, '', '/OnlineStore/food/AmericanBurger.jpg'),
(10, 'Maccaroni Cheese Spring Roll', 65, 'des', '/OnlineStore/food/Maccaroni Cheese Spring Roll.jpg'),
(11, 'Cheesy Baked', 120, '', '/OnlineStore/food/Cheesy Baked.jpeg'),
(12, 'Fried Wings And Shrimp', 95, '', '/OnlineStore/food/Fried Wings And Shrimp.jpg'),
(13, 'Berry Cheese Pie', 80, '', '/OnlineStore/food/Berry Cheese Pie.jpg'),
(14, 'Banoffee Pie', 65, '', '/OnlineStore/food/Banoffee Pie.jpg'),
(15, 'Strawberry Cake Roll', 75, '', '/OnlineStore/food/Strawberry Cake Roll.jpg'),
(16, 'Raspberry Cheese Cake', 50, '', '/OnlineStore/food/Raspberry Cheese Cake.jpg'),
(19, 'Chamomile Tea', 45, '', '/OnlineStore/food/Chamomile Tea.jpg'),
(20, 'Lemon Iced Tea', 40, '', '/OnlineStore/food/Lemon Iced Tea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `status`) VALUES
(1, 'Nuttapol Phongudom', 'nut', '12345', 'admin'),
(2, 'Pawan', 'nont', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
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
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
