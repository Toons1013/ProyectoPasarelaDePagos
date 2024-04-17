-- MariaDB dump 10.19  Distrib 10.5.21-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: nwdb
-- ------------------------------------------------------
-- Server version	11.2.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `productDescription` text NOT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `productImgUrl` varchar(255) NOT NULL,
  `productStatus` char(3) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Licencia Windows 10 PRO','Codigo digital para licencia Windows 10 PRO',500.00,'http://drive.google.com/thumbnail?id=1K0ezclhqZsCdvTP28An4WyKtjftfFrRD','ACT'),(2,'Licencia Windows 10 Home','Codigo digital para licencia Windows 10 Home',300.00,'http://drive.google.com/thumbnail?id=13WX9sBJCRdqUFAyMQFZahQLqkf8g2jcH','ACT'),(3,'Licencia Windows 7 Ultimate','Codigo digital para licencia Windows 7 Ultimate',240.00,'http://drive.google.com/thumbnail?id=11WLlIqdqo7AJESM-gZlA7iXxMY2FPR0V','ACT'),(4,'Licencia Windows Server 2019 Datacenter ','Codigo digital para licencia Windows Server 2019 Datacenter  ',1000.00,'http://drive.google.com/thumbnail?id=18Dmau-VikTE7aBQqaj9Hp3U9gVnRs51S','ACT'),(5,'Licencia Windows 7 Professional','Codigo digital para licencia Windows 7 Professional',300.00,'http://drive.google.com/thumbnail?id=1BgWc7ztA4w2Ry6kA2ZOVejNgCw9-4HQk','ACT'),(6,'Licencia Windows Server 2019 Standard','Codigo digital para licencia Windows Server 2019 Standard',1100.00,'http://drive.google.com/thumbnail?id=1WnfLozIzjlnPh5P8lsrF6wt0h7egmUbV','ACT'),(7,'Licencia Windows 10 Enterprise','Codigo digital para licencia Windows 10 Enterprise',400.00,'http://drive.google.com/thumbnail?id=112Ioi8FiXRLanek29m3aMuYpuraz9Mz7','ACT'),(8,'Licencia Windows Server 2016 Essentials','Codigo digital para licencia Windows Server 2016 Essentials',600.00,'http://drive.google.com/thumbnail?id=1pKZ6LfAdEe5m909ogOGp6k4B0XqDxq2q','ACT'),(9,'Licencia Microsoft Office 2019','Codigo digital para licencia Microsoft Office 2019',500.00,'http://drive.google.com/thumbnail?id=1asXV_fP4_8r4LMCJLoUoLQuAdb5tWH43','ACT'),(10,'Licencia Microsoft Office 2016','Codigo digital para licencia Microsoft Office 2016',500.00,'http://drive.google.com/thumbnail?id=1aSHlWJmLFmb-ajbiIM32TC-VrwSkIy44','ACT');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-17 17:44:25
