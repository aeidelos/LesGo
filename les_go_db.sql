-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2017 at 10:05 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `les_go_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_message`
--

CREATE TABLE `action_message` (
  `id` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `action_private_course`
--

CREATE TABLE `action_private_course` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `action_report`
--

CREATE TABLE `action_report` (
  `id` int(11) NOT NULL,
  `user_reported` int(11) NOT NULL,
  `course_reported` int(11) NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `action_taking_course`
--

CREATE TABLE `action_taking_course` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `progress` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action_taking_course`
--

INSERT INTO `action_taking_course` (`id`, `user_id`, `course_id`, `progress`) VALUES
(7, 11, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_general`
--

CREATE TABLE `course_general` (
  `id` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `grade` int(11) NOT NULL,
  `details` text,
  `requirement` text NOT NULL,
  `vision` text NOT NULL,
  `teacher` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_general`
--

INSERT INTO `course_general` (`id`, `course_name`, `grade`, `details`, `requirement`, `vision`, `teacher`, `image`, `status`) VALUES
(1, 'Introduction to R Programming', 0, '<p>In this course you will learn how to program in R and how to use R for effective data analysis. You will learn how to install and configure software necessary for a statistical programming environment and describe generic programming language concepts as they are implemented in a high-level statistical language. The course covers practical issues in statistical computing which includes programming in R, reading data into R, accessing R packages, writing R functions, debugging, profiling R code, and organizing and commenting R code. Topics in statistical data analysis will provide working examples.</p>', '<p>Basic understand of Algorithm and Data Structure</p>', '<div class="js-simple-collapse-inner">\r\n<div class="what-you-get__content">\r\n<ul class="what-you-get__items">\r\n<li class="what-you-get__item"><span class="what-you-get__text">Learn to program in R at a good level</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Learn how to use R Studio</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Learn the core principles of programming</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Learn how to create vectors in R</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Learn how to create variables</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Learn about integer, double, logical, character and other types in R</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Learn how to create a while() loop and a for() loop in R</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Learn how to build and use matrices in R</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Learn the matrix() function, learn rbind() and cbind()</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Learn how to install packages in R</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Learn how to customize R studio to suit your preferences</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Understand the Law of Large Numbers</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Understand the Normal distribution</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Practice working with statistical data in R</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Practice working with financial data in R</span></li>\r\n<li class="what-you-get__item"><span class="what-you-get__text">Practice working with sports data in R</span></li>\r\n</ul>\r\n</div>\r\n</div>', 9, '/assets/img/course/course_1.jpg', 1),
(2, 'Belajar Astrofisika Dasar', 0, '<p>Mempelajari tentang dasar astronomi</p>', '<p>Fisika dasar</p>', '<p>Setelah melewati kursus ini, pelajar diharapkan :</p>\r\n<p>1. A</p>\r\n<p>2. A</p>', 9, '/assets/img/course/course_2.png', 1),
(3, 'Microsoft Excel', 0, '<p>Basic Microsoft Excel</p>', '<p>Basic computer skill</p>', '<p>-</p>', 9, '/assets/img/course/course_3.jpg', NULL),
(4, 'Biologi SMA - X', 0, '<p><strong>Biologi</strong> adalah kajian tentang <a title="Kehidupan" href="https://id.wikipedia.org/wiki/Kehidupan">kehidupan</a>, dan <a class="mw-redirect" title="Organisme" href="https://id.wikipedia.org/wiki/Organisme">organisme hidup</a>, termasuk struktur, fungsi, pertumbuhan, <a title="Evolusi" href="https://id.wikipedia.org/wiki/Evolusi">evolusi</a>, persebaran, dan <a title="Taksonomi" href="https://id.wikipedia.org/wiki/Taksonomi">taksonominya</a>.<sup id="cite_ref-1" class="reference"><a href="https://id.wikipedia.org/wiki/Biologi#cite_note-1">[1]</a></sup> Ilmu biologi modern sangat luas, dan <a class="mw-redirect" title="Eklektik" href="https://id.wikipedia.org/wiki/Eklektik">eklektik</a>, serta terdiri dari berbagai macam cabang, dan subdisiplin. Namun, meskipun lingkupnya luas, terdapat beberapa konsep umum yang mengatur semua penelitian, sehingga menyatukannya dalam satu bidang. Biologi umumnya mengakui <a title="Sel (biologi)" href="https://id.wikipedia.org/wiki/Sel_(biologi)">sel</a> sebagai satuan dasar kehidupan, <a title="Gen" href="https://id.wikipedia.org/wiki/Gen">gen</a> sebagai satuan dasar <a class="mw-redirect" title="Pewarisan" href="https://id.wikipedia.org/wiki/Pewarisan">pewarisan</a>, dan <a title="Evolusi" href="https://id.wikipedia.org/wiki/Evolusi">evolusi</a> sebagai mekanisme yang mendorong terciptanya <a title="Spesies" href="https://id.wikipedia.org/wiki/Spesies">spesies</a> baru. Selain itu, organisme diyakini bertahan dengan mengonsumsi, dan mengubah <a title="Energi" href="https://id.wikipedia.org/wiki/Energi">energi</a> serta dengan <a title="Homeostasis" href="https://id.wikipedia.org/wiki/Homeostasis">meregulasi</a> keadaan dalamnya agar tetap stabil, dan vital.</p>', '<p>Tidak ada</p>', '<p>Siswa dapat menguasai materi biologi kelas X SMA</p>', 9, '/assets/img/course/course_4.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_mini_quiz`
--

CREATE TABLE `course_mini_quiz` (
  `id` int(11) NOT NULL,
  `course_subcourse_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_review`
--

CREATE TABLE `course_review` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_subcourse`
--

CREATE TABLE `course_subcourse` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subcourse_name` varchar(50) NOT NULL,
  `content` varchar(225) DEFAULT NULL,
  `reference` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `define_role`
--

CREATE TABLE `define_role` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `define_role`
--

INSERT INTO `define_role` (`id`, `role`) VALUES
(0, 'Administrator'),
(3, 'Pengajar'),
(4, 'Pelajar');

-- --------------------------------------------------------

--
-- Table structure for table `define_status`
--

CREATE TABLE `define_status` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tryout_general`
--

CREATE TABLE `tryout_general` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `enroll_key` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tryout_question`
--

CREATE TABLE `tryout_question` (
  `id` int(11) NOT NULL,
  `document_url` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tryout_result`
--

CREATE TABLE `tryout_result` (
  `id` int(11) NOT NULL,
  `tryout_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `street` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `longitude` int(11) DEFAULT NULL,
  `latitude` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `street`, `city`, `longitude`, `latitude`) VALUES
(3, '0', '0', NULL, NULL),
(4, '', '', NULL, NULL),
(7, 'xxa', '', NULL, NULL),
(9, 'Jl. Mana saja no 999', '', NULL, NULL),
(10, '', '', NULL, NULL),
(11, 'Another Street 331 IV X', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `school` varchar(40) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `name`, `phone`, `school`, `grade`, `gender`) VALUES
(3, 'd', 'f', NULL, 4, NULL),
(4, 'Administrator Les Go', '085755556175', NULL, NULL, NULL),
(7, 'xxn', 'xx0', NULL, 4, NULL),
(9, 'Teacher Example Altered', '08575556175', 'S1 - Teknik Informatika', 13, NULL),
(10, '', '', NULL, 0, NULL),
(11, 'John Cena', '085755556175', NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_general`
--

CREATE TABLE `user_general` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(40) NOT NULL,
  `role` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_general`
--

INSERT INTO `user_general` (`id`, `username`, `password`, `email`, `role`, `status`, `image`) VALUES
(3, 'b', 'c', 'a', 4, 1, NULL),
(4, 'adm00n', '1234', 'adm00n@lesgo.com', 0, 1, '/assets/img/user/user_4.png'),
(7, 'xxu', 'xxp', 'xxe', 4, 1, NULL),
(9, 'teacher', '123', 'teacher@mail.com', 3, 1, '/assets/img/user/user_9.jpg'),
(10, '', '', '', 4, 1, NULL),
(11, 'john', '123', 'jc@gmail.com', 4, 1, '/assets/img/user/user_11.PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_message`
--
ALTER TABLE `action_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `action_private_course`
--
ALTER TABLE `action_private_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `action_report`
--
ALTER TABLE `action_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `action_taking_course`
--
ALTER TABLE `action_taking_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_general`
--
ALTER TABLE `course_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_mini_quiz`
--
ALTER TABLE `course_mini_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_review`
--
ALTER TABLE `course_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_subcourse`
--
ALTER TABLE `course_subcourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `define_role`
--
ALTER TABLE `define_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `define_status`
--
ALTER TABLE `define_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tryout_general`
--
ALTER TABLE `tryout_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tryout_question`
--
ALTER TABLE `tryout_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tryout_result`
--
ALTER TABLE `tryout_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_general`
--
ALTER TABLE `user_general`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_message`
--
ALTER TABLE `action_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `action_private_course`
--
ALTER TABLE `action_private_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `action_report`
--
ALTER TABLE `action_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `action_taking_course`
--
ALTER TABLE `action_taking_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `course_general`
--
ALTER TABLE `course_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `course_mini_quiz`
--
ALTER TABLE `course_mini_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course_review`
--
ALTER TABLE `course_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course_subcourse`
--
ALTER TABLE `course_subcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `define_role`
--
ALTER TABLE `define_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `define_status`
--
ALTER TABLE `define_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tryout_general`
--
ALTER TABLE `tryout_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tryout_result`
--
ALTER TABLE `tryout_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_general`
--
ALTER TABLE `user_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_general` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
