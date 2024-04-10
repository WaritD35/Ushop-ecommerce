-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 03:45 AM
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
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `cardNo` varchar(20) NOT NULL,
  `customerID` bigint(20) DEFAULT NULL,
  `exp` date DEFAULT NULL,
  `holder_name` varchar(24) DEFAULT NULL,
  `cvv_cvc` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`cardNo`, `customerID`, `exp`, `holder_name`, `cvv_cvc`) VALUES
('1231234123', 2, '2222-12-01', 'Tiger', '123'),
('1234567899', 2, '2444-01-01', 'Riw', '123'),
('32322323', 2, '1111-01-01', 'Riw', '334'),
('115242152354', 3, '2024-12-01', 'Cum Jar', '555');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` bigint(24) NOT NULL,
  `username` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `username`) VALUES
(2, 'Aeyy'),
(3, 'riwkiwzalnw');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` bigint(20) NOT NULL,
  `feedback` varchar(1000) NOT NULL,
  `username` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mobile_bank`
--

CREATE TABLE `mobile_bank` (
  `customerID` bigint(20) NOT NULL,
  `bankname` varchar(24) DEFAULT NULL,
  `account_no` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobile_bank`
--

INSERT INTO `mobile_bank` (`customerID`, `bankname`, `account_no`) VALUES
(1, 'easdw', '1234123'),
(2, 'easd', '76543322'),
(3, 'MONGKOL Bank', '99999999999'),
(3, 'MONGKOL Bank', '555123624999');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `pay` bigint(20) DEFAULT NULL,
  `ShipingOption` varchar(24) DEFAULT NULL,
  `customerID` bigint(20) DEFAULT NULL,
  `productID` bigint(20) DEFAULT NULL,
  `payment_method` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `pay`, `ShipingOption`, `customerID`, `productID`, `payment_method`) VALUES
(1, 100, NULL, 2, 1, 'credit card'),
(2, 100, NULL, 2, 1, 'credit card'),
(3, 359, NULL, 3, 5, 'credit card'),
(4, 500868, NULL, 3, 5, 'credit card'),
(5, 100, NULL, 3, 1, 'credit card');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` bigint(20) NOT NULL,
  `vendorID` bigint(20) DEFAULT NULL,
  `stock` int(20) DEFAULT NULL,
  `picture` varchar(40) DEFAULT NULL,
  `product_name` varchar(40) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `vendorID`, `stock`, `picture`, `product_name`, `detail`, `price`) VALUES
(1, 2, 1, 'mountwash.png', 'Listerine', 'Total Care', 100),
(2, 3, 50, 'Bread.jpg', 'Bread', 'Homemade Bread', 25),
(3, 3, 30, 'cleansing.1.jpg', 'Cleansing', 'Shiseido cleansing', 150),
(4, 3, 999, 'jitlada.jpg', 'Daddy Milk tablet', 'Make you stronger', 9),
(5, 3, 50, 'lipstick.jpg', 'Lipstick', 'Marketplace lipstick', 359),
(6, 3, 5, 'mg.jpg', 'Magnesium car', 'a car made of magnesium', 500000),
(7, 3, 90, 'mong.jpg', 'Yamong', 'Yamong tra Tuaythong', 50),
(8, 3, 75, 'payanak.jpg', 'Payayor', 'Payayor copy of thuaythong', 50),
(9, 3, 30, 'shampoo.jpg', 'Shampoo', 'Nice Shampoo good for your hair', 150),
(10, 3, 40, 'shampoo1.jpg', 'Tresemme shampoo', 'Tresemme Shampoo', 180);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `OrderID1` int(11) NOT NULL,
  `shipping_option` varchar(24) DEFAULT NULL,
  `store_name` varchar(24) DEFAULT NULL,
  `customerID` bigint(20) DEFAULT NULL,
  `productID` bigint(20) DEFAULT NULL,
  `pay` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`OrderID1`, `shipping_option`, `store_name`, `customerID`, `productID`, `pay`) VALUES
(1, NULL, 'AeyyShop', 2, 1, 100),
(2, NULL, 'AeyyShop', 2, 1, 100),
(3, NULL, 'RiwkiwShop', 3, 5, 359),
(4, NULL, 'RiwkiwShop', 3, 5, 500868),
(5, NULL, 'AeyyShop', 3, 1, 100);

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

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` bigint(20) NOT NULL,
  `username` varchar(24) DEFAULT NULL,
  `store_name` varchar(24) DEFAULT NULL,
  `phone` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `username`, `store_name`, `phone`, `email`) VALUES
(2, 'Aeyy', 'AeyyShop', '0922781569', 'tiger142545@gmail.com'),
(3, 'riwkiwzalnw', 'RiwkiwShop', '0855313988', 'riwkiwzalnw01@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD KEY `fk_customerID_credit` (`customerID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `fk_username_customer` (`username`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `fk_username_feedback` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `fk_vendorID_product` (`vendorID`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`OrderID1`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `citizenID` (`citizenID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`),
  ADD UNIQUE KEY `store_name` (`store_name`),
  ADD KEY `fk_username_vendor` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` bigint(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `OrderID1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `fk_customerID_credit` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_username_feedback` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_vendorID_product` FOREIGN KEY (`vendorID`) REFERENCES `vendor` (`vendorID`);

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `fk_username_vendor` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
