-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 06:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emisije`
--

-- --------------------------------------------------------

--
-- Table structure for table `emisija`
--

CREATE TABLE `emisija` (
  `IDEmisije` varchar(30) NOT NULL,
  `Naziv` varchar(30) DEFAULT NULL,
  `Vreme` time DEFAULT NULL,
  `RadniDan` tinyint(1) NOT NULL,
  `Vikend` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emisija`
--

INSERT INTO `emisija` (`IDEmisije`, `Naziv`, `Vreme`, `RadniDan`, `Vikend`) VALUES
('1', 'Jutarnji Program', '06:00:00', 1, 1),
('10', 'Film3', '02:00:00', 1, 1),
('11', 'Muzika', '04:00:00', 1, 1),
('12', 'Crtani film', '09:00:00', 1, 1),
('13', 'Emisija1', '12:00:00', 1, 0),
('14', 'Talk show', '22:00:00', 0, 1),
('15', 'Kviz1', '14:00:00', 0, 1),
('16', 'Sportski Kviz', '18:00:00', 1, 0),
('17', 'Kviz2', '19:00:00', 1, 0),
('18', 'Emisija2', '12:00:00', 0, 1),
('2', 'Dnevnik', '20:00:00', 1, 1),
('3', 'Vremenska prognoza', '21:00:00', 1, 1),
('4', 'Sportske vesti', '17:00:00', 1, 1),
('5', 'Serija2', '15:00:00', 1, 1),
('6', 'Prenos utakmice', '18:00:00', 0, 1),
('7', 'Serija', '14:00:00', 1, 0),
('8', 'Film', '22:00:00', 1, 0),
('9', 'Film2', '00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emisijatip`
--

CREATE TABLE `emisijatip` (
  `IDEmisije` varchar(30) NOT NULL,
  `IDTipa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emisijatip`
--

INSERT INTO `emisijatip` (`IDEmisije`, `IDTipa`) VALUES
('1', 'tip2'),
('1', 'tip3'),
('2', 'tip2'),
('3', 'tip2'),
('4', 'tip1'),
('4', 'tip2'),
('5', 'tip5'),
('5', 'tip3'),
('6', 'tip1'),
('7', 'tip5'),
('7', 'tip3'),
('8', 'tip3'),
('8', 'tip4'),
('9', 'tip3'),
('9', 'tip4'),
('10', 'tip3'),
('10', 'tip4'),
('11', 'tip3'),
('11', 'tip8'),
('12', 'tip7'),
('12', 'tip3'),
('13', 'tip3'),
('14', 'tip3'),
('14', 'tip8'),
('15', 'tip3'),
('15', 'tip6'),
('15', 'tip8'),
('16', 'tip3'),
('16', 'tip1'),
('17', 'tip3'),
('17', 'tip6'),
('18', 'tip3'),
('18', 'tip8');

-- --------------------------------------------------------

--
-- Table structure for table `tipemisije`
--

CREATE TABLE `tipemisije` (
  `IDTipa` varchar(30) NOT NULL,
  `NazivTipa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipemisije`
--

INSERT INTO `tipemisije` (`IDTipa`, `NazivTipa`) VALUES
('tip1', 'Sport'),
('tip2', 'Vesti'),
('tip3', 'ZabavniProgram'),
('tip4', 'Film'),
('tip5', 'Serija'),
('tip6', 'Kviz'),
('tip7', 'DecijiProgram'),
('tip8', 'Muzika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emisija`
--
ALTER TABLE `emisija`
  ADD PRIMARY KEY (`IDEmisije`);

--
-- Indexes for table `emisijatip`
--
ALTER TABLE `emisijatip`
  ADD KEY `IDEmisije` (`IDEmisije`),
  ADD KEY `IDTipa` (`IDTipa`);

--
-- Indexes for table `tipemisije`
--
ALTER TABLE `tipemisije`
  ADD PRIMARY KEY (`IDTipa`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emisijatip`
--
ALTER TABLE `emisijatip`
  ADD CONSTRAINT `emisijatip_ibfk_1` FOREIGN KEY (`IDEmisije`) REFERENCES `emisija` (`IDEmisije`),
  ADD CONSTRAINT `emisijatip_ibfk_2` FOREIGN KEY (`IDTipa`) REFERENCES `tipemisije` (`IDTipa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
