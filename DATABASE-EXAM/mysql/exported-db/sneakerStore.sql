-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 18, 2018 at 03:40 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sneakerStore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_names`
--

CREATE TABLE `brand_names` (
  `brand_name_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_names`
--

INSERT INTO `brand_names` (`brand_name_id`, `brand_name`) VALUES
(1, 'nike'),
(2, 'adidas'),
(5, 'puma');

-- --------------------------------------------------------

--
-- Stand-in structure for view `female_sneakers`
-- (See below for the actual view)
--
CREATE TABLE `female_sneakers` (
`sneaker_id` bigint(20) unsigned
,`sneaker_name` varchar(50)
,`gender` tinyint(1)
,`description` varchar(200)
,`price` int(10)
,`size` decimal(3,1) unsigned
,`brand_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `sneaker_fk` bigint(20) UNSIGNED DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `male_sneakers`
-- (See below for the actual view)
--
CREATE TABLE `male_sneakers` (
`sneaker_id` bigint(20) unsigned
,`sneaker_name` varchar(50)
,`gender` tinyint(1)
,`description` varchar(200)
,`price` int(10)
,`brand_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_fk` bigint(20) UNSIGNED DEFAULT NULL,
  `sneaker_fk` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`order_id`, `user_fk`, `sneaker_fk`) VALUES
(1, 22, 2);

--
-- Triggers `shopping_cart`
--
DELIMITER $$
CREATE TRIGGER `shopping_cart_trigger` BEFORE INSERT ON `shopping_cart` FOR EACH ROW insert into trigger_time 
values (NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `sneaker_fk` bigint(20) UNSIGNED DEFAULT NULL,
  `size` decimal(3,1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `sneaker_fk`, `size`) VALUES
(22, 1, '41.0'),
(21, 1, '43.0'),
(1, 1, '45.5'),
(23, 1, '46.0'),
(2, 2, '45.0');

-- --------------------------------------------------------

--
-- Table structure for table `sneakers`
--

CREATE TABLE `sneakers` (
  `sneaker_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_fk` bigint(20) UNSIGNED DEFAULT NULL,
  `sneaker_name` varchar(50) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sneakers`
--

INSERT INTO `sneakers` (`sneaker_id`, `brand_name_fk`, `sneaker_name`, `gender`, `description`, `price`) VALUES
(1, 1, 'Air Max 97 Silver Bullet', 1, 'anfaslknsaf', 1500),
(2, 2, 'Ultra Boost OG', 1, 'ainapngsg', 1500),
(5, 1, 'Air Max 97 Gold Bullet', 0, 'dasdgdsagasg', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `trigger_time`
--

CREATE TABLE `trigger_time` (
  `added_to_cart` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trigger_time`
--

INSERT INTO `trigger_time` (`added_to_cart`) VALUES
('2018-12-18 09:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` smallint(4) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varbinary(20) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `last_name`, `address`, `city`, `zipcode`, `email`, `password`, `newsletter`, `admin`) VALUES
(1, 'a', 'aa', 'aaaa', 'aa', 0, 'a@a.com', 0x413162326333, 1, 1),
(2, 'B', 'BB', 'mystreet', 'mycity', 2400, 'b@b.com', 0x313233343536, 1, 0),
(20, 'a123', 'b123a', 'street 1', 'cityname', 9999, 'test@email.com', 0x746573744050617373776f72642e636f6d, 1, 0),
(21, 'a123', 'b123', 'street 1', 'cityname', 9999, 'test@email.com', 0x746573744050617373776f72642e636f6d, 1, 0),
(22, 'a123', 'b123', 'street 1', 'cityname', 9999, 'test@email.com', 0x746573744050617373776f72642e636f6d, 0, 0),
(23, 'a123', 'b123', 'street 1', 'cityname', 9999, 'test@email.com', 0x746573744050617373776f72642e636f6d, 1, 0),
(24, 'a123', 'b123', 'street 1', 'cityname', 9999, 'test@email.com', 0x746573744050617373776f72642e636f6d, 1, 0),
(25, 'a123', 'b123', 'street 1', 'cityname', 9999, 'test@email.com', 0x746573744050617373776f72642e636f6d, 0, 0),
(26, 'a123', 'b123', 'street 1', 'cityname', 9999, 'test@email.com', 0x746573744050617373776f72642e636f6d, 0, 0),
(27, 'a123', 'b123', 'street 1', 'cityname', 9999, 'test@email.com', 0x746573744050617373776f72642e636f6d, 0, 0);

-- --------------------------------------------------------

--
-- Structure for view `female_sneakers`
--
DROP TABLE IF EXISTS `female_sneakers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sneakerstore`.`female_sneakers`  AS  select `sneakerstore`.`sneakers`.`sneaker_id` AS `sneaker_id`,`sneakerstore`.`sneakers`.`sneaker_name` AS `sneaker_name`,`sneakerstore`.`sneakers`.`gender` AS `gender`,`sneakerstore`.`sneakers`.`description` AS `description`,`sneakerstore`.`sneakers`.`price` AS `price`,`sneakerstore`.`sizes`.`size` AS `size`,`sneakerstore`.`brand_names`.`brand_name` AS `brand_name` from ((`sneakerstore`.`sneakers` join `sneakerstore`.`sizes` on((`sneakerstore`.`sizes`.`sneaker_fk` = `sneakerstore`.`sneakers`.`sneaker_id`))) join `sneakerstore`.`brand_names` on((`sneakerstore`.`sneakers`.`brand_name_fk` = `sneakerstore`.`brand_names`.`brand_name_id`))) where (`sneakerstore`.`sneakers`.`gender` = 0) ;

-- --------------------------------------------------------

--
-- Structure for view `male_sneakers`
--
DROP TABLE IF EXISTS `male_sneakers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sneakerstore`.`male_sneakers`  AS  select `sneakerstore`.`sneakers`.`sneaker_id` AS `sneaker_id`,`sneakerstore`.`sneakers`.`sneaker_name` AS `sneaker_name`,`sneakerstore`.`sneakers`.`gender` AS `gender`,`sneakerstore`.`sneakers`.`description` AS `description`,`sneakerstore`.`sneakers`.`price` AS `price`,`sneakerstore`.`brand_names`.`brand_name` AS `brand_name` from (`sneakerstore`.`sneakers` join `sneakerstore`.`brand_names` on((`sneakerstore`.`sneakers`.`brand_name_fk` = `sneakerstore`.`brand_names`.`brand_name_id`))) where (`sneakerstore`.`sneakers`.`gender` = 1) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_names`
--
ALTER TABLE `brand_names`
  ADD PRIMARY KEY (`brand_name_id`),
  ADD UNIQUE KEY `brand_name_id` (`brand_name_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `image_id` (`image_id`),
  ADD KEY `FK` (`sneaker_fk`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `FK` (`user_fk`,`sneaker_fk`),
  ADD KEY `sneaker_fk` (`sneaker_fk`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD UNIQUE KEY `size_id` (`size_id`) USING BTREE,
  ADD KEY `size` (`size`),
  ADD KEY `FK` (`sneaker_fk`,`size`) USING BTREE;

--
-- Indexes for table `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`sneaker_id`),
  ADD UNIQUE KEY `sneaker_id` (`sneaker_id`),
  ADD UNIQUE KEY `sneaker_name` (`sneaker_name`),
  ADD KEY `FK` (`brand_name_fk`),
  ADD KEY `gender` (`gender`),
  ADD KEY `sneaker_name_2` (`sneaker_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `name` (`name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_names`
--
ALTER TABLE `brand_names`
  MODIFY `brand_name_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sneakers`
--
ALTER TABLE `sneakers`
  MODIFY `sneaker_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`sneaker_fk`) REFERENCES `sneakers` (`sneaker_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`sneaker_fk`) REFERENCES `sneakers` (`sneaker_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`user_fk`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_ibfk_1` FOREIGN KEY (`sneaker_fk`) REFERENCES `sneakers` (`sneaker_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sneakers`
--
ALTER TABLE `sneakers`
  ADD CONSTRAINT `sneakers_ibfk_1` FOREIGN KEY (`brand_name_fk`) REFERENCES `brand_names` (`brand_name_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
