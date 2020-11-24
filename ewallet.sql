-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 12:55 AM
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
(10, 15730500, 0, 'zeroredgrave', 'zeroredgrave@gmail.com', '1234', 'STUDENT', 6290, 0, '10.png', '2020-11-23', '00:10:31'),
(12, 1234, 0, 'Testing', 'monalfredreyes1997@gmail.com', '1234', 'STUDENT', 10000, 0, '12.png', '2020-11-24', '19:20:05');

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
  `DateRegister` text NOT NULL,
  `TimeRegister` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`AssessmentID`, `StudentID`, `EmployeeID`, `Assessment_OldTuition`, `Assessment_NewTuition`, `isFullPaid`, `isHalfPaid`, `AssessmentStatus`, `DateRegister`, `TimeRegister`) VALUES
(5, 15730500, 25, 0, 1000, 0, 0, 'Not Valid Anymore', '2020-11-24', '03:43:42'),
(6, 15730500, 25, 0, 15000, 0, 0, 'Not Valid Anymore', '2020-11-24', '03:45:21'),
(7, 15730500, 25, 20999, 2999, 0, 1, 'Half Paid (Can now Enroll)', '2020-11-24', '03:58:08'),
(9, 15730500, 25, 3999, 0, 1, 1, 'Fully Paid! (Can now Enroll)', '2020-11-24', '06:15:20'),
(10, 15730500, 25, 10, 0, 1, 1, 'Fully Paid! (Can now Enroll)', '2020-11-24', '06:20:17'),
(11, 1234, 25, 10000, 0, 1, 1, 'Fully Paid! (Can now Enroll)', '2020-11-24', '19:24:58');

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
(45, 44, 0, 12, '{\"Text\":\"31ewsad as \",\"Image\":[]}', 0, '2020-11-24', '19:26:30');

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
(1, '{\r\n    	\"Lastname\": \"Redgrave\",\r\n    	\"Firstname\": \"Zeke\",\r\n    	\"Middlename\": \"Saber\"\r\n    }', 369, 'Male', 0, 'avatar.png', 'IT Teacher', 'Computer Science Department'),
(25, '{\"Lastname\":\"A\",\"Firstname\":\"B\",\"Middlename\":\"C\"}', 69, 'Male', 0, 'avatar.png', 'IT', 'IT Department');

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
(2141, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '21:20:33', '2020-11-23'),
(2142, 10, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '21:20:45', '2020-11-23'),
(2143, 10, '{\"Page\":\"Profile\",\"Action\":\"Updating His\\/Her Account Profile\"}', '21:21:26', '2020-11-23'),
(2144, 10, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '21:21:40', '2020-11-23'),
(2145, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '21:21:47', '2020-11-23'),
(2146, 7, '{\"Page\":\"Store\",\"Action\":\"Write Store Item\"}', '22:09:03', '2020-11-23'),
(2147, 7, '{\"Page\":\"Store\",\"Action\":\"Edit Store Item\"}', '22:19:51', '2020-11-23'),
(2148, 7, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '22:20:39', '2020-11-23'),
(2149, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '22:20:52', '2020-11-23'),
(2150, 4, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '22:21:01', '2020-11-23'),
(2151, 4, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '22:21:19', '2020-11-23'),
(2152, 4, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '22:22:03', '2020-11-23'),
(2153, 4, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '22:22:23', '2020-11-23'),
(2154, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '22:22:26', '2020-11-23'),
(2155, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '02:06:03', '2020-11-24'),
(2156, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '02:06:44', '2020-11-24'),
(2157, 7, '{\"Page\":\"Assessment\",\"Action\":\"Deploying Student Assessment Info\"}', '02:11:10', '2020-11-24'),
(2158, 7, '{\"Page\":\"Assessment\",\"Action\":\"Deploying Student Assessment Info\"}', '02:27:33', '2020-11-24'),
(2159, 7, '{\"Page\":\"Assessment\",\"Action\":\"Deploying Student Assessment Info\"}', '02:29:49', '2020-11-24'),
(2160, 7, '{\"Page\":\"Assessment\",\"Action\":\"Deploying Student Assessment Info\"}', '02:35:40', '2020-11-24'),
(2161, 7, '{\"Page\":\"Assessment\",\"Action\":\"Deploying Student Assessment Info\"}', '03:43:43', '2020-11-24'),
(2162, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '03:59:32', '2020-11-24'),
(2163, 10, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '03:59:37', '2020-11-24'),
(2164, 10, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '03:59:48', '2020-11-24'),
(2165, 4, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '03:59:53', '2020-11-24'),
(2166, 4, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '04:00:17', '2020-11-24'),
(2167, 10, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '04:00:22', '2020-11-24'),
(2168, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:15:12', '2020-11-24'),
(2169, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:21:22', '2020-11-24'),
(2170, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:21:29', '2020-11-24'),
(2171, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:22:28', '2020-11-24'),
(2172, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:25:53', '2020-11-24'),
(2173, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:28:02', '2020-11-24'),
(2174, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:29:34', '2020-11-24'),
(2175, 10, '{\"Page\":\"Timeline\",\"Action\":\"Write Comment\"}', '04:29:36', '2020-11-24'),
(2176, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:30:00', '2020-11-24'),
(2177, 10, '{\"Page\":\"Timeline\",\"Action\":\"Write Comment\"}', '04:30:09', '2020-11-24'),
(2178, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:35:30', '2020-11-24'),
(2179, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:37:17', '2020-11-24'),
(2180, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:37:47', '2020-11-24'),
(2181, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:38:28', '2020-11-24'),
(2182, 10, '{\"Page\":\"Timeline\",\"Action\":\"Write Comment\"}', '04:38:31', '2020-11-24'),
(2183, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:38:31', '2020-11-24'),
(2184, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:40:09', '2020-11-24'),
(2185, 10, '{\"Page\":\"Timeline\",\"Action\":\"Delete Comment\"}', '04:40:10', '2020-11-24'),
(2186, 10, '{\"Page\":\"Timeline\",\"Action\":\"Delete Comment\"}', '04:40:11', '2020-11-24'),
(2187, 10, '{\"Page\":\"Timeline\",\"Action\":\"Delete Comment\"}', '04:40:12', '2020-11-24'),
(2188, 10, '{\"Page\":\"Timeline\",\"Action\":\"Write Comment\"}', '04:40:14', '2020-11-24'),
(2189, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:40:14', '2020-11-24'),
(2190, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:41:10', '2020-11-24'),
(2191, 10, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '04:41:15', '2020-11-24'),
(2192, 0, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '04:41:39', '2020-11-24'),
(2193, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '04:41:46', '2020-11-24'),
(2194, 7, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:41:56', '2020-11-24'),
(2195, 7, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:42:30', '2020-11-24'),
(2196, 7, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '04:47:04', '2020-11-24'),
(2197, 7, '{\"Page\":\"Timeline\",\"Action\":\"Write Post\"}', '04:47:09', '2020-11-24'),
(2198, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '04:47:33', '2020-11-24'),
(2199, 10, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '04:47:37', '2020-11-24'),
(2200, 10, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '06:00:32', '2020-11-24'),
(2201, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '06:00:36', '2020-11-24'),
(2202, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '06:03:06', '2020-11-24'),
(2203, 10, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '06:03:21', '2020-11-24'),
(2204, 10, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '06:14:11', '2020-11-24'),
(2205, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '06:14:16', '2020-11-24'),
(2206, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '06:14:28', '2020-11-24'),
(2207, 10, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '06:14:36', '2020-11-24'),
(2208, 10, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '06:14:52', '2020-11-24'),
(2209, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '06:14:56', '2020-11-24'),
(2210, 7, '{\"Page\":\"Assessment\",\"Action\":\"Deploying Student Assessment Info\"}', '06:15:20', '2020-11-24'),
(2211, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '06:18:18', '2020-11-24'),
(2212, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '06:18:22', '2020-11-24'),
(2213, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '06:18:28', '2020-11-24'),
(2214, 4, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '06:18:31', '2020-11-24'),
(2215, 4, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '06:18:55', '2020-11-24'),
(2216, 10, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '06:19:01', '2020-11-24'),
(2217, 10, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '06:19:23', '2020-11-24'),
(2218, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '06:19:34', '2020-11-24'),
(2219, 7, '{\"Page\":\"Assessment\",\"Action\":\"Deploying Student Assessment Info\"}', '06:20:17', '2020-11-24'),
(2220, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '06:21:12', '2020-11-24'),
(2221, 10, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '06:21:39', '2020-11-24'),
(2222, 10, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '06:21:53', '2020-11-24'),
(2223, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '06:21:58', '2020-11-24'),
(2224, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '18:39:12', '2020-11-24'),
(2225, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '18:39:56', '2020-11-24'),
(2226, 7, '{\"Page\":\"Account\",\"Action\":\"School Registry(Add Student)\"}', '18:43:31', '2020-11-24'),
(2227, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '18:55:30', '2020-11-24'),
(2228, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '19:19:58', '2020-11-24'),
(2229, 7, '{\"Page\":\"Account\",\"Action\":\"View Account Registration\"}', '19:20:00', '2020-11-24'),
(2230, 7, '{\"Page\":\"Account\",\"Action\":\"Accept Account Registration\"}', '19:20:08', '2020-11-24'),
(2231, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '19:20:12', '2020-11-24'),
(2232, 12, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '19:20:21', '2020-11-24'),
(2233, 12, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '19:20:38', '2020-11-24'),
(2234, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '19:20:44', '2020-11-24'),
(2235, 7, '{\"Page\":\"Assessment\",\"Action\":\"Deploying Student Assessment Info\"}', '19:24:58', '2020-11-24'),
(2236, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '19:25:11', '2020-11-24'),
(2237, 4, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '19:25:17', '2020-11-24'),
(2238, 4, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '19:25:42', '2020-11-24'),
(2239, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '19:25:49', '2020-11-24'),
(2240, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '19:25:59', '2020-11-24'),
(2241, 12, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '19:26:04', '2020-11-24'),
(2242, 12, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '19:26:28', '2020-11-24'),
(2243, 12, '{\"Page\":\"Timeline\",\"Action\":\"Write Comment\"}', '19:26:30', '2020-11-24'),
(2244, 12, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '19:26:30', '2020-11-24'),
(2245, 12, '{\"Page\":\"Profile\",\"Action\":\"Updating His\\/Her Account Profile\"}', '19:26:58', '2020-11-24'),
(2246, 12, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '19:27:04', '2020-11-24'),
(2247, 12, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '19:27:40', '2020-11-24'),
(2248, 12, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '19:27:54', '2020-11-24'),
(2249, 7, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '19:27:58', '2020-11-24'),
(2250, 7, '{\"Page\":\"Logout\",\"Action\":\"Session Out\"}', '20:51:37', '2020-11-24'),
(2251, 10, '{\"Page\":\"Login\",\"Action\":\"Session In\"}', '20:51:41', '2020-11-24'),
(2252, 10, '{\"Page\":\"Timeline\",\"Action\":\"View Post\"}', '00:49:14', '2020-11-25');

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
(45, 'orekiredgrave', 'orekiredgrave@gmail.com', '1234', '', 0, 'DEPARTMENT', 0, 1, 1, '20:55:00', '2020-11-22'),
(48, 'Testing', 'monalfredreyes1997@gmail.com', '1234', '1234', 980096692, 'STUDENT', 0, 1, 1, '19:17:55', '2020-11-24');

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
(3, 15730500, 'Diploma', 0, 0, '2020-11-24', '21:49:40', '', '');

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
(22, 0, 'Grade Slip', '1', 0, 0, 50, 'receipt_long', '2020-09-27', '10:29:52'),
(28, 7, 'Diploma', 'College Payment Slip', 0, 1, 600, 'school', '2020-11-23', '22:19:51'),
(31, 4, 'Student ID', '1', 0, 1, 50, '', '2020-11-22', '05:43:18'),
(32, 4, 'Enrollment Fee', '1', 0, 1, 50, '', '2020-11-22', '06:54:51'),
(33, 7, 'esad', '31232 dasda', 1, 1, 12, '', '2020-11-23', '22:09:03');

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
(43, 0, 7, '{\"Text\":\"Add some Text here\",\"Image\":[\"12.png\"]}', '2020-11-22', '21:08:16'),
(44, 0, 7, '{\"Text\":\"dawdawdaw\",\"Image\":[]}', '2020-11-24', '04:47:09');

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
(19, 15730500, 'GRADE SLIP', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"50\",\"TransactionFee\":0,\"TransactionCash\":\"961\"}', '01:58:16', '2020-11-07'),
(20, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"1000\",\"TransactionAmount\":\"20000\",\"TransactionCash\":\"21000\"}', '03:55:23', '2020-11-21'),
(21, 15730500, 'FEE(SCHOOL TUITION)', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"10000\",\"TransactionFee\":\"10000\",\"TransactionCash\":\"20000\"}', '03:55:59', '2020-11-21'),
(22, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"100\",\"TransactionAmount\":\"1000\",\"TransactionCash\":\"1100\"}', '04:09:08', '2020-11-21'),
(23, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"0\",\"TransactionAmount\":\"1\",\"TransactionCash\":\"1\"}', '04:13:01', '2020-11-21'),
(24, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"0\",\"TransactionAmount\":\"1\",\"TransactionCash\":\"1\"}', '08:02:35', '2020-11-22'),
(25, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"0\",\"TransactionAmount\":\"1\",\"TransactionCash\":\"1\"}', '08:05:01', '2020-11-22'),
(26, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"0\",\"TransactionAmount\":\"1\",\"TransactionCash\":\"1\"}', '08:06:17', '2020-11-22'),
(27, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"0\",\"TransactionAmount\":\"1\",\"TransactionCash\":\"1\"}', '08:07:30', '2020-11-22'),
(28, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"0\",\"TransactionAmount\":\"1\",\"TransactionCash\":\"1\"}', '08:08:04', '2020-11-22'),
(29, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"1000\",\"TransactionAmount\":\"21000\",\"TransactionCash\":\"22000\"}', '04:00:12', '2020-11-24'),
(30, 15730500, 'FEE(SCHOOL TUITION)', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"1000\",\"TransactionFee\":\"19000\",\"TransactionCash\":\"21000\"}', '05:58:14', '2020-11-24'),
(31, 15730500, 'FEE(SCHOOL TUITION)', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"1000\",\"TransactionFee\":\"18000\",\"TransactionCash\":\"20000\"}', '06:00:07', '2020-11-24'),
(32, 15730500, 'FEE(SCHOOL TUITION)', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"1\",\"TransactionFee\":\"21000\",\"TransactionCash\":\"19000\"}', '06:13:59', '2020-11-24'),
(33, 15730500, 'FEE(SCHOOL TUITION)', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"18000\",\"TransactionFee\":\"20999\",\"TransactionCash\":\"18999\"}', '06:14:45', '2020-11-24'),
(34, 15730500, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"15730500\",\"TransactionFee\":\"1000\",\"TransactionAmount\":\"10000\",\"TransactionCash\":\"11000\"}', '06:18:50', '2020-11-24'),
(35, 15730500, 'FEE(SCHOOL TUITION)', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"3999\",\"TransactionFee\":\"3999\",\"TransactionCash\":\"10999\"}', '06:19:15', '2020-11-24'),
(36, 15730500, 'FEE(SCHOOL TUITION)', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"10\",\"TransactionFee\":\"10\",\"TransactionCash\":\"7000\"}', '06:21:46', '2020-11-24'),
(37, 1234, 'DEPOSITS', '{\"EmployeeID\":\"4\",\"StudentID\":\"1234\",\"TransactionFee\":\"1000\",\"TransactionAmount\":\"20000\",\"TransactionCash\":\"21000\"}', '19:25:32', '2020-11-24'),
(38, 1234, 'FEE(SCHOOL TUITION)', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"1234\",\"TransactionAmount\":\"10000\",\"TransactionFee\":\"10000\",\"TransactionCash\":\"20000\"}', '19:26:14', '2020-11-24'),
(39, 15730500, '1', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"50\",\"TransactionFee\":0,\"TransactionCash\":\"6990\"}', '20:57:01', '2020-11-24'),
(40, 15730500, '1', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"50\",\"TransactionFee\":0,\"TransactionCash\":\"6940\"}', '20:57:09', '2020-11-24'),
(41, 15730500, 'COLLEGE PAYMENT SLIP', '{\"EmployeeID\":\"N\\/A\",\"StudentID\":\"15730500\",\"TransactionAmount\":\"600\",\"TransactionFee\":0,\"TransactionCash\":\"6890\"}', '21:49:40', '2020-11-24');

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
  MODIFY `AssessmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2253;

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
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `StoreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `TimelineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
