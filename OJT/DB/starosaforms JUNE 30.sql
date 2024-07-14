-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 11:48 AM
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
-- Table structure for table `bg_aplaya`
--

CREATE TABLE `bg_aplaya` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_balibago`
--

CREATE TABLE `bg_balibago` (
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
-- Dumping data for table `bg_balibago`
--

INSERT INTO `bg_balibago` (`id`, `FirstName`, `LastName`, `Age`, `Gender`, `Baranggay`, `vaccine_id`, `dose_id`, `submitted_at`, `status`) VALUES
(3, 'Testing', 'Yart', 12, 'Male', 'Balibago', 2, 2, '2024-06-26 09:21:16', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `bg_caingin`
--

CREATE TABLE `bg_caingin` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_dila`
--

CREATE TABLE `bg_dila` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_dita`
--

CREATE TABLE `bg_dita` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_donjose`
--

CREATE TABLE `bg_donjose` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_ibaba`
--

CREATE TABLE `bg_ibaba` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_kanluran`
--

CREATE TABLE `bg_kanluran` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_labas`
--

CREATE TABLE `bg_labas` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_macabling`
--

CREATE TABLE `bg_macabling` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_malitlit`
--

CREATE TABLE `bg_malitlit` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_malusak`
--

CREATE TABLE `bg_malusak` (
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
-- Dumping data for table `bg_malusak`
--

INSERT INTO `bg_malusak` (`id`, `FirstName`, `LastName`, `Age`, `Gender`, `Baranggay`, `vaccine_id`, `dose_id`, `submitted_at`, `status`) VALUES
(2, 'James', 'Bensal', 15, 'Female', 'Malusak (Poblacion Dos)', 2, 2, '2024-06-13 08:50:36', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `bg_marketarea`
--

CREATE TABLE `bg_marketarea` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_pooc`
--

CREATE TABLE `bg_pooc` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_pulongsantacruz`
--

CREATE TABLE `bg_pulongsantacruz` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_santodomingo`
--

CREATE TABLE `bg_santodomingo` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_sinalhan`
--

CREATE TABLE `bg_sinalhan` (
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

-- --------------------------------------------------------

--
-- Table structure for table `bg_tagapo`
--

CREATE TABLE `bg_tagapo` (
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
-- Dumping data for table `bg_tagapo`
--

INSERT INTO `bg_tagapo` (`id`, `FirstName`, `LastName`, `Age`, `Gender`, `Baranggay`, `vaccine_id`, `dose_id`, `submitted_at`, `status`) VALUES
(1, 'Ice', 'Sarmiento', 22, 'Male', 'Tagapo', 1, 2, '2024-06-13 08:50:16', 'Pending');

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
(1, 'Ice', 'Sarmiento', 22, 'Male', 'Tagapo', 1, 2, '2024-06-13 08:50:16', 'Pending'),
(2, 'James', 'Bensal', 15, 'Female', 'Malusak (Poblacion Dos)', 2, 2, '2024-06-13 08:50:36', 'Pending'),
(3, 'Testing', 'Yart', 12, 'Male', 'Balibago', 2, 2, '2024-06-26 09:21:16', 'Pending');

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
(1, 'hpv', 'Human papillomavirus', NULL),
(2, 'flu', 'Flu / Influenza', NULL),
(3, 'pneumonia', 'Pneumonia', NULL);

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
(1, 'Ice', 'Sarmiento', 22, 'Male', 'Tagapo', 1, 2, '2024-06-13 08:50:16', 'Pending'),
(2, 'James', 'Bensal', 15, 'Female', 'Malusak (Poblacion Dos)', 2, 2, '2024-06-13 08:50:36', 'Pending'),
(3, 'Testing', 'Yart', 12, 'Male', 'Balibago', 2, 2, '2024-06-26 09:21:16', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bg_aplaya`
--
ALTER TABLE `bg_aplaya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_balibago`
--
ALTER TABLE `bg_balibago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_caingin`
--
ALTER TABLE `bg_caingin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_dila`
--
ALTER TABLE `bg_dila`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_dita`
--
ALTER TABLE `bg_dita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_donjose`
--
ALTER TABLE `bg_donjose`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_ibaba`
--
ALTER TABLE `bg_ibaba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_kanluran`
--
ALTER TABLE `bg_kanluran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_labas`
--
ALTER TABLE `bg_labas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_macabling`
--
ALTER TABLE `bg_macabling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_malitlit`
--
ALTER TABLE `bg_malitlit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_malusak`
--
ALTER TABLE `bg_malusak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_marketarea`
--
ALTER TABLE `bg_marketarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_pooc`
--
ALTER TABLE `bg_pooc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_pulongsantacruz`
--
ALTER TABLE `bg_pulongsantacruz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_santodomingo`
--
ALTER TABLE `bg_santodomingo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_sinalhan`
--
ALTER TABLE `bg_sinalhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

--
-- Indexes for table `bg_tagapo`
--
ALTER TABLE `bg_tagapo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`);

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
  ADD KEY `fk_user_vaccine` (`vaccine_id`),
  ADD KEY `id` (`id`,`FirstName`,`LastName`,`Age`,`Gender`,`Baranggay`,`vaccine_id`,`dose_id`,`submitted_at`,`status`),
  ADD KEY `Age` (`Age`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bg_aplaya`
--
ALTER TABLE `bg_aplaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_balibago`
--
ALTER TABLE `bg_balibago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bg_caingin`
--
ALTER TABLE `bg_caingin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_dila`
--
ALTER TABLE `bg_dila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_dita`
--
ALTER TABLE `bg_dita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_donjose`
--
ALTER TABLE `bg_donjose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_ibaba`
--
ALTER TABLE `bg_ibaba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_kanluran`
--
ALTER TABLE `bg_kanluran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_labas`
--
ALTER TABLE `bg_labas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_macabling`
--
ALTER TABLE `bg_macabling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_malitlit`
--
ALTER TABLE `bg_malitlit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_malusak`
--
ALTER TABLE `bg_malusak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bg_marketarea`
--
ALTER TABLE `bg_marketarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_pooc`
--
ALTER TABLE `bg_pooc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_pulongsantacruz`
--
ALTER TABLE `bg_pulongsantacruz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_santodomingo`
--
ALTER TABLE `bg_santodomingo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_sinalhan`
--
ALTER TABLE `bg_sinalhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bg_tagapo`
--
ALTER TABLE `bg_tagapo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dose1`
--
ALTER TABLE `dose1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
