-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 01:21 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `cart_product_id` int(11) NOT NULL,
  `cart_customer_id` int(11) NOT NULL,
  `cart_product_name` varchar(200) NOT NULL,
  `cart_product_qty` varchar(200) NOT NULL,
  `cart_product_price` varchar(200) NOT NULL,
  `cart_product_images` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Man', 0, '2019-11-29 06:43:21', '2019-11-29 06:43:21'),
(8, 'Woman', 0, '2019-11-29 06:43:29', '2019-11-29 06:43:29'),
(9, 'Kids', 0, '2019-11-29 06:43:36', '2019-11-29 06:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `state_id`, `city_name`, `status`, `created_at`, `updated_at`) VALUES
(4, 6, 'Bombay', 0, '2019-10-01 05:29:40', '2019-10-01 05:29:40'),
(5, 8, 'surat', 0, '2019-10-09 04:34:38', '2019-10-09 04:34:38'),
(6, 8, 'ahamdabad', 0, '2019-10-09 04:34:56', '2019-10-09 04:34:56'),
(7, 8, 'rajkot', 0, '2019-10-09 04:35:13', '2019-10-09 04:35:13'),
(8, 8, 'jamnagar', 0, '2019-10-11 04:36:39', '2019-10-11 04:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hobby` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `gender`, `hobby`, `dob`, `address`, `state`, `city`, `image`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(2, 'tejas', 'tejas123@gmail.com', '$2y$10$XtH.Iz9su5Eon7g49R2nQe9btyQ5m7FhH6RYGR.Z.0qVQgXWOCAEC', 'male', 'reading,dancing', '2019-12-19', 'qwertyuiopolkjhgfdsazxcvb', '8', '5', '1575788906_2.jpg', NULL, 0, '2019-12-08 01:38:26', '2019-12-08 01:38:26'),
(3, 'vijay', 'vijay@gmail.com', '$2y$10$tdJQEYEopAvsCMdnYdNvjOq1GI5O7afQN.NjY357roaJJN0EYMPCO', 'male', 'reading,dancing', '2019-12-10', 'qwertyuioplkjhgfdsazxcvbnm', '8', '7', '1578569520_3.jpg', 'YNwQwO0DqI0qAom4zvzCeZOwOj44nPYRX3fwVlgOVxSjB3Vm1bGdP2kTXyya', 0, '2019-12-08 01:45:50', '2020-01-09 06:02:10'),
(4, 'nayan', 'nayan@gmail.com', '$2y$10$tdJQEYEopAvsCMdnYdNvjOq1GI5O7afQN.NjY357roaJJN0EYMPCO', 'male', 'reading', '2019-12-22', 'qwertyuioplkjhgfdsazxcvbnm', '8', '8', '1578567812_2.jpg', NULL, 0, '2019-12-08 05:19:01', '2020-01-09 06:33:40'),
(5, 'vijay', 'vijay123@gmail.com', '$2y$10$SBedJJyRu1jbLeGKMGL5su9CSPalwSrSJDVnYAs3uNQf8Q1l9El2q', 'male', 'reading', '2019-12-17', 'qwertyuiopl', '6', '4', '1575802884_4.jpg', NULL, 0, '2019-12-08 05:31:24', '2019-12-08 07:01:38');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `total_qty` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `total_price`, `total_qty`, `status`, `created_at`, `updated_at`) VALUES
(139, 3, '3360', '3', 0, '2020-01-01 09:46:28', '2020-01-01 09:46:28'),
(140, 3, '3360', '3', 0, '2020-01-01 09:50:23', '2020-01-01 09:50:23'),
(141, 3, '3360', '3', 0, '2020-01-01 09:51:56', '2020-01-01 09:51:56'),
(142, 3, '3360', '3', 0, '2020-01-01 09:54:07', '2020-01-01 09:54:07'),
(143, 3, '3360', '3', 0, '2020-01-01 09:55:28', '2020-01-01 09:55:28'),
(144, 3, '3360', '3', 0, '2020-01-01 09:56:46', '2020-01-01 09:56:46'),
(145, 3, '3360', '3', 0, '2020-01-01 09:58:57', '2020-01-01 09:58:57'),
(146, 3, '3360', '3', 0, '2020-01-01 10:32:43', '2020-01-01 10:32:43'),
(147, 3, '1080', '6', 0, '2020-01-02 10:32:57', '2020-01-02 10:32:57'),
(148, 3, '1080', '6', 0, '2020-01-02 10:32:57', '2020-01-02 10:32:57'),
(149, 3, '1080', '6', 0, '2020-01-02 10:41:06', '2020-01-02 10:41:06'),
(150, 3, '1080', '6', 0, '2020-01-06 11:39:47', '2020-01-06 11:39:47'),
(151, 3, '1080', '6', 0, '2020-01-06 11:42:40', '2020-01-06 11:42:40'),
(152, 3, '1080', '6', 0, '2020-01-06 11:44:33', '2020-01-06 11:44:33'),
(153, 3, '1080', '6', 0, '2020-01-06 12:13:16', '2020-01-06 12:13:16'),
(154, 3, '1080', '6', 0, '2020-01-09 12:05:38', '2020-01-09 12:05:38'),
(155, 3, '1440', '8', 0, '2020-01-27 11:50:39', '2020-01-27 11:50:39'),
(156, 3, '1440', '8', 0, '2020-01-27 11:50:39', '2020-01-27 11:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` varchar(200) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `product_total_price` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `product_qty`, `product_price`, `product_total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 139, 19, '2', '180', '3360', 0, '2020-01-01 09:46:28', '2020-01-01 09:46:28'),
(2, 139, 22, '1', '3000', '3360', 0, '2020-01-01 09:46:28', '2020-01-01 09:46:28'),
(3, 140, 19, '2', '180', '3360', 0, '2020-01-01 09:50:24', '2020-01-01 09:50:24'),
(4, 140, 22, '1', '3000', '3360', 0, '2020-01-01 09:50:24', '2020-01-01 09:50:24'),
(5, 141, 19, '2', '180', '3360', 0, '2020-01-01 09:51:56', '2020-01-01 09:51:56'),
(6, 141, 22, '1', '3000', '3360', 0, '2020-01-01 09:51:56', '2020-01-01 09:51:56'),
(7, 142, 19, '2', '180', '3360', 0, '2020-01-01 09:54:07', '2020-01-01 09:54:07'),
(8, 142, 22, '1', '3000', '3360', 0, '2020-01-01 09:54:07', '2020-01-01 09:54:07'),
(9, 143, 19, '2', '180', '3360', 0, '2020-01-01 09:55:28', '2020-01-01 09:55:28'),
(10, 143, 22, '1', '3000', '3360', 0, '2020-01-01 09:55:28', '2020-01-01 09:55:28'),
(11, 144, 19, '2', '180', '3360', 0, '2020-01-01 09:56:46', '2020-01-01 09:56:46'),
(12, 144, 22, '1', '3000', '3360', 0, '2020-01-01 09:56:46', '2020-01-01 09:56:46'),
(13, 145, 19, '2', '180', '3360', 0, '2020-01-01 09:58:57', '2020-01-01 09:58:57'),
(14, 145, 22, '1', '3000', '3360', 0, '2020-01-01 09:58:57', '2020-01-01 09:58:57'),
(15, 146, 19, '2', '180', '3360', 0, '2020-01-01 10:32:43', '2020-01-01 10:32:43'),
(16, 146, 22, '1', '3000', '3360', 0, '2020-01-01 10:32:43', '2020-01-01 10:32:43'),
(17, 147, 19, '2', '180', '1080', 0, '2020-01-02 10:32:57', '2020-01-02 10:32:57'),
(18, 148, 19, '2', '180', '1080', 0, '2020-01-02 10:32:57', '2020-01-02 10:32:57'),
(19, 147, 23, '4', '180', '1080', 0, '2020-01-02 10:32:57', '2020-01-02 10:32:57'),
(20, 148, 23, '4', '180', '1080', 0, '2020-01-02 10:32:57', '2020-01-02 10:32:57'),
(21, 149, 19, '2', '180', '1080', 0, '2020-01-02 10:41:06', '2020-01-02 10:41:06'),
(22, 149, 23, '4', '180', '1080', 0, '2020-01-02 10:41:06', '2020-01-02 10:41:06'),
(23, 150, 19, '2', '180', '1080', 0, '2020-01-06 11:39:48', '2020-01-06 11:39:48'),
(24, 150, 23, '4', '180', '1080', 0, '2020-01-06 11:39:48', '2020-01-06 11:39:48'),
(25, 151, 19, '2', '180', '1080', 0, '2020-01-06 11:42:40', '2020-01-06 11:42:40'),
(26, 151, 23, '4', '180', '1080', 0, '2020-01-06 11:42:40', '2020-01-06 11:42:40'),
(27, 152, 19, '2', '180', '1080', 0, '2020-01-06 11:44:33', '2020-01-06 11:44:33'),
(28, 152, 23, '4', '180', '1080', 0, '2020-01-06 11:44:33', '2020-01-06 11:44:33'),
(29, 153, 19, '2', '180', '1080', 0, '2020-01-06 12:13:16', '2020-01-06 12:13:16'),
(30, 153, 23, '4', '180', '1080', 0, '2020-01-06 12:13:16', '2020-01-06 12:13:16'),
(31, 154, 19, '2', '180', '1080', 0, '2020-01-09 12:05:38', '2020-01-09 12:05:38'),
(32, 154, 23, '4', '180', '1080', 0, '2020-01-09 12:05:38', '2020-01-09 12:05:38'),
(33, 155, 19, '3', '180', '1440', 0, '2020-01-27 11:50:39', '2020-01-27 11:50:39'),
(34, 156, 19, '3', '180', '1440', 0, '2020-01-27 11:50:39', '2020-01-27 11:50:39'),
(35, 155, 23, '5', '180', '1440', 0, '2020-01-27 11:50:39', '2020-01-27 11:50:39'),
(36, 156, 23, '5', '180', '1440', 0, '2020-01-27 11:50:39', '2020-01-27 11:50:39');

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
  `payment_id` int(11) NOT NULL,
  `payment_customer_id` int(11) NOT NULL,
  `card_name` varchar(200) NOT NULL,
  `card_number` varchar(200) NOT NULL,
  `cvc` varchar(20) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `exp_year` year(4) NOT NULL,
  `payment_order_id` int(11) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `tokan_id` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_customer_id`, `card_name`, `card_number`, `cvc`, `exp_month`, `exp_year`, `payment_order_id`, `amount`, `tokan_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'visa', '4242424242424242', '123', '12', 2020, 139, '3360', 'tok_1Fw3mXFLT4lBit6njQZe51nJ', 0, '2020-01-01 09:46:28', '2020-01-01 09:46:28'),
(2, 3, 'visa', '4242424242424242', '123', '12', 2020, 140, '3360', 'tok_1Fw3qLFLT4lBit6nEULKEJEM', 0, '2020-01-01 09:50:24', '2020-01-01 09:50:24'),
(3, 3, 'visa', '4242424242424242', '123', '12', 2020, 141, '3360', 'tok_1Fw3rpFLT4lBit6n188RckJj', 0, '2020-01-01 09:51:56', '2020-01-01 09:51:56'),
(4, 3, 'visa', '4242424242424242', '123', '12', 2020, 142, '3360', 'tok_1Fw3txFLT4lBit6ndCTaZF8L', 0, '2020-01-01 09:54:07', '2020-01-01 09:54:07'),
(5, 3, 'visa', '4242424242424242', '123', '12', 2020, 143, '3360', 'tok_1Fw3vGFLT4lBit6nn8dCCUGV', 0, '2020-01-01 09:55:28', '2020-01-01 09:55:28'),
(6, 3, 'visa', '4242424242424242', '123', '12', 2020, 144, '3360', 'tok_1Fw3wWFLT4lBit6nzuf6MvpU', 0, '2020-01-01 09:56:46', '2020-01-01 09:56:46'),
(7, 3, 'visa', '4242424242424242', '123', '12', 2020, 145, '3360', 'tok_1Fw3ydFLT4lBit6nje0j6FFX', 0, '2020-01-01 09:58:58', '2020-01-01 09:58:58'),
(8, 3, 'visa', '4242424242424242', '123', '12', 2020, 146, '3360', 'tok_1Fw4VIFLT4lBit6nQkcltktK', 0, '2020-01-01 10:32:43', '2020-01-01 10:32:43'),
(9, 3, 'visa', '4242424242424242', '123', '12', 2020, 147, '1080', 'tok_1FwQz2FLT4lBit6nFL91yiT0', 0, '2020-01-02 10:32:57', '2020-01-02 10:32:57'),
(10, 3, 'visa', '4242424242424242', '123', '12', 2020, 148, '1080', 'tok_1FwQz1FLT4lBit6nUL8fBZwp', 0, '2020-01-02 10:32:57', '2020-01-02 10:32:57'),
(11, 3, 'visa', '4242424242424242', '123', '12', 2020, 149, '1080', 'tok_1FwR6yFLT4lBit6nnsaYFaLz', 0, '2020-01-02 10:41:06', '2020-01-02 10:41:06'),
(12, 3, 'visa', '4242424242424242', '123', '12', 2020, 150, '1080', 'tok_1FxtvrFLT4lBit6n3c5wDKP5', 0, '2020-01-06 11:39:48', '2020-01-06 11:39:48'),
(13, 3, 'visa', '4242424242424242', '123', '12', 2020, 151, '1080', 'tok_1FxtyhFLT4lBit6ni1wo2yJA', 0, '2020-01-06 11:42:40', '2020-01-06 11:42:40'),
(14, 3, 'visa', '4242424242424242', '123', '12', 2020, 152, '1080', 'tok_1Fxu0WFLT4lBit6nAgspey66', 0, '2020-01-06 11:44:33', '2020-01-06 11:44:33'),
(15, 3, 'visa', '4242424242424242', '123', '12', 2020, 153, '1080', 'tok_1FxuSKFLT4lBit6nkxpck10E', 0, '2020-01-06 12:13:16', '2020-01-06 12:13:16'),
(16, 3, 'visa', '4242424242424242', '123', '12', 2020, 154, '1080', 'tok_1FyzlWFLT4lBit6nlLql7skb', 0, '2020-01-09 12:05:38', '2020-01-09 12:05:38'),
(17, 3, 'visa', '4242424242424242', '123', '12', 2020, 155, '1440', 'tok_1G5W6tFLT4lBit6nBcbOyoVQ', 0, '2020-01-27 11:50:39', '2020-01-27 11:50:39'),
(18, 3, 'visa', '4242424242424242', '123', '12', 2020, 156, '1440', 'tok_1G5W6tFLT4lBit6ntXzAOZdA', 0, '2020-01-27 11:50:39', '2020-01-27 11:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_user_id` int(11) NOT NULL,
  `product_category_id` int(10) NOT NULL,
  `product_sub_category_id` int(10) NOT NULL,
  `product_variation_id` varchar(100) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `product_qty` varchar(200) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_user_id`, `product_category_id`, `product_sub_category_id`, `product_variation_id`, `product_name`, `product_price`, `product_qty`, `product_description`, `status`, `created_at`, `updated_at`) VALUES
(19, 4, 7, 3, '1,11,14', 'blazers', '180', '50', 'These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to and what we like best, every pleasure is to be welcomed and every pain avoided.', 0, '2019-12-03 10:15:48', '2019-12-03 04:45:48'),
(20, 9, 8, 4, '1,13', 'tops', '350', '5', 'wertyuiopc,s amc', 0, '2020-01-01 12:34:17', '2020-01-01 07:04:17'),
(21, 10, 9, 5, '1,11,14', 'footware', '550', '150', 'wertyuiopojhgcvbnm', 0, '2019-12-03 04:46:54', '2019-12-03 04:46:54'),
(22, 4, 7, 3, '1,11,14', 'blazers', '3000', '5', 'edfdfg', 0, '2019-12-09 04:33:27', '2019-12-09 04:33:27'),
(23, 4, 7, 3, '1,13,14', 'usgedsh', '180', '67', 'tyrftftyrtyfty', 0, '2019-12-13 05:32:12', '2019-12-13 05:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `product_image_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_image_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_image_id`, `product_id`, `product_image_name`, `status`, `created_at`, `updated_at`) VALUES
(30, 21, '1575368214_3.jpg', 0, '2019-12-03 04:46:54', '2019-12-03 04:46:54'),
(35, 22, '1575887571_s-1.jpg', 0, '2019-12-09 05:02:51', '2019-12-09 05:02:51'),
(36, 22, '1575887572_s-2.jpg', 0, '2019-12-09 05:02:52', '2019-12-09 05:02:52'),
(37, 22, '1575887572_s-3.jpg', 0, '2019-12-09 05:02:52', '2019-12-09 05:02:52'),
(38, 22, '1575887572_s-4.jpg', 0, '2019-12-09 05:02:52', '2019-12-09 05:02:52'),
(39, 19, '1575888151_1.jpg', 0, '2019-12-09 05:12:31', '2019-12-09 05:12:31'),
(40, 19, '1575888151_2.jpg', 0, '2019-12-09 05:12:31', '2019-12-09 05:12:31'),
(41, 19, '1575888152_3.jpg', 0, '2019-12-09 05:12:32', '2019-12-09 05:12:32'),
(42, 20, '1575888179_5.jpg', 0, '2019-12-09 05:12:59', '2019-12-09 05:12:59'),
(43, 20, '1575888179_6.jpg', 0, '2019-12-09 05:12:59', '2019-12-09 05:12:59'),
(44, 20, '1575888179_7.jpg', 0, '2019-12-09 05:12:59', '2019-12-09 05:12:59'),
(45, 20, '1575888179_8.jpg', 0, '2019-12-09 05:12:59', '2019-12-09 05:12:59'),
(46, 23, '1576234932_1.jpg', 0, '2019-12-13 05:32:12', '2019-12-13 05:32:12'),
(47, 23, '1576234932_2.jpg', 0, '2019-12-13 05:32:12', '2019-12-13 05:32:12'),
(48, 23, '1576234932_3.jpg', 0, '2019-12-13 05:32:12', '2019-12-13 05:32:12'),
(49, 23, '1576234932_4.jpg', 0, '2019-12-13 05:32:12', '2019-12-13 05:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `shipping_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`shipping_id`, `name`, `email`, `contact`, `address`, `state`, `city`, `customer_id`, `order_id`, `payment_id`, `created_at`, `updated_at`) VALUES
(7, 'vijay', 'vijay@gmail.com', '123456879', 'mvksdvkkvjfnjfsnnd', '8', '7', 3, 21, 10, '2019-12-26 09:56:20', '2019-12-26 09:56:20'),
(8, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '8', 3, 22, 11, '2019-12-26 09:58:15', '2019-12-26 09:58:15'),
(9, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '7', 3, 23, 12, '2019-12-26 09:59:31', '2019-12-26 09:59:31'),
(10, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '7', 3, 24, 13, '2019-12-26 10:07:07', '2019-12-26 10:07:07'),
(11, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 25, 14, '2019-12-26 10:20:56', '2019-12-26 10:20:56'),
(12, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 26, 15, '2019-12-26 10:41:43', '2019-12-26 10:41:43'),
(13, 'Skoamd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 27, 16, '2019-12-26 10:43:02', '2019-12-26 10:43:02'),
(14, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '6', 3, 28, 17, '2019-12-26 10:47:42', '2019-12-26 10:47:42'),
(15, 'vijay', 'vijay@gmail.com', '84132256486154', 'dslvdsuicsac hsfviodsnvkds noudls,noxicm kcjvodv diuvjldsvjcvvsdi', '8', '7', 3, 29, 18, '2019-12-26 10:48:38', '2019-12-26 10:48:38'),
(16, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '7', 3, 30, 19, '2019-12-26 10:51:48', '2019-12-26 10:51:48'),
(17, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 31, 20, '2019-12-26 11:01:56', '2019-12-26 11:01:56'),
(18, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '7', 3, 32, 21, '2019-12-26 11:06:36', '2019-12-26 11:06:36'),
(19, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '7', 3, 33, 22, '2019-12-26 11:08:30', '2019-12-26 11:08:30'),
(20, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '5', 3, 34, 23, '2019-12-26 11:10:29', '2019-12-26 11:10:29'),
(21, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '7', 3, 35, 24, '2019-12-26 11:11:16', '2019-12-26 11:11:16'),
(22, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 36, 25, '2019-12-26 11:13:36', '2019-12-26 11:13:36'),
(23, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '8', 3, 37, 26, '2019-12-26 11:15:18', '2019-12-26 11:15:18'),
(24, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 38, 27, '2019-12-26 11:17:45', '2019-12-26 11:17:45'),
(25, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 39, 28, '2019-12-26 11:17:46', '2019-12-26 11:17:46'),
(26, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '8', 3, 40, 29, '2019-12-26 11:22:02', '2019-12-26 11:22:02'),
(27, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 41, 30, '2019-12-26 11:23:25', '2019-12-26 11:23:25'),
(28, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '7', 3, 42, 31, '2019-12-26 11:24:05', '2019-12-26 11:24:05'),
(29, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '7', 3, 43, 32, '2019-12-26 11:25:20', '2019-12-26 11:25:20'),
(30, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 44, 33, '2019-12-26 11:26:22', '2019-12-26 11:26:22'),
(31, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '6', 3, 45, 34, '2019-12-26 11:27:17', '2019-12-26 11:27:17'),
(32, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 46, 35, '2019-12-26 11:28:38', '2019-12-26 11:28:38'),
(33, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 47, 36, '2019-12-26 11:29:56', '2019-12-26 11:29:56'),
(34, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 48, 37, '2019-12-26 11:35:56', '2019-12-26 11:35:56'),
(35, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 49, 38, '2019-12-26 11:36:43', '2019-12-26 11:36:43'),
(36, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 50, 39, '2019-12-26 11:37:44', '2019-12-26 11:37:44'),
(37, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 51, 40, '2019-12-26 11:38:35', '2019-12-26 11:38:35'),
(38, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 52, 41, '2019-12-26 11:41:41', '2019-12-26 11:41:41'),
(39, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 53, 42, '2019-12-26 11:51:40', '2019-12-26 11:51:40'),
(40, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 54, 43, '2019-12-26 11:52:26', '2019-12-26 11:52:26'),
(41, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '6', '4', 3, 55, 44, '2019-12-26 11:53:37', '2019-12-26 11:53:37'),
(42, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 56, 45, '2019-12-26 11:54:25', '2019-12-26 11:54:25'),
(43, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '6', 3, 57, 46, '2019-12-26 12:25:40', '2019-12-26 12:25:40'),
(44, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '7', 3, 58, 47, '2019-12-26 12:26:46', '2019-12-26 12:26:46'),
(45, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 59, 48, '2019-12-26 12:34:58', '2019-12-26 12:34:58'),
(46, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 60, 49, '2019-12-26 12:36:31', '2019-12-26 12:36:31'),
(47, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 61, 50, '2019-12-26 12:37:41', '2019-12-26 12:37:41'),
(48, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 62, 51, '2019-12-26 12:41:14', '2019-12-26 12:41:14'),
(49, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 63, 52, '2019-12-26 12:42:44', '2019-12-26 12:42:44'),
(50, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 64, 53, '2019-12-26 12:44:56', '2019-12-26 12:44:56'),
(51, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 65, 54, '2019-12-26 12:47:26', '2019-12-26 12:47:26'),
(52, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 66, 55, '2019-12-27 09:51:43', '2019-12-27 09:51:43'),
(53, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '6', '4', 3, 67, 56, '2019-12-27 10:42:58', '2019-12-27 10:42:58'),
(54, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '6', '4', 3, 68, 57, '2019-12-27 10:42:58', '2019-12-27 10:42:58'),
(55, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 69, 58, '2019-12-27 10:58:49', '2019-12-27 10:58:49'),
(56, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 70, 59, '2019-12-27 10:58:51', '2019-12-27 10:58:51'),
(57, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 71, 60, '2019-12-27 11:24:51', '2019-12-27 11:24:51'),
(58, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 72, 61, '2019-12-27 11:25:51', '2019-12-27 11:25:51'),
(59, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 73, 62, '2019-12-27 11:25:55', '2019-12-27 11:25:55'),
(60, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 74, 63, '2019-12-27 11:33:46', '2019-12-27 11:33:46'),
(61, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 75, 64, '2019-12-27 11:33:47', '2019-12-27 11:33:47'),
(62, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 76, 65, '2019-12-27 11:33:58', '2019-12-27 11:33:58'),
(63, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 77, 66, '2019-12-27 11:38:43', '2019-12-27 11:38:43'),
(64, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 78, 67, '2019-12-27 11:38:45', '2019-12-27 11:38:45'),
(65, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 79, 68, '2019-12-27 11:39:36', '2019-12-27 11:39:36'),
(66, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 80, 69, '2019-12-27 11:42:19', '2019-12-27 11:42:19'),
(67, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 81, 70, '2019-12-27 11:42:19', '2019-12-27 11:42:19'),
(68, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 82, 71, '2019-12-27 11:42:22', '2019-12-27 11:42:22'),
(69, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 83, 72, '2019-12-27 11:42:24', '2019-12-27 11:42:24'),
(70, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 84, 73, '2019-12-27 11:54:12', '2019-12-27 11:54:12'),
(71, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 85, 74, '2019-12-27 12:05:51', '2019-12-27 12:05:51'),
(72, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '7', 3, 86, 75, '2019-12-27 12:15:10', '2019-12-27 12:15:10'),
(73, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '7', 3, 87, 76, '2019-12-27 12:15:11', '2019-12-27 12:15:11'),
(74, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 88, 77, '2019-12-27 12:16:18', '2019-12-27 12:16:18'),
(75, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '7', 3, 89, 78, '2019-12-27 12:19:15', '2019-12-27 12:19:15'),
(76, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '7', 3, 90, 79, '2019-12-27 12:19:15', '2019-12-27 12:19:15'),
(77, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 91, 80, '2019-12-27 12:23:50', '2019-12-27 12:23:50'),
(78, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 92, 81, '2019-12-27 12:26:49', '2019-12-27 12:26:49'),
(79, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 93, 82, '2019-12-27 12:27:02', '2019-12-27 12:27:02'),
(80, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 94, 83, '2019-12-27 12:31:06', '2019-12-27 12:31:06'),
(81, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 95, 84, '2019-12-27 12:41:06', '2019-12-27 12:41:06'),
(82, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 96, 85, '2019-12-27 12:49:43', '2019-12-27 12:49:43'),
(83, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 97, 86, '2019-12-27 12:49:45', '2019-12-27 12:49:45'),
(84, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 98, 87, '2019-12-27 12:57:42', '2019-12-27 12:57:42'),
(85, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 99, 88, '2019-12-27 12:57:44', '2019-12-27 12:57:44'),
(86, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '5', 3, 100, 89, '2019-12-27 13:01:00', '2019-12-27 13:01:00'),
(87, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '5', 3, 101, 90, '2019-12-27 13:01:01', '2019-12-27 13:01:01'),
(88, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '5', 3, 102, 91, '2019-12-27 13:01:04', '2019-12-27 13:01:04'),
(89, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '5', 3, 103, 92, '2019-12-27 13:02:14', '2019-12-27 13:02:14'),
(90, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '5', 3, 104, 93, '2019-12-27 13:02:16', '2019-12-27 13:02:16'),
(91, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '6', 3, 105, 94, '2019-12-27 13:05:53', '2019-12-27 13:05:53'),
(92, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '6', 3, 106, 95, '2019-12-27 13:05:57', '2019-12-27 13:05:57'),
(93, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 107, 96, '2019-12-30 09:33:50', '2019-12-30 09:33:50'),
(94, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 108, 97, '2019-12-30 11:12:12', '2019-12-30 11:12:12'),
(95, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 109, 98, '2019-12-30 11:14:51', '2019-12-30 11:14:51'),
(96, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 110, 99, '2019-12-30 11:15:31', '2019-12-30 11:15:31'),
(97, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 111, 100, '2019-12-30 11:15:32', '2019-12-30 11:15:32'),
(98, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 112, 101, '2019-12-30 11:16:11', '2019-12-30 11:16:11'),
(99, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 113, 102, '2019-12-30 11:19:24', '2019-12-30 11:19:24'),
(100, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 114, 103, '2019-12-30 12:22:44', '2019-12-30 12:22:44'),
(101, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 115, 104, '2019-12-30 12:30:27', '2019-12-30 12:30:27'),
(102, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 116, 105, '2019-12-31 09:17:11', '2019-12-31 09:17:11'),
(103, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 117, 106, '2019-12-31 09:17:12', '2019-12-31 09:17:12'),
(104, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 118, 107, '2019-12-31 09:19:00', '2019-12-31 09:19:00'),
(105, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 119, 108, '2019-12-31 09:22:47', '2019-12-31 09:22:47'),
(106, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '7', 3, 120, 109, '2019-12-31 09:42:45', '2019-12-31 09:42:45'),
(107, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 121, 110, '2019-12-31 09:43:12', '2019-12-31 09:43:12'),
(108, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 122, 111, '2019-12-31 09:44:53', '2019-12-31 09:44:53'),
(109, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 123, 112, '2019-12-31 09:51:34', '2019-12-31 09:51:34'),
(110, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '6', '4', 3, 124, 113, '2019-12-31 09:51:36', '2019-12-31 09:51:36'),
(111, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 125, 114, '2019-12-31 09:53:44', '2019-12-31 09:53:44'),
(112, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 126, 115, '2019-12-31 12:34:17', '2019-12-31 12:34:17'),
(113, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 127, 116, '2019-12-31 12:42:36', '2019-12-31 12:42:36'),
(114, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '6', 3, 128, 117, '2019-12-31 12:46:24', '2019-12-31 12:46:24'),
(115, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '6', 3, 129, 118, '2019-12-31 12:48:52', '2019-12-31 12:48:52'),
(116, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 130, 119, '2019-12-31 12:53:59', '2019-12-31 12:53:59'),
(117, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '7', 3, 131, 120, '2019-12-31 12:54:33', '2019-12-31 12:54:33'),
(118, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '8', 3, 132, 121, '2019-12-31 12:57:18', '2019-12-31 12:57:18'),
(119, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '5', 3, 133, 122, '2019-12-31 13:17:56', '2019-12-31 13:17:56'),
(120, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '8', 3, 134, 123, '2019-12-31 14:03:16', '2019-12-31 14:03:16'),
(121, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 136, 125, '2020-01-01 09:29:33', '2020-01-01 09:29:33'),
(122, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 135, 124, '2020-01-01 09:29:33', '2020-01-01 09:29:33'),
(123, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 137, 126, '2020-01-01 09:30:42', '2020-01-01 09:30:42'),
(124, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 138, 127, '2020-01-01 09:31:45', '2020-01-01 09:31:45'),
(125, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '8', 3, 139, 1, '2020-01-01 09:46:28', '2020-01-01 09:46:28'),
(126, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 140, 2, '2020-01-01 09:50:24', '2020-01-01 09:50:24'),
(127, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 141, 3, '2020-01-01 09:51:56', '2020-01-01 09:51:56'),
(128, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '6', 3, 142, 4, '2020-01-01 09:54:07', '2020-01-01 09:54:07'),
(129, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '7', 3, 143, 5, '2020-01-01 09:55:29', '2020-01-01 09:55:29'),
(130, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '8', 3, 144, 6, '2020-01-01 09:56:46', '2020-01-01 09:56:46'),
(131, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '8', 3, 145, 7, '2020-01-01 09:58:58', '2020-01-01 09:58:58'),
(132, 'Iejd', 'skkag@gmail.com', '646495', 'Jdisjd', '8', '6', 3, 146, 8, '2020-01-01 10:32:43', '2020-01-01 10:32:43'),
(133, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '6', '4', 3, 147, 9, '2020-01-02 10:32:57', '2020-01-02 10:32:57'),
(134, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '6', '4', 3, 148, 10, '2020-01-02 10:32:57', '2020-01-02 10:32:57'),
(135, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '6', 3, 149, 11, '2020-01-02 10:41:06', '2020-01-02 10:41:06'),
(136, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '6', 3, 155, 17, '2020-01-27 11:50:39', '2020-01-27 11:50:39'),
(137, 'Skoamd', 'nzoanxm@gamil.com', '+4494898', 'Sjsomcc', '8', '6', 3, 156, 18, '2020-01-27 11:50:40', '2020-01-27 11:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(10) NOT NULL,
  `state_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Andhra Prades', 0, '2019-10-11 10:06:15', '2019-10-11 04:36:15'),
(6, 'MAHARASTRA', 0, '2019-10-01 04:34:07', '2019-10-01 04:34:07'),
(7, 'Rj', 0, '2019-10-09 04:31:57', '2019-10-09 04:31:57'),
(8, 'Gujarat', 0, '2019-10-09 04:34:20', '2019-10-09 04:34:20'),
(9, 'hariyana', 0, '2019-12-09 07:06:22', '2019-12-09 07:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `subscribe_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `s_mail` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`subscribe_id`, `customer_id`, `s_mail`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'test@gmail.com', 0, '2020-01-02 10:09:01', '2020-01-02 10:09:01'),
(2, 3, 'archanlathiya222@gmail.com', 0, '2020-01-02 10:09:23', '2020-01-02 10:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_id` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_id`, `category_id`, `sub_category_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 7, 'Blazers', 0, '2019-11-29 06:44:59', '2019-11-29 06:44:59'),
(4, 8, 'Tops', 0, '2019-11-29 06:46:05', '2019-11-29 06:46:05'),
(5, 9, 'Footwear', 0, '2019-11-29 06:46:37', '2019-11-29 06:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hobby` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `gender`, `hobby`, `dob`, `address`, `state`, `city`, `image`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(4, 'vijay123', 'vijay@gmail.com', NULL, '$2y$10$CmQGoXjBOQD09Extc8isNOrhMG3Yk8VPYdr2KKvSVGu7ZbabHhqXS', 'male', 'reading,dancing', '2019-11-29', 'qwertyuio', '8', '5', 'Ak134luyWjIwFWLBFQP0WoTYAWI7ZUdvGwnZ3hwH.jpeg', NULL, 0, '2019-11-21 05:59:19', '2019-11-25 04:09:58'),
(9, 'aa', 'aa@gmail.com', NULL, '$2y$10$Fwfh3mIAHh7JV4aBvMFE7.qfnnSroWjiybcfY1sgzqAEmZADMxuJG', 'male', 'reading', '2019-11-30', 'qwertyuiop', '8', '---------select city---------', 'svi7P2GUI8XxQqzSvVeoRzK0f1ezOtqE2X3W3SVX.jpeg', NULL, 0, '2019-11-26 05:09:32', '2019-11-26 05:09:32'),
(10, 'aa', 'a1@gmail.com', NULL, '$2y$10$FcLeTpd3xeBQD0Z8dCGUF.d6H7MeyyyRvND3E/rZz1K7BjG.MDS.S', 'male', 'reading,dancing', '2019-11-25', 'qwertyuiopppkjhgfdsazxcvbnm', '8', '8', 'DVsEEStlpxaN0s2ZXAmTvuJNieMVWLQugaUfJ7k2.jpeg', NULL, 0, '2019-11-26 05:10:40', '2020-01-02 05:37:19'),
(11, 'vijay', 'vijay296@gmail.com', NULL, '$2y$10$/9QEcfTi9j0/YTxMmm8SE.vZQ/qAvz0oujpeiGm85U7B2DVdTJuJi', 'male', 'reading', '2020-01-14', 'qwertyuioplkjhgfdsaz', '8', '5', 'AarR8ULEtYaQpXetfRaINIhW8nxCS0zST3cBHnKs.jpeg', NULL, 0, '2020-01-02 05:39:35', '2020-01-02 05:40:34'),
(12, 'archan', 'archanlathiya222@gmail.com', NULL, '$2y$10$WrtLvOBWhooSAxlMHfYG2uXJnhFwOgFzIZIiDxlPcb/2FtzgtEHcS', 'male', 'dancing', '2020-01-24', 'qwertyuiolkjhgfdsazxcvbnm', '8', '6', 'V54KhdgAD1qc9LlMumTLvXd6Vj79zcPiaVPulN7o.jpeg', NULL, 0, '2020-01-02 06:22:56', '2020-01-08 05:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `variation_id` int(10) NOT NULL,
  `variation_type_id` int(10) NOT NULL,
  `variation_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`variation_id`, `variation_type_id`, `variation_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'puma', 0, '2019-10-14 05:39:08', '2019-10-14 05:39:08'),
(11, 4, 'green', 0, '2019-10-14 17:48:18', '2019-10-14 12:18:18'),
(13, 4, 'blue', 0, '2019-10-14 11:47:45', '2019-10-14 11:47:45'),
(14, 5, '32', 0, '2019-10-14 11:54:12', '2019-10-14 11:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `variation_types`
--

CREATE TABLE `variation_types` (
  `variation_type_id` int(10) NOT NULL,
  `variation_type_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variation_types`
--

INSERT INTO `variation_types` (`variation_type_id`, `variation_type_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'brands', 0, '2019-10-14 07:20:09', '2019-10-14 01:50:09'),
(4, 'color', 0, '2019-10-14 01:34:47', '2019-10-14 01:34:47'),
(5, 'size', 0, '2019-10-14 01:35:01', '2019-10-14 01:35:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category_id` (`product_category_id`),
  ADD KEY `product_sub_category_id` (`product_sub_category_id`),
  ADD KEY `product_user_id` (`product_user_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`subscribe_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`variation_id`),
  ADD KEY `variation_type_id` (`variation_type_id`);

--
-- Indexes for table `variation_types`
--
ALTER TABLE `variation_types`
  ADD PRIMARY KEY (`variation_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `product_image_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `subscribe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `variation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `variation_types`
--
ALTER TABLE `variation_types`
  MODIFY `variation_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `state_id` FOREIGN KEY (`state_id`) REFERENCES `states` (`state_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_category_id` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_sub_category_id` FOREIGN KEY (`product_sub_category_id`) REFERENCES `sub_categories` (`sub_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
