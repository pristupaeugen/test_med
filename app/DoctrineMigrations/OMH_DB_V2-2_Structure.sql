-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: oceansmhealth_db
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.2

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
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iso_2_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `iso_3_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `iso_num_code` int(11) NOT NULL,
  `domain` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5373C9665E237E06` (`name`),
  UNIQUE KEY `UNIQ_5373C9667EA082AD` (`iso_2_code`),
  UNIQUE KEY `UNIQ_5373C966B5FC5108` (`iso_3_code`),
  UNIQUE KEY `UNIQ_5373C9667A09341` (`iso_num_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drug_alternate_names`
--

DROP TABLE IF EXISTS `drug_alternate_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_alternate_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `drugs_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D76469FEDA039455` (`drugs_id`),
  CONSTRAINT `FK_D76469FEDA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drug_forms`
--

DROP TABLE IF EXISTS `drug_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drug_ingredients`
--

DROP TABLE IF EXISTS `drug_ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `strength` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `ingredients_id` int(11) DEFAULT NULL,
  `drugs_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DC5585983EC4DCE` (`ingredients_id`),
  KEY `IDX_DC558598DA039455` (`drugs_id`),
  CONSTRAINT `FK_DC5585983EC4DCE` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`),
  CONSTRAINT `FK_DC558598DA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drug_interactions`
--

DROP TABLE IF EXISTS `drug_interactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_interactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ingredients_id` int(11) DEFAULT NULL,
  `drugs_id` int(11) DEFAULT NULL,
  `interaction_categories_id` int(11) DEFAULT NULL,
  `interaction_severities_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4BAB065E3EC4DCE` (`ingredients_id`),
  KEY `IDX_4BAB065EDA039455` (`drugs_id`),
  KEY `IDX_4BAB065E8413601F` (`interaction_categories_id`),
  KEY `IDX_4BAB065E28967FF8` (`interaction_severities_id`),
  CONSTRAINT `FK_4BAB065E28967FF8` FOREIGN KEY (`interaction_severities_id`) REFERENCES `interaction_severities` (`id`),
  CONSTRAINT `FK_4BAB065E3EC4DCE` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`),
  CONSTRAINT `FK_4BAB065E8413601F` FOREIGN KEY (`interaction_categories_id`) REFERENCES `interaction_categories` (`id`),
  CONSTRAINT `FK_4BAB065EDA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drug_label`
--

DROP TABLE IF EXISTS `drug_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_header` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section_number` int(11) NOT NULL,
  `section_detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `drugs_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7A2FD767DA039455` (`drugs_id`),
  CONSTRAINT `FK_7A2FD767DA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drug_pdf`
--

DROP TABLE IF EXISTS `drug_pdf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdf_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `drugs_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_58569A6FDA039455` (`drugs_id`),
  CONSTRAINT `FK_58569A6FDA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drug_types`
--

DROP TABLE IF EXISTS `drug_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drugs`
--

DROP TABLE IF EXISTS `drugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `match_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `manufacturers_id` int(11) DEFAULT NULL,
  `drug_forms_id` int(11) DEFAULT NULL,
  `drug_types_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DA2C39DAF92F3E70` (`country_id`),
  KEY `IDX_DA2C39DAA2A4C2E4` (`manufacturers_id`),
  KEY `IDX_DA2C39DAB4521F68` (`drug_forms_id`),
  KEY `IDX_DA2C39DAF37A6A00` (`drug_types_id`),
  CONSTRAINT `FK_DA2C39DAA2A4C2E4` FOREIGN KEY (`manufacturers_id`) REFERENCES `manufacturers` (`id`),
  CONSTRAINT `FK_DA2C39DAB4521F68` FOREIGN KEY (`drug_forms_id`) REFERENCES `drug_forms` (`id`),
  CONSTRAINT `FK_DA2C39DAF37A6A00` FOREIGN KEY (`drug_types_id`) REFERENCES `drug_types` (`id`),
  CONSTRAINT `FK_DA2C39DAF92F3E70` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drugs_match`
--

DROP TABLE IF EXISTS `drugs_match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs_match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `match_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strength` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `manufacturers_id` int(11) DEFAULT NULL,
  `drug_forms_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_850D6C47F92F3E70` (`country_id`),
  KEY `IDX_850D6C47A2A4C2E4` (`manufacturers_id`),
  KEY `IDX_850D6C47B4521F68` (`drug_forms_id`),
  CONSTRAINT `FK_850D6C47A2A4C2E4` FOREIGN KEY (`manufacturers_id`) REFERENCES `manufacturers` (`id`),
  CONSTRAINT `FK_850D6C47B4521F68` FOREIGN KEY (`drug_forms_id`) REFERENCES `drug_forms` (`id`),
  CONSTRAINT `FK_850D6C47F92F3E70` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ingredient_categories`
--

DROP TABLE IF EXISTS `ingredient_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredient_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ingredient_categories_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4B60114F7E4D7220` (`ingredient_categories_id`),
  CONSTRAINT `FK_4B60114F7E4D7220` FOREIGN KEY (`ingredient_categories_id`) REFERENCES `ingredient_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `interaction_categories`
--

DROP TABLE IF EXISTS `interaction_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interaction_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `interaction_severities`
--

DROP TABLE IF EXISTS `interaction_severities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interaction_severities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `manufacturer_types`
--

DROP TABLE IF EXISTS `manufacturer_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacturer_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer_types_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_94565B12B6AA3C1` (`manufacturer_types_id`),
  CONSTRAINT `FK_94565B12B6AA3C1` FOREIGN KEY (`manufacturer_types_id`) REFERENCES `manufacturer_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mobile_token`
--

DROP TABLE IF EXISTS `mobile_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mobile_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_11D110775F37A13B` (`token`),
  KEY `IDX_11D11077A76ED395` (`user_id`),
  CONSTRAINT `FK_11D11077A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `omh_category`
--

DROP TABLE IF EXISTS `omh_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `omh_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `omh_country`
--

DROP TABLE IF EXISTS `omh_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `omh_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2910881C77153098` (`code`),
  UNIQUE KEY `UNIQ_2910881C5E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `omh_description`
--

DROP TABLE IF EXISTS `omh_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `omh_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicine_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E63E476F2F7D140A` (`medicine_id`),
  CONSTRAINT `FK_E63E476F2F7D140A` FOREIGN KEY (`medicine_id`) REFERENCES `omh_medicine` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `omh_ingredient`
--

DROP TABLE IF EXISTS `omh_ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `omh_ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `omh_medicine`
--

DROP TABLE IF EXISTS `omh_medicine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `omh_medicine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E89CD1EEF92F3E70` (`country_id`),
  KEY `IDX_E89CD1EE12469DE2` (`category_id`),
  CONSTRAINT `FK_E89CD1EE12469DE2` FOREIGN KEY (`category_id`) REFERENCES `omh_category` (`id`),
  CONSTRAINT `FK_E89CD1EEF92F3E70` FOREIGN KEY (`country_id`) REFERENCES `omh_country` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `omh_medicine_ingredient`
--

DROP TABLE IF EXISTS `omh_medicine_ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `omh_medicine_ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicine_id` int(11) DEFAULT NULL,
  `ingredient_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `medicine_ingredient_id` (`medicine_id`,`ingredient_id`),
  KEY `IDX_B1E06B202F7D140A` (`medicine_id`),
  KEY `IDX_B1E06B20933FE08C` (`ingredient_id`),
  CONSTRAINT `FK_B1E06B202F7D140A` FOREIGN KEY (`medicine_id`) REFERENCES `omh_medicine` (`id`),
  CONSTRAINT `FK_B1E06B20933FE08C` FOREIGN KEY (`ingredient_id`) REFERENCES `omh_ingredient` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_drug`
--

DROP TABLE IF EXISTS `user_drug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_drug` (
  `user_id` int(11) NOT NULL,
  `drugs_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`drugs_id`),
  KEY `IDX_396A36F7A76ED395` (`user_id`),
  KEY `IDX_396A36F7DA039455` (`drugs_id`),
  CONSTRAINT `FK_396A36F7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_396A36F7DA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_interaction`
--

DROP TABLE IF EXISTS `user_interaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_interaction` (
  `user_id` int(11) NOT NULL,
  `drugs_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`drugs_id`),
  KEY `IDX_9E963432A76ED395` (`user_id`),
  KEY `IDX_9E963432DA039455` (`drugs_id`),
  CONSTRAINT `FK_9E963432A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_9E963432DA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_match`
--

DROP TABLE IF EXISTS `user_match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_match` (
  `user_id` int(11) NOT NULL,
  `drugs_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`drugs_id`),
  KEY `IDX_98993E5DA76ED395` (`user_id`),
  KEY `IDX_98993E5DDA039455` (`drugs_id`),
  CONSTRAINT `FK_98993E5DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_98993E5DDA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wada_ingredients`
--

DROP TABLE IF EXISTS `wada_ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wada_ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prohibited_in` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `top_level_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_level1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_level2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_level3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ingredients_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1DFDF8053EC4DCE` (`ingredients_id`),
  CONSTRAINT `FK_1DFDF8053EC4DCE` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-19 11:15:50
