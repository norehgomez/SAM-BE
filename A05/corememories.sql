-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 04:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corememories`
--

-- --------------------------------------------------------

--
-- Table structure for table `islandcontents`
--

CREATE TABLE `islandcontents` (
  `islandContentID` int(4) NOT NULL,
  `islandOfPersonalityID` int(4) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `content` varchar(300) NOT NULL,
  `color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandcontents`
--

INSERT INTO `islandcontents` (`islandContentID`, `islandOfPersonalityID`, `image`, `content`, `color`) VALUES
(4, 1, 'holiday_gathering.png', 'Celebrating the holidays with family traditions.', '#FFD700'),
(5, 1, 'picnic_park.png', 'A sunny day picnic at the park with the family.', '#FFD700'),
(6, 1, 'birthday_party.png', 'Grandma’s surprise 70th birthday celebration.', '#FFD700'),
(7, 1, 'family_game_night.png', 'Weekly family game night filled with laughter.', '#FFD700'),
(8, 2, 'camping_trip.png', 'Camping under the stars with best friends.', '#87CEEB'),
(9, 2, 'movie_marathon.png', 'All-night movie marathon at a friend’s house.', '#87CEEB'),
(10, 2, 'friendship_reunion.png', 'Reunion dinner with old school friends.', '#87CEEB'),
(11, 2, 'concert_together.png', 'Attending a music concert with close friends.', '#87CEEB'),
(12, 3, 'desert_safari.png', 'Exploring the desert dunes on a thrilling safari.', '#32CD32'),
(13, 3, 'skydiving_experience.png', 'Skydiving for the first time - a breathtaking adventure.', '#32CD32'),
(14, 3, 'scuba_diving.png', 'Diving into the deep blue sea and discovering marine life.', '#32CD32'),
(15, 3, 'road_trip.png', 'Cross-country road trip full of unexpected surprises.', '#32CD32'),
(16, 4, 'painting_session.png', 'Creating a masterpiece during a painting session.', '#FF4500'),
(17, 4, 'baking_cookies.png', 'Baking cookies for the first time - a sweet success.', '#FF4500'),
(18, 4, 'guitar_practice.png', 'Learning to play a favorite song on the guitar.', '#FF4500'),
(19, 4, 'garden_work.png', 'Planting flowers in the backyard garden.', '#FF4500');

-- --------------------------------------------------------

--
-- Table structure for table `islandsofpersonality`
--

CREATE TABLE `islandsofpersonality` (
  `islandOfPersonalityID` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `shortDescription` varchar(300) DEFAULT NULL,
  `longDescription` varchar(900) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandsofpersonality`
--

INSERT INTO `islandsofpersonality` (`islandOfPersonalityID`, `name`, `shortDescription`, `longDescription`, `color`, `image`, `status`) VALUES
(1, 'Family Island', 'A place for family memories.', 'This island represents the core memories associated with family, including love, support, and togetherness.', '#FFD700', 'family_island.png', 'active'),
(2, 'Friendship Island', 'A place for friendships.', 'This island symbolizes the bonds of friendship, laughter, and shared moments.', '#87CEEB', 'friendship_island.png', 'active'),
(3, 'Adventure Island', 'A place for adventures.', 'This island is about thrilling experiences, exploration, and the pursuit of the unknown.', '#32CD32', 'adventure_island.png', 'active'),
(4, 'Hobby Island', 'A place for hobbies.', 'This island focuses on personal interests and hobbies that bring joy and satisfaction.', '#FF4500', 'hobby_island.png', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `islandcontents`
--
ALTER TABLE `islandcontents`
  ADD PRIMARY KEY (`islandContentID`);

--
-- Indexes for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  ADD PRIMARY KEY (`islandOfPersonalityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `islandcontents`
--
ALTER TABLE `islandcontents`
  MODIFY `islandContentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
