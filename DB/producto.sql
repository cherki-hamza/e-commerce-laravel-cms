-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2020 at 01:26 AM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.3.20-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `producto`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2020_07_29_145814_create_products_table', 1),
(13, '2020_07_29_150221_create_profiles_table', 1),
(14, '2020_08_05_140527_add_softdelete_column_to_products_table', 2),
(15, '2020_08_06_172347_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `cart`, `created_at`, `updated_at`) VALUES
(1, 2, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:3:{i:22;a:4:{s:5:\"title\";s:9:\"product 4\";s:5:\"price\";s:2:\"60\";s:3:\"qty\";i:2;s:5:\"image\";s:31:\"/images/products/1596654549.jpg\";}i:21;a:4:{s:5:\"title\";s:9:\"product 3\";s:5:\"price\";s:3:\"200\";s:3:\"qty\";i:1;s:5:\"image\";s:31:\"/images/products/1596654515.jpg\";}i:20;a:4:{s:5:\"title\";s:9:\"product 2\";s:5:\"price\";s:2:\"50\";s:3:\"qty\";i:1;s:5:\"image\";s:31:\"/images/products/1596645170.jpg\";}}s:8:\"totalQty\";i:4;s:10:\"totalPrice\";i:370;}', '2020-08-06 16:49:50', '2020-08-06 16:49:50'),
(2, 2, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:6:{i:19;a:4:{s:5:\"title\";s:9:\"product 1\";s:5:\"price\";s:3:\"100\";s:3:\"qty\";i:1;s:5:\"image\";s:31:\"/images/products/1596644769.jpg\";}i:22;a:4:{s:5:\"title\";s:9:\"product 4\";s:5:\"price\";s:2:\"60\";s:3:\"qty\";i:3;s:5:\"image\";s:31:\"/images/products/1596654549.jpg\";}i:24;a:4:{s:5:\"title\";s:9:\"product 6\";s:5:\"price\";s:3:\"700\";s:3:\"qty\";i:2;s:5:\"image\";s:31:\"/images/products/1596654617.jpg\";}i:26;a:4:{s:5:\"title\";s:4:\"dell\";s:5:\"price\";s:4:\"5000\";s:3:\"qty\";i:1;s:5:\"image\";s:31:\"/images/products/1596723382.png\";}i:25;a:4:{s:5:\"title\";s:9:\"product 7\";s:5:\"price\";s:2:\"90\";s:3:\"qty\";i:3;s:5:\"image\";s:31:\"/images/products/1596654653.jpg\";}i:23;a:4:{s:5:\"title\";s:9:\"product 5\";s:5:\"price\";s:2:\"30\";s:3:\"qty\";i:1;s:5:\"image\";s:31:\"/images/products/1596654578.jpg\";}}s:8:\"totalQty\";i:11;s:10:\"totalPrice\";i:6980;}', '2020-08-06 17:07:48', '2020-08-06 17:07:48'),
(3, 2, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:3:{i:25;a:5:{s:2:\"id\";i:25;s:5:\"title\";s:9:\"product 7\";s:5:\"price\";s:2:\"90\";s:3:\"qty\";s:1:\"2\";s:5:\"image\";s:31:\"/images/products/1596654653.jpg\";}i:23;a:5:{s:2:\"id\";i:23;s:5:\"title\";s:9:\"product 5\";s:5:\"price\";s:2:\"30\";s:3:\"qty\";s:1:\"3\";s:5:\"image\";s:31:\"/images/products/1596654578.jpg\";}i:19;a:5:{s:2:\"id\";i:19;s:5:\"title\";s:9:\"product 1\";s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"5\";s:5:\"image\";s:31:\"/images/products/1596644769.jpg\";}}s:8:\"totalQty\";i:10;s:10:\"totalPrice\";i:770;}', '2020-08-06 20:45:24', '2020-08-06 20:45:24'),
(4, 1, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:19;a:5:{s:2:\"id\";i:19;s:5:\"title\";s:9:\"product 1\";s:5:\"price\";s:3:\"100\";s:3:\"qty\";i:1;s:5:\"image\";s:31:\"/images/products/1596644769.jpg\";}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:100;}', '2020-08-07 21:49:33', '2020-08-07 21:49:33');

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
('cherki0hamza@gmail.com', '$2y$10$xT43rpxnK5WOIGe.rEK93e3JJnVxgkRv1886BMhhMBKjSC8zJSJA6', '2020-08-05 16:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_picture`, `product_desc`, `product_price`, `product_qt`, `product_total_price`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 'product 1', '/images/products/1596644769.jpg', 'desc 1', '100', '10', '1000', 1, '2020-08-05 15:26:09', '2020-08-05 17:51:10', NULL),
(20, 'product 2', '/images/products/1596645170.jpg', 'desc for product 2', '50', '5', '250', 1, '2020-08-05 15:32:50', '2020-08-05 17:51:11', NULL),
(21, 'product 3', '/images/products/1596654515.jpg', 'desc for product 3', '200', '30', '6000', 1, '2020-08-05 18:08:35', '2020-08-05 18:08:35', NULL),
(22, 'product 4', '/images/products/1596654549.jpg', 'desc for product 4', '60', '15', '900', 1, '2020-08-05 18:09:09', '2020-08-05 18:09:09', NULL),
(23, 'product 5', '/images/products/1596654578.jpg', 'desc for product 5', '30', '25', '750', 1, '2020-08-05 18:09:38', '2020-08-06 15:32:45', NULL),
(24, 'product 6', '/images/products/1596654617.jpg', 'desc for product 6', '700', '12', '8400', 1, '2020-08-05 18:10:17', '2020-08-05 18:10:17', NULL),
(25, 'product 7', '/images/products/1596654653.jpg', 'desc for product 7', '90', '200', '18000', 1, '2020-08-05 18:10:53', '2020-08-05 18:10:53', NULL),
(26, 'dell', '/images/products/1596723382.png', 'desc for dell', '5000', '6', '30000', 2, '2020-08-06 13:16:22', '2020-08-06 15:33:28', NULL),
(27, 'mac', '/images/products/1596723519.jpg', 'desc for mac book', '6000', '12', '72000', 2, '2020-08-06 13:18:39', '2020-08-06 14:28:48', NULL),
(28, 'audi', '/images/products/1596727858.jpeg', 'desc for audi', '100000', '3', '300000', 4, '2020-08-06 14:30:58', '2020-08-06 14:49:09', NULL),
(29, 'mercedess', '/images/products/1596727903.jpeg', 'desc for mercedess', '800000', '4', '3200000', 4, '2020-08-06 14:31:43', '2020-08-06 14:31:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `about`, `picture`, `tel`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'i\'m a developer web full stack 2020', 'http://gravatar.com/avatar/3183058c307a193130e3ca2ae367dd75', '+212 0637806939', 'cherki0hamza@gmail.com', 1, '2020-07-30 01:24:41', '2020-07-30 16:00:38'),
(2, 'i\'m a developer web full stack', '/images/users/1596644008.png', '+212 0637806939', 'hpac@gmail.fr', 2, '2020-07-30 14:19:03', '2020-08-05 15:13:28'),
(3, NULL, 'http://gravatar.com/avatar/8cd6a8a63371aa03adc623247c4a9330', NULL, NULL, 3, '2020-07-30 14:19:33', '2020-07-30 14:19:33'),
(4, 'i\'m a developer web full stack 2021', 'http://gravatar.com/avatar/6ac0b7c98286775f3517d0410789c6c4', '+212 0637806939', 'fullstack@gmail.com', 4, '2020-07-30 14:20:22', '2020-07-30 17:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','editor','viewer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'viewer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cherki hamza', 'cherki0hamza@gmail.com', 'admin', NULL, '$2y$10$B901mn/5hifwQ7c45il7KudfamdJ8IpNReVgQ7AjAYH68t8H2ePmC', 'K2nXv1s28UG2EcnLzXzxMobok98f0SU5F6dMhPzpq2I0v30CGmIJgIeBe5l2', '2020-07-30 01:24:41', '2020-08-06 10:49:24'),
(2, 'hpac', 'hpac@gmail.fr', 'viewer', NULL, '$2y$10$NwkIINaCSqRIC/Dfn9ruvOZK9qTVRPaAoeuyOl.0x1tXXk/RhvITi', 'HkaySh4nt1XvtnzmAhZGiAtImzufR1pUkKqaNB5V3Uxea97zQba2EYTYyyZC', '2020-07-30 14:19:03', '2020-08-06 14:21:15'),
(4, 'full stack', 'hamza.cherki2019@gmail.com', 'viewer', NULL, '$2y$10$y1BxiHJFHYpQjJkhO.jtIecWVbkiOTxNtwp6y8M2UjRdInoA4zzQ2', NULL, '2020-07-30 14:20:22', '2020-07-30 17:24:31');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_title_unique` (`product_title`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
