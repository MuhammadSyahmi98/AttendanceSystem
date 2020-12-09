-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 08:25 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(9999) NOT NULL,
  `admin_email` varchar(9999) NOT NULL,
  `admin_password` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `dates` date NOT NULL,
  `attend_status` varchar(30) NOT NULL,
  `student_id` varchar(767) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `time_in`, `dates`, `attend_status`, `student_id`) VALUES
(21, '08:02:24', '0000-00-00', 'Attend', '1ACD7D19'),
(22, '08:02:50', '2010-12-12', 'Attend', '1ACD7D19'),
(24, '15:22:03', '2020-12-09', 'Attend', '1ACD7D19');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(255) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(1, '5 Pintar');

-- --------------------------------------------------------

--
-- Table structure for table `device_mode`
--

CREATE TABLE `device_mode` (
  `device_mode_id` int(11) NOT NULL,
  `device_mode_code` int(11) NOT NULL,
  `device_mode_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_mode`
--

INSERT INTO `device_mode` (`device_mode_id`, `device_mode_code`, `device_mode_description`) VALUES
(1, 2, 'device mode');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_date`
--

CREATE TABLE `holiday_date` (
  `holiday_id` int(11) NOT NULL,
  `holiday_description` varchar(9999) NOT NULL,
  `holiday_start` date NOT NULL,
  `holiday_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(767) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_ic` varchar(9999) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `parent_email` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_ic`, `parent_name`, `parent_email`, `class_id`) VALUES
('1ACD7D19', 'Muhammad Syahmi', '990422025095', 'Abdul Jalil Bin M.Amdan', 'syahmijalil12@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `teacher_email` varchar(100) NOT NULL,
  `teacher_password` varchar(9999) NOT NULL,
  `class_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `fk_foreign_key_name1` (`student_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `device_mode`
--
ALTER TABLE `device_mode`
  ADD PRIMARY KEY (`device_mode_id`);

--
-- Indexes for table `holiday_date`
--
ALTER TABLE `holiday_date`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_foreign_key_name` (`class_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `fk_foreign_key_name2` (`class_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `device_mode`
--
ALTER TABLE `device_mode`
  MODIFY `device_mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `holiday_date`
--
ALTER TABLE `holiday_date`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_foreign_key_name1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_foreign_key_name2` FOREIGN KEY (`class_ID`) REFERENCES `class` (`class_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
