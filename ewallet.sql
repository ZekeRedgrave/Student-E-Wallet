-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2020 at 08:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `AccountUsername` text NOT NULL,
  `AccountEmail` text NOT NULL,
  `AccountPassword` longtext NOT NULL,
  `AccountType` text NOT NULL,
  `Account_AvailableBalance` double NOT NULL,
  `Account_TuitionBalance` double NOT NULL,
  `AccountImage` text NOT NULL,
  `TimeRegister` text NOT NULL,
  `DateRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `StudentID`, `EmployeeID`, `AccountUsername`, `AccountEmail`, `AccountPassword`, `AccountType`, `Account_AvailableBalance`, `Account_TuitionBalance`, `AccountImage`, `TimeRegister`, `DateRegister`) VALUES
(2, 15730500, 0, 'zeroredgrave', 'zeroredgrave@gmail.com', '1', 'STUDENT', 0, 0, 'avatar.png', '2020-10-10', '03:29:37'),
(4, 0, 1, 'zekeredgrave', 'zekeredgrave@gmail.com', '1', 'ADMIN', 0, 0, 'avatar.png', '06:44:28', '2020-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentID` int(11) NOT NULL,
  `TimelineID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `CommentDescription` text NOT NULL,
  `isMention` tinyint(1) NOT NULL,
  `DateRegister` text NOT NULL,
  `TimeRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`CommentID`, `TimelineID`, `UserID`, `AccountID`, `CommentDescription`, `isMention`, `DateRegister`, `TimeRegister`) VALUES
(15, 41, 0, 2, '{\"Text\":\"wadawad\",\"Image\":[]}', 0, '2020-10-11', '07:28:15'),
(16, 41, 0, 2, '{\"Text\":\"dawd\",\"Image\":[]}', 0, '2020-10-11', '07:30:17'),
(18, 41, 0, 2, '{\"Text\":\"123qwadas\",\"Image\":[]}', 0, '2020-10-11', '07:30:24'),
(19, 42, 0, 4, '{\"Text\":\"Hello Worlds\",\"Image\":[]}', 0, '2020-10-11', '07:40:52'),
(20, 42, 0, 2, '{\"Text\":\"YO\",\"Image\":[]}', 0, '2020-10-11', '07:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `CourseName` text NOT NULL,
  `CourseCategory` text NOT NULL,
  `CourseType` int(11) NOT NULL,
  `TimeRegister` text NOT NULL,
  `DateRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` text NOT NULL,
  `ContactNumber` int(11) NOT NULL,
  `Image` text NOT NULL,
  `Position` text NOT NULL,
  `Department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Name`, `Age`, `Gender`, `ContactNumber`, `Image`, `Position`, `Department`) VALUES
(1, '{\r\n    	\"Lastname\": \"Redgrave\",\r\n    	\"Firstname\": \"Zeke\",\r\n    	\"Middlename\": \"Saber\"\r\n    }', 369, 'Male', 0, 'avatar.png', 'IT Teacher', 'Computer Science Department');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `RegisterID` int(11) NOT NULL,
  `RegisterUsername` text NOT NULL,
  `RegisterEmail` text NOT NULL,
  `RegisterPassword` text NOT NULL,
  `RegisterSI` text NOT NULL,
  `RegisterCode` int(11) NOT NULL,
  `RegisterType` text NOT NULL,
  `RegisterExpire` bigint(20) NOT NULL,
  `isApprove` tinyint(1) NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `TimeRegister` text NOT NULL,
  `DateRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`RegisterID`, `RegisterUsername`, `RegisterEmail`, `RegisterPassword`, `RegisterSI`, `RegisterCode`, `RegisterType`, `RegisterExpire`, `isApprove`, `isDelete`, `TimeRegister`, `DateRegister`) VALUES
(26, 'zeroredgrave', 'zeroredgrave@gmail.com', '1', '15730500', 56825232, 'STUDENT', 0, 1, 1, '02:31:44', '2020-10-10'),
(28, 'zekeredgrave', 'zekeredgrave@gmail.com', '1', '1', 809296874, 'ADMIN', 0, 1, 1, '06:08:00', '2020-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `StoreID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `StoreTitle` text NOT NULL,
  `StoreType` text NOT NULL,
  `isOthers` tinyint(1) NOT NULL,
  `isPurchasable` tinyint(1) NOT NULL,
  `isPhysical` tinyint(1) NOT NULL,
  `StorePrice` double NOT NULL,
  `StoreIcon` text DEFAULT NULL,
  `TimeRegister` text NOT NULL,
  `DateRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`StoreID`, `UserID`, `AccountID`, `StoreTitle`, `StoreType`, `isOthers`, `isPurchasable`, `isPhysical`, `StorePrice`, `StoreIcon`, `TimeRegister`, `DateRegister`) VALUES
(22, 15730500, 0, 'Grade Slip', '1', 0, 0, 0, 0, 'receipt_long', '2020-09-27', '10:29:52'),
(25, 15730500, 0, 'eLoad', '32', 1, 1, 0, 50, 'sim_card', '2020-09-28', '08:02:26'),
(26, 15730500, 0, 'Food Coupon', '32', 1, 1, 1, 500, 'fastfood', '2020-09-28', '08:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `storetype`
--

CREATE TABLE `storetype` (
  `StoreType_ID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `StoreType_Name` text NOT NULL,
  `TimeRegister` text NOT NULL,
  `DateRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `storetype`
--

INSERT INTO `storetype` (`StoreType_ID`, `AccountID`, `StoreType_Name`, `TimeRegister`, `DateRegister`) VALUES
(1, 15730500, 'College Payment Slip', '2020-09-26', '10:06:20'),
(5, 15730500, 'Basic Education Payment Slip', '2020-09-26', '10:13:32'),
(32, 15730500, 'Others', '2020-09-26', '10:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Course` text NOT NULL,
  `Gender` text NOT NULL,
  `SchoolName` text NOT NULL,
  `Age` int(11) NOT NULL,
  `Level` int(11) NOT NULL,
  `ContactNumber` text NOT NULL,
  `Image` longtext NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `Name`, `Course`, `Gender`, `SchoolName`, `Age`, `Level`, `ContactNumber`, `Image`, `Status`) VALUES
(15730500, '{\r\n    	\"Lastname\": \"Redgrave\",\r\n    	\"Firstname\": \"Zeke\",\r\n    	\"Middlename\" : \"Saber\"\r\n    }', 'BSIT', 'Male', 'Unknown', 24, 3, '0', 'avatar.png', 'non-graduated');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `TimelineID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `TimelineDescription` text NOT NULL,
  `DateRegister` text NOT NULL,
  `TimeRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`TimelineID`, `UserID`, `AccountID`, `TimelineDescription`, `DateRegister`, `TimeRegister`) VALUES
(42, 0, 4, '{\"Text\":\"Testing\",\"Image\":[\"7.gif\",\"8.gif\",\"9.png\",\"10.gif\"]}', '2020-10-11', '07:40:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`RegisterID`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`StoreID`);

--
-- Indexes for table `storetype`
--
ALTER TABLE `storetype`
  ADD PRIMARY KEY (`StoreType_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`TimelineID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `RegisterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `StoreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `storetype`
--
ALTER TABLE `storetype`
  MODIFY `StoreType_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15730501;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `TimelineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
