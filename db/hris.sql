-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 12:46 PM
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
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `access_id` int(11) NOT NULL,
  `access_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`access_id`, `access_desc`) VALUES
(1, 'Employee'),
(2, 'Head of Department'),
(3, 'Administrative Officer'),
(4, 'President and Deans');

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
(4, 'Assistant Professor'),
(5, 'Lecturer'),
(6, 'Associate Lecturer'),
(7, 'Asst. Lecturer'),
(8, 'Sr. Lab Technician'),
(9, 'Sr. Lab Assistant'),
(10, 'Lab Assistant'),
(11, 'ADM OFFICER'),
(12, 'Senior ADM Assistant'),
(13, 'Store Incharge'),
(14, 'Estate Manager'),
(15, 'Student Service Officer'),
(16, 'ADM Assistant'),
(17, 'Research Officer'),
(18, 'Carpenter'),
(19, 'Personal Assistant'),
(20, 'Electrician'),
(21, 'Library Assistant'),
(22, 'SR. ICT OFFICER'),
(23, 'ICT OFFICER'),
(24, 'ICT Associate'),
(25, 'FINANCE OFFICER'),
(26, 'ASSISTANT FINANCE OFFICER'),
(27, 'Accountant'),
(28, 'Cook'),
(29, 'Sweeper');

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
(20131004347, 11915000409, 'Karma Tenzin', 'Male', '1991-06-23', '02190172.cst@rub.edu.bt', 1234564, 2, 1, 'Bhutanese', 'nn', 1, 4),
(20131004348, 11915000410, 'Dorji Khandu', 'Male', '1994-01-23', 'govindaghr@yahoo.com', 1234565, 4, 2, 'Bhutanese', 'Hello', 1, 16),
(20131004349, 11305001919, 'Govinda Ghimeray', 'Male', '1990-10-01', 'govindaghr@yahoo.com', 1234563, 24, 1, 'Bhutanese', 'Rinchending', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `emp_id` bigint(14) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_level` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`emp_id`, `password`, `access_level`, `last_login`, `status`) VALUES
(20131004347, '6367c48dd193d56ea7b0baad25b19455e529f5ee', 3, '2021-11-23 21:30:23', 1),
(20131004348, '6367c48dd193d56ea7b0baad25b19455e529f5ee', 2, '2021-11-23 21:25:59', 1),
(20131004349, '6367c48dd193d56ea7b0baad25b19455e529f5ee', 3, '2021-11-24 14:16:06', 1),
(20131004350, '6367c48dd193d56ea7b0baad25b19455e529f5ee', 4, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `performance_rating`
--

CREATE TABLE `performance_rating` (
  `pr_id` int(11) NOT NULL,
  `emp_id` bigint(14) DEFAULT NULL,
  `fiscal_yr` varchar(10) DEFAULT NULL,
  `rating` float(3,2) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance_rating`
--

INSERT INTO `performance_rating` (`pr_id`, `emp_id`, `fiscal_yr`, `rating`, `remarks`) VALUES
(2, 20131004349, '2017-2018', 3.50, 'sdf'),
(4, 20131004349, '2018-2019', 3.00, 'good');

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
  `nominated_for` varchar(100) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `nomination_date` date NOT NULL,
  `nominated_by` bigint(14) NOT NULL,
  `date_approved` date DEFAULT NULL,
  `approved_by` bigint(14) DEFAULT NULL,
  `approval_status` varchar(10) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_release`
--

INSERT INTO `staff_release` (`sr_id`, `empid`, `nominated_for`, `start_date`, `end_date`, `nomination_date`, `nominated_by`, `date_approved`, `approved_by`, `approval_status`, `remarks`) VALUES
(2, 20131004347, 'CCNA Training at Paro', '2021-11-01', '2021-11-23', '2021-11-23', 20131004349, '2021-11-24', 20131004349, 'Approved', 'ff');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(2) NOT NULL,
  `status_desc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_desc`) VALUES
(1, 'Active'),
(2, 'Inactive');

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
  `remarks` varchar(255) NOT NULL,
  `verification_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`tr_id`, `course_title`, `start_date`, `end_date`, `emp_id`, `funding_source`, `remarks`, `verification_status`) VALUES
(1, 'BEEE', '2021-11-05', '2021-11-26', 20131004349, 'Private', 'sdfg', 0),
(4, 'Cisco CCNA', '2021-11-02', '2021-11-22', 20131004349, 'Private', 'yes', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`access_id`);

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
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `access_level` (`access_level`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `performance_rating`
--
ALTER TABLE `performance_rating`
  ADD PRIMARY KEY (`pr_id`),
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
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

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
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `desig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `performance_rating`
--
ALTER TABLE `performance_rating`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department`) REFERENCES `department` (`dept_id`) ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`access_level`) REFERENCES `access_level` (`access_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`) ON UPDATE CASCADE;

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
