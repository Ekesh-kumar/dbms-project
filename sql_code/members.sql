-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 03:51 PM
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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `m_id` int(6) NOT NULL,
  `m_name` varchar(16) NOT NULL,
  `password` varchar(300) NOT NULL,
  `adhaar` varchar(17) NOT NULL,
  `r_card` varchar(20) NOT NULL,
  `adress` varchar(500) NOT NULL,
  `email_id` varchar(300) NOT NULL,
  `ph_no` varchar(10) NOT NULL,
  `a_set` int(11) NOT NULL,
  `p_set` int(11) NOT NULL,
  `f_set` int(11) NOT NULL,
  `ln_set` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`m_id`, `m_name`, `password`, `adhaar`, `r_card`, `adress`, `email_id`, `ph_no`, `a_set`, `p_set`, `f_set`, `ln_set`) VALUES
(2, 'suresh', '$2y$10$JmpPcWQszsxAjJQO0exlteF/afPD7FKqlLDG.FLfDQ8ir6Cw6mioC', '966279951327', '988738338', 'Mayasandra 572221', 'ekesh@gmail.com', '9844482180', 1, 1, 0, 0),
(3, 'Ekesh', '$2y$10$TtayTRUrMLgUtVfM4DkFjeYiAy4Vmoq5UUXwPpOcZnaFpdQmV5W0S', '966279951326', '988738337', 'Mayasandra 572221', 'ekesh@gmail.com', '9844482189', 1, 1, 0, 0),
(7, 'Rakshith', '$2y$10$tWvcp2.RXM1lGj/g5EkrsOxstNEWbMdqx7afK2Co3RWbNdWC8uCL.', '966279951327', '988738338', 'Mayasandra 572221', 'rakshith@gmail.com', '9844482187', 0, 1, 0, 0),
(9, 'Hemanth', '$2y$10$c1zcqSdO5wATPPcPJx4TQO4St.MCQ.TLWizPwa0.nNo7djaSrIFZy', '966279951327', '1001200710', 'Chikkashetty Kere -572221', 'Hemanth@gmail.com', '9844482180', 1, 1, 0, 1),
(1000, 'admin', '$2y$10$AzXyTyxo7RoGLNUFgXkXie1YWjIgPI6x88klWdmPZAnuF47B2Wq46', '966279951327', '988738338', 'Mayasandra 572221', 'admin@gmail.com', '9844482187', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `m_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
