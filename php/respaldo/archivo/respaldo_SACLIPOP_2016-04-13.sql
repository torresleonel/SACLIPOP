-- MySQL dump 10.13  Distrib 5.5.34, for Win32 (x86)
--
-- Host: localhost    Database: cpjm
-- ------------------------------------------------------
-- Server version	5.5.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aguinaldo`
--

DROP TABLE IF EXISTS `aguinaldo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aguinaldo` (
  `id_aguinaldo` int(7) NOT NULL AUTO_INCREMENT,
  `cantidad_mes` int(2) NOT NULL COMMENT 'Cantidad de meses para el calculo de aguinaldos',
  `anno_calculo` year(4) NOT NULL COMMENT 'Año en que se realizo el calculo de aguinaldo para el trabajador',
  `sid` decimal(7,2) NOT NULL COMMENT 'Sueldo Integral Diario',
  `total_pagar` decimal(7,2) NOT NULL COMMENT 'Total a pagar por aguinaldos',
  `cedula` int(12) NOT NULL,
  PRIMARY KEY (`id_aguinaldo`),
  KEY `cedula` (`cedula`),
  CONSTRAINT `aguinaldo_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `laboral` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aguinaldo`
--

LOCK TABLES `aguinaldo` WRITE;
/*!40000 ALTER TABLE `aguinaldo` DISABLE KEYS */;
INSERT INTO `aguinaldo` VALUES (1,11,2015,210.56,17370.83,40404040),(2,12,2015,308.00,27720.00,30303030),(3,12,2015,385.00,34650.00,18191839);
/*!40000 ALTER TABLE `aguinaldo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `id_bitacora` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `sentencia` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (1,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'10395.00\'\r\n					WHERE cedula = \'18191839\'','2015-01-12 02:30:15'),(2,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'8316.00\'\r\n					WHERE cedula = \'30303030\'','2015-01-12 02:30:15'),(3,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'0.00\'\r\n					WHERE cedula = \'40404040\'','2015-01-12 02:30:15'),(4,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'6000.00\'\r\n					WHERE cedula = \'40404040\'','2015-01-12 02:30:26'),(5,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'3000\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'55.384615384615\',spf = \'6.9230769230769\',faov = \'31.5\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'3000\',total_deducciones = \'93.807692307692\',total_pagar = \'2906.1923076923\' \r\n				WHERE cedula = \'40404040\' AND inicio_quincena = \'2015-1-1\'','2015-01-12 02:30:36'),(6,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2015-1-5\',fin_vacac = \'2015-1-28\',reincorpor = \'2015-1-29\',dia_vacac = \'15\',dia_adicional = \'3\',sueldo_dia = \'200\',total_dia_v = \'3000\',total_dia_adic = \'600\',total_pagar = \'3600\' \r\n						WHERE id_bono = \'1\'','2015-01-12 02:31:03'),(7,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'12\',sid = \'210.55555555556\',total_pagar = \'18950\' \r\n						WHERE id_aguinaldo = \'1\'','2015-01-12 02:31:12'),(8,'full','Leonel','Torres','INSERT INTO usuario (usuario,clave,nombre,apellido,nivel)\r\n				VALUES (\'prueba\',\'81dc9bdb52d04dc20036dbd8313ed055\',\'Prueba\',\'bitacora\',\'2\')','2015-01-12 02:31:37'),(9,'full','Leonel','Torres','UPDATE usuario \r\n				SET usuario = \'full\',clave = \'d93591bdf7860e1e4ee2fca799911215\',nombre = \'Leonel\',apellido = \'Torres\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n				WHERE usuario.usuario = \'full\'','2015-01-12 02:31:56'),(10,'full','Leonel','Torres','UPDATE usuario \r\n				SET usuario = \'full\',clave = \'81dc9bdb52d04dc20036dbd8313ed055\',nombre = \'Leonel\',apellido = \'Torres\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n				WHERE usuario.usuario = \'full\'','2015-01-12 02:32:10'),(11,'full','Leonel','Torres','DELETE FROM usuario WHERE usuario = \'prueba\'','2015-01-12 02:32:18'),(12,'full','Leonel','Torres','SELECT * FROM usuario WHERE usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-12 02:38:15'),(13,'full','Leonel','Torres','SELECT * FROM usuario WHERE usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-12 03:55:05'),(14,'full','Leonel','Torres','SELECT * FROM usuario WHERE usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-12 04:56:12'),(15,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-12 06:11:02'),(16,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-12 16:38:56'),(17,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-13 01:34:52'),(18,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-13 04:25:20'),(19,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-13 18:47:33'),(20,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-14 13:44:25'),(21,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-14 14:08:35'),(22,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-16 02:05:25'),(23,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-16 02:10:27'),(24,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-16 13:05:46'),(25,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-17 02:28:05'),(26,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-17 03:20:44'),(27,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-17 03:41:59'),(28,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-17 03:55:07'),(29,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-17 15:36:23'),(30,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-18 01:16:56'),(31,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-18 14:06:25'),(32,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 03:31:12'),(33,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 04:36:27'),(34,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 16:32:10'),(35,'zuricato','Rafael','Mercado','SELECT * FROM usuario WHERE id_usuario = \'zuricato\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 21:11:23'),(36,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 21:11:30'),(37,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 22:54:50'),(38,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-20 01:43:28'),(39,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-20 01:51:28'),(40,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-20 03:19:47'),(41,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-20 03:26:54'),(42,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-20 03:47:44'),(43,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-21 14:45:04'),(44,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-22 17:05:22'),(45,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-23 02:14:30'),(46,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-23 16:31:23'),(47,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-23 22:14:58'),(48,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-25 03:38:39'),(49,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-25 17:39:18'),(50,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'12\',sid = \'210.55555555556\',total_pagar = \'18950\' \r\n						WHERE id_aguinaldo = \'1\'','2015-01-25 18:56:16'),(51,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'12\',sid = \'210.55555555556\',total_pagar = \'18950\' \r\n						WHERE id_aguinaldo = \'1\'','2015-01-25 19:58:32'),(52,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-30 14:37:48'),(53,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-01 03:22:56'),(54,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'6\',sid = \'0\',total_pagar = \'0\' \r\n						WHERE id_aguinaldo = \'1\'','2015-02-01 04:01:10'),(55,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'6\',sid = \'210.55555555556\',total_pagar = \'9475\' \r\n						WHERE id_aguinaldo = \'1\'','2015-02-01 04:07:04'),(56,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'12\',sid = \'210.55555555556\',total_pagar = \'18950\' \r\n						WHERE id_aguinaldo = \'1\'','2015-02-01 04:07:51'),(57,'full','Leonel','Torres','INSERT INTO aguinaldo (cantidad_mes,anno_calculo,sid,total_pagar,cedula)\r\n						VALUES (\'12\',\'2015\',\'308\',\'27720\',\'30303030\')','2015-02-01 04:08:51'),(58,'full','Leonel','Torres','INSERT INTO aguinaldo (cantidad_mes,anno_calculo,sid,total_pagar,cedula)\r\n						VALUES (\'12\',\'2015\',\'385\',\'34650\',\'18191839\')','2015-02-01 04:09:10'),(59,'full','Leonel','Torres','INSERT INTO bono_vacac (ini_vacac,fin_vacac,reincorpor,dia_vacac,dia_adicional,sueldo_dia,total_dia_v,total_dia_adic,total_pagar,cedula)\r\n						VALUES (\'2015-12-17\',\'2016-2-10\',\'2016-2-11\',\'40\',\'0\',\'277.2\',\'11088\',\'0\',\'11088\',\'30303030\')','2015-02-01 04:10:33'),(60,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-01 15:13:28'),(61,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2015-12-17\',fin_vacac = \'2016-2-10\',reincorpor = \'2016-2-11\',dia_vacac = \'40\',dia_adicional = \'0\',sueldo_dia = \'277.2\',total_dia_v = \'11088\',total_dia_adic = \'0\',total_pagar = \'11088\' \r\n						WHERE id_bono = \'2\'','2015-02-01 20:21:23'),(62,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2015-12-17\',fin_vacac = \'2016-2-10\',reincorpor = \'2016-2-11\',dia_vacac = \'40\',dia_adicional = \'0\',sueldo_dia = \'277.2\',total_dia_v = \'11088\',total_dia_adic = \'0\',total_pagar = \'11088\' \r\n						WHERE id_bono = \'2\'','2015-02-01 20:30:01'),(63,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-02 14:53:39'),(64,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-03 04:03:38'),(65,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-03 11:20:24'),(66,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-03 15:14:53'),(67,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'10395.00\'\r\n					WHERE cedula = \'18191839\'','2015-02-03 15:20:55'),(68,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'8316.00\'\r\n					WHERE cedula = \'30303030\'','2015-02-03 15:20:55'),(69,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'0.00\'\r\n					WHERE cedula = \'40404040\'','2015-02-03 15:20:55'),(70,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'6000.00\'\r\n					WHERE cedula = \'40404040\'','2015-02-03 15:22:42'),(71,'full','Leonel','Torres','INSERT INTO salario (sueldo_quincena,dia_adicional,total_dia_adic,retro_sueldo,retro_aguinaldos,retro_vacaciones,sso,spf,faov,islr,inasistencias,total_inasist,inicio_quincena,fin_quincena,total_asignaciones,total_deducciones,total_pagar,cedula)\r\n				VALUES (\'3000\',\'0\',\'0\',\'0\',\'0\',\'0\',\'55.384615384615\',\'6.9230769230769\',\'31.5\',\'0\',\'0\',\'0\',\'2015-2-1\',\'2015-2-15\',\'3000\',\'93.807692307692\',\'2906.1923076923\',\'40404040\')','2015-02-03 15:24:40'),(72,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2015-6-16\',fin_vacac = \'2015-07-10\',reincorpor = \'2015-6-3\',dia_vacac = \'15\',dia_adicional = \'4\',sueldo_dia = \'200\',total_dia_v = \'3000\',total_dia_adic = \'800\',total_pagar = \'3800\' \r\n						WHERE id_bono = \'1\'','2015-02-03 15:29:34'),(73,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-16 14:32:43'),(74,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-20 18:53:03'),(75,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2015-2-2\',fin_vacac = \'2015-02-25\',reincorpor = \'2015-2-1\',dia_vacac = \'15\',dia_adicional = \'3\',sueldo_dia = \'200\',total_dia_v = \'3000\',total_dia_adic = \'600\',total_pagar = \'3600\' \r\n						WHERE id_bono = \'1\'','2015-02-20 18:56:19'),(76,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-23 01:56:11'),(77,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-24 01:50:06'),(78,'full','Leonel','Torres','INSERT INTO bono_vacac (ini_vacac,fin_vacac,reincorpor,dia_vacac,dia_adicional,sueldo_dia,total_dia_v,total_dia_adic,total_pagar,cedula)\r\n						VALUES (\'2016-2-1\',\'2016-02-22\',\'2016-02-23\',\'40\',\'0\',\'277.2\',\'11088\',\'0\',\'11088\',\'30303030\')','2015-02-24 01:51:14'),(79,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2016-2-1\',fin_vacac = \'2016-02-22\',reincorpor = \'2016-02-23\',dia_vacac = \'40\',dia_adicional = \'0\',sueldo_dia = \'277.2\',total_dia_v = \'11088\',total_dia_adic = \'0\',total_pagar = \'11088\' \r\n						WHERE id_bono = \'3\'','2015-02-24 01:59:19'),(80,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2016-2-1\',fin_vacac = \'2016-02-23\',reincorpor = \'2016-02-24\',dia_vacac = \'40\',dia_adicional = \'0\',sueldo_dia = \'277.2\',total_dia_v = \'11088\',total_dia_adic = \'0\',total_pagar = \'11088\' \r\n						WHERE id_bono = \'3\'','2015-02-24 03:01:35'),(81,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-24 03:27:54'),(82,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-26 14:31:13'),(83,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-27 15:13:37'),(84,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2016-2-2\',fin_vacac = \'2016-02-24\',reincorpor = \'2016-02-25\',dia_vacac = \'40\',dia_adicional = \'0\',sueldo_dia = \'277.2\',total_dia_v = \'11088\',total_dia_adic = \'0\',total_pagar = \'11088\' \r\n						WHERE id_bono = \'3\'','2015-02-27 15:15:02'),(85,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2015-2-2\',fin_vacac = \'2015-02-27\',reincorpor = \'2015-03-02\',dia_vacac = \'15\',dia_adicional = \'3\',sueldo_dia = \'200\',total_dia_v = \'3000\',total_dia_adic = \'600\',total_pagar = \'3600\' \r\n						WHERE id_bono = \'1\'','2015-02-27 15:17:32'),(86,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-03-04 15:41:40'),(87,'full','Leonel','Torres','INSERT INTO salario (sueldo_quincena,dia_adicional,total_dia_adic,retro_sueldo,retro_aguinaldos,retro_vacaciones,sso,spf,faov,islr,inasistencias,total_inasist,inicio_quincena,fin_quincena,total_asignaciones,total_deducciones,total_pagar,cedula)\r\n				VALUES (\'3000\',\'0\',\'0\',\'0\',\'0\',\'0\',\'55.384615384615\',\'6.9230769230769\',\'31.5\',\'0\',\'0\',\'0\',\'2015-3-1\',\'2015-3-15\',\'3000\',\'93.807692307692\',\'2906.1923076923\',\'40404040\')','2015-03-04 15:47:39'),(88,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'3000\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'55.384615384615\',spf = \'6.9230769230769\',faov = \'31.5\',islr = \'0\',inasistencias = \'2\',total_inasist = \'400\',total_asignaciones = \'3000\',total_deducciones = \'493.80769230769\',total_pagar = \'2506.1923076923\' \r\n				WHERE cedula = \'40404040\' AND inicio_quincena = \'2015-3-1\'','2015-03-04 15:48:48'),(89,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2015-5-31\',fin_vacac = \'2015-06-18\',reincorpor = \'2015-06-19\',dia_vacac = \'15\',dia_adicional = \'4\',sueldo_dia = \'200\',total_dia_v = \'3000\',total_dia_adic = \'800\',total_pagar = \'3800\' \r\n						WHERE id_bono = \'1\'','2015-03-04 15:51:56'),(90,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'11\',sid = \'210.55555555556\',total_pagar = \'17370.833333333\' \r\n						WHERE id_aguinaldo = \'1\'','2015-03-04 15:55:01'),(91,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-04-14 03:51:07'),(92,'zuricato','Rafael','Mercado','SELECT * FROM usuario WHERE id_usuario = \'zuricato\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-04-14 03:52:34'),(93,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-04-14 03:52:58'),(94,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-04-24 15:59:31'),(95,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-09-25 02:29:22'),(96,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-10-04 19:30:58'),(97,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-10-05 01:34:12'),(98,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-03-20 23:31:49'),(99,'full','Leonel','Torres','INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)\r\n			VALUES (\'admin\',\'21232f297a57a5a743894a0e4a801fc3\',\'administrador\',\'administrador\',\'1\')','2016-03-20 23:32:48'),(100,'full','Leonel','Torres','INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)\r\n			VALUES (\'sdas\',\'a8f5f167f44f4964e6c998dee827110c\',\'dasdasd\',\'asdas\',\'1\')','2016-03-20 23:34:56'),(101,'full','Leonel','Torres','INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)\r\n			VALUES (\'adasd\',\'a8f5f167f44f4964e6c998dee827110c\',\'asdas\',\'dasdasd\',\'2\')','2016-03-20 23:35:56'),(102,'full','Leonel','Torres','INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)\r\n			VALUES (\'zvxcvx\',\'c60e742db57b840ee601037532a14211\',\'xcvas\',\'sdzxc\',\'1\')','2016-03-20 23:37:08'),(103,'full','Leonel','Torres','INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)\r\n			VALUES (\'xcvxvxcv\',\'0363cab82a4bc385477d036b6e45f063\',\'dfvxcvx\',\'cvxcvcv\',\'1\')','2016-03-20 23:37:50'),(104,'full','Leonel','Torres','INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)\r\n			VALUES (\'cxcv\',\'bbb062b46e3c61ef22a1db97f29d0aa9\',\'xcvxcv\',\'xcvxcv\',\'1\')','2016-03-20 23:40:23'),(105,'full','Leonel','Torres','INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)\r\n			VALUES (\'cxfsdfs\',\'e5c5e9a6fc33c8ae790eebfc3068edd6\',\'sdfafas\',\'sdfsd\',\'2\')','2016-03-20 23:41:16'),(106,'full','Leonel','Torres','INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)\r\n			VALUES (\'dfsdfs\',\'c0daef6ead48ad2c70fc086ad98965e2\',\'asdasda\',\'sdasd\',\'2\')','2016-03-20 23:42:10'),(107,'full','Leonel','Torres','INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)\r\n			VALUES (\'sdfsdf\',\'92330340bd57804ab0448bbc2b4bdd1e\',\'sdfsd\',\'fsdf\',\'2\')','2016-03-20 23:42:57'),(108,'full','Leonel','Torres','INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)\r\n			VALUES (\'xdfsdfsdf\',\'0cc175b9c0f1b6a831c399e269772661\',\'fgdfgdf\',\'gdfgd\',\'1\')','2016-03-20 23:47:40'),(109,'full','Leonel','Torres','INSERT INTO usuario (id_usuario,clave,nombre,apellido,nivel)\r\n			VALUES (\'sdfsdfs\',\'0cc175b9c0f1b6a831c399e269772661\',\'rter\',\'erter\',\'1\')','2016-03-20 23:49:54'),(110,'full','Leonel','Torres','DELETE FROM usuario WHERE id_usuario = \'adasd\'','2016-03-20 23:50:01'),(111,'full','Leonel','Torres','DELETE FROM usuario WHERE id_usuario = \'cxcv\'','2016-03-20 23:50:12'),(112,'full','Leonel','Torres','DELETE FROM usuario WHERE id_usuario = \'cxfsdfs\'','2016-03-20 23:50:17'),(113,'full','Leonel','Torres','DELETE FROM usuario WHERE id_usuario = \'dfsdfs\'','2016-03-20 23:50:23'),(114,'full','Leonel','Torres','DELETE FROM usuario WHERE id_usuario = \'sdas\'','2016-03-20 23:50:29'),(115,'full','Leonel','Torres','DELETE FROM usuario WHERE id_usuario = \'sdfsdf\'','2016-03-20 23:50:42'),(116,'full','Leonel','Torres','DELETE FROM usuario WHERE id_usuario = \'sdfsdfs\'','2016-03-20 23:50:48'),(117,'full','Leonel','Torres','DELETE FROM usuario WHERE id_usuario = \'xcvxvxcv\'','2016-03-20 23:50:53'),(118,'full','Leonel','Torres','DELETE FROM usuario WHERE id_usuario = \'xdfsdfsdf\'','2016-03-20 23:50:58'),(119,'full','Leonel','Torres','DELETE FROM usuario WHERE id_usuario = \'zvxcvx\'','2016-03-20 23:51:05'),(120,'admin','administrador','administrador','SELECT * FROM usuario WHERE id_usuario = \'admin\' AND clave = \'21232f297a57a5a743894a0e4a801fc3\'','2016-03-20 23:52:53'),(121,'admin','administrador','administrador','UPDATE usuario \r\n			SET id_usuario = \'admin\',clave = \'21232f297a57a5a743894a0e4a801fc3\',nombre = \'administrador\',apellido = \'administrador\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n			WHERE usuario.id_usuario = \'admin\'','2016-03-20 23:53:07'),(122,'admin','administrador','administrador','UPDATE trabajador SET cedula = \'40404040\', nombre = \'Manuel\', apellido = \'Garcia\', ciudadania = \'Peruano\', pasaporte = \'654321\', libreta_militr = \'123456\', fe_nac = \'1991-2-23\', lug_nac = \'aqui mismo\', est_civil = \'Soltero\', nconyugue = \'n/a\', estudia = \'1\',direccion = \'Ni idea de donde es\', telefono = \'0416-1234567\', telefono_em = \'0424-1234567\', estado = \'1\', actualizado = \'2016-3-20\'\r\n			WHERE cedula = \'40404040\'','2016-03-21 00:33:29'),(123,'admin','administrador','administrador','UPDATE laboral SET fecha_ingreso = \'2010-5-31\', condicion = \'Fijo\', cargo = \'Auxiliar Fisioterapeuta\', rango = \'Personal Empleado\', area_desemp = \'Fisiatria\', resolucion = \'0\', ley = \'LOTTT\'\r\n			WHERE cedula = \'40404040\'','2016-03-21 00:33:29'),(124,'admin','administrador','administrador','DELETE FROM familia WHERE cedula = \'40404040\'','2016-03-21 00:33:29'),(125,'admin','administrador','administrador','UPDATE estudios SET estudios = \'Universitario\', lugar_estudio = \'UPTM\', anno = \'2010\', titulo = \'TSU Informatica\', observacion = \'De chiripa xD xD\'\r\n			WHERE cedula = \'40404040\'','2016-03-21 00:33:29'),(126,'admin','administrador','administrador','UPDATE documentos SET partida_naci = \'1\', inscrip_militar = \'1\', cedula_ident = \'1\', rif = \'1\', declaracion_jurada = \'1\', informe_medico = \'1\', parti_nac_h = \'0\', acta_mat_div = \'0\', defunciones = \'0\', titulos = \'0\', certificados = \'0\', const_hor_est = \'0\'\r\n			WHERE cedula = \'40404040\'','2016-03-21 00:33:29'),(127,'admin','administrador','administrador','DELETE FROM referencia_personal WHERE cedula = \'40404040\'','2016-03-21 00:33:29'),(128,'admin','administrador','administrador','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'44444444\',\'Fula\',\'Nito\',\'niguna\',\'0416-1234567\',\'40404040\')','2016-03-21 00:33:29'),(129,'admin','administrador','administrador','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'55555555\',\'Chaca\',\'Ron\',\'Maestro\',\'0416-1234567\',\'40404040\')','2016-03-21 00:33:29'),(130,'admin','administrador','administrador','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'66666666\',\'Cha Pu\',\'Lin\',\'Estudiante\',\'0416-7654321\',\'40404040\')','2016-03-21 00:33:29'),(131,'admin','administrador','administrador','UPDATE uniforme SET camisa = \'S\', pantalon = \'30\', calzado = \'35\'\r\n			WHERE cedula = \'40404040\'','2016-03-21 00:33:29'),(132,'admin','administrador','administrador','INSERT INTO trabajador (cedula,nombre,apellido,ciudadania,pasaporte,libreta_militr,fe_nac,lug_nac,est_civil,nconyugue,estudia,direccion,telefono,estado,actualizado)\r\n			VALUES (\'123412\',\'asdasd\',\'asdasd\',\'dfsdf\',\'34234\',\'rwer234\',\'2001-1-15\',\'sdsdfsdf\',\'Soltero\',\'sdfsdfsdf\',\'0\',\'sdfsdfsdf\',\'0414-8976543\',\'1\',\'2016-3-20\')','2016-03-21 00:59:53'),(133,'admin','administrador','administrador','INSERT INTO comision_servicio (cedula,dpt_envia,fecha_ingreso,cargo,observacion)\r\n			VALUES (\'123412\',\'sfsdfsdf\',\'2000-10-29\',\'sdfsdf\',\'sdfsdf\')','2016-03-21 00:59:53'),(134,'admin','administrador','administrador','UPDATE trabajador \r\n			SET cedula = \'123412\',nombre = \'Asdasd\',apellido = \'Asdasd\',ciudadania = \'Dfsdf\',pasaporte = \'34234\',libreta_militr = \'rwer234\',fe_nac = \'2001-1-15\',lug_nac = \'Sdsdfsdf\',est_civil = \'Soltero\',nconyugue = \'\',estudia = \'0\',direccion = \'sdfsdfsdf\',telefono = \'0414-8976543\',estado = \'0\',actualizado = \'2016-3-20\'\r\n			WHERE cedula = \'123412\'','2016-03-21 01:00:14'),(135,'admin','administrador','administrador','UPDATE comision_servicio \r\n			SET cedula = \'123412\',dpt_envia = \'Sfsdfsdf\',fecha_ingreso = \'2000-10-29\',cargo = \'sdfsdf\',observacion = \'sdfsdf\'\r\n			WHERE cedula = \'123412\'','2016-03-21 01:00:14'),(136,'admin','administrador','administrador','SELECT * FROM usuario WHERE id_usuario = \'admin\' AND clave = \'21232f297a57a5a743894a0e4a801fc3\'','2016-03-23 02:45:18'),(137,'admin','administrador','administrador','UPDATE usuario \r\n			SET id_usuario = \'admin\',nombre = \'Administrador\',apellido = \'Administrador\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n			WHERE usuario.id_usuario = \'admin\'','2016-03-23 02:46:15'),(138,'admin','Administrador','Administrador','SELECT * FROM usuario WHERE id_usuario = \'admin\' AND clave = \'21232f297a57a5a743894a0e4a801fc3\'','2016-03-23 02:46:23'),(139,'admin','Administrador','Administrador','UPDATE usuario \r\n			SET id_usuario = \'admin\',nombre = \'Administrador\',apellido = \'Administrador\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n			WHERE usuario.id_usuario = \'admin\'','2016-03-23 02:52:53'),(140,'admin','Administrador','Administrador','SELECT * FROM usuario WHERE id_usuario = \'admin\' AND clave = \'21232f297a57a5a743894a0e4a801fc3\'','2016-03-23 02:54:29'),(141,'admin','Administrador','Administrador','UPDATE usuario \r\n			SET id_usuario = \'admin\',nombre = \'Administrador\',apellido = \'Administrador\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n			WHERE usuario.id_usuario = \'admin\'','2016-03-23 02:54:38'),(142,'admin','Administrador','Administrador','SELECT * FROM usuario WHERE id_usuario = \'admin\' AND clave = \'21232f297a57a5a743894a0e4a801fc3\'','2016-03-23 02:55:26'),(143,'admin','Administrador','Administrador','UPDATE usuario \r\n			SET id_usuario = \'admin\',nombre = \'Administrador\',apellido = \'Administrador\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n			WHERE usuario.id_usuario = \'admin\'','2016-03-23 02:55:33'),(144,'admin','Administrador','Administrador','SELECT * FROM usuario WHERE id_usuario = \'admin\' AND clave = \'21232f297a57a5a743894a0e4a801fc3\'','2016-03-23 02:57:05'),(145,'admin','Administrador','Administrador','UPDATE usuario \r\n			SET id_usuario = \'admin\',nombre = \'Administrador\',apellido = \'Administrador\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n			WHERE usuario.id_usuario = \'admin\'','2016-03-23 02:57:12'),(146,'admin','Administrador','Administrador','SELECT * FROM usuario WHERE id_usuario = \'admin\' AND clave = \'21232f297a57a5a743894a0e4a801fc3\'','2016-03-23 03:00:58'),(147,'admin','Administrador','Administrador','UPDATE usuario \r\n			SET id_usuario = \'admin\',nombre = \'Administrador\',apellido = \'Administrador\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n			WHERE usuario.id_usuario = \'admin\'','2016-03-23 03:01:06'),(148,'admin','Administrador','Administrador','UPDATE usuario \r\n			SET id_usuario = \'admina\',nombre = \'Administrador\',apellido = \'Administrador\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n			WHERE usuario.id_usuario = \'admin\'','2016-03-23 03:01:23'),(149,'admina','Administrador','Administrador','SELECT * FROM usuario WHERE id_usuario = \'admina\' AND clave = \'21232f297a57a5a743894a0e4a801fc3\'','2016-03-23 03:01:32'),(150,'admina','Administrador','Administrador','UPDATE usuario \r\n			SET id_usuario = \'admin\',nombre = \'Administrador\',apellido = \'Administrador\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n			WHERE usuario.id_usuario = \'admina\'','2016-03-23 03:01:43'),(151,'admin','Administrador','Administrador','SELECT * FROM usuario WHERE id_usuario = \'admin\' AND clave = \'21232f297a57a5a743894a0e4a801fc3\'','2016-03-23 03:01:50'),(152,'admin','Administrador','Administrador','SELECT * FROM usuario WHERE id_usuario = \'admin\' AND clave = \'21232f297a57a5a743894a0e4a801fc3\'','2016-03-30 03:42:05'),(153,'admin','Administrador','Administrador','SELECT * FROM usuario WHERE id_usuario = \'admin\' AND clave = \'21232f297a57a5a743894a0e4a801fc3\'','2016-03-30 05:04:19'),(154,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-03-30 15:01:31'),(155,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-03-31 16:01:47'),(156,'full','Leonel','Torres','INSERT INTO bono_vacac (ini_vacac,fin_vacac,reincorpor,dia_vacac,dia_adicional,sueldo_dia,total_dia_v,total_dia_adic,total_pagar,cedula)\r\n						VALUES (\'2016-12-15\',\'2017-01-04\',\'2017-01-05\',\'40\',\'0\',\'346.5\',\'13860\',\'0\',\'13860\',\'18191839\')','2016-03-31 16:12:33'),(157,'full','Leonel','Torres','INSERT INTO bono_vacac (ini_vacac,fin_vacac,reincorpor,dia_vacac,dia_adicional,sueldo_dia,total_dia_v,total_dia_adic,total_pagar,cedula)\r\n						VALUES (\'2016-5-31\',\'2016-06-28\',\'2016-06-29\',\'15\',\'5\',\'200\',\'3000\',\'1000\',\'4000\',\'40404040\')','2016-03-31 16:28:45'),(158,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2016-12-15\',fin_vacac = \'2017-01-04\',reincorpor = \'2017-01-05\',dia_vacac = \'40\',dia_adicional = \'0\',sueldo_dia = \'346.5\',total_dia_v = \'13860\',total_dia_adic = \'0\',total_pagar = \'13860\' \r\n						WHERE id_bono = \'4\'','2016-03-31 16:32:38'),(159,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2016-5-31\',fin_vacac = \'2016-06-28\',reincorpor = \'2016-06-29\',dia_vacac = \'15\',dia_adicional = \'5\',sueldo_dia = \'200\',total_dia_v = \'3000\',total_dia_adic = \'1000\',total_pagar = \'4000\' \r\n						WHERE id_bono = \'5\'','2016-03-31 16:33:01'),(160,'full','Leonel','Torres','UPDATE trabajador SET cedula = \'18191839\', nombre = \'Leonel\', apellido = \'Torres\', ciudadania = \'Venezolano\', pasaporte = \'654321\', libreta_militr = \'123456\', fe_nac = \'1988-12-27\', lug_nac = \'Abejales\', est_civil = \'Soltero\', nconyugue = \'N/a\', estudia = \'0\',direccion = \'El Palmo\', telefono = \'0416-1234567\', telefono_em = \'0424-1234567\', estado = \'0\', actualizado = \'2016-4-1\'\r\n			WHERE cedula = \'18191839\'','2016-04-01 23:18:56'),(161,'full','Leonel','Torres','UPDATE laboral SET fecha_ingreso = \'2013-12-15\', condicion = \'Fijo\', cargo = \'Director(a)\', rango = \'Personal de Alto Nivel\', area_desemp = \'Direccion\', resolucion = \'0\', ley = \'LEFP\'\r\n			WHERE cedula = \'18191839\'','2016-04-01 23:18:56'),(162,'full','Leonel','Torres','DELETE FROM familia WHERE cedula = \'18191839\'','2016-04-01 23:18:56'),(163,'full','Leonel','Torres','INSERT INTO familia (cedula,cedulaf,nombref,apellidof,fecha_nacf,parentescof,estudiaf,empleadof,cargof)\r\n					VALUES (\'18191839\',\'10236599\',\'Maria\',\'Arellano\',\'1961-5-30\',\'Mama\',\'0\',\'0\',\'n/a\')','2016-04-01 23:18:56'),(164,'full','Leonel','Torres','UPDATE estudios SET estudios = \'Universitario\', lugar_estudio = \'Uptm\', anno = \'2002\', titulo = \'TSU Informatica\', observacion = \'N/a\'\r\n			WHERE cedula = \'18191839\'','2016-04-01 23:18:56'),(165,'full','Leonel','Torres','UPDATE documentos SET partida_naci = \'1\', inscrip_militar = \'0\', cedula_ident = \'1\', rif = \'0\', declaracion_jurada = \'1\', informe_medico = \'0\', parti_nac_h = \'0\', acta_mat_div = \'1\', defunciones = \'0\', titulos = \'1\', certificados = \'0\', const_hor_est = \'1\'\r\n			WHERE cedula = \'18191839\'','2016-04-01 23:18:56'),(166,'full','Leonel','Torres','DELETE FROM referencia_personal WHERE cedula = \'18191839\'','2016-04-01 23:18:56'),(167,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'10101010\',\'Pedro\',\'Perez\',\'niguna\',\'0416-1234567\',\'18191839\')','2016-04-01 23:18:56'),(168,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'20202020\',\'Paco\',\'Pilla\',\'Maestro\',\'0416-1234567\',\'18191839\')','2016-04-01 23:18:56'),(169,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'30303030\',\'Juan\',\'Manco\',\'Estudiante\',\'0416-7654321\',\'18191839\')','2016-04-01 23:18:56'),(170,'full','Leonel','Torres','UPDATE uniforme SET camisa = \'M\', pantalon = \'32\', calzado = \'41\'\r\n			WHERE cedula = \'18191839\'','2016-04-01 23:18:56'),(171,'full','Leonel','Torres','INSERT INTO trabajador (cedula,nombre,apellido,ciudadania,pasaporte,libreta_militr,fe_nac,lug_nac,est_civil,nconyugue,estudia,direccion,telefono,telefono_em,estado,actualizado)\r\n			VALUES (\'423123123\',\'Sdfsdfsdf\',\'Sdfsdfsd\',\'Venezolano\',\'23423\',\'123123123123\',\'1982-5-18\',\'Sdfsdfsdf\',\'Soltero\',\'Sdfsdf\',\'0\',\'sdfsfsdf\',\'0414-8976543\',\'0414-8976543\',\'1\',\'2016-4-1\')','2016-04-01 23:22:33'),(172,'full','Leonel','Torres','INSERT INTO laboral (cedula,fecha_ingreso,condicion,cargo,rango,area_desemp,resolucion,ley)\r\n			VALUES (\'423123123\',\'2012-3-5\',\'Fijo\',\'Medico Fisiatra\',\'Personal Empleado\',\'Fisiatria\',\'234234\',\'LOTTT\')','2016-04-01 23:22:33'),(173,'full','Leonel','Torres','INSERT INTO familia (cedula,cedulaf,nombref,apellidof,fecha_nacf,parentescof,estudiaf,empleadof,cargof)\r\n					VALUES (\'423123123\',\'123123\',\'sdfsdf\',\'sdfsdf\',\'2012-3-1\',\'asdasd\',\'1\',\'0\',\'asdasd\')','2016-04-01 23:22:33'),(174,'full','Leonel','Torres','INSERT INTO estudios (cedula,estudios,lugar_estudio,anno,titulo,observacion)\r\n			VALUES (\'423123123\',\'Universitario\',\'Asdasd\',\'2015\',\'adasd\',\'Asdasd\')','2016-04-01 23:22:33'),(175,'full','Leonel','Torres','INSERT INTO documentos (cedula,partida_naci,inscrip_militar,cedula_ident,rif,declaracion_jurada,informe_medico,parti_nac_h,acta_mat_div,defunciones,titulos,certificados,const_hor_est)\r\n			VALUES (\'423123123\',\'1\',\'1\',\'1\',\'1\',\'1\',\'1\',\'1\',\'1\',\'1\',\'1\',\'1\',\'1\')','2016-04-01 23:22:33'),(176,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'233123\',\'Asasd\',\'Asdasdasd\',\'Asdasd\',\'0414-8976543\',\'423123123\')','2016-04-01 23:22:33'),(177,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'4234123\',\'Sxsdfsdfsd\',\'Fsdf\',\'Sdfsdf\',\'0414-8976543\',\'423123123\')','2016-04-01 23:22:33'),(178,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'231231\',\'Sdfsdfsd\',\'Fsdf\',\'Fsdfsdf\',\'0414-8976543\',\'423123123\')','2016-04-01 23:22:33'),(179,'full','Leonel','Torres','INSERT INTO uniforme (cedula,camisa,pantalon,calzado)\r\n			VALUES (\'423123123\',\'M\',\'32\',\'41\')','2016-04-01 23:22:33'),(180,'full','Leonel','Torres','UPDATE trabajador SET cedula = \'423123123\', nombre = \'Sdfsdfsdf\', apellido = \'Sdfsdfsd\', ciudadania = \'Venezolano\', pasaporte = \'23423\', libreta_militr = \'123123123123\', fe_nac = \'1982-5-18\', lug_nac = \'Sdfsdfsdf\', est_civil = \'Soltero\', nconyugue = \'Sdfsdf\', estudia = \'0\',direccion = \'sdfsfsdf\', telefono = \'0414-8976543\', telefono_em = \'0414-8976543\', estado = \'1\', actualizado = \'2016-4-1\'\r\n			WHERE cedula = \'423123123\'','2016-04-01 23:23:09'),(181,'full','Leonel','Torres','UPDATE laboral SET fecha_ingreso = \'2012-3-5\', condicion = \'Fijo\', cargo = \'Medico Fisiatra\', rango = \'Personal Empleado\', area_desemp = \'Fisiatria\', resolucion = \'234234\', ley = \'LOTTT\'\r\n			WHERE cedula = \'423123123\'','2016-04-01 23:23:09'),(182,'full','Leonel','Torres','DELETE FROM familia WHERE cedula = \'423123123\'','2016-04-01 23:23:09'),(183,'full','Leonel','Torres','INSERT INTO familia (cedula,cedulaf,nombref,apellidof,fecha_nacf,parentescof,estudiaf,empleadof,cargof)\r\n					VALUES (\'423123123\',\'123123\',\'sdfsdf\',\'sdfsdf\',\'2012-3-1\',\'asdasd\',\'1\',\'0\',\'asdasd\')','2016-04-01 23:23:09'),(184,'full','Leonel','Torres','UPDATE estudios SET estudios = \'Universitario\', lugar_estudio = \'Asdasd\', anno = \'2015\', titulo = \'adasd\', observacion = \'Asdasd\'\r\n			WHERE cedula = \'423123123\'','2016-04-01 23:23:09'),(185,'full','Leonel','Torres','UPDATE documentos SET partida_naci = \'1\', inscrip_militar = \'1\', cedula_ident = \'1\', rif = \'1\', declaracion_jurada = \'1\', informe_medico = \'1\', parti_nac_h = \'1\', acta_mat_div = \'1\', defunciones = \'1\', titulos = \'1\', certificados = \'1\', const_hor_est = \'1\'\r\n			WHERE cedula = \'423123123\'','2016-04-01 23:23:09'),(186,'full','Leonel','Torres','DELETE FROM referencia_personal WHERE cedula = \'423123123\'','2016-04-01 23:23:09'),(187,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'231231\',\'Sdfsdfsd\',\'Fsdf\',\'Fsdfsdf\',\'0414-8976543\',\'423123123\')','2016-04-01 23:23:09'),(188,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'233123\',\'Asasd\',\'Asdasdasd\',\'Asdasd\',\'0414-8976543\',\'423123123\')','2016-04-01 23:23:09'),(189,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'4234123\',\'Sxsdfsdfsd\',\'Fsdf\',\'Sdfsdf\',\'0414-8976543\',\'423123123\')','2016-04-01 23:23:09'),(190,'full','Leonel','Torres','UPDATE uniforme SET camisa = \'M\', pantalon = \'32\', calzado = \'41\'\r\n			WHERE cedula = \'423123123\'','2016-04-01 23:23:09'),(191,'full','Leonel','Torres','UPDATE trabajador \r\n			SET cedula = \'123412\',nombre = \'Asdasd\',apellido = \'Asdasd\',ciudadania = \'Venezolano\',pasaporte = \'34234\',libreta_militr = \'rwer234\',fe_nac = \'2001-1-15\',lug_nac = \'Sdsdfsdf\',est_civil = \'Soltero\',nconyugue = \'N/a\',estudia = \'0\',direccion = \'sdfsdfsdf\',telefono = \'0414-8976543\',estado = \'1\',actualizado = \'2016-4-1\'\r\n			WHERE cedula = \'123412\'','2016-04-02 02:18:56'),(192,'full','Leonel','Torres','UPDATE comision_servicio \r\n			SET cedula = \'123412\',dpt_envia = \'Sfsdfsdf\',fecha_ingreso = \'2000-10-29\',cargo = \'Sdfsdf\',observacion = \'Sdfsdf\'\r\n			WHERE cedula = \'123412\'','2016-04-02 02:18:56'),(193,'full','Leonel','Torres','INSERT INTO trabajador (cedula,nombre,apellido,ciudadania,pasaporte,libreta_militr,fe_nac,lug_nac,est_civil,nconyugue,estudia,direccion,telefono,estado,actualizado)\r\n			VALUES (\'12313\',\'Sdasdatrhyrty\',\'Sdasda\',\'V\',\'34234\',\'12123\',\'1987-2-16\',\'Sdsdfsdf\',\'Soltero\',\'Rtyr\',\'1\',\'adasdas\',\'0414-8976543\',\'1\',\'2016-4-1\')','2016-04-02 02:20:29'),(194,'full','Leonel','Torres','INSERT INTO comision_servicio (cedula,dpt_envia,fecha_ingreso,cargo,observacion)\r\n			VALUES (\'12313\',\'Asdasdsd\',\'2000-10-16\',\'Cbsdfsd\',\'Asadasd\')','2016-04-02 02:20:29'),(195,'full','Leonel','Torres','UPDATE trabajador \r\n			SET cedula = \'12313\',nombre = \'Sdasdatrhyrty\',apellido = \'Sdasda\',ciudadania = \'Venezolano\',pasaporte = \'34234\',libreta_militr = \'12123\',fe_nac = \'1987-2-16\',lug_nac = \'Sdsdfsdf\',est_civil = \'Soltero\',nconyugue = \'Rtyr\',estudia = \'1\',direccion = \'adasdas\',telefono = \'0414-8976543\',estado = \'0\',actualizado = \'2016-4-1\'\r\n			WHERE cedula = \'12313\'','2016-04-02 02:25:02'),(196,'full','Leonel','Torres','UPDATE comision_servicio \r\n			SET cedula = \'12313\',dpt_envia = \'Asdasdsd\',fecha_ingreso = \'2000-10-16\',cargo = \'Cbsdfsd\',observacion = \'Asadasd\'\r\n			WHERE cedula = \'12313\'','2016-04-02 02:25:02'),(197,'full','Leonel','Torres','UPDATE trabajador \r\n			SET cedula = \'12313\',nombre = \'Sdasdatrhyrty\',apellido = \'Sdasda\',ciudadania = \'Venezolano\',pasaporte = \'34234\',libreta_militr = \'12123\',fe_nac = \'1987-2-16\',lug_nac = \'Sdsdfsdf\',est_civil = \'Soltero\',nconyugue = \'Rtyr\',estudia = \'1\',direccion = \'adasdas\',telefono = \'0414-8976543\',estado = \'1\',actualizado = \'2016-4-1\'\r\n			WHERE cedula = \'12313\'','2016-04-02 02:25:11'),(198,'full','Leonel','Torres','UPDATE comision_servicio \r\n			SET cedula = \'12313\',dpt_envia = \'Asdasdsd\',fecha_ingreso = \'2000-10-16\',cargo = \'Cbsdfsd\',observacion = \'Asadasd\'\r\n			WHERE cedula = \'12313\'','2016-04-02 02:25:11'),(199,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-04-02 04:10:01'),(200,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-04-02 20:35:36'),(201,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'8316.00\'\r\n					WHERE cedula = \'30303030\'','2016-04-02 21:10:55'),(202,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'6000.00\'\r\n					WHERE cedula = \'40404040\'','2016-04-02 21:10:55'),(203,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'6000.00\'\r\n					WHERE cedula = \'423123123\'','2016-04-02 21:10:55'),(204,'full','Leonel','Torres','INSERT INTO bono_vacac (ini_vacac,fin_vacac,reincorpor,dia_vacac,dia_adicional,sueldo_dia,total_dia_v,total_dia_adic,total_pagar,cedula)\r\n						VALUES (\'2016-4-4\',\'2016-04-28\',\'2016-04-29\',\'15\',\'3\',\'200\',\'3000\',\'600\',\'3600\',\'423123123\')','2016-04-02 21:37:20'),(205,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-04-08 04:22:03'),(215,'full','Leonel','Torres','INSERT INTO trabajador (cedula,nombre,apellido,ciudadania,pasaporte,libreta_militr,fe_nac,lug_nac,est_civil,nconyugue,estudia,direccion,telefono,telefono_em,estado,actualizado)\r\n			VALUES (\'10201030\',\'Transaccion\',\'Prueba\',\'Venezolano\',\'12123123\',\'1312312\',\'1983-4-16\',\'Ewerwer\',\'Soltero\',\'Sfsdfsdf\',\'1\',\'ssdfsdf\',\'0414-1234567\',\'0414-1234567\',\'1\',\'2016-4-8\')','2016-04-08 06:50:06'),(216,'full','Leonel','Torres','INSERT INTO laboral (cedula,fecha_ingreso,condicion,cargo,rango,area_desemp,resolucion,ley)\r\n			VALUES (\'10201030\',\'2013-6-3\',\'Fijo\',\'Portero(a)\',\'Personal Obrero\',\'Recepcion\',\'1231233\',\'LOTTT\')','2016-04-08 06:50:06'),(217,'full','Leonel','Torres','INSERT INTO estudios (cedula,estudios,lugar_estudio,anno,titulo,observacion)\r\n			VALUES (\'10201030\',\'Secundaria\',\'Adsfsdf\',\'2011\',\'sdfsdf\',\'Sdfsdf\')','2016-04-08 06:50:06'),(218,'full','Leonel','Torres','INSERT INTO documentos (cedula,partida_naci,inscrip_militar,cedula_ident,rif,declaracion_jurada,informe_medico,parti_nac_h,acta_mat_div,defunciones,titulos,certificados,const_hor_est)\r\n			VALUES (\'10201030\',\'1\',\'1\',\'1\',\'1\',\'1\',\'0\',\'1\',\'0\',\'0\',\'0\',\'0\',\'0\')','2016-04-08 06:50:06'),(219,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'7243741\',\'Prueba\',\'Transaccion\',\'Fsdf\',\'0414-1234567\',\'10201030\')','2016-04-08 06:50:06'),(220,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'2378323\',\'Prueba\',\'Transaccion\',\'Wsdfs\',\'0414-1234567\',\'10201030\')','2016-04-08 06:50:06'),(221,'full','Leonel','Torres','INSERT INTO referencia_personal (cedula_rp,nombre_rp,apellido_rp,ocupacion_rp,telefono_rp,cedula)\r\n				VALUES (\'2349560\',\'Prueba\',\'Transaccion\',\'Dfsdfsdf\',\'0414-1234567\',\'10201030\')','2016-04-08 06:50:06'),(222,'full','Leonel','Torres','INSERT INTO uniforme (cedula,camisa,pantalon,calzado)\r\n			VALUES (\'10201030\',\'M\',\'12\',\'12\')','2016-04-08 06:50:06'),(223,'full','Leonel','Torres','INSERT INTO familia (cedula,cedulaf,nombref,apellidof,fecha_nacf,parentescof,estudiaf,empleadof,cargof)\r\n					VALUES (\'10201030\',\'123123123\',\'Transaccion\',\'Prueba\',\'2005-7-7\',\'wwewer\',\'1\',\'0\',\'werwerwer\')','2016-04-08 06:50:06'),(224,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-04-09 06:17:50'),(225,'full','Leonel','Torres','INSERT INTO salario (sueldo_quincena,dia_adicional,total_dia_adic,retro_sueldo,retro_aguinaldos,retro_vacaciones,sso,spf,faov,islr,inasistencias,total_inasist,inicio_quincena,fin_quincena,total_asignaciones,total_deducciones,total_pagar,cedula)\r\n				VALUES (\'4158\',\'0\',\'0\',\'0\',\'0\',\'0\',\'76.763076923077\',\'9.5953846153846\',\'46.2\',\'0\',\'0\',\'0\',\'2016-4-1\',\'2016-4-15\',\'4158\',\'132.55846153846\',\'4025.4415384615\',\'30303030\')','2016-04-09 06:48:51'),(226,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-04-09 15:48:33'),(227,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'8316.00\'\r\n					WHERE cedula = \'30303030\'','2016-04-09 15:48:57'),(228,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'6000.00\'\r\n					WHERE cedula = \'40404040\'','2016-04-09 15:48:57'),(229,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'6000.00\'\r\n					WHERE cedula = \'423123123\'','2016-04-09 15:48:57'),(230,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'13000,45\'\r\n					WHERE cedula = \'10201030\'','2016-04-09 15:48:57'),(231,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'8316.00\'\r\n					WHERE cedula = \'30303030\'','2016-04-09 15:49:11'),(232,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'6000.00\'\r\n					WHERE cedula = \'40404040\'','2016-04-09 15:49:11'),(233,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'6000.00\'\r\n					WHERE cedula = \'423123123\'','2016-04-09 15:49:11'),(234,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'13000.45\'\r\n					WHERE cedula = \'10201030\'','2016-04-09 15:49:11'),(235,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-04-10 04:32:40'),(236,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-04-10 15:19:05'),(237,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-04-11 02:07:05'),(238,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'8316\'\r\n					WHERE cedula = \'30303030\'','2016-04-11 02:32:57'),(239,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'6000.76\'\r\n					WHERE cedula = \'40404040\'','2016-04-11 02:32:57'),(240,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'6000.82\'\r\n					WHERE cedula = \'423123123\'','2016-04-11 02:32:57'),(241,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'13000.45\'\r\n					WHERE cedula = \'10201030\'','2016-04-11 02:32:57'),(242,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'76.763076923077\',spf = \'9.5953846153846\',faov = \'46.2\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'132.55846153846\',total_pagar = \'4025.4415384615\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 02:41:57'),(243,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'76.763076923077\',spf = \'9.5953846153846\',faov = \'46.2\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'132.55846153846\',total_pagar = \'4025.4415384615\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 02:44:12'),(244,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'76.763076923077\',spf = \'9.5953846153846\',faov = \'46.2\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'132.55846153846\',total_pagar = \'4025.4415384615\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 02:49:50'),(245,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'76.763076923077\',spf = \'9.5953846153846\',faov = \'46.2\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'132.55846153846\',total_pagar = \'4025.4415384615\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 02:50:31'),(246,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'76.763076923077\',spf = \'9.5953846153846\',faov = \'46.2\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'132.55846153846\',total_pagar = \'4025.4415384615\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 02:55:43'),(247,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'76.763076923077\',spf = \'9.5953846153846\',faov = \'46.2\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'132.55846153846\',total_pagar = \'4025.4415384615\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 02:59:17'),(248,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'76.763076923077\',spf = \'9.5953846153846\',faov = \'46.2\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'132.55846153846\',total_pagar = \'4025.4415384615\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 03:00:25'),(249,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'76.763076923077\',spf = \'9.5953846153846\',faov = \'46.2\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'132.55846153846\',total_pagar = \'4025.4415384615\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 03:08:24'),(250,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'76.763076923077\',spf = \'9.5953846153846\',faov = \'46.2\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'132.55846153846\',total_pagar = \'4025.4415384615\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 03:12:14'),(251,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'0\',spf = \'0\',faov = \'0\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'0\',total_pagar = \'4158\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 05:37:26'),(252,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'76.763076923077\',spf = \'9.5953846153846\',faov = \'46.2\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'132.55846153846\',total_pagar = \'4025.4415384615\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 05:39:05'),(253,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'0\',spf = \'0\',faov = \'0\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'0\',total_pagar = \'4158\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-11 05:39:57'),(254,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-04-12 02:44:42'),(255,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'0\',spf = \'0\',faov = \'0\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'0\',total_pagar = \'4158\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-12 03:46:36'),(256,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'76.763076923077\',spf = \'9.5953846153846\',faov = \'46.2\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'132.55846153846\',total_pagar = \'4025.4415384615\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-12 03:46:53'),(257,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'4158\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'0\',spf = \'0\',faov = \'0\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'4158\',total_deducciones = \'0\',total_pagar = \'4158\' \r\n				WHERE cedula = \'30303030\' AND inicio_quincena = \'2016-4-1\'','2016-04-12 03:47:48'),(258,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2016-04-13 21:57:33'),(259,'full','Leonel','Torres','UPDATE configuracion SET estatus=\'2\' WHERE nombre=\'periodo\'','2016-04-14 01:00:40'),(260,'full','Leonel','Torres','UPDATE configuracion SET estatus=\'1\' WHERE nombre=\'periodo\'','2016-04-14 01:00:47');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bono_vacac`
--

DROP TABLE IF EXISTS `bono_vacac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bono_vacac` (
  `id_bono` int(7) NOT NULL AUTO_INCREMENT,
  `ini_vacac` date NOT NULL COMMENT 'Fecha inicio de vacaciones',
  `fin_vacac` date NOT NULL COMMENT 'Fecha fin de vacaciones',
  `reincorpor` date NOT NULL COMMENT 'Fecha de reincorporacion del trabajador a sus labores',
  `dia_vacac` int(2) NOT NULL COMMENT 'Cantidad de dias normales de vacaciones',
  `dia_adicional` int(2) NOT NULL COMMENT 'Cantidad de dias adicionales de vacaciones',
  `sueldo_dia` decimal(7,2) NOT NULL COMMENT 'Sueldo Diario',
  `total_dia_v` decimal(7,2) NOT NULL COMMENT 'Total en Bs por los dias normales de vacaciones',
  `total_dia_adic` decimal(7,2) NOT NULL COMMENT 'Total en Bs por los dias adicionales de vacaciones',
  `total_pagar` decimal(7,2) NOT NULL COMMENT 'Total a cancelar en bono vacacional',
  `cedula` int(12) NOT NULL,
  PRIMARY KEY (`id_bono`),
  KEY `cedula` (`cedula`),
  CONSTRAINT `bono_vacac_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `laboral` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bono_vacac`
--

LOCK TABLES `bono_vacac` WRITE;
/*!40000 ALTER TABLE `bono_vacac` DISABLE KEYS */;
INSERT INTO `bono_vacac` VALUES (1,'2015-05-31','2015-06-18','2015-06-19',15,4,200.00,3000.00,800.00,3800.00,40404040),(2,'2015-12-17','2016-02-10','2016-02-11',40,0,277.20,11088.00,0.00,11088.00,30303030),(3,'2016-02-02','2016-02-24','2016-02-25',40,0,277.20,11088.00,0.00,11088.00,30303030),(4,'2016-12-15','2017-01-04','2017-01-05',40,0,346.50,13860.00,0.00,13860.00,18191839),(5,'2016-05-31','2016-06-28','2016-06-29',15,5,200.00,3000.00,1000.00,4000.00,40404040),(6,'2016-04-04','2016-04-28','2016-04-29',15,3,200.00,3000.00,600.00,3600.00,423123123);
/*!40000 ALTER TABLE `bono_vacac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comision_servicio`
--

DROP TABLE IF EXISTS `comision_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comision_servicio` (
  `cedula` int(12) NOT NULL,
  `dpt_envia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `cargo` varchar(23) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cedula`),
  CONSTRAINT `comision_servicio_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comision_servicio`
--

LOCK TABLES `comision_servicio` WRITE;
/*!40000 ALTER TABLE `comision_servicio` DISABLE KEYS */;
INSERT INTO `comision_servicio` VALUES (12313,'Asdasdsd','2000-10-16','Cbsdfsd','Asadasd'),(123412,'Sfsdfsdf','2000-10-29','Sdfsdf','Sdfsdf'),(20830219,'Seguro Medico','2014-12-16','AlbaÃ±il','No hace nada'),(90909090,'Seguro Medico','2014-12-29','Vigilante','Esto es una prueba para verificar la actualizacion');
/*!40000 ALTER TABLE `comision_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracion` (
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Segun el estatus activa o desactiva funciones';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion`
--

LOCK TABLES `configuracion` WRITE;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
INSERT INTO `configuracion` VALUES ('antiguedad',0),('hijo',0),('hogar',0),('otra',0),('periodo',1),('profesionalizacion',0);
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos` (
  `cedula` int(12) NOT NULL,
  `partida_naci` int(1) NOT NULL,
  `inscrip_militar` int(1) NOT NULL,
  `cedula_ident` int(1) NOT NULL,
  `rif` int(1) NOT NULL,
  `declaracion_jurada` int(1) NOT NULL,
  `informe_medico` int(1) NOT NULL,
  `parti_nac_h` int(1) NOT NULL,
  `acta_mat_div` int(1) NOT NULL,
  `defunciones` int(1) NOT NULL,
  `titulos` int(1) NOT NULL,
  `certificados` int(1) NOT NULL,
  `const_hor_est` int(1) NOT NULL,
  PRIMARY KEY (`cedula`),
  CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (10201030,1,1,1,1,1,0,1,0,0,0,0,0),(18191839,1,0,1,0,1,0,0,1,0,1,0,1),(30303030,0,0,0,0,0,0,1,1,1,1,1,1),(40404040,1,1,1,1,1,1,0,0,0,0,0,0),(423123123,1,1,1,1,1,1,1,1,1,1,1,1);
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudios`
--

DROP TABLE IF EXISTS `estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudios` (
  `cedula` int(12) NOT NULL,
  `estudios` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `lugar_estudio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `anno` year(4) NOT NULL,
  `titulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cedula`),
  CONSTRAINT `estudios_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudios`
--

LOCK TABLES `estudios` WRITE;
/*!40000 ALTER TABLE `estudios` DISABLE KEYS */;
INSERT INTO `estudios` VALUES (10201030,'Secundaria','Adsfsdf',2011,'sdfsdf','Sdfsdf'),(18191839,'Universitario','Uptm',2002,'TSU Informatica','N/a'),(30303030,'Universitario','UPTM',2003,'TSU Informatica','De chiripa xD'),(40404040,'Universitario','UPTM',2010,'TSU Informatica','De chiripa xD xD'),(423123123,'Universitario','Asdasd',2015,'adasd','Asdasd');
/*!40000 ALTER TABLE `estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `familia`
--

DROP TABLE IF EXISTS `familia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `familia` (
  `id_familia` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(12) NOT NULL,
  `cedulaf` int(12) NOT NULL,
  `nombref` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidof` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacf` date NOT NULL,
  `parentescof` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estudiaf` int(1) NOT NULL,
  `empleadof` int(1) NOT NULL,
  `cargof` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_familia`),
  KEY `cedula` (`cedula`),
  CONSTRAINT `familia_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familia`
--

LOCK TABLES `familia` WRITE;
/*!40000 ALTER TABLE `familia` DISABLE KEYS */;
INSERT INTO `familia` VALUES (2,18191839,10236599,'Maria','Arellano','1961-05-30','Mama',0,0,'n/a'),(4,423123123,123123,'sdfsdf','sdfsdf','2012-03-01','asdasd',1,0,'asdasd'),(6,10201030,123123123,'Transaccion','Prueba','2005-07-07','wwewer',1,0,'werwerwer');
/*!40000 ALTER TABLE `familia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feriado`
--

DROP TABLE IF EXISTS `feriado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feriado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` int(2) NOT NULL,
  `mes` int(2) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feriado`
--

LOCK TABLES `feriado` WRITE;
/*!40000 ALTER TABLE `feriado` DISABLE KEYS */;
INSERT INTO `feriado` VALUES (1,1,1,'AÃ±o Nuevo'),(2,18,1,'JÃºbilo Municipal'),(3,19,4,'DeclaraciÃ³n de la Independencia'),(4,1,5,'DÃ­a del Trabajo'),(5,24,6,'Batalla de Carabobo'),(6,5,7,'DÃ­a de la Independencia'),(7,14,7,'JÃºbilo Municipal'),(8,16,7,'JÃºbilo Municipal'),(9,24,7,'Natalicio de SimÃ³n BolÃ­var'),(10,12,10,'DÃ­a de la Resistencia IndÃ­gena'),(11,24,12,'VÃ­spera de Navidad'),(12,25,12,'Navidad'),(13,31,12,'Fiesta de Fin de AÃ±o');
/*!40000 ALTER TABLE `feriado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboral`
--

DROP TABLE IF EXISTS `laboral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboral` (
  `cedula` int(12) NOT NULL,
  `sueldo_mensual` decimal(7,2) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `condicion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(23) COLLATE utf8_spanish_ci NOT NULL,
  `rango` varchar(22) COLLATE utf8_spanish_ci NOT NULL,
  `area_desemp` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `resolucion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ley` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cedula`),
  CONSTRAINT `laboral_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboral`
--

LOCK TABLES `laboral` WRITE;
/*!40000 ALTER TABLE `laboral` DISABLE KEYS */;
INSERT INTO `laboral` VALUES (10201030,13000.45,'2013-06-03','Fijo','Portero(a)','Personal Obrero','Recepcion','1231233','LOTTT'),(18191839,10395.00,'2013-12-15','Fijo','Director(a)','Personal de Alto Nivel','Direccion','0','LEFP'),(30303030,8316.00,'2013-12-17','Fijo','Administrador(a)','Personal de Alto Nivel','Administracion','0','LEFP'),(40404040,6000.76,'2010-05-31','Fijo','Auxiliar Fisioterapeuta','Personal Empleado','Fisiatria','0','LOTTT'),(423123123,6000.82,'2012-03-05','Fijo','Medico Fisiatra','Personal Empleado','Fisiatria','234234','LOTTT');
/*!40000 ALTER TABLE `laboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referencia_personal`
--

DROP TABLE IF EXISTS `referencia_personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referencia_personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_rp` int(12) NOT NULL,
  `nombre_rp` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_rp` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ocupacion_rp` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_rp` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cedula` (`cedula`),
  CONSTRAINT `referencia_personal_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referencia_personal`
--

LOCK TABLES `referencia_personal` WRITE;
/*!40000 ALTER TABLE `referencia_personal` DISABLE KEYS */;
INSERT INTO `referencia_personal` VALUES (1,231231,'Sdfsdfsd','Fsdf','Fsdfsdf','0414-8976543',423123123),(2,233123,'Asasd','Asdasdasd','Asdasd','0414-8976543',423123123),(3,4234123,'Sxsdfsdfsd','Fsdf','Sdfsdf','0414-8976543',423123123),(4,10101010,'Pedro','Perez','niguna','0416-1234567',18191839),(5,11111111,'Chiqui','Mesa','niguna','0416-1234567',30303030),(6,20202020,'Paco','Pilla','Maestro','0416-1234567',18191839),(7,22222222,'Pancho','Palacio','Maestro','0416-1234567',30303030),(8,30303030,'Juan','Manco','Estudiante','0416-7654321',18191839),(9,33333333,'Dory','Ansi','Estudiante','0416-7654321',30303030),(10,44444444,'Fula','Nito','niguna','0416-1234567',40404040),(11,55555555,'Chaca','Ron','Maestro','0416-1234567',40404040),(12,66666666,'Cha Pu','Lin','Estudiante','0416-7654321',40404040),(13,7243741,'Prueba','Transaccion','Fsdf','0414-1234567',10201030),(14,2378323,'Prueba','Transaccion','Wsdfs','0414-1234567',10201030),(15,2349560,'Prueba','Transaccion','Dfsdfsdf','0414-1234567',10201030);
/*!40000 ALTER TABLE `referencia_personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salario`
--

DROP TABLE IF EXISTS `salario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salario` (
  `id_salario` int(7) NOT NULL AUTO_INCREMENT,
  `sueldo_quincena` decimal(7,2) NOT NULL COMMENT 'Sueldo equivalente a quience dias',
  `dia_adicional` int(2) NOT NULL COMMENT 'Dias adicionales de trabajo o dias pendientes por pagar',
  `total_dia_adic` decimal(7,2) NOT NULL COMMENT 'Total en Bs a pagar por los dias adicionales',
  `retro_sueldo` decimal(7,2) NOT NULL,
  `retro_vacaciones` decimal(7,2) NOT NULL,
  `retro_aguinaldos` decimal(7,2) NOT NULL,
  `sso` decimal(7,2) NOT NULL COMMENT 'Seguro Social Obligatorio',
  `spf` decimal(7,2) NOT NULL COMMENT 'Seguro Paro Forzoso',
  `faov` decimal(7,2) NOT NULL COMMENT 'Fondo de Ahorro Obligatorio para la Vivienda',
  `islr` decimal(7,2) NOT NULL COMMENT 'Impuesto Sobre La Renta',
  `inasistencias` int(2) NOT NULL COMMENT 'Dias sin asistir a laborar',
  `total_inasist` decimal(7,2) NOT NULL COMMENT 'Total en Bs a descontar por los dias sin asistir a laborar',
  `inicio_quincena` date NOT NULL,
  `fin_quincena` date NOT NULL,
  `total_asignaciones` decimal(7,2) NOT NULL,
  `total_deducciones` decimal(7,2) NOT NULL,
  `total_pagar` decimal(7,2) NOT NULL,
  `cedula` int(12) NOT NULL,
  PRIMARY KEY (`id_salario`),
  KEY `cedula` (`cedula`),
  CONSTRAINT `salario_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `laboral` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salario`
--

LOCK TABLES `salario` WRITE;
/*!40000 ALTER TABLE `salario` DISABLE KEYS */;
INSERT INTO `salario` VALUES (2,3000.00,0,0.00,0.00,0.00,0.00,55.38,6.92,31.50,0.00,0,0.00,'2014-01-01','2014-01-15',3000.00,93.81,2906.19,40404040),(3,3000.00,0,0.00,0.00,0.00,0.00,55.38,6.92,31.50,0.00,0,0.00,'2014-01-16','2014-01-31',3000.00,93.81,2906.19,40404040),(4,5197.50,0,0.00,0.00,0.00,0.00,95.95,11.99,57.75,0.00,1,346.50,'2014-01-01','2014-01-15',5197.50,512.20,4685.30,18191839),(5,4158.00,0,0.00,0.00,0.00,0.00,76.76,9.60,46.20,24.53,0,0.00,'2014-01-16','2014-01-31',4158.00,157.09,4000.91,30303030),(6,3000.00,0,0.00,0.00,0.00,0.00,55.38,6.92,31.50,0.00,0,0.00,'2014-12-16','2014-12-31',3000.00,93.81,2906.19,40404040),(7,5197.50,0,0.00,0.00,0.00,0.00,95.95,11.99,57.75,0.00,0,0.00,'2014-12-16','2014-12-31',5197.50,165.70,5031.80,18191839),(8,3000.00,0,0.00,0.00,0.00,0.00,55.38,6.92,31.50,0.00,0,0.00,'2015-01-01','2015-01-15',3000.00,93.81,2906.19,40404040),(9,5197.50,0,0.00,0.00,0.00,0.00,95.95,11.99,57.75,0.00,0,0.00,'2015-01-01','2015-01-15',5197.50,165.70,5031.80,18191839),(10,3000.00,0,0.00,0.00,0.00,0.00,55.38,6.92,31.50,0.00,0,0.00,'2015-02-01','2015-02-15',3000.00,93.81,2906.19,40404040),(11,3000.00,0,0.00,0.00,0.00,0.00,55.38,6.92,31.50,0.00,2,400.00,'2015-03-01','2015-03-15',3000.00,493.81,2506.19,40404040),(12,4158.00,0,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0,0.00,'2016-04-01','2016-04-15',4158.00,0.00,4158.00,30303030);
/*!40000 ALTER TABLE `salario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajador` (
  `cedula` int(12) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ciudadania` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `pasaporte` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `libreta_militr` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fe_nac` date NOT NULL,
  `lug_nac` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `est_civil` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nconyugue` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estudia` int(1) NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_em` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `actualizado` date NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador`
--

LOCK TABLES `trabajador` WRITE;
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT INTO `trabajador` VALUES (12313,'Sdasdatrhyrty','Sdasda','Venezolano','34234','12123','1987-02-16','Sdsdfsdf','Soltero','Rtyr',1,'adasdas','0414-8976543','',1,'2016-04-01'),(123412,'Asdasd','Asdasd','Venezolano','34234','rwer234','2001-01-15','Sdsdfsdf','Soltero','N/a',0,'sdfsdfsdf','0414-8976543','',1,'2016-04-01'),(10201030,'Transaccion','Prueba','Venezolano','12123123','1312312','1983-04-16','Ewerwer','Soltero','Sfsdfsdf',1,'ssdfsdf','0414-1234567','0414-1234567',1,'2016-04-08'),(18191839,'Leonel','Torres','Venezolano','654321','123456','1988-12-27','Abejales','Soltero','N/a',0,'El Palmo','0416-1234567','0424-1234567',0,'2016-04-01'),(20830219,'Luis','Villarreal','Venezolano','654321','123456','1993-09-12','La Azulita','Casado','Nelitza',0,'LA Fortuna, La Azulita','0416-1234567','0424-1234567',1,'2014-12-29'),(30303030,'Juan','Araque','Venezolano','654321','123456','1988-05-17','China','Soltero','n/a',0,'Av quinta Saniago','0416-1234567','0424-1234567',1,'2014-12-17'),(40404040,'Manuel','Garcia','Venezolano','654321','123456','1991-02-23','aqui mismo','Soltero','n/a',1,'Ni idea de donde es','0416-1234567','0424-1234567',1,'2016-03-20'),(90909090,'Tomas','Peralta','Venezolano','56789','98765','2010-05-03','Franja d Gaza','Divorsiado','n/a',1,'Palmira Norte','0416-1234567','0424-1234567',1,'2015-01-01'),(423123123,'Sdfsdfsdf','Sdfsdfsd','Venezolano','23423','123123123123','1982-05-18','Sdfsdfsdf','Soltero','Sdfsdf',0,'sdfsfsdf','0414-8976543','0414-8976543',1,'2016-04-01');
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uniforme`
--

DROP TABLE IF EXISTS `uniforme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uniforme` (
  `cedula` int(12) NOT NULL,
  `camisa` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `pantalon` int(2) NOT NULL,
  `calzado` int(2) NOT NULL,
  PRIMARY KEY (`cedula`),
  CONSTRAINT `uniforme_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uniforme`
--

LOCK TABLES `uniforme` WRITE;
/*!40000 ALTER TABLE `uniforme` DISABLE KEYS */;
INSERT INTO `uniforme` VALUES (10201030,'M',12,12),(18191839,'M',32,41),(30303030,'M',32,41),(40404040,'S',30,35),(423123123,'M',32,41);
/*!40000 ALTER TABLE `uniforme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(32) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pregunta` int(1) NOT NULL,
  `respuesta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('admin','21232f297a57a5a743894a0e4a801fc3','Administrador','Administrador',1,'d44b121fc3524fe5cdc4f3feb31ceb78',1),('full','81dc9bdb52d04dc20036dbd8313ed055','Leonel','Torres',1,'d44b121fc3524fe5cdc4f3feb31ceb78',1),('zuricato','81dc9bdb52d04dc20036dbd8313ed055','Rafael','Mercado',1,'d44b121fc3524fe5cdc4f3feb31ceb78',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-13 21:18:19
