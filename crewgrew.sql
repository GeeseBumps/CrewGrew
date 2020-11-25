CREATE DATABASE  IF NOT EXISTS `clubmangement` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `clubmangement`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: clubmangement
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `advertiser`
--

DROP TABLE IF EXISTS `advertiser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `advertiser` (
  `AdvID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(45) NOT NULL,
  `AdvName` varchar(45) NOT NULL,
  `Phone` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  PRIMARY KEY (`AdvID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertiser`
--

LOCK TABLES `advertiser` WRITE;
/*!40000 ALTER TABLE `advertiser` DISABLE KEYS */;
/*!40000 ALTER TABLE `advertiser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application` (
  `ApplyID` int(11) NOT NULL,
  `ApplyDate` datetime NOT NULL,
  `Q1ans` varchar(1000) NOT NULL,
  `Q2ans` varchar(1000) NOT NULL,
  `Q3ans` varchar(1000) NOT NULL,
  `Q4ans` varchar(1000) DEFAULT NULL,
  `Q5ans` varchar(1000) DEFAULT NULL,
  `application_StdID` int(11) NOT NULL,
  `application_ClubID` int(11) NOT NULL,
  PRIMARY KEY (`ApplyID`),
  KEY `fk_application_student1_idx` (`application_StdID`),
  KEY `fk_application_club1_idx` (`application_ClubID`),
  CONSTRAINT `fk_application_club1` FOREIGN KEY (`application_ClubID`) REFERENCES `club` (`ClubID`),
  CONSTRAINT `fk_application_student1` FOREIGN KEY (`application_StdID`) REFERENCES `student` (`StdID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `club`
--

DROP TABLE IF EXISTS `club`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `club` (
  `ClubID` int(11) NOT NULL AUTO_INCREMENT,
  `ClubName` varchar(45) NOT NULL,
  `ClubLogo` blob,
  `EstYear` varchar(45) NOT NULL,
  `Field` varchar(45) NOT NULL,
  `Introduce` varchar(150) NOT NULL,
  `form_FormID` int(11) NOT NULL,
  `club_UnivID` int(11) NOT NULL,
  PRIMARY KEY (`ClubID`),
  KEY `fk_club_univ1_idx` (`club_UnivID`),
  CONSTRAINT `fk_club_univ1` FOREIGN KEY (`club_UnivID`) REFERENCES `univ` (`UnivID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club`
--

LOCK TABLES `club` WRITE;
/*!40000 ALTER TABLE `club` DISABLE KEYS */;
/*!40000 ALTER TABLE `club` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clubpage_post`
--

DROP TABLE IF EXISTS `clubpage_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clubpage_post` (
  `CPID` int(11) NOT NULL AUTO_INCREMENT,
  `PostDate` datetime NOT NULL,
  `PostTitle` varchar(100) NOT NULL,
  `PostContent` varchar(1000) NOT NULL,
  `PostImg` blob,
  `LikeNum` int(11) NOT NULL DEFAULT '0',
  `cp_StdID` int(11) NOT NULL,
  `cp_ClubID` int(11) NOT NULL,
  PRIMARY KEY (`CPID`),
  KEY `fk_clubpage_post_memberlist1_idx` (`cp_StdID`),
  KEY `fk_clubpage_post_club1_idx` (`cp_ClubID`),
  CONSTRAINT `fk_clubpage_post_club1` FOREIGN KEY (`cp_ClubID`) REFERENCES `club` (`ClubID`),
  CONSTRAINT `fk_clubpage_post_memberlist1` FOREIGN KEY (`cp_StdID`) REFERENCES `memberlist` (`memberlist_StdID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clubpage_post`
--

LOCK TABLES `clubpage_post` WRITE;
/*!40000 ALTER TABLE `clubpage_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `clubpage_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cpcomment`
--

DROP TABLE IF EXISTS `cpcomment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cpcomment` (
  `CCID` int(11) NOT NULL,
  `Content` varchar(45) NOT NULL,
  `Date` varchar(45) NOT NULL,
  `cpcomment_ClubID` int(11) NOT NULL,
  `cpcomment_StdID` int(11) NOT NULL,
  `cpcomment_CPID` int(11) NOT NULL,
  PRIMARY KEY (`CCID`),
  KEY `fk_club_post_comment_memberlist1_idx` (`cpcomment_ClubID`,`cpcomment_StdID`),
  KEY `fk_club_post_comment_clubpage_post1_idx` (`cpcomment_CPID`),
  CONSTRAINT `fk_club_post_comment_clubpage_post1` FOREIGN KEY (`cpcomment_CPID`) REFERENCES `clubpage_post` (`CPID`),
  CONSTRAINT `fk_club_post_comment_memberlist1` FOREIGN KEY (`cpcomment_ClubID`, `cpcomment_StdID`) REFERENCES `memberlist` (`memberlist_ClubID`, `memberlist_StdID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cpcomment`
--

LOCK TABLES `cpcomment` WRITE;
/*!40000 ALTER TABLE `cpcomment` DISABLE KEYS */;
/*!40000 ALTER TABLE `cpcomment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form` (
  `FormID` int(11) NOT NULL,
  `Q1` varchar(200) NOT NULL,
  `Q2` varchar(200) NOT NULL,
  `Q3` varchar(200) NOT NULL,
  `Q4` varchar(200) DEFAULT NULL,
  `Q5` varchar(200) DEFAULT NULL,
  `form_ClubID` int(11) NOT NULL,
  PRIMARY KEY (`FormID`),
  KEY `fk_form_club1_idx` (`form_ClubID`),
  CONSTRAINT `fk_form_club1` FOREIGN KEY (`form_ClubID`) REFERENCES `club` (`ClubID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memberlist`
--

DROP TABLE IF EXISTS `memberlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `memberlist` (
  `memberlist_ClubID` int(11) NOT NULL,
  `memberlist_StdID` int(11) NOT NULL,
  `Position` varchar(45) NOT NULL,
  `RegistrationYear` varchar(45) NOT NULL,
  `RegistrationSemester` varchar(45) NOT NULL,
  `Active` varchar(45) NOT NULL,
  `application_ApplyID` int(11) NOT NULL,
  PRIMARY KEY (`memberlist_ClubID`,`memberlist_StdID`),
  KEY `fk_club_has_student_student1_idx` (`memberlist_StdID`),
  KEY `fk_club_has_student_club_idx` (`memberlist_ClubID`),
  KEY `fk_memberlist_application1_idx` (`application_ApplyID`),
  CONSTRAINT `fk_club_has_student_club` FOREIGN KEY (`memberlist_ClubID`) REFERENCES `club` (`ClubID`),
  CONSTRAINT `fk_club_has_student_student1` FOREIGN KEY (`memberlist_StdID`) REFERENCES `student` (`StdID`),
  CONSTRAINT `fk_memberlist_application1` FOREIGN KEY (`application_ApplyID`) REFERENCES `application` (`ApplyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memberlist`
--

LOCK TABLES `memberlist` WRITE;
/*!40000 ALTER TABLE `memberlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `memberlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppcomment`
--

DROP TABLE IF EXISTS `ppcomment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppcomment` (
  `PPID` int(11) NOT NULL,
  `Content` varchar(45) NOT NULL,
  `Date` varchar(45) NOT NULL,
  `ppcomment_PPID` int(11) NOT NULL,
  `ppcomment_ClubID` int(11) DEFAULT NULL,
  `ppcomment_StdID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PPID`),
  KEY `fk_clubpost_comment_copy1_promotion_post1_idx` (`ppcomment_PPID`),
  KEY `fk_promotion_post_comment_club1_idx` (`ppcomment_ClubID`),
  KEY `fk_promotion_post_comment_student1_idx` (`ppcomment_StdID`),
  CONSTRAINT `fk_clubpost_comment_copy1_promotion_post1` FOREIGN KEY (`ppcomment_PPID`) REFERENCES `promotion_post` (`PPID`),
  CONSTRAINT `fk_promotion_post_comment_club1` FOREIGN KEY (`ppcomment_ClubID`) REFERENCES `club` (`ClubID`),
  CONSTRAINT `fk_promotion_post_comment_student1` FOREIGN KEY (`ppcomment_StdID`) REFERENCES `student` (`StdID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppcomment`
--

LOCK TABLES `ppcomment` WRITE;
/*!40000 ALTER TABLE `ppcomment` DISABLE KEYS */;
/*!40000 ALTER TABLE `ppcomment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotion_post`
--

DROP TABLE IF EXISTS `promotion_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotion_post` (
  `PPID` int(11) NOT NULL AUTO_INCREMENT,
  `PostDate` datetime NOT NULL,
  `PostTitle` varchar(100) NOT NULL,
  `PostContent` varchar(1000) NOT NULL,
  `PostImg` blob,
  `LikeNum` int(11) NOT NULL DEFAULT '0',
  `club_form_FormID` int(11) NOT NULL,
  `club_univ_UnivID` int(11) NOT NULL,
  `pp_ClubID` int(11) NOT NULL,
  PRIMARY KEY (`PPID`),
  KEY `fk_promotion_post_club1_idx` (`pp_ClubID`),
  CONSTRAINT `fk_promotion_post_club1` FOREIGN KEY (`pp_ClubID`) REFERENCES `club` (`ClubID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotion_post`
--

LOCK TABLES `promotion_post` WRITE;
/*!40000 ALTER TABLE `promotion_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotion_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `StdID` int(11) NOT NULL,
  `StdName` varchar(45) NOT NULL,
  `AdmissionYear` int(11) NOT NULL,
  `Admission Semester` varchar(45) NOT NULL,
  `Course` varchar(45) NOT NULL,
  `Gender` varchar(45) NOT NULL,
  `Age` int(11) NOT NULL,
  `Major` varchar(45) NOT NULL,
  `Interest` varchar(45) DEFAULT NULL,
  `Email` varchar(45) NOT NULL,
  `Phone` varchar(45) NOT NULL,
  `Introduce` varchar(100) DEFAULT NULL,
  `student_UnivID` int(11) NOT NULL,
  `account` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`StdID`),
  KEY `fk_student_univ1_idx` (`student_UnivID`),
  CONSTRAINT `fk_student_univ1` FOREIGN KEY (`student_UnivID`) REFERENCES `univ` (`UnivID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `univ`
--

DROP TABLE IF EXISTS `univ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `univ` (
  `UnivID` int(11) NOT NULL AUTO_INCREMENT,
  `UnivName` varchar(45) NOT NULL,
  `Location` varchar(100) NOT NULL,
  PRIMARY KEY (`UnivID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `univ`
--

LOCK TABLES `univ` WRITE;
/*!40000 ALTER TABLE `univ` DISABLE KEYS */;
/*!40000 ALTER TABLE `univ` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-25 23:46:54
