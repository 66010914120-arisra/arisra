-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 05:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4120db`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_apply`
--

DROP TABLE IF EXISTS `job_apply`;
CREATE TABLE `job_apply` (
  `j_id` int(11) NOT NULL,
  `j_name` varchar(120) NOT NULL,
  `j_phone` varchar(15) NOT NULL,
  `j_email` varchar(120) NOT NULL,
  `j_position` varchar(80) NOT NULL,
  `j_note` varchar(255) DEFAULT NULL,
  `j_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_apply`
--

INSERT INTO `job_apply` (`j_id`, `j_name`, `j_phone`, `j_email`, `j_position`, `j_note`, `j_created`) VALUES
(1, 'อริศรา พวงมาลัย', '0902588977', 'arisra7796@gmail.com', 'พนักงานหน้าร้าน', 'ว่างงานช่วงเสาร์ อาทิตย์', '2025-12-16 04:06:57'),
(2, 'มีใจ รักมั่น', '0854678463', 'xlisa9610@gmail.com', 'พนักงานหน้าร้าน', 'ว่างงาน', '2025-12-16 04:07:49'),
(3, 'กุลสารา สานใจ', '0564781425', 'x610@gmail.com', 'พนักงานทั่วไป', 'ว่างวันจันทร์-ศุกร์', '2025-12-16 04:08:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD PRIMARY KEY (`j_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_apply`
--
ALTER TABLE `job_apply`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
