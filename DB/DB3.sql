-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-09-2014 a las 07:00:59
-- Versión del servidor: 5.5.38-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aeelvola_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `cod_act` varchar(10) NOT NULL DEFAULT '',
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cod_act`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`cod_act`, `descripcion`) VALUES
('DOC1', 'Boletas'),
('DOC2', 'Facturas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `codigo_original` varchar(20) CHARACTER SET latin1 NOT NULL,
  `codigo_interno` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `nombre` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `precio_costo` double DEFAULT NULL,
  `precio_unitario` decimal(5,2) DEFAULT NULL,
  `imagen_1` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `imagen_2` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `imagen_3` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `descripcion` varchar(300) CHARACTER SET latin1 DEFAULT NULL,
  `marca` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `diagrama` varchar(100) CHARACTER SET latin1 DEFAULT 'imagenes/no-disponible.jpg',
  `dimension` varchar(100) CHARACTER SET latin1 DEFAULT 'imagenes/no-disponible.jpg',
  PRIMARY KEY (`codigo_original`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codigo_original`, `codigo_interno`, `nombre`, `precio_costo`, `precio_unitario`, `imagen_1`, `imagen_2`, `imagen_3`, `stock`, `descripcion`, `marca`, `diagrama`, `dimension`) VALUES
('0025', '1.01.0025.0', 'IMPULSOR DE ARRANQUE', 35.5, 50.50, 'imagenes/0025.jpg', 'imagenes/0025.jpg', 'imagenes/0025.jpg', 12, NULL, NULL, 'imagenes/familia020.jpg', 'imagenes/D-0025.jpg'),
('0140', '1.01.0140.0', 'IMPULSOR DE ARRANQUE', 35.8, 50.50, 'imagenes/0140.jpg', 'imagenes/0140.jpg', 'imagenes/0140.jpg', 8, NULL, NULL, 'imagenes/familia050.jpg', 'imagenes/Dm-0140.jpg'),
('0184', '1.01.0184.0', 'IMPULSOR DE ARRANQUE', 30, 40.00, 'imagenes/0184.jpg', 'imagenes/0184.jpg', 'imagenes/0184.jpg', 1, NULL, NULL, 'imagenes/familia047.jpg', 'imagenes/dimensiones-0184.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_clientes` int(11) NOT NULL AUTO_INCREMENT,
  `rz_social` varchar(200) DEFAULT NULL,
  `direccion` varchar(160) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `tx_nombre` varchar(250) DEFAULT NULL,
  `tx_apellidos` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_clientes`),
  UNIQUE KEY `id_clientes_UNIQUE` (`id_clientes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `rz_social`, `direccion`, `ruc`, `telefono`, `tx_nombre`, `tx_apellidos`) VALUES
(6, 'GRIFO VIRGENCITA DE CHAPI S.A.C', 'MARISCAL CASTILLA 1026', '20498534911', '450182', 'YISSEP', 'ALPACA MONTOYA'),
(10, 'Imprenta Muñoz', 'Av. El Sol A.S.A', '52896354781', '425879', 'Juan ', 'Aguilar Nuñez'),
(12, 'Laboratorio Muñoz', 'calles los jazmines 112', '10417826251', '243098', 'vicky daniela', 'barrios'),
(13, 'Estudio Contable Muñiz', 'Calle Ayarza 2000 Cerro Juli', '10584796321', '204875', 'Alberto Andrade', 'Perez Alaibal'),
(14, 'GUSTAV S.A', 'LAS TORRES LL-11', '46244684', '4258899', 'GUSTAVO FAPERO', 'CONDORI PILCO'),
(16, 'COMERCIAL AUSTRAL S.C.R.L.', 'AV. MARICAL CASTILLA NRO. 909A (1 CUADRA ARRIBA DEL OVALO MARISCAL CASTI) AREQUIPA - AREQUIPA - MARIANO MELGAR', '20455024901', '', '', ''),
(17, 'AGUILAR CARRIZALES ROBERT ELIO', 'AV. LAS TORRES MZA. AREQUIPA - AREQUIPA - ALTO SELVA ALEGRE', '10429257226', '', 'ROBERT ELIO', 'AGUILAR CARRIZALES'),
(18, 'ROQUE HUANCA AGUILAR', 'SAN CAMILO 316 INT. 6', '10293011023', '226625', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctg_tiposusuario`
--

CREATE TABLE IF NOT EXISTS `ctg_tiposusuario` (
  `id_TipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tx_TipoUsuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_TipoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ctg_tiposusuario`
--

INSERT INTO `ctg_tiposusuario` (`id_TipoUsuario`, `tx_TipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Usuario Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_fra`
--

CREATE TABLE IF NOT EXISTS `det_fra` (
  `cod_act` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `cod_fra` int(11) NOT NULL,
  `codigo_original` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `unidades` int(11) DEFAULT NULL,
  `precio_unitario` decimal(5,2) DEFAULT NULL,
  `valor_venta` decimal(5,2) DEFAULT NULL,
  `igv` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`cod_fra`,`cod_act`,`codigo_original`),
  KEY `cod_act` (`cod_act`),
  KEY `cod_fra` (`cod_fra`),
  KEY `codigo_original` (`codigo_original`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `det_fra`
--

INSERT INTO `det_fra` (`cod_act`, `cod_fra`, `codigo_original`, `unidades`, `precio_unitario`, `valor_venta`, `igv`) VALUES
('DOC1', 1006001, '0025', 1, 50.50, 42.80, 7.70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

CREATE TABLE IF NOT EXISTS `fabricante` (
  `id_fabricante` varchar(60) NOT NULL,
  `nombre_fabricante` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `cod_fra` int(11) NOT NULL DEFAULT '1006001',
  `id_clientes` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `anulada` tinyint(1) DEFAULT '0',
  `cod_act` varchar(10) DEFAULT '',
  PRIMARY KEY (`cod_fra`),
  KEY `fk_facturas_1_idx` (`id_clientes`),
  KEY `fk_facturas_2_idx` (`cod_act`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`cod_fra`, `id_clientes`, `fecha`, `anulada`, `cod_act`) VALUES
(1006001, 6, '2014-09-13 02:08:51', 0, 'DOC1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE IF NOT EXISTS `ficha` (
  `idficha` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_original` varchar(20) NOT NULL,
  `T` varchar(45) DEFAULT NULL,
  `G` varchar(45) DEFAULT NULL,
  `L` varchar(45) DEFAULT NULL,
  `cantidad` decimal(5,2) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `valor_venta` decimal(5,2) DEFAULT NULL,
  `igv` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`idficha`),
  KEY `idarticulos_idx` (`codigo_original`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`idficha`, `codigo_original`, `T`, `G`, `L`, `cantidad`, `precio`, `valor_venta`, `igv`) VALUES
(1, '', NULL, NULL, NULL, 5.00, 12.50, 62.50, 11.25),
(2, '0025', NULL, NULL, NULL, 5.00, 12.50, 62.50, 11.25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE IF NOT EXISTS `movimiento` (
  `id_movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_original` varchar(20) DEFAULT NULL,
  `tipo_movimiento` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_movimiento`),
  KEY `fk_movimiento_1_idx` (`codigo_original`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`id_movimiento`, `codigo_original`, `tipo_movimiento`, `cantidad`, `fecha`) VALUES
(1, '123456', 'ENTRADA', 23, '2014-07-29 21:57:52'),
(2, '123456', 'SALIDA', 12, '2014-07-29 22:44:54'),
(3, '123456', 'SALIDA', 10, '2014-07-29 22:45:59'),
(4, '0140', 'ENTRADA', 2, '2014-07-30 04:07:55'),
(5, '0140', 'ENTRADA', 1, '2014-08-01 02:04:57'),
(6, '0025', 'ENTRADA', 1, '2014-08-03 17:16:52'),
(7, '0025', 'ENTRADA', 1, '2014-06-18 15:25:23'),
(8, '0184', 'ENTRADA', 1, '2014-08-06 05:11:28'),
(9, '0184', 'SALIDA', -3, '2014-08-07 16:44:40'),
(10, '0140', 'ENTRADA', 5, '2014-08-07 21:24:15'),
(11, '0140', 'ENTRADA', 2, '2014-08-07 23:00:38'),
(12, '0140', 'ENTRADA', 1, '2014-08-08 15:47:13'),
(13, '0140', 'ENTRADA', 1, '2014-08-10 18:05:27'),
(14, '0025', 'ENTRADA', 1, '2014-08-13 02:11:24'),
(15, '0184', 'ENTRADA', 5, '2014-08-13 02:13:47'),
(16, '0025', 'ENTRADA', 2, '2014-08-21 01:07:23'),
(17, '0140', 'SALIDA', -5, '2014-08-21 03:51:10'),
(18, '0140', 'ENTRADA', 5, '2014-08-21 22:58:04'),
(19, '0184', 'SALIDA', -4, '2014-09-03 14:43:39'),
(20, '0025', 'ENTRADA', 1, '2014-09-11 00:44:24'),
(21, '0025', 'ENTRADA', -1, '2014-09-11 00:59:58'),
(22, '0025', 'ENTRADA', 1, '2014-09-11 01:00:51'),
(23, '0025', 'ENTRADA', 10, '2014-09-13 04:45:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedores` int(11) NOT NULL,
  `rz_social` varchar(60) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `tx_nombre` varchar(50) DEFAULT NULL,
  `tx_apellidos` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_proveedores`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedores`, `rz_social`, `direccion`, `ruc`, `telefono`, `tx_nombre`, `tx_apellidos`) VALUES
(0, 'AUTOMARKET', 'Arequipa 1001 CERCADO', '21456385925', '(054)-5478', 'Alejandro', 'Ulloa Mantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tx_nombre` varchar(50) NOT NULL,
  `tx_apellidoPaterno` varchar(50) DEFAULT NULL,
  `tx_apellidoMaterno` varchar(50) DEFAULT NULL,
  `tx_correo` varchar(100) DEFAULT NULL,
  `tx_username` varchar(50) DEFAULT NULL,
  `tx_password` varchar(250) DEFAULT NULL,
  `id_TipoUsuario` int(11) DEFAULT NULL,
  `dt_registro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_TipoUsuario` (`id_TipoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id_usuario`, `tx_nombre`, `tx_apellidoPaterno`, `tx_apellidoMaterno`, `tx_correo`, `tx_username`, `tx_password`, `id_TipoUsuario`, `dt_registro`) VALUES
(1, 'Gonzalo', 'Silverio', 'Silverio', 'gonzasilve@gmail.com', 'gonzasilve', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2012-11-09 17:35:40'),
(2, 'juan', 'huanca', 'mamani', 'robert.elio.h@gmail.com', 'juandiego', '827ccb0eea8a706c4c34a16891f84e7b', 2, '2013-01-19 14:08:03'),
(3, 'meneo', 'mena', 'meno', 'servertux@gmail.com', 'meneo', 'e10adc3949ba59abbe56e057f20f883e', 2, '2013-01-20 11:58:01'),
(4, 'juana', 'ajihajb', 'hjbhjb', 'dd@dd.com', 'juana', 'e10adc3949ba59abbe56e057f20f883e', 2, '2013-01-23 19:43:57'),
(5, 'edwin', 'bedoya', 'apaza', 'jaed25@hotmail.com', 'edwin', 'e10adc3949ba59abbe56e057f20f883e', 2, '2013-01-23 20:15:48'),
(6, 'Robert Elio', 'Aguilar', 'Carrizales', 'robert.elio.h_1@gmail.com', 'robert', '684c851af59965b680086b7b4896ff98', 2, '2013-03-12 18:45:43'),
(7, 'ROBERT', 'HUANCA', 'MAMANI', 'admin@servertux.com', 'servertux', '3ea88a7ee7be89834597390b9ac6e77f', 2, '2013-11-20 21:43:48'),
(8, 'Raul ', 'Salazar', 'Cordova', NULL, 'raul', 'c2f004a05fffa487f826003604b87de1', 1, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `det_fra`
--
ALTER TABLE `det_fra`
  ADD CONSTRAINT `fk_det_fra_1` FOREIGN KEY (`cod_fra`) REFERENCES `facturas` (`cod_fra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_det_fra_2` FOREIGN KEY (`codigo_original`) REFERENCES `articulos` (`codigo_original`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_det_fra_3` FOREIGN KEY (`cod_act`) REFERENCES `actividades` (`cod_act`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_facturas_1` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_facturas_2` FOREIGN KEY (`cod_act`) REFERENCES `actividades` (`cod_act`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`id_TipoUsuario`) REFERENCES `ctg_tiposusuario` (`id_TipoUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
