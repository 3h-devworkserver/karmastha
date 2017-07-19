-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 06:27 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karmastha`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_desc` varchar(500) DEFAULT NULL,
  `attr_order` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `short_desc`, `attr_order`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Size', 'size of clothes', 0, 1, 1, '2017-07-05 02:35:43', '2017-07-06 01:58:01'),
(3, 'Color', 'color', 1, 1, 1, '2017-07-10 01:14:21', '2017-07-10 01:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `value_order` int(10) NOT NULL DEFAULT '0',
  `value_status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `value`, `value_order`, `value_status`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 2, 'S', 1, 1, 1, '2017-07-06 01:57:46', '2017-07-06 01:57:46'),
(5, 2, 'M', 2, 1, 1, '2017-07-06 01:57:46', '2017-07-06 01:57:46'),
(6, 2, 'L', 3, 1, 1, '2017-07-06 01:57:47', '2017-07-06 01:57:47'),
(7, 3, 'Red', 0, 1, 1, '2017-07-10 01:14:21', '2017-07-10 01:14:21'),
(8, 3, 'Green', 0, 1, 1, '2017-07-10 01:14:21', '2017-07-10 01:14:21'),
(9, 3, 'Black', 0, 1, 1, '2017-07-10 01:14:21', '2017-07-10 01:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_logo` varchar(500) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `topbrand` tinyint(4) NOT NULL,
  `b_order` int(5) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `slug`, `topbrand`, `b_order`, `status`, `created_at`, `updated_at`) VALUES
(6, 'carolina herrera', 'images/brand_logo/1495615153carolina herrera.jpg', 'carolina', 1, 0, 1, '2017-05-24 02:54:13', '2017-06-01 18:15:51'),
(7, 'erke', 'images/brand_logo/1495615199erke a.jpg', 'www.erke.com', 1, 0, 1, '2017-05-24 02:54:59', '2017-05-24 02:57:39'),
(8, 'Fossil', 'images/brand_logo/1495615339fosil.jpg', 'fossil', 1, 3, 1, '2017-05-24 02:57:19', '2017-06-01 18:15:42'),
(9, 'IFB', 'images/brand_logo/1495615393IFB a.jpg', 'www.ifb.com', 1, 3, 1, '2017-05-24 02:58:13', '2017-05-24 02:58:13'),
(10, 'meecha', 'images/brand_logo/1495615426meecha1.jpg', 'www.meecha.com', 1, 0, 0, '2017-05-24 02:58:46', '2017-05-24 03:00:17'),
(11, 'One plus', 'images/brand_logo/1495615462oneplus a.jpg', 'Oneplus.com', 1, 4, 1, '2017-05-24 02:59:22', '2017-05-24 02:59:22'),
(12, 'paco rebanne', 'images/brand_logo/1495615500paco rebane new.jpg', 'paco.com', 1, 7, 1, '2017-05-24 03:00:00', '2017-05-24 03:00:00'),
(13, 'Apple', 'images/brand_logo/1495699357apple.png', 'Apple', 1, 1, 1, '2017-05-25 02:17:37', '2017-05-25 02:19:01'),
(14, 'test', 'images/brand_logo/14962829841495699357apple.png', 'test', 1, 0, 1, '2017-05-31 19:48:34', '2017-06-01 20:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `brand_category`
--

CREATE TABLE `brand_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_category`
--

INSERT INTO `brand_category` (`id`, `brand_id`, `category_id`) VALUES
(1, 14, 39),
(2, 14, 43),
(3, 6, 39),
(4, 6, 42),
(5, 6, 43),
(6, 8, 39),
(7, 8, 42),
(8, 8, 43),
(9, 6, 24),
(10, 6, 25),
(11, 6, 26);

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `qty` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartitems`
--

INSERT INTO `cartitems` (`id`, `product_id`, `user_id`, `qty`, `created_at`, `updated_at`) VALUES
(12, 3, 7, 14, '2017-06-22 21:07:00', '2017-06-25 04:20:45'),
(13, 2, 7, 6, '2017-06-22 21:11:41', '2017-06-22 21:12:29'),
(18, 2, 7, 4, '2017-06-25 04:17:16', '2017-06-25 04:17:44'),
(19, 2, 7, 5, '2017-06-25 04:24:35', '2017-06-25 04:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `cartitem_attribute`
--

CREATE TABLE `cartitem_attribute` (
  `id` int(10) UNSIGNED NOT NULL,
  `cartitem_id` int(10) UNSIGNED NOT NULL,
  `attr_name` varchar(50) NOT NULL,
  `attr_value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartitem_attribute`
--

INSERT INTO `cartitem_attribute` (`id`, `cartitem_id`, `attr_name`, `attr_value`, `created_at`, `updated_at`) VALUES
(3, 13, 'Size', 'Small', '2017-06-22 21:11:41', '2017-06-22 21:11:41'),
(4, 13, 'Color', 'Red', '2017-06-22 21:11:41', '2017-06-22 21:11:41'),
(5, 14, 'Size', 'Small', '2017-06-22 21:13:23', '2017-06-22 21:13:23'),
(6, 14, 'Color', 'Green', '2017-06-22 21:13:23', '2017-06-22 21:13:23'),
(7, 15, 'Size', 'Small', '2017-06-24 13:05:16', '2017-06-24 13:05:16'),
(8, 15, 'Color', 'Green', '2017-06-24 13:05:16', '2017-06-24 13:05:16'),
(9, 16, 'Size', 'Small', '2017-06-24 13:18:37', '2017-06-24 13:18:37'),
(10, 16, 'Color', 'Green', '2017-06-24 13:18:37', '2017-06-24 13:18:37'),
(11, 17, 'Size', 'Small', '2017-06-24 13:30:18', '2017-06-24 13:30:18'),
(12, 17, 'Color', 'Green', '2017-06-24 13:30:19', '2017-06-24 13:30:19'),
(13, 18, 'Size', 'Small', '2017-06-25 04:17:16', '2017-06-25 04:17:16'),
(14, 18, 'Color', 'Green', '2017-06-25 04:17:16', '2017-06-25 04:17:16'),
(15, 19, 'Size', 'Medium', '2017-06-25 04:24:36', '2017-06-25 04:24:36'),
(16, 19, 'Color', 'Red', '2017-06-25 04:24:36', '2017-06-25 04:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `cat_type` varchar(50) DEFAULT NULL,
  `description` longtext,
  `feat_img` varchar(255) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` text,
  `meta_desc` text,
  `order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `parent_id`, `title`, `label`, `url`, `cat_type`, `description`, `feat_img`, `meta_title`, `meta_keyword`, `meta_desc`, `order`, `status`, `created_at`, `updated_at`) VALUES
(18, 0, 'Men', 'Men', 'men', NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, '2017-04-27 11:34:40', '2017-05-31 11:25:12'),
(19, 0, 'Women', 'Women', 'women', NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, '2017-04-28 01:53:12', '2017-05-31 11:25:11'),
(20, 0, 'Decoration', 'Decoration', 'decoration', NULL, NULL, NULL, NULL, NULL, NULL, 6, 0, '2017-04-28 01:56:11', '2017-05-31 11:25:12'),
(21, 0, 'Mobile', 'Mobile', 'mobile', NULL, NULL, NULL, NULL, NULL, NULL, 8, 0, '2017-04-28 01:56:31', '2017-05-31 11:25:12'),
(22, 0, 'Furniture', 'Furniture', 'furniture', NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, '2017-04-28 07:59:25', '2017-05-31 11:25:12'),
(23, 0, 'Electronics', 'electronic', 'electronix', NULL, NULL, NULL, NULL, NULL, NULL, 7, 0, '2017-05-03 11:37:58', '2017-05-31 11:25:12'),
(24, 42, 'Tshirt', '', 'tshirt', 'more', NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-05-05 12:09:19', '2017-05-31 23:49:20'),
(25, 24, 'Polo', '', 'polo', 'top', NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-05-07 07:58:29', '2017-06-06 10:35:57'),
(26, 25, 'Test', '', 'test', 'more', NULL, NULL, NULL, NULL, NULL, 0, 1, '2017-05-07 15:30:25', '2017-06-06 10:55:42'),
(27, 24, 'Test2', '', 'test2', 'more', NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-05-07 15:35:28', '2017-06-06 11:00:46'),
(28, 42, 'Test3', '', 'test3', 'more', NULL, NULL, NULL, NULL, NULL, 2, 1, '2017-05-07 15:37:50', '2017-06-06 11:00:45'),
(31, 28, 'test311', '', 'test311', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2017-05-07 16:32:11', '2017-05-12 09:50:39'),
(32, 40, 'test4', '', 'test4', 'more', 'sad sda fds dsa', '', 'titl', 'keyw', 'desc', 2, 1, '2017-05-09 01:14:54', '2017-05-31 11:25:26'),
(33, 40, 'test5', '', 'test5', 'more', 'asd sda sda fsda  d', '1mkaq-02.jpg', 'titlte', 'kew', 'desc', 3, 0, '2017-05-09 01:20:35', '2017-05-31 11:25:05'),
(34, 41, 'test51', '', 'test51', 'more', NULL, '', '', '', '', 0, 1, '2017-05-09 01:29:36', '2017-05-31 11:26:22'),
(35, 0, 'asdf', '', 'asdf', 'more', 'asdfasdf asd fsd', 'H8jh3-abroad-study-australia.jpg', 'asdf', 'sdf', 'asdf', 11, 0, '2017-05-09 02:30:08', '2017-05-31 11:25:58'),
(39, 0, 'Fashion', '', 'fashion', 'top', '<p>When you take style seriously, you need the perfect outfit for every occasion. And, the right outfit has to fit effortlessly, in terms of comfort and style. Stay cool and look smart with our wide selection of stylish outfits - be it checked shirts and distressed denims, or safari shorts and T-shirts, we have a pair for every season. Shop from leading brands like UCB, Van Heusen, Allen Solly, People, Levi''s, Wrangler, Jack and Jones, Lee, Flying Machine, Pepe, Roadster, Arrow, and more.</p>', 'bZanP-2.jpg', NULL, NULL, NULL, 0, 1, '2017-05-23 10:23:31', '2017-06-02 01:18:12'),
(40, 0, 'Cosmetic', '', 'cosmetic', 'top', '<p>When you take style seriously, you need the perfect outfit for every occasion. And, the right outfit has to fit effortlessly, in terms of comfort and style. Stay cool and look smart with our wide selection of stylish outfits - be it checked shirts and distressed denims, or safari shorts and T-shirts, we have a pair for every season. Shop from leading brands like UCB, Van Heusen, Allen Solly, People, Levi''s, Wrangler, Jack and Jones, Lee, Flying Machine, Pepe, Roadster, Arrow, and more.</p>', '11sGN-3.jpg', NULL, NULL, NULL, 1, 1, '2017-05-23 10:24:15', '2017-06-02 01:23:13'),
(41, 0, 'Fancy Items', '', 'fancy-items', 'top', NULL, '41v3R-5.jpg', NULL, NULL, NULL, 2, 0, '2017-05-23 10:25:55', '2017-06-02 02:11:35'),
(42, 39, 'Men''s clothing', '', 'fashion/mens-clothing', 'top', '<p>When you take style seriously, you need the perfect outfit for every occasion. And, the right outfit has to fit effortlessly, in terms of comfort and style. Stay cool and look smart with our wide selection of stylish outfits - be it checked shirts and distressed denims, or safari shorts and T-shirts, we have a pair for every season. Shop from leading brands like UCB, Van Heusen, Allen Solly, People, Levi''s, Wrangler, Jack and Jones, Lee, Flying Machine, Pepe, Roadster, Arrow, and more.</p>', '3EQdB-tshirt.jpg', NULL, NULL, NULL, 0, 1, '2017-05-23 10:26:26', '2017-06-05 02:43:14'),
(43, 39, 'Women''s Clothing', '', 'womens-clothing', 'top', NULL, 'S6Wui-pink tshirt.jpg', NULL, NULL, NULL, 1, 1, '2017-05-23 10:26:49', '2017-06-02 00:42:28'),
(44, 39, 'Kid''s', '', 'kids', 'more', NULL, 'YuSwD-kid.jpg', NULL, NULL, NULL, 2, 1, '2017-05-23 10:27:01', '2017-06-02 00:45:36'),
(45, 39, 'Handbags & Accessories', '', 'handbags-accessories', 'more', NULL, 'aJQEV-2.jpg', NULL, NULL, NULL, 4, 1, '2017-05-23 10:27:41', '2017-06-02 00:45:13'),
(46, 39, 'Health & Beauty', '', 'health-beauty', 'more', NULL, 'HAtLr-3.jpg', NULL, NULL, NULL, 3, 1, '2017-05-23 10:27:57', '2017-06-02 00:45:00'),
(47, 40, 'Men&#039;s', '', 'mens-1', 'top', '', '', '', '', '', 0, 1, '2017-05-23 10:29:14', '2017-05-23 10:29:21'),
(48, 40, 'Women&#039;s', '', 'womens-1', 'top', '', '', '', '', '', 1, 1, '2017-05-23 10:30:48', '2017-05-23 10:30:55'),
(55, 0, 'asdfasdf', '', 'asdfasdf', 'more', 'When you take style seriously, you need the perfect outfit for every occasion. And, the right outfit has to fit effortlessly, in terms of comfort and style. Stay cool and look smart with our wide selection of stylish outfits - be it checked shirts and distressed denims, or safari shorts and T-shirts, we have a pair for every season. Shop from leading brands like UCB, Van Heusen, Allen Solly, People, Levi&#039;s, Wrangler, Jack and Jones, Lee, Flying Machine, Pepe, Roadster, Arrow, and more.', '', '', '', '', 9, 0, '2017-05-30 07:00:15', '2017-05-31 11:25:12'),
(56, 0, 'asasdsasadasdsad', '', 'asasdsasadasdsad', 'more', NULL, '', NULL, NULL, NULL, 12, 0, '2017-06-22 07:03:09', '2017-06-22 07:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `category_banner`
--

CREATE TABLE `category_banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_desc` varchar(500) DEFAULT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_url` varchar(255) DEFAULT NULL,
  `banner_position` varchar(50) NOT NULL DEFAULT '0',
  `banner_order` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_banner`
--

INSERT INTO `category_banner` (`id`, `category_id`, `banner_title`, `banner_desc`, `banner_image`, `banner_url`, `banner_position`, `banner_order`, `created_at`, `updated_at`) VALUES
(5, 39, 'banner4', NULL, 'MO77H-block1-home7.jpg', '#', 'top', NULL, '2017-05-30 00:38:52', '2017-06-11 23:34:03'),
(10, 42, 'banner1', NULL, 'QsveI-block-home7.jpg', NULL, 'top', NULL, '2017-05-30 00:52:21', '2017-05-30 00:52:21'),
(11, 42, 'asdas', NULL, 'hNxqa-block1-home7.jpg', NULL, 'top', NULL, '2017-05-30 00:53:55', '2017-05-30 00:53:55'),
(12, 28, 'asdfsdf', NULL, '94ePW-06.jpg', NULL, 'top', NULL, '2017-06-08 20:52:41', '2017-06-08 20:52:41'),
(14, 39, 'banner2', NULL, 'EDUYs-example-slide-2.jpg', NULL, 'top', NULL, '2017-06-09 03:09:06', '2017-06-11 23:34:03'),
(15, 39, 'banner3', NULL, 'U9d5q-$_57.jpg', NULL, 'middle', NULL, '2017-06-09 03:09:06', '2017-06-09 03:09:26'),
(16, 39, 'banner4', NULL, 'ELToc-example-slide-4.jpg', NULL, 'top', NULL, '2017-06-11 23:34:03', '2017-06-11 23:34:03'),
(17, 39, 'banner4', NULL, 'sQno5-block-home7.jpg', NULL, 'top', NULL, '2017-06-11 23:34:03', '2017-06-11 23:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(24, 25),
(23, 28),
(32, 28),
(33, 28),
(20, 34),
(23, 34),
(32, 34),
(32, 36),
(33, 36),
(34, 36),
(32, 38),
(33, 38),
(34, 38),
(34, 41),
(18, 6),
(24, 6),
(25, 6),
(26, 6),
(27, 6),
(28, 6),
(33, 7),
(33, 17),
(19, 18),
(19, 22),
(42, 4),
(42, 5),
(42, 24),
(43, 24),
(42, 23),
(43, 23),
(41, 23),
(41, 3),
(41, 7),
(40, 20),
(39, 2),
(42, 2),
(24, 2),
(39, 25),
(40, 25),
(39, 26),
(40, 26),
(25, 2),
(26, 2),
(39, 29),
(39, 32),
(42, 32),
(24, 32),
(25, 32),
(26, 32),
(27, 32),
(28, 32),
(43, 32),
(44, 32),
(45, 32),
(46, 32),
(40, 32),
(32, 32),
(47, 32),
(48, 32),
(39, 34);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8_unicode_ci,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `misc_javascript` text COLLATE utf8_unicode_ci,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT '#',
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT '#',
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT '#',
  `google_plus` varchar(255) COLLATE utf8_unicode_ci DEFAULT '#',
  `pinterest` varchar(255) COLLATE utf8_unicode_ci DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `title`, `tagline`, `meta_title`, `meta_desc`, `meta_keyword`, `misc_javascript`, `email`, `logo`, `favicon`, `created_at`, `updated_at`, `facebook`, `twitter`, `youtube`, `google_plus`, `pinterest`) VALUES
(8, 'Karmastha', 'Best Ecommerce site in Nepal', 'Karmastha', 'All in one', 'ecommerce, karmastha', '<script type="text/javascript" src=""></script>', 'yojan@3hammers.com', '6bYH4-g95Df-Karmastha_Logo.png', 'xoiY3-k-favicon.png', '2017-05-27 20:42:43', '2017-06-15 19:39:33', NULL, NULL, NULL, 'https://plus.google.com/#', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assets` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `type_id`, `user_id`, `entity_id`, `icon`, `class`, `text`, `assets`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 'plus', 'bg-green', 'trans("history.backend.users.created") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","pradeep",5]}', '2017-05-03 05:44:24', '2017-05-03 05:44:24'),
(2, 1, 1, 6, 'plus', 'bg-green', 'trans("history.backend.users.created") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","test",6]}', '2017-05-16 20:31:25', '2017-05-16 20:31:25'),
(3, 1, 1, 6, 'save', 'bg-aqua', 'trans("history.backend.users.updated") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","test",6]}', '2017-06-15 00:40:37', '2017-06-15 00:40:37'),
(4, 2, 1, 4, 'plus', 'bg-green', 'trans("history.backend.roles.created") <strong>Vendor</strong>', NULL, '2017-06-16 06:04:53', '2017-06-16 06:04:53'),
(5, 2, 1, 5, 'plus', 'bg-green', 'trans("history.backend.roles.created") <strong>Customer</strong>', NULL, '2017-06-16 06:10:55', '2017-06-16 06:10:55'),
(6, 2, 1, 6, 'plus', 'bg-green', 'trans("history.backend.roles.created") <strong>Wholesaler</strong>', NULL, '2017-06-16 06:11:18', '2017-06-16 06:11:18'),
(7, 1, 1, 7, 'plus', 'bg-green', 'trans("history.backend.users.created") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","yojan",7]}', '2017-06-16 06:13:57', '2017-06-16 06:13:57'),
(8, 2, 1, 7, 'plus', 'bg-green', 'trans("history.backend.roles.created") <strong>testa</strong>', NULL, '2017-06-18 08:49:38', '2017-06-18 08:49:38'),
(9, 2, 1, 7, 'trash', 'bg-maroon', 'trans("history.backend.roles.deleted") <strong>testa</strong>', NULL, '2017-06-18 19:51:04', '2017-06-18 19:51:04'),
(10, 1, 1, 41, 'plus', 'bg-green', 'trans("history.backend.users.created") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","asdfasdfsadf",41]}', '2017-07-06 03:40:13', '2017-07-06 03:40:13'),
(11, 1, 1, 42, 'plus', 'bg-green', 'trans("history.backend.users.created") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","asdfasdfsdf",42]}', '2017-07-06 03:47:41', '2017-07-06 03:47:41'),
(12, 2, 1, 7, 'plus', 'bg-green', 'trans("history.backend.roles.created") <strong>test</strong>', NULL, '2017-07-06 03:50:06', '2017-07-06 03:50:06'),
(13, 2, 1, 7, 'save', 'bg-aqua', 'trans("history.backend.roles.updated") <strong>test</strong>', NULL, '2017-07-06 03:50:19', '2017-07-06 03:50:19'),
(14, 2, 1, 7, 'trash', 'bg-maroon', 'trans("history.backend.roles.deleted") <strong>test</strong>', NULL, '2017-07-06 03:50:28', '2017-07-06 03:50:28'),
(15, 1, 1, 13, 'trash', 'bg-maroon', 'trans("history.backend.users.deleted") <strong>{user}</strong>', '{"user_link":["admin.access.user.show","fname lname",13]}', '2017-07-06 03:58:15', '2017-07-06 03:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `history_types`
--

CREATE TABLE `history_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_types`
--

INSERT INTO `history_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', '2017-04-18 01:44:05', '2017-04-18 01:44:05'),
(2, 'Role', '2017-04-18 01:44:05', '2017-04-18 01:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `url` varchar(50) NOT NULL,
  `m_order` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `Name`, `logo`, `url`, `m_order`, `status`, `created_at`, `updated_at`) VALUES
(14, 'Red Bull', 'images/member_logo/14956140761.jpg', 'www.redbull.com', 2, 0, '2017-05-24 02:36:16', '2017-06-16 02:10:56'),
(15, 'LG', 'images/member_logo/14956146122.jpg', 'www.lg.com', 2, 0, '2017-05-24 02:45:12', '2017-06-16 02:11:02'),
(16, 'elvi''s', 'images/member_logo/14956146483.jpg', 'www.elvi.com', 2, 0, '2017-05-24 02:45:48', '2017-05-24 02:45:48'),
(17, 'samsung', 'images/member_logo/14956146794.png', 'www.samsung.com', 3, 0, '2017-05-24 02:46:19', '2017-05-24 02:46:19'),
(18, 'micromax', 'images/member_logo/14956147195.jpg', 'www.micromax.com', 4, 0, '2017-05-24 02:46:59', '2017-05-24 02:46:59'),
(19, 'addidas', 'images/member_logo/14956147526.png', 'www.addidas.com', 2, 1, '2017-05-24 02:47:32', '2017-06-16 02:12:41'),
(20, 'norweigian', 'images/member_logo/14956147947.jpg', 'www.norweigian.com', 2, 1, '2017-05-24 02:48:14', '2017-06-16 02:12:46'),
(21, 'fresh', 'images/member_logo/14956148338.png', 'www.fresh.com', 8, 1, '2017-05-24 02:48:53', '2017-05-24 02:49:05'),
(22, 'Apple', 'images/member_logo/14957028851495699357apple.png', 'apple', 2, 1, '2017-05-25 03:16:25', '2017-06-16 02:12:49'),
(23, 'ff', 'images/member_logo/1495714618ford.png', 'gg', 0, 0, '2017-05-25 06:31:58', '2017-05-25 06:31:58'),
(24, 'Broadway Financial Advisory solution', 'images/member_logo/1497599807Broadway Financial Advisory solution Logo.jpg', '#', 1, 1, '2017-06-16 02:09:51', '2017-06-16 02:11:47'),
(25, 'Arc Media', 'images/member_logo/1497599709Arc Media Logo.jpg', '#', 0, 1, '2017-06-16 02:10:09', '2017-06-16 02:10:09'),
(26, 'Cinqsnipe Technology', 'images/member_logo/1497599744cinqsnipe.jpg', '#', 0, 1, '2017-06-16 02:10:44', '2017-06-16 02:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_12_28_171741_create_social_logins_table', 1),
(4, '2015_12_29_015055_setup_access_tables', 1),
(5, '2016_07_03_062439_create_history_tables', 1),
(6, '2017_04_04_131153_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider` tinyint(1) NOT NULL DEFAULT '0',
  `slider_identifier` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8_unicode_ci,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `top_content` longtext COLLATE utf8_unicode_ci,
  `bottom_content` longtext COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `slider`, `slider_identifier`, `meta_title`, `meta_desc`, `meta_keyword`, `top_content`, `bottom_content`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 1, 'WUFneHUr2s', NULL, NULL, NULL, '{!! hot_products(''Hot Products'') !!} <!-- Start middle banner -->\r\n<div class="mid-add-banner">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-12 col-sm-12 col-item-banner"><img src="/karmastha/public/front-images/add-banner/oneplus_mid.jpg" alt="" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- End middle banner --> {!! featured_products(''Featured Products'') !!}', '<div id="doingbusiness" class="doing-business">\r\n<section class="story-approach">\r\n<h4 class="title text-center">doing business on karmastha is really easy</h4>\r\n<div id="business-slider" class="business-carousal">\r\n<div class="business-outer">\r\n<div class="business-wrapper clearfix">\r\n<div class="item-wrapper">\r\n<div class="item">\r\n<div class="business-content list-content">\r\n<h3>Step 1</h3>\r\n<h2>List your products</h2>\r\n<p>Uploading your products is really simple through our self-serve tool. We also help you put together an attractive catalog by connecting you with industry experts.</p>\r\n<div class="cards">\r\n<div class="card-desc">\r\n<div class="card-img-holder"> </div>\r\n<div class="card-cont">\r\n<p>Easy to use<br />self-serve portal</p>\r\n</div>\r\n</div>\r\n<div class="card-desc">\r\n<div class="card-img-holder"> </div>\r\n<div class="card-cont">\r\n<p>Catalog &amp; photo-shoot<br />partners across India</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="item-wrapper">\r\n<div class="item">\r\n<div class="business-content sell-content">\r\n<h3>Step 2</h3>\r\n<h2>Sell across India</h2>\r\n<p>Maximise your online sales; attract more buyers and achieve higher conversion rates.</p>\r\n<div class="cards">\r\n<div class="card-desc">\r\n<div class="card-img-holder"> </div>\r\n<div class="card-cont">\r\n<p>Easy<br />dashboard</p>\r\n</div>\r\n</div>\r\n<div class="card-desc">\r\n<div class="card-img-holder"> </div>\r\n<div class="card-cont">\r\n<p>Promotions<br />and advertising</p>\r\n</div>\r\n</div>\r\n<div class="card-desc third-card">\r\n<div class="card-img-holder"> </div>\r\n<div class="card-cont">\r\n<p>Analytics<br />support</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="item-wrapper">\r\n<div class="item">\r\n<div class="business-content sell-content">\r\n<h3>Step 3</h3>\r\n<h2>Ship with ease</h2>\r\n<p>Enjoy hassle-free pick-up and delivery across India through our logistics services and sell across the nation!</p>\r\n<div class="cards">\r\n<div class="card-desc">\r\n<div class="card-img-holder"> </div>\r\n<div class="card-cont">\r\n<p>Dedicated<br />pick-up service</p>\r\n</div>\r\n</div>\r\n<div class="card-desc">\r\n<div class="card-img-holder"> </div>\r\n<div class="card-cont">\r\n<p>Packaging support</p>\r\n</div>\r\n</div>\r\n<div class="card-desc third-card">\r\n<div class="card-img-holder"> </div>\r\n<div class="card-cont">\r\n<p>Pan-India reach</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="item-wrapper">\r\n<div class="item">\r\n<div class="business-content sell-content">\r\n<h3>Step 4</h3>\r\n<h2>Earn big</h2>\r\n<p>Make use of the host of services that we offer and earn more. Our payments process is the fastest in the industry - get your payments within 7-14 days of sales!</p>\r\n<div class="cards">\r\n<div class="card-desc">\r\n<div class="card-img-holder"> </div>\r\n<div class="card-cont">\r\n<p>Fastest payments settlements<br />in the industry</p>\r\n</div>\r\n</div>\r\n<div class="card-desc">\r\n<div class="card-img-holder"> </div>\r\n<div class="card-cont">\r\n<p>Lending partner<br />network</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="item-wrapper">\r\n<div class="item form-item">\r\n<div class="start-selling-form">\r\n<h2>Start Selling</h2>\r\n<form class="slp_seller_form" accept-charset="UTF-8" action="/" method="post">\r\n<div>\r\n<div class="form-type-textfield form-item-email form-item form-group"><input id="useremail" class="form-control form-text required" name="email" type="text" placeholder="Email ID" /></div>\r\n<div class="form-type-textfield form-item-phone form-item form-group"><input id="userphone" class="form-control form-text required" name="phone" type="text" placeholder="Phone Number" /></div>\r\n</div>\r\n</form>\r\n<div class="clearfix">\r\n<div class="left left-block">\r\n<p>More Than</p>\r\n<h3>1,00,000</h3>\r\n<p>Online Sellers</p>\r\n<a class="link-to" href="/slp/slp-categories/success-stories">Read Success Stories</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n</div>', NULL, 1, '2017-05-25 20:20:55', '2017-06-04 19:06:12'),
(53, 'tommorrow', 'tommorrow', 1, NULL, '', '', '', 'as dfasd fads f<br />asd fsad fsda<br />f<br />asd fsad fdsf', NULL, '1478603612_writing.jpg', 1, '2016-11-08 05:28:32', '2016-11-08 05:28:32'),
(56, 'page', 'page', 0, NULL, NULL, NULL, NULL, 'asd', NULL, '', 1, '2016-12-20 01:47:46', '2017-05-02 04:41:36'),
(57, 'seo', 'seo', 0, NULL, '', '', '', 'seo', NULL, '', 0, '2016-12-29 02:15:12', '2016-12-29 02:15:12'),
(60, 'about us testing2', 'about-us-1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2017-04-24 20:44:09', '2017-05-02 04:42:57'),
(61, 'asdfsdfasd', 'asdfsdfasd', 0, NULL, NULL, NULL, NULL, 'fasdfasf', NULL, NULL, 0, '2017-05-18 06:14:42', '2017-05-18 06:14:42'),
(62, 'asdfsdfasd', 'asdfsdfasd-1', 0, '5555', NULL, NULL, NULL, 'asdfsdf', NULL, NULL, 0, '2017-05-28 08:30:32', '2017-05-28 08:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'view-backend', 'View Backend', 1, '2017-04-18 01:44:04', '2017-04-18 01:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `short_desc` text,
  `detail` text,
  `return_policy` text,
  `offer` text,
  `release_note` text,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `hot` tinyint(1) NOT NULL DEFAULT '0',
  `tags` varchar(255) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` text,
  `meta_desc` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `sku`, `brand_id`, `short_desc`, `detail`, `return_policy`, `offer`, `release_note`, `featured`, `hot`, `tags`, `meta_title`, `meta_keyword`, `meta_desc`, `status`, `created_at`, `updated_at`) VALUES
(2, 'demo1', 'demo1', 'demo', 6, '<p>Detail: There are many variations of passages of Lorem Ipsum available, but the majo Rity have be suffered alteration in some form, by injected humou or randomis Rity have be suffered alteration in some form, by injected humou or randomis words which donot look even slightly believable. If you are going to use a passage Lorem Ipsum.</p>', '<span>general</span>\r\n<ul class="specifical">\r\n<li class="specify-heading"><span>Specifications</span> <span>Galaxy S8 Specs</span></li>\r\n<li><span>Camera Features</span> <span>Optical image stabilization, geo tagging, facial recognition, HDR, auto laser focus</span></li>\r\n<li><span>Camera – Front</span> <span>9.0 Megapixels</span></li>\r\n<li><span>Camera – Rear</span> <span>30 Megapixels</span></li>\r\n<li><span>Colors</span> <span>Black, blue, gold, and white</span></li>\r\n<li><span>Features</span> <span>Corning Gorilla Glass 5, 4G LTE, Bluetooth 5.0, fingerprint scanner, <a href="#">retina eye scanner</a>, wireless charging, rapid charging, mini projector</span></li>\r\n<li><span>Operating System</span> <span>Current Android operating system 2017</span></li>\r\n<li><span>Processor</span> <span> Snapdragon Qualcomm octa-core 3.2 GHz processor</span></li>\r\n<li><span>RAM</span> <span>6 GB RAM</span></li>\r\n<li><span>Release Date</span> <span>April 2017 – See Below</span></li>\r\n<li><span>Screen Display</span> <span> <a href="#"> 5.2” 4K display with a 4096 x 2160 screen resolution </a></span></li>\r\n</ul>', '<p>Return policy - There are many variations of passages of Lorem Ipsum available, but the majo Rity have be suffered alteration in some form, by injected humou or randomis Rity have be suffered alteration in some form, by injected humou or randomis words which donot look even slightly believable. If you are going to use a passage Lorem Ipsum.</p>', '<p>Best offer</p>\r\n<ul>\r\n<li>no cost: Emi from ###</li>\r\n<li>return in 3 days</li>\r\n<li>discount offer</li>\r\n</ul>', '<p>released on <span>2017-08-12</span>saturday. <span>pre order open now!</span></p>', 1, 0, 'test, product', NULL, NULL, NULL, 1, '2017-05-11 23:59:26', '2017-06-05 02:04:04'),
(3, 'demo2', 'demo2', 'demo2', NULL, 'asdfasfda', 'asfdbvbvcb', NULL, 'vcxbvb bb cvx bvc', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, '2017-05-12 00:01:58', '2017-05-28 23:15:40'),
(4, 'rtrtrtrtr', 'rtrtrtrtr', 'asdfasdf', NULL, 'asdf', 'asdfsadf', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, 1, '2017-05-12 04:08:50', '2017-05-28 10:57:53'),
(5, 'asdfadsf', 'asdfadsf', 'asdf', NULL, 'asdfsdf', 'asdfasdfsdf', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 1, '2017-05-12 04:47:17', '2017-05-28 10:58:31'),
(6, 'eeeeeee', 'eeeeeee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, '2017-05-13 12:03:06', '2017-05-13 12:03:06'),
(7, 'asdf33', 'asdf', 'adfs', NULL, 'asdfasfdsadf', 'asdfasdf', NULL, NULL, NULL, 1, 0, NULL, 'asdf33', 'asdf', 'adsf', 1, '2017-05-13 12:33:00', '2017-05-28 23:17:21'),
(8, 'asdfasdf', 'asdfasdf', 'asdfdsf', NULL, 'ererere e e rere er ere re', 'aasdf ads fasd fasd fdsa', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, '2017-05-17 05:52:09', '2017-05-17 05:53:03'),
(17, 'hgghgh', 'hgghgh', 'ghgh', NULL, 'ghgh', 'ghgh', NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 1, '2017-05-17 19:38:28', '2017-05-17 19:38:28'),
(18, 'ytuyuyuyu', 'ytuyuyuyu', 'tyu', NULL, 'tyur', 'yu', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, '2017-05-17 23:50:01', '2017-05-17 23:50:01'),
(20, 'sdfgsdfg', 'sdfgsdfg', 'sdfgsdf', NULL, 'sdfg', 'sdfgsdfg', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, '2017-05-18 01:57:41', '2017-05-18 01:57:41'),
(21, 'asdfasdf', 'asdfasdf-1', 'asdf', NULL, 'asdf', 'asdf', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, '2017-05-19 03:53:40', '2017-05-19 03:53:40'),
(22, 'safsadf', 'safsadf', 'asdfasdf', NULL, 'asdfasdfasdf', 'asdfafasdfasdf', NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, 0, '2017-05-19 03:54:26', '2017-05-19 03:54:26'),
(23, 'adsff', 'adsff', 'ere', NULL, 'adsf', 'asdf', NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 1, '2017-05-19 04:01:15', '2017-05-19 04:01:15'),
(24, 'asdf', 'asdf-1', 'asdf', NULL, 'asdfas', 'asdfsdf', NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 1, '2017-05-22 02:21:07', '2017-05-22 02:21:07'),
(25, 'product', 'product', 'product', 6, 'asdf asd fds', 'asd fsad fds', 'return policy', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, '2017-06-05 00:58:25', '2017-06-05 00:58:51'),
(26, 'gghghghg', 'ghgh', 'ghghg', 7, 'ghgh', 'ghgh', 'ghgh', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, '2017-06-05 02:05:39', '2017-06-05 02:06:06'),
(29, 'kjkjj', 'kjkjk', 'kjk', 7, 'asdfa', 'asdf', 'asdf', 'asdf', 'asdf', 0, 0, NULL, NULL, NULL, NULL, 0, '2017-07-14 05:14:56', '2017-07-14 05:14:56'),
(32, 'name', 'slug', 'sku', 6, 'asdf', 'asdf', 'asdf', NULL, NULL, 0, 0, 'tags', 'meta_title', 'meta_keyword', 'meta_desc', 0, '2017-07-16 18:09:48', '2017-07-16 18:09:48'),
(34, 'asdf', 'asdf-2', 'asdf', 8, 'asdf', 'sdf', 'asdf', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, '2017-07-16 18:33:05', '2017-07-16 18:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_attr_combination`
--

CREATE TABLE `product_attr_combination` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `identifier` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_attr_combination`
--

INSERT INTO `product_attr_combination` (`id`, `product_id`, `identifier`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 29, 'identifier1', 5, '2017-07-14 05:14:56', '2017-07-14 05:14:56'),
(2, 29, 'identifier2', 10, '2017-07-14 05:14:57', '2017-07-14 05:14:57'),
(5, 32, 'identifier[]', 44, '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(6, 32, 'ttt', 42, '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(7, 34, 'asdf', 33, '2017-07-16 18:33:06', '2017-07-16 18:33:06'),
(8, 34, 'rtrtrtr', 23, '2017-07-16 18:33:06', '2017-07-16 18:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_attr_combination_value`
--

CREATE TABLE `product_attr_combination_value` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_attr_combination_id` int(10) UNSIGNED NOT NULL,
  `attribute_value_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_attr_combination_value`
--

INSERT INTO `product_attr_combination_value` (`id`, `product_attr_combination_id`, `attribute_value_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2017-07-14 05:14:56', '2017-07-14 05:14:56'),
(2, 1, 7, '2017-07-14 05:14:56', '2017-07-14 05:14:56'),
(3, 1, 8, '2017-07-14 05:14:56', '2017-07-14 05:14:56'),
(4, 1, 5, '2017-07-14 05:14:57', '2017-07-14 05:14:57'),
(5, 2, 4, '2017-07-14 05:14:57', '2017-07-14 05:14:57'),
(6, 2, 7, '2017-07-14 05:14:57', '2017-07-14 05:14:57'),
(7, 2, 8, '2017-07-14 05:14:57', '2017-07-14 05:14:57'),
(8, 2, 5, '2017-07-14 05:14:57', '2017-07-14 05:14:57'),
(13, 5, 7, '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(14, 5, 4, '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(15, 5, 5, '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(16, 5, 8, '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(17, 6, 7, '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(18, 6, 4, '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(19, 6, 5, '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(20, 6, 8, '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(21, 7, 5, '2017-07-16 18:33:06', '2017-07-16 18:33:06'),
(22, 7, 7, '2017-07-16 18:33:06', '2017-07-16 18:33:06'),
(23, 8, 7, '2017-07-16 18:33:06', '2017-07-16 18:33:06'),
(24, 8, 6, '2017-07-16 18:33:06', '2017-07-16 18:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `caption` varchar(500) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `image_order` int(10) DEFAULT '0',
  `base_image` tinyint(1) DEFAULT '0',
  `small_image` tinyint(1) DEFAULT '0',
  `thumbnail` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `product_id`, `caption`, `image`, `image_order`, `base_image`, `small_image`, `thumbnail`, `created_at`, `updated_at`) VALUES
(3, 3, NULL, 'DF2nY6rGE1-Happy-Valentines-Day-images-2.jpg', 1, 0, 0, 0, '2017-05-12 00:01:58', '2017-05-28 23:15:40'),
(5, 4, NULL, 'eD5zcj1EqI-02.jpg', 0, 0, 0, 0, '2017-05-12 04:08:52', '2017-05-28 23:16:01'),
(6, 4, NULL, 'Unv5AelJat-06.jpg', 0, 0, 0, 0, '2017-05-12 04:08:52', '2017-05-12 04:08:52'),
(10, 6, NULL, 'nrNFQBcSJe-1.jpg', 0, 0, 0, 0, '2017-05-13 12:03:08', '2017-05-13 12:03:08'),
(11, 6, NULL, '9lSZqb7AFK-02.jpg', 1, 0, 0, 0, '2017-05-13 12:03:09', '2017-05-13 12:03:09'),
(12, 6, NULL, 'qtdbRbogrR-2.jpg', 2, 0, 0, 0, '2017-05-13 12:03:09', '2017-05-13 12:03:09'),
(13, 6, NULL, 'E6tJgycJJU-4.jpg', 2, 0, 0, 0, '2017-05-13 12:03:09', '2017-05-13 12:03:09'),
(14, 6, NULL, 'cKxKgHIgoJ-5.jpg', 2, 0, 0, 0, '2017-05-13 12:03:10', '2017-05-13 12:03:10'),
(15, 6, NULL, 'wS2uSSNpKG-06.jpg', 0, 0, 0, 0, '2017-05-13 12:03:10', '2017-05-13 12:03:10'),
(16, 6, NULL, 'SS99n5rK3Q-1476706702_13221541_276706619332933_1405407240907624486_n - Copy.jpg', 1, 0, 0, 0, '2017-05-13 12:03:10', '2017-05-13 12:03:10'),
(17, 6, NULL, 'TWq4Wl43ig-abroad-study-australia.jpg', 2, 0, 0, 0, '2017-05-13 12:03:10', '2017-05-13 12:03:10'),
(18, 6, NULL, 'QYPaoa4SGY-abroad-study-new-zealand.jpg', 0, 0, 0, 0, '2017-05-13 12:03:10', '2017-05-13 12:03:10'),
(26, 7, NULL, 'mQV9VdPvt5-avatar04.png', 0, 0, 0, 1, '2017-05-14 08:29:45', '2017-05-28 23:17:21'),
(35, 20, NULL, 'uurDCO2tc1-02.jpg', 0, 0, 0, 0, '2017-05-18 01:57:43', '2017-05-18 01:57:43'),
(36, 20, NULL, 'zktzeJZEY6-2.jpg', 0, 0, 0, 0, '2017-05-18 01:57:43', '2017-05-18 01:57:43'),
(37, 20, NULL, 'Aj7TDIJfRV-5.jpg', 0, 0, 0, 0, '2017-05-18 01:57:43', '2017-05-18 01:57:43'),
(38, 20, NULL, 'qEV5lrF4pm-06.jpg', 0, 0, 0, 0, '2017-05-18 01:57:44', '2017-05-18 01:57:44'),
(40, 5, NULL, 'bVSv62cou4-avatar5.png', 0, 0, 0, 0, '2017-05-28 10:58:32', '2017-05-28 23:16:31'),
(41, 24, NULL, 'aLwIuaYi0e-4-800x800.jpg', 0, 1, 1, 1, '2017-05-28 23:10:13', '2017-05-28 23:10:13'),
(42, 23, NULL, 'HyoP98kRCp-4-800x800.jpg', 0, 1, 1, 1, '2017-05-28 23:13:37', '2017-05-28 23:13:37'),
(43, 23, NULL, 'pOlsOcNC0q-5.jpg', 0, 1, 1, 1, '2017-05-28 23:13:38', '2017-05-28 23:13:38'),
(44, 23, NULL, 'grxcJXLD6T-7.jpg', 0, 1, 1, 1, '2017-05-28 23:13:38', '2017-05-28 23:13:38'),
(45, 23, NULL, 'rQS8lou8rR-8.jpg', 0, 1, 1, 1, '2017-05-28 23:13:38', '2017-05-28 23:13:38'),
(46, 2, NULL, 'Z8ZaFnqvnF-1.jpg', 0, 1, 0, 0, '2017-05-28 23:14:46', '2017-05-29 00:50:29'),
(47, 2, NULL, 'VvUWu0Hblm-1-800x800.jpg', 1, 1, 1, 1, '2017-05-28 23:14:47', '2017-06-01 01:43:21'),
(48, 3, NULL, 'bUhUVCY0yh-5.jpg', 2, 0, 1, 1, '2017-05-28 23:15:40', '2017-05-28 23:15:40'),
(49, 3, NULL, '2602xy5Iw4-6.jpg', 1, 1, 1, 1, '2017-05-28 23:15:41', '2017-05-28 23:15:41'),
(50, 4, NULL, 'r2IpwoDg4O-4.jpg', 0, 1, 1, 1, '2017-05-28 23:16:01', '2017-06-04 23:10:19'),
(51, 5, NULL, 'XRQz5Dj8bu-11.jpg', 0, 1, 1, 1, '2017-05-28 23:16:31', '2017-05-28 23:16:31'),
(52, 7, NULL, 'bvYnsSlTwJ-11-800x800.jpg', 1, 1, 1, 1, '2017-05-28 23:17:22', '2017-05-28 23:17:22'),
(53, 17, NULL, '63wk2ATDc4-2.jpg', 1, 0, 1, 0, '2017-05-28 23:17:46', '2017-05-28 23:17:46'),
(54, 17, NULL, 'Hx5ZFsqxd9-3.jpg', 2, 1, 1, 1, '2017-05-28 23:17:46', '2017-05-28 23:17:46'),
(55, 2, NULL, 'bj8nCtaozL-6.jpg', 0, 1, 0, 0, '2017-06-01 01:46:52', '2017-06-01 01:46:52'),
(56, 25, NULL, '3weeoj0MAt-5.jpg', 0, 1, 1, 1, '2017-06-05 00:58:26', '2017-06-05 00:58:26'),
(57, 26, NULL, 'q2hCDG82DK-6.jpg', 0, 1, 1, 1, '2017-06-05 02:05:40', '2017-06-05 02:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory`
--

CREATE TABLE `product_inventory` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `manage_stock` tinyint(1) NOT NULL DEFAULT '0',
  `availability` enum('in stock','out of stock') DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_inventory`
--

INSERT INTO `product_inventory` (`id`, `product_id`, `manage_stock`, `availability`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'in stock', 5, '2017-05-11 23:59:26', '2017-06-22 03:49:09'),
(3, 3, 1, 'out of stock', NULL, '2017-05-12 00:01:58', '2017-05-28 23:15:40'),
(4, 4, 1, 'in stock', 45, '2017-05-12 04:08:51', '2017-06-04 23:10:19'),
(5, 5, 1, 'in stock', NULL, '2017-05-12 04:47:17', '2017-05-28 23:16:31'),
(6, 6, 1, 'in stock', 54, '2017-05-13 12:03:07', '2017-05-13 12:03:07'),
(7, 7, 1, 'in stock', 200, '2017-05-13 12:33:00', '2017-05-28 23:17:21'),
(8, 8, 0, 'in stock', NULL, '2017-05-17 05:52:09', '2017-05-17 05:53:03'),
(17, 17, 0, 'in stock', NULL, '2017-05-17 19:38:28', '2017-05-28 23:17:45'),
(18, 18, 0, 'in stock', NULL, '2017-05-17 23:50:01', '2017-05-17 23:50:01'),
(20, 20, 0, 'in stock', NULL, '2017-05-18 01:57:41', '2017-06-01 19:35:19'),
(21, 21, 0, 'in stock', NULL, '2017-05-19 03:53:40', '2017-05-19 03:53:40'),
(22, 22, 0, 'in stock', NULL, '2017-05-19 03:54:26', '2017-05-19 03:54:26'),
(23, 23, 0, 'in stock', NULL, '2017-05-19 04:01:15', '2017-05-28 23:13:37'),
(24, 24, 0, 'in stock', NULL, '2017-05-22 02:21:07', '2017-05-28 23:10:12'),
(25, 25, 0, 'in stock', NULL, '2017-06-05 00:58:25', '2017-06-05 00:58:51'),
(26, 26, 0, 'in stock', NULL, '2017-06-05 02:05:39', '2017-06-05 02:06:06'),
(27, 29, 0, 'in stock', NULL, '2017-07-14 05:14:56', '2017-07-14 05:14:56'),
(30, 32, 0, 'in stock', 0, '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(32, 34, 1, 'in stock', 3, '2017-07-16 18:33:05', '2017-07-16 18:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE `product_price` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `special_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`id`, `product_id`, `price`, `special_price`, `created_at`, `updated_at`) VALUES
(2, 2, '50.24', '25.24', '2017-05-11 23:59:26', '2017-06-22 03:49:09'),
(3, 3, '99.00', '89.00', '2017-05-12 00:01:58', '2017-05-28 23:15:40'),
(4, 4, '545.00', NULL, '2017-05-12 04:08:50', '2017-06-04 23:10:19'),
(5, 5, '3434.00', NULL, '2017-05-12 04:47:17', '2017-05-28 23:16:31'),
(6, 6, '23.00', NULL, '2017-05-13 12:03:06', '2017-05-13 12:03:06'),
(7, 7, '34.00', NULL, '2017-05-13 12:33:00', '2017-05-28 23:17:21'),
(8, 8, '3434.00', NULL, '2017-05-17 05:52:09', '2017-05-17 05:53:03'),
(17, 17, '44.00', NULL, '2017-05-17 19:38:28', '2017-05-28 23:17:45'),
(18, 18, '56.00', NULL, '2017-05-17 23:50:01', '2017-05-17 23:50:01'),
(20, 20, '43.00', NULL, '2017-05-18 01:57:41', '2017-06-01 19:35:19'),
(21, 21, '23.00', NULL, '2017-05-19 03:53:40', '2017-05-19 03:53:40'),
(22, 22, '343.00', NULL, '2017-05-19 03:54:26', '2017-05-19 03:54:26'),
(23, 23, '34.00', NULL, '2017-05-19 04:01:15', '2017-05-28 23:13:37'),
(24, 24, '343.00', NULL, '2017-05-22 02:21:07', '2017-05-28 23:10:12'),
(25, 25, '45.00', NULL, '2017-06-05 00:58:25', '2017-06-05 00:58:51'),
(26, 26, '555.00', NULL, '2017-06-05 02:05:39', '2017-06-05 02:06:06'),
(29, 29, '21.00', '212.00', '2017-07-14 05:14:56', '2017-07-14 05:14:56'),
(32, 32, '0.00', '0.00', '2017-07-16 18:09:49', '2017-07-16 18:09:49'),
(34, 34, '2332.00', NULL, '2017-07-16 18:33:05', '2017-07-16 18:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `fname`, `lname`, `phone`, `created_at`, `updated_at`) VALUES
(2, 10, 'test', 'lname', '9898989898', '2017-06-26 01:21:13', '2017-06-26 01:21:13'),
(3, 11, 'fname', 'lname', '989898988', '2017-06-26 01:25:46', '2017-06-26 01:25:46'),
(4, 12, 'asfd', 'cxvczxv', 'asdfsdfsfsdf', '2017-06-26 01:30:51', '2017-06-26 01:30:51'),
(5, 13, 'fname', 'lname', '9898989898', '2017-06-26 01:32:29', '2017-06-26 01:32:29'),
(6, 14, 'asdfsadf', 'weerwerewr', '9898989898', '2017-06-26 01:41:34', '2017-06-26 01:41:34'),
(7, 15, 'asdfsadf', 'zxcvzxcv', 'asdfasdfsdf', '2017-06-26 01:43:03', '2017-06-26 01:43:03'),
(8, 16, 'asdf', 'asfsdf', '9898989898', '2017-06-26 01:46:53', '2017-06-26 01:46:53'),
(9, 17, 'asdf', 'weewr', 'asdfasdfsdf', '2017-06-26 23:39:48', '2017-06-26 23:39:48'),
(10, 18, 'asdfdsf', 'werewrewr', 'asdfasdf', '2017-06-26 23:41:33', '2017-06-26 23:41:33'),
(11, 19, 'asdfsdaf', 'wewew', 'asdfsdf', '2017-06-26 23:55:30', '2017-06-26 23:55:30'),
(12, 20, 'adf', 'eeee', 'asdfasdf', '2017-06-26 23:58:44', '2017-06-26 23:58:44'),
(13, 21, 'fname', 'lname', '545445454', '2017-06-27 00:00:08', '2017-06-27 00:00:08'),
(14, 22, 'erererere', 'klklklklk', '89898989898', '2017-06-27 00:00:46', '2017-06-27 00:00:46'),
(15, 23, 'fname', 'lname', 'kjkjkjj', '2017-06-27 00:01:33', '2017-06-27 00:01:33'),
(16, 24, 'fname', 'lname', 'kjjkkjjkjkj', '2017-06-27 00:02:16', '2017-06-27 00:02:16'),
(17, 25, 'fname', 'lanme', '87878787', '2017-06-27 00:03:45', '2017-06-27 00:03:45'),
(18, 26, 'sdsdsd', 'wewewe', '989898989', '2017-06-27 00:09:57', '2017-06-27 00:09:57'),
(19, 27, 'testfname', 'testlname', '9898989898', '2017-06-27 00:10:51', '2017-06-27 00:10:51'),
(20, 28, 'aksdjfkj', 'kjkkjjk', 'jkjkjkj', '2017-06-27 00:23:45', '2017-06-27 00:23:45'),
(21, 29, 'kjkjkjkj', 'kkjkj', '454545', '2017-06-27 00:25:04', '2017-06-27 00:25:04'),
(22, 30, 'testfname', 'testlname', '9898989898', '2017-06-27 00:25:44', '2017-06-27 00:25:44'),
(23, 31, 'asdf', 'fasdf', 'asdfasdfdsf', '2017-06-27 03:51:14', '2017-06-27 03:51:14'),
(24, 32, 'asdfs', 'fasfsafsd', 'adsfasdf', '2017-06-27 03:55:17', '2017-06-27 03:55:17'),
(25, 33, 'asdf', 'asdf', 'asdfsdf', '2017-06-27 04:18:42', '2017-06-27 04:18:42'),
(26, 34, 'klasdfjasdf', 'faklsdfjl', 'laksdjf', '2017-06-27 04:19:41', '2017-06-27 04:19:41'),
(27, 35, 'asdfasdfds', 'fasdfasdfds', 'fasdfasdfdsf', '2017-06-27 04:20:35', '2017-06-27 04:20:35'),
(28, 36, 'asdf', 'asdflast', 'asdfasdfsdf4', '2017-06-27 04:23:48', '2017-06-27 04:23:48'),
(29, 37, 'sajina', 'makaju', '9898989898', '2017-06-27 04:35:18', '2017-06-27 04:35:18'),
(30, 38, 'yojan', 'shrestha', '98410295421', '2017-06-27 04:51:56', '2017-06-27 04:51:56'),
(31, 39, 'yojan', 'shrestah', '98410024125', '2017-06-27 04:58:59', '2017-06-27 04:58:59'),
(32, 40, 'aklsdfj', 'lakdsjf', 'akjsdklfjaklsdjf', '2017-06-27 05:00:35', '2017-06-27 05:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `all`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 1, 1, '2017-04-18 01:44:01', '2017-04-18 01:44:01'),
(2, 'Executive', 0, 2, '2017-04-18 01:44:01', '2017-04-18 01:44:01'),
(3, 'User', 0, 3, '2017-04-18 01:44:01', '2017-04-18 01:44:01'),
(4, 'Vendor', 0, 4, '2017-06-16 06:04:53', '2017-06-16 06:04:53'),
(5, 'Customer', 0, 5, '2017-06-16 06:10:55', '2017-06-16 06:10:55'),
(6, 'Wholesaler', 0, 4, '2017-06-16 06:11:18', '2017-06-16 06:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(5, 5, 1),
(7, 6, 3),
(8, 7, 5),
(9, 10, 5),
(10, 11, 5),
(11, 12, 5),
(12, 13, 5),
(13, 14, 5),
(14, 15, 5),
(15, 16, 4),
(16, 17, 5),
(17, 18, 5),
(18, 19, 5),
(19, 20, 5),
(20, 21, 5),
(21, 22, 5),
(22, 23, 5),
(23, 24, 5),
(24, 25, 5),
(25, 26, 5),
(26, 27, 5),
(27, 28, 5),
(28, 29, 5),
(29, 30, 5),
(30, 31, 5),
(31, 32, 5),
(32, 33, 5),
(33, 34, 5),
(34, 35, 5),
(35, 36, 5),
(36, 37, 5),
(37, 38, 5),
(38, 39, 5),
(39, 40, 5),
(40, 41, 5),
(41, 42, 3),
(42, 42, 6),
(43, 42, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4xglXINSZUGZbdEpOVzM49eGoWMyU31qKemMelik', 7, '192.168.0.23', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', 'ZXlKcGRpSTZJa041VG5aQ1lrUjFWbEp4YkZsbVN6aDZPVzFTYzJjOVBTSXNJblpoYkhWbElqb2laVWxGUm5ZemNHcHpXbFZWVm5KTWVEWmtObFJ1UWs1RFNWRm1iV3gxY1dsNU1WWnZaRnd2TlZoUldWSktjR2hOYTFaTFdIRk1PREF3WWpSdWRYaDJNWGdyZDNscWJYUkVWa2xpUVVsek9GQnBjMHQ0Vm1Nd2RXVmpZa05IWWpoR1lqUjZkbUZaVkdkMVJHWmxWekJWUldKVGJVTllkbTUxWWxGT05EVkhSVkY0YlcxUFNtdEtaSFE1VVUwMU5EZzRlRXBVVVRVNFdGQXhaSE42WEM5VFlrbHpSa1J0YVdaamMwSnNkbVZsZUZOWllqZG5hakpQVlRGTVNXbzVRV1ZHTkZvd2FsQTJNMGhPWkZwV1ZFRXdXVkk0U0drd1IwUk9kRkpCV0ZSSFVVeFNUa0ZZVUhkTVVYSlZhblIwVWxFM09GRlhSR0l3UkZjNGMxTlZlRlJwUWxCM1MxRk5abVZ2ZWsxcU1IQnhkV2d6ZG5vMFExRTNRbG8xUlRGbk9FWk1hVXhHYjBOcWNUTTBUMnM0ZDFSUU5XOXlXRFpWWm0weEt6QnFVamQyVEZkb2VEVlRWMnd6VkhCdVdVOUJhamhNZFRoVlNtZDNWbFpLUVdSV2VHWlFSR2hHY210Q2VIQmthRTF2ZVVOUmNUbHRSVE5CYkdnclpUUTJVRWxRT1c0clFUVkpTV3Q0VjFSYVYydFJaRXhCU1dWdU9WQnNTMUpqWmxReFdWaDNOV1l3WVVwVVNXMUJaMHQ2WlZKVlBTSXNJbTFoWXlJNklqSmtNbUV3Tm1Vek9HWTNPR0ZsWXpFM09UUmhNbVZrTnpsaFpUTXdabUpoTjJNMVl6WXdZbVkyWkRsbU5HUXdNakkxTURVek9XVTJZbU13TXpjME16QWlmUT09', 1500351832),
('YpZ15aHOI2REIdvktL01l1Dvx6Ph38xvU2Rgm2XR', 1, '192.168.0.23', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', 'ZXlKcGRpSTZJakVyTTB4YWRucHJUMkZwWjJaaFNVMUxURkZaY25jOVBTSXNJblpoYkhWbElqb2lNMXBwTVZWMmFuTmxSSFZjTHl0RFJFVmxSMFpoWjBwMVFscHhWMVpLVUVOUVVtcGFVRVJ4Y25kelpIaDNibVpjTDFoc2FrWnhUbG81UkdReVpEaGtVbk0zWmpScVRFdElUVXRMZUdoMVEyTjJORkJCY2t4c1ZqTTVVemw0Y3pKa1VYaHViV3hVTlRWM1RHWlpUekJ1Ukdkd2QwazFOa2hUUXpkVFFVSm1hWGR5VVRCbVpWWlJhVWhVZFhrNFFtb3lNbUlyVTBOd1VWVm5VR1kyT0hJeWVFNHphMWxxWWpsblJWTnRUakpWVEVac1hDOW5PVXB1YVdNclpEVkJNVkpyWjJkc1FrMTNVREpMUmpOdldIbFdVR0pWVm5kMVRtNU5OMmh4TUV0b2RtdHVkbEU0VjFCMWFGVkVVbGx6UkdSTFRsSjJYQzl4Tm5KaFpETkpORnd2TkN0NVppdGtUbTl2WkZVMGFWQlhlbGMyVGxaMmJ6aHlaMDVJVmtac1JHTnhkVlYzTkdWbFlXZFBUa3BEUzBWMk1HWkRaRTV5SzFrNVdrOURTV3RPU2pac1dqSlllbTFGWkRWYVpXbzFhMGgxTW5oRmNGaEJNM1JJTVhwMmIydHNUMEpNTjNOY0wxazNSV1U0YVVWRlYxUjRTRFZHWVZOUVlYbFhVRTFySzBGb2JWQkZVRmRTUlhkMWNqWnhUbEZyWm1KMVpHaE5jbmRXWlhWeFNYWkJSbWMwT1ZsSE0yNUxjVE5IVGxKUk1GQjNka1V3Tm10b2JscGFZbXgxYkZNMGJqaHVaVE0zVjJoT2VXVk1ja2hDY0RKNU0zQmhXU3RpWWt0cE4xUnpabFIzYjJkek9YUm5WV05tV1dWcGR6TTFNVTA5SWl3aWJXRmpJam9pT0RrNVlXUmpabU5sT0dNMVl6QmpOR0U0T0dNMVltSTNOMlEwTVdNd056WXhaalJpT1RGaU0ySmxPV0ptWm1ObFptVTNORGxrWldVNVpqVXpOakZqTlNKOQ==', 1500286224);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `group_identifier` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `caption` varchar(500) DEFAULT NULL,
  `Slider_image` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `group_identifier`, `title`, `caption`, `Slider_image`, `link`, `created_at`, `updated_at`) VALUES
(70, '2222', 'Demo', 'demp1', 'images/slides/1494936191scuffedstatic_dark1400x900.jpg', 'demo1', '2017-05-16 06:18:11', '2017-05-16 06:18:26'),
(71, '2222', 'Demo', 'demp2', 'images/slides/1494936192cases.jpg', 'demo2', '2017-05-16 06:18:12', '2017-05-16 06:18:26'),
(75, '2222', 'Demo', NULL, 'images/slides/1494936570Screenshot from 2017-02-10 16-53-13.png', NULL, '2017-05-16 06:24:30', '2017-05-16 06:24:30'),
(76, '2222', 'Demo', NULL, 'images/slides/1494936814Screenshot from 2017-02-10 16-53-13.png', NULL, '2017-05-16 06:28:34', '2017-05-16 06:28:34'),
(77, '2222', 'Demo', NULL, 'images/slides/1494936839cases.jpg', NULL, '2017-05-16 06:28:59', '2017-05-16 06:28:59'),
(80, '3333', 'Laptop', 'laptops', 'images/slides/14956215031.jpg', 'laptops', '2017-05-24 04:40:03', '2017-05-24 04:40:03'),
(81, '3333', 'Laptop', 'laptops', 'images/slides/14956215032.jpg', 'laptops', '2017-05-24 04:40:03', '2017-05-24 04:40:03'),
(83, '3333', 'Laptop', NULL, 'images/slides/14956215924.png', NULL, '2017-05-24 04:41:32', '2017-05-24 04:41:32'),
(85, '4444', 'Phone', NULL, 'images/slides/14956234413.jpg', NULL, '2017-05-24 05:12:21', '2017-05-25 05:06:33'),
(86, '5555', 'Home page slider', 'Home page slider', 'images/slides/14957033812.jpg', NULL, '2017-05-25 03:24:42', '2017-05-25 03:24:42'),
(87, '5555', 'Home page slider', 'Home page slider', 'images/slides/14957033821.jpg', NULL, '2017-05-25 03:24:42', '2017-05-25 03:24:42'),
(88, '5555', 'Home page slider', 'Home page slider', 'images/slides/14957033823.jpg', NULL, '2017-05-25 03:24:42', '2017-05-25 03:24:42'),
(89, '5555', 'Home page slider', 'Home page slider', 'images/slides/14957033824.png', NULL, '2017-05-25 03:24:42', '2017-05-25 03:24:42'),
(90, '5555', 'Home page slider', NULL, 'images/slides/149570434802.jpg', NULL, '2017-05-25 03:40:48', '2017-05-25 03:40:48'),
(91, '4444', 'Phone', NULL, 'images/slides/14957095442.jpg', NULL, '2017-05-25 05:07:24', '2017-05-25 05:07:24'),
(92, 'WUFneHUr2s', 'Home', 'Home page', 'images/slides/14959543732.jpg', NULL, '2017-05-28 01:07:53', '2017-05-28 01:07:53'),
(93, 'WUFneHUr2s', 'Home', 'Home page', 'images/slides/14959543731.jpg', NULL, '2017-05-28 01:07:53', '2017-05-28 01:07:53'),
(94, 'WUFneHUr2s', 'Home', 'Home page', 'images/slides/14959543733.jpg', NULL, '2017-05-28 01:07:53', '2017-05-28 01:07:53'),
(95, 'WUFneHUr2s', 'Home', 'Home page', 'images/slides/14959543744.png', NULL, '2017-05-28 01:07:54', '2017-05-28 01:07:54'),
(96, 'WUFneHUr2s', 'Home', NULL, 'images/slides/149595528206.jpg', NULL, '2017-05-28 01:23:02', '2017-05-28 01:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `social_logins`
--

CREATE TABLE `social_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `static_blocks`
--

CREATE TABLE `static_blocks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `identifier` varchar(100) NOT NULL,
  `page` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `url` varchar(100) NOT NULL,
  `feature_image` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `s_order` int(5) NOT NULL,
  `bgcolor` varchar(10) NOT NULL,
  `bgimage` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static_blocks`
--

INSERT INTO `static_blocks` (`id`, `title`, `identifier`, `page`, `content`, `url`, `feature_image`, `position`, `s_order`, `bgcolor`, `bgimage`, `status`, `created_at`, `updated_at`) VALUES
(2, 'test', 'dd', '56', 'dsd', 'ddd', 'images/Static-blocks/14956979354-800x800.jpg', '1', 0, '#a43d6c', 'images/Static-blocks/1495618101cases.jpg', 1, '2017-05-22 06:37:24', '2017-05-25 01:53:55'),
(3, 'sdd', 'dd', '56', 'dsd', 'ddd', 'images/Static-blocks/1495697737Start_Selling_enchanteur.jpg', '1', 0, '#123456', 'images/Static-blocks/1495455892scuffedstatic_dark1400x900.jpg', 1, '2017-05-22 06:39:52', '2017-05-25 01:50:37'),
(4, 'sdd', 'dd', '56', 'dsd', 'ddd', 'images/Static-blocks/149569787112.jpg', '1', 0, '#123456', 'images/Static-blocks/1495455919scuffedstatic_dark1400x900.jpg', 1, '2017-05-22 06:40:19', '2017-05-25 01:52:51'),
(5, 'sdd', 'dd', '56', 'dsd', 'ddd', 'images/Static-blocks/1495697812banner6-1.jpg', '1', 0, '#123456', 'images/Static-blocks/1495455934scuffedstatic_dark1400x900.jpg', 1, '2017-05-22 06:40:34', '2017-05-25 01:51:52'),
(15, 'block1', 'below block0', '53', 'block1', 'block1', 'images/Static-blocks/14956258264.png', '0', 3, '#021422', 'images/Static-blocks/14956258263.jpg', 1, '2017-05-24 05:52:06', '2017-05-24 05:52:06'),
(16, 'dd', 'dd', '53', 'dd', 'dd', 'images/Static-blocks/14956980137.jpg', '0', 0, 'primary', 'images/Static-blocks/14956286904.png', 0, '2017-05-24 06:39:50', '2017-05-25 01:55:13'),
(17, 'block', 'f', '53', 'ff', 'ff', 'images/Static-blocks/14956979956.jpg', '0', 0, 'primary', 'images/Static-blocks/14956286913.jpg', 0, '2017-05-24 06:39:51', '2017-05-25 05:04:08'),
(18, 'xcx', 'xcxc', '53', 'xcxc', 'xcx', 'images/Static-blocks/14956982412.jpg', '0', 0, 'primary', 'images/Static-blocks/1495628955cases.jpg', 0, '2017-05-24 06:44:15', '2017-05-25 01:59:01'),
(19, 'cxxc', 'xcxc', '53', 'xcxc', 'xcxc', 'images/Static-blocks/14956981823.jpg', '0', 0, 'primary', 'images/Static-blocks/1495629017scuffedstatic_dark1400x900.jpg', 0, '2017-05-24 06:45:17', '2017-05-25 01:58:02'),
(20, 'ddf', 'dds', '56', 'sdsd', 'sdsd', 'images/Static-blocks/1495697845banner6-2.jpg', '0', 0, 'primary', 'images/Static-blocks/1495697495cases.jpg', 0, '2017-05-25 01:46:35', '2017-05-25 01:52:25'),
(21, 'asdf', 'asdf', '1', 'asdfasdf', 'asdf', 'images/Static-blocks/1496143064$_57.jpg', '0', 0, '#212930', 'images/Static-blocks/1496139824DesktopSlider_NP_1.jpg', 1, '2017-05-30 04:38:44', '2017-05-30 05:32:44'),
(22, 'Top second', 'top-second', '1', 'asdfsdf', '#', 'images/Static-blocks/1496142101DesktopSlider_NP_2.jpg', '0', 2, '#556b7d', 'images/Static-blocks/1496142101DesktopSlider_NP_2.jpg', 1, '2017-05-30 05:16:41', '2017-05-30 05:16:41'),
(23, 'Top third', 'top-third', '1', 'asdfasdf', '#', 'images/Static-blocks/1496142250DesktopSlider_NP_3.jpg', '0', 3, 'primary', 'images/Static-blocks/1496142250DesktopSlider_NP_3.jpg', 1, '2017-05-30 05:19:10', '2017-05-30 05:19:10'),
(24, 'Bottom first', 'bottom-first', '1', 'asd asd', '#', 'images/Static-blocks/1496142309DesktopSlider_NP_2.jpg', '1', 0, 'primary', 'images/Static-blocks/1496142309DesktopSlider_NP_2.jpg', 1, '2017-05-30 05:20:09', '2017-05-30 05:36:42'),
(25, 'Bottom Second', 'bottom-second', '1', 'asdfsadfsdf', '#', 'images/Static-blocks/1496142384DesktopSlider_NP_3.jpg', '1', 2, 'primary', 'images/Static-blocks/1496142384DesktopSlider_NP_3.jpg', 1, '2017-05-30 05:21:24', '2017-05-30 05:21:24'),
(26, 'Bottom third', 'bottom-third', '1', 'asd asd fds', '#', 'images/Static-blocks/1496142384DesktopSlider_NP_1.jpg', '1', 3, 'primary', 'images/Static-blocks/1496142384DesktopSlider_NP_1.jpg', 1, '2017-05-30 05:21:24', '2017-05-30 05:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_image`
--

CREATE TABLE `tmp_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_identifier` varchar(50) NOT NULL,
  `upload_group` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_image`
--

INSERT INTO `tmp_image` (`id`, `group_identifier`, `upload_group`, `image`, `created_at`, `updated_at`) VALUES
(8, 'WYraS6jN7kvdadu3q6SQ', 'dYeDzwk9FZ6H79ePJpDo', 'rYTZ5vddIm-2.jpg', '2017-05-11 11:19:28', '2017-05-11 11:19:28'),
(9, 'WYraS6jN7kvdadu3q6SQ', 'dYeDzwk9FZ6H79ePJpDo', 'TZX2echXUn-06.jpg', '2017-05-11 11:19:28', '2017-05-11 11:19:28'),
(10, 'WYraS6jN7kvdadu3q6SQ', 'dYeDzwk9FZ6H79ePJpDo', 'si0LV4Mozw-abroad-study-new-zealand.jpg', '2017-05-11 11:19:28', '2017-05-11 11:19:28'),
(11, 'prSlrGnrKESeNqN8JaWz', 'hjdGNhTvQRXYHf7eNbLm', 'du1l4PsGzi-2.jpg', '2017-05-11 11:38:43', '2017-05-11 11:38:43'),
(12, 'FwSJoDyZpSBW19ncxGIb', '2fMtRxVyZ5Q0do00p1bm', 'gkZzOFNbxM-2.jpg', '2017-05-11 12:00:08', '2017-05-11 12:00:08'),
(13, 'MEkYzpHNnI3QPgbIYFiH', 'LLjQI9T09h5h1aFwJwBL', 'CQdmW7l9Pp-02.jpg', '2017-05-11 23:59:27', '2017-05-11 23:59:27'),
(14, 'IoDgUSPnx6pRa2j2DfGZ', 'jKi8RXU6fQ84081yKtTd', 'c3HQQfpzH4-02.jpg', '2017-05-12 00:12:31', '2017-05-12 00:12:31'),
(15, 'EAaQGtYt76eF770HZK3D', 'z8r0vgzmTQ457TsNV8x8', '1rvQZdSTfn-02.jpg', '2017-05-12 00:29:11', '2017-05-12 00:29:11'),
(16, 'SlpKCrUVtbn5FnI3PZpk', 'u10YF9BhUipbitKODEV2', 'mKUMlOMsAX-02.jpg', '2017-05-12 00:30:03', '2017-05-12 00:30:03'),
(17, '7Mo7VpvITufkysdy1cWH', 'wDB8SJDZHnCMrRKcnkgv', 'bXa5wJG4Og-06.jpg', '2017-05-12 00:31:36', '2017-05-12 00:31:36'),
(18, 'FqwctSGbSFG17YMyo6pG', 'iLThT6mLVQuYNuUGDtU7', 'BMaWhUYpHX-06.jpg', '2017-05-12 00:32:08', '2017-05-12 00:32:08'),
(19, 'neqznEGMJ0dcHPxkUkpB', 'y0TSlWg7wXMoRNdomH6g', 'JLm1C31Y3b-5.jpg', '2017-05-12 00:32:54', '2017-05-12 00:32:54'),
(24, 'GMEibPKMnlSKB9clIWt7', 'PNMnOlTaQ5fCT1PFQnac', 'xxxmoUnVLe-5.jpg', '2017-05-12 01:03:45', '2017-05-12 01:03:45'),
(25, 'OZxChvEIHghGfXIvy1vW', 'Bp8lhhyshiOoYYqkmtsj', 'i3WVlc57Wg-06.jpg', '2017-05-12 01:07:47', '2017-05-12 01:07:47'),
(27, 'wepkrMErdVOzwvwOi552', 'dG0TR4VDXrgoKLETwok6', '5LCfqxc7pO-06.jpg', '2017-05-12 01:20:59', '2017-05-12 01:20:59'),
(29, 'wepkrMErdVOzwvwOi552', 'hi309X27yRW4ccI6dfyp', 'eXKIhGWrWs-5.jpg', '2017-05-12 01:21:06', '2017-05-12 01:21:06'),
(33, '5WBAun9bv3xPRneagGIh', 'oYqlrZ0JzTIz6974dett', 'l3uudJ2fEX-06.jpg', '2017-05-12 01:23:50', '2017-05-12 01:23:50'),
(34, 'bMwQ1VFeyA9x9rb29cTl', 'PUmBjgXlOPF0WTxqOBxr', 'jX5oo5rlLN-02.jpg', '2017-05-12 01:24:21', '2017-05-12 01:24:21'),
(35, 'JHBhtFww0bXNMICLJD8n', 'QQwrTIjPZepkHrGTxhHz', 'wBS4Ain6MB-2.jpg', '2017-05-12 01:27:59', '2017-05-12 01:27:59'),
(36, 'JHBhtFww0bXNMICLJD8n', 'QQwrTIjPZepkHrGTxhHz', '23qIDvMUHQ-06.jpg', '2017-05-12 01:27:59', '2017-05-12 01:27:59'),
(37, 'JHBhtFww0bXNMICLJD8n', 'QQwrTIjPZepkHrGTxhHz', 'leaxuwzrW3-abroad-study-new-zealand.jpg', '2017-05-12 01:27:59', '2017-05-12 01:27:59'),
(41, 'LQOsYGJ4GCGlWg010jMZ', 'IfR9oAWgXxxWxbhT3Xb3', 'EUklaJylr1-1.jpg', '2017-05-12 01:49:14', '2017-05-12 01:49:14'),
(42, 'LQOsYGJ4GCGlWg010jMZ', 'IfR9oAWgXxxWxbhT3Xb3', 'dmRGptOdYr-02.jpg', '2017-05-12 01:49:14', '2017-05-12 01:49:14'),
(43, 'LQOsYGJ4GCGlWg010jMZ', 'IfR9oAWgXxxWxbhT3Xb3', 'BaCDeqDlSn-5.jpg', '2017-05-12 01:49:14', '2017-05-12 01:49:14'),
(48, 'lmCtgROKldsWW1nSl57M', 's2NbIQFPI96q3af4OsFf', 'odp5TYEiDE-2.jpg', '2017-05-12 01:51:34', '2017-05-12 01:51:34'),
(49, 'lmCtgROKldsWW1nSl57M', 's2NbIQFPI96q3af4OsFf', 'iDJUAkYddq-5.jpg', '2017-05-12 01:51:34', '2017-05-12 01:51:34'),
(50, 'lmCtgROKldsWW1nSl57M', 's2NbIQFPI96q3af4OsFf', 'BdUhIkLEtw-06.jpg', '2017-05-12 01:51:34', '2017-05-12 01:51:34'),
(55, 'ueW1ToUgagFhslxOcm1D', 'O7gcSZehwsgjFHL13qao', 'OtHrBjuIxd-06.jpg', '2017-05-12 05:57:09', '2017-05-12 05:57:09'),
(58, '0ik4WbsZgeZRNvXJcYBi', 'OTlkiTGNtEoWiaySLjBW', '18M5dfWPYe-02.jpg', '2017-05-12 10:31:41', '2017-05-12 10:31:41'),
(60, '0ik4WbsZgeZRNvXJcYBi', 'OTlkiTGNtEoWiaySLjBW', 'JO342Pswj4-abroad-study-australia.jpg', '2017-05-12 10:31:42', '2017-05-12 10:31:42'),
(64, 'OQDxp326WE9TTHWaKM6j', 'g0y8kUi6AhTGbeWGIvHx', 'zYM5yXHFTy-02.jpg', '2017-05-12 10:33:08', '2017-05-12 10:33:08'),
(65, 'OQDxp326WE9TTHWaKM6j', 'g0y8kUi6AhTGbeWGIvHx', '5iG7UgqMa2-2.jpg', '2017-05-12 10:33:09', '2017-05-12 10:33:09'),
(66, 'OQDxp326WE9TTHWaKM6j', 'g0y8kUi6AhTGbeWGIvHx', 'IdX1NZZqum-5.jpg', '2017-05-12 10:33:09', '2017-05-12 10:33:09'),
(67, 'OQDxp326WE9TTHWaKM6j', 'OFDPMTnyFTcjFnafirRb', 'HwKtdVz0mt-02.jpg', '2017-05-12 10:35:24', '2017-05-12 10:35:24'),
(68, 'OQDxp326WE9TTHWaKM6j', 'OFDPMTnyFTcjFnafirRb', 'bJvldKjqqY-2.jpg', '2017-05-12 10:35:24', '2017-05-12 10:35:24'),
(69, 'OQDxp326WE9TTHWaKM6j', 'OFDPMTnyFTcjFnafirRb', 'yO8NVN1uRV-5.jpg', '2017-05-12 10:35:24', '2017-05-12 10:35:24'),
(70, 'gPGiHOw6VUgLsRUL2qKC', 'kswPkFR7cAZ4jZBLcuyK', 'MaLq4xOjjr-02.jpg', '2017-05-12 10:37:03', '2017-05-12 10:37:03'),
(71, 'gPGiHOw6VUgLsRUL2qKC', 'kswPkFR7cAZ4jZBLcuyK', 'q5fBTC2UBe-2.jpg', '2017-05-12 10:37:04', '2017-05-12 10:37:04'),
(72, 'gPGiHOw6VUgLsRUL2qKC', 'kswPkFR7cAZ4jZBLcuyK', 'o7hfLZMdCz-5.jpg', '2017-05-12 10:37:04', '2017-05-12 10:37:04'),
(73, 'NYtwR63ofiTOU9CEO5qa', 'ovwMXfw4Op5C1csQ9jar', 'HyWeP2aJm7-abroad-study-new-zealand.jpg', '2017-05-13 15:36:17', '2017-05-13 15:36:17'),
(75, 'EJMQ81tPyZ5bKF3JfGIK', 'sZdkwkjwAj2fxX1rD8EB', 'BHnx3G8con-02.jpg', '2017-05-13 15:38:59', '2017-05-13 15:38:59'),
(79, 'k4LA8bjcywWrXepvKQVO', 'c4x1thrMVIavBBsGFcOq', 'BinPKj2c1o-06.jpg', '2017-05-13 15:42:28', '2017-05-13 15:42:28'),
(80, 'ZTAh8aFshmRM3zq99i5O', 'I4OyOgRGZwy3630DR2hx', 'VLrV5V7v4C-2.jpg', '2017-05-13 15:51:03', '2017-05-13 15:51:03'),
(82, '96EeS7miPCSVIBBdrVZ7', 'DznQ8Q8uLwAl8PFMfStb', 'ScOupIkcYt-06.jpg', '2017-05-13 15:51:53', '2017-05-13 15:51:53'),
(83, 'OsrOBMQn8HV0xOLqPOXr', 'NMVGNcWHjYHMocj9rVu7', 'Q8ZYdG0ZBr-2.jpg', '2017-05-13 15:55:49', '2017-05-13 15:55:49'),
(84, 'OsrOBMQn8HV0xOLqPOXr', 'NMVGNcWHjYHMocj9rVu7', 'fSsHiQyk5f-06.jpg', '2017-05-13 15:55:49', '2017-05-13 15:55:49'),
(85, 'LBXn5sOgA3mGwsB6opV7', 'zfNPq1EYjHWfHdfYTJYy', 'ZF9X61fzTY-02.jpg', '2017-05-13 15:57:50', '2017-05-13 15:57:50'),
(86, 'jTqkQIlxvxSahbuVJEky', 'hwA8DD4fA0VR3k84t0nj', 'KLGI4iF1ZY-02.jpg', '2017-05-13 15:58:58', '2017-05-13 15:58:58'),
(87, 'BQnFDl6m7HMNppk7Nyau', '9ZBm6Z5V68emDiBQ7Qyw', 'Ub4VGH0i5C-2.jpg', '2017-05-13 15:59:40', '2017-05-13 15:59:40'),
(88, 'hCFCRBJ5RmYBbLr2fgbQ', '0x6k52LyCklwkpGRxN85', 'opvqguzyz9-2.jpg', '2017-05-13 16:01:33', '2017-05-13 16:01:33'),
(96, 'tiCcFif1Fi2u6LWn2guk', 'TxHvPs9f5Yrrk8TDw2aS', 'f9jU2HwOxo-2.jpg', '2017-05-13 16:14:26', '2017-05-13 16:14:26'),
(100, 'pBnNuMdgfNs6euDgLKrx', 'HmEahqbLo7vyBBWZz3ns', 'b5e02WkQip-06.jpg', '2017-05-13 16:36:31', '2017-05-13 16:36:31'),
(111, 'lknXAzbcINSuSU9zpiRa', '5BgXrsAksW15medQlpYg', 'Q9aeGSjhWf-02.jpg', '2017-05-13 18:01:07', '2017-05-13 18:01:07'),
(112, 'ALptOyoeOWZtudv9KYIk', 'yfDSztbdOHY0YWkO831j', 'UM3A2kUGUa-abroad-study-new-zealand.jpg', '2017-05-13 18:08:24', '2017-05-13 18:08:24'),
(113, 'LsOdS2i33sNRsEdPIZXF', 'bTn4ujWY51IIrchFj2fY', 'q66Og5ei9F-06.jpg', '2017-05-13 18:12:21', '2017-05-13 18:12:21'),
(123, 'P8ZymvXY4RxkCksTZZUv', 'lj5Xn0m5bi4LzsbdojfT', 'A5QFiodu02-avatar.png', '2017-05-13 18:33:12', '2017-05-13 18:33:12'),
(124, 'QqdFg79JWsNTeECZHHTm', '97IH3ML1NKwZmSHMeDl8', '1sMffE4BLu-02.jpg', '2017-05-14 11:26:51', '2017-05-14 11:26:51'),
(125, 'QqdFg79JWsNTeECZHHTm', '97IH3ML1NKwZmSHMeDl8', 'UllIfe1lf9-2.jpg', '2017-05-14 11:26:51', '2017-05-14 11:26:51'),
(126, 'QqdFg79JWsNTeECZHHTm', '97IH3ML1NKwZmSHMeDl8', 'RnUMBh4K8j-5.jpg', '2017-05-14 11:26:51', '2017-05-14 11:26:51'),
(127, 'QqdFg79JWsNTeECZHHTm', '97IH3ML1NKwZmSHMeDl8', 'hKmRhLAz0c-06.jpg', '2017-05-14 11:26:51', '2017-05-14 11:26:51'),
(128, 'mmPd2hAfqPhe7mt5O401', 'JxqVJk1TRFIXQSLhTO8s', '60ROXzxAex-abroad-study-australia.jpg', '2017-05-14 11:46:56', '2017-05-14 11:46:56'),
(129, 'mmPd2hAfqPhe7mt5O401', 'JxqVJk1TRFIXQSLhTO8s', '8AjU20MD1C-avatar.png', '2017-05-14 11:46:56', '2017-05-14 11:46:56'),
(130, 'mmPd2hAfqPhe7mt5O401', 'JxqVJk1TRFIXQSLhTO8s', 'zDtJyEcedH-avatar2.png', '2017-05-14 11:46:56', '2017-05-14 11:46:56'),
(131, 'KhhGAMjweaeN3qKWkr09', 'PVCCfKiJLLkpmDwG4dWh', 'axd4PrYFCA-bikash-sir.jpg', '2017-05-14 11:48:16', '2017-05-14 11:48:16'),
(132, 'KhhGAMjweaeN3qKWkr09', '0SoQySchbnDGnNc4sjrB', '3OTKJC3UpW-avatar5.png', '2017-05-14 11:48:22', '2017-05-14 11:48:22'),
(133, 'KhhGAMjweaeN3qKWkr09', 'vG45SrO5Foi0rb1HWcKu', '5yXTEVHHPZ-avatar5.png', '2017-05-14 11:49:13', '2017-05-14 11:49:13'),
(134, 'KhhGAMjweaeN3qKWkr09', 'YPFfXnIgfmjCYEJCtxMl', 'fVVMyVmZ3v-avatar3.png', '2017-05-14 11:49:18', '2017-05-14 11:49:18'),
(137, '0jPoHAy5eEgE8qCD42rM', 'gcvWC8oqvlkHnlzz96Vq', 'OJhMWFbkcS-1.jpg', '2017-05-14 14:19:49', '2017-05-14 14:19:49'),
(138, '0jPoHAy5eEgE8qCD42rM', 'gcvWC8oqvlkHnlzz96Vq', 'eXRqNIJfDX-4.jpg', '2017-05-14 14:19:49', '2017-05-14 14:19:49'),
(139, 'wgfViX7okauWE5Fpq60p', 'NEbMVwWUnl70bnTqx5fv', '6AiFxD2h7v-1.jpg', '2017-05-14 14:21:03', '2017-05-14 14:21:03'),
(140, 'wgfViX7okauWE5Fpq60p', 'NEbMVwWUnl70bnTqx5fv', '7lwlrgF4kV-4.jpg', '2017-05-14 14:21:03', '2017-05-14 14:21:03'),
(141, 'fETL2jZD8IeJddOZ3Wmf', 'mnZvJ2CweBO0dYvFgjnG', 'jpL9S3X52R-02.jpg', '2017-05-15 05:11:12', '2017-05-15 05:11:12'),
(142, 'fETL2jZD8IeJddOZ3Wmf', 'mnZvJ2CweBO0dYvFgjnG', 'fmxBgNRWej-06.jpg', '2017-05-15 05:11:12', '2017-05-15 05:11:12'),
(147, 'Q3XZuW1odXkzMG159YJ3', 'LFNcyxxAjs5ZYpLHYqnH', 'suEXDNJrJa-viber image1.jpg', '2017-05-15 06:16:27', '2017-05-15 06:16:27'),
(148, 'qlYfn98i6Veaj0xPGQDs', 'Kkkl946PtUJSrx8nqZPI', 'ta7Zs75mu4-02.jpg', '2017-05-17 09:53:58', '2017-05-17 09:53:58'),
(149, 'qlYfn98i6Veaj0xPGQDs', 'Kkkl946PtUJSrx8nqZPI', 'GCFVuLXPZL-5.jpg', '2017-05-17 09:53:59', '2017-05-17 09:53:59'),
(150, 'qlYfn98i6Veaj0xPGQDs', 'Kkkl946PtUJSrx8nqZPI', 'fc7vvt5Fv7-06.jpg', '2017-05-17 09:53:59', '2017-05-17 09:53:59'),
(151, 'To6u7QltOktsC0e89LJ0', 'KCtu8V3l5LEKxo9r8Meh', 'LLFarX1SKF-02.jpg', '2017-05-28 16:25:01', '2017-05-28 16:25:01'),
(152, 'puQA0fdOjqz2w2e8Lkfn', 'dXKitip5TtQf4Rn8UO52', 'Iw7ADtq8Nz-02.jpg', '2017-05-28 16:26:20', '2017-05-28 16:26:20'),
(153, 'UfJoXhA7DBmbTAD0ZCpC', 'r7joeusUEUGtYPUPpkMH', '6dOaQF1crq-02.jpg', '2017-05-28 16:28:57', '2017-05-28 16:28:57'),
(154, 'clk5Up09gbDqCMU5nQC8', 'DBsOskk6ItLSE02tWHbD', '38NC4KDUTm-02.jpg', '2017-05-28 16:30:03', '2017-05-28 16:30:03'),
(155, 'EQIMabfseNRCGHGIgKkq', 'EclUFSPlsOwsmhNg7kMG', 'ZZCkki7JlJ-02.jpg', '2017-05-28 16:30:50', '2017-05-28 16:30:50'),
(156, 'nlO7ZD4FHDeH71Lrbyt5', 'uXV8CF4WmBmChdRCNIVX', 'nqU5re9PtG-06.jpg', '2017-05-28 16:31:20', '2017-05-28 16:31:20'),
(157, 'w9fAVMf7wKepJRh8Aiw0', 'JLJ1G5LoAutG8zBMKPL6', '8DqOSNvw4a-06.jpg', '2017-05-28 16:31:40', '2017-05-28 16:31:40'),
(159, 'chLriBey6Oe0ewW0FmaO', 'JFTt8sDTXY6Me5NJuAgI', 'CzumUryygl-9.jpg', '2017-05-29 04:55:40', '2017-05-29 04:55:40'),
(160, 'chLriBey6Oe0ewW0FmaO', 'loXUZ3BWLutjCuq4iplf', 'BJgI4mOyrf-10.jpg', '2017-05-29 04:55:48', '2017-05-29 04:55:48'),
(174, 'w9zeUINr9TPtEdkj6SzU', '2GmqGsLsf7shLkTH6rGt', 'Dhc3MU2mWI-1-800x800.jpg', '2017-05-29 06:46:41', '2017-05-29 06:46:41'),
(175, 'w9zeUINr9TPtEdkj6SzU', '2GmqGsLsf7shLkTH6rGt', 'j5UF3ncpc2-5.jpg', '2017-05-29 06:46:41', '2017-05-29 06:46:41'),
(176, '6LotL4FP5HYTtTF7h7gR', '6kjYJKoyae1Dl7nkjLLC', 'kixdub7xzl-4-800x800.jpg', '2017-06-05 06:42:35', '2017-06-05 06:42:35'),
(177, 'ZqGyT6UW9TDpNgQx6btZ', 'LDVch5Lzmd3USSQwnlHO', 'HjFDo3SIIG-2.jpg', '2017-06-07 06:38:08', '2017-06-07 06:38:08'),
(179, 'TFp4CIwrtCF9m5OWqAi7', 'QMg0lB8msEF60Qyw3Vq2', 'Ksu2UxaiG6-06.jpg', '2017-06-07 06:50:09', '2017-06-07 06:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `confirmation_code`, `confirmed`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Three Hammers', 'admin@3hammers.com', '$2y$10$NEYa6a.UqW0Fqt.m5CjJ9e5zBf0C0NEVfyc2JiueEs4wYCAQAmQ4.', 1, 'e8acf4eb44ff6a91db153be865e66d70', 1, 'nuO1TfquhI9YgS7R7Jg7FrxpLlFHgGFbyKvGSHFRdoHwKk2YBRYMxpbA751w', '2017-04-18 01:44:00', '2017-04-18 01:44:00', NULL),
(2, 'Backend User', 'executive@executive.com', '$2y$10$Vavo16KEV6LUXNKZi8GkaeiUe7J2o/I.ZtrBrwAPz270Xzsb23Z6e', 1, '76827762ca51224bed663604bae86723', 1, NULL, '2017-04-18 01:44:00', '2017-04-18 01:44:00', NULL),
(3, 'Default User', 'user@user.com', '$2y$10$egNmDeVHiNu8ILMUZkVXROvzizERbJtUUCkCDBvyhKPLdFwnWLQH6', 1, 'f34b3a247eaccea043ba50ee63572121', 1, NULL, '2017-04-18 01:44:00', '2017-04-18 01:44:00', NULL),
(5, 'pradeep', 'pdps111@gmail.com', '$2y$10$60Bhc4q28QPNSRRWMVBX8O.0Ces.HOFxwJq2ZVC85htmt0ApjCy1u', 1, '81bc7bc8ff48caa5041e9d68fba2d46c', 1, 'h6UAyL6AR8nhd197ctyWQf3xd4SOf8WR6Fdrk7SKh1RsXrFIxN8COGGWymyH', '2017-05-03 05:44:24', '2017-05-03 05:44:24', NULL),
(6, 'test', 'test@test.com', '$2y$10$XJiNZGRprCYPjDy5tOEOr.52pJQv2ZtHsi/HIXfrNI8a0qtItiLNO', 1, 'de9eef632ef7faea7063c007be58481c', 1, 'iHRM369QY49KDklw1DCK86IW7TC13ZSTK9QMMtzNFG2rRRPK0V2jh0U3tTj9', '2017-05-16 20:31:25', '2017-05-16 20:31:25', NULL),
(7, 'yojan', 'yojansh50@gmail.com', '$2y$10$YJLuugbUcUebx3PYZEzfyOvJSL.jG3M2KGD8BCCu3DQbdnaK8njrm', 1, '4278bbf34f58c8884c987085cd0d7b81', 1, 'QmrVWqo5dx7PnbqjjwlROHUi3aBclL2DiRJi0iKhldOfQ7gKb9ZfG3w0FPSd', '2017-06-16 06:13:57', '2017-06-16 06:13:57', NULL),
(10, 'test lname', 'h1831566@mvrht.net', '$2y$10$lHmc7rVpAdCwG2UH0yd6Qu9zCffsGusVL5if8gIW/a5J.tzoxsVBW', 1, '0ab7ed14b44004d51b0dbec8d8894111', 0, NULL, '2017-06-26 01:21:13', '2017-06-26 01:21:13', NULL),
(11, 'fname lname', 'h1834510@mvrht.net', '$2y$10$R58M/h4/NWUdSK42JWD3ou9z8P1Oa444m.J9SzVY14ypOPN6r/QTC', 1, 'de4832eb8e3fc6c4e5fac8290a6f04aa', 0, NULL, '2017-06-26 01:25:45', '2017-06-26 01:25:45', NULL),
(12, 'asfd cxvczxv', 'h1834510e@mvrht.net', '$2y$10$9tCe9iZ19jWc45NLpWeTAOVVxilU3tWNFXaB4L2xY/t6GtHec2CZm', 1, '977822aef3ae6acd4329d8003aba101e', 0, NULL, '2017-06-26 01:30:51', '2017-06-26 01:30:51', NULL),
(13, 'fname lname', 'h1836515@mvrht.net', '$2y$10$7/8lAuxyY6su0u0MjiFUOuXP4eiIAzPchXo9mtsusmnPkEANgTeA2', 1, 'd37cd874821ce89936bea43e6fda42ed', 0, NULL, '2017-06-26 01:32:29', '2017-07-06 03:58:15', '2017-07-06 03:58:15'),
(14, 'asdfsadf weerwerewr', 'alksjdfkj@alsdf.com', '$2y$10$821JmwSrmD02WBApp8w9/uH9YgAzmJquB.UCzgApisdST1RaWiuA6', 1, '71dcc5e21029aca95dc46da28a9640fd', 0, NULL, '2017-06-26 01:41:34', '2017-06-26 01:41:34', NULL),
(15, 'asdfsadf zxcvzxcv', 'h1839504@mvrht.net', '$2y$10$jLdxv.ZQR.drOryIFy5NBebz9KeM9mvd4nyXZ1JkkpLewwX/ynDZy', 1, 'daae88f1998c5900c61231ed8b37dabc', 1, 'xNxqBsnZFIvy5YWYI98scMCSRn4vWGqbvC19DcEWQu1D3NISpRiqwNuLpnd7', '2017-06-26 01:43:03', '2017-06-26 01:44:24', NULL),
(16, 'asdf asfsdf', 'asdfsdf@asfsd.ocm', '$2y$10$Inpva9jYkm2afSThVuBhcOgtsazaaMMBoX24OUia/ma/xFL5xpiV6', 1, 'c17e2ef22c5fc0b557e8c86ab158e8f3', 0, NULL, '2017-06-26 01:46:53', '2017-06-26 01:46:53', NULL),
(17, 'asdf weewr', 'asdfsd@safsd.com', '$2y$10$zlVtxhGx1YYfeZa874uhYOnjswzF5GJtHjIWmKiP.MzbzAvebRmZy', 1, 'ee66945724fe0a2b11ec372b2b537e5f', 0, NULL, '2017-06-26 23:39:48', '2017-06-26 23:39:48', NULL),
(18, 'asdfdsf werewrewr', 'dfdfdfd@afdsf.com', '$2y$10$0WIOdAbAqE61AGuhoJrVFutnW74w1DmXIbOKu8Wvqycd3ysqP81m6', 1, 'ef116381227c5862b547ed7572d68354', 0, NULL, '2017-06-26 23:41:33', '2017-06-26 23:41:33', NULL),
(19, 'asdfsdaf wewew', 'asdfsdfdsf@asdf.com', '$2y$10$0lSUB7sMKhPbTy/lCFakFOP4xwaJYdo.KIhx0fPo7E13TzSyD7kia', 1, 'ff39a8ff84a839d8a58a5aae42860f9c', 0, NULL, '2017-06-26 23:55:30', '2017-06-26 23:55:30', NULL),
(20, 'adf eeee', 'asfasdfsfdsd@asdfdsf.com', '$2y$10$sCdCSHhgJhTwQe1UrjhgCeEtU6subjmjNDOYjzFIlRuObKsIwMSCK', 1, 'a0ec632aa3f127318da979f76aae8623', 0, NULL, '2017-06-26 23:58:44', '2017-06-26 23:58:44', NULL),
(21, 'fname lname', 'kjkjjkj@jkkjk.com', '$2y$10$rEDmkm3uHmLsYpEqtoP8Rue1nMwi9ORUTmgJO0fvbIQb9BWwooWA6', 1, '147f574b513d114866bc6c19b83fe22e', 0, NULL, '2017-06-27 00:00:08', '2017-06-27 00:00:08', NULL),
(22, 'erererere klklklklk', 'kjkjkj@kjadsf.com', '$2y$10$TGYkk/WTR6cWT1A1IRlQr.Z5vuGcADVKRceMrbvkT9GXJrdboUByO', 1, '952c0078265d689f4819c7c67da4a0fc', 0, NULL, '2017-06-27 00:00:46', '2017-06-27 00:00:46', NULL),
(23, 'fname lname', 'rtrtrtr@asdfl.com', '$2y$10$spCP.zV1aJFcxRaQsIHvU.6nQiegaHVLf0Ou9UMtDt.jsj5rZCZOG', 1, 'ab23d65a3893c21df4ccf7fd3f4d3762', 0, NULL, '2017-06-27 00:01:33', '2017-06-27 00:01:33', NULL),
(24, 'fname lname', 'xcvxcvcxvcx@asdfkl.com', '$2y$10$I7URwgQ9W/rndW5QADTAj.gVKWLK68zCQtecl8SzRczORZ8KWBGHa', 1, 'cd89853557027dcaf40c45f84b6cc6a0', 0, NULL, '2017-06-27 00:02:16', '2017-06-27 00:02:16', NULL),
(25, 'fname lanme', 'weweweew@gmial.com', '$2y$10$L2oMx3xbtT2X80/JIllREONpeFE.ON003LNT2oFZVwOdqr4O.3RhC', 1, '6fac2ad42e82f80a2cecc00db23c54ba', 0, NULL, '2017-06-27 00:03:45', '2017-06-27 00:03:45', NULL),
(26, 'sdsdsd wewewe', 'kjkjkkj@lasdf.com', '$2y$10$kTHg5UhkspCpkuZ6TgIW9eJmxW3QTrD7fp4wN9MTjKBD8M4/RsWn.', 1, '27e0c7f19671d2a31fa9605c9ff16b65', 0, NULL, '2017-06-27 00:09:57', '2017-06-27 00:09:57', NULL),
(27, 'testfname testlname', 'h2134627@mvrht.net', '$2y$10$mKyvPucvWg6RltLPcE/nV.1KN7udSgZwdCc7uZGrIroQtEFSNLtQS', 1, '09c0b644ae3694e7c7f57bff1105e951', 1, 'AZmCIxAoyvIU1fSwEuH9qYLSXZzYcq9rMXSh6H76szbmE8cxy8umXczUJCEA', '2017-06-27 00:10:51', '2017-06-27 00:12:26', NULL),
(28, 'aksdjfkj kjkkjjk', 'wwwww@asldf.com', '$2y$10$qW4xCORNBQ0mYA5d3i.MyOMH23ajB.3vK5nBaLp2SN795sqXMLmVu', 1, '58ec930d5da81beeee836b4347fdfbfd', 0, NULL, '2017-06-27 00:23:45', '2017-06-27 00:23:45', NULL),
(29, 'kjkjkjkj kkjkj', 'xcvxcvbv@sadff.com', '$2y$10$VMQrVqK9mOLb9ZgHAJxpuufSI4hB8PZvImDBfvaALgw4naRD0d7ci', 1, 'b1105ca1fe6cc8ed5954030c7c873066', 0, NULL, '2017-06-27 00:25:04', '2017-06-27 00:25:04', NULL),
(30, 'testfname testlname', 'h2137258@mvrht.net', '$2y$10$Q.Awn6dqw9cXpvHavh3mo.Ea.u29BsI7S4nFdwt8dYJXNdUbu5Jte', 1, '702d80c70bee8141c27c444e9d95ca62', 1, 'cHBAetE8LhoQqox1FotktX0MBG1JgznG8iif8OqjfPt4neMJsbvZKFbk7GAi', '2017-06-27 00:25:44', '2017-06-27 00:26:49', NULL),
(31, 'asdf fasdf', 'asdfasdfs@aasdff.coma', '$2y$10$3EFYoWmMyYGX3cYyFdS/9.rY3fkt5F9ms6IiDvbNToEiUuDlTMHo6', 1, 'a315a5f280abcfbc9504044551aa6f93', 0, NULL, '2017-06-27 03:51:14', '2017-06-27 03:51:14', NULL),
(32, 'asdfs fasfsafsd', 'asdfsdf@afadfsadf.com', '$2y$10$y3HAHhuPwvRkbHd6VQkAHuq2j2q3NPCjXBietaCLOOOWORMdWmobe', 1, 'fc92420eb68c1adc5876da606e5cdc2b', 0, NULL, '2017-06-27 03:55:17', '2017-06-27 03:55:17', NULL),
(33, 'asdf asdf', 'asdfads@asdfkl.comm', '$2y$10$HlrmhsifX8SK/LYTWDfh/ulehahfovu3.dM7GTZ94P9ES0sDy/Vk.', 1, '265baa4a751946b9a680c1a028a86a3c', 0, NULL, '2017-06-27 04:18:42', '2017-06-27 04:18:42', NULL),
(34, 'klasdfjasdf faklsdfjl', 'asdf@aksf.com', '$2y$10$gteD55YYEuh5IAVwOkw3Tuo14nT1FHU3g5gfMxDPqueMZvlJHrA1q', 1, '17088065babdfe74bb86e0815d411ce5', 0, NULL, '2017-06-27 04:19:41', '2017-06-27 04:19:41', NULL),
(35, 'asdfasdfds fasdfasdfds', 'jaslkdjfkl@aflkasfd.com', '$2y$10$NDV6EhA9oGmadmJqbPcXuOyYUr8GeunZRXKASZSVAgvbyYwn6ZhkK', 1, '9369238783ea76bc03c3118ee1cc16df', 0, NULL, '2017-06-27 04:20:35', '2017-06-27 04:20:35', NULL),
(36, 'asdf asdflast', 'h1552600@mvrht.net', '$2y$10$sbnBy4BHz1epxjv2u0YoceYAoLqNW3VAWPGdau7mUCt17nwcFs3qC', 1, '2ef0c4a4ecd694b4bc29e51b2e4739cf', 0, NULL, '2017-06-27 04:23:48', '2017-06-27 04:23:48', NULL),
(37, 'sajina makaju', 'sazeena1@3hammers.com', '$2y$10$nCVlqfxyhKSjRZz/7vb/VuO5P.3fTHZxPqfrs/3c7aCGw9g/qCJOS', 1, '5d8710c0468fd278ea48d4517fbe0571', 0, 'FWupBiAHGtrjkZThR4mQUBCEPZNDwQZv2uT5fG184gLktJLCgA77ckqxpmzX', '2017-06-27 04:35:18', '2017-06-27 04:35:18', NULL),
(38, 'yojan shrestha', 'yojan3ham2@gmail.com', '$2y$10$4ymanUXR3BzrgjYPeJUrA.jKmXd0f8T1Jrj0HBGGg9xfFjMnGQVDK', 1, 'f3e3bac3b58a984a5df2e78a378de48b', 0, NULL, '2017-06-27 04:51:56', '2017-06-27 04:51:56', NULL),
(39, 'yojan shrestah', 'yojan3ham3@gmail.com', '$2y$10$uY5rJjOJZHCi4ApekZPqX.xgLMKCm0CSKT9SDXWyAS4/My5shK/om', 1, '3282d8bcb7eae9d53861b5d3d4487117', 0, NULL, '2017-06-27 04:58:59', '2017-06-27 04:58:59', NULL),
(40, 'aklsdfj lakdsjf', 'yojan3ham@gmail.com', '$2y$10$4oaMasDitANss3EDO7YVk.X7SCdCd7w/0OdtyTy9UrYwx5WSvW5C.', 1, 'b8b9b5c83103f82981140a8589a24a50', 0, NULL, '2017-06-27 05:00:35', '2017-06-27 05:00:35', NULL),
(41, 'asdfasdfsadf', 'asdfdsads@asdfsd.cma', '$2y$10$2Q49B21EJpF1dDstrpWpWedCG0HmpqFi7TfoXOIgg0BOzfTFfGnhq', 1, '129a2c445c765b77f755d2fba69ffa74', 1, NULL, '2017-07-06 03:40:12', '2017-07-06 03:40:12', NULL),
(42, 'asdfasdfsdf', 'dfsgdfgfd@sadfsadff.cms', '$2y$10$1m.3Go0A5vYHH01VZ.PU.uboN2jwNl.EHcEZl2vez6WSbhcIIk.Ku', 1, 'a252b24f3f392443ab2104d8fbd9f336', 1, NULL, '2017-07-06 03:47:41', '2017-07-06 03:47:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_id` (`attribute_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_category`
--
ALTER TABLE `brand_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cartitem_attribute`
--
ALTER TABLE `cartitem_attribute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cartitem_id` (`cartitem_id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_banner`
--
ALTER TABLE `category_banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_type_id_foreign` (`type_id`),
  ADD KEY `history_user_id_foreign` (`user_id`);

--
-- Indexes for table `history_types`
--
ALTER TABLE `history_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attr_combination`
--
ALTER TABLE `product_attr_combination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_attr_combination_value`
--
ALTER TABLE `product_attr_combination_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attr_combination_id` (`product_attr_combination_id`),
  ADD KEY `attribute_value_id` (`attribute_value_id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_price`
--
ALTER TABLE `product_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_logins`
--
ALTER TABLE `social_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_logins_user_id_foreign` (`user_id`);

--
-- Indexes for table `static_blocks`
--
ALTER TABLE `static_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_image`
--
ALTER TABLE `tmp_image`
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
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `brand_category`
--
ALTER TABLE `brand_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `cartitem_attribute`
--
ALTER TABLE `cartitem_attribute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `category_banner`
--
ALTER TABLE `category_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `history_types`
--
ALTER TABLE `history_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `product_attr_combination`
--
ALTER TABLE `product_attr_combination`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product_attr_combination_value`
--
ALTER TABLE `product_attr_combination_value`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `product_price`
--
ALTER TABLE `product_price`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `social_logins`
--
ALTER TABLE `social_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `static_blocks`
--
ALTER TABLE `static_blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tmp_image`
--
ALTER TABLE `tmp_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brand_category`
--
ALTER TABLE `brand_category`
  ADD CONSTRAINT `brand_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `brand_category_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `cartitems_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartitems_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cartitem_attribute`
--
ALTER TABLE `cartitem_attribute`
  ADD CONSTRAINT `cartitem_attribute_ibfk_1` FOREIGN KEY (`cartitem_id`) REFERENCES `cartitems` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_banner`
--
ALTER TABLE `category_banner`
  ADD CONSTRAINT `category_banner_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `history_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attr_combination`
--
ALTER TABLE `product_attr_combination`
  ADD CONSTRAINT `product_attr_combination_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD CONSTRAINT `product_gallery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD CONSTRAINT `product_inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_price`
--
ALTER TABLE `product_price`
  ADD CONSTRAINT `product_price_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_logins`
--
ALTER TABLE `social_logins`
  ADD CONSTRAINT `social_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
