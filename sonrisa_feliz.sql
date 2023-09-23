/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.4.28-MariaDB : Database - sonrisafeliz
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sonrisafeliz` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `sonrisafeliz`;

/*Table structure for table `atencion` */

DROP TABLE IF EXISTS `atencion`;

CREATE TABLE `atencion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_prestador` int(11) DEFAULT NULL,
  `tipo_atencion` int(11) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `presupuesto` int(11) DEFAULT NULL,
  `fecha_atencion` datetime DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cliente` (`id_cliente`),
  KEY `FK_atencion` (`tipo_atencion`),
  KEY `FK_prestador` (`id_prestador`),
  CONSTRAINT `FK_atencion` FOREIGN KEY (`tipo_atencion`) REFERENCES `tipo_atencion` (`id`),
  CONSTRAINT `FK_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `FK_prestador` FOREIGN KEY (`id_prestador`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `centro_costo` */

DROP TABLE IF EXISTS `centro_costo`;

CREATE TABLE `centro_costo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(11) DEFAULT NULL,
  `centro_costo` varchar(11) DEFAULT NULL,
  `cuenta_contable` varchar(11) DEFAULT NULL,
  `id_prestador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prestcentrocosto` (`id_prestador`),
  CONSTRAINT `FK_prestcentrocosto` FOREIGN KEY (`id_prestador`) REFERENCES `prestador` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) DEFAULT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `sistema_salud` varchar(50) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_estado` (`estado`),
  CONSTRAINT `FK_estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `estado` */

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `prestador` */

DROP TABLE IF EXISTS `prestador`;

CREATE TABLE `prestador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `rut` varchar(20) DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prestadorestado` (`estado`),
  CONSTRAINT `FK_prestadorestado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `sistema_salud` */

DROP TABLE IF EXISTS `sistema_salud`;

CREATE TABLE `sistema_salud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_salud` int(11) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `tipo_atencion` */

DROP TABLE IF EXISTS `tipo_atencion`;

CREATE TABLE `tipo_atencion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `tipo_user` */

DROP TABLE IF EXISTS `tipo_user`;

CREATE TABLE `tipo_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `contraseña` varchar(50) DEFAULT NULL,
  `tipo_user` int(1) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usuario` (`tipo_user`),
  KEY `FK_estadous` (`estado`),
  CONSTRAINT `FK_estadous` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`),
  CONSTRAINT `FK_usuario` FOREIGN KEY (`tipo_user`) REFERENCES `tipo_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
