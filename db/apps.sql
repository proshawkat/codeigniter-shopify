-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2022 at 06:49 AM
-- Server version: 10.5.13-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u394503627_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shop` varchar(200) DEFAULT NULL,
  `shop_owner_email` varchar(50) DEFAULT NULL,
  `email_send_track` int(11) NOT NULL DEFAULT 0,
  `domain` varchar(100) DEFAULT NULL,
  `app_authorized` int(11) NOT NULL DEFAULT 0 COMMENT '0=not auth, 1=auth',
  `app_type` tinyint(1) NOT NULL DEFAULT 0,
  `package_id` int(11) NOT NULL,
  `billing_on` date DEFAULT NULL,
  `recurring_status` varchar(30) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `temp_code` varchar(120) DEFAULT NULL,
  `account_status` int(11) NOT NULL DEFAULT 0 COMMENT '1=active, 0=inactive',
  `fogzee_brand_romve` int(11) NOT NULL DEFAULT 0 COMMENT '0=show, 1=hide',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shop`, `shop_owner_email`, `email_send_track`, `domain`, `app_authorized`, `app_type`, `package_id`, `billing_on`, `recurring_status`, `token`, `status`, `first_name`, `last_name`, `email`, `password`, `temp_code`, `account_status`, `fogzee_brand_romve`, `created_at`, `updated_at`) VALUES
(1, 'shawkat-app.myshopify.com', NULL, 0, NULL, 0, 0, 0, NULL, NULL, 'shpua_6fb0b61ea6f7a2fd30237bb8741a2958', 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shops_meta`
--

CREATE TABLE `shops_meta` (
  `meta_id` int(11) NOT NULL,
  `meta_name` varchar(200) NOT NULL,
  `meta_value` varchar(500) NOT NULL,
  `shop_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops_meta`
--

INSERT INTO `shops_meta` (`meta_id`, `meta_name`, `meta_value`, `shop_id`) VALUES
(1, 'shop_plan_name', 'partner_test', '1'),
(2, 'shop_currency', 'BDT', '1'),
(3, 'shop_timezone', 'Asia/Dhaka', '1'),
(4, 'shop_money_format', 'Tk {{amount}}', '1'),
(5, 'shop_owner', 'Shawkat Ali', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops_meta`
--
ALTER TABLE `shops_meta`
  ADD PRIMARY KEY (`meta_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shops_meta`
--
ALTER TABLE `shops_meta`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
