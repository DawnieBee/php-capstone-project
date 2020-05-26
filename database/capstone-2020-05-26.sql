-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 05:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

DROP TABLE IF EXISTS `baskets`;
CREATE TABLE `baskets` (
  `basket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`basket_id`, `user_id`, `title`, `date_created`) VALUES
(1, 1, 'west area', '2020-04-19 10:16:26'),
(2, 1, 'South area', '2020-04-19 10:16:59'),
(3, 4, 'best areas', '2020-04-19 10:18:02'),
(4, 4, 'crappy areas', '2020-04-19 10:18:26'),
(5, 2, 'cheapest', '2020-04-19 10:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `baskets_neighborhoods`
--

DROP TABLE IF EXISTS `baskets_neighborhoods`;
CREATE TABLE `baskets_neighborhoods` (
  `basket_id` int(11) DEFAULT NULL,
  `hood_id` int(11) DEFAULT NULL,
  `list_items` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baskets_neighborhoods`
--

INSERT INTO `baskets_neighborhoods` (`basket_id`, `hood_id`, `list_items`) VALUES
(4, 14, NULL),
(4, 20, NULL),
(4, 7, NULL),
(5, 2, NULL),
(1, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `neighborhoods`
--

DROP TABLE IF EXISTS `neighborhoods`;
CREATE TABLE `neighborhoods` (
  `hood_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `rating_scale` tinyint(1) DEFAULT NULL,
  `police_station` enum('yes','no') DEFAULT NULL,
  `fire_station` enum('yes','no') DEFAULT NULL,
  `library` enum('yes','no') DEFAULT NULL,
  `pool` enum('yes','no') DEFAULT NULL,
  `prim_schools` int(11) DEFAULT NULL,
  `sec_schools` int(11) DEFAULT NULL,
  `churches` int(11) DEFAULT NULL,
  `playgrounds` int(11) DEFAULT NULL,
  `comm_centres` varchar(255) DEFAULT NULL,
  `house_price_min` decimal(8,2) DEFAULT NULL,
  `house_price_max` decimal(9,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `neighborhoods`
--

INSERT INTO `neighborhoods` (`hood_id`, `name`, `location`, `description`, `rating_scale`, `police_station`, `fire_station`, `library`, `pool`, `prim_schools`, `sec_schools`, `churches`, `playgrounds`, `comm_centres`, `house_price_min`, `house_price_max`, `created_at`, `updated_at`, `img`) VALUES
(1, 'Old Kildonan', 'north', 'lorem ipsum', 8, 'yes', 'yes', 'yes', 'yes', 20, 3, 20, 22, 'Maples CC, Garden City CC', '198000.00', '400000.00', '2020-04-18 14:08:09', NULL, 'old_kildonan.png'),
(2, 'Point Douglas', 'north', 'lorem ipsum', 2, 'no', 'yes', 'yes', 'yes', 17, 1, 34, 10, 'Tyndal Park CC, Northwood CC, Sinclair Park CC', '98000.00', '290000.00', '2020-04-18 14:50:01', '2020-04-18 14:50:01', 'st_jameshex.png'),
(3, 'Mynarski', 'north', 'lorem ipsum', 5, 'no', 'yes', 'yes', 'no', 15, 2, 17, 3, 'Norquay, Sinclair Park', '65000.00', '360000.00', '2020-04-19 07:36:51', NULL, 'st_jameshex.png'),
(4, 'Downtown', 'central', 'Nestled in the heart of Winnipeg, walking distance to The Forks Historical Site and St Boniface.  Walk through the Exchange District and marvel at the architecture from days gone by.  Downtown is a vibrant community with plenty of food, drink, and entertainment.', 4, 'yes', 'yes', 'yes', 'yes', 12, 2, 33, 4, 'Burton Cummings, Freighthouse', '54000.00', '399000.00', '2020-04-19 07:39:40', NULL, 'downtownhex.png'),
(5, 'North Kildonan', 'north east', 'lorem ipsum', 6, 'no', 'yes', 'yes', 'no', 11, 1, 15, 9, 'Gateway, North Kildonan', '120000.00', '750000.00', '2020-04-19 07:41:40', NULL, 'st_jameshex.png'),
(6, 'East Kildonan', 'north east', 'lorem ipsum', 6, 'no', 'yes', 'yes', 'yes', 12, 2, 7, 6, 'Bronx, Melrose, Morse Place', '115000.00', '470000.00', '2020-04-19 07:43:36', NULL, 'st_jameshex.png'),
(7, 'Elmwood', 'north east', 'Found in the northeast end of the city, over the Disraeli Bridge.  Elmwood runs along Henderson Hwy and the Red River. You will find plenty of churches and community centers in this neighborhood', 3, 'no', 'yes', 'no', 'no', 5, 2, 16, 4, 'Chalmers, East Elmwood', '94000.00', '350000.00', '2020-04-19 07:45:51', NULL, 'elmwoodhex.png'),
(8, 'Transcona', 'east', 'Transcona is located in the east end of Winnipeg, on Regent Ave.  It is considered a great place to raise a family.  Every summer, Transcona hosts the Hi Neighbour Festival, where residents gather at a family carnival set right on the main street!  Better love flamingos if you want to live here!', 7, 'yes', 'yes', 'yes', 'yes', 14, 2, 20, 9, 'Park City West, Oxford Heights, East End', '115000.00', '595000.00', '2020-04-19 07:47:27', NULL, 'transconahex.png'),
(9, 'St Boniface', 'south east', 'Viva la Francais!  St Boniface is home to Winnipeg\'s francophone community, the St Boniface Hospital, Louis Riel\'s home, and the French University. The beautiful basilica on Tache is a prime spot for wedding photos.  Come find your joie de vivre in historic St Boniface!', 5, 'no', 'yes', 'yes', 'yes', 10, 2, 21, 12, 'Notre Dame, Norwood, Archwood, Winakwa', '160000.00', '725000.00', '2020-04-19 07:49:29', NULL, 'stbonifacehex.png'),
(10, 'Ft Rouge', 'south west', 'lorem ipsum', NULL, 'no', 'yes', 'yes', 'no', 7, 1, 11, 10, 'River Osborne, Earl Grey, Lord Roberts, Riverview', '99000.00', '509000.00', '2020-04-19 07:51:25', NULL, 'st_jameshex.png'),
(11, 'Ft Garry', 'south', 'lorem ipsum', 9, 'no', 'yes', 'yes', 'yes', 11, 3, 24, 18, 'Fort Garry, Westridge, Richmond Kings', '179000.00', '680000.00', '2020-04-19 08:22:16', NULL, 'st_jameshex.png'),
(12, 'River Heights', 'south west', 'lorem ipsum', 6, 'no', 'yes', 'yes', 'yes', 11, 1, 8, 7, 'Crescentwood, River Heights, Crescentwood', '130000.00', '1999000.00', '2020-04-19 08:28:24', NULL, 'st_jameshex.png'),
(13, 'St Vital', 'south east', 'lorem ipsum', NULL, 'no', 'yes', 'yes', 'yes', 12, 2, 24, 17, 'Southdale, Dakota, Greendell', '109000.00', '999000.00', '2020-04-19 08:31:01', NULL, 'st_jameshex.png'),
(14, 'St Norbert', 'south', 'lorem ipsum', NULL, 'no', 'no', 'no', 'no', 3, 1, 4, 2, 'St Norbert CC', '195000.00', '1000000.00', '2020-04-19 08:33:45', NULL, 'st_jameshex.png'),
(15, 'Whyte Ridge', 'south west', 'lorem ipsum', 9, 'no', 'yes', 'no', 'no', 2, 0, 3, 1, 'Whyteridge, Waverly Heights', '400000.00', '1001000.00', '2020-04-19 08:35:43', NULL, 'st_jameshex.png'),
(16, 'Tuxedo', 'south west', 'Old Tuxedo, home of beautiful mansion style houses', 8, 'yes', 'no', 'no', 'no', 2, 2, 3, 3, 'Tuxedo CC', '150000.00', '2200000.00', '2020-04-19 08:37:20', NULL, 'Tuxedohex.png'),
(17, 'Charleswood', 'south west', 'lorem ipsum', NULL, 'no', 'yes', 'yes', 'no', 8, 1, 9, 15, 'Roblin Park, Varsity View, Westdale', '159000.00', '1280000.00', '2020-04-19 08:39:08', NULL, 'st_jameshex.png'),
(18, 'St Charles', 'west', 'lorem ipsum', NULL, 'no', 'yes', 'yes', 'no', 7, 3, 14, 7, 'Kirkfield, Assiniboia, Heritage', '119000.00', '700000.00', '2020-04-19 08:40:46', NULL, 'st_jameshex.png'),
(19, 'St James', 'west', 'lorem ipsum', NULL, 'no', 'yes', 'yes', 'yes', 9, 3, 18, 11, 'Woodhaven, Sturgeon Heights, Deer Lodge', '105000.00', '988800.00', '2020-04-19 08:42:43', NULL, 'st_jameshex.png'),
(20, 'Brooklands-Weston', 'north west', 'lorem ipsum', 4, 'no', 'yes', 'no', 'yes', 10, 3, 17, 7, 'Valour, Weston Memorial', '54000.00', '190000.00', '2020-04-19 08:44:17', NULL, 'westonhex.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `postal_code` varchar(6) NOT NULL,
  `country` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `city`, `province`, `postal_code`, `country`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Dawn', 'Biggs', 'db@mail.com', '2041234567', '123 Any Ave W', 'Winnipeg', 'MB', 'R3E1B6', 'Canada', '$2y$10$mN/2uH3KnSUUYJTmSzsQZ.NQKMfLLiSnKfP8O48qptKCcOeg10ocK', '2020-05-10 18:04:34', '2020-05-10 18:04:34'),
(2, 'Vikki', 'Biggs', 'vb@mail.com', '2041235697', '123 any st', 'Winnipeg', 'Manitoba', 'R1A1A1', 'Canada', '$2y$10$EEgr8i34eB7pW0u4sb8CgelNTIIBVY1.D1zLHmLpXBN4pmTjzv5r6', '2020-05-10 18:08:39', '2020-05-10 18:08:39'),
(3, 'Drae', 'Biggs', 'drae@email.com', '1235698745', '12 My Home St', 'Winnipeg', 'Manitoba', 'R1B1B1', 'Canada', '$2y$10$oOHUXUm0lmow3d4Vx4jGSeek4EjhyRmkd0c9H6zAfsUmAZrbcNLvi', '2020-05-10 18:58:15', '2020-05-10 18:58:15'),
(4, 'John', 'Doe', 'jdoe@mail.com', '204-565-5566', '111 My St', 'Winnipeg', 'Manitoba', 'R1A1A1', 'Canada', '$2y$10$PoUy6PdIDGoBSy3VcXBlPuSs5kcDaEPq0sy2Kd7Rhvp5C/BsZE34W', '2020-05-20 08:36:34', '2020-05-20 08:36:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`basket_id`);

--
-- Indexes for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  ADD PRIMARY KEY (`hood_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  MODIFY `hood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
