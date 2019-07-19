-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2019 at 06:57 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.3.6-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzes`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` varchar(30) NOT NULL,
  `is_correct` tinyint(1) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `text`, `is_correct`, `question_id`) VALUES
(67, 'An algorithm', 1, 1),
(68, 'A compiler', 0, 1),
(69, 'A class', 0, 1),
(70, 'PHP', 0, 1),
(76, 'saved in a separate file', 0, 3),
(77, 'viewed in a command prompt', 0, 3),
(78, 'capitalized', 0, 3),
(79, 'parsed', 1, 3),
(83, 'Transliterator', 0, 4),
(84, 'Converter', 0, 4),
(85, 'Compiler', 1, 4),
(86, 'Transliterator', 0, 4),
(87, 'Conditional', 0, 5),
(88, 'Compiler', 0, 5),
(89, 'Loop', 1, 5),
(90, 'Variable', 0, 5),
(91, 'True', 0, 6),
(92, 'False', 1, 6),
(93, '5th generation', 0, 7),
(94, '2nd generation', 0, 7),
(95, '1st generation', 0, 7),
(96, '3rd generation', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `text`, `quiz_id`) VALUES
(1, 'Ask user for a number, ask user for another number, multiply the two numbers, print result..What do you call this set of instructions?', 3),
(3, 'Before source code can be compiled, it has to be...', 3),
(4, 'What is the software called that translates code into something meaningful the computer can understand?', 3),
(5, 'If you needed to execute some code repeatedly based on a certain condition, which of the following would you use?', 3),
(6, 'You need special software to write programs', 3),
(7, 'Which generation of languages allows for the use of words and commands?', 3);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`) VALUES
(3, 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(378, 'admin'),
(379, 'admin'),
(380, 'admin'),
(381, 'admin'),
(382, 'admin'),
(383, 'admin'),
(384, 'admin'),
(385, 'admin'),
(386, 'admin'),
(387, 'admin'),
(388, 'admin'),
(389, 'admin'),
(390, 'admin'),
(391, 'admin'),
(392, 'admin'),
(393, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `answer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `user_id`, `quiz_id`, `question_id`, `answer_id`) VALUES
(596, 378, 3, 1, 67),
(597, 378, 3, 3, 76),
(598, 378, 3, 4, 84),
(599, 378, 3, 5, 89),
(600, 379, 3, 1, 67),
(601, 379, 3, 3, 77),
(602, 379, 3, 4, 85),
(603, 379, 3, 5, 88),
(604, 380, 3, 1, 67),
(605, 380, 3, 3, 77),
(606, 380, 3, 4, 84),
(607, 380, 3, 5, 87),
(608, 381, 3, 1, 67),
(609, 381, 3, 3, 77),
(610, 381, 3, 4, 77),
(611, 381, 3, 5, 90),
(612, 382, 3, 1, 69),
(613, 382, 3, 3, 78),
(614, 382, 3, 4, 84),
(615, 382, 3, 5, 88),
(616, 382, 3, 6, 92),
(617, 382, 3, 7, 94),
(618, 385, 3, 1, 68),
(619, 386, 3, 1, 67),
(620, 386, 3, 3, 77),
(621, 386, 3, 4, 85),
(622, 386, 3, 5, 88),
(623, 386, 3, 6, 92),
(624, 386, 3, 7, 94),
(625, 387, 3, 1, 69),
(626, 387, 3, 3, 77),
(627, 387, 3, 4, 85),
(628, 387, 3, 5, 88),
(629, 387, 3, 6, 88),
(630, 387, 3, 7, 95),
(631, 388, 3, 1, 68),
(632, 388, 3, 3, 68),
(633, 388, 3, 4, 68),
(634, 388, 3, 5, 68),
(635, 388, 3, 6, 68),
(636, 388, 3, 7, 68),
(637, 389, 3, 1, 70),
(638, 389, 3, 3, 70),
(639, 389, 3, 4, 70),
(640, 389, 3, 5, 70),
(641, 389, 3, 6, 70),
(642, 389, 3, 7, 70),
(643, 390, 3, 1, 69),
(644, 390, 3, 3, 69),
(645, 390, 3, 4, 69),
(646, 390, 3, 5, 69),
(647, 390, 3, 6, 69),
(648, 390, 3, 7, 69),
(649, 391, 3, 1, 67),
(650, 391, 3, 3, 67),
(651, 391, 3, 4, 67),
(652, 391, 3, 5, 67),
(653, 391, 3, 6, 67),
(654, 391, 3, 7, 67),
(655, 393, 3, 1, 67),
(656, 393, 3, 3, 77),
(657, 393, 3, 4, 85),
(658, 393, 3, 5, 90),
(659, 393, 3, 6, 91),
(660, 393, 3, 7, 95);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_questions_id_fk` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quizzes_id_fk` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_answers_answers_id_fk` (`answer_id`),
  ADD KEY `user_answers_questions_id_fk` (`question_id`),
  ADD KEY `user_answers_quizzes_id_fk` (`quiz_id`),
  ADD KEY `user_answers_user_id_quiz_id_index` (`user_id`,`quiz_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=661;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_questions_id_fk` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quizzes_id_fk` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_answers_id_fk` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_questions_id_fk` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_quizzes_id_fk` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
