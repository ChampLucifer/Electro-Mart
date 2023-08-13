-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 08:23 AM
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
-- Database: `electro_mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-visible,1-hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `category_id`, `image`) VALUES
(3, 'Lenevo', 'lenevo', 0, '2023-05-21 01:33:17', '2023-06-10 09:15:56', 4, 'uploads/brands/1686408356.png'),
(4, 'HP', 'hp', 0, '2023-05-21 05:00:14', '2023-06-10 09:24:07', 4, 'uploads/brands/1686408847.png'),
(5, 'Boat', 'boat', 0, '2023-06-06 11:30:45', '2023-06-10 09:23:53', 5, 'uploads/brands/1686408833.png'),
(6, 'Apple', 'apple', 0, '2023-06-08 23:14:18', '2023-06-10 09:23:23', 6, 'uploads/brands/1686408803.png'),
(7, 'Jbl', 'jbl', 0, '2023-06-08 23:47:17', '2023-06-10 09:23:10', 5, 'uploads/brands/1686408790.png'),
(8, 'Samsung', 'samsung', 0, '2023-06-08 23:59:54', '2023-06-10 09:22:55', 6, 'uploads/brands/1686408775.png'),
(9, 'Fastrack', 'fastrack', 0, '2023-06-09 00:25:52', '2023-06-10 09:22:38', 7, 'uploads/brands/1686408758.png'),
(11, 'OnePlus', 'oneplus', 0, '2023-06-10 08:35:58', '2023-06-10 08:35:58', 6, 'uploads/brands/1686405958.png');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-visible,1-hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Laptop', 'laptop', 'Laptop', 'uploads/category/1684602853.png', 'Laptop', 'laptop', 'Laptop', 0, '2023-05-20 11:44:13', '2023-05-20 11:44:13'),
(5, 'Headphone', 'headphone', 'Headphone', 'uploads/category/1684602889.png', 'Headphone', 'headphone', 'Headphone', 0, '2023-05-20 11:44:49', '2023-05-20 11:44:49'),
(6, 'Smartphone', 'smartphone', 'smartphone', 'uploads/category/1686285530.jpg', 'Smartphone', 'smartphone', 'smartphone', 0, '2023-06-08 23:08:50', '2023-06-08 23:08:50'),
(7, 'Smart Watch', 'smartwatch', 'smartwatch', 'uploads/category/1686290101.jpg', 'Smart Watch', 'smartwatch', 'smartwatch', 0, '2023-06-09 00:25:01', '2023-06-09 00:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-show,1-hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Red', 'red', 0, '2023-05-18 11:31:18', '2023-05-18 11:31:18'),
(3, 'Green', 'green', 0, '2023-05-18 11:31:34', '2023-05-18 11:31:34'),
(4, 'Purple', 'purple', 0, '2023-05-18 12:24:33', '2023-05-18 12:24:33'),
(5, 'Yellow', 'yellow', 0, '2023-05-18 12:24:48', '2023-05-18 12:24:48'),
(6, 'Black', 'black', 0, '2023-06-08 23:55:00', '2023-06-08 23:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupens`
--

CREATE TABLE `coupens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `limit` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-visible,1-hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_05_09_024643_add_details_to_users_table', 2),
(10, '2023_05_13_132836_create_category_table', 3),
(12, '2023_05_16_023700_create_brands_table', 4),
(13, '2023_05_16_144239_create_products_table', 5),
(14, '2023_05_16_164609_create_product_images_table', 5),
(15, '2023_05_18_142338_create_colors_table', 6),
(16, '2023_05_18_173458_create_product_colors_table', 7),
(18, '2023_05_19_163820_create_sliders_table', 8),
(19, '2023_05_19_172150_remove_name_from_sliders_table', 9),
(20, '2023_05_21_065603_add_category_id_to_brands_table', 10),
(21, '2023_05_22_023504_create_wishlists_table', 11),
(23, '2023_05_22_025158_add_category_id_to_sliders_table', 12),
(24, '2023_06_01_165159_create_carts_table', 13),
(25, '2023_06_04_060607_create_orders_table', 14),
(26, '2023_06_04_061529_create_order_items_table', 15),
(27, '2023_06_06_175033_create_settings_table', 16),
(28, '2023_06_10_134929_add_brand_image_to_brands_table', 17),
(29, '2023_06_12_023246_create_coupens_table', 18),
(30, '2023_06_12_030055_modify_coupens_change_start_date_type', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_notes` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `first_name`, `last_name`, `email`, `address`, `city`, `state`, `pincode`, `phone`, `order_notes`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(4, 4, 'e-martu6nNuKXsfh', 'demo', 'demo', 'dhruv.kumar.bcm@gmail.com', 'demo', 'demo', 'demo', '123', '123', NULL, 'completed', 'COD', NULL, '2023-06-05 11:54:49', '2023-06-05 21:17:42'),
(5, 5, 'e-mart5Vv9S1g6rU', 'Dhruv', 'kumar', 'dhruv.kumar.bcm@gmail.com', 'dwarkesh complex', 'va', 'india', '390025', '9512565855', 'jaldi bhejo', 'completed', 'COD', NULL, '2023-06-08 21:26:57', '2023-06-08 23:11:49'),
(6, 5, 'e-mart488WwRe2ht', 'Dhruv', 'kumar', 'dhruv.kumar.bcm@gmail.com', 'c/23,dwarkesh complex', 'vadoara', 'gujarat', '390025', '9512565855', NULL, 'completed', 'COD', NULL, '2023-06-08 21:30:28', '2023-06-08 21:33:53'),
(7, 5, 'e-martBmszuL3lp9', 'Priyanshu', 'Mistry', 'priyanshumistry559@gmail.com', 'B/93 Ramdev Nagar Society, Waghodia Road,', 'Vadodara', 'Gujarat', '390019', '9998238939', NULL, 'completed', 'COD', NULL, '2023-06-09 00:35:43', '2023-06-09 00:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(3, 4, 8, NULL, 1, 24000, '2023-06-04 11:54:49', '2023-06-04 11:54:49'),
(4, 5, 9, NULL, 1, 999, '2023-06-08 21:26:57', '2023-06-08 21:26:57'),
(5, 6, 7, 6, 1, 22000, '2023-06-08 21:30:28', '2023-06-08 21:30:28'),
(6, 7, 11, 9, 3, 124999, '2023-06-09 00:35:43', '2023-06-09 00:35:43');

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orignal_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-no-trending,1-trending',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-show,1-hidden',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_description`, `description`, `orignal_price`, `selling_price`, `quantity`, `trending`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(7, 4, 'Lenovo A2', 'lenovo-a2', '3', 'Lenovo', 'Lenovo', 29000, 22000, 12, 1, 0, 'lenovo', 'lenovo', 'lenovo', '2023-05-21 00:21:25', '2023-06-06 11:26:29'),
(8, 4, 'HP i5', 'hp-i5', '4', 'HP', 'HP', 29000, 24000, 11, 1, 0, 'HP', 'HP', 'HP', '2023-05-21 11:24:36', '2023-06-06 11:14:13'),
(10, 5, 'JBL Tune 510BT', 'jbltune510bt', '7', 'Brand:-  JBL\r\nModel Name:-  Tune\r\nColour:-	Black\r\nForm Factor:-   On Ear\r\nConnectivity Technology:-  Bluetooth 5.0', 'JBL PURE BASE SOUND: Packed with 32mm Dynamic drivers, the JBL Tune 510BT features the renowned JBL Pure Bass sound, which can be found in the most famous venues all around the world.\r\nUPTO 40 HOURS PLAYTIME: Designed for long playhours, the Tune 510BT allows you to Listen wirelessly upto 40 hours non-stop under optimal audio settings.\r\nQUICK CHARGING: With its superior USB Type-C charging cable, a quick 5 min recharge of your Tune 510BT provides you with playtime upto 2 Hours while in a span of 2 hours, get your headphones completely charged up.\r\nDUAL PAIRING: The Multi Point Connectivity (Dual Pairing) on Tune 510BT allows youto effortlessly switch between 2 Bluetooth devices. Its a smooth transition when you have to receive a call on your mobile phone call while you are watching a video on your tab.\r\nVOICE ASSISTANT INTEGRATION: Siri or Hey Google is just a button away: activate the voice assistant of your device by pushing the multi-function button on the earcup.\r\nHANDS FREE CALLS: The button controls on the earcup of Tune 510BT, allows you to easily control your sound and manage your calls from your headphones.\r\nBLUETOOTH 5.0: Equipped with Blueooth 5.0, wirelessly stream high quality sound from your mobile or tab without messy cords.\r\nIN THE BOX PACKAGE: 1 x Tune 510BT headphones, 1 x USB-C Charging Cable, 1 x Warranty/Warning 1 x QSG', 4499, 2499, 10, 0, 0, 'Headphone', 'headphone', 'headphone', '2023-06-08 23:54:18', '2023-06-08 23:55:38'),
(11, 6, 'Samsung Galaxy s23 Ultra 5g', 'samsunggalaxys23ultra5g', 'Samsung', 'COLOR :- Phantom Black \r\nRAM :- 12 GB\r\nROM :- 265 GB', 'More innovation, less footprint – Galaxy S23 Ultra\'s striking symmetrical design returns with one major difference: recycled and eco-conscious materials. From the metal frame to the glass finish, it\'s polished with fresh new colors inspired by nature.\r\nNote\'s signature tool comes built in - The built-in S Pen keeps the legacy of Note alive. Plus, it helps you ditch the dependency on notebooks, making sketches and jotting notes effortless and eco-friendly.\r\nLow light. Camera. Action - A Pro-grade Camera grabs brighter photos and video, dusk to dawn. The intelligent pixel sensor adapts to low light with Nightography and the camera lens tones down flare for clearer captures\r\n200MP. Wow-worthy resolution - Resolution on the Wide-angle Camera has nearly doubled, delivering strikingly clear photos. Zoom and crop your shots for a whole new view —or leave it intact for brilliant detail, corner to corner.\r\nPower for those who don\'t pause - Your quest for epic mobile gaming is over. Snapdragon 8 Gen 2 Mobile Platform for Galaxy optimizes and streamlines your device for silky smooth games —without draining the battery', 149999, 124999, 10, 0, 0, 'Samsung Galaxy s23 Ultra 5G', 'sumsunggalaxus23ultra5g', 'samsunggalaxys23ultra5g', '2023-06-09 00:11:04', '2023-06-09 00:11:04'),
(13, 7, 'Fastrack Reflex Play', 'fastrackreflexplay', '9', '1.3” AMOLED Display Smart Watch with AOD|Premium Metallic Body|Animated Watchfaces|in-Built Games|BP & Sleep Monitor|24x7 HRM|SpO2|Multiple Sports Modes|Upto 7 Day Battery|IP68\r\n\r\nBrand	Fastrack\r\nModel Name	Reflex Play\r\nStyle	Reflex Play\r\nColour	Black\r\nScreen Size	1.3 Inches', '[Large AMOLED Display] An immersive 1.3-inch AMOLED display that brings an awesome optical quality. Case Length(6H-12H) 44.5 mm. Case Width(3H-9H) 44.5 mm;[Built-in Games] Built-in games for the player in you.\r\n[Complete Health Suite] With Blood Pressure Monitor, 24 X7 Heart rate monitor, SPO2 (Blood Oxygen Level) Tracker and Women\'s Health tracker.;[Sleep Monitoring] Let the watch keep a check on your sleep health with an active sleep monitor.\r\n[Multiple Watch Faces] Wear a new look for a new you every day - choose from over 100+ cloud Watch faces.\r\n[Fitness Guide] 25+ Multi-Sports – Game on with 25+ multisport modes including Cricket, Football, Basketball, Yoga & more.; [Long Battery Life] Super Long 7 days battery life to enjoy all the watch features without any worry\r\nClasp Type: Hook Buckle; Band Material Type: Silicone; Included Components: Watch Head, Strap, Magnatic Charger, Quick Start Guide, Product Manual; Item Type Name: Smart Watch; Human Interface Input: Touch Screen; Band Color: Black; Connectivity Technology: Bluetooth', 7995, 3495, 10, 0, 0, 'Fastrack Reflex Play', 'Fastrack Reflex Play', 'Fastrack Reflex Play', '2023-06-09 00:29:59', '2023-06-09 04:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 7, 2, 9, '2023-05-21 00:21:25', '2023-06-08 21:30:28'),
(8, 10, 6, 10, '2023-06-08 23:55:38', '2023-06-08 23:55:38'),
(9, 11, 6, 7, '2023-06-09 00:11:06', '2023-06-09 00:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(10, 7, 'uploads/products/16846482851.png', '2023-05-21 00:21:25', '2023-05-21 00:21:25'),
(11, 8, 'uploads/products/16846880761.png', '2023-05-21 11:24:36', '2023-05-21 11:24:36'),
(12, 7, 'uploads/products/16847226151.png', '2023-05-21 21:00:15', '2023-05-21 21:00:15'),
(13, 7, 'uploads/products/16847226162.png', '2023-05-21 21:00:16', '2023-05-21 21:00:16'),
(15, 10, 'uploads/products/16862882591.jpg', '2023-06-08 23:54:19', '2023-06-08 23:54:19'),
(16, 10, 'uploads/products/16862882592.jpg', '2023-06-08 23:54:19', '2023-06-08 23:54:19'),
(17, 10, 'uploads/products/16862882603.jpg', '2023-06-08 23:54:20', '2023-06-08 23:54:20'),
(18, 10, 'uploads/products/16862882604.jpg', '2023-06-08 23:54:20', '2023-06-08 23:54:20'),
(19, 10, 'uploads/products/16862882605.jpg', '2023-06-08 23:54:20', '2023-06-08 23:54:20'),
(20, 11, 'uploads/products/16862892641.jpg', '2023-06-09 00:11:04', '2023-06-09 00:11:04'),
(21, 11, 'uploads/products/16862892652.jpg', '2023-06-09 00:11:05', '2023-06-09 00:11:05'),
(22, 11, 'uploads/products/16862892653.jpg', '2023-06-09 00:11:05', '2023-06-09 00:11:05'),
(23, 11, 'uploads/products/16862892654.jpg', '2023-06-09 00:11:05', '2023-06-09 00:11:05'),
(28, 13, 'uploads/products/16863050221.jpg', '2023-06-09 04:33:42', '2023-06-09 04:33:42'),
(29, 13, 'uploads/products/16863050222.jpg', '2023-06-09 04:33:42', '2023-06-09 04:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `page_title`, `meta_keyword`, `meta_description`, `address`, `phone1`, `phone2`, `email`, `email2`, `instagram`, `whatsapp`, `facebook`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 'E-mart', 'http://127.0.0.1:8000/', 'E-mart', 'E-mart', 'E-Mart: Your premier destination for electronics. Discover a vast selection of smartphones, laptops, headphones, and more. Shop confidently with our reliable service and competitive prices. Upgrade your tech game at E-Mart today!', 'Vadodara,390025', '9512565855', '1', 'kdj39570@gmail.com', 'test@gmail.com', 'https://www.instagram.com/_dhruv55/', 'test@gmail.com', 'test@gmail.com', 'test@gmail.com', '2023-06-06 21:29:19', '2023-06-08 12:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-vissible,1-hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`, `category_id`, `brand`) VALUES
(3, 'Laptop Collection', 'shop now', 'uploads/slider/1686304735.jpg', 0, '2023-05-19 23:43:49', '2023-06-09 04:28:55', 4, 'Lenvo');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-user,1-admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_role`) VALUES
(4, 'demo', 'test@gmail.com', NULL, '$2y$10$EBrpzgNsUGS6AHDbvZQ7SOSTIlk3HnqgJXF0RaDXjh2f2e5mTE.vS', NULL, '2023-05-09 20:49:13', '2023-05-09 20:49:13', 0),
(5, 'Dhruv', 'kdj39570@gmail.com', NULL, '$2y$10$M./xvZlakpb5HjaasQppfugmy2otMO/Q7tlkHou8OAcR1Haq1c652', NULL, '2023-05-13 09:00:06', '2023-05-13 09:00:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 5, 7, '2023-05-22 12:01:31', '2023-05-22 12:01:31'),
(2, 4, 7, '2023-05-31 09:38:12', '2023-05-31 09:38:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupens`
--
ALTER TABLE `coupens`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupens`
--
ALTER TABLE `coupens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
