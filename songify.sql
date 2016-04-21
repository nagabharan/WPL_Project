-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 21, 2016 at 05:35 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `songify`
--
CREATE DATABASE IF NOT EXISTS `songify` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `songify`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `name` varchar(60) NOT NULL,
  `artist` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `units` int(5) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `artist`, `price`, `units`, `total`, `date`, `email`) VALUES
(1, '1989', 'Taylor Swift', '9.99', 1, '9.99', '2016-04-17 03:21:41', 'admin@admin.com'),
(2, '1989', 'Taylor Swift', '9.99', 3, '29.97', '2016-04-17 06:40:58', 'nn@gmail.com'),
(3, '1989', 'Taylor Swift', '9.99', 1, '9.99', '2016-04-17 19:25:59', 'nn@gmail.com'),
(4, '1989', 'Taylor Swift', '9.99', 4, '39.96', '2016-04-17 19:27:13', 'admin@admin.com'),
(5, 'Mind of Mine', 'ZAYN', '14.99', 2, '29.98', '2016-04-17 19:31:59', 'admin@admin.com'),
(6, '1989', 'Taylor Swift', '9.99', 1, '9.99', '2016-04-17 19:51:59', 'admin@admin.com'),
(7, 'Mind of Mine', 'ZAYN', '14.99', 1, '14.99', '2016-04-17 19:51:59', 'admin@admin.com'),
(8, 'Mind of Mine', 'ZAYN', '14.99', 1, '14.99', '2016-04-17 20:02:56', 'admin@admin.com'),
(9, 'American Idiot', 'Green Day', '4.99', 1, '4.99', '2016-04-17 21:23:15', 'admin@admin.com'),
(10, 'Ghost Stories', 'Coldplay', '6.99', 1, '6.99', '2016-04-17 21:23:15', 'admin@admin.com'),
(11, 'X', 'Ed Sheeran', '5.99', 1, '5.99', '2016-04-17 21:23:15', 'admin@admin.com'),
(12, 'Ghost Stories', 'Coldplay', '6.99', 1, '6.99', '2016-04-17 21:38:07', 'admin@admin.com'),
(13, '1989', 'Taylor Swift', '9.99', 1, '9.99', '2016-04-21 02:20:17', 'deeptha@gmail.com'),
(14, 'Mind of Mine', 'ZAYN', '14.99', 1, '14.99', '2016-04-21 02:20:17', 'deeptha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `genre` varchar(60) NOT NULL,
  `artist` varchar(60) NOT NULL,
  `year` int(4) NOT NULL,
  `qty` int(5) NOT NULL,
  `image` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `genre`, `artist`, `year`, `qty`, `image`, `price`) VALUES
(1, '1989', 'Pop', 'Taylor Swift', 2015, 90, 'Taylor1989.png', '9.99'),
(2, 'Mind of Mine', 'Blues', 'ZAYN', 2016, 10, 'zayn.png', '14.99'),
(3, 'Ghost Stories', 'Alternative', 'Coldplay', 2014, 48, 'ColdplayGS.png', '6.99'),
(4, 'Confident', 'Pop', 'Demi Lovato', 2015, 70, 'DemiConf.png', '9.99'),
(5, 'Caracal', 'House', 'Disclosure', 2015, 100, 'DisclosureCara.png', '9.99'),
(6, 'X', 'Pop', 'Ed Sheeran', 2014, 49, 'EdX.png', '5.99'),
(7, 'American Beauty', 'Rock', 'Fall Out Boy', 2015, 40, 'FOBABAP.png', '7.99'),
(8, 'American Idiot', 'Rock', 'Green Day', 2004, 4, 'GreenDayAI.jpg', '4.99'),
(9, 'Meteora', 'Rock', 'Linkin Park', 2003, 5, 'LPMet.jpg', '4.99'),
(10, 'Death Magnetic', 'Metal', 'Metallica', 2008, 50, 'MetallicaDM.jpg', '9.99'),
(11, 'Revival', 'Pop', 'Selena Gomez', 2016, 100, 'SGRevival.png', '14.99');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(2) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `state`, `pin`, `email`, `password`, `type`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin', 'ad', 99999, 'admin@admin.com', 'admin', 'admin'),
(2, 'Nagabharan', 'Nagendran', '7825 McCallum Blvd', 'Dallas', 'TX', 75252, 'nn@gmail.com', 'pwd', 'user'),
(3, 'Deeptha parsi', 'diwakar', '7650 McCAllum blvd', 'Dallas', 'TX', 75252, 'deeptha@gmail.com', 'deep', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
