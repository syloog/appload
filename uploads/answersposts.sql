-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 04:23 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appload`
--

-- --------------------------------------------------------

--
-- Table structure for table `answersposts`
--

CREATE TABLE `answersposts` (
  `post_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `text` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answersposts`
--

INSERT INTO `answersposts` (`post_id`, `u_id`, `text`, `post_date`, `answer_id`) VALUES
(15025065, 21957311, 'dasdasdasd', '2019-12-27 15:23:14', 13617151),
(17755769, 21957311, 'ddawdawdw', '2019-12-27 15:04:55', 14520788);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answersposts`
--
ALTER TABLE `answersposts`
  ADD PRIMARY KEY (`u_id`,`post_id`,`answer_id`) USING BTREE,
  ADD KEY `answersposts_post_id_fkey` (`post_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answersposts`
--
ALTER TABLE `answersposts`
  ADD CONSTRAINT `answersposts_post_id_fkey` FOREIGN KEY (`post_id`) REFERENCES `sharesposts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answersposts_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
