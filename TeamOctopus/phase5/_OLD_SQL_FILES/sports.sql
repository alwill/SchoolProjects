-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 06, 2015 at 02:46 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
`ID` int(11) NOT NULL,
  `SPORT` varchar(5) DEFAULT NULL,
  `TEAM_1` varchar(20) DEFAULT NULL,
  `TEAM_2` varchar(20) DEFAULT NULL,
  `SCORE` varchar(10) DEFAULT NULL,
  `TIME` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`ID`, `SPORT`, `TEAM_1`, `TEAM_2`, `SCORE`, `TIME`) VALUES
(1, 'MLB', 'Cardinals', 'Cubs', '3-1', 'bot. 8'),
(2, 'MLB', 'Mets', 'Dodgers', '0-0', 'bot 1'),
(3, 'MLB', 'Royals', 'Blue Jays', '4-0', 'bot 7'),
(4, 'MLB', 'Yankees', 'Astros', '0-3', 'bot 2'),
(5, 'NFL', 'Rams', '49ers', '3-2', '2 qt'),
(6, 'NFL', 'Patriots', 'Lion', '33-20', 'FINAL'),
(7, 'NFL', 'Packers', 'Denver', '21-3', '3 qt'),
(8, 'NFL', 'Colts', 'Panthers', '23-21', 'FINAL'),
(9, 'NBA', 'Cavs', 'Bulls', '80-100', '3 qt'),
(10, 'NBA', 'Spurs', 'Warriors', '90-110', 'FINAL'),
(11, 'NBA', 'Bulls', 'Thunder', '85-43', '2 qt'),
(12, 'NBA', 'Rockets', 'Knicks', '52-40', '1 qt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;