-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 03:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collageproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `Name`, `Email`, `phone`, `message`) VALUES
(1, 'Bhumi Rai', 'bhumi02rai@gmail.com', '6265860207', 'Placement'),
(2, 'Deevi Kadam', 'deevikadam@gmail.com', '9669607976', 'Placement cell'),
(3, 'Arpita Jatav', 'arpita@gmail.com', '00912091297', 'Web Technology'),
(4, 'Bhavna Sahu', 'bhavnasahu@gmail.com', '8815529952', 'Student development cell');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date`, `status`) VALUES
(1, 827211060, '2023-11-15', 'Present'),
(2, 827211060, '2023-11-15', 'Absent'),
(3, 827211060, '0000-00-00', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `student_id` int(11) NOT NULL,
  `subject_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`student_id`, `subject_name`) VALUES
(1, 'database_management_system_lab'),
(2, 'database_management_system_theory'),
(3, 'Internet_and_webtechnology'),
(4, 'Theory_of_computation_lab'),
(5, 'Theory_of_computation_theory'),
(6, 'Cyber_Security_theory'),
(7, 'Cyber_Security_lab'),
(8, 'linux_lab'),
(9, 'Python_lab');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `fee_amount` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `student_name`, `fee_amount`, `date`) VALUES
(827211001, 'Aditya Pawar', 38900.00, '2023-08-18'),
(827211007, 'Aditi Rawat', 38900.00, '2023-08-18'),
(827211009, 'Aditya Shankar', 38900.00, '2023-10-26'),
(827211010, 'Aditya Mandloi', 38900.00, '2023-09-04'),
(827211011, 'Aditya Vinchi', 38900.00, '2023-09-06'),
(827211014, 'Akshat Bundela', 38900.00, '2023-08-18'),
(827211034, 'Apoorv Jain', 38900.00, '2023-08-24'),
(827211040, 'Arpita Jatav', 38900.00, '2023-08-18'),
(827211052, 'Atish Agrawal', 38900.00, '2023-09-01'),
(827211057, 'Bhavil Goyal', 38900.00, '2023-09-07'),
(827211058, 'Bhavna Sahu', 38900.00, '2023-08-18'),
(827211060, 'Bhumi Rai', 38900.00, '2023-08-18'),
(827211066, 'Depanshu Modi', 38900.00, '2023-08-16'),
(827211067, 'Deevi Kadam', 38900.00, '2023-08-18'),
(827211107, 'Ishika Garg', 38900.00, '2023-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject1_practical` int(11) DEFAULT NULL,
  `subject1_theory` int(11) DEFAULT NULL,
  `subject2_practical` int(11) DEFAULT NULL,
  `subject2_theory` int(11) DEFAULT NULL,
  `subject3_practical` int(11) DEFAULT NULL,
  `subject3_theory` int(11) DEFAULT NULL,
  `subject4_practical` int(11) DEFAULT NULL,
  `subject4_theory` int(11) DEFAULT NULL,
  `subject5_practical` int(11) DEFAULT NULL,
  `subject6_practical` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `subject1_practical`, `subject1_theory`, `subject2_practical`, `subject2_theory`, `subject3_practical`, `subject3_theory`, `subject4_practical`, `subject4_theory`, `subject5_practical`, `subject6_practical`) VALUES
(827211060, 827211060, 18, 65, 18, 69, 19, 65, 18, 69, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fathers_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `caste` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `username`, `phone`, `course`, `email`, `fathers_name`, `address`, `semester`, `branch`, `year`, `gender`, `caste`) VALUES
(827211040, 'Arpita Jatav', '9665247976', 'Engineering', 'arpita@gmail.com', 'jatav', 'Bhopal', '5', 'CSE', 3, 'Female', 'General'),
(827211060, 'Bhumi Rai', '6265860207', 'Engineering', 'bhumi@acropolis.in', 'Rai', 'Indore', '5th', 'CSE', 3, 'Female', 'General');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL,
  `name` varchar(38) DEFAULT NULL,
  `description` varchar(38) DEFAULT NULL,
  `image` varchar(38) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `description`, `image`) VALUES
(1, 'Ritika', 'Marketing', 'image/graphic.jpg'),
(2, 'Bhumi Rai', 'Graphic Designer', 'image/marketing.png'),
(3, 'yamin', 'Web developer', 'image/graphic.jpg'),
(4, 'Priyanka ', 'Front-end developer', 'image/web.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `usertype`, `email`, `course`, `password`) VALUES
(827211000, 'admin', 'admin', 'admin@gmail.com', 'CSE', '1234'),
(827211060, 'Bhumi Rai', 'student', 'bhumi02rai@gmail.com', 'CSE', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=827211061;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=827211061;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
