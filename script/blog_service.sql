-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.27-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para blog_service
CREATE DATABASE IF NOT EXISTS `blog_service` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `blog_service`;

-- Volcando estructura para tabla blog_service.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) DEFAULT NULL,
  `autor` varchar(250) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `contenido` varchar(250) DEFAULT NULL,
  `status` int(10) DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla blog_service.blogs: ~8 rows (aproximadamente)
DELETE FROM `blogs`;
INSERT INTO `blogs` (`id`, `titulo`, `autor`, `fecha`, `contenido`, `status`) VALUES
	(1, 'Blog de Programacion', 'Carlos Juarez', '2023-11-14', 'Tutoriales para programar en Android', 1),
	(2, 'Blog de Animales', 'Daniela Sanchez', '2023-11-14', 'Visita a zoologicos', 1),
	(3, 'Blog de Cocina', 'Maria Gabriela', '2023-11-14', 'Tutoriales de Cocina', 1),
	(4, 'Prueba desde Api', 'Carlos J C', '2023-11-14', 'Tutorial para conectar a un API', 1),
	(5, 'Blog 1', 'Carlos Alberto', '2023-11-14', 'Prueba para blog 1', 1),
	(6, 'Blog 2', 'Maria Gabriela', '2023-11-14', 'Prueba para blog 2', 1),
	(7, 'Prueba desde Api 2', 'Pablo Arriaga', '2023-11-14', 'Esto es una prueba de insert', 1),
	(8, 'Prueba Local Blog', 'Calros Camps', '2023-12-14', 'Prueba de Contenido', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
