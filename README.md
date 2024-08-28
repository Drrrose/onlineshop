#code below 🔽🔽🔽🔽
#don't forget to import the database 
#code below 🔽🔽🔽🔽
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 02:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `body` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `body`, `image`, `user_id`) VALUES
(1, 'iphone11pro', 23000, 'The iPhone 11 Pro and 11 Pro Max both have an A13 Bionic processor. Both phones have three internal storage options: 64 GB, 256 GB, and 512 GB, and have 4 GB of RAM. Both models are rated IP68 water and dust resistant, and are resistant for 30 minutes at a depth of 4 meters.', 'iphone.jpg', 1),
(2, 'asusf15 ', 45000, 'Armed for combat, the TUF Gaming F15 features up to a 10th Gen Intel® Core™ i7 CPU with 6 cores and 12 threads to tear through serious gaming, streaming, and heavy duty multitasking.', 'laptop.png', 1),
(3, 'Telsa Model S', 50000000, 'Model S is built from the ground up as an electric vehicle, with a high-strength architecture and floor-mounted battery pack for incredible occupant protection and low rollover risk. Every new Model S includes Tesla&#039;s latest active safety features, such as Automatic Emergency Braking, at no extra cost.', '66cb34ab120e9.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'moe', 'moe@ye.co', 'testdatanohash'),
(2, 'jack', 'mo@mo.co', '$2y$10$PVUkyDVgyvzXvg.oR/WstOQnUUCXBa13ywcXXucgELlhhR9ArKVyW'),
(3, 'jackd', 'mo@mo.co2', '$2y$10$T8.LcSvmrQAZvwFNPCmUq.L86aH9X0sfNf1i3DtsuOIJcbp/zPnNq'),
(4, 'jack3', 'mo@mo.co333', '$2y$10$4i3C5mIMOwUFG.7gH/ozY.DdPdzgg3O552VMGuYtLWqfxnRCZa88K'),
(5, 'jack34', 'mo@mo.co3334', '$2y$10$LGqL5xLxhyOfsaDk/DdzVOu0jqyfixtlADIJZP89uWTPGcdkPQM/q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
