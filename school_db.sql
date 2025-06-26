-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 10:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`) VALUES
(2, 'Grade-3'),
(11, 'Grade-4'),
(12, 'Grade-5'),
(13, 'Grade-6'),
(14, 'Grade-7'),
(15, 'Grade-8'),
(16, 'Grade-9'),
(17, 'Grade-10'),
(18, '1st year'),
(19, '2nd year');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` int(11) NOT NULL,
  `paper_type_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `paper_title` varchar(255) DEFAULT NULL,
  `paper_date` date DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `paper_type_id`, `subject_id`, `class_id`, `teacher_id`, `paper_title`, `paper_date`, `duration`, `description`) VALUES
(4, 4, 2, 2, 4, 'mathematics', '2025-05-09', '1 hour', 'basic algebra'),
(5, 1, 5, 11, 7, 'chemistry', '2025-05-08', '1.5 hours', 'chemistry basics'),
(6, 3, 8, 12, 8, 'English', '2025-04-17', '2 hours', 'comprehension and essay'),
(7, 4, 11, 13, 11, 'islamiat', '2025-05-13', '45 minutes', 'five pillars of islam'),
(8, 1, 9, 14, 9, 'urdu', '2025-03-18', '1 hour', 'poetry and essay'),
(9, 3, 10, 15, 10, 'computer science', '2025-05-08', '2 hours', 'ms office and basics'),
(10, 4, 7, 16, 12, 'biology', '2025-05-11', '1 hour', 'Human body basics'),
(11, 1, 4, 17, 5, 'physics', '2025-02-13', '1 hour', 'laws of motion'),
(12, 3, 13, 18, 14, 'geography', '2025-05-20', '2 hours', 'clmate and maps'),
(13, 1, 12, 19, 13, 'history', '2025-05-12', '1 hour', 'indus valley civillization');

-- --------------------------------------------------------

--
-- Table structure for table `paper_contents`
--

CREATE TABLE `paper_contents` (
  `id` int(11) NOT NULL,
  `paper_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paper_contents`
--

INSERT INTO `paper_contents` (`id`, `paper_id`, `content`, `file_path`) VALUES
(40, 4, 'Mathematics Midterm: Algebra and Geometry questions included.', 'maths practics mcqs questionjpg.jpg'),
(41, 6, 'English Grammar Practice Paper', 'english practice mcqs.jpg'),
(44, 13, 'History Midterm: Chapters 1 to 5', 'histoty practice questionpng.png'),
(45, 11, 'Physics Final: Numericals and theory', 'physics practics mcqus question.jpg'),
(46, 5, 'Chemistry Midterm with MCQs', 'Inorganic-Chemistry-MCQ-on-Atomic-Structure-MCQ-Questions-min.jpg'),
(47, 10, 'Biology Notes and diagrams for Final Term.', 'bio practice question.jpg'),
(48, 9, 'Computer Science coding problems', 'computer practice mcqs.jpg'),
(49, 7, 'Islamiat paper with translation questions.', 'questions_Islamiat-Notes-for-XI-XII-First-year-Second-year-11th-12th.jpg'),
(50, 8, 'Urdu Essay Questions for Final Paper', 'urdu practice mcqs question.jpeg'),
(51, 12, 'geography Final: All topics from the second term.', 'geography multiple question .jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paper_marks`
--

CREATE TABLE `paper_marks` (
  `id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `marks_obtained` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paper_marks`
--

INSERT INTO `paper_marks` (`id`, `paper_id`, `student_id`, `marks_obtained`) VALUES
(1, 10, 37, 79),
(2, 7, 5, 88),
(3, 4, 2, 94),
(4, 9, 35, 45),
(5, 11, 38, 67),
(6, 8, 8, 87),
(7, 5, 3, 90),
(8, 12, 39, 75),
(9, 13, 40, 79),
(10, 6, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `paper_types`
--

CREATE TABLE `paper_types` (
  `id` int(11) NOT NULL,
  `term_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paper_types`
--

INSERT INTO `paper_types` (`id`, `term_name`) VALUES
(1, 'midterm'),
(3, 'Final term'),
(4, 'Module');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(100) NOT NULL,
  `stu_email` varchar(100) DEFAULT NULL,
  `stu_phone` varchar(20) DEFAULT NULL,
  `stu_gender` varchar(10) DEFAULT NULL,
  `stu_date` date DEFAULT NULL,
  `stu_class_id` int(11) DEFAULT NULL,
  `stu_address` text DEFAULT NULL,
  `stu_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stu_id`, `stu_name`, `stu_email`, `stu_phone`, `stu_gender`, `stu_date`, `stu_class_id`, `stu_address`, `stu_created_at`) VALUES
(2, 'Ahmed Khan', 'ahmedkhan@gmail.com', '03333467122', 'Male', '2025-05-04', 13457, 'gulshanblockA', '2025-05-17 10:05:05'),
(3, 'Fatima amir', 'fatima@gmail.com', '04321986347', 'Female', '2025-05-22', 145671, 'Malirmillatgarden', '2025-05-17 10:08:44'),
(4, 'hassan', 'hassanadnan@gmail.com', '3341239833', 'Male', '2025-05-19', 13453, 'sadarblock5', '2025-05-17 11:00:51'),
(5, 'Ayesha siddique', 'ayesha@gmail.com', '09876531875', 'Female', '2025-04-17', 126734, 'azizibadblock3', '2025-05-17 11:02:23'),
(8, 'Zainab ishraq', 'zainab@gmail.com', '07745218542', 'Female', '2025-03-13', 186732, 'kokrapar', '2025-05-17 11:10:47'),
(35, 'Usman Sheikh', 'usman@gmail.com', '03345623196', 'Male', '2025-02-05', 126749, 'Northkarachi', '2025-05-19 17:44:08'),
(37, 'aliza', 'aliza@gmail.com', '3342198564', 'Female ', '2025-05-21', 145374, 'azizabad', '2025-05-30 08:55:54'),
(38, 'amna', 'amna@gmail.com', '3342198563', 'Female ', '2025-05-29', 13453, 'sadar', '2025-05-31 08:16:12'),
(39, 'Maryum yousuf', 'maryum@gmail.com', '9967423976', 'Female ', '2025-05-12', 127649, 'Nazmabad Block7', '2025-05-31 08:24:52'),
(40, 'Sana Malik', 'sana@gmail.com', '9977429183', 'Female ', '2025-03-19', 179543, 'sadar BlockA', '2025-05-31 08:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(2, 'Mathematics'),
(4, 'physics'),
(5, 'Chemistry'),
(7, 'biology'),
(8, 'English'),
(9, 'Urdu'),
(10, 'computer science'),
(11, 'islamic studies'),
(12, 'History'),
(13, 'Geography'),
(14, 'Math'),
(15, 'Science'),
(16, 'English'),
(17, 'Math'),
(18, 'Science'),
(19, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `tech_name` varchar(100) NOT NULL,
  `tech_email` varchar(100) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `tech_name`, `tech_email`, `subject_id`) VALUES
(4, 'Imran Khalid', 'imrankhalid@gmail.com', 2),
(5, 'Nida Haroon', 'nidaharoon@gmail.com', 4),
(7, 'Owais Ahmed', 'owais@gmail.com', 5),
(8, 'Rabia Anwar', 'rabia@gmail.com', 8),
(9, 'Yasir Shah', 'yasirshah@gmail.com', 9),
(10, 'Sadia Waheed', 'sadiawaheed@gmail.cpm', 10),
(11, 'Asim Javed', 'asimjved@gmail.com', 11),
(12, 'Farah Zafar', 'farahzafar@gmail.com', 7),
(13, 'amna zafar', 'amnazafar@gmail.com', 12),
(14, 'Khizra jawed', 'khizrajawed@gmail.com', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paper_type_id` (`paper_type_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `paper_contents`
--
ALTER TABLE `paper_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paper_id` (`paper_id`);

--
-- Indexes for table `paper_marks`
--
ALTER TABLE `paper_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paper_id` (`paper_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `paper_types`
--
ALTER TABLE `paper_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `stu_email` (`stu_email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `paper_contents`
--
ALTER TABLE `paper_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `paper_marks`
--
ALTER TABLE `paper_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `paper_types`
--
ALTER TABLE `paper_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_ibfk_1` FOREIGN KEY (`paper_type_id`) REFERENCES `paper_types` (`id`),
  ADD CONSTRAINT `papers_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `papers_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `papers_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `paper_contents`
--
ALTER TABLE `paper_contents`
  ADD CONSTRAINT `paper_contents_ibfk_1` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`);

--
-- Constraints for table `paper_marks`
--
ALTER TABLE `paper_marks`
  ADD CONSTRAINT `paper_marks_ibfk_1` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paper_marks_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`stu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
