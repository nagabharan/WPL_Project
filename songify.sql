-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2016 at 08:22 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `songify`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `artist` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `units` int(5) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `prod_id`, `artist`, `price`, `units`, `total`, `date`, `email`) VALUES
(3, 2, 'ZAYN', '14.99', 2, '29.98', '2016-04-27 18:12:41', 'nn@gmail.com'),
(4, 3, 'Coldplay', '6.99', 2, '13.98', '2016-04-27 18:19:28', 'admin@admin.com'),
(5, 5, 'Disclosure', '29.99', 1, '29.99', '2016-04-27 18:19:28', 'admin@admin.com');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `genre`, `artist`, `year`, `qty`, `image`, `price`) VALUES
(2, 'Mind of Mine', 'Blues', 'ZAYN', 2016, 8, 'zayn.png', '14.99'),
(3, 'Ghost Stories', 'Alternative', 'Coldplay', 2014, 41, 'ColdplayGS.png', '6.99'),
(5, 'Caracal', 'House', 'Disclosure', 2015, 99, 'DisclosureCara.png', '29.99'),
(6, 'X', 'Pop', 'Ed Sheeran', 2014, 43, 'EdX.png', '5.99'),
(7, 'American Beauty', 'Rock', 'Fall Out Boy', 2015, 40, 'FOBABAP.png', '7.99'),
(8, 'American Idiot', 'Rock', 'Green Day', 2004, 4, 'GreenDayAI.jpg', '4.99'),
(9, 'Meteora', 'Rock', 'Linkin Park', 2003, 4, 'LPMet.jpg', '4.99'),
(10, 'Death Magnetic', 'Metal', 'Metallica', 2008, 50, 'MetallicaDM.jpg', '9.99'),
(11, 'Revival', 'Pop', 'Selena Gomez', 2016, 97, 'SGRevival.png', '14.99'),
(12, '1989', 'Pop', 'Taylor Swift', 2015, 100, 'Taylor1989.png', '9.99');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `state`, `pin`, `email`, `password`, `type`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin', 'ad', 99999, 'admin@admin.com', 'admin', 'admin'),
(2, 'Nagabharan', 'Nagendran', '7825 McCallum Blvd', 'Dallas', 'TX', 75252, 'nn@gmail.com', 'pwd', 'user'),
(3, 'Deeptha parsi', 'diwakar', '7650 McCAllum blvd', 'Dallas', 'TX', 75252, 'deeptha@gmail.com', 'deep', 'user'),
(4, 'Nikhil', 'Rao', '77', 'ttt', 'TX', 75252, 'nik@rao.com', 'Qwerty123@', 'user'),
(5, 'sudhir', 'ramalingam', '512 raton pass', 'irving', 'tx', 75063, 'sxr@gmail.com', 'Sud@hir08', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `email` (`email`);

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
