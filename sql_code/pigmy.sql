-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 03:55 PM
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
-- Table structure for table `pigmy`
--

CREATE TABLE `pigmy` (
  `p_id` int(10) NOT NULL,
  `m_id` int(10) NOT NULL,
  `start` date NOT NULL,
  `last_deposited` date NOT NULL,
  `p_balance` int(10) NOT NULL,
  `interest` double(10,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pigmy`
--

INSERT INTO `pigmy` (`p_id`, `m_id`, `start`, `last_deposited`, `p_balance`, `interest`) VALUES
(57, 7, '2022-01-08', '2022-01-09', 3506, 0.3842191),
(123, 2, '2022-01-09', '2022-01-09', 500, 0.0000000),
(2000, 9, '2022-01-09', '2022-01-09', 1000, 0.0000000),
(966783339, 3, '2021-12-31', '2021-12-31', 5000, 0.0000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pigmy`
--
ALTER TABLE `pigmy`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `m_id` (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pigmy`
--
ALTER TABLE `pigmy`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=966783340;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pigmy`
--
ALTER TABLE `pigmy`
  ADD CONSTRAINT `pigmy_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `members` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
