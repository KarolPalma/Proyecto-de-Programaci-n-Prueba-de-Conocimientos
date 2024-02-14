-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: pp_conocimientos
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `IdRegistro` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCompleto` varchar(45) DEFAULT NULL,
  `TelefonoCasa` varchar(8) DEFAULT NULL,
  `TelefonoCelular` varchar(8) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `FechaRegistro` date DEFAULT NULL,
  `HoraRegistro` time DEFAULT NULL,
  PRIMARY KEY (`IdRegistro`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Raquel Nuñez','22939393','98765432','1990-05-15','2024-02-14','05:20:29'),(3,'Maria Gonzales','22765667','99797979','2000-02-05','2024-02-14','06:12:19'),(5,'Ramona Flores','22292929','99832832','1994-01-28','2024-02-14','06:19:06'),(6,'Alicia Matute','22494848','92829405','2000-02-06','2024-02-14','14:55:07');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'pp_conocimientos'
--

--
-- Dumping routines for database 'pp_conocimientos'
--
/*!50003 DROP PROCEDURE IF EXISTS `InsertarPersona` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarPersona`(
    IN txtNombreCompleto VARCHAR(45),
    IN txtTelefonoCasa VARCHAR(8),
    IN txtTelefonoCelular VARCHAR(8),
    IN dteFechaNacimiento DATE
)
BEGIN
    DECLARE txtFechaRegistro DATE;
    DECLARE txtHoraRegistro TIME;

    SET txtFechaRegistro = CURDATE();
    SET txtHoraRegistro = CURTIME();

    INSERT INTO Persona (NombreCompleto, TelefonoCasa, TelefonoCelular, FechaNacimiento, FechaRegistro, HoraRegistro) 
    VALUES (txtNombreCompleto, txtTelefonoCasa, txtTelefonoCelular, dteFechaNacimiento, txtFechaRegistro, txtHoraRegistro);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarPersona` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarPersona`(
    IN Id INT,
    IN txtNombreCompleto VARCHAR(45),
    IN txtTelefonoCasa VARCHAR(8),
    IN txtTelefonoCelular VARCHAR(8),
    IN dteFechaNacimiento DATE
)
BEGIN
    DECLARE txtFechaRegistro DATE;
    DECLARE txtHoraRegistro TIME;

    SET txtFechaRegistro = CURDATE();
    SET txtHoraRegistro = CURTIME();

    UPDATE Persona
    SET NombreCompleto = txtNombreCompleto,
        TelefonoCasa = txtTelefonoCasa,
        TelefonoCelular = txtTelefonoCelular,
        FechaNacimiento = dteFechaNacimiento,
        FechaRegistro = txtFechaRegistro,
        HoraRegistro = txtHoraRegistro
    WHERE IdRegistro = Id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-14 15:03:55
