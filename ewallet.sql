-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 03:03 AM
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
(4, 0, 1, 'Zeke', 'zekeredgrave@gmail.com', '1234', 'ADMIN', 0, 0, '4.png', '06:44:28', '2020-10-11');

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
(37, 42, 0, 2, '{\"Text\":\"dwadwada\",\"Image\":[]}', 0, '2020-11-07', '04:32:45');

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

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`GiftID`, `EmployeeID`, `StudentID`, `GiftFE`, `GiftTE`, `GiftCode`, `GiftAmount`, `GiftFee`, `isClaim`, `TimeRegister`, `DateRegister`) VALUES
(1, 4, 15730500, '', '', 0, 0, 10, 1, '', ''),
(2, 4, 15730500, 'zekeredgrave@gmail.com', 'zeroredgrave@gmail.com', 0, 0, 100, 1, '', '');

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

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`LogID`, `AccountID`, `LogActivity`, `TimeRegister`, `DateRegister`) VALUES
(941, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '03:15:09', '2020-11-12'),
(942, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '03:20:30', '2020-11-12'),
(943, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '04:46:48', '2020-11-16'),
(944, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '04:55:02', '2020-11-16'),
(945, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '04:55:45', '2020-11-16'),
(946, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '04:57:45', '2020-11-16'),
(947, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '05:09:21', '2020-11-16'),
(948, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '05:10:21', '2020-11-16'),
(949, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '05:11:15', '2020-11-16'),
(950, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '05:24:50', '2020-11-16'),
(951, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '05:37:43', '2020-11-16'),
(952, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '07:12:54', '2020-11-16'),
(953, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '07:14:11', '2020-11-16'),
(954, 4, '{\"Page\":\"Account\",\"Action\":\"School Registry(Edit Student)\"}', '07:14:32', '2020-11-16'),
(955, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '04:07:26', '2020-11-17'),
(956, 4, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '04:08:11', '2020-11-17'),
(957, 2, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '04:08:18', '2020-11-17'),
(958, 2, '{\"Page\":\"App\",\"Action\":\"View\"}', '04:08:18', '2020-11-17'),
(959, 2, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '04:08:47', '2020-11-17'),
(960, 0, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '02:29:36', '2020-11-21'),
(961, 2, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '02:34:48', '2020-11-21'),
(962, 2, '{\"Page\":\"App\",\"Action\":\"View\"}', '02:34:49', '2020-11-21'),
(963, 2, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '02:34:56', '2020-11-21'),
(964, 0, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '02:39:59', '2020-11-21'),
(965, 4, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '02:57:40', '2020-11-21'),
(966, 4, '{\"Page\":\"App\",\"Action\":\"View\"}', '02:57:40', '2020-11-21'),
(967, 4, '{\"Page\":\"Account\",\"Action\":\"View Account Registration\"}', '02:57:45', '2020-11-21'),
(968, 4, '{\"Page\":\"Account\",\"Action\":\"Accept Account Registration\"}', '02:58:00', '2020-11-21'),
(969, 4, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '02:59:01', '2020-11-21');

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
(28, 'zekeredgrave', 'zekeredgrave@gmail.com', '1', '1', 274637685, 'ADMIN', 0, 1, 1, '06:08:00', '2020-10-11');

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
(22, 15730500, 0, 'Grade Slip', '1', 0, 0, 0, 50, 'receipt_long', '2020-09-27', '10:29:52'),
(28, 15730500, 0, 'Diploma', '1', 0, 0, 0, 0, '', '2020-11-07', '04:07:52');

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
(42, 0, 4, '{\"Text\":\"Testing\",\"Image\":[\"7.gif\",\"8.gif\",\"9.png\",\"10.gif\"]}', '2020-10-11', '07:40:34');

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
(1, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"1000\",\"TransactionAmount\":\"20000\",\"TransactionCash\":\"21000\"}', '04:42:12', '2020-10-28'),
(2, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"1000\",\"TransactionAmount\":\"20000\",\"TransactionCash\":\"21000\"}', '04:49:39', '2020-10-28'),
(3, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"1\",\"TransactionAmount\":\"10\",\"TransactionCash\":\"20\"}', '04:51:55', '2020-10-28'),
(4, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"1000\",\"TransactionAmount\":\"20000\",\"TransactionCash\":\"21000\"}', '04:53:48', '2020-10-28'),
(5, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"0\",\"TransactionAmount\":\"1\",\"TransactionCash\":\"1\"}', '04:54:41', '2020-10-28'),
(6, 15730500, 'GIFT', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"10\",\"TransactionAmount\":\"100\",\"TransactionCash\":\"120\",\"Transaction_RedeemCode\":926011531}', '08:12:05', '2020-10-28'),
(7, 15730500, 'GIFT', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"10\",\"TransactionAmount\":\"100\",\"TransactionCash\":\"120\",\"Transaction_RedeemCode\":458740065}', '08:13:35', '2020-10-28'),
(8, 15730500, 'GIFT', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"100\",\"TransactionAmount\":\"1000\",\"TransactionCash\":\"1100\",\"Transaction_RedeemCode\":987938422}', '08:17:29', '2020-10-28'),
(16, 15730500, 'FEE(SCHOOL TUITION)', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"20000\",\"TransactionFee\":\"20000\",\"TransactionCash\":\"21011\"}', '07:35:41', '2020-11-03'),
(17, 15730500, '', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":null,\"TransactionFee\":0,\"TransactionCash\":\"1011\"}', '01:33:46', '2020-11-07'),
(18, 15730500, 'GRADE SLIP', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"50\",\"TransactionFee\":0,\"TransactionCash\":\"1011\"}', '01:34:28', '2020-11-07'),
(19, 15730500, 'GRADE SLIP', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"50\",\"TransactionFee\":0,\"TransactionCash\":\"961\"}', '01:58:16', '2020-11-07');

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
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `GiftID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=970;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ReceiptID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `RegisterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `StoreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `storetype`
--
ALTER TABLE `storetype`
  MODIFY `StoreType_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15750365;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `TimelineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
