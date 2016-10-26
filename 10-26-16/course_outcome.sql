-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2016 at 01:33 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_outcome`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(45) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `dept` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_co`
--

CREATE TABLE `course_co` (
  `course_id` varchar(45) NOT NULL,
  `co_id` varchar(45) NOT NULL,
  `weightage` decimal(3,2) DEFAULT NULL,
  `attain` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_objective`
--

CREATE TABLE `course_objective` (
  `co_id` varchar(45) NOT NULL,
  `co_detail` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `username` varchar(45) NOT NULL,
  `dept` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `fa` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`username`, `dept`, `password`, `name`, `fa`) VALUES
('abinb', 'Comp', '7c222fb2927d828af22f592134e8932480637c0d', 'Abin', NULL),
('liyak', 'Mathematics', 'a7d579ba76398070eae654c30ff153a4c273272a', 'LiyaK', '1'),
('preetip', 'Computer Science & Engineering', '7c222fb2927d828af22f592134e8932480637c0d', 'preetip', '1'),
('yashm', 'Civil Engineering', '7c222fb2927d828af22f592134e8932480637c0d', 'yashm', '1');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_course`
--

CREATE TABLE `faculty_course` (
  `f_id` varchar(45) NOT NULL,
  `c_id` varchar(45) NOT NULL,
  `fa_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `roll` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `dept` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_test_co`
--

CREATE TABLE `student_test_co` (
  `roll_no` varchar(45) NOT NULL,
  `test_id` varchar(45) NOT NULL,
  `co_id` varchar(45) NOT NULL,
  `marks` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` varchar(45) NOT NULL,
  `marks` decimal(5,2) NOT NULL,
  `course_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_course_co`
--

CREATE TABLE `test_course_co` (
  `t_id` varchar(45) NOT NULL,
  `course_id` varchar(45) NOT NULL,
  `co_id` varchar(45) NOT NULL,
  `weightage` decimal(3,2) DEFAULT NULL,
  `marks` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_ques_co`
--

CREATE TABLE `test_ques_co` (
  `t_id` varchar(45) NOT NULL,
  `co_id` varchar(45) NOT NULL,
  `ques_no` varchar(45) NOT NULL,
  `marks` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_co`
--
ALTER TABLE `course_co`
  ADD PRIMARY KEY (`course_id`,`co_id`);

--
-- Indexes for table `course_objective`
--
ALTER TABLE `course_objective`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `faculty_course`
--
ALTER TABLE `faculty_course`
  ADD PRIMARY KEY (`f_id`,`c_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `student_test_co`
--
ALTER TABLE `student_test_co`
  ADD PRIMARY KEY (`roll_no`,`test_id`,`co_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_course_co`
--
ALTER TABLE `test_course_co`
  ADD PRIMARY KEY (`t_id`,`course_id`,`co_id`);

--
-- Indexes for table `test_ques_co`
--
ALTER TABLE `test_ques_co`
  ADD PRIMARY KEY (`t_id`,`co_id`,`ques_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
