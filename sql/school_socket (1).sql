-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 01, 2023 at 11:17 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_socket`
--

-- --------------------------------------------------------

--
-- Table structure for table `academy_session`
--

DROP TABLE IF EXISTS `academy_session`;
CREATE TABLE IF NOT EXISTS `academy_session` (
  `session_id` int NOT NULL AUTO_INCREMENT,
  `session_title` varchar(255) DEFAULT NULL,
  `first_term_start` date DEFAULT NULL,
  `first_term_end` date DEFAULT NULL,
  `second_term_start` date DEFAULT NULL,
  `second_term_end` date DEFAULT NULL,
  `third_term_start` date DEFAULT NULL,
  `third_term_end` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academy_session`
--

INSERT INTO `academy_session` (`session_id`, `session_title`, `first_term_start`, `first_term_end`, `second_term_start`, `second_term_end`, `third_term_start`, `third_term_end`, `status`) VALUES
(1, '2023/2024', '2023-09-18', '2023-12-22', '2024-01-08', '2024-08-24', '2023-09-04', '2023-12-31', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `arm`
--

DROP TABLE IF EXISTS `arm`;
CREATE TABLE IF NOT EXISTS `arm` (
  `id` int NOT NULL AUTO_INCREMENT,
  `arm_name` varchar(255) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arm`
--

INSERT INTO `arm` (`id`, `arm_name`, `date_created`) VALUES
(1, 'A', NULL),
(2, 'B', NULL),
(3, 'C', NULL),
(4, 'D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

DROP TABLE IF EXISTS `assessment`;
CREATE TABLE IF NOT EXISTS `assessment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_id` int DEFAULT NULL,
  `assesment_category_id` int DEFAULT NULL,
  `assesment_name` varchar(255) DEFAULT NULL,
  `abbreviation` varchar(300) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `possible_points` int DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `file` varchar(300) DEFAULT NULL,
  `show_on_report` varchar(300) DEFAULT NULL,
  `show_score` varchar(255) DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  `assessment_session_id` int DEFAULT NULL,
  `assessment_batch_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `subject_id`, `assesment_category_id`, `assesment_name`, `abbreviation`, `due_date`, `possible_points`, `description`, `file`, `show_on_report`, `show_score`, `term_id`, `assessment_session_id`, `assessment_batch_id`) VALUES
(1, 1, 1, 'FIRST CA', '1ST CA', '2023-05-18', 20, '', '', 'on', 'on', 1, 1, 1),
(2, 3, 1, 'FIRST CA', 'CA', '2023-05-18', 20, '', '', 'on', 'on', 1, 1, 1),
(3, 3, 2, 'SECOND CA', 'SCA', '2023-05-14', 20, '', '', 'on', 'on', 1, 1, 1),
(4, 1, 2, 'SECOND CA', 'SCA', '2023-05-14', 20, '', '', 'on', 'on', 1, 1, 1),
(5, 1, 3, 'Exam', 'Exam', '2023-05-14', 60, '', '', 'on', 'on', 1, 1, 1),
(6, 3, 3, 'Exam', 'Exam', '2023-05-14', 60, '', '', 'on', 'on', 1, 1, 1),
(7, 2, 1, 'FIRST CA', 'CA', '2023-05-14', 20, '', '', 'on', 'on', 1, 1, 1),
(8, 2, 2, 'SECOND CA', 'SCA', '2023-05-16', 20, '', '', 'NO', 'NO', 1, 1, 1),
(9, 2, 3, 'Exam', 'Exam', '2023-05-15', 60, '', '', 'NO', 'NO', 1, 1, 1),
(10, 4, 1, 'FIRST CA', '1ST CA', '2023-05-03', 20, '', '', 'on', 'on', 1, 1, 1),
(11, 4, 2, 'SECOND CA', 'SCA', '2023-05-15', 20, '', '', 'NO', 'NO', 1, 1, 1),
(12, 4, 1, 'Exam', 'Exam', '2023-05-01', 60, '', '', 'on', 'on', 1, 1, 1),
(13, 7, 1, 'FIRST CA', '1ST CA', '2023-05-16', 20, '', '', 'on', 'on', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_category`
--

DROP TABLE IF EXISTS `assessment_category`;
CREATE TABLE IF NOT EXISTS `assessment_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `abbreviation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_category`
--

INSERT INTO `assessment_category` (`id`, `category_name`, `abbreviation`) VALUES
(1, 'First Assessment Test', 'FCA'),
(2, 'Second Assessment Test', 'SCA'),
(3, 'Examination', 'Exam');

-- --------------------------------------------------------

--
-- Table structure for table `assistant_class_teacher`
--

DROP TABLE IF EXISTS `assistant_class_teacher`;
CREATE TABLE IF NOT EXISTS `assistant_class_teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `a_user_id` int DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  `a_surname` varchar(255) DEFAULT NULL,
  `a_first_name` varchar(255) DEFAULT NULL,
  `a_middle_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `atendance_date`
--

DROP TABLE IF EXISTS `atendance_date`;
CREATE TABLE IF NOT EXISTS `atendance_date` (
  `id` int NOT NULL AUTO_INCREMENT,
  `atendance_date` date DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  `session_id` int DEFAULT NULL,
  `attendance_status` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atendance_date`
--

INSERT INTO `atendance_date` (`id`, `atendance_date`, `batch_id`, `term_id`, `session_id`, `attendance_status`) VALUES
(1, '2023-05-14', 1, 1, 1, 'Attendance Taken'),
(2, '2023-05-01', 1, 1, 1, 'Attendance Taken'),
(3, '2023-05-16', 1, 1, 1, 'Attendance Taken'),
(4, '2023-05-04', 1, 1, 1, 'Attendance Taken'),
(5, '2023-05-03', 1, 1, 1, 'Attendance Taken'),
(6, '2023-05-05', 1, 1, 1, 'Attendance Taken'),
(7, '2023-05-23', 1, 1, 1, 'Attendance Taken'),
(8, '2023-07-29', 1, 3, 1, 'Attendance Taken'),
(9, '2023-08-12', 1, 3, 1, 'Attendance Taken'),
(10, '2023-09-01', 1, 3, 1, 'Attendance Taken'),
(11, '2023-10-29', 1, 3, 1, 'Attendance Taken');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

DROP TABLE IF EXISTS `attendance_details`;
CREATE TABLE IF NOT EXISTS `attendance_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session_id` int DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  `atttendance_date` date DEFAULT NULL,
  `attendance_value` varchar(300) DEFAULT NULL,
  `late` varchar(300) DEFAULT NULL,
  `half_day` varchar(300) DEFAULT NULL,
  `comment` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_details`
--

INSERT INTO `attendance_details` (`id`, `session_id`, `term_id`, `user_id`, `batch_id`, `atttendance_date`, `attendance_value`, `late`, `half_day`, `comment`) VALUES
(1, 1, 1, 1, 1, '2023-05-14', 'Present', 'NO', 'N', ''),
(2, 1, 1, 2, 1, '2023-05-14', 'Present', 'NO', 'O', ''),
(3, 1, 1, 1, 1, '2023-05-01', 'Present', 'NO', 'N', ''),
(4, 1, 1, 2, 1, '2023-05-01', 'Present', 'NO', 'O', ''),
(5, 1, 1, 1, 1, '2023-05-16', 'Absent', 'YES', 'N', 'hiv'),
(6, 1, 1, 2, 1, '2023-05-16', 'Absent', 'NO', 'O', ' was sick'),
(7, 1, 1, 1, 1, '2023-05-04', 'Absent', 'NO', 'N', ''),
(8, 1, 1, 2, 1, '2023-05-04', 'Absent', 'NO', 'O', ''),
(9, 1, 1, 1, 1, '2023-05-03', 'Absent', 'NO', 'N', ''),
(10, 1, 1, 2, 1, '2023-05-03', 'Present', 'NO', 'O', ''),
(11, 1, 1, 1, 1, '2023-05-05', 'Present', 'NO', 'N', 'was sick'),
(12, 1, 1, 2, 1, '2023-05-05', 'Absent', 'NO', 'O', ' kimm'),
(13, 1, 1, 51, 1, '2023-05-23', 'Present', 'NO', 'N', ''),
(14, 1, 1, 1, 1, '2023-05-23', 'Present', 'NO', 'O', ''),
(15, 1, 1, 13, 1, '2023-05-23', 'Present', 'NO', '', ''),
(16, 1, 1, 14, 1, '2023-05-23', 'Present', 'NO', '', ''),
(17, 1, 1, 66, 1, '2023-05-23', 'Present', 'NO', '', ''),
(18, 1, 1, 2, 1, '2023-05-23', 'Present', 'NO', '', ''),
(19, 1, 1, 15, 1, '2023-05-23', 'Present', 'NO', '', ''),
(20, 1, 1, 65, 1, '2023-05-23', 'Present', 'NO', '', ''),
(21, 1, 3, 82, 1, '2023-07-29', 'Absent', 'NO', 'N', ''),
(22, 1, 3, 83, 1, '2023-07-29', 'Present', 'NO', 'O', ''),
(23, 1, 3, 84, 1, '2023-07-29', 'Absent', 'NO', '', ''),
(24, 1, 3, 85, 1, '2023-07-29', 'Present', 'NO', '', ''),
(25, 1, 3, 86, 1, '2023-07-29', 'Present', 'NO', '', ''),
(26, 1, 3, 87, 1, '2023-07-29', 'Present', 'NO', '', ''),
(27, 1, 3, 88, 1, '2023-07-29', 'Present', 'NO', '', ''),
(28, 1, 3, 89, 1, '2023-07-29', 'Present', 'NO', '', ''),
(29, 1, 3, 90, 1, '2023-07-29', 'Present', 'NO', '', ''),
(30, 1, 3, 91, 1, '2023-07-29', 'Present', 'NO', '', ''),
(31, 1, 3, 301, 1, '2023-08-12', 'Present', 'NO', 'N', ''),
(32, 1, 3, 82, 1, '2023-08-12', 'Present', 'NO', 'O', ''),
(33, 1, 3, 83, 1, '2023-08-12', 'Present', 'NO', '', ''),
(34, 1, 3, 84, 1, '2023-08-12', 'Present', 'NO', '', ''),
(35, 1, 3, 85, 1, '2023-08-12', 'Present', 'NO', '', ''),
(36, 1, 3, 86, 1, '2023-08-12', 'Present', 'NO', '', ''),
(37, 1, 3, 87, 1, '2023-08-12', 'Present', 'NO', '', ''),
(38, 1, 3, 88, 1, '2023-08-12', 'Present', 'NO', '', ''),
(39, 1, 3, 89, 1, '2023-08-12', 'Absent', 'NO', '', ''),
(40, 1, 3, 90, 1, '2023-08-12', 'Absent', 'NO', '', 'uuuuuuu'),
(41, 1, 3, 301, 1, '2023-09-01', 'Present', 'NO', 'N', ''),
(42, 1, 3, 82, 1, '2023-09-01', 'Present', 'NO', 'O', ''),
(43, 1, 3, 83, 1, '2023-09-01', 'Present', 'NO', '', ''),
(44, 1, 3, 84, 1, '2023-09-01', 'Present', 'NO', '', ''),
(45, 1, 3, 85, 1, '2023-09-01', 'Present', 'NO', '', ''),
(46, 1, 3, 86, 1, '2023-09-01', 'Present', 'NO', '', ''),
(47, 1, 3, 87, 1, '2023-09-01', 'Present', 'NO', '', ''),
(48, 1, 3, 88, 1, '2023-09-01', 'Present', 'NO', '', ''),
(49, 1, 3, 89, 1, '2023-09-01', 'Present', 'NO', '', ''),
(50, 1, 3, 90, 1, '2023-09-01', 'Present', 'NO', '', ''),
(51, 1, 3, 0, 1, '2023-10-29', 'Present', 'NO', 'N', ''),
(52, 1, 3, 301, 1, '2023-10-29', 'Present', 'NO', 'O', ''),
(53, 1, 3, 92, 1, '2023-10-29', 'Present', 'NO', '', ''),
(54, 1, 3, 93, 1, '2023-10-29', 'Present', 'NO', '', ''),
(55, 1, 3, 81, 1, '2023-10-29', 'Present', 'NO', '', ''),
(56, 1, 3, 302, 1, '2023-10-29', 'Present', 'NO', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `batch_id` int NOT NULL AUTO_INCREMENT,
  `arm` varchar(300) DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `class_abbreviation` varchar(300) DEFAULT NULL,
  `academic_session_id` int DEFAULT NULL,
  `student_count` int DEFAULT '0',
  `class_teacher_id` int DEFAULT NULL,
  `assistant_class_teacher_id` int DEFAULT NULL,
  `invoice` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `arm`, `class_id`, `class_abbreviation`, `academic_session_id`, `student_count`, `class_teacher_id`, `assistant_class_teacher_id`, `invoice`) VALUES
(1, 'A', 15, NULL, 1, 35, NULL, NULL, 'Configured'),
(2, 'A', 16, NULL, 1, 225, NULL, NULL, 'Configured'),
(3, 'B', 16, NULL, 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batch_student_list`
--

DROP TABLE IF EXISTS `batch_student_list`;
CREATE TABLE IF NOT EXISTS `batch_student_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=270 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_student_list`
--

INSERT INTO `batch_student_list` (`id`, `user_id`, `batch_id`, `term_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 2, 1),
(4, 4, 2, 1),
(5, 12, 1, 1),
(6, 13, 1, 1),
(7, 14, 1, 1),
(8, 15, 1, 1),
(9, 16, 2, 1),
(10, 21, 1, 1),
(11, 22, 1, 1),
(12, 37, 1, 1),
(13, 38, 1, 1),
(14, 39, 1, 1),
(15, 40, 1, 1),
(16, 41, 1, 1),
(17, 50, 1, 1),
(18, 51, 1, 1),
(19, 52, 1, 1),
(20, 53, 1, 1),
(21, 54, 1, 1),
(22, 55, 1, 1),
(23, 56, 1, 1),
(24, 57, 1, 1),
(25, 58, 1, 1),
(26, 59, 1, 1),
(27, 60, 1, 1),
(28, 63, 1, 1),
(29, 64, 1, 1),
(30, 65, 1, 1),
(31, 66, 1, 1),
(32, 67, 2, 1),
(33, 68, 2, 1),
(34, 69, 2, 1),
(35, 70, 2, 1),
(36, 71, 2, 1),
(37, 72, 2, 1),
(38, 73, 2, 1),
(39, 74, 2, 1),
(40, 75, 2, 1),
(41, 76, 2, 1),
(42, 77, 2, 1),
(43, 78, 2, 1),
(44, 81, 1, 3),
(45, 82, 1, 3),
(46, 83, 1, 3),
(47, 84, 1, 3),
(48, 85, 1, 3),
(49, 86, 1, 3),
(50, 87, 1, 3),
(51, 88, 1, 3),
(52, 89, 1, 3),
(53, 90, 1, 3),
(54, 91, 1, 3),
(55, 92, 1, 3),
(56, 93, 1, 3),
(57, 94, 2, 3),
(58, 95, 2, 3),
(59, 96, 2, 3),
(60, 97, 2, 3),
(61, 98, 2, 3),
(62, 99, 2, 3),
(63, 100, 2, 3),
(64, 101, 2, 3),
(65, 102, 2, 3),
(66, 103, 2, 3),
(67, 104, 2, 3),
(68, 105, 2, 3),
(69, 106, 2, 3),
(70, 107, 2, 3),
(71, 108, 2, 3),
(72, 109, 2, 3),
(73, 110, 2, 3),
(74, 111, 2, 3),
(75, 112, 2, 3),
(76, 113, 2, 3),
(77, 114, 2, 3),
(78, 115, 2, 3),
(79, 116, 2, 3),
(80, 117, 2, 3),
(81, 118, 2, 3),
(82, 119, 2, 3),
(83, 120, 2, 3),
(84, 121, 2, 3),
(85, 122, 2, 3),
(86, 123, 2, 3),
(87, 124, 2, 3),
(88, 125, 2, 3),
(89, 126, 2, 3),
(90, 127, 2, 3),
(91, 128, 2, 3),
(92, 129, 2, 3),
(93, 130, 2, 3),
(94, 131, 2, 3),
(95, 132, 2, 3),
(96, 133, 2, 3),
(97, 134, 2, 3),
(98, 135, 2, 3),
(99, 136, 2, 3),
(100, 137, 2, 3),
(101, 138, 2, 3),
(102, 139, 2, 3),
(103, 140, 2, 3),
(104, 141, 2, 3),
(105, 142, 2, 3),
(106, 143, 2, 3),
(107, 144, 2, 3),
(108, 145, 2, 3),
(109, 146, 2, 3),
(110, 147, 2, 3),
(111, 148, 2, 3),
(112, 149, 2, 3),
(113, 150, 2, 3),
(114, 151, 2, 3),
(115, 152, 2, 3),
(116, 153, 2, 3),
(117, 154, 2, 3),
(118, 155, 2, 3),
(119, 156, 2, 3),
(120, 157, 2, 3),
(121, 158, 2, 3),
(122, 159, 2, 3),
(123, 160, 2, 3),
(124, 161, 2, 3),
(125, 162, 2, 3),
(126, 163, 2, 3),
(127, 164, 2, 3),
(128, 165, 2, 3),
(129, 166, 2, 3),
(130, 167, 2, 3),
(131, 168, 2, 3),
(132, 169, 2, 3),
(133, 170, 2, 3),
(134, 171, 2, 3),
(135, 172, 2, 3),
(136, 173, 2, 3),
(137, 174, 2, 3),
(138, 175, 2, 3),
(139, 176, 2, 3),
(140, 177, 2, 3),
(141, 178, 2, 3),
(142, 179, 2, 3),
(143, 180, 2, 3),
(144, 181, 2, 3),
(145, 182, 2, 3),
(146, 183, 2, 3),
(147, 184, 2, 3),
(148, 185, 2, 3),
(149, 186, 2, 3),
(150, 187, 2, 3),
(151, 188, 2, 3),
(152, 189, 2, 3),
(153, 190, 2, 3),
(154, 191, 2, 3),
(155, 192, 2, 3),
(156, 193, 2, 3),
(157, 194, 2, 3),
(158, 195, 2, 3),
(159, 196, 2, 3),
(160, 197, 2, 3),
(161, 198, 2, 3),
(162, 199, 2, 3),
(163, 200, 2, 3),
(164, 201, 2, 3),
(165, 202, 2, 3),
(166, 203, 2, 3),
(167, 204, 2, 3),
(168, 205, 2, 3),
(169, 206, 2, 3),
(170, 207, 2, 3),
(171, 208, 2, 3),
(172, 209, 2, 3),
(173, 210, 2, 3),
(174, 211, 2, 3),
(175, 212, 2, 3),
(176, 213, 2, 3),
(177, 214, 2, 3),
(178, 215, 2, 3),
(179, 216, 2, 3),
(180, 217, 2, 3),
(181, 218, 2, 3),
(182, 219, 2, 3),
(183, 220, 2, 3),
(184, 221, 2, 3),
(185, 222, 2, 3),
(186, 223, 2, 3),
(187, 224, 2, 3),
(188, 225, 2, 3),
(189, 226, 2, 3),
(190, 227, 2, 3),
(191, 228, 2, 3),
(192, 229, 2, 3),
(193, 230, 2, 3),
(194, 231, 2, 3),
(195, 232, 2, 3),
(196, 233, 2, 3),
(197, 234, 2, 3),
(198, 235, 2, 3),
(199, 236, 2, 3),
(200, 237, 2, 3),
(201, 238, 2, 3),
(202, 239, 2, 3),
(203, 240, 2, 3),
(204, 241, 2, 3),
(205, 242, 2, 3),
(206, 243, 2, 3),
(207, 244, 2, 3),
(208, 245, 2, 3),
(209, 246, 2, 3),
(210, 247, 2, 3),
(211, 248, 2, 3),
(212, 249, 2, 3),
(213, 250, 2, 3),
(214, 251, 2, 3),
(215, 252, 2, 3),
(216, 253, 2, 3),
(217, 254, 2, 3),
(218, 255, 2, 3),
(219, 256, 2, 3),
(220, 257, 2, 3),
(221, 258, 2, 3),
(222, 259, 2, 3),
(223, 260, 2, 3),
(224, 261, 2, 3),
(225, 262, 2, 3),
(226, 263, 2, 3),
(227, 264, 2, 3),
(228, 265, 2, 3),
(229, 266, 2, 3),
(230, 267, 2, 3),
(231, 268, 2, 3),
(232, 269, 2, 3),
(233, 270, 2, 3),
(234, 271, 2, 3),
(235, 272, 2, 3),
(236, 273, 2, 3),
(237, 274, 2, 3),
(238, 275, 2, 3),
(239, 276, 2, 3),
(240, 277, 2, 3),
(241, 278, 2, 3),
(242, 279, 2, 3),
(243, 280, 2, 3),
(244, 281, 2, 3),
(245, 282, 2, 3),
(246, 283, 2, 3),
(247, 284, 2, 3),
(248, 285, 2, 3),
(249, 286, 2, 3),
(250, 287, 2, 3),
(251, 288, 2, 3),
(252, 289, 2, 3),
(253, 290, 2, 3),
(254, 291, 2, 3),
(255, 292, 2, 3),
(256, 293, 2, 3),
(257, 294, 2, 3),
(258, 295, 2, 3),
(259, 296, 2, 3),
(260, 297, 2, 3),
(261, 298, 2, 3),
(262, 299, 2, 3),
(263, 301, 1, 3),
(264, 302, 1, 3),
(265, 303, 2, 3),
(266, 304, 1, 3),
(267, 305, 2, 3),
(268, 306, 2, 3),
(269, 307, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `batch_subject`
--

DROP TABLE IF EXISTS `batch_subject`;
CREATE TABLE IF NOT EXISTS `batch_subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_id` int DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  `elective` varchar(300) DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  `employee_count` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_subject`
--

INSERT INTO `batch_subject` (`id`, `subject_id`, `batch_id`, `elective`, `term_id`, `employee_count`) VALUES
(1, 1, 1, 'NO', 1, 0),
(2, 2, 1, 'NO', 1, 0),
(3, 3, 1, 'NO', 1, 0),
(4, 4, 1, 'NO', 1, 0),
(5, 1, 2, 'NO', 1, 0),
(6, 2, 2, 'NO', 1, 0),
(7, 5, 1, 'NO', 1, 0),
(8, 3, 2, 'NO', 1, 0),
(9, 4, 2, 'NO', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

DROP TABLE IF EXISTS `bloodgroup`;
CREATE TABLE IF NOT EXISTS `bloodgroup` (
  `bloodgroup_id` int NOT NULL AUTO_INCREMENT,
  `bloodgroup` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bloodgroup_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`bloodgroup_id`, `bloodgroup`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'O+'),
(6, 'O-'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) DEFAULT NULL,
  `abbreviation` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '0',
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `abbreviation`, `status`) VALUES
(1, 'Creche', 'Creche', 0),
(2, 'Pre - Nursery One', 'Pre Nur 1', 1),
(3, 'Pre - Nursery Two', 'Pre Nur 2', 0),
(4, 'Nursery One', 'Nur 1', 0),
(5, 'Nursery Two', 'Nur 2', 0),
(6, 'Year One', 'Year 1', 0),
(7, 'Year Two', 'Year 2', 0),
(8, 'Nursery One', 'Nur 1', 0),
(9, 'Nursery Two', 'Nur 2', 0),
(10, 'Year One', 'Year 1', 0),
(11, 'Year Two', 'Year 2', 0),
(12, 'Year Three', 'Year 3', 0),
(13, 'Year Four', 'Year 4', 0),
(14, 'Year Five', 'Year 5', 0),
(15, 'Junior Secondary One', 'JS 1', 1),
(16, 'Junior Secondary Two', 'JS 2', 1),
(17, 'Junior Secondary Three', 'JS 3', 1),
(18, 'Senior Secondary One', 'SS 1', 1),
(19, 'Senior Secondary Two', 'SS 2', 1),
(20, 'Senior Secondary Three', 'SS 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `event_title` varchar(300) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `event_time` varchar(300) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL,
  `event_photo` varchar(2000) NOT NULL DEFAULT 'upcomming_event.jpg',
  `description` varchar(300) DEFAULT NULL,
  `member_id` int DEFAULT NULL,
  `applicant_count` int NOT NULL DEFAULT '0',
  `end_date` date DEFAULT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'Active',
  `amount_promised` varchar(300) NOT NULL DEFAULT '0',
  `amount_collected` varchar(300) NOT NULL DEFAULT '0',
  `amount_spent` varchar(300) DEFAULT '0',
  `balance` int GENERATED ALWAYS AS ((`amount_collected` - `amount_spent`)) VIRTUAL,
  `branch_id` int DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `has_calender` int DEFAULT '0',
  `calender_link` varchar(500) DEFAULT NULL,
  `has_zoom` int DEFAULT '0',
  `zoom_link` varchar(500) DEFAULT NULL,
  `has_google_meet` int DEFAULT '0',
  `google_meet_link` varchar(500) DEFAULT NULL,
  `is_holiday` varchar(255) DEFAULT 'NO',
  `term_id` int DEFAULT NULL,
  `session_id` int DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `start_date`, `event_time`, `location`, `event_photo`, `description`, `member_id`, `applicant_count`, `end_date`, `status`, `amount_promised`, `amount_collected`, `amount_spent`, `branch_id`, `type`, `has_calender`, `calender_link`, `has_zoom`, `zoom_link`, `has_google_meet`, `google_meet_link`, `is_holiday`, `term_id`, `session_id`) VALUES
(40, 'uuuuu', '2023-04-14', NULL, 'Lekki', 'upcomming_event.jpg', 'hhhhhhh', NULL, 0, '2023-04-14', 'Active', '0', '0', '0', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 'NO', NULL, NULL),
(41, 'ttttt', '2023-04-13', NULL, 'Abuja', 'upcomming_event.jpg', 'jjjjj', NULL, 0, '2023-04-14', 'Active', '0', '0', '0', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 'NO', NULL, NULL),
(42, 'tree', '2023-04-12', NULL, 'Lekki', 'upcomming_event.jpg', 'b h', NULL, 0, '2023-04-15', 'Active', '0', '0', '0', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 'NO', NULL, NULL),
(43, 'didixxx', '2023-05-13', NULL, 'Lekki', 'upcomming_event.jpg', 'sss', NULL, 0, NULL, 'Active', '0', '0', '0', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 'YES', NULL, NULL),
(44, 'Mid Term Break', '2023-05-10', NULL, 'church', 'upcomming_event.jpg', 'holiday', NULL, 0, NULL, 'Active', '0', '0', '0', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 'YES', NULL, NULL),
(45, 'Democracy Day', '2023-05-29', NULL, 'school', 'upcomming_event.jpg', 'Democracy Day', NULL, 0, NULL, 'Active', '0', '0', '0', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 'YES', NULL, NULL),
(46, 'jjjjjj', '2023-05-19', NULL, 'ogba', 'upcomming_event.jpg', 'jjjjjjjjj', NULL, 0, NULL, 'Active', '0', '0', '0', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 'YES', NULL, NULL),
(47, 'Children day', '2023-05-25', NULL, 'Lagos, Abuja', 'upcomming_event.jpg', ' kbbkjb,b', NULL, 0, NULL, 'Active', '0', '0', '0', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 'YES', NULL, NULL),
(48, 'VALENTINE', '2023-08-05', NULL, 'Abuja', 'upcomming_event.jpg', 'CJHVV', NULL, 0, NULL, 'Active', '0', '0', '0', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 'YES', NULL, NULL),
(49, 'hjh', '2023-10-29', NULL, 'ogba', 'upcomming_event.jpg', 'kggkgkgk', NULL, 0, NULL, 'Active', '0', '0', '0', NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 'YES', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `exam_id` int NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(300) NOT NULL,
  `batch_id` int NOT NULL,
  `term_id` int NOT NULL,
  `session_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `exam_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'In Active',
  `passing_percentage` varchar(300) NOT NULL,
  `instruction` varchar(300) NOT NULL,
  `exam_duration` varchar(255) NOT NULL,
  `random_question` varchar(300) NOT NULL DEFAULT 'No',
  `result_after_finish` varchar(300) NOT NULL DEFAULT 'No',
  `instant_result` varchar(255) NOT NULL DEFAULT 'No',
  `mode` varchar(255) NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `view_result_with_pin` varchar(300) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_name`, `batch_id`, `term_id`, `session_id`, `start_date`, `end_date`, `exam_status`, `passing_percentage`, `instruction`, `exam_duration`, `random_question`, `result_after_finish`, `instant_result`, `mode`, `exam_type`, `view_result_with_pin`) VALUES
(2, '2023 Common Entrance examination', 1, 1, 1, '2023-08-31', '2023-08-31', 'In Active', '50', ' dsbbb', '20', 'No', 'No', 'No', 'Strict', 'Assignment', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE IF NOT EXISTS `general_settings` (
  `setting_id` int NOT NULL AUTO_INCREMENT,
  `school_name` varchar(300) NOT NULL,
  `currency_symbol` char(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `motto` varchar(255) DEFAULT NULL,
  `address` varchar(300) NOT NULL,
  `phone_number` varchar(300) NOT NULL,
  `phone_number_two` varchar(255) NOT NULL,
  `logo` varchar(300) NOT NULL DEFAULT 'placeholder-image.png',
  `favicon` varchar(300) NOT NULL,
  `bank_account_name` varchar(300) NOT NULL,
  `bank_name` varchar(300) NOT NULL,
  `account_number` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `subscription_plan` int NOT NULL DEFAULT '1',
  `branches_count` int NOT NULL DEFAULT '0',
  `app_registered_date` varchar(255) NOT NULL,
  `principal_signature` varchar(255) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`setting_id`, `school_name`, `currency_symbol`, `motto`, `address`, `phone_number`, `phone_number_two`, `logo`, `favicon`, `bank_account_name`, `bank_name`, `account_number`, `email`, `subscription_plan`, `branches_count`, `app_registered_date`, `principal_signature`) VALUES
(1, 'ROTHMYTEMMY COLLEGE', '₦', 'Readers Are Leaders', '52 , Kareem Babatunde street, Papa-Ashafa Dopemu Agege Lagos.', '070 388 55557', '', 'rths_logo.jpg', 'rths_logo.jpg', 'Olumide Olalekan4', 'UBA', '456666', 'rothmytemmycollege@gmail.com', 1, 0, '', 'principal_signature.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `grade_id` int NOT NULL AUTO_INCREMENT,
  `min_score` int NOT NULL,
  `max_score` int NOT NULL,
  `grade_score` varchar(300) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `principal_comment` varchar(300) DEFAULT NULL,
  `class_teacher_comment` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `min_score`, `max_score`, `grade_score`, `remarks`, `principal_comment`, `class_teacher_comment`) VALUES
(1, 75, 100, 'A', NULL, 'Excellent Performance Keep It Up', NULL),
(2, 65, 75, 'B', NULL, 'Good Result,More room for Improvement', NULL),
(3, 55, 65, 'C', NULL, 'A Fair performance...You can do better ', NULL),
(4, 45, 55, 'D', NULL, NULL, NULL),
(5, 0, 45, 'E', NULL, 'A Poor Performance', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `income_and_expense`
--

DROP TABLE IF EXISTS `income_and_expense`;
CREATE TABLE IF NOT EXISTS `income_and_expense` (
  `income_and_expense_id` int NOT NULL AUTO_INCREMENT,
  `ref_number` varchar(255) DEFAULT NULL,
  `income_and_expenses_category_id` int DEFAULT NULL,
  `note` varchar(500) NOT NULL,
  `transaction_date` varchar(255) NOT NULL,
  `payment_method_id` varchar(255) DEFAULT NULL,
  `income` varchar(500) DEFAULT NULL,
  `expense` varchar(500) DEFAULT NULL,
  `entered_by` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `branch_id` int DEFAULT NULL,
  `edited_by` varchar(255) DEFAULT NULL,
  `edit_count` int DEFAULT '0',
  `amount_before_change` int DEFAULT NULL,
  `last_updated_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`income_and_expense_id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_and_expense`
--

INSERT INTO `income_and_expense` (`income_and_expense_id`, `ref_number`, `income_and_expenses_category_id`, `note`, `transaction_date`, `payment_method_id`, `income`, `expense`, `entered_by`, `created_at`, `branch_id`, `edited_by`, `edit_count`, `amount_before_change`, `last_updated_date`) VALUES
(7, 'INC7C', 8, 'DDD', '2022-01-09', '1', '5000', NULL, 'olalekan  ogundimu', '2022-01-09 15:23:03', 1, '', 0, 0, NULL),
(142, 'INC142CR', 1, 'lol', '2023-03-13', '1', '1000', NULL, 'Olumide  Olalekan22', '2023-03-13 14:02:39', 1, NULL, 0, NULL, NULL),
(143, 'INC143CR', 5, 'fdgdgdg', '2023-03-13', '5', '3000', NULL, 'Olumide  Olalekan22', '2023-03-13 14:03:53', 1, NULL, 0, NULL, NULL),
(144, 'INC144CR', 3, 'fdgdgdg', '2023-03-13', '2', '5000', NULL, 'Olumide  Olalekan22', '2023-03-13 17:44:45', 1, NULL, 0, NULL, NULL),
(145, 'INC145CR', 3, 'lol', '2023-03-13', '1', '5000', NULL, 'Olumide  Olalekan22', '2023-03-13 17:54:12', 1, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `income_expence_category`
--

DROP TABLE IF EXISTS `income_expence_category`;
CREATE TABLE IF NOT EXISTS `income_expence_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `show_for_members` varchar(300) NOT NULL,
  `branch_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_expence_category`
--

INSERT INTO `income_expence_category` (`id`, `category_name`, `description`, `type`, `show_for_members`, `branch_id`) VALUES
(1, 'Pledge', 'Pledge', 'income', '', 1),
(3, 'Electricity Bill', 'Electricity Bills', 'income', '', 1),
(5, 'Sunday School Offering', 'Sunday School Offering', 'income', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session_id` int NOT NULL,
  `term_id` int NOT NULL,
  `item_id` int NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `total` int NOT NULL,
  `type` varchar(300) DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `session_id`, `term_id`, `item_id`, `price`, `quantity`, `total`, `type`, `note`, `batch_id`) VALUES
(1, 1, 1, 1, 5000, 1, 5000, 'Compulsary', 'Additional Note', 1),
(2, 1, 1, 2, 4000, 1, 4000, 'Compulsary', 'Additional Note', 1),
(3, 1, 1, 3, 300, 2, 600, 'Optional', 'Additional Note', 1),
(4, 1, 3, 1, 40000, 1, 40000, 'Compulsary', 'Additional Note', 2),
(5, 1, 3, 2, 5000, 1, 5000, 'Compulsary', 'Additional Note', 2),
(6, 1, 3, 3, 3000, 2, 6000, 'Compulsary', 'Additional Note', 2);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_description`) VALUES
(1, 'SCHOOL FEE', NULL),
(2, 'LESSION FEE', NULL),
(3, 'SPORT WEAR', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `link_parent`
--

DROP TABLE IF EXISTS `link_parent`;
CREATE TABLE IF NOT EXISTS `link_parent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `relationship` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_parent`
--

INSERT INTO `link_parent` (`id`, `parent_id`, `student_id`, `relationship`) VALUES
(1, 79, 63, 'Mother');

-- --------------------------------------------------------

--
-- Table structure for table `message_template`
--

DROP TABLE IF EXISTS `message_template`;
CREATE TABLE IF NOT EXISTS `message_template` (
  `id` int NOT NULL AUTO_INCREMENT,
  `template_title` varchar(255) DEFAULT NULL,
  `content` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_template`
--

INSERT INTO `message_template` (`id`, `template_title`, `content`) VALUES
(1, 'PTA NOTICE', 'hi'),
(2, 'DUE SCHOOL FEES REMINDER', 'Dear Parent just to remind you of your wards schol fees');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `option_id` int NOT NULL AUTO_INCREMENT,
  `question_id` int NOT NULL,
  `option_value` varchar(255) NOT NULL,
  `correct_answer` varchar(300) NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `question_id`, `option_value`, `correct_answer`) VALUES
(1, 1, '4', 'true'),
(2, 1, '5', 'false'),
(3, 1, '6', 'false'),
(4, 1, '7', 'false'),
(5, 2, 'Teacher Table', 'false'),
(6, 2, 'Student Table', 'true'),
(7, 2, 'Curch Table', 'false'),
(21, 6, 'Man', 'false'),
(20, 6, 'Goal', 'false'),
(19, 6, 'hhhhh', 'false'),
(15, 4, 'Cos 45', 'false'),
(16, 4, 'Sin 30', 'false'),
(17, 4, 'Tan 60', 'true'),
(18, 4, 'cosec 45', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment_method`) VALUES
(1, 'Cash'),
(2, 'Transfer'),
(3, 'Online'),
(4, 'Wallet');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
CREATE TABLE IF NOT EXISTS `qualification` (
  `qualification_id` int NOT NULL AUTO_INCREMENT,
  `qualification` varchar(255) NOT NULL,
  PRIMARY KEY (`qualification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`qualification_id`, `qualification`) VALUES
(1, 'Bsc'),
(2, 'HND');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int NOT NULL AUTO_INCREMENT,
  `subject_id` int NOT NULL,
  `exam_id` int NOT NULL,
  `question` varchar(300) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `subject_id`, `exam_id`, `question`, `image`) VALUES
(1, 1, 2, '<p>what is 2 + 2</p>', ''),
(2, 1, 2, '<p>which of the option best tdescribe the table</p>', ''),
(4, 1, 2, '<p>Calculate &ang;<strong>ABD</strong></p>', 'trigonometry.png'),
(6, 4, 2, '<p>bbb</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `report_group`
--

DROP TABLE IF EXISTS `report_group`;
CREATE TABLE IF NOT EXISTS `report_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `card_name` varchar(255) DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  `type` varchar(300) DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  `template_id` int DEFAULT NULL,
  `session_id` int DEFAULT NULL,
  `publish` varchar(255) DEFAULT 'NO',
  `status` varchar(255) DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_group`
--

INSERT INTO `report_group` (`id`, `card_name`, `batch_id`, `type`, `term_id`, `template_id`, `session_id`, `publish`, `status`) VALUES
(1, 'Jss 1 First term Report 2022/2023', 1, 'Final', 1, 1, 1, 'NO', 'Pending'),
(4, 'jss2 MID Term Report 2023/2024', 2, 'Progress', 3, 1, 1, 'NO', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `score_sheet`
--

DROP TABLE IF EXISTS `score_sheet`;
CREATE TABLE IF NOT EXISTS `score_sheet` (
  `score_sheet_id` int NOT NULL AUTO_INCREMENT,
  `session_id` int DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `assessment_id` int DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  `score` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  PRIMARY KEY (`score_sheet_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score_sheet`
--

INSERT INTO `score_sheet` (`score_sheet_id`, `session_id`, `batch_id`, `user_id`, `assessment_id`, `term_id`, `score`, `subject_id`) VALUES
(1, 1, 1, 2, 1, 1, 20, 1),
(2, 1, 1, 1, 1, 1, 15, 1),
(3, 1, 1, 1, 2, 1, 20, 3),
(4, 1, 1, 2, 2, 1, 19, 3),
(5, 1, 1, 2, 3, 1, 18, 3),
(6, 1, 1, 1, 3, 1, 19, 3),
(7, 1, 1, 2, 4, 1, 10, 1),
(8, 1, 1, 1, 4, 1, 17, 1),
(9, 1, 1, 2, 5, 1, 58, 1),
(10, 1, 1, 1, 5, 1, 30, 1),
(11, 1, 1, 1, 6, 1, 40, 3),
(12, 1, 1, 2, 6, 1, 55, 3),
(13, 1, 1, 1, 7, 1, 18, 2),
(39, 1, 1, 15, 3, 1, 15, 3),
(40, 1, 1, 15, 6, 1, 35, 3),
(16, 1, 1, 1, 8, 1, 19, 2),
(41, 1, 1, 15, 7, 1, 20, 2),
(43, 1, 1, 15, 9, 1, 50, 2),
(19, 1, 1, 1, 9, 1, 45, 2),
(42, 1, 1, 15, 8, 1, 18, 2),
(38, 1, 1, 15, 2, 1, 20, 3),
(22, 1, 1, 2, 7, 1, 20, 2),
(23, 1, 1, 2, 8, 1, 15, 2),
(24, 1, 1, 2, 9, 1, 49, 2),
(25, 1, 1, 2, 10, 1, 17, 4),
(26, 1, 1, 2, 10, 1, 17, 4),
(27, 1, 1, 2, 11, 1, 16, 4),
(44, 1, 1, 15, 10, 1, 10, 4),
(29, 1, 1, 2, 12, 1, 45, 4),
(31, 1, 1, 1, 10, 1, 13, 4),
(46, 1, 1, 15, 11, 1, 20, 4),
(34, 1, 1, 1, 11, 1, 10, 4),
(36, 1, 1, 1, 12, 1, 60, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sms_sender_id`
--

DROP TABLE IF EXISTS `sms_sender_id`;
CREATE TABLE IF NOT EXISTS `sms_sender_id` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_sender_id`
--

INSERT INTO `sms_sender_id` (`id`, `sender_id`) VALUES
(1, 'GGPPM');

-- --------------------------------------------------------

--
-- Table structure for table `sms_settings`
--

DROP TABLE IF EXISTS `sms_settings`;
CREATE TABLE IF NOT EXISTS `sms_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `api_name` varchar(255) DEFAULT NULL,
  `sender_id` varchar(300) NOT NULL,
  `sender_name` varchar(300) NOT NULL,
  `api_key` varchar(1000) NOT NULL,
  `balance` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_settings`
--

INSERT INTO `sms_settings` (`id`, `api_name`, `sender_id`, `sender_name`, `api_key`, `balance`) VALUES
(1, 'Termii', 'GGPPM', 'GGPPM', 'TLHkjGNPP1bGUPMmv5LePAa6IWu8QRo7PHUywclkJIPrhn2aDcTruJ0FKDPf9m', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_category`
--

DROP TABLE IF EXISTS `student_category`;
CREATE TABLE IF NOT EXISTS `student_category` (
  `student_category_id` int NOT NULL AUTO_INCREMENT,
  `student_category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`student_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_category`
--

INSERT INTO `student_category` (`student_category_id`, `student_category`) VALUES
(1, 'Staff Children'),
(2, 'Scholarship Student');

-- --------------------------------------------------------

--
-- Table structure for table `student_guardian`
--

DROP TABLE IF EXISTS `student_guardian`;
CREATE TABLE IF NOT EXISTS `student_guardian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_guardian`
--

INSERT INTO `student_guardian` (`id`, `parent_id`, `student_id`, `relationship`) VALUES
(1, 3, 2, 'father'),
(2, 4, 2, 'Mother'),
(3, 5, 2, 'Driver'),
(4, 6, 2, 'sister'),
(5, 7, 2, 'Driver'),
(6, 10, 8, 'Driver'),
(7, 14, 1, 'Mother'),
(8, 5, 4, 'father'),
(9, 79, 65, 'Driver'),
(10, 300, 1, 'Driver');

-- --------------------------------------------------------

--
-- Table structure for table `student_invoice`
--

DROP TABLE IF EXISTS `student_invoice`;
CREATE TABLE IF NOT EXISTS `student_invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `session_id` int NOT NULL,
  `term_id` int NOT NULL,
  `item_id` int NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `total` int NOT NULL,
  `discount` int DEFAULT '0',
  `expected_amount` int GENERATED ALWAYS AS ((`total` - `discount`)) VIRTUAL,
  `amount_paid` int DEFAULT '0',
  `outstanding` int GENERATED ALWAYS AS ((`expected_amount` - `amount_paid`)) VIRTUAL,
  `type` varchar(300) DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=718 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_invoice`
--

INSERT INTO `student_invoice` (`id`, `user_id`, `session_id`, `term_id`, `item_id`, `price`, `quantity`, `total`, `discount`, `amount_paid`, `type`, `note`, `batch_id`) VALUES
(1, 1, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(2, 1, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(3, 1, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(4, 2, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(5, 2, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(6, 2, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(7, 14, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(8, 14, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(9, 14, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(10, 15, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(11, 15, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(12, 15, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(13, 54, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(14, 54, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(15, 54, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(16, 55, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(17, 55, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(18, 55, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(19, 56, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(20, 56, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(21, 56, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(22, 57, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(23, 57, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(24, 57, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(25, 58, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(26, 58, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(27, 58, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(28, 59, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(29, 59, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(30, 59, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(31, 60, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(32, 60, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(33, 60, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(34, 63, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(35, 63, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(36, 63, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(37, 64, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(38, 64, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(39, 64, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(40, 65, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(41, 65, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(42, 65, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(43, 66, 1, 1, 1, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 1),
(44, 66, 1, 1, 2, 4000, 1, 4000, 0, 0, 'Compulsary', 'Additional Note', 1),
(45, 66, 1, 1, 3, 300, 2, 600, 0, 0, 'Optional', 'Additional Note', 1),
(46, 3, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(47, 3, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(48, 3, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(49, 4, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(50, 4, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(51, 4, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(52, 16, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(53, 16, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(54, 16, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(55, 72, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(56, 72, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(57, 72, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(58, 71, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(59, 71, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(60, 71, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(61, 70, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(62, 70, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(63, 70, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(64, 69, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(65, 69, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(66, 69, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(67, 67, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(68, 67, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(69, 67, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(70, 68, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(71, 68, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(72, 68, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(73, 73, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(74, 73, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(75, 73, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(76, 74, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(77, 74, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(78, 74, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(79, 75, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(80, 75, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(81, 75, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(82, 76, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(83, 76, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(84, 76, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(85, 78, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(86, 78, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(87, 78, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(88, 94, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(89, 94, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(90, 94, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(91, 95, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(92, 95, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(93, 95, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(94, 96, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(95, 96, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(96, 96, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(97, 97, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(98, 97, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(99, 97, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(100, 98, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(101, 98, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(102, 98, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(103, 99, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(104, 99, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(105, 99, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(106, 100, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(107, 100, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(108, 100, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(109, 101, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(110, 101, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(111, 101, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(112, 102, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(113, 102, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(114, 102, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(115, 103, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(116, 103, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(117, 103, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(118, 104, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(119, 104, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(120, 104, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(121, 105, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(122, 105, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(123, 105, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(124, 106, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(125, 106, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(126, 106, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(127, 107, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(128, 107, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(129, 107, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(130, 108, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(131, 108, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(132, 108, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(133, 109, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(134, 109, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(135, 109, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(136, 110, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(137, 110, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(138, 110, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(139, 111, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(140, 111, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(141, 111, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(142, 112, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(143, 112, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(144, 112, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(145, 113, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(146, 113, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(147, 113, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(148, 114, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(149, 114, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(150, 114, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(151, 115, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(152, 115, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(153, 115, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(154, 116, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(155, 116, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(156, 116, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(157, 117, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(158, 117, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(159, 117, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(160, 118, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(161, 118, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(162, 118, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(163, 119, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(164, 119, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(165, 119, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(166, 120, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(167, 120, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(168, 120, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(169, 121, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(170, 121, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(171, 121, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(172, 122, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(173, 122, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(174, 122, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(175, 123, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(176, 123, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(177, 123, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(178, 124, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(179, 124, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(180, 124, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(181, 125, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(182, 125, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(183, 125, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(184, 126, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(185, 126, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(186, 126, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(187, 127, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(188, 127, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(189, 127, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(190, 128, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(191, 128, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(192, 128, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(193, 129, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(194, 129, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(195, 129, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(196, 130, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(197, 130, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(198, 130, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(199, 131, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(200, 131, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(201, 131, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(202, 132, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(203, 132, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(204, 132, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(205, 133, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(206, 133, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(207, 133, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(208, 134, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(209, 134, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(210, 134, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(211, 135, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(212, 135, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(213, 135, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(214, 136, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(215, 136, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(216, 136, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(217, 137, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(218, 137, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(219, 137, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(220, 138, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(221, 138, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(222, 138, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(223, 139, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(224, 139, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(225, 139, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(226, 140, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(227, 140, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(228, 140, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(229, 141, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(230, 141, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(231, 141, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(232, 142, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(233, 142, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(234, 142, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(235, 143, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(236, 143, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(237, 143, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(238, 144, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(239, 144, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(240, 144, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(241, 145, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(242, 145, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(243, 145, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(244, 146, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(245, 146, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(246, 146, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(247, 147, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(248, 147, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(249, 147, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(250, 148, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(251, 148, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(252, 148, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(253, 149, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(254, 149, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(255, 149, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(256, 150, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(257, 150, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(258, 150, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(259, 151, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(260, 151, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(261, 151, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(262, 152, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(263, 152, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(264, 152, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(265, 153, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(266, 153, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(267, 153, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(268, 154, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(269, 154, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(270, 154, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(271, 155, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(272, 155, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(273, 155, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(274, 156, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(275, 156, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(276, 156, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(277, 157, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(278, 157, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(279, 157, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(280, 158, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(281, 158, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(282, 158, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(283, 159, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(284, 159, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(285, 159, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(286, 160, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(287, 160, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(288, 160, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(289, 161, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(290, 161, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(291, 161, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(292, 162, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(293, 162, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(294, 162, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(295, 163, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(296, 163, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(297, 163, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(298, 164, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(299, 164, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(300, 164, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(301, 165, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(302, 165, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(303, 165, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(304, 166, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(305, 166, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(306, 166, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(307, 167, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(308, 167, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(309, 167, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(310, 168, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(311, 168, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(312, 168, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(313, 169, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(314, 169, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(315, 169, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(316, 170, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(317, 170, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(318, 170, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(319, 171, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(320, 171, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(321, 171, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(322, 172, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(323, 172, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(324, 172, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(325, 173, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(326, 173, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(327, 173, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(328, 174, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(329, 174, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(330, 174, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(331, 175, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(332, 175, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(333, 175, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(334, 176, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(335, 176, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(336, 176, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(337, 177, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(338, 177, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(339, 177, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(340, 178, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(341, 178, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(342, 178, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(343, 179, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(344, 179, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(345, 179, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(346, 180, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(347, 180, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(348, 180, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(349, 181, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(350, 181, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(351, 181, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(352, 182, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(353, 182, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(354, 182, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(355, 183, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(356, 183, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(357, 183, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(358, 184, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(359, 184, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(360, 184, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(361, 185, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(362, 185, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(363, 185, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(364, 186, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(365, 186, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(366, 186, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(367, 187, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(368, 187, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(369, 187, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(370, 188, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(371, 188, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(372, 188, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(373, 189, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(374, 189, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(375, 189, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(376, 190, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(377, 190, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(378, 190, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(379, 191, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(380, 191, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(381, 191, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(382, 192, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(383, 192, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(384, 192, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(385, 193, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(386, 193, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(387, 193, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(388, 194, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(389, 194, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(390, 194, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(391, 195, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(392, 195, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(393, 195, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(394, 196, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(395, 196, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(396, 196, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(397, 197, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(398, 197, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(399, 197, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(400, 198, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(401, 198, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(402, 198, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(403, 199, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(404, 199, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(405, 199, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(406, 200, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(407, 200, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(408, 200, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(409, 201, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(410, 201, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(411, 201, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(412, 202, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(413, 202, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(414, 202, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(415, 203, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(416, 203, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(417, 203, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(418, 204, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(419, 204, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(420, 204, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(421, 205, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(422, 205, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(423, 205, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(424, 206, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(425, 206, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(426, 206, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(427, 207, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(428, 207, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(429, 207, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(430, 208, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(431, 208, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(432, 208, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(433, 209, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(434, 209, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(435, 209, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(436, 210, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(437, 210, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(438, 210, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(439, 211, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(440, 211, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(441, 211, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(442, 212, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(443, 212, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(444, 212, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(445, 213, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(446, 213, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(447, 213, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(448, 214, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(449, 214, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(450, 214, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(451, 215, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(452, 215, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(453, 215, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(454, 216, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(455, 216, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(456, 216, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(457, 217, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(458, 217, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(459, 217, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(460, 218, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(461, 218, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(462, 218, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(463, 219, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(464, 219, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(465, 219, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(466, 220, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(467, 220, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(468, 220, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(469, 221, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(470, 221, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(471, 221, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(472, 222, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(473, 222, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(474, 222, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(475, 223, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(476, 223, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(477, 223, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(478, 224, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(479, 224, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(480, 224, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(481, 225, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(482, 225, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(483, 225, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(484, 226, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(485, 226, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(486, 226, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(487, 227, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(488, 227, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(489, 227, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(490, 228, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(491, 228, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(492, 228, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(493, 229, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(494, 229, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(495, 229, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(496, 230, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(497, 230, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(498, 230, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(499, 231, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(500, 231, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(501, 231, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(502, 232, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(503, 232, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(504, 232, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(505, 233, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(506, 233, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(507, 233, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(508, 234, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(509, 234, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(510, 234, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(511, 235, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(512, 235, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(513, 235, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(514, 236, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(515, 236, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(516, 236, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(517, 237, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(518, 237, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(519, 237, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(520, 238, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(521, 238, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(522, 238, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(523, 239, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(524, 239, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(525, 239, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(526, 240, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(527, 240, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(528, 240, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(529, 241, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(530, 241, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(531, 241, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(532, 242, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(533, 242, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(534, 242, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(535, 243, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(536, 243, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(537, 243, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(538, 244, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(539, 244, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(540, 244, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(541, 245, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(542, 245, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(543, 245, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(544, 246, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(545, 246, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(546, 246, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(547, 247, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(548, 247, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(549, 247, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(550, 248, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(551, 248, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(552, 248, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(553, 249, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(554, 249, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(555, 249, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(556, 250, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(557, 250, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(558, 250, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(559, 251, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(560, 251, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(561, 251, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(562, 252, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(563, 252, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(564, 252, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(565, 253, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(566, 253, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(567, 253, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(568, 254, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(569, 254, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(570, 254, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(571, 255, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(572, 255, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(573, 255, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(574, 256, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(575, 256, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(576, 256, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(577, 257, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(578, 257, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(579, 257, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(580, 258, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(581, 258, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(582, 258, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(583, 259, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(584, 259, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(585, 259, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(586, 260, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(587, 260, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(588, 260, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(589, 261, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(590, 261, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(591, 261, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(592, 262, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(593, 262, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(594, 262, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(595, 263, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(596, 263, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(597, 263, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(598, 264, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(599, 264, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(600, 264, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(601, 265, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(602, 265, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(603, 265, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(604, 266, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(605, 266, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(606, 266, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(607, 267, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(608, 267, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(609, 267, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(610, 268, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(611, 268, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(612, 268, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(613, 269, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(614, 269, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(615, 269, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(616, 270, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(617, 270, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(618, 270, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(619, 271, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(620, 271, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(621, 271, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(622, 272, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(623, 272, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(624, 272, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(625, 273, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(626, 273, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(627, 273, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(628, 274, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(629, 274, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(630, 274, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(631, 275, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(632, 275, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(633, 275, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(634, 276, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(635, 276, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(636, 276, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(637, 277, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(638, 277, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(639, 277, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(640, 278, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(641, 278, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(642, 278, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(643, 279, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(644, 279, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(645, 279, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(646, 280, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(647, 280, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(648, 280, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(649, 281, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(650, 281, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(651, 281, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(652, 282, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(653, 282, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2);
INSERT INTO `student_invoice` (`id`, `user_id`, `session_id`, `term_id`, `item_id`, `price`, `quantity`, `total`, `discount`, `amount_paid`, `type`, `note`, `batch_id`) VALUES
(654, 282, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(655, 283, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(656, 283, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(657, 283, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(658, 284, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(659, 284, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(660, 284, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(661, 285, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(662, 285, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(663, 285, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(664, 286, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(665, 286, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(666, 286, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(667, 287, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(668, 287, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(669, 287, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(670, 288, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(671, 288, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(672, 288, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(673, 289, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(674, 289, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(675, 289, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(676, 290, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(677, 290, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(678, 290, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(679, 291, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(680, 291, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(681, 291, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(682, 292, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(683, 292, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(684, 292, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(685, 293, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(686, 293, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(687, 293, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(688, 294, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(689, 294, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(690, 294, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(691, 295, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(692, 295, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(693, 295, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(694, 296, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(695, 296, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(696, 296, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(697, 297, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(698, 297, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(699, 297, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(700, 298, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(701, 298, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(702, 298, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(703, 299, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(704, 299, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(705, 299, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(706, 303, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(707, 303, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(708, 303, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(709, 305, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(710, 305, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(711, 305, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(712, 306, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(713, 306, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(714, 306, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2),
(715, 307, 1, 3, 1, 40000, 1, 40000, 0, 0, 'Compulsary', 'Additional Note', 2),
(716, 307, 1, 3, 2, 5000, 1, 5000, 0, 0, 'Compulsary', 'Additional Note', 2),
(717, 307, 1, 3, 3, 3000, 2, 6000, 0, 0, 'Compulsary', 'Additional Note', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_offering_subject`
--

DROP TABLE IF EXISTS `student_offering_subject`;
CREATE TABLE IF NOT EXISTS `student_offering_subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  `elective` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_offering_subject`
--

INSERT INTO `student_offering_subject` (`id`, `user_id`, `subject_id`, `batch_id`, `term_id`, `elective`) VALUES
(1, 1, 1, 1, 1, 'NO'),
(2, 2, 1, 1, 1, 'NO'),
(3, 1, 3, 1, 1, 'NO'),
(4, 2, 3, 1, 1, 'NO'),
(5, 1, 2, 1, 1, 'NO'),
(6, 2, 2, 1, 1, 'NO'),
(15, 3, 1, 2, 1, 'NO'),
(13, 1, 4, 1, 1, 'NO'),
(14, 2, 4, 1, 1, 'NO'),
(16, 4, 1, 2, 1, 'NO'),
(17, 3, 2, 2, 1, 'NO'),
(18, 4, 2, 2, 1, 'NO'),
(19, 1, 5, 1, 1, 'NO'),
(20, 2, 5, 1, 1, 'NO'),
(21, 3, 3, 2, 1, 'NO'),
(22, 4, 3, 2, 1, 'NO'),
(23, 3, 4, 2, 1, 'NO'),
(24, 4, 4, 2, 1, 'NO'),
(25, 15, 1, 1, 1, 'NO'),
(26, 15, 2, 1, 1, 'NO'),
(27, 15, 3, 1, 1, 'NO'),
(28, 15, 4, 1, 1, 'NO'),
(29, 15, 5, 1, 1, 'NO'),
(30, 54, 1, 1, 1, 'NO'),
(31, 54, 2, 1, 1, 'NO'),
(32, 54, 3, 1, 1, 'NO'),
(33, 54, 4, 1, 1, 'NO'),
(34, 54, 5, 1, 1, 'NO'),
(35, 55, 1, 1, 1, 'NO'),
(36, 55, 2, 1, 1, 'NO'),
(37, 55, 3, 1, 1, 'NO'),
(38, 55, 4, 1, 1, 'NO'),
(39, 55, 5, 1, 1, 'NO'),
(40, 56, 1, 1, 1, 'NO'),
(41, 56, 2, 1, 1, 'NO'),
(42, 56, 3, 1, 1, 'NO'),
(43, 56, 4, 1, 1, 'NO'),
(44, 56, 5, 1, 1, 'NO'),
(45, 57, 1, 1, 1, 'NO'),
(46, 57, 2, 1, 1, 'NO'),
(47, 57, 3, 1, 1, 'NO'),
(48, 57, 4, 1, 1, 'NO'),
(49, 57, 5, 1, 1, 'NO'),
(50, 58, 1, 1, 1, 'NO'),
(51, 58, 2, 1, 1, 'NO'),
(52, 58, 3, 1, 1, 'NO'),
(53, 58, 4, 1, 1, 'NO'),
(54, 58, 5, 1, 1, 'NO'),
(55, 59, 1, 1, 1, 'NO'),
(56, 59, 2, 1, 1, 'NO'),
(57, 59, 3, 1, 1, 'NO'),
(58, 59, 4, 1, 1, 'NO'),
(59, 59, 5, 1, 1, 'NO'),
(60, 60, 1, 1, 1, 'NO'),
(61, 60, 2, 1, 1, 'NO'),
(62, 60, 3, 1, 1, 'NO'),
(63, 60, 4, 1, 1, 'NO'),
(64, 60, 5, 1, 1, 'NO'),
(65, 63, 1, 1, 1, 'NO'),
(66, 63, 2, 1, 1, 'NO'),
(67, 63, 3, 1, 1, 'NO'),
(68, 63, 4, 1, 1, 'NO'),
(69, 63, 5, 1, 1, 'NO'),
(70, 64, 1, 1, 1, 'NO'),
(71, 64, 2, 1, 1, 'NO'),
(72, 64, 3, 1, 1, 'NO'),
(73, 64, 4, 1, 1, 'NO'),
(74, 64, 5, 1, 1, 'NO'),
(75, 65, 1, 1, 1, 'NO'),
(76, 65, 2, 1, 1, 'NO'),
(77, 65, 3, 1, 1, 'NO'),
(78, 65, 4, 1, 1, 'NO'),
(79, 65, 5, 1, 1, 'NO'),
(80, 66, 1, 1, 1, 'NO'),
(81, 66, 2, 1, 1, 'NO'),
(82, 66, 3, 1, 1, 'NO'),
(83, 66, 4, 1, 1, 'NO'),
(84, 66, 5, 1, 1, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `subject_names`
--

DROP TABLE IF EXISTS `subject_names`;
CREATE TABLE IF NOT EXISTS `subject_names` (
  `subject_id` int NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(300) DEFAULT NULL,
  `abbreviation` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_names`
--

INSERT INTO `subject_names` (`subject_id`, `subject_name`, `abbreviation`) VALUES
(1, 'Mathematics', 'Maths'),
(2, 'English', 'English'),
(3, 'Agricultural Science', 'Agric Sci'),
(4, 'Biology', 'Biology'),
(5, 'Physics', 'Physics'),
(6, 'Chemistry', 'Chemistry'),
(7, 'Commerce', 'Commerce'),
(8, 'Account', 'Account'),
(9, 'Literature In English', 'Literature'),
(10, 'I.C.T', 'I.C.T'),
(11, 'Government', 'Government'),
(12, 'Catering Craft Practice', 'C.C.P'),
(13, 'Geography', 'Geography'),
(14, 'CRK', 'CRK'),
(15, 'Yoruba', 'Yoruba'),
(16, 'Civic Education', 'Civic'),
(17, 'Business Studies', 'Business Studies'),
(18, 'Basic Science', 'Basic Science'),
(19, 'French', 'French'),
(20, 'History', 'History'),
(21, 'Music', 'Music'),
(22, 'Further Mathematics', 'Further Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `template_id` int NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`template_id`, `template_name`) VALUES
(1, 'First Term Report (Sec)');

-- --------------------------------------------------------

--
-- Table structure for table `template_assessment`
--

DROP TABLE IF EXISTS `template_assessment`;
CREATE TABLE IF NOT EXISTS `template_assessment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `template_id` int DEFAULT NULL,
  `assesment_name` varchar(255) DEFAULT NULL,
  `abbreviation` varchar(300) DEFAULT NULL,
  `max_score` varchar(300) DEFAULT NULL,
  `show_on_report` varchar(300) DEFAULT NULL,
  `session_id` int DEFAULT NULL,
  `term_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_assessment`
--

INSERT INTO `template_assessment` (`id`, `template_id`, `assesment_name`, `abbreviation`, `max_score`, `show_on_report`, `session_id`, `term_id`) VALUES
(1, 1, 'First Ca', '1st Ca', '20', 'on', 1, 1),
(2, 1, 'Second Ca', '2nd Ca', '20', 'on', 1, 1),
(3, 1, 'Exam', 'Exam', '60', 'on', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

DROP TABLE IF EXISTS `term`;
CREATE TABLE IF NOT EXISTS `term` (
  `term_id` int NOT NULL AUTO_INCREMENT,
  `term_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `term_name`, `status`) VALUES
(1, 'First Term', NULL),
(2, 'Second Term', NULL),
(3, 'Third Term', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `termly_fee_summary`
--

DROP TABLE IF EXISTS `termly_fee_summary`;
CREATE TABLE IF NOT EXISTS `termly_fee_summary` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `batch_id` int NOT NULL,
  `session_id` int NOT NULL,
  `term_id` int DEFAULT NULL,
  `total_fees` int DEFAULT '0',
  `total_discount` int DEFAULT '0',
  `amount_to_pay` int GENERATED ALWAYS AS ((`total_fees` - `total_discount`)) VIRTUAL,
  `amount_paid` int DEFAULT '0',
  `outstanding` int GENERATED ALWAYS AS ((`amount_to_pay` - `amount_paid`)) VIRTUAL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=260 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `termly_fee_summary`
--

INSERT INTO `termly_fee_summary` (`id`, `user_id`, `batch_id`, `session_id`, `term_id`, `total_fees`, `total_discount`, `amount_paid`) VALUES
(1, 1, 1, 1, 1, 9000, 0, 0),
(2, 2, 1, 1, 1, 9000, 0, 0),
(3, 12, 1, 1, 1, 9000, 0, 0),
(4, 13, 1, 1, 1, 9000, 0, 0),
(5, 14, 1, 1, 1, 9000, 0, 0),
(6, 15, 1, 1, 1, 9000, 0, 0),
(7, 21, 1, 1, 1, 9000, 0, 0),
(8, 22, 1, 1, 1, 9000, 0, 0),
(9, 54, 1, 1, 1, 9000, 0, 0),
(10, 55, 1, 1, 1, 9000, 0, 0),
(11, 56, 1, 1, 1, 9000, 0, 0),
(12, 57, 1, 1, 1, 9000, 0, 0),
(13, 58, 1, 1, 1, 9000, 0, 0),
(14, 59, 1, 1, 1, 9000, 0, 0),
(15, 60, 1, 1, 1, 9000, 0, 0),
(16, 63, 1, 1, 1, 9000, 0, 0),
(17, 64, 1, 1, 1, 9000, 0, 0),
(18, 65, 1, 1, 1, 9000, 0, 0),
(19, 66, 1, 1, 1, 9000, 0, 0),
(20, 81, 1, 1, 3, 0, 0, 0),
(21, 82, 1, 1, 3, 0, 0, 0),
(22, 83, 1, 1, 3, 0, 0, 0),
(23, 84, 1, 1, 3, 0, 0, 0),
(24, 85, 1, 1, 3, 0, 0, 0),
(25, 86, 1, 1, 3, 0, 0, 0),
(26, 87, 1, 1, 3, 0, 0, 0),
(27, 88, 1, 1, 3, 0, 0, 0),
(28, 89, 1, 1, 3, 0, 0, 0),
(29, 90, 1, 1, 3, 0, 0, 0),
(30, 91, 1, 1, 3, 0, 0, 0),
(31, 92, 1, 1, 3, 0, 0, 0),
(32, 93, 1, 1, 3, 0, 0, 0),
(33, 3, 2, 1, 3, 51000, 0, 0),
(34, 4, 2, 1, 3, 51000, 0, 0),
(35, 16, 2, 1, 3, 51000, 0, 0),
(36, 72, 2, 1, 3, 51000, 0, 0),
(37, 71, 2, 1, 3, 51000, 0, 0),
(38, 70, 2, 1, 3, 51000, 0, 0),
(39, 69, 2, 1, 3, 51000, 0, 0),
(40, 67, 2, 1, 3, 51000, 0, 0),
(41, 68, 2, 1, 3, 51000, 0, 0),
(42, 73, 2, 1, 3, 51000, 0, 0),
(43, 74, 2, 1, 3, 51000, 0, 0),
(44, 75, 2, 1, 3, 51000, 0, 0),
(45, 76, 2, 1, 3, 51000, 0, 0),
(46, 78, 2, 1, 3, 51000, 0, 0),
(47, 94, 2, 1, 3, 51000, 0, 0),
(48, 95, 2, 1, 3, 51000, 0, 0),
(49, 96, 2, 1, 3, 51000, 0, 0),
(50, 97, 2, 1, 3, 51000, 0, 0),
(51, 98, 2, 1, 3, 51000, 0, 0),
(52, 99, 2, 1, 3, 51000, 0, 0),
(53, 100, 2, 1, 3, 51000, 0, 0),
(54, 101, 2, 1, 3, 51000, 0, 0),
(55, 102, 2, 1, 3, 51000, 0, 0),
(56, 103, 2, 1, 3, 51000, 0, 0),
(57, 104, 2, 1, 3, 51000, 0, 0),
(58, 105, 2, 1, 3, 51000, 0, 0),
(59, 106, 2, 1, 3, 51000, 0, 0),
(60, 107, 2, 1, 3, 51000, 0, 0),
(61, 108, 2, 1, 3, 51000, 0, 0),
(62, 109, 2, 1, 3, 51000, 0, 0),
(63, 110, 2, 1, 3, 51000, 0, 0),
(64, 111, 2, 1, 3, 51000, 0, 0),
(65, 112, 2, 1, 3, 51000, 0, 0),
(66, 113, 2, 1, 3, 51000, 0, 0),
(67, 114, 2, 1, 3, 51000, 0, 0),
(68, 115, 2, 1, 3, 51000, 0, 0),
(69, 116, 2, 1, 3, 51000, 0, 0),
(70, 117, 2, 1, 3, 51000, 0, 0),
(71, 118, 2, 1, 3, 51000, 0, 0),
(72, 119, 2, 1, 3, 51000, 0, 0),
(73, 120, 2, 1, 3, 51000, 0, 0),
(74, 121, 2, 1, 3, 51000, 0, 0),
(75, 122, 2, 1, 3, 51000, 0, 0),
(76, 123, 2, 1, 3, 51000, 0, 0),
(77, 124, 2, 1, 3, 51000, 0, 0),
(78, 125, 2, 1, 3, 51000, 0, 0),
(79, 126, 2, 1, 3, 51000, 0, 0),
(80, 127, 2, 1, 3, 51000, 0, 0),
(81, 128, 2, 1, 3, 51000, 0, 0),
(82, 129, 2, 1, 3, 51000, 0, 0),
(83, 130, 2, 1, 3, 51000, 0, 0),
(84, 131, 2, 1, 3, 51000, 0, 0),
(85, 132, 2, 1, 3, 51000, 0, 0),
(86, 133, 2, 1, 3, 51000, 0, 0),
(87, 134, 2, 1, 3, 51000, 0, 0),
(88, 135, 2, 1, 3, 51000, 0, 0),
(89, 136, 2, 1, 3, 51000, 0, 0),
(90, 137, 2, 1, 3, 51000, 0, 0),
(91, 138, 2, 1, 3, 51000, 0, 0),
(92, 139, 2, 1, 3, 51000, 0, 0),
(93, 140, 2, 1, 3, 51000, 0, 0),
(94, 141, 2, 1, 3, 51000, 0, 0),
(95, 142, 2, 1, 3, 51000, 0, 0),
(96, 143, 2, 1, 3, 51000, 0, 0),
(97, 144, 2, 1, 3, 51000, 0, 0),
(98, 145, 2, 1, 3, 51000, 0, 0),
(99, 146, 2, 1, 3, 51000, 0, 0),
(100, 147, 2, 1, 3, 51000, 0, 0),
(101, 148, 2, 1, 3, 51000, 0, 0),
(102, 149, 2, 1, 3, 51000, 0, 0),
(103, 150, 2, 1, 3, 51000, 0, 0),
(104, 151, 2, 1, 3, 51000, 0, 0),
(105, 152, 2, 1, 3, 51000, 0, 0),
(106, 153, 2, 1, 3, 51000, 0, 0),
(107, 154, 2, 1, 3, 51000, 0, 0),
(108, 155, 2, 1, 3, 51000, 0, 0),
(109, 156, 2, 1, 3, 51000, 0, 0),
(110, 157, 2, 1, 3, 51000, 0, 0),
(111, 158, 2, 1, 3, 51000, 0, 0),
(112, 159, 2, 1, 3, 51000, 0, 0),
(113, 160, 2, 1, 3, 51000, 0, 0),
(114, 161, 2, 1, 3, 51000, 0, 0),
(115, 162, 2, 1, 3, 51000, 0, 0),
(116, 163, 2, 1, 3, 51000, 0, 0),
(117, 164, 2, 1, 3, 51000, 0, 0),
(118, 165, 2, 1, 3, 51000, 0, 0),
(119, 166, 2, 1, 3, 51000, 0, 0),
(120, 167, 2, 1, 3, 51000, 0, 0),
(121, 168, 2, 1, 3, 51000, 0, 0),
(122, 169, 2, 1, 3, 51000, 0, 0),
(123, 170, 2, 1, 3, 51000, 0, 0),
(124, 171, 2, 1, 3, 51000, 0, 0),
(125, 172, 2, 1, 3, 51000, 0, 0),
(126, 173, 2, 1, 3, 51000, 0, 0),
(127, 174, 2, 1, 3, 51000, 0, 0),
(128, 175, 2, 1, 3, 51000, 0, 0),
(129, 176, 2, 1, 3, 51000, 0, 0),
(130, 177, 2, 1, 3, 51000, 0, 0),
(131, 178, 2, 1, 3, 51000, 0, 0),
(132, 179, 2, 1, 3, 51000, 0, 0),
(133, 180, 2, 1, 3, 51000, 0, 0),
(134, 181, 2, 1, 3, 51000, 0, 0),
(135, 182, 2, 1, 3, 51000, 0, 0),
(136, 183, 2, 1, 3, 51000, 0, 0),
(137, 184, 2, 1, 3, 51000, 0, 0),
(138, 185, 2, 1, 3, 51000, 0, 0),
(139, 186, 2, 1, 3, 51000, 0, 0),
(140, 187, 2, 1, 3, 51000, 0, 0),
(141, 188, 2, 1, 3, 51000, 0, 0),
(142, 189, 2, 1, 3, 51000, 0, 0),
(143, 190, 2, 1, 3, 51000, 0, 0),
(144, 191, 2, 1, 3, 51000, 0, 0),
(145, 192, 2, 1, 3, 51000, 0, 0),
(146, 193, 2, 1, 3, 51000, 0, 0),
(147, 194, 2, 1, 3, 51000, 0, 0),
(148, 195, 2, 1, 3, 51000, 0, 0),
(149, 196, 2, 1, 3, 51000, 0, 0),
(150, 197, 2, 1, 3, 51000, 0, 0),
(151, 198, 2, 1, 3, 51000, 0, 0),
(152, 199, 2, 1, 3, 51000, 0, 0),
(153, 200, 2, 1, 3, 51000, 0, 0),
(154, 201, 2, 1, 3, 51000, 0, 0),
(155, 202, 2, 1, 3, 51000, 0, 0),
(156, 203, 2, 1, 3, 51000, 0, 0),
(157, 204, 2, 1, 3, 51000, 0, 0),
(158, 205, 2, 1, 3, 51000, 0, 0),
(159, 206, 2, 1, 3, 51000, 0, 0),
(160, 207, 2, 1, 3, 51000, 0, 0),
(161, 208, 2, 1, 3, 51000, 0, 0),
(162, 209, 2, 1, 3, 51000, 0, 0),
(163, 210, 2, 1, 3, 51000, 0, 0),
(164, 211, 2, 1, 3, 51000, 0, 0),
(165, 212, 2, 1, 3, 51000, 0, 0),
(166, 213, 2, 1, 3, 51000, 0, 0),
(167, 214, 2, 1, 3, 51000, 0, 0),
(168, 215, 2, 1, 3, 51000, 0, 0),
(169, 216, 2, 1, 3, 51000, 0, 0),
(170, 217, 2, 1, 3, 51000, 0, 0),
(171, 218, 2, 1, 3, 51000, 0, 0),
(172, 219, 2, 1, 3, 51000, 0, 0),
(173, 220, 2, 1, 3, 51000, 0, 0),
(174, 221, 2, 1, 3, 51000, 0, 0),
(175, 222, 2, 1, 3, 51000, 0, 0),
(176, 223, 2, 1, 3, 51000, 0, 0),
(177, 224, 2, 1, 3, 51000, 0, 0),
(178, 225, 2, 1, 3, 51000, 0, 0),
(179, 226, 2, 1, 3, 51000, 0, 0),
(180, 227, 2, 1, 3, 51000, 0, 0),
(181, 228, 2, 1, 3, 51000, 0, 0),
(182, 229, 2, 1, 3, 51000, 0, 0),
(183, 230, 2, 1, 3, 51000, 0, 0),
(184, 231, 2, 1, 3, 51000, 0, 0),
(185, 232, 2, 1, 3, 51000, 0, 0),
(186, 233, 2, 1, 3, 51000, 0, 0),
(187, 234, 2, 1, 3, 51000, 0, 0),
(188, 235, 2, 1, 3, 51000, 0, 0),
(189, 236, 2, 1, 3, 51000, 0, 0),
(190, 237, 2, 1, 3, 51000, 0, 0),
(191, 238, 2, 1, 3, 51000, 0, 0),
(192, 239, 2, 1, 3, 51000, 0, 0),
(193, 240, 2, 1, 3, 51000, 0, 0),
(194, 241, 2, 1, 3, 51000, 0, 0),
(195, 242, 2, 1, 3, 51000, 0, 0),
(196, 243, 2, 1, 3, 51000, 0, 0),
(197, 244, 2, 1, 3, 51000, 0, 0),
(198, 245, 2, 1, 3, 51000, 0, 0),
(199, 246, 2, 1, 3, 51000, 0, 0),
(200, 247, 2, 1, 3, 51000, 0, 0),
(201, 248, 2, 1, 3, 51000, 0, 0),
(202, 249, 2, 1, 3, 51000, 0, 0),
(203, 250, 2, 1, 3, 51000, 0, 0),
(204, 251, 2, 1, 3, 51000, 0, 0),
(205, 252, 2, 1, 3, 51000, 0, 0),
(206, 253, 2, 1, 3, 51000, 0, 0),
(207, 254, 2, 1, 3, 51000, 0, 0),
(208, 255, 2, 1, 3, 51000, 0, 0),
(209, 256, 2, 1, 3, 51000, 0, 0),
(210, 257, 2, 1, 3, 51000, 0, 0),
(211, 258, 2, 1, 3, 51000, 0, 0),
(212, 259, 2, 1, 3, 51000, 0, 0),
(213, 260, 2, 1, 3, 51000, 0, 0),
(214, 261, 2, 1, 3, 51000, 0, 0),
(215, 262, 2, 1, 3, 51000, 0, 0),
(216, 263, 2, 1, 3, 51000, 0, 0),
(217, 264, 2, 1, 3, 51000, 0, 0),
(218, 265, 2, 1, 3, 51000, 0, 0),
(219, 266, 2, 1, 3, 51000, 0, 0),
(220, 267, 2, 1, 3, 51000, 0, 0),
(221, 268, 2, 1, 3, 51000, 0, 0),
(222, 269, 2, 1, 3, 51000, 0, 0),
(223, 270, 2, 1, 3, 51000, 0, 0),
(224, 271, 2, 1, 3, 51000, 0, 0),
(225, 272, 2, 1, 3, 51000, 0, 0),
(226, 273, 2, 1, 3, 51000, 0, 0),
(227, 274, 2, 1, 3, 51000, 0, 0),
(228, 275, 2, 1, 3, 51000, 0, 0),
(229, 276, 2, 1, 3, 51000, 0, 0),
(230, 277, 2, 1, 3, 51000, 0, 0),
(231, 278, 2, 1, 3, 51000, 0, 0),
(232, 279, 2, 1, 3, 51000, 0, 0),
(233, 280, 2, 1, 3, 51000, 0, 0),
(234, 281, 2, 1, 3, 51000, 0, 0),
(235, 282, 2, 1, 3, 51000, 0, 0),
(236, 283, 2, 1, 3, 51000, 0, 0),
(237, 284, 2, 1, 3, 51000, 0, 0),
(238, 285, 2, 1, 3, 51000, 0, 0),
(239, 286, 2, 1, 3, 51000, 0, 0),
(240, 287, 2, 1, 3, 51000, 0, 0),
(241, 288, 2, 1, 3, 51000, 0, 0),
(242, 289, 2, 1, 3, 51000, 0, 0),
(243, 290, 2, 1, 3, 51000, 0, 0),
(244, 291, 2, 1, 3, 51000, 0, 0),
(245, 292, 2, 1, 3, 51000, 0, 0),
(246, 293, 2, 1, 3, 51000, 0, 0),
(247, 294, 2, 1, 3, 51000, 0, 0),
(248, 295, 2, 1, 3, 51000, 0, 0),
(249, 296, 2, 1, 3, 51000, 0, 0),
(250, 297, 2, 1, 3, 51000, 0, 0),
(251, 298, 2, 1, 3, 51000, 0, 0),
(252, 299, 2, 1, 3, 51000, 0, 0),
(253, 301, 1, 1, 3, 0, 0, 0),
(254, 302, 1, 1, 3, 0, 0, 0),
(255, 303, 2, 1, 3, 51000, 0, 0),
(256, 304, 1, 1, 3, 0, 0, 0),
(257, 305, 2, 1, 3, 51000, 0, 0),
(258, 306, 2, 1, 3, 51000, 0, 0),
(259, 307, 2, 1, 3, 51000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `surname` varchar(300) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `admission_number` varchar(300) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `parent_id` int DEFAULT NULL,
  `linked_status` varchar(255) DEFAULT NULL,
  `parent_fullname` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `staff_type` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `blood_group_id` varchar(11) DEFAULT NULL,
  `nationality_id` varchar(255) DEFAULT NULL,
  `state_of_origin_id` varchar(255) DEFAULT NULL,
  `local_gov_of_origin` varchar(255) DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  `student_category_id` varchar(300) DEFAULT NULL,
  `student_type` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `health_info` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Active',
  `photo` varchar(300) DEFAULT 'undraw_profile.svg',
  `signature` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `total_fees` int DEFAULT '0',
  `total_discount` int DEFAULT '0',
  `amount_to_pay` int GENERATED ALWAYS AS ((`total_fees` - `total_discount`)) VIRTUAL,
  `amount_paid` int DEFAULT '0',
  `outstanding` int GENERATED ALWAYS AS ((`amount_to_pay` - `amount_paid`)) VIRTUAL,
  `wallet_balance` int DEFAULT NULL,
  `employee_number` varchar(255) DEFAULT NULL,
  `employment_date` date DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `employee_position` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `nextofkin_name` varchar(255) DEFAULT NULL,
  `nextofkin_relationship` varchar(255) DEFAULT NULL,
  `nextofkin_mobile_number` varchar(255) DEFAULT NULL,
  `next_of_kin_address` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `assigned_batch_id` int DEFAULT NULL,
  `cv` varchar(300) DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `number_of_wards` int DEFAULT '0',
  `parent_join_date` date DEFAULT NULL,
  `parent_number` varchar(300) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `emergency` varchar(255) DEFAULT NULL,
  `pickup` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=308 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `title`, `surname`, `first_name`, `middle_name`, `admission_number`, `admission_date`, `date_created`, `date_of_birth`, `gender`, `parent_id`, `linked_status`, `parent_fullname`, `user_type`, `staff_type`, `user_role`, `religion`, `blood_group_id`, `nationality_id`, `state_of_origin_id`, `local_gov_of_origin`, `batch_id`, `student_category_id`, `student_type`, `email`, `mobile_number`, `phone_no`, `address`, `health_info`, `status`, `photo`, `signature`, `username`, `password`, `total_fees`, `total_discount`, `amount_paid`, `wallet_balance`, `employee_number`, `employment_date`, `marital_status`, `employee_position`, `department`, `nextofkin_name`, `nextofkin_relationship`, `nextofkin_mobile_number`, `next_of_kin_address`, `bank_name`, `account_number`, `account_name`, `assigned_batch_id`, `cv`, `subject_id`, `qualification`, `salary`, `number_of_wards`, `parent_join_date`, `parent_number`, `relationship`, `emergency`, `pickup`) VALUES
(1, NULL, 'Ogundimu', 'Olumide', 'olalekn', '001', NULL, '2023-05-11', '2017-02-10', 'Male', NULL, 'Linked', NULL, 'Student', NULL, 'Admin', 'Christian', '', '', 'Abia', 'Umuahia North', 1, '1', 'Day', 'lake1universalconcept@gmail.com', '08074752239', NULL, 'Ogba Nigeria', '', 'Active', '', NULL, 's1', '$2y$10$rI2sb2MYDTPw9q0ZKYSlFeBF3LLmsfiXvKo2D8HivHkx.z3TYT9oq', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'Temi', 'Odewunmi', '', '002', NULL, '2023-05-12', '2019-01-12', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', 'Christian', '', '', 'Ogun', 'Ogun Waterside', 1, '1', 'Day', 'lecrosofttech@gmail.com', '08104986022', NULL, 'somolu barriga Lagos', '', 'Active', '', NULL, 's2', '$2y$10$Qo6l0wF5Y45XDP0Ucpx7KuEILq1ntgVZy5/0GhDrOnsXYlvORI4S6', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'Tope', 'Shobayo', '', '003', NULL, '2023-05-14', '2017-01-06', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Teacher', 'Christian', '4', '', 'Ogun', 'Odeda', 2, '', 'Day', 'lake1universalconcept@gmail.com', '08074752239', NULL, 'Ogba Nigeria', '', 'Active', '', NULL, 's3', '$2y$10$LA16Ur/epUQkhypTeKN2iOvR41bZwqtoofeycTrUTeW13u6mPEI82', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'Maay', 'Mololuwa', '', '004', NULL, '2023-05-14', '2002-12-02', 'Female', NULL, 'Linked', NULL, 'Student', NULL, 'Student', 'Christian', '', '', 'Adamawa', 'Song', 2, '1', 'Day', 'lecrosofttech@gmail.com', '08104986022', NULL, 'somolu barriga Lagos', '', 'Active', '', NULL, 's4', '$2y$10$x/MnHlmE0EFCLKCfKJKvg.R3l13agXxDBrZMaoDl.YSPxBA71Zj/S', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(5, 'Mr', 'Ajanaku', 'Saheed', '', NULL, NULL, '2023-05-16', NULL, 'Male', NULL, NULL, NULL, 'Guardian', NULL, 'Guardian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lake1universalconcept@gmail.com', '08074752239', '', 'Ogba Nigeria', NULL, 'Active', '', NULL, 'p5', '$2y$10$FEeHD.KbawLlwMZxsEhisebNcBl6BHjtz0jLdNnswrPTFyJtj0NKS', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'father', 'YES', 'YES'),
(15, NULL, 'Teni', 'Makanaki', '', '235', NULL, '2023-05-20', '2014-01-20', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', 'Christian', '2', '', 'AkwaIbom', 'Ikot Ekpene', 1, '1', 'Day', 'lecrosofttech@gmail.com', '08104986022', NULL, 'somolu barriga Lagos', '', 'Active', '', NULL, 's15', '$2y$10$AHxcrkcKLc8Sh21zhB52iey6JL/N2VxkujRE7hlq3Hm3dPwRm4qz6', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(14, NULL, 'Samuel', 'Aruwa', '', '224', NULL, '2023-05-20', '2019-02-08', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', 'Muslim', '2', '', 'AkwaIbom', 'Mbo', 1, '1', 'Day', 'lecrosofttech@gmail.com', '08104986022', NULL, 'somolu barriga Lagos', '', 'Active', '', NULL, 's14', '$2y$10$R0yfGreVKL8.kDGn57kjJuddHaY5le.Hcs8FG1MoBTR20nE4nAVC6', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(13, NULL, 'PHARMACY', 'HEPHSAM', '', '009', NULL, '2023-05-20', '2023-05-05', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', 'Christian', '3', '', 'AkwaIbom', 'Ibeno', 1, '1', 'Day', 'lecrosofttech@gmail.com', '08104986022', NULL, 'somolu barriga Lagos', '', 'Active', '', NULL, 's13', '$2y$10$pdUYEQ.XhfPtWdz2rrD/5.me/FCsrp66eW93pIrqankNk.zF1.urq', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(12, NULL, 'Funsho', 'Williams', '', '006', NULL, '2023-05-20', '2012-02-02', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', 'Christian', '4', '', 'AkwaIbom', 'Ika', 1, '1', 'Day', 'lecrosofttech@gmail.com', '08104986022', NULL, 'somolu barriga Lagos', '', 'Active', '', NULL, 's12', '$2y$10$jNPu3EDX9/bXHIgxFlsm3Of8qHYrRsrm/ZUCz18UoZ2U/kLIffPS6', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(16, NULL, 'fadekemi', 'Olumide', 'Store', '009', NULL, '2023-05-20', '2023-05-20', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', 'Christian', '', '', 'AkwaIbom', 'Mbo', 2, '2', '', 'lake1universalconcept@gmail.com', '08074752239', NULL, 'Ogba Nigeria', '', 'Active', '', NULL, 's16', '$2y$10$pB6BDIgo8Na20YfXe45TDu6g8fTxIWTg9F7t0FNJqwCe7.fAmBP6e', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(18, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(19, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's19', '$2y$10$H5y7o07Z3NCZExzoNmC.yeHq6jsHS8u1GaVAX65311UUf1.XuK5n6', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(20, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's20', '$2y$10$pZDy1ZcnGRiJFhQT0Az1ceLBG98/lKOyjM1HQP3mSuK6oznoiOHQ2', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(21, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's21', '$2y$10$LO2Xu5OWgc6Y2MJjOtx7yObBqpRfPScFU1XYpX6BQBY0EKeTK/MWS', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(22, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's22', '$2y$10$kko4d0h2nhgNpm7h0ygkzeeeqwbdNA4zqOf/3T/dKlmLLQ4W0500.', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(23, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's23', '$2y$10$ZmKqHFguSxkU2pKmgdTlt.JE3RwjQ0fNEoJ3A7G0C3g5EDpjZvcZO', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(24, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's24', '$2y$10$H7fg/GRnb4yYRFCJ/ZE39ej.p91sigt7xZ151JUkMqBirWyQ.dRIG', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(25, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's25', '$2y$10$9HdQgWq8m2dCgb3jrJ4MJuBZkr81nIjsbrtUwuapCluCB/7Zwsd9i', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(26, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's26', '$2y$10$tw.OkKSSdb0BlHy5yufIGu94dBWc/O7vINHsTFF2.KuNwPQC5tN.G', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(27, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's27', '$2y$10$l31f8bLXoAKI9o3Y9b6fJeOkQ0QxunBFnEmpeM98NOJNC/RMbwxza', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(28, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's28', '$2y$10$Y7JTqftOD2EQb4OJF7X/.O0PPTse3qyfy/KabhAt1y9rHCDo9brKG', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(29, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's29', '$2y$10$S14yJqjN6BUTzJoHvjqNn.9a9p5ZwPyE9/oGb6Ovkbr9eVh7ot3Uu', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(30, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's30', '$2y$10$xns9NCbsz0ehyuL0Kq8EBems7ZNNUJRtE9N2WKff9eMMeH7vOKTcC', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(31, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's31', '$2y$10$.KO3eCUBmlZdYmTbZaDXCO9zrKCITuenIGQ7xrZFmLBe79f1FBpR2', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(32, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's32', '$2y$10$uC4TKzqFL0KF56zLuqyklOU.KkMrtvitJYAkEgnSo67WXZu9krsoO', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(33, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's33', '$2y$10$CRkBTZdfx8QAjByajmJyh.bgCynJQsUhRL4VlQcd/OxYlS4Z3/P72', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(34, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's34', '$2y$10$GxMMI00vZ0jylYSeJVbNY.mxJ4OYKlJnYj0OaO4qgZL5sl7ArPnN2', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(35, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's35', '$2y$10$/ltZz/ze84kw9p6yJ2blwOpp713x2rrMebuQGcoKcKtfg.vVAGoAi', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(36, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's36', '$2y$10$Dz1cbgcKmKpXMoZ8zkFaZOmU7Ezjcnf4yAc2MmuaQhUe6zV..O0gC', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(37, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's37', '$2y$10$tCULXTqQ3Ohjpdp2FNzW2OC45sr3PRXguj79.fJvRnDeytajyeszu', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(38, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's38', '$2y$10$KCXC2N/6yl9F373IRJJZS.Wt24mvrR89A8qNZFUadu7tPIAN5KoxG', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(39, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's39', '$2y$10$UPQH7KiS45wLW2oy9XU/zOgnOnwLNLDJJbdTJyYlhEBohc7w.Kg4G', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(40, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's40', '$2y$10$bYzUnADTRnrKecdPzb46lOeINqCNvGPvhSxegyel2uJ7.Ep.AAT0m', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(41, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's41', '$2y$10$t9ELG3O1l42WA.QRmm/S7ukksMV7G9fcRCBWTmUXH9yMKan188Sg2', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(42, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's42', '$2y$10$Dm47pZQccKpMViVhcICqoeFQEjz8Lx3V711WRz5hO2jsjmX6HFQju', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(43, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's43', '$2y$10$WjsmSZCVtlCxnogAV1VByOXA3fXJwuuMQYVGwgKIecOcJI8rccmiS', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(44, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's44', '$2y$10$C9OtWEWk0wjeYKNThPmCF.magXAvwO46kY7lQvDYj05HSKOibJjNy', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(45, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's45', '$2y$10$GH3VcNR2P4StpYyEmTt0XurOMXLgxysHqNuF98mWkVkICx1d9.SOy', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(46, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's46', '$2y$10$J3tYO1MZKCyOw2ojT3t2.O47NPpxogzy93DAey9LXYHnI3XcZ1l2C', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(47, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's47', '$2y$10$4943W40XFmQJXOJyky7.xOTo0GQRxy2kETt3dRkM9pvO/cIWjTKbK', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(48, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's48', '$2y$10$Dj.fSEG9D66sPG9O3p.XC.B6ennHFvTqT8522x/fgxP96wwSJIKBC', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(49, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's49', '$2y$10$VqNSzZUvSMoJMkhvYojW.evgY1TXJFnVXbqTrokkuAElExJ10EqlC', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(50, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's50', '$2y$10$Z.3qEdNP6reDWR2PxdJfXOYHL0M52yW5ZNdngsAvZr8pOQqG/iOAK', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(51, NULL, 'odun', 'adekola', '', '9', NULL, '1970-01-01', '1970-01-01', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's51', '$2y$10$DCroV0VczKumAIJv8tBDveGnmMDpvj5AE4TZjeofNj09p30hIcaru', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(72, NULL, 'Dele', 'omowoli', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's72', '$2y$10$OwLTM50SO3cb74KrcV7Dl.sRyI5JJ8l80PBlXbmKOlaTN/qr9hGhC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(53, NULL, 'Buruji', 'Kasali', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', NULL, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's53', '$2y$10$VUmrZxwZ5V2/qoNBldL4d.cosZvfKINTDs7c/rGTiNc8qfkChXK3K', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(71, NULL, 'Ayoola', 'Adenuga', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's71', '$2y$10$ADhe.buTg6tcEahhLeA.iuwTSDa9kDL1hcZKJh6qM/55/PRNSc3yC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(70, NULL, 'Dele', 'omowoli', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's70', '$2y$10$hm494DVV/dEuJuKyf.DPdu.FOAoilNYXCEMBn15l6HhDtEf5NUbMi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(69, NULL, 'Ayoola', 'Adenuga', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's69', '$2y$10$XITLGDFjS43/VOJeEi./.uCUoi3t4nn3HxWW92Gf2pjKwYvZNQk3K', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(58, NULL, 'Buruji', 'Kasali', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's58', '$2y$10$fkooZVeAjfcdHZKDtC4kSOdTvVZzorNEKmhp/uvCyRTovZp/tD4we', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(60, NULL, 'Buruji', 'Kasali', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's60', '$2y$10$50esrbN3/x6ZUwF2qiav6OPHm8tzawvmvLPbFcQSZVjvPCiWr3V7a', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(303, NULL, 'tolu', 'Olumide', 'Store', '555', NULL, '2023-10-26', '2023-10-20', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', 'Christian', '3', '', 'AkwaIbom', '', 2, '2', 'Day', 'lake1universalconcept@gmail.com', '08074752239', NULL, 'Ogba Nigeria', '', 'Active', '', NULL, 's303', '$2y$10$iA5qNK0rNKjl9tVBHA/J6eekJsJ.oUez0z8UMGwkri6GVtnmKVXOi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(62, NULL, 'Buruji', 'Kasali', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's62', '$2y$10$YJWD8ptEM8oJi9qlJVRg8Oa2lHGvNqTpuUAT6N2JmsHiZz2u83WqO', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(63, NULL, 'Aderibigbe', 'Esther', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', 79, 'Linked', 'Olalekan Olumide', 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's63', '$2y$10$HAGvxnYxlhjm5ollX5UJRe7VoZfQaWkehbtsjJcqIEh3Cl.9R7TCG', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(64, NULL, 'Buruji', 'Kasali', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's64', '$2y$10$YU22xyAb.tBCqxKCo6nNsuFHctjy3xmo63MEfO8GJQELsneh5s1au', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(65, NULL, 'Wale', 'Adenuga', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, 'Linked', NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's65', '$2y$10$qgcghXCJpzfPfcZePGYC5OfpXoCMM8WDAqNl31n7Pb.E9uCrLlWHC', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(66, NULL, 'Segun', 'dada', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's66', '$2y$10$2ZWWigqARHYJ9vnAXHqWcega.sTSiwJdBoC6Jx3jcypSLZUG5zTZK', 9000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(68, NULL, 'Dele', 'omowoli', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's68', '$2y$10$AC15FQrb/1urBFt4gYkVgu8s4MOu2oMtbNKBuLJvt2n3/gUcICU7.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(73, NULL, 'Ayoola', 'Adenuga', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's73', '$2y$10$iHrwTndliO7pPD9kjxRQ4e0OYdgRjEEJPjp./1AYOujYk1VZJFLP6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(74, NULL, 'Dele', 'omowoli', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's74', '$2y$10$cBghv4Uky9sI81DNCpD78eRxOMHmC5L5WoB/qk7jaDfll1kW9CfjS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(75, NULL, 'Ayoola', 'Adenuga', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's75', '$2y$10$MjvBWzA7qDuUils6ey57fetAx4Snla9KD7sVBEqVZEZro895noHFO', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(76, NULL, 'Dele', 'omowoli', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's76', '$2y$10$g8ZSP/ALiHboBdO4Ngjz1ePYN8rS.dYDcL5W5/hylX7rHB39kWLNO', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(302, NULL, 'yinka', 'Olumide', 'Store', '002ee', NULL, '2023-10-26', '2023-10-26', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', 'Christian', '3', '', 'Adamawa', '', 1, '1', 'Day', 'lake1universalconcept@gmail.com', '08074752239', NULL, 'Ogba Nigeria', '', 'Active', 'blogpic2.jpg', NULL, 's302', '$2y$10$o0oHDAMEylEr0bPfT.MfY.SolcmH51VKT0E4MCbdtTRAeHxsNmPqS', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(78, NULL, 'Dele', 'omowoli', '', '299', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's78', '$2y$10$eYEdZOcEWO7QaGRttD1to./4rAqSzNdC1gkwpAcWUmzqvBIDJZYr2', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(79, 'Mr', 'Olalekan', 'Olumide', '', NULL, NULL, '2023-06-19', NULL, 'Male', NULL, NULL, NULL, 'Guardian', NULL, 'Guardian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lake1universalconcept@gmail.com', '08074752239', '', 'Ogba Nigeria', NULL, 'Active', 'lekan2.jpg', NULL, 'p79', '$2y$10$yCA2p5gtH9SWkb6TvXT5..pIs1UMLxe/q98a0HAsJdRWF9octBFZe', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Driver', 'YES', 'NO'),
(80, NULL, 'Saka', 'Jide', 'Dare', NULL, NULL, NULL, '2023-05-31', 'Male', NULL, NULL, NULL, 'Employee', 'Teaching Staff', 'Teacher', 'Christian', '3', '', NULL, NULL, NULL, NULL, NULL, 'lake1universalconcept@gmail.com', '08074752239', '', 'Ogba Nigeria', NULL, 'Active', '', '', 'e80', '$2y$10$wrfKtBd5odibLEswb.vldOqULXye8mo5CckJmYw9LP52qD22iYH7K', 0, 0, 0, NULL, '225', '2023-06-02', 'Married', '1', 'Junior', '', '', '', '', '', '', '', NULL, NULL, NULL, 'BSC', '', 0, NULL, NULL, NULL, NULL, NULL),
(81, NULL, 'Lamidi', 'Gigan', '', '7', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', 'Day', '', '', NULL, '', '', 'Active', '', NULL, 's81', '$2y$10$oMPQhXWMXcIZzfh0B2sWouD3c0vZToXzlY1.bByCz690ovlT/sxuq', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(92, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', 'Day', '', '', NULL, '', '', 'Active', '', NULL, 's92', '$2y$10$m3leYGHoJgX25PNyL5RAfuH4Zk5/2e.Vii3wmG5GB9ihKrZTp/FxS', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(93, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 1, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's93', '$2y$10$OiscJ/UEIydk7HktnyOSpuuPeLNtU.11gBE8EWrGVJvTlX2.CXq5S', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(94, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's94', '$2y$10$NvdJoQ2MrSVads1/XGW3Bu3fVP7jDWV5br7fKocE7sxveM4kW/JDW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(95, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's95', '$2y$10$oJ22kGUMRNkZNm2Ukz12BO/XjQ88WbUT2wYZiXIR0g9BymeCMscjy', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(96, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's96', '$2y$10$HeNwk7MJ.0XDLfkKR.qz2e4Y0yEIlnhD9v/U2JCVh.paa37evdHt6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(97, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's97', '$2y$10$eM.jBPMKQxUF5kk5388abu3HYJus9e2aQXE.OibimaN3yyih1DIL.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(98, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's98', '$2y$10$uvMRZMXZFGEdIiXRGhswxe9CZXeT7vyK.WqQKOWvxKwYklHRY3fNe', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(99, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's99', '$2y$10$qQ5jDL3RYzYzUaECqBSssOUnveSMg1LghuHeX0hIKhD/8RGOk0owC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(100, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's100', '$2y$10$LSYw8O13I4kg1xtcJO2Ar.zDAaS.GrJP24X6cdn1VSF4v61QJ9aJy', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(101, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's101', '$2y$10$npu09rUfB1MQ5KbsWFIBOuzvS0NHBLtG.YV39u2N3yZOgSGBEwqye', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(102, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's102', '$2y$10$McxGFtshw7/xQ45H2nQY8.FX9kIxluDYs2oF3pkKsL8lOd16FvmA.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(103, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's103', '$2y$10$VGbamSQR6QqnTdHl7hh90.GRdIZSLiJH/E0G7xxP/mNH7QKQiVdoG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(104, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's104', '$2y$10$c/p6vF6dfvHXWJ8A3Gtt/.KoUaTau8dzn1XUfnO4oFvumwHqln.bm', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(105, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's105', '$2y$10$Vbo0inlsLmpJ6t4AgxLreOQqUMTzYOR08he5SEgRiKTGUkHTzkWM.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(106, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's106', '$2y$10$xzb5NiYS8sYyXdz30x.fT.KiTa/JA5fdsXVPNWfFjrZVRSUh28f8S', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(107, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's107', '$2y$10$urjlJFdTipl1BI7NfZO/FOEeDtAsfzTsxU2at.BCPRAXInIrPxnVC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(108, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's108', '$2y$10$KboBO9VuT1vLwEU8Jmcluu/W9NsbiPmrIVjxk/3VRexAYH369F7BO', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(109, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's109', '$2y$10$QKE4bV.AjjJDZUxGWK6MW.EVoaGugQnNO4RCQ9CoPqMFh7IdvHkte', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(110, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's110', '$2y$10$11jbSKZpi0dsTeQxIuoWTelAB1CA4DGY4UpODc/7WVelUCdUdcavS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(111, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's111', '$2y$10$rrSA.abjOLxOeoRV.izXfewu4dhQVFmKPC7bUMQtZROXArgb5sEQe', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(112, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's112', '$2y$10$GNSCmOzgOXHvi49ALFrmHeVSbMnvtpNnHEdYWpVl/KEwwi4gxnuQy', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(113, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's113', '$2y$10$YJ4pIS.2eg2fPDxgy7SkJOSixLzoxgVDal2NdBEllxlrgMLh3TkLi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(114, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's114', '$2y$10$yKAdbY9L4kNj7zx/cT1o/.mdhkcsuN3y6a99g8/Ri2aYQmC3immp6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(115, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's115', '$2y$10$SsW5lOQ2cHi9YNpwndasPunu9qmi7tggiIR603dwbSnNQWNxt9Uvi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(116, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's116', '$2y$10$NfTgOfOF52bDsOtmZ/3bsOt5lTlG1czqIx37/2i4xr0JsyIKY8roG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(117, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's117', '$2y$10$zqHzSqQT4yeTZa6o2OC0N.W8.ETl7nKmN4VKf6H6uZBVrvQSidQai', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(118, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's118', '$2y$10$0IvdYmoVXjkYyb8WJUBTyu4p28nBi.39mpItOzi6DSuSFw4guBfga', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(119, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's119', '$2y$10$N5ZUg09hZCAXOgYx4RiouOo/QIIzLOAgMRsZUgZzsuYcWCPDYZdny', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(120, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's120', '$2y$10$w37jLSoZL/FAMLNI/avTbOZjxoFiP6adJ89udQvOq1rOEGLV9sdcm', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(121, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's121', '$2y$10$MZOG.Us6.3jGLfj/u4ii7.FMgOz45YqgK1I8XfNsDDsREVIOZQr4u', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(122, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's122', '$2y$10$4u4Lor0ox5iRaqfZ3nRb7ePloNOkc4lF7xot7fIvB6ZrVhpQIUUtG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(123, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's123', '$2y$10$MGVuFdKv4Qm3nJeJGglFmeW7KPoc6jQFS/B.n23XYGNddlhCOwPoK', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(124, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's124', '$2y$10$W1FNdoADrAKPxx5ITtswN.XtRgNUH3HUNYVo6r6mUiA8QfhbRf46G', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(125, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's125', '$2y$10$JDrh8azPmnpfY/gXCW7.ruzbbgMXJPZA6/1TWXggWsuWbGD9QXt8e', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(126, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's126', '$2y$10$ZL3hgKg8vymyHN5n0shBsu1X7ZwudvVhxfBAdMk3kGee5C8lyO6hm', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(127, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's127', '$2y$10$tmY41xxv03LY3/QjNeUHWeL1Jqat8wCKl2aesgKQ0X6wzd1kYuIGu', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(128, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's128', '$2y$10$qsBTQPCJ34662d6l8JQeAON6.fDSy3HSCeiAAj5MKshmAyBy4TJ2G', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(129, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's129', '$2y$10$j/TsBSMlLTZOVFtuAADg4OiHpev4bMZsFZzK6bN9cBl1NzG1W8kpa', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(130, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's130', '$2y$10$8bX.D88gl2u6hZ7FuJkCX.DhTaRsACrSHmPUcu55DMfv8Xw4h6qFq', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(131, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's131', '$2y$10$.ERs7tzlPeQh0VmZ5pXqxOOsjll4Cg9n3GhwxOW9.kU9vZB/bNXpe', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(132, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's132', '$2y$10$mSO069lyapGIYYps.omLCeLCK1geM2tNJnolnIvjOP22j.qCGbiqa', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(133, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's133', '$2y$10$fz2xTlUFUEowv.tnw7HYz.47f6kNVcdgats8XW1ZaaV7BzgVTGAIS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(134, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's134', '$2y$10$bPqCwlRGb5/crZmlMrYDHuIrpFVsPreTsJHYDG7I14TjBE8pOP98C', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(135, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's135', '$2y$10$0W5663hsmNAD2XQ6Co5nquDHbI4NZXO.udoOsQpx/zUQTINImYLW.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `user` (`user_id`, `title`, `surname`, `first_name`, `middle_name`, `admission_number`, `admission_date`, `date_created`, `date_of_birth`, `gender`, `parent_id`, `linked_status`, `parent_fullname`, `user_type`, `staff_type`, `user_role`, `religion`, `blood_group_id`, `nationality_id`, `state_of_origin_id`, `local_gov_of_origin`, `batch_id`, `student_category_id`, `student_type`, `email`, `mobile_number`, `phone_no`, `address`, `health_info`, `status`, `photo`, `signature`, `username`, `password`, `total_fees`, `total_discount`, `amount_paid`, `wallet_balance`, `employee_number`, `employment_date`, `marital_status`, `employee_position`, `department`, `nextofkin_name`, `nextofkin_relationship`, `nextofkin_mobile_number`, `next_of_kin_address`, `bank_name`, `account_number`, `account_name`, `assigned_batch_id`, `cv`, `subject_id`, `qualification`, `salary`, `number_of_wards`, `parent_join_date`, `parent_number`, `relationship`, `emergency`, `pickup`) VALUES
(136, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's136', '$2y$10$6RIvFTG/s79lXByt6Ec.Mumnh0kgJIVNQSbcEYKbJ9YNPMcvukaNa', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(137, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's137', '$2y$10$waRuFNge5R2F1BRrS.WY4.cH3FWCKF0bzGcaklYoXO8j.44oVFtqq', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(138, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's138', '$2y$10$UPfzlnw8M3.yvYp2.XTVqOqlINlqJoxOiM9jkZKl8ikBt1RDUGUza', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(139, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's139', '$2y$10$.jXvbK9QYbWXM/UopfNga.cKtfMhiZvjb3e6rDZ41F4dkvEICsflq', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(140, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's140', '$2y$10$ZkBJYQT2bM0Zu0noP6Eny.WkhXsBLRfw1rOV76LSyjC1Rq7cjw/eu', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(141, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's141', '$2y$10$WnuSw3kfmdczz4XesbIbvu0tRrDhaRZT30o6L6ZjfZMY9ANXO51Oq', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(142, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's142', '$2y$10$qxw1H591m6WVyouq.kOwQOb/szDeaVAMY9OsdiMzry8TlE98I.tT2', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(143, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's143', '$2y$10$5HbWPrg.VzOBFjxfxwCI1.5qHkfZANjgSF3wBt9o78sS.gm/FZwA6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(144, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's144', '$2y$10$rCVzdYUKwKyS0HEkKQHV5.MkMgwa2JU.dYUD9ScO/MOrLHt56mn5a', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(145, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's145', '$2y$10$WE3QeO5cTSjI7BtHAptxD.0Xjex8xskA8LM5DFbCLa4FbU6pCD9zi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(146, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's146', '$2y$10$DoIRU2DAk1oPCTMfxFcq8eyYznAbPTWKxEA4qiT2eUR8xp.TecGge', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(147, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's147', '$2y$10$FbkQ8bGejDL9RHB2ldCnf.YxReQ5qBDvL9zODHTN.hTJOiWrk6buy', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(148, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's148', '$2y$10$W44frGzmMA2mzf0Lr427NeZ5jzJyyOkP6R9X5Q3OpxQbydnMpDyVe', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(149, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's149', '$2y$10$WFYZRPR4W7uKztYCZB9kG.Ye8poKRkYMb7R9l/b/8DuFIKmZQVq.6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(150, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's150', '$2y$10$grMeExoxgGB92r0zUJdmCeEGVL7BASy0VNuQVgEot2LdJDChfjgaC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(151, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's151', '$2y$10$h0nPfFIHxD7VGmKjoEhI0.wflYNWNSmGXWcVXpsDGDafH4Y/g08VS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(152, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's152', '$2y$10$LZVZ8I8X4EZUudoKjLwlSeZy.wFn1StREgTOSbim.tMe0myYswsc6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(153, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's153', '$2y$10$sTgWeLx4AwsNc/QEJ8SU3eV.j15XBHdsaT4pmcBlfpLIFnQhVnOw6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(154, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's154', '$2y$10$Ae9Lqs9MD/n8UlFYN9xqYOkf5mG8bePM49FCeoje8GqIEtSH8tR1O', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(155, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's155', '$2y$10$NFP6pbydJkFyQUFA9ZAsCueOkfPvVhnKibOdhwxs4mbzrxXMnKhrW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(156, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's156', '$2y$10$Rau2haamYoMkpGZr5mLO4uLETrl/uQpn4nyJqoevQZMtskpFRbPEu', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(157, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's157', '$2y$10$SefpSnLA0BnMWgQEPSwY3eixnIO5OotKzLBLg0Ot8rzYVqLHkzFXq', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(158, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's158', '$2y$10$Dk4XKpU8I.3YkoNt5.jqxeRFfN.9wTLyJ5SKxHRfM2EJe7vigiT8C', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(159, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's159', '$2y$10$31OvJpaaGJGjtAI6Qfl1f.EmaRZF2Sz1cew9kv74aVRkC/kOp8SHG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(160, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's160', '$2y$10$QweiHOAQwGTMYH1xNwVSLO6hDFLo..uRUfcRAEmgqb6WUr0oQ99MK', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(161, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's161', '$2y$10$65YT1jnJ9vz0btz.evzQAe.kHeTeo8L2qFxMUmydmgTL5Fbee7k1q', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(162, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's162', '$2y$10$I3P7fqYHL6LSw2GqBCIaPeml70er0mQHHt0ffzGmV0.iJPLazwuLa', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(163, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's163', '$2y$10$7/9FnVDN9hHXc06erp1.suaklRkT6FBHD.KpljfewKkRKE8GOaCHC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(164, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's164', '$2y$10$v123bBJv63JRw6ZyatjZAObFFl/ijNn2dlkBFs99Zvu0H1oGXAghK', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(165, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's165', '$2y$10$Aszo6e1dceKYThyz.bp7w.MfoDl3xjfH1OS8aZUuYbR1qAEgUcHk6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(166, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's166', '$2y$10$kPtpaxqUfPs7nvsYh0gPk.1YnlIr97GzTHpzTW.YJE5fqX0xz2cHe', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(167, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's167', '$2y$10$kob4npnLB3WvYBAxgJenPeBjIgGrxtG4AB2hPrjWCLQo1izEEOyae', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(168, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's168', '$2y$10$gUFqYoPz/d98/e8NjysqWO3ysNdLVkpwl03Kr49XIieOSzvJHNvpW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(169, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's169', '$2y$10$HTC1wK6VRgOIEmeTg/5gVu0sqSoZvNovbdIsgWuH07vrz0NTtrO8O', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(170, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's170', '$2y$10$fbFzPoSbuYKJ/vK6eixVielGsTv6nvd/pFFVMqiISnH1QppVht2qq', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(171, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's171', '$2y$10$7009DBKJ619zIA9uupcl1u7BH7vL2X9YGUkNtRYiYaY351y84eDa6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(172, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's172', '$2y$10$vTmEsI/HnnNwgdys/xmkzeL16FyWXUMGuOqpsRhSOy6vWbqxCKGda', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(173, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's173', '$2y$10$2Pe/jHo/IDNx8.vUD7g/3OcTqfghQFxF9lcV8t3oeFB2AYArHEH3u', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(174, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's174', '$2y$10$dUOSOfYaGBCfwPkEHLcaquR54d5UxEU4YiQoEd87LMXSeKesTGzqu', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(175, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's175', '$2y$10$LX2yY1WVtbxqjg8k0stNjOD1ULfWmbKCqvLAd4FA8qKGz.K9uzjIi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(176, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's176', '$2y$10$F.9696h2.a9wN8L4kd9Zzur4kUTSOahOKBofAw7V2wbbyk7Bh1LfW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(177, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's177', '$2y$10$tIkls2oIYlnaNTZpEtAFVuRjkDbioxaXR.VB4bDhfQmIK.Bgg7PtS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(178, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's178', '$2y$10$sfTsEP8cpxOklNrICVPjMebKONhtIwx4dCtCNJkNaYeahUh9PzQW6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(179, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's179', '$2y$10$AUw/2mMNCqXdGh8dw8J8mOWw87/R3Nq3Y0GcuV7G6IJy7ODY9g5Fm', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(180, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's180', '$2y$10$gyOxvj4FMP5mSyKqeMdPhOpb/CYwowmjljB4f4J4H.q3UeQFI1GFe', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(181, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's181', '$2y$10$8lVs8H1rFAk79ru7stSG4eIMh6f2bdSvH.3Lm3A7ZThcUk5ckEo7i', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(182, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's182', '$2y$10$9hFAcEFQTwVZO.aCsb6AnOn3UemPujLFM94JqVlPFr7hHXLCjSZR.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(183, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's183', '$2y$10$aHKVGnWK4M85mIq.npF8LefkeOiC/sDy.RsADnAncSscMp3zRw7GG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(184, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's184', '$2y$10$IHTy3FCTRbVAdEFeKjJcsuCGot.w/WVYgKnwAJWJhw1U3332AzNXG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(185, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's185', '$2y$10$V0JQCMk6X28q2ckFOQP2geMV.Vh6jzNTCIi1pfi.Htk5Qxl8vSY.i', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(186, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's186', '$2y$10$QZnnv92kSe2PrzRInpnhc..ntvEcVZMg.k19R2I92zl8ZpwZQRdUy', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(187, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's187', '$2y$10$HIv6NW1lLIqAR3f4ItRuC.veBF0rbk6j/5eQ3KjxBJbMISRyZI36m', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(188, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's188', '$2y$10$pxwNaiDi3mm1O8qNwfscF.35CG0OwAB9SWykK7DMQh63S1H29w2JC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(189, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's189', '$2y$10$Fhu840cay3g06A7W9KEp3OreEHMkQoBCiWtdt1d35TEkCMax9J4mi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(190, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's190', '$2y$10$fobS4pAQ6X7jI86mVUlwGep5h5VAIDQ46M1SXWBZ5yTSDhWNzYfDC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(191, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's191', '$2y$10$lxT.GnwqGVd2oNUeU/qKxu1N7xHpbiUUVVkLmHQCVUv5hCSlUw..q', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(192, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's192', '$2y$10$7/iAB6oqehYd7pWeKZRFAeBBAe9GQ0cmpDmTy0h4g.ug430Hs5CRS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(193, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's193', '$2y$10$cxrEqYVIXEl4L3Sm4o0sDeHdTyX/EK9X8lsicogL7p05mmvGtvjMC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(194, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's194', '$2y$10$BF6b70DOWmY34tzLDn9mb.F1ETSt86LFDFZl11tASJG4vPQW2P1gm', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(195, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's195', '$2y$10$rDQ0NeFY0HcQ3vwUFL6r9.YXp67.6yqbPcWytTDRRs2g/DKS/SL2C', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(196, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's196', '$2y$10$73P2pDGIpguTjanUS4LlT.Od1P0e3GVorPIo2WrgpuknUq9uZCw.a', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(197, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's197', '$2y$10$7H.OjM1xiqbEwpP3YtpyPO6sf02tmfU1jGUQSgqAJFGJUXGG9L6EG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(198, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's198', '$2y$10$jSnzaok154Q74FBSvDk/aex1RQOb3k4Y1iixKq7ZXi2G4faj2s4Zy', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(199, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's199', '$2y$10$CDh3NcmvuCO9Yc/USz5tCe4a3YPYMyzbrQ9eECI4IBscVAj4/UA/q', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(200, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's200', '$2y$10$fgduJnVVM/OiWOc18MupD.6Om7vanOF6QsKBfHnWErEh8lPhS.wiy', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(201, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's201', '$2y$10$Oznt4S9xHFX7h4I4WGEHyuzqG.i9.6N7.g95nypTVD42TVmHFBHwq', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(202, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's202', '$2y$10$9si1BIO0.B8aBHB8fGOBEeg1dXay4DrxwrqiaPmJg1WfucWFZ4.0K', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(203, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's203', '$2y$10$mN5Kfqz1WkTsPPsFnlkRt.Ua9p3YZ7rtw6jfnphK9RNDR.ulj3rFq', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(204, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's204', '$2y$10$PBZHl.RdqgrpJLqYeitakOHfhEZKDhgSFM6FzH3YDy3qA.qB/dVRS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(205, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's205', '$2y$10$.s/V/k9tfH5jZe5etotc3.BUI2d3fdZr6M6Qy.SZ4zfWio90h83tS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(206, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's206', '$2y$10$5b8TgepMopkE20e04o/oLeML3FmgmGq1eb9B5OcE4Xdh2L4ZFA/H6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(207, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's207', '$2y$10$nRphO525k1Mzif8FycL2VOVd.oYaq5NQrurZV/ewD.mMTGcI6rCvi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(208, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's208', '$2y$10$Jxy9dgMhFFpPZzeO0zD48e9ZT5H.adv8CDAIiVTLcjfiO2/0pTS9G', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(209, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's209', '$2y$10$HQZYjA.KBcoEdYZubP7ZsunwsUMbkI7yc7oR3CknjpnHI392F1TVK', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(210, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's210', '$2y$10$J9//Ehl7ziYP2o8S7HkV1euBVkK0eUwI/eSvP45oocnWzi3D0Wpoq', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(211, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's211', '$2y$10$tqewTog0mUPnlLwA80D3qeqZYniXXkMQQyLE2hXKZeg1ktKNo8XJe', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(212, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's212', '$2y$10$EU9IrAP.EM1QIKz1SS1HA.L3q7Dh.rIIGpxf0yKWOPUzY4hiWMLN.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(213, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's213', '$2y$10$iVWgZPraasEz46x1uJcbQOG.EzYBM2Ae2ErYktK4Be06H3u4zyqJy', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(214, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's214', '$2y$10$j5h2u3DWFDc8wWsBhQXnUOau..iPPeT4sgrOM4TbpiP10f8CN5zq.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(215, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's215', '$2y$10$h73QiabqxdStX4H1ZVf5nO00Xjzh6eXqs0DzsBl7m6q3AXBjLMzJ.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(216, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's216', '$2y$10$VgkEb82ULhj9UO2LoTL0YugG8AK92GIbuWrkTGXi6BaqWcfhTK88a', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(217, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's217', '$2y$10$VDpoTIYqNbBxhZPp0uvc5.XND3FmWgYgJXCLfq/8JhXx8gF7vbt1e', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(218, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's218', '$2y$10$8IUeCyP2nka2KDtuu2Y34uNWBiNexgiu4SgYXnbIEYKe6/qetRNOG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(219, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's219', '$2y$10$mvXUFrHdA/y59idzn2X6ROkMTbf7s1sMZSe652ppN6uZEkESdeuiy', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(220, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's220', '$2y$10$Y38V0Hj7msgDM5iBSXV/TOnjCHnCD5.SaGxSc.Q5.WynV9AIIEbDa', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(221, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's221', '$2y$10$M2dHJyK11sl3vZgw3VBWruE/QrGiEBe4SaITMKl6G7ocZ5yfTMIfW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(222, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's222', '$2y$10$.YqM6UZBCgPcx93RTvXrGunpk/oS2TbKfksDzSQXBYUtcrcTWVIVW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(223, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's223', '$2y$10$eqQvt4NBdZuomrtqDOUli.qsKjbibYDHoye5zz8iNZXkJOEL.yXpi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(224, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's224', '$2y$10$h.7IJiQaAuuX0O5u4bsyDuKAHVeAjh2m7h1hI9YP6owtoHvpO0sw2', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(225, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's225', '$2y$10$PzwPSKcTRE.vdXrw/dVKwenlrsfc8fzptb5306xd0BV1ZnksZrSZG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(226, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's226', '$2y$10$OxzuS5wJn3NdYO7O8JYa8eOSSXlFLJQ7PgqD.eQnOD1cGS3mTsrmS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(227, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's227', '$2y$10$0iU3HmUdiDHU80UdL.roVuJ58MifSyNdeTd9xho2b.t4mSobjxpEa', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(228, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's228', '$2y$10$shD04df53uXrWKMAA1X3KOFSo87jEG5r92z/OCSdGd6L9HRCRp.rS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(229, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's229', '$2y$10$3/Txl1j79NEjpYt5U2bqeuNTmzx0kiElrwnvd0C3Fgh3M5eNG6ppG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(230, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's230', '$2y$10$yqn8r28qumPM3xtbHMMjJOPCVkDqSCkFqDJdlwp4ggTG7J33fOCJq', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(231, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's231', '$2y$10$y2x00oXg5Maf2zF/5uZyz.RwO5VfO4PkUOFTbbEEcayNxkAtXqB4q', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(232, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's232', '$2y$10$0wsM.b5rS6Iptmd.9wjFe.a0TEb1EDcZy788QOzbq7bezzNqwX652', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(233, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's233', '$2y$10$A1LAFKtF/J9Mj9Kczd7LOumOIQo2P9.dsJ5EON09jC3jCOYbp0COa', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(234, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's234', '$2y$10$CeIHRGDnqLGmHcnOebntreiDFWZ3RBlJ52rPWmbQCupWc37CQdamy', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(235, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's235', '$2y$10$q2wpDt2dvyV.ZLvwEUa7D.sk3RpHqgmWZl9VOWOrGPC3fEY40o3Te', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(236, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's236', '$2y$10$jzRLr8banp4kOxJifAVN8eJbPW/a4JKG/ekg0Y7WQcrbrqh0U7zIi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(237, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's237', '$2y$10$Ggia0bGPZMpCZC.8AK7SAOt8l6Gnf3o9Xub4Co/b8frhgE8lZsc7i', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(238, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's238', '$2y$10$qY7U3CoZYBWPd66rEXPSCOkdhLmm6Z.PdliZ2oMl4QTUf4sGT59NG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(239, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's239', '$2y$10$Ydc1EYdknNT7nu2bnMVbL.KkqPW.k8FOHqkZ8fexmgTQpT9to.Qz.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(240, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's240', '$2y$10$CdJcKJOZRVZadI3ZdKXm4u5t3Y3P/1yqnOnMxeEOYchWrA5fmIYjS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(241, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's241', '$2y$10$OD9FdBuzqIkFENLQJYw9r.pg2LkBySBhK6GsNIjUuwSEXR8S5OORi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(242, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's242', '$2y$10$tsA6C6qr8YNTMrB59FZETOGskDZOia1WwcIwRFCEH3uDd6CNEYW5G', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(243, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's243', '$2y$10$MeHTij41o9Ulzk/KoLJ3wOhTodj7123TGWQ7binKpoHMdN10n.UWi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(244, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's244', '$2y$10$AB0cpHsRXoUiVkGseAc7KuZ0EbwN7fbm9PyDS3CZYOwrCCyY3/IyC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(245, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's245', '$2y$10$KeuohHK77Siux.oHN/vr4ezuUVVVg.mJH7f56/LMmszzh5BRdsYX6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(246, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's246', '$2y$10$iiCJaJC1QZA5xQMWXv/kxuPzQX0xxa/vu1xKwb4EmKfdBEs8THDry', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(247, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's247', '$2y$10$DTz/Peo4VKgjn.sViguSAuPNowcFXTyOpkcaFg0sLK3uJ17/n4yTu', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(248, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's248', '$2y$10$1LLeCEgJEcauCAC6khZJcOopwpdfzWgg7YDRYotmh6E3dzxGRDdGa', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(249, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's249', '$2y$10$f6On2/Y/0oOzEMBY8cUmfOJErbr02aNqgIlyrAZY5eJ.GdveWTxUi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `user` (`user_id`, `title`, `surname`, `first_name`, `middle_name`, `admission_number`, `admission_date`, `date_created`, `date_of_birth`, `gender`, `parent_id`, `linked_status`, `parent_fullname`, `user_type`, `staff_type`, `user_role`, `religion`, `blood_group_id`, `nationality_id`, `state_of_origin_id`, `local_gov_of_origin`, `batch_id`, `student_category_id`, `student_type`, `email`, `mobile_number`, `phone_no`, `address`, `health_info`, `status`, `photo`, `signature`, `username`, `password`, `total_fees`, `total_discount`, `amount_paid`, `wallet_balance`, `employee_number`, `employment_date`, `marital_status`, `employee_position`, `department`, `nextofkin_name`, `nextofkin_relationship`, `nextofkin_mobile_number`, `next_of_kin_address`, `bank_name`, `account_number`, `account_name`, `assigned_batch_id`, `cv`, `subject_id`, `qualification`, `salary`, `number_of_wards`, `parent_join_date`, `parent_number`, `relationship`, `emergency`, `pickup`) VALUES
(250, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's250', '$2y$10$lZ2S75TURmylX05d30BGLuqQ5EZorrZz9Qoz1a5Qq3fsBameQvzUW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(251, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's251', '$2y$10$XhIbdJ2KnLjaQqDR4Xeqvubyp1aB4K1dc1dAyhE242QcKgkYbjFtW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(252, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's252', '$2y$10$88ZE0SDg.546tWBfUNqQ0uBedfXFjH8oR79c9CR28PGfZKWr0p2fW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(253, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's253', '$2y$10$znxEP.ueg2wBGYqClouuzOfI3QJ5IesOfuvoBTNwDjWp7NomSequ6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(254, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's254', '$2y$10$OKXs52SIaJYGGj/mM2f53eKdBOnmyVf7zFXb46QhZSLuL2nReSs7.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(255, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's255', '$2y$10$HcMVVg3jx0nVAmq2dYWVrO7lGTh5eHAXjL3VYqE07Azkb394VJMUK', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(256, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's256', '$2y$10$zBlM7w3I.ALaZ5XXQBquEOy8bqDo3GSgHO.br1E8Jak9YAela7L82', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(257, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's257', '$2y$10$y1.bNPGh79KRJdq/kkPmLOwZ3Dwarqa1F1/kiz5X5DjgWDX33twZW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(258, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's258', '$2y$10$2Z8zfO2ZrBoW7ytRJ23rieLE07Y5J4QJo5F6ywhH.mSOUiXRlQiJ6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(259, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's259', '$2y$10$Enpa0H1qpz.h2eJZNTau6e7pC78ZXaOAfoMNjsYCAhA9/7g7X6kJW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(260, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's260', '$2y$10$0iHi8o4TCHDD0hoRiApVoOIU4nyGy1GUZmW8RC815L8QxdMETz8L.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(261, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's261', '$2y$10$8uZSP4G3HJCfkBhtV01qjeRuba3jMkSWQ2fSjROcZ6hzZ0ihozB4W', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(262, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's262', '$2y$10$mwLX2ug2dNDbqgKR8BgjLulu6laTHjHnZPGHNKKXWByYTse1PDS0C', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(263, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's263', '$2y$10$ARHMeCYP2JVqlTXh2MyIruuD0WxNBN2dLuJeQ/uqBrkd2VXCTgd0m', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(264, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's264', '$2y$10$6wboAM8janYiYT695tTYG.fyBVcUWqkua6lijbtSq3cpsWI7OAAsu', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(265, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's265', '$2y$10$Cg.SOWnCVI/P0np.P4zAUeY3fxtFCdsPp4VPY..fY04xQhmKEIg1a', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(266, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's266', '$2y$10$8yOKJApocaJYxWmLz4SUvuwHpGOqSKhl3dh9iHfMPep/3yHA8mpzm', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(267, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's267', '$2y$10$mg8dH.Ry.o1tZApKGhP7Ku42WSgXZ2jU2RthUMtNoQUSWR12UsaGa', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(268, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's268', '$2y$10$cUTeKDdVWQtOltrtXcmv5uGCbdvYzcucexVH8NqUSbkiA/pPIYqea', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(269, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's269', '$2y$10$kGh.kf37mhethYpR5reI4e06.Adh2vAoipXk6X.8MGnOGeoJ6m0cm', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(270, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's270', '$2y$10$XqXpyeNUs2cfjc.2..3HveZAqUqwrrQNmKUIfxqw2ePv0X7LlFs5m', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(271, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's271', '$2y$10$aDQT581YZHtr9Gaj55qiJeCqK0VhA.jGu3WiNWTCBA2ZnErH6CjUW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(272, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's272', '$2y$10$1vxB6ugpK0uU1pl373/gsuDzyH4hU.hIg2hwHbDHA5niXjfAkuVxy', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(273, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's273', '$2y$10$tJ.9Rc.mdat.T09P7MkkZO06HWQQqghtTsfAAAbSResC8vT43ODkK', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(274, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's274', '$2y$10$..wGt6vkE15uJk59Xx3MOevkt33ZpxkKJQIc/vbRu59JZ6RqI6sl6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(275, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's275', '$2y$10$8ZO3Gfu6COzcDzKZIbZPP.uMXxcMgbW8agcPuBaJlr31.YCeoRluK', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(276, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's276', '$2y$10$yS6Rr0/SbUQ.2UFsANJjReorOjQjGhR.Yzlf2cExsGZ9bNtLc4d/W', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(277, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's277', '$2y$10$DA/EYktaOBKyA1PvMQbS/OyZApvcN6VvKGm9OShvZhHrF7mXG2Uca', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(278, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's278', '$2y$10$aUKej7azuBHq2rJ7Vfmyj.BpOQzh/t2Nb5ZP/0AloJ.aL9O9BNJHW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(279, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's279', '$2y$10$fa4Ue1ewWueP2Jxy/S2u3.wtaXwm3sztRsS8M.c0/tfYzP7QhKP7e', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(280, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's280', '$2y$10$uKXHnMNjjfqjLn/LhEjcW.CNoKIdYf5vfSlQ6KZmTP4TyxqbvWhpW', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(281, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's281', '$2y$10$apLvLjy2rSHspfPPJqNJi.AbW.phApWHjkW2Nm7ZFPOUlCc8cKvBi', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(282, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's282', '$2y$10$U8wMVah.to60IXoEWwBwcegye444V2ZMFVFK6LIMvNxYHENd0q3MK', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(283, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's283', '$2y$10$84HvPbW6tN0HbFMxRTGw2OgJK7jS6tfEKCD4zNLU4XSSMBDYYELLu', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(284, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's284', '$2y$10$GexBCTtgjBfzyb4X4fF5OuofR5gWqMY/ZfYubf94V0ZvNOPD98MLC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(285, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's285', '$2y$10$BHNYTgzsmbronN8HBTFf9eRQbwV83ygeUqCLZHNPvOCPof/G2V.du', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(286, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's286', '$2y$10$ESZCPCZLumH23resC2iMruRqLtRG5iyAxjhCNsmNMG.aX09J9HpkO', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(287, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's287', '$2y$10$zZhUgkBrPlJ8aV5qPqVZ4uDfLmXvvWhuy4I7GRavkaLBZcdLBveg.', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(288, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's288', '$2y$10$9urUR4b/HMNnGLvxvXFBAOtJOhVFLXjFnb4Qx0AIUsOyFxk9XdW.G', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(289, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's289', '$2y$10$OVSwUxTuqEGdo4ER.IE/JemRnWmt0vGw/ecMgxxWAx3Xi9tw1zBZu', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(290, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's290', '$2y$10$LmzuWkK3YwoRHwbgJlHMQuTDduQ8UWlDyjPv7wwQfTsokPagjUy/C', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(291, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's291', '$2y$10$aQuAEIUsKIMlGe/ncQjd8eWkIgZjJsPTZqIlO397j2ma6E.5w8eK6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(292, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's292', '$2y$10$aD0J.0cE8GwCzhKywZSSKuQxA9t6nwZ7jmsupzIbzVvg1MVNn7Fi6', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(293, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's293', '$2y$10$rC0bD3Tdx/5dux0iq7hFleyphCbyscGlNxbmj8kAcqgJYEzLlvKJu', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(294, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's294', '$2y$10$y85Hr69vn6mzJthTB.pGN.T7pcE9Aa3U8hTjp6k/s3rTudMyWEhbG', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(295, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's295', '$2y$10$whScpXXI9MwoC6WIc5Kv0OH2P2TTmj1RPZmGgfbyOz6wI7v0LGPL2', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(296, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's296', '$2y$10$nuO9ZGSUsjirUsqNQAn.G.v6iUWhmUhDEzL8BIPNFu2.zYc7LBTea', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(297, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's297', '$2y$10$K3vrPpAe1RYY4W6X1hAltO5JfZk7f5xslQ57qLTXwtuJWflpXjCbm', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(298, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's298', '$2y$10$g1BO4hj7t53ijGuoof1BBuPthgUi8u/MmxaaUV0Ztn.11pQh8OEfe', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(299, NULL, 'Deji', 'Dara', '', '', NULL, '1970-01-01', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '0', '0', '0', '', 2, '0', '', '', '', NULL, '', '', 'Active', '', NULL, 's299', '$2y$10$ijX3XY5naq28ziGeTIniSOfoNVlBbmbDktlVfzUmv2ZQebkIqPbNC', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(300, 'mr', 'Soje', 'Victor', 'Samuel', NULL, NULL, '2023-08-05', NULL, 'Male', NULL, NULL, NULL, 'Guardian', NULL, 'Guardian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lake1universalconcept@gmail.com', '08074752239', '', 'Ogba Nigeria', NULL, 'Active', 'blogpic1.jpg', NULL, 'p300', '$2y$10$3Klc7ND3UDDVywbp1SpUTOtMDfT5TT0B/gwQUApHfymJzCprfjDHC', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Driver', 'YES', 'YES'),
(301, NULL, 'Aderibigbe', 'Esther', '', '7', NULL, '2023-08-10', '1970-01-01', 'Female', NULL, NULL, NULL, 'Student', NULL, 'Student', '', '', '', 'Adamawa', '', 1, '2', '', '', '', NULL, '', '', 'Active', '', NULL, 's301', '$2y$10$Zam6IT1awoBHVh03ULjD5uZJVyS9p77s1lsyKH7YrN2Bn3F203f8i', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(305, NULL, 'Olalekan', 'Olumide', '', '235', NULL, '2023-10-26', '2023-10-26', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', 'Christian', '3', '', 'Adamawa', 'Numan', 2, '2', 'Boarding', 'lake1universalconcept@gmail.com', '08074752239', NULL, 'Ogba Nigeria', '', 'Active', 'blogpic1.jpg', NULL, 's305', '$2y$10$Kr5LYjl03qZVjnfwyldr2.LFVrAzA/fWXTfO76AsvPQXW172S8qZS', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(306, NULL, 'salau', 'olamide', '', '009', NULL, '2023-10-26', '2023-10-26', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', 'Christian', '4', '', 'AkwaIbom', 'Mkpat-Enin', 2, '2', 'Boarding', 'store@lecrosoft.com', '08104986022', NULL, 'Iju garage', '', 'Active', 'abstract-luxury-gold-yellow-gradient-studio-wall-well-use-as-background-layout-banner-product-presentation_1258-63542.jpg', NULL, 's306', '$2y$10$QRIvw4ZAQ7cMKINxuFUDOuX0uOPEftrA2AHdSX8e63mdvu/3s0ji2', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(307, NULL, 'Olalekan', 'Olumide', 'Store', '224', NULL, '2023-10-26', '2023-10-26', 'Male', NULL, NULL, NULL, 'Student', NULL, 'Student', 'Christian', '2', 'Nigeria', 'Adamawa', 'Shelleng', 2, '1', 'Day', 'lake1universalconcept@gmail.com', '08074752239', NULL, 'Ogba Nigeria', '', 'Active', '', NULL, 's307', '$2y$10$UYguv8ZRt.vP.5IJXf/6YOq077L1J8oeiX/Xn0fVStscqtP0EpqA2', 51000, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `user_role` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `user_role`) VALUES
(1, 'Secretary'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transaction`
--

DROP TABLE IF EXISTS `wallet_transaction`;
CREATE TABLE IF NOT EXISTS `wallet_transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount` int NOT NULL,
  `payment_date` date NOT NULL,
  `term_id` int NOT NULL,
  `batch_id` int NOT NULL,
  `session_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
