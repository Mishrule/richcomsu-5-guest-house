-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2019 at 02:00 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `richcomsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `dailyitemsales`
--

CREATE TABLE `dailyitemsales` (
  `saledate` varchar(250) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `itemquantity` varchar(250) NOT NULL,
  `itemcost` varchar(250) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `amountpaid` varchar(250) NOT NULL,
  `balance` varchar(250) NOT NULL,
  `quantityremain` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyitemsales`
--

INSERT INTO `dailyitemsales` (`saledate`, `productname`, `itemquantity`, `itemcost`, `payment`, `amountpaid`, `balance`, `quantityremain`) VALUES
('Aug 01, 2019', 'Fanta', '2', '1.50', '3', '3.00', '0', '246');

-- --------------------------------------------------------

--
-- Table structure for table `guestregistration`
--

CREATE TABLE `guestregistration` (
  `guestid` int(20) NOT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `guestroom` varchar(250) DEFAULT 'NULL',
  `companyname` varchar(250) DEFAULT NULL,
  `arrivaldate` varchar(250) DEFAULT NULL,
  `departureDate` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `contact` varchar(250) DEFAULT NULL,
  `nationality` varchar(250) DEFAULT NULL,
  `modeofpayment` varchar(250) DEFAULT NULL,
  `numberofguest` varchar(250) DEFAULT NULL,
  `dialyrate` varchar(250) DEFAULT NULL,
  `daysspend` varchar(250) DEFAULT NULL,
  `totalpayment` varchar(250) DEFAULT NULL,
  `idnumber` varchar(250) DEFAULT NULL,
  `receiptNumber` varchar(250) DEFAULT NULL,
  `staffid` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guestregistration`
--

INSERT INTO `guestregistration` (`guestid`, `fullname`, `guestroom`, `companyname`, `arrivaldate`, `departureDate`, `address`, `email`, `contact`, `nationality`, `modeofpayment`, `numberofguest`, `dialyrate`, `daysspend`, `totalpayment`, `idnumber`, `receiptNumber`, `staffid`, `status`) VALUES
(1, 'Benard Owusu', '101', 'MTN', 'Jul 31, 2019', 'Jul 31, 2019', 'Non', 'bOwusu@gmail.com', '0245589658', 'Ghanaian', 'cash', '1', '40', '1', '40', '2563254125', '2365214565', 'Precious', 'goneout'),
(5, 'Precious Arhinful', '101', 'MTN', 'Aug 01, 2019', 'Aug 03, 2019', 'Accra', 'p@gmail.com', '0245258965', 'Ghanaian', 'cash', '1', '40', '2', '80', '2458585856', '6565656541', '25', 'checkin');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomNumber` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomNumber`, `amount`) VALUES
('101', '40'),
('102', '50'),
('103', '50'),
('104', '80');

-- --------------------------------------------------------

--
-- Table structure for table `roomsales`
--

CREATE TABLE `roomsales` (
  `saleid` int(250) NOT NULL,
  `saledate` varchar(250) NOT NULL,
  `saleamount` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomsales`
--

INSERT INTO `roomsales` (`saleid`, `saledate`, `saleamount`) VALUES
(1, 'Jul 26, 2019', '80'),
(2, 'Jul 25, 2019', '40'),
(4, 'Aug 01, 2019', '250');

-- --------------------------------------------------------

--
-- Table structure for table `saleproduct`
--

CREATE TABLE `saleproduct` (
  `saledate` varchar(250) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `itemquantity` varchar(250) NOT NULL,
  `itemcost` varchar(250) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `amountpaid` varchar(250) NOT NULL,
  `balance` varchar(250) NOT NULL,
  `quantityremain` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleproduct`
--

INSERT INTO `saleproduct` (`saledate`, `productname`, `itemquantity`, `itemcost`, `payment`, `amountpaid`, `balance`, `quantityremain`) VALUES
('', 'Fanta', '250', '1.50', '', '', '', '246');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockid` int(250) NOT NULL,
  `stockdate` varchar(250) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `stockquantity` varchar(250) NOT NULL,
  `costprice` varchar(250) NOT NULL,
  `sellingprice` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockid`, `stockdate`, `productname`, `stockquantity`, `costprice`, `sellingprice`) VALUES
(1, 'Aug 01, 2019', 'Fanta', '250', '1.00', '1.50');

-- --------------------------------------------------------

--
-- Table structure for table `stockupdate`
--

CREATE TABLE `stockupdate` (
  `productname` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockupdate`
--

INSERT INTO `stockupdate` (`productname`, `quantity`) VALUES
('Fruit Drink', '25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestregistration`
--
ALTER TABLE `guestregistration`
  ADD PRIMARY KEY (`guestid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomNumber`);

--
-- Indexes for table `roomsales`
--
ALTER TABLE `roomsales`
  ADD PRIMARY KEY (`saleid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockid`),
  ADD UNIQUE KEY `productname` (`productname`);

--
-- Indexes for table `stockupdate`
--
ALTER TABLE `stockupdate`
  ADD UNIQUE KEY `productname` (`productname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guestregistration`
--
ALTER TABLE `guestregistration`
  MODIFY `guestid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roomsales`
--
ALTER TABLE `roomsales`
  MODIFY `saleid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
