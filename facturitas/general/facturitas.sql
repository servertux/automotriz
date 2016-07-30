/*
  <<Copyright 2012 Jose Joaquin Perez Fuster>>
  peperfus@hotmail.com
  This software is released under the terms of the GNU Affero General Public License.
  Read agpl.txt file for more details.
*/

-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-09-2012 a las 11:34:11
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3



-- drop database if exists facturitas;
create database facturitas;
use facturitas;

--
-- Base de datos: `facturitas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `cod_act` varchar(10),
  `descripcion` varchar(200),
  PRIMARY KEY (`cod_act`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `nif_cli` char(9),
  `nombre` varchar(200),
  `telf1` char(9),
  `telf2` char(9),
  `direccion` varchar(200),
  `poblacion` varchar(200),
  `provincia` varchar(200),
  `cp` char(5),
  `observaciones` longtext,
  PRIMARY KEY (`nif_cli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_fra`
--

CREATE TABLE IF NOT EXISTS `det_fra` (
  `cod_act` varchar(10),
  `cod_fra` int(11),
  `cod_ser` int(11),
  `unidades` int(11),
  `precio_unidad` decimal(5,2),
  PRIMARY KEY (`cod_act`,`cod_fra`,`cod_ser`),
  KEY `cod_act` (`cod_act`),
  KEY `cod_fra` (`cod_fra`),
  KEY `cod_ser` (`cod_ser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `cod_act` varchar(10),
  `cod_fra` int(11),
  `nif_cli` char(9),
  `fecha` datetime,
  `anulada` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`cod_act`,`cod_fra`),
  KEY `cod_act` (`cod_act`),
  KEY `cod_fra` (`cod_fra`),
  KEY `nif_cli` (`nif_cli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `cod_ser` int(11) AUTO_INCREMENT,
  `descripcion` varchar(200),
  `precio_unidad` decimal(5,2),
  PRIMARY KEY (`cod_ser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`descripcion`, `precio_unidad`) VALUES
('Clase particular programación', '12.00'),
('Clases particulares programación MENSUAL', '60.00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `det_fra`
-- 
ALTER TABLE `det_fra`
  ADD CONSTRAINT `det_fra_ibfk_1` FOREIGN KEY (`cod_act`) REFERENCES `actividades` (`cod_act`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `det_fra_ibfk_2` FOREIGN KEY (`cod_fra`) REFERENCES `facturas` (`cod_fra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `det_fra_ibfk_3` FOREIGN KEY (`cod_ser`) REFERENCES `servicios` (`cod_ser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`nif_cli`) REFERENCES `clientes` (`nif_cli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`cod_act`) REFERENCES `actividades` (`cod_act`) ON DELETE CASCADE ON UPDATE CASCADE;
  
  
INSERT INTO `facturitas`.`actividades` (`cod_act`, `descripcion`) VALUES ('ACT1', 'Actividad 1'), ('ACT2', 'Actividad 2');