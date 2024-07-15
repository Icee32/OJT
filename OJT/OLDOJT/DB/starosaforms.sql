-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 05:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starosaforms`
--

-- --------------------------------------------------------

--
-- Table structure for table `dose1`
--

CREATE TABLE `dose1` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Baranggay` varchar(255) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` datetime DEFAULT current_timestamp(),
  `status` enum('Pending','Completed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dose1`
--

INSERT INTO `dose1` (`id`, `FirstName`, `LastName`, `Age`, `Gender`, `Baranggay`, `vaccine_id`, `dose_id`, `submitted_at`, `status`) VALUES
(1, 'Ice', 'Sarmiento', 22, 'Male', 'Tagapo', 2, 1, '2024-06-05 08:23:19', 'Pending'),
(4, 'Testing', 'Kungsinoman', 11, 'Female', 'Caingin', 3, 1, '2024-06-05 08:24:28', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `dose2`
--

CREATE TABLE `dose2` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Baranggay` varchar(255) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` datetime DEFAULT current_timestamp(),
  `status` enum('Pending','Completed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dose2`
--

INSERT INTO `dose2` (`id`, `FirstName`, `LastName`, `Age`, `Gender`, `Baranggay`, `vaccine_id`, `dose_id`, `submitted_at`, `status`) VALUES
(2, 'Jom', 'Galang', 26, 'Male', 'Labas', 1, 2, '2024-06-05 08:23:44', 'Pending'),
(3, 'Random', 'Person', 14, 'Male', 'Labas', 2, 2, '2024-06-05 08:24:03', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `dose3`
--

CREATE TABLE `dose3` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Baranggay` varchar(255) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` datetime DEFAULT current_timestamp(),
  `status` enum('Pending','Completed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbldoses`
--

CREATE TABLE `tbldoses` (
  `doseid` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `dosetype` varchar(255) NOT NULL,
  `dosename` varchar(255) NOT NULL,
  `dosedescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblvaccine`
--

CREATE TABLE `tblvaccine` (
  `vaccineid` int(11) NOT NULL,
  `vaccinetype` varchar(50) NOT NULL,
  `vaccinename` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvaccine`
--

INSERT INTO `tblvaccine` (`vaccineid`, `vaccinetype`, `vaccinename`, `description`) VALUES
(1, 'covid', 'COVID-19', NULL),
(2, 'pertussis', 'Pertussis', NULL),
(3, 'something', 'Sample Vaccine', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Baranggay` varchar(50) NOT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` datetime DEFAULT current_timestamp(),
  `status` enum('Pending','Completed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `Age`, `Gender`, `Baranggay`, `vaccine_id`, `dose_id`, `submitted_at`, `status`) VALUES
(1, 'Ice', 'Sarmiento', 22, 'Male', 'Tagapo', 2, 1, '2024-06-05 08:23:19', 'Pending'),
(2, 'Jom', 'Galang', 26, 'Male', 'Labas', 1, 2, '2024-06-05 08:23:44', 'Pending'),
(3, 'Random', 'Person', 14, 'Male', 'Labas', 2, 2, '2024-06-05 08:24:03', 'Pending'),
(4, 'Testing', 'Kungsinoman', 11, 'Female', 'Caingin', 3, 1, '2024-06-05 08:24:28', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dose1`
--
ALTER TABLE `dose1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`);

--
-- Indexes for table `dose2`
--
ALTER TABLE `dose2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`);

--
-- Indexes for table `dose3`
--
ALTER TABLE `dose3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`);

--
-- Indexes for table `tbldoses`
--
ALTER TABLE `tbldoses`
  ADD PRIMARY KEY (`doseid`),
  ADD KEY `vaccine_id` (`vaccine_id`);

--
-- Indexes for table `tblvaccine`
--
ALTER TABLE `tblvaccine`
  ADD PRIMARY KEY (`vaccineid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dose1`
--
ALTER TABLE `dose1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dose2`
--
ALTER TABLE `dose2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dose3`
--
ALTER TABLE `dose3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldoses`
--
ALTER TABLE `tbldoses`
  MODIFY `doseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblvaccine`
--
ALTER TABLE `tblvaccine`
  MODIFY `vaccineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbldoses`
--
ALTER TABLE `tbldoses`
  ADD CONSTRAINT `tbldoses_ibfk_1` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_vaccine` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
