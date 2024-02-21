-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 07:19 AM
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
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) DEFAULT NULL,
  `booked_by` bigint(20) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `notes` varchar(5000) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `booked_by`, `title`, `description`, `doctor_id`, `notes`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 'First test', 'ljdegokjrk rgiortigo froiigjor \r\nefjoerfgjroi\r\nfderogjkr', 4, NULL, '2024-02-08 22:24:00', 2, '2024-02-11 22:25:03', '2024-02-12 02:31:22'),
(2, 5, 5, 'appioetment test by patient', 'oioifk\r\nfrgr\r\nr', 4, 'fjkejfr', '2024-02-23 02:39:00', 2, '2024-02-12 02:40:51', '2024-02-12 03:04:41'),
(3, 5, 4, 'created by doctor', 'fgfg', 4, NULL, '2024-02-14 04:17:00', 2, '2024-02-12 04:14:57', NULL),
(4, 5, 4, 'created by doctor	', 'fe', 4, NULL, '2024-02-16 04:19:00', 2, '2024-02-12 04:16:11', NULL),
(5, 5, 5, 'by patient', 'dkvfmdkf\r\nd\r\nfd', 4, NULL, '2024-02-15 13:52:00', 2, '2024-02-12 06:52:51', '2024-02-20 17:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `specialization` varchar(1000) DEFAULT NULL,
  `gender` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `user_id`, `specialization`, `gender`) VALUES
(1, 4, 'MBBS Degree', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) DEFAULT NULL,
  `staff_id` bigint(20) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `treatmentPlan` text DEFAULT NULL,
  `VitalSigns` text DEFAULT NULL,
  `MedicalHistory` text DEFAULT NULL,
  `ProgressNotes` varchar(5000) DEFAULT NULL,
  `ConsultationsAndReferrals` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`id`, `patient_id`, `staff_id`, `diagnosis`, `treatmentPlan`, `VitalSigns`, `MedicalHistory`, `ProgressNotes`, `ConsultationsAndReferrals`, `created_at`, `updated_at`) VALUES
(2, 5, 4, 'rgrg', 'kknk', 'nk', 'nk', '', '', '2024-02-21 10:37:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 5, 3, 'hi'),
(2, 5, 4, 'hi'),
(3, 4, 5, 'Hi - I\'m patient'),
(4, 5, 4, 'Hello'),
(5, 4, 5, 'yes doctor'),
(6, 4, 5, 'testing'),
(7, 5, 4, 'tetsd'),
(8, 5, 4, 'test'),
(9, 5, 4, 'test'),
(10, 5, 4, 'fehf'),
(11, 5, 4, 'ff'),
(12, 5, 4, 'r'),
(13, 5, 4, 'trtrt'),
(14, 4, 5, 'hi'),
(15, 5, 4, 'dcotor here'),
(16, 4, 5, 'here is patient'),
(17, 4, 5, 'dgrg'),
(18, 4, 5, 'rg'),
(19, 4, 5, 'dfg'),
(20, 4, 5, 'fgf'),
(21, 4, 5, 'fg'),
(22, 4, 5, 'fg'),
(23, 4, 5, 'fg'),
(24, 4, 5, 'g');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `department` varchar(2000) DEFAULT NULL,
  `shift` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `user_id`, `department`, `shift`) VALUES
(1, 10, 'Heart Section', 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `user_id`, `dob`, `gender`, `address`) VALUES
(1, 5, '2024-02-14', NULL, '2443'),
(2, 6, '2024-02-22', NULL, NULL),
(4, 8, '2004-12-12', NULL, 'kdmvkdv'),
(5, 12, '2024-02-06', NULL, 'dgsdgdf');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `patient_id` bigint(20) DEFAULT NULL,
  `staff_id` bigint(20) DEFAULT NULL,
  `medication` varchar(1000) DEFAULT NULL,
  `dosage` varchar(1000) DEFAULT NULL,
  `instruction` varchar(1000) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `patient_id`, `staff_id`, `medication`, `dosage`, `instruction`, `created_at`, `updated_at`) VALUES
(2, 5, 4, 'First medication testing', 'dosage is here', 'INSTRUCTION IS HRER', '2024-02-16 16:04:13', '2024-02-16 17:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `url`) VALUES
(1, 'Admin', 'admin'),
(2, 'Patient', 'patient'),
(3, 'Doctor', 'doctor'),
(4, 'Receptionist', 'receptionist'),
(5, 'Nurse', 'nurse'),
(6, 'Access Control Manager', 'access-control'),
(7, 'Hospital Staff', 'hospital-staff');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(11) NOT NULL,
  `role_dashbaord` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `role_dashbaord`, `status`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `img` varchar(1000) DEFAULT NULL,
  `username` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `img`, `username`, `email`, `password`, `phone`, `role_id`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 'ierehfrierhg', 'admin3586.png', 'admin', 'admin@gmail.com', '$2y$10$n/jwl4kyAjwADmT2XS8iy.1Th3CyWdC2aT9DJWPE1L5Wh576Tolhy', 1323424, 1, NULL, '2024-02-09 08:30:08', NULL),
(4, 'Mehmet Ozcan', 'doctor4330.png', 'doctor', 'doctor@gmail.com', '$2y$10$Ul26Lt8wFzF8tORkihbd9.72HQmR62pXKYtspDXS7AthS7WSW8oGS', 1323424, 3, NULL, '2024-02-09 08:30:08', NULL),
(5, 'user', NULL, 'user', 'user@gmail.com', '$2y$10$zapxlW0ne9gQ0Ka8CMJLOOw8DTyBp.M6wXQ7dDlTv02LZ9z6gPK1i', 2443, 2, NULL, '2024-02-09 09:20:16', NULL),
(8, 'name', NULL, 'patinet_created', 'p_c_a@gmail.com', '$2y$10$yo1XYdKxv.b4WEuqUuQrFe7/1K0u5ey9iWWpv16U.qhgx7RV2jjsG', 2429, 2, NULL, '2024-02-11 04:43:47', NULL),
(10, 'Nurse Name', NULL, 'nurse', 'nurse@gmail.com', '$2y$10$.CzHexQFDfcLF07XglsVLuTWmXuw50QEj4ycCqkjWAq7HCCKPZnRG', 8938, 5, NULL, '2024-02-11 05:43:37', NULL),
(11, 'Receptionist', NULL, 'receptionist', 'receptionist@gmail.com', '$2y$10$Dfmk/eR23CVIWUP5d6VL5OpmWTSq0YPs9K9Gi4S9f38S8ffVqs5H.', 234242, 4, NULL, '2024-02-11 08:13:58', NULL),
(12, 'patientBYDoctor', 'patientBYDoctor12728.png', 'patientBYDoctor', 'patientBYDoctor@gmail.com', '$2y$10$xbahJ.SoRAHuFWg5vqLOZOKvWRBD04YHNf0V84P9H6yyGKNPsELxW', 23243, 2, 4, '2024-02-12 00:37:29', NULL),
(13, 'Access Control Manager Name', 'access-control13157.png', 'access-control', 'accesscontrol@gmail.com', '$2y$10$R.Ohin9to9JDKqs/ml/2GuaitnjB.DFiTWRvAxZS6cHdURMuNeWRG', 1323424, 6, NULL, '2024-02-12 08:30:08', NULL),
(14, 'hospital Staff', NULL, 'hospital-staff', 'h-staff@gmail.com', '$2y$10$tG3g0fGU5tYh3Bct5JS/VuH6CFtL/y8WxTd63jWAwOeJ0kGe5eeGK', 2323, 7, NULL, '2024-02-16 07:37:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_relation` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
