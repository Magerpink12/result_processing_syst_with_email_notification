-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 03:57 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `dob`, `gender`, `address`, `lga`, `state`, `phone`, `password`, `picture`, `email`) VALUES
(1, 'Isah Ahmad', '2022-06-09', 'M', 'savannah street low-cost area, Potiskum, Yobe State', 'Geidam', 'Yobe', '344', '123', 'admins_pics/admin_4734.jpg', 'paisah12.ia@g.com');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `form_master_id` int(11) NOT NULL,
  `subjects` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `form_master_id`, `subjects`) VALUES
(2, 'JSS 2 B', 1, '[\"ENG\",\"MTH\",\"PHE\",\"HAUSA\"]'),
(3, 'SSS1 A', 1, '[\"PHE\",\"Hausa\"]'),
(6, 'JSS1', 1, '[\"ENG\",\"MTH\",\"PHE\"]');

-- --------------------------------------------------------

--
-- Table structure for table `jss1`
--

CREATE TABLE `jss1` (
  `id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `first_ca` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `second_ca` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `exams` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jss1`
--

INSERT INTO `jss1` (`id`, `roll_no`, `first_ca`, `second_ca`, `exams`) VALUES
(17, 1, '{\"ENG\":55,\"MTH\":33,\"PHE\":66}', '', ''),
(18, 2, '{\"ENG\":12,\"MTH\":22,\"PHE\":2}', '', ''),
(19, 3, '{\"ENG\":4,\"MTH\":3,\"PHE\":3}', '', ''),
(20, 4, '{\"ENG\":3,\"MTH\":4,\"PHE\":2}', '', ''),
(21, 5, '{\"ENG\":12,\"MTH\":22,\"PHE\":3}', '', ''),
(22, 6, '{\"ENG\":34,\"MTH\":3,\"PHE\":2}', '', ''),
(23, 7, '{\"ENG\":1,\"MTH\":2,\"PHE\":2}', '', ''),
(24, 8, '{\"ENG\":32,\"MTH\":32,\"PHE\":3}', '', ''),
(25, 9, '{\"ENG\":11,\"MTH\":3,\"PHE\":null}', '', ''),
(26, 10, '{\"ENG\":41,\"MTH\":5,\"PHE\":344}', '', ''),
(27, 11, '{\"ENG\":12,\"MTH\":66,\"PHE\":6}', '', ''),
(28, 12, '{\"ENG\":65,\"MTH\":7,\"PHE\":5}', '', ''),
(29, 13, '{\"ENG\":23,\"MTH\":null,\"PHE\":56}', '', ''),
(30, 14, '{\"ENG\":52,\"MTH\":4,\"PHE\":6}', '', ''),
(31, 15, '{\"ENG\":34,\"MTH\":null,\"PHE\":7}', '', ''),
(32, 16, '{\"ENG\":12,\"MTH\":5,\"PHE\":5}', '', ''),
(33, 17, '{\"ENG\":12,\"MTH\":2,\"PHE\":4}', '', ''),
(34, 18, '{\"ENG\":41,\"MTH\":22,\"PHE\":4}', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jss_2_b`
--

CREATE TABLE `jss_2_b` (
  `id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `first_ca` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `second_ca` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `exams` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jss_2_b`
--

INSERT INTO `jss_2_b` (`id`, `roll_no`, `first_ca`, `second_ca`, `exams`) VALUES
(17, 1, '{\"ENG\":32,\"MTH\":66,\"PHE\":2,\"HAUSA\":3}', '{\"ENG\":31,\"MTH\":6,\"PHE\":4,\"HAUSA\":13}', '{\"ENG\":55,\"MTH\":33,\"PHE\":66,\"HAUSA\":33}'),
(18, 2, '{\"ENG\":12,\"MTH\":22,\"PHE\":2,\"HAUSA\":3}', '{\"ENG\":12,\"MTH\":22,\"PHE\":2,\"HAUSA\":3}', '{\"ENG\":12,\"MTH\":22,\"PHE\":2,\"HAUSA\":3}'),
(19, 3, '{\"ENG\":4,\"MTH\":3,\"PHE\":3,\"HAUSA\":2}', '{\"ENG\":4,\"MTH\":3,\"PHE\":3,\"HAUSA\":2}', '{\"ENG\":4,\"MTH\":3,\"PHE\":3,\"HAUSA\":2}'),
(20, 4, '{\"ENG\":3,\"MTH\":4,\"PHE\":2,\"HAUSA\":3}', '{\"ENG\":3,\"MTH\":4,\"PHE\":2,\"HAUSA\":3}', '{\"ENG\":3,\"MTH\":4,\"PHE\":2,\"HAUSA\":3}'),
(21, 5, '{\"ENG\":12,\"MTH\":22,\"PHE\":3,\"HAUSA\":3}', '{\"ENG\":12,\"MTH\":22,\"PHE\":3,\"HAUSA\":3}', '{\"ENG\":12,\"MTH\":22,\"PHE\":3,\"HAUSA\":3}'),
(22, 6, '{\"ENG\":34,\"MTH\":3,\"PHE\":2,\"HAUSA\":44}', '{\"ENG\":34,\"MTH\":3,\"PHE\":2,\"HAUSA\":44}', '{\"ENG\":34,\"MTH\":3,\"PHE\":2,\"HAUSA\":44}'),
(23, 7, '{\"ENG\":1,\"MTH\":2,\"PHE\":2,\"HAUSA\":3}', '{\"ENG\":1,\"MTH\":2,\"PHE\":2,\"HAUSA\":3}', '{\"ENG\":1,\"MTH\":2,\"PHE\":2,\"HAUSA\":3}'),
(24, 8, '{\"ENG\":32,\"MTH\":32,\"PHE\":3,\"HAUSA\":2}', '{\"ENG\":32,\"MTH\":32,\"PHE\":3,\"HAUSA\":2}', '{\"ENG\":32,\"MTH\":32,\"PHE\":3,\"HAUSA\":2}'),
(25, 9, '{\"ENG\":11,\"MTH\":3,\"PHE\":null,\"HAUSA\":2}', '{\"ENG\":11,\"MTH\":3,\"PHE\":null,\"HAUSA\":2}', '{\"ENG\":11,\"MTH\":3,\"PHE\":null,\"HAUSA\":2}'),
(26, 10, '{\"ENG\":41,\"MTH\":5,\"PHE\":344,\"HAUSA\":3}', '{\"ENG\":41,\"MTH\":5,\"PHE\":344,\"HAUSA\":3}', '{\"ENG\":41,\"MTH\":5,\"PHE\":344,\"HAUSA\":3}'),
(27, 11, '{\"ENG\":12,\"MTH\":66,\"PHE\":6,\"HAUSA\":3}', '{\"ENG\":12,\"MTH\":66,\"PHE\":6,\"HAUSA\":3}', '{\"ENG\":12,\"MTH\":66,\"PHE\":6,\"HAUSA\":3}'),
(28, 12, '{\"ENG\":65,\"MTH\":7,\"PHE\":5,\"HAUSA\":3}', '{\"ENG\":65,\"MTH\":7,\"PHE\":5,\"HAUSA\":3}', '{\"ENG\":65,\"MTH\":7,\"PHE\":5,\"HAUSA\":3}'),
(29, 13, '{\"ENG\":23,\"MTH\":null,\"PHE\":56,\"HAUSA\":2}', '{\"ENG\":23,\"MTH\":null,\"PHE\":56,\"HAUSA\":2}', '{\"ENG\":23,\"MTH\":null,\"PHE\":56,\"HAUSA\":2}'),
(30, 14, '{\"ENG\":52,\"MTH\":4,\"PHE\":6,\"HAUSA\":2}', '{\"ENG\":52,\"MTH\":4,\"PHE\":6,\"HAUSA\":2}', '{\"ENG\":52,\"MTH\":4,\"PHE\":6,\"HAUSA\":2}'),
(31, 15, '{\"ENG\":34,\"MTH\":null,\"PHE\":7,\"HAUSA\":3}', '{\"ENG\":34,\"MTH\":null,\"PHE\":7,\"HAUSA\":3}', '{\"ENG\":34,\"MTH\":null,\"PHE\":7,\"HAUSA\":3}'),
(32, 16, '{\"ENG\":12,\"MTH\":5,\"PHE\":5,\"HAUSA\":32}', '{\"ENG\":12,\"MTH\":5,\"PHE\":5,\"HAUSA\":32}', '{\"ENG\":12,\"MTH\":5,\"PHE\":5,\"HAUSA\":32}'),
(33, 17, '{\"ENG\":12,\"MTH\":2,\"PHE\":4,\"HAUSA\":2}', '{\"ENG\":12,\"MTH\":2,\"PHE\":4,\"HAUSA\":2}', '{\"ENG\":12,\"MTH\":2,\"PHE\":4,\"HAUSA\":2}'),
(34, 18, '{\"ENG\":41,\"MTH\":22,\"PHE\":4,\"HAUSA\":3}', '{\"ENG\":41,\"MTH\":22,\"PHE\":4,\"HAUSA\":3}', '{\"ENG\":41,\"MTH\":22,\"PHE\":4,\"HAUSA\":3}');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `parent_phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `current_class_id` int(11) NOT NULL,
  `parent_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `parent_name`, `dob`, `gender`, `address`, `lga`, `state`, `parent_phone`, `password`, `picture`, `current_class_id`, `parent_email`) VALUES
(1, 'Isah Ahmad', 'Lefagana musa', '2022-06-09', 'F', 'savannah street low-cost area, Potiskum, Yobe State', 'Geidam', 'Yobe', '08161838283', 'Password@123', '', 2, 'paisah12.ia@gmail.com'),
(4, 'Malah Lefagana', 'Lefagana musa', '9900-01-01', 'M', 'savannah street low-cost area, Potiskum, Yobe State', 'Nguru', 'Yobe', '08161838283', 'Password@123', 'students_pics/student_6635.jpg', 2, 'paisah12.ia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `subject_code`) VALUES
(1, 'English', 'ENG'),
(2, 'Mathematics', 'MTH'),
(3, 'Physical Health Education', 'PHE'),
(4, 'Hausa', 'HAUSA');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `teaching_subjects` varchar(255) NOT NULL,
  `teaching_classes` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `dob`, `gender`, `address`, `lga`, `state`, `phone`, `teaching_subjects`, `teaching_classes`, `picture`, `email`) VALUES
(1, 'Isah Ahmad yerima', '2022-06-10', 'M', 'savannah street low-cost area, Potiskum, Yobe State', 'Potiskum', 'Yobe', '08161838283', '', '', 'teachers_pics/teacher_1429.jpg', 'paisah12.ia@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss1`
--
ALTER TABLE `jss1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss_2_b`
--
ALTER TABLE `jss_2_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jss1`
--
ALTER TABLE `jss1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `jss_2_b`
--
ALTER TABLE `jss_2_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
