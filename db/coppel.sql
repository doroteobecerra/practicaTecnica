-- MySQL dump 10.13  Distrib 8.0.31, for macos12 (x86_64)
--
-- Host: localhost    Database: coppel
-- ------------------------------------------------------
-- Server version	5.7.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `sku` int(6) NOT NULL,
  `articulo` varchar(15) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `familia_id` int(11) NOT NULL,
  `f_alta` date NOT NULL,
  `stock` int(9) NOT NULL,
  `cantidad` int(9) NOT NULL,
  `descontinuado` int(1) NOT NULL,
  `f_baja` date DEFAULT NULL,
  PRIMARY KEY (`id_articulo`),
  KEY `familia_id` (`familia_id`),
  CONSTRAINT `familia_fk` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` VALUES (35,442342,'iPhone 14','Apple','WEDFJ345',29,'2022-10-30',5000,100,0,'1900-01-01'),(36,534543,'Monitor','DELL','XP27JFWEI',42,'2022-10-30',100,20,0,'1900-01-01'),(37,987897,'Refrigerador','LG','LGEWJ03F',13,'2022-10-30',300,23,1,'2022-10-30'),(38,423423,'Sillon cama','Sillones','SDNWE3KF',3,'2022-10-30',20,5,0,'1900-01-01');
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clases`
--

DROP TABLE IF EXISTS `clases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_clase` int(2) NOT NULL,
  `name_clase` varchar(20) NOT NULL,
  `depto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `depto_id` (`depto_id`),
  CONSTRAINT `depto_fk` FOREIGN KEY (`depto_id`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clases`
--

LOCK TABLES `clases` WRITE;
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
INSERT INTO `clases` VALUES (7,1,'Muebles',4),(8,2,'Colchones',4),(9,3,'Decoracion',4),(10,4,'refrigeradores',5),(11,5,'Lavadoras',5),(12,6,'Estufas',5),(13,7,'Sartenes',6),(14,8,'Cubiertos',6),(15,9,'Cocteleria',6),(16,10,'Equipos',7),(17,11,'Reacondicionados',7),(18,12,'Accesorios Apple',7),(19,13,'TV y video',8),(20,14,'Computo',8),(21,15,'Equipo de sonido',8),(22,16,'Play Station',9),(23,17,'Xbox',9),(24,18,'Pc Gaming',9);
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_depto` int(1) NOT NULL,
  `name_depto` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (4,1,'Hogar y muebles'),(5,2,'Linea blanca'),(6,3,'Cocina'),(7,4,'Celulares'),(8,5,'Electronica'),(9,6,'Videojuegos');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `familias`
--

DROP TABLE IF EXISTS `familias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `familias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_familia` int(3) NOT NULL,
  `name_familia` varchar(20) NOT NULL,
  `clase_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clase_id` (`clase_id`),
  CONSTRAINT `clase_fk` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `familias`
--

LOCK TABLES `familias` WRITE;
/*!40000 ALTER TABLE `familias` DISABLE KEYS */;
INSERT INTO `familias` VALUES (3,1,'Sala',7),(4,2,'Recamara',7),(5,3,'Comedores',7),(6,4,'Colchon y box',8),(7,4,'Colchones',8),(8,6,'Colchones para cuna',8),(9,7,'Tapetes',9),(10,8,'Cojines',9),(11,9,'Espejos',9),(12,10,'Frigobares',10),(13,11,'Refigeradoes',10),(14,12,'Congeladores',10),(15,13,'Lavadoras',11),(16,14,'Secadoras',11),(17,15,'Centros de lavado',11),(18,16,'Parrillas',12),(19,17,'Estufas',12),(20,18,'Hornos',12),(21,19,'Comales',13),(22,20,'Sartenes',13),(23,21,'Ollas',13),(24,22,'Tazas',14),(25,23,'Juego de cubiertos',14),(26,24,'Vajillas infantiles',14),(27,25,'Vasos para cocteles',15),(28,26,'Mezcladores',15),(29,27,'Apple',16),(30,28,'Motorola',16),(31,29,'Samsung',16),(32,30,'Oppo',17),(33,31,'Xiaomi',17),(34,32,'AirPods',18),(35,33,'Fundas',18),(36,34,'Cargadores',18),(37,35,'Pantallas',19),(38,36,'Streaming',19),(39,37,'Reproductor Blue-Ray',19),(40,38,'Laptops',20),(41,39,'PC escritorio',20),(42,40,'Monitores',20),(43,41,'Bocinas',21),(44,42,'Minicomponentes',21),(45,43,'Grabadoras',21),(46,44,'Consolas',22),(47,45,'Juegos',22),(48,46,'Accesorios PS4',22),(49,47,'Juegos',23),(50,48,'Consolas',23),(51,49,'Accesorios Xbox',23),(52,50,'Audifonos Gamer',24),(53,51,'Sillas Gamer',24),(54,52,'Teclados y mouse',24);
/*!40000 ALTER TABLE `familias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-30 22:24:21
