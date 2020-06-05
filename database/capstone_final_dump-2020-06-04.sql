-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 04:44 AM
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
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`basket_id`, `user_id`, `first_name`, `last_name`, `email`, `created_at`, `updated_at`, `deleted`) VALUES
(20, 2, 'Vikki', 'Biggs', 'vb@mail.com', '2020-06-01 13:23:37', '2020-06-01 13:23:37', 0),
(21, 2, 'Vikki', 'Biggs', 'vb@mail.com', '2020-06-01 13:24:06', '2020-06-01 13:24:06', 0),
(22, 2, 'Vikki', 'Biggs', 'vb@mail.com', '2020-06-01 13:24:45', '2020-06-01 13:24:45', 0),
(23, 2, 'Vikki', 'Biggs', 'vb@mail.com', '2020-06-01 13:28:57', '2020-06-01 13:28:57', 0),
(25, 2, 'Vikki', 'Biggs', 'vb@mail.com', '2020-06-01 13:34:46', '2020-06-01 13:34:46', 0),
(26, 1, 'Dawn', 'Biggs', 'db@mail.com', '2020-06-01 14:17:03', '2020-06-01 14:17:03', 0),
(29, 3, 'Drae', 'Biggs', 'drae@email.com', '2020-06-01 21:41:49', NULL, 0),
(30, 3, 'Drae', 'Biggs', 'drae@email.com', '2020-06-02 13:03:15', NULL, 0),
(31, 4, 'John', 'Doe', 'jdoe@mail.com', '2020-06-02 22:15:56', NULL, 0),
(32, 4, 'John', 'Doe', 'jdoe@mail.com', '2020-06-02 22:18:17', NULL, 0),
(33, 5, 'Alice', 'Wonder', 'alice@mail.com', '2020-06-03 14:08:49', NULL, 0),
(34, 5, 'Alice', 'Wonder', 'alice@mail.com', '2020-06-03 18:47:39', NULL, 0),
(35, 5, 'Alice', 'Wonder', 'alice@mail.com', '2020-06-03 19:02:02', '2020-06-04 13:43:08', 1),
(36, 5, 'Alice', 'Wonder', 'alice@mail.com', '2020-06-03 19:07:29', NULL, 0),
(37, 5, 'Alice', 'Wonder', 'alice@mail.com', '2020-06-03 19:08:25', NULL, 0),
(38, 5, 'Alice', 'Wonder', 'alice@mail.com', '2020-06-03 19:09:32', '2020-06-04 13:49:01', 1),
(39, 5, 'Alice', 'Wonder', 'alice@mail.com', '2020-06-03 22:31:49', '2020-06-04 13:48:20', 1),
(40, 1, 'Dawn', 'Biggs', 'db@mail.com', '2020-06-04 10:13:58', NULL, 0),
(41, 1, 'Dawn', 'Biggs', 'db@mail.com', '2020-06-04 12:16:34', '2020-06-04 12:52:10', 1),
(42, 1, 'Dawn', 'Biggs', 'db@mail.com', '2020-06-04 17:26:05', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `baskets_neighborhoods`
--

DROP TABLE IF EXISTS `baskets_neighborhoods`;
CREATE TABLE `baskets_neighborhoods` (
  `basket_id` int(11) DEFAULT NULL,
  `hood_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `rating_scale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baskets_neighborhoods`
--

INSERT INTO `baskets_neighborhoods` (`basket_id`, `hood_id`, `name`, `location`, `rating_scale`) VALUES
(26, 1, 'Old Kildonan', 'north', 8),
(26, 5, 'North Kildonan', 'north east', 6),
(26, 9, 'St Boniface', 'south east', 5),
(27, 3, 'Mynarski', 'north', 5),
(27, 12, 'River Heights', 'south west', 6),
(27, 13, 'St Vital', 'south east', 6),
(28, 14, 'St Norbert', 'south', 5),
(28, 19, 'St James', 'west', 6),
(29, 1, 'Old Kildonan', 'north', 8),
(30, 1, 'Old Kildonan', 'north', 8),
(30, 4, 'Downtown', 'central', 4),
(31, 9, 'St Boniface', 'south east', 5),
(31, 8, 'Transcona', 'east', 7),
(31, 18, 'St Charles', 'west', 8),
(32, 1, 'Old Kildonan', 'north', 8),
(32, 2, 'Point Douglas', 'north', 2),
(32, 7, 'Elmwood', 'north east', 3),
(33, 1, 'Old Kildonan', 'north', 8),
(33, 2, 'Point Douglas', 'north', 2),
(33, 7, 'Elmwood', 'north east', 3),
(34, 1, 'Old Kildonan', 'north', 8),
(35, 1, 'Old Kildonan', 'north', 8),
(36, 1, 'Old Kildonan', 'north', 8),
(37, 1, 'Old Kildonan', 'north', 8),
(38, 1, 'Old Kildonan', 'north', 8),
(39, 2, 'Point Douglas', 'north', 2),
(40, 3, 'Mynarski', 'north', 5),
(41, 2, 'Point Douglas', 'north', 2),
(41, 6, 'East Kildonan', 'north east', 6),
(42, 17, 'Charleswood', 'south west', 9);

-- --------------------------------------------------------

--
-- Table structure for table `neighborhoods`
--

DROP TABLE IF EXISTS `neighborhoods`;
CREATE TABLE `neighborhoods` (
  `hood_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `loc_code` char(3) DEFAULT NULL,
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
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) DEFAULT 0,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `neighborhoods`
--

INSERT INTO `neighborhoods` (`hood_id`, `name`, `location`, `loc_code`, `description`, `rating_scale`, `police_station`, `fire_station`, `library`, `pool`, `prim_schools`, `sec_schools`, `churches`, `playgrounds`, `comm_centres`, `house_price_min`, `house_price_max`, `created_at`, `updated_at`, `deleted`, `img`) VALUES
(1, 'Old Kildonan', 'north', 'R2P', 'Old Kildonan is a former municipality and city ward of Winnipeg, Manitoba. Nice place to live.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur ullam autem dicta voluptate dignissimos reiciendis quasi, eos culpa, tempora.', 8, 'yes', 'yes', 'yes', 'yes', 20, 4, 20, 22, 'Maples CC, Garden City CC', '198000.00', '400000.00', '2020-04-18 14:08:09', '2020-06-04 17:18:56', 0, 'oldkildonan.jpg'),
(2, 'Point Douglas', 'north', 'R2L', 'Point Douglas comprises the northern portion of a peninsula of the Red River. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur ullam autem dicta voluptate dignissimos reiciendis quasi, eos culpa, tempora.', 2, 'no', 'yes', 'yes', 'yes', 17, 1, 34, 10, 'Tyndal Park CC, Northwood CC, Sinclair Park CC', '98000.00', '290000.00', '2020-04-18 14:50:01', '2020-06-04 17:19:44', 0, 'pointdouglas.jpg'),
(3, 'Mynarski', 'north', 'R2W', 'Mynarski, which absorbed the Point Douglas ward neighbourhoods of Mynarski and Robertson as well as the Dufferin neighbourhood Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur ', 5, 'no', 'yes', 'yes', 'no', 15, 2, 17, 3, 'Norquay, Sinclair Park', '65000.00', '360000.00', '2020-04-19 07:36:51', '2020-06-04 17:20:12', 0, 'mynarski.jpg'),
(4, 'Downtown', 'central', 'R3A', 'Nestled in the heart of Winnipeg, walking distance to The Forks Historical Site and St Boniface.  Walk through the Exchange District and marvel at the architecture from days gone by.  Downtown is a vibrant community with plenty of food, drink, and entertainment.', 4, 'yes', 'yes', 'yes', 'yes', 12, 2, 33, 4, 'Burton Cummings, Freighthouse', '54000.00', '399000.00', '2020-04-19 07:39:40', '2020-06-04 17:20:29', 0, 'downtown.jpg'),
(5, 'North Kildonan', 'north east', 'R2G', 'North Kildonan is home to many green spaces, the largest of which is Kilcona Park, located on Springfield Avenue east of Lagimodiere Boulevard. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur .', 6, 'no', 'yes', 'yes', 'no', 11, 1, 15, 9, 'Gateway, North Kildonan', '120000.00', '750000.00', '2020-04-19 07:41:40', '2020-06-04 17:20:54', 0, 'northkildonan.jpg'),
(6, 'East Kildonan', 'north east', 'R3W', 'East Kildonan is a primarily residential community in Winnipeg, Manitoba, Canada, located in the northeast part of the city. Commonly known by its initials \"E. K.\" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur .', 6, 'no', 'yes', 'yes', 'yes', 12, 2, 7, 6, 'Bronx, Melrose, Morse Place', '115000.00', '470000.00', '2020-04-19 07:43:36', '2020-06-04 17:21:15', 0, 'ekildonan.jpg'),
(7, 'Elmwood', 'north east', 'R2L', 'Found in the northeast end of the city, over the Disraeli Bridge.  Elmwood runs along Henderson Hwy and the Red River. You will find plenty of churches and community centers in this neighborhood', 3, 'no', 'yes', 'no', 'no', 5, 2, 16, 4, 'Chalmers, East Elmwood', '94000.00', '350000.00', '2020-04-19 07:45:51', '2020-06-04 17:21:36', 0, 'elmwood.jpg'),
(8, 'Transcona', 'east', 'R2C', 'Transcona is located in the east end of Winnipeg, on Regent Ave.  It is considered a great place to raise a family.  Every summer, Transcona hosts the Hi Neighbour Festival, where residents gather at a family carnival set right on the main street!  Better love flamingos if you want to live here!', 7, 'yes', 'yes', 'yes', 'yes', 14, 2, 20, 9, 'Park City West, Oxford Heights, East End', '115000.00', '595000.00', '2020-04-19 07:47:27', '2020-06-04 17:21:48', 0, 'transcona.jpg'),
(9, 'St Boniface', 'south east', 'R2J', 'Viva la Francais!  St Boniface is home to Winnipeg\'s francophone community, the St Boniface Hospital, Louis Riel\'s home, and the French University. The beautiful basilica on Tache is a prime spot for wedding photos.  Come find your joie de vivre in historic St Boniface!', 5, 'no', 'yes', 'yes', 'yes', 10, 2, 21, 12, 'Notre Dame, Norwood, Archwood, Winakwa', '160000.00', '725000.00', '2020-04-19 07:49:29', '2020-06-04 17:22:09', 0, 'stboniface.jpg'),
(10, 'Ft Rouge', 'south west', 'R3L', 'Located in the south-central part of the city, it is bounded on the north by the Assiniboine River, on the east and south by the Red River, and on the west by Stafford Street and Pembina Highway. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur .', 5, 'no', 'yes', 'yes', 'no', 7, 1, 11, 10, 'River Osborne, Earl Grey, Lord Roberts, Riverview', '99000.00', '509000.00', '2020-04-19 07:51:25', '2020-06-04 17:22:29', 0, 'ftrouge.jpg'),
(11, 'Ft Garry', 'south', 'R3T', 'Fort Garry is a district of the Canadian city of Winnipeg, Manitoba, located in the southwestern part of the city south of the district of Fort Rouge and east of the former town of Tuxedo. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 9, 'no', 'yes', 'yes', 'yes', 11, 3, 24, 18, 'Fort Garry, Westridge, Richmond Kings', '179000.00', '680000.00', '2020-04-19 08:22:16', '2020-06-04 17:22:46', 0, 'ftgarry.jpg'),
(12, 'River Heights', 'south west', 'R3M', 'River Heights is a community area in Winnipeg, Manitoba. It is located south of the Assiniboine River, west of Fort Rouge at Stafford Street Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 6, 'no', 'yes', 'yes', 'yes', 11, 1, 8, 7, 'Crescentwood, River Heights, Crescentwood', '130000.00', '1999000.00', '2020-04-19 08:28:24', '2020-06-04 17:23:05', 0, 'riverheights.jpg'),
(13, 'St Vital', 'south east', 'R2N', 'Located in the south-central part of the city, it is bounded on the north by Carriere Avenue, on the south by the northern limit of the Rural Municipality of Ritchot Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 6, 'no', 'yes', 'yes', 'yes', 12, 2, 24, 17, 'Southdale, Dakota, Greendell', '109000.00', '999000.00', '2020-04-19 08:31:01', '2020-06-04 18:32:18', 0, 'stvital.jpg'),
(14, 'St Norbert', 'south', 'R3V', 'St. Norbert (French: Saint-Norbert) is a bilingual (French and English) neighbourhood in the southernmost part of Winnipeg, Manitoba, Canada. While outside the Perimeter Highway, (the orbital road that surrounds most of Winnipeg), it is still part of the city.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 5, 'no', 'no', 'no', 'no', 3, 1, 4, 2, 'St Norbert CC', '195000.00', '1000000.00', '2020-04-19 08:33:45', '2020-06-04 17:23:36', 0, 'stnorbert.jpg'),
(15, 'Whyte Ridge', 'south west', 'R3Y', 'Whyte Ridge is a residential subdivision in the southwest corner of the city of Winnipeg, Manitoba, Canada. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur', 9, 'no', 'yes', 'no', 'no', 2, 1, 3, 1, 'Whyteridge, Waverly Heights', '400000.00', '1001000.00', '2020-04-19 08:35:43', '2020-06-04 17:23:54', 0, 'whyteridge.jpg'),
(16, 'Tuxedo', 'south west', 'R3P', 'Old Tuxedo, home of beautiful mansion style houses  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 8, 'yes', 'no', 'no', 'no', 2, 2, 3, 3, 'Tuxedo CC', '150000.00', '2200000.00', '2020-04-19 08:37:20', '2020-06-04 17:24:20', 0, 'tuxedo.jpg'),
(17, 'Charleswood', 'south west', 'R3R', 'Until it joined with the City of Winnipeg in 1972 Charleswood was a separate municipality known as the Rural Municipality of Charleswood.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 9, 'no', 'yes', 'yes', 'no', 8, 1, 9, 15, 'Roblin Park, Varsity View, Westdale', '159000.00', '1280000.00', '2020-04-19 08:39:08', '2020-06-04 17:24:38', 0, 'charleswood.jpg'),
(18, 'St Charles', 'west', 'R3K', 'St. Charles has catered to the world\'s finest golfers, royalty, dignitaries of state and government, and the humble member who pays their dues.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 8, 'no', 'yes', 'yes', 'no', 7, 3, 14, 7, 'Kirkfield, Assiniboia, Heritage', '119000.00', '700000.00', '2020-04-19 08:40:46', '2020-06-04 17:24:53', 0, 'stcharles.jpg'),
(19, 'St James', 'west', 'R3J', 'St. James-Assiniboia is a large community in the western section of Winnipeg. It is most often referred to as simply \"St. James\" and consists of the neighbourhoods of Old St. James, Deer Lodge, Silver Heights, Birchwood, Sturgeon Creek, Woodhaven, Heritage Park, Kirkfield Park, Westwood, Crestview, St. Charles, and Brooklands.', 6, 'no', 'yes', 'yes', 'yes', 9, 3, 18, 11, 'Woodhaven, Sturgeon Heights, Deer Lodge', '105000.00', '988800.00', '2020-04-19 08:42:43', '2020-06-04 17:25:14', 0, 'stjames.jpg'),
(20, 'Brooklands-Weston', 'north west', 'R3E', 'Brooklands Weston comprised of older homes west of McPhillips Street Station. Most of the residents were employed by the CPR’s Weston yards and shop. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 2, 'no', 'yes', 'no', 'yes', 10, 3, 17, 7, 'Valour, Weston Memorial', '54000.00', '190000.00', '2020-04-19 08:44:17', '2020-06-04 17:25:32', 0, 'westbrook.jpg'),
(31, 'fake hood', 'east', NULL, ';agjal;ngbal;\'sdba', 4, 'yes', 'yes', 'yes', 'yes', 20, 3, 19, 22, 'Notre Dame, Norwood, Archwood, Winakwa', '1900.00', '725000.00', '2020-06-03 11:45:25', '2020-06-03 11:46:08', 1, 'st_jameshex.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `is_admin` tinyint(4) DEFAULT 0,
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
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `is_admin`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `city`, `province`, `postal_code`, `country`, `password`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 'Dawn', 'Biggs', 'db@mail.com', '2041234567', '123 Any Ave W', 'Winnipeg', 'MB', 'R3E1B6', 'Canada', '$2y$10$mN/2uH3KnSUUYJTmSzsQZ.NQKMfLLiSnKfP8O48qptKCcOeg10ocK', '2020-05-10 18:04:34', '2020-06-03 10:44:58', 0),
(2, 0, 'Vikki', 'Biggs', 'vb@mail.com', '2041235697', '123 any st', 'Winnipeg', 'Manitoba', 'R1A1A1', 'Canada', '$2y$10$EEgr8i34eB7pW0u4sb8CgelNTIIBVY1.D1zLHmLpXBN4pmTjzv5r6', '2020-05-10 18:08:39', '2020-05-10 18:08:39', 0),
(3, 0, 'Drae', 'Biggs', 'drae@email.com', '1235698745', '12 My Home St', 'Winnipeg', 'Manitoba', 'R1B1B1', 'Canada', '$2y$10$oOHUXUm0lmow3d4Vx4jGSeek4EjhyRmkd0c9H6zAfsUmAZrbcNLvi', '2020-05-10 18:58:15', '2020-05-10 18:58:15', 0),
(4, 0, 'John', 'Doe', 'jdoe@mail.com', '204-565-5566', '111 My St', 'Winnipeg', 'Manitoba', 'R1A1A1', 'Canada', '$2y$10$PoUy6PdIDGoBSy3VcXBlPuSs5kcDaEPq0sy2Kd7Rhvp5C/BsZE34W', '2020-05-20 08:36:34', '2020-05-20 08:36:34', 0),
(5, 0, 'Alice', 'Wonder', 'alice@mail.com', '2041112222', '12 My St', 'Winnipeg', 'Manitoba', 'r3r3r3', 'Canada', '$2y$10$BmBm6rlWx3AZVHeDxlG1GurOn9tmuol0fBQ.YJHpNiHqIuLrPB5pC', '2020-06-03 14:07:01', '2020-06-03 14:07:01', 0),
(6, 0, 'baby', 'cakes', 'doyou@mail.ca', '1234569874', '2 my street', 'winnipeg', 'mb', 'r1a1a1', 'Canada', '$2y$10$XzcfL0oR/np9Jn1OJJC2j.tHPCS1vR0LMsf04KwMtWVRg4IH2btVy', '2020-06-03 21:41:48', '2020-06-03 21:41:48', 0),
(8, 0, 'John', 'Boy', 'jbwalton@mail.com', '1112225566', '123 Walton Mountain', 'Television', 'MB', 'r1a1a1', 'Canada', '$2y$10$sBbh2iW636VRXMAS/gB/uuZdya0vns2nkEYR60Cva9r1PiSvbW49.', '2020-06-03 21:46:19', '2020-06-03 21:46:19', 0);

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
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  MODIFY `hood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
