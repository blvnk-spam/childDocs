-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: childcare-db
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `StaffID` int NOT NULL,
  PRIMARY KEY (`StaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buildings`
--

DROP TABLE IF EXISTS `buildings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buildings` (
  `Building#` int NOT NULL,
  `Capacity` int DEFAULT NULL,
  `BuildingVehicleID` int DEFAULT NULL,
  PRIMARY KEY (`Building#`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildings`
--

LOCK TABLES `buildings` WRITE;
/*!40000 ALTER TABLE `buildings` DISABLE KEYS */;
/*!40000 ALTER TABLE `buildings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `busses`
--

DROP TABLE IF EXISTS `busses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `busses` (
  `BusID` int NOT NULL,
  `Capacity` int DEFAULT NULL,
  `Range` int DEFAULT NULL,
  `DriverLicense#` int DEFAULT NULL,
  `BusShift` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`BusID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `busses`
--

LOCK TABLES `busses` WRITE;
/*!40000 ALTER TABLE `busses` DISABLE KEYS */;
/*!40000 ALTER TABLE `busses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `can_edit`
--

DROP TABLE IF EXISTS `can_edit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `can_edit` (
  `ChildID` int NOT NULL,
  `StaffID_admin` int DEFAULT NULL,
  PRIMARY KEY (`ChildID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `can_edit`
--

LOCK TABLES `can_edit` WRITE;
/*!40000 ALTER TABLE `can_edit` DISABLE KEYS */;
/*!40000 ALTER TABLE `can_edit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `can_view_child`
--

DROP TABLE IF EXISTS `can_view_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `can_view_child` (
  `ChildID` int NOT NULL,
  `StaffID_teacher` int DEFAULT NULL,
  PRIMARY KEY (`ChildID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `can_view_child`
--

LOCK TABLES `can_view_child` WRITE;
/*!40000 ALTER TABLE `can_view_child` DISABLE KEYS */;
/*!40000 ALTER TABLE `can_view_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `can_view_wp`
--

DROP TABLE IF EXISTS `can_view_wp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `can_view_wp` (
  `WeeklyPlan#` int NOT NULL,
  `StaffID_teacher` int DEFAULT NULL,
  PRIMARY KEY (`WeeklyPlan#`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `can_view_wp`
--

LOCK TABLES `can_view_wp` WRITE;
/*!40000 ALTER TABLE `can_view_wp` DISABLE KEYS */;
/*!40000 ALTER TABLE `can_view_wp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `child`
--

DROP TABLE IF EXISTS `child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `child` (
  `ChildID` int NOT NULL,
  `Fname` varchar(45) DEFAULT NULL,
  `Mname` varchar(45) DEFAULT NULL,
  `Lname` varchar(45) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Bus#` int DEFAULT NULL,
  `Prescription#` int DEFAULT NULL,
  `GuardianSSN` int DEFAULT NULL,
  `Room#` int DEFAULT NULL,
  `BusShift` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ChildID`),
  KEY `Prescription#_idx` (`Prescription#`),
  KEY `GuardianSSN_idx` (`GuardianSSN`),
  KEY `Room#_idx` (`Room#`),
  KEY `Bus#_idx` (`Bus#`),
  KEY `BusShift_idx` (`BusShift`),
  CONSTRAINT `Bus#` FOREIGN KEY (`Bus#`) REFERENCES `busses` (`BusID`),
  CONSTRAINT `GuardianSSN` FOREIGN KEY (`GuardianSSN`) REFERENCES `guardians` (`GuardianSSN`),
  CONSTRAINT `Prescription#` FOREIGN KEY (`Prescription#`) REFERENCES `medications` (`Prescription#`),
  CONSTRAINT `Room` FOREIGN KEY (`Room#`) REFERENCES `rooms` (`Room#`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `child`
--

LOCK TABLES `child` WRITE;
/*!40000 ALTER TABLE `child` DISABLE KEYS */;
/*!40000 ALTER TABLE `child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drivers` (
  `StaffID` int NOT NULL,
  `License#` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `License Level` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`StaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guardians`
--

DROP TABLE IF EXISTS `guardians`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guardians` (
  `GuardianSSN` int NOT NULL,
  `Fname` varchar(45) DEFAULT NULL,
  `Mname` varchar(45) DEFAULT NULL,
  `Lname` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Phone` bigint DEFAULT NULL,
  PRIMARY KEY (`GuardianSSN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guardians`
--

LOCK TABLES `guardians` WRITE;
/*!40000 ALTER TABLE `guardians` DISABLE KEYS */;
/*!40000 ALTER TABLE `guardians` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medications`
--

DROP TABLE IF EXISTS `medications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medications` (
  `Prescription#` int NOT NULL,
  `ChildID` int NOT NULL,
  `Dosage` varchar(45) DEFAULT NULL,
  `Allergies` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Prescription#`),
  UNIQUE KEY `ChildID_UNIQUE` (`ChildID`),
  CONSTRAINT `ChildID` FOREIGN KEY (`ChildID`) REFERENCES `child` (`ChildID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medications`
--

LOCK TABLES `medications` WRITE;
/*!40000 ALTER TABLE `medications` DISABLE KEYS */;
/*!40000 ALTER TABLE `medications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `Room#` int NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Capacity` int DEFAULT NULL,
  `Building#` int DEFAULT NULL,
  PRIMARY KEY (`Room#`),
  KEY `Building#_idx` (`Building#`),
  CONSTRAINT `Building#` FOREIGN KEY (`Building#`) REFERENCES `buildings` (`Building#`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staffs` (
  `StaffID` int NOT NULL,
  `Fname` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Mname` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Lname` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Wage` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BGCheck` tinyint DEFAULT NULL,
  `Room#` int DEFAULT NULL,
  PRIMARY KEY (`StaffID`),
  KEY `Room#_idx` (`Room#`),
  CONSTRAINT `Room#` FOREIGN KEY (`Room#`) REFERENCES `rooms` (`Room#`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffs`
--

LOCK TABLES `staffs` WRITE;
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
/*!40000 ALTER TABLE `staffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachers` (
  `StaffID` int NOT NULL,
  `Classification` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Room#` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`StaffID`),
  CONSTRAINT `StaffID` FOREIGN KEY (`StaffID`) REFERENCES `staffs` (`StaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weeklyplans`
--

DROP TABLE IF EXISTS `weeklyplans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `weeklyplans` (
  `WeeklyPlan#` int NOT NULL,
  `Week#` varchar(45) DEFAULT NULL,
  `Activities` varchar(45) DEFAULT NULL,
  `PlanAuthor` varchar(45) DEFAULT NULL,
  `PlanAuthorID` int DEFAULT NULL,
  `Room#` int DEFAULT NULL,
  PRIMARY KEY (`WeeklyPlan#`),
  KEY `PlanAuthorID_idx` (`PlanAuthorID`),
  KEY `PlanAuthor` (`PlanAuthor`),
  KEY `Room_idx` (`Room#`),
  CONSTRAINT `PlanAuthorID` FOREIGN KEY (`PlanAuthorID`) REFERENCES `teachers` (`StaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weeklyplans`
--

LOCK TABLES `weeklyplans` WRITE;
/*!40000 ALTER TABLE `weeklyplans` DISABLE KEYS */;
/*!40000 ALTER TABLE `weeklyplans` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-02  4:11:59
