-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 03:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `grade_id`, `classroom_id`, `section_id`, `teacher_id`, `attendance_date`, `attendance_status`, `created_at`, `updated_at`) VALUES
(15, 1, 1, 1, 1, 1, '2021-07-30', 0, '2021-07-31 19:45:28', '2021-07-31 19:45:28'),
(16, 5, 1, 1, 1, 1, '2021-07-30', 0, '2021-07-31 19:45:28', '2021-07-31 19:47:14'),
(17, 1, 1, 1, 1, 1, '2021-07-31', 1, '2021-07-31 19:46:47', '2021-07-31 19:46:47'),
(18, 5, 1, 1, 1, 1, '2021-07-31', 0, '2021-07-31 19:46:47', '2021-07-31 20:03:44'),
(19, 3, 2, 5, 3, 1, '2021-07-31', 1, '2021-07-31 20:00:38', '2021-07-31 20:00:38'),
(20, 6, 2, 5, 3, 1, '2021-07-31', 1, '2021-07-31 20:00:38', '2021-07-31 20:00:58'),
(23, 5, 1, 1, 1, 1, '2021-08-01', 1, '2021-08-01 16:30:54', '2021-08-01 17:24:14'),
(24, 1, 1, 1, 1, 1, '2021-08-01', 0, '2021-08-01 16:35:57', '2021-08-01 17:24:24'),
(25, 3, 2, 5, 3, 1, '2021-08-01', 0, '2021-08-01 17:50:32', '2021-08-01 17:50:59'),
(26, 6, 2, 5, 3, 1, '2021-08-01', 1, '2021-08-01 17:51:18', '2021-08-01 17:51:18'),
(27, 1, 1, 1, 1, 1, '2021-08-03', 1, '2021-08-03 17:53:10', '2021-08-03 17:53:10'),
(28, 5, 1, 1, 1, 1, '2021-08-03', 1, '2021-08-03 17:53:10', '2021-08-03 17:53:10'),
(29, 1, 1, 1, 1, 1, '2021-08-05', 0, '2021-08-05 15:55:22', '2021-08-05 15:55:22'),
(30, 5, 1, 1, 1, 1, '2021-08-05', 1, '2021-08-05 15:55:22', '2021-08-05 15:55:22'),
(31, 1, 1, 1, 1, 1, '2021-08-07', 0, '2021-08-07 10:29:09', '2021-08-07 10:29:40'),
(32, 5, 1, 1, 1, 1, '2021-08-07', 1, '2021-08-07 10:29:09', '2021-08-07 10:29:09'),
(33, 1, 1, 1, 1, 1, '2021-08-15', 0, '2021-08-15 15:45:58', '2021-08-15 15:45:58'),
(34, 5, 1, 1, 1, 1, '2021-08-15', 0, '2021-08-15 15:45:58', '2021-08-15 15:45:58'),
(35, 1, 1, 1, 1, 1, '2021-10-25', 1, '2021-10-25 11:46:31', '2021-10-25 11:46:31'),
(36, 5, 1, 1, 1, 1, '2021-10-25', 0, '2021-10-25 11:46:31', '2021-10-25 11:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name_Class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Grade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `Name_Class`, `Grade_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"first class\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0627\\u0648\\u0644\"}', 1, '2021-07-15 13:08:45', '2021-07-15 13:08:45'),
(2, '{\"en\":\"second class\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\"}', 1, '2021-07-15 13:08:45', '2021-07-15 13:08:45'),
(3, '{\"en\":\"third class\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062b\\u0627\\u0644\\u062b\"}', 1, '2021-07-15 13:08:45', '2021-07-15 13:08:45'),
(4, '{\"en\":\"forth class\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0631\\u0627\\u0628\\u0639\"}', 2, '2021-07-15 13:09:38', '2021-07-15 13:09:38'),
(5, '{\"en\":\"dd\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062e\\u0627\\u0645\\u0633\"}', 2, '2021-07-15 13:09:38', '2021-07-15 13:09:38'),
(6, '{\"en\":\"ssss\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0633\\u0627\\u062f\\u0633\"}', 2, '2021-07-15 13:09:38', '2021-07-15 13:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `created_at`, `updated_at`) VALUES
(1, 'ddd', '2021-12-09T00:00:00+02:00', '2021-12-12 16:09:06', '2021-12-12 16:09:18'),
(2, 'hghg', '2021-12-15T00:00:00+02:00', '2021-12-12 16:10:00', '2021-12-12 16:12:53'),
(3, 'gggg', '2021-12-14T22:00:00.000Z', '2021-12-12 16:12:59', '2021-12-12 16:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` tinyint(4) NOT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `term`, `academic_year`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Arabic exam\",\"ar\":\"\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646 \\u0627\\u0644\\u0644\\u063a\\u0629 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629\"}', 1, '2021', '2021-08-05 15:18:17', '2021-08-05 15:46:32'),
(3, '{\"en\":\"English Exam\",\"ar\":\"\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646 \\u0627\\u0644\\u0644\\u063a\\u0629 \\u0627\\u0644\\u0627\\u0646\\u062c\\u0644\\u064a\\u0632\\u064a\\u0629\"}', 1, '2021', '2021-08-05 15:47:11', '2021-08-05 15:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `Grade_id` bigint(20) UNSIGNED NOT NULL,
  `Classroom_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fees_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `title`, `amount`, `Grade_id`, `Classroom_id`, `description`, `year`, `Fees_type`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"studey fees\",\"ar\":\"\\u0631\\u0633\\u0648\\u0645 \\u062f\\u0631\\u0627\\u0633\\u064a\\u0629\"}', '10000.00', 1, 1, 'لا يوجد', '2021', 1, '2021-07-15 14:22:25', '2021-07-15 14:22:25'),
(2, '{\"en\":\"bus fees\",\"ar\":\"\\u0631\\u0633\\u0648\\u0645 \\u0628\\u0627\\u0635\"}', '2500.00', 1, 1, 'لا يوجد', '2021', 2, '2021-07-15 14:24:22', '2021-07-15 14:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `fees_invoices`
--

CREATE TABLE `fees_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `Grade_id` bigint(20) UNSIGNED NOT NULL,
  `Classroom_id` bigint(20) UNSIGNED NOT NULL,
  `fees_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_invoices`
--

INSERT INTO `fees_invoices` (`id`, `invoice_date`, `student_id`, `Grade_id`, `Classroom_id`, `fees_id`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, '2021-07-15', 1, 1, 1, 1, '10000.00', 'رسوم دراسية للفصلين', '2021-07-15 14:23:13', '2021-07-15 14:23:13'),
(2, '2021-07-15', 1, 1, 1, 2, '2500.00', 'رسوم الباص', '2021-07-15 14:24:49', '2021-07-15 14:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `fund_accounts`
--

CREATE TABLE `fund_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `receipt_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Debit` decimal(8,2) DEFAULT NULL,
  `credit` decimal(8,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fund_accounts`
--

INSERT INTO `fund_accounts` (`id`, `date`, `receipt_id`, `payment_id`, `Debit`, `credit`, `description`, `created_at`, `updated_at`) VALUES
(1, '2021-07-15', 1, NULL, '6500.00', '0.00', 'دفعة من الرسوم الدراسية ورسوم الباص', '2021-07-15 14:26:12', '2021-07-15 14:27:38'),
(3, '2021-07-15', NULL, 2, '0.00', '1500.00', 'ارجاع المبلغ المدفوع لرسوم الباص لعدم الرغبة', '2021-07-15 15:22:14', '2021-07-15 15:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `Name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Male\",\"ar\":\"\\u0630\\u0643\\u0631\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(2, '{\"en\":\"Female\",\"ar\":\"\\u0627\\u0646\\u062b\\u0649\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `Name`, `Note`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"first stage\",\"ar\":\"\\u0627\\u0644\\u0645\\u0631\\u062d\\u0644\\u0629 \\u0627\\u0644\\u0627\\u0639\\u062f\\u0627\\u062f\\u064a\\u0629\"}', 'لا يوجد', '2021-07-15 13:07:23', '2021-07-15 13:07:23'),
(2, '{\"en\":\"Hight stage\",\"ar\":\"\\u0627\\u0644\\u0645\\u0631\\u062d\\u0644\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u0648\\u064a\\u0629\"}', NULL, '2021-07-15 13:07:51', '2021-07-15 13:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, 'Amg.jpg', 1, 'App\\Models\\MyParent', '2021-07-15 13:17:23', '2021-07-15 13:17:23');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_01_23_181414_create_Classrooms_table', 1),
(4, '2021_05_30_165802_create_grades_table', 1),
(5, '2021_06_05_114008_create_sections_table', 1),
(6, '2021_06_05_174451_create_type_bloods_table', 1),
(7, '2021_06_05_180023_create_nationalities_table', 1),
(8, '2021_06_05_181957_create_religions_table', 1),
(9, '2021_06_06_175448_create_my_parents_table', 1),
(10, '2021_06_10_112750_create_teachers_table', 1),
(11, '2021_06_10_114015_create_genders_table', 1),
(12, '2021_06_10_114115_create_specializations_table', 1),
(13, '2021_06_14_155234_create_teacher_section_table', 1),
(14, '2021_06_19_171319_create_students_table', 1),
(15, '2021_06_20_181424_create_foreign_keys', 1),
(16, '2021_06_21_112417_create_images_table', 1),
(17, '2021_06_22_111122_create_promotions_table', 1),
(18, '2021_06_24_133922_create_fees_table', 1),
(19, '2021_06_24_134238_create_fees_invoices_table', 1),
(20, '2021_06_24_134333_create_receipt_students_table', 1),
(21, '2021_07_014_153455_create_processing_fees_table', 1),
(22, '2021_07_15_150940_create_payment_students_table', 1),
(23, '2021_07_15_175124_create_fund_accounts_table', 1),
(24, '2021_07_16_160144_create_student_financial_accounts_table', 2),
(25, '2021_07_22_133741_create_attendances_table', 3),
(26, '2021_07_31_203839_create_subjects_table', 4),
(27, '2021_08_05_170103_create_exams_table', 5),
(28, '2021_08_15_142714_create_quizzes_table', 6),
(29, '2021_08_26_131033_create_questions_table', 7),
(30, '2021_10_25_150354_create_online_classes_table', 8),
(31, '2021_11_14_183636_create_settings_table', 9),
(32, '2021_12_12_164534_create_events_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `my_parents`
--

CREATE TABLE `my_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name_Father` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `National_ID_Father` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Passport_ID_Father` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone_Father` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Job_Father` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality_Father_id` bigint(20) UNSIGNED NOT NULL,
  `Blood_Type_Father_id` bigint(20) UNSIGNED NOT NULL,
  `Religion_Father_id` bigint(20) UNSIGNED NOT NULL,
  `Address_Father` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name_Mother` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `National_ID_Mother` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Passport_ID_Mother` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone_Mother` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Job_Mother` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality_Mother_id` bigint(20) UNSIGNED NOT NULL,
  `Blood_Type_Mother_id` bigint(20) UNSIGNED NOT NULL,
  `Religion_Mother_id` bigint(20) UNSIGNED NOT NULL,
  `Address_Mother` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_parents`
--

INSERT INTO `my_parents` (`id`, `email`, `password`, `Name_Father`, `National_ID_Father`, `Passport_ID_Father`, `Phone_Father`, `Job_Father`, `Nationality_Father_id`, `Blood_Type_Father_id`, `Religion_Father_id`, `Address_Father`, `Name_Mother`, `National_ID_Mother`, `Passport_ID_Mother`, `Phone_Mother`, `Job_Mother`, `Nationality_Mother_id`, `Blood_Type_Mother_id`, `Religion_Mother_id`, `Address_Mother`, `created_at`, `updated_at`) VALUES
(1, 'Nedal@gmail.com', '$2y$10$frKTeqqe2mJO6OJqg2GcCuGUYaRYoPhbwhjzHudIAbvKYePzceAUu', '{\"en\":\"nedal\",\"ar\":\"\\u0646\\u0636\\u0627\\u0644\"}', '7896541230', '7896541230', '7896541230', '{\"en\":\"major\",\"ar\":\"\\u0639\\u0633\\u0643\\u0631\\u064a\"}', 19, 8, 1, 'ccccc', '{\"en\":\"Radiy\",\"ar\":\"\\u0631\\u0636\\u064a\\u0629\"}', '1236547890', '1236547890', '1236547890', '{\"en\":\"teacher\",\"ar\":\"\\u0645\\u0639\\u0644\\u0645\\u0629\"}', 192, 4, 1, 'ssss', '2021-07-15 13:17:23', '2021-12-12 10:07:45'),
(2, 'mazen@gmail.com', '$2y$10$eaO5rsHobYWznj1DhlhyiuGL0i6yu8bDcHasOumKX3KXbqum3IPoa', '{\"en\":\"mazen\",\"ar\":\"\\u0645\\u0627\\u0632\\u0646\"}', '7898527410', '7898527410', '7898527410', '{\"en\":\"Teacher\",\"ar\":\"\\u0645\\u0639\\u0644\\u0645\"}', 6, 4, 2, 'jdjd', '{\"en\":\"marea\",\"ar\":\"\\u0645\\u0627\\u0631\\u064a\\u0627\"}', '2589637410', '2589637410', '2589637410', '{\"en\":\"manager\",\"ar\":\"\\u0645\\u062f\\u064a\\u0631\\u0629 \\u0639\\u0644\\u0627\\u0642\\u0627\\u062a \\u0639\\u0627\\u0645\\u0629\"}', 60, 3, 2, 'ddd', '2021-08-19 14:05:12', '2021-08-19 14:05:12'),
(3, 'mohammad@gmail.com', '$2y$10$/Bcrd0ELthPzgfN6eZ5cW.jjs5KbU2xHEI56Ug30t3l33rdbuPL3u', '{\"en\":\"mohammad\",\"ar\":\"\\u0645\\u062d\\u0645\\u062f\"}', '1234569871', '1234569871', '1234569871', '{\"en\":\"no job\",\"ar\":\"no job\"}', 17, 5, 2, 'd', '{\"en\":\"fatema\",\"ar\":\"\\u0641\\u0627\\u0637\\u0645\\u0629\"}', '5469772355', '5469772355', '5469772355', '{\"en\":\"no\",\"ar\":\"no\"}', 17, 2, 1, 'gfg', '2021-12-12 10:39:55', '2021-12-12 10:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `Name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Afghan\",\"ar\":\"\\u0623\\u0641\\u063a\\u0627\\u0646\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(2, '{\"en\":\"Albanian\",\"ar\":\"\\u0623\\u0644\\u0628\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(3, '{\"en\":\"Aland Islander\",\"ar\":\"\\u0622\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(4, '{\"en\":\"Algerian\",\"ar\":\"\\u062c\\u0632\\u0627\\u0626\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(5, '{\"en\":\"American Samoan\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a \\u0633\\u0627\\u0645\\u0648\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(6, '{\"en\":\"Andorran\",\"ar\":\"\\u0623\\u0646\\u062f\\u0648\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(7, '{\"en\":\"Angolan\",\"ar\":\"\\u0623\\u0646\\u0642\\u0648\\u0644\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(8, '{\"en\":\"Anguillan\",\"ar\":\"\\u0623\\u0646\\u063a\\u0648\\u064a\\u0644\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(9, '{\"en\":\"Antarctican\",\"ar\":\"\\u0623\\u0646\\u062a\\u0627\\u0631\\u0643\\u062a\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(10, '{\"en\":\"Antiguan\",\"ar\":\"\\u0628\\u0631\\u0628\\u0648\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(11, '{\"en\":\"Argentinian\",\"ar\":\"\\u0623\\u0631\\u062c\\u0646\\u062a\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(12, '{\"en\":\"Armenian\",\"ar\":\"\\u0623\\u0631\\u0645\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(13, '{\"en\":\"Aruban\",\"ar\":\"\\u0623\\u0648\\u0631\\u0648\\u0628\\u0647\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(14, '{\"en\":\"Australian\",\"ar\":\"\\u0623\\u0633\\u062a\\u0631\\u0627\\u0644\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(15, '{\"en\":\"Austrian\",\"ar\":\"\\u0646\\u0645\\u0633\\u0627\\u0648\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(16, '{\"en\":\"Azerbaijani\",\"ar\":\"\\u0623\\u0630\\u0631\\u0628\\u064a\\u062c\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(17, '{\"en\":\"Bahamian\",\"ar\":\"\\u0628\\u0627\\u0647\\u0627\\u0645\\u064a\\u0633\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(18, '{\"en\":\"Bahraini\",\"ar\":\"\\u0628\\u062d\\u0631\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(19, '{\"en\":\"Bangladeshi\",\"ar\":\"\\u0628\\u0646\\u063a\\u0644\\u0627\\u062f\\u064a\\u0634\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(20, '{\"en\":\"Barbadian\",\"ar\":\"\\u0628\\u0631\\u0628\\u0627\\u062f\\u0648\\u0633\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(21, '{\"en\":\"Belarusian\",\"ar\":\"\\u0631\\u0648\\u0633\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(22, '{\"en\":\"Belgian\",\"ar\":\"\\u0628\\u0644\\u062c\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(23, '{\"en\":\"Belizean\",\"ar\":\"\\u0628\\u064a\\u0644\\u064a\\u0632\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(24, '{\"en\":\"Beninese\",\"ar\":\"\\u0628\\u0646\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(25, '{\"en\":\"Saint Barthelmian\",\"ar\":\"\\u0633\\u0627\\u0646 \\u0628\\u0627\\u0631\\u062a\\u064a\\u0644\\u0645\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(26, '{\"en\":\"Bermudan\",\"ar\":\"\\u0628\\u0631\\u0645\\u0648\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(27, '{\"en\":\"Bhutanese\",\"ar\":\"\\u0628\\u0648\\u062a\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(28, '{\"en\":\"Bolivian\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0641\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(29, '{\"en\":\"Bosnian \\/ Herzegovinian\",\"ar\":\"\\u0628\\u0648\\u0633\\u0646\\u064a\\/\\u0647\\u0631\\u0633\\u0643\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(30, '{\"en\":\"Botswanan\",\"ar\":\"\\u0628\\u0648\\u062a\\u0633\\u0648\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(31, '{\"en\":\"Bouvetian\",\"ar\":\"\\u0628\\u0648\\u0641\\u064a\\u0647\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(32, '{\"en\":\"Brazilian\",\"ar\":\"\\u0628\\u0631\\u0627\\u0632\\u064a\\u0644\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(33, '{\"en\":\"British Indian Ocean Territory\",\"ar\":\"\\u0625\\u0642\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0645\\u062d\\u064a\\u0637 \\u0627\\u0644\\u0647\\u0646\\u062f\\u064a \\u0627\\u0644\\u0628\\u0631\\u064a\\u0637\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(34, '{\"en\":\"Bruneian\",\"ar\":\"\\u0628\\u0631\\u0648\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(35, '{\"en\":\"Bulgarian\",\"ar\":\"\\u0628\\u0644\\u063a\\u0627\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(36, '{\"en\":\"Burkinabe\",\"ar\":\"\\u0628\\u0648\\u0631\\u0643\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(37, '{\"en\":\"Burundian\",\"ar\":\"\\u0628\\u0648\\u0631\\u0648\\u0646\\u064a\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(38, '{\"en\":\"Cambodian\",\"ar\":\"\\u0643\\u0645\\u0628\\u0648\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(39, '{\"en\":\"Cameroonian\",\"ar\":\"\\u0643\\u0627\\u0645\\u064a\\u0631\\u0648\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(40, '{\"en\":\"Canadian\",\"ar\":\"\\u0643\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(41, '{\"en\":\"Cape Verdean\",\"ar\":\"\\u0627\\u0644\\u0631\\u0623\\u0633 \\u0627\\u0644\\u0623\\u062e\\u0636\\u0631\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(42, '{\"en\":\"Caymanian\",\"ar\":\"\\u0643\\u0627\\u064a\\u0645\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(43, '{\"en\":\"Central African\",\"ar\":\"\\u0623\\u0641\\u0631\\u064a\\u0642\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(44, '{\"en\":\"Chadian\",\"ar\":\"\\u062a\\u0634\\u0627\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(45, '{\"en\":\"Chilean\",\"ar\":\"\\u0634\\u064a\\u0644\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(46, '{\"en\":\"Chinese\",\"ar\":\"\\u0635\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(47, '{\"en\":\"Christmas Islander\",\"ar\":\"\\u062c\\u0632\\u064a\\u0631\\u0629 \\u0639\\u064a\\u062f \\u0627\\u0644\\u0645\\u064a\\u0644\\u0627\\u062f\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(48, '{\"en\":\"Cocos Islander\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0643\\u0648\\u0643\\u0648\\u0633\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(49, '{\"en\":\"Colombian\",\"ar\":\"\\u0643\\u0648\\u0644\\u0648\\u0645\\u0628\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(50, '{\"en\":\"Comorian\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0627\\u0644\\u0642\\u0645\\u0631\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(51, '{\"en\":\"Congolese\",\"ar\":\"\\u0643\\u0648\\u0646\\u063a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(52, '{\"en\":\"Cook Islander\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0643\\u0648\\u0643\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(53, '{\"en\":\"Costa Rican\",\"ar\":\"\\u0643\\u0648\\u0633\\u062a\\u0627\\u0631\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(54, '{\"en\":\"Croatian\",\"ar\":\"\\u0643\\u0648\\u0631\\u0627\\u062a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(55, '{\"en\":\"Cuban\",\"ar\":\"\\u0643\\u0648\\u0628\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(56, '{\"en\":\"Cypriot\",\"ar\":\"\\u0642\\u0628\\u0631\\u0635\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(57, '{\"en\":\"Curacian\",\"ar\":\"\\u0643\\u0648\\u0631\\u0627\\u0633\\u0627\\u0648\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(58, '{\"en\":\"Czech\",\"ar\":\"\\u062a\\u0634\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(59, '{\"en\":\"Danish\",\"ar\":\"\\u062f\\u0646\\u0645\\u0627\\u0631\\u0643\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(60, '{\"en\":\"Djiboutian\",\"ar\":\"\\u062c\\u064a\\u0628\\u0648\\u062a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(61, '{\"en\":\"Dominican\",\"ar\":\"\\u062f\\u0648\\u0645\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(62, '{\"en\":\"Dominican\",\"ar\":\"\\u062f\\u0648\\u0645\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(63, '{\"en\":\"Ecuadorian\",\"ar\":\"\\u0625\\u0643\\u0648\\u0627\\u062f\\u0648\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(64, '{\"en\":\"Egyptian\",\"ar\":\"\\u0645\\u0635\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(65, '{\"en\":\"Salvadoran\",\"ar\":\"\\u0633\\u0644\\u0641\\u0627\\u062f\\u0648\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(66, '{\"en\":\"Equatorial Guinean\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(67, '{\"en\":\"Eritrean\",\"ar\":\"\\u0625\\u0631\\u064a\\u062a\\u064a\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(68, '{\"en\":\"Estonian\",\"ar\":\"\\u0627\\u0633\\u062a\\u0648\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(69, '{\"en\":\"Ethiopian\",\"ar\":\"\\u0623\\u062b\\u064a\\u0648\\u0628\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(70, '{\"en\":\"Falkland Islander\",\"ar\":\"\\u0641\\u0648\\u0643\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(71, '{\"en\":\"Faroese\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0641\\u0627\\u0631\\u0648\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(72, '{\"en\":\"Fijian\",\"ar\":\"\\u0641\\u064a\\u062c\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(73, '{\"en\":\"Finnish\",\"ar\":\"\\u0641\\u0646\\u0644\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(74, '{\"en\":\"French\",\"ar\":\"\\u0641\\u0631\\u0646\\u0633\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(75, '{\"en\":\"French Guianese\",\"ar\":\"\\u063a\\u0648\\u064a\\u0627\\u0646\\u0627 \\u0627\\u0644\\u0641\\u0631\\u0646\\u0633\\u064a\\u0629\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(76, '{\"en\":\"French Polynesian\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0646\\u064a\\u0632\\u064a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(77, '{\"en\":\"French\",\"ar\":\"\\u0623\\u0631\\u0627\\u0636 \\u0641\\u0631\\u0646\\u0633\\u064a\\u0629 \\u062c\\u0646\\u0648\\u0628\\u064a\\u0629 \\u0648\\u0623\\u0646\\u062a\\u0627\\u0631\\u062a\\u064a\\u0643\\u064a\\u0629\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(78, '{\"en\":\"Gabonese\",\"ar\":\"\\u063a\\u0627\\u0628\\u0648\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(79, '{\"en\":\"Gambian\",\"ar\":\"\\u063a\\u0627\\u0645\\u0628\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(80, '{\"en\":\"Georgian\",\"ar\":\"\\u062c\\u064a\\u0648\\u0631\\u062c\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(81, '{\"en\":\"German\",\"ar\":\"\\u0623\\u0644\\u0645\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(82, '{\"en\":\"Ghanaian\",\"ar\":\"\\u063a\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(83, '{\"en\":\"Gibraltar\",\"ar\":\"\\u062c\\u0628\\u0644 \\u0637\\u0627\\u0631\\u0642\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(84, '{\"en\":\"Guernsian\",\"ar\":\"\\u063a\\u064a\\u0631\\u0646\\u0632\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(85, '{\"en\":\"Greek\",\"ar\":\"\\u064a\\u0648\\u0646\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(86, '{\"en\":\"Greenlandic\",\"ar\":\"\\u062c\\u0631\\u064a\\u0646\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(87, '{\"en\":\"Grenadian\",\"ar\":\"\\u063a\\u0631\\u064a\\u0646\\u0627\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(88, '{\"en\":\"Guadeloupe\",\"ar\":\"\\u062c\\u0632\\u0631 \\u062c\\u0648\\u0627\\u062f\\u0644\\u0648\\u0628\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(89, '{\"en\":\"Guamanian\",\"ar\":\"\\u062c\\u0648\\u0627\\u0645\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(90, '{\"en\":\"Guatemalan\",\"ar\":\"\\u063a\\u0648\\u0627\\u062a\\u064a\\u0645\\u0627\\u0644\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(91, '{\"en\":\"Guinean\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(92, '{\"en\":\"Guinea-Bissauan\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(93, '{\"en\":\"Guyanese\",\"ar\":\"\\u063a\\u064a\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(94, '{\"en\":\"Haitian\",\"ar\":\"\\u0647\\u0627\\u064a\\u062a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(95, '{\"en\":\"Heard and Mc Donald Islanders\",\"ar\":\"\\u062c\\u0632\\u064a\\u0631\\u0629 \\u0647\\u064a\\u0631\\u062f \\u0648\\u062c\\u0632\\u0631 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(96, '{\"en\":\"Honduran\",\"ar\":\"\\u0647\\u0646\\u062f\\u0648\\u0631\\u0627\\u0633\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(97, '{\"en\":\"Hongkongese\",\"ar\":\"\\u0647\\u0648\\u0646\\u063a \\u0643\\u0648\\u0646\\u063a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(98, '{\"en\":\"Hungarian\",\"ar\":\"\\u0645\\u062c\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(99, '{\"en\":\"Icelandic\",\"ar\":\"\\u0622\\u064a\\u0633\\u0644\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(100, '{\"en\":\"Indian\",\"ar\":\"\\u0647\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(101, '{\"en\":\"Manx\",\"ar\":\"\\u0645\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(102, '{\"en\":\"Indonesian\",\"ar\":\"\\u0623\\u0646\\u062f\\u0648\\u0646\\u064a\\u0633\\u064a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(103, '{\"en\":\"Iranian\",\"ar\":\"\\u0625\\u064a\\u0631\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(104, '{\"en\":\"Iraqi\",\"ar\":\"\\u0639\\u0631\\u0627\\u0642\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(105, '{\"en\":\"Irish\",\"ar\":\"\\u0625\\u064a\\u0631\\u0644\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(106, '{\"en\":\"Italian\",\"ar\":\"\\u0625\\u064a\\u0637\\u0627\\u0644\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(107, '{\"en\":\"Ivory Coastian\",\"ar\":\"\\u0633\\u0627\\u062d\\u0644 \\u0627\\u0644\\u0639\\u0627\\u062c\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(108, '{\"en\":\"Jersian\",\"ar\":\"\\u062c\\u064a\\u0631\\u0632\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(109, '{\"en\":\"Jamaican\",\"ar\":\"\\u062c\\u0645\\u0627\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(110, '{\"en\":\"Japanese\",\"ar\":\"\\u064a\\u0627\\u0628\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(111, '{\"en\":\"Jordanian\",\"ar\":\"\\u0623\\u0631\\u062f\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(112, '{\"en\":\"Kazakh\",\"ar\":\"\\u0643\\u0627\\u0632\\u0627\\u062e\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(113, '{\"en\":\"Kenyan\",\"ar\":\"\\u0643\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(114, '{\"en\":\"I-Kiribati\",\"ar\":\"\\u0643\\u064a\\u0631\\u064a\\u0628\\u0627\\u062a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(115, '{\"en\":\"North Korean\",\"ar\":\"\\u0643\\u0648\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(116, '{\"en\":\"South Korean\",\"ar\":\"\\u0643\\u0648\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(117, '{\"en\":\"Kosovar\",\"ar\":\"\\u0643\\u0648\\u0633\\u064a\\u0641\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(118, '{\"en\":\"Kuwaiti\",\"ar\":\"\\u0643\\u0648\\u064a\\u062a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(119, '{\"en\":\"Kyrgyzstani\",\"ar\":\"\\u0642\\u064a\\u0631\\u063a\\u064a\\u0632\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(120, '{\"en\":\"Laotian\",\"ar\":\"\\u0644\\u0627\\u0648\\u0633\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(121, '{\"en\":\"Latvian\",\"ar\":\"\\u0644\\u0627\\u062a\\u064a\\u0641\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(122, '{\"en\":\"Lebanese\",\"ar\":\"\\u0644\\u0628\\u0646\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(123, '{\"en\":\"Basotho\",\"ar\":\"\\u0644\\u064a\\u0648\\u0633\\u064a\\u062a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(124, '{\"en\":\"Liberian\",\"ar\":\"\\u0644\\u064a\\u0628\\u064a\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(125, '{\"en\":\"Libyan\",\"ar\":\"\\u0644\\u064a\\u0628\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(126, '{\"en\":\"Liechtenstein\",\"ar\":\"\\u0644\\u064a\\u062e\\u062a\\u0646\\u0634\\u062a\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(127, '{\"en\":\"Lithuanian\",\"ar\":\"\\u0644\\u062a\\u0648\\u0627\\u0646\\u064a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(128, '{\"en\":\"Luxembourger\",\"ar\":\"\\u0644\\u0648\\u0643\\u0633\\u0645\\u0628\\u0648\\u0631\\u063a\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(129, '{\"en\":\"Sri Lankian\",\"ar\":\"\\u0633\\u0631\\u064a\\u0644\\u0627\\u0646\\u0643\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(130, '{\"en\":\"Macanese\",\"ar\":\"\\u0645\\u0627\\u0643\\u0627\\u0648\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(131, '{\"en\":\"Macedonian\",\"ar\":\"\\u0645\\u0642\\u062f\\u0648\\u0646\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(132, '{\"en\":\"Malagasy\",\"ar\":\"\\u0645\\u062f\\u063a\\u0634\\u0642\\u0631\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(133, '{\"en\":\"Malawian\",\"ar\":\"\\u0645\\u0627\\u0644\\u0627\\u0648\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(134, '{\"en\":\"Malaysian\",\"ar\":\"\\u0645\\u0627\\u0644\\u064a\\u0632\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(135, '{\"en\":\"Maldivian\",\"ar\":\"\\u0645\\u0627\\u0644\\u062f\\u064a\\u0641\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(136, '{\"en\":\"Malian\",\"ar\":\"\\u0645\\u0627\\u0644\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(137, '{\"en\":\"Maltese\",\"ar\":\"\\u0645\\u0627\\u0644\\u0637\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(138, '{\"en\":\"Marshallese\",\"ar\":\"\\u0645\\u0627\\u0631\\u0634\\u0627\\u0644\\u064a\"}', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(139, '{\"en\":\"Martiniquais\",\"ar\":\"\\u0645\\u0627\\u0631\\u062a\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(140, '{\"en\":\"Mauritanian\",\"ar\":\"\\u0645\\u0648\\u0631\\u064a\\u062a\\u0627\\u0646\\u064a\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(141, '{\"en\":\"Mauritian\",\"ar\":\"\\u0645\\u0648\\u0631\\u064a\\u0634\\u064a\\u0648\\u0633\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(142, '{\"en\":\"Mahoran\",\"ar\":\"\\u0645\\u0627\\u064a\\u0648\\u062a\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(143, '{\"en\":\"Mexican\",\"ar\":\"\\u0645\\u0643\\u0633\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(144, '{\"en\":\"Micronesian\",\"ar\":\"\\u0645\\u0627\\u064a\\u0643\\u0631\\u0648\\u0646\\u064a\\u0632\\u064a\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(145, '{\"en\":\"Moldovan\",\"ar\":\"\\u0645\\u0648\\u0644\\u062f\\u064a\\u0641\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(146, '{\"en\":\"Monacan\",\"ar\":\"\\u0645\\u0648\\u0646\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(147, '{\"en\":\"Mongolian\",\"ar\":\"\\u0645\\u0646\\u063a\\u0648\\u0644\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(148, '{\"en\":\"Montenegrin\",\"ar\":\"\\u0627\\u0644\\u062c\\u0628\\u0644 \\u0627\\u0644\\u0623\\u0633\\u0648\\u062f\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(149, '{\"en\":\"Montserratian\",\"ar\":\"\\u0645\\u0648\\u0646\\u062a\\u0633\\u064a\\u0631\\u0627\\u062a\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(150, '{\"en\":\"Moroccan\",\"ar\":\"\\u0645\\u063a\\u0631\\u0628\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(151, '{\"en\":\"Mozambican\",\"ar\":\"\\u0645\\u0648\\u0632\\u0645\\u0628\\u064a\\u0642\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(152, '{\"en\":\"Myanmarian\",\"ar\":\"\\u0645\\u064a\\u0627\\u0646\\u0645\\u0627\\u0631\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(153, '{\"en\":\"Namibian\",\"ar\":\"\\u0646\\u0627\\u0645\\u064a\\u0628\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(154, '{\"en\":\"Nauruan\",\"ar\":\"\\u0646\\u0648\\u0631\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(155, '{\"en\":\"Nepalese\",\"ar\":\"\\u0646\\u064a\\u0628\\u0627\\u0644\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(156, '{\"en\":\"Dutch\",\"ar\":\"\\u0647\\u0648\\u0644\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(157, '{\"en\":\"Dutch Antilier\",\"ar\":\"\\u0647\\u0648\\u0644\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(158, '{\"en\":\"New Caledonian\",\"ar\":\"\\u0643\\u0627\\u0644\\u064a\\u062f\\u0648\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(159, '{\"en\":\"New Zealander\",\"ar\":\"\\u0646\\u064a\\u0648\\u0632\\u064a\\u0644\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(160, '{\"en\":\"Nicaraguan\",\"ar\":\"\\u0646\\u064a\\u0643\\u0627\\u0631\\u0627\\u062c\\u0648\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(161, '{\"en\":\"Nigerien\",\"ar\":\"\\u0646\\u064a\\u062c\\u064a\\u0631\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(162, '{\"en\":\"Nigerian\",\"ar\":\"\\u0646\\u064a\\u062c\\u064a\\u0631\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(163, '{\"en\":\"Niuean\",\"ar\":\"\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(164, '{\"en\":\"Norfolk Islander\",\"ar\":\"\\u0646\\u0648\\u0631\\u0641\\u0648\\u0644\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(165, '{\"en\":\"Northern Marianan\",\"ar\":\"\\u0645\\u0627\\u0631\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(166, '{\"en\":\"Norwegian\",\"ar\":\"\\u0646\\u0631\\u0648\\u064a\\u062c\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(167, '{\"en\":\"Omani\",\"ar\":\"\\u0639\\u0645\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(168, '{\"en\":\"Pakistani\",\"ar\":\"\\u0628\\u0627\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(169, '{\"en\":\"Palauan\",\"ar\":\"\\u0628\\u0627\\u0644\\u0627\\u0648\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(170, '{\"en\":\"Palestinian\",\"ar\":\"\\u0641\\u0644\\u0633\\u0637\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(171, '{\"en\":\"Panamanian\",\"ar\":\"\\u0628\\u0646\\u0645\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(172, '{\"en\":\"Papua New Guinean\",\"ar\":\"\\u0628\\u0627\\u0628\\u0648\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(173, '{\"en\":\"Paraguayan\",\"ar\":\"\\u0628\\u0627\\u0631\\u063a\\u0627\\u0648\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(174, '{\"en\":\"Peruvian\",\"ar\":\"\\u0628\\u064a\\u0631\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(175, '{\"en\":\"Filipino\",\"ar\":\"\\u0641\\u0644\\u0628\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(176, '{\"en\":\"Pitcairn Islander\",\"ar\":\"\\u0628\\u064a\\u062a\\u0643\\u064a\\u0631\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(177, '{\"en\":\"Polish\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(178, '{\"en\":\"Portuguese\",\"ar\":\"\\u0628\\u0631\\u062a\\u063a\\u0627\\u0644\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(179, '{\"en\":\"Puerto Rican\",\"ar\":\"\\u0628\\u0648\\u0631\\u062a\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(180, '{\"en\":\"Qatari\",\"ar\":\"\\u0642\\u0637\\u0631\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(181, '{\"en\":\"Reunionese\",\"ar\":\"\\u0631\\u064a\\u0648\\u0646\\u064a\\u0648\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(182, '{\"en\":\"Romanian\",\"ar\":\"\\u0631\\u0648\\u0645\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(183, '{\"en\":\"Russian\",\"ar\":\"\\u0631\\u0648\\u0633\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(184, '{\"en\":\"Samoan\",\"ar\":\"\\u0633\\u0627\\u0645\\u0648\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(185, '{\"en\":\"Sammarinese\",\"ar\":\"\\u0645\\u0627\\u0631\\u064a\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(186, '{\"en\":\"Sao Tomean\",\"ar\":\"\\u0633\\u0627\\u0648 \\u062a\\u0648\\u0645\\u064a \\u0648\\u0628\\u0631\\u064a\\u0646\\u0633\\u064a\\u0628\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(187, '{\"en\":\"Saudi Arabian\",\"ar\":\"\\u0633\\u0639\\u0648\\u062f\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(188, '{\"en\":\"Senegalese\",\"ar\":\"\\u0633\\u0646\\u063a\\u0627\\u0644\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(189, '{\"en\":\"Serbian\",\"ar\":\"\\u0635\\u0631\\u0628\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(190, '{\"en\":\"Singaporean\",\"ar\":\"\\u0633\\u0646\\u063a\\u0627\\u0641\\u0648\\u0631\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(191, '{\"en\":\"Solomon Island\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0633\\u0644\\u064a\\u0645\\u0627\\u0646\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(192, '{\"en\":\"Somali\",\"ar\":\"\\u0635\\u0648\\u0645\\u0627\\u0644\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(193, '{\"en\":\"South Sudanese\",\"ar\":\"\\u0633\\u0648\\u0627\\u062f\\u0646\\u064a \\u062c\\u0646\\u0648\\u0628\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(194, '{\"en\":\"Spanish\",\"ar\":\"\\u0625\\u0633\\u0628\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(195, '{\"en\":\"St. Helenian\",\"ar\":\"\\u0647\\u064a\\u0644\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(196, '{\"en\":\"Sudanese\",\"ar\":\"\\u0633\\u0648\\u062f\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(197, '{\"en\":\"Swazi\",\"ar\":\"\\u0633\\u0648\\u0627\\u0632\\u064a\\u0644\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(198, '{\"en\":\"Swedish\",\"ar\":\"\\u0633\\u0648\\u064a\\u062f\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(199, '{\"en\":\"Swiss\",\"ar\":\"\\u0633\\u0648\\u064a\\u0633\\u0631\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(200, '{\"en\":\"Syrian\",\"ar\":\"\\u0633\\u0648\\u0631\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(201, '{\"en\":\"Taiwanese\",\"ar\":\"\\u062a\\u0627\\u064a\\u0648\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(202, '{\"en\":\"Tajikistani\",\"ar\":\"\\u0637\\u0627\\u062c\\u064a\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(203, '{\"en\":\"Tanzanian\",\"ar\":\"\\u062a\\u0646\\u0632\\u0627\\u0646\\u064a\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(204, '{\"en\":\"Tunisian\",\"ar\":\"\\u062a\\u0648\\u0646\\u0633\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(205, '{\"en\":\"Turkish\",\"ar\":\"\\u062a\\u0631\\u0643\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(206, '{\"en\":\"Turkmen\",\"ar\":\"\\u062a\\u0631\\u0643\\u0645\\u0627\\u0646\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(207, '{\"en\":\"Ugandan\",\"ar\":\"\\u0623\\u0648\\u063a\\u0646\\u062f\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(208, '{\"en\":\"Ukrainian\",\"ar\":\"\\u0623\\u0648\\u0643\\u0631\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(209, '{\"en\":\"Emirati\",\"ar\":\"\\u0625\\u0645\\u0627\\u0631\\u0627\\u062a\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(210, '{\"en\":\"British\",\"ar\":\"\\u0628\\u0631\\u064a\\u0637\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(211, '{\"en\":\"American\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(212, '{\"en\":\"US Minor Outlying Islander\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(213, '{\"en\":\"Uruguayan\",\"ar\":\"\\u0623\\u0648\\u0631\\u063a\\u0648\\u0627\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(214, '{\"en\":\"Uzbek\",\"ar\":\"\\u0623\\u0648\\u0632\\u0628\\u0627\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(215, '{\"en\":\"Venezuelan\",\"ar\":\"\\u0641\\u0646\\u0632\\u0648\\u064a\\u0644\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(216, '{\"en\":\"Vietnamese\",\"ar\":\"\\u0641\\u064a\\u062a\\u0646\\u0627\\u0645\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(217, '{\"en\":\"American Virgin Islander\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(218, '{\"en\":\"Yemeni\",\"ar\":\"\\u064a\\u0645\\u0646\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(219, '{\"en\":\"Zimbabwean\",\"ar\":\"\\u0632\\u0645\\u0628\\u0627\\u0628\\u0648\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `online_classes`
--

CREATE TABLE `online_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Grade_id` bigint(20) UNSIGNED NOT NULL,
  `Classroom_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `meeting_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` datetime NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'minute',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'meeting password',
  `start_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('yazeed@gmail.com', '$2y$10$/tjS3qJnB.NZCBApnFHEa.QguO7Vl.3aEko8upwl2r2J3KpagqYHS', '2021-08-25 10:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `payment_students`
--

CREATE TABLE `payment_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_students`
--

INSERT INTO `payment_students` (`id`, `date`, `student_id`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(2, '2021-07-15', 1, '1500.00', 'ارجاع المبلغ المدفوع لرسوم الباص لعدم الرغبة', '2021-07-15 15:22:14', '2021-07-15 15:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `processing_fees`
--

CREATE TABLE `processing_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `processing_fees`
--

INSERT INTO `processing_fees` (`id`, `date`, `student_id`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, '2021-07-15', 1, '2500.00', 'استبعاد فاتورة الباص التي قيمتها (2500) لعدم \r\nرغبة الاهل', '2021-07-15 14:30:50', '2021-07-15 14:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `from_grade` bigint(20) UNSIGNED NOT NULL,
  `from_Classroom` bigint(20) UNSIGNED NOT NULL,
  `from_section` bigint(20) UNSIGNED NOT NULL,
  `from_academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_grade` bigint(20) UNSIGNED NOT NULL,
  `to_Classroom` bigint(20) UNSIGNED NOT NULL,
  `to_section` bigint(20) UNSIGNED NOT NULL,
  `to_academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answers` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_answer` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `quizze_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `answers`, `right_answer`, `score`, `quizze_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"which country is capital of Jordan ?\",\"ar\":\"\\u0645\\u0627 \\u0647\\u064a \\u0639\\u0627\\u0635\\u0645\\u0629 \\u0627\\u0644\\u0627\\u0631\\u062f\\u0646\\u061f\"}', 'Irbid\r\nAmman\r\nAqaba\r\nAlkarak', 'Amman', 10, 2, '2021-08-26 11:53:42', '2021-08-26 11:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `subject_id`, `grade_id`, `classroom_id`, `section_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, '{\"en\":\"first exam\",\"ar\":\"\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631 \\u0627\\u0644\\u0634\\u0647\\u0631 \\u0627\\u0644\\u0627\\u0648\\u0644\"}', 2, 1, 1, 1, 1, '2021-08-15 13:21:26', '2021-08-15 13:21:26'),
(3, '{\"en\":\"second exam\",\"ar\":\"\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631 \\u0627\\u0644\\u0634\\u0647\\u0631 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\"}', 3, 1, 2, 2, 2, '2021-08-15 13:22:05', '2021-08-15 13:22:05'),
(4, '{\"en\":\"second exam\",\"ar\":\"\\u0627\\u062e\\u062a\\u0628\\u0627\\u0631 \\u0627\\u0644\\u0634\\u0647\\u0631 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\"}', 2, 1, 1, 1, 1, '2021-08-15 13:27:05', '2021-08-15 13:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_students`
--

CREATE TABLE `receipt_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `Debit` decimal(8,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipt_students`
--

INSERT INTO `receipt_students` (`id`, `date`, `student_id`, `Debit`, `description`, `created_at`, `updated_at`) VALUES
(1, '2021-07-15', 1, '6500.00', 'دفعة من الرسوم الدراسية ورسوم الباص', '2021-07-15 14:26:12', '2021-07-15 14:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `Name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Muslim\",\"ar\":\"\\u0645\\u0633\\u0644\\u0645\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(2, '{\"en\":\"Christian\",\"ar\":\"\\u0645\\u0633\\u064a\\u062d\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(3, '{\"en\":\"Other\",\"ar\":\"\\u063a\\u064a\\u0631\\u0630\\u0644\\u0643\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name_Section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `Grade_id` bigint(20) UNSIGNED NOT NULL,
  `Class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `Name_Section`, `Status`, `Grade_id`, `Class_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0623\",\"en\":\"gg\"}', 1, 1, 1, '2021-07-15 13:11:44', '2021-07-15 13:11:44'),
(2, '{\"ar\":\"\\u0628\",\"en\":\"gg\\u0633\"}', 0, 1, 2, '2021-07-15 13:12:00', '2021-07-22 14:33:56'),
(3, '{\"ar\":\"\\u062d\",\"en\":\"gg\\u0644\"}', 1, 2, 5, '2021-07-15 13:12:16', '2021-07-15 13:12:16'),
(4, '{\"ar\":\"\\u062c\",\"en\":\"\\u0628\\u0628\"}', 1, 2, 4, '2021-07-15 13:12:31', '2021-07-15 13:12:31'),
(5, '{\"ar\":\"\\u062a\",\"en\":\"gg\\u0644\"}', 1, 1, 3, '2021-07-15 13:13:07', '2021-07-22 14:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'current_session', '2021-2022', NULL, '2021-11-14 17:14:54'),
(2, 'school_title', 'BAS', NULL, '2021-11-14 17:14:54'),
(3, 'school_name', 'BA International Schools', NULL, '2021-11-14 17:14:54'),
(4, 'end_first_term', '01-12-2021', NULL, '2021-11-14 17:14:54'),
(5, 'end_second_term', '01-03-2022', NULL, '2021-11-14 17:14:54'),
(6, 'phone', '0789654125', NULL, '2021-11-14 17:14:54'),
(7, 'address', 'Jordan', NULL, '2021-11-14 17:14:54'),
(8, 'school_email', 'info@BASchool.com', NULL, '2021-11-14 17:14:54'),
(9, 'logo', 'Amg.jpg', NULL, '2021-11-14 17:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `Name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Arabic\",\"ar\":\"\\u0639\\u0631\\u0628\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(2, '{\"en\":\"Sciences\",\"ar\":\"\\u0639\\u0644\\u0648\\u0645\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(3, '{\"en\":\"Computer\",\"ar\":\"\\u062d\\u0627\\u0633\\u0628 \\u0627\\u0644\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(4, '{\"en\":\"English\",\"ar\":\"\\u0627\\u0646\\u062c\\u0644\\u064a\\u0632\\u064a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(5, '{\"en\":\"Math\",\"ar\":\"\\u0631\\u064a\\u0627\\u0636\\u064a\\u0627\\u062a\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06'),
(6, '{\"en\":\"Islamic\",\"ar\":\"\\u0627\\u0644\\u0627\\u0633\\u0644\\u0627\\u0645\\u064a\\u0629\"}', '2021-07-15 13:01:06', '2021-07-15 13:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `nationalitie_id` bigint(20) UNSIGNED NOT NULL,
  `blood_id` bigint(20) UNSIGNED NOT NULL,
  `Date_Birth` date NOT NULL,
  `Grade_id` bigint(20) UNSIGNED NOT NULL,
  `Classroom_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `gender_id`, `nationalitie_id`, `blood_id`, `Date_Birth`, `Grade_id`, `Classroom_id`, `section_id`, `parent_id`, `academic_year`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"adnan\",\"ar\":\"\\u0639\\u062f\\u0646\\u0627\\u0646\"}', 'adnan@BA.edu.jo', '$2y$10$kYcElK7DoHGH8/82L6ejYOVOZU6QPQLiquO7Z0EC7nLN69cHH6Izm', 1, 183, 5, '2021-07-20', 1, 1, 1, 1, '2021', NULL, '2021-07-15 13:18:44', '2021-11-30 15:15:26'),
(2, '{\"en\":\"omar\",\"ar\":\"\\u0639\\u0645\\u0631\"}', 'omar@BA.edu.jo', '$2y$10$KcmqiSwCsGp9crw5h.vLDeTb3SufJzZrQwd.qS.FC81eZBEqToaPK', 1, 3, 2, '2021-07-20', 1, 2, 2, 1, '2022', NULL, '2021-07-15 13:19:37', '2021-07-15 13:19:37'),
(3, '{\"en\":\"marah\",\"ar\":\"\\u0645\\u0631\\u062d\"}', 'marah@BA.edu.jo', '$2y$10$b2D3P1nYGFFFWCb05hkZSui2C2pgsxNmxFp4v063e6WC8UnpDnfLm', 2, 16, 5, '2021-07-27', 2, 5, 3, 1, '2021', NULL, '2021-07-15 13:20:51', '2021-07-15 13:20:51'),
(4, '{\"en\":\"jana\",\"ar\":\"\\u062c\\u0646\\u0649\"}', 'jana@BA.edu.jo', '$2y$10$rT4jv/t2zxHvMfgyHCJrHO16XHAq25L/cQVahdHtNnbn1kxARBCzS', 2, 16, 4, '2021-07-21', 2, 4, 4, 1, '2021', NULL, '2021-07-15 13:21:41', '2021-07-15 13:21:41'),
(5, '{\"en\":\"Mona\",\"ar\":\"\\u0645\\u0648\\u0646\\u0649\"}', 'Mona@BA.edu.jo', '$2y$10$MpP9DVrXZiJzEUuISFx6Redmrjbqfgj8YQEWtqXN4mZF47q10rYza', 2, 181, 6, '2020-06-08', 1, 1, 1, 1, '2021', NULL, '2021-07-22 12:28:58', '2021-07-22 12:28:58'),
(6, '{\"en\":\"amal\",\"ar\":\"\\u0627\\u0645\\u0644\"}', 'amal@BA.edu.jo', '$2y$10$jmDxh//R3X.qKdJtYqDpf.QCRPfna5dZOOg5epM4y0th3Z9cm2Fze', 2, 4, 4, '2020-06-07', 2, 5, 3, 1, '2021', NULL, '2021-07-31 16:53:57', '2021-07-31 16:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `student_financial_accounts`
--

CREATE TABLE `student_financial_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receipt_id` bigint(20) UNSIGNED DEFAULT NULL,
  `processing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `Debit` decimal(8,2) DEFAULT NULL,
  `credit` decimal(8,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_financial_accounts`
--

INSERT INTO `student_financial_accounts` (`id`, `date`, `type`, `fee_invoice_id`, `receipt_id`, `processing_id`, `payment_id`, `student_id`, `Debit`, `credit`, `description`, `created_at`, `updated_at`) VALUES
(1, '2021-07-15', 'invoice', 1, NULL, NULL, NULL, 1, '10000.00', '0.00', 'رسوم دراسية للفصلين', '2021-07-15 14:23:13', '2021-07-15 14:23:13'),
(2, '2021-07-15', 'invoice', 2, NULL, NULL, NULL, 1, '2500.00', '0.00', 'رسوم الباص', '2021-07-15 14:24:49', '2021-07-15 14:24:49'),
(3, '2021-07-15', 'receipt', NULL, 1, NULL, NULL, 1, '0.00', '6500.00', 'دفعة من الرسوم الدراسية ورسوم الباص', '2021-07-15 14:26:12', '2021-07-15 14:27:38'),
(4, '2021-07-15', 'ProcessingFee', NULL, NULL, 1, NULL, 1, '0.00', '2500.00', 'استبعاد فاتورة الباص التي قيمتها (2500) لعدم \r\nرغبة الاهل', '2021-07-15 14:30:50', '2021-07-15 14:30:50'),
(6, '2021-07-15', 'payment', NULL, NULL, NULL, 2, 1, '1500.00', '0.00', 'ارجاع المبلغ المدفوع لرسوم الباص لعدم الرغبة', '2021-07-15 15:22:14', '2021-07-15 15:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `grade_id`, `classroom_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, '{\"en\":\"Arabic\",\"ar\":\"\\u0627\\u0644\\u0644\\u063a\\u0629 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629\"}', 1, 1, 1, '2021-08-03 17:50:00', '2021-08-03 17:50:00'),
(3, '{\"en\":\"English book\",\"ar\":\"\\u0627\\u0644\\u0644\\u063a\\u0629 \\u0627\\u0644\\u0627\\u0646\\u062c\\u0644\\u064a\\u0632\\u064a\\u0629\"}', 1, 1, 2, '2021-08-03 17:52:50', '2021-08-03 17:52:50'),
(4, '{\"en\":\"Math\",\"ar\":\"\\u0627\\u0644\\u0631\\u064a\\u0627\\u0636\\u064a\\u0627\\u062a\"}', 1, 2, 1, '2021-08-03 17:53:41', '2021-08-03 17:53:41'),
(5, '{\"en\":\"Science\",\"ar\":\"\\u0639\\u0644\\u0648\\u0645\"}', 2, 5, 2, '2021-08-03 17:55:04', '2021-08-03 17:56:05'),
(6, '{\"en\":\"Islamic\",\"ar\":\"\\u062f\\u064a\\u0646\"}', 2, 5, 1, '2021-08-03 17:55:54', '2021-08-03 17:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Specialization_id` bigint(20) UNSIGNED NOT NULL,
  `Gender_id` bigint(20) UNSIGNED NOT NULL,
  `Joining_Date` date NOT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `password`, `Name`, `Specialization_id`, `Gender_id`, `Joining_Date`, `Address`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad@gmail.com', '$2y$10$Hn549CwRwvdJS/J0H5TWx.O6crpViSvbyDvd7uCLQY1IeGK/IASAi', '{\"en\":\"Ahmad\",\"ar\":\"\\u0623\\u062d\\u0645\\u062f\"}', 2, 1, '2021-07-20', 'dddd', '2021-07-15 13:10:45', '2021-12-12 09:52:53'),
(2, 'Ali@yahoo.com', '$2y$10$plnONOT.ygWP/UNG0AWG7.cVRuSDdECptD4X0a7lqRepituY713bO', '{\"en\":\"ali\",\"ar\":\"\\u0639\\u0644\\u064a\"}', 4, 1, '2021-07-26', 'ddd', '2021-07-15 13:11:18', '2021-12-12 09:58:14'),
(3, 'yazan@BA.te.edu.jo', '$2y$10$jtJh6fYYTDjI28VDGQPyBeLHwqhuNm7BINRXdqH7iY47s29eLEinG', '{\"en\":\"yazan\",\"ar\":\"\\u064a\\u0632\\u0646\"}', 2, 1, '2021-12-20', 'dd', '2021-12-12 10:29:25', '2021-12-12 10:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_section`
--

CREATE TABLE `teacher_section` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teachers_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_section`
--

INSERT INTO `teacher_section` (`id`, `teachers_id`, `section_id`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 4),
(6, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `type_bloods`
--

CREATE TABLE `type_bloods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_bloods`
--

INSERT INTO `type_bloods` (`id`, `Name`, `created_at`, `updated_at`) VALUES
(1, 'O-', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(2, 'O+', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(3, 'A+', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(4, 'A-', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(5, 'B+', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(6, 'B-', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(7, 'AB+', '2021-07-15 13:01:05', '2021-07-15 13:01:05'),
(8, 'AB-', '2021-07-15 13:01:05', '2021-07-15 13:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yazeed', 'yazeed@gmail.com', NULL, '$2y$10$b8WEs5v9kj7cG4KIs6xDeeZOZwyTTRb9v/ugs5lxwZwOETRf8abOC', NULL, '2021-07-15 13:06:48', '2021-07-15 13:06:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`),
  ADD KEY `attendances_grade_id_foreign` (`grade_id`),
  ADD KEY `attendances_classroom_id_foreign` (`classroom_id`),
  ADD KEY `attendances_section_id_foreign` (`section_id`),
  ADD KEY `attendances_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms_grade_id_foreign` (`Grade_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_grade_id_foreign` (`Grade_id`),
  ADD KEY `fees_classroom_id_foreign` (`Classroom_id`);

--
-- Indexes for table `fees_invoices`
--
ALTER TABLE `fees_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_invoices_student_id_foreign` (`student_id`),
  ADD KEY `fees_invoices_grade_id_foreign` (`Grade_id`),
  ADD KEY `fees_invoices_classroom_id_foreign` (`Classroom_id`),
  ADD KEY `fees_invoices_fees_id_foreign` (`fees_id`);

--
-- Indexes for table `fund_accounts`
--
ALTER TABLE `fund_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fund_accounts_receipt_id_foreign` (`receipt_id`),
  ADD KEY `fund_accounts_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grades_name_unique` (`Name`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_parents`
--
ALTER TABLE `my_parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `my_parents_email_unique` (`email`),
  ADD KEY `my_parents_nationality_father_id_foreign` (`Nationality_Father_id`),
  ADD KEY `my_parents_blood_type_father_id_foreign` (`Blood_Type_Father_id`),
  ADD KEY `my_parents_religion_father_id_foreign` (`Religion_Father_id`),
  ADD KEY `my_parents_nationality_mother_id_foreign` (`Nationality_Mother_id`),
  ADD KEY `my_parents_blood_type_mother_id_foreign` (`Blood_Type_Mother_id`),
  ADD KEY `my_parents_religion_mother_id_foreign` (`Religion_Mother_id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_classes`
--
ALTER TABLE `online_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `online_classes_grade_id_foreign` (`Grade_id`),
  ADD KEY `online_classes_classroom_id_foreign` (`Classroom_id`),
  ADD KEY `online_classes_section_id_foreign` (`section_id`),
  ADD KEY `online_classes_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_students`
--
ALTER TABLE `payment_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_students_student_id_foreign` (`student_id`);

--
-- Indexes for table `processing_fees`
--
ALTER TABLE `processing_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `processing_fees_student_id_foreign` (`student_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_student_id_foreign` (`student_id`),
  ADD KEY `promotions_from_grade_foreign` (`from_grade`),
  ADD KEY `promotions_from_classroom_foreign` (`from_Classroom`),
  ADD KEY `promotions_from_section_foreign` (`from_section`),
  ADD KEY `promotions_to_grade_foreign` (`to_grade`),
  ADD KEY `promotions_to_classroom_foreign` (`to_Classroom`),
  ADD KEY `promotions_to_section_foreign` (`to_section`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quizze_id_foreign` (`quizze_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_subject_id_foreign` (`subject_id`),
  ADD KEY `quizzes_grade_id_foreign` (`grade_id`),
  ADD KEY `quizzes_classroom_id_foreign` (`classroom_id`),
  ADD KEY `quizzes_section_id_foreign` (`section_id`),
  ADD KEY `quizzes_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `receipt_students`
--
ALTER TABLE `receipt_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_students_student_id_foreign` (`student_id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_grade_id_foreign` (`Grade_id`),
  ADD KEY `sections_class_id_foreign` (`Class_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_gender_id_foreign` (`gender_id`),
  ADD KEY `students_nationalitie_id_foreign` (`nationalitie_id`),
  ADD KEY `students_blood_id_foreign` (`blood_id`),
  ADD KEY `students_grade_id_foreign` (`Grade_id`),
  ADD KEY `students_classroom_id_foreign` (`Classroom_id`),
  ADD KEY `students_section_id_foreign` (`section_id`),
  ADD KEY `students_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `student_financial_accounts`
--
ALTER TABLE `student_financial_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_financial_accounts_fee_invoice_id_foreign` (`fee_invoice_id`),
  ADD KEY `student_financial_accounts_receipt_id_foreign` (`receipt_id`),
  ADD KEY `student_financial_accounts_processing_id_foreign` (`processing_id`),
  ADD KEY `student_financial_accounts_payment_id_foreign` (`payment_id`),
  ADD KEY `student_financial_accounts_student_id_foreign` (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_grade_id_foreign` (`grade_id`),
  ADD KEY `subjects_classroom_id_foreign` (`classroom_id`),
  ADD KEY `subjects_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`),
  ADD KEY `teachers_specialization_id_foreign` (`Specialization_id`),
  ADD KEY `teachers_gender_id_foreign` (`Gender_id`);

--
-- Indexes for table `teacher_section`
--
ALTER TABLE `teacher_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_section_teachers_id_foreign` (`teachers_id`),
  ADD KEY `teacher_section_section_id_foreign` (`section_id`);

--
-- Indexes for table `type_bloods`
--
ALTER TABLE `type_bloods`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fees_invoices`
--
ALTER TABLE `fees_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fund_accounts`
--
ALTER TABLE `fund_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `my_parents`
--
ALTER TABLE `my_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `online_classes`
--
ALTER TABLE `online_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_students`
--
ALTER TABLE `payment_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `processing_fees`
--
ALTER TABLE `processing_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipt_students`
--
ALTER TABLE `receipt_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_financial_accounts`
--
ALTER TABLE `student_financial_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_section`
--
ALTER TABLE `teacher_section`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type_bloods`
--
ALTER TABLE `type_bloods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_grade_id_foreign` FOREIGN KEY (`Grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_classroom_id_foreign` FOREIGN KEY (`Classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_grade_id_foreign` FOREIGN KEY (`Grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees_invoices`
--
ALTER TABLE `fees_invoices`
  ADD CONSTRAINT `fees_invoices_classroom_id_foreign` FOREIGN KEY (`Classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_invoices_fees_id_foreign` FOREIGN KEY (`fees_id`) REFERENCES `fees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_invoices_grade_id_foreign` FOREIGN KEY (`Grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_invoices_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fund_accounts`
--
ALTER TABLE `fund_accounts`
  ADD CONSTRAINT `fund_accounts_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fund_accounts_receipt_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipt_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `my_parents`
--
ALTER TABLE `my_parents`
  ADD CONSTRAINT `my_parents_blood_type_father_id_foreign` FOREIGN KEY (`Blood_Type_Father_id`) REFERENCES `type_bloods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_parents_blood_type_mother_id_foreign` FOREIGN KEY (`Blood_Type_Mother_id`) REFERENCES `type_bloods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_parents_nationality_father_id_foreign` FOREIGN KEY (`Nationality_Father_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_parents_nationality_mother_id_foreign` FOREIGN KEY (`Nationality_Mother_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_parents_religion_father_id_foreign` FOREIGN KEY (`Religion_Father_id`) REFERENCES `religions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_parents_religion_mother_id_foreign` FOREIGN KEY (`Religion_Mother_id`) REFERENCES `religions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `online_classes`
--
ALTER TABLE `online_classes`
  ADD CONSTRAINT `online_classes_classroom_id_foreign` FOREIGN KEY (`Classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `online_classes_grade_id_foreign` FOREIGN KEY (`Grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `online_classes_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `online_classes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_students`
--
ALTER TABLE `payment_students`
  ADD CONSTRAINT `payment_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `processing_fees`
--
ALTER TABLE `processing_fees`
  ADD CONSTRAINT `processing_fees_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_from_classroom_foreign` FOREIGN KEY (`from_Classroom`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_from_grade_foreign` FOREIGN KEY (`from_grade`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_from_section_foreign` FOREIGN KEY (`from_section`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_to_classroom_foreign` FOREIGN KEY (`to_Classroom`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_to_grade_foreign` FOREIGN KEY (`to_grade`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_to_section_foreign` FOREIGN KEY (`to_section`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quizze_id_foreign` FOREIGN KEY (`quizze_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quizzes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `receipt_students`
--
ALTER TABLE `receipt_students`
  ADD CONSTRAINT `receipt_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_class_id_foreign` FOREIGN KEY (`Class_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sections_grade_id_foreign` FOREIGN KEY (`Grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_blood_id_foreign` FOREIGN KEY (`blood_id`) REFERENCES `type_bloods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_classroom_id_foreign` FOREIGN KEY (`Classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_grade_id_foreign` FOREIGN KEY (`Grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_nationalitie_id_foreign` FOREIGN KEY (`nationalitie_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `my_parents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_financial_accounts`
--
ALTER TABLE `student_financial_accounts`
  ADD CONSTRAINT `student_financial_accounts_fee_invoice_id_foreign` FOREIGN KEY (`fee_invoice_id`) REFERENCES `fees_invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_financial_accounts_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_financial_accounts_processing_id_foreign` FOREIGN KEY (`processing_id`) REFERENCES `processing_fees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_financial_accounts_receipt_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipt_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_financial_accounts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_gender_id_foreign` FOREIGN KEY (`Gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_specialization_id_foreign` FOREIGN KEY (`Specialization_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_section`
--
ALTER TABLE `teacher_section`
  ADD CONSTRAINT `teacher_section_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_section_teachers_id_foreign` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
