-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2011 at 10:06 AM
-- Server version: 5.1.58
-- PHP Version: 5.3.6-13ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `BillingAddress`
--

CREATE TABLE IF NOT EXISTS `BillingAddress` (
  `LastName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Zip` int(6) NOT NULL,
  `StreetAddress` varchar(30) NOT NULL,
  PRIMARY KEY (`Zip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `HomeAddress`
--

CREATE TABLE IF NOT EXISTS `HomeAddress` (
  `LastName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Zip` int(6) NOT NULL,
  `StreetAddress` varchar(30) NOT NULL,
  PRIMARY KEY (`Zip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `HomeAddress`
--

INSERT INTO `HomeAddress` (`LastName`, `FirstName`, `City`, `State`, `Zip`, `StreetAddress`) VALUES
('efdwerewr111111', 'werwer11111111111', 'werwerwer', 'werwer', 32344343, 'seddssddssd');

-- --------------------------------------------------------

--
-- Table structure for table `Insurance`
--

CREATE TABLE IF NOT EXISTS `Insurance` (
  `Name` varchar(30) NOT NULL,
  `Company` varchar(30) NOT NULL,
  `Number` varchar(20) NOT NULL,
  `Month` varchar(2) NOT NULL,
  `Year` varchar(4) NOT NULL,
  PRIMARY KEY (`Number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Insurance`
--

INSERT INTO `Insurance` (`Name`, `Company`, `Number`, `Month`, `Year`) VALUES
('deee', 'w3333333333wwwwwwwww', '3222', '21', '2001');

-- --------------------------------------------------------

--
-- Table structure for table `ItemInformation`
--

CREATE TABLE IF NOT EXISTS `ItemInformation` (
  `ItemNum` varchar(20) NOT NULL,
  `ItemName` varchar(20) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ItemNum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ItemInformation`
--

INSERT INTO `ItemInformation` (`ItemNum`, `ItemName`, `Price`) VALUES
('3333', 'sadsdfdsfsdf', '4444.00'),
('777', 'gghghhg', '6555.00'),
('444', 'qqqqq', '111.00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `itemList`
--
CREATE TABLE IF NOT EXISTS `itemList` (
`itemNum` varchar(20)
,`itemName` varchar(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `OrderInformation`
--

CREATE TABLE IF NOT EXISTS `OrderInformation` (
  `OrderNum` varchar(20) NOT NULL,
  `ItemNum` varchar(20) NOT NULL,
  `ItemName` varchar(20) NOT NULL,
  `CustomerName` varchar(20) NOT NULL,
  `Quantity` varchar(15) NOT NULL,
  `MonthPurchased` varchar(2) NOT NULL,
  `DayPurchased` varchar(2) NOT NULL,
  `YearPurchased` varchar(4) NOT NULL,
  `PaymentMethod` varchar(20) NOT NULL,
  `State` varchar(3) NOT NULL,
  `ShipMethod` varchar(15) NOT NULL,
  PRIMARY KEY (`OrderNum`),
  UNIQUE KEY `OrderNum` (`OrderNum`),
  UNIQUE KEY `ItemNum` (`ItemNum`),
  UNIQUE KEY `ItemName` (`ItemName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `OrderInformation`
--

INSERT INTO `OrderInformation` (`OrderNum`, `ItemNum`, `ItemName`, `CustomerName`, `Quantity`, `MonthPurchased`, `DayPurchased`, `YearPurchased`, `PaymentMethod`, `State`, `ShipMethod`) VALUES
('1', '3232', 'swdedsf1111', 'sdfdsfdsf', '1113', '12', '12', '2001', 'www', 'stt', 'wwww'),
('2', '22', 'xcxzcxzc', 'zxczxczxc', '11', '12', '12', '2001', 'dsdfdf', 'stt', 'sssss');

-- --------------------------------------------------------

--
-- Table structure for table `PersonalInformation`
--

CREATE TABLE IF NOT EXISTS `PersonalInformation` (
  `Name` varchar(30) NOT NULL,
  `SocialSecurity` int(10) NOT NULL,
  `Age` int(3) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  PRIMARY KEY (`SocialSecurity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PersonalInformation`
--

INSERT INTO `PersonalInformation` (`Name`, `SocialSecurity`, `Age`, `Nationality`, `Gender`) VALUES
('dddd1111111111111', 2147483647, 222111, 'dddwwwwwwww', 'mm22222222');

-- --------------------------------------------------------

--
-- Table structure for table `PhoneNumbers`
--

CREATE TABLE IF NOT EXISTS `PhoneNumbers` (
  `Name` varchar(20) NOT NULL,
  `Home` varchar(20) NOT NULL,
  `Fax` varchar(20) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`Name`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PhoneNumbers`
--

INSERT INTO `PhoneNumbers` (`Name`, `Home`, `Fax`, `Mobile`) VALUES
('deeeee', '23232332', '33232', '545444554'),
('deeeeeeeeeeee', '32232332111111', '23232332', '323232323232'),
('wwwww', '323232', '3223234', '423234342342'),
('sddsfsdf', '1111111', 'xd2222222', '22222222222222222');

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE IF NOT EXISTS `Reviews` (
  `itemNum` varchar(20) NOT NULL,
  `itemName` varchar(20) NOT NULL,
  `Rating` varchar(5) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  PRIMARY KEY (`itemNum`,`LastName`,`FirstName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`itemNum`, `itemName`, `Rating`, `LastName`, `FirstName`) VALUES
('333', 'dsfdfdfg', '3', 'cfbfg', 'fggf');

-- --------------------------------------------------------

--
-- Table structure for table `ShippingPrices`
--

CREATE TABLE IF NOT EXISTS `ShippingPrices` (
  `State` varchar(3) NOT NULL,
  `ShipMethod` varchar(15) NOT NULL,
  `ShippingPrice` decimal(10,2) NOT NULL,
  PRIMARY KEY (`State`),
  UNIQUE KEY `ShipMethod` (`ShipMethod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ShippingPrices`
--

INSERT INTO `ShippingPrices` (`State`, `ShipMethod`, `ShippingPrice`) VALUES
('dee', 'fdfdgfd', '3333.00');

-- --------------------------------------------------------

--
-- Structure for view `itemList`
--
DROP TABLE IF EXISTS `itemList`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `itemList` AS select `ItemInformation`.`ItemNum` AS `itemNum`,`ItemInformation`.`ItemName` AS `itemName` from `ItemInformation`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
