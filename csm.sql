-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 02:55 PM
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
-- Database: `csm`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `author` varchar(128) DEFAULT NULL,
  `time` int(20) NOT NULL,
  `keywords` varchar(225) DEFAULT NULL,
  `subdomain` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `staff_id` varchar(125) DEFAULT NULL,
  `img_url` varchar(225) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(128) NOT NULL,
  `receiver_id` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `receiver_status` varchar(128) DEFAULT NULL,
  `sender_status` varchar(128) DEFAULT NULL,
  `img_link` varchar(128) DEFAULT NULL,
  `type` varchar(128) DEFAULT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cmessages`
--

CREATE TABLE `cmessages` (
  `id` int(11) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `sender_id` varchar(128) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `message` text NOT NULL,
  `status` varchar(128) DEFAULT NULL,
  `solved` varchar(128) DEFAULT NULL,
  `logged_in` varchar(128) DEFAULT NULL,
  `time` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `time` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `img_url` varchar(128) DEFAULT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `is_reply` varchar(128) DEFAULT NULL,
  `reply_to` varchar(128) DEFAULT NULL,
  `report_status` varchar(128) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `likes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `common_tab`
--

CREATE TABLE `common_tab` (
  `id` int(11) NOT NULL,
  `position` varchar(128) DEFAULT NULL,
  `short_det` varchar(128) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `school_id` varchar(128) NOT NULL,
  `amount` decimal(19,2) NOT NULL,
  `level` varchar(128) NOT NULL,
  `term` varchar(128) NOT NULL,
  `session` varchar(128) NOT NULL,
  `option` varchar(128) NOT NULL,
  `fee_title` varchar(128) DEFAULT NULL,
  `time` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gettew_blog`
--

CREATE TABLE `gettew_blog` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `author` varchar(128) DEFAULT NULL,
  `time` int(20) NOT NULL,
  `keywords` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `img_url` varchar(225) DEFAULT NULL,
  `school_id` varchar(225) DEFAULT NULL,
  `website_id` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gettew_pages`
--

CREATE TABLE `gettew_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `author` varchar(128) DEFAULT NULL,
  `time` varchar(128) NOT NULL,
  `keywords` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `subdomain` varchar(225) DEFAULT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `link` varchar(128) DEFAULT NULL,
  `type` varchar(128) DEFAULT NULL,
  `subdomain` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(128) DEFAULT NULL,
  `receiever_id` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `contents` varchar(128) DEFAULT NULL,
  `type` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `time` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `author` varchar(128) DEFAULT NULL,
  `time` varchar(128) NOT NULL,
  `keywords` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `subdomain` varchar(225) DEFAULT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `middlename` varchar(228) DEFAULT NULL,
  `school_id` varchar(128) DEFAULT NULL,
  `phone` varchar(228) DEFAULT NULL,
  `profile_img` varchar(128) DEFAULT NULL,
  `gender` varchar(228) DEFAULT NULL,
  `complexion` varchar(128) DEFAULT NULL,
  `lastlog` varchar(128) DEFAULT NULL,
  `admission_date` varchar(128) DEFAULT NULL,
  `child_ids` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `school_id` varchar(128) NOT NULL,
  `ref` varchar(128) NOT NULL,
  `method` varchar(128) NOT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `amount` decimal(19,2) NOT NULL,
  `status` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `product` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(128) NOT NULL,
  `ref` varchar(128) NOT NULL,
  `bank_name` varchar(128) NOT NULL,
  `account_name` varchar(128) NOT NULL,
  `account_number` varchar(128) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `amount` decimal(19,2) NOT NULL,
  `status` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `receiver_id` varchar(128) DEFAULT NULL,
  `receiver_type` varchar(128) DEFAULT NULL,
  `post_type` varchar(128) DEFAULT NULL,
  `post_position` varchar(128) DEFAULT NULL,
  `privacy` varchar(128) DEFAULT NULL,
  `post_img` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `contents` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `school_id` varchar(128) DEFAULT NULL,
  `student_id` varchar(128) DEFAULT NULL,
  `first_test` varchar(225) DEFAULT NULL,
  `first_test_total` varchar(225) DEFAULT NULL,
  `second_test` varchar(225) DEFAULT NULL,
  `second_test_total` varchar(225) DEFAULT NULL,
  `exam_score` varchar(225) DEFAULT NULL,
  `exam_total` varchar(225) DEFAULT NULL,
  `practical_score` varchar(225) DEFAULT NULL,
  `practical_total` varchar(225) DEFAULT NULL,
  `session` varchar(225) DEFAULT NULL,
  `track_key` varchar(225) DEFAULT NULL,
  `term` varchar(225) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `unique_key` varchar(225) DEFAULT NULL,
  `class` varchar(128) DEFAULT NULL,
  `year` varchar(128) DEFAULT NULL,
  `percentage_total` decimal(3,1) DEFAULT NULL,
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result_csv`
--

CREATE TABLE `result_csv` (
  `id` int(11) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `school_id` varchar(128) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `admin_id` varchar(128) NOT NULL,
  `student_options` text DEFAULT NULL,
  `session_division` text DEFAULT NULL,
  `sessions` text DEFAULT NULL,
  `term` varchar(228) DEFAULT NULL,
  `phone` varchar(228) DEFAULT NULL,
  `email` varchar(228) DEFAULT NULL,
  `address` varchar(228) DEFAULT NULL,
  `profile_img` varchar(128) DEFAULT NULL,
  `fee_option` varchar(128) DEFAULT NULL,
  `motto` varchar(228) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `account_balance` decimal(19,2) NOT NULL,
  `pending_balance` decimal(19,2) NOT NULL,
  `amount_spent` decimal(19,2) NOT NULL,
  `fee_balance` decimal(19,2) NOT NULL,
  `total_fee_processed` decimal(19,2) NOT NULL,
  `show_position` varchar(128) DEFAULT NULL,
  `result_access` varchar(128) DEFAULT NULL,
  `result_access_price` decimal(19,2) DEFAULT NULL,
  `license` varchar(128) DEFAULT NULL,
  `license_expire` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `admin_id`, `student_options`, `session_division`, `sessions`, `term`, `phone`, `email`, `address`, `profile_img`, `fee_option`, `motto`, `status`, `slug`, `account_balance`, `pending_balance`, `amount_spent`, `fee_balance`, `total_fee_processed`, `show_position`, `result_access`, `result_access_price`, `license`, `license_expire`, `time`, `details`) VALUES
(1, 'Element', '', '[\"Science\",\"Art\",\"Commercial\"]', '[]', '[]', NULL, '+2349067506614', 'olaniyiojeyinka@gmail.com', 'ile-ife osun state nigeria', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '[]', NULL, NULL, 'trial', '1578511042', 1577301442, NULL),
(2, 'Elementt', '', '[\"Science\",\"Art\",\"Commercial\"]', '[]', '[]', NULL, '+23490675066140', 'olaniyiojeyinka@gmail.comm', 'ile-ife osun state nigeria', NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '[]', NULL, NULL, 'trial', '1578511304', 1577301704, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools_level`
--

CREATE TABLE `schools_level` (
  `id` int(11) NOT NULL,
  `level` varchar(128) NOT NULL,
  `level_name` varchar(128) NOT NULL,
  `level_shortname` varchar(128) NOT NULL,
  `school_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sg_transactions`
--

CREATE TABLE `sg_transactions` (
  `id` int(11) NOT NULL,
  `school_id` varchar(128) NOT NULL,
  `amount` decimal(19,2) NOT NULL,
  `term` varchar(128) NOT NULL,
  `session` varchar(128) NOT NULL,
  `label` varchar(128) DEFAULT NULL,
  `time` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sms_history`
--

CREATE TABLE `sms_history` (
  `id` int(11) NOT NULL,
  `school_id` varchar(128) NOT NULL,
  `message` varchar(225) NOT NULL,
  `receiver` varchar(128) NOT NULL,
  `message_id` varchar(128) DEFAULT NULL,
  `session` varchar(128) NOT NULL,
  `term` varchar(128) NOT NULL,
  `ref` varchar(128) NOT NULL,
  `status` varchar(128) DEFAULT NULL,
  `time` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(228) DEFAULT NULL,
  `phone` varchar(228) DEFAULT NULL,
  `role` varchar(228) DEFAULT NULL,
  `dob` varchar(228) DEFAULT NULL,
  `profile_img` varchar(128) DEFAULT NULL,
  `gender` varchar(228) DEFAULT NULL,
  `complexion` varchar(128) DEFAULT NULL,
  `height` varchar(128) DEFAULT NULL,
  `staff_type` varchar(128) DEFAULT NULL,
  `staff_id` varchar(128) DEFAULT NULL,
  `school_id` varchar(128) DEFAULT NULL,
  `lastlog` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `middlename` varchar(128) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `student_id` varchar(128) DEFAULT NULL,
  `school_id` varchar(128) DEFAULT NULL,
  `profile_img` varchar(128) DEFAULT NULL,
  `student_options` varchar(128) DEFAULT NULL,
  `gender` varchar(228) DEFAULT NULL,
  `complexion` varchar(128) DEFAULT NULL,
  `height` varchar(128) DEFAULT NULL,
  `dob` varchar(128) DEFAULT NULL,
  `class` varchar(128) DEFAULT NULL,
  `genotype` varchar(128) DEFAULT NULL,
  `blood_group` varchar(128) DEFAULT NULL,
  `lastlog` varchar(128) DEFAULT NULL,
  `parent_id` varchar(128) DEFAULT NULL,
  `admission_date` varchar(128) DEFAULT NULL,
  `student_address` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students_payment`
--

CREATE TABLE `students_payment` (
  `id` int(11) NOT NULL,
  `student_id` varchar(128) NOT NULL,
  `school_id` varchar(128) NOT NULL,
  `ref` varchar(128) NOT NULL,
  `method` varchar(128) NOT NULL,
  `amount` decimal(19,2) NOT NULL,
  `status` varchar(128) DEFAULT NULL,
  `term` varchar(128) DEFAULT NULL,
  `session` varchar(128) DEFAULT NULL,
  `level` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `school_id` varchar(128) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_var`
--

CREATE TABLE `system_var` (
  `id` int(11) NOT NULL,
  `variable_name` varchar(128) DEFAULT NULL,
  `variable_value` varchar(128) DEFAULT NULL,
  `long_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `perm` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `time` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `theme_id` varchar(128) NOT NULL,
  `theme_version` varchar(128) NOT NULL,
  `api_version` varchar(128) NOT NULL,
  `theme_images` text NOT NULL,
  `creator_id` varchar(128) NOT NULL,
  `short_desc` text NOT NULL,
  `description` text NOT NULL,
  `admin_index` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `admin_folder` varchar(128) NOT NULL,
  `asset_folder` varchar(128) NOT NULL,
  `active_users` varchar(128) NOT NULL,
  `author_link` varchar(128) NOT NULL,
  `admin_options` text NOT NULL,
  `index_page` varchar(128) NOT NULL,
  `feature_support` text NOT NULL,
  `tags` text NOT NULL,
  `time` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `state` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `profile_img` varchar(128) DEFAULT NULL,
  `phonevc` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `short_status` varchar(128) DEFAULT NULL,
  `long_status` varchar(255) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `platform` varchar(128) DEFAULT NULL,
  `school_id` varchar(128) DEFAULT NULL,
  `acct_type` varchar(128) DEFAULT NULL,
  `browser` varchar(128) DEFAULT NULL,
  `lastlog` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `country`, `state`, `email`, `phone`, `profile_img`, `phonevc`, `status`, `short_status`, `long_status`, `time`, `level`, `role`, `platform`, `school_id`, `acct_type`, `browser`, `lastlog`) VALUES
(1, 'olaniyi', 'philip', NULL, 'fb469d7ef430b0baf0cab6c436e70375', 'Nigeria', 'Osun', 'olaniyiojeyinka@gmail.com', '+2349067506614', NULL, NULL, NULL, NULL, NULL, 1577301442, NULL, NULL, NULL, '1', NULL, NULL, NULL),
(2, 'olaniyi', 'philip', NULL, 'fb469d7ef430b0baf0cab6c436e70375', 'Nigeria', 'Osun', 'olaniyiojeyinka@gmail.comm', '+23490675066140', NULL, NULL, NULL, NULL, NULL, 1577301704, NULL, NULL, NULL, '2', NULL, NULL, '1577305437');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `tagline` varchar(128) NOT NULL,
  `domain` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `subdomain` varchar(128) NOT NULL,
  `school_id` varchar(128) NOT NULL,
  `admin_id` varchar(128) NOT NULL,
  `theme_options` text NOT NULL,
  `theme_id` varchar(128) NOT NULL,
  `theme_data` text NOT NULL,
  `creation_stage` varchar(128) NOT NULL,
  `favicon` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmessages`
--
ALTER TABLE `cmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_tab`
--
ALTER TABLE `common_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gettew_blog`
--
ALTER TABLE `gettew_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gettew_pages`
--
ALTER TABLE `gettew_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_csv`
--
ALTER TABLE `result_csv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools_level`
--
ALTER TABLE `schools_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sg_transactions`
--
ALTER TABLE `sg_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_history`
--
ALTER TABLE `sms_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_payment`
--
ALTER TABLE `students_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_var`
--
ALTER TABLE `system_var`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cmessages`
--
ALTER TABLE `cmessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `common_tab`
--
ALTER TABLE `common_tab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gettew_blog`
--
ALTER TABLE `gettew_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gettew_pages`
--
ALTER TABLE `gettew_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result_csv`
--
ALTER TABLE `result_csv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools_level`
--
ALTER TABLE `schools_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sg_transactions`
--
ALTER TABLE `sg_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_history`
--
ALTER TABLE `sms_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students_payment`
--
ALTER TABLE `students_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_var`
--
ALTER TABLE `system_var`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
