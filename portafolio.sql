-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.4.3 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla jeis_backendlab.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jeis_backendlab.cache: ~0 rows (aproximadamente)

-- Volcando estructura para tabla jeis_backendlab.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jeis_backendlab.cache_locks: ~0 rows (aproximadamente)

-- Volcando estructura para tabla jeis_backendlab.certifications
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

-- Volcando datos para la tabla jeis_backendlab.certifications: ~0 rows (aproximadamente)

-- Volcando estructura para tabla jeis_backendlab.contact_messages
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jeis_backendlab.contact_messages: ~0 rows (aproximadamente)

-- Volcando estructura para tabla jeis_backendlab.dashboard_visits
CREATE TABLE IF NOT EXISTS `dashboard_visits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `month_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visits` int unsigned NOT NULL DEFAULT '1430',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dashboard_visits_month_key_unique` (`month_key`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jeis_backendlab.dashboard_visits: ~1 rows (aproximadamente)
REPLACE INTO `dashboard_visits` (`id`, `month_key`, `visits`, `created_at`, `updated_at`) VALUES
	(1, '2026-05', 1478, '2026-05-21 02:37:31', '2026-05-21 03:50:32');

-- Volcando estructura para tabla jeis_backendlab.failed_jobs
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

-- Volcando datos para la tabla jeis_backendlab.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla jeis_backendlab.jobs
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

-- Volcando datos para la tabla jeis_backendlab.jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla jeis_backendlab.job_batches
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

-- Volcando datos para la tabla jeis_backendlab.job_batches: ~0 rows (aproximadamente)

-- Volcando estructura para tabla jeis_backendlab.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jeis_backendlab.migrations: ~9 rows (aproximadamente)
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

-- Volcando estructura para tabla jeis_backendlab.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla jeis_backendlab.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla jeis_backendlab.projects
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

-- Volcando datos para la tabla jeis_backendlab.projects: ~3 rows (aproximadamente)
REPLACE INTO `projects` (`id`, `title`, `description`, `technologies`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Sistema Dropshipping con Shopify', 'Sistema completo de dropshipping integrado con Shopify y gestión de coordinadora para entregas automáticas.', 'Laravel + Shopify + Coordinadora', 'En Progreso', '2026-05-14 01:56:20', '2026-05-14 01:56:20'),
	(2, 'Sistema Automatización IA + WhatsApp', 'Plataforma de automatización de procesos empresariales con integración de inteligencia artificial y WhatsApp API para comunicación directa con clientes.', 'EasyPanel + Evolution API + N8N + Goflow API', 'Completado', '2026-05-14 01:56:26', '2026-05-14 01:56:26'),
	(3, 'Red Social Emergente', 'Red social moderna diseñada para profesionales backend con features de conexión, compartir proyectos y colaboración en tiempo real.', 'Laravel + Vue.js + PostgreSQL', 'Completado', '2026-05-14 01:56:30', '2026-05-14 01:56:30');

-- Volcando estructura para tabla jeis_backendlab.sessions
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

-- Volcando datos para la tabla jeis_backendlab.sessions: ~11 rows (aproximadamente)
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

-- Volcando estructura para tabla jeis_backendlab.translations
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

-- Volcando datos para la tabla jeis_backendlab.translations: ~184 rows (aproximadamente)
REPLACE INTO `translations` (`id`, `key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'header.default_title', 'en', 'Dashboard', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(2, 'header.default_title', 'es', 'Dashboard', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(3, 'header.default_subtitle', 'en', 'Welcome to your professional portfolio', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(4, 'header.default_subtitle', 'es', 'Bienvenido a tu portafolio profesional', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(5, 'nav.dashboard', 'en', 'Dashboard', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(6, 'nav.dashboard', 'es', 'Dashboard', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(7, 'nav.projects', 'en', 'Projects', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(8, 'nav.projects', 'es', 'Proyectos', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(9, 'nav.settings', 'en', 'Settings', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(10, 'nav.settings', 'es', 'Configuracion', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(11, 'home.page_title', 'en', 'Dashboard', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(12, 'home.page_title', 'es', 'Dashboard', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(13, 'home.page_subtitle', 'en', 'Welcome to my web portfolio', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(14, 'home.page_subtitle', 'es', 'Bienvenido a mi Portafolio web', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(15, 'home.stats.completed_projects', 'en', 'Completed Projects', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(16, 'home.stats.completed_projects', 'es', 'Proyectos Completados', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(17, 'home.stats.completed_projects_change', 'en', '↑ 2 this month', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(18, 'home.stats.completed_projects_change', 'es', '↑ 2 este mes', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(19, 'home.stats.month_visits', 'en', 'Visits This Month', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(20, 'home.stats.month_visits', 'es', 'Visitas Este Mes', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(21, 'home.stats.month_visits_change', 'en', '↑ 12% vs last month', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(22, 'home.stats.month_visits_change', 'es', '↑ 12% comparado', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(23, 'home.stats.skills', 'en', 'Skills', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(24, 'home.stats.skills', 'es', 'Habilidades', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(25, 'home.stats.skills_in_progress', 'en', '3 in progress', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(26, 'home.stats.skills_in_progress', 'es', '3 en progreso', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(27, 'home.stats.contacts_received', 'en', 'Contacts Received', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(28, 'home.stats.contacts_received', 'es', 'Contactos Recibidos', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(29, 'home.stats.contacts_pending', 'en', '5 unanswered', '2026-05-14 02:26:34', '2026-05-14 02:26:34'),
	(30, 'home.stats.contacts_pending', 'es', '5 no respondidas', '2026-05-14 02:26:34', '2026-05-14 02:26:34'),
	(31, 'home.welcome.title', 'en', 'Welcome to my Backendlab', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(32, 'home.welcome.title', 'es', 'Bienvenido a mi Backendlab', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(33, 'home.welcome.description', 'en', 'This is my space to show my work, skills, and projects. I also track my progress and organize my professional journey here. Explore freely!', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(34, 'home.welcome.description', 'es', 'Este es mi espacio para demostrarte mi trabajo, habilidades y proyectos, ademas, aqui registro mis logros y organizo mi vida laboral. ¡Explora a tu gusto!', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(35, 'home.actions.github', 'en', 'View my GitHub', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(36, 'home.actions.github', 'es', 'Ver mi Github', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(37, 'home.actions.resume', 'en', 'View Resume', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(38, 'home.actions.resume', 'es', 'Ver Curriculum', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(39, 'home.actions.contact', 'en', 'Contact Me', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(40, 'home.actions.contact', 'es', 'Contactame', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(41, 'home.recent_projects', 'en', 'Recent Projects', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(42, 'home.recent_projects', 'es', 'Proyectos Recientes', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(43, 'projects.page_title', 'en', 'My Projects', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(44, 'projects.page_title', 'es', 'Mis Proyectos', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(45, 'projects.page_subtitle', 'en', 'Explore the projects I have developed', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(46, 'projects.page_subtitle', 'es', 'Explora los proyectos que he desarrollado', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(47, 'projects.description', 'en', 'Description', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(48, 'projects.description', 'es', 'Descripcion', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(49, 'projects.technologies', 'en', 'Technologies', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(50, 'projects.technologies', 'es', 'Tecnologias', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(51, 'projects.view_details', 'en', 'View Details', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(52, 'projects.view_details', 'es', 'Ver Detalles', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(53, 'projects.empty', 'en', 'No projects available yet.', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(54, 'projects.empty', 'es', 'No hay proyectos disponibles aun.', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(55, 'projects.empty_short', 'en', 'No projects available', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(56, 'projects.empty_short', 'es', 'No hay proyectos disponibles', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(57, 'status.completed', 'en', 'Completed', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(58, 'status.completed', 'es', 'Completado', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(59, 'status.in_progress', 'en', 'In Progress', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(60, 'status.in_progress', 'es', 'En Progreso', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(61, 'status.planned', 'en', 'Planned', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(62, 'status.planned', 'es', 'Planificado', '2026-05-14 02:26:34', '2026-05-21 02:47:54'),
	(63, 'nav.certifications', 'en', 'Certifications', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(64, 'nav.certifications', 'es', 'Certificaciones', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(65, 'certifications.page_title', 'en', 'Certifications', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(66, 'certifications.page_title', 'es', 'Certificaciones', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(67, 'certifications.page_subtitle', 'en', 'Manage your professional certifications', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(68, 'certifications.page_subtitle', 'es', 'Administra tus certificaciones profesionales', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(69, 'certifications.add', 'en', 'Add', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(70, 'certifications.add', 'es', 'Añadir', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(71, 'certifications.empty', 'en', 'No certifications yet. Click add to create one.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(72, 'certifications.empty', 'es', 'Aún no hay certificaciones. Haz clic en añadir para crear una.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(73, 'certifications.add_new', 'en', 'Add New Certification', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(74, 'certifications.add_new', 'es', 'Añadir nueva certificación', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(75, 'certifications.fields.title', 'en', 'Title', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(76, 'certifications.fields.title', 'es', 'Título', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(77, 'certifications.fields.issuer', 'en', 'Issuer', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(78, 'certifications.fields.issuer', 'es', 'Emisor', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(79, 'certifications.fields.date', 'en', 'Date', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(80, 'certifications.fields.date', 'es', 'Fecha', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(81, 'certifications.fields.url', 'en', 'URL', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(82, 'certifications.fields.url', 'es', 'URL', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(83, 'actions.cancel', 'en', 'Cancel', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(84, 'actions.cancel', 'es', 'Cancelar', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(85, 'actions.save', 'en', 'Save', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(86, 'actions.save', 'es', 'Guardar', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(87, 'certifications.placeholders.title', 'en', 'Eg: AWS Certified Developer', '2026-05-21 01:49:54', '2026-05-21 01:49:54'),
	(88, 'certifications.placeholders.title', 'es', 'Ej: AWS Certified Developer', '2026-05-21 01:49:54', '2026-05-21 01:49:54'),
	(89, 'certifications.placeholders.issuer', 'en', 'Eg: Amazon', '2026-05-21 01:49:54', '2026-05-21 01:49:54'),
	(90, 'certifications.placeholders.issuer', 'es', 'Ej: Amazon', '2026-05-21 01:49:54', '2026-05-21 01:49:54'),
	(91, 'certifications.placeholders.url', 'en', 'https://example.com/certificate', '2026-05-21 01:49:54', '2026-05-21 01:49:54'),
	(92, 'certifications.placeholders.url', 'es', 'https://example.com/certificate', '2026-05-21 01:49:54', '2026-05-21 01:49:54'),
	(93, 'certifications.placeholders.secret', 'en', 'Your secret key', '2026-05-21 01:49:54', '2026-05-21 01:49:54'),
	(94, 'certifications.placeholders.secret', 'es', 'Tu clave secreta', '2026-05-21 01:49:54', '2026-05-21 01:49:54'),
	(95, 'certifications.fields.image', 'en', 'Image', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(96, 'certifications.fields.image', 'es', 'Imagen', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(97, 'certifications.labels.view', 'en', 'View certificate', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(98, 'certifications.labels.view', 'es', 'Ver certificado', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(99, 'certifications.delete.title', 'en', 'Delete certificate', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(100, 'certifications.delete.title', 'es', 'Eliminar certificado', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(101, 'certifications.delete.prompt', 'en', 'You are about to delete: :title', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(102, 'certifications.delete.prompt', 'es', 'Vas a eliminar: :title', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(103, 'certifications.delete.fallback', 'en', 'You are about to delete this certificate', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(104, 'certifications.delete.fallback', 'es', 'Vas a eliminar este certificado', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(105, 'certifications.delete.secret_label', 'en', 'Are you Jeisson Villaizan?', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(106, 'certifications.delete.secret_label', 'es', '¿Eres Jeisson Villaizan?', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(107, 'certifications.delete.secret_placeholder', 'en', 'Your password', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(108, 'certifications.delete.secret_placeholder', 'es', 'Tu contraseña', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(109, 'certifications.delete.cancel', 'en', 'I am a tourist :D', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(110, 'certifications.delete.cancel', 'es', 'soy turista :D', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(111, 'certifications.delete.confirm', 'en', 'Delete certificate', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(112, 'certifications.delete.confirm', 'es', 'eliminar certificado', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(113, 'certifications.delete.aria_close', 'en', 'Close delete popup', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(114, 'certifications.delete.aria_close', 'es', 'Cerrar popup de eliminación', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(115, 'certifications.delete.aria_button', 'en', 'Delete certificate', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(116, 'certifications.delete.aria_button', 'es', 'Eliminar certificado', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(117, 'certifications.fields.secret', 'en', 'Secret key', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(118, 'certifications.fields.secret', 'es', 'Clave secreta', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(119, 'certifications.fields.image_button', 'en', 'Choose image', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(120, 'certifications.fields.image_button', 'es', 'Elegir imagen', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(121, 'certifications.fields.image_selected', 'en', 'No file selected', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(122, 'certifications.fields.image_selected', 'es', 'Sin archivo seleccionado', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(123, 'certifications.fields.secret_prompt', 'en', 'Are you Jeisson Villaizan?', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(124, 'certifications.fields.secret_prompt', 'es', '¿Eres Jeisson Villaizan?', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(125, 'certifications.errors.not_jeisson', 'en', 'You are not Jeisson Villaizan!', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(126, 'certifications.errors.not_jeisson', 'es', '¡No eres Jeisson Villaizan!', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(127, 'certifications.validation.title.required', 'en', 'The title field is required.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(128, 'certifications.validation.title.required', 'es', 'El campo título es obligatorio.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(129, 'certifications.validation.title.string', 'en', 'The title field must be a string.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(130, 'certifications.validation.title.string', 'es', 'El campo título debe ser una cadena de texto.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(131, 'certifications.validation.title.max', 'en', 'The title field may not be greater than 255 characters.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(132, 'certifications.validation.title.max', 'es', 'El campo título no puede tener más de 255 caracteres.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(133, 'certifications.validation.issuer.string', 'en', 'The issuer field must be a string.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(134, 'certifications.validation.issuer.string', 'es', 'El campo emisor debe ser una cadena de texto.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(135, 'certifications.validation.issuer.max', 'en', 'The issuer field may not be greater than 255 characters.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(136, 'certifications.validation.issuer.max', 'es', 'El campo emisor no puede tener más de 255 caracteres.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(137, 'certifications.validation.date.date', 'en', 'The date field must be a valid date.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(138, 'certifications.validation.date.date', 'es', 'El campo fecha debe ser una fecha válida.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(139, 'certifications.validation.url.url', 'en', 'The URL field must be a valid URL.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(140, 'certifications.validation.url.url', 'es', 'El campo URL debe ser una URL válida.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(141, 'certifications.validation.url.max', 'en', 'The URL field may not be greater than 2048 characters.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(142, 'certifications.validation.url.max', 'es', 'El campo URL no puede tener más de 2048 caracteres.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(143, 'certifications.validation.image.image', 'en', 'The image field must be an image.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(144, 'certifications.validation.image.image', 'es', 'El campo imagen debe ser una imagen.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(145, 'certifications.validation.image.max', 'en', 'The image field may not be greater than 2048 kilobytes.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(146, 'certifications.validation.image.max', 'es', 'El campo imagen no puede ser mayor de 2048 kilobytes.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(147, 'certifications.validation.secret.required', 'en', 'The secret field is required.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(148, 'certifications.validation.secret.required', 'es', 'El campo clave secreta es obligatorio.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(149, 'certifications.validation.secret.string', 'en', 'The secret field must be a string.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(150, 'certifications.validation.secret.string', 'es', 'El campo clave secreta debe ser una cadena de texto.', '2026-05-21 02:31:37', '2026-05-21 02:31:37'),
	(151, 'contacts.modal.title', 'en', 'Contact Me', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(152, 'contacts.modal.title', 'es', 'Contactame', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(153, 'contacts.fields.email', 'en', 'Email', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(154, 'contacts.fields.email', 'es', 'Correo electronico', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(155, 'contacts.fields.subject', 'en', 'Subject', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(156, 'contacts.fields.subject', 'es', 'Asunto', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(157, 'contacts.fields.message', 'en', 'Message', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(158, 'contacts.fields.message', 'es', 'Mensaje', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(159, 'contacts.placeholders.email', 'en', 'you@example.com', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(160, 'contacts.placeholders.email', 'es', 'tu@correo.com', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(161, 'contacts.placeholders.subject', 'en', 'How can I help you?', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(162, 'contacts.placeholders.subject', 'es', 'Como puedo ayudarte?', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(163, 'contacts.placeholders.message', 'en', 'Write your message here...', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(164, 'contacts.placeholders.message', 'es', 'Escribe tu mensaje aqui...', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(165, 'contacts.success.saved', 'en', 'Your message has been saved.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(166, 'contacts.success.saved', 'es', 'Tu mensaje ha sido guardado.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(167, 'contacts.validation.email.required', 'en', 'The email field is required.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(168, 'contacts.validation.email.required', 'es', 'El campo correo electronico es obligatorio.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(169, 'contacts.validation.email.email', 'en', 'The email field must be a valid email address.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(170, 'contacts.validation.email.email', 'es', 'El campo correo electronico debe ser una direccion de correo valida.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(171, 'contacts.validation.email.max', 'en', 'The email field may not be greater than 255 characters.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(172, 'contacts.validation.email.max', 'es', 'El campo correo electronico no puede tener mas de 255 caracteres.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(173, 'contacts.validation.subject.required', 'en', 'The subject field is required.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(174, 'contacts.validation.subject.required', 'es', 'El campo asunto es obligatorio.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(175, 'contacts.validation.subject.string', 'en', 'The subject field must be a string.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(176, 'contacts.validation.subject.string', 'es', 'El campo asunto debe ser una cadena de texto.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(177, 'contacts.validation.subject.max', 'en', 'The subject field may not be greater than 255 characters.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(178, 'contacts.validation.subject.max', 'es', 'El campo asunto no puede tener mas de 255 caracteres.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(179, 'contacts.validation.message.required', 'en', 'The message field is required.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(180, 'contacts.validation.message.required', 'es', 'El campo mensaje es obligatorio.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(181, 'contacts.validation.message.string', 'en', 'The message field must be a string.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(182, 'contacts.validation.message.string', 'es', 'El campo mensaje debe ser una cadena de texto.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(183, 'contacts.validation.message.max', 'en', 'The message field may not be greater than 5000 characters.', '2026-05-21 02:46:37', '2026-05-21 02:47:54'),
	(184, 'contacts.validation.message.max', 'es', 'El campo mensaje no puede tener mas de 5000 caracteres.', '2026-05-21 02:46:37', '2026-05-21 02:47:54');

-- Volcando estructura para tabla jeis_backendlab.users
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

-- Volcando datos para la tabla jeis_backendlab.users: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
