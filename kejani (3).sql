-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 11:05 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kejani`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255)  NOT NULL,
  `phone` varchar(255)  NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Maxwell Maragia', 'maxmaragia@gmail.com', NULL, '$2a$12$DWMV/Q.7DzzkVR5.3Ep2EuTznJ4V0PpFCnbDgiISxFXqA8GpYS.TO', '0707338839', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media` varchar(255)  NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `media`, `status`, `created_at`, `updated_at`) VALUES
(1, 'public/files/banners/TLG2HM9o0OEaz6jkptpFslj9otKKxgUcW1HgVLp9.jpg', 1, '2021-10-24 03:29:15', '2021-10-29 11:36:32'),
(2, 'public/files/banners/yqByXwfAErsYdMQep7QlHhWhr337zHOUFOdSKo6f.jpg', 1, '2021-10-24 03:30:18', '2021-10-29 11:38:22'),
(3, 'public/files/banners/HWLJ6vpoOSglkya1K62NHKxE8pWHq4UeutKdYIii.jpg', 1, '2021-11-01 04:47:15', '2021-11-01 04:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kilimani', 'kilimani', '2021-10-31 02:25:48', '2021-10-31 02:25:48'),
(2, 'Best locations', 'best-locations', '2021-10-31 02:25:54', '2021-10-31 02:25:54'),
(3, 'Beginner guide', 'beginner-guide', '2021-10-31 02:26:02', '2021-10-31 02:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `category_posts`
--

CREATE TABLE `category_posts` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `category_posts`
--

INSERT INTO `category_posts` (`post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 3, NULL, NULL),
(2, 3, NULL, NULL),
(3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `mobile` varchar(255)  DEFAULT NULL,
  `subject` text  NOT NULL,
  `message` text  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text  NOT NULL,
  `queue` text  NOT NULL,
  `payload` longtext  NOT NULL,
  `exception` longtext  NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Wifi', '2021-10-22 05:01:13', '2021-10-22 05:01:13'),
(2, 'Swimming pool', '2021-10-30 05:32:54', '2021-10-30 05:32:54'),
(3, 'Servant quarters', '2021-10-30 05:33:03', '2021-10-30 05:33:03'),
(4, 'Flower garden', '2021-10-30 05:33:08', '2021-10-30 05:33:08'),
(5, 'Dog shed', '2021-10-30 05:33:11', '2021-10-30 05:33:11'),
(6, 'Hammock', '2021-10-30 05:33:15', '2021-10-30 05:33:15'),
(7, 'Pavement', '2021-10-30 05:33:20', '2021-10-30 05:33:20'),
(8, '4 cars garage', '2021-10-30 05:33:25', '2021-10-30 05:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255)  NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_12_135821_create_posts_table', 1),
(5, '2020_04_12_140319_create_tags_table', 1),
(6, '2020_04_12_140426_create_categories_table', 1),
(7, '2020_04_12_140501_create_category_posts_table', 1),
(8, '2020_04_12_140619_create_post_tags_table', 1),
(9, '2020_04_12_140709_create_admins_table', 1),
(10, '2020_04_26_095600_create_seos_table', 1),
(11, '2020_04_26_100513_create_services_table', 1),
(12, '2020_04_26_100951_create_team_members_table', 1),
(13, '2020_04_26_101100_create_testimonials_table', 1),
(14, '2020_04_26_101206_create_banners_table', 1),
(15, '2020_05_08_201703_settings', 1),
(16, '2020_09_15_105517_create_properties_table', 1),
(17, '2020_09_15_110331_create_features_table', 1),
(18, '2020_09_25_080944_create_enquiries_table', 1),
(19, '2020_09_25_082802_create_types_table', 1),
(20, '2020_09_25_082920_create_property_types_table', 1),
(21, '2020_09_25_083055_create_property_features_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255)  NOT NULL,
  `token` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('maxmaragia@gmail.com', '$2y$10$ANJCdQ2IwuEUwoJ7RT26z.Feqpmo9yRgHxKTOVM/TmXvJWX79QXp.', '2021-10-29 12:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(256)  NOT NULL,
  `subtitle` longtext  NOT NULL,
  `slug` varchar(100)  NOT NULL,
  `body` longtext  NOT NULL,
  `keywords` longtext  NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `featured` tinyint(1) DEFAULT 0,
  `posted_by` int(11) DEFAULT NULL,
  `image` varchar(255)  DEFAULT NULL,
  `feature_image` varchar(255)  DEFAULT NULL,
  `likes` int(11) DEFAULT 0,
  `dislikes` int(11) DEFAULT 0,
  `meta_author` varchar(255)  DEFAULT NULL,
  `meta_title` varchar(255)  DEFAULT NULL,
  `meta_description` varchar(255)  DEFAULT NULL,
  `meta_keywords` varchar(255)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `slug`, `body`, `keywords`, `status`, `featured`, `posted_by`, `image`, `feature_image`, `likes`, `dislikes`, `meta_author`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'How to choose what to buy', 'Choosing what to buy can be a stress for many people. Lets advise you...', 'how-to-choose-what-to-buy', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.</p>\r\n\r\n<blockquote><q>Deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitae volutatem accusantium doloremue laudantium, totam rem aeriam.</q></blockquote>\r\n\r\n<p>Sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrudism exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis.</p>\r\n\r\n<p>Sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo.</p>', 'How to choose what to buy Choosing what to buy can be a stress for many people. Lets advise you... Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim. Deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitae volutatem accusantium doloremue laudantium, totam rem aeriam. Sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrudism exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis. Sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo.', 1, 1, 1, 'public/files/blog_images/PtIycpbi5b4WUqpxr1Rfe9AeqELmBUlPwOBBTUwB.jpg', 'public/files/blog_images/tIsiHhqWYhXPQj1lIEWFgo6zKlyp8zrv97luRbdC.jpg', 0, 0, NULL, NULL, NULL, NULL, '2021-10-31 02:28:14', '2021-11-02 16:00:29'),
(2, 'Kileleshwa shopping centres', 'Stuck where to shop? read this guide to see the list of best shopping malls...', 'kileleshwa-shopping-centres', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.</p>\r\n\r\n<blockquote><q>Deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitae volutatem accusantium doloremue laudantium, totam rem aeriam.</q></blockquote>\r\n\r\n<p>Sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrudism exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis.</p>\r\n\r\n<p>Sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo.</p>', 'Kileleshwa shopping centres Stuck where to shop? read this guide to see the list of best shopping malls... Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.\r\n\r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.\r\n\r\nDeserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitae volutatem accusantium doloremue laudantium, totam rem aeriam.\r\n\r\nSed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrudism exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis.\r\n\r\nSunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo.', 1, NULL, 1, 'public/files/blog_images/WNXvkBLjucrgZ3VTQxhjnZMRJ2XhGffzlU2zcrzN.jpg', NULL, 0, 0, NULL, NULL, NULL, NULL, '2021-10-31 02:38:42', '2021-10-31 02:38:42'),
(3, 'How to not get swindled', 'Property buying is a risky affair, Read to find tips on not getting conned...', 'how-to-not-get-swindled', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.</p>\r\n\r\n<blockquote><q>Deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitae volutatem accusantium doloremue laudantium, totam rem aeriam.</q></blockquote>\r\n\r\n<p>Sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrudism exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis.</p>\r\n\r\n<p>Sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo.</p>', 'How to not get swindled Property buying is a risky affair, Read to find tips on not getting conned... Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.\r\n\r\nExcepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.\r\n\r\nDeserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitae volutatem accusantium doloremue laudantium, totam rem aeriam.\r\n\r\nSed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrudism exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis.\r\n\r\nSunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo.', 1, NULL, 1, 'public/files/blog_images/Id4Tf1zYw5mqDWaZgNamKpjKufxVOofHSEhVoXZF.jpg', NULL, 0, 0, NULL, NULL, NULL, NULL, '2021-10-31 02:41:00', '2021-10-31 02:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `price` varchar(255)  NOT NULL,
  `size` varchar(255)  NOT NULL,
  `bedroom` int(11) DEFAULT 0,
  `bathroom` int(11) DEFAULT 0,
  `image` varchar(255)  DEFAULT NULL,
  `featured` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `new_development` tinyint(1) DEFAULT 0,
  `description` longtext  NOT NULL,
  `completion_date` varchar(255)  DEFAULT NULL,
  `meta_title` varchar(255)  DEFAULT NULL,
  `meta_description` varchar(255)  DEFAULT NULL,
  `meta_keywords` varchar(255)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `slug`, `price`, `size`, `bedroom`, `bathroom`, `image`, `featured`, `status`, `new_development`, `description`, `completion_date`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(2, 'KILIMANI 2 BEDROOM 9.5M', 'kilimani-2-bedroom-9.5m', '9,500,000', '100 metres squared', 2, 3, 'public/properties/2/RjZ8mnxBHb9afY88Fp6SgGGZH20YUSYDRAVIiiV9.jpg', 1, 1, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.</p>', NULL, 'KILIMANI 2 BEDROOM 9.5M', 'KILIMANI 2 BEDROOM 9.5M', 'KILIMANI 2 BEDROOM 9.5M', '2021-10-30 06:15:04', '2021-11-04 05:04:32'),
(3, 'KILELESHWA ONE BEDROOM 9M', 'kileleshwa-one-bedroom-9m', '9,000,000', '200 metres squared', 1, 2, 'public/properties/3/ltwogsBFLYp1bbixoI6cu0YHKzxevmUkxgWQZKSK.jpg', 1, 1, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.</p>', NULL, 'KILELESHWA ONE BEDROOM 9M', 'KILELESHWA ONE BEDROOM 9M', 'KILELESHWA ONE BEDROOM 9M', '2021-10-30 06:18:52', '2021-11-04 04:56:20'),
(4, 'KILELESHWA 2 BEDROOM 11M', 'kileleshwa-2-bedroom-11m', '11,000,000', '200 metres squared', 2, 3, 'public/properties/4/Rj7QMZV1WLhidEaJ7g8ejFm0g38COXWDPYvr1Mtb.jpg', 1, 1, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.</p>', NULL, 'KILELESHWA 2 BEDROOM 11M', 'KILELESHWA 2 BEDROOM 11M', 'KILELESHWA 2 BEDROOM 11M', '2021-10-30 06:20:20', '2021-11-04 04:58:58'),
(5, 'KILELESHWA 3 BEDROOM SQ 23M', 'kileleshwa-3-bedroom-sq-23m', '23,000,000', '220 metres squared', 3, 5, 'public/properties/5/MCIR8qPVIv4eQjeVGiogQ9B0jQKXnIZ21VK4k96s.jpg', 1, 1, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.</p>', NULL, 'KILELESHWA 3 BEDROOM SQ 23M', 'KILELESHWA 3 BEDROOM SQ 23M', 'KILELESHWA 3 BEDROOM SQ 23M', '2021-10-30 06:21:39', '2021-11-04 05:00:30'),
(6, 'KILIMANI 3 BEDROOM SQ', 'kilimani-3-bedroom-sq', '23,500,000', '200 metres squared', 3, 4, 'public/properties/6/fL3lu1aCimu20M1ymjbbJLHQ3l27573BYm0zpmsJ.jpg', 1, 1, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.</p>', NULL, 'KILIMANI 3 BEDROOM SQ', 'KILIMANI 3 BEDROOM SQ', 'KILIMANI 3 BEDROOM SQ', '2021-10-30 06:23:21', '2021-11-04 05:07:51'),
(7, 'LAVINGTON 3 BEDROOM 12M', 'lavington-3-bedroom-12m', '12,000,000', '100 metres squared', 3, 5, 'public/properties/7/k1aq26eVgPJbWBufsdQuUx8orbejb1qOJziif0E2.jpg', NULL, 1, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.</p>', NULL, 'LAVINGTON 3 BEDROOM 12M', NULL, NULL, '2021-10-30 06:27:07', '2021-11-14 03:41:05'),
(8, 'LAVINGTON 4 BEDROOM 21.5M', 'lavington-4-bedroom-21.5m', '21,500,000', '200 metres squared', 4, 4, 'public/properties/8/Ad8oJYIoI7BeXN9uFscYtbp65fVPfarCIvfM8KzQ.jpg', NULL, 1, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.</p>', NULL, 'LAVINGTON 4 BEDROOM 21.5M', 'LAVINGTON 4 BEDROOM 21.5M', 'LAVINGTON 4 BEDROOM 21.5M', '2021-11-04 11:27:19', '2021-11-04 11:41:47'),
(9, 'New development - Dagoretti', 'new-development---dagoretti', '18,000,000', '200 metres squared', 3, 3, 'public/properties/9/X2YF2n6slGADeMfUuguiJSIcGd21VtdJg6FFqAsw.jpg', NULL, 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ute aliquip ex ea commodo consequat duis auete irure dolor in reprehenderit in voluptate velit.</p>\r\n\r\n<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id estae laborume Sed ut perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta suntanes explicoe nemo enim ipsam voluptatem officia deserunt mollit anim.</p>', '2021-12-24', 'New development - Dagoretti', NULL, NULL, '2021-11-04 11:41:28', '2021-11-04 11:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `property_features`
--

CREATE TABLE `property_features` (
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `property_features`
--

INSERT INTO `property_features` (`property_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL),
(2, 4, NULL, NULL),
(2, 5, NULL, NULL),
(2, 6, NULL, NULL),
(3, 4, NULL, NULL),
(3, 6, NULL, NULL),
(4, 4, NULL, NULL),
(4, 5, NULL, NULL),
(4, 6, NULL, NULL),
(5, 2, NULL, NULL),
(5, 3, NULL, NULL),
(6, 3, NULL, NULL),
(6, 5, NULL, NULL),
(6, 6, NULL, NULL),
(7, 1, NULL, NULL),
(7, 5, NULL, NULL),
(2, 7, NULL, NULL),
(5, 1, NULL, NULL),
(5, 4, NULL, NULL),
(5, 5, NULL, NULL),
(5, 6, NULL, NULL),
(8, 1, NULL, NULL),
(8, 2, NULL, NULL),
(8, 3, NULL, NULL),
(8, 4, NULL, NULL),
(8, 5, NULL, NULL),
(8, 6, NULL, NULL),
(8, 7, NULL, NULL),
(8, 8, NULL, NULL),
(9, 1, NULL, NULL),
(9, 2, NULL, NULL),
(9, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255)  NOT NULL,
  `page_title` varchar(255)  NOT NULL,
  `author` varchar(255)  DEFAULT NULL,
  `title` varchar(255)  DEFAULT NULL,
  `description` varchar(255)  DEFAULT NULL,
  `css` longtext  DEFAULT NULL,
  `keywords` varchar(255)  DEFAULT NULL,
  `language` varchar(255)  DEFAULT NULL,
  `revisit_after` varchar(255)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `page`, `page_title`, `author`, `title`, `description`, `css`, `keywords`, `language`, `revisit_after`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'REALTY BORIS', 'REALTY BORIS', 'REALTY BORIS', 'REALTY BORIS', NULL, 'REALTY BORIS', 'English', '5 days', '2021-10-18 13:05:11', '2021-10-18 13:05:11'),
(2, 'About', 'REALTY BORIS', 'REALTY BORIS', 'REALTY BORIS', 'REALTY BORIS', NULL, 'REALTY BORIS', 'English', '5 days', '2021-10-23 04:57:03', '2021-10-23 04:57:03'),
(3, 'Blog', 'REALTY BORIS - Blog', 'REALTY BORIS', 'REALTY BORIS - Blog', 'REALTY BORIS - Blog', NULL, 'REALTY BORIS - Blog', 'English', '5 days', '2021-11-01 11:12:41', '2021-11-01 11:12:41'),
(4, 'Properties', 'Our Properties - Realty Boris', 'Realty Boris', 'Our Properties - Realty Boris', 'Our Properties - Realty Boris', NULL, 'Our Properties - Realty Boris', 'English', '5 days', '2021-11-01 12:31:43', '2021-11-01 12:31:43'),
(5, 'Contact', 'CONTACT US - We offfer full time support', 'REALTY BORIS', 'CONTACT US - We offfer full time support', 'CONTACT US - We offfer full time support', NULL, 'CONTACT US - We offfer full time support', 'English', '5 days', '2021-11-04 10:38:19', '2021-11-04 10:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `short_description` varchar(255)  NOT NULL,
  `description` longtext  NOT NULL,
  `media` varchar(255)  NOT NULL,
  `icon` varchar(255)  DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `meta_author` varchar(255)  DEFAULT NULL,
  `meta_title` varchar(255)  DEFAULT NULL,
  `meta_description` varchar(255)  DEFAULT NULL,
  `meta_keywords` varchar(255)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `value` longtext  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'logo_light', 'public/files/settings/0K56a8j04VAnvOirk90Qzr50FYYvZbON5rJ7Tjeh.png', NULL, '2021-11-19 11:38:04'),
(2, 'logo_dark', 'public/files/settings/ygZMer5SAF7wjh4kL1jrmdmFJXgqAXKQUyh8Ykbl.png', NULL, '2021-11-17 07:29:58'),
(3, 'favicon', 'public/files/settings/67Dukxp711VmZGXjgVQ7LCdC9wf0g9PkNvQGMpQQ.png', NULL, '2021-10-18 13:12:29'),
(4, 'email', 'margiewambui11@gmail.com', NULL, '2021-10-18 13:12:29'),
(5, 'mobile', '0707338839', NULL, '2021-10-18 13:12:29'),
(6, 'whatsapp', '254798582401', NULL, '2021-10-18 13:12:29'),
(7, 'facebook', 'https://www.facebook.com/smartbottle', NULL, '2021-10-18 13:12:29'),
(8, 'instagram', 'https://www.facebook.com/smartbottle', NULL, '2021-10-23 15:07:44'),
(9, 'youtube', 'https://www.youtube.com/watch?v=CTFtOOh47oo', NULL, '2021-11-01 12:25:47'),
(12, 'address', '2nd Floor, Brick Court, Woodvale', NULL, '2021-10-23 15:10:50'),
(13, 'map', 'https://maps.google.com/maps?q=Pan%20Africa%20Chemicals%20Ltd&t=&z=13&ie=UTF8&iwloc=&output=embed', NULL, '2021-11-04 10:49:11'),
(14, 'twitter', 'https://www.facebook.com/smartbottle', NULL, '2021-11-01 12:25:48'),
(15, 'about_image', 'public/files/settings/oC3FhHN7KHpIvbt131oaOiFlTjmFMNDXHk7wkTgg.jpg', NULL, '2021-11-04 06:37:05'),
(16, 'about_text', '<p><em>Consectetur adipisicing elit sed eiusmod tempor incididuntei ut labore et dolore magna aliqua enim ut veniam quistae nostrud exercitation ullamco laboris nisiutem.</em></p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum nilae dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonate proident sunt in culpa qui officia deserunt.</p>', NULL, '2021-11-04 06:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'advice', 'advice', '2021-11-01 12:13:50', '2021-11-01 12:13:50'),
(2, 'Newbies', 'newbies', '2021-11-01 12:13:55', '2021-11-01 12:13:55'),
(3, 'Nairobi', 'nairobi', '2021-11-01 12:13:58', '2021-11-01 12:13:58'),
(4, 'Buying', 'buying', '2021-11-01 12:14:03', '2021-11-01 12:14:03'),
(5, 'Property', 'property', '2021-11-01 12:14:06', '2021-11-01 12:14:06'),
(6, 'Brokerage', 'brokerage', '2021-11-01 12:14:09', '2021-11-01 12:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `role` varchar(255)  NOT NULL,
  `image` varchar(255)  NOT NULL,
  `short_description` varchar(255)  NOT NULL,
  `website` varchar(255)  DEFAULT '#',
  `linkedin` varchar(255)  DEFAULT '#',
  `facebook` varchar(255)  DEFAULT '#',
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `role` varchar(255)  NOT NULL,
  `avatar` varchar(255)  DEFAULT NULL,
  `content` varchar(255)  NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `role`, `avatar`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Maxwell Maragia', 'Software Engineer', 'public/files/testimonials/qqYcr62XlwJn8Wsm9MYVB0CXWKuChej53zpOMbXd.jpg', '“As a real estate broker, attorney and licensed contractor, Boris Realty provides unparalleled representation in every real estate transaction. Jason has represented us on multiple purchases”', 1, '2021-10-30 14:38:54', '2021-10-31 02:21:39'),
(2, 'John Doe', 'Audit Manager', 'public/files/testimonials/0rRGCLLqHRcYKABCZ7g2BLLMFvSagOBQyVPQEOyE.png', '“I thoroughly appreciate all of the time you are spending in quarterbacking this effort to get to closing. Your efforts are invaluable and you have been the perfect consigliere in this process. ”', 1, '2021-10-31 02:21:10', '2021-10-31 02:21:10'),
(3, 'Margaret Wambui', 'CEO Noctchems', 'public/files/testimonials/9dt8OcVEHvvhWhLtbToB4kMpR4KNkz749juCGlUl.jpg', '“Boriswas an extremely effective agent and counselor. He firmly yet fairly represented my interests in all aspects of the negotiation, and was tireless in his efforts to ensure my satisfaction”', 1, '2021-10-31 02:24:20', '2021-10-31 02:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `password` varchar(255)  NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Realty Boris', 'maxmaragia@gmail.com', '$2a$12$DWMV/Q.7DzzkVR5.3Ep2EuTznJ4V0PpFCnbDgiISxFXqA8GpYS.TO', 1, NULL, NULL, '2021-11-01 04:50:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_posts`
--
ALTER TABLE `category_posts`
  ADD KEY `category_posts_post_id_index` (`post_id`),
  ADD KEY `category_posts_category_id_index` (`category_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `features_name_unique` (`name`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD KEY `post_tags_post_id_index` (`post_id`),
  ADD KEY `post_tags_tag_id_index` (`tag_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `property_features`
--
ALTER TABLE `property_features`
  ADD KEY `property_features_property_id_index` (`property_id`),
  ADD KEY `property_features_feature_id_index` (`feature_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_posts`
--
ALTER TABLE `category_posts`
  ADD CONSTRAINT `category_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_features`
--
ALTER TABLE `property_features`
  ADD CONSTRAINT `property_features_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
