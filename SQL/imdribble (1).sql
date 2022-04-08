-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2022 at 01:04 PM
-- Server version: 5.7.36
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imdribble`
--

-- --------------------------------------------------------

--
-- Table structure for table `passwordreset`
--

CREATE TABLE `passwordreset` (
  `token` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `expiry_date` datetime NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `passwordreset`
--

INSERT INTO `passwordreset` (`token`, `expiry_date`, `email`) VALUES
('d3b6d44eb07bf1fb04fbed10ae7ded24', '2022-04-04 00:00:00', ''),
('e64057b25fcc3f4cbf38ff8c5f02d518', '2022-04-04 00:00:00', ''),
('b842acc134d1000ca2618694fbfd5263', '2022-04-04 00:00:00', ''),
('d653c290d02c94469dcdac6aac4d007f', '2022-04-04 15:15:12', ''),
('76f094e8b3397a1a9067354ab29e26c6', '2022-04-04 15:15:23', ''),
('abd82d24d3d31b3225b2d3c759ae6d10', '2022-04-04 15:26:12', 'aimane223@gmail.com'),
('ad7a92e4cd0776cd3af133eb777c697e', '2022-04-04 15:28:12', 'aimane223@gmail.com'),
('5116850e10ea55642bb09f2321f18b85', '2022-04-04 15:30:08', 'aimane223@gmail.com'),
('2b1302016a16bf947037c33387a743b3', '2022-04-04 15:31:19', 'aimane223@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `profilepicture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `profilepicture`) VALUES
(4, 'Aimane', 'Maadal', 'aimane223@gmail.com', '$2y$12$1G0bdmzuR1NldeSr7H8OeuAb5RvvVV6ROsWwOFEM.DmUKb5r7w9Te', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
