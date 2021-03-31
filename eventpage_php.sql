-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 11:21 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventpage_php`
--
CREATE DATABASE IF NOT EXISTS `u187800db5` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `u187800db5`;

-- --------------------------------------------------------

--
-- Table structure for table `the_event`
--

CREATE TABLE `the_event` (
  `address` varchar(40) NOT NULL,
  `capacity` int(11) NOT NULL,
  `DateAndTime` varchar(15) DEFAULT NULL,
  `description` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `url` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `the_event`
--

INSERT INTO `the_event` (`address`, `capacity`, `DateAndTime`, `description`, `email`, `id`, `image`, `name`, `phone`, `url`) VALUES
('Eventstraße 1, 1111 Eventtown', 200, '25.2.2021', 'Rockiges Rockkonzert', 'rock@rockkonzert.at', 1, 'https://images.pexels.com/photos/1916821/pexels-photo-1916821.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 ', 'Rock1', 54684546, 'www.rockkonzert.at'),
('Eventvillage 7, 7777 Eventtown', 150, '18.3.2021', 'Lustiges Kabarett', 'lisbethlustig@kabaretts.at', 4, 'https://images.pexels.com/photos/3791983/pexels-photo-3791983.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 ', 'Lisbeth Lustig ', 5647126, 'www.lisbethlustig.at');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userEmail` varchar(60) NOT NULL,
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userEmail`, `userId`, `userName`, `userPass`, `status`) VALUES
('olga@karussell.at', 2, 'Olga Bertram', '2843ae65567985a46de7ef2546af0cbc7bdfce96399923950e4aef5fc05ce687', 'user'),
('Waltraud@action.at', 3, 'Waltraud Grossmann', '8126522fb52a7fb3bc82a61bd8e1ba83f4196fb9a0ef083ec07885df25d19b6c', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `the_event`
--
ALTER TABLE `the_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
