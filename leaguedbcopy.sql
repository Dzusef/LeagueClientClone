-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 02 apr 2020 kl 10:56
-- Serverversion: 10.4.6-MariaDB
-- PHP-version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `leaguedbcopy`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `champions`
--

CREATE TABLE `champions` (
  `CName` char(255) NOT NULL,
  `Role` char(255) DEFAULT NULL,
  `Cost(BE)` int(11) NOT NULL,
  `Lore` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `champions`
--

INSERT INTO `champions` (`CName`, `Role`, `Cost(BE)`, `Lore`) VALUES
('Fizz', 'Assassin', 4800, NULL),
('Kaisa', 'Marksman', 6300, NULL),
('Thresh', 'Support', 4800, NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `customeraccounts`
--

CREATE TABLE `customeraccounts` (
  `AccID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `CurrencyBE` int(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `customeraccounts`
--

INSERT INTO `customeraccounts` (`AccID`, `Name`, `Password`, `Email`, `CurrencyBE`, `Status`) VALUES
(1, 'Hano', 'Hano123', 'Hardstuck@gmail.com', 625, 'Online'),
(2, 'V3nOmCrusader', 'Venom123', 'Forfunplayer@gmail.com', 6300, 'Offline'),
(3, 'Zhmoses', 'Retard', 'Zhmoses@gmail.com', 0, 'Online');

-- --------------------------------------------------------

--
-- Tabellstruktur `emotes`
--

CREATE TABLE `emotes` (
  `EName` char(255) NOT NULL,
  `Cost(BE)` int(11) NOT NULL,
  `Textuares` tinyblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `emotes`
--

INSERT INTO `emotes` (`EName`, `Cost(BE)`, `Textuares`) VALUES
('Despair', 500, NULL),
('Oh Darn', 500, NULL),
('Squee', 500, NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `friends`
--

CREATE TABLE `friends` (
  `AccID` int(11) NOT NULL,
  `AccIDFriend` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `matchhistory`
--

CREATE TABLE `matchhistory` (
  `GameID` int(11) NOT NULL,
  `KDA` varchar(255) DEFAULT NULL,
  `Match_lengthMinutes` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `matchhistory`
--

INSERT INTO `matchhistory` (`GameID`, `KDA`, `Match_lengthMinutes`) VALUES
(1, '2/26/10', 55),
(2, '12/1/2', 25),
(3, '3/1/0', 18);

-- --------------------------------------------------------

--
-- Tabellstruktur `skins`
--

CREATE TABLE `skins` (
  `SName` char(255) NOT NULL,
  `Cost(BE)` int(11) NOT NULL,
  `Textuares` tinyblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `skins`
--

INSERT INTO `skins` (`SName`, `Cost(BE)`, `Textuares`) VALUES
('Blood Moon Thresh', 975, NULL),
('Fisherman Fizz', 975, NULL),
('IG Kaisa', 975, NULL);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `champions`
--
ALTER TABLE `champions`
  ADD PRIMARY KEY (`CName`);

--
-- Index för tabell `customeraccounts`
--
ALTER TABLE `customeraccounts`
  ADD PRIMARY KEY (`AccID`);

--
-- Index för tabell `emotes`
--
ALTER TABLE `emotes`
  ADD PRIMARY KEY (`EName`);

--
-- Index för tabell `matchhistory`
--
ALTER TABLE `matchhistory`
  ADD PRIMARY KEY (`GameID`);

--
-- Index för tabell `skins`
--
ALTER TABLE `skins`
  ADD PRIMARY KEY (`SName`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `customeraccounts`
--
ALTER TABLE `customeraccounts`
  MODIFY `AccID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `matchhistory`
--
ALTER TABLE `matchhistory`
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
