-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 28 mars 2025 kl 12:46
-- Serverversion: 10.4.32-MariaDB
-- PHP-version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `mini_twitter`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `content`, `created_at`) VALUES
(1, 2, 'wedfg', '2025-03-28 11:01:54'),
(2, 2, 'wake your ass up g, im in ur mamas hu', '2025-03-28 11:02:54'),
(3, 2, 'mfs be on my diihh 24/7 smh', '2025-03-28 11:10:31'),
(4, 6, 'WARUP G', '2025-03-28 11:27:20'),
(5, 6, 'big man ting yeah', '2025-03-28 11:31:06'),
(6, 7, 'im ronaldo yoo', '2025-03-28 11:31:58'),
(7, 7, 'imma win the worl cup trust ', '2025-03-28 11:32:13'),
(8, 7, 'ong\r\n', '2025-03-28 11:32:16'),
(9, 7, 'ong\r\n', '2025-03-28 11:37:44'),
(10, 7, 'ong\r\n', '2025-03-28 11:37:48');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'loo', '$2y$10$UhfxdqhZTdTPD.m7uQMYwe1BBcqyK.YtnN4QUFztOV7N/hYk3N312', '2025-03-28 11:01:45'),
(2, 'Immodie1188', '$2y$10$NzMbid7L1e55lAzNvy4Bgu7bBYFdHPi8buhe9qRld3RHNlQ7N2b12', '2025-03-28 11:01:49'),
(6, 'THE', '$2y$10$Pdt5zkTr0py.aC5sVePpc.l5Dbktj3dNuhfT8hUJL7RyVhFk98Xr.', '2025-03-28 11:27:05'),
(7, 'CR7', '$2y$10$LdeQgBvt4dHcMWr4ObK.0u2WtkB8q4QDjarmZ8P3spUd2mEYp4Is2', '2025-03-28 11:31:40');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
