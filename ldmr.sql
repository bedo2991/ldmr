-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2016 at 12:54 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ldmr`
--

-- --------------------------------------------------------

--
-- Table structure for table `blacklisted_users`
--

CREATE TABLE `blacklisted_users` (
  `id` char(36) NOT NULL,
  `fullname` varchar(70) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `picture_path` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `reason` varchar(255) NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_until` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` char(36) NOT NULL,
  `short_name` varchar(6) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(70) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` char(36) NOT NULL,
  `name` varchar(70) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `long_description` text,
  `on_invitation_only` tinyint(1) NOT NULL,
  `invited_user_count` int(11) NOT NULL DEFAULT '0',
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `manager_id` char(36) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invited_users`
--

CREATE TABLE `invited_users` (
  `id` char(36) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `email` int(70) DEFAULT NULL,
  `accepted` datetime DEFAULT NULL,
  `event_id` char(36) NOT NULL,
  `manager_id` char(36) NOT NULL COMMENT 'invited by',
  `checkedin` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` char(36) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(70) NOT NULL,
  `role` varchar(20) NOT NULL,
  `club_id` char(36) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `validities`
--

CREATE TABLE `validities` (
  `id` char(36) NOT NULL,
  `blacklisted_user_id` char(36) NOT NULL,
  `club_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklisted_users`
--
ALTER TABLE `blacklisted_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invited_users`
--
ALTER TABLE `invited_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `validities`
--
ALTER TABLE `validities`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
