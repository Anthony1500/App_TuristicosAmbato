-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para fairtradebalancedb
CREATE DATABASE IF NOT EXISTS `fairtradebalancedb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `fairtradebalancedb`;

-- Volcando estructura para tabla fairtradebalancedb.facturas_frutas
CREATE TABLE IF NOT EXISTS `facturas_frutas` (
  `cod_factura` bigint unsigned NOT NULL AUTO_INCREMENT,
  `productor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identificacion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable_cosecha` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transportista_responsable` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_de_gavetas` int DEFAULT NULL,
  `numero_de_tarrinas` int DEFAULT NULL,
  `fecha_cosecha` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `cantidad_total` int DEFAULT NULL,
  `calidad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad_de_calidad` int DEFAULT NULL,
  `numero_de_lote_finca_kilos` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_por_kilo` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `total_a_pagar` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_factura`),
  UNIQUE KEY `facturas_frutas_identificacion_unique` (`identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fairtradebalancedb.facturas_frutas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla fairtradebalancedb.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fairtradebalancedb.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla fairtradebalancedb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=597 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fairtradebalancedb.migrations: ~9 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(589, '2014_10_12_000000_create_users_table', 1),
	(590, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(591, '2014_10_12_100000_create_password_resets_table', 1),
	(592, '2019_08_19_000000_create_failed_jobs_table', 1),
	(593, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(594, '2024_02_26_184340_create_proyecto_table', 1),
	(595, '2024_02_26_184341_create_registro_table', 1),
	(596, '2024_02_26_184408_create_facturas_frutas_table', 1);

-- Volcando estructura para tabla fairtradebalancedb.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fairtradebalancedb.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla fairtradebalancedb.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fairtradebalancedb.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla fairtradebalancedb.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
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

-- Volcando datos para la tabla fairtradebalancedb.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla fairtradebalancedb.proyectos
CREATE TABLE IF NOT EXISTS `proyectos` (
  `id_proyecto` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_proyecto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socios` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_proyecto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_terreno` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_plantas_arandanos` int DEFAULT NULL,
  `numero_plantas_fresas` int DEFAULT NULL,
  `coordenadas` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_proyecto`),
  UNIQUE KEY `proyectos_nombre_proyecto_unique` (`nombre_proyecto`),
  UNIQUE KEY `proyectos_ruc_unique` (`ruc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fairtradebalancedb.proyectos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla fairtradebalancedb.registros
CREATE TABLE IF NOT EXISTS `registros` (
  `id_registro` bigint unsigned NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_domicilio` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_proyecto` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_registro`),
  UNIQUE KEY `registros_identificacion_unique` (`identificacion`),
  UNIQUE KEY `registros_email_unique` (`email`),
  UNIQUE KEY `registros_usuario_unique` (`usuario`),
  KEY `registros_id_proyecto_foreign` (`id_proyecto`),
  CONSTRAINT `registros_id_proyecto_foreign` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fairtradebalancedb.registros: ~0 rows (aproximadamente)

-- Volcando estructura para tabla fairtradebalancedb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fairtradebalancedb.users: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
