-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 10.Apr 2024, 13:38
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `hrachovsky`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `t_football`
--

CREATE TABLE `t_football` (
  `id` int(11) NOT NULL,
  `meno` varchar(100) NOT NULL,
  `vek` int(11) NOT NULL,
  `pozicia` varchar(100) NOT NULL,
  `tim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `t_football`
--

INSERT INTO `t_football` (`id`, `meno`, `vek`, `pozicia`, `tim`) VALUES
(1, 'Lionel Messi', 36, 'Center Forward', 'Inter Miami'),
(2, 'Cristiano Ronaldo', 39, 'Striker', 'Al Nassr'),
(3, 'Kylian Mbappé', 25, 'Striker', 'PSG'),
(4, 'Erling Haaland', 23, 'Striker', 'Manchester City'),
(5, 'Kevin De Bruyne', 32, 'Midfielder', 'Manchester City'),
(6, 'Alisson', 31, 'Goalkeeper', 'Liverpool'),
(7, 'Jude Bellingham', 20, 'Midfielder', 'Real Madrid'),
(8, 'Gavi', 19, 'Midfielder', 'Barcelona'),
(9, 'Ronald Araujo', 25, 'Defender', 'Barcelona'),
(10, 'Ángel Di Maria', 36, 'Winger', 'Benfica');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `meno` varchar(100) NOT NULL,
  `heslo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `t_football`
--
ALTER TABLE `t_football`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `t_football`
--
ALTER TABLE `t_football`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
