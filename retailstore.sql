-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2019 at 07:30 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retailstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) UNSIGNED NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `userid`, `productid`, `quantity`) VALUES
(26, 5, 18, 1),
(27, 5, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image`) VALUES
('1571972345.313303.jpg'),
('1571972345.313303.jpg'),
('1571972345.313303.jpg'),
('1571972345.313303.jpg'),
('9206345c-2f44-4675-93ba-740ae8ce9b23.JPG'),
('9206345c-2f44-4675-93ba-740ae8ce9b23.JPG'),
('9206345c-2f44-4675-93ba-740ae8ce9b23.JPG'),
('1571972345.313303.jpg'),
('1571972345.313303.jpg'),
('1571972345.313303.jpg'),
('iPhoneXr.png'),
('9206345c-2f44-4675-93ba-740ae8ce9b23.JPG'),
('9206345c-2f44-4675-93ba-740ae8ce9b23.JPG'),
('9206345c-2f44-4675-93ba-740ae8ce9b23.JPG'),
('earpods.jpg'),
('airpods.jpg'),
('appletv.jpg'),
('iphone8.jpg'),
('ipadmini.jpg'),
('iphone11.jpg'),
('iphone11pro.jpg'),
('iphonexs.jpg'),
('s9.jpg'),
('pixel4.jpg'),
('iphonex.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `productdescription` varchar(300) DEFAULT NULL,
  `productimage` varchar(150) DEFAULT NULL,
  `productprice` int(11) NOT NULL,
  `productcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `productdescription`, `productimage`, `productprice`, `productcount`) VALUES
(1, 'macbook pro 15 inch', 'awesome laptop', 'macbookpro.jpg', 1200, 300),
(15, 'iphonexr', 'superb phone', 'iPhoneXr.png', 600, 300),
(17, 'Apple tv', 'Better streaming service provided at a reasonable  pricing', 'earpods.jpg', 300, 300),
(18, 'Apple airpods pro', 'super premium earphones', 'airpods.jpg', 239, 300),
(19, 'Airpods 1st generation', 'best overall earphones', 'appletv.jpg', 139, 300),
(20, 'Iphone 8', 'Superb phone', 'iphone8.jpg', 449, 300),
(21, 'Iphone 11', 'The iPhone 11 features an Intel modem chip with Gigabit-class LTE, 2x2 MIMO, and LAA, Wi-Fi 6 support (802.11ax) with 2x2 MIMO, Bluetooth 5.0, Dual-SIM with eSIM, and an Apple-designed U1 Ultra Wideband chip that improves spatial awareness and allows for better indoor tracking.', 'iphone11.jpg', 699, 300),
(22, 'samsung s9', 'superb display', 's9.jpg', 450, 300),
(23, 'pixel 4', 'A smartphone by google', 'pixel4.jpg', 800, 300),
(24, 'iphone x', 'superb phone', 'iphonex.jpg', 600, 300);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseditems`
--

CREATE TABLE `purchaseditems` (
  `itemid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseditems`
--

INSERT INTO `purchaseditems` (`itemid`, `purchaseid`, `productid`, `quantity`) VALUES
(4, 16, 15, 1),
(5, 17, 15, 2),
(6, 18, 15, 1),
(7, 19, 15, 2),
(8, 20, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchaseid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `price` double(100,2) NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchaseid`, `userid`, `price`, `dateandtime`) VALUES
(16, 5, 605.00, '2019-12-13 23:32:32'),
(17, 5, 1205.00, '2019-12-13 23:38:23'),
(18, 5, 605.00, '2019-12-14 00:53:05'),
(19, 5, 1205.00, '2019-12-14 01:51:37'),
(20, 5, 7205.00, '2019-12-14 04:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `useraddress` varchar(300) DEFAULT NULL,
  `userpassword` varchar(200) NOT NULL,
  `userrole` varchar(300) NOT NULL,
  `useremail` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `useraddress`, `userpassword`, `userrole`, `useremail`) VALUES
(1, 'raja', '416 perrin street ypsilanti mi', '8189', 'admin', 'rveliche@emich.edu'),
(3, 'rama', '516 st john ypsilanti mi', 'satya1997', 'user', 'ravipatirama312@gmail.com'),
(4, 'ishan', '516 st john ypsilanti mi', 'ishan', 'user', 'ishanp@gmail.com'),
(5, 'nikhil', '516 st john apt 204 ypsilanti mi ', '234', 'user', 'nikki@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `productname` (`productname`);

--
-- Indexes for table `purchaseditems`
--
ALTER TABLE `purchaseditems`
  ADD PRIMARY KEY (`itemid`),
  ADD KEY `purchaseid` (`purchaseid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchaseid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `purchaseditems`
--
ALTER TABLE `purchaseditems`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`);

--
-- Constraints for table `purchaseditems`
--
ALTER TABLE `purchaseditems`
  ADD CONSTRAINT `purchaseditems_ibfk_1` FOREIGN KEY (`purchaseid`) REFERENCES `purchases` (`purchaseid`),
  ADD CONSTRAINT `purchaseditems_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
