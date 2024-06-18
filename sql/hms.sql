-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2024 at 02:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'Test@12345', '28-12-2016 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int NOT NULL,
  `doctorSpecialization` varchar(255) NOT NULL,
  `doctorId` int NOT NULL,
  `userId` int NOT NULL,
  `consultancyFees` int NOT NULL,
  `appointmentDate` varchar(255) NOT NULL,
  `appointmentTime` varchar(255) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userStatus` int NOT NULL,
  `doctorStatus` int NOT NULL,
  `updationDate` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(1, 'Dentist', 1, 1, 500, '2016-12-31', '09:25', '2017-01-01 00:29:02', 1, 1, ''),
(2, 'Homeopath', 4, 5, 700, '2017-01-11', '14:10', '2017-01-07 08:02:58', 0, 1, ''),
(3, 'Gynecologist/Obstetrician', 1, 1, 500, '2024-06-19', '7:15 PM', '2024-06-10 18:36:46', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `subject` text NOT NULL,
  `content` text,
  `contactDay` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `subject`, `content`, `contactDay`) VALUES
(1, 'paul_milambo', 'pmilambo47@gmail.com', '0894676466', 'connexion', ' je sais plus ce quoi les problèmes avec les différents contactez avec les docteurs et cela à fait presque qu\'un mois et je ne sais pas vraiment comment résoudre les problèmes', '2024-06-10 01:06:13'),
(2, 'numbe', 'numbe@gmail.com', '0894676466', 'appointement', 'j\'ai ne plus assez à la page des différents docteurs et cela ça fait presqu\'un mois et cela fait aussi un moment que cela ne  plus une question d\'erreurs', '2024-06-10 11:06:13'),
(3, 'strategie', 'pmilambo47@gmail.com', '89808099000', 'Téléchargement', ' j\'aurai un peu besoin de vous pour les différentes préoccupations', '2024-06-10 19:06:13'),
(4, 'paola', 'paola47@gmail.com', '89808099000', 'Téléchargement', ' j\'aurai un peu besoin de vous pour les différentes préoccupations, et cela me préoccupes tant', '2024-06-10 20:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int NOT NULL,
  `specilization` varchar(255) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `docFees` varchar(255) NOT NULL,
  `contactno` bigint NOT NULL,
  `docEmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`) VALUES
(1, 'Gynecologist/Obstetrician', 'karol', 'New Delhi', '500', 8285703354, 'anuj.lpu1@gmail.com', 'ff8451f4800a665921e0f5895cda64f1', '2016-12-29 06:25:37'),
(2, 'Homeopath', 'Sarita Pandey', 'Varanasi', '600', 2147483647, 'sarita@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2016-12-29 06:51:51'),
(3, 'General Physician', 'Nitesh Kumar', 'Ghaziabad', '1200', 8523699999, 'nitesh@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:43:35'),
(4, 'Homeopath', 'Vijay Verma', 'New Delhi', '700', 25668888, 'vijay@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:45:09'),
(5, 'Ayurveda', 'Sanjeev', 'Gurugram', '8050', 442166644646, 'sanjeev@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:47:07'),
(6, 'General Physician', 'Amrita', 'New Delhi India', '2500', 45497964, 'amrita@test.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:52:50'),
(7, 'Demo test', 'abc ', 'xyz', '200', 852888888, 'test@demo.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 08:08:58'),
(8, 'Ayurveda', 'paul', 'unikin', '500', 894676466, 'paul@gmail.com', 'ae3091d76a709fe3902d171db13735a2', '2024-06-10 09:37:39'),
(9, 'Bones Specialist demo', 'Milambo', 'unikin', '500', 894676467, 'Milambo@gmail.com', '5d6713903207643f811b4a85c9832e31', '2024-06-10 11:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int NOT NULL,
  `uid` int DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 2, 'sarita@gmail.com', 0x30000000000000000000000000000000, '2017-01-06 05:53:31', '', 1),
(2, 0, 'admin', 0x3a3a3100000000000000000000000000, '2017-01-06 06:36:07', '', 0),
(3, 2, 'sarita@gmail.com', 0x3a3a3100000000000000000000000000, '2017-01-06 06:36:37', '06/01/2017 07:36:45', 1),
(4, 2, 'sarita@gmail.com', 0x3a3a3100000000000000000000000000, '2017-01-06 06:41:33', '12:11:46', 1),
(5, 2, 'sarita@gmail.com', 0x3a3a3100000000000000000000000000, '2017-01-06 06:55:16', '06-01-2017 12:27:47 PM', 1),
(6, 0, 'admin', 0x3a3a3100000000000000000000000000, '2017-01-06 07:07:12', '', 0),
(7, 0, 'info@w3gang.com', 0x3a3a3100000000000000000000000000, '2017-01-07 08:04:42', '', 0),
(8, 0, 'info@w3gang.com', 0x3a3a3100000000000000000000000000, '2017-01-07 08:04:55', '10-06-2024 08:08:09 PM', 0),
(9, 2, 'sarita@gmail.com', 0x3a3a3100000000000000000000000000, '2017-01-07 08:05:54', '07-01-2017 01:36:28 PM', 1),
(10, NULL, 'milambo', 0x3a3a3100000000000000000000000000, '2024-06-10 11:58:16', NULL, 0),
(11, NULL, 'milambo', 0x3a3a3100000000000000000000000000, '2024-06-10 11:58:34', NULL, 0),
(12, NULL, 'paul', 0x3a3a3100000000000000000000000000, '2024-06-10 11:58:48', NULL, 0),
(13, NULL, 'strategie', 0x3a3a3100000000000000000000000000, '2024-06-10 14:39:49', NULL, 0),
(14, 1, 'Anuj', 0x3a3a3100000000000000000000000000, '2024-06-10 17:33:44', '10-06-2024 06:56:00 PM', 1),
(15, 1, 'karol', 0x3a3a3100000000000000000000000000, '2024-06-10 17:56:11', '10-06-2024 07:10:31 PM', 1),
(16, 1, 'karol', 0x3a3a3100000000000000000000000000, '2024-06-10 18:10:41', '10-06-2024 07:14:47 PM', 1),
(17, 1, 'karol', 0x3a3a3100000000000000000000000000, '2024-06-10 18:45:17', '10-06-2024 07:46:54 PM', 1),
(18, 1, 'karol', 0x3a3a3100000000000000000000000000, '2024-06-10 19:08:25', '10-06-2024 08:38:53 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int NOT NULL,
  `specilization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_is_0900_ai_ci NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist/Obstetrician', '2016-12-28 06:37:25', NULL),
(2, 'General Physician', '2016-12-28 06:38:12', NULL),
(3, 'Dermatologist', '2016-12-28 06:38:48', NULL),
(4, 'Homeopath', '2016-12-28 06:39:26', NULL),
(5, 'Ayurveda', '2016-12-28 06:39:51', '10-06-2024 12:44:51 PM'),
(6, 'Dentist', '2016-12-28 06:40:08', NULL),
(7, 'Ear-Nose-Throat (Ent) Specialist', '2016-12-28 06:41:18', NULL),
(9, 'Demo test', '2016-12-28 07:37:39', NULL),
(10, 'Bones Specialist', '2017-01-07 08:07:53', NULL),
(11, 'genelogie', '2024-06-10 11:38:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(6, 1, '', 0x3a3a3100000000000000000000000000, '2017-01-06 07:02:28', '', 1),
(7, 1, 'info@w3gang.com', 0x3a3a3100000000000000000000000000, '2017-01-06 07:04:28', '', 1),
(8, 0, 'admin', 0x3a3a3100000000000000000000000000, '2017-01-06 07:07:41', '06-01-2017 12:38:09 PM', 0),
(9, 1, 'info@w3gang.com', 0x3a3a3100000000000000000000000000, '2017-01-06 07:08:01', '', 1),
(10, 1, 'info@w3gang.com', 0x3a3a3100000000000000000000000000, '2017-01-06 07:10:09', '06-01-2017 12:41:43 PM', 1),
(11, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2017-01-07 07:57:18', '07-01-2017 01:27:34 PM', 1),
(12, 0, 'asdad', 0x3a3a3100000000000000000000000000, '2017-01-07 07:57:44', '', 0),
(13, 0, 'xyz@test.com', 0x3a3a3100000000000000000000000000, '2017-01-07 07:59:43', '10-06-2024 04:31:51 AM', 0),
(14, 5, 'amit12@gmail.com', 0x3a3a3100000000000000000000000000, '2017-01-07 08:00:44', '07-01-2017 01:34:19 PM', 1),
(15, 3, 'Amit', 0x3a3a3100000000000000000000000000, '2024-06-10 15:26:41', NULL, 1),
(16, 3, 'Amit', 0x3a3a3100000000000000000000000000, '2024-06-10 15:27:01', '10-06-2024 04:32:42 PM', 1),
(17, 1, 'karol', 0x3a3a3100000000000000000000000000, '2024-06-10 15:33:46', '10-06-2024 06:23:34 PM', 1),
(18, 1, 'Amit', 0x3a3a3100000000000000000000000000, '2024-06-10 18:09:16', '10-06-2024 07:45:01 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`) VALUES
(1, 'Amit', 'New Delhi', 'New delhi', 'male', 'amit@gmail.com', 'ff8451f4800a665921e0f5895cda64f1', '2017-01-07 06:36:53'),
(4, 'Rahul Singh', 'New Delhi', 'New delhi', 'male', 'rahul@gmail.com', 'ff8451f4800a665921e0f5895cda64f1', '2017-01-07 07:41:14'),
(5, 'Amit kumar', 'New Delhi India', 'Delhi', 'male', 'amit12@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 08:00:26'),
(6, 'strategie', 'Montngafula', 'kinshasa', 'male', 'pmilambo47@gmail.com', 'bec6de340f2f6a4ec69d2df197609b0a', '2024-06-09 23:00:01'),
(7, 'pau', 'Montngafula', 'kinshasa', 'male', 'paul@gmail.com', '3880c89f2fdd3a45ceb3071421a53301', '2024-06-10 12:54:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
