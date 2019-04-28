-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2019 at 05:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IITGMessRating`
--

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `Username` varchar(50) NOT NULL,
  `HostelSubscribed` varchar(30) NOT NULL,
  `Feedback` varchar(50000) NOT NULL,
  `YearMonth` varchar(10) NOT NULL,
  `Rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Hostels`
--

CREATE TABLE `Hostels` (
  `Name` varchar(30) NOT NULL,
  `MMUsername` varchar(50) NOT NULL,
  `MMPassword` varchar(50) NOT NULL,
  `MMName` varchar(50) NOT NULL,
  `MMContactNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Hostels`
--

INSERT INTO `Hostels` (`Name`, `MMUsername`, `MMPassword`, `MMName`, `MMContactNumber`) VALUES
('Kapili', 'kapili', '342a588bb029dc5d9faa4f2c88a672a1', 'Amitabh Bachhan', '8860695878'),
('Lohit', 'lohit', 'facb6460875b14ea8f8cdacdb38a90cf', 'Rohit Shetty', '8402028442');

-- --------------------------------------------------------

--
-- Table structure for table `Keywords`
--

CREATE TABLE `Keywords` (
  `KeyName` varchar(50) NOT NULL,
  `Value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Keywords`
--

INSERT INTO `Keywords` (`KeyName`, `Value`) VALUES
('Excellent', 5),
('Pathetic', -5);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `RollNumber` varchar(20) NOT NULL DEFAULT '-',
  `Name` varchar(100) NOT NULL,
  `HostelReside` varchar(30) NOT NULL DEFAULT '-',
  `HostelSubscribed` varchar(30) NOT NULL DEFAULT '-',
  `HostelNew` varchar(30) NOT NULL DEFAULT '-',
  `Program` varchar(10) NOT NULL DEFAULT '-',
  `Designation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Username`, `Password`, `RollNumber`, `Name`, `HostelReside`, `HostelSubscribed`, `HostelNew`, `Program`, `Designation`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '-', 'Admin', '-', '-', '-', '-', 'admin'),
('baran170102035', '202cb962ac59075b964b07152d234b70', '170101084', 'Mayank Baranwal', 'Kapili', 'Kapili', 'Kameng', 'B.Tech.', 'student'),
('udbha170123055', '202cb962ac59075b964b07152d234b70', '170101081', 'Udbhav Chugh', 'Lohit', 'Kapili', 'Manas', 'B.Tech.', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Hostels`
--
ALTER TABLE `Hostels`
  ADD PRIMARY KEY (`MMUsername`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
