-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 02:35 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

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
(4, 0, 1, 'Zeke', 'zekeredgrave@gmail.com', '1234', 'CASHIER', 0, 0, '4.png', '06:44:28', '2020-10-11'),
(7, 0, 25, 'orekiredgrave', 'orekiredgrave@gmail.com', '1234', 'DEPARTMENT', 0, 0, '7.png', '20:55:39', '2020-11-22'),
(10, 15730500, 0, 'zeroredgrave', 'zeroredgrave@gmail.com', '1234', 'STUDENT', 16452, 110, '10.png', '2020-11-23', '00:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `AssessmentID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Assessment_OldTuition` int(11) NOT NULL,
  `Assessment_NewTuition` int(11) NOT NULL,
  `isFullPaid` tinyint(1) NOT NULL,
  `isHalfPaid` tinyint(1) NOT NULL,
  `AssessmentStatus` text NOT NULL,
  `AssessmentType` text NOT NULL,
  `AssessmentInfo` longtext NOT NULL,
  `DateRegister` text NOT NULL,
  `TimeRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`AssessmentID`, `StudentID`, `EmployeeID`, `Assessment_OldTuition`, `Assessment_NewTuition`, `isFullPaid`, `isHalfPaid`, `AssessmentStatus`, `AssessmentType`, `AssessmentInfo`, `DateRegister`, `TimeRegister`) VALUES
(18, 15730500, 25, 0, 15, 0, 0, 'Not Eligable to Enroll Next Semester', 'PRELEM', '{\"TuitionFee\":\"5\",\"Miscellaneous\":\"5\",\"Laboratory\":\"5\"}', '2020-12-14', '08:54:51'),
(19, 15730500, 25, 15, 30, 0, 0, 'Not Eligable to Enroll Next Semester', 'MIDTERM', '{\"TuitionFee\":\"5\",\"Miscellaneous\":\"5\",\"Laboratory\":\"5\"}', '2020-12-14', '08:57:27'),
(20, 15730500, 25, 30, 75, 0, 0, 'Not Valid Anymore', 'SEMI-FINAL', '{\"TuitionFee\":\"15\",\"Miscellaneous\":\"15\",\"Laboratory\":\"15\"}', '2020-12-14', '08:59:16'),
(21, 15730500, 25, 30, 140, 0, 0, 'Not Valid Anymore', '', '{\"TuitionFee\":null,\"Miscellaneous\":\"15\",\"Laboratory\":\"15\"}', '2020-12-14', '09:28:04'),
(22, 15730500, 25, 30, 140, 0, 0, 'Not Valid Anymore', 'SEMI-FINAL', '{\"TuitionFee\":null,\"Miscellaneous\":\"15\",\"Laboratory\":\"15\"}', '2020-12-14', '09:29:00'),
(23, 15730500, 25, 30, 140, 0, 0, 'Not Valid Anymore', 'SEMI-FINAL', '{\"TuitionFee\":\"80\",\"Miscellaneous\":\"15\",\"Laboratory\":\"15\"}', '2020-12-14', '09:30:31'),
(24, 15730500, 25, 30, 140, 0, 0, 'Not Eligable to Enroll Next Semester', 'FINAL', '{\"TuitionFee\":\"80\",\"Miscellaneous\":\"15\",\"Laboratory\":\"15\"}', '2020-12-14', '09:30:47');

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
(32, 42, 0, 4, '{\"Text\":\"1\",\"Image\":[]}', 0, '2020-10-13', '08:34:50'),
(35, 42, 0, 2, '{\"Text\":\"3232312\",\"Image\":[]}', 0, '2020-10-13', '08:43:36'),
(37, 42, 0, 2, '{\"Text\":\"dwadwada\",\"Image\":[]}', 0, '2020-11-07', '04:32:45'),
(38, 43, 0, 7, '{\"Text\":\"dawdadwadawdawdaw\",\"Image\":[]}', 0, '2020-11-22', '21:43:39'),
(39, 43, 0, 7, '{\"Text\":\"dwadwada\",\"Image\":[]}', 0, '2020-11-22', '21:48:54'),
(40, 43, 0, 7, '{\"Text\":\"3esa dasda qd sa \",\"Image\":[]}', 0, '2020-11-22', '21:50:19'),
(44, 43, 0, 10, '{\"Text\":\"3213\",\"Image\":[]}', 0, '2020-11-24', '04:40:14'),
(45, 44, 0, 12, '{\"Text\":\"31ewsad as \",\"Image\":[]}', 0, '2020-11-24', '19:26:30'),
(46, 61, 0, 10, '{\"Text\":\"dadawdaw\",\"Image\":[]}', 0, '2020-12-12', '11:21:04'),
(47, 60, 0, 7, '{\"Text\":\"dwad\",\"Image\":[]}', 0, '2020-12-13', '02:25:46');

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
  `Department` text NOT NULL,
  `isRetired` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Name`, `Age`, `Gender`, `ContactNumber`, `Image`, `Position`, `Department`, `isRetired`) VALUES
(1, '{\r\n    	\"Lastname\": \"Redgrave\",\r\n    	\"Firstname\": \"Zeke\",\r\n    	\"Middlename\": \"Saber\"\r\n    }', 369, 'Male', 0, 'avatar.png', 'IT Teacher', 'Computer Science Department', 0),
(25, '{\"Lastname\":\"Abari\",\"Firstname\":\"Bakra\",\"Middlename\":\"Cebu\"}', 25, 'Male', 0, 'avatar.png', 'IT Instructor', 'IT Department', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `GiftID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `GiftFE` text NOT NULL,
  `GiftTE` text NOT NULL,
  `GiftCode` int(11) NOT NULL,
  `GiftAmount` double NOT NULL,
  `GiftFee` double NOT NULL,
  `isClaim` tinyint(1) NOT NULL,
  `TimeRegister` text NOT NULL,
  `DateRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `LogID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `LogActivity` longtext NOT NULL,
  `TimeRegister` text NOT NULL,
  `DateRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `ReceiptID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `StoreID` int(11) NOT NULL,
  `TopupID` int(11) NOT NULL,
  `ReceiptName` text NOT NULL,
  `ReceiptTA` double NOT NULL,
  `ReceiptCA` double NOT NULL,
  `TimeRegister` text NOT NULL,
  `DateRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

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
(28, 'zekeredgrave', 'zekeredgrave@gmail.com', '1', '1', 0, 'ADMIN', 0, 1, 1, '06:08:00', '2020-10-11'),
(39, 'zeroredgrave', 'zeroredgrave@gmail.com', '1234', '15730500', 0, 'STUDENT', 0, 1, 1, '18:31:38', '2020-11-22'),
(45, 'orekiredgrave', 'orekiredgrave@gmail.com', '1234', '', 0, 'DEPARTMENT', 0, 1, 1, '20:55:00', '2020-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `RequestID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `RequestName` text NOT NULL,
  `isProcess` tinyint(1) NOT NULL,
  `isClaim` tinyint(1) NOT NULL,
  `Start_DateRegister` text NOT NULL,
  `Start_TimeRegister` text NOT NULL,
  `End_DateRegister` text NOT NULL,
  `End_TimeRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`RequestID`, `StudentID`, `RequestName`, `isProcess`, `isClaim`, `Start_DateRegister`, `Start_TimeRegister`, `End_DateRegister`, `End_TimeRegister`) VALUES
(3, 15730500, 'Diploma', 0, 0, '2020-11-24', '21:49:40', '', ''),
(4, 15730500, 'Grade Slip', 0, 0, '2020-11-30', '12:39:53', '', ''),
(5, 15730500, 'Grade Slip', 0, 0, '2020-11-30', '12:42:16', '', ''),
(6, 15730500, 'Grade Slip', 0, 0, '2020-11-30', '13:52:56', '', ''),
(7, 15730500, 'Grade Slip', 0, 0, '2020-11-30', '13:54:24', '', ''),
(8, 15730500, 'Student ID', 0, 0, '2020-11-30', '13:55:25', '', ''),
(9, 15730500, 'esad', 0, 0, '2020-11-30', '13:56:38', '', ''),
(10, 15730500, 'Grade Slip', 0, 0, '2020-11-30', '13:58:06', '', ''),
(11, 15730500, 'Grade Slip', 0, 0, '2020-11-30', '13:58:43', '', ''),
(12, 15730500, 'Diploma', 0, 0, '2020-11-30', '13:59:34', '', ''),
(13, 15730500, 'Grade Slip', 0, 0, '2020-12-12', '10:03:15', '', ''),
(14, 15730500, 'Grade Slip', 0, 0, '2020-12-12', '10:03:22', '', ''),
(15, 15730500, 'Student ID', 0, 0, '2020-12-12', '10:03:26', '', ''),
(16, 15730500, 'Grade Slip', 0, 0, '2020-12-12', '10:03:30', '', ''),
(17, 15730500, 'esad', 0, 0, '2020-12-12', '10:03:33', '', ''),
(18, 15730500, 'Diploma', 0, 0, '2020-12-12', '10:03:36', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `StoreID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `StoreTitle` text NOT NULL,
  `StoreType` text NOT NULL,
  `isOthers` tinyint(1) NOT NULL,
  `isPhysical` tinyint(1) NOT NULL,
  `StorePrice` double NOT NULL,
  `StoreIcon` text DEFAULT NULL,
  `TimeRegister` text NOT NULL,
  `DateRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`StoreID`, `AccountID`, `StoreTitle`, `StoreType`, `isOthers`, `isPhysical`, `StorePrice`, `StoreIcon`, `TimeRegister`, `DateRegister`) VALUES
(45, 7, 'Grade Slip for College Student', 'College Payment Slip', 0, 1, 25, '', '2020-12-14', '05:10:51'),
(46, 7, 'Grade Slip for K-12 Student', 'Basic Education Payment Slip', 0, 1, 25, '', '2020-12-14', '05:11:10'),
(47, 7, 'Intramural Fee with T-Shirt', 'Intramural Event', 0, 1, 900, '', '2020-12-14', '08:14:25'),
(49, 7, 'Intramural Fee without T-Shirt', 'Intramural Event', 0, 1, 250, '', '2020-12-14', '08:17:06');

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
(2, 15730500, 'Basic Education Payment Slip', '2020-09-26', '10:13:32'),
(3, 15730500, 'Others', '2020-09-26', '10:48:18'),
(38, 7, 'Intramural Event', '', '');

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
(1234, '{\"Lastname\":\"Reyes\",\"Firstname\":\"Mon Alfred\",\"Middlename\":\"Subingsubing\"}', 'BSIT', 'Male', '', 24, 4, '', 'avatar.png', 'non-graduated'),
(15730500, '{\"Lastname\":\"Saber\",\"Firstname\":\"Ion\",\"Middlename\":\"Redgrave\"}', 'BSIT', 'Male', 'Unknown', 24, 3, '0', 'avatar.png', 'non-graduated');

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
(60, 0, 7, '{\"Text\":\"dadwadawd\",\"Image\":[\"4.png\"]}', '2020-11-29', '12:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `TransactionType` text NOT NULL,
  `TransactionDescription` longtext NOT NULL,
  `TimeRegister` text NOT NULL,
  `DateRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `StudentID`, `TransactionType`, `TransactionDescription`, `TimeRegister`, `DateRegister`) VALUES
(62, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":0.01,\"TransactionAmount\":\"1\",\"TransactionCash\":\"1.01\"}', '15:32:41', '2020-11-30'),
(63, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":50,\"TransactionAmount\":\"5000\",\"TransactionCash\":\"5050\"}', '15:34:56', '2020-11-30'),
(64, 15730500, 'FEE(SCHOOL TUITION)', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"5000\",\"TransactionFee\":\"5000\",\"TransactionCash\":\"12089\"}', '15:37:16', '2020-11-30'),
(65, 15730500, 'FEE(SCHOOL TUITION)', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"100\",\"TransactionFee\":0,\"TransactionCash\":\"7089\"}', '15:42:07', '2020-11-30'),
(66, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":100,\"TransactionAmount\":\"10000\",\"TransactionCash\":\"10100\"}', '14:29:56', '2020-12-08'),
(67, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":1,\"TransactionAmount\":\"100\",\"TransactionCash\":\"101\"}', '04:28:08', '2020-12-12'),
(68, 15730500, 'COLLEGE PAYMENT SLIP', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"25\",\"TransactionFee\":0,\"TransactionCash\":\"17089\"}', '10:03:15', '2020-12-12'),
(69, 15730500, 'COLLEGE PAYMENT SLIP', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"25\",\"TransactionFee\":0,\"TransactionCash\":\"17064\"}', '10:03:22', '2020-12-12'),
(70, 15730500, 'COLLEGE PAYMENT SLIP', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"50\",\"TransactionFee\":0,\"TransactionCash\":\"17039\"}', '10:03:26', '2020-12-12'),
(71, 15730500, 'COLLEGE PAYMENT SLIP', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"25\",\"TransactionFee\":0,\"TransactionCash\":\"16989\"}', '10:03:30', '2020-12-12'),
(72, 15730500, '31232 DASDA', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"12\",\"TransactionFee\":0,\"TransactionCash\":\"16964\"}', '10:03:33', '2020-12-12'),
(73, 15730500, 'COLLEGE PAYMENT SLIP', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"600\",\"TransactionFee\":0,\"TransactionCash\":\"16952\"}', '10:03:36', '2020-12-12'),
(74, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":0.5,\"TransactionAmount\":\"100\",\"TransactionCash\":\"100.5\"}', '06:22:20', '2020-12-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`AssessmentID`);

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
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`GiftID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`ReceiptID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`RegisterID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`RequestID`);

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
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `AssessmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `GiftID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2636;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ReceiptID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `RegisterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `StoreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `storetype`
--
ALTER TABLE `storetype`
  MODIFY `StoreType_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15750365;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `TimelineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
