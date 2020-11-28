-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 11:03 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--
CREATE DATABASE IF NOT EXISTS `web` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `web`;

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE `classroom` (
  `id` int(11) NOT NULL,
  `classname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `date_create` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `classname`, `subject`, `room`, `email`, `img`, `date_create`, `token`) VALUES
(1, 'Lap trinh web t4c3', 'Lap trinh web', 'C401', 'hhung@gmail.com', '/img.png', '27-11-2020', '84afc38080c24e9c6fa22f799470586d'),
(2, 'Cong nghe phan mem t2c2', 'CNPM', 'C601', 'blightmedison313@gmail.com', 'images/img_violin2.jpg', '27-11-2020', '9901211752466b008b809382d37ba719'),
(3, 'Công nghệ phần mềm n2tt2', 'Công nghệ phần mềm', 'C202', 'blightmedison313@gmail.com', 'images/img_learnlanguage.jpg', '28-11-2020', '623f458a975fbad5770e78226fcdb503');

-- --------------------------------------------------------

--
-- Table structure for table `reset_token`
--

DROP TABLE IF EXISTS `reset_token`;
CREATE TABLE `reset_token` (
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `expire_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reset_token`
--

INSERT INTO `reset_token` (`email`, `token`, `expire_on`) VALUES
('blightmedison313@gmail.com', '27003566b8e32588b9db5bc8026ef320', 1606623243);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `hoten`, `ngaysinh`, `email`, `sdt`, `token`, `permission`) VALUES
('admin1', '$2y$10$lH2DA4pNECid/1zvQFyTq.zu4ASNvGvehnjDvUMIngB.u0UsFmhn2', 'Admin', '01/01/2000', 'admin@gmail.com', '0909090908', 'd05629be150ee366b795477f5f4bf54a', 0),
('hhung2', '$2y$10$m6RDI/8oc2B6HXukvWyNFu4GhFAPKnFCCSnK0boYD4yh3aAtZO9Iu', 'Hung Nguyen', '27/05/2000', 'blightmedison313@gmail.com', '0908020105', 'd8f97b25b2db70bf9af13131b78509bc', 1),
('abcdef', '$2y$10$dEDV7MVdw6nXlKw9Zr/uTOdMYaof7vA3E2ZfrV1uEqtkvHu1cznCC', 'Nguyen', '01/01/2000', 'nhh3103@gmail.co', '0908050604', '639a6f68e9917c536ce4f1bf185309d0', 2),
('hhung', '$2y$10$Fx3KnAxw7Oad4UY73d0zOuqTlUh347FAheY546CEwQkCVygCGSbM2', 'Hung Nguyen', '01/02/1999', 'nhh3103@gmail.com', '0908030205', '3381c4d253165929fcbff2327b4ae368', 2),
('Kuren', '$2y$10$x0EiEE0SqnHcWhSv9zCRJOCX1qDvjPQ.bBbFya.SK0/dqfw6DdKaK', 'Hung Nguyen', '01/01/2000', 'nhh313@gmail.com', '0908050601', '497b5c663b217aa784fa7d7734a1479c', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_classroom`
--

DROP TABLE IF EXISTS `user_classroom`;
CREATE TABLE `user_classroom` (
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_classroom`
--

INSERT INTO `user_classroom` (`email`, `token`) VALUES
('blightmedison313@gmail.com', '9901211752466b008b809382d37ba719'),
('hhung@gmail.com', '84afc38080c24e9c6fa22f799470586d'),
('hhung@gmail.com', '9901211752466b008b809382d37ba719');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_token`
--
ALTER TABLE `reset_token`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user_classroom`
--
ALTER TABLE `user_classroom`
  ADD PRIMARY KEY (`email`,`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
