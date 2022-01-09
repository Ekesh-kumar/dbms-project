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
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `m_id` int(6) NOT NULL,
  `abalance` int(5) NOT NULL,
  `interest` int(7) NOT NULL,
  `date_start` date NOT NULL,
  `c_date` date NOT NULL DEFAULT current_timestamp(),
  `last_spaid` date NOT NULL,
  `ac_no` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`m_id`, `abalance`, `interest`, `date_start`, `c_date`, `last_spaid`, `ac_no`) VALUES
(2, 200227, 15, '2022-01-09', '2022-01-09', '2022-01-09', '57'),
(3, 5098, 4, '2021-12-31', '2022-01-08', '2021-12-31', '966783339'),
(9, 50000, 0, '2022-01-09', '2022-01-09', '2022-01-09', '8992');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`m_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `savings`
--
ALTER TABLE `savings`
  ADD CONSTRAINT `savings_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `members` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
