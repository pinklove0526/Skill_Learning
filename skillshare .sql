-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 15, 2022 at 09:34 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`class_id`, `class_type`, `info`, `class_name`, `contact_info`, `owner_name`, `video`) VALUES
(1, 'Martial arts', 'Learn to fight like Bruce Lee!!!', 'Fighting 101\\r\\n', '', '', 'videos/60e96b4401e3e.mp4'),
(2, 'Arts', 'Shading makes your character look better', 'Draw anime 101', '', '', 'videos/60e96b4401e3e.mp4'),
(3, 'Survival skills', 'Learn to survive in the wild', 'Live like Bear Grylls', '', '', 'videos/60e96b4401e3e.mp4'),
(4, 'Basic skills', 'Tips for life skills', 'How to basic', '', '', 'videos/60e96b4401e3e.mp4'),
(5, 'Arts', 'Digital art for beginners', 'Digital Arts', '', '', 'videos/60e96b4401e3e.mp4'),
(6, 'Survival skills', 'Upgrade water system', 'Better hygiene, better life', '', '', 'videos/60e96b4401e3e.mp4'),
(7, 'Martial Arts', 'How to control fear before and during the fight', 'Self denfence', '', '', 'videos/60e96b4401e3e.mp4'),
(8, 'Basic skills', 'Tips and tricks for beginner plumbers', 'Be a great plumber with Johnny Sins', '', '', 'videos/60e96b4401e3e.mp4'),
(9, 'Arts', 'Tips for character design', 'Design characters', '', '', 'videos/60e96b4401e3e.mp4'),
(10, 'Martial Arts', 'How to defend yourself when someone pushing you', 'Make your life safe', '', '', 'videos/60e96b4401e3e.mp4'),
(11, 'martial arts', 'dfasdfsdaf', 'fsdfas', '', '', 'videos/60e96b4401e3e.mp4'),
(12, 'martial arts', 'fasdfsdfsdfasdf', 'fasdfsdfads', '', '', 'videos/60e96b748c6c8.mp4'),
(13, 'martial arts', 'dsafsdfasdfsd', 'fsadfasdfasdf', '', '', 'videos/60e96bb6d0b97.mp4'),
(14, 'martial arts', 'asdfadsf', 'fsadfasdf', '', '', 'videos/60e96eb86f9db.mp4'),
(15, 'Basic skills', 'Tips for life skills', '', '', '', 'videos/60e96b4401e3e.mp4'),
(16, 'basic skills', 'az', 'asd', 'z', '', 'videos/61a5e99112c54.mp4'),
(17, 'survival skills', 'za', 'as', 'asxz', '', 'videos/61a5e9a065322.mp4'),
(18, 'survival skills', '0999999999', 'Survive', 'azaz', '', 'videos/61a62a8b53b6b.mp4'),
(19, 'martial arts', '01224245', 'martial', 'as', '', 'videos/61a62ad471920.mp4'),
(20, 'basic skills', '0218755123', 'damm', 'as', '', 'a'),
(21, 'talents', 'Facebook', 'Bad', 'tesasz', '', 'a'),
(22, 'martial arts', 'insta', 'test2', 'asdsazxz', 'a', 'videos/61a62b988a2f4.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_classroom`
--

CREATE TABLE `enrolled_classroom` (
  `StudentID` int(11) NOT NULL,
  `ClassroomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `ContentID` int(11) NOT NULL,
  `ClassroomID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `ContentType` text NOT NULL,
  `ContentInfo` varchar(255) NOT NULL,
  `ContentName` varchar(255) NOT NULL,
  `Chapter` int(11) NOT NULL,
  `Mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `ClassID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `RatingNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `User_Name` text NOT NULL,
  `Email` text NOT NULL,
  `hash` text NOT NULL,
  `DOB` date NOT NULL,
  `Avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(7, 'Joseph Joestar', 'bestjojo@gmail.com', '$2y$10$21nE4PEq.nlmqDPirpedeeZfWYBtwRh3zzzdKIks/JL6wewBzg5ma', ''),
(8, 'baolong', 'klasfhsjkld@gmail.com', '$2y$10$TIOJqRCuBRM9ruIgxLBnweu3zYCT16.EB/v0b0Kb1azbmH4/5wlBq', ''),
(9, 'a', 'a@gmail.com', '$2y$10$WN9IV/RMakGKcWbM3VA1D.A21bYVRk0247jtmzrGsPMlvwS2JSxBq', '');

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
  ADD KEY `FK_CM_CL` (`classroom_id`);

--
-- Indexes for table `enrolled_classroom`
--
ALTER TABLE `enrolled_classroom`
  ADD UNIQUE KEY `Fk` (`StudentID`),
  ADD KEY `FK_ER_CL` (`ClassroomID`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`ContentID`),
  ADD KEY `FK_MT_CL` (`ClassroomID`),
  ADD KEY `FK_MT_ST` (`StudentID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD KEY `FK_RT_CL` (`ClassID`),
  ADD KEY `FK_RT_ST` (`StudentID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

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
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `ContentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_CM_CL` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrolled_classroom`
--
ALTER TABLE `enrolled_classroom`
  ADD CONSTRAINT `FK_ER_CL` FOREIGN KEY (`ClassroomID`) REFERENCES `classroom` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ER_US` FOREIGN KEY (`StudentID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `FK_MT_CL` FOREIGN KEY (`ClassroomID`) REFERENCES `classroom` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MT_ST` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK_RT_CL` FOREIGN KEY (`ClassID`) REFERENCES `classroom` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RT_ST` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
