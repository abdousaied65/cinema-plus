-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 11:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `role_name`, `Status`, `api_token`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '2021-02-27 02:23:27', '$2y$10$dZDC/BMHf/dXcqKi8Qv9fux8MF4pT9/wQ1AguHpyysWDBLN3vtq2y', 'admin', '[\"super admin\"]', 'active', '3LryLs8PMCtkTg3xwjy313hpdHVnxiKsiCFO5izT7EJmIcgZj4NJ0ODfdnTQfrj7sBZUmioSCoES2CqL', 'J6pjvuCfkGTnj3916qvVVqLsex1sr9NGiyrCKefJSQ3TBWOUGideHjkYWpMy', NULL, '2021-02-27 02:23:27', '2021-02-27 02:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'created', 'App\\Models\\Admin', 1, '[]', '{\"name\":\"Admin\",\"email\":\"admin@admin.com\",\"type\":\"admin\",\"role_name\":\"[\\\"super admin\\\"]\",\"Status\":\"active\"}', 'console', '127.0.0.1', 'Symfony', NULL, '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(2, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Admin', 1, '[]', '[]', 'http://localhost:8000/ar/admin/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', NULL, '2021-02-27 12:38:40', '2021-02-27 12:38:40'),
(3, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Admin', 1, '[]', '[]', 'http://localhost:8000/ar/admin/logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', NULL, '2021-02-27 16:19:05', '2021-02-27 16:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `name_ar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Al Riyadh', 'الرياض', NULL, '2021-02-15 14:07:03', '2021-02-15 14:07:14'),
(2, 'Jeddah', 'جدة', NULL, '2021-02-15 14:22:31', '2021-02-15 14:22:31'),
(3, 'Dammam', 'الدمام', NULL, '2021-02-15 14:22:46', '2021-02-15 14:22:46'),
(4, 'Dhahran', 'الظهران', NULL, '2021-02-15 14:23:02', '2021-02-15 14:23:02'),
(5, 'Hofuf', 'الهفوف', NULL, '2021-02-15 14:23:13', '2021-02-15 14:23:13'),
(6, 'Jubail', 'الجبيل', NULL, '2021-02-15 14:23:30', '2021-02-15 14:23:30'),
(7, 'Hafr Al-Batin', 'حفر الباطن', NULL, '2021-02-15 14:24:31', '2021-02-15 14:27:02'),
(8, 'Tabuk', 'تبوك', NULL, '2021-02-15 14:24:54', '2021-02-15 14:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `name_ar`, `type_id`, `image`, `price`, `description`, `description_ar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Big Mac', 'بيج ماك', 1, 'uploads/foods/1/Bigmac.png', 100.00, 'Big Mac', 'بيج ماك', NULL, '2021-02-20 17:18:23', '2021-02-20 17:18:23'),
(2, 'Small Mac With Chrispy', 'ماك صغير مع بطاطس كريسبى', 1, 'uploads/foods/2/بطاطس-ماكدونالدز-1-1-845x475.jpg', 90.00, 'Small Mac With Chrispy', 'ماك صغير مع بطاطس كريسبى', NULL, '2021-02-20 17:19:29', '2021-02-20 17:19:29'),
(3, 'Pizza Margreta', 'بيتزا مرجريتا', 3, 'uploads/foods/3/طريقة_عمل_بيتزا_إيطالية.jpg', 80.00, 'Pizza Margreta', 'بيتزا مرجريتا', NULL, '2021-02-20 17:20:17', '2021-02-20 17:20:17'),
(4, 'Pizza Meat', 'بيتزا لحمة', 3, 'uploads/foods/4/830be9b787128dfec3918601dd4784b6b72760c4.jpg', 70.00, 'Pizza Meat', 'بيتزا لحمة', NULL, '2021-02-20 17:20:52', '2021-02-20 17:20:52'),
(5, 'Dessert Famliy', 'حلوبات عائلية', 4, 'uploads/foods/5/0207b3acaa30eb6c5d70e286a784ad33_w750_h500.jpg', 60.00, 'Dessert Family', 'حلوبات عائلية', NULL, '2021-02-20 17:22:14', '2021-02-20 17:22:14'),
(6, 'Dessert Personal', 'حلويات موسمية', 4, 'uploads/foods/6/WhatsApp-Image-2020-10-25-at-8.32.14-AM-1-380x352.jpg', 50.00, 'Dessert Personal', 'حلويات موسمية', NULL, '2021-02-20 17:22:52', '2021-02-20 17:22:52'),
(7, 'Coca Cola Large', 'كوكا كولا لارج', 2, 'uploads/foods/7/42995_large.jpg', 40.00, 'Coca Cola Large', 'كوكا كولا لارج', NULL, '2021-02-20 17:23:40', '2021-02-20 17:23:40'),
(8, 'Pepsi Large', 'ببسى لارج', 2, 'uploads/foods/8/unnamed.jpg', 30.00, 'Pepsi Large', 'ببسى لارج', NULL, '2021-02-20 17:24:16', '2021-02-20 17:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `foods_types`
--

CREATE TABLE `foods_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods_types`
--

INSERT INTO `foods_types` (`id`, `name`, `name_ar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Meals', 'الوجبات', NULL, '2021-02-20 16:13:21', '2021-02-20 16:13:21'),
(2, 'Drinks', 'المشروبات', NULL, '2021-02-20 16:13:21', '2021-02-20 16:13:21'),
(3, 'Pizza', 'البيتزا', NULL, '2021-02-20 16:13:21', '2021-02-20 16:13:21'),
(4, 'Sweeets', 'الحلويات', NULL, '2021-02-20 16:13:21', '2021-02-20 16:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `name_ar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Animation', 'افلام متحركة', NULL, '2021-02-14 06:49:53', '2021-02-14 06:49:53'),
(2, 'Adventure', 'مغامرة', NULL, '2021-02-14 06:50:43', '2021-02-14 06:50:43'),
(3, 'Comedy', 'كوميدى', NULL, '2021-02-14 06:51:54', '2021-02-14 06:51:54'),
(4, 'Drama', 'دراما', NULL, '2021-02-14 06:52:33', '2021-02-14 06:52:33'),
(5, 'Crime', 'جريمة', NULL, '2021-02-14 06:52:50', '2021-02-14 06:52:50'),
(6, 'Thriller', 'اثارة', NULL, '2021-02-14 06:53:08', '2021-02-14 06:53:08'),
(7, 'Science Fiction', 'خيال علمى', NULL, '2021-02-14 06:53:47', '2021-02-14 06:53:47'),
(8, 'Action', 'اكشن', NULL, '2021-02-14 07:36:58', '2021-02-14 07:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_date` date NOT NULL,
  `gift_price` decimal(8,2) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `name`, `name_ar`, `description`, `description_ar`, `expiration_date`, `gift_price`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Free Pizza', 'بيتزا مجانية', 'Free Pizza', 'بيتزا مجانية', '2021-04-10', '40.00', 'uploads/gifts/1/1939f3a9-b387-4628-9a05-96ee4f309581.jpg', NULL, '2021-02-27 21:44:18', '2021-02-27 21:44:18'),
(2, 'Movie Ticket', 'تذكرة فيلم', 'VIP 50% Discount', 'كبار الزوار خصم نصف السعر', '2021-05-01', '70.00', 'uploads/gifts/2/6158fac0-64b4-4798-a5e6-ba5d9e6816bb.jpg', NULL, '2021-02-27 21:45:59', '2021-02-27 21:45:59'),
(3, 'Movie Ticket', 'تذكرة فيلم', '2 people entry pass for one movie', 'سماح لدخول فردين فيلم واحد', '2021-06-11', '80.00', 'uploads/gifts/3/9617c892-e500-4848-89db-3a1ed07bec62.jpg', NULL, '2021-02-27 21:47:36', '2021-02-27 21:47:36'),
(4, 'Fresh Juice', 'عصير فريش', 'Fresh Juice', 'عصير فريش', '2021-07-15', '10.00', 'uploads/gifts/4/bfd39641-d492-4fc8-8edf-dfbc6d385a5a.jpg', NULL, '2021-02-27 21:48:23', '2021-02-27 21:48:23'),
(5, 'POPCORN FREE', 'فيشار مجانى', 'POPCORN FREE', 'فيشار مجانى', '2021-10-01', '20.00', 'uploads/gifts/5/c1a35763-242e-4635-aa92-d1d319ff973e.jpg', NULL, '2021-02-27 21:49:16', '2021-02-27 21:49:16'),
(6, 'Movie Ticket', 'تذكرة فيلم', '4 people entry pass for one movie', 'سماح لدخول 4 افراد  فيلم واحد', '2021-09-07', '100.00', 'uploads/gifts/6/f4c540d7-6b67-4e67-970d-e23a3edd3029.jpg', NULL, '2021-02-27 21:50:18', '2021-02-27 21:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_price` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `name`, `name_ar`, `ticket_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'VIP', 'كبار الزوار', 125.00, NULL, '2021-02-20 17:04:16', '2021-02-20 17:04:16'),
(2, 'Classic', 'كلاسيك', 55.00, NULL, '2021-02-20 17:04:35', '2021-02-20 17:04:35'),
(3, 'Primer', 'تمهيدية', 75.00, NULL, '2021-02-20 17:05:44', '2021-02-20 17:05:44');

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
(2, '2014_10_12_100000_create_admin_password_resets_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_03_26_122233_create_admins_table', 1),
(6, '2021_01_22_220021_create_permission_tables', 1),
(7, '2021_01_23_041240_create_audits_table', 1),
(8, '2021_01_23_201532_create_profiles_table', 1),
(9, '2021_02_05_212001_create_genres_table', 1),
(10, '2021_02_06_212048_create_stars_table', 1),
(11, '2021_02_12_210200_create_movies_table', 1),
(12, '2021_02_12_210610_create_movie_genre_table', 1),
(13, '2021_02_12_210610_create_movie_star_table', 1),
(14, '2021_02_15_084513_create_subscribes_table', 1),
(15, '2021_02_15_092452_create_contacts_table', 1),
(16, '2021_02_15_153036_create_cities_table', 1),
(17, '2021_02_16_023217_create_rooms_table', 1),
(18, '2021_02_17_233441_create_send_emails_table', 1),
(19, '2021_02_18_052252_create_foods_types_table', 1),
(20, '2021_02_19_052252_create_foods_table', 1),
(21, '2021_02_19_120707_create_shows_table', 1),
(22, '2021_02_19_164819_create_halls_table', 1),
(23, '2021_02_19_205207_create_seats_table', 1),
(24, '2021_02_20_120707_create_show_room_table', 1),
(25, '2021_02_20_120708_create_show_hall_table', 1),
(26, '2021_02_20_120710_create_show_day_table', 1),
(27, '2021_02_20_120720_create_show_time_table', 1),
(28, '2021_02_20_120730_create_show_seat_table', 1),
(29, '2021_02_21_115918_create_times_table', 1),
(30, '2021_02_25_180136_create_reservations_table', 1),
(31, '2021_02_25_195149_create_reserve_food_table', 1),
(32, '2021_02_26_232249_create_payments_table', 1),
(36, '2021_02_27_234540_create_gifts_table', 2),
(37, '2021_02_27_2945673_create_reserve_gift_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `story` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `name_ar`, `story`, `story_ar`, `movie_pic`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'The Croods : New Age', 'الكرودز : عصر جديد', 'The prehistoric family the Croods are challenged by a rival family the Better mans, who claim to be better and more evolved.', 'تواجه عائلة الكرودز التي تعود إلى عصور ما قبل التاريخ تحديًا من قبل عائلة منافسة تدعي أنها أفضل وأكثر تطورًا.', 'uploads/movies/1/dd319369-6a77-4b6f-8216-97eaeb916d09.jpg', NULL, '2021-02-14 07:31:47', '2021-02-14 07:31:47'),
(2, 'News of the World', 'اخبار العالم', 'A Civil War veteran agrees to deliver a girl, taken by the Kiowa people years ago, to her aunt and uncle, against her will. They travel hundreds of miles and face grave dangers as they search for a place that either can call home.', 'يوافق أحد قدامى المحاربين في الحرب الأهلية على تسليم فتاة ، أخذها شعب كيوا قبل سنوات ، إلى خالتها وعمها ، رغماً عنها. يسافرون مئات الأميال ويواجهون مخاطر جسيمة أثناء بحثهم عن مكان يمكن أن يسموه المنزل.', 'uploads/movies/2/7bfba66c-2c8a-470e-b187-017a578b1809.jpg', NULL, '2021-02-14 07:35:57', '2021-02-14 07:35:57'),
(3, 'The Little Things', 'التفاصيل الصغيرة', 'Kern County Deputy Sheriff Joe Deacon is sent to Los Angeles for what should have been a quick evidence-gathering assignment. Instead, he becomes embroiled in the search for a serial killer who is terrorizing the city.', 'تم إرسال نائب عمدة مقاطعة كيرن جو ديكون إلى لوس أنجلوس لما كان ينبغي أن يكون مهمة جمع أدلة سريعة. بدلاً من ذلك ، يتورط في البحث عن قاتل متسلسل يرهب المدينة.', 'uploads/movies/3/0e865437-c15f-404a-a590-a31ae8f97622.jpg', NULL, '2021-02-14 07:41:26', '2021-02-14 07:41:26'),
(4, 'Dead Pool 2', 'ديدبول 2', 'Foul-mouthed mutant mercenary Wade Wilson (a.k.a. Deadpool), brings together a team of fellow mutant rogues to protect a young boy with supernatural abilities from the brutal, time-traveling cyborg Cable.', 'يجمع المرتزقة الطافرة كريهة الفم ويد ويلسون (المعروف أيضًا باسم ديدبول) فريقًا من زملائه المحتالين لحماية صبي صغير يتمتع بقدرات خارقة للطبيعة من كابل سايبورغ الوحشي الذي يسافر عبر الزمن.', 'uploads/movies/4/ee762571-edf1-4077-9986-8dabb79cff49.jpg', NULL, '2021-02-14 07:43:27', '2021-02-14 07:43:27'),
(5, 'avengers age of ultron', 'المنتقمون عصر الاولترون', 'When Tony Stark and Bruce Banner try to jump-start a dormant peacekeeping program called Ultron, things go horribly wrong and it\'s up to Earth\'s mightiest heroes to stop the villainous Ultron from enacting his terrible plan.', 'عندما يحاول توني ستارك وبروس بانر إطلاق برنامج حفظ سلام خامد يسمى Ultron ، تسوء الأمور بشكل فظيع ويعود الأمر لأقوى أبطال الأرض لمنع Ultron الشرير من تنفيذ خطته الرهيبة.', 'uploads/movies/5/3635468d-06e0-4af0-817b-23f41e8d58f6.jpg', NULL, '2021-02-14 07:45:45', '2021-02-14 07:45:45'),
(6, 'Interstellar', 'واقع بين النجوم', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.', 'يسافر فريق من المستكشفين عبر ثقب دودي في الفضاء في محاولة لضمان بقاء البشرية.', 'uploads/movies/6/96a95332-962c-4e92-acf9-2c41ed97fe7d.jpg', NULL, '2021-02-14 07:47:05', '2021-02-14 07:47:05'),
(7, 'Joker', 'الجوكر', 'In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime. This path brings him face-to-face with his alter-ego: the Joker.', 'في مدينة جوثام ، يتعرض الممثل الكوميدي المضطرب عقليًا آرثر فليك للتجاهل والمعاملة السيئة من قبل المجتمع. ثم ينطلق في دوامة من الثورة والجريمة الدموية. يجعله هذا المسار وجهاً لوجه مع غروره البديل: الجوكر.', 'uploads/movies/7/fe322f1c-3e70-4f6b-831e-4d845622dca9.jpg', NULL, '2021-02-14 07:48:51', '2021-02-14 07:48:51'),
(8, 'The Boss Baby', 'الطفل الزعيم', 'The Templeton brothers have become adults and drifted away from each other, but a new boss baby with a cutting-edge approach is about to bring them together again - and inspire a new family business.', 'أصبح الأخوان تمبلتون بالغين وانجرفوا بعيدًا عن بعضهم البعض ، لكن طفلًا جديدًا يتمتع بنهج متطور على وشك أن يجمعهم معًا مرة أخرى - ويلهم شركة عائلية جديدة.', 'uploads/movies/8/5e2c3501-6e51-4c6c-a1ad-cd96ab9dcf92.jpg', NULL, '2021-02-14 07:50:40', '2021-02-14 07:50:40'),
(9, 'No Body', 'لا احد', 'A bystander who intervenes to help a woman being harassed by a group of men becomes the target of a vengeful drug lord.', 'المارة الذي يتدخل لمساعدة امرأة تتعرض للمضايقة من قبل مجموعة من الرجال يصبح هدفًا لرب المخدرات المنتقم.', 'uploads/movies/9/f4b6e218-86b8-4883-85e0-0c749983a5a2.jpg', NULL, '2021-02-14 07:52:03', '2021-02-14 07:52:03'),
(10, 'Godzilla vs. Kong', 'غودزيلا ضد كونغ', 'The epic next chapter in the cinematic Monster verse pits two of the greatest icons in motion picture history against one another - the fearsome Godzilla and the mighty Kong - with humanity caught in the balance.', 'يضع الفصل التالي الملحمي في شعر الوحش السينمائي اثنين من أعظم الرموز في تاريخ الصور المتحركة ضد بعضهما البعض - غودزيلا المخيف وكونغ العظيم - مع الإنسانية عالقة في الميزان.', 'uploads/movies/10/eff14cb3-25e9-488e-a5fe-ca0fc322d11b.jpg', NULL, '2021-02-14 07:53:44', '2021-02-14 07:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 2, 4, NULL, NULL),
(6, 2, 8, NULL, NULL),
(7, 3, 4, NULL, NULL),
(8, 3, 5, NULL, NULL),
(9, 3, 6, NULL, NULL),
(10, 4, 2, NULL, NULL),
(11, 4, 3, NULL, NULL),
(12, 4, 8, NULL, NULL),
(13, 5, 2, NULL, NULL),
(14, 5, 7, NULL, NULL),
(15, 5, 8, NULL, NULL),
(16, 6, 2, NULL, NULL),
(17, 6, 4, NULL, NULL),
(18, 6, 7, NULL, NULL),
(19, 7, 4, NULL, NULL),
(20, 7, 5, NULL, NULL),
(21, 7, 6, NULL, NULL),
(22, 8, 1, NULL, NULL),
(23, 8, 2, NULL, NULL),
(24, 8, 3, NULL, NULL),
(25, 9, 4, NULL, NULL),
(26, 9, 5, NULL, NULL),
(27, 9, 8, NULL, NULL),
(28, 10, 6, NULL, NULL),
(29, 10, 7, NULL, NULL),
(30, 10, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movie_star`
--

CREATE TABLE `movie_star` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `star_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_star`
--

INSERT INTO `movie_star` (`id`, `movie_id`, `star_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 2, 5, NULL, NULL),
(6, 2, 6, NULL, NULL),
(7, 3, 7, NULL, NULL),
(8, 3, 8, NULL, NULL),
(9, 3, 9, NULL, NULL),
(10, 4, 3, NULL, NULL),
(11, 4, 10, NULL, NULL),
(12, 4, 11, NULL, NULL),
(13, 5, 12, NULL, NULL),
(14, 5, 13, NULL, NULL),
(15, 5, 14, NULL, NULL),
(16, 6, 15, NULL, NULL),
(17, 6, 16, NULL, NULL),
(18, 6, 17, NULL, NULL),
(19, 7, 18, NULL, NULL),
(20, 7, 19, NULL, NULL),
(21, 7, 20, NULL, NULL),
(22, 8, 21, NULL, NULL),
(23, 8, 22, NULL, NULL),
(24, 8, 23, NULL, NULL),
(25, 9, 24, NULL, NULL),
(26, 9, 25, NULL, NULL),
(27, 9, 26, NULL, NULL),
(28, 10, 27, NULL, NULL),
(29, 10, 28, NULL, NULL),
(30, 10, 29, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `payment_option`, `card_number`, `name_on_card`, `expiration`, `cvv`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Master Card', '76543456789', 'Abdou Shawer', '55/44', '1233', '70', '2021-02-27 22:59:32', '2021-02-27 22:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `key`, `name_ar`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admins list', 'admin', 'قائمة المستخدمين', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(2, 'privileges list', 'privilege', 'قائمة الصلاحيات', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(3, 'show admin', 'admin', 'عرض مستخدم', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(4, 'add admin', 'admin', 'اضافة مستخدم', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(5, 'edit admin', 'admin', 'تعديل مستخدم', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(6, 'delete admin', 'admin', 'حذف مستخدم', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(7, 'show privilege', 'privilege', 'عرض صلاحية', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(8, 'add privilege', 'privilege', 'اضافة صلاحية', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(9, 'edit privilege', 'privilege', 'تعديل صلاحية', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(10, 'delete privilege', 'privilege', 'حذف صلاحية', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(11, 'add reservation', 'reservation', 'اضافة حجز', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `phone_number`, `city_name`, `age`, `gender`, `profile_pic`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, '', '', '', '', 'admin-assets/img/admin-avatar.png', 1, '2021-02-27 02:23:27', '2021-02-27 02:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_food`
--

CREATE TABLE `reserve_food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_gift`
--

CREATE TABLE `reserve_gift` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reserve_gift`
--

INSERT INTO `reserve_gift` (`id`, `sender_id`, `recipient_name`, `recipient_email`, `recipient_number`, `message`, `card_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ali Kamel', 'ali_kamel@gmail.com', '01092635464', 'hello ali\r\nthis is for you', 2, 1, '2021-02-27 22:48:18', '2021-02-27 22:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `name_ar`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'مدير النظام', 'admin-web', '2021-02-27 02:23:27', '2021-02-27 02:23:27');

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
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `name_ar`, `address`, `address_ar`, `city_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Cinema El-Sayarat', 'سينما السيارات', '', '', 1, NULL, '2021-02-16 01:21:54', '2021-02-16 01:24:33'),
(2, 'You Walk', 'يو ووك', '', '', 1, NULL, '2021-02-16 01:23:26', '2021-02-16 01:23:26'),
(3, 'Al Hamra Mall', 'الحمراء مول', '', '', 1, NULL, '2021-02-16 01:24:58', '2021-02-16 01:24:58'),
(4, 'Atyaf Mall', 'أطياف مول', '', '', 1, NULL, '2021-02-16 01:25:33', '2021-02-16 01:25:33'),
(5, 'Markaz ElMamlaka', 'مركز المملكة', '', '', 1, NULL, '2021-02-16 01:26:11', '2021-02-16 01:26:11'),
(6, 'ElQasr Mall', 'القصر مول', '', '', 1, NULL, '2021-02-16 01:26:33', '2021-02-16 01:26:33'),
(7, 'Sahara Mall', 'صحارى مول', '', '', 1, NULL, '2021-02-16 01:26:48', '2021-02-16 01:26:48'),
(8, 'Aziz Mall', 'عزيز مول', '', '', 2, NULL, '2021-02-16 01:27:14', '2021-02-16 01:27:14'),
(9, 'Haifa Mall', 'هيفاء مول', '', '', 2, NULL, '2021-02-16 01:27:31', '2021-02-16 01:27:31'),
(10, 'Mogamaa El-Arab', 'مجمع العرب', '', '', 2, NULL, '2021-02-16 01:27:52', '2021-02-16 01:27:52'),
(11, 'Al-Nakheell Mall', 'النخيل مول', '', '', 3, NULL, '2021-02-16 01:28:14', '2021-02-16 01:28:14'),
(12, 'West Avenue Mall', 'وست أفينيو مول', '', '', 3, NULL, '2021-02-16 01:28:44', '2021-02-16 01:28:44'),
(13, 'Al Dhahran Mall', 'الظهران مول', '', '', 4, NULL, '2021-02-16 01:29:05', '2021-02-16 01:29:05'),
(14, 'Al-Ahsaa Mall', 'الأحساء مول', '', '', 5, NULL, '2021-02-16 01:29:26', '2021-02-16 01:29:26'),
(15, 'Aziz Mall', 'عزيز مول', '', '', 6, NULL, '2021-02-16 01:29:51', '2021-02-16 01:29:51'),
(16, 'Haifa Mall', 'هيفاء مول', '', '', 6, NULL, '2021-02-16 01:30:07', '2021-02-16 01:30:07'),
(17, 'Mogamaa El-Arab', 'مجمع العرب', '', '', 6, NULL, '2021-02-16 01:30:18', '2021-02-16 01:30:18'),
(18, 'M.I.C', 'اي ام سي', '', '', 7, NULL, '2021-02-16 01:30:42', '2021-02-16 01:30:42'),
(19, 'Tabuk Park', 'تبوك بارك', '', '', 8, NULL, '2021-02-16 01:31:11', '2021-02-16 01:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'A1', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(2, 'A2', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(3, 'A3', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(4, 'A4', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(5, 'A5', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(6, 'A6', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(7, 'A7', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(8, 'A8', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(9, 'A9', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(10, 'A10', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(11, 'A11', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(12, 'A12', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(13, 'A13', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(14, 'A14', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(15, 'B1', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(16, 'B2', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(17, 'B3', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(18, 'B4', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(19, 'B5', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(20, 'B6', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(21, 'B7', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(22, 'B8', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(23, 'B9', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(24, 'B10', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(25, 'B11', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(26, 'B12', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(27, 'B13', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(28, 'B14', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(29, 'C1', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(30, 'C2', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(31, 'C3', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(32, 'C4', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(33, 'C5', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(34, 'C6', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(35, 'C7', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(36, 'C8', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(37, 'C9', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(38, 'C10', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(39, 'C11', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(40, 'C12', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(41, 'C13', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(42, 'C14', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(43, 'D1', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(44, 'D2', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(45, 'D3', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(46, 'D4', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(47, 'D5', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(48, 'D6', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(49, 'D7', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(50, 'D8', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(51, 'D9', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(52, 'D10', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(53, 'D11', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(54, 'D12', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(55, 'D13', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(56, 'D14', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(57, 'E1', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(58, 'E2', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(59, 'E3', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(60, 'E4', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(61, 'E5', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(62, 'E6', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(63, 'E7', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(64, 'E8', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(65, 'E9', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(66, 'E10', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(67, 'E11', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(68, 'E12', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(69, 'E13', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(70, 'E14', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(71, 'F1', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(72, 'F2', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(73, 'F3', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(74, 'F4', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(75, 'F5', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(76, 'F6', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(77, 'F7', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(78, 'F8', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(79, 'F9', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(80, 'F10', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(81, 'F11', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(82, 'F12', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(83, 'F13', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(84, 'F14', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(85, 'G1', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(86, 'G2', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(87, 'G3', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(88, 'G4', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(89, 'G5', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(90, 'G6', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(91, 'G7', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(92, 'G8', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(93, 'G9', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(94, 'G10', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(95, 'G11', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(96, 'G12', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(97, 'G13', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(98, 'G14', '2021-02-27 02:23:27', '2021-02-27 02:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `send_emails`
--

CREATE TABLE `send_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `movie_id`, `status`, `start_date`, `end_date`, `days`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'On', '2021-02-23', '2021-03-31', '[\"Saturday\",\"Monday\",\"Wednesday\"]', NULL, '2021-02-22 15:21:52', '2021-02-22 15:21:52'),
(2, 2, 'On', '2021-02-23', '2021-03-31', '[\"Saturday\",\"Monday\"]', NULL, '2021-02-22 16:03:11', '2021-02-22 16:03:11'),
(3, 3, 'On', '2021-02-23', '2021-03-31', '[\"Sunday\",\"Tuesday\"]', NULL, '2021-02-22 16:03:51', '2021-02-22 16:03:51'),
(4, 4, 'On', '2021-02-23', '2021-03-31', '[\"Wednesday\",\"Friday\"]', NULL, '2021-02-22 16:05:03', '2021-02-22 16:05:03'),
(5, 5, 'On', '2021-02-23', '2021-03-31', '[\"Saturday\",\"Monday\",\"Friday\"]', NULL, '2021-02-22 16:11:16', '2021-02-22 16:11:16'),
(6, 6, 'On', '2021-02-23', '2021-03-31', '[\"Sunday\",\"Tuesday\"]', NULL, '2021-02-22 16:13:09', '2021-02-22 16:13:09'),
(7, 7, 'On', '2021-02-23', '2021-03-31', '[\"Sunday\",\"Wednesday\"]', NULL, '2021-02-22 16:14:01', '2021-02-22 16:14:01'),
(8, 8, 'Soon', '2021-02-23', '2021-03-31', '[\"Saturday\",\"Friday\"]', NULL, '2021-02-22 16:14:52', '2021-02-22 16:14:52'),
(9, 9, 'Soon', '2021-02-23', '2021-03-31', '[\"Saturday\",\"Friday\"]', NULL, '2021-02-22 16:15:42', '2021-02-22 16:15:42'),
(10, 10, 'Soon', '2021-02-23', '2021-03-31', '[\"Sunday\",\"Thursday\"]', NULL, '2021-02-22 16:16:26', '2021-02-22 16:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `show_day`
--

CREATE TABLE `show_day` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `show_day`
--

INSERT INTO `show_day` (`id`, `show_id`, `day`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Saturday', '2021-02-27', NULL, NULL),
(2, 1, 'Saturday', '2021-03-06', NULL, NULL),
(3, 1, 'Saturday', '2021-03-13', NULL, NULL),
(4, 1, 'Saturday', '2021-03-20', NULL, NULL),
(5, 1, 'Saturday', '2021-03-27', NULL, NULL),
(6, 1, 'Monday', '2021-03-01', NULL, NULL),
(7, 1, 'Monday', '2021-03-08', NULL, NULL),
(8, 1, 'Monday', '2021-03-15', NULL, NULL),
(9, 1, 'Monday', '2021-03-22', NULL, NULL),
(10, 1, 'Monday', '2021-03-29', NULL, NULL),
(11, 1, 'Wednesday', '2021-02-24', NULL, NULL),
(12, 1, 'Wednesday', '2021-03-03', NULL, NULL),
(13, 1, 'Wednesday', '2021-03-10', NULL, NULL),
(14, 1, 'Wednesday', '2021-03-17', NULL, NULL),
(15, 1, 'Wednesday', '2021-03-24', NULL, NULL),
(16, 1, 'Wednesday', '2021-03-31', NULL, NULL),
(17, 2, 'Saturday', '2021-02-27', NULL, NULL),
(18, 2, 'Saturday', '2021-03-06', NULL, NULL),
(19, 2, 'Saturday', '2021-03-13', NULL, NULL),
(20, 2, 'Saturday', '2021-03-20', NULL, NULL),
(21, 2, 'Saturday', '2021-03-27', NULL, NULL),
(22, 2, 'Monday', '2021-03-01', NULL, NULL),
(23, 2, 'Monday', '2021-03-08', NULL, NULL),
(24, 2, 'Monday', '2021-03-15', NULL, NULL),
(25, 2, 'Monday', '2021-03-22', NULL, NULL),
(26, 2, 'Monday', '2021-03-29', NULL, NULL),
(27, 3, 'Sunday', '2021-02-28', NULL, NULL),
(28, 3, 'Sunday', '2021-03-07', NULL, NULL),
(29, 3, 'Sunday', '2021-03-14', NULL, NULL),
(30, 3, 'Sunday', '2021-03-21', NULL, NULL),
(31, 3, 'Sunday', '2021-03-28', NULL, NULL),
(32, 3, 'Tuesday', '2021-02-23', NULL, NULL),
(33, 3, 'Tuesday', '2021-03-02', NULL, NULL),
(34, 3, 'Tuesday', '2021-03-09', NULL, NULL),
(35, 3, 'Tuesday', '2021-03-16', NULL, NULL),
(36, 3, 'Tuesday', '2021-03-23', NULL, NULL),
(37, 3, 'Tuesday', '2021-03-30', NULL, NULL),
(38, 4, 'Wednesday', '2021-02-24', NULL, NULL),
(39, 4, 'Wednesday', '2021-03-03', NULL, NULL),
(40, 4, 'Wednesday', '2021-03-10', NULL, NULL),
(41, 4, 'Wednesday', '2021-03-17', NULL, NULL),
(42, 4, 'Wednesday', '2021-03-24', NULL, NULL),
(43, 4, 'Wednesday', '2021-03-31', NULL, NULL),
(44, 4, 'Friday', '2021-02-26', NULL, NULL),
(45, 4, 'Friday', '2021-03-05', NULL, NULL),
(46, 4, 'Friday', '2021-03-12', NULL, NULL),
(47, 4, 'Friday', '2021-03-19', NULL, NULL),
(48, 4, 'Friday', '2021-03-26', NULL, NULL),
(49, 5, 'Saturday', '2021-02-27', NULL, NULL),
(50, 5, 'Saturday', '2021-03-06', NULL, NULL),
(51, 5, 'Saturday', '2021-03-13', NULL, NULL),
(52, 5, 'Saturday', '2021-03-20', NULL, NULL),
(53, 5, 'Saturday', '2021-03-27', NULL, NULL),
(54, 5, 'Monday', '2021-03-01', NULL, NULL),
(55, 5, 'Monday', '2021-03-08', NULL, NULL),
(56, 5, 'Monday', '2021-03-15', NULL, NULL),
(57, 5, 'Monday', '2021-03-22', NULL, NULL),
(58, 5, 'Monday', '2021-03-29', NULL, NULL),
(59, 5, 'Friday', '2021-02-26', NULL, NULL),
(60, 5, 'Friday', '2021-03-05', NULL, NULL),
(61, 5, 'Friday', '2021-03-12', NULL, NULL),
(62, 5, 'Friday', '2021-03-19', NULL, NULL),
(63, 5, 'Friday', '2021-03-26', NULL, NULL),
(64, 6, 'Sunday', '2021-02-28', NULL, NULL),
(65, 6, 'Sunday', '2021-03-07', NULL, NULL),
(66, 6, 'Sunday', '2021-03-14', NULL, NULL),
(67, 6, 'Sunday', '2021-03-21', NULL, NULL),
(68, 6, 'Sunday', '2021-03-28', NULL, NULL),
(69, 6, 'Tuesday', '2021-02-23', NULL, NULL),
(70, 6, 'Tuesday', '2021-03-02', NULL, NULL),
(71, 6, 'Tuesday', '2021-03-09', NULL, NULL),
(72, 6, 'Tuesday', '2021-03-16', NULL, NULL),
(73, 6, 'Tuesday', '2021-03-23', NULL, NULL),
(74, 6, 'Tuesday', '2021-03-30', NULL, NULL),
(75, 7, 'Sunday', '2021-02-28', NULL, NULL),
(76, 7, 'Sunday', '2021-03-07', NULL, NULL),
(77, 7, 'Sunday', '2021-03-14', NULL, NULL),
(78, 7, 'Sunday', '2021-03-21', NULL, NULL),
(79, 7, 'Sunday', '2021-03-28', NULL, NULL),
(80, 7, 'Wednesday', '2021-02-24', NULL, NULL),
(81, 7, 'Wednesday', '2021-03-03', NULL, NULL),
(82, 7, 'Wednesday', '2021-03-10', NULL, NULL),
(83, 7, 'Wednesday', '2021-03-17', NULL, NULL),
(84, 7, 'Wednesday', '2021-03-24', NULL, NULL),
(85, 7, 'Wednesday', '2021-03-31', NULL, NULL),
(86, 8, 'Saturday', '2021-02-27', NULL, NULL),
(87, 8, 'Saturday', '2021-03-06', NULL, NULL),
(88, 8, 'Saturday', '2021-03-13', NULL, NULL),
(89, 8, 'Saturday', '2021-03-20', NULL, NULL),
(90, 8, 'Saturday', '2021-03-27', NULL, NULL),
(91, 8, 'Friday', '2021-02-26', NULL, NULL),
(92, 8, 'Friday', '2021-03-05', NULL, NULL),
(93, 8, 'Friday', '2021-03-12', NULL, NULL),
(94, 8, 'Friday', '2021-03-19', NULL, NULL),
(95, 8, 'Friday', '2021-03-26', NULL, NULL),
(96, 9, 'Saturday', '2021-02-27', NULL, NULL),
(97, 9, 'Saturday', '2021-03-06', NULL, NULL),
(98, 9, 'Saturday', '2021-03-13', NULL, NULL),
(99, 9, 'Saturday', '2021-03-20', NULL, NULL),
(100, 9, 'Saturday', '2021-03-27', NULL, NULL),
(101, 9, 'Friday', '2021-02-26', NULL, NULL),
(102, 9, 'Friday', '2021-03-05', NULL, NULL),
(103, 9, 'Friday', '2021-03-12', NULL, NULL),
(104, 9, 'Friday', '2021-03-19', NULL, NULL),
(105, 9, 'Friday', '2021-03-26', NULL, NULL),
(106, 10, 'Sunday', '2021-02-28', NULL, NULL),
(107, 10, 'Sunday', '2021-03-07', NULL, NULL),
(108, 10, 'Sunday', '2021-03-14', NULL, NULL),
(109, 10, 'Sunday', '2021-03-21', NULL, NULL),
(110, 10, 'Sunday', '2021-03-28', NULL, NULL),
(111, 10, 'Thursday', '2021-02-25', NULL, NULL),
(112, 10, 'Thursday', '2021-03-04', NULL, NULL),
(113, 10, 'Thursday', '2021-03-11', NULL, NULL),
(114, 10, 'Thursday', '2021-03-18', NULL, NULL),
(115, 10, 'Thursday', '2021-03-25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `show_hall`
--

CREATE TABLE `show_hall` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `show_hall`
--

INSERT INTO `show_hall` (`id`, `show_id`, `room_id`, `hall_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 1, 1, 2, NULL, NULL),
(3, 1, 1, 3, NULL, NULL),
(4, 1, 4, 1, NULL, NULL),
(5, 1, 4, 2, NULL, NULL),
(6, 1, 4, 3, NULL, NULL),
(7, 1, 5, 1, NULL, NULL),
(8, 1, 5, 2, NULL, NULL),
(9, 1, 5, 3, NULL, NULL),
(10, 1, 6, 1, NULL, NULL),
(11, 1, 6, 2, NULL, NULL),
(12, 1, 6, 3, NULL, NULL),
(13, 1, 7, 1, NULL, NULL),
(14, 1, 7, 2, NULL, NULL),
(15, 1, 7, 3, NULL, NULL),
(16, 1, 8, 1, NULL, NULL),
(17, 1, 8, 2, NULL, NULL),
(18, 1, 8, 3, NULL, NULL),
(19, 1, 9, 1, NULL, NULL),
(20, 1, 9, 2, NULL, NULL),
(21, 1, 9, 3, NULL, NULL),
(22, 1, 10, 1, NULL, NULL),
(23, 1, 10, 2, NULL, NULL),
(24, 1, 10, 3, NULL, NULL),
(25, 1, 12, 1, NULL, NULL),
(26, 1, 12, 2, NULL, NULL),
(27, 1, 12, 3, NULL, NULL),
(28, 1, 13, 1, NULL, NULL),
(29, 1, 13, 2, NULL, NULL),
(30, 1, 13, 3, NULL, NULL),
(31, 1, 14, 1, NULL, NULL),
(32, 1, 14, 2, NULL, NULL),
(33, 1, 14, 3, NULL, NULL),
(34, 1, 15, 1, NULL, NULL),
(35, 1, 15, 2, NULL, NULL),
(36, 1, 15, 3, NULL, NULL),
(37, 1, 16, 1, NULL, NULL),
(38, 1, 16, 2, NULL, NULL),
(39, 1, 16, 3, NULL, NULL),
(40, 1, 18, 1, NULL, NULL),
(41, 1, 18, 2, NULL, NULL),
(42, 1, 18, 3, NULL, NULL),
(43, 1, 19, 1, NULL, NULL),
(44, 1, 19, 2, NULL, NULL),
(45, 1, 19, 3, NULL, NULL),
(46, 2, 1, 1, NULL, NULL),
(47, 2, 1, 2, NULL, NULL),
(48, 2, 16, 1, NULL, NULL),
(49, 2, 16, 2, NULL, NULL),
(50, 2, 18, 1, NULL, NULL),
(51, 2, 18, 2, NULL, NULL),
(52, 3, 10, 2, NULL, NULL),
(53, 3, 10, 3, NULL, NULL),
(54, 3, 11, 2, NULL, NULL),
(55, 3, 11, 3, NULL, NULL),
(56, 3, 12, 2, NULL, NULL),
(57, 3, 12, 3, NULL, NULL),
(58, 4, 4, 2, NULL, NULL),
(59, 4, 5, 2, NULL, NULL),
(60, 4, 7, 2, NULL, NULL),
(61, 4, 11, 2, NULL, NULL),
(62, 4, 12, 2, NULL, NULL),
(63, 4, 13, 2, NULL, NULL),
(64, 5, 8, 1, NULL, NULL),
(65, 5, 8, 3, NULL, NULL),
(66, 5, 9, 1, NULL, NULL),
(67, 5, 9, 3, NULL, NULL),
(68, 5, 12, 1, NULL, NULL),
(69, 5, 12, 3, NULL, NULL),
(70, 5, 13, 1, NULL, NULL),
(71, 5, 13, 3, NULL, NULL),
(72, 5, 16, 1, NULL, NULL),
(73, 5, 16, 3, NULL, NULL),
(74, 5, 18, 1, NULL, NULL),
(75, 5, 18, 3, NULL, NULL),
(76, 6, 4, 2, NULL, NULL),
(77, 6, 9, 2, NULL, NULL),
(78, 6, 15, 2, NULL, NULL),
(79, 6, 18, 2, NULL, NULL),
(80, 7, 6, 2, NULL, NULL),
(81, 7, 11, 2, NULL, NULL),
(82, 7, 11, 3, NULL, NULL),
(83, 7, 12, 1, NULL, NULL),
(84, 7, 12, 2, NULL, NULL),
(85, 7, 13, 1, NULL, NULL),
(86, 7, 13, 3, NULL, NULL),
(87, 8, 2, 1, NULL, NULL),
(88, 8, 2, 2, NULL, NULL),
(89, 8, 9, 1, NULL, NULL),
(90, 8, 9, 2, NULL, NULL),
(91, 8, 17, 3, NULL, NULL),
(92, 8, 18, 1, NULL, NULL),
(93, 8, 18, 3, NULL, NULL),
(94, 9, 2, 1, NULL, NULL),
(95, 9, 2, 2, NULL, NULL),
(96, 9, 14, 1, NULL, NULL),
(97, 9, 14, 2, NULL, NULL),
(98, 9, 18, 1, NULL, NULL),
(99, 9, 18, 2, NULL, NULL),
(100, 10, 1, 1, NULL, NULL),
(101, 10, 1, 2, NULL, NULL),
(102, 10, 2, 2, NULL, NULL),
(103, 10, 2, 3, NULL, NULL),
(104, 10, 11, 1, NULL, NULL),
(105, 10, 11, 3, NULL, NULL),
(106, 10, 18, 1, NULL, NULL),
(107, 10, 18, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `show_room`
--

CREATE TABLE `show_room` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `show_room`
--

INSERT INTO `show_room` (`id`, `show_id`, `room_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 1, 5, NULL, NULL),
(4, 1, 6, NULL, NULL),
(5, 1, 7, NULL, NULL),
(6, 1, 8, NULL, NULL),
(7, 1, 9, NULL, NULL),
(8, 1, 10, NULL, NULL),
(9, 1, 12, NULL, NULL),
(10, 1, 13, NULL, NULL),
(11, 1, 14, NULL, NULL),
(12, 1, 15, NULL, NULL),
(13, 1, 16, NULL, NULL),
(14, 1, 18, NULL, NULL),
(15, 1, 19, NULL, NULL),
(16, 2, 1, NULL, NULL),
(17, 2, 16, NULL, NULL),
(18, 2, 18, NULL, NULL),
(19, 3, 10, NULL, NULL),
(20, 3, 11, NULL, NULL),
(21, 3, 12, NULL, NULL),
(22, 4, 4, NULL, NULL),
(23, 4, 5, NULL, NULL),
(24, 4, 7, NULL, NULL),
(25, 4, 11, NULL, NULL),
(26, 4, 12, NULL, NULL),
(27, 4, 13, NULL, NULL),
(28, 5, 8, NULL, NULL),
(29, 5, 9, NULL, NULL),
(30, 5, 12, NULL, NULL),
(31, 5, 13, NULL, NULL),
(32, 5, 16, NULL, NULL),
(33, 5, 18, NULL, NULL),
(34, 6, 4, NULL, NULL),
(35, 6, 9, NULL, NULL),
(36, 6, 15, NULL, NULL),
(37, 6, 18, NULL, NULL),
(38, 7, 6, NULL, NULL),
(39, 7, 11, NULL, NULL),
(40, 7, 12, NULL, NULL),
(41, 7, 13, NULL, NULL),
(42, 8, 2, NULL, NULL),
(43, 8, 9, NULL, NULL),
(44, 8, 17, NULL, NULL),
(45, 8, 18, NULL, NULL),
(46, 9, 2, NULL, NULL),
(47, 9, 14, NULL, NULL),
(48, 9, 18, NULL, NULL),
(49, 10, 1, NULL, NULL),
(50, 10, 2, NULL, NULL),
(51, 10, 11, NULL, NULL),
(52, 10, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `show_seat`
--

CREATE TABLE `show_seat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `show_time`
--

CREATE TABLE `show_time` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `show_time`
--

INSERT INTO `show_time` (`id`, `show_id`, `day`, `time`, `created_at`, `updated_at`) VALUES
(1, 1, 'Saturday', '7:00 pm', NULL, NULL),
(2, 1, 'Saturday', '9:30 pm', NULL, NULL),
(3, 1, 'Monday', '5:00 pm', NULL, NULL),
(4, 1, 'Monday', '6:30 pm', NULL, NULL),
(5, 1, 'Wednesday', '9:30 pm', NULL, NULL),
(6, 1, 'Wednesday', '11:00 pm', NULL, NULL),
(7, 2, 'Saturday', '5:00 pm', NULL, NULL),
(8, 2, 'Saturday', '7:00 pm', NULL, NULL),
(9, 2, 'Monday', '5:00 pm', NULL, NULL),
(10, 2, 'Monday', '7:00 pm', NULL, NULL),
(11, 3, 'Sunday', '8:00 pm', NULL, NULL),
(12, 3, 'Sunday', '10:00 pm', NULL, NULL),
(13, 3, 'Tuesday', '8:00 pm', NULL, NULL),
(14, 3, 'Tuesday', '10:00 pm', NULL, NULL),
(15, 4, 'Wednesday', '5:00 pm', NULL, NULL),
(16, 4, 'Wednesday', '7:00 pm', NULL, NULL),
(17, 4, 'Friday', '8:00 pm', NULL, NULL),
(18, 4, 'Friday', '11:00 pm', NULL, NULL),
(19, 5, 'Saturday', '5:00 pm', NULL, NULL),
(20, 5, 'Saturday', '8:00 pm', NULL, NULL),
(21, 5, 'Saturday', '10:00 pm', NULL, NULL),
(22, 5, 'Monday', '5:00 pm', NULL, NULL),
(23, 5, 'Monday', '8:00 pm', NULL, NULL),
(24, 5, 'Monday', '11:00 pm', NULL, NULL),
(25, 5, 'Friday', '7:00 pm', NULL, NULL),
(26, 5, 'Friday', '9:15 pm', NULL, NULL),
(27, 6, 'Sunday', '7:30 pm', NULL, NULL),
(28, 6, 'Sunday', '9:30 pm', NULL, NULL),
(29, 6, 'Tuesday', '7:00 pm', NULL, NULL),
(30, 6, 'Tuesday', '11:00 pm', NULL, NULL),
(31, 7, 'Sunday', '7:00 pm', NULL, NULL),
(32, 7, 'Sunday', '10:00 pm', NULL, NULL),
(33, 7, 'Wednesday', '7:30 pm', NULL, NULL),
(34, 7, 'Wednesday', '11:00 pm', NULL, NULL),
(35, 8, 'Saturday', '5:00 pm', NULL, NULL),
(36, 8, 'Saturday', '7:00 pm', NULL, NULL),
(37, 8, 'Friday', '8:15 pm', NULL, NULL),
(38, 8, 'Friday', '10:00 pm', NULL, NULL),
(39, 9, 'Saturday', '5:00 pm', NULL, NULL),
(40, 9, 'Saturday', '10:30 pm', NULL, NULL),
(41, 9, 'Friday', '5:30 pm', NULL, NULL),
(42, 9, 'Friday', '8:30 pm', NULL, NULL),
(43, 10, 'Sunday', '6:15 pm', NULL, NULL),
(44, 10, 'Sunday', '10:00 pm', NULL, NULL),
(45, 10, 'Thursday', '9:00 pm', NULL, NULL),
(46, 10, 'Thursday', '11:45 pm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `name`, `name_ar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Nicolas Cage', 'نيكولاس كيج', NULL, '2021-02-14 07:05:25', '2021-02-14 07:05:25'),
(2, 'Emma Stone', 'ايما ستون', NULL, '2021-02-14 07:05:43', '2021-02-14 07:05:43'),
(3, 'Ryan Reynolds', 'رايان رينولدز', NULL, '2021-02-14 07:06:05', '2021-02-14 07:06:05'),
(4, 'Tom Hanks', 'توم هانكس', NULL, '2021-02-14 07:07:35', '2021-02-14 07:07:35'),
(5, 'Helena Zengel', 'هيلينا زينجل', NULL, '2021-02-14 07:07:57', '2021-02-14 07:07:57'),
(6, 'Neil Sandilands', 'نيل سانديلاندس', NULL, '2021-02-14 07:08:26', '2021-02-14 07:08:26'),
(7, 'Denzel Washington', 'دنزل واشنطن', NULL, '2021-02-14 07:09:06', '2021-02-14 07:09:06'),
(8, 'Rami Malek', 'رامى مالك', NULL, '2021-02-14 07:09:21', '2021-02-14 07:09:21'),
(9, 'Jared Leto', 'جاريد ليتو', NULL, '2021-02-14 07:09:44', '2021-02-14 07:09:44'),
(10, 'Josh Brolin', 'جوش برولين', NULL, '2021-02-14 07:10:22', '2021-02-14 07:10:22'),
(11, 'Morena Baccarin', 'مورينا باكارين', NULL, '2021-02-14 07:10:46', '2021-02-14 07:10:46'),
(12, 'Robert Downey Jr', 'روبرت داونى جونيور', NULL, '2021-02-14 07:11:33', '2021-02-14 07:11:33'),
(13, 'Chris Evans', 'كريس ايفانز', NULL, '2021-02-14 07:11:51', '2021-02-14 07:11:51'),
(14, 'Mark Ruffalo', 'مارك رافالو', NULL, '2021-02-14 07:12:10', '2021-02-14 07:12:10'),
(15, 'Matthew McConaughey', 'ماثيو ماكونهى', NULL, '2021-02-14 07:13:09', '2021-02-14 07:13:09'),
(16, 'Anne Hathaway', 'ان هاثاوى', NULL, '2021-02-14 07:13:34', '2021-02-14 07:13:34'),
(17, 'Jessica Chastain', 'جيسيكا شاستاين', NULL, '2021-02-14 07:14:01', '2021-02-14 07:14:15'),
(18, 'Joaquin Phoenix', 'خواكين فينيكس', NULL, '2021-02-14 07:16:28', '2021-02-14 07:16:28'),
(19, 'Robert De Niro', 'روبرت دى نيرو', NULL, '2021-02-14 07:17:39', '2021-02-14 07:17:39'),
(20, 'Zazie Beetz', 'زازى بيتز', NULL, '2021-02-14 07:17:56', '2021-02-14 07:17:56'),
(21, 'James Marsden', 'جيمس مارسدن', NULL, '2021-02-14 07:18:28', '2021-02-14 07:18:28'),
(22, 'Jeff Goldblum', 'جيف غولدبلوم', NULL, '2021-02-14 07:18:52', '2021-02-14 07:18:52'),
(23, 'Amy Sedaris', 'إيمي سيداريس', NULL, '2021-02-14 07:19:07', '2021-02-14 07:19:07'),
(24, 'Bob Odenkirk', 'بوب أودينكيرك', NULL, '2021-02-14 07:19:29', '2021-02-14 07:19:29'),
(25, 'Connie Nielsen', 'كوني نيلسن', NULL, '2021-02-14 07:19:44', '2021-02-14 07:19:44'),
(26, 'Christopher Lloyd', 'كريستوفر لويد', NULL, '2021-02-14 07:20:04', '2021-02-14 07:20:04'),
(27, 'Alexander Skarsgård', 'ألكسندر سكارسجارد', NULL, '2021-02-14 07:20:29', '2021-02-14 07:20:29'),
(28, 'Millie Bobby Brown', 'ميلي بوبي براون', NULL, '2021-02-14 07:20:46', '2021-02-14 07:20:46'),
(29, 'Rebecca Hall', 'ريبيكا هول', NULL, '2021-02-14 07:21:04', '2021-02-14 07:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscribe_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `time`, `created_at`, `updated_at`) VALUES
(1, '5:00 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(2, '5:15 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(3, '5:30 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(4, '5:45 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(5, '6:00 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(6, '6:15 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(7, '6:30 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(8, '6:45 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(9, '7:00 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(10, '7:15 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(11, '7:30 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(12, '7:45 pm', '2021-02-27 02:23:27', '2021-02-27 02:23:27'),
(13, '8:00 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(14, '8:15 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(15, '8:30 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(16, '8:45 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(17, '9:00 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(18, '9:15 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(19, '9:30 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(20, '9:45 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(21, '10:00 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(22, '10:15 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(23, '10:30 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(24, '10:45 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(25, '11:00 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(26, '11:15 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(27, '11:30 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(28, '11:45 pm', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(29, '12:00 am', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(30, '12:15 am', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(31, '12:30 am', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(32, '12:45 am', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(33, '1:00 am', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(34, '1:15 am', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(35, '1:30 am', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(36, '1:45 am', '2021-02-27 02:23:28', '2021-02-27 02:23:28'),
(37, '2:00 am', '2021-02-27 02:23:28', '2021-02-27 02:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `provider_id`, `avatar`, `email`, `email_verified_at`, `password`, `status`, `phone`, `api_token`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mona Mostafa 2', NULL, 'uploads/users/profiles/1/Abdou.jpg', 'mona_mostafa22@gmail.com', '2021-02-27 02:28:58', '$2y$10$wUxO3nhufBunnRnFg.qowed/P697JuOljtzNIkia7IDmqjMj.xtK.', 'active', '65434567', NULL, NULL, 'nvM2Vuumb6jCeAO3brm8irKIhe87owfB7AJGUeqrpkiS1EJj2rqdiZxKB9u1', '2021-02-27 02:24:25', '2021-02-27 11:20:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_api_token_unique` (`api_token`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  ADD KEY `audits_user_id_user_type_index` (`user_id`,`user_type`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foods_type_id_foreign` (`type_id`);

--
-- Indexes for table `foods_types`
--
ALTER TABLE `foods_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_genre_movie_id_foreign` (`movie_id`),
  ADD KEY `movie_genre_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `movie_star`
--
ALTER TABLE `movie_star`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_star_movie_id_foreign` (`movie_id`),
  ADD KEY `movie_star_star_id_foreign` (`star_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_seat_id_foreign` (`seat_id`);

--
-- Indexes for table `reserve_food`
--
ALTER TABLE `reserve_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserve_food_user_id_foreign` (`user_id`),
  ADD KEY `reserve_food_food_id_foreign` (`food_id`);

--
-- Indexes for table `reserve_gift`
--
ALTER TABLE `reserve_gift`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserve_gift_sender_id_foreign` (`sender_id`),
  ADD KEY `reserve_gift_card_id_foreign` (`card_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `rooms_city_id_foreign` (`city_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_emails`
--
ALTER TABLE `send_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shows_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `show_day`
--
ALTER TABLE `show_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_day_show_id_foreign` (`show_id`);

--
-- Indexes for table `show_hall`
--
ALTER TABLE `show_hall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_hall_show_id_foreign` (`show_id`),
  ADD KEY `show_hall_room_id_foreign` (`room_id`),
  ADD KEY `show_hall_hall_id_foreign` (`hall_id`);

--
-- Indexes for table `show_room`
--
ALTER TABLE `show_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_room_show_id_foreign` (`show_id`),
  ADD KEY `show_room_room_id_foreign` (`room_id`);

--
-- Indexes for table `show_seat`
--
ALTER TABLE `show_seat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_seat_show_id_foreign` (`show_id`),
  ADD KEY `show_seat_room_id_foreign` (`room_id`),
  ADD KEY `show_seat_hall_id_foreign` (`hall_id`);

--
-- Indexes for table `show_time`
--
ALTER TABLE `show_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_time_show_id_foreign` (`show_id`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `foods_types`
--
ALTER TABLE `foods_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `movie_star`
--
ALTER TABLE `movie_star`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserve_food`
--
ALTER TABLE `reserve_food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserve_gift`
--
ALTER TABLE `reserve_gift`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `send_emails`
--
ALTER TABLE `send_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `show_day`
--
ALTER TABLE `show_day`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `show_hall`
--
ALTER TABLE `show_hall`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `show_room`
--
ALTER TABLE `show_room`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `show_seat`
--
ALTER TABLE `show_seat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `show_time`
--
ALTER TABLE `show_time`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `foods_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_genre_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_star`
--
ALTER TABLE `movie_star`
  ADD CONSTRAINT `movie_star_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_star_star_id_foreign` FOREIGN KEY (`star_id`) REFERENCES `stars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `show_seat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserve_food`
--
ALTER TABLE `reserve_food`
  ADD CONSTRAINT `reserve_food_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserve_food_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserve_gift`
--
ALTER TABLE `reserve_gift`
  ADD CONSTRAINT `reserve_gift_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `gifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserve_gift_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `rooms_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `show_day`
--
ALTER TABLE `show_day`
  ADD CONSTRAINT `show_day_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `show_hall`
--
ALTER TABLE `show_hall`
  ADD CONSTRAINT `show_hall_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `show_hall_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `show_hall_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `show_room`
--
ALTER TABLE `show_room`
  ADD CONSTRAINT `show_room_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `show_room_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `show_seat`
--
ALTER TABLE `show_seat`
  ADD CONSTRAINT `show_seat_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `show_seat_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `show_seat_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `show_time`
--
ALTER TABLE `show_time`
  ADD CONSTRAINT `show_time_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
