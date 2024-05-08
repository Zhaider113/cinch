-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 01:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinch`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `feeding_window` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `start_time`, `end_time`, `feeding_window`, `created_at`, `updated_at`) VALUES
(1, 'Fasting', '00:00:00', '00:00:00', '14 hours', '2023-12-07 01:34:42', '2023-12-07 01:34:42'),
(2, 'Lunch', '00:00:00', '00:00:00', '12 hours', '2023-12-07 01:34:42', '2023-12-07 01:34:42'),
(3, 'Dinner', '00:00:00', '00:00:00', '20 hours', '2023-12-07 01:34:42', '2023-12-07 01:34:42'),
(4, 'Title', '14:35:00', '16:35:00', '', '2024-04-18 03:43:52', '2024-04-18 03:43:52'),
(5, 'dadasdad', '13:45:00', '01:45:00', '', '2024-04-18 03:44:36', '2024-04-18 03:44:36'),
(6, 'asdasdsad', '15:02:00', '03:03:00', '', '2024-04-18 04:02:33', '2024-04-18 04:02:33'),
(7, 'sdasda', '12:59:00', '00:59:00', '', '2024-04-18 04:08:09', '2024-04-18 04:08:09'),
(8, 'asdasd', '12:59:00', '00:00:00', '', '2024-04-18 04:08:59', '2024-04-18 04:08:59'),
(9, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:28', '2024-04-18 05:40:28'),
(10, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:29', '2024-04-18 05:40:29'),
(11, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:30', '2024-04-18 05:40:30'),
(12, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:30', '2024-04-18 05:40:30'),
(13, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:31', '2024-04-18 05:40:31'),
(14, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:31', '2024-04-18 05:40:31'),
(15, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:32', '2024-04-18 05:40:32'),
(16, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:32', '2024-04-18 05:40:32'),
(17, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:33', '2024-04-18 05:40:33'),
(18, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:33', '2024-04-18 05:40:33'),
(19, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:34', '2024-04-18 05:40:34'),
(20, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:34', '2024-04-18 05:40:34'),
(21, 'sdasd', '12:59:00', '00:00:00', '', '2024-04-18 05:40:35', '2024-04-18 05:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `category_tips`
--

CREATE TABLE `category_tips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `views` int(255) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_tips`
--

INSERT INTO `category_tips` (`id`, `category_id`, `title`, `image`, `description`, `views`, `created_at`, `updated_at`) VALUES
(1, 1, 'Think What you eat?', '', 'Healthy eating is about having a healthy balanced diet and choosing healthier options when preparing meals!', 3, NULL, '2023-12-11 04:42:28'),
(2, 1, 'Think What you eat?', '', 'Healthy eating is about having a healthy balanced diet and choosing healthier options when preparing meals!', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`id`, `category_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fasting', '2023-12-08 05:29:06', '2023-12-08 05:29:06'),
(2, 2, 'Food', '2023-12-08 05:29:07', '2023-12-08 05:29:07'),
(3, 3, 'Health', '2023-12-08 05:29:07', '2023-12-08 05:29:07'),
(4, 2, 'Training', '2023-12-08 05:29:07', '2023-12-08 05:29:07'),
(5, 1, 'Fasting', '2023-12-08 05:29:48', '2023-12-08 05:29:48'),
(6, 2, 'Food', '2023-12-08 05:29:48', '2023-12-08 05:29:48'),
(7, 3, 'Health', '2023-12-08 05:29:48', '2023-12-08 05:29:48'),
(8, 2, 'Training', '2023-12-08 05:29:48', '2023-12-08 05:29:48'),
(9, 1, 'new', '2024-04-18 05:44:09', '2024-04-18 05:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `food_courses`
--

CREATE TABLE `food_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `views` int(255) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_courses`
--

INSERT INTO `food_courses` (`id`, `food_id`, `title`, `video`, `description`, `views`, `created_at`, `updated_at`) VALUES
(1, 1, 'How to eat Better While fasting', 'uploads/course/video1.mp4', 'These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of. These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of', 3, '2023-12-08 05:29:48', '2023-12-09 01:52:09'),
(2, 2, 'How to eat Better While fasting', 'uploads/course/video1.mp4', 'These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of. These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of', 0, '2023-12-08 05:29:48', '2023-12-08 05:29:48'),
(3, 3, 'How to eat Better While fasting', 'uploads/course/video1.mp4', 'These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of. These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of', 0, '2023-12-08 05:29:48', '2023-12-08 05:29:48'),
(4, 2, 'How to eat Better While fasting', 'uploads/course/video1.mp4', 'These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of. These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of', 0, '2023-12-08 05:29:48', '2023-12-08 05:29:48'),
(5, 1, 'video', 'uploads/b1cc4000ba387eecc95fb958a2e8dc5e.mp4', 'video', 0, '2024-04-18 05:46:28', '2024-04-18 05:46:28'),
(6, 2, 'asdsd', 'uploads/49998652acaddccfc2986f5d4af1d286.mp4', 'sdasdasd', 0, '2024-04-18 06:32:54', '2024-04-18 06:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 2),
(11, '2014_10_12_000000_create_users_table', 3),
(12, '2023_12_07_061141_create_categories_table', 4),
(13, '2023_12_07_064142_create_category_tips_table', 5),
(14, '2023_12_07_073040_create_food_categories_table', 5),
(15, '2023_12_08_060430_create_food_courses_table', 6),
(16, '2023_12_12_181007_create_user_categories_table', 7),
(17, '2023_12_18_164447_create_recipes_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'auth_token', '1fe87c7de5de8a18023843fe1b0b2a03a6b05aa8fc62cf6e986f14eeee8a8ce5', '[\"*\"]', '2023-12-07 01:06:13', NULL, '2023-12-07 01:02:11', '2023-12-07 01:06:13'),
(2, 'App\\Models\\User', 3, 'auth_token', '7f816c10c3bf8e69633809a4e8d1a3a016e883da1e54dbd15ec78c8eddda70f9', '[\"*\"]', NULL, NULL, '2023-12-12 13:36:04', '2023-12-12 13:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `time_to_prepare` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `food_id`, `user_id`, `title`, `image`, `description`, `time_to_prepare`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Recipe from user', 'uploads/d4bfb457f802c0ce3b363bea3bd2a364.png', 'description', '1 hours', '2024-03-14 04:45:54', '2024-03-14 04:45:54'),
(2, 1, 1, 'Recipe from user', 'uploads/09dd5a7a3c1f6b313a52db2b27aee6bd.png', 'description', '', '2024-03-14 04:48:30', '2024-03-14 04:48:30'),
(3, 1, 3, 'Recipe from user', 'uploads/fcd5b7ee57c07c1cfe807c5ad407f31b.png', 'description', '', '2024-03-14 04:49:10', '2024-03-14 04:49:10'),
(4, 1, 1, 'Recipe from user', 'uploads/5bc52024554f23de797e1f06bf837b5b.png', 'description', '1 hours', '2024-03-14 04:50:23', '2024-03-14 04:50:23'),
(5, 1, 3, 'Recipe from user', 'uploads/775f4ed4cea424a6207627b982df670b.png', 'description', '1 hours', '2024-03-14 04:50:54', '2024-03-14 04:50:54'),
(6, 1, 1, 'asdAS', 'uploads/537bad7e6bf1ee61a9ca0eb36a141072.PNG', 'ASas', '3', '2024-04-18 05:45:28', '2024-04-18 05:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `apple_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'profile_images/default.jpg',
  `weight` int(255) DEFAULT NULL,
  `connect_account_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dob` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_account_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bank_account_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `device_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onesignal_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `apple_id`, `first_name`, `last_name`, `email`, `email_verified_at`, `profile_image`, `weight`, `connect_account_id`, `dob`, `gender`, `bank_account_name`, `bank_name`, `bank_account_number`, `device_type`, `onesignal_id`, `password`, `type`, `is_verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', '', 'Admin', 'Admin', 'admin@admin.com', NULL, 'profile_images/default.jpg', NULL, '', '', '', '', '', '', '', NULL, '$2y$10$BHlNWffH6Ci8ayB8P.ZukuCudKML0EiNcEr8gEN9RsRcHL7Bbnw0O', '0', 1, NULL, '2023-12-07 01:00:11', '2023-12-07 01:00:11'),
(3, '', '', 'Haider', 'zeeshan', 'haiderzeeshan2016@gmail.com', NULL, 'profile_images/default.jpg', 70, '', '', '', '', '', '', 'android', NULL, '$2y$10$a8YRkj03rkyhxCLyPbi9u.bRSH5MeBPaCp0WCiBT9b1VormA4VsNm', '0', 1, NULL, '2023-12-07 01:02:11', '2023-12-07 01:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_categories`
--

CREATE TABLE `user_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_categories`
--

INSERT INTO `user_categories` (`id`, `user_id`, `category_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '07:00:00', '09:00:00', '2023-12-12 13:42:35', '2023-12-12 13:55:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_tips`
--
ALTER TABLE `category_tips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_tips_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `food_courses`
--
ALTER TABLE `food_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_courses_food_id_foreign` (`food_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipes_food_id_foreign` (`food_id`),
  ADD KEY `recipes_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_categories_user_id_foreign` (`user_id`),
  ADD KEY `user_categories_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category_tips`
--
ALTER TABLE `category_tips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `food_courses`
--
ALTER TABLE `food_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_categories`
--
ALTER TABLE `user_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_tips`
--
ALTER TABLE `category_tips`
  ADD CONSTRAINT `category_tips_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD CONSTRAINT `food_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `food_courses`
--
ALTER TABLE `food_courses`
  ADD CONSTRAINT `food_courses_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recipes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_categories`
--
ALTER TABLE `user_categories`
  ADD CONSTRAINT `user_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
