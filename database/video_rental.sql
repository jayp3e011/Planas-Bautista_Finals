-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2015 at 02:37 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts`
--

CREATE TABLE IF NOT EXISTS `customer_accounts` (
  `customer_id` int(12) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tel_no` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_accounts`
--

INSERT INTO `customer_accounts` (`customer_id`, `first_name`, `last_name`, `address`, `tel_no`) VALUES
(1, 'jaypee', 'bautista', 'matima', '7654'),
(2, 'wawa', 'wewe', 'aedweef', '465321');

-- --------------------------------------------------------

--
-- Table structure for table `dvd`
--

CREATE TABLE IF NOT EXISTS `dvd` (
  `item_no` int(12) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dvd`
--

INSERT INTO `dvd` (`item_no`, `title`, `status`) VALUES
(2, 'the martian', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `item_no` int(12) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`item_no`, `title`, `status`) VALUES
(10001, 'skyrim', 'available'),
(10002, 'csgo', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `itemlist`
--

CREATE TABLE IF NOT EXISTS `itemlist` (
  `list_no` int(12) NOT NULL,
  `item_no` varchar(12) NOT NULL,
  `title` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` varchar(100) NOT NULL,
  `rental_period` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemlist`
--

INSERT INTO `itemlist` (`list_no`, `item_no`, `title`, `genre`, `description`, `price`, `rental_period`, `status`, `type`) VALUES
(1, '2', 'the martian', 'dfsdsd', 'sedfdcdf', 'dsff', '2', 'borrowed', 'dvd');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE IF NOT EXISTS `rentals` (
  `transaction_no` int(12) NOT NULL,
  `costumer_id` varchar(12) NOT NULL,
  `title` varchar(100) NOT NULL,
  `item_no` varchar(12) NOT NULL,
  `borrow_date` varchar(100) NOT NULL,
  `return_date` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`transaction_no`, `costumer_id`, `title`, `item_no`, `borrow_date`, `return_date`) VALUES
(1, '1', 'the martian', '1', 'N/A', '12/20/15');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `reservation_no` int(12) NOT NULL,
  `costumer_id` varchar(100) NOT NULL,
  `item_no` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
  `username` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `authorization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`username`, `password`, `first_name`, `last_name`, `authorization`) VALUES
('admin', 'admin', 'ako', 'ikaw', 'admin'),
('admin2', 'admin2', 'ega', 'er', 'admin'),
('clerk', 'clerk', 'ikaw', 'ako', 'clerk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `itemlist`
--
ALTER TABLE `itemlist`
  ADD PRIMARY KEY (`list_no`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`transaction_no`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_no`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  MODIFY `customer_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dvd`
--
ALTER TABLE `dvd`
  MODIFY `item_no` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `item_no` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10003;
--
-- AUTO_INCREMENT for table `itemlist`
--
ALTER TABLE `itemlist`
  MODIFY `list_no` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `transaction_no` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_no` int(12) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
