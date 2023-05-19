-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2023 at 11:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `start_time` time NOT NULL DEFAULT '00:00:00',
  `stop_time` time NOT NULL DEFAULT '00:00:00',
  `notes` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `user_id`, `start_time`, `stop_time`, `notes`, `description`) VALUES
(1, 1, '09:30:00', '07:30:00', 'Testing', 'Testing of web API'),
(2, 2, '09:30:00', '07:30:00', 'Development', 'Develop Module'),
(3, 3, '09:30:00', '07:30:00', 'Digital Marketing', 'Add run'),
(5, 4, '09:30:00', '07:30:00', 'Testing', 'dscsd'),
(6, 6, '09:30:00', '07:30:00', 'Development', 'Testing Id'),
(7, 2, '09:30:00', '07:30:00', 'Debug', 'Test id for dev mode');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `last_login` varchar(50) DEFAULT NULL,
  `last_password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `last_login`, `last_password`) VALUES
(1, 'Admin', 'pandey', 'admin@gmail.com', '9650041932', 'qwerty', '2023-05-19 12:39:13', ''),
(2, 'Ram', 'pandey', 'ram@gmail.com', '9650041932', 'qwerty', '2023-05-19 12:46:45', ''),
(3, 'Medhu', 'Mishra', 'medhu@gmail.com', '73777578', '$2y$10$ueffwCjik26CPBPz1ep9V.1G36p41xGbmxWeiUcuIBFezGlSJr0mK', '', ''),
(4, 'Ram', 'Kumar', 'ram@gmail.com', '', '123', '', ''),
(5, 'Shyam', 'Kumar', 'ram@gmail.com', '', '$2y$10$eThyWIKyCGsk8uWYvMsJkOumPp8xjDA9R0PlaS/7cEFCi/spkwUZ6', '', ''),
(6, 'Lemon', 'Akk', 'lemon@gmail.com', '73777578', '12', '2023-05-19 12:55:50', ''),
(7, 'test', 'kumar', 'test@gmail.com', '965041932', '$2y$10$OQS2ZDJvk52J8NdWnP.A/OJqqkuVGe/3bcc3OEdfcTwUySPb7o0ze', '2023-05-19 13:00:16', ''),
(8, 'Samsung', 'North Koria', 'sam@gmail.com', '9896546', '$2y$10$v7VLdfvCDL/eooKEj4IMVuX7UJyi8/WvVdmdS1DmyN3I5X3K81Ifa', '2023-05-19 13:40:21', NULL),
(9, 'Metro', 'Delhi', 'metro@gmail.com', '125635', '$2y$10$jot5u1Kp2P3zwtgDeIJg7eLfgmctd3HpoFw/OrfbBR0l7FiXUZ432', '2023-05-19 13:52:19', 'ab8727b61920ddd3d58ba39c2ace332c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
