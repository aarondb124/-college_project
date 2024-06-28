-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 10:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_shop_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `position` varchar(20) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'd',
  `save_by` varchar(3) NOT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answars`
--

CREATE TABLE `answars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answar` longtext NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `upazila_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(10) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `upazila_id`, `amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mirpur-10', 119, '60', NULL, '2022-02-17 04:45:37', '2022-02-17 04:45:37'),
(2, 'Mirpur-2', 146, '80', NULL, '2022-02-17 05:12:05', '2022-02-17 05:12:05'),
(3, 'Kathira', 29, '120', NULL, '2022-02-19 04:53:37', '2022-02-19 04:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `offer_name` varchar(100) DEFAULT NULL,
  `short_details` text DEFAULT NULL,
  `offer_link` varchar(120) DEFAULT NULL,
  `image` text NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `save_by` varchar(3) NOT NULL,
  `updated_by` varchar(3) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `offer_name`, `short_details`, `offer_link`, `image`, `status`, `save_by`, `updated_by`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Banner one', '50% Offer', '<p>banner one</p>', 'http://127.0.0.1:8000/category/discount-1636868643', 'uploads/banner/Christmas_Web_620a3d252b121.jpg', 'a', '1', '1', '127.0.0.1', '2022-04-07 13:28:23', '2022-02-14 05:29:41', '2022-04-07 13:28:23'),
(2, 'Banner 2', '50% Offer', '<p>banner one</p>', 'http://127.0.0.1:8000/category/discount-1636868643', 'uploads/banner/Boya_Web_620a3d311dce9.jpg', 'a', '1', '1', '127.0.0.1', '2022-04-07 13:28:21', '2022-02-14 05:29:53', '2022-04-07 13:28:21'),
(3, 'Banner three', '50% Offer', '<p>banner one</p>', 'http://127.0.0.1:8000/category/discount-1636868643', 'uploads/banner/Rode_Web_620a3d41ce3e0.jpg', 'a', '1', '1', '127.0.0.1', '2022-04-07 13:28:19', '2022-02-14 05:30:09', '2022-04-07 13:28:19'),
(4, 'Digital Shop', 'N/A', NULL, 'N/A', 'uploads/banner/1649323640889_624eaee0d54a6.jpg', 'a', '1', '1', '119.30.32.165', '2022-11-03 12:05:15', '2022-04-07 13:29:04', '2022-11-03 12:05:15'),
(5, 'Fuji X-t30 II', 'Fuji', NULL, 'https://digitalshopbd.com/product-details/fujifilm-x-t30-ii-mirrorless-camera-with-xc-15-45mm-ois-pz-lens-1653304505', 'uploads/banner/FUJIFILM X-T30 II Now Available_62a47a856a233.png', 'a', '1', '1', '37.111.207.13', '2022-06-11 15:22:28', '2022-06-11 15:20:37', '2022-06-11 15:22:28'),
(6, 'Fuji x-t30 ii', 'fuji', NULL, 'https://digitalshopbd.com/product-details/fujifilm-x-t30-ii-mirrorless-camera-with-xc-15-45mm-ois-pz-lens-1653304505', 'uploads/banner/FUJIFILM X-T30 II Now Available_62a47b0a7d6c4.png', 'a', '1', '1', '37.111.207.13', '2022-06-11 15:23:12', '2022-06-11 15:22:50', '2022-06-11 15:23:12'),
(7, 'Fuji X-T30 II', 'Fuji X-T30 II', NULL, 'https://digitalshopbd.com/product-details/fujifilm-x-t30-ii-mirrorless-camera-with-xc-15-45mm-ois-pz-lens-1653304505', 'uploads/banner/FUJIFILM X-T30 II Now Available (1) - Copy_62a47bd85a5c9.png', 'a', '1', '1', '37.111.207.13', '2022-06-11 15:27:53', '2022-06-11 15:26:16', '2022-06-11 15:27:53'),
(8, 'Digital Shop', 'n/a', '<p>Null</p>', 'n/a', 'uploads/banner/www.phonex.com.bd(2)_6334cfdccf078.png', 'a', '1', '1', '103.152.103.59', '2022-09-29 02:53:03', '2022-09-29 02:51:08', '2022-09-29 02:53:03'),
(9, 'Digital Shop', 'n/a', '<p>Null</p>', 'n/a', 'uploads/banner/www.phonex.com.bd(2)_6334cfdfd8ea0.png', 'a', '1', '1', '103.152.103.59', '2022-09-29 02:51:55', '2022-09-29 02:51:11', '2022-09-29 02:51:55'),
(10, 'Digital Shop', 'n/a', NULL, 'n/a', 'uploads/banner/Green Brown Simple Photo Fashion Store Etsy Shop Cover_633b398577895.png', 'a', '1', '1', '103.153.66.163', '2022-10-03 23:39:27', '2022-10-03 23:35:33', '2022-10-03 23:39:27'),
(11, 'Digital Shop', 'n/a', '<p>n/a</p>', 'n/a', 'uploads/category/Green Brown Simple Photo Fashion Store Etsy Shop Cover_6363750550ddc.png', 'a', '1', '1', '120.50.28.50', '2022-11-10 10:14:57', '2022-10-03 23:39:56', '2022-11-10 10:14:57'),
(12, 'Digital Shop', 'n/a', NULL, 'n/a', 'uploads/banner/Green Brown Simple Photo Fashion Store Etsy Shop Cover(2)_633b460bbfa9a.png', 'a', '1', '1', '103.153.66.163', '2022-10-04 00:30:06', '2022-10-04 00:28:59', '2022-10-04 00:30:06'),
(13, 'Digital Shop', 'n/a', NULL, 'n/a', 'uploads/banner/Green Brown Simple Photo Fashion Store Etsy Shop Cover(2)_633b477923096.png', 'a', '1', '1', '103.153.66.163', '2022-10-04 00:35:51', '2022-10-04 00:35:05', '2022-10-04 00:35:51'),
(14, 'Digital Shop', 'n/a', NULL, 'n/a', 'uploads/banner/Green Brown Simple Photo Fashion Store Etsy Shop Cover(2)_633b47795f1b5.png', 'a', '1', '1', '103.153.66.163', '2022-11-10 10:14:54', '2022-10-04 00:35:05', '2022-11-10 10:14:54'),
(15, 'Digital Shop', 'n/a', '<p>null</p>', 'n/a', 'uploads/banner/Green Brown Simple Photo Fashion Store Etsy Shop Cover(1)_636375f431838.png', 'a', '1', '1', '120.50.28.50', '2022-11-10 10:14:52', '2022-11-03 12:04:04', '2022-11-10 10:14:52'),
(16, 'Digital shop', 'n/a', '<p>n/a</p>', 'n/a', 'uploads/banner/Green-Brown-Simple-Photo-Fashion-Store-Etsy-Shop-Cover_6364ec9570056.jpg', 'a', '1', '1', '120.50.28.50', '2022-11-10 10:14:49', '2022-11-04 14:42:29', '2022-11-10 10:14:49'),
(17, 'Digital shop', 'n/a', '<p>n/a</p>', 'n/a', 'uploads/banner/Green-Brown-Simple-Photo-Fashion-Store-Etsy-Shop-Cover(1)_63651535e89e4.png', 'a', '1', '1', '120.50.28.50', '2022-11-10 10:14:45', '2022-11-04 17:35:49', '2022-11-10 10:14:45'),
(18, 'Digital shop', 'n/a', '<p>n/a</p>', 'n/a', 'uploads/banner/Green-Brown-Simple-Photo-Fashion-Store-Etsy-Shop-Cover(2)_636905ad46ecc.png', 'a', '1', '1', '120.50.28.50', '2022-11-10 10:14:41', '2022-11-07 18:18:37', '2022-11-10 10:14:41'),
(19, 'Digital shop', 'n/a', '<p>n/a</p>', 'n/a', 'uploads/category/2_636c8c6b27e22.png', 'a', '1', '1', '120.50.28.50', NULL, '2022-11-10 10:15:30', '2022-11-10 10:30:19'),
(20, 'Digital shop', 'n/a', '<p>n/a</p>', 'n/a', 'uploads/category/4_636c8c1a93b87.png', 'a', '1', '1', '120.50.28.50', NULL, '2022-11-10 10:16:03', '2022-11-10 10:28:58'),
(21, 'Digital shop', 'n/a', '<p>n/a</p>', 'n/a', 'uploads/category/5_636c8be9a8208.png', 'a', '1', '1', '120.50.28.50', NULL, '2022-11-10 10:23:13', '2022-11-10 10:28:09'),
(22, 'Digital shop', 'n/a', NULL, 'http://127.0.0.1:8000/product-details/sony-1672911415', 'uploads/category/6_636c8c3a9972a.png', 'a', '1', '1', '127.0.0.1', NULL, '2022-11-10 10:26:52', '2023-01-05 11:53:10'),
(23, 'Eos dolorum quis pro', 'Cameran Williamson', NULL, 'Porro quae quia est', 'uploads/banner/1632412658_63bb8d812609a.jpg', 'a', '1', '1', '127.0.0.1', '2023-01-16 08:57:29', '2023-01-09 03:44:01', '2023-01-16 08:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `video` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `save_by` varchar(3) NOT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `date`, `video`, `image`, `save_by`, `updated_by`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Chargeur Usb C Mi 65w Charge Rapide', '<p>Chargeur Usb C Mi 65w Charge Rapide is the best chrager.</p>', '2003-05-10', 'https://www.youtube.com/embed/dByQ9XmxKx4', 'uploads/blog/Chargeur Usb C Mi 65w Charge Rapide_65d73e0916888.jpeg', '1', '1', '127.0.0.1', NULL, '2023-01-05 10:55:11', '2024-02-22 12:28:57'),
(2, 'Wireless Charger iPhone', '<p>Wireless Charger iPhone - 2 in 1 Charging Station for Apple Devices for iPhone 15 14 13 12 Pro Max Plus - Foldable Magnetic Charging Pad for Apple Watch Series &amp; Airpods Series</p>', '1998-03-11', 'https://www.hoviri.biz', 'uploads/blog/Wireless Charger iPhone - 3 in 1 Charging Station for Apple Devices for iPhone 15 14 13 12 Pro Max Plus - Foldable Magnetic Charging Pad for Apple Watch Series & Airpods Series_65d73e54e1bb7.jpeg', '1', '1', '127.0.0.1', NULL, '2023-01-08 04:47:35', '2024-02-22 12:30:12'),
(3, 'OPPO A17k', '<p>OPPO A17k Smartphone (3_64GB) is one of our best products.</p>', '1985-04-30', 'https://www.jyjo.cc', 'uploads/blog/OPPO A17k Smartphone (3_64GB)_65d73ed3ac413.jpeg', '1', '1', '127.0.0.1', NULL, '2023-01-14 11:25:31', '2024-02-22 12:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(70) NOT NULL,
  `city` varchar(70) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `country` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `street_address` text DEFAULT NULL,
  `street_address2` text DEFAULT NULL,
  `postal` varchar(70) DEFAULT NULL,
  `province` varchar(70) DEFAULT NULL,
  `map` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `city`, `phone`, `country`, `address`, `image`, `description`, `street_address`, `street_address2`, `postal`, `province`, `map`, `created_at`, `updated_at`) VALUES
(1, 'Basundhara City Shopping Complex', 'Basundhara City Shopping Complex', '01701470258', 'Bangladesh', 'Basundhara City Shopping Complex', 'uploads/branch/31115_63b25c2bc27a6.jpg', 'admin test', 'Dhaka', 'Dhaka', '10', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14602.700311872784!2d90.34510366942551!3d23.794582086915813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0e96fce29dd%3A0x6ccd9e51aba9e64d!2zTWlycHVyLTEsIOCmouCmvuCmleCmvg!5e0!3m2!1sbn!2sbd!4v1673078933943!5m2!1sbn!2sbd', '2023-01-02 04:23:07', '2023-01-07 08:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_popular` varchar(191) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `is_popular`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Canon', '1', 'uploads/brand/canon_65d33a5b182d1.jpeg', '2023-01-01 06:28:03', '2024-02-19 11:24:11'),
(2, 'Walton', '1', 'uploads/brand/walton_65d33a528acd4.png', '2023-01-01 06:28:03', '2024-02-19 11:24:02'),
(3, 'Sony', '1', 'uploads/brand/sony logo_65d33a6888f09.jpg', '2023-01-05 04:12:44', '2024-02-19 11:24:24'),
(4, 'Olympus', '1', 'uploads/brand/olympus_65d33a76958e0.jpg', '2023-01-07 05:18:37', '2024-02-19 11:24:38'),
(5, 'Iphone', '1', 'uploads/brand/iphone_65d33a844c46c.png', '2023-01-07 05:18:57', '2024-02-19 11:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `camera_formats`
--

CREATE TABLE `camera_formats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `camera_formats`
--

INSERT INTO `camera_formats` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Full Frame', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(2, 'APS-C', '2023-01-01 06:28:00', '2023-01-01 06:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(130) NOT NULL,
  `details` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `is_popular` tinyint(4) DEFAULT NULL,
  `save_by` varchar(3) DEFAULT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `details`, `image`, `status`, `is_popular`, `save_by`, `updated_by`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Photography', 'photography-1708339945', 'A camera captures visual images through a lens system focusing light onto a sensor or film. Modern ones use digital sensors, converting light into electronic signals for digital images. Available in various forms like DSLRs, mirrorless, and smartphones, they\'re used for personal and professional photography, videography, and more. Advancements continuously enhance image quality and functionality.', 'uploads/category/photography_65d332e9ccfe3.jpeg', 'a', 1, NULL, NULL, '127.0.0.1', NULL, '2023-01-01 06:28:00', '2024-02-19 10:52:25'),
(2, 'Pro Video', 'pro-video-1708340619', 'best video camera for youtube, best video camera for sports, best video camera for beginners, best video camera for kids, best video camera for hunting, best video camera for home videos, best video camera 2023, best video camera for vlogging, best video camera 4k, best video camera under 1000, best video camera autofocus, best video camera amazon, action camera best video camera, affordable best video camera, best video camera bird feeder, best video camera brands, best video camera budget, best video camera black friday, best video camera beginners, best video camera battery life, best video camera baby monitor, best buy best video camera, best budget video camera, best video camera canon, best video camera cheap, best video camera company, best video camera compact, best video camera cinematic, canon best video camera, cheap and best video camera, camera best video camera, best camera for cinematic video,', 'uploads/category/Pro-video_65d3358bd2214.jpeg', 'a', 1, NULL, NULL, '127.0.0.1', NULL, '2023-01-01 06:28:00', '2024-02-19 11:03:39'),
(3, 'Lighting', 'lighting-1708340251', 'The camera lightning bolt is a symbol often used to indicate the presence of a flash function on a camera. It represents the rapid burst of light emitted by the flash to illuminate a scene, enabling clear and well-exposed photographs even in low-light conditions. This icon typically appears on camera interfaces, serving as a quick reference for users to activate or deactivate the flash feature as needed.', 'uploads/category/lightining_65d3341b924b2.jpeg', 'a', 1, NULL, NULL, '127.0.0.1', NULL, '2023-01-01 06:28:00', '2024-02-19 10:57:31'),
(4, 'Sound system', 'sound-system-1708340943', 'The best sound system for marketing an e-commerce website is one that delivers clear, immersive audio experiences to enhance user engagement. High-quality speakers or headphones can amplify promotional messages, product demonstrations, and customer testimonials, fostering a deeper connection with potential buyers. Incorporating sound effects, catchy tunes, or soothing background music can also create a memorable and enjoyable browsing atmosphere, encouraging visitors to explore the website further and increasing the likelihood of conversion. Additionally, utilizing audio cues for notifications, alerts, or calls to action can prompt immediate responses from users, driving sales and boosting overall website performance. Ultimately, a well-integrated sound system complements the visual elements of the e-commerce platform, elevating the overall shopping experience and leaving a lasting impression on customers.', 'uploads/category/Sound_65d336cf1381e.jpeg', 'a', 1, NULL, NULL, '127.0.0.1', NULL, '2023-01-01 06:28:00', '2024-02-19 11:09:03'),
(5, 'Smart Phone', 'smart-phone-1708340501', 'A smartphone is a versatile handheld device that combines the functionality of a mobile phone with advanced computing capabilities. It typically features a touchscreen interface, enabling users to access a wide range of applications, browse the internet, send messages, make calls, and manage personal and professional tasks. Smartphones also integrate features like cameras, GPS navigation, sensors, and connectivity options such as Wi-Fi, Bluetooth, and cellular data. With their portability and multifunctionality, smartphones have become essential tools for communication, productivity, entertainment, and accessing information on the go.', 'uploads/category/OPPO A17k Smartphone (3_64GB)_65cf7ab0ab456.jpeg', 'a', 1, '1', NULL, '127.0.0.1', NULL, '2023-01-02 04:12:56', '2024-02-19 11:01:41'),
(6, 'Gadgets', 'gadgets-1708094338', 'best gadgets, best gadgets 2023, best gadgets for men, best gadgets for men 2023, best gadgets 2024, best gadgets on amazon, best gadgets for women, best gadgets under 50, best gadgets amazon, amazon best gadgets, amazon best gadgets 2023, all time best gadgets, best gadgets brawl stars, best gadgets black friday, best gadgets ces 2024, best gadgets ces 2023, wireless charger, wireless charger for iphone, apple wireless charger, wireless charger samsung, wireless charger for android, best wireless charger, wireless charger adapter, wireless charger amazon, wireless charger android, asda wireless charger, wireless charger best buy, wireless charger blinking blue, wireless charger box, wireless charger block, best wireless charger for samsung, wireless charger case, wireless charger clock, charger, iphone charger, apple charger, usb c charger, iphone 15 charger, portable charger, battery charger, charger adapter, charger apple, charger accessories, a dodge charger, a portable charger, charger battery, charger bank, b type charger, charger coach, charger case, charger cable, charger cube, c type charger, c charger cord, c charger box, c charger adapter, c charger block, c charger near me, apple power adapter, usb c power adapter, universal power adapter, usb power adapter, ac power adapter,', 'uploads/category/3 In 1 Foldable Wireless Charger For Qi Certified Mobile Phones 15w Magnetic Fast Charging Wireless Charger_65cf6fe1db5da.jpeg', 'a', 1, '1', NULL, '127.0.0.1', NULL, '2023-01-05 11:16:17', '2024-02-16 14:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

CREATE TABLE `company_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `slogan` varchar(191) DEFAULT NULL,
  `phone_1` varchar(15) NOT NULL,
  `phone_2` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  `news_headline` text DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `office_time` varchar(191) DEFAULT NULL,
  `free_shipping` varchar(191) DEFAULT NULL,
  `cashback` varchar(191) DEFAULT NULL,
  `about_title` text DEFAULT NULL,
  `about_description` text DEFAULT NULL,
  `about_image` text DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `youtube` varchar(191) DEFAULT NULL,
  `linkedin` varchar(191) DEFAULT NULL,
  `instagram` varchar(191) DEFAULT NULL,
  `welcome_title` varchar(100) DEFAULT NULL,
  `welcome_note` text DEFAULT NULL,
  `welcome_image` text DEFAULT NULL,
  `mission_vision_title` varchar(100) DEFAULT NULL,
  `mission_vision` text DEFAULT NULL,
  `trams_condition_title` varchar(100) DEFAULT NULL,
  `trams_condition` text DEFAULT NULL,
  `delivery_policy` longtext DEFAULT NULL,
  `return_policy` longtext DEFAULT NULL,
  `faq_title` varchar(200) DEFAULT NULL,
  `faq_details` text DEFAULT NULL,
  `refund_title` varchar(100) DEFAULT NULL,
  `refund_details` text DEFAULT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_profiles`
--

INSERT INTO `company_profiles` (`id`, `company_name`, `slogan`, `phone_1`, `phone_2`, `email`, `address`, `news_headline`, `logo`, `office_time`, `free_shipping`, `cashback`, `about_title`, `about_description`, `about_image`, `facebook`, `youtube`, `linkedin`, `instagram`, `welcome_title`, `welcome_note`, `welcome_image`, `mission_vision_title`, `mission_vision`, `trams_condition_title`, `trams_condition`, `delivery_policy`, `return_policy`, `faq_title`, `faq_details`, `refund_title`, `refund_details`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Digital Shop', NULL, '+880171505400', '+880161505400', 'digitalshop9@gmail.com', 'Level - 6, Block - A, Shop - 40/41, Bashundhara City Shopping Complex, Panthapath, Dhaka.', NULL, 'uploads/logo//DIGITAL-SHOP-LOGO-Black-02_62667d7057410.png', NULL, NULL, NULL, 'About Us', '<p><strong>Digital Shop</strong> has been the Bangladesh\'s premium photography store for over 10 years. As a result we became the market leader of Canon, Fuji, Nikon, Sony and more. We are committed to provide the best camera gear along with superior knowledge, prices, and shipping. We have the right cameras, lenses, and accessories for everyone such as beginners, hobbyists, and professionals alike.</p>', 'uploads/about//logo_6371ec83b917e.png', 'https://www.facebook.com/digitalshop.bd', 'https://www.youtube.com/channel/UCPLN6cKPfvnzp2Dt74BcK5Q/videos', 'https://www.linkedin.com/', 'https://www.instagram.com/', 'welcome_title', 'welcome_note', 'welcome_image', 'Our Mission', '<p>Our mission to achieve the customer satisfaction by providing quality customer service .We always try to help our customers &nbsp;to make purchase by decisions wise by ensuring with 100% product authentication . We grow our business on client\'s trust and are always committed to being with our clients!&nbsp;</p><p><strong>Digital Shop </strong>grow very rapidly now a days.We operate our very own E-commerce site,Facebook,Instagram,YouTube and other social media platform as well.</p><p>Not only with camera,we are also work with leading smart phone brand\'s and gadget\'s as like- Apple,Samsung,Google,Xiaomi,Oneplus,Bose,JBL,Dji etc.</p><p><strong>&nbsp; &nbsp; Our service\'s are:-</strong></p><ul><li>Shopping Center- offline &amp; online.</li><li>Authorized dealer for product purchasing.</li><li>Responsive website for easy purchasing.</li><li>Home delivery.</li><li>EMI Facility.</li></ul><p><strong>Digital shop turned into a trusted platform for who love\'s to click photos in different ages. We love make client\'s and we love to serve our clients.Quality is our main priority.</strong></p><p>&nbsp;</p><p>&nbsp;</p>', 'Term and Condition', '<p>We know every imaging gear you own is priceless to you, that’s why we’re here to provide you exceptional service when you require repair assistance for your imaging gear. Our term and condition for your purches product is very clear cut. For any kind of product servicing issue, give us a call or contact the store location nearest you to discuss your needs and how we can help you. We have technicians in-house in our Colombo Service Centre who services all kind of DSLR &amp; mirrorless cameras, DSLR lenses, speedlights / studio lights, DJI Drones and DJI products.</p><h4><strong>If any product is under warranty</strong></h4><p>Bring the product to us as soon as possible along with the original invoice. We will make sure to repair the product in the quickest time and until that, we are ready to offer backup gear to meet your need.&nbsp;<br><br>Please note that for certain repairs we may have to send the item overseas and please be noted that it is totally up to the repairing agents of the manufacturer to decide whether it will be covered from your warranty.&nbsp;<br><br>DJI products come with a manufacturer\'s warranty, you will have to contact DJI and obtain a CASE number for your products. The length of the manufacturers\' warranty varies with the product. Check the printed information that comes with the product or the manufacturer\'s website for the duration of the warranty.</p><h4><strong>If it\'s not in under warranty</strong></h4><p>We still got you covered because we are always there to fulfill the needs of our customers.&nbsp;<br><br>All you have to do is to bring the product to our service center and our repairing experts will do a full checkup and provide you with an estimated price for the repair.&nbsp;<br><br>If you wish not to repair the gear after the inspection and cancel the job, an inspection fee will be charged.</p><h4><strong>If it\'s not in under warr</strong>a<strong>nty</strong></h4><p>A repair may vary according to various factors, so until the product is examined by a technician, we can’t give any estimation. But we do make sure to be transparent as much as possible by providing all the information regarding the repair on your valuation.&nbsp;<br><br>Sometimes you might have multiple items to be repaired, in such cases all the items will be separated individually because each item may need different parts, durations and repairers.&nbsp;<br><br>What is the average turnaround time for repairs?&nbsp;<br><br>Roughly 4-8 weeks is the time period, but please be mindful that if a shortage is there for needed parts this duration may increase. Under these circumstances the delays are beyond the control of Digital Shop&nbsp;<br><br>&nbsp;Digital Shop Service Centre can’t guarantee or assure you the duration for the repair but we strive to make sure the customer receives the repaired gear as soon as possible.</p><h4><strong>Any inquiry</strong></h4><p>Please Contact Here- 01615054171</p>', '<p><strong>Digital Shop</strong> has been the Bangladesh\'s premium photography store for over 10 years. As a result we became the market leader of Canon, Fuji, Nikon, Sony and more. We are committed to provide the best camera gear along with superior knowledge, prices, and shipping. We have the right cameras, lenses, and accessories for everyone such as beginners, hobbyists, and professionals alike.</p>', '<p><strong>Digital Shop</strong> has been the Bangladesh\'s premium photography store for over 10 years. As a result we became the market leader of Canon, Fuji, Nikon, Sony and more. We are committed to provide the best camera gear along with superior knowledge, prices, and shipping. We have the right cameras, lenses, and accessories for everyone such as beginners, hobbyists, and professionals alike.</p>', 'faq_title', 'faq_details', 'refund_title', 'refund_details', '1', NULL, '2022-02-09 04:04:09', '2023-01-16 08:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(30) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `upazila_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_picture` text DEFAULT NULL,
  `thum_picture` varchar(191) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'p',
  `save_by` varchar(3) NOT NULL,
  `updated_by` varchar(3) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(17) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `code`, `name`, `phone`, `email`, `address`, `country_id`, `district_id`, `upazila_id`, `area_id`, `profile_picture`, `thum_picture`, `username`, `password`, `status`, `save_by`, `updated_by`, `deleted_at`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 'C000001', 'Fardeen Abir', '01776637858', 'admin@gmail.com', 'mirpur', NULL, NULL, NULL, 1, '78711_6334cbcf8a033.jpg', '48961_6334cbcf8a033.jpg', 'abir', '$2y$10$Q0KqXt8Dk5.SAt15Qd8FKOhpsCGxmTT1/xW8lm1MkO72aE22CkKtm', 'a', '2', '2', NULL, '127.0.0.1', '2023-01-05 11:44:57', '2023-01-05 11:48:55'),
(2, 'C000002', 'Lalon Hossain', '01381325634', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$tDT3j0h1oSh.fML9vq13GuJkYEYsoUgmSfWP5DCPCSbrFKFBnFsKy', 'p', '0', '0', NULL, '127.0.0.1', '2023-01-16 09:38:13', '2023-01-16 09:38:13'),
(3, 'C000003', 'gqefvbafv', '01778833667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$HVC9zLAQJR3wT/BsUEJdnukKWgrCtau8DFLFOgOozG654bdsXhKCG', 'p', '0', '0', NULL, '127.0.0.1', '2023-01-23 11:58:55', '2023-01-23 11:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_times`
--

CREATE TABLE `delivery_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(20) NOT NULL,
  `group_id` varchar(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Bagerhat', NULL, NULL),
(3, 'Bandarban', NULL, NULL),
(4, 'Barguna', NULL, NULL),
(5, 'Barishal', NULL, NULL),
(6, 'Bhola', NULL, NULL),
(7, 'Bogura', NULL, NULL),
(8, 'Brahmanbaria', NULL, NULL),
(9, 'Chandpur', NULL, NULL),
(10, 'Chapainawabganj', NULL, NULL),
(11, 'Chattogram', NULL, NULL),
(12, 'Chuadanga', NULL, NULL),
(13, 'Coxsbazar', NULL, NULL),
(14, 'Cumilla', NULL, NULL),
(15, 'Dhaka', NULL, NULL),
(16, 'Dinajpur', NULL, NULL),
(17, 'Faridpur', NULL, NULL),
(18, 'Feni', NULL, NULL),
(19, 'Gaibandha', NULL, NULL),
(20, 'Gazipur', NULL, NULL),
(21, 'Gopalganj', NULL, NULL),
(22, 'Habiganj', NULL, NULL),
(23, 'Jamalpur', NULL, NULL),
(24, 'Jashore', NULL, NULL),
(25, 'Jhalakathi', NULL, NULL),
(26, 'Jhenaidah', NULL, NULL),
(27, 'Joypurhat', NULL, NULL),
(28, 'Khagrachhari', NULL, NULL),
(29, 'Khulna', NULL, NULL),
(30, 'Kishoreganj', NULL, NULL),
(31, 'Kurigram', NULL, NULL),
(32, 'Kushtia', NULL, NULL),
(33, 'Lakshmipur', NULL, NULL),
(34, 'Lalmonirhat', NULL, NULL),
(35, 'Madaripur', NULL, NULL),
(36, 'Magura', NULL, NULL),
(37, 'Manikganj', NULL, NULL),
(38, 'Meherpur', NULL, NULL),
(39, 'Moulvibazar', NULL, NULL),
(40, 'Munshiganj', NULL, NULL),
(41, 'Mymensingh', NULL, NULL),
(42, 'Naogaon', NULL, NULL),
(43, 'Narail', NULL, NULL),
(44, 'Narayanganj', NULL, NULL),
(45, 'Narsingdi', NULL, NULL),
(46, 'Natore', NULL, NULL),
(47, 'Netrokona', NULL, NULL),
(48, 'Nilphamari', NULL, NULL),
(49, 'Noakhali', NULL, NULL),
(50, 'Pabna', NULL, NULL),
(51, 'Panchagarh', NULL, NULL),
(52, 'Patuakhali', NULL, NULL),
(53, 'Pirojpur', NULL, NULL),
(54, 'Rajbari', NULL, NULL),
(55, 'Rajshahi', NULL, NULL),
(56, 'Rangamati', NULL, NULL),
(57, 'Rangpur', NULL, NULL),
(58, 'Satkhira', NULL, NULL),
(59, 'Shariatpur', NULL, NULL),
(60, 'Sherpur', NULL, NULL),
(61, 'Sirajganj', NULL, NULL),
(62, 'Sunamganj', NULL, NULL),
(63, 'Sylhet', NULL, NULL),
(64, 'Tangail', NULL, NULL),
(65, 'Thakurgaon', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `effective_pixels`
--

CREATE TABLE `effective_pixels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `effective_pixels`
--

INSERT INTO `effective_pixels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '5MP', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(2, '12MP', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(3, '20MP', '2023-01-01 06:28:00', '2023-01-01 06:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'why we are best', '<p>bangladesh largest company&nbsp;</p>', '2023-01-02 04:39:13', '2023-01-02 04:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `purchage` varchar(8) NOT NULL,
  `sales` varchar(8) DEFAULT NULL,
  `return` varchar(8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `purchage`, `sales`, `return`, `created_at`, `updated_at`) VALUES
(2, 2, '57', NULL, NULL, '2023-01-02 07:08:41', '2023-01-02 07:08:41'),
(3, 3, '12', NULL, NULL, '2023-01-02 08:08:49', '2023-01-02 08:08:49'),
(5, 2, '12', NULL, NULL, '2023-01-05 09:34:34', '2023-01-05 09:34:34'),
(6, 3, '12', NULL, NULL, '2023-01-05 09:45:03', '2023-01-05 09:45:03'),
(7, 4, '29', NULL, NULL, '2023-01-07 04:53:36', '2023-01-07 04:53:36'),
(8, 5, '18', NULL, NULL, '2023-01-07 05:58:02', '2023-01-07 05:58:02'),
(9, 6, '56', NULL, NULL, '2023-01-07 09:46:13', '2023-01-07 09:46:13'),
(10, 8, '26', NULL, NULL, '2023-01-07 09:57:52', '2023-01-07 09:57:52'),
(11, 9, '11', NULL, NULL, '2023-01-07 10:07:22', '2023-01-07 10:07:22'),
(12, 10, '84', NULL, NULL, '2023-01-07 10:12:08', '2023-01-07 10:12:08'),
(13, 11, '123', NULL, NULL, '2023-01-14 09:11:02', '2023-01-14 09:11:02'),
(14, 12, '32', NULL, NULL, '2023-01-14 09:27:18', '2023-01-14 09:27:18'),
(15, 13, '3', NULL, NULL, '2024-02-16 14:43:16', '2024-02-16 14:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `save_by` varchar(3) DEFAULT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_02_08_155517_create_pixels_table', 1),
(6, '2021_02_08_155547_create_monitor_sizes_table', 1),
(7, '2021_02_08_155609_create_recording_modes_table', 1),
(8, '2021_02_08_155641_create_camera_formats_table', 1),
(9, '2021_02_08_155803_create_effective_pixels_table', 1),
(10, '2021_02_08_155839_create_sensors_table', 1),
(11, '2021_09_19_101530_create_categories_table', 1),
(12, '2021_09_19_135805_create_sub_categories_table', 1),
(13, '2021_09_19_135806_create_subsubcategories_table', 1),
(14, '2021_09_20_102416_create_services_table', 1),
(15, '2021_09_20_103113_create_banners_table', 1),
(16, '2021_09_20_125332_create_messages_table', 1),
(17, '2021_09_20_133359_create_company_profiles_table', 1),
(18, '2021_09_21_110416_create_photo_galleries_table', 1),
(19, '2021_09_21_114832_create_video_galleries_table', 1),
(20, '2021_09_21_115025_create_subscribers_table', 1),
(21, '2021_09_27_095651_create_teams_table', 1),
(22, '2021_09_27_110946_create_management_table', 1),
(23, '2021_09_28_031648_create_countries_table', 1),
(24, '2021_09_29_090045_create_pages_table', 1),
(25, '2021_09_30_045712_create_permissions_table', 1),
(26, '2021_10_21_041936_create_ads_table', 1),
(27, '2021_10_21_091842_create_partners_table', 1),
(29, '2021_11_16_040626_create_offers_table', 1),
(30, '2021_12_03_150615_create_districts_table', 1),
(31, '2021_12_26_100115_create_delivery_times_table', 1),
(32, '2022_02_08_080457_create_brands_table', 1),
(33, '2022_02_08_093722_create_quotes_table', 2),
(37, '2022_02_13_142510_create_upazilas_table', 3),
(38, '2022_02_16_125925_create_areas_table', 4),
(39, '2022_02_16_125926_create_customers_table', 5),
(40, '2022_02_16_125927_create_questions_table', 6),
(41, '2022_02_16_125953_create_answars_table', 6),
(42, '2022_02_16_175002_create_contacts_table', 6),
(43, '2022_03_31_125824_create_quote_details_table', 6),
(44, '2022_09_20_041645_create_orders_table', 6),
(45, '2022_09_20_094505_create_order_details_table', 6),
(46, '2022_11_18_080700_create_inventories_table', 6),
(47, '2022_12_12_114728_create_faqs_table', 6),
(48, '2023_01_01_112315_create_branches_table', 6),
(53, '2023_01_05_121809_create_products_table', 10),
(54, '2023_01_05_121810_create_product_images_table', 11),
(55, '2023_01_05_121811_create_product_features_table', 12),
(56, '2021_10_21_100011_create_blogs_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `monitor_sizes`
--

CREATE TABLE `monitor_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitor_sizes`
--

INSERT INTO `monitor_sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '3.2\"/2100k', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(2, '3.2\"/1620k', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(3, '3.0\"/1040k', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(4, '3.0\"/920k', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(5, '3.2\"/2300k', '2023-01-01 06:28:00', '2023-01-01 06:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_limit_qty` varchar(3) NOT NULL,
  `minimum_order_amount` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(30) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_mobile` varchar(15) NOT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `billing_address` text NOT NULL,
  `vat_amount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(18,2) NOT NULL,
  `discount_amount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `service_charge` decimal(18,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(18,2) NOT NULL,
  `updated_by` varchar(3) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'p',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color_id` varchar(2) DEFAULT NULL,
  `size_id` varchar(2) DEFAULT NULL,
  `total_price` decimal(18,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `group_id` varchar(10) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `display_name`, `group_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'order.index', 'Pending Order View', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(2, 'order.onProcess', 'Order OnProcess', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(3, 'order.way', 'Order on the way', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(4, 'order.delivary', 'Order Delivery', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(5, 'sales.report', 'Sales Report', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(6, 'order.pending', 'Order Pending', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(7, 'order.process', 'Order Process', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(8, 'cancel.list', 'cancel.list', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(9, 'order.details.edit', 'Order details Edit', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(10, 'order.print', 'Order Print', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(11, 'order.edit', 'Order Edit', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(12, 'order.cancel', 'Product Order Cancel', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(13, 'order.all.update', 'Order Update', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(14, 'order.record', 'Order Record', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(15, 'quote.record', 'Quotation Record', '1', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(16, 'product.create', 'Product Entry', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(17, 'product.index', 'Product List', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(18, 'product.edit', 'Product Edit', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(19, 'category.index', 'Category Create', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(20, 'category.edit', 'Category Edit', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(21, 'category.list', 'Category List', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(22, 'subcategory.index', 'Sub Category Create', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(23, 'subcategory.edit', 'Sub Category Edit', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(24, 'subcategory.list', 'SubCategory List', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(25, 'category.rank', 'Category Rank', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(26, 'color.index', 'Color Entry', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(27, 'color.edit', 'Color Edit', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(28, 'size.index', 'Size Entry', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(29, 'size.edit', 'Size Edit', '2', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(30, 'company.banner', 'Banner Create', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(31, 'banner.all', 'Banner All', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(32, 'banner.edit', 'Banner Edit', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(33, 'about.us', 'About Us', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(34, 'mission', 'Mission Vission', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(35, 'management.index', 'Management Entry', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(36, 'management.edit', 'Management Edit', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(37, 'team.index', 'Team Entry', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(38, 'team.edit', 'Management Edit', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(39, 'ad.index', 'Advatize Entry', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(40, 'ad.edit', 'Advatize Edit', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(41, 'partner.index', 'Partner Entry', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(42, 'partner.edit', 'Partner Edit', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(43, 'blog.index', 'What Happeing Entry', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(44, 'blog.edit', 'News Edit', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(45, 'branch.index', 'Branch Entry', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(46, 'branch.edit', 'Branch Edit', '3', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(47, 'profile.edit', 'Company Profle edit', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(48, 'profile.update', 'Company Data update', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(49, 'country.all', 'Country.create', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(50, 'country.edit', 'Country Edit', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(51, 'admin.phone.edit', 'Admin Phone Edit', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(52, 'area.index', 'Area Create', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(53, 'area.edit', 'Area Edit', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(54, 'thana.index', 'Thana Create', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(55, 'thana.edit', 'Thana Edit', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(56, 'page.list', ' Page Setting', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(57, 'sms.sending', 'SMS Sending', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(58, 'sms.all', 'All SMS View', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(59, 'page', 'All Page List', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(60, 'permission.index', 'Permission', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(61, 'user.index', 'User Create', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(62, 'user.edit', 'user Edit', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(63, 'permission.edit', 'Permission Edit', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(64, 'customer.offer', 'Offer Setting', '4', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(65, 'customer', 'Customer Entry', '5', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(66, 'customer.all', 'Customer List', '5', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(67, 'customer.edit', 'Customer Edit', '5', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(68, 'customer.list', 'Customer List', '5', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(69, 'public.sms', 'Public SMS', '6', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(70, 'subscriber.list', 'Subscriber List', '6', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(71, 'password.change', 'Password change', '6', '1', NULL, '2022-03-31 01:01:59', '2022-03-31 01:01:59'),
(72, 'faq.index', 'Faq Entry', '3', '1', NULL, NULL, NULL),
(73, 'subsubcategory.index', 'Sub Subcategory Entry', '2', '1', '2023-01-02 04:43:12', '2023-01-02 04:43:12', '2023-01-02 04:43:12'),
(74, 'attribute.index', 'Attribute Add', '2', '1', '2023-01-05 04:31:16', '2023-01-05 04:31:16', '2023-01-05 04:31:16'),
(75, 'color.index', 'Color Add', '2', '1', NULL, NULL, NULL),
(76, 'style.index', 'Style Add', '2', '1', NULL, NULL, NULL),
(77, 'service.index', 'News Entry', '3', '1', NULL, '2023-01-08 05:13:06', NULL),
(78, 'service.edit', 'News Edit', '3', '1', NULL, '2023-01-08 05:36:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `image` text NOT NULL,
  `save_by` varchar(3) NOT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `page_id`, `status`, `created_at`, `updated_at`) VALUES
(949, 2, 1, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(950, 2, 2, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(951, 2, 3, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(952, 2, 4, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(953, 2, 5, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(954, 2, 6, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(955, 2, 7, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(956, 2, 8, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(957, 2, 9, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(958, 2, 10, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(959, 2, 11, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(960, 2, 12, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(961, 2, 13, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(962, 2, 14, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(963, 2, 15, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(964, 2, 16, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(965, 2, 17, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(966, 2, 18, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(967, 2, 19, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(968, 2, 20, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(969, 2, 21, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(970, 2, 22, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(971, 2, 23, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(972, 2, 24, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(973, 2, 25, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(974, 2, 26, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(975, 2, 27, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(976, 2, 28, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(977, 2, 29, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(978, 2, 73, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(979, 2, 74, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(980, 2, 75, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(981, 2, 76, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(982, 2, 30, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(983, 2, 31, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(984, 2, 32, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(985, 2, 33, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(986, 2, 34, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(987, 2, 35, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(988, 2, 36, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(989, 2, 37, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(990, 2, 38, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(991, 2, 39, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(992, 2, 40, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(993, 2, 41, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(994, 2, 42, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(995, 2, 43, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(996, 2, 44, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(997, 2, 45, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(998, 2, 46, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(999, 2, 72, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1000, 2, 77, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1001, 2, 47, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1002, 2, 48, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1003, 2, 49, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1004, 2, 50, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1005, 2, 51, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1006, 2, 52, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1007, 2, 53, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1008, 2, 54, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1009, 2, 55, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1010, 2, 56, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1011, 2, 57, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1012, 2, 58, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1013, 2, 59, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1014, 2, 60, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1015, 2, 61, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1016, 2, 62, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1017, 2, 63, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1018, 2, 64, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1019, 2, 65, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1020, 2, 66, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1021, 2, 67, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1022, 2, 68, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1023, 2, 69, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1024, 2, 70, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1025, 2, 71, 1, '2023-01-08 05:14:35', '2023-01-08 05:14:35'),
(1026, 3, 77, 1, '2023-01-08 05:19:23', '2023-01-08 05:19:23'),
(1179, 1, 1, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1180, 1, 2, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1181, 1, 3, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1182, 1, 4, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1183, 1, 5, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1184, 1, 6, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1185, 1, 7, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1186, 1, 8, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1187, 1, 9, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1188, 1, 10, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1189, 1, 11, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1190, 1, 12, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1191, 1, 13, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1192, 1, 14, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1193, 1, 15, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1194, 1, 16, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1195, 1, 17, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1196, 1, 18, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1197, 1, 19, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1198, 1, 20, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1199, 1, 21, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1200, 1, 22, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1201, 1, 23, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1202, 1, 24, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1203, 1, 25, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1204, 1, 26, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1205, 1, 27, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1206, 1, 28, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1207, 1, 29, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1208, 1, 73, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1209, 1, 74, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1210, 1, 75, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1211, 1, 76, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1212, 1, 30, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1213, 1, 31, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1214, 1, 32, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1215, 1, 33, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1216, 1, 34, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1217, 1, 35, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1218, 1, 36, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1219, 1, 37, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1220, 1, 38, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1221, 1, 39, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1222, 1, 40, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1223, 1, 41, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1224, 1, 42, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1225, 1, 43, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1226, 1, 44, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1227, 1, 45, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1228, 1, 46, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1229, 1, 72, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1230, 1, 77, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1231, 1, 47, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1232, 1, 48, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1233, 1, 49, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1234, 1, 50, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1235, 1, 51, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1236, 1, 52, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1237, 1, 53, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1238, 1, 54, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1239, 1, 55, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1240, 1, 56, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1241, 1, 57, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1242, 1, 58, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1243, 1, 59, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1244, 1, 60, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1245, 1, 61, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1246, 1, 62, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1247, 1, 63, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1248, 1, 64, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1249, 1, 65, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1250, 1, 66, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1251, 1, 67, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1252, 1, 68, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1253, 1, 69, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1254, 1, 70, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1255, 1, 71, 1, '2023-01-08 05:29:24', '2023-01-08 05:29:24'),
(1256, 1, 78, 1, '2023-01-08 05:39:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_galleries`
--

CREATE TABLE `photo_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(120) NOT NULL,
  `image` text DEFAULT NULL,
  `save_by` varchar(3) DEFAULT NULL,
  `update_by` varchar(3) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pixels`
--

CREATE TABLE `pixels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pixels`
--

INSERT INTO `pixels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '32 MegaPixels', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(2, '26 MegaPixels', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(3, '24 MegaPixels', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(4, '20 MegaPixels', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(5, '18 MegaPixels', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(6, '45 MegaPixels', '2023-01-01 06:28:00', '2023-01-01 06:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(18) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(130) NOT NULL,
  `model` varchar(130) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subsubcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pixel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `recording_mode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `camera_format_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sensor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `effective_pixel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `monitor_size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `style_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(18,2) NOT NULL,
  `image` text NOT NULL,
  `discount` decimal(18,2) DEFAULT NULL,
  `short_details` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `is_feature` varchar(1) DEFAULT NULL,
  `is_offer` varchar(1) DEFAULT NULL,
  `new_status` varchar(1) DEFAULT NULL,
  `deal_start` date DEFAULT NULL,
  `deal_end` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `save_by` varchar(3) NOT NULL,
  `update_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `slug`, `model`, `category_id`, `sub_category_id`, `subsubcategory_id`, `brand_id`, `pixel_id`, `recording_mode_id`, `camera_format_id`, `sensor_id`, `effective_pixel_id`, `monitor_size_id`, `attribute_id`, `color_id`, `style_id`, `price`, `image`, `discount`, `short_details`, `description`, `is_feature`, `is_offer`, `new_status`, `deal_start`, `deal_end`, `status`, `save_by`, `update_by`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'P000001', 'Camera lence', 'camera-lence-1708342226', 'M-12', 1, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1200.00', 'uploads/product/1473935749_1281380_6353ac8ce6536_63bb9c0424876.jpg', NULL, '<p>product short details</p>', '<p>product short details eqvdas&nbsp;</p>', '0', '1', NULL, '2023-01-05', '2023-01-13', 1, '1', NULL, '127.0.0.1', NULL, '2023-01-05 09:34:34', '2024-02-19 11:30:26'),
(3, 'P000002', 'Erin', 'erin-1673239527', 'M-13', 5, 3, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1250.00', 'uploads/product/1456221029_1234027_623ad43476d4b_63bb9be7a9b1b.jpg', NULL, '<p>product short details</p>', '<p>product description</p>', '1', '0', NULL, NULL, NULL, 1, '1', NULL, '127.0.0.1', NULL, '2023-01-05 09:45:03', '2023-01-09 04:45:27'),
(4, 'P000003', 'Camera lens', 'camera-lens-1708342201', 'Quasi qui elit eius', 1, 1, 14, 1, 5, 2, 2, NULL, NULL, 1, NULL, NULL, NULL, '167.00', 'uploads/product/Travis Barnes_65d33bb9ce657.jpg', NULL, '<p>43qterqwgwe</p>', '<p>w45gfbhwref</p>', '0', '1', NULL, '2023-01-07', '2023-01-07', 1, '1', NULL, '127.0.0.1', NULL, '2023-01-07 04:53:36', '2024-02-19 11:30:01'),
(5, 'P000004', 'Nikon Battery charger', 'nikon-battery-charger-1708342163', 'Alias voluptas molli', 6, 17, 18, 3, 4, 1, 2, NULL, NULL, 3, NULL, NULL, NULL, '675.00', 'uploads/product/81ERwB-NpOL._AC_SL1500__624be8ff46b4b_63bb9ba78a96e.jpg', NULL, '<p>vwsvsd xc</p>', '<p>efC Eefv&nbsp;</p>', '1', '0', NULL, '2023-01-07', '2023-01-14', 1, '1', NULL, '127.0.0.1', NULL, '2023-01-07 05:58:02', '2024-02-19 11:29:23'),
(6, 'P000005', 'Alexa Richmond', 'alexa-richmond-1708341541', 'Quidem minim sed est', 3, 5, 12, 1, 4, 2, 2, NULL, NULL, 2, NULL, NULL, NULL, '3304.00', 'uploads/product/Alexa Richmond_65d33925bc4a8.jpg', NULL, '<p>dfewqgbhsdfb v</p>', '<p>tgqrewg</p>', '0', '0', NULL, '2023-01-07', '2023-01-14', 1, '1', NULL, '127.0.0.1', NULL, '2023-01-07 09:46:13', '2024-02-19 11:19:01'),
(8, 'P000006', 'Kylie Bolton', 'kylie-bolton-1708341437', 'Et laudantium et qu', 2, 2, 12, 3, 6, 2, 1, NULL, NULL, 1, NULL, NULL, NULL, '9940.00', 'uploads/product/hand camera_65d338bd54cef.jpg', NULL, '<p>wfqwfcv</p>', NULL, '0', '0', NULL, NULL, NULL, 1, '1', NULL, '127.0.0.1', NULL, '2023-01-07 09:57:52', '2024-02-19 11:17:17'),
(9, 'P000007', 'Camera olympus', 'camera-olympus-1708341502', 'Corporis qui volupta', 1, 1, 10, 5, 2, 2, 1, NULL, NULL, 3, NULL, NULL, NULL, '6675.00', 'uploads/product/Camera Olympus_65d338fe8a785.jpg', NULL, '<p>shbdfbf&nbsp;</p>', '<p>wtgrhs</p>', '0', '0', NULL, NULL, NULL, 1, '1', NULL, '127.0.0.1', NULL, '2023-01-07 10:07:22', '2024-02-19 11:18:22'),
(10, 'P000008', 'camera lens', 'camera-lens-1708341278', 'Explicabo Sequi rep', 1, 6, 12, 2, 3, 1, 1, NULL, NULL, 5, NULL, NULL, NULL, '284.00', 'uploads/product/Lens 2_65d3381ec52ea.jpg', NULL, '<p>bb srt rnhf &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>', '<p>retkhgn &nbsp;fgfdnb&nbsp;</p>', '0', '0', NULL, NULL, NULL, 1, '1', NULL, '127.0.0.1', NULL, '2023-01-07 10:12:07', '2024-02-19 11:14:38'),
(11, 'P000009', 'Camera Canon', 'camera-canon-1708341237', 'sdvc xz', 1, 6, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12.00', 'uploads/product/Camera Canon_65d337f576f0d.jpg', NULL, '<p>ftV AERB A V &nbsp;DFASV</p>', '<p>RQTGYETRN ER&nbsp;</p>', '0', '0', NULL, NULL, NULL, 1, '1', NULL, '127.0.0.1', NULL, '2023-01-14 09:11:02', '2024-02-19 11:13:57'),
(12, 'P000010', 'Nikon battery charger', 'nikon-battery-charger-1708342121', 'W12', 6, 17, 18, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '120.00', 'uploads/product/lenc_65d337c20016e.jpg', NULL, '<p>FQWERVB S&nbsp;</p>', '<p>3GTQERV S</p>', '0', '0', NULL, NULL, NULL, 1, '1', NULL, '127.0.0.1', NULL, '2023-01-14 09:27:18', '2024-02-19 11:28:41'),
(13, 'P000011', '3 In 1 Foldable Wireless Charger', '3-in-1-foldable-wireless-charger-1708094840', '3 In 1 Foldable Wireless Charger', 6, 16, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2500.00', 'uploads/product/3 In 1 Foldable Wireless Charger For Qi Certified Mobile Phones 15w Magnetic Fast Charging Wireless Charger_65cf7484c9575.jpeg', NULL, NULL, NULL, '0', '1', NULL, NULL, NULL, 1, '1', NULL, '127.0.0.1', NULL, '2024-02-16 14:43:16', '2024-02-16 14:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_features`
--

INSERT INTO `product_features` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(44, 3, 'this is product feature', '2023-01-09 04:45:27', '2023-01-09 04:45:27'),
(56, 13, '3 In 1 Foldable Wireless Charger For Qi Certified Mobile Phones 15w Magnetic Fast Charging Wireless Charger', '2024-02-16 14:47:20', '2024-02-16 14:47:20'),
(58, 11, 'AQBFD QE45JHN', '2024-02-19 11:13:57', '2024-02-19 11:13:57'),
(59, 10, 'Alias aut necessitatibus sapiente aliquip nobis', '2024-02-19 11:14:38', '2024-02-19 11:14:38'),
(60, 8, 'Aliquip doloremque vero dolore sed nihil esse quo delectus autem nemo', '2024-02-19 11:17:17', '2024-02-19 11:17:17'),
(61, 9, 'Expedita eaque rerum laborum Doloremque voluptatem aut ullamco eu nulla sint eiusmod voluptatem Magnam', '2024-02-19 11:18:22', '2024-02-19 11:18:22'),
(62, 6, 'Inventore qui cum eu sed quo ipsum in est architecto aspernatur sapiente praesentium officiis eius dolores quo pariatur Eos iure', '2024-02-19 11:19:01', '2024-02-19 11:19:01'),
(63, 12, '2V WBFVD', '2024-02-19 11:28:41', '2024-02-19 11:28:41'),
(64, 5, 'Iure aperiam aute quae rerum adipisicing incidunt quidem in dolore laborum Sed eum autem', '2024-02-19 11:29:23', '2024-02-19 11:29:23'),
(65, 4, 'Aut sed nihil tempora atque corporis provident ea nulla', '2024-02-19 11:30:01', '2024-02-19 11:30:01'),
(66, 2, 'this is product features', '2024-02-19 11:30:26', '2024-02-19 11:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `otherImage` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `otherImage`, `created_at`, `updated_at`) VALUES
(30, 10, 'uploads/otherImage/1_6334cbcf8a033 - Copy_63bb9b1922818.jpg', '2023-01-09 04:42:01', '2023-01-09 04:42:01'),
(31, 10, 'uploads/otherImage/41ogNMjDNxL._AC__62be97fc786d5 - Copy_63bb9b1922b8c.jpg', '2023-01-09 04:42:01', '2023-01-09 04:42:01'),
(32, 10, 'uploads/otherImage/51+FUBre1BL._AC_SL1000__627dfcedeb1bc_63bb9b1922d93.jpg', '2023-01-09 04:42:01', '2023-01-09 04:42:01'),
(33, 9, 'uploads/otherImage/41ogNMjDNxL._AC__62be97fc786d5 - Copy_63bb9b2c9770a.jpg', '2023-01-09 04:42:20', '2023-01-09 04:42:20'),
(34, 9, 'uploads/otherImage/41ogNMjDNxL._AC__62be97fc786d5_63bb9b2c979e9.jpg', '2023-01-09 04:42:20', '2023-01-09 04:42:20'),
(35, 8, 'uploads/otherImage/31-SKHkJ-QL._AC__625c0035db093_63bb9b4508672.jpg', '2023-01-09 04:42:45', '2023-01-09 04:42:45'),
(36, 8, 'uploads/otherImage/41efSRbzolL._AC_SL1000__625bfa0738398_63bb9b450897f.jpg', '2023-01-09 04:42:45', '2023-01-09 04:42:45'),
(37, 8, 'uploads/otherImage/41ogNMjDNxL._AC__62be97fc786d5 - Copy_63bb9b4508b63.jpg', '2023-01-09 04:42:45', '2023-01-09 04:42:45'),
(38, 6, 'uploads/otherImage/61nbt6HpgLL._SL1040__624ee9d85171e_63bb9b6125490.jpg', '2023-01-09 04:43:13', '2023-01-09 04:43:13'),
(39, 6, 'uploads/otherImage/61yzxqIYOIL._SL1500__624ee38b7cfaf_63bb9b6125757.jpg', '2023-01-09 04:43:13', '2023-01-09 04:43:13'),
(40, 6, 'uploads/otherImage/71B6p9kuxjL._SL1400__624ec834edbed_63bb9b612591f.jpg', '2023-01-09 04:43:13', '2023-01-09 04:43:13'),
(41, 5, 'uploads/otherImage/71-mjALo9DS._AC_SL1500__625bf96f0ef11_63bb9ba78cfdb.jpg', '2023-01-09 04:44:23', '2023-01-09 04:44:23'),
(42, 4, 'uploads/otherImage/1326275471_839138_6238201b4df5c_63bb9bca0d939.jpg', '2023-01-09 04:44:58', '2023-01-09 04:44:58'),
(43, 4, 'uploads/otherImage/1329820570_844952_623ad09316fed_63bb9bca0dcad.jpg', '2023-01-09 04:44:58', '2023-01-09 04:44:58'),
(44, 4, 'uploads/otherImage/1330447874_519475_6231a1cd968c1_63bb9bca0df28.jpg', '2023-01-09 04:44:58', '2023-01-09 04:44:58'),
(45, 3, 'uploads/otherImage/1508845059_1369132_62384b6b612c6_63bb9be7ac6c7.jpg', '2023-01-09 04:45:27', '2023-01-09 04:45:27'),
(46, 2, 'uploads/otherImage/1454496359_1222774_622f4dfadaf33_63bb9c0426b5a.jpg', '2023-01-09 04:45:56', '2023-01-09 04:45:56'),
(47, 2, 'uploads/otherImage/1454496359_1222775_62318543739e8_63bb9c0426e6d.jpg', '2023-01-09 04:45:56', '2023-01-09 04:45:56'),
(48, 2, 'uploads/otherImage/1454496359_1222776_622f4b215c300_63bb9c042706f.jpg', '2023-01-09 04:45:56', '2023-01-09 04:45:56'),
(50, 11, 'uploads/otherImage/41ogNMjDNxL._AC__62be97fc786d5_63c271a682eee.jpg', '2023-01-14 09:11:02', '2023-01-14 09:11:02'),
(52, 12, 'uploads/otherImage/41ogNMjDNxL._AC__62be97fc786d5 - Copy_63c2757664eb8.jpg', '2023-01-14 09:27:18', '2023-01-14 09:27:18'),
(53, 12, 'uploads/otherImage/41ogNMjDNxL._AC__62be97fc786d5_63c275766527e.jpg', '2023-01-14 09:27:18', '2023-01-14 09:27:18'),
(54, 12, 'uploads/otherImage/41OVYqYkAJL._AC_SL1000__625c01e123e5d_63c27576654fe.jpg', '2023-01-14 09:27:18', '2023-01-14 09:27:18'),
(57, 13, 'uploads/otherImage/Wireless Charger iPhone - 2 in 1 Charging Station for Apple Devices for iPhone 15 14 13 12 Pro Max Plus - Foldable Magnetic Charging Pad for Apple Watch Series & Airpods Series_65cf7484cd586.jpeg', '2024-02-16 14:43:16', '2024-02-16 14:43:16'),
(58, 11, 'uploads/otherImage/photography_65d337f578bca.jpeg', '2024-02-19 11:13:57', '2024-02-19 11:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` longtext NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `total` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quote_details`
--

CREATE TABLE `quote_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quote_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(191) NOT NULL,
  `price` double(8,2) NOT NULL,
  `sub_total` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recording_modes`
--

CREATE TABLE `recording_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recording_modes`
--

INSERT INTO `recording_modes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '4K', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(2, 'Full HD', '2023-01-01 06:28:00', '2023-01-01 06:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

CREATE TABLE `sensors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sensors`
--

INSERT INTO `sensors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1\" CMOS', '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(2, '1.23\" CMOS', '2023-01-01 06:28:00', '2023-01-01 06:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `short_details` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `save_by` varchar(3) DEFAULT NULL,
  `update_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `date`, `short_details`, `details`, `image`, `status`, `save_by`, `update_by`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '3 In 1 Foldable Wireless Charger', '2023-01-08', '<p>3 In 1 Foldable Wireless Charger For Qi Certified Mobile Phones 15w Magnetic Fast Charging Wireless Charger</p>', '<p>3 In 1 Foldable Wireless Charger For Qi Certified Mobile Phones 15w Magnetic Fast Charging Wireless Charger</p>', 'uploads/service/3 In 1 Foldable Wireless Charger For Qi Certified Mobile Phones 15w Magnetic Fast Charging Wireless Charger_65d740c5c1750.jpeg', 'a', '1', NULL, '127.0.0.1', NULL, NULL, '2024-02-22 12:40:37'),
(3, 'phone Charger Fast Charging', '2023-01-11', '<p>Amazon_com_ Iphone Charger Fast Charging</p>', '<p>Amazon_com_ Iphone Charger Fast Charging</p>', 'uploads/service/Amazon_com_ Iphone Charger Fast Charging_65d740ef5161d.jpeg', 'a', '1', NULL, '127.0.0.1', NULL, NULL, '2024-02-22 12:41:19'),
(4, 'Deleniti eveniet si', '1972-08-20', '<p>argvfadseragvafdsv</p>', '<p>dsbdfsab</p>', 'uploads/service/pexels-victor-freitas-703012_63c2a04467a5f.jpg', 'a', '1', NULL, '127.0.0.1', '2023-01-14 12:34:49', '2023-01-14 12:29:56', '2023-01-14 12:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(191) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `phone`, `email`, `message`, `deleted_at`, `created_at`, `updated_at`, `ip_address`) VALUES
(1, 'Maryam Parrish', '998-3446', 'nykob@mailinator.com', 'Architecto tempore', NULL, '2023-01-09 05:21:15', '2023-01-09 05:21:15', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `subsubcategories`
--

CREATE TABLE `subsubcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsubcategories`
--

INSERT INTO `subsubcategories` (`id`, `category_id`, `sub_category_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 'Camera Child', 'uploads/subSubcategory/1_6334cbcf8a033_63b29ca842745.jpg', '2023-01-02 05:12:05', '2023-01-02 08:58:16'),
(2, 5, 3, 'Camera vesrhb c', 'uploads/subSubcategory/41ogNMjDNxL._AC__62be97fc786d5_63b29d0569205.jpg', '2023-01-02 05:17:55', '2023-01-02 08:59:49'),
(3, 5, 4, 'Venus Haley', 'uploads/subSubcategory/73421_63b8f9b561a87.jpg', '2023-01-07 04:48:53', '2023-01-07 04:48:53'),
(4, 3, 9, 'Wynter Vinson', 'uploads/subSubcategory/31115_63b8f9c5e53db.jpg', '2023-01-07 04:49:09', '2023-01-07 04:49:09'),
(7, 1, 7, 'Randall Dorsey', 'uploads/subSubcategory/73421_63b8f9ee839b3.jpg', '2023-01-07 04:49:50', '2023-01-07 04:49:50'),
(8, 3, 5, 'Marshall Kline', 'uploads/subSubcategory/memory-card(1)_636e0f176e763_63b8f9fe922aa.png', '2023-01-07 04:50:06', '2023-01-07 04:50:06'),
(9, 2, 11, 'Lesley Reyes', 'uploads/subSubcategory/83860_63b8fa0f48f9a.jpg', '2023-01-07 04:50:23', '2023-01-07 04:50:23'),
(10, 3, 9, 'Felicia Moses', 'uploads/subSubcategory/73421_63b8fa2534950.jpg', '2023-01-07 04:50:45', '2023-01-07 04:50:45'),
(12, 1, 6, 'Megan Wilcox', 'uploads/subSubcategory/memory-card(1)_636e0f176e763_63b8fa401cbc9.png', '2023-01-07 04:51:12', '2023-01-07 04:51:12'),
(13, 1, 6, 'Tate Carson', 'uploads/subSubcategory/73421_63b8fa4d896a4.jpg', '2023-01-07 04:51:25', '2023-01-07 04:51:25'),
(14, 1, 1, 'Francis Rogers', 'uploads/subSubcategory/38916_63b8fa6a93876.jpg', '2023-01-07 04:51:54', '2023-01-07 04:51:54'),
(15, 6, 16, 'Charger', 'uploads/subSubcategory/3 In 1 Foldable Wireless Charger For Qi Certified Mobile Phones 15w Magnetic Fast Charging Wireless Charger_65cf7563dc9ce.jpeg', '2024-02-16 14:46:59', '2024-02-16 14:46:59'),
(16, 6, 16, 'Charger', '0', '2024-02-16 14:48:53', '2024-02-16 14:48:53'),
(17, 5, 18, 'OPPO A17k Smartphone (3_64GB)', 'uploads/subSubcategory/OPPO A17k Smartphone (3_64GB)_65cf7a5c5af1d.jpeg', '2024-02-16 15:08:12', '2024-02-16 15:08:12'),
(18, 6, 17, 'Vipfan E04 wall charger  + cable C', 'uploads/subSubcategory/Vipfan E04 wall charger, USB-C, 20W, QC 3_0 + Lightning cable (white), USB Ladegerät_65d31716d9f91.jpeg', '2024-02-19 08:51:14', '2024-02-19 08:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(130) NOT NULL,
  `image` text NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `save_by` varchar(10) NOT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `image`, `status`, `save_by`, `updated_by`, `ip_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Camera', 'camera-1708343425', 'uploads/subcategory/canon_65d34081c19e9.jpeg', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-02 04:23:43', '2024-02-19 11:50:25'),
(2, 3, 'Neewer', 'neewer-1708343739', 'uploads/subcategory/64874_63bb9e57af4dc.jpg', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-02 04:24:08', '2024-02-19 11:55:39'),
(3, 5, 'Iphone', 'iphone-1708342625', 'uploads/subcategory/iphone_65d33d610a1e2.png', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-02 05:11:42', '2024-02-19 11:37:05'),
(4, 3, 'Elinchrom', 'elinchrom-1708343749', 'uploads/subcategory/99533_63bb9e6d73c5f.jpg', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-02 05:13:45', '2024-02-19 11:55:49'),
(5, 1, 'fsdafsadf', 'fsdafsadf-1708342778', 'uploads/subcategory/canon_65d33dfa97283.jpeg', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-02 07:02:13', '2024-02-19 11:39:38'),
(6, 1, 'Walton', 'walton-1708342812', 'uploads/subcategory/olympus_65d33e1cb4f11.jpg', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-07 04:45:52', '2024-02-19 11:40:12'),
(7, 1, 'Sony', 'sony-1708343021', 'uploads/subcategory/sony logo_65d33eede36a2.jpg', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-07 04:46:03', '2024-02-19 11:43:41'),
(8, 6, 'Maxine Sampson', 'maxine-sampson-1708342528', 'uploads/subcategory/battery_6246a3237bf66_63bb9e4185e71.jpg', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-07 04:46:15', '2024-02-19 11:35:28'),
(9, 3, 'Limo studio', 'limo-studio-1708343695', 'uploads/subcategory/tripod_6246db281ec28_63bb9e20d5cec.png', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-07 04:46:26', '2024-02-19 11:54:55'),
(10, 1, 'Nikon', 'nikon-1708343109', 'uploads/subcategory/nikkon_65d33f4555cf2.png', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-07 04:46:40', '2024-02-19 11:45:09'),
(11, 4, 'Marshall Sargent', 'marshall-sargent-1708342439', 'uploads/subcategory/73421_63bb9e0bc1a3d.jpg', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-07 04:46:56', '2024-02-19 11:33:59'),
(12, 5, 'Destiny Holland', 'destiny-holland-1673240039', 'uploads/subcategory/72800_63bb9de7c92a7.jpg', 'a', '1', '1', '127.0.0.1', '2024-02-19 11:33:36', '2023-01-07 04:47:10', '2024-02-19 11:33:36'),
(13, 2, 'Fujifilm', 'fujifilm-1708343406', 'uploads/subcategory/Fujifilm-logo_65d3406e45d40.png', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-07 04:47:22', '2024-02-19 11:50:06'),
(14, 1, 'Fujifilm', 'fujifilm-1708343223', 'uploads/subcategory/Fujifilm-logo_65d33fb796592.png', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-07 04:47:38', '2024-02-19 11:47:03'),
(15, 3, 'Godox', 'godox-1708343664', 'uploads/subcategory/tripod_6246db281ec28_63bb9dbfa5270.png', 'a', '1', '1', '127.0.0.1', NULL, '2023-01-07 04:47:55', '2024-02-19 11:54:24'),
(16, 6, 'Wireless charger', 'wireless-charger-1708331302', 'uploads/subcategory/3 In 1 Foldable Wireless Charger For Qi Certified Mobile Phones 15w Magnetic Fast Charging Wireless Charger_65cf7513d4c18.jpeg', 'a', '1', '1', '127.0.0.1', NULL, '2024-02-16 14:45:39', '2024-02-19 08:28:22'),
(17, 6, 'Charger', 'charger-1708331334', 'uploads/subcategory/Amazon_com_ Iphone Charger Fast Charging1_65d3114632290.jpeg', 'a', '1', '1', '127.0.0.1', NULL, '2024-02-16 14:46:29', '2024-02-19 08:28:54'),
(18, 5, 'Oppo', 'oppo-1708344627', 'uploads/subcategory/oppo logo_65d345332061b.png', 'a', '1', '1', '127.0.0.1', NULL, '2024-02-16 15:07:40', '2024-02-19 12:10:27'),
(19, 2, 'Nikon', 'nikon-1708343446', 'uploads/subcategory/nikkon_65d34096f2e4b.png', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 11:50:46', '2024-02-19 11:50:46'),
(20, 2, 'Sony', 'sony-1708343513', 'uploads/subcategory/sony logo_65d340d9e1f9f.jpg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 11:51:53', '2024-02-19 11:51:53'),
(21, 6, 'Iphone charger', 'iphone-charger-1708343902', 'uploads/subcategory/Amazon_com_ Iphone Charger Fast Charging_65d3425ea3222.jpeg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 11:58:22', '2024-02-19 11:58:22'),
(22, 6, 'USB adapter', 'usb-adapter-1708343959', 'uploads/subcategory/Roav Bolt Google Assistant Car Charger, Black_65d342979be70.jpeg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 11:59:19', '2024-02-19 11:59:19'),
(23, 6, 'Mouse', 'mouse-1708344098', 'uploads/subcategory/Wired Mouse Usb Colorful Lighting Computer Sports Game Mouse_65d34322c5241.jpeg', 'a', '1', '1', '127.0.0.1', NULL, '2024-02-19 12:00:16', '2024-02-19 12:01:38'),
(24, 5, 'MI', 'mi-1708344579', 'uploads/subcategory/mi logo_65d3450376442.png', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 12:09:39', '2024-02-19 12:09:39'),
(25, 5, 'Vivo', 'vivo-1708344715', 'uploads/subcategory/vivo logo_65d3458b1b14a.png', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 12:11:55', '2024-02-19 12:11:55'),
(26, 5, 'Samsang', 'samsang-1708344913', 'uploads/subcategory/Samsang_65d34651e293b.jpg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 12:15:13', '2024-02-19 12:15:13'),
(27, 5, 'Tecno', 'tecno-1708344976', 'uploads/subcategory/Tecno logo_65d34690e5fdf.png', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 12:16:16', '2024-02-19 12:16:16'),
(28, 4, 'Logitech', 'logitech-1708346037', 'uploads/subcategory/Logitech_65d34ab5ba455.jpg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 12:33:57', '2024-02-19 12:33:57'),
(29, 4, 'Digital x', 'digital-x-1708346076', 'uploads/subcategory/Digital x_65d34adccc306.jpg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 12:34:36', '2024-02-19 12:34:36'),
(30, 4, 'Sony', 'sony-1708346100', 'uploads/subcategory/Sony_65d34af46b1f2.jpg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 12:35:00', '2024-02-19 12:35:00'),
(31, 4, 'Microlab', 'microlab-1708346132', 'uploads/subcategory/Microlab_65d34b14b72d0.jpeg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 12:35:32', '2024-02-19 12:35:32'),
(32, 4, 'Havit', 'havit-1708346161', 'uploads/subcategory/Havit_65d34b312c823.jpg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 12:36:01', '2024-02-19 12:36:01'),
(33, 4, 'MI', 'mi-1708346202', 'uploads/subcategory/Sound_65d34b5aeedf0.jpeg', 'a', '1', NULL, '127.0.0.1', NULL, '2024-02-19 12:36:42', '2024-02-19 12:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `save_by` varchar(3) DEFAULT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Fakirhat', NULL, NULL),
(2, 2, 'Sadar', NULL, NULL),
(3, 2, 'Mollahat', NULL, NULL),
(4, 2, 'Sarankhola', NULL, NULL),
(5, 2, 'Rampal', NULL, NULL),
(6, 2, 'Morrelganj', NULL, NULL),
(7, 2, 'Kachua', NULL, NULL),
(8, 2, 'Mongla', NULL, NULL),
(9, 2, 'Chitalmari', NULL, NULL),
(10, 3, 'Sadar', NULL, NULL),
(11, 3, 'Alikadam', NULL, NULL),
(12, 3, 'Naikhongchhari', NULL, NULL),
(13, 3, 'Rowangchhari', NULL, NULL),
(14, 3, 'Lama', NULL, NULL),
(15, 3, 'Ruma', NULL, NULL),
(16, 3, 'Thanchi', NULL, NULL),
(17, 4, 'Amtali', NULL, NULL),
(18, 4, 'Sadar', NULL, NULL),
(19, 4, 'Betagi', NULL, NULL),
(20, 4, 'Bamna', NULL, NULL),
(21, 4, 'Pathorghata', NULL, NULL),
(22, 4, 'Taltali', NULL, NULL),
(23, 5, 'Barishal sadar', NULL, NULL),
(24, 5, 'Bakerganj', NULL, NULL),
(25, 5, 'Babuganj', NULL, NULL),
(26, 5, 'Wazirpur', NULL, NULL),
(27, 5, 'Banaripara', NULL, NULL),
(28, 5, 'Gournadi', NULL, NULL),
(29, 5, 'Agailjhara', NULL, NULL),
(30, 5, 'Mehendiganj', NULL, NULL),
(31, 5, 'Muladi', NULL, NULL),
(32, 5, 'Hizla', NULL, NULL),
(33, 6, 'Sadar', NULL, NULL),
(34, 6, 'Borhanuddin', NULL, NULL),
(35, 6, 'Charfesson', NULL, NULL),
(36, 6, 'Doulatkhan', NULL, NULL),
(37, 6, 'Monpura', NULL, NULL),
(38, 6, 'Tazumuddin', NULL, NULL),
(39, 6, 'Lalmohan', NULL, NULL),
(40, 7, 'Sadar', NULL, NULL),
(41, 7, 'Kahaloo', NULL, NULL),
(42, 7, 'Sadar', NULL, NULL),
(43, 7, 'Shariakandi', NULL, NULL),
(44, 7, 'Shajahanpur', NULL, NULL),
(45, 7, 'Dupchanchia', NULL, NULL),
(46, 7, 'Adamdighi', NULL, NULL),
(47, 7, 'Nondigram', NULL, NULL),
(48, 7, 'Sonatala', NULL, NULL),
(49, 7, 'Dhunot', NULL, NULL),
(50, 7, 'Gabtali', NULL, NULL),
(51, 7, 'Sherpur', NULL, NULL),
(52, 7, 'Shibganj', NULL, NULL),
(53, 8, 'Sadar', NULL, NULL),
(54, 8, 'Kasba', NULL, NULL),
(55, 8, 'Nasirnagar', NULL, NULL),
(56, 8, 'Sarail', NULL, NULL),
(57, 8, 'Ashuganj', NULL, NULL),
(58, 8, 'Akhaura', NULL, NULL),
(59, 8, 'Nabinagar', NULL, NULL),
(60, 8, 'Bancharampur', NULL, NULL),
(61, 8, 'Bijoynagar', NULL, NULL),
(62, 9, 'Haimchar', NULL, NULL),
(63, 9, 'Kachua', NULL, NULL),
(64, 9, 'Shahrasti', NULL, NULL),
(65, 9, 'Sadar', NULL, NULL),
(66, 9, 'Matlabsouth', NULL, NULL),
(67, 9, 'Hajiganj', NULL, NULL),
(68, 9, 'Matlabnorth', NULL, NULL),
(69, 9, 'Faridgonj', NULL, NULL),
(70, 10, 'Chapainawabganj sadar', NULL, NULL),
(71, 10, 'Gomostapur', NULL, NULL),
(72, 10, 'Nachol', NULL, NULL),
(73, 10, 'Bholahat', NULL, NULL),
(74, 10, 'Shibganj', NULL, NULL),
(75, 11, 'Rangunia,', NULL, NULL),
(76, 11, 'Sitakunda', NULL, NULL),
(77, 11, 'Mirsharai', NULL, NULL),
(78, 11, 'Patiya', NULL, NULL),
(79, 11, 'Sandwip', NULL, NULL),
(80, 11, 'Banshkhali', NULL, NULL),
(81, 11, 'Boalkhali', NULL, NULL),
(82, 11, 'Anwara', NULL, NULL),
(83, 11, 'Chandanaish', NULL, NULL),
(84, 11, 'Satkania', NULL, NULL),
(85, 11, 'Lohagara', NULL, NULL),
(86, 11, 'Hathazari', NULL, NULL),
(87, 11, 'Fatikchhari', NULL, NULL),
(88, 11, 'Raozan', NULL, NULL),
(89, 11, 'Karnafuli', NULL, NULL),
(90, 12, 'Chuadanga sadar', NULL, NULL),
(91, 12, 'Alamdanga', NULL, NULL),
(92, 12, 'Damurhuda', NULL, NULL),
(93, 12, 'Jibannagar', NULL, NULL),
(94, 13, 'Sadar', NULL, NULL),
(95, 13, 'Chakaria', NULL, NULL),
(96, 13, 'Kutubdia', NULL, NULL),
(97, 13, 'Ukhiya', NULL, NULL),
(98, 13, 'Moheshkhali', NULL, NULL),
(99, 13, 'Pekua', NULL, NULL),
(100, 13, 'Ramu', NULL, NULL),
(101, 13, 'Teknaf', NULL, NULL),
(102, 14, 'Debidwar', NULL, NULL),
(103, 14, 'Barura', NULL, NULL),
(104, 14, 'Brahmanpara', NULL, NULL),
(105, 14, 'Chandina', NULL, NULL),
(106, 14, 'Chauddagram', NULL, NULL),
(107, 14, 'Daudkandi', NULL, NULL),
(108, 14, 'Homna', NULL, NULL),
(109, 14, 'Laksam', NULL, NULL),
(110, 14, 'Muradnagar', NULL, NULL),
(111, 14, 'Nangalkot', NULL, NULL),
(112, 14, 'Cumillasadar', NULL, NULL),
(113, 14, 'Meghna', NULL, NULL),
(114, 14, 'Monohargonj', NULL, NULL),
(115, 14, 'Sadarsouth', NULL, NULL),
(116, 14, 'Titas', NULL, NULL),
(117, 14, 'Burichang', NULL, NULL),
(118, 14, 'Lalmai', NULL, NULL),
(119, 15, 'Adabor', NULL, NULL),
(120, 15, 'Airport', NULL, NULL),
(121, 15, 'Badda', NULL, NULL),
(122, 15, 'Banani', NULL, NULL),
(123, 15, 'Bangshal', NULL, NULL),
(124, 15, 'Bhashantek', NULL, NULL),
(125, 15, 'Cantonment', NULL, NULL),
(126, 15, 'Chackbazar', NULL, NULL),
(127, 15, 'Darussalam', NULL, NULL),
(128, 15, 'Daskhinkhan', NULL, NULL),
(129, 15, 'Demra', NULL, NULL),
(130, 15, 'Dhamrai', NULL, NULL),
(131, 15, 'Dhanmondi', NULL, NULL),
(132, 15, 'Dohar', NULL, NULL),
(133, 15, 'Gandaria', NULL, NULL),
(134, 15, 'Gulshan', NULL, NULL),
(135, 15, 'Hazaribag', NULL, NULL),
(136, 15, 'Jatrabari', NULL, NULL),
(137, 15, 'Kadamtali', NULL, NULL),
(138, 15, 'Kafrul', NULL, NULL),
(139, 15, 'Kalabagan', NULL, NULL),
(140, 15, 'Kamrangirchar', NULL, NULL),
(141, 15, 'Keraniganj', NULL, NULL),
(142, 15, 'Khilgaon', NULL, NULL),
(143, 15, 'Khilkhet', NULL, NULL),
(144, 15, 'Kotwali', NULL, NULL),
(145, 15, 'Lalbag', NULL, NULL),
(146, 15, 'Mirpur Model', NULL, NULL),
(147, 15, 'Mohammadpur', NULL, NULL),
(148, 15, 'Motijheel', NULL, NULL),
(149, 15, 'Mugda', NULL, NULL),
(150, 15, 'Nawabganj', NULL, NULL),
(151, 15, 'New Market', NULL, NULL),
(152, 15, 'Pallabi', NULL, NULL),
(153, 15, 'Paltan', NULL, NULL),
(154, 15, 'Ramna', NULL, NULL),
(155, 15, 'Rampura', NULL, NULL),
(156, 15, 'Rupnagar', NULL, NULL),
(157, 15, 'Sabujbag', NULL, NULL),
(158, 15, 'Savar', NULL, NULL),
(159, 15, 'Shah Ali', NULL, NULL),
(160, 15, 'Shah Ali', NULL, NULL),
(161, 15, 'Shahbag', NULL, NULL),
(162, 15, 'Shahjahanpur', NULL, NULL),
(163, 15, 'Sherebanglanagar', NULL, NULL),
(164, 15, 'Shyampur', NULL, NULL),
(165, 15, 'Sutrapur', NULL, NULL),
(166, 15, 'Tejgaon', NULL, NULL),
(167, 15, 'Tejgaon I/A', NULL, NULL),
(168, 15, 'Turag', NULL, NULL),
(169, 15, 'Uttara', NULL, NULL),
(170, 15, 'Uttara West', NULL, NULL),
(171, 15, 'Uttarkhan', NULL, NULL),
(172, 15, 'Vatara', NULL, NULL),
(173, 15, 'Wari', NULL, NULL),
(174, 16, 'Nawabganj', NULL, NULL),
(175, 16, 'Birganj', NULL, NULL),
(176, 16, 'Ghoraghat', NULL, NULL),
(177, 16, 'Birampur', NULL, NULL),
(178, 16, 'Parbatipur', NULL, NULL),
(179, 16, 'Bochaganj', NULL, NULL),
(180, 16, 'Kaharol', NULL, NULL),
(181, 16, 'Fulbari', NULL, NULL),
(182, 16, 'Dinajpur sadar', NULL, NULL),
(183, 16, 'Hakimpur', NULL, NULL),
(184, 16, 'Khansama', NULL, NULL),
(185, 16, 'Birol', NULL, NULL),
(186, 16, 'Chirirbandar', NULL, NULL),
(187, 17, 'Sadar', NULL, NULL),
(188, 17, 'Alfadanga', NULL, NULL),
(189, 17, 'Boalmari', NULL, NULL),
(190, 17, 'Sadarpur', NULL, NULL),
(191, 17, 'Nagarkanda', NULL, NULL),
(192, 17, 'Bhanga', NULL, NULL),
(193, 17, 'Charbhadrasan', NULL, NULL),
(194, 17, 'Madhukhali', NULL, NULL),
(195, 17, 'Saltha', NULL, NULL),
(196, 18, 'Chhagalnaiya', NULL, NULL),
(197, 18, 'Sadar', NULL, NULL),
(198, 18, 'Sonagazi', NULL, NULL),
(199, 18, 'Fulgazi', NULL, NULL),
(200, 18, 'Parshuram', NULL, NULL),
(201, 18, 'Daganbhuiyan', NULL, NULL),
(202, 19, 'Sadullapur', NULL, NULL),
(203, 19, 'Gaibandhasadar', NULL, NULL),
(204, 19, 'Palashbari', NULL, NULL),
(205, 19, 'Saghata', NULL, NULL),
(206, 19, 'Gobindaganj', NULL, NULL),
(207, 19, 'Sundarganj', NULL, NULL),
(208, 19, 'Phulchari', NULL, NULL),
(209, 20, 'Kaliganj', NULL, NULL),
(210, 20, 'Kaliakair', NULL, NULL),
(211, 20, 'Kapasia', NULL, NULL),
(212, 20, 'Sadar', NULL, NULL),
(213, 20, 'Sreepur', NULL, NULL),
(214, 21, 'Sadar', NULL, NULL),
(215, 21, 'Kashiani', NULL, NULL),
(216, 21, 'Tungipara', NULL, NULL),
(217, 21, 'Kotalipara', NULL, NULL),
(218, 21, 'Muksudpur', NULL, NULL),
(219, 22, 'Nabiganj', NULL, NULL),
(220, 22, 'Bahubal', NULL, NULL),
(221, 22, 'Ajmiriganj', NULL, NULL),
(222, 22, 'Baniachong', NULL, NULL),
(223, 22, 'Lakhai', NULL, NULL),
(224, 22, 'Chunarughat', NULL, NULL),
(225, 22, 'Habiganjsadar', NULL, NULL),
(226, 22, 'Madhabpur', NULL, NULL),
(227, 22, 'Shayestaganj', NULL, NULL),
(228, 23, 'Jamalpursadar', NULL, NULL),
(229, 23, 'Melandah', NULL, NULL),
(230, 23, 'Islampur', NULL, NULL),
(231, 23, 'Dewangonj', NULL, NULL),
(232, 23, 'Sarishabari', NULL, NULL),
(233, 23, 'Madarganj', NULL, NULL),
(234, 23, 'Bokshiganj', NULL, NULL),
(235, 24, 'Manirampur', NULL, NULL),
(236, 24, 'Abhaynagar', NULL, NULL),
(237, 24, 'Bagherpara', NULL, NULL),
(238, 24, 'Chougachha', NULL, NULL),
(239, 24, 'Jhikargacha', NULL, NULL),
(240, 24, 'Keshabpur', NULL, NULL),
(241, 24, 'Sadar', NULL, NULL),
(242, 24, 'Sharsha', NULL, NULL),
(243, 25, 'Sadar', NULL, NULL),
(244, 25, 'Kathalia', NULL, NULL),
(245, 25, 'Nalchity', NULL, NULL),
(246, 25, 'Rajapur', NULL, NULL),
(247, 26, 'Sadar,', NULL, NULL),
(248, 26, 'Shailkupa', NULL, NULL),
(249, 26, 'Harinakundu', NULL, NULL),
(250, 26, 'Kaliganj', NULL, NULL),
(251, 26, 'Kotchandpur', NULL, NULL),
(252, 26, 'Moheshpur', NULL, NULL),
(253, 27, 'Akkelpur', NULL, NULL),
(254, 27, 'Kalai', NULL, NULL),
(255, 27, 'Khetlal', NULL, NULL),
(256, 27, 'Panchbibi', NULL, NULL),
(257, 27, 'Joypurhat sadar', NULL, NULL),
(258, 28, 'Sadar', NULL, NULL),
(259, 28, 'Dighinala', NULL, NULL),
(260, 28, 'Panchari', NULL, NULL),
(261, 28, 'Laxmichhari', NULL, NULL),
(262, 28, 'Mohalchari', NULL, NULL),
(263, 28, 'Manikchari', NULL, NULL),
(264, 28, 'Ramgarh', NULL, NULL),
(265, 28, 'Matiranga', NULL, NULL),
(266, 28, 'Guimara', NULL, NULL),
(267, 29, 'Paikgasa', NULL, NULL),
(268, 29, 'Fultola', NULL, NULL),
(269, 29, 'Digholia', NULL, NULL),
(270, 29, 'Rupsha', NULL, NULL),
(271, 29, 'Terokhada', NULL, NULL),
(272, 29, 'Dumuria', NULL, NULL),
(273, 29, 'Botiaghata', NULL, NULL),
(274, 29, 'Dakop', NULL, NULL),
(275, 29, 'Koyra', NULL, NULL),
(276, 30, 'Itna', NULL, NULL),
(277, 30, 'Katiadi', NULL, NULL),
(278, 30, 'Bhairab', NULL, NULL),
(279, 30, 'Tarail', NULL, NULL),
(280, 30, 'Hossainpur', NULL, NULL),
(281, 30, 'Pakundia', NULL, NULL),
(282, 30, 'Kuliarchar', NULL, NULL),
(283, 30, 'Kishoreganjsadar', NULL, NULL),
(284, 30, 'Karimgonj', NULL, NULL),
(285, 30, 'Bajitpur', NULL, NULL),
(286, 30, 'Austagram', NULL, NULL),
(287, 30, 'Mithamoin', NULL, NULL),
(288, 30, 'Nikli', NULL, NULL),
(289, 31, 'Kurigram sadar', NULL, NULL),
(290, 31, 'Nageshwari', NULL, NULL),
(291, 31, 'Bhurungamari', NULL, NULL),
(292, 31, 'Phulbari', NULL, NULL),
(293, 31, 'Rajarhat', NULL, NULL),
(294, 31, 'Ulipur', NULL, NULL),
(295, 31, 'Chilmari', NULL, NULL),
(296, 31, 'Rowmari', NULL, NULL),
(297, 31, 'Charrajibpur', NULL, NULL),
(298, 32, 'Kushtiasadar', NULL, NULL),
(299, 32, 'Kumarkhali', NULL, NULL),
(300, 32, 'Khoksa', NULL, NULL),
(301, 32, 'Mirpurkushtia', NULL, NULL),
(302, 32, 'Daulatpur', NULL, NULL),
(303, 32, 'Bheramara', NULL, NULL),
(304, 33, 'Sadar', NULL, NULL),
(305, 33, 'Kamalnagar', NULL, NULL),
(306, 33, 'Raipur', NULL, NULL),
(307, 33, 'Ramgati', NULL, NULL),
(308, 33, 'Ramganj', NULL, NULL),
(309, 34, 'Sadar', NULL, NULL),
(310, 34, 'Kaliganj', NULL, NULL),
(311, 34, 'Hatibandha', NULL, NULL),
(312, 34, 'Patgram', NULL, NULL),
(313, 34, 'Aditmari', NULL, NULL),
(314, 35, 'Sadar', NULL, NULL),
(315, 35, 'Shibchar', NULL, NULL),
(316, 35, 'Kalkini', NULL, NULL),
(317, 35, 'Rajoir', NULL, NULL),
(318, 36, 'Shalikha', NULL, NULL),
(319, 36, 'Sreepur', NULL, NULL),
(320, 36, 'Magurasadar', NULL, NULL),
(321, 36, 'Mohammadpur', NULL, NULL),
(322, 37, 'Harirampur', NULL, NULL),
(323, 37, 'Saturia', NULL, NULL),
(324, 37, 'Sadar', NULL, NULL),
(325, 37, 'Gior', NULL, NULL),
(326, 37, 'Shibaloy', NULL, NULL),
(327, 37, 'Doulatpur', NULL, NULL),
(328, 37, 'Singiar', NULL, NULL),
(329, 38, 'Mujibnagar', NULL, NULL),
(330, 38, 'Meherpur sadar,', NULL, NULL),
(331, 38, 'Gangni', NULL, NULL),
(332, 39, 'Barlekha', NULL, NULL),
(333, 39, 'Kamolganj', NULL, NULL),
(334, 39, 'Kulaura', NULL, NULL),
(335, 39, 'Moulvibazarsadar', NULL, NULL),
(336, 39, 'Rajnagar', NULL, NULL),
(337, 39, 'Sreemangal', NULL, NULL),
(338, 39, 'Juri', NULL, NULL),
(339, 40, 'Sadar', NULL, NULL),
(340, 40, 'Sreenagar', NULL, NULL),
(341, 40, 'Sirajdikhan', NULL, NULL),
(342, 40, 'Louhajanj', NULL, NULL),
(343, 40, 'Gajaria', NULL, NULL),
(344, 40, 'Tongibari', NULL, NULL),
(345, 41, 'Fulbaria', NULL, NULL),
(346, 41, 'Trishal', NULL, NULL),
(347, 41, 'Bhaluka', NULL, NULL),
(348, 41, 'Muktagacha', NULL, NULL),
(349, 41, 'Mymensinghsadar', NULL, NULL),
(350, 41, 'Dhobaura', NULL, NULL),
(351, 41, 'Phulpur', NULL, NULL),
(352, 41, 'Haluaghat', NULL, NULL),
(353, 41, 'Gouripur', NULL, NULL),
(354, 41, 'Gafargaon', NULL, NULL),
(355, 41, 'Iswarganj', NULL, NULL),
(356, 41, 'Nandail', NULL, NULL),
(357, 41, 'Tarakanda', NULL, NULL),
(358, 42, 'Mohadevpur', NULL, NULL),
(359, 42, 'Badalgachi', NULL, NULL),
(360, 42, 'Patnitala', NULL, NULL),
(361, 42, 'Dhamoirhat', NULL, NULL),
(362, 42, 'Niamatpur', NULL, NULL),
(363, 42, 'Manda', NULL, NULL),
(364, 42, 'Atrai', NULL, NULL),
(365, 42, 'Raninagar', NULL, NULL),
(366, 42, 'Naogaonsadar', NULL, NULL),
(367, 42, 'Porsha', NULL, NULL),
(368, 42, 'Sapahar', NULL, NULL),
(369, 43, 'Narailsadar', NULL, NULL),
(370, 43, 'Lohagara', NULL, NULL),
(371, 43, 'Kalia', NULL, NULL),
(372, 44, 'Araihazar', NULL, NULL),
(373, 44, 'Bandar', NULL, NULL),
(374, 44, 'Narayanganjsadar', NULL, NULL),
(375, 44, 'Rupganj', NULL, NULL),
(376, 44, 'Sonargaon', NULL, NULL),
(377, 45, 'Belabo', NULL, NULL),
(378, 45, 'Monohardi', NULL, NULL),
(379, 45, 'Narsingdisadar', NULL, NULL),
(380, 45, 'Palash', NULL, NULL),
(381, 45, 'Raipura', NULL, NULL),
(382, 45, 'Shibpur', NULL, NULL),
(383, 46, 'Natore sadar', NULL, NULL),
(384, 46, 'Singra', NULL, NULL),
(385, 46, 'Baraigram', NULL, NULL),
(386, 46, 'Bagatipara', NULL, NULL),
(387, 46, 'Lalpur', NULL, NULL),
(388, 46, 'Gurudaspur', NULL, NULL),
(389, 46, 'Naldanga', NULL, NULL),
(390, 47, 'Barhatta', NULL, NULL),
(391, 47, 'Durgapur', NULL, NULL),
(392, 47, 'Kendua', NULL, NULL),
(393, 47, 'Atpara', NULL, NULL),
(394, 47, 'Madan', NULL, NULL),
(395, 47, 'Khaliajuri', NULL, NULL),
(396, 47, 'Kalmakanda', NULL, NULL),
(397, 47, 'Mohongonj', NULL, NULL),
(398, 47, 'Purbadhala', NULL, NULL),
(399, 47, 'Netrokonasadar', NULL, NULL),
(400, 48, 'Syedpur', NULL, NULL),
(401, 48, 'Domar', NULL, NULL),
(402, 48, 'Dimla', NULL, NULL),
(403, 48, 'Jaldhaka', NULL, NULL),
(404, 48, 'Kishorganj', NULL, NULL),
(405, 48, 'Nilphamari sadar', NULL, NULL),
(406, 49, 'Sadar', NULL, NULL),
(407, 49, 'Companiganj', NULL, NULL),
(408, 49, 'Begumganj', NULL, NULL),
(409, 49, 'Hatia', NULL, NULL),
(410, 49, 'Subarnachar', NULL, NULL),
(411, 49, 'Kabirhat', NULL, NULL),
(412, 49, 'Senbug', NULL, NULL),
(413, 49, 'Chatkhil', NULL, NULL),
(414, 49, 'Sonaimuri', NULL, NULL),
(415, 50, 'Sujanagar', NULL, NULL),
(416, 50, 'Ishurdi', NULL, NULL),
(417, 50, 'Bhangura', NULL, NULL),
(418, 50, 'Pabnasadar', NULL, NULL),
(419, 50, 'Bera', NULL, NULL),
(420, 50, 'Atghoria', NULL, NULL),
(421, 50, 'Chatmohar', NULL, NULL),
(422, 50, 'Santhia', NULL, NULL),
(423, 50, 'Faridpur', NULL, NULL),
(424, 51, 'Panchagarhsadar', NULL, NULL),
(425, 51, 'Debiganj', NULL, NULL),
(426, 51, 'Boda', NULL, NULL),
(427, 51, 'Atwari', NULL, NULL),
(428, 51, 'Tetulia', NULL, NULL),
(429, 52, 'Bauphal', NULL, NULL),
(430, 52, 'Sadar', NULL, NULL),
(431, 52, 'Dumki', NULL, NULL),
(432, 52, 'Dashmina', NULL, NULL),
(433, 52, 'Kalapara', NULL, NULL),
(434, 52, 'Mirzaganj', NULL, NULL),
(435, 52, 'Galachipa,', NULL, NULL),
(436, 52, 'Rangabali', NULL, NULL),
(437, 53, 'Sadar', NULL, NULL),
(438, 53, 'Nazirpur', NULL, NULL),
(439, 53, 'Kawkhali', NULL, NULL),
(440, 53, 'Bhandaria', NULL, NULL),
(441, 53, 'Mathbaria', NULL, NULL),
(442, 53, 'Nesarabad', NULL, NULL),
(443, 53, 'Indurkani', NULL, NULL),
(444, 54, 'Sadar', NULL, NULL),
(445, 54, 'Goalanda', NULL, NULL),
(446, 54, 'Pangsa', NULL, NULL),
(447, 54, 'Baliakandi', NULL, NULL),
(448, 54, 'Kalukhali', NULL, NULL),
(449, 55, 'Paba', NULL, NULL),
(450, 55, 'Durgapur', NULL, NULL),
(451, 55, 'Mohonpur', NULL, NULL),
(452, 55, 'Charghat', NULL, NULL),
(453, 55, 'Puthia', NULL, NULL),
(454, 55, 'Bagha,', NULL, NULL),
(455, 55, 'Godagari', NULL, NULL),
(456, 55, 'Tanore', NULL, NULL),
(457, 55, 'Bagmara', NULL, NULL),
(458, 56, 'Sadar', NULL, NULL),
(459, 56, 'Kaptai', NULL, NULL),
(460, 56, 'Kawkhali', NULL, NULL),
(461, 56, 'Baghaichari', NULL, NULL),
(462, 56, 'Barkal', NULL, NULL),
(463, 56, 'Langadu', NULL, NULL),
(464, 56, 'Rajasthali', NULL, NULL),
(465, 56, 'Belaichari', NULL, NULL),
(466, 56, 'Juraichari', NULL, NULL),
(467, 56, 'Naniarchar', NULL, NULL),
(468, 57, 'Rangpur sadar', NULL, NULL),
(469, 57, 'Gangachara', NULL, NULL),
(470, 57, 'Taragonj', NULL, NULL),
(471, 57, 'Badargonj', NULL, NULL),
(472, 57, 'Mithapukur', NULL, NULL),
(473, 57, 'Pirgonj', NULL, NULL),
(474, 57, 'Kaunia', NULL, NULL),
(475, 57, 'Pirgacha', NULL, NULL),
(476, 58, 'Assasuni', NULL, NULL),
(477, 58, 'Debhata', NULL, NULL),
(478, 58, 'Kalaroa', NULL, NULL),
(479, 58, 'Satkhirasadar', NULL, NULL),
(480, 58, 'Shyamnagar', NULL, NULL),
(481, 58, 'Tala', NULL, NULL),
(482, 58, 'Kaliganj', NULL, NULL),
(483, 59, 'Sadar', NULL, NULL),
(484, 59, 'Naria', NULL, NULL),
(485, 59, 'Zajira', NULL, NULL),
(486, 59, 'Gosairhat', NULL, NULL),
(487, 59, 'Bhedarganj', NULL, NULL),
(488, 59, 'Damudya', NULL, NULL),
(489, 60, 'Sherpur sadar', NULL, NULL),
(490, 60, 'Nalitabari', NULL, NULL),
(491, 60, 'Sreebordi', NULL, NULL),
(492, 60, 'Nokla', NULL, NULL),
(493, 60, 'Jhenaigati', NULL, NULL),
(494, 61, 'Belkuchi', NULL, NULL),
(495, 61, 'Chauhali', NULL, NULL),
(496, 61, 'Kamarkhand', NULL, NULL),
(497, 61, 'Kazipur', NULL, NULL),
(498, 61, 'Raigonj', NULL, NULL),
(499, 61, 'Shahjadpur', NULL, NULL),
(500, 61, 'Sirajganjsadar', NULL, NULL),
(501, 61, 'Tarash', NULL, NULL),
(502, 61, 'Ullapara', NULL, NULL),
(503, 62, 'Sadar', NULL, NULL),
(504, 62, 'Southsunamganj', NULL, NULL),
(505, 62, 'Bishwambarpur', NULL, NULL),
(506, 62, 'Chhatak', NULL, NULL),
(507, 62, 'Jagannathpur', NULL, NULL),
(508, 62, 'Dowarabazar', NULL, NULL),
(509, 62, 'Tahirpur', NULL, NULL),
(510, 62, 'Dharmapasha', NULL, NULL),
(511, 62, 'Jamalganj', NULL, NULL),
(512, 62, 'Shalla', NULL, NULL),
(513, 62, 'Derai', NULL, NULL),
(514, 63, 'Balaganj', NULL, NULL),
(515, 63, 'Beanibazar', NULL, NULL),
(516, 63, 'Bishwanath', NULL, NULL),
(517, 63, 'Companiganj', NULL, NULL),
(518, 63, 'Fenchuganj', NULL, NULL),
(519, 63, 'Golapganj', NULL, NULL),
(520, 63, 'Gowainghat', NULL, NULL),
(521, 63, 'Jaintiapur', NULL, NULL),
(522, 63, 'Kanaighat', NULL, NULL),
(523, 63, 'Sylhetsadar', NULL, NULL),
(524, 63, 'Zakiganj', NULL, NULL),
(525, 63, 'Dakshinsurma', NULL, NULL),
(526, 63, 'Osmaninagar', NULL, NULL),
(527, 64, 'Basail', NULL, NULL),
(528, 64, 'Bhuapur', NULL, NULL),
(529, 64, 'Delduar', NULL, NULL),
(530, 64, 'Ghatail', NULL, NULL),
(531, 64, 'Gopalpur', NULL, NULL),
(532, 64, 'Madhupur', NULL, NULL),
(533, 64, 'Mirzapur', NULL, NULL),
(534, 64, 'Nagarpur', NULL, NULL),
(535, 64, 'Sakhipur', NULL, NULL),
(536, 64, 'Tangailsadar', NULL, NULL),
(537, 64, 'Kalihati', NULL, NULL),
(538, 64, 'Dhanbari', NULL, NULL),
(539, 65, 'Thakurgaonsadar', NULL, NULL),
(540, 65, 'Pirganj', NULL, NULL),
(541, 65, 'Ranisankail', NULL, NULL),
(542, 65, 'Haripur', NULL, NULL),
(543, 65, 'Baliadangi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` text NOT NULL,
  `thum_image` text DEFAULT NULL,
  `role` varchar(3) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `save_by` varchar(3) DEFAULT NULL,
  `updated_by` varchar(3) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `image`, `thum_image`, `role`, `password`, `status`, `save_by`, `updated_by`, `ip_address`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'MD Hossain', 'admin', 'admin@gmail.com', NULL, 'images/avatar.png', NULL, '1', '$2y$10$JgeAm8BVC4RMjZ3yi1iZeu4zfodJL2oulIubBXOX2ZjTQGcXXeU0i', '1', NULL, NULL, NULL, NULL, NULL, '2023-01-01 06:27:59', '2023-01-01 06:27:59'),
(2, 'Abdullah', 'admin2', 'admin2@gmail.com', NULL, 'images/avatar.png', NULL, '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', NULL, NULL, NULL, NULL, NULL, '2023-01-01 06:28:00', '2023-01-01 06:28:00'),
(3, 'Lalon', 'lalon', 'lalon@gmail.com', NULL, 'uploads/user/41ogNMjDNxL._AC__62be97fc786d5_63ba5207769bb.jpg', NULL, '2', '$2y$10$IyORu808E7w5e7MohTB6V.z8xXYk2KptigPucRl8PDV5AEpwin6D6', '1', '1', NULL, '127.0.0.1', NULL, NULL, '2023-01-08 05:17:59', '2023-01-08 05:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `video_galleries`
--

CREATE TABLE `video_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(120) NOT NULL,
  `youtube_link` text NOT NULL,
  `save_by` varchar(3) DEFAULT NULL,
  `update_by` varchar(3) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answars`
--
ALTER TABLE `answars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answars_product_id_foreign` (`product_id`),
  ADD KEY `answars_question_id_foreign` (`question_id`),
  ADD KEY `answars_user_id_foreign` (`user_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_upazila_id_foreign` (`upazila_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camera_formats`
--
ALTER TABLE `camera_formats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `company_profiles`
--
ALTER TABLE `company_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_country_id_foreign` (`country_id`),
  ADD KEY `customers_district_id_foreign` (`district_id`),
  ADD KEY `customers_upazila_id_foreign` (`upazila_id`),
  ADD KEY `customers_area_id_foreign` (`area_id`);

--
-- Indexes for table `delivery_times`
--
ALTER TABLE `delivery_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `effective_pixels`
--
ALTER TABLE `effective_pixels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_product_id_foreign` (`product_id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
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
-- Indexes for table `monitor_sizes`
--
ALTER TABLE `monitor_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_user_id_foreign` (`user_id`),
  ADD KEY `permissions_page_id_foreign` (`page_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pixels`
--
ALTER TABLE `pixels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_subsubcategory_id_foreign` (`subsubcategory_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_pixel_id_foreign` (`pixel_id`),
  ADD KEY `products_recording_mode_id_foreign` (`recording_mode_id`),
  ADD KEY `products_camera_format_id_foreign` (`camera_format_id`),
  ADD KEY `products_sensor_id_foreign` (`sensor_id`),
  ADD KEY `products_effective_pixel_id_foreign` (`effective_pixel_id`),
  ADD KEY `products_monitor_size_id_foreign` (`monitor_size_id`),
  ADD KEY `products_attribute_id_foreign` (`attribute_id`),
  ADD KEY `products_color_id_foreign` (`color_id`),
  ADD KEY `products_style_id_foreign` (`style_id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_features_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_product_id_foreign` (`product_id`),
  ADD KEY `questions_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_details`
--
ALTER TABLE `quote_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recording_modes`
--
ALTER TABLE `recording_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subsubcategories`
--
ALTER TABLE `subsubcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subsubcategories_category_id_foreign` (`category_id`),
  ADD KEY `subsubcategories_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `video_galleries`
--
ALTER TABLE `video_galleries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answars`
--
ALTER TABLE `answars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `camera_formats`
--
ALTER TABLE `camera_formats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_profiles`
--
ALTER TABLE `company_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery_times`
--
ALTER TABLE `delivery_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `effective_pixels`
--
ALTER TABLE `effective_pixels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `monitor_sizes`
--
ALTER TABLE `monitor_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1257;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pixels`
--
ALTER TABLE `pixels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quote_details`
--
ALTER TABLE `quote_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recording_modes`
--
ALTER TABLE `recording_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subsubcategories`
--
ALTER TABLE `subsubcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=544;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video_galleries`
--
ALTER TABLE `video_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answars`
--
ALTER TABLE `answars`
  ADD CONSTRAINT `answars_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `answars_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `answars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_upazila_id_foreign` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_upazila_id_foreign` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_features`
--
ALTER TABLE `product_features`
  ADD CONSTRAINT `product_features_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
