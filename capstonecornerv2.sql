-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 12:49 AM
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
-- Table structure for table `adc_statuses`
--

CREATE TABLE `adc_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adc_stat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advicers`
--

CREATE TABLE `advicers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `EMP_ID` varchar(255) NOT NULL,
  `STAT` varchar(255) NOT NULL,
  `MAX_ADV` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arch_statuses`
--

CREATE TABLE `arch_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `arch_stat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arch_statuses`
--

INSERT INTO `arch_statuses` (`id`, `arch_stat`, `created_at`, `updated_at`) VALUES
(1, 'in Progress', '2024-03-19 10:38:58', '2024-03-19 10:38:58'),
(2, 'Proposal', '2024-03-19 10:38:58', '2024-03-19 10:38:58'),
(3, 'Final Defense', '2024-03-19 10:38:58', '2024-03-19 10:38:58'),
(4, 'Defended', '2024-03-19 10:38:58', '2024-03-19 10:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `a_r_c_h_i_v_e_s`
--

CREATE TABLE `a_r_c_h_i_v_e_s` (
  `ARCH_ID` varchar(255) NOT NULL,
  `ARCH_NAME` varchar(255) NOT NULL,
  `ABSTRACT` text NOT NULL,
  `GITHUB_LINK` varchar(255) NOT NULL,
  `PDF_FILE` varchar(255) NOT NULL,
  `IS_APPROVED` varchar(255) NOT NULL,
  `YEAR_PUB` varchar(255) NOT NULL,
  `viewCount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `a_r_c_h_i_v_e_s`
--

INSERT INTO `a_r_c_h_i_v_e_s` (`ARCH_ID`, `ARCH_NAME`, `ABSTRACT`, `GITHUB_LINK`, `PDF_FILE`, `IS_APPROVED`, `YEAR_PUB`, `viewCount`, `created_at`, `updated_at`) VALUES
('IT-1', 'Online E-Learning System', 'Online E-Learning System', 'hahasfasaha.git', 'Wala tong laman This is from prodution seeder', 'approved', 'JUNE 2018', 0, '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
('IT-10', 'School Events Attendance System', 'School Events Attendance System', 'hahaha.git', 'Wala tong laman This is from prodution seeder', 'approved', 'JUNE 2017', 0, '2024-03-19 10:38:55', '2024-03-19 10:38:55'),
('IT-2', 'POINT OF SALE SYSTEM', 'POINT OF SALE SYSTEM', 'hahaha.git', 'Wala tong laman This is from prodution seeder', 'approved', 'JUNE 2019', 0, '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
('IT-3', 'Online Examination System', 'Online Examination System', 'hahaha.git', 'Wala tong laman This is from prodution seeder', 'approved', 'JUNE 2020', 0, '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
('IT-4', 'Student Tracking Performance', 'Student Tracking Performance', 'hahaha.git', 'Wala tong laman This is from prodution seeder', 'approved', 'JUNE 2021', 0, '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
('IT-5', 'Library Information System', 'Library Information System', 'hahaha.git', 'Wala tong laman This is from prodution seeder', 'approved', 'JUNE 2022', 0, '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
('IT-6', ' Student Information System', 'Student Information System', 'hahaha.git', 'Wala tong laman This is from prodution seeder', 'approved', 'JUNE 2023', 0, '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
('IT-7', 'Student Handbook Application', 'Student Handbook Application', 'hahaha.git', 'Wala tong laman This is from prodution seeder', 'approved', 'JUNE 2023', 0, '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
('IT-8', 'Thesis and Capstone Archiving System', 'Thesis and Capstone Archiving System', 'hahaha.git', 'Wala tong laman This is from prodution seeder', 'approved', 'JUNE 2022', 0, '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
('IT-9', 'School Portal Application', 'School Portal Application', 'hahaha.git', 'Wala tong laman This is from prodution seeder', 'approved', 'JUNE 2023', 0, '2024-03-19 10:38:54', '2024-03-19 10:38:54');

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
-- Table structure for table `child_programs`
--

CREATE TABLE `child_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PARENT_ID` varchar(255) NOT NULL,
  `CHLD_NAME` varchar(255) NOT NULL,
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

--
-- Dumping data for table `c_o_u_r_s_e_s`
--

INSERT INTO `c_o_u_r_s_e_s` (`C_ID`, `C_DESC`, `created_at`, `updated_at`) VALUES
(1, 'BSIT', '2024-03-19 10:38:52', '2024-03-19 10:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `DEPT_NAME` varchar(255) NOT NULL,
  `PROG_ID` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `DEPT_NAME`, `PROG_ID`, `created_at`, `updated_at`) VALUES
(1, 'Bachelor of Elemtary', '1', '2024-03-19 10:38:56', '2024-03-19 10:38:56'),
(2, 'Bachelor of Technology and Livelihood Education', '1', '2024-03-19 10:38:56', '2024-03-19 10:38:56'),
(3, 'BSE major in Filipino', '1', '2024-03-19 10:38:56', '2024-03-19 10:38:56'),
(4, 'BSE major in Social Studies', '1', '2024-03-19 10:38:56', '2024-03-19 10:38:56'),
(5, 'BS in Business Administration', '2', '2024-03-19 10:38:56', '2024-03-19 10:38:56'),
(6, 'BS in Information Technology', '2', '2024-03-19 10:38:56', '2024-03-19 10:38:56'),
(7, 'BS in Hospitality Management', '2', '2024-03-19 10:38:56', '2024-03-19 10:38:56'),
(8, 'BS in Office Administration', '2', '2024-03-19 10:38:56', '2024-03-19 10:38:56'),
(9, 'BS in Agriculture', '3', '2024-03-19 10:38:56', '2024-03-19 10:38:56'),
(10, 'non-teaching', '4', '2024-03-19 10:38:56', '2024-03-19 10:38:56'),
(11, 'BS burat', '3', '2024-03-19 19:23:10', '2024-03-19 19:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `dept_positions`
--

CREATE TABLE `dept_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `POS_NAME` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_m_p_l_o_y_e_e_s`
--

CREATE TABLE `e_m_p_l_o_y_e_e_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `EMP_ID` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMP_DEPT` varchar(255) NOT NULL,
  `ADVICER_STATUS` varchar(255) NOT NULL,
  `POSITION_ID` varchar(255) NOT NULL,
  `PROG_ID` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_m_p_l_o_y_e_e_s`
--

INSERT INTO `e_m_p_l_o_y_e_e_s` (`id`, `EMP_ID`, `NAME`, `EMP_DEPT`, `ADVICER_STATUS`, `POSITION_ID`, `PROG_ID`, `created_at`, `updated_at`) VALUES
(1, 'admin1', 'librarian', '10', 'INACTIVE', '2', '4', '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
(2, 'admin2', 'librarian assistant', '10', 'INACTIVE', '2', '4', '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
(3, 'facultyIT', 'BENSON LESTER A. FLORES', '6', 'ACTIVE', '5', '2', '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
(4, 'facultyIT3', 'NAPOLEON HERMOSO', '6', 'ACTIVE', '5', '2', '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
(5, 'facultyBSHM', 'MILAGROSA M. MALICDEM', '7', 'ACTIVE', '5', '2', '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
(6, 'facultyIT2', 'JOBELLE S. QUINTO', '6', 'ACTIVE', '5', '2', '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
(7, 'subAdmin4', 'Dean of Agri', '10', 'ACTIVE', '3', '3', '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
(8, 'subAdmin3', 'Dean of cet', '10', 'ACTIVE', '3', '1', '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
(9, 'subAdmin2', 'JULIET V. MENOR ', '6', 'INACTIVE', '3', '2', '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
(10, 'subAdmin1', 'Christian Dela Cruz', '6', 'ACTIVE', '4', '2', '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
(11, 'MIS', 'JOSE CARLOS C. GAMBOA', '6', 'INACTIVE', '1', '2', '2024-03-19 10:38:54', '2024-03-19 10:38:54'),
(12, 'librarian', 'Mary Ann M. Pacio', '10', 'INACTIVE', '2', '4', '2024-03-19 17:25:44', '2024-03-19 17:25:44'),
(13, '20-sc-9999', 'GELIL DAVID S. GALANG', '6', 'ACTIVE', '5', '2', '2024-03-19 23:31:57', '2024-03-19 23:31:57');

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `GRP_NAME` varchar(255) NOT NULL,
  `ADVSR_ID` varchar(255) NOT NULL,
  `ARCH_ID` varchar(255) NOT NULL,
  `STATUS_ID` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `GRP_NAME`, `ADVSR_ID`, `ARCH_ID`, `STATUS_ID`, `created_at`, `updated_at`) VALUES
(1, 'Archiving System', 'facultyIT3', 'N/A', '4', '2024-03-19 10:40:50', '2024-03-19 10:44:29'),
(2, 'Enhancing Students Learning: An Object Detection Framework for Android to Support Early Childhood Education', 'subAdmin1', 'N/A', '4', '2024-03-19 11:16:55', '2024-03-19 11:19:01'),
(3, 'Web-App Crime Reporting Management System with Email Notifications for Pnp Basista', 'facultyBSHM', 'N/A', '2', '2024-03-19 11:31:40', '2024-03-19 12:07:45'),
(4, 'Healthcare Management System for City Health Office of San Carlos City', 'facultyBSHM', 'N/A', '3', '2024-03-19 12:08:46', '2024-03-19 12:09:16'),
(5, 'ONLINE GRADUATE EMPLOYABILITY MONITORING AND TRACKING SYSTEM FOR CHMBAC', 'facultyIT', 'N/A', '3', '2024-03-19 12:21:44', '2024-03-19 12:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `letter_models`
--

CREATE TABLE `letter_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `LETTER` longtext NOT NULL,
  `GRP_ID` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  `IS_DONE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MESSAGE` longtext NOT NULL,
  `OP_ID` varchar(255) NOT NULL,
  `COMMENTOR` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `MESSAGE`, `OP_ID`, `COMMENTOR`, `created_at`, `updated_at`) VALUES
(1, 'ok good', '1', 'facultyIT3', '2024-03-19 10:44:36', '2024-03-19 10:44:36'),
(2, 'comment 1', '3', 'subAdmin1', '2024-03-19 11:19:13', '2024-03-19 11:19:13'),
(3, 'Jayson Sanchez has been added by Juna Faye, Casilang Ballesteros', '0', '20-SC-0982', '2024-03-19 12:21:57', '2024-03-19 12:21:57'),
(4, 'Jayson Sanchez has been removed by Juna Faye, Casilang Ballesteros', '0', '20-SC-0982', '2024-03-19 12:22:01', '2024-03-19 12:22:01'),
(5, 'sir ano na po yung recommendation niyo dito??', '6', '20-SC-0982', '2024-03-19 12:23:41', '2024-03-19 12:23:41'),
(6, 'sure na bato??', '8', 'facultyIT', '2024-03-19 12:25:36', '2024-03-19 12:25:36'),
(7, 'wala naman na hehe', '6', 'facultyIT', '2024-03-19 12:25:56', '2024-03-19 12:25:56');

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
(13, '2023_09_17_012211_create_student_accs_table', 1),
(14, '2023_11_08_025117_create_notifs_table', 1),
(15, '2023_12_16_130227_create_groups_table', 1),
(16, '2023_12_27_093153_create_departments_table', 1),
(17, '2023_12_27_093210_create_advicers_table', 1),
(18, '2023_12_27_093233_create_positions_table', 1),
(19, '2023_12_27_093241_create_statuses_table', 1),
(20, '2023_12_28_143536_create_programs_table', 1),
(21, '2024_01_11_122626_create_adc_statuses_table', 1),
(22, '2024_01_11_122639_create_arch_statuses_table', 1),
(23, '2024_01_12_044348_create_child_programs_table', 1),
(24, '2024_02_12_134304_create_dept_positions_table', 1),
(25, '2024_03_10_050352_create_o_p__archives_table', 1),
(26, '2024_03_10_122017_create_messages_table', 1),
(27, '2024_03_16_194504_create_letter_models_table', 1),
(28, '2024_03_17_064301_create_t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s_table', 1),
(29, '2024_03_19_134627_create_views_for_trnds_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifs`
--

CREATE TABLE `notifs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `suspect` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifs`
--

INSERT INTO `notifs` (`id`, `category`, `content`, `suspect`, `created_at`, `updated_at`) VALUES
(1, 'Add', 'Alfred Paris has been updated on Progress Archive: 0 ', 'Alfred Paris', '2024-03-19 10:43:00', '2024-03-19 10:43:00'),
(2, 'Add', 'Danica Dela Cruz has been updated on Progress Archive: 0 ', 'Danica Dela Cruz', '2024-03-19 11:17:39', '2024-03-19 11:17:39'),
(3, 'Add', 'Danica Dela Cruz has been updated on Progress Archive: 1 ', 'Danica Dela Cruz', '2024-03-19 11:17:59', '2024-03-19 11:17:59'),
(4, 'Add', 'ELIZABETH A. GATPO has been updated on Progress Archive: 0 ', 'ELIZABETH A. GATPO', '2024-03-19 11:32:05', '2024-03-19 11:32:05'),
(5, 'Add', 'Erwin Ferrer Nombre has been updated on Progress Archive: 0 ', 'Erwin Ferrer Nombre', '2024-03-19 12:09:09', '2024-03-19 12:09:09'),
(6, 'Add', 'Juna Faye, Casilang Ballesteros has been updated on Progress Archive: 0 ', 'Juna Faye, Casilang Ballesteros', '2024-03-19 12:22:38', '2024-03-19 12:22:38'),
(7, 'Add', 'Juna Faye, Casilang Ballesteros has been updated on Progress Archive: 1 ', 'Juna Faye, Casilang Ballesteros', '2024-03-19 12:23:11', '2024-03-19 12:23:11'),
(8, 'Add', 'BENSON LESTER A. FLORES has been updated on Progress Archive: 2 ', 'BENSON LESTER A. FLORES', '2024-03-19 12:25:18', '2024-03-19 12:25:18'),
(9, 'Add', 'JOSE CARLOS C. GAMBOA has been added this account: librarian a admin', 'JOSE CARLOS C. GAMBOA', '2024-03-19 17:25:44', '2024-03-19 17:25:44'),
(10, 'Update', 'JOSE CARLOS C. GAMBOA has been updated this account: 20-SC-0042 a student ', 'JOSE CARLOS C. GAMBOA', '2024-03-19 18:22:07', '2024-03-19 18:22:07'),
(11, 'Update', 'JOSE CARLOS C. GAMBOA has been updated this account: 20-SC-0042 a student ', 'JOSE CARLOS C. GAMBOA', '2024-03-19 18:23:14', '2024-03-19 18:23:14'),
(12, 'Update', 'JOSE CARLOS C. GAMBOA has been updated this account: 20-SC-0042 a student ', 'JOSE CARLOS C. GAMBOA', '2024-03-19 18:23:26', '2024-03-19 18:23:26'),
(13, 'Add', 'JOSE CARLOS C. GAMBOA has been added this account: 20-sc-9999 a faculty ', 'JOSE CARLOS C. GAMBOA', '2024-03-19 23:31:57', '2024-03-19 23:31:57'),
(14, 'Add', 'JOSE CARLOS C. GAMBOA has been added this account: 20-sc-0048 a student ', 'JOSE CARLOS C. GAMBOA', '2024-03-19 23:48:44', '2024-03-19 23:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `o_p__archives`
--

CREATE TABLE `o_p__archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ARCH_NAME` varchar(255) NOT NULL,
  `UPLOADER` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `GRP_ID` varchar(255) NOT NULL,
  `PDF_FILE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `o_p__archives`
--

INSERT INTO `o_p__archives` (`id`, `ARCH_NAME`, `UPLOADER`, `DESCRIPTION`, `GRP_ID`, `PDF_FILE`, `created_at`, `updated_at`) VALUES
(1, 'Archive Update #1', 'Alfred Paris', 'zsdfgasdfwefsDF', '1', '1710844980_gratn.docx', '2024-03-19 10:43:00', '2024-03-19 10:43:00'),
(2, 'Archive Update #1', 'Danica Dela Cruz', 'test archive 1', '2', '1710847059_frPsycho2.pdf', '2024-03-19 11:17:39', '2024-03-19 11:17:39'),
(3, 'Archive Update #2', 'Danica Dela Cruz', 'test archive 2', '2', '1710847079_forPsycho.pdf', '2024-03-19 11:17:59', '2024-03-19 11:17:59'),
(4, 'Archive Update #1', 'ELIZABETH A. GATPO', 'test decription 1', '3', '1710847925_frederic-delavier-strength-training-anatomy-first-edition.pdf', '2024-03-19 11:32:05', '2024-03-19 11:32:05'),
(5, 'Archive Update #1', 'Erwin Ferrer Nombre', 'description', '4', '1710850148_frederic-delavier-strength-training-anatomy-first-edition (1).pdf', '2024-03-19 12:09:09', '2024-03-19 12:09:09'),
(6, 'Archive Update #1', 'Juna Faye, Casilang Ballesteros', 'description', '5', '1710850958_Screenshot (558).png', '2024-03-19 12:22:38', '2024-03-19 12:22:38'),
(7, 'Archive Update #2', 'Juna Faye, Casilang Ballesteros', 'hehe sorry po', '5', '1710850991_Sir_Au_docs.docx', '2024-03-19 12:23:11', '2024-03-19 12:23:11'),
(8, 'Archive Update #3', 'BENSON LESTER A. FLORES', 'Final hardBound', '5', '1710851118_forPsycho.pdf', '2024-03-19 12:25:18', '2024-03-19 12:25:18');

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
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `POSITION_NAME` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `POSITION_NAME`, `created_at`, `updated_at`) VALUES
(1, 'MIS', '2024-03-19 10:38:58', '2024-03-19 10:38:58'),
(2, 'Library', '2024-03-19 10:38:58', '2024-03-19 10:38:58'),
(3, 'Dean', '2024-03-19 10:38:58', '2024-03-19 10:38:58'),
(4, 'Chairman', '2024-03-19 10:38:58', '2024-03-19 10:38:58'),
(5, 'faculty', '2024-03-19 10:38:58', '2024-03-19 10:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PROG_NAME` varchar(255) NOT NULL,
  `PROG_ABBR` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `PROG_NAME`, `PROG_ABBR`, `created_at`, `updated_at`) VALUES
(1, 'College of Teacher Education', 'CTE', '2024-03-19 10:38:57', '2024-03-19 10:38:57'),
(2, 'College of Hospitality Management, Business Administration and Computing', 'CHMBAC', '2024-03-19 10:38:57', '2024-03-19 10:38:57'),
(3, 'College of Agriculture', 'COA', '2024-03-19 10:38:57', '2024-03-19 19:31:58'),
(4, 'non-teaching', 'non-teaching', '2024-03-19 10:38:57', '2024-03-19 10:38:57');

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
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_stat` varchar(255) NOT NULL,
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

--
-- Dumping data for table `student_accs`
--

INSERT INTO `student_accs` (`id`, `S_ID`, `PASSWORD`, `ACCTYPE`, `created_at`, `updated_at`) VALUES
(1, '20-sc-0147', 'eyJpdiI6InE4K0lnclIrRkhHWU8xaDFCTWN5S1E9PSIsInZhbHVlIjoianR3dSs5end3RFYrdkRSSG9scTZFZz09IiwibWFjIjoiZGZiNTE1MmM4NDEwYTFkY2YyZjlmNDUyNmE3MDY5YWNkNjY3YWM1MDI3ZTc4MDZhMWU5MDFjNmEyNDhjNTkzYSIsInRhZyI6IiJ9', 'student', '2024-03-19 10:38:55', '2024-03-19 10:38:55'),
(2, '20-sc-0148', 'eyJpdiI6IjhteUR1VSsvaXFGNmZiUjRwYXdveFE9PSIsInZhbHVlIjoiZU9xUG9IUWlDYmJNR0NXb09yUnlDdz09IiwibWFjIjoiYzk1NmI1MGZjNmI0ZWFlYWU4ZWI5NmExZmUxNWQxMWNjNWUyYWRhYTI3NGFkYzQwMjA1MTQ4MWM2Y2QxNTNhMyIsInRhZyI6IiJ9', 'student', '2024-03-19 10:38:55', '2024-03-19 10:38:55'),
(3, '20-SC-1358', 'eyJpdiI6IlpJK3FGdmZzMFRPZWlDREJ2VjRKRFE9PSIsInZhbHVlIjoiQk5hZmVFV1RtcmJXVWpYWU4vaXRvQT09IiwibWFjIjoiODJiZmEyOGQxODYxNTM1NWMwNGY3NjhhMzRjOTkxMmEyNjA4ZmNhOWJkOTU3NzE5MWIzMzE3NDE4MzRkNDFlNSIsInRhZyI6IiJ9', 'student', '2024-03-19 10:58:25', '2024-03-19 10:58:25'),
(4, '20-SC-1357', 'eyJpdiI6IjhPOWdyeHp6b0dDa3ErQmtsVWVuQVE9PSIsInZhbHVlIjoiTzhRWEduUEF3NUpkUUNud3FRd0FDQT09IiwibWFjIjoiMTQzNTBkZmE5ODhkOTJmNDY1MDkzNmVmYzFjMmVhMWQ5OWNjYWIzOGNlNmM4NmU2NWQ2ODExZDNjZmRmMmIyOSIsInRhZyI6IiJ9', 'student', '2024-03-19 10:59:17', '2024-03-19 10:59:17'),
(5, '20-SC-1377', 'eyJpdiI6IncvQkxYdEwwQ2x0Z1VOMjVaSExvK1E9PSIsInZhbHVlIjoiUC9GY0VHdkpEcFlGZm9HTVhHVUVCZz09IiwibWFjIjoiNTUzOGQ1NDAxY2E2OWI1ZmQ0MWVhMTExZDMyZDMzMDc5OGJiMDM5YmNlMTA0ZmM3NmNkNzJlYWIwNDM5NTA0OCIsInRhZyI6IiJ9', 'student', '2024-03-19 10:59:47', '2024-03-19 10:59:47'),
(6, '20-SC-0042', 'eyJpdiI6ImtDZ09YMGxUSkhsaXZoZTlwNUU4Z1E9PSIsInZhbHVlIjoiOGVRZmlCWVBCdGRUU1dmOXFNMjFNdz09IiwibWFjIjoiZjcyZWFiNTliZTYyNTdjNGJkMjY3ZmQwMTc5MGVlZjFhZGI3NDllZDVmMjIxZDljYTcyMjI4ZDIzMzBiNDA5NCIsInRhZyI6IiJ9', 'student', '2024-03-19 11:00:48', '2024-03-19 11:00:48'),
(7, '20-SC-1139', 'eyJpdiI6ImpIcVJSUGgzd0IvYUFXY1N1VXFDeFE9PSIsInZhbHVlIjoiN3laZGwra1NNV1grdjhpeVRtRFh3dz09IiwibWFjIjoiY2E1ZmEwZWRiYThiZTNlNzA1NDY1M2M3MzQwMThjOGZlNDJkMWNlYTY3NmFmZWFkZjZiMTgyYjEwOTQ1MTViMyIsInRhZyI6IiJ9', 'student', '2024-03-19 11:02:37', '2024-03-19 11:02:37'),
(8, '20-SC-0982', 'eyJpdiI6IkUvSk1aSEEvdGcwMGo1UU5JaU9YbEE9PSIsInZhbHVlIjoiYkdHNXhIckswQmpEYTc3bGlwUDF4dz09IiwibWFjIjoiMjM0M2Q0MjUyZmE5ODk4NGNkYjFmZGRlZTcxYmQ4ZWRhYmFlM2EzYjM1Y2NkNDI5ODRhYzIwNjkyZmVmYmMzZiIsInRhZyI6IiJ9', 'student', '2024-03-19 11:03:12', '2024-03-19 11:03:12'),
(9, '20-SC-0239', 'eyJpdiI6IlpVTldpL2pybXlWZ2JCOHhpa21BWnc9PSIsInZhbHVlIjoiUWRNbDJ6TnlUYW02aTd3WlRYQ1lsQT09IiwibWFjIjoiMTQyZDczY2UzODdjMWVhMGM5YzVhMmMzNjA3MGRlNDQ2MThjOGYyNTY1MDExNjEzY2ZkMjg2YzQ2ZGNiMWYzYyIsInRhZyI6IiJ9', 'student', '2024-03-19 11:06:27', '2024-03-19 11:06:27'),
(10, '20-SC-1475', 'eyJpdiI6IjdjaFhtcTAvQ2xKaTNteklScUx5SkE9PSIsInZhbHVlIjoiOWRkbXV2Y3ZDMm5iZVlVK3Z2TFNzdz09IiwibWFjIjoiMzhiMDU0MzAxZTMyNmQ4NGIxNTBiNTYyMWFiMjYwZjNhMTE1NWM1MjEzYTNjNTg1NzcwYmQxMDhhOTgyMGUzYSIsInRhZyI6IiJ9', 'student', '2024-03-19 11:07:43', '2024-03-19 11:07:43'),
(11, '20-SC-1467', 'eyJpdiI6Im5TRUVUOTBzWEZ3cTA3SFVuZ3BvaVE9PSIsInZhbHVlIjoiRXdXRXZsMG1YM1BPQmlsQnhDWE9CQT09IiwibWFjIjoiZTczMDZjMTJhMmZlM2RiNWVlNjMzYjAwMmMwZjIwZWI3ZjA4N2FlOWM2N2YxZWVlMzVhZTM3MTUxZTJiMjkyYiIsInRhZyI6IiJ9', 'student', '2024-03-19 11:08:16', '2024-03-19 11:08:16'),
(12, '20-SC-0306', 'eyJpdiI6IkZHWTcyS3BFazJVdnQvbUFMWWs4WHc9PSIsInZhbHVlIjoiWlNjMXlYVUtuY2FGZ1hnbzlCeTlKUT09IiwibWFjIjoiY2U3MDg4YWU4ZTQzNWVmYTA5MjFjODBlYTIwZDgwYzI1NjZiNzhiOWYyZDQ1OTU5YjQzZjIxNGY3ZmUxNWUwYSIsInRhZyI6IiJ9', 'student', '2024-03-19 11:08:53', '2024-03-19 11:08:53'),
(13, '20-SC-0402', 'eyJpdiI6InZwdTVxcUZ2aTczeUYydWZnSWQwNGc9PSIsInZhbHVlIjoia2Z5QnQ5UW1kdjNxNExldk5jQ2t6Zz09IiwibWFjIjoiMmNjMGI5MzQ1Yjc4NGZkYWQ3Yjc2OTAyNzQ2NjkxNDQ5YmZkMWNkOTE0NTJiZTcyZmZkYjFlOGI2YzExZTllOCIsInRhZyI6IiJ9', 'student', '2024-03-19 14:42:21', '2024-03-19 14:42:21'),
(14, '20-sc-0149', 'eyJpdiI6Ikh2ekcrV0RGN2xzaGdNb2RxNEJOSXc9PSIsInZhbHVlIjoiVVpib1Y1MkVMSWZPS2JzNXF0RVRtUT09IiwibWFjIjoiYTYzZDc0ZTU1NzUxMzAwMTNhMDkzZGRjYmUwMmFkNDZhNDIxNTU3MWIxN2MxZjA4YzlmNTI3MDVmODNmMjY3ZCIsInRhZyI6IiJ9', 'student', '2024-03-19 23:33:23', '2024-03-19 23:33:23'),
(15, '20-sc-0048', 'eyJpdiI6InVjenpLdHFuZHpmd29uMDZIU2ZmS0E9PSIsInZhbHVlIjoiUlBaeUNWMVBlcmJtbHNTcXFiWGhSZz09IiwibWFjIjoiZTIzMjc3NDNlNzBmN2I5NWFhYTZjNmUwYTVmZmMyYjA4NjlmM2VmMTM3NjJjZjVlYTg3MmM3NWZhMDJmZDc2MCIsInRhZyI6IiJ9', 'student', '2024-03-19 23:48:44', '2024-03-19 23:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `s_t_u_d_e_n_t_s`
--

CREATE TABLE `s_t_u_d_e_n_t_s` (
  `S_ID` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DEPT_ID` varchar(255) NOT NULL,
  `GROUP_ID` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s_t_u_d_e_n_t_s`
--

INSERT INTO `s_t_u_d_e_n_t_s` (`S_ID`, `NAME`, `DEPT_ID`, `GROUP_ID`, `created_at`, `updated_at`) VALUES
('20-SC-0042', 'Loise Ann, ilaguison Torio', '6', 'N/A', '2024-03-19 11:00:48', '2024-03-19 18:23:26'),
('20-sc-0048', 'Alexander Paris', '8', 'N/A', '2024-03-19 23:48:44', '2024-03-19 23:48:44'),
('20-sc-0147', 'Alfred Paris', '6', '1', '2024-03-19 10:38:56', '2024-03-19 10:40:51'),
('20-sc-0148', 'Jayson Sanchez', '6', 'N/A', '2024-03-19 10:38:56', '2024-03-19 12:22:01'),
('20-SC-0239', 'Mark Angel Molina Garcia', '6', 'N/A', '2024-03-19 11:06:27', '2024-03-19 11:06:27'),
('20-SC-0306', 'Danica Dela Cruz', '6', '2', '2024-03-19 11:08:53', '2024-03-19 11:16:55'),
('20-SC-0402', 'REA VEGO SANTOS', '6', 'N/A', '2024-03-19 14:42:22', '2024-03-19 14:42:22'),
('20-SC-0982', 'Juna Faye, Casilang Ballesteros', '6', '5', '2024-03-19 11:03:12', '2024-03-19 12:21:44'),
('20-SC-1139', 'John Paolo Frias Badiang', '6', 'N/A', '2024-03-19 11:02:37', '2024-03-19 11:02:37'),
('20-SC-1357', 'ARJAY T. FRIAS', '6', 'N/A', '2024-03-19 10:59:17', '2024-03-19 10:59:17'),
('20-SC-1358', 'JEDALYN LLENA DE LOYOLA', '6', 'N/A', '2024-03-19 10:58:25', '2024-03-19 10:58:25'),
('20-SC-1377', 'JOSIELYN PABONDIA', '6', 'N/A', '2024-03-19 10:59:47', '2024-03-19 10:59:47'),
('20-SC-1467', 'ELIZABETH A. GATPO', '6', '3', '2024-03-19 11:08:16', '2024-03-19 11:31:40'),
('20-SC-1475', 'Erwin Ferrer Nombre', '6', '4', '2024-03-19 11:07:43', '2024-03-19 12:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s`
--

CREATE TABLE `t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ARCH_ID` varchar(255) NOT NULL,
  `GROUP_ID` varchar(255) NOT NULL,
  `ADVISER_ID` varchar(255) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `ABS` varchar(255) NOT NULL,
  `DEPT_ID` varchar(255) NOT NULL,
  `DOCU` varchar(255) NOT NULL,
  `ADVS_STAT` varchar(255) NOT NULL,
  `PUB_STAT` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s`
--

INSERT INTO `t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s` (`id`, `ARCH_ID`, `GROUP_ID`, `ADVISER_ID`, `TITLE`, `ABS`, `DEPT_ID`, `DOCU`, `ADVS_STAT`, `PUB_STAT`, `created_at`, `updated_at`) VALUES
(1, 'BSIT1', '1', 'facultyIT3', 'Archiving System for chmbac', 'An archiving system', '6', '1710844980_gratn.docx', '0', '2', '2024-03-19 10:45:00', '2024-03-19 12:27:03'),
(2, 'BSIT2', '2', 'subAdmin1', 'Enhancing Students Learning: An Object Detection Framework for Android to Support Early Childhood Education', 'test sending of archive', '6', '1710847079_forPsycho.pdf', '0', '0', '2024-03-19 11:19:46', '2024-03-19 11:19:46');

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
-- Dumping data for table `u_s_e_r__a_c_c__e_m_p_s`
--

INSERT INTO `u_s_e_r__a_c_c__e_m_p_s` (`USER_ID_EMP`, `PASSWORD`, `EMP_ID`, `ACCTYPE`, `created_at`, `updated_at`) VALUES
(1, 'eyJpdiI6IkszaUlnQmxXbysxKzN1NG4vZmNsQXc9PSIsInZhbHVlIjoiZU9BdWo1MHhnMmxGNFJjTStJWkVIdz09IiwibWFjIjoiNDYzNjAwOTA4ZDYzOWNhN2Q0OWVjYWNkNmQ2OTBiMzBkNTY1YmE0NmY0ZDZmZjQ5OTc4MzIxYjNkZWUwZWY4MCIsInRhZyI6IiJ9', 'admin1', 'admin', '2024-03-19 10:38:53', '2024-03-19 10:38:53'),
(2, 'eyJpdiI6IlVrbUs5UHpGZ3k0RzJCem83Q2ZSTWc9PSIsInZhbHVlIjoiWHplenNPVmt3YTJZU0o0VjVXMUk2Zz09IiwibWFjIjoiN2IzNDUwMWQ4NDlhYzU1ZWMxMWQ5M2JkYTRmNTMxZDNmZDFiYmIwZTQ3NWZkNWEyNzY3NWYzNzMyNjcyZTA1MSIsInRhZyI6IiJ9', 'admin2', 'admin', '2024-03-19 10:38:53', '2024-03-19 10:38:53'),
(3, 'eyJpdiI6IlN2aEwxZERjNFB3ZlBTcmxzWXpOMGc9PSIsInZhbHVlIjoieE5VYW5yNkY4ZmtOZDRRTEdhTFRvUT09IiwibWFjIjoiY2ZiZDhlYjdjMTA5MmFhNWY2MzRlNDFjYTc2YzI1MzI1YmQ4ZmRiNGZiYzc5NzE0YTU0Zjc5ZjY0ZGVmZGQ2ZCIsInRhZyI6IiJ9', 'facultyIT', 'faculty', '2024-03-19 10:38:53', '2024-03-19 10:38:53'),
(4, 'eyJpdiI6ImFqU1BFYndwU2p3NEZrTWVQL0o0ZFE9PSIsInZhbHVlIjoiK3VsZTdBQllmNEJrT0hTYUtTK0Vxdz09IiwibWFjIjoiNjg1NTVjN2UyMzJlYWQ4NWFlNTIwOTZmNjAwMjRlOTJlMjA4YmNlMGQwYjMzZjBhYWVhMDJkYTJkZWIzODhjNSIsInRhZyI6IiJ9', 'facultyIT3', 'faculty', '2024-03-19 10:38:53', '2024-03-19 10:38:53'),
(5, 'eyJpdiI6Im5yNlVJekZMM2hiMDJiTHlEaXZsdXc9PSIsInZhbHVlIjoidnpUcXQ0MENjL29nZWxHOEJTWlg0Zz09IiwibWFjIjoiMGMzOTA2NGRlOGU0NWVhNjcwMDRlZjBhYTIxYWNiNWY4MGQ2OTRjMTcwZWRhNmViYjcxNGExZTdhZjdlMDViOSIsInRhZyI6IiJ9', 'facultyBSHM', 'faculty', '2024-03-19 10:38:53', '2024-03-19 10:38:53'),
(6, 'eyJpdiI6ImtESWs1a21adFRDRU4vbVBTY3JZRFE9PSIsInZhbHVlIjoibnNtTkR1UXNkVktUYzZZT1FrWUlQdz09IiwibWFjIjoiZmQ5OGQzOTY1NTQ4ODVmOTk2YTc3ZDU3NzRhMGJiNGI4Mzg4ODc4MTI0ODE2Y2Y0N2MzOGMzZWU5ZDQzM2QxYyIsInRhZyI6IiJ9', 'facultyIT2', 'faculty', '2024-03-19 10:38:53', '2024-03-19 10:38:53'),
(7, 'eyJpdiI6Ii80UmpNY1g2WTJweERONDFyM2lRRGc9PSIsInZhbHVlIjoicHpRY1BsWDFXUkswc1dhenZ4VXhJQT09IiwibWFjIjoiNGI4YTU5NWNhYmE0MDM0YjY4N2Y2YjAyMGViYmU0ZTQ2ZWVkZTdiNDI1NjYzNzVmNDJlZmNhZGY1MTU4ZTc2NSIsInRhZyI6IiJ9', 'subAdmin4', 'subAdmin', '2024-03-19 10:38:53', '2024-03-19 10:38:53'),
(8, 'eyJpdiI6IlRpaFlvY2RmdjRaQXQ5eFdNS01RalE9PSIsInZhbHVlIjoiN084VHNnNXpnS2NWTk1KMUJwRWtnZz09IiwibWFjIjoiZDU2MTIwNzIwYjE4ZmEwMTI3ZTBmNDllZDEzZWNkNWVhY2U5ZjkzZDllMjkxMjNlYzlhOTJkZjVlMjE2MDA2ZSIsInRhZyI6IiJ9', 'subAdmin3', 'subAdmin', '2024-03-19 10:38:53', '2024-03-19 10:38:53'),
(9, 'eyJpdiI6IlN6ZzN5T1prUWtPL05FUmdkeXZJK2c9PSIsInZhbHVlIjoic1B5b1N6MmxUa3J4Uk5kdVRJeXQwZz09IiwibWFjIjoiNjQ1N2M2OTFmNzM0MDVlOGIwNzlhYmZiM2NkNGUxNmU1NmZjMjVjZDEzODNlZDg4MDgzZGVjYTFiMTFkYWQ0NSIsInRhZyI6IiJ9', 'subAdmin2', 'subAdmin', '2024-03-19 10:38:53', '2024-03-19 10:38:53'),
(10, 'eyJpdiI6InFvMVk4WExiSERTTm1ITkpvZGtjUnc9PSIsInZhbHVlIjoiZWZmb0swTmFxcVNMK2d5aFRUSnppdz09IiwibWFjIjoiZmFmYTE3MTlmZjBhYWIzMjY2MDlkZGYwMzcwMjYzM2Y0NjA0Zjc2Zjg4NTY1NTk0OWQ3NDNmYzNhZWRiMGVmZCIsInRhZyI6IiJ9', 'subAdmin1', 'subAdmin', '2024-03-19 10:38:53', '2024-03-19 10:38:53'),
(11, 'eyJpdiI6IkFBODkxNWt1REdEeHpSU1dTaFl3eEE9PSIsInZhbHVlIjoiZFdlRFQ2NVVvZ2Z4ajh1aVhrUGphQT09IiwibWFjIjoiZDM0OTc1MThiODEwYmZmZDRlMTk5YzM0NjBkYTM3NGVkMGRhNTMzMTIwN2RhODE5NzA4YWViNGQ5ZDM3MTJjOCIsInRhZyI6IiJ9', 'MIS', 'superAdmin', '2024-03-19 10:38:53', '2024-03-19 10:38:53'),
(13, 'eyJpdiI6IlBqajJXYnhhQlVZMG52bGhPZ1U1emc9PSIsInZhbHVlIjoidlVRZ0JWNlBmME44a2lVOHZwU3NxT3dqRS9RRnFZZUVUQi83bDc4WnMrOD0iLCJtYWMiOiI0YzNkODY2ZDUyM2RhZTJlN2QwMGQ5MWRmNzAxYzMxZTBiNzM3MGMwZTE4MzZhNTMwMTZlY2I3OWU3M2M3ODI4IiwidGFnIjoiIn0=', 'librarian', 'admin', '2024-03-19 17:25:44', '2024-03-19 17:25:44'),
(14, 'eyJpdiI6IndZdGJ2SFpYQWFRNy8rU25TZFh5bWc9PSIsInZhbHVlIjoiVlJlWFhiMDdVMkg0Nll5WU96cy9uQT09IiwibWFjIjoiNmY2NzQ5MmYwYmRjMzJjZjBhNzg3YTM2NDM3ZDJiMmYxZjBkZWYyMmMyY2MyNzNiNDRjMjM4MWVkZDBmMWRjNyIsInRhZyI6IiJ9', '20-sc-9999', 'faculty', '2024-03-19 23:31:57', '2024-03-19 23:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `views_for_trnds`
--

CREATE TABLE `views_for_trnds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TRND_ID` varchar(255) NOT NULL,
  `VIEWS` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views_for_trnds`
--

INSERT INTO `views_for_trnds` (`id`, `TRND_ID`, `VIEWS`, `created_at`, `updated_at`) VALUES
(2, '1', '21', '2024-03-19 12:27:03', '2024-03-19 17:13:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adc_statuses`
--
ALTER TABLE `adc_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advicers`
--
ALTER TABLE `advicers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arch_statuses`
--
ALTER TABLE `arch_statuses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `child_programs`
--
ALTER TABLE `child_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_o_u_r_s_e_s`
--
ALTER TABLE `c_o_u_r_s_e_s`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_positions`
--
ALTER TABLE `dept_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_m_p_l_o_y_e_e_s`
--
ALTER TABLE `e_m_p_l_o_y_e_e_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter_models`
--
ALTER TABLE `letter_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifs`
--
ALTER TABLE `notifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `o_p__archives`
--
ALTER TABLE `o_p__archives`
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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
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
-- Indexes for table `t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s`
--
ALTER TABLE `t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `views_for_trnds`
--
ALTER TABLE `views_for_trnds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adc_statuses`
--
ALTER TABLE `adc_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advicers`
--
ALTER TABLE `advicers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arch_statuses`
--
ALTER TABLE `arch_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `a_u_t_h_o_r_s`
--
ALTER TABLE `a_u_t_h_o_r_s`
  MODIFY `AUTHOR_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `child_programs`
--
ALTER TABLE `child_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_o_u_r_s_e_s`
--
ALTER TABLE `c_o_u_r_s_e_s`
  MODIFY `C_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dept_positions`
--
ALTER TABLE `dept_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_m_p_l_o_y_e_e_s`
--
ALTER TABLE `e_m_p_l_o_y_e_e_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `letter_models`
--
ALTER TABLE `letter_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notifs`
--
ALTER TABLE `notifs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `o_p__archives`
--
ALTER TABLE `o_p__archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_accs`
--
ALTER TABLE `student_accs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s`
--
ALTER TABLE `t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `USER_ID_EMP` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `views_for_trnds`
--
ALTER TABLE `views_for_trnds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
