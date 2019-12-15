-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 
-- サーバのバージョン： 10.4.8-MariaDB
-- PHP のバージョン: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `tcmsdb`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `claims`
--

CREATE TABLE `claims` (
  `claim_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `claim_date` timestamp NULL DEFAULT NULL,
  `claim_make_date` timestamp NULL DEFAULT NULL,
  `claim_sent_date` timestamp NULL DEFAULT NULL,
  `pay_date` timestamp NULL DEFAULT NULL,
  `pay_price` bigint(20) DEFAULT NULL,
  `price_total` bigint(20) NOT NULL COMMENT '合計金額',
  `tax_rate` int(11) NOT NULL,
  `tax` bigint(20) NOT NULL COMMENT '消費税',
  `taxed_price` bigint(20) NOT NULL COMMENT '税込み金額',
  `discount_price` bigint(20) NOT NULL COMMENT '値引き',
  `offset_price` bigint(20) NOT NULL COMMENT '相殺額',
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

--
-- テーブルのデータのダンプ `claims`
--

INSERT INTO `claims` (`claim_id`, `company_id`, `user_id`, `price`, `claim_date`, `claim_make_date`, `claim_sent_date`, `pay_date`, `pay_price`, `price_total`, `tax_rate`, `tax`, `taxed_price`, `discount_price`, `offset_price`, `details`, `history`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5000000000000000, '2019-12-09 15:00:00', '2019-12-25 15:00:00', '2019-12-17 15:00:00', NULL, 1200000000000000, 0, 0, 0, 0, 0, 0, '[{\"cont_id\":1,\"cont_text\":\"工事1\",\"text\":\"工事１-土木一式a\",\"unit_price\":3500000,\"qty\":1,\"price\":3500000,\"deleted\":false},{\"cont_id\":2,\"cont_text\":\"工事2\",\"text\":\"工事2-河川改修aaaa\",\"unit_price\":3500000,\"qty\":1,\"price\":3500000,\"deleted\":false}]', NULL, NULL, NULL, '2019-12-13 09:06:18');

-- --------------------------------------------------------

--
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `cont_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment_no` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

-- --------------------------------------------------------

--
-- テーブルの構造 `company`
--

CREATE TABLE `company` (
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `nickname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_customer` int(11) NOT NULL,
  `is_subcon` int(11) NOT NULL,
  `closing` int(11) NOT NULL,
  `closing_day` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `payment_day` int(11) NOT NULL,
  `zip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `company`
--

INSERT INTO `company` (`company_id`, `nickname`, `fullname`, `is_customer`, `is_subcon`, `closing`, `closing_day`, `payment`, `payment_day`, `zip`, `address`, `tel`, `fax`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '取引先１', '株式会社　取引先１', 1, 1, 1, 1, 1, 1, '874-0034', '大分県別府市上人仲町1-1', '0978-44-0077', '0978-44-0088', NULL, NULL, NULL),
(2, '宇佐建機', '宇佐建機', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:40:09', '2019-12-14 06:40:09'),
(3, 'さとう建設', 'さとう建設', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(4, '大和建材', '大和建材', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(5, '別府商事', '別府商事', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(6, 'あいおい商店', 'あいおい商店', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(7, '大分建材', '大分建材', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(8, '秋月建設', '秋月建設', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(9, '中津建材', '中津建材', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(10, 'ふそうリース', 'ふそうリース', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(11, '大和商事', '大和商事', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(12, '秋月商店', '秋月商店', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(13, '双葉建機', '双葉建機', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(14, '三和商事', '三和商事', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(15, 'すずき建機', 'すずき建機', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(16, '双葉建機', '双葉建機', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(17, 'ふそう商事', 'ふそう商事', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(18, '別府建材', '別府建材', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(19, '扶桑建設', '扶桑建設', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(20, '三浦建材', '三浦建材', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(21, '大分土木', '大分土木', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(22, '双葉商事', '双葉商事', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(23, '三浦建機', '三浦建機', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(24, '双葉リース', '双葉リース', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(25, '大和土木', '大和土木', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(26, 'ふそう商事', 'ふそう商事', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(27, '中津土木', '中津土木', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(28, '双葉リース', '双葉リース', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(29, '三友商事', '三友商事', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(30, '秋月土木', '秋月土木', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(31, '三浦商事', '三浦商事', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(32, 'さとう商事', 'さとう商事', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41'),
(33, '三和建設', '三和建設', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '2019-12-14 06:41:41', '2019-12-14 06:41:41');

-- --------------------------------------------------------

--
-- テーブルの構造 `constructs`
--

CREATE TABLE `constructs` (
  `const_id` bigint(20) UNSIGNED NOT NULL,
  `cont_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `const_type` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `state` int(11) NOT NULL,
  `progress` double(8,2) NOT NULL,
  `resource_cost` bigint(20) NOT NULL,
  `person_cost` bigint(20) NOT NULL,
  `histry` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

-- --------------------------------------------------------

--
-- テーブルの構造 `consttypes`
--

CREATE TABLE `consttypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `contructs`
--

CREATE TABLE `contructs` (
  `cont_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_company_id` bigint(20) NOT NULL,
  `cust_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `budget_remain` bigint(20) NOT NULL,
  `state` int(11) NOT NULL,
  `exec_budget` bigint(20) NOT NULL,
  `price_taxed` bigint(20) NOT NULL,
  `claim_remain` bigint(20) NOT NULL,
  `deposit_remain` bigint(20) NOT NULL,
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `sales_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `const_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `contructs`
--

INSERT INTO `contructs` (`cont_id`, `name`, `date_from`, `date_to`, `customer`, `cust_company_id`, `cust_company`, `cust_person`, `price`, `budget_remain`, `state`, `exec_budget`, `price_taxed`, `claim_remain`, `deposit_remain`, `documents`, `comment`, `sales_person`, `const_admin`, `update_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '工事１-2', '2019-11-15', '2020-01-19', '施主11', 1, '発注元１', NULL, 20000000, 0, 0, 14000000, 500000000, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2019-12-08 07:13:58'),
(2, 'aaaaaaaa', '2019-12-01', '2019-12-31', '辻田兼臣', 0, '有限会社辻田建機', NULL, 5000000000, 0, 0, 330000000, 60000000, 50000000, 50000000, NULL, NULL, NULL, NULL, 0, NULL, '2019-12-08 07:32:29', '2019-12-08 16:41:18'),
(3, '工事１-3', '2019-11-15', '2020-01-19', '施主11', 1, '発注元１', NULL, 40000000, 0, 0, 14000000, 500000000, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2019-12-08 07:13:58');

-- --------------------------------------------------------

--
-- テーブルの構造 `deposit`
--

CREATE TABLE `deposit` (
  `depo_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `depo_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[]'
) ;

--
-- テーブルのデータのダンプ `deposit`
--

INSERT INTO `deposit` (`depo_id`, `company_id`, `depo_date`, `price`, `user_id`, `history`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-12-14 07:37:30', 200000000, 1, '[]', NULL, '2019-12-14 07:37:30', '2019-12-14 07:37:30');

-- --------------------------------------------------------

--
-- テーブルの構造 `deposit_disp`
--

CREATE TABLE `deposit_disp` (
  `depo_id` bigint(20) NOT NULL,
  `claim_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
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
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_28_013128_create_contructs_table', 1),
(5, '2019_12_02_021009_create_constructs_table', 1),
(7, '2019_12_02_021251_create_comments_table', 1),
(8, '2019_12_02_021312_create_orders_table', 1),
(9, '2019_12_11_081827_create_consttypes_table', 2),
(10, '2019_12_12_043548_create_company_table', 3),
(11, '2019_12_02_021228_create_claims_table', 4),
(12, '2019_12_14_054243_create_deposit_table', 5),
(13, '2019_12_14_054349_create_deposit_disp_table', 5);

-- --------------------------------------------------------

--
-- テーブルの構造 `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `cont_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_date` date NOT NULL,
  `item_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_to` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `tax_rate` int(11) NOT NULL,
  `tax` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `claims` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, '利用者１', 'nagano-m@tsujita-group.com', NULL, '$2y$10$86kWLjuIfcv1Ae8HrxX41ObtX1r7nZTBSqnrJLLvyKdwsOakn/Rye', '26yh4vbxiNafcHmJQL8MEe0UQq4UPoUttyAVHENIjAkmhTIe9NB1yabQ9bGU', '', '2019-12-06 03:15:35', '2019-12-06 03:15:35');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- テーブルのインデックス `consttypes`
--
ALTER TABLE `consttypes`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `contructs`
--
ALTER TABLE `contructs`
  ADD PRIMARY KEY (`cont_id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `claims`
--
ALTER TABLE `claims`
  MODIFY `claim_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `company`
--
ALTER TABLE `company`
  MODIFY `company_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- テーブルのAUTO_INCREMENT `constructs`
--
ALTER TABLE `constructs`
  MODIFY `const_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `consttypes`
--
ALTER TABLE `consttypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `contructs`
--
ALTER TABLE `contructs`
  MODIFY `cont_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `deposit`
--
ALTER TABLE `deposit`
  MODIFY `depo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルのAUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
