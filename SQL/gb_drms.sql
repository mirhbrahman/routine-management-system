-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2018 at 04:34 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gb_drms`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(3, 'Computer Fundamentals', 'CSE111', NULL, NULL),
(4, 'Computer Fundamentals Lab', 'CSE111L', NULL, NULL),
(5, 'Structured  Programming  Language', 'CSE112', NULL, NULL),
(6, 'Structured  Programming  Language Lab', 'CSE112L', NULL, NULL),
(7, 'Mathematics - I', 'MAT113', NULL, NULL),
(8, 'Environmental Science', 'ENV114', NULL, NULL),
(9, 'English - I', 'LAN115', NULL, NULL),
(10, 'Bengali', 'LAN116', NULL, NULL),
(11, 'Viva Voce', 'CSE117', NULL, NULL),
(12, 'Object Oriented  Programming Language', 'CSE121', NULL, NULL),
(13, 'Object Oriented  Programming Language Lab', 'CSE121L', NULL, NULL),
(14, 'Digital Logic  & System  Design', 'CSE122', NULL, NULL),
(15, 'Digital Logic  & System  Design Lab', 'CSE122L', NULL, NULL),
(16, 'Mathematics - II', 'MAT123', NULL, NULL),
(17, 'Physics', 'PHY124', NULL, NULL),
(18, 'English - II', 'LAN125', NULL, NULL),
(19, 'Liberation War Of  Bangladesh', 'LAN126', NULL, NULL),
(20, 'Viva Voce', 'CSE127', NULL, NULL),
(21, 'Data Structures', 'CSE231', NULL, NULL),
(22, 'Data Structures Lab', 'CSE231L', NULL, NULL),
(23, 'Electronics &  Electrical  Circuits', 'CSE232', NULL, NULL),
(24, 'Electronics &  Electrical  Circuits Lab', 'CSE232L', NULL, NULL),
(25, 'Management', 'COM233', NULL, NULL),
(26, 'Statistics & Probability', 'STA234', NULL, NULL),
(27, 'Mathematics - III', 'MAT235', NULL, NULL),
(28, 'Economics', 'ECO236', NULL, NULL),
(29, 'Viva Voce', 'CSE237', NULL, NULL),
(30, 'Algorithms', 'CSE241', NULL, NULL),
(31, 'Algorithms Lab', 'CSE241L', NULL, NULL),
(32, 'Digital  Image Processing', 'CSE242', NULL, NULL),
(33, 'Digital  Image Processing Lab', 'CSE242L', NULL, NULL),
(34, 'Assembly Language Program. Lab', 'CSE243L', NULL, NULL),
(35, 'Discrete Mathematics', 'CSE244', NULL, NULL),
(36, 'Mathematics - IV', 'MAT245', NULL, NULL),
(37, 'Accounting', 'COM246', NULL, NULL),
(38, 'Viva Voce', 'CSE247', NULL, NULL),
(39, 'Database Systems', 'CSE351', NULL, NULL),
(40, 'Database  Systems  Lab', 'CSE351L', NULL, NULL),
(41, 'Microprocessor', 'CSE352', NULL, NULL),
(42, 'Microprocessor Lab', 'CSE352L', NULL, NULL),
(43, 'Data Communication', 'CSE353', NULL, NULL),
(44, 'Automata Theory', 'CSE354', NULL, NULL),
(45, 'Java Programming Lab', 'CSE355L', NULL, NULL),
(46, 'Numerical Methods', 'CSE356', NULL, NULL),
(47, 'Viva Voce', 'CSE357', NULL, NULL),
(48, 'Operating System', 'CSE361', NULL, NULL),
(49, 'Operating System Lab', 'CSE361L', NULL, NULL),
(50, 'Web Engineering', 'CSE362', NULL, NULL),
(51, 'Web Engineering Lab', 'CSE362L', NULL, NULL),
(52, 'Computer Architecture', 'CSE363', NULL, NULL),
(53, 'Computer Peripherals And  Interfacing', 'CSE364', NULL, NULL),
(54, 'Multimedia Systems Lab', 'CSE365L', NULL, NULL),
(55, 'Mobile Application Lab', 'CSE366L', NULL, NULL),
(56, 'Viva Voce', 'CSE367', NULL, NULL),
(57, 'Computer Networks', 'CSE471', NULL, NULL),
(58, 'Computer Networks Lab', 'CSE471L', NULL, NULL),
(59, 'Software Engineering', 'CSE472', NULL, NULL),
(60, 'Software Engineering Lab', 'CSE472L', NULL, NULL),
(61, 'Digital Signal Processing', 'CSE473', NULL, NULL),
(62, 'Compiler Design', 'CSE474', NULL, NULL),
(63, 'Simulation And Modeling', 'CSE475', NULL, NULL),
(64, 'Viva Voce', 'CSE476', NULL, NULL),
(65, 'Computer Graphics', 'CSE481', NULL, NULL),
(66, 'Computer Graphics Lab', 'CSE481L', NULL, NULL),
(67, 'Artificial Intelligence', 'CSE482', NULL, NULL),
(68, 'Artificial Intelligence Lab', 'CSE482L', NULL, NULL),
(69, 'Data Mining', 'CSE483', NULL, NULL),
(70, 'Project Work', 'CSE484', NULL, NULL),
(71, 'Viva Voce', 'CSE485', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_09_13_084321_create_courses_table', 1),
(10, '2018_09_13_095055_create_time_slots_table', 2),
(11, '2018_09_13_131305_create_rooms_table', 3),
(21, '2018_09_13_151354_create_teacher_assigns_table', 4),
(22, '2018_09_14_123123_create_routines_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_no` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `created_at`, `updated_at`) VALUES
(1, 'A100', '2018-09-16 08:27:33', '2018-09-16 08:27:33'),
(2, 'A200', '2018-09-16 08:28:01', '2018-09-16 08:28:01'),
(3, 'A300', '2018-09-16 08:28:14', '2018-09-16 08:28:14'),
(4, 'B100', '2018-09-16 08:28:19', '2018-09-16 08:28:19'),
(5, 'B200', '2018-09-16 08:28:26', '2018-09-16 08:28:26'),
(6, 'B300', '2018-09-16 08:28:35', '2018-09-16 08:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` int(10) UNSIGNED NOT NULL,
  `day_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `time_slot_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `teacher_assign_id` int(11) NOT NULL DEFAULT '0',
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `day_id`, `semester`, `course_id`, `room_id`, `time_slot_id`, `teacher_id`, `teacher_assign_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 37, 1, 4, 5, 0, NULL, '2018-09-19 08:24:58', '2018-09-19 08:24:58'),
(2, 3, 1, 31, 3, 5, 5, 0, 'rr', '2018-09-19 08:25:11', '2018-09-19 08:25:11'),
(4, 1, 2, 52, 3, 5, 5, 0, NULL, '2018-09-19 08:25:46', '2018-09-19 08:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assigns`
--

CREATE TABLE `teacher_assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` int(11) NOT NULL DEFAULT '0',
  `course_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_assigns`
--

INSERT INTO `teacher_assigns` (`id`, `semester`, `course_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 1, 37, 5, '2018-09-19 08:24:21', '2018-09-19 08:24:21'),
(2, 1, 31, 5, '2018-09-19 08:24:31', '2018-09-19 08:24:31'),
(3, 2, 52, 5, '2018-09-19 08:24:42', '2018-09-19 08:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` int(10) UNSIGNED NOT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lunch` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `start`, `end`, `lunch`, `created_at`, `updated_at`) VALUES
(4, '08:45 AM', '09:35 AM', 0, '2018-09-14 06:46:25', '2018-09-14 06:46:25'),
(5, '09:40 AM', '10:30 AM', 0, '2018-09-14 06:47:07', '2018-09-14 06:47:07'),
(6, '10:35 AM', '11:25 AM', 0, '2018-09-14 06:47:54', '2018-09-14 06:47:54'),
(7, '11:30 AM', '12:20 PM', 0, '2018-09-14 06:48:22', '2018-09-14 06:48:22'),
(8, '12:25 PM', '01:15 PM', 0, '2018-09-14 06:48:56', '2018-09-14 06:48:56'),
(9, '01:15 PM', '02:00 PM', 1, '2018-09-14 06:49:28', '2018-09-14 06:49:28'),
(10, '02:00 PM', '02:45 PM', 0, '2018-09-14 06:50:27', '2018-09-14 06:50:27'),
(11, '02:45 PM', '03:30 PM', 0, '2018-09-14 06:51:03', '2018-09-14 06:51:03'),
(12, '03:30 PM', '04:15 PM', 0, '2018-09-14 06:51:21', '2018-09-14 06:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `sort_name`, `email`, `email_verified_at`, `password`, `is_active`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'AD', 'admin@gmail.com', NULL, '$2y$10$lY4jAGqzYzIZxpcAQ2RZk.kVOZPqR4HCIXiVCT/0JSRJHqxwuMKpm', 1, 1, '8vsCxmAJBw8vaAdLIlftIWYOIAOEhz2FOuQ2sm8EIPdtlGlOc3aH4rToZupL', '2018-09-13 03:39:24', '2018-09-14 06:27:59'),
(3, 'Md. Shahriar Setu', 'SS', 'shahriar.setu.bd@ieee.org', NULL, '$2y$10$yvlrwYb6qXK/1tLkIdbtOeVEAtH5D6vI8pDPkDeXZEtSvvpBS/Q52', 1, 0, NULL, '2018-09-16 08:00:51', '2018-09-16 08:00:51'),
(4, 'Md. Atikur Rahman', 'AR', 'atikhasan.cse@gmail.com', NULL, '$2y$10$bJWFELijx.hz29XkoTpN7uxea1fyHjhFrPKFIxkaihG6DYmxRM28C', 1, 0, NULL, '2018-09-16 08:01:31', '2018-09-16 08:01:31'),
(5, 'Md. Rasel Mia', 'RM', 'rasel376mahmud@yahoo.com', NULL, '$2y$10$RFbvZXwv.3ZHAksWlWZ7C.X5Sj99ENlbyrAiCMh61PGNJ28n4.SK2', 1, 0, NULL, '2018-09-16 08:02:01', '2018-09-16 08:02:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routines_course_id_foreign` (`course_id`),
  ADD KEY `routines_teacher_id_foreign` (`teacher_id`),
  ADD KEY `routines_room_id_foreign` (`room_id`),
  ADD KEY `routines_time_slot_id_foreign` (`time_slot_id`);

--
-- Indexes for table `teacher_assigns`
--
ALTER TABLE `teacher_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_assigns_course_id_foreign` (`course_id`),
  ADD KEY `teacher_assigns_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_assigns`
--
ALTER TABLE `teacher_assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `routines`
--
ALTER TABLE `routines`
  ADD CONSTRAINT `routines_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `routines_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `routines_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `routines_time_slot_id_foreign` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slots` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_assigns`
--
ALTER TABLE `teacher_assigns`
  ADD CONSTRAINT `teacher_assigns_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_assigns_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
