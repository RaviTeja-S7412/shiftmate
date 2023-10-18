-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 07:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shiftmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_class_timings`
--

CREATE TABLE `tbl_employee_class_timings` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(11) NOT NULL,
  `day` varchar(25) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee_class_timings`
--

INSERT INTO `tbl_employee_class_timings` (`id`, `employee_id`, `day`, `start_time`, `end_time`, `status`) VALUES
(6, '8', 'Mon', '10:00:00', '12:00:00', 0),
(7, '8', 'Tue', '10:00:00', '11:00:00', 0),
(8, '8', 'Wed', '13:00:00', '15:00:00', 0),
(9, '8', 'Thu', '00:00:00', '00:00:00', 0),
(10, '8', 'Fri', '00:00:00', '00:00:00', 0),
(11, '9', 'Mon', '06:00:00', '08:00:00', 0),
(12, '9', 'Tue', '06:00:00', '08:00:00', 0),
(13, '9', 'Wed', '10:00:00', '12:00:00', 0),
(14, '9', 'Thu', '00:00:00', '00:00:00', 0),
(15, '9', 'Fri', '00:00:00', '00:00:00', 0),
(16, '4', 'Mon', '06:00:00', '08:00:00', 0),
(17, '4', 'Tue', '06:00:00', '10:00:00', 0),
(18, '4', 'Wed', '08:00:00', '12:00:00', 0),
(19, '4', 'Thu', '00:00:00', '00:00:00', 0),
(20, '4', 'Fri', '00:00:00', '00:00:00', 0),
(21, '11', 'Mon', '10:00:00', '12:00:00', 0),
(22, '11', 'Tue', '09:00:00', '12:00:00', 0),
(23, '11', 'Wed', '14:00:00', '15:00:00', 0),
(24, '11', 'Thu', '00:00:00', '00:00:00', 0),
(25, '11', 'Fri', '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedules`
--

CREATE TABLE `tbl_schedules` (
  `id` int(11) NOT NULL,
  `station` varchar(55) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start_time` varchar(55) NOT NULL,
  `end_time` varchar(55) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schedules`
--

INSERT INTO `tbl_schedules` (`id`, `station`, `employee_id`, `start_time`, `end_time`, `created_by`, `created_date`) VALUES
(4, 'Mooyah', 8, '2023-10-10 11:00:00', '2023-10-10 12:00:00', 1, '2023-10-09 14:19:40'),
(5, 'Mooyah', 11, '2023-10-09 13:00:00', '2023-10-09 20:00:00', 1, '2023-10-11 14:26:28'),
(6, 'Mooyah', 11, '2023-10-10 17:00:00', '2023-10-10 22:00:00', 1, '2023-10-11 14:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `station` varchar(55) NOT NULL,
  `class_start_time` time NOT NULL,
  `class_end_time` time NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(25) NOT NULL DEFAULT 'employee',
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `station`, `class_start_time`, `class_end_time`, `created_date`, `role`, `status`) VALUES
(1, 'Admin', '', '9632587410', 'admin@gmail.com', '661a9f9bc592cf65a33eddfc3cb0f34107174b7762c2e865f888d9dc65f34cf13c78e7d32a020da373a7ffa2db6fd20f53b335828e5147e4d49c0fdb5d23bbb1UrNXasERXit3s0tXIorLcw==', '', '00:00:00', '00:00:00', '2023-09-18 17:51:53', 'admin', 'Active'),
(4, 'Puneeth', 'test', '8521479630', 'puneeth@gmail.com', '3fcb9f8519fd18b49aac3550dc7ff2611d51294345c8c5f472121cc7df0a082b6085720040c3fc8b80c7c61cfb8dc54a411e0410aa760c14ce6cb25048e95978uh0py5w66rCg4QZ7KacYdQ==', 'Mooyah', '00:00:00', '00:00:00', '2023-09-30 10:22:34', 'employee', 'Active'),
(8, 'Admin 1', 'Test', '', 'testadmin1@gmail.com', 'a4778cf891d4d90472e1e2366ad2e70ddd574d00278c612479a7b06792f98859477561307b9354f74d6018e4882062e66daeb5d4c9de8530e0a1ee172d9500ccM4nJDLw5HROrMW4ZRa8vBw==', 'Mooyah', '10:00:00', '13:00:00', '2023-10-01 14:15:03', 'employee', 'Active'),
(9, 'Admin 2', 'Test', '', 'testadmin2@gmail.com', '3451c56f4b94d499af6599fd3b2088414bdaa1b87fe2a57c1130291dfaefaa666b28171db6368ffb71edb05f73a8b10d289855a315739ab80c498185aec70deemSRfvVHtxjTtPR4ofI9+VA==', 'Dining', '11:00:00', '16:00:00', '2023-10-01 14:14:53', 'employee', 'Active'),
(11, 'Nithin', 'Sai', '', 'nithin@gmail.com', 'a980c90a137c314f6c31809324b969bc6d7ded8ed5432151bd037f82bd34441507dde2eb31fac2c61fac1fe6ef43b9a68e54a4bf20e0783239e909ba4f67988dhHcgdV93wKTu97ejs6jWfQ==', 'Mooyah', '00:00:00', '00:00:00', '2023-10-11 14:25:03', 'employee', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee_class_timings`
--
ALTER TABLE `tbl_employee_class_timings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee_class_timings`
--
ALTER TABLE `tbl_employee_class_timings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
