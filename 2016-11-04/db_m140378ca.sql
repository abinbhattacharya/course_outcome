-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2016 at 05:33 PM
-- Server version: 5.5.48-MariaDB-wsrep
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_m140378ca`
--
CREATE DATABASE IF NOT EXISTS `db_m140378ca` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_m140378ca`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('abinb', '7c222fb2927d828af22f592134e8932480637c0d');

-- --------------------------------------------------------

--
-- Table structure for table `batch_course`
--

DROP TABLE IF EXISTS `batch_course`;
CREATE TABLE IF NOT EXISTS `batch_course` (
  `program_year` varchar(45) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`program_year`,`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_course`
--

INSERT INTO `batch_course` (`program_year`, `course_id`) VALUES
('B. Tech(CSE) 2016', 21),
('B. Tech(CSE) 2016', 22),
('B. Tech(CSE) 2016', 23),
('B. Tech(CSE) 2016', 24);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(45) NOT NULL,
  `dept` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `dept`) VALUES
(19, 'Data Structures', 'Architecture'),
(20, 'Graph Theory', 'Chemical Engineering'),
(21, 'Operating Systems', 'Chemistry'),
(22, 'Computer Organisation', 'Computer Science & Engineering'),
(23, 'Cloud Computing', 'Electrical Engineering'),
(24, 'Statistics', 'Mathematics'),
(25, 'Graph theory', 'Computer Science & Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `course_co`
--

DROP TABLE IF EXISTS `course_co`;
CREATE TABLE IF NOT EXISTS `course_co` (
  `course_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `weightage` decimal(3,2) DEFAULT NULL,
  `attain` decimal(3,2) DEFAULT NULL,
  PRIMARY KEY (`course_id`,`co_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_co`
--

INSERT INTO `course_co` (`course_id`, `co_id`, `weightage`, `attain`) VALUES
(21, 6, NULL, NULL),
(21, 7, NULL, NULL),
(21, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_objective`
--

DROP TABLE IF EXISTS `course_objective`;
CREATE TABLE IF NOT EXISTS `course_objective` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
  `co_detail` varchar(45) NOT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `course_objective`
--

INSERT INTO `course_objective` (`co_id`, `co_detail`) VALUES
(6, 'Concepts Understanding'),
(7, 'Shell Scripting'),
(8, 'Understand Scripting');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `username` varchar(45) NOT NULL,
  `dept` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `fa` decimal(1,0) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`username`, `dept`, `password`, `name`, `fa`) VALUES
('abin_bhattacharya', 'Chemical Engineering', '205549b9f19988397b73f6975bbfaaec23962df4', 'Abin Bhattacharya', '1'),
('liya_mohiuddin', 'Mathematics', '790fa789578739369970992eeb6d959c3d9ed7eb', 'Liya Mohiuddin', '0'),
('lovely_sharma', 'Computer Science & Engineering', 'd22e486c9b9e526634ea63a16c6b880205fd31ac', 'Lovely Sharma', '0'),
('preeti_tanwar', 'Electrical Engineering', '6872e1e9539ed78b5636c17994511dabf4253493', 'Preeti Tanwar', '0'),
('sakshi_rohilla', 'Chemistry', '158a2d044c2224eac4433b79ec3aa98fbcf502c8', 'Sakshi Rohilla', '0'),
('yash_mograi', 'Architecture', '00c1af93dbfa9aab2f87e838bded849c6f245243', 'Yash Mograi', '1');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_course`
--

DROP TABLE IF EXISTS `faculty_course`;
CREATE TABLE IF NOT EXISTS `faculty_course` (
  `f_id` varchar(45) NOT NULL,
  `c_id` int(11) NOT NULL,
  `fa_id` varchar(45) NOT NULL,
  PRIMARY KEY (`f_id`,`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_course`
--

INSERT INTO `faculty_course` (`f_id`, `c_id`, `fa_id`) VALUES
('abin_bhattacharya', 23, 'abin_bhattacharya'),
('liya_mohiuddin', 24, 'abin_bhattacharya'),
('lovely_sharma', 21, 'abin_bhattacharya'),
('preeti_tanwar', 22, 'abin_bhattacharya');

-- --------------------------------------------------------

--
-- Table structure for table `fa_batch`
--

DROP TABLE IF EXISTS `fa_batch`;
CREATE TABLE IF NOT EXISTS `fa_batch` (
  `fa_id` varchar(45) NOT NULL,
  `program_year` varchar(45) NOT NULL,
  PRIMARY KEY (`fa_id`,`program_year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fa_batch`
--

INSERT INTO `fa_batch` (`fa_id`, `program_year`) VALUES
('abin_bhattacharya', 'B. Tech(CSE) 2016'),
('yash_mograi', 'MCA 2017');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `roll` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `program_year` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`roll`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll`, `name`, `program_year`) VALUES
('B140403CA', 'James', 'B. Tech(CSE) 2016'),
('B140408CA', 'John', 'B. Tech(CSE) 2016'),
('B140409CA', 'Jeena', 'B. Tech(CSE) 2016');

-- --------------------------------------------------------

--
-- Table structure for table `student_test_co`
--

DROP TABLE IF EXISTS `student_test_co`;
CREATE TABLE IF NOT EXISTS `student_test_co` (
  `roll_no` varchar(45) NOT NULL,
  `test_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `marks` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`roll_no`,`test_id`,`co_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_test_marks`
--

DROP TABLE IF EXISTS `student_test_marks`;
CREATE TABLE IF NOT EXISTS `student_test_marks` (
  `roll_no` varchar(45) NOT NULL,
  `test_id` int(11) NOT NULL,
  `marks` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`roll_no`,`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `marks` decimal(5,2) NOT NULL,
  `course_id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `marks`, `course_id`, `name`) VALUES
(62, '20.00', '21', 'Test 1');

-- --------------------------------------------------------

--
-- Table structure for table `test_course_co`
--

DROP TABLE IF EXISTS `test_course_co`;
CREATE TABLE IF NOT EXISTS `test_course_co` (
  `t_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `weightage` decimal(3,2) DEFAULT NULL,
  `marks` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`t_id`,`course_id`,`co_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_course_co`
--

INSERT INTO `test_course_co` (`t_id`, `course_id`, `co_id`, `weightage`, `marks`) VALUES
(62, 3, 6, '0.55', '11.00'),
(62, 3, 7, '0.20', '4.00'),
(62, 3, 8, '0.25', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `test_ques_co`
--

DROP TABLE IF EXISTS `test_ques_co`;
CREATE TABLE IF NOT EXISTS `test_ques_co` (
  `t_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `ques_no` varchar(45) NOT NULL,
  `marks` decimal(3,2) DEFAULT NULL,
  PRIMARY KEY (`t_id`,`co_id`,`ques_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_ques_co`
--

INSERT INTO `test_ques_co` (`t_id`, `co_id`, `ques_no`, `marks`) VALUES
(62, 6, '1', '6.00'),
(62, 6, '4', '5.00'),
(62, 7, '2', '4.00'),
(62, 8, '3', '5.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
