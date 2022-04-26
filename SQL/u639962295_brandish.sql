-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 26 apr 2022 om 12:55
-- Serverversie: 10.5.13-MariaDB-cll-lve
-- PHP-versie: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u639962295_brandish`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `passwordreset`
--

CREATE TABLE `passwordreset` (
  `token` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `expiry_date` datetime NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `passwordreset`
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
('2b1302016a16bf947037c33387a743b3', '2022-04-04 15:31:19', 'aimane223@gmail.com'),
('d3e395e2646d0667b2c1ed606edfa161', '2022-04-16 10:53:17', 'aimane223@gmail.com'),
('847b388eeffad3b487aed3a0f3ece43a', '2022-04-16 11:42:58', 'r0851847@student.thomasmore.be'),
('64850685b6345eca3eba866174bc879e', '2022-04-16 12:00:45', 'aimane223@gmail.com'),
('ca7093e8828d9c4854cab51028843d58', '2022-04-16 12:01:22', 'aimane223@gmail.com'),
('c0f807ff730bbd02d65158cfcaf71340', '2022-04-16 12:02:14', 'aimane223@gmail.com'),
('753ed8c20abb01f96768256bc0c1b223', '2022-04-16 12:06:22', 'aimane223@gmail.com'),
('88bae343efcbdfb329aa9e6ee6d3641d', '2022-04-16 12:07:00', 'aimane223@gmail.com'),
('47bb0c1ebc2a19f9490dc0f4d0af10df', '2022-04-16 12:08:33', 'aimane223@gmail.com'),
('0426193b07940b70a030af41ed060255', '2022-04-16 12:19:15', 'aimane223@gmail.com'),
('0089980fcb4db7fabd13aeb86369e3c8', '2022-04-16 12:19:55', 'aimane223@gmail.com'),
('319e61f51e962141a64baa10947a518c', '2022-04-16 12:20:16', 'aimane223@gmail.com'),
('11a72932d282ba7fa97ca9e6f6627233', '2022-04-16 12:30:53', 'aimane223@gmail.com'),
('45c2165c7cd8d9fb3afad2536e51ee62', '2022-04-16 12:31:16', 'aimane223@gmail.com'),
('f5e0831e163e338574b19a5c79b0e888', '2022-04-16 13:05:53', 'aimane223@gmail.com'),
('a8eec5e3de86371721c1ab6a594e8501', '2022-04-16 13:05:56', 'aimane223@gmail.com'),
('78ec49a3532003baf4780b1f33d3dd7e', '2022-04-16 13:06:50', 'aimane223@gmail.com'),
('98f9f4b36a883a2b0ec028cc90d58228', '2022-04-16 13:08:40', 'aimane223@gmail.com'),
('ca98c499e3f9ea777c0bde3aeb6cfca2', '2022-04-16 13:15:55', 'aimane223@gmail.com'),
('32cf7fd667eb76a896d2eb120718816f', '2022-04-16 13:19:40', 'aimane223@gmail.com'),
('548762c99d0cf88d7d65033763cbc703', '2022-04-16 13:22:16', 'aimane223@gmail.com'),
('efe5c04e2e640b8be82e95b778c6e6a9', '2022-04-16 16:34:26', 'aimane223@gmail.com'),
('a10de33dff93ae5f8c958178ac3cd25b', '2022-04-16 18:34:29', 'aimane223@gmail.com'),
('1f6e0a2c45871e1d23a2c3001f2a6d73', '2022-04-16 18:35:44', 'r0818162@student.thomasmore.be'),
('c811c1ee64f9511b4c0c85790e5de5e3', '2022-04-20 07:19:34', 'aimane223@gmail.com'),
('9c83dc20dd8c8e27a7024cbce8cf7c5d', '2022-04-20 08:45:48', 'aimane223@gmail.com'),
('85012b8ce6c1c18e67b98fe5377a4953', '2022-04-20 08:46:01', 'aimane223@gmail.com'),
('d962c7c04477a967501a7837cb662930', '2022-04-20 12:25:37', 'aimane223@gmail.com'),
('346c466f3d75c4aece77b9499755d462', '2022-04-20 19:58:14', 'r0818162@student.thomasmore.be'),
('407d96c4f1f90b61909d5ee3c2115692', '2022-04-20 20:03:03', 'r0818162@student.thomasmore.be'),
('ae0911e3b97a0540214048ccd458e329', '2022-04-20 20:04:24', 'r0818162@student.thomasmore.be'),
('2d2d62f09c5b53335e599fab288cc3fc', '2022-04-20 20:04:49', 'r0818162@student.thomasmore.be'),
('acd4fdfa5473099ade6f3feaee6207f5', '2022-04-20 20:05:18', 'r0818162@student.thomasmore.be'),
('aa87eedc9762b1f5b800282bbd6488a3', '2022-04-20 20:05:23', 'r0818162@student.thomasmore.be'),
('ca2e7b3c6c766a9515588c271b7bcdc3', '2022-04-23 20:34:23', 'r0832857@student.thomasmore.be'),
('e96056a28615907fdecdde205daa3f06', '2022-04-23 20:35:47', 'r0832857@student.thomasmore.be'),
('33db26dd86740cf876cd69447a4e5bc8', '2022-04-23 20:37:15', 'r0832857@student.thomasmore.be'),
('64c83b4769ea4273eabf3c2d82cb99be', '2022-04-23 20:41:06', 'r0832857@student.thomasmore.be');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgpath` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `backupemail` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `profilepicture` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `backupemail`, `password`, `profilepicture`, `bio`, `education`, `linkedin`) VALUES
(6, 'Alejandro', 'De Wolf', 'r0851847@student.thomasmore.be', '', '$2y$12$W71tEPx3gr6hO2T/rS5lE.jXgLW1gRjSBiZVecrJjV92WX02ul7ey', '0', '', '', ''),
(12, 'Senne', 'Christiaens', 'r0832857@student.thomasmore.be', '', '$2y$12$pnKPWyiyF2SQebarvm//yeqdlSZZz5bkTrpEVba8uBNo2/7P8ileS', '', '', '', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
