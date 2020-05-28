-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 11:28 PM
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
  `user_first_name` varchar(255) DEFAULT NULL,
  `user_last_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`basket_id`, `user_id`, `user_first_name`, `user_last_name`, `user_email`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, 'west area', '2020-04-19 10:16:26', '2020-05-28 00:38:52'),
(2, 1, NULL, NULL, NULL, 'South area', '2020-04-19 10:16:59', '2020-05-28 00:38:52'),
(3, 4, NULL, NULL, NULL, 'best areas', '2020-04-19 10:18:02', '2020-05-28 00:38:52'),
(4, 4, NULL, NULL, NULL, 'crappy areas', '2020-04-19 10:18:26', '2020-05-28 00:38:52'),
(5, 2, NULL, NULL, NULL, 'cheapest', '2020-04-19 10:19:02', '2020-05-28 00:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `baskets_neighborhoods`
--

DROP TABLE IF EXISTS `baskets_neighborhoods`;
CREATE TABLE `baskets_neighborhoods` (
  `basket_id` int(11) DEFAULT NULL,
  `hood_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baskets_neighborhoods`
--

INSERT INTO `baskets_neighborhoods` (`basket_id`, `hood_id`, `name`) VALUES
(4, 14, ''),
(4, 20, ''),
(4, 7, ''),
(5, 2, ''),
(1, 11, '');

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
  `updated_at` datetime DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `neighborhoods`
--

INSERT INTO `neighborhoods` (`hood_id`, `name`, `location`, `loc_code`, `description`, `rating_scale`, `police_station`, `fire_station`, `library`, `pool`, `prim_schools`, `sec_schools`, `churches`, `playgrounds`, `comm_centres`, `house_price_min`, `house_price_max`, `created_at`, `updated_at`, `img`) VALUES
(1, 'Old Kildonan', 'north', NULL, 'Old Kildonan is a former municipality and city ward of Winnipeg, Manitoba. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur ullam autem dicta voluptate dignissimos reiciendis quasi, eos culpa, tempora.', 8, 'yes', 'yes', 'yes', 'yes', 20, 3, 20, 22, 'Maples CC, Garden City CC', '198000.00', '400000.00', '2020-04-18 14:08:09', NULL, 'downtownhex.png'),
(2, 'Point Douglas', 'north', NULL, 'Point Douglas comprises the northern portion of a peninsula of the Red River. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur ullam autem dicta voluptate dignissimos reiciendis quasi, eos culpa, tempora.', 2, 'no', 'yes', 'yes', 'yes', 17, 1, 34, 10, 'Tyndal Park CC, Northwood CC, Sinclair Park CC', '98000.00', '290000.00', '2020-04-18 14:50:01', '2020-04-18 14:50:01', 'downtownhex.png'),
(3, 'Mynarski', 'north', NULL, 'Mynarski, which absorbed the Point Douglas ward neighbourhoods of Mynarski and Robertson as well as the Dufferin neighbourhood Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur ', 5, 'no', 'yes', 'yes', 'no', 15, 2, 17, 3, 'Norquay, Sinclair Park', '65000.00', '360000.00', '2020-04-19 07:36:51', NULL, 'downtownhex.png'),
(4, 'Downtown', 'central', NULL, 'Nestled in the heart of Winnipeg, walking distance to The Forks Historical Site and St Boniface.  Walk through the Exchange District and marvel at the architecture from days gone by.  Downtown is a vibrant community with plenty of food, drink, and entertainment.', 4, 'yes', 'yes', 'yes', 'yes', 12, 2, 33, 4, 'Burton Cummings, Freighthouse', '54000.00', '399000.00', '2020-04-19 07:39:40', NULL, 'downtownhex.png'),
(5, 'North Kildonan', 'north east', NULL, 'North Kildonan is home to many green spaces, the largest of which is Kilcona Park, located on Springfield Avenue east of Lagimodiere Boulevard. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur .', 6, 'no', 'yes', 'yes', 'no', 11, 1, 15, 9, 'Gateway, North Kildonan', '120000.00', '750000.00', '2020-04-19 07:41:40', NULL, 'downtownhex.png'),
(6, 'East Kildonan', 'north east', NULL, 'East Kildonan is a primarily residential community in Winnipeg, Manitoba, Canada, located in the northeast part of the city. Commonly known by its initials \"E. K.\" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur .', 6, 'no', 'yes', 'yes', 'yes', 12, 2, 7, 6, 'Bronx, Melrose, Morse Place', '115000.00', '470000.00', '2020-04-19 07:43:36', NULL, 'downtownhex.png'),
(7, 'Elmwood', 'north east', NULL, 'Found in the northeast end of the city, over the Disraeli Bridge.  Elmwood runs along Henderson Hwy and the Red River. You will find plenty of churches and community centers in this neighborhood', 3, 'no', 'yes', 'no', 'no', 5, 2, 16, 4, 'Chalmers, East Elmwood', '94000.00', '350000.00', '2020-04-19 07:45:51', NULL, 'elmwoodhex.png'),
(8, 'Transcona', 'east', NULL, 'Transcona is located in the east end of Winnipeg, on Regent Ave.  It is considered a great place to raise a family.  Every summer, Transcona hosts the Hi Neighbour Festival, where residents gather at a family carnival set right on the main street!  Better love flamingos if you want to live here!', 7, 'yes', 'yes', 'yes', 'yes', 14, 2, 20, 9, 'Park City West, Oxford Heights, East End', '115000.00', '595000.00', '2020-04-19 07:47:27', NULL, 'transconahex.png'),
(9, 'St Boniface', 'south east', NULL, 'Viva la Francais!  St Boniface is home to Winnipeg\'s francophone community, the St Boniface Hospital, Louis Riel\'s home, and the French University. The beautiful basilica on Tache is a prime spot for wedding photos.  Come find your joie de vivre in historic St Boniface!', 5, 'no', 'yes', 'yes', 'yes', 10, 2, 21, 12, 'Notre Dame, Norwood, Archwood, Winakwa', '160000.00', '725000.00', '2020-04-19 07:49:29', NULL, 'stbonifacehex.png'),
(10, 'Ft Rouge', 'south west', NULL, 'Located in the south-central part of the city, it is bounded on the north by the Assiniboine River, on the east and south by the Red River, and on the west by Stafford Street and Pembina Highway. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur .', 5, 'no', 'yes', 'yes', 'no', 7, 1, 11, 10, 'River Osborne, Earl Grey, Lord Roberts, Riverview', '99000.00', '509000.00', '2020-04-19 07:51:25', NULL, 'downtownhex.png'),
(11, 'Ft Garry', 'south', NULL, 'Fort Garry is a district of the Canadian city of Winnipeg, Manitoba, located in the southwestern part of the city south of the district of Fort Rouge and east of the former town of Tuxedo. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 9, 'no', 'yes', 'yes', 'yes', 11, 3, 24, 18, 'Fort Garry, Westridge, Richmond Kings', '179000.00', '680000.00', '2020-04-19 08:22:16', NULL, 'downtownhex.png'),
(12, 'River Heights', 'south west', NULL, 'River Heights is a community area in Winnipeg, Manitoba. It is located south of the Assiniboine River, west of Fort Rouge at Stafford Street Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 6, 'no', 'yes', 'yes', 'yes', 11, 1, 8, 7, 'Crescentwood, River Heights, Crescentwood', '130000.00', '1999000.00', '2020-04-19 08:28:24', NULL, 'downtownhex.png'),
(13, 'St Vital', 'south east', NULL, 'Located in the south-central part of the city, it is bounded on the north by Carrière Avenue, on the south by the northern limit of the Rural Municipality of Ritchot Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 6, 'no', 'yes', 'yes', 'yes', 12, 2, 24, 17, 'Southdale, Dakota, Greendell', '109000.00', '999000.00', '2020-04-19 08:31:01', NULL, 'downtownhex.png'),
(14, 'St Norbert', 'south', NULL, 'St. Norbert (French: Saint-Norbert) is a bilingual (French and English) neighbourhood in the southernmost part of Winnipeg, Manitoba, Canada. While outside the Perimeter Highway, (the orbital road that surrounds most of Winnipeg), it is still part of the city.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 5, 'no', 'no', 'no', 'no', 3, 1, 4, 2, 'St Norbert CC', '195000.00', '1000000.00', '2020-04-19 08:33:45', NULL, 'downtownhex.png'),
(15, 'Whyte Ridge', 'south west', NULL, 'Whyte Ridge is a residential subdivision in the southwest corner of the city of Winnipeg, Manitoba, Canada. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur', 9, 'no', 'yes', 'no', 'no', 2, 1, 3, 1, 'Whyteridge, Waverly Heights', '400000.00', '1001000.00', '2020-04-19 08:35:43', NULL, 'downtownhex.png'),
(16, 'Tuxedo', 'south west', NULL, 'Old Tuxedo, home of beautiful mansion style houses  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 8, 'yes', 'no', 'no', 'no', 2, 2, 3, 3, 'Tuxedo CC', '150000.00', '2200000.00', '2020-04-19 08:37:20', NULL, 'downtownhex.png'),
(17, 'Charleswood', 'south west', NULL, 'Until it joined with the City of Winnipeg in 1972 it was a separate municipality known as the Rural Municipality of Charleswood.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 9, 'no', 'yes', 'yes', 'no', 8, 1, 9, 15, 'Roblin Park, Varsity View, Westdale', '159000.00', '1280000.00', '2020-04-19 08:39:08', NULL, 'downtownhex.png'),
(18, 'St Charles', 'west', NULL, 'St. Charles has catered to the world\'s finest golfers, royalty, dignitaries of state and government, and the humble member who pays their dues.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 8, 'no', 'yes', 'yes', 'no', 7, 3, 14, 7, 'Kirkfield, Assiniboia, Heritage', '119000.00', '700000.00', '2020-04-19 08:40:46', NULL, 'downtownhex.png'),
(19, 'St James', 'west', NULL, 'St. James-Assiniboia is a large community in the western section of Winnipeg. It is most often referred to as simply \"St. James\" and consists of the neighbourhoods of Old St. James, Deer Lodge, Silver Heights, Birchwood, Sturgeon Creek, Woodhaven, Heritage Park, Kirkfield Park, Westwood, Crestview, St. Charles, and Brooklands.', 6, 'no', 'yes', 'yes', 'yes', 9, 3, 18, 11, 'Woodhaven, Sturgeon Heights, Deer Lodge', '105000.00', '988800.00', '2020-04-19 08:42:43', NULL, 'st_jameshex.png'),
(20, 'Brooklands-Weston', 'north west', NULL, 'Brooklands Weston comprised of older homes west of McPhillips Street Station. Most of the residents were employed by the CPR’s Weston yards and shop. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus repellat, voluptates, odio numquam error earum blanditiis sunt repellendus veritatis consequatur.', 2, 'no', 'yes', 'no', 'yes', 10, 3, 17, 7, 'Valour, Weston Memorial', '54000.00', '190000.00', '2020-04-19 08:44:17', NULL, 'downtownhex.png');

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
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `city`, `province`, `postal_code`, `country`, `password`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Dawn', 'Biggs', 'db@mail.com', '2041234567', '123 Any Ave W', 'Winnipeg', 'MB', 'R3E1B6', 'Canada', '$2y$10$mN/2uH3KnSUUYJTmSzsQZ.NQKMfLLiSnKfP8O48qptKCcOeg10ocK', '2020-05-10 18:04:34', '2020-05-10 18:04:34', 0),
(2, 'Vikki', 'Biggs', 'vb@mail.com', '2041235697', '123 any st', 'Winnipeg', 'Manitoba', 'R1A1A1', 'Canada', '$2y$10$EEgr8i34eB7pW0u4sb8CgelNTIIBVY1.D1zLHmLpXBN4pmTjzv5r6', '2020-05-10 18:08:39', '2020-05-10 18:08:39', 0),
(3, 'Drae', 'Biggs', 'drae@email.com', '1235698745', '12 My Home St', 'Winnipeg', 'Manitoba', 'R1B1B1', 'Canada', '$2y$10$oOHUXUm0lmow3d4Vx4jGSeek4EjhyRmkd0c9H6zAfsUmAZrbcNLvi', '2020-05-10 18:58:15', '2020-05-10 18:58:15', 0),
(4, 'John', 'Doe', 'jdoe@mail.com', '204-565-5566', '111 My St', 'Winnipeg', 'Manitoba', 'R1A1A1', 'Canada', '$2y$10$PoUy6PdIDGoBSy3VcXBlPuSs5kcDaEPq0sy2Kd7Rhvp5C/BsZE34W', '2020-05-20 08:36:34', '2020-05-20 08:36:34', 0);

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
