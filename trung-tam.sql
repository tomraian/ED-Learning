-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 06:55 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trung-tam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `adminEmail` varchar(150) CHARACTER SET utf8 NOT NULL,
  `adminUser` varchar(255) CHARACTER SET utf8 NOT NULL,
  `adminPass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `adminLevel` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `adminLevel`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'e807f1fcf82d132f9bb018ca6738a19f', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `classId` int(11) NOT NULL,
  `className` varchar(255) NOT NULL,
  `coursesId` int(11) NOT NULL,
  `classDesc` varchar(255) NOT NULL,
  `classPrice` varchar(255) NOT NULL,
  `classTeacher` varchar(255) NOT NULL,
  `classMentor` varchar(255) NOT NULL,
  `classTeacherAvatar` varchar(255) NOT NULL,
  `classMentorAvatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`classId`, `className`, `coursesId`, `classDesc`, `classPrice`, `classTeacher`, `classMentor`, `classTeacherAvatar`, `classMentorAvatar`) VALUES
(1, 'Khóa 1', 2, 'Khóa 1 dành cho những người mới bắt đầu ', '111111', 'Duy ', 'Duy 2 ', 'b72ee3e39ankqVuJiD2o.jpg', 'b72ee3e39a7w0PLEe91l.jpg'),
(2, 'Khóa 2', 2, 'Khóa 2 dành cho những người mới bắt đầu hihihhihihiashjdasjdl', '213123', 'Duy ', 'Duy 2 ', 'b43ff0cd5aalsAYHhIzi.jpg', 'b43ff0cd5abyB0RDCzV4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `coursesId` int(11) NOT NULL,
  `coursesName` varchar(255) NOT NULL,
  `coursesDesc` varchar(255) NOT NULL,
  `coursesImage` varchar(255) DEFAULT NULL,
  `coursesStatus` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`coursesId`, `coursesName`, `coursesDesc`, `coursesImage`, `coursesStatus`) VALUES
(2, 'Khóa học dành cho trẻ từ 4 đến 6 tuổi', 'Khóa học dành cho trẻ từ 4 đến 6 tuổi', NULL, b'0'),
(4, 'asd asdasdas asd asd asd ad ee1dasd áda', 'a sdasd asda sd sadf sà 23rfsdf sdq3', NULL, b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`classId`);

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`coursesId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `classId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `coursesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
