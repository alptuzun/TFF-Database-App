-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 12:24 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tff`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `goal_count` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `birth_place` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `full_name`, `goal_count`, `age`, `birth_place`) VALUES
(1, 'Arda Turan', 10, 35, 'Fatih'),
(2, 'İlyas Yeşilyaprak', 45, 23, 'Kayseri'),
(3, 'Denizhan Altan', 53, 21, 'Sinanoba'),
(4, 'Mine Ergin', 81, 21, 'Adana'),
(5, 'Alp Yelekçi', 28, 22, 'Akşehir'),
(6, 'Alp Tüzün', 36, 21, 'Beşiktaş'),
(7, 'Rachid Ghezzal', 25, 30, 'Decines'),
(8, 'Juan Manuel Mata Garcia', 5, 34, 'Burgos'),
(9, 'Mauro Emanuel Icardi', 8, 29, 'Rosario'),
(10, 'Ferdi Erenay Kadıoğlu', 15, 23, 'Arnhem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
