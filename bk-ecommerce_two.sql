-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2019 at 07:16 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bk-ecommerce_two`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_name_ban`, `brand_name_hin`, `brand_description`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', NULL, NULL, 'amongst all the districts of West Bengal but has the highest density of population.', 2, '2018-10-23 00:52:17', '2019-03-30 00:17:40'),
(2, 'HP', 'Hello', 'Hello', 'Kolkata (formerly Calcutta) is the capital of India\'s West Bengal state. Founded as an East India Company trading post, it was India\'s capital under the British Raj from 1773–1911. Today it’s known for its grand colonial architecture, art galleries and cultural festivals. It’s also home to Mother House, headquarters of the Missionaries of Charity, founded by Mother Teresa, whose tomb is on site.', 1, '2019-03-30 00:10:51', '2019-03-30 00:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charge` float DEFAULT NULL,
  `country_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `shipping_charge`, `country_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Bangladesh', 600, 'this is country', 1, '2018-10-26 23:07:59', '2018-10-26 23:07:59'),
(3, 'India', 6700, 'India', 1, '2018-10-26 23:08:09', '2019-03-30 00:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci,
  `member_cart_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_phone_number`, `customer_email`, `customer_password`, `customer_confirm_password`, `customer_address`, `member_cart_id`, `created_at`, `updated_at`) VALUES
(1, 'Nurr Vai', '01682814443', 'noormoy@gmail.com', '12345678', '12345678', 'Hi thoasdfjlajjl', 1, '2018-12-10 02:57:59', '2019-01-19 00:16:51'),
(2, 'Shariar', '0166666', 'xyz@gmail.com', '123456', '123456', 'pojpopipopoipipip', 2, '2019-03-03 00:04:30', '2019-03-30 00:48:00'),
(3, 'Raj Kah', '01742593548', 'raj60@gmail.com', '123456', '123456', 'I am', 0, '2019-03-05 12:20:50', '2019-03-30 01:02:42'),
(4, 'SB', '0124578457', 'raj60@gmail.com', '123456', '123456', 'Hello', NULL, '2019-04-04 00:40:36', '2019-04-04 00:45:37'),
(5, 'Sajib', '5949448', 'rahim@gmail.com', '123456', '123456', 'Hello', NULL, '2019-04-04 00:53:28', '2019-04-04 00:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(20) NOT NULL,
  `division_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`, `country_id`, `division_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Narayanganj', 3, 6, 1, '2018-10-27 22:39:16', '2018-10-27 22:39:16'),
(6, 'Dhaka', 2, 7, 1, '2018-10-27 22:40:50', '2018-10-27 22:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charge` double NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_name`, `shipping_charge`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 'kolkata', 900, 3, 1, '2018-10-26 23:57:20', '2019-03-30 00:09:04'),
(7, 'Dhaka', 300, 2, 1, '2018-10-27 22:04:49', '2019-03-30 00:09:28'),
(10, 'Khulna', 2000, 2, 1, '2018-12-31 23:26:57', '2019-03-30 00:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `dynamicpages`
--

CREATE TABLE `dynamicpages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_name_eng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name_ban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dynamicpages`
--

INSERT INTO `dynamicpages` (`id`, `page_name_eng`, `page_name_ban`, `page_name_hin`, `image`, `status`, `created_at`, `updated_at`) VALUES
(8, 'FM 999-3', 'এফএম 999-3', 'एफएम 999-3', 'page-image/1547282036_parallax-01.jpg', 1, '2019-01-12 02:33:56', '2019-03-29 23:30:55'),
(9, 'public function rules()', 'public function rules()', 'public function rules()', 'page-image/1553923695_15456301212_blog_5.jpg', 2, '2019-03-29 23:28:15', '2019-03-29 23:29:41'),
(10, 'Heoo', 'jij', 'fff', 'page-image/1554615044_65379385.jpg', 1, '2019-04-06 23:30:44', '2019-04-06 23:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`id`, `event_image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'event-image/1548245206_download (2).png', 1, '2019-01-23 06:06:46', '2019-01-23 06:06:46'),
(3, 'event-image/1548245310_download (1).png', 0, '2019-01-23 06:08:30', '2019-01-23 06:27:56'),
(4, 'event-image/1548247933_download.jpg', 1, '2019-01-23 06:09:16', '2019-01-23 06:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `expense_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_amount` double(10,2) NOT NULL,
  `expense_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_name`, `expense_amount`, `expense_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'new expwntsef', 1200.00, 'LAJSDFJAJIONRAWELJMZ', 1, '2019-01-14 05:24:16', '2019-01-14 05:24:16'),
(2, 'asfdjjaslzcvmal', 1500.00, 'WSFLKJ', 1, '2019-01-14 05:24:45', '2019-01-14 05:24:45'),
(3, 'lanmWEfnlalfovsafn', 151000.00, ';AKSDOFVANWERLR', 1, '2019-01-14 05:25:01', '2019-01-14 05:25:01'),
(4, 'Bye Phone', 12000.00, 'For Office', 1, '2019-03-01 02:02:58', '2019-03-01 02:02:58'),
(5, 'Hello', 444.00, 'Hello I am', 2, '2019-03-30 00:00:51', '2019-03-30 00:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `extra_incomes`
--

CREATE TABLE `extra_incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `income_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_amount` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_incomes`
--

INSERT INTO `extra_incomes` (`id`, `income_name`, `income_description`, `income_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FB', 'facebook income', 1200.00, 1, '2018-12-19 05:14:15', '2019-03-30 00:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `farmes`
--

CREATE TABLE `farmes` (
  `id` int(11) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `farme_image` varchar(250) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmes`
--

INSERT INTO `farmes` (`id`, `admin_id`, `farme_image`, `status`, `created_at`, `updated_at`) VALUES
(7, 9, 'farme_image/1553194131_images.jpg', 1, NULL, NULL),
(8, 9, 'farme_image/1553194433_png-logo-design--897 (1).png', 1, NULL, NULL),
(9, 9, 'farme_image/1553277653_sample.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `farme_banners`
--

CREATE TABLE `farme_banners` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `farme_id` int(11) DEFAULT NULL,
  `banner_logo` varchar(100) DEFAULT NULL,
  `banner_name` varchar(250) DEFAULT NULL,
  `banner_price` float(8,2) DEFAULT NULL,
  `banner_image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farme_banners`
--

INSERT INTO `farme_banners` (`id`, `admin_id`, `farme_id`, `banner_logo`, `banner_name`, `banner_price`, `banner_image`, `created_at`, `updated_at`) VALUES
(8, NULL, 2, 'banner_logo/55536.png', 'Phone', 500.00, 'banner_logo/29087.jpg', NULL, NULL),
(9, 9, 2, 'banner_logo/76508.jpg', 'logo design png', 544.00, 'banner_logo/32182.jpg', NULL, NULL),
(10, 9, 7, 'banner_logo/35355.jpg', 'Laravel', 5000.00, 'banner_logo/46252.jpg', NULL, NULL),
(11, 9, 7, 'banner_logo/93526.jpg', 'Laravel', 5000.00, 'banner_logo/22319.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_description_eng` text COLLATE utf8mb4_unicode_ci,
  `custom_description_ban` text COLLATE utf8mb4_unicode_ci,
  `custom_description_hin` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `name`, `phone_number`, `email`, `address`, `facebook_link`, `twitter_link`, `youtube_link`, `google_link`, `custom_description_eng`, `custom_description_ban`, `custom_description_hin`, `created_at`, `updated_at`) VALUES
(1, 'Nurr Faisal', '01912621193', 'noormoy@gmail.com', 'Dhanmondi', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'www.facebook.com', 'Custom Description EnglishCustom Description EnglishCustom Description English', 'Custom Description BanglaCustom Description BanglaCustom Description Bangla', 'Custom Description HindiCustom Description HindiCustom Description Hindi', '2019-01-06 04:55:56', '2019-03-24 05:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo_image`, `status`, `created_at`, `updated_at`) VALUES
(6, 'logo_image/1546773244_banner_img_2.jpg', 2, '2019-01-06 05:14:05', '2019-04-03 10:42:12'),
(9, 'logo_image/1553930860_15456301212_blog_5.jpg', 2, '2019-03-30 01:27:40', '2019-04-01 18:18:21'),
(13, 'logo_image/1554309717_cooltext320252606892435.png', 1, '2019-04-03 10:41:58', '2019-04-03 10:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cagtegory_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `category_name`, `category_name_ban`, `cagtegory_name_hin`, `category_description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Electronic Devices', 'bangla Category', 'sdfadssfd', 'Electronic Devices', 'category_image/1546418967_404bg.jpg', 1, '2018-11-18 23:03:55', '2019-01-02 02:49:27'),
(7, 'Health & Beauty', NULL, NULL, 'Health & Beauty', 'category_image/1d78a6c169bf4194bb018d5d387a8210-1188-300.jpg_desktop.jpg', 1, '2018-11-18 23:13:00', '2019-01-02 02:27:38'),
(8, 'TV & Home Appliances', NULL, NULL, 'TV & Home Appliances', 'category_image/6965.jpg', 2, '2018-11-18 23:12:19', '2019-01-02 02:28:24'),
(11, 'Groceries & Pets', NULL, NULL, 'Groceries & Pets', 'category_image/1546418390_500bg.jpg', 1, '2018-11-18 23:13:58', '2019-01-02 02:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `member_carts`
--

CREATE TABLE `member_carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_cart_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_cart_number` int(11) NOT NULL,
  `member_cart_discount` int(11) NOT NULL,
  `status` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_carts`
--

INSERT INTO `member_carts` (`id`, `member_cart_name`, `member_cart_number`, `member_cart_discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Three', 333, 3, 0, '2018-12-13 02:42:34', '2019-03-30 00:05:35'),
(2, 'One', 45, 44, 1, '2019-03-30 00:04:08', '2019-03-30 00:07:28');

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
(3, '2018_10_21_122325_create_main_categories_table', 1),
(4, '2018_10_21_122439_create_sub_categories_table', 1),
(5, '2018_10_22_071057_create_brands_table', 2),
(6, '2018_10_23_074521_create_divisions_table', 3),
(7, '2018_10_23_124727_create_districts_table', 4),
(8, '2018_10_24_080319_create_sub_districts_table', 5),
(9, '2018_10_24_134935_create_user_admins_table', 6),
(10, '2018_10_25_111114_create_products_table', 7),
(11, '2018_10_27_041304_create_countries_table', 8),
(12, '2018_10_28_082506_create_products_table', 9),
(13, '2018_11_24_172201_create_products_table', 10),
(14, '2018_11_25_055850_create_product_images_table', 11),
(15, '2018_11_25_062523_create_product_sizes_table', 12),
(16, '2018_12_10_082938_create_customers_table', 13),
(17, '2018_12_11_114426_create_shippings_table', 14),
(18, '2018_12_11_121452_create_orders_table', 15),
(19, '2018_12_11_121520_create_payments_table', 15),
(20, '2018_12_11_121602_create_order_details_table', 16),
(21, '2018_12_13_080412_create_member_carts_table', 17),
(22, '2018_12_15_064025_create_price_with_ranges_table', 18),
(23, '2018_12_19_103548_create_extra_incomes_table', 19),
(24, '2018_12_20_080400_create_expenses_table', 20),
(25, '2018_12_22_090055_create_shopper_orders_table', 21),
(26, '2018_12_24_045118_create_silder_images_table', 22),
(27, '2019_01_06_082043_create_logos_table', 23),
(28, '2019_01_06_104105_create_infos_table', 24),
(29, '2019_01_12_041548_create_dynamicpages_table', 25),
(30, '2019_01_23_105403_create_event_images_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` double(10,2) NOT NULL,
  `order_total_main` double(10,2) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `delevery_status` int(11) NOT NULL DEFAULT '0',
  `status` int(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `shipping_id`, `order_total`, `order_total_main`, `order_status`, `delevery_status`, `status`, `created_at`, `updated_at`) VALUES
(25, 1, 32, 4667.50, 2750.00, 'Success', 1, 1, '2019-01-08 23:01:19', '2019-03-29 23:54:35'),
(26, 1, 33, 3592.00, 3600.00, 'Success', 1, 0, '2019-01-09 03:13:21', '2019-03-30 01:11:40'),
(27, 1, 33, 3592.00, 3600.00, 'Success', 1, 1, '2019-01-09 03:13:21', '2019-03-30 01:11:43'),
(28, 1, 34, 12240.00, 12000.00, 'Success', 1, 0, '2019-01-09 07:16:24', '2019-03-30 01:11:47'),
(29, 1, 35, 1264.00, 1200.00, 'Pending', 0, 0, '2019-01-19 00:52:07', '2019-01-19 00:52:07'),
(30, 1, 35, 439.50, 350.00, 'Pending', 0, 0, '2019-01-19 04:54:22', '2019-01-19 04:54:22'),
(31, 1, 35, 439.50, 0.00, 'Success', 1, 0, '2019-01-19 04:55:14', '2019-03-30 01:11:37'),
(32, 2, 36, 4861.50, 2950.00, 'Pending', 0, 1, '2019-03-03 00:08:08', '2019-03-30 01:11:57'),
(33, 3, 37, 600.00, 0.00, 'Pending', 0, 0, '2019-03-05 12:21:41', '2019-03-30 01:11:55'),
(34, 4, 38, 984.00, 384.00, 'Pending', 0, 0, '2019-04-04 01:39:44', '2019-04-04 01:39:44'),
(35, 3, 39, 651.00, 51.00, 'Pending', 0, 0, '2019-04-04 02:52:43', '2019-04-04 02:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_size` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `admin_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_qty`, `product_size`, `admin_id`, `admin_name`, `created_at`, `updated_at`) VALUES
(54, 25, 8, 'product name', 1200.00, 5, 'M', 5, 'Faisal', '2019-01-08 23:01:19', '2019-01-09 00:30:21'),
(55, 25, 7, 'Android', 350.00, 4, 'S', 5, 'Faisal', '2019-01-08 23:01:19', '2019-01-13 03:12:22'),
(56, 25, 13, 'dvfgsdgsaf', 1200.00, 1, NULL, 4, 'Noormoy', '2019-01-08 23:01:19', '2019-01-08 23:01:19'),
(57, 26, 8, 'product name', 1200.00, 3, 'M', 5, 'Faisal', '2019-01-09 03:13:21', '2019-01-09 03:13:21'),
(58, 27, 8, 'product name', 1200.00, 3, 'M', 5, 'Faisal', '2019-01-09 03:13:21', '2019-01-09 03:13:21'),
(59, 29, 8, 'product name', 1200.00, 1, 'M', 5, 'Faisal', '2019-01-19 00:52:08', '2019-01-19 00:52:08'),
(60, 30, 7, 'অ্যান্ড্রয়েড জন্য সহজ বহন মিনি পাওয়ার ব্যাংক', 350.00, 1, NULL, 5, 'Faisal', '2019-01-19 04:54:22', '2019-01-19 04:54:22'),
(61, 32, 13, 'dvfgsdgsaf', 1200.00, 1, NULL, 4, 'Noormoy', '2019-03-03 00:08:08', '2019-03-03 00:08:08'),
(62, 32, 7, 'Android', 350.00, 5, '--Select Size--', 5, 'Faisal', '2019-03-03 00:08:08', '2019-03-03 00:08:08'),
(63, 34, 82, 'MaxxCola', 51.00, 4, NULL, 4, 'Noormoy', '2019-04-04 01:39:44', '2019-04-04 01:39:44'),
(64, 34, 69, 'Bengal Classic Tea - 200g', 90.00, 2, NULL, 4, 'Noormoy', '2019-04-04 01:39:44', '2019-04-04 01:39:44'),
(65, 35, 82, 'MaxxCola', 51.00, 1, NULL, 4, 'Noormoy', '2019-04-04 02:52:43', '2019-04-04 02:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(35, 23, 'cash', 'Pending', '2019-01-08 06:28:20', '2019-01-08 06:28:20'),
(37, 25, 'cash', 'Pending', '2019-01-08 23:01:19', '2019-01-08 23:01:19'),
(38, 26, 'cash', 'Pending', '2019-01-09 03:13:21', '2019-01-09 03:13:21'),
(39, 27, 'cash', 'Pending', '2019-01-09 03:13:21', '2019-01-09 03:13:21'),
(40, 28, 'cash', 'Pending', '2019-01-09 07:16:24', '2019-01-09 07:16:24'),
(41, 29, 'cash', 'Pending', '2019-01-19 00:52:08', '2019-01-19 00:52:08'),
(42, 30, 'cash', 'Pending', '2019-01-19 04:54:22', '2019-01-19 04:54:22'),
(43, 31, 'cash', 'Pending', '2019-01-19 04:55:14', '2019-01-19 04:55:14'),
(44, 32, 'cash', 'Pending', '2019-03-03 00:08:08', '2019-03-03 00:08:08'),
(45, 33, 'cash', 'Pending', '2019-03-05 12:21:42', '2019-03-05 12:21:42'),
(46, 34, 'cash', 'Pending', '2019-04-04 01:39:44', '2019-04-04 01:39:44'),
(47, 35, 'cash', 'Pending', '2019-04-04 02:52:43', '2019-04-04 02:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `price_with_ranges`
--

CREATE TABLE `price_with_ranges` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `price_first_number` int(11) DEFAULT NULL,
  `price_last_number` int(11) DEFAULT NULL,
  `first_to_last_number_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_with_ranges`
--

INSERT INTO `price_with_ranges` (`id`, `product_id`, `price_first_number`, `price_last_number`, `first_to_last_number_price`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 10, 1000, '2018-12-15 02:22:25', '2018-12-15 02:22:25'),
(2, 14, 1, 10, 1000, '2018-12-15 02:37:52', '2018-12-15 02:37:52'),
(3, 14, 11, 20, 2000, '2018-12-15 02:37:52', '2018-12-15 02:37:52'),
(4, 15, 1, 10, 1500, '2018-12-15 02:44:24', '2018-12-15 02:44:24'),
(5, 15, 11, 20, 3000, '2018-12-15 02:44:24', '2018-12-15 02:44:24'),
(6, 17, 1, 20, 3000, '2018-12-19 22:57:00', '2018-12-19 22:57:00'),
(7, 18, 1, 10, 1000, '2018-12-19 22:58:21', '2018-12-19 22:58:21'),
(8, 19, 1, 10, 1000, '2018-12-20 00:01:51', '2018-12-20 00:01:51'),
(9, 33, 1, 10, 1000, '2019-03-07 16:17:43', '2019-03-07 16:17:43'),
(10, 35, 1, 20, 220, '2019-03-07 17:04:07', '2019-03-07 17:04:07'),
(11, 35, 20, 30, 210, '2019-03-07 17:04:07', '2019-03-07 17:04:07'),
(12, 36, 1, 10, 25, '2019-03-07 17:07:02', '2019-03-07 17:07:02'),
(13, 36, 10, 20, 25, '2019-03-07 17:07:02', '2019-03-07 17:07:02'),
(14, 37, 1, 10, 254, '2019-03-07 17:10:44', '2019-03-07 17:10:44'),
(15, 37, 10, 20, 2554, '2019-03-07 17:10:44', '2019-03-07 17:10:44'),
(16, 38, 1, 5, 48500, '2019-03-07 17:28:38', '2019-03-07 17:28:38'),
(17, 38, 5, 10, 48000, '2019-03-07 17:28:38', '2019-03-07 17:28:38'),
(18, 39, 1, 25, 14, '2019-03-07 18:24:44', '2019-03-07 18:24:44'),
(19, 39, 1, 20, 569, '2019-03-24 05:31:01', '2019-03-24 05:31:01'),
(20, 39, 20, 300, 6949, '2019-03-24 05:31:01', '2019-03-24 05:31:01'),
(21, 40, 1, 3, 2, '2019-03-28 05:25:37', '2019-03-28 05:25:37'),
(22, 41, 4, 4, 444, '2019-03-28 05:33:42', '2019-03-28 05:33:42'),
(23, 42, 1, 4, 22, '2019-03-28 05:57:29', '2019-03-28 05:57:29'),
(24, 43, 1, 5, 250, '2019-03-28 06:09:18', '2019-03-28 06:09:18'),
(25, 41, 1, 23, 50, '2019-03-30 05:45:57', '2019-03-30 05:45:57'),
(26, 41, 24, 74, 789, '2019-03-30 05:45:57', '2019-03-30 05:45:57'),
(27, 42, 124, 555, 55555, '2019-03-30 05:57:55', '2019-03-30 05:57:55'),
(28, 42, 555, 55, 5555, '2019-03-30 05:57:55', '2019-03-30 05:57:55'),
(29, 42, 55, 55, 5555, '2019-03-30 05:57:55', '2019-03-30 05:57:55'),
(30, 43, 55, 787, 548, '2019-03-30 06:17:04', '2019-03-30 06:17:04'),
(31, 44, NULL, NULL, NULL, '2019-03-30 06:24:08', '2019-03-30 06:24:08'),
(32, 44, 6595, 656, 6594, '2019-03-30 06:24:08', '2019-03-30 06:24:08'),
(33, 44, 6595, 65965, 6595, '2019-03-30 06:24:08', '2019-03-30 06:24:08'),
(34, 45, NULL, NULL, NULL, '2019-03-30 06:29:44', '2019-03-30 06:29:44'),
(35, 45, 656, 555, 545, '2019-03-30 06:29:44', '2019-03-30 06:29:44'),
(36, 45, 552, 2626, 3262, '2019-03-30 06:29:45', '2019-03-30 06:29:45'),
(37, 46, NULL, NULL, NULL, '2019-03-30 06:40:31', '2019-03-30 06:40:31'),
(38, 49, NULL, NULL, NULL, '2019-03-30 06:44:37', '2019-03-30 06:44:37'),
(39, 49, 55, 55, 555555, '2019-03-30 06:44:37', '2019-03-30 06:44:37'),
(40, 49, NULL, NULL, NULL, '2019-03-30 06:44:37', '2019-03-30 06:44:37'),
(41, 50, NULL, NULL, NULL, '2019-03-30 06:45:38', '2019-03-30 06:45:38'),
(42, 50, 5, 5, 4, '2019-03-30 06:45:38', '2019-03-30 06:45:38'),
(43, 50, NULL, NULL, NULL, '2019-03-30 06:45:38', '2019-03-30 06:45:38'),
(44, 51, NULL, NULL, NULL, '2019-03-30 06:51:55', '2019-03-30 06:51:55'),
(45, 51, 88, 88, 886, '2019-03-30 06:51:55', '2019-03-30 06:51:55'),
(46, 51, NULL, NULL, NULL, '2019-03-30 06:51:55', '2019-03-30 06:51:55'),
(47, 52, NULL, NULL, NULL, '2019-03-30 07:07:16', '2019-03-30 07:07:16'),
(48, 52, 4, 4, 4, '2019-03-30 07:07:16', '2019-03-30 07:07:16'),
(49, 52, 4, 4, 2, '2019-03-30 07:07:16', '2019-03-30 07:07:16'),
(50, 53, 4, 4, 4, '2019-03-30 07:09:39', '2019-03-30 07:09:39'),
(51, 53, 5, 5, 4, '2019-03-30 07:09:39', '2019-03-30 07:09:39'),
(52, 53, NULL, NULL, NULL, '2019-03-30 07:09:39', '2019-03-30 07:09:39'),
(53, 54, NULL, NULL, NULL, '2019-03-30 07:14:58', '2019-03-30 07:14:58'),
(54, 54, 55, 5, 54, '2019-03-30 07:14:58', '2019-03-30 07:14:58'),
(55, 55, NULL, NULL, NULL, '2019-03-30 07:15:53', '2019-03-30 07:15:53'),
(56, 55, 55, 55, 55, '2019-03-30 07:15:53', '2019-03-30 07:15:53'),
(57, 55, 66, 66, 65, '2019-03-30 07:15:53', '2019-03-30 07:15:53'),
(58, 56, 1111111, 1111111, 11111, '2019-03-30 07:17:03', '2019-03-30 07:17:03'),
(59, 56, 111, 11, 11, '2019-03-30 07:17:03', '2019-03-30 07:17:03'),
(60, 56, 11, 11, 1, '2019-03-30 07:17:03', '2019-03-30 07:17:03'),
(61, 56, NULL, NULL, NULL, '2019-03-30 07:17:03', '2019-03-30 07:17:03'),
(62, 57, 55, 55, 55, '2019-03-30 23:59:30', '2019-03-30 23:59:30'),
(63, 57, NULL, NULL, NULL, '2019-03-30 23:59:30', '2019-03-30 23:59:30'),
(64, 58, 55, 55, 55, '2019-03-31 00:04:51', '2019-03-31 00:04:51'),
(65, 58, NULL, NULL, NULL, '2019-03-31 00:04:51', '2019-03-31 00:04:51'),
(66, 59, 55, 55, 55, '2019-03-31 00:06:23', '2019-03-31 00:06:23'),
(67, 59, NULL, NULL, NULL, '2019-03-31 00:06:23', '2019-03-31 00:06:23'),
(68, 60, 55, 55, 5555, '2019-03-31 00:08:19', '2019-03-31 00:08:19'),
(69, 60, NULL, NULL, NULL, '2019-03-31 00:08:19', '2019-03-31 00:08:19'),
(70, 61, 55, 55, 5555, '2019-03-31 00:09:58', '2019-03-31 00:09:58'),
(71, 61, NULL, NULL, NULL, '2019-03-31 00:09:58', '2019-03-31 00:09:58'),
(72, 62, 55, 55, 5555, '2019-03-31 00:10:28', '2019-03-31 00:10:28'),
(73, 62, NULL, NULL, NULL, '2019-03-31 00:10:28', '2019-03-31 00:10:28'),
(74, 63, 1, 2, 156000, '2019-03-31 00:17:05', '2019-03-31 00:17:05'),
(75, 63, NULL, NULL, NULL, '2019-03-31 00:17:05', '2019-03-31 00:17:05'),
(76, 64, 5, 5, 5, '2019-03-31 01:48:56', '2019-03-31 01:48:56'),
(77, 65, 1, 5, 554, '2019-03-31 03:07:46', '2019-03-31 03:07:46'),
(78, 66, 1, 5, 54, '2019-03-31 03:27:28', '2019-03-31 03:27:28'),
(79, 67, 1, 5, 98, '2019-03-31 03:35:46', '2019-03-31 03:35:46'),
(80, 68, 88, 88, 585, '2019-03-31 03:39:32', '2019-03-31 03:39:32'),
(81, 69, 1, 50, 90, '2019-03-31 03:55:51', '2019-03-31 03:55:51'),
(82, 70, 1, 500, 670, '2019-03-31 03:59:24', '2019-03-31 03:59:24'),
(83, 71, 1, 50, 270, '2019-03-31 04:02:21', '2019-03-31 04:02:21'),
(84, 72, 1, 60, 190, '2019-03-31 04:03:58', '2019-03-31 04:03:58'),
(85, 73, 55, 55, 54, '2019-03-31 12:38:18', '2019-03-31 12:38:18'),
(86, 74, 55, 55, 55, '2019-03-31 12:46:21', '2019-03-31 12:46:21'),
(87, 80, 1, 50, 96, '2019-04-01 17:45:10', '2019-04-01 17:45:10'),
(88, 81, 55, 55, 55, '2019-04-01 17:50:58', '2019-04-01 17:50:58'),
(89, 82, 12, 12, 44, '2019-04-01 17:53:41', '2019-04-01 17:53:41'),
(90, 83, 12, 22, 22, '2019-04-01 17:56:36', '2019-04-01 17:56:36'),
(91, 84, 1, 500, 24, '2019-04-01 17:58:56', '2019-04-01 17:58:56'),
(92, 85, 1, 11, 1109, '2019-04-01 18:05:18', '2019-04-01 18:05:18'),
(93, 86, 45, 55, 54, '2019-04-01 18:09:09', '2019-04-01 18:09:09'),
(94, 87, NULL, NULL, NULL, '2019-04-01 21:20:36', '2019-04-01 21:20:36'),
(95, 88, NULL, NULL, NULL, '2019-04-02 07:36:54', '2019-04-02 07:36:54'),
(96, 89, 11, 22, 22, '2019-04-03 23:51:20', '2019-04-03 23:51:20'),
(97, 90, 1, 2, 3, '2019-04-05 23:38:21', '2019-04-05 23:38:21'),
(98, 91, 2, 5, 52, '2019-04-05 23:43:30', '2019-04-05 23:43:30'),
(99, 92, 1, 4, 5, '2019-04-05 23:46:49', '2019-04-05 23:46:49'),
(100, 93, 1, 2, 3, '2019-04-05 23:55:58', '2019-04-05 23:55:58'),
(101, 94, 1, 6, 66, '2019-04-06 00:00:24', '2019-04-06 00:00:24'),
(102, 95, 1, 2, 4, '2019-04-06 00:02:35', '2019-04-06 00:02:35'),
(103, 96, 1, 2, 222, '2019-04-06 00:09:18', '2019-04-06 00:09:18'),
(104, 100, 12, 22, 222, '2019-04-06 05:15:05', '2019-04-06 05:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `offer_id` int(10) DEFAULT '0',
  `offer` tinyint(4) DEFAULT NULL,
  `discount` tinyint(4) DEFAULT NULL,
  `top_sellers` int(11) DEFAULT NULL,
  `special` int(11) DEFAULT NULL,
  `hot_product` tinyint(4) DEFAULT NULL,
  `top_rated` tinyint(4) DEFAULT NULL,
  `product_qty` int(11) NOT NULL,
  `stock_status` tinyint(4) DEFAULT NULL,
  `main_qty` double(8,2) DEFAULT NULL,
  `ex_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price_eng` double(8,2) DEFAULT NULL,
  `product_price_ban` double(8,2) DEFAULT NULL,
  `product_price_hin` double(8,2) DEFAULT NULL,
  `old_Price` double(8,2) DEFAULT NULL,
  `sale_Price` double(8,2) DEFAULT NULL,
  `note_eng` text COLLATE utf8mb4_unicode_ci,
  `note_ban` text COLLATE utf8mb4_unicode_ci,
  `note_hin` text COLLATE utf8mb4_unicode_ci,
  `product_short_description_eng` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodcut_short_description_ban` text COLLATE utf8mb4_unicode_ci,
  `product_short_description_hin` text COLLATE utf8mb4_unicode_ci,
  `prodcut_long_description_eng` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodcut_long_description_ban` text COLLATE utf8mb4_unicode_ci,
  `product_long_description_hin` text COLLATE utf8mb4_unicode_ci,
  `product_color_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` int(11) DEFAULT NULL,
  `sale_download_price` double(8,2) DEFAULT NULL,
  `size` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `download_link` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_total` int(11) NOT NULL DEFAULT '0',
  `admin_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `sub_district_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `main_category_id`, `sub_category_id`, `product_brand`, `offer_id`, `offer`, `discount`, `top_sellers`, `special`, `hot_product`, `top_rated`, `product_qty`, `stock_status`, `main_qty`, `ex_date`, `product_name_eng`, `product_name_ban`, `product_name_hin`, `product_price_eng`, `product_price_ban`, `product_price_hin`, `old_Price`, `sale_Price`, `note_eng`, `note_ban`, `note_hin`, `product_short_description_eng`, `prodcut_short_description_ban`, `product_short_description_hin`, `prodcut_long_description_eng`, `prodcut_long_description_ban`, `product_long_description_hin`, `product_color_eng`, `product_color_ban`, `product_color_hin`, `product_color`, `sale_download_price`, `size`, `others`, `status`, `download_link`, `view_total`, `admin_id`, `country_id`, `division_id`, `district_id`, `sub_district_id`, `created_at`, `updated_at`) VALUES
(7, 6, 3, 1, 0, NULL, NULL, 1, 0, NULL, 1, 120, NULL, NULL, '2018-11-20', 'Android', 'অ্যান্ড্রয়েড জন্য সহজ বহন মিনি পাওয়ার ব্যাংক', 'एंड्रॉइड के लिए आसान पावर मिनी पावर बैंक', 350.00, 350.00, 350.00, 0.00, NULL, 'note english', 'note bangla', 'note hindi', 'A mini and small emergency charging treasure, compatible with Android mobile phones.\r\nCapacity 2000 MAh\r\nMultiple protections such as discharge, overload, temperature, short circuit.', 'bangla short description', 'hindi short description', '<p>A mini and small emergency charging treasure, compatible with Android mobile phones. Capacity 2000 MAh Multiple protections such as discharge, overload, temperature, short circuit. A mini and small emergency charging treasure, compatible with Android mobile phones. Capacity 2000 MAh Multiple protections such as discharge, overload, temperature, short circuit.</p>', '<p>bangla long description</p>', '<p>hindi long descriopntion</p>', 'red', 'laal', 'kali', NULL, NULL, NULL, NULL, 1, '', 418, 5, 3, 6, 6, 5, '2018-11-25 23:55:20', '2019-04-03 10:07:10'),
(8, 7, 13, 2, 0, NULL, NULL, 1, 1, NULL, 1, 120, NULL, NULL, '2018-12-13', 'Child Safety Gates', NULL, NULL, 456.00, NULL, NULL, 0.00, NULL, 'Software salesSoftware salesSoftware salesSoftware salesSoftware salesSoftware salesSoftware salesSoftware sales', NULL, NULL, 'short description naiSoftware salesSoftware salesSoftware salesSoftware salesSoftware sales', NULL, NULL, '<p>ai dilam long desriptionSoftware salesSoftware salesSoftware salesSoftware salesSoftware salesSoftware salesSoftware salesSoftware sales</p>', NULL, NULL, 'wid', NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 101, 9, 3, 6, 6, 5, '2018-12-03 23:16:32', '2019-04-04 01:46:26'),
(9, 6, 5, 1, 0, NULL, NULL, 1, 1, NULL, 1, 125, NULL, NULL, '2018-12-14', 'Apple iMac 21.5\"', NULL, NULL, 113000.00, NULL, NULL, 0.00, NULL, 'Intel 2.3GHz dual‑core i5 (Turbo Boost up to 3.6GHz)\r\n8GB of 2133MHz DDR4\r\n1TB (5400-rpm) hard drive\r\n21.5-inch 1920x1080 display', NULL, NULL, 'Intel 2.3GHz dual‑core i5 (Turbo Boost up to 3.6GHz)\r\n8GB of 2133MHz DDR4\r\n1TB (5400-rpm) hard drive\r\n21.5-inch 1920x1080 display', NULL, NULL, '<ul>\r\n	<li>Intel 2.3GHz dual‑core i5 (Turbo Boost up to 3.6GHz)</li>\r\n	<li>8GB of 2133MHz DDR4</li>\r\n	<li>1TB (5400-rpm) hard drive</li>\r\n	<li>21.5-inch 1920x1080 display</li>\r\n</ul>', NULL, NULL, 'Blue', NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 14, 9, 3, 6, 6, 5, '2018-12-04 04:55:15', '2019-03-31 03:45:00'),
(11, 7, 13, 2, 0, NULL, NULL, 1, 1, NULL, NULL, 12, NULL, NULL, '2019-03-31', 'Hair Dryers', NULL, NULL, 4499.00, NULL, NULL, 0.00, NULL, 'ssss', NULL, NULL, 'fsasdgasgga', NULL, NULL, '<p>Updating your profile with your name, location, and a profile picture helps other GitHub users get to know you.Updating your profile with your name, location, and a profile picture helps other GitHub users get to know you.Updating your profile with your name, location, and a profile picture helps other GitHub users get to know you.Updating your profile with your name, location, and a profile picture helps other GitHub users get to know you.</p>', NULL, NULL, 'red', NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 63, 4, 3, 6, 6, 5, '2018-12-15 01:58:37', '2019-03-31 12:51:24'),
(15, 6, 3, 1, 8, NULL, NULL, 1, 1, 1, 1, 10, NULL, NULL, '2018-12-13', 'Easy carry Mini', NULL, NULL, 22222.00, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, 'zsfdvasdfasdf', NULL, NULL, 'asdfasdfasdf', NULL, NULL, 'red', NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 16, 4, 3, 6, 6, 5, '2018-12-15 02:44:24', '2019-04-06 01:52:24'),
(38, 6, 5, 2, 0, NULL, NULL, 1, 1, NULL, 1, 14, NULL, NULL, '2019-03-09', 'Hardware and Software sales', NULL, NULL, 50.00, NULL, NULL, 0.00, NULL, 'Hardware and Software salesHardware and Software salesHardware and Software sales', NULL, NULL, 'Hardware and Software salesHardware and Software salesHardware and Software sales', NULL, NULL, '<p>Hardware and Software salesHardware and Software salesHardware and Software salesHardware and Software salesHardware and Software salesHardware and Software salesHardware and Software sales</p>', NULL, NULL, 'reddd', NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 3, 9, 2, 7, 5, 5, '2019-03-07 17:28:37', '2019-03-31 12:52:00'),
(63, 6, 4, 2, NULL, NULL, NULL, 1, 1, NULL, 1, 0, 0, 0.00, NULL, 'Lenovo Legion Y740 with Nvidia RTX 2060,i7-8750H', NULL, NULL, NULL, NULL, NULL, 158000.00, 156000.00, '8th-Gen Intel Core i7-8750H (9M Cache, up to 4.10 GHz), Nvidia RTX 2060 6gb DDR6 , 16GB DDR4 2666 MHz Ram , 15.6” 144Hz IPS Display, 256/512GB Nvme SSD', NULL, NULL, 'Lenovo Legion Y740 with Nvidia RTX 2060,i7-8750H', NULL, NULL, '<p>✅ MODEL:Lenovo Legion Y740-15ICHg<br />\r\n✅ &rarr;PROCESSOR: 8th-Gen Intel Core i7-8750H (9M Cache, up to 4.10 GHz)<br />\r\n✅ &rarr; Storage: 256/513GB Nvme SSD&nbsp;<br />\r\n✅ &rarr; RAM: 16GB DDR4 2666MHz SDRAM<br />\r\n✅ &rarr; GRAPHICS: Latest NVIDIA&reg; RTX 2060 6GB GDDR6 video memory with desktop level performance Graphics + Intel UHD Graphics<br />\r\n✅ &rarr; DISPLAY: 15.6&quot; (16:9) LED backlit FHD (1920x1080) 144Hz Anti-Glare IPS-nano Bazel Display&nbsp;<br />\r\n✅ &rarr; AUDIO: DTS&reg; Headphone: X&reg;&nbsp;<br />\r\nSupports Windows 10 Cortana with Voice<br />\r\n✅ &rarr;BATTERY: 48 Wh Battery with Quick Charge<br />\r\n✅ &rarr; Keyboard : RGB Illuminated Chiclet Keyboard<br />\r\n✅ &rarr; Weight : 2.1 kg</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14\'in la', '14\'in la', 1, NULL, 3, 9, 2, 7, 5, 5, '2019-03-31 00:17:05', '2019-04-06 01:52:58'),
(66, 7, 13, 2, 0, 1, NULL, 1, 1, 1, 1, 5, 0, 500.00, '2019-03-31', 'be free', NULL, NULL, 56.00, NULL, NULL, 56.00, 55.00, 'Browse similar products\r\nPrevious Page : ANGEL Next : Sanitary napkin', NULL, NULL, 'Browse similar products\r\nPrevious Page : ANGEL Next : Sanitary napkin', NULL, NULL, '<p><em><a href=\"http://www.jhdiaper.com/products_list/pmcId=22.html\" target=\"_self\">Browse similar products</a></em></p>\r\n\r\n<p>Previous Page :<a href=\"http://www.jhdiaper.com/products_detail/productId=113.html\" target=\"_self\">ANGEL</a></p>\r\n\r\n<p>Next :<a href=\"http://www.jhdiaper.com/products_detail/productId=95.html\" target=\"_self\">Sanitary napkin</a></p>', NULL, NULL, 'red', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 4, 4, 3, 6, 6, 5, '2019-03-31 03:27:27', '2019-04-04 05:31:35'),
(67, 7, 13, 2, 0, NULL, 1, 1, 1, 1, 1, 1, 0, 45.00, '2019-03-31', 'extra wings', NULL, NULL, 100.00, NULL, NULL, 111.00, 100.00, 'Browse similar products\r\nNext : crystal bag with day and night', NULL, NULL, 'Browse similar products\r\nNext : crystal bag with day and night', NULL, NULL, '<p><a href=\"http://www.jhdiaper.com/products_list/pmcId=22.html\" target=\"_self\">Browse similar products</a></p>\r\n\r\n<p>Next :<a href=\"http://www.jhdiaper.com/products_detail/productId=114.html\" target=\"_self\">crystal bag with day and night</a></p>', NULL, NULL, 'red', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 4, 4, 3, 6, 6, 5, '2019-03-31 03:35:45', '2019-04-01 17:25:00'),
(68, 7, 13, 2, 0, 1, NULL, 1, 1, 1, 1, 400, 0, 43.00, '2019-03-31', 'ANGEL', NULL, NULL, 455.00, NULL, NULL, 555.00, 555.00, 'Browse similar products\r\nPrevious Page : crystal bag with day and night Next : be free', NULL, NULL, 'Browse similar products\r\nPrevious Page : crystal bag with day and night Next : be free', NULL, NULL, '<p><em><a href=\"http://www.jhdiaper.com/products_list/pmcId=22.html\" target=\"_self\">Browse similar products</a></em></p>\r\n\r\n<p>Previous Page :<a href=\"http://www.jhdiaper.com/products_detail/productId=114.html\" target=\"_self\">crystal bag with day and night</a></p>\r\n\r\n<p>Next :<a href=\"http://www.jhdiaper.com/products_detail/productId=112.html\" target=\"_self\">be free</a></p>', NULL, NULL, 'red', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 4, 3, 6, 6, 5, '2019-03-31 03:39:32', '2019-04-01 05:37:08'),
(69, 11, 14, 2, 0, NULL, NULL, 1, 1, 1, 1, 2, 0, 12.00, '2019-03-31', 'Bengal Classic Tea - 200g', NULL, NULL, 92.00, NULL, NULL, 100.00, 92.00, 'Product type: Classic Tea\r\nBrand: Bengal\r\nWeight: 200g\r\nMay help to maintain healthy cardiac functions\r\nMay support healthy digestion\r\nConsidered to have anti inflammatory properties\r\nConsidered to be highly nutritious\r\nFight with free radical damage', NULL, NULL, 'Product type: Classic Tea\r\nBrand: Bengal\r\nWeight: 200g\r\nMay help to maintain healthy cardiac functions\r\nMay support healthy digestion\r\nConsidered to have anti inflammatory properties\r\nConsidered to be highly nutritious\r\nFight with free radical damage', NULL, NULL, '<ul>\r\n	<li>Product type: Classic Tea</li>\r\n	<li>Brand: Bengal</li>\r\n	<li>Weight: 200g</li>\r\n	<li>May help to maintain healthy cardiac functions</li>\r\n	<li>May support healthy digestion</li>\r\n	<li>Considered to have anti inflammatory properties</li>\r\n	<li>Considered to be highly nutritious</li>\r\n	<li>Fight with free radical damage</li>\r\n</ul>', NULL, NULL, 'red', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 4, 4, 3, 6, 6, 5, '2019-03-31 03:55:51', '2019-04-04 00:39:29'),
(70, 11, 14, 2, 0, NULL, NULL, 1, 1, 1, 1, 3, 0, 10000.00, '2019-03-31', 'Horlicks 900g Jar With 150g Extra FREE (Chattogram)', NULL, NULL, 680.00, NULL, NULL, 700.00, 680.00, 'Discount Vouchers not applicable for this product\r\nProduct Type: Health Food Drinks\r\nCapacity: 900gm + 150gm\r\nGood Quality Product\r\nFlavor: Classic Malt\r\n150gm free', NULL, NULL, 'Discount Vouchers not applicable for this product\r\nProduct Type: Health Food Drinks\r\nCapacity: 900gm + 150gm\r\nGood Quality Product\r\nFlavor: Classic Malt\r\n150gm free', NULL, NULL, '<ul>\r\n	<li>Discount Vouchers not applicable for this product</li>\r\n	<li>Product Type: Health Food Drinks</li>\r\n	<li>Capacity: 900gm + 150gm</li>\r\n	<li>Good Quality Product</li>\r\n	<li>Flavor: Classic Malt</li>\r\n	<li>150gm free</li>\r\n</ul>', NULL, NULL, 'red', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 3, 4, 3, 6, 6, 5, '2019-03-31 03:59:24', '2019-04-01 05:41:16'),
(71, 11, 14, 2, 0, NULL, 1, 1, 1, 1, 1, 50, 0, 50000.00, '2019-03-31', 'MacCoffee GOLD Coffee 50g Glass Jar (Malaysia)', NULL, NULL, 290.00, NULL, NULL, 288.00, 280.00, 'Origin: Malaysia,\r\nCountry of Manufacture: Malaysia,\r\nNetWeight: 50gm,\r\nPacking Type: Glass Jar.', NULL, NULL, 'Origin: Malaysia,\r\nCountry of Manufacture: Malaysia,\r\nNetWeight: 50gm,\r\nPacking Type: Glass Jar.', NULL, NULL, '<ul>\r\n	<li>Origin: Malaysia,</li>\r\n	<li>Country of Manufacture: Malaysia,</li>\r\n	<li>NetWeight: 50gm,</li>\r\n	<li>Packing Type: Glass Jar.</li>\r\n</ul>', NULL, NULL, 'red', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, 4, 3, 6, 6, 5, '2019-03-31 04:02:20', '2019-03-31 04:05:13'),
(72, 11, 14, 2, 0, NULL, NULL, 1, 1, 1, NULL, 50, 0, 5000.00, '2019-03-31', 'Mirzapore Best Leaf - 400gm With Scratch Card For The Lucky Winners', NULL, NULL, 291.00, NULL, NULL, 190.00, 196.00, 'Mirzapore Best leaf\r\nCapacity: 400gm\r\nBrand: Ispahani', NULL, NULL, 'Mirzapore Best leaf\r\nCapacity: 400gm\r\nBrand: Ispahani', NULL, NULL, '<ul>\r\n	<li>Mirzapore Best leaf</li>\r\n	<li>Capacity: 400gm</li>\r\n	<li>Brand: Ispahani</li>\r\n</ul>', NULL, NULL, 'red', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 4, 3, 6, 6, 5, '2019-03-31 04:03:58', '2019-04-03 10:06:55'),
(73, 7, 13, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, 4, 0, 55.00, NULL, 'dddddddd', NULL, NULL, NULL, NULL, NULL, 54.00, 55.00, 'ssssssssssss', NULL, NULL, 'sssssssssss', NULL, NULL, '<p>sssssssssssss</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc def ghi jkl', '5656', 0, NULL, 0, 9, 2, 7, 5, 5, '2019-03-31 12:38:17', '2019-04-03 23:31:32'),
(74, 7, 13, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 554, 0, 555.00, NULL, 'dd', NULL, NULL, NULL, NULL, NULL, 555.00, 553.00, 'dddddddd', NULL, NULL, 'dd', NULL, NULL, '<p>dddddddd</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc def ghi jkl', '5656', 0, NULL, 0, 9, 2, 7, 5, 5, '2019-03-31 12:46:21', '2019-04-03 23:31:29'),
(80, 11, 14, 2, 0, 1, NULL, 1, 1, 1, 1, 5, 0, 5000.00, '2019-04-01', 'Bulldozer', NULL, NULL, 97.00, NULL, NULL, 100.00, 97.00, 'Bulldozer is a malt beverage with a super refreshing taste, non-alcoholic and Halal.', NULL, NULL, 'Bulldozer is a malt beverage with a super refreshing taste, non-alcoholic and Halal.', NULL, NULL, '<p>Bulldozer is a malt beverage with a super refreshing taste, non-alcoholic and Halal.Bulldozer is a malt beverage with a super refreshing taste, non-alcoholic and Halal.</p>', NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 6, 4, 3, 6, 6, 5, '2019-04-01 17:45:10', '2019-04-04 06:23:06'),
(81, 11, 14, 2, 0, 1, NULL, 1, 1, 1, 1, 50, 0, 55.00, '2019-04-01', 'Cheer Up', NULL, NULL, 254.00, NULL, NULL, 45.00, 53.00, 'Cheer Up\r\nCheer Up is a fizzy, carbonated lemon drink with immediate refreshing characteristics.', NULL, NULL, 'Cheer Up\r\nCheer Up is a fizzy, carbonated lemon drink with immediate refreshing characteristics.', NULL, NULL, '<h2>Cheer Up</h2>\r\n\r\n<p>Cheer Up is a fizzy, carbonated lemon drink with immediate refreshing characteristics.</p>', NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 12, 4, 3, 6, 6, 5, '2019-04-01 17:50:58', '2019-04-04 05:41:22'),
(82, 11, 14, 2, 0, 1, NULL, 1, 1, 1, NULL, 154, 0, 45.00, '2019-04-01', 'MaxxCola', NULL, NULL, 51.00, NULL, NULL, 45.00, 44.00, 'MaxxCola\r\nMaxxCola is an energizing carbonated drink.', NULL, NULL, 'MaxxCola\r\nMaxxCola is an energizing carbonated drink.', NULL, NULL, '<h2>MaxxCola</h2>\r\n\r\n<p>MaxxCola is an energizing carbonated drink.</p>', NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 10, 4, 3, 6, 6, 5, '2019-04-01 17:53:41', '2019-04-27 23:12:11'),
(83, 11, 14, 2, 0, 1, NULL, 1, 1, NULL, NULL, 25, 0, 2220.00, '2019-04-01', 'Ody', NULL, NULL, 56.00, NULL, NULL, 45.00, 56.00, 'Ody\r\nOdy is a refreshing orange flavored carbonated drink, made to beat the summer heat.', NULL, NULL, 'Ody\r\nOdy is a refreshing orange flavored carbonated drink, made to beat the summer heat.', NULL, NULL, '<h2>Ody</h2>\r\n\r\n<p>Ody is a refreshing orange flavored carbonated drink, made to beat the summer heat.</p>', NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 7, 4, 3, 6, 6, 5, '2019-04-01 17:56:35', '2019-04-04 05:59:16'),
(84, 11, 14, 2, 0, 1, NULL, 1, 1, NULL, NULL, 49, 0, 500000.00, '2019-04-01', 'PRAN Drinking Water', NULL, NULL, 25.00, NULL, NULL, 26.00, 25.00, 'PRAN Drinking Water\r\nPRAN Drinking Water is a clear purified water processed naturally ensuring your health and safety', NULL, NULL, 'PRAN Drinking Water\r\nPRAN Drinking Water is a clear purified water processed naturally ensuring your health and safety', NULL, NULL, '<h2>PRAN Drinking Water</h2>\r\n\r\n<p>PRAN Drinking Water is a clear purified water processed naturally ensuring your health and safety</p>', NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 4, 4, 3, 6, 6, 5, '2019-04-01 17:58:56', '2019-04-04 01:45:14'),
(85, 7, 13, 2, 0, NULL, NULL, 1, NULL, 1, NULL, 5, 0, 4999.00, '2019-04-01', 'Baby Oil', NULL, NULL, 210.00, NULL, NULL, 211.00, 211.00, 'Baby Oil is preferred by mothers all around the world to keep the delicate skin of babies soft and moisturized. It is a moisturizer for silky soft skin with a special formula that locks in up to ten times more moisture on a wet skin than on an ordinary dry skin.It leaves your baby\'s skin soft and smooth. This gentle oil is also easy to spread, so it is ideal for baby...', NULL, NULL, 'Rs 35/Piece Get Latest Price\r\nAge Group	Newly Born, 3-12 Months\r\nType	Massage Oil, Body Oil\r\nBaby Oil is preferred by mothers all around the world to keep the delicate skin of babies soft and moisturized. It is a moisturizer for silky soft skin with a special formula that locks in up to ten times more moisture on a wet skin than on an ordinary dry skin.It leaves your baby\'s skin soft and smooth. This gentle oil is also easy to spread, so it is ideal for baby...', NULL, NULL, '<p>Rs 35/Piece&nbsp;Get Latest Price</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<h1>Baby Oil</h1>\r\n\r\n			<p>Rs 35/Piece&nbsp;Get Latest Price</p>\r\n\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<td>Age Group</td>\r\n						<td>Newly Born, 3-12 Months</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Type</td>\r\n						<td>Massage Oil, Body Oil</td>\r\n					</tr>\r\n				</tbody>\r\n				<tbody>\r\n				</tbody>\r\n			</table>\r\n\r\n			<p>Baby Oil is preferred by mothers all around the world to keep the delicate skin of babies soft and moisturized. It is a moisturizer for silky soft skin with a special formula that locks in up to ten times more moisture on a wet skin than on an ordinary dry skin.It leaves your baby&#39;s skin soft and smooth. This gentle oil is also easy to spread, so it is ideal for baby...</p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n	<tbody>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Baby Oil is preferred by mothers all around the world to keep the delicate skin of babies soft and moisturized. It is a moisturizer for silky soft skin with a special formula that locks in up to ten times more moisture on a wet skin than on an ordinary dry skin.It leaves your baby&#39;s skin soft and smooth. This gentle oil is also easy to spread, so it is ideal for baby...</p>', NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 4, 3, 6, 6, 5, '2019-04-01 18:05:18', '2019-04-04 05:57:38'),
(86, 7, 13, 2, 0, NULL, NULL, 1, 1, 1, NULL, 50, 0, 5222.00, '2019-04-01', 'Himalaya 200gm Baby Powder', NULL, NULL, 200.00, NULL, NULL, 45.00, 44.00, 'Himalaya 200gm Baby Powder\r\nRs 117/ PieceGet Latest Price\r\n\r\nBrand: Himalaya\r\n\r\nFeatures: Mildness tested for baby skin\r\n\r\nKey Ingredients: Neem and Knus Grass\r\n\r\nPackaging Size: 200 gm\r\n\r\n\r\n200gm Baby Powder', NULL, NULL, 'Himalaya 200gm Baby Powder\r\nRs 117/ PieceGet Latest Price\r\n\r\nBrand: Himalaya\r\n\r\nFeatures: Mildness tested for baby skin\r\n\r\nKey Ingredients: Neem and Knus Grass\r\n\r\nPackaging Size: 200 gm\r\n\r\n\r\n200gm Baby Powder', NULL, NULL, '<h3><a href=\"https://www.indiamart.com/proddetail/himalaya-200gm-baby-powder-20189893130.html\" target=\"_blank\">Himalaya 200gm Baby Powder</a></h3>\r\n\r\n<p>Rs&nbsp;117/&nbsp;PieceGet Latest Price</p>\r\n\r\n<p><strong>Brand</strong>: Himalaya</p>\r\n\r\n<p><strong>Features</strong>: Mildness tested for baby skin</p>\r\n\r\n<p><strong>Key Ingredients</strong>: Neem and Knus Grass</p>\r\n\r\n<p><strong>Packaging Size</strong>: 200 gm</p>\r\n\r\n<p><br />\r\n200gm Baby Powder</p>', NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 6, 4, 3, 6, 6, 5, '2019-04-01 18:09:08', '2019-04-04 01:46:15'),
(87, 11, 14, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, 20, 0, -1.00, NULL, 'Arab Mariam Date - 1 kg', 'অরিজিনাল মরিয়ম খেজুর (মদিনা) ১ কেজি', NULL, NULL, NULL, NULL, 2000.00, 1599.00, '3অরিজিনাল মরিয়ম খেজুর (মদিনা) ১ কেজি ফিনিক্স খেজুর, সাধারণভাবে সবার কাছে মরিয়ম খেজুর নামে পরিচিত খেজুরের খাদ্য শক্তি ও খনিজ লবণের উপাদান শরীরকে সতেজ রাখে সারাদিন রোজা রেখে খেজুর দিয়ে ইফতার করা সুন্নত', '2অরিজিনাল মরিয়ম খেজুর (মদিনা) ১ কেজি ফিনিক্স খেজুর, সাধারণভাবে সবার কাছে মরিয়ম খেজুর নামে পরিচিত খেজুরের খাদ্য শক্তি ও খনিজ লবণের উপাদান শরীরকে সতেজ রাখে সারাদিন রোজা রেখে খেজুর দিয়ে ইফতার করা সুন্নত', NULL, '1অরিজিনাল মরিয়ম খেজুর (মদিনা) ১ কেজি ফিনিক্স খেজুর, সাধারণভাবে সবার কাছে মরিয়ম খেজুর নামে পরিচিত খেজুরের খাদ্য শক্তি ও খনিজ লবণের উপাদান শরীরকে সতেজ রাখে সারাদিন রোজা রেখে খেজুর দিয়ে ইফতার করা সুন্নত', '1অরিজিনাল মরিয়ম খেজুর (মদিনা) ১ কেজি ফিনিক্স খেজুর, সাধারণভাবে সবার কাছে মরিয়ম খেজুর নামে পরিচিত খেজুরের খাদ্য শক্তি ও খনিজ লবণের উপাদান শরীরকে সতেজ রাখে সারাদিন রোজা রেখে খেজুর দিয়ে ইফতার করা সুন্নত', NULL, '2অরিজিনাল মরিয়ম খেজুর (মদিনা) ১ কেজি ফিনিক্স খেজুর, সাধারণভাবে সবার কাছে মরিয়ম খেজুর নামে পরিচিত খেজুরের খাদ্য শক্তি ও খনিজ লবণের উপাদান শরীরকে সতেজ রাখে সারাদিন রোজা রেখে খেজুর দিয়ে ইফতার করা সুন্নত', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, 4, 3, 6, 6, 5, '2019-04-01 21:20:34', '2019-04-01 21:22:43'),
(88, 7, 14, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 0, NULL, NULL, 'Pure milk of native cow - 5 liters', 'দেশী গরুর খাঁটি দুধ – ৫ লিটার', NULL, NULL, 201.00, NULL, NULL, 300.00, '১ লিটারে ৫ টি বোতল ৫ লিটার দুধ দেশী গরুর খাঁটি দুধ । আমারা সরাসরি প্রান্তিক কৃষকের কাছ থেকে সেরা দুধ সংগ্রহ করে আপনাদের দরজায় পৌঁছে দেওয়ার প্রত্যয় নিয়ে কাজ করে যাচ্ছি। আপনাদের চাহিদা ও পণ্যের সর্বচ্চো গুনগত মান নিশ্চিত করাই আমাদের প্রধান লক্ষ্য। নিকুন্জ, খিলক্ষেত, বনানী, উত্তরা এরিয়ায় থাকছে ফ্রি হোম ডেলিভারি সুবিধা। এছাড়া দৈনিক, সাপ্তাহিক ভিত্তিতে দুধ সরবরাহ করা হবে।', '১ লিটারে ৫ টি বোতল ৫ লিটার দুধ দেশী গরুর খাঁটি দুধ । আমারা সরাসরি প্রান্তিক কৃষকের কাছ থেকে সেরা দুধ সংগ্রহ করে আপনাদের দরজায় পৌঁছে দেওয়ার প্রত্যয় নিয়ে কাজ করে যাচ্ছি। আপনাদের চাহিদা ও পণ্যের সর্বচ্চো গুনগত মান নিশ্চিত করাই আমাদের প্রধান লক্ষ্য। নিকুন্জ, খিলক্ষেত, বনানী, উত্তরা এরিয়ায় থাকছে ফ্রি হোম ডেলিভারি সুবিধা। এছাড়া দৈনিক, সাপ্তাহিক ভিত্তিতে দুধ সরবরাহ করা হবে।', NULL, '১ লিটারে ৫ টি বোতল ৫ লিটার দুধ দেশী গরুর খাঁটি দুধ । আমারা সরাসরি প্রান্তিক কৃষকের কাছ থেকে সেরা দুধ সংগ্রহ করে আপনাদের দরজায় পৌঁছে দেওয়ার প্রত্যয় নিয়ে কাজ করে যাচ্ছি। আপনাদের চাহিদা ও পণ্যের সর্বচ্চো গুনগত মান নিশ্চিত করাই আমাদের প্রধান লক্ষ্য। নিকুন্জ, খিলক্ষেত, বনানী, উত্তরা এরিয়ায় থাকছে ফ্রি হোম ডেলিভারি সুবিধা। এছাড়া দৈনিক, সাপ্তাহিক ভিত্তিতে দুধ সরবরাহ করা হবে।', '১ লিটারে ৫ টি বোতল ৫ লিটার দুধ দেশী গরুর খাঁটি দুধ । আমারা সরাসরি প্রান্তিক কৃষকের কাছ থেকে সেরা দুধ সংগ্রহ করে আপনাদের দরজায় পৌঁছে দেওয়ার প্রত্যয় নিয়ে কাজ করে যাচ্ছি। আপনাদের চাহিদা ও পণ্যের সর্বচ্চো গুনগত মান নিশ্চিত করাই আমাদের প্রধান লক্ষ্য। নিকুন্জ, খিলক্ষেত, বনানী, উত্তরা এরিয়ায় থাকছে ফ্রি হোম ডেলিভারি সুবিধা। এছাড়া দৈনিক, সাপ্তাহিক ভিত্তিতে দুধ সরবরাহ করা হবে।', NULL, '১ লিটারে ৫ টি বোতল ৫ লিটার দুধ দেশী গরুর খাঁটি দুধ । আমারা সরাসরি প্রান্তিক কৃষকের কাছ থেকে সেরা দুধ সংগ্রহ করে আপনাদের দরজায় পৌঁছে দেওয়ার প্রত্যয় নিয়ে কাজ করে যাচ্ছি। আপনাদের চাহিদা ও পণ্যের সর্বচ্চো গুনগত মান নিশ্চিত করাই আমাদের প্রধান লক্ষ্য। নিকুন্জ, খিলক্ষেত, বনানী, উত্তরা এরিয়ায় থাকছে ফ্রি হোম ডেলিভারি সুবিধা। এছাড়া দৈনিক, সাপ্তাহিক ভিত্তিতে দুধ সরবরাহ করা হবে।', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 4, 3, 6, 6, 5, '2019-04-02 07:36:54', '2019-04-02 07:43:04'),
(89, 6, 4, 2, 0, NULL, 1, 1, NULL, 1, NULL, 4, 2, 4555.00, '2019-04-04', 'JYU4017CN - Intel Core i5 7200U 2.5 GHz - 8 GB DDR4 RAM - 256 GB M.2 SSD - Intel HD Graphics 620 - 13.3 FHD Laptop - Silver\"', NULL, NULL, 5000.00, NULL, NULL, 44333.00, 12222222.00, 'Mi Notebook Air - the first laptop from the Chinese company Xiaomi. The case looks stylish, expensive and leaves a pleasant feeling during work. It is made of aluminum, glass and high-quality plastic. The model is assembled perfectly, has no gaps and works quietly.\r\n\r\nMetal case - modern laconic design', NULL, NULL, 'JYU4017CN - Intel Core i5 7200U 2.5 GHz - 8 GB DDR4 RAM - 256 GB M.2 SSD - Intel HD Graphics 620 - 13.3 FHD Laptop - Silver\"', NULL, NULL, '<h2>Product details of JYU4017CN - Intel Core i5 7200U 2.5 GHz - 8 GB DDR4 RAM - 256 GB M.2 SSD - Intel HD Graphics 620 - 13.3 FHD Laptop - Silver&quot;</h2>\r\n\r\n<ul>\r\n	<li>13.3-inch FHD display</li>\r\n	<li>Intel Core i5 7200U 2.5 GHz, 3MB</li>\r\n	<li>Intel HD Graphics 620 and NVIDIA GeForce 150MX SGDDR5 2GB Dedicated Dual Graphics</li>\r\n	<li>8GB DDR4 RAM</li>\r\n	<li>256 GB M.2 SSD Drive</li>\r\n	<li>1MP HD webcam</li>\r\n	<li>Wi-Fi, Bluetooth, USB Type-C, HDMI</li>\r\n	<li>Finger Print Sensor</li>\r\n	<li>Battery: 39.2Whr/5.4Ah, 50% charge in 30min</li>\r\n</ul>\r\n\r\n<h2>Xiaomi JYU4017CN - Intel Core i5 7200U 2.5 GHz - 8 GB DDR4 RAM - 256 GB M.2 SSD - Intel HD Graphics 620 - 13.3inch FHD Laptop</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mi Notebook Air - the first laptop from the Chinese company Xiaomi. The case looks stylish, expensive and leaves a pleasant feeling during work. It is made of aluminum, glass and high-quality plastic. The model is assembled perfectly, has no gaps and works quietly.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Metal case - modern laconic design</p>\r\n\r\n<p>Due to the dense placement of components, motherboard and special technology of connecting parts, Xiaomi was able to make Mi Notebook Air even thinner. By using a high-density battery, the device consumes a minimum amount of energy, in addition, such a battery takes up very little space. The introduction of these innovations allowed XiaomiCreate a line of portable notebooks that combine high performance and compact size. Mi Notebook Air easily fits in almost any bag or backpack, it is easy to carry with you even in one hand, and it always attracts attention, thanks to its stylish appearance.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Components of the highest quality</p>\r\n\r\n<p>Xiaomi strives to achieve maximum heights, even in small things. High-performance processor from Intel, fast SSD drive, Nvidia GeForce MX150 graphics card is the key to success. Play powerful modern games, create and edit videos without any problems and delays. You no longer have to choose between portability and functionality.</p>\r\n\r\n<p>Full dive with Full HD screen and thin frame</p>\r\n\r\n<p>The Mi Notebook Air notebook screen has an ultra-thin 5.59 mm-wide frame, which, combined with a resolution of 1920 x 1080 pixels, makes an incredible effect, helping you focus better on the image. The protective glass is made of high-hardness synthetic sapphire - 7H on the Mohs scale, which makes the display resistant to scratches.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The special lamination technology reduces the thickness of the air gap between the display and the protective glass by 4 times, as a result of which the probability of glare caused by refraction of light decreases. Enjoy high-quality images both at home and outdoors, even in bright sunlight.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Batteries with high energy density</p>\r\n\r\n<p>Such a small laptop with such a long battery life is not magic, it&#39;s a science. To do this, Xiaomi uses batteries with a high energy density of 578 W * h / l, which makes the battery very light and allows using quick charging via USB Type-C port. Now you can charge the laptop by 50% in just half an hour. Mi Notebook Air is convenient to use at any time and in any place - at home, on a walk or while traveling.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Surround sound from an Austrian manufacturer</p>\r\n\r\n<p>Do you like listening to music and watching movies on your laptop? Xiaomi took care of the sound quality in Mi Notebook Air. In order to make the sound quality and clean, and the bass is rich and powerful - the device is equipped with speakers from the Austrian manufacturer AKG. Dolby Audio Premium technology makes the sound more natural and balanced.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A rich interface</p>\r\n\r\n<p>All the top models of the new generation laptop use USB Type-C ports, and Mi Notebook Air is no exception. You can use it to charge gadgets, transfer data, and output video. Mi Notebook Air has an HDMI output, 2 USB 3.0 ports, and a 3.5 mm headphone jack. This variety of ports and outputs greatly expands your capabilities - for example, you can use an optional 4K display for work or entertainment.</p>\r\n\r\n<h2>Specifications of JYU4017CN - Intel Core i5 7200U 2.5 GHz - 8 GB DDR4 RAM - 256 GB M.2 SSD - Intel HD Graphics 620 - 13.3 FHD Laptop - Silver&quot;</h2>\r\n\r\n<ul>\r\n	<li>Brand\r\n	<p>Xiaomi</p>\r\n	</li>\r\n	<li>SKU\r\n	<p>XI285EL0O37R4NAFAMZ-1146880</p>\r\n	</li>\r\n	<li>Graphic Card\r\n	<p>Intel HD Graphics 620 With NVIDIA GeForce 150MX SGDDR5 2GB Dedicated Graphics</p>\r\n	</li>\r\n	<li>Operating System\r\n	<p>Windows OS</p>\r\n	</li>\r\n	<li>CPU Speed (GHz)\r\n	<p>2.5 GHZ</p>\r\n	</li>\r\n	<li>Display Size\r\n	<p>13.3</p>\r\n	</li>\r\n	<li>Processor Type\r\n	<p>Core i5</p>\r\n	</li>\r\n	<li>Hard Disk (GB)\r\n	<p>256GB</p>\r\n	</li>\r\n	<li>Warranty Policy EN\r\n	<p>1 Year Parts and 2 Years Service Warranty</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>What&rsquo;s in the box</p>\r\n\r\n<p>JYU4017CN - Intel Core i5 7200U 2.5 GHz - 8 GB DDR4 RAM - 256 GB M.2 SSD - Intel HD Graphics 620 - 13.3 FHD Laptop - Silver&quot;</p>', NULL, NULL, 'no', NULL, NULL, NULL, NULL, '1', '45', 1, NULL, 19, 9, 2, 7, 5, 5, '2019-04-03 23:51:18', '2019-04-04 05:56:53'),
(93, 6, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 2, 125.00, NULL, 'Acer Aspire A315-21 28F1 AMD-E2-9000 (1.80-2.20GHz, 4GB DDR4, 1TB) 15.6 Inch Obsidian Black Notebook - FreeDOS (2 Yr Warranty) #NX.GNVSI.007', NULL, NULL, NULL, NULL, NULL, 22300.00, 22000.00, 'Model - Acer Aspire A315-21 28F1, Processor - AMD E2-9000, Processor Clock Speed - 1.80-2.20GHz, CPU Cache - 1MB, Display Size - 15.6\", Display Type - HD LED Display, Display Resolution - 1366 x 768, RAM - 4GB, RAM Type - DDR4, Max RAM Support - 12GB, Storage - 1TB HDD, Graphics Chipset - AMD Radeon R2 Graphics, Graphics Memory - Shared, Networking - LAN, WiFi, Bluetooth, Card Reader, WebCam, Display Port - HDMI, Audio Port - Combo, USB Port - 1 x USB3.0, 2 x USB2.0, Battery - 2 Cell Li-Polymer, Backup Time - Up to 5.5 Hrs., Operating System - Free Dos, Weight - 2.10Kg, Color - Obsidian Black, Part No - NX.GNVSI.007, Country of Origin - Taiwan, Made in/ Assemble - China, Warranty - 2 year (Battery, Adapter 1 year)', NULL, NULL, 'Model - Acer Aspire A315-21 28F1, Processor - AMD E2-9000, Processor Clock Speed - 1.80-2.20GHz, CPU Cache - 1MB, Display Size - 15.6\", Display Type - HD LED Display, Display Resolution - 1366 x 768, RAM - 4GB, RAM Type - DDR4, Max RAM Support - 12GB, Storage - 1TB HDD, Graphics Chipset - AMD Radeon R2 Graphics, Graphics Memory - Shared, Networking - LAN, WiFi, Bluetooth, Card Reader, WebCam, Display Port - HDMI, Audio Port - Combo, USB Port - 1 x USB3.0, 2 x USB2.0, Battery - 2 Cell Li-Polymer, Backup Time - Up to 5.5 Hrs., Operating System - Free Dos, Weight - 2.10Kg, Color - Obsidian Black, Part No - NX.GNVSI.007, Country of Origin - Taiwan, Made in/ Assemble - China, Warranty - 2 year (Battery, Adapter 1 year)', NULL, NULL, '<h2>Additional Information</h2>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Brand</th>\r\n			<td>Acer</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Model</th>\r\n			<td>Acer Aspire A315-21 28F1</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Processor</th>\r\n			<td>AMD E2-9000</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Clock Speed</th>\r\n			<td>1.80-2.20GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Cache</th>\r\n			<td>1MB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Display Type</th>\r\n			<td>HD LED</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Display Size</th>\r\n			<td>15.6&quot;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Display Resolution</th>\r\n			<td>1366x768 (WxH) HD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Touch</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>RAM type</th>\r\n			<td>DDR4</td>\r\n		</tr>\r\n		<tr>\r\n			<th>RAM</th>\r\n			<td>4GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Storage</th>\r\n			<td>1TB HDD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Graphics chipset</th>\r\n			<td>AMD Radeon R2 Graphics</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Graphics memory</th>\r\n			<td>Shared</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Networking</th>\r\n			<td>LAN, WiFi, Bluetooth, Card Reader, WebCam</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Display port</th>\r\n			<td>HDMI</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Audio port</th>\r\n			<td>Combo</td>\r\n		</tr>\r\n		<tr>\r\n			<th>USB Port</th>\r\n			<td>1 x USB3.0, 2 x USB2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Battery</th>\r\n			<td>2 Cell Li-Polymer</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Backup time</th>\r\n			<td>Up to 5.5 Hrs.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Weight</th>\r\n			<td>2.10Kg</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Color</th>\r\n			<td>Obsidian Black</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Operating System</th>\r\n			<td>Free-Dos</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Part No</th>\r\n			<td>NX.GNVSI.007</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Country of Origin</th>\r\n			<td>Taiwan</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Made in/ Assemble</th>\r\n			<td>China</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Warranty</th>\r\n			<td>2 year (Battery, Adapter 1 year)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Upcomming</th>\r\n			<td>No</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16\'in', '4jj', 0, NULL, 0, 4, 3, 6, 6, 5, '2019-04-05 23:55:58', '2019-04-06 01:33:50'),
(99, 6, 5, 2, 0, 1, NULL, 1, NULL, NULL, 1, 2, 2, 4545.00, '2019-04-06', 'I-life ZEDBook-W Intel Atom Quad Core Z3735F (1.33-1.83GHz, 2GB DDR3, 32GB eMMC) Windows 10 Home, Detachable 10.1 Inch Touch IPS Display Gold Notebook', NULL, NULL, 12.00, NULL, NULL, 16.00, 15.00, 'Specialty : Tab + Laptop, Dual Camera ( 2MP + 2MP), Touch, Detachable', NULL, NULL, 'Processor - Intel Atom Quad Core Z3735F\r\nProcessor Clock Speed - 1.33-1.83GHz\r\nDisplay Size - 10.1\"\r\nRAM - 2GB\r\nRAM Type - DDR3\r\nHDD - 32GB eMMC\r\nOperating System - Windows 10 Home', NULL, NULL, '<h2>&nbsp;</h2>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Brand</th>\r\n			<td>i-life</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Model</th>\r\n			<td>I-life ZEDBook-W</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Processor</th>\r\n			<td>Intel Atom Quad Core Z3735F</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Clock Speed</th>\r\n			<td>1.33-1.83GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Display Type</th>\r\n			<td>IPS Touch</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Display Size</th>\r\n			<td>10.1&quot;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Display Resolution</th>\r\n			<td>1920x1080 (WxH) FHD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Touch</th>\r\n			<td>Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<th>RAM type</th>\r\n			<td>DDR3</td>\r\n		</tr>\r\n		<tr>\r\n			<th>RAM</th>\r\n			<td>2GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Storage</th>\r\n			<td>32GB eMMC</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Optical device</th>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Networking</th>\r\n			<td>WiFi, Bluetooth</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Display port</th>\r\n			<td>Micro HDMI</td>\r\n		</tr>\r\n		<tr>\r\n			<th>USB Port</th>\r\n			<td>2 x USB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Battery</th>\r\n			<td>6000mAh</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Backup time</th>\r\n			<td>Up to 6 hours</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Color</th>\r\n			<td>Gold</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Operating System</th>\r\n			<td>Win-10 Home</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Others</th>\r\n			<td>Specialty : Tab + Laptop, Dual Camera ( 2MP + 2MP), Touch, Detachable</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Warranty</th>\r\n			<td>1 year</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Upcomming</th>\r\n			<td>No</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, NULL, '4', NULL, NULL, NULL, NULL, '45557', 'jkk', 1, NULL, 0, 4, 3, 6, 6, 5, '2019-04-06 01:18:51', '2019-04-06 03:28:57'),
(100, 6, 4, 2, 8, 1, NULL, NULL, 1, 1, 1, 5, 2, 577.00, '2019-04-06', 'Chuwi Lapbook SE 13.3\" Full HD IPS Display', NULL, NULL, 29900.00, NULL, NULL, 29900.00, 29900.00, 'Chuwi Lapbook SE 13.3 inch FHD IPS display With Intel Celeron N4100 Processor ( 1.10 GHz up to 2.40 GHz). LapBook SE comes with 4GB DDR4 Ram,', NULL, NULL, 'Intel Celeron N4100 Processor ( 1.10 GHz up to 2.40 GHz)\r\n4GB DDR4 Ram\r\n128GB SSD + 32GB eMMC\r\nGenuine Win 10 Home', NULL, NULL, '<h3>Specification:</h3>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"3\">Basic Information</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Processor</td>\r\n			<td>Intel Celeron N4100 Processor (4M Cache, 1.10 GHz up to 2.40 GHz)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Display</td>\r\n			<td>13.3 inch FHD IPS</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Memory</td>\r\n			<td>4GB DDR4</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Storage</td>\r\n			<td>128GB SSD + 32GB eMMC</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Graphics</td>\r\n			<td>Intel HD Graphics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Operating System</td>\r\n			<td>Genuine Windows 10</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Battery</td>\r\n			<td>8-9 Hours 37Wh Battery</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"3\">Input Devices</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Keyboard</td>\r\n			<td>Backlit Keyboard</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Optical Drive</td>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<td>WebCam</td>\r\n			<td>Front 2.0 MP Camera</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"3\">Network &amp; Wireless Connectivity</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Wi-Fi</td>\r\n			<td>Dual WiFi AC 3165</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bluetooth</td>\r\n			<td>BT 4.1</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"3\">Ports, Connectors &amp; Slots</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>USB (s)</td>\r\n			<td>Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HDMI</td>\r\n			<td>Micro HDMI Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Audio Jack Combo</td>\r\n			<td>3.5 mm Jack</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, NULL, 'red', NULL, NULL, NULL, NULL, 'L M N lk', 'Raj', 1, NULL, 0, 4, 3, 6, 6, 5, '2019-04-06 05:15:04', '2019-04-06 05:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_name` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_name`, `created_at`, `updated_at`) VALUES
(4, 63, 1, '2019-03-31 00:17:05', '2019-03-31 00:17:05'),
(5, 63, 2, '2019-03-31 00:17:05', '2019-03-31 00:17:05'),
(6, 63, 3, '2019-03-31 00:17:05', '2019-03-31 00:17:05'),
(7, 63, 4, '2019-03-31 00:17:05', '2019-03-31 00:17:05'),
(8, 63, 5, '2019-03-31 00:17:05', '2019-03-31 00:17:05'),
(9, 64, 3, '2019-03-31 01:48:56', '2019-03-31 01:48:56'),
(10, 64, 4, '2019-03-31 01:48:56', '2019-03-31 01:48:56'),
(11, 65, 1, '2019-03-31 03:07:46', '2019-03-31 03:07:46'),
(12, 65, 2, '2019-03-31 03:07:46', '2019-03-31 03:07:46'),
(13, 66, 1, '2019-03-31 03:27:28', '2019-03-31 03:27:28'),
(14, 66, 2, '2019-03-31 03:27:28', '2019-03-31 03:27:28'),
(15, 73, 1, '2019-03-31 12:38:18', '2019-03-31 12:38:18'),
(16, 73, 2, '2019-03-31 12:38:18', '2019-03-31 12:38:18'),
(17, 74, 1, '2019-03-31 12:46:21', '2019-03-31 12:46:21'),
(18, 74, 2, '2019-03-31 12:46:21', '2019-03-31 12:46:21'),
(19, 87, 3, '2019-04-01 21:20:36', '2019-04-01 21:20:36'),
(20, 87, 11, '2019-04-01 21:20:36', '2019-04-01 21:20:36'),
(21, 89, 1, '2019-04-03 23:51:20', '2019-04-03 23:51:20'),
(22, 89, 2, '2019-04-03 23:51:20', '2019-04-03 23:51:20'),
(23, 96, 1, '2019-04-06 00:09:18', '2019-04-06 00:09:18'),
(24, 96, 2, '2019-04-06 00:09:18', '2019-04-06 00:09:18'),
(25, 96, 3, '2019-04-06 00:09:18', '2019-04-06 00:09:18'),
(26, 100, 1, '2019-04-06 05:15:05', '2019-04-06 05:15:05'),
(27, 100, 2, '2019-04-06 05:15:05', '2019-04-06 05:15:05'),
(28, 100, 3, '2019-04-06 05:15:05', '2019-04-06 05:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(100) NOT NULL DEFAULT '0',
  `large_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medium_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `large_image`, `medium_image`, `small_image`, `created_at`, `updated_at`) VALUES
(81, 8, 'product_image/large/qv_thumb_1.jpg', 'product_image/medium/qv_thumb_1.jpg', 'product_image/small/qv_thumb_1.jpg', '2018-12-06 02:42:56', '2018-12-06 02:42:56'),
(82, 8, 'product_image/large/qv_thumb_2.jpg', 'product_image/medium/qv_thumb_2.jpg', 'product_image/small/qv_thumb_2.jpg', '2018-12-06 02:42:56', '2018-12-06 02:42:56'),
(85, 7, 'product_image/large/product_img_21.jpg', 'product_image/medium/product_img_21.jpg', 'product_image/small/product_img_21.jpg', '2018-12-06 02:43:46', '2018-12-06 02:43:46'),
(86, 7, 'product_image/large/product_img_22.jpg', 'product_image/medium/product_img_22.jpg', 'product_image/small/product_img_22.jpg', '2018-12-06 02:43:47', '2018-12-06 02:43:47'),
(87, 7, 'product_image/large/product_img_23.jpg', 'product_image/medium/product_img_23.jpg', 'product_image/small/product_img_23.jpg', '2018-12-06 02:43:47', '2018-12-06 02:43:47'),
(88, 7, 'product_image/large/product_img_24.jpg', 'product_image/medium/product_img_24.jpg', 'product_image/small/product_img_24.jpg', '2018-12-06 02:43:47', '2018-12-06 02:43:47'),
(93, 11, 'product_image/large/subcategory_img_5.jpg', 'product_image/medium/subcategory_img_5.jpg', 'product_image/small/subcategory_img_5.jpg', '2018-12-15 01:58:38', '2018-12-15 01:58:38'),
(94, 11, 'product_image/large/tabs_img_1.jpg', 'product_image/medium/tabs_img_1.jpg', 'product_image/small/tabs_img_1.jpg', '2018-12-15 01:58:38', '2018-12-15 01:58:38'),
(95, 11, 'product_image/large/tabs_img_2.jpg', 'product_image/medium/tabs_img_2.jpg', 'product_image/small/tabs_img_2.jpg', '2018-12-15 01:58:38', '2018-12-15 01:58:38'),
(96, 11, 'product_image/large/tabs_img_3.jpg', 'product_image/medium/tabs_img_3.jpg', 'product_image/small/tabs_img_3.jpg', '2018-12-15 01:58:38', '2018-12-15 01:58:38'),
(109, 15, 'product_image/large/new_5.jpg', 'product_image/medium/new_5.jpg', 'product_image/small/new_5.jpg', '2018-12-15 02:44:24', '2018-12-15 02:44:24'),
(110, 15, 'product_image/large/new_6.jpg', 'product_image/medium/new_6.jpg', 'product_image/small/new_6.jpg', '2018-12-15 02:44:24', '2018-12-15 02:44:24'),
(113, 16, 'product_image/large/6965.jpg', 'product_image/medium/6965.jpg', 'product_image/small/6965.jpg', '2018-12-19 22:55:28', '2018-12-19 22:55:28'),
(114, 16, 'product_image/large/abstract-art-artwork-1193879.jpg', 'product_image/medium/abstract-art-artwork-1193879.jpg', 'product_image/small/abstract-art-artwork-1193879.jpg', '2018-12-19 22:55:36', '2018-12-19 22:55:36'),
(115, 16, 'product_image/large/android-wallpaper-city-dark-248159.jpg', 'product_image/medium/android-wallpaper-city-dark-248159.jpg', 'product_image/small/android-wallpaper-city-dark-248159.jpg', '2018-12-19 22:55:43', '2018-12-19 22:55:43'),
(116, 16, 'product_image/large/background-desk-desktop-background-1097930.jpg', 'product_image/medium/background-desk-desktop-background-1097930.jpg', 'product_image/small/background-desk-desktop-background-1097930.jpg', '2018-12-19 22:55:50', '2018-12-19 22:55:50'),
(117, 17, 'product_image/large/6965.jpg', 'product_image/medium/6965.jpg', 'product_image/small/6965.jpg', '2018-12-19 22:56:38', '2018-12-19 22:56:38'),
(118, 17, 'product_image/large/abstract-art-artwork-1193879.jpg', 'product_image/medium/abstract-art-artwork-1193879.jpg', 'product_image/small/abstract-art-artwork-1193879.jpg', '2018-12-19 22:56:46', '2018-12-19 22:56:46'),
(119, 17, 'product_image/large/android-wallpaper-city-dark-248159.jpg', 'product_image/medium/android-wallpaper-city-dark-248159.jpg', 'product_image/small/android-wallpaper-city-dark-248159.jpg', '2018-12-19 22:56:53', '2018-12-19 22:56:53'),
(120, 17, 'product_image/large/background-desk-desktop-background-1097930.jpg', 'product_image/medium/background-desk-desktop-background-1097930.jpg', 'product_image/small/background-desk-desktop-background-1097930.jpg', '2018-12-19 22:57:00', '2018-12-19 22:57:00'),
(125, 19, 'product_image/large/abstract-art-artwork-1193879.jpg', 'product_image/medium/abstract-art-artwork-1193879.jpg', 'product_image/small/abstract-art-artwork-1193879.jpg', '2018-12-20 00:01:39', '2018-12-20 00:01:39'),
(126, 19, 'product_image/large/android-wallpaper-city-dark-248159.jpg', 'product_image/medium/android-wallpaper-city-dark-248159.jpg', 'product_image/small/android-wallpaper-city-dark-248159.jpg', '2018-12-20 00:01:45', '2018-12-20 00:01:45'),
(127, 19, 'product_image/large/background-desk-desktop-background-1097930.jpg', 'product_image/medium/background-desk-desktop-background-1097930.jpg', 'product_image/small/background-desk-desktop-background-1097930.jpg', '2018-12-20 00:01:51', '2018-12-20 00:01:51'),
(128, 25, 'product_image/large/873875.download.jpg', 'product_image/medium/873875.download.jpg', 'product_image/small/873875.download.jpg', '2019-03-07 11:35:31', '2019-03-07 11:35:31'),
(129, 25, 'product_image/large/421204.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/medium/421204.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/small/421204.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', '2019-03-07 11:35:31', '2019-03-07 11:35:31'),
(130, 25, 'product_image/large/185499.naturo-monkey-selfie.jpg', 'product_image/medium/185499.naturo-monkey-selfie.jpg', 'product_image/small/185499.naturo-monkey-selfie.jpg', '2019-03-07 11:35:32', '2019-03-07 11:35:32'),
(131, 27, 'product_image/large/899706.download.jpg', 'product_image/medium/899706.download.jpg', 'product_image/small/899706.download.jpg', '2019-03-07 11:45:51', '2019-03-07 11:45:51'),
(132, 27, 'product_image/large/385885.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/medium/385885.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/small/385885.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', '2019-03-07 11:45:51', '2019-03-07 11:45:51'),
(133, 27, 'product_image/large/698361.naturo-monkey-selfie.jpg', 'product_image/medium/698361.naturo-monkey-selfie.jpg', 'product_image/small/698361.naturo-monkey-selfie.jpg', '2019-03-07 11:45:52', '2019-03-07 11:45:52'),
(134, 28, 'product_image/large/338387.download.jpg', 'product_image/medium/338387.download.jpg', 'product_image/small/338387.download.jpg', '2019-03-07 11:47:33', '2019-03-07 11:47:33'),
(135, 28, 'product_image/large/799587.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/medium/799587.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/small/799587.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', '2019-03-07 11:47:34', '2019-03-07 11:47:34'),
(136, 28, 'product_image/large/903732.naturo-monkey-selfie.jpg', 'product_image/medium/903732.naturo-monkey-selfie.jpg', 'product_image/small/903732.naturo-monkey-selfie.jpg', '2019-03-07 11:47:34', '2019-03-07 11:47:34'),
(137, 0, 'product_image/large/802019.download.jpg', 'product_image/medium/802019.download.jpg', 'product_image/small/802019.download.jpg', '2019-03-07 11:51:16', '2019-03-07 11:51:16'),
(138, 0, 'product_image/large/161176.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/medium/161176.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/small/161176.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', '2019-03-07 11:51:17', '2019-03-07 11:51:17'),
(139, 0, 'product_image/large/863150.naturo-monkey-selfie.jpg', 'product_image/medium/863150.naturo-monkey-selfie.jpg', 'product_image/small/863150.naturo-monkey-selfie.jpg', '2019-03-07 11:51:17', '2019-03-07 11:51:17'),
(140, 0, 'product_image/large/828682.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/medium/828682.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/small/828682.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', '2019-03-07 12:00:42', '2019-03-07 12:00:42'),
(141, 0, 'product_image/large/540657.naturo-monkey-selfie.jpg', 'product_image/medium/540657.naturo-monkey-selfie.jpg', 'product_image/small/540657.naturo-monkey-selfie.jpg', '2019-03-07 12:00:43', '2019-03-07 12:00:43'),
(142, 0, 'product_image/large/723803.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/medium/723803.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/small/723803.ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', NULL, NULL),
(143, 0, 'product_image/large/241908.naturo-monkey-selfie.jpg', 'product_image/medium/241908.naturo-monkey-selfie.jpg', 'product_image/small/241908.naturo-monkey-selfie.jpg', NULL, NULL),
(144, 0, 'product_image/large/759933.download.jpg', 'product_image/medium/759933.download.jpg', 'product_image/small/759933.download.jpg', NULL, NULL),
(145, 0, 'product_image/large/845275.download.jpg', 'product_image/medium/845275.download.jpg', 'product_image/small/845275.download.jpg', NULL, NULL),
(146, 0, 'product_image/large/1551943271_download.jpg', 'product_image/medium/1551943271_download.jpg', 'product_image/small/1551943271_download.jpg', '2019-03-07 13:21:12', '2019-03-07 13:21:12'),
(147, 0, 'product_image/large/1551943272_ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/medium/1551943272_ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/small/1551943272_ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', '2019-03-07 13:21:12', '2019-03-07 13:21:12'),
(148, 0, 'product_image/large/1551943272_naturo-monkey-selfie.jpg', 'product_image/medium/1551943272_naturo-monkey-selfie.jpg', 'product_image/small/1551943272_naturo-monkey-selfie.jpg', '2019-03-07 13:21:12', '2019-03-07 13:21:12'),
(149, 0, 'product_image/large/1551943376_download.jpg', 'product_image/medium/1551943376_download.jpg', 'product_image/small/1551943376_download.jpg', NULL, NULL),
(150, 0, 'product_image/large/1551943376_ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/medium/1551943376_ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', 'product_image/small/1551943376_ff492540e0ae441f9984f1b25094d267-1188-300.jpg_desktop.jpg', NULL, NULL),
(151, 0, 'product_image/large/1551943376_naturo-monkey-selfie.jpg', 'product_image/medium/1551943376_naturo-monkey-selfie.jpg', 'product_image/small/1551943376_naturo-monkey-selfie.jpg', NULL, NULL),
(152, 0, 'product_image/large/58551551948505.jpg', 'product_image/medium/58551551948505.jpg', 'product_image/small/58551551948505.jpg', NULL, NULL),
(153, 0, 'product_image/large/99131551948505.jpg', 'product_image/medium/99131551948505.jpg', 'product_image/small/99131551948505.jpg', NULL, NULL),
(154, 0, 'product_image/large/37111551948506.jpg', 'product_image/medium/37111551948506.jpg', 'product_image/small/37111551948506.jpg', NULL, NULL),
(155, 0, 'product_image/large/73271551949204.jpg', 'product_image/medium/73271551949204.jpg', 'product_image/small/73271551949204.jpg', NULL, NULL),
(156, 0, 'product_image/large/56671551949205.jpg', 'product_image/medium/56671551949205.jpg', 'product_image/small/56671551949205.jpg', NULL, NULL),
(157, 0, 'product_image/large/46611551949205.jpg', 'product_image/medium/46611551949205.jpg', 'product_image/small/46611551949205.jpg', NULL, NULL),
(173, 38, 'product_image/large/1551958117_11-353-039-01.jpg', 'product_image/medium/1551958117_11-353-039-01.jpg', 'product_image/small/1551958117_11-353-039-01.jpg', NULL, NULL),
(185, 38, 'product_image/large/1552130190_IMAC 21.5 MMQA2-1-228x228.jpg', 'product_image/medium/1552130190_IMAC 21.5 MMQA2-1-228x228.jpg', 'product_image/small/1552130190_IMAC 21.5 MMQA2-1-228x228.jpg', NULL, NULL),
(216, 63, 'product_image/large/1554013025_15456301212_blog_5.jpg', 'product_image/medium/1554013025_15456301212_blog_5.jpg', 'product_image/small/1554013025_15456301212_blog_5.jpg', NULL, NULL),
(219, 66, 'product_image/large/1554024447_e9d4a5d1-4351-4344-867b-5e3a50d4086c.jpg', 'product_image/medium/1554024447_e9d4a5d1-4351-4344-867b-5e3a50d4086c.jpg', 'product_image/small/1554024447_e9d4a5d1-4351-4344-867b-5e3a50d4086c.jpg', NULL, NULL),
(220, 67, 'product_image/large/1554024945_3749fac0-7420-489d-b4c1-58ea67d83c9b.jpg', 'product_image/medium/1554024945_3749fac0-7420-489d-b4c1-58ea67d83c9b.jpg', 'product_image/small/1554024945_3749fac0-7420-489d-b4c1-58ea67d83c9b.jpg', NULL, NULL),
(221, 68, 'product_image/large/1554025172_ca86441e-4b5b-46b5-b7d5-248636dbae0b.jpg', 'product_image/medium/1554025172_ca86441e-4b5b-46b5-b7d5-248636dbae0b.jpg', 'product_image/small/1554025172_ca86441e-4b5b-46b5-b7d5-248636dbae0b.jpg', NULL, NULL),
(222, 9, 'product_image/large/1554025487_73066-laptops-review-apple-imac-21-5-inch-2012-image1-POgIhspywM.jpg', 'product_image/medium/1554025487_73066-laptops-review-apple-imac-21-5-inch-2012-image1-POgIhspywM.jpg', 'product_image/small/1554025487_73066-laptops-review-apple-imac-21-5-inch-2012-image1-POgIhspywM.jpg', NULL, NULL),
(223, 69, 'product_image/large/1554026151_Bengal Classic Tea - 200g-270x270.jpg', 'product_image/medium/1554026151_Bengal Classic Tea - 200g-270x270.jpg', 'product_image/small/1554026151_Bengal Classic Tea - 200g-270x270.jpg', NULL, NULL),
(224, 70, 'product_image/large/1554026364_Horlicks 900g Jar with 150g Extra FREE (Chattogram)-270x270.jpg', 'product_image/medium/1554026364_Horlicks 900g Jar with 150g Extra FREE (Chattogram)-270x270.jpg', 'product_image/small/1554026364_Horlicks 900g Jar with 150g Extra FREE (Chattogram)-270x270.jpg', NULL, NULL),
(225, 71, 'product_image/large/1554026540_MacCoffee GOLD Coffee 50g Glass Jar (Malaysia)-270x270.jpg', 'product_image/medium/1554026540_MacCoffee GOLD Coffee 50g Glass Jar (Malaysia)-270x270.jpg', 'product_image/small/1554026540_MacCoffee GOLD Coffee 50g Glass Jar (Malaysia)-270x270.jpg', NULL, NULL),
(226, 72, 'product_image/large/1554026638_Mirzapore Best Leaf - 400gm-270x270.jpg', 'product_image/medium/1554026638_Mirzapore Best Leaf - 400gm-270x270.jpg', 'product_image/small/1554026638_Mirzapore Best Leaf - 400gm-270x270.jpg', NULL, NULL),
(227, 73, 'product_image/large/1554057497_15456301212_blog_5.jpg', 'product_image/medium/1554057497_15456301212_blog_5.jpg', 'product_image/small/1554057497_15456301212_blog_5.jpg', NULL, NULL),
(228, 74, 'product_image/large/1554057981_15456301212_blog_5.jpg', 'product_image/medium/1554057981_15456301212_blog_5.jpg', 'product_image/small/1554057981_15456301212_blog_5.jpg', NULL, NULL),
(229, 80, 'product_image/large/1554122710_guygtyfvyty.png', 'product_image/medium/1554122710_guygtyfvyty.png', 'product_image/small/1554122710_guygtyfvyty.png', NULL, NULL),
(230, 81, 'product_image/large/1554123058_Cheer up 2000.png', 'product_image/medium/1554123058_Cheer up 2000.png', 'product_image/small/1554123058_Cheer up 2000.png', NULL, NULL),
(232, 82, 'product_image/large/1554123282_MaxxCola 250ml.png', 'product_image/medium/1554123282_MaxxCola 250ml.png', 'product_image/small/1554123282_MaxxCola 250ml.png', NULL, NULL),
(233, 83, 'product_image/large/1554123395_ODY 250ml.png', 'product_image/medium/1554123395_ODY 250ml.png', 'product_image/small/1554123395_ODY 250ml.png', NULL, NULL),
(234, 84, 'product_image/large/1554123536_dw.png', 'product_image/medium/1554123536_dw.png', 'product_image/small/1554123536_dw.png', NULL, NULL),
(235, 85, 'product_image/large/1554123918_baby-oil-500x500.jpg', 'product_image/medium/1554123918_baby-oil-500x500.jpg', 'product_image/small/1554123918_baby-oil-500x500.jpg', NULL, NULL),
(236, 86, 'product_image/large/1554124148_1-500x500.jpg', 'product_image/medium/1554124148_1-500x500.jpg', 'product_image/small/1554124148_1-500x500.jpg', NULL, NULL),
(237, 87, 'product_image/large/1554135635_1.jpg', 'product_image/medium/1554135635_1.jpg', 'product_image/small/1554135635_1.jpg', NULL, NULL),
(238, 87, 'product_image/large/1554135635_1.jpg', 'product_image/medium/1554135635_1.jpg', 'product_image/small/1554135635_1.jpg', NULL, NULL),
(239, 88, 'product_image/large/1554172614_qq.jpg', 'product_image/medium/1554172614_qq.jpg', 'product_image/small/1554172614_qq.jpg', NULL, NULL),
(240, 89, 'product_image/large/1554357078_134237c76adf21d26d7e493df836d155.jpg', 'product_image/medium/1554357078_134237c76adf21d26d7e493df836d155.jpg', 'product_image/small/1554357078_134237c76adf21d26d7e493df836d155.jpg', NULL, NULL),
(241, 89, 'product_image/large/1554357438_15456301212_blog_5.jpg', 'product_image/medium/1554357438_15456301212_blog_5.jpg', 'product_image/small/1554357438_15456301212_blog_5.jpg', NULL, NULL),
(247, 93, 'product_image/large/1554530158_download.jpg', 'product_image/medium/1554530158_download.jpg', 'product_image/small/1554530158_download.jpg', NULL, NULL),
(252, 99, 'product_image/large/1554536301_zedbook-w-2.jpg', 'product_image/medium/1554536301_zedbook-w-2.jpg', 'product_image/small/1554536301_zedbook-w-2.jpg', NULL, NULL),
(254, 100, 'product_image/large/1554551036_lapbook-se-2-500x500.jpg', 'product_image/medium/1554551036_lapbook-se-2-500x500.jpg', 'product_image/small/1554551036_lapbook-se-2-500x500.jpg', NULL, NULL),
(255, 100, 'product_image/large/1554551037_lapbook-se-4-500x500.jpg', 'product_image/medium/1554551037_lapbook-se-4-500x500.jpg', 'product_image/small/1554551037_lapbook-se-4-500x500.jpg', NULL, NULL),
(256, 100, 'product_image/large/1554551037_lapbook-se-5-500x500.jpg', 'product_image/medium/1554551037_lapbook-se-5-500x500.jpg', 'product_image/small/1554551037_lapbook-se-5-500x500.jpg', NULL, NULL),
(257, 100, 'product_image/large/1554551037_lapbook-se-500x500.jpg', 'product_image/medium/1554551037_lapbook-se-500x500.jpg', 'product_image/small/1554551037_lapbook-se-500x500.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_size_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `product_size_name`, `created_at`, `updated_at`) VALUES
(12, 7, 'L', '2018-11-25 23:55:23', '2018-11-25 23:55:23'),
(13, 7, 'S', '2018-11-25 23:55:23', '2018-11-25 23:55:23'),
(14, 7, 'M', '2018-11-25 23:55:23', '2018-11-25 23:55:23'),
(15, 8, 'L', '2018-12-03 23:16:34', '2018-12-03 23:16:34'),
(16, 8, 'M', '2018-12-03 23:16:34', '2018-12-03 23:16:34'),
(17, 8, 'S', '2018-12-03 23:16:34', '2018-12-03 23:16:34'),
(18, 9, 'L', '2018-12-04 04:55:17', '2018-12-04 04:55:17'),
(19, 9, 'S', '2018-12-04 04:55:17', '2018-12-04 04:55:17'),
(20, 9, 'M', '2018-12-04 04:55:17', '2018-12-04 04:55:17'),
(24, 15, NULL, '2018-12-15 02:44:24', '2018-12-15 02:44:24'),
(27, 19, NULL, '2018-12-20 00:01:51', '2018-12-20 00:01:51'),
(38, 38, 'L', '2019-03-07 17:28:38', '2019-03-07 17:28:38'),
(39, 38, 'M', '2019-03-07 17:28:39', '2019-03-07 17:28:39'),
(40, 38, 'S', '2019-03-07 17:28:39', '2019-03-07 17:28:39'),
(44, 93, '12', '2019-04-05 23:55:58', '2019-04-05 23:55:58'),
(48, 100, 'dsd', '2019-04-06 05:15:05', '2019-04-06 05:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `send_mails`
--

CREATE TABLE `send_mails` (
  `id` int(11) NOT NULL,
  `emali` varchar(100) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ship_customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_customer_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_country` int(11) NOT NULL,
  `ship_division` int(11) DEFAULT NULL,
  `ship_charge` float NOT NULL,
  `ship_customer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `customer_id`, `ship_customer_name`, `ship_customer_phone_number`, `ship_customer_email`, `ship_country`, `ship_division`, `ship_charge`, `ship_customer_address`, `created_at`, `updated_at`) VALUES
(32, 1, 'sdffad', '01324234234', 'noormoy@gmail.com', 2, 10, 2000, 'eagsfga', '2019-01-08 23:01:16', '2019-01-08 23:01:16'),
(33, 1, 'sdffad', '01324234234', 'noormoy@gmail.com', 2, 9, 100, 'sdfa', '2019-01-09 03:13:16', '2019-01-09 03:13:16'),
(34, 1, 'sdffad', '01324234234', 'noormoy@gmail.com', 2, 7, 600, 'asio', '2019-01-09 07:16:11', '2019-01-09 07:16:11'),
(35, 1, 'Nurr Vai', '01324234234', 'noormoy@gmail.com', 2, 9, 100, 'Hi thoasdfjlajjl', '2019-01-19 00:38:11', '2019-01-19 00:38:11'),
(36, 2, 'Shariar', '0166666', 'xyz@gmail.com', 2, 10, 2000, 'pojpopipopoipipip', '2019-03-03 00:07:26', '2019-03-03 00:07:26'),
(37, 3, 'Raj', '01742593548', 'raj60@gmail.com', 2, 7, 600, 'I am', '2019-03-05 12:21:31', '2019-03-05 12:21:31'),
(38, 4, 'SB', '0124578457', 'raj60@gmail.com', 2, 7, 600, 'Hello', '2019-04-04 01:34:42', '2019-04-04 01:34:42'),
(39, 3, 'Raj Kah', '01742593548', 'raj60@gmail.com', 2, 7, 600, 'I am', '2019-04-04 02:52:37', '2019-04-04 02:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `shopper_orders`
--

CREATE TABLE `shopper_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` double(10,2) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delevery_status` tinyint(4) NOT NULL DEFAULT '0',
  `admin_commission` float(10,2) NOT NULL DEFAULT '0.00',
  `admin_payment_amount` float(10,2) NOT NULL DEFAULT '0.00',
  `admin_payment` tinyint(11) NOT NULL DEFAULT '0',
  `shopper_payable` float(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopper_orders`
--

INSERT INTO `shopper_orders` (`id`, `order_id`, `shopper_id`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `delevery_status`, `admin_commission`, `admin_payment_amount`, `admin_payment`, `shopper_payable`, `status`, `created_at`, `updated_at`) VALUES
(34, 25, 5, 1, 32, 7750.00, 'Success', 1, 0.00, 0.00, 0, 0.00, 1, '2019-01-09 02:50:39', '2019-01-09 03:00:12'),
(35, 25, 4, 1, 32, 1200.00, 'Pending', 0, 0.00, 0.00, 0, 0.00, 1, '2019-01-09 02:50:39', '2019-01-09 02:50:39'),
(36, 27, 5, 1, 33, 3600.00, 'Success', 1, 180.00, 3420.00, 1, 3420.00, 1, '2019-01-09 07:06:45', '2019-01-10 06:28:17'),
(37, 32, 4, 2, 36, 1200.00, 'Pending', 0, 0.00, 0.00, 0, 0.00, 1, '2019-03-03 00:18:37', '2019-03-03 00:18:37'),
(38, 32, 5, 2, 36, 1750.00, 'Success', 1, 0.00, 0.00, 0, 0.00, 1, '2019-03-03 00:18:37', '2019-03-03 00:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `silder_images`
--

CREATE TABLE `silder_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `silder_images`
--

INSERT INTO `silder_images` (`id`, `slider_image`, `small_image`, `status`, `created_at`, `updated_at`) VALUES
(25, 'slider_image/large/15456301212_blog_5.jpg', 'slider_image/small/15456301212_blog_5.jpg', 2, '2018-12-23 23:42:01', '2019-03-29 23:18:52'),
(26, 'slider_image/large/15456301213_blog_9.jpg', 'slider_image/small/15456301213_blog_9.jpg', 1, '2018-12-23 23:42:02', '2018-12-23 23:42:02'),
(27, 'slider_image/large/15534282510_65379385.jpg', 'slider_image/small/15534282510_65379385.jpg', 1, '2019-03-24 05:50:52', '2019-03-24 05:50:52'),
(29, 'slider_image/large/15539217360_65353233.jpg', 'slider_image/small/15539217360_65353233.jpg', 1, '2019-03-29 22:55:36', '2019-03-29 23:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_name_ban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_category_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `sub_category_name`, `sub_category_name_ban`, `sub_category_name_hin`, `main_category_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Mobiles', 'asdfasdfasf', '', 6, 'category_image/1546420705_404bg.jpg', 1, '2018-11-19 01:40:33', '2019-01-02 03:18:25'),
(4, 'Laptop', 'asdfafsd', '', 6, 'category_image/1546420862_500bg.jpg', 1, '2018-11-19 01:40:45', '2019-01-02 03:21:03'),
(5, 'Desktops', 'asfdasdfasfd', '', 6, 'category_image/1546420879_image15.jpg', 1, '2018-11-19 01:41:13', '2019-01-02 03:21:20'),
(6, 'DSLR', 'dfgsfgasfg', '', 6, 'category_image/1546420890_image15.jpg', 1, '2018-11-19 01:41:27', '2019-01-02 03:21:30'),
(7, 'Tablets', 'asdfasdfsdf', '', 6, 'category_image/1546420900_image11.jpg', 1, '2018-11-19 01:41:40', '2019-01-02 03:21:40'),
(12, 'Lotto', 'fsadfasdf', '', 9, 'category_image/1546422862_image1.jpg', 1, '2019-01-02 03:54:23', '2019-01-02 03:54:23'),
(13, 'Baby Care', NULL, NULL, 7, 'category_image/1554024630_2afc613c-80f2-4bc7-a9a0-784a76003a4b.jpg', 1, '2019-03-31 03:22:31', '2019-03-31 03:30:30'),
(14, 'Bevrages', NULL, NULL, 11, 'category_image/1554025970_vegetablejuice.jpg', 1, '2019-03-31 03:52:50', '2019-03-31 03:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `sub_districts`
--

CREATE TABLE `sub_districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(20) NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_districts`
--

INSERT INTO `sub_districts` (`id`, `sub_district_name`, `country_id`, `division_id`, `district_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Dhake', 2, 7, 6, 1, '2018-10-27 23:27:54', '2018-10-27 23:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_admins`
--

CREATE TABLE `user_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_role` tinyint(4) NOT NULL,
  `commission_rate` int(10) NOT NULL DEFAULT '0',
  `shopper_point` int(11) NOT NULL DEFAULT '0',
  `shipping_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Road',
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(20) NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `sub_district_id` int(11) NOT NULL,
  `shopper_banner` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_admins`
--

INSERT INTO `user_admins` (`id`, `user_name`, `email`, `phone`, `password`, `admin_role`, `commission_rate`, `shopper_point`, `shipping_info`, `address`, `country_id`, `division_id`, `district_id`, `sub_district_id`, `shopper_banner`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Noormoy', 'noormoy@gmail.com', '01682814443', '$2y$10$E91azUbbjkZJLRYfQ5Vi0ufUvfTLcW0jG19kYA9IQPGbUj1qoabPC', 2, 0, 0, 'Road', 'kggjkkj', 3, 6, 6, 5, 'shopper_banner/1547961534_slider_4.jpg', 1, '2018-10-28 02:17:23', '2019-03-01 01:59:06'),
(5, 'Faisal', 'nobinalo111@gmail.com', '0165555', '$2y$10$Cq/omKWvwyw534QtJrB6XuX2mtPp2zVhM.tJguhxZHkAnUqtUxZKO', 1, 5, 95, 'Road, Train etc.', 'fsdfafsd', 3, 6, 6, 5, 'shopper_banner/1547961534_slider_5.jpg', 1, '2018-10-28 02:19:45', '2019-01-20 23:48:48'),
(6, 'Baten', 'baten@gmail.com', '0235808234', '$2y$10$zYXWZproEqXuLQVUhfxNhuBFF5tMnn4xe6anjUXkPrlJCZc0WdOWG', 1, 0, 0, 'Road', 'dfasdfasdf', 3, 6, 6, 5, 'shopper_banner/1547961534_slider_6.jpg', 1, '2018-12-12 05:59:29', '2018-12-21 23:04:39'),
(7, 'Hasina Zia', 'hasina@gmail.com', '12345647897', '$2y$10$h1jPxjMO8uAr.svE62OMs.nP2c.uknSWSzTaEEL5LUieduXVVXZzu', 1, 0, 0, 'Road', 'SGDFGSDFGSDFGGSFD', 3, 6, 6, 5, 'shopper_banner/1547961534_slider_3.jpg', 1, '2019-01-19 23:18:55', '2019-01-19 23:18:55'),
(8, 'Rahim', 'rahim@gmail.com', '12345678901', '$2y$10$uJoWO1MIuxqtor12MfHmwuCFFBUUFN6CkCehbeA04s/7bHlURRgC6', 1, 0, 0, 'Road', 'adfdsfdscd', 3, 6, 6, 5, NULL, 1, '2019-03-04 03:00:35', '2019-03-04 03:00:35'),
(9, 'Raj', 'raj60@gmail.com', '0174578451', '$2y$10$m2360GNplMQpykfB6nzwR.dgTaD8CAUzr7jSTI/hSc8NPHHrnYHwK', 1, 0, 0, 'Road', 'I am', 2, 7, 5, 5, NULL, 1, '2019-03-05 12:45:51', '2019-03-05 12:45:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamicpages`
--
ALTER TABLE `dynamicpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_incomes`
--
ALTER TABLE `extra_incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmes`
--
ALTER TABLE `farmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farme_banners`
--
ALTER TABLE `farme_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_carts`
--
ALTER TABLE `member_carts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_with_ranges`
--
ALTER TABLE `price_with_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_mails`
--
ALTER TABLE `send_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopper_orders`
--
ALTER TABLE `shopper_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `silder_images`
--
ALTER TABLE `silder_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_districts`
--
ALTER TABLE `sub_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_admins`
--
ALTER TABLE `user_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `phone_2` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dynamicpages`
--
ALTER TABLE `dynamicpages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `extra_incomes`
--
ALTER TABLE `extra_incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `farmes`
--
ALTER TABLE `farmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `farme_banners`
--
ALTER TABLE `farme_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `member_carts`
--
ALTER TABLE `member_carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `price_with_ranges`
--
ALTER TABLE `price_with_ranges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `send_mails`
--
ALTER TABLE `send_mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `shopper_orders`
--
ALTER TABLE `shopper_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `silder_images`
--
ALTER TABLE `silder_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_districts`
--
ALTER TABLE `sub_districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_admins`
--
ALTER TABLE `user_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
