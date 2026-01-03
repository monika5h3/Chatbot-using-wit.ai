-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 10:09 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbot_forteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES
(1, 'cse'),
(2, 'ece'),
(3, 'civil'),
(4, 'mechanical'),
(5, 'eee'),
(6, 'college');

-- --------------------------------------------------------

--
-- Table structure for table `branch_sem`
--

CREATE TABLE `branch_sem` (
  `branch_sem_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_sem`
--

INSERT INTO `branch_sem` (`branch_sem_id`, `branch_id`, `sem_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 2, 1),
(10, 2, 2),
(11, 2, 3),
(12, 2, 4),
(13, 2, 5),
(14, 2, 6),
(15, 2, 7),
(16, 2, 8),
(17, 3, 1),
(18, 3, 2),
(19, 3, 3),
(20, 3, 4),
(21, 3, 5),
(22, 3, 6),
(23, 3, 7),
(24, 3, 8),
(25, 4, 1),
(26, 4, 2),
(27, 4, 3),
(28, 4, 4),
(29, 4, 5),
(30, 4, 6),
(31, 4, 7),
(32, 4, 8),
(33, 5, 1),
(34, 5, 2),
(35, 5, 3),
(36, 5, 4),
(37, 5, 5),
(38, 5, 6),
(39, 5, 7),
(40, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `exam_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_type`) VALUES
(1, 'mids'),
(2, 'exam'),
(5, 'supplementary exams');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `faculty_details` longtext NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `branch_id`, `sem_id`, `subject_id`, `faculty_details`, `status`) VALUES
(1, 5, 1, 5, 'Faculty Name: Yalla Ravi Teja', '1'),
(2, 1, 1, 10, 'M Prasanthi\r\n\r\n	M.A (Ph.D.)	Assistant Professor', '1'),
(3, 1, 1, 11, 'M.G.Vara Prasad\r\n\r\n	M. Tech, (Ph.D)	Assistant Professor', '1'),
(4, 1, 1, 12, 'P.Paripurna Chari\r\n\r\n	M. Phil	Associate Professor', '1'),
(5, 1, 1, 13, 'Dr.K.S.D.L. Kalyan Prasad\r\n\r\nPh.D	Associate Professor', '1'),
(6, 1, 1, 14, 'Mr G. Srinivasa rao\r\n\r\nM. Tech	Assistant Professor', '1'),
(7, 1, 1, 15, 'V. Aishwarya sree\r\n\r\n	M. A	Assistant Professor', '1'),
(8, 1, 1, 16, 'M Prasanthi\r\n\r\nM.A (Ph.D.)	Assistant Professor', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `fee_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `year` enum('1','2','3','4') NOT NULL,
  `fee_details` longtext NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`fee_id`, `branch_id`, `year`, `fee_details`, `status`) VALUES
(1, 3, '1', '1000', '1'),
(2, 3, '2', 'test civil fee details', '0'),
(3, 1, '1', '35000', '1'),
(4, 2, '1', '35000\r\n', '1'),
(5, 3, '1', '35000', '1'),
(6, 4, '1', '35000\r\n', '1'),
(7, 5, '1', '35000', '1'),
(8, 1, '3', '35000', '1'),
(9, 2, '2', '35000', '1'),
(10, 3, '2', '35000', '1'),
(11, 4, '2', '35000', '1'),
(12, 5, '2', '35000', '1'),
(13, 5, '2', '35000\r\n', '1'),
(14, 1, '3', '35000', '1'),
(15, 2, '3', '35000', '1'),
(16, 3, '3', '35000', '1'),
(17, 4, '3', '35000', '1'),
(18, 5, '3', '35000', '1'),
(19, 1, '4', '35000', '1'),
(20, 2, '4', '35000', '1'),
(21, 3, '4', '35000', '1'),
(22, 4, '4', '35000', '1'),
(23, 5, '4', '35000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `info_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `sem_id` int(11) DEFAULT NULL,
  `info_details` longtext NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`info_id`, `branch_id`, `sem_id`, `info_details`, `status`) VALUES
(1, 3, NULL, 'test 1', '0'),
(2, 3, 1, 'civil 1-1', '0'),
(3, 3, 2, 'civil 1-2', '0'),
(4, 1, 0, 'CSE Info', '0'),
(5, 1, 2, 'CSE 1-1 Info', '0'),
(6, 1, 0, 'ABOUT THE DEPARTMENT\r\n\r\nThe Department of Computer Science & Engineering was formed in the year 2008. The department has started B.Tech programme with an initial intake of 60 in the year 2008 and 120 from 2010 onwards. The department has qualified teaching staff with 5 PhDs and 25 M.Techs. The faculty members are involved in research activities and published/presented papers in national and international journals and conferences.\r\n\r\nThe department has progressed with a vision and a strong commitment to developing competent programmers with uncompromising standard of excellence in the training, both class room sessions and hands on sessions, given to students.\r\n\r\nThe department has well equipped computing laboratories and a rich repository of software covering a wide spectrum of applications.\r\n\r\nThe prospects for this course are limitless what with computers becoming a part of everyday life. Numerous MNCs and Indian companies are always on the lookout for skilled CS engineers and one can choose from a range of options.\r\n\r\nA number of opportunities in the government sector are also opening up, especially in the field of e-governance and Government to citizen services. Students can also pursue higher education in specialized courses like Software Engineering, Artificial Intelligence, and Networking etc.\r\n\r\nVISION\r\n\r\nTo become Centre of excellence for technically competent, innovative computer engineers.', '1'),
(7, 1, 1, 'Computer Science and Engineering ( CSE ) -Intake	120', '1');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `location_details` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `branch_id`, `location_details`) VALUES
(1, 6, 'https://goo.gl/maps/XWRLA3wPx61JW7DG8'),
(2, 2, 'https://goo.gl/maps/zcd96g2Jfyc1Lrim7'),
(3, 1, 'https://goo.gl/maps/ACPxxVxFDzGEUELi7'),
(4, 5, 'https://goo.gl/maps/zcd96g2Jfyc1Lrim7'),
(5, 3, 'https://goo.gl/maps/s7i6cujFNWnsqSJQ9'),
(6, 4, 'https://goo.gl/maps/s7i6cujFNWnsqSJQ9');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `security_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `create_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`security_id`, `user_name`, `image_url`, `password`, `status`, `create_date_time`) VALUES
(1, 'admin', 'assets/images/profiles/1.png', '12345', '1', '2022-04-30 21:25:00'),
(2, 'Rohit', 'assets/images/profiles/2.png', '12345', '1', '2022-04-30 22:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `sem_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem_name`) VALUES
(1, '1-1'),
(2, '1-2'),
(3, '2-1'),
(4, '2-2'),
(5, '3-1'),
(6, '3-2'),
(7, '4-1'),
(8, '4-2');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject`, `status`) VALUES
(1, 'Subject 1', '0'),
(2, 'subject2', '0'),
(3, 'subject 3', '0'),
(4, 'subject 4', '0'),
(5, 'Subject1', '0'),
(6, 'java', '0'),
(7, 'c', '0'),
(8, 'ENGLISH-1', '0'),
(9, 'Mathematics-1', '0'),
(10, 'English-1', '1'),
(11, 'Mathematics-1', '1'),
(12, 'Mathematics-2', '1'),
(13, 'Applied Physics', '1'),
(14, 'Computer Programming', '1'),
(15, 'Engineering Drawing', '1'),
(16, 'English -Communication Skills Labs-1', '1'),
(17, 'Applied/Engineering Physics Lab', '1'),
(18, 'Applied/Engineering Physics -Virtual Labs-Assignments', '1'),
(19, 'Computer Programming Lab', '1'),
(20, 'English-2', '1'),
(21, 'Mathematics-3', '1'),
(22, 'Applied Chemistry', '1'),
(23, 'Object Oriented Programming through C++', '1'),
(24, 'Environmental Studies', '1'),
(25, 'Engineering Mechanics', '1'),
(26, 'Applied/Engineering Chemistry Laboratory', '1'),
(27, 'English -Communication Skills Labs-2', '1'),
(28, 'Object Oriented Programming Lab', '1'),
(29, 'Statistics with R Programming', '1'),
(30, 'Mathematical Foundation of Computer Science', '1'),
(31, 'Digital Logic Design', '1'),
(32, 'Python Programming', '1'),
(33, 'Data Structures through C++', '1'),
(34, 'Computer Graphics', '1'),
(35, 'Data Structures through C++ Lab', '1'),
(36, 'Python Programming Lab', '1'),
(37, 'Software Engineering', '1'),
(38, 'Java Programming', '1'),
(39, 'Advanced Data Structures', '1'),
(40, 'Computer Organization', '1'),
(41, 'Formal Languages and Automata Theory', '1'),
(42, 'Principles of Programming Languages', '1'),
(43, 'Advanced Data Structures Lab', '1'),
(44, 'Java Programming Lab', '1'),
(45, 'Complier Design', '1'),
(46, 'Unix Programming', '1'),
(47, 'Object Oriented Analysis and Design using UML', '1'),
(48, 'Database Management Systems', '1'),
(49, 'Operating Systems', '1'),
(50, 'Unified Modeling Lab', '1'),
(51, 'Operating Systems & Linux Programming Lab', '1'),
(52, 'Database Management Systems Lab', '1'),
(53, 'Professional Ethics & Human Values', '1'),
(54, 'Computer Networks', '1'),
(55, 'Data Warehousing and Mining', '1'),
(56, 'Design and Analysis of Algorithms', '1'),
(57, 'Software Testing Methodologies', '1'),
(58, 'Open Elective:', '0'),
(59, 'Network Programming Lab                                                                    ', '1'),
(60, 'Software Testing Lab', '1'),
(61, 'Data Warehousing and Mining Lab', '1'),
(62, 'IPR & Patents', '1'),
(63, 'Cryptography and Network Security', '1'),
(64, 'Software Architecture & Design Patterns', '1'),
(65, 'Web Technologies', '1'),
(66, 'Managerial Economics and Financial Analysis', '1'),
(67, 'Mobile Computing', '1'),
(68, 'Software Project Management', '1'),
(69, 'Software Architecture & Design Patterns Lab', '1'),
(70, 'Web Technologies Lab', '1'),
(71, 'Distributed Systems', '1'),
(72, 'Management Science', '1'),
(73, 'Machine Learning', '1'),
(74, 'Concurrent and Parallel Programming', '1'),
(75, 'Seminar', '1'),
(76, 'Project', '1'),
(77, 'Basic Electrical and Electronics Engineering ', '1'),
(78, 'Engg.Workshop & IT Workshop', '1'),
(79, 'Metallurgy & Materials Science ', '1'),
(80, 'Mechanics of Solids', '1'),
(81, 'Thermodynamics', '1'),
(82, 'Fluids Mechanics & Hydraulic Machines', '1'),
(83, 'Computer Aided Engineering Drawing Practice', '1'),
(84, 'Electrical & Electronics Engg.Lab', '1'),
(85, 'Mechanics of Solids & Metallurgy Lab', '1'),
(86, 'Kinematics of Machinery', '1'),
(87, 'Thermal Engineering-1', '1'),
(88, 'Production Technology', '1'),
(89, 'Design of Machine Members-1', '1'),
(90, 'Machine Drawing', '1'),
(91, 'Industrial Engineering and Management', '1'),
(92, 'Fluids Mechanics & Hydraulic Machines', '0'),
(93, 'Fluids Mechanics & Hydraulic Machines Lab', '1'),
(94, 'Production Technology Lab', '1'),
(95, 'Dynamics of Machinery', '1'),
(96, 'Metal Cutting & Machine Tools', '1'),
(97, 'Design of Machine Members-2', '1'),
(98, 'Design of Machine Members-2', '0'),
(99, 'Operations Research', '1'),
(100, 'Thermal Engineering-2', '1'),
(101, 'Thermal of Machines Lab', '1'),
(102, 'Machine Tools Lab', '1'),
(103, 'Thermal Engineering Lab', '1');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `tt_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `tt_details` longtext NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`tt_id`, `branch_id`, `sem_id`, `exam_id`, `tt_details`, `status`) VALUES
(1, 1, 1, 2, 'CSE SUPPLY EXAMS DATE:', '1'),
(2, 1, 2, 2, 'SCE 1-2 Exam Time Table', '1'),
(3, 1, 2, 2, 'SCE 1-2 Exam Time Table', '1'),
(4, 1, 3, 1, 'Mid', '0'),
(5, 1, 3, 1, 'Mid', '0'),
(6, 1, 2, 1, 'dgde', '0'),
(7, 4, 1, 2, 'Mech 1-1 Semester Time table\r\n', '1'),
(8, 1, 1, 2, 'https://www.forum.universityupdates.in/attachments/1-1-bt-r16-oct-nov-2018-pdf.4567/', '1'),
(9, 1, 2, 2, 'https://www.injntu.com/download/aHR0cHM6Ly93d3cuaW5qbnR1LmNvbS9kb3dubG9hZHMvMjAxOS9NYXJjaC8yMC0wMy0yMDE5LzEyX1IxNl9UVF8yMDE5LnBkZg==', '1'),
(10, 1, 3, 2, 'https://www.forum.universityupdates.in/attachments/jntuk-bt-2-1-r16-tt-oct-2019-pdf.8586/', '1'),
(11, 1, 4, 2, 'https://www.injntu.com/download/aHR0cHM6Ly93d3cuaW5qbnR1LmNvbS9kb3dubG9hZHMvMjAyMC9PY3RvYmVyLzI5LTEwLTIwMjAvam50dWsyMl9yMTZfcmVnX0FNX25vdl8yMDIwLnBkZg==', '1'),
(12, 1, 5, 2, 'https://files.recruitmentindia.in/download/jntuk-3-1-sem-r16-time-table-2022/', '1'),
(13, 1, 6, 2, 'https://flyfresher.com/jntuk-3-2-time-table/', '1'),
(14, 1, 7, 2, 'https://files.jobschat.in/download/jntuk-b-tech-4-1-r16-regular-jan-feb-2022-time-table/', '1'),
(15, 2, 1, 2, 'https://www.forum.universityupdates.in/attachments/1-1-bt-r16-oct-nov-2018-pdf.4567', '1'),
(16, 2, 2, 2, 'https://www.injntu.com/download/aHR0cHM6Ly93d3cuaW5qbnR1LmNvbS9kb3dubG9hZHMvMjAxOS9NYXJjaC8yMC0wMy0yMDE5LzEyX1IxNl9UVF8yMDE5LnBkZg==', '1'),
(17, 2, 3, 2, 'https://www.forum.universityupdates.in/attachments/jntuk-bt-2-1-r16-tt-oct-2019-pdf.8586/\r\n', '1'),
(18, 2, 4, 2, 'https://www.injntu.com/download/aHR0cHM6Ly93d3cuaW5qbnR1LmNvbS9kb3dubG9hZHMvMjAyMC9PY3RvYmVyLzI5LTEwLTIwMjAvam50dWsyMl9yMTZfcmVnX0FNX25vdl8yMDIwLnBkZg==', '1'),
(19, 2, 5, 2, 'https://files.recruitmentindia.in/download/jntuk-3-1-sem-r16-time-table-2022/\r\n', '1'),
(20, 2, 6, 2, 'https://flyfresher.com/jntuk-3-2-time-table/\r\n', '1'),
(21, 2, 7, 2, 'https://files.jobschat.in/download/jntuk-b-tech-4-1-r16-regular-jan-feb-2022-time-table/', '1'),
(22, 3, 1, 2, 'https://www.forum.universityupdates.in/attachments/1-1-bt-r16-oct-nov-2018-pdf.4567/', '1'),
(23, 3, 2, 2, 'https://www.injntu.com/download/aHR0cHM6Ly93d3cuaW5qbnR1LmNvbS9kb3dubG9hZHMvMjAxOS9NYXJjaC8yMC0wMy0yMDE5LzEyX1IxNl9UVF8yMDE5LnBkZg==', '1'),
(24, 3, 3, 2, 'https://www.forum.universityupdates.in/attachments/jntuk-bt-2-1-r16-tt-oct-2019-pdf.8586/\r\n', '1'),
(25, 3, 4, 2, 'ttps://www.injntu.com/download/aHR0cHM6Ly93d3cuaW5qbnR1LmNvbS9kb3dubG9hZHMvMjAyMC9PY3RvYmVyLzI5LTEwLTIwMjAvam50dWsyMl9yMTZfcmVnX0FNX25vdl8yMDIwLnBkZg=', '1'),
(26, 3, 5, 2, 'https://files.recruitmentindia.in/download/jntuk-3-1-sem-r16-time-table-2022/', '1'),
(27, 3, 6, 2, 'https://flyfresher.com/jntuk-3-2-time-table/', '1'),
(28, 3, 7, 2, 'https://files.jobschat.in/download/jntuk-b-tech-4-1-r16-regular-jan-feb-2022-time-table/', '1'),
(29, 4, 1, 2, 'https://www.forum.universityupdates.in/attachments/1-1-bt-r16-oct-nov-2018-pdf.4567/', '1'),
(30, 4, 2, 2, 'https://www.injntu.com/download/aHR0cHM6Ly93d3cuaW5qbnR1LmNvbS9kb3dubG9hZHMvMjAxOS9NYXJjaC8yMC0wMy0yMDE5LzEyX1IxNl9UVF8yMDE5LnBkZg==', '1'),
(31, 4, 3, 2, 'https://www.forum.universityupdates.in/attachments/jntuk-bt-2-1-r16-tt-oct-2019-pdf.8586/', '1'),
(32, 4, 4, 2, 'https://www.injntu.com/download/aHR0cHM6Ly93d3cuaW5qbnR1LmNvbS9kb3dubG9hZHMvMjAyMC9PY3RvYmVyLzI5LTEwLTIwMjAvam50dWsyMl9yMTZfcmVnX0FNX25vdl8yMDIwLnBkZg=', '1'),
(33, 4, 5, 2, 'https://files.recruitmentindia.in/download/jntuk-3-1-sem-r16-time-table-2022/', '1'),
(34, 4, 6, 2, 'https://flyfresher.com/jntuk-3-2-time-table/', '1'),
(35, 4, 7, 2, 'https://files.jobschat.in/download/jntuk-b-tech-4-1-r16-regular-jan-feb-2022-time-table/', '1'),
(36, 5, 1, 2, 'https://www.forum.universityupdates.in/attachments/1-1-bt-r16-oct-nov-2018-pdf.4567/', '1'),
(37, 5, 2, 2, 'https://www.injntu.com/download/aHR0cHM6Ly93d3cuaW5qbnR1LmNvbS9kb3dubG9hZHMvMjAxOS9NYXJjaC8yMC0wMy0yMDE5LzEyX1IxNl9UVF8yMDE5LnBkZg==', '1'),
(38, 5, 3, 2, 'https://www.forum.universityupdates.in/attachments/jntuk-bt-2-1-r16-tt-oct-2019-pdf.8586/\r\n', '1'),
(39, 5, 4, 2, 'https://www.injntu.com/download/aHR0cHM6Ly93d3cuaW5qbnR1LmNvbS9kb3dubG9hZHMvMjAyMC9PY3RvYmVyLzI5LTEwLTIwMjAvam50dWsyMl9yMTZfcmVnX0FNX25vdl8yMDIwLnBkZg=', '1'),
(40, 5, 5, 2, 'https://files.recruitmentindia.in/download/jntuk-3-1-sem-r16-time-table-2022/', '1'),
(41, 5, 6, 2, '\r\nhttps://flyfresher.com/jntuk-3-2-time-table/', '1'),
(42, 5, 7, 2, 'https://files.jobschat.in/download/jntuk-b-tech-4-1-r16-regular-jan-feb-2022-time-table/\r\n', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `branch_sem`
--
ALTER TABLE `branch_sem`
  ADD PRIMARY KEY (`branch_sem_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`security_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`tt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `branch_sem`
--
ALTER TABLE `branch_sem`
  MODIFY `branch_sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `security_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
