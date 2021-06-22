-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `application_logs`;
CREATE TABLE `application_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `timestamp` datetime NOT NULL,
  `message` text DEFAULT NULL,
  `priority` enum('emergency','alert','critical','error','warning','notice','info','debug') DEFAULT NULL,
  `fileobject` varchar(1024) DEFAULT NULL,
  `info` varchar(1024) DEFAULT NULL,
  `component` varchar(190) DEFAULT NULL,
  `source` varchar(190) DEFAULT NULL,
  `relatedobject` int(11) unsigned DEFAULT NULL,
  `relatedobjecttype` enum('object','document','asset') DEFAULT NULL,
  `maintenanceChecked` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `component` (`component`),
  KEY `timestamp` (`timestamp`),
  KEY `relatedobject` (`relatedobject`),
  KEY `priority` (`priority`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `assets`;
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
  `customSettings` longtext DEFAULT NULL,
  `hasMetaData` tinyint(1) NOT NULL DEFAULT 0,
  `versionCount` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fullpath` (`path`,`filename`),
  KEY `parentId` (`parentId`),
  KEY `filename` (`filename`),
  KEY `modificationDate` (`modificationDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

INSERT INTO `assets` (`id`, `parentId`, `type`, `filename`, `path`, `mimetype`, `creationDate`, `modificationDate`, `userOwner`, `userModification`, `customSettings`, `hasMetaData`, `versionCount`) VALUES
(1,	0,	'folder',	'',	'/',	NULL,	1614795784,	1614795784,	1,	1,	NULL,	0,	0),
(2,	1,	'folder',	'myFolder',	'/',	NULL,	1614797991,	1614797991,	2,	2,	'a:0:{}',	0,	1),
(3,	2,	'image',	'logo-claim.png',	'/myFolder/',	'image/png',	1614798008,	1614798008,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:1010;s:11:\"imageHeight\";i:263;s:16:\"embeddedMetaData\";a:18:{s:8:\"FileSize\";s:5:\"18 kB\";s:14:\"FileModifyDate\";s:25:\"2021:03:03 19:00:07+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:03:03 19:00:07+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:03:03 19:00:07+00:00\";s:15:\"FilePermissions\";s:9:\"rw-rw-r--\";s:8:\"FileType\";s:3:\"PNG\";s:17:\"FileTypeExtension\";s:3:\"png\";s:8:\"MIMEType\";s:9:\"image/png\";s:10:\"ImageWidth\";i:1010;s:11:\"ImageHeight\";i:263;s:8:\"BitDepth\";i:8;s:9:\"ColorType\";s:14:\"RGB with Alpha\";s:11:\"Compression\";s:15:\"Deflate/Inflate\";s:6:\"Filter\";s:8:\"Adaptive\";s:9:\"Interlace\";s:13:\"Noninterlaced\";s:10:\"XMPToolkit\";s:62:\"Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01        \";s:9:\"ImageSize\";s:8:\"1010x263\";s:10:\"Megapixels\";d:0.266;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	1),
(4,	2,	'image',	'logo-claim2.png',	'/myFolder/',	'image/png',	1614798019,	1614798052,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:1010;s:11:\"imageHeight\";i:263;s:16:\"embeddedMetaData\";a:18:{s:8:\"FileSize\";s:5:\"18 kB\";s:14:\"FileModifyDate\";s:25:\"2021:03:03 19:00:19+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:03:03 19:00:19+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:03:03 19:00:19+00:00\";s:15:\"FilePermissions\";s:9:\"rw-rw-r--\";s:8:\"FileType\";s:3:\"PNG\";s:17:\"FileTypeExtension\";s:3:\"png\";s:8:\"MIMEType\";s:9:\"image/png\";s:10:\"ImageWidth\";i:1010;s:11:\"ImageHeight\";i:263;s:8:\"BitDepth\";i:8;s:9:\"ColorType\";s:14:\"RGB with Alpha\";s:11:\"Compression\";s:15:\"Deflate/Inflate\";s:6:\"Filter\";s:8:\"Adaptive\";s:9:\"Interlace\";s:13:\"Noninterlaced\";s:10:\"XMPToolkit\";s:62:\"Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01        \";s:9:\"ImageSize\";s:8:\"1010x263\";s:10:\"Megapixels\";d:0.266;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	2),
(5,	2,	'image',	'logo-claim1.png',	'/myFolder/',	'image/png',	1614798025,	1614798042,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:1010;s:11:\"imageHeight\";i:263;s:16:\"embeddedMetaData\";a:18:{s:8:\"FileSize\";s:5:\"18 kB\";s:14:\"FileModifyDate\";s:25:\"2021:03:03 19:00:25+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:03:03 19:00:25+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:03:03 19:00:25+00:00\";s:15:\"FilePermissions\";s:9:\"rw-rw-r--\";s:8:\"FileType\";s:3:\"PNG\";s:17:\"FileTypeExtension\";s:3:\"png\";s:8:\"MIMEType\";s:9:\"image/png\";s:10:\"ImageWidth\";i:1010;s:11:\"ImageHeight\";i:263;s:8:\"BitDepth\";i:8;s:9:\"ColorType\";s:14:\"RGB with Alpha\";s:11:\"Compression\";s:15:\"Deflate/Inflate\";s:6:\"Filter\";s:8:\"Adaptive\";s:9:\"Interlace\";s:13:\"Noninterlaced\";s:10:\"XMPToolkit\";s:62:\"Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01        \";s:9:\"ImageSize\";s:8:\"1010x263\";s:10:\"Megapixels\";d:0.266;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	2),
(6,	2,	'image',	'logo-claim3.png',	'/myFolder/',	'image/png',	1614798031,	1614798063,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:1010;s:11:\"imageHeight\";i:263;s:16:\"embeddedMetaData\";a:18:{s:8:\"FileSize\";s:5:\"18 kB\";s:14:\"FileModifyDate\";s:25:\"2021:03:03 19:00:31+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:03:03 19:00:31+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:03:03 19:00:31+00:00\";s:15:\"FilePermissions\";s:9:\"rw-rw-r--\";s:8:\"FileType\";s:3:\"PNG\";s:17:\"FileTypeExtension\";s:3:\"png\";s:8:\"MIMEType\";s:9:\"image/png\";s:10:\"ImageWidth\";i:1010;s:11:\"ImageHeight\";i:263;s:8:\"BitDepth\";i:8;s:9:\"ColorType\";s:14:\"RGB with Alpha\";s:11:\"Compression\";s:15:\"Deflate/Inflate\";s:6:\"Filter\";s:8:\"Adaptive\";s:9:\"Interlace\";s:13:\"Noninterlaced\";s:10:\"XMPToolkit\";s:62:\"Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01        \";s:9:\"ImageSize\";s:8:\"1010x263\";s:10:\"Megapixels\";d:0.266;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	2),
(7,	1,	'folder',	'_default_upload_bucket',	'/',	NULL,	1614798200,	1614798200,	1,	0,	'a:0:{}',	0,	1),
(8,	7,	'image',	'logo-claim.png',	'/_default_upload_bucket/',	'image/png',	1614798200,	1618916448,	2,	2,	'a:6:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:1010;s:11:\"imageHeight\";i:263;s:16:\"embeddedMetaData\";a:18:{s:8:\"FileSize\";s:5:\"18 kB\";s:14:\"FileModifyDate\";s:25:\"2021:03:03 19:03:20+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:03:03 19:03:20+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:03:03 19:03:20+00:00\";s:15:\"FilePermissions\";s:9:\"rw-rw-r--\";s:8:\"FileType\";s:3:\"PNG\";s:17:\"FileTypeExtension\";s:3:\"png\";s:8:\"MIMEType\";s:9:\"image/png\";s:10:\"ImageWidth\";i:1010;s:11:\"ImageHeight\";i:263;s:8:\"BitDepth\";i:8;s:9:\"ColorType\";s:14:\"RGB with Alpha\";s:11:\"Compression\";s:15:\"Deflate/Inflate\";s:6:\"Filter\";s:8:\"Adaptive\";s:9:\"Interlace\";s:13:\"Noninterlaced\";s:10:\"XMPToolkit\";s:62:\"Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01        \";s:9:\"ImageSize\";s:8:\"1010x263\";s:10:\"Megapixels\";d:0.266;}s:25:\"embeddedMetaDataExtracted\";b:1;s:26:\"disableFocalPointDetection\";b:1;}',	1,	2),
(10,	2,	'image',	'2020-11-14 20_18_08-localhost __ Pimcore.png',	'/myFolder/',	'image/png',	1618916464,	1618916470,	2,	2,	'a:6:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:1539;s:11:\"imageHeight\";i:729;s:16:\"embeddedMetaData\";a:23:{s:8:\"FileSize\";s:6:\"690 kB\";s:14:\"FileModifyDate\";s:25:\"2021:04:20 11:01:04+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:04:20 11:01:04+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:04:20 11:01:04+00:00\";s:15:\"FilePermissions\";s:9:\"rw-rw-rw-\";s:8:\"FileType\";s:3:\"PNG\";s:17:\"FileTypeExtension\";s:3:\"png\";s:8:\"MIMEType\";s:9:\"image/png\";s:10:\"ImageWidth\";i:1539;s:11:\"ImageHeight\";i:729;s:8:\"BitDepth\";i:8;s:9:\"ColorType\";s:3:\"RGB\";s:11:\"Compression\";s:15:\"Deflate/Inflate\";s:6:\"Filter\";s:8:\"Adaptive\";s:9:\"Interlace\";s:13:\"Noninterlaced\";s:13:\"SRGBRendering\";s:10:\"Perceptual\";s:5:\"Gamma\";d:2.2;s:14:\"PixelsPerUnitX\";i:3779;s:14:\"PixelsPerUnitY\";i:3779;s:10:\"PixelUnits\";s:6:\"meters\";s:8:\"Software\";s:9:\"Greenshot\";s:9:\"ImageSize\";s:8:\"1539x729\";s:10:\"Megapixels\";d:1.1;}s:25:\"embeddedMetaDataExtracted\";b:1;s:26:\"disableFocalPointDetection\";b:1;}',	1,	2);

DROP TABLE IF EXISTS `assets_metadata`;
CREATE TABLE `assets_metadata` (
  `cid` int(11) NOT NULL,
  `name` varchar(190) NOT NULL,
  `language` varchar(10) CHARACTER SET ascii NOT NULL DEFAULT '',
  `type` enum('input','textarea','asset','document','object','date','select','checkbox') DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  PRIMARY KEY (`cid`,`name`,`language`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `assets_metadata` (`cid`, `name`, `language`, `type`, `data`) VALUES
(8,	'alt',	'',	'input',	''),
(8,	'copyright',	'',	'input',	''),
(8,	'title',	'',	'input',	''),
(10,	'alt',	'',	'input',	''),
(10,	'copyright',	'',	'input',	''),
(10,	'title',	'',	'input',	'');

DROP TABLE IF EXISTS `cache_items`;
CREATE TABLE `cache_items` (
  `item_id` varbinary(255) NOT NULL,
  `item_data` mediumblob NOT NULL,
  `item_lifetime` int(10) unsigned DEFAULT NULL,
  `item_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `cache_items` (`item_id`, `item_data`, `item_lifetime`, `item_time`) VALUES
(UNHEX('007461677300646F63756D656E745F31'),	'a:1:{s:10:\"document_1\";i:1;}',	31536000,	1618917690),
(UNHEX('007461677300646F63756D656E745F70726F706572746965735F31'),	'a:3:{s:19:\"document_properties\";i:6;s:10:\"document_1\";i:1;s:21:\"document_properties_1\";i:0;}',	31536000,	1618917704),
(UNHEX('0074616773006F626A6563745F31'),	'a:1:{s:8:\"object_1\";i:0;}',	31536000,	1618918359),
(UNHEX('0074616773006F626A6563745F33'),	'a:1:{s:8:\"object_3\";i:0;}',	31536000,	1618918359),
(UNHEX('0074616773006F626A6563745F70726F706572746965735F33'),	'a:3:{s:17:\"object_properties\";i:0;s:8:\"object_3\";i:0;s:19:\"object_properties_3\";i:0;}',	31536000,	1618918359),
(UNHEX('007461677300736974655F646F6D61696E5F3432316161393065303739666133323662363439346638313261643133653739'),	'a:3:{s:6:\"system\";i:0;s:4:\"site\";i:0;s:44:\"site_domain_421aa90e079fa326b6494f812ad13e79\";i:0;}',	31536000,	1618917658),
(UNHEX('00746167730073797374656D5F7265736F757263655F636F6C756D6E735F656469745F6C6F636B'),	'a:3:{s:6:\"system\";i:0;s:8:\"resource\";i:0;s:33:\"system_resource_columns_edit_lock\";i:0;}',	31536000,	1618917679),
(UNHEX('00746167730073797374656D5F726F7574655F7265646972656374'),	'a:4:{s:6:\"system\";i:0;s:8:\"redirect\";i:0;s:5:\"route\";i:0;s:21:\"system_route_redirect\";i:0;}',	31536000,	1618917658),
(UNHEX('0074616773007472616E736C6174696F6E5F646174615F3265333634643331356164356164393834363039653766346265656466306637'),	'a:4:{s:10:\"translator\";i:0;s:18:\"translator_website\";i:0;s:9:\"translate\";i:0;s:49:\"translation_data_2e364d315ad5ad984609e7f4beedf0f7\";i:0;}',	31536000,	1618917679),
(UNHEX('646F63756D656E745F31'),	's:855:\"O:27:\"Pimcore\\Model\\Document\\Page\":28:{s:8:\"\0*\0title\";s:0:\"\";s:14:\"\0*\0description\";s:0:\"\";s:11:\"\0*\0metaData\";a:0:{}s:7:\"\0*\0type\";s:4:\"page\";s:12:\"\0*\0prettyUrl\";N;s:17:\"\0*\0targetGroupIds\";s:0:\"\";s:13:\"\0*\0controller\";s:47:\"App\\Controller\\DefaultController::defaultAction\";s:11:\"\0*\0template\";s:0:\"\";s:12:\"\0*\0editables\";N;s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:1;s:11:\"\0*\0parentId\";i:0;s:6:\"\0*\0key\";s:0:\"\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:999999;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614795784;s:19:\"\0*\0modificationDate\";i:1618917689;s:12:\"\0*\0userOwner\";i:1;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1618917689;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1618917690),
(UNHEX('646F63756D656E745F70726F706572746965735F31'),	's:6:\"a:0:{}\";',	31536000,	1618917704),
(UNHEX('6F626A6563745F31'),	's:598:\"O:31:\"Pimcore\\Model\\DataObject\\Folder\":19:{s:9:\"\0*\0o_type\";s:6:\"folder\";s:7:\"\0*\0o_id\";i:1;s:13:\"\0*\0o_parentId\";i:0;s:8:\"\0*\0o_key\";s:0:\"\";s:9:\"\0*\0o_path\";s:1:\"/\";s:10:\"\0*\0o_index\";i:999999;s:17:\"\0*\0o_creationDate\";i:1614795784;s:21:\"\0*\0o_modificationDate\";i:1614795784;s:14:\"\0*\0o_userOwner\";i:1;s:21:\"\0*\0o_userModification\";i:1;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:22:\"\0*\0o_elementAdminStyle\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:0;s:25:\"\0*\0__dataVersionTimestamp\";i:1614795784;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1618918359),
(UNHEX('6F626A6563745F33'),	's:822:\"O:33:\"Pimcore\\Model\\DataObject\\MyObject\":25:{s:12:\"\0*\0o_classId\";s:1:\"1\";s:14:\"\0*\0o_className\";s:8:\"MyObject\";s:8:\"\0*\0Title\";s:6:\"Item 2\";s:14:\"\0*\0Desctiption\";s:38:\"<p>Item 2Item 2Item 2Item 2Item 2</p>\n\";s:20:\"\0*\0__rawRelationData\";a:0:{}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:3;s:13:\"\0*\0o_parentId\";i:1;s:9:\"\0*\0o_type\";s:6:\"object\";s:8:\"\0*\0o_key\";s:6:\"Item 2\";s:9:\"\0*\0o_path\";s:1:\"/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614797937;s:21:\"\0*\0o_modificationDate\";i:1614797948;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:22:\"\0*\0o_elementAdminStyle\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:3;s:25:\"\0*\0__dataVersionTimestamp\";i:1614797948;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1618918359),
(UNHEX('6F626A6563745F70726F706572746965735F33'),	's:6:\"a:0:{}\";',	31536000,	1618918359),
(UNHEX('736974655F646F6D61696E5F3432316161393065303739666133323662363439346638313261643133653739'),	's:13:\"s:6:\"failed\";\";',	31536000,	1618917658),
(UNHEX('73797374656D5F7265736F757263655F636F6C756D6E735F656469745F6C6F636B'),	's:101:\"a:6:{i:0;s:2:\"id\";i:1;s:3:\"cid\";i:2;s:5:\"ctype\";i:3;s:6:\"userId\";i:4;s:9:\"sessionId\";i:5;s:4:\"date\";}\";',	31536000,	1618917679),
(UNHEX('73797374656D5F726F7574655F7265646972656374'),	's:6:\"a:0:{}\";',	31536000,	1618917658),
(UNHEX('7472616E736C6174696F6E5F646174615F3265333634643331356164356164393834363039653766346265656466306637'),	's:94693:\"O:46:\"Symfony\\Component\\Translation\\MessageCatalogue\":6:{s:56:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0messages\";a:2:{s:5:\"admin\";a:1726:{s:15:\"__pimcore_dummy\";s:12:\"only_a_dummy\";s:17:\"validation_failed\";s:18:\"Validation Failed!\";s:10:\"deprecated\";s:10:\"Deprecated\";s:13:\"access_denied\";s:14:\"Access Denied!\";s:25:\"access_denied_description\";s:88:\"You don\'t have sufficient permissions to open the element or perform the desired action.\";s:11:\"quicksearch\";s:12:\"Quick Search\";s:34:\"you_can_only_drop_one_element_here\";s:35:\"You can only drop one element here!\";s:12:\"grid_options\";s:12:\"Grid Options\";s:16:\"open_data_object\";s:16:\"Open Data Object\";s:12:\"data_objects\";s:12:\"Data Objects\";s:29:\"asset_type_change_not_allowed\";s:127:\"<strong>Only assets of same type are allowed here.</strong><br/>[ type of uploaded asset: \"%s\" | type of existing asset: \"%s\" ]\";s:19:\"unsupported_feature\";s:54:\"Unsupported feature! Please check system requirements!\";s:18:\"upload_new_version\";s:18:\"Upload new version\";s:20:\"screen_size_to_small\";s:56:\"Your screen is too small to display the desired preview.\";s:32:\"too_many_children_for_recyclebin\";s:105:\"This element contains too many children to be moved to the recycle bin so it will be deleted permanentely\";s:7:\"default\";s:7:\"Default\";s:4:\"data\";s:4:\"Data\";s:8:\"metadata\";s:8:\"Metadata\";s:15:\"custom_metadata\";s:15:\"Custom Metadata\";s:12:\"invalid_name\";s:12:\"Invalid name\";s:30:\"login_token_invalid_user_error\";s:13:\"Invalid user.\";s:41:\"login_token_as_admin_non_admin_user_error\";s:55:\"Only admin users are allowed to login as an admin user.\";s:29:\"login_token_no_password_error\";s:25:\"User has no password set.\";s:13:\"email_address\";s:13:\"Email Address\";s:15:\"email_blacklist\";s:15:\"Email Blacklist\";s:17:\"targeting_toolbar\";s:17:\"Targeting Toolbar\";s:2:\"OK\";s:2:\"OK\";s:32:\"search_replace_assignments_error\";s:59:\"Please select items where to replace and a new target item.\";s:40:\"replace_assignments_in_selected_elements\";s:40:\"Replace assignments in selected elements\";s:35:\"replace_assignments_in_all_elements\";s:35:\"Replace assignments in all elements\";s:26:\"search_replace_assignments\";s:28:\"Search & Replace Assignments\";s:13:\"imageadvanced\";s:14:\"Image Advanced\";s:21:\"filter_active_message\";s:47:\"Do you want to export only the filtered values?\";s:12:\"close_others\";s:12:\"Close Others\";s:9:\"close_all\";s:9:\"Close All\";s:5:\"clone\";s:5:\"Clone\";s:16:\"close_unmodified\";s:16:\"Close Unmodified\";s:7:\"classid\";s:8:\"Class ID\";s:8:\"parentid\";s:9:\"Parent ID\";s:8:\"mimetype\";s:9:\"MIME-Type\";s:12:\"creationdate\";s:13:\"Creation Date\";s:16:\"usermodification\";s:17:\"User Modification\";s:9:\"userowner\";s:5:\"Owner\";s:9:\"languages\";s:9:\"Languages\";s:24:\"password_was_not_changed\";s:54:\"Password wasn\'t changed because it isn\'t secure enough\";s:9:\"marketing\";s:9:\"Marketing\";s:29:\"clear_content_of_current_view\";s:29:\"Clear content of current view\";s:27:\"highlight_editable_elements\";s:27:\"Highlight editable elements\";s:8:\"continue\";s:8:\"Continue\";s:24:\"you_have_unsaved_changes\";s:25:\"You have unsaved changes.\";s:38:\"clear_content_of_selected_target_group\";s:38:\"Clear content of selected Target Group\";s:86:\"visitors_of_this_page_will_be_automatically_associated_with_the_selected_target_groups\";s:86:\"Visitors of this page will be automatically associated with the selected Target Groups\";s:19:\"assign_target_group\";s:19:\"Assign Target Group\";s:20:\"assign_target_groups\";s:20:\"Assign Target Groups\";s:13:\"target_groups\";s:13:\"Target Groups\";s:29:\"edit_content_for_target_group\";s:29:\"Edit Content for Target Group\";s:22:\"global_targeting_rules\";s:22:\"Global Targeting Rules\";s:15:\"personalization\";s:15:\"Personalization\";s:19:\"shared_translations\";s:19:\"Shared Translations\";s:9:\"textfield\";s:9:\"Textfield\";s:8:\"add_data\";s:8:\"Add data\";s:11:\"add_hotspot\";s:11:\"Add hotspot\";s:10:\"add_marker\";s:10:\"Add marker\";s:22:\"add_marker_or_hotspots\";s:22:\"Add marker or hotspots\";s:30:\"enter_the_name_of_the_new_item\";s:30:\"Enter the name of the new item\";s:14:\"custom_reports\";s:14:\"Custom Reports\";s:10:\"start_date\";s:10:\"Start date\";s:19:\"start_date_relative\";s:30:\"Start date (relative to today)\";s:8:\"end_date\";s:8:\"End date\";s:17:\"end_date_relative\";s:28:\"End date (relative to today)\";s:25:\"relative_date_description\";s:40:\"i.e. -1m +1d (d=days, m=months, y=years)\";s:17:\"source_definition\";s:17:\"Source Definition\";s:16:\"clear_thumbnails\";s:16:\"Clear Thumbnails\";s:10:\"recipients\";s:10:\"Recipients\";s:21:\"newsletter_send_error\";s:62:\"Can\'t send your newsletter, please contact your administrator!\";s:23:\"newsletter_sent_message\";s:154:\"Your newsletter is now sent to all recipients, this process is done in the background (you can close pimcore in the meantime) and can take up to one hour.\";s:59:\"do_you_really_want_to_send_the_newsletter_to_all_recipients\";s:59:\"Do you really want to send the newsletter to all recipients\";s:20:\"send_test_newsletter\";s:20:\"Send Test-Newsletter\";s:15:\"send_newsletter\";s:19:\"Send Newsletter Now\";s:13:\"object_filter\";s:13:\"Object Filter\";s:14:\"add_newsletter\";s:14:\"Add Newsletter\";s:10:\"plain_text\";s:10:\"Plain Text\";s:21:\"plain_text_email_part\";s:21:\"Email Plain Text Part\";s:10:\"newsletter\";s:10:\"Newsletter\";s:3:\"crm\";s:3:\"CRM\";s:12:\"notes_events\";s:18:\"Notes &amp; Events\";s:13:\"delete_folder\";s:13:\"Delete Folder\";s:4:\"home\";s:4:\"Home\";s:9:\"html_tags\";s:9:\"HTML-Tags\";s:7:\"subject\";s:7:\"Subject\";s:12:\"poster_image\";s:12:\"Poster-Image\";s:6:\"tablet\";s:6:\"Tablet\";s:8:\"hardlink\";s:8:\"Hardlink\";s:10:\"convert_to\";s:10:\"Convert to\";s:7:\"replace\";s:7:\"Replace\";s:9:\"targeting\";s:9:\"Targeting\";s:7:\"content\";s:7:\"Content\";s:17:\"paste_inheritance\";s:19:\"Paste (inheritance)\";s:12:\"are_you_sure\";s:13:\"Are you sure?\";s:24:\"all_content_will_be_lost\";s:24:\"All content will be lost\";s:23:\"content_master_document\";s:23:\"Content-Master Document\";s:9:\"overwrite\";s:9:\"Overwrite\";s:24:\"click_right_to_overwrite\";s:24:\"Click right to overwrite\";s:19:\"open_document_by_id\";s:13:\"Open Document\";s:16:\"open_asset_by_id\";s:10:\"Open Asset\";s:17:\"open_object_by_id\";s:11:\"Open Object\";s:8:\"open_url\";s:8:\"Open URL\";s:17:\"element_not_found\";s:17:\"Element not found\";s:15:\"import_from_url\";s:15:\"Import from URL\";s:40:\"do_you_really_want_to_leave_the_editmode\";s:46:\"Do you really want to leave the editmode (NO!)\";s:31:\"or_specify_an_asset_image_below\";s:31:\"or specify an asset image below\";s:18:\"saved_successfully\";s:19:\"Saved successfully!\";s:8:\"qr_codes\";s:8:\"QR-Codes\";s:7:\"element\";s:7:\"Element\";s:26:\"details_for_selected_event\";s:28:\"Details for selected element\";s:6:\"fields\";s:6:\"Fields\";s:24:\"not_possible_with_paging\";s:112:\"Sorry, this is not possible in elements which are paged, try to restructure your data to avoid pages in the tree\";s:9:\"inherited\";s:9:\"Inherited\";s:6:\"length\";s:6:\"Length\";s:12:\"show_in_tree\";s:12:\"Show in Tree\";s:10:\"exactmatch\";s:11:\"exact match\";s:7:\"desktop\";s:7:\"Desktop\";s:7:\"drag_me\";s:7:\"Drag Me\";s:10:\"serverVars\";s:16:\"Server Variables\";s:11:\"http_errors\";s:11:\"HTTP Errors\";s:10:\"attributes\";s:10:\"Attributes\";s:4:\"code\";s:4:\"Code\";s:4:\"tags\";s:4:\"Tags\";s:21:\"Click here to proceed\";s:21:\"Click here to proceed\";s:98:\"Your browser is not supported. Please install the latest version of one of the following browsers.\";s:98:\"Your browser is not supported. Please install the latest version of one of the following browsers.\";s:18:\"open_in_new_window\";s:18:\"Open in new Window\";s:26:\"open_preview_in_new_window\";s:26:\"Open preview in new window\";s:13:\"limit_reached\";s:13:\"Limit reached\";s:13:\"casesensitive\";s:14:\"case-sensitive\";s:12:\"path_aliases\";s:12:\"Path Aliases\";s:4:\"path\";s:4:\"Path\";s:16:\"create_redirects\";s:55:\"Create redirects to keep URLs working (incl. children)?\";s:11:\"auto_create\";s:11:\"Auto create\";s:10:\"pretty_url\";s:10:\"Pretty URL\";s:16:\"pretty_url_label\";s:47:\"Pretty URL (overrides path from tree-structure)\";s:26:\"search_engine_optimization\";s:26:\"Search Engine Optimization\";s:26:\"password_cannot_be_changed\";s:26:\"Password cannot be changed\";s:12:\"old_password\";s:12:\"Old Password\";s:12:\"new_password\";s:12:\"New Password\";s:15:\"retype_password\";s:15:\"Retype Password\";s:19:\"seo_document_editor\";s:19:\"SEO Document Editor\";s:21:\"clear_temporary_files\";s:21:\"Clear temporary files\";s:7:\"reports\";s:7:\"Reports\";s:5:\"roles\";s:5:\"Roles\";s:4:\"send\";s:4:\"Send\";s:8:\"Password\";s:8:\"Password\";s:20:\"Forgot your password\";s:20:\"Forgot your password\";s:13:\"Back to Login\";s:13:\"Back to Login\";s:76:\"Enter your username and pimcore will send a login link to your email address\";s:76:\"Enter your username and Pimcore will send a login link to your email address\";s:26:\"Please check your mailbox.\";s:26:\"Please check your mailbox.\";s:5:\"Login\";s:5:\"Login\";s:6:\"Submit\";s:6:\"Submit\";s:59:\"A temporary login link has been sent to your email address.\";s:59:\"A temporary login link has been sent to your email address.\";s:38:\"use_current_player_position_as_preview\";s:38:\"Use current player position as preview\";s:20:\"select_image_preview\";s:20:\"Select Image Preview\";s:21:\"preview_not_available\";s:21:\"Preview not available\";s:10:\"360_viewer\";s:12:\"360° Viewer\";s:16:\"standard_preview\";s:16:\"Standard Preview\";s:6:\"status\";s:6:\"Status\";s:25:\"video_preview_in_progress\";s:52:\"The preview for this video is currently in progress.\";s:54:\"php_cli_binary_and_or_ffmpeg_binary_setting_is_missing\";s:130:\"PHP-CLI binary or FFMPEG is not available, please ensure that both are installed/executable and configured in the system settings!\";s:16:\"video_thumbnails\";s:16:\"Video Thumbnails\";s:8:\"optional\";s:8:\"optional\";s:35:\"do_you_really_want_to_close_pimcore\";s:36:\"Do you really want to close Pimcore?\";s:17:\"drop_element_here\";s:17:\"Drop element here\";s:29:\"select_specific_area_of_image\";s:29:\"Select specific area of image\";s:18:\"error_pasting_item\";s:20:\"Unable to paste item\";s:35:\"paste_recursive_updating_references\";s:36:\"Paste recursive, updating references\";s:12:\"add_hardlink\";s:12:\"Add Hardlink\";s:11:\"source_path\";s:11:\"Source path\";s:22:\"properties_from_source\";s:35:\"Use properties from source document\";s:18:\"childs_from_source\";s:33:\"Use children from source document\";s:28:\"click_right_for_more_options\";s:28:\"Click right for more options\";s:11:\"move_to_tab\";s:11:\"Move to Tab\";s:13:\"not_supported\";s:13:\"Not supported\";s:9:\"edit_link\";s:9:\"Edit Link\";s:6:\"resize\";s:6:\"Resize\";s:13:\"scalebyheight\";s:15:\"Scale by Height\";s:12:\"scalebywidth\";s:14:\"Scale by Width\";s:4:\"crop\";s:4:\"Crop\";s:7:\"cleanup\";s:7:\"Cleanup\";s:29:\"this_element_cannot_be_edited\";s:29:\"This element cannot be edited\";s:7:\"details\";s:7:\"Details\";s:63:\"cannot_save_object_please_try_to_edit_the_object_in_detail_view\";s:81:\"<b>Cannot save object!</b><br />Please try to edit the object in the detail view.\";s:4:\"size\";s:4:\"Size\";s:13:\"select_a_file\";s:13:\"Select a file\";s:25:\"upload_compatibility_mode\";s:32:\"Upload File (Compatibility Mode)\";s:45:\"the_system_is_in_maintenance_mode_please_wait\";s:46:\"The system is in maintenance mode, please wait\";s:8:\"activate\";s:8:\"Activate\";s:18:\"image_is_too_small\";s:47:\"Image is too small, please choose a bigger one.\";s:19:\"name_is_not_allowed\";s:19:\"Name is not allowed\";s:18:\"import_from_server\";s:18:\"Import from Server\";s:12:\"upload_files\";s:12:\"Upload Files\";s:10:\"upload_zip\";s:18:\"Upload ZIP Archive\";s:13:\"document_root\";s:13:\"Document Root\";s:21:\"batch_change_selected\";s:19:\"Batch edit selected\";s:15:\"batch_operation\";s:15:\"Batch Operation\";s:16:\"modificationdate\";s:17:\"Modification Date\";s:15:\"download_as_zip\";s:15:\"Download as ZIP\";s:6:\"locked\";s:6:\"Locked\";s:43:\"element_cannot_be_move_because_it_is_locked\";s:45:\"Element cannot be moved because it is locked.\";s:23:\"element_cannot_be_moved\";s:32:\"The element cannot be moved here\";s:22:\"no_collections_allowed\";s:22:\"No Collections allowed\";s:37:\"this_is_a_newer_not_published_version\";s:37:\"This is a newer not published version\";s:16:\"filter_condition\";s:16:\"Filter Condition\";s:9:\"all_types\";s:9:\"All Types\";s:5:\"audio\";s:5:\"Audio\";s:5:\"video\";s:5:\"Video\";s:7:\"archive\";s:7:\"Archive\";s:7:\"unknown\";s:7:\"Unknown\";s:5:\"class\";s:5:\"Class\";s:4:\"page\";s:4:\"Page\";s:7:\"snippet\";s:7:\"Snippet\";s:6:\"folder\";s:6:\"Folder\";s:14:\"your_selection\";s:14:\"Your Selection\";s:37:\"double_click_to_add_item_to_selection\";s:61:\"Double-click an item on the left to add it to this selection.\";s:5:\"label\";s:5:\"Label\";s:17:\"error_auth_failed\";s:36:\"Login failed!<br />Please try again.\";s:21:\"error_session_expired\";s:41:\"Session expired!<br />Please login again.\";s:4:\"site\";s:4:\"Site\";s:10:\"descending\";s:10:\"Descending\";s:9:\"ascending\";s:9:\"Ascending\";s:4:\"sort\";s:4:\"Sort\";s:7:\"results\";s:7:\"Results\";s:9:\"dimension\";s:9:\"Dimension\";s:6:\"metric\";s:6:\"Metric\";s:7:\"segment\";s:7:\"Segment\";s:13:\"data_explorer\";s:13:\"Data Explorer\";s:10:\"navigation\";s:10:\"Navigation\";s:9:\"entrances\";s:9:\"Entrances\";s:5:\"exits\";s:5:\"Exits\";s:7:\"restore\";s:7:\"Restore\";s:6:\"amount\";s:6:\"Amount\";s:16:\"flush_recyclebin\";s:17:\"Flush Recycle Bin\";s:10:\"recyclebin\";s:11:\"Recycle Bin\";s:9:\"deletedby\";s:10:\"Deleted By\";s:18:\"open_select_editor\";s:21:\"Open Selection-Editor\";s:6:\"ignore\";s:6:\"Ignore\";s:5:\"blank\";s:5:\"Blank\";s:16:\"email_log_resend\";s:12:\"Resend email\";s:27:\"email_log_resend_window_msg\";s:71:\"Please confirm that you want to send the email again to all recipients.\";s:11:\"select_site\";s:13:\"Select a site\";s:9:\"main_site\";s:9:\"Main Site\";s:8:\"filename\";s:8:\"Filename\";s:20:\"unsupported_filetype\";s:20:\"Unsupported Filetype\";s:27:\"different_number_of_columns\";s:27:\"Different number of columns\";s:39:\"email_log_resend_window_success_message\";s:55:\"The email has been sent successfully to all recipients.\";s:37:\"email_log_resend_window_error_message\";s:49:\"An error occurred. The email has not been resent.\";s:10:\"error_jobs\";s:25:\"The following jobs failed\";s:12:\"batch_change\";s:14:\"Batch edit all\";s:16:\"batch_edit_field\";s:20:\"Batch edit all field\";s:25:\"batch_edit_field_selected\";s:25:\"Batch edit selected field\";s:9:\"published\";s:9:\"Published\";s:3:\"all\";s:3:\"all\";s:14:\"items_per_page\";s:14:\"Items per page\";s:22:\"reload_pimcore_changes\";s:89:\"You have to reload Pimcore for the changes to take effect, would you like to do this now?\";s:4:\"info\";s:4:\"Info\";s:30:\"area_brick_assign_info_message\";s:61:\"Please use drag & drop to assign a brick to the desired block\";s:16:\"metainfo_copy_id\";s:20:\"Copy ID to clipboard\";s:22:\"metainfo_copy_fullpath\";s:27:\"Copy full path to clipboard\";s:22:\"metainfo_copy_deeplink\";s:26:\"Copy deeplink to clipboard\";s:2:\"or\";s:2:\"or\";s:4:\"move\";s:4:\"Move\";s:14:\"paste_contents\";s:24:\"Paste only contents here\";s:14:\"paste_as_child\";s:14:\"Paste as child\";s:25:\"paste_recursive_as_childs\";s:26:\"Paste as child (recursive)\";s:13:\"view_original\";s:13:\"View Original\";s:4:\"feed\";s:4:\"Feed\";s:14:\"no_items_found\";s:14:\"No items found\";s:10:\"public_url\";s:10:\"Public URL\";s:9:\"pageviews\";s:9:\"Pageviews\";s:6:\"visits\";s:6:\"Visits\";s:6:\"detail\";s:6:\"Detail\";s:15:\"report_settings\";s:15:\"Report Settings\";s:8:\"overview\";s:8:\"Overview\";s:16:\"visitor_overview\";s:16:\"Visitor Overview\";s:5:\"other\";s:5:\"Other\";s:16:\"google_analytics\";s:16:\"Google Analytics\";s:21:\"reports_and_marketing\";s:19:\"Marketing & Reports\";s:25:\"save_only_scheduled_tasks\";s:25:\"Save only scheduled tasks\";s:15:\"modified_assets\";s:15:\"Modified Assets\";s:22:\"modification_statistic\";s:27:\"Changes in the last 31 days\";s:7:\"message\";s:7:\"Message\";s:11:\"add_portlet\";s:11:\"Add Portlet\";s:18:\"modified_documents\";s:18:\"Modified Documents\";s:16:\"modified_objects\";s:16:\"Modified Objects\";s:7:\"welcome\";s:7:\"Welcome\";s:16:\"save_and_publish\";s:14:\"Save & Publish\";s:6:\"delete\";s:6:\"Delete\";s:4:\"save\";s:4:\"Save\";s:10:\"add_assets\";s:12:\"Add Asset(s)\";s:7:\"preview\";s:7:\"Preview\";s:8:\"advanced\";s:8:\"Advanced\";s:5:\"basic\";s:5:\"Basic\";s:4:\"list\";s:4:\"List\";s:4:\"view\";s:4:\"View\";s:7:\"publish\";s:7:\"Publish\";s:6:\"rename\";s:6:\"Rename\";s:8:\"settings\";s:8:\"Settings\";s:10:\"properties\";s:10:\"Properties\";s:8:\"versions\";s:8:\"Versions\";s:3:\"add\";s:3:\"Add\";s:3:\"sum\";s:3:\"Sum\";s:4:\"date\";s:4:\"Date\";s:4:\"user\";s:4:\"User\";s:4:\"note\";s:4:\"Note\";s:4:\"from\";s:4:\"From\";s:14:\"email_reply_to\";s:8:\"Reply To\";s:2:\"to\";s:2:\"To\";s:8:\"email_cc\";s:2:\"Cc\";s:9:\"email_bcc\";s:3:\"Bcc\";s:14:\"email_settings\";s:14:\"Email Settings\";s:35:\"email_settings_receiver_description\";s:240:\"Multiple recipients can be specified by separating the email addresses with a semicolon. <br/>Example: receiver@pimcore.org; receiver2@pimcore.org<br/>For \'From\' you can use additionally the syntax <i>My Name &lt;my-name@example.com&gt;</i>\";s:10:\"email_logs\";s:11:\"Sent Emails\";s:19:\"email_log_sent_Date\";s:9:\"Date sent\";s:4:\"html\";s:4:\"HTML\";s:4:\"text\";s:4:\"Text\";s:24:\"predefined_document_type\";s:24:\"Predefined Document Type\";s:10:\"controller\";s:10:\"Controller\";s:6:\"action\";s:6:\"Action\";s:7:\"actions\";s:7:\"Actions\";s:8:\"template\";s:8:\"Template\";s:3:\"key\";s:3:\"Key\";s:2:\"id\";s:2:\"ID\";s:4:\"name\";s:4:\"Name\";s:5:\"title\";s:5:\"Title\";s:11:\"description\";s:11:\"Description\";s:9:\"unpublish\";s:9:\"Unpublish\";s:6:\"target\";s:6:\"Target\";s:4:\"type\";s:4:\"Type\";s:13:\"create_folder\";s:10:\"Add Folder\";s:25:\"please_enter_the_new_name\";s:25:\"Please enter the new name\";s:8:\"add_page\";s:8:\"Add Page\";s:11:\"add_snippet\";s:11:\"Add Snippet\";s:9:\"add_email\";s:9:\"Add Email\";s:8:\"add_link\";s:8:\"Add Link\";s:4:\"copy\";s:4:\"Copy\";s:5:\"paste\";s:5:\"Paste\";s:14:\"close_all_tabs\";s:14:\"Close all tabs\";s:6:\"search\";s:6:\"Search\";s:6:\"import\";s:6:\"Import\";s:6:\"export\";s:6:\"Export\";s:8:\"glossary\";s:8:\"Glossary\";s:14:\"document_types\";s:14:\"Document Types\";s:21:\"predefined_properties\";s:21:\"Predefined Properties\";s:5:\"users\";s:5:\"Users\";s:7:\"profile\";s:7:\"Profile\";s:10:\"my_profile\";s:10:\"My Profile\";s:13:\"documentation\";s:13:\"Documentation\";s:11:\"report_bugs\";s:11:\"Report Bugs\";s:5:\"about\";s:5:\"About\";s:4:\"file\";s:4:\"File\";s:6:\"extras\";s:6:\"Extras\";s:4:\"help\";s:4:\"Help\";s:13:\"configuration\";s:13:\"Configuration\";s:5:\"value\";s:5:\"Value\";s:21:\"add_a_custom_property\";s:21:\"Add a custom Property\";s:7:\"general\";s:7:\"General\";s:8:\"language\";s:8:\"Language\";s:7:\"quality\";s:7:\"Quality\";s:6:\"format\";s:6:\"Format\";s:9:\"documents\";s:9:\"Documents\";s:6:\"assets\";s:6:\"Assets\";s:6:\"upload\";s:6:\"Upload\";s:5:\"width\";s:5:\"Width\";s:6:\"height\";s:6:\"Height\";s:5:\"empty\";s:5:\"Empty\";s:8:\"workflow\";s:8:\"Workflow\";s:6:\"modify\";s:7:\"Modify \";s:6:\"create\";s:7:\"Create \";s:4:\"edit\";s:4:\"Edit\";s:6:\"logout\";s:6:\"Logout\";s:7:\"refresh\";s:7:\"Refresh\";s:5:\"input\";s:5:\"Input\";s:8:\"checkbox\";s:8:\"Checkbox\";s:8:\"textarea\";s:8:\"Textarea\";s:5:\"image\";s:5:\"Image\";s:6:\"select\";s:6:\"Select\";s:4:\"base\";s:4:\"Base\";s:10:\"add_object\";s:10:\"Add Object\";s:6:\"border\";s:6:\"Border\";s:8:\"document\";s:8:\"Document\";s:5:\"asset\";s:5:\"Asset\";s:6:\"object\";s:6:\"Object\";s:6:\"remove\";s:6:\"Remove\";s:19:\"hidden_dependencies\";s:81:\"There are additional dependencies your user does not have the permissions to see.\";s:4:\"open\";s:4:\"Open\";s:4:\"days\";s:4:\"Days\";s:7:\"seemode\";s:7:\"Seemode\";s:17:\"edit_current_page\";s:14:\"Edit this page\";s:5:\"close\";s:5:\"Close\";s:19:\"name_already_in_use\";s:54:\"Name is already in use, please choose a different one.\";s:28:\"name_and_key_must_be_defined\";s:29:\"Name and Type must be defined\";s:21:\"mandatory_field_empty\";s:32:\"Please fill all mandatory fields\";s:6:\"reload\";s:6:\"Reload\";s:8:\"schedule\";s:8:\"Schedule\";s:4:\"time\";s:4:\"Time\";s:7:\"version\";s:7:\"Version\";s:6:\"active\";s:6:\"Active\";s:7:\"success\";s:7:\"Success\";s:12:\"translations\";s:12:\"Translations\";s:11:\"translation\";s:11:\"Translation\";s:9:\"firstname\";s:9:\"Firstname\";s:8:\"lastname\";s:8:\"Lastname\";s:5:\"email\";s:5:\"Email\";s:24:\"cant_move_node_to_target\";s:24:\"Moving node not possible\";s:19:\"error_moving_object\";s:25:\"Object could not be moved\";s:31:\"translations_are_not_configured\";s:30:\"Translation are not configured\";s:14:\"read_more_here\";s:20:\"Read more about here\";s:15:\"publish_version\";s:15:\"Publish version\";s:21:\"save_only_new_version\";s:21:\"Only save new version\";s:5:\"start\";s:5:\"Start\";s:2:\"su\";s:2:\"Su\";s:2:\"mo\";s:2:\"Mo\";s:2:\"tu\";s:2:\"Tu\";s:2:\"we\";s:2:\"We\";s:2:\"th\";s:2:\"Th\";s:2:\"fr\";s:2:\"Fr\";s:2:\"sa\";s:2:\"Sa\";s:18:\"session_error_text\";s:144:\"It seems there is a problem with your session. We recommend to reload this page in order to be save, but you can try to save your changes first.\";s:13:\"session_error\";s:13:\"Session Error\";s:11:\"please_wait\";s:15:\"Please wait ...\";s:8:\"download\";s:8:\"Download\";s:11:\"inheritable\";s:11:\"Inheritable\";s:9:\"redirects\";s:9:\"Redirects\";s:6:\"source\";s:6:\"Source\";s:4:\"link\";s:4:\"Link\";s:5:\"links\";s:5:\"Links\";s:4:\"abbr\";s:5:\"Abbr.\";s:4:\"stop\";s:4:\"Stop\";s:12:\"dependencies\";s:12:\"Dependencies\";s:8:\"requires\";s:8:\"Requires\";s:11:\"required_by\";s:11:\"Required By\";s:11:\"search_edit\";s:23:\"Search, Edit and Export\";s:7:\"subtype\";s:7:\"Subtype\";s:12:\"initializing\";s:16:\"Initializing ...\";s:20:\"please_select_a_type\";s:20:\"Please select a type\";s:6:\"filter\";s:6:\"Filter\";s:8:\"test_url\";s:8:\"Test URL\";s:5:\"field\";s:5:\"Field\";s:8:\"operator\";s:8:\"Operator\";s:5:\"apply\";s:5:\"Apply\";s:4:\"show\";s:4:\"Show\";s:10:\"robots.txt\";s:10:\"robots.txt\";s:6:\"public\";s:6:\"Public\";s:18:\"maximum_2_versions\";s:31:\"You can compare max. 2 versions\";s:5:\"error\";s:5:\"Error\";s:17:\"element_is_locked\";s:58:\"The desired element is currently opened by another person:\";s:21:\"element_lock_question\";s:33:\"Would you like to open it anyway?\";s:5:\"since\";s:5:\"Since\";s:9:\"longitude\";s:9:\"Longitude\";s:8:\"latitude\";s:8:\"Latitude\";s:8:\"geopoint\";s:16:\"Geographic Point\";s:6:\"cancel\";s:6:\"Cancel\";s:18:\"open_search_editor\";s:18:\"Open Search Editor\";s:10:\"parameters\";s:10:\"Parameters\";s:6:\"anchor\";s:6:\"Anchor\";s:9:\"accesskey\";s:9:\"Accesskey\";s:8:\"relation\";s:8:\"Relation\";s:8:\"tabindex\";s:9:\"Tab-Index\";s:7:\"not_set\";s:7:\"not set\";s:10:\"export_csv\";s:10:\"CSV Export\";s:11:\"export_xlsx\";s:11:\"XLSX Export\";s:10:\"import_csv\";s:10:\"CSV Import\";s:19:\"show_welcome_screen\";s:30:\"Show welcome screen on startup\";s:20:\"importFileHasHeadRow\";s:20:\"first row = headline\";s:19:\"error_deleting_item\";s:21:\"Could not delete item\";s:42:\"overwrite_object_with_same_key_description\";s:504:\"When overwrite is checked, instead of creating a new object for each import row, objects with the same key are replaced. Existing objects in your import folder with keys not contained in the import file will remain untouched. Please be aware that all objects which have a matching key in the import file will be replaced in the target folder. This is also true for objects based on a different class or even object folders! Object fields which are set to ignore in the field mapping keep their old value.\";s:34:\"object_import_filename_description\";s:57:\"select the field which is used to generate the object key\";s:17:\"save_pubish_close\";s:23:\"Save, publish and close\";s:10:\"save_close\";s:14:\"Save and close\";s:13:\"error_general\";s:99:\"Server threw exception - could not perform action. Please reload the admin interface and try again.\";s:11:\"owner_class\";s:11:\"Owner class\";s:11:\"owner_field\";s:11:\"Owner field\";s:22:\"nonownerobject_warning\";s:109:\"The current object is not the owner of these relations, making changes here might make saving the object slow\";s:30:\"element_implicit_edit_question\";s:63:\"Would you still like to implicitly  modify it with this action?\";s:20:\"element_open_message\";s:48:\"The desired element is already open for editing.\";s:30:\"nonownerobjects_self_selection\";s:113:\"In non owner objects a  relation to myself is not possible, please use original field instead of non owner field.\";s:7:\"warning\";s:7:\"Warning\";s:7:\"consent\";s:7:\"Consent\";s:25:\"csv_object_export_warning\";s:181:\"Please note that the CSV export does not support all data types. Consequently, re-importing an exported CSV to pimcore might lead to data loss. Press OK to continue with the export.\";s:21:\"object_export_warning\";s:98:\"Please note that the export does not support all data types. Press OK to continue with the export.\";s:19:\"error_renaming_item\";s:43:\"There was an error while renaming the item.\";s:18:\"navigation_exclude\";s:23:\"Exclude from Navigation\";s:8:\"variants\";s:8:\"Variants\";s:7:\"variant\";s:7:\"Variant\";s:11:\"add_variant\";s:11:\"Add variant\";s:27:\"delete_message_dependencies\";s:38:\"There are dependencies, delete anyway?\";s:14:\"delete_message\";s:39:\"Do you really want to delete this item?\";s:20:\"delete_class_message\";s:41:\"Do you really want to delete class \'%s\' ?\";s:20:\"delete_message_batch\";s:44:\"Do you really want to delete these elements?\";s:18:\"delete_error_batch\";s:84:\"Following items cannot be deleted, do you wanna proceed with deleting the remaining?\";s:12:\"delete_error\";s:35:\"The item cannot be deleted. Reason:\";s:31:\"no_further_objectbricks_allowed\";s:31:\"No further objectbricks allowed\";s:21:\"grid_current_language\";s:16:\"Current language\";s:14:\"object_columns\";s:14:\"Object columns\";s:14:\"system_columns\";s:14:\"System columns\";s:7:\"columns\";s:7:\"Columns\";s:13:\"children_grid\";s:13:\"Children Grid\";s:13:\"only_children\";s:20:\"just direct children\";s:17:\"only_unreferenced\";s:17:\"only unreferenced\";s:3:\"cut\";s:3:\"Cut\";s:17:\"paste_cut_element\";s:21:\"Paste cut-out element\";s:13:\"memorize_tabs\";s:18:\"Memorize open tabs\";s:15:\"element_history\";s:24:\"Recently Opened Elements\";s:10:\"dashboards\";s:10:\"Dashboards\";s:20:\"portlet_customreport\";s:13:\"Custom Report\";s:24:\"clear_marker_or_hotspots\";s:39:\"Clear Marker, Hotspot and Cropping Data\";s:16:\"hotspots_cleared\";s:43:\"Hotspots, Markers and Cropping Data cleared\";s:8:\"deeplink\";s:8:\"Deeplink\";s:13:\"click_to_open\";s:15:\"(click to open)\";s:12:\"add_metadata\";s:12:\"Add Metadata\";s:26:\"pimcore_icon_edit_pdf_text\";s:17:\"Edit text version\";s:7:\"chapter\";s:7:\"Chapter\";s:15:\"search_and_move\";s:13:\"Search & Move\";s:9:\"searching\";s:12:\"Searching...\";s:25:\"predefined_asset_metadata\";s:25:\"Predefined Asset Metadata\";s:35:\"add_predefined_metadata_definitions\";s:26:\"Add predefined definitions\";s:9:\"scheduled\";s:9:\"Scheduled\";s:26:\"naming_requirements_3chars\";s:56:\"Name must be alphanumeric and at least 3 characters long\";s:22:\"there_are_more_columns\";s:47:\"There are more columns than currently displayed\";s:9:\"merge_csv\";s:22:\"Import &amp; Merge CSV\";s:26:\"translation_merger_current\";s:12:\"Current Text\";s:22:\"translation_merger_csv\";s:13:\"Text from CSV\";s:16:\"nothing_to_merge\";s:25:\"There is nothing to merge\";s:21:\"csv_seperated_options\";s:21:\"CSV seperated options\";s:26:\"csv_seperated_options_info\";s:173:\"The list of available options can be specified as comma-seperated list, as single-column values or  mixed. For the single-column way, the key will also be used as the value.\";s:10:\"first_page\";s:10:\"First Page\";s:13:\"previous_page\";s:13:\"Previous Page\";s:9:\"next_page\";s:9:\"Next Page\";s:9:\"last_page\";s:9:\"Last Page\";s:18:\"no_data_to_display\";s:18:\"No data to display\";s:29:\"classificationstore_no_groups\";s:15:\"No groups found\";s:27:\"classificationstore_no_keys\";s:13:\"No keys found\";s:34:\"classificationstore_no_collections\";s:14:\"No collections\";s:12:\"remove_group\";s:12:\"Remove Group\";s:9:\"reference\";s:9:\"Reference\";s:17:\"converter_service\";s:17:\"Converter service\";s:25:\"element_tag_configuration\";s:17:\"Tag Configuration\";s:20:\"element_tag_all_tags\";s:8:\"All Tags\";s:25:\"element_tag_filtered_tags\";s:13:\"Filtered Tags\";s:25:\"enter_new_name_of_the_tag\";s:25:\"Enter new name of the Tag\";s:13:\"assigned_tags\";s:13:\"Assigned Tags\";s:11:\"filter_tags\";s:15:\"Filter for Tags\";s:19:\"consider_child_tags\";s:23:\"Consider child tags too\";s:15:\"tags_assignment\";s:15:\"Tags Assignment\";s:11:\"tags_search\";s:11:\"Tags Search\";s:6:\"revert\";s:6:\"Revert\";s:18:\"identifier_warning\";s:95:\"Be careful with the unique identifier because table names can contain only up to 64 characters.\";s:17:\"unique_identifier\";s:17:\"Unique identifier\";s:18:\"invalid_identifier\";s:18:\"Invalid identifier\";s:25:\"identifier_already_exists\";s:25:\"Identifier already exists\";s:13:\"batch_applied\";s:13:\"Batch applied\";s:10:\"apply_tags\";s:22:\"Apply tags to Children\";s:21:\"remove_and_apply_tags\";s:33:\"Remove and apply tags to children\";s:16:\"batch_assignment\";s:20:\"Tag batch assignment\";s:22:\"batch_assignment_error\";s:26:\"Tag batch assignment error\";s:17:\"no_children_found\";s:18:\"No Children found.\";s:12:\"asset_search\";s:13:\"Search Assets\";s:15:\"document_search\";s:16:\"Search Documents\";s:13:\"object_search\";s:14:\"Search Objects\";s:4:\"more\";s:4:\"More\";s:16:\"open_translation\";s:16:\"Open Translation\";s:22:\"link_existing_document\";s:22:\"Link existing Document\";s:17:\"using_inheritance\";s:17:\"Using Inheritance\";s:12:\"new_document\";s:12:\"New Document\";s:6:\"parent\";s:6:\"Parent\";s:16:\"update_available\";s:16:\"Update Available\";s:23:\"target_document_invalid\";s:51:\"Please select a target document with valid language\";s:30:\"target_document_needs_language\";s:36:\"Target document needs a language set\";s:5:\"tools\";s:5:\"Tools\";s:12:\"perspectives\";s:12:\"Perspectives\";s:13:\"filter_active\";s:14:\"Filter active!\";s:17:\"save_grid_options\";s:17:\"Save Grid Options\";s:12:\"reset_config\";s:13:\"Reset changes\";s:20:\"reset_config_tooltip\";s:88:\"This will reset (and save) the grid column configuration for this element to its default\";s:22:\"error_resetting_config\";s:29:\"Error resetting configuration\";s:18:\"marketing_settings\";s:18:\"Marketing Settings\";s:30:\"cross_tree_moves_not_supported\";s:34:\"Cross tree moves not yet supported\";s:13:\"add_printpage\";s:13:\"Add PrintPage\";s:18:\"add_printcontainer\";s:18:\"Add PrintContainer\";s:21:\"web2print_preview_pdf\";s:22:\"Generate & Preview PDF\";s:29:\"web2print_cancel_pdf_creation\";s:19:\"Cancel PDF Creation\";s:22:\"web2print_generate_pdf\";s:12:\"Generate PDF\";s:22:\"web2print_download_pdf\";s:12:\"Download PDF\";s:24:\"web2print_last-generated\";s:14:\"Last Generated\";s:31:\"web2print_last-generate-message\";s:21:\"Last Generate Message\";s:9:\"web2print\";s:12:\"Web-to-Print\";s:32:\"web2print_prepare_pdf_generation\";s:22:\"Prepare PDF Generation\";s:30:\"web2print_start_html_rendering\";s:20:\"Start HTML Rendering\";s:33:\"web2print_finished_html_rendering\";s:23:\"Finished HTML Rendering\";s:25:\"web2print_saved_html_file\";s:15:\"Saved HTML File\";s:24:\"web2print_pdf_conversion\";s:14:\"PDF Conversion\";s:29:\"web2print_saving_pdf_document\";s:17:\"Save PDF Document\";s:16:\"web2print_author\";s:6:\"Author\";s:22:\"web2print_printermarks\";s:12:\"Printermarks\";s:22:\"web2print_addOverprint\";s:12:\"Overprinting\";s:19:\"web2print_bookmarks\";s:9:\"Bookmarks\";s:9:\"close_tab\";s:9:\"Close Tab\";s:24:\"web2print_only_published\";s:39:\"Only possible with published documents.\";s:27:\"web2print_documents_changed\";s:44:\"Documents changed since last pdf generation.\";s:25:\"web2print_enableDebugMode\";s:17:\"Enable debug mode\";s:32:\"web2print_enableLenientHttpsMode\";s:25:\"Enable lenient HTTPS mode\";s:36:\"web2print_enableLenientHttpsMode_txt\";s:72:\"Enable this option if PDFreactor fails to connect successfully via HTTPS\";s:13:\"about_pimcore\";s:22:\"ABOUT PIMCORE PLATFORM\";s:5:\"phone\";s:5:\"Phone\";s:24:\"workflow_additional_info\";s:22:\"Additional Information\";s:5:\"notes\";s:5:\"Notes\";s:16:\"workflow_actions\";s:7:\"Actions\";s:23:\"workflow_perform_action\";s:14:\"Perform Action\";s:23:\"workflow_notes_required\";s:16:\"Notes (Required)\";s:23:\"workflow_notes_optional\";s:16:\"Notes (Optional)\";s:36:\"workflow_notes_requred_field_message\";s:25:\"\"%s\" is a required field.\";s:40:\"workflow_transition_applied_successfully\";s:27:\"Action applied successfully\";s:42:\"workflow_change_email_notification_subject\";s:39:\"Workflow update for %s in workflow \'%s\'\";s:39:\"workflow_change_email_notification_text\";s:65:\"For %s with ID %s the action \"%s\" was triggered in workflow \'%s\'.\";s:43:\"workflow_change_email_notification_deeplink\";s:24:\"Deeplink to the element.\";s:39:\"workflow_change_email_notification_note\";s:11:\"Note Added:\";s:16:\"workflow_details\";s:16:\"Workflow Details\";s:14:\"workflow_graph\";s:14:\"Workflow Graph\";s:22:\"workflow_current_state\";s:13:\"Current State\";s:22:\"workflow_cmd_not_found\";s:86:\"Please install the \"%s\" console executable on the server to render the workflow graph.\";s:32:\"please_enter_the_id_of_the_asset\";s:64:\"Please enter the ID or Path (e.g. /images/logo.jpg) of the asset\";s:33:\"please_enter_the_id_of_the_object\";s:41:\"Please enter the ID or Path of the object\";s:35:\"please_enter_the_id_of_the_document\";s:73:\"Please enter the ID, Path or URL (also including http://) of the document\";s:27:\"element_has_unsaved_changes\";s:27:\"Element has unsaved changes\";s:31:\"element_unsaved_changes_message\";s:54:\"All unsaved changes will be lost, are you really sure?\";s:35:\"newsletter_enableTrackingParameters\";s:32:\"Add Tracking Parameters to Links\";s:6:\"medium\";s:6:\"Medium\";s:22:\"newsletter_sendingMode\";s:12:\"Sending Mode\";s:29:\"newsletter_sendingmode_single\";s:39:\"Single (Render every Mail individually)\";s:28:\"newsletter_sendingmode_batch\";s:29:\"Batch (Render Mail only once)\";s:23:\"newsletter_sendingPanel\";s:24:\"Newsletter Sending Panel\";s:24:\"newsletter_dirty_warning\";s:47:\"Newsletter is not saved yet. Please save first.\";s:18:\"newsletter_sending\";s:18:\"Sending Newsletter\";s:24:\"newsletter_sourceAdapter\";s:22:\"Address Source Adapter\";s:18:\"newsletter_default\";s:19:\"Default Object List\";s:18:\"newsletter_csvList\";s:8:\"CSV List\";s:19:\"newsletter_testsend\";s:23:\"Newsletter Test Sending\";s:28:\"newsletter_test_sent_message\";s:33:\"Test Newsletter sent successfully\";s:20:\"add_object_mbx_title\";s:25:\"Add new Object of type %s\";s:18:\"merge_translations\";s:18:\"Merge Translations\";s:24:\"newsletter_choose_report\";s:15:\"Choose a report\";s:27:\"newsletter_email_field_name\";s:16:\"Email field name\";s:4:\"mode\";s:4:\"Mode\";s:15:\"custom_download\";s:15:\"Custom Download\";s:13:\"original_file\";s:13:\"Original File\";s:10:\"web_format\";s:10:\"Web Format\";s:12:\"print_format\";s:12:\"Print Format\";s:13:\"office_format\";s:13:\"Office Format\";s:15:\"change_password\";s:15:\"Change Password\";s:32:\"file_is_bigger_that_upload_limit\";s:73:\"The following file is bigger than the actual upload limit of your server:\";s:23:\"send_test_email_success\";s:95:\"Your test-email has been sent. Would you like to keep this window open to send the email again?\";s:32:\"press_crtl_and_select_to_compare\";s:35:\"Compare: Press CTRL + Click Version\";s:13:\"clear_filters\";s:13:\"Clear Filters\";s:18:\"tags_configuration\";s:18:\"Tags Configuration\";s:26:\"export_csv_include_headers\";s:23:\"CSV Export with headers\";s:19:\"analyze_permissions\";s:19:\"Analyze Permissions\";s:6:\"unique\";s:6:\"Unique\";s:4:\"glue\";s:4:\"Glue\";s:6:\"prefix\";s:6:\"Prefix\";s:11:\"date_format\";s:11:\"Date Format\";s:9:\"attribute\";s:9:\"Attribute\";s:17:\"forward_attribute\";s:17:\"Forward Attribute\";s:5:\"upper\";s:5:\"Upper\";s:5:\"lower\";s:5:\"Lower\";s:8:\"disabled\";s:8:\"Disabled\";s:14:\"capitalization\";s:14:\"Capitalization\";s:19:\"restrict_to_locales\";s:19:\"Restrict to locales\";s:10:\"predefined\";s:10:\"Predefined\";s:12:\"save_as_copy\";s:12:\"Save as copy\";s:16:\"set_as_favourite\";s:16:\"Set as favourite\";s:18:\"grid_configuration\";s:18:\"Grid Configuration\";s:12:\"shared_users\";s:12:\"Shared Users\";s:12:\"shared_roles\";s:12:\"Shared Roles\";s:14:\"save_and_share\";s:12:\"Save & Share\";s:19:\"save_copy_and_share\";s:17:\"Save Copy & Share\";s:6:\"locale\";s:6:\"Locale\";s:8:\"ellipses\";s:8:\"Ellipses\";s:11:\"insensitive\";s:11:\"Insensitive\";s:9:\"yes_value\";s:9:\"Yes Value\";s:8:\"no_value\";s:8:\"No Value\";s:11:\"count_empty\";s:11:\"Count Empty\";s:8:\"as_array\";s:8:\"As array\";s:14:\"metadata_field\";s:14:\"Metadata field\";s:10:\"only_count\";s:13:\"Only as count\";s:9:\"parameter\";s:9:\"Parameter\";s:17:\"forward_parameter\";s:17:\"Forward Parameter\";s:8:\"is_array\";s:10:\"Array Type\";s:9:\"php_class\";s:9:\"PHP Class\";s:15:\"additional_data\";s:15:\"Additional Data\";s:7:\"flatten\";s:7:\"Flatten\";s:18:\"return_last_result\";s:18:\"Return last result\";s:9:\"skip_null\";s:9:\"Skip Null\";s:15:\"expand_children\";s:15:\"Expand children\";s:8:\"subtract\";s:8:\"Subtract\";s:8:\"multiply\";s:8:\"Multiply\";s:6:\"divide\";s:6:\"Divide\";s:20:\"apply_to_all_objects\";s:12:\"Apply to all\";s:24:\"apply_to_all_objects_msg\";s:123:\"There are other objects which already have their own favourite settings. Do you want to apply this config to those as well?\";s:6:\"encode\";s:6:\"Encode\";s:6:\"decode\";s:6:\"Decode\";s:9:\"serialize\";s:9:\"Serialize\";s:11:\"unserialize\";s:11:\"Unserialize\";s:6:\"offset\";s:6:\"Offset\";s:13:\"col_attribute\";s:20:\"Collection Attribute\";s:15:\"brick_attribute\";s:15:\"Brick Attribute\";s:24:\"csv_column_configuration\";s:20:\"Column Configuration\";s:6:\"column\";s:6:\"Column\";s:17:\"resolver_strategy\";s:17:\"Resolver Strategy\";s:17:\"resolver_settings\";s:17:\"Resolver Settings\";s:12:\"csv_settings\";s:12:\"CSV Settings\";s:11:\"skipheadrow\";s:13:\"Skip head row\";s:16:\"csv_file_preview\";s:16:\"CSV File Preview\";s:7:\"save_as\";s:7:\"Save as\";s:4:\"load\";s:4:\"Load\";s:27:\"import_export_configuration\";s:27:\"Import Export Configuration\";s:10:\"brick_type\";s:10:\"Brick Type\";s:8:\"renderer\";s:8:\"Renderer\";s:6:\"getter\";s:6:\"Getter\";s:6:\"string\";s:6:\"String\";s:4:\"bool\";s:4:\"Bool\";s:3:\"row\";s:3:\"Row\";s:13:\"import_report\";s:13:\"Import Report\";s:13:\"import_errors\";s:46:\"Some errors occurred. Check the import report!\";s:14:\"import_is_done\";s:14:\"Import is done\";s:18:\"import_file_prefix\";s:20:\"Prefix for new files\";s:14:\"skip_if_exists\";s:18:\"Skip row if exists\";s:20:\"php_class_or_service\";s:21:\"Class or service name\";s:14:\"create_parents\";s:14:\"Create parents\";s:8:\"fullpath\";s:9:\"Full Path\";s:16:\"create_on_demand\";s:16:\"Create on demand\";s:15:\"get_by_resolver\";s:16:\"Get By Attribute\";s:6:\"direct\";s:6:\"Direct\";s:17:\"skip_empty_values\";s:17:\"Skip empty values\";s:16:\"do_not_overwrite\";s:16:\"Do not overwrite\";s:5:\"never\";s:5:\"Never\";s:12:\"if_not_empty\";s:12:\"If not empty\";s:6:\"always\";s:6:\"Always\";s:9:\"delimiter\";s:9:\"Delimiter\";s:14:\"share_globally\";s:14:\"Share globally\";s:19:\"gdpr_data_extractor\";s:19:\"GDPR Data Extractor\";s:16:\"no_configuration\";s:16:\"No Configuration\";s:20:\"share_configurations\";s:20:\"Share configurations\";s:18:\"enable_inheritance\";s:18:\"Enable Inheritance\";s:15:\"object_settings\";s:15:\"Object Settings\";s:12:\"drop_me_here\";s:43:\"Drag an item from the tree and drop it here\";s:18:\"clear_hotspots_msg\";s:96:\"This image contains additional data like markers or hotspots. Do you want to clear them as well?\";s:14:\"restore_failed\";s:14:\"Restore failed\";s:16:\"batch_append_all\";s:19:\"Batch append to all\";s:21:\"batch_append_selected\";s:24:\"Batch append to selected\";s:15:\"batch_append_to\";s:18:\"Append data to all\";s:24:\"batch_append_selected_to\";s:23:\"Append data to selected\";s:16:\"batch_remove_all\";s:21:\"Batch remove from all\";s:21:\"batch_remove_selected\";s:26:\"Batch remove from selected\";s:17:\"batch_remove_from\";s:20:\"Remove data from all\";s:26:\"batch_remove_selected_from\";s:25:\"Remove data from selected\";s:16:\"sort_children_by\";s:16:\"Sort Children By\";s:6:\"by_key\";s:12:\"Key (A to Z)\";s:14:\"by_key_reverse\";s:12:\"Key (Z to A)\";s:8:\"by_index\";s:14:\"Index (Manual)\";s:47:\"successful_object_change_children_sort_to_index\";s:40:\"Changed object children sorting to Index\";s:45:\"successful_object_change_children_sort_to_key\";s:38:\"Changed object children sorting to Key\";s:42:\"error_object_change_children_sort_to_index\";s:49:\"Unable to change object children sorting to Index\";s:40:\"error_object_change_children_sort_to_key\";s:47:\"Unable to change object children sorting to Key\";s:21:\"clear_version_message\";s:72:\"Do you really want to delete all non-published versions of this element?\";s:9:\"clear_all\";s:9:\"Clear All\";s:23:\"error_empty_file_upload\";s:14:\"File is empty!\";s:12:\"edit_as_html\";s:12:\"Edit as HTML\";s:18:\"edit_as_plain_text\";s:18:\"Edit as plain text\";s:19:\"edit_as_custom_text\";s:19:\"Edit as custom text\";s:24:\"symfony_translation_link\";s:83:\"Translation Format: https://symfony.com/doc/current/translation/message_format.html\";s:11:\"type_column\";s:11:\"Type column\";s:4:\"keep\";s:4:\"keep\";s:24:\"download_selected_as_zip\";s:30:\"Download selected items as ZIP\";s:31:\"please_select_items_to_download\";s:43:\"Please select items to download in the list\";s:24:\"unlink_existing_document\";s:24:\"Unlink existing Document\";s:34:\"scheduled_block_delete_all_in_past\";s:23:\"Delete all past entries\";s:34:\"scheduled_block_really_delete_past\";s:48:\"Really delete all entries scheduled in the past?\";s:26:\"scheduled_block_delete_all\";s:18:\"Delete all entries\";s:33:\"scheduled_block_really_delete_all\";s:62:\"Really delete all scheduled entries, including future entries?\";s:12:\"key_bindings\";s:12:\"Key Bindings\";s:26:\"keybinding_openClassEditor\";s:17:\"Open Class Editor\";s:23:\"keybinding_showMetaInfo\";s:14:\"Show Meta Info\";s:25:\"keybinding_clearAllCaches\";s:16:\"Clear all Caches\";s:25:\"keybinding_clearDataCache\";s:16:\"Clear Data Cache\";s:11:\"2fa_disable\";s:11:\"Disable 2FA\";s:16:\"renew_2fa_secret\";s:23:\"Renew Two Factor Secret\";s:25:\"two_factor_authentication\";s:25:\"Two Factor Authentication\";s:14:\"2fa_alert_text\";s:289:\"Please scan the QR-Code and add it to your Google Authenticator. <br>If you don\'t have the Google Authenticator app installed on your mobile phone, please download it from the App Store/Play Store.<br><br> You will need to reload Pimcore and enter the code shown within the App afterwards!\";s:16:\"2fa_alert_submit\";s:27:\"Reload Pimcore & Enter Code\";s:16:\"setup_two_factor\";s:31:\"Setup Two Factor Authentication\";s:17:\"2fa_setup_message\";s:152:\"Two Factor Authentication is required for your account! You have to set it up in your profile settings, otherwise you will not be able to sign in again.\";s:15:\"set_focal_point\";s:15:\"Set Focal Point\";s:32:\"toggle_image_features_visibility\";s:31:\"Toggle Image Feature Visibility\";s:13:\"saving_failed\";s:14:\"Saving failed!\";s:25:\"failed_to_create_new_item\";s:44:\"Failed to create new item, please try again.\";s:6:\"bundle\";s:6:\"Bundle\";s:7:\"bundles\";s:7:\"Bundles\";s:6:\"bricks\";s:6:\"Bricks\";s:7:\"product\";s:7:\"Product\";s:27:\"index_field_selection_field\";s:21:\"Index Field Selection\";s:24:\"indexFieldSelectionField\";s:21:\"Index Field Selection\";s:33:\"indexFieldSelectionField_settings\";s:44:\"Settings (Multi Index Field Selection Field)\";s:29:\"indexFieldSelectionFieldMulti\";s:30:\"Multiple Index Field Selection\";s:27:\"index_field_selection_combo\";s:20:\"Index Field Combobox\";s:24:\"indexFieldSelectionCombo\";s:20:\"Index Field Combobox\";s:33:\"indexFieldSelectionCombo_settings\";s:31:\"Settings (Index Field Combobox)\";s:18:\"specificPriceField\";s:20:\"Specific Price Field\";s:13:\"showAllFields\";s:15:\"Show all Fields\";s:15:\"considerTenants\";s:16:\"Consider Tenants\";s:25:\"bundle_ecommerce_mainmenu\";s:11:\"Online Shop\";s:30:\"bundle_ecommerce_pricing_rules\";s:13:\"Pricing Rules\";s:40:\"bundle_ecommerce_pricing_config_behavior\";s:8:\"Behavior\";s:39:\"bundle_ecommerce_pricing_config_additiv\";s:7:\"Additiv\";s:43:\"bundle_ecommerce_pricing_config_stopExecute\";s:9:\"Last rule\";s:51:\"bundle_ecommerce_pricing_config_condition_daterange\";s:10:\"Date range\";s:53:\"bundle_ecommerce_pricing_config_condition_cart_amount\";s:11:\"Cart amount\";s:50:\"bundle_ecommerce_pricing_config_condition_products\";s:8:\"Products\";s:8:\"category\";s:8:\"Category\";s:47:\"bundle_ecommerce_pricing_config_condition_token\";s:5:\"Token\";s:47:\"bundle_ecommerce_pricing_config_condition_sales\";s:5:\"Sales\";s:46:\"bundle_ecommerce_pricing_config_condition_sold\";s:4:\"Sold\";s:52:\"bundle_ecommerce_pricing_config_condition_sold_count\";s:5:\"Count\";s:57:\"bundle_ecommerce_pricing_config_condition_sold_count_cart\";s:10:\"Count Cart\";s:54:\"bundle_ecommerce_pricing_config_condition_voucherToken\";s:7:\"Voucher\";s:13:\"error_message\";s:13:\"Error Message\";s:48:\"bundle_ecommerce_pricing_config_condition_tenant\";s:6:\"Tenant\";s:53:\"bundle_ecommerce_pricing_config_condition_targetgroup\";s:12:\"Target Group\";s:63:\"bundle_ecommerce_pricing_config_condition_targetgroup_threshold\";s:9:\"Threshold\";s:43:\"bundle_ecommerce_pricing_config_action_gift\";s:4:\"Gift\";s:52:\"bundle_ecommerce_pricing_config_action_cart_discount\";s:13:\"Cart discount\";s:60:\"bundle_ecommerce_pricing_config_action_cart_discount_percent\";s:13:\"Discount in %\";s:59:\"bundle_ecommerce_pricing_config_action_cart_discount_amount\";s:17:\"Absolute Discount\";s:55:\"bundle_ecommerce_pricing_config_action_product_discount\";s:16:\"Product discount\";s:63:\"bundle_ecommerce_pricing_config_action_product_discount_percent\";s:13:\"Discount in %\";s:62:\"bundle_ecommerce_pricing_config_action_product_discount_amount\";s:17:\"Absolute Discount\";s:52:\"bundle_ecommerce_pricing_config_action_free_shipping\";s:13:\"Free shipping\";s:9:\"ecommerce\";s:10:\"E-Commerce\";s:13:\"preSelectMode\";s:15:\"Pre Select Mode\";s:13:\"remote_single\";s:25:\"Single Select from Remote\";s:12:\"remote_multi\";s:24:\"Multi Select from Remote\";s:12:\"local_single\";s:34:\"Single Select from predefined List\";s:11:\"local_multi\";s:33:\"Multi Select from predefined List\";s:19:\"indexFieldSelection\";s:21:\"Index Field Selection\";s:28:\"indexFieldSelection_settings\";s:30:\"Index Field Selection Settings\";s:12:\"filtergroups\";s:13:\"Filter Groups\";s:9:\"preSelect\";s:10:\"Pre Select\";s:29:\"predefined_pre_select_options\";s:29:\"Predefined pre select options\";s:35:\"bundle_ecommerce_clear_config_cache\";s:25:\"Clear configuration cache\";s:34:\"bundle_ecommerce_back-office_order\";s:22:\"Back Office - Ordering\";s:35:\"bundle_ecommerce_vouchertoolkit_tab\";s:15:\"Voucher Details\";s:26:\"bundle_ecommerce_order_tab\";s:13:\"Order Details\";s:9:\"thumbnail\";s:9:\"Thumbnail\";s:18:\"download_thumbnail\";s:18:\"Download Thumbnail\";s:21:\"no_thumbnail_selected\";s:21:\"No thumbnail selected\";s:55:\"list_thumbnail_in_download_section_on_image_detail_view\";s:55:\"List as option in download section on image detail view\";s:20:\"there_are_more_items\";s:35:\"There are more items than displayed\";s:10:\"unit_width\";s:10:\"Width Unit\";s:18:\"permission_missing\";s:51:\"You need the \'%s\' permission to perform this action\";s:25:\"paste_as_language_variant\";s:29:\"Paste as new language variant\";s:32:\"select_language_for_new_document\";s:32:\"Select language for New Document\";s:32:\"source_document_language_missing\";s:43:\"Set Language(Properties) in Source Document\";s:26:\"document_language_overview\";s:26:\"Document Language Overview\";s:15:\"language_master\";s:6:\"Master\";s:30:\"create_translation_inheritance\";s:32:\"Create Translation (Inheritance)\";s:18:\"create_translation\";s:18:\"Create Translation\";s:37:\"document_translation_parent_not_found\";s:78:\"Parent document has no translation. Create a translation for the parent first.\";s:25:\"enable_batch_edit_columns\";s:29:\"Enable Batch Edit for Columns\";s:10:\"delete_all\";s:10:\"Delete All\";s:19:\"open_linked_element\";s:19:\"Open linked Element\";s:12:\"mark_as_read\";s:12:\"Mark as read\";s:6:\"sender\";s:6:\"Sender\";s:13:\"notifications\";s:13:\"Notifications\";s:18:\"notifications_send\";s:18:\"Send Notifications\";s:5:\"group\";s:5:\"Group\";s:10:\"attachment\";s:10:\"Attachment\";s:26:\"notification_has_been_sent\";s:26:\"Notification has been sent\";s:9:\"recipient\";s:9:\"Recipient\";s:22:\"this_field_is_required\";s:22:\"This field is required\";s:35:\"paste_recursive_as_language_variant\";s:41:\"Paste as new language variant (recursive)\";s:27:\"paste_no_new_language_error\";s:54:\"All system languages already linked to source element.\";s:18:\"embedded_meta_data\";s:18:\"Embedded Meta Info\";s:8:\"duration\";s:8:\"Duration\";s:16:\"group_icon_class\";s:16:\"Group Icon Class\";s:25:\"custom_report_permissions\";s:10:\"Permission\";s:16:\"visible_to_users\";s:16:\"Visible To Users\";s:16:\"visible_to_roles\";s:16:\"Visible To Roles\";s:55:\"paste_recursive_as_language_variant_updating_references\";s:47:\"Paste language (recursive), updating references\";s:25:\"redirects_expired_cleanup\";s:25:\"Cleanup Expired Redirects\";s:25:\"redirects_cleanup_warning\";s:48:\"Do you really want to cleanup expired redirects?\";s:23:\"redirects_cleanup_error\";s:52:\"An error occurred while cleanup of expired redirects\";s:12:\"auto_convert\";s:20:\"Automatic conversion\";s:19:\"split_view_settings\";s:19:\"Split View Settings\";s:17:\"enable_split_view\";s:17:\"Enable Split View\";s:18:\"disable_split_view\";s:18:\"Disable Split View\";s:29:\"split_view_object_dirty_title\";s:14:\"Please confirm\";s:27:\"split_view_object_dirty_msg\";s:73:\"There are unsaved modifications. You will lose all changes. Are you sure?\";s:16:\"all_translations\";s:16:\"All Translations\";s:11:\"set_to_null\";s:19:\"Empty (set to null)\";s:12:\"unit_tooltip\";s:25:\"Alternative units tooltip\";s:23:\"share_via_notifications\";s:23:\"Share via Notifications\";s:14:\"asset_metadata\";s:14:\"Asset Metadata\";s:19:\"predefined_metadata\";s:19:\"Predefined Metadata\";s:16:\"default_metadata\";s:16:\"Default Metadata\";s:20:\"asset_export_warning\";s:115:\"Please note that the export does not support some fields(e.g. preview, size). Press OK to continue with the export.\";s:15:\"paste_clipboard\";s:15:\"Paste Clipboard\";s:10:\"paste_here\";s:30:\"Paste your clipboard data here\";s:61:\"cannot_save_metadata_please_try_to_edit_the_metadata_in_asset\";s:75:\"<b>Cannot save Metadata!</b><br />Please try to edit the metadata in Asset.\";s:17:\"email_log_forward\";s:13:\"Forward email\";s:24:\"complete_required_fields\";s:66:\"Please complete following required fields to publish the document:\";s:21:\"detect_image_features\";s:21:\"Detect Image Features\";s:21:\"remove_image_features\";s:21:\"Remove Image Features\";s:15:\"available_sites\";s:15:\"Available Sites\";s:19:\"no_action_available\";s:19:\"No action available\";s:8:\"fallback\";s:8:\"Fallback\";s:8:\"add_site\";s:8:\"Add Site\";s:18:\"domain_label_width\";s:18:\"Domain label width\";s:19:\"enable_grid_locking\";s:19:\"Enable grid locking\";s:28:\"redirect_performance_warning\";s:117:\"Using this feature has very bad effects on the performance of the entire application, do you really want to continue?\";s:13:\"Uncategorized\";s:13:\"Uncategorized\";s:7:\"methods\";s:7:\"Methods\";s:23:\"default_value_generator\";s:39:\"Default value generator service / class\";s:20:\"export_configuration\";s:28:\"Export Configuration As JSON\";s:13:\"property_name\";s:13:\"Property name\";s:11:\"force_value\";s:11:\"Force value\";s:17:\"composite_indices\";s:17:\"Composite indices\";s:11:\"fieldlookup\";s:12:\"Field Lookup\";s:16:\"show_fieldlookup\";s:17:\"Show Field Lookup\";s:12:\"no_value_set\";s:12:\"no value set\";s:21:\"batch_change_language\";s:21:\"Batch update language\";s:26:\"generate_type_declarations\";s:26:\"Generate Type Declarations\";s:19:\"brick_limit_reached\";s:51:\"Limit ({bricklimit}) reached for brick: {brickname}\";s:12:\"preview_item\";s:12:\"Preview Item\";s:35:\"version_currently_saved_in_database\";s:47:\"Currently saved in database (but not published)\";s:18:\"deprecated_feature\";s:67:\"<p style=\'color: orange;\'>Deprecated feature. Use %s<br>instead</p>\";s:29:\"invert_colors_on_login_screen\";s:29:\"Invert Colors on Login Screen\";s:12:\"encrypt_data\";s:12:\"Encrypt Data\";s:24:\"encrypt_data_description\";s:78:\"Data-at-Rest/Tablespace Encryption needs to be enabled on your Database Server\";s:20:\"many_to_one_relation\";s:20:\"Many-To-One Relation\";s:21:\"many_to_many_relation\";s:21:\"Many-To-Many Relation\";s:28:\"many_to_many_object_relation\";s:28:\"Many-To-Many Object Relation\";s:30:\"advanced_many_to_many_relation\";s:30:\"Advanced Many-To-Many Relation\";s:37:\"advanced_many_to_many_object_relation\";s:37:\"Advanced Many-To-Many Object Relation\";s:23:\"reverse_object_relation\";s:23:\"Reverse Object Relation\";s:8:\"url_slug\";s:8:\"URL Slug\";s:22:\"url_slug_datatype_info\";s:101:\"Enter the controller & action in the following format:<br>App\\Controller\\ProductController:slugAction\";s:17:\"controller_action\";s:19:\"Controller & Action\";s:15:\"admin_interface\";s:15:\"Admin Interface\";s:12:\"icon_library\";s:12:\"Icon Library\";s:36:\"system_performance_stability_warning\";s:281:\"Please do not perform this action unless you are sure what you are doing.<br /><b style=\'color:red\'>This action can have a major impact onto the stability and performance of the entire system, and may causes an overload or complete crash of the server!</b><br /><br />Are you sure?\";s:12:\"login_screen\";s:12:\"Login Screen\";s:17:\"color_description\";s:36:\"Use the HTML hex format, eg. #ffffff\";s:6:\"colors\";s:6:\"Colors\";s:5:\"media\";s:5:\"Media\";s:11:\"custom_logo\";s:11:\"Custom Logo\";s:29:\"custom_login_background_image\";s:29:\"Custom Login Background Image\";s:25:\"branding_logo_description\";s:96:\"Used on the login and start screen. We recommend to use a SVG (JPG & PNG are supported as well).\";s:23:\"appearance_and_branding\";s:21:\"Appearance & Branding\";s:10:\"brightness\";s:10:\"Brightness\";s:10:\"saturation\";s:10:\"Saturation\";s:3:\"hue\";s:3:\"Hue\";s:14:\"addoverlay_fit\";s:15:\"Add Overlay Fit\";s:12:\"environments\";s:12:\"Environments\";s:4:\"test\";s:4:\"Test\";s:10:\"colorspace\";s:10:\"Colorspace\";s:5:\"ratio\";s:5:\"Ratio\";s:12:\"decimal_size\";s:12:\"Decimal size\";s:17:\"decimal_precision\";s:17:\"Decimal precision\";s:23:\"decimal_mysql_type_info\";s:202:\"If decimal size or precision are specified, <code>DECIMAL(decimalSize, decimalPrecision)</code> MySQL type is used. Default values if missing are <code>64</code> as size and <code>0</code> as precision.\";s:33:\"decimal_mysql_type_naming_warning\";s:162:\"Please note that in MySQL terms, the <code>decimalSize</code> is called <code>precision</code> and the <code>decimalPrecision</code> is called <code>scale</code>.\";s:13:\"only_unsigned\";s:13:\"only unsigned\";s:7:\"integer\";s:7:\"Integer\";s:17:\"object_regex_info\";s:57:\"RegExp without delimiters, has to work in both JS and PHP\";s:16:\"regex_validation\";s:29:\"Regular Expression Validation\";s:11:\"test_string\";s:11:\"Test string\";s:5:\"regex\";s:5:\"RegEx\";s:16:\"code_before_init\";s:16:\"Code before init\";s:19:\"code_after_pageview\";s:19:\"Code after pageview\";s:20:\"code_before_pageview\";s:20:\"Code before pageview\";s:17:\"select_presetting\";s:19:\"Select a presetting\";s:4:\"good\";s:4:\"Good\";s:4:\"best\";s:4:\"Best\";s:21:\"1x1_pixel_placeholder\";s:21:\"1x1 Pixel Placeholder\";s:33:\"1x1_pixel_placeholder_description\";s:111:\"Just returns a 1x1 pixel GIF base64 encoded, in case you don\'t want to display an image for a certain condition\";s:7:\"average\";s:7:\"Average\";s:17:\"enter_media_query\";s:36:\"Please enter a valid CSS media query\";s:15:\"add_media_query\";s:15:\"Add Media Query\";s:17:\"add_media_segment\";s:17:\"Add Media Segment\";s:19:\"enter_media_segment\";s:68:\"Please enter a valid bitrate(e.g. 400k, 1500k, 1M) for video segment\";s:18:\"dash_media_message\";s:70:\"This option generates a single .mpd file with media segments(bitrates)\";s:17:\"specific_settings\";s:17:\"Specific Settings\";s:30:\"login_as_this_user_description\";s:100:\"The following link is a temporary link that allows you to login as this user in a different browser:\";s:18:\"login_as_this_user\";s:41:\"Login as this user in a different browser\";s:23:\"allowed_types_to_create\";s:23:\"Allowed types to create\";s:15:\"defaults_to_all\";s:15:\"Defaults to all\";s:33:\"analytics_universal_configuration\";s:74:\"Universal/GTag Analytics Configuration eg. {\'cookieDomain\': \'example.com\'}\";s:37:\"use_different_email_delivery_settings\";s:53:\"Use different email delivery settings for newsletters\";s:12:\"action_scope\";s:12:\"Action Scope\";s:3:\"hit\";s:3:\"Hit\";s:7:\"session\";s:7:\"Session\";s:22:\"session_with_variables\";s:24:\"Session (with variables)\";s:17:\"targeting_visitor\";s:7:\"Visitor\";s:58:\"targeting_condition_visited_page_before_piwik_data_warning\";s:92:\"This condition fetches data synchronously from Piwik which can be quite slow. Use with care!\";s:68:\"targeting_condition_visited_page_before_piwik_not_configured_warning\";s:93:\"This condition cannot be matched as Piwik is not configured and will always resolve to false.\";s:31:\"targeting_condition_url_pattern\";s:12:\"URL (RegExp)\";s:30:\"targeting_toolbar_browser_note\";s:253:\"<b>NOTE:</b> Enabling the targeting toolbar affects only the browser you are currently using. If you want to use the toolbar on another browser you need to enable it again. See <a target=\'_blank\' href=\'{targetingLink}\'>the documentation</a> for details.\";s:28:\"microsoft_word_export_notice\";s:361:\"<ul><li>It is not possible to re-import this export</li><li>The export file-format is HTML, which can be perfectly opened with Word</li><li>This export doesn\'t include the full layout information (just basic text-formatting)</li><li>The language selection is used to set the language for object\'s localized fields (only localized fields are exported!)</li></ul>\";s:18:\"fallback_languages\";s:37:\"Fallback Languages (CSV eg. de_CH,de)\";s:12:\"add_language\";s:12:\"Add Language\";s:16:\"default_language\";s:16:\"Default language\";s:23:\"wildcards_are_supported\";s:23:\"Wildcards are supported\";s:37:\"localization_and_internationalization\";s:39:\"Localization &amp; Internationalization\";s:13:\"code_settings\";s:13:\"Code Settings\";s:20:\"advanced_integration\";s:20:\"Advanced Integration\";s:26:\"assign_target_group_weight\";s:6:\"Weight\";s:12:\"target_group\";s:12:\"Target Group\";s:24:\"target_group_multiselect\";s:24:\"Target Group Multiselect\";s:21:\"select_a_target_group\";s:21:\"Select a Target Group\";s:25:\"turn_off_usage_statistics\";s:25:\"Turn off usage statistics\";s:8:\"children\";s:8:\"Children\";s:18:\"elements_to_export\";s:18:\"Elements to Export\";s:22:\"xliff_export_documents\";s:408:\"If you want to translate eg. the whole /en tree to a different language, first create a copy of the /en tree. Afterwards use the copied tree in the export and select the source language \'en\' and the target language \'de\'. When importing the translated XLIFF file, the contents of the exported documents (in this case the copied tree documents) will be overwritten by the German translations in the XLIFF file.\";s:20:\"xliff_export_objects\";s:301:\"Only fields inside a Localized Fields container are recognized. When importing the translated XLIFF the source language will be untouched, only the target language fields will be overwritten. Use Relations checkbox to include Objects & Documents from Dependencies e.g. Relation fields, Properties etc.\";s:19:\"xliff_export_notice\";s:90:\"Here you can select the documents and objects you want to export for external translation.\";s:16:\"important_notice\";s:16:\"Important Notice\";s:19:\"xliff_import_notice\";s:268:\"Select a translated XLIFF file which was previously exported by pimcore and then translated by a localization service provider (LSP) or by a CAT application. Please aware that the import will overwrite the elements which were selected by the import (read also export).\";s:9:\"composite\";s:9:\"Composite\";s:6:\"origin\";s:6:\"Origin\";s:15:\"high_resolution\";s:15:\"High Resolution\";s:19:\"pass_through_params\";s:19:\"Pass Through Params\";s:25:\"redirects_type_entire_uri\";s:10:\"Entire URI\";s:25:\"redirects_type_path_query\";s:14:\"Path and Query\";s:20:\"redirects_csv_import\";s:20:\"Redirects CSV Import\";s:22:\"redirects_import_total\";s:5:\"Total\";s:24:\"redirects_import_created\";s:7:\"Created\";s:24:\"redirects_import_updated\";s:7:\"Updated\";s:24:\"redirects_import_errored\";s:7:\"Errored\";s:23:\"redirects_import_errors\";s:6:\"Errors\";s:27:\"redirects_import_error_line\";s:4:\"Line\";s:19:\"analytics_gtag_code\";s:31:\"Use the gtag code for analytics\";s:26:\"analytics_retargeting_code\";s:46:\"Use the retargeting-code for analytics (dc.js)\";s:27:\"analytics_asynchronous_code\";s:47:\"Use the asynchronous code for analytics (ga.js)\";s:17:\"newsletter_active\";s:17:\"Newsletter Active\";s:20:\"newsletter_confirmed\";s:20:\"Newsletter Confirmed\";s:6:\"gender\";s:6:\"Gender\";s:17:\"use_original_tiff\";s:30:\"Use original TIFF (only PRINT)\";s:29:\"use_original_tiff_description\";s:73:\"Use original TIFF when source format is a TIFF image -> do not modify it.\";s:4:\"port\";s:4:\"Port\";s:17:\"delivery_settings\";s:17:\"Delivery Settings\";s:17:\"generate_previews\";s:17:\"Generate previews\";s:18:\"invalid_class_name\";s:18:\"Invalid Class Name\";s:39:\"redirect_unknown_domains_to_main_domain\";s:96:\"Redirect unknown domains (not used for a site and for redirects, ...) to the main domain (above)\";s:5:\"hours\";s:5:\"Hours\";s:7:\"minutes\";s:7:\"Minutes\";s:7:\"seconds\";s:7:\"Seconds\";s:16:\"operating_system\";s:16:\"Operating System\";s:17:\"hardware_platform\";s:17:\"Hardware Platform\";s:12:\"time_on_site\";s:12:\"Time on site\";s:27:\"visited_pages_before_number\";s:22:\"Visited n-pages before\";s:6:\"number\";s:6:\"Number\";s:19:\"visited_page_before\";s:19:\"Visited page before\";s:12:\"searchengine\";s:13:\"Search Engine\";s:8:\"referrer\";s:8:\"Referrer\";s:14:\"referring_site\";s:14:\"Referring Site\";s:3:\"AND\";s:3:\"AND\";s:2:\"OR\";s:2:\"OR\";s:7:\"AND_NOT\";s:7:\"AND NOT\";s:12:\"radius_in_km\";s:11:\"Radius (km)\";s:8:\"redirect\";s:8:\"Redirect\";s:12:\"code_snippet\";s:12:\"Code-Snippet\";s:7:\"browser\";s:7:\"Browser\";s:10:\"conditions\";s:10:\"Conditions\";s:10:\"save_order\";s:10:\"Save Order\";s:24:\"debug_admin_translations\";s:39:\"Debug Admin-Translations (wrapped in +)\";s:9:\"short_url\";s:9:\"Short URL\";s:39:\"width_and_height_must_be_an_even_number\";s:39:\"width and height must be an even number\";s:11:\"source_site\";s:11:\"Source-Site\";s:11:\"target_site\";s:11:\"Target-Site\";s:17:\"source_entire_url\";s:20:\"Entire URL as Source\";s:20:\"analytics_internalid\";s:14:\"GA Internal ID\";s:30:\"analytics_settings_description\";s:116:\"To use the complete Google Analytics integration, please configure the Google API Service Account in System Settings\";s:11:\"upload_path\";s:11:\"Upload Path\";s:17:\"selection_options\";s:17:\"Selection Options\";s:6:\"expiry\";s:6:\"Expiry\";s:6:\"mobile\";s:6:\"Mobile\";s:13:\"group_by_path\";s:13:\"Group by path\";s:5:\"flush\";s:5:\"Flush\";s:27:\"errors_from_the_last_7_days\";s:27:\"Errors from the last 7 days\";s:18:\"show_close_warning\";s:18:\"Show close warning\";s:13:\"matching_text\";s:13:\"Matching Text\";s:3:\"any\";s:3:\"Any\";s:11:\"http_method\";s:11:\"HTTP Method\";s:11:\"url_pattern\";s:40:\"URL Pattern<br />(RegExp eg. @success@i)\";s:9:\"beginning\";s:9:\"Beginning\";s:20:\"element_css_selector\";s:22:\"Element (CSS Selector)\";s:15:\"insert_position\";s:15:\"Insert Position\";s:31:\"robots_txt_exists_on_filesystem\";s:68:\"The robots.txt exists already in the document-root on the filesystem\";s:67:\"only_required_for_reporting_in_pimcore_but_not_for_code_integration\";s:143:\"The following is only required if you want to use the reporting functionalities in pimcore, but this is not required for the code integration. \";s:10:\"save_error\";s:16:\"Cannot save data\";s:9:\"all_roles\";s:9:\"All Roles\";s:8:\"add_role\";s:8:\"Add Role\";s:19:\"role_creation_error\";s:21:\"Could not create role\";s:10:\"workspaces\";s:10:\"Workspaces\";s:8:\"Username\";s:8:\"Username\";s:13:\"video_bitrate\";s:20:\"Video Bitrate (kB/s)\";s:13:\"audio_bitrate\";s:20:\"Audio Bitrate (kB/s)\";s:13:\"rasterize_svg\";s:14:\"Rasterize SVGs\";s:23:\"rasterize_svg_info_text\";s:107:\"SVGs get automatically rasterized when a transformation other than resize or scale by width/height is used.\";s:18:\"preserve_animation\";s:27:\"Preserve animations for GIF\";s:28:\"preserve_animation_info_text\";s:89:\"Supported transformations are: Frame, Cover, Contain, Resize, ScaleByWidth, ScaleByHeight\";s:36:\"valid_languages_frontend_description\";s:323:\"These settings are used in documents to specify the content language (in properties tab), for objects in localized-fields, for shared translations, ... simply everywhere the editor can choose or use a language for the content.<br />Fallback languages are currently used in object\'s localized fields and shared translations.\";s:20:\"delete_language_note\";s:152:\"Note: Removing language from the list will not delete its respective data. Please use console command \'pimcore:locale:delete-unused-tables\' for cleanup.\";s:13:\"maximum_items\";s:10:\"max. items\";s:9:\"collapsed\";s:9:\"Collapsed\";s:35:\"url_to_custom_image_on_login_screen\";s:40:\"URL to custom image for the login screen\";s:5:\"sepia\";s:5:\"Sepia\";s:7:\"sharpen\";s:7:\"Sharpen\";s:12:\"gaussianBlur\";s:13:\"Gaussian Blur\";s:6:\"radius\";s:6:\"Radius\";s:5:\"sigma\";s:5:\"Sigma\";s:9:\"threshold\";s:9:\"Threshold\";s:9:\"tolerance\";s:9:\"Tolerance\";s:9:\"grayscale\";s:9:\"Grayscale\";s:20:\"nothing_to_configure\";s:20:\"Nothing to configure\";s:11:\"preview_url\";s:11:\"Preview URL\";s:7:\"opacity\";s:7:\"Opacity\";s:9:\"applymask\";s:10:\"Apply Mask\";s:10:\"addoverlay\";s:11:\"Add Overlay\";s:15:\"transformations\";s:15:\"Transformations\";s:50:\"you_can_drag_the_tabs_to_reorder_the_media_queries\";s:66:\"You can drag the tabs to reorder the priority of the media queries\";s:5:\"frame\";s:5:\"Frame\";s:18:\"setbackgroundcolor\";s:19:\"Set Backgroundcolor\";s:18:\"setbackgroundimage\";s:20:\"Set Background Image\";s:12:\"roundcorners\";s:13:\"Round Corners\";s:6:\"rotate\";s:6:\"Rotate\";s:5:\"color\";s:5:\"Color\";s:5:\"angle\";s:5:\"Angle\";s:11:\"label_width\";s:11:\"Label Width\";s:11:\"label_align\";s:11:\"Label Align\";s:16:\"label_first_cell\";s:16:\"Label First Cell\";s:56:\"please_dont_forget_to_reload_pimcore_after_modifications\";s:82:\"Please don\'t forget to clear the cache and reload pimcore after your modifications\";s:22:\"clear_cache_and_reload\";s:22:\"Clear cache and reload\";s:42:\"extension_manager_state_change_not_allowed\";s:49:\"State changes are not allowed for this extension.\";s:6:\"enable\";s:6:\"Enable\";s:7:\"disable\";s:7:\"Disable\";s:9:\"configure\";s:9:\"Configure\";s:14:\"beginning_with\";s:14:\"Beginning with\";s:14:\"matching_exact\";s:16:\"Matching exactly\";s:15:\"add_expert_mode\";s:17:\"Add (Expert Mode)\";s:17:\"add_beginner_mode\";s:14:\"Add (Beginner)\";s:6:\"lowest\";s:6:\"lowest\";s:7:\"highest\";s:7:\"highest\";s:12:\"override_all\";s:12:\"override all\";s:10:\"deactivate\";s:10:\"Deactivate\";s:18:\"countrymultiselect\";s:23:\"Countries (Multiselect)\";s:19:\"languagemultiselect\";s:23:\"Languages (Multiselect)\";s:3:\"yes\";s:3:\"Yes\";s:2:\"no\";s:2:\"No\";s:34:\"allow_trailing_slash_for_documents\";s:27:\"Allow trailing Slash in URL\";s:15:\"localizedfields\";s:16:\"Localized Fields\";s:10:\"new_folder\";s:10:\"New Folder\";s:8:\"new_file\";s:8:\"New File\";s:8:\"gridview\";s:9:\"Grid View\";s:31:\"visibility_of_system_properties\";s:31:\"Visibility of system properties\";s:9:\"translate\";s:9:\"translate\";s:23:\"translations_admin_hint\";s:52:\"HINT: Please Reload UI to apply translation changes!\";s:13:\"allowed_types\";s:13:\"Allowed Types\";s:12:\"columnlength\";s:12:\"Columnlength\";s:23:\"visible_in_searchresult\";s:24:\"Visible in Search Result\";s:19:\"visible_in_gridview\";s:20:\"Visible in Grid View\";s:16:\"fieldcollections\";s:17:\"Field-Collections\";s:5:\"block\";s:5:\"Block\";s:7:\"tooltip\";s:7:\"Tooltip\";s:16:\"decimalPrecision\";s:17:\"Decimal-Precision\";s:9:\"css_style\";s:9:\"CSS Style\";s:11:\"add_setting\";s:11:\"Add Setting\";s:7:\"reverse\";s:7:\"Reverse\";s:10:\"geopolygon\";s:18:\"Geographic Polygon\";s:11:\"geopolyline\";s:19:\"Geographic Polyline\";s:9:\"geobounds\";s:17:\"Geographic Bounds\";s:31:\"sure_to_install_unstable_update\";s:70:\"Are you sure that you want to install a potential not working version?\";s:19:\"analytics_accountid\";s:24:\"Account-ID (eg. 1234567)\";s:26:\"verification_filename_text\";s:67:\"Verification Filename<br /><small>required for verification</small>\";s:16:\"analytics_notice\";s:147:\"Please read the documentation about the Google Analytics integration first, for the advanced mode you have to modify the Google Analytics settings.\";s:22:\"analytics_trackid_code\";s:75:\"Track-ID (eg. UA-XXXXX-X)<br /><small>required for code integration</small>\";s:11:\"multiselect\";s:14:\"Multiselection\";s:7:\"handler\";s:7:\"Handler\";s:9:\"invisible\";s:9:\"Invisible\";s:25:\"only_configured_languages\";s:49:\"Show only in system settings configured languages\";s:11:\"permissions\";s:11:\"Permissions\";s:41:\"you_are_not_allowed_to_manage_admin_users\";s:41:\"You are not allowed to manage admin users\";s:12:\"content_type\";s:12:\"Content-Type\";s:12:\"new_property\";s:12:\"New Property\";s:9:\"all_users\";s:9:\"All Users\";s:5:\"admin\";s:5:\"Admin\";s:17:\"new_document_type\";s:17:\"New Document Type\";s:8:\"timezone\";s:8:\"Timezone\";s:4:\"host\";s:4:\"Host\";s:29:\"store_version_history_in_days\";s:32:\"Store version history for x Days\";s:30:\"store_version_history_in_steps\";s:33:\"Store version history for x Steps\";s:6:\"layout\";s:6:\"Layout\";s:20:\"add_layout_component\";s:20:\"Add Layout Component\";s:18:\"add_data_component\";s:18:\"Add Data Component\";s:9:\"accordion\";s:9:\"Accordion\";s:6:\"iframe\";s:16:\"Preview / Iframe\";s:8:\"fieldset\";s:8:\"Fieldset\";s:5:\"panel\";s:5:\"Panel\";s:8:\"tabpanel\";s:8:\"Tabpanel\";s:12:\"tab_position\";s:12:\"Tab Position\";s:7:\"pattern\";s:7:\"Pattern\";s:9:\"variables\";s:9:\"Variables\";s:8:\"defaults\";s:8:\"Defaults\";s:7:\"wysiwyg\";s:7:\"WYSIWYG\";s:7:\"objects\";s:7:\"Objects\";s:13:\"allow_inherit\";s:17:\"Allow inheritance\";s:16:\"parent_php_class\";s:16:\"Parent PHP Class\";s:21:\"implements_interfaces\";s:23:\"Implements interface(s)\";s:10:\"use_traits\";s:12:\"Use (traits)\";s:16:\"general_settings\";s:16:\"General Settings\";s:15:\"layout_settings\";s:31:\"Layout Settings (Pimcore Admin)\";s:6:\"region\";s:6:\"Region\";s:11:\"collapsible\";s:11:\"Collapsible\";s:15:\"allowed_classes\";s:15:\"Allowed classes\";s:12:\"display_name\";s:12:\"Display name\";s:12:\"not_editable\";s:12:\"Not editable\";s:5:\"index\";s:7:\"Indexed\";s:14:\"mandatoryfield\";s:15:\"Mandatory field\";s:7:\"install\";s:7:\"Install\";s:9:\"uninstall\";s:9:\"Uninstall\";s:27:\"some_fields_cannot_be_saved\";s:28:\"Some fields cannot be saved.\";s:4:\"icon\";s:4:\"Icon\";s:6:\"slider\";s:6:\"Slider\";s:6:\"domain\";s:24:\"Domain (eg. example.org)\";s:8:\"datetime\";s:11:\"Date & Time\";s:13:\"default_value\";s:13:\"Default value\";s:6:\"button\";s:6:\"Button\";s:8:\"priority\";s:8:\"Priority\";s:3:\"end\";s:3:\"End\";s:13:\"select_update\";s:13:\"Select update\";s:14:\"stable_updates\";s:24:\"Available stable updates\";s:18:\"non_stable_updates\";s:28:\"Available non-stable updates\";s:40:\"latest_pimcore_version_already_installed\";s:49:\"You have installed the latest version of pimcore.\";s:5:\"table\";s:5:\"Table\";s:4:\"rows\";s:4:\"Rows\";s:14:\"language_admin\";s:35:\"Default-Language in Admin-Interface\";s:16:\"exclude_patterns\";s:16:\"Exclude Patterns\";s:5:\"cover\";s:5:\"Cover\";s:7:\"contain\";s:7:\"Contain\";s:9:\"min_value\";s:10:\"min. Value\";s:9:\"max_value\";s:10:\"max. Value\";s:9:\"increment\";s:14:\"Increment Step\";s:8:\"vertical\";s:8:\"Vertical\";s:7:\"country\";s:7:\"Country\";s:10:\"zoom_level\";s:10:\"Zoom level\";s:8:\"map_type\";s:8:\"Map type\";s:7:\"roadmap\";s:7:\"Roadmap\";s:9:\"satellite\";s:9:\"Satellite\";s:6:\"hybrid\";s:6:\"Hybrid\";s:21:\"google_api_key_simple\";s:53:\"Google API Key (Simple API Access for Maps, CSE, ...)\";s:21:\"document_restrictions\";s:21:\"Document Restrictions\";s:18:\"asset_restrictions\";s:18:\"Asset Restrictions\";s:19:\"object_restrictions\";s:19:\"Object Restrictions\";s:15:\"allow_documents\";s:15:\"allow Documents\";s:12:\"allow_assets\";s:12:\"allow Assets\";s:13:\"allow_objects\";s:13:\"allow Objects\";s:18:\"allowed_types_hint\";s:19:\"(empty = allow all)\";s:22:\"allowed_document_types\";s:22:\"Allowed Document Types\";s:19:\"allowed_asset_types\";s:19:\"Allowed Asset Types\";s:7:\"website\";s:7:\"Website\";s:19:\"user_creation_error\";s:21:\"Could not create user\";s:21:\"email_debug_addresses\";s:21:\"Debug Email Addresses\";s:36:\"user_object_dependencies_description\";s:49:\"This user is referenced in the following objects:\";s:22:\"user_admin_description\";s:176:\"Admin users do not only automatically gain all permissions listed below, they are also allowed to perform all actions on documents, assets and objects without any restrictions.\";s:23:\"user_apikey_description\";s:52:\"API key required for web service access by this user\";s:6:\"apikey\";s:7:\"API Key\";s:12:\"lazy_loading\";s:12:\"lazy loading\";s:21:\"non_owner_description\";s:309:\"Non owner objects represent relations to an other object just in the same way as objects do. The difference is, that a non-owner object field is not the owner of the relation data, it is merely a view on data stored in other objects. Please choose the owner and field name where the data is originally stored.\";s:14:\"allow_variants\";s:14:\"Allow variants\";s:13:\"show_variants\";s:21:\"Show variants in tree\";s:19:\"allowed_class_field\";s:19:\"Allowed class/field\";s:15:\"structuredTable\";s:16:\"Structured Table\";s:8:\"position\";s:8:\"Position\";s:29:\"objectsMetadata_allowed_class\";s:13:\"Allowed Class\";s:30:\"objectsMetadata_visible_fields\";s:14:\"Visible Fields\";s:31:\"objectsMetadata_type_columnbool\";s:11:\"Column Bool\";s:32:\"objectsMetadata_type_multiselect\";s:11:\"Multiselect\";s:30:\"file_explorer_saved_file_error\";s:16:\"Cannot save file\";s:26:\"reserved_field_names_error\";s:54:\"Please do not use the following reserved field names: \";s:16:\"use_current_date\";s:16:\"Use current date\";s:31:\"inherited_default_value_warning\";s:94:\"The default value is used if either inheritance is deactivated or if the parent value is empty\";s:21:\"restrict_selection_to\";s:21:\"Restrict Selection To\";s:12:\"maximum_tabs\";s:22:\"Maximum number of tabs\";s:9:\"algorithm\";s:9:\"Algorithm\";s:4:\"salt\";s:4:\"Salt\";s:12:\"saltlocation\";s:13:\"Salt location\";s:13:\"custom_layout\";s:13:\"Custom Layout\";s:24:\"custom_layout_definition\";s:24:\"Custom Layout Definition\";s:24:\"configure_custom_layouts\";s:24:\"Configure Custom Layouts\";s:10:\"add_layout\";s:10:\"Add Layout\";s:13:\"delete_layout\";s:13:\"Delete Layout\";s:16:\"special_settings\";s:16:\"Special Settings\";s:14:\"custom_layouts\";s:14:\"Custom Layouts\";s:14:\"new_definition\";s:14:\"New Definition\";s:14:\"target_subtype\";s:11:\"Target Type\";s:9:\"mandatory\";s:9:\"Mandatory\";s:18:\"disallow_addremove\";s:19:\"Disallow Add/Remove\";s:16:\"disallow_reorder\";s:20:\"Dissallow Reordering\";s:17:\"reload_definition\";s:17:\"Reload Definition\";s:6:\"saving\";s:6:\"Saving\";s:10:\"definition\";s:10:\"Definition\";s:11:\"objectbrick\";s:12:\"Object Brick\";s:10:\"select_all\";s:10:\"Select All\";s:12:\"deselect_all\";s:12:\"Deselect All\";s:17:\"definitions_saved\";s:17:\"Definitions saved\";s:31:\"predefined_metadata_definitions\";s:31:\"Predefined Metadata Definitions\";s:14:\"default_layout\";s:21:\"Use as default layout\";s:19:\"hide_edit_image_tab\";s:19:\"Hide Edit Image Tab\";s:22:\"are_you_sure_recursive\";s:62:\"There child nodes which will be deleted as well! Are you sure?\";s:17:\"log_relatedobject\";s:14:\"Related object\";s:13:\"log_component\";s:9:\"Component\";s:15:\"log_search_form\";s:16:\"Search parameter\";s:15:\"log_search_type\";s:12:\"Logging type\";s:24:\"log_search_relatedobject\";s:19:\"Related object (id)\";s:13:\"log_timestamp\";s:9:\"Timestamp\";s:14:\"log_fileobject\";s:11:\"File object\";s:21:\"log_detailinformation\";s:18:\"Detail information\";s:36:\"classificationstore_group_definition\";s:6:\"Groups\";s:36:\"classificationstore_group_limitation\";s:16:\"Max. group items\";s:40:\"classificationstore_mbx_entergroup_title\";s:9:\"New Group\";s:41:\"classificationstore_mbx_entergroup_prompt\";s:10:\"Enter name\";s:38:\"classificationstore_error_addgroup_msg\";s:18:\"Error adding group\";s:31:\"classificationstore_invalidname\";s:12:\"Invalid name\";s:42:\"classificationstore_error_group_exists_msg\";s:35:\"Group with this name already exists\";s:30:\"classificationstore_properties\";s:15:\"Key Definitions\";s:38:\"classificationstore_mbx_enterkey_title\";s:7:\"New Key\";s:42:\"classificationstore_detailed_configuration\";s:22:\"Detailed Configuration\";s:35:\"classificationstore_detailed_config\";s:15:\"Detailed Config\";s:9:\"relations\";s:9:\"Relations\";s:9:\"localized\";s:9:\"Localized\";s:17:\"allowed_group_ids\";s:23:\"Allowed Group Ids (csv)\";s:6:\"key_id\";s:6:\"Key ID\";s:6:\"sorter\";s:6:\"Sorter\";s:34:\"classificationstore_tooltip_sorter\";s:43:\"Items with lower value will be listed first\";s:41:\"classificationstore_collection_definition\";s:17:\"Group Collections\";s:8:\"group_id\";s:8:\"Group ID\";s:10:\"collection\";s:10:\"Collection\";s:45:\"classificationstore_mbx_entercollection_title\";s:14:\"New Collection\";s:22:\"class_field_name_error\";s:33:\"Following field name has an error\";s:24:\"inputQuantityValue_field\";s:20:\"Input Quantity Value\";s:12:\"abbreviation\";s:12:\"Abbreviation\";s:8:\"longname\";s:8:\"Longname\";s:8:\"baseunit\";s:9:\"Base Unit\";s:19:\"quantityValue_units\";s:29:\"QuantityValue Unit Definition\";s:25:\"valid_quantityValue_units\";s:11:\"Valid units\";s:31:\"calculatedValue_calculatorclass\";s:16:\"Calculator class\";s:27:\"calculatedValue_explanation\";s:87:\"See the official documentation to learn more about which methods need to be implemented\";s:21:\"calculatedValue_field\";s:16:\"Calculated Value\";s:16:\"conversionFactor\";s:17:\"Conversion Factor\";s:16:\"conversionOffset\";s:17:\"Conversion Offset\";s:12:\"default_unit\";s:12:\"Default Unit\";s:13:\"min_max_times\";s:15:\"Min / Max Times\";s:5:\"reset\";s:5:\"Reset\";s:13:\"password_hint\";s:135:\"Password must contain at least 10 characters, one lowercase letter, one uppercase letter, one numeric digit, and one special character!\";s:15:\"editor_settings\";s:15:\"Editor Settings\";s:14:\"language_order\";s:14:\"Language Order\";s:13:\"preview_width\";s:13:\"Preview Width\";s:14:\"preview_height\";s:14:\"Preview Height\";s:9:\"url_width\";s:9:\"URL Width\";s:13:\"externalImage\";s:14:\"External Image\";s:7:\"log_pid\";s:3:\"PID\";s:35:\"search_console_settings_description\";s:112:\"To use the Google Search Console integration, please configure the Google API Service Account in System Settings\";s:14:\"fieldcontainer\";s:15:\"Field Container\";s:5:\"store\";s:5:\"Store\";s:18:\"edit_configuration\";s:24:\"Edit Store Configuration\";s:40:\"classificationstore_mbx_enterstore_title\";s:9:\"New Store\";s:41:\"classificationstore_mbx_enterstore_prompt\";s:16:\"Enter store name\";s:38:\"classificationstore_error_addstore_msg\";s:20:\"Error creating store\";s:14:\"search_for_key\";s:10:\"Search Key\";s:17:\"width_explanation\";s:147:\"The width of this component. A numeric value will be interpreted as the number of pixels; a string value will be treated as a CSS value with units.\";s:18:\"height_explanation\";s:148:\"The height of this component. A numeric value will be interpreted as the number of pixels; a string value will be treated as a CSS value with units.\";s:32:\"web2print_enable_in_default_view\";s:52:\"Enable Web2Print documents in default documents view\";s:36:\"web2print_enable_in_default_view_txt\";s:172:\"Enables Web2Print documents in default documents view in default perspective. Either activate this or create custom views and perspectives for managing Web2Print documents.\";s:14:\"web2print_tool\";s:4:\"Tool\";s:19:\"web2print_save_mode\";s:18:\"Document Save Mode\";s:23:\"web2print_save_mode_txt\";s:152:\"Document Save Mode = cleanup deletes all not used document elements for current document. This might be necessary for useage reports in print documents.\";s:29:\"web2print_pdfreactor_settings\";s:19:\"PDFreactor Settings\";s:16:\"web2print_server\";s:6:\"Server\";s:17:\"web2print_baseURL\";s:7:\"BaseURL\";s:21:\"web2print_baseURL_txt\";s:100:\"BaseURL for PDFreactor. This is prefixed to each relative url in print templates when creating PDFs.\";s:20:\"web2print_apiKey_txt\";s:80:\"If the PDFreactor instance is set up to require API keys, you can enter it here.\";s:17:\"web2print_licence\";s:7:\"Licence\";s:30:\"web2print_wkhtmltopdf_settings\";s:20:\"Wkhtmltopdf Settings\";s:28:\"web2print_wkhtmltopdf_binary\";s:18:\"wkhtmltopdf Binary\";s:29:\"web2print_wkhtmltopdf_options\";s:7:\"Options\";s:33:\"web2print_wkhtmltopdf_options_txt\";s:78:\"One per line with \'--\' and whitespace between key and value (e.g. --key value)\";s:18:\"web2print_hostname\";s:8:\"Hostname\";s:20:\"disable_tree_preview\";s:20:\"Disable Tree Preview\";s:14:\"PHP Class Name\";s:14:\"PHP Class Name\";s:20:\"editor_configuration\";s:20:\"Editor Configuration\";s:17:\"allow_dirty_close\";s:31:\"Disable unsaved content warning\";s:25:\"high_resolution_info_text\";s:173:\"eg. for Web-to-Print or everywhere where srcset is not possible/sufficient, not necessary for normal web-thumbnails, they automatically get a srcset attribute with 1x and 2x\";s:17:\"advanced_settings\";s:17:\"Advanced settings\";s:18:\"preserve_meta_data\";s:32:\"Preserve meta data (don\'t strip)\";s:14:\"preserve_color\";s:31:\"Preserve color (profile, space)\";s:28:\"thumbnail_preserve_info_text\";s:168:\"\'Preserve meta data\' and \'preserve color\' only works for transitions without compositions (frame, background color, ...) and color modifications (greyscale, sepia, ...)\";s:22:\"path_formatter_service\";s:25:\"Formatter Service / Class\";s:9:\"separated\";s:9:\"separated\";s:17:\"log_refresh_label\";s:13:\"Refresh every\";s:28:\"website_translation_settings\";s:27:\"Shared Translation Settings\";s:20:\"language_permissions\";s:51:\"Language Permissions (no view permission means all)\";s:15:\"rendering_class\";s:21:\"Custom Renderer class\";s:14:\"rendering_data\";s:23:\"Data passed to renderer\";s:18:\"web2print_protocol\";s:8:\"Protocol\";s:10:\"rows_fixed\";s:10:\"Rows fixed\";s:10:\"cols_fixed\";s:10:\"Cols fixed\";s:12:\"force_resize\";s:12:\"Force resize\";s:8:\"site_ids\";s:8:\"Site IDs\";s:16:\"site_ids_tooltip\";s:42:\"Provide a comma-seperated list of site IDs\";s:33:\"predefined_hotspot_data_templates\";s:25:\"Predefined data templates\";s:36:\"hide_locale_labels_when_tabs_reached\";s:39:\"Hide locale labels after number of tabs\";s:36:\"classificationstore_error_addkey_msg\";s:16:\"Error adding Key\";s:42:\"classificationstore_dialog_keygroup_search\";s:16:\"Key/Group Search\";s:22:\"options_provider_class\";s:38:\"Options Provider Class or Service Name\";s:21:\"options_provider_data\";s:21:\"Options Provider Data\";s:18:\"show_applogger_tab\";s:19:\"Show App Logger Tab\";s:7:\"analyze\";s:7:\"Analyze\";s:24:\"link_generator_reference\";s:35:\"Link Provider Class or Service Name\";s:11:\"unique_qtip\";s:62:\"Unique constraint will added. No need to check \'index\' as well\";s:20:\"temporarily_disabled\";s:20:\"Temporarily disabled\";s:19:\"enabled_in_editmode\";s:19:\"Enabled in Editmode\";s:14:\"boolean_select\";s:14:\"Boolean Select\";s:9:\"yes_label\";s:16:\"Yes Display Name\";s:8:\"no_label\";s:15:\"No Display Name\";s:11:\"empty_label\";s:18:\"Empty Display Name\";s:35:\"gdpr_dataSource_sentMail_only_email\";s:27:\"Search only based on E-Mail\";s:12:\"imageGallery\";s:13:\"Image Gallery\";s:11:\"column_type\";s:11:\"Column Type\";s:14:\"encryptedField\";s:15:\"Encrypted Field\";s:8:\"datatype\";s:8:\"Datatype\";s:13:\"used_by_class\";s:14:\"Used by class:\";s:17:\"uses_these_bricks\";s:18:\"Uses these bricks:\";s:10:\"last_login\";s:10:\"Last Login\";s:23:\"multiselect_render_type\";s:11:\"Render Type\";s:36:\"please_dont_forget_to_reload_pimcore\";s:69:\"<b>Please don\'t forget to reload pimcore after your modification!</b>\";s:12:\"2fa_required\";s:34:\"Two Factor Authentication required\";s:16:\"2fa_reset_secret\";s:16:\"Reset 2FA Secret\";s:14:\"2fa_reset_done\";s:91:\"The 2FA secret was reset, the user can generate a new one after login (My Profile section).\";s:19:\"focal_point_support\";s:19:\"Focal Point Support\";s:19:\"default_positioning\";s:19:\"Default Positioning\";s:28:\"thumbnail_focal_point_notice\";s:161:\"The image is cropped automatically based on the focal point set on the source image. If no focal point is present, the default positioning setting below is used.\";s:10:\"iframe_url\";s:10:\"IFrame URL\";s:22:\"deactivate_maintenance\";s:22:\"Deactivate Maintenance\";s:16:\"maintenance_mode\";s:16:\"Maintenance Mode\";s:22:\"maintenance_not_active\";s:51:\"It seems that the maintenance isn\'t set up properly\";s:24:\"mail_settings_incomplete\";s:46:\"It seems that the mail settings are incomplete\";s:11:\"bulk_export\";s:11:\"Bulk Export\";s:11:\"bulk_import\";s:11:\"Bulk Import\";s:19:\"warning_bulk_import\";s:123:\"The Bulk Import will overwrite your class/fieldcollection/objectbrick definitions without warning! Do you want to continue?\";s:11:\"environment\";s:11:\"Environment\";s:5:\"local\";s:5:\"Local\";s:7:\"example\";s:7:\"Example\";s:17:\"send_as_html_mime\";s:17:\"Send as HTML/Mime\";s:18:\"send_as_plain_text\";s:18:\"Send as plain text\";s:15:\"send_test_email\";s:15:\"Send Test-Email\";s:11:\"main_domain\";s:11:\"Main Domain\";s:10:\"error_page\";s:10:\"Error Page\";s:18:\"additional_domains\";s:40:\"Additional Domains (one domain per line)\";s:23:\"redirect_to_main_domain\";s:42:\"Redirect additional domains to main domain\";s:13:\"debug_mode_on\";s:10:\"DEBUG MODE\";s:5:\"scope\";s:5:\"Scope\";s:10:\"icon_class\";s:10:\"Icon Class\";s:9:\"nice_name\";s:9:\"Nice Name\";s:20:\"create_menu_shortcut\";s:23:\"Create Shortcut in Menu\";s:7:\"display\";s:7:\"Display\";s:5:\"order\";s:5:\"Order\";s:11:\"filter_type\";s:11:\"Filter Type\";s:22:\"generate_page_previews\";s:22:\"Generate Page Previews\";s:28:\"custom_report_chart_settings\";s:14:\"Chart Settings\";s:23:\"custom_report_charttype\";s:10:\"Chart Type\";s:28:\"custom_report_charttype_none\";s:4:\"None\";s:27:\"custom_report_charttype_pie\";s:9:\"Pie Chart\";s:28:\"custom_report_charttype_line\";s:10:\"Line Chart\";s:27:\"custom_report_charttype_bar\";s:9:\"Bar Chart\";s:27:\"custom_report_chart_options\";s:27:\"Type specific Chart Options\";s:20:\"custom_report_x_axis\";s:6:\"X-Axis\";s:20:\"custom_report_y_axis\";s:6:\"Y-Axis\";s:24:\"custom_report_datacolumn\";s:11:\"Data Column\";s:25:\"custom_report_labelcolumn\";s:12:\"Label Column\";s:25:\"custom_report_only_filter\";s:11:\"Only Filter\";s:29:\"custom_report_filter_and_show\";s:15:\"Filter and Show\";s:30:\"custom_report_filter_drilldown\";s:16:\"Filter Drilldown\";s:26:\"no_further_sources_allowed\";s:31:\"No further data sources allowed\";s:20:\"column_configuration\";s:35:\"Manage & Share Column Configuration\";s:23:\"show_in_google_anaytics\";s:24:\"Show in Google Analytics\";s:5:\"style\";s:5:\"Style\";s:16:\"foreground_color\";s:16:\"Foreground Color\";s:16:\"background_color\";s:16:\"Background Color\";s:22:\"system_infos_and_tools\";s:19:\"System Info & Tools\";s:8:\"php_info\";s:8:\"PHP Info\";s:18:\"php_opcache_status\";s:18:\"PHP OPcache Status\";s:25:\"system_requirements_check\";s:25:\"System-Requirements Check\";s:11:\"server_info\";s:11:\"Server Info\";s:23:\"database_administration\";s:23:\"Database Administration\";s:94:\"important_use_imagick_pecl_extensions_for_best_results_gd_is_just_a_fallback_with_less_quality\";s:125:\"IMPORTANT: Use imagick PECL extension for best results, GDlib is just a fallback with limited functionality and less quality!\";s:4:\"trim\";s:4:\"Trim\";s:19:\"server_fileexplorer\";s:20:\"Server File Explorer\";s:8:\"add_user\";s:8:\"Add User\";s:16:\"direct_sql_query\";s:16:\"Direct SQL query\";s:11:\"use_as_site\";s:11:\"Use as site\";s:11:\"remove_site\";s:11:\"Remove Site\";s:9:\"edit_site\";s:9:\"Edit Site\";s:7:\"site_id\";s:7:\"Site ID\";s:16:\"website_settings\";s:16:\"Website Settings\";s:11:\"clear_cache\";s:11:\"Clear Cache\";s:10:\"extensions\";s:10:\"Extensions\";s:6:\"update\";s:6:\"Update\";s:15:\"system_settings\";s:15:\"System Settings\";s:16:\"image_thumbnails\";s:16:\"Image Thumbnails\";s:10:\"thumbnails\";s:10:\"Thumbnails\";s:5:\"cache\";s:5:\"Cache\";s:7:\"classes\";s:7:\"Classes\";s:13:\"static_routes\";s:13:\"Static Routes\";s:10:\"structured\";s:10:\"Structured\";s:3:\"geo\";s:10:\"Geographic\";s:7:\"loading\";s:7:\"Loading\";s:5:\"steps\";s:5:\"Steps\";s:8:\"database\";s:8:\"Database\";s:8:\"location\";s:8:\"Location\";s:5:\"every\";s:5:\"Every\";s:10:\"categories\";s:10:\"Categories\";s:8:\"revision\";s:5:\"Build\";s:12:\"objectbricks\";s:12:\"Objectbricks\";s:17:\"class_definitions\";s:17:\"Class Definitions\";s:21:\"custom_layout_changed\";s:74:\"Layout was changed in the meantime. Please reload the layout and try again\";s:14:\"rule_violation\";s:14:\"Rule Violation\";s:6:\"emails\";s:6:\"Emails\";s:18:\"log_applicationlog\";s:18:\"Application Logger\";s:20:\"classification_store\";s:20:\"Classification Store\";s:19:\"quantityValue_field\";s:14:\"Quantity Value\";s:8:\"expanded\";s:8:\"Expanded\";s:12:\"display_type\";s:12:\"Display Type\";s:19:\"custom_report_class\";s:12:\"Report class\";s:4:\"hide\";s:4:\"Hide\";s:21:\"clear_full_page_cache\";s:21:\"Clear Full Page Cache\";s:10:\"all_caches\";s:10:\"All Caches\";s:18:\"web2print_settings\";s:21:\"Web-to-Print Settings\";s:18:\"admin_translations\";s:18:\"Admin Translations\";s:4:\"lock\";s:4:\"Lock\";s:6:\"unlock\";s:6:\"Unlock\";s:28:\"lock_and_propagate_to_childs\";s:30:\"Lock and propagate to children\";s:32:\"unlock_and_propagate_to_children\";s:32:\"Unlock and propagate to children\";s:10:\"data_cache\";s:10:\"Data Cache\";s:18:\"listing_use_traits\";s:20:\"Listing Use (traits)\";s:24:\"listing_parent_php_class\";s:24:\"Listing Parent PHP Class\";s:15:\"expand_cs_group\";s:63:\"There are empty features not displayed here. Click to show them\";s:15:\"hide_empty_data\";s:15:\"Hide empty data\";s:16:\"class_attributes\";s:16:\"Class Attributes\";s:20:\"operator_group_other\";s:6:\"Others\";s:26:\"operator_group_transformer\";s:12:\"Transformers\";s:24:\"operator_group_extractor\";s:10:\"Extractors\";s:24:\"operator_group_formatter\";s:10:\"Formatters\";s:23:\"operator_group_renderer\";s:8:\"Renderer\";s:26:\"operator_renderer_settings\";s:17:\"Renderer Settings\";s:15:\"refresh_preview\";s:15:\"Refresh Preview\";s:14:\"show_charcount\";s:20:\"Show Character Count\";s:10:\"max_length\";s:10:\"Max Length\";s:14:\"reports_config\";s:14:\"Reports Config\";s:25:\"exclude_from_search_index\";s:37:\"Exclude from Backend Full-Text Search\";s:4:\"left\";s:4:\"left\";s:5:\"right\";s:5:\"right\";s:3:\"top\";s:3:\"top\";s:18:\"provide_split_view\";s:18:\"Provide Split View\";s:26:\"allow_multiple_assignments\";s:26:\"Allow Multiple Assignments\";s:23:\"enable_admin_async_load\";s:26:\"Enable Async Load in Admin\";s:27:\"async_loading_warning_block\";s:73:\"WARNING: Async Loading is NOT possible within Localized Fields and Blocks\";s:29:\"activate_column_configuration\";s:29:\"Activate Column Configuration\";s:26:\"table_column_configuration\";s:20:\"Column Configuration\";s:20:\"send_invitation_link\";s:20:\"Send Invitation Link\";s:15:\"invitation_sent\";s:21:\"Login Invitation sent\";s:20:\"invitation_link_sent\";s:60:\"A temporary login link has been sent to email address: \"%s\" \";s:32:\"classificationstore_group_by_key\";s:12:\"Group by key\";s:26:\"allow_to_create_new_object\";s:46:\"Allow to create a new object in relation field\";s:11:\"Desctiption\";s:11:\"Desctiption\";s:6:\"Master\";s:6:\"Master\";s:19:\"Master (Admin Mode)\";s:19:\"Master (Admin Mode)\";s:2:\"My\";s:2:\"My\";s:8:\"MyObject\";s:8:\"MyObject\";s:3:\"SEO\";s:3:\"SEO\";s:4:\"down\";s:4:\"down\";s:5:\"login\";s:5:\"login\";s:38:\"object_add_dialog_custom_text.MyObject\";s:38:\"object_add_dialog_custom_text.MyObject\";s:39:\"object_add_dialog_custom_title.MyObject\";s:39:\"object_add_dialog_custom_title.MyObject\";s:2:\"up\";s:2:\"up\";s:27:\"gdpr_dataSource_dataObjects\";s:12:\"Data Objects\";s:38:\"keybinding_searchAndReplaceAssignments\";s:28:\"Search & Replace Assignments\";s:9:\"parent_id\";s:9:\"Parent ID\";s:16:\"modificationDate\";s:17:\"Modification Date\";s:12:\"creationDate\";s:13:\"Creation Date\";s:29:\"keybinding_sharedTranslations\";s:19:\"Shared Translations\";s:25:\"classificationstore_group\";s:5:\"Group\";s:33:\"classificationstore_tag_col_group\";s:5:\"Group\";s:40:\"classificationstore_col_groupdescription\";s:5:\"Group\";s:24:\"keybinding_customReports\";s:14:\"Custom Reports\";s:4:\"none\";s:4:\"None\";s:19:\"redirects_type_path\";s:4:\"Path\";s:17:\"keybinding_robots\";s:10:\"robots.txt\";s:14:\"web2print_port\";s:4:\"Port\";s:13:\"email_subject\";s:7:\"Subject\";s:24:\"gdpr_dataSource_sentMail\";s:11:\"Sent Emails\";s:17:\"email_log_subject\";s:7:\"Subject\";s:31:\"gdpr_data_extractor_label_email\";s:13:\"Email Address\";s:20:\"web2print_colorspace\";s:10:\"Colorspace\";s:7:\"numeric\";s:6:\"Number\";s:17:\"newsletter_report\";s:13:\"Custom Report\";s:27:\"structuredtable_type_number\";s:6:\"Number\";s:27:\"objectsMetadata_type_number\";s:6:\"Number\";s:30:\"overwrite_object_with_same_key\";s:9:\"Overwrite\";s:23:\"keybinding_openDocument\";s:13:\"Open Document\";s:20:\"keybinding_openAsset\";s:10:\"Open Asset\";s:21:\"keybinding_openObject\";s:11:\"Open Object\";s:12:\"save_success\";s:19:\"Saved successfully!\";s:32:\"file_explorer_saved_file_success\";s:19:\"Saved successfully!\";s:14:\"workflow_notes\";s:5:\"Notes\";s:21:\"keybinding_openInTree\";s:12:\"Show in Tree\";s:8:\"2fa_code\";s:4:\"Code\";s:14:\"web2print_tags\";s:4:\"Tags\";s:15:\"web2print_links\";s:5:\"Links\";s:28:\"keybinding_seoDocumentEditor\";s:19:\"SEO Document Editor\";s:16:\"clear_temp_files\";s:21:\"Clear temporary files\";s:18:\"keybinding_reports\";s:7:\"Reports\";s:16:\"keybinding_roles\";s:5:\"Roles\";s:8:\"username\";s:8:\"Username\";s:8:\"password\";s:8:\"Password\";s:6:\"submit\";s:6:\"Submit\";s:13:\"cache_enabled\";s:6:\"Enable\";s:16:\"localized_fields\";s:16:\"Localized Fields\";s:17:\"field_collections\";s:17:\"Field-Collections\";s:9:\"col_label\";s:5:\"Label\";s:17:\"piwik_widget_site\";s:4:\"Site\";s:21:\"keybinding_recycleBin\";s:11:\"Recycle Bin\";s:14:\"email_log_data\";s:4:\"Data\";s:13:\"show_metainfo\";s:4:\"Info\";s:15:\"keybinding_save\";s:4:\"Save\";s:18:\"keybinding_publish\";s:7:\"Publish\";s:17:\"keybinding_rename\";s:6:\"Rename\";s:14:\"email_log_from\";s:4:\"From\";s:10:\"email_from\";s:4:\"From\";s:15:\"log_search_from\";s:4:\"From\";s:12:\"email_log_to\";s:2:\"To\";s:8:\"email_to\";s:2:\"To\";s:13:\"log_search_to\";s:2:\"To\";s:14:\"email_log_text\";s:4:\"Text\";s:25:\"structuredtable_type_text\";s:4:\"Text\";s:25:\"objectsMetadata_type_text\";s:4:\"Text\";s:18:\"pimcore_lable_text\";s:4:\"Text\";s:35:\"classificationstore_tag_col_keyName\";s:3:\"Key\";s:28:\"gdpr_data_extractor_label_id\";s:2:\"ID\";s:15:\"web2print_title\";s:5:\"Title\";s:12:\"config_title\";s:5:\"Title\";s:20:\"keybinding_unpublish\";s:9:\"Unpublish\";s:17:\"navigation_target\";s:6:\"Target\";s:8:\"log_type\";s:4:\"Type\";s:22:\"gdpr_dataSource_export\";s:6:\"Export\";s:19:\"keybinding_glossary\";s:8:\"Glossary\";s:16:\"keybinding_users\";s:5:\"Users\";s:33:\"classificationstore_configuration\";s:13:\"Configuration\";s:33:\"classificationstore_tag_col_value\";s:5:\"Value\";s:22:\"gdpr_dataSource_assets\";s:6:\"Assets\";s:25:\"structuredtable_type_bool\";s:8:\"Checkbox\";s:27:\"objectsMetadata_type_select\";s:6:\"Select\";s:7:\"boolean\";s:4:\"Bool\";s:25:\"objectsMetadata_type_bool\";s:4:\"Bool\";s:18:\"keybinding_refresh\";s:6:\"Reload\";s:17:\"web2print_version\";s:7:\"Version\";s:35:\"gdpr_data_extractor_label_firstname\";s:9:\"Firstname\";s:34:\"gdpr_data_extractor_label_lastname\";s:8:\"Lastname\";s:20:\"keybinding_redirects\";s:9:\"Redirects\";s:10:\"log_source\";s:6:\"Source\";s:40:\"classificationstore_error_addgroup_title\";s:5:\"Error\";s:38:\"classificationstore_error_addkey_title\";s:5:\"Error\";s:20:\"element_lock_message\";s:58:\"The desired element is currently opened by another person:\";s:16:\"web2print_apiKey\";s:7:\"API Key\";s:12:\"customlayout\";s:13:\"Custom Layout\";s:24:\"special_settings_tooltip\";s:16:\"Special Settings\";s:19:\"application_logging\";s:18:\"Application Logger\";s:28:\"keybinding_applicationLogger\";s:18:\"Application Logger\";s:20:\"log_search_component\";s:9:\"Component\";s:11:\"log_message\";s:7:\"Message\";s:31:\"classificationstore_menu_config\";s:20:\"Classification Store\";s:19:\"classificationstore\";s:20:\"Classification Store\";s:39:\"classificationstore_mbx_enterkey_prompt\";s:10:\"Enter name\";s:43:\"classificationstore_error_addcollection_msg\";s:18:\"Error adding group\";s:13:\"quantityValue\";s:14:\"Quantity Value\";s:18:\"inputQuantityValue\";s:20:\"Input Quantity Value\";s:15:\"calculatedValue\";s:16:\"Calculated Value\";s:27:\"keybinding_tagConfiguration\";s:17:\"Tag Configuration\";s:14:\"log_search_pid\";s:3:\"PID\";s:13:\"piwik_site_id\";s:7:\"Site ID\";s:27:\"substring_operator_settings\";s:8:\"Settings\";s:27:\"operator_substring_settings\";s:8:\"Settings\";s:26:\"delete_gridconfig_dblcheck\";s:39:\"Do you really want to delete this item?\";s:17:\"piwik_widget_date\";s:8:\"End date\";s:19:\"log_refresh_seconds\";s:7:\"Seconds\";s:12:\"email_log_cc\";s:2:\"Cc\";s:13:\"email_log_bcc\";s:3:\"Bcc\";s:23:\"keybinding_closeAllTabs\";s:14:\"Close all tabs\";s:10:\"log_search\";s:6:\"Search\";s:4:\"cols\";s:7:\"Columns\";s:16:\"log_reset_search\";s:5:\"Reset\";s:29:\"keybinding_showElementHistory\";s:24:\"Recently Opened Elements\";s:22:\"keybinding_quickSearch\";s:12:\"Quick Search\";s:23:\"keybinding_httpErrorLog\";s:11:\"HTTP Errors\";s:22:\"keybinding_notesEvents\";s:18:\"Notes &amp; Events\";s:22:\"keybinding_searchAsset\";s:13:\"Search Assets\";s:25:\"keybinding_searchDocument\";s:16:\"Search Documents\";s:23:\"keybinding_searchObject\";s:14:\"Search Objects\";s:6:\"routes\";s:13:\"Static Routes\";s:7:\"plugins\";s:7:\"Bundles\";s:18:\"log_search_message\";s:7:\"Message\";s:9:\"rgbaColor\";s:5:\"Color\";}s:14:\"admin+intl-icu\";a:1:{s:15:\"__pimcore_dummy\";s:12:\"only_a_dummy\";}}s:56:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0metadata\";a:0:{}s:57:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0resources\";a:0:{}s:54:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0locale\";s:2:\"en\";s:65:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0fallbackCatalogue\";N;s:54:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0parent\";N;}\";',	31536000,	1618917679);

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` varchar(50) NOT NULL,
  `name` varchar(190) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `classes` (`id`, `name`) VALUES
('1',	'MyObject');

DROP TABLE IF EXISTS `classificationstore_collectionrelations`;
CREATE TABLE `classificationstore_collectionrelations` (
  `colId` int(11) unsigned NOT NULL,
  `groupId` int(11) unsigned NOT NULL,
  `sorter` int(10) DEFAULT 0,
  PRIMARY KEY (`colId`,`groupId`),
  KEY `FK_classificationstore_collectionrelations_groups` (`groupId`),
  CONSTRAINT `FK_classificationstore_collectionrelations_groups` FOREIGN KEY (`groupId`) REFERENCES `classificationstore_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `classificationstore_collections`;
CREATE TABLE `classificationstore_collections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `storeId` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT 0,
  `modificationDate` int(11) unsigned DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `storeId` (`storeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `classificationstore_groups`;
CREATE TABLE `classificationstore_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `storeId` int(11) DEFAULT NULL,
  `parentId` int(11) unsigned NOT NULL DEFAULT 0,
  `name` varchar(190) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT 0,
  `modificationDate` int(11) unsigned DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `storeId` (`storeId`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `classificationstore_keys`;
CREATE TABLE `classificationstore_keys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `storeId` int(11) DEFAULT NULL,
  `name` varchar(190) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `type` varchar(190) DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT 0,
  `modificationDate` int(11) unsigned DEFAULT 0,
  `definition` longtext DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `enabled` (`enabled`),
  KEY `type` (`type`),
  KEY `storeId` (`storeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `classificationstore_relations`;
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


DROP TABLE IF EXISTS `classificationstore_stores`;
CREATE TABLE `classificationstore_stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `custom_layouts`;
CREATE TABLE `custom_layouts` (
  `id` varchar(64) NOT NULL,
  `classId` varchar(50) NOT NULL,
  `name` varchar(190) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  `userOwner` int(11) unsigned DEFAULT NULL,
  `userModification` int(11) unsigned DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`classId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `dependencies`;
CREATE TABLE `dependencies` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sourcetype` enum('document','asset','object') NOT NULL DEFAULT 'document',
  `sourceid` int(11) unsigned NOT NULL DEFAULT 0,
  `targettype` enum('document','asset','object') NOT NULL DEFAULT 'document',
  `targetid` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `combi` (`sourcetype`,`sourceid`,`targettype`,`targetid`),
  KEY `targettype_targetid` (`targettype`,`targetid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(11) unsigned DEFAULT NULL,
  `type` enum('page','link','snippet','folder','hardlink','email','newsletter','printpage','printcontainer') DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '',
  `path` varchar(765) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `index` int(11) unsigned DEFAULT 0,
  `published` tinyint(1) unsigned DEFAULT 1,
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  `userOwner` int(11) unsigned DEFAULT NULL,
  `userModification` int(11) unsigned DEFAULT NULL,
  `versionCount` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fullpath` (`path`,`key`),
  KEY `parentId` (`parentId`),
  KEY `key` (`key`),
  KEY `published` (`published`),
  KEY `modificationDate` (`modificationDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

INSERT INTO `documents` (`id`, `parentId`, `type`, `key`, `path`, `index`, `published`, `creationDate`, `modificationDate`, `userOwner`, `userModification`, `versionCount`) VALUES
(1,	0,	'page',	'',	'/',	999999,	1,	1614795784,	1618917689,	1,	2,	1),
(2,	1,	'page',	'The Editables Page',	'/',	1,	1,	1614795823,	1618916334,	2,	2,	6),
(3,	1,	'page',	'Plain Document',	'/',	2,	1,	1614797774,	1618916948,	2,	2,	6),
(4,	1,	'snippet',	'MySnippet',	'/',	3,	1,	1614797789,	1618916292,	2,	2,	6),
(5,	1,	'page',	'The Template Page',	'/',	4,	1,	1614797802,	1618916914,	2,	2,	12);

DROP TABLE IF EXISTS `documents_editables`;
CREATE TABLE `documents_editables` (
  `documentId` int(11) unsigned NOT NULL DEFAULT 0,
  `name` varchar(750) CHARACTER SET ascii NOT NULL DEFAULT '',
  `type` varchar(50) DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  PRIMARY KEY (`documentId`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `documents_editables` (`documentId`, `name`, `type`, `data`) VALUES
(2,	'block',	'scheduledblock',	'a:1:{i:0;a:2:{s:3:\"key\";s:1:\"0\";s:4:\"date\";s:10:\"1614795858\";}}'),
(2,	'block:0.sched_content',	'wysiwyg',	''),
(2,	'block:0.sched_subline',	'input',	''),
(2,	'blogLink',	'link',	'a:9:{s:4:\"path\";s:0:\"\";s:10:\"parameters\";s:0:\"\";s:6:\"anchor\";s:0:\"\";s:9:\"accesskey\";s:0:\"\";s:3:\"rel\";s:0:\"\";s:8:\"tabindex\";s:0:\"\";s:6:\"target\";s:0:\"\";s:5:\"class\";s:0:\"\";s:10:\"attributes\";s:0:\"\";}'),
(2,	'campaignVideo2',	'video',	'a:5:{s:2:\"id\";N;s:4:\"type\";s:5:\"asset\";s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:6:\"poster\";N;}'),
(2,	'categories',	'multiselect',	'a:0:{}'),
(2,	'contentblock',	'block',	'a:0:{}'),
(2,	'myCheckbox',	'checkbox',	''),
(2,	'myDate',	'date',	NULL),
(2,	'myGallery',	'renderlet',	'a:3:{s:2:\"id\";N;s:4:\"type\";N;s:7:\"subtype\";N;}'),
(2,	'myHeadline',	'input',	''),
(2,	'myImage',	'image',	'a:9:{s:2:\"id\";N;s:3:\"alt\";s:0:\"\";s:11:\"cropPercent\";N;s:9:\"cropWidth\";N;s:10:\"cropHeight\";N;s:7:\"cropTop\";N;s:8:\"cropLeft\";N;s:8:\"hotspots\";N;s:6:\"marker\";N;}'),
(2,	'myItem',	'select',	'otion1'),
(2,	'myNumber',	'numeric',	NULL),
(2,	'myRelation',	'relation',	'a:3:{s:2:\"id\";N;s:4:\"type\";N;s:7:\"subtype\";N;}'),
(2,	'mySnippet',	'snippet',	NULL),
(2,	'objectPaths',	'relations',	'a:0:{}'),
(2,	'productProperties',	'table',	'a:4:{i:0;a:3:{i:0;s:4:\"Col1\";i:1;s:4:\"Col2\";i:2;s:5:\" Col3\";}i:1;a:3:{i:0;s:5:\"Value\";i:1;s:6:\" Value\";i:2;s:7:\"  Value\";}i:2;a:3:{i:0;s:5:\"Value\";i:1;s:7:\"  Value\";i:2;s:7:\"  Value\";}i:3;a:3:{i:0;s:1:\" \";i:1;s:1:\" \";i:2;s:1:\" \";}}'),
(2,	'product_description',	'textarea',	''),
(2,	'specialContent',	'wysiwyg',	'');

DROP TABLE IF EXISTS `documents_email`;
CREATE TABLE `documents_email` (
  `id` int(11) unsigned NOT NULL DEFAULT 0,
  `controller` varchar(255) DEFAULT NULL,
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


DROP TABLE IF EXISTS `documents_hardlink`;
CREATE TABLE `documents_hardlink` (
  `id` int(11) unsigned NOT NULL DEFAULT 0,
  `sourceId` int(11) DEFAULT NULL,
  `propertiesFromSource` tinyint(1) DEFAULT NULL,
  `childrenFromSource` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceId` (`sourceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `documents_link`;
CREATE TABLE `documents_link` (
  `id` int(11) unsigned NOT NULL DEFAULT 0,
  `internalType` enum('document','asset','object') DEFAULT NULL,
  `internal` int(11) unsigned DEFAULT NULL,
  `direct` varchar(1000) DEFAULT NULL,
  `linktype` enum('direct','internal') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `documents_newsletter`;
CREATE TABLE `documents_newsletter` (
  `id` int(11) unsigned NOT NULL DEFAULT 0,
  `controller` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `trackingParameterSource` varchar(255) DEFAULT NULL,
  `trackingParameterMedium` varchar(255) DEFAULT NULL,
  `trackingParameterName` varchar(255) DEFAULT NULL,
  `enableTrackingParameters` tinyint(1) unsigned DEFAULT NULL,
  `sendingMode` varchar(20) DEFAULT NULL,
  `plaintext` longtext DEFAULT NULL,
  `missingRequiredEditable` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `documents_page`;
CREATE TABLE `documents_page` (
  `id` int(11) unsigned NOT NULL DEFAULT 0,
  `controller` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(383) DEFAULT NULL,
  `metaData` text DEFAULT NULL,
  `prettyUrl` varchar(190) DEFAULT NULL,
  `contentMasterDocumentId` int(11) DEFAULT NULL,
  `targetGroupIds` varchar(255) DEFAULT NULL,
  `missingRequiredEditable` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prettyUrl` (`prettyUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `documents_page` (`id`, `controller`, `template`, `title`, `description`, `metaData`, `prettyUrl`, `contentMasterDocumentId`, `targetGroupIds`, `missingRequiredEditable`) VALUES
(1,	'App\\Controller\\DefaultController::defaultAction',	'',	'',	'',	'a:0:{}',	NULL,	NULL,	'',	NULL),
(2,	'App\\Controller\\DefaultController::defaultAction',	'Default/editable.html.twig',	'Editables',	'',	'a:0:{}',	NULL,	NULL,	'',	NULL),
(3,	'App\\Controller\\DefaultController::defaultAction',	'Default/default.html.twig',	'Plain Document',	'',	'a:0:{}',	NULL,	NULL,	'',	NULL),
(5,	'App\\Controller\\DefaultController::defaultAction',	'Default/helpers.html.twig',	'The Template Page',	'',	'a:0:{}',	NULL,	NULL,	'',	NULL);

DROP TABLE IF EXISTS `documents_printpage`;
CREATE TABLE `documents_printpage` (
  `id` int(11) unsigned NOT NULL DEFAULT 0,
  `controller` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `lastGenerated` int(11) DEFAULT NULL,
  `lastGenerateMessage` text DEFAULT NULL,
  `contentMasterDocumentId` int(11) DEFAULT NULL,
  `missingRequiredEditable` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `documents_snippet`;
CREATE TABLE `documents_snippet` (
  `id` int(11) unsigned NOT NULL DEFAULT 0,
  `controller` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `contentMasterDocumentId` int(11) DEFAULT NULL,
  `missingRequiredEditable` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `documents_snippet` (`id`, `controller`, `template`, `contentMasterDocumentId`, `missingRequiredEditable`) VALUES
(4,	'App\\Controller\\DefaultController::defaultAction',	'Default/default.html.twig',	NULL,	NULL);

DROP TABLE IF EXISTS `documents_translations`;
CREATE TABLE `documents_translations` (
  `id` int(11) unsigned NOT NULL DEFAULT 0,
  `sourceId` int(11) unsigned NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`sourceId`,`language`),
  KEY `id` (`id`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `edit_lock`;
CREATE TABLE `edit_lock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) unsigned NOT NULL DEFAULT 0,
  `ctype` enum('document','asset','object') DEFAULT NULL,
  `userId` int(11) unsigned NOT NULL DEFAULT 0,
  `sessionId` varchar(255) DEFAULT NULL,
  `date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ctype` (`ctype`),
  KEY `cidtype` (`cid`,`ctype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `edit_lock` (`id`, `cid`, `ctype`, `userId`, `sessionId`, `date`) VALUES
(15,	2,	'object',	2,	'916b06fe4bf3f9a0ba9a0244915e44b7',	1614798255),
(18,	2,	'asset',	2,	'916b06fe4bf3f9a0ba9a0244915e44b7',	1614798255),
(32,	4,	'document',	2,	'1554698594de4d998867f7a390800f19',	1618916245),
(33,	3,	'document',	2,	'1554698594de4d998867f7a390800f19',	1618916245),
(34,	2,	'document',	2,	'1554698594de4d998867f7a390800f19',	1618916297),
(36,	10,	'asset',	2,	'1554698594de4d998867f7a390800f19',	1618916468),
(37,	4,	'asset',	2,	'1554698594de4d998867f7a390800f19',	1618916535),
(38,	5,	'asset',	2,	'1554698594de4d998867f7a390800f19',	1618916537),
(39,	3,	'asset',	2,	'1554698594de4d998867f7a390800f19',	1618916539),
(42,	5,	'document',	2,	'5464e61869cb750b61e7d182799a09f2',	1618917255),
(43,	1,	'document',	2,	'1554698594de4d998867f7a390800f19',	1618917679),
(44,	3,	'object',	2,	'5464e61869cb750b61e7d182799a09f2',	1618918359);

DROP TABLE IF EXISTS `element_workflow_state`;
CREATE TABLE `element_workflow_state` (
  `cid` int(10) NOT NULL DEFAULT 0,
  `ctype` enum('document','asset','object') NOT NULL,
  `place` text DEFAULT NULL,
  `workflow` varchar(100) NOT NULL,
  PRIMARY KEY (`cid`,`ctype`,`workflow`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `email_blacklist`;
CREATE TABLE `email_blacklist` (
  `address` varchar(190) NOT NULL DEFAULT '',
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `email_log`;
CREATE TABLE `email_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `documentId` int(11) DEFAULT NULL,
  `requestUri` varchar(500) DEFAULT NULL,
  `params` text DEFAULT NULL,
  `from` varchar(500) DEFAULT NULL,
  `replyTo` varchar(255) DEFAULT NULL,
  `to` longtext DEFAULT NULL,
  `cc` longtext DEFAULT NULL,
  `bcc` longtext DEFAULT NULL,
  `sentDate` int(11) unsigned DEFAULT NULL,
  `subject` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sentDate` (`sentDate`,`id`),
  FULLTEXT KEY `fulltext` (`from`,`to`,`cc`,`bcc`,`subject`,`params`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `glossary`;
CREATE TABLE `glossary` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(10) DEFAULT NULL,
  `casesensitive` tinyint(1) DEFAULT NULL,
  `exactmatch` tinyint(1) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `abbr` varchar(255) DEFAULT NULL,
  `site` int(11) unsigned DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT 0,
  `modificationDate` int(11) unsigned DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `language` (`language`),
  KEY `site` (`site`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `gridconfigs`;
CREATE TABLE `gridconfigs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerId` int(11) DEFAULT NULL,
  `classId` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `searchType` varchar(50) DEFAULT NULL,
  `type` enum('asset','object') NOT NULL DEFAULT 'object',
  `config` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `creationDate` int(11) DEFAULT NULL,
  `modificationDate` int(11) DEFAULT NULL,
  `shareGlobally` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  KEY `classId` (`classId`),
  KEY `searchType` (`searchType`),
  KEY `shareGlobally` (`shareGlobally`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `gridconfig_favourites`;
CREATE TABLE `gridconfig_favourites` (
  `ownerId` int(11) NOT NULL,
  `classId` varchar(50) NOT NULL,
  `objectId` int(11) NOT NULL DEFAULT 0,
  `gridConfigId` int(11) DEFAULT NULL,
  `searchType` varchar(50) NOT NULL DEFAULT '',
  `type` enum('asset','object') NOT NULL DEFAULT 'object',
  PRIMARY KEY (`ownerId`,`classId`,`searchType`,`objectId`),
  KEY `classId` (`classId`),
  KEY `searchType` (`searchType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `gridconfig_shares`;
CREATE TABLE `gridconfig_shares` (
  `gridConfigId` int(11) NOT NULL,
  `sharedWithUserId` int(11) NOT NULL,
  PRIMARY KEY (`gridConfigId`,`sharedWithUserId`),
  KEY `sharedWithUserId` (`sharedWithUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `http_error_log`;
CREATE TABLE `http_error_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uri` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `code` int(3) DEFAULT NULL,
  `parametersGet` longtext DEFAULT NULL,
  `parametersPost` longtext DEFAULT NULL,
  `cookies` longtext DEFAULT NULL,
  `serverVars` longtext DEFAULT NULL,
  `date` int(11) unsigned DEFAULT NULL,
  `count` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uri` (`uri`),
  KEY `code` (`code`),
  KEY `date` (`date`),
  KEY `count` (`count`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `importconfigs`;
CREATE TABLE `importconfigs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerId` int(11) DEFAULT NULL,
  `classId` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `config` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `creationDate` int(11) DEFAULT NULL,
  `modificationDate` int(11) DEFAULT NULL,
  `shareGlobally` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  KEY `classId` (`classId`),
  KEY `shareGlobally` (`shareGlobally`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `importconfig_shares`;
CREATE TABLE `importconfig_shares` (
  `importConfigId` int(11) NOT NULL,
  `sharedWithUserId` int(11) NOT NULL,
  PRIMARY KEY (`importConfigId`,`sharedWithUserId`),
  KEY `sharedWithUserId` (`sharedWithUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `lock_keys`;
CREATE TABLE `lock_keys` (
  `key_id` varchar(64) NOT NULL,
  `key_token` varchar(44) NOT NULL,
  `key_expiration` int(10) unsigned NOT NULL,
  PRIMARY KEY (`key_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE `migration_versions` (
  `version` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201008082752',	'2021-04-20 08:52:43',	640),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201008091131',	'2021-04-20 08:52:43',	3),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201008101817',	'2021-04-20 08:52:43',	618),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201008132324',	'2021-04-20 08:52:44',	843),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201009095924',	'2021-04-20 08:52:45',	1070),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201012154224',	'2021-04-20 08:52:46',	732),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201014101437',	'2021-04-20 08:52:47',	2),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201113143914',	'2021-04-20 08:52:47',	719),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201201084201',	'2021-04-20 08:52:48',	700),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210107103923',	'2021-04-20 08:52:48',	89),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210218142556',	'2021-04-20 08:52:48',	8),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210323082921',	'2021-04-20 08:52:48',	29),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210323110055',	'2021-04-20 08:56:30',	42),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210324152822',	'2021-04-20 08:56:30',	834),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210330132354',	'2021-04-20 08:56:31',	74),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210412112812',	'2021-04-20 08:56:31',	40);

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `ctype` enum('asset','document','object') DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cid_ctype` (`cid`,`ctype`),
  KEY `date` (`date`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `notes_data`;
CREATE TABLE `notes_data` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `type` enum('text','date','document','asset','object','bool') DEFAULT NULL,
  `data` text DEFAULT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL DEFAULT 'info',
  `title` varchar(250) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sender` int(11) DEFAULT NULL,
  `recipient` int(11) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `modificationDate` timestamp NULL DEFAULT NULL,
  `linkedElementType` enum('document','asset','object') DEFAULT NULL,
  `linkedElement` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recipient` (`recipient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `objects`;
CREATE TABLE `objects` (
  `o_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `o_parentId` int(11) unsigned DEFAULT NULL,
  `o_type` enum('object','folder','variant') DEFAULT NULL,
  `o_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '',
  `o_path` varchar(765) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `o_index` int(11) unsigned DEFAULT 0,
  `o_published` tinyint(1) unsigned DEFAULT 1,
  `o_creationDate` int(11) unsigned DEFAULT NULL,
  `o_modificationDate` int(11) unsigned DEFAULT NULL,
  `o_userOwner` int(11) unsigned DEFAULT NULL,
  `o_userModification` int(11) unsigned DEFAULT NULL,
  `o_classId` varchar(50) DEFAULT NULL,
  `o_className` varchar(255) DEFAULT NULL,
  `o_childrenSortBy` enum('key','index') DEFAULT NULL,
  `o_childrenSortOrder` enum('ASC','DESC') DEFAULT NULL,
  `o_versionCount` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`o_id`),
  UNIQUE KEY `fullpath` (`o_path`,`o_key`),
  KEY `key` (`o_key`),
  KEY `index` (`o_index`),
  KEY `published` (`o_published`),
  KEY `parentId` (`o_parentId`),
  KEY `type` (`o_type`),
  KEY `o_modificationDate` (`o_modificationDate`),
  KEY `o_classId` (`o_classId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

INSERT INTO `objects` (`o_id`, `o_parentId`, `o_type`, `o_key`, `o_path`, `o_index`, `o_published`, `o_creationDate`, `o_modificationDate`, `o_userOwner`, `o_userModification`, `o_classId`, `o_className`, `o_childrenSortBy`, `o_childrenSortOrder`, `o_versionCount`) VALUES
(1,	0,	'folder',	'',	'/',	999999,	1,	1614795784,	1614795784,	1,	1,	NULL,	NULL,	NULL,	NULL,	0),
(2,	1,	'object',	'Item 1',	'/',	0,	1,	1614797932,	1614797956,	2,	2,	'1',	'MyObject',	NULL,	NULL,	3),
(3,	1,	'object',	'Item 2',	'/',	0,	1,	1614797937,	1614797948,	2,	2,	'1',	'MyObject',	NULL,	NULL,	3);

DROP VIEW IF EXISTS `object_1`;
CREATE TABLE `object_1` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `Title` varchar(190), `Desctiption` longtext, `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned);


DROP TABLE IF EXISTS `object_query_1`;
CREATE TABLE `object_query_1` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `oo_classId` varchar(50) DEFAULT '1',
  `oo_className` varchar(255) DEFAULT 'MyObject',
  `Title` varchar(190) DEFAULT NULL,
  `Desctiption` longtext DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_query_1` (`oo_id`, `oo_classId`, `oo_className`, `Title`, `Desctiption`) VALUES
(2,	'1',	'MyObject',	'Item 1',	'Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp; '),
(3,	'1',	'MyObject',	'Item 2',	'Item 2Item 2Item 2Item 2Item 2 ');

DROP TABLE IF EXISTS `object_relations_1`;
CREATE TABLE `object_relations_1` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `src_id` int(11) NOT NULL DEFAULT 0,
  `dest_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(50) NOT NULL DEFAULT '',
  `fieldname` varchar(70) NOT NULL DEFAULT '0',
  `index` int(11) unsigned NOT NULL DEFAULT 0,
  `ownertype` enum('object','fieldcollection','localizedfield','objectbrick') NOT NULL DEFAULT 'object',
  `ownername` varchar(70) NOT NULL DEFAULT '',
  `position` varchar(70) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `forward_lookup` (`src_id`,`ownertype`,`ownername`,`position`),
  KEY `reverse_lookup` (`dest_id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `object_store_1`;
CREATE TABLE `object_store_1` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `Title` varchar(190) DEFAULT NULL,
  `Desctiption` longtext DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_store_1` (`oo_id`, `Title`, `Desctiption`) VALUES
(2,	'Item 1',	'<p>Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;Item 1&nbsp;</p>\n'),
(3,	'Item 2',	'<p>Item 2Item 2Item 2Item 2Item 2</p>\n');

DROP TABLE IF EXISTS `object_url_slugs`;
CREATE TABLE `object_url_slugs` (
  `objectId` int(11) NOT NULL DEFAULT 0,
  `classId` varchar(50) NOT NULL DEFAULT '0',
  `fieldname` varchar(70) NOT NULL DEFAULT '0',
  `index` int(11) unsigned NOT NULL DEFAULT 0,
  `ownertype` enum('object','fieldcollection','localizedfield','objectbrick') NOT NULL DEFAULT 'object',
  `ownername` varchar(70) NOT NULL DEFAULT '',
  `position` varchar(70) NOT NULL DEFAULT '0',
  `slug` varchar(765) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `siteId` int(11) NOT NULL DEFAULT 0,
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


DROP TABLE IF EXISTS `pimcore_migrations`;
CREATE TABLE `pimcore_migrations` (
  `migration_set` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `migrated_at` datetime NOT NULL,
  PRIMARY KEY (`migration_set`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `pimcore_migrations` (`migration_set`, `version`, `migrated_at`) VALUES
('pimcore_core',	'20180724144005',	'2021-03-03 18:23:05'),
('pimcore_core',	'20180830113528',	'2021-03-03 18:23:05'),
('pimcore_core',	'20180830122128',	'2021-03-03 18:23:05'),
('pimcore_core',	'20180904201947',	'2021-03-03 18:23:05'),
('pimcore_core',	'20180906142115',	'2021-03-03 18:23:05'),
('pimcore_core',	'20180907115436',	'2021-03-03 18:23:05'),
('pimcore_core',	'20180912140913',	'2021-03-03 18:23:05'),
('pimcore_core',	'20180913132106',	'2021-03-03 18:23:05'),
('pimcore_core',	'20180924111736',	'2021-03-03 18:23:05'),
('pimcore_core',	'20181008132414',	'2021-03-03 18:23:05'),
('pimcore_core',	'20181009135158',	'2021-03-03 18:23:05'),
('pimcore_core',	'20181115114003',	'2021-03-03 18:23:05'),
('pimcore_core',	'20181126094412',	'2021-03-03 18:23:05'),
('pimcore_core',	'20181126144341',	'2021-03-03 18:23:05'),
('pimcore_core',	'20181128074035',	'2021-03-03 18:23:05'),
('pimcore_core',	'20181128112320',	'2021-03-03 18:23:05'),
('pimcore_core',	'20181214145532',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190102143436',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190102153226',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190108131401',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190124105627',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190131074054',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190131095936',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190320133439',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190402073052',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190403120728',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190405112707',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190408084129',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190508074339',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190515130651',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190520151448',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190522130545',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190527121800',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190618154000',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190701141857',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190708175236',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190729085052',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190802090149',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190806160450',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190807121356',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190828142756',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190902085052',	'2021-03-03 18:23:05'),
('pimcore_core',	'20190904154339',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191015131700',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191107141816',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191114123638',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191114132014',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191121150326',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191125135853',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191125200416',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191126130004',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191208175348',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191213115045',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191218073528',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191230103524',	'2021-03-03 18:23:05'),
('pimcore_core',	'20191230104529',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200113120101',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200116181758',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200121095650',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200121131304',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200127102432',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200129102132',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200210101048',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200210164037',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200211115044',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200212130011',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200218104052',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200226102938',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200310122412',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200313092019',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200317163018',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200318100042',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200324141723',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200407120641',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200407132737',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200407145422',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200410112354',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200421142950',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200422090352',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200428082346',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200428111313',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200529121630',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200604110336',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200619071650',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200703093410',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200721123847',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200807105448',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200812160035',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200817133132',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200820151104',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200828091305',	'2021-03-03 18:23:05'),
('pimcore_core',	'20200902111642',	'2021-03-03 18:23:05'),
('pimcore_core',	'20201001133558',	'2021-03-03 18:23:05'),
('pimcore_core',	'20201207132025',	'2021-03-03 18:23:05');

DROP TABLE IF EXISTS `PLEASE_DELETE__locks`;
CREATE TABLE `PLEASE_DELETE__locks` (
  `id` varchar(150) NOT NULL DEFAULT '',
  `date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `PLEASE_DELETE__tracking_events`;
CREATE TABLE `PLEASE_DELETE__tracking_events` (
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


DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties` (
  `cid` int(11) unsigned NOT NULL DEFAULT 0,
  `ctype` enum('document','asset','object') NOT NULL DEFAULT 'document',
  `cpath` varchar(765) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(190) NOT NULL DEFAULT '',
  `type` enum('text','document','asset','object','bool','select') DEFAULT NULL,
  `data` text DEFAULT NULL,
  `inheritable` tinyint(1) unsigned DEFAULT 1,
  PRIMARY KEY (`cid`,`ctype`,`name`),
  KEY `getall` (`cpath`,`ctype`,`inheritable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

INSERT INTO `properties` (`cid`, `ctype`, `cpath`, `name`, `type`, `data`, `inheritable`) VALUES
(2,	'document',	'/The Editables Page',	'navigation_name',	'text',	'Editables',	0),
(3,	'document',	'/Plain Document',	'navigation_name',	'text',	'Plain Document',	0),
(5,	'document',	'/The Template Page',	'navigation_name',	'text',	'The Template Page',	0);

DROP TABLE IF EXISTS `quantityvalue_units`;
CREATE TABLE `quantityvalue_units` (
  `id` varchar(50) NOT NULL,
  `group` varchar(50) DEFAULT NULL,
  `abbreviation` varchar(20) DEFAULT NULL,
  `longname` varchar(250) DEFAULT NULL,
  `baseunit` varchar(50) DEFAULT NULL,
  `factor` double DEFAULT NULL,
  `conversionOffset` double DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `converter` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_baseunit` (`baseunit`),
  CONSTRAINT `fk_baseunit` FOREIGN KEY (`baseunit`) REFERENCES `quantityvalue_units` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `recyclebin`;
CREATE TABLE `recyclebin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `subtype` varchar(20) DEFAULT NULL,
  `path` varchar(765) DEFAULT NULL,
  `amount` int(3) DEFAULT NULL,
  `date` int(11) unsigned DEFAULT NULL,
  `deletedby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `redirects`;
CREATE TABLE `redirects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('entire_uri','path_query','path','auto_create') NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `sourceSite` int(11) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `targetSite` int(11) DEFAULT NULL,
  `statusCode` varchar(3) DEFAULT NULL,
  `priority` int(2) DEFAULT 0,
  `regex` tinyint(1) DEFAULT NULL,
  `passThroughParameters` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `expiry` int(11) unsigned DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT 0,
  `modificationDate` int(11) unsigned DEFAULT 0,
  `userOwner` int(11) unsigned DEFAULT NULL,
  `userModification` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `priority` (`priority`),
  KEY `routing_lookup` (`active`,`regex`,`sourceSite`,`source`,`type`,`expiry`,`priority`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `sanitycheck`;
CREATE TABLE `sanitycheck` (
  `id` int(11) unsigned NOT NULL,
  `type` enum('document','asset','object') NOT NULL,
  PRIMARY KEY (`id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `schedule_tasks`;
CREATE TABLE `schedule_tasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) unsigned DEFAULT NULL,
  `ctype` enum('document','asset','object') DEFAULT NULL,
  `date` int(11) unsigned DEFAULT NULL,
  `action` enum('publish','unpublish','delete','publish-version') DEFAULT NULL,
  `version` bigint(20) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT 0,
  `userId` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `ctype` (`ctype`),
  KEY `active` (`active`),
  KEY `version` (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `search_backend_data`;
CREATE TABLE `search_backend_data` (
  `id` int(11) NOT NULL,
  `fullpath` varchar(765) CHARACTER SET utf8 DEFAULT NULL,
  `maintype` varchar(8) NOT NULL DEFAULT '',
  `type` varchar(20) DEFAULT NULL,
  `subtype` varchar(190) DEFAULT NULL,
  `published` tinyint(1) unsigned DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  `userOwner` int(11) DEFAULT NULL,
  `userModification` int(11) DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  `properties` text DEFAULT NULL,
  PRIMARY KEY (`id`,`maintype`),
  KEY `fullpath` (`fullpath`),
  KEY `maintype` (`maintype`),
  KEY `type` (`type`),
  KEY `subtype` (`subtype`),
  KEY `published` (`published`),
  FULLTEXT KEY `fulltext` (`data`,`properties`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

INSERT INTO `search_backend_data` (`id`, `fullpath`, `maintype`, `type`, `subtype`, `published`, `creationDate`, `modificationDate`, `userOwner`, `userModification`, `data`, `properties`) VALUES
(1,	'/',	'document',	'page',	'page',	1,	1614795784,	1618917689,	1,	2,	'ID: 1  \nPath: /  \n',	''),
(2,	'/myFolder',	'asset',	'folder',	'folder',	1,	1614797991,	1614797991,	2,	2,	'ID: 2  \nPath: /myFolder  \nmyFolder myFolder',	''),
(2,	'/The Editables Page',	'document',	'page',	'page',	1,	1614795823,	1618916334,	2,	2,	'ID: 2  \nPath: /The Editables Page  \nThe Editables Page otion1 Col1Col2 Col3Value Value ValueValue Value Value Editables The Editables Page',	'navigation_name:Editables '),
(2,	'/Item 1',	'object',	'object',	'MyObject',	1,	1614797932,	1614797956,	2,	2,	'ID: 2  \nPath: /Item 1  \nItem Item Item 1 Item 1 Item 1 Item',	''),
(3,	'/myFolder/logo-claim.png',	'asset',	'image',	'image',	1,	1614798008,	1614798008,	2,	2,	'ID: 3  \nPath: /myFolder/logo-claim.png  \nlogo-claim.png myFolder logo claim png',	''),
(3,	'/Plain Document',	'document',	'page',	'page',	1,	1614797774,	1618916948,	2,	2,	'ID: 3  \nPath: /Plain Document  \nPlain Document Plain Document Plain Document',	'navigation_name:Plain Document '),
(3,	'/Item 2',	'object',	'object',	'MyObject',	1,	1614797937,	1614797948,	2,	2,	'ID: 3  \nPath: /Item 2  \nItem Item Item 2Item 2Item 2Item',	''),
(4,	'/myFolder/logo-claim2.png',	'asset',	'image',	'image',	1,	1614798019,	1614798052,	2,	2,	'ID: 4  \nPath: /myFolder/logo-claim2.png  \nlogo-claim2.png myFolder logo claim2 png',	''),
(4,	'/MySnippet',	'document',	'snippet',	'snippet',	1,	1614797789,	1618916292,	2,	2,	'ID: 4  \nPath: /MySnippet  \nMySnippet MySnippet',	''),
(5,	'/myFolder/logo-claim1.png',	'asset',	'image',	'image',	1,	1614798025,	1614798042,	2,	2,	'ID: 5  \nPath: /myFolder/logo-claim1.png  \nlogo-claim1.png myFolder logo claim1 png',	''),
(5,	'/The Template Page',	'document',	'page',	'page',	1,	1614797802,	1618916914,	2,	2,	'ID: 5  \nPath: /The Template Page  \nThe Template Page The Template Page The Template Page',	'navigation_name:The Template Page '),
(6,	'/myFolder/logo-claim3.png',	'asset',	'image',	'image',	1,	1614798031,	1614798063,	2,	2,	'ID: 6  \nPath: /myFolder/logo-claim3.png  \nlogo-claim3.png myFolder logo claim3 png',	''),
(7,	'/_default_upload_bucket',	'asset',	'folder',	'folder',	1,	1614798200,	1614798200,	1,	0,	'ID: 7  \nPath: /_default_upload_bucket  \n_default_upload_bucket default upload bucket',	''),
(8,	'/_default_upload_bucket/logo-claim.png',	'asset',	'image',	'image',	1,	1614798200,	1618916448,	2,	2,	'ID: 8  \nPath: /_default_upload_bucket/logo-claim.png  \nlogo-claim.png title alt copyright default upload bucket logo claim png',	''),
(10,	'/myFolder/2020-11-14 20_18_08-localhost __ Pimcore.png',	'asset',	'image',	'image',	1,	1618916464,	1618916470,	2,	2,	'ID: 10  \nPath: /myFolder/2020-11-14 20_18_08-localhost __ Pimcore.png  \n2020-11-14 20_18_08-localhost Pimcore.png title alt copyright myFolder 2020 localhost Pimcore png',	'');

DROP TABLE IF EXISTS `sites`;
CREATE TABLE `sites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mainDomain` varchar(255) DEFAULT NULL,
  `domains` text DEFAULT NULL,
  `rootId` int(11) unsigned DEFAULT NULL,
  `errorDocument` varchar(255) DEFAULT NULL,
  `redirectToMainDomain` tinyint(1) DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT 0,
  `modificationDate` int(11) unsigned DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rootId` (`rootId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(10) unsigned DEFAULT NULL,
  `idPath` varchar(190) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idPath_name` (`idPath`,`name`),
  KEY `idpath` (`idPath`),
  KEY `parentid` (`parentId`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `tags_assignment`;
CREATE TABLE `tags_assignment` (
  `tagid` int(10) unsigned NOT NULL DEFAULT 0,
  `cid` int(10) NOT NULL DEFAULT 0,
  `ctype` enum('document','asset','object') NOT NULL,
  PRIMARY KEY (`tagid`,`cid`,`ctype`),
  KEY `ctype` (`ctype`),
  KEY `ctype_cid` (`cid`,`ctype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `targeting_rules`;
CREATE TABLE `targeting_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `scope` varchar(50) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `prio` smallint(5) unsigned NOT NULL DEFAULT 0,
  `conditions` longtext DEFAULT NULL,
  `actions` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `targeting_storage`;
CREATE TABLE `targeting_storage` (
  `visitorId` varchar(100) NOT NULL,
  `scope` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `creationDate` datetime DEFAULT NULL,
  `modificationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`visitorId`,`scope`,`name`),
  KEY `targeting_storage_scope_index` (`scope`),
  KEY `targeting_storage_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `targeting_target_groups`;
CREATE TABLE `targeting_target_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `threshold` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tmp_store`;
CREATE TABLE `tmp_store` (
  `id` varchar(190) NOT NULL DEFAULT '',
  `tag` varchar(190) DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  `serialized` tinyint(2) NOT NULL DEFAULT 0,
  `date` int(11) unsigned DEFAULT NULL,
  `expiryDate` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tag` (`tag`),
  KEY `date` (`date`),
  KEY `expiryDate` (`expiryDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tmp_store` (`id`, `tag`, `data`, `serialized`, `date`, `expiryDate`) VALUES
('document_session_1_1554698594de4d998867f7a390800f19',	'document-session',	'O:27:\"Pimcore\\Model\\Document\\Page\":31:{s:8:\"\0*\0title\";s:0:\"\";s:14:\"\0*\0description\";s:0:\"\";s:11:\"\0*\0metaData\";a:0:{}s:7:\"\0*\0type\";s:4:\"page\";s:12:\"\0*\0prettyUrl\";N;s:17:\"\0*\0targetGroupIds\";s:0:\"\";s:13:\"\0*\0controller\";s:47:\"App\\Controller\\DefaultController::defaultAction\";s:11:\"\0*\0template\";s:0:\"\";s:12:\"\0*\0editables\";a:0:{}s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:1;s:11:\"\0*\0parentId\";i:0;s:6:\"\0*\0key\";s:0:\"\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:999999;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614795784;s:19:\"\0*\0modificationDate\";i:1618917689;s:12:\"\0*\0userOwner\";i:1;s:19:\"\0*\0userModification\";i:2;s:13:\"\0*\0properties\";a:0:{}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614795784;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_1\";}',	0,	1618917689,	1619522489),
('document_session_1_5464e61869cb750b61e7d182799a09f2',	'document-session',	'O:27:\"Pimcore\\Model\\Document\\Page\":31:{s:8:\"\0*\0title\";s:0:\"\";s:14:\"\0*\0description\";s:0:\"\";s:11:\"\0*\0metaData\";a:0:{}s:7:\"\0*\0type\";s:4:\"page\";s:12:\"\0*\0prettyUrl\";N;s:17:\"\0*\0targetGroupIds\";s:0:\"\";s:13:\"\0*\0controller\";s:7:\"default\";s:11:\"\0*\0template\";s:0:\"\";s:12:\"\0*\0editables\";a:0:{}s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:1;s:11:\"\0*\0parentId\";i:0;s:6:\"\0*\0key\";s:0:\"\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:999999;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614795784;s:19:\"\0*\0modificationDate\";i:1614795784;s:12:\"\0*\0userOwner\";i:1;s:19:\"\0*\0userModification\";i:1;s:13:\"\0*\0properties\";a:0:{}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:0;s:25:\"\0*\0__dataVersionTimestamp\";i:1614795784;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_1\";}',	0,	1618914672,	1619519472),
('document_session_2_1554698594de4d998867f7a390800f19',	'document-session',	'O:27:\"Pimcore\\Model\\Document\\Page\":31:{s:8:\"\0*\0title\";s:9:\"Editables\";s:14:\"\0*\0description\";s:0:\"\";s:11:\"\0*\0metaData\";a:0:{}s:7:\"\0*\0type\";s:4:\"page\";s:12:\"\0*\0prettyUrl\";N;s:17:\"\0*\0targetGroupIds\";s:0:\"\";s:13:\"\0*\0controller\";s:47:\"App\\Controller\\DefaultController::defaultAction\";s:11:\"\0*\0template\";s:26:\"Default/editable.html.twig\";s:12:\"\0*\0editables\";a:20:{s:5:\"block\";O:46:\"Pimcore\\Model\\Document\\Editable\\Scheduledblock\":8:{s:23:\"\0*\0cachedCurrentElement\";N;s:10:\"\0*\0indices\";a:1:{i:0;a:2:{s:3:\"key\";s:1:\"0\";s:4:\"date\";s:10:\"1614795858\";}}s:10:\"\0*\0current\";i:0;s:7:\"\0*\0name\";s:5:\"block\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:21:\"block:0.sched_content\";O:39:\"Pimcore\\Model\\Document\\Editable\\Wysiwyg\":6:{s:7:\"\0*\0text\";s:0:\"\";s:7:\"\0*\0name\";s:21:\"block:0.sched_content\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:21:\"block:0.sched_subline\";O:37:\"Pimcore\\Model\\Document\\Editable\\Input\":6:{s:7:\"\0*\0text\";s:0:\"\";s:7:\"\0*\0name\";s:21:\"block:0.sched_subline\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:8:\"blogLink\";O:36:\"Pimcore\\Model\\Document\\Editable\\Link\":6:{s:7:\"\0*\0data\";a:9:{s:4:\"path\";s:0:\"\";s:10:\"parameters\";s:0:\"\";s:6:\"anchor\";s:0:\"\";s:9:\"accesskey\";s:0:\"\";s:3:\"rel\";s:0:\"\";s:8:\"tabindex\";s:0:\"\";s:6:\"target\";s:0:\"\";s:5:\"class\";s:0:\"\";s:10:\"attributes\";s:0:\"\";}s:7:\"\0*\0name\";s:8:\"blogLink\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:14:\"campaignVideo2\";O:37:\"Pimcore\\Model\\Document\\Editable\\Video\":10:{s:5:\"\0*\0id\";N;s:7:\"\0*\0type\";s:5:\"asset\";s:9:\"\0*\0poster\";N;s:8:\"\0*\0title\";s:0:\"\";s:14:\"\0*\0description\";s:0:\"\";s:7:\"\0*\0name\";s:14:\"campaignVideo2\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:10:\"categories\";O:43:\"Pimcore\\Model\\Document\\Editable\\Multiselect\":6:{s:9:\"\0*\0values\";a:0:{}s:7:\"\0*\0name\";s:10:\"categories\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:12:\"contentblock\";O:37:\"Pimcore\\Model\\Document\\Editable\\Block\":7:{s:10:\"\0*\0indices\";a:0:{}s:10:\"\0*\0current\";i:0;s:7:\"\0*\0name\";s:12:\"contentblock\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:10:\"myCheckbox\";O:40:\"Pimcore\\Model\\Document\\Editable\\Checkbox\":6:{s:8:\"\0*\0value\";b:0;s:7:\"\0*\0name\";s:10:\"myCheckbox\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:6:\"myDate\";O:36:\"Pimcore\\Model\\Document\\Editable\\Date\":6:{s:7:\"\0*\0date\";N;s:7:\"\0*\0name\";s:6:\"myDate\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:9:\"myGallery\";O:41:\"Pimcore\\Model\\Document\\Editable\\Renderlet\":8:{s:5:\"\0*\0id\";N;s:7:\"\0*\0type\";N;s:10:\"\0*\0subtype\";N;s:7:\"\0*\0name\";s:9:\"myGallery\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:10:\"myHeadline\";O:37:\"Pimcore\\Model\\Document\\Editable\\Input\":6:{s:7:\"\0*\0text\";s:0:\"\";s:7:\"\0*\0name\";s:10:\"myHeadline\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:7:\"myImage\";O:37:\"Pimcore\\Model\\Document\\Editable\\Image\":14:{s:5:\"\0*\0id\";N;s:6:\"\0*\0alt\";s:0:\"\";s:14:\"\0*\0cropPercent\";N;s:12:\"\0*\0cropWidth\";N;s:13:\"\0*\0cropHeight\";N;s:10:\"\0*\0cropTop\";N;s:11:\"\0*\0cropLeft\";N;s:11:\"\0*\0hotspots\";N;s:9:\"\0*\0marker\";N;s:7:\"\0*\0name\";s:7:\"myImage\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:6:\"myItem\";O:38:\"Pimcore\\Model\\Document\\Editable\\Select\":6:{s:7:\"\0*\0text\";s:6:\"otion1\";s:7:\"\0*\0name\";s:6:\"myItem\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:8:\"myNumber\";O:39:\"Pimcore\\Model\\Document\\Editable\\Numeric\":6:{s:9:\"\0*\0number\";N;s:7:\"\0*\0name\";s:8:\"myNumber\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:10:\"myRelation\";O:40:\"Pimcore\\Model\\Document\\Editable\\Relation\":8:{s:5:\"\0*\0id\";N;s:7:\"\0*\0type\";N;s:10:\"\0*\0subtype\";N;s:7:\"\0*\0name\";s:10:\"myRelation\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:9:\"mySnippet\";O:39:\"Pimcore\\Model\\Document\\Editable\\Snippet\":6:{s:5:\"\0*\0id\";N;s:7:\"\0*\0name\";s:9:\"mySnippet\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:11:\"objectPaths\";O:41:\"Pimcore\\Model\\Document\\Editable\\Relations\":6:{s:13:\"\0*\0elementIds\";a:0:{}s:7:\"\0*\0name\";s:11:\"objectPaths\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:17:\"productProperties\";O:37:\"Pimcore\\Model\\Document\\Editable\\Table\":6:{s:7:\"\0*\0data\";a:4:{i:0;a:3:{i:0;s:4:\"Col1\";i:1;s:4:\"Col2\";i:2;s:5:\" Col3\";}i:1;a:3:{i:0;s:5:\"Value\";i:1;s:6:\" Value\";i:2;s:7:\"  Value\";}i:2;a:3:{i:0;s:5:\"Value\";i:1;s:7:\"  Value\";i:2;s:7:\"  Value\";}i:3;a:3:{i:0;s:1:\" \";i:1;s:1:\" \";i:2;s:1:\" \";}}s:7:\"\0*\0name\";s:17:\"productProperties\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:19:\"product_description\";O:40:\"Pimcore\\Model\\Document\\Editable\\Textarea\":6:{s:7:\"\0*\0text\";s:0:\"\";s:7:\"\0*\0name\";s:19:\"product_description\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:14:\"specialContent\";O:39:\"Pimcore\\Model\\Document\\Editable\\Wysiwyg\":6:{s:7:\"\0*\0text\";s:0:\"\";s:7:\"\0*\0name\";s:14:\"specialContent\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:2;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}}s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:2;s:11:\"\0*\0parentId\";i:1;s:6:\"\0*\0key\";s:18:\"The Editables Page\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:1;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614795823;s:19:\"\0*\0modificationDate\";i:1618916334;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:13:\"\0*\0properties\";a:1:{s:15:\"navigation_name\";O:22:\"Pimcore\\Model\\Property\":8:{s:7:\"\0*\0name\";s:15:\"navigation_name\";s:7:\"\0*\0data\";s:9:\"Editables\";s:7:\"\0*\0type\";s:4:\"text\";s:8:\"\0*\0ctype\";s:8:\"document\";s:8:\"\0*\0cpath\";s:19:\"/The Editables Page\";s:6:\"\0*\0cid\";i:2;s:14:\"\0*\0inheritable\";b:0;s:12:\"\0*\0inherited\";b:0;}}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:6;s:25:\"\0*\0__dataVersionTimestamp\";i:1614795969;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_2\";}',	0,	1618916336,	1619521136),
('document_session_2_916b06fe4bf3f9a0ba9a0244915e44b7',	'document-session',	'O:27:\"Pimcore\\Model\\Document\\Page\":34:{s:8:\"\0*\0title\";s:9:\"Editables\";s:14:\"\0*\0description\";s:0:\"\";s:11:\"\0*\0metaData\";a:0:{}s:7:\"\0*\0type\";s:4:\"page\";s:12:\"\0*\0prettyUrl\";N;s:17:\"\0*\0targetGroupIds\";s:0:\"\";s:9:\"\0*\0module\";s:9:\"AppBundle\";s:13:\"\0*\0controller\";s:7:\"Default\";s:9:\"\0*\0action\";s:7:\"default\";s:11:\"\0*\0template\";s:26:\"Default/editable.html.twig\";s:11:\"\0*\0elements\";a:20:{s:10:\"myCheckbox\";O:40:\"Pimcore\\Model\\Document\\Editable\\Checkbox\":6:{s:5:\"value\";b:0;s:7:\"\0*\0name\";s:10:\"myCheckbox\";s:11:\"\0*\0realName\";s:10:\"myCheckbox\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:6:\"myDate\";O:36:\"Pimcore\\Model\\Document\\Editable\\Date\":6:{s:4:\"date\";N;s:7:\"\0*\0name\";s:6:\"myDate\";s:11:\"\0*\0realName\";s:6:\"myDate\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:10:\"myRelation\";O:40:\"Pimcore\\Model\\Document\\Editable\\Relation\":8:{s:2:\"id\";N;s:4:\"type\";N;s:7:\"subtype\";N;s:7:\"\0*\0name\";s:10:\"myRelation\";s:11:\"\0*\0realName\";s:10:\"myRelation\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:11:\"objectPaths\";O:41:\"Pimcore\\Model\\Document\\Editable\\Relations\":6:{s:10:\"elementIds\";a:0:{}s:7:\"\0*\0name\";s:11:\"objectPaths\";s:11:\"\0*\0realName\";s:11:\"objectPaths\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:7:\"myImage\";O:37:\"Pimcore\\Model\\Document\\Editable\\Image\":14:{s:2:\"id\";N;s:3:\"alt\";s:0:\"\";s:11:\"cropPercent\";N;s:9:\"cropWidth\";N;s:10:\"cropHeight\";N;s:7:\"cropTop\";N;s:8:\"cropLeft\";N;s:8:\"hotspots\";N;s:6:\"marker\";N;s:7:\"\0*\0name\";s:7:\"myImage\";s:11:\"\0*\0realName\";s:7:\"myImage\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:10:\"myHeadline\";O:37:\"Pimcore\\Model\\Document\\Editable\\Input\":6:{s:4:\"text\";s:0:\"\";s:7:\"\0*\0name\";s:10:\"myHeadline\";s:11:\"\0*\0realName\";s:10:\"myHeadline\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:8:\"blogLink\";O:36:\"Pimcore\\Model\\Document\\Editable\\Link\":6:{s:4:\"data\";a:10:{s:4:\"type\";s:8:\"internal\";s:4:\"path\";s:0:\"\";s:10:\"parameters\";s:0:\"\";s:6:\"anchor\";s:0:\"\";s:9:\"accesskey\";s:0:\"\";s:3:\"rel\";s:0:\"\";s:8:\"tabindex\";s:0:\"\";s:6:\"target\";s:0:\"\";s:5:\"class\";s:0:\"\";s:10:\"attributes\";s:0:\"\";}s:7:\"\0*\0name\";s:8:\"blogLink\";s:11:\"\0*\0realName\";s:8:\"blogLink\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:10:\"categories\";O:43:\"Pimcore\\Model\\Document\\Editable\\Multiselect\":6:{s:6:\"values\";a:0:{}s:7:\"\0*\0name\";s:10:\"categories\";s:11:\"\0*\0realName\";s:10:\"categories\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:8:\"myNumber\";O:39:\"Pimcore\\Model\\Document\\Editable\\Numeric\":6:{s:6:\"number\";N;s:7:\"\0*\0name\";s:8:\"myNumber\";s:11:\"\0*\0realName\";s:8:\"myNumber\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:9:\"myGallery\";O:41:\"Pimcore\\Model\\Document\\Editable\\Renderlet\":8:{s:2:\"id\";N;s:4:\"type\";N;s:7:\"subtype\";N;s:7:\"\0*\0name\";s:9:\"myGallery\";s:11:\"\0*\0realName\";s:9:\"myGallery\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:6:\"myItem\";O:38:\"Pimcore\\Model\\Document\\Editable\\Select\":6:{s:4:\"text\";s:6:\"otion1\";s:7:\"\0*\0name\";s:6:\"myItem\";s:11:\"\0*\0realName\";s:6:\"myItem\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:9:\"mySnippet\";O:39:\"Pimcore\\Model\\Document\\Editable\\Snippet\":6:{s:2:\"id\";N;s:7:\"\0*\0name\";s:9:\"mySnippet\";s:11:\"\0*\0realName\";s:9:\"mySnippet\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:17:\"productProperties\";O:37:\"Pimcore\\Model\\Document\\Editable\\Table\":6:{s:4:\"data\";a:4:{i:0;a:3:{i:0;s:4:\"Col1\";i:1;s:4:\"Col2\";i:2;s:5:\" Col3\";}i:1;a:3:{i:0;s:5:\"Value\";i:1;s:6:\" Value\";i:2;s:7:\"  Value\";}i:2;a:3:{i:0;s:5:\"Value\";i:1;s:7:\"  Value\";i:2;s:7:\"  Value\";}i:3;a:3:{i:0;s:1:\" \";i:1;s:1:\" \";i:2;s:1:\" \";}}s:7:\"\0*\0name\";s:17:\"productProperties\";s:11:\"\0*\0realName\";s:17:\"productProperties\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:19:\"product_description\";O:40:\"Pimcore\\Model\\Document\\Editable\\Textarea\":6:{s:4:\"text\";s:0:\"\";s:7:\"\0*\0name\";s:19:\"product_description\";s:11:\"\0*\0realName\";s:19:\"product_description\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:14:\"campaignVideo2\";O:37:\"Pimcore\\Model\\Document\\Editable\\Video\":10:{s:2:\"id\";N;s:4:\"type\";s:5:\"asset\";s:6:\"poster\";N;s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:7:\"\0*\0name\";s:14:\"campaignVideo2\";s:11:\"\0*\0realName\";s:14:\"campaignVideo2\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:14:\"specialContent\";O:39:\"Pimcore\\Model\\Document\\Editable\\Wysiwyg\":6:{s:4:\"text\";s:0:\"\";s:7:\"\0*\0name\";s:14:\"specialContent\";s:11:\"\0*\0realName\";s:14:\"specialContent\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:12:\"contentblock\";O:37:\"Pimcore\\Model\\Document\\Editable\\Block\":8:{s:7:\"indices\";a:0:{}s:7:\"current\";i:0;s:8:\"suffixes\";a:0:{}s:7:\"\0*\0name\";s:12:\"contentblock\";s:11:\"\0*\0realName\";s:12:\"contentblock\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:5:\"block\";O:46:\"Pimcore\\Model\\Document\\Editable\\Scheduledblock\":9:{s:23:\"\0*\0cachedCurrentElement\";N;s:7:\"indices\";a:1:{i:0;a:2:{s:3:\"key\";s:1:\"0\";s:4:\"date\";s:10:\"1614795858\";}}s:7:\"current\";i:0;s:8:\"suffixes\";a:0:{}s:7:\"\0*\0name\";s:5:\"block\";s:11:\"\0*\0realName\";s:5:\"block\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:21:\"block:0.sched_subline\";O:37:\"Pimcore\\Model\\Document\\Editable\\Input\":6:{s:4:\"text\";s:0:\"\";s:7:\"\0*\0name\";s:21:\"block:0.sched_subline\";s:11:\"\0*\0realName\";s:13:\"sched_subline\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}s:21:\"block:0.sched_content\";O:39:\"Pimcore\\Model\\Document\\Editable\\Wysiwyg\":6:{s:4:\"text\";s:0:\"\";s:7:\"\0*\0name\";s:21:\"block:0.sched_content\";s:11:\"\0*\0realName\";s:13:\"sched_content\";s:13:\"\0*\0documentId\";i:0;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}}s:12:\"\0*\0editables\";R:12;s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:2;s:11:\"\0*\0parentId\";i:1;s:6:\"\0*\0key\";s:18:\"The Editables Page\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:1;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614795823;s:19:\"\0*\0modificationDate\";i:1614795969;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:13:\"\0*\0properties\";a:1:{s:15:\"navigation_name\";O:22:\"Pimcore\\Model\\Property\":8:{s:7:\"\0*\0name\";s:15:\"navigation_name\";s:7:\"\0*\0data\";s:9:\"Editables\";s:7:\"\0*\0type\";s:4:\"text\";s:8:\"\0*\0ctype\";s:8:\"document\";s:8:\"\0*\0cpath\";s:19:\"/The Editables Page\";s:6:\"\0*\0cid\";i:2;s:14:\"\0*\0inheritable\";b:0;s:12:\"\0*\0inherited\";b:0;}}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:5;s:25:\"\0*\0__dataVersionTimestamp\";i:1614795844;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_2\";}',	0,	1614795969,	1615400769),
('document_session_3_1554698594de4d998867f7a390800f19',	'document-session',	'O:27:\"Pimcore\\Model\\Document\\Page\":31:{s:8:\"\0*\0title\";s:14:\"Plain Document\";s:14:\"\0*\0description\";s:0:\"\";s:11:\"\0*\0metaData\";a:0:{}s:7:\"\0*\0type\";s:4:\"page\";s:12:\"\0*\0prettyUrl\";N;s:17:\"\0*\0targetGroupIds\";s:0:\"\";s:13:\"\0*\0controller\";s:47:\"App\\Controller\\DefaultController::defaultAction\";s:11:\"\0*\0template\";s:25:\"Default/default.html.twig\";s:12:\"\0*\0editables\";a:0:{}s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:3;s:11:\"\0*\0parentId\";i:1;s:6:\"\0*\0key\";s:14:\"Plain Document\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:2;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614797774;s:19:\"\0*\0modificationDate\";i:1618916948;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:13:\"\0*\0properties\";a:1:{s:15:\"navigation_name\";O:22:\"Pimcore\\Model\\Property\":8:{s:7:\"\0*\0name\";s:15:\"navigation_name\";s:7:\"\0*\0data\";s:14:\"Plain Document\";s:7:\"\0*\0type\";s:4:\"text\";s:8:\"\0*\0ctype\";s:8:\"document\";s:8:\"\0*\0cpath\";s:15:\"/Plain Document\";s:6:\"\0*\0cid\";i:3;s:14:\"\0*\0inheritable\";b:0;s:12:\"\0*\0inherited\";b:0;}}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:6;s:25:\"\0*\0__dataVersionTimestamp\";i:1614797794;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_3\";}',	0,	1618916950,	1619521750),
('document_session_3_916b06fe4bf3f9a0ba9a0244915e44b7',	'document-session',	'O:27:\"Pimcore\\Model\\Document\\Page\":34:{s:8:\"\0*\0title\";s:14:\"Plain Document\";s:14:\"\0*\0description\";s:0:\"\";s:11:\"\0*\0metaData\";a:0:{}s:7:\"\0*\0type\";s:4:\"page\";s:12:\"\0*\0prettyUrl\";N;s:17:\"\0*\0targetGroupIds\";s:0:\"\";s:9:\"\0*\0module\";s:9:\"AppBundle\";s:13:\"\0*\0controller\";s:7:\"Default\";s:9:\"\0*\0action\";s:7:\"default\";s:11:\"\0*\0template\";N;s:11:\"\0*\0elements\";a:0:{}s:12:\"\0*\0editables\";R:12;s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:3;s:11:\"\0*\0parentId\";i:1;s:6:\"\0*\0key\";s:14:\"Plain Document\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:2;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614797774;s:19:\"\0*\0modificationDate\";i:1614797794;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:13:\"\0*\0properties\";a:1:{s:15:\"navigation_name\";O:22:\"Pimcore\\Model\\Property\":8:{s:7:\"\0*\0name\";s:15:\"navigation_name\";s:7:\"\0*\0data\";s:14:\"Plain Document\";s:7:\"\0*\0type\";s:4:\"text\";s:8:\"\0*\0ctype\";s:8:\"document\";s:8:\"\0*\0cpath\";s:15:\"/Plain Document\";s:6:\"\0*\0cid\";i:3;s:14:\"\0*\0inheritable\";b:0;s:12:\"\0*\0inherited\";b:0;}}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:2;s:25:\"\0*\0__dataVersionTimestamp\";i:1614797774;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_3\";}',	0,	1614797794,	1615402594),
('document_session_4_1554698594de4d998867f7a390800f19',	'document-session',	'O:30:\"Pimcore\\Model\\Document\\Snippet\":26:{s:7:\"\0*\0type\";s:7:\"snippet\";s:13:\"\0*\0controller\";s:47:\"App\\Controller\\DefaultController::defaultAction\";s:11:\"\0*\0template\";s:25:\"Default/default.html.twig\";s:12:\"\0*\0editables\";a:0:{}s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:4;s:11:\"\0*\0parentId\";i:1;s:6:\"\0*\0key\";s:9:\"MySnippet\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:3;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614797789;s:19:\"\0*\0modificationDate\";i:1618916292;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:13:\"\0*\0properties\";a:0:{}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:6;s:25:\"\0*\0__dataVersionTimestamp\";i:1618916255;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_4\";}',	0,	1618916294,	1619521094),
('document_session_4_5464e61869cb750b61e7d182799a09f2',	'document-session',	'O:30:\"Pimcore\\Model\\Document\\Snippet\":26:{s:7:\"\0*\0type\";s:7:\"snippet\";s:13:\"\0*\0controller\";s:7:\"Default\";s:11:\"\0*\0template\";N;s:12:\"\0*\0editables\";a:0:{}s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:4;s:11:\"\0*\0parentId\";i:1;s:6:\"\0*\0key\";s:9:\"MySnippet\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:3;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614797789;s:19:\"\0*\0modificationDate\";i:1614797792;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:13:\"\0*\0properties\";a:0:{}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:3;s:25:\"\0*\0__dataVersionTimestamp\";i:1614797792;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_4\";}',	0,	1618915666,	1619520466),
('document_session_4_916b06fe4bf3f9a0ba9a0244915e44b7',	'document-session',	'O:30:\"Pimcore\\Model\\Document\\Snippet\":29:{s:7:\"\0*\0type\";s:7:\"snippet\";s:9:\"\0*\0module\";s:9:\"AppBundle\";s:13:\"\0*\0controller\";s:7:\"Default\";s:9:\"\0*\0action\";s:7:\"default\";s:11:\"\0*\0template\";N;s:11:\"\0*\0elements\";a:0:{}s:12:\"\0*\0editables\";R:7;s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:4;s:11:\"\0*\0parentId\";i:1;s:6:\"\0*\0key\";s:9:\"MySnippet\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:3;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614797789;s:19:\"\0*\0modificationDate\";i:1614797792;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:13:\"\0*\0properties\";a:0:{}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:3;s:25:\"\0*\0__dataVersionTimestamp\";i:1614797789;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_4\";}',	0,	1614797792,	1615402592),
('document_session_5_1554698594de4d998867f7a390800f19',	'document-session',	'O:27:\"Pimcore\\Model\\Document\\Page\":31:{s:8:\"\0*\0title\";s:17:\"The Template Page\";s:14:\"\0*\0description\";s:0:\"\";s:11:\"\0*\0metaData\";a:0:{}s:7:\"\0*\0type\";s:4:\"page\";s:12:\"\0*\0prettyUrl\";N;s:17:\"\0*\0targetGroupIds\";s:0:\"\";s:13:\"\0*\0controller\";s:47:\"App\\Controller\\DefaultController::defaultAction\";s:11:\"\0*\0template\";s:25:\"Default/helpers.html.twig\";s:12:\"\0*\0editables\";a:1:{s:12:\"contentblock\";O:37:\"Pimcore\\Model\\Document\\Editable\\Block\":7:{s:10:\"\0*\0indices\";a:0:{}s:10:\"\0*\0current\";i:0;s:7:\"\0*\0name\";s:12:\"contentblock\";s:11:\"\0*\0realName\";N;s:13:\"\0*\0documentId\";i:5;s:12:\"\0*\0inherited\";b:0;s:14:\"\0*\0inDialogBox\";N;}}s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:5;s:11:\"\0*\0parentId\";i:1;s:6:\"\0*\0key\";s:17:\"The Template Page\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:4;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614797802;s:19:\"\0*\0modificationDate\";i:1618916914;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:13:\"\0*\0properties\";a:1:{s:15:\"navigation_name\";O:22:\"Pimcore\\Model\\Property\":8:{s:7:\"\0*\0name\";s:15:\"navigation_name\";s:7:\"\0*\0data\";s:17:\"The Template Page\";s:7:\"\0*\0type\";s:4:\"text\";s:8:\"\0*\0ctype\";s:8:\"document\";s:8:\"\0*\0cpath\";s:18:\"/The Template Page\";s:6:\"\0*\0cid\";i:5;s:14:\"\0*\0inheritable\";b:0;s:12:\"\0*\0inherited\";b:0;}}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:12;s:25:\"\0*\0__dataVersionTimestamp\";i:1618916589;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_5\";}',	0,	1618917267,	1619522067),
('document_session_5_5464e61869cb750b61e7d182799a09f2',	'document-session',	'O:27:\"Pimcore\\Model\\Document\\Page\":31:{s:8:\"\0*\0title\";s:17:\"The Template Page\";s:14:\"\0*\0description\";s:0:\"\";s:11:\"\0*\0metaData\";a:0:{}s:7:\"\0*\0type\";s:4:\"page\";s:12:\"\0*\0prettyUrl\";N;s:17:\"\0*\0targetGroupIds\";s:0:\"\";s:13:\"\0*\0controller\";s:47:\"App\\Controller\\DefaultController::defaultAction\";s:11:\"\0*\0template\";s:25:\"Default/helpers.html.twig\";s:12:\"\0*\0editables\";a:0:{}s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:5;s:11:\"\0*\0parentId\";i:1;s:6:\"\0*\0key\";s:17:\"The Template Page\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:4;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614797802;s:19:\"\0*\0modificationDate\";i:1618916914;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:13:\"\0*\0properties\";a:1:{s:15:\"navigation_name\";O:22:\"Pimcore\\Model\\Property\":8:{s:7:\"\0*\0name\";s:15:\"navigation_name\";s:7:\"\0*\0data\";s:17:\"The Template Page\";s:7:\"\0*\0type\";s:4:\"text\";s:8:\"\0*\0ctype\";s:8:\"document\";s:8:\"\0*\0cpath\";N;s:6:\"\0*\0cid\";i:5;s:14:\"\0*\0inheritable\";b:0;s:12:\"\0*\0inherited\";b:0;}}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:12;s:25:\"\0*\0__dataVersionTimestamp\";i:1618916914;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_5\";}',	0,	1618917257,	1619522057),
('document_session_5_916b06fe4bf3f9a0ba9a0244915e44b7',	'document-session',	'O:27:\"Pimcore\\Model\\Document\\Page\":34:{s:8:\"\0*\0title\";s:17:\"The Template Page\";s:14:\"\0*\0description\";s:0:\"\";s:11:\"\0*\0metaData\";a:0:{}s:7:\"\0*\0type\";s:4:\"page\";s:12:\"\0*\0prettyUrl\";N;s:17:\"\0*\0targetGroupIds\";s:0:\"\";s:9:\"\0*\0module\";s:9:\"AppBundle\";s:13:\"\0*\0controller\";s:39:\"@AppBundle\\Controller\\DefaultController\";s:9:\"\0*\0action\";s:7:\"default\";s:11:\"\0*\0template\";s:25:\"Default/helpers.html.twig\";s:11:\"\0*\0elements\";a:0:{}s:12:\"\0*\0editables\";R:12;s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:5;s:11:\"\0*\0parentId\";i:1;s:6:\"\0*\0key\";s:17:\"The Template Page\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:4;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1614797802;s:19:\"\0*\0modificationDate\";i:1614797875;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:13:\"\0*\0properties\";a:1:{s:15:\"navigation_name\";O:22:\"Pimcore\\Model\\Property\":8:{s:7:\"\0*\0name\";s:15:\"navigation_name\";s:7:\"\0*\0data\";s:17:\"The Template Page\";s:7:\"\0*\0type\";s:4:\"text\";s:8:\"\0*\0ctype\";s:8:\"document\";s:8:\"\0*\0cpath\";s:18:\"/The Template Page\";s:6:\"\0*\0cid\";i:5;s:14:\"\0*\0inheritable\";b:0;s:12:\"\0*\0inherited\";b:0;}}s:11:\"\0*\0children\";a:0:{}s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:9;s:25:\"\0*\0__dataVersionTimestamp\";i:1614797802;s:12:\"\0*\0_fulldump\";b:1;s:24:\"____pimcore_cache_item__\";s:10:\"document_5\";}',	0,	1614798177,	1615402977),
('thumb_10__e190f6c03abe873f911601bb394d8215',	'image-optimize-queue',	'/myFolder/image-thumb__10__pimcore-system-treepreview/2020-11-14 20_18_08-localhost __ Pimcore@2x.jpg',	0,	1618916469,	1619521269),
('thumb_10__fe35366113b0bd5bed7834b6d2d8685d',	'image-optimize-queue',	'/myFolder/image-thumb__10__pimcore-system-treepreview/2020-11-14 20_18_08-localhost __ Pimcore.jpg',	0,	1618916464,	1619521264),
('thumb_3__3f217dafa879416599004ea81048b502',	'image-optimize-queue',	'/myFolder/image-thumb__3__auto_1b2dbbbc2668cacb229fac41906f8ace/logo-claim.png',	0,	1618917204,	1619522004),
('thumb_3__5c1abc05df56d608fdb6681544d3a871',	'thumbnail_deferred',	'O:42:\"Pimcore\\Model\\Asset\\Image\\Thumbnail\\Config\":16:{s:8:\"\0*\0items\";a:1:{i:0;a:2:{s:6:\"method\";s:12:\"scaleByWidth\";s:9:\"arguments\";a:2:{s:5:\"width\";i:50;s:11:\"forceResize\";b:0;}}}s:9:\"\0*\0medias\";a:0:{}s:7:\"\0*\0name\";s:37:\"auto_1b2dbbbc2668cacb229fac41906f8ace\";s:14:\"\0*\0description\";s:0:\"\";s:8:\"\0*\0group\";s:0:\"\";s:9:\"\0*\0format\";s:3:\"png\";s:10:\"\0*\0quality\";i:85;s:17:\"\0*\0highResolution\";d:2;s:16:\"\0*\0preserveColor\";b:0;s:19:\"\0*\0preserveMetaData\";b:0;s:15:\"\0*\0rasterizeSVG\";b:0;s:15:\"\0*\0downloadable\";b:0;s:19:\"\0*\0modificationDate\";N;s:15:\"\0*\0creationDate\";N;s:17:\"\0*\0filenameSuffix\";N;s:20:\"\0*\0preserveAnimation\";b:0;}',	1,	1618917199,	1619521999),
('thumb_3__701232df3953c12fdc60980e6d743759',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__3__pimcore-system-treepreview/logo-claim.png',	0,	1614798009,	1615402809),
('thumb_3__7627ae536d0111e86e32f2193ef6f00e',	'image-optimize-queue',	'/myFolder/image-thumb__3__pimcore-system-treepreview/logo-claim@2x.jpg',	0,	1618916540,	1619521340),
('thumb_3__97855a78899bfcdaf3cdce992c155b08',	'thumbnail_deferred',	'O:42:\"Pimcore\\Model\\Asset\\Image\\Thumbnail\\Config\":16:{s:5:\"items\";a:1:{i:0;a:2:{s:6:\"method\";s:12:\"scaleByWidth\";s:9:\"arguments\";a:2:{s:5:\"width\";i:50;s:11:\"forceResize\";b:0;}}}s:6:\"medias\";a:0:{}s:4:\"name\";s:37:\"auto_335f69d6c815c5b580ffa57d3835c9bf\";s:11:\"description\";s:0:\"\";s:5:\"group\";s:0:\"\";s:6:\"format\";s:3:\"png\";s:7:\"quality\";i:85;s:14:\"highResolution\";d:2;s:13:\"preserveColor\";b:0;s:16:\"preserveMetaData\";b:0;s:12:\"rasterizeSVG\";b:0;s:12:\"downloadable\";b:0;s:16:\"modificationDate\";N;s:12:\"creationDate\";N;s:14:\"filenameSuffix\";N;s:15:\"forcePictureTag\";b:0;}',	1,	1614798177,	1615402977),
('thumb_3__9867f6d388975b3cefa3b2a6981d7357',	'image-optimize-queue',	'/myFolder/image-thumb__3__MyThubnails/logo-claim.png',	0,	1618917204,	1619522004),
('thumb_3__a76d884959c4c796fcddea48cceacb54',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__3__pimcore-system-treepreview/logo-claim.jpg',	0,	1614798008,	1615402808),
('thumb_3__ac1a2868447b6d22d989005c4a550ff3',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__3__auto_335f69d6c815c5b580ffa57d3835c9bf/logo-claim.png',	0,	1614798178,	1615402978),
('thumb_3__b310fd25d01f4aed9d7276f37796491d',	'thumbnail_deferred',	'O:42:\"Pimcore\\Model\\Asset\\Image\\Thumbnail\\Config\":16:{s:5:\"items\";a:1:{i:0;a:2:{s:6:\"method\";s:12:\"scaleByWidth\";s:9:\"arguments\";a:2:{s:5:\"width\";i:50;s:11:\"forceResize\";b:0;}}}s:6:\"medias\";a:0:{}s:4:\"name\";s:37:\"auto_335f69d6c815c5b580ffa57d3835c9bf\";s:11:\"description\";s:0:\"\";s:5:\"group\";s:0:\"\";s:6:\"format\";s:3:\"png\";s:7:\"quality\";i:85;s:14:\"highResolution\";N;s:13:\"preserveColor\";b:0;s:16:\"preserveMetaData\";b:0;s:12:\"rasterizeSVG\";b:0;s:12:\"downloadable\";b:0;s:16:\"modificationDate\";N;s:12:\"creationDate\";N;s:14:\"filenameSuffix\";N;s:15:\"forcePictureTag\";b:0;}',	1,	1614798255,	1615403055),
('thumb_3__d4f25dd5dc3c6e934625b603752bf634',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__3__pimcore-system-treepreview/logo-claim@2x.jpg',	0,	1614798013,	1615402813),
('thumb_3__e3c97ea42c646909f7042e4ec95e2d06',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__3__MyThubnails/logo-claim.png',	0,	1614798178,	1615402978),
('thumb_4__4811c1e13a8e46bb912458458e30d738',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__4__pimcore-system-treepreview/logo-claim_copy.jpg',	0,	1614798020,	1615402820),
('thumb_4__4d5a2e6728c1784d7e5cc7cf06e3d7d1',	'image-optimize-queue',	'/myFolder/image-thumb__4__pimcore-system-treepreview/logo-claim2@2x.jpg',	0,	1618916536,	1619521336),
('thumb_4__607a6013afab039e3cfc4b29b3a63f50',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__4__pimcore-system-treepreview/logo-claim2@2x.jpg',	0,	1614798260,	1615403060),
('thumb_4__fb234894d07ca24ebb4c85a732690313',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__4__pimcore-system-treepreview/logo-claim_copy.png',	0,	1614798020,	1615402820),
('thumb_5__321d291c8db69cbf976b33a92bfe454a',	'image-optimize-queue',	'/myFolder/image-thumb__5__pimcore-system-treepreview/logo-claim1@2x.jpg',	0,	1618916538,	1619521338),
('thumb_5__5563bbf6bad7f935344dd0d698663615',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__5__pimcore-system-treepreview/logo-claim1@2x.jpg',	0,	1614798260,	1615403060),
('thumb_5__8237dc1359aa2ab2c8fbe7de70cef968',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__5__pimcore-system-treepreview/logo-claim_copy_copy.png',	0,	1614798026,	1615402826),
('thumb_5__d16485a9681d7942232e65b67b63178f',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__5__pimcore-system-treepreview/logo-claim_copy_copy.jpg',	0,	1614798026,	1615402826),
('thumb_6__15ce34ce89b07078a1b70446779ba0df',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__6__pimcore-system-treepreview/logo-claim_copy_copy_copy.jpg',	0,	1614798032,	1615402832),
('thumb_6__77df91a69bbbcdeadec2bed11c3fb2ec',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__6__pimcore-system-treepreview/logo-claim_copy_copy_copy.png',	0,	1614798032,	1615402832),
('thumb_6__7b5fca4a207552de12ff867faa88977d',	'image-optimize-queue',	'image-thumbnails/myFolder/image-thumb__6__pimcore-system-treepreview/logo-claim3@2x.jpg',	0,	1614798260,	1615403060),
('thumb_8__1018641b030dd24b2aae47592308fb70',	'image-optimize-queue',	'image-thumbnails/_default_upload_bucket/image-thumb__8__auto_e9417a9438b9c5ffee8a3b9a6212e346/logo-claim.png',	0,	1614798203,	1615403003),
('thumb_8__a949e8746b567a5525dea131bf556222',	'image-optimize-queue',	'image-thumbnails/_default_upload_bucket/image-thumb__8__pimcore-system-treepreview/logo-claim.jpg',	0,	1614798200,	1615403000),
('thumb_8__cce1e0589f9a376ce4a42183b2e46c43',	'image-optimize-queue',	'image-thumbnails/_default_upload_bucket/image-thumb__8__pimcore-system-treepreview/logo-claim.png',	0,	1614798201,	1615403001);

DROP TABLE IF EXISTS `translations_admin`;
CREATE TABLE `translations_admin` (
  `key` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `type` varchar(10) DEFAULT NULL,
  `language` varchar(10) NOT NULL DEFAULT '',
  `text` text DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`key`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `translations_admin` (`key`, `type`, `language`, `text`, `creationDate`, `modificationDate`) VALUES
('Desctiption',	NULL,	'cs',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'de',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'en',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'es',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'fa',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'fr',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'hu',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'it',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'ja',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'nl',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'pl',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'pt_BR',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'ru',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'sk',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'sv',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'sv_FI',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'th',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'tr',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'uk',	'',	1614797941,	1614797941),
('Desctiption',	NULL,	'zh_Hans',	'',	1614797941,	1614797941),
('Master',	NULL,	'cs',	'',	1614797941,	1614797941),
('Master',	NULL,	'de',	'',	1614797941,	1614797941),
('Master',	NULL,	'en',	'',	1614797941,	1614797941),
('Master',	NULL,	'es',	'',	1614797941,	1614797941),
('Master',	NULL,	'fa',	'',	1614797941,	1614797941),
('Master',	NULL,	'fr',	'',	1614797941,	1614797941),
('Master',	NULL,	'hu',	'',	1614797941,	1614797941),
('Master',	NULL,	'it',	'',	1614797941,	1614797941),
('Master',	NULL,	'ja',	'',	1614797941,	1614797941),
('Master',	NULL,	'nl',	'',	1614797941,	1614797941),
('Master',	NULL,	'pl',	'',	1614797941,	1614797941),
('Master',	NULL,	'pt_BR',	'',	1614797941,	1614797941),
('Master',	NULL,	'ru',	'',	1614797941,	1614797941),
('Master',	NULL,	'sk',	'',	1614797941,	1614797941),
('Master',	NULL,	'sv',	'',	1614797941,	1614797941),
('Master',	NULL,	'sv_FI',	'',	1614797941,	1614797941),
('Master',	NULL,	'th',	'',	1614797941,	1614797941),
('Master',	NULL,	'tr',	'',	1614797941,	1614797941),
('Master',	NULL,	'uk',	'',	1614797941,	1614797941),
('Master',	NULL,	'zh_Hans',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'cs',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'de',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'en',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'es',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'fa',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'fr',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'hu',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'it',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'ja',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'nl',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'pl',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'pt_BR',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'ru',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'sk',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'sv',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'sv_FI',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'th',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'tr',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'uk',	'',	1614797941,	1614797941),
('Master (Admin Mode)',	NULL,	'zh_Hans',	'',	1614797941,	1614797941),
('My',	NULL,	'cs',	'',	1614795814,	1614795814),
('My',	NULL,	'de',	'',	1614795814,	1614795814),
('My',	NULL,	'en',	'',	1614795814,	1614795814),
('My',	NULL,	'es',	'',	1614795814,	1614795814),
('My',	NULL,	'fa',	'',	1614795814,	1614795814),
('My',	NULL,	'fr',	'',	1614795814,	1614795814),
('My',	NULL,	'hu',	'',	1614795814,	1614795814),
('My',	NULL,	'it',	'',	1614795814,	1614795814),
('My',	NULL,	'ja',	'',	1614795814,	1614795814),
('My',	NULL,	'nl',	'',	1614795814,	1614795814),
('My',	NULL,	'pl',	'',	1614795814,	1614795814),
('My',	NULL,	'pt_BR',	'',	1614795814,	1614795814),
('My',	NULL,	'ru',	'',	1614795814,	1614795814),
('My',	NULL,	'sk',	'',	1614795814,	1614795814),
('My',	NULL,	'sv',	'',	1614795814,	1614795814),
('My',	NULL,	'sv_FI',	'',	1614795814,	1614795814),
('My',	NULL,	'th',	'',	1614795814,	1614795814),
('My',	NULL,	'tr',	'',	1614795814,	1614795814),
('My',	NULL,	'uk',	'',	1614795814,	1614795814),
('My',	NULL,	'zh_Hans',	'',	1614795814,	1614795814),
('MyObject',	NULL,	'cs',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'de',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'en',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'es',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'fa',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'fr',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'hu',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'it',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'ja',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'nl',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'pl',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'pt_BR',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'ru',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'sk',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'sv',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'sv_FI',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'th',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'tr',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'uk',	'',	1614795843,	1614795843),
('MyObject',	NULL,	'zh_Hans',	'',	1614795843,	1614795843),
('SEO',	NULL,	'cs',	'',	1614795843,	1614795843),
('SEO',	NULL,	'de',	'',	1614795843,	1614795843),
('SEO',	NULL,	'en',	'',	1614795843,	1614795843),
('SEO',	NULL,	'es',	'',	1614795843,	1614795843),
('SEO',	NULL,	'fa',	'',	1614795843,	1614795843),
('SEO',	NULL,	'fr',	'',	1614795843,	1614795843),
('SEO',	NULL,	'hu',	'',	1614795843,	1614795843),
('SEO',	NULL,	'it',	'',	1614795843,	1614795843),
('SEO',	NULL,	'ja',	'',	1614795843,	1614795843),
('SEO',	NULL,	'nl',	'',	1614795843,	1614795843),
('SEO',	NULL,	'pl',	'',	1614795843,	1614795843),
('SEO',	NULL,	'pt_BR',	'',	1614795843,	1614795843),
('SEO',	NULL,	'ru',	'',	1614795843,	1614795843),
('SEO',	NULL,	'sk',	'',	1614795843,	1614795843),
('SEO',	NULL,	'sv',	'',	1614795843,	1614795843),
('SEO',	NULL,	'sv_FI',	'',	1614795843,	1614795843),
('SEO',	NULL,	'th',	'',	1614795843,	1614795843),
('SEO',	NULL,	'tr',	'',	1614795843,	1614795843),
('SEO',	NULL,	'uk',	'',	1614795843,	1614795843),
('SEO',	NULL,	'zh_Hans',	'',	1614795843,	1614795843),
('down',	NULL,	'cs',	'',	1614795873,	1614795873),
('down',	NULL,	'de',	'',	1614795873,	1614795873),
('down',	NULL,	'en',	'',	1614795873,	1614795873),
('down',	NULL,	'es',	'',	1614795873,	1614795873),
('down',	NULL,	'fa',	'',	1614795873,	1614795873),
('down',	NULL,	'fr',	'',	1614795873,	1614795873),
('down',	NULL,	'hu',	'',	1614795873,	1614795873),
('down',	NULL,	'it',	'',	1614795873,	1614795873),
('down',	NULL,	'ja',	'',	1614795873,	1614795873),
('down',	NULL,	'nl',	'',	1614795873,	1614795873),
('down',	NULL,	'pl',	'',	1614795873,	1614795873),
('down',	NULL,	'pt_BR',	'',	1614795873,	1614795873),
('down',	NULL,	'ru',	'',	1614795873,	1614795873),
('down',	NULL,	'sk',	'',	1614795873,	1614795873),
('down',	NULL,	'sv',	'',	1614795873,	1614795873),
('down',	NULL,	'sv_FI',	'',	1614795873,	1614795873),
('down',	NULL,	'th',	'',	1614795873,	1614795873),
('down',	NULL,	'tr',	'',	1614795873,	1614795873),
('down',	NULL,	'uk',	'',	1614795873,	1614795873),
('down',	NULL,	'zh_Hans',	'',	1614795873,	1614795873),
('login',	NULL,	'en',	'',	1618909002,	1618909002),
('object_add_dialog_custom_text.MyObject',	NULL,	'cs',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'de',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'en',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'es',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'fa',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'fr',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'hu',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'it',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'ja',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'nl',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'pl',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'pt_BR',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'ru',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'sk',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'sv',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'sv_FI',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'th',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'tr',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'uk',	'',	1614797912,	1614797912),
('object_add_dialog_custom_text.MyObject',	NULL,	'zh_Hans',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'cs',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'de',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'en',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'es',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'fa',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'fr',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'hu',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'it',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'ja',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'nl',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'pl',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'pt_BR',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'ru',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'sk',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'sv',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'sv_FI',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'th',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'tr',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'uk',	'',	1614797912,	1614797912),
('object_add_dialog_custom_title.MyObject',	NULL,	'zh_Hans',	'',	1614797912,	1614797912),
('up',	NULL,	'cs',	'',	1614795873,	1614795873),
('up',	NULL,	'de',	'',	1614795873,	1614795873),
('up',	NULL,	'en',	'',	1614795873,	1614795873),
('up',	NULL,	'es',	'',	1614795873,	1614795873),
('up',	NULL,	'fa',	'',	1614795873,	1614795873),
('up',	NULL,	'fr',	'',	1614795873,	1614795873),
('up',	NULL,	'hu',	'',	1614795873,	1614795873),
('up',	NULL,	'it',	'',	1614795873,	1614795873),
('up',	NULL,	'ja',	'',	1614795873,	1614795873),
('up',	NULL,	'nl',	'',	1614795873,	1614795873),
('up',	NULL,	'pl',	'',	1614795873,	1614795873),
('up',	NULL,	'pt_BR',	'',	1614795873,	1614795873),
('up',	NULL,	'ru',	'',	1614795873,	1614795873),
('up',	NULL,	'sk',	'',	1614795873,	1614795873),
('up',	NULL,	'sv',	'',	1614795873,	1614795873),
('up',	NULL,	'sv_FI',	'',	1614795873,	1614795873),
('up',	NULL,	'th',	'',	1614795873,	1614795873),
('up',	NULL,	'tr',	'',	1614795873,	1614795873),
('up',	NULL,	'uk',	'',	1614795873,	1614795873),
('up',	NULL,	'zh_Hans',	'',	1614795873,	1614795873);

DROP TABLE IF EXISTS `translations_website`;
CREATE TABLE `translations_website` (
  `key` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `type` varchar(10) DEFAULT NULL,
  `language` varchar(10) NOT NULL DEFAULT '',
  `text` text DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`key`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `translations_website` (`key`, `type`, `language`, `text`, `creationDate`, `modificationDate`) VALUES
('Go to',	NULL,	'en',	'',	1614795971,	1614795971),
('my-test-key',	NULL,	'en',	'',	1614798073,	1614798073);

DROP TABLE IF EXISTS `tree_locks`;
CREATE TABLE `tree_locks` (
  `id` int(11) NOT NULL DEFAULT 0,
  `type` enum('asset','document','object') NOT NULL DEFAULT 'asset',
  `locked` enum('self','propagate') DEFAULT NULL,
  PRIMARY KEY (`id`,`type`),
  KEY `type` (`type`),
  KEY `locked` (`locked`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `users`;
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
  `contentLanguages` longtext DEFAULT NULL,
  `admin` tinyint(1) unsigned DEFAULT 0,
  `active` tinyint(1) unsigned DEFAULT 1,
  `permissions` text DEFAULT NULL,
  `roles` varchar(1000) DEFAULT NULL,
  `welcomescreen` tinyint(1) DEFAULT NULL,
  `closeWarning` tinyint(1) DEFAULT NULL,
  `memorizeTabs` tinyint(1) DEFAULT NULL,
  `allowDirtyClose` tinyint(1) unsigned DEFAULT 1,
  `docTypes` varchar(255) DEFAULT NULL,
  `classes` text DEFAULT NULL,
  `twoFactorAuthentication` varchar(255) DEFAULT NULL,
  `activePerspective` varchar(255) DEFAULT NULL,
  `perspectives` longtext DEFAULT NULL,
  `websiteTranslationLanguagesEdit` longtext DEFAULT NULL,
  `websiteTranslationLanguagesView` longtext DEFAULT NULL,
  `lastLogin` int(11) unsigned DEFAULT NULL,
  `keyBindings` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_name` (`type`,`name`),
  KEY `parentId` (`parentId`),
  KEY `name` (`name`),
  KEY `password` (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `parentId`, `type`, `name`, `password`, `firstname`, `lastname`, `email`, `language`, `contentLanguages`, `admin`, `active`, `permissions`, `roles`, `welcomescreen`, `closeWarning`, `memorizeTabs`, `allowDirtyClose`, `docTypes`, `classes`, `twoFactorAuthentication`, `activePerspective`, `perspectives`, `websiteTranslationLanguagesEdit`, `websiteTranslationLanguagesView`, `lastLogin`, `keyBindings`) VALUES
(0,	0,	'user',	'system',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(2,	0,	'user',	'admin',	'$2y$10$10rYxREv/Pg48KWAKLTa..z1roIkcpGzOjZjJ9yvnDDV3TG4bf8nu',	NULL,	NULL,	NULL,	'en',	NULL,	1,	1,	'',	'',	0,	1,	1,	0,	'',	'',	'null',	NULL,	'',	'',	'',	1618914085,	NULL);

DROP TABLE IF EXISTS `users_permission_definitions`;
CREATE TABLE `users_permission_definitions` (
  `key` varchar(50) NOT NULL DEFAULT '',
  `category` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users_permission_definitions` (`key`, `category`) VALUES
('admin_translations',	''),
('application_logging',	''),
('assets',	''),
('asset_metadata',	''),
('classes',	''),
('clear_cache',	''),
('clear_fullpage_cache',	''),
('clear_temp_files',	''),
('dashboards',	''),
('documents',	''),
('document_types',	''),
('emails',	''),
('gdpr_data_extractor',	''),
('glossary',	''),
('http_errors',	''),
('notes_events',	''),
('notifications',	''),
('notifications_send',	''),
('objects',	''),
('plugins',	''),
('predefined_properties',	''),
('recyclebin',	''),
('redirects',	''),
('reports',	''),
('reports_config',	''),
('robots.txt',	''),
('routes',	''),
('seemode',	''),
('seo_document_editor',	''),
('share_configurations',	''),
('system_settings',	''),
('tags_assignment',	''),
('tags_configuration',	''),
('tags_search',	''),
('targeting',	''),
('thumbnails',	''),
('translations',	''),
('users',	''),
('web2print_settings',	''),
('website_settings',	''),
('workflow_details',	'');

DROP TABLE IF EXISTS `users_workspaces_asset`;
CREATE TABLE `users_workspaces_asset` (
  `cid` int(11) unsigned NOT NULL DEFAULT 0,
  `cpath` varchar(765) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `userId` int(11) NOT NULL DEFAULT 0,
  `list` tinyint(1) DEFAULT 0,
  `view` tinyint(1) DEFAULT 0,
  `publish` tinyint(1) DEFAULT 0,
  `delete` tinyint(1) DEFAULT 0,
  `rename` tinyint(1) DEFAULT 0,
  `create` tinyint(1) DEFAULT 0,
  `settings` tinyint(1) DEFAULT 0,
  `versions` tinyint(1) DEFAULT 0,
  `properties` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`cid`,`userId`),
  UNIQUE KEY `cpath_userId` (`cpath`,`userId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `users_workspaces_document`;
CREATE TABLE `users_workspaces_document` (
  `cid` int(11) unsigned NOT NULL DEFAULT 0,
  `cpath` varchar(765) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `userId` int(11) NOT NULL DEFAULT 0,
  `list` tinyint(1) unsigned DEFAULT 0,
  `view` tinyint(1) unsigned DEFAULT 0,
  `save` tinyint(1) unsigned DEFAULT 0,
  `publish` tinyint(1) unsigned DEFAULT 0,
  `unpublish` tinyint(1) unsigned DEFAULT 0,
  `delete` tinyint(1) unsigned DEFAULT 0,
  `rename` tinyint(1) unsigned DEFAULT 0,
  `create` tinyint(1) unsigned DEFAULT 0,
  `settings` tinyint(1) unsigned DEFAULT 0,
  `versions` tinyint(1) unsigned DEFAULT 0,
  `properties` tinyint(1) unsigned DEFAULT 0,
  PRIMARY KEY (`cid`,`userId`),
  UNIQUE KEY `cpath_userId` (`cpath`,`userId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `users_workspaces_object`;
CREATE TABLE `users_workspaces_object` (
  `cid` int(11) unsigned NOT NULL DEFAULT 0,
  `cpath` varchar(765) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `userId` int(11) NOT NULL DEFAULT 0,
  `list` tinyint(1) unsigned DEFAULT 0,
  `view` tinyint(1) unsigned DEFAULT 0,
  `save` tinyint(1) unsigned DEFAULT 0,
  `publish` tinyint(1) unsigned DEFAULT 0,
  `unpublish` tinyint(1) unsigned DEFAULT 0,
  `delete` tinyint(1) unsigned DEFAULT 0,
  `rename` tinyint(1) unsigned DEFAULT 0,
  `create` tinyint(1) unsigned DEFAULT 0,
  `settings` tinyint(1) unsigned DEFAULT 0,
  `versions` tinyint(1) unsigned DEFAULT 0,
  `properties` tinyint(1) unsigned DEFAULT 0,
  `lEdit` text DEFAULT NULL,
  `lView` text DEFAULT NULL,
  `layouts` text DEFAULT NULL,
  PRIMARY KEY (`cid`,`userId`),
  UNIQUE KEY `cpath_userId` (`cpath`,`userId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `uuids`;
CREATE TABLE `uuids` (
  `uuid` char(36) NOT NULL,
  `itemId` int(11) unsigned NOT NULL,
  `type` varchar(25) NOT NULL,
  `instanceIdentifier` varchar(50) NOT NULL,
  PRIMARY KEY (`uuid`,`itemId`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `versions`;
CREATE TABLE `versions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) unsigned DEFAULT NULL,
  `ctype` enum('document','asset','object') DEFAULT NULL,
  `userId` int(11) unsigned DEFAULT NULL,
  `note` text DEFAULT NULL,
  `stackTrace` text DEFAULT NULL,
  `date` int(11) unsigned DEFAULT NULL,
  `public` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `serialized` tinyint(1) unsigned DEFAULT 0,
  `versionCount` int(10) unsigned NOT NULL DEFAULT 0,
  `binaryFileHash` varchar(128) CHARACTER SET ascii DEFAULT NULL,
  `binaryFileId` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `ctype_cid` (`ctype`,`cid`),
  KEY `date` (`date`),
  KEY `binaryFileHash` (`binaryFileHash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `versions` (`id`, `cid`, `ctype`, `userId`, `note`, `stackTrace`, `date`, `public`, `serialized`, `versionCount`, `binaryFileHash`, `binaryFileId`) VALUES
(1,	2,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/DocumentController.php(281): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\DocumentController->addAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614795823,	0,	1,	1,	NULL,	NULL),
(2,	2,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/DocumentController.php(497): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\DocumentController->updateAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614795844,	0,	1,	2,	NULL,	NULL),
(3,	2,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(184): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614795846,	0,	1,	3,	NULL,	NULL),
(4,	2,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(184): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614795858,	0,	1,	4,	NULL,	NULL),
(5,	2,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(184): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614795969,	0,	1,	5,	NULL,	NULL),
(6,	3,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/DocumentController.php(281): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\DocumentController->addAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614797774,	0,	1,	1,	NULL,	NULL),
(7,	4,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/models/Document.php(332): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/DocumentController.php(285): Pimcore\\Model\\Document::create(\'1\', Array)\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\DocumentController->addAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#8 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#9 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#10 {main}',	1614797789,	0,	1,	1,	NULL,	NULL),
(8,	4,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, true, true)\n#2 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/SnippetController.php(172): Pimcore\\Model\\Document\\PageSnippet->saveVersion()\n#3 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\SnippetController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#4 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#6 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#7 {main}',	1614797792,	0,	1,	2,	NULL,	NULL),
(9,	4,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/SnippetController.php(156): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\SnippetController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614797792,	0,	1,	3,	NULL,	NULL),
(10,	3,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(184): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614797794,	0,	1,	2,	NULL,	NULL),
(11,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/DocumentController.php(281): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\DocumentController->addAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614797802,	0,	1,	1,	NULL,	NULL),
(12,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, true, true)\n#2 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(200): Pimcore\\Model\\Document\\PageSnippet->saveVersion()\n#3 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#4 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#6 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#7 {main}',	1614797805,	0,	1,	2,	NULL,	NULL),
(13,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, true, true)\n#2 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(200): Pimcore\\Model\\Document\\PageSnippet->saveVersion()\n#3 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#4 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#6 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#7 {main}',	1614797805,	0,	1,	3,	NULL,	NULL),
(14,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(184): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614797806,	0,	1,	4,	NULL,	NULL),
(15,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(184): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614797835,	0,	1,	5,	NULL,	NULL),
(16,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(184): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614797841,	0,	1,	6,	NULL,	NULL),
(17,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(184): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614797850,	0,	1,	7,	NULL,	NULL),
(18,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(184): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614797858,	0,	1,	8,	NULL,	NULL),
(19,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(191): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(151): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(424): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(184): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614797875,	0,	1,	9,	NULL,	NULL),
(20,	2,	'object',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(292): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(210): Pimcore\\Model\\DataObject\\Concrete->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/DataObject/AbstractObject.php(659): Pimcore\\Model\\DataObject\\Concrete->update(false, Array)\n#4 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(748): Pimcore\\Model\\DataObject\\AbstractObject->save(Array)\n#5 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/DataObject/DataObjectController.php(821): Pimcore\\Model\\DataObject\\Concrete->save()\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectController->addAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#8 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#9 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#10 {main}',	1614797932,	0,	1,	1,	NULL,	NULL),
(21,	3,	'object',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(292): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(210): Pimcore\\Model\\DataObject\\Concrete->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/DataObject/AbstractObject.php(659): Pimcore\\Model\\DataObject\\Concrete->update(false, Array)\n#4 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(748): Pimcore\\Model\\DataObject\\AbstractObject->save(Array)\n#5 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/DataObject/DataObjectController.php(821): Pimcore\\Model\\DataObject\\Concrete->save()\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectController->addAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#8 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#9 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#10 {main}',	1614797937,	0,	1,	1,	NULL,	NULL),
(22,	2,	'object',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(292): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(210): Pimcore\\Model\\DataObject\\Concrete->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/DataObject/AbstractObject.php(659): Pimcore\\Model\\DataObject\\Concrete->update(true, Array)\n#4 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(748): Pimcore\\Model\\DataObject\\AbstractObject->save(Array)\n#5 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/DataObject/DataObjectController.php(1260): Pimcore\\Model\\DataObject\\Concrete->save()\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#8 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#9 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#10 {main}',	1614797939,	0,	1,	2,	NULL,	NULL),
(23,	3,	'object',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(292): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(210): Pimcore\\Model\\DataObject\\Concrete->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/DataObject/AbstractObject.php(659): Pimcore\\Model\\DataObject\\Concrete->update(true, Array)\n#4 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(748): Pimcore\\Model\\DataObject\\AbstractObject->save(Array)\n#5 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/DataObject/DataObjectController.php(1260): Pimcore\\Model\\DataObject\\Concrete->save()\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#8 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#9 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#10 {main}',	1614797941,	0,	1,	2,	NULL,	NULL),
(24,	3,	'object',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(292): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(210): Pimcore\\Model\\DataObject\\Concrete->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/DataObject/AbstractObject.php(659): Pimcore\\Model\\DataObject\\Concrete->update(true, Array)\n#4 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(748): Pimcore\\Model\\DataObject\\AbstractObject->save(Array)\n#5 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/DataObject/DataObjectController.php(1260): Pimcore\\Model\\DataObject\\Concrete->save()\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#8 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#9 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#10 {main}',	1614797948,	0,	1,	3,	NULL,	NULL),
(25,	2,	'object',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(292): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(210): Pimcore\\Model\\DataObject\\Concrete->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/DataObject/AbstractObject.php(659): Pimcore\\Model\\DataObject\\Concrete->update(true, Array)\n#4 /var/www/html/vendor/pimcore/pimcore/models/DataObject/Concrete.php(748): Pimcore\\Model\\DataObject\\AbstractObject->save(Array)\n#5 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/DataObject/DataObjectController.php(1260): Pimcore\\Model\\DataObject\\Concrete->save()\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\DataObject\\DataObjectController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#8 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#9 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#10 {main}',	1614797956,	0,	1,	3,	NULL,	NULL),
(26,	3,	'asset',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(852): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(539): Pimcore\\Model\\Asset->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(373): Pimcore\\Model\\Asset->save()\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/AssetController.php(491): Pimcore\\Model\\Asset::create(\'2\', Array)\n#5 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/AssetController.php(333): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController->addAsset(Object(Symfony\\Component\\HttpFoundation\\Request), Object(Pimcore\\Config))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController->addAssetAction(Object(Symfony\\Component\\HttpFoundation\\Request), Object(Pimcore\\Config))\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#8 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#9 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#10 {main}',	1614798008,	0,	1,	1,	'53489b3c48e7ca4d6073ab1011b10caae62d30466289e630f8d295de550f64a849c1a7b2b9e7bf6ff264398a7fbd741d48aa85693e12c3d468f20389821bfd4e',	NULL),
(27,	4,	'asset',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(852): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(539): Pimcore\\Model\\Asset->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Asset/Service.php(139): Pimcore\\Model\\Asset->save()\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/AssetController.php(1874): Pimcore\\Model\\Asset\\Service->copyAsChild(Object(Pimcore\\Model\\Asset\\Folder), Object(Pimcore\\Model\\Asset\\Image))\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController->copyAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614798019,	0,	1,	1,	'53489b3c48e7ca4d6073ab1011b10caae62d30466289e630f8d295de550f64a849c1a7b2b9e7bf6ff264398a7fbd741d48aa85693e12c3d468f20389821bfd4e',	NULL),
(28,	5,	'asset',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(852): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(539): Pimcore\\Model\\Asset->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Asset/Service.php(139): Pimcore\\Model\\Asset->save()\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/AssetController.php(1874): Pimcore\\Model\\Asset\\Service->copyAsChild(Object(Pimcore\\Model\\Asset\\Folder), Object(Pimcore\\Model\\Asset\\Image))\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController->copyAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614798025,	0,	1,	1,	'53489b3c48e7ca4d6073ab1011b10caae62d30466289e630f8d295de550f64a849c1a7b2b9e7bf6ff264398a7fbd741d48aa85693e12c3d468f20389821bfd4e',	NULL),
(29,	6,	'asset',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(852): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(539): Pimcore\\Model\\Asset->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Asset/Service.php(139): Pimcore\\Model\\Asset->save()\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/AssetController.php(1874): Pimcore\\Model\\Asset\\Service->copyAsChild(Object(Pimcore\\Model\\Asset\\Folder), Object(Pimcore\\Model\\Asset\\Image))\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController->copyAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1614798031,	0,	1,	1,	'53489b3c48e7ca4d6073ab1011b10caae62d30466289e630f8d295de550f64a849c1a7b2b9e7bf6ff264398a7fbd741d48aa85693e12c3d468f20389821bfd4e',	NULL),
(30,	5,	'asset',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(852): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(539): Pimcore\\Model\\Asset->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/AssetController.php(870): Pimcore\\Model\\Asset->save()\n#4 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController->updateAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#7 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#8 {main}',	1614798042,	0,	1,	2,	'53489b3c48e7ca4d6073ab1011b10caae62d30466289e630f8d295de550f64a849c1a7b2b9e7bf6ff264398a7fbd741d48aa85693e12c3d468f20389821bfd4e',	28),
(31,	4,	'asset',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(852): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(539): Pimcore\\Model\\Asset->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/AssetController.php(870): Pimcore\\Model\\Asset->save()\n#4 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController->updateAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#7 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#8 {main}',	1614798052,	0,	1,	2,	'53489b3c48e7ca4d6073ab1011b10caae62d30466289e630f8d295de550f64a849c1a7b2b9e7bf6ff264398a7fbd741d48aa85693e12c3d468f20389821bfd4e',	27),
(32,	6,	'asset',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(852): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(539): Pimcore\\Model\\Asset->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/AssetController.php(870): Pimcore\\Model\\Asset->save()\n#4 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController->updateAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#7 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#8 {main}',	1614798063,	0,	1,	2,	'53489b3c48e7ca4d6073ab1011b10caae62d30466289e630f8d295de550f64a849c1a7b2b9e7bf6ff264398a7fbd741d48aa85693e12c3d468f20389821bfd4e',	29),
(33,	8,	'asset',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(348): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(852): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(539): Pimcore\\Model\\Asset->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(373): Pimcore\\Model\\Asset->save()\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/AssetController.php(491): Pimcore\\Model\\Asset::create(7, Array)\n#5 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/AssetController.php(368): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController->addAsset(Object(Symfony\\Component\\HttpFoundation\\Request), Object(Pimcore\\Config))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(158): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\AssetController->addAssetCompatibilityAction(Object(Symfony\\Component\\HttpFoundation\\Request), Object(Pimcore\\Config))\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(80): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#8 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(201): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#9 /var/www/html/web/app.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#10 {main}',	1614798200,	0,	1,	1,	'53489b3c48e7ca4d6073ab1011b10caae62d30466289e630f8d295de550f64a849c1a7b2b9e7bf6ff264398a7fbd741d48aa85693e12c3d468f20389821bfd4e',	NULL),
(34,	4,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/SnippetController.php(158): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\SnippetController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618916255,	0,	1,	4,	NULL,	NULL),
(35,	4,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/SnippetController.php(158): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\SnippetController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618916264,	0,	1,	5,	NULL,	NULL),
(36,	4,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/SnippetController.php(158): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\SnippetController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618916292,	0,	1,	6,	NULL,	NULL),
(37,	2,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(191): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618916334,	0,	1,	6,	NULL,	NULL),
(38,	8,	'asset',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(817): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(533): Pimcore\\Model\\Asset->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Asset/AssetController.php(988): Pimcore\\Model\\Asset->save()\n#4 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Asset\\AssetController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request), Object(Symfony\\Component\\HttpKernel\\Debug\\TraceableEventDispatcher))\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#7 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#8 {main}',	1618916448,	0,	1,	2,	'53489b3c48e7ca4d6073ab1011b10caae62d30466289e630f8d295de550f64a849c1a7b2b9e7bf6ff264398a7fbd741d48aa85693e12c3d468f20389821bfd4e',	33),
(39,	10,	'asset',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(817): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(533): Pimcore\\Model\\Asset->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(376): Pimcore\\Model\\Asset->save()\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Asset/AssetController.php(481): Pimcore\\Model\\Asset::create(\'2\', Array)\n#5 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Asset/AssetController.php(321): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Asset\\AssetController->addAsset(Object(Symfony\\Component\\HttpFoundation\\Request), Object(Pimcore\\Config))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Asset\\AssetController->addAssetAction(Object(Symfony\\Component\\HttpFoundation\\Request), Object(Pimcore\\Config))\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#8 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#9 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#10 {main}',	1618916464,	0,	1,	1,	'2a6fef9d69fa9961ee2254c5db16468419a6f7a0c6c1a2fe849a06319938352139580cc8d33a03fec9bf5b319d5a46f9a66ce1aaec4945e7431c47110089f202',	NULL),
(40,	10,	'asset',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(817): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Asset.php(533): Pimcore\\Model\\Asset->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Asset/AssetController.php(988): Pimcore\\Model\\Asset->save()\n#4 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Asset\\AssetController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request), Object(Symfony\\Component\\HttpKernel\\Debug\\TraceableEventDispatcher))\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#7 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#8 {main}',	1618916470,	0,	1,	2,	'2a6fef9d69fa9961ee2254c5db16468419a6f7a0c6c1a2fe849a06319938352139580cc8d33a03fec9bf5b319d5a46f9a66ce1aaec4945e7431c47110089f202',	39),
(41,	3,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(191): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618916563,	0,	1,	3,	NULL,	NULL),
(42,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(191): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618916589,	0,	1,	10,	NULL,	NULL),
(43,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(191): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618916801,	0,	1,	11,	NULL,	NULL),
(44,	5,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(191): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618916914,	0,	1,	12,	NULL,	NULL),
(45,	3,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(191): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618916929,	0,	1,	4,	NULL,	NULL),
(46,	3,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(191): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618916934,	0,	1,	5,	NULL,	NULL),
(47,	3,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(191): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618916948,	0,	1,	6,	NULL,	NULL),
(48,	1,	'document',	2,	'',	'#0 /var/www/html/vendor/pimcore/pimcore/models/Element/AbstractElement.php(343): Pimcore\\Model\\Version->save()\n#1 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(165): Pimcore\\Model\\Element\\AbstractElement->doSaveVersion(NULL, false, true)\n#2 /var/www/html/vendor/pimcore/pimcore/models/Document/PageSnippet.php(121): Pimcore\\Model\\Document\\PageSnippet->saveVersion(false, false, NULL)\n#3 /var/www/html/vendor/pimcore/pimcore/models/Document.php(423): Pimcore\\Model\\Document\\PageSnippet->update(Array)\n#4 /var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Controller/Admin/Document/PageController.php(191): Pimcore\\Model\\Document->save()\n#5 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(157): Pimcore\\Bundle\\AdminBundle\\Controller\\Admin\\Document\\PageController->saveAction(Object(Symfony\\Component\\HttpFoundation\\Request))\n#6 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/HttpKernel.php(79): Symfony\\Component\\HttpKernel\\HttpKernel->handleRaw(Object(Symfony\\Component\\HttpFoundation\\Request), 1)\n#7 /var/www/html/vendor/symfony/symfony/src/Symfony/Component/HttpKernel/Kernel.php(195): Symfony\\Component\\HttpKernel\\HttpKernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request), 1, true)\n#8 /var/www/html/public/index.php(35): Symfony\\Component\\HttpKernel\\Kernel->handle(Object(Symfony\\Component\\HttpFoundation\\Request))\n#9 {main}',	1618917689,	0,	1,	1,	NULL,	NULL);

DROP TABLE IF EXISTS `website_settings`;
CREATE TABLE `website_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL DEFAULT '',
  `type` enum('text','document','asset','object','bool') DEFAULT NULL,
  `data` text DEFAULT NULL,
  `language` varchar(15) NOT NULL DEFAULT '',
  `siteId` int(11) unsigned DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT 0,
  `modificationDate` int(11) unsigned DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `siteId` (`siteId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `website_settings` (`id`, `name`, `type`, `data`, `language`, `siteId`, `creationDate`, `modificationDate`) VALUES
(1,	'mykey',	'text',	'My Value',	'',	0,	0,	1612706732);

DROP TABLE IF EXISTS `object_1`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_1` AS select `object_query_1`.`oo_id` AS `oo_id`,`object_query_1`.`oo_classId` AS `oo_classId`,`object_query_1`.`oo_className` AS `oo_className`,`object_query_1`.`Title` AS `Title`,`object_query_1`.`Desctiption` AS `Desctiption`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount` from (`object_query_1` join `objects` on(`objects`.`o_id` = `object_query_1`.`oo_id`));

-- 2021-04-20 11:36:18
