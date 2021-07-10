-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 10, 2021 at 10:25 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `class_id` int(11) NOT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `class_type` text NOT NULL,
  `info` text NOT NULL,
  `class_name` text NOT NULL,
  `class_img` text,
  `video` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`class_id`, `creator_id`, `class_type`, `info`, `class_name`, `class_img`, `video`) VALUES
(1, 1, '', 'Learn to fight like Bruce Lee !!!', 'Martial arts', '', ''),
(2, 2, '', 'Shading makes your character look better', 'Arts', '', ''),
(3, 3, '', 'Learn to survive in the wild', 'Survival skills', '', ''),
(4, 4, '', 'Tips for life skills', 'Basic skills', '', ''),
(5, 5, '', 'Digital art for beginners', 'Arts', '', ''),
(6, 6, '', 'Upgrade water system', 'Survival skills', '', ''),
(7, 7, '', 'How to control fear before and during the fight', 'Martial Arts', '', ''),
(8, 8, '', 'Tips and tricks for beginner plumbers', 'Basic skills', '', ''),
(9, 9, '', 'Tips for character design', 'Arts', '', ''),
(10, 10, '', 'How to defend yourself when someone pushing you', 'Martial Arts', '', ''),
(17, 11, 'martial arts', 'dfasdfsdaf', 'fsdfas', NULL, 'videos/60e96b4401e3e.mp4'),
(18, 11, 'martial arts', 'fasdfsdfsdfasdf', 'fasdfsdfads', NULL, 'videos/60e96b748c6c8.mp4'),
(19, 11, 'martial arts', 'dsafsdfasdfsd', 'fsadfasdfasdf', NULL, 'videos/60e96bb6d0b97.mp4'),
(20, 11, 'martial arts', 'asdfadsf', 'fsadfasdf', NULL, 'videos/60e96eb86f9db.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `body` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `User_name` text NOT NULL,
  `Email` text NOT NULL,
  `hash` text NOT NULL,
  `Avatar` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `User_name`, `Email`, `hash`, `Avatar`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$UlffqcCPSVA.MxBuD0qjoOG/0p/BZdf4C9uWGsXHHx3v3keGCBZWa', ''),
(2, 'Fighting god', 'godfight@gmail.com', '$2y$10$o2HXT6rBID0ADAkK.dwUde4U65r62wCfpoVSs.fQuvfIBTmwQgm1a', ''),
(3, 'Borny Hitch', 'HB@gmail.com', '$2y$10$KPzqlpPtAGLM0sCIKb.XKuPAZWTIGYTZ5s7fCXqUdKZOte7FiIzsm', ''),
(4, 'Not_Bear_Grylls', 'NBG@gmail.com', '$2y$10$1tQvy8F6i1ydclX441yBUe5R6h1Sf4hu5q3ajt90kBJFBkMWtE.2S', ''),
(5, 'Johnny Sin', 'JS@gmail.com', '$2y$10$77ud6NpSLoe45hUxlAgV9O0f0.5YuiLVNxMc9nEI25ZwH3oMxBOhu', ''),
(6, 'Shindo L', 'ShindoL@gmail.com', '$2y$10$73uCIo/.eW/MDZHilMbuS.lxM/VnyJLIFF7p6HSbJri75Phlfb2Ry', ''),
(7, 'Joseph Joestar', 'bestjojo@gmail.com', '$2y$10$21nE4PEq.nlmqDPirpedeeZfWYBtwRh3zzzdKIks/JL6wewBzg5ma', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
