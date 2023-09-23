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

/*Data for the table `atencion` */

insert  into `atencion`(`id`,`id_cliente`,`id_prestador`,`tipo_atencion`,`monto`,`presupuesto`,`fecha_atencion`,`observaciones`) values (1,1,2,1,22457,457545,'2023-08-18 23:01:25','Se realiza limpieza dental, se crea presupuesto 457545'),(2,5,2,3,50000,85465165,'2023-08-19 10:38:02','PRUEBA PRESETNACION'),(3,1,3,3,5000,12375,'2023-09-22 18:55:00','prueba'),(4,1,3,4,1000,123123,'2023-09-22 18:57:00','prueba 2'),(5,1,3,1,5000,88213,'2023-09-22 19:16:00','prueba 2'),(7,2,2,1,15000,88971,'2023-09-21 09:00:00','Prueba 6');

/*Data for the table `centro_costo` */

insert  into `centro_costo`(`id`,`nombre`,`centro_costo`,`cuenta_contable`,`id_prestador`) values (1,'154409857-J','02-04-12','2-10-30-130',1),(5,'267981787-S','02-04-13','2-10-30-140',2);

/*Data for the table `cliente` */

insert  into `cliente`(`id`,`rut`,`nombre`,`primer_apellido`,`segundo_apellido`,`telefono`,`email`,`direccion`,`sistema_salud`,`estado`,`fecha_creacion`) values (1,'18.530.959-2','Camilo','Ibarra','Morales','+569677757378','camilo1.sb@gmail.com','Pasaje Ignacio de la Carrera #1071','67',1,'2023-08-18 18:16:41'),(2,'12.864.955-7','Evelyn','Morales','Maldonado','+56967775738','evelyn_morales@sonrisafeliz.cl','Pasaje Ignacio de la Carrera #1071','1',1,'2023-08-18 19:06:45'),(5,'13.368.359-3','Leonardo','Contreras','Duran','+56967775738','camilo1.sb@gmail.com','Pasaje Ignacio de la Carrera #1071','78',1,'2023-08-19 10:37:14'),(6,'12.865.009-9','Josefina','Jimenez','Hurtado','+56967775738','algo@algo.cl','Moneda #1617 Depto. 915','1',1,'2023-09-22 19:26:02'),(8,'7.415.302-K','Valentina','Lopez','Jofre','+56967775738','algo@algo.cl','Las Parcelas #23','1',1,'2023-09-23 00:33:25');

/*Data for the table `estado` */

insert  into `estado`(`id`,`nombre`) values (1,'Habilitado'),(2,'Deshabilitado');

/*Data for the table `prestador` */

insert  into `prestador`(`id`,`id_usuario`,`rut`,`nombre`,`estado`) values (1,2,'15.440.985-7','Javiera Carrera Montenegro',1),(2,3,'26.798.178-7','Salome Hernandez Martinez',1);

/*Data for the table `sistema_salud` */

insert  into `sistema_salud`(`id`,`id_salud`,`nombre`) values (1,1,'Fonasa'),(2,99,'	Banmédica S.A.'),(3,63,'Isalud Ltda.'),(4,67,'Colmena Golden Cross'),(5,107,'Consalud S.A.'),(6,78,'Cruz Blanca S.A.'),(7,94,'Cruz del Norte Ltda.'),(8,81,'Nueva Masvida S.A.'),(9,76,'Fundación Ltda.'),(10,80,'Vida Tres S.A.'),(11,108,'Esencial S.A.');

/*Data for the table `tipo_atencion` */

insert  into `tipo_atencion`(`id`,`nombre`) values (1,'Limpieza Dental'),(2,'Rehabilitación Oral'),(3,'Ortodoncia'),(4,'Implantología Oral'),(5,'Estética Dental'),(6,'Oclusión');

/*Data for the table `tipo_user` */

insert  into `tipo_user`(`id`,`nombre`) values (1,'Administrador'),(2,'Usuario'),(3,'Prestador');

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`rut`,`nombre`,`user`,`contraseña`,`tipo_user`,`estado`) values (1,'18.530.959-2','Administrador','ADMIN','admin',1,1),(2,'15.440.985-7','Javiera Carrera Montenegro','JCM','123',3,1),(3,'26.798.178-7','Salome Hernandez Martinez','SHM','123',3,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
