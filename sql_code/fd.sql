-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 03:53 PM
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
-- Table structure for table `fd`
--

CREATE TABLE `fd` (
  `f_id` int(9) NOT NULL,
  `m_id` int(7) NOT NULL,
  `start` date NOT NULL,
  `period` int(5) NOT NULL,
  `amount` int(20) NOT NULL,
  `interest` int(20) NOT NULL,
  `c_date` date NOT NULL,
  `no_of_days_left` int(11) NOT NULL,
  `g_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fd`
--

INSERT INTO `fd` (`f_id`, `m_id`, `start`, `period`, `amount`, `interest`, `c_date`, `no_of_days_left`, `g_amt`) VALUES
(57, 2, '2022-01-08', 12, 89999, 5, '2023-01-03', 0, 94499);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fd`
--
ALTER TABLE `fd`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `m_id` (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fd`
--
ALTER TABLE `fd`
  MODIFY `f_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fd`
--
ALTER TABLE `fd`
  ADD CONSTRAINT `fd_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `members` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
