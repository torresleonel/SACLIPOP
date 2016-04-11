SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `cpjm` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `cpjm`;

CREATE TABLE IF NOT EXISTS `aguinaldo` (
  `id_aguinaldo` int(7) NOT NULL AUTO_INCREMENT,
  `cantidad_mes` int(2) NOT NULL COMMENT 'Cantidad de meses para el calculo de aguinaldos',
  `anno_calculo` year(4) NOT NULL COMMENT 'Año en que se realizo el calculo de aguinaldo para el trabajador',
  `sid` decimal(7,2) NOT NULL COMMENT 'Sueldo Integral Diario',
  `total_pagar` decimal(7,2) NOT NULL COMMENT 'Total a pagar por aguinaldos',
  `cedula` int(12) NOT NULL,
  PRIMARY KEY (`id_aguinaldo`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `bitacora` (
  `id_bitacora` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `sentencia` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `bono_vacac` (
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
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `comision_servicio` (
  `cedula` int(12) NOT NULL,
  `dpt_envia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `cargo` varchar(23) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `configuracion` (
  `periodo_deduccion` tinyint(4) NOT NULL COMMENT 'determina en que quincena se hacen las deducciones'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `configuracion` (`periodo_deduccion`) VALUES
(1);

CREATE TABLE IF NOT EXISTS `documentos` (
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
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `estudios` (
  `cedula` int(12) NOT NULL,
  `estudios` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `lugar_estudio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `anno` year(4) NOT NULL,
  `titulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `familia` (
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
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `feriado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` int(2) NOT NULL,
  `mes` int(2) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

INSERT INTO `feriado` (`id`, `dia`, `mes`, `descripcion`) VALUES
(1, 1, 1, 'AÃ±o Nuevo'),
(2, 18, 1, 'JÃºbilo Municipal'),
(3, 19, 4, 'DeclaraciÃ³n de la Independencia'),
(4, 1, 5, 'DÃ­a del Trabajo'),
(5, 24, 6, 'Batalla de Carabobo'),
(6, 5, 7, 'DÃ­a de la Independencia'),
(7, 14, 7, 'JÃºbilo Municipal'),
(8, 16, 7, 'JÃºbilo Municipal'),
(9, 24, 7, 'Natalicio de SimÃ³n BolÃ­var'),
(10, 12, 10, 'DÃ­a de la Resistencia IndÃ­gena'),
(11, 24, 12, 'VÃ­spera de Navidad'),
(12, 25, 12, 'Navidad'),
(13, 31, 12, 'Fiesta de Fin de AÃ±o');

CREATE TABLE IF NOT EXISTS `laboral` (
  `cedula` int(12) NOT NULL,
  `sueldo_mensual` decimal(7,2) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `condicion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(23) COLLATE utf8_spanish_ci NOT NULL,
  `rango` varchar(22) COLLATE utf8_spanish_ci NOT NULL,
  `area_desemp` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `resolucion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ley` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `referencia_personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_rp` int(12) NOT NULL,
  `nombre_rp` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_rp` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ocupacion_rp` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_rp` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `salario` (
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
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `trabajador` (
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

CREATE TABLE IF NOT EXISTS `uniforme` (
  `cedula` int(12) NOT NULL,
  `camisa` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `pantalon` int(2) NOT NULL,
  `calzado` int(2) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(32) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pregunta` int(1) NOT NULL,
  `respuesta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `usuario` (`id_usuario`, `clave`, `nombre`, `apellido`, `pregunta`, `respuesta`, `nivel`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'Administrador', 1, 'd44b121fc3524fe5cdc4f3feb31ceb78', 1);


ALTER TABLE `aguinaldo`
  ADD CONSTRAINT `aguinaldo_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `laboral` (`cedula`) ON UPDATE CASCADE;

ALTER TABLE `bono_vacac`
  ADD CONSTRAINT `bono_vacac_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `laboral` (`cedula`) ON UPDATE CASCADE;

ALTER TABLE `comision_servicio`
  ADD CONSTRAINT `comision_servicio_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE;

ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE;

ALTER TABLE `estudios`
  ADD CONSTRAINT `estudios_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE;

ALTER TABLE `familia`
  ADD CONSTRAINT `familia_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE;

ALTER TABLE `laboral`
  ADD CONSTRAINT `laboral_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE;

ALTER TABLE `referencia_personal`
  ADD CONSTRAINT `referencia_personal_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE;

ALTER TABLE `salario`
  ADD CONSTRAINT `salario_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `laboral` (`cedula`) ON UPDATE CASCADE;

ALTER TABLE `uniforme`
  ADD CONSTRAINT `uniforme_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `trabajador` (`cedula`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
