-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2018 at 10:51 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinit`
--

CREATE DATABASE vinit; 

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `vinit`.`contact` (
  `contact_id` int(11) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `contacted_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `vinit`.`contact` (`contact_id`, `job_id`, `sender_id`, `receiver_id`, `message`, `contacted_time`) VALUES
(1, 5, 2, 3, 'Hi , this message is for user3', '2018-12-26 03:24:10'),
(2, 5, 3, 2, 'Hi user2 \r\n\r\nI am user3. what can I help you?', '2018-12-26 03:26:40'),
(3, 1, 3, 1, 'Hi user1, \r\n\r\nhow can I apply for this job?', '2018-12-26 03:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `vinit`.`job` (
  `job_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `job_title` varchar(128) NOT NULL,
  `job_description` varchar(500) NOT NULL,
  `job_submission_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `vinit`.`job` (`job_id`, `user_id`, `job_title`, `job_description`, `job_submission_time`) VALUES
(1, 1, 'Job 1', 'Job 1 Description', '2018-10-13 02:29:08'),
(2, 1, 'Job 2', 'Job 2 Description', '2018-10-13 02:29:08'),
(3, 2, 'Job 3', 'Job 3 Description', '2018-10-13 02:29:08'),
(4, 2, 'Job 4', 'Job 4 Description', '2018-10-13 02:29:08'),
(5, 3, 'Job 5', 'Job 5 Description', '2018-10-13 02:29:08'),
(6, 3, 'Job 6', 'Job 6 Description', '2018-10-13 02:29:08'),
(7, 4, 'Job 7', 'Job 7 Description', '2018-10-13 02:29:08'),
(8, 4, 'Job 8', 'Job 8 Description', '2018-10-13 02:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `vinit`.`user` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `vinit`.`user` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'user1', '24c9e15e52afc47c225b757e7bee1f9d'),
(2, 'user2', '7e58d63b60197ceb55a1c487989a3720'),
(3, 'user3', '92877af70a45fd6a2ed7fe81e1236b78'),
(4, 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `vinit`.`contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `contact_user_id` (`sender_id`) USING BTREE,
  ADD KEY `job_owner_id` (`receiver_id`) USING BTREE;

--
-- Indexes for table `job`
--
ALTER TABLE `vinit`.`job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `vinit`.`user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `vinit`.`contact`
  MODIFY `contact_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `vinit`.`job`
  MODIFY `job_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `vinit`.`user`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
