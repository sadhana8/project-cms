-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 06:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `links` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `title`, `subtitle`, `description`, `links`) VALUES
(2, 'kjcxjn', 'kjnc', '', ''),
(3, 'n b', 'n', 'jn', 'jm');

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`id`, `teacher_id`, `subject_id`) VALUES
(1, 7, 1),
(4, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('absent','present','','') NOT NULL,
  `course` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date`, `status`, `course`, `semester`, `subject`) VALUES
(1, 2, '2024-06-14', 'present', 0, 0, 0),
(2, 2, '2024-06-14', 'present', 0, 0, 0),
(3, 2, '2024-06-14', 'present', 0, 0, 0),
(4, 2, '2024-06-15', 'present', 0, 0, 0),
(5, 2, '2024-06-21', 'present', 0, 0, 0),
(6, 2, '2024-06-22', 'absent', 0, 0, 0),
(7, 17, '2024-06-23', 'absent', 0, 0, 0),
(8, 13, '2024-06-23', 'present', 0, 0, 0),
(9, 19, '2024-06-23', 'present', 0, 0, 0),
(10, 19, '2024-06-23', 'absent', 0, 0, 0),
(11, 18, '2024-06-23', 'present', 0, 0, 0),
(12, 19, '2024-06-23', 'absent', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dept_category`
--

CREATE TABLE `dept_category` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `department` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept_category`
--

INSERT INTO `dept_category` (`id`, `name`, `description`, `department`, `image`, `subject_id`, `faculty_id`) VALUES
(6, 'BCA', 'This is an IT course hjmhg hhgjh hhvhghy hghghgh', 'IT', 'bca.jpg', 1, 1),
(7, '', '', '', '', 1, 1),
(8, 'bca', '', '', '', 1, 8),
(9, 'bca', '', '', '', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `dept_list`
--

CREATE TABLE `dept_list` (
  `id` int(11) NOT NULL,
  `dept_cate_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept_list`
--

INSERT INTO `dept_list` (`id`, `dept_cate_id`, `name`, `description`, `section`) VALUES
(2, 6, 'english', ' hh', 'jkj'),
(4, 6, 'java', 'This is an IT course', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `date`, `title`, `description`, `image`) VALUES
(8, 'apr 8 2024', 'sport', 'bvhjh jnhbjhb', 'Screenshot 2024-01-26 161757.png'),
(9, '2023-12-22', 'Workshop On UI/UX', 'This type of workshop is more essential for student they enroll  in extra knowlegde ', 'Screenshot 2024-01-26 161720.png');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `description`, `designation`, `image`, `email`) VALUES
(7, 'Soniya Mishra', 'hvbjgfjfbbbbbbbbbbbbbbbbbb n bbbbbbbb bbbbbbbbb bbbbbbbbbbbbbbb bbbbbbbbbbbbb cygfdhfkhdksu hgfuytfdhbfj  hiuayf uymtdfnbdfgud yfdhfb dnfmd.kfldkjgfhfbdvfdhtfjBDKHSJfshgdfhsdfd', 'PHP Teacher', 'a.jpg', ''),
(8, 'nikhil thapa', 'ncbjdh hbmhdhdh djshbdsdfnb hygdh', 'DBMS Teacher', 'Screenshot 2024-01-26 161737.png', ''),
(9, 'Sadhana Sudha', 'bhdjsbhdjsa', 'djsbdhsjds', 'Screenshot 2024-01-26 202702.png', ''),
(10, 'sadhana', 'sdjjjjjjjjjjs bjdbjsdbsj sjhdss', 'd snbdjg', 'Screenshot 2024-01-26 202640.png', ''),
(11, 'hari mishra', 'NHHHHHHHJBJH', 'professor', 'Screenshot 2024-01-26 161720.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `fees_transaction`
--

CREATE TABLE `fees_transaction` (
  `id` int(11) NOT NULL,
  `stdid` varchar(255) NOT NULL,
  `paid` int(11) NOT NULL,
  `submitdate` datetime NOT NULL,
  `transaction_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_transaction`
--

INSERT INTO `fees_transaction` (`id`, `stdid`, `paid`, `submitdate`, `transaction_remark`) VALUES
(1, '6', 2000, '2024-06-22 16:40:47', 'tuition fee');

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `guardian_id` int(11) NOT NULL,
  `guardian_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`guardian_id`, `guardian_name`, `email`, `phone`, `address`, `student_id`) VALUES
(1, 'shayam kishor', 'shyam@gmail.com', '9856321470', 'janakpur', 18),
(11, 'shyam kishor', 'cylons@gmail.com', '9817839120', 'Janakpur', 18);

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `name`, `start_time`, `end_time`, `created_at`) VALUES
(1, 'first periods', '06:30:00', '07:15:00', '2024-06-17 13:40:30'),
(2, 'first periods', '06:30:00', '07:15:00', '2024-06-17 13:40:59'),
(3, 'second', '07:15:00', '08:30:00', '2024-06-17 14:09:28'),
(4, 'third', '23:09:00', '23:09:00', '2024-06-17 15:24:16'),
(5, 'third', '10:01:00', '09:01:00', '2024-06-18 14:15:45'),
(6, 'third', '14:46:00', '12:48:00', '2024-06-22 07:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `address`, `name`, `username`, `email`, `password`, `usertype`, `dob`, `gender`, `phone`, `code`) VALUES
(7, '', '', 'nikhil', 'nikhil@gmail.com', 'nikhil', 'teacher', '', '', 0, ''),
(13, 'janakpur', '', 'sudha', 'sadhana@cms.com', '23456', 'student', '2024-04-04', 'female', 2147483647, ''),
(26, 'Janakpur', '', 'sadhana3', 'sadhana@gmail.com', 'sadhana3', ' Teacher', '2022-07-13', 'Female', 2147483647, ''),
(27, 'Janakpur', '', 'sadhana', 'sadhanasudhag@gmail.com', '123456789', 'parent', '2003-04-16', 'Female', 2147483647, ''),
(28, 'Janakpur', '', 'sadhana', 'sadhanasudhag@gmail.com', '123456789', ' Teacher', '2003-04-16', 'Female', 2147483647, ''),
(29, 'jnk', '', 'sadhana3', 'sadhana@gmail.com', '$2y$10$33fAXykj5iihFQpTss8iD.nsxjiUFYIRQ2uqIvjSJiT', 'Student', '2001-02-03', 'Female', 2147483647, ''),
(30, 'Janakpur', '', 'shyam kishor', 'shyam@gmail.com', '$2y$10$UwOSNdrqb3yo.0lZUYNBQOnmG5If8m1vUnZ9jt.CGnD', 'Parent', '1994-01-01', 'Male', 0, ''),
(31, 'bhaktpur', '', 'sita', 'sita@gmail.com', '$2y$10$EJcOuOaOTQRG7rOkqgRgMuP/9f3pdNaehqKBAtiEFOS', 'Student', '2001-01-12', 'Female', 987456321, ''),
(32, 'kathmandu', 'admin', 'admin', 'cylons@gmail.com', 'admin@123', 'admin', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `student_id`, `teacher_id`, `subject`, `grade`, `comment`, `created_at`) VALUES
(5, 13, 7, 'bba', '3.56', 'hello dear your result u\\is m,m', '2024-06-15 14:35:11'),
(6, 13, 7, 'bba', '3.56', 'hello dear your result u\\is m,m', '2024-06-15 14:35:11'),
(7, 13, 7, 'bba', '3.56', 'hello dear your result u\\is m,m', '2024-06-15 14:35:11'),
(8, 11, 7, 'bca', '3.58', 'gc', '2024-06-15 16:37:24'),
(15, 12, 7, 'bbm', '3.14', 'hggyyt', '2024-06-15 16:46:08'),
(16, 12, 7, 'bbm', '3.14', 'hggyyt', '2024-06-15 16:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(255) NOT NULL,
  `dept_cate_id` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`semester_id`, `semester_name`, `dept_cate_id`, `delete_status`) VALUES
(1, 'bca 6th sem', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `shift` enum('Morning','Day','','') NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `faculty` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `shift`, `course`, `semester`, `start_time`, `end_time`, `faculty`) VALUES
(6, 'Morning', '6', 1, '08:24:00', '09:24:00', '10');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `email`, `phone`, `address`, `footer`) VALUES
(1, 'CYLONS.TECHNICAL UNIVERSITY', 'cylons@gmail.com', 2147483647, '32-Koteshwor, Kathmandu,Nepal', 'Copyright ©2024 All rights reserved | Welcome to <a href=\"http://localhost/cms/frontend/index.php\">Cylons Technical University </a> <i class=\"icon-heart\" aria-hidden=\"true\"></i> Nepal');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `doj` datetime NOT NULL,
  `fees` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `address`, `email`, `phone`, `dob`, `image`, `course_id`, `doj`, `fees`, `balance`, `delete_status`) VALUES
(18, 'Sadhana Sudha', 'kathmandu', 'sadhana@gmail.com', 0, '2003-01-03', 'student.png', 6, '2024-06-03 00:00:00', 500000, 10000, 0),
(19, 'sudha', 'janakpur', 'sadhana@cms.com', 23456, '0003-01-03', 'student.png', 0, '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_parent`
--

CREATE TABLE `student_parent` (
  `student_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `ssname` varchar(50) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `subcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `ssname`, `semester_id`, `subcode`) VALUES
(1, 'scripting', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `day_of_week` enum('Sunday','Monday','Tuesday','Wednesday','Thrusday','Friday','Saturday') NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `Teacher_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `period_id`, `day_of_week`, `course_name`, `subject_name`, `Teacher_name`, `created_at`) VALUES
(29, 4, 'Monday', 'BCA', 'english', 'hari mishra', '2024-06-22 07:12:48'),
(32, 3, 'Tuesday', 'BCA', 'java', 'Sadhana Sudha', '2024-06-22 07:15:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_subject_allocation` (`teacher_id`),
  ADD KEY `teacher_subject` (`subject_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendence` (`student_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_category`
--
ALTER TABLE `dept_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_list`
--
ALTER TABLE `dept_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_list_ibfk_1` (`dept_cate_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_transaction`
--
ALTER TABLE `fees_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`guardian_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`) USING BTREE,
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`semester_id`),
  ADD KEY `dept_cate_id` (`dept_cate_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `sessiontest` (`semester`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_parent`
--
ALTER TABLE `student_parent`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `parent` (`parent_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timetable` (`period_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dept_category`
--
ALTER TABLE `dept_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dept_list`
--
ALTER TABLE `dept_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fees_transaction`
--
ALTER TABLE `fees_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `guardian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocation`
--
ALTER TABLE `allocation`
  ADD CONSTRAINT `teacher_subject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `dept_list`
--
ALTER TABLE `dept_list`
  ADD CONSTRAINT `dept_list_ibfk_1` FOREIGN KEY (`dept_cate_id`) REFERENCES `dept_category` (`id`);

--
-- Constraints for table `guardians`
--
ALTER TABLE `guardians`
  ADD CONSTRAINT `guardians_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `semesters`
--
ALTER TABLE `semesters`
  ADD CONSTRAINT `semesters_ibfk_1` FOREIGN KEY (`dept_cate_id`) REFERENCES `dept_category` (`id`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `sessiontest` FOREIGN KEY (`semester`) REFERENCES `semesters` (`semester_id`);

--
-- Constraints for table `student_parent`
--
ALTER TABLE `student_parent`
  ADD CONSTRAINT `parent` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
