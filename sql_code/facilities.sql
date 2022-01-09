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
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `f_id` int(10) NOT NULL,
  `F_name` varchar(50) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `Cost` int(9) NOT NULL,
  `Composition` varchar(25) NOT NULL,
  `Stock` int(5) NOT NULL,
  `unit` varchar(8) NOT NULL,
  `f_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`f_id`, `F_name`, `c_name`, `Cost`, `Composition`, `Stock`, `unit`, `f_type`) VALUES
(11, 'Urea', 'National Fertilizers', 80, 'N:P:K(46:0:0)', 45, 'kg', 'fertilizer'),
(12, 'DAP', 'Chambal Fertilizers and chemical Limited', 120, 'N:P:K(18:46:0)', 50, 'ltr', 'fertilzer'),
(13, 'Anhydrous Ammonia', 'IFFCO', 40, 'N:P:K(82:0:0)', 50, 'KG', 'fertilizer'),
(14, 'Ammonium Nitrate', 'Ec fertilizer', 500, 'N:P:K(34:0:0)', 50, '100g', 'fertilizer'),
(15, 'Ammonium poly phosphate', 'GAEP SUPER ETEL', 260, 'N:P:K(15:60:00)', 50, 'ltr', 'fertilizer'),
(16, 'Pottasium nitrate', 'ZFC limiited', 610, 'N:P:K(14:0:44)', 50, 'KG', 'fertilizer'),
(17, 'Phosphate rock', 'Gaja green', 75, 'N:P:K(0:3:0)', 50, 'KG', 'fertilizer'),
(18, 'Bone black spent', 'Dr Earth', 135, 'N:P:K(1:33:0)', 50, 'kg', 'fertilizer'),
(19, 'Nitric Phosphate', 'Mahadhan', 225, 'N:P:K(22:10:0)', 50, 'KG', 'fertilizer'),
(20, 'Calcium Nitrate', 'go garden', 239, 'N:P:K(15:5:0)', 50, 'kg', 'fertilizer'),
(21, 'Finger Millet', 'Anand', 22, '', 50, 'kg', 'seeds'),
(22, 'Paddy', 'Mahyco indra', 216, '', 50, 'kg', 'seeds'),
(23, 'Sunflower seeds', 'Shresta', 350, '', 50, 'kg', 'seeds'),
(24, 'Sesame', 'Indra', 90, '', 50, 'kg', 'seeds'),
(25, 'Basil', 'Profchef', 299, '', 50, 'kg', 'seeds'),
(26, 'Rajma', 'Vedaka', 345, '', 50, 'kg', 'seeds'),
(27, 'Tomato seeds', 'Samrudh ', 180, '`', 50, 'kg', 'seeds'),
(28, 'Clinton', 'Crystal', 380, '', 50, 'ltr', 'weedicide'),
(29, 'Glycocin', 'Acron', 330, '', 50, 'ltr', 'weedicide'),
(30, 'MT-30', 'Tafgor', 490, '', 50, 'ltr', 'weedicide'),
(31, 'Admire', 'Bayer', 756, '', 50, 'ltr', 'weedicide'),
(32, 'karate', 'Syngenta', 83, '', 50, 'ltr', 'weedicide'),
(33, 'Glycel', 'Systematic Excel Crop care limited', 400, '', 50, 'ltr', 'weedicide'),
(34, 'Kem', 'Maharast Bio Fertilizers', 140, '', 50, 'kg', 'weedicide'),
(35, 'Ammonium poly phosphate', 'GAEP SUPER ETEL', 260, 'N:P:K(15:60:00)', 50, 'ltr', 'fertilizer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
