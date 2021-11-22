-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 03:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'ICT'),
(2, 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `desig_id` int(11) NOT NULL,
  `desig_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`desig_id`, `desig_name`) VALUES
(1, 'President'),
(2, 'Professor'),
(3, 'Associate Professor'),
(4, 'Assistant Professor');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` bigint(14) NOT NULL,
  `cid` bigint(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `service_status` int(11) NOT NULL,
  `position_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `cid`, `name`, `gender`, `dob`, `email`, `mobile`, `designation`, `department`, `nationality`, `address`, `service_status`, `position_level`) VALUES
(20131004349, 11305001919, 'Govinda Ghimeray', 'Male', '1990-10-01', 'govindaghr@yahoo.com', 1234563, 1, 1, 'Bhutanese', 'wert', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `emp_id` bigint(14) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_level` int(1) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`emp_id`, `password`, `access_level`, `last_login`) VALUES
(20131004347, '6367c48dd193d56ea7b0baad25b19455e529f5ee', 3, '2021-11-18 20:16:17'),
(20131004348, '6367c48dd193d56ea7b0baad25b19455e529f5ee', 2, '2021-11-19 17:22:04'),
(20131004349, '6367c48dd193d56ea7b0baad25b19455e529f5ee', 1, '2021-11-19 17:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `performance_rating`
--

CREATE TABLE `performance_rating` (
  `emp_id` bigint(14) DEFAULT NULL,
  `fiscal_yr` varchar(10) DEFAULT NULL,
  `rating` float(3,2) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `position_level`
--

CREATE TABLE `position_level` (
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position_level`
--

INSERT INTO `position_level` (`pos_id`, `pos_name`) VALUES
(1, 'EX1'),
(2, 'EX2'),
(3, 'EX3'),
(4, 'ES1'),
(5, 'ES2'),
(6, 'ES3'),
(7, 'P1'),
(8, 'P2'),
(9, 'P3'),
(10, 'P4'),
(11, 'P5'),
(12, 'S1'),
(13, 'S2'),
(14, 'S3'),
(15, 'S4'),
(16, 'S5'),
(17, 'O1'),
(18, 'O2'),
(19, 'O3'),
(20, 'ESP'),
(21, 'GSP');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `q_id` int(11) NOT NULL,
  `emp_id` bigint(14) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `qualification_level` int(11) NOT NULL,
  `funding_source` varchar(100) NOT NULL,
  `country` varchar(30) NOT NULL,
  `college` varchar(50) NOT NULL,
  `certificate` varchar(100) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `verification_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`q_id`, `emp_id`, `course_title`, `qualification_level`, `funding_source`, `country`, `college`, `certificate`, `start_date`, `end_date`, `remarks`, `verification_status`) VALUES
(1, 20131004349, 'BEIT', 1, 'Private', 'Bhutan', 'CST', NULL, '2021-11-01', '2021-11-30', 'sdfgnn', 0),
(13, 20131004349, 'BEIT', 4, 'Private', 'Bhutan', 'CST', NULL, '2021-11-01', '2021-11-30', 'Test Comment', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qualification_level`
--

CREATE TABLE `qualification_level` (
  `ql_id` int(11) NOT NULL,
  `ql_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualification_level`
--

INSERT INTO `qualification_level` (`ql_id`, `ql_name`) VALUES
(1, 'Phd'),
(2, 'Masters'),
(3, 'Bachelors'),
(4, 'Diploma'),
(5, 'Certificate'),
(6, 'High School'),
(7, 'Middle School');

-- --------------------------------------------------------

--
-- Table structure for table `staff_release`
--

CREATE TABLE `staff_release` (
  `sr_id` int(11) NOT NULL,
  `empid` bigint(14) NOT NULL,
  `start_date` date NOT NULL,
  `end-date` date NOT NULL,
  `nomination_date` date NOT NULL,
  `nominated_by` bigint(14) NOT NULL,
  `date_approved` date NOT NULL,
  `approved_by` bigint(14) NOT NULL,
  `approval_status` int(1) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `tr_id` int(11) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `emp_id` bigint(14) NOT NULL,
  `funding_source` varchar(50) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`tr_id`, `course_title`, `start_date`, `end_date`, `emp_id`, `funding_source`, `remarks`) VALUES
(1, 'BEEE', '2021-11-05', '2021-11-26', 20131004349, 'Private', 'sdfg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`desig_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `cid` (`cid`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `performance_rating`
--
ALTER TABLE `performance_rating`
  ADD KEY `fiscal_yr` (`fiscal_yr`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `position_level`
--
ALTER TABLE `position_level`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `qualification_level` (`qualification_level`);

--
-- Indexes for table `qualification_level`
--
ALTER TABLE `qualification_level`
  ADD PRIMARY KEY (`ql_id`);

--
-- Indexes for table `staff_release`
--
ALTER TABLE `staff_release`
  ADD PRIMARY KEY (`sr_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `desig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `position_level`
--
ALTER TABLE `position_level`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `qualification_level`
--
ALTER TABLE `qualification_level`
  MODIFY `ql_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff_release`
--
ALTER TABLE `staff_release`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department`) REFERENCES `department` (`dept_id`) ON UPDATE CASCADE;

--
-- Constraints for table `qualification`
--
ALTER TABLE `qualification`
  ADD CONSTRAINT `qualification_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`employee_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `qualification_ibfk_2` FOREIGN KEY (`qualification_level`) REFERENCES `qualification_level` (`ql_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
