-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 09:29 PM
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
-- Database: `mari_nugas_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_groups`
--

CREATE TABLE `detail_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `owner_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_groups`
--

INSERT INTO `detail_groups` (`id`, `uid`, `title`, `description`, `created_at`, `updated_at`, `owner_id`) VALUES
(1, '65a84b68-c4cd-4a72-bee7-d73b4acc0487', '123123', 'asdasdaswsssda', '2023-12-09 11:42:46', '2023-12-09 12:12:40', '1b5b56bd-b52a-441e-a1d8-d1881817238f'),
(2, 'ebe997d1-b6e1-4a3c-b2ab-fe9996b0cb5a', 'sdasdsd', '12222222', '2023-12-09 12:19:02', '2023-12-09 12:19:02', '1b5b56bd-b52a-441e-a1d8-d1881817238f'),
(3, '500a55cb-90ad-4854-9b24-09ca53b1dc21', 'testing 4', 'asdadaaaa', '2023-12-09 13:26:14', '2023-12-09 13:26:14', '1b5b56bd-b52a-441e-a1d8-d1881817238f');

-- --------------------------------------------------------

--
-- Table structure for table `detail_tasks`
--

CREATE TABLE `detail_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `owner_id` varchar(255) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `due_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `task_sample` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_tasks`
--

INSERT INTO `detail_tasks` (`id`, `uid`, `owner_id`, `group_id`, `title`, `description`, `due_date`, `created_at`, `updated_at`, `task_sample`) VALUES
(1, 'cbdf05ea-3e0e-4923-8025-df818bb4aa7b', '1b5b56bd-b52a-441e-a1d8-d1881817238f', '65a84b68-c4cd-4a72-bee7-d73b4acc0487', '123', 'asdasdasd', '2023-11-28', '2023-12-09 12:11:49', '2023-12-09 12:11:49', 'p5q4fi370QW5xiGmVb97H5oNXHwqNdJdN1yJwDlP.pdf'),
(2, '025b6bc8-7e57-488e-b206-7a8ad3539296', '1b5b56bd-b52a-441e-a1d8-d1881817238f', 'ebe997d1-b6e1-4a3c-b2ab-fe9996b0cb5a', 'd12312312', 'asdasdsa', '2023-12-29', '2023-12-09 12:20:26', '2023-12-09 12:20:26', 'OtW9E8ealOFNmpcjyNMk3INx344zkkPpkEZdruPf.pdf'),
(3, '7b74bff8-c719-4d93-8265-12e299546e47', '1b5b56bd-b52a-441e-a1d8-d1881817238f', '500a55cb-90ad-4854-9b24-09ca53b1dc21', '123', '123123', '2023-12-10', '2023-12-09 13:26:49', '2023-12-09 13:26:49', 'bNUmavJrY7YUtfC9rP2ynsjgxBNX08T4R3UaBQAM.doc');

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
-- Table structure for table `list_groups`
--

CREATE TABLE `list_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `participant_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_groups`
--

INSERT INTO `list_groups` (`id`, `group_id`, `participant_id`, `created_at`, `updated_at`) VALUES
(5, 'ebe997d1-b6e1-4a3c-b2ab-fe9996b0cb5a', '88504b4b-4c69-4a46-a480-850e52ed6d93', '2023-12-09 12:20:05', '2023-12-09 12:20:05'),
(11, '65a84b68-c4cd-4a72-bee7-d73b4acc0487', '88504b4b-4c69-4a46-a480-850e52ed6d93', '2023-12-09 13:02:16', '2023-12-09 13:02:16'),
(12, '65a84b68-c4cd-4a72-bee7-d73b4acc0487', '127af024-dc69-41b3-baec-07efe28d2da9', '2023-12-09 13:18:24', '2023-12-09 13:18:24'),
(13, 'ebe997d1-b6e1-4a3c-b2ab-fe9996b0cb5a', '127af024-dc69-41b3-baec-07efe28d2da9', '2023-12-09 13:21:57', '2023-12-09 13:21:57'),
(15, '65a84b68-c4cd-4a72-bee7-d73b4acc0487', 'c556df66-9dfd-4713-afcf-a40a11fa54f9', '2023-12-09 13:25:56', '2023-12-09 13:25:56'),
(16, 'ebe997d1-b6e1-4a3c-b2ab-fe9996b0cb5a', 'c556df66-9dfd-4713-afcf-a40a11fa54f9', '2023-12-09 13:26:04', '2023-12-09 13:26:04'),
(17, '500a55cb-90ad-4854-9b24-09ca53b1dc21', 'c556df66-9dfd-4713-afcf-a40a11fa54f9', '2023-12-09 13:26:18', '2023-12-09 13:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `list_tasks`
--

CREATE TABLE `list_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `file_submitted` varchar(255) DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_tasks`
--

INSERT INTO `list_tasks` (`id`, `task_id`, `user_id`, `file_submitted`, `submitted_at`, `created_at`, `updated_at`) VALUES
(3, 'cbdf05ea-3e0e-4923-8025-df818bb4aa7b', '127af024-dc69-41b3-baec-07efe28d2da9', 'jiqnTkHpcFTLWYmaPxStZXiYpSW3lYujxrdTgCDe.pdf', '2023-12-09 12:54:11', '2023-12-09 12:54:11', '2023-12-09 12:54:11'),
(4, '025b6bc8-7e57-488e-b206-7a8ad3539296', '127af024-dc69-41b3-baec-07efe28d2da9', 'eKvJRusJUzllzO0rbIhNC4HbUils99YDUFDWl4QC.doc', '2023-12-09 12:55:30', '2023-12-09 12:55:30', '2023-12-09 12:55:30'),
(5, '7b74bff8-c719-4d93-8265-12e299546e47', 'c556df66-9dfd-4713-afcf-a40a11fa54f9', '23vlhdYUx7aQcIvxgLFA7EPY4y2n4Q0L8Chr2abh.doc', '2023-12-09 13:27:34', '2023-12-09 13:27:34', '2023-12-09 13:27:34'),
(6, '025b6bc8-7e57-488e-b206-7a8ad3539296', 'c556df66-9dfd-4713-afcf-a40a11fa54f9', 'NCUEqeW45Urp1rbQuDatjtmatPIow5rvxLgeHalr.doc', '2023-12-09 13:28:01', '2023-12-09 13:28:01', '2023-12-09 13:28:01'),
(7, 'cbdf05ea-3e0e-4923-8025-df818bb4aa7b', 'c556df66-9dfd-4713-afcf-a40a11fa54f9', 'IKacgAhcwkGG3RdgTce4BEMwz1MjVwt06MMtElhv.doc', '2023-12-09 13:28:09', '2023-12-09 13:28:09', '2023-12-09 13:28:09');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_10_120549_create_roles_table', 1),
(6, '2023_09_10_120601_create_notes_table', 1),
(7, '2023_09_10_120608_create_list_tasks_table', 1),
(8, '2023_09_10_120614_create_list_groups_table', 1),
(9, '2023_09_10_120620_create_detail_tasks_table', 1),
(10, '2023_09_10_120626_create_detail_groups_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `uid`, `user_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '511337a9-e400-4acb-96ee-99a0245bdf84', '1b5b56bd-b52a-441e-a1d8-d1881817238f', 'ZaSASDAS', '<div>asdasd</div>', '2023-12-09 12:13:09', '2023-12-09 12:13:09'),
(3, 'b1e6db72-3471-4525-92ad-f7a7b4bfcd54', '127af024-dc69-41b3-baec-07efe28d2da9', 'asdasdasd', '<div>aasd3123123</div>', '2023-12-09 12:16:31', '2023-12-09 12:16:31'),
(4, '08802e3d-21f6-40a3-a384-79060a4b3fe0', '127af024-dc69-41b3-baec-07efe28d2da9', 'fasdae1231', '<div>asdaads</div>', '2023-12-09 12:16:39', '2023-12-09 12:16:39'),
(5, '8b5f78e6-e87c-4385-a6a9-056ddf29b53c', 'c556df66-9dfd-4713-afcf-a40a11fa54f9', 'asdasdasdas', '<div>1231231sdsdasd</div>', '2023-12-09 13:25:05', '2023-12-09 13:25:08'),
(7, '01446505-3ba4-4ddf-9f0a-6b5b2578bda9', 'c556df66-9dfd-4713-afcf-a40a11fa54f9', 'asdasdas', '<div>dafasdasdas</div>', '2023-12-09 13:25:23', '2023-12-09 13:25:23');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'student'),
(2, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) NOT NULL,
  `roles_id` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `roles_id`, `username`, `password`, `email`, `created_at`, `updated_at`, `address`, `tag`) VALUES
(1, '127af024-dc69-41b3-baec-07efe28d2da9', '1', '123', '123', 'stu1@gmail.com', '2023-12-09 11:42:25', '2023-12-09 12:16:10', '-asdasd', 'v4xAkwkcLO'),
(2, '88504b4b-4c69-4a46-a480-850e52ed6d93', '1', '123', '123', 'stu2@gmail.com', '2023-12-09 11:42:31', '2023-12-09 11:42:31', '-', '84ttet3QiL'),
(3, '1b5b56bd-b52a-441e-a1d8-d1881817238f', '2', '123', '123', 'teach@gmail.com', '2023-12-09 11:42:37', '2023-12-09 13:22:10', '-asdasdas', '6ftNyUoKVl'),
(4, 'c556df66-9dfd-4713-afcf-a40a11fa54f9', '1', '123', '123', 'stu3@gmail.com', '2023-12-09 13:24:34', '2023-12-09 13:24:58', '-123123123', 'E4kRBayDzQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_groups`
--
ALTER TABLE `detail_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `detail_groups_uid_unique` (`uid`);

--
-- Indexes for table `detail_tasks`
--
ALTER TABLE `detail_tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `detail_tasks_uid_unique` (`uid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `list_groups`
--
ALTER TABLE `list_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_tasks`
--
ALTER TABLE `list_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notes_uid_unique` (`uid`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uid_unique` (`uid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_groups`
--
ALTER TABLE `detail_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_tasks`
--
ALTER TABLE `detail_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `list_groups`
--
ALTER TABLE `list_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `list_tasks`
--
ALTER TABLE `list_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
