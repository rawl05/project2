-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 03:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_date` date NOT NULL,
  `task_cdate` date DEFAULT '0000-00-00',
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `complete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `task_date`, `task_cdate`, `user_id`, `status`, `complete`) VALUES
(2, 'dgfds', '0000-00-00', NULL, 4, 0, 0),
(3, 'sdfsd', '0000-00-00', NULL, 4, 0, 0),
(4, 'ghgh', '0000-00-00', NULL, 4, 0, 0),
(5, 'fdfgdf', '0000-00-00', '0000-00-00', 4, 0, 0),
(6, 'rawl', '0000-00-00', '0000-00-00', 4, 0, 1),
(7, 'sdsd', '0000-00-00', '0000-00-00', 4, 0, 1),
(8, 'rawl', '0000-00-00', '0000-00-00', 4, 0, 0),
(9, 'dsfsdfsd', '0000-00-00', '2013-03-15', 4, 0, 1),
(10, 'dgfds', '0000-00-00', NULL, 4, 0, 0),
(11, 'ffffff', '0000-00-00', NULL, 4, 0, 0),
(12, 'rrrrrr', '0000-00-00', NULL, 4, 0, 0),
(13, 'ddddd', '0000-00-00', NULL, 4, 0, 0),
(14, 'sdsdsdsdsdsdsdsdsdsds', '0000-00-00', NULL, 4, 0, 0),
(15, 'hello', '2013-03-15', NULL, 4, 0, 0),
(16, '', '2013-03-15', '2013-03-15', 4, 0, 1),
(18, 'lallannn', '2013-03-15', '2013-03-15', 4, 0, 1),
(19, 'rawlll', '2013-03-15', '0000-00-00', 4, 0, 0),
(20, 'Rawl', '2013-03-15', '0000-00-00', 4, 1, 1),
(21, 'Lallan', '2013-03-15', '2013-03-15', 5, 0, 1),
(22, '67676', '2013-03-15', '0000-00-00', 5, 1, 1),
(23, 'g', '2013-03-15', '2013-03-15', 5, 1, 1),
(24, 'gg', '2013-03-15', '0000-00-00', 5, 1, 0),
(25, 'gg', '2013-03-15', '0000-00-00', 5, 0, 0),
(26, 'hhh', '2013-03-15', '0000-00-00', 5, 1, 0),
(27, 'hjhj', '2013-03-15', '0000-00-00', 5, 1, 0),
(28, 'lallan', '2013-03-15', '0000-00-00', 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `mobile`) VALUES
(4, 'erson', 'pereira', 'erson@gmail.com', '8345bf2e7ce951f642d1b7ac8eb909eb', '8999696267'),
(5, 'Rawl', 'Lopes', 'rawllopes@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9545995564'),
(6, 'Rawl', 'Lopes', 'rajeshnunes@gmail.com', 'b53b3a3d6ab90ce0268229151c9bde11', '9545995564');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
