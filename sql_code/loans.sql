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
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `ln_id` int(12) NOT NULL,
  `m_id` int(12) NOT NULL,
  `s_date` date NOT NULL,
  `last_paid` date NOT NULL,
  `paid` int(50) NOT NULL,
  `to_be_paid` int(11) NOT NULL,
  `sts` varchar(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `ln_amount` int(8) NOT NULL,
  `loan_end` date NOT NULL,
  `interest_rate` int(25) NOT NULL,
  `next_date` date NOT NULL,
  `loan_type` varchar(34) NOT NULL,
  `emi` int(25) NOT NULL,
  `si` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`ln_id`, `m_id`, `s_date`, `last_paid`, `paid`, `to_be_paid`, `sts`, `amount`, `ln_amount`, `loan_end`, `interest_rate`, `next_date`, `loan_type`, `emi`, `si`) VALUES
(87, 2, '2022-01-08', '2022-01-08', 68004, -4, 'complete', 50000, 62333, '2023-01-03', 3, '2023-01-03', 'Agriculture Loan', 5667, 0),
(800, 9, '2022-01-09', '2022-01-09', 5667, 62333, 'pending', 50000, 62333, '2023-01-04', 3, '2022-02-08', 'Agriculture Loan', 5667, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `m_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
