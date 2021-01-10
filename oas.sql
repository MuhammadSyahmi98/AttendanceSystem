-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 11:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
  `admin_contact` varchar(255) NOT NULL,
  `admin_email` varchar(9999) NOT NULL,
  `admin_password` varchar(9999) NOT NULL,
  `admin_login` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`, `admin_login`) VALUES
(1, 'Admin Satu', '019-6399925', 'admin@gmail.com', '12345678', '1'),
(2, 'Admin dua', '011-11113676', 'admin2@gmail.com', 'Syahmi@98', '1'),
(4, 'admin4', '0126518626', 'admin4@gmail.com', 'Admin@76', '1'),
(5, 'admin5', '0126029231', 'admin5@gmail.com', 'Qwerty@67', '1'),
(6, 'Syahmi Jalil', '0128545676', 'admin6@gmail.com', 'Syahmi@12', '1'),
(7, 'Muhammad Syahmi Bin Abdul Jalil', '0128545676', 'syahmijalil12@gmail.com', 'Qwerty@12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `time_in` time DEFAULT NULL,
  `dates` date NOT NULL,
  `attend_status` varchar(30) NOT NULL,
  `attendance_img` longblob DEFAULT NULL,
  `student_id` varchar(767) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `time_in`, `dates`, `attend_status`, `attendance_img`, `student_id`) VALUES
(187, NULL, '2021-01-10', 'Absent', NULL, 'AB45234F'),
(188, NULL, '2021-01-10', 'Absent', NULL, '6E296CAF'),
(189, NULL, '2021-01-10', 'Absent', NULL, '1ACD7D19'),
(190, NULL, '2021-01-10', 'Absent', NULL, 'BE2C1D65'),
(191, NULL, '2021-01-10', 'Absent', NULL, 'F434AB3'),
(192, NULL, '2021-01-10', 'Absent', NULL, 'FFF54B'),
(193, NULL, '2021-01-10', 'Absent', NULL, '9E046DAF'),
(194, NULL, '2021-01-10', 'Absent', NULL, 'ACB54FE'),
(195, NULL, '2021-01-10', 'Absent', NULL, 'CEB477AF'),
(196, NULL, '2021-01-10', 'Absent', NULL, '2C6622C2'),
(197, NULL, '2021-01-10', 'Absent', NULL, 'F5664BE'),
(198, NULL, '2021-01-10', 'Absent', NULL, 'FFFEE45'),
(199, NULL, '2021-01-10', 'Absent', NULL, '2EF8D87B');

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
(4, '1 Pintar'),
(5, '1 Bijak'),
(6, '2 Pintar'),
(7, '2 Bijak'),
(8, '3 Pintar'),
(9, '3 Bijak'),
(10, '4 Pintar'),
(11, '4 Bijak'),
(12, '5 Pintar'),
(13, '5 Bijak');

-- --------------------------------------------------------

--
-- Table structure for table `class_history`
--

CREATE TABLE `class_history` (
  `classHistory_id` int(11) NOT NULL,
  `classHistory_date` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_history`
--

INSERT INTO `class_history` (`classHistory_id`, `classHistory_date`, `class_id`, `teacher_id`) VALUES
(13, '2021-01-10', 5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `device_mode`
--

CREATE TABLE `device_mode` (
  `device_mode_id` int(11) NOT NULL,
  `device_code` int(11) NOT NULL,
  `device_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_mode`
--

INSERT INTO `device_mode` (`device_mode_id`, `device_code`, `device_description`) VALUES
(1, 1, 'device mode');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_date`
--

CREATE TABLE `holiday_date` (
  `holiday_id` int(11) NOT NULL,
  `holiday_type` varchar(9999) NOT NULL,
  `holiday_start` date NOT NULL,
  `holiday_end` date NOT NULL,
  `holiday_description` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday_date`
--

INSERT INTO `holiday_date` (`holiday_id`, `holiday_type`, `holiday_start`, `holiday_end`, `holiday_description`) VALUES
(14, 'National Holiday', '2021-01-03', '2021-01-03', 'blob'),
(16, 'State Holiday', '2021-01-11', '2021-01-14', 'Cuti Sekolah'),
(17, 'School Holiday', '2021-01-11', '2021-01-12', 'Hari rayaa');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `parent_email` varchar(100) NOT NULL,
  `parent_password` varchar(100) NOT NULL,
  `parent_contact` varchar(30) NOT NULL,
  `parent_login` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `parent_name`, `parent_email`, `parent_password`, `parent_contact`, `parent_login`) VALUES
(22, 'Muhammad Syahir Syahmi Bin Annuar r', 'syahir76@gmail.com', 'Syakir@12', '012-4567543', '1'),
(23, 'Luhman Musa Bin Abdul Mutalip', 'luhmanmusa@gmail.com', '1234567', '012-3453214', '0'),
(24, 'Aina Asyikin Binti Mohammad Zaki', 'aina@yahoo.com', 'qwerty', '019-4543245', '0'),
(25, 'Nurul Aqilah Shahirah Binti Amirudin', 'aqilah@gmail.com', '1234', '011-34534345', '0'),
(26, 'Muhammad Afif Syakir Bin Razali', 'afifAkey@gmail.com', '1234567', '016-2453456', '0'),
(27, 'Nurul Afiqah Binti Halim', 'afiqah@gmail.com', 'qwerty', '019-6399925', '0'),
(28, 'Nur Fajar Adilah', 'adilah65@yahoo.com', 'poiuyt', '019-4532456', '0'),
(29, 'Muhammad Nazmi Bin Nordin', 'nazmi@yahoo.com', 'zxcvb', '017-3443243', '0'),
(30, 'Nor Afieqa Binti Mahdi', 'Afieqa@gmail.com', 'lkjhg', '018-4532456', '0'),
(31, 'Nursyafiqah Adilla Binti Mohd Syafiq', 'nursyafiqah@gmail.com', 'zxcvb', '019-4532452', '0'),
(32, 'Nurul Natasya Binti Supri', 'natasha@gmail.com', '123', '019-6399342', '0'),
(33, 'Anbu Selvi AP M Paramasivan', 'anbu@gmail.com', 'qwert', '019-6399925', '0'),
(34, 'Thivya Tamil Selvam', 'thivya@gmail.com', 'asdfg', '012-5467342', '0'),
(35, 'Nurfazana Amirah Binti Adnan', 'amirah@gmail.com', 'qwerty', '012-4556787', '0'),
(36, 'Muhammad Asnawi Bin Hashim', 'asnawi@gmail.com', 'qwert', '016-7645833', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(767) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_ic` varchar(9999) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_status` varchar(100) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_ic`, `student_address`, `student_status`, `class_id`, `parent_id`) VALUES
('1ACD7D19', 'Elly Surfina Binti Suhaimi', '081223-02-3424', 'No 13 Jalan TU 34,', 'Active', 5, 24),
('2C6622C2', 'Muhammad Amir Bin Muhammad Nazmi', '090101-01-5222', 'No 13 Jalan TU 34,', 'Active', 6, 29),
('2EC7D77B', 'Navin AL Ganeasan', '070313-01-3242', 'No 13 Jalan TU 34,', 'Active', 9, 34),
('2EF8D87B', 'Nur Atiqah Binti Adnan', '060101-01-3431', 'TL 87 Jalan Masjid Serom 3 Sungai Mati', 'Active', 9, 35),
('6E296CAF', 'Nurul Aqilah Binti Luhman Musa', '080223-02-6054', 'TL 87 Jalan Masjid Serom 3 Sungai Mati', 'Active', 5, 23),
('9E046DAF', 'Mohd Izwan Bin Muhammad Afif Syakir', '070910-01-6578', 'No 13 Jalan TU 34,', 'Active', 7, 26),
('AB45234F', 'Muhammad Abdullah Bin Muhammad Syahir Syahmi', '080223-02-4779', 'TL 87 Jalan Masjid Serom 3 Sungai Mati', 'Active', 5, 22),
('ACB54FE', 'Mohammad Aiman Bin Fajar', '070313-01-6578', 'No 13 Jalan TU 34,', 'Active', 7, 28),
('BE2C1D65', 'Ahmad Nazirul Asfraf Bin Muhammad Syahmi', '081023-02-3412', 'Tl 90 Jalan Masjid Serom 3', 'Active', 4, 25),
('CEB477AF', 'Muhammad Awal Ramadhan Bin  Halim', '070916-01-5444', 'No 13 Jalan TU 34,', 'Active', 7, 27),
('F434AB3', 'Muhammad Syahmi Hilmi Bin Annuar', '080223-02-6055', 'No 13 Jalan TU 34,', 'Active', 4, 22),
('F5664BE', 'Khadijah Arwa Binti Mahdi', '090523-01-5436', 'TL 87 Jalan Masjid Serom 3 Sungai Mati', 'Active', 6, 30),
('FFF54B', 'Nur Nazira Dayana Binti Muhammad Afif Syakir', '080223-02-6058', 'No 13 Jalan TU 34,', 'Active', 4, 26),
('FFFEE45', 'Nur Amni Binti Syafiq', '090313-01-3241', 'No 13 Jalan TU 34,', 'Active', 6, 31);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_password` varchar(9999) NOT NULL,
  `teacher_contact` varchar(9999) NOT NULL,
  `teacher_login` varchar(255) NOT NULL DEFAULT '0',
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_contact`, `teacher_login`, `class_id`) VALUES
(6, 'Fatimah Binti Ali', 'fatimahAli@gmail.com', 'Qwerty@12', '013-45678905', '1', NULL),
(9, 'Tengku Hazim Bin Tengku Azis', 'tengku@gmail.com', '1234', '019-8765473', '0', NULL),
(10, 'Nurhafizi Bin Abu Bakar', 'hafizi43@gmail.com', '1234', '012-7463823', '0', NULL),
(11, 'Asnawi Binti Hashim', 'awi@yahoo.com', '1234', '012-5431554', '0', 5),
(12, 'Aliff Bin Pa\'ais', 'aliff@gmail.com', '1234', '012-6518626', '0', NULL),
(13, 'Ku Aiman Afnan Bin Ku Ria', 'ku@gmail.com', '1234', '019-9999999', '0', NULL),
(14, 'Azrul Afiq Bin Abdul Aziz', 'azrulAfiq@gmail.com', '1234', '012-4323534', '0', NULL),
(15, 'Muhammad Firdaus Bin Abdul Rahim ', 'firdaus.my@gmail.com', '12345', '011-45324532', '0', NULL),
(16, 'Hanis Afifah Binti Harun', 'afifah@gmail.com', '1234', '012-4564357', '0', NULL),
(17, 'Nurhidayah Binti Mohd Lazim', 'dayah@gmail.com', '12345', '018-3456334', '0', NULL);

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
-- Indexes for table `class_history`
--
ALTER TABLE `class_history`
  ADD PRIMARY KEY (`classHistory_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

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
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_foreign_key_name` (`class_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `fk_foreign_key_name2` (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class_history`
--
ALTER TABLE `class_history`
  MODIFY `classHistory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `device_mode`
--
ALTER TABLE `device_mode`
  MODIFY `device_mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holiday_date`
--
ALTER TABLE `holiday_date`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_foreign_key_name1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_history`
--
ALTER TABLE `class_history`
  ADD CONSTRAINT `class_history_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `class_history_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_foreign_key_name2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
