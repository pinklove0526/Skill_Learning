-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2021 at 02:30 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

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

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE IF NOT EXISTS `classroom` (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `creator_id` int NOT NULL,
  `class_type` text NOT NULL,
  `info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class_img` text NOT NULL,
  `video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`class_id`, `creator_id`, `class_type`, `info`, `class_name`, `class_img`, `video`) VALUES
(1, 1, '', 'Learn to fight like Bruce Lee !!!', 'Martial arts', '', 'https://www.youtube.com/watch?v=y9PkOR7kCrQ'),
(2, 2, '', 'Shading makes your character look better', 'Arts', '', 'https://www.youtube.com/watch?v=ZJkIaMECW6c&ab_channel=SinixDesign'),
(3, 3, '', 'Learn to survive in the wild', 'Survival skills', '', 'https://www.youtube.com/watch?v=fZndJO2jUJk&ab_channel=TAOutdoors'),
(4, 4, '', 'Tips for life skills', 'Basic skills', '', 'https://www.youtube.com/watch?v=GOfAqfzGqhk&ab_channel=BuzzFeedNifty'),
(5, 5, '', 'Digital art for beginners', 'Arts', '', 'https://www.youtube.com/watch?v=iwRa5qTnr8o'),
(6, 6, '', 'Upgrade water system', 'Survival skills', '', 'https://www.youtube.com/watch?v=F1GtNSKpCzg&ab_channel=PrimitiveSkills'),
(7, 7, '', 'How to control fear before and during the fight', 'Martial Arts', '', 'https://www.youtube.com/watch?v=03nXRY8JevI'),
(8, 8, '', 'Tips and tricks for beginner plumbers', 'Basic skills', '', 'https://www.youtube.com/watch?v=LbtKUY77UPs'),
(9, 9, '', 'Tips for character design', 'Arts', '', 'https://www.youtube.com/watch?v=v6lPsEPOIkM'),
(10, 10, '', 'How to defend yourself when someone pushing you', 'Martial Arts', '', 'https://www.youtube.com/watch?v=XARIQt1Z20M');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `classroom_id` int NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `User_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `Email` text COLLATE utf8mb4_general_ci NOT NULL,
  `hash` text COLLATE utf8mb4_general_ci NOT NULL,
  `Avatar` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(7, 'Joseph Joestar', 'bestjojo@gmail.com', '$2y$10$21nE4PEq.nlmqDPirpedeeZfWYBtwRh3zzzdKIks/JL6wewBzg5ma', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
