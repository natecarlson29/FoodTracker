-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 04:42 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncarlsonprogram3`
--
CREATE DATABASE IF NOT EXISTS `ncarlsonprogram3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ncarlsonprogram3`;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `foodID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `calories` decimal(5,2) DEFAULT NULL,
  `protein` decimal(5,2) DEFAULT NULL,
  `userNameAdded` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

-- --------------------------------------------------------

--
-- Table structure for table `loggedfoodentries`
--

CREATE TABLE `loggedfoodentries` (
  `username` varchar(55) DEFAULT NULL,
  `foodID` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `logID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loggedfoodentries`
--

INSERT INTO `loggedfoodentries` (`username`, `foodID`, `date`, `logID`) VALUES
('Nate', 2, '06/06/2019', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', '$2y$12$fzuvrT56ifU2sWCRAMYGiu63Vj/LPKDppgJ0vcrYLghOWrwDBBJqW'),
('Bobby', '$2y$12$PQKOm9w5mlIQEpGHZ1pIrughIP9XCyZ9UncVTtyzxolTwyl9E7Xj6'),
('Nate', '$2y$12$DNH91xacNbi8XsIBo2Av1upFuGRZuEtbOE3UWTuOY7oT75MMcdUSi'),
('tester', '$2y$12$NJWDu6cst2TXMyo4pHBkLOB/e7TiBYrcrROqy6FAvlF8lhCaX78TC'),
('User1', '$2y$12$TMVB6X1SpJjR9CCD5YR94ucjns./ehr5bWIpa1EHqeG5RYBnjIqoG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`foodID`),
  ADD KEY `foodsuserFK` (`userNameAdded`);

--
-- Indexes for table `loggedfoodentries`
--
ALTER TABLE `loggedfoodentries`
  ADD PRIMARY KEY (`logID`),
  ADD KEY `lfeUsername` (`username`),
  ADD KEY `lfeFoodID` (`foodID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `loggedfoodentries`
--
ALTER TABLE `loggedfoodentries`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foodsuserFK` FOREIGN KEY (`userNameAdded`) REFERENCES `users` (`username`);

--
-- Constraints for table `loggedfoodentries`
--
ALTER TABLE `loggedfoodentries`
  ADD CONSTRAINT `lfeFoodID` FOREIGN KEY (`foodID`) REFERENCES `foods` (`foodID`),
  ADD CONSTRAINT `lfeUsername` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
