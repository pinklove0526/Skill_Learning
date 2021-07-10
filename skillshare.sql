-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2021 at 02:05 PM
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
  `class_type` text NOT NULL,
  `info` text NOT NULL,
  `class_name` text NOT NULL,
  `video` text NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`class_id`, `class_type`, `info`, `class_name`, `video`) VALUES
(1, 'Martial arts', 'Learn to fight like Bruce Lee !!!', 'Fighting 101\r\n', 'https://www.youtube.com/embed/y9PkOR7kCrQ'),
(2, 'Arts', 'Shading makes your character look better', 'Draw anime 101', 'https://www.youtube.com/embed/ZJkIaMECW6c'),
(3, 'Survival skills', 'Learn to survive in the wild', 'Live like Bear Grylls', 'https://www.youtube.com/embed/fZndJO2jUJk'),
(4, 'Basic skills', 'Tips for life skills', 'How to basic', 'https://www.youtube.com/embed/GOfAqfzGqhk'),
(5, 'Arts', 'Digital art for beginners', 'Digital Arts', 'https://www.youtube.com/embed/iwRa5qTnr8o'),
(6, 'Survival skills', 'Upgrade water system', 'Better hygiene, better life', 'https://www.youtube.com/embed/F1GtNSKpCzg'),
(7, 'Martial Arts', 'How to control fear before and during the fight', 'Self denfence', 'https://www.youtube.com/embed/03nXRY8JevI'),
(8, 'Basic skills', 'Tips and tricks for beginner plumbers', 'Be a great plumber with Johnny Sins', 'https://www.youtube.com/embed/LbtKUY77UPs'),
(9, 'Arts', 'Tips for character design', 'Design characters', 'https://www.youtube.com/embed/v6lPsEPOIkM'),
(10, 'Martial Arts', 'How to defend yourself when someone pushing you', 'Make your life safe', 'https://www.youtube.com/embed/XARIQt1Z20M'),
(20, 'martial arts', 'asdfadsf', 'fsadfasdf', 'videos/60e96eb86f9db.mp4'),
(19, 'martial arts', 'dsafsdfasdfsd', 'fsadfasdfasdf', 'videos/60e96bb6d0b97.mp4'),
(18, 'martial arts', 'fasdfsdfsdfasdf', 'fasdfsdfads', 'videos/60e96b748c6c8.mp4'),
(17, 'martial arts', 'dfasdfsdaf', 'fsdfas', 'videos/60e96b4401e3e.mp4'),
(21, 'Basic skills', 'Tips for life skills', '', 'https://www.youtube.com/embed/GOfAqfzGqhk'),
(22, 'Basic skills', 'Tips for life skills', '', 'https://www.youtube.com/embed/GOfAqfzGqhk'),
(23, 'Basic skills', 'Tips for life skills', '', 'https://www.youtube.com/embed/GOfAqfzGqhk');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `classroom_id` int NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `User_name` text NOT NULL,
  `Email` text NOT NULL,
  `hash` text NOT NULL,
  `Avatar` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(11, 'baolong', 'klasfhsjkld@gmail.com', '$2y$10$TIOJqRCuBRM9ruIgxLBnweu3zYCT16.EB/v0b0Kb1azbmH4/5wlBq', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
