CREATE DATABASE  IF NOT EXISTS `airline` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `airline`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: airline
-- ------------------------------------------------------
-- Server version	5.5.41-log

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
-- Table structure for table `airways`
--

DROP TABLE IF EXISTS `airways`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airways` (
  `ID` int(4) NOT NULL,
  `AIRWAYS_NAME` varchar(25) NOT NULL,
  `PRICE` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airways`
--

LOCK TABLES `airways` WRITE;
/*!40000 ALTER TABLE `airways` DISABLE KEYS */;
INSERT INTO `airways` VALUES (1,'American Airlines',15),(2,'Eagle Airlines',20),(3,'Virgin America',27),(4,'South West Airlines',17);
/*!40000 ALTER TABLE `airways` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinations` (
  `ID` char(2) NOT NULL,
  `NAME` varchar(25) NOT NULL,
  `LONGI` double NOT NULL,
  `LATI` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinations`
--

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;
INSERT INTO `destinations` VALUES ('CA','California',36.7783,119.4179),('FL','Florida',27.6648,81.5158),('GA','Georgia',33.749,84.388),('IL','Illinois',40.6331,89.3985),('NY','New York',40.7128,74.0059),('TX','Texas',31.9686,99.9018),('WA','Washington',47.7511,120.7401);
/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flight_available`
--

DROP TABLE IF EXISTS `flight_available`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flight_available` (
  `FLIGHT_ID` varchar(5) NOT NULL,
  `DEPART` date NOT NULL,
  `SEATS_BOOKED` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`FLIGHT_ID`,`DEPART`),
  CONSTRAINT `FLIAVAIL_FLI_ID` FOREIGN KEY (`FLIGHT_ID`) REFERENCES `flights` (`FLIGHT_NO`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flight_available`
--

LOCK TABLES `flight_available` WRITE;
/*!40000 ALTER TABLE `flight_available` DISABLE KEYS */;
INSERT INTO `flight_available` VALUES ('aa123','2016-04-30',19),('aa123','2016-05-02',0),('aa123','2016-05-04',0),('aa124','2016-05-01',0),('aa124','2016-05-03',0),('aa124','2016-05-05',0),('aa130','2016-05-01',0),('aa130','2016-05-03',0),('aa130','2016-05-05',0),('aa131','2016-04-30',0),('aa131','2016-05-02',3),('aa131','2016-05-04',0),('ea007','2016-04-30',0),('ea007','2016-05-02',0),('ea007','2016-05-04',0),('ea008','2016-05-01',0),('ea008','2016-05-03',0),('ea008','2016-05-05',0),('ea100','2016-04-30',0),('ea100','2016-05-02',2),('ea100','2016-05-04',0),('ea900','2016-05-01',0),('ea900','2016-05-02',0),('ea900','2016-05-03',5),('ea900','2016-05-04',0),('ea900','2016-05-05',0),('sw200','2016-04-30',7),('sw200','2016-05-02',1),('sw200','2016-05-04',0),('sw300','2016-04-30',0),('sw300','2016-05-02',0),('sw300','2016-05-04',0),('sw301','2016-05-01',1),('sw301','2016-05-03',0),('sw301','2016-05-05',0),('va001','2016-04-30',4),('va001','2016-05-02',0),('va001','2016-05-04',0),('va002','2016-05-01',0),('va002','2016-05-03',0),('va002','2016-05-05',0),('va350','2016-05-01',5),('va350','2016-05-02',0),('va350','2016-05-03',0),('va350','2016-05-04',0),('va350','2016-05-05',0),('va555','2016-04-30',9),('va555','2016-05-02',0),('va555','2016-05-04',0),('va556','2016-05-01',0),('va556','2016-05-03',0),('va556','2016-05-05',0);
/*!40000 ALTER TABLE `flight_available` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flights` (
  `FLIGHT_NO` varchar(5) NOT NULL,
  `AIRWAYS_ID` int(4) DEFAULT NULL,
  `CAPACITY` int(3) NOT NULL,
  `ORIGIN` char(2) NOT NULL,
  `DESTINATION` char(2) NOT NULL,
  PRIMARY KEY (`FLIGHT_NO`),
  KEY `AIRWAYS` (`AIRWAYS_ID`),
  KEY `ORIGIN` (`ORIGIN`),
  KEY `DESTINATION` (`DESTINATION`),
  KEY `AIRWAYS_ID` (`AIRWAYS_ID`),
  CONSTRAINT `FK_DESTIN_FLIGHT_FROM` FOREIGN KEY (`ORIGIN`) REFERENCES `destinations` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_DESTIN_FLIGHT_TO` FOREIGN KEY (`DESTINATION`) REFERENCES `destinations` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_FLIGHTS_AIRWAYS_ID` FOREIGN KEY (`AIRWAYS_ID`) REFERENCES `airways` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flights`
--

LOCK TABLES `flights` WRITE;
/*!40000 ALTER TABLE `flights` DISABLE KEYS */;
INSERT INTO `flights` VALUES ('aa123',1,200,'CA','TX'),('aa124',1,200,'TX','CA'),('aa130',1,175,'NY','FL'),('aa131',1,170,'FL','NY'),('ea007',2,150,'CA','TX'),('ea008',2,150,'TX','CA'),('ea100',2,175,'FL','NY'),('ea900',2,10,'IL','TX'),('sw200',4,175,'CA','TX'),('sw300',4,200,'FL','NY'),('sw301',4,200,'NY','FL'),('va001',3,150,'CA','TX'),('va002',3,150,'TX','CA'),('va350',3,250,'TX','IL'),('va555',3,175,'FL','NY'),('va556',3,175,'NY','FL');
/*!40000 ALTER TABLE `flights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passenger` (
  `ID` varchar(10) NOT NULL,
  `FIRST_NAME` varchar(25) NOT NULL,
  `LAST_NAME` varchar(10) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  `DOB` date DEFAULT NULL,
  `ADDRESS` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passenger`
--

LOCK TABLES `passenger` WRITE;
/*!40000 ALTER TABLE `passenger` DISABLE KEYS */;
INSERT INTO `passenger` VALUES ('001','admin','admin','admin@airline.com','admin','0000-00-00',''),('123','aman','miryala','aman.miryala@gmail.com','amanmiryala','2016-01-14','asdfasdf\r\nasdfasdf\r\nasdfasdfasdf'),('123098','Harsha','Challa','harshach@gmail.com','harshach','0000-00-00',''),('123456','UTDALLAS','UTD','utdallas@utdallas.edu','123456','0000-00-00',''),('234','sri harsha','ganja','sriharsha@gmail.com','sriharsha','1990-04-01',''),('345','akash','patti','akash.patti@gmail.com','root','0000-00-00',''),('456','vamsi','muvva','vamsi.muvva@gmail.com','vamsimuvva',NULL,''),('567','raghunadh','metta','raghu.metta@gmail.com','raghu.metta','2016-04-12',''),('temoc','temoc','utdallas','temoc@utdallas.edu','temoc12345','1990-01-01','');
/*!40000 ALTER TABLE `passenger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `TICKET_ID` int(12) NOT NULL AUTO_INCREMENT,
  `FLIGHT_NO` varchar(5) NOT NULL,
  `PASSENGER_ID` varchar(10) NOT NULL,
  `FROM` char(2) NOT NULL,
  `TO` char(2) NOT NULL,
  `DATE` date NOT NULL,
  `SEAT_NO` int(3) NOT NULL,
  PRIMARY KEY (`TICKET_ID`),
  KEY `PASSENGER_ID` (`PASSENGER_ID`),
  KEY `FLIGHT_NO` (`FLIGHT_NO`),
  KEY `TO` (`TO`),
  KEY `FROM` (`FROM`),
  CONSTRAINT `FK_FROMTICK_DESTI_ID` FOREIGN KEY (`FROM`) REFERENCES `destinations` (`ID`),
  CONSTRAINT `FK_TICK_flightno` FOREIGN KEY (`FLIGHT_NO`) REFERENCES `flights` (`FLIGHT_NO`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tick_passid` FOREIGN KEY (`PASSENGER_ID`) REFERENCES `passenger` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_TOTICK_DESTI_ID` FOREIGN KEY (`TO`) REFERENCES `destinations` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1234906 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (1234841,'va555','456','FL','NY','2016-04-30',1),(1234842,'va555','456','FL','NY','2016-04-30',2),(1234843,'va555','456','FL','NY','2016-04-30',3),(1234845,'va555','456','FL','NY','2016-04-30',5),(1234846,'va555','456','FL','NY','2016-04-30',6),(1234847,'va555','456','FL','NY','2016-04-30',7),(1234850,'va555','456','FL','NY','2016-04-30',8),(1234851,'va555','456','FL','NY','2016-04-30',9),(1234852,'va555','456','FL','NY','2016-04-30',10),(1234853,'aa131','456','FL','NY','2016-05-02',1),(1234854,'aa131','456','FL','NY','2016-05-02',2),(1234855,'aa131','456','FL','NY','2016-05-02',3),(1234856,'aa123','123','CA','TX','2016-04-30',1),(1234857,'aa123','123','CA','TX','2016-04-30',2),(1234858,'aa123','123','CA','TX','2016-04-30',3),(1234859,'aa123','123','CA','TX','2016-04-30',4),(1234860,'aa123','123','CA','TX','2016-04-30',5),(1234862,'aa123','123','CA','TX','2016-04-30',7),(1234863,'aa123','123','CA','TX','2016-04-30',8),(1234864,'aa123','123','CA','TX','2016-04-30',9),(1234866,'va001','001','CA','TX','2016-04-30',1),(1234867,'sw301','001','NY','FL','2016-05-01',1),(1234868,'sw200','123','CA','TX','2016-04-30',1),(1234869,'aa123','123','CA','TX','2016-04-30',10),(1234870,'aa123','123','CA','TX','2016-04-30',11),(1234871,'aa123','123','CA','TX','2016-04-30',12),(1234872,'aa123','123','CA','TX','2016-04-30',13),(1234873,'aa123','123','CA','TX','2016-04-30',14),(1234874,'aa123','123','CA','TX','2016-04-30',15),(1234875,'aa123','001','CA','TX','2016-04-30',6),(1234876,'sw200','001','CA','TX','2016-05-02',1),(1234877,'va350','001','TX','IL','2016-05-01',1),(1234879,'va350','001','TX','IL','2016-05-01',3),(1234880,'va350','001','TX','IL','2016-05-01',4),(1234882,'va350','234','TX','IL','2016-05-01',5),(1234883,'va350','234','TX','IL','2016-05-01',6),(1234884,'ea900','001','IL','TX','2016-05-03',1),(1234885,'ea900','001','IL','TX','2016-05-03',2),(1234886,'ea900','001','IL','TX','2016-05-03',3),(1234887,'ea900','001','IL','TX','2016-05-03',4),(1234888,'ea900','001','IL','TX','2016-05-03',5),(1234889,'ea100','234','FL','NY','2016-05-02',1),(1234890,'ea100','234','FL','NY','2016-05-02',2),(1234891,'sw200','001','CA','TX','2016-04-30',2),(1234892,'sw200','001','CA','TX','2016-04-30',3),(1234893,'sw200','001','CA','TX','2016-04-30',4),(1234895,'sw200','001','CA','TX','2016-04-30',6),(1234896,'sw200','001','CA','TX','2016-04-30',7),(1234897,'sw200','001','CA','TX','2016-04-30',8),(1234898,'aa123','234','CA','TX','2016-04-30',16),(1234899,'aa123','234','CA','TX','2016-04-30',17),(1234900,'aa123','234','CA','TX','2016-04-30',18),(1234901,'aa123','234','CA','TX','2016-04-30',19),(1234902,'va001','temoc','CA','TX','2016-04-30',2),(1234903,'va001','temoc','CA','TX','2016-04-30',3),(1234905,'va001','temoc','CA','TX','2016-04-30',5);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'airline'
--
/*!50003 DROP FUNCTION IF EXISTS `distance` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `distance`(longi_diff double,lati_diff double) RETURNS double
    DETERMINISTIC
BEGIN
	
    
		declare result DOUBLE(10,2);
    
		SET result = SQRT(  POW(longi_diff,2)  +  POW(lati_diff,2) ); 

		RETURN result;
	END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `price` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `price`(longi_diff double,lati_diff double) RETURNS double
    DETERMINISTIC
BEGIN
	
    
		declare result DOUBLE(10,2);
    
		SET result = SQRT(  POW(longi_diff,2)  +  POW(lati_diff,2) ); 

		RETURN result;
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

-- Dump completed on 2016-04-29  2:12:24
