-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 03:58 PM
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
-- Database: `2b_albania_johnpaul_exer4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(2, 'johnpaulalbania27.buzz@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `id` int(30) NOT NULL,
  `bookid` varchar(20) NOT NULL,
  `studentid` varchar(100) NOT NULL,
  `issuedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `returndate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`id`, `bookid`, `studentid`, `issuedate`, `returndate`) VALUES
(14, '6', 'SID01', '2023-11-16 10:19:56', '2023-11-23 11:02:07'),
(15, '9', 'SID01', '2023-11-16 10:20:17', '2023-11-23 04:16:56'),
(16, '9', 'SID04', '2023-11-16 10:29:35', '2023-11-23 04:15:38'),
(17, '10', 'SID01', '2023-11-16 14:22:57', '2023-11-23 04:17:21'),
(18, '6', 'SID02', '2023-11-17 12:09:28', '2023-11-23 04:19:42'),
(20, '11', 'SID01', '2023-11-19 08:23:57', '2023-11-23 06:49:04'),
(21, '10', 'sid04', '2023-11-23 01:24:46', '2023-11-23 04:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbautor`
--

CREATE TABLE `tbautor` (
  `id` int(30) NOT NULL,
  `authorname` varchar(30) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbautor`
--

INSERT INTO `tbautor` (`id`, `authorname`, `createddate`, `updatedate`) VALUES
(1, 'paul22222', '2023-11-23 08:27:25', '2023-11-23 08:27:25'),
(2, 'John Paul Albania', '2023-11-15 07:45:32', NULL),
(3, 'JP3', '2023-11-23 08:18:25', '2023-11-23 08:18:25'),
(4, 'JP ALB', '2023-11-15 07:52:48', NULL),
(5, 'Frankienstein', '2023-11-16 11:40:18', NULL),
(6, 'Jose Rizal', '2023-11-16 12:40:33', NULL),
(7, 'Elaine', '2023-11-16 12:42:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbbooks`
--

CREATE TABLE `tbbooks` (
  `id` int(30) NOT NULL,
  `bookName` varchar(30) NOT NULL,
  `bookAuthors` varchar(30) NOT NULL,
  `bookCategory` varchar(30) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `bookimg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbbooks`
--

INSERT INTO `tbbooks` (`id`, `bookName`, `bookAuthors`, `bookCategory`, `isbn`, `bookimg`) VALUES
(5, 'Change12', 'John Paul Albania', 'Technology', 'gsgd', '3.jpg'),
(6, 'JavaHEHE', 'paul', 'Programming', '12dq41213', '1.jpg'),
(7, 'Happy Birthday', 'paul', '', '12ffafde', 'c.png'),
(9, 'Database', 'John Paul Albania', 'Programming', 'IT103', 'ad.png'),
(10, 'NBA2K23', 'JP ALB', 'Sci-Fi', '2K23', 'dab4009d4464c081ce5400958103f8e6.jpg'),
(11, 'Object Oriented Programming', 'Elaine', 'Anime', 'It101', 'i.png'),
(12, 'Happy Birthday', 'John Paul Albania', 'Sci-Fi', '7694266', 'Screenshot_2023-11-17-22-59-06-896_com.android.vending[1].jpg'),
(13, 'LOL', 'Frankienstein', 'Romantic', '717171', 'Screenshot (9).png'),
(17, 'asrgdfg', 'Jose Rizal', 'Romantic', 'aethgbdfa', 'Screenshot (7).png'),
(18, 'asdfgdf', 'JP ALB', 'Sci-Fi', 'afdsg6uerf2452', 'Screenshot (1).png'),
(19, 'asdfgads', 'JP ALB', 'Programming', 'asdg', 'Screenshot (3).png');

-- --------------------------------------------------------

--
-- Table structure for table `tbgenre`
--

CREATE TABLE `tbgenre` (
  `id` int(10) NOT NULL,
  `genrename` varchar(30) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbgenre`
--

INSERT INTO `tbgenre` (`id`, `genrename`, `createddate`, `updationdate`) VALUES
(1, 'Technology of the world', '2023-11-23 12:35:11', '2023-11-23 13:03:40'),
(2, 'Programming', '2023-11-23 12:35:11', NULL),
(3, 'Romantic', '2023-11-23 12:35:11', NULL),
(4, 'Sci-Fi', '2023-11-23 12:35:11', NULL),
(7, 'Horror', '2023-11-23 12:35:11', NULL),
(8, 'Anime', '2023-11-23 12:35:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbsignup`
--

CREATE TABLE `tbsignup` (
  `id` int(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `mobilenumber` varchar(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `SID` varchar(30) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbsignup`
--

INSERT INTO `tbsignup` (`id`, `fullname`, `mobilenumber`, `Email`, `password`, `SID`, `regdate`) VALUES
(35, 'HEHEHE', '09916801691', 'johnpaulzer27@gmail.com', 'Prototype27', 'SID01', '2023-11-19 07:44:17'),
(36, 'JPAUL', '09916801693', 'johnpaul.albania@cbsua.edu.ph', '$2y$10$MSbfksVUEFogQvlYxiPgyeyM/6eI8XgvC44iFPDK.Sgj65bLHYRHm', 'SID02', '2023-11-21 01:15:14'),
(37, 'Pol', '09916801692', 'jennyjeanpolan@gmail', '$2y$10$OKEuSt/F/8zR3.ExjtpqG.rdIcTrJh2ib4YpgS7eYWwRFHsRxbpWa', 'SID03', '2023-11-21 01:17:02'),
(38, 'John Smiths', '09916801693', 'johnsmith@gmail.ccom', 'pol', 'SID04', '2023-11-21 01:24:20'),
(39, 'Polpo', '09916801691', 'pauls@gmail.com', 'adminadmin', 'SID05', '2023-11-19 06:00:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbautor`
--
ALTER TABLE `tbautor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbbooks`
--
ALTER TABLE `tbbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbgenre`
--
ALTER TABLE `tbgenre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbsignup`
--
ALTER TABLE `tbsignup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `issuebook`
--
ALTER TABLE `issuebook`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbautor`
--
ALTER TABLE `tbautor`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `tbbooks`
--
ALTER TABLE `tbbooks`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbgenre`
--
ALTER TABLE `tbgenre`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbsignup`
--
ALTER TABLE `tbsignup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
