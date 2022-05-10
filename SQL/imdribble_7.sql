-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 05 mei 2022 om 20:23
-- Serverversie: 5.7.36
-- PHP-versie: 8.1.3

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
-- Tabelstructuur voor tabel `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  `id_followed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `followers`
--

INSERT INTO `followers` (`id`, `id_follower`, `id_followed`) VALUES
(52, 2, 3);

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
('a536b178452ab14f8ad82f756bd018a1', '2022-04-15 16:50:17', 'aimane223@gmail.com'),
('b2fa961db7c1f77c7803240c49c65b0d', '2022-04-15 16:57:25', 'aimane223@gmail.com'),
('958369fcd85ebc4541f0b2e3fddba0cc', '2022-04-15 17:00:59', 'aimane223@gmail.com'),
('9fd593d96befb9bdc8722d9b371ee468', '2022-04-15 17:02:04', 'aimane223@gmail.com'),
('fab12d97aa5c1abc53923093e769d773', '2022-04-16 11:43:02', 'aimane223@gmail.com'),
('679d8fa982341d4c44e668a9104f62ee', '2022-04-16 12:23:44', 'aimane223@gmail.com'),
('954119220af2d13c0caaada6222a31f2', '2022-04-16 12:27:04', 'aimane223@gmail.com'),
('9228f58da87d4585d785fee9f39c8a4a', '2022-04-16 12:27:48', 'aimane223@gmail.com'),
('776cff3381681f0404bf4677a73291ff', '2022-04-16 12:29:50', 'aimane223@gmail.com'),
('3938e44adb803345dfa0d1a36cde1d4a', '2022-04-16 12:31:34', 'aimane223@gmail.com'),
('2af21bedc7c95fce640419d783fcb31a', '2022-04-16 12:33:27', 'aimane223@gmail.com'),
('fd6604ff903e96ed774a34e8c179becd', '2022-04-16 12:39:35', 'aimane223@gmail.com'),
('7d9d93314f259f2938aada6822bbf67d', '2022-04-16 12:39:54', 'aimane223@gmail.com'),
('3f312ddbcc84426d870767b6bc11c825', '2022-04-16 12:41:25', 'aimane223@gmail.com'),
('e4b2bdf76c2d898fabb7af597c904611', '2022-04-16 12:42:02', 'aimane223@gmail.com'),
('4bb1552354360104420048bf1b458e34', '2022-04-16 12:45:55', 'aimane223@gmail.com'),
('cf97f495c46d8e1f2e7aa5388884dbfa', '2022-04-16 12:46:29', 'aimane223@gmail.com'),
('2aff1d58be473c4030baf7d0a4653848', '2022-04-16 12:46:49', 'aimane223@gmail.com'),
('e884c94c8e31c82f4690bc1ffc37a794', '2022-04-16 12:48:48', 'aimane223@gmail.com'),
('1e054af9073efb72d60337e3eeecf49c', '2022-04-16 12:50:23', 'aimane223@gmail.com'),
('dc75d896107f5f617acdbca2064adc34', '2022-04-16 12:51:08', 'aimane223@gmail.com'),
('7df45c77bc3b7b5fddccb31b728faf61', '2022-04-16 12:51:34', 'aimane223@gmail.com'),
('d7a0c50f31adeb25be11dab71a92e552', '2022-04-16 12:52:17', 'aimane223@gmail.com'),
('8b78e0cf00a49bf8e8473e9e636eb622', '2022-04-16 12:53:49', 'aimane223@gmail.com'),
('358317b6a3544da0f8b045054cddaf05', '2022-04-16 12:55:09', 'aimane223@gmail.com'),
('de3233fc4fb5dca75a94058db74d88f4', '2022-04-16 12:55:32', 'aimane223@gmail.com'),
('747236229629a1e63d635ca8e93a251a', '2022-04-16 12:57:00', 'aimane223@gmail.com'),
('5974f581713ee21e85785f053b96e948', '2022-04-16 12:58:45', 'aimane223@gmail.com'),
('18b8410fbffa9b512afbb27b121f96ba', '2022-04-16 13:01:50', 'aimane223@gmail.com'),
('0d5eee37af55699d9e108267b4511341', '2022-04-22 19:58:38', 'r0818162@student.thomasmore.be'),
('a41d222bc3321b6f7f62c9c6e8520fc0', '2022-05-02 11:33:09', 'aimane223@gmail.com'),
('3f509dbced67dced6789e9704ea531f0', '2022-05-02 11:35:48', 'aimane223@gmail.com'),
('5da8fd03f0f2785abf8d46adbf7b7c6e', '2022-05-02 11:36:39', 'aimane223@gmail.com'),
('c3796e2b1a1a8890e3233582c6e7f0ea', '2022-05-02 11:36:56', 'aimane223@gmail.com'),
('c93da3b7d9613c86c9f365d6dde8b7ee', '2022-05-02 11:38:32', 'aimane223@gmail.com'),
('905599fac0a00e1edfd7c52e7d34c2e5', '2022-05-02 11:38:35', 'aimane223@gmail.com'),
('4395a4d11f36d5cffd84b7088082a1ea', '2022-05-02 11:38:41', 'aimane223@gmail.com'),
('e3f7bbf7c60a0c90cc1ec9804f5f57c8', '2022-05-02 11:39:44', 'aimane223@gmail.com'),
('73a6722ed97f920d54ec482472af5e7c', '2022-05-02 11:39:47', 'aimane223@gmail.com'),
('c7f1c05886b04243de4e64723236b5f8', '2022-05-02 11:44:27', 'aimane223@gmail.com'),
('31db9b20340ea5a3505c3ef515f1219e', '2022-05-02 11:45:01', 'aimane223@gmail.com'),
('119f2abfe727be4e864f02b2821b47e6', '2022-05-02 11:45:37', 'aimane223@gmail.com'),
('33e15d19ec7bc675f6b10eeed936cbf1', '2022-05-02 11:45:43', 'aimane223@gmail.com'),
('2de1117db593b247dfb4f1a44af49885', '2022-05-02 11:48:02', 'aimane223@gmail.com'),
('678fbaa7081d85eef24c2a9f540e3f4e', '2022-05-02 11:48:21', 'aimane223@gmail.com'),
('0558dca4cc9e98ec69f552a102f36cd5', '2022-05-02 11:53:33', 'r0818162@student.thomasmore.be'),
('b652cb86928011507853c6653e1d5f5a', '2022-05-02 12:03:36', 'r0818162@student.thomasmore.be'),
('3bedab6c48182a5cc0d0c68ce76f5c6d', '2022-05-02 12:04:04', 'aimane223@gmail.com'),
('0c6abc321c1726c47d1a0ebb26b12ed5', '2022-05-02 12:06:49', 'aimane223@gmail.com'),
('1d56cc5353a42892da6e001b0b0c27d7', '2022-05-02 12:07:02', 'aimane223@gmail.com'),
('9dd954ac3a3806cbb40a9cbf2be3a4f5', '2022-05-02 12:08:00', 'aimane223@gmail.com'),
('9b1c226ab3720b82cdd57ec62772e71e', '2022-05-02 12:08:16', 'r0818162@student.thomasmore.be'),
('109b2df64f76bdf3650e7859d12c8eec', '2022-05-02 12:08:38', 'r0818162@student.thomasmore.be'),
('559b7f661e0407159d4e820cfe0acdc1', '2022-05-02 12:08:48', 'aimane223@gmail.com'),
('dbf5c14904ca54a774894ae947534d7f', '2022-05-02 12:10:50', 'aimane223@gmail.com'),
('6df14db288b8b67acc2cc148cab96bd3', '2022-05-02 12:16:39', 'aimane223@gmail.com'),
('01736575252323c2210806fb56890be9', '2022-05-04 09:01:02', 'r0818162@student.thomasmore.be');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `imgpath` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `time_posted` date DEFAULT NULL,
  `showcase` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `tags`, `imgpath`, `userid`, `time_posted`, `showcase`) VALUES
(152, 'op', 'kk', '[\"#aa\"]', 'https://res.cloudinary.com/dck3erw0v/image/upload/v1651755637/hg4hgztvj6lyopfs16yg.jpg', '2', '2022-05-05', 2),
(153, 'kluji', 'oijoj', '[\"#iojio\"]', 'https://res.cloudinary.com/dck3erw0v/image/upload/v1651770232/bguptyfgapuyov6oez1m.png', '3', '2022-05-05', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `backupemail` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `profilepicture` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `education` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `behance` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dribble` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `backupemail`, `password`, `profilepicture`, `bio`, `education`, `linkedin`, `behance`, `dribble`) VALUES
(1, 'a', 'aa', 'aimane223@gmail.com', NULL, '$2y$12$tvlMh6KgoaCOaKFM.svsHewPPk6oscVG4euTS.Y5Gbl.BMIpQh.c2', '', NULL, NULL, '', '', ''),
(2, 'Aimane', 'Maadal', 'r0818162@student.thomasmore.be', 'aimane223@student.thomasmore.be', '$2y$12$6EcSHJ1Qkf354jzRHzKVNOTtYUOqZPhgdXO9kz0JaRPAQhBvQH93m', 'https://res.cloudinary.com/dck3erw0v/image/upload/v1651528814/jpolzrbdplencfbbvo6o.jpg', 'i like pcs', 'ICT', 'aimane', 'aimane', 'aimane'),
(3, 'jan', 'uiouzer', 'r0776571@student.thomasmore.be', NULL, '$2y$12$hBXip44Ok.t0YGS5CKT40e6NFNP4BsD4uRKKKpI/1RzhVxPoaclNq', 'https://res.cloudinary.com/dck3erw0v/image/upload/v1651770244/j9uhoj7i9qqnsgobnjdo.png', NULL, NULL, NULL, NULL, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT voor een tabel `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
