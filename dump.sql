-- MySQL dump 10.13  Distrib 8.0.45, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: meetup
-- ------------------------------------------------------
-- Server version	8.0.45-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (6,'Tech'),(7,'Design'),(8,'Business'),(9,'Marketing'),(10,'Loisirs');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20260206213943','2026-02-06 21:40:04',88),('DoctrineMigrations\\Version20260206222114','2026-02-06 22:21:15',84);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `max_places` int NOT NULL,
  `image_filename` varchar(255) DEFAULT NULL,
  `category_id` int NOT NULL,
  `creator_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3BAE0AA712469DE2` (`category_id`),
  KEY `IDX_3BAE0AA761220EA6` (`creator_id`),
  CONSTRAINT `FK_3BAE0AA712469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_3BAE0AA761220EA6` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (23,'Événement #1','Ceci est une description pour l\'événement #1. Venez nombreux pour découvrir des choses incroyables !','2026-02-23 22:39:53','Lyon',36,NULL,6,11),(24,'Événement #2','Ceci est une description pour l\'événement #2. Venez nombreux pour découvrir des choses incroyables !','2026-02-18 22:39:53','Bordeaux',48,NULL,7,12),(25,'Événement #3','Ceci est une description pour l\'événement #3. Venez nombreux pour découvrir des choses incroyables !','2026-02-08 22:39:53','Bordeaux',66,NULL,9,13),(26,'Événement #4','Ceci est une description pour l\'événement #4. Venez nombreux pour découvrir des choses incroyables !','2026-02-21 22:39:53','Lyon',66,NULL,8,9),(27,'Événement #5','Ceci est une description pour l\'événement #5. Venez nombreux pour découvrir des choses incroyables !','2026-03-01 22:39:53','Marseille',48,NULL,8,9),(28,'Événement #6','Ceci est une description pour l\'événement #6. Venez nombreux pour découvrir des choses incroyables !','2026-02-16 22:39:53','Lyon',35,NULL,7,11),(29,'Événement #7','Ceci est une description pour l\'événement #7. Venez nombreux pour découvrir des choses incroyables !','2026-02-07 22:39:53','Bordeaux',16,NULL,7,9),(30,'Événement #8','Ceci est une description pour l\'événement #8. Venez nombreux pour découvrir des choses incroyables !','2026-02-21 22:39:53','Lyon',34,NULL,7,11),(31,'Événement #9','Ceci est une description pour l\'événement #9. Venez nombreux pour découvrir des choses incroyables !','2026-03-02 22:39:53','Lyon',91,NULL,9,9),(32,'Événement #10','Ceci est une description pour l\'événement #10. Venez nombreux pour découvrir des choses incroyables !','2026-02-15 22:39:53','Lyon',67,NULL,10,10),(33,'Événement #11','Ceci est une description pour l\'événement #11. Venez nombreux pour découvrir des choses incroyables !','2026-02-13 22:39:53','Bordeaux',75,NULL,9,12),(34,'Événement #12','Ceci est une description pour l\'événement #12. Venez nombreux pour découvrir des choses incroyables !','2026-02-15 22:39:53','Marseille',14,NULL,10,10),(35,'Événement #13','Ceci est une description pour l\'événement #13. Venez nombreux pour découvrir des choses incroyables !','2026-03-01 22:39:53','Nantes',18,NULL,6,10),(36,'Événement #14','Ceci est une description pour l\'événement #14. Venez nombreux pour découvrir des choses incroyables !','2026-02-11 22:39:53','Lyon',78,NULL,9,11),(37,'Événement #15','Ceci est une description pour l\'événement #15. Venez nombreux pour découvrir des choses incroyables !','2026-02-25 22:39:53','Nantes',35,NULL,9,9),(38,'Événement #16','Ceci est une description pour l\'événement #16. Venez nombreux pour découvrir des choses incroyables !','2026-03-07 22:39:53','Nantes',86,NULL,9,13),(39,'Modified Event Title','Ceci est une description pour l\'événement #17. Venez nombreux pour découvrir des choses incroyables !','2026-03-07 00:00:00','Nantes',99,NULL,6,13),(40,'Événement #18','Ceci est une description pour l\'événement #18. Venez nombreux pour découvrir des choses incroyables !','2026-02-18 22:39:53','Bordeaux',57,NULL,6,12),(41,'Événement #19','Ceci est une description pour l\'événement #19. Venez nombreux pour découvrir des choses incroyables !','2026-02-11 22:39:53','Nantes',17,NULL,7,11),(42,'Événement #20','Ceci est une description pour l\'événement #20. Venez nombreux pour découvrir des choses incroyables !','2026-03-06 22:39:53','Marseille',22,NULL,9,9);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750` (`queue_name`,`available_at`,`delivered_at`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `guest_count` int NOT NULL,
  `created_at` datetime NOT NULL,
  `event_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42C8495571F7E88B` (`event_id`),
  KEY `IDX_42C84955A76ED395` (`user_id`),
  CONSTRAINT `FK_42C8495571F7E88B` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `FK_42C84955A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (6,2,'2026-02-06 22:39:53',23,8),(7,1,'2026-02-06 22:39:53',24,8),(8,2,'2026-02-06 22:39:53',27,8),(9,3,'2026-02-06 22:39:53',29,8),(10,3,'2026-02-06 22:39:53',42,8);
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (8,'admin@eventhub.com','[\"ROLE_ADMIN\"]','$2y$13$gYqTqay6JuqrfMLXHrNHmOxTTwI7G6EPJ9RKD7X/83EPSXQSYhg12','Admin User'),(9,'user0@example.com','[\"ROLE_ADMIN\"]','$2y$13$4IFSxMnkQnYJ/C2MhCoLcuVAM395RukRBmjXa8vUZmVXonJ81As0y','User 0'),(10,'user1@example.com','[]','$2y$13$cju8fS5A6OSgzA0P6mUrT.PSs/fdUwIJ3R9.2MpYS1wiyzp3XfCRK','User 1'),(11,'user2@example.com','[]','$2y$13$mBQ.9sKO4.5rhHCkC6HTmO0Y7chqN2i4v9vONUcMGMT41hrJRQZEa','User 2'),(12,'user3@example.com','[]','$2y$13$JpJqssL0vEGWXNaX7H6dU.nVV8IU5fvyKox24Wy4GJUDrTn7ei/XS','User 3'),(13,'user4@example.com','[]','$2y$13$1HE1fG1XVsfK471Td.goRup2ltzBTZ9KAvRVavhA9ch.psP7Nky4y','User 4'),(14,'newadmin@example.com','[\"ROLE_ADMIN\"]','$2y$13$iIDl4m.vhgTJZjfqSoXExe9SykrlkTsSw.bgEFUEUwNHn3eOGG6Ji','NewAdmin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-08 18:39:36
