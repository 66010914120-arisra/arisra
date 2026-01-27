-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 06:01 AM
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
-- Database: `4063db`
--
CREATE DATABASE IF NOT EXISTS `4063db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `4063db`;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `applicant_id` int(11) NOT NULL,
  `job_position` varchar(100) NOT NULL COMMENT 'ตำแหน่งที่ต้องการสมัคร (Software_Engineer, Data_Analyst ฯลฯ)',
  `prefix` enum('นาย','นาง','นางสาว') NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `full_name` varchar(255) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `birth_date` date NOT NULL COMMENT 'วันเดือนปีเกิด',
  `education_level` varchar(50) NOT NULL COMMENT 'ระดับการศึกษาสูงสุด (ปริญญาตรี, ปวช ฯลฯ)',
  `skills` text DEFAULT NULL COMMENT 'ความสามารถพิเศษ/ทักษะอื่นๆ',
  `experience` text DEFAULT NULL COMMENT 'ประสบการณ์ทำงานโดยย่อ',
  `application_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่ส่งใบสมัคร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`applicant_id`, `job_position`, `prefix`, `full_name`, `birth_date`, `education_level`, `skills`, `experience`, `application_date`) VALUES
(1, 'Software_Engineer', 'นางสาว', 'สุพัตรา หาญกุดเลาะ', '2025-12-20', 'ปริญญาโท', 'เชี่ยวชาญภาษษต่างประเทศ', 'เคยเป็นผู้จัดการ', '2025-12-15 17:00:00'),
(2, 'Software_Engineer', 'นางสาว', 'สุพัตรา หาญกุดเลาะ', '2025-12-20', 'ปริญญาโท', 'เชี่ยวชาญภาษษต่างประเทศ', 'เคยเป็นผู้จัดการ', '2025-12-15 17:00:00'),
(3, 'Software_Engineer', 'นางสาว', 'สุพัตรา หาญกุดเลาะ', '2025-12-20', 'ปริญญาโท', 'เชี่ยวชาญภาษษต่างประเทศ', 'เคยเป็นผู้จัดการ', '2025-12-15 17:00:00'),
(4, 'Software_Engineer', 'นางสาว', 'สุพัตรา หาญกุดเลาะ', '2025-12-20', 'ปริญญาโท', 'เชี่ยวชาญภาษษต่างประเทศ', 'เคยเป็นผู้จัดการ', '2025-12-15 17:00:00'),
(5, 'Software_Engineer', 'นางสาว', 'สุพัตรา หาญกุดเลาะ', '2025-12-17', 'ปริญญาเอก', 'นอนทั้งวัน', 'ไม่มี', '2025-12-15 17:00:00'),
(6, 'Marketing_Specialist', 'นาย', 'มีชัย ชนะ', '2025-12-19', 'ปริญญาตรี', 'ร้องเพลงได้', 'ทำงานโรงงาน 8ปี', '2025-12-15 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(6) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_phone` varchar(100) NOT NULL,
  `r_height` int(3) NOT NULL,
  `r_color` varchar(7) NOT NULL,
  `r_major` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `r_name`, `r_phone`, `r_height`, `r_color`, `r_major`) VALUES
(1, 'สุพัตราหาญกุดเลาะ', '099365842315', 160, '#0d6efd', 'การบัญชี'),
(2, 'มานี มีใจ', '445233658825', 170, '#fdf50d', 'คอมพิวเตอร์ธุรกิจ'),
(3, 'ชูชัย มีสติ', '0988895632', 140, '#fd490d', 'การตลาด'),
(4, 'ตะวัน ดวงเด่น', '0236954411', 165, '#0dfdcd', 'การจัดการ'),
(5, 'สุดที่รัก มานะสัน', '0238854422', 170, '#29fd0d', 'คอมพิวเตอร์ธุรกิจ'),
(6, 'ยุทยง ยงยุท', '0993658423', 140, '#f9fd0d', 'คอมพิวเตอร์ธุรกิจ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
