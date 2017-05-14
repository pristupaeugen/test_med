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
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Andorra','AD','AND',20,'.ad',0),(2,'Afghanistan','AF','AFG',4,'.af',0),(3,'Aland Islands','AX','ALA',248,'.ax',0),(4,'Albania','AL','ALB',8,'.al',0),(5,'Algeria','DZ','DZA',12,'.dz',0),(6,'American Samoa','AS','ASM',16,'.as',0),(7,'Angola','AO','AGO',24,'.ao',0),(8,'Anguilla','AI','AIA',660,'.ai',0),(9,'Antarctica','AQ','ATA',10,'.aq',0),(10,'Antigua and Barbuda','AG','ATG',28,'.ag',0),(11,'Argentina','AR','ARG',32,'.ar',0),(12,'Armenia','AM','ARM',51,'.am',0),(13,'Aruba','AW','ABW',533,'.aw',0),(14,'Australia','AU','AUS',36,'.au',0),(15,'Austria','AT','AUT',40,'.at',0),(16,'Azerbaijan','AZ','AZE',31,'.az',0),(17,'Bahamas','BS','BHS',44,'.bs',0),(18,'Bahrain','BH','BHR',48,'.bh',0),(19,'Bangladesh','BD','BGD',50,'.bd',0),(20,'Barbados','BB','BRB',52,'.bb',0),(21,'Belarus','BY','BLR',112,'.by',0),(22,'Belgium','BE','BEL',56,'.be',0),(23,'Belize','BZ','BLZ',84,'.bz',0),(24,'Benin','BJ','BEN',204,'.bj',0),(25,'Bermuda','BM','BMU',60,'.bm',0),(26,'Bhutan','BT','BTN',64,'.bt',0),(27,'Bolivia (Plurinational State of)','BO','BOL',68,'.bo',0),(28,'Bonaire, Sint Eustatius and Saba','BQ','BES',535,'.bq',0),(29,'Bosnia and Herzegovina','BA','BIH',70,'.ba',0),(30,'Botswana','BW','BWA',72,'.bw',0),(31,'Bouvet Island','BV','BVT',74,'.bv',0),(32,'Brazil','BR','BRA',76,'.br',0),(33,'British Indian Ocean Territory','IO','IOT',86,'.io',0),(34,'Brunei Darussalam','BN','BRN',96,'.bn',0),(35,'Bulgaria','BG','BGR',100,'.bg',0),(36,'Burkina Faso','BF','BFA',854,'.bf',0),(37,'Burundi','BI','BDI',108,'.bi',0),(38,'Cabo Verde','CV','CPV',132,'.cv',0),(39,'Cambodia','KH','KHM',116,'.kh',0),(40,'Cameroon','CM','CMR',120,'.cm',0),(41,'Canada','CA','CAN',124,'.ca',0),(42,'Cayman Islands','KY','CYM',136,'.ky',0),(43,'Central African Republic','CF','CAF',140,'.cf',0),(44,'Chad','TD','TCD',148,'.td',0),(45,'Chile','CL','CHL',152,'.cl',0),(46,'China','CN','CHN',156,'.cn',0),(47,'Christmas Island','CX','CXR',162,'.cx',0),(48,'Cocos (Keeling) Islands','CC','CCK',166,'.cc',0),(49,'Colombia','CO','COL',170,'.co',0),(50,'Comoros','KM','COM',174,'.km',0),(51,'Congo','CG','COG',178,'.cg',0),(52,'Congo (Democratic Republic of the)','CD','COD',180,'.cd',0),(53,'Cook Islands','CK','COK',184,'.ck',0),(54,'Costa Rica','CR','CRI',188,'.cr',0),(55,'Cote d\'Ivoire','CI','CIV',384,'.ci',0),(56,'Croatia','HR','HRV',191,'.hr',0),(57,'Cuba','CU','CUB',192,'.cu',0),(58,'Curacao','CW','CUW',531,'.cw',0),(59,'Cyprus','CY','CYP',196,'.cy',0),(60,'Czech Republic','CZ','CZE',203,'.cz',0),(61,'Denmark','DK','DNK',208,'.dk',0),(62,'Djibouti','DJ','DJI',262,'.dj',0),(63,'Dominica','DM','DMA',212,'.dm',0),(64,'Dominican Republic','DO','DOM',214,'.do',0),(65,'Ecuador','EC','ECU',218,'.ec',0),(66,'Egypt','EG','EGY',818,'.eg',0),(67,'El Salvador','SV','SLV',222,'.sv',0),(68,'Equatorial Guinea','GQ','GNQ',226,'.gq',0),(69,'Eritrea','ER','ERI',232,'.er',0),(70,'Estonia','EE','EST',233,'.ee',0),(71,'Ethiopia','ET','ETH',231,'.et',0),(72,'Falkland Islands (Malvinas)','FK','FLK',238,'.fk',0),(73,'Faroe Islands','FO','FRO',234,'.fo',0),(74,'Fiji','FJ','FJI',242,'.fj',0),(75,'Finland','FI','FIN',246,'.fi',0),(76,'France','FR','FRA',250,'.fr',0),(77,'French Guiana','GF','GUF',254,'.gf',0),(78,'French Polynesia','PF','PYF',258,'.pf',0),(79,'French Southern Territories','TF','ATF',260,'.tf',0),(80,'Gabon','GA','GAB',266,'.ga',0),(81,'Gambia','GM','GMB',270,'.gm',0),(82,'Georgia','GE','GEO',268,'.ge',0),(83,'Germany','DE','DEU',276,'.de',0),(84,'Ghana','GH','GHA',288,'.gh',0),(85,'Gibraltar','GI','GIB',292,'.gi',0),(86,'Greece','GR','GRC',300,'.gr',0),(87,'Greenland','GL','GRL',304,'.gl',0),(88,'Grenada','GD','GRD',308,'.gd',0),(89,'Guadeloupe','GP','GLP',312,'.gp',0),(90,'Guam','GU','GUM',316,'.gu',0),(91,'Guatemala','GT','GTM',320,'.gt',0),(92,'Guernsey','GG','GGY',831,'.gg',0),(93,'Guinea','GN','GIN',324,'.gn',0),(94,'Guinea-Bissau','GW','GNB',624,'.gw',0),(95,'Guyana','GY','GUY',328,'.gy',0),(96,'Haiti','HT','HTI',332,'.ht',0),(97,'Heard Island and McDonald Islands','HM','HMD',334,'.hm',0),(98,'Holy See','VA','VAT',336,'.va',0),(99,'Honduras','HN','HND',340,'.hn',0),(100,'Hong Kong','HK','HKG',344,'.hk',0),(101,'Hungary','HU','HUN',348,'.hu',0),(102,'Iceland','IS','ISL',352,'.is',0),(103,'India','IN','IND',356,'.in',0),(104,'Indonesia','ID','IDN',360,'.id',0),(105,'Iran (Islamic Republic of)','IR','IRN',364,'.ir',0),(106,'Iraq','IQ','IRQ',368,'.iq',0),(107,'Ireland','IE','IRL',372,'.ie',0),(108,'Isle of Man','IM','IMN',833,'.im',0),(109,'Israel','IL','ISR',376,'.il',0),(110,'Italy','IT','ITA',380,'.it',0),(111,'Jamaica','JM','JAM',388,'.jm',0),(112,'Japan','JP','JPN',392,'.jp',0),(113,'Jersey','JE','JEY',832,'.je',0),(114,'Jordan','JO','JOR',400,'.jo',0),(115,'Kazakhstan','KZ','KAZ',398,'.kz',0),(116,'Kenya','KE','KEN',404,'.ke',0),(117,'Kiribati','KI','KIR',296,'.ki',0),(118,'Korea (Democratic People\'s Republic of)','KP','PRK',408,'.kp',0),(119,'Korea (Republic of)','KR','KOR',410,'.kr',0),(120,'Kuwait','KW','KWT',414,'.kw',0),(121,'Kyrgyzstan','KG','KGZ',417,'.kg',0),(122,'Lao People\'s Democratic Republic','LA','LAO',418,'.la',0),(123,'Latvia','LV','LVA',428,'.lv',0),(124,'Lebanon','LB','LBN',422,'.lb',0),(125,'Lesotho','LS','LSO',426,'.ls',0),(126,'Liberia','LR','LBR',430,'.lr',0),(127,'Libya','LY','LBY',434,'.ly',0),(128,'Liechtenstein','LI','LIE',438,'.li',0),(129,'Lithuania','LT','LTU',440,'.lt',0),(130,'Luxembourg','LU','LUX',442,'.lu',0),(131,'Macao','MO','MAC',446,'.mo',0),(132,'Macedonia (the former Yugoslav Republic of)','MK','MKD',807,'.mk',0),(133,'Madagascar','MG','MDG',450,'.mg',0),(134,'Malawi','MW','MWI',454,'.mw',0),(135,'Malaysia','MY','MYS',458,'.my',0),(136,'Maldives','MV','MDV',462,'.mv',0),(137,'Mali','ML','MLI',466,'.ml',0),(138,'Malta','MT','MLT',470,'.mt',0),(139,'Marshall Islands','MH','MHL',584,'.mh',0),(140,'Martinique','MQ','MTQ',474,'.mq',0),(141,'Mauritania','MR','MRT',478,'.mr',0),(142,'Mauritius','MU','MUS',480,'.mu',0),(143,'Mayotte','YT','MYT',175,'.yt',0),(144,'Mexico','MX','MEX',484,'.mx',0),(145,'Micronesia (Federated States of)','FM','FSM',583,'.fm',0),(146,'Moldova (Republic of)','MD','MDA',498,'.md',0),(147,'Monaco','MC','MCO',492,'.mc',0),(148,'Mongolia','MN','MNG',496,'.mn',0),(149,'Montenegro','ME','MNE',499,'.me',0),(150,'Montserrat','MS','MSR',500,'.ms',0),(151,'Morocco','MA','MAR',504,'.ma',0),(152,'Mozambique','MZ','MOZ',508,'.mz',0),(153,'Myanmar','MM','MMR',104,'.mm',0),(154,'Namibia','NA','NAM',516,'.na',0),(155,'Nauru','NR','NRU',520,'.nr',0),(156,'Nepal','NP','NPL',524,'.np',0),(157,'Netherlands','NL','NLD',528,'.nl',0),(158,'New Caledonia','NC','NCL',540,'.nc',0),(159,'New Zealand','NZ','NZL',554,'.nz',0),(160,'Nicaragua','NI','NIC',558,'.ni',0),(161,'Niger','NE','NER',562,'.ne',0),(162,'Nigeria','NG','NGA',566,'.ng',0),(163,'Niue','NU','NIU',570,'.nu',0),(164,'Norfolk Island','NF','NFK',574,'.nf',0),(165,'Northern Mariana Islands','MP','MNP',580,'.mp',0),(166,'Norway','NO','NOR',578,'.no',0),(167,'Oman','OM','OMN',512,'.om',0),(168,'Pakistan','PK','PAK',586,'.pk',0),(169,'Palau','PW','PLW',585,'.pw',0),(170,'Palestine, State of','PS','PSE',275,'.ps',0),(171,'Panama','PA','PAN',591,'.pa',0),(172,'Papua New Guinea','PG','PNG',598,'.pg',0),(173,'Paraguay','PY','PRY',600,'.py',0),(174,'Peru','PE','PER',604,'.pe',0),(175,'Philippines','PH','PHL',608,'.ph',0),(176,'Pitcairn','PN','PCN',612,'.pn',0),(177,'Poland','PL','POL',616,'.pl',0),(178,'Portugal','PT','PRT',620,'.pt',0),(179,'Puerto Rico','PR','PRI',630,'.pr',0),(180,'Qatar','QA','QAT',634,'.qa',0),(181,'Reunion','RE','REU',638,'.re',0),(182,'Romania','RO','ROU',642,'.ro',0),(183,'Russian Federation','RU','RUS',643,'.ru',0),(184,'Rwanda','RW','RWA',646,'.rw',0),(185,'Saint Barthelemy','BL','BLM',652,'.bl',0),(186,'Saint Helena, Ascension and Tristan da Cunha','SH','SHN',654,'.sh',0),(187,'Saint Kitts and Nevis','KN','KNA',659,'.kn',0),(188,'Saint Lucia','LC','LCA',662,'.lc',0),(189,'Saint Martin (French part)','MF','MAF',663,'.mf',0),(190,'Saint Pierre and Miquelon','PM','SPM',666,'.pm',0),(191,'Saint Vincent and the Grenadines','VC','VCT',670,'.vc',0),(192,'Samoa','WS','WSM',882,'.ws',0),(193,'San Marino','SM','SMR',674,'.sm',0),(194,'Sao Tome and Principe','ST','STP',678,'.st',0),(195,'Saudi Arabia','SA','SAU',682,'.sa',0),(196,'Senegal','SN','SEN',686,'.sn',0),(197,'Serbia','RS','SRB',688,'.rs',0),(198,'Seychelles','SC','SYC',690,'.sc',0),(199,'Sierra Leone','SL','SLE',694,'.sl',0),(200,'Singapore','SG','SGP',702,'.sg',0),(201,'Sint Maarten (Dutch part)','SX','SXM',534,'.sx',0),(202,'Slovakia','SK','SVK',703,'.sk',0),(203,'Slovenia','SI','SVN',705,'.si',0),(204,'Solomon Islands','SB','SLB',90,'.sb',0),(205,'Somalia','SO','SOM',706,'.so',0),(206,'South Africa','ZA','ZAF',710,'.za',0),(207,'South Georgia and the South Sandwich Islands','GS','SGS',239,'.gs',0),(208,'South Sudan','SS','SSD',728,'.ss',0),(209,'Spain','ES','ESP',724,'.es',0),(210,'Sri Lanka','LK','LKA',144,'.lk',0),(211,'Sudan','SD','SDN',729,'.sd',0),(212,'Suriname','SR','SUR',740,'.sr',0),(213,'Svalbard and Jan Mayen','SJ','SJM',744,'.sj',0),(214,'Swaziland','SZ','SWZ',748,'.sz',0),(215,'Sweden','SE','SWE',752,'.se',0),(216,'Switzerland','CH','CHE',756,'.ch',0),(217,'Syrian Arab Republic','SY','SYR',760,'.sy',0),(218,'Taiwan, Province of China','TW','TWN',158,'.tw',0),(219,'Tajikistan','TJ','TJK',762,'.tj',0),(220,'Tanzania, United Republic of','TZ','TZA',834,'.tz',0),(221,'Thailand','TH','THA',764,'.th',0),(222,'Timor-Leste','TL','TLS',626,'.tl',0),(223,'Togo','TG','TGO',768,'.tg',0),(224,'Tokelau','TK','TKL',772,'.tk',0),(225,'Tonga','TO','TON',776,'.to',0),(226,'Trinidad and Tobago','TT','TTO',780,'.tt',0),(227,'Tunisia','TN','TUN',788,'.tn',0),(228,'Turkey','TR','TUR',792,'.tr',0),(229,'Turkmenistan','TM','TKM',795,'.tm',0),(230,'Turks and Caicos Islands','TC','TCA',796,'.tc',0),(231,'Tuvalu','TV','TUV',798,'.tv',0),(232,'Uganda','UG','UGA',800,'.ug',0),(233,'Ukraine','UA','UKR',804,'.ua',0),(234,'United Arab Emirates','AE','ARE',784,'.ae',0),(235,'United Kingdom of Great Britain and Northern Ireland','GB','GBR',826,'.uk',0),(236,'United States Minor Outlying Islands','UM','UMI',581,'.um',0),(237,'United States of America','US','USA',840,'.us',1),(238,'Uruguay','UY','URY',858,'.uy',0),(239,'Uzbekistan','UZ','UZB',860,'.uz',0),(240,'Vanuatu','VU','VUT',548,'.vu',0),(241,'Venezuela (Bolivarian Republic of)','VE','VEN',862,'.ve',0),(242,'Viet Nam','VN','VNM',704,'.vn',0),(243,'Virgin Islands (British)','VG','VGB',92,'.vg',0),(244,'Virgin Islands (U.S.)','VI','VIR',850,'.vi',0),(245,'Wallis and Futuna','WF','WLF',876,'.wf',0),(246,'Western Sahara','EH','ESH',732,'.eh',0),(247,'Yemen','YE','YEM',887,'.ye',0),(248,'Zambia','ZM','ZMB',894,'.zm',0),(249,'Zimbabwe','ZW','ZWE',716,'.zw',0);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug_alternate_names`
--

DROP TABLE IF EXISTS `drug_alternate_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_alternate_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drugs_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D76469FEDA039455` (`drugs_id`),
  CONSTRAINT `FK_D76469FEDA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_alternate_names`
--

LOCK TABLES `drug_alternate_names` WRITE;
/*!40000 ALTER TABLE `drug_alternate_names` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_alternate_names` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `drug_forms`
--

LOCK TABLES `drug_forms` WRITE;
/*!40000 ALTER TABLE `drug_forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug_ingredients`
--

DROP TABLE IF EXISTS `drug_ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredients_id` int(11) DEFAULT NULL,
  `drugs_id` int(11) DEFAULT NULL,
  `strength` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DC5585983EC4DCE` (`ingredients_id`),
  KEY `IDX_DC558598DA039455` (`drugs_id`),
  CONSTRAINT `FK_DC5585983EC4DCE` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`),
  CONSTRAINT `FK_DC558598DA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_ingredients`
--

LOCK TABLES `drug_ingredients` WRITE;
/*!40000 ALTER TABLE `drug_ingredients` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug_interactions`
--

DROP TABLE IF EXISTS `drug_interactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_interactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredients_id` int(11) DEFAULT NULL,
  `drugs_id` int(11) DEFAULT NULL,
  `interaction_categories_id` int(11) DEFAULT NULL,
  `interaction_severities_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
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
-- Dumping data for table `drug_interactions`
--

LOCK TABLES `drug_interactions` WRITE;
/*!40000 ALTER TABLE `drug_interactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_interactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug_label`
--

DROP TABLE IF EXISTS `drug_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drugs_id` int(11) DEFAULT NULL,
  `section_header` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section_number` int(11) NOT NULL,
  `section_detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7A2FD767DA039455` (`drugs_id`),
  CONSTRAINT `FK_7A2FD767DA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_label`
--

LOCK TABLES `drug_label` WRITE;
/*!40000 ALTER TABLE `drug_label` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug_pdf`
--

DROP TABLE IF EXISTS `drug_pdf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug_pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drugs_id` int(11) DEFAULT NULL,
  `pdf_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_58569A6FDA039455` (`drugs_id`),
  CONSTRAINT `FK_58569A6FDA039455` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug_pdf`
--

LOCK TABLES `drug_pdf` WRITE;
/*!40000 ALTER TABLE `drug_pdf` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_pdf` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `drug_types`
--

LOCK TABLES `drug_types` WRITE;
/*!40000 ALTER TABLE `drug_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `drug_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drugs`
--

DROP TABLE IF EXISTS `drugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `manufacturers_id` int(11) DEFAULT NULL,
  `drug_forms_id` int(11) DEFAULT NULL,
  `drug_types_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `match_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
-- Dumping data for table `drugs`
--

LOCK TABLES `drugs` WRITE;
/*!40000 ALTER TABLE `drugs` DISABLE KEYS */;
/*!40000 ALTER TABLE `drugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drugs_match`
--

DROP TABLE IF EXISTS `drugs_match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs_match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `manufacturers_id` int(11) DEFAULT NULL,
  `drug_forms_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `match_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strength` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
-- Dumping data for table `drugs_match`
--

LOCK TABLES `drugs_match` WRITE;
/*!40000 ALTER TABLE `drugs_match` DISABLE KEYS */;
/*!40000 ALTER TABLE `drugs_match` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `ingredient_categories`
--

LOCK TABLES `ingredient_categories` WRITE;
/*!40000 ALTER TABLE `ingredient_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingredient_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient_categories_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4B60114F7E4D7220` (`ingredient_categories_id`),
  CONSTRAINT `FK_4B60114F7E4D7220` FOREIGN KEY (`ingredient_categories_id`) REFERENCES `ingredient_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `interaction_categories`
--

LOCK TABLES `interaction_categories` WRITE;
/*!40000 ALTER TABLE `interaction_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `interaction_categories` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `interaction_severities`
--

LOCK TABLES `interaction_severities` WRITE;
/*!40000 ALTER TABLE `interaction_severities` DISABLE KEYS */;
/*!40000 ALTER TABLE `interaction_severities` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `manufacturer_types`
--

LOCK TABLES `manufacturer_types` WRITE;
/*!40000 ALTER TABLE `manufacturer_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `manufacturer_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer_types_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_94565B12B6AA3C1` (`manufacturer_types_id`),
  CONSTRAINT `FK_94565B12B6AA3C1` FOREIGN KEY (`manufacturer_types_id`) REFERENCES `manufacturer_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturers`
--

LOCK TABLES `manufacturers` WRITE;
/*!40000 ALTER TABLE `manufacturers` DISABLE KEYS */;
/*!40000 ALTER TABLE `manufacturers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20170227100717'),('20170309182456'),('20170327185345'),('20170404132317'),('20170407004357'),('20170418160832');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `mobile_token`
--

LOCK TABLES `mobile_token` WRITE;
/*!40000 ALTER TABLE `mobile_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `mobile_token` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omh_category`
--

LOCK TABLES `omh_category` WRITE;
/*!40000 ALTER TABLE `omh_category` DISABLE KEYS */;
INSERT INTO `omh_category` VALUES (1,'Category 1'),(2,'Category 2'),(3,'Category 3');
/*!40000 ALTER TABLE `omh_category` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omh_country`
--

LOCK TABLES `omh_country` WRITE;
/*!40000 ALTER TABLE `omh_country` DISABLE KEYS */;
INSERT INTO `omh_country` VALUES (1,'AF','Afghanistan'),(2,'AL','Albania'),(3,'DZ','Algeria'),(4,'DS','American Samoa'),(5,'AD','Andorra'),(6,'AO','Angola'),(7,'AI','Anguilla'),(8,'AQ','Antarctica'),(9,'AG','Antigua and Barbuda'),(10,'AR','Argentina'),(11,'AM','Armenia'),(12,'AW','Aruba'),(13,'AU','Australia'),(14,'AT','Austria'),(15,'AZ','Azerbaijan'),(16,'BS','Bahamas'),(17,'BH','Bahrain'),(18,'BD','Bangladesh'),(19,'BB','Barbados'),(20,'BY','Belarus'),(21,'BE','Belgium'),(22,'BZ','Belize'),(23,'BJ','Benin'),(24,'BM','Bermuda'),(25,'BT','Bhutan'),(26,'BO','Bolivia'),(27,'BA','Bosnia and Herzegovina'),(28,'BW','Botswana'),(29,'BV','Bouvet Island'),(30,'BR','Brazil'),(31,'IO','British Indian Ocean Territory'),(32,'BN','Brunei Darussalam'),(33,'BG','Bulgaria'),(34,'BF','Burkina Faso'),(35,'BI','Burundi'),(36,'KH','Cambodia'),(37,'CM','Cameroon'),(38,'CA','Canada'),(39,'CV','Cape Verde'),(40,'KY','Cayman Islands'),(41,'CF','Central African Republic'),(42,'TD','Chad'),(43,'CL','Chile'),(44,'CN','China'),(45,'CX','Christmas Island'),(46,'CC','Cocos (Keeling) Islands'),(47,'CO','Colombia'),(48,'KM','Comoros'),(49,'CG','Congo'),(50,'CK','Cook Islands'),(51,'CR','Costa Rica'),(52,'HR','Croatia (Hrvatska)'),(53,'CU','Cuba'),(54,'CY','Cyprus'),(55,'CZ','Czech Republic'),(56,'DK','Denmark'),(57,'DJ','Djibouti'),(58,'DM','Dominica'),(59,'DO','Dominican Republic'),(60,'TP','East Timor'),(61,'EC','Ecuador'),(62,'EG','Egypt'),(63,'SV','El Salvador'),(64,'GQ','Equatorial Guinea'),(65,'ER','Eritrea'),(66,'EE','Estonia'),(67,'ET','Ethiopia'),(68,'FK','Falkland Islands (Malvinas)'),(69,'FO','Faroe Islands'),(70,'FJ','Fiji'),(71,'FI','Finland'),(72,'FR','France'),(73,'FX','France, Metropolitan'),(74,'GF','French Guiana'),(75,'PF','French Polynesia'),(76,'TF','French Southern Territories'),(77,'GA','Gabon'),(78,'GM','Gambia'),(79,'GE','Georgia'),(80,'DE','Germany'),(81,'GH','Ghana'),(82,'GI','Gibraltar'),(83,'GK','Guernsey'),(84,'GR','Greece'),(85,'GL','Greenland'),(86,'GD','Grenada'),(87,'GP','Guadeloupe'),(88,'GU','Guam'),(89,'GT','Guatemala'),(90,'GN','Guinea'),(91,'GW','Guinea-Bissau'),(92,'GY','Guyana'),(93,'HT','Haiti'),(94,'HM','Heard and Mc Donald Islands'),(95,'HN','Honduras'),(96,'HK','Hong Kong'),(97,'HU','Hungary'),(98,'IS','Iceland'),(99,'IN','India'),(100,'IM','Isle of Man'),(101,'ID','Indonesia'),(102,'IR','Iran (Islamic Republic of)'),(103,'IQ','Iraq'),(104,'IE','Ireland'),(105,'IL','Israel'),(106,'IT','Italy'),(107,'CI','Ivory Coast'),(108,'JE','Jersey'),(109,'JM','Jamaica'),(110,'JP','Japan'),(111,'JO','Jordan'),(112,'KZ','Kazakhstan'),(113,'KE','Kenya'),(114,'KI','Kiribati'),(115,'KP','Korea, Democratic People\'s Republic of'),(116,'KR','Korea, Republic of'),(117,'XK','Kosovo'),(118,'KW','Kuwait'),(119,'KG','Kyrgyzstan'),(120,'LA','Lao People\'s Democratic Republic'),(121,'LV','Latvia'),(122,'LB','Lebanon'),(123,'LS','Lesotho'),(124,'LR','Liberia'),(125,'LY','Libyan Arab Jamahiriya'),(126,'LI','Liechtenstein'),(127,'LT','Lithuania'),(128,'LU','Luxembourg'),(129,'MO','Macau'),(130,'MK','Macedonia'),(131,'MG','Madagascar'),(132,'MW','Malawi'),(133,'MY','Malaysia'),(134,'MV','Maldives'),(135,'ML','Mali'),(136,'MT','Malta'),(137,'MH','Marshall Islands'),(138,'MQ','Martinique'),(139,'MR','Mauritania'),(140,'MU','Mauritius'),(141,'TY','Mayotte'),(142,'MX','Mexico'),(143,'FM','Micronesia, Federated States of'),(144,'MD','Moldova, Republic of'),(145,'MC','Monaco'),(146,'MN','Mongolia'),(147,'ME','Montenegro'),(148,'MS','Montserrat'),(149,'MA','Morocco'),(150,'MZ','Mozambique'),(151,'MM','Myanmar'),(152,'NA','Namibia'),(153,'NR','Nauru'),(154,'NP','Nepal'),(155,'NL','Netherlands'),(156,'AN','Netherlands Antilles'),(157,'NC','New Caledonia'),(158,'NZ','New Zealand'),(159,'NI','Nicaragua'),(160,'NE','Niger'),(161,'NG','Nigeria'),(162,'NU','Niue'),(163,'NF','Norfolk Island'),(164,'MP','Northern Mariana Islands'),(165,'NO','Norway'),(166,'OM','Oman'),(167,'PK','Pakistan'),(168,'PW','Palau'),(169,'PS','Palestine'),(170,'PA','Panama'),(171,'PG','Papua New Guinea'),(172,'PY','Paraguay'),(173,'PE','Peru'),(174,'PH','Philippines'),(175,'PN','Pitcairn'),(176,'PL','Poland'),(177,'PT','Portugal'),(178,'PR','Puerto Rico'),(179,'QA','Qatar'),(180,'RE','Reunion'),(181,'RO','Romania'),(182,'RU','Russian Federation'),(183,'RW','Rwanda'),(184,'KN','Saint Kitts and Nevis'),(185,'LC','Saint Lucia'),(186,'VC','Saint Vincent and the Grenadines'),(187,'WS','Samoa'),(188,'SM','San Marino'),(189,'ST','Sao Tome and Principe'),(190,'SA','Saudi Arabia'),(191,'SN','Senegal'),(192,'RS','Serbia'),(193,'SC','Seychelles'),(194,'SL','Sierra Leone'),(195,'SG','Singapore'),(196,'SK','Slovakia'),(197,'SI','Slovenia'),(198,'SB','Solomon Islands'),(199,'SO','Somalia'),(200,'ZA','South Africa'),(201,'GS','South Georgia South Sandwich Islands'),(202,'ES','Spain'),(203,'LK','Sri Lanka'),(204,'SH','St. Helena'),(205,'PM','St. Pierre and Miquelon'),(206,'SD','Sudan'),(207,'SR','Suriname'),(208,'SJ','Svalbard and Jan Mayen Islands'),(209,'SZ','Swaziland'),(210,'SE','Sweden'),(211,'CH','Switzerland'),(212,'SY','Syrian Arab Republic'),(213,'TW','Taiwan'),(214,'TJ','Tajikistan'),(215,'TZ','Tanzania, United Republic of'),(216,'TH','Thailand'),(217,'TG','Togo'),(218,'TK','Tokelau'),(219,'TO','Tonga'),(220,'TT','Trinidad and Tobago'),(221,'TN','Tunisia'),(222,'TR','Turkey'),(223,'TM','Turkmenistan'),(224,'TC','Turks and Caicos Islands'),(225,'TV','Tuvalu'),(226,'UG','Uganda'),(227,'UA','Ukraine'),(228,'AE','United Arab Emirates'),(229,'GB','United Kingdom'),(230,'US','United States'),(231,'UM','United States minor outlying islands'),(232,'UY','Uruguay'),(233,'UZ','Uzbekistan'),(234,'VU','Vanuatu'),(235,'VA','Vatican City State'),(236,'VE','Venezuela'),(237,'VN','Vietnam'),(238,'VG','Virgin Islands (British)'),(239,'VI','Virgin Islands (U.S.)'),(240,'WF','Wallis and Futuna Islands'),(241,'EH','Western Sahara'),(242,'YE','Yemen'),(243,'YU','Yugoslavia'),(244,'ZR','Zaire'),(245,'ZM','Zambia'),(246,'ZW','Zimbabwe');
/*!40000 ALTER TABLE `omh_country` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omh_description`
--

LOCK TABLES `omh_description` WRITE;
/*!40000 ALTER TABLE `omh_description` DISABLE KEYS */;
INSERT INTO `omh_description` VALUES (1,1,'Title 1','Description 1'),(2,1,'Title 2','Description 2'),(3,1,'Title 3','Description 3'),(4,2,'Title 1','Description 1'),(5,2,'Title 2','Description 2'),(6,2,'Title 3','Description 3'),(7,3,'Title 1','Description 1'),(8,3,'Title 2','Description 2'),(9,3,'Title 3','Description 3'),(10,4,'Title 1','Description 1'),(11,4,'Title 2','Description 2'),(12,4,'Title 3','Description 3'),(13,5,'Title 1','Description 1'),(14,5,'Title 2','Description 2'),(15,5,'Title 3','Description 3'),(16,6,'Title 1','Description 1'),(17,6,'Title 2','Description 2'),(18,6,'Title 3','Description 3'),(19,7,'Title 1','Description 1'),(20,7,'Title 2','Description 2'),(21,7,'Title 3','Description 3'),(22,8,'Title 1','Description 1'),(23,8,'Title 2','Description 2'),(24,8,'Title 3','Description 3'),(25,9,'Title 1','Description 1'),(26,9,'Title 2','Description 2'),(27,9,'Title 3','Description 3'),(28,10,'Title 1','Description 1'),(29,10,'Title 2','Description 2'),(30,10,'Title 3','Description 3');
/*!40000 ALTER TABLE `omh_description` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omh_ingredient`
--

LOCK TABLES `omh_ingredient` WRITE;
/*!40000 ALTER TABLE `omh_ingredient` DISABLE KEYS */;
INSERT INTO `omh_ingredient` VALUES (1,'Ingredient 1'),(2,'Ingredient 2'),(3,'Ingredient 3'),(4,'Ingredient 4'),(5,'Ingredient 5'),(6,'Ingredient 6'),(7,'Ingredient 7'),(8,'Ingredient 8'),(9,'Ingredient 9'),(10,'Ingredient 10');
/*!40000 ALTER TABLE `omh_ingredient` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omh_medicine`
--

LOCK TABLES `omh_medicine` WRITE;
/*!40000 ALTER TABLE `omh_medicine` DISABLE KEYS */;
INSERT INTO `omh_medicine` VALUES (1,230,1,'Medicine 1'),(2,230,2,'Medicine 2'),(3,230,3,'Medicine 3'),(4,230,1,'Medicine 4'),(5,230,2,'Medicine 5'),(6,230,3,'Medicine 6'),(7,230,1,'Medicine 7'),(8,230,2,'Medicine 8'),(9,230,3,'Medicine 9'),(10,230,1,'Medicine 10');
/*!40000 ALTER TABLE `omh_medicine` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omh_medicine_ingredient`
--

LOCK TABLES `omh_medicine_ingredient` WRITE;
/*!40000 ALTER TABLE `omh_medicine_ingredient` DISABLE KEYS */;
INSERT INTO `omh_medicine_ingredient` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,10),(5,2,2),(6,2,3),(7,2,6),(8,2,7),(9,2,8),(10,3,9),(11,3,10),(12,4,1),(13,4,2),(14,4,3),(15,4,5),(16,4,7),(17,4,9),(18,4,10),(19,5,2),(20,5,3),(21,5,4),(22,5,5),(23,6,1),(24,6,2),(25,6,3),(26,6,4),(27,6,7),(28,6,8),(29,7,2),(30,7,3),(31,7,4),(32,7,7),(33,7,8),(34,7,9),(35,7,10),(36,8,1),(37,8,2),(38,8,4),(39,8,5),(40,8,6),(41,8,7),(42,8,8),(43,8,9),(44,9,3),(45,9,9),(46,10,2),(47,10,4),(48,10,6),(49,10,8),(50,10,10);
/*!40000 ALTER TABLE `omh_medicine_ingredient` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `user_drug`
--

LOCK TABLES `user_drug` WRITE;
/*!40000 ALTER TABLE `user_drug` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_drug` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `user_interaction`
--

LOCK TABLES `user_interaction` WRITE;
/*!40000 ALTER TABLE `user_interaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_interaction` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `user_match`
--

LOCK TABLES `user_match` WRITE;
/*!40000 ALTER TABLE `user_match` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wada_ingredients`
--

DROP TABLE IF EXISTS `wada_ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wada_ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredients_id` int(11) DEFAULT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prohibited_in` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `top_level_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_level1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_level2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_level3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1DFDF8053EC4DCE` (`ingredients_id`),
  CONSTRAINT `FK_1DFDF8053EC4DCE` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wada_ingredients`
--

LOCK TABLES `wada_ingredients` WRITE;
/*!40000 ALTER TABLE `wada_ingredients` DISABLE KEYS */;
/*!40000 ALTER TABLE `wada_ingredients` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-19  1:22:44
