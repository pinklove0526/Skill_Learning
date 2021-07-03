-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 03, 2021 at 02:06 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `skillshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `class_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `info` text NOT NULL,
  `class_name` text NOT NULL,
  `video` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`class_id`, `creator_id`, `info`, `class_name`, `video`) VALUES
(1, 1, 'Learn to fight like Bruce Lee!', 'Martial arts', 'https://www.youtube.com/watch?v=y9PkOR7kCrQ'),
(2, 2, 'Shading make your character look better', 'Arts', 'https://www.youtube.com/watch?v=ZJkIaMECW6c&ab_channel=SinixDesign'),
(3, 3, 'Learn to survive in the wild', 'Survival skills', 'https://www.youtube.com/watch?v=fZndJO2jUJk&ab_channel=TAOutdoors'),
(4, 4, 'Tips for life skills', 'Basic skills', 'https://www.youtube.com/watch?v=GOfAqfzGqhk&ab_channel=BuzzFeedNifty'),
(5, 5, 'Digital art for beginners', 'Arts', 'https://www.youtube.com/watch?v=iwRa5qTnr8o'),
(6, 6, 'Upgrade water system', 'Survival skills', 'https://www.youtube.com/watch?v=F1GtNSKpCzg&ab_channel=PrimitiveSkills'),
(7, 7, 'How to control fear before and during the fight', 'Martial arts', 'https://www.youtube.com/watch?v=03nXRY8JevI'),
(8, 8, 'Tips and tricks for beginner plumbers', 'Basic skills', 'https://www.youtube.com/watch?v=LbtKUY77UPs'),
(9, 9, 'Tips for character design', 'Arts', 'https://www.youtube.com/watch?v=v6lPsEPOIkM'),
(10, 10, 'How to defend yourself when someone pushing you', 'Martial arts', 'https://www.youtube.com/watch?v=XARIQt1Z20M');

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
(1, 'admin', 'admin@gmail.com', '$2y$10$UlffqcCPSVA.MxBuD0qjoOG/0p/BZdf4C9uWGsXHHx3v3keGCBZWa', '');

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
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;