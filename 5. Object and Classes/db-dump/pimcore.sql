-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pimcore
-- ------------------------------------------------------
-- Server version	5.7.29

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
-- Table structure for table `application_logs`
--

DROP TABLE IF EXISTS `application_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `timestamp` datetime NOT NULL,
  `message` text,
  `priority` enum('emergency','alert','critical','error','warning','notice','info','debug') DEFAULT NULL,
  `fileobject` varchar(1024) DEFAULT NULL,
  `info` varchar(1024) DEFAULT NULL,
  `component` varchar(190) DEFAULT NULL,
  `source` varchar(190) DEFAULT NULL,
  `relatedobject` int(11) unsigned DEFAULT NULL,
  `relatedobjecttype` enum('object','document','asset') DEFAULT NULL,
  `maintenanceChecked` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `component` (`component`),
  KEY `timestamp` (`timestamp`),
  KEY `relatedobject` (`relatedobject`),
  KEY `priority` (`priority`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_logs`
--

LOCK TABLES `application_logs` WRITE;
/*!40000 ALTER TABLE `application_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(11) unsigned DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '',
  `path` varchar(765) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `mimetype` varchar(190) DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  `userOwner` int(11) unsigned DEFAULT NULL,
  `userModification` int(11) unsigned DEFAULT NULL,
  `customSettings` longtext,
  `hasMetaData` tinyint(1) NOT NULL DEFAULT '0',
  `versionCount` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fullpath` (`path`,`filename`),
  KEY `parentId` (`parentId`),
  KEY `filename` (`filename`),
  KEY `modificationDate` (`modificationDate`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets`
--

LOCK TABLES `assets` WRITE;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
INSERT INTO `assets` VALUES (1,0,'folder','','/',NULL,1593614087,1593614087,1,1,NULL,0,0);
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets_metadata`
--

DROP TABLE IF EXISTS `assets_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assets_metadata` (
  `cid` int(11) NOT NULL,
  `name` varchar(190) NOT NULL,
  `language` varchar(10) CHARACTER SET ascii NOT NULL DEFAULT '',
  `type` enum('input','textarea','asset','document','object','date','select','checkbox') DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`cid`,`name`,`language`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets_metadata`
--

LOCK TABLES `assets_metadata` WRITE;
/*!40000 ALTER TABLE `assets_metadata` DISABLE KEYS */;
/*!40000 ALTER TABLE `assets_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `id` varchar(165) CHARACTER SET ascii NOT NULL DEFAULT '',
  `data` longblob,
  `mtime` int(11) unsigned DEFAULT NULL,
  `expire` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cache_tags`
--

DROP TABLE IF EXISTS `cache_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_tags` (
  `id` varchar(165) NOT NULL DEFAULT '',
  `tag` varchar(165) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`tag`),
  KEY `tag` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `id` varchar(50) NOT NULL,
  `name` varchar(190) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES ('CAT','Category'),('PROD','Product');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classificationstore_collectionrelations`
--

DROP TABLE IF EXISTS `classificationstore_collectionrelations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classificationstore_collectionrelations` (
  `colId` int(11) unsigned NOT NULL,
  `groupId` int(11) unsigned NOT NULL,
  `sorter` int(10) DEFAULT '0',
  PRIMARY KEY (`colId`,`groupId`),
  KEY `FK_classificationstore_collectionrelations_groups` (`groupId`),
  CONSTRAINT `FK_classificationstore_collectionrelations_groups` FOREIGN KEY (`groupId`) REFERENCES `classificationstore_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classificationstore_collectionrelations`
--

LOCK TABLES `classificationstore_collectionrelations` WRITE;
/*!40000 ALTER TABLE `classificationstore_collectionrelations` DISABLE KEYS */;
/*!40000 ALTER TABLE `classificationstore_collectionrelations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classificationstore_collections`
--

DROP TABLE IF EXISTS `classificationstore_collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classificationstore_collections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `storeId` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT '0',
  `modificationDate` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `storeId` (`storeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classificationstore_collections`
--

LOCK TABLES `classificationstore_collections` WRITE;
/*!40000 ALTER TABLE `classificationstore_collections` DISABLE KEYS */;
/*!40000 ALTER TABLE `classificationstore_collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classificationstore_groups`
--

DROP TABLE IF EXISTS `classificationstore_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classificationstore_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `storeId` int(11) DEFAULT NULL,
  `parentId` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(190) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT '0',
  `modificationDate` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `storeId` (`storeId`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classificationstore_groups`
--

LOCK TABLES `classificationstore_groups` WRITE;
/*!40000 ALTER TABLE `classificationstore_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `classificationstore_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classificationstore_keys`
--

DROP TABLE IF EXISTS `classificationstore_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classificationstore_keys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `storeId` int(11) DEFAULT NULL,
  `name` varchar(190) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `type` varchar(190) DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT '0',
  `modificationDate` int(11) unsigned DEFAULT '0',
  `definition` longtext,
  `enabled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `enabled` (`enabled`),
  KEY `type` (`type`),
  KEY `storeId` (`storeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `classificationstore_relations`
--

DROP TABLE IF EXISTS `classificationstore_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classificationstore_relations` (
  `groupId` int(11) unsigned NOT NULL,
  `keyId` int(11) unsigned NOT NULL,
  `sorter` int(11) DEFAULT NULL,
  `mandatory` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`groupId`,`keyId`),
  KEY `FK_classificationstore_relations_classificationstore_keys` (`keyId`),
  KEY `mandatory` (`mandatory`),
  CONSTRAINT `FK_classificationstore_relations_classificationstore_groups` FOREIGN KEY (`groupId`) REFERENCES `classificationstore_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_classificationstore_relations_classificationstore_keys` FOREIGN KEY (`keyId`) REFERENCES `classificationstore_keys` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classificationstore_relations`
--

LOCK TABLES `classificationstore_relations` WRITE;
/*!40000 ALTER TABLE `classificationstore_relations` DISABLE KEYS */;
/*!40000 ALTER TABLE `classificationstore_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classificationstore_stores`
--

DROP TABLE IF EXISTS `classificationstore_stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classificationstore_stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(190) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classificationstore_stores`
--

LOCK TABLES `classificationstore_stores` WRITE;
/*!40000 ALTER TABLE `classificationstore_stores` DISABLE KEYS */;
/*!40000 ALTER TABLE `classificationstore_stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_layouts`
--

DROP TABLE IF EXISTS `custom_layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custom_layouts` (
  `id` varchar(64) NOT NULL,
  `classId` varchar(50) NOT NULL,
  `name` varchar(190) DEFAULT NULL,
  `description` text,
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  `userOwner` int(11) unsigned DEFAULT NULL,
  `userModification` int(11) unsigned DEFAULT NULL,
  `default` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`classId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_layouts`
--

LOCK TABLES `custom_layouts` WRITE;
/*!40000 ALTER TABLE `custom_layouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `custom_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependencies`
--

DROP TABLE IF EXISTS `dependencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependencies` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sourcetype` enum('document','asset','object') NOT NULL DEFAULT 'document',
  `sourceid` int(11) unsigned NOT NULL DEFAULT '0',
  `targettype` enum('document','asset','object') NOT NULL DEFAULT 'document',
  `targetid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `combi` (`sourcetype`,`sourceid`,`targettype`,`targetid`),
  KEY `targettype_targetid` (`targettype`,`targetid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependencies`
--

LOCK TABLES `dependencies` WRITE;
/*!40000 ALTER TABLE `dependencies` DISABLE KEYS */;
INSERT INTO `dependencies` VALUES (1,'object',3,'object',5),(2,'object',3,'object',6);
/*!40000 ALTER TABLE `dependencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(11) unsigned DEFAULT NULL,
  `type` enum('page','link','snippet','folder','hardlink','email','newsletter','printpage','printcontainer') DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '',
  `path` varchar(765) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `index` int(11) unsigned DEFAULT '0',
  `published` tinyint(1) unsigned DEFAULT '1',
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  `userOwner` int(11) unsigned DEFAULT NULL,
  `userModification` int(11) unsigned DEFAULT NULL,
  `versionCount` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fullpath` (`path`,`key`),
  KEY `parentId` (`parentId`),
  KEY `key` (`key`),
  KEY `published` (`published`),
  KEY `modificationDate` (`modificationDate`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (1,0,'page','','/',999999,1,1593614087,1593614087,1,1,0);
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents_elements`
--

DROP TABLE IF EXISTS `documents_elements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents_elements` (
  `documentId` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(750) CHARACTER SET ascii NOT NULL DEFAULT '',
  `type` varchar(50) DEFAULT NULL,
  `data` longtext,
  PRIMARY KEY (`documentId`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents_elements`
--

LOCK TABLES `documents_elements` WRITE;
/*!40000 ALTER TABLE `documents_elements` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents_elements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents_email`
--

DROP TABLE IF EXISTS `documents_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents_email` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `module` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `replyTo` varchar(255) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `bcc` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `missingRequiredEditable` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents_email`
--

LOCK TABLES `documents_email` WRITE;
/*!40000 ALTER TABLE `documents_email` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents_hardlink`
--

DROP TABLE IF EXISTS `documents_hardlink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents_hardlink` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `sourceId` int(11) DEFAULT NULL,
  `propertiesFromSource` tinyint(1) DEFAULT NULL,
  `childrenFromSource` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceId` (`sourceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents_hardlink`
--

LOCK TABLES `documents_hardlink` WRITE;
/*!40000 ALTER TABLE `documents_hardlink` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents_hardlink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents_link`
--

DROP TABLE IF EXISTS `documents_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents_link` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `internalType` enum('document','asset','object') DEFAULT NULL,
  `internal` int(11) unsigned DEFAULT NULL,
  `direct` varchar(1000) DEFAULT NULL,
  `linktype` enum('direct','internal') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents_link`
--

LOCK TABLES `documents_link` WRITE;
/*!40000 ALTER TABLE `documents_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents_newsletter`
--

DROP TABLE IF EXISTS `documents_newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents_newsletter` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `module` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `trackingParameterSource` varchar(255) DEFAULT NULL,
  `trackingParameterMedium` varchar(255) DEFAULT NULL,
  `trackingParameterName` varchar(255) DEFAULT NULL,
  `enableTrackingParameters` tinyint(1) unsigned DEFAULT NULL,
  `sendingMode` varchar(20) DEFAULT NULL,
  `plaintext` longtext,
  `missingRequiredEditable` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents_newsletter`
--

LOCK TABLES `documents_newsletter` WRITE;
/*!40000 ALTER TABLE `documents_newsletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents_newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents_page`
--

DROP TABLE IF EXISTS `documents_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents_page` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `module` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(383) DEFAULT NULL,
  `metaData` text,
  `prettyUrl` varchar(190) DEFAULT NULL,
  `contentMasterDocumentId` int(11) DEFAULT NULL,
  `targetGroupIds` varchar(255) DEFAULT NULL,
  `missingRequiredEditable` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prettyUrl` (`prettyUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents_page`
--

LOCK TABLES `documents_page` WRITE;
/*!40000 ALTER TABLE `documents_page` DISABLE KEYS */;
INSERT INTO `documents_page` VALUES (1,NULL,'default','default','','','',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `documents_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents_printpage`
--

DROP TABLE IF EXISTS `documents_printpage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents_printpage` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `module` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `lastGenerated` int(11) DEFAULT NULL,
  `lastGenerateMessage` text,
  `contentMasterDocumentId` int(11) DEFAULT NULL,
  `missingRequiredEditable` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents_printpage`
--

LOCK TABLES `documents_printpage` WRITE;
/*!40000 ALTER TABLE `documents_printpage` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents_printpage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents_snippet`
--

DROP TABLE IF EXISTS `documents_snippet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents_snippet` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `module` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `contentMasterDocumentId` int(11) DEFAULT NULL,
  `missingRequiredEditable` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents_snippet`
--

LOCK TABLES `documents_snippet` WRITE;
/*!40000 ALTER TABLE `documents_snippet` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents_snippet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents_translations`
--

DROP TABLE IF EXISTS `documents_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents_translations` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `sourceId` int(11) unsigned NOT NULL DEFAULT '0',
  `language` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`sourceId`,`language`),
  KEY `id` (`id`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents_translations`
--

LOCK TABLES `documents_translations` WRITE;
/*!40000 ALTER TABLE `documents_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edit_lock`
--

DROP TABLE IF EXISTS `edit_lock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit_lock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) unsigned NOT NULL DEFAULT '0',
  `ctype` enum('document','asset','object') DEFAULT NULL,
  `userId` int(11) unsigned NOT NULL DEFAULT '0',
  `sessionId` varchar(255) DEFAULT NULL,
  `date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ctype` (`ctype`),
  KEY `cidtype` (`cid`,`ctype`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `element_workflow_state`
--

DROP TABLE IF EXISTS `element_workflow_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `element_workflow_state` (
  `cid` int(10) NOT NULL DEFAULT '0',
  `ctype` enum('document','asset','object') NOT NULL,
  `place` varchar(255) DEFAULT NULL,
  `workflow` varchar(100) NOT NULL,
  PRIMARY KEY (`cid`,`ctype`,`workflow`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `element_workflow_state`
--

LOCK TABLES `element_workflow_state` WRITE;
/*!40000 ALTER TABLE `element_workflow_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `element_workflow_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_blacklist`
--

DROP TABLE IF EXISTS `email_blacklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_blacklist` (
  `address` varchar(190) NOT NULL DEFAULT '',
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_blacklist`
--

LOCK TABLES `email_blacklist` WRITE;
/*!40000 ALTER TABLE `email_blacklist` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_blacklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_log`
--

DROP TABLE IF EXISTS `email_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `documentId` int(11) DEFAULT NULL,
  `requestUri` varchar(500) DEFAULT NULL,
  `params` text,
  `from` varchar(500) DEFAULT NULL,
  `replyTo` varchar(255) DEFAULT NULL,
  `to` longtext,
  `cc` longtext,
  `bcc` longtext,
  `sentDate` int(11) unsigned DEFAULT NULL,
  `subject` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sentDate` (`sentDate`,`id`),
  FULLTEXT KEY `fulltext` (`from`,`to`,`cc`,`bcc`,`subject`,`params`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_log`
--

LOCK TABLES `email_log` WRITE;
/*!40000 ALTER TABLE `email_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `glossary`
--

DROP TABLE IF EXISTS `glossary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `glossary` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(10) DEFAULT NULL,
  `casesensitive` tinyint(1) DEFAULT NULL,
  `exactmatch` tinyint(1) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `abbr` varchar(255) DEFAULT NULL,
  `acronym` varchar(255) DEFAULT NULL,
  `site` int(11) unsigned DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT '0',
  `modificationDate` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `language` (`language`),
  KEY `site` (`site`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `glossary`
--

LOCK TABLES `glossary` WRITE;
/*!40000 ALTER TABLE `glossary` DISABLE KEYS */;
/*!40000 ALTER TABLE `glossary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gridconfig_favourites`
--

DROP TABLE IF EXISTS `gridconfig_favourites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gridconfig_favourites` (
  `ownerId` int(11) NOT NULL,
  `classId` varchar(50) NOT NULL,
  `objectId` int(11) NOT NULL DEFAULT '0',
  `gridConfigId` int(11) DEFAULT NULL,
  `searchType` varchar(50) NOT NULL DEFAULT '',
  `type` enum('asset','object') NOT NULL DEFAULT 'object',
  PRIMARY KEY (`ownerId`,`classId`,`searchType`,`objectId`),
  KEY `classId` (`classId`),
  KEY `searchType` (`searchType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gridconfig_favourites`
--

LOCK TABLES `gridconfig_favourites` WRITE;
/*!40000 ALTER TABLE `gridconfig_favourites` DISABLE KEYS */;
/*!40000 ALTER TABLE `gridconfig_favourites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gridconfig_shares`
--

DROP TABLE IF EXISTS `gridconfig_shares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gridconfig_shares` (
  `gridConfigId` int(11) NOT NULL,
  `sharedWithUserId` int(11) NOT NULL,
  PRIMARY KEY (`gridConfigId`,`sharedWithUserId`),
  KEY `sharedWithUserId` (`sharedWithUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gridconfig_shares`
--

LOCK TABLES `gridconfig_shares` WRITE;
/*!40000 ALTER TABLE `gridconfig_shares` DISABLE KEYS */;
/*!40000 ALTER TABLE `gridconfig_shares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gridconfigs`
--

DROP TABLE IF EXISTS `gridconfigs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gridconfigs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerId` int(11) DEFAULT NULL,
  `classId` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `searchType` varchar(50) DEFAULT NULL,
  `type` enum('asset','object') NOT NULL DEFAULT 'object',
  `config` longtext,
  `description` longtext,
  `creationDate` int(11) DEFAULT NULL,
  `modificationDate` int(11) DEFAULT NULL,
  `shareGlobally` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  KEY `classId` (`classId`),
  KEY `searchType` (`searchType`),
  KEY `shareGlobally` (`shareGlobally`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gridconfigs`
--

LOCK TABLES `gridconfigs` WRITE;
/*!40000 ALTER TABLE `gridconfigs` DISABLE KEYS */;
/*!40000 ALTER TABLE `gridconfigs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `http_error_log`
--

DROP TABLE IF EXISTS `http_error_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `http_error_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uri` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `code` int(3) DEFAULT NULL,
  `parametersGet` longtext,
  `parametersPost` longtext,
  `cookies` longtext,
  `serverVars` longtext,
  `date` int(11) unsigned DEFAULT NULL,
  `count` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uri` (`uri`),
  KEY `code` (`code`),
  KEY `date` (`date`),
  KEY `count` (`count`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `importconfig_shares`
--

DROP TABLE IF EXISTS `importconfig_shares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `importconfig_shares` (
  `importConfigId` int(11) NOT NULL,
  `sharedWithUserId` int(11) NOT NULL,
  PRIMARY KEY (`importConfigId`,`sharedWithUserId`),
  KEY `sharedWithUserId` (`sharedWithUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `importconfig_shares`
--

LOCK TABLES `importconfig_shares` WRITE;
/*!40000 ALTER TABLE `importconfig_shares` DISABLE KEYS */;
/*!40000 ALTER TABLE `importconfig_shares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `importconfigs`
--

DROP TABLE IF EXISTS `importconfigs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `importconfigs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerId` int(11) DEFAULT NULL,
  `classId` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `config` longtext,
  `description` longtext,
  `creationDate` int(11) DEFAULT NULL,
  `modificationDate` int(11) DEFAULT NULL,
  `shareGlobally` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  KEY `classId` (`classId`),
  KEY `shareGlobally` (`shareGlobally`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `importconfigs`
--

LOCK TABLES `importconfigs` WRITE;
/*!40000 ALTER TABLE `importconfigs` DISABLE KEYS */;
/*!40000 ALTER TABLE `importconfigs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locks`
--

DROP TABLE IF EXISTS `locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locks` (
  `id` varchar(150) NOT NULL DEFAULT '',
  `date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locks`
--

LOCK TABLES `locks` WRITE;
/*!40000 ALTER TABLE `locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `ctype` enum('asset','document','object') DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`),
  KEY `cid_ctype` (`cid`,`ctype`),
  KEY `date` (`date`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notes_data`
--

DROP TABLE IF EXISTS `notes_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes_data` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `type` enum('text','date','document','asset','object','bool') DEFAULT NULL,
  `data` text,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes_data`
--

LOCK TABLES `notes_data` WRITE;
/*!40000 ALTER TABLE `notes_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL DEFAULT 'info',
  `title` varchar(250) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sender` int(11) DEFAULT NULL,
  `recipient` int(11) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificationDate` timestamp NULL DEFAULT NULL,
  `linkedElementType` enum('document','asset','object') DEFAULT NULL,
  `linkedElement` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recipient` (`recipient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `object_CAT`
--

DROP TABLE IF EXISTS `object_CAT`;
/*!50001 DROP VIEW IF EXISTS `object_CAT`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `object_CAT` AS SELECT 
 1 AS `oo_id`,
 1 AS `oo_classId`,
 1 AS `oo_className`,
 1 AS `products`,
 1 AS `name`,
 1 AS `code`,
 1 AS `o_id`,
 1 AS `o_parentId`,
 1 AS `o_type`,
 1 AS `o_key`,
 1 AS `o_path`,
 1 AS `o_index`,
 1 AS `o_published`,
 1 AS `o_creationDate`,
 1 AS `o_modificationDate`,
 1 AS `o_userOwner`,
 1 AS `o_userModification`,
 1 AS `o_classId`,
 1 AS `o_className`,
 1 AS `o_childrenSortBy`,
 1 AS `o_versionCount`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `object_PROD`
--

DROP TABLE IF EXISTS `object_PROD`;
/*!50001 DROP VIEW IF EXISTS `object_PROD`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `object_PROD` AS SELECT 
 1 AS `oo_id`,
 1 AS `oo_classId`,
 1 AS `oo_className`,
 1 AS `categories`,
 1 AS `title`,
 1 AS `o_id`,
 1 AS `o_parentId`,
 1 AS `o_type`,
 1 AS `o_key`,
 1 AS `o_path`,
 1 AS `o_index`,
 1 AS `o_published`,
 1 AS `o_creationDate`,
 1 AS `o_modificationDate`,
 1 AS `o_userOwner`,
 1 AS `o_userModification`,
 1 AS `o_classId`,
 1 AS `o_className`,
 1 AS `o_childrenSortBy`,
 1 AS `o_versionCount`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `object_classificationstore_data_PROD`
--

DROP TABLE IF EXISTS `object_classificationstore_data_PROD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_classificationstore_data_PROD` (
  `o_id` bigint(20) NOT NULL,
  `collectionId` bigint(20) DEFAULT NULL,
  `groupId` bigint(20) NOT NULL,
  `keyId` bigint(20) NOT NULL,
  `value` longtext,
  `value2` longtext,
  `fieldname` varchar(70) NOT NULL,
  `language` varchar(10) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`o_id`,`fieldname`,`groupId`,`keyId`,`language`),
  KEY `keyId` (`keyId`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_classificationstore_data_PROD`
--

LOCK TABLES `object_classificationstore_data_PROD` WRITE;
/*!40000 ALTER TABLE `object_classificationstore_data_PROD` DISABLE KEYS */;
/*!40000 ALTER TABLE `object_classificationstore_data_PROD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_classificationstore_groups_PROD`
--

DROP TABLE IF EXISTS `object_classificationstore_groups_PROD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_classificationstore_groups_PROD` (
  `o_id` bigint(20) NOT NULL,
  `groupId` bigint(20) NOT NULL,
  `fieldname` varchar(70) NOT NULL,
  PRIMARY KEY (`o_id`,`fieldname`,`groupId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_classificationstore_groups_PROD`
--

LOCK TABLES `object_classificationstore_groups_PROD` WRITE;
/*!40000 ALTER TABLE `object_classificationstore_groups_PROD` DISABLE KEYS */;
/*!40000 ALTER TABLE `object_classificationstore_groups_PROD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `object_localized_PROD_el_GR`
--

DROP TABLE IF EXISTS `object_localized_PROD_el_GR`;
/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_el_GR`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `object_localized_PROD_el_GR` AS SELECT 
 1 AS `oo_id`,
 1 AS `oo_classId`,
 1 AS `oo_className`,
 1 AS `o_id`,
 1 AS `o_parentId`,
 1 AS `o_type`,
 1 AS `o_key`,
 1 AS `o_path`,
 1 AS `o_index`,
 1 AS `o_published`,
 1 AS `o_creationDate`,
 1 AS `o_modificationDate`,
 1 AS `o_userOwner`,
 1 AS `o_userModification`,
 1 AS `o_classId`,
 1 AS `o_className`,
 1 AS `o_childrenSortBy`,
 1 AS `o_versionCount`,
 1 AS `ooo_id`,
 1 AS `language`,
 1 AS `title`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `object_localized_PROD_en`
--

DROP TABLE IF EXISTS `object_localized_PROD_en`;
/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_en`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `object_localized_PROD_en` AS SELECT 
 1 AS `oo_id`,
 1 AS `oo_classId`,
 1 AS `oo_className`,
 1 AS `o_id`,
 1 AS `o_parentId`,
 1 AS `o_type`,
 1 AS `o_key`,
 1 AS `o_path`,
 1 AS `o_index`,
 1 AS `o_published`,
 1 AS `o_creationDate`,
 1 AS `o_modificationDate`,
 1 AS `o_userOwner`,
 1 AS `o_userModification`,
 1 AS `o_classId`,
 1 AS `o_className`,
 1 AS `o_childrenSortBy`,
 1 AS `o_versionCount`,
 1 AS `ooo_id`,
 1 AS `language`,
 1 AS `title`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `object_localized_PROD_es`
--

DROP TABLE IF EXISTS `object_localized_PROD_es`;
/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_es`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `object_localized_PROD_es` AS SELECT 
 1 AS `oo_id`,
 1 AS `oo_classId`,
 1 AS `oo_className`,
 1 AS `o_id`,
 1 AS `o_parentId`,
 1 AS `o_type`,
 1 AS `o_key`,
 1 AS `o_path`,
 1 AS `o_index`,
 1 AS `o_published`,
 1 AS `o_creationDate`,
 1 AS `o_modificationDate`,
 1 AS `o_userOwner`,
 1 AS `o_userModification`,
 1 AS `o_classId`,
 1 AS `o_className`,
 1 AS `o_childrenSortBy`,
 1 AS `o_versionCount`,
 1 AS `ooo_id`,
 1 AS `language`,
 1 AS `title`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `object_localized_PROD_fr`
--

DROP TABLE IF EXISTS `object_localized_PROD_fr`;
/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_fr`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `object_localized_PROD_fr` AS SELECT 
 1 AS `oo_id`,
 1 AS `oo_classId`,
 1 AS `oo_className`,
 1 AS `o_id`,
 1 AS `o_parentId`,
 1 AS `o_type`,
 1 AS `o_key`,
 1 AS `o_path`,
 1 AS `o_index`,
 1 AS `o_published`,
 1 AS `o_creationDate`,
 1 AS `o_modificationDate`,
 1 AS `o_userOwner`,
 1 AS `o_userModification`,
 1 AS `o_classId`,
 1 AS `o_className`,
 1 AS `o_childrenSortBy`,
 1 AS `o_versionCount`,
 1 AS `ooo_id`,
 1 AS `language`,
 1 AS `title`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `object_localized_PROD_it`
--

DROP TABLE IF EXISTS `object_localized_PROD_it`;
/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_it`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `object_localized_PROD_it` AS SELECT 
 1 AS `oo_id`,
 1 AS `oo_classId`,
 1 AS `oo_className`,
 1 AS `o_id`,
 1 AS `o_parentId`,
 1 AS `o_type`,
 1 AS `o_key`,
 1 AS `o_path`,
 1 AS `o_index`,
 1 AS `o_published`,
 1 AS `o_creationDate`,
 1 AS `o_modificationDate`,
 1 AS `o_userOwner`,
 1 AS `o_userModification`,
 1 AS `o_classId`,
 1 AS `o_className`,
 1 AS `o_childrenSortBy`,
 1 AS `o_versionCount`,
 1 AS `ooo_id`,
 1 AS `language`,
 1 AS `title`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `object_localized_PROD_pl`
--

DROP TABLE IF EXISTS `object_localized_PROD_pl`;
/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_pl`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `object_localized_PROD_pl` AS SELECT 
 1 AS `oo_id`,
 1 AS `oo_classId`,
 1 AS `oo_className`,
 1 AS `o_id`,
 1 AS `o_parentId`,
 1 AS `o_type`,
 1 AS `o_key`,
 1 AS `o_path`,
 1 AS `o_index`,
 1 AS `o_published`,
 1 AS `o_creationDate`,
 1 AS `o_modificationDate`,
 1 AS `o_userOwner`,
 1 AS `o_userModification`,
 1 AS `o_classId`,
 1 AS `o_className`,
 1 AS `o_childrenSortBy`,
 1 AS `o_versionCount`,
 1 AS `ooo_id`,
 1 AS `language`,
 1 AS `title`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `object_localized_PROD_pt`
--

DROP TABLE IF EXISTS `object_localized_PROD_pt`;
/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_pt`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `object_localized_PROD_pt` AS SELECT 
 1 AS `oo_id`,
 1 AS `oo_classId`,
 1 AS `oo_className`,
 1 AS `o_id`,
 1 AS `o_parentId`,
 1 AS `o_type`,
 1 AS `o_key`,
 1 AS `o_path`,
 1 AS `o_index`,
 1 AS `o_published`,
 1 AS `o_creationDate`,
 1 AS `o_modificationDate`,
 1 AS `o_userOwner`,
 1 AS `o_userModification`,
 1 AS `o_classId`,
 1 AS `o_className`,
 1 AS `o_childrenSortBy`,
 1 AS `o_versionCount`,
 1 AS `ooo_id`,
 1 AS `language`,
 1 AS `title`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `object_localized_data_PROD`
--

DROP TABLE IF EXISTS `object_localized_data_PROD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_localized_data_PROD` (
  `ooo_id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(190) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_localized_data_PROD`
--

LOCK TABLES `object_localized_data_PROD` WRITE;
/*!40000 ALTER TABLE `object_localized_data_PROD` DISABLE KEYS */;
INSERT INTO `object_localized_data_PROD` VALUES (3,'el_GR',NULL,NULL),(3,'en','My English Title','My English Description\n'),(3,'es',NULL,NULL),(3,'fr',NULL,NULL),(3,'it',NULL,NULL),(3,'pl',NULL,NULL),(3,'pt',NULL,NULL);
/*!40000 ALTER TABLE `object_localized_data_PROD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_localized_query_PROD_el_GR`
--

DROP TABLE IF EXISTS `object_localized_query_PROD_el_GR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_localized_query_PROD_el_GR` (
  `ooo_id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(190) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_localized_query_PROD_el_GR`
--

LOCK TABLES `object_localized_query_PROD_el_GR` WRITE;
/*!40000 ALTER TABLE `object_localized_query_PROD_el_GR` DISABLE KEYS */;
INSERT INTO `object_localized_query_PROD_el_GR` VALUES (3,'el_GR',NULL,NULL);
/*!40000 ALTER TABLE `object_localized_query_PROD_el_GR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_localized_query_PROD_en`
--

DROP TABLE IF EXISTS `object_localized_query_PROD_en`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_localized_query_PROD_en` (
  `ooo_id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(190) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_localized_query_PROD_en`
--

LOCK TABLES `object_localized_query_PROD_en` WRITE;
/*!40000 ALTER TABLE `object_localized_query_PROD_en` DISABLE KEYS */;
INSERT INTO `object_localized_query_PROD_en` VALUES (3,'en','My English Title','My English Description\n');
/*!40000 ALTER TABLE `object_localized_query_PROD_en` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_localized_query_PROD_es`
--

DROP TABLE IF EXISTS `object_localized_query_PROD_es`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_localized_query_PROD_es` (
  `ooo_id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(190) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_localized_query_PROD_es`
--

LOCK TABLES `object_localized_query_PROD_es` WRITE;
/*!40000 ALTER TABLE `object_localized_query_PROD_es` DISABLE KEYS */;
INSERT INTO `object_localized_query_PROD_es` VALUES (3,'es',NULL,NULL);
/*!40000 ALTER TABLE `object_localized_query_PROD_es` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_localized_query_PROD_fr`
--

DROP TABLE IF EXISTS `object_localized_query_PROD_fr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_localized_query_PROD_fr` (
  `ooo_id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(190) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_localized_query_PROD_fr`
--

LOCK TABLES `object_localized_query_PROD_fr` WRITE;
/*!40000 ALTER TABLE `object_localized_query_PROD_fr` DISABLE KEYS */;
INSERT INTO `object_localized_query_PROD_fr` VALUES (3,'fr',NULL,NULL);
/*!40000 ALTER TABLE `object_localized_query_PROD_fr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_localized_query_PROD_it`
--

DROP TABLE IF EXISTS `object_localized_query_PROD_it`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_localized_query_PROD_it` (
  `ooo_id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(190) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_localized_query_PROD_it`
--

LOCK TABLES `object_localized_query_PROD_it` WRITE;
/*!40000 ALTER TABLE `object_localized_query_PROD_it` DISABLE KEYS */;
INSERT INTO `object_localized_query_PROD_it` VALUES (3,'it',NULL,NULL);
/*!40000 ALTER TABLE `object_localized_query_PROD_it` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_localized_query_PROD_pl`
--

DROP TABLE IF EXISTS `object_localized_query_PROD_pl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_localized_query_PROD_pl` (
  `ooo_id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(190) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_localized_query_PROD_pl`
--

LOCK TABLES `object_localized_query_PROD_pl` WRITE;
/*!40000 ALTER TABLE `object_localized_query_PROD_pl` DISABLE KEYS */;
INSERT INTO `object_localized_query_PROD_pl` VALUES (3,'pl',NULL,NULL);
/*!40000 ALTER TABLE `object_localized_query_PROD_pl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_localized_query_PROD_pt`
--

DROP TABLE IF EXISTS `object_localized_query_PROD_pt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_localized_query_PROD_pt` (
  `ooo_id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(190) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_localized_query_PROD_pt`
--

LOCK TABLES `object_localized_query_PROD_pt` WRITE;
/*!40000 ALTER TABLE `object_localized_query_PROD_pt` DISABLE KEYS */;
INSERT INTO `object_localized_query_PROD_pt` VALUES (3,'pt',NULL,NULL);
/*!40000 ALTER TABLE `object_localized_query_PROD_pt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_metadata_PROD`
--

DROP TABLE IF EXISTS `object_metadata_PROD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_metadata_PROD` (
  `o_id` int(11) NOT NULL DEFAULT '0',
  `dest_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL DEFAULT '',
  `fieldname` varchar(71) NOT NULL,
  `column` varchar(190) NOT NULL,
  `data` text,
  `ownertype` enum('object','fieldcollection','localizedfield','objectbrick') NOT NULL DEFAULT 'object',
  `ownername` varchar(70) NOT NULL DEFAULT '',
  `position` varchar(70) NOT NULL DEFAULT '0',
  `index` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`o_id`,`dest_id`,`type`,`fieldname`,`column`,`ownertype`,`ownername`,`position`,`index`),
  KEY `dest_id` (`dest_id`),
  KEY `fieldname` (`fieldname`),
  KEY `column` (`column`),
  KEY `ownertype` (`ownertype`),
  KEY `ownername` (`ownername`),
  KEY `position` (`position`),
  KEY `index` (`index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_metadata_PROD`
--

LOCK TABLES `object_metadata_PROD` WRITE;
/*!40000 ALTER TABLE `object_metadata_PROD` DISABLE KEYS */;
/*!40000 ALTER TABLE `object_metadata_PROD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_query_CAT`
--

DROP TABLE IF EXISTS `object_query_CAT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_query_CAT` (
  `oo_id` int(11) NOT NULL DEFAULT '0',
  `oo_classId` varchar(50) DEFAULT 'CAT',
  `oo_className` varchar(255) DEFAULT 'Category',
  `products` text,
  `name` varchar(190) DEFAULT NULL,
  `code` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_query_CAT`
--

LOCK TABLES `object_query_CAT` WRITE;
/*!40000 ALTER TABLE `object_query_CAT` DISABLE KEYS */;
INSERT INTO `object_query_CAT` VALUES (5,'CAT','Category',NULL,'T-Shirts','TSH'),(6,'CAT','Category',NULL,'Limited Edition','LIM');
/*!40000 ALTER TABLE `object_query_CAT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_query_PROD`
--

DROP TABLE IF EXISTS `object_query_PROD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_query_PROD` (
  `oo_id` int(11) NOT NULL DEFAULT '0',
  `oo_classId` varchar(50) DEFAULT 'PROD',
  `oo_className` varchar(255) DEFAULT 'Product',
  `categories` text,
  `title` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_query_PROD`
--

LOCK TABLES `object_query_PROD` WRITE;
/*!40000 ALTER TABLE `object_query_PROD` DISABLE KEYS */;
INSERT INTO `object_query_PROD` VALUES (3,'PROD','Product',',5,6,','T-Shirts'),(7,'PROD','Product',',5,6,','Black T-Shirts'),(8,'PROD','Product',',5,6,','White T-Shirts');
/*!40000 ALTER TABLE `object_query_PROD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_relations_CAT`
--

DROP TABLE IF EXISTS `object_relations_CAT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_relations_CAT` (
  `src_id` int(11) NOT NULL DEFAULT '0',
  `dest_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL DEFAULT '',
  `fieldname` varchar(70) NOT NULL DEFAULT '0',
  `index` int(11) unsigned NOT NULL DEFAULT '0',
  `ownertype` enum('object','fieldcollection','localizedfield','objectbrick') NOT NULL DEFAULT 'object',
  `ownername` varchar(70) NOT NULL DEFAULT '',
  `position` varchar(70) NOT NULL DEFAULT '0',
  KEY `forward_lookup` (`src_id`,`ownertype`,`ownername`,`position`),
  KEY `reverse_lookup` (`dest_id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_relations_CAT`
--

LOCK TABLES `object_relations_CAT` WRITE;
/*!40000 ALTER TABLE `object_relations_CAT` DISABLE KEYS */;
/*!40000 ALTER TABLE `object_relations_CAT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_relations_PROD`
--

DROP TABLE IF EXISTS `object_relations_PROD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_relations_PROD` (
  `src_id` int(11) NOT NULL DEFAULT '0',
  `dest_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL DEFAULT '',
  `fieldname` varchar(70) NOT NULL DEFAULT '0',
  `index` int(11) unsigned NOT NULL DEFAULT '0',
  `ownertype` enum('object','fieldcollection','localizedfield','objectbrick') NOT NULL DEFAULT 'object',
  `ownername` varchar(70) NOT NULL DEFAULT '',
  `position` varchar(70) NOT NULL DEFAULT '0',
  KEY `forward_lookup` (`src_id`,`ownertype`,`ownername`,`position`),
  KEY `reverse_lookup` (`dest_id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_relations_PROD`
--

LOCK TABLES `object_relations_PROD` WRITE;
/*!40000 ALTER TABLE `object_relations_PROD` DISABLE KEYS */;
INSERT INTO `object_relations_PROD` VALUES (3,5,'object','categories',1,'object','','0'),(3,6,'object','categories',2,'object','','0'),(3,5,'object','test',1,'object','','0'),(3,6,'object','test',2,'object','','0');
/*!40000 ALTER TABLE `object_relations_PROD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_store_CAT`
--

DROP TABLE IF EXISTS `object_store_CAT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_store_CAT` (
  `oo_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(190) DEFAULT NULL,
  `code` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_store_CAT`
--

LOCK TABLES `object_store_CAT` WRITE;
/*!40000 ALTER TABLE `object_store_CAT` DISABLE KEYS */;
INSERT INTO `object_store_CAT` VALUES (5,'T-Shirts','TSH'),(6,'Limited Edition','LIM');
/*!40000 ALTER TABLE `object_store_CAT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_store_PROD`
--

DROP TABLE IF EXISTS `object_store_PROD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_store_PROD` (
  `oo_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_store_PROD`
--

LOCK TABLES `object_store_PROD` WRITE;
/*!40000 ALTER TABLE `object_store_PROD` DISABLE KEYS */;
INSERT INTO `object_store_PROD` VALUES (3,'T-Shirts'),(7,'Black T-Shirts'),(8,'White T-Shirts');
/*!40000 ALTER TABLE `object_store_PROD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_url_slugs`
--

DROP TABLE IF EXISTS `object_url_slugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_url_slugs` (
  `objectId` int(11) NOT NULL DEFAULT '0',
  `classId` varchar(50) NOT NULL DEFAULT '0',
  `fieldname` varchar(70) NOT NULL DEFAULT '0',
  `index` int(11) unsigned NOT NULL DEFAULT '0',
  `ownertype` enum('object','fieldcollection','localizedfield','objectbrick') NOT NULL DEFAULT 'object',
  `ownername` varchar(70) NOT NULL DEFAULT '',
  `position` varchar(70) NOT NULL DEFAULT '0',
  `slug` varchar(765) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `siteId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`slug`,`siteId`),
  KEY `index` (`index`),
  KEY `objectId` (`objectId`),
  KEY `classId` (`classId`),
  KEY `fieldname` (`fieldname`),
  KEY `position` (`position`),
  KEY `ownertype` (`ownertype`),
  KEY `ownername` (`ownername`),
  KEY `slug` (`slug`),
  KEY `siteId` (`siteId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_url_slugs`
--

LOCK TABLES `object_url_slugs` WRITE;
/*!40000 ALTER TABLE `object_url_slugs` DISABLE KEYS */;
/*!40000 ALTER TABLE `object_url_slugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objects`
--

DROP TABLE IF EXISTS `objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objects` (
  `o_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `o_parentId` int(11) unsigned DEFAULT NULL,
  `o_type` enum('object','folder','variant') DEFAULT NULL,
  `o_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '',
  `o_path` varchar(765) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `o_index` int(11) unsigned DEFAULT '0',
  `o_published` tinyint(1) unsigned DEFAULT '1',
  `o_creationDate` int(11) unsigned DEFAULT NULL,
  `o_modificationDate` int(11) unsigned DEFAULT NULL,
  `o_userOwner` int(11) unsigned DEFAULT NULL,
  `o_userModification` int(11) unsigned DEFAULT NULL,
  `o_classId` varchar(50) DEFAULT NULL,
  `o_className` varchar(255) DEFAULT NULL,
  `o_childrenSortBy` enum('key','index') DEFAULT NULL,
  `o_versionCount` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`o_id`),
  UNIQUE KEY `fullpath` (`o_path`,`o_key`),
  KEY `key` (`o_key`),
  KEY `index` (`o_index`),
  KEY `published` (`o_published`),
  KEY `parentId` (`o_parentId`),
  KEY `type` (`o_type`),
  KEY `o_modificationDate` (`o_modificationDate`),
  KEY `o_classId` (`o_classId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objects`
--

LOCK TABLES `objects` WRITE;
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
INSERT INTO `objects` VALUES (1,0,'folder','','/',999999,1,1593614087,1593614087,1,1,NULL,NULL,NULL,0),(2,1,'folder','Products','/',NULL,1,1606034032,1606034032,2,2,NULL,NULL,NULL,2),(3,2,'object','T-Shirt','/Products/',0,1,1606034092,1607720033,2,2,'PROD','Product',NULL,10),(4,1,'folder','Categories','/',NULL,1,1607626935,1607626934,2,2,NULL,NULL,NULL,2),(5,4,'object','T-Shirts','/Categories/',0,1,1607709962,1607709991,2,2,'CAT','Category',NULL,2),(6,4,'object','Limited Edition','/Categories/',0,1,1607710057,1607710064,2,2,'CAT','Category',NULL,2),(7,3,'variant','Black','/Products/T-Shirt/',0,1,1607712850,1607712864,2,2,'PROD','Product',NULL,3),(8,3,'variant','White','/Products/T-Shirt/',0,1,1607712881,1607712899,2,2,'PROD','Product',NULL,2);
/*!40000 ALTER TABLE `objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pimcore_migrations`
--

DROP TABLE IF EXISTS `pimcore_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pimcore_migrations` (
  `migration_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `migrated_at` datetime NOT NULL,
  PRIMARY KEY (`migration_set`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pimcore_migrations`
--

LOCK TABLES `pimcore_migrations` WRITE;
/*!40000 ALTER TABLE `pimcore_migrations` DISABLE KEYS */;
INSERT INTO `pimcore_migrations` VALUES ('pimcore_core','20180724144005','2020-04-21 10:05:25'),('pimcore_core','20180830113528','2020-04-21 10:05:25'),('pimcore_core','20180830122128','2020-04-21 10:05:25'),('pimcore_core','20180904201947','2020-04-21 10:05:25'),('pimcore_core','20180906142115','2020-04-21 10:05:25'),('pimcore_core','20180907115436','2020-04-21 10:05:25'),('pimcore_core','20180912140913','2020-04-21 10:05:26'),('pimcore_core','20180913132106','2020-04-21 10:05:26'),('pimcore_core','20180924111736','2020-04-21 10:05:26'),('pimcore_core','20181008132414','2020-04-21 10:05:26'),('pimcore_core','20181009135158','2020-04-21 10:05:26'),('pimcore_core','20181115114003','2020-04-21 10:05:26'),('pimcore_core','20181126094412','2020-04-21 10:05:26'),('pimcore_core','20181126144341','2020-04-21 10:05:26'),('pimcore_core','20181128074035','2020-04-21 10:05:26'),('pimcore_core','20181128112320','2020-04-21 10:05:26'),('pimcore_core','20181214145532','2020-04-21 10:05:26'),('pimcore_core','20190102143436','2020-04-21 10:05:26'),('pimcore_core','20190102153226','2020-04-21 10:05:26'),('pimcore_core','20190108131401','2020-04-21 10:05:26'),('pimcore_core','20190124105627','2020-04-21 10:05:26'),('pimcore_core','20190131074054','2020-04-21 10:05:26'),('pimcore_core','20190131095936','2020-04-21 10:05:26'),('pimcore_core','20190320133439','2020-04-21 10:05:26'),('pimcore_core','20190402073052','2020-04-21 10:05:26'),('pimcore_core','20190403120728','2020-04-21 10:05:26'),('pimcore_core','20190405112707','2020-04-21 10:05:26'),('pimcore_core','20190408084129','2020-04-21 10:05:26'),('pimcore_core','20190508074339','2020-04-21 10:05:26'),('pimcore_core','20190515130651','2020-04-21 10:05:26'),('pimcore_core','20190520151448','2020-04-21 10:05:26'),('pimcore_core','20190522130545','2020-04-21 10:05:26'),('pimcore_core','20190527121800','2020-04-21 10:05:26'),('pimcore_core','20190618154000','2020-04-21 10:05:26'),('pimcore_core','20190701141857','2020-04-21 10:05:26'),('pimcore_core','20190708175236','2020-04-21 10:05:26'),('pimcore_core','20190729085052','2020-04-21 10:05:26'),('pimcore_core','20190802090149','2020-04-21 10:05:26'),('pimcore_core','20190806160450','2020-04-21 10:05:26'),('pimcore_core','20190807121356','2020-04-21 10:05:26'),('pimcore_core','20190828142756','2020-04-21 10:05:26'),('pimcore_core','20190902085052','2020-04-21 10:05:26'),('pimcore_core','20190904154339','2020-04-21 10:05:26'),('pimcore_core','20191015131700','2020-04-21 10:05:26'),('pimcore_core','20191107141816','2020-04-21 10:05:26'),('pimcore_core','20191114123638','2020-04-21 10:05:26'),('pimcore_core','20191114132014','2020-04-21 10:05:26'),('pimcore_core','20191121150326','2020-04-21 10:05:26'),('pimcore_core','20191125135853','2020-04-21 10:05:26'),('pimcore_core','20191125200416','2020-04-21 10:05:26'),('pimcore_core','20191126130004','2020-04-21 10:05:26'),('pimcore_core','20191208175348','2020-04-21 10:05:26'),('pimcore_core','20191213115045','2020-04-21 10:05:26'),('pimcore_core','20191218073528','2020-04-21 10:05:26'),('pimcore_core','20191230103524','2020-04-21 10:05:26'),('pimcore_core','20191230104529','2020-04-21 10:05:26'),('pimcore_core','20200113120101','2020-04-21 10:05:26'),('pimcore_core','20200116181758','2020-04-21 10:05:26'),('pimcore_core','20200121095650','2020-04-21 10:05:26'),('pimcore_core','20200121131304','2020-04-21 10:05:26'),('pimcore_core','20200127102432','2020-04-21 10:05:26'),('pimcore_core','20200129102132','2020-04-21 10:05:26'),('pimcore_core','20200210101048','2020-04-21 10:05:26'),('pimcore_core','20200210164037','2020-04-21 10:05:26'),('pimcore_core','20200211115044','2020-04-21 10:05:26'),('pimcore_core','20200212130011','2020-04-21 10:05:26'),('pimcore_core','20200218104052','2020-04-21 10:05:26'),('pimcore_core','20200226102938','2020-04-21 10:05:26'),('pimcore_core','20200310122412','2020-04-21 10:05:26'),('pimcore_core','20200313092019','2020-04-21 10:05:26'),('pimcore_core','20200317163018','2020-04-21 10:05:26'),('pimcore_core','20200318100042','2020-04-21 10:05:26'),('pimcore_core','20200324141723','2020-04-21 10:05:26'),('pimcore_core','20200407120641','2020-04-21 10:05:26'),('pimcore_core','20200407132737','2020-04-21 10:05:26'),('pimcore_core','20200407145422','2020-04-21 10:05:26'),('pimcore_core','20200410112354','2020-04-21 10:05:26'),('pimcore_core','20200421142950','2020-07-01 14:34:55'),('pimcore_core','20200422090352','2020-07-01 14:34:55'),('pimcore_core','20200428082346','2020-07-01 14:34:55'),('pimcore_core','20200428111313','2020-07-01 14:34:55'),('pimcore_core','20200529121630','2020-07-01 14:34:55'),('pimcore_core','20200604110336','2020-07-01 14:34:55');
/*!40000 ALTER TABLE `pimcore_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `properties` (
  `cid` int(11) unsigned NOT NULL DEFAULT '0',
  `ctype` enum('document','asset','object') NOT NULL DEFAULT 'document',
  `cpath` varchar(765) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(190) NOT NULL DEFAULT '',
  `type` enum('text','document','asset','object','bool','select') DEFAULT NULL,
  `data` text,
  `inheritable` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`cid`,`ctype`,`name`),
  KEY `getall` (`cpath`,`ctype`,`inheritable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quantityvalue_units`
--

DROP TABLE IF EXISTS `quantityvalue_units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quantityvalue_units` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(50) DEFAULT NULL,
  `abbreviation` varchar(20) NOT NULL,
  `longname` varchar(250) DEFAULT NULL,
  `baseunit` int(11) unsigned DEFAULT NULL,
  `factor` double DEFAULT NULL,
  `conversionOffset` double DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `converter` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_baseunit` (`baseunit`),
  CONSTRAINT `fk_baseunit` FOREIGN KEY (`baseunit`) REFERENCES `quantityvalue_units` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quantityvalue_units`
--

LOCK TABLES `quantityvalue_units` WRITE;
/*!40000 ALTER TABLE `quantityvalue_units` DISABLE KEYS */;
INSERT INTO `quantityvalue_units` VALUES (1,NULL,'€','Euro',NULL,NULL,NULL,NULL,''),(2,NULL,'Kg','Kilograms',NULL,NULL,NULL,NULL,''),(3,NULL,'cm','Centimeters',4,0.01,NULL,NULL,''),(4,NULL,'m','Meters',NULL,NULL,NULL,NULL,'');
/*!40000 ALTER TABLE `quantityvalue_units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recyclebin`
--

DROP TABLE IF EXISTS `recyclebin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recyclebin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `subtype` varchar(20) DEFAULT NULL,
  `path` varchar(765) DEFAULT NULL,
  `amount` int(3) DEFAULT NULL,
  `date` int(11) unsigned DEFAULT NULL,
  `deletedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `redirects`
--

DROP TABLE IF EXISTS `redirects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `redirects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('entire_uri','path_query','path','auto_create') NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `sourceSite` int(11) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `targetSite` int(11) DEFAULT NULL,
  `statusCode` varchar(3) DEFAULT NULL,
  `priority` int(2) DEFAULT '0',
  `regex` tinyint(1) DEFAULT NULL,
  `passThroughParameters` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `expiry` int(11) unsigned DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT '0',
  `modificationDate` int(11) unsigned DEFAULT '0',
  `userOwner` int(11) unsigned DEFAULT NULL,
  `userModification` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `priority` (`priority`),
  KEY `routing_lookup` (`active`,`regex`,`sourceSite`,`source`,`type`,`expiry`,`priority`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redirects`
--

LOCK TABLES `redirects` WRITE;
/*!40000 ALTER TABLE `redirects` DISABLE KEYS */;
/*!40000 ALTER TABLE `redirects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanitycheck`
--

DROP TABLE IF EXISTS `sanitycheck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sanitycheck` (
  `id` int(11) unsigned NOT NULL,
  `type` enum('document','asset','object') NOT NULL,
  PRIMARY KEY (`id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanitycheck`
--

LOCK TABLES `sanitycheck` WRITE;
/*!40000 ALTER TABLE `sanitycheck` DISABLE KEYS */;
INSERT INTO `sanitycheck` VALUES (8,'object');
/*!40000 ALTER TABLE `sanitycheck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_tasks`
--

DROP TABLE IF EXISTS `schedule_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule_tasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) unsigned DEFAULT NULL,
  `ctype` enum('document','asset','object') DEFAULT NULL,
  `date` int(11) unsigned DEFAULT NULL,
  `action` enum('publish','unpublish','delete','publish-version') DEFAULT NULL,
  `version` bigint(20) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT '0',
  `userId` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `ctype` (`ctype`),
  KEY `active` (`active`),
  KEY `version` (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_tasks`
--

LOCK TABLES `schedule_tasks` WRITE;
/*!40000 ALTER TABLE `schedule_tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `search_backend_data`
--

DROP TABLE IF EXISTS `search_backend_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `search_backend_data` (
  `id` int(11) NOT NULL,
  `fullpath` varchar(765) CHARACTER SET utf8 DEFAULT NULL,
  `maintype` varchar(8) NOT NULL DEFAULT '',
  `type` varchar(20) DEFAULT NULL,
  `subtype` varchar(190) DEFAULT NULL,
  `published` int(11) unsigned DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  `userOwner` int(11) DEFAULT NULL,
  `userModification` int(11) DEFAULT NULL,
  `data` longtext,
  `properties` text,
  PRIMARY KEY (`id`,`maintype`),
  KEY `fullpath` (`fullpath`),
  KEY `maintype` (`maintype`),
  KEY `type` (`type`),
  KEY `subtype` (`subtype`),
  KEY `published` (`published`),
  FULLTEXT KEY `fulltext` (`data`,`properties`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search_backend_data`
--

LOCK TABLES `search_backend_data` WRITE;
/*!40000 ALTER TABLE `search_backend_data` DISABLE KEYS */;
INSERT INTO `search_backend_data` VALUES (2,'/Products','object','folder','folder',1,1606034032,1606034032,2,2,'ID: 2  \nPath: /Products  \nProducts',''),(3,'/Products/T-Shirt','object','object','Product',1,1606034092,1607720033,2,2,'ID: 3  \nPath: /Products/T-Shirt  \nT-Shirt T-Shirts Products T Shirt',''),(4,'/Categories','object','folder','folder',1,1607626935,1607626934,2,2,'ID: 4  \nPath: /Categories  \nCategories',''),(5,'/Categories/T-Shirts','object','object','Category',1,1607709962,1607709991,2,2,'ID: 5  \nPath: /Categories/T-Shirts  \nT-Shirts TSH Categories T Shirts',''),(6,'/Categories/Limited Edition','object','object','Category',1,1607710057,1607710064,2,2,'ID: 6  \nPath: /Categories/Limited Edition  \nLimited Edition LIM Categories',''),(7,'/Products/T-Shirt/Black','object','variant','Product',1,1607712850,1607712864,2,2,'ID: 7  \nPath: /Products/T-Shirt/Black  \nBlack T-Shirts Products T Shirt',''),(8,'/Products/T-Shirt/White','object','variant','Product',1,1607712881,1607712899,2,2,'ID: 8  \nPath: /Products/T-Shirt/White  \nWhite T-Shirts Products T Shirt','');
/*!40000 ALTER TABLE `search_backend_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mainDomain` varchar(255) DEFAULT NULL,
  `domains` text,
  `rootId` int(11) unsigned DEFAULT NULL,
  `errorDocument` varchar(255) DEFAULT NULL,
  `redirectToMainDomain` tinyint(1) DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT '0',
  `modificationDate` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `rootId` (`rootId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(10) unsigned DEFAULT NULL,
  `idPath` varchar(190) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idpath` (`idPath`),
  KEY `parentid` (`parentId`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,0,'/','Colors'),(2,1,'/1/','Green'),(3,1,'/1/','Azureblue'),(4,1,'/1/','White'),(5,1,'/1/','Black'),(6,1,'/1/','Red'),(7,1,'/1/','Grey'),(8,1,'/1/','Yellow'),(9,1,'/1/','Pink');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags_assignment`
--

DROP TABLE IF EXISTS `tags_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags_assignment` (
  `tagid` int(10) unsigned NOT NULL DEFAULT '0',
  `cid` int(10) NOT NULL DEFAULT '0',
  `ctype` enum('document','asset','object') NOT NULL,
  PRIMARY KEY (`tagid`,`cid`,`ctype`),
  KEY `ctype` (`ctype`),
  KEY `ctype_cid` (`cid`,`ctype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags_assignment`
--

LOCK TABLES `tags_assignment` WRITE;
/*!40000 ALTER TABLE `tags_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `targeting_rules`
--

DROP TABLE IF EXISTS `targeting_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `targeting_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `scope` varchar(50) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `prio` smallint(5) unsigned NOT NULL DEFAULT '0',
  `conditions` longtext,
  `actions` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `targeting_rules`
--

LOCK TABLES `targeting_rules` WRITE;
/*!40000 ALTER TABLE `targeting_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `targeting_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `targeting_storage`
--

DROP TABLE IF EXISTS `targeting_storage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `targeting_storage` (
  `visitorId` varchar(100) NOT NULL,
  `scope` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` text,
  `creationDate` datetime DEFAULT NULL,
  `modificationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`visitorId`,`scope`,`name`),
  KEY `targeting_storage_scope_index` (`scope`),
  KEY `targeting_storage_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `targeting_storage`
--

LOCK TABLES `targeting_storage` WRITE;
/*!40000 ALTER TABLE `targeting_storage` DISABLE KEYS */;
/*!40000 ALTER TABLE `targeting_storage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `targeting_target_groups`
--

DROP TABLE IF EXISTS `targeting_target_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `targeting_target_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `threshold` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `targeting_target_groups`
--

LOCK TABLES `targeting_target_groups` WRITE;
/*!40000 ALTER TABLE `targeting_target_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `targeting_target_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_store`
--

DROP TABLE IF EXISTS `tmp_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_store` (
  `id` varchar(190) NOT NULL DEFAULT '',
  `tag` varchar(190) DEFAULT NULL,
  `data` longtext,
  `serialized` tinyint(2) NOT NULL DEFAULT '0',
  `date` int(11) unsigned DEFAULT NULL,
  `expiryDate` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tag` (`tag`),
  KEY `date` (`date`),
  KEY `expiryDate` (`expiryDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_store`
--

LOCK TABLES `tmp_store` WRITE;
/*!40000 ALTER TABLE `tmp_store` DISABLE KEYS */;
INSERT INTO `tmp_store` VALUES ('thumb_14__de8c00b75b20ce260b5d226d56170205','image-optimize-queue','image-thumbnails/image-thumb__14__af-live-full/30340_4_p1_i1 (1).webp',0,1607183782,1607788582);
/*!40000 ALTER TABLE `tmp_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tracking_events`
--

DROP TABLE IF EXISTS `tracking_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tracking_events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(190) DEFAULT NULL,
  `action` varchar(190) DEFAULT NULL,
  `label` varchar(190) DEFAULT NULL,
  `data` varchar(190) DEFAULT NULL,
  `timestamp` int(11) unsigned DEFAULT NULL,
  `year` int(5) unsigned DEFAULT NULL,
  `month` int(2) unsigned DEFAULT NULL,
  `day` int(2) unsigned DEFAULT NULL,
  `dayOfWeek` int(1) unsigned DEFAULT NULL,
  `dayOfYear` int(3) unsigned DEFAULT NULL,
  `weekOfYear` int(2) unsigned DEFAULT NULL,
  `hour` int(2) unsigned DEFAULT NULL,
  `minute` int(2) unsigned DEFAULT NULL,
  `second` int(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `timestamp` (`timestamp`),
  KEY `year` (`year`),
  KEY `month` (`month`),
  KEY `day` (`day`),
  KEY `dayOfWeek` (`dayOfWeek`),
  KEY `dayOfYear` (`dayOfYear`),
  KEY `weekOfYear` (`weekOfYear`),
  KEY `hour` (`hour`),
  KEY `minute` (`minute`),
  KEY `second` (`second`),
  KEY `category` (`category`),
  KEY `action` (`action`),
  KEY `label` (`label`),
  KEY `data` (`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracking_events`
--

LOCK TABLES `tracking_events` WRITE;
/*!40000 ALTER TABLE `tracking_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `tracking_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations_admin`
--

DROP TABLE IF EXISTS `translations_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations_admin` (
  `key` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `language` varchar(10) NOT NULL DEFAULT '',
  `text` text,
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`key`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations_admin`
--

LOCK TABLES `translations_admin` WRITE;
/*!40000 ALTER TABLE `translations_admin` DISABLE KEYS */;
INSERT INTO `translations_admin` VALUES ('10%','cs','',1595922207,1595922207),('10%','de','',1595922207,1595922207),('10%','en','',1595922207,1595922207),('10%','es','',1595922207,1595922207),('10%','fa','',1595922207,1595922207),('10%','fr','',1595922207,1595922207),('10%','it','',1595922207,1595922207),('10%','ja','',1595922207,1595922207),('10%','nl','',1595922207,1595922207),('10%','pl','',1595922207,1595922207),('10%','pt_BR','',1595922207,1595922207),('10%','ru','',1595922207,1595922207),('10%','sk','',1595922207,1595922207),('10%','sv','',1595922207,1595922207),('10%','sv_FI','',1595922207,1595922207),('10%','tr','',1595922207,1595922207),('10%','uk','',1595922207,1595922207),('10%','zh_Hans','',1595922207,1595922207),('22%','cs','',1595922207,1595922207),('22%','de','',1595922207,1595922207),('22%','en','',1595922207,1595922207),('22%','es','',1595922207,1595922207),('22%','fa','',1595922207,1595922207),('22%','fr','',1595922207,1595922207),('22%','it','',1595922207,1595922207),('22%','ja','',1595922207,1595922207),('22%','nl','',1595922207,1595922207),('22%','pl','',1595922207,1595922207),('22%','pt_BR','',1595922207,1595922207),('22%','ru','',1595922207,1595922207),('22%','sk','',1595922207,1595922207),('22%','sv','',1595922207,1595922207),('22%','sv_FI','',1595922207,1595922207),('22%','tr','',1595922207,1595922207),('22%','uk','',1595922207,1595922207),('22%','zh_Hans','',1595922207,1595922207),(':','cs','',1595918252,1595918252),(':','de','',1595918252,1595918252),(':','en','',1595918252,1595918252),(':','es','',1595918252,1595918252),(':','fa','',1595918252,1595918252),(':','fr','',1595918252,1595918252),(':','it','',1595918252,1595918252),(':','ja','',1595918252,1595918252),(':','nl','',1595918252,1595918252),(':','pl','',1595918252,1595918252),(':','pt_BR','',1595918252,1595918252),(':','ru','',1595918252,1595918252),(':','sk','',1595918252,1595918252),(':','sv','',1595918252,1595918252),(':','sv_FI','',1595918252,1595918252),(':','tr','',1595918252,1595918252),(':','uk','',1595918252,1595918252),(':','zh_Hans','',1595918252,1595918252),('API key does not satisfy the minimum length of 16 characters','cs','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','de','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','en','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','es','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','fa','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','fr','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','it','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','ja','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','nl','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','pl','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','pt_BR','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','ru','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','sk','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','sv','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','sv_FI','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','tr','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','uk','',1596004347,1596004347),('API key does not satisfy the minimum length of 16 characters','zh_Hans','',1596004347,1596004347),('Aboca','cs','',1595922207,1595922207),('Aboca','de','',1595922207,1595922207),('Aboca','en','',1595922207,1595922207),('Aboca','es','',1595922207,1595922207),('Aboca','fa','',1595922207,1595922207),('Aboca','fr','',1595922207,1595922207),('Aboca','it','',1595922207,1595922207),('Aboca','ja','',1595922207,1595922207),('Aboca','nl','',1595922207,1595922207),('Aboca','pl','',1595922207,1595922207),('Aboca','pt_BR','',1595922207,1595922207),('Aboca','ru','',1595922207,1595922207),('Aboca','sk','',1595922207,1595922207),('Aboca','sv','',1595922207,1595922207),('Aboca','sv_FI','',1595922207,1595922207),('Aboca','tr','',1595922207,1595922207),('Aboca','uk','',1595922207,1595922207),('Aboca','zh_Hans','',1595922207,1595922207),('Advance Image','cs','',1610210151,1610210151),('Advance Image','de','',1610210151,1610210151),('Advance Image','en','',1610210151,1610210151),('Advance Image','es','',1610210151,1610210151),('Advance Image','fa','',1610210151,1610210151),('Advance Image','fr','',1610210151,1610210151),('Advance Image','it','',1610210151,1610210151),('Advance Image','ja','',1610210151,1610210151),('Advance Image','nl','',1610210151,1610210151),('Advance Image','pl','',1610210151,1610210151),('Advance Image','pt_BR','',1610210151,1610210151),('Advance Image','ru','',1610210151,1610210151),('Advance Image','sk','',1610210151,1610210151),('Advance Image','sv','',1610210151,1610210151),('Advance Image','sv_FI','',1610210151,1610210151),('Advance Image','tr','',1610210151,1610210151),('Advance Image','uk','',1610210151,1610210151),('Advance Image','zh_Hans','',1610210151,1610210151),('Afghanistan','cs','',1595954047,1595954047),('Afghanistan','de','',1595954047,1595954047),('Afghanistan','en','',1595954047,1595954047),('Afghanistan','es','',1595954047,1595954047),('Afghanistan','fa','',1595954047,1595954047),('Afghanistan','fr','',1595954047,1595954047),('Afghanistan','it','',1595954047,1595954047),('Afghanistan','ja','',1595954047,1595954047),('Afghanistan','nl','',1595954047,1595954047),('Afghanistan','pl','',1595954047,1595954047),('Afghanistan','pt_BR','',1595954047,1595954047),('Afghanistan','ru','',1595954047,1595954047),('Afghanistan','sk','',1595954047,1595954047),('Afghanistan','sv','',1595954047,1595954047),('Afghanistan','sv_FI','',1595954047,1595954047),('Afghanistan','tr','',1595954047,1595954047),('Afghanistan','uk','',1595954047,1595954047),('Afghanistan','zh_Hans','',1595954047,1595954047),('Albania','cs','',1595954047,1595954047),('Albania','de','',1595954047,1595954047),('Albania','en','',1595954047,1595954047),('Albania','es','',1595954047,1595954047),('Albania','fa','',1595954047,1595954047),('Albania','fr','',1595954047,1595954047),('Albania','it','',1595954047,1595954047),('Albania','ja','',1595954047,1595954047),('Albania','nl','',1595954047,1595954047),('Albania','pl','',1595954047,1595954047),('Albania','pt_BR','',1595954047,1595954047),('Albania','ru','',1595954047,1595954047),('Albania','sk','',1595954047,1595954047),('Albania','sv','',1595954047,1595954047),('Albania','sv_FI','',1595954047,1595954047),('Albania','tr','',1595954047,1595954047),('Albania','uk','',1595954047,1595954047),('Albania','zh_Hans','',1595954047,1595954047),('Algeria','cs','',1595954047,1595954047),('Algeria','de','',1595954047,1595954047),('Algeria','en','',1595954047,1595954047),('Algeria','es','',1595954047,1595954047),('Algeria','fa','',1595954047,1595954047),('Algeria','fr','',1595954047,1595954047),('Algeria','it','',1595954047,1595954047),('Algeria','ja','',1595954047,1595954047),('Algeria','nl','',1595954047,1595954047),('Algeria','pl','',1595954047,1595954047),('Algeria','pt_BR','',1595954047,1595954047),('Algeria','ru','',1595954047,1595954047),('Algeria','sk','',1595954047,1595954047),('Algeria','sv','',1595954047,1595954047),('Algeria','sv_FI','',1595954047,1595954047),('Algeria','tr','',1595954047,1595954047),('Algeria','uk','',1595954047,1595954047),('Algeria','zh_Hans','',1595954047,1595954047),('Alt','cs','',1609929774,1609929774),('Alt','de','',1609929774,1609929774),('Alt','en','',1609929774,1609929774),('Alt','es','',1609929774,1609929774),('Alt','fa','',1609929774,1609929774),('Alt','fr','',1609929774,1609929774),('Alt','it','',1609929774,1609929774),('Alt','ja','',1609929774,1609929774),('Alt','nl','',1609929774,1609929774),('Alt','pl','',1609929774,1609929774),('Alt','pt_BR','',1609929774,1609929774),('Alt','ru','',1609929774,1609929774),('Alt','sk','',1609929774,1609929774),('Alt','sv','',1609929774,1609929774),('Alt','sv_FI','',1609929774,1609929774),('Alt','tr','',1609929774,1609929774),('Alt','uk','',1609929774,1609929774),('Alt','zh_Hans','',1609929774,1609929774),('American Samoa','cs','',1595954047,1595954047),('American Samoa','de','',1595954047,1595954047),('American Samoa','en','',1595954047,1595954047),('American Samoa','es','',1595954047,1595954047),('American Samoa','fa','',1595954047,1595954047),('American Samoa','fr','',1595954047,1595954047),('American Samoa','it','',1595954047,1595954047),('American Samoa','ja','',1595954047,1595954047),('American Samoa','nl','',1595954047,1595954047),('American Samoa','pl','',1595954047,1595954047),('American Samoa','pt_BR','',1595954047,1595954047),('American Samoa','ru','',1595954047,1595954047),('American Samoa','sk','',1595954047,1595954047),('American Samoa','sv','',1595954047,1595954047),('American Samoa','sv_FI','',1595954047,1595954047),('American Samoa','tr','',1595954047,1595954047),('American Samoa','uk','',1595954047,1595954047),('American Samoa','zh_Hans','',1595954047,1595954047),('Andorra','cs','',1595954047,1595954047),('Andorra','de','',1595954047,1595954047),('Andorra','en','',1595954047,1595954047),('Andorra','es','',1595954047,1595954047),('Andorra','fa','',1595954047,1595954047),('Andorra','fr','',1595954047,1595954047),('Andorra','it','',1595954047,1595954047),('Andorra','ja','',1595954047,1595954047),('Andorra','nl','',1595954047,1595954047),('Andorra','pl','',1595954047,1595954047),('Andorra','pt_BR','',1595954047,1595954047),('Andorra','ru','',1595954047,1595954047),('Andorra','sk','',1595954047,1595954047),('Andorra','sv','',1595954047,1595954047),('Andorra','sv_FI','',1595954047,1595954047),('Andorra','tr','',1595954047,1595954047),('Andorra','uk','',1595954047,1595954047),('Andorra','zh_Hans','',1595954047,1595954047),('Angola','cs','',1595954047,1595954047),('Angola','de','',1595954047,1595954047),('Angola','en','',1595954047,1595954047),('Angola','es','',1595954047,1595954047),('Angola','fa','',1595954047,1595954047),('Angola','fr','',1595954047,1595954047),('Angola','it','',1595954047,1595954047),('Angola','ja','',1595954047,1595954047),('Angola','nl','',1595954047,1595954047),('Angola','pl','',1595954047,1595954047),('Angola','pt_BR','',1595954047,1595954047),('Angola','ru','',1595954047,1595954047),('Angola','sk','',1595954047,1595954047),('Angola','sv','',1595954047,1595954047),('Angola','sv_FI','',1595954047,1595954047),('Angola','tr','',1595954047,1595954047),('Angola','uk','',1595954047,1595954047),('Angola','zh_Hans','',1595954047,1595954047),('Anguilla','cs','',1595954047,1595954047),('Anguilla','de','',1595954047,1595954047),('Anguilla','en','',1595954047,1595954047),('Anguilla','es','',1595954047,1595954047),('Anguilla','fa','',1595954047,1595954047),('Anguilla','fr','',1595954047,1595954047),('Anguilla','it','',1595954047,1595954047),('Anguilla','ja','',1595954047,1595954047),('Anguilla','nl','',1595954047,1595954047),('Anguilla','pl','',1595954047,1595954047),('Anguilla','pt_BR','',1595954047,1595954047),('Anguilla','ru','',1595954047,1595954047),('Anguilla','sk','',1595954047,1595954047),('Anguilla','sv','',1595954047,1595954047),('Anguilla','sv_FI','',1595954047,1595954047),('Anguilla','tr','',1595954047,1595954047),('Anguilla','uk','',1595954047,1595954047),('Anguilla','zh_Hans','',1595954047,1595954047),('Antarctica','cs','',1595954047,1595954047),('Antarctica','de','',1595954047,1595954047),('Antarctica','en','',1595954047,1595954047),('Antarctica','es','',1595954047,1595954047),('Antarctica','fa','',1595954047,1595954047),('Antarctica','fr','',1595954047,1595954047),('Antarctica','it','',1595954047,1595954047),('Antarctica','ja','',1595954047,1595954047),('Antarctica','nl','',1595954047,1595954047),('Antarctica','pl','',1595954047,1595954047),('Antarctica','pt_BR','',1595954047,1595954047),('Antarctica','ru','',1595954047,1595954047),('Antarctica','sk','',1595954047,1595954047),('Antarctica','sv','',1595954047,1595954047),('Antarctica','sv_FI','',1595954047,1595954047),('Antarctica','tr','',1595954047,1595954047),('Antarctica','uk','',1595954047,1595954047),('Antarctica','zh_Hans','',1595954047,1595954047),('Antigua & Barbuda','cs','',1595954047,1595954047),('Antigua & Barbuda','de','',1595954047,1595954047),('Antigua & Barbuda','en','',1595954047,1595954047),('Antigua & Barbuda','es','',1595954047,1595954047),('Antigua & Barbuda','fa','',1595954047,1595954047),('Antigua & Barbuda','fr','',1595954047,1595954047),('Antigua & Barbuda','it','',1595954047,1595954047),('Antigua & Barbuda','ja','',1595954047,1595954047),('Antigua & Barbuda','nl','',1595954047,1595954047),('Antigua & Barbuda','pl','',1595954047,1595954047),('Antigua & Barbuda','pt_BR','',1595954047,1595954047),('Antigua & Barbuda','ru','',1595954047,1595954047),('Antigua & Barbuda','sk','',1595954047,1595954047),('Antigua & Barbuda','sv','',1595954047,1595954047),('Antigua & Barbuda','sv_FI','',1595954047,1595954047),('Antigua & Barbuda','tr','',1595954047,1595954047),('Antigua & Barbuda','uk','',1595954047,1595954047),('Antigua & Barbuda','zh_Hans','',1595954047,1595954047),('Apoteca Natura','cs','',1595922207,1595922207),('Apoteca Natura','de','',1595922207,1595922207),('Apoteca Natura','en','',1595922207,1595922207),('Apoteca Natura','es','',1595922207,1595922207),('Apoteca Natura','fa','',1595922207,1595922207),('Apoteca Natura','fr','',1595922207,1595922207),('Apoteca Natura','it','',1595922207,1595922207),('Apoteca Natura','ja','',1595922207,1595922207),('Apoteca Natura','nl','',1595922207,1595922207),('Apoteca Natura','pl','',1595922207,1595922207),('Apoteca Natura','pt_BR','',1595922207,1595922207),('Apoteca Natura','ru','',1595922207,1595922207),('Apoteca Natura','sk','',1595922207,1595922207),('Apoteca Natura','sv','',1595922207,1595922207),('Apoteca Natura','sv_FI','',1595922207,1595922207),('Apoteca Natura','tr','',1595922207,1595922207),('Apoteca Natura','uk','',1595922207,1595922207),('Apoteca Natura','zh_Hans','',1595922207,1595922207),('Argentina','cs','',1595954047,1595954047),('Argentina','de','',1595954047,1595954047),('Argentina','en','',1595954047,1595954047),('Argentina','es','',1595954047,1595954047),('Argentina','fa','',1595954047,1595954047),('Argentina','fr','',1595954047,1595954047),('Argentina','it','',1595954047,1595954047),('Argentina','ja','',1595954047,1595954047),('Argentina','nl','',1595954047,1595954047),('Argentina','pl','',1595954047,1595954047),('Argentina','pt_BR','',1595954047,1595954047),('Argentina','ru','',1595954047,1595954047),('Argentina','sk','',1595954047,1595954047),('Argentina','sv','',1595954047,1595954047),('Argentina','sv_FI','',1595954047,1595954047),('Argentina','tr','',1595954047,1595954047),('Argentina','uk','',1595954047,1595954047),('Argentina','zh_Hans','',1595954047,1595954047),('Armenia','cs','',1595954047,1595954047),('Armenia','de','',1595954047,1595954047),('Armenia','en','',1595954047,1595954047),('Armenia','es','',1595954047,1595954047),('Armenia','fa','',1595954047,1595954047),('Armenia','fr','',1595954047,1595954047),('Armenia','it','',1595954047,1595954047),('Armenia','ja','',1595954047,1595954047),('Armenia','nl','',1595954047,1595954047),('Armenia','pl','',1595954047,1595954047),('Armenia','pt_BR','',1595954047,1595954047),('Armenia','ru','',1595954047,1595954047),('Armenia','sk','',1595954047,1595954047),('Armenia','sv','',1595954047,1595954047),('Armenia','sv_FI','',1595954047,1595954047),('Armenia','tr','',1595954047,1595954047),('Armenia','uk','',1595954047,1595954047),('Armenia','zh_Hans','',1595954047,1595954047),('Aruba','cs','',1595954047,1595954047),('Aruba','de','',1595954047,1595954047),('Aruba','en','',1595954047,1595954047),('Aruba','es','',1595954047,1595954047),('Aruba','fa','',1595954047,1595954047),('Aruba','fr','',1595954047,1595954047),('Aruba','it','',1595954047,1595954047),('Aruba','ja','',1595954047,1595954047),('Aruba','nl','',1595954047,1595954047),('Aruba','pl','',1595954047,1595954047),('Aruba','pt_BR','',1595954047,1595954047),('Aruba','ru','',1595954047,1595954047),('Aruba','sk','',1595954047,1595954047),('Aruba','sv','',1595954047,1595954047),('Aruba','sv_FI','',1595954047,1595954047),('Aruba','tr','',1595954047,1595954047),('Aruba','uk','',1595954047,1595954047),('Aruba','zh_Hans','',1595954047,1595954047),('Ascension Island','cs','',1595954047,1595954047),('Ascension Island','de','',1595954047,1595954047),('Ascension Island','en','',1595954047,1595954047),('Ascension Island','es','',1595954047,1595954047),('Ascension Island','fa','',1595954047,1595954047),('Ascension Island','fr','',1595954047,1595954047),('Ascension Island','it','',1595954047,1595954047),('Ascension Island','ja','',1595954047,1595954047),('Ascension Island','nl','',1595954047,1595954047),('Ascension Island','pl','',1595954047,1595954047),('Ascension Island','pt_BR','',1595954047,1595954047),('Ascension Island','ru','',1595954047,1595954047),('Ascension Island','sk','',1595954047,1595954047),('Ascension Island','sv','',1595954047,1595954047),('Ascension Island','sv_FI','',1595954047,1595954047),('Ascension Island','tr','',1595954047,1595954047),('Ascension Island','uk','',1595954047,1595954047),('Ascension Island','zh_Hans','',1595954047,1595954047),('Australia','cs','',1595954047,1595954047),('Australia','de','',1595954047,1595954047),('Australia','en','',1595954047,1595954047),('Australia','es','',1595954047,1595954047),('Australia','fa','',1595954047,1595954047),('Australia','fr','',1595954047,1595954047),('Australia','it','',1595954047,1595954047),('Australia','ja','',1595954047,1595954047),('Australia','nl','',1595954047,1595954047),('Australia','pl','',1595954047,1595954047),('Australia','pt_BR','',1595954047,1595954047),('Australia','ru','',1595954047,1595954047),('Australia','sk','',1595954047,1595954047),('Australia','sv','',1595954047,1595954047),('Australia','sv_FI','',1595954047,1595954047),('Australia','tr','',1595954047,1595954047),('Australia','uk','',1595954047,1595954047),('Australia','zh_Hans','',1595954047,1595954047),('Austria','cs','',1595954047,1595954047),('Austria','de','',1595954047,1595954047),('Austria','en','',1595954047,1595954047),('Austria','es','',1595954047,1595954047),('Austria','fa','',1595954047,1595954047),('Austria','fr','',1595954047,1595954047),('Austria','it','',1595954047,1595954047),('Austria','ja','',1595954047,1595954047),('Austria','nl','',1595954047,1595954047),('Austria','pl','',1595954047,1595954047),('Austria','pt_BR','',1595954047,1595954047),('Austria','ru','',1595954047,1595954047),('Austria','sk','',1595954047,1595954047),('Austria','sv','',1595954047,1595954047),('Austria','sv_FI','',1595954047,1595954047),('Austria','tr','',1595954047,1595954047),('Austria','uk','',1595954047,1595954047),('Austria','zh_Hans','',1595954047,1595954047),('Azerbaijan','cs','',1595954047,1595954047),('Azerbaijan','de','',1595954047,1595954047),('Azerbaijan','en','',1595954047,1595954047),('Azerbaijan','es','',1595954047,1595954047),('Azerbaijan','fa','',1595954047,1595954047),('Azerbaijan','fr','',1595954047,1595954047),('Azerbaijan','it','',1595954047,1595954047),('Azerbaijan','ja','',1595954047,1595954047),('Azerbaijan','nl','',1595954047,1595954047),('Azerbaijan','pl','',1595954047,1595954047),('Azerbaijan','pt_BR','',1595954047,1595954047),('Azerbaijan','ru','',1595954047,1595954047),('Azerbaijan','sk','',1595954047,1595954047),('Azerbaijan','sv','',1595954047,1595954047),('Azerbaijan','sv_FI','',1595954047,1595954047),('Azerbaijan','tr','',1595954047,1595954047),('Azerbaijan','uk','',1595954047,1595954047),('Azerbaijan','zh_Hans','',1595954047,1595954047),('Bagnodoccia','cs','',1595922207,1595922207),('Bagnodoccia','de','',1595922207,1595922207),('Bagnodoccia','en','',1595922207,1595922207),('Bagnodoccia','es','',1595922207,1595922207),('Bagnodoccia','fa','',1595922207,1595922207),('Bagnodoccia','fr','',1595922207,1595922207),('Bagnodoccia','it','',1595922207,1595922207),('Bagnodoccia','ja','',1595922207,1595922207),('Bagnodoccia','nl','',1595922207,1595922207),('Bagnodoccia','pl','',1595922207,1595922207),('Bagnodoccia','pt_BR','',1595922207,1595922207),('Bagnodoccia','ru','',1595922207,1595922207),('Bagnodoccia','sk','',1595922207,1595922207),('Bagnodoccia','sv','',1595922207,1595922207),('Bagnodoccia','sv_FI','',1595922207,1595922207),('Bagnodoccia','tr','',1595922207,1595922207),('Bagnodoccia','uk','',1595922207,1595922207),('Bagnodoccia','zh_Hans','',1595922207,1595922207),('Bahamas','cs','',1595954047,1595954047),('Bahamas','de','',1595954047,1595954047),('Bahamas','en','',1595954047,1595954047),('Bahamas','es','',1595954047,1595954047),('Bahamas','fa','',1595954047,1595954047),('Bahamas','fr','',1595954047,1595954047),('Bahamas','it','',1595954047,1595954047),('Bahamas','ja','',1595954047,1595954047),('Bahamas','nl','',1595954047,1595954047),('Bahamas','pl','',1595954047,1595954047),('Bahamas','pt_BR','',1595954047,1595954047),('Bahamas','ru','',1595954047,1595954047),('Bahamas','sk','',1595954047,1595954047),('Bahamas','sv','',1595954047,1595954047),('Bahamas','sv_FI','',1595954047,1595954047),('Bahamas','tr','',1595954047,1595954047),('Bahamas','uk','',1595954047,1595954047),('Bahamas','zh_Hans','',1595954047,1595954047),('Bahrain','cs','',1595954047,1595954047),('Bahrain','de','',1595954047,1595954047),('Bahrain','en','',1595954047,1595954047),('Bahrain','es','',1595954047,1595954047),('Bahrain','fa','',1595954047,1595954047),('Bahrain','fr','',1595954047,1595954047),('Bahrain','it','',1595954047,1595954047),('Bahrain','ja','',1595954047,1595954047),('Bahrain','nl','',1595954047,1595954047),('Bahrain','pl','',1595954047,1595954047),('Bahrain','pt_BR','',1595954047,1595954047),('Bahrain','ru','',1595954047,1595954047),('Bahrain','sk','',1595954047,1595954047),('Bahrain','sv','',1595954047,1595954047),('Bahrain','sv_FI','',1595954047,1595954047),('Bahrain','tr','',1595954047,1595954047),('Bahrain','uk','',1595954047,1595954047),('Bahrain','zh_Hans','',1595954047,1595954047),('Bangladesh','cs','',1595954047,1595954047),('Bangladesh','de','',1595954047,1595954047),('Bangladesh','en','',1595954047,1595954047),('Bangladesh','es','',1595954047,1595954047),('Bangladesh','fa','',1595954047,1595954047),('Bangladesh','fr','',1595954047,1595954047),('Bangladesh','it','',1595954047,1595954047),('Bangladesh','ja','',1595954047,1595954047),('Bangladesh','nl','',1595954047,1595954047),('Bangladesh','pl','',1595954047,1595954047),('Bangladesh','pt_BR','',1595954047,1595954047),('Bangladesh','ru','',1595954047,1595954047),('Bangladesh','sk','',1595954047,1595954047),('Bangladesh','sv','',1595954047,1595954047),('Bangladesh','sv_FI','',1595954047,1595954047),('Bangladesh','tr','',1595954047,1595954047),('Bangladesh','uk','',1595954047,1595954047),('Bangladesh','zh_Hans','',1595954047,1595954047),('Barbados','cs','',1595954047,1595954047),('Barbados','de','',1595954047,1595954047),('Barbados','en','',1595954047,1595954047),('Barbados','es','',1595954047,1595954047),('Barbados','fa','',1595954047,1595954047),('Barbados','fr','',1595954047,1595954047),('Barbados','it','',1595954047,1595954047),('Barbados','ja','',1595954047,1595954047),('Barbados','nl','',1595954047,1595954047),('Barbados','pl','',1595954047,1595954047),('Barbados','pt_BR','',1595954047,1595954047),('Barbados','ru','',1595954047,1595954047),('Barbados','sk','',1595954047,1595954047),('Barbados','sv','',1595954047,1595954047),('Barbados','sv_FI','',1595954047,1595954047),('Barbados','tr','',1595954047,1595954047),('Barbados','uk','',1595954047,1595954047),('Barbados','zh_Hans','',1595954047,1595954047),('Belarus','cs','',1595954047,1595954047),('Belarus','de','',1595954047,1595954047),('Belarus','en','',1595954047,1595954047),('Belarus','es','',1595954047,1595954047),('Belarus','fa','',1595954047,1595954047),('Belarus','fr','',1595954047,1595954047),('Belarus','it','',1595954047,1595954047),('Belarus','ja','',1595954047,1595954047),('Belarus','nl','',1595954047,1595954047),('Belarus','pl','',1595954047,1595954047),('Belarus','pt_BR','',1595954047,1595954047),('Belarus','ru','',1595954047,1595954047),('Belarus','sk','',1595954047,1595954047),('Belarus','sv','',1595954047,1595954047),('Belarus','sv_FI','',1595954047,1595954047),('Belarus','tr','',1595954047,1595954047),('Belarus','uk','',1595954047,1595954047),('Belarus','zh_Hans','',1595954047,1595954047),('Belgium','cs','',1595954047,1595954047),('Belgium','de','',1595954047,1595954047),('Belgium','en','',1595954047,1595954047),('Belgium','es','',1595954047,1595954047),('Belgium','fa','',1595954047,1595954047),('Belgium','fr','',1595954047,1595954047),('Belgium','it','',1595954047,1595954047),('Belgium','ja','',1595954047,1595954047),('Belgium','nl','',1595954047,1595954047),('Belgium','pl','',1595954047,1595954047),('Belgium','pt_BR','',1595954047,1595954047),('Belgium','ru','',1595954047,1595954047),('Belgium','sk','',1595954047,1595954047),('Belgium','sv','',1595954047,1595954047),('Belgium','sv_FI','',1595954047,1595954047),('Belgium','tr','',1595954047,1595954047),('Belgium','uk','',1595954047,1595954047),('Belgium','zh_Hans','',1595954047,1595954047),('Belize','cs','',1595954047,1595954047),('Belize','de','',1595954047,1595954047),('Belize','en','',1595954047,1595954047),('Belize','es','',1595954047,1595954047),('Belize','fa','',1595954047,1595954047),('Belize','fr','',1595954047,1595954047),('Belize','it','',1595954047,1595954047),('Belize','ja','',1595954047,1595954047),('Belize','nl','',1595954047,1595954047),('Belize','pl','',1595954047,1595954047),('Belize','pt_BR','',1595954047,1595954047),('Belize','ru','',1595954047,1595954047),('Belize','sk','',1595954047,1595954047),('Belize','sv','',1595954047,1595954047),('Belize','sv_FI','',1595954047,1595954047),('Belize','tr','',1595954047,1595954047),('Belize','uk','',1595954047,1595954047),('Belize','zh_Hans','',1595954047,1595954047),('Benin','cs','',1595954048,1595954048),('Benin','de','',1595954048,1595954048),('Benin','en','',1595954048,1595954048),('Benin','es','',1595954048,1595954048),('Benin','fa','',1595954048,1595954048),('Benin','fr','',1595954048,1595954048),('Benin','it','',1595954048,1595954048),('Benin','ja','',1595954048,1595954048),('Benin','nl','',1595954048,1595954048),('Benin','pl','',1595954048,1595954048),('Benin','pt_BR','',1595954048,1595954048),('Benin','ru','',1595954048,1595954048),('Benin','sk','',1595954048,1595954048),('Benin','sv','',1595954048,1595954048),('Benin','sv_FI','',1595954048,1595954048),('Benin','tr','',1595954048,1595954048),('Benin','uk','',1595954048,1595954048),('Benin','zh_Hans','',1595954048,1595954048),('Bermuda','cs','',1595954048,1595954048),('Bermuda','de','',1595954048,1595954048),('Bermuda','en','',1595954048,1595954048),('Bermuda','es','',1595954048,1595954048),('Bermuda','fa','',1595954048,1595954048),('Bermuda','fr','',1595954048,1595954048),('Bermuda','it','',1595954048,1595954048),('Bermuda','ja','',1595954048,1595954048),('Bermuda','nl','',1595954048,1595954048),('Bermuda','pl','',1595954048,1595954048),('Bermuda','pt_BR','',1595954048,1595954048),('Bermuda','ru','',1595954048,1595954048),('Bermuda','sk','',1595954048,1595954048),('Bermuda','sv','',1595954048,1595954048),('Bermuda','sv_FI','',1595954048,1595954048),('Bermuda','tr','',1595954048,1595954048),('Bermuda','uk','',1595954048,1595954048),('Bermuda','zh_Hans','',1595954048,1595954048),('Bhutan','cs','',1595954048,1595954048),('Bhutan','de','',1595954048,1595954048),('Bhutan','en','',1595954048,1595954048),('Bhutan','es','',1595954048,1595954048),('Bhutan','fa','',1595954048,1595954048),('Bhutan','fr','',1595954048,1595954048),('Bhutan','it','',1595954048,1595954048),('Bhutan','ja','',1595954048,1595954048),('Bhutan','nl','',1595954048,1595954048),('Bhutan','pl','',1595954048,1595954048),('Bhutan','pt_BR','',1595954048,1595954048),('Bhutan','ru','',1595954048,1595954048),('Bhutan','sk','',1595954048,1595954048),('Bhutan','sv','',1595954048,1595954048),('Bhutan','sv_FI','',1595954048,1595954048),('Bhutan','tr','',1595954048,1595954048),('Bhutan','uk','',1595954048,1595954048),('Bhutan','zh_Hans','',1595954048,1595954048),('Bolivia','cs','',1595954048,1595954048),('Bolivia','de','',1595954048,1595954048),('Bolivia','en','',1595954048,1595954048),('Bolivia','es','',1595954048,1595954048),('Bolivia','fa','',1595954048,1595954048),('Bolivia','fr','',1595954048,1595954048),('Bolivia','it','',1595954048,1595954048),('Bolivia','ja','',1595954048,1595954048),('Bolivia','nl','',1595954048,1595954048),('Bolivia','pl','',1595954048,1595954048),('Bolivia','pt_BR','',1595954048,1595954048),('Bolivia','ru','',1595954048,1595954048),('Bolivia','sk','',1595954048,1595954048),('Bolivia','sv','',1595954048,1595954048),('Bolivia','sv_FI','',1595954048,1595954048),('Bolivia','tr','',1595954048,1595954048),('Bolivia','uk','',1595954048,1595954048),('Bolivia','zh_Hans','',1595954048,1595954048),('Bosnia & Herzegovina','cs','',1595954048,1595954048),('Bosnia & Herzegovina','de','',1595954048,1595954048),('Bosnia & Herzegovina','en','',1595954048,1595954048),('Bosnia & Herzegovina','es','',1595954048,1595954048),('Bosnia & Herzegovina','fa','',1595954048,1595954048),('Bosnia & Herzegovina','fr','',1595954048,1595954048),('Bosnia & Herzegovina','it','',1595954048,1595954048),('Bosnia & Herzegovina','ja','',1595954048,1595954048),('Bosnia & Herzegovina','nl','',1595954048,1595954048),('Bosnia & Herzegovina','pl','',1595954048,1595954048),('Bosnia & Herzegovina','pt_BR','',1595954048,1595954048),('Bosnia & Herzegovina','ru','',1595954048,1595954048),('Bosnia & Herzegovina','sk','',1595954048,1595954048),('Bosnia & Herzegovina','sv','',1595954048,1595954048),('Bosnia & Herzegovina','sv_FI','',1595954048,1595954048),('Bosnia & Herzegovina','tr','',1595954048,1595954048),('Bosnia & Herzegovina','uk','',1595954048,1595954048),('Bosnia & Herzegovina','zh_Hans','',1595954048,1595954048),('Botswana','cs','',1595954048,1595954048),('Botswana','de','',1595954048,1595954048),('Botswana','en','',1595954048,1595954048),('Botswana','es','',1595954048,1595954048),('Botswana','fa','',1595954048,1595954048),('Botswana','fr','',1595954048,1595954048),('Botswana','it','',1595954048,1595954048),('Botswana','ja','',1595954048,1595954048),('Botswana','nl','',1595954048,1595954048),('Botswana','pl','',1595954048,1595954048),('Botswana','pt_BR','',1595954048,1595954048),('Botswana','ru','',1595954048,1595954048),('Botswana','sk','',1595954048,1595954048),('Botswana','sv','',1595954048,1595954048),('Botswana','sv_FI','',1595954048,1595954048),('Botswana','tr','',1595954048,1595954048),('Botswana','uk','',1595954048,1595954048),('Botswana','zh_Hans','',1595954048,1595954048),('Brazil','cs','',1595954048,1595954048),('Brazil','de','',1595954048,1595954048),('Brazil','en','',1595954048,1595954048),('Brazil','es','',1595954048,1595954048),('Brazil','fa','',1595954048,1595954048),('Brazil','fr','',1595954048,1595954048),('Brazil','it','',1595954048,1595954048),('Brazil','ja','',1595954048,1595954048),('Brazil','nl','',1595954048,1595954048),('Brazil','pl','',1595954048,1595954048),('Brazil','pt_BR','',1595954048,1595954048),('Brazil','ru','',1595954048,1595954048),('Brazil','sk','',1595954048,1595954048),('Brazil','sv','',1595954048,1595954048),('Brazil','sv_FI','',1595954048,1595954048),('Brazil','tr','',1595954048,1595954048),('Brazil','uk','',1595954048,1595954048),('Brazil','zh_Hans','',1595954048,1595954048),('British Indian Ocean Territory','cs','',1595954048,1595954048),('British Indian Ocean Territory','de','',1595954048,1595954048),('British Indian Ocean Territory','en','',1595954048,1595954048),('British Indian Ocean Territory','es','',1595954048,1595954048),('British Indian Ocean Territory','fa','',1595954048,1595954048),('British Indian Ocean Territory','fr','',1595954048,1595954048),('British Indian Ocean Territory','it','',1595954048,1595954048),('British Indian Ocean Territory','ja','',1595954048,1595954048),('British Indian Ocean Territory','nl','',1595954048,1595954048),('British Indian Ocean Territory','pl','',1595954048,1595954048),('British Indian Ocean Territory','pt_BR','',1595954048,1595954048),('British Indian Ocean Territory','ru','',1595954048,1595954048),('British Indian Ocean Territory','sk','',1595954048,1595954048),('British Indian Ocean Territory','sv','',1595954048,1595954048),('British Indian Ocean Territory','sv_FI','',1595954048,1595954048),('British Indian Ocean Territory','tr','',1595954048,1595954048),('British Indian Ocean Territory','uk','',1595954048,1595954048),('British Indian Ocean Territory','zh_Hans','',1595954048,1595954048),('British Virgin Islands','cs','',1595954048,1595954048),('British Virgin Islands','de','',1595954048,1595954048),('British Virgin Islands','en','',1595954048,1595954048),('British Virgin Islands','es','',1595954048,1595954048),('British Virgin Islands','fa','',1595954048,1595954048),('British Virgin Islands','fr','',1595954048,1595954048),('British Virgin Islands','it','',1595954048,1595954048),('British Virgin Islands','ja','',1595954048,1595954048),('British Virgin Islands','nl','',1595954048,1595954048),('British Virgin Islands','pl','',1595954048,1595954048),('British Virgin Islands','pt_BR','',1595954048,1595954048),('British Virgin Islands','ru','',1595954048,1595954048),('British Virgin Islands','sk','',1595954048,1595954048),('British Virgin Islands','sv','',1595954048,1595954048),('British Virgin Islands','sv_FI','',1595954048,1595954048),('British Virgin Islands','tr','',1595954048,1595954048),('British Virgin Islands','uk','',1595954048,1595954048),('British Virgin Islands','zh_Hans','',1595954048,1595954048),('Brunei','cs','',1595954048,1595954048),('Brunei','de','',1595954048,1595954048),('Brunei','en','',1595954048,1595954048),('Brunei','es','',1595954048,1595954048),('Brunei','fa','',1595954048,1595954048),('Brunei','fr','',1595954048,1595954048),('Brunei','it','',1595954048,1595954048),('Brunei','ja','',1595954048,1595954048),('Brunei','nl','',1595954048,1595954048),('Brunei','pl','',1595954048,1595954048),('Brunei','pt_BR','',1595954048,1595954048),('Brunei','ru','',1595954048,1595954048),('Brunei','sk','',1595954048,1595954048),('Brunei','sv','',1595954048,1595954048),('Brunei','sv_FI','',1595954048,1595954048),('Brunei','tr','',1595954048,1595954048),('Brunei','uk','',1595954048,1595954048),('Brunei','zh_Hans','',1595954048,1595954048),('Bulgaria','cs','',1595954048,1595954048),('Bulgaria','de','',1595954048,1595954048),('Bulgaria','en','',1595954048,1595954048),('Bulgaria','es','',1595954048,1595954048),('Bulgaria','fa','',1595954048,1595954048),('Bulgaria','fr','',1595954048,1595954048),('Bulgaria','it','',1595954048,1595954048),('Bulgaria','ja','',1595954048,1595954048),('Bulgaria','nl','',1595954048,1595954048),('Bulgaria','pl','',1595954048,1595954048),('Bulgaria','pt_BR','',1595954048,1595954048),('Bulgaria','ru','',1595954048,1595954048),('Bulgaria','sk','',1595954048,1595954048),('Bulgaria','sv','',1595954048,1595954048),('Bulgaria','sv_FI','',1595954048,1595954048),('Bulgaria','tr','',1595954048,1595954048),('Bulgaria','uk','',1595954048,1595954048),('Bulgaria','zh_Hans','',1595954048,1595954048),('Burkina Faso','cs','',1595954048,1595954048),('Burkina Faso','de','',1595954048,1595954048),('Burkina Faso','en','',1595954048,1595954048),('Burkina Faso','es','',1595954048,1595954048),('Burkina Faso','fa','',1595954048,1595954048),('Burkina Faso','fr','',1595954048,1595954048),('Burkina Faso','it','',1595954048,1595954048),('Burkina Faso','ja','',1595954048,1595954048),('Burkina Faso','nl','',1595954048,1595954048),('Burkina Faso','pl','',1595954048,1595954048),('Burkina Faso','pt_BR','',1595954048,1595954048),('Burkina Faso','ru','',1595954048,1595954048),('Burkina Faso','sk','',1595954048,1595954048),('Burkina Faso','sv','',1595954048,1595954048),('Burkina Faso','sv_FI','',1595954048,1595954048),('Burkina Faso','tr','',1595954048,1595954048),('Burkina Faso','uk','',1595954048,1595954048),('Burkina Faso','zh_Hans','',1595954048,1595954048),('Burundi','cs','',1595954048,1595954048),('Burundi','de','',1595954048,1595954048),('Burundi','en','',1595954048,1595954048),('Burundi','es','',1595954048,1595954048),('Burundi','fa','',1595954048,1595954048),('Burundi','fr','',1595954048,1595954048),('Burundi','it','',1595954048,1595954048),('Burundi','ja','',1595954048,1595954048),('Burundi','nl','',1595954048,1595954048),('Burundi','pl','',1595954048,1595954048),('Burundi','pt_BR','',1595954048,1595954048),('Burundi','ru','',1595954048,1595954048),('Burundi','sk','',1595954048,1595954048),('Burundi','sv','',1595954048,1595954048),('Burundi','sv_FI','',1595954048,1595954048),('Burundi','tr','',1595954048,1595954048),('Burundi','uk','',1595954048,1595954048),('Burundi','zh_Hans','',1595954048,1595954048),('Bustine idrosolubili','cs','',1595922207,1595922207),('Bustine idrosolubili','de','',1595922207,1595922207),('Bustine idrosolubili','en','',1595922207,1595922207),('Bustine idrosolubili','es','',1595922207,1595922207),('Bustine idrosolubili','fa','',1595922207,1595922207),('Bustine idrosolubili','fr','',1595922207,1595922207),('Bustine idrosolubili','it','',1595922207,1595922207),('Bustine idrosolubili','ja','',1595922207,1595922207),('Bustine idrosolubili','nl','',1595922207,1595922207),('Bustine idrosolubili','pl','',1595922207,1595922207),('Bustine idrosolubili','pt_BR','',1595922207,1595922207),('Bustine idrosolubili','ru','',1595922207,1595922207),('Bustine idrosolubili','sk','',1595922207,1595922207),('Bustine idrosolubili','sv','',1595922207,1595922207),('Bustine idrosolubili','sv_FI','',1595922207,1595922207),('Bustine idrosolubili','tr','',1595922207,1595922207),('Bustine idrosolubili','uk','',1595922207,1595922207),('Bustine idrosolubili','zh_Hans','',1595922207,1595922207),('Bustine orosolubili','cs','',1595922207,1595922207),('Bustine orosolubili','de','',1595922207,1595922207),('Bustine orosolubili','en','',1595922207,1595922207),('Bustine orosolubili','es','',1595922207,1595922207),('Bustine orosolubili','fa','',1595922207,1595922207),('Bustine orosolubili','fr','',1595922207,1595922207),('Bustine orosolubili','it','',1595922207,1595922207),('Bustine orosolubili','ja','',1595922207,1595922207),('Bustine orosolubili','nl','',1595922207,1595922207),('Bustine orosolubili','pl','',1595922207,1595922207),('Bustine orosolubili','pt_BR','',1595922207,1595922207),('Bustine orosolubili','ru','',1595922207,1595922207),('Bustine orosolubili','sk','',1595922207,1595922207),('Bustine orosolubili','sv','',1595922207,1595922207),('Bustine orosolubili','sv_FI','',1595922207,1595922207),('Bustine orosolubili','tr','',1595922207,1595922207),('Bustine orosolubili','uk','',1595922207,1595922207),('Bustine orosolubili','zh_Hans','',1595922207,1595922207),('CAP','cs','',1595953867,1595953867),('CAP','de','',1595953867,1595953867),('CAP','en','',1595953867,1595953867),('CAP','es','',1595953867,1595953867),('CAP','fa','',1595953867,1595953867),('CAP','fr','',1595953867,1595953867),('CAP','it','',1595953867,1595953867),('CAP','ja','',1595953867,1595953867),('CAP','nl','',1595953867,1595953867),('CAP','pl','',1595953867,1595953867),('CAP','pt_BR','',1595953867,1595953867),('CAP','ru','',1595953867,1595953867),('CAP','sk','',1595953867,1595953867),('CAP','sv','',1595953867,1595953867),('CAP','sv_FI','',1595953867,1595953867),('CAP','tr','',1595953867,1595953867),('CAP','uk','',1595953867,1595953867),('CAP','zh_Hans','',1595953867,1595953867),('CSV Export','cs','',1595918163,1595918163),('CSV Export','de','',1595918163,1595918163),('CSV Export','en','',1595918163,1595918163),('CSV Export','es','',1595918163,1595918163),('CSV Export','fa','',1595918163,1595918163),('CSV Export','fr','',1595918163,1595918163),('CSV Export','it','',1595918163,1595918163),('CSV Export','ja','',1595918163,1595918163),('CSV Export','nl','',1595918163,1595918163),('CSV Export','pl','',1595918163,1595918163),('CSV Export','pt_BR','',1595918163,1595918163),('CSV Export','ru','',1595918163,1595918163),('CSV Export','sk','',1595918163,1595918163),('CSV Export','sv','',1595918163,1595918163),('CSV Export','sv_FI','',1595918163,1595918163),('CSV Export','tr','',1595918163,1595918163),('CSV Export','uk','',1595918163,1595918163),('CSV Export','zh_Hans','',1595918163,1595918163),('Cambodia','cs','',1595954048,1595954048),('Cambodia','de','',1595954048,1595954048),('Cambodia','en','',1595954048,1595954048),('Cambodia','es','',1595954048,1595954048),('Cambodia','fa','',1595954048,1595954048),('Cambodia','fr','',1595954048,1595954048),('Cambodia','it','',1595954048,1595954048),('Cambodia','ja','',1595954048,1595954048),('Cambodia','nl','',1595954048,1595954048),('Cambodia','pl','',1595954048,1595954048),('Cambodia','pt_BR','',1595954048,1595954048),('Cambodia','ru','',1595954048,1595954048),('Cambodia','sk','',1595954048,1595954048),('Cambodia','sv','',1595954048,1595954048),('Cambodia','sv_FI','',1595954048,1595954048),('Cambodia','tr','',1595954048,1595954048),('Cambodia','uk','',1595954048,1595954048),('Cambodia','zh_Hans','',1595954048,1595954048),('Cameroon','cs','',1595954048,1595954048),('Cameroon','de','',1595954048,1595954048),('Cameroon','en','',1595954048,1595954048),('Cameroon','es','',1595954048,1595954048),('Cameroon','fa','',1595954048,1595954048),('Cameroon','fr','',1595954048,1595954048),('Cameroon','it','',1595954048,1595954048),('Cameroon','ja','',1595954048,1595954048),('Cameroon','nl','',1595954048,1595954048),('Cameroon','pl','',1595954048,1595954048),('Cameroon','pt_BR','',1595954048,1595954048),('Cameroon','ru','',1595954048,1595954048),('Cameroon','sk','',1595954048,1595954048),('Cameroon','sv','',1595954048,1595954048),('Cameroon','sv_FI','',1595954048,1595954048),('Cameroon','tr','',1595954048,1595954048),('Cameroon','uk','',1595954048,1595954048),('Cameroon','zh_Hans','',1595954048,1595954048),('Canada','cs','',1595954048,1595954048),('Canada','de','',1595954048,1595954048),('Canada','en','',1595954048,1595954048),('Canada','es','',1595954048,1595954048),('Canada','fa','',1595954048,1595954048),('Canada','fr','',1595954048,1595954048),('Canada','it','',1595954048,1595954048),('Canada','ja','',1595954048,1595954048),('Canada','nl','',1595954048,1595954048),('Canada','pl','',1595954048,1595954048),('Canada','pt_BR','',1595954048,1595954048),('Canada','ru','',1595954048,1595954048),('Canada','sk','',1595954048,1595954048),('Canada','sv','',1595954048,1595954048),('Canada','sv_FI','',1595954048,1595954048),('Canada','tr','',1595954048,1595954048),('Canada','uk','',1595954048,1595954048),('Canada','zh_Hans','',1595954048,1595954048),('Canary Islands','cs','',1595954048,1595954048),('Canary Islands','de','',1595954048,1595954048),('Canary Islands','en','',1595954048,1595954048),('Canary Islands','es','',1595954048,1595954048),('Canary Islands','fa','',1595954048,1595954048),('Canary Islands','fr','',1595954048,1595954048),('Canary Islands','it','',1595954048,1595954048),('Canary Islands','ja','',1595954048,1595954048),('Canary Islands','nl','',1595954048,1595954048),('Canary Islands','pl','',1595954048,1595954048),('Canary Islands','pt_BR','',1595954048,1595954048),('Canary Islands','ru','',1595954048,1595954048),('Canary Islands','sk','',1595954048,1595954048),('Canary Islands','sv','',1595954048,1595954048),('Canary Islands','sv_FI','',1595954048,1595954048),('Canary Islands','tr','',1595954048,1595954048),('Canary Islands','uk','',1595954048,1595954048),('Canary Islands','zh_Hans','',1595954048,1595954048),('Cape Verde','cs','',1595954048,1595954048),('Cape Verde','de','',1595954048,1595954048),('Cape Verde','en','',1595954048,1595954048),('Cape Verde','es','',1595954048,1595954048),('Cape Verde','fa','',1595954048,1595954048),('Cape Verde','fr','',1595954048,1595954048),('Cape Verde','it','',1595954048,1595954048),('Cape Verde','ja','',1595954048,1595954048),('Cape Verde','nl','',1595954048,1595954048),('Cape Verde','pl','',1595954048,1595954048),('Cape Verde','pt_BR','',1595954048,1595954048),('Cape Verde','ru','',1595954048,1595954048),('Cape Verde','sk','',1595954048,1595954048),('Cape Verde','sv','',1595954048,1595954048),('Cape Verde','sv_FI','',1595954048,1595954048),('Cape Verde','tr','',1595954048,1595954048),('Cape Verde','uk','',1595954048,1595954048),('Cape Verde','zh_Hans','',1595954048,1595954048),('Capsule','cs','',1595922207,1595922207),('Capsule','de','',1595922207,1595922207),('Capsule','en','',1595922207,1595922207),('Capsule','es','',1595922207,1595922207),('Capsule','fa','',1595922207,1595922207),('Capsule','fr','',1595922207,1595922207),('Capsule','it','',1595922207,1595922207),('Capsule','ja','',1595922207,1595922207),('Capsule','nl','',1595922207,1595922207),('Capsule','pl','',1595922207,1595922207),('Capsule','pt_BR','',1595922207,1595922207),('Capsule','ru','',1595922207,1595922207),('Capsule','sk','',1595922207,1595922207),('Capsule','sv','',1595922207,1595922207),('Capsule','sv_FI','',1595922207,1595922207),('Capsule','tr','',1595922207,1595922207),('Capsule','uk','',1595922207,1595922207),('Capsule','zh_Hans','',1595922207,1595922207),('Caramelle','cs','',1595922207,1595922207),('Caramelle','de','',1595922207,1595922207),('Caramelle','en','',1595922207,1595922207),('Caramelle','es','',1595922207,1595922207),('Caramelle','fa','',1595922207,1595922207),('Caramelle','fr','',1595922207,1595922207),('Caramelle','it','',1595922207,1595922207),('Caramelle','ja','',1595922207,1595922207),('Caramelle','nl','',1595922207,1595922207),('Caramelle','pl','',1595922207,1595922207),('Caramelle','pt_BR','',1595922207,1595922207),('Caramelle','ru','',1595922207,1595922207),('Caramelle','sk','',1595922207,1595922207),('Caramelle','sv','',1595922207,1595922207),('Caramelle','sv_FI','',1595922207,1595922207),('Caramelle','tr','',1595922207,1595922207),('Caramelle','uk','',1595922207,1595922207),('Caramelle','zh_Hans','',1595922207,1595922207),('Caribbean Netherlands','cs','',1595954048,1595954048),('Caribbean Netherlands','de','',1595954048,1595954048),('Caribbean Netherlands','en','',1595954048,1595954048),('Caribbean Netherlands','es','',1595954048,1595954048),('Caribbean Netherlands','fa','',1595954048,1595954048),('Caribbean Netherlands','fr','',1595954048,1595954048),('Caribbean Netherlands','it','',1595954048,1595954048),('Caribbean Netherlands','ja','',1595954048,1595954048),('Caribbean Netherlands','nl','',1595954048,1595954048),('Caribbean Netherlands','pl','',1595954048,1595954048),('Caribbean Netherlands','pt_BR','',1595954048,1595954048),('Caribbean Netherlands','ru','',1595954048,1595954048),('Caribbean Netherlands','sk','',1595954048,1595954048),('Caribbean Netherlands','sv','',1595954048,1595954048),('Caribbean Netherlands','sv_FI','',1595954048,1595954048),('Caribbean Netherlands','tr','',1595954048,1595954048),('Caribbean Netherlands','uk','',1595954048,1595954048),('Caribbean Netherlands','zh_Hans','',1595954048,1595954048),('Category','cs','',1607375949,1607375949),('Category','de','',1607375949,1607375949),('Category','en','',1607375949,1607375949),('Category','es','',1607375949,1607375949),('Category','fa','',1607375949,1607375949),('Category','fr','',1607375949,1607375949),('Category','it','',1607375949,1607375949),('Category','ja','',1607375949,1607375949),('Category','nl','',1607375949,1607375949),('Category','pl','',1607375949,1607375949),('Category','pt_BR','',1607375949,1607375949),('Category','ru','',1607375949,1607375949),('Category','sk','',1607375949,1607375949),('Category','sv','',1607375949,1607375949),('Category','sv_FI','',1607375949,1607375949),('Category','tr','',1607375949,1607375949),('Category','uk','',1607375949,1607375949),('Category','zh_Hans','',1607375949,1607375949),('Category Data','cs','',1607709971,1607709971),('Category Data','de','',1607709971,1607709971),('Category Data','en','',1607709971,1607709971),('Category Data','es','',1607709971,1607709971),('Category Data','fa','',1607709971,1607709971),('Category Data','fr','',1607709971,1607709971),('Category Data','it','',1607709971,1607709971),('Category Data','ja','',1607709971,1607709971),('Category Data','nl','',1607709971,1607709971),('Category Data','pl','',1607709971,1607709971),('Category Data','pt_BR','',1607709971,1607709971),('Category Data','ru','',1607709971,1607709971),('Category Data','sk','',1607709971,1607709971),('Category Data','sv','',1607709971,1607709971),('Category Data','sv_FI','',1607709971,1607709971),('Category Data','tr','',1607709971,1607709971),('Category Data','uk','',1607709971,1607709971),('Category Data','zh_Hans','',1607709971,1607709971),('Cayman Islands','cs','',1595954048,1595954048),('Cayman Islands','de','',1595954048,1595954048),('Cayman Islands','en','',1595954048,1595954048),('Cayman Islands','es','',1595954048,1595954048),('Cayman Islands','fa','',1595954048,1595954048),('Cayman Islands','fr','',1595954048,1595954048),('Cayman Islands','it','',1595954048,1595954048),('Cayman Islands','ja','',1595954048,1595954048),('Cayman Islands','nl','',1595954048,1595954048),('Cayman Islands','pl','',1595954048,1595954048),('Cayman Islands','pt_BR','',1595954048,1595954048),('Cayman Islands','ru','',1595954048,1595954048),('Cayman Islands','sk','',1595954048,1595954048),('Cayman Islands','sv','',1595954048,1595954048),('Cayman Islands','sv_FI','',1595954048,1595954048),('Cayman Islands','tr','',1595954048,1595954048),('Cayman Islands','uk','',1595954048,1595954048),('Cayman Islands','zh_Hans','',1595954048,1595954048),('Centimeters','cs','',1607157350,1607157350),('Centimeters','de','',1607157350,1607157350),('Centimeters','en','',1607157350,1607157350),('Centimeters','es','',1607157350,1607157350),('Centimeters','fa','',1607157350,1607157350),('Centimeters','fr','',1607157350,1607157350),('Centimeters','it','',1607157350,1607157350),('Centimeters','ja','',1607157350,1607157350),('Centimeters','nl','',1607157350,1607157350),('Centimeters','pl','',1607157350,1607157350),('Centimeters','pt_BR','',1607157350,1607157350),('Centimeters','ru','',1607157350,1607157350),('Centimeters','sk','',1607157350,1607157350),('Centimeters','sv','',1607157350,1607157350),('Centimeters','sv_FI','',1607157350,1607157350),('Centimeters','tr','',1607157350,1607157350),('Centimeters','uk','',1607157350,1607157350),('Centimeters','zh_Hans','',1607157350,1607157350),('Central African Republic','cs','',1595954048,1595954048),('Central African Republic','de','',1595954048,1595954048),('Central African Republic','en','',1595954048,1595954048),('Central African Republic','es','',1595954048,1595954048),('Central African Republic','fa','',1595954048,1595954048),('Central African Republic','fr','',1595954048,1595954048),('Central African Republic','it','',1595954048,1595954048),('Central African Republic','ja','',1595954048,1595954048),('Central African Republic','nl','',1595954048,1595954048),('Central African Republic','pl','',1595954048,1595954048),('Central African Republic','pt_BR','',1595954048,1595954048),('Central African Republic','ru','',1595954048,1595954048),('Central African Republic','sk','',1595954048,1595954048),('Central African Republic','sv','',1595954048,1595954048),('Central African Republic','sv_FI','',1595954048,1595954048),('Central African Republic','tr','',1595954048,1595954048),('Central African Republic','uk','',1595954048,1595954048),('Central African Republic','zh_Hans','',1595954048,1595954048),('Ceuta & Melilla','cs','',1595954048,1595954048),('Ceuta & Melilla','de','',1595954048,1595954048),('Ceuta & Melilla','en','',1595954048,1595954048),('Ceuta & Melilla','es','',1595954048,1595954048),('Ceuta & Melilla','fa','',1595954048,1595954048),('Ceuta & Melilla','fr','',1595954048,1595954048),('Ceuta & Melilla','it','',1595954048,1595954048),('Ceuta & Melilla','ja','',1595954048,1595954048),('Ceuta & Melilla','nl','',1595954048,1595954048),('Ceuta & Melilla','pl','',1595954048,1595954048),('Ceuta & Melilla','pt_BR','',1595954048,1595954048),('Ceuta & Melilla','ru','',1595954048,1595954048),('Ceuta & Melilla','sk','',1595954048,1595954048),('Ceuta & Melilla','sv','',1595954048,1595954048),('Ceuta & Melilla','sv_FI','',1595954048,1595954048),('Ceuta & Melilla','tr','',1595954048,1595954048),('Ceuta & Melilla','uk','',1595954048,1595954048),('Ceuta & Melilla','zh_Hans','',1595954048,1595954048),('Chad','cs','',1595954048,1595954048),('Chad','de','',1595954048,1595954048),('Chad','en','',1595954048,1595954048),('Chad','es','',1595954048,1595954048),('Chad','fa','',1595954048,1595954048),('Chad','fr','',1595954048,1595954048),('Chad','it','',1595954048,1595954048),('Chad','ja','',1595954048,1595954048),('Chad','nl','',1595954048,1595954048),('Chad','pl','',1595954048,1595954048),('Chad','pt_BR','',1595954048,1595954048),('Chad','ru','',1595954048,1595954048),('Chad','sk','',1595954048,1595954048),('Chad','sv','',1595954048,1595954048),('Chad','sv_FI','',1595954048,1595954048),('Chad','tr','',1595954048,1595954048),('Chad','uk','',1595954048,1595954048),('Chad','zh_Hans','',1595954048,1595954048),('Chile','cs','',1595954048,1595954048),('Chile','de','',1595954048,1595954048),('Chile','en','',1595954048,1595954048),('Chile','es','',1595954048,1595954048),('Chile','fa','',1595954048,1595954048),('Chile','fr','',1595954048,1595954048),('Chile','it','',1595954048,1595954048),('Chile','ja','',1595954048,1595954048),('Chile','nl','',1595954048,1595954048),('Chile','pl','',1595954048,1595954048),('Chile','pt_BR','',1595954048,1595954048),('Chile','ru','',1595954048,1595954048),('Chile','sk','',1595954048,1595954048),('Chile','sv','',1595954048,1595954048),('Chile','sv_FI','',1595954048,1595954048),('Chile','tr','',1595954048,1595954048),('Chile','uk','',1595954048,1595954048),('Chile','zh_Hans','',1595954048,1595954048),('Chilogrammo','cs','',1595922931,1595922931),('Chilogrammo','de','',1595922931,1595922931),('Chilogrammo','en','',1595922931,1595922931),('Chilogrammo','es','',1595922931,1595922931),('Chilogrammo','fa','',1595922931,1595922931),('Chilogrammo','fr','',1595922931,1595922931),('Chilogrammo','it','',1595922931,1595922931),('Chilogrammo','ja','',1595922931,1595922931),('Chilogrammo','nl','',1595922931,1595922931),('Chilogrammo','pl','',1595922931,1595922931),('Chilogrammo','pt_BR','',1595922931,1595922931),('Chilogrammo','ru','',1595922931,1595922931),('Chilogrammo','sk','',1595922931,1595922931),('Chilogrammo','sv','',1595922931,1595922931),('Chilogrammo','sv_FI','',1595922931,1595922931),('Chilogrammo','tr','',1595922931,1595922931),('Chilogrammo','uk','',1595922931,1595922931),('Chilogrammo','zh_Hans','',1595922931,1595922931),('China','cs','',1595954048,1595954048),('China','de','',1595954048,1595954048),('China','en','',1595954048,1595954048),('China','es','',1595954048,1595954048),('China','fa','',1595954048,1595954048),('China','fr','',1595954048,1595954048),('China','it','',1595954048,1595954048),('China','ja','',1595954048,1595954048),('China','nl','',1595954048,1595954048),('China','pl','',1595954048,1595954048),('China','pt_BR','',1595954048,1595954048),('China','ru','',1595954048,1595954048),('China','sk','',1595954048,1595954048),('China','sv','',1595954048,1595954048),('China','sv_FI','',1595954048,1595954048),('China','tr','',1595954048,1595954048),('China','uk','',1595954048,1595954048),('China','zh_Hans','',1595954048,1595954048),('Chiuso','cs','',1595955187,1595955187),('Chiuso','de','',1595955187,1595955187),('Chiuso','en','',1595955187,1595955187),('Chiuso','es','',1595955187,1595955187),('Chiuso','fa','',1595955187,1595955187),('Chiuso','fr','',1595955187,1595955187),('Chiuso','it','',1595955187,1595955187),('Chiuso','ja','',1595955187,1595955187),('Chiuso','nl','',1595955187,1595955187),('Chiuso','pl','',1595955187,1595955187),('Chiuso','pt_BR','',1595955187,1595955187),('Chiuso','ru','',1595955187,1595955187),('Chiuso','sk','',1595955187,1595955187),('Chiuso','sv','',1595955187,1595955187),('Chiuso','sv_FI','',1595955187,1595955187),('Chiuso','tr','',1595955187,1595955187),('Chiuso','uk','',1595955187,1595955187),('Chiuso','zh_Hans','',1595955187,1595955187),('Christmas Island','cs','',1595954048,1595954048),('Christmas Island','de','',1595954048,1595954048),('Christmas Island','en','',1595954048,1595954048),('Christmas Island','es','',1595954048,1595954048),('Christmas Island','fa','',1595954048,1595954048),('Christmas Island','fr','',1595954048,1595954048),('Christmas Island','it','',1595954048,1595954048),('Christmas Island','ja','',1595954048,1595954048),('Christmas Island','nl','',1595954048,1595954048),('Christmas Island','pl','',1595954048,1595954048),('Christmas Island','pt_BR','',1595954048,1595954048),('Christmas Island','ru','',1595954048,1595954048),('Christmas Island','sk','',1595954048,1595954048),('Christmas Island','sv','',1595954048,1595954048),('Christmas Island','sv_FI','',1595954048,1595954048),('Christmas Island','tr','',1595954048,1595954048),('Christmas Island','uk','',1595954048,1595954048),('Christmas Island','zh_Hans','',1595954048,1595954048),('Città','cs','',1595953867,1595953867),('Città','de','',1595953867,1595953867),('Città','en','',1595953867,1595953867),('Città','es','',1595953867,1595953867),('Città','fa','',1595953867,1595953867),('Città','fr','',1595953867,1595953867),('Città','it','',1595953867,1595953867),('Città','ja','',1595953867,1595953867),('Città','nl','',1595953867,1595953867),('Città','pl','',1595953867,1595953867),('Città','pt_BR','',1595953867,1595953867),('Città','ru','',1595953867,1595953867),('Città','sk','',1595953867,1595953867),('Città','sv','',1595953867,1595953867),('Città','sv_FI','',1595953867,1595953867),('Città','tr','',1595953867,1595953867),('Città','uk','',1595953867,1595953867),('Città','zh_Hans','',1595953867,1595953867),('Classe Tassa','cs','',1595922207,1595922207),('Classe Tassa','de','',1595922207,1595922207),('Classe Tassa','en','',1595922207,1595922207),('Classe Tassa','es','',1595922207,1595922207),('Classe Tassa','fa','',1595922207,1595922207),('Classe Tassa','fr','',1595922207,1595922207),('Classe Tassa','it','',1595922207,1595922207),('Classe Tassa','ja','',1595922207,1595922207),('Classe Tassa','nl','',1595922207,1595922207),('Classe Tassa','pl','',1595922207,1595922207),('Classe Tassa','pt_BR','',1595922207,1595922207),('Classe Tassa','ru','',1595922207,1595922207),('Classe Tassa','sk','',1595922207,1595922207),('Classe Tassa','sv','',1595922207,1595922207),('Classe Tassa','sv_FI','',1595922207,1595922207),('Classe Tassa','tr','',1595922207,1595922207),('Classe Tassa','uk','',1595922207,1595922207),('Classe Tassa','zh_Hans','',1595922207,1595922207),('Closed','cs','',1595954198,1595954198),('Closed','de','',1595954198,1595954198),('Closed','en','',1595954198,1595954198),('Closed','es','',1595954198,1595954198),('Closed','fa','',1595954198,1595954198),('Closed','fr','',1595954198,1595954198),('Closed','it','',1595954198,1595954198),('Closed','ja','',1595954198,1595954198),('Closed','nl','',1595954198,1595954198),('Closed','pl','',1595954198,1595954198),('Closed','pt_BR','',1595954198,1595954198),('Closed','ru','',1595954198,1595954198),('Closed','sk','',1595954198,1595954198),('Closed','sv','',1595954198,1595954198),('Closed','sv_FI','',1595954198,1595954198),('Closed','tr','',1595954198,1595954198),('Closed','uk','',1595954198,1595954198),('Closed','zh_Hans','',1595954198,1595954198),('Closing Time','cs','',1595954198,1595954198),('Closing Time','de','',1595954198,1595954198),('Closing Time','en','',1595954198,1595954198),('Closing Time','es','',1595954198,1595954198),('Closing Time','fa','',1595954198,1595954198),('Closing Time','fr','',1595954198,1595954198),('Closing Time','it','',1595954198,1595954198),('Closing Time','ja','',1595954198,1595954198),('Closing Time','nl','',1595954198,1595954198),('Closing Time','pl','',1595954198,1595954198),('Closing Time','pt_BR','',1595954198,1595954198),('Closing Time','ru','',1595954198,1595954198),('Closing Time','sk','',1595954198,1595954198),('Closing Time','sv','',1595954198,1595954198),('Closing Time','sv_FI','',1595954198,1595954198),('Closing Time','tr','',1595954198,1595954198),('Closing Time','uk','',1595954198,1595954198),('Closing Time','zh_Hans','',1595954198,1595954198),('Cocos (Keeling) Islands','cs','',1595954048,1595954048),('Cocos (Keeling) Islands','de','',1595954048,1595954048),('Cocos (Keeling) Islands','en','',1595954048,1595954048),('Cocos (Keeling) Islands','es','',1595954048,1595954048),('Cocos (Keeling) Islands','fa','',1595954048,1595954048),('Cocos (Keeling) Islands','fr','',1595954048,1595954048),('Cocos (Keeling) Islands','it','',1595954048,1595954048),('Cocos (Keeling) Islands','ja','',1595954048,1595954048),('Cocos (Keeling) Islands','nl','',1595954048,1595954048),('Cocos (Keeling) Islands','pl','',1595954048,1595954048),('Cocos (Keeling) Islands','pt_BR','',1595954048,1595954048),('Cocos (Keeling) Islands','ru','',1595954048,1595954048),('Cocos (Keeling) Islands','sk','',1595954048,1595954048),('Cocos (Keeling) Islands','sv','',1595954048,1595954048),('Cocos (Keeling) Islands','sv_FI','',1595954048,1595954048),('Cocos (Keeling) Islands','tr','',1595954048,1595954048),('Cocos (Keeling) Islands','uk','',1595954048,1595954048),('Cocos (Keeling) Islands','zh_Hans','',1595954048,1595954048),('Codice a Barre','cs','',1595922208,1595922208),('Codice a Barre','de','',1595922208,1595922208),('Codice a Barre','en','',1595922208,1595922208),('Codice a Barre','es','',1595922208,1595922208),('Codice a Barre','fa','',1595922208,1595922208),('Codice a Barre','fr','',1595922208,1595922208),('Codice a Barre','it','',1595922208,1595922208),('Codice a Barre','ja','',1595922208,1595922208),('Codice a Barre','nl','',1595922208,1595922208),('Codice a Barre','pl','',1595922208,1595922208),('Codice a Barre','pt_BR','',1595922208,1595922208),('Codice a Barre','ru','',1595922208,1595922208),('Codice a Barre','sk','',1595922208,1595922208),('Codice a Barre','sv','',1595922208,1595922208),('Codice a Barre','sv_FI','',1595922208,1595922208),('Codice a Barre','tr','',1595922208,1595922208),('Codice a Barre','uk','',1595922208,1595922208),('Codice a Barre','zh_Hans','',1595922208,1595922208),('Cognome','cs','',1595953778,1595953778),('Cognome','de','',1595953778,1595953778),('Cognome','en','',1595953778,1595953778),('Cognome','es','',1595953778,1595953778),('Cognome','fa','',1595953778,1595953778),('Cognome','fr','',1595953778,1595953778),('Cognome','it','',1595953778,1595953778),('Cognome','ja','',1595953778,1595953778),('Cognome','nl','',1595953778,1595953778),('Cognome','pl','',1595953778,1595953778),('Cognome','pt_BR','',1595953778,1595953778),('Cognome','ru','',1595953778,1595953778),('Cognome','sk','',1595953778,1595953778),('Cognome','sv','',1595953778,1595953778),('Cognome','sv_FI','',1595953778,1595953778),('Cognome','tr','',1595953778,1595953778),('Cognome','uk','',1595953778,1595953778),('Cognome','zh_Hans','',1595953778,1595953778),('Colluttorio','cs','',1595922207,1595922207),('Colluttorio','de','',1595922207,1595922207),('Colluttorio','en','',1595922207,1595922207),('Colluttorio','es','',1595922207,1595922207),('Colluttorio','fa','',1595922207,1595922207),('Colluttorio','fr','',1595922207,1595922207),('Colluttorio','it','',1595922207,1595922207),('Colluttorio','ja','',1595922207,1595922207),('Colluttorio','nl','',1595922207,1595922207),('Colluttorio','pl','',1595922207,1595922207),('Colluttorio','pt_BR','',1595922207,1595922207),('Colluttorio','ru','',1595922207,1595922207),('Colluttorio','sk','',1595922207,1595922207),('Colluttorio','sv','',1595922207,1595922207),('Colluttorio','sv_FI','',1595922207,1595922207),('Colluttorio','tr','',1595922207,1595922207),('Colluttorio','uk','',1595922207,1595922207),('Colluttorio','zh_Hans','',1595922207,1595922207),('Colombia','cs','',1595954048,1595954048),('Colombia','de','',1595954048,1595954048),('Colombia','en','',1595954048,1595954048),('Colombia','es','',1595954048,1595954048),('Colombia','fa','',1595954048,1595954048),('Colombia','fr','',1595954048,1595954048),('Colombia','it','',1595954048,1595954048),('Colombia','ja','',1595954048,1595954048),('Colombia','nl','',1595954048,1595954048),('Colombia','pl','',1595954048,1595954048),('Colombia','pt_BR','',1595954048,1595954048),('Colombia','ru','',1595954048,1595954048),('Colombia','sk','',1595954048,1595954048),('Colombia','sv','',1595954048,1595954048),('Colombia','sv_FI','',1595954048,1595954048),('Colombia','tr','',1595954048,1595954048),('Colombia','uk','',1595954048,1595954048),('Colombia','zh_Hans','',1595954048,1595954048),('Comoros','cs','',1595954048,1595954048),('Comoros','de','',1595954048,1595954048),('Comoros','en','',1595954048,1595954048),('Comoros','es','',1595954048,1595954048),('Comoros','fa','',1595954048,1595954048),('Comoros','fr','',1595954048,1595954048),('Comoros','it','',1595954048,1595954048),('Comoros','ja','',1595954048,1595954048),('Comoros','nl','',1595954048,1595954048),('Comoros','pl','',1595954048,1595954048),('Comoros','pt_BR','',1595954048,1595954048),('Comoros','ru','',1595954048,1595954048),('Comoros','sk','',1595954048,1595954048),('Comoros','sv','',1595954048,1595954048),('Comoros','sv_FI','',1595954048,1595954048),('Comoros','tr','',1595954048,1595954048),('Comoros','uk','',1595954048,1595954048),('Comoros','zh_Hans','',1595954048,1595954048),('Compresse','cs','',1595922207,1595922207),('Compresse','de','',1595922207,1595922207),('Compresse','en','',1595922207,1595922207),('Compresse','es','',1595922207,1595922207),('Compresse','fa','',1595922207,1595922207),('Compresse','fr','',1595922207,1595922207),('Compresse','it','',1595922207,1595922207),('Compresse','ja','',1595922207,1595922207),('Compresse','nl','',1595922207,1595922207),('Compresse','pl','',1595922207,1595922207),('Compresse','pt_BR','',1595922207,1595922207),('Compresse','ru','',1595922207,1595922207),('Compresse','sk','',1595922207,1595922207),('Compresse','sv','',1595922207,1595922207),('Compresse','sv_FI','',1595922207,1595922207),('Compresse','tr','',1595922207,1595922207),('Compresse','uk','',1595922207,1595922207),('Compresse','zh_Hans','',1595922207,1595922207),('Compresse masticabili','cs','',1595922208,1595922208),('Compresse masticabili','de','',1595922208,1595922208),('Compresse masticabili','en','',1595922208,1595922208),('Compresse masticabili','es','',1595922208,1595922208),('Compresse masticabili','fa','',1595922208,1595922208),('Compresse masticabili','fr','',1595922208,1595922208),('Compresse masticabili','it','',1595922208,1595922208),('Compresse masticabili','ja','',1595922208,1595922208),('Compresse masticabili','nl','',1595922208,1595922208),('Compresse masticabili','pl','',1595922208,1595922208),('Compresse masticabili','pt_BR','',1595922208,1595922208),('Compresse masticabili','ru','',1595922208,1595922208),('Compresse masticabili','sk','',1595922208,1595922208),('Compresse masticabili','sv','',1595922208,1595922208),('Compresse masticabili','sv_FI','',1595922208,1595922208),('Compresse masticabili','tr','',1595922208,1595922208),('Compresse masticabili','uk','',1595922208,1595922208),('Compresse masticabili','zh_Hans','',1595922208,1595922208),('Concentrato fluido','cs','',1595922208,1595922208),('Concentrato fluido','de','',1595922208,1595922208),('Concentrato fluido','en','',1595922208,1595922208),('Concentrato fluido','es','',1595922208,1595922208),('Concentrato fluido','fa','',1595922208,1595922208),('Concentrato fluido','fr','',1595922208,1595922208),('Concentrato fluido','it','',1595922208,1595922208),('Concentrato fluido','ja','',1595922208,1595922208),('Concentrato fluido','nl','',1595922208,1595922208),('Concentrato fluido','pl','',1595922208,1595922208),('Concentrato fluido','pt_BR','',1595922208,1595922208),('Concentrato fluido','ru','',1595922208,1595922208),('Concentrato fluido','sk','',1595922208,1595922208),('Concentrato fluido','sv','',1595922208,1595922208),('Concentrato fluido','sv_FI','',1595922208,1595922208),('Concentrato fluido','tr','',1595922208,1595922208),('Concentrato fluido','uk','',1595922208,1595922208),('Concentrato fluido','zh_Hans','',1595922208,1595922208),('Congo - Brazzaville','cs','',1595954048,1595954048),('Congo - Brazzaville','de','',1595954048,1595954048),('Congo - Brazzaville','en','',1595954048,1595954048),('Congo - Brazzaville','es','',1595954048,1595954048),('Congo - Brazzaville','fa','',1595954048,1595954048),('Congo - Brazzaville','fr','',1595954048,1595954048),('Congo - Brazzaville','it','',1595954048,1595954048),('Congo - Brazzaville','ja','',1595954048,1595954048),('Congo - Brazzaville','nl','',1595954048,1595954048),('Congo - Brazzaville','pl','',1595954048,1595954048),('Congo - Brazzaville','pt_BR','',1595954048,1595954048),('Congo - Brazzaville','ru','',1595954048,1595954048),('Congo - Brazzaville','sk','',1595954048,1595954048),('Congo - Brazzaville','sv','',1595954048,1595954048),('Congo - Brazzaville','sv_FI','',1595954048,1595954048),('Congo - Brazzaville','tr','',1595954048,1595954048),('Congo - Brazzaville','uk','',1595954048,1595954048),('Congo - Brazzaville','zh_Hans','',1595954048,1595954048),('Congo - Kinshasa','cs','',1595954048,1595954048),('Congo - Kinshasa','de','',1595954048,1595954048),('Congo - Kinshasa','en','',1595954048,1595954048),('Congo - Kinshasa','es','',1595954048,1595954048),('Congo - Kinshasa','fa','',1595954048,1595954048),('Congo - Kinshasa','fr','',1595954048,1595954048),('Congo - Kinshasa','it','',1595954048,1595954048),('Congo - Kinshasa','ja','',1595954048,1595954048),('Congo - Kinshasa','nl','',1595954048,1595954048),('Congo - Kinshasa','pl','',1595954048,1595954048),('Congo - Kinshasa','pt_BR','',1595954048,1595954048),('Congo - Kinshasa','ru','',1595954048,1595954048),('Congo - Kinshasa','sk','',1595954048,1595954048),('Congo - Kinshasa','sv','',1595954048,1595954048),('Congo - Kinshasa','sv_FI','',1595954048,1595954048),('Congo - Kinshasa','tr','',1595954048,1595954048),('Congo - Kinshasa','uk','',1595954048,1595954048),('Congo - Kinshasa','zh_Hans','',1595954048,1595954048),('Cook Islands','cs','',1595954048,1595954048),('Cook Islands','de','',1595954048,1595954048),('Cook Islands','en','',1595954048,1595954048),('Cook Islands','es','',1595954048,1595954048),('Cook Islands','fa','',1595954048,1595954048),('Cook Islands','fr','',1595954048,1595954048),('Cook Islands','it','',1595954048,1595954048),('Cook Islands','ja','',1595954048,1595954048),('Cook Islands','nl','',1595954048,1595954048),('Cook Islands','pl','',1595954048,1595954048),('Cook Islands','pt_BR','',1595954048,1595954048),('Cook Islands','ru','',1595954048,1595954048),('Cook Islands','sk','',1595954048,1595954048),('Cook Islands','sv','',1595954048,1595954048),('Cook Islands','sv_FI','',1595954048,1595954048),('Cook Islands','tr','',1595954048,1595954048),('Cook Islands','uk','',1595954048,1595954048),('Cook Islands','zh_Hans','',1595954048,1595954048),('Coordinate','cs','',1595954647,1595954647),('Coordinate','de','',1595954647,1595954647),('Coordinate','en','',1595954647,1595954647),('Coordinate','es','',1595954647,1595954647),('Coordinate','fa','',1595954647,1595954647),('Coordinate','fr','',1595954647,1595954647),('Coordinate','it','',1595954647,1595954647),('Coordinate','ja','',1595954647,1595954647),('Coordinate','nl','',1595954647,1595954647),('Coordinate','pl','',1595954647,1595954647),('Coordinate','pt_BR','',1595954647,1595954647),('Coordinate','ru','',1595954647,1595954647),('Coordinate','sk','',1595954647,1595954647),('Coordinate','sv','',1595954647,1595954647),('Coordinate','sv_FI','',1595954647,1595954647),('Coordinate','tr','',1595954647,1595954647),('Coordinate','uk','',1595954647,1595954647),('Coordinate','zh_Hans','',1595954647,1595954647),('Coordinate Geografiche','cs','',1595953867,1595953867),('Coordinate Geografiche','de','',1595953867,1595953867),('Coordinate Geografiche','en','',1595953867,1595953867),('Coordinate Geografiche','es','',1595953867,1595953867),('Coordinate Geografiche','fa','',1595953867,1595953867),('Coordinate Geografiche','fr','',1595953867,1595953867),('Coordinate Geografiche','it','',1595953867,1595953867),('Coordinate Geografiche','ja','',1595953867,1595953867),('Coordinate Geografiche','nl','',1595953867,1595953867),('Coordinate Geografiche','pl','',1595953867,1595953867),('Coordinate Geografiche','pt_BR','',1595953867,1595953867),('Coordinate Geografiche','ru','',1595953867,1595953867),('Coordinate Geografiche','sk','',1595953867,1595953867),('Coordinate Geografiche','sv','',1595953867,1595953867),('Coordinate Geografiche','sv_FI','',1595953867,1595953867),('Coordinate Geografiche','tr','',1595953867,1595953867),('Coordinate Geografiche','uk','',1595953867,1595953867),('Coordinate Geografiche','zh_Hans','',1595953867,1595953867),('Costa Rica','cs','',1595954048,1595954048),('Costa Rica','de','',1595954048,1595954048),('Costa Rica','en','',1595954048,1595954048),('Costa Rica','es','',1595954048,1595954048),('Costa Rica','fa','',1595954048,1595954048),('Costa Rica','fr','',1595954048,1595954048),('Costa Rica','it','',1595954048,1595954048),('Costa Rica','ja','',1595954048,1595954048),('Costa Rica','nl','',1595954048,1595954048),('Costa Rica','pl','',1595954048,1595954048),('Costa Rica','pt_BR','',1595954048,1595954048),('Costa Rica','ru','',1595954048,1595954048),('Costa Rica','sk','',1595954048,1595954048),('Costa Rica','sv','',1595954048,1595954048),('Costa Rica','sv_FI','',1595954048,1595954048),('Costa Rica','tr','',1595954048,1595954048),('Costa Rica','uk','',1595954048,1595954048),('Costa Rica','zh_Hans','',1595954048,1595954048),('Crema','cs','',1595922208,1595922208),('Crema','de','',1595922208,1595922208),('Crema','en','',1595922208,1595922208),('Crema','es','',1595922208,1595922208),('Crema','fa','',1595922208,1595922208),('Crema','fr','',1595922208,1595922208),('Crema','it','',1595922208,1595922208),('Crema','ja','',1595922208,1595922208),('Crema','nl','',1595922208,1595922208),('Crema','pl','',1595922208,1595922208),('Crema','pt_BR','',1595922208,1595922208),('Crema','ru','',1595922208,1595922208),('Crema','sk','',1595922208,1595922208),('Crema','sv','',1595922208,1595922208),('Crema','sv_FI','',1595922208,1595922208),('Crema','tr','',1595922208,1595922208),('Crema','uk','',1595922208,1595922208),('Crema','zh_Hans','',1595922208,1595922208),('Croatia','cs','',1595954048,1595954048),('Croatia','de','',1595954048,1595954048),('Croatia','en','',1595954048,1595954048),('Croatia','es','',1595954048,1595954048),('Croatia','fa','',1595954048,1595954048),('Croatia','fr','',1595954048,1595954048),('Croatia','it','',1595954048,1595954048),('Croatia','ja','',1595954048,1595954048),('Croatia','nl','',1595954048,1595954048),('Croatia','pl','',1595954048,1595954048),('Croatia','pt_BR','',1595954048,1595954048),('Croatia','ru','',1595954048,1595954048),('Croatia','sk','',1595954048,1595954048),('Croatia','sv','',1595954048,1595954048),('Croatia','sv_FI','',1595954048,1595954048),('Croatia','tr','',1595954048,1595954048),('Croatia','uk','',1595954048,1595954048),('Croatia','zh_Hans','',1595954048,1595954048),('Ctrl','cs','',1609929774,1609929774),('Ctrl','de','',1609929774,1609929774),('Ctrl','en','',1609929774,1609929774),('Ctrl','es','',1609929774,1609929774),('Ctrl','fa','',1609929774,1609929774),('Ctrl','fr','',1609929774,1609929774),('Ctrl','it','',1609929774,1609929774),('Ctrl','ja','',1609929774,1609929774),('Ctrl','nl','',1609929774,1609929774),('Ctrl','pl','',1609929774,1609929774),('Ctrl','pt_BR','',1609929774,1609929774),('Ctrl','ru','',1609929774,1609929774),('Ctrl','sk','',1609929774,1609929774),('Ctrl','sv','',1609929774,1609929774),('Ctrl','sv_FI','',1609929774,1609929774),('Ctrl','tr','',1609929774,1609929774),('Ctrl','uk','',1609929774,1609929774),('Ctrl','zh_Hans','',1609929774,1609929774),('Cuba','cs','',1595954048,1595954048),('Cuba','de','',1595954048,1595954048),('Cuba','en','',1595954048,1595954048),('Cuba','es','',1595954048,1595954048),('Cuba','fa','',1595954048,1595954048),('Cuba','fr','',1595954048,1595954048),('Cuba','it','',1595954048,1595954048),('Cuba','ja','',1595954048,1595954048),('Cuba','nl','',1595954048,1595954048),('Cuba','pl','',1595954048,1595954048),('Cuba','pt_BR','',1595954048,1595954048),('Cuba','ru','',1595954048,1595954048),('Cuba','sk','',1595954048,1595954048),('Cuba','sv','',1595954048,1595954048),('Cuba','sv_FI','',1595954048,1595954048),('Cuba','tr','',1595954048,1595954048),('Cuba','uk','',1595954048,1595954048),('Cuba','zh_Hans','',1595954048,1595954048),('Curaçao','cs','',1595954048,1595954048),('Curaçao','de','',1595954048,1595954048),('Curaçao','en','',1595954048,1595954048),('Curaçao','es','',1595954048,1595954048),('Curaçao','fa','',1595954048,1595954048),('Curaçao','fr','',1595954048,1595954048),('Curaçao','it','',1595954048,1595954048),('Curaçao','ja','',1595954048,1595954048),('Curaçao','nl','',1595954048,1595954048),('Curaçao','pl','',1595954048,1595954048),('Curaçao','pt_BR','',1595954048,1595954048),('Curaçao','ru','',1595954048,1595954048),('Curaçao','sk','',1595954048,1595954048),('Curaçao','sv','',1595954048,1595954048),('Curaçao','sv_FI','',1595954048,1595954048),('Curaçao','tr','',1595954048,1595954048),('Curaçao','uk','',1595954048,1595954048),('Curaçao','zh_Hans','',1595954048,1595954048),('Cyprus','cs','',1595954048,1595954048),('Cyprus','de','',1595954048,1595954048),('Cyprus','en','',1595954048,1595954048),('Cyprus','es','',1595954048,1595954048),('Cyprus','fa','',1595954048,1595954048),('Cyprus','fr','',1595954048,1595954048),('Cyprus','it','',1595954048,1595954048),('Cyprus','ja','',1595954048,1595954048),('Cyprus','nl','',1595954048,1595954048),('Cyprus','pl','',1595954048,1595954048),('Cyprus','pt_BR','',1595954048,1595954048),('Cyprus','ru','',1595954048,1595954048),('Cyprus','sk','',1595954048,1595954048),('Cyprus','sv','',1595954048,1595954048),('Cyprus','sv_FI','',1595954048,1595954048),('Cyprus','tr','',1595954048,1595954048),('Cyprus','uk','',1595954048,1595954048),('Cyprus','zh_Hans','',1595954048,1595954048),('Czechia','cs','',1595954048,1595954048),('Czechia','de','',1595954048,1595954048),('Czechia','en','',1595954048,1595954048),('Czechia','es','',1595954048,1595954048),('Czechia','fa','',1595954048,1595954048),('Czechia','fr','',1595954048,1595954048),('Czechia','it','',1595954048,1595954048),('Czechia','ja','',1595954048,1595954048),('Czechia','nl','',1595954048,1595954048),('Czechia','pl','',1595954048,1595954048),('Czechia','pt_BR','',1595954048,1595954048),('Czechia','ru','',1595954048,1595954048),('Czechia','sk','',1595954048,1595954048),('Czechia','sv','',1595954048,1595954048),('Czechia','sv_FI','',1595954048,1595954048),('Czechia','tr','',1595954048,1595954048),('Czechia','uk','',1595954048,1595954048),('Czechia','zh_Hans','',1595954048,1595954048),('Côte d’Ivoire','cs','',1595954048,1595954048),('Côte d’Ivoire','de','',1595954048,1595954048),('Côte d’Ivoire','en','',1595954048,1595954048),('Côte d’Ivoire','es','',1595954048,1595954048),('Côte d’Ivoire','fa','',1595954048,1595954048),('Côte d’Ivoire','fr','',1595954048,1595954048),('Côte d’Ivoire','it','',1595954048,1595954048),('Côte d’Ivoire','ja','',1595954048,1595954048),('Côte d’Ivoire','nl','',1595954048,1595954048),('Côte d’Ivoire','pl','',1595954048,1595954048),('Côte d’Ivoire','pt_BR','',1595954048,1595954048),('Côte d’Ivoire','ru','',1595954048,1595954048),('Côte d’Ivoire','sk','',1595954048,1595954048),('Côte d’Ivoire','sv','',1595954048,1595954048),('Côte d’Ivoire','sv_FI','',1595954048,1595954048),('Côte d’Ivoire','tr','',1595954048,1595954048),('Côte d’Ivoire','uk','',1595954048,1595954048),('Côte d’Ivoire','zh_Hans','',1595954048,1595954048),('Dati Farmacia','cs','',1595953778,1595953778),('Dati Farmacia','de','',1595953778,1595953778),('Dati Farmacia','en','',1595953778,1595953778),('Dati Farmacia','es','',1595953778,1595953778),('Dati Farmacia','fa','',1595953778,1595953778),('Dati Farmacia','fr','',1595953778,1595953778),('Dati Farmacia','it','',1595953778,1595953778),('Dati Farmacia','ja','',1595953778,1595953778),('Dati Farmacia','nl','',1595953778,1595953778),('Dati Farmacia','pl','',1595953778,1595953778),('Dati Farmacia','pt_BR','',1595953778,1595953778),('Dati Farmacia','ru','',1595953778,1595953778),('Dati Farmacia','sk','',1595953778,1595953778),('Dati Farmacia','sv','',1595953778,1595953778),('Dati Farmacia','sv_FI','',1595953778,1595953778),('Dati Farmacia','tr','',1595953778,1595953778),('Dati Farmacia','uk','',1595953778,1595953778),('Dati Farmacia','zh_Hans','',1595953778,1595953778),('Dati Prodotto','cs','',1595918163,1595918163),('Dati Prodotto','de','',1595918163,1595918163),('Dati Prodotto','en','',1595918163,1595918163),('Dati Prodotto','es','',1595918163,1595918163),('Dati Prodotto','fa','',1595918163,1595918163),('Dati Prodotto','fr','',1595918163,1595918163),('Dati Prodotto','it','',1595918163,1595918163),('Dati Prodotto','ja','',1595918163,1595918163),('Dati Prodotto','nl','',1595918163,1595918163),('Dati Prodotto','pl','',1595918163,1595918163),('Dati Prodotto','pt_BR','',1595918163,1595918163),('Dati Prodotto','ru','',1595918163,1595918163),('Dati Prodotto','sk','',1595918163,1595918163),('Dati Prodotto','sv','',1595918163,1595918163),('Dati Prodotto','sv_FI','',1595918163,1595918163),('Dati Prodotto','tr','',1595918163,1595918163),('Dati Prodotto','uk','',1595918163,1595918163),('Dati Prodotto','zh_Hans','',1595918163,1595918163),('Day of the Week','cs','',1595954198,1595954198),('Day of the Week','de','',1595954198,1595954198),('Day of the Week','en','',1595954198,1595954198),('Day of the Week','es','',1595954198,1595954198),('Day of the Week','fa','',1595954198,1595954198),('Day of the Week','fr','',1595954198,1595954198),('Day of the Week','it','',1595954198,1595954198),('Day of the Week','ja','',1595954198,1595954198),('Day of the Week','nl','',1595954198,1595954198),('Day of the Week','pl','',1595954198,1595954198),('Day of the Week','pt_BR','',1595954198,1595954198),('Day of the Week','ru','',1595954198,1595954198),('Day of the Week','sk','',1595954198,1595954198),('Day of the Week','sv','',1595954198,1595954198),('Day of the Week','sv_FI','',1595954198,1595954198),('Day of the Week','tr','',1595954198,1595954198),('Day of the Week','uk','',1595954198,1595954198),('Day of the Week','zh_Hans','',1595954198,1595954198),('Denmark','cs','',1595954048,1595954048),('Denmark','de','',1595954048,1595954048),('Denmark','en','',1595954048,1595954048),('Denmark','es','',1595954048,1595954048),('Denmark','fa','',1595954048,1595954048),('Denmark','fr','',1595954048,1595954048),('Denmark','it','',1595954048,1595954048),('Denmark','ja','',1595954048,1595954048),('Denmark','nl','',1595954048,1595954048),('Denmark','pl','',1595954048,1595954048),('Denmark','pt_BR','',1595954048,1595954048),('Denmark','ru','',1595954048,1595954048),('Denmark','sk','',1595954048,1595954048),('Denmark','sv','',1595954048,1595954048),('Denmark','sv_FI','',1595954048,1595954048),('Denmark','tr','',1595954048,1595954048),('Denmark','uk','',1595954048,1595954048),('Denmark','zh_Hans','',1595954048,1595954048),('Descrizione','cs','',1595918163,1595918163),('Descrizione','de','',1595918163,1595918163),('Descrizione','en','',1595918163,1595918163),('Descrizione','es','',1595918163,1595918163),('Descrizione','fa','',1595918163,1595918163),('Descrizione','fr','',1595918163,1595918163),('Descrizione','it','',1595918163,1595918163),('Descrizione','ja','',1595918163,1595918163),('Descrizione','nl','',1595918163,1595918163),('Descrizione','pl','',1595918163,1595918163),('Descrizione','pt_BR','',1595918163,1595918163),('Descrizione','ru','',1595918163,1595918163),('Descrizione','sk','',1595918163,1595918163),('Descrizione','sv','',1595918163,1595918163),('Descrizione','sv_FI','',1595918163,1595918163),('Descrizione','tr','',1595918163,1595918163),('Descrizione','uk','',1595918163,1595918163),('Descrizione','zh_Hans','',1595918163,1595918163),('Descrizione Breve','cs','',1595918668,1595918668),('Descrizione Breve','de','',1595918668,1595918668),('Descrizione Breve','en','',1595918668,1595918668),('Descrizione Breve','es','',1595918668,1595918668),('Descrizione Breve','fa','',1595918668,1595918668),('Descrizione Breve','fr','',1595918668,1595918668),('Descrizione Breve','it','',1595918668,1595918668),('Descrizione Breve','ja','',1595918668,1595918668),('Descrizione Breve','nl','',1595918668,1595918668),('Descrizione Breve','pl','',1595918668,1595918668),('Descrizione Breve','pt_BR','',1595918668,1595918668),('Descrizione Breve','ru','',1595918668,1595918668),('Descrizione Breve','sk','',1595918668,1595918668),('Descrizione Breve','sv','',1595918668,1595918668),('Descrizione Breve','sv_FI','',1595918668,1595918668),('Descrizione Breve','tr','',1595918668,1595918668),('Descrizione Breve','uk','',1595918668,1595918668),('Descrizione Breve','zh_Hans','',1595918668,1595918668),('Detergente uso esterno','cs','',1595922208,1595922208),('Detergente uso esterno','de','',1595922208,1595922208),('Detergente uso esterno','en','',1595922208,1595922208),('Detergente uso esterno','es','',1595922208,1595922208),('Detergente uso esterno','fa','',1595922208,1595922208),('Detergente uso esterno','fr','',1595922208,1595922208),('Detergente uso esterno','it','',1595922208,1595922208),('Detergente uso esterno','ja','',1595922208,1595922208),('Detergente uso esterno','nl','',1595922208,1595922208),('Detergente uso esterno','pl','',1595922208,1595922208),('Detergente uso esterno','pt_BR','',1595922208,1595922208),('Detergente uso esterno','ru','',1595922208,1595922208),('Detergente uso esterno','sk','',1595922208,1595922208),('Detergente uso esterno','sv','',1595922208,1595922208),('Detergente uso esterno','sv_FI','',1595922208,1595922208),('Detergente uso esterno','tr','',1595922208,1595922208),('Detergente uso esterno','uk','',1595922208,1595922208),('Detergente uso esterno','zh_Hans','',1595922208,1595922208),('Diego Garcia','cs','',1595954048,1595954048),('Diego Garcia','de','',1595954048,1595954048),('Diego Garcia','en','',1595954048,1595954048),('Diego Garcia','es','',1595954048,1595954048),('Diego Garcia','fa','',1595954048,1595954048),('Diego Garcia','fr','',1595954048,1595954048),('Diego Garcia','it','',1595954048,1595954048),('Diego Garcia','ja','',1595954048,1595954048),('Diego Garcia','nl','',1595954048,1595954048),('Diego Garcia','pl','',1595954048,1595954048),('Diego Garcia','pt_BR','',1595954048,1595954048),('Diego Garcia','ru','',1595954048,1595954048),('Diego Garcia','sk','',1595954048,1595954048),('Diego Garcia','sv','',1595954048,1595954048),('Diego Garcia','sv_FI','',1595954048,1595954048),('Diego Garcia','tr','',1595954048,1595954048),('Diego Garcia','uk','',1595954048,1595954048),('Diego Garcia','zh_Hans','',1595954048,1595954048),('Dimensions','cs','',1607172509,1607172509),('Dimensions','de','',1607172509,1607172509),('Dimensions','en','',1607172509,1607172509),('Dimensions','es','',1607172509,1607172509),('Dimensions','fa','',1607172509,1607172509),('Dimensions','fr','',1607172509,1607172509),('Dimensions','it','',1607172509,1607172509),('Dimensions','ja','',1607172509,1607172509),('Dimensions','nl','',1607172509,1607172509),('Dimensions','pl','',1607172509,1607172509),('Dimensions','pt_BR','',1607172509,1607172509),('Dimensions','ru','',1607172509,1607172509),('Dimensions','sk','',1607172509,1607172509),('Dimensions','sv','',1607172509,1607172509),('Dimensions','sv_FI','',1607172509,1607172509),('Dimensions','tr','',1607172509,1607172509),('Dimensions','uk','',1607172509,1607172509),('Dimensions','zh_Hans','',1607172509,1607172509),('Djibouti','cs','',1595954048,1595954048),('Djibouti','de','',1595954048,1595954048),('Djibouti','en','',1595954048,1595954048),('Djibouti','es','',1595954048,1595954048),('Djibouti','fa','',1595954048,1595954048),('Djibouti','fr','',1595954048,1595954048),('Djibouti','it','',1595954048,1595954048),('Djibouti','ja','',1595954048,1595954048),('Djibouti','nl','',1595954048,1595954048),('Djibouti','pl','',1595954048,1595954048),('Djibouti','pt_BR','',1595954048,1595954048),('Djibouti','ru','',1595954048,1595954048),('Djibouti','sk','',1595954048,1595954048),('Djibouti','sv','',1595954048,1595954048),('Djibouti','sv_FI','',1595954048,1595954048),('Djibouti','tr','',1595954048,1595954048),('Djibouti','uk','',1595954048,1595954048),('Djibouti','zh_Hans','',1595954048,1595954048),('Dominica','cs','',1595954049,1595954049),('Dominica','de','',1595954049,1595954049),('Dominica','en','',1595954049,1595954049),('Dominica','es','',1595954049,1595954049),('Dominica','fa','',1595954049,1595954049),('Dominica','fr','',1595954049,1595954049),('Dominica','it','',1595954049,1595954049),('Dominica','ja','',1595954049,1595954049),('Dominica','nl','',1595954049,1595954049),('Dominica','pl','',1595954049,1595954049),('Dominica','pt_BR','',1595954049,1595954049),('Dominica','ru','',1595954049,1595954049),('Dominica','sk','',1595954049,1595954049),('Dominica','sv','',1595954049,1595954049),('Dominica','sv_FI','',1595954049,1595954049),('Dominica','tr','',1595954049,1595954049),('Dominica','uk','',1595954049,1595954049),('Dominica','zh_Hans','',1595954049,1595954049),('Dominican Republic','cs','',1595954049,1595954049),('Dominican Republic','de','',1595954049,1595954049),('Dominican Republic','en','',1595954049,1595954049),('Dominican Republic','es','',1595954049,1595954049),('Dominican Republic','fa','',1595954049,1595954049),('Dominican Republic','fr','',1595954049,1595954049),('Dominican Republic','it','',1595954049,1595954049),('Dominican Republic','ja','',1595954049,1595954049),('Dominican Republic','nl','',1595954049,1595954049),('Dominican Republic','pl','',1595954049,1595954049),('Dominican Republic','pt_BR','',1595954049,1595954049),('Dominican Republic','ru','',1595954049,1595954049),('Dominican Republic','sk','',1595954049,1595954049),('Dominican Republic','sv','',1595954049,1595954049),('Dominican Republic','sv_FI','',1595954049,1595954049),('Dominican Republic','tr','',1595954049,1595954049),('Dominican Republic','uk','',1595954049,1595954049),('Dominican Republic','zh_Hans','',1595954049,1595954049),('Ecuador','cs','',1595954049,1595954049),('Ecuador','de','',1595954049,1595954049),('Ecuador','en','',1595954049,1595954049),('Ecuador','es','',1595954049,1595954049),('Ecuador','fa','',1595954049,1595954049),('Ecuador','fr','',1595954049,1595954049),('Ecuador','it','',1595954049,1595954049),('Ecuador','ja','',1595954049,1595954049),('Ecuador','nl','',1595954049,1595954049),('Ecuador','pl','',1595954049,1595954049),('Ecuador','pt_BR','',1595954049,1595954049),('Ecuador','ru','',1595954049,1595954049),('Ecuador','sk','',1595954049,1595954049),('Ecuador','sv','',1595954049,1595954049),('Ecuador','sv_FI','',1595954049,1595954049),('Ecuador','tr','',1595954049,1595954049),('Ecuador','uk','',1595954049,1595954049),('Ecuador','zh_Hans','',1595954049,1595954049),('Egypt','cs','',1595954049,1595954049),('Egypt','de','',1595954049,1595954049),('Egypt','en','',1595954049,1595954049),('Egypt','es','',1595954049,1595954049),('Egypt','fa','',1595954049,1595954049),('Egypt','fr','',1595954049,1595954049),('Egypt','it','',1595954049,1595954049),('Egypt','ja','',1595954049,1595954049),('Egypt','nl','',1595954049,1595954049),('Egypt','pl','',1595954049,1595954049),('Egypt','pt_BR','',1595954049,1595954049),('Egypt','ru','',1595954049,1595954049),('Egypt','sk','',1595954049,1595954049),('Egypt','sv','',1595954049,1595954049),('Egypt','sv_FI','',1595954049,1595954049),('Egypt','tr','',1595954049,1595954049),('Egypt','uk','',1595954049,1595954049),('Egypt','zh_Hans','',1595954049,1595954049),('El Salvador','cs','',1595954049,1595954049),('El Salvador','de','',1595954049,1595954049),('El Salvador','en','',1595954049,1595954049),('El Salvador','es','',1595954049,1595954049),('El Salvador','fa','',1595954049,1595954049),('El Salvador','fr','',1595954049,1595954049),('El Salvador','it','',1595954049,1595954049),('El Salvador','ja','',1595954049,1595954049),('El Salvador','nl','',1595954049,1595954049),('El Salvador','pl','',1595954049,1595954049),('El Salvador','pt_BR','',1595954049,1595954049),('El Salvador','ru','',1595954049,1595954049),('El Salvador','sk','',1595954049,1595954049),('El Salvador','sv','',1595954049,1595954049),('El Salvador','sv_FI','',1595954049,1595954049),('El Salvador','tr','',1595954049,1595954049),('El Salvador','uk','',1595954049,1595954049),('El Salvador','zh_Hans','',1595954049,1595954049),('English','cs','',1595918252,1595918252),('English','de','',1595918252,1595918252),('English','en','',1595918252,1595918252),('English','es','',1595918252,1595918252),('English','fa','',1595918252,1595918252),('English','fr','',1595918252,1595918252),('English','it','',1595918252,1595918252),('English','ja','',1595918252,1595918252),('English','nl','',1595918252,1595918252),('English','pl','',1595918252,1595918252),('English','pt_BR','',1595918252,1595918252),('English','ru','',1595918252,1595918252),('English','sk','',1595918252,1595918252),('English','sv','',1595918252,1595918252),('English','sv_FI','',1595918252,1595918252),('English','tr','',1595918252,1595918252),('English','uk','',1595918252,1595918252),('English','zh_Hans','',1595918252,1595918252),('Equatorial Guinea','cs','',1595954049,1595954049),('Equatorial Guinea','de','',1595954049,1595954049),('Equatorial Guinea','en','',1595954049,1595954049),('Equatorial Guinea','es','',1595954049,1595954049),('Equatorial Guinea','fa','',1595954049,1595954049),('Equatorial Guinea','fr','',1595954049,1595954049),('Equatorial Guinea','it','',1595954049,1595954049),('Equatorial Guinea','ja','',1595954049,1595954049),('Equatorial Guinea','nl','',1595954049,1595954049),('Equatorial Guinea','pl','',1595954049,1595954049),('Equatorial Guinea','pt_BR','',1595954049,1595954049),('Equatorial Guinea','ru','',1595954049,1595954049),('Equatorial Guinea','sk','',1595954049,1595954049),('Equatorial Guinea','sv','',1595954049,1595954049),('Equatorial Guinea','sv_FI','',1595954049,1595954049),('Equatorial Guinea','tr','',1595954049,1595954049),('Equatorial Guinea','uk','',1595954049,1595954049),('Equatorial Guinea','zh_Hans','',1595954049,1595954049),('Eritrea','cs','',1595954049,1595954049),('Eritrea','de','',1595954049,1595954049),('Eritrea','en','',1595954049,1595954049),('Eritrea','es','',1595954049,1595954049),('Eritrea','fa','',1595954049,1595954049),('Eritrea','fr','',1595954049,1595954049),('Eritrea','it','',1595954049,1595954049),('Eritrea','ja','',1595954049,1595954049),('Eritrea','nl','',1595954049,1595954049),('Eritrea','pl','',1595954049,1595954049),('Eritrea','pt_BR','',1595954049,1595954049),('Eritrea','ru','',1595954049,1595954049),('Eritrea','sk','',1595954049,1595954049),('Eritrea','sv','',1595954049,1595954049),('Eritrea','sv_FI','',1595954049,1595954049),('Eritrea','tr','',1595954049,1595954049),('Eritrea','uk','',1595954049,1595954049),('Eritrea','zh_Hans','',1595954049,1595954049),('Estonia','cs','',1595954049,1595954049),('Estonia','de','',1595954049,1595954049),('Estonia','en','',1595954049,1595954049),('Estonia','es','',1595954049,1595954049),('Estonia','fa','',1595954049,1595954049),('Estonia','fr','',1595954049,1595954049),('Estonia','it','',1595954049,1595954049),('Estonia','ja','',1595954049,1595954049),('Estonia','nl','',1595954049,1595954049),('Estonia','pl','',1595954049,1595954049),('Estonia','pt_BR','',1595954049,1595954049),('Estonia','ru','',1595954049,1595954049),('Estonia','sk','',1595954049,1595954049),('Estonia','sv','',1595954049,1595954049),('Estonia','sv_FI','',1595954049,1595954049),('Estonia','tr','',1595954049,1595954049),('Estonia','uk','',1595954049,1595954049),('Estonia','zh_Hans','',1595954049,1595954049),('Eswatini','cs','',1595954049,1595954049),('Eswatini','de','',1595954049,1595954049),('Eswatini','en','',1595954049,1595954049),('Eswatini','es','',1595954049,1595954049),('Eswatini','fa','',1595954049,1595954049),('Eswatini','fr','',1595954049,1595954049),('Eswatini','it','',1595954049,1595954049),('Eswatini','ja','',1595954049,1595954049),('Eswatini','nl','',1595954049,1595954049),('Eswatini','pl','',1595954049,1595954049),('Eswatini','pt_BR','',1595954049,1595954049),('Eswatini','ru','',1595954049,1595954049),('Eswatini','sk','',1595954049,1595954049),('Eswatini','sv','',1595954049,1595954049),('Eswatini','sv_FI','',1595954049,1595954049),('Eswatini','tr','',1595954049,1595954049),('Eswatini','uk','',1595954049,1595954049),('Eswatini','zh_Hans','',1595954049,1595954049),('Ethiopia','cs','',1595954049,1595954049),('Ethiopia','de','',1595954049,1595954049),('Ethiopia','en','',1595954049,1595954049),('Ethiopia','es','',1595954049,1595954049),('Ethiopia','fa','',1595954049,1595954049),('Ethiopia','fr','',1595954049,1595954049),('Ethiopia','it','',1595954049,1595954049),('Ethiopia','ja','',1595954049,1595954049),('Ethiopia','nl','',1595954049,1595954049),('Ethiopia','pl','',1595954049,1595954049),('Ethiopia','pt_BR','',1595954049,1595954049),('Ethiopia','ru','',1595954049,1595954049),('Ethiopia','sk','',1595954049,1595954049),('Ethiopia','sv','',1595954049,1595954049),('Ethiopia','sv_FI','',1595954049,1595954049),('Ethiopia','tr','',1595954049,1595954049),('Ethiopia','uk','',1595954049,1595954049),('Ethiopia','zh_Hans','',1595954049,1595954049),('Euro','cs','',1595919403,1595919403),('Euro','de','',1595919403,1595919403),('Euro','en','',1595919403,1595919403),('Euro','es','',1595919403,1595919403),('Euro','fa','',1595919403,1595919403),('Euro','fr','',1595919403,1595919403),('Euro','it','',1595919403,1595919403),('Euro','ja','',1595919403,1595919403),('Euro','nl','',1595919403,1595919403),('Euro','pl','',1595919403,1595919403),('Euro','pt_BR','',1595919403,1595919403),('Euro','ru','',1595919403,1595919403),('Euro','sk','',1595919403,1595919403),('Euro','sv','',1595919403,1595919403),('Euro','sv_FI','',1595919403,1595919403),('Euro','tr','',1595919403,1595919403),('Euro','uk','',1595919403,1595919403),('Euro','zh_Hans','',1595919403,1595919403),('Falkland Islands','cs','',1595954049,1595954049),('Falkland Islands','de','',1595954049,1595954049),('Falkland Islands','en','',1595954049,1595954049),('Falkland Islands','es','',1595954049,1595954049),('Falkland Islands','fa','',1595954049,1595954049),('Falkland Islands','fr','',1595954049,1595954049),('Falkland Islands','it','',1595954049,1595954049),('Falkland Islands','ja','',1595954049,1595954049),('Falkland Islands','nl','',1595954049,1595954049),('Falkland Islands','pl','',1595954049,1595954049),('Falkland Islands','pt_BR','',1595954049,1595954049),('Falkland Islands','ru','',1595954049,1595954049),('Falkland Islands','sk','',1595954049,1595954049),('Falkland Islands','sv','',1595954049,1595954049),('Falkland Islands','sv_FI','',1595954049,1595954049),('Falkland Islands','tr','',1595954049,1595954049),('Falkland Islands','uk','',1595954049,1595954049),('Falkland Islands','zh_Hans','',1595954049,1595954049),('Farmacia','cs','',1595952967,1595952967),('Farmacia','de','',1595952967,1595952967),('Farmacia','en','',1595952967,1595952967),('Farmacia','es','',1595952967,1595952967),('Farmacia','fa','',1595952967,1595952967),('Farmacia','fr','',1595952967,1595952967),('Farmacia','it','',1595952967,1595952967),('Farmacia','ja','',1595952967,1595952967),('Farmacia','nl','',1595952967,1595952967),('Farmacia','pl','',1595952967,1595952967),('Farmacia','pt_BR','',1595952967,1595952967),('Farmacia','ru','',1595952967,1595952967),('Farmacia','sk','',1595952967,1595952967),('Farmacia','sv','',1595952967,1595952967),('Farmacia','sv_FI','',1595952967,1595952967),('Farmacia','tr','',1595952967,1595952967),('Farmacia','uk','',1595952967,1595952967),('Farmacia','zh_Hans','',1595952967,1595952967),('Faroe Islands','cs','',1595954049,1595954049),('Faroe Islands','de','',1595954049,1595954049),('Faroe Islands','en','',1595954049,1595954049),('Faroe Islands','es','',1595954049,1595954049),('Faroe Islands','fa','',1595954049,1595954049),('Faroe Islands','fr','',1595954049,1595954049),('Faroe Islands','it','',1595954049,1595954049),('Faroe Islands','ja','',1595954049,1595954049),('Faroe Islands','nl','',1595954049,1595954049),('Faroe Islands','pl','',1595954049,1595954049),('Faroe Islands','pt_BR','',1595954049,1595954049),('Faroe Islands','ru','',1595954049,1595954049),('Faroe Islands','sk','',1595954049,1595954049),('Faroe Islands','sv','',1595954049,1595954049),('Faroe Islands','sv_FI','',1595954049,1595954049),('Faroe Islands','tr','',1595954049,1595954049),('Faroe Islands','uk','',1595954049,1595954049),('Faroe Islands','zh_Hans','',1595954049,1595954049),('Fiji','cs','',1595954049,1595954049),('Fiji','de','',1595954049,1595954049),('Fiji','en','',1595954049,1595954049),('Fiji','es','',1595954049,1595954049),('Fiji','fa','',1595954049,1595954049),('Fiji','fr','',1595954049,1595954049),('Fiji','it','',1595954049,1595954049),('Fiji','ja','',1595954049,1595954049),('Fiji','nl','',1595954049,1595954049),('Fiji','pl','',1595954049,1595954049),('Fiji','pt_BR','',1595954049,1595954049),('Fiji','ru','',1595954049,1595954049),('Fiji','sk','',1595954049,1595954049),('Fiji','sv','',1595954049,1595954049),('Fiji','sv_FI','',1595954049,1595954049),('Fiji','tr','',1595954049,1595954049),('Fiji','uk','',1595954049,1595954049),('Fiji','zh_Hans','',1595954049,1595954049),('Finland','cs','',1595954049,1595954049),('Finland','de','',1595954049,1595954049),('Finland','en','',1595954049,1595954049),('Finland','es','',1595954049,1595954049),('Finland','fa','',1595954049,1595954049),('Finland','fr','',1595954049,1595954049),('Finland','it','',1595954049,1595954049),('Finland','ja','',1595954049,1595954049),('Finland','nl','',1595954049,1595954049),('Finland','pl','',1595954049,1595954049),('Finland','pt_BR','',1595954049,1595954049),('Finland','ru','',1595954049,1595954049),('Finland','sk','',1595954049,1595954049),('Finland','sv','',1595954049,1595954049),('Finland','sv_FI','',1595954049,1595954049),('Finland','tr','',1595954049,1595954049),('Finland','uk','',1595954049,1595954049),('Finland','zh_Hans','',1595954049,1595954049),('Flaconcini','cs','',1595922208,1595922208),('Flaconcini','de','',1595922208,1595922208),('Flaconcini','en','',1595922208,1595922208),('Flaconcini','es','',1595922208,1595922208),('Flaconcini','fa','',1595922208,1595922208),('Flaconcini','fr','',1595922208,1595922208),('Flaconcini','it','',1595922208,1595922208),('Flaconcini','ja','',1595922208,1595922208),('Flaconcini','nl','',1595922208,1595922208),('Flaconcini','pl','',1595922208,1595922208),('Flaconcini','pt_BR','',1595922208,1595922208),('Flaconcini','ru','',1595922208,1595922208),('Flaconcini','sk','',1595922208,1595922208),('Flaconcini','sv','',1595922208,1595922208),('Flaconcini','sv_FI','',1595922208,1595922208),('Flaconcini','tr','',1595922208,1595922208),('Flaconcini','uk','',1595922208,1595922208),('Flaconcini','zh_Hans','',1595922208,1595922208),('Formato','cs','',1595922207,1595922207),('Formato','de','',1595922207,1595922207),('Formato','en','',1595922207,1595922207),('Formato','es','',1595922207,1595922207),('Formato','fa','',1595922207,1595922207),('Formato','fr','',1595922207,1595922207),('Formato','it','',1595922207,1595922207),('Formato','ja','',1595922207,1595922207),('Formato','nl','',1595922207,1595922207),('Formato','pl','',1595922207,1595922207),('Formato','pt_BR','',1595922207,1595922207),('Formato','ru','',1595922207,1595922207),('Formato','sk','',1595922207,1595922207),('Formato','sv','',1595922207,1595922207),('Formato','sv_FI','',1595922207,1595922207),('Formato','tr','',1595922207,1595922207),('Formato','uk','',1595922207,1595922207),('Formato','zh_Hans','',1595922207,1595922207),('France','cs','',1595954049,1595954049),('France','de','',1595954049,1595954049),('France','en','',1595954049,1595954049),('France','es','',1595954049,1595954049),('France','fa','',1595954049,1595954049),('France','fr','',1595954049,1595954049),('France','it','',1595954049,1595954049),('France','ja','',1595954049,1595954049),('France','nl','',1595954049,1595954049),('France','pl','',1595954049,1595954049),('France','pt_BR','',1595954049,1595954049),('France','ru','',1595954049,1595954049),('France','sk','',1595954049,1595954049),('France','sv','',1595954049,1595954049),('France','sv_FI','',1595954049,1595954049),('France','tr','',1595954049,1595954049),('France','uk','',1595954049,1595954049),('France','zh_Hans','',1595954049,1595954049),('French','cs','',1595918547,1595918547),('French','de','',1595918547,1595918547),('French','en','',1595918547,1595918547),('French','es','',1595918547,1595918547),('French','fa','',1595918547,1595918547),('French','fr','',1595918547,1595918547),('French','it','',1595918547,1595918547),('French','ja','',1595918547,1595918547),('French','nl','',1595918547,1595918547),('French','pl','',1595918547,1595918547),('French','pt_BR','',1595918547,1595918547),('French','ru','',1595918547,1595918547),('French','sk','',1595918547,1595918547),('French','sv','',1595918547,1595918547),('French','sv_FI','',1595918547,1595918547),('French','tr','',1595918547,1595918547),('French','uk','',1595918547,1595918547),('French','zh_Hans','',1595918547,1595918547),('French Guiana','cs','',1595954049,1595954049),('French Guiana','de','',1595954049,1595954049),('French Guiana','en','',1595954049,1595954049),('French Guiana','es','',1595954049,1595954049),('French Guiana','fa','',1595954049,1595954049),('French Guiana','fr','',1595954049,1595954049),('French Guiana','it','',1595954049,1595954049),('French Guiana','ja','',1595954049,1595954049),('French Guiana','nl','',1595954049,1595954049),('French Guiana','pl','',1595954049,1595954049),('French Guiana','pt_BR','',1595954049,1595954049),('French Guiana','ru','',1595954049,1595954049),('French Guiana','sk','',1595954049,1595954049),('French Guiana','sv','',1595954049,1595954049),('French Guiana','sv_FI','',1595954049,1595954049),('French Guiana','tr','',1595954049,1595954049),('French Guiana','uk','',1595954049,1595954049),('French Guiana','zh_Hans','',1595954049,1595954049),('French Polynesia','cs','',1595954049,1595954049),('French Polynesia','de','',1595954049,1595954049),('French Polynesia','en','',1595954049,1595954049),('French Polynesia','es','',1595954049,1595954049),('French Polynesia','fa','',1595954049,1595954049),('French Polynesia','fr','',1595954049,1595954049),('French Polynesia','it','',1595954049,1595954049),('French Polynesia','ja','',1595954049,1595954049),('French Polynesia','nl','',1595954049,1595954049),('French Polynesia','pl','',1595954049,1595954049),('French Polynesia','pt_BR','',1595954049,1595954049),('French Polynesia','ru','',1595954049,1595954049),('French Polynesia','sk','',1595954049,1595954049),('French Polynesia','sv','',1595954049,1595954049),('French Polynesia','sv_FI','',1595954049,1595954049),('French Polynesia','tr','',1595954049,1595954049),('French Polynesia','uk','',1595954049,1595954049),('French Polynesia','zh_Hans','',1595954049,1595954049),('French Southern Territories','cs','',1595954049,1595954049),('French Southern Territories','de','',1595954049,1595954049),('French Southern Territories','en','',1595954049,1595954049),('French Southern Territories','es','',1595954049,1595954049),('French Southern Territories','fa','',1595954049,1595954049),('French Southern Territories','fr','',1595954049,1595954049),('French Southern Territories','it','',1595954049,1595954049),('French Southern Territories','ja','',1595954049,1595954049),('French Southern Territories','nl','',1595954049,1595954049),('French Southern Territories','pl','',1595954049,1595954049),('French Southern Territories','pt_BR','',1595954049,1595954049),('French Southern Territories','ru','',1595954049,1595954049),('French Southern Territories','sk','',1595954049,1595954049),('French Southern Territories','sv','',1595954049,1595954049),('French Southern Territories','sv_FI','',1595954049,1595954049),('French Southern Territories','tr','',1595954049,1595954049),('French Southern Territories','uk','',1595954049,1595954049),('French Southern Territories','zh_Hans','',1595954049,1595954049),('Friday','cs','',1595954198,1595954198),('Friday','de','',1595954198,1595954198),('Friday','en','',1595954198,1595954198),('Friday','es','',1595954198,1595954198),('Friday','fa','',1595954198,1595954198),('Friday','fr','',1595954198,1595954198),('Friday','it','',1595954198,1595954198),('Friday','ja','',1595954198,1595954198),('Friday','nl','',1595954198,1595954198),('Friday','pl','',1595954198,1595954198),('Friday','pt_BR','',1595954198,1595954198),('Friday','ru','',1595954198,1595954198),('Friday','sk','',1595954198,1595954198),('Friday','sv','',1595954198,1595954198),('Friday','sv_FI','',1595954198,1595954198),('Friday','tr','',1595954198,1595954198),('Friday','uk','',1595954198,1595954198),('Friday','zh_Hans','',1595954198,1595954198),('Full Path','cs','',1595923527,1595923527),('Full Path','de','',1595923527,1595923527),('Full Path','en','',1595923527,1595923527),('Full Path','es','',1595923527,1595923527),('Full Path','fa','',1595923527,1595923527),('Full Path','fr','',1595923527,1595923527),('Full Path','it','',1595923527,1595923527),('Full Path','ja','',1595923527,1595923527),('Full Path','nl','',1595923527,1595923527),('Full Path','pl','',1595923527,1595923527),('Full Path','pt_BR','',1595923527,1595923527),('Full Path','ru','',1595923527,1595923527),('Full Path','sk','',1595923527,1595923527),('Full Path','sv','',1595923527,1595923527),('Full Path','sv_FI','',1595923527,1595923527),('Full Path','tr','',1595923527,1595923527),('Full Path','uk','',1595923527,1595923527),('Full Path','zh_Hans','',1595923527,1595923527),('Gabon','cs','',1595954049,1595954049),('Gabon','de','',1595954049,1595954049),('Gabon','en','',1595954049,1595954049),('Gabon','es','',1595954049,1595954049),('Gabon','fa','',1595954049,1595954049),('Gabon','fr','',1595954049,1595954049),('Gabon','it','',1595954049,1595954049),('Gabon','ja','',1595954049,1595954049),('Gabon','nl','',1595954049,1595954049),('Gabon','pl','',1595954049,1595954049),('Gabon','pt_BR','',1595954049,1595954049),('Gabon','ru','',1595954049,1595954049),('Gabon','sk','',1595954049,1595954049),('Gabon','sv','',1595954049,1595954049),('Gabon','sv_FI','',1595954049,1595954049),('Gabon','tr','',1595954049,1595954049),('Gabon','uk','',1595954049,1595954049),('Gabon','zh_Hans','',1595954049,1595954049),('Gambia','cs','',1595954049,1595954049),('Gambia','de','',1595954049,1595954049),('Gambia','en','',1595954049,1595954049),('Gambia','es','',1595954049,1595954049),('Gambia','fa','',1595954049,1595954049),('Gambia','fr','',1595954049,1595954049),('Gambia','it','',1595954049,1595954049),('Gambia','ja','',1595954049,1595954049),('Gambia','nl','',1595954049,1595954049),('Gambia','pl','',1595954049,1595954049),('Gambia','pt_BR','',1595954049,1595954049),('Gambia','ru','',1595954049,1595954049),('Gambia','sk','',1595954049,1595954049),('Gambia','sv','',1595954049,1595954049),('Gambia','sv_FI','',1595954049,1595954049),('Gambia','tr','',1595954049,1595954049),('Gambia','uk','',1595954049,1595954049),('Gambia','zh_Hans','',1595954049,1595954049),('Gel','cs','',1595922208,1595922208),('Gel','de','',1595922208,1595922208),('Gel','en','',1595922208,1595922208),('Gel','es','',1595922208,1595922208),('Gel','fa','',1595922208,1595922208),('Gel','fr','',1595922208,1595922208),('Gel','it','',1595922208,1595922208),('Gel','ja','',1595922208,1595922208),('Gel','nl','',1595922208,1595922208),('Gel','pl','',1595922208,1595922208),('Gel','pt_BR','',1595922208,1595922208),('Gel','ru','',1595922208,1595922208),('Gel','sk','',1595922208,1595922208),('Gel','sv','',1595922208,1595922208),('Gel','sv_FI','',1595922208,1595922208),('Gel','tr','',1595922208,1595922208),('Gel','uk','',1595922208,1595922208),('Gel','zh_Hans','',1595922208,1595922208),('General Information','cs','',1606057287,1606057287),('General Information','de','',1606057287,1606057287),('General Information','en','',1606057287,1606057287),('General Information','es','',1606057287,1606057287),('General Information','fa','',1606057287,1606057287),('General Information','fr','',1606057287,1606057287),('General Information','it','',1606057287,1606057287),('General Information','ja','',1606057287,1606057287),('General Information','nl','',1606057287,1606057287),('General Information','pl','',1606057287,1606057287),('General Information','pt_BR','',1606057287,1606057287),('General Information','ru','',1606057287,1606057287),('General Information','sk','',1606057287,1606057287),('General Information','sv','',1606057287,1606057287),('General Information','sv_FI','',1606057287,1606057287),('General Information','tr','',1606057287,1606057287),('General Information','uk','',1606057287,1606057287),('General Information','zh_Hans','',1606057287,1606057287),('Generate','cs','',1609929774,1609929774),('Generate','de','',1609929774,1609929774),('Generate','en','',1609929774,1609929774),('Generate','es','',1609929774,1609929774),('Generate','fa','',1609929774,1609929774),('Generate','fr','',1609929774,1609929774),('Generate','it','',1609929774,1609929774),('Generate','ja','',1609929774,1609929774),('Generate','nl','',1609929774,1609929774),('Generate','pl','',1609929774,1609929774),('Generate','pt_BR','',1609929774,1609929774),('Generate','ru','',1609929774,1609929774),('Generate','sk','',1609929774,1609929774),('Generate','sv','',1609929774,1609929774),('Generate','sv_FI','',1609929774,1609929774),('Generate','tr','',1609929774,1609929774),('Generate','uk','',1609929774,1609929774),('Generate','zh_Hans','',1609929774,1609929774),('Georgia','cs','',1595954049,1595954049),('Georgia','de','',1595954049,1595954049),('Georgia','en','',1595954049,1595954049),('Georgia','es','',1595954049,1595954049),('Georgia','fa','',1595954049,1595954049),('Georgia','fr','',1595954049,1595954049),('Georgia','it','',1595954049,1595954049),('Georgia','ja','',1595954049,1595954049),('Georgia','nl','',1595954049,1595954049),('Georgia','pl','',1595954049,1595954049),('Georgia','pt_BR','',1595954049,1595954049),('Georgia','ru','',1595954049,1595954049),('Georgia','sk','',1595954049,1595954049),('Georgia','sv','',1595954049,1595954049),('Georgia','sv_FI','',1595954049,1595954049),('Georgia','tr','',1595954049,1595954049),('Georgia','uk','',1595954049,1595954049),('Georgia','zh_Hans','',1595954049,1595954049),('Germany','cs','',1595954049,1595954049),('Germany','de','',1595954049,1595954049),('Germany','en','',1595954049,1595954049),('Germany','es','',1595954049,1595954049),('Germany','fa','',1595954049,1595954049),('Germany','fr','',1595954049,1595954049),('Germany','it','',1595954049,1595954049),('Germany','ja','',1595954049,1595954049),('Germany','nl','',1595954049,1595954049),('Germany','pl','',1595954049,1595954049),('Germany','pt_BR','',1595954049,1595954049),('Germany','ru','',1595954049,1595954049),('Germany','sk','',1595954049,1595954049),('Germany','sv','',1595954049,1595954049),('Germany','sv_FI','',1595954049,1595954049),('Germany','tr','',1595954049,1595954049),('Germany','uk','',1595954049,1595954049),('Germany','zh_Hans','',1595954049,1595954049),('Ghana','cs','',1595954049,1595954049),('Ghana','de','',1595954049,1595954049),('Ghana','en','',1595954049,1595954049),('Ghana','es','',1595954049,1595954049),('Ghana','fa','',1595954049,1595954049),('Ghana','fr','',1595954049,1595954049),('Ghana','it','',1595954049,1595954049),('Ghana','ja','',1595954049,1595954049),('Ghana','nl','',1595954049,1595954049),('Ghana','pl','',1595954049,1595954049),('Ghana','pt_BR','',1595954049,1595954049),('Ghana','ru','',1595954049,1595954049),('Ghana','sk','',1595954049,1595954049),('Ghana','sv','',1595954049,1595954049),('Ghana','sv_FI','',1595954049,1595954049),('Ghana','tr','',1595954049,1595954049),('Ghana','uk','',1595954049,1595954049),('Ghana','zh_Hans','',1595954049,1595954049),('Gibraltar','cs','',1595954049,1595954049),('Gibraltar','de','',1595954049,1595954049),('Gibraltar','en','',1595954049,1595954049),('Gibraltar','es','',1595954049,1595954049),('Gibraltar','fa','',1595954049,1595954049),('Gibraltar','fr','',1595954049,1595954049),('Gibraltar','it','',1595954049,1595954049),('Gibraltar','ja','',1595954049,1595954049),('Gibraltar','nl','',1595954049,1595954049),('Gibraltar','pl','',1595954049,1595954049),('Gibraltar','pt_BR','',1595954049,1595954049),('Gibraltar','ru','',1595954049,1595954049),('Gibraltar','sk','',1595954049,1595954049),('Gibraltar','sv','',1595954049,1595954049),('Gibraltar','sv_FI','',1595954049,1595954049),('Gibraltar','tr','',1595954049,1595954049),('Gibraltar','uk','',1595954049,1595954049),('Gibraltar','zh_Hans','',1595954049,1595954049),('Giorno della Settimana','cs','',1595955187,1595955187),('Giorno della Settimana','de','',1595955187,1595955187),('Giorno della Settimana','en','',1595955187,1595955187),('Giorno della Settimana','es','',1595955187,1595955187),('Giorno della Settimana','fa','',1595955187,1595955187),('Giorno della Settimana','fr','',1595955187,1595955187),('Giorno della Settimana','it','',1595955187,1595955187),('Giorno della Settimana','ja','',1595955187,1595955187),('Giorno della Settimana','nl','',1595955187,1595955187),('Giorno della Settimana','pl','',1595955187,1595955187),('Giorno della Settimana','pt_BR','',1595955187,1595955187),('Giorno della Settimana','ru','',1595955187,1595955187),('Giorno della Settimana','sk','',1595955187,1595955187),('Giorno della Settimana','sv','',1595955187,1595955187),('Giorno della Settimana','sv_FI','',1595955187,1595955187),('Giorno della Settimana','tr','',1595955187,1595955187),('Giorno della Settimana','uk','',1595955187,1595955187),('Giorno della Settimana','zh_Hans','',1595955187,1595955187),('Gocce','cs','',1595922208,1595922208),('Gocce','de','',1595922208,1595922208),('Gocce','en','',1595922208,1595922208),('Gocce','es','',1595922208,1595922208),('Gocce','fa','',1595922208,1595922208),('Gocce','fr','',1595922208,1595922208),('Gocce','it','',1595922208,1595922208),('Gocce','ja','',1595922208,1595922208),('Gocce','nl','',1595922208,1595922208),('Gocce','pl','',1595922208,1595922208),('Gocce','pt_BR','',1595922208,1595922208),('Gocce','ru','',1595922208,1595922208),('Gocce','sk','',1595922208,1595922208),('Gocce','sv','',1595922208,1595922208),('Gocce','sv_FI','',1595922208,1595922208),('Gocce','tr','',1595922208,1595922208),('Gocce','uk','',1595922208,1595922208),('Gocce','zh_Hans','',1595922208,1595922208),('Greece','cs','',1595954049,1595954049),('Greece','de','',1595954049,1595954049),('Greece','en','',1595954049,1595954049),('Greece','es','',1595954049,1595954049),('Greece','fa','',1595954049,1595954049),('Greece','fr','',1595954049,1595954049),('Greece','it','',1595954049,1595954049),('Greece','ja','',1595954049,1595954049),('Greece','nl','',1595954049,1595954049),('Greece','pl','',1595954049,1595954049),('Greece','pt_BR','',1595954049,1595954049),('Greece','ru','',1595954049,1595954049),('Greece','sk','',1595954049,1595954049),('Greece','sv','',1595954049,1595954049),('Greece','sv_FI','',1595954049,1595954049),('Greece','tr','',1595954049,1595954049),('Greece','uk','',1595954049,1595954049),('Greece','zh_Hans','',1595954049,1595954049),('Greek (Greece)','cs','',1595918547,1595918547),('Greek (Greece)','de','',1595918547,1595918547),('Greek (Greece)','en','',1595918547,1595918547),('Greek (Greece)','es','',1595918547,1595918547),('Greek (Greece)','fa','',1595918547,1595918547),('Greek (Greece)','fr','',1595918547,1595918547),('Greek (Greece)','it','',1595918547,1595918547),('Greek (Greece)','ja','',1595918547,1595918547),('Greek (Greece)','nl','',1595918547,1595918547),('Greek (Greece)','pl','',1595918547,1595918547),('Greek (Greece)','pt_BR','',1595918547,1595918547),('Greek (Greece)','ru','',1595918547,1595918547),('Greek (Greece)','sk','',1595918547,1595918547),('Greek (Greece)','sv','',1595918547,1595918547),('Greek (Greece)','sv_FI','',1595918547,1595918547),('Greek (Greece)','tr','',1595918547,1595918547),('Greek (Greece)','uk','',1595918547,1595918547),('Greek (Greece)','zh_Hans','',1595918547,1595918547),('Greenland','cs','',1595954049,1595954049),('Greenland','de','',1595954049,1595954049),('Greenland','en','',1595954049,1595954049),('Greenland','es','',1595954049,1595954049),('Greenland','fa','',1595954049,1595954049),('Greenland','fr','',1595954049,1595954049),('Greenland','it','',1595954049,1595954049),('Greenland','ja','',1595954049,1595954049),('Greenland','nl','',1595954049,1595954049),('Greenland','pl','',1595954049,1595954049),('Greenland','pt_BR','',1595954049,1595954049),('Greenland','ru','',1595954049,1595954049),('Greenland','sk','',1595954049,1595954049),('Greenland','sv','',1595954049,1595954049),('Greenland','sv_FI','',1595954049,1595954049),('Greenland','tr','',1595954049,1595954049),('Greenland','uk','',1595954049,1595954049),('Greenland','zh_Hans','',1595954049,1595954049),('Grenada','cs','',1595954049,1595954049),('Grenada','de','',1595954049,1595954049),('Grenada','en','',1595954049,1595954049),('Grenada','es','',1595954049,1595954049),('Grenada','fa','',1595954049,1595954049),('Grenada','fr','',1595954049,1595954049),('Grenada','it','',1595954049,1595954049),('Grenada','ja','',1595954049,1595954049),('Grenada','nl','',1595954049,1595954049),('Grenada','pl','',1595954049,1595954049),('Grenada','pt_BR','',1595954049,1595954049),('Grenada','ru','',1595954049,1595954049),('Grenada','sk','',1595954049,1595954049),('Grenada','sv','',1595954049,1595954049),('Grenada','sv_FI','',1595954049,1595954049),('Grenada','tr','',1595954049,1595954049),('Grenada','uk','',1595954049,1595954049),('Grenada','zh_Hans','',1595954049,1595954049),('Guadeloupe','cs','',1595954049,1595954049),('Guadeloupe','de','',1595954049,1595954049),('Guadeloupe','en','',1595954049,1595954049),('Guadeloupe','es','',1595954049,1595954049),('Guadeloupe','fa','',1595954049,1595954049),('Guadeloupe','fr','',1595954049,1595954049),('Guadeloupe','it','',1595954049,1595954049),('Guadeloupe','ja','',1595954049,1595954049),('Guadeloupe','nl','',1595954049,1595954049),('Guadeloupe','pl','',1595954049,1595954049),('Guadeloupe','pt_BR','',1595954049,1595954049),('Guadeloupe','ru','',1595954049,1595954049),('Guadeloupe','sk','',1595954049,1595954049),('Guadeloupe','sv','',1595954049,1595954049),('Guadeloupe','sv_FI','',1595954049,1595954049),('Guadeloupe','tr','',1595954049,1595954049),('Guadeloupe','uk','',1595954049,1595954049),('Guadeloupe','zh_Hans','',1595954049,1595954049),('Guam','cs','',1595954049,1595954049),('Guam','de','',1595954049,1595954049),('Guam','en','',1595954049,1595954049),('Guam','es','',1595954049,1595954049),('Guam','fa','',1595954049,1595954049),('Guam','fr','',1595954049,1595954049),('Guam','it','',1595954049,1595954049),('Guam','ja','',1595954049,1595954049),('Guam','nl','',1595954049,1595954049),('Guam','pl','',1595954049,1595954049),('Guam','pt_BR','',1595954049,1595954049),('Guam','ru','',1595954049,1595954049),('Guam','sk','',1595954049,1595954049),('Guam','sv','',1595954049,1595954049),('Guam','sv_FI','',1595954049,1595954049),('Guam','tr','',1595954049,1595954049),('Guam','uk','',1595954049,1595954049),('Guam','zh_Hans','',1595954049,1595954049),('Guatemala','cs','',1595954049,1595954049),('Guatemala','de','',1595954049,1595954049),('Guatemala','en','',1595954049,1595954049),('Guatemala','es','',1595954049,1595954049),('Guatemala','fa','',1595954049,1595954049),('Guatemala','fr','',1595954049,1595954049),('Guatemala','it','',1595954049,1595954049),('Guatemala','ja','',1595954049,1595954049),('Guatemala','nl','',1595954049,1595954049),('Guatemala','pl','',1595954049,1595954049),('Guatemala','pt_BR','',1595954049,1595954049),('Guatemala','ru','',1595954049,1595954049),('Guatemala','sk','',1595954049,1595954049),('Guatemala','sv','',1595954049,1595954049),('Guatemala','sv_FI','',1595954049,1595954049),('Guatemala','tr','',1595954049,1595954049),('Guatemala','uk','',1595954049,1595954049),('Guatemala','zh_Hans','',1595954049,1595954049),('Guernsey','cs','',1595954049,1595954049),('Guernsey','de','',1595954049,1595954049),('Guernsey','en','',1595954049,1595954049),('Guernsey','es','',1595954049,1595954049),('Guernsey','fa','',1595954049,1595954049),('Guernsey','fr','',1595954049,1595954049),('Guernsey','it','',1595954049,1595954049),('Guernsey','ja','',1595954049,1595954049),('Guernsey','nl','',1595954049,1595954049),('Guernsey','pl','',1595954049,1595954049),('Guernsey','pt_BR','',1595954049,1595954049),('Guernsey','ru','',1595954049,1595954049),('Guernsey','sk','',1595954049,1595954049),('Guernsey','sv','',1595954049,1595954049),('Guernsey','sv_FI','',1595954049,1595954049),('Guernsey','tr','',1595954049,1595954049),('Guernsey','uk','',1595954049,1595954049),('Guernsey','zh_Hans','',1595954049,1595954049),('Guinea','cs','',1595954049,1595954049),('Guinea','de','',1595954049,1595954049),('Guinea','en','',1595954049,1595954049),('Guinea','es','',1595954049,1595954049),('Guinea','fa','',1595954049,1595954049),('Guinea','fr','',1595954049,1595954049),('Guinea','it','',1595954049,1595954049),('Guinea','ja','',1595954049,1595954049),('Guinea','nl','',1595954049,1595954049),('Guinea','pl','',1595954049,1595954049),('Guinea','pt_BR','',1595954049,1595954049),('Guinea','ru','',1595954049,1595954049),('Guinea','sk','',1595954049,1595954049),('Guinea','sv','',1595954049,1595954049),('Guinea','sv_FI','',1595954049,1595954049),('Guinea','tr','',1595954049,1595954049),('Guinea','uk','',1595954049,1595954049),('Guinea','zh_Hans','',1595954049,1595954049),('Guinea-Bissau','cs','',1595954049,1595954049),('Guinea-Bissau','de','',1595954049,1595954049),('Guinea-Bissau','en','',1595954049,1595954049),('Guinea-Bissau','es','',1595954049,1595954049),('Guinea-Bissau','fa','',1595954049,1595954049),('Guinea-Bissau','fr','',1595954049,1595954049),('Guinea-Bissau','it','',1595954049,1595954049),('Guinea-Bissau','ja','',1595954049,1595954049),('Guinea-Bissau','nl','',1595954049,1595954049),('Guinea-Bissau','pl','',1595954049,1595954049),('Guinea-Bissau','pt_BR','',1595954049,1595954049),('Guinea-Bissau','ru','',1595954049,1595954049),('Guinea-Bissau','sk','',1595954049,1595954049),('Guinea-Bissau','sv','',1595954049,1595954049),('Guinea-Bissau','sv_FI','',1595954049,1595954049),('Guinea-Bissau','tr','',1595954049,1595954049),('Guinea-Bissau','uk','',1595954049,1595954049),('Guinea-Bissau','zh_Hans','',1595954049,1595954049),('Guyana','cs','',1595954049,1595954049),('Guyana','de','',1595954049,1595954049),('Guyana','en','',1595954049,1595954049),('Guyana','es','',1595954049,1595954049),('Guyana','fa','',1595954049,1595954049),('Guyana','fr','',1595954049,1595954049),('Guyana','it','',1595954049,1595954049),('Guyana','ja','',1595954049,1595954049),('Guyana','nl','',1595954049,1595954049),('Guyana','pl','',1595954049,1595954049),('Guyana','pt_BR','',1595954049,1595954049),('Guyana','ru','',1595954049,1595954049),('Guyana','sk','',1595954049,1595954049),('Guyana','sv','',1595954049,1595954049),('Guyana','sv_FI','',1595954049,1595954049),('Guyana','tr','',1595954049,1595954049),('Guyana','uk','',1595954049,1595954049),('Guyana','zh_Hans','',1595954049,1595954049),('Haiti','cs','',1595954049,1595954049),('Haiti','de','',1595954049,1595954049),('Haiti','en','',1595954049,1595954049),('Haiti','es','',1595954049,1595954049),('Haiti','fa','',1595954049,1595954049),('Haiti','fr','',1595954049,1595954049),('Haiti','it','',1595954049,1595954049),('Haiti','ja','',1595954049,1595954049),('Haiti','nl','',1595954049,1595954049),('Haiti','pl','',1595954049,1595954049),('Haiti','pt_BR','',1595954049,1595954049),('Haiti','ru','',1595954049,1595954049),('Haiti','sk','',1595954049,1595954049),('Haiti','sv','',1595954049,1595954049),('Haiti','sv_FI','',1595954049,1595954049),('Haiti','tr','',1595954049,1595954049),('Haiti','uk','',1595954049,1595954049),('Haiti','zh_Hans','',1595954049,1595954049),('Honduras','cs','',1595954049,1595954049),('Honduras','de','',1595954049,1595954049),('Honduras','en','',1595954049,1595954049),('Honduras','es','',1595954049,1595954049),('Honduras','fa','',1595954049,1595954049),('Honduras','fr','',1595954049,1595954049),('Honduras','it','',1595954049,1595954049),('Honduras','ja','',1595954049,1595954049),('Honduras','nl','',1595954049,1595954049),('Honduras','pl','',1595954049,1595954049),('Honduras','pt_BR','',1595954049,1595954049),('Honduras','ru','',1595954049,1595954049),('Honduras','sk','',1595954049,1595954049),('Honduras','sv','',1595954049,1595954049),('Honduras','sv_FI','',1595954049,1595954049),('Honduras','tr','',1595954049,1595954049),('Honduras','uk','',1595954049,1595954049),('Honduras','zh_Hans','',1595954049,1595954049),('Hong Kong SAR China','cs','',1595954049,1595954049),('Hong Kong SAR China','de','',1595954049,1595954049),('Hong Kong SAR China','en','',1595954049,1595954049),('Hong Kong SAR China','es','',1595954049,1595954049),('Hong Kong SAR China','fa','',1595954049,1595954049),('Hong Kong SAR China','fr','',1595954049,1595954049),('Hong Kong SAR China','it','',1595954049,1595954049),('Hong Kong SAR China','ja','',1595954049,1595954049),('Hong Kong SAR China','nl','',1595954049,1595954049),('Hong Kong SAR China','pl','',1595954049,1595954049),('Hong Kong SAR China','pt_BR','',1595954049,1595954049),('Hong Kong SAR China','ru','',1595954049,1595954049),('Hong Kong SAR China','sk','',1595954049,1595954049),('Hong Kong SAR China','sv','',1595954049,1595954049),('Hong Kong SAR China','sv_FI','',1595954049,1595954049),('Hong Kong SAR China','tr','',1595954049,1595954049),('Hong Kong SAR China','uk','',1595954049,1595954049),('Hong Kong SAR China','zh_Hans','',1595954049,1595954049),('Hungary','cs','',1595954049,1595954049),('Hungary','de','',1595954049,1595954049),('Hungary','en','',1595954049,1595954049),('Hungary','es','',1595954049,1595954049),('Hungary','fa','',1595954049,1595954049),('Hungary','fr','',1595954049,1595954049),('Hungary','it','',1595954049,1595954049),('Hungary','ja','',1595954049,1595954049),('Hungary','nl','',1595954049,1595954049),('Hungary','pl','',1595954049,1595954049),('Hungary','pt_BR','',1595954049,1595954049),('Hungary','ru','',1595954049,1595954049),('Hungary','sk','',1595954049,1595954049),('Hungary','sv','',1595954049,1595954049),('Hungary','sv_FI','',1595954049,1595954049),('Hungary','tr','',1595954049,1595954049),('Hungary','uk','',1595954049,1595954049),('Hungary','zh_Hans','',1595954049,1595954049),('Iceland','cs','',1595954049,1595954049),('Iceland','de','',1595954049,1595954049),('Iceland','en','',1595954049,1595954049),('Iceland','es','',1595954049,1595954049),('Iceland','fa','',1595954049,1595954049),('Iceland','fr','',1595954049,1595954049),('Iceland','it','',1595954049,1595954049),('Iceland','ja','',1595954049,1595954049),('Iceland','nl','',1595954049,1595954049),('Iceland','pl','',1595954049,1595954049),('Iceland','pt_BR','',1595954049,1595954049),('Iceland','ru','',1595954049,1595954049),('Iceland','sk','',1595954049,1595954049),('Iceland','sv','',1595954049,1595954049),('Iceland','sv_FI','',1595954049,1595954049),('Iceland','tr','',1595954049,1595954049),('Iceland','uk','',1595954049,1595954049),('Iceland','zh_Hans','',1595954049,1595954049),('ImageInfo','cs','',1595922537,1595922537),('ImageInfo','de','',1595922537,1595922537),('ImageInfo','en','',1595922537,1595922537),('ImageInfo','es','',1595922537,1595922537),('ImageInfo','fa','',1595922537,1595922537),('ImageInfo','fr','',1595922537,1595922537),('ImageInfo','it','',1595922537,1595922537),('ImageInfo','ja','',1595922537,1595922537),('ImageInfo','nl','',1595922537,1595922537),('ImageInfo','pl','',1595922537,1595922537),('ImageInfo','pt_BR','',1595922537,1595922537),('ImageInfo','ru','',1595922537,1595922537),('ImageInfo','sk','',1595922537,1595922537),('ImageInfo','sv','',1595922537,1595922537),('ImageInfo','sv_FI','',1595922537,1595922537),('ImageInfo','tr','',1595922537,1595922537),('ImageInfo','uk','',1595922537,1595922537),('ImageInfo','zh_Hans','',1595922537,1595922537),('Immagine','cs','',1595922537,1595922537),('Immagine','de','',1595922537,1595922537),('Immagine','en','',1595922537,1595922537),('Immagine','es','',1595922537,1595922537),('Immagine','fa','',1595922537,1595922537),('Immagine','fr','',1595922537,1595922537),('Immagine','it','',1595922537,1595922537),('Immagine','ja','',1595922537,1595922537),('Immagine','nl','',1595922537,1595922537),('Immagine','pl','',1595922537,1595922537),('Immagine','pt_BR','',1595922537,1595922537),('Immagine','ru','',1595922537,1595922537),('Immagine','sk','',1595922537,1595922537),('Immagine','sv','',1595922537,1595922537),('Immagine','sv_FI','',1595922537,1595922537),('Immagine','tr','',1595922537,1595922537),('Immagine','uk','',1595922537,1595922537),('Immagine','zh_Hans','',1595922537,1595922537),('Immagini','cs','',1595918163,1595918163),('Immagini','de','',1595918163,1595918163),('Immagini','en','',1595918163,1595918163),('Immagini','es','',1595918163,1595918163),('Immagini','fa','',1595918163,1595918163),('Immagini','fr','',1595918163,1595918163),('Immagini','it','',1595918163,1595918163),('Immagini','ja','',1595918163,1595918163),('Immagini','nl','',1595918163,1595918163),('Immagini','pl','',1595918163,1595918163),('Immagini','pt_BR','',1595918163,1595918163),('Immagini','ru','',1595918163,1595918163),('Immagini','sk','',1595918163,1595918163),('Immagini','sv','',1595918163,1595918163),('Immagini','sv_FI','',1595918163,1595918163),('Immagini','tr','',1595918163,1595918163),('Immagini','uk','',1595918163,1595918163),('Immagini','zh_Hans','',1595918163,1595918163),('Immagini del Prodotto','cs','',1595922537,1595922537),('Immagini del Prodotto','de','',1595922537,1595922537),('Immagini del Prodotto','en','',1595922537,1595922537),('Immagini del Prodotto','es','',1595922537,1595922537),('Immagini del Prodotto','fa','',1595922537,1595922537),('Immagini del Prodotto','fr','',1595922537,1595922537),('Immagini del Prodotto','it','',1595922537,1595922537),('Immagini del Prodotto','ja','',1595922537,1595922537),('Immagini del Prodotto','nl','',1595922537,1595922537),('Immagini del Prodotto','pl','',1595922537,1595922537),('Immagini del Prodotto','pt_BR','',1595922537,1595922537),('Immagini del Prodotto','ru','',1595922537,1595922537),('Immagini del Prodotto','sk','',1595922537,1595922537),('Immagini del Prodotto','sv','',1595922537,1595922537),('Immagini del Prodotto','sv_FI','',1595922537,1595922537),('Immagini del Prodotto','tr','',1595922537,1595922537),('Immagini del Prodotto','uk','',1595922537,1595922537),('Immagini del Prodotto','zh_Hans','',1595922537,1595922537),('India','cs','',1595954049,1595954049),('India','de','',1595954049,1595954049),('India','en','',1595954049,1595954049),('India','es','',1595954049,1595954049),('India','fa','',1595954049,1595954049),('India','fr','',1595954049,1595954049),('India','it','',1595954049,1595954049),('India','ja','',1595954049,1595954049),('India','nl','',1595954049,1595954049),('India','pl','',1595954049,1595954049),('India','pt_BR','',1595954049,1595954049),('India','ru','',1595954049,1595954049),('India','sk','',1595954049,1595954049),('India','sv','',1595954049,1595954049),('India','sv_FI','',1595954049,1595954049),('India','tr','',1595954049,1595954049),('India','uk','',1595954049,1595954049),('India','zh_Hans','',1595954049,1595954049),('Indirizzo','cs','',1595953778,1595953778),('Indirizzo','de','',1595953778,1595953778),('Indirizzo','en','',1595953778,1595953778),('Indirizzo','es','',1595953778,1595953778),('Indirizzo','fa','',1595953778,1595953778),('Indirizzo','fr','',1595953778,1595953778),('Indirizzo','it','',1595953778,1595953778),('Indirizzo','ja','',1595953778,1595953778),('Indirizzo','nl','',1595953778,1595953778),('Indirizzo','pl','',1595953778,1595953778),('Indirizzo','pt_BR','',1595953778,1595953778),('Indirizzo','ru','',1595953778,1595953778),('Indirizzo','sk','',1595953778,1595953778),('Indirizzo','sv','',1595953778,1595953778),('Indirizzo','sv_FI','',1595953778,1595953778),('Indirizzo','tr','',1595953778,1595953778),('Indirizzo','uk','',1595953778,1595953778),('Indirizzo','zh_Hans','',1595953778,1595953778),('Indonesia','cs','',1595954049,1595954049),('Indonesia','de','',1595954049,1595954049),('Indonesia','en','',1595954049,1595954049),('Indonesia','es','',1595954049,1595954049),('Indonesia','fa','',1595954049,1595954049),('Indonesia','fr','',1595954049,1595954049),('Indonesia','it','',1595954049,1595954049),('Indonesia','ja','',1595954049,1595954049),('Indonesia','nl','',1595954049,1595954049),('Indonesia','pl','',1595954049,1595954049),('Indonesia','pt_BR','',1595954049,1595954049),('Indonesia','ru','',1595954049,1595954049),('Indonesia','sk','',1595954049,1595954049),('Indonesia','sv','',1595954049,1595954049),('Indonesia','sv_FI','',1595954049,1595954049),('Indonesia','tr','',1595954049,1595954049),('Indonesia','uk','',1595954049,1595954049),('Indonesia','zh_Hans','',1595954049,1595954049),('Informazioni Farmacia','cs','',1595953778,1595953778),('Informazioni Farmacia','de','',1595953778,1595953778),('Informazioni Farmacia','en','',1595953778,1595953778),('Informazioni Farmacia','es','',1595953778,1595953778),('Informazioni Farmacia','fa','',1595953778,1595953778),('Informazioni Farmacia','fr','',1595953778,1595953778),('Informazioni Farmacia','it','',1595953778,1595953778),('Informazioni Farmacia','ja','',1595953778,1595953778),('Informazioni Farmacia','nl','',1595953778,1595953778),('Informazioni Farmacia','pl','',1595953778,1595953778),('Informazioni Farmacia','pt_BR','',1595953778,1595953778),('Informazioni Farmacia','ru','',1595953778,1595953778),('Informazioni Farmacia','sk','',1595953778,1595953778),('Informazioni Farmacia','sv','',1595953778,1595953778),('Informazioni Farmacia','sv_FI','',1595953778,1595953778),('Informazioni Farmacia','tr','',1595953778,1595953778),('Informazioni Farmacia','uk','',1595953778,1595953778),('Informazioni Farmacia','zh_Hans','',1595953778,1595953778),('Informazioni Prodotto','cs','',1595918163,1595918163),('Informazioni Prodotto','de','',1595918163,1595918163),('Informazioni Prodotto','en','',1595918163,1595918163),('Informazioni Prodotto','es','',1595918163,1595918163),('Informazioni Prodotto','fa','',1595918163,1595918163),('Informazioni Prodotto','fr','',1595918163,1595918163),('Informazioni Prodotto','it','',1595918163,1595918163),('Informazioni Prodotto','ja','',1595918163,1595918163),('Informazioni Prodotto','nl','',1595918163,1595918163),('Informazioni Prodotto','pl','',1595918163,1595918163),('Informazioni Prodotto','pt_BR','',1595918163,1595918163),('Informazioni Prodotto','ru','',1595918163,1595918163),('Informazioni Prodotto','sk','',1595918163,1595918163),('Informazioni Prodotto','sv','',1595918163,1595918163),('Informazioni Prodotto','sv_FI','',1595918163,1595918163),('Informazioni Prodotto','tr','',1595918163,1595918163),('Informazioni Prodotto','uk','',1595918163,1595918163),('Informazioni Prodotto','zh_Hans','',1595918163,1595918163),('Iran','cs','',1595954049,1595954049),('Iran','de','',1595954049,1595954049),('Iran','en','',1595954049,1595954049),('Iran','es','',1595954049,1595954049),('Iran','fa','',1595954049,1595954049),('Iran','fr','',1595954049,1595954049),('Iran','it','',1595954049,1595954049),('Iran','ja','',1595954049,1595954049),('Iran','nl','',1595954049,1595954049),('Iran','pl','',1595954049,1595954049),('Iran','pt_BR','',1595954049,1595954049),('Iran','ru','',1595954049,1595954049),('Iran','sk','',1595954049,1595954049),('Iran','sv','',1595954049,1595954049),('Iran','sv_FI','',1595954049,1595954049),('Iran','tr','',1595954049,1595954049),('Iran','uk','',1595954049,1595954049),('Iran','zh_Hans','',1595954049,1595954049),('Iraq','cs','',1595954049,1595954049),('Iraq','de','',1595954049,1595954049),('Iraq','en','',1595954049,1595954049),('Iraq','es','',1595954049,1595954049),('Iraq','fa','',1595954049,1595954049),('Iraq','fr','',1595954049,1595954049),('Iraq','it','',1595954049,1595954049),('Iraq','ja','',1595954049,1595954049),('Iraq','nl','',1595954049,1595954049),('Iraq','pl','',1595954049,1595954049),('Iraq','pt_BR','',1595954049,1595954049),('Iraq','ru','',1595954049,1595954049),('Iraq','sk','',1595954049,1595954049),('Iraq','sv','',1595954049,1595954049),('Iraq','sv_FI','',1595954049,1595954049),('Iraq','tr','',1595954049,1595954049),('Iraq','uk','',1595954049,1595954049),('Iraq','zh_Hans','',1595954049,1595954049),('Ireland','cs','',1595954049,1595954049),('Ireland','de','',1595954049,1595954049),('Ireland','en','',1595954049,1595954049),('Ireland','es','',1595954049,1595954049),('Ireland','fa','',1595954049,1595954049),('Ireland','fr','',1595954049,1595954049),('Ireland','it','',1595954049,1595954049),('Ireland','ja','',1595954049,1595954049),('Ireland','nl','',1595954049,1595954049),('Ireland','pl','',1595954049,1595954049),('Ireland','pt_BR','',1595954049,1595954049),('Ireland','ru','',1595954049,1595954049),('Ireland','sk','',1595954049,1595954049),('Ireland','sv','',1595954049,1595954049),('Ireland','sv_FI','',1595954049,1595954049),('Ireland','tr','',1595954049,1595954049),('Ireland','uk','',1595954049,1595954049),('Ireland','zh_Hans','',1595954049,1595954049),('Isle of Man','cs','',1595954049,1595954049),('Isle of Man','de','',1595954049,1595954049),('Isle of Man','en','',1595954049,1595954049),('Isle of Man','es','',1595954049,1595954049),('Isle of Man','fa','',1595954049,1595954049),('Isle of Man','fr','',1595954049,1595954049),('Isle of Man','it','',1595954049,1595954049),('Isle of Man','ja','',1595954049,1595954049),('Isle of Man','nl','',1595954049,1595954049),('Isle of Man','pl','',1595954049,1595954049),('Isle of Man','pt_BR','',1595954049,1595954049),('Isle of Man','ru','',1595954049,1595954049),('Isle of Man','sk','',1595954049,1595954049),('Isle of Man','sv','',1595954049,1595954049),('Isle of Man','sv_FI','',1595954049,1595954049),('Isle of Man','tr','',1595954049,1595954049),('Isle of Man','uk','',1595954049,1595954049),('Isle of Man','zh_Hans','',1595954049,1595954049),('Israel','cs','',1595954049,1595954049),('Israel','de','',1595954049,1595954049),('Israel','en','',1595954049,1595954049),('Israel','es','',1595954049,1595954049),('Israel','fa','',1595954049,1595954049),('Israel','fr','',1595954049,1595954049),('Israel','it','',1595954049,1595954049),('Israel','ja','',1595954049,1595954049),('Israel','nl','',1595954049,1595954049),('Israel','pl','',1595954049,1595954049),('Israel','pt_BR','',1595954049,1595954049),('Israel','ru','',1595954049,1595954049),('Israel','sk','',1595954049,1595954049),('Israel','sv','',1595954049,1595954049),('Israel','sv_FI','',1595954049,1595954049),('Israel','tr','',1595954049,1595954049),('Israel','uk','',1595954049,1595954049),('Israel','zh_Hans','',1595954049,1595954049),('Italian','cs','',1595918547,1595918547),('Italian','de','',1595918547,1595918547),('Italian','en','',1595918547,1595918547),('Italian','es','',1595918547,1595918547),('Italian','fa','',1595918547,1595918547),('Italian','fr','',1595918547,1595918547),('Italian','it','',1595918547,1595918547),('Italian','ja','',1595918547,1595918547),('Italian','nl','',1595918547,1595918547),('Italian','pl','',1595918547,1595918547),('Italian','pt_BR','',1595918547,1595918547),('Italian','ru','',1595918547,1595918547),('Italian','sk','',1595918547,1595918547),('Italian','sv','',1595918547,1595918547),('Italian','sv_FI','',1595918547,1595918547),('Italian','tr','',1595918547,1595918547),('Italian','uk','',1595918547,1595918547),('Italian','zh_Hans','',1595918547,1595918547),('Italy','cs','',1595954050,1595954050),('Italy','de','',1595954050,1595954050),('Italy','en','',1595954050,1595954050),('Italy','es','',1595954050,1595954050),('Italy','fa','',1595954050,1595954050),('Italy','fr','',1595954050,1595954050),('Italy','it','',1595954050,1595954050),('Italy','ja','',1595954050,1595954050),('Italy','nl','',1595954050,1595954050),('Italy','pl','',1595954050,1595954050),('Italy','pt_BR','',1595954050,1595954050),('Italy','ru','',1595954050,1595954050),('Italy','sk','',1595954050,1595954050),('Italy','sv','',1595954050,1595954050),('Italy','sv_FI','',1595954050,1595954050),('Italy','tr','',1595954050,1595954050),('Italy','uk','',1595954050,1595954050),('Italy','zh_Hans','',1595954050,1595954050),('Jamaica','cs','',1595954050,1595954050),('Jamaica','de','',1595954050,1595954050),('Jamaica','en','',1595954050,1595954050),('Jamaica','es','',1595954050,1595954050),('Jamaica','fa','',1595954050,1595954050),('Jamaica','fr','',1595954050,1595954050),('Jamaica','it','',1595954050,1595954050),('Jamaica','ja','',1595954050,1595954050),('Jamaica','nl','',1595954050,1595954050),('Jamaica','pl','',1595954050,1595954050),('Jamaica','pt_BR','',1595954050,1595954050),('Jamaica','ru','',1595954050,1595954050),('Jamaica','sk','',1595954050,1595954050),('Jamaica','sv','',1595954050,1595954050),('Jamaica','sv_FI','',1595954050,1595954050),('Jamaica','tr','',1595954050,1595954050),('Jamaica','uk','',1595954050,1595954050),('Jamaica','zh_Hans','',1595954050,1595954050),('Japan','cs','',1595954050,1595954050),('Japan','de','',1595954050,1595954050),('Japan','en','',1595954050,1595954050),('Japan','es','',1595954050,1595954050),('Japan','fa','',1595954050,1595954050),('Japan','fr','',1595954050,1595954050),('Japan','it','',1595954050,1595954050),('Japan','ja','',1595954050,1595954050),('Japan','nl','',1595954050,1595954050),('Japan','pl','',1595954050,1595954050),('Japan','pt_BR','',1595954050,1595954050),('Japan','ru','',1595954050,1595954050),('Japan','sk','',1595954050,1595954050),('Japan','sv','',1595954050,1595954050),('Japan','sv_FI','',1595954050,1595954050),('Japan','tr','',1595954050,1595954050),('Japan','uk','',1595954050,1595954050),('Japan','zh_Hans','',1595954050,1595954050),('Jersey','cs','',1595954050,1595954050),('Jersey','de','',1595954050,1595954050),('Jersey','en','',1595954050,1595954050),('Jersey','es','',1595954050,1595954050),('Jersey','fa','',1595954050,1595954050),('Jersey','fr','',1595954050,1595954050),('Jersey','it','',1595954050,1595954050),('Jersey','ja','',1595954050,1595954050),('Jersey','nl','',1595954050,1595954050),('Jersey','pl','',1595954050,1595954050),('Jersey','pt_BR','',1595954050,1595954050),('Jersey','ru','',1595954050,1595954050),('Jersey','sk','',1595954050,1595954050),('Jersey','sv','',1595954050,1595954050),('Jersey','sv_FI','',1595954050,1595954050),('Jersey','tr','',1595954050,1595954050),('Jersey','uk','',1595954050,1595954050),('Jersey','zh_Hans','',1595954050,1595954050),('Jordan','cs','',1595954050,1595954050),('Jordan','de','',1595954050,1595954050),('Jordan','en','',1595954050,1595954050),('Jordan','es','',1595954050,1595954050),('Jordan','fa','',1595954050,1595954050),('Jordan','fr','',1595954050,1595954050),('Jordan','it','',1595954050,1595954050),('Jordan','ja','',1595954050,1595954050),('Jordan','nl','',1595954050,1595954050),('Jordan','pl','',1595954050,1595954050),('Jordan','pt_BR','',1595954050,1595954050),('Jordan','ru','',1595954050,1595954050),('Jordan','sk','',1595954050,1595954050),('Jordan','sv','',1595954050,1595954050),('Jordan','sv_FI','',1595954050,1595954050),('Jordan','tr','',1595954050,1595954050),('Jordan','uk','',1595954050,1595954050),('Jordan','zh_Hans','',1595954050,1595954050),('Kazakhstan','cs','',1595954050,1595954050),('Kazakhstan','de','',1595954050,1595954050),('Kazakhstan','en','',1595954050,1595954050),('Kazakhstan','es','',1595954050,1595954050),('Kazakhstan','fa','',1595954050,1595954050),('Kazakhstan','fr','',1595954050,1595954050),('Kazakhstan','it','',1595954050,1595954050),('Kazakhstan','ja','',1595954050,1595954050),('Kazakhstan','nl','',1595954050,1595954050),('Kazakhstan','pl','',1595954050,1595954050),('Kazakhstan','pt_BR','',1595954050,1595954050),('Kazakhstan','ru','',1595954050,1595954050),('Kazakhstan','sk','',1595954050,1595954050),('Kazakhstan','sv','',1595954050,1595954050),('Kazakhstan','sv_FI','',1595954050,1595954050),('Kazakhstan','tr','',1595954050,1595954050),('Kazakhstan','uk','',1595954050,1595954050),('Kazakhstan','zh_Hans','',1595954050,1595954050),('Kenya','cs','',1595954050,1595954050),('Kenya','de','',1595954050,1595954050),('Kenya','en','',1595954050,1595954050),('Kenya','es','',1595954050,1595954050),('Kenya','fa','',1595954050,1595954050),('Kenya','fr','',1595954050,1595954050),('Kenya','it','',1595954050,1595954050),('Kenya','ja','',1595954050,1595954050),('Kenya','nl','',1595954050,1595954050),('Kenya','pl','',1595954050,1595954050),('Kenya','pt_BR','',1595954050,1595954050),('Kenya','ru','',1595954050,1595954050),('Kenya','sk','',1595954050,1595954050),('Kenya','sv','',1595954050,1595954050),('Kenya','sv_FI','',1595954050,1595954050),('Kenya','tr','',1595954050,1595954050),('Kenya','uk','',1595954050,1595954050),('Kenya','zh_Hans','',1595954050,1595954050),('Kg','cs','',1595922924,1595922924),('Kg','de','',1595922924,1595922924),('Kg','en','',1595922924,1595922924),('Kg','es','',1595922924,1595922924),('Kg','fa','',1595922924,1595922924),('Kg','fr','',1595922924,1595922924),('Kg','it','',1595922924,1595922924),('Kg','ja','',1595922924,1595922924),('Kg','nl','',1595922924,1595922924),('Kg','pl','',1595922924,1595922924),('Kg','pt_BR','',1595922924,1595922924),('Kg','ru','',1595922924,1595922924),('Kg','sk','',1595922924,1595922924),('Kg','sv','',1595922924,1595922924),('Kg','sv_FI','',1595922924,1595922924),('Kg','tr','',1595922924,1595922924),('Kg','uk','',1595922924,1595922924),('Kg','zh_Hans','',1595922924,1595922924),('Kilograms','cs','',1607157321,1607157321),('Kilograms','de','',1607157321,1607157321),('Kilograms','en','',1607157321,1607157321),('Kilograms','es','',1607157321,1607157321),('Kilograms','fa','',1607157321,1607157321),('Kilograms','fr','',1607157321,1607157321),('Kilograms','it','',1607157321,1607157321),('Kilograms','ja','',1607157321,1607157321),('Kilograms','nl','',1607157321,1607157321),('Kilograms','pl','',1607157321,1607157321),('Kilograms','pt_BR','',1607157321,1607157321),('Kilograms','ru','',1607157321,1607157321),('Kilograms','sk','',1607157321,1607157321),('Kilograms','sv','',1607157321,1607157321),('Kilograms','sv_FI','',1607157321,1607157321),('Kilograms','tr','',1607157321,1607157321),('Kilograms','uk','',1607157321,1607157321),('Kilograms','zh_Hans','',1607157321,1607157321),('Kiribati','cs','',1595954050,1595954050),('Kiribati','de','',1595954050,1595954050),('Kiribati','en','',1595954050,1595954050),('Kiribati','es','',1595954050,1595954050),('Kiribati','fa','',1595954050,1595954050),('Kiribati','fr','',1595954050,1595954050),('Kiribati','it','',1595954050,1595954050),('Kiribati','ja','',1595954050,1595954050),('Kiribati','nl','',1595954050,1595954050),('Kiribati','pl','',1595954050,1595954050),('Kiribati','pt_BR','',1595954050,1595954050),('Kiribati','ru','',1595954050,1595954050),('Kiribati','sk','',1595954050,1595954050),('Kiribati','sv','',1595954050,1595954050),('Kiribati','sv_FI','',1595954050,1595954050),('Kiribati','tr','',1595954050,1595954050),('Kiribati','uk','',1595954050,1595954050),('Kiribati','zh_Hans','',1595954050,1595954050),('Kosovo','cs','',1595954050,1595954050),('Kosovo','de','',1595954050,1595954050),('Kosovo','en','',1595954050,1595954050),('Kosovo','es','',1595954050,1595954050),('Kosovo','fa','',1595954050,1595954050),('Kosovo','fr','',1595954050,1595954050),('Kosovo','it','',1595954050,1595954050),('Kosovo','ja','',1595954050,1595954050),('Kosovo','nl','',1595954050,1595954050),('Kosovo','pl','',1595954050,1595954050),('Kosovo','pt_BR','',1595954050,1595954050),('Kosovo','ru','',1595954050,1595954050),('Kosovo','sk','',1595954050,1595954050),('Kosovo','sv','',1595954050,1595954050),('Kosovo','sv_FI','',1595954050,1595954050),('Kosovo','tr','',1595954050,1595954050),('Kosovo','uk','',1595954050,1595954050),('Kosovo','zh_Hans','',1595954050,1595954050),('Kuwait','cs','',1595954050,1595954050),('Kuwait','de','',1595954050,1595954050),('Kuwait','en','',1595954050,1595954050),('Kuwait','es','',1595954050,1595954050),('Kuwait','fa','',1595954050,1595954050),('Kuwait','fr','',1595954050,1595954050),('Kuwait','it','',1595954050,1595954050),('Kuwait','ja','',1595954050,1595954050),('Kuwait','nl','',1595954050,1595954050),('Kuwait','pl','',1595954050,1595954050),('Kuwait','pt_BR','',1595954050,1595954050),('Kuwait','ru','',1595954050,1595954050),('Kuwait','sk','',1595954050,1595954050),('Kuwait','sv','',1595954050,1595954050),('Kuwait','sv_FI','',1595954050,1595954050),('Kuwait','tr','',1595954050,1595954050),('Kuwait','uk','',1595954050,1595954050),('Kuwait','zh_Hans','',1595954050,1595954050),('Kyrgyzstan','cs','',1595954050,1595954050),('Kyrgyzstan','de','',1595954050,1595954050),('Kyrgyzstan','en','',1595954050,1595954050),('Kyrgyzstan','es','',1595954050,1595954050),('Kyrgyzstan','fa','',1595954050,1595954050),('Kyrgyzstan','fr','',1595954050,1595954050),('Kyrgyzstan','it','',1595954050,1595954050),('Kyrgyzstan','ja','',1595954050,1595954050),('Kyrgyzstan','nl','',1595954050,1595954050),('Kyrgyzstan','pl','',1595954050,1595954050),('Kyrgyzstan','pt_BR','',1595954050,1595954050),('Kyrgyzstan','ru','',1595954050,1595954050),('Kyrgyzstan','sk','',1595954050,1595954050),('Kyrgyzstan','sv','',1595954050,1595954050),('Kyrgyzstan','sv_FI','',1595954050,1595954050),('Kyrgyzstan','tr','',1595954050,1595954050),('Kyrgyzstan','uk','',1595954050,1595954050),('Kyrgyzstan','zh_Hans','',1595954050,1595954050),('Laos','cs','',1595954050,1595954050),('Laos','de','',1595954050,1595954050),('Laos','en','',1595954050,1595954050),('Laos','es','',1595954050,1595954050),('Laos','fa','',1595954050,1595954050),('Laos','fr','',1595954050,1595954050),('Laos','it','',1595954050,1595954050),('Laos','ja','',1595954050,1595954050),('Laos','nl','',1595954050,1595954050),('Laos','pl','',1595954050,1595954050),('Laos','pt_BR','',1595954050,1595954050),('Laos','ru','',1595954050,1595954050),('Laos','sk','',1595954050,1595954050),('Laos','sv','',1595954050,1595954050),('Laos','sv_FI','',1595954050,1595954050),('Laos','tr','',1595954050,1595954050),('Laos','uk','',1595954050,1595954050),('Laos','zh_Hans','',1595954050,1595954050),('Latvia','cs','',1595954050,1595954050),('Latvia','de','',1595954050,1595954050),('Latvia','en','',1595954050,1595954050),('Latvia','es','',1595954050,1595954050),('Latvia','fa','',1595954050,1595954050),('Latvia','fr','',1595954050,1595954050),('Latvia','it','',1595954050,1595954050),('Latvia','ja','',1595954050,1595954050),('Latvia','nl','',1595954050,1595954050),('Latvia','pl','',1595954050,1595954050),('Latvia','pt_BR','',1595954050,1595954050),('Latvia','ru','',1595954050,1595954050),('Latvia','sk','',1595954050,1595954050),('Latvia','sv','',1595954050,1595954050),('Latvia','sv_FI','',1595954050,1595954050),('Latvia','tr','',1595954050,1595954050),('Latvia','uk','',1595954050,1595954050),('Latvia','zh_Hans','',1595954050,1595954050),('Lebanon','cs','',1595954050,1595954050),('Lebanon','de','',1595954050,1595954050),('Lebanon','en','',1595954050,1595954050),('Lebanon','es','',1595954050,1595954050),('Lebanon','fa','',1595954050,1595954050),('Lebanon','fr','',1595954050,1595954050),('Lebanon','it','',1595954050,1595954050),('Lebanon','ja','',1595954050,1595954050),('Lebanon','nl','',1595954050,1595954050),('Lebanon','pl','',1595954050,1595954050),('Lebanon','pt_BR','',1595954050,1595954050),('Lebanon','ru','',1595954050,1595954050),('Lebanon','sk','',1595954050,1595954050),('Lebanon','sv','',1595954050,1595954050),('Lebanon','sv_FI','',1595954050,1595954050),('Lebanon','tr','',1595954050,1595954050),('Lebanon','uk','',1595954050,1595954050),('Lebanon','zh_Hans','',1595954050,1595954050),('Lesotho','cs','',1595954050,1595954050),('Lesotho','de','',1595954050,1595954050),('Lesotho','en','',1595954050,1595954050),('Lesotho','es','',1595954050,1595954050),('Lesotho','fa','',1595954050,1595954050),('Lesotho','fr','',1595954050,1595954050),('Lesotho','it','',1595954050,1595954050),('Lesotho','ja','',1595954050,1595954050),('Lesotho','nl','',1595954050,1595954050),('Lesotho','pl','',1595954050,1595954050),('Lesotho','pt_BR','',1595954050,1595954050),('Lesotho','ru','',1595954050,1595954050),('Lesotho','sk','',1595954050,1595954050),('Lesotho','sv','',1595954050,1595954050),('Lesotho','sv_FI','',1595954050,1595954050),('Lesotho','tr','',1595954050,1595954050),('Lesotho','uk','',1595954050,1595954050),('Lesotho','zh_Hans','',1595954050,1595954050),('Liberia','cs','',1595954050,1595954050),('Liberia','de','',1595954050,1595954050),('Liberia','en','',1595954050,1595954050),('Liberia','es','',1595954050,1595954050),('Liberia','fa','',1595954050,1595954050),('Liberia','fr','',1595954050,1595954050),('Liberia','it','',1595954050,1595954050),('Liberia','ja','',1595954050,1595954050),('Liberia','nl','',1595954050,1595954050),('Liberia','pl','',1595954050,1595954050),('Liberia','pt_BR','',1595954050,1595954050),('Liberia','ru','',1595954050,1595954050),('Liberia','sk','',1595954050,1595954050),('Liberia','sv','',1595954050,1595954050),('Liberia','sv_FI','',1595954050,1595954050),('Liberia','tr','',1595954050,1595954050),('Liberia','uk','',1595954050,1595954050),('Liberia','zh_Hans','',1595954050,1595954050),('Libya','cs','',1595954050,1595954050),('Libya','de','',1595954050,1595954050),('Libya','en','',1595954050,1595954050),('Libya','es','',1595954050,1595954050),('Libya','fa','',1595954050,1595954050),('Libya','fr','',1595954050,1595954050),('Libya','it','',1595954050,1595954050),('Libya','ja','',1595954050,1595954050),('Libya','nl','',1595954050,1595954050),('Libya','pl','',1595954050,1595954050),('Libya','pt_BR','',1595954050,1595954050),('Libya','ru','',1595954050,1595954050),('Libya','sk','',1595954050,1595954050),('Libya','sv','',1595954050,1595954050),('Libya','sv_FI','',1595954050,1595954050),('Libya','tr','',1595954050,1595954050),('Libya','uk','',1595954050,1595954050),('Libya','zh_Hans','',1595954050,1595954050),('Liechtenstein','cs','',1595954050,1595954050),('Liechtenstein','de','',1595954050,1595954050),('Liechtenstein','en','',1595954050,1595954050),('Liechtenstein','es','',1595954050,1595954050),('Liechtenstein','fa','',1595954050,1595954050),('Liechtenstein','fr','',1595954050,1595954050),('Liechtenstein','it','',1595954050,1595954050),('Liechtenstein','ja','',1595954050,1595954050),('Liechtenstein','nl','',1595954050,1595954050),('Liechtenstein','pl','',1595954050,1595954050),('Liechtenstein','pt_BR','',1595954050,1595954050),('Liechtenstein','ru','',1595954050,1595954050),('Liechtenstein','sk','',1595954050,1595954050),('Liechtenstein','sv','',1595954050,1595954050),('Liechtenstein','sv_FI','',1595954050,1595954050),('Liechtenstein','tr','',1595954050,1595954050),('Liechtenstein','uk','',1595954050,1595954050),('Liechtenstein','zh_Hans','',1595954050,1595954050),('Lithuania','cs','',1595954050,1595954050),('Lithuania','de','',1595954050,1595954050),('Lithuania','en','',1595954050,1595954050),('Lithuania','es','',1595954050,1595954050),('Lithuania','fa','',1595954050,1595954050),('Lithuania','fr','',1595954050,1595954050),('Lithuania','it','',1595954050,1595954050),('Lithuania','ja','',1595954050,1595954050),('Lithuania','nl','',1595954050,1595954050),('Lithuania','pl','',1595954050,1595954050),('Lithuania','pt_BR','',1595954050,1595954050),('Lithuania','ru','',1595954050,1595954050),('Lithuania','sk','',1595954050,1595954050),('Lithuania','sv','',1595954050,1595954050),('Lithuania','sv_FI','',1595954050,1595954050),('Lithuania','tr','',1595954050,1595954050),('Lithuania','uk','',1595954050,1595954050),('Lithuania','zh_Hans','',1595954050,1595954050),('Luxembourg','cs','',1595954050,1595954050),('Luxembourg','de','',1595954050,1595954050),('Luxembourg','en','',1595954050,1595954050),('Luxembourg','es','',1595954050,1595954050),('Luxembourg','fa','',1595954050,1595954050),('Luxembourg','fr','',1595954050,1595954050),('Luxembourg','it','',1595954050,1595954050),('Luxembourg','ja','',1595954050,1595954050),('Luxembourg','nl','',1595954050,1595954050),('Luxembourg','pl','',1595954050,1595954050),('Luxembourg','pt_BR','',1595954050,1595954050),('Luxembourg','ru','',1595954050,1595954050),('Luxembourg','sk','',1595954050,1595954050),('Luxembourg','sv','',1595954050,1595954050),('Luxembourg','sv_FI','',1595954050,1595954050),('Luxembourg','tr','',1595954050,1595954050),('Luxembourg','uk','',1595954050,1595954050),('Luxembourg','zh_Hans','',1595954050,1595954050),('Macao SAR China','cs','',1595954050,1595954050),('Macao SAR China','de','',1595954050,1595954050),('Macao SAR China','en','',1595954050,1595954050),('Macao SAR China','es','',1595954050,1595954050),('Macao SAR China','fa','',1595954050,1595954050),('Macao SAR China','fr','',1595954050,1595954050),('Macao SAR China','it','',1595954050,1595954050),('Macao SAR China','ja','',1595954050,1595954050),('Macao SAR China','nl','',1595954050,1595954050),('Macao SAR China','pl','',1595954050,1595954050),('Macao SAR China','pt_BR','',1595954050,1595954050),('Macao SAR China','ru','',1595954050,1595954050),('Macao SAR China','sk','',1595954050,1595954050),('Macao SAR China','sv','',1595954050,1595954050),('Macao SAR China','sv_FI','',1595954050,1595954050),('Macao SAR China','tr','',1595954050,1595954050),('Macao SAR China','uk','',1595954050,1595954050),('Macao SAR China','zh_Hans','',1595954050,1595954050),('Madagascar','cs','',1595954050,1595954050),('Madagascar','de','',1595954050,1595954050),('Madagascar','en','',1595954050,1595954050),('Madagascar','es','',1595954050,1595954050),('Madagascar','fa','',1595954050,1595954050),('Madagascar','fr','',1595954050,1595954050),('Madagascar','it','',1595954050,1595954050),('Madagascar','ja','',1595954050,1595954050),('Madagascar','nl','',1595954050,1595954050),('Madagascar','pl','',1595954050,1595954050),('Madagascar','pt_BR','',1595954050,1595954050),('Madagascar','ru','',1595954050,1595954050),('Madagascar','sk','',1595954050,1595954050),('Madagascar','sv','',1595954050,1595954050),('Madagascar','sv_FI','',1595954050,1595954050),('Madagascar','tr','',1595954050,1595954050),('Madagascar','uk','',1595954050,1595954050),('Madagascar','zh_Hans','',1595954050,1595954050),('Malawi','cs','',1595954050,1595954050),('Malawi','de','',1595954050,1595954050),('Malawi','en','',1595954050,1595954050),('Malawi','es','',1595954050,1595954050),('Malawi','fa','',1595954050,1595954050),('Malawi','fr','',1595954050,1595954050),('Malawi','it','',1595954050,1595954050),('Malawi','ja','',1595954050,1595954050),('Malawi','nl','',1595954050,1595954050),('Malawi','pl','',1595954050,1595954050),('Malawi','pt_BR','',1595954050,1595954050),('Malawi','ru','',1595954050,1595954050),('Malawi','sk','',1595954050,1595954050),('Malawi','sv','',1595954050,1595954050),('Malawi','sv_FI','',1595954050,1595954050),('Malawi','tr','',1595954050,1595954050),('Malawi','uk','',1595954050,1595954050),('Malawi','zh_Hans','',1595954050,1595954050),('Malaysia','cs','',1595954050,1595954050),('Malaysia','de','',1595954050,1595954050),('Malaysia','en','',1595954050,1595954050),('Malaysia','es','',1595954050,1595954050),('Malaysia','fa','',1595954050,1595954050),('Malaysia','fr','',1595954050,1595954050),('Malaysia','it','',1595954050,1595954050),('Malaysia','ja','',1595954050,1595954050),('Malaysia','nl','',1595954050,1595954050),('Malaysia','pl','',1595954050,1595954050),('Malaysia','pt_BR','',1595954050,1595954050),('Malaysia','ru','',1595954050,1595954050),('Malaysia','sk','',1595954050,1595954050),('Malaysia','sv','',1595954050,1595954050),('Malaysia','sv_FI','',1595954050,1595954050),('Malaysia','tr','',1595954050,1595954050),('Malaysia','uk','',1595954050,1595954050),('Malaysia','zh_Hans','',1595954050,1595954050),('Maldives','cs','',1595954050,1595954050),('Maldives','de','',1595954050,1595954050),('Maldives','en','',1595954050,1595954050),('Maldives','es','',1595954050,1595954050),('Maldives','fa','',1595954050,1595954050),('Maldives','fr','',1595954050,1595954050),('Maldives','it','',1595954050,1595954050),('Maldives','ja','',1595954050,1595954050),('Maldives','nl','',1595954050,1595954050),('Maldives','pl','',1595954050,1595954050),('Maldives','pt_BR','',1595954050,1595954050),('Maldives','ru','',1595954050,1595954050),('Maldives','sk','',1595954050,1595954050),('Maldives','sv','',1595954050,1595954050),('Maldives','sv_FI','',1595954050,1595954050),('Maldives','tr','',1595954050,1595954050),('Maldives','uk','',1595954050,1595954050),('Maldives','zh_Hans','',1595954050,1595954050),('Mali','cs','',1595954050,1595954050),('Mali','de','',1595954050,1595954050),('Mali','en','',1595954050,1595954050),('Mali','es','',1595954050,1595954050),('Mali','fa','',1595954050,1595954050),('Mali','fr','',1595954050,1595954050),('Mali','it','',1595954050,1595954050),('Mali','ja','',1595954050,1595954050),('Mali','nl','',1595954050,1595954050),('Mali','pl','',1595954050,1595954050),('Mali','pt_BR','',1595954050,1595954050),('Mali','ru','',1595954050,1595954050),('Mali','sk','',1595954050,1595954050),('Mali','sv','',1595954050,1595954050),('Mali','sv_FI','',1595954050,1595954050),('Mali','tr','',1595954050,1595954050),('Mali','uk','',1595954050,1595954050),('Mali','zh_Hans','',1595954050,1595954050),('Malta','cs','',1595954050,1595954050),('Malta','de','',1595954050,1595954050),('Malta','en','',1595954050,1595954050),('Malta','es','',1595954050,1595954050),('Malta','fa','',1595954050,1595954050),('Malta','fr','',1595954050,1595954050),('Malta','it','',1595954050,1595954050),('Malta','ja','',1595954050,1595954050),('Malta','nl','',1595954050,1595954050),('Malta','pl','',1595954050,1595954050),('Malta','pt_BR','',1595954050,1595954050),('Malta','ru','',1595954050,1595954050),('Malta','sk','',1595954050,1595954050),('Malta','sv','',1595954050,1595954050),('Malta','sv_FI','',1595954050,1595954050),('Malta','tr','',1595954050,1595954050),('Malta','uk','',1595954050,1595954050),('Malta','zh_Hans','',1595954050,1595954050),('Marchio','cs','',1595922207,1595922207),('Marchio','de','',1595922207,1595922207),('Marchio','en','',1595922207,1595922207),('Marchio','es','',1595922207,1595922207),('Marchio','fa','',1595922207,1595922207),('Marchio','fr','',1595922207,1595922207),('Marchio','it','',1595922207,1595922207),('Marchio','ja','',1595922207,1595922207),('Marchio','nl','',1595922207,1595922207),('Marchio','pl','',1595922207,1595922207),('Marchio','pt_BR','',1595922207,1595922207),('Marchio','ru','',1595922207,1595922207),('Marchio','sk','',1595922207,1595922207),('Marchio','sv','',1595922207,1595922207),('Marchio','sv_FI','',1595922207,1595922207),('Marchio','tr','',1595922207,1595922207),('Marchio','uk','',1595922207,1595922207),('Marchio','zh_Hans','',1595922207,1595922207),('Marshall Islands','cs','',1595954050,1595954050),('Marshall Islands','de','',1595954050,1595954050),('Marshall Islands','en','',1595954050,1595954050),('Marshall Islands','es','',1595954050,1595954050),('Marshall Islands','fa','',1595954050,1595954050),('Marshall Islands','fr','',1595954050,1595954050),('Marshall Islands','it','',1595954050,1595954050),('Marshall Islands','ja','',1595954050,1595954050),('Marshall Islands','nl','',1595954050,1595954050),('Marshall Islands','pl','',1595954050,1595954050),('Marshall Islands','pt_BR','',1595954050,1595954050),('Marshall Islands','ru','',1595954050,1595954050),('Marshall Islands','sk','',1595954050,1595954050),('Marshall Islands','sv','',1595954050,1595954050),('Marshall Islands','sv_FI','',1595954050,1595954050),('Marshall Islands','tr','',1595954050,1595954050),('Marshall Islands','uk','',1595954050,1595954050),('Marshall Islands','zh_Hans','',1595954050,1595954050),('Martinique','cs','',1595954050,1595954050),('Martinique','de','',1595954050,1595954050),('Martinique','en','',1595954050,1595954050),('Martinique','es','',1595954050,1595954050),('Martinique','fa','',1595954050,1595954050),('Martinique','fr','',1595954050,1595954050),('Martinique','it','',1595954050,1595954050),('Martinique','ja','',1595954050,1595954050),('Martinique','nl','',1595954050,1595954050),('Martinique','pl','',1595954050,1595954050),('Martinique','pt_BR','',1595954050,1595954050),('Martinique','ru','',1595954050,1595954050),('Martinique','sk','',1595954050,1595954050),('Martinique','sv','',1595954050,1595954050),('Martinique','sv_FI','',1595954050,1595954050),('Martinique','tr','',1595954050,1595954050),('Martinique','uk','',1595954050,1595954050),('Martinique','zh_Hans','',1595954050,1595954050),('Master','cs','',1595918163,1595918163),('Master','de','',1595918163,1595918163),('Master','en','',1595918163,1595918163),('Master','es','',1595918163,1595918163),('Master','fa','',1595918163,1595918163),('Master','fr','',1595918163,1595918163),('Master','it','',1595918163,1595918163),('Master','ja','',1595918163,1595918163),('Master','nl','',1595918163,1595918163),('Master','pl','',1595918163,1595918163),('Master','pt_BR','',1595918163,1595918163),('Master','ru','',1595918163,1595918163),('Master','sk','',1595918163,1595918163),('Master','sv','',1595918163,1595918163),('Master','sv_FI','',1595918163,1595918163),('Master','tr','',1595918163,1595918163),('Master','uk','',1595918163,1595918163),('Master','zh_Hans','',1595918163,1595918163),('Master (Admin Mode)','cs','',1595918163,1595918163),('Master (Admin Mode)','de','',1595918163,1595918163),('Master (Admin Mode)','en','',1595918163,1595918163),('Master (Admin Mode)','es','',1595918163,1595918163),('Master (Admin Mode)','fa','',1595918163,1595918163),('Master (Admin Mode)','fr','',1595918163,1595918163),('Master (Admin Mode)','it','',1595918163,1595918163),('Master (Admin Mode)','ja','',1595918163,1595918163),('Master (Admin Mode)','nl','',1595918163,1595918163),('Master (Admin Mode)','pl','',1595918163,1595918163),('Master (Admin Mode)','pt_BR','',1595918163,1595918163),('Master (Admin Mode)','ru','',1595918163,1595918163),('Master (Admin Mode)','sk','',1595918163,1595918163),('Master (Admin Mode)','sv','',1595918163,1595918163),('Master (Admin Mode)','sv_FI','',1595918163,1595918163),('Master (Admin Mode)','tr','',1595918163,1595918163),('Master (Admin Mode)','uk','',1595918163,1595918163),('Master (Admin Mode)','zh_Hans','',1595918163,1595918163),('Mauritania','cs','',1595954050,1595954050),('Mauritania','de','',1595954050,1595954050),('Mauritania','en','',1595954050,1595954050),('Mauritania','es','',1595954050,1595954050),('Mauritania','fa','',1595954050,1595954050),('Mauritania','fr','',1595954050,1595954050),('Mauritania','it','',1595954050,1595954050),('Mauritania','ja','',1595954050,1595954050),('Mauritania','nl','',1595954050,1595954050),('Mauritania','pl','',1595954050,1595954050),('Mauritania','pt_BR','',1595954050,1595954050),('Mauritania','ru','',1595954050,1595954050),('Mauritania','sk','',1595954050,1595954050),('Mauritania','sv','',1595954050,1595954050),('Mauritania','sv_FI','',1595954050,1595954050),('Mauritania','tr','',1595954050,1595954050),('Mauritania','uk','',1595954050,1595954050),('Mauritania','zh_Hans','',1595954050,1595954050),('Mauritius','cs','',1595954050,1595954050),('Mauritius','de','',1595954050,1595954050),('Mauritius','en','',1595954050,1595954050),('Mauritius','es','',1595954050,1595954050),('Mauritius','fa','',1595954050,1595954050),('Mauritius','fr','',1595954050,1595954050),('Mauritius','it','',1595954050,1595954050),('Mauritius','ja','',1595954050,1595954050),('Mauritius','nl','',1595954050,1595954050),('Mauritius','pl','',1595954050,1595954050),('Mauritius','pt_BR','',1595954050,1595954050),('Mauritius','ru','',1595954050,1595954050),('Mauritius','sk','',1595954050,1595954050),('Mauritius','sv','',1595954050,1595954050),('Mauritius','sv_FI','',1595954050,1595954050),('Mauritius','tr','',1595954050,1595954050),('Mauritius','uk','',1595954050,1595954050),('Mauritius','zh_Hans','',1595954050,1595954050),('Mayotte','cs','',1595954050,1595954050),('Mayotte','de','',1595954050,1595954050),('Mayotte','en','',1595954050,1595954050),('Mayotte','es','',1595954050,1595954050),('Mayotte','fa','',1595954050,1595954050),('Mayotte','fr','',1595954050,1595954050),('Mayotte','it','',1595954050,1595954050),('Mayotte','ja','',1595954050,1595954050),('Mayotte','nl','',1595954050,1595954050),('Mayotte','pl','',1595954050,1595954050),('Mayotte','pt_BR','',1595954050,1595954050),('Mayotte','ru','',1595954050,1595954050),('Mayotte','sk','',1595954050,1595954050),('Mayotte','sv','',1595954050,1595954050),('Mayotte','sv_FI','',1595954050,1595954050),('Mayotte','tr','',1595954050,1595954050),('Mayotte','uk','',1595954050,1595954050),('Mayotte','zh_Hans','',1595954050,1595954050),('Meters','cs','',1607157346,1607157346),('Meters','de','',1607157346,1607157346),('Meters','en','',1607157346,1607157346),('Meters','es','',1607157346,1607157346),('Meters','fa','',1607157346,1607157346),('Meters','fr','',1607157346,1607157346),('Meters','it','',1607157346,1607157346),('Meters','ja','',1607157346,1607157346),('Meters','nl','',1607157346,1607157346),('Meters','pl','',1607157346,1607157346),('Meters','pt_BR','',1607157346,1607157346),('Meters','ru','',1607157346,1607157346),('Meters','sk','',1607157346,1607157346),('Meters','sv','',1607157346,1607157346),('Meters','sv_FI','',1607157346,1607157346),('Meters','tr','',1607157346,1607157346),('Meters','uk','',1607157346,1607157346),('Meters','zh_Hans','',1607157346,1607157346),('Mexico','cs','',1595954050,1595954050),('Mexico','de','',1595954050,1595954050),('Mexico','en','',1595954050,1595954050),('Mexico','es','',1595954050,1595954050),('Mexico','fa','',1595954050,1595954050),('Mexico','fr','',1595954050,1595954050),('Mexico','it','',1595954050,1595954050),('Mexico','ja','',1595954050,1595954050),('Mexico','nl','',1595954050,1595954050),('Mexico','pl','',1595954050,1595954050),('Mexico','pt_BR','',1595954050,1595954050),('Mexico','ru','',1595954050,1595954050),('Mexico','sk','',1595954050,1595954050),('Mexico','sv','',1595954050,1595954050),('Mexico','sv_FI','',1595954050,1595954050),('Mexico','tr','',1595954050,1595954050),('Mexico','uk','',1595954050,1595954050),('Mexico','zh_Hans','',1595954050,1595954050),('Microclismi','cs','',1595922208,1595922208),('Microclismi','de','',1595922208,1595922208),('Microclismi','en','',1595922208,1595922208),('Microclismi','es','',1595922208,1595922208),('Microclismi','fa','',1595922208,1595922208),('Microclismi','fr','',1595922208,1595922208),('Microclismi','it','',1595922208,1595922208),('Microclismi','ja','',1595922208,1595922208),('Microclismi','nl','',1595922208,1595922208),('Microclismi','pl','',1595922208,1595922208),('Microclismi','pt_BR','',1595922208,1595922208),('Microclismi','ru','',1595922208,1595922208),('Microclismi','sk','',1595922208,1595922208),('Microclismi','sv','',1595922208,1595922208),('Microclismi','sv_FI','',1595922208,1595922208),('Microclismi','tr','',1595922208,1595922208),('Microclismi','uk','',1595922208,1595922208),('Microclismi','zh_Hans','',1595922208,1595922208),('Micronesia','cs','',1595954050,1595954050),('Micronesia','de','',1595954050,1595954050),('Micronesia','en','',1595954050,1595954050),('Micronesia','es','',1595954050,1595954050),('Micronesia','fa','',1595954050,1595954050),('Micronesia','fr','',1595954050,1595954050),('Micronesia','it','',1595954050,1595954050),('Micronesia','ja','',1595954050,1595954050),('Micronesia','nl','',1595954050,1595954050),('Micronesia','pl','',1595954050,1595954050),('Micronesia','pt_BR','',1595954050,1595954050),('Micronesia','ru','',1595954050,1595954050),('Micronesia','sk','',1595954050,1595954050),('Micronesia','sv','',1595954050,1595954050),('Micronesia','sv_FI','',1595954050,1595954050),('Micronesia','tr','',1595954050,1595954050),('Micronesia','uk','',1595954050,1595954050),('Micronesia','zh_Hans','',1595954050,1595954050),('Modalità Somministrazione','cs','',1595922207,1595922207),('Modalità Somministrazione','de','',1595922207,1595922207),('Modalità Somministrazione','en','',1595922207,1595922207),('Modalità Somministrazione','es','',1595922207,1595922207),('Modalità Somministrazione','fa','',1595922207,1595922207),('Modalità Somministrazione','fr','',1595922207,1595922207),('Modalità Somministrazione','it','',1595922207,1595922207),('Modalità Somministrazione','ja','',1595922207,1595922207),('Modalità Somministrazione','nl','',1595922207,1595922207),('Modalità Somministrazione','pl','',1595922207,1595922207),('Modalità Somministrazione','pt_BR','',1595922207,1595922207),('Modalità Somministrazione','ru','',1595922207,1595922207),('Modalità Somministrazione','sk','',1595922207,1595922207),('Modalità Somministrazione','sv','',1595922207,1595922207),('Modalità Somministrazione','sv_FI','',1595922207,1595922207),('Modalità Somministrazione','tr','',1595922207,1595922207),('Modalità Somministrazione','uk','',1595922207,1595922207),('Modalità Somministrazione','zh_Hans','',1595922207,1595922207),('Moldova','cs','',1595954050,1595954050),('Moldova','de','',1595954050,1595954050),('Moldova','en','',1595954050,1595954050),('Moldova','es','',1595954050,1595954050),('Moldova','fa','',1595954050,1595954050),('Moldova','fr','',1595954050,1595954050),('Moldova','it','',1595954050,1595954050),('Moldova','ja','',1595954050,1595954050),('Moldova','nl','',1595954050,1595954050),('Moldova','pl','',1595954050,1595954050),('Moldova','pt_BR','',1595954050,1595954050),('Moldova','ru','',1595954050,1595954050),('Moldova','sk','',1595954050,1595954050),('Moldova','sv','',1595954050,1595954050),('Moldova','sv_FI','',1595954050,1595954050),('Moldova','tr','',1595954050,1595954050),('Moldova','uk','',1595954050,1595954050),('Moldova','zh_Hans','',1595954050,1595954050),('Monaco','cs','',1595954050,1595954050),('Monaco','de','',1595954050,1595954050),('Monaco','en','',1595954050,1595954050),('Monaco','es','',1595954050,1595954050),('Monaco','fa','',1595954050,1595954050),('Monaco','fr','',1595954050,1595954050),('Monaco','it','',1595954050,1595954050),('Monaco','ja','',1595954050,1595954050),('Monaco','nl','',1595954050,1595954050),('Monaco','pl','',1595954050,1595954050),('Monaco','pt_BR','',1595954050,1595954050),('Monaco','ru','',1595954050,1595954050),('Monaco','sk','',1595954050,1595954050),('Monaco','sv','',1595954050,1595954050),('Monaco','sv_FI','',1595954050,1595954050),('Monaco','tr','',1595954050,1595954050),('Monaco','uk','',1595954050,1595954050),('Monaco','zh_Hans','',1595954050,1595954050),('Monday','cs','',1595954198,1595954198),('Monday','de','',1595954198,1595954198),('Monday','en','',1595954198,1595954198),('Monday','es','',1595954198,1595954198),('Monday','fa','',1595954198,1595954198),('Monday','fr','',1595954198,1595954198),('Monday','it','',1595954198,1595954198),('Monday','ja','',1595954198,1595954198),('Monday','nl','',1595954198,1595954198),('Monday','pl','',1595954198,1595954198),('Monday','pt_BR','',1595954198,1595954198),('Monday','ru','',1595954198,1595954198),('Monday','sk','',1595954198,1595954198),('Monday','sv','',1595954198,1595954198),('Monday','sv_FI','',1595954198,1595954198),('Monday','tr','',1595954198,1595954198),('Monday','uk','',1595954198,1595954198),('Monday','zh_Hans','',1595954198,1595954198),('Mongolia','cs','',1595954050,1595954050),('Mongolia','de','',1595954050,1595954050),('Mongolia','en','',1595954050,1595954050),('Mongolia','es','',1595954050,1595954050),('Mongolia','fa','',1595954050,1595954050),('Mongolia','fr','',1595954050,1595954050),('Mongolia','it','',1595954050,1595954050),('Mongolia','ja','',1595954050,1595954050),('Mongolia','nl','',1595954050,1595954050),('Mongolia','pl','',1595954050,1595954050),('Mongolia','pt_BR','',1595954050,1595954050),('Mongolia','ru','',1595954050,1595954050),('Mongolia','sk','',1595954050,1595954050),('Mongolia','sv','',1595954050,1595954050),('Mongolia','sv_FI','',1595954050,1595954050),('Mongolia','tr','',1595954050,1595954050),('Mongolia','uk','',1595954050,1595954050),('Mongolia','zh_Hans','',1595954050,1595954050),('Montenegro','cs','',1595954050,1595954050),('Montenegro','de','',1595954050,1595954050),('Montenegro','en','',1595954050,1595954050),('Montenegro','es','',1595954050,1595954050),('Montenegro','fa','',1595954050,1595954050),('Montenegro','fr','',1595954050,1595954050),('Montenegro','it','',1595954050,1595954050),('Montenegro','ja','',1595954050,1595954050),('Montenegro','nl','',1595954050,1595954050),('Montenegro','pl','',1595954050,1595954050),('Montenegro','pt_BR','',1595954050,1595954050),('Montenegro','ru','',1595954050,1595954050),('Montenegro','sk','',1595954050,1595954050),('Montenegro','sv','',1595954050,1595954050),('Montenegro','sv_FI','',1595954050,1595954050),('Montenegro','tr','',1595954050,1595954050),('Montenegro','uk','',1595954050,1595954050),('Montenegro','zh_Hans','',1595954050,1595954050),('Montserrat','cs','',1595954050,1595954050),('Montserrat','de','',1595954050,1595954050),('Montserrat','en','',1595954050,1595954050),('Montserrat','es','',1595954050,1595954050),('Montserrat','fa','',1595954050,1595954050),('Montserrat','fr','',1595954050,1595954050),('Montserrat','it','',1595954050,1595954050),('Montserrat','ja','',1595954050,1595954050),('Montserrat','nl','',1595954050,1595954050),('Montserrat','pl','',1595954050,1595954050),('Montserrat','pt_BR','',1595954050,1595954050),('Montserrat','ru','',1595954050,1595954050),('Montserrat','sk','',1595954050,1595954050),('Montserrat','sv','',1595954050,1595954050),('Montserrat','sv_FI','',1595954050,1595954050),('Montserrat','tr','',1595954050,1595954050),('Montserrat','uk','',1595954050,1595954050),('Montserrat','zh_Hans','',1595954050,1595954050),('Morocco','cs','',1595954050,1595954050),('Morocco','de','',1595954050,1595954050),('Morocco','en','',1595954050,1595954050),('Morocco','es','',1595954050,1595954050),('Morocco','fa','',1595954050,1595954050),('Morocco','fr','',1595954050,1595954050),('Morocco','it','',1595954050,1595954050),('Morocco','ja','',1595954050,1595954050),('Morocco','nl','',1595954050,1595954050),('Morocco','pl','',1595954050,1595954050),('Morocco','pt_BR','',1595954050,1595954050),('Morocco','ru','',1595954050,1595954050),('Morocco','sk','',1595954050,1595954050),('Morocco','sv','',1595954050,1595954050),('Morocco','sv_FI','',1595954050,1595954050),('Morocco','tr','',1595954050,1595954050),('Morocco','uk','',1595954050,1595954050),('Morocco','zh_Hans','',1595954050,1595954050),('Mozambique','cs','',1595954050,1595954050),('Mozambique','de','',1595954050,1595954050),('Mozambique','en','',1595954050,1595954050),('Mozambique','es','',1595954050,1595954050),('Mozambique','fa','',1595954050,1595954050),('Mozambique','fr','',1595954050,1595954050),('Mozambique','it','',1595954050,1595954050),('Mozambique','ja','',1595954050,1595954050),('Mozambique','nl','',1595954050,1595954050),('Mozambique','pl','',1595954050,1595954050),('Mozambique','pt_BR','',1595954050,1595954050),('Mozambique','ru','',1595954050,1595954050),('Mozambique','sk','',1595954050,1595954050),('Mozambique','sv','',1595954050,1595954050),('Mozambique','sv_FI','',1595954050,1595954050),('Mozambique','tr','',1595954050,1595954050),('Mozambique','uk','',1595954050,1595954050),('Mozambique','zh_Hans','',1595954050,1595954050),('Myanmar (Burma)','cs','',1595954050,1595954050),('Myanmar (Burma)','de','',1595954050,1595954050),('Myanmar (Burma)','en','',1595954050,1595954050),('Myanmar (Burma)','es','',1595954050,1595954050),('Myanmar (Burma)','fa','',1595954050,1595954050),('Myanmar (Burma)','fr','',1595954050,1595954050),('Myanmar (Burma)','it','',1595954050,1595954050),('Myanmar (Burma)','ja','',1595954050,1595954050),('Myanmar (Burma)','nl','',1595954050,1595954050),('Myanmar (Burma)','pl','',1595954050,1595954050),('Myanmar (Burma)','pt_BR','',1595954050,1595954050),('Myanmar (Burma)','ru','',1595954050,1595954050),('Myanmar (Burma)','sk','',1595954050,1595954050),('Myanmar (Burma)','sv','',1595954050,1595954050),('Myanmar (Burma)','sv_FI','',1595954050,1595954050),('Myanmar (Burma)','tr','',1595954050,1595954050),('Myanmar (Burma)','uk','',1595954050,1595954050),('Myanmar (Burma)','zh_Hans','',1595954050,1595954050),('Namibia','cs','',1595954050,1595954050),('Namibia','de','',1595954050,1595954050),('Namibia','en','',1595954050,1595954050),('Namibia','es','',1595954050,1595954050),('Namibia','fa','',1595954050,1595954050),('Namibia','fr','',1595954050,1595954050),('Namibia','it','',1595954050,1595954050),('Namibia','ja','',1595954050,1595954050),('Namibia','nl','',1595954050,1595954050),('Namibia','pl','',1595954050,1595954050),('Namibia','pt_BR','',1595954050,1595954050),('Namibia','ru','',1595954050,1595954050),('Namibia','sk','',1595954050,1595954050),('Namibia','sv','',1595954050,1595954050),('Namibia','sv_FI','',1595954050,1595954050),('Namibia','tr','',1595954050,1595954050),('Namibia','uk','',1595954050,1595954050),('Namibia','zh_Hans','',1595954050,1595954050),('Nauru','cs','',1595954050,1595954050),('Nauru','de','',1595954050,1595954050),('Nauru','en','',1595954050,1595954050),('Nauru','es','',1595954050,1595954050),('Nauru','fa','',1595954050,1595954050),('Nauru','fr','',1595954050,1595954050),('Nauru','it','',1595954050,1595954050),('Nauru','ja','',1595954050,1595954050),('Nauru','nl','',1595954050,1595954050),('Nauru','pl','',1595954050,1595954050),('Nauru','pt_BR','',1595954050,1595954050),('Nauru','ru','',1595954050,1595954050),('Nauru','sk','',1595954050,1595954050),('Nauru','sv','',1595954050,1595954050),('Nauru','sv_FI','',1595954050,1595954050),('Nauru','tr','',1595954050,1595954050),('Nauru','uk','',1595954050,1595954050),('Nauru','zh_Hans','',1595954050,1595954050),('Nazione','cs','',1595954047,1595954047),('Nazione','de','',1595954047,1595954047),('Nazione','en','',1595954047,1595954047),('Nazione','es','',1595954047,1595954047),('Nazione','fa','',1595954047,1595954047),('Nazione','fr','',1595954047,1595954047),('Nazione','it','',1595954047,1595954047),('Nazione','ja','',1595954047,1595954047),('Nazione','nl','',1595954047,1595954047),('Nazione','pl','',1595954047,1595954047),('Nazione','pt_BR','',1595954047,1595954047),('Nazione','ru','',1595954047,1595954047),('Nazione','sk','',1595954047,1595954047),('Nazione','sv','',1595954047,1595954047),('Nazione','sv_FI','',1595954047,1595954047),('Nazione','tr','',1595954047,1595954047),('Nazione','uk','',1595954047,1595954047),('Nazione','zh_Hans','',1595954047,1595954047),('Nepal','cs','',1595954051,1595954051),('Nepal','de','',1595954051,1595954051),('Nepal','en','',1595954051,1595954051),('Nepal','es','',1595954051,1595954051),('Nepal','fa','',1595954051,1595954051),('Nepal','fr','',1595954051,1595954051),('Nepal','it','',1595954051,1595954051),('Nepal','ja','',1595954051,1595954051),('Nepal','nl','',1595954051,1595954051),('Nepal','pl','',1595954051,1595954051),('Nepal','pt_BR','',1595954051,1595954051),('Nepal','ru','',1595954051,1595954051),('Nepal','sk','',1595954051,1595954051),('Nepal','sv','',1595954051,1595954051),('Nepal','sv_FI','',1595954051,1595954051),('Nepal','tr','',1595954051,1595954051),('Nepal','uk','',1595954051,1595954051),('Nepal','zh_Hans','',1595954051,1595954051),('Netherlands','cs','',1595954051,1595954051),('Netherlands','de','',1595954051,1595954051),('Netherlands','en','',1595954051,1595954051),('Netherlands','es','',1595954051,1595954051),('Netherlands','fa','',1595954051,1595954051),('Netherlands','fr','',1595954051,1595954051),('Netherlands','it','',1595954051,1595954051),('Netherlands','ja','',1595954051,1595954051),('Netherlands','nl','',1595954051,1595954051),('Netherlands','pl','',1595954051,1595954051),('Netherlands','pt_BR','',1595954051,1595954051),('Netherlands','ru','',1595954051,1595954051),('Netherlands','sk','',1595954051,1595954051),('Netherlands','sv','',1595954051,1595954051),('Netherlands','sv_FI','',1595954051,1595954051),('Netherlands','tr','',1595954051,1595954051),('Netherlands','uk','',1595954051,1595954051),('Netherlands','zh_Hans','',1595954051,1595954051),('New Caledonia','cs','',1595954051,1595954051),('New Caledonia','de','',1595954051,1595954051),('New Caledonia','en','',1595954051,1595954051),('New Caledonia','es','',1595954051,1595954051),('New Caledonia','fa','',1595954051,1595954051),('New Caledonia','fr','',1595954051,1595954051),('New Caledonia','it','',1595954051,1595954051),('New Caledonia','ja','',1595954051,1595954051),('New Caledonia','nl','',1595954051,1595954051),('New Caledonia','pl','',1595954051,1595954051),('New Caledonia','pt_BR','',1595954051,1595954051),('New Caledonia','ru','',1595954051,1595954051),('New Caledonia','sk','',1595954051,1595954051),('New Caledonia','sv','',1595954051,1595954051),('New Caledonia','sv_FI','',1595954051,1595954051),('New Caledonia','tr','',1595954051,1595954051),('New Caledonia','uk','',1595954051,1595954051),('New Caledonia','zh_Hans','',1595954051,1595954051),('New Zealand','cs','',1595954051,1595954051),('New Zealand','de','',1595954051,1595954051),('New Zealand','en','',1595954051,1595954051),('New Zealand','es','',1595954051,1595954051),('New Zealand','fa','',1595954051,1595954051),('New Zealand','fr','',1595954051,1595954051),('New Zealand','it','',1595954051,1595954051),('New Zealand','ja','',1595954051,1595954051),('New Zealand','nl','',1595954051,1595954051),('New Zealand','pl','',1595954051,1595954051),('New Zealand','pt_BR','',1595954051,1595954051),('New Zealand','ru','',1595954051,1595954051),('New Zealand','sk','',1595954051,1595954051),('New Zealand','sv','',1595954051,1595954051),('New Zealand','sv_FI','',1595954051,1595954051),('New Zealand','tr','',1595954051,1595954051),('New Zealand','uk','',1595954051,1595954051),('New Zealand','zh_Hans','',1595954051,1595954051),('Nicaragua','cs','',1595954051,1595954051),('Nicaragua','de','',1595954051,1595954051),('Nicaragua','en','',1595954051,1595954051),('Nicaragua','es','',1595954051,1595954051),('Nicaragua','fa','',1595954051,1595954051),('Nicaragua','fr','',1595954051,1595954051),('Nicaragua','it','',1595954051,1595954051),('Nicaragua','ja','',1595954051,1595954051),('Nicaragua','nl','',1595954051,1595954051),('Nicaragua','pl','',1595954051,1595954051),('Nicaragua','pt_BR','',1595954051,1595954051),('Nicaragua','ru','',1595954051,1595954051),('Nicaragua','sk','',1595954051,1595954051),('Nicaragua','sv','',1595954051,1595954051),('Nicaragua','sv_FI','',1595954051,1595954051),('Nicaragua','tr','',1595954051,1595954051),('Nicaragua','uk','',1595954051,1595954051),('Nicaragua','zh_Hans','',1595954051,1595954051),('Niger','cs','',1595954051,1595954051),('Niger','de','',1595954051,1595954051),('Niger','en','',1595954051,1595954051),('Niger','es','',1595954051,1595954051),('Niger','fa','',1595954051,1595954051),('Niger','fr','',1595954051,1595954051),('Niger','it','',1595954051,1595954051),('Niger','ja','',1595954051,1595954051),('Niger','nl','',1595954051,1595954051),('Niger','pl','',1595954051,1595954051),('Niger','pt_BR','',1595954051,1595954051),('Niger','ru','',1595954051,1595954051),('Niger','sk','',1595954051,1595954051),('Niger','sv','',1595954051,1595954051),('Niger','sv_FI','',1595954051,1595954051),('Niger','tr','',1595954051,1595954051),('Niger','uk','',1595954051,1595954051),('Niger','zh_Hans','',1595954051,1595954051),('Nigeria','cs','',1595954051,1595954051),('Nigeria','de','',1595954051,1595954051),('Nigeria','en','',1595954051,1595954051),('Nigeria','es','',1595954051,1595954051),('Nigeria','fa','',1595954051,1595954051),('Nigeria','fr','',1595954051,1595954051),('Nigeria','it','',1595954051,1595954051),('Nigeria','ja','',1595954051,1595954051),('Nigeria','nl','',1595954051,1595954051),('Nigeria','pl','',1595954051,1595954051),('Nigeria','pt_BR','',1595954051,1595954051),('Nigeria','ru','',1595954051,1595954051),('Nigeria','sk','',1595954051,1595954051),('Nigeria','sv','',1595954051,1595954051),('Nigeria','sv_FI','',1595954051,1595954051),('Nigeria','tr','',1595954051,1595954051),('Nigeria','uk','',1595954051,1595954051),('Nigeria','zh_Hans','',1595954051,1595954051),('Niue','cs','',1595954051,1595954051),('Niue','de','',1595954051,1595954051),('Niue','en','',1595954051,1595954051),('Niue','es','',1595954051,1595954051),('Niue','fa','',1595954051,1595954051),('Niue','fr','',1595954051,1595954051),('Niue','it','',1595954051,1595954051),('Niue','ja','',1595954051,1595954051),('Niue','nl','',1595954051,1595954051),('Niue','pl','',1595954051,1595954051),('Niue','pt_BR','',1595954051,1595954051),('Niue','ru','',1595954051,1595954051),('Niue','sk','',1595954051,1595954051),('Niue','sv','',1595954051,1595954051),('Niue','sv_FI','',1595954051,1595954051),('Niue','tr','',1595954051,1595954051),('Niue','uk','',1595954051,1595954051),('Niue','zh_Hans','',1595954051,1595954051),('Nome','cs','',1595953778,1595953778),('Nome','de','',1595953778,1595953778),('Nome','en','',1595953778,1595953778),('Nome','es','',1595953778,1595953778),('Nome','fa','',1595953778,1595953778),('Nome','fr','',1595953778,1595953778),('Nome','it','',1595953778,1595953778),('Nome','ja','',1595953778,1595953778),('Nome','nl','',1595953778,1595953778),('Nome','pl','',1595953778,1595953778),('Nome','pt_BR','',1595953778,1595953778),('Nome','ru','',1595953778,1595953778),('Nome','sk','',1595953778,1595953778),('Nome','sv','',1595953778,1595953778),('Nome','sv_FI','',1595953778,1595953778),('Nome','tr','',1595953778,1595953778),('Nome','uk','',1595953778,1595953778),('Nome','zh_Hans','',1595953778,1595953778),('Nome Farmacia','cs','',1595953778,1595953778),('Nome Farmacia','de','',1595953778,1595953778),('Nome Farmacia','en','',1595953778,1595953778),('Nome Farmacia','es','',1595953778,1595953778),('Nome Farmacia','fa','',1595953778,1595953778),('Nome Farmacia','fr','',1595953778,1595953778),('Nome Farmacia','it','',1595953778,1595953778),('Nome Farmacia','ja','',1595953778,1595953778),('Nome Farmacia','nl','',1595953778,1595953778),('Nome Farmacia','pl','',1595953778,1595953778),('Nome Farmacia','pt_BR','',1595953778,1595953778),('Nome Farmacia','ru','',1595953778,1595953778),('Nome Farmacia','sk','',1595953778,1595953778),('Nome Farmacia','sv','',1595953778,1595953778),('Nome Farmacia','sv_FI','',1595953778,1595953778),('Nome Farmacia','tr','',1595953778,1595953778),('Nome Farmacia','uk','',1595953778,1595953778),('Nome Farmacia','zh_Hans','',1595953778,1595953778),('Nome Prodotto','cs','',1595918163,1595918163),('Nome Prodotto','de','',1595918163,1595918163),('Nome Prodotto','en','',1595918163,1595918163),('Nome Prodotto','es','',1595918163,1595918163),('Nome Prodotto','fa','',1595918163,1595918163),('Nome Prodotto','fr','',1595918163,1595918163),('Nome Prodotto','it','',1595918163,1595918163),('Nome Prodotto','ja','',1595918163,1595918163),('Nome Prodotto','nl','',1595918163,1595918163),('Nome Prodotto','pl','',1595918163,1595918163),('Nome Prodotto','pt_BR','',1595918163,1595918163),('Nome Prodotto','ru','',1595918163,1595918163),('Nome Prodotto','sk','',1595918163,1595918163),('Nome Prodotto','sv','',1595918163,1595918163),('Nome Prodotto','sv_FI','',1595918163,1595918163),('Nome Prodotto','tr','',1595918163,1595918163),('Nome Prodotto','uk','',1595918163,1595918163),('Nome Prodotto','zh_Hans','',1595918163,1595918163),('Norfolk Island','cs','',1595954051,1595954051),('Norfolk Island','de','',1595954051,1595954051),('Norfolk Island','en','',1595954051,1595954051),('Norfolk Island','es','',1595954051,1595954051),('Norfolk Island','fa','',1595954051,1595954051),('Norfolk Island','fr','',1595954051,1595954051),('Norfolk Island','it','',1595954051,1595954051),('Norfolk Island','ja','',1595954051,1595954051),('Norfolk Island','nl','',1595954051,1595954051),('Norfolk Island','pl','',1595954051,1595954051),('Norfolk Island','pt_BR','',1595954051,1595954051),('Norfolk Island','ru','',1595954051,1595954051),('Norfolk Island','sk','',1595954051,1595954051),('Norfolk Island','sv','',1595954051,1595954051),('Norfolk Island','sv_FI','',1595954051,1595954051),('Norfolk Island','tr','',1595954051,1595954051),('Norfolk Island','uk','',1595954051,1595954051),('Norfolk Island','zh_Hans','',1595954051,1595954051),('North Korea','cs','',1595954051,1595954051),('North Korea','de','',1595954051,1595954051),('North Korea','en','',1595954051,1595954051),('North Korea','es','',1595954051,1595954051),('North Korea','fa','',1595954051,1595954051),('North Korea','fr','',1595954051,1595954051),('North Korea','it','',1595954051,1595954051),('North Korea','ja','',1595954051,1595954051),('North Korea','nl','',1595954051,1595954051),('North Korea','pl','',1595954051,1595954051),('North Korea','pt_BR','',1595954051,1595954051),('North Korea','ru','',1595954051,1595954051),('North Korea','sk','',1595954051,1595954051),('North Korea','sv','',1595954051,1595954051),('North Korea','sv_FI','',1595954051,1595954051),('North Korea','tr','',1595954051,1595954051),('North Korea','uk','',1595954051,1595954051),('North Korea','zh_Hans','',1595954051,1595954051),('North Macedonia','cs','',1595954051,1595954051),('North Macedonia','de','',1595954051,1595954051),('North Macedonia','en','',1595954051,1595954051),('North Macedonia','es','',1595954051,1595954051),('North Macedonia','fa','',1595954051,1595954051),('North Macedonia','fr','',1595954051,1595954051),('North Macedonia','it','',1595954051,1595954051),('North Macedonia','ja','',1595954051,1595954051),('North Macedonia','nl','',1595954051,1595954051),('North Macedonia','pl','',1595954051,1595954051),('North Macedonia','pt_BR','',1595954051,1595954051),('North Macedonia','ru','',1595954051,1595954051),('North Macedonia','sk','',1595954051,1595954051),('North Macedonia','sv','',1595954051,1595954051),('North Macedonia','sv_FI','',1595954051,1595954051),('North Macedonia','tr','',1595954051,1595954051),('North Macedonia','uk','',1595954051,1595954051),('North Macedonia','zh_Hans','',1595954051,1595954051),('Northern Mariana Islands','cs','',1595954051,1595954051),('Northern Mariana Islands','de','',1595954051,1595954051),('Northern Mariana Islands','en','',1595954051,1595954051),('Northern Mariana Islands','es','',1595954051,1595954051),('Northern Mariana Islands','fa','',1595954051,1595954051),('Northern Mariana Islands','fr','',1595954051,1595954051),('Northern Mariana Islands','it','',1595954051,1595954051),('Northern Mariana Islands','ja','',1595954051,1595954051),('Northern Mariana Islands','nl','',1595954051,1595954051),('Northern Mariana Islands','pl','',1595954051,1595954051),('Northern Mariana Islands','pt_BR','',1595954051,1595954051),('Northern Mariana Islands','ru','',1595954051,1595954051),('Northern Mariana Islands','sk','',1595954051,1595954051),('Northern Mariana Islands','sv','',1595954051,1595954051),('Northern Mariana Islands','sv_FI','',1595954051,1595954051),('Northern Mariana Islands','tr','',1595954051,1595954051),('Northern Mariana Islands','uk','',1595954051,1595954051),('Northern Mariana Islands','zh_Hans','',1595954051,1595954051),('Norway','cs','',1595954051,1595954051),('Norway','de','',1595954051,1595954051),('Norway','en','',1595954051,1595954051),('Norway','es','',1595954051,1595954051),('Norway','fa','',1595954051,1595954051),('Norway','fr','',1595954051,1595954051),('Norway','it','',1595954051,1595954051),('Norway','ja','',1595954051,1595954051),('Norway','nl','',1595954051,1595954051),('Norway','pl','',1595954051,1595954051),('Norway','pt_BR','',1595954051,1595954051),('Norway','ru','',1595954051,1595954051),('Norway','sk','',1595954051,1595954051),('Norway','sv','',1595954051,1595954051),('Norway','sv_FI','',1595954051,1595954051),('Norway','tr','',1595954051,1595954051),('Norway','uk','',1595954051,1595954051),('Norway','zh_Hans','',1595954051,1595954051),('Numero Civico','cs','',1595953867,1595953867),('Numero Civico','de','',1595953867,1595953867),('Numero Civico','en','',1595953867,1595953867),('Numero Civico','es','',1595953867,1595953867),('Numero Civico','fa','',1595953867,1595953867),('Numero Civico','fr','',1595953867,1595953867),('Numero Civico','it','',1595953867,1595953867),('Numero Civico','ja','',1595953867,1595953867),('Numero Civico','nl','',1595953867,1595953867),('Numero Civico','pl','',1595953867,1595953867),('Numero Civico','pt_BR','',1595953867,1595953867),('Numero Civico','ru','',1595953867,1595953867),('Numero Civico','sk','',1595953867,1595953867),('Numero Civico','sv','',1595953867,1595953867),('Numero Civico','sv_FI','',1595953867,1595953867),('Numero Civico','tr','',1595953867,1595953867),('Numero Civico','uk','',1595953867,1595953867),('Numero Civico','zh_Hans','',1595953867,1595953867),('Numero di Telefono','cs','',1595953778,1595953778),('Numero di Telefono','de','',1595953778,1595953778),('Numero di Telefono','en','',1595953778,1595953778),('Numero di Telefono','es','',1595953778,1595953778),('Numero di Telefono','fa','',1595953778,1595953778),('Numero di Telefono','fr','',1595953778,1595953778),('Numero di Telefono','it','',1595953778,1595953778),('Numero di Telefono','ja','',1595953778,1595953778),('Numero di Telefono','nl','',1595953778,1595953778),('Numero di Telefono','pl','',1595953778,1595953778),('Numero di Telefono','pt_BR','',1595953778,1595953778),('Numero di Telefono','ru','',1595953778,1595953778),('Numero di Telefono','sk','',1595953778,1595953778),('Numero di Telefono','sv','',1595953778,1595953778),('Numero di Telefono','sv_FI','',1595953778,1595953778),('Numero di Telefono','tr','',1595953778,1595953778),('Numero di Telefono','uk','',1595953778,1595953778),('Numero di Telefono','zh_Hans','',1595953778,1595953778),('Olio','cs','',1595922208,1595922208),('Olio','de','',1595922208,1595922208),('Olio','en','',1595922208,1595922208),('Olio','es','',1595922208,1595922208),('Olio','fa','',1595922208,1595922208),('Olio','fr','',1595922208,1595922208),('Olio','it','',1595922208,1595922208),('Olio','ja','',1595922208,1595922208),('Olio','nl','',1595922208,1595922208),('Olio','pl','',1595922208,1595922208),('Olio','pt_BR','',1595922208,1595922208),('Olio','ru','',1595922208,1595922208),('Olio','sk','',1595922208,1595922208),('Olio','sv','',1595922208,1595922208),('Olio','sv_FI','',1595922208,1595922208),('Olio','tr','',1595922208,1595922208),('Olio','uk','',1595922208,1595922208),('Olio','zh_Hans','',1595922208,1595922208),('Oman','cs','',1595954051,1595954051),('Oman','de','',1595954051,1595954051),('Oman','en','',1595954051,1595954051),('Oman','es','',1595954051,1595954051),('Oman','fa','',1595954051,1595954051),('Oman','fr','',1595954051,1595954051),('Oman','it','',1595954051,1595954051),('Oman','ja','',1595954051,1595954051),('Oman','nl','',1595954051,1595954051),('Oman','pl','',1595954051,1595954051),('Oman','pt_BR','',1595954051,1595954051),('Oman','ru','',1595954051,1595954051),('Oman','sk','',1595954051,1595954051),('Oman','sv','',1595954051,1595954051),('Oman','sv_FI','',1595954051,1595954051),('Oman','tr','',1595954051,1595954051),('Oman','uk','',1595954051,1595954051),('Oman','zh_Hans','',1595954051,1595954051),('Opening Hours','cs','',1595954198,1595954198),('Opening Hours','de','',1595954198,1595954198),('Opening Hours','en','',1595954198,1595954198),('Opening Hours','es','',1595954198,1595954198),('Opening Hours','fa','',1595954198,1595954198),('Opening Hours','fr','',1595954198,1595954198),('Opening Hours','it','',1595954198,1595954198),('Opening Hours','ja','',1595954198,1595954198),('Opening Hours','nl','',1595954198,1595954198),('Opening Hours','pl','',1595954198,1595954198),('Opening Hours','pt_BR','',1595954198,1595954198),('Opening Hours','ru','',1595954198,1595954198),('Opening Hours','sk','',1595954198,1595954198),('Opening Hours','sv','',1595954198,1595954198),('Opening Hours','sv_FI','',1595954198,1595954198),('Opening Hours','tr','',1595954198,1595954198),('Opening Hours','uk','',1595954198,1595954198),('Opening Hours','zh_Hans','',1595954198,1595954198),('Opening Time','cs','',1595954198,1595954198),('Opening Time','de','',1595954198,1595954198),('Opening Time','en','',1595954198,1595954198),('Opening Time','es','',1595954198,1595954198),('Opening Time','fa','',1595954198,1595954198),('Opening Time','fr','',1595954198,1595954198),('Opening Time','it','',1595954198,1595954198),('Opening Time','ja','',1595954198,1595954198),('Opening Time','nl','',1595954198,1595954198),('Opening Time','pl','',1595954198,1595954198),('Opening Time','pt_BR','',1595954198,1595954198),('Opening Time','ru','',1595954198,1595954198),('Opening Time','sk','',1595954198,1595954198),('Opening Time','sv','',1595954198,1595954198),('Opening Time','sv_FI','',1595954198,1595954198),('Opening Time','tr','',1595954198,1595954198),('Opening Time','uk','',1595954198,1595954198),('Opening Time','zh_Hans','',1595954198,1595954198),('OpeningDay','cs','',1595954198,1595954198),('OpeningDay','de','',1595954198,1595954198),('OpeningDay','en','',1595954198,1595954198),('OpeningDay','es','',1595954198,1595954198),('OpeningDay','fa','',1595954198,1595954198),('OpeningDay','fr','',1595954198,1595954198),('OpeningDay','it','',1595954198,1595954198),('OpeningDay','ja','',1595954198,1595954198),('OpeningDay','nl','',1595954198,1595954198),('OpeningDay','pl','',1595954198,1595954198),('OpeningDay','pt_BR','',1595954198,1595954198),('OpeningDay','ru','',1595954198,1595954198),('OpeningDay','sk','',1595954198,1595954198),('OpeningDay','sv','',1595954198,1595954198),('OpeningDay','sv_FI','',1595954198,1595954198),('OpeningDay','tr','',1595954198,1595954198),('OpeningDay','uk','',1595954198,1595954198),('OpeningDay','zh_Hans','',1595954198,1595954198),('Opercoli','cs','',1595922208,1595922208),('Opercoli','de','',1595922208,1595922208),('Opercoli','en','',1595922208,1595922208),('Opercoli','es','',1595922208,1595922208),('Opercoli','fa','',1595922208,1595922208),('Opercoli','fr','',1595922208,1595922208),('Opercoli','it','',1595922208,1595922208),('Opercoli','ja','',1595922208,1595922208),('Opercoli','nl','',1595922208,1595922208),('Opercoli','pl','',1595922208,1595922208),('Opercoli','pt_BR','',1595922208,1595922208),('Opercoli','ru','',1595922208,1595922208),('Opercoli','sk','',1595922208,1595922208),('Opercoli','sv','',1595922208,1595922208),('Opercoli','sv_FI','',1595922208,1595922208),('Opercoli','tr','',1595922208,1595922208),('Opercoli','uk','',1595922208,1595922208),('Opercoli','zh_Hans','',1595922208,1595922208),('Orari di Apertura','cs','',1595953778,1595953778),('Orari di Apertura','de','',1595953778,1595953778),('Orari di Apertura','en','',1595953778,1595953778),('Orari di Apertura','es','',1595953778,1595953778),('Orari di Apertura','fa','',1595953778,1595953778),('Orari di Apertura','fr','',1595953778,1595953778),('Orari di Apertura','it','',1595953778,1595953778),('Orari di Apertura','ja','',1595953778,1595953778),('Orari di Apertura','nl','',1595953778,1595953778),('Orari di Apertura','pl','',1595953778,1595953778),('Orari di Apertura','pt_BR','',1595953778,1595953778),('Orari di Apertura','ru','',1595953778,1595953778),('Orari di Apertura','sk','',1595953778,1595953778),('Orari di Apertura','sv','',1595953778,1595953778),('Orari di Apertura','sv_FI','',1595953778,1595953778),('Orari di Apertura','tr','',1595953778,1595953778),('Orari di Apertura','uk','',1595953778,1595953778),('Orari di Apertura','zh_Hans','',1595953778,1595953778),('Orario Apertura','cs','',1595955187,1595955187),('Orario Apertura','de','',1595955187,1595955187),('Orario Apertura','en','',1595955187,1595955187),('Orario Apertura','es','',1595955187,1595955187),('Orario Apertura','fa','',1595955187,1595955187),('Orario Apertura','fr','',1595955187,1595955187),('Orario Apertura','it','',1595955187,1595955187),('Orario Apertura','ja','',1595955187,1595955187),('Orario Apertura','nl','',1595955187,1595955187),('Orario Apertura','pl','',1595955187,1595955187),('Orario Apertura','pt_BR','',1595955187,1595955187),('Orario Apertura','ru','',1595955187,1595955187),('Orario Apertura','sk','',1595955187,1595955187),('Orario Apertura','sv','',1595955187,1595955187),('Orario Apertura','sv_FI','',1595955187,1595955187),('Orario Apertura','tr','',1595955187,1595955187),('Orario Apertura','uk','',1595955187,1595955187),('Orario Apertura','zh_Hans','',1595955187,1595955187),('Orario Chiusura','cs','',1595955187,1595955187),('Orario Chiusura','de','',1595955187,1595955187),('Orario Chiusura','en','',1595955187,1595955187),('Orario Chiusura','es','',1595955187,1595955187),('Orario Chiusura','fa','',1595955187,1595955187),('Orario Chiusura','fr','',1595955187,1595955187),('Orario Chiusura','it','',1595955187,1595955187),('Orario Chiusura','ja','',1595955187,1595955187),('Orario Chiusura','nl','',1595955187,1595955187),('Orario Chiusura','pl','',1595955187,1595955187),('Orario Chiusura','pt_BR','',1595955187,1595955187),('Orario Chiusura','ru','',1595955187,1595955187),('Orario Chiusura','sk','',1595955187,1595955187),('Orario Chiusura','sv','',1595955187,1595955187),('Orario Chiusura','sv_FI','',1595955187,1595955187),('Orario Chiusura','tr','',1595955187,1595955187),('Orario Chiusura','uk','',1595955187,1595955187),('Orario Chiusura','zh_Hans','',1595955187,1595955187),('Pakistan','cs','',1595954051,1595954051),('Pakistan','de','',1595954051,1595954051),('Pakistan','en','',1595954051,1595954051),('Pakistan','es','',1595954051,1595954051),('Pakistan','fa','',1595954051,1595954051),('Pakistan','fr','',1595954051,1595954051),('Pakistan','it','',1595954051,1595954051),('Pakistan','ja','',1595954051,1595954051),('Pakistan','nl','',1595954051,1595954051),('Pakistan','pl','',1595954051,1595954051),('Pakistan','pt_BR','',1595954051,1595954051),('Pakistan','ru','',1595954051,1595954051),('Pakistan','sk','',1595954051,1595954051),('Pakistan','sv','',1595954051,1595954051),('Pakistan','sv_FI','',1595954051,1595954051),('Pakistan','tr','',1595954051,1595954051),('Pakistan','uk','',1595954051,1595954051),('Pakistan','zh_Hans','',1595954051,1595954051),('Palau','cs','',1595954051,1595954051),('Palau','de','',1595954051,1595954051),('Palau','en','',1595954051,1595954051),('Palau','es','',1595954051,1595954051),('Palau','fa','',1595954051,1595954051),('Palau','fr','',1595954051,1595954051),('Palau','it','',1595954051,1595954051),('Palau','ja','',1595954051,1595954051),('Palau','nl','',1595954051,1595954051),('Palau','pl','',1595954051,1595954051),('Palau','pt_BR','',1595954051,1595954051),('Palau','ru','',1595954051,1595954051),('Palau','sk','',1595954051,1595954051),('Palau','sv','',1595954051,1595954051),('Palau','sv_FI','',1595954051,1595954051),('Palau','tr','',1595954051,1595954051),('Palau','uk','',1595954051,1595954051),('Palau','zh_Hans','',1595954051,1595954051),('Palestinian Territories','cs','',1595954051,1595954051),('Palestinian Territories','de','',1595954051,1595954051),('Palestinian Territories','en','',1595954051,1595954051),('Palestinian Territories','es','',1595954051,1595954051),('Palestinian Territories','fa','',1595954051,1595954051),('Palestinian Territories','fr','',1595954051,1595954051),('Palestinian Territories','it','',1595954051,1595954051),('Palestinian Territories','ja','',1595954051,1595954051),('Palestinian Territories','nl','',1595954051,1595954051),('Palestinian Territories','pl','',1595954051,1595954051),('Palestinian Territories','pt_BR','',1595954051,1595954051),('Palestinian Territories','ru','',1595954051,1595954051),('Palestinian Territories','sk','',1595954051,1595954051),('Palestinian Territories','sv','',1595954051,1595954051),('Palestinian Territories','sv_FI','',1595954051,1595954051),('Palestinian Territories','tr','',1595954051,1595954051),('Palestinian Territories','uk','',1595954051,1595954051),('Palestinian Territories','zh_Hans','',1595954051,1595954051),('Panama','cs','',1595954051,1595954051),('Panama','de','',1595954051,1595954051),('Panama','en','',1595954051,1595954051),('Panama','es','',1595954051,1595954051),('Panama','fa','',1595954051,1595954051),('Panama','fr','',1595954051,1595954051),('Panama','it','',1595954051,1595954051),('Panama','ja','',1595954051,1595954051),('Panama','nl','',1595954051,1595954051),('Panama','pl','',1595954051,1595954051),('Panama','pt_BR','',1595954051,1595954051),('Panama','ru','',1595954051,1595954051),('Panama','sk','',1595954051,1595954051),('Panama','sv','',1595954051,1595954051),('Panama','sv_FI','',1595954051,1595954051),('Panama','tr','',1595954051,1595954051),('Panama','uk','',1595954051,1595954051),('Panama','zh_Hans','',1595954051,1595954051),('Papua New Guinea','cs','',1595954051,1595954051),('Papua New Guinea','de','',1595954051,1595954051),('Papua New Guinea','en','',1595954051,1595954051),('Papua New Guinea','es','',1595954051,1595954051),('Papua New Guinea','fa','',1595954051,1595954051),('Papua New Guinea','fr','',1595954051,1595954051),('Papua New Guinea','it','',1595954051,1595954051),('Papua New Guinea','ja','',1595954051,1595954051),('Papua New Guinea','nl','',1595954051,1595954051),('Papua New Guinea','pl','',1595954051,1595954051),('Papua New Guinea','pt_BR','',1595954051,1595954051),('Papua New Guinea','ru','',1595954051,1595954051),('Papua New Guinea','sk','',1595954051,1595954051),('Papua New Guinea','sv','',1595954051,1595954051),('Papua New Guinea','sv_FI','',1595954051,1595954051),('Papua New Guinea','tr','',1595954051,1595954051),('Papua New Guinea','uk','',1595954051,1595954051),('Papua New Guinea','zh_Hans','',1595954051,1595954051),('Paraguay','cs','',1595954051,1595954051),('Paraguay','de','',1595954051,1595954051),('Paraguay','en','',1595954051,1595954051),('Paraguay','es','',1595954051,1595954051),('Paraguay','fa','',1595954051,1595954051),('Paraguay','fr','',1595954051,1595954051),('Paraguay','it','',1595954051,1595954051),('Paraguay','ja','',1595954051,1595954051),('Paraguay','nl','',1595954051,1595954051),('Paraguay','pl','',1595954051,1595954051),('Paraguay','pt_BR','',1595954051,1595954051),('Paraguay','ru','',1595954051,1595954051),('Paraguay','sk','',1595954051,1595954051),('Paraguay','sv','',1595954051,1595954051),('Paraguay','sv_FI','',1595954051,1595954051),('Paraguay','tr','',1595954051,1595954051),('Paraguay','uk','',1595954051,1595954051),('Paraguay','zh_Hans','',1595954051,1595954051),('Pay off','cs','',1595922207,1595922207),('Pay off','de','',1595922207,1595922207),('Pay off','en','',1595922207,1595922207),('Pay off','es','',1595922207,1595922207),('Pay off','fa','',1595922207,1595922207),('Pay off','fr','',1595922207,1595922207),('Pay off','it','',1595922207,1595922207),('Pay off','ja','',1595922207,1595922207),('Pay off','nl','',1595922207,1595922207),('Pay off','pl','',1595922207,1595922207),('Pay off','pt_BR','',1595922207,1595922207),('Pay off','ru','',1595922207,1595922207),('Pay off','sk','',1595922207,1595922207),('Pay off','sv','',1595922207,1595922207),('Pay off','sv_FI','',1595922207,1595922207),('Pay off','tr','',1595922207,1595922207),('Pay off','uk','',1595922207,1595922207),('Pay off','zh_Hans','',1595922207,1595922207),('Peru','cs','',1595954051,1595954051),('Peru','de','',1595954051,1595954051),('Peru','en','',1595954051,1595954051),('Peru','es','',1595954051,1595954051),('Peru','fa','',1595954051,1595954051),('Peru','fr','',1595954051,1595954051),('Peru','it','',1595954051,1595954051),('Peru','ja','',1595954051,1595954051),('Peru','nl','',1595954051,1595954051),('Peru','pl','',1595954051,1595954051),('Peru','pt_BR','',1595954051,1595954051),('Peru','ru','',1595954051,1595954051),('Peru','sk','',1595954051,1595954051),('Peru','sv','',1595954051,1595954051),('Peru','sv_FI','',1595954051,1595954051),('Peru','tr','',1595954051,1595954051),('Peru','uk','',1595954051,1595954051),('Peru','zh_Hans','',1595954051,1595954051),('Peso','cs','',1595922987,1595922987),('Peso','de','',1595922987,1595922987),('Peso','en','',1595922987,1595922987),('Peso','es','',1595922987,1595922987),('Peso','fa','',1595922987,1595922987),('Peso','fr','',1595922987,1595922987),('Peso','it','',1595922987,1595922987),('Peso','ja','',1595922987,1595922987),('Peso','nl','',1595922987,1595922987),('Peso','pl','',1595922987,1595922987),('Peso','pt_BR','',1595922987,1595922987),('Peso','ru','',1595922987,1595922987),('Peso','sk','',1595922987,1595922987),('Peso','sv','',1595922987,1595922987),('Peso','sv_FI','',1595922987,1595922987),('Peso','tr','',1595922987,1595922987),('Peso','uk','',1595922987,1595922987),('Peso','zh_Hans','',1595922987,1595922987),('Philippines','cs','',1595954051,1595954051),('Philippines','de','',1595954051,1595954051),('Philippines','en','',1595954051,1595954051),('Philippines','es','',1595954051,1595954051),('Philippines','fa','',1595954051,1595954051),('Philippines','fr','',1595954051,1595954051),('Philippines','it','',1595954051,1595954051),('Philippines','ja','',1595954051,1595954051),('Philippines','nl','',1595954051,1595954051),('Philippines','pl','',1595954051,1595954051),('Philippines','pt_BR','',1595954051,1595954051),('Philippines','ru','',1595954051,1595954051),('Philippines','sk','',1595954051,1595954051),('Philippines','sv','',1595954051,1595954051),('Philippines','sv_FI','',1595954051,1595954051),('Philippines','tr','',1595954051,1595954051),('Philippines','uk','',1595954051,1595954051),('Philippines','zh_Hans','',1595954051,1595954051),('Pitcairn Islands','cs','',1595954051,1595954051),('Pitcairn Islands','de','',1595954051,1595954051),('Pitcairn Islands','en','',1595954051,1595954051),('Pitcairn Islands','es','',1595954051,1595954051),('Pitcairn Islands','fa','',1595954051,1595954051),('Pitcairn Islands','fr','',1595954051,1595954051),('Pitcairn Islands','it','',1595954051,1595954051),('Pitcairn Islands','ja','',1595954051,1595954051),('Pitcairn Islands','nl','',1595954051,1595954051),('Pitcairn Islands','pl','',1595954051,1595954051),('Pitcairn Islands','pt_BR','',1595954051,1595954051),('Pitcairn Islands','ru','',1595954051,1595954051),('Pitcairn Islands','sk','',1595954051,1595954051),('Pitcairn Islands','sv','',1595954051,1595954051),('Pitcairn Islands','sv_FI','',1595954051,1595954051),('Pitcairn Islands','tr','',1595954051,1595954051),('Pitcairn Islands','uk','',1595954051,1595954051),('Pitcairn Islands','zh_Hans','',1595954051,1595954051),('Planta Medica','cs','',1595922207,1595922207),('Planta Medica','de','',1595922207,1595922207),('Planta Medica','en','',1595922207,1595922207),('Planta Medica','es','',1595922207,1595922207),('Planta Medica','fa','',1595922207,1595922207),('Planta Medica','fr','',1595922207,1595922207),('Planta Medica','it','',1595922207,1595922207),('Planta Medica','ja','',1595922207,1595922207),('Planta Medica','nl','',1595922207,1595922207),('Planta Medica','pl','',1595922207,1595922207),('Planta Medica','pt_BR','',1595922207,1595922207),('Planta Medica','ru','',1595922207,1595922207),('Planta Medica','sk','',1595922207,1595922207),('Planta Medica','sv','',1595922207,1595922207),('Planta Medica','sv_FI','',1595922207,1595922207),('Planta Medica','tr','',1595922207,1595922207),('Planta Medica','uk','',1595922207,1595922207),('Planta Medica','zh_Hans','',1595922207,1595922207),('Poland','cs','',1595954051,1595954051),('Poland','de','',1595954051,1595954051),('Poland','en','',1595954051,1595954051),('Poland','es','',1595954051,1595954051),('Poland','fa','',1595954051,1595954051),('Poland','fr','',1595954051,1595954051),('Poland','it','',1595954051,1595954051),('Poland','ja','',1595954051,1595954051),('Poland','nl','',1595954051,1595954051),('Poland','pl','',1595954051,1595954051),('Poland','pt_BR','',1595954051,1595954051),('Poland','ru','',1595954051,1595954051),('Poland','sk','',1595954051,1595954051),('Poland','sv','',1595954051,1595954051),('Poland','sv_FI','',1595954051,1595954051),('Poland','tr','',1595954051,1595954051),('Poland','uk','',1595954051,1595954051),('Poland','zh_Hans','',1595954051,1595954051),('Polish','cs','',1595918547,1595918547),('Polish','de','',1595918547,1595918547),('Polish','en','',1595918547,1595918547),('Polish','es','',1595918547,1595918547),('Polish','fa','',1595918547,1595918547),('Polish','fr','',1595918547,1595918547),('Polish','it','',1595918547,1595918547),('Polish','ja','',1595918547,1595918547),('Polish','nl','',1595918547,1595918547),('Polish','pl','',1595918547,1595918547),('Polish','pt_BR','',1595918547,1595918547),('Polish','ru','',1595918547,1595918547),('Polish','sk','',1595918547,1595918547),('Polish','sv','',1595918547,1595918547),('Polish','sv_FI','',1595918547,1595918547),('Polish','tr','',1595918547,1595918547),('Polish','uk','',1595918547,1595918547),('Polish','zh_Hans','',1595918547,1595918547),('Pomata','cs','',1595922208,1595922208),('Pomata','de','',1595922208,1595922208),('Pomata','en','',1595922208,1595922208),('Pomata','es','',1595922208,1595922208),('Pomata','fa','',1595922208,1595922208),('Pomata','fr','',1595922208,1595922208),('Pomata','it','',1595922208,1595922208),('Pomata','ja','',1595922208,1595922208),('Pomata','nl','',1595922208,1595922208),('Pomata','pl','',1595922208,1595922208),('Pomata','pt_BR','',1595922208,1595922208),('Pomata','ru','',1595922208,1595922208),('Pomata','sk','',1595922208,1595922208),('Pomata','sv','',1595922208,1595922208),('Pomata','sv_FI','',1595922208,1595922208),('Pomata','tr','',1595922208,1595922208),('Pomata','uk','',1595922208,1595922208),('Pomata','zh_Hans','',1595922208,1595922208),('Portugal','cs','',1595954051,1595954051),('Portugal','de','',1595954051,1595954051),('Portugal','en','',1595954051,1595954051),('Portugal','es','',1595954051,1595954051),('Portugal','fa','',1595954051,1595954051),('Portugal','fr','',1595954051,1595954051),('Portugal','it','',1595954051,1595954051),('Portugal','ja','',1595954051,1595954051),('Portugal','nl','',1595954051,1595954051),('Portugal','pl','',1595954051,1595954051),('Portugal','pt_BR','',1595954051,1595954051),('Portugal','ru','',1595954051,1595954051),('Portugal','sk','',1595954051,1595954051),('Portugal','sv','',1595954051,1595954051),('Portugal','sv_FI','',1595954051,1595954051),('Portugal','tr','',1595954051,1595954051),('Portugal','uk','',1595954051,1595954051),('Portugal','zh_Hans','',1595954051,1595954051),('Portuguese','cs','',1595918547,1595918547),('Portuguese','de','',1595918547,1595918547),('Portuguese','en','',1595918547,1595918547),('Portuguese','es','',1595918547,1595918547),('Portuguese','fa','',1595918547,1595918547),('Portuguese','fr','',1595918547,1595918547),('Portuguese','it','',1595918547,1595918547),('Portuguese','ja','',1595918547,1595918547),('Portuguese','nl','',1595918547,1595918547),('Portuguese','pl','',1595918547,1595918547),('Portuguese','pt_BR','',1595918547,1595918547),('Portuguese','ru','',1595918547,1595918547),('Portuguese','sk','',1595918547,1595918547),('Portuguese','sv','',1595918547,1595918547),('Portuguese','sv_FI','',1595918547,1595918547),('Portuguese','tr','',1595918547,1595918547),('Portuguese','uk','',1595918547,1595918547),('Portuguese','zh_Hans','',1595918547,1595918547),('Prezzi','cs','',1595922207,1595922207),('Prezzi','de','',1595922207,1595922207),('Prezzi','en','',1595922207,1595922207),('Prezzi','es','',1595922207,1595922207),('Prezzi','fa','',1595922207,1595922207),('Prezzi','fr','',1595922207,1595922207),('Prezzi','it','',1595922207,1595922207),('Prezzi','ja','',1595922207,1595922207),('Prezzi','nl','',1595922207,1595922207),('Prezzi','pl','',1595922207,1595922207),('Prezzi','pt_BR','',1595922207,1595922207),('Prezzi','ru','',1595922207,1595922207),('Prezzi','sk','',1595922207,1595922207),('Prezzi','sv','',1595922207,1595922207),('Prezzi','sv_FI','',1595922207,1595922207),('Prezzi','tr','',1595922207,1595922207),('Prezzi','uk','',1595922207,1595922207),('Prezzi','zh_Hans','',1595922207,1595922207),('Prezzo','cs','',1595919837,1595919837),('Prezzo','de','',1595919837,1595919837),('Prezzo','en','',1595919837,1595919837),('Prezzo','es','',1595919837,1595919837),('Prezzo','fa','',1595919837,1595919837),('Prezzo','fr','',1595919837,1595919837),('Prezzo','it','',1595919837,1595919837),('Prezzo','ja','',1595919837,1595919837),('Prezzo','nl','',1595919837,1595919837),('Prezzo','pl','',1595919837,1595919837),('Prezzo','pt_BR','',1595919837,1595919837),('Prezzo','ru','',1595919837,1595919837),('Prezzo','sk','',1595919837,1595919837),('Prezzo','sv','',1595919837,1595919837),('Prezzo','sv_FI','',1595919837,1595919837),('Prezzo','tr','',1595919837,1595919837),('Prezzo','uk','',1595919837,1595919837),('Prezzo','zh_Hans','',1595919837,1595919837),('Prodotti Alternativi','cs','',1595923527,1595923527),('Prodotti Alternativi','de','',1595923527,1595923527),('Prodotti Alternativi','en','',1595923527,1595923527),('Prodotti Alternativi','es','',1595923527,1595923527),('Prodotti Alternativi','fa','',1595923527,1595923527),('Prodotti Alternativi','fr','',1595923527,1595923527),('Prodotti Alternativi','it','',1595923527,1595923527),('Prodotti Alternativi','ja','',1595923527,1595923527),('Prodotti Alternativi','nl','',1595923527,1595923527),('Prodotti Alternativi','pl','',1595923527,1595923527),('Prodotti Alternativi','pt_BR','',1595923527,1595923527),('Prodotti Alternativi','ru','',1595923527,1595923527),('Prodotti Alternativi','sk','',1595923527,1595923527),('Prodotti Alternativi','sv','',1595923527,1595923527),('Prodotti Alternativi','sv_FI','',1595923527,1595923527),('Prodotti Alternativi','tr','',1595923527,1595923527),('Prodotti Alternativi','uk','',1595923527,1595923527),('Prodotti Alternativi','zh_Hans','',1595923527,1595923527),('Prodotti Correlati','cs','',1595923557,1595923557),('Prodotti Correlati','de','',1595923557,1595923557),('Prodotti Correlati','en','',1595923557,1595923557),('Prodotti Correlati','es','',1595923557,1595923557),('Prodotti Correlati','fa','',1595923557,1595923557),('Prodotti Correlati','fr','',1595923557,1595923557),('Prodotti Correlati','it','',1595923557,1595923557),('Prodotti Correlati','ja','',1595923557,1595923557),('Prodotti Correlati','nl','',1595923557,1595923557),('Prodotti Correlati','pl','',1595923557,1595923557),('Prodotti Correlati','pt_BR','',1595923557,1595923557),('Prodotti Correlati','ru','',1595923557,1595923557),('Prodotti Correlati','sk','',1595923557,1595923557),('Prodotti Correlati','sv','',1595923557,1595923557),('Prodotti Correlati','sv_FI','',1595923557,1595923557),('Prodotti Correlati','tr','',1595923557,1595923557),('Prodotti Correlati','uk','',1595923557,1595923557),('Prodotti Correlati','zh_Hans','',1595923557,1595923557),('Product','cs','',1593791762,1593791762),('Product','de','',1593791762,1593791762),('Product','en','',1593791762,1593791762),('Product','es','',1593791762,1593791762),('Product','fa','',1593791762,1593791762),('Product','fr','',1593791762,1593791762),('Product','it','',1593791762,1593791762),('Product','ja','',1593791762,1593791762),('Product','nl','',1593791762,1593791762),('Product','pl','',1593791762,1593791762),('Product','pt_BR','',1593791762,1593791762),('Product','ru','',1593791762,1593791762),('Product','sk','',1593791762,1593791762),('Product','sv','',1593791762,1593791762),('Product','sv_FI','',1593791762,1593791762),('Product','tr','',1593791762,1593791762),('Product','uk','',1593791762,1593791762),('Product','zh_Hans','',1593791762,1593791762),('Product Data','cs','',1605562155,1605562155),('Product Data','de','',1605562155,1605562155),('Product Data','en','',1605562155,1605562155),('Product Data','es','',1605562155,1605562155),('Product Data','fa','',1605562155,1605562155),('Product Data','fr','',1605562155,1605562155),('Product Data','it','',1605562155,1605562155),('Product Data','ja','',1605562155,1605562155),('Product Data','nl','',1605562155,1605562155),('Product Data','pl','',1605562155,1605562155),('Product Data','pt_BR','',1605562155,1605562155),('Product Data','ru','',1605562155,1605562155),('Product Data','sk','',1605562155,1605562155),('Product Data','sv','',1605562155,1605562155),('Product Data','sv_FI','',1605562155,1605562155),('Product Data','tr','',1605562155,1605562155),('Product Data','uk','',1605562155,1605562155),('Product Data','zh_Hans','',1605562155,1605562155),('ProductTest','cs','',1593791791,1593791791),('ProductTest','de','',1593791791,1593791791),('ProductTest','en','',1593791791,1593791791),('ProductTest','es','',1593791791,1593791791),('ProductTest','fa','',1593791791,1593791791),('ProductTest','fr','',1593791791,1593791791),('ProductTest','it','',1593791791,1593791791),('ProductTest','ja','',1593791791,1593791791),('ProductTest','nl','',1593791791,1593791791),('ProductTest','pl','',1593791791,1593791791),('ProductTest','pt_BR','',1593791791,1593791791),('ProductTest','ru','',1593791791,1593791791),('ProductTest','sk','',1593791791,1593791791),('ProductTest','sv','',1593791791,1593791791),('ProductTest','sv_FI','',1593791791,1593791791),('ProductTest','tr','',1593791791,1593791791),('ProductTest','uk','',1593791791,1593791791),('ProductTest','zh_Hans','',1593791791,1593791791),('Provincia','cs','',1595953867,1595953867),('Provincia','de','',1595953867,1595953867),('Provincia','en','',1595953867,1595953867),('Provincia','es','',1595953867,1595953867),('Provincia','fa','',1595953867,1595953867),('Provincia','fr','',1595953867,1595953867),('Provincia','it','',1595953867,1595953867),('Provincia','ja','',1595953867,1595953867),('Provincia','nl','',1595953867,1595953867),('Provincia','pl','',1595953867,1595953867),('Provincia','pt_BR','',1595953867,1595953867),('Provincia','ru','',1595953867,1595953867),('Provincia','sk','',1595953867,1595953867),('Provincia','sv','',1595953867,1595953867),('Provincia','sv_FI','',1595953867,1595953867),('Provincia','tr','',1595953867,1595953867),('Provincia','uk','',1595953867,1595953867),('Provincia','zh_Hans','',1595953867,1595953867),('Pseudo-Accents','cs','',1595954051,1595954051),('Pseudo-Accents','de','',1595954051,1595954051),('Pseudo-Accents','en','',1595954051,1595954051),('Pseudo-Accents','es','',1595954051,1595954051),('Pseudo-Accents','fa','',1595954051,1595954051),('Pseudo-Accents','fr','',1595954051,1595954051),('Pseudo-Accents','it','',1595954051,1595954051),('Pseudo-Accents','ja','',1595954051,1595954051),('Pseudo-Accents','nl','',1595954051,1595954051),('Pseudo-Accents','pl','',1595954051,1595954051),('Pseudo-Accents','pt_BR','',1595954051,1595954051),('Pseudo-Accents','ru','',1595954051,1595954051),('Pseudo-Accents','sk','',1595954051,1595954051),('Pseudo-Accents','sv','',1595954051,1595954051),('Pseudo-Accents','sv_FI','',1595954051,1595954051),('Pseudo-Accents','tr','',1595954051,1595954051),('Pseudo-Accents','uk','',1595954051,1595954051),('Pseudo-Accents','zh_Hans','',1595954051,1595954051),('Pseudo-Bidi','cs','',1595954051,1595954051),('Pseudo-Bidi','de','',1595954051,1595954051),('Pseudo-Bidi','en','',1595954051,1595954051),('Pseudo-Bidi','es','',1595954051,1595954051),('Pseudo-Bidi','fa','',1595954051,1595954051),('Pseudo-Bidi','fr','',1595954051,1595954051),('Pseudo-Bidi','it','',1595954051,1595954051),('Pseudo-Bidi','ja','',1595954051,1595954051),('Pseudo-Bidi','nl','',1595954051,1595954051),('Pseudo-Bidi','pl','',1595954051,1595954051),('Pseudo-Bidi','pt_BR','',1595954051,1595954051),('Pseudo-Bidi','ru','',1595954051,1595954051),('Pseudo-Bidi','sk','',1595954051,1595954051),('Pseudo-Bidi','sv','',1595954051,1595954051),('Pseudo-Bidi','sv_FI','',1595954051,1595954051),('Pseudo-Bidi','tr','',1595954051,1595954051),('Pseudo-Bidi','uk','',1595954051,1595954051),('Pseudo-Bidi','zh_Hans','',1595954051,1595954051),('Puerto Rico','cs','',1595954051,1595954051),('Puerto Rico','de','',1595954051,1595954051),('Puerto Rico','en','',1595954051,1595954051),('Puerto Rico','es','',1595954051,1595954051),('Puerto Rico','fa','',1595954051,1595954051),('Puerto Rico','fr','',1595954051,1595954051),('Puerto Rico','it','',1595954051,1595954051),('Puerto Rico','ja','',1595954051,1595954051),('Puerto Rico','nl','',1595954051,1595954051),('Puerto Rico','pl','',1595954051,1595954051),('Puerto Rico','pt_BR','',1595954051,1595954051),('Puerto Rico','ru','',1595954051,1595954051),('Puerto Rico','sk','',1595954051,1595954051),('Puerto Rico','sv','',1595954051,1595954051),('Puerto Rico','sv_FI','',1595954051,1595954051),('Puerto Rico','tr','',1595954051,1595954051),('Puerto Rico','uk','',1595954051,1595954051),('Puerto Rico','zh_Hans','',1595954051,1595954051),('Qatar','cs','',1595954051,1595954051),('Qatar','de','',1595954051,1595954051),('Qatar','en','',1595954051,1595954051),('Qatar','es','',1595954051,1595954051),('Qatar','fa','',1595954051,1595954051),('Qatar','fr','',1595954051,1595954051),('Qatar','it','',1595954051,1595954051),('Qatar','ja','',1595954051,1595954051),('Qatar','nl','',1595954051,1595954051),('Qatar','pl','',1595954051,1595954051),('Qatar','pt_BR','',1595954051,1595954051),('Qatar','ru','',1595954051,1595954051),('Qatar','sk','',1595954051,1595954051),('Qatar','sv','',1595954051,1595954051),('Qatar','sv_FI','',1595954051,1595954051),('Qatar','tr','',1595954051,1595954051),('Qatar','uk','',1595954051,1595954051),('Qatar','zh_Hans','',1595954051,1595954051),('Romania','cs','',1595954051,1595954051),('Romania','de','',1595954051,1595954051),('Romania','en','',1595954051,1595954051),('Romania','es','',1595954051,1595954051),('Romania','fa','',1595954051,1595954051),('Romania','fr','',1595954051,1595954051),('Romania','it','',1595954051,1595954051),('Romania','ja','',1595954051,1595954051),('Romania','nl','',1595954051,1595954051),('Romania','pl','',1595954051,1595954051),('Romania','pt_BR','',1595954051,1595954051),('Romania','ru','',1595954051,1595954051),('Romania','sk','',1595954051,1595954051),('Romania','sv','',1595954051,1595954051),('Romania','sv_FI','',1595954051,1595954051),('Romania','tr','',1595954051,1595954051),('Romania','uk','',1595954051,1595954051),('Romania','zh_Hans','',1595954051,1595954051),('Russia','cs','',1595954051,1595954051),('Russia','de','',1595954051,1595954051),('Russia','en','',1595954051,1595954051),('Russia','es','',1595954051,1595954051),('Russia','fa','',1595954051,1595954051),('Russia','fr','',1595954051,1595954051),('Russia','it','',1595954051,1595954051),('Russia','ja','',1595954051,1595954051),('Russia','nl','',1595954051,1595954051),('Russia','pl','',1595954051,1595954051),('Russia','pt_BR','',1595954051,1595954051),('Russia','ru','',1595954051,1595954051),('Russia','sk','',1595954051,1595954051),('Russia','sv','',1595954051,1595954051),('Russia','sv_FI','',1595954051,1595954051),('Russia','tr','',1595954051,1595954051),('Russia','uk','',1595954051,1595954051),('Russia','zh_Hans','',1595954051,1595954051),('Rwanda','cs','',1595954051,1595954051),('Rwanda','de','',1595954051,1595954051),('Rwanda','en','',1595954051,1595954051),('Rwanda','es','',1595954051,1595954051),('Rwanda','fa','',1595954051,1595954051),('Rwanda','fr','',1595954051,1595954051),('Rwanda','it','',1595954051,1595954051),('Rwanda','ja','',1595954051,1595954051),('Rwanda','nl','',1595954051,1595954051),('Rwanda','pl','',1595954051,1595954051),('Rwanda','pt_BR','',1595954051,1595954051),('Rwanda','ru','',1595954051,1595954051),('Rwanda','sk','',1595954051,1595954051),('Rwanda','sv','',1595954051,1595954051),('Rwanda','sv_FI','',1595954051,1595954051),('Rwanda','tr','',1595954051,1595954051),('Rwanda','uk','',1595954051,1595954051),('Rwanda','zh_Hans','',1595954051,1595954051),('Réunion','cs','',1595954051,1595954051),('Réunion','de','',1595954051,1595954051),('Réunion','en','',1595954051,1595954051),('Réunion','es','',1595954051,1595954051),('Réunion','fa','',1595954051,1595954051),('Réunion','fr','',1595954051,1595954051),('Réunion','it','',1595954051,1595954051),('Réunion','ja','',1595954051,1595954051),('Réunion','nl','',1595954051,1595954051),('Réunion','pl','',1595954051,1595954051),('Réunion','pt_BR','',1595954051,1595954051),('Réunion','ru','',1595954051,1595954051),('Réunion','sk','',1595954051,1595954051),('Réunion','sv','',1595954051,1595954051),('Réunion','sv_FI','',1595954051,1595954051),('Réunion','tr','',1595954051,1595954051),('Réunion','uk','',1595954051,1595954051),('Réunion','zh_Hans','',1595954051,1595954051),('Samoa','cs','',1595954051,1595954051),('Samoa','de','',1595954051,1595954051),('Samoa','en','',1595954051,1595954051),('Samoa','es','',1595954051,1595954051),('Samoa','fa','',1595954051,1595954051),('Samoa','fr','',1595954051,1595954051),('Samoa','it','',1595954051,1595954051),('Samoa','ja','',1595954051,1595954051),('Samoa','nl','',1595954051,1595954051),('Samoa','pl','',1595954051,1595954051),('Samoa','pt_BR','',1595954051,1595954051),('Samoa','ru','',1595954051,1595954051),('Samoa','sk','',1595954051,1595954051),('Samoa','sv','',1595954051,1595954051),('Samoa','sv_FI','',1595954051,1595954051),('Samoa','tr','',1595954051,1595954051),('Samoa','uk','',1595954051,1595954051),('Samoa','zh_Hans','',1595954051,1595954051),('San Marino','cs','',1595954051,1595954051),('San Marino','de','',1595954051,1595954051),('San Marino','en','',1595954051,1595954051),('San Marino','es','',1595954051,1595954051),('San Marino','fa','',1595954051,1595954051),('San Marino','fr','',1595954051,1595954051),('San Marino','it','',1595954051,1595954051),('San Marino','ja','',1595954051,1595954051),('San Marino','nl','',1595954051,1595954051),('San Marino','pl','',1595954051,1595954051),('San Marino','pt_BR','',1595954051,1595954051),('San Marino','ru','',1595954051,1595954051),('San Marino','sk','',1595954051,1595954051),('San Marino','sv','',1595954051,1595954051),('San Marino','sv_FI','',1595954051,1595954051),('San Marino','tr','',1595954051,1595954051),('San Marino','uk','',1595954051,1595954051),('San Marino','zh_Hans','',1595954051,1595954051),('Saturday','cs','',1595954198,1595954198),('Saturday','de','',1595954198,1595954198),('Saturday','en','',1595954198,1595954198),('Saturday','es','',1595954198,1595954198),('Saturday','fa','',1595954198,1595954198),('Saturday','fr','',1595954198,1595954198),('Saturday','it','',1595954198,1595954198),('Saturday','ja','',1595954198,1595954198),('Saturday','nl','',1595954198,1595954198),('Saturday','pl','',1595954198,1595954198),('Saturday','pt_BR','',1595954198,1595954198),('Saturday','ru','',1595954198,1595954198),('Saturday','sk','',1595954198,1595954198),('Saturday','sv','',1595954198,1595954198),('Saturday','sv_FI','',1595954198,1595954198),('Saturday','tr','',1595954198,1595954198),('Saturday','uk','',1595954198,1595954198),('Saturday','zh_Hans','',1595954198,1595954198),('Saudi Arabia','cs','',1595954051,1595954051),('Saudi Arabia','de','',1595954051,1595954051),('Saudi Arabia','en','',1595954051,1595954051),('Saudi Arabia','es','',1595954051,1595954051),('Saudi Arabia','fa','',1595954051,1595954051),('Saudi Arabia','fr','',1595954051,1595954051),('Saudi Arabia','it','',1595954051,1595954051),('Saudi Arabia','ja','',1595954051,1595954051),('Saudi Arabia','nl','',1595954051,1595954051),('Saudi Arabia','pl','',1595954051,1595954051),('Saudi Arabia','pt_BR','',1595954051,1595954051),('Saudi Arabia','ru','',1595954051,1595954051),('Saudi Arabia','sk','',1595954051,1595954051),('Saudi Arabia','sv','',1595954051,1595954051),('Saudi Arabia','sv_FI','',1595954051,1595954051),('Saudi Arabia','tr','',1595954051,1595954051),('Saudi Arabia','uk','',1595954051,1595954051),('Saudi Arabia','zh_Hans','',1595954051,1595954051),('Sciroppo','cs','',1595922208,1595922208),('Sciroppo','de','',1595922208,1595922208),('Sciroppo','en','',1595922208,1595922208),('Sciroppo','es','',1595922208,1595922208),('Sciroppo','fa','',1595922208,1595922208),('Sciroppo','fr','',1595922208,1595922208),('Sciroppo','it','',1595922208,1595922208),('Sciroppo','ja','',1595922208,1595922208),('Sciroppo','nl','',1595922208,1595922208),('Sciroppo','pl','',1595922208,1595922208),('Sciroppo','pt_BR','',1595922208,1595922208),('Sciroppo','ru','',1595922208,1595922208),('Sciroppo','sk','',1595922208,1595922208),('Sciroppo','sv','',1595922208,1595922208),('Sciroppo','sv_FI','',1595922208,1595922208),('Sciroppo','tr','',1595922208,1595922208),('Sciroppo','uk','',1595922208,1595922208),('Sciroppo','zh_Hans','',1595922208,1595922208),('Senegal','cs','',1595954051,1595954051),('Senegal','de','',1595954051,1595954051),('Senegal','en','',1595954051,1595954051),('Senegal','es','',1595954051,1595954051),('Senegal','fa','',1595954051,1595954051),('Senegal','fr','',1595954051,1595954051),('Senegal','it','',1595954051,1595954051),('Senegal','ja','',1595954051,1595954051),('Senegal','nl','',1595954051,1595954051),('Senegal','pl','',1595954051,1595954051),('Senegal','pt_BR','',1595954051,1595954051),('Senegal','ru','',1595954051,1595954051),('Senegal','sk','',1595954051,1595954051),('Senegal','sv','',1595954051,1595954051),('Senegal','sv_FI','',1595954051,1595954051),('Senegal','tr','',1595954051,1595954051),('Senegal','uk','',1595954051,1595954051),('Senegal','zh_Hans','',1595954051,1595954051),('Serbia','cs','',1595954051,1595954051),('Serbia','de','',1595954051,1595954051),('Serbia','en','',1595954051,1595954051),('Serbia','es','',1595954051,1595954051),('Serbia','fa','',1595954051,1595954051),('Serbia','fr','',1595954051,1595954051),('Serbia','it','',1595954051,1595954051),('Serbia','ja','',1595954051,1595954051),('Serbia','nl','',1595954051,1595954051),('Serbia','pl','',1595954051,1595954051),('Serbia','pt_BR','',1595954051,1595954051),('Serbia','ru','',1595954051,1595954051),('Serbia','sk','',1595954051,1595954051),('Serbia','sv','',1595954051,1595954051),('Serbia','sv_FI','',1595954051,1595954051),('Serbia','tr','',1595954051,1595954051),('Serbia','uk','',1595954051,1595954051),('Serbia','zh_Hans','',1595954051,1595954051),('Seychelles','cs','',1595954051,1595954051),('Seychelles','de','',1595954051,1595954051),('Seychelles','en','',1595954051,1595954051),('Seychelles','es','',1595954051,1595954051),('Seychelles','fa','',1595954051,1595954051),('Seychelles','fr','',1595954051,1595954051),('Seychelles','it','',1595954051,1595954051),('Seychelles','ja','',1595954051,1595954051),('Seychelles','nl','',1595954051,1595954051),('Seychelles','pl','',1595954051,1595954051),('Seychelles','pt_BR','',1595954051,1595954051),('Seychelles','ru','',1595954051,1595954051),('Seychelles','sk','',1595954051,1595954051),('Seychelles','sv','',1595954051,1595954051),('Seychelles','sv_FI','',1595954051,1595954051),('Seychelles','tr','',1595954051,1595954051),('Seychelles','uk','',1595954051,1595954051),('Seychelles','zh_Hans','',1595954051,1595954051),('Shampoo','cs','',1595922208,1595922208),('Shampoo','de','',1595922208,1595922208),('Shampoo','en','',1595922208,1595922208),('Shampoo','es','',1595922208,1595922208),('Shampoo','fa','',1595922208,1595922208),('Shampoo','fr','',1595922208,1595922208),('Shampoo','it','',1595922208,1595922208),('Shampoo','ja','',1595922208,1595922208),('Shampoo','nl','',1595922208,1595922208),('Shampoo','pl','',1595922208,1595922208),('Shampoo','pt_BR','',1595922208,1595922208),('Shampoo','ru','',1595922208,1595922208),('Shampoo','sk','',1595922208,1595922208),('Shampoo','sv','',1595922208,1595922208),('Shampoo','sv_FI','',1595922208,1595922208),('Shampoo','tr','',1595922208,1595922208),('Shampoo','uk','',1595922208,1595922208),('Shampoo','zh_Hans','',1595922208,1595922208),('Shift','cs','',1609929774,1609929774),('Shift','de','',1609929774,1609929774),('Shift','en','',1609929774,1609929774),('Shift','es','',1609929774,1609929774),('Shift','fa','',1609929774,1609929774),('Shift','fr','',1609929774,1609929774),('Shift','it','',1609929774,1609929774),('Shift','ja','',1609929774,1609929774),('Shift','nl','',1609929774,1609929774),('Shift','pl','',1609929774,1609929774),('Shift','pt_BR','',1609929774,1609929774),('Shift','ru','',1609929774,1609929774),('Shift','sk','',1609929774,1609929774),('Shift','sv','',1609929774,1609929774),('Shift','sv_FI','',1609929774,1609929774),('Shift','tr','',1609929774,1609929774),('Shift','uk','',1609929774,1609929774),('Shift','zh_Hans','',1609929774,1609929774),('Sierra Leone','cs','',1595954051,1595954051),('Sierra Leone','de','',1595954051,1595954051),('Sierra Leone','en','',1595954051,1595954051),('Sierra Leone','es','',1595954051,1595954051),('Sierra Leone','fa','',1595954051,1595954051),('Sierra Leone','fr','',1595954051,1595954051),('Sierra Leone','it','',1595954051,1595954051),('Sierra Leone','ja','',1595954051,1595954051),('Sierra Leone','nl','',1595954051,1595954051),('Sierra Leone','pl','',1595954051,1595954051),('Sierra Leone','pt_BR','',1595954051,1595954051),('Sierra Leone','ru','',1595954051,1595954051),('Sierra Leone','sk','',1595954051,1595954051),('Sierra Leone','sv','',1595954051,1595954051),('Sierra Leone','sv_FI','',1595954051,1595954051),('Sierra Leone','tr','',1595954051,1595954051),('Sierra Leone','uk','',1595954051,1595954051),('Sierra Leone','zh_Hans','',1595954051,1595954051),('Singapore','cs','',1595954051,1595954051),('Singapore','de','',1595954051,1595954051),('Singapore','en','',1595954051,1595954051),('Singapore','es','',1595954051,1595954051),('Singapore','fa','',1595954051,1595954051),('Singapore','fr','',1595954051,1595954051),('Singapore','it','',1595954051,1595954051),('Singapore','ja','',1595954051,1595954051),('Singapore','nl','',1595954051,1595954051),('Singapore','pl','',1595954051,1595954051),('Singapore','pt_BR','',1595954051,1595954051),('Singapore','ru','',1595954051,1595954051),('Singapore','sk','',1595954051,1595954051),('Singapore','sv','',1595954051,1595954051),('Singapore','sv_FI','',1595954051,1595954051),('Singapore','tr','',1595954051,1595954051),('Singapore','uk','',1595954051,1595954051),('Singapore','zh_Hans','',1595954051,1595954051),('Sint Maarten','cs','',1595954051,1595954051),('Sint Maarten','de','',1595954051,1595954051),('Sint Maarten','en','',1595954051,1595954051),('Sint Maarten','es','',1595954051,1595954051),('Sint Maarten','fa','',1595954051,1595954051),('Sint Maarten','fr','',1595954051,1595954051),('Sint Maarten','it','',1595954051,1595954051),('Sint Maarten','ja','',1595954051,1595954051),('Sint Maarten','nl','',1595954051,1595954051),('Sint Maarten','pl','',1595954051,1595954051),('Sint Maarten','pt_BR','',1595954051,1595954051),('Sint Maarten','ru','',1595954051,1595954051),('Sint Maarten','sk','',1595954051,1595954051),('Sint Maarten','sv','',1595954051,1595954051),('Sint Maarten','sv_FI','',1595954051,1595954051),('Sint Maarten','tr','',1595954051,1595954051),('Sint Maarten','uk','',1595954051,1595954051),('Sint Maarten','zh_Hans','',1595954051,1595954051),('Sintra','cs','',1595922537,1595922537),('Sintra','de','',1595922537,1595922537),('Sintra','en','',1595922537,1595922537),('Sintra','es','',1595922537,1595922537),('Sintra','fa','',1595922537,1595922537),('Sintra','fr','',1595922537,1595922537),('Sintra','it','',1595922537,1595922537),('Sintra','ja','',1595922537,1595922537),('Sintra','nl','',1595922537,1595922537),('Sintra','pl','',1595922537,1595922537),('Sintra','pt_BR','',1595922537,1595922537),('Sintra','ru','',1595922537,1595922537),('Sintra','sk','',1595922537,1595922537),('Sintra','sv','',1595922537,1595922537),('Sintra','sv_FI','',1595922537,1595922537),('Sintra','tr','',1595922537,1595922537),('Sintra','uk','',1595922537,1595922537),('Sintra','zh_Hans','',1595922537,1595922537),('Sito Web','cs','',1595919837,1595919837),('Sito Web','de','',1595919837,1595919837),('Sito Web','en','',1595919837,1595919837),('Sito Web','es','',1595919837,1595919837),('Sito Web','fa','',1595919837,1595919837),('Sito Web','fr','',1595919837,1595919837),('Sito Web','it','',1595919837,1595919837),('Sito Web','ja','',1595919837,1595919837),('Sito Web','nl','',1595919837,1595919837),('Sito Web','pl','',1595919837,1595919837),('Sito Web','pt_BR','',1595919837,1595919837),('Sito Web','ru','',1595919837,1595919837),('Sito Web','sk','',1595919837,1595919837),('Sito Web','sv','',1595919837,1595919837),('Sito Web','sv_FI','',1595919837,1595919837),('Sito Web','tr','',1595919837,1595919837),('Sito Web','uk','',1595919837,1595919837),('Sito Web','zh_Hans','',1595919837,1595919837),('Sito Web 1','cs','',1595923617,1595923617),('Sito Web 1','de','',1595923617,1595923617),('Sito Web 1','en','',1595923617,1595923617),('Sito Web 1','es','',1595923617,1595923617),('Sito Web 1','fa','',1595923617,1595923617),('Sito Web 1','fr','',1595923617,1595923617),('Sito Web 1','it','',1595923617,1595923617),('Sito Web 1','ja','',1595923617,1595923617),('Sito Web 1','nl','',1595923617,1595923617),('Sito Web 1','pl','',1595923617,1595923617),('Sito Web 1','pt_BR','',1595923617,1595923617),('Sito Web 1','ru','',1595923617,1595923617),('Sito Web 1','sk','',1595923617,1595923617),('Sito Web 1','sv','',1595923617,1595923617),('Sito Web 1','sv_FI','',1595923617,1595923617),('Sito Web 1','tr','',1595923617,1595923617),('Sito Web 1','uk','',1595923617,1595923617),('Sito Web 1','zh_Hans','',1595923617,1595923617),('Sito Web 2','cs','',1595923617,1595923617),('Sito Web 2','de','',1595923617,1595923617),('Sito Web 2','en','',1595923617,1595923617),('Sito Web 2','es','',1595923617,1595923617),('Sito Web 2','fa','',1595923617,1595923617),('Sito Web 2','fr','',1595923617,1595923617),('Sito Web 2','it','',1595923617,1595923617),('Sito Web 2','ja','',1595923617,1595923617),('Sito Web 2','nl','',1595923617,1595923617),('Sito Web 2','pl','',1595923617,1595923617),('Sito Web 2','pt_BR','',1595923617,1595923617),('Sito Web 2','ru','',1595923617,1595923617),('Sito Web 2','sk','',1595923617,1595923617),('Sito Web 2','sv','',1595923617,1595923617),('Sito Web 2','sv_FI','',1595923617,1595923617),('Sito Web 2','tr','',1595923617,1595923617),('Sito Web 2','uk','',1595923617,1595923617),('Sito Web 2','zh_Hans','',1595923617,1595923617),('Sku','cs','',1595918163,1595918163),('Sku','de','',1595918163,1595918163),('Sku','en','',1595918163,1595918163),('Sku','es','',1595918163,1595918163),('Sku','fa','',1595918163,1595918163),('Sku','fr','',1595918163,1595918163),('Sku','it','',1595918163,1595918163),('Sku','ja','',1595918163,1595918163),('Sku','nl','',1595918163,1595918163),('Sku','pl','',1595918163,1595918163),('Sku','pt_BR','',1595918163,1595918163),('Sku','ru','',1595918163,1595918163),('Sku','sk','',1595918163,1595918163),('Sku','sv','',1595918163,1595918163),('Sku','sv_FI','',1595918163,1595918163),('Sku','tr','',1595918163,1595918163),('Sku','uk','',1595918163,1595918163),('Sku','zh_Hans','',1595918163,1595918163),('Slovakia','cs','',1595954052,1595954052),('Slovakia','de','',1595954052,1595954052),('Slovakia','en','',1595954052,1595954052),('Slovakia','es','',1595954052,1595954052),('Slovakia','fa','',1595954052,1595954052),('Slovakia','fr','',1595954052,1595954052),('Slovakia','it','',1595954052,1595954052),('Slovakia','ja','',1595954052,1595954052),('Slovakia','nl','',1595954052,1595954052),('Slovakia','pl','',1595954052,1595954052),('Slovakia','pt_BR','',1595954052,1595954052),('Slovakia','ru','',1595954052,1595954052),('Slovakia','sk','',1595954052,1595954052),('Slovakia','sv','',1595954052,1595954052),('Slovakia','sv_FI','',1595954052,1595954052),('Slovakia','tr','',1595954052,1595954052),('Slovakia','uk','',1595954052,1595954052),('Slovakia','zh_Hans','',1595954052,1595954052),('Slovenia','cs','',1595954052,1595954052),('Slovenia','de','',1595954052,1595954052),('Slovenia','en','',1595954052,1595954052),('Slovenia','es','',1595954052,1595954052),('Slovenia','fa','',1595954052,1595954052),('Slovenia','fr','',1595954052,1595954052),('Slovenia','it','',1595954052,1595954052),('Slovenia','ja','',1595954052,1595954052),('Slovenia','nl','',1595954052,1595954052),('Slovenia','pl','',1595954052,1595954052),('Slovenia','pt_BR','',1595954052,1595954052),('Slovenia','ru','',1595954052,1595954052),('Slovenia','sk','',1595954052,1595954052),('Slovenia','sv','',1595954052,1595954052),('Slovenia','sv_FI','',1595954052,1595954052),('Slovenia','tr','',1595954052,1595954052),('Slovenia','uk','',1595954052,1595954052),('Slovenia','zh_Hans','',1595954052,1595954052),('Solomon Islands','cs','',1595954052,1595954052),('Solomon Islands','de','',1595954052,1595954052),('Solomon Islands','en','',1595954052,1595954052),('Solomon Islands','es','',1595954052,1595954052),('Solomon Islands','fa','',1595954052,1595954052),('Solomon Islands','fr','',1595954052,1595954052),('Solomon Islands','it','',1595954052,1595954052),('Solomon Islands','ja','',1595954052,1595954052),('Solomon Islands','nl','',1595954052,1595954052),('Solomon Islands','pl','',1595954052,1595954052),('Solomon Islands','pt_BR','',1595954052,1595954052),('Solomon Islands','ru','',1595954052,1595954052),('Solomon Islands','sk','',1595954052,1595954052),('Solomon Islands','sv','',1595954052,1595954052),('Solomon Islands','sv_FI','',1595954052,1595954052),('Solomon Islands','tr','',1595954052,1595954052),('Solomon Islands','uk','',1595954052,1595954052),('Solomon Islands','zh_Hans','',1595954052,1595954052),('Somalia','cs','',1595954052,1595954052),('Somalia','de','',1595954052,1595954052),('Somalia','en','',1595954052,1595954052),('Somalia','es','',1595954052,1595954052),('Somalia','fa','',1595954052,1595954052),('Somalia','fr','',1595954052,1595954052),('Somalia','it','',1595954052,1595954052),('Somalia','ja','',1595954052,1595954052),('Somalia','nl','',1595954052,1595954052),('Somalia','pl','',1595954052,1595954052),('Somalia','pt_BR','',1595954052,1595954052),('Somalia','ru','',1595954052,1595954052),('Somalia','sk','',1595954052,1595954052),('Somalia','sv','',1595954052,1595954052),('Somalia','sv_FI','',1595954052,1595954052),('Somalia','tr','',1595954052,1595954052),('Somalia','uk','',1595954052,1595954052),('Somalia','zh_Hans','',1595954052,1595954052),('Sottotitolo','cs','',1595919837,1595919837),('Sottotitolo','de','',1595919837,1595919837),('Sottotitolo','en','',1595919837,1595919837),('Sottotitolo','es','',1595919837,1595919837),('Sottotitolo','fa','',1595919837,1595919837),('Sottotitolo','fr','',1595919837,1595919837),('Sottotitolo','it','',1595919837,1595919837),('Sottotitolo','ja','',1595919837,1595919837),('Sottotitolo','nl','',1595919837,1595919837),('Sottotitolo','pl','',1595919837,1595919837),('Sottotitolo','pt_BR','',1595919837,1595919837),('Sottotitolo','ru','',1595919837,1595919837),('Sottotitolo','sk','',1595919837,1595919837),('Sottotitolo','sv','',1595919837,1595919837),('Sottotitolo','sv_FI','',1595919837,1595919837),('Sottotitolo','tr','',1595919837,1595919837),('Sottotitolo','uk','',1595919837,1595919837),('Sottotitolo','zh_Hans','',1595919837,1595919837),('South Africa','cs','',1595954052,1595954052),('South Africa','de','',1595954052,1595954052),('South Africa','en','',1595954052,1595954052),('South Africa','es','',1595954052,1595954052),('South Africa','fa','',1595954052,1595954052),('South Africa','fr','',1595954052,1595954052),('South Africa','it','',1595954052,1595954052),('South Africa','ja','',1595954052,1595954052),('South Africa','nl','',1595954052,1595954052),('South Africa','pl','',1595954052,1595954052),('South Africa','pt_BR','',1595954052,1595954052),('South Africa','ru','',1595954052,1595954052),('South Africa','sk','',1595954052,1595954052),('South Africa','sv','',1595954052,1595954052),('South Africa','sv_FI','',1595954052,1595954052),('South Africa','tr','',1595954052,1595954052),('South Africa','uk','',1595954052,1595954052),('South Africa','zh_Hans','',1595954052,1595954052),('South Georgia & South Sandwich Islands','cs','',1595954052,1595954052),('South Georgia & South Sandwich Islands','de','',1595954052,1595954052),('South Georgia & South Sandwich Islands','en','',1595954052,1595954052),('South Georgia & South Sandwich Islands','es','',1595954052,1595954052),('South Georgia & South Sandwich Islands','fa','',1595954052,1595954052),('South Georgia & South Sandwich Islands','fr','',1595954052,1595954052),('South Georgia & South Sandwich Islands','it','',1595954052,1595954052),('South Georgia & South Sandwich Islands','ja','',1595954052,1595954052),('South Georgia & South Sandwich Islands','nl','',1595954052,1595954052),('South Georgia & South Sandwich Islands','pl','',1595954052,1595954052),('South Georgia & South Sandwich Islands','pt_BR','',1595954052,1595954052),('South Georgia & South Sandwich Islands','ru','',1595954052,1595954052),('South Georgia & South Sandwich Islands','sk','',1595954052,1595954052),('South Georgia & South Sandwich Islands','sv','',1595954052,1595954052),('South Georgia & South Sandwich Islands','sv_FI','',1595954052,1595954052),('South Georgia & South Sandwich Islands','tr','',1595954052,1595954052),('South Georgia & South Sandwich Islands','uk','',1595954052,1595954052),('South Georgia & South Sandwich Islands','zh_Hans','',1595954052,1595954052),('South Korea','cs','',1595954052,1595954052),('South Korea','de','',1595954052,1595954052),('South Korea','en','',1595954052,1595954052),('South Korea','es','',1595954052,1595954052),('South Korea','fa','',1595954052,1595954052),('South Korea','fr','',1595954052,1595954052),('South Korea','it','',1595954052,1595954052),('South Korea','ja','',1595954052,1595954052),('South Korea','nl','',1595954052,1595954052),('South Korea','pl','',1595954052,1595954052),('South Korea','pt_BR','',1595954052,1595954052),('South Korea','ru','',1595954052,1595954052),('South Korea','sk','',1595954052,1595954052),('South Korea','sv','',1595954052,1595954052),('South Korea','sv_FI','',1595954052,1595954052),('South Korea','tr','',1595954052,1595954052),('South Korea','uk','',1595954052,1595954052),('South Korea','zh_Hans','',1595954052,1595954052),('South Sudan','cs','',1595954052,1595954052),('South Sudan','de','',1595954052,1595954052),('South Sudan','en','',1595954052,1595954052),('South Sudan','es','',1595954052,1595954052),('South Sudan','fa','',1595954052,1595954052),('South Sudan','fr','',1595954052,1595954052),('South Sudan','it','',1595954052,1595954052),('South Sudan','ja','',1595954052,1595954052),('South Sudan','nl','',1595954052,1595954052),('South Sudan','pl','',1595954052,1595954052),('South Sudan','pt_BR','',1595954052,1595954052),('South Sudan','ru','',1595954052,1595954052),('South Sudan','sk','',1595954052,1595954052),('South Sudan','sv','',1595954052,1595954052),('South Sudan','sv_FI','',1595954052,1595954052),('South Sudan','tr','',1595954052,1595954052),('South Sudan','uk','',1595954052,1595954052),('South Sudan','zh_Hans','',1595954052,1595954052),('Spain','cs','',1595954052,1595954052),('Spain','de','',1595954052,1595954052),('Spain','en','',1595954052,1595954052),('Spain','es','',1595954052,1595954052),('Spain','fa','',1595954052,1595954052),('Spain','fr','',1595954052,1595954052),('Spain','it','',1595954052,1595954052),('Spain','ja','',1595954052,1595954052),('Spain','nl','',1595954052,1595954052),('Spain','pl','',1595954052,1595954052),('Spain','pt_BR','',1595954052,1595954052),('Spain','ru','',1595954052,1595954052),('Spain','sk','',1595954052,1595954052),('Spain','sv','',1595954052,1595954052),('Spain','sv_FI','',1595954052,1595954052),('Spain','tr','',1595954052,1595954052),('Spain','uk','',1595954052,1595954052),('Spain','zh_Hans','',1595954052,1595954052),('Spanish','cs','',1595918547,1595918547),('Spanish','de','',1595918547,1595918547),('Spanish','en','',1595918547,1595918547),('Spanish','es','',1595918547,1595918547),('Spanish','fa','',1595918547,1595918547),('Spanish','fr','',1595918547,1595918547),('Spanish','it','',1595918547,1595918547),('Spanish','ja','',1595918547,1595918547),('Spanish','nl','',1595918547,1595918547),('Spanish','pl','',1595918547,1595918547),('Spanish','pt_BR','',1595918547,1595918547),('Spanish','ru','',1595918547,1595918547),('Spanish','sk','',1595918547,1595918547),('Spanish','sv','',1595918547,1595918547),('Spanish','sv_FI','',1595918547,1595918547),('Spanish','tr','',1595918547,1595918547),('Spanish','uk','',1595918547,1595918547),('Spanish','zh_Hans','',1595918547,1595918547),('Specifiche Prodotto','cs','',1595922207,1595922207),('Specifiche Prodotto','de','',1595922207,1595922207),('Specifiche Prodotto','en','',1595922207,1595922207),('Specifiche Prodotto','es','',1595922207,1595922207),('Specifiche Prodotto','fa','',1595922207,1595922207),('Specifiche Prodotto','fr','',1595922207,1595922207),('Specifiche Prodotto','it','',1595922207,1595922207),('Specifiche Prodotto','ja','',1595922207,1595922207),('Specifiche Prodotto','nl','',1595922207,1595922207),('Specifiche Prodotto','pl','',1595922207,1595922207),('Specifiche Prodotto','pt_BR','',1595922207,1595922207),('Specifiche Prodotto','ru','',1595922207,1595922207),('Specifiche Prodotto','sk','',1595922207,1595922207),('Specifiche Prodotto','sv','',1595922207,1595922207),('Specifiche Prodotto','sv_FI','',1595922207,1595922207),('Specifiche Prodotto','tr','',1595922207,1595922207),('Specifiche Prodotto','uk','',1595922207,1595922207),('Specifiche Prodotto','zh_Hans','',1595922207,1595922207),('Spray','cs','',1595922208,1595922208),('Spray','de','',1595922208,1595922208),('Spray','en','',1595922208,1595922208),('Spray','es','',1595922208,1595922208),('Spray','fa','',1595922208,1595922208),('Spray','fr','',1595922208,1595922208),('Spray','it','',1595922208,1595922208),('Spray','ja','',1595922208,1595922208),('Spray','nl','',1595922208,1595922208),('Spray','pl','',1595922208,1595922208),('Spray','pt_BR','',1595922208,1595922208),('Spray','ru','',1595922208,1595922208),('Spray','sk','',1595922208,1595922208),('Spray','sv','',1595922208,1595922208),('Spray','sv_FI','',1595922208,1595922208),('Spray','tr','',1595922208,1595922208),('Spray','uk','',1595922208,1595922208),('Spray','zh_Hans','',1595922208,1595922208),('Sri Lanka','cs','',1595954052,1595954052),('Sri Lanka','de','',1595954052,1595954052),('Sri Lanka','en','',1595954052,1595954052),('Sri Lanka','es','',1595954052,1595954052),('Sri Lanka','fa','',1595954052,1595954052),('Sri Lanka','fr','',1595954052,1595954052),('Sri Lanka','it','',1595954052,1595954052),('Sri Lanka','ja','',1595954052,1595954052),('Sri Lanka','nl','',1595954052,1595954052),('Sri Lanka','pl','',1595954052,1595954052),('Sri Lanka','pt_BR','',1595954052,1595954052),('Sri Lanka','ru','',1595954052,1595954052),('Sri Lanka','sk','',1595954052,1595954052),('Sri Lanka','sv','',1595954052,1595954052),('Sri Lanka','sv_FI','',1595954052,1595954052),('Sri Lanka','tr','',1595954052,1595954052),('Sri Lanka','uk','',1595954052,1595954052),('Sri Lanka','zh_Hans','',1595954052,1595954052),('St. Barthélemy','cs','',1595954052,1595954052),('St. Barthélemy','de','',1595954052,1595954052),('St. Barthélemy','en','',1595954052,1595954052),('St. Barthélemy','es','',1595954052,1595954052),('St. Barthélemy','fa','',1595954052,1595954052),('St. Barthélemy','fr','',1595954052,1595954052),('St. Barthélemy','it','',1595954052,1595954052),('St. Barthélemy','ja','',1595954052,1595954052),('St. Barthélemy','nl','',1595954052,1595954052),('St. Barthélemy','pl','',1595954052,1595954052),('St. Barthélemy','pt_BR','',1595954052,1595954052),('St. Barthélemy','ru','',1595954052,1595954052),('St. Barthélemy','sk','',1595954052,1595954052),('St. Barthélemy','sv','',1595954052,1595954052),('St. Barthélemy','sv_FI','',1595954052,1595954052),('St. Barthélemy','tr','',1595954052,1595954052),('St. Barthélemy','uk','',1595954052,1595954052),('St. Barthélemy','zh_Hans','',1595954052,1595954052),('St. Helena','cs','',1595954052,1595954052),('St. Helena','de','',1595954052,1595954052),('St. Helena','en','',1595954052,1595954052),('St. Helena','es','',1595954052,1595954052),('St. Helena','fa','',1595954052,1595954052),('St. Helena','fr','',1595954052,1595954052),('St. Helena','it','',1595954052,1595954052),('St. Helena','ja','',1595954052,1595954052),('St. Helena','nl','',1595954052,1595954052),('St. Helena','pl','',1595954052,1595954052),('St. Helena','pt_BR','',1595954052,1595954052),('St. Helena','ru','',1595954052,1595954052),('St. Helena','sk','',1595954052,1595954052),('St. Helena','sv','',1595954052,1595954052),('St. Helena','sv_FI','',1595954052,1595954052),('St. Helena','tr','',1595954052,1595954052),('St. Helena','uk','',1595954052,1595954052),('St. Helena','zh_Hans','',1595954052,1595954052),('St. Kitts & Nevis','cs','',1595954052,1595954052),('St. Kitts & Nevis','de','',1595954052,1595954052),('St. Kitts & Nevis','en','',1595954052,1595954052),('St. Kitts & Nevis','es','',1595954052,1595954052),('St. Kitts & Nevis','fa','',1595954052,1595954052),('St. Kitts & Nevis','fr','',1595954052,1595954052),('St. Kitts & Nevis','it','',1595954052,1595954052),('St. Kitts & Nevis','ja','',1595954052,1595954052),('St. Kitts & Nevis','nl','',1595954052,1595954052),('St. Kitts & Nevis','pl','',1595954052,1595954052),('St. Kitts & Nevis','pt_BR','',1595954052,1595954052),('St. Kitts & Nevis','ru','',1595954052,1595954052),('St. Kitts & Nevis','sk','',1595954052,1595954052),('St. Kitts & Nevis','sv','',1595954052,1595954052),('St. Kitts & Nevis','sv_FI','',1595954052,1595954052),('St. Kitts & Nevis','tr','',1595954052,1595954052),('St. Kitts & Nevis','uk','',1595954052,1595954052),('St. Kitts & Nevis','zh_Hans','',1595954052,1595954052),('St. Lucia','cs','',1595954052,1595954052),('St. Lucia','de','',1595954052,1595954052),('St. Lucia','en','',1595954052,1595954052),('St. Lucia','es','',1595954052,1595954052),('St. Lucia','fa','',1595954052,1595954052),('St. Lucia','fr','',1595954052,1595954052),('St. Lucia','it','',1595954052,1595954052),('St. Lucia','ja','',1595954052,1595954052),('St. Lucia','nl','',1595954052,1595954052),('St. Lucia','pl','',1595954052,1595954052),('St. Lucia','pt_BR','',1595954052,1595954052),('St. Lucia','ru','',1595954052,1595954052),('St. Lucia','sk','',1595954052,1595954052),('St. Lucia','sv','',1595954052,1595954052),('St. Lucia','sv_FI','',1595954052,1595954052),('St. Lucia','tr','',1595954052,1595954052),('St. Lucia','uk','',1595954052,1595954052),('St. Lucia','zh_Hans','',1595954052,1595954052),('St. Martin','cs','',1595954052,1595954052),('St. Martin','de','',1595954052,1595954052),('St. Martin','en','',1595954052,1595954052),('St. Martin','es','',1595954052,1595954052),('St. Martin','fa','',1595954052,1595954052),('St. Martin','fr','',1595954052,1595954052),('St. Martin','it','',1595954052,1595954052),('St. Martin','ja','',1595954052,1595954052),('St. Martin','nl','',1595954052,1595954052),('St. Martin','pl','',1595954052,1595954052),('St. Martin','pt_BR','',1595954052,1595954052),('St. Martin','ru','',1595954052,1595954052),('St. Martin','sk','',1595954052,1595954052),('St. Martin','sv','',1595954052,1595954052),('St. Martin','sv_FI','',1595954052,1595954052),('St. Martin','tr','',1595954052,1595954052),('St. Martin','uk','',1595954052,1595954052),('St. Martin','zh_Hans','',1595954052,1595954052),('St. Pierre & Miquelon','cs','',1595954052,1595954052),('St. Pierre & Miquelon','de','',1595954052,1595954052),('St. Pierre & Miquelon','en','',1595954052,1595954052),('St. Pierre & Miquelon','es','',1595954052,1595954052),('St. Pierre & Miquelon','fa','',1595954052,1595954052),('St. Pierre & Miquelon','fr','',1595954052,1595954052),('St. Pierre & Miquelon','it','',1595954052,1595954052),('St. Pierre & Miquelon','ja','',1595954052,1595954052),('St. Pierre & Miquelon','nl','',1595954052,1595954052),('St. Pierre & Miquelon','pl','',1595954052,1595954052),('St. Pierre & Miquelon','pt_BR','',1595954052,1595954052),('St. Pierre & Miquelon','ru','',1595954052,1595954052),('St. Pierre & Miquelon','sk','',1595954052,1595954052),('St. Pierre & Miquelon','sv','',1595954052,1595954052),('St. Pierre & Miquelon','sv_FI','',1595954052,1595954052),('St. Pierre & Miquelon','tr','',1595954052,1595954052),('St. Pierre & Miquelon','uk','',1595954052,1595954052),('St. Pierre & Miquelon','zh_Hans','',1595954052,1595954052),('St. Vincent & Grenadines','cs','',1595954052,1595954052),('St. Vincent & Grenadines','de','',1595954052,1595954052),('St. Vincent & Grenadines','en','',1595954052,1595954052),('St. Vincent & Grenadines','es','',1595954052,1595954052),('St. Vincent & Grenadines','fa','',1595954052,1595954052),('St. Vincent & Grenadines','fr','',1595954052,1595954052),('St. Vincent & Grenadines','it','',1595954052,1595954052),('St. Vincent & Grenadines','ja','',1595954052,1595954052),('St. Vincent & Grenadines','nl','',1595954052,1595954052),('St. Vincent & Grenadines','pl','',1595954052,1595954052),('St. Vincent & Grenadines','pt_BR','',1595954052,1595954052),('St. Vincent & Grenadines','ru','',1595954052,1595954052),('St. Vincent & Grenadines','sk','',1595954052,1595954052),('St. Vincent & Grenadines','sv','',1595954052,1595954052),('St. Vincent & Grenadines','sv_FI','',1595954052,1595954052),('St. Vincent & Grenadines','tr','',1595954052,1595954052),('St. Vincent & Grenadines','uk','',1595954052,1595954052),('St. Vincent & Grenadines','zh_Hans','',1595954052,1595954052),('Sudan','cs','',1595954052,1595954052),('Sudan','de','',1595954052,1595954052),('Sudan','en','',1595954052,1595954052),('Sudan','es','',1595954052,1595954052),('Sudan','fa','',1595954052,1595954052),('Sudan','fr','',1595954052,1595954052),('Sudan','it','',1595954052,1595954052),('Sudan','ja','',1595954052,1595954052),('Sudan','nl','',1595954052,1595954052),('Sudan','pl','',1595954052,1595954052),('Sudan','pt_BR','',1595954052,1595954052),('Sudan','ru','',1595954052,1595954052),('Sudan','sk','',1595954052,1595954052),('Sudan','sv','',1595954052,1595954052),('Sudan','sv_FI','',1595954052,1595954052),('Sudan','tr','',1595954052,1595954052),('Sudan','uk','',1595954052,1595954052),('Sudan','zh_Hans','',1595954052,1595954052),('Sunday','cs','',1595954198,1595954198),('Sunday','de','',1595954198,1595954198),('Sunday','en','',1595954198,1595954198),('Sunday','es','',1595954198,1595954198),('Sunday','fa','',1595954198,1595954198),('Sunday','fr','',1595954198,1595954198),('Sunday','it','',1595954198,1595954198),('Sunday','ja','',1595954198,1595954198),('Sunday','nl','',1595954198,1595954198),('Sunday','pl','',1595954198,1595954198),('Sunday','pt_BR','',1595954198,1595954198),('Sunday','ru','',1595954198,1595954198),('Sunday','sk','',1595954198,1595954198),('Sunday','sv','',1595954198,1595954198),('Sunday','sv_FI','',1595954198,1595954198),('Sunday','tr','',1595954198,1595954198),('Sunday','uk','',1595954198,1595954198),('Sunday','zh_Hans','',1595954198,1595954198),('Suriname','cs','',1595954052,1595954052),('Suriname','de','',1595954052,1595954052),('Suriname','en','',1595954052,1595954052),('Suriname','es','',1595954052,1595954052),('Suriname','fa','',1595954052,1595954052),('Suriname','fr','',1595954052,1595954052),('Suriname','it','',1595954052,1595954052),('Suriname','ja','',1595954052,1595954052),('Suriname','nl','',1595954052,1595954052),('Suriname','pl','',1595954052,1595954052),('Suriname','pt_BR','',1595954052,1595954052),('Suriname','ru','',1595954052,1595954052),('Suriname','sk','',1595954052,1595954052),('Suriname','sv','',1595954052,1595954052),('Suriname','sv_FI','',1595954052,1595954052),('Suriname','tr','',1595954052,1595954052),('Suriname','uk','',1595954052,1595954052),('Suriname','zh_Hans','',1595954052,1595954052),('Svalbard & Jan Mayen','cs','',1595954052,1595954052),('Svalbard & Jan Mayen','de','',1595954052,1595954052),('Svalbard & Jan Mayen','en','',1595954052,1595954052),('Svalbard & Jan Mayen','es','',1595954052,1595954052),('Svalbard & Jan Mayen','fa','',1595954052,1595954052),('Svalbard & Jan Mayen','fr','',1595954052,1595954052),('Svalbard & Jan Mayen','it','',1595954052,1595954052),('Svalbard & Jan Mayen','ja','',1595954052,1595954052),('Svalbard & Jan Mayen','nl','',1595954052,1595954052),('Svalbard & Jan Mayen','pl','',1595954052,1595954052),('Svalbard & Jan Mayen','pt_BR','',1595954052,1595954052),('Svalbard & Jan Mayen','ru','',1595954052,1595954052),('Svalbard & Jan Mayen','sk','',1595954052,1595954052),('Svalbard & Jan Mayen','sv','',1595954052,1595954052),('Svalbard & Jan Mayen','sv_FI','',1595954052,1595954052),('Svalbard & Jan Mayen','tr','',1595954052,1595954052),('Svalbard & Jan Mayen','uk','',1595954052,1595954052),('Svalbard & Jan Mayen','zh_Hans','',1595954052,1595954052),('Sweden','cs','',1595954052,1595954052),('Sweden','de','',1595954052,1595954052),('Sweden','en','',1595954052,1595954052),('Sweden','es','',1595954052,1595954052),('Sweden','fa','',1595954052,1595954052),('Sweden','fr','',1595954052,1595954052),('Sweden','it','',1595954052,1595954052),('Sweden','ja','',1595954052,1595954052),('Sweden','nl','',1595954052,1595954052),('Sweden','pl','',1595954052,1595954052),('Sweden','pt_BR','',1595954052,1595954052),('Sweden','ru','',1595954052,1595954052),('Sweden','sk','',1595954052,1595954052),('Sweden','sv','',1595954052,1595954052),('Sweden','sv_FI','',1595954052,1595954052),('Sweden','tr','',1595954052,1595954052),('Sweden','uk','',1595954052,1595954052),('Sweden','zh_Hans','',1595954052,1595954052),('Switzerland','cs','',1595954052,1595954052),('Switzerland','de','',1595954052,1595954052),('Switzerland','en','',1595954052,1595954052),('Switzerland','es','',1595954052,1595954052),('Switzerland','fa','',1595954052,1595954052),('Switzerland','fr','',1595954052,1595954052),('Switzerland','it','',1595954052,1595954052),('Switzerland','ja','',1595954052,1595954052),('Switzerland','nl','',1595954052,1595954052),('Switzerland','pl','',1595954052,1595954052),('Switzerland','pt_BR','',1595954052,1595954052),('Switzerland','ru','',1595954052,1595954052),('Switzerland','sk','',1595954052,1595954052),('Switzerland','sv','',1595954052,1595954052),('Switzerland','sv_FI','',1595954052,1595954052),('Switzerland','tr','',1595954052,1595954052),('Switzerland','uk','',1595954052,1595954052),('Switzerland','zh_Hans','',1595954052,1595954052),('Syria','cs','',1595954052,1595954052),('Syria','de','',1595954052,1595954052),('Syria','en','',1595954052,1595954052),('Syria','es','',1595954052,1595954052),('Syria','fa','',1595954052,1595954052),('Syria','fr','',1595954052,1595954052),('Syria','it','',1595954052,1595954052),('Syria','ja','',1595954052,1595954052),('Syria','nl','',1595954052,1595954052),('Syria','pl','',1595954052,1595954052),('Syria','pt_BR','',1595954052,1595954052),('Syria','ru','',1595954052,1595954052),('Syria','sk','',1595954052,1595954052),('Syria','sv','',1595954052,1595954052),('Syria','sv_FI','',1595954052,1595954052),('Syria','tr','',1595954052,1595954052),('Syria','uk','',1595954052,1595954052),('Syria','zh_Hans','',1595954052,1595954052),('São Tomé & Príncipe','cs','',1595954052,1595954052),('São Tomé & Príncipe','de','',1595954052,1595954052),('São Tomé & Príncipe','en','',1595954052,1595954052),('São Tomé & Príncipe','es','',1595954052,1595954052),('São Tomé & Príncipe','fa','',1595954052,1595954052),('São Tomé & Príncipe','fr','',1595954052,1595954052),('São Tomé & Príncipe','it','',1595954052,1595954052),('São Tomé & Príncipe','ja','',1595954052,1595954052),('São Tomé & Príncipe','nl','',1595954052,1595954052),('São Tomé & Príncipe','pl','',1595954052,1595954052),('São Tomé & Príncipe','pt_BR','',1595954052,1595954052),('São Tomé & Príncipe','ru','',1595954052,1595954052),('São Tomé & Príncipe','sk','',1595954052,1595954052),('São Tomé & Príncipe','sv','',1595954052,1595954052),('São Tomé & Príncipe','sv_FI','',1595954052,1595954052),('São Tomé & Príncipe','tr','',1595954052,1595954052),('São Tomé & Príncipe','uk','',1595954052,1595954052),('São Tomé & Príncipe','zh_Hans','',1595954052,1595954052),('Taiwan','cs','',1595954052,1595954052),('Taiwan','de','',1595954052,1595954052),('Taiwan','en','',1595954052,1595954052),('Taiwan','es','',1595954052,1595954052),('Taiwan','fa','',1595954052,1595954052),('Taiwan','fr','',1595954052,1595954052),('Taiwan','it','',1595954052,1595954052),('Taiwan','ja','',1595954052,1595954052),('Taiwan','nl','',1595954052,1595954052),('Taiwan','pl','',1595954052,1595954052),('Taiwan','pt_BR','',1595954052,1595954052),('Taiwan','ru','',1595954052,1595954052),('Taiwan','sk','',1595954052,1595954052),('Taiwan','sv','',1595954052,1595954052),('Taiwan','sv_FI','',1595954052,1595954052),('Taiwan','tr','',1595954052,1595954052),('Taiwan','uk','',1595954052,1595954052),('Taiwan','zh_Hans','',1595954052,1595954052),('Tajikistan','cs','',1595954052,1595954052),('Tajikistan','de','',1595954052,1595954052),('Tajikistan','en','',1595954052,1595954052),('Tajikistan','es','',1595954052,1595954052),('Tajikistan','fa','',1595954052,1595954052),('Tajikistan','fr','',1595954052,1595954052),('Tajikistan','it','',1595954052,1595954052),('Tajikistan','ja','',1595954052,1595954052),('Tajikistan','nl','',1595954052,1595954052),('Tajikistan','pl','',1595954052,1595954052),('Tajikistan','pt_BR','',1595954052,1595954052),('Tajikistan','ru','',1595954052,1595954052),('Tajikistan','sk','',1595954052,1595954052),('Tajikistan','sv','',1595954052,1595954052),('Tajikistan','sv_FI','',1595954052,1595954052),('Tajikistan','tr','',1595954052,1595954052),('Tajikistan','uk','',1595954052,1595954052),('Tajikistan','zh_Hans','',1595954052,1595954052),('Tanzania','cs','',1595954052,1595954052),('Tanzania','de','',1595954052,1595954052),('Tanzania','en','',1595954052,1595954052),('Tanzania','es','',1595954052,1595954052),('Tanzania','fa','',1595954052,1595954052),('Tanzania','fr','',1595954052,1595954052),('Tanzania','it','',1595954052,1595954052),('Tanzania','ja','',1595954052,1595954052),('Tanzania','nl','',1595954052,1595954052),('Tanzania','pl','',1595954052,1595954052),('Tanzania','pt_BR','',1595954052,1595954052),('Tanzania','ru','',1595954052,1595954052),('Tanzania','sk','',1595954052,1595954052),('Tanzania','sv','',1595954052,1595954052),('Tanzania','sv_FI','',1595954052,1595954052),('Tanzania','tr','',1595954052,1595954052),('Tanzania','uk','',1595954052,1595954052),('Tanzania','zh_Hans','',1595954052,1595954052),('Tavolette','cs','',1595922208,1595922208),('Tavolette','de','',1595922208,1595922208),('Tavolette','en','',1595922208,1595922208),('Tavolette','es','',1595922208,1595922208),('Tavolette','fa','',1595922208,1595922208),('Tavolette','fr','',1595922208,1595922208),('Tavolette','it','',1595922208,1595922208),('Tavolette','ja','',1595922208,1595922208),('Tavolette','nl','',1595922208,1595922208),('Tavolette','pl','',1595922208,1595922208),('Tavolette','pt_BR','',1595922208,1595922208),('Tavolette','ru','',1595922208,1595922208),('Tavolette','sk','',1595922208,1595922208),('Tavolette','sv','',1595922208,1595922208),('Tavolette','sv_FI','',1595922208,1595922208),('Tavolette','tr','',1595922208,1595922208),('Tavolette','uk','',1595922208,1595922208),('Tavolette','zh_Hans','',1595922208,1595922208),('Thailand','cs','',1595954052,1595954052),('Thailand','de','',1595954052,1595954052),('Thailand','en','',1595954052,1595954052),('Thailand','es','',1595954052,1595954052),('Thailand','fa','',1595954052,1595954052),('Thailand','fr','',1595954052,1595954052),('Thailand','it','',1595954052,1595954052),('Thailand','ja','',1595954052,1595954052),('Thailand','nl','',1595954052,1595954052),('Thailand','pl','',1595954052,1595954052),('Thailand','pt_BR','',1595954052,1595954052),('Thailand','ru','',1595954052,1595954052),('Thailand','sk','',1595954052,1595954052),('Thailand','sv','',1595954052,1595954052),('Thailand','sv_FI','',1595954052,1595954052),('Thailand','tr','',1595954052,1595954052),('Thailand','uk','',1595954052,1595954052),('Thailand','zh_Hans','',1595954052,1595954052),('Thursday','cs','',1595954198,1595954198),('Thursday','de','',1595954198,1595954198),('Thursday','en','',1595954198,1595954198),('Thursday','es','',1595954198,1595954198),('Thursday','fa','',1595954198,1595954198),('Thursday','fr','',1595954198,1595954198),('Thursday','it','',1595954198,1595954198),('Thursday','ja','',1595954198,1595954198),('Thursday','nl','',1595954198,1595954198),('Thursday','pl','',1595954198,1595954198),('Thursday','pt_BR','',1595954198,1595954198),('Thursday','ru','',1595954198,1595954198),('Thursday','sk','',1595954198,1595954198),('Thursday','sv','',1595954198,1595954198),('Thursday','sv_FI','',1595954198,1595954198),('Thursday','tr','',1595954198,1595954198),('Thursday','uk','',1595954198,1595954198),('Thursday','zh_Hans','',1595954198,1595954198),('Timor-Leste','cs','',1595954052,1595954052),('Timor-Leste','de','',1595954052,1595954052),('Timor-Leste','en','',1595954052,1595954052),('Timor-Leste','es','',1595954052,1595954052),('Timor-Leste','fa','',1595954052,1595954052),('Timor-Leste','fr','',1595954052,1595954052),('Timor-Leste','it','',1595954052,1595954052),('Timor-Leste','ja','',1595954052,1595954052),('Timor-Leste','nl','',1595954052,1595954052),('Timor-Leste','pl','',1595954052,1595954052),('Timor-Leste','pt_BR','',1595954052,1595954052),('Timor-Leste','ru','',1595954052,1595954052),('Timor-Leste','sk','',1595954052,1595954052),('Timor-Leste','sv','',1595954052,1595954052),('Timor-Leste','sv_FI','',1595954052,1595954052),('Timor-Leste','tr','',1595954052,1595954052),('Timor-Leste','uk','',1595954052,1595954052),('Timor-Leste','zh_Hans','',1595954052,1595954052),('Tisana','cs','',1595922208,1595922208),('Tisana','de','',1595922208,1595922208),('Tisana','en','',1595922208,1595922208),('Tisana','es','',1595922208,1595922208),('Tisana','fa','',1595922208,1595922208),('Tisana','fr','',1595922208,1595922208),('Tisana','it','',1595922208,1595922208),('Tisana','ja','',1595922208,1595922208),('Tisana','nl','',1595922208,1595922208),('Tisana','pl','',1595922208,1595922208),('Tisana','pt_BR','',1595922208,1595922208),('Tisana','ru','',1595922208,1595922208),('Tisana','sk','',1595922208,1595922208),('Tisana','sv','',1595922208,1595922208),('Tisana','sv_FI','',1595922208,1595922208),('Tisana','tr','',1595922208,1595922208),('Tisana','uk','',1595922208,1595922208),('Tisana','zh_Hans','',1595922208,1595922208),('Titolare','cs','',1595953778,1595953778),('Titolare','de','',1595953778,1595953778),('Titolare','en','',1595953778,1595953778),('Titolare','es','',1595953778,1595953778),('Titolare','fa','',1595953778,1595953778),('Titolare','fr','',1595953778,1595953778),('Titolare','it','',1595953778,1595953778),('Titolare','ja','',1595953778,1595953778),('Titolare','nl','',1595953778,1595953778),('Titolare','pl','',1595953778,1595953778),('Titolare','pt_BR','',1595953778,1595953778),('Titolare','ru','',1595953778,1595953778),('Titolare','sk','',1595953778,1595953778),('Titolare','sv','',1595953778,1595953778),('Titolare','sv_FI','',1595953778,1595953778),('Titolare','tr','',1595953778,1595953778),('Titolare','uk','',1595953778,1595953778),('Titolare','zh_Hans','',1595953778,1595953778),('Titolo','cs','',1595919837,1595919837),('Titolo','de','',1595919837,1595919837),('Titolo','en','',1595919837,1595919837),('Titolo','es','',1595919837,1595919837),('Titolo','fa','',1595919837,1595919837),('Titolo','fr','',1595919837,1595919837),('Titolo','it','',1595919837,1595919837),('Titolo','ja','',1595919837,1595919837),('Titolo','nl','',1595919837,1595919837),('Titolo','pl','',1595919837,1595919837),('Titolo','pt_BR','',1595919837,1595919837),('Titolo','ru','',1595919837,1595919837),('Titolo','sk','',1595919837,1595919837),('Titolo','sv','',1595919837,1595919837),('Titolo','sv_FI','',1595919837,1595919837),('Titolo','tr','',1595919837,1595919837),('Titolo','uk','',1595919837,1595919837),('Titolo','zh_Hans','',1595919837,1595919837),('Togo','cs','',1595954052,1595954052),('Togo','de','',1595954052,1595954052),('Togo','en','',1595954052,1595954052),('Togo','es','',1595954052,1595954052),('Togo','fa','',1595954052,1595954052),('Togo','fr','',1595954052,1595954052),('Togo','it','',1595954052,1595954052),('Togo','ja','',1595954052,1595954052),('Togo','nl','',1595954052,1595954052),('Togo','pl','',1595954052,1595954052),('Togo','pt_BR','',1595954052,1595954052),('Togo','ru','',1595954052,1595954052),('Togo','sk','',1595954052,1595954052),('Togo','sv','',1595954052,1595954052),('Togo','sv_FI','',1595954052,1595954052),('Togo','tr','',1595954052,1595954052),('Togo','uk','',1595954052,1595954052),('Togo','zh_Hans','',1595954052,1595954052),('Tokelau','cs','',1595954052,1595954052),('Tokelau','de','',1595954052,1595954052),('Tokelau','en','',1595954052,1595954052),('Tokelau','es','',1595954052,1595954052),('Tokelau','fa','',1595954052,1595954052),('Tokelau','fr','',1595954052,1595954052),('Tokelau','it','',1595954052,1595954052),('Tokelau','ja','',1595954052,1595954052),('Tokelau','nl','',1595954052,1595954052),('Tokelau','pl','',1595954052,1595954052),('Tokelau','pt_BR','',1595954052,1595954052),('Tokelau','ru','',1595954052,1595954052),('Tokelau','sk','',1595954052,1595954052),('Tokelau','sv','',1595954052,1595954052),('Tokelau','sv_FI','',1595954052,1595954052),('Tokelau','tr','',1595954052,1595954052),('Tokelau','uk','',1595954052,1595954052),('Tokelau','zh_Hans','',1595954052,1595954052),('Tonga','cs','',1595954052,1595954052),('Tonga','de','',1595954052,1595954052),('Tonga','en','',1595954052,1595954052),('Tonga','es','',1595954052,1595954052),('Tonga','fa','',1595954052,1595954052),('Tonga','fr','',1595954052,1595954052),('Tonga','it','',1595954052,1595954052),('Tonga','ja','',1595954052,1595954052),('Tonga','nl','',1595954052,1595954052),('Tonga','pl','',1595954052,1595954052),('Tonga','pt_BR','',1595954052,1595954052),('Tonga','ru','',1595954052,1595954052),('Tonga','sk','',1595954052,1595954052),('Tonga','sv','',1595954052,1595954052),('Tonga','sv_FI','',1595954052,1595954052),('Tonga','tr','',1595954052,1595954052),('Tonga','uk','',1595954052,1595954052),('Tonga','zh_Hans','',1595954052,1595954052),('Trinidad & Tobago','cs','',1595954052,1595954052),('Trinidad & Tobago','de','',1595954052,1595954052),('Trinidad & Tobago','en','',1595954052,1595954052),('Trinidad & Tobago','es','',1595954052,1595954052),('Trinidad & Tobago','fa','',1595954052,1595954052),('Trinidad & Tobago','fr','',1595954052,1595954052),('Trinidad & Tobago','it','',1595954052,1595954052),('Trinidad & Tobago','ja','',1595954052,1595954052),('Trinidad & Tobago','nl','',1595954052,1595954052),('Trinidad & Tobago','pl','',1595954052,1595954052),('Trinidad & Tobago','pt_BR','',1595954052,1595954052),('Trinidad & Tobago','ru','',1595954052,1595954052),('Trinidad & Tobago','sk','',1595954052,1595954052),('Trinidad & Tobago','sv','',1595954052,1595954052),('Trinidad & Tobago','sv_FI','',1595954052,1595954052),('Trinidad & Tobago','tr','',1595954052,1595954052),('Trinidad & Tobago','uk','',1595954052,1595954052),('Trinidad & Tobago','zh_Hans','',1595954052,1595954052),('Tristan da Cunha','cs','',1595954052,1595954052),('Tristan da Cunha','de','',1595954052,1595954052),('Tristan da Cunha','en','',1595954052,1595954052),('Tristan da Cunha','es','',1595954052,1595954052),('Tristan da Cunha','fa','',1595954052,1595954052),('Tristan da Cunha','fr','',1595954052,1595954052),('Tristan da Cunha','it','',1595954052,1595954052),('Tristan da Cunha','ja','',1595954052,1595954052),('Tristan da Cunha','nl','',1595954052,1595954052),('Tristan da Cunha','pl','',1595954052,1595954052),('Tristan da Cunha','pt_BR','',1595954052,1595954052),('Tristan da Cunha','ru','',1595954052,1595954052),('Tristan da Cunha','sk','',1595954052,1595954052),('Tristan da Cunha','sv','',1595954052,1595954052),('Tristan da Cunha','sv_FI','',1595954052,1595954052),('Tristan da Cunha','tr','',1595954052,1595954052),('Tristan da Cunha','uk','',1595954052,1595954052),('Tristan da Cunha','zh_Hans','',1595954052,1595954052),('Tuesday','cs','',1595954198,1595954198),('Tuesday','de','',1595954198,1595954198),('Tuesday','en','',1595954198,1595954198),('Tuesday','es','',1595954198,1595954198),('Tuesday','fa','',1595954198,1595954198),('Tuesday','fr','',1595954198,1595954198),('Tuesday','it','',1595954198,1595954198),('Tuesday','ja','',1595954198,1595954198),('Tuesday','nl','',1595954198,1595954198),('Tuesday','pl','',1595954198,1595954198),('Tuesday','pt_BR','',1595954198,1595954198),('Tuesday','ru','',1595954198,1595954198),('Tuesday','sk','',1595954198,1595954198),('Tuesday','sv','',1595954198,1595954198),('Tuesday','sv_FI','',1595954198,1595954198),('Tuesday','tr','',1595954198,1595954198),('Tuesday','uk','',1595954198,1595954198),('Tuesday','zh_Hans','',1595954198,1595954198),('Tunisia','cs','',1595954052,1595954052),('Tunisia','de','',1595954052,1595954052),('Tunisia','en','',1595954052,1595954052),('Tunisia','es','',1595954052,1595954052),('Tunisia','fa','',1595954052,1595954052),('Tunisia','fr','',1595954052,1595954052),('Tunisia','it','',1595954052,1595954052),('Tunisia','ja','',1595954052,1595954052),('Tunisia','nl','',1595954052,1595954052),('Tunisia','pl','',1595954052,1595954052),('Tunisia','pt_BR','',1595954052,1595954052),('Tunisia','ru','',1595954052,1595954052),('Tunisia','sk','',1595954052,1595954052),('Tunisia','sv','',1595954052,1595954052),('Tunisia','sv_FI','',1595954052,1595954052),('Tunisia','tr','',1595954052,1595954052),('Tunisia','uk','',1595954052,1595954052),('Tunisia','zh_Hans','',1595954052,1595954052),('Turkey','cs','',1595954052,1595954052),('Turkey','de','',1595954052,1595954052),('Turkey','en','',1595954052,1595954052),('Turkey','es','',1595954052,1595954052),('Turkey','fa','',1595954052,1595954052),('Turkey','fr','',1595954052,1595954052),('Turkey','it','',1595954052,1595954052),('Turkey','ja','',1595954052,1595954052),('Turkey','nl','',1595954052,1595954052),('Turkey','pl','',1595954052,1595954052),('Turkey','pt_BR','',1595954052,1595954052),('Turkey','ru','',1595954052,1595954052),('Turkey','sk','',1595954052,1595954052),('Turkey','sv','',1595954052,1595954052),('Turkey','sv_FI','',1595954052,1595954052),('Turkey','tr','',1595954052,1595954052),('Turkey','uk','',1595954052,1595954052),('Turkey','zh_Hans','',1595954052,1595954052),('Turkmenistan','cs','',1595954052,1595954052),('Turkmenistan','de','',1595954052,1595954052),('Turkmenistan','en','',1595954052,1595954052),('Turkmenistan','es','',1595954052,1595954052),('Turkmenistan','fa','',1595954052,1595954052),('Turkmenistan','fr','',1595954052,1595954052),('Turkmenistan','it','',1595954052,1595954052),('Turkmenistan','ja','',1595954052,1595954052),('Turkmenistan','nl','',1595954052,1595954052),('Turkmenistan','pl','',1595954052,1595954052),('Turkmenistan','pt_BR','',1595954052,1595954052),('Turkmenistan','ru','',1595954052,1595954052),('Turkmenistan','sk','',1595954052,1595954052),('Turkmenistan','sv','',1595954052,1595954052),('Turkmenistan','sv_FI','',1595954052,1595954052),('Turkmenistan','tr','',1595954052,1595954052),('Turkmenistan','uk','',1595954052,1595954052),('Turkmenistan','zh_Hans','',1595954052,1595954052),('Turks & Caicos Islands','cs','',1595954052,1595954052),('Turks & Caicos Islands','de','',1595954052,1595954052),('Turks & Caicos Islands','en','',1595954052,1595954052),('Turks & Caicos Islands','es','',1595954052,1595954052),('Turks & Caicos Islands','fa','',1595954052,1595954052),('Turks & Caicos Islands','fr','',1595954052,1595954052),('Turks & Caicos Islands','it','',1595954052,1595954052),('Turks & Caicos Islands','ja','',1595954052,1595954052),('Turks & Caicos Islands','nl','',1595954052,1595954052),('Turks & Caicos Islands','pl','',1595954052,1595954052),('Turks & Caicos Islands','pt_BR','',1595954052,1595954052),('Turks & Caicos Islands','ru','',1595954052,1595954052),('Turks & Caicos Islands','sk','',1595954052,1595954052),('Turks & Caicos Islands','sv','',1595954052,1595954052),('Turks & Caicos Islands','sv_FI','',1595954052,1595954052),('Turks & Caicos Islands','tr','',1595954052,1595954052),('Turks & Caicos Islands','uk','',1595954052,1595954052),('Turks & Caicos Islands','zh_Hans','',1595954052,1595954052),('Tuvalu','cs','',1595954052,1595954052),('Tuvalu','de','',1595954052,1595954052),('Tuvalu','en','',1595954052,1595954052),('Tuvalu','es','',1595954052,1595954052),('Tuvalu','fa','',1595954052,1595954052),('Tuvalu','fr','',1595954052,1595954052),('Tuvalu','it','',1595954052,1595954052),('Tuvalu','ja','',1595954052,1595954052),('Tuvalu','nl','',1595954052,1595954052),('Tuvalu','pl','',1595954052,1595954052),('Tuvalu','pt_BR','',1595954052,1595954052),('Tuvalu','ru','',1595954052,1595954052),('Tuvalu','sk','',1595954052,1595954052),('Tuvalu','sv','',1595954052,1595954052),('Tuvalu','sv_FI','',1595954052,1595954052),('Tuvalu','tr','',1595954052,1595954052),('Tuvalu','uk','',1595954052,1595954052),('Tuvalu','zh_Hans','',1595954052,1595954052),('U.S. Outlying Islands','cs','',1595954052,1595954052),('U.S. Outlying Islands','de','',1595954052,1595954052),('U.S. Outlying Islands','en','',1595954052,1595954052),('U.S. Outlying Islands','es','',1595954052,1595954052),('U.S. Outlying Islands','fa','',1595954052,1595954052),('U.S. Outlying Islands','fr','',1595954052,1595954052),('U.S. Outlying Islands','it','',1595954052,1595954052),('U.S. Outlying Islands','ja','',1595954052,1595954052),('U.S. Outlying Islands','nl','',1595954052,1595954052),('U.S. Outlying Islands','pl','',1595954052,1595954052),('U.S. Outlying Islands','pt_BR','',1595954052,1595954052),('U.S. Outlying Islands','ru','',1595954052,1595954052),('U.S. Outlying Islands','sk','',1595954052,1595954052),('U.S. Outlying Islands','sv','',1595954052,1595954052),('U.S. Outlying Islands','sv_FI','',1595954052,1595954052),('U.S. Outlying Islands','tr','',1595954052,1595954052),('U.S. Outlying Islands','uk','',1595954052,1595954052),('U.S. Outlying Islands','zh_Hans','',1595954052,1595954052),('U.S. Virgin Islands','cs','',1595954052,1595954052),('U.S. Virgin Islands','de','',1595954052,1595954052),('U.S. Virgin Islands','en','',1595954052,1595954052),('U.S. Virgin Islands','es','',1595954052,1595954052),('U.S. Virgin Islands','fa','',1595954052,1595954052),('U.S. Virgin Islands','fr','',1595954052,1595954052),('U.S. Virgin Islands','it','',1595954052,1595954052),('U.S. Virgin Islands','ja','',1595954052,1595954052),('U.S. Virgin Islands','nl','',1595954052,1595954052),('U.S. Virgin Islands','pl','',1595954052,1595954052),('U.S. Virgin Islands','pt_BR','',1595954052,1595954052),('U.S. Virgin Islands','ru','',1595954052,1595954052),('U.S. Virgin Islands','sk','',1595954052,1595954052),('U.S. Virgin Islands','sv','',1595954052,1595954052),('U.S. Virgin Islands','sv_FI','',1595954052,1595954052),('U.S. Virgin Islands','tr','',1595954052,1595954052),('U.S. Virgin Islands','uk','',1595954052,1595954052),('U.S. Virgin Islands','zh_Hans','',1595954052,1595954052),('Uganda','cs','',1595954052,1595954052),('Uganda','de','',1595954052,1595954052),('Uganda','en','',1595954052,1595954052),('Uganda','es','',1595954052,1595954052),('Uganda','fa','',1595954052,1595954052),('Uganda','fr','',1595954052,1595954052),('Uganda','it','',1595954052,1595954052),('Uganda','ja','',1595954052,1595954052),('Uganda','nl','',1595954052,1595954052),('Uganda','pl','',1595954052,1595954052),('Uganda','pt_BR','',1595954052,1595954052),('Uganda','ru','',1595954052,1595954052),('Uganda','sk','',1595954052,1595954052),('Uganda','sv','',1595954052,1595954052),('Uganda','sv_FI','',1595954052,1595954052),('Uganda','tr','',1595954052,1595954052),('Uganda','uk','',1595954052,1595954052),('Uganda','zh_Hans','',1595954052,1595954052),('Ukraine','cs','',1595954052,1595954052),('Ukraine','de','',1595954052,1595954052),('Ukraine','en','',1595954052,1595954052),('Ukraine','es','',1595954052,1595954052),('Ukraine','fa','',1595954052,1595954052),('Ukraine','fr','',1595954052,1595954052),('Ukraine','it','',1595954052,1595954052),('Ukraine','ja','',1595954052,1595954052),('Ukraine','nl','',1595954052,1595954052),('Ukraine','pl','',1595954052,1595954052),('Ukraine','pt_BR','',1595954052,1595954052),('Ukraine','ru','',1595954052,1595954052),('Ukraine','sk','',1595954052,1595954052),('Ukraine','sv','',1595954052,1595954052),('Ukraine','sv_FI','',1595954052,1595954052),('Ukraine','tr','',1595954052,1595954052),('Ukraine','uk','',1595954052,1595954052),('Ukraine','zh_Hans','',1595954052,1595954052),('Unguento','cs','',1595922208,1595922208),('Unguento','de','',1595922208,1595922208),('Unguento','en','',1595922208,1595922208),('Unguento','es','',1595922208,1595922208),('Unguento','fa','',1595922208,1595922208),('Unguento','fr','',1595922208,1595922208),('Unguento','it','',1595922208,1595922208),('Unguento','ja','',1595922208,1595922208),('Unguento','nl','',1595922208,1595922208),('Unguento','pl','',1595922208,1595922208),('Unguento','pt_BR','',1595922208,1595922208),('Unguento','ru','',1595922208,1595922208),('Unguento','sk','',1595922208,1595922208),('Unguento','sv','',1595922208,1595922208),('Unguento','sv_FI','',1595922208,1595922208),('Unguento','tr','',1595922208,1595922208),('Unguento','uk','',1595922208,1595922208),('Unguento','zh_Hans','',1595922208,1595922208),('United Arab Emirates','cs','',1595954053,1595954053),('United Arab Emirates','de','',1595954053,1595954053),('United Arab Emirates','en','',1595954053,1595954053),('United Arab Emirates','es','',1595954053,1595954053),('United Arab Emirates','fa','',1595954053,1595954053),('United Arab Emirates','fr','',1595954053,1595954053),('United Arab Emirates','it','',1595954053,1595954053),('United Arab Emirates','ja','',1595954053,1595954053),('United Arab Emirates','nl','',1595954053,1595954053),('United Arab Emirates','pl','',1595954053,1595954053),('United Arab Emirates','pt_BR','',1595954053,1595954053),('United Arab Emirates','ru','',1595954053,1595954053),('United Arab Emirates','sk','',1595954053,1595954053),('United Arab Emirates','sv','',1595954053,1595954053),('United Arab Emirates','sv_FI','',1595954053,1595954053),('United Arab Emirates','tr','',1595954053,1595954053),('United Arab Emirates','uk','',1595954053,1595954053),('United Arab Emirates','zh_Hans','',1595954053,1595954053),('United Kingdom','cs','',1595954053,1595954053),('United Kingdom','de','',1595954053,1595954053),('United Kingdom','en','',1595954053,1595954053),('United Kingdom','es','',1595954053,1595954053),('United Kingdom','fa','',1595954053,1595954053),('United Kingdom','fr','',1595954053,1595954053),('United Kingdom','it','',1595954053,1595954053),('United Kingdom','ja','',1595954053,1595954053),('United Kingdom','nl','',1595954053,1595954053),('United Kingdom','pl','',1595954053,1595954053),('United Kingdom','pt_BR','',1595954053,1595954053),('United Kingdom','ru','',1595954053,1595954053),('United Kingdom','sk','',1595954053,1595954053),('United Kingdom','sv','',1595954053,1595954053),('United Kingdom','sv_FI','',1595954053,1595954053),('United Kingdom','tr','',1595954053,1595954053),('United Kingdom','uk','',1595954053,1595954053),('United Kingdom','zh_Hans','',1595954053,1595954053),('United States','cs','',1595954053,1595954053),('United States','de','',1595954053,1595954053),('United States','en','',1595954053,1595954053),('United States','es','',1595954053,1595954053),('United States','fa','',1595954053,1595954053),('United States','fr','',1595954053,1595954053),('United States','it','',1595954053,1595954053),('United States','ja','',1595954053,1595954053),('United States','nl','',1595954053,1595954053),('United States','pl','',1595954053,1595954053),('United States','pt_BR','',1595954053,1595954053),('United States','ru','',1595954053,1595954053),('United States','sk','',1595954053,1595954053),('United States','sv','',1595954053,1595954053),('United States','sv_FI','',1595954053,1595954053),('United States','tr','',1595954053,1595954053),('United States','uk','',1595954053,1595954053),('United States','zh_Hans','',1595954053,1595954053),('Uruguay','cs','',1595954053,1595954053),('Uruguay','de','',1595954053,1595954053),('Uruguay','en','',1595954053,1595954053),('Uruguay','es','',1595954053,1595954053),('Uruguay','fa','',1595954053,1595954053),('Uruguay','fr','',1595954053,1595954053),('Uruguay','it','',1595954053,1595954053),('Uruguay','ja','',1595954053,1595954053),('Uruguay','nl','',1595954053,1595954053),('Uruguay','pl','',1595954053,1595954053),('Uruguay','pt_BR','',1595954053,1595954053),('Uruguay','ru','',1595954053,1595954053),('Uruguay','sk','',1595954053,1595954053),('Uruguay','sv','',1595954053,1595954053),('Uruguay','sv_FI','',1595954053,1595954053),('Uruguay','tr','',1595954053,1595954053),('Uruguay','uk','',1595954053,1595954053),('Uruguay','zh_Hans','',1595954053,1595954053),('Uso professionale','cs','',1595922208,1595922208),('Uso professionale','de','',1595922208,1595922208),('Uso professionale','en','',1595922208,1595922208),('Uso professionale','es','',1595922208,1595922208),('Uso professionale','fa','',1595922208,1595922208),('Uso professionale','fr','',1595922208,1595922208),('Uso professionale','it','',1595922208,1595922208),('Uso professionale','ja','',1595922208,1595922208),('Uso professionale','nl','',1595922208,1595922208),('Uso professionale','pl','',1595922208,1595922208),('Uso professionale','pt_BR','',1595922208,1595922208),('Uso professionale','ru','',1595922208,1595922208),('Uso professionale','sk','',1595922208,1595922208),('Uso professionale','sv','',1595922208,1595922208),('Uso professionale','sv_FI','',1595922208,1595922208),('Uso professionale','tr','',1595922208,1595922208),('Uso professionale','uk','',1595922208,1595922208),('Uso professionale','zh_Hans','',1595922208,1595922208),('Uzbekistan','cs','',1595954053,1595954053),('Uzbekistan','de','',1595954053,1595954053),('Uzbekistan','en','',1595954053,1595954053),('Uzbekistan','es','',1595954053,1595954053),('Uzbekistan','fa','',1595954053,1595954053),('Uzbekistan','fr','',1595954053,1595954053),('Uzbekistan','it','',1595954053,1595954053),('Uzbekistan','ja','',1595954053,1595954053),('Uzbekistan','nl','',1595954053,1595954053),('Uzbekistan','pl','',1595954053,1595954053),('Uzbekistan','pt_BR','',1595954053,1595954053),('Uzbekistan','ru','',1595954053,1595954053),('Uzbekistan','sk','',1595954053,1595954053),('Uzbekistan','sv','',1595954053,1595954053),('Uzbekistan','sv_FI','',1595954053,1595954053),('Uzbekistan','tr','',1595954053,1595954053),('Uzbekistan','uk','',1595954053,1595954053),('Uzbekistan','zh_Hans','',1595954053,1595954053),('Vanuatu','cs','',1595954053,1595954053),('Vanuatu','de','',1595954053,1595954053),('Vanuatu','en','',1595954053,1595954053),('Vanuatu','es','',1595954053,1595954053),('Vanuatu','fa','',1595954053,1595954053),('Vanuatu','fr','',1595954053,1595954053),('Vanuatu','it','',1595954053,1595954053),('Vanuatu','ja','',1595954053,1595954053),('Vanuatu','nl','',1595954053,1595954053),('Vanuatu','pl','',1595954053,1595954053),('Vanuatu','pt_BR','',1595954053,1595954053),('Vanuatu','ru','',1595954053,1595954053),('Vanuatu','sk','',1595954053,1595954053),('Vanuatu','sv','',1595954053,1595954053),('Vanuatu','sv_FI','',1595954053,1595954053),('Vanuatu','tr','',1595954053,1595954053),('Vanuatu','uk','',1595954053,1595954053),('Vanuatu','zh_Hans','',1595954053,1595954053),('Vatican City','cs','',1595954053,1595954053),('Vatican City','de','',1595954053,1595954053),('Vatican City','en','',1595954053,1595954053),('Vatican City','es','',1595954053,1595954053),('Vatican City','fa','',1595954053,1595954053),('Vatican City','fr','',1595954053,1595954053),('Vatican City','it','',1595954053,1595954053),('Vatican City','ja','',1595954053,1595954053),('Vatican City','nl','',1595954053,1595954053),('Vatican City','pl','',1595954053,1595954053),('Vatican City','pt_BR','',1595954053,1595954053),('Vatican City','ru','',1595954053,1595954053),('Vatican City','sk','',1595954053,1595954053),('Vatican City','sv','',1595954053,1595954053),('Vatican City','sv_FI','',1595954053,1595954053),('Vatican City','tr','',1595954053,1595954053),('Vatican City','uk','',1595954053,1595954053),('Vatican City','zh_Hans','',1595954053,1595954053),('Venezuela','cs','',1595954053,1595954053),('Venezuela','de','',1595954053,1595954053),('Venezuela','en','',1595954053,1595954053),('Venezuela','es','',1595954053,1595954053),('Venezuela','fa','',1595954053,1595954053),('Venezuela','fr','',1595954053,1595954053),('Venezuela','it','',1595954053,1595954053),('Venezuela','ja','',1595954053,1595954053),('Venezuela','nl','',1595954053,1595954053),('Venezuela','pl','',1595954053,1595954053),('Venezuela','pt_BR','',1595954053,1595954053),('Venezuela','ru','',1595954053,1595954053),('Venezuela','sk','',1595954053,1595954053),('Venezuela','sv','',1595954053,1595954053),('Venezuela','sv_FI','',1595954053,1595954053),('Venezuela','tr','',1595954053,1595954053),('Venezuela','uk','',1595954053,1595954053),('Venezuela','zh_Hans','',1595954053,1595954053),('Via','cs','',1595953867,1595953867),('Via','de','',1595953867,1595953867),('Via','en','',1595953867,1595953867),('Via','es','',1595953867,1595953867),('Via','fa','',1595953867,1595953867),('Via','fr','',1595953867,1595953867),('Via','it','',1595953867,1595953867),('Via','ja','',1595953867,1595953867),('Via','nl','',1595953867,1595953867),('Via','pl','',1595953867,1595953867),('Via','pt_BR','',1595953867,1595953867),('Via','ru','',1595953867,1595953867),('Via','sk','',1595953867,1595953867),('Via','sv','',1595953867,1595953867),('Via','sv_FI','',1595953867,1595953867),('Via','tr','',1595953867,1595953867),('Via','uk','',1595953867,1595953867),('Via','zh_Hans','',1595953867,1595953867),('Videocorso','cs','',1595922208,1595922208),('Videocorso','de','',1595922208,1595922208),('Videocorso','en','',1595922208,1595922208),('Videocorso','es','',1595922208,1595922208),('Videocorso','fa','',1595922208,1595922208),('Videocorso','fr','',1595922208,1595922208),('Videocorso','it','',1595922208,1595922208),('Videocorso','ja','',1595922208,1595922208),('Videocorso','nl','',1595922208,1595922208),('Videocorso','pl','',1595922208,1595922208),('Videocorso','pt_BR','',1595922208,1595922208),('Videocorso','ru','',1595922208,1595922208),('Videocorso','sk','',1595922208,1595922208),('Videocorso','sv','',1595922208,1595922208),('Videocorso','sv_FI','',1595922208,1595922208),('Videocorso','tr','',1595922208,1595922208),('Videocorso','uk','',1595922208,1595922208),('Videocorso','zh_Hans','',1595922208,1595922208),('Vietnam','cs','',1595954053,1595954053),('Vietnam','de','',1595954053,1595954053),('Vietnam','en','',1595954053,1595954053),('Vietnam','es','',1595954053,1595954053),('Vietnam','fa','',1595954053,1595954053),('Vietnam','fr','',1595954053,1595954053),('Vietnam','it','',1595954053,1595954053),('Vietnam','ja','',1595954053,1595954053),('Vietnam','nl','',1595954053,1595954053),('Vietnam','pl','',1595954053,1595954053),('Vietnam','pt_BR','',1595954053,1595954053),('Vietnam','ru','',1595954053,1595954053),('Vietnam','sk','',1595954053,1595954053),('Vietnam','sv','',1595954053,1595954053),('Vietnam','sv_FI','',1595954053,1595954053),('Vietnam','tr','',1595954053,1595954053),('Vietnam','uk','',1595954053,1595954053),('Vietnam','zh_Hans','',1595954053,1595954053),('Wallis & Futuna','cs','',1595954054,1595954054),('Wallis & Futuna','de','',1595954054,1595954054),('Wallis & Futuna','en','',1595954054,1595954054),('Wallis & Futuna','es','',1595954054,1595954054),('Wallis & Futuna','fa','',1595954054,1595954054),('Wallis & Futuna','fr','',1595954054,1595954054),('Wallis & Futuna','it','',1595954054,1595954054),('Wallis & Futuna','ja','',1595954054,1595954054),('Wallis & Futuna','nl','',1595954054,1595954054),('Wallis & Futuna','pl','',1595954054,1595954054),('Wallis & Futuna','pt_BR','',1595954054,1595954054),('Wallis & Futuna','ru','',1595954054,1595954054),('Wallis & Futuna','sk','',1595954054,1595954054),('Wallis & Futuna','sv','',1595954054,1595954054),('Wallis & Futuna','sv_FI','',1595954054,1595954054),('Wallis & Futuna','tr','',1595954054,1595954054),('Wallis & Futuna','uk','',1595954054,1595954054),('Wallis & Futuna','zh_Hans','',1595954054,1595954054),('Wednesday','cs','',1595954198,1595954198),('Wednesday','de','',1595954198,1595954198),('Wednesday','en','',1595954198,1595954198),('Wednesday','es','',1595954198,1595954198),('Wednesday','fa','',1595954198,1595954198),('Wednesday','fr','',1595954198,1595954198),('Wednesday','it','',1595954198,1595954198),('Wednesday','ja','',1595954198,1595954198),('Wednesday','nl','',1595954198,1595954198),('Wednesday','pl','',1595954198,1595954198),('Wednesday','pt_BR','',1595954198,1595954198),('Wednesday','ru','',1595954198,1595954198),('Wednesday','sk','',1595954198,1595954198),('Wednesday','sv','',1595954198,1595954198),('Wednesday','sv_FI','',1595954198,1595954198),('Wednesday','tr','',1595954198,1595954198),('Wednesday','uk','',1595954198,1595954198),('Wednesday','zh_Hans','',1595954198,1595954198),('Western Sahara','cs','',1595954054,1595954054),('Western Sahara','de','',1595954054,1595954054),('Western Sahara','en','',1595954054,1595954054),('Western Sahara','es','',1595954054,1595954054),('Western Sahara','fa','',1595954054,1595954054),('Western Sahara','fr','',1595954054,1595954054),('Western Sahara','it','',1595954054,1595954054),('Western Sahara','ja','',1595954054,1595954054),('Western Sahara','nl','',1595954054,1595954054),('Western Sahara','pl','',1595954054,1595954054),('Western Sahara','pt_BR','',1595954054,1595954054),('Western Sahara','ru','',1595954054,1595954054),('Western Sahara','sk','',1595954054,1595954054),('Western Sahara','sv','',1595954054,1595954054),('Western Sahara','sv_FI','',1595954054,1595954054),('Western Sahara','tr','',1595954054,1595954054),('Western Sahara','uk','',1595954054,1595954054),('Western Sahara','zh_Hans','',1595954054,1595954054),('XLSX Export','cs','',1595918163,1595918163),('XLSX Export','de','',1595918163,1595918163),('XLSX Export','en','',1595918163,1595918163),('XLSX Export','es','',1595918163,1595918163),('XLSX Export','fa','',1595918163,1595918163),('XLSX Export','fr','',1595918163,1595918163),('XLSX Export','it','',1595918163,1595918163),('XLSX Export','ja','',1595918163,1595918163),('XLSX Export','nl','',1595918163,1595918163),('XLSX Export','pl','',1595918163,1595918163),('XLSX Export','pt_BR','',1595918163,1595918163),('XLSX Export','ru','',1595918163,1595918163),('XLSX Export','sk','',1595918163,1595918163),('XLSX Export','sv','',1595918163,1595918163),('XLSX Export','sv_FI','',1595918163,1595918163),('XLSX Export','tr','',1595918163,1595918163),('XLSX Export','uk','',1595918163,1595918163),('XLSX Export','zh_Hans','',1595918163,1595918163),('Yemen','cs','',1595954054,1595954054),('Yemen','de','',1595954054,1595954054),('Yemen','en','',1595954054,1595954054),('Yemen','es','',1595954054,1595954054),('Yemen','fa','',1595954054,1595954054),('Yemen','fr','',1595954054,1595954054),('Yemen','it','',1595954054,1595954054),('Yemen','ja','',1595954054,1595954054),('Yemen','nl','',1595954054,1595954054),('Yemen','pl','',1595954054,1595954054),('Yemen','pt_BR','',1595954054,1595954054),('Yemen','ru','',1595954054,1595954054),('Yemen','sk','',1595954054,1595954054),('Yemen','sv','',1595954054,1595954054),('Yemen','sv_FI','',1595954054,1595954054),('Yemen','tr','',1595954054,1595954054),('Yemen','uk','',1595954054,1595954054),('Yemen','zh_Hans','',1595954054,1595954054),('Zambia','cs','',1595954054,1595954054),('Zambia','de','',1595954054,1595954054),('Zambia','en','',1595954054,1595954054),('Zambia','es','',1595954054,1595954054),('Zambia','fa','',1595954054,1595954054),('Zambia','fr','',1595954054,1595954054),('Zambia','it','',1595954054,1595954054),('Zambia','ja','',1595954054,1595954054),('Zambia','nl','',1595954054,1595954054),('Zambia','pl','',1595954054,1595954054),('Zambia','pt_BR','',1595954054,1595954054),('Zambia','ru','',1595954054,1595954054),('Zambia','sk','',1595954054,1595954054),('Zambia','sv','',1595954054,1595954054),('Zambia','sv_FI','',1595954054,1595954054),('Zambia','tr','',1595954054,1595954054),('Zambia','uk','',1595954054,1595954054),('Zambia','zh_Hans','',1595954054,1595954054),('Zimbabwe','cs','',1595954054,1595954054),('Zimbabwe','de','',1595954054,1595954054),('Zimbabwe','en','',1595954054,1595954054),('Zimbabwe','es','',1595954054,1595954054),('Zimbabwe','fa','',1595954054,1595954054),('Zimbabwe','fr','',1595954054,1595954054),('Zimbabwe','it','',1595954054,1595954054),('Zimbabwe','ja','',1595954054,1595954054),('Zimbabwe','nl','',1595954054,1595954054),('Zimbabwe','pl','',1595954054,1595954054),('Zimbabwe','pt_BR','',1595954054,1595954054),('Zimbabwe','ru','',1595954054,1595954054),('Zimbabwe','sk','',1595954054,1595954054),('Zimbabwe','sv','',1595954054,1595954054),('Zimbabwe','sv_FI','',1595954054,1595954054),('Zimbabwe','tr','',1595954054,1595954054),('Zimbabwe','uk','',1595954054,1595954054),('Zimbabwe','zh_Hans','',1595954054,1595954054),('aaa','cs','',1607155069,1607155069),('aaa','de','',1607155069,1607155069),('aaa','en','',1607155069,1607155069),('aaa','es','',1607155069,1607155069),('aaa','fa','',1607155069,1607155069),('aaa','fr','',1607155069,1607155069),('aaa','it','',1607155069,1607155069),('aaa','ja','',1607155069,1607155069),('aaa','nl','',1607155069,1607155069),('aaa','pl','',1607155069,1607155069),('aaa','pt_BR','',1607155069,1607155069),('aaa','ru','',1607155069,1607155069),('aaa','sk','',1607155069,1607155069),('aaa','sv','',1607155069,1607155069),('aaa','sv_FI','',1607155069,1607155069),('aaa','tr','',1607155069,1607155069),('aaa','uk','',1607155069,1607155069),('aaa','zh_Hans','',1607155069,1607155069),('avvertenze_web','cs','',1595919837,1595919837),('avvertenze_web','de','',1595919837,1595919837),('avvertenze_web','en','',1595919837,1595919837),('avvertenze_web','es','',1595919837,1595919837),('avvertenze_web','fa','',1595919837,1595919837),('avvertenze_web','fr','',1595919837,1595919837),('avvertenze_web','it','',1595919837,1595919837),('avvertenze_web','ja','',1595919837,1595919837),('avvertenze_web','nl','',1595919837,1595919837),('avvertenze_web','pl','',1595919837,1595919837),('avvertenze_web','pt_BR','',1595919837,1595919837),('avvertenze_web','ru','',1595919837,1595919837),('avvertenze_web','sk','',1595919837,1595919837),('avvertenze_web','sv','',1595919837,1595919837),('avvertenze_web','sv_FI','',1595919837,1595919837),('avvertenze_web','tr','',1595919837,1595919837),('avvertenze_web','uk','',1595919837,1595919837),('avvertenze_web','zh_Hans','',1595919837,1595919837),('booleanSelect','cs','',1607172299,1607172299),('booleanSelect','de','',1607172299,1607172299),('booleanSelect','en','',1607172299,1607172299),('booleanSelect','es','',1607172299,1607172299),('booleanSelect','fa','',1607172299,1607172299),('booleanSelect','fr','',1607172299,1607172299),('booleanSelect','it','',1607172299,1607172299),('booleanSelect','ja','',1607172299,1607172299),('booleanSelect','nl','',1607172299,1607172299),('booleanSelect','pl','',1607172299,1607172299),('booleanSelect','pt_BR','',1607172299,1607172299),('booleanSelect','ru','',1607172299,1607172299),('booleanSelect','sk','',1607172299,1607172299),('booleanSelect','sv','',1607172299,1607172299),('booleanSelect','sv_FI','',1607172299,1607172299),('booleanSelect','tr','',1607172299,1607172299),('booleanSelect','uk','',1607172299,1607172299),('booleanSelect','zh_Hans','',1607172299,1607172299),('bottom','cs','',1595918222,1595918222),('bottom','de','',1595918222,1595918222),('bottom','en','',1595918222,1595918222),('bottom','es','',1595918222,1595918222),('bottom','fa','',1595918222,1595918222),('bottom','fr','',1595918222,1595918222),('bottom','it','',1595918222,1595918222),('bottom','ja','',1595918222,1595918222),('bottom','nl','',1595918222,1595918222),('bottom','pl','',1595918222,1595918222),('bottom','pt_BR','',1595918222,1595918222),('bottom','ru','',1595918222,1595918222),('bottom','sk','',1595918222,1595918222),('bottom','sv','',1595918222,1595918222),('bottom','sv_FI','',1595918222,1595918222),('bottom','tr','',1595918222,1595918222),('bottom','uk','',1595918222,1595918222),('bottom','zh_Hans','',1595918222,1595918222),('box_price','cs','',1595919837,1595919837),('box_price','de','',1595919837,1595919837),('box_price','en','',1595919837,1595919837),('box_price','es','',1595919837,1595919837),('box_price','fa','',1595919837,1595919837),('box_price','fr','',1595919837,1595919837),('box_price','it','',1595919837,1595919837),('box_price','ja','',1595919837,1595919837),('box_price','nl','',1595919837,1595919837),('box_price','pl','',1595919837,1595919837),('box_price','pt_BR','',1595919837,1595919837),('box_price','ru','',1595919837,1595919837),('box_price','sk','',1595919837,1595919837),('box_price','sv','',1595919837,1595919837),('box_price','sv_FI','',1595919837,1595919837),('box_price','tr','',1595919837,1595919837),('box_price','uk','',1595919837,1595919837),('box_price','zh_Hans','',1595919837,1595919837),('centimeters','cs','',1607157340,1607157340),('centimeters','de','',1607157340,1607157340),('centimeters','en','',1607157340,1607157340),('centimeters','es','',1607157340,1607157340),('centimeters','fa','',1607157340,1607157340),('centimeters','fr','',1607157340,1607157340),('centimeters','it','',1607157340,1607157340),('centimeters','ja','',1607157340,1607157340),('centimeters','nl','',1607157340,1607157340),('centimeters','pl','',1607157340,1607157340),('centimeters','pt_BR','',1607157340,1607157340),('centimeters','ru','',1607157340,1607157340),('centimeters','sk','',1607157340,1607157340),('centimeters','sv','',1607157340,1607157340),('centimeters','sv_FI','',1607157340,1607157340),('centimeters','tr','',1607157340,1607157340),('centimeters','uk','',1607157340,1607157340),('centimeters','zh_Hans','',1607157340,1607157340),('cgsdg','cs','',1596017863,1596017863),('cgsdg','de','',1596017863,1596017863),('cgsdg','en','',1596017863,1596017863),('cgsdg','es','',1596017863,1596017863),('cgsdg','fa','',1596017863,1596017863),('cgsdg','fr','',1596017863,1596017863),('cgsdg','it','',1596017863,1596017863),('cgsdg','ja','',1596017863,1596017863),('cgsdg','nl','',1596017863,1596017863),('cgsdg','pl','',1596017863,1596017863),('cgsdg','pt_BR','',1596017863,1596017863),('cgsdg','ru','',1596017863,1596017863),('cgsdg','sk','',1596017863,1596017863),('cgsdg','sv','',1596017863,1596017863),('cgsdg','sv_FI','',1596017863,1596017863),('cgsdg','tr','',1596017863,1596017863),('cgsdg','uk','',1596017863,1596017863),('cgsdg','zh_Hans','',1596017863,1596017863),('classname','cs','',1595923617,1595923617),('classname','de','',1595923617,1595923617),('classname','en','',1595923617,1595923617),('classname','es','',1595923617,1595923617),('classname','fa','',1595923617,1595923617),('classname','fr','',1595923617,1595923617),('classname','it','',1595923617,1595923617),('classname','ja','',1595923617,1595923617),('classname','nl','',1595923617,1595923617),('classname','pl','',1595923617,1595923617),('classname','pt_BR','',1595923617,1595923617),('classname','ru','',1595923617,1595923617),('classname','sk','',1595923617,1595923617),('classname','sv','',1595923617,1595923617),('classname','sv_FI','',1595923617,1595923617),('classname','tr','',1595923617,1595923617),('classname','uk','',1595923617,1595923617),('classname','zh_Hans','',1595923617,1595923617),('cm','cs','',1607157327,1607157327),('cm','de','',1607157327,1607157327),('cm','en','',1607157327,1607157327),('cm','es','',1607157327,1607157327),('cm','fa','',1607157327,1607157327),('cm','fr','',1607157327,1607157327),('cm','it','',1607157327,1607157327),('cm','ja','',1607157327,1607157327),('cm','nl','',1607157327,1607157327),('cm','pl','',1607157327,1607157327),('cm','pt_BR','',1607157327,1607157327),('cm','ru','',1607157327,1607157327),('cm','sk','',1607157327,1607157327),('cm','sv','',1607157327,1607157327),('cm','sv_FI','',1607157327,1607157327),('cm','tr','',1607157327,1607157327),('cm','uk','',1607157327,1607157327),('cm','zh_Hans','',1607157327,1607157327),('coreshop_embedded_class','cs','',1595918222,1595918222),('coreshop_embedded_class','de','',1595918222,1595918222),('coreshop_embedded_class','en','',1595918222,1595918222),('coreshop_embedded_class','es','',1595918222,1595918222),('coreshop_embedded_class','fa','',1595918222,1595918222),('coreshop_embedded_class','fr','',1595918222,1595918222),('coreshop_embedded_class','it','',1595918222,1595918222),('coreshop_embedded_class','ja','',1595918222,1595918222),('coreshop_embedded_class','nl','',1595918222,1595918222),('coreshop_embedded_class','pl','',1595918222,1595918222),('coreshop_embedded_class','pt_BR','',1595918222,1595918222),('coreshop_embedded_class','ru','',1595918222,1595918222),('coreshop_embedded_class','sk','',1595918222,1595918222),('coreshop_embedded_class','sv','',1595918222,1595918222),('coreshop_embedded_class','sv_FI','',1595918222,1595918222),('coreshop_embedded_class','tr','',1595918222,1595918222),('coreshop_embedded_class','uk','',1595918222,1595918222),('coreshop_embedded_class','zh_Hans','',1595918222,1595918222),('default_value_warning','cs','',1595953447,1595953447),('default_value_warning','de','',1595953447,1595953447),('default_value_warning','en','',1595953447,1595953447),('default_value_warning','es','',1595953447,1595953447),('default_value_warning','fa','',1595953447,1595953447),('default_value_warning','fr','',1595953447,1595953447),('default_value_warning','it','',1595953447,1595953447),('default_value_warning','ja','',1595953447,1595953447),('default_value_warning','nl','',1595953447,1595953447),('default_value_warning','pl','',1595953447,1595953447),('default_value_warning','pt_BR','',1595953447,1595953447),('default_value_warning','ru','',1595953447,1595953447),('default_value_warning','sk','',1595953447,1595953447),('default_value_warning','sv','',1595953447,1595953447),('default_value_warning','sv_FI','',1595953447,1595953447),('default_value_warning','tr','',1595953447,1595953447),('default_value_warning','uk','',1595953447,1595953447),('default_value_warning','zh_Hans','',1595953447,1595953447),('description_web','cs','',1595919837,1595919837),('description_web','de','',1595919837,1595919837),('description_web','en','',1595919837,1595919837),('description_web','es','',1595919837,1595919837),('description_web','fa','',1595919837,1595919837),('description_web','fr','',1595919837,1595919837),('description_web','it','',1595919837,1595919837),('description_web','ja','',1595919837,1595919837),('description_web','nl','',1595919837,1595919837),('description_web','pl','',1595919837,1595919837),('description_web','pt_BR','',1595919837,1595919837),('description_web','ru','',1595919837,1595919837),('description_web','sk','',1595919837,1595919837),('description_web','sv','',1595919837,1595919837),('description_web','sv_FI','',1595919837,1595919837),('description_web','tr','',1595919837,1595919837),('description_web','uk','',1595919837,1595919837),('description_web','zh_Hans','',1595919837,1595919837),('dimension-collection','cs','',1607172510,1607172510),('dimension-collection','de','',1607172510,1607172510),('dimension-collection','en','',1607172510,1607172510),('dimension-collection','es','',1607172510,1607172510),('dimension-collection','fa','',1607172510,1607172510),('dimension-collection','fr','',1607172510,1607172510),('dimension-collection','it','',1607172510,1607172510),('dimension-collection','ja','',1607172510,1607172510),('dimension-collection','nl','',1607172510,1607172510),('dimension-collection','pl','',1607172510,1607172510),('dimension-collection','pt_BR','',1607172510,1607172510),('dimension-collection','ru','',1607172510,1607172510),('dimension-collection','sk','',1607172510,1607172510),('dimension-collection','sv','',1607172510,1607172510),('dimension-collection','sv_FI','',1607172510,1607172510),('dimension-collection','tr','',1607172510,1607172510),('dimension-collection','uk','',1607172510,1607172510),('dimension-collection','zh_Hans','',1607172510,1607172510),('dimensions','cs','',1607172449,1607172449),('dimensions','de','',1607172449,1607172449),('dimensions','en','',1607172449,1607172449),('dimensions','es','',1607172449,1607172449),('dimensions','fa','',1607172449,1607172449),('dimensions','fr','',1607172449,1607172449),('dimensions','it','',1607172449,1607172449),('dimensions','ja','',1607172449,1607172449),('dimensions','nl','',1607172449,1607172449),('dimensions','pl','',1607172449,1607172449),('dimensions','pt_BR','',1607172449,1607172449),('dimensions','ru','',1607172449,1607172449),('dimensions','sk','',1607172449,1607172449),('dimensions','sv','',1607172449,1607172449),('dimensions','sv_FI','',1607172449,1607172449),('dimensions','tr','',1607172449,1607172449),('dimensions','uk','',1607172449,1607172449),('dimensions','zh_Hans','',1607172449,1607172449),('down','cs','',1595921758,1595921758),('down','de','',1595921758,1595921758),('down','en','',1595921758,1595921758),('down','es','',1595921758,1595921758),('down','fa','',1595921758,1595921758),('down','fr','',1595921758,1595921758),('down','it','',1595921758,1595921758),('down','ja','',1595921758,1595921758),('down','nl','',1595921758,1595921758),('down','pl','',1595921758,1595921758),('down','pt_BR','',1595921758,1595921758),('down','ru','',1595921758,1595921758),('down','sk','',1595921758,1595921758),('down','sv','',1595921758,1595921758),('down','sv_FI','',1595921758,1595921758),('down','tr','',1595921758,1595921758),('down','uk','',1595921758,1595921758),('down','zh_Hans','',1595921758,1595921758),('dynamic','cs','',1596004017,1596004017),('dynamic','de','',1596004017,1596004017),('dynamic','en','',1596004017,1596004017),('dynamic','es','',1596004017,1596004017),('dynamic','fa','',1596004017,1596004017),('dynamic','fr','',1596004017,1596004017),('dynamic','it','',1596004017,1596004017),('dynamic','ja','',1596004017,1596004017),('dynamic','nl','',1596004017,1596004017),('dynamic','pl','',1596004017,1596004017),('dynamic','pt_BR','',1596004017,1596004017),('dynamic','ru','',1596004017,1596004017),('dynamic','sk','',1596004017,1596004017),('dynamic','sv','',1596004017,1596004017),('dynamic','sv_FI','',1596004017,1596004017),('dynamic','tr','',1596004017,1596004017),('dynamic','uk','',1596004017,1596004017),('dynamic','zh_Hans','',1596004017,1596004017),('false','cs','',1595953447,1595953447),('false','de','',1595953447,1595953447),('false','en','',1595953447,1595953447),('false','es','',1595953447,1595953447),('false','fa','',1595953447,1595953447),('false','fr','',1595953447,1595953447),('false','it','',1595953447,1595953447),('false','ja','',1595953447,1595953447),('false','nl','',1595953447,1595953447),('false','pl','',1595953447,1595953447),('false','pt_BR','',1595953447,1595953447),('false','ru','',1595953447,1595953447),('false','sk','',1595953447,1595953447),('false','sv','',1595953447,1595953447),('false','sv_FI','',1595953447,1595953447),('false','tr','',1595953447,1595953447),('false','uk','',1595953447,1595953447),('false','zh_Hans','',1595953447,1595953447),('female','cs','',1607162999,1607162999),('female','de','',1607162999,1607162999),('female','en','',1607162999,1607162999),('female','es','',1607162999,1607162999),('female','fa','',1607162999,1607162999),('female','fr','',1607162999,1607162999),('female','it','',1607162999,1607162999),('female','ja','',1607162999,1607162999),('female','nl','',1607162999,1607162999),('female','pl','',1607162999,1607162999),('female','pt_BR','',1607162999,1607162999),('female','ru','',1607162999,1607162999),('female','sk','',1607162999,1607162999),('female','sv','',1607162999,1607162999),('female','sv_FI','',1607162999,1607162999),('female','tr','',1607162999,1607162999),('female','uk','',1607162999,1607162999),('female','zh_Hans','',1607162999,1607162999),('hotspot config 1','cs','',1610210151,1610210151),('hotspot config 1','de','',1610210151,1610210151),('hotspot config 1','en','',1610210151,1610210151),('hotspot config 1','es','',1610210151,1610210151),('hotspot config 1','fa','',1610210151,1610210151),('hotspot config 1','fr','',1610210151,1610210151),('hotspot config 1','it','',1610210151,1610210151),('hotspot config 1','ja','',1610210151,1610210151),('hotspot config 1','nl','',1610210151,1610210151),('hotspot config 1','pl','',1610210151,1610210151),('hotspot config 1','pt_BR','',1610210151,1610210151),('hotspot config 1','ru','',1610210151,1610210151),('hotspot config 1','sk','',1610210151,1610210151),('hotspot config 1','sv','',1610210151,1610210151),('hotspot config 1','sv_FI','',1610210151,1610210151),('hotspot config 1','tr','',1610210151,1610210151),('hotspot config 1','uk','',1610210151,1610210151),('hotspot config 1','zh_Hans','',1610210151,1610210151),('image_advanced','cs','',1610207421,1610207421),('image_advanced','de','',1610207421,1610207421),('image_advanced','en','',1610207421,1610207421),('image_advanced','es','',1610207421,1610207421),('image_advanced','fa','',1610207421,1610207421),('image_advanced','fr','',1610207421,1610207421),('image_advanced','it','',1610207421,1610207421),('image_advanced','ja','',1610207421,1610207421),('image_advanced','nl','',1610207421,1610207421),('image_advanced','pl','',1610207421,1610207421),('image_advanced','pt_BR','',1610207421,1610207421),('image_advanced','ru','',1610207421,1610207421),('image_advanced','sk','',1610207421,1610207421),('image_advanced','sv','',1610207421,1610207421),('image_advanced','sv_FI','',1610207421,1610207421),('image_advanced','tr','',1610207421,1610207421),('image_advanced','uk','',1610207421,1610207421),('image_advanced','zh_Hans','',1610207421,1610207421),('image_gallery','cs','',1610207422,1610207422),('image_gallery','de','',1610207422,1610207422),('image_gallery','en','',1610207422,1610207422),('image_gallery','es','',1610207422,1610207422),('image_gallery','fa','',1610207422,1610207422),('image_gallery','fr','',1610207422,1610207422),('image_gallery','it','',1610207422,1610207422),('image_gallery','ja','',1610207422,1610207422),('image_gallery','nl','',1610207422,1610207422),('image_gallery','pl','',1610207422,1610207422),('image_gallery','pt_BR','',1610207422,1610207422),('image_gallery','ru','',1610207422,1610207422),('image_gallery','sk','',1610207422,1610207422),('image_gallery','sv','',1610207422,1610207422),('image_gallery','sv_FI','',1610207422,1610207422),('image_gallery','tr','',1610207422,1610207422),('image_gallery','uk','',1610207422,1610207422),('image_gallery','zh_Hans','',1610207422,1610207422),('ingredients','cs','',1595919837,1595919837),('ingredients','de','',1595919837,1595919837),('ingredients','en','',1595919837,1595919837),('ingredients','es','',1595919837,1595919837),('ingredients','fa','',1595919837,1595919837),('ingredients','fr','',1595919837,1595919837),('ingredients','it','',1595919837,1595919837),('ingredients','ja','',1595919837,1595919837),('ingredients','nl','',1595919837,1595919837),('ingredients','pl','',1595919837,1595919837),('ingredients','pt_BR','',1595919837,1595919837),('ingredients','ru','',1595919837,1595919837),('ingredients','sk','',1595919837,1595919837),('ingredients','sv','',1595919837,1595919837),('ingredients','sv_FI','',1595919837,1595919837),('ingredients','tr','',1595919837,1595919837),('ingredients','uk','',1595919837,1595919837),('ingredients','zh_Hans','',1595919837,1595919837),('m','cs','',1607157343,1607157343),('m','de','',1607157343,1607157343),('m','en','',1607157343,1607157343),('m','es','',1607157343,1607157343),('m','fa','',1607157343,1607157343),('m','fr','',1607157343,1607157343),('m','it','',1607157343,1607157343),('m','ja','',1607157343,1607157343),('m','nl','',1607157343,1607157343),('m','pl','',1607157343,1607157343),('m','pt_BR','',1607157343,1607157343),('m','ru','',1607157343,1607157343),('m','sk','',1607157343,1607157343),('m','sv','',1607157343,1607157343),('m','sv_FI','',1607157343,1607157343),('m','tr','',1607157343,1607157343),('m','uk','',1607157343,1607157343),('m','zh_Hans','',1607157343,1607157343),('male','cs','',1607162999,1607162999),('male','de','',1607162999,1607162999),('male','en','',1607162999,1607162999),('male','es','',1607162999,1607162999),('male','fa','',1607162999,1607162999),('male','fr','',1607162999,1607162999),('male','it','',1607162999,1607162999),('male','ja','',1607162999,1607162999),('male','nl','',1607162999,1607162999),('male','pl','',1607162999,1607162999),('male','pt_BR','',1607162999,1607162999),('male','ru','',1607162999,1607162999),('male','sk','',1607162999,1607162999),('male','sv','',1607162999,1607162999),('male','sv_FI','',1607162999,1607162999),('male','tr','',1607162999,1607162999),('male','uk','',1607162999,1607162999),('male','zh_Hans','',1607162999,1607162999),('marker config 1','cs','',1610210151,1610210151),('marker config 1','de','',1610210151,1610210151),('marker config 1','en','',1610210151,1610210151),('marker config 1','es','',1610210151,1610210151),('marker config 1','fa','',1610210151,1610210151),('marker config 1','fr','',1610210151,1610210151),('marker config 1','it','',1610210151,1610210151),('marker config 1','ja','',1610210151,1610210151),('marker config 1','nl','',1610210151,1610210151),('marker config 1','pl','',1610210151,1610210151),('marker config 1','pt_BR','',1610210151,1610210151),('marker config 1','ru','',1610210151,1610210151),('marker config 1','sk','',1610210151,1610210151),('marker config 1','sv','',1610210151,1610210151),('marker config 1','sv_FI','',1610210151,1610210151),('marker config 1','tr','',1610210151,1610210151),('marker config 1','uk','',1610210151,1610210151),('marker config 1','zh_Hans','',1610210151,1610210151),('modo_uso_web','cs','',1595919837,1595919837),('modo_uso_web','de','',1595919837,1595919837),('modo_uso_web','en','',1595919837,1595919837),('modo_uso_web','es','',1595919837,1595919837),('modo_uso_web','fa','',1595919837,1595919837),('modo_uso_web','fr','',1595919837,1595919837),('modo_uso_web','it','',1595919837,1595919837),('modo_uso_web','ja','',1595919837,1595919837),('modo_uso_web','nl','',1595919837,1595919837),('modo_uso_web','pl','',1595919837,1595919837),('modo_uso_web','pt_BR','',1595919837,1595919837),('modo_uso_web','ru','',1595919837,1595919837),('modo_uso_web','sk','',1595919837,1595919837),('modo_uso_web','sv','',1595919837,1595919837),('modo_uso_web','sv_FI','',1595919837,1595919837),('modo_uso_web','tr','',1595919837,1595919837),('modo_uso_web','uk','',1595919837,1595919837),('modo_uso_web','zh_Hans','',1595919837,1595919837),('multirelation','cs','',1607374579,1607374579),('multirelation','de','',1607374579,1607374579),('multirelation','en','',1607374579,1607374579),('multirelation','es','',1607374579,1607374579),('multirelation','fa','',1607374579,1607374579),('multirelation','fr','',1607374579,1607374579),('multirelation','it','',1607374579,1607374579),('multirelation','ja','',1607374579,1607374579),('multirelation','nl','',1607374579,1607374579),('multirelation','pl','',1607374579,1607374579),('multirelation','pt_BR','',1607374579,1607374579),('multirelation','ru','',1607374579,1607374579),('multirelation','sk','',1607374579,1607374579),('multirelation','sv','',1607374579,1607374579),('multirelation','sv_FI','',1607374579,1607374579),('multirelation','tr','',1607374579,1607374579),('multirelation','uk','',1607374579,1607374579),('multirelation','zh_Hans','',1607374579,1607374579),('newsletterActive','cs','',1607179741,1607179741),('newsletterActive','de','',1607179741,1607179741),('newsletterActive','en','',1607179741,1607179741),('newsletterActive','es','',1607179741,1607179741),('newsletterActive','fa','',1607179741,1607179741),('newsletterActive','fr','',1607179741,1607179741),('newsletterActive','it','',1607179741,1607179741),('newsletterActive','ja','',1607179741,1607179741),('newsletterActive','nl','',1607179741,1607179741),('newsletterActive','pl','',1607179741,1607179741),('newsletterActive','pt_BR','',1607179741,1607179741),('newsletterActive','ru','',1607179741,1607179741),('newsletterActive','sk','',1607179741,1607179741),('newsletterActive','sv','',1607179741,1607179741),('newsletterActive','sv_FI','',1607179741,1607179741),('newsletterActive','tr','',1607179741,1607179741),('newsletterActive','uk','',1607179741,1607179741),('newsletterActive','zh_Hans','',1607179741,1607179741),('newsletterConfirmed','cs','',1607179741,1607179741),('newsletterConfirmed','de','',1607179741,1607179741),('newsletterConfirmed','en','',1607179741,1607179741),('newsletterConfirmed','es','',1607179741,1607179741),('newsletterConfirmed','fa','',1607179741,1607179741),('newsletterConfirmed','fr','',1607179741,1607179741),('newsletterConfirmed','it','',1607179741,1607179741),('newsletterConfirmed','ja','',1607179741,1607179741),('newsletterConfirmed','nl','',1607179741,1607179741),('newsletterConfirmed','pl','',1607179741,1607179741),('newsletterConfirmed','pt_BR','',1607179741,1607179741),('newsletterConfirmed','ru','',1607179741,1607179741),('newsletterConfirmed','sk','',1607179741,1607179741),('newsletterConfirmed','sv','',1607179741,1607179741),('newsletterConfirmed','sv_FI','',1607179741,1607179741),('newsletterConfirmed','tr','',1607179741,1607179741),('newsletterConfirmed','uk','',1607179741,1607179741),('newsletterConfirmed','zh_Hans','',1607179741,1607179741),('null','cs','',1595953447,1595953447),('null','de','',1595953447,1595953447),('null','en','',1595953447,1595953447),('null','es','',1595953447,1595953447),('null','fa','',1595953447,1595953447),('null','fr','',1595953447,1595953447),('null','it','',1595953447,1595953447),('null','ja','',1595953447,1595953447),('null','nl','',1595953447,1595953447),('null','pl','',1595953447,1595953447),('null','pt_BR','',1595953447,1595953447),('null','ru','',1595953447,1595953447),('null','sk','',1595953447,1595953447),('null','sv','',1595953447,1595953447),('null','sv_FI','',1595953447,1595953447),('null','tr','',1595953447,1595953447),('null','uk','',1595953447,1595953447),('null','zh_Hans','',1595953447,1595953447),('object_add_dialog_custom_text.Category','cs','',1607709971,1607709971),('object_add_dialog_custom_text.Category','de','',1607709971,1607709971),('object_add_dialog_custom_text.Category','en','',1607709971,1607709971),('object_add_dialog_custom_text.Category','es','',1607709971,1607709971),('object_add_dialog_custom_text.Category','fa','',1607709971,1607709971),('object_add_dialog_custom_text.Category','fr','',1607709971,1607709971),('object_add_dialog_custom_text.Category','it','',1607709971,1607709971),('object_add_dialog_custom_text.Category','ja','',1607709971,1607709971),('object_add_dialog_custom_text.Category','nl','',1607709971,1607709971),('object_add_dialog_custom_text.Category','pl','',1607709971,1607709971),('object_add_dialog_custom_text.Category','pt_BR','',1607709971,1607709971),('object_add_dialog_custom_text.Category','ru','',1607709971,1607709971),('object_add_dialog_custom_text.Category','sk','',1607709971,1607709971),('object_add_dialog_custom_text.Category','sv','',1607709971,1607709971),('object_add_dialog_custom_text.Category','sv_FI','',1607709971,1607709971),('object_add_dialog_custom_text.Category','tr','',1607709971,1607709971),('object_add_dialog_custom_text.Category','uk','',1607709971,1607709971),('object_add_dialog_custom_text.Category','zh_Hans','',1607709971,1607709971),('object_add_dialog_custom_text.Farmacia','cs','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','de','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','en','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','es','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','fa','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','fr','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','it','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','ja','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','nl','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','pl','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','pt_BR','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','ru','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','sk','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','sv','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','sv_FI','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','tr','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','uk','',1595953778,1595953778),('object_add_dialog_custom_text.Farmacia','zh_Hans','',1595953778,1595953778),('object_add_dialog_custom_text.Product','cs','',1595918163,1595918163),('object_add_dialog_custom_text.Product','de','',1595918163,1595918163),('object_add_dialog_custom_text.Product','en','',1595918163,1595918163),('object_add_dialog_custom_text.Product','es','',1595918163,1595918163),('object_add_dialog_custom_text.Product','fa','',1595918163,1595918163),('object_add_dialog_custom_text.Product','fr','',1595918163,1595918163),('object_add_dialog_custom_text.Product','it','',1595918163,1595918163),('object_add_dialog_custom_text.Product','ja','',1595918163,1595918163),('object_add_dialog_custom_text.Product','nl','',1595918163,1595918163),('object_add_dialog_custom_text.Product','pl','',1595918163,1595918163),('object_add_dialog_custom_text.Product','pt_BR','',1595918163,1595918163),('object_add_dialog_custom_text.Product','ru','',1595918163,1595918163),('object_add_dialog_custom_text.Product','sk','',1595918163,1595918163),('object_add_dialog_custom_text.Product','sv','',1595918163,1595918163),('object_add_dialog_custom_text.Product','sv_FI','',1595918163,1595918163),('object_add_dialog_custom_text.Product','tr','',1595918163,1595918163),('object_add_dialog_custom_text.Product','uk','',1595918163,1595918163),('object_add_dialog_custom_text.Product','zh_Hans','',1595918163,1595918163),('object_add_dialog_custom_title.Category','cs','',1607709971,1607709971),('object_add_dialog_custom_title.Category','de','',1607709971,1607709971),('object_add_dialog_custom_title.Category','en','',1607709971,1607709971),('object_add_dialog_custom_title.Category','es','',1607709971,1607709971),('object_add_dialog_custom_title.Category','fa','',1607709971,1607709971),('object_add_dialog_custom_title.Category','fr','',1607709971,1607709971),('object_add_dialog_custom_title.Category','it','',1607709971,1607709971),('object_add_dialog_custom_title.Category','ja','',1607709971,1607709971),('object_add_dialog_custom_title.Category','nl','',1607709971,1607709971),('object_add_dialog_custom_title.Category','pl','',1607709971,1607709971),('object_add_dialog_custom_title.Category','pt_BR','',1607709971,1607709971),('object_add_dialog_custom_title.Category','ru','',1607709971,1607709971),('object_add_dialog_custom_title.Category','sk','',1607709971,1607709971),('object_add_dialog_custom_title.Category','sv','',1607709971,1607709971),('object_add_dialog_custom_title.Category','sv_FI','',1607709971,1607709971),('object_add_dialog_custom_title.Category','tr','',1607709971,1607709971),('object_add_dialog_custom_title.Category','uk','',1607709971,1607709971),('object_add_dialog_custom_title.Category','zh_Hans','',1607709971,1607709971),('object_add_dialog_custom_title.Farmacia','cs','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','de','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','en','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','es','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','fa','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','fr','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','it','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','ja','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','nl','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','pl','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','pt_BR','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','ru','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','sk','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','sv','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','sv_FI','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','tr','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','uk','',1595953778,1595953778),('object_add_dialog_custom_title.Farmacia','zh_Hans','',1595953778,1595953778),('object_add_dialog_custom_title.Product','cs','',1595918163,1595918163),('object_add_dialog_custom_title.Product','de','',1595918163,1595918163),('object_add_dialog_custom_title.Product','en','',1595918163,1595918163),('object_add_dialog_custom_title.Product','es','',1595918163,1595918163),('object_add_dialog_custom_title.Product','fa','',1595918163,1595918163),('object_add_dialog_custom_title.Product','fr','',1595918163,1595918163),('object_add_dialog_custom_title.Product','it','',1595918163,1595918163),('object_add_dialog_custom_title.Product','ja','',1595918163,1595918163),('object_add_dialog_custom_title.Product','nl','',1595918163,1595918163),('object_add_dialog_custom_title.Product','pl','',1595918163,1595918163),('object_add_dialog_custom_title.Product','pt_BR','',1595918163,1595918163),('object_add_dialog_custom_title.Product','ru','',1595918163,1595918163),('object_add_dialog_custom_title.Product','sk','',1595918163,1595918163),('object_add_dialog_custom_title.Product','sv','',1595918163,1595918163),('object_add_dialog_custom_title.Product','sv_FI','',1595918163,1595918163),('object_add_dialog_custom_title.Product','tr','',1595918163,1595918163),('object_add_dialog_custom_title.Product','uk','',1595918163,1595918163),('object_add_dialog_custom_title.Product','zh_Hans','',1595918163,1595918163),('other-collection','cs','',1607173229,1607173229),('other-collection','de','',1607173229,1607173229),('other-collection','en','',1607173229,1607173229),('other-collection','es','',1607173229,1607173229),('other-collection','fa','',1607173229,1607173229),('other-collection','fr','',1607173229,1607173229),('other-collection','it','',1607173229,1607173229),('other-collection','ja','',1607173229,1607173229),('other-collection','nl','',1607173229,1607173229),('other-collection','pl','',1607173229,1607173229),('other-collection','pt_BR','',1607173229,1607173229),('other-collection','ru','',1607173229,1607173229),('other-collection','sk','',1607173229,1607173229),('other-collection','sv','',1607173229,1607173229),('other-collection','sv_FI','',1607173229,1607173229),('other-collection','tr','',1607173229,1607173229),('other-collection','uk','',1607173229,1607173229),('other-collection','zh_Hans','',1607173229,1607173229),('other_instructions','cs','',1595920347,1595920347),('other_instructions','de','',1595920347,1595920347),('other_instructions','en','',1595920347,1595920347),('other_instructions','es','',1595920347,1595920347),('other_instructions','fa','',1595920347,1595920347),('other_instructions','fr','',1595920347,1595920347),('other_instructions','it','',1595920347,1595920347),('other_instructions','ja','',1595920347,1595920347),('other_instructions','nl','',1595920347,1595920347),('other_instructions','pl','',1595920347,1595920347),('other_instructions','pt_BR','',1595920347,1595920347),('other_instructions','ru','',1595920347,1595920347),('other_instructions','sk','',1595920347,1595920347),('other_instructions','sv','',1595920347,1595920347),('other_instructions','sv_FI','',1595920347,1595920347),('other_instructions','tr','',1595920347,1595920347),('other_instructions','uk','',1595920347,1595920347),('other_instructions','zh_Hans','',1595920347,1595920347),('panel 2','cs','',1606057287,1606057287),('panel 2','de','',1606057287,1606057287),('panel 2','en','',1606057287,1606057287),('panel 2','es','',1606057287,1606057287),('panel 2','fa','',1606057287,1606057287),('panel 2','fr','',1606057287,1606057287),('panel 2','it','',1606057287,1606057287),('panel 2','ja','',1606057287,1606057287),('panel 2','nl','',1606057287,1606057287),('panel 2','pl','',1606057287,1606057287),('panel 2','pt_BR','',1606057287,1606057287),('panel 2','ru','',1606057287,1606057287),('panel 2','sk','',1606057287,1606057287),('panel 2','sv','',1606057287,1606057287),('panel 2','sv_FI','',1606057287,1606057287),('panel 2','tr','',1606057287,1606057287),('panel 2','uk','',1606057287,1606057287),('panel 2','zh_Hans','',1606057287,1606057287),('plugin_datahub_config','cs','',1609929774,1609929774),('plugin_datahub_config','de','',1609929774,1609929774),('plugin_datahub_config','en','',1609929774,1609929774),('plugin_datahub_config','es','',1609929774,1609929774),('plugin_datahub_config','fa','',1609929774,1609929774),('plugin_datahub_config','fr','',1609929774,1609929774),('plugin_datahub_config','it','',1609929774,1609929774),('plugin_datahub_config','ja','',1609929774,1609929774),('plugin_datahub_config','nl','',1609929774,1609929774),('plugin_datahub_config','pl','',1609929774,1609929774),('plugin_datahub_config','pt_BR','',1609929774,1609929774),('plugin_datahub_config','ru','',1609929774,1609929774),('plugin_datahub_config','sk','',1609929774,1609929774),('plugin_datahub_config','sv','',1609929774,1609929774),('plugin_datahub_config','sv_FI','',1609929774,1609929774),('plugin_datahub_config','tr','',1609929774,1609929774),('plugin_datahub_config','uk','',1609929774,1609929774),('plugin_datahub_config','zh_Hans','',1609929774,1609929774),('run','cs','',1607163059,1607163059),('run','de','',1607163059,1607163059),('run','en','',1607163059,1607163059),('run','es','',1607163059,1607163059),('run','fa','',1607163059,1607163059),('run','fr','',1607163059,1607163059),('run','it','',1607163059,1607163059),('run','ja','',1607163059,1607163059),('run','nl','',1607163059,1607163059),('run','pl','',1607163059,1607163059),('run','pt_BR','',1607163059,1607163059),('run','ru','',1607163059,1607163059),('run','sk','',1607163059,1607163059),('run','sv','',1607163059,1607163059),('run','sv_FI','',1607163059,1607163059),('run','tr','',1607163059,1607163059),('run','uk','',1607163059,1607163059),('run','zh_Hans','',1607163059,1607163059),('subfolder_field','cs','',1596122850,1596122850),('subfolder_field','de','',1596122850,1596122850),('subfolder_field','en','',1596122850,1596122850),('subfolder_field','es','',1596122850,1596122850),('subfolder_field','fa','',1596122850,1596122850),('subfolder_field','fr','',1596122850,1596122850),('subfolder_field','it','',1596122850,1596122850),('subfolder_field','ja','',1596122850,1596122850),('subfolder_field','nl','',1596122850,1596122850),('subfolder_field','pl','',1596122850,1596122850),('subfolder_field','pt_BR','',1596122850,1596122850),('subfolder_field','ru','',1596122850,1596122850),('subfolder_field','sk','',1596122850,1596122850),('subfolder_field','sv','',1596122850,1596122850),('subfolder_field','sv_FI','',1596122850,1596122850),('subfolder_field','tr','',1596122850,1596122850),('subfolder_field','uk','',1596122850,1596122850),('subfolder_field','zh_Hans','',1596122850,1596122850),('subfolder_field_placeholder','cs','',1596122850,1596122850),('subfolder_field_placeholder','de','',1596122850,1596122850),('subfolder_field_placeholder','en','',1596122850,1596122850),('subfolder_field_placeholder','es','',1596122850,1596122850),('subfolder_field_placeholder','fa','',1596122850,1596122850),('subfolder_field_placeholder','fr','',1596122850,1596122850),('subfolder_field_placeholder','it','',1596122850,1596122850),('subfolder_field_placeholder','ja','',1596122850,1596122850),('subfolder_field_placeholder','nl','',1596122850,1596122850),('subfolder_field_placeholder','pl','',1596122850,1596122850),('subfolder_field_placeholder','pt_BR','',1596122850,1596122850),('subfolder_field_placeholder','ru','',1596122850,1596122850),('subfolder_field_placeholder','sk','',1596122850,1596122850),('subfolder_field_placeholder','sv','',1596122850,1596122850),('subfolder_field_placeholder','sv_FI','',1596122850,1596122850),('subfolder_field_placeholder','tr','',1596122850,1596122850),('subfolder_field_placeholder','uk','',1596122850,1596122850),('subfolder_field_placeholder','zh_Hans','',1596122850,1596122850),('summary','cs','',1595919837,1595919837),('summary','de','',1595919837,1595919837),('summary','en','',1595919837,1595919837),('summary','es','',1595919837,1595919837),('summary','fa','',1595919837,1595919837),('summary','fr','',1595919837,1595919837),('summary','it','',1595919837,1595919837),('summary','ja','',1595919837,1595919837),('summary','nl','',1595919837,1595919837),('summary','pl','',1595919837,1595919837),('summary','pt_BR','',1595919837,1595919837),('summary','ru','',1595919837,1595919837),('summary','sk','',1595919837,1595919837),('summary','sv','',1595919837,1595919837),('summary','sv_FI','',1595919837,1595919837),('summary','tr','',1595919837,1595919837),('summary','uk','',1595919837,1595919837),('summary','zh_Hans','',1595919837,1595919837),('targetGroup','cs','',1607179741,1607179741),('targetGroup','de','',1607179741,1607179741),('targetGroup','en','',1607179741,1607179741),('targetGroup','es','',1607179741,1607179741),('targetGroup','fa','',1607179741,1607179741),('targetGroup','fr','',1607179741,1607179741),('targetGroup','it','',1607179741,1607179741),('targetGroup','ja','',1607179741,1607179741),('targetGroup','nl','',1607179741,1607179741),('targetGroup','pl','',1607179741,1607179741),('targetGroup','pt_BR','',1607179741,1607179741),('targetGroup','ru','',1607179741,1607179741),('targetGroup','sk','',1607179741,1607179741),('targetGroup','sv','',1607179741,1607179741),('targetGroup','sv_FI','',1607179741,1607179741),('targetGroup','tr','',1607179741,1607179741),('targetGroup','uk','',1607179741,1607179741),('targetGroup','zh_Hans','',1607179741,1607179741),('targetGroupMultiselect','cs','',1607179741,1607179741),('targetGroupMultiselect','de','',1607179741,1607179741),('targetGroupMultiselect','en','',1607179741,1607179741),('targetGroupMultiselect','es','',1607179741,1607179741),('targetGroupMultiselect','fa','',1607179741,1607179741),('targetGroupMultiselect','fr','',1607179741,1607179741),('targetGroupMultiselect','it','',1607179741,1607179741),('targetGroupMultiselect','ja','',1607179741,1607179741),('targetGroupMultiselect','nl','',1607179741,1607179741),('targetGroupMultiselect','pl','',1607179741,1607179741),('targetGroupMultiselect','pt_BR','',1607179741,1607179741),('targetGroupMultiselect','ru','',1607179741,1607179741),('targetGroupMultiselect','sk','',1607179741,1607179741),('targetGroupMultiselect','sv','',1607179741,1607179741),('targetGroupMultiselect','sv_FI','',1607179741,1607179741),('targetGroupMultiselect','tr','',1607179741,1607179741),('targetGroupMultiselect','uk','',1607179741,1607179741),('targetGroupMultiselect','zh_Hans','',1607179741,1607179741),('test1','cs','',1607161920,1607161920),('test1','de','',1607161920,1607161920),('test1','en','',1607161920,1607161920),('test1','es','',1607161920,1607161920),('test1','fa','',1607161920,1607161920),('test1','fr','',1607161920,1607161920),('test1','it','',1607161920,1607161920),('test1','ja','',1607161920,1607161920),('test1','nl','',1607161920,1607161920),('test1','pl','',1607161920,1607161920),('test1','pt_BR','',1607161920,1607161920),('test1','ru','',1607161920,1607161920),('test1','sk','',1607161920,1607161920),('test1','sv','',1607161920,1607161920),('test1','sv_FI','',1607161920,1607161920),('test1','tr','',1607161920,1607161920),('test1','uk','',1607161920,1607161920),('test1','zh_Hans','',1607161920,1607161920),('test2','cs','',1607161920,1607161920),('test2','de','',1607161920,1607161920),('test2','en','',1607161920,1607161920),('test2','es','',1607161920,1607161920),('test2','fa','',1607161920,1607161920),('test2','fr','',1607161920,1607161920),('test2','it','',1607161920,1607161920),('test2','ja','',1607161920,1607161920),('test2','nl','',1607161920,1607161920),('test2','pl','',1607161920,1607161920),('test2','pt_BR','',1607161920,1607161920),('test2','ru','',1607161920,1607161920),('test2','sk','',1607161920,1607161920),('test2','sv','',1607161920,1607161920),('test2','sv_FI','',1607161920,1607161920),('test2','tr','',1607161920,1607161920),('test2','uk','',1607161920,1607161920),('test2','zh_Hans','',1607161920,1607161920),('test3','cs','',1607161920,1607161920),('test3','de','',1607161920,1607161920),('test3','en','',1607161920,1607161920),('test3','es','',1607161920,1607161920),('test3','fa','',1607161920,1607161920),('test3','fr','',1607161920,1607161920),('test3','it','',1607161920,1607161920),('test3','ja','',1607161920,1607161920),('test3','nl','',1607161920,1607161920),('test3','pl','',1607161920,1607161920),('test3','pt_BR','',1607161920,1607161920),('test3','ru','',1607161920,1607161920),('test3','sk','',1607161920,1607161920),('test3','sv','',1607161920,1607161920),('test3','sv_FI','',1607161920,1607161920),('test3','tr','',1607161920,1607161920),('test3','uk','',1607161920,1607161920),('test3','zh_Hans','',1607161920,1607161920),('test4','cs','',1607161920,1607161920),('test4','de','',1607161920,1607161920),('test4','en','',1607161920,1607161920),('test4','es','',1607161920,1607161920),('test4','fa','',1607161920,1607161920),('test4','fr','',1607161920,1607161920),('test4','it','',1607161920,1607161920),('test4','ja','',1607161920,1607161920),('test4','nl','',1607161920,1607161920),('test4','pl','',1607161920,1607161920),('test4','pt_BR','',1607161920,1607161920),('test4','ru','',1607161920,1607161920),('test4','sk','',1607161920,1607161920),('test4','sv','',1607161920,1607161920),('test4','sv_FI','',1607161920,1607161920),('test4','tr','',1607161920,1607161920),('test4','uk','',1607161920,1607161920),('test4','zh_Hans','',1607161920,1607161920),('testAsset','cs','',1607373079,1607373079),('testAsset','de','',1607373079,1607373079),('testAsset','en','',1607373079,1607373079),('testAsset','es','',1607373079,1607373079),('testAsset','fa','',1607373079,1607373079),('testAsset','fr','',1607373079,1607373079),('testAsset','it','',1607373079,1607373079),('testAsset','ja','',1607373079,1607373079),('testAsset','nl','',1607373079,1607373079),('testAsset','pl','',1607373079,1607373079),('testAsset','pt_BR','',1607373079,1607373079),('testAsset','ru','',1607373079,1607373079),('testAsset','sk','',1607373079,1607373079),('testAsset','sv','',1607373079,1607373079),('testAsset','sv_FI','',1607373079,1607373079),('testAsset','tr','',1607373079,1607373079),('testAsset','uk','',1607373079,1607373079),('testAsset','zh_Hans','',1607373079,1607373079),('top','cs','',1595918222,1595918222),('top','de','',1595918222,1595918222),('top','en','',1595918222,1595918222),('top','es','',1595918222,1595918222),('top','fa','',1595918222,1595918222),('top','fr','',1595918222,1595918222),('top','it','',1595918222,1595918222),('top','ja','',1595918222,1595918222),('top','nl','',1595918222,1595918222),('top','pl','',1595918222,1595918222),('top','pt_BR','',1595918222,1595918222),('top','ru','',1595918222,1595918222),('top','sk','',1595918222,1595918222),('top','sv','',1595918222,1595918222),('top','sv_FI','',1595918222,1595918222),('top','tr','',1595918222,1595918222),('top','uk','',1595918222,1595918222),('top','zh_Hans','',1595918222,1595918222),('true','cs','',1595953447,1595953447),('true','de','',1595953447,1595953447),('true','en','',1595953447,1595953447),('true','es','',1595953447,1595953447),('true','fa','',1595953447,1595953447),('true','fr','',1595953447,1595953447),('true','it','',1595953447,1595953447),('true','ja','',1595953447,1595953447),('true','nl','',1595953447,1595953447),('true','pl','',1595953447,1595953447),('true','pt_BR','',1595953447,1595953447),('true','ru','',1595953447,1595953447),('true','sk','',1595953447,1595953447),('true','sv','',1595953447,1595953447),('true','sv_FI','',1595953447,1595953447),('true','tr','',1595953447,1595953447),('true','uk','',1595953447,1595953447),('true','zh_Hans','',1595953447,1595953447),('up','cs','',1595921758,1595921758),('up','de','',1595921758,1595921758),('up','en','',1595921758,1595921758),('up','es','',1595921758,1595921758),('up','fa','',1595921758,1595921758),('up','fr','',1595921758,1595921758),('up','it','',1595921758,1595921758),('up','ja','',1595921758,1595921758),('up','nl','',1595921758,1595921758),('up','pl','',1595921758,1595921758),('up','pt_BR','',1595921758,1595921758),('up','ru','',1595921758,1595921758),('up','sk','',1595921758,1595921758),('up','sv','',1595921758,1595921758),('up','sv_FI','',1595921758,1595921758),('up','tr','',1595921758,1595921758),('up','uk','',1595921758,1595921758),('up','zh_Hans','',1595921758,1595921758),('urlSlug','cs','',1607172300,1607172300),('urlSlug','de','',1607172300,1607172300),('urlSlug','en','',1607172300,1607172300),('urlSlug','es','',1607172300,1607172300),('urlSlug','fa','',1607172300,1607172300),('urlSlug','fr','',1607172300,1607172300),('urlSlug','it','',1607172300,1607172300),('urlSlug','ja','',1607172300,1607172300),('urlSlug','nl','',1607172300,1607172300),('urlSlug','pl','',1607172300,1607172300),('urlSlug','pt_BR','',1607172300,1607172300),('urlSlug','ru','',1607172300,1607172300),('urlSlug','sk','',1607172300,1607172300),('urlSlug','sv','',1607172300,1607172300),('urlSlug','sv_FI','',1607172300,1607172300),('urlSlug','tr','',1607172300,1607172300),('urlSlug','uk','',1607172300,1607172300),('urlSlug','zh_Hans','',1607172300,1607172300),('Åland Islands','cs','',1595954054,1595954054),('Åland Islands','de','',1595954054,1595954054),('Åland Islands','en','',1595954054,1595954054),('Åland Islands','es','',1595954054,1595954054),('Åland Islands','fa','',1595954054,1595954054),('Åland Islands','fr','',1595954054,1595954054),('Åland Islands','it','',1595954054,1595954054),('Åland Islands','ja','',1595954054,1595954054),('Åland Islands','nl','',1595954054,1595954054),('Åland Islands','pl','',1595954054,1595954054),('Åland Islands','pt_BR','',1595954054,1595954054),('Åland Islands','ru','',1595954054,1595954054),('Åland Islands','sk','',1595954054,1595954054),('Åland Islands','sv','',1595954054,1595954054),('Åland Islands','sv_FI','',1595954054,1595954054),('Åland Islands','tr','',1595954054,1595954054),('Åland Islands','uk','',1595954054,1595954054),('Åland Islands','zh_Hans','',1595954054,1595954054),('€','cs','',1595919398,1595919398),('€','de','',1595919398,1595919398),('€','en','',1595919398,1595919398),('€','es','',1595919398,1595919398),('€','fa','',1595919398,1595919398),('€','fr','',1595919398,1595919398),('€','it','',1595919398,1595919398),('€','ja','',1595919398,1595919398),('€','nl','',1595919398,1595919398),('€','pl','',1595919398,1595919398),('€','pt_BR','',1595919398,1595919398),('€','ru','',1595919398,1595919398),('€','sk','',1595919398,1595919398),('€','sv','',1595919398,1595919398),('€','sv_FI','',1595919398,1595919398),('€','tr','',1595919398,1595919398),('€','uk','',1595919398,1595919398),('€','zh_Hans','',1595919398,1595919398);
/*!40000 ALTER TABLE `translations_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations_website`
--

DROP TABLE IF EXISTS `translations_website`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations_website` (
  `key` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `language` varchar(10) NOT NULL DEFAULT '',
  `text` text,
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`key`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations_website`
--

LOCK TABLES `translations_website` WRITE;
/*!40000 ALTER TABLE `translations_website` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations_website` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tree_locks`
--

DROP TABLE IF EXISTS `tree_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tree_locks` (
  `id` int(11) NOT NULL DEFAULT '0',
  `type` enum('asset','document','object') NOT NULL DEFAULT 'asset',
  `locked` enum('self','propagate') DEFAULT NULL,
  PRIMARY KEY (`id`,`type`),
  KEY `type` (`type`),
  KEY `locked` (`locked`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tree_locks`
--

LOCK TABLES `tree_locks` WRITE;
/*!40000 ALTER TABLE `tree_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tree_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(11) unsigned DEFAULT NULL,
  `type` enum('user','userfolder','role','rolefolder') NOT NULL DEFAULT 'user',
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(190) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  `contentLanguages` longtext,
  `admin` tinyint(1) unsigned DEFAULT '0',
  `active` tinyint(1) unsigned DEFAULT '1',
  `permissions` text,
  `roles` varchar(1000) DEFAULT NULL,
  `welcomescreen` tinyint(1) DEFAULT NULL,
  `closeWarning` tinyint(1) DEFAULT NULL,
  `memorizeTabs` tinyint(1) DEFAULT NULL,
  `allowDirtyClose` tinyint(1) unsigned DEFAULT '1',
  `docTypes` varchar(255) DEFAULT NULL,
  `classes` text,
  `apiKey` varchar(255) DEFAULT NULL,
  `twoFactorAuthentication` varchar(255) DEFAULT NULL,
  `activePerspective` varchar(255) DEFAULT NULL,
  `perspectives` longtext,
  `websiteTranslationLanguagesEdit` longtext,
  `websiteTranslationLanguagesView` longtext,
  `lastLogin` int(11) unsigned DEFAULT NULL,
  `keyBindings` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_name` (`type`,`name`),
  KEY `parentId` (`parentId`),
  KEY `name` (`name`),
  KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (0,0,'user','system',NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,0,'user','pimcore','$2y$10$0wvSUZ799Wb6z6AlIqzKpetpkks115/F4.V77P253ThouNDAvTvAC',NULL,NULL,NULL,'en',NULL,1,1,'','',0,1,1,0,'','',NULL,'null',NULL,'','','',1610392189,NULL),(3,0,'user','user',NULL,NULL,NULL,NULL,'en',NULL,0,1,'','',0,1,1,0,'','',NULL,'null',NULL,'','','',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_permission_definitions`
--

DROP TABLE IF EXISTS `users_permission_definitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_permission_definitions` (
  `key` varchar(50) NOT NULL DEFAULT '',
  `category` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_permission_definitions`
--

LOCK TABLES `users_permission_definitions` WRITE;
/*!40000 ALTER TABLE `users_permission_definitions` DISABLE KEYS */;
INSERT INTO `users_permission_definitions` VALUES ('admin_translations',''),('application_logging',''),('assets',''),('asset_metadata',''),('classes',''),('clear_cache',''),('clear_fullpage_cache',''),('clear_temp_files',''),('dashboards',''),('documents',''),('document_types',''),('emails',''),('gdpr_data_extractor',''),('glossary',''),('http_errors',''),('notes_events',''),('notifications',''),('notifications_send',''),('objects',''),('piwik_reports',''),('piwik_settings',''),('plugins',''),('plugin_datahub_config',''),('predefined_properties',''),('process_manager',''),('qr_codes',''),('recyclebin',''),('redirects',''),('reports',''),('reports_config',''),('robots.txt',''),('routes',''),('seemode',''),('seo_document_editor',''),('share_configurations',''),('system_settings',''),('tags_assignment',''),('tags_configuration',''),('tags_search',''),('tag_snippet_management',''),('targeting',''),('thumbnails',''),('translations',''),('users',''),('web2print_settings',''),('website_settings',''),('workflow_details','');
/*!40000 ALTER TABLE `users_permission_definitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_workspaces_asset`
--

DROP TABLE IF EXISTS `users_workspaces_asset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_workspaces_asset` (
  `cid` int(11) unsigned NOT NULL DEFAULT '0',
  `cpath` varchar(765) CHARACTER SET utf8 DEFAULT NULL,
  `userId` int(11) NOT NULL DEFAULT '0',
  `list` tinyint(1) DEFAULT '0',
  `view` tinyint(1) DEFAULT '0',
  `publish` tinyint(1) DEFAULT '0',
  `delete` tinyint(1) DEFAULT '0',
  `rename` tinyint(1) DEFAULT '0',
  `create` tinyint(1) DEFAULT '0',
  `settings` tinyint(1) DEFAULT '0',
  `versions` tinyint(1) DEFAULT '0',
  `properties` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`,`userId`),
  UNIQUE KEY `cpath_userId` (`cpath`,`userId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_workspaces_asset`
--

LOCK TABLES `users_workspaces_asset` WRITE;
/*!40000 ALTER TABLE `users_workspaces_asset` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_workspaces_asset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_workspaces_document`
--

DROP TABLE IF EXISTS `users_workspaces_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_workspaces_document` (
  `cid` int(11) unsigned NOT NULL DEFAULT '0',
  `cpath` varchar(765) CHARACTER SET utf8 DEFAULT NULL,
  `userId` int(11) NOT NULL DEFAULT '0',
  `list` tinyint(1) unsigned DEFAULT '0',
  `view` tinyint(1) unsigned DEFAULT '0',
  `save` tinyint(1) unsigned DEFAULT '0',
  `publish` tinyint(1) unsigned DEFAULT '0',
  `unpublish` tinyint(1) unsigned DEFAULT '0',
  `delete` tinyint(1) unsigned DEFAULT '0',
  `rename` tinyint(1) unsigned DEFAULT '0',
  `create` tinyint(1) unsigned DEFAULT '0',
  `settings` tinyint(1) unsigned DEFAULT '0',
  `versions` tinyint(1) unsigned DEFAULT '0',
  `properties` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`cid`,`userId`),
  UNIQUE KEY `cpath_userId` (`cpath`,`userId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_workspaces_document`
--

LOCK TABLES `users_workspaces_document` WRITE;
/*!40000 ALTER TABLE `users_workspaces_document` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_workspaces_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_workspaces_object`
--

DROP TABLE IF EXISTS `users_workspaces_object`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_workspaces_object` (
  `cid` int(11) unsigned NOT NULL DEFAULT '0',
  `cpath` varchar(765) CHARACTER SET utf8 DEFAULT NULL,
  `userId` int(11) NOT NULL DEFAULT '0',
  `list` tinyint(1) unsigned DEFAULT '0',
  `view` tinyint(1) unsigned DEFAULT '0',
  `save` tinyint(1) unsigned DEFAULT '0',
  `publish` tinyint(1) unsigned DEFAULT '0',
  `unpublish` tinyint(1) unsigned DEFAULT '0',
  `delete` tinyint(1) unsigned DEFAULT '0',
  `rename` tinyint(1) unsigned DEFAULT '0',
  `create` tinyint(1) unsigned DEFAULT '0',
  `settings` tinyint(1) unsigned DEFAULT '0',
  `versions` tinyint(1) unsigned DEFAULT '0',
  `properties` tinyint(1) unsigned DEFAULT '0',
  `lEdit` text,
  `lView` text,
  `layouts` text,
  PRIMARY KEY (`cid`,`userId`),
  UNIQUE KEY `cpath_userId` (`cpath`,`userId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_workspaces_object`
--

LOCK TABLES `users_workspaces_object` WRITE;
/*!40000 ALTER TABLE `users_workspaces_object` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_workspaces_object` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uuids`
--

DROP TABLE IF EXISTS `uuids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uuids` (
  `uuid` char(36) NOT NULL,
  `itemId` int(11) unsigned NOT NULL,
  `type` varchar(25) NOT NULL,
  `instanceIdentifier` varchar(50) NOT NULL,
  PRIMARY KEY (`uuid`,`itemId`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uuids`
--

LOCK TABLES `uuids` WRITE;
/*!40000 ALTER TABLE `uuids` DISABLE KEYS */;
/*!40000 ALTER TABLE `uuids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `versions`
--

DROP TABLE IF EXISTS `versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `versions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) unsigned DEFAULT NULL,
  `ctype` enum('document','asset','object') DEFAULT NULL,
  `userId` int(11) unsigned DEFAULT NULL,
  `note` text,
  `stackTrace` text,
  `date` int(11) unsigned DEFAULT NULL,
  `public` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `serialized` tinyint(1) unsigned DEFAULT '0',
  `versionCount` int(10) unsigned NOT NULL DEFAULT '0',
  `binaryFileHash` varchar(128) CHARACTER SET ascii DEFAULT NULL,
  `binaryFileId` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `ctype_cid` (`ctype`,`cid`),
  KEY `date` (`date`),
  KEY `binaryFileHash` (`binaryFileHash`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Final view structure for view `object_CAT`
--

/*!50001 DROP VIEW IF EXISTS `object_CAT`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pimcore`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `object_CAT` AS select `object_query_CAT`.`oo_id` AS `oo_id`,`object_query_CAT`.`oo_classId` AS `oo_classId`,`object_query_CAT`.`oo_className` AS `oo_className`,`object_query_CAT`.`products` AS `products`,`object_query_CAT`.`name` AS `name`,`object_query_CAT`.`code` AS `code`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_versionCount` AS `o_versionCount` from (`object_query_CAT` join `objects` on((`objects`.`o_id` = `object_query_CAT`.`oo_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `object_PROD`
--

/*!50001 DROP VIEW IF EXISTS `object_PROD`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pimcore`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `object_PROD` AS select `object_query_PROD`.`oo_id` AS `oo_id`,`object_query_PROD`.`oo_classId` AS `oo_classId`,`object_query_PROD`.`oo_className` AS `oo_className`,`object_query_PROD`.`categories` AS `categories`,`object_query_PROD`.`title` AS `title`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_versionCount` AS `o_versionCount` from (`object_query_PROD` join `objects` on((`objects`.`o_id` = `object_query_PROD`.`oo_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `object_localized_PROD_el_GR`
--

/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_el_GR`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pimcore`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `object_localized_PROD_el_GR` AS select `object_query_PROD`.`oo_id` AS `oo_id`,`object_query_PROD`.`oo_classId` AS `oo_classId`,`object_query_PROD`.`oo_className` AS `oo_className`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_versionCount` AS `o_versionCount`,`el_GR`.`ooo_id` AS `ooo_id`,`el_GR`.`language` AS `language`,`el_GR`.`title` AS `title`,`el_GR`.`description` AS `description` from ((`object_query_PROD` join `objects` on((`objects`.`o_id` = `object_query_PROD`.`oo_id`))) left join `object_localized_query_PROD_el_GR` `el_GR` on((1 and (`object_query_PROD`.`oo_id` = `el_GR`.`ooo_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `object_localized_PROD_en`
--

/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_en`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pimcore`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `object_localized_PROD_en` AS select `object_query_PROD`.`oo_id` AS `oo_id`,`object_query_PROD`.`oo_classId` AS `oo_classId`,`object_query_PROD`.`oo_className` AS `oo_className`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_versionCount` AS `o_versionCount`,`en`.`ooo_id` AS `ooo_id`,`en`.`language` AS `language`,`en`.`title` AS `title`,`en`.`description` AS `description` from ((`object_query_PROD` join `objects` on((`objects`.`o_id` = `object_query_PROD`.`oo_id`))) left join `object_localized_query_PROD_en` `en` on((1 and (`object_query_PROD`.`oo_id` = `en`.`ooo_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `object_localized_PROD_es`
--

/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_es`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pimcore`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `object_localized_PROD_es` AS select `object_query_PROD`.`oo_id` AS `oo_id`,`object_query_PROD`.`oo_classId` AS `oo_classId`,`object_query_PROD`.`oo_className` AS `oo_className`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_versionCount` AS `o_versionCount`,`es`.`ooo_id` AS `ooo_id`,`es`.`language` AS `language`,`es`.`title` AS `title`,`es`.`description` AS `description` from ((`object_query_PROD` join `objects` on((`objects`.`o_id` = `object_query_PROD`.`oo_id`))) left join `object_localized_query_PROD_es` `es` on((1 and (`object_query_PROD`.`oo_id` = `es`.`ooo_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `object_localized_PROD_fr`
--

/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_fr`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pimcore`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `object_localized_PROD_fr` AS select `object_query_PROD`.`oo_id` AS `oo_id`,`object_query_PROD`.`oo_classId` AS `oo_classId`,`object_query_PROD`.`oo_className` AS `oo_className`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_versionCount` AS `o_versionCount`,`fr`.`ooo_id` AS `ooo_id`,`fr`.`language` AS `language`,`fr`.`title` AS `title`,`fr`.`description` AS `description` from ((`object_query_PROD` join `objects` on((`objects`.`o_id` = `object_query_PROD`.`oo_id`))) left join `object_localized_query_PROD_fr` `fr` on((1 and (`object_query_PROD`.`oo_id` = `fr`.`ooo_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `object_localized_PROD_it`
--

/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_it`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pimcore`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `object_localized_PROD_it` AS select `object_query_PROD`.`oo_id` AS `oo_id`,`object_query_PROD`.`oo_classId` AS `oo_classId`,`object_query_PROD`.`oo_className` AS `oo_className`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_versionCount` AS `o_versionCount`,`it`.`ooo_id` AS `ooo_id`,`it`.`language` AS `language`,`it`.`title` AS `title`,`it`.`description` AS `description` from ((`object_query_PROD` join `objects` on((`objects`.`o_id` = `object_query_PROD`.`oo_id`))) left join `object_localized_query_PROD_it` `it` on((1 and (`object_query_PROD`.`oo_id` = `it`.`ooo_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `object_localized_PROD_pl`
--

/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_pl`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pimcore`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `object_localized_PROD_pl` AS select `object_query_PROD`.`oo_id` AS `oo_id`,`object_query_PROD`.`oo_classId` AS `oo_classId`,`object_query_PROD`.`oo_className` AS `oo_className`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_versionCount` AS `o_versionCount`,`pl`.`ooo_id` AS `ooo_id`,`pl`.`language` AS `language`,`pl`.`title` AS `title`,`pl`.`description` AS `description` from ((`object_query_PROD` join `objects` on((`objects`.`o_id` = `object_query_PROD`.`oo_id`))) left join `object_localized_query_PROD_pl` `pl` on((1 and (`object_query_PROD`.`oo_id` = `pl`.`ooo_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `object_localized_PROD_pt`
--

/*!50001 DROP VIEW IF EXISTS `object_localized_PROD_pt`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pimcore`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `object_localized_PROD_pt` AS select `object_query_PROD`.`oo_id` AS `oo_id`,`object_query_PROD`.`oo_classId` AS `oo_classId`,`object_query_PROD`.`oo_className` AS `oo_className`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_versionCount` AS `o_versionCount`,`pt`.`ooo_id` AS `ooo_id`,`pt`.`language` AS `language`,`pt`.`title` AS `title`,`pt`.`description` AS `description` from ((`object_query_PROD` join `objects` on((`objects`.`o_id` = `object_query_PROD`.`oo_id`))) left join `object_localized_query_PROD_pt` `pt` on((1 and (`object_query_PROD`.`oo_id` = `pt`.`ooo_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-11 20:22:28
