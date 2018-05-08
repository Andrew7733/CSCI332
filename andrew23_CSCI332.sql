-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2018 at 06:59 PM
-- Server version: 5.6.36-82.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andrew23_CSCI332`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`andrew23`@`localhost` PROCEDURE `CountCustomers()` (IN `InputStoreID` INT)  NO SQL
BEGIN
  SELECT 'Store:', Stores.Name, 'Number of Customers: ', count(*) 
  from StoreHasCustomer, Stores
  where StoreHasCustomer.StoreID=InputStoreID AND Stores.StoreID = InputStoreID;
END$$

--
-- Functions
--
CREATE DEFINER=`andrew23`@`localhost` FUNCTION `FindTotalPrice()` (`InputCost` INT, `InputProfitMargin` DECIMAL(6,5)) RETURNS INT(11) NO SQL
BEGIN
    RETURN InputCost+(InputCost*InputProfitMargin);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Apparel`
--

CREATE TABLE `Apparel` (
  `ProductID` int(11) NOT NULL,
  `CatalogID` int(11) NOT NULL,
  `Type` text NOT NULL,
  `Brand` text NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Apparel`
--

INSERT INTO `Apparel` (`ProductID`, `CatalogID`, `Type`, `Brand`, `Cost`) VALUES
(7965645, 89231, 'Long Sleeve Shirt', 'American Apparel ', 70),
(35726587, 656596, 'Rain Coat', 'North Face', 60),
(85739587, 89231, 'Tee Shirt', 'Hanes', 12);

--
-- Triggers `Apparel`
--
DELIMITER $$
CREATE TRIGGER `nonNegativeCost` BEFORE UPDATE ON `Apparel` FOR EACH ROW BEGIN
IF NEW.Cost < 0 THEN
    SET NEW.Cost = OLD.Cost;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Catalogs`
--

CREATE TABLE `Catalogs` (
  `CatalogID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Catalogs`
--

INSERT INTO `Catalogs` (`CatalogID`, `Name`, `Year`) VALUES
(89231, 'Fall Collection', 2016),
(656596, 'Winter Coats', 2017),
(4569976, 'Signs & More', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CustomerID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CustomerID`, `Name`, `Address`) VALUES
(405617, 'Test User', '123 Test Lane'),
(2354765, 'Blake Scottt', '43 East Bay St.'),
(74269527, 'Andrew Miller', '1657 Coming Street');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderNumber` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `StoreID` int(11) NOT NULL,
  `ItemPrice` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`OrderNumber`, `CustomerID`, `StoreID`, `ItemPrice`, `Total`) VALUES
(1, 74269527, 62067201, 100, 130),
(2, 2354765, 825620610, 532, 745),
(79634205, 74269527, 62067201, 250, 325),
(79634295, 74269527, 825620610, 500, 700);

-- --------------------------------------------------------

--
-- Table structure for table `Signs`
--

CREATE TABLE `Signs` (
  `ProductID` int(11) NOT NULL,
  `CatalogID` int(11) NOT NULL,
  `Type` text NOT NULL,
  `Size` text NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Signs`
--

INSERT INTO `Signs` (`ProductID`, `CatalogID`, `Type`, `Size`, `Cost`) VALUES
(134144, 4569976, 'Metal Sign', '6\'x 9\'', 300);

-- --------------------------------------------------------

--
-- Table structure for table `StoreHasCatalog`
--

CREATE TABLE `StoreHasCatalog` (
  `StoreID` int(11) NOT NULL,
  `CatalogID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `StoreHasCatalog`
--

INSERT INTO `StoreHasCatalog` (`StoreID`, `CatalogID`) VALUES
(1, 656596),
(1, 89231),
(825620610, 4569976),
(62067201, 4569976);

-- --------------------------------------------------------

--
-- Table structure for table `StoreHasCustomer`
--

CREATE TABLE `StoreHasCustomer` (
  `StoreID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `StoreHasCustomer`
--

INSERT INTO `StoreHasCustomer` (`StoreID`, `CustomerID`) VALUES
(1, 769785),
(62067201, 2354765),
(825620610, 74269527),
(1, 74269527);

-- --------------------------------------------------------

--
-- Table structure for table `Stores`
--

CREATE TABLE `Stores` (
  `StoreID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Address` text NOT NULL,
  `Profit Margin` decimal(6,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Stores`
--

INSERT INTO `Stores` (`StoreID`, `Name`, `Address`, `Profit Margin`) VALUES
(1, 'Testing Branding Store', '1265 Calhoun St', '0.20000'),
(62067201, 'Andrew\'s Branding Store', '1832 Clements Ferry Road', '0.30000'),
(825620610, 'John\'s Branding Store', '2590 Rivers Ave', '0.40000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Apparel`
--
ALTER TABLE `Apparel`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CatalogID` (`CatalogID`);

--
-- Indexes for table `Catalogs`
--
ALTER TABLE `Catalogs`
  ADD PRIMARY KEY (`CatalogID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrderNumber`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `StoreID` (`StoreID`);

--
-- Indexes for table `Signs`
--
ALTER TABLE `Signs`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CatalogID` (`CatalogID`);

--
-- Indexes for table `Stores`
--
ALTER TABLE `Stores`
  ADD PRIMARY KEY (`StoreID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Apparel`
--
ALTER TABLE `Apparel`
  ADD CONSTRAINT `Apparel_ibfk_1` FOREIGN KEY (`CatalogID`) REFERENCES `Catalogs` (`CatalogID`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Signs`
--
ALTER TABLE `Signs`
  ADD CONSTRAINT `Signs_ibfk_1` FOREIGN KEY (`CatalogID`) REFERENCES `Catalogs` (`CatalogID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
