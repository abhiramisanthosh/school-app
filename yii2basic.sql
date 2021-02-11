-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 04:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1612970887);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(155) NOT NULL,
  `password_hash` varchar(155) NOT NULL,
  `auth_key` varchar(155) NOT NULL,
  `password_reset_token` varchar(155) NOT NULL,
  `created_at` date NOT NULL,
  `email` varchar(155) NOT NULL,
  `updated_at` date NOT NULL,
  `access_token` varchar(155) NOT NULL,
  `status` int(11) NOT NULL,
  `fname` varchar(155) NOT NULL,
  `lname` varchar(155) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `photo` varchar(155) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `auth_key`, `password_reset_token`, `created_at`, `email`, `updated_at`, `access_token`, `status`, `fname`, `lname`, `gender`, `photo`, `dob`) VALUES
(1, 'admin', '$2y$13$avZG0ClSZtDnoyBDyRpe2.T/CpkURxyRkxu3iSLKyw1MPKl3shaHG', 'U_D7iyF1R1S2uxOwtBf0sJtNRKRAIr_c', '', '0000-00-00', 'admin@devreadwrite.com', '0000-00-00', '', 10, '', '', '', '', '0000-00-00'),
(16, '', '', 'IyNeva0jaxI6d_J_ZDBFp5RgLxGbovQr', '', '0000-00-00', '', '0000-00-00', '', 10, '', '', '', '', '0000-00-00'),
(17, 'abhi97079', '$2y$13$pwFVBmQ9ADpRu41avC6ac.VYLeNElqVUrEAnZyEWbYRE3vcT.uC/u', 'DqtabMvrKDuo1-c5Khlj7C2J1iJOVU2B', '', '0000-00-00', 'abhiramisanthosh63@gmail.com', '0000-00-00', '', 10, 'abhirami', 'santhosh', 'Female', '', '2021-02-24'),
(18, 'santhosh', '$2y$13$ghH5k1UwjWmB9tPi7RySeejijEJLtbymjaFSgtn0ym5AJzt3jHhYW', 'LY2Zx1imAugGJRW8kEK0f01OZmO5wZZc', '', '0000-00-00', 'rahul@gmail.com', '0000-00-00', '', 10, 's1', 'r', 'Female', '', '2021-02-24'),
(19, 'abhi97079u', '$2y$13$wfZpvl4rdM15z52SRIZwGO9QQfirkBqoOXf1uzcsVFG74FKc6nSPS', 'hIWNTP5x1yo7Q5jhM0L_8fRi2xGWhzhc', '', '0000-00-00', 'a@gmail.com', '0000-00-00', '', 10, 'abhirami', 'santhosh', 'Female', '', '2021-02-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
