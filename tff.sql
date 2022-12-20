-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 11:52 PM
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
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `Award_ID` int(11) NOT NULL,
  `Season` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`Award_ID`, `Season`) VALUES
(1, 2022),
(2, 2022),
(3, 2022),
(4, 2022),
(5, 2022),
(6, 2021),
(7, 2021),
(8, 2021),
(9, 2021),
(10, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `Club_ID` int(11) NOT NULL,
  `Club_Name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Championship_Count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`Club_ID`, `Club_Name`, `Championship_Count`) VALUES
(1, 'Adana Demirspor', 7),
(2, 'Alanyaspor', 4),
(3, 'Antalyaspor', 2),
(4, 'Beşiktaş', 33),
(5, 'Fatih Karagümrük', 4),
(6, 'Fenerbahçe', 34),
(7, 'Galatasaray', 56),
(8, 'Gaziantep', 3),
(9, 'Giresunspor', 5),
(10, 'Giresunspor', 6),
(11, 'Hatayspor', 6),
(12, 'İstanbul Başakşehir', 4),
(13, 'İstanbulspor', 5),
(14, 'Kasımpaşa', 7),
(15, 'Kayserispor', 4),
(16, 'Konyaspor', 5),
(17, 'MKE Ankaragücü', 8),
(18, 'Sivasspor', 0),
(19, 'Trabzonspor', 27),
(20, 'Ümraniyespor', 3),
(21, 'Eyüpspor', 3),
(22, 'Çaykur Rizespor', 5);

-- --------------------------------------------------------

--
-- Table structure for table `club_managers`
--

CREATE TABLE `club_managers` (
  `Manager_ID` int(11) DEFAULT NULL,
  `Club_ID` int(11) DEFAULT NULL,
  `Tenure` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `club_managers`
--

INSERT INTO `club_managers` (`Manager_ID`, `Club_ID`, `Tenure`) VALUES
(2, 7, '2022-'),
(3, 4, '2022-'),
(4, 6, '2022-'),
(5, 19, '2020-'),
(6, 18, '2019-'),
(7, 12, '2021-');

-- --------------------------------------------------------

--
-- Table structure for table `club_owns`
--

CREATE TABLE `club_owns` (
  `Stadium_ID` int(11) DEFAULT NULL,
  `Club_ID` int(11) DEFAULT NULL,
  `Stadium_Name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `club_owns`
--

INSERT INTO `club_owns` (`Stadium_ID`, `Club_ID`, `Stadium_Name`) VALUES
(1, 7, 'Nef Stadyumu'),
(2, 6, 'Sükrü Saraçoğlu Stadyumu'),
(3, 4, 'Vodafone Park'),
(5, 19, 'Şenol Güneş Spor Kompleksi'),
(6, 1, 'Yeni Adana Stadyumu'),
(8, 11, 'Yeni Hatay Stadyumu'),
(7, 3, 'Antalya Stadyumu');

-- --------------------------------------------------------

--
-- Table structure for table `club_roster`
--

CREATE TABLE `club_roster` (
  `Club_ID` int(11) NOT NULL,
  `Player_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `club_roster`
--

INSERT INTO `club_roster` (`Club_ID`, `Player_ID`) VALUES
(4, 7),
(5, 12),
(6, 10),
(7, 8),
(7, 9),
(15, 11);

-- --------------------------------------------------------

--
-- Table structure for table `club_transfers`
--

CREATE TABLE `club_transfers` (
  `Transfer_ID` int(11) NOT NULL,
  `Club_ID` int(11) DEFAULT NULL,
  `Player_ID` int(11) DEFAULT NULL,
  `Season_Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `club_transfers`
--

INSERT INTO `club_transfers` (`Transfer_ID`, `Club_ID`, `Player_ID`, `Season_Number`) VALUES
(1, 7, 8, 3),
(2, 7, 9, 1),
(3, 6, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cups`
--

CREATE TABLE `cups` (
  `Cup_ID` int(11) NOT NULL,
  `Last_Champion` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Cup_Name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `cups`
--

INSERT INTO `cups` (`Cup_ID`, `Last_Champion`, `Cup_Name`) VALUES
(1, 'Trabzonspor', 'Turkcell Süper Kupa'),
(2, 'Sivasspor', 'Ziraat Türkiye Kupası');

-- --------------------------------------------------------

--
-- Table structure for table `cup_champions`
--

CREATE TABLE `cup_champions` (
  `Cup_ID` int(11) DEFAULT NULL,
  `Club_ID` int(11) DEFAULT NULL,
  `Season` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `cup_champions`
--

INSERT INTO `cup_champions` (`Cup_ID`, `Club_ID`, `Season`) VALUES
(1, 4, 2016),
(1, 4, 2017),
(1, 4, 2021),
(1, 7, 2015),
(1, 7, 2018),
(1, 7, 2019),
(1, 12, 2020),
(1, 19, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `League_ID` int(11) NOT NULL,
  `League_Name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Team_Count` int(11) DEFAULT NULL,
  `Last_Champion` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Prize_Money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`League_ID`, `League_Name`, `Team_Count`, `Last_Champion`, `Prize_Money`) VALUES
(1, 'Spor Toto Süper Lig', 20, 'Trabzonspor', 65340000),
(2, 'Spor Toto 1.Lig', 19, 'MKE Ankaragücü', 4000000),
(3, 'TFF 2. Lig', 19, 'Sakaryaspor', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `league_roster`
--

CREATE TABLE `league_roster` (
  `League_ID` int(11) DEFAULT NULL,
  `Club_ID` int(11) DEFAULT NULL,
  `League_Name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `league_roster`
--

INSERT INTO `league_roster` (`League_ID`, `Club_ID`, `League_Name`) VALUES
(1, 1, 'Süper Lig'),
(1, 2, 'Süper Lig'),
(1, 3, 'Süper Lig'),
(1, 4, 'Süper Lig'),
(1, 5, 'Süper Lig'),
(1, 6, 'Süper Lig'),
(1, 7, 'Süper Lig'),
(2, 21, '1. Lig'),
(2, 22, '1. Lig');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Manager_ID` int(11) NOT NULL,
  `Full_Name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Experience_Years` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`Manager_ID`, `Full_Name`, `Experience_Years`) VALUES
(1, 'Fatih Terim', 35),
(2, 'Okan Buruk', 11),
(3, 'Şenol Güneş', 34),
(4, 'Jorge Jesus', 32),
(5, 'Abdullah Avcı', 22),
(6, 'Rıza Çalımbay', 21),
(7, 'Emre Belözoğlu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `manager_awards`
--

CREATE TABLE `manager_awards` (
  `Award_ID` int(11) NOT NULL,
  `Manager_ID` int(11) DEFAULT NULL,
  `Season` int(11) DEFAULT NULL,
  `Award_Type` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `manager_awards`
--

INSERT INTO `manager_awards` (`Award_ID`, `Manager_ID`, `Season`, `Award_Type`) VALUES
(3, 4, 2023, 'Yılın Teknik Direktörü'),
(4, 2, 2022, 'Yılın En Çok Gelişen Teknik Direktörü'),
(8, 5, 2021, 'Yılın Teknik Direktörü'),
(9, 2, 2021, 'Yılın En Çok Gelişen Teknik Direktörü');

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `Match_ID` int(11) NOT NULL,
  `Host_ID` int(11) DEFAULT NULL,
  `Guest_ID` int(11) DEFAULT NULL,
  `Referee_ID` int(11) DEFAULT NULL,
  `Score` varchar(10) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Date_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`Match_ID`, `Host_ID`, `Guest_ID`, `Referee_ID`, `Score`, `Date_Time`) VALUES
(1, 1, 21, 1, '0-2', '2022-09-07 21:54:15'),
(2, 4, 15, 3, '1-0', '2022-08-06 21:48:00'),
(3, 3, 7, 2, '0-1', '2022-08-07 21:47:00'),
(4, 6, 20, 5, '3-3', '2022-08-08 21:48:00'),
(5, 19, 11, 6, '1-0', '2022-12-12 21:02:00'),
(6, 2, 8, 5, '1-0', '2022-12-14 21:29:27'),
(7, 5, 3, 3, '5-0', '2022-12-14 21:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE `penalty` (
  `Penalty_ID` int(11) NOT NULL,
  `Penalty_Type` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Penalty_Length` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`Penalty_ID`, `Penalty_Type`, `Penalty_Length`) VALUES
(1, 'Red Card', 1),
(2, 'Unsportsmanlike Conduct', 5),
(3, 'Disqualified', 1),
(4, 'Yellow Card', 0),
(5, 'Red Card', 1),
(6, 'Unsportsmanlike Conduct\r\n', 10);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(11) NOT NULL,
  `full_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `goal_count` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `birth_place` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
(10, 'Ferdi Erenay Kadıoğlu', 15, 23, 'Arnhem'),
(11, 'Omer Tugrul', 69, 30, 'Kayseri'),
(12, 'Ali Devrim', 78, 26, 'Mimaroba'),
(13, 'Alex De Souza', 250, 45, 'Curitiba'),
(14, 'Diego Maradona', 777, 50, 'Buenos Aires'),
(15, 'Diego Costa', 274, 35, 'Madrid'),
(16, 'Volkan Demirel', 5, 40, 'Sinanoba');

-- --------------------------------------------------------

--
-- Table structure for table `player_awards`
--

CREATE TABLE `player_awards` (
  `Award_ID` int(11) NOT NULL,
  `Player_ID` int(11) DEFAULT NULL,
  `Season` int(11) DEFAULT NULL,
  `Award_Type` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `player_awards`
--

INSERT INTO `player_awards` (`Award_ID`, `Player_ID`, `Season`, `Award_Type`) VALUES
(1, 8, 2022, 'Yılın En Değerli Oyuncusu'),
(2, 10, 2022, 'Yılın En Gelişen Oyuncusu'),
(5, 9, 2022, 'Yılın En Golcü Oyuncusu'),
(6, 7, 2021, 'Yılın En Değerli Oyuncusu'),
(7, 11, 2021, 'Yılın En Gelişen Oyuncusu');

-- --------------------------------------------------------

--
-- Table structure for table `punished_players`
--

CREATE TABLE `punished_players` (
  `Penalty_ID` int(11) NOT NULL,
  `Player_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `punished_players`
--

INSERT INTO `punished_players` (`Penalty_ID`, `Player_ID`) VALUES
(1, 7),
(2, 11),
(3, 3),
(4, 10),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

CREATE TABLE `referees` (
  `Referee_ID` int(11) NOT NULL,
  `Year_Of_Experience` int(11) DEFAULT NULL,
  `Full_Name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `referees`
--

INSERT INTO `referees` (`Referee_ID`, `Year_Of_Experience`, `Full_Name`) VALUES
(1, 10, 'Ali Palabıyık'),
(2, 8, 'Mete Kalkavan'),
(3, 18, 'Hüseyin Göcek'),
(4, 4, 'Zorbay Küçük'),
(5, 2, 'Yasin Kol'),
(6, 0, 'Çağdaş Altay'),
(7, 11, 'Volkan Bayarslan');

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

CREATE TABLE `stadiums` (
  `Stadium_ID` int(11) NOT NULL,
  `Stadium_Name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`Stadium_ID`, `Stadium_Name`) VALUES
(1, 'Nef Stadyumu'),
(2, 'Sükrü Saraçoğlu Stadyumu'),
(3, 'Vodafone Park'),
(4, 'Atatürk Olimpiyat Stadyumu'),
(5, 'Şenol Güneş Spor Kompleksi'),
(6, 'Yeni Adana Stadyumu'),
(7, 'Antalya Stadyumu'),
(8, 'Yeni Hatay Stadyumu');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `Transfer_ID` int(11) NOT NULL,
  `Contract_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`Transfer_ID`, `Contract_Date`) VALUES
(1, '2022-12-01 10:30:00'),
(2, '2022-12-01 18:40:00'),
(3, '2022-12-03 23:50:30'),
(4, '2022-12-19 19:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`Award_ID`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`Club_ID`);

--
-- Indexes for table `club_managers`
--
ALTER TABLE `club_managers`
  ADD UNIQUE KEY `Manager_ID` (`Manager_ID`,`Club_ID`,`Tenure`),
  ADD KEY `Club_ID` (`Club_ID`);

--
-- Indexes for table `club_owns`
--
ALTER TABLE `club_owns`
  ADD UNIQUE KEY `Stadium_ID` (`Stadium_ID`,`Club_ID`),
  ADD KEY `Club_ID` (`Club_ID`);

--
-- Indexes for table `club_roster`
--
ALTER TABLE `club_roster`
  ADD PRIMARY KEY (`Club_ID`,`Player_ID`),
  ADD KEY `Club_ID` (`Club_ID`,`Player_ID`),
  ADD KEY `club_roster_2` (`Player_ID`);

--
-- Indexes for table `club_transfers`
--
ALTER TABLE `club_transfers`
  ADD PRIMARY KEY (`Transfer_ID`),
  ADD UNIQUE KEY `Transfer_ID` (`Transfer_ID`,`Club_ID`),
  ADD KEY `Club_ID` (`Club_ID`),
  ADD KEY `club_transfers_ibfk_3` (`Player_ID`);

--
-- Indexes for table `cups`
--
ALTER TABLE `cups`
  ADD PRIMARY KEY (`Cup_ID`);

--
-- Indexes for table `cup_champions`
--
ALTER TABLE `cup_champions`
  ADD UNIQUE KEY `Cup_ID` (`Cup_ID`,`Club_ID`,`Season`),
  ADD KEY `Club_ID` (`Club_ID`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`League_ID`);

--
-- Indexes for table `league_roster`
--
ALTER TABLE `league_roster`
  ADD UNIQUE KEY `League_ID` (`League_ID`,`Club_ID`),
  ADD KEY `Club_ID` (`Club_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`Manager_ID`);

--
-- Indexes for table `manager_awards`
--
ALTER TABLE `manager_awards`
  ADD PRIMARY KEY (`Award_ID`),
  ADD KEY `Manager_ID` (`Manager_ID`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`Match_ID`),
  ADD KEY `Guest_ID` (`Guest_ID`),
  ADD KEY `Referee_ID` (`Referee_ID`),
  ADD KEY `Host_ID` (`Host_ID`);

--
-- Indexes for table `penalty`
--
ALTER TABLE `penalty`
  ADD PRIMARY KEY (`Penalty_ID`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `player_awards`
--
ALTER TABLE `player_awards`
  ADD PRIMARY KEY (`Award_ID`),
  ADD KEY `Player_ID` (`Player_ID`);

--
-- Indexes for table `punished_players`
--
ALTER TABLE `punished_players`
  ADD PRIMARY KEY (`Penalty_ID`,`Player_ID`),
  ADD KEY `punished_players_ibfk_2` (`Player_ID`);

--
-- Indexes for table `referees`
--
ALTER TABLE `referees`
  ADD PRIMARY KEY (`Referee_ID`);

--
-- Indexes for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`Stadium_ID`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`Transfer_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `Award_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `Club_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cups`
--
ALTER TABLE `cups`
  MODIFY `Cup_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `League_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `Manager_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `Match_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penalty`
--
ALTER TABLE `penalty`
  MODIFY `Penalty_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `referees`
--
ALTER TABLE `referees`
  MODIFY `Referee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `Stadium_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `Transfer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `club_managers`
--
ALTER TABLE `club_managers`
  ADD CONSTRAINT `club_managers_ibfk_1` FOREIGN KEY (`Manager_ID`) REFERENCES `manager` (`Manager_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `club_managers_ibfk_2` FOREIGN KEY (`Club_ID`) REFERENCES `clubs` (`Club_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `club_owns`
--
ALTER TABLE `club_owns`
  ADD CONSTRAINT `club_owns_ibfk_1` FOREIGN KEY (`Stadium_ID`) REFERENCES `stadiums` (`Stadium_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `club_owns_ibfk_2` FOREIGN KEY (`Club_ID`) REFERENCES `clubs` (`Club_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `club_roster`
--
ALTER TABLE `club_roster`
  ADD CONSTRAINT `club_roster_ibfk_1` FOREIGN KEY (`Club_ID`) REFERENCES `clubs` (`Club_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `club_roster_ibfk_2` FOREIGN KEY (`Player_ID`) REFERENCES `players` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `club_transfers`
--
ALTER TABLE `club_transfers`
  ADD CONSTRAINT `club_transfers_ibfk_1` FOREIGN KEY (`Transfer_ID`) REFERENCES `transfers` (`Transfer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `club_transfers_ibfk_2` FOREIGN KEY (`Club_ID`) REFERENCES `clubs` (`Club_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `club_transfers_ibfk_3` FOREIGN KEY (`Player_ID`) REFERENCES `players` (`player_id`);

--
-- Constraints for table `cup_champions`
--
ALTER TABLE `cup_champions`
  ADD CONSTRAINT `cup_champions_ibfk_1` FOREIGN KEY (`Cup_ID`) REFERENCES `cups` (`Cup_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cup_champions_ibfk_2` FOREIGN KEY (`Club_ID`) REFERENCES `clubs` (`Club_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `league_roster`
--
ALTER TABLE `league_roster`
  ADD CONSTRAINT `league_roster_ibfk_1` FOREIGN KEY (`Club_ID`) REFERENCES `clubs` (`Club_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `league_roster_ibfk_2` FOREIGN KEY (`League_ID`) REFERENCES `leagues` (`League_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `manager_awards`
--
ALTER TABLE `manager_awards`
  ADD CONSTRAINT `manager_awards_ibfk_1` FOREIGN KEY (`Award_ID`) REFERENCES `awards` (`Award_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manager_awards_ibfk_2` FOREIGN KEY (`Manager_ID`) REFERENCES `manager` (`Manager_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `match_ibfk_1` FOREIGN KEY (`Guest_ID`) REFERENCES `clubs` (`Club_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `match_ibfk_2` FOREIGN KEY (`Referee_ID`) REFERENCES `referees` (`Referee_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `match_ibfk_3` FOREIGN KEY (`Host_ID`) REFERENCES `clubs` (`Club_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `player_awards`
--
ALTER TABLE `player_awards`
  ADD CONSTRAINT `player_awards_ibfk_1` FOREIGN KEY (`Player_ID`) REFERENCES `players` (`player_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `player_awards_ibfk_2` FOREIGN KEY (`Award_ID`) REFERENCES `awards` (`Award_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `punished_players`
--
ALTER TABLE `punished_players`
  ADD CONSTRAINT `punished_players_ibfk_1` FOREIGN KEY (`Penalty_ID`) REFERENCES `penalty` (`Penalty_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `punished_players_ibfk_2` FOREIGN KEY (`Player_ID`) REFERENCES `players` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
