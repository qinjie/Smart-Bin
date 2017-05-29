-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2016 at 09:57 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_bins`
--

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE `node` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(50) NOT NULL DEFAULT '' COMMENT 'human readable name',
  `type` varchar(10) DEFAULT NULL COMMENT 'allow grouping of the node',
  `status` int(5) UNSIGNED NOT NULL DEFAULT '1',
  `remark` varchar(200) DEFAULT '',
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`id`, `label`, `type`, `status`, `remark`, `project_id`, `created_by`, `created_at`, `modified_at`) VALUES
(1, 'Bin 1', 'DEFAULT', 1, '', 1, 5, NULL, '2016-03-11 07:36:32'),
(2, 'Bin 2', 'DEFAULT', 1, '', 1, 3, NULL, '2016-03-11 07:41:40'),
(3, 'Bin 3', 'DEFAULT', 1, '', 1, 3, NULL, '2016-03-11 07:41:44'),
(4, 'Bin 4', 'DEFAULT', 1, '', 1, 3, NULL, '2016-03-11 07:41:47'),
(5, 'Bin 5', 'DEFAULT', 1, '', 1, 3, NULL, '2016-03-11 07:41:50'),
(6, 'Bin 6', 'DEFAULT', 1, '', 1, 3, NULL, '2016-03-11 07:41:54'),
(7, 'Bin 7', 'DEFAULT', 1, '', 1, 3, NULL, '2016-03-11 07:41:57'),
(8, 'Bin 11', 'DEFAULT', 1, '', 2, 4, NULL, '2016-03-11 07:42:00'),
(9, 'Bin 12', 'DEFAULT', 1, '', 2, 4, NULL, '2016-03-11 07:42:04'),
(10, 'Bin 13', 'DEFAULT', 1, '', 2, 4, NULL, '2016-03-11 07:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `nodedata`
--

CREATE TABLE `nodedata` (
  `id` int(10) UNSIGNED NOT NULL,
  `node_id` int(10) UNSIGNED NOT NULL,
  `label` varchar(20) NOT NULL DEFAULT '' COMMENT 'data type',
  `value` varchar(50) NOT NULL DEFAULT '' COMMENT 'data value',
  `node_ping_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodedata`
--

INSERT INTO `nodedata` (`id`, `node_id`, `label`, `value`, `node_ping_id`, `created_at`, `modified_at`) VALUES
(1, 2, 'temp', '37.12', NULL, '2015-01-20 17:59:43', '2015-01-20 17:59:43'),
(2, 2, 'temp', '38.12', NULL, '2015-01-20 18:01:12', '2015-01-20 18:01:12'),
(3, 2, 'temp', '38.12', NULL, '2015-01-21 00:47:00', '2015-01-21 00:47:00'),
(4, 2, 'temp', '37.12', NULL, '2015-05-27 21:25:28', '2015-05-27 21:25:28'),
(5, 1, 'humidity', '0.8', NULL, '2015-05-27 21:30:16', '2015-05-27 21:30:16'),
(6, 1, 'humidity', '0.8', NULL, '2015-05-31 18:25:42', '2015-05-31 18:25:42'),
(7, 1, 'temp', '38.12', NULL, '2015-01-20 16:47:00', '2015-01-20 16:47:00'),
(8, 1, 'temp', '37.12', NULL, '2015-01-20 09:59:43', '2015-01-20 09:59:43'),
(9, 2, 'CrowdNow', '123', NULL, '2016-03-09 06:28:48', '2016-03-09 06:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `nodeping`
--

CREATE TABLE `nodeping` (
  `id` int(10) UNSIGNED NOT NULL,
  `node_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodeping`
--

INSERT INTO `nodeping` (`id`, `node_id`, `created_at`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(2, 2, '2016-04-01 03:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `nodesetting`
--

CREATE TABLE `nodesetting` (
  `id` int(10) UNSIGNED NOT NULL,
  `node_id` int(10) UNSIGNED NOT NULL,
  `label` varchar(10) DEFAULT NULL,
  `value` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodesetting`
--

INSERT INTO `nodesetting` (`id`, `node_id`, `label`, `value`, `created_at`, `modified_at`) VALUES
(1, 1, 'Interval', '5', '2015-05-27 21:56:56', '2015-05-27 21:56:56'),
(2, 2, 'Interval', '1', '2015-06-01 05:32:36', '2016-03-11 07:35:02'),
(3, 3, 'Interval', '5', '2015-06-01 04:55:47', '2016-03-11 07:35:06'),
(4, 4, 'Interval', '1', '2015-06-01 04:57:22', '2016-03-11 07:35:12'),
(5, 6, 'Interval', '1', '2015-06-01 05:08:47', '2016-03-11 07:35:16'),
(6, 7, 'Interval', '1', '2015-06-01 05:09:46', '2016-03-11 07:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(100) NOT NULL DEFAULT '',
  `remark` varchar(200) DEFAULT NULL,
  `serial` char(32) DEFAULT NULL COMMENT 'autogenerated, uniquely identify a project',
  `status` int(5) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `label`, `remark`, `serial`, `status`, `user_id`, `created_at`, `modified_at`) VALUES
(1, 'NP Recycle Bins', '', NULL, 1, 3, '2014-07-23 15:22:50', '2016-03-11 07:38:49'),
(2, 'ECE Rubbish Bin', NULL, NULL, 1, 4, NULL, '2016-03-11 07:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `projectsetting`
--

CREATE TABLE `projectsetting` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `label` varchar(10) DEFAULT NULL,
  `value` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectsetting`
--

INSERT INTO `projectsetting` (`id`, `project_id`, `label`, `value`, `created_at`, `modified_at`) VALUES
(33, 1, 'Setting A', 'AAA', NULL, '2016-03-11 08:35:32'),
(34, 1, 'Setting B', 'BBB', NULL, '2016-03-11 08:35:52'),
(35, 1, 'interval', '10', NULL, '2016-03-11 08:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `projectuser`
--

CREATE TABLE `projectuser` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectuser`
--

INSERT INTO `projectuser` (`id`, `project_id`, `user_id`, `created_at`) VALUES
(3, 1, 3, '2016-03-11 07:33:34'),
(4, 1, 5, '2016-03-11 07:32:53'),
(5, 2, 4, '2016-03-11 07:40:04'),
(6, 2, 6, '2016-03-11 07:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) DEFAULT '',
  `password_hash` varchar(255) DEFAULT '',
  `access_token` varchar(32) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT '',
  `email_confirm_token` varchar(255) DEFAULT NULL,
  `role` int(10) UNSIGNED DEFAULT '10',
  `status` smallint(6) DEFAULT '10',
  `allowance` int(10) UNSIGNED DEFAULT NULL,
  `timestamp` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `access_token`, `password_reset_token`, `email`, `email_confirm_token`, `role`, `status`, `allowance`, `timestamp`, `created_at`, `updated_at`) VALUES
(1, 'master', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 40, 10, NULL, NULL, 0, 0),
(2, 'admin', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 30, 10, 298, 1457497221, 0, 0),
(3, 'manager1', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 20, 10, 297, 1459479460, 0, 0),
(4, 'manager2', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 20, 10, 299, 1432481401, 0, 0),
(5, 'user1', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 10, 10, 297, 1459479612, 0, 0),
(6, 'user2', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 10, 10, 299, 1432560400, 0, 0),
(7, 'user3', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 10, 10, 299, 1434507798, 0, 0),
(8, 'user4', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 10, 10, 299, 1434507798, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertoken`
--

CREATE TABLE `usertoken` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(32) NOT NULL DEFAULT '',
  `label` varchar(10) DEFAULT NULL,
  `ip_address` varchar(32) DEFAULT NULL,
  `expire` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `node`
--
ALTER TABLE `node`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `nodedata`
--
ALTER TABLE `nodedata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `node_id` (`node_id`),
  ADD KEY `node_ping_id` (`node_ping_id`);

--
-- Indexes for table `nodeping`
--
ALTER TABLE `nodeping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `node_id` (`node_id`);

--
-- Indexes for table `nodesetting`
--
ALTER TABLE `nodesetting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `node_id` (`node_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ownerId` (`user_id`);

--
-- Indexes for table `projectsetting`
--
ALTER TABLE `projectsetting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectId` (`project_id`);

--
-- Indexes for table `projectuser`
--
ALTER TABLE `projectuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectId` (`project_id`),
  ADD KEY `userId` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertoken`
--
ALTER TABLE `usertoken`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `userId` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `node`
--
ALTER TABLE `node`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `nodedata`
--
ALTER TABLE `nodedata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `nodeping`
--
ALTER TABLE `nodeping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nodesetting`
--
ALTER TABLE `nodesetting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `projectsetting`
--
ALTER TABLE `projectsetting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `projectuser`
--
ALTER TABLE `projectuser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usertoken`
--
ALTER TABLE `usertoken`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `node`
--
ALTER TABLE `node`
  ADD CONSTRAINT `node_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nodedata`
--
ALTER TABLE `nodedata`
  ADD CONSTRAINT `nodedata_ibfk_1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nodedata_ibfk_2` FOREIGN KEY (`node_ping_id`) REFERENCES `nodeping` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `nodeping`
--
ALTER TABLE `nodeping`
  ADD CONSTRAINT `nodeping_ibfk_1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nodesetting`
--
ALTER TABLE `nodesetting`
  ADD CONSTRAINT `nodesetting_ibfk_1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectsetting`
--
ALTER TABLE `projectsetting`
  ADD CONSTRAINT `projectsetting_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectuser`
--
ALTER TABLE `projectuser`
  ADD CONSTRAINT `projectuser_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectuser_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertoken`
--
ALTER TABLE `usertoken`
  ADD CONSTRAINT `usertoken_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
