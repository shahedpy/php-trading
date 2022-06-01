-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 10:40 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `nid` varchar(17) NOT NULL,
  `referral_id` varchar(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `nid`, `referral_id`, `password`, `created_at`) VALUES
(1, 'Rafeu Ahammed', '01821090909', '', '0', '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(4, 'Rafeu Ahammed', '01742057743', '1', '123', 'c20ad4d76fe97759aa27a0c99bff6710', '2022-05-31 02:50:06'),
(5, 'Abir', '01848125325', '23426534573248563', '1821090909', '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(6, 'Akash', '01912121212', '84304840483940581', '01821090909', '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(7, 'a', '9', '1111', '01821090909', '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(8, 'a', '01111', '9', '01821090911', '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(9, 'korim', '01742057743', '012345684244441', '01742057743', '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:06'),
(10, 'korim', '01742057722', '012345684244446', '01742057743', '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 02:50:42'),
(11, 'rohim', '01742057732', '5454154455895225', '01742057743', '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 03:00:55'),
(13, 'rohim', '01742057733', '5454154455895224', '01742057743', '21232f297a57a5a743894a0e4a801fc3', '2022-05-31 03:01:41'),
(14, 'Batash', '01821112211', '19927384783984739', '01821090909', '202cb962ac59075b964b07152d234b70', '2022-06-02 02:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `voucher_limit` int(11) NOT NULL,
  `owned_by` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
