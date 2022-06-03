-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 08:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `data_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_coin_order` int(11) NOT NULL,
  `total_deal_order` int(11) NOT NULL,
  `total_r_deal_order` int(11) NOT NULL,
  `total_coin` int(11) NOT NULL,
  `wallet_balance` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `user_id`, `total_coin_order`, `total_deal_order`, `total_r_deal_order`, `total_coin`, `wallet_balance`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 200, 300, 400, 0, '2022-05-27 10:45:31', '2022-05-27 10:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id` int(11) NOT NULL,
  `voucher` int(11) NOT NULL,
  `hitted_by` varchar(30) NOT NULL,
  `hitted_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`id`, `voucher`, `hitted_by`, `hitted_date`) VALUES
(42, 2, '01821090909', '2022-06-03 03:36:30'),
(43, 2, '01821090909', '2022-06-03 03:42:49'),
(44, 2, '01821090909', '2022-06-03 03:42:49'),
(45, 2, '01821090909', '2022-06-03 03:43:10'),
(46, 2, '01821090909', '2022-06-03 03:43:10'),
(47, 2, '01821090909', '2022-06-03 03:43:21'),
(48, 2, '01821090909', '2022-06-03 03:43:21'),
(49, 2, '01821090909', '2022-06-03 03:44:00'),
(50, 2, '01821090909', '2022-06-03 03:44:00'),
(51, 2, '01821090909', '2022-06-03 03:45:12'),
(52, 2, '01821090909', '2022-06-03 03:45:12'),
(53, 2, '01821090909', '2022-06-03 03:47:22'),
(54, 2, '01821090909', '2022-06-03 03:47:22'),
(55, 2, '01821090909', '2022-06-03 03:47:57'),
(56, 2, '01821090909', '2022-06-03 03:47:57'),
(57, 2, '01821090909', '2022-06-03 03:48:46'),
(58, 2, '01821090909', '2022-06-03 03:48:46'),
(59, 2, '01821090909', '2022-06-03 03:49:11'),
(60, 2, '01821090909', '2022-06-03 03:49:11'),
(61, 5, '01821090909', '2022-06-03 12:20:55'),
(62, 5, '01821090909', '2022-06-03 12:20:55'),
(63, 2, '01821090909', '2022-06-03 12:21:14'),
(64, 2, '01821090909', '2022-06-03 12:21:14'),
(65, 2, '01821090909', '2022-06-03 12:21:32'),
(66, 2, '01821090909', '2022-06-03 12:21:32'),
(67, 2, '01821090909', '2022-06-03 12:22:58'),
(68, 2, '01821090909', '2022-06-03 12:22:58'),
(69, 2, '01821090909', '2022-06-03 12:23:08'),
(70, 2, '01821090909', '2022-06-03 12:23:08'),
(71, 0, '01821090909', '2022-06-03 12:27:30'),
(72, 0, '01821090909', '2022-06-03 12:27:30'),
(73, 0, '01821090909', '2022-06-03 12:28:10'),
(74, 0, '01821090909', '2022-06-03 12:28:10'),
(75, 0, '01821090909', '2022-06-03 12:28:38'),
(76, 0, '01821090909', '2022-06-03 12:28:38'),
(77, 0, '01821090909', '2022-06-03 12:31:27'),
(78, 0, '01821090909', '2022-06-03 12:31:34'),
(79, 0, '01821090909', '2022-06-03 12:31:59'),
(80, 0, '01821090909', '2022-06-03 12:31:59'),
(81, 0, '01821090909', '2022-06-03 12:32:22'),
(82, 0, '01821090909', '2022-06-03 12:32:22'),
(83, 0, '01821090909', '2022-06-03 12:36:09'),
(84, 0, '01821090909', '2022-06-03 12:36:19'),
(85, 0, '01821090909', '2022-06-03 12:36:28'),
(86, 0, '01821090909', '2022-06-03 12:37:43'),
(87, 0, '01821090909', '2022-06-03 12:37:58'),
(88, 0, '01821090909', '2022-06-03 12:39:13'),
(89, 0, '01821090909', '2022-06-03 12:39:19'),
(90, 0, '01821090909', '2022-06-03 12:39:26'),
(91, 5, '01821090909', '2022-06-03 12:40:16'),
(92, 5, '01821090909', '2022-06-03 12:40:23'),
(93, 5, '01821090909', '2022-06-03 12:44:13'),
(94, 5, '01821090909', '2022-06-03 12:44:20'),
(95, 5, '01821090909', '2022-06-03 12:44:27'),
(96, 5, '01821090909', '2022-06-03 12:44:46'),
(97, 5, '01821090909', '2022-06-03 12:44:53'),
(98, 5, '01821090909', '2022-06-03 12:45:01'),
(99, 5, '01821090909', '2022-06-03 12:46:34'),
(100, 5, '01821090909', '2022-06-03 12:46:44'),
(101, 5, '01821090909', '2022-06-03 12:46:50'),
(102, 5, '01821090909', '2022-06-03 12:47:00'),
(103, 5, '01821090909', '2022-06-03 12:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `nid` varchar(17) NOT NULL,
  `parent` varchar(11) NOT NULL,
  `roles` int(1) NOT NULL DEFAULT 2,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `nid`, `parent`, `roles`, `password`, `created_at`) VALUES
(1, 'Rafeu Ahammed', '01821090909', '', '0', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(5, 'Abir', '01848125325', '23426534573248563', '1821090909', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(6, 'Akash', '01912121212', '84304840483940581', '01821090909', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(7, 'a', '9', '1111', '01821090909', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(8, 'a', '01111', '9', '01821090911', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(9, 'korim', '01742057743', '012345684244441', '01742057743', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(10, 'korim', '01742057722', '012345684244446', '01742057743', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:42'),
(11, 'rohim', '01742057732', '5454154455895225', '01742057743', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 03:00:55'),
(13, 'rohim', '01742057733', '5454154455895224', '01742057743', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 03:01:41'),
(14, 'Batash', '01821112211', '19927384783984739', '01821090909', 2, '202cb962ac59075b964b07152d234b70', '2022-06-02 02:01:59'),
(15, 'Andaman', '01621090909', '12285484995884858', '01821090909', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-06-03 02:48:47'),
(16, 'BBBB', '01921009900', '949304098589', '01821090909', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-06-03 02:51:28'),
(17, 'AAAAAAAAA', '01221122112', '43333333333333333', '01821090909', 2, '21232f297a57a5a743894a0e4a801fc3', '2022-06-03 02:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `voucher_limit` int(11) NOT NULL,
  `owned_by` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `voucher_limit`, `owned_by`, `created_at`, `updated_at`) VALUES
(1, 0, '01821090909', '2022-06-03 01:10:43', '2022-06-03 02:39:36'),
(2, 0, '01821090909', '2022-06-03 01:28:08', '2022-06-03 12:23:08'),
(3, 0, '01742057743', '2022-06-03 01:28:36', '2022-06-03 02:28:50'),
(4, 0, '01821090909', '2022-06-03 01:47:11', '2022-06-03 02:24:49'),
(5, 28, '01821090909', '2022-06-03 12:20:43', '2022-06-03 12:47:04'),
(6, 40, '01821090909', '2022-06-03 12:20:43', '2022-06-03 12:20:43'),
(7, 40, '01821090909', '2022-06-03 12:20:43', '2022-06-03 12:20:43'),
(8, 40, '01821090909', '2022-06-03 12:47:11', '2022-06-03 12:47:11'),
(9, 40, '01821090909', '2022-06-03 12:47:11', '2022-06-03 12:47:11'),
(10, 40, '01821090909', '2022-06-03 12:47:11', '2022-06-03 12:47:11'),
(11, 40, '01821090909', '2022-06-03 12:47:11', '2022-06-03 12:47:11'),
(12, 40, '01821090909', '2022-06-03 12:47:45', '2022-06-03 12:47:45'),
(13, 40, '01821090909', '2022-06-03 12:47:45', '2022-06-03 12:47:45'),
(14, 40, '01821090909', '2022-06-03 12:49:18', '2022-06-03 12:49:18'),
(15, 40, '01821090909', '2022-06-03 12:50:59', '2022-06-03 12:50:59'),
(16, 40, '01821090909', '2022-06-03 12:51:18', '2022-06-03 12:51:18'),
(17, 40, '01821090909', '2022-06-03 12:52:15', '2022-06-03 12:52:15'),
(18, 40, '01821090909', '2022-06-03 12:52:15', '2022-06-03 12:52:15'),
(19, 40, '01821090909', '2022-06-03 12:52:15', '2022-06-03 12:52:15'),
(20, 40, '01821090909', '2022-06-03 12:52:15', '2022-06-03 12:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `phone`, `amount`, `created_at`, `updated_at`) VALUES
(1, '01821090909', 3800, '2022-06-03 02:43:35', '2022-06-03 12:52:15'),
(2, '01221122112', 4900, '2022-06-03 02:53:43', '2022-06-03 11:46:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`data_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`,`nid`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
