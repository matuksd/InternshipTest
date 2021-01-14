-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 11:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `produkti`
--

CREATE TABLE `produkti` (
  `id` int(11) NOT NULL,
  `SKU` varchar(16) COLLATE utf8_bin NOT NULL,
  `Name` varchar(16) COLLATE utf8_bin NOT NULL,
  `Price` float NOT NULL,
  `Type` enum('DVD-disc','Book','Furniture','') COLLATE utf8_bin NOT NULL,
  `Attribute` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `produkti`
--

INSERT INTO `produkti` (`id`, `SKU`, `Name`, `Price`, `Type`, `Attribute`) VALUES
(85, 'TATATA', 'TATATA', 444, 'Furniture', '31x31x31'),
(86, 'T1t1t', 'ttetete', 4, 'DVD-disc', '55'),
(87, 'DADADAD', 'DADdddd', 4, 'Book', '555'),
(119, 'FFFFF', 'DFEFEFEF', 4.43, 'DVD-disc', '55.33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produkti`
--
ALTER TABLE `produkti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SKU` (`SKU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produkti`
--
ALTER TABLE `produkti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
