-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 03:50 PM
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `c_id` int(6) NOT NULL,
  `u_id` int(6) NOT NULL,
  `app_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `administrates`
--

CREATE TABLE `administrates` (
  `e_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `user_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answersposts`
--

CREATE TABLE `answersposts` (
  `post_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `app_id` int(11) NOT NULL,
  `appname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `app_version` decimal(4,2) NOT NULL,
  `minimumAge` int(11) NOT NULL,
  `appLogo` blob NOT NULL,
  `app_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `req_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `app_status` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `area_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE `checks` (
  `post_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `c_id` int(11) NOT NULL,
  `text` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentson`
--

CREATE TABLE `commentson` (
  `c_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `rate` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `controls`
--

CREATE TABLE `controls` (
  `app_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `u_id` int(11) NOT NULL,
  `dev_info` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dev_website` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`u_id`, `dev_info`, `dev_website`) VALUES
(21939225, 'Ben gökçe.', 'gokce.com'),
(21959945, 'Hedt yolsuz albüm kapağı designerı.', 'www.slmcn.me');

-- --------------------------------------------------------

--
-- Table structure for table `develops`
--

CREATE TABLE `develops` (
  `dev_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `d_os` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `d_ram` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `d_cpu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `d_storage` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`device_id`, `d_os`, `d_ram`, `d_cpu`, `d_storage`) VALUES
(12188009, 'Windows', '512MB', 'Intel', '10GB');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `u_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`u_id`) VALUES
(21949902);

-- --------------------------------------------------------

--
-- Table structure for table `minimum_requirement`
--

CREATE TABLE `minimum_requirement` (
  `req_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `os_version` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ram` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `storage` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `text` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `text`, `title`, `post_date`) VALUES
(13573853, 'Cavid', 'heyyyooo', '2019-12-27 14:48:00'),
(17755769, 'Hi everyone.', 'Hi there', '2019-12-27 14:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `regularuser`
--

CREATE TABLE `regularuser` (
  `u_id` int(11) NOT NULL,
  `area` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regularuser`
--

INSERT INTO `regularuser` (`u_id`, `area`) VALUES
(21921790, 'Azerbaijan'),
(21926490, 'Afghanistan'),
(21938524, 'Turkey'),
(21957311, 'Turkey');

-- --------------------------------------------------------

--
-- Table structure for table `regularuserdevice`
--

CREATE TABLE `regularuserdevice` (
  `device_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regularuserdevice`
--

INSERT INTO `regularuserdevice` (`device_id`, `u_id`) VALUES
(12188009, 21957311);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `c_id` int(11) NOT NULL,
  `text` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `dev_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restricts`
--

CREATE TABLE `restricts` (
  `area_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sharesposts`
--

CREATE TABLE `sharesposts` (
  `post_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sharesposts`
--

INSERT INTO `sharesposts` (`post_id`, `u_id`, `post_views`) VALUES
(13573853, 21957311, 0),
(17755769, 21957311, 1);

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `app_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `u_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `u_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `u_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `u_picture` blob DEFAULT NULL,
  `u_age` int(11) NOT NULL,
  `u_signdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_username`, `u_password`, `u_name`, `u_mail`, `u_picture`, `u_age`, `u_signdate`) VALUES
(21921790, 'cavid97', '123', 'Cavid', 'cavid_97@hotmail.com', NULL, 23, '2019-12-23 20:19:53'),
(21926490, 'Cevad', '12345', 'AhmediCevad', 'ahmedi@cevad.com', NULL, 31, '2019-12-23 20:09:34'),
(21938524, 'gayibli', '123', 'cavid', 'cgayibli@gmail.com', NULL, 21, '2019-12-23 14:06:07'),
(21939225, 'gokce', '123', 'gokce', 'gokce@gmail.com', NULL, 22, '2019-12-23 19:31:10'),
(21949902, 'Akinpakran', '12345', 'Akın', 'akinpakran@yahoo.com.tr', NULL, 13, '2019-12-23 18:43:42'),
(21957311, 'syloog', '123', 'Selim Can Gülsever', 'selimgulsever@gmail.com', NULL, 22, '2019-12-23 20:41:49'),
(21959945, 'Selim', '12345', 'Gülsever', 'selimcan@gmail.com', NULL, 22, '2019-12-23 18:37:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`c_id`,`app_id`,`u_id`),
  ADD KEY `about_app_id_fkey` (`app_id`),
  ADD KEY `about_c_id_fkey` (`c_id`,`u_id`);

--
-- Indexes for table `administrates`
--
ALTER TABLE `administrates`
  ADD PRIMARY KEY (`e_id`,`u_id`),
  ADD KEY `administrates_u_id_fkey` (`u_id`);

--
-- Indexes for table `answersposts`
--
ALTER TABLE `answersposts`
  ADD PRIMARY KEY (`u_id`,`post_id`),
  ADD KEY `answersposts_post_id_fkey` (`post_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `application_app_id_fkey1` (`app_id`,`req_id`),
  ADD KEY `application_cat_id_fkey` (`cat_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `area_app_id_fkey` (`app_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`u_id`,`post_id`),
  ADD KEY `checks_post_id_fkey` (`post_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `commentson`
--
ALTER TABLE `commentson`
  ADD PRIMARY KEY (`c_id`,`u_id`),
  ADD KEY `commentson_u_id_fkey` (`u_id`);

--
-- Indexes for table `controls`
--
ALTER TABLE `controls`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `controls_e_id_fkey` (`e_id`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `develops`
--
ALTER TABLE `develops`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `develops_dev_id_fkey` (`dev_id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`u_id`,`app_id`),
  ADD KEY `downloads_app_id_fkey` (`app_id`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `minimum_requirement`
--
ALTER TABLE `minimum_requirement`
  ADD PRIMARY KEY (`req_id`,`app_id`),
  ADD KEY `minimum_requirement_app_id_fkey` (`app_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_title_key` (`title`);

--
-- Indexes for table `regularuser`
--
ALTER TABLE `regularuser`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `regularuserdevice`
--
ALTER TABLE `regularuserdevice`
  ADD PRIMARY KEY (`device_id`,`u_id`),
  ADD KEY `regularuserdevice_u_id_fkey` (`u_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`c_id`,`u_id`,`app_id`,`dev_id`),
  ADD KEY `replies_dev_id_fkey` (`dev_id`),
  ADD KEY `replies_u_id_fkey` (`u_id`),
  ADD KEY `replies_u_id_fkey1` (`app_id`,`u_id`);

--
-- Indexes for table `restricts`
--
ALTER TABLE `restricts`
  ADD PRIMARY KEY (`area_id`,`app_id`),
  ADD KEY `restricts_app_id_fkey` (`app_id`);

--
-- Indexes for table `sharesposts`
--
ALTER TABLE `sharesposts`
  ADD PRIMARY KEY (`u_id`,`post_id`),
  ADD KEY `sharesposts_post_id_fkey` (`post_id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `updates_u_id_fkey` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_app_id_fkey` FOREIGN KEY (`app_id`) REFERENCES `application` (`app_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `about_c_id_fkey` FOREIGN KEY (`c_id`,`u_id`) REFERENCES `commentson` (`c_id`, `u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `administrates`
--
ALTER TABLE `administrates`
  ADD CONSTRAINT `administrates_e_id_fkey` FOREIGN KEY (`e_id`) REFERENCES `editor` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `administrates_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `answersposts`
--
ALTER TABLE `answersposts`
  ADD CONSTRAINT `answersposts_post_id_fkey` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answersposts_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE;

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT ` application_app_id_fkey` FOREIGN KEY (`app_id`) REFERENCES `develops` (`app_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `application_cat_id_fkey` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_app_id_fkey` FOREIGN KEY (`app_id`) REFERENCES `application` (`app_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `checks_post_id_fkey` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `checks_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `editor` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `commentson`
--
ALTER TABLE `commentson`
  ADD CONSTRAINT `commentson_c_id_fkey` FOREIGN KEY (`c_id`) REFERENCES `comment` (`c_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `commentson_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `controls`
--
ALTER TABLE `controls`
  ADD CONSTRAINT `controls_app_id_fkey` FOREIGN KEY (`app_id`) REFERENCES `application` (`app_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `controls_e_id_fkey` FOREIGN KEY (`e_id`) REFERENCES `editor` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `developer`
--
ALTER TABLE `developer`
  ADD CONSTRAINT `developer_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `develops`
--
ALTER TABLE `develops`
  ADD CONSTRAINT `develops_app_id_fkey` FOREIGN KEY (`app_id`) REFERENCES `application` (`app_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `develops_dev_id_fkey` FOREIGN KEY (`dev_id`) REFERENCES `developer` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_app_id_fkey` FOREIGN KEY (`app_id`) REFERENCES `application` (`app_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `downloads_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `regularuser` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `editor`
--
ALTER TABLE `editor`
  ADD CONSTRAINT `editor_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `minimum_requirement`
--
ALTER TABLE `minimum_requirement`
  ADD CONSTRAINT `minimum_requirement_app_id_fkey` FOREIGN KEY (`app_id`) REFERENCES `application` (`app_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `regularuser`
--
ALTER TABLE `regularuser`
  ADD CONSTRAINT `regularuser_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `regularuserdevice`
--
ALTER TABLE `regularuserdevice`
  ADD CONSTRAINT `regularuserdevice_deviceid_fkey` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `regularuserdevice_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `regularuser` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_app_id_fkey` FOREIGN KEY (`app_id`) REFERENCES `application` (`app_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `replies_c_id_fkey` FOREIGN KEY (`c_id`) REFERENCES `comment` (`c_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `replies_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `regularuser` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `replies_u_id_fkey1` FOREIGN KEY (`app_id`,`u_id`) REFERENCES `downloads` (`app_id`, `u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `restricts`
--
ALTER TABLE `restricts`
  ADD CONSTRAINT `restricts_app_id_fkey` FOREIGN KEY (`app_id`) REFERENCES `application` (`app_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `restricts_area_id_fkey` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sharesposts`
--
ALTER TABLE `sharesposts`
  ADD CONSTRAINT `sharesposts_post_id_fkey` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sharesposts_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `updates`
--
ALTER TABLE `updates`
  ADD CONSTRAINT `updates_app_id_fkey` FOREIGN KEY (`app_id`) REFERENCES `application` (`app_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `updates_u_id_fkey` FOREIGN KEY (`u_id`) REFERENCES `developer` (`u_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
