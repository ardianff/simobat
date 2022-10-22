-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `medicines`;
CREATE TABLE `medicines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_made` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medicines_created_by_foreign` (`created_by`),
  CONSTRAINT `medicines_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `medicines` (`id`, `medicine_name`, `medicine_made`, `expiry_date`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Esse similique in.',	'PT. Kimia Farma Tbk',	'2008-04-30',	1,	'2022-10-21 21:38:51',	'2022-10-22 04:03:06',	'2022-10-22 04:03:06'),
(2,	'Reprehenderit sit nihil.',	'PT. Kimia Farma Tbk',	'1976-08-09',	1,	'2022-10-21 21:38:51',	'2022-10-22 04:06:50',	'2022-10-22 04:06:50'),
(3,	'Vitamin B6 Kimia Farma 10 mg 10 Tablet 1 Setrip',	'PT. Kimia Farma Tbk',	'2025-12-31',	8,	'2022-10-21 21:38:51',	'2022-10-22 13:33:24',	NULL),
(4,	'ERCEEVIT SYR 110ML',	'PT. Kimia Farma Tbk',	'2022-06-30',	3,	'2022-10-21 21:38:51',	'2022-10-22 05:00:32',	NULL),
(5,	'Quis reiciendis amet.',	'PT. Kimia Farma Tbk',	'2021-11-25',	8,	'2022-10-21 21:38:51',	'2022-10-22 13:33:15',	NULL),
(6,	'Paracetamol',	'PT. Konimex',	'2022-10-22',	4,	'2022-10-22 04:34:03',	'2022-10-22 04:34:03',	NULL),
(7,	'ANTIDINE 20MG TABLET',	'PT. Kimia Farma Tbk',	'2022-09-25',	4,	'2022-10-22 13:22:42',	'2022-10-22 13:22:42',	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2022_10_22_041023_create_medicines_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Miss Piper Upton',	'hermann.carli@example.com',	'2022-10-21 21:38:51',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Sus6epdgcMk4ySd4hL1v5KDJMSQHsQHlCheaqFdsXqU6aILOq5GHC8cP0c7l',	'2022-10-21 21:38:51',	'2022-10-21 21:38:51'),
(2,	'Favian O\'Hara DVM',	'stamm.percival@example.com',	'2022-10-21 21:38:51',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'2KxNGJbeY5',	'2022-10-21 21:38:51',	'2022-10-21 21:38:51'),
(3,	'Dave Kshlerin',	'kirlin.ruben@example.net',	'2022-10-21 21:38:51',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'2a9TYdnbZq',	'2022-10-21 21:38:51',	'2022-10-21 21:38:51'),
(4,	'Ardian Ferdy Firmansyah',	'ardianfirmansyah123@gmail.com',	'2022-10-22 00:13:30',	'$2y$10$27uQB9.33wNxCZU5DA8aIu7FTAGmMLyI4rEAI1iJLUohJwAqjEdJq',	'HlKMO4Jene2J93PXKDxcUDuSHWBGPEj77EYonvsVQ1z4JiVuUb7OOOQzHZD4',	'2022-10-21 21:38:51',	'2022-10-22 13:12:05'),
(5,	'Ahmad Senjaya',	'customranked@gmail.com',	NULL,	'$2y$10$kf4eLyPSbwo.DjoLSKKL3OER6kSsDanb/dp1zuMTeRdMetRg7ITr6',	NULL,	'2022-10-21 22:05:48',	'2022-10-21 22:05:48'),
(6,	'Ahmad',	'coba@gmail.com',	NULL,	'$2y$10$pDZcrBnzMF6yTvnCdB6pvOdbzg3ES/SHSLntMyMPFMPPHGBiJIgwa',	NULL,	'2022-10-21 23:09:51',	'2022-10-21 23:09:51'),
(7,	'Rakha Janendra',	'help@gmail.com',	NULL,	'$2y$10$A6hVsyd5YwkOfrL51jEgMePUl5g7/oDzjIQ3o.6LTw.5qYu5kobXO',	NULL,	'2022-10-22 13:26:53',	'2022-10-22 13:26:53'),
(8,	'Rakha Janoko',	'help1@gmail.com',	NULL,	'$2y$10$jVl1kSUT/BfgGX9ea/KtdO/g8UMh48RRwh40wQKyd87C6Hu0.GHrC',	NULL,	'2022-10-22 13:28:33',	'2022-10-22 13:28:33'),
(9,	'Rahmad',	'rahmad123@gmail.com',	NULL,	'$2y$10$qqeNX78Sh4M6zD85CgpFQuhSabrxAHmA3jUpNO9hb6nBBWh3rECXi',	NULL,	'2022-10-22 13:34:20',	'2022-10-22 13:34:20');

-- 2022-10-22 13:47:03
