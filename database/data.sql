-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 12:45 PM
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
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `store_feedback`
--

CREATE TABLE `store_feedback` (
  `studentId` int(11) NOT NULL,
  `1` varchar(50) NOT NULL DEFAULT 'NAN',
  `2` varchar(50) NOT NULL DEFAULT 'NAN',
  `3` varchar(50) NOT NULL DEFAULT 'NAN',
  `4` varchar(50) NOT NULL DEFAULT 'NAN',
  `5` varchar(50) NOT NULL DEFAULT 'NAN',
  `6` varchar(50) NOT NULL DEFAULT 'NAN',
  `7` varchar(50) NOT NULL DEFAULT 'NAN',
  `8` varchar(50) NOT NULL DEFAULT 'NAN',
  `9` varchar(50) NOT NULL DEFAULT 'NAN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_feedback`
--

INSERT INTO `store_feedback` (`studentId`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`) VALUES
(1, 'very nice teacher', 'superb', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN'),
(2, 'you are very nice sir!', 'love you sir!', 'NAN', 'NAN', 'NAN', 'nice', 'NAN', 'NAN', 'NAN'),
(5, 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN'),
(888, 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN'),
(1414, 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN'),
(2131, 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN'),
(21315, 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN'),
(121212, 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN'),
(213156, 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN', 'NAN'),
(201112252, 'Ggghh', 'You are very nice sir?!', 'prajval sonaniya', 'n', 'Superb', 'NANwow', 'NAN', 'hhjgadgjka', 'NAN');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `password`) VALUES
(1, 'Prajval sonaniya', 2),
(2, 'prajval sonaniya', 2),
(5, '555', 5),
(888, '32', 32),
(1414, 'temp', 1414),
(2131, '123132112123', 31),
(21315, '123132112123', 31),
(121212, 'prajju sonaniya', 121212),
(213156, '123132112123', 31),
(201112252, 'Prajval Sonaniya', 123);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `branch` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `semester`, `branch`) VALUES
(1, 'Math', '1', 'cse'),
(2, 'Physics', '1', 'ece'),
(3, 'Biology', '2', 'cse'),
(4, 'Chemistry', '2', 'ece'),
(5, 'computer', '1', 'cse'),
(7, 'java', '1', 'cse'),
(10, 'java', '1', 'cse'),
(55, 'digital electronics', '3', 'ECE'),
(101, 'ram patel', '1', 'EE'),
(111, '2121', '1', 'CSE'),
(123, 'oracle', '1', 'CSE'),
(1212, 'l', '1', 'CSE'),
(2423, '32', '1', 'CSE'),
(8936, 'mohan pyare', '2', 'CSE'),
(8937, '', '', ''),
(8938, '', '', ''),
(8939, '', '', ''),
(8940, '', '', ''),
(8941, '', '', ''),
(8942, '', '', ''),
(8943, '', '', ''),
(121255, '12', '1', 'CSE'),
(789789, '79', '1', 'CSE'),
(893678, 'mohan pyare', '2', 'CSE'),
(893679, 'klk', '1', 'CSE'),
(893680, 'klk', '1', 'CSE'),
(893681, 'klk', '1', 'CSE'),
(893682, 'klk', '1', 'CSE'),
(1212121, '21221', '2', 'ECE'),
(1212551, '12', '1', 'CSE'),
(12125515, '12', '1', 'CSE'),
(121255152, '12', '1', 'CSE'),
(1212551527, '12', '1', 'CSE'),
(2147483647, '6544644654', '2', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `fb` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_id`, `name`, `subject`, `fb`, `count`) VALUES
(1, 1, 'Teacher1', 'Math', 35, 8),
(2, 2, 'Teacher2', 'Math', 33, 11),
(3, 3, 'Teacher3', 'Physics', 35, 3),
(4, 4, 'Teacher4', 'Biology', 33, 15),
(5, 5, 'Teacher5', 'Biology', 35, 1),
(6, 5, 'Teacher5', 'Math', 35, 2),
(7, 5, 'Teacher5', 'Chemistry', 35, 1),
(8, 8, 'Teacher8', 'computer', 35, 6),
(9, 9, 'teacher9', 'java', 35, 3),
(51, 0, 'teacher51', 'oracle', 0, 0),
(78, 0, '78', '7', 0, 0),
(85, 0, '153', '83', 0, 0),
(89, 0, '9', '9', 0, 0),
(111, 0, '2121', '21', 0, 0),
(123, 0, '52', '2', 0, 0),
(222, 0, '2', '2', 0, 0),
(456, 0, '65', '6546', 0, 0),
(789, 0, '9', '9', 0, 0),
(888, 0, '8', '8', 0, 0),
(8963, 0, '3', '3', 0, 0),
(89631, 0, '3', '3', 0, 0),
(89888, 0, '8988', '8989', 0, 0),
(123123, 0, '3', '1', 0, 0),
(789789, 0, '78978', '7897', 0, 0),
(888893, 0, '33', '3', 0, 0),
(898936, 0, '2', '2', 0, 0),
(5555555, 0, '3', '3', 0, 0),
(8888931, 0, '33', '3', 0, 0),
(55555551, 0, '3', '3', 0, 0),
(88889315, 0, '33', '3', 0, 0),
(879798779, 0, '79', '789', 0, 0),
(2147483647, 0, '6544', '65', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_detail`
--

CREATE TABLE `teacher_detail` (
  `teacher_id` int(20) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_detail`
--

INSERT INTO `teacher_detail` (`teacher_id`, `teacher_name`, `teacher_password`) VALUES
(1, 'MYname', '1'),
(5, 'kyu batau', '5'),
(123, 'teacher1', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store_feedback`
--
ALTER TABLE `store_feedback`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_detail`
--
ALTER TABLE `teacher_detail`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
