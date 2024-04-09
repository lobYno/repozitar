-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2024 at 11:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrachovsky`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_football`
--

CREATE TABLE `t_football` (
  `id` int(11) NOT NULL,
  `meno` varchar(100) NOT NULL,
  `vek` int(11) NOT NULL,
  `pozicia` varchar(100) NOT NULL,
  `tim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_football`
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
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `meno` varchar(100) NOT NULL,
  `heslo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `meno`, `heslo`, `email`) VALUES
(2, 'user1', '$2y$10$VHciFdCdfWbgSwK6i/D67.6GeUOKgr/M0SyzM4tXe/fRBQL/GNQqi', 'user1@gmail.com'),
(3, 'AndrejDanko', '$2y$10$.Jr8wsd8u0rxJp3UfudAhOydXGkKKF7cBJQejO8X.hjffJFHNqIuS', 'andrejdanko@gmail.com'),
(4, 'admin', '$2y$10$OIOVdDL2vGAs377mHG92BuAHIr4e.8nfF98o6I078ELJEwcXg1czi', 'admin@admin.com'),
(5, 'jojo', '$2y$10$Aptg.bYMScmOoQk1x5F5DuSh./cP1l4OSz0/91M6nBWrqT1G4l.0m', 'jojo@jojo.sk'),
(6, 'username', '$2y$10$r85x6zA9DbNi7AWXvqwI3.kuQoYk7HCMyw3OudH9S.4EcdgS.ybN6', 'email@email.com'),
(7, 'aaaaa', '$2y$10$lV7Wlmn5G69WArR22UAOce9gttYyFeGN6Er0UKv/5o375tsmOEDii', 'aaaaa@aaa.aa'),
(8, 'pokus', '$2y$10$xl0T6Qllb8r6LR3Lf/0mouTgI6JTISLcJvbJS5/ZuR9kgdOdZOt6q', 'pokus@pokus.pokus'),
(9, 'sofiaaaaa', '$2y$10$latsta9xYf96lKxgTOtaOu3E5JRDS7KUeIICeX.5CDx3pNYlYT4ei', 'sofia@sofia.sofia'),
(10, 'sofiaaaa', '$2y$10$ggruGj6w3ypuXCFSfqeMtOADxCj3hKA7x6FfauompMMDlozJu87YO', 'sofia@sofia.sofia'),
(11, 'Sofiaaa', '$2y$10$eq.06kfwoAlyOukrWMgmNe0HNFEZngXMiUIz9UZvoDvHst8wVHRYe', 'sofia@sofia.sk'),
(12, 'korcok', '$2y$10$C/PCBCZn4gKDgVweWyNJR.EPenupWxzMjT7l2QEtbAnLDWSXCD2uq', 'korcok@korcok.sk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_football`
--
ALTER TABLE `t_football`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_football`
--
ALTER TABLE `t_football`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
