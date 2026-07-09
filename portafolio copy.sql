
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS `certifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS `dashboard_visits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `month_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visits` int unsigned NOT NULL DEFAULT '1430',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dashboard_visits_month_key_unique` (`month_key`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

REPLACE INTO `dashboard_visits` (`id`, `month_key`, `visits`, `created_at`, `updated_at`) VALUES
	(1, '2026-05', 1478, '2026-05-21 02:37:31', '2026-05-21 03:50:32');

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_05_13_205405_create_projects_table', 2),
	(5, '2026_05_13_220000_create_translations_table', 3),
	(6, '2026_05_20_000000_create_certifications_table', 4),
	(7, '2026_05_20_000001_add_image_to_certifications_table', 5),
	(8, '2026_05_20_000002_create_dashboard_visits_table', 6),
	(9, '2026_05_20_000003_create_contact_messages_table', 7);
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `technologies` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Completado','En Progreso','Planificado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Progreso',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
REPLACE INTO `projects` (`id`, `title`, `description`, `technologies`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Sistema Dropshipping con Shopify', 'Sistema completo de dropshipping integrado con Shopify y gestión de coordinadora para entregas automáticas.', 'Laravel + Shopify + Coordinadora', 'En Progreso', '2026-05-14 01:56:20', '2026-05-14 01:56:20'),
	(2, 'Sistema Automatización IA + WhatsApp', 'Plataforma de automatización de procesos empresariales con integración de inteligencia artificial y WhatsApp API para comunicación directa con clientes.', 'EasyPanel + Evolution API + N8N + Goflow API', 'Completado', '2026-05-14 01:56:26', '2026-05-14 01:56:26'),
	(3, 'Red Social Emergente', 'Red social moderna diseñada para profesionales backend con features de conexión, compartir proyectos y colaboración en tiempo real.', 'Laravel + Vue.js + PostgreSQL', 'Completado', '2026-05-14 01:56:30', '2026-05-14 01:56:30');
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('0qPgHEKNcvextVz58tp1yCWB1gjBVCs7dZxTD1TX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Microsoft Windows 10.0.26200; es-CO) PowerShell/7.6.0', 'eyJfdG9rZW4iOiJ2TWlmRUVpbVpKd09iS0FadHJKS05oMzU0YUtxZ3lxMWlrVFZBd0dCIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1779313144),
	('AWiIugwllmFefE4TA2U5JGQPNBQilYhlGbzDik33', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.120.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36', 'eyJfdG9rZW4iOiJVMDY1aFl3RGlHSG95TnBDeDBqOE1ZcTBhQXQ3bkxmdEUydkJEYVJRIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1779317432),
	('ECWLIKiwSu3C4PbBmBUfm6VbCu6KajxuskMDYfjE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Microsoft Windows 10.0.26200; es-CO) PowerShell/7.6.0', 'eyJfdG9rZW4iOiJQUjB5d093T21UYVlnaWRLZTFBbnR6ZjY4NEhWbFBUaVBSWmhqVkFhIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1779313771),
	('HlGRLml4epGXxc4ZSpDrhNfrTO45m9NIq9KKo9aM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Microsoft Windows 10.0.26200; es-CO) PowerShell/7.6.0', 'eyJfdG9rZW4iOiIzcFdQNGkyVkxidVV6OXliNFdVUFBPZDNrREZrM051QmNpdzFwcDBrIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1779313690),
	('Iz9w4p4YIgy4p0jJ6Eq88vV69pWKKS3VhLiyusLu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJiWlIxTDdYRVUxRk81Z0lnQ3lTWHk0VWh2enFwN0IzNmpEeFdQSnB0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1779313232),
	('mwhL1vNF7WFrs8Rqao5i1rvvNqTj6bDZ7vy0QLgP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJNSVE2bXpUT1VYY3A1MWtqNHRXdDQ3aVVHSnpyNTQ1QVFLRHlqb1FUIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvY2FsZSI6ImVzIn0=', 1779316994),
	('pSTztvPXcBrVBRPuZyIRxKvVNj0QbMnORIg5T5g1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJJb3FnTlQ0ODdPT3hoWTh4dlBtWmgzekZ2cjYzYnhia3FZWkQydHpFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9jZXJ0aWZpY2F0aW9ucyIsInJvdXRlIjoiY2VydGlmaWNhdGlvbnMifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2NhbGUiOiJlcyJ9', 1779317070),
	('uCecO0JRlLWQUAAfcxxtKJyX7qG0Rxbk6UWra2i5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Microsoft Windows 10.0.26200; es-CO) PowerShell/7.6.0', 'eyJfdG9rZW4iOiJwREZOSDNkWUNhYjNoaUNFN1h1TGRMWXdOYWxrd0VVVnVoS2g3VFU4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1779313658),
	('xuCQofmBvJsXaPinnCI8njWrgUh29EE77H8ub0ur', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Microsoft Windows 10.0.26200; es-CO) PowerShell/7.6.0', 'eyJfdG9rZW4iOiIxajZSellLeGVqZ0tlYUtTVHlZU1JwMTc1SWY1SkxCeXRPWGo0eDBZIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1779313672),
	('YCMhjqn5OzFHVshzLcuaPNJ73owBYVyOXnXZBWw9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Microsoft Windows 10.0.26200; es-CO) PowerShell/7.6.0', 'eyJfdG9rZW4iOiJhNHRHcVlkcGJFNTNhWWZ1ZzdRbU1GOVU3NTE3WG54bWd1bGRtQWJ4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1779313051),
	('YffVMT5aB5O6VPRlQqj8WA09spn57nQVf7V9z1hH', NULL, '127.0.0.1', 'curl/8.19.0', 'eyJfdG9rZW4iOiJyQ2U0cnU4dWlYa3lHRE9KR3owNHBpNmF1WldxcTh5OGM1NG42clFSIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1779308996);
CREATE TABLE IF NOT EXISTS `translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_key_locale_unique` (`key`,`locale`),
  KEY `translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=282 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
REPLACE INTO `translations` (`id`, `key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'header.default_title', 'en', 'Dashboard', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
