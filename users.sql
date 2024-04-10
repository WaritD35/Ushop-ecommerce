-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 03:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ushop`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(24) NOT NULL,
  `passwd` text NOT NULL,
  `DoB` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `Address` varchar(24) NOT NULL,
  `citizenID` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `passwd`, `DoB`, `phone`, `gender`, `Address`, `citizenID`, `email`) VALUES
('Aeyy', '$2y$10$MBhmSxUIBCYvE6x8XIfD9OMo.fl0oGTom6mOkEnInvIVKcUWZQo86', '2002-01-14', '0987472117', 'm', '53/1 หมู่3 ต.คุ้งสำเภา', '1222233322122', 'tiger142545@gmail.com'),
('riwkiwzalnw', '$2y$10$1mgPn3t8hZm.L4B/3yhLIu9tXTySShYdTq21W7cdja8DSxwcRv/kO', '2002-01-01', '0855313988', 'm', '263 Chainat', '1189900335926', 'riwkiwzalnw01@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `citizenID` (`citizenID`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
