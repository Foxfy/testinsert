-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 04:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testinsert`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowed_provinces`
--

CREATE TABLE `allowed_provinces` (
  `id` int(11) NOT NULL,
  `competitions_id` int(11) NOT NULL,
  `provinces_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allowed_provinces`
--

INSERT INTO `allowed_provinces` (`id`, `competitions_id`, `provinces_id`) VALUES
(1, 2, 2),
(2, 2, 3),
(3, 2, 4),
(4, 2, 5),
(5, 2, 6),
(6, 2, 7),
(7, 2, 8),
(8, 2, 9),
(9, 2, 10),
(10, 2, 11),
(11, 2, 12),
(12, 3, 1),
(13, 3, 2),
(14, 3, 3),
(15, 3, 4),
(16, 3, 5),
(17, 3, 6),
(18, 3, 7),
(19, 3, 8),
(20, 3, 9),
(21, 3, 10),
(22, 3, 11),
(23, 3, 12),
(24, 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `slug` varchar(60) NOT NULL,
  `max_teams` int(11) NOT NULL,
  `banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id`, `name`, `slug`, `max_teams`, `banner`) VALUES
(1, 'test1', 'tes1', 12, ''),
(2, 'test2', 'tes2', 12, ''),
(3, 'Bangkok Cup', 'BKC', 16, 'bangkok.png'),
(6, '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `join_teams`
--

CREATE TABLE `join_teams` (
  `id` int(11) NOT NULL,
  `competitions_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `join_teams`
--

INSERT INTO `join_teams` (`id`, `competitions_id`, `team_id`) VALUES
(1, 3, 6),
(2, 3, 8),
(3, 3, 9),
(4, 3, 6),
(5, 3, 7),
(6, 3, 8),
(7, 3, 11),
(8, 3, 6),
(9, 3, 7),
(10, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'กรุงเทพมหานคร'),
(2, 'กระบี่'),
(3, 'กาญจนบุรี'),
(4, 'กาฬสินธุ์'),
(5, 'กำแพงเพชร'),
(6, 'ขอนแก่น'),
(7, 'จันทบุรี'),
(8, 'ฉะเชิงเทรา'),
(9, 'ชลบุรี'),
(10, 'ชัยนาท'),
(11, 'ชัยภูมิ'),
(12, 'ชุมพร'),
(13, 'ตรัง'),
(14, 'ตราด'),
(15, 'ตาก'),
(16, 'นครนายก'),
(17, 'นครปฐม'),
(18, 'นครพนม'),
(19, 'นครราชสีมา'),
(20, 'นครศรีธรรมราช'),
(21, 'นครสวรรค์'),
(22, 'นนทบุรี'),
(23, 'นราธิวาส'),
(24, 'น่าน'),
(25, 'บึงกาฬ'),
(26, 'บุรีรัมย์'),
(27, 'ปทุมธานี'),
(28, 'ประจวบคีรีขันธ์'),
(29, 'ปราจีนบุรี'),
(30, 'ปัตตานี'),
(31, 'พระนครศรีอยุธยา'),
(32, 'พะเยา'),
(33, 'พังงา'),
(34, 'พัทลุง'),
(35, 'พิจิตร'),
(36, 'พิษณุโลก'),
(37, 'ภูเก็ต'),
(38, 'มหาสารคาม'),
(39, 'มุกดาหาร'),
(40, 'ยะลา'),
(41, 'ยโสธร'),
(42, 'ระนอง'),
(43, 'ระยอง'),
(44, 'ราชบุรี'),
(45, 'ร้อยเอ็ด'),
(46, 'ลพบุรี'),
(47, 'ลำปาง'),
(48, 'ลำพูน'),
(49, 'ศรีสะเกษ'),
(50, 'สกลนคร'),
(51, 'สงขลา'),
(52, 'สตูล'),
(53, 'สมุทรปราการ'),
(54, 'สมุทรสงคราม'),
(55, 'สมุทรสาคร'),
(56, 'สระบุรี'),
(57, 'สระแก้ว'),
(58, 'สิงห์บุรี'),
(59, 'สุพรรณบุรี'),
(60, 'สุราษฎร์ธานี'),
(61, 'สุรินทร์'),
(62, 'สุโขทัย'),
(63, 'หนองคาย'),
(64, 'หนองบัวลำภู'),
(65, 'อำนาจเจริญ'),
(66, 'อุดรธานี'),
(67, 'อุตรดิตถ์'),
(68, 'อุทัยธานี'),
(69, 'อุบลราชธานี'),
(70, 'อ่างทอง'),
(71, 'เชียงราย'),
(72, 'เชียงใหม่'),
(73, 'เพชรบุรี'),
(74, 'เพชรบูรณ์'),
(75, 'เลย'),
(76, 'แพร่'),
(77, 'แม่ฮ่องสอน');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(60) NOT NULL,
  `province_id` int(11) NOT NULL,
  `logo_team` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `province_id`, `logo_team`) VALUES
(6, 'team1', 10, ''),
(7, 'test2', 1, 'Clot01.gif'),
(8, 'test3', 2, 'Clot17.gif'),
(9, 'test4', 15, 'Clot21.gif'),
(11, 'test77', 77, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowed_provinces`
--
ALTER TABLE `allowed_provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competitions_id` (`competitions_id`),
  ADD KEY `provinces_id` (`provinces_id`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `join_teams`
--
ALTER TABLE `join_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competitions_id` (`competitions_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowed_provinces`
--
ALTER TABLE `allowed_provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `join_teams`
--
ALTER TABLE `join_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allowed_provinces`
--
ALTER TABLE `allowed_provinces`
  ADD CONSTRAINT `allowed_provinces_ibfk_1` FOREIGN KEY (`competitions_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allowed_provinces_ibfk_2` FOREIGN KEY (`provinces_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `join_teams`
--
ALTER TABLE `join_teams`
  ADD CONSTRAINT `join_teams_ibfk_1` FOREIGN KEY (`competitions_id`) REFERENCES `competitions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `join_teams_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
