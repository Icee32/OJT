-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 04:46 AM
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
-- Database: `adminstarosaform`
--

-- --------------------------------------------------------

--
-- Table structure for table `bg_aplaya`
--

CREATE TABLE `bg_aplaya` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_balibago`
--

CREATE TABLE `bg_balibago` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_caingin`
--

CREATE TABLE `bg_caingin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_dila`
--

CREATE TABLE `bg_dila` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_dita`
--

CREATE TABLE `bg_dita` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_donjose`
--

CREATE TABLE `bg_donjose` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_ibaba`
--

CREATE TABLE `bg_ibaba` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_kanluran`
--

CREATE TABLE `bg_kanluran` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_labas`
--

CREATE TABLE `bg_labas` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_macabling`
--

CREATE TABLE `bg_macabling` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_malitlit`
--

CREATE TABLE `bg_malitlit` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_malusak`
--

CREATE TABLE `bg_malusak` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_marketarea`
--

CREATE TABLE `bg_marketarea` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_pooc`
--

CREATE TABLE `bg_pooc` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_pulongsantacruz`
--

CREATE TABLE `bg_pulongsantacruz` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_santodomingo`
--

CREATE TABLE `bg_santodomingo` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_sinalhan`
--

CREATE TABLE `bg_sinalhan` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_tagapo`
--

CREATE TABLE `bg_tagapo` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flu_dose1`
--

CREATE TABLE `flu_dose1` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flu_dose2`
--

CREATE TABLE `flu_dose2` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flu_dose3`
--

CREATE TABLE `flu_dose3` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hpv_dose1`
--

CREATE TABLE `hpv_dose1` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hpv_dose2`
--

CREATE TABLE `hpv_dose2` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hpv_dose3`
--

CREATE TABLE `hpv_dose3` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pneumonia_dose1`
--

CREATE TABLE `pneumonia_dose1` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pneumonia_dose2`
--

CREATE TABLE `pneumonia_dose2` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pneumonia_dose3`
--

CREATE TABLE `pneumonia_dose3` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middleinitial` char(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `age` int(11) GENERATED ALWAYS AS (timestampdiff(YEAR,`birthdate`,curdate())) VIRTUAL,
  `birthdate` date NOT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblbaranggay`
--

CREATE TABLE `tblbaranggay` (
  `baranggayid` int(11) NOT NULL,
  `baranggayname` varchar(50) NOT NULL,
  `baranggayfullname` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbaranggay`
--

INSERT INTO `tblbaranggay` (`baranggayid`, `baranggayname`, `baranggayfullname`, `description`) VALUES
(1, 'Aplaya', 'Aplaya', 'Description for Aplaya'),
(2, 'Balibago', 'Balibago', 'Description for Balibago'),
(3, 'Caingin', 'Caingin', 'Description for Caingin'),
(4, 'Dila', 'Dila', 'Description for Dila'),
(5, 'Dita', 'Dita', 'Description for Dita'),
(6, 'Don Jose', 'Don Jose', 'Description for Don Jose'),
(7, 'Ibaba', 'Ibaba', 'Description for Ibaba'),
(8, 'Kanluran', 'Kanluran (Poblacion Uno)', 'Description for Kanluran (Poblacion Uno)'),
(9, 'Labas', 'Labas', 'Description for Labas'),
(10, 'Macabling', 'Macabling', 'Description for Macabling'),
(11, 'Malitlit', 'Malitlit', 'Description for Malitlit'),
(12, 'Malusak', 'Malusak (Poblacion Dos)', 'Description for Malusak (Poblacion Dos)'),
(13, 'Market Area', 'Market Area (Poblacion Tres)', 'Description for Market Area (Poblacion Tres)'),
(14, 'Pooc', 'Pooc (Pook)', 'Description for Pooc (Pook)'),
(15, 'Pulong Santa Cruz', 'Pulong Santa Cruz', 'Description for Pulong Santa Cruz'),
(16, 'Santo Domingo', 'Santo Domingo', 'Description for Santo Domingo'),
(17, 'Sinalhan', 'Sinalhan', 'Description for Sinalhan'),
(18, 'Tagapo', 'Tagapo', 'Description for Tagapo');

-- --------------------------------------------------------

--
-- Table structure for table `tblgender`
--

CREATE TABLE `tblgender` (
  `genderid` int(11) NOT NULL,
  `gendername` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblgender`
--

INSERT INTO `tblgender` (`genderid`, `gendername`, `description`) VALUES
(1, 'Male', NULL),
(2, 'Female', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvaccine`
--

CREATE TABLE `tblvaccine` (
  `vaccineid` int(11) NOT NULL,
  `vaccinename` varchar(50) DEFAULT NULL,
  `vaccinedescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvaccine`
--

INSERT INTO `tblvaccine` (`vaccineid`, `vaccinename`, `vaccinedescription`) VALUES
(1, 'HPV', NULL),
(2, 'Flu', NULL),
(3, 'Pneumonia', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `middleinitial` varchar(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `baranggay_id` int(11) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `vaccine_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `before_users_insert` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    SET NEW.age = TIMESTAMPDIFF(YEAR, NEW.birthdate, CURDATE());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_users_update` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    SET NEW.age = TIMESTAMPDIFF(YEAR, NEW.birthdate, CURDATE());
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bg_aplaya`
--
ALTER TABLE `bg_aplaya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_balibago`
--
ALTER TABLE `bg_balibago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_caingin`
--
ALTER TABLE `bg_caingin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_dila`
--
ALTER TABLE `bg_dila`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_dita`
--
ALTER TABLE `bg_dita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_donjose`
--
ALTER TABLE `bg_donjose`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_ibaba`
--
ALTER TABLE `bg_ibaba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_kanluran`
--
ALTER TABLE `bg_kanluran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_labas`
--
ALTER TABLE `bg_labas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_macabling`
--
ALTER TABLE `bg_macabling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_malitlit`
--
ALTER TABLE `bg_malitlit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_malusak`
--
ALTER TABLE `bg_malusak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_marketarea`
--
ALTER TABLE `bg_marketarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_pooc`
--
ALTER TABLE `bg_pooc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_pulongsantacruz`
--
ALTER TABLE `bg_pulongsantacruz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_santodomingo`
--
ALTER TABLE `bg_santodomingo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_sinalhan`
--
ALTER TABLE `bg_sinalhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `bg_tagapo`
--
ALTER TABLE `bg_tagapo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `flu_dose1`
--
ALTER TABLE `flu_dose1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `flu_dose2`
--
ALTER TABLE `flu_dose2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `flu_dose3`
--
ALTER TABLE `flu_dose3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `hpv_dose1`
--
ALTER TABLE `hpv_dose1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `hpv_dose2`
--
ALTER TABLE `hpv_dose2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `hpv_dose3`
--
ALTER TABLE `hpv_dose3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `pneumonia_dose1`
--
ALTER TABLE `pneumonia_dose1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `pneumonia_dose2`
--
ALTER TABLE `pneumonia_dose2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `pneumonia_dose3`
--
ALTER TABLE `pneumonia_dose3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `tblbaranggay`
--
ALTER TABLE `tblbaranggay`
  ADD PRIMARY KEY (`baranggayid`);

--
-- Indexes for table `tblgender`
--
ALTER TABLE `tblgender`
  ADD PRIMARY KEY (`genderid`);

--
-- Indexes for table `tblvaccine`
--
ALTER TABLE `tblvaccine`
  ADD PRIMARY KEY (`vaccineid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `baranggay_id` (`baranggay_id`),
  ADD KEY `vaccine_id` (`vaccine_id`),
  ADD KEY `gender_id` (`gender_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flu_dose1`
--
ALTER TABLE `flu_dose1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flu_dose2`
--
ALTER TABLE `flu_dose2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flu_dose3`
--
ALTER TABLE `flu_dose3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hpv_dose1`
--
ALTER TABLE `hpv_dose1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hpv_dose2`
--
ALTER TABLE `hpv_dose2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hpv_dose3`
--
ALTER TABLE `hpv_dose3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pneumonia_dose1`
--
ALTER TABLE `pneumonia_dose1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pneumonia_dose2`
--
ALTER TABLE `pneumonia_dose2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pneumonia_dose3`
--
ALTER TABLE `pneumonia_dose3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bg_aplaya`
--
ALTER TABLE `bg_aplaya`
  ADD CONSTRAINT `bg_aplaya_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_aplaya_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_aplaya_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_balibago`
--
ALTER TABLE `bg_balibago`
  ADD CONSTRAINT `bg_balibago_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_balibago_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_balibago_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_caingin`
--
ALTER TABLE `bg_caingin`
  ADD CONSTRAINT `bg_caingin_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_caingin_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_caingin_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_dila`
--
ALTER TABLE `bg_dila`
  ADD CONSTRAINT `bg_dila_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_dila_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_dila_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_dita`
--
ALTER TABLE `bg_dita`
  ADD CONSTRAINT `bg_dita_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_dita_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_dita_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_donjose`
--
ALTER TABLE `bg_donjose`
  ADD CONSTRAINT `bg_donjose_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_donjose_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_donjose_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_ibaba`
--
ALTER TABLE `bg_ibaba`
  ADD CONSTRAINT `bg_ibaba_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_ibaba_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_ibaba_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_kanluran`
--
ALTER TABLE `bg_kanluran`
  ADD CONSTRAINT `bg_kanluran_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_kanluran_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_kanluran_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_labas`
--
ALTER TABLE `bg_labas`
  ADD CONSTRAINT `bg_labas_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_labas_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_labas_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_macabling`
--
ALTER TABLE `bg_macabling`
  ADD CONSTRAINT `bg_macabling_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_macabling_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_macabling_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_malitlit`
--
ALTER TABLE `bg_malitlit`
  ADD CONSTRAINT `bg_malitlit_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_malitlit_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_malitlit_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_malusak`
--
ALTER TABLE `bg_malusak`
  ADD CONSTRAINT `bg_malusak_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_malusak_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_malusak_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_marketarea`
--
ALTER TABLE `bg_marketarea`
  ADD CONSTRAINT `bg_marketarea_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_marketarea_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_marketarea_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_pooc`
--
ALTER TABLE `bg_pooc`
  ADD CONSTRAINT `bg_pooc_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_pooc_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_pooc_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_pulongsantacruz`
--
ALTER TABLE `bg_pulongsantacruz`
  ADD CONSTRAINT `bg_pulongsantacruz_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_pulongsantacruz_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_pulongsantacruz_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_santodomingo`
--
ALTER TABLE `bg_santodomingo`
  ADD CONSTRAINT `bg_santodomingo_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_santodomingo_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_santodomingo_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_sinalhan`
--
ALTER TABLE `bg_sinalhan`
  ADD CONSTRAINT `bg_sinalhan_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_sinalhan_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_sinalhan_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `bg_tagapo`
--
ALTER TABLE `bg_tagapo`
  ADD CONSTRAINT `bg_tagapo_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `bg_tagapo_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `bg_tagapo_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `flu_dose1`
--
ALTER TABLE `flu_dose1`
  ADD CONSTRAINT `flu_dose1_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `flu_dose1_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `flu_dose1_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `flu_dose2`
--
ALTER TABLE `flu_dose2`
  ADD CONSTRAINT `flu_dose2_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `flu_dose2_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `flu_dose2_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `flu_dose3`
--
ALTER TABLE `flu_dose3`
  ADD CONSTRAINT `flu_dose3_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `flu_dose3_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `flu_dose3_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `hpv_dose1`
--
ALTER TABLE `hpv_dose1`
  ADD CONSTRAINT `hpv_dose1_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `hpv_dose1_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `hpv_dose1_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `hpv_dose2`
--
ALTER TABLE `hpv_dose2`
  ADD CONSTRAINT `hpv_dose2_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `hpv_dose2_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `hpv_dose2_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `hpv_dose3`
--
ALTER TABLE `hpv_dose3`
  ADD CONSTRAINT `hpv_dose3_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `hpv_dose3_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `hpv_dose3_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `pneumonia_dose1`
--
ALTER TABLE `pneumonia_dose1`
  ADD CONSTRAINT `pneumonia_dose1_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `pneumonia_dose1_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `pneumonia_dose1_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `pneumonia_dose2`
--
ALTER TABLE `pneumonia_dose2`
  ADD CONSTRAINT `pneumonia_dose2_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `pneumonia_dose2_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `pneumonia_dose2_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `pneumonia_dose3`
--
ALTER TABLE `pneumonia_dose3`
  ADD CONSTRAINT `pneumonia_dose3_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `pneumonia_dose3_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `pneumonia_dose3_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`baranggay_id`) REFERENCES `tblbaranggay` (`baranggayid`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`vaccine_id`) REFERENCES `tblvaccine` (`vaccineid`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `tblgender` (`genderid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
