-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 04:24 AM
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
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `asset_code` varchar(255) NOT NULL,
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `floor_id` bigint(20) UNSIGNED NOT NULL,
  `gas_type` varchar(255) DEFAULT NULL,
  `gas_owner_part_amount` decimal(8,2) DEFAULT NULL,
  `gas_rental_part_amount` decimal(8,2) DEFAULT NULL,
  `lift_facility` varchar(255) DEFAULT NULL,
  `electricity_type` varchar(255) DEFAULT NULL,
  `e_owner_part_amount` decimal(8,2) DEFAULT NULL,
  `e_rental_part_amount` decimal(8,2) DEFAULT NULL,
  `water_type` varchar(255) DEFAULT NULL,
  `water_owner_part_amount` decimal(8,2) DEFAULT NULL,
  `water_rental_part_amount` decimal(8,2) DEFAULT NULL,
  `unit_size` varchar(255) DEFAULT NULL,
  `unit_view` varchar(255) DEFAULT NULL,
  `monthly_rent` decimal(10,2) DEFAULT NULL,
  `service_charge` decimal(10,2) DEFAULT NULL,
  `others_charge` decimal(10,2) DEFAULT NULL,
  `available_from` date DEFAULT NULL,
  `others_description` text DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `unit_name`, `asset_code`, `building_id`, `location_id`, `floor_id`, `gas_type`, `gas_owner_part_amount`, `gas_rental_part_amount`, `lift_facility`, `electricity_type`, `e_owner_part_amount`, `e_rental_part_amount`, `water_type`, `water_owner_part_amount`, `water_rental_part_amount`, `unit_size`, `unit_view`, `monthly_rent`, `service_charge`, `others_charge`, `available_from`, `others_description`, `employee_id`, `status`, `created_at`, `updated_at`) VALUES
(10, 'House-1732 (2/A)', 'HOU-99176', 11, 5, 12, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'South View', 12030.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-21 13:12:14', '2024-09-26 07:15:25'),
(11, '1/A', '1/A-31474', 10, 6, 18, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'Front Side', 5000.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 09:23:26', '2024-09-22 10:21:01'),
(12, '1/B', '1/B-53022', 10, 6, 18, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'Front Side', 3600.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 10:12:46', '2024-09-22 10:20:21'),
(13, '1/C', '1/C-12226', 10, 6, 18, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9930.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 10:23:21', '2024-09-22 10:23:21'),
(14, '2/A', '2/A-35219', 10, 6, 19, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14560.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 10:26:14', '2024-09-22 10:26:14'),
(15, '2/B', '2/B-34697', 10, 6, 19, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12430.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 10:28:18', '2024-09-22 10:28:18'),
(16, '3/A', '3/A-59470', 10, 6, 20, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12930.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 10:55:27', '2024-09-22 10:55:27'),
(17, '3/B', '3/B-47498', 10, 6, 20, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12430.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 10:57:06', '2024-09-22 10:57:06'),
(18, '4/A', '4/A-89080', 10, 6, 21, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13330.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 10:59:58', '2024-09-22 10:59:58'),
(19, '4/B', '4/B-11911', 10, 6, 21, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14460.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 11:48:33', '2024-09-22 11:48:33'),
(20, '5/A', '5/A-85633', 10, 6, 22, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10930.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 11:50:15', '2024-09-22 11:50:15'),
(21, '5/B', '5/B-21764', 10, 6, 22, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11430.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 11:52:45', '2024-09-22 11:52:45'),
(22, '6/A', '6/A-67553', 10, 6, 23, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10930.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 11:59:22', '2024-09-22 11:59:22'),
(23, '6/B', '6/B-14746', 10, 6, 23, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1930.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 12:00:52', '2024-09-22 12:00:52'),
(24, '7/A', '7/A-47473', 10, 6, 24, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1580.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 12:02:11', '2024-09-22 12:02:11'),
(25, '7/B', '7/B-32009', 10, 6, 24, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1580.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 12:03:31', '2024-09-22 12:03:31'),
(26, 'S/1/A', 'S/1-77182', 14, 6, 25, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6580.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 12:20:22', '2024-09-22 12:20:22'),
(27, 'S/1/B', 'S/1-47943', 14, 6, 25, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8930.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 12:27:42', '2024-09-22 12:27:42'),
(28, 'S/2/A', 'S/2-89235', 14, 6, 19, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9430.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 12:29:12', '2024-09-22 12:29:12'),
(29, 'S/2/B', 'S/2-25025', 14, 6, 19, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8500.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 12:30:25', '2024-09-22 12:30:25'),
(30, 'S/3/A', 'S/3-24875', 14, 6, 20, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10430.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 12:31:29', '2024-09-22 12:31:29'),
(31, 'S/3/B', 'S/3-87661', 14, 6, 20, 'Post Paid', NULL, NULL, 'No', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9930.00, 300.00, NULL, NULL, NULL, 10, '1', '2024-09-22 12:32:34', '2024-09-22 12:32:34'),
(32, 'Grasp Shop No 1', 'GRA-64929', 13, 9, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Front Side', 5500.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-22 13:09:35', '2024-09-22 13:09:35'),
(33, 'Grasp Shop No 3', 'GRA-76924', 13, 9, 26, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, 'Front Side', 4400.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-22 13:35:12', '2024-09-22 13:35:12'),
(35, 'Grasp Shop No 5', 'GRA-74821', 13, 9, 26, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, 'Back Side', 4700.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-22 13:48:57', '2024-09-22 13:48:57'),
(36, '3rd', '3RD-73942', 15, 10, 29, 'Post Paid', NULL, NULL, 'Yes', 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'Front Side', 61875.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-23 13:39:31', '2024-09-23 14:01:23'),
(37, '4th', '4TH-21774', 15, 10, 32, 'Post Paid', NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 61875.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-23 13:46:54', '2024-09-23 13:46:54'),
(38, '5th', '5TH-60788', 15, 10, 33, 'Post Paid', NULL, NULL, 'Yes', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-23 13:51:21', '2024-09-23 13:51:21'),
(39, '6th', '6TH-30995', 15, 10, 34, 'Post Paid', NULL, NULL, 'Yes', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 57891.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-23 13:55:28', '2024-09-23 13:55:28'),
(40, '7th', '7TH-27534', 15, 10, 35, 'Post Paid', NULL, NULL, 'Yes', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 57891.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-23 13:56:25', '2024-09-23 13:56:25'),
(41, '9th', '9TH-69587', 15, 10, 37, 'Post Paid', NULL, NULL, 'Yes', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-23 13:58:36', '2024-09-23 13:58:36'),
(42, 'Grasp Shop 7', 'GRA-69767', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1650.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 09:50:33', '2024-09-24 09:50:33'),
(44, 'Grasp Shop No 8', 'GRA-91689', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4000.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 10:10:42', '2024-09-24 10:10:42'),
(45, 'Grasp Shop No 9', 'GRA-59169', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6600.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 10:15:27', '2024-09-24 10:15:27'),
(46, 'Grasp Shop No 10', 'GRA-54769', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4000.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 10:22:18', '2024-09-24 10:22:18'),
(47, 'Grasp Shop No 12', 'GRA-40524', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14000.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 10:27:46', '2024-09-24 10:27:46'),
(48, '8th', '8TH-99120', 15, 10, 36, 'Post Paid', NULL, NULL, 'Yes', 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-24 10:29:36', '2024-09-24 10:29:36'),
(49, 'Grasp Shop No 14', 'GRA-37048', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3600.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 10:33:02', '2024-09-24 10:33:02'),
(50, 'Grasp Shop No 15', 'GRA-20939', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8800.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 10:39:08', '2024-09-24 10:39:08'),
(51, 'Grasp Shop No 16', 'GRA-25384', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3600.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 10:47:19', '2024-09-24 10:47:19'),
(52, 'Grasp Shop No 17', 'GRA-76380', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7000.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 10:51:50', '2024-09-24 10:51:50'),
(53, 'Grasp Shop No 18', 'GRA-93927', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5000.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 10:56:49', '2024-09-24 10:56:49'),
(54, 'Grasp Shop No 19', 'GRA-13102', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5500.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 11:00:27', '2024-09-24 11:00:27'),
(55, 'Grasp Shop No 20', 'GRA-30569', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3600.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 11:12:21', '2024-09-24 11:12:21'),
(56, 'Grasp Shop No 21', 'GRA-62511', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3600.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 11:17:05', '2024-09-24 11:17:05'),
(57, 'Grasp Shop No 23', 'GRA-49704', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3600.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 11:24:26', '2024-09-24 11:24:26'),
(58, 'Grasp Shop No 24', 'GRA-96646', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7500.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 11:33:13', '2024-09-24 11:33:13'),
(59, 'Grasp Shop No 25', 'GRA-94194', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15000.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 11:58:10', '2024-09-24 11:58:10'),
(60, 'Grasp Shop No-26', 'GRA-45496', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22600.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 12:05:16', '2024-09-24 12:05:16'),
(61, 'Grasp Shop No 28', 'GRA-15545', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48600.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 12:21:15', '2024-09-24 12:21:15'),
(62, 'Grasp Shop No 30', 'GRA-11526', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8000.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 12:26:37', '2024-09-24 12:26:37'),
(63, 'Grasp Shop No 31', 'GRA-88817', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5100.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 12:37:36', '2024-09-24 12:37:36'),
(64, 'Grasp Shop No 32', 'GRA-38325', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-24 12:46:58', '2024-09-24 12:46:58'),
(65, 'Grasp Shop No 33', 'GRA-85774', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4500.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-24 12:51:42', '2024-09-24 12:51:42'),
(66, 'Grasp Shop No 34', 'GRA-20910', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4500.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 12:57:31', '2024-09-24 12:57:31'),
(67, 'Grasp Shop No 35', 'GRA-27557', 13, 9, 30, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3700.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-24 13:03:00', '2024-09-24 13:03:00'),
(68, 'House-1273 (1/D)', 'HOU-39376', 11, 5, 11, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'North View', 10300.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 07:56:13', '2024-09-26 07:27:57'),
(69, 'House-1273 (2/C)', 'HOU-92229', 11, 5, 12, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'North View', 15630.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 08:17:47', '2024-09-26 07:28:23'),
(70, 'House-1273 (3/A)', 'HOU-23228', 11, 5, 13, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'South View', 12530.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 08:35:21', '2024-09-26 07:29:10'),
(71, 'House-1273 (3/B)', 'HOU-90688', 11, 5, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12130.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 08:45:54', '2024-09-25 08:45:54'),
(72, 'House-1273 (4/A)', 'HOU-51618', 11, 5, 14, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'South View', 12030.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 09:01:30', '2024-09-26 07:30:46'),
(73, 'House-1273 (5/A)', 'HOU-49105', 11, 5, 15, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'South View', 11530.00, NULL, NULL, NULL, NULL, 10, '1', '2024-09-25 09:08:12', '2024-09-26 07:31:00'),
(74, 'Shop No 1', 'SHO-67519', 16, 11, 44, NULL, NULL, NULL, NULL, 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 18600.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:40:12', '2024-09-25 09:40:12'),
(75, 'Shop No 2', 'SHO-43064', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 7300.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:41:33', '2024-09-25 09:41:33'),
(76, 'Shop No 3', 'SHO-98836', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 12100.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:42:27', '2024-09-25 09:42:27'),
(77, 'Shop No 4', 'SHO-85253', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 9000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:43:28', '2024-09-25 09:43:28'),
(78, 'Shop No 5', 'SHO-50975', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 7000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:44:40', '2024-09-25 09:44:40'),
(79, 'Shop No 6', 'SHO-13160', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 5000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:47:10', '2024-09-25 09:47:10'),
(80, 'Shop No 7', 'SHO-22711', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 10000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:48:10', '2024-09-25 09:48:10'),
(81, 'Shop No 8', 'SHO-25685', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 12100.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:49:03', '2024-09-25 09:49:03'),
(82, 'Shop No 9', 'SHO-15734', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 13000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:50:41', '2024-09-25 09:50:41'),
(83, 'Shop No 10', 'SHO-10475', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 18600.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:51:40', '2024-09-25 09:51:40'),
(84, 'Shop No 11', 'SHO-23540', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 18600.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:52:29', '2024-09-25 09:52:29'),
(85, 'Shop No 12', 'SHO-52127', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 12100.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:53:24', '2024-09-25 09:53:24'),
(86, 'Shop No 13', 'SHO-98082', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 113000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:54:24', '2024-09-25 09:54:24'),
(87, 'Shop No 14', 'SHO-38541', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 7300.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:55:08', '2024-09-25 09:55:08'),
(88, 'Shop No 15', 'SHO-31167', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 5800.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:56:58', '2024-09-25 09:56:58'),
(89, 'Shop No 16', 'SHO-23803', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 11300.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:57:58', '2024-09-25 09:57:58'),
(90, 'Shop No 17', 'SHO-60250', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 12100.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 09:59:01', '2024-09-25 09:59:01'),
(91, 'Shop No 18', 'SHO-98665', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 10500.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:00:05', '2024-09-25 10:00:05'),
(92, 'Shop No 19', 'SHO-80351', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 18600.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:00:57', '2024-09-25 10:00:57'),
(93, 'Shop No 20', 'SHO-92551', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 7300.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:01:44', '2024-09-25 10:01:44'),
(94, 'Shop No 21', 'SHO-44103', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 9500.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:02:39', '2024-09-25 10:02:39'),
(95, 'Shop No 22', 'SHO-72875', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 9700.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:03:25', '2024-09-25 10:03:25'),
(96, 'Shop No 23', 'SHO-38019', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 4000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:04:10', '2024-09-25 10:04:10'),
(97, 'Shop No 24', 'SHO-16006', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 6300.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:05:04', '2024-09-25 10:05:04'),
(98, 'Shop No 25', 'SHO-64433', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 4900.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:06:21', '2024-09-25 10:06:21'),
(99, 'Shop No 26', 'SHO-45968', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 5800.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:07:25', '2024-09-25 10:07:25'),
(100, 'Shop No 27', 'SHO-83103', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 5800.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:08:30', '2024-09-25 10:08:30'),
(101, 'Shop No 28', 'SHO-75039', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 7300.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:09:22', '2024-09-25 10:09:22'),
(102, 'House-1273 (5/C)', 'HOU-51258', 11, 5, 15, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'North View', 15630.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 10:09:33', '2024-09-26 07:31:36'),
(103, 'Shop No 29', 'SHO-97199', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 13000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:10:09', '2024-09-25 10:10:09'),
(104, 'Shop No 30', 'SHO-88793', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 18600.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:11:11', '2024-09-25 10:11:11'),
(105, 'Shop No 31', 'SHO-27349', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 18600.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:12:14', '2024-09-25 10:12:14'),
(106, 'Shop No 32', 'SHO-42884', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 12100.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:13:06', '2024-09-25 10:13:06'),
(107, 'Shop No 33', 'SHO-18391', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 9700.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:13:56', '2024-09-25 10:13:56'),
(108, 'Shop No 34', 'SHO-43111', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 5700.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:14:47', '2024-09-25 10:14:47'),
(109, 'Shop No 35', 'SHO-79778', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 9700.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:15:39', '2024-09-25 10:15:39'),
(110, 'Shop No 36', 'SHO-26643', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 12100.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:16:38', '2024-09-25 10:16:38'),
(111, 'Shop No 37', 'SHO-44808', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 12100.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:17:19', '2024-09-25 10:17:19'),
(112, 'Shop No 38', 'SHO-61292', 16, 11, 44, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 22000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:18:14', '2024-09-25 10:18:14'),
(113, 'Shop No 39', 'SHO-16907', 16, 11, 45, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 30000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:19:12', '2024-09-25 10:19:12'),
(114, 'Shop No 40', 'SHO-38538', 16, 11, 45, NULL, NULL, NULL, 'No', 'Post Paid', NULL, NULL, 'Post Paid', NULL, NULL, NULL, NULL, 250000.00, NULL, NULL, NULL, NULL, 11, '1', '2024-09-25 10:20:20', '2024-09-25 10:20:20'),
(115, 'House-1273 (6/A)', 'HOU-70537', 11, 5, 16, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'South View', 11030.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 10:21:43', '2024-09-26 07:32:20'),
(116, 'House-1273 (6/C)', 'HOU-93738', 11, 5, 16, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'North View', 14430.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 10:29:46', '2024-09-26 07:32:34'),
(117, 'House-1273 (7/A)', 'HOU-19254', 11, 5, 17, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'South View', 10030.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 10:45:47', '2024-09-26 07:32:49'),
(118, 'House-1273 (6/B)', 'HOU-92328', 11, 5, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11030.00, NULL, NULL, NULL, NULL, 10, '1', '2024-09-25 10:53:33', '2024-09-25 10:53:33'),
(119, 'House-1273 (5/B)', 'HOU-51682', 11, 5, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13130.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 11:07:48', '2024-09-25 11:07:48'),
(120, 'House-1273 (4/C)', 'HOU-55513', 11, 5, 14, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'North View', 15630.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 12:02:41', '2024-09-26 07:33:28'),
(121, 'House-1273 (4/A)', 'HOU-41803', 11, 5, 14, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'South View', 12030.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 12:11:16', '2024-09-26 07:33:43'),
(122, 'House-1273 (3/C)', 'HOU-85907', 11, 5, 13, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'North View', 15830.00, NULL, NULL, NULL, NULL, 10, '1', '2024-09-25 12:22:24', '2024-09-26 07:34:11'),
(123, 'House-1273 (2/B)', 'ABU-55257', 11, 5, 12, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'Front Side', 13130.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 12:32:08', '2024-09-25 12:33:09'),
(124, 'House-1273 (1/C)', 'HOU-87728', 11, 5, 11, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, 'Prepaid', NULL, NULL, NULL, 'North View', 7000.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 12:39:56', '2024-09-26 07:35:00'),
(125, 'House-1273 (1/A)', 'HOU-20261', 11, 5, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'South View', 11030.00, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-25 13:05:25', '2024-09-25 13:05:25'),
(126, 'Grasp Shop No 2', 'GRA-95365', 13, 9, 44, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9350.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-25 13:16:26', '2024-09-25 13:16:26'),
(127, 'Grasp Shop No 6', 'GRA-22066', 13, 9, 44, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11300.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-25 13:24:25', '2024-09-25 13:24:25'),
(128, 'Grasp Shop No 11', 'GRA-84376', 13, 9, 44, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3300.00, NULL, NULL, '2024-09-01', NULL, 11, '1', '2024-09-25 13:28:52', '2024-09-25 13:28:52'),
(129, 'House-1732 (7/B)', 'HOU-60236', 11, 9, 24, NULL, NULL, NULL, NULL, 'Prepaid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-01', NULL, 10, '1', '2024-09-26 09:10:23', '2024-09-26 09:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `floor_id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','confirmed','canceled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `location_id`, `building_id`, `floor_id`, `asset_id`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(8, 5, 11, 12, 10, 2, 'confirmed', '2024-09-21 13:15:46', '2024-09-26 09:47:20'),
(9, 6, 10, 18, 11, 3, 'pending', '2024-09-22 12:40:33', '2024-09-22 12:40:33'),
(10, 6, 10, 18, 12, 4, 'pending', '2024-09-22 12:43:38', '2024-09-22 12:43:38'),
(11, 6, 10, 18, 13, 5, 'confirmed', '2024-09-22 12:48:16', '2024-09-26 12:59:50'),
(12, 6, 10, 19, 15, 6, 'pending', '2024-09-22 13:11:25', '2024-09-22 13:11:25'),
(13, 6, 10, 20, 17, 7, 'pending', '2024-09-22 13:15:21', '2024-09-22 13:15:21'),
(14, 9, 13, 25, 32, 8, 'pending', '2024-09-22 13:19:10', '2024-09-22 13:23:42'),
(15, 6, 10, 21, 18, 9, 'confirmed', '2024-09-22 13:20:05', '2024-09-26 12:59:18'),
(16, 6, 10, 21, 19, 10, 'pending', '2024-09-22 13:25:48', '2024-09-22 13:25:48'),
(17, 6, 10, 22, 20, 11, 'pending', '2024-09-22 13:30:09', '2024-09-22 13:30:09'),
(18, 9, 13, 26, 33, 12, 'pending', '2024-09-22 13:37:51', '2024-09-22 13:37:51'),
(19, 6, 10, 23, 22, 13, 'pending', '2024-09-22 13:38:45', '2024-09-22 13:38:45'),
(20, 6, 10, 23, 23, 14, 'pending', '2024-09-22 13:42:11', '2024-09-22 13:42:11'),
(21, 6, 10, 24, 24, 15, 'pending', '2024-09-22 13:45:00', '2024-09-22 13:45:00'),
(22, 6, 10, 24, 25, 16, 'pending', '2024-09-22 13:47:14', '2024-09-22 13:47:14'),
(23, 9, 13, 26, 35, 17, 'pending', '2024-09-22 13:50:26', '2024-09-22 13:50:26'),
(24, 6, 14, 25, 26, 18, 'pending', '2024-09-22 13:51:18', '2024-09-22 13:51:18'),
(25, 6, 14, 25, 27, 19, 'pending', '2024-09-22 13:53:32', '2024-09-22 13:53:32'),
(26, 6, 14, 19, 28, 20, 'pending', '2024-09-22 13:55:24', '2024-09-22 13:55:24'),
(27, 6, 14, 19, 29, 21, 'pending', '2024-09-22 13:58:18', '2024-09-22 13:58:18'),
(28, 6, 14, 20, 30, 22, 'pending', '2024-09-22 14:00:27', '2024-09-22 14:00:27'),
(29, 6, 14, 20, 31, 23, 'pending', '2024-09-22 14:02:29', '2024-09-22 14:02:29'),
(30, 10, 15, 29, 36, 24, 'pending', '2024-09-23 14:04:10', '2024-09-23 14:04:10'),
(31, 10, 15, 32, 37, 25, 'pending', '2024-09-23 14:05:34', '2024-09-23 14:05:34'),
(32, 10, 15, 33, 38, 26, 'pending', '2024-09-23 14:08:07', '2024-09-23 14:08:07'),
(33, 10, 15, 34, 39, 27, 'pending', '2024-09-23 14:09:44', '2024-09-23 14:09:44'),
(34, 10, 15, 35, 40, 28, 'pending', '2024-09-23 14:11:05', '2024-09-23 14:11:05'),
(35, 10, 15, 37, 41, 29, 'pending', '2024-09-23 14:12:44', '2024-09-23 14:12:44'),
(36, 9, 13, 30, 42, 30, 'pending', '2024-09-24 10:00:53', '2024-09-24 10:00:53'),
(37, 9, 13, 30, 44, 31, 'pending', '2024-09-24 10:12:41', '2024-09-24 10:12:41'),
(38, 9, 13, 30, 45, 32, 'pending', '2024-09-24 10:19:01', '2024-09-24 10:19:01'),
(39, 9, 13, 30, 46, 33, 'pending', '2024-09-24 10:23:46', '2024-09-24 10:23:46'),
(40, 9, 13, 30, 47, 34, 'pending', '2024-09-24 10:29:06', '2024-09-24 10:29:06'),
(41, 10, 15, 36, 48, 35, 'pending', '2024-09-24 10:30:48', '2024-09-24 10:30:48'),
(42, 9, 13, 30, 49, 36, 'pending', '2024-09-24 10:34:11', '2024-09-24 10:34:11'),
(43, 9, 13, 30, 50, 37, 'pending', '2024-09-24 10:42:22', '2024-09-24 10:42:22'),
(44, 9, 13, 30, 51, 38, 'pending', '2024-09-24 10:48:23', '2024-09-24 10:48:23'),
(45, 9, 13, 30, 52, 39, 'pending', '2024-09-24 10:53:14', '2024-09-24 10:53:14'),
(46, 9, 13, 30, 53, 40, 'pending', '2024-09-24 10:57:58', '2024-09-24 10:57:58'),
(47, 9, 13, 30, 54, 41, 'pending', '2024-09-24 11:05:00', '2024-09-24 11:05:00'),
(48, 9, 13, 30, 55, 42, 'pending', '2024-09-24 11:13:27', '2024-09-24 11:13:27'),
(49, 9, 13, 30, 56, 43, 'pending', '2024-09-24 11:20:10', '2024-09-24 11:20:10'),
(50, 9, 13, 30, 57, 44, 'pending', '2024-09-24 11:26:07', '2024-09-24 11:26:07'),
(51, 9, 13, 30, 58, 45, 'pending', '2024-09-24 11:34:49', '2024-09-24 11:34:49'),
(52, 9, 13, 30, 59, 46, 'pending', '2024-09-24 12:02:13', '2024-09-24 12:02:13'),
(53, 9, 13, 30, 60, 47, 'pending', '2024-09-24 12:08:25', '2024-09-24 12:08:25'),
(54, 9, 13, 30, 61, 48, 'pending', '2024-09-24 12:23:23', '2024-09-24 12:23:23'),
(55, 9, 13, 30, 62, 49, 'pending', '2024-09-24 12:28:09', '2024-09-24 12:28:09'),
(56, 9, 13, 30, 63, 50, 'pending', '2024-09-24 12:43:01', '2024-09-24 12:43:01'),
(57, 9, 13, 30, 64, 51, 'pending', '2024-09-24 12:49:11', '2024-09-24 12:49:11'),
(58, 9, 13, 30, 65, 52, 'pending', '2024-09-24 12:53:56', '2024-09-24 12:53:56'),
(59, 9, 13, 30, 66, 53, 'pending', '2024-09-24 12:58:48', '2024-09-24 12:58:48'),
(60, 9, 13, 30, 67, 54, 'pending', '2024-09-24 13:04:04', '2024-09-24 13:04:04'),
(61, 5, 11, 11, 68, 55, 'pending', '2024-09-25 08:06:32', '2024-09-25 08:06:32'),
(62, 5, 11, 12, 69, 56, 'pending', '2024-09-25 08:21:56', '2024-09-25 08:21:56'),
(63, 6, 10, 19, 14, 57, 'pending', '2024-09-25 08:34:46', '2024-09-25 08:34:46'),
(64, 6, 10, 20, 16, 58, 'pending', '2024-09-25 08:37:17', '2024-09-25 08:37:17'),
(65, 5, 11, 13, 70, 59, 'pending', '2024-09-25 08:37:31', '2024-09-25 08:37:31'),
(66, 6, 10, 22, 21, 60, 'pending', '2024-09-25 08:38:50', '2024-09-25 08:38:50'),
(67, 5, 11, 13, 71, 61, 'pending', '2024-09-25 08:54:05', '2024-09-25 08:54:05'),
(68, 5, 11, 14, 72, 62, 'pending', '2024-09-25 09:03:10', '2024-09-25 09:03:10'),
(69, 5, 11, 15, 73, 63, 'pending', '2024-09-25 09:22:49', '2024-09-25 09:22:49'),
(70, 5, 11, 15, 102, 64, 'pending', '2024-09-25 10:14:34', '2024-09-25 10:14:34'),
(71, 5, 11, 16, 115, 65, 'pending', '2024-09-25 10:24:54', '2024-09-25 10:24:54'),
(72, 11, 16, 44, 74, 66, 'pending', '2024-09-25 10:29:19', '2024-09-25 10:29:19'),
(73, 5, 11, 16, 116, 67, 'pending', '2024-09-25 10:39:58', '2024-09-25 10:39:58'),
(74, 5, 11, 17, 117, 68, 'pending', '2024-09-25 10:48:19', '2024-09-25 10:48:19'),
(75, 5, 11, 16, 118, 69, 'pending', '2024-09-25 10:54:45', '2024-09-25 10:54:45'),
(76, 5, 11, 15, 119, 70, 'pending', '2024-09-25 11:10:38', '2024-09-25 11:10:38'),
(77, 11, 16, 44, 75, 71, 'pending', '2024-09-25 11:17:03', '2024-09-25 11:17:03'),
(78, 11, 16, 44, 76, 72, 'pending', '2024-09-25 11:33:05', '2024-09-25 11:33:05'),
(79, 11, 16, 44, 77, 73, 'pending', '2024-09-25 11:43:28', '2024-09-25 11:43:28'),
(80, 11, 16, 44, 78, 74, 'pending', '2024-09-25 11:54:51', '2024-09-25 11:54:51'),
(81, 5, 11, 14, 120, 75, 'pending', '2024-09-25 12:04:19', '2024-09-25 12:04:19'),
(82, 11, 16, 44, 79, 76, 'pending', '2024-09-25 12:05:31', '2024-09-25 12:05:31'),
(83, 11, 16, 44, 80, 77, 'pending', '2024-09-25 12:10:23', '2024-09-25 12:10:23'),
(84, 5, 11, 14, 121, 78, 'pending', '2024-09-25 12:12:38', '2024-09-25 12:12:38'),
(85, 5, 11, 13, 122, 79, 'pending', '2024-09-25 12:24:16', '2024-09-25 12:24:16'),
(86, 11, 16, 44, 81, 80, 'pending', '2024-09-25 12:28:29', '2024-09-25 12:28:29'),
(87, 5, 11, 12, 123, 81, 'pending', '2024-09-25 12:34:22', '2024-09-25 12:34:22'),
(88, 5, 11, 11, 124, 82, 'pending', '2024-09-25 12:41:44', '2024-09-25 12:41:44'),
(89, 11, 16, 44, 82, 83, 'pending', '2024-09-25 12:42:21', '2024-09-25 12:42:21'),
(90, 11, 16, 44, 83, 84, 'pending', '2024-09-25 12:58:21', '2024-09-25 12:58:21'),
(91, 5, 11, 11, 125, 85, 'pending', '2024-09-25 13:07:05', '2024-09-25 13:07:05'),
(92, 11, 16, 44, 84, 86, 'pending', '2024-09-25 13:07:34', '2024-09-25 13:07:34'),
(93, 11, 16, 44, 85, 87, 'pending', '2024-09-25 13:13:40', '2024-09-25 13:13:40'),
(94, 9, 13, 44, 126, 88, 'pending', '2024-09-25 13:20:12', '2024-09-25 13:20:12'),
(95, 11, 16, 44, 86, 89, 'pending', '2024-09-25 13:22:54', '2024-09-25 13:22:54'),
(96, 9, 13, 44, 127, 90, 'pending', '2024-09-25 13:25:49', '2024-09-25 13:25:49'),
(97, 9, 13, 44, 128, 91, 'pending', '2024-09-25 13:30:07', '2024-09-25 13:30:07'),
(98, 11, 16, 44, 87, 92, 'pending', '2024-09-25 13:35:19', '2024-09-25 13:35:19'),
(99, 11, 16, 44, 88, 93, 'pending', '2024-09-25 13:37:10', '2024-09-25 13:37:10'),
(100, 11, 16, 44, 89, 94, 'pending', '2024-09-25 13:38:46', '2024-09-25 13:38:46'),
(101, 11, 16, 44, 90, 95, 'pending', '2024-09-25 13:40:40', '2024-09-25 13:40:40'),
(102, 11, 16, 44, 91, 96, 'pending', '2024-09-25 13:41:57', '2024-09-25 13:41:57'),
(103, 11, 16, 44, 92, 97, 'pending', '2024-09-25 13:43:20', '2024-09-25 13:43:20'),
(104, 11, 16, 44, 93, 98, 'pending', '2024-09-25 13:44:31', '2024-09-25 13:44:31'),
(105, 11, 16, 44, 94, 99, 'pending', '2024-09-25 13:46:34', '2024-09-25 13:46:34'),
(106, 11, 16, 44, 95, 100, 'pending', '2024-09-25 13:49:00', '2024-09-25 13:49:00'),
(107, 11, 16, 44, 96, 101, 'pending', '2024-09-25 13:56:31', '2024-09-25 13:56:31'),
(108, 11, 16, 44, 97, 102, 'pending', '2024-09-25 14:00:01', '2024-09-25 14:00:01'),
(109, 11, 16, 44, 98, 103, 'pending', '2024-09-25 14:02:31', '2024-09-25 14:02:31'),
(110, 11, 16, 44, 99, 104, 'pending', '2024-09-25 14:05:42', '2024-09-25 14:05:42'),
(111, 11, 16, 44, 100, 105, 'pending', '2024-09-25 14:06:58', '2024-09-25 14:06:58'),
(112, 11, 16, 44, 101, 106, 'pending', '2024-09-25 14:08:49', '2024-09-25 14:08:49'),
(113, 11, 16, 44, 103, 107, 'pending', '2024-09-25 14:10:35', '2024-09-25 14:10:35'),
(114, 11, 16, 44, 104, 108, 'pending', '2024-09-25 14:11:45', '2024-09-25 14:11:45'),
(115, 11, 16, 44, 105, 109, 'pending', '2024-09-25 14:13:30', '2024-09-25 14:13:30'),
(116, 11, 16, 44, 106, 110, 'pending', '2024-09-25 14:15:46', '2024-09-25 14:15:46'),
(117, 11, 16, 44, 107, 111, 'pending', '2024-09-25 14:16:55', '2024-09-25 14:16:55'),
(118, 11, 16, 44, 108, 112, 'pending', '2024-09-25 14:19:34', '2024-09-25 14:19:34'),
(119, 11, 16, 44, 109, 113, 'pending', '2024-09-25 14:20:47', '2024-09-25 14:20:47'),
(120, 11, 16, 44, 110, 114, 'pending', '2024-09-25 14:22:24', '2024-09-25 14:22:24'),
(121, 11, 16, 44, 111, 115, 'pending', '2024-09-25 14:24:06', '2024-09-25 14:24:06'),
(122, 11, 16, 44, 112, 116, 'pending', '2024-09-25 14:25:41', '2024-09-25 14:25:41'),
(123, 11, 16, 45, 113, 117, 'pending', '2024-09-25 14:27:00', '2024-09-25 14:27:00'),
(124, 11, 16, 45, 114, 118, 'pending', '2024-09-25 14:28:39', '2024-09-25 14:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_name` varchar(255) NOT NULL,
  `building_type` enum('commercial','residential','teen-sheed','semi-paka','others') DEFAULT NULL,
  `total_floor` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `building_code` varchar(255) DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `security_guard_name` varchar(255) DEFAULT NULL,
  `guard_contact_number` varchar(255) DEFAULT NULL,
  `gate_open_time` time DEFAULT NULL,
  `gate_close_time` time DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `building_name`, `building_type`, `total_floor`, `address`, `building_code`, `location_id`, `employee_id`, `security_guard_name`, `guard_contact_number`, `gate_open_time`, `gate_close_time`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Khilbaritak', 'residential', 6, '1118/7,Khilbarirtek,Boroitola road,Vatara,Dhaka-1212', 'BL24-9930', 6, NULL, NULL, NULL, NULL, NULL, 1, '2024-09-17 02:37:54', '2024-09-17 02:37:54'),
(11, 'Philip P. Adhikary, House No-1273', 'residential', 7, 'RD # 4, BL # A, West Vatara, Dhaka-1212', 'BL24-2559', 5, 10, NULL, NULL, '06:00:00', '23:30:00', 1, '2024-09-17 06:05:38', '2024-09-22 13:10:53'),
(13, 'Grasp Super Market', 'commercial', NULL, 'Rd# 4, BL# A, Grasp Super Market,Vatara,Dhaka-1212', 'BL24-7768', 9, 11, NULL, NULL, '07:00:00', '23:00:00', 1, '2024-09-19 03:28:40', '2024-09-22 13:11:03'),
(14, 'Khilbaritak - School Building', 'commercial', 3, '1118/7,Khilbarirtek,Boroitola road,Vatara,Dhaka-1212', 'BL24-6688', 6, 10, NULL, NULL, NULL, NULL, 1, '2024-09-22 12:14:17', '2024-09-22 12:14:17'),
(15, 'Bashundhara', 'commercial', 9, 'H# 160, R# 08, B# F,Bashundhara R/A, Dhaka-1229', 'BL24-9568', 10, 11, NULL, NULL, NULL, NULL, 1, '2024-09-23 08:16:07', '2024-09-23 08:16:07'),
(16, 'Grasp Super Market, Notun Bazar', 'commercial', 2, 'Madani Avenue, Thana Road, Notun Bazar, Dhaka-1212', 'BL24-2361', 11, 11, NULL, NULL, NULL, NULL, 1, '2024-09-25 09:32:17', '2024-09-25 09:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:31:{i:0;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:10:\"view asset\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:3:{s:1:\"a\";i:13;s:1:\"b\";s:12:\"create asset\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"update asset\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:15;s:1:\"b\";s:12:\"delete asset\";s:1:\"c\";s:3:\"web\";}i:4;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"view booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:14:\"create booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:14:\"update booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:14:\"delete booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:15:\"view collection\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:17:\"create collection\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:17:\"update collection\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:17:\"delete collection\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:13:\"view employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:15:\"create employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:15:\"update employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:15:\"delete employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:10:\"view floor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:12:\"create floor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:12:\"update floor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:12:\"delete floor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:13:\"view location\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:15:\"create location\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:15:\"update location\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:15:\"delete location\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:13:\"view roomtype\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:15:\"create roomtype\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:15:\"update roomtype\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:15:\"delete roomtype\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:9:\"view user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:11:\"create user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:11:\"delete user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1727544796);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `checkout_date` date NOT NULL,
  `checkout_month` varchar(255) NOT NULL,
  `checkout_text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `collection_date` date NOT NULL,
  `collection_type` varchar(255) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `payable_amount` decimal(10,2) NOT NULL,
  `collection_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `building_id`, `asset_id`, `employee_id`, `collection_date`, `collection_type`, `month`, `from_date`, `to_date`, `duration`, `payable_amount`, `collection_amount`, `created_at`, `updated_at`) VALUES
(1, 11, 70, 10, '2024-09-26', '2', 'August', NULL, NULL, NULL, 12530.00, 12530.00, '2024-09-26 05:08:31', '2024-09-26 05:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_phone` varchar(255) NOT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `education_status` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) NOT NULL,
  `job_place_name` varchar(255) DEFAULT NULL,
  `job_place_address` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `nid_number` varchar(255) DEFAULT NULL,
  `nid_front` varchar(255) DEFAULT NULL,
  `nid_back` varchar(255) DEFAULT NULL,
  `other_document` varchar(255) DEFAULT NULL,
  `document_photo` varchar(255) DEFAULT NULL,
  `marriage_status` enum('Married','UnmarriedDivorced') DEFAULT NULL,
  `spouse_name` varchar(255) DEFAULT NULL,
  `spouse_phone` varchar(255) DEFAULT NULL,
  `spouse_nid` varchar(255) DEFAULT NULL,
  `s_nid_front` varchar(255) DEFAULT NULL,
  `s_nid_back` varchar(255) DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_relation` varchar(255) DEFAULT NULL,
  `emergency_contact_phone` varchar(255) DEFAULT NULL,
  `emergency_contact_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `client_name`, `client_phone`, `client_email`, `father_name`, `birthday`, `education_status`, `occupation`, `job_place_name`, `job_place_address`, `religion`, `blood_group`, `gender`, `present_address`, `permanent_address`, `nid_number`, `nid_front`, `nid_back`, `other_document`, `document_photo`, `marriage_status`, `spouse_name`, `spouse_phone`, `spouse_nid`, `s_nid_front`, `s_nid_back`, `emergency_contact_name`, `emergency_contact_relation`, `emergency_contact_phone`, `emergency_contact_address`, `created_at`, `updated_at`) VALUES
(2, 'Md. Zakir Hossain', '01714470918', NULL, 'Md.Abul Hossain', '2024-12-27', 'M.B.A', 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', NULL, 'Munsi Bari, olipur, Hajiganj, Chadpur', '8683083813', 'nid_front_1727248983.pdf', NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01718488588', NULL, '2024-09-21 13:15:46', '2024-09-26 10:52:33'),
(3, 'Mr Mozammel', '01777888384', NULL, 'A. Barek', '1986-05-07', NULL, 'Service Provider', NULL, NULL, 'Islam', NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Varata, Dhaka-1212', NULL, '9105196415', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 12:40:33', '2024-09-25 14:01:10'),
(4, 'Mr Lotifur Rahman', '0173380404', NULL, 'Joynal Biswas', '1978-11-09', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', NULL, '3702538137', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 12:43:38', '2024-09-25 14:01:29'),
(5, 'Ms Rupali Gain', '01611383517', NULL, 'Sunil Mridha', '1982-09-14', NULL, 'Job Holder', NULL, NULL, NULL, NULL, 'female', '1118/7 Khilbaritek, Baroitola road, Vatara, Dhaka-1212', 'Village: Talbari, Post Office: Jolirpara-7911, Musksudpur, Gopalgonj', '8665688878', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 12:48:16', '2024-09-25 14:03:15'),
(6, 'Ms Shefali Baroi', '01639660479', NULL, 'Bholanath Baroi', '1979-01-01', NULL, 'Service Provider', NULL, NULL, NULL, 'AB+', 'female', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', NULL, '7329846062', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:11:25', '2024-09-26 09:17:26'),
(7, 'Md Sadiqur Rahman', '01714914746', NULL, 'Md. Habibur Rahman', '1987-12-01', 'H.S.C', 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', '1118/7, Khilbaritek, Baroitola, Vatara, Dhaka-1212', 'Village: Chorhamua, Post office: Sughor, District: Habigonj, Sylhet', '4639252503', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:15:21', '2024-09-26 09:17:44'),
(8, 'Mutakabbir Hossain (Rafiq)', '01648387671', NULL, 'Alim Uddin', '1981-03-02', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', '1273,W#40,Vatara,Dhaka-1212', 'South Jhakalia,Jajalpur-2330, Kishorgang', '19814814538000009', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01777750955', NULL, '2024-09-22 13:19:10', '2024-09-24 13:19:46'),
(9, 'Mr Sukumar Rozario', '01712152225', NULL, 'Alfred Rozario', '1960-11-25', NULL, 'Job Holder', NULL, NULL, NULL, 'O+', 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', NULL, '2390215297', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:20:05', '2024-09-26 09:18:07'),
(10, 'Ms. Nargis Rahman Occur', '01631404109', NULL, 'Md. Solaiman Agrabadi', '1977-12-09', 'H.S.C', 'Job Holder', NULL, NULL, 'Islam', 'A+', 'female', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', 'Village: Moddhomrampur, Thana: Halishahar, District: Chittagong', '1901017788', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:25:48', '2024-09-26 09:18:22'),
(11, 'Mr Bilas Ratna', '01715869012', NULL, 'Bidhan Ratna', '1988-02-08', NULL, 'Job Holder', NULL, NULL, NULL, NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', 'Village: Kaligram, Post Office: Jolirpar, Muksudpur, Gopalgonj', '3265542930', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:30:09', '2024-09-26 09:18:40'),
(12, 'Md.Harunir Rashid', '01932010690', NULL, 'Md.Azgar', '1978-05-10', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'House No: 4/B, Lane: 3,Khilbarirtek,Vatara,Dhaka-1212', 'House No: 4/B, Lane: 3,Khilbarirtek,Vatara,Dhaka-1212', '7336446021', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01745821340', NULL, '2024-09-22 13:37:51', '2024-09-24 13:20:52'),
(13, 'Mr James Baray', '01672778533', NULL, 'Shochinto Nath Baray', '1986-12-12', NULL, 'Job Holder', NULL, NULL, NULL, 'O+', 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', 'Village: Gongga Nagar, Post Office: Newtown-1440, Sonargaon, Narayangonj', '6710469128072', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:38:45', '2024-09-26 09:19:09'),
(14, 'Md Humayyun Kabir', '01733380446', NULL, 'Md. Moslem Uddin', '1982-01-01', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', NULL, '8658920155', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:42:11', '2024-09-26 09:19:26'),
(15, 'Mr Albert Mondol Thomas', '01733380472', NULL, 'Rajel Mandal Johon', '1989-01-27', NULL, 'Job Holder', NULL, NULL, 'Christan', NULL, 'male', '1118/7, Khilbaritak, Baroitola road, Vatara, Dhaka-1212', 'Village: Bil Chanda, Post Office: Jalirpar 7911, Muksudpur, Gopalgonj', '8657202548', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:45:00', '2024-09-25 11:07:37'),
(16, 'Mr Haron Roy', '01729905233', NULL, 'Pranjuran Roy', '1986-08-13', NULL, 'Job Holder', NULL, NULL, 'Hiduism', NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', NULL, '5965551434', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:47:14', '2024-09-25 14:06:50'),
(17, 'Bijon Poddar', '01829994127', NULL, 'Monoj Poddar', '1982-11-03', NULL, 'Business', NULL, NULL, 'Hiduism', NULL, 'male', '53,W#40,Vatara,Dhaka-1212', 'House-53,RD-17,Banani,Gulshan,Dhaka-1213', '8245663995', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01727531128', NULL, '2024-09-22 13:50:26', '2024-09-25 13:14:01'),
(18, 'Md Rubel Hawlader', '01608383858', NULL, 'Md. Muslem Hawlader', '1993-05-06', NULL, 'Job Holder', NULL, NULL, NULL, NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', NULL, '8671571258', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:51:18', '2024-09-26 09:20:13'),
(19, 'Mr Shushanto Hazra', '01909036612', NULL, 'Saimon Hazra', '1998-02-25', NULL, 'Job Holder', NULL, NULL, 'Christan', NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', NULL, '6908019174', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:53:32', '2024-09-26 09:20:32'),
(20, 'Mst Eti Akter', '01953564475', NULL, 'Md. Chan Miah', '1992-08-03', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'female', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', 'Village: Bri- Kathalia, Post Office: Sohagi-2281,District: Mymensing', '5557921896', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:55:24', '2024-09-26 09:20:57'),
(21, 'Mr Abbas Akon', '01757773708', NULL, 'Arof Ali Akon', '1979-05-10', NULL, 'Job Holder', NULL, NULL, NULL, NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', 'House: Akon, Village: Dakkhin Sirkhara, Post Office: Bollbddi-7901, Madaripu Sadar, Madaripur', '2400316762', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 13:58:18', '2024-09-26 09:21:24'),
(22, 'Md Minto Mia', '01931798882', NULL, 'Md. Chan Miah', '1995-04-12', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', 'Village: Bri-kathaliya, Post Office: Sohagi-2281, District: Mymensing', '8702269716', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 14:00:27', '2024-09-26 09:26:09'),
(23, 'Mr Ekbal', '01785546949', NULL, 'Samsul Haque Hawladar', '1987-03-02', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', NULL, '19875418085000101', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-22 14:02:29', '2024-09-26 09:26:25'),
(24, 'Mr Kazi Abu Sayed', '01712531807', NULL, NULL, NULL, NULL, 'Business', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '3256303847', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-23 14:04:10', '2024-09-23 14:04:10'),
(25, 'Mr Kazi Abu Sayed', '01712531807', NULL, NULL, NULL, NULL, 'Business', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '3256303847', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-23 14:05:34', '2024-09-23 14:05:34'),
(26, 'Mohammad Rasel', '01756862421', NULL, NULL, NULL, NULL, 'Business', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '19819111734033600', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-23 14:08:07', '2024-09-23 14:08:07'),
(27, 'Mr M A Gani', '01716717324', NULL, NULL, NULL, NULL, 'Business', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '4795124457556', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-23 14:09:44', '2024-09-23 14:09:44'),
(28, 'Mr M A Gani', '01716717324', NULL, NULL, NULL, NULL, 'Business', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '4795124457556', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-23 14:11:05', '2024-09-23 14:11:05'),
(29, 'Md Mosarraf Hossain', '01727061001', NULL, NULL, NULL, NULL, 'Business', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '5526693741', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-23 14:12:44', '2024-09-23 14:12:44'),
(30, 'Md. Nazrul Islam', '01721676754', NULL, 'Md.Abul Khayer Sikdar', '1980-12-05', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', '1097,W#40,Vatara,Dhaka-1212', 'Diapur, Ghonapara, Kasiani, Gopalganj', '7781089771', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '017389514981', NULL, '01738951981', NULL, '2024-09-24 10:00:53', '2024-09-24 13:22:41'),
(31, 'Md.Abul Bashar', '01915206673', NULL, 'Zahura Munsi', '1984-12-21', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', '1273, W-40, Gulshan, Vatara,Dhaka-1212', 'Charpuruliamari, Shomvuganj, Mymansing', '1945173076', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01940453510', NULL, '2024-09-24 10:12:41', '2024-09-24 13:25:28'),
(32, 'Md.Donu Miah', '01773170006', NULL, 'Md.Muntaj Uddin', NULL, NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', '1273,W-40, Vatara,dhaka-1212', 'Bashhati, Kisharganj sadar, Kishorganj', '5424343106', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01608429691', NULL, '2024-09-24 10:19:01', '2024-09-24 13:26:15'),
(33, 'Mohammad Yousuf', '01922994614', NULL, 'Abdul Malek', '1987-08-05', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Noyanagar, gulshan,Vatara,Dhaka-1212', 'Noyanagar, gulshan,Vatara,Dhaka-1212', '91485663738', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01937959583', NULL, '2024-09-24 10:23:46', '2024-09-24 13:28:24'),
(34, 'Md.Abul Bashar', '01915206673', NULL, 'Zahura Munsi', '1984-12-21', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', 'H-67, Rd-11,B-E,,Banani,Gulshan.Dhaka', 'Chorpuliamari, Shamvuganj, Mymansing', '1945173076', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-24 10:29:06', '2024-09-24 10:31:15'),
(35, 'Mr Rakibul Hasan', '01734519882', NULL, NULL, NULL, NULL, 'Business', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '8240371917', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-24 10:30:48', '2024-09-24 10:30:48'),
(36, 'Dipon Barikdar', '01300245820', NULL, 'Birendranath Barikdar', '1974-11-07', NULL, 'Business', NULL, NULL, 'Christan', NULL, 'male', '1118/7, Rebecca Villa, Khilbarirtek,Badda,Dhaka', 'Dharabashail, Kandi-8110, Kotalipara, Gopalganj', '6864612475', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01615348255', NULL, '01615348255', NULL, '2024-09-24 10:34:11', '2024-09-24 13:29:55'),
(37, 'Nazma Begum', '01716528740', NULL, 'Md.Sattar Hawladar', '1978-11-10', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'female', 'H-12,Nayanagar,Vatara,Dhaka-1212', 'H-12,Nayanagar,Vatara,Dhaka-1212', '2845825914', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01716528740', NULL, '2024-09-24 10:42:22', '2024-09-24 13:33:49'),
(38, 'Md.Saiful Islam', '01675864964', NULL, 'Taidur Islam', '1988-01-01', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Khan A Khoda Road, Vatara,Dhaka-1212', 'Barur, Charbakar-3530, Debidar, Cumilla', '2379317502', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01630374531', NULL, '01630374531', NULL, '2024-09-24 10:48:23', '2024-09-24 13:34:36'),
(39, 'Jakir Hossain', '01611979725', NULL, 'Md. Karim Matubbar', '1980-07-06', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Fasertek, Gulshan, Vatara, dhaka-1212', 'Char Badarpasa, Raijar-7910, Madaripur', '5077098225', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01768246000', NULL, '2024-09-24 10:53:14', '2024-09-24 13:35:34'),
(40, 'Md. Shahidul Islam', '01985461280', NULL, 'Jaynal Uddin', '1980-05-10', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Tank Park Stuff Quarter, Rd-86, Gulshan-2,Dhaka', 'Jhikartola, Dopaura, Mymansing', '5095946934', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01710155667', NULL, '2024-09-24 10:57:58', '2024-09-24 13:37:42'),
(41, 'Humayan Kabir', '01925993657', NULL, 'Md. Abdul Hakim', '1975-07-30', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'H-28, W-40,Vatara,Dhaka-1212', 'H-330,Kazipara, maniktola, Jessore', '4124704040292', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01736807504', NULL, '2024-09-24 11:05:00', '2024-09-24 13:38:27'),
(42, 'Md. Saiful Islam', '01675864964', NULL, 'Taidul Islam', '1988-01-01', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Khan A Khoda Road, Vatara, Dhaka-1212', 'Barur, Charbakur, Debidar, Cumilla', '2379317502', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01630374531', NULL, '2024-09-24 11:13:27', '2024-09-24 13:39:27'),
(43, 'Md. Dulal', '01914898530', NULL, 'Abdur Rab', '1987-06-14', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'H-22,Badda,Gulshan,Dhaka', 'H-22,Badda,Gulshan,Dhaka', '2610403955556', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01842152382', NULL, '2024-09-24 11:20:10', '2024-09-24 13:40:02'),
(44, 'S.M.Moniruzzaman Monir', '01913760380', NULL, 'Mobarak Ali Shekh', '1975-02-15', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'H-18, Rd-3, East Nayanagar,Vatara,Gulshan,Dhaka', 'Ankutia, Madhappur,Chatmohor,Pabna', '3254332764', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01820556707', NULL, '2024-09-24 11:26:07', '2024-09-24 13:40:48'),
(45, 'Md. Abdul Mannan Patwary', '01912733359', NULL, 'Mamtaj Uddin Patwary', NULL, NULL, 'Business', NULL, NULL, NULL, NULL, 'male', 'H-CB,80/1, Kochukhet Old Bazar, Dhaka Cantonment-1206', 'Bareghuria, Paniowala Bazar, Ramganj, Lakkhipur', '2650874231663', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01912733359', NULL, '2024-09-24 11:34:49', '2024-09-24 13:59:45'),
(46, 'Md. Dulal', '01914898530', NULL, 'Abdur Rob', NULL, NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Oazuddin Rd,Beside Water Pump,W-40, Vatara', 'H-22, Badda, Gulshan,Dhaka', '2610403955556', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01842152382', NULL, '2024-09-24 12:02:13', '2024-09-24 14:00:45'),
(47, 'Basudev Malakar', '01929610980', NULL, 'Krisna Lal Malakar', '1970-02-10', NULL, 'Business', NULL, NULL, 'Hiduism', NULL, 'male', 'H-65,South Nayanagar,Vatara,Dhaka', 'Dhushar, Noyabari, Shibalay, Manikgang', '9101231844', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01922817412', NULL, '2024-09-24 12:08:25', '2024-09-24 12:10:49'),
(48, 'Md. Abdus Salam', '01721630496', NULL, 'Md.Oli Ullah', NULL, NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Solmaid, Company Bari,Gulshan, Badda, Dhaka', 'Solmaid, Company Bari,Gulshan, Badda, Dhaka', '2610457002055', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01922544239', NULL, '2024-09-24 12:23:23', '2024-09-24 12:25:08'),
(49, 'Ariful Islam', '01718596156', NULL, 'Mizanur Rahman', NULL, NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Sarkarbari, Solmaid, Vatara,Dhaka', 'Sastanipara, Rangamatia, Kaliganj, Gazipur', '3313417715359', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01771559364', NULL, '2024-09-24 12:28:09', '2024-09-24 12:30:54'),
(50, 'Md. Shahag Shodgur', '01913184352', NULL, 'Samsuddin Shodgur', NULL, NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Farida Member Bari, Water Pump Masjid Rod, Vatara,Dhaka', 'Banjanagar, Lhakkhipur', '5977935336', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01914235652', NULL, '2024-09-24 12:43:01', '2024-09-24 12:45:27'),
(51, 'Md. Riyazul Islam', '01736661913', NULL, 'Md. Kadam Ali', NULL, NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Owazuddin Road,  Vatara, Dhaka-1212', 'Uttarkarai, Chunakhali, Kakerganj, Barishal', '2610413035568', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01735444639', NULL, '2024-09-24 12:49:11', '2024-09-24 12:50:46'),
(52, 'Liton Babu', '01682747492', NULL, 'Sunil Babu', NULL, NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'West NurerChala, Vatara, Gulshan ,Dhaka-1212', 'South Jaynagar, Doulatkhan, Vola', '8700907598', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01631412155', NULL, '2024-09-24 12:53:56', '2024-09-24 12:56:14'),
(53, 'Uzzal Chandra Das', '01869137979', NULL, 'Gourango Chandra das', NULL, NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'North Vatara,Gulshan,Dhaka-1212', 'North Vatara,Gulshan,Dhaka-1212', '8250995431', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01869137979', NULL, '2024-09-24 12:58:48', '2024-09-24 13:01:38'),
(54, 'Gopal Chandra Pande', '01552385816', NULL, 'Notobar Pande', NULL, NULL, 'Business', NULL, NULL, 'Hiduism', NULL, 'male', 'H-2, B-A,Solmaid, Vatara, Dhaka-1212', 'H-2, B-A,Solmaid, Vatara, Dhaka-1212', '4154752317', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01869137979', NULL, '2024-09-24 13:04:04', '2024-09-24 13:05:27'),
(55, 'Pranto Coraiya', '019598000757', NULL, 'Nirmol Coraiya', '1994-05-17', NULL, 'Job Holder', NULL, NULL, 'Christan', NULL, 'male', NULL, 'Songrampur, Boraigram, Nator', '3748243908', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01632146959', NULL, '2024-09-25 08:06:32', '2024-09-25 08:08:49'),
(56, 'Md. Abul Bashar', '01915206673', NULL, 'Jahura Munsi', '1984-12-21', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', NULL, 'Chorpuliamari, Kotually, Mymansing', '2692619477465', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 08:21:56', '2024-09-25 08:28:54'),
(57, 'Mr Dulal Adhikary Niloy', '01688651638', NULL, 'Daniyel Adikary', '1987-11-15', NULL, 'Job Holder', NULL, NULL, 'Christan', NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', 'Village: Madhabpasha, Post Office: Madhabpasha-8213, Babugonj, Barisal', '0610367683174', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 08:34:46', '2024-09-26 09:26:55'),
(58, 'Mr Albert Surza Boiragi', '01676168364', NULL, 'Chunilal Boiragi', '1968-01-01', 'Class 10', 'Job Holder', NULL, NULL, 'Christan', 'A-', 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', 'Village: koligram, Thana: muksudpur, District: Gopalgonj', '2610457056543', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Mr. Nitto Adhikary', 'Brother (Cousin)', '01675574492', NULL, '2024-09-25 08:37:17', '2024-09-26 09:27:16'),
(59, 'Md.Alomgir Hossain', '01718434327', NULL, 'Md.Hajrat Ali', NULL, 'S.S.C', 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', NULL, 'Fotehpur, Bancharam, Brammanbaria', '4641840725', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01742505071', NULL, '2024-09-25 08:37:31', '2024-09-25 08:40:51'),
(60, 'Mr Shaaon Baroi', '01648880097', NULL, 'Porimol Baroi', '1995-04-04', NULL, 'Job Holder', NULL, NULL, NULL, NULL, 'male', '1118/7, Khilbaritek, Baroitola road, Vatara, Dhaka-1212', 'Village: Koligram, Post Office: Jolirpar-7911, Muksudpur, Gopalgonj', '1012961676', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 08:38:50', '2024-09-26 09:27:38'),
(61, 'Shilpy Barei', '01733218568', NULL, NULL, NULL, NULL, 'Job Holder', NULL, NULL, 'Christan', NULL, 'female', NULL, 'Kaligram, Muksudpur, Gopalganj', '7315670609', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01733218568', NULL, '2024-09-25 08:54:05', '2024-09-25 08:56:56'),
(62, 'Md.Monir Hossain', '01737253740', NULL, 'Md. Tofazzal Hossain', '1988-12-31', 'M.B.S', 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', NULL, NULL, '6418725989', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 09:03:10', '2024-09-25 09:04:25'),
(63, 'Proma Riberu', '01748489791', NULL, 'Apic Riberu', '2000-04-18', NULL, 'Job Holder', NULL, NULL, 'Christan', NULL, 'female', NULL, 'Joyramber, Rangamatia, Tumulia, Kaliganj,Gazipur', '20003313497048946', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 09:22:49', '2024-09-25 11:58:50'),
(64, 'Md. Intiaz Mia', '01719519921', NULL, NULL, '1982-06-17', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', NULL, 'H-1168,Nuerchala, Vatara, Gulshan,Dhaka', '2819863883', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 10:14:34', '2024-09-25 10:18:39'),
(65, 'Md. Aminur Rahman', '01707981979', NULL, 'Ekhlasur Rahman', '1975-08-04', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', NULL, 'H-38, 10,East Merul DIT Project, Gulshan,Dhaka', '3299566103', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 10:24:54', '2024-09-25 10:28:21'),
(66, 'Md Mahabub Alam', '01726175130', NULL, 'Md Abdul Hamid', '1982-01-15', 'B.A', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'House# 36, Block# D, Road# Nurarchala, Dhaka-1212', 'House# 36, Block# D, Road# Nurarchala, Dhaka-1212', '2830209777', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Dilara Parvin Osha', 'Wife', '01616175130', NULL, '2024-09-25 10:29:19', '2024-09-25 10:52:15'),
(67, 'Lablo Mia', '01714819257', NULL, 'Md. Saiful Islam', '1991-08-04', 'B.S.C', 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', NULL, 'Akuwa, South Chamuria, Kalihati, Tangail', '19919314794000233', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01614819258', NULL, '2024-09-25 10:39:58', '2024-09-25 10:43:15'),
(68, 'Sagar Boido Rinku', '01302310265', NULL, 'Kushol Boido', '1988-11-16', NULL, 'Job Holder', NULL, NULL, 'Christan', NULL, 'male', NULL, 'Kaligram, Muksodpur, Gopalganj', '1029126610', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 10:48:19', '2024-09-25 10:49:38'),
(69, 'Debashish Das', '01313408816', NULL, 'Monoranjan Das', '1981-12-01', NULL, 'Job Holder', NULL, NULL, 'Hiduism', NULL, 'male', NULL, 'Profulla Master Bari,Fazilpur, Feni Sadar, Feni', '9556685551', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 10:54:45', '2024-09-25 10:56:15'),
(70, 'Bidhan Bary', '01722721313', NULL, 'Anjan Bary', NULL, NULL, 'Job Holder', NULL, NULL, 'Christan', NULL, 'male', NULL, 'H-24, B-A, West Nurer Chala, Vatara,Dhaka', '8659772415', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 11:10:38', '2024-09-25 11:11:41'),
(71, 'Md Sharif Hossain', '01681002440', NULL, 'Md Motalab', '1992-01-01', 'BBA', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'House# Sabek Shohidulla Member, Road# West Nurar Chala, Dhaka-1212', 'Village# Kobi Rpusha, Post# Rupsha 3651 Faridgong Chadpur', '19921314571000034', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Thamina Akter Sathi', 'Wife', '01681002439', NULL, '2024-09-25 11:17:03', '2024-09-25 11:30:14'),
(72, 'Mr Nazrul Islam', '01721676754', NULL, 'Md. Abul Khair Sikdar', '1980-12-05', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'House: 1097, Ward : 40, Thana: Vatara, Dhaka', 'Vill: Dijashur, Thana: Kashiani, Post: J.Ghonapara ,Union: Puishur, Gopalgonj', '7781089771', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shirin Akter', 'Wife', '01738951981', NULL, '2024-09-25 11:33:05', '2024-09-26 08:33:52'),
(73, 'Md Abul Basar', '01915206673', NULL, 'Mr Johura Munchi', '1984-12-21', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', '1273, Ward# 40, Vatara, Dhaka-1212', 'House# 67, Road# 11, Block# E, Banani-1213, Gulshan Dhaka North city', '1945173076', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Fahima Akter Kolpona', 'Wife', '01940453510', NULL, '2024-09-25 11:43:28', '2024-09-25 11:52:46'),
(74, 'Md Donu Miah', '01773170006', NULL, 'Md Muntaz Uddin', '1977-02-10', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', '1273, Grasp Building, Road# 04, Vatara, Dhaka-1212', 'Vill : Bushhati, Post Office: Mathiya-2300, Kishoregong', '6424343108', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Runa Akter', 'Wife', '01751774517', NULL, '2024-09-25 11:54:51', '2024-09-25 12:01:17'),
(75, 'Prodip Mandal', '01722721313', NULL, 'Khepa Mandal', '1965-02-27', NULL, 'Job Holder', NULL, NULL, 'Hiduism', NULL, 'male', NULL, 'H-2, West Vatara, Gulshan, Dhaka-1212', '7351071241', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 12:04:19', '2024-09-25 12:05:25'),
(76, 'Mr Raju Ahmed', '01712158197', NULL, NULL, '2002-05-03', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', NULL, NULL, '9813698141', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 12:05:31', '2024-09-25 12:08:41'),
(77, 'Mr Jaynal Abedin', '01711148543', NULL, NULL, '1988-03-02', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'House: 2/53, Road: 05, Ward: 39, Vatara, Dhaka.', 'Vill: Shaheb Nagar, Post: Salimabad, Thana: Bandarampur, Brahmanbaria', '3299370902', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. Rowshan Akter', 'Wife', '01711148543', NULL, '2024-09-25 12:10:23', '2024-09-26 08:44:35'),
(78, 'Md. Monir Hossain', '01737253740', NULL, 'Md. Tofazzal Hossain', '1988-12-31', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', NULL, 'Charbilsha, Mirzapur, Tangail', '6418725989', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 12:12:38', '2024-09-25 12:13:57'),
(79, 'Haider Ali', '01722721313', NULL, 'Dabirul Islam', '1985-10-15', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', NULL, 'H-13, Rd-1, Mohakhali Wireless, Gulshan, Dhaka', '5995102315', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 12:24:16', '2024-09-25 12:25:36'),
(80, 'Md Shofikul Islam Voiya', '01815030734', NULL, 'Md Dulal Hossain Voiya', '1985-12-28', 'HSC', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Wousuddin Road, Panir pamp, Vatara, Dhaka-1212', 'House# Akus Bapari, Vill : Paharpur, Post : Pantibazar-3545, Comilla', '1918167672203', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Sultana Islam Poli', 'Wife', '01600298034', NULL, '2024-09-25 12:28:29', '2024-09-25 12:39:31'),
(81, 'Abu Jafor', '01722721313', NULL, 'Meswr Ahmed', '1996-03-01', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', NULL, 'East majidbariya, Mirjaganj, Patuakhali', '8696438491', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 12:34:22', '2024-09-25 12:35:26'),
(82, 'Md. Makhan Molla', '01886249575', NULL, 'Md. Moni Molla', '1983-08-15', NULL, 'Job Holder', NULL, NULL, 'Islam', NULL, 'male', NULL, 'Vobodia, Rajbaribari Sadar, Rajbari', '1902499134', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 12:41:44', '2024-09-25 12:45:18'),
(83, 'Md Mahabub Alam', '01972195455', NULL, 'Mr Sirajul Islam', '1980-11-30', 'HSC', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'House# 71, Road# 5, Marul Badda, Dhaka', 'House# Maifrush Para, Vill : Abdullahpur, Post : Abdullahpur-1520, Munshigong', '5517354576', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Farjana Yesmin', 'Wife', '01923762200', NULL, '2024-09-25 12:42:21', '2024-09-25 12:49:30'),
(84, 'Md Billal Hossain', '01915714612', NULL, 'Md Nasir Uddin', '1989-01-01', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'House# 28, Block# B, Road# Sukhai Soroni-2, Vatara Post Gulshan-1212', 'House# 28, Block# B, Road# Sukhai Soroni-2, Vatara Post Gulshan-1212', '3298433305', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Taniya Akter', 'Wife', '01316103983', NULL, '2024-09-25 12:58:21', '2024-09-25 13:04:29'),
(85, 'Ripon Mitra', '01715363820', NULL, 'Premananda Mitra', NULL, NULL, 'Job Holder', NULL, NULL, 'Hiduism', NULL, 'male', NULL, 'Chowrokhuli, Radhaganj, Kotalipara, Gopalganj', '3265389498', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 13:07:05', '2024-09-25 13:08:16'),
(86, 'Md Akhter Hossain', '01912343499', NULL, 'Md Mahabub Alam', '1985-06-05', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Khondoker Bari Mor, Ward# 40, Vatara, Dhaka-1212', 'Khondoker Bari Mor, Ward# 40, Vatara, Dhaka-1212', '1450533169', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Sohel', 'Brother', '01811951177', NULL, '2024-09-25 13:07:34', '2024-09-25 13:11:15'),
(87, 'Md Shofikul Islam Voiya', '01815030734', NULL, 'Md Dulal Hossain Voiya', '1985-12-28', 'HSC', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Wase Uddin Road, Panir Pamp Vatara, Dhaka', 'House# Akus bapari Bari, Vill : Pahirpur, Post : Pantibazar-3545, Comilla', '1918167672203', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Sultana Islam Poli', 'Wife', '01600298034', NULL, '2024-09-25 13:13:40', '2024-09-25 13:19:05'),
(88, 'Monowar Jahan Khan', '01736836825', NULL, 'Abdur Rouf Khan', '1973-01-01', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Khan A Khoda Road, W-40, Vatara,Dhaka-1212', 'Chackkallan, Narundi, Jamalpur Sadar, Jamalpur,Mymansing', '2840633032', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01717830657', NULL, '2024-09-25 13:20:12', '2024-09-25 13:22:52'),
(89, 'Md Habibur Rahman', '01718303619', NULL, 'Md. Ali Akbar', '1969-07-06', NULL, 'Business', NULL, NULL, 'Islam', 'B+', 'male', 'House:581, Road:09, Ward:40, Vatara, Dhaka', 'Village: Harang, Post Office: Chandina, Thana: Chandina, Comilla', '9555657957', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01712158197', NULL, '2024-09-25 13:22:54', '2024-09-26 09:25:45'),
(90, 'Khairul Bashar Habib', '01925441114', NULL, 'Ali Ahmed Sikder', '1981-01-15', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'H-1103, Khilbarirtek, Gulshan, Vatara,Dhaka-1212', 'H-1103, Khilbarirtek, Gulshan, Vatara,Dhaka-1212', '6424300389', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01925441115', NULL, '2024-09-25 13:25:49', '2024-09-25 13:27:24'),
(91, 'Md. Tuhin Hossain', '01719505609', NULL, 'Md. Abdul', '1989-10-05', NULL, 'Business', NULL, NULL, 'Hiduism', NULL, 'male', 'H-k/30, hazi Salimuddin Road, Kuril, Khilkhet-1230,Dhaka', 'Rayenda, Morolganj, Bagherhat', '2375249048', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01777750955', NULL, '2024-09-25 13:30:07', '2024-09-25 13:32:59'),
(92, 'Md Forhad Hossen', '01712483931', NULL, 'Md. Abul Kashem Hawladar', '1969-05-08', 'S.S.C', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'H#04, R#03, Vatara, Gulshan-1212', 'Vatara Mor, Member Sharak, Vatara', '9113859418', NULL, NULL, 'Passport', NULL, 'Married', 'Korona Akhter', '01729589944', NULL, NULL, NULL, 'Korona Akhter', 'Wife', '01729589944', NULL, '2024-09-25 13:35:19', '2024-09-25 13:43:28'),
(93, 'Md Khairul Basar Habib', '01925441114', NULL, 'Md. Ali Ahammad Sikder', '1981-01-15', NULL, 'Business', NULL, NULL, 'Islam', 'B+', 'male', 'H#1103, Khilbarirtek, Gulshan, Vatara', 'H#1103, Khilbarirtek, Gulshan, Vatara', '6424300389', NULL, NULL, 'Passport', NULL, 'Married', 'Bithi Akhter', '01925441115', NULL, NULL, NULL, 'Bithi Akhter', 'Wife', '01925441115', NULL, '2024-09-25 13:37:10', '2024-09-25 14:06:08'),
(94, 'Md Rasel Hossain', '01939136030', NULL, 'Md. Mohiuddin Sheikh', '1981-01-01', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'House: 28/4, Road: Harun Sharak, Block: 01, Notun Bazar.', 'Vill: Pingliya, Thana: Kashiani, Gopalgonj', '6869816220', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Nasima Akter', 'Wife', '01779909930', NULL, '2024-09-25 13:38:46', '2024-09-26 08:52:59'),
(95, 'Md Jamal Hossain', '01843456796', NULL, 'Md. Hossain', '1975-02-01', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Khilbaritek, Vatara, Gulshan-1212', 'Village: Okhara, Post Office: Somitir Haat, Thana: Fotikchari, Chittagong', '4624153652', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Mr. Jebol Hossain', 'Brother', '01858863284', NULL, '2024-09-25 13:40:40', '2024-09-25 13:48:11'),
(96, 'Md Jamal Hossain', '01843456796', NULL, 'Md. Hossain', '1975-02-01', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Khilbaritek, Vatara, Gulshan-1212', 'Village: Okhara Post Office: Samitir Haat, Thana: Fatikchari, Chittagong', '4624153652', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Mr. Jebol Hossain', 'Brother', '01858863284', NULL, '2024-09-25 13:41:57', '2024-09-25 13:50:58'),
(97, 'Md Mithu', '01916883355', NULL, 'Md. Ruhul Amin', '1987-03-02', 'S.S.C', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Nayanagar Uttar, Vatara, Gulshan-1212', 'Nayanagar Uttar, Vatara, Gulshan-1212', '9565463248', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md. Liton Shah', 'Brother', '01670914111', NULL, '2024-09-25 13:43:20', '2024-09-25 13:52:44'),
(98, 'Md Liton', '01731086730', NULL, 'Md. Abdul Rashid', '1973-01-01', 'Class 8', 'Business', NULL, NULL, 'Islam', 'B+', 'male', 'Khilbaritek, Vatara, Gulshan-1212', 'Khilbaritek, Vatara, Gulshan-1212', '8201754002', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md. Fahim', 'Brother', '01867816897', NULL, '2024-09-25 13:44:31', '2024-09-25 13:54:41'),
(99, 'Ms Jsohana', '01818780831', NULL, 'Nadu Miah Sukani', '1981-12-13', NULL, 'Business', NULL, NULL, 'Islam', 'O+', 'female', 'H#221, Solmaid, Gulshan, Vatara', 'H#221, Solmaid, Gulshan, Vatara', '2834904761', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md. Selim Uddin', 'Brother', '01955223901', NULL, '2024-09-25 13:46:34', '2024-09-25 14:02:26'),
(100, 'Md Samiul Hasan', '01940563776', NULL, 'Md. Sikander Bepari', '1991-05-05', 'S.S.C', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'KhondokerBarir Mor, Ward:40, Vatara, Gulshan-1212', 'Village:Ekandol, Post Office: Jopsha, Thana: Noria, Shariatpur', '8697906579', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md. Abu Bakkar', 'Brother', '01917597906', NULL, '2024-09-25 13:49:00', '2024-09-25 13:58:19'),
(101, 'Md Abdus Samad', '01611152254', NULL, NULL, NULL, NULL, 'Business', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '4150817247', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 13:56:31', '2024-09-25 13:56:31'),
(102, 'Md Mashud', '01632376667', NULL, 'A. Matin', '1980-12-31', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Ka 188/5, Aamtala, Khilkhet, Dhaka', 'Pradhania Bari, Village: Mukundhshar, Post Office: Menapur, Chandpur', '1502763210', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md Mashud', NULL, '01632376667', NULL, '2024-09-25 14:00:01', '2024-09-26 08:57:07'),
(103, 'Md Faruk Hossain', '01745159462', NULL, 'Md. Rahmatulllah', '1974-01-30', 'Class 8', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Khibarirtek, Vatara, Gulshan-1212', 'Village: Barai, Post Office: Selimgonj, Thana: Nabinagar, Brahmanbaria', '19742610457000000', NULL, NULL, 'Passport', NULL, 'Married', 'Parul Begum', '01705038350', NULL, NULL, NULL, 'Parul Begum', '01705038350', NULL, NULL, '2024-09-25 14:02:31', '2024-09-25 14:13:53'),
(104, 'Md Dulal Miah', '01745756767', NULL, 'Md. Rahmatulllah Miah', '1977-10-08', 'Class 7', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Dakkhin Nayanagar, Ward:40, Vatara, Dhaka-1212', 'Village: Barail, Dhakkhin Para, Post Office: Selimgonj, Nabinagar, Brahmanbaria', '1218575055599', NULL, NULL, 'Passport', NULL, 'Married', 'Shirin Akter', '01302082280', NULL, NULL, NULL, 'Shirin Akter', 'Wife', '01302082280', NULL, '2024-09-25 14:05:42', '2024-09-25 14:17:26'),
(105, 'Md Kamal Hossain', '01853670653', NULL, 'Md. Mawla Box Dewan', '1977-10-14', 'H.S.C', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Dakkhin Nayanagar, Notun Bazar, Vatara-1212', 'Dewan Bari, Village:Chroltorodi, Post Office: Pachani-3641, Matlab, Uttar Chandpur', '1317923365309', NULL, NULL, 'Passport', NULL, 'Married', 'Mahfuja Begum', '01814910257', NULL, NULL, NULL, 'MahMahfuja Begum', 'Wife', NULL, NULL, '2024-09-25 14:06:58', '2024-09-25 14:22:19'),
(106, 'Md Shamim', '01630901295', NULL, 'Md. Abul Hossain', '1987-02-05', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Pathani Para, Village:Berain, Post Office: Boro Beraid, Dhaka-1212', 'Pathani Para, Village:Berain, Post Office: Boro Beraid, Dhaka-1212', '2610419075761', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md. Jamal Hossain', 'Brother', '01747008671', NULL, '2024-09-25 14:08:49', '2024-09-25 14:24:43'),
(107, 'Md Mosharaf Hossain', '01873048818', NULL, NULL, NULL, NULL, 'Business', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '6463275526', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 14:10:35', '2024-09-25 14:10:35'),
(108, 'Md Boker Bapari', '01917597906', NULL, 'Md. Sikendar Bepari', '1983-05-15', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Khandakar Barir Mor, Ward: 40, Vatara, Dhaka.', 'Vill: Ekandol Karigor Kandi, 17 no Elandol, Post: Jopsha-8021, Noria, Shariatpur', '3713941833', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Abu Hosain', 'Brother', '01833043811', NULL, '2024-09-25 14:11:45', '2024-09-26 09:16:12'),
(109, 'Ms Jsohana', '01818780831', NULL, 'Nadu Miah Shukani', '1981-12-13', NULL, 'Business', NULL, NULL, 'Islam', 'O+', 'male', 'House: 221, Solmaid, Gulshan, Vatara, Dhaka.', 'House: 221, Solmaid, Gulshan, Vatara, Dhaka.', '2834904761', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md. Selim Uddin', 'Brother', '01955223901', NULL, '2024-09-25 14:13:30', '2024-09-26 09:12:26'),
(110, 'Md Saikat Alom Santo', '01813117385', NULL, 'Md. Moslem Prodhan', '1998-03-02', NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Wazuddin Road, Ward- 40, Vatara.', 'Vill: Sadullahpur, Post: Beltoli Bazar-3643, Matlab, Chandpur.', '51049141132', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Md. Shawon', 'Brother', '01617176559', NULL, '2024-09-25 14:15:46', '2024-09-26 09:02:25'),
(111, 'Md Oli Ullah', '01631927098', NULL, 'Md. Rafiqul Islam', '1998-05-02', 'Class 8', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Kolotan School Road, Nurer Chala, Vatara, Dhaka.', 'House: Shaheb Bari, Vill: Doulatpur, Post: Doulatpur-3541, Homna, Comilla.', '6005389041', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md. Iqbal Hossain', 'Brother', '01633613352', NULL, '2024-09-25 14:16:55', '2024-09-26 08:08:09'),
(112, 'Md Ali', '01727750755', NULL, 'Md. Abdul Qader', '1966-10-12', 'S.S.C', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'House: 16, Block : A, Road: Nurer chala moshjid road, Post: Gulshan, Vatara.', 'House: 16, Block : A, Road: Nurer chala moshjid road, Post: Gulshan, Vatara.', '5524036224', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md. Jubair Miah', 'Son', '01988681967', NULL, '2024-09-25 14:19:34', '2024-09-26 08:15:31'),
(113, 'Md Qader Alom', '01710735623', NULL, 'Md. Abu Taher', NULL, NULL, 'Business', NULL, NULL, 'Islam', NULL, 'male', NULL, 'Vill: Chariani, Thana: Hazi, Chandpur', '4618967337', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 14:20:47', '2024-09-26 09:06:29'),
(114, 'Md Shahin', '01857766436', NULL, 'Md. Abul Bashar', '1991-12-05', 'S.S.C', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'House: 705, Road: 03, Naya Nagor, Post: Gulshan, Badda.', 'Vill: Shariatpur, Post: Banglabazar, Thana: Goshai Haat, Shariatpur.', '5968247030', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md. Yuvraj', 'Brother', '01928970334', NULL, '2024-09-25 14:22:24', '2024-09-26 08:20:01'),
(115, 'Md Ruhul Amin Osman Goni', '01781415904', NULL, 'Hekim Mojibol Haque', '1965-10-11', 'Class 5', 'Business', NULL, NULL, 'Islam', 'O+', 'male', 'Solmaid, Tekbari, Post: Gulshan, Badda.', 'Solmaid, Tekbari, Post: Gulshan, Badda.', '6425710800', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md. Mithu', 'Son', '01916883355', NULL, '2024-09-25 14:24:06', '2024-09-26 08:28:43'),
(116, 'Md Arafat', '01730650319', NULL, 'Md. Kanchan Miah', '1998-03-20', NULL, 'Business', NULL, NULL, 'Islam', 'A+', 'male', 'Amir Hamza, Vatara, Dhaka.', 'Vill: Shawdagar Sharak, Post: Lalmohan, Thana: Lalmohan, Bhola.', '2857328302', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Md. Miraz', 'Brother', '01787144675', NULL, '2024-09-25 14:25:41', '2024-09-26 09:09:27'),
(117, 'Md Rashel', '01914734152', NULL, NULL, NULL, NULL, 'Business', NULL, NULL, NULL, NULL, 'male', NULL, NULL, '1912763917449', NULL, NULL, 'Passport', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-25 14:27:00', '2024-09-25 14:27:00'),
(118, 'Md Selim Uddin', '01955223901', NULL, 'Md. Sirajul Islam', '1984-01-12', 'B.com', 'Business', NULL, NULL, 'Islam', NULL, 'male', 'Dag- 2684, Purbo Vatara, Sayednagar, Vatara, Dhaka.', 'Vill: West Demsha, Post: Shatkania, Chittagong.', '2610457996038', NULL, NULL, 'Passport', NULL, 'Married', NULL, NULL, NULL, NULL, NULL, 'Md.Habibur Rahman', 'Brother', '01999997076', NULL, '2024-09-25 14:28:39', '2024-09-26 08:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `customer_extras`
--

CREATE TABLE `customer_extras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `members` varchar(255) DEFAULT NULL,
  `home_maid` enum('Yes','No') DEFAULT NULL,
  `home_maid_name` varchar(255) DEFAULT NULL,
  `home_maid_phone` varchar(255) DEFAULT NULL,
  `home_maid_address` text DEFAULT NULL,
  `home_maid_nid` varchar(255) DEFAULT NULL,
  `home_maid_nidfront` varchar(255) DEFAULT NULL,
  `home_maid_nidback` varchar(255) DEFAULT NULL,
  `driver` enum('Yes','No') DEFAULT NULL,
  `driver_name` varchar(255) DEFAULT NULL,
  `driver_phone` varchar(255) DEFAULT NULL,
  `driver_address` text DEFAULT NULL,
  `driver_nid` varchar(255) DEFAULT NULL,
  `driver_nidfront` varchar(255) DEFAULT NULL,
  `driver_nidback` varchar(255) DEFAULT NULL,
  `previous_householder_name` varchar(255) DEFAULT NULL,
  `previous_householder_phone` varchar(255) DEFAULT NULL,
  `previous_house_address` text DEFAULT NULL,
  `left_reason` varchar(255) DEFAULT NULL,
  `actual_rent` varchar(255) DEFAULT NULL,
  `advance_amount_type` enum('Yes','No') DEFAULT NULL,
  `advance_amount` varchar(255) DEFAULT NULL,
  `adjustable_amout_type` enum('Yes','No') DEFAULT NULL,
  `adjustable_amount` varchar(255) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `collection_last_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_extras`
--

INSERT INTO `customer_extras` (`id`, `customer_id`, `members`, `home_maid`, `home_maid_name`, `home_maid_phone`, `home_maid_address`, `home_maid_nid`, `home_maid_nidfront`, `home_maid_nidback`, `driver`, `driver_name`, `driver_phone`, `driver_address`, `driver_nid`, `driver_nidfront`, `driver_nidback`, `previous_householder_name`, `previous_householder_phone`, `previous_house_address`, `left_reason`, `actual_rent`, `advance_amount_type`, `advance_amount`, `adjustable_amout_type`, `adjustable_amount`, `collection_date`, `collection_last_date`, `created_at`, `updated_at`) VALUES
(2, 2, '2', 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12030', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-21 13:20:31', '2024-09-21 13:20:31'),
(3, 8, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5500', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-22 13:22:37', '2024-09-22 13:22:37'),
(4, 12, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4400', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-22 13:41:50', '2024-09-22 13:41:50'),
(5, 17, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4700', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-22 13:53:32', '2024-09-22 13:53:32'),
(6, 30, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1650', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 10:03:36', '2024-09-24 10:03:36'),
(7, 31, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 10:14:03', '2024-09-24 10:14:03'),
(8, 32, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6600', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 10:20:40', '2024-09-24 10:20:40'),
(9, 33, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 10:26:03', '2024-09-24 10:26:03'),
(10, 34, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14000', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 10:31:26', '2024-09-24 10:31:26'),
(11, 36, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3600', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 10:37:51', '2024-09-24 10:37:51'),
(12, 37, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8800', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 10:44:09', '2024-09-24 10:44:09'),
(13, 38, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3600', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 10:50:41', '2024-09-24 10:50:41'),
(14, 39, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7000', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 10:55:50', '2024-09-24 10:55:50'),
(15, 40, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5000', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 10:59:24', '2024-09-24 10:59:24'),
(16, 41, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5500', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 11:10:58', '2024-09-24 11:10:58'),
(17, 42, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3600', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 11:16:04', '2024-09-24 11:16:04'),
(18, 43, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3600', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 11:23:00', '2024-09-24 11:23:00'),
(19, 44, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3600', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 11:31:29', '2024-09-24 11:31:29'),
(20, 45, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7500', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 11:38:23', '2024-09-24 11:38:23'),
(21, 46, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 12:04:20', '2024-09-24 12:04:20'),
(22, 47, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22600', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 12:10:57', '2024-09-24 12:10:57'),
(23, 48, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '48600', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 12:25:29', '2024-09-24 12:25:29'),
(24, 49, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8000', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 12:31:10', '2024-09-24 12:31:10'),
(25, 50, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5100', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 12:45:35', '2024-09-24 12:45:35'),
(26, 51, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3000', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 12:50:58', '2024-09-24 12:50:58'),
(27, 52, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4500', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 12:56:24', '2024-09-24 12:56:24'),
(28, 53, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4500', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 13:01:48', '2024-09-24 13:01:48'),
(29, 54, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3700', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-24 13:05:34', '2024-09-24 13:05:34'),
(30, 55, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10030', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 08:13:54', '2024-09-25 08:32:48'),
(31, 56, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15630', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 08:30:08', '2024-09-25 08:30:08'),
(32, 59, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12530', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 08:42:42', '2024-09-25 08:42:42'),
(33, 61, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12130', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 08:59:13', '2024-09-25 08:59:13'),
(34, 62, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12030', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 09:04:55', '2024-09-25 09:04:55'),
(35, 63, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11530', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 09:25:47', '2024-09-25 09:25:47'),
(36, 3, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 09:30:37', '2024-09-25 09:30:37'),
(37, 4, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 09:33:45', '2024-09-25 09:33:45'),
(38, 5, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 09:37:51', '2024-09-25 09:37:51'),
(39, 6, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 09:41:39', '2024-09-25 09:41:39'),
(40, 7, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 09:48:03', '2024-09-25 09:48:03'),
(41, 9, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 09:51:17', '2024-09-25 09:51:17'),
(42, 10, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:02:33', '2024-09-25 10:02:33'),
(43, 11, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:04:45', '2024-09-25 10:04:45'),
(44, 13, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:06:47', '2024-09-25 10:06:47'),
(45, 14, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:10:15', '2024-09-25 10:10:15'),
(46, 15, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:15:34', '2024-09-25 10:15:34'),
(47, 16, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:17:30', '2024-09-25 10:17:30'),
(48, 18, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:19:43', '2024-09-25 10:19:43'),
(49, 64, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15630', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:19:45', '2024-09-25 10:19:45'),
(50, 19, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:21:36', '2024-09-25 10:21:36'),
(51, 20, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:23:21', '2024-09-25 10:23:21'),
(52, 65, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:27:07', '2024-09-25 10:27:07'),
(53, 21, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:29:29', '2024-09-25 10:29:29'),
(54, 22, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:32:50', '2024-09-25 10:32:50'),
(55, 23, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:34:23', '2024-09-25 10:34:23'),
(56, 57, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:37:39', '2024-09-25 10:37:39'),
(57, 66, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:41:58', '2024-09-25 10:41:58'),
(58, 67, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14430', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:44:00', '2024-09-25 10:44:00'),
(59, 58, NULL, 'Yes', 'Gita', '01682774753', NULL, '2610457056541', NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'Shirin', '01916045878', 'Khilbaritak, Baroitola road', NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:46:17', '2024-09-25 10:46:17'),
(60, 68, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10030', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:50:17', '2024-09-25 10:50:17'),
(61, 60, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:51:03', '2024-09-25 10:51:03'),
(62, 69, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11030', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 10:56:31', '2024-09-25 10:56:31'),
(63, 70, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13130', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 11:11:56', '2024-09-25 11:11:56'),
(64, 71, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 11:30:26', '2024-09-25 11:30:26'),
(65, 72, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 11:34:20', '2024-09-25 11:34:20'),
(66, 73, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 11:52:51', '2024-09-25 11:52:51'),
(67, 74, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 12:01:21', '2024-09-25 12:01:21'),
(68, 75, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15630', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 12:05:44', '2024-09-25 12:05:44'),
(69, 76, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 12:08:47', '2024-09-25 12:08:47'),
(70, 77, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 12:11:08', '2024-09-25 12:11:08'),
(71, 78, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12030', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 12:15:17', '2024-09-25 12:15:17'),
(72, 79, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15830', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 12:25:52', '2024-09-25 12:25:52'),
(73, 81, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13130', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 12:35:43', '2024-09-25 12:35:43'),
(74, 80, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 12:39:54', '2024-09-25 12:39:54'),
(75, 82, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7000', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 12:47:58', '2024-09-25 12:47:58'),
(76, 83, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 12:49:32', '2024-09-25 12:49:32'),
(77, 84, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:04:36', '2024-09-25 13:04:36'),
(78, 85, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11030', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:09:47', '2024-09-25 13:09:47'),
(79, 86, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:11:38', '2024-09-25 13:11:38'),
(80, 87, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:19:10', '2024-09-25 13:19:10'),
(81, 88, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9350', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:23:04', '2024-09-25 13:23:04'),
(82, 90, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11300', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:27:36', '2024-09-25 13:27:36'),
(83, 89, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:30:18', '2024-09-25 13:30:18'),
(84, 91, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3300', 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:33:14', '2024-09-25 13:33:14'),
(85, 92, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:43:44', '2024-09-25 13:43:44'),
(86, 95, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:48:23', '2024-09-25 13:48:23'),
(87, 96, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:51:02', '2024-09-25 13:51:02'),
(88, 97, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:52:47', '2024-09-25 13:52:47'),
(89, 93, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:53:24', '2024-09-25 13:53:24'),
(90, 98, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:54:44', '2024-09-25 13:54:44'),
(91, 100, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 13:58:21', '2024-09-25 13:58:21'),
(92, 99, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 14:00:55', '2024-09-25 14:00:55'),
(93, 102, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 14:11:00', '2024-09-25 14:11:00'),
(94, 103, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 14:13:56', '2024-09-25 14:13:56'),
(95, 104, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 14:17:29', '2024-09-25 14:17:29'),
(96, 105, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 14:22:22', '2024-09-25 14:22:22'),
(97, 106, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-25 14:24:46', '2024-09-25 14:24:46'),
(98, 111, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-26 08:08:13', '2024-09-26 08:08:13'),
(99, 112, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-26 08:15:32', '2024-09-26 08:15:32'),
(100, 114, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-26 08:20:12', '2024-09-26 08:20:12'),
(101, 118, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-26 08:25:40', '2024-09-26 08:25:40'),
(102, 115, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-26 08:28:18', '2024-09-26 08:28:18'),
(103, 94, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-26 08:53:01', '2024-09-26 08:53:01'),
(104, 110, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-26 09:02:27', '2024-09-26 09:02:27'),
(105, 113, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-26 09:06:32', '2024-09-26 09:06:32'),
(106, 116, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-26 09:09:30', '2024-09-26 09:09:30'),
(107, 109, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-26 09:12:30', '2024-09-26 09:12:30'),
(108, 108, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, 'No', NULL, NULL, NULL, '2024-09-26 09:16:14', '2024-09-26 09:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `designation_short_name` varchar(255) DEFAULT NULL,
  `designation_code` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `designation_short_name`, `designation_code`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Manager', 'MAN', 'DGN-247588', 1, '2024-08-29 11:20:39', '2024-08-29 11:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alternative_phone` varchar(255) DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `nid_number` varchar(255) DEFAULT NULL,
  `nid_front` varchar(255) DEFAULT NULL,
  `nid_back` varchar(255) DEFAULT NULL,
  `other_documents_type` varchar(255) DEFAULT NULL,
  `documents_photo` varchar(255) DEFAULT NULL,
  `designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `passport_photo` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_code`, `name`, `email`, `phone`, `alternative_phone`, `present_address`, `permanent_address`, `nid_number`, `nid_front`, `nid_back`, `other_documents_type`, `documents_photo`, `designation_id`, `date_of_joining`, `passport_photo`, `signature`, `status`, `created_at`, `updated_at`) VALUES
(10, 'EMP-243239', 'Sumon Mollah', NULL, '+880 0173321852', NULL, NULL, NULL, NULL, NULL, NULL, 'Passport', NULL, 2, NULL, NULL, NULL, '1', '2024-09-21 13:03:56', '2024-09-21 13:03:56'),
(11, 'EMP-247468', 'James Sumon Haldar', NULL, '+880 0173321854', NULL, NULL, NULL, NULL, NULL, NULL, 'Passport', NULL, 2, NULL, NULL, NULL, '1', '2024-09-22 07:30:59', '2024-09-22 07:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_member`
--

CREATE TABLE `family_member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_extra_id` bigint(20) UNSIGNED NOT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `member_gender` varchar(255) DEFAULT NULL,
  `member_relation` varchar(255) DEFAULT NULL,
  `member_phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_member`
--

INSERT INTO `family_member` (`id`, `customer_extra_id`, `member_name`, `member_gender`, `member_relation`, `member_phone`, `created_at`, `updated_at`) VALUES
(3, 2, 'Rojina Akter', 'Female', NULL, '01714470918', NULL, NULL),
(4, 2, 'Zafrin Zannat', 'Female', NULL, NULL, NULL, NULL),
(11, 30, 'Linda', 'Female', NULL, '01997103512', NULL, NULL),
(12, 30, 'Maya', 'Female', NULL, NULL, NULL, NULL),
(13, 32, 'Rahima Begum', 'Female', NULL, '01742505071', NULL, NULL),
(14, 32, 'Sakib Al Hasan', 'Male', NULL, NULL, NULL, NULL),
(15, 33, 'Donald Talukdar', 'Male', NULL, '01712579091', NULL, NULL),
(16, 33, 'Othoi Talukdar', NULL, NULL, NULL, NULL, NULL),
(17, 35, 'Amena begum', 'Female', NULL, NULL, NULL, NULL),
(18, 49, 'Jony Begum', 'Female', NULL, NULL, NULL, NULL),
(19, 49, 'Talha', 'Male', NULL, NULL, NULL, NULL),
(20, 49, 'Iti', 'Female', NULL, NULL, NULL, NULL),
(21, 58, 'Jesmin', 'Female', NULL, NULL, NULL, NULL),
(22, 58, 'Tania', 'Female', NULL, NULL, NULL, NULL),
(23, 60, 'Sukhi Boido', NULL, NULL, NULL, NULL, NULL),
(24, 60, 'Sourov Boido', NULL, NULL, NULL, NULL, NULL),
(25, 78, 'Lipi Mitra', 'Female', NULL, '01818680527', NULL, NULL),
(26, 78, 'Jhan Piyas Mitra', 'Male', NULL, NULL, NULL, NULL),
(27, 78, 'James Panth Mitra', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `floor_name` varchar(255) NOT NULL,
  `floor_size` varchar(255) DEFAULT NULL,
  `total_unit` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `floor_name`, `floor_size`, `total_unit`, `status`, `created_at`, `updated_at`) VALUES
(11, '1st Floor', NULL, 4, 1, '2024-09-21 13:04:49', '2024-09-22 13:12:03'),
(12, '2nd Floor', NULL, 3, 1, '2024-09-21 13:05:02', '2024-09-22 13:12:36'),
(13, '3rd Floor', NULL, 3, 1, '2024-09-21 13:05:12', '2024-09-22 13:12:43'),
(14, '4th Floor', NULL, 3, 1, '2024-09-21 13:05:21', '2024-09-22 13:13:02'),
(15, '5th Floor', NULL, 3, 1, '2024-09-21 13:05:30', '2024-09-22 13:12:54'),
(16, '6th Floor', NULL, 3, 1, '2024-09-21 13:05:37', '2024-09-22 13:13:10'),
(17, '7th Floor', NULL, 2, 1, '2024-09-21 13:07:08', '2024-09-22 13:12:24'),
(18, '1st Floor', NULL, 3, 1, '2024-09-22 09:02:53', '2024-09-22 09:02:53'),
(19, '2nd Floor', NULL, 2, 1, '2024-09-22 09:03:20', '2024-09-22 09:03:20'),
(20, '3rd Floor', NULL, 2, 1, '2024-09-22 09:03:51', '2024-09-22 09:03:51'),
(21, '4th Floor', NULL, 2, 1, '2024-09-22 09:04:14', '2024-09-22 09:04:14'),
(22, '5th Floor', NULL, 2, 1, '2024-09-22 09:05:00', '2024-09-22 09:05:00'),
(23, '6th Floor', NULL, 2, 1, '2024-09-22 09:05:18', '2024-09-22 09:05:18'),
(24, '7th Floor', NULL, 2, 1, '2024-09-22 09:05:34', '2024-09-22 09:05:34'),
(25, '1st Floor', NULL, 2, 1, '2024-09-22 12:17:59', '2024-09-22 12:17:59'),
(26, '1st Floor', NULL, NULL, 1, '2024-09-22 13:27:18', '2024-09-22 13:27:18'),
(27, '8th Floor', NULL, 1, 1, '2024-09-23 08:17:30', '2024-09-23 08:17:30'),
(28, '9th Floor', NULL, 1, 1, '2024-09-23 08:17:42', '2024-09-23 08:17:42'),
(29, '3rd', NULL, NULL, 1, '2024-09-23 13:28:38', '2024-09-23 13:28:38'),
(30, '1st', NULL, NULL, 1, '2024-09-23 13:28:56', '2024-09-23 13:28:56'),
(31, '2nd', NULL, NULL, 1, '2024-09-23 13:29:11', '2024-09-23 13:29:11'),
(32, '4th', NULL, NULL, 1, '2024-09-23 13:29:25', '2024-09-23 13:29:25'),
(33, '5th', NULL, NULL, 1, '2024-09-23 13:29:36', '2024-09-23 13:29:36'),
(34, '6th', NULL, NULL, 1, '2024-09-23 13:29:47', '2024-09-23 13:29:47'),
(35, '7th', NULL, NULL, 1, '2024-09-23 13:29:57', '2024-09-23 13:29:57'),
(36, '8th', NULL, NULL, 1, '2024-09-23 13:57:40', '2024-09-23 13:57:40'),
(37, '9th', NULL, NULL, 1, '2024-09-23 13:57:45', '2024-09-23 13:57:45'),
(44, '1st Floor', NULL, NULL, 1, '2024-09-25 09:27:51', '2024-09-25 09:27:51'),
(45, '2nd Floor', NULL, NULL, 1, '2024-09-25 09:27:54', '2024-09-25 09:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location_code` varchar(255) NOT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `google_map_link` longtext DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `location_code`, `zip_code`, `google_map_link`, `picture`, `status`, `created_at`, `updated_at`) VALUES
(5, '1273, West vatara, Dhaka -1212', '12-4810', '1212', 'https://www.google.com/maps/place/1273,+4+Vatara+Rd,+Dhaka+1212/@23.7994183,90.429507,17z/data=!3m1!4b1!4m5!3m4!1s0x3755c7b79d74a15b:0xebff67c20b39a58!8m2!3d23.7994183!4d90.429507?entry=ttu&g_ep=EgoyMDI0MDkxMS4wIKXMDSoASAFQAw%3D%3D', NULL, 1, '2024-09-16 02:46:46', '2024-09-19 03:30:22'),
(6, '1118/7,Khilbaritak,Baroitola road,Vatara,Dhaka-1212', '11-6063', '1212', 'https://maps.app.goo.gl/wCqQHC3tQc5ruHEw6', NULL, 1, '2024-09-17 02:34:53', '2024-09-17 02:34:53'),
(9, 'RD#4,BL#A,Grasp Super Market,Vatara,Dhaka-1212', 'RD-2554', '1212', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.3656812116346!2d90.424519480128!3d23.80559219246382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7b75b77d63b%3A0x33d840f5526ec47a!2sSalam%20General%20Store!5e0!3m2!1sen!2sbd!4v1726726372631!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 1, '2024-09-19 03:26:48', '2024-09-19 04:13:40'),
(10, 'H# 160, R# 08, B# F, Bashundhara R/A, Dhaka-1229', 'H#-4557', '1229', 'https://maps.app.goo.gl/hPGK1EdTe1KwuZLT9', NULL, 1, '2024-09-23 08:12:47', '2024-09-23 08:12:47'),
(11, 'Madani Avenue, Thana Road, Notun Bazar Dhaka-1212', 'MA-7282', '1212', 'https://maps.app.goo.gl/WwgFUUGyUtYWzbrL8', NULL, 1, '2024-09-24 10:53:53', '2024-09-24 10:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_27_071106_create_room_types_table', 2),
(6, '2024_08_27_102855_create_floors_table', 3),
(7, '2024_08_27_105520_create_locations_table', 4),
(9, '2024_08_27_174250_create_buildings_table', 6),
(10, '2024_08_29_081753_create_permission_tables', 7),
(11, '2024_08_29_162945_create_designations_table', 8),
(12, '2024_08_27_113955_create_employees_table', 9),
(13, '2024_09_01_044638_create_assets_table', 10),
(14, '2024_09_01_072239_create_rooms_table', 11),
(15, '2024_09_04_192106_create_customers_table', 12),
(16, '2024_09_05_200327_create_bookings_table', 13),
(17, '2024_09_24_084641_create_collections_table', 14),
(18, '2024_09_26_181918_create_checkouts_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(12, 'view asset', 'web', '2024-09-27 10:49:42', '2024-09-27 10:49:42'),
(13, 'create asset', 'web', '2024-09-27 10:50:07', '2024-09-27 10:50:07'),
(14, 'update asset', 'web', '2024-09-27 10:50:14', '2024-09-27 10:50:14'),
(15, 'delete asset', 'web', '2024-09-27 10:50:24', '2024-09-27 10:50:24'),
(16, 'view booking', 'web', '2024-09-27 11:00:15', '2024-09-27 11:00:15'),
(17, 'create booking', 'web', '2024-09-27 11:00:26', '2024-09-27 11:00:26'),
(18, 'update booking', 'web', '2024-09-27 11:00:36', '2024-09-27 11:00:36'),
(19, 'delete booking', 'web', '2024-09-27 11:00:42', '2024-09-27 11:00:42'),
(20, 'view collection', 'web', '2024-09-27 11:01:01', '2024-09-27 11:01:01'),
(21, 'create collection', 'web', '2024-09-27 11:01:14', '2024-09-27 11:01:14'),
(22, 'update collection', 'web', '2024-09-27 11:01:22', '2024-09-27 11:01:22'),
(23, 'delete collection', 'web', '2024-09-27 11:01:33', '2024-09-27 11:01:33'),
(24, 'view employee', 'web', '2024-09-27 11:01:46', '2024-09-27 11:01:46'),
(25, 'create employee', 'web', '2024-09-27 11:01:55', '2024-09-27 11:01:55'),
(26, 'update employee', 'web', '2024-09-27 11:02:10', '2024-09-27 11:02:10'),
(27, 'delete employee', 'web', '2024-09-27 11:02:18', '2024-09-27 11:02:18'),
(28, 'view floor', 'web', '2024-09-27 11:02:29', '2024-09-27 11:02:29'),
(29, 'create floor', 'web', '2024-09-27 11:02:35', '2024-09-27 11:02:35'),
(30, 'update floor', 'web', '2024-09-27 11:02:44', '2024-09-27 11:02:44'),
(31, 'delete floor', 'web', '2024-09-27 11:02:52', '2024-09-27 11:02:52'),
(32, 'view location', 'web', '2024-09-27 11:03:37', '2024-09-27 11:03:37'),
(33, 'create location', 'web', '2024-09-27 11:03:46', '2024-09-27 11:03:46'),
(34, 'update location', 'web', '2024-09-27 11:03:54', '2024-09-27 11:03:54'),
(35, 'delete location', 'web', '2024-09-27 11:04:03', '2024-09-27 11:04:03'),
(36, 'view roomtype', 'web', '2024-09-27 11:04:15', '2024-09-27 11:04:15'),
(37, 'create roomtype', 'web', '2024-09-27 11:04:23', '2024-09-27 11:04:23'),
(38, 'update roomtype', 'web', '2024-09-27 11:04:30', '2024-09-27 11:04:30'),
(39, 'delete roomtype', 'web', '2024-09-27 11:04:36', '2024-09-27 11:04:36'),
(40, 'view user', 'web', '2024-09-27 11:04:44', '2024-09-27 11:04:44'),
(41, 'create user', 'web', '2024-09-27 11:04:55', '2024-09-27 11:04:55'),
(42, 'delete user', 'web', '2024-09-27 11:05:04', '2024-09-27 11:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-08-29 10:18:25', '2024-08-29 10:18:25'),
(2, 'manager', 'web', '2024-09-26 23:57:27', '2024-09-26 23:57:27'),
(3, 'user', 'web', '2024-09-27 11:05:35', '2024-09-27 11:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(12, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` bigint(20) UNSIGNED DEFAULT NULL,
  `building_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_size` int(11) DEFAULT NULL,
  `room_image` varchar(255) DEFAULT NULL,
  `electricity` tinyint(1) DEFAULT 0,
  `aircondition` tinyint(1) DEFAULT 0,
  `attach_toilet` tinyint(1) DEFAULT 0,
  `attach_baranda` tinyint(1) DEFAULT 0,
  `has_window` tinyint(1) DEFAULT 0,
  `others` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `asset_id`, `building_id`, `room_type_id`, `room_size`, `room_image`, `electricity`, `aircondition`, `attach_toilet`, `attach_baranda`, `has_window`, `others`, `created_at`, `updated_at`) VALUES
(16, 12, 10, 12, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 10:12:46', '2024-09-22 10:20:21'),
(17, 11, 10, 12, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 10:21:01', '2024-09-22 10:21:01'),
(18, 13, 10, 12, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 10:23:21', '2024-09-22 10:23:21'),
(19, 14, 10, 13, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 10:26:14', '2024-09-22 10:26:14'),
(20, 15, 10, 13, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 10:28:18', '2024-09-22 10:28:18'),
(21, 16, 10, 13, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 10:55:27', '2024-09-22 10:55:27'),
(22, 17, 10, 13, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 10:57:06', '2024-09-22 10:57:06'),
(23, 18, 10, 13, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 10:59:58', '2024-09-22 10:59:58'),
(24, 19, 10, 13, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 11:48:33', '2024-09-22 11:48:33'),
(25, 20, 10, 13, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 11:50:15', '2024-09-22 11:50:15'),
(26, 21, 10, 13, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 11:52:45', '2024-09-22 11:52:45'),
(27, 22, 10, 13, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 11:59:22', '2024-09-22 11:59:22'),
(28, 23, 10, 13, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 12:00:52', '2024-09-22 12:00:52'),
(29, 24, 10, 14, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 12:02:11', '2024-09-22 12:02:11'),
(30, 25, 10, 14, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 12:03:31', '2024-09-22 12:03:31'),
(31, 26, 14, 14, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 12:20:22', '2024-09-22 12:20:22'),
(32, 27, 14, 15, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 12:27:42', '2024-09-22 12:27:42'),
(33, 28, 14, 15, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 12:29:12', '2024-09-22 12:29:12'),
(34, 29, 14, 15, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 12:30:25', '2024-09-22 12:30:25'),
(35, 30, 14, 15, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 12:31:29', '2024-09-22 12:31:29'),
(36, 31, 14, 15, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-22 12:32:34', '2024-09-22 12:32:34'),
(37, 36, 15, 16, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-23 13:39:31', '2024-09-23 14:01:23'),
(38, 37, 15, 16, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-23 13:46:54', '2024-09-23 13:46:54'),
(39, 38, 15, 16, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-23 13:51:21', '2024-09-23 13:51:21'),
(40, 39, 15, 16, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-23 13:55:28', '2024-09-23 13:55:28'),
(41, 40, 15, 16, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-23 13:56:25', '2024-09-23 13:56:25'),
(42, 41, 15, 16, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-23 13:58:36', '2024-09-23 13:58:36'),
(43, 48, 15, 16, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-24 10:29:36', '2024-09-24 10:29:36'),
(44, 68, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 07:56:13', '2024-09-26 07:27:57'),
(45, 69, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 08:18:40', '2024-09-26 07:28:23'),
(46, 70, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 08:35:21', '2024-09-26 07:29:10'),
(47, 71, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 08:45:54', '2024-09-25 08:45:54'),
(48, 72, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 09:01:48', '2024-09-26 07:30:46'),
(49, 73, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 09:08:12', '2024-09-26 07:31:00'),
(50, 102, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 10:09:33', '2024-09-26 07:31:36'),
(51, 115, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 10:21:43', '2024-09-26 07:32:20'),
(52, 116, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 10:29:46', '2024-09-26 07:32:34'),
(53, 117, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 10:51:41', '2024-09-26 07:32:49'),
(54, 118, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 10:53:33', '2024-09-25 10:53:33'),
(55, 119, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 11:07:48', '2024-09-25 11:07:48'),
(56, 120, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 12:03:19', '2024-09-26 07:33:28'),
(57, 121, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 12:11:16', '2024-09-26 07:33:43'),
(58, 122, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 12:22:24', '2024-09-26 07:34:33'),
(59, 123, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 12:32:08', '2024-09-25 12:33:09'),
(60, 124, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 12:39:56', '2024-09-26 07:35:00'),
(61, 125, 11, 11, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-25 13:05:25', '2024-09-25 13:05:25'),
(62, 129, 11, 17, NULL, NULL, 0, 0, 0, 0, 0, 0, '2024-09-26 09:10:23', '2024-09-26 09:10:23'),
(65, 10, 11, 11, 0, NULL, 0, 0, 0, 0, 0, 0, '2024-09-26 04:43:18', '2024-09-27 11:34:02'),
(66, 10, 11, 12, NULL, NULL, 1, 1, 0, 0, 0, 0, '2024-09-26 04:43:31', '2024-09-27 11:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roomType` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `roomType`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Bed (2), Kitchen (1), Washroom (1), Balcony (1)', 1, '2024-09-21 13:09:10', '2024-09-21 13:09:10'),
(12, '2 Bed, 1 Dinning, 2 Washroom, 1 Kitchen', 1, '2024-09-22 09:53:47', '2024-09-22 09:53:47'),
(13, '2 Bed, 1 Dinning, 2 Washroom, 1 Kitchen, 2 Balcony', 1, '2024-09-22 09:54:53', '2024-09-22 09:54:53'),
(14, '1 Bed, 1 Washroom, 1 Kitchen,', 1, '2024-09-22 09:56:09', '2024-09-22 09:56:09'),
(15, '2 Bed, 1 Washroom, 1 Kitchen', 1, '2024-09-22 09:56:39', '2024-09-22 09:56:39'),
(16, '1 Room & 1 Washroom', 1, '2024-09-23 09:16:15', '2024-09-23 09:16:15'),
(17, 'Bed (1), Dining (1), Washroom (1), Kitchen (1), Balcony (1)', 1, '2024-09-26 07:18:05', '2024-09-26 07:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CExvO4Ev9ygl90sBiX84KnvFWyUNHNim4R4VgARI', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaVJ2RFRRQ2pUUlBoRTFwbG40STh5R3NDM0VLV0V1dHlheFRhMk1yQyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZC9hc3NldC8xMC9lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727489987),
('MkfOJoujLFDhx3Ugprw8YtSFk7bzpR6q5RAp8CxI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSDJ6T3dwUVI3YjQ0RUZsNlZZeUZUWkdYc0xUMGVpdENMSWN2aVk3ZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0OToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZC91c2Vycy9wZXJtaXNzaW9ucyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkL3VzZXJzL3Blcm1pc3Npb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727455218),
('mw3q5LO7dnTh5tofZ4pbbmAJIxYqE9p2SUsDiRAh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibkFDbkVyM3J4WVoxelE2Z2lESmM4WFUzdnc5bWJqOXNJdTI0aUo1MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727455219),
('UqjyO3ShwAaoDEQjwcUEKI03q7TO8O9KxNDZpo8f', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS1dueHF5NjVFeTVnUDJDVU5KcG8ydFZQYXV2WE9qbUJPTXZtMVBZNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvYXNzZXQvMTAvZWRpdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1727458565);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_superadmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@mail.com', NULL, '$2y$12$xl3ZvY0rw9G4iZOI5Jr.x.d04foIUwskEz5ONzrBgOwUNaAuOQWIa', 1, '2gxDm58Qz34X7IKTWGx9Fb6wcnozFQeGfUjzbE3tBRjgVyzo3QNBH3x9njXs', '2024-08-25 11:29:49', '2024-08-25 11:29:49'),
(2, 'QBitTech Developer', 'qbittech.dev1@gmail.com', NULL, '$2y$12$PC7y/V6YoSog4CSSGnDIuex4nqC792xmOV32Hm7ksyZbOtpMJIEd.', 0, 'RGmH0zcIGdc9aBHosz3xeTEQzEjzr1MmCIQjlVgjSoEnjGqBxx2KrOtWRpPe', '2024-08-29 12:26:55', '2024-09-27 11:13:06'),
(3, 'Guest User', 'user@rental.com', '2024-09-15 09:28:49', '$2y$12$ely1/pT5KV1PlbeRs3cVlOgsqd0BvKJsvPwT6KZFUrOA9CFAtbxLS', 0, 'MVGS08Z3t1Zkqlg0guGzUYmk2IJmn8GyMa7o0oft7XCfukdWFKM5iclyjS9K', '2024-09-15 09:28:49', '2024-09-15 09:28:49'),
(7, 'Admin', 'admin@rental.com', NULL, '$2y$12$B/MwleCGchP8t3x2FKZpZemxl3BSimVgx4BViu3Lg882uLfSjchM6', 0, NULL, '2024-09-27 11:32:47', '2024-09-27 11:32:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assets_building_id_foreign` (`building_id`),
  ADD KEY `assets_location_id_foreign` (`location_id`),
  ADD KEY `assets_floor_id_foreign` (`floor_id`),
  ADD KEY `assets_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_location_id_foreign` (`location_id`),
  ADD KEY `bookings_building_id_foreign` (`building_id`),
  ADD KEY `bookings_floor_id_foreign` (`floor_id`),
  ADD KEY `bookings_asset_id_foreign` (`asset_id`),
  ADD KEY `bookings_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buildings_building_code_unique` (`building_code`),
  ADD KEY `buildings_location_id_foreign` (`location_id`),
  ADD KEY `buildings_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkouts_employee_id_foreign` (`employee_id`),
  ADD KEY `checkouts_asset_id_foreign` (`asset_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collections_building_id_foreign` (`building_id`),
  ADD KEY `collections_asset_id_foreign` (`asset_id`),
  ADD KEY `collections_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_extras`
--
ALTER TABLE `customer_extras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_extras_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_employee_code_unique` (`employee_code`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_designation_id_foreign` (`designation_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_member`
--
ALTER TABLE `family_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_member_customer_extra_id_foreign` (`customer_extra_id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locations_location_id_unique` (`location_code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_asset_id_foreign` (`asset_id`),
  ADD KEY `rooms_building_id_foreign` (`building_id`),
  ADD KEY `rooms_room_type_id_foreign` (`room_type_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `customer_extras`
--
ALTER TABLE `customer_extras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_member`
--
ALTER TABLE `family_member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assets_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assets_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`),
  ADD CONSTRAINT `assets_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`),
  ADD CONSTRAINT `bookings_ibfk_5` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `buildings`
--
ALTER TABLE `buildings`
  ADD CONSTRAINT `buildings_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `buildings_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`),
  ADD CONSTRAINT `checkouts_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`),
  ADD CONSTRAINT `collections_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`),
  ADD CONSTRAINT `collections_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `customer_extras`
--
ALTER TABLE `customer_extras`
  ADD CONSTRAINT `customer_extras_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`);

--
-- Constraints for table `family_member`
--
ALTER TABLE `family_member`
  ADD CONSTRAINT `family_member_customer_extra_id_foreign` FOREIGN KEY (`customer_extra_id`) REFERENCES `customer_extras` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
