CREATE DATABASE  IF NOT EXISTS `Panel` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Panel`;
-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: Panel
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `am_actions`
--

DROP TABLE IF EXISTS `am_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `am_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) NOT NULL,
  `alias` text NOT NULL,
  `alow` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`rule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `am_actions`
--

LOCK TABLES `am_actions` WRITE;
/*!40000 ALTER TABLE `am_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `am_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `am_entitys_users`
--

DROP TABLE IF EXISTS `am_entitys_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `am_entitys_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `am_entitys_users`
--

LOCK TABLES `am_entitys_users` WRITE;
/*!40000 ALTER TABLE `am_entitys_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `am_entitys_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `am_groups`
--

DROP TABLE IF EXISTS `am_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `am_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `am_groups`
--

LOCK TABLES `am_groups` WRITE;
/*!40000 ALTER TABLE `am_groups` DISABLE KEYS */;
INSERT INTO `am_groups` VALUES (4,'MASTER',1,'2012-09-23 03:06:18','2016-02-27 22:18:46');
/*!40000 ALTER TABLE `am_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `am_groups_rules`
--

DROP TABLE IF EXISTS `am_groups_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `am_groups_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `rule_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `am_groups_rules`
--

LOCK TABLES `am_groups_rules` WRITE;
/*!40000 ALTER TABLE `am_groups_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `am_groups_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `am_groups_users`
--

DROP TABLE IF EXISTS `am_groups_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `am_groups_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `am_groups_users`
--

LOCK TABLES `am_groups_users` WRITE;
/*!40000 ALTER TABLE `am_groups_users` DISABLE KEYS */;
INSERT INTO `am_groups_users` VALUES (18,4,2);
/*!40000 ALTER TABLE `am_groups_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `am_rules`
--

DROP TABLE IF EXISTS `am_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `am_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `order` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `am_rules`
--

LOCK TABLES `am_rules` WRITE;
/*!40000 ALTER TABLE `am_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `am_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `am_users`
--

DROP TABLE IF EXISTS `am_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `am_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwordchangecode` varchar(128) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `am_users`
--

LOCK TABLES `am_users` WRITE;
/*!40000 ALTER TABLE `am_users` DISABLE KEYS */;
INSERT INTO `am_users` VALUES (2,'master','f9a8230ec347558101ef32b5ccec63b3','Amanager','evertonvieira1994@gmail.com','1',1,'2016-02-27 22:19:57','2016-03-12 15:05:21');
/*!40000 ALTER TABLE `am_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (3,'VÃ­deos','videos','dqwdwd','2016-03-27 16:02:53','2016-03-27 16:02:53');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text,
  `status` char(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabela destinada a registros enviados para o formulário de contatos ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_featureds`
--

DROP TABLE IF EXISTS `image_featureds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_featureds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(225) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`image_id`),
  KEY `fk_image_featureds_images1_idx` (`image_id`),
  CONSTRAINT `fk_image_featureds_images1` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_featureds`
--

LOCK TABLES `image_featureds` WRITE;
/*!40000 ALTER TABLE `image_featureds` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_featureds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `ext` varchar(5) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_section_links`
--

DROP TABLE IF EXISTS `menu_section_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_section_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `menu_section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`menu_section_id`),
  KEY `fk_menu_section_links_menu_sections1_idx` (`menu_section_id`),
  CONSTRAINT `fk_menu_section_links_menu_sections1` FOREIGN KEY (`menu_section_id`) REFERENCES `menu_sections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_section_links`
--

LOCK TABLES `menu_section_links` WRITE;
/*!40000 ALTER TABLE `menu_section_links` DISABLE KEYS */;
INSERT INTO `menu_section_links` VALUES (6,'Listar Menus','admin/menus/',7),(7,'Listar Links de SeÃ§Ãµes','admin/menu_section_links/',9),(8,'Adicionar Link de SeÃ§Ã£o','admin/menu_section_links/add',9),(9,'Listar SeÃ§Ãµes','admin/menu_sections/',8),(12,'Listar Posts','admin/news/',3),(13,'Adicionar Post','admin/news/add',3),(14,'Listar Categorias','admin/categories',3),(15,'Adicionar Categoria ','admin/categories/add',3),(16,'Listar PÃ¡ginas ','admin/pages',6),(17,'Adicionar PÃ¡gina','admin/pages/add',6),(18,'Adicionar Menu','admin/menus/add',7),(19,'Adicionar SeÃ§Ã£o','admin/menu_sections/add',8),(20,'Listar Contatos','admin/contacts',11);
/*!40000 ALTER TABLE `menu_section_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_sections`
--

DROP TABLE IF EXISTS `menu_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`menu_id`,`name`),
  KEY `fk_menu_sections_menus1_idx` (`menu_id`),
  CONSTRAINT `fk_menu_sections_menus1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_sections`
--

LOCK TABLES `menu_sections` WRITE;
/*!40000 ALTER TABLE `menu_sections` DISABLE KEYS */;
INSERT INTO `menu_sections` VALUES (3,'Posts',4),(6,'PÃ¡ginas',4),(7,'Menus',4),(8,'SeÃ§Ãµes de Menu',4),(9,'Links de SeÃ§Ã£o',4),(10,'Menu Section Links',4),(11,'Contatos',4);
/*!40000 ALTER TABLE `menu_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (4,'Principal');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `body` text,
  `data` date DEFAULT NULL,
  `status` char(1) DEFAULT '0',
  `featured` char(1) DEFAULT '0',
  `ext` varchar(5) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  UNIQUE KEY `slug_UNIQUE` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (6,'efwef','efwef','sdfdsf','<p>ffs</p>','2016-03-18','0','0',NULL,'2016-03-29 20:46:45','2016-03-27 15:56:40');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_categories` (
  `news_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`news_id`,`category_id`),
  KEY `fk_news_has_categories_categories1_idx` (`category_id`),
  KEY `fk_news_has_categories_news_idx` (`news_id`),
  CONSTRAINT `fk_news_has_categories_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_news_has_categories_news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_categories`
--

LOCK TABLES `news_categories` WRITE;
/*!40000 ALTER TABLE `news_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `news_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  UNIQUE KEY `slug_UNIQUE` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (3,'scsac','scsac','','2016-03-27 15:55:04','2016-03-27 15:55:04','0'),(4,'wefwef','wefwef','<p>sc</p>','2016-03-27 16:03:29','2016-03-27 16:03:29','0'),(5,'qwdqw','qwdqw','<p>qwdqwd</p>','2016-03-27 23:57:49','2016-03-27 23:57:49','0');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-29 21:11:01
