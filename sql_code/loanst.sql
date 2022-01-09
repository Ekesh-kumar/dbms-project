-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 03:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `loanst`
--

CREATE TABLE `loanst` (
  `ln_type_id` int(5) NOT NULL,
  `type` varchar(500) NOT NULL,
  `amount` int(10) NOT NULL,
  `interest_rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loanst`
--

INSERT INTO `loanst` (`ln_type_id`, `type`, `amount`, `interest_rate`) VALUES
(11, 'Agriculture Loan', 50000, 3),
(22, 'Educational Loan', 80000, 5),
(33, 'Vehicle Loan', 500000, 7),
(44, 'Home Loan', 1500000, 10),
(55, 'Pigmy Loan', 200000, 5),
(66, 'Gold Loan', 8792, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loanst`
--
ALTER TABLE `loanst`
  ADD PRIMARY KEY (`ln_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loanst`
--
ALTER TABLE `loanst`
  MODIFY `ln_type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
