-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2015 at 10:09 AM
-- Server version: 5.5.46
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preguntas`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `body` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `body`, `date`, `likes`, `dislikes`, `id_user`, `id_question`) VALUES
(1, 'Pues deberías ir porque va salva y es buen chaval', '2015-12-02', 5, 2, 1, 1),
(2, 'sadasd2', '2015-12-02', 5, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `body` text NOT NULL,
  `created` date NOT NULL,
  `modify` date DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `body`, `created`, `modify`, `id_user`, `id_tag`) VALUES
(1, 'Holis', 'holis', '2015-12-03', NULL, 3, 0),
(2, 'Hasdjbasdjb', 'asijdbaskdna', '2015-12-03', NULL, 3, 0),
(3, 'ss', 'ss', '2015-12-03', NULL, 2, 0),
(4, 'ASDDAS', 'ASDASDASD', '2015-12-03', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'comedia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `real_name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `real_name`, `birthday`, `user_type`) VALUES
(1, 'aaa', '$2a$10$TfnR.8vLYRqUit.8pnm8EuLwvELb6ruOWxGQFUo0yJzlG61drbrYy', '', '', '0000-00-00', 'admin'),
(2, 'Admin', '$2a$10$qFNKCmqmGPUIWcjrBIoHHuTiGEaXizSmUTJ2qH533lsxtJxTI9A9q', '', '', '0000-00-00', 'admin'),
(3, 'Salva', '$2a$10$7sILIxJpVITIOGxgfTGxbuB7KqXFh/yqMXZEd//YcyCWeNUkZqHPS', '', '', '0000-00-00', 'normal'),
(4, 'Miguel', '$2a$10$4/E5s0.734wT1Qe7Kg8IE.QmT6Bld6uX6Lp7IJHn1eLXY5fn82t7u', '', '', '0000-00-00', 'normal'),
(7, 'yeah', '$2a$10$.SX0vETZ7sWxyVbKOu9A1OgULOI/lIuOe4laxZZm/VzEzaZIkWQHC', '', '', '0000-00-00', 'admin'),
(8, 'add', '$2a$10$8OrrpNjKwPPtvG7NFk3/HugZntcHxVSSuz52YcJw9BMc6uiQT9VAu', '', '', '0000-00-00', 'admin'),
(9, 'falso', '$2a$10$VJMJdAdzXPU8bg8TqiWho.mPWbZiBBDNpCfRzsbAoG3FYS/L0oWPG', '', '', '0000-00-00', 'admin'),
(10, 'joseluis', '$2a$10$4FZb/V5wmU4uq/KA4biIPeo61bK6I8KrOzpTN/xORG0w3kpUTWWe2', '', '', '0000-00-00', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_answer` (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_question` (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tag` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
