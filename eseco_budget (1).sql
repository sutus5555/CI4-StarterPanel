-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2023 at 09:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eseco_budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget_data`
--

CREATE TABLE `budget_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `repeat_id` int(11) NOT NULL,
  `end` date DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `paymentmode_id` int(11) NOT NULL,
  `proposed` date NOT NULL,
  `cost` int(11) NOT NULL,
  `actual` int(11) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `creater` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `deleter` int(11) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `budget_data`
--

INSERT INTO `budget_data` (`id`, `name`, `type_id`, `group_id`, `repeat_id`, `end`, `department_id`, `user`, `unit`, `price`, `paymentmode_id`, `proposed`, `cost`, `actual`, `detail`, `remark`, `creater`, `create_at`, `updater`, `update_at`, `deleter`, `delete_at`) VALUES
(1, 'test33', 1, 1, 1, '2025-09-26', 2, 'tik', 2, 2000, 1, '2024-01-30', 4000, 0, 'Computer PC for ACC66', 'test com tik for acc dd 77', 0, '0000-00-00 00:00:00', 0, '2023-11-10 04:24:12', NULL, NULL),
(2, 'test2', 2, 3, 3, NULL, 4, 'mr.sutus', 3, 1000, 3, '2023-11-01', 3000, 0, 'computer notebook', 'for replace old one', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(3, 'thhh', 2, 2, 4, '0000-00-00', 8, 'khamron', 2, 5000, 3, '2023-08-01', 10000, 0, 'Machine', 'for production', 1, '2023-10-30 16:55:08', NULL, NULL, NULL, NULL),
(4, 'tggtt', 2, 3, 5, '2030-12-10', 3, 'dfdfdf', 3, 5000, 3, '2023-11-30', 15000, 0, 'gggggggggggggggggggg', 'gggggggg', 1, '2023-11-10 17:04:53', NULL, NULL, 0, '2023-11-10 04:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `budget_group`
--

CREATE TABLE `budget_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `creater` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` varchar(255) NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `deleter` varchar(255) NOT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `budget_group`
--

INSERT INTO `budget_group` (`id`, `name`, `description`, `remark`, `creater`, `create_at`, `updater`, `update_at`, `deleter`, `delete_at`) VALUES
(1, 'Office Equipment', 'Office Equipment', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:11:40', '', NULL, '', NULL),
(2, 'W\'house Equipment', 'W\'house Equipment', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:11:51', '', NULL, '', NULL),
(3, 'Re-packaging Dept.', 'Re-packaging Dept.', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:12:01', '', NULL, '', NULL),
(4, 'Hardware & Software', 'Hardware & Software', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:12:09', '', NULL, '', NULL),
(5, 'Motor Vehicle', 'Motor Vehicle', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:12:17', '', NULL, '', NULL),
(6, 'ON SALARIES RELATED EXPENSES', 'ON SALARIES RELATED EXPENSES', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:12:26', '', NULL, '', NULL),
(7, 'AUDIT FEES', 'AUDIT FEES', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:12:33', '', NULL, '', NULL),
(8, 'HCLEANING SERVICE', 'HCLEANING SERVICE', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:12:39', '', NULL, '', NULL),
(9, 'COMPENSATION', 'COMPENSATION', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:12:48', '', NULL, '', NULL),
(10, 'COMMISSION PAID - THIRTY PARTY', 'COMMISSION PAID - THIRTY PARTY', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:13:00', '', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `budget_type`
--

CREATE TABLE `budget_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `creater` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` varchar(255) NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `deleter` varchar(255) NOT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `budget_type`
--

INSERT INTO `budget_type` (`id`, `name`, `description`, `remark`, `creater`, `create_at`, `updater`, `update_at`, `deleter`, `delete_at`) VALUES
(1, 'Normal', 'Normal', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:13:21', '', NULL, '', NULL),
(2, 'Capital Expenditure(CE)', 'Capital Expenditure(CE)', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:14:05', '', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `color` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `creater` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `code`, `name`, `description`, `icon`, `color`, `status`, `creater`, `create_at`, `update_at`) VALUES
(1, 'dd1', 'updatename 015', 'description 015', '', 'danger', 1, 'sutus_p@eseco.co.th', '2023-08-17 15:32:05', '2023-08-17 15:32:05'),
(3, 'dd2', 'name03', 'update03', '', 'secondary', 1, 'sutus_p@eseco.co.th', '2023-08-17 16:46:31', '2023-08-17 16:46:31'),
(4, 'dd3', 'dffdf', 'fdf', '', 'primary', 1, 'sutus_p@eseco.co.th', '2023-08-18 15:29:58', '2023-08-18 15:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `creater` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updater` varchar(255) NOT NULL,
  `update_at` datetime NOT NULL,
  `deleter` varchar(250) DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `remark`, `creater`, `create_at`, `updater`, `update_at`, `deleter`, `delete_at`) VALUES
(1, 'Sales', 'Sales', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:14:29', '', '0000-00-00 00:00:00', NULL, NULL),
(2, 'Accounting', 'Accounting', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:14:39', '', '0000-00-00 00:00:00', NULL, NULL),
(3, 'Purchase', 'Purchase', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:14:47', '', '0000-00-00 00:00:00', NULL, NULL),
(4, 'Store', 'Store', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:14:55', '', '0000-00-00 00:00:00', NULL, NULL),
(5, 'HR', 'HR', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:15:06', '', '0000-00-00 00:00:00', NULL, NULL),
(6, 'IT', 'IT', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:15:12', '', '0000-00-00 00:00:00', NULL, NULL),
(7, 'CS', 'CS', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:15:19', '', '0000-00-00 00:00:00', NULL, NULL),
(8, 'Maintenance', 'Maintenance', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:15:26', '', '0000-00-00 00:00:00', NULL, NULL),
(9, 'Safety', 'Safety', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:15:32', '', '0000-00-00 00:00:00', NULL, NULL),
(10, 'Supply-chain', 'Supply-chain', '-', 'sutus_p@eseco.co.th', '2023-10-24 17:15:38', '', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-05-20-124016', 'App\\Database\\Migrations\\Users', 'default', 'App', 1689304284, 1),
(2, '2021-05-20-124435', 'App\\Database\\Migrations\\Session', 'default', 'App', 1689304284, 1),
(3, '2021-05-20-125608', 'App\\Database\\Migrations\\UserRole', 'default', 'App', 1689304284, 1),
(4, '2021-05-20-125818', 'App\\Database\\Migrations\\UserAccess', 'default', 'App', 1689304284, 1),
(5, '2021-05-20-130307', 'App\\Database\\Migrations\\UserMenu', 'default', 'App', 1689304284, 1),
(6, '2021-05-20-130307', 'App\\Database\\Migrations\\UserSubmenu', 'default', 'App', 1689304284, 1),
(7, '2021-05-24-100652', 'App\\Database\\Migrations\\User', 'default', 'App', 1689304284, 1),
(8, '2021-05-25-102709', 'App\\Database\\Migrations\\UserMenuCategory', 'default', 'App', 1689304284, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('ci_session:p4kvhu6grh1d7mi3qv27sg7p763i7hea', '192.168.0.65', '2023-12-22 06:55:20', 0x5f5f63695f6c6173745f726567656e65726174657c693a313730333232383132303b5f63695f70726576696f75735f75726c7c733a35383a22687474703a2f2f3139322e3136382e302e36352f4349342d5374617274657250616e656c2f7075626c69632f696e6465782e7068702f686f6d65223b757365726e616d657c733a31393a2273757475735f7040657365636f2e636f2e7468223b66756c6c6e616d657c733a353a227375747573223b7573657249447c733a313a2231223b726f6c657c733a313a2231223b69734c6f67676564496e7c623a313b),
('ci_session:dpiv8jj601qgbeq99r9ajnae3e9mbt6r', '192.168.0.65', '2023-12-22 07:52:34', 0x5f5f63695f6c6173745f726567656e65726174657c693a313730333233313535333b5f63695f70726576696f75735f75726c7c733a35383a22687474703a2f2f3139322e3136382e302e36352f4349342d5374617274657250616e656c2f7075626c69632f696e6465782e7068702f686f6d65223b757365726e616d657c733a31393a2273757475735f7040657365636f2e636f2e7468223b66756c6c6e616d657c733a353a227375747573223b7573657249447c733a313a2232223b726f6c657c733a313a2231223b69734c6f67676564496e7c623a313b),
('ci_session:cnu1aqme9de4u32bn9eriqdm02ltc1a8', '192.168.0.65', '2023-12-22 09:26:49', 0x5f5f63695f6c6173745f726567656e65726174657c693a313730333233373230393b5f63695f70726576696f75735f75726c7c733a35383a22687474703a2f2f3139322e3136382e302e36352f4349342d5374617274657250616e656c2f7075626c69632f696e6465782e7068702f686f6d65223b757365726e616d657c733a31393a2273757475735f7040657365636f2e636f2e7468223b66756c6c6e616d657c733a373a2273757475736464223b7573657249447c733a313a2232223b726f6c657c733a313a2231223b69734c6f67676564496e7c623a313b);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(5) UNSIGNED NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `role`, `create_at`, `update_at`) VALUES
(2, 'sutus', 'sutus_p@eseco.co.th', '$2y$10$vQKVHhZU767SBwImquL7qOSFS5w3xm97bDg5Gf6FmHC5IhWCWYwiC', 1, '2023-07-13 10:13:46', '2023-12-22 02:59:56'),
(3, 'user1กxd', 'user1@eseco.com', '$2y$10$YygKMyLxzc0F7aveqe0kjeKk2JwDPGRZteJdKr7JutXwp6RfKAjUe', 2, '2023-07-13 11:27:26', '2023-12-19 11:42:04'),
(5, 'naree@eseco.local', 'naree@eseco.local', '$2y$10$ELgPN0aLEE9JNa9naCNC3eldEDj/qQJVRC6jduhwqzGeR6hjKXFzu', 1, '2023-11-08 03:26:55', '0000-00-00 00:00:00'),
(8, 'test', 'test@test.local', '$2y$10$UVbmHDrZEaIhzpyoQyDivOSep3ED/AlAymzTS40b2g6dqpezGwMNO', 2, '2023-12-22 11:42:07', '2023-12-22 11:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `menu_category_id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `submenu_id` int(11) UNSIGNED NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `role_id`, `menu_category_id`, `menu_id`, `submenu_id`, `create_at`, `update_at`) VALUES
(8, 2, 1, 0, 0, '2023-08-11 14:58:48', '2023-08-11 14:58:48'),
(9, 2, 0, 1, 0, '2023-08-11 14:58:48', '2023-08-11 14:58:48'),
(18, 1, 0, 7, 0, '2023-08-11 14:58:48', '2023-08-11 14:58:48'),
(19, 1, 4, 0, 0, '2023-08-11 14:58:48', '2023-08-11 14:58:48'),
(22, 1, 0, 5, 0, '2023-08-11 14:58:48', '2023-08-11 14:58:48'),
(23, 1, 0, 6, 0, '2023-08-11 14:58:48', '2023-08-11 14:58:48'),
(27, 2, 2, 0, 0, '2023-08-11 14:58:48', '2023-08-11 14:58:48'),
(29, 1, 0, 8, 0, '2023-08-15 11:37:44', '2023-08-15 11:37:44'),
(31, 1, 0, 9, 0, '2023-08-15 11:49:22', '2023-08-15 11:49:22'),
(33, 1, 0, 13, 0, '2023-08-16 14:10:13', '2023-08-16 14:10:13'),
(55, 1, 2, 0, 0, '2023-09-25 11:30:13', '2023-09-25 11:30:13'),
(56, 1, 0, 2, 0, '2023-09-25 11:30:14', '2023-09-25 11:30:14'),
(57, 1, 1, 0, 0, '2023-10-05 15:02:25', '2023-10-05 15:02:25'),
(58, 1, 0, 1, 0, '2023-10-05 15:02:25', '2023-10-05 15:02:25'),
(60, 1, 3, 0, 0, '2023-10-10 11:45:17', '2023-10-10 11:45:17'),
(61, 1, 0, 21, 0, '2023-10-10 11:48:47', '2023-10-10 11:48:47'),
(62, 1, 0, 22, 0, '2023-10-10 11:48:49', '2023-10-10 11:48:49'),
(64, 2, 0, 23, 0, '2023-11-08 16:27:07', '2023-11-08 16:27:07'),
(65, 2, 4, 0, 0, '2023-11-08 16:27:28', '2023-11-08 16:27:28'),
(66, 2, 0, 7, 0, '2023-11-08 16:27:29', '2023-11-08 16:27:29'),
(67, 2, 0, 21, 0, '2023-11-08 16:27:29', '2023-11-08 16:27:29'),
(68, 2, 0, 22, 0, '2023-11-08 16:27:31', '2023-11-08 16:27:31'),
(69, 1, 0, 24, 0, '2023-12-19 11:51:54', '2023-12-19 11:51:54'),
(72, 1, 0, 3, 0, '2023-12-19 12:12:55', '2023-12-19 12:12:55'),
(73, 1, 0, 23, 0, '2023-12-19 14:52:57', '2023-12-19 14:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_category` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `parent` tinyint(1) NOT NULL,
  `arrange` int(2) NOT NULL,
  `status` int(1) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu_category`, `title`, `url`, `icon`, `parent`, `arrange`, `status`, `create_at`, `update_at`) VALUES
(1, 1, 'Dashboard', 'home', 'home', 0, 1, 0, '2023-08-11 14:55:12', '2023-08-11 15:03:14'),
(2, 2, 'Users', 'users', 'user', 0, 20, 0, '2023-08-11 14:55:12', '2023-08-11 15:03:14'),
(3, 3, 'Menu Management', 'menuManagement', 'command', 0, 21, 0, '2023-08-11 14:55:12', '2023-08-11 15:03:14'),
(4, 3, 'CRUD Generator', 'crudGenerator', 'code', 0, 22, 0, '2023-08-11 14:55:12', '2023-08-11 15:03:14'),
(7, 4, 'input_budget', 'InputBudget', 'log-in', 0, 9, 0, '2023-08-11 14:55:12', '2023-08-11 15:03:14'),
(14, 6, 'SubCategory ', 'SubCategory ', 'log-in', 0, 3, 0, '2023-08-16 14:11:14', '2023-08-16 14:11:14'),
(15, 6, 'Category', 'Category', 'log-in', 0, 2, 0, '2023-08-16 14:24:40', '2023-08-16 14:24:40'),
(16, 6, 'Products', 'Products', 'log-in', 0, 4, 0, '2023-08-16 14:56:57', '2023-08-16 14:56:57'),
(17, 6, 'Spec', 'Spec', 'log-in', 0, 5, 0, '2023-08-16 14:58:31', '2023-08-16 14:58:31'),
(18, 7, 'QcReport', 'QcReport', 'QcReport', 0, 6, 0, '2023-08-16 15:02:28', '2023-08-16 15:02:28'),
(19, 8, 'UserLog', 'UserLog', 'file-text', 0, 8, 0, '2023-08-16 15:15:36', '2023-08-16 15:15:36'),
(21, 4, 'BudgetType', 'BudgetType', 'arrow-right', 0, 0, 0, '2023-10-10 11:46:25', '2023-10-10 11:46:25'),
(22, 4, 'BudgetGroup', 'BudgetGroup', 'arrow-right', 0, 0, 0, '2023-10-10 11:47:30', '2023-10-10 11:47:30'),
(23, 4, 'Devision', 'Devision', 'arrow-right', 0, 0, 0, '2023-10-10 11:48:12', '2023-12-20 11:50:05'),
(24, 2, 'Roles', 'Roles', 'alert-circle', 0, 0, 0, '2023-12-19 11:51:40', '2023-12-19 11:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu_category`
--

CREATE TABLE `user_menu_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_category` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `arrange` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_menu_category`
--

INSERT INTO `user_menu_category` (`id`, `menu_category`, `status`, `create_at`, `update_at`, `arrange`) VALUES
(1, 'Common Page', 1, '2023-08-11 14:56:50', '2023-08-11 15:03:37', 1),
(2, 'System Settings', 1, '2023-08-11 14:56:50', '2023-12-22 15:38:53', 9),
(3, 'Developers', 1, '2023-08-11 14:56:50', '2023-08-11 15:03:37', 10),
(4, 'Budget', 1, '2023-08-11 14:56:50', '2023-08-11 15:03:37', 8),
(5, 'test-db', 1, '2023-08-15 11:20:53', '2023-08-15 11:20:53', 7),
(6, 'Master Data', 1, '2023-08-16 11:39:14', '2023-08-16 11:39:14', 2),
(7, 'Output', 1, '2023-08-16 15:00:41', '2023-08-16 15:00:41', 3),
(8, 'Log', 1, '2023-08-16 15:05:42', '2023-08-16 15:05:42', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`, `status`, `create_at`, `update_at`) VALUES
(1, 'Developer', 0, '2023-08-11 15:04:30', '2023-08-11 15:04:30'),
(2, 'User', 0, '2023-08-11 15:04:30', '2023-08-11 15:04:30'),
(3, 'Supervisor', 0, '2023-08-11 15:04:30', '2023-08-11 15:04:30'),
(4, 'Manager', 0, '2023-08-11 15:04:30', '2023-08-11 15:04:30'),
(5, 'CEO', 0, '2023-08-11 15:04:30', '2023-08-11 15:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget_data`
--
ALTER TABLE `budget_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget_group`
--
ALTER TABLE `budget_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget_type`
--
ALTER TABLE `budget_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`timestamp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu_category`
--
ALTER TABLE `user_menu_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget_data`
--
ALTER TABLE `budget_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `budget_group`
--
ALTER TABLE `budget_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `budget_type`
--
ALTER TABLE `budget_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_menu_category`
--
ALTER TABLE `user_menu_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
