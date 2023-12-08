-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 06:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickblood`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodrequest`
--

CREATE TABLE `bloodrequest` (
  `bloodRequestID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `requestSubject` varchar(30) NOT NULL,
  `requestBloodType` varchar(11) NOT NULL,
  `requestDescription` varchar(200) NOT NULL,
  `requestQuantity` int(11) NOT NULL,
  `requestHospital` varchar(100) NOT NULL,
  `requestCity` varchar(30) NOT NULL,
  `requestDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodrequest`
--

INSERT INTO `bloodrequest` (`bloodRequestID`, `userID`, `requestSubject`, `requestBloodType`, `requestDescription`, `requestQuantity`, `requestHospital`, `requestCity`, `requestDate`) VALUES
(6, 13, 'Urgent Blood Needed', 'B+', 'I need blood in Apollo hospital. My brother had a accident few hours ago. It Serious.', 3, 'Apollo Hospital', 'Dhaka', '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userId` int(15) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `userType` varchar(15) NOT NULL,
  `bloodType` varchar(15) NOT NULL,
  `nidNumber` int(15) NOT NULL,
  `cityName` varchar(15) NOT NULL,
  `presentAddress` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contactNumber` int(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userId`, `firstName`, `lastName`, `userType`, `bloodType`, `nidNumber`, `cityName`, `presentAddress`, `email`, `contactNumber`, `password`) VALUES
(10, 'rayhan', 'pervej', 'Donor', 'O+', 34234234, 'Dhaka', 'bashundhara', 'rayhan@gmail.com', 904329403, 'akdfahdf'),
(13, 'Ashikur', 'Piyal', 'Receiver', 'O+', 2147483647, 'Dhaka', 'bashundhara', 'piyal@gmail.com', 124334435, '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD PRIMARY KEY (`bloodRequestID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  MODIFY `bloodRequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
