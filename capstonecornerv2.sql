-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 06:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstonecornerv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_r_c_h_i_v_e_s`
--

CREATE TABLE `a_r_c_h_i_v_e_s` (
  `ARCH_ID` varchar(255) NOT NULL,
  `ARCH_NAME` varchar(255) NOT NULL,
  `ABSTRACT` varchar(255) NOT NULL,
  `AUTHOR_ID` varchar(255) NOT NULL,
  `GITHUB_LINK` varchar(255) NOT NULL,
  `PDF_FILE` varchar(255) NOT NULL,
  `IS_APPROVED` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a_u_t_h_o_r_s`
--

CREATE TABLE `a_u_t_h_o_r_s` (
  `AUTHOR_ID` bigint(20) UNSIGNED NOT NULL,
  `S_ID` varchar(255) NOT NULL,
  `ARCH_ID` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_o_u_r_s_e_s`
--

CREATE TABLE `c_o_u_r_s_e_s` (
  `C_ID` bigint(20) UNSIGNED NOT NULL,
  `C_DESC` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_m_p_l_o_y_e_e_s`
--

CREATE TABLE `e_m_p_l_o_y_e_e_s` (
  `EMP_ID` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2023_06_18_000349_create_user_c_c_s_table', 1),
(6, '2023_09_01_132845_create_proposals_table', 1),
(7, '2023_09_13_114352_create_a_u_t_h_o_r_s_table', 1),
(8, '2023_09_13_114400_create_s_t_u_d_e_n_t_s_table', 1),
(9, '2023_09_13_114450_create_c_o_u_r_s_e_s_table', 1),
(10, '2023_09_13_114514_create_a_r_c_h_i_v_e_s_table', 1),
(11, '2023_09_13_114542_create_u_s_e_r__a_c_c__e_m_p_s_table', 1),
(12, '2023_09_13_114617_create_e_m_p_l_o_y_e_e_s_table', 1),
(13, '2023_09_17_012211_create_student_accs_table', 1);

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
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_accs`
--

CREATE TABLE `student_accs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `S_ID` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ACCTYPE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_t_u_d_e_n_t_s`
--

CREATE TABLE `s_t_u_d_e_n_t_s` (
  `S_ID` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `C_ID` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_c_c_s`
--

CREATE TABLE `user_c_c_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acctype` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `u_s_e_r__a_c_c__e_m_p_s`
--

CREATE TABLE `u_s_e_r__a_c_c__e_m_p_s` (
  `USER_ID_EMP` bigint(20) UNSIGNED NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `EMP_ID` varchar(255) NOT NULL,
  `ACCTYPE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_r_c_h_i_v_e_s`
--
ALTER TABLE `a_r_c_h_i_v_e_s`
  ADD PRIMARY KEY (`ARCH_ID`);

--
-- Indexes for table `a_u_t_h_o_r_s`
--
ALTER TABLE `a_u_t_h_o_r_s`
  ADD PRIMARY KEY (`AUTHOR_ID`);

--
-- Indexes for table `c_o_u_r_s_e_s`
--
ALTER TABLE `c_o_u_r_s_e_s`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `e_m_p_l_o_y_e_e_s`
--
ALTER TABLE `e_m_p_l_o_y_e_e_s`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_accs`
--
ALTER TABLE `student_accs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_t_u_d_e_n_t_s`
--
ALTER TABLE `s_t_u_d_e_n_t_s`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_c_c_s`
--
ALTER TABLE `user_c_c_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u_s_e_r__a_c_c__e_m_p_s`
--
ALTER TABLE `u_s_e_r__a_c_c__e_m_p_s`
  ADD PRIMARY KEY (`USER_ID_EMP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_u_t_h_o_r_s`
--
ALTER TABLE `a_u_t_h_o_r_s`
  MODIFY `AUTHOR_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_o_u_r_s_e_s`
--
ALTER TABLE `c_o_u_r_s_e_s`
  MODIFY `C_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_accs`
--
ALTER TABLE `student_accs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_c_c_s`
--
ALTER TABLE `user_c_c_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `u_s_e_r__a_c_c__e_m_p_s`
--
ALTER TABLE `u_s_e_r__a_c_c__e_m_p_s`
  MODIFY `USER_ID_EMP` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
