-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 07:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mall-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Category` varchar(45) NOT NULL,
  `Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_Id`, `User_Id`, `Category`, `Description`) VALUES
(1, 1, 'Food', 'chips\nbiscuits'),
(3, 1, 'Electronics', 'All electrical items..');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Customer` varchar(45) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_Id`, `User_Id`, `Customer`, `Gender`, `Mobile`, `Email`, `Address`) VALUES
(1, 1, 'Aishu', 'Female', 7894561301, 'satyamdodmani@gmail.com', 'Haliyal');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Employee` varchar(45) NOT NULL,
  `Designation` varchar(45) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_Id`, `User_Id`, `Employee`, `Designation`, `Gender`, `Mobile`, `Email`, `Address`) VALUES
(1, 1, 'Sush', 'Assistant Manager', 'Female', 7984561235, 'ASDFWDF2@kqhfd', 'Honnavar');

-- --------------------------------------------------------

--
-- Table structure for table `mallemployee`
--

CREATE TABLE `mallemployee` (
  `Employee_Id` int(10) NOT NULL,
  `Employee` varchar(45) NOT NULL,
  `Designation` varchar(45) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Mobile` bigint(10) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mallemployee`
--

INSERT INTO `mallemployee` (`Employee_Id`, `Employee`, `Designation`, `Gender`, `Mobile`, `Email`, `Address`) VALUES
(3, 'Satyam', 'labour', 'Male', 8971015113, 'aishwaryadodmani88@gmail.com', '#81 SAMRUDDI BHARATANAHALLI KUNDARGI YELLAPUR');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Pro_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Product` varchar(45) NOT NULL,
  `Category` varchar(45) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pro_Id`, `User_Id`, `Product`, `Category`, `Price`, `Description`) VALUES
(3, 1, 'lsls', 'Food', 20, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `showroom`
--

CREATE TABLE `showroom` (
  `Showroom_Id` int(10) NOT NULL,
  `Showroom` varchar(45) NOT NULL,
  `Manager` varchar(45) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Mobile` bigint(10) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showroom`
--

INSERT INTO `showroom` (`Showroom_Id`, `Showroom`, `Manager`, `Gender`, `Mobile`, `Email`, `Address`) VALUES
(3, 'nike', 'satyam', 'Male', 7894561230, 'satyamdodmani@gmail.com', 'Haliyal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(10) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `M_Name` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Username`, `Password`, `M_Name`, `Email`) VALUES
(1, 'satya', 'satya', 'Satyam', 'satyamdodmani@gmail.com'),
(2, 'admin', 'admin', 'Satyam', 'satya@g.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `mallemployee`
--
ALTER TABLE `mallemployee`
  ADD PRIMARY KEY (`Employee_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Pro_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `showroom`
--
ALTER TABLE `showroom`
  ADD PRIMARY KEY (`Showroom_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mallemployee`
--
ALTER TABLE `mallemployee`
  MODIFY `Employee_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Pro_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `showroom`
--
ALTER TABLE `showroom`
  MODIFY `Showroom_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
