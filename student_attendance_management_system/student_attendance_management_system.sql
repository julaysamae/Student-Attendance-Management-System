-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 04:09 AM
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
-- Database: `student_attendance_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `course`, `title`, `details`, `due_date`) VALUES
(2, 'BS - Information Technology', 'Capstone Project', 'Capstone Project: [Student Attendance Management System]\r\n\r\nFunctional Requirements (70%) \r\n\r\n1. User Authentication (30%)\r\na. Sign Up: Users should be able to create an account with a username, email, and password.\r\nb. Log In: Users should be able to log in with their email and password.\r\nc. Log Out: Users should be able to log out securely.\r\nd. Password Hashing: Ensure that passwords are stored securely using hashing algorithms (e.g., bcrypt).\r\n\r\n2. Student Attendance Management System (CRUD Operations) (40%)\r\na. Create: Add new assignments for a specific course.\r\nb. Read: View assignment details.\r\nc. Update: Modify assignment details.\r\nd. Delete: Remove assignments.\r\n\r\nNon-Functional Requirements (25%)\r\n1. Performance\r\na. Ensure the application is responsive and performs CRUD operationsquickly.\r\n\r\n2. Usability\r\na. User-friendly interface with clear navigation and intuitive forms.\r\nb. Mobile-friendly design.\r\n\r\n3. Security\r\na. Secure user authentication with hashed passwords.\r\nb. Protect against common security vulnerabilities (e.g., SQL injection, XSS).\r\n\r\n4. Reliability\r\na. Ensure data integrity and consistency, especially during CRUD operations.\r\n\r\nTechnical Requirements (15%)\r\n1. Front-End\r\na. HTML, CSS, JavaScript (preferably using a library like jQuery for simplicity).\r\n\r\n2. Back-End\r\na. PHP for server-side logic.\r\nb. Database\r\n\r\n3. MySQL for data storage.\r\na. Use PDO for secure database interactions.\r\nb. Version Control\r\n\r\n4. Use Git for version control and collaboration.\r\n\r\n5. Submit your code via a Git repository.', '2024-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(0, '', 'admin@gmail.com', '$2y$10$GGADOtcq6jwLo0agyzXdj.OhsyK4cN3NC27SoeXV6o/GpHkGypvQy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
