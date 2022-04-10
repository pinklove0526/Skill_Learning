-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 10, 2022 at 07:43 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

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
  `class_type` text NOT NULL,
  `info` text NOT NULL,
  `class_name` text NOT NULL,
  `contact_info` text NOT NULL,
  `owner_name` text NOT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`class_id`, `class_type`, `info`, `class_name`, `contact_info`, `owner_name`, `video`) VALUES
(1, 'Martial arts', 'Learn to fight like Bruce Lee !!!', 'Fighting 101\r\n', '', '', 'videos/60e96b4401e3e.mp4'),
(2, 'Arts', 'Shading makes your character look better', 'Draw anime 101', '', '', 'videos/60e96b4401e3e.mp4'),
(3, 'Survival skills', 'Learn to survive in the wild', 'Live like Bear Grylls', '', '', 'videos/60e96b4401e3e.mp4'),
(4, 'Basic skills', 'Tips for life skills', 'How to basic', '', '', 'videos/60e96b4401e3e.mp4'),
(5, 'Arts', 'Digital art for beginners', 'Digital Arts', '', '', 'videos/60e96b4401e3e.mp4'),
(6, 'Survival skills', 'Upgrade water system', 'Better hygiene, better life', '', '', 'videos/60e96b4401e3e.mp4'),
(7, 'Martial Arts', 'How to control fear before and during the fight', 'Self denfence', '', '', 'videos/60e96b4401e3e.mp4'),
(8, 'Basic skills', 'Tips and tricks for beginner plumbers', 'Be a great plumber with Johnny Sins', '', '', 'videos/60e96b4401e3e.mp4'),
(9, 'Arts', 'Tips for character design', 'Design characters', '', '', 'videos/60e96b4401e3e.mp4'),
(10, 'Martial Arts', 'How to defend yourself when someone pushing you', 'Make your life safe', '', '', 'videos/60e96b4401e3e.mp4'),
(17, 'martial arts', 'dfasdfsdaf', 'fsdfas', '', '', 'videos/60e96b4401e3e.mp4'),
(18, 'martial arts', 'fasdfsdfsdfasdf', 'fasdfsdfads', '', '', 'videos/60e96b748c6c8.mp4'),
(19, 'martial arts', 'dsafsdfasdfsd', 'fsadfasdfasdf', '', '', 'videos/60e96bb6d0b97.mp4'),
(20, 'martial arts', 'asdfadsf', 'fsadfasdf', '', '', 'videos/60e96eb86f9db.mp4'),
(21, 'Basic skills', 'Tips for life skills', '', '', '', 'videos/60e96b4401e3e.mp4'),
(22, 'Basic skills', 'Tips for life skills', '', '', '', 'videos/60e96b4401e3e.mp4'),
(23, 'Basic skills', 'Tips for life skills', '', '', '', 'videos/60e96b4401e3e.mp4'),
(24, 'basic skills', 'az', 'asd', 'z', '', 'videos/61a5e99112c54.mp4'),
(25, 'survival skills', 'za', 'as', 'asxz', '', 'videos/61a5e9a065322.mp4'),
(26, 'survival skills', '0999999999', 'Survive', 'azaz', '', 'videos/61a62a8b53b6b.mp4'),
(27, 'martial arts', '01224245', 'martial', 'as', '', 'videos/61a62ad471920.mp4'),
(28, 'basic skills', '0218755123', 'damm', 'as', '', 'a'),
(29, 'talents', 'facebook', 'Bad', 'tesasz', '', 'a'),
(30, 'martial arts', 'insta', 'test2', 'asdsazxz', 'a', 'videos/61a62b988a2f4.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `classroom_id`, `body`) VALUES
(1, 13, 1, 'This is a test'),
(2, 3, 1, 'Testing, testing, testing,... 1 2 3 4');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_classroom`
--

CREATE TABLE `enrolled_classroom` (
  `StudentID` int(11) NOT NULL,
  `ClassroomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `material/quiz`
--

CREATE TABLE `material/quiz` (
  `ContentID` int(11) NOT NULL,
  `ClassroomID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `ContentType` text NOT NULL,
  `ContentInfo` text NOT NULL,
  `ContentName` text NOT NULL,
  `Chapter` int(11) NOT NULL,
  `Score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `RatingScore` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RatingID`, `ClassID`, `StudentID`, `RatingScore`) VALUES
(1, 1, 12, 8),
(2, 1, 11, 7),
(3, 1, 6, 9),
(4, 1, 5, 7),
(5, 2, 13, 9),
(6, 2, 13, 7),
(7, 2, 13, 10);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TeacherID` int(11) NOT NULL,
  `User_Name` text NOT NULL,
  `Email` text NOT NULL,
  `hash` text NOT NULL,
  `DOB` date NOT NULL,
  `Background` text NOT NULL,
  `Avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `User_name` text NOT NULL,
  `Email` text NOT NULL,
  `hash` text NOT NULL,
  `Avatar` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `User_name`, `Email`, `hash`, `Avatar`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$UlffqcCPSVA.MxBuD0qjoOG/0p/BZdf4C9uWGsXHHx3v3keGCBZWa', ''),
(2, 'Figting god', 'godfight@gmail.com', '$2y$10$o2HXT6rBID0ADAkK.dwUde4U65r62wCfpoVSs.fQuvfIBTmwQgm1a', ''),
(3, 'Borny Hitch', 'HB@gmail.com', '$2y$10$KPzqlpPtAGLM0sCIKb.XKuPAZWTIGYTZ5s7fCXqUdKZOte7FiIzsm', ''),
(4, 'Not_Bear_Grylls', 'NBG@gmail.com', '$2y$10$1tQvy8F6i1ydclX441yBUe5R6h1Sf4hu5q3ajt90kBJFBkMWtE.2S', ''),
(5, 'Johnny Sin', 'JS@gmail.com', '$2y$10$77ud6NpSLoe45hUxlAgV9O0f0.5YuiLVNxMc9nEI25ZwH3oMxBOhu', ''),
(6, 'Shindo L', 'ShindoL@gmail.com', '$2y$10$73uCIo/.eW/MDZHilMbuS.lxM/VnyJLIFF7p6HSbJri75Phlfb2Ry', ''),
(7, 'Joseph Joestar', 'bestjojo@gmail.com', '$2y$10$21nE4PEq.nlmqDPirpedeeZfWYBtwRh3zzzdKIks/JL6wewBzg5ma', ''),
(11, 'baolong', 'klasfhsjkld@gmail.com', '$2y$10$TIOJqRCuBRM9ruIgxLBnweu3zYCT16.EB/v0b0Kb1azbmH4/5wlBq', NULL),
(12, 'a', 'a@gmail.com', '$2y$10$WN9IV/RMakGKcWbM3VA1D.A21bYVRk0247jtmzrGsPMlvwS2JSxBq', NULL),
(13, 'test1234', 'test1234@gmail.com', '$2y$10$Aa4GI6JhoII6JNnYvG0p6uMdx.iGgcQpnWfeeH7w3fD2cvLty.9wO', NULL);

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
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_ibfk_1` (`classroom_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `enrolled_classroom`
--
ALTER TABLE `enrolled_classroom`
  ADD UNIQUE KEY `Fk` (`StudentID`),
  ADD KEY `FK_ER_CL` (`ClassroomID`);

--
-- Indexes for table `material/quiz`
--
ALTER TABLE `material/quiz`
  ADD PRIMARY KEY (`ContentID`),
  ADD KEY `material/quiz_ibfk_1` (`ClassroomID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `ClassID` (`ClassID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material/quiz`
--
ALTER TABLE `material/quiz`
  MODIFY `ContentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `teacher` (`TeacherID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrolled_classroom`
--
ALTER TABLE `enrolled_classroom`
  ADD CONSTRAINT `FK_ER_CL` FOREIGN KEY (`ClassroomID`) REFERENCES `classroom` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ER_US` FOREIGN KEY (`StudentID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `material/quiz`
--
ALTER TABLE `material/quiz`
  ADD CONSTRAINT `material/quiz_ibfk_1` FOREIGN KEY (`ClassroomID`) REFERENCES `classroom` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material/quiz_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `classroom` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
