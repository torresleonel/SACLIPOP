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
INSERT INTO `aguinaldo` VALUES (1,12,2015,210.56,18950.00,40404040),(2,12,2015,308.00,27720.00,30303030),(3,12,2015,385.00,34650.00,18191839);
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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (1,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'10395.00\'\r\n					WHERE cedula = \'18191839\'','2015-01-12 02:30:15'),(2,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'8316.00\'\r\n					WHERE cedula = \'30303030\'','2015-01-12 02:30:15'),(3,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'0.00\'\r\n					WHERE cedula = \'40404040\'','2015-01-12 02:30:15'),(4,'full','Leonel','Torres','UPDATE laboral \r\n					SET sueldo_mensual = \'6000.00\'\r\n					WHERE cedula = \'40404040\'','2015-01-12 02:30:26'),(5,'full','Leonel','Torres','UPDATE salario \r\n				SET sueldo_quincena = \'3000\',dia_adicional = \'0\',total_dia_adic = \'0\',retro_sueldo = \'0\',retro_aguinaldos = \'0\',retro_vacaciones = \'0\',sso = \'55.384615384615\',spf = \'6.9230769230769\',faov = \'31.5\',islr = \'0\',inasistencias = \'0\',total_inasist = \'0\',total_asignaciones = \'3000\',total_deducciones = \'93.807692307692\',total_pagar = \'2906.1923076923\' \r\n				WHERE cedula = \'40404040\' AND inicio_quincena = \'2015-1-1\'','2015-01-12 02:30:36'),(6,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2015-1-5\',fin_vacac = \'2015-1-28\',reincorpor = \'2015-1-29\',dia_vacac = \'15\',dia_adicional = \'3\',sueldo_dia = \'200\',total_dia_v = \'3000\',total_dia_adic = \'600\',total_pagar = \'3600\' \r\n						WHERE id_bono = \'1\'','2015-01-12 02:31:03'),(7,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'12\',sid = \'210.55555555556\',total_pagar = \'18950\' \r\n						WHERE id_aguinaldo = \'1\'','2015-01-12 02:31:12'),(8,'full','Leonel','Torres','INSERT INTO usuario (usuario,clave,nombre,apellido,nivel)\r\n				VALUES (\'prueba\',\'81dc9bdb52d04dc20036dbd8313ed055\',\'Prueba\',\'bitacora\',\'2\')','2015-01-12 02:31:37'),(9,'full','Leonel','Torres','UPDATE usuario \r\n				SET usuario = \'full\',clave = \'d93591bdf7860e1e4ee2fca799911215\',nombre = \'Leonel\',apellido = \'Torres\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n				WHERE usuario.usuario = \'full\'','2015-01-12 02:31:56'),(10,'full','Leonel','Torres','UPDATE usuario \r\n				SET usuario = \'full\',clave = \'81dc9bdb52d04dc20036dbd8313ed055\',nombre = \'Leonel\',apellido = \'Torres\',pregunta = \'1\',respuesta = \'d44b121fc3524fe5cdc4f3feb31ceb78\'\r\n				WHERE usuario.usuario = \'full\'','2015-01-12 02:32:10'),(11,'full','Leonel','Torres','DELETE FROM usuario WHERE usuario = \'prueba\'','2015-01-12 02:32:18'),(12,'full','Leonel','Torres','SELECT * FROM usuario WHERE usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-12 02:38:15'),(13,'full','Leonel','Torres','SELECT * FROM usuario WHERE usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-12 03:55:05'),(14,'full','Leonel','Torres','SELECT * FROM usuario WHERE usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-12 04:56:12'),(15,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-12 06:11:02'),(16,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-12 16:38:56'),(17,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-13 01:34:52'),(18,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-13 04:25:20'),(19,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-13 18:47:33'),(20,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-14 13:44:25'),(21,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-14 14:08:35'),(22,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-16 02:05:25'),(23,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-16 02:10:27'),(24,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-16 13:05:46'),(25,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-17 02:28:05'),(26,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-17 03:20:44'),(27,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-17 03:41:59'),(28,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-17 03:55:07'),(29,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-17 15:36:23'),(30,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-18 01:16:56'),(31,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-18 14:06:25'),(32,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 03:31:12'),(33,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 04:36:27'),(34,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 16:32:10'),(35,'zuricato','Rafael','Mercado','SELECT * FROM usuario WHERE id_usuario = \'zuricato\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 21:11:23'),(36,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 21:11:30'),(37,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-19 22:54:50'),(38,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-20 01:43:28'),(39,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-20 01:51:28'),(40,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-20 03:19:47'),(41,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-20 03:26:54'),(42,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-20 03:47:44'),(43,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-21 14:45:04'),(44,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-22 17:05:22'),(45,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-23 02:14:30'),(46,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-23 16:31:23'),(47,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-23 22:14:58'),(48,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-25 03:38:39'),(49,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-25 17:39:18'),(50,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'12\',sid = \'210.55555555556\',total_pagar = \'18950\' \r\n						WHERE id_aguinaldo = \'1\'','2015-01-25 18:56:16'),(51,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'12\',sid = \'210.55555555556\',total_pagar = \'18950\' \r\n						WHERE id_aguinaldo = \'1\'','2015-01-25 19:58:32'),(52,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-01-30 14:37:48'),(53,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-01 03:22:56'),(54,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'6\',sid = \'0\',total_pagar = \'0\' \r\n						WHERE id_aguinaldo = \'1\'','2015-02-01 04:01:10'),(55,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'6\',sid = \'210.55555555556\',total_pagar = \'9475\' \r\n						WHERE id_aguinaldo = \'1\'','2015-02-01 04:07:04'),(56,'full','Leonel','Torres','UPDATE aguinaldo \r\n						SET cantidad_mes = \'12\',sid = \'210.55555555556\',total_pagar = \'18950\' \r\n						WHERE id_aguinaldo = \'1\'','2015-02-01 04:07:51'),(57,'full','Leonel','Torres','INSERT INTO aguinaldo (cantidad_mes,anno_calculo,sid,total_pagar,cedula)\r\n						VALUES (\'12\',\'2015\',\'308\',\'27720\',\'30303030\')','2015-02-01 04:08:51'),(58,'full','Leonel','Torres','INSERT INTO aguinaldo (cantidad_mes,anno_calculo,sid,total_pagar,cedula)\r\n						VALUES (\'12\',\'2015\',\'385\',\'34650\',\'18191839\')','2015-02-01 04:09:10'),(59,'full','Leonel','Torres','INSERT INTO bono_vacac (ini_vacac,fin_vacac,reincorpor,dia_vacac,dia_adicional,sueldo_dia,total_dia_v,total_dia_adic,total_pagar,cedula)\r\n						VALUES (\'2015-12-17\',\'2016-2-10\',\'2016-2-11\',\'40\',\'0\',\'277.2\',\'11088\',\'0\',\'11088\',\'30303030\')','2015-02-01 04:10:33'),(60,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-01 15:13:28'),(61,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2015-12-17\',fin_vacac = \'2016-2-10\',reincorpor = \'2016-2-11\',dia_vacac = \'40\',dia_adicional = \'0\',sueldo_dia = \'277.2\',total_dia_v = \'11088\',total_dia_adic = \'0\',total_pagar = \'11088\' \r\n						WHERE id_bono = \'2\'','2015-02-01 20:21:23'),(62,'full','Leonel','Torres','UPDATE bono_vacac \r\n						SET ini_vacac = \'2015-12-17\',fin_vacac = \'2016-2-10\',reincorpor = \'2016-2-11\',dia_vacac = \'40\',dia_adicional = \'0\',sueldo_dia = \'277.2\',total_dia_v = \'11088\',total_dia_adic = \'0\',total_pagar = \'11088\' \r\n						WHERE id_bono = \'2\'','2015-02-01 20:30:01'),(63,'full','Leonel','Torres','SELECT * FROM usuario WHERE id_usuario = \'full\' AND clave = \'81dc9bdb52d04dc20036dbd8313ed055\'','2015-02-02 14:53:39');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bono_vacac`
--

LOCK TABLES `bono_vacac` WRITE;
/*!40000 ALTER TABLE `bono_vacac` DISABLE KEYS */;
INSERT INTO `bono_vacac` VALUES (1,'2015-01-05','2015-01-28','2015-01-29',15,3,200.00,3000.00,600.00,3600.00,40404040),(2,'2015-12-17','2016-02-10','2016-02-11',40,0,277.20,11088.00,0.00,11088.00,30303030);
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
INSERT INTO `comision_servicio` VALUES (20830219,'Seguro Medico','2014-12-16','AlbaÃ±il','No hace nada'),(90909090,'Seguro Medico','2014-12-29','Vigilante','Esto es una prueba para verificar la actualizacion');
/*!40000 ALTER TABLE `comision_servicio` ENABLE KEYS */;
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
INSERT INTO `documentos` VALUES (18191839,1,0,1,0,1,0,0,1,0,1,0,1),(30303030,0,0,0,0,0,0,1,1,1,1,1,1),(40404040,1,1,1,1,1,1,0,0,0,0,0,0);
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
INSERT INTO `estudios` VALUES (18191839,'Universitario','UPTM',2002,'TSU Informatica','n/a'),(30303030,'Universitario','UPTM',2003,'TSU Informatica','De chiripa xD'),(40404040,'Universitario','UPTM',2003,'TSU Informatica','De chiripa xD xD');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familia`
--

LOCK TABLES `familia` WRITE;
/*!40000 ALTER TABLE `familia` DISABLE KEYS */;
INSERT INTO `familia` VALUES (1,18191839,10236599,'Maria','Arellano','1961-05-30','Mama',0,0,'n/a');
/*!40000 ALTER TABLE `familia` ENABLE KEYS */;
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
INSERT INTO `laboral` VALUES (18191839,10395.00,'2014-12-15','Fijo','Director(a)','Personal de Alto Nivel','Direccion','0','LEFP'),(30303030,8316.00,'2014-12-17','Fijo','Administrador(a)','Personal de Alto Nivel','Administracion','0','LEFP'),(40404040,6000.00,'2010-05-31','Fijo','Auxiliar Fisioterapeuta','Personal Empleado','Fisiatria','0','LOTTT');
/*!40000 ALTER TABLE `laboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referencia_personal`
--

DROP TABLE IF EXISTS `referencia_personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referencia_personal` (
  `cedula_rp` int(12) NOT NULL,
  `nombre_rp` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_rp` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ocupacion_rp` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_rp` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(12) NOT NULL,
  PRIMARY KEY (`cedula_rp`),
  KEY `cedula` (`cedula`),
  CONSTRAINT `referencia_personal_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referencia_personal`
--

LOCK TABLES `referencia_personal` WRITE;
/*!40000 ALTER TABLE `referencia_personal` DISABLE KEYS */;
INSERT INTO `referencia_personal` VALUES (10101010,'Pedro','Perez','niguna','0416-1234567',18191839),(11111111,'Chiqui','Mesa','niguna','0416-1234567',30303030),(20202020,'Paco','Pilla','Maestro','0416-1234567',18191839),(22222222,'Pancho','Palacio','Maestro','0416-1234567',30303030),(30303030,'Juan','Manco','Estudiante','0416-7654321',18191839),(33333333,'Dory','Ansi','Estudiante','0416-7654321',30303030),(44444444,'Fula','Nito','niguna','0416-1234567',40404040),(55555555,'Chaca','Ron','Maestro','0416-1234567',40404040),(66666666,'Cha Pu','Lin','Estudiante','0416-7654321',40404040);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salario`
--

LOCK TABLES `salario` WRITE;
/*!40000 ALTER TABLE `salario` DISABLE KEYS */;
INSERT INTO `salario` VALUES (2,3000.00,0,0.00,0.00,0.00,0.00,55.38,6.92,31.50,0.00,0,0.00,'2014-01-01','2014-01-15',3000.00,93.81,2906.19,40404040),(3,3000.00,0,0.00,0.00,0.00,0.00,55.38,6.92,31.50,0.00,0,0.00,'2014-01-16','2014-01-31',3000.00,93.81,2906.19,40404040),(4,5197.50,0,0.00,0.00,0.00,0.00,95.95,11.99,57.75,0.00,1,346.50,'2014-01-01','2014-01-15',5197.50,512.20,4685.30,18191839),(5,4158.00,0,0.00,0.00,0.00,0.00,76.76,9.60,46.20,24.53,0,0.00,'2014-01-16','2014-01-31',4158.00,157.09,4000.91,30303030),(6,3000.00,0,0.00,0.00,0.00,0.00,55.38,6.92,31.50,0.00,0,0.00,'2014-12-16','2014-12-31',3000.00,93.81,2906.19,40404040),(7,5197.50,0,0.00,0.00,0.00,0.00,95.95,11.99,57.75,0.00,0,0.00,'2014-12-16','2014-12-31',5197.50,165.70,5031.80,18191839),(8,3000.00,0,0.00,0.00,0.00,0.00,55.38,6.92,31.50,0.00,0,0.00,'2015-01-01','2015-01-15',3000.00,93.81,2906.19,40404040),(9,5197.50,0,0.00,0.00,0.00,0.00,95.95,11.99,57.75,0.00,0,0.00,'2015-01-01','2015-01-15',5197.50,165.70,5031.80,18191839);
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
INSERT INTO `trabajador` VALUES (18191839,'Leonel','Torres','venezolano','654321','123456','1988-12-27','Abejales','Soltero','n/a',0,'El Palmo','0416-1234567',1,'2014-12-15'),(20830219,'Luis','Villarreal','Chino','654321','123456','1993-09-12','La Azulita','Casado','Nelitza',0,'LA Fortuna, La Azulita','0416-1234567',1,'2014-12-29'),(30303030,'Juan','Araque','Español','654321','123456','1988-05-17','Madrid','Soltero','n/a',0,'Av quinta Saniago','0416-1234567',1,'2014-12-17'),(40404040,'Manuel','Garcia','Peruano','654321','123456','1991-02-23','aqui mismo','Soltero','n/a',1,'Ni idea de donde es','0416-1234567',1,'2014-12-17'),(90909090,'Tomas','Peralta','portuguez','56789','98765','2010-05-03','Franja d Gaza','Divorsiado','n/a',1,'Palmira Norte','0416-1234567',1,'2015-01-01');
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
INSERT INTO `uniforme` VALUES (18191839,'M',32,41),(30303030,'M',32,41),(40404040,'S',30,35);
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
INSERT INTO `usuario` VALUES ('full','81dc9bdb52d04dc20036dbd8313ed055','Leonel','Torres',1,'d44b121fc3524fe5cdc4f3feb31ceb78',1),('zuricato','81dc9bdb52d04dc20036dbd8313ed055','Rafael','Mercado',1,'d44b121fc3524fe5cdc4f3feb31ceb78',2);
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

-- Dump completed on 2015-02-02 12:43:04
