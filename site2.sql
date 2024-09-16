-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 11:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(5000) NOT NULL,
  `comment` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `state` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_persian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `title`, `comment`, `user_id`, `post_id`, `date`, `state`) VALUES
(1, 'my comment', 'thanks', 2, 1, '2024-09-20', 0),
(2, 'realy', 'but it dont work', 3, 2, '2024-09-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(5000) NOT NULL,
  `content` text NOT NULL,
  `image` mediumtext NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `viewcount` bigint(20) NOT NULL DEFAULT 0,
  `state` int(11) NOT NULL DEFAULT 0,
  `slug` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `admin_id`, `date`, `viewcount`, `state`, `slug`) VALUES
(1, 'hello', '.....', 'color-palette-guide-sample-colors-catalog-.jpg', 1, '2024-09-10', 8, 1, 'dddd'),
(2, 'bye', '....', 'group-of-people-brainstorming-and-taking-notes-4.jpg', 2, '2024-09-12', 3, 0, 'fff');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key_setting` varchar(5000) NOT NULL,
  `value_setting` varchar(5000) NOT NULL,
  `link` varchar(5000) NOT NULL,
  `title` varchar(5000) NOT NULL,
  `text` text NOT NULL,
  `type` varchar(500) NOT NULL DEFAULT 'setting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key_setting`, `value_setting`, `link`, `title`, `text`, `type`) VALUES
(1, 'logo', 'logo.svg', '/', 'logo img', '', 'setting'),
(2, 'footer', 'Asrez', 'https://asrez.ir', 'footer', '', 'setting'),
(3, 'title', 'Tabler', '/', 'title', '', 'setting'),
(4, 'adver1', 'google', 'www.google.com', 'google', 'its a new word ', 'adver');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(5000) NOT NULL,
  `username` varchar(5000) NOT NULL,
  `email` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `image` mediumtext NOT NULL DEFAULT 'default.png',
  `date` date DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `image`, `date`, `state`) VALUES
(1, 'zahra', 'zahra', 'zahra@gmail.com', '202cb962ac59075b964b07152d234b70', 'default.png', '2024-09-04', 1),
(2, 'ali', 'ali', 'ali@gmail.com', '202cb962ac59075b964b07152d234b70', 'default.png', '2024-09-18', 0),
(3, 'vahid', 'vahid', 'vahid@gmail.com', '202cb962ac59075b964b07152d234b70', 'default.png', '2024-09-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(5000) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
