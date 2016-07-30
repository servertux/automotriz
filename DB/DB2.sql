CREATE DATABASE  IF NOT EXISTS `aeelvola_prueba` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `aeelvola_prueba`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: aeelvola_prueba
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `actividades`
--

DROP TABLE IF EXISTS `actividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividades` (
  `cod_act` varchar(10) NOT NULL DEFAULT '',
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cod_act`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades`
--

LOCK TABLES `actividades` WRITE;
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
INSERT INTO `actividades` VALUES ('DOC1','Boletas'),('DOC2','Facturas');
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` VALUES ('0025','1.01.0025.0','IMPULSOR DE ARRANQUE',35.5,50.50,'imagenes/0025.jpg','imagenes/0025.jpg','imagenes/0025.jpg',10,NULL,NULL,'imagenes/familia020.jpg','imagenes/D-0025.jpg'),('0140','1.01.0140.0','IMPULSOR DE ARRANQUE',35.8,50.50,'imagenes/0140.jpg','imagenes/0140.jpg','imagenes/0140.jpg',10,NULL,NULL,'imagenes/familia050.jpg','imagenes/Dm-0140.jpg'),('0184','1.01.0184.0','IMPULSOR DE ARRANQUE',30,40.00,'imagenes/0184.jpg','imagenes/0184.jpg','imagenes/0184.jpg',1,NULL,NULL,'imagenes/familia047.jpg','imagenes/dimensiones-0184.jpg');
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL AUTO_INCREMENT,
  `rz_social` varchar(200) DEFAULT NULL,
  `direccion` varchar(160) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `tx_nombre` varchar(250) DEFAULT NULL,
  `tx_apellidos` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_clientes`),
  UNIQUE KEY `id_clientes_UNIQUE` (`id_clientes`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (6,'GRIFO VIRGENCITA DE CHAPI S.A.C','MARISCAL CASTILLA 1026','20498534911','450182','YISSEP','ALPACA MONTOYA'),(10,'Imprenta Muñoz','Av. El Sol A.S.A','52896354781','425879','Juan ','Aguilar Nuñez'),(12,'Laboratorio Muñoz','calles los jazmines 112','10417826251','243098','vicky daniela','barrios'),(13,'Estudio Contable Muñiz','Calle Ayarza 2000 Cerro Juli','10584796321','204875','Alberto Andrade','Perez Alaibal'),(14,'GUSTAV S.A','LAS TORRES LL-11','46244684','4258899','GUSTAVO FAPERO','CONDORI PILCO'),(16,'COMERCIAL AUSTRAL S.C.R.L.','AV. MARICAL CASTILLA NRO. 909A (1 CUADRA ARRIBA DEL OVALO MARISCAL CASTI) AREQUIPA - AREQUIPA - MARIANO MELGAR','20455024901','','',''),(17,'AGUILAR CARRIZALES ROBERT ELIO','AV. LAS TORRES MZA. AREQUIPA - AREQUIPA - ALTO SELVA ALEGRE','10429257226','','ROBERT ELIO','AGUILAR CARRIZALES');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ctg_tiposusuario`
--

DROP TABLE IF EXISTS `ctg_tiposusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ctg_tiposusuario` (
  `id_TipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tx_TipoUsuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctg_tiposusuario`
--

LOCK TABLES `ctg_tiposusuario` WRITE;
/*!40000 ALTER TABLE `ctg_tiposusuario` DISABLE KEYS */;
INSERT INTO `ctg_tiposusuario` VALUES (1,'Administrador'),(2,'Usuario Normal');
/*!40000 ALTER TABLE `ctg_tiposusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_fra`
--

DROP TABLE IF EXISTS `det_fra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `det_fra` (
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
  KEY `codigo_original` (`codigo_original`),
  CONSTRAINT `fk_det_fra_1` FOREIGN KEY (`cod_fra`) REFERENCES `facturas` (`cod_fra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_det_fra_2` FOREIGN KEY (`codigo_original`) REFERENCES `articulos` (`codigo_original`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_det_fra_3` FOREIGN KEY (`cod_act`) REFERENCES `actividades` (`cod_act`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_fra`
--

LOCK TABLES `det_fra` WRITE;
/*!40000 ALTER TABLE `det_fra` DISABLE KEYS */;
INSERT INTO `det_fra` VALUES ('DOC1',1006025,'0025',3,50.50,151.50,27.27),('DOC1',1006025,'0140',2,50.50,101.00,18.18),('DOC1',1006026,'0140',1,50.50,50.50,9.09),('DOC1',1006027,'0025',3,50.50,151.50,27.27),('DOC1',1006027,'0140',5,50.50,252.50,45.45),('DOC1',1006027,'0184',2,40.00,80.00,14.40),('DOC1',1006028,'0025',2,50.50,101.00,18.18),('DOC1',1006028,'0140',1,50.50,50.50,9.09);
/*!40000 ALTER TABLE `det_fra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fabricante`
--

DROP TABLE IF EXISTS `fabricante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fabricante` (
  `id_fabricante` varchar(60) NOT NULL,
  `nombre_fabricante` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fabricante`
--

LOCK TABLES `fabricante` WRITE;
/*!40000 ALTER TABLE `fabricante` DISABLE KEYS */;
/*!40000 ALTER TABLE `fabricante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturas` (
  `cod_fra` int(11) NOT NULL,
  `id_clientes` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `anulada` tinyint(1) DEFAULT '0',
  `cod_act` varchar(10) DEFAULT '',
  PRIMARY KEY (`cod_fra`),
  KEY `fk_facturas_1_idx` (`id_clientes`),
  KEY `fk_facturas_2_idx` (`cod_act`),
  CONSTRAINT `fk_facturas_2` FOREIGN KEY (`cod_act`) REFERENCES `actividades` (`cod_act`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_facturas_1` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` VALUES (1006025,6,'2014-08-21 05:00:00',0,'DOC1'),(1006026,10,'2014-08-23 05:00:00',0,'DOC1'),(1006027,10,'2014-08-23 05:00:00',0,'DOC1'),(1006028,14,'2014-08-23 05:00:00',0,'DOC1');
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficha`
--

DROP TABLE IF EXISTS `ficha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha`
--

LOCK TABLES `ficha` WRITE;
/*!40000 ALTER TABLE `ficha` DISABLE KEYS */;
INSERT INTO `ficha` VALUES (1,'',NULL,NULL,NULL,5.00,12.50,62.50,11.25),(2,'0025',NULL,NULL,NULL,5.00,12.50,62.50,11.25);
/*!40000 ALTER TABLE `ficha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimiento` (
  `id_movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_original` varchar(20) DEFAULT NULL,
  `tipo_movimiento` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_movimiento`),
  KEY `fk_movimiento_1_idx` (`codigo_original`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento`
--

LOCK TABLES `movimiento` WRITE;
/*!40000 ALTER TABLE `movimiento` DISABLE KEYS */;
INSERT INTO `movimiento` VALUES (1,'123456','ENTRADA',23,'2014-07-29 21:57:52'),(2,'123456','SALIDA',12,'2014-07-29 22:44:54'),(3,'123456','SALIDA',10,'2014-07-29 22:45:59'),(4,'0140','ENTRADA',2,'2014-07-30 04:07:55'),(5,'0140','ENTRADA',1,'2014-08-01 02:04:57'),(6,'0025','ENTRADA',1,'2014-08-03 17:16:52'),(7,'0025','ENTRADA',1,'2014-06-18 15:25:23'),(8,'0184','ENTRADA',1,'2014-08-06 05:11:28'),(9,'0184','SALIDA',-3,'2014-08-07 16:44:40'),(10,'0140','ENTRADA',5,'2014-08-07 21:24:15'),(11,'0140','ENTRADA',2,'2014-08-07 23:00:38'),(12,'0140','ENTRADA',1,'2014-08-08 15:47:13'),(13,'0140','ENTRADA',1,'2014-08-10 18:05:27'),(14,'0025','ENTRADA',1,'2014-08-13 02:11:24'),(15,'0184','ENTRADA',5,'2014-08-13 02:13:47'),(16,'0025','ENTRADA',2,'2014-08-21 01:07:23'),(17,'0140','SALIDA',-5,'2014-08-21 03:51:10'),(18,'0140','ENTRADA',5,'2014-08-21 22:58:04'),(19,'0184','SALIDA',-4,'2014-09-03 14:43:39');
/*!40000 ALTER TABLE `movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `id_proveedores` int(11) NOT NULL,
  `rz_social` varchar(60) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `tx_nombre` varchar(50) DEFAULT NULL,
  `tx_apellidos` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_proveedores`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (0,'AUTOMARKET','Arequipa 1001 CERCADO','21456385925','(054)-5478','Alejandro','Ulloa Mantes');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
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
  KEY `id_TipoUsuario` (`id_TipoUsuario`),
  CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`id_TipoUsuario`) REFERENCES `ctg_tiposusuario` (`id_TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'Gonzalo','Silverio','Silverio','gonzasilve@gmail.com','gonzasilve','827ccb0eea8a706c4c34a16891f84e7b',1,'2012-11-09 17:35:40'),(2,'juan','huanca','mamani','robert.elio.h@gmail.com','juandiego','827ccb0eea8a706c4c34a16891f84e7b',2,'2013-01-19 14:08:03'),(3,'meneo','mena','meno','servertux@gmail.com','meneo','e10adc3949ba59abbe56e057f20f883e',2,'2013-01-20 11:58:01'),(4,'juana','ajihajb','hjbhjb','dd@dd.com','juana','e10adc3949ba59abbe56e057f20f883e',2,'2013-01-23 19:43:57'),(5,'edwin','bedoya','apaza','jaed25@hotmail.com','edwin','e10adc3949ba59abbe56e057f20f883e',2,'2013-01-23 20:15:48'),(6,'Robert Elio','Aguilar','Carrizales','robert.elio.h_1@gmail.com','robert','684c851af59965b680086b7b4896ff98',2,'2013-03-12 18:45:43'),(7,'ROBERT','HUANCA','MAMANI','admin@servertux.com','servertux','3ea88a7ee7be89834597390b9ac6e77f',2,'2013-11-20 21:43:48'),(8,'Raul ','Salazar','Cordova',NULL,'raul','c2f004a05fffa487f826003604b87de1',1,NULL);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-03 16:16:00
