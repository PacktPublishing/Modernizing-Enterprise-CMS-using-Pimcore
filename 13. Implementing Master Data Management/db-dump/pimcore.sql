-- Adminer 4.8.1 MySQL 5.5.5-10.4.17-MariaDB-1:10.4.17+maria~focal dump

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

INSERT INTO `assets` (`id`, `parentId`, `type`, `filename`, `path`, `mimetype`, `creationDate`, `modificationDate`, `userOwner`, `userModification`, `customSettings`, `hasMetaData`, `versionCount`) VALUES
(1,	0,	'folder',	'',	'/',	NULL,	1613764830,	1613764830,	1,	1,	NULL,	0,	0),
(2,	1,	'folder',	'Products',	'/',	NULL,	1614199034,	1614199034,	2,	2,	'a:0:{}',	0,	1),
(3,	2,	'folder',	'Classic T-Shirt',	'/Products/',	NULL,	1614199050,	1614199050,	2,	2,	'a:0:{}',	0,	1),
(4,	3,	'image',	'Azureblue.jpg',	'/Products/Classic T-Shirt/',	'image/jpeg',	1614199069,	1619541995,	2,	2,	'a:6:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:915;s:11:\"imageHeight\";i:915;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:6:\"160 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:37:49+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:37:49+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:37:49+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:4:\"None\";s:11:\"XResolution\";i:1;s:11:\"YResolution\";i:1;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:915;s:11:\"ImageHeight\";i:915;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:7:\"915x915\";s:10:\"Megapixels\";d:0.837;}s:25:\"embeddedMetaDataExtracted\";b:1;s:26:\"disableFocalPointDetection\";b:1;}',	1,	2),
(5,	3,	'image',	'Black.jpg',	'/Products/Classic T-Shirt/',	'image/jpeg',	1614199072,	1614199072,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:2000;s:11:\"imageHeight\";i:2000;s:16:\"embeddedMetaData\";a:20:{s:8:\"FileSize\";s:6:\"200 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:37:52+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:37:52+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:37:52+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:4:\"None\";s:11:\"XResolution\";i:1;s:11:\"YResolution\";i:1;s:10:\"ImageWidth\";i:2000;s:11:\"ImageHeight\";i:2000;s:15:\"EncodingProcess\";s:28:\"Baseline DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:9:\"2000x2000\";s:10:\"Megapixels\";d:4;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	1),
(6,	3,	'image',	'Green.jpg',	'/Products/Classic T-Shirt/',	'image/jpeg',	1614199076,	1614199076,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:915;s:11:\"imageHeight\";i:915;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:6:\"135 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:37:55+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:37:55+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:37:55+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:2:\"cm\";s:11:\"XResolution\";i:28;s:11:\"YResolution\";i:28;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:915;s:11:\"ImageHeight\";i:915;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:7:\"915x915\";s:10:\"Megapixels\";d:0.837;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	1),
(7,	3,	'image',	'Grey.jpg',	'/Products/Classic T-Shirt/',	'image/jpeg',	1614199078,	1614199078,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:915;s:11:\"imageHeight\";i:915;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:5:\"98 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:37:58+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:37:58+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:37:58+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:2:\"cm\";s:11:\"XResolution\";i:28;s:11:\"YResolution\";i:28;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:915;s:11:\"ImageHeight\";i:915;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:7:\"915x915\";s:10:\"Megapixels\";d:0.837;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	1),
(8,	3,	'image',	'Pink.jpg',	'/Products/Classic T-Shirt/',	'image/jpeg',	1614199080,	1614199080,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:915;s:11:\"imageHeight\";i:915;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:5:\"29 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:38:00+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:38:00+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:38:00+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:2:\"cm\";s:11:\"XResolution\";i:28;s:11:\"YResolution\";i:28;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:915;s:11:\"ImageHeight\";i:915;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:7:\"915x915\";s:10:\"Megapixels\";d:0.837;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	1),
(9,	3,	'image',	'Multicolor.jpg',	'/Products/Classic T-Shirt/',	'image/jpeg',	1614199082,	1614199108,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:1400;s:11:\"imageHeight\";i:840;s:16:\"embeddedMetaData\";a:20:{s:8:\"FileSize\";s:5:\"95 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:38:02+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:38:02+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:38:02+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:6:\"inches\";s:11:\"XResolution\";i:120;s:11:\"YResolution\";i:120;s:10:\"ImageWidth\";i:1400;s:11:\"ImageHeight\";i:840;s:15:\"EncodingProcess\";s:28:\"Baseline DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:8:\"1400x840\";s:10:\"Megapixels\";d:1.2;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	2),
(10,	3,	'image',	'Red.jpg',	'/Products/Classic T-Shirt/',	'image/jpeg',	1614199091,	1614199091,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:2000;s:11:\"imageHeight\";i:2000;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:6:\"167 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:38:10+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:38:10+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:38:10+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:4:\"None\";s:11:\"XResolution\";i:1;s:11:\"YResolution\";i:1;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:2000;s:11:\"ImageHeight\";i:2000;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:9:\"2000x2000\";s:10:\"Megapixels\";d:4;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	1),
(11,	3,	'image',	'White.jpg',	'/Products/Classic T-Shirt/',	'image/jpeg',	1614199085,	1614199085,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:2000;s:11:\"imageHeight\";i:2000;s:16:\"embeddedMetaData\";a:41:{s:8:\"FileSize\";s:5:\"17 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:38:05+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:38:05+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:38:05+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"WEBP\";s:17:\"FileTypeExtension\";s:4:\"webp\";s:8:\"MIMEType\";s:10:\"image/webp\";s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"VP8Version\";s:39:\"0 (bicubic reconstruction, normal loop)\";s:10:\"ImageWidth\";i:2000;s:15:\"HorizontalScale\";i:0;s:11:\"ImageHeight\";i:2000;s:13:\"VerticalScale\";i:0;s:9:\"ImageSize\";s:9:\"2000x2000\";s:10:\"Megapixels\";d:4;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	1),
(12,	3,	'image',	'Yellow.jpg',	'/Products/Classic T-Shirt/',	'image/jpeg',	1614199089,	1614199089,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:915;s:11:\"imageHeight\";i:915;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:5:\"54 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:38:08+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:38:08+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:38:08+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:2:\"cm\";s:11:\"XResolution\";i:28;s:11:\"YResolution\";i:28;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:915;s:11:\"ImageHeight\";i:915;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:7:\"915x915\";s:10:\"Megapixels\";d:0.837;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	1),
(13,	2,	'folder',	'Jeans Shorts',	'/Products/',	NULL,	1614200809,	1614200809,	2,	2,	'a:0:{}',	0,	1),
(14,	13,	'image',	'Blue Jeans.jpg',	'/Products/Jeans Shorts/',	'image/jpeg',	1614200826,	1614200826,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:920;s:11:\"imageHeight\";i:1288;s:16:\"embeddedMetaData\";a:21:{s:8:\"FileSize\";s:6:\"136 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 21:07:05+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 21:07:05+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 21:07:05+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.02;s:14:\"ResolutionUnit\";s:6:\"inches\";s:11:\"XResolution\";i:72;s:11:\"YResolution\";i:72;s:7:\"Comment\";s:36:\"bon prix Handelsgesellschaft mbH, de\";s:10:\"ImageWidth\";i:920;s:11:\"ImageHeight\";i:1288;s:15:\"EncodingProcess\";s:28:\"Baseline DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:8:\"920x1288\";s:10:\"Megapixels\";d:1.2;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	1),
(15,	13,	'image',	'Grey Jeans.jpg',	'/Products/Jeans Shorts/',	'image/jpeg',	1614200828,	1614200828,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:920;s:11:\"imageHeight\";i:1288;s:16:\"embeddedMetaData\";a:21:{s:8:\"FileSize\";s:6:\"162 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 21:07:08+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 21:07:08+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 21:07:08+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.02;s:14:\"ResolutionUnit\";s:6:\"inches\";s:11:\"XResolution\";i:72;s:11:\"YResolution\";i:72;s:7:\"Comment\";s:36:\"bon prix Handelsgesellschaft mbH, de\";s:10:\"ImageWidth\";i:920;s:11:\"ImageHeight\";i:1288;s:15:\"EncodingProcess\";s:28:\"Baseline DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:8:\"920x1288\";s:10:\"Megapixels\";d:1.2;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	1),
(16,	13,	'image',	'Light Blue Jeans.jpg',	'/Products/Jeans Shorts/',	'image/jpeg',	1614200831,	1614200831,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:1400;s:11:\"imageHeight\";i:1960;s:16:\"embeddedMetaData\";a:21:{s:8:\"FileSize\";s:6:\"817 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 21:07:10+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 21:07:10+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 21:07:10+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.02;s:14:\"ResolutionUnit\";s:6:\"inches\";s:11:\"XResolution\";i:72;s:11:\"YResolution\";i:72;s:7:\"Comment\";s:36:\"bon prix Handelsgesellschaft mbH, de\";s:10:\"ImageWidth\";i:1400;s:11:\"ImageHeight\";i:1960;s:15:\"EncodingProcess\";s:28:\"Baseline DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:9:\"1400x1960\";s:10:\"Megapixels\";d:2.7;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	1),
(17,	1,	'folder',	'Shops',	'/',	NULL,	1618215712,	1618215712,	2,	2,	'a:0:{}',	0,	1),
(18,	17,	'image',	'Rome.jpg',	'/Shops/',	'image/jpeg',	1618215723,	1618215739,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:1200;s:11:\"imageHeight\";i:841;s:16:\"embeddedMetaData\";a:48:{s:8:\"FileSize\";s:6:\"286 kB\";s:14:\"FileModifyDate\";s:25:\"2021:04:12 08:22:03+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:04:12 08:22:03+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:04:12 08:22:03+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:13:\"ExifByteOrder\";s:25:\"Big-endian (Motorola, MM)\";s:11:\"XResolution\";i:72;s:11:\"YResolution\";i:72;s:14:\"ResolutionUnit\";s:6:\"inches\";s:6:\"Artist\";s:13:\"Paris Orlando\";s:16:\"YCbCrPositioning\";s:8:\"Centered\";s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:1200;s:11:\"ImageHeight\";i:841;s:15:\"EncodingProcess\";s:28:\"Baseline DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:8:\"1200x841\";s:10:\"Megapixels\";d:1;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	2),
(19,	17,	'image',	'Paris.jpg',	'/Shops/',	'image/jpeg',	1618216127,	1618216163,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:2900;s:11:\"imageHeight\";i:5367;s:16:\"embeddedMetaData\";a:20:{s:8:\"FileSize\";s:6:\"5.0 MB\";s:14:\"FileModifyDate\";s:25:\"2021:04:12 08:28:47+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:04:12 08:28:47+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:04:12 08:28:46+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:6:\"inches\";s:11:\"XResolution\";i:300;s:11:\"YResolution\";i:300;s:10:\"ImageWidth\";i:2900;s:11:\"ImageHeight\";i:5367;s:15:\"EncodingProcess\";s:28:\"Baseline DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:2 (2 1)\";s:9:\"ImageSize\";s:9:\"2900x5367\";s:10:\"Megapixels\";d:15.6;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	2),
(20,	17,	'image',	'London.jpg',	'/Shops/',	'image/jpeg',	1618216537,	1618216554,	2,	2,	'a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:1200;s:11:\"imageHeight\";i:900;s:16:\"embeddedMetaData\";a:21:{s:8:\"FileSize\";s:6:\"264 kB\";s:14:\"FileModifyDate\";s:25:\"2021:04:12 08:35:37+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:04:12 08:35:37+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:04:12 08:35:37+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:6:\"inches\";s:11:\"XResolution\";i:72;s:11:\"YResolution\";i:72;s:7:\"Comment\";s:83:\"File source: http://commons.wikimedia.org/wiki/File:Westminster_cathedral_front.jpg\";s:10:\"ImageWidth\";i:1200;s:11:\"ImageHeight\";i:900;s:15:\"EncodingProcess\";s:28:\"Baseline DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:8:\"1200x900\";s:10:\"Megapixels\";d:1.1;}s:25:\"embeddedMetaDataExtracted\";b:1;}',	0,	2);

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
(4,	'alt',	'',	'input',	''),
(4,	'copyright',	'',	'input',	''),
(4,	'title',	'',	'input',	'');

DROP TABLE IF EXISTS `cache_items`;
CREATE TABLE `cache_items` (
  `item_id` varbinary(255) NOT NULL,
  `item_data` mediumblob NOT NULL,
  `item_lifetime` int(10) unsigned DEFAULT NULL,
  `item_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `cache_items` (`item_id`, `item_data`, `item_lifetime`, `item_time`) VALUES
(UNHEX('00746167730061737365745F31'),	'a:1:{s:7:\"asset_1\";i:0;}',	31536000,	1620840098),
(UNHEX('00746167730061737365745F3130'),	'a:1:{s:8:\"asset_10\";i:0;}',	31536000,	1621015396),
(UNHEX('00746167730061737365745F3131'),	'a:1:{s:8:\"asset_11\";i:0;}',	31536000,	1621015396),
(UNHEX('00746167730061737365745F3132'),	'a:1:{s:8:\"asset_12\";i:0;}',	31536000,	1621015396),
(UNHEX('00746167730061737365745F3133'),	'a:1:{s:8:\"asset_13\";i:0;}',	31536000,	1621015394),
(UNHEX('00746167730061737365745F3134'),	'a:1:{s:8:\"asset_14\";i:0;}',	31536000,	1621009528),
(UNHEX('00746167730061737365745F3137'),	'a:1:{s:8:\"asset_17\";i:0;}',	31536000,	1620840099),
(UNHEX('00746167730061737365745F32'),	'a:1:{s:7:\"asset_2\";i:0;}',	31536000,	1620840099),
(UNHEX('00746167730061737365745F33'),	'a:1:{s:7:\"asset_3\";i:0;}',	31536000,	1621015394),
(UNHEX('00746167730061737365745F34'),	'a:1:{s:7:\"asset_4\";i:0;}',	31536000,	1621015396),
(UNHEX('00746167730061737365745F35'),	'a:1:{s:7:\"asset_5\";i:0;}',	31536000,	1621015396),
(UNHEX('00746167730061737365745F36'),	'a:1:{s:7:\"asset_6\";i:0;}',	31536000,	1621015396),
(UNHEX('00746167730061737365745F37'),	'a:1:{s:7:\"asset_7\";i:0;}',	31536000,	1621015396),
(UNHEX('00746167730061737365745F38'),	'a:1:{s:7:\"asset_8\";i:0;}',	31536000,	1621015396),
(UNHEX('00746167730061737365745F39'),	'a:1:{s:7:\"asset_9\";i:0;}',	31536000,	1620840291),
(UNHEX('00746167730061737365745F70726F706572746965735F34'),	'a:3:{s:16:\"asset_properties\";i:0;s:7:\"asset_4\";i:0;s:18:\"asset_properties_4\";i:0;}',	31536000,	1621015398),
(UNHEX('007461677300646F63756D656E745F31'),	'a:1:{s:10:\"document_1\";i:0;}',	31536000,	1620840093),
(UNHEX('007461677300646F63756D656E745F70726F706572746965735F31'),	'a:3:{s:19:\"document_properties\";i:0;s:10:\"document_1\";i:0;s:21:\"document_properties_1\";i:0;}',	31536000,	1620840092),
(UNHEX('0074616773006F626A6563745F31'),	'a:1:{s:8:\"object_1\";i:0;}',	31536000,	1620840098),
(UNHEX('0074616773006F626A6563745F313537'),	'a:1:{s:10:\"object_157\";i:0;}',	31536000,	1620840099),
(UNHEX('0074616773006F626A6563745F313538'),	'a:1:{s:10:\"object_158\";i:0;}',	31536000,	1620840291),
(UNHEX('0074616773006F626A6563745F313630'),	'a:1:{s:10:\"object_160\";i:0;}',	31536000,	1620840298),
(UNHEX('0074616773006F626A6563745F313631'),	'a:1:{s:10:\"object_161\";i:0;}',	31536000,	1620840100),
(UNHEX('0074616773006F626A6563745F313632'),	'a:1:{s:10:\"object_162\";i:1;}',	31536000,	1620840310),
(UNHEX('0074616773006F626A6563745F313633'),	'a:1:{s:10:\"object_163\";i:0;}',	31536000,	1621015169),
(UNHEX('0074616773006F626A6563745F313634'),	'a:1:{s:10:\"object_164\";i:0;}',	31536000,	1621015169),
(UNHEX('0074616773006F626A6563745F313635'),	'a:1:{s:10:\"object_165\";i:0;}',	31536000,	1621015169),
(UNHEX('0074616773006F626A6563745F313636'),	'a:1:{s:10:\"object_166\";i:0;}',	31536000,	1621015169),
(UNHEX('0074616773006F626A6563745F313637'),	'a:1:{s:10:\"object_167\";i:0;}',	31536000,	1621015169),
(UNHEX('0074616773006F626A6563745F313638'),	'a:1:{s:10:\"object_168\";i:0;}',	31536000,	1621015169),
(UNHEX('0074616773006F626A6563745F313639'),	'a:1:{s:10:\"object_169\";i:0;}',	31536000,	1621015169),
(UNHEX('0074616773006F626A6563745F313730'),	'a:1:{s:10:\"object_170\";i:0;}',	31536000,	1621015169),
(UNHEX('0074616773006F626A6563745F313731'),	'a:1:{s:10:\"object_171\";i:3;}',	31536000,	1620840366),
(UNHEX('0074616773006F626A6563745F313732'),	'a:1:{s:10:\"object_172\";i:0;}',	31536000,	1621009526),
(UNHEX('0074616773006F626A6563745F313733'),	'a:1:{s:10:\"object_173\";i:0;}',	31536000,	1621009526),
(UNHEX('0074616773006F626A6563745F313734'),	'a:1:{s:10:\"object_174\";i:0;}',	31536000,	1621009526),
(UNHEX('0074616773006F626A6563745F313735'),	'a:1:{s:10:\"object_175\";i:6;}',	31536000,	1621009519),
(UNHEX('0074616773006F626A6563745F313739'),	'a:1:{s:10:\"object_179\";i:0;}',	31536000,	1620840099),
(UNHEX('0074616773006F626A6563745F32'),	'a:1:{s:8:\"object_2\";i:0;}',	31536000,	1620840099),
(UNHEX('0074616773006F626A6563745F35'),	'a:1:{s:8:\"object_5\";i:0;}',	31536000,	1620840303),
(UNHEX('0074616773006F626A6563745F37'),	'a:1:{s:8:\"object_7\";i:0;}',	31536000,	1620840306),
(UNHEX('0074616773006F626A6563745F39'),	'a:1:{s:8:\"object_9\";i:0;}',	31536000,	1620840099),
(UNHEX('0074616773006F626A6563745F70726F706572746965735F313631'),	'a:3:{s:17:\"object_properties\";i:10;s:10:\"object_161\";i:0;s:21:\"object_properties_161\";i:0;}',	31536000,	1621015376),
(UNHEX('0074616773006F626A6563745F70726F706572746965735F313632'),	'a:3:{s:17:\"object_properties\";i:10;s:10:\"object_162\";i:1;s:21:\"object_properties_162\";i:0;}',	31536000,	1621015166),
(UNHEX('0074616773006F626A6563745F70726F706572746965735F313731'),	'a:3:{s:17:\"object_properties\";i:10;s:10:\"object_171\";i:3;s:21:\"object_properties_171\";i:0;}',	31536000,	1621009522),
(UNHEX('0074616773006F626A6563745F70726F706572746965735F313732'),	'a:3:{s:17:\"object_properties\";i:10;s:10:\"object_172\";i:0;s:21:\"object_properties_172\";i:0;}',	31536000,	1621009528),
(UNHEX('0074616773006F626A6563745F70726F706572746965735F313735'),	'a:3:{s:17:\"object_properties\";i:10;s:10:\"object_175\";i:6;s:21:\"object_properties_175\";i:0;}',	31536000,	1621015384),
(UNHEX('00746167730070696D636F72655F61646D696E65725F646174616261736573'),	'a:1:{s:25:\"pimcore_adminer_databases\";i:0;}',	31536000,	1621009553),
(UNHEX('0074616773007175616E7469747976616C75655F756E6974735F7461626C65'),	'a:1:{s:25:\"quantityvalue_units_table\";i:0;}',	31536000,	1620840284),
(UNHEX('007461677300736974655F646F6D61696E5F3432316161393065303739666133323662363439346638313261643133653739'),	'a:3:{s:6:\"system\";i:0;s:4:\"site\";i:0;s:44:\"site_domain_421aa90e079fa326b6494f812ad13e79\";i:0;}',	31536000,	1620840092),
(UNHEX('00746167730073797374656D5F7265736F757263655F636F6C756D6E735F656469745F6C6F636B'),	'a:3:{s:6:\"system\";i:0;s:8:\"resource\";i:0;s:33:\"system_resource_columns_edit_lock\";i:0;}',	31536000,	1620840280),
(UNHEX('00746167730073797374656D5F7265736F757263655F636F6C756D6E735F76657273696F6E73'),	'a:3:{s:6:\"system\";i:0;s:8:\"resource\";i:0;s:32:\"system_resource_columns_versions\";i:0;}',	31536000,	1620840292),
(UNHEX('00746167730073797374656D5F726F7574655F7265646972656374'),	'a:4:{s:6:\"system\";i:0;s:8:\"redirect\";i:0;s:5:\"route\";i:0;s:21:\"system_route_redirect\";i:0;}',	31536000,	1620840091),
(UNHEX('00746167730073797374656D5F737570706F727465645F6C6F63616C65735F656E'),	'a:2:{s:6:\"system\";i:0;s:27:\"system_supported_locales_en\";i:0;}',	31536000,	1620840093),
(UNHEX('0074616773007472616E736C6174696F6E5F646174615F3265333634643331356164356164393834363039653766346265656466306637'),	'a:4:{s:10:\"translator\";i:2;s:18:\"translator_website\";i:0;s:9:\"translate\";i:2;s:49:\"translation_data_2e364d315ad5ad984609e7f4beedf0f7\";i:0;}',	31536000,	1621015351),
(UNHEX('0074616773007472616E736C6174696F6E5F646174615F6464306262356335616562316230333232366531616162323937646432623137'),	'a:4:{s:10:\"translator\";i:0;s:18:\"translator_website\";i:0;s:9:\"translate\";i:0;s:49:\"translation_data_dd0bb5c5aeb1b03226e1aab297dd2b17\";i:0;}',	31536000,	1621009255),
(UNHEX('61737365745F31'),	's:574:\"O:26:\"Pimcore\\Model\\Asset\\Folder\":20:{s:7:\"\0*\0type\";s:6:\"folder\";s:5:\"\0*\0id\";i:1;s:11:\"\0*\0parentId\";i:0;s:11:\"\0*\0filename\";s:0:\"\";s:7:\"\0*\0path\";s:1:\"/\";s:11:\"\0*\0mimetype\";N;s:15:\"\0*\0creationDate\";i:1613764830;s:19:\"\0*\0modificationDate\";i:1613764830;s:12:\"\0*\0userOwner\";i:1;s:19:\"\0*\0userModification\";i:1;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:0:{}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:0;s:25:\"\0*\0__dataVersionTimestamp\";i:1613764830;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840098),
(UNHEX('61737365745F3130'),	's:2692:\"O:25:\"Pimcore\\Model\\Asset\\Image\":20:{s:7:\"\0*\0type\";s:5:\"image\";s:5:\"\0*\0id\";i:10;s:11:\"\0*\0parentId\";i:3;s:11:\"\0*\0filename\";s:7:\"Red.jpg\";s:7:\"\0*\0path\";s:26:\"/Products/Classic T-Shirt/\";s:11:\"\0*\0mimetype\";s:10:\"image/jpeg\";s:15:\"\0*\0creationDate\";i:1614199091;s:19:\"\0*\0modificationDate\";i:1614199091;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:2000;s:11:\"imageHeight\";i:2000;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:6:\"167 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:38:10+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:38:10+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:38:10+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:4:\"None\";s:11:\"XResolution\";i:1;s:11:\"YResolution\";i:1;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:2000;s:11:\"ImageHeight\";i:2000;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:9:\"2000x2000\";s:10:\"Megapixels\";d:4;}s:25:\"embeddedMetaDataExtracted\";b:1;}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614199091;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015396),
(UNHEX('61737365745F3131'),	's:2544:\"O:25:\"Pimcore\\Model\\Asset\\Image\":20:{s:7:\"\0*\0type\";s:5:\"image\";s:5:\"\0*\0id\";i:11;s:11:\"\0*\0parentId\";i:3;s:11:\"\0*\0filename\";s:9:\"White.jpg\";s:7:\"\0*\0path\";s:26:\"/Products/Classic T-Shirt/\";s:11:\"\0*\0mimetype\";s:10:\"image/jpeg\";s:15:\"\0*\0creationDate\";i:1614199085;s:19:\"\0*\0modificationDate\";i:1614199085;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:2000;s:11:\"imageHeight\";i:2000;s:16:\"embeddedMetaData\";a:41:{s:8:\"FileSize\";s:5:\"17 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:38:05+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:38:05+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:38:05+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"WEBP\";s:17:\"FileTypeExtension\";s:4:\"webp\";s:8:\"MIMEType\";s:10:\"image/webp\";s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"VP8Version\";s:39:\"0 (bicubic reconstruction, normal loop)\";s:10:\"ImageWidth\";i:2000;s:15:\"HorizontalScale\";i:0;s:11:\"ImageHeight\";i:2000;s:13:\"VerticalScale\";i:0;s:9:\"ImageSize\";s:9:\"2000x2000\";s:10:\"Megapixels\";d:4;}s:25:\"embeddedMetaDataExtracted\";b:1;}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614199085;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015396),
(UNHEX('61737365745F3132'),	's:2693:\"O:25:\"Pimcore\\Model\\Asset\\Image\":20:{s:7:\"\0*\0type\";s:5:\"image\";s:5:\"\0*\0id\";i:12;s:11:\"\0*\0parentId\";i:3;s:11:\"\0*\0filename\";s:10:\"Yellow.jpg\";s:7:\"\0*\0path\";s:26:\"/Products/Classic T-Shirt/\";s:11:\"\0*\0mimetype\";s:10:\"image/jpeg\";s:15:\"\0*\0creationDate\";i:1614199089;s:19:\"\0*\0modificationDate\";i:1614199089;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:915;s:11:\"imageHeight\";i:915;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:5:\"54 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:38:08+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:38:08+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:38:08+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:2:\"cm\";s:11:\"XResolution\";i:28;s:11:\"YResolution\";i:28;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:915;s:11:\"ImageHeight\";i:915;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:7:\"915x915\";s:10:\"Megapixels\";d:0.837;}s:25:\"embeddedMetaDataExtracted\";b:1;}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614199089;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015396),
(UNHEX('61737365745F3133'),	's:598:\"O:26:\"Pimcore\\Model\\Asset\\Folder\":20:{s:7:\"\0*\0type\";s:6:\"folder\";s:5:\"\0*\0id\";i:13;s:11:\"\0*\0parentId\";i:2;s:11:\"\0*\0filename\";s:12:\"Jeans Shorts\";s:7:\"\0*\0path\";s:10:\"/Products/\";s:11:\"\0*\0mimetype\";N;s:15:\"\0*\0creationDate\";i:1614200809;s:19:\"\0*\0modificationDate\";i:1614200809;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:0:{}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200809;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015394),
(UNHEX('61737365745F3134'),	's:1545:\"O:25:\"Pimcore\\Model\\Asset\\Image\":20:{s:7:\"\0*\0type\";s:5:\"image\";s:5:\"\0*\0id\";i:14;s:11:\"\0*\0parentId\";i:13;s:11:\"\0*\0filename\";s:14:\"Blue Jeans.jpg\";s:7:\"\0*\0path\";s:23:\"/Products/Jeans Shorts/\";s:11:\"\0*\0mimetype\";s:10:\"image/jpeg\";s:15:\"\0*\0creationDate\";i:1614200826;s:19:\"\0*\0modificationDate\";i:1614200826;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:920;s:11:\"imageHeight\";i:1288;s:16:\"embeddedMetaData\";a:21:{s:8:\"FileSize\";s:6:\"136 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 21:07:05+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 21:07:05+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 21:07:05+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.02;s:14:\"ResolutionUnit\";s:6:\"inches\";s:11:\"XResolution\";i:72;s:11:\"YResolution\";i:72;s:7:\"Comment\";s:36:\"bon prix Handelsgesellschaft mbH, de\";s:10:\"ImageWidth\";i:920;s:11:\"ImageHeight\";i:1288;s:15:\"EncodingProcess\";s:28:\"Baseline DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:8:\"920x1288\";s:10:\"Megapixels\";d:1.2;}s:25:\"embeddedMetaDataExtracted\";b:1;}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200826;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621009528),
(UNHEX('61737365745F3137'),	's:580:\"O:26:\"Pimcore\\Model\\Asset\\Folder\":20:{s:7:\"\0*\0type\";s:6:\"folder\";s:5:\"\0*\0id\";i:17;s:11:\"\0*\0parentId\";i:1;s:11:\"\0*\0filename\";s:5:\"Shops\";s:7:\"\0*\0path\";s:1:\"/\";s:11:\"\0*\0mimetype\";N;s:15:\"\0*\0creationDate\";i:1618215712;s:19:\"\0*\0modificationDate\";i:1618215712;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:0:{}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1618215712;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840099),
(UNHEX('61737365745F32'),	's:582:\"O:26:\"Pimcore\\Model\\Asset\\Folder\":20:{s:7:\"\0*\0type\";s:6:\"folder\";s:5:\"\0*\0id\";i:2;s:11:\"\0*\0parentId\";i:1;s:11:\"\0*\0filename\";s:8:\"Products\";s:7:\"\0*\0path\";s:1:\"/\";s:11:\"\0*\0mimetype\";N;s:15:\"\0*\0creationDate\";i:1614199034;s:19:\"\0*\0modificationDate\";i:1614199034;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:0:{}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614199034;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840099),
(UNHEX('61737365745F33'),	's:600:\"O:26:\"Pimcore\\Model\\Asset\\Folder\":20:{s:7:\"\0*\0type\";s:6:\"folder\";s:5:\"\0*\0id\";i:3;s:11:\"\0*\0parentId\";i:2;s:11:\"\0*\0filename\";s:15:\"Classic T-Shirt\";s:7:\"\0*\0path\";s:10:\"/Products/\";s:11:\"\0*\0mimetype\";N;s:15:\"\0*\0creationDate\";i:1614199050;s:19:\"\0*\0modificationDate\";i:1614199050;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:0:{}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614199050;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015394),
(UNHEX('61737365745F34'),	's:3024:\"O:25:\"Pimcore\\Model\\Asset\\Image\":20:{s:7:\"\0*\0type\";s:5:\"image\";s:5:\"\0*\0id\";i:4;s:11:\"\0*\0parentId\";i:3;s:11:\"\0*\0filename\";s:13:\"Azureblue.jpg\";s:7:\"\0*\0path\";s:26:\"/Products/Classic T-Shirt/\";s:11:\"\0*\0mimetype\";s:10:\"image/jpeg\";s:15:\"\0*\0creationDate\";i:1614199069;s:19:\"\0*\0modificationDate\";i:1619541995;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:3:{i:0;a:4:{s:4:\"name\";s:3:\"alt\";s:8:\"language\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:4:\"data\";s:0:\"\";}i:1;a:4:{s:4:\"name\";s:9:\"copyright\";s:8:\"language\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:4:\"data\";s:0:\"\";}i:2;a:4:{s:4:\"name\";s:5:\"title\";s:8:\"language\";s:0:\"\";s:4:\"type\";s:5:\"input\";s:4:\"data\";s:0:\"\";}}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:6:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:915;s:11:\"imageHeight\";i:915;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:6:\"160 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:37:49+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:37:49+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:37:49+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:4:\"None\";s:11:\"XResolution\";i:1;s:11:\"YResolution\";i:1;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:915;s:11:\"ImageHeight\";i:915;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:7:\"915x915\";s:10:\"Megapixels\";d:0.837;}s:25:\"embeddedMetaDataExtracted\";b:1;s:26:\"disableFocalPointDetection\";b:1;}s:14:\"\0*\0hasMetaData\";b:1;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:2;s:25:\"\0*\0__dataVersionTimestamp\";i:1619541995;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015396),
(UNHEX('61737365745F35'),	's:1479:\"O:25:\"Pimcore\\Model\\Asset\\Image\":20:{s:7:\"\0*\0type\";s:5:\"image\";s:5:\"\0*\0id\";i:5;s:11:\"\0*\0parentId\";i:3;s:11:\"\0*\0filename\";s:9:\"Black.jpg\";s:7:\"\0*\0path\";s:26:\"/Products/Classic T-Shirt/\";s:11:\"\0*\0mimetype\";s:10:\"image/jpeg\";s:15:\"\0*\0creationDate\";i:1614199072;s:19:\"\0*\0modificationDate\";i:1614199072;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:2000;s:11:\"imageHeight\";i:2000;s:16:\"embeddedMetaData\";a:20:{s:8:\"FileSize\";s:6:\"200 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:37:52+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:37:52+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:37:52+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:4:\"None\";s:11:\"XResolution\";i:1;s:11:\"YResolution\";i:1;s:10:\"ImageWidth\";i:2000;s:11:\"ImageHeight\";i:2000;s:15:\"EncodingProcess\";s:28:\"Baseline DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:9:\"2000x2000\";s:10:\"Megapixels\";d:4;}s:25:\"embeddedMetaDataExtracted\";b:1;}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614199072;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015396),
(UNHEX('61737365745F36'),	's:2691:\"O:25:\"Pimcore\\Model\\Asset\\Image\":20:{s:7:\"\0*\0type\";s:5:\"image\";s:5:\"\0*\0id\";i:6;s:11:\"\0*\0parentId\";i:3;s:11:\"\0*\0filename\";s:9:\"Green.jpg\";s:7:\"\0*\0path\";s:26:\"/Products/Classic T-Shirt/\";s:11:\"\0*\0mimetype\";s:10:\"image/jpeg\";s:15:\"\0*\0creationDate\";i:1614199076;s:19:\"\0*\0modificationDate\";i:1614199076;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:915;s:11:\"imageHeight\";i:915;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:6:\"135 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:37:55+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:37:55+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:37:55+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:2:\"cm\";s:11:\"XResolution\";i:28;s:11:\"YResolution\";i:28;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:915;s:11:\"ImageHeight\";i:915;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:7:\"915x915\";s:10:\"Megapixels\";d:0.837;}s:25:\"embeddedMetaDataExtracted\";b:1;}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614199076;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015396),
(UNHEX('61737365745F37'),	's:2689:\"O:25:\"Pimcore\\Model\\Asset\\Image\":20:{s:7:\"\0*\0type\";s:5:\"image\";s:5:\"\0*\0id\";i:7;s:11:\"\0*\0parentId\";i:3;s:11:\"\0*\0filename\";s:8:\"Grey.jpg\";s:7:\"\0*\0path\";s:26:\"/Products/Classic T-Shirt/\";s:11:\"\0*\0mimetype\";s:10:\"image/jpeg\";s:15:\"\0*\0creationDate\";i:1614199078;s:19:\"\0*\0modificationDate\";i:1614199078;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:915;s:11:\"imageHeight\";i:915;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:5:\"98 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:37:58+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:37:58+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:37:58+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:2:\"cm\";s:11:\"XResolution\";i:28;s:11:\"YResolution\";i:28;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:915;s:11:\"ImageHeight\";i:915;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:7:\"915x915\";s:10:\"Megapixels\";d:0.837;}s:25:\"embeddedMetaDataExtracted\";b:1;}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614199078;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015396),
(UNHEX('61737365745F38'),	's:2689:\"O:25:\"Pimcore\\Model\\Asset\\Image\":20:{s:7:\"\0*\0type\";s:5:\"image\";s:5:\"\0*\0id\";i:8;s:11:\"\0*\0parentId\";i:3;s:11:\"\0*\0filename\";s:8:\"Pink.jpg\";s:7:\"\0*\0path\";s:26:\"/Products/Classic T-Shirt/\";s:11:\"\0*\0mimetype\";s:10:\"image/jpeg\";s:15:\"\0*\0creationDate\";i:1614199080;s:19:\"\0*\0modificationDate\";i:1614199080;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:915;s:11:\"imageHeight\";i:915;s:16:\"embeddedMetaData\";a:46:{s:8:\"FileSize\";s:5:\"29 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:38:00+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:38:00+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:38:00+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:2:\"cm\";s:11:\"XResolution\";i:28;s:11:\"YResolution\";i:28;s:14:\"ProfileCMMType\";s:10:\"Little CMS\";s:14:\"ProfileVersion\";s:5:\"2.1.0\";s:12:\"ProfileClass\";s:22:\"Display Device Profile\";s:14:\"ColorSpaceData\";s:4:\"RGB \";s:22:\"ProfileConnectionSpace\";s:4:\"XYZ \";s:15:\"ProfileDateTime\";s:19:\"2012:01:25 03:41:57\";s:20:\"ProfileFileSignature\";s:4:\"acsp\";s:15:\"PrimaryPlatform\";s:19:\"Apple Computer Inc.\";s:8:\"CMMFlags\";s:25:\"Not Embedded, Independent\";s:18:\"DeviceManufacturer\";s:0:\"\";s:11:\"DeviceModel\";s:0:\"\";s:16:\"DeviceAttributes\";s:35:\"Reflective, Glossy, Positive, Color\";s:15:\"RenderingIntent\";s:10:\"Perceptual\";s:25:\"ConnectionSpaceIlluminant\";s:16:\"0.9642 1 0.82491\";s:14:\"ProfileCreator\";s:10:\"Little CMS\";s:9:\"ProfileID\";i:0;s:18:\"ProfileDescription\";s:2:\"c2\";s:16:\"ProfileCopyright\";s:2:\"FB\";s:15:\"MediaWhitePoint\";s:16:\"0.9642 1 0.82491\";s:15:\"MediaBlackPoint\";s:22:\"0.01205 0.0125 0.01031\";s:15:\"RedMatrixColumn\";s:23:\"0.43607 0.22249 0.01392\";s:17:\"GreenMatrixColumn\";s:23:\"0.38515 0.71687 0.09708\";s:16:\"BlueMatrixColumn\";s:22:\"0.14307 0.06061 0.7141\";s:6:\"RedTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:8:\"GreenTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:7:\"BlueTRC\";s:48:\"(Binary data 64 bytes, use -b option to extract)\";s:10:\"ImageWidth\";i:915;s:11:\"ImageHeight\";i:915;s:15:\"EncodingProcess\";s:31:\"Progressive DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:7:\"915x915\";s:10:\"Megapixels\";d:0.837;}s:25:\"embeddedMetaDataExtracted\";b:1;}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1614199080;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015396),
(UNHEX('61737365745F39'),	's:1489:\"O:25:\"Pimcore\\Model\\Asset\\Image\":20:{s:7:\"\0*\0type\";s:5:\"image\";s:5:\"\0*\0id\";i:9;s:11:\"\0*\0parentId\";i:3;s:11:\"\0*\0filename\";s:14:\"Multicolor.jpg\";s:7:\"\0*\0path\";s:26:\"/Products/Classic T-Shirt/\";s:11:\"\0*\0mimetype\";s:10:\"image/jpeg\";s:15:\"\0*\0creationDate\";i:1614199082;s:19:\"\0*\0modificationDate\";i:1614199108;s:12:\"\0*\0userOwner\";i:2;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0metadata\";a:0:{}s:9:\"\0*\0locked\";N;s:17:\"\0*\0customSettings\";a:5:{s:25:\"imageDimensionsCalculated\";b:1;s:10:\"imageWidth\";i:1400;s:11:\"imageHeight\";i:840;s:16:\"embeddedMetaData\";a:20:{s:8:\"FileSize\";s:5:\"95 kB\";s:14:\"FileModifyDate\";s:25:\"2021:02:24 20:38:02+00:00\";s:14:\"FileAccessDate\";s:25:\"2021:02:24 20:38:02+00:00\";s:19:\"FileInodeChangeDate\";s:25:\"2021:02:24 20:38:02+00:00\";s:15:\"FilePermissions\";s:9:\"rwxr-xr-x\";s:8:\"FileType\";s:4:\"JPEG\";s:17:\"FileTypeExtension\";s:3:\"jpg\";s:8:\"MIMEType\";s:10:\"image/jpeg\";s:11:\"JFIFVersion\";d:1.01;s:14:\"ResolutionUnit\";s:6:\"inches\";s:11:\"XResolution\";i:120;s:11:\"YResolution\";i:120;s:10:\"ImageWidth\";i:1400;s:11:\"ImageHeight\";i:840;s:15:\"EncodingProcess\";s:28:\"Baseline DCT, Huffman coding\";s:13:\"BitsPerSample\";i:8;s:15:\"ColorComponents\";i:3;s:16:\"YCbCrSubSampling\";s:16:\"YCbCr4:2:0 (2 2)\";s:9:\"ImageSize\";s:8:\"1400x840\";s:10:\"Megapixels\";d:1.2;}s:25:\"embeddedMetaDataExtracted\";b:1;}s:14:\"\0*\0hasMetaData\";b:0;s:11:\"\0*\0siblings\";N;s:14:\"\0*\0hasSiblings\";N;s:15:\"\0*\0_dataChanged\";b:0;s:15:\"\0*\0versionCount\";i:2;s:25:\"\0*\0__dataVersionTimestamp\";i:1614199108;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840291),
(UNHEX('61737365745F70726F706572746965735F34'),	's:6:\"a:0:{}\";',	31536000,	1621015398),
(UNHEX('646F63756D656E745F31'),	's:881:\"O:27:\"Pimcore\\Model\\Document\\Page\":28:{s:8:\"\0*\0title\";s:0:\"\";s:14:\"\0*\0description\";s:0:\"\";s:11:\"\0*\0metaData\";a:0:{}s:7:\"\0*\0type\";s:4:\"page\";s:12:\"\0*\0prettyUrl\";N;s:17:\"\0*\0targetGroupIds\";s:0:\"\";s:13:\"\0*\0controller\";s:47:\"App\\Controller\\DefaultController::defaultAction\";s:11:\"\0*\0template\";s:25:\"default/default.html.twig\";s:12:\"\0*\0editables\";N;s:26:\"\0*\0contentMasterDocumentId\";N;s:24:\"\0*\0supportsContentMaster\";b:1;s:26:\"\0*\0missingRequiredEditable\";N;s:5:\"\0*\0id\";i:1;s:11:\"\0*\0parentId\";i:0;s:6:\"\0*\0key\";s:0:\"\";s:7:\"\0*\0path\";s:1:\"/\";s:8:\"\0*\0index\";i:999999;s:12:\"\0*\0published\";b:1;s:15:\"\0*\0creationDate\";i:1613764830;s:19:\"\0*\0modificationDate\";i:1619542130;s:12:\"\0*\0userOwner\";i:1;s:19:\"\0*\0userModification\";i:2;s:11:\"\0*\0siblings\";a:0:{}s:14:\"\0*\0hasSiblings\";a:0:{}s:9:\"\0*\0locked\";N;s:15:\"\0*\0versionCount\";i:1;s:25:\"\0*\0__dataVersionTimestamp\";i:1619542130;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840093),
(UNHEX('646F63756D656E745F70726F706572746965735F31'),	's:6:\"a:0:{}\";',	31536000,	1620840092),
(UNHEX('6F626A6563745F31'),	's:566:\"O:31:\"Pimcore\\Model\\DataObject\\Folder\":18:{s:9:\"\0*\0o_type\";s:6:\"folder\";s:7:\"\0*\0o_id\";i:1;s:13:\"\0*\0o_parentId\";i:0;s:8:\"\0*\0o_key\";s:0:\"\";s:9:\"\0*\0o_path\";s:1:\"/\";s:10:\"\0*\0o_index\";i:999999;s:17:\"\0*\0o_creationDate\";i:1613764830;s:21:\"\0*\0o_modificationDate\";i:1613764830;s:14:\"\0*\0o_userOwner\";i:1;s:21:\"\0*\0o_userModification\";i:1;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:0;s:25:\"\0*\0__dataVersionTimestamp\";i:1613764830;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840098),
(UNHEX('6F626A6563745F313537'),	's:572:\"O:31:\"Pimcore\\Model\\DataObject\\Folder\":18:{s:9:\"\0*\0o_type\";s:6:\"folder\";s:7:\"\0*\0o_id\";i:157;s:13:\"\0*\0o_parentId\";i:1;s:8:\"\0*\0o_key\";s:9:\"Materials\";s:9:\"\0*\0o_path\";s:1:\"/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614197775;s:21:\"\0*\0o_modificationDate\";i:1614197775;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:2;s:25:\"\0*\0__dataVersionTimestamp\";i:1614197775;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840099),
(UNHEX('6F626A6563745F313538'),	's:2995:\"O:33:\"Pimcore\\Model\\DataObject\\Material\":25:{s:12:\"\0*\0o_classId\";s:3:\"MAT\";s:14:\"\0*\0o_className\";s:8:\"Material\";s:7:\"\0*\0code\";s:3:\"CTN\";s:11:\"\0*\0typology\";s:1:\"N\";s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"en\";a:2:{s:4:\"name\";s:6:\"Cotton\";s:11:\"description\";s:825:\"Cotton is obtained from the down that forms on the seeds of the plant of the same name. The climates that favor the cultivation of the cotton plant are hot and humid. Currently the major cotton producers are the United States, China, Russia, India, Sudan and Egypt. The textile production of cotton is even 50% of that worldwide. Its fiber is qualified in relation to the length, whose sizes vary from 20 to 40 mm, the longer the length of the fiber the more the cotton is shiny and resistant, therefore more valuable. The main producers of cotton are egypt, peru, sudan and india; from the latter the most valuable quality is produced. Cotton fiber has many advantages: not only does it not ruin washing but it improves its quality, plus it is an electrostatic insulator; it is a very hygienic, fresh and comfortable fabric.\";}s:2:\"es\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"fr\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"it\";a:2:{s:4:\"name\";s:6:\"Cotone\";s:11:\"description\";s:862:\"Il cotone si ricava dalla peluria che si forma sui semi della omonima pianta. I climi che favoriscono la coltivazione della pianta del cotone sono caldo-umidi. Attualmente i maggiori produttori di cotone sono gli stati uniti, cina, russia, india, sudan, egitto. La produzione tessile del cotone è addirittura del 50% di quella mondiale. La sua fibra viene qualificata in rapporto alla lunghezza, le cui misure variano dai 20 ai 40 mm, maggiore è la lunghezza della fibra più il cotone è lucido e resistente, quindi più pregiato. I maggiori produttori di cotone sono l’egitto, il perù, il sudan e l’india; da quest’ultima è prodotta la qualità più pregiata. La fibra di cotone ha molti pregi: non solo non si rovina al lavaggio ma migliora la sua qualità, in più è un isolante elettrostatico; è un tessuto molto igienico, fresco e confortevole.\";}s:2:\"pl\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"pt\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:158;}s:20:\"\0*\0__rawRelationData\";a:0:{}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:158;s:13:\"\0*\0o_parentId\";i:157;s:9:\"\0*\0o_type\";s:6:\"object\";s:8:\"\0*\0o_key\";s:6:\"Cotton\";s:9:\"\0*\0o_path\";s:11:\"/Materials/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614197787;s:21:\"\0*\0o_modificationDate\";i:1614197938;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:2;s:25:\"\0*\0__dataVersionTimestamp\";i:1614197938;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840291),
(UNHEX('6F626A6563745F313630'),	's:1911:\"O:33:\"Pimcore\\Model\\DataObject\\Material\":25:{s:12:\"\0*\0o_classId\";s:3:\"MAT\";s:14:\"\0*\0o_className\";s:8:\"Material\";s:7:\"\0*\0code\";s:3:\"VIS\";s:11:\"\0*\0typology\";s:1:\"A\";s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"en\";a:2:{s:4:\"name\";s:7:\"Viscose\";s:11:\"description\";s:246:\"Viscose is a term often used to represent the viscose fiber that is made from natural sources such as wood and agricultural products that are regenerated as cellulose fiber. The molecular structure of natural cellulose is preserved in the process\";}s:2:\"es\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"fr\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"it\";a:2:{s:4:\"name\";s:7:\"Viscosa\";s:11:\"description\";s:354:\"La viscosa è un tessuto in cellulosa che imita la morbidezza delle pregiate fibre usate storicamente presentando inoltre una lucentezza serica, per cui veniva un tempo anche chiamata \"seta artificiale\". Tuttavia, ogni riferimento alla seta è stato vietato dalla legge che tutela la seta ed ora anche dalla legge europea in tema di etichettatura tessile\";}s:2:\"pl\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"pt\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:160;}s:20:\"\0*\0__rawRelationData\";a:0:{}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:160;s:13:\"\0*\0o_parentId\";i:157;s:9:\"\0*\0o_type\";s:6:\"object\";s:8:\"\0*\0o_key\";s:7:\"Viscose\";s:9:\"\0*\0o_path\";s:11:\"/Materials/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614198174;s:21:\"\0*\0o_modificationDate\";i:1614198245;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:2;s:25:\"\0*\0__dataVersionTimestamp\";i:1614198245;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840298),
(UNHEX('6F626A6563745F313631'),	's:571:\"O:31:\"Pimcore\\Model\\DataObject\\Folder\":18:{s:9:\"\0*\0o_type\";s:6:\"folder\";s:7:\"\0*\0o_id\";i:161;s:13:\"\0*\0o_parentId\";i:1;s:8:\"\0*\0o_key\";s:8:\"Products\";s:9:\"\0*\0o_path\";s:1:\"/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614198258;s:21:\"\0*\0o_modificationDate\";i:1614198257;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:2;s:25:\"\0*\0__dataVersionTimestamp\";i:1614198257;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840100),
(UNHEX('6F626A6563745F313632'),	's:3435:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:4:\"0001\";s:8:\"\0*\0price\";O:43:\"Pimcore\\Model\\DataObject\\Data\\QuantityValue\":6:{s:8:\"\0*\0value\";d:49.99;s:9:\"\0*\0unitId\";s:1:\"1\";s:7:\"\0*\0unit\";N;s:9:\"\0*\0_owner\";N;s:13:\"\0*\0_fieldname\";N;s:12:\"\0*\0_language\";N;}s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";s:16:\"T-Shirt Classica\";s:17:\"short_description\";s:129:\"Soft and comfortable, this t-shirt is made of high quality Pima cotton. Available in bright colors. For the everyday, modern man.\";s:11:\"description\";s:166:\"<p>Pima cotton jersey<br />\nChoker<br />\nRegular cut<br />\nLogo transfer inside the neck<br />\nGreen crocodile embroidered on the chest<br />\nCotton (100%)&nbsp;</p>\n\";}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";s:16:\"T-Shirt Classica\";s:17:\"short_description\";s:164:\"Morbida e confortevole, questa t-shirt è confezionata in jersey di cotone Pima di alta qualità. Proposta in tinte vivaci, accompagna tutti i giorni l\'uomo moderno\";s:11:\"description\";s:172:\"<p>Jersey di cotone Pima<br />\nGirocollo<br />\nTaglio regolare<br />\nLogo transfer all\'interno del collo<br />\nCoccodrillo verde ricamato sul petto<br />\nCotone (100%)</p>\n\";}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:162;}s:8:\"\0*\0brand\";s:1:\"9\";s:10:\"\0*\0made_in\";s:2:\"CN\";s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";O:58:\"Pimcore\\Model\\DataObject\\Objectbrick\\Data\\ShirtsAttributes\":7:{s:7:\"\0*\0type\";s:16:\"ShirtsAttributes\";s:16:\"\0*\0sleeve_lenght\";s:1:\"1\";s:7:\"\0*\0size\";s:1:\"M\";s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0doDelete\";b:0;s:11:\"\0*\0objectId\";i:162;s:12:\"\0*\0_fulldump\";b:0;}s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:162;}s:20:\"\0*\0__rawRelationData\";a:2:{i:0;a:9:{s:2:\"id\";s:2:\"55\";s:6:\"src_id\";s:3:\"162\";s:7:\"dest_id\";s:1:\"5\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:8:\"category\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}i:1;a:9:{s:2:\"id\";s:2:\"56\";s:6:\"src_id\";s:3:\"162\";s:7:\"dest_id\";s:3:\"158\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:9:\"materials\";s:5:\"index\";s:1:\"1\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:162;s:13:\"\0*\0o_parentId\";i:161;s:9:\"\0*\0o_type\";s:6:\"object\";s:8:\"\0*\0o_key\";s:15:\"Classic T-Shirt\";s:9:\"\0*\0o_path\";s:10:\"/Products/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614198299;s:21:\"\0*\0o_modificationDate\";i:1620840309;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:17;s:25:\"\0*\0__dataVersionTimestamp\";i:1620840309;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840310),
(UNHEX('6F626A6563745F313632007461677300'),	'i:1;',	NULL,	1620840309),
(UNHEX('6F626A6563745F313633'),	's:2058:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"0001-AZ\";s:8:\"\0*\0price\";N;s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:163;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:163;}s:20:\"\0*\0__rawRelationData\";a:1:{i:0;a:9:{s:2:\"id\";s:1:\"4\";s:6:\"src_id\";s:3:\"163\";s:7:\"dest_id\";s:2:\"54\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:5:\"color\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:163;s:13:\"\0*\0o_parentId\";i:162;s:9:\"\0*\0o_type\";s:7:\"variant\";s:8:\"\0*\0o_key\";s:9:\"Azureblue\";s:9:\"\0*\0o_path\";s:26:\"/Products/Classic T-Shirt/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614199202;s:21:\"\0*\0o_modificationDate\";i:1614200978;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:3;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200978;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015169),
(UNHEX('6F626A6563745F313634'),	's:2054:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"0001-BK\";s:8:\"\0*\0price\";N;s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:164;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:164;}s:20:\"\0*\0__rawRelationData\";a:1:{i:0;a:9:{s:2:\"id\";s:1:\"5\";s:6:\"src_id\";s:3:\"164\";s:7:\"dest_id\";s:2:\"17\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:5:\"color\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:164;s:13:\"\0*\0o_parentId\";i:162;s:9:\"\0*\0o_type\";s:7:\"variant\";s:8:\"\0*\0o_key\";s:5:\"Black\";s:9:\"\0*\0o_path\";s:26:\"/Products/Classic T-Shirt/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614199345;s:21:\"\0*\0o_modificationDate\";i:1614200989;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:3;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200989;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015169),
(UNHEX('6F626A6563745F313635'),	's:2054:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"0001-GR\";s:8:\"\0*\0price\";N;s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:165;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:165;}s:20:\"\0*\0__rawRelationData\";a:1:{i:0;a:9:{s:2:\"id\";s:1:\"6\";s:6:\"src_id\";s:3:\"165\";s:7:\"dest_id\";s:2:\"64\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:5:\"color\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:165;s:13:\"\0*\0o_parentId\";i:162;s:9:\"\0*\0o_type\";s:7:\"variant\";s:8:\"\0*\0o_key\";s:5:\"Green\";s:9:\"\0*\0o_path\";s:26:\"/Products/Classic T-Shirt/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614199391;s:21:\"\0*\0o_modificationDate\";i:1614200969;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:4;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200969;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015169),
(UNHEX('6F626A6563745F313636'),	's:2053:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"0001-GY\";s:8:\"\0*\0price\";N;s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:166;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:166;}s:20:\"\0*\0__rawRelationData\";a:1:{i:0;a:9:{s:2:\"id\";s:1:\"7\";s:6:\"src_id\";s:3:\"166\";s:7:\"dest_id\";s:2:\"66\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:5:\"color\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:166;s:13:\"\0*\0o_parentId\";i:162;s:9:\"\0*\0o_type\";s:7:\"variant\";s:8:\"\0*\0o_key\";s:4:\"Grey\";s:9:\"\0*\0o_path\";s:26:\"/Products/Classic T-Shirt/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614199451;s:21:\"\0*\0o_modificationDate\";i:1614200960;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:4;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200960;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015169),
(UNHEX('6F626A6563745F313637'),	's:2054:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"0001-PK\";s:8:\"\0*\0price\";N;s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:167;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:167;}s:20:\"\0*\0__rawRelationData\";a:1:{i:0;a:9:{s:2:\"id\";s:1:\"8\";s:6:\"src_id\";s:3:\"167\";s:7:\"dest_id\";s:3:\"125\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:5:\"color\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:167;s:13:\"\0*\0o_parentId\";i:162;s:9:\"\0*\0o_type\";s:7:\"variant\";s:8:\"\0*\0o_key\";s:4:\"Pink\";s:9:\"\0*\0o_path\";s:26:\"/Products/Classic T-Shirt/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614199502;s:21:\"\0*\0o_modificationDate\";i:1614200940;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:3;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200940;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015169),
(UNHEX('6F626A6563745F313638'),	's:2053:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"0001-RD\";s:8:\"\0*\0price\";N;s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:168;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:168;}s:20:\"\0*\0__rawRelationData\";a:1:{i:0;a:9:{s:2:\"id\";s:1:\"9\";s:6:\"src_id\";s:3:\"168\";s:7:\"dest_id\";s:3:\"129\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:5:\"color\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:168;s:13:\"\0*\0o_parentId\";i:162;s:9:\"\0*\0o_type\";s:7:\"variant\";s:8:\"\0*\0o_key\";s:3:\"Red\";s:9:\"\0*\0o_path\";s:26:\"/Products/Classic T-Shirt/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614199542;s:21:\"\0*\0o_modificationDate\";i:1614200949;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:3;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200949;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015169),
(UNHEX('6F626A6563745F313639'),	's:2056:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"0001-WH\";s:8:\"\0*\0price\";N;s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:169;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:169;}s:20:\"\0*\0__rawRelationData\";a:1:{i:0;a:9:{s:2:\"id\";s:2:\"10\";s:6:\"src_id\";s:3:\"169\";s:7:\"dest_id\";s:3:\"153\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:5:\"color\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:169;s:13:\"\0*\0o_parentId\";i:162;s:9:\"\0*\0o_type\";s:7:\"variant\";s:8:\"\0*\0o_key\";s:5:\"White\";s:9:\"\0*\0o_path\";s:26:\"/Products/Classic T-Shirt/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614199579;s:21:\"\0*\0o_modificationDate\";i:1614200927;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:3;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200927;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015169),
(UNHEX('6F626A6563745F313730'),	's:2057:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"0001-YW\";s:8:\"\0*\0price\";N;s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:170;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:170;}s:20:\"\0*\0__rawRelationData\";a:1:{i:0;a:9:{s:2:\"id\";s:2:\"11\";s:6:\"src_id\";s:3:\"170\";s:7:\"dest_id\";s:3:\"155\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:5:\"color\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:170;s:13:\"\0*\0o_parentId\";i:162;s:9:\"\0*\0o_type\";s:7:\"variant\";s:8:\"\0*\0o_key\";s:6:\"Yellow\";s:9:\"\0*\0o_path\";s:26:\"/Products/Classic T-Shirt/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614199619;s:21:\"\0*\0o_modificationDate\";i:1614200918;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:3;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200918;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621015169),
(UNHEX('6F626A6563745F313731'),	's:3015:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:4:\"0002\";s:8:\"\0*\0price\";O:43:\"Pimcore\\Model\\DataObject\\Data\\QuantityValue\":6:{s:8:\"\0*\0value\";d:19.99;s:9:\"\0*\0unitId\";s:1:\"1\";s:7:\"\0*\0unit\";N;s:9:\"\0*\0_owner\";N;s:13:\"\0*\0_fieldname\";N;s:12:\"\0*\0_language\";N;}s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";s:15:\"Shorts in Jeans\";s:17:\"short_description\";s:29:\"Denim shorts with turn-up hem\";s:11:\"description\";s:87:\"<p>Denim shorts with turn-up hem, belt loops, pockets, and zip and button closure.</p>\n\";}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";s:15:\"Shorts in Jeans\";s:17:\"short_description\";s:38:\"Shorts di jeans con risvolto sull\'orlo\";s:11:\"description\";s:108:\"<p>Shorts di jeans con risvolto sull\'orlo, vita con passante, tasche e chiusura con cerniera e bottone.</p>\n\";}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:171;}s:8:\"\0*\0brand\";s:2:\"66\";s:10:\"\0*\0made_in\";s:2:\"IT\";s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:171;}s:20:\"\0*\0__rawRelationData\";a:3:{i:0;a:9:{s:2:\"id\";s:2:\"59\";s:6:\"src_id\";s:3:\"171\";s:7:\"dest_id\";s:1:\"7\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:8:\"category\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}i:1;a:9:{s:2:\"id\";s:2:\"62\";s:6:\"src_id\";s:3:\"171\";s:7:\"dest_id\";s:3:\"158\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:9:\"materials\";s:5:\"index\";s:1:\"1\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}i:2;a:9:{s:2:\"id\";s:2:\"63\";s:6:\"src_id\";s:3:\"171\";s:7:\"dest_id\";s:3:\"160\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:9:\"materials\";s:5:\"index\";s:1:\"2\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:171;s:13:\"\0*\0o_parentId\";i:161;s:9:\"\0*\0o_type\";s:6:\"object\";s:8:\"\0*\0o_key\";s:12:\"Jeans Shorts\";s:9:\"\0*\0o_path\";s:10:\"/Products/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614199957;s:21:\"\0*\0o_modificationDate\";i:1620840365;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:11;s:25:\"\0*\0__dataVersionTimestamp\";i:1620840365;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840366),
(UNHEX('6F626A6563745F313731007461677300'),	'i:3;',	NULL,	1620840365),
(UNHEX('6F626A6563745F313732'),	's:2051:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"0002-BL\";s:8:\"\0*\0price\";N;s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:172;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:172;}s:20:\"\0*\0__rawRelationData\";a:1:{i:0;a:9:{s:2:\"id\";s:2:\"15\";s:6:\"src_id\";s:3:\"172\";s:7:\"dest_id\";s:2:\"19\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:5:\"color\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:172;s:13:\"\0*\0o_parentId\";i:171;s:9:\"\0*\0o_type\";s:7:\"variant\";s:8:\"\0*\0o_key\";s:4:\"Blue\";s:9:\"\0*\0o_path\";s:23:\"/Products/Jeans Shorts/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614200657;s:21:\"\0*\0o_modificationDate\";i:1614200848;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:4;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200848;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621009526),
(UNHEX('6F626A6563745F313733'),	's:2056:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"0002-LB\";s:8:\"\0*\0price\";N;s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:173;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:173;}s:20:\"\0*\0__rawRelationData\";a:1:{i:0;a:9:{s:2:\"id\";s:2:\"17\";s:6:\"src_id\";s:3:\"173\";s:7:\"dest_id\";s:2:\"77\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:5:\"color\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:173;s:13:\"\0*\0o_parentId\";i:171;s:9:\"\0*\0o_type\";s:7:\"variant\";s:8:\"\0*\0o_key\";s:9:\"Lightblue\";s:9:\"\0*\0o_path\";s:23:\"/Products/Jeans Shorts/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614200666;s:21:\"\0*\0o_modificationDate\";i:1614200866;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:3;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200866;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621009526),
(UNHEX('6F626A6563745F313734'),	's:2051:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"0002-GY\";s:8:\"\0*\0price\";N;s:14:\"\0*\0bundlePrice\";N;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:174;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:174;}s:20:\"\0*\0__rawRelationData\";a:1:{i:0;a:9:{s:2:\"id\";s:2:\"16\";s:6:\"src_id\";s:3:\"174\";s:7:\"dest_id\";s:2:\"66\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:5:\"color\";s:5:\"index\";s:1:\"0\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:174;s:13:\"\0*\0o_parentId\";i:171;s:9:\"\0*\0o_type\";s:7:\"variant\";s:8:\"\0*\0o_key\";s:4:\"Grey\";s:9:\"\0*\0o_path\";s:23:\"/Products/Jeans Shorts/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614200672;s:21:\"\0*\0o_modificationDate\";i:1614200856;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:4;s:25:\"\0*\0__dataVersionTimestamp\";i:1614200856;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621009526),
(UNHEX('6F626A6563745F313735'),	's:2522:\"O:32:\"Pimcore\\Model\\DataObject\\Product\":29:{s:12:\"\0*\0o_classId\";s:3:\"PRD\";s:14:\"\0*\0o_className\";s:7:\"Product\";s:6:\"\0*\0sku\";s:7:\"Bundle1\";s:8:\"\0*\0price\";O:43:\"Pimcore\\Model\\DataObject\\Data\\QuantityValue\":6:{s:8:\"\0*\0value\";d:74.99;s:9:\"\0*\0unitId\";s:1:\"1\";s:7:\"\0*\0unit\";N;s:9:\"\0*\0_owner\";N;s:13:\"\0*\0_fieldname\";N;s:12:\"\0*\0_language\";N;}s:14:\"\0*\0bundlePrice\";d:55.98;s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"en\";a:3:{s:4:\"name\";s:15:\"T-Shirt & Jeans\";s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"es\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"fr\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"it\";a:3:{s:4:\"name\";s:15:\"T-Shirt & Jeans\";s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pl\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}s:2:\"pt\";a:3:{s:4:\"name\";N;s:17:\"short_description\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:175;}s:8:\"\0*\0brand\";s:0:\"\";s:10:\"\0*\0made_in\";N;s:13:\"\0*\0attributes\";O:43:\"Pimcore\\Model\\DataObject\\Product\\Attributes\":6:{s:15:\"\0*\0brickGetters\";a:2:{i:0;s:15:\"ShoesAttributes\";i:1;s:16:\"ShirtsAttributes\";}s:18:\"\0*\0ShoesAttributes\";N;s:19:\"\0*\0ShirtsAttributes\";N;s:8:\"\0*\0items\";a:0:{}s:12:\"\0*\0fieldname\";s:10:\"attributes\";s:11:\"\0*\0objectId\";i:175;}s:20:\"\0*\0__rawRelationData\";a:2:{i:0;a:9:{s:2:\"id\";s:2:\"66\";s:6:\"src_id\";s:3:\"175\";s:7:\"dest_id\";s:3:\"162\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:15:\"bundle_products\";s:5:\"index\";s:1:\"1\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}i:1;a:9:{s:2:\"id\";s:2:\"67\";s:6:\"src_id\";s:3:\"175\";s:7:\"dest_id\";s:3:\"171\";s:4:\"type\";s:6:\"object\";s:9:\"fieldname\";s:15:\"bundle_products\";s:5:\"index\";s:1:\"2\";s:9:\"ownertype\";s:6:\"object\";s:9:\"ownername\";s:0:\"\";s:8:\"position\";s:1:\"0\";}}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:175;s:13:\"\0*\0o_parentId\";i:161;s:9:\"\0*\0o_type\";s:6:\"object\";s:8:\"\0*\0o_key\";s:15:\"T-Shirt & Jeans\";s:9:\"\0*\0o_path\";s:10:\"/Products/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1615225671;s:21:\"\0*\0o_modificationDate\";i:1621009518;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:20;s:25:\"\0*\0__dataVersionTimestamp\";i:1621009518;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1621009519),
(UNHEX('6F626A6563745F313735007461677300'),	'i:6;',	NULL,	1621009518),
(UNHEX('6F626A6563745F313739'),	's:568:\"O:31:\"Pimcore\\Model\\DataObject\\Folder\":18:{s:9:\"\0*\0o_type\";s:6:\"folder\";s:7:\"\0*\0o_id\";i:179;s:13:\"\0*\0o_parentId\";i:1;s:8:\"\0*\0o_key\";s:5:\"Shops\";s:9:\"\0*\0o_path\";s:1:\"/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1618215392;s:21:\"\0*\0o_modificationDate\";i:1618215391;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:2;s:25:\"\0*\0__dataVersionTimestamp\";i:1618215391;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840099),
(UNHEX('6F626A6563745F32'),	's:572:\"O:31:\"Pimcore\\Model\\DataObject\\Folder\":18:{s:9:\"\0*\0o_type\";s:6:\"folder\";s:7:\"\0*\0o_id\";i:2;s:13:\"\0*\0o_parentId\";i:1;s:8:\"\0*\0o_key\";s:10:\"Categories\";s:9:\"\0*\0o_path\";s:1:\"/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614196736;s:21:\"\0*\0o_modificationDate\";i:1614196736;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:2;s:25:\"\0*\0__dataVersionTimestamp\";i:1614196736;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840099),
(UNHEX('6F626A6563745F35'),	's:2081:\"O:33:\"Pimcore\\Model\\DataObject\\Category\":24:{s:12:\"\0*\0o_classId\";s:3:\"CAT\";s:14:\"\0*\0o_className\";s:8:\"Category\";s:7:\"\0*\0code\";s:3:\"TSH\";s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"en\";a:2:{s:4:\"name\";s:7:\"T-Shirt\";s:11:\"description\";s:395:\"<p>A leader as simple as it is revolutionary. It is the t-shirt, a garment that has changed the fate of fashion history with its unisex and informal vocation. The shirt, in fact, is a garment without collar and without buttons, with short or long sleeves, which dresses women and men without distinction and is declined in an infinite variant of models, more or less expensive.<br />\n&nbsp;</p>\n\";}s:2:\"es\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"fr\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"it\";a:2:{s:4:\"name\";s:7:\"T-Shirt\";s:11:\"description\";s:388:\"<p>Un capo tanto semplice quanto rivoluzionario. È la t-shirt, un indumento che ha cambiato le sorti della storia della moda con la sua vocazione unisex e informale. La maglietta, infatti, è un capo senza colletto e senza bottoni, a maniche corte o lunghe, che veste indistintamente donne e uomini e si declina in una variante infinita di modelli, più o meno costosi.<br />\n&nbsp;</p>\n\";}s:2:\"pl\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"pt\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:5;}s:20:\"\0*\0__rawRelationData\";a:0:{}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:5;s:13:\"\0*\0o_parentId\";i:3;s:9:\"\0*\0o_type\";s:6:\"object\";s:8:\"\0*\0o_key\";s:7:\"T-Shirt\";s:9:\"\0*\0o_path\";s:31:\"/Categories/Jerseys and Shirts/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614196985;s:21:\"\0*\0o_modificationDate\";i:1614197130;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:2;s:25:\"\0*\0__dataVersionTimestamp\";i:1614197130;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840303),
(UNHEX('6F626A6563745F37'),	's:1558:\"O:33:\"Pimcore\\Model\\DataObject\\Category\":24:{s:12:\"\0*\0o_classId\";s:3:\"CAT\";s:14:\"\0*\0o_className\";s:8:\"Category\";s:7:\"\0*\0code\";s:3:\"SHT\";s:18:\"\0*\0localizedfields\";O:39:\"Pimcore\\Model\\DataObject\\Localizedfield\":3:{s:8:\"\0*\0items\";a:7:{s:5:\"el_GR\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"en\";a:2:{s:4:\"name\";s:6:\"Shorts\";s:11:\"description\";s:128:\"<p>The shorts are basically short shorts. The most beautiful are the high-waisted hot pants, 50s pin up style, so to speak.</p>\n\";}s:2:\"es\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"fr\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"it\";a:2:{s:4:\"name\";s:6:\"Shorts\";s:11:\"description\";s:145:\"<p>Gli shorts sono sostanzialmente pantaloncini corti. I più belli sono gli hot pants a vita alta, stile pin up anni ’50, per intenderci.</p>\n\";}s:2:\"pl\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}s:2:\"pt\";a:2:{s:4:\"name\";N;s:11:\"description\";N;}}s:10:\"\0*\0context\";a:1:{s:6:\"object\";r:1;}s:11:\"\0*\0objectId\";i:7;}s:20:\"\0*\0__rawRelationData\";a:0:{}s:14:\"\0*\0o_published\";b:1;s:7:\"\0*\0o_id\";i:7;s:13:\"\0*\0o_parentId\";i:6;s:9:\"\0*\0o_type\";s:6:\"object\";s:8:\"\0*\0o_key\";s:6:\"Shorts\";s:9:\"\0*\0o_path\";s:21:\"/Categories/Trousers/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614197218;s:21:\"\0*\0o_modificationDate\";i:1614197285;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:3;s:25:\"\0*\0__dataVersionTimestamp\";i:1614197285;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840306),
(UNHEX('6F626A6563745F39'),	's:567:\"O:31:\"Pimcore\\Model\\DataObject\\Folder\":18:{s:9:\"\0*\0o_type\";s:6:\"folder\";s:7:\"\0*\0o_id\";i:9;s:13:\"\0*\0o_parentId\";i:1;s:8:\"\0*\0o_key\";s:6:\"Colors\";s:9:\"\0*\0o_path\";s:1:\"/\";s:10:\"\0*\0o_index\";i:0;s:17:\"\0*\0o_creationDate\";i:1614197335;s:21:\"\0*\0o_modificationDate\";i:1614197335;s:14:\"\0*\0o_userOwner\";i:2;s:21:\"\0*\0o_userModification\";i:2;s:13:\"\0*\0o_siblings\";a:0:{}s:16:\"\0*\0o_hasSiblings\";a:0:{}s:11:\"\0*\0o_locked\";N;s:19:\"\0*\0o_childrenSortBy\";N;s:22:\"\0*\0o_childrenSortOrder\";N;s:17:\"\0*\0o_versionCount\";i:2;s:25:\"\0*\0__dataVersionTimestamp\";i:1614197335;s:12:\"\0*\0_fulldump\";b:0;}\";',	31536000,	1620840099),
(UNHEX('6F626A6563745F70726F70657274696573007461677300'),	'i:10;',	NULL,	1621009518),
(UNHEX('6F626A6563745F70726F706572746965735F313631'),	's:6:\"a:0:{}\";',	31536000,	1621015376),
(UNHEX('6F626A6563745F70726F706572746965735F313632'),	's:6:\"a:0:{}\";',	31536000,	1621015166),
(UNHEX('6F626A6563745F70726F706572746965735F313731'),	's:6:\"a:0:{}\";',	31536000,	1621009522),
(UNHEX('6F626A6563745F70726F706572746965735F313732'),	's:6:\"a:0:{}\";',	31536000,	1621009528),
(UNHEX('6F626A6563745F70726F706572746965735F313735'),	's:6:\"a:0:{}\";',	31536000,	1621015384),
(UNHEX('6F7574707574007461677300'),	'i:9;',	NULL,	1621009518),
(UNHEX('70696D636F72655F61646D696E65725F646174616261736573'),	's:54:\"a:2:{i:0;s:18:\"information_schema\";i:1;s:7:\"pimcore\";}\";',	31536000,	1621009553),
(UNHEX('7175616E7469747976616C75655F756E6974735F7461626C65'),	's:282:\"a:1:{i:1;O:43:\"Pimcore\\Model\\DataObject\\QuantityValue\\Unit\":9:{s:5:\"\0*\0id\";s:1:\"1\";s:15:\"\0*\0abbreviation\";s:3:\"€\";s:8:\"\0*\0group\";N;s:11:\"\0*\0longname\";s:4:\"Euro\";s:11:\"\0*\0baseunit\";N;s:12:\"\0*\0reference\";N;s:9:\"\0*\0factor\";N;s:19:\"\0*\0conversionOffset\";N;s:12:\"\0*\0converter\";s:0:\"\";}}\";',	31536000,	1620840284),
(UNHEX('736974655F646F6D61696E5F3432316161393065303739666133323662363439346638313261643133653739'),	's:13:\"s:6:\"failed\";\";',	31536000,	1620840092),
(UNHEX('73797374656D5F7265736F757263655F636F6C756D6E735F656469745F6C6F636B'),	's:101:\"a:6:{i:0;s:2:\"id\";i:1;s:3:\"cid\";i:2;s:5:\"ctype\";i:3;s:6:\"userId\";i:4;s:9:\"sessionId\";i:5;s:4:\"date\";}\";',	31536000,	1620840280),
(UNHEX('73797374656D5F7265736F757263655F636F6C756D6E735F76657273696F6E73'),	's:254:\"a:13:{i:0;s:2:\"id\";i:1;s:3:\"cid\";i:2;s:5:\"ctype\";i:3;s:6:\"userId\";i:4;s:4:\"note\";i:5;s:10:\"stackTrace\";i:6;s:4:\"date\";i:7;s:6:\"public\";i:8;s:10:\"serialized\";i:9;s:12:\"versionCount\";i:10;s:14:\"binaryFileHash\";i:11;s:12:\"binaryFileId\";i:12;s:8:\"autoSave\";}\";',	31536000,	1620840292),
(UNHEX('73797374656D5F726F7574655F7265646972656374'),	's:6:\"a:0:{}\";',	31536000,	1620840091),
(UNHEX('73797374656D5F737570706F727465645F6C6F63616C65735F656E'),	's:25472:\"a:732:{s:2:\"af\";s:9:\"Afrikaans\";s:5:\"af_NA\";s:19:\"Afrikaans (Namibia)\";s:5:\"af_ZA\";s:24:\"Afrikaans (South Africa)\";s:3:\"agq\";s:5:\"Aghem\";s:6:\"agq_CM\";s:16:\"Aghem (Cameroon)\";s:2:\"ak\";s:4:\"Akan\";s:5:\"ak_GH\";s:12:\"Akan (Ghana)\";s:2:\"sq\";s:8:\"Albanian\";s:5:\"sq_AL\";s:18:\"Albanian (Albania)\";s:5:\"sq_XK\";s:17:\"Albanian (Kosovo)\";s:5:\"sq_MK\";s:20:\"Albanian (Macedonia)\";s:2:\"am\";s:7:\"Amharic\";s:5:\"am_ET\";s:18:\"Amharic (Ethiopia)\";s:2:\"ar\";s:6:\"Arabic\";s:5:\"ar_DZ\";s:16:\"Arabic (Algeria)\";s:5:\"ar_BH\";s:16:\"Arabic (Bahrain)\";s:5:\"ar_TD\";s:13:\"Arabic (Chad)\";s:5:\"ar_KM\";s:16:\"Arabic (Comoros)\";s:5:\"ar_DJ\";s:17:\"Arabic (Djibouti)\";s:5:\"ar_EG\";s:14:\"Arabic (Egypt)\";s:5:\"ar_ER\";s:16:\"Arabic (Eritrea)\";s:5:\"ar_IQ\";s:13:\"Arabic (Iraq)\";s:5:\"ar_IL\";s:15:\"Arabic (Israel)\";s:5:\"ar_JO\";s:15:\"Arabic (Jordan)\";s:5:\"ar_KW\";s:15:\"Arabic (Kuwait)\";s:5:\"ar_LB\";s:16:\"Arabic (Lebanon)\";s:5:\"ar_LY\";s:14:\"Arabic (Libya)\";s:5:\"ar_MR\";s:19:\"Arabic (Mauritania)\";s:5:\"ar_MA\";s:16:\"Arabic (Morocco)\";s:5:\"ar_OM\";s:13:\"Arabic (Oman)\";s:5:\"ar_PS\";s:32:\"Arabic (Palestinian Territories)\";s:5:\"ar_QA\";s:14:\"Arabic (Qatar)\";s:5:\"ar_SA\";s:21:\"Arabic (Saudi Arabia)\";s:5:\"ar_SO\";s:16:\"Arabic (Somalia)\";s:5:\"ar_SS\";s:20:\"Arabic (South Sudan)\";s:5:\"ar_SD\";s:14:\"Arabic (Sudan)\";s:5:\"ar_SY\";s:14:\"Arabic (Syria)\";s:5:\"ar_TN\";s:16:\"Arabic (Tunisia)\";s:5:\"ar_AE\";s:29:\"Arabic (United Arab Emirates)\";s:5:\"ar_EH\";s:23:\"Arabic (Western Sahara)\";s:6:\"ar_001\";s:14:\"Arabic (World)\";s:5:\"ar_YE\";s:14:\"Arabic (Yemen)\";s:2:\"hy\";s:8:\"Armenian\";s:5:\"hy_AM\";s:18:\"Armenian (Armenia)\";s:2:\"as\";s:8:\"Assamese\";s:5:\"as_IN\";s:16:\"Assamese (India)\";s:3:\"ast\";s:8:\"Asturian\";s:6:\"ast_ES\";s:16:\"Asturian (Spain)\";s:3:\"asa\";s:3:\"Asu\";s:6:\"asa_TZ\";s:14:\"Asu (Tanzania)\";s:2:\"az\";s:11:\"Azerbaijani\";s:7:\"az_Cyrl\";s:11:\"Azerbaijani\";s:7:\"az_Latn\";s:11:\"Azerbaijani\";s:10:\"az_Cyrl_AZ\";s:24:\"Azerbaijani (Azerbaijan)\";s:10:\"az_Latn_AZ\";s:24:\"Azerbaijani (Azerbaijan)\";s:3:\"ksf\";s:5:\"Bafia\";s:6:\"ksf_CM\";s:16:\"Bafia (Cameroon)\";s:2:\"bm\";s:7:\"Bambara\";s:5:\"bm_ML\";s:14:\"Bambara (Mali)\";s:2:\"bn\";s:6:\"Bangla\";s:5:\"bn_BD\";s:19:\"Bangla (Bangladesh)\";s:5:\"bn_IN\";s:14:\"Bangla (India)\";s:3:\"bas\";s:5:\"Basaa\";s:6:\"bas_CM\";s:16:\"Basaa (Cameroon)\";s:2:\"eu\";s:6:\"Basque\";s:5:\"eu_ES\";s:14:\"Basque (Spain)\";s:2:\"be\";s:10:\"Belarusian\";s:5:\"be_BY\";s:20:\"Belarusian (Belarus)\";s:3:\"bem\";s:5:\"Bemba\";s:6:\"bem_ZM\";s:14:\"Bemba (Zambia)\";s:3:\"bez\";s:4:\"Bena\";s:6:\"bez_TZ\";s:15:\"Bena (Tanzania)\";s:3:\"brx\";s:4:\"Bodo\";s:6:\"brx_IN\";s:12:\"Bodo (India)\";s:2:\"bs\";s:7:\"Bosnian\";s:7:\"bs_Cyrl\";s:7:\"Bosnian\";s:7:\"bs_Latn\";s:7:\"Bosnian\";s:10:\"bs_Cyrl_BA\";s:30:\"Bosnian (Bosnia & Herzegovina)\";s:10:\"bs_Latn_BA\";s:30:\"Bosnian (Bosnia & Herzegovina)\";s:2:\"br\";s:6:\"Breton\";s:5:\"br_FR\";s:15:\"Breton (France)\";s:2:\"bg\";s:9:\"Bulgarian\";s:5:\"bg_BG\";s:20:\"Bulgarian (Bulgaria)\";s:2:\"my\";s:7:\"Burmese\";s:5:\"my_MM\";s:25:\"Burmese (Myanmar (Burma))\";s:3:\"yue\";s:9:\"Cantonese\";s:8:\"yue_Hans\";s:9:\"Cantonese\";s:8:\"yue_Hant\";s:9:\"Cantonese\";s:11:\"yue_Hans_CN\";s:17:\"Cantonese (China)\";s:11:\"yue_Hant_HK\";s:31:\"Cantonese (Hong Kong SAR China)\";s:2:\"ca\";s:7:\"Catalan\";s:5:\"ca_AD\";s:17:\"Catalan (Andorra)\";s:5:\"ca_FR\";s:16:\"Catalan (France)\";s:5:\"ca_IT\";s:15:\"Catalan (Italy)\";s:5:\"ca_ES\";s:15:\"Catalan (Spain)\";s:3:\"tzm\";s:23:\"Central Atlas Tamazight\";s:6:\"tzm_MA\";s:33:\"Central Atlas Tamazight (Morocco)\";s:3:\"ckb\";s:15:\"Central Kurdish\";s:6:\"ckb_IR\";s:22:\"Central Kurdish (Iran)\";s:6:\"ckb_IQ\";s:22:\"Central Kurdish (Iraq)\";s:3:\"ccp\";s:6:\"Chakma\";s:6:\"ccp_BD\";s:19:\"Chakma (Bangladesh)\";s:6:\"ccp_IN\";s:14:\"Chakma (India)\";s:2:\"ce\";s:7:\"Chechen\";s:5:\"ce_RU\";s:16:\"Chechen (Russia)\";s:3:\"chr\";s:8:\"Cherokee\";s:6:\"chr_US\";s:24:\"Cherokee (United States)\";s:3:\"cgg\";s:5:\"Chiga\";s:6:\"cgg_UG\";s:14:\"Chiga (Uganda)\";s:2:\"zh\";s:7:\"Chinese\";s:7:\"zh_Hans\";s:7:\"Chinese\";s:7:\"zh_Hant\";s:7:\"Chinese\";s:10:\"zh_Hans_CN\";s:15:\"Chinese (China)\";s:10:\"zh_Hans_HK\";s:29:\"Chinese (Hong Kong SAR China)\";s:10:\"zh_Hant_HK\";s:29:\"Chinese (Hong Kong SAR China)\";s:10:\"zh_Hans_MO\";s:25:\"Chinese (Macau SAR China)\";s:10:\"zh_Hant_MO\";s:25:\"Chinese (Macau SAR China)\";s:10:\"zh_Hans_SG\";s:19:\"Chinese (Singapore)\";s:10:\"zh_Hant_TW\";s:16:\"Chinese (Taiwan)\";s:3:\"ksh\";s:9:\"Colognian\";s:6:\"ksh_DE\";s:19:\"Colognian (Germany)\";s:2:\"kw\";s:7:\"Cornish\";s:5:\"kw_GB\";s:24:\"Cornish (United Kingdom)\";s:2:\"hr\";s:8:\"Croatian\";s:5:\"hr_BA\";s:31:\"Croatian (Bosnia & Herzegovina)\";s:5:\"hr_HR\";s:18:\"Croatian (Croatia)\";s:2:\"cs\";s:5:\"Czech\";s:5:\"cs_CZ\";s:15:\"Czech (Czechia)\";s:2:\"da\";s:6:\"Danish\";s:5:\"da_DK\";s:16:\"Danish (Denmark)\";s:5:\"da_GL\";s:18:\"Danish (Greenland)\";s:3:\"dua\";s:5:\"Duala\";s:6:\"dua_CM\";s:16:\"Duala (Cameroon)\";s:2:\"nl\";s:5:\"Dutch\";s:5:\"nl_AW\";s:13:\"Dutch (Aruba)\";s:5:\"nl_BE\";s:15:\"Dutch (Belgium)\";s:5:\"nl_BQ\";s:29:\"Dutch (Caribbean Netherlands)\";s:5:\"nl_CW\";s:16:\"Dutch (Curaçao)\";s:5:\"nl_NL\";s:19:\"Dutch (Netherlands)\";s:5:\"nl_SX\";s:20:\"Dutch (Sint Maarten)\";s:5:\"nl_SR\";s:16:\"Dutch (Suriname)\";s:2:\"dz\";s:8:\"Dzongkha\";s:5:\"dz_BT\";s:17:\"Dzongkha (Bhutan)\";s:3:\"ebu\";s:4:\"Embu\";s:6:\"ebu_KE\";s:12:\"Embu (Kenya)\";s:2:\"en\";s:7:\"English\";s:5:\"en_AS\";s:24:\"English (American Samoa)\";s:5:\"en_AI\";s:18:\"English (Anguilla)\";s:5:\"en_AG\";s:27:\"English (Antigua & Barbuda)\";s:5:\"en_AU\";s:19:\"English (Australia)\";s:5:\"en_AT\";s:17:\"English (Austria)\";s:5:\"en_BS\";s:17:\"English (Bahamas)\";s:5:\"en_BB\";s:18:\"English (Barbados)\";s:5:\"en_BE\";s:17:\"English (Belgium)\";s:5:\"en_BZ\";s:16:\"English (Belize)\";s:5:\"en_BM\";s:17:\"English (Bermuda)\";s:5:\"en_BW\";s:18:\"English (Botswana)\";s:5:\"en_IO\";s:40:\"English (British Indian Ocean Territory)\";s:5:\"en_VG\";s:32:\"English (British Virgin Islands)\";s:5:\"en_BI\";s:17:\"English (Burundi)\";s:5:\"en_CM\";s:18:\"English (Cameroon)\";s:5:\"en_CA\";s:16:\"English (Canada)\";s:5:\"en_KY\";s:24:\"English (Cayman Islands)\";s:5:\"en_CX\";s:26:\"English (Christmas Island)\";s:5:\"en_CC\";s:33:\"English (Cocos (Keeling) Islands)\";s:5:\"en_CK\";s:22:\"English (Cook Islands)\";s:5:\"en_CY\";s:16:\"English (Cyprus)\";s:5:\"en_DK\";s:17:\"English (Denmark)\";s:5:\"en_DG\";s:22:\"English (Diego Garcia)\";s:5:\"en_DM\";s:18:\"English (Dominica)\";s:5:\"en_ER\";s:17:\"English (Eritrea)\";s:6:\"en_150\";s:16:\"English (Europe)\";s:5:\"en_FK\";s:26:\"English (Falkland Islands)\";s:5:\"en_FJ\";s:14:\"English (Fiji)\";s:5:\"en_FI\";s:17:\"English (Finland)\";s:5:\"en_GM\";s:16:\"English (Gambia)\";s:5:\"en_DE\";s:17:\"English (Germany)\";s:5:\"en_GH\";s:15:\"English (Ghana)\";s:5:\"en_GI\";s:19:\"English (Gibraltar)\";s:5:\"en_GD\";s:17:\"English (Grenada)\";s:5:\"en_GU\";s:14:\"English (Guam)\";s:5:\"en_GG\";s:18:\"English (Guernsey)\";s:5:\"en_GY\";s:16:\"English (Guyana)\";s:5:\"en_HK\";s:29:\"English (Hong Kong SAR China)\";s:5:\"en_IN\";s:15:\"English (India)\";s:5:\"en_IE\";s:17:\"English (Ireland)\";s:5:\"en_IM\";s:21:\"English (Isle of Man)\";s:5:\"en_IL\";s:16:\"English (Israel)\";s:5:\"en_JM\";s:17:\"English (Jamaica)\";s:5:\"en_JE\";s:16:\"English (Jersey)\";s:5:\"en_KE\";s:15:\"English (Kenya)\";s:5:\"en_KI\";s:18:\"English (Kiribati)\";s:5:\"en_LS\";s:17:\"English (Lesotho)\";s:5:\"en_LR\";s:17:\"English (Liberia)\";s:5:\"en_MO\";s:25:\"English (Macau SAR China)\";s:5:\"en_MG\";s:20:\"English (Madagascar)\";s:5:\"en_MW\";s:16:\"English (Malawi)\";s:5:\"en_MY\";s:18:\"English (Malaysia)\";s:5:\"en_MT\";s:15:\"English (Malta)\";s:5:\"en_MH\";s:26:\"English (Marshall Islands)\";s:5:\"en_MU\";s:19:\"English (Mauritius)\";s:5:\"en_FM\";s:20:\"English (Micronesia)\";s:5:\"en_MS\";s:20:\"English (Montserrat)\";s:5:\"en_NA\";s:17:\"English (Namibia)\";s:5:\"en_NR\";s:15:\"English (Nauru)\";s:5:\"en_NL\";s:21:\"English (Netherlands)\";s:5:\"en_NZ\";s:21:\"English (New Zealand)\";s:5:\"en_NG\";s:17:\"English (Nigeria)\";s:5:\"en_NU\";s:14:\"English (Niue)\";s:5:\"en_NF\";s:24:\"English (Norfolk Island)\";s:5:\"en_MP\";s:34:\"English (Northern Mariana Islands)\";s:5:\"en_PK\";s:18:\"English (Pakistan)\";s:5:\"en_PW\";s:15:\"English (Palau)\";s:5:\"en_PG\";s:26:\"English (Papua New Guinea)\";s:5:\"en_PH\";s:21:\"English (Philippines)\";s:5:\"en_PN\";s:26:\"English (Pitcairn Islands)\";s:5:\"en_PR\";s:21:\"English (Puerto Rico)\";s:5:\"en_RW\";s:16:\"English (Rwanda)\";s:5:\"en_WS\";s:15:\"English (Samoa)\";s:5:\"en_SC\";s:20:\"English (Seychelles)\";s:5:\"en_SL\";s:22:\"English (Sierra Leone)\";s:5:\"en_SG\";s:19:\"English (Singapore)\";s:5:\"en_SX\";s:22:\"English (Sint Maarten)\";s:5:\"en_SI\";s:18:\"English (Slovenia)\";s:5:\"en_SB\";s:25:\"English (Solomon Islands)\";s:5:\"en_ZA\";s:22:\"English (South Africa)\";s:5:\"en_SS\";s:21:\"English (South Sudan)\";s:5:\"en_SH\";s:20:\"English (St. Helena)\";s:5:\"en_KN\";s:27:\"English (St. Kitts & Nevis)\";s:5:\"en_LC\";s:19:\"English (St. Lucia)\";s:5:\"en_VC\";s:34:\"English (St. Vincent & Grenadines)\";s:5:\"en_SD\";s:15:\"English (Sudan)\";s:5:\"en_SZ\";s:19:\"English (Swaziland)\";s:5:\"en_SE\";s:16:\"English (Sweden)\";s:5:\"en_CH\";s:21:\"English (Switzerland)\";s:5:\"en_TZ\";s:18:\"English (Tanzania)\";s:5:\"en_TK\";s:17:\"English (Tokelau)\";s:5:\"en_TO\";s:15:\"English (Tonga)\";s:5:\"en_TT\";s:27:\"English (Trinidad & Tobago)\";s:5:\"en_TC\";s:32:\"English (Turks & Caicos Islands)\";s:5:\"en_TV\";s:16:\"English (Tuvalu)\";s:5:\"en_UM\";s:31:\"English (U.S. Outlying Islands)\";s:5:\"en_VI\";s:29:\"English (U.S. Virgin Islands)\";s:5:\"en_UG\";s:16:\"English (Uganda)\";s:5:\"en_GB\";s:24:\"English (United Kingdom)\";s:5:\"en_US\";s:23:\"English (United States)\";s:11:\"en_US_POSIX\";s:23:\"English (United States)\";s:5:\"en_VU\";s:17:\"English (Vanuatu)\";s:6:\"en_001\";s:15:\"English (World)\";s:5:\"en_ZM\";s:16:\"English (Zambia)\";s:5:\"en_ZW\";s:18:\"English (Zimbabwe)\";s:2:\"eo\";s:9:\"Esperanto\";s:2:\"et\";s:8:\"Estonian\";s:5:\"et_EE\";s:18:\"Estonian (Estonia)\";s:2:\"ee\";s:3:\"Ewe\";s:5:\"ee_GH\";s:11:\"Ewe (Ghana)\";s:5:\"ee_TG\";s:10:\"Ewe (Togo)\";s:3:\"ewo\";s:6:\"Ewondo\";s:6:\"ewo_CM\";s:17:\"Ewondo (Cameroon)\";s:2:\"fo\";s:7:\"Faroese\";s:5:\"fo_DK\";s:17:\"Faroese (Denmark)\";s:5:\"fo_FO\";s:23:\"Faroese (Faroe Islands)\";s:3:\"fil\";s:8:\"Filipino\";s:6:\"fil_PH\";s:22:\"Filipino (Philippines)\";s:2:\"fi\";s:7:\"Finnish\";s:5:\"fi_FI\";s:17:\"Finnish (Finland)\";s:2:\"fr\";s:6:\"French\";s:5:\"fr_DZ\";s:16:\"French (Algeria)\";s:5:\"fr_BE\";s:16:\"French (Belgium)\";s:5:\"fr_BJ\";s:14:\"French (Benin)\";s:5:\"fr_BF\";s:21:\"French (Burkina Faso)\";s:5:\"fr_BI\";s:16:\"French (Burundi)\";s:5:\"fr_CM\";s:17:\"French (Cameroon)\";s:5:\"fr_CA\";s:15:\"French (Canada)\";s:5:\"fr_CF\";s:33:\"French (Central African Republic)\";s:5:\"fr_TD\";s:13:\"French (Chad)\";s:5:\"fr_KM\";s:16:\"French (Comoros)\";s:5:\"fr_CG\";s:28:\"French (Congo - Brazzaville)\";s:5:\"fr_CD\";s:25:\"French (Congo - Kinshasa)\";s:5:\"fr_CI\";s:25:\"French (Côte d’Ivoire)\";s:5:\"fr_DJ\";s:17:\"French (Djibouti)\";s:5:\"fr_GQ\";s:26:\"French (Equatorial Guinea)\";s:5:\"fr_FR\";s:15:\"French (France)\";s:5:\"fr_GF\";s:22:\"French (French Guiana)\";s:5:\"fr_PF\";s:25:\"French (French Polynesia)\";s:5:\"fr_GA\";s:14:\"French (Gabon)\";s:5:\"fr_GP\";s:19:\"French (Guadeloupe)\";s:5:\"fr_GN\";s:15:\"French (Guinea)\";s:5:\"fr_HT\";s:14:\"French (Haiti)\";s:5:\"fr_LU\";s:19:\"French (Luxembourg)\";s:5:\"fr_MG\";s:19:\"French (Madagascar)\";s:5:\"fr_ML\";s:13:\"French (Mali)\";s:5:\"fr_MQ\";s:19:\"French (Martinique)\";s:5:\"fr_MR\";s:19:\"French (Mauritania)\";s:5:\"fr_MU\";s:18:\"French (Mauritius)\";s:5:\"fr_YT\";s:16:\"French (Mayotte)\";s:5:\"fr_MC\";s:15:\"French (Monaco)\";s:5:\"fr_MA\";s:16:\"French (Morocco)\";s:5:\"fr_NC\";s:22:\"French (New Caledonia)\";s:5:\"fr_NE\";s:14:\"French (Niger)\";s:5:\"fr_RW\";s:15:\"French (Rwanda)\";s:5:\"fr_RE\";s:17:\"French (Réunion)\";s:5:\"fr_SN\";s:16:\"French (Senegal)\";s:5:\"fr_SC\";s:19:\"French (Seychelles)\";s:5:\"fr_BL\";s:24:\"French (St. Barthélemy)\";s:5:\"fr_MF\";s:19:\"French (St. Martin)\";s:5:\"fr_PM\";s:30:\"French (St. Pierre & Miquelon)\";s:5:\"fr_CH\";s:20:\"French (Switzerland)\";s:5:\"fr_SY\";s:14:\"French (Syria)\";s:5:\"fr_TG\";s:13:\"French (Togo)\";s:5:\"fr_TN\";s:16:\"French (Tunisia)\";s:5:\"fr_VU\";s:16:\"French (Vanuatu)\";s:5:\"fr_WF\";s:24:\"French (Wallis & Futuna)\";s:3:\"fur\";s:8:\"Friulian\";s:6:\"fur_IT\";s:16:\"Friulian (Italy)\";s:2:\"ff\";s:5:\"Fulah\";s:2:\"gl\";s:8:\"Galician\";s:5:\"gl_ES\";s:16:\"Galician (Spain)\";s:2:\"lg\";s:5:\"Ganda\";s:5:\"lg_UG\";s:14:\"Ganda (Uganda)\";s:2:\"ka\";s:8:\"Georgian\";s:5:\"ka_GE\";s:18:\"Georgian (Georgia)\";s:2:\"de\";s:6:\"German\";s:5:\"de_AT\";s:16:\"German (Austria)\";s:5:\"de_BE\";s:16:\"German (Belgium)\";s:5:\"de_DE\";s:16:\"German (Germany)\";s:5:\"de_IT\";s:14:\"German (Italy)\";s:5:\"de_LI\";s:22:\"German (Liechtenstein)\";s:5:\"de_LU\";s:19:\"German (Luxembourg)\";s:5:\"de_CH\";s:20:\"German (Switzerland)\";s:2:\"el\";s:5:\"Greek\";s:5:\"el_CY\";s:14:\"Greek (Cyprus)\";s:5:\"el_GR\";s:14:\"Greek (Greece)\";s:2:\"gu\";s:8:\"Gujarati\";s:5:\"gu_IN\";s:16:\"Gujarati (India)\";s:3:\"guz\";s:5:\"Gusii\";s:6:\"guz_KE\";s:13:\"Gusii (Kenya)\";s:2:\"ha\";s:5:\"Hausa\";s:5:\"ha_GH\";s:13:\"Hausa (Ghana)\";s:5:\"ha_NE\";s:13:\"Hausa (Niger)\";s:5:\"ha_NG\";s:15:\"Hausa (Nigeria)\";s:3:\"haw\";s:8:\"Hawaiian\";s:6:\"haw_US\";s:24:\"Hawaiian (United States)\";s:2:\"he\";s:6:\"Hebrew\";s:5:\"he_IL\";s:15:\"Hebrew (Israel)\";s:2:\"hi\";s:5:\"Hindi\";s:5:\"hi_IN\";s:13:\"Hindi (India)\";s:2:\"hu\";s:9:\"Hungarian\";s:5:\"hu_HU\";s:19:\"Hungarian (Hungary)\";s:2:\"is\";s:9:\"Icelandic\";s:5:\"is_IS\";s:19:\"Icelandic (Iceland)\";s:2:\"ig\";s:4:\"Igbo\";s:5:\"ig_NG\";s:14:\"Igbo (Nigeria)\";s:3:\"smn\";s:10:\"Inari Sami\";s:6:\"smn_FI\";s:20:\"Inari Sami (Finland)\";s:2:\"id\";s:10:\"Indonesian\";s:5:\"id_ID\";s:22:\"Indonesian (Indonesia)\";s:2:\"ia\";s:11:\"Interlingua\";s:6:\"ia_001\";s:19:\"Interlingua (World)\";s:2:\"ga\";s:5:\"Irish\";s:5:\"ga_IE\";s:15:\"Irish (Ireland)\";s:2:\"it\";s:7:\"Italian\";s:5:\"it_IT\";s:15:\"Italian (Italy)\";s:5:\"it_SM\";s:20:\"Italian (San Marino)\";s:5:\"it_CH\";s:21:\"Italian (Switzerland)\";s:5:\"it_VA\";s:22:\"Italian (Vatican City)\";s:2:\"ja\";s:8:\"Japanese\";s:5:\"ja_JP\";s:16:\"Japanese (Japan)\";s:2:\"jv\";s:8:\"Javanese\";s:5:\"jv_ID\";s:20:\"Javanese (Indonesia)\";s:3:\"dyo\";s:10:\"Jola-Fonyi\";s:6:\"dyo_SN\";s:20:\"Jola-Fonyi (Senegal)\";s:3:\"kea\";s:12:\"Kabuverdianu\";s:6:\"kea_CV\";s:25:\"Kabuverdianu (Cape Verde)\";s:3:\"kab\";s:6:\"Kabyle\";s:6:\"kab_DZ\";s:16:\"Kabyle (Algeria)\";s:3:\"kkj\";s:4:\"Kako\";s:6:\"kkj_CM\";s:15:\"Kako (Cameroon)\";s:2:\"kl\";s:11:\"Kalaallisut\";s:5:\"kl_GL\";s:23:\"Kalaallisut (Greenland)\";s:3:\"kln\";s:8:\"Kalenjin\";s:6:\"kln_KE\";s:16:\"Kalenjin (Kenya)\";s:3:\"kam\";s:5:\"Kamba\";s:6:\"kam_KE\";s:13:\"Kamba (Kenya)\";s:2:\"kn\";s:7:\"Kannada\";s:5:\"kn_IN\";s:15:\"Kannada (India)\";s:2:\"ks\";s:8:\"Kashmiri\";s:5:\"ks_IN\";s:16:\"Kashmiri (India)\";s:2:\"kk\";s:6:\"Kazakh\";s:5:\"kk_KZ\";s:19:\"Kazakh (Kazakhstan)\";s:2:\"km\";s:5:\"Khmer\";s:5:\"km_KH\";s:16:\"Khmer (Cambodia)\";s:2:\"ki\";s:6:\"Kikuyu\";s:5:\"ki_KE\";s:14:\"Kikuyu (Kenya)\";s:2:\"rw\";s:11:\"Kinyarwanda\";s:5:\"rw_RW\";s:20:\"Kinyarwanda (Rwanda)\";s:3:\"kok\";s:7:\"Konkani\";s:6:\"kok_IN\";s:15:\"Konkani (India)\";s:2:\"ko\";s:6:\"Korean\";s:5:\"ko_KP\";s:20:\"Korean (North Korea)\";s:5:\"ko_KR\";s:20:\"Korean (South Korea)\";s:3:\"khq\";s:12:\"Koyra Chiini\";s:6:\"khq_ML\";s:19:\"Koyra Chiini (Mali)\";s:3:\"ses\";s:15:\"Koyraboro Senni\";s:6:\"ses_ML\";s:22:\"Koyraboro Senni (Mali)\";s:2:\"ku\";s:7:\"Kurdish\";s:5:\"ku_TR\";s:16:\"Kurdish (Turkey)\";s:3:\"nmg\";s:6:\"Kwasio\";s:6:\"nmg_CM\";s:17:\"Kwasio (Cameroon)\";s:2:\"ky\";s:6:\"Kyrgyz\";s:5:\"ky_KG\";s:19:\"Kyrgyz (Kyrgyzstan)\";s:3:\"lkt\";s:6:\"Lakota\";s:6:\"lkt_US\";s:22:\"Lakota (United States)\";s:3:\"lag\";s:5:\"Langi\";s:6:\"lag_TZ\";s:16:\"Langi (Tanzania)\";s:2:\"lo\";s:3:\"Lao\";s:5:\"lo_LA\";s:10:\"Lao (Laos)\";s:2:\"lv\";s:7:\"Latvian\";s:5:\"lv_LV\";s:16:\"Latvian (Latvia)\";s:2:\"ln\";s:7:\"Lingala\";s:5:\"ln_AO\";s:16:\"Lingala (Angola)\";s:5:\"ln_CF\";s:34:\"Lingala (Central African Republic)\";s:5:\"ln_CG\";s:29:\"Lingala (Congo - Brazzaville)\";s:5:\"ln_CD\";s:26:\"Lingala (Congo - Kinshasa)\";s:2:\"lt\";s:10:\"Lithuanian\";s:5:\"lt_LT\";s:22:\"Lithuanian (Lithuania)\";s:3:\"nds\";s:10:\"Low German\";s:6:\"nds_DE\";s:20:\"Low German (Germany)\";s:6:\"nds_NL\";s:24:\"Low German (Netherlands)\";s:3:\"dsb\";s:13:\"Lower Sorbian\";s:6:\"dsb_DE\";s:23:\"Lower Sorbian (Germany)\";s:2:\"lu\";s:12:\"Luba-Katanga\";s:5:\"lu_CD\";s:31:\"Luba-Katanga (Congo - Kinshasa)\";s:3:\"luo\";s:3:\"Luo\";s:6:\"luo_KE\";s:11:\"Luo (Kenya)\";s:2:\"lb\";s:13:\"Luxembourgish\";s:5:\"lb_LU\";s:26:\"Luxembourgish (Luxembourg)\";s:3:\"luy\";s:5:\"Luyia\";s:6:\"luy_KE\";s:13:\"Luyia (Kenya)\";s:2:\"mk\";s:10:\"Macedonian\";s:5:\"mk_MK\";s:22:\"Macedonian (Macedonia)\";s:3:\"jmc\";s:7:\"Machame\";s:6:\"jmc_TZ\";s:18:\"Machame (Tanzania)\";s:3:\"mgh\";s:14:\"Makhuwa-Meetto\";s:6:\"mgh_MZ\";s:27:\"Makhuwa-Meetto (Mozambique)\";s:3:\"kde\";s:7:\"Makonde\";s:6:\"kde_TZ\";s:18:\"Makonde (Tanzania)\";s:2:\"mg\";s:8:\"Malagasy\";s:5:\"mg_MG\";s:21:\"Malagasy (Madagascar)\";s:2:\"ms\";s:5:\"Malay\";s:5:\"ms_BN\";s:14:\"Malay (Brunei)\";s:5:\"ms_MY\";s:16:\"Malay (Malaysia)\";s:5:\"ms_SG\";s:17:\"Malay (Singapore)\";s:2:\"ml\";s:9:\"Malayalam\";s:5:\"ml_IN\";s:17:\"Malayalam (India)\";s:2:\"mt\";s:7:\"Maltese\";s:5:\"mt_MT\";s:15:\"Maltese (Malta)\";s:2:\"gv\";s:4:\"Manx\";s:5:\"gv_IM\";s:18:\"Manx (Isle of Man)\";s:2:\"mi\";s:5:\"Maori\";s:5:\"mi_NZ\";s:19:\"Maori (New Zealand)\";s:2:\"mr\";s:7:\"Marathi\";s:5:\"mr_IN\";s:15:\"Marathi (India)\";s:3:\"mas\";s:5:\"Masai\";s:6:\"mas_KE\";s:13:\"Masai (Kenya)\";s:6:\"mas_TZ\";s:16:\"Masai (Tanzania)\";s:3:\"mzn\";s:11:\"Mazanderani\";s:6:\"mzn_IR\";s:18:\"Mazanderani (Iran)\";s:3:\"mer\";s:4:\"Meru\";s:6:\"mer_KE\";s:12:\"Meru (Kenya)\";s:3:\"mgo\";s:6:\"Metaʼ\";s:6:\"mgo_CM\";s:17:\"Metaʼ (Cameroon)\";s:2:\"mn\";s:9:\"Mongolian\";s:5:\"mn_MN\";s:20:\"Mongolian (Mongolia)\";s:3:\"mfe\";s:8:\"Morisyen\";s:6:\"mfe_MU\";s:20:\"Morisyen (Mauritius)\";s:3:\"mua\";s:7:\"Mundang\";s:6:\"mua_CM\";s:18:\"Mundang (Cameroon)\";s:3:\"naq\";s:4:\"Nama\";s:6:\"naq_NA\";s:14:\"Nama (Namibia)\";s:2:\"ne\";s:6:\"Nepali\";s:5:\"ne_IN\";s:14:\"Nepali (India)\";s:5:\"ne_NP\";s:14:\"Nepali (Nepal)\";s:3:\"nnh\";s:9:\"Ngiemboon\";s:6:\"nnh_CM\";s:20:\"Ngiemboon (Cameroon)\";s:3:\"jgo\";s:6:\"Ngomba\";s:6:\"jgo_CM\";s:17:\"Ngomba (Cameroon)\";s:2:\"nd\";s:13:\"North Ndebele\";s:5:\"nd_ZW\";s:24:\"North Ndebele (Zimbabwe)\";s:3:\"lrc\";s:13:\"Northern Luri\";s:6:\"lrc_IR\";s:20:\"Northern Luri (Iran)\";s:6:\"lrc_IQ\";s:20:\"Northern Luri (Iraq)\";s:2:\"se\";s:13:\"Northern Sami\";s:5:\"se_FI\";s:23:\"Northern Sami (Finland)\";s:5:\"se_NO\";s:22:\"Northern Sami (Norway)\";s:5:\"se_SE\";s:22:\"Northern Sami (Sweden)\";s:2:\"nb\";s:17:\"Norwegian Bokmål\";s:5:\"nb_NO\";s:26:\"Norwegian Bokmål (Norway)\";s:5:\"nb_SJ\";s:40:\"Norwegian Bokmål (Svalbard & Jan Mayen)\";s:2:\"nn\";s:17:\"Norwegian Nynorsk\";s:5:\"nn_NO\";s:26:\"Norwegian Nynorsk (Norway)\";s:3:\"nus\";s:4:\"Nuer\";s:6:\"nus_SS\";s:18:\"Nuer (South Sudan)\";s:3:\"nyn\";s:8:\"Nyankole\";s:6:\"nyn_UG\";s:17:\"Nyankole (Uganda)\";s:2:\"or\";s:4:\"Odia\";s:5:\"or_IN\";s:12:\"Odia (India)\";s:2:\"om\";s:5:\"Oromo\";s:5:\"om_ET\";s:16:\"Oromo (Ethiopia)\";s:5:\"om_KE\";s:13:\"Oromo (Kenya)\";s:2:\"os\";s:7:\"Ossetic\";s:5:\"os_GE\";s:17:\"Ossetic (Georgia)\";s:5:\"os_RU\";s:16:\"Ossetic (Russia)\";s:2:\"ps\";s:6:\"Pashto\";s:5:\"ps_AF\";s:20:\"Pashto (Afghanistan)\";s:2:\"fa\";s:7:\"Persian\";s:5:\"fa_AF\";s:21:\"Persian (Afghanistan)\";s:5:\"fa_IR\";s:14:\"Persian (Iran)\";s:2:\"pl\";s:6:\"Polish\";s:5:\"pl_PL\";s:15:\"Polish (Poland)\";s:2:\"pt\";s:10:\"Portuguese\";s:5:\"pt_AO\";s:19:\"Portuguese (Angola)\";s:5:\"pt_BR\";s:19:\"Portuguese (Brazil)\";s:5:\"pt_CV\";s:23:\"Portuguese (Cape Verde)\";s:5:\"pt_GQ\";s:30:\"Portuguese (Equatorial Guinea)\";s:5:\"pt_GW\";s:26:\"Portuguese (Guinea-Bissau)\";s:5:\"pt_LU\";s:23:\"Portuguese (Luxembourg)\";s:5:\"pt_MO\";s:28:\"Portuguese (Macau SAR China)\";s:5:\"pt_MZ\";s:23:\"Portuguese (Mozambique)\";s:5:\"pt_PT\";s:21:\"Portuguese (Portugal)\";s:5:\"pt_CH\";s:24:\"Portuguese (Switzerland)\";s:5:\"pt_ST\";s:35:\"Portuguese (São Tomé & Príncipe)\";s:5:\"pt_TL\";s:24:\"Portuguese (Timor-Leste)\";s:2:\"pa\";s:7:\"Punjabi\";s:7:\"pa_Arab\";s:7:\"Punjabi\";s:7:\"pa_Guru\";s:7:\"Punjabi\";s:10:\"pa_Guru_IN\";s:15:\"Punjabi (India)\";s:10:\"pa_Arab_PK\";s:18:\"Punjabi (Pakistan)\";s:2:\"qu\";s:7:\"Quechua\";s:5:\"qu_BO\";s:17:\"Quechua (Bolivia)\";s:5:\"qu_EC\";s:17:\"Quechua (Ecuador)\";s:5:\"qu_PE\";s:14:\"Quechua (Peru)\";s:2:\"ro\";s:8:\"Romanian\";s:5:\"ro_MD\";s:18:\"Romanian (Moldova)\";s:5:\"ro_RO\";s:18:\"Romanian (Romania)\";s:2:\"rm\";s:7:\"Romansh\";s:5:\"rm_CH\";s:21:\"Romansh (Switzerland)\";s:3:\"rof\";s:5:\"Rombo\";s:6:\"rof_TZ\";s:16:\"Rombo (Tanzania)\";s:2:\"rn\";s:5:\"Rundi\";s:5:\"rn_BI\";s:15:\"Rundi (Burundi)\";s:2:\"ru\";s:7:\"Russian\";s:5:\"ru_BY\";s:17:\"Russian (Belarus)\";s:5:\"ru_KZ\";s:20:\"Russian (Kazakhstan)\";s:5:\"ru_KG\";s:20:\"Russian (Kyrgyzstan)\";s:5:\"ru_MD\";s:17:\"Russian (Moldova)\";s:5:\"ru_RU\";s:16:\"Russian (Russia)\";s:5:\"ru_UA\";s:17:\"Russian (Ukraine)\";s:3:\"rwk\";s:3:\"Rwa\";s:6:\"rwk_TZ\";s:14:\"Rwa (Tanzania)\";s:3:\"sah\";s:5:\"Sakha\";s:6:\"sah_RU\";s:14:\"Sakha (Russia)\";s:3:\"saq\";s:7:\"Samburu\";s:6:\"saq_KE\";s:15:\"Samburu (Kenya)\";s:2:\"sg\";s:5:\"Sango\";s:5:\"sg_CF\";s:32:\"Sango (Central African Republic)\";s:3:\"sbp\";s:5:\"Sangu\";s:6:\"sbp_TZ\";s:16:\"Sangu (Tanzania)\";s:2:\"gd\";s:15:\"Scottish Gaelic\";s:5:\"gd_GB\";s:32:\"Scottish Gaelic (United Kingdom)\";s:3:\"seh\";s:4:\"Sena\";s:6:\"seh_MZ\";s:17:\"Sena (Mozambique)\";s:2:\"sr\";s:7:\"Serbian\";s:7:\"sr_Cyrl\";s:7:\"Serbian\";s:7:\"sr_Latn\";s:7:\"Serbian\";s:10:\"sr_Cyrl_BA\";s:30:\"Serbian (Bosnia & Herzegovina)\";s:10:\"sr_Latn_BA\";s:30:\"Serbian (Bosnia & Herzegovina)\";s:10:\"sr_Cyrl_XK\";s:16:\"Serbian (Kosovo)\";s:10:\"sr_Latn_XK\";s:16:\"Serbian (Kosovo)\";s:10:\"sr_Cyrl_ME\";s:20:\"Serbian (Montenegro)\";s:10:\"sr_Latn_ME\";s:20:\"Serbian (Montenegro)\";s:10:\"sr_Cyrl_RS\";s:16:\"Serbian (Serbia)\";s:10:\"sr_Latn_RS\";s:16:\"Serbian (Serbia)\";s:3:\"ksb\";s:8:\"Shambala\";s:6:\"ksb_TZ\";s:19:\"Shambala (Tanzania)\";s:2:\"sn\";s:5:\"Shona\";s:5:\"sn_ZW\";s:16:\"Shona (Zimbabwe)\";s:2:\"ii\";s:10:\"Sichuan Yi\";s:5:\"ii_CN\";s:18:\"Sichuan Yi (China)\";s:2:\"sd\";s:6:\"Sindhi\";s:5:\"sd_PK\";s:17:\"Sindhi (Pakistan)\";s:2:\"si\";s:7:\"Sinhala\";s:5:\"si_LK\";s:19:\"Sinhala (Sri Lanka)\";s:2:\"sk\";s:6:\"Slovak\";s:5:\"sk_SK\";s:17:\"Slovak (Slovakia)\";s:2:\"sl\";s:9:\"Slovenian\";s:5:\"sl_SI\";s:20:\"Slovenian (Slovenia)\";s:3:\"xog\";s:4:\"Soga\";s:6:\"xog_UG\";s:13:\"Soga (Uganda)\";s:2:\"so\";s:6:\"Somali\";s:5:\"so_DJ\";s:17:\"Somali (Djibouti)\";s:5:\"so_ET\";s:17:\"Somali (Ethiopia)\";s:5:\"so_KE\";s:14:\"Somali (Kenya)\";s:5:\"so_SO\";s:16:\"Somali (Somalia)\";s:2:\"es\";s:7:\"Spanish\";s:5:\"es_AR\";s:19:\"Spanish (Argentina)\";s:5:\"es_BZ\";s:16:\"Spanish (Belize)\";s:5:\"es_BO\";s:17:\"Spanish (Bolivia)\";s:5:\"es_BR\";s:16:\"Spanish (Brazil)\";s:5:\"es_IC\";s:24:\"Spanish (Canary Islands)\";s:5:\"es_EA\";s:25:\"Spanish (Ceuta & Melilla)\";s:5:\"es_CL\";s:15:\"Spanish (Chile)\";s:5:\"es_CO\";s:18:\"Spanish (Colombia)\";s:5:\"es_CR\";s:20:\"Spanish (Costa Rica)\";s:5:\"es_CU\";s:14:\"Spanish (Cuba)\";s:5:\"es_DO\";s:28:\"Spanish (Dominican Republic)\";s:5:\"es_EC\";s:17:\"Spanish (Ecuador)\";s:5:\"es_SV\";s:21:\"Spanish (El Salvador)\";s:5:\"es_GQ\";s:27:\"Spanish (Equatorial Guinea)\";s:5:\"es_GT\";s:19:\"Spanish (Guatemala)\";s:5:\"es_HN\";s:18:\"Spanish (Honduras)\";s:6:\"es_419\";s:23:\"Spanish (Latin America)\";s:5:\"es_MX\";s:16:\"Spanish (Mexico)\";s:5:\"es_NI\";s:19:\"Spanish (Nicaragua)\";s:5:\"es_PA\";s:16:\"Spanish (Panama)\";s:5:\"es_PY\";s:18:\"Spanish (Paraguay)\";s:5:\"es_PE\";s:14:\"Spanish (Peru)\";s:5:\"es_PH\";s:21:\"Spanish (Philippines)\";s:5:\"es_PR\";s:21:\"Spanish (Puerto Rico)\";s:5:\"es_ES\";s:15:\"Spanish (Spain)\";s:5:\"es_US\";s:23:\"Spanish (United States)\";s:5:\"es_UY\";s:17:\"Spanish (Uruguay)\";s:5:\"es_VE\";s:19:\"Spanish (Venezuela)\";s:3:\"zgh\";s:27:\"Standard Moroccan Tamazight\";s:6:\"zgh_MA\";s:37:\"Standard Moroccan Tamazight (Morocco)\";s:2:\"sw\";s:7:\"Swahili\";s:5:\"sw_CD\";s:26:\"Swahili (Congo - Kinshasa)\";s:5:\"sw_KE\";s:15:\"Swahili (Kenya)\";s:5:\"sw_TZ\";s:18:\"Swahili (Tanzania)\";s:5:\"sw_UG\";s:16:\"Swahili (Uganda)\";s:2:\"sv\";s:7:\"Swedish\";s:5:\"sv_FI\";s:17:\"Swedish (Finland)\";s:5:\"sv_SE\";s:16:\"Swedish (Sweden)\";s:5:\"sv_AX\";s:24:\"Swedish (Åland Islands)\";s:3:\"gsw\";s:12:\"Swiss German\";s:6:\"gsw_FR\";s:21:\"Swiss German (France)\";s:6:\"gsw_LI\";s:28:\"Swiss German (Liechtenstein)\";s:6:\"gsw_CH\";s:26:\"Swiss German (Switzerland)\";s:3:\"shi\";s:9:\"Tachelhit\";s:8:\"shi_Latn\";s:9:\"Tachelhit\";s:8:\"shi_Tfng\";s:9:\"Tachelhit\";s:11:\"shi_Latn_MA\";s:19:\"Tachelhit (Morocco)\";s:11:\"shi_Tfng_MA\";s:19:\"Tachelhit (Morocco)\";s:3:\"dav\";s:5:\"Taita\";s:6:\"dav_KE\";s:13:\"Taita (Kenya)\";s:2:\"tg\";s:5:\"Tajik\";s:5:\"tg_TJ\";s:18:\"Tajik (Tajikistan)\";s:2:\"ta\";s:5:\"Tamil\";s:5:\"ta_IN\";s:13:\"Tamil (India)\";s:5:\"ta_MY\";s:16:\"Tamil (Malaysia)\";s:5:\"ta_SG\";s:17:\"Tamil (Singapore)\";s:5:\"ta_LK\";s:17:\"Tamil (Sri Lanka)\";s:3:\"twq\";s:7:\"Tasawaq\";s:6:\"twq_NE\";s:15:\"Tasawaq (Niger)\";s:2:\"tt\";s:5:\"Tatar\";s:5:\"tt_RU\";s:14:\"Tatar (Russia)\";s:2:\"te\";s:6:\"Telugu\";s:5:\"te_IN\";s:14:\"Telugu (India)\";s:3:\"teo\";s:4:\"Teso\";s:6:\"teo_KE\";s:12:\"Teso (Kenya)\";s:6:\"teo_UG\";s:13:\"Teso (Uganda)\";s:2:\"th\";s:4:\"Thai\";s:5:\"th_TH\";s:15:\"Thai (Thailand)\";s:2:\"bo\";s:7:\"Tibetan\";s:5:\"bo_CN\";s:15:\"Tibetan (China)\";s:5:\"bo_IN\";s:15:\"Tibetan (India)\";s:2:\"ti\";s:8:\"Tigrinya\";s:5:\"ti_ER\";s:18:\"Tigrinya (Eritrea)\";s:5:\"ti_ET\";s:19:\"Tigrinya (Ethiopia)\";s:2:\"to\";s:6:\"Tongan\";s:5:\"to_TO\";s:14:\"Tongan (Tonga)\";s:2:\"tr\";s:7:\"Turkish\";s:5:\"tr_CY\";s:16:\"Turkish (Cyprus)\";s:5:\"tr_TR\";s:16:\"Turkish (Turkey)\";s:2:\"tk\";s:7:\"Turkmen\";s:5:\"tk_TM\";s:22:\"Turkmen (Turkmenistan)\";s:2:\"uk\";s:9:\"Ukrainian\";s:5:\"uk_UA\";s:19:\"Ukrainian (Ukraine)\";s:3:\"hsb\";s:13:\"Upper Sorbian\";s:6:\"hsb_DE\";s:23:\"Upper Sorbian (Germany)\";s:2:\"ur\";s:4:\"Urdu\";s:5:\"ur_IN\";s:12:\"Urdu (India)\";s:5:\"ur_PK\";s:15:\"Urdu (Pakistan)\";s:2:\"ug\";s:6:\"Uyghur\";s:5:\"ug_CN\";s:14:\"Uyghur (China)\";s:2:\"uz\";s:5:\"Uzbek\";s:7:\"uz_Arab\";s:5:\"Uzbek\";s:7:\"uz_Cyrl\";s:5:\"Uzbek\";s:7:\"uz_Latn\";s:5:\"Uzbek\";s:10:\"uz_Arab_AF\";s:19:\"Uzbek (Afghanistan)\";s:10:\"uz_Cyrl_UZ\";s:18:\"Uzbek (Uzbekistan)\";s:10:\"uz_Latn_UZ\";s:18:\"Uzbek (Uzbekistan)\";s:3:\"vai\";s:3:\"Vai\";s:8:\"vai_Latn\";s:3:\"Vai\";s:8:\"vai_Vaii\";s:3:\"Vai\";s:11:\"vai_Latn_LR\";s:13:\"Vai (Liberia)\";s:11:\"vai_Vaii_LR\";s:13:\"Vai (Liberia)\";s:2:\"vi\";s:10:\"Vietnamese\";s:5:\"vi_VN\";s:20:\"Vietnamese (Vietnam)\";s:3:\"vun\";s:5:\"Vunjo\";s:6:\"vun_TZ\";s:16:\"Vunjo (Tanzania)\";s:3:\"wae\";s:6:\"Walser\";s:6:\"wae_CH\";s:20:\"Walser (Switzerland)\";s:2:\"cy\";s:5:\"Welsh\";s:5:\"cy_GB\";s:22:\"Welsh (United Kingdom)\";s:2:\"fy\";s:15:\"Western Frisian\";s:5:\"fy_NL\";s:29:\"Western Frisian (Netherlands)\";s:2:\"wo\";s:5:\"Wolof\";s:5:\"wo_SN\";s:15:\"Wolof (Senegal)\";s:2:\"xh\";s:5:\"Xhosa\";s:5:\"xh_ZA\";s:20:\"Xhosa (South Africa)\";s:3:\"yav\";s:7:\"Yangben\";s:6:\"yav_CM\";s:18:\"Yangben (Cameroon)\";s:2:\"yi\";s:7:\"Yiddish\";s:6:\"yi_001\";s:15:\"Yiddish (World)\";s:2:\"yo\";s:6:\"Yoruba\";s:5:\"yo_BJ\";s:14:\"Yoruba (Benin)\";s:5:\"yo_NG\";s:16:\"Yoruba (Nigeria)\";s:3:\"dje\";s:5:\"Zarma\";s:6:\"dje_NE\";s:13:\"Zarma (Niger)\";s:2:\"zu\";s:4:\"Zulu\";s:5:\"zu_ZA\";s:19:\"Zulu (South Africa)\";}\";',	31536000,	1620840093),
(UNHEX('7472616E736C617465007461677300'),	'i:29;',	NULL,	1621015391),
(UNHEX('7472616E736C6174696F6E5F646174615F3265333634643331356164356164393834363039653766346265656466306637'),	's:95041:\"O:46:\"Symfony\\Component\\Translation\\MessageCatalogue\":6:{s:56:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0messages\";a:2:{s:5:\"admin\";a:1732:{s:15:\"__pimcore_dummy\";s:12:\"only_a_dummy\";s:17:\"validation_failed\";s:18:\"Validation Failed!\";s:10:\"deprecated\";s:10:\"Deprecated\";s:13:\"access_denied\";s:14:\"Access Denied!\";s:25:\"access_denied_description\";s:88:\"You don\'t have sufficient permissions to open the element or perform the desired action.\";s:11:\"quicksearch\";s:12:\"Quick Search\";s:34:\"you_can_only_drop_one_element_here\";s:35:\"You can only drop one element here!\";s:12:\"grid_options\";s:12:\"Grid Options\";s:16:\"open_data_object\";s:16:\"Open Data Object\";s:12:\"data_objects\";s:12:\"Data Objects\";s:29:\"asset_type_change_not_allowed\";s:127:\"<strong>Only assets of same type are allowed here.</strong><br/>[ type of uploaded asset: \"%s\" | type of existing asset: \"%s\" ]\";s:19:\"unsupported_feature\";s:54:\"Unsupported feature! Please check system requirements!\";s:18:\"upload_new_version\";s:18:\"Upload new version\";s:20:\"screen_size_to_small\";s:56:\"Your screen is too small to display the desired preview.\";s:32:\"too_many_children_for_recyclebin\";s:105:\"This element contains too many children to be moved to the recycle bin so it will be deleted permanentely\";s:7:\"default\";s:7:\"Default\";s:4:\"data\";s:4:\"Data\";s:8:\"metadata\";s:8:\"Metadata\";s:15:\"custom_metadata\";s:15:\"Custom Metadata\";s:12:\"invalid_name\";s:12:\"Invalid name\";s:30:\"login_token_invalid_user_error\";s:13:\"Invalid user.\";s:41:\"login_token_as_admin_non_admin_user_error\";s:55:\"Only admin users are allowed to login as an admin user.\";s:29:\"login_token_no_password_error\";s:25:\"User has no password set.\";s:13:\"email_address\";s:13:\"Email Address\";s:15:\"email_blacklist\";s:15:\"Email Blacklist\";s:17:\"targeting_toolbar\";s:17:\"Targeting Toolbar\";s:2:\"OK\";s:2:\"OK\";s:32:\"search_replace_assignments_error\";s:59:\"Please select items where to replace and a new target item.\";s:40:\"replace_assignments_in_selected_elements\";s:40:\"Replace assignments in selected elements\";s:35:\"replace_assignments_in_all_elements\";s:35:\"Replace assignments in all elements\";s:26:\"search_replace_assignments\";s:28:\"Search & Replace Assignments\";s:13:\"imageadvanced\";s:14:\"Image Advanced\";s:21:\"filter_active_message\";s:47:\"Do you want to export only the filtered values?\";s:12:\"close_others\";s:12:\"Close Others\";s:9:\"close_all\";s:9:\"Close All\";s:5:\"clone\";s:5:\"Clone\";s:16:\"close_unmodified\";s:16:\"Close Unmodified\";s:7:\"classid\";s:8:\"Class ID\";s:8:\"parentid\";s:9:\"Parent ID\";s:8:\"mimetype\";s:9:\"MIME-Type\";s:12:\"creationdate\";s:13:\"Creation Date\";s:16:\"usermodification\";s:17:\"User Modification\";s:9:\"userowner\";s:5:\"Owner\";s:9:\"languages\";s:9:\"Languages\";s:24:\"password_was_not_changed\";s:54:\"Password wasn\'t changed because it isn\'t secure enough\";s:9:\"marketing\";s:9:\"Marketing\";s:29:\"clear_content_of_current_view\";s:29:\"Clear content of current view\";s:27:\"highlight_editable_elements\";s:27:\"Highlight editable elements\";s:8:\"continue\";s:8:\"Continue\";s:24:\"you_have_unsaved_changes\";s:25:\"You have unsaved changes.\";s:38:\"clear_content_of_selected_target_group\";s:38:\"Clear content of selected Target Group\";s:86:\"visitors_of_this_page_will_be_automatically_associated_with_the_selected_target_groups\";s:86:\"Visitors of this page will be automatically associated with the selected Target Groups\";s:19:\"assign_target_group\";s:19:\"Assign Target Group\";s:20:\"assign_target_groups\";s:20:\"Assign Target Groups\";s:13:\"target_groups\";s:13:\"Target Groups\";s:29:\"edit_content_for_target_group\";s:29:\"Edit Content for Target Group\";s:22:\"global_targeting_rules\";s:22:\"Global Targeting Rules\";s:15:\"personalization\";s:15:\"Personalization\";s:19:\"shared_translations\";s:19:\"Shared Translations\";s:9:\"textfield\";s:9:\"Textfield\";s:8:\"add_data\";s:8:\"Add data\";s:11:\"add_hotspot\";s:11:\"Add hotspot\";s:10:\"add_marker\";s:10:\"Add marker\";s:22:\"add_marker_or_hotspots\";s:22:\"Add marker or hotspots\";s:30:\"enter_the_name_of_the_new_item\";s:30:\"Enter the name of the new item\";s:14:\"custom_reports\";s:14:\"Custom Reports\";s:10:\"start_date\";s:10:\"Start date\";s:19:\"start_date_relative\";s:30:\"Start date (relative to today)\";s:8:\"end_date\";s:8:\"End date\";s:17:\"end_date_relative\";s:28:\"End date (relative to today)\";s:25:\"relative_date_description\";s:40:\"i.e. -1m +1d (d=days, m=months, y=years)\";s:17:\"source_definition\";s:17:\"Source Definition\";s:16:\"clear_thumbnails\";s:16:\"Clear Thumbnails\";s:10:\"recipients\";s:10:\"Recipients\";s:21:\"newsletter_send_error\";s:62:\"Can\'t send your newsletter, please contact your administrator!\";s:23:\"newsletter_sent_message\";s:154:\"Your newsletter is now sent to all recipients, this process is done in the background (you can close pimcore in the meantime) and can take up to one hour.\";s:59:\"do_you_really_want_to_send_the_newsletter_to_all_recipients\";s:59:\"Do you really want to send the newsletter to all recipients\";s:20:\"send_test_newsletter\";s:20:\"Send Test-Newsletter\";s:15:\"send_newsletter\";s:19:\"Send Newsletter Now\";s:13:\"object_filter\";s:13:\"Object Filter\";s:14:\"add_newsletter\";s:14:\"Add Newsletter\";s:10:\"plain_text\";s:10:\"Plain Text\";s:21:\"plain_text_email_part\";s:21:\"Email Plain Text Part\";s:10:\"newsletter\";s:10:\"Newsletter\";s:3:\"crm\";s:3:\"CRM\";s:12:\"notes_events\";s:18:\"Notes &amp; Events\";s:13:\"delete_folder\";s:13:\"Delete Folder\";s:4:\"home\";s:4:\"Home\";s:9:\"html_tags\";s:9:\"HTML-Tags\";s:7:\"subject\";s:7:\"Subject\";s:12:\"poster_image\";s:12:\"Poster-Image\";s:6:\"tablet\";s:6:\"Tablet\";s:8:\"hardlink\";s:8:\"Hardlink\";s:10:\"convert_to\";s:10:\"Convert to\";s:7:\"replace\";s:7:\"Replace\";s:9:\"targeting\";s:9:\"Targeting\";s:7:\"content\";s:7:\"Content\";s:17:\"paste_inheritance\";s:19:\"Paste (inheritance)\";s:12:\"are_you_sure\";s:13:\"Are you sure?\";s:24:\"all_content_will_be_lost\";s:24:\"All content will be lost\";s:23:\"content_master_document\";s:23:\"Content-Master Document\";s:9:\"overwrite\";s:9:\"Overwrite\";s:24:\"click_right_to_overwrite\";s:24:\"Click right to overwrite\";s:19:\"open_document_by_id\";s:13:\"Open Document\";s:16:\"open_asset_by_id\";s:10:\"Open Asset\";s:17:\"open_object_by_id\";s:11:\"Open Object\";s:8:\"open_url\";s:8:\"Open URL\";s:17:\"element_not_found\";s:17:\"Element not found\";s:15:\"import_from_url\";s:15:\"Import from URL\";s:40:\"do_you_really_want_to_leave_the_editmode\";s:46:\"Do you really want to leave the editmode (NO!)\";s:31:\"or_specify_an_asset_image_below\";s:31:\"or specify an asset image below\";s:18:\"saved_successfully\";s:19:\"Saved successfully!\";s:8:\"qr_codes\";s:8:\"QR-Codes\";s:7:\"element\";s:7:\"Element\";s:26:\"details_for_selected_event\";s:28:\"Details for selected element\";s:6:\"fields\";s:6:\"Fields\";s:24:\"not_possible_with_paging\";s:112:\"Sorry, this is not possible in elements which are paged, try to restructure your data to avoid pages in the tree\";s:9:\"inherited\";s:9:\"Inherited\";s:6:\"length\";s:6:\"Length\";s:12:\"show_in_tree\";s:12:\"Show in Tree\";s:10:\"exactmatch\";s:11:\"exact match\";s:7:\"desktop\";s:7:\"Desktop\";s:7:\"drag_me\";s:7:\"Drag Me\";s:10:\"serverVars\";s:16:\"Server Variables\";s:11:\"http_errors\";s:11:\"HTTP Errors\";s:10:\"attributes\";s:10:\"Attributes\";s:4:\"code\";s:4:\"Code\";s:4:\"tags\";s:4:\"Tags\";s:21:\"Click here to proceed\";s:21:\"Click here to proceed\";s:98:\"Your browser is not supported. Please install the latest version of one of the following browsers.\";s:98:\"Your browser is not supported. Please install the latest version of one of the following browsers.\";s:18:\"open_in_new_window\";s:18:\"Open in new Window\";s:26:\"open_preview_in_new_window\";s:26:\"Open preview in new window\";s:13:\"limit_reached\";s:13:\"Limit reached\";s:13:\"casesensitive\";s:14:\"case-sensitive\";s:12:\"path_aliases\";s:12:\"Path Aliases\";s:4:\"path\";s:4:\"Path\";s:16:\"create_redirects\";s:55:\"Create redirects to keep URLs working (incl. children)?\";s:11:\"auto_create\";s:11:\"Auto create\";s:10:\"pretty_url\";s:10:\"Pretty URL\";s:16:\"pretty_url_label\";s:47:\"Pretty URL (overrides path from tree-structure)\";s:26:\"search_engine_optimization\";s:26:\"Search Engine Optimization\";s:26:\"password_cannot_be_changed\";s:26:\"Password cannot be changed\";s:12:\"old_password\";s:12:\"Old Password\";s:12:\"new_password\";s:12:\"New Password\";s:15:\"retype_password\";s:15:\"Retype Password\";s:19:\"seo_document_editor\";s:19:\"SEO Document Editor\";s:21:\"clear_temporary_files\";s:21:\"Clear temporary files\";s:7:\"reports\";s:7:\"Reports\";s:5:\"roles\";s:5:\"Roles\";s:4:\"send\";s:4:\"Send\";s:8:\"Password\";s:8:\"Password\";s:20:\"Forgot your password\";s:20:\"Forgot your password\";s:13:\"Back to Login\";s:13:\"Back to Login\";s:76:\"Enter your username and pimcore will send a login link to your email address\";s:76:\"Enter your username and Pimcore will send a login link to your email address\";s:26:\"Please check your mailbox.\";s:26:\"Please check your mailbox.\";s:5:\"Login\";s:5:\"Login\";s:6:\"Submit\";s:6:\"Submit\";s:59:\"A temporary login link has been sent to your email address.\";s:59:\"A temporary login link has been sent to your email address.\";s:38:\"use_current_player_position_as_preview\";s:38:\"Use current player position as preview\";s:20:\"select_image_preview\";s:20:\"Select Image Preview\";s:21:\"preview_not_available\";s:21:\"Preview not available\";s:10:\"360_viewer\";s:12:\"360° Viewer\";s:16:\"standard_preview\";s:16:\"Standard Preview\";s:6:\"status\";s:6:\"Status\";s:25:\"video_preview_in_progress\";s:52:\"The preview for this video is currently in progress.\";s:54:\"php_cli_binary_and_or_ffmpeg_binary_setting_is_missing\";s:130:\"PHP-CLI binary or FFMPEG is not available, please ensure that both are installed/executable and configured in the system settings!\";s:16:\"video_thumbnails\";s:16:\"Video Thumbnails\";s:8:\"optional\";s:8:\"optional\";s:35:\"do_you_really_want_to_close_pimcore\";s:36:\"Do you really want to close Pimcore?\";s:17:\"drop_element_here\";s:17:\"Drop element here\";s:29:\"select_specific_area_of_image\";s:29:\"Select specific area of image\";s:18:\"error_pasting_item\";s:20:\"Unable to paste item\";s:35:\"paste_recursive_updating_references\";s:36:\"Paste recursive, updating references\";s:12:\"add_hardlink\";s:12:\"Add Hardlink\";s:11:\"source_path\";s:11:\"Source path\";s:22:\"properties_from_source\";s:35:\"Use properties from source document\";s:18:\"childs_from_source\";s:33:\"Use children from source document\";s:28:\"click_right_for_more_options\";s:28:\"Click right for more options\";s:11:\"move_to_tab\";s:11:\"Move to Tab\";s:13:\"not_supported\";s:13:\"Not supported\";s:9:\"edit_link\";s:9:\"Edit Link\";s:6:\"resize\";s:6:\"Resize\";s:13:\"scalebyheight\";s:15:\"Scale by Height\";s:12:\"scalebywidth\";s:14:\"Scale by Width\";s:4:\"crop\";s:4:\"Crop\";s:7:\"cleanup\";s:7:\"Cleanup\";s:29:\"this_element_cannot_be_edited\";s:29:\"This element cannot be edited\";s:7:\"details\";s:7:\"Details\";s:63:\"cannot_save_object_please_try_to_edit_the_object_in_detail_view\";s:81:\"<b>Cannot save object!</b><br />Please try to edit the object in the detail view.\";s:4:\"size\";s:4:\"Size\";s:13:\"select_a_file\";s:13:\"Select a file\";s:25:\"upload_compatibility_mode\";s:32:\"Upload File (Compatibility Mode)\";s:45:\"the_system_is_in_maintenance_mode_please_wait\";s:46:\"The system is in maintenance mode, please wait\";s:8:\"activate\";s:8:\"Activate\";s:18:\"image_is_too_small\";s:47:\"Image is too small, please choose a bigger one.\";s:19:\"name_is_not_allowed\";s:19:\"Name is not allowed\";s:18:\"import_from_server\";s:18:\"Import from Server\";s:12:\"upload_files\";s:12:\"Upload Files\";s:10:\"upload_zip\";s:18:\"Upload ZIP Archive\";s:13:\"document_root\";s:13:\"Document Root\";s:21:\"batch_change_selected\";s:19:\"Batch edit selected\";s:15:\"batch_operation\";s:15:\"Batch Operation\";s:16:\"modificationdate\";s:17:\"Modification Date\";s:15:\"download_as_zip\";s:15:\"Download as ZIP\";s:6:\"locked\";s:6:\"Locked\";s:43:\"element_cannot_be_move_because_it_is_locked\";s:45:\"Element cannot be moved because it is locked.\";s:23:\"element_cannot_be_moved\";s:32:\"The element cannot be moved here\";s:22:\"no_collections_allowed\";s:22:\"No Collections allowed\";s:5:\"draft\";s:5:\"Draft\";s:9:\"auto_save\";s:9:\"Auto save\";s:16:\"filter_condition\";s:16:\"Filter Condition\";s:9:\"all_types\";s:9:\"All Types\";s:5:\"audio\";s:5:\"Audio\";s:5:\"video\";s:5:\"Video\";s:7:\"archive\";s:7:\"Archive\";s:7:\"unknown\";s:7:\"Unknown\";s:5:\"class\";s:5:\"Class\";s:4:\"page\";s:4:\"Page\";s:7:\"snippet\";s:7:\"Snippet\";s:6:\"folder\";s:6:\"Folder\";s:14:\"your_selection\";s:14:\"Your Selection\";s:37:\"double_click_to_add_item_to_selection\";s:61:\"Double-click an item on the left to add it to this selection.\";s:5:\"label\";s:5:\"Label\";s:17:\"error_auth_failed\";s:36:\"Login failed!<br />Please try again.\";s:21:\"error_session_expired\";s:41:\"Session expired!<br />Please login again.\";s:4:\"site\";s:4:\"Site\";s:10:\"descending\";s:10:\"Descending\";s:9:\"ascending\";s:9:\"Ascending\";s:4:\"sort\";s:4:\"Sort\";s:7:\"results\";s:7:\"Results\";s:9:\"dimension\";s:9:\"Dimension\";s:6:\"metric\";s:6:\"Metric\";s:7:\"segment\";s:7:\"Segment\";s:13:\"data_explorer\";s:13:\"Data Explorer\";s:10:\"navigation\";s:10:\"Navigation\";s:9:\"entrances\";s:9:\"Entrances\";s:5:\"exits\";s:5:\"Exits\";s:7:\"restore\";s:7:\"Restore\";s:6:\"amount\";s:6:\"Amount\";s:16:\"flush_recyclebin\";s:17:\"Flush Recycle Bin\";s:10:\"recyclebin\";s:11:\"Recycle Bin\";s:9:\"deletedby\";s:10:\"Deleted By\";s:18:\"open_select_editor\";s:21:\"Open Selection-Editor\";s:6:\"ignore\";s:6:\"Ignore\";s:5:\"blank\";s:5:\"Blank\";s:16:\"email_log_resend\";s:12:\"Resend email\";s:27:\"email_log_resend_window_msg\";s:71:\"Please confirm that you want to send the email again to all recipients.\";s:11:\"select_site\";s:13:\"Select a site\";s:9:\"main_site\";s:9:\"Main Site\";s:8:\"filename\";s:8:\"Filename\";s:20:\"unsupported_filetype\";s:20:\"Unsupported Filetype\";s:27:\"different_number_of_columns\";s:27:\"Different number of columns\";s:39:\"email_log_resend_window_success_message\";s:55:\"The email has been sent successfully to all recipients.\";s:37:\"email_log_resend_window_error_message\";s:49:\"An error occurred. The email has not been resent.\";s:10:\"error_jobs\";s:25:\"The following jobs failed\";s:12:\"batch_change\";s:14:\"Batch edit all\";s:16:\"batch_edit_field\";s:20:\"Batch edit all field\";s:25:\"batch_edit_field_selected\";s:25:\"Batch edit selected field\";s:9:\"published\";s:9:\"Published\";s:3:\"all\";s:3:\"all\";s:14:\"items_per_page\";s:14:\"Items per page\";s:22:\"reload_pimcore_changes\";s:89:\"You have to reload Pimcore for the changes to take effect, would you like to do this now?\";s:4:\"info\";s:4:\"Info\";s:30:\"area_brick_assign_info_message\";s:61:\"Please use drag & drop to assign a brick to the desired block\";s:16:\"metainfo_copy_id\";s:20:\"Copy ID to clipboard\";s:22:\"metainfo_copy_fullpath\";s:27:\"Copy full path to clipboard\";s:22:\"metainfo_copy_deeplink\";s:26:\"Copy deeplink to clipboard\";s:2:\"or\";s:2:\"or\";s:4:\"move\";s:4:\"Move\";s:14:\"paste_contents\";s:24:\"Paste only contents here\";s:14:\"paste_as_child\";s:14:\"Paste as child\";s:25:\"paste_recursive_as_childs\";s:26:\"Paste as child (recursive)\";s:13:\"view_original\";s:13:\"View Original\";s:4:\"feed\";s:4:\"Feed\";s:14:\"no_items_found\";s:14:\"No items found\";s:10:\"public_url\";s:10:\"Public URL\";s:9:\"pageviews\";s:9:\"Pageviews\";s:6:\"visits\";s:6:\"Visits\";s:6:\"detail\";s:6:\"Detail\";s:15:\"report_settings\";s:15:\"Report Settings\";s:8:\"overview\";s:8:\"Overview\";s:16:\"visitor_overview\";s:16:\"Visitor Overview\";s:5:\"other\";s:5:\"Other\";s:16:\"google_analytics\";s:16:\"Google Analytics\";s:21:\"reports_and_marketing\";s:19:\"Marketing & Reports\";s:25:\"save_only_scheduled_tasks\";s:25:\"Save only scheduled tasks\";s:15:\"modified_assets\";s:15:\"Modified Assets\";s:22:\"modification_statistic\";s:27:\"Changes in the last 31 days\";s:7:\"message\";s:7:\"Message\";s:11:\"add_portlet\";s:11:\"Add Portlet\";s:18:\"modified_documents\";s:18:\"Modified Documents\";s:16:\"modified_objects\";s:16:\"Modified Objects\";s:7:\"welcome\";s:7:\"Welcome\";s:16:\"save_and_publish\";s:14:\"Save & Publish\";s:6:\"delete\";s:6:\"Delete\";s:4:\"save\";s:4:\"Save\";s:10:\"add_assets\";s:12:\"Add Asset(s)\";s:7:\"preview\";s:7:\"Preview\";s:8:\"advanced\";s:8:\"Advanced\";s:5:\"basic\";s:5:\"Basic\";s:4:\"list\";s:4:\"List\";s:4:\"view\";s:4:\"View\";s:7:\"publish\";s:7:\"Publish\";s:6:\"rename\";s:6:\"Rename\";s:8:\"settings\";s:8:\"Settings\";s:10:\"properties\";s:10:\"Properties\";s:8:\"versions\";s:8:\"Versions\";s:3:\"add\";s:3:\"Add\";s:3:\"sum\";s:3:\"Sum\";s:4:\"date\";s:4:\"Date\";s:4:\"user\";s:4:\"User\";s:4:\"note\";s:4:\"Note\";s:4:\"from\";s:4:\"From\";s:14:\"email_reply_to\";s:8:\"Reply To\";s:2:\"to\";s:2:\"To\";s:8:\"email_cc\";s:2:\"Cc\";s:9:\"email_bcc\";s:3:\"Bcc\";s:14:\"email_settings\";s:14:\"Email Settings\";s:35:\"email_settings_receiver_description\";s:240:\"Multiple recipients can be specified by separating the email addresses with a semicolon. <br/>Example: receiver@pimcore.org; receiver2@pimcore.org<br/>For \'From\' you can use additionally the syntax <i>My Name &lt;my-name@example.com&gt;</i>\";s:10:\"email_logs\";s:11:\"Sent Emails\";s:19:\"email_log_sent_Date\";s:9:\"Date sent\";s:4:\"html\";s:4:\"HTML\";s:4:\"text\";s:4:\"Text\";s:24:\"predefined_document_type\";s:24:\"Predefined Document Type\";s:10:\"controller\";s:10:\"Controller\";s:6:\"action\";s:6:\"Action\";s:7:\"actions\";s:7:\"Actions\";s:8:\"template\";s:8:\"Template\";s:3:\"key\";s:3:\"Key\";s:2:\"id\";s:2:\"ID\";s:4:\"name\";s:4:\"Name\";s:5:\"title\";s:5:\"Title\";s:11:\"description\";s:11:\"Description\";s:9:\"unpublish\";s:9:\"Unpublish\";s:6:\"target\";s:6:\"Target\";s:4:\"type\";s:4:\"Type\";s:13:\"create_folder\";s:10:\"Add Folder\";s:25:\"please_enter_the_new_name\";s:25:\"Please enter the new name\";s:8:\"add_page\";s:8:\"Add Page\";s:11:\"add_snippet\";s:11:\"Add Snippet\";s:9:\"add_email\";s:9:\"Add Email\";s:8:\"add_link\";s:8:\"Add Link\";s:4:\"copy\";s:4:\"Copy\";s:5:\"paste\";s:5:\"Paste\";s:14:\"close_all_tabs\";s:14:\"Close all tabs\";s:6:\"search\";s:6:\"Search\";s:6:\"import\";s:6:\"Import\";s:6:\"export\";s:6:\"Export\";s:8:\"glossary\";s:8:\"Glossary\";s:14:\"document_types\";s:14:\"Document Types\";s:21:\"predefined_properties\";s:21:\"Predefined Properties\";s:5:\"users\";s:5:\"Users\";s:7:\"profile\";s:7:\"Profile\";s:10:\"my_profile\";s:10:\"My Profile\";s:13:\"documentation\";s:13:\"Documentation\";s:11:\"report_bugs\";s:11:\"Report Bugs\";s:5:\"about\";s:5:\"About\";s:4:\"file\";s:4:\"File\";s:6:\"extras\";s:6:\"Extras\";s:4:\"help\";s:4:\"Help\";s:13:\"configuration\";s:13:\"Configuration\";s:5:\"value\";s:5:\"Value\";s:21:\"add_a_custom_property\";s:21:\"Add a custom Property\";s:7:\"general\";s:7:\"General\";s:8:\"language\";s:8:\"Language\";s:7:\"quality\";s:7:\"Quality\";s:6:\"format\";s:6:\"Format\";s:9:\"documents\";s:9:\"Documents\";s:6:\"assets\";s:6:\"Assets\";s:6:\"upload\";s:6:\"Upload\";s:5:\"width\";s:5:\"Width\";s:6:\"height\";s:6:\"Height\";s:5:\"empty\";s:5:\"Empty\";s:8:\"workflow\";s:8:\"Workflow\";s:6:\"modify\";s:7:\"Modify \";s:6:\"create\";s:7:\"Create \";s:4:\"edit\";s:4:\"Edit\";s:6:\"logout\";s:6:\"Logout\";s:7:\"refresh\";s:7:\"Refresh\";s:5:\"input\";s:5:\"Input\";s:8:\"checkbox\";s:8:\"Checkbox\";s:8:\"textarea\";s:8:\"Textarea\";s:5:\"image\";s:5:\"Image\";s:6:\"select\";s:6:\"Select\";s:4:\"base\";s:4:\"Base\";s:10:\"add_object\";s:10:\"Add Object\";s:6:\"border\";s:6:\"Border\";s:8:\"document\";s:8:\"Document\";s:5:\"asset\";s:5:\"Asset\";s:6:\"object\";s:6:\"Object\";s:6:\"remove\";s:6:\"Remove\";s:19:\"hidden_dependencies\";s:81:\"There are additional dependencies your user does not have the permissions to see.\";s:4:\"open\";s:4:\"Open\";s:4:\"days\";s:4:\"Days\";s:7:\"seemode\";s:7:\"Seemode\";s:17:\"edit_current_page\";s:14:\"Edit this page\";s:5:\"close\";s:5:\"Close\";s:19:\"name_already_in_use\";s:54:\"Name is already in use, please choose a different one.\";s:28:\"name_and_key_must_be_defined\";s:29:\"Name and Type must be defined\";s:21:\"mandatory_field_empty\";s:32:\"Please fill all mandatory fields\";s:6:\"reload\";s:6:\"Reload\";s:8:\"schedule\";s:8:\"Schedule\";s:4:\"time\";s:4:\"Time\";s:7:\"version\";s:7:\"Version\";s:6:\"active\";s:6:\"Active\";s:7:\"success\";s:7:\"Success\";s:12:\"translations\";s:12:\"Translations\";s:11:\"translation\";s:11:\"Translation\";s:9:\"firstname\";s:9:\"Firstname\";s:8:\"lastname\";s:8:\"Lastname\";s:5:\"email\";s:5:\"Email\";s:24:\"cant_move_node_to_target\";s:24:\"Moving node not possible\";s:19:\"error_moving_object\";s:25:\"Object could not be moved\";s:31:\"translations_are_not_configured\";s:30:\"Translation are not configured\";s:14:\"read_more_here\";s:20:\"Read more about here\";s:15:\"publish_version\";s:15:\"Publish version\";s:10:\"save_draft\";s:10:\"Save draft\";s:5:\"start\";s:5:\"Start\";s:2:\"su\";s:2:\"Su\";s:2:\"mo\";s:2:\"Mo\";s:2:\"tu\";s:2:\"Tu\";s:2:\"we\";s:2:\"We\";s:2:\"th\";s:2:\"Th\";s:2:\"fr\";s:2:\"Fr\";s:2:\"sa\";s:2:\"Sa\";s:18:\"session_error_text\";s:144:\"It seems there is a problem with your session. We recommend to reload this page in order to be save, but you can try to save your changes first.\";s:13:\"session_error\";s:13:\"Session Error\";s:11:\"please_wait\";s:15:\"Please wait ...\";s:8:\"download\";s:8:\"Download\";s:11:\"inheritable\";s:11:\"Inheritable\";s:9:\"redirects\";s:9:\"Redirects\";s:6:\"source\";s:6:\"Source\";s:4:\"link\";s:4:\"Link\";s:5:\"links\";s:5:\"Links\";s:4:\"abbr\";s:5:\"Abbr.\";s:4:\"stop\";s:4:\"Stop\";s:12:\"dependencies\";s:12:\"Dependencies\";s:8:\"requires\";s:8:\"Requires\";s:11:\"required_by\";s:11:\"Required By\";s:11:\"search_edit\";s:23:\"Search, Edit and Export\";s:7:\"subtype\";s:7:\"Subtype\";s:12:\"initializing\";s:16:\"Initializing ...\";s:20:\"please_select_a_type\";s:20:\"Please select a type\";s:6:\"filter\";s:6:\"Filter\";s:8:\"test_url\";s:8:\"Test URL\";s:5:\"field\";s:5:\"Field\";s:8:\"operator\";s:8:\"Operator\";s:5:\"apply\";s:5:\"Apply\";s:4:\"show\";s:4:\"Show\";s:10:\"robots.txt\";s:10:\"robots.txt\";s:6:\"public\";s:6:\"Public\";s:18:\"maximum_2_versions\";s:31:\"You can compare max. 2 versions\";s:5:\"error\";s:5:\"Error\";s:17:\"element_is_locked\";s:58:\"The desired element is currently opened by another person:\";s:21:\"element_lock_question\";s:33:\"Would you like to open it anyway?\";s:5:\"since\";s:5:\"Since\";s:9:\"longitude\";s:9:\"Longitude\";s:8:\"latitude\";s:8:\"Latitude\";s:8:\"geopoint\";s:16:\"Geographic Point\";s:6:\"cancel\";s:6:\"Cancel\";s:18:\"open_search_editor\";s:18:\"Open Search Editor\";s:10:\"parameters\";s:10:\"Parameters\";s:6:\"anchor\";s:6:\"Anchor\";s:9:\"accesskey\";s:9:\"Accesskey\";s:8:\"relation\";s:8:\"Relation\";s:8:\"tabindex\";s:9:\"Tab-Index\";s:7:\"not_set\";s:7:\"not set\";s:10:\"export_csv\";s:10:\"CSV Export\";s:11:\"export_xlsx\";s:11:\"XLSX Export\";s:10:\"import_csv\";s:10:\"CSV Import\";s:19:\"show_welcome_screen\";s:30:\"Show welcome screen on startup\";s:20:\"importFileHasHeadRow\";s:20:\"first row = headline\";s:19:\"error_deleting_item\";s:21:\"Could not delete item\";s:42:\"overwrite_object_with_same_key_description\";s:504:\"When overwrite is checked, instead of creating a new object for each import row, objects with the same key are replaced. Existing objects in your import folder with keys not contained in the import file will remain untouched. Please be aware that all objects which have a matching key in the import file will be replaced in the target folder. This is also true for objects based on a different class or even object folders! Object fields which are set to ignore in the field mapping keep their old value.\";s:34:\"object_import_filename_description\";s:57:\"select the field which is used to generate the object key\";s:17:\"save_pubish_close\";s:23:\"Save, publish and close\";s:10:\"save_close\";s:14:\"Save and close\";s:13:\"error_general\";s:99:\"Server threw exception - could not perform action. Please reload the admin interface and try again.\";s:11:\"owner_class\";s:11:\"Owner class\";s:11:\"owner_field\";s:11:\"Owner field\";s:22:\"nonownerobject_warning\";s:109:\"The current object is not the owner of these relations, making changes here might make saving the object slow\";s:30:\"element_implicit_edit_question\";s:63:\"Would you still like to implicitly  modify it with this action?\";s:20:\"element_open_message\";s:48:\"The desired element is already open for editing.\";s:30:\"nonownerobjects_self_selection\";s:113:\"In non owner objects a  relation to myself is not possible, please use original field instead of non owner field.\";s:7:\"warning\";s:7:\"Warning\";s:7:\"consent\";s:7:\"Consent\";s:25:\"csv_object_export_warning\";s:181:\"Please note that the CSV export does not support all data types. Consequently, re-importing an exported CSV to pimcore might lead to data loss. Press OK to continue with the export.\";s:21:\"object_export_warning\";s:98:\"Please note that the export does not support all data types. Press OK to continue with the export.\";s:19:\"error_renaming_item\";s:43:\"There was an error while renaming the item.\";s:18:\"navigation_exclude\";s:23:\"Exclude from Navigation\";s:8:\"variants\";s:8:\"Variants\";s:7:\"variant\";s:7:\"Variant\";s:11:\"add_variant\";s:11:\"Add variant\";s:27:\"delete_message_dependencies\";s:38:\"There are dependencies, delete anyway?\";s:14:\"delete_message\";s:39:\"Do you really want to delete this item?\";s:20:\"delete_class_message\";s:41:\"Do you really want to delete class \'%s\' ?\";s:20:\"delete_message_batch\";s:44:\"Do you really want to delete these elements?\";s:18:\"delete_error_batch\";s:84:\"Following items cannot be deleted, do you wanna proceed with deleting the remaining?\";s:12:\"delete_error\";s:35:\"The item cannot be deleted. Reason:\";s:31:\"no_further_objectbricks_allowed\";s:31:\"No further objectbricks allowed\";s:21:\"grid_current_language\";s:16:\"Current language\";s:21:\"selected_grid_columns\";s:21:\"Selected grid columns\";s:14:\"object_columns\";s:14:\"Object columns\";s:14:\"system_columns\";s:14:\"System columns\";s:7:\"columns\";s:7:\"Columns\";s:13:\"children_grid\";s:13:\"Children Grid\";s:13:\"only_children\";s:20:\"just direct children\";s:17:\"only_unreferenced\";s:17:\"only unreferenced\";s:3:\"cut\";s:3:\"Cut\";s:17:\"paste_cut_element\";s:21:\"Paste cut-out element\";s:13:\"memorize_tabs\";s:18:\"Memorize open tabs\";s:15:\"element_history\";s:24:\"Recently Opened Elements\";s:10:\"dashboards\";s:10:\"Dashboards\";s:20:\"portlet_customreport\";s:13:\"Custom Report\";s:24:\"clear_marker_or_hotspots\";s:39:\"Clear Marker, Hotspot and Cropping Data\";s:16:\"hotspots_cleared\";s:43:\"Hotspots, Markers and Cropping Data cleared\";s:8:\"deeplink\";s:8:\"Deeplink\";s:13:\"click_to_open\";s:15:\"(click to open)\";s:12:\"add_metadata\";s:12:\"Add Metadata\";s:26:\"pimcore_icon_edit_pdf_text\";s:17:\"Edit text version\";s:7:\"chapter\";s:7:\"Chapter\";s:15:\"search_and_move\";s:13:\"Search & Move\";s:9:\"searching\";s:12:\"Searching...\";s:25:\"predefined_asset_metadata\";s:25:\"Predefined Asset Metadata\";s:35:\"add_predefined_metadata_definitions\";s:26:\"Add predefined definitions\";s:9:\"scheduled\";s:9:\"Scheduled\";s:26:\"naming_requirements_3chars\";s:56:\"Name must be alphanumeric and at least 3 characters long\";s:22:\"there_are_more_columns\";s:47:\"There are more columns than currently displayed\";s:9:\"merge_csv\";s:22:\"Import &amp; Merge CSV\";s:26:\"translation_merger_current\";s:12:\"Current Text\";s:22:\"translation_merger_csv\";s:13:\"Text from CSV\";s:16:\"nothing_to_merge\";s:25:\"There is nothing to merge\";s:21:\"csv_seperated_options\";s:21:\"CSV seperated options\";s:26:\"csv_seperated_options_info\";s:173:\"The list of available options can be specified as comma-seperated list, as single-column values or  mixed. For the single-column way, the key will also be used as the value.\";s:10:\"first_page\";s:10:\"First Page\";s:13:\"previous_page\";s:13:\"Previous Page\";s:9:\"next_page\";s:9:\"Next Page\";s:9:\"last_page\";s:9:\"Last Page\";s:18:\"no_data_to_display\";s:18:\"No data to display\";s:29:\"classificationstore_no_groups\";s:15:\"No groups found\";s:27:\"classificationstore_no_keys\";s:13:\"No keys found\";s:34:\"classificationstore_no_collections\";s:14:\"No collections\";s:12:\"remove_group\";s:12:\"Remove Group\";s:9:\"reference\";s:9:\"Reference\";s:17:\"converter_service\";s:17:\"Converter service\";s:25:\"element_tag_configuration\";s:17:\"Tag Configuration\";s:20:\"element_tag_all_tags\";s:8:\"All Tags\";s:25:\"element_tag_filtered_tags\";s:13:\"Filtered Tags\";s:25:\"enter_new_name_of_the_tag\";s:25:\"Enter new name of the Tag\";s:13:\"assigned_tags\";s:13:\"Assigned Tags\";s:11:\"filter_tags\";s:15:\"Filter for Tags\";s:19:\"consider_child_tags\";s:23:\"Consider child tags too\";s:15:\"tags_assignment\";s:15:\"Tags Assignment\";s:11:\"tags_search\";s:11:\"Tags Search\";s:6:\"revert\";s:6:\"Revert\";s:18:\"identifier_warning\";s:95:\"Be careful with the unique identifier because table names can contain only up to 64 characters.\";s:17:\"unique_identifier\";s:17:\"Unique identifier\";s:18:\"invalid_identifier\";s:18:\"Invalid identifier\";s:25:\"identifier_already_exists\";s:25:\"Identifier already exists\";s:13:\"batch_applied\";s:13:\"Batch applied\";s:10:\"apply_tags\";s:22:\"Apply tags to Children\";s:21:\"remove_and_apply_tags\";s:33:\"Remove and apply tags to children\";s:16:\"batch_assignment\";s:20:\"Tag batch assignment\";s:22:\"batch_assignment_error\";s:26:\"Tag batch assignment error\";s:17:\"no_children_found\";s:18:\"No Children found.\";s:12:\"asset_search\";s:13:\"Search Assets\";s:15:\"document_search\";s:16:\"Search Documents\";s:13:\"object_search\";s:14:\"Search Objects\";s:4:\"more\";s:4:\"More\";s:16:\"open_translation\";s:16:\"Open Translation\";s:22:\"link_existing_document\";s:22:\"Link existing Document\";s:17:\"using_inheritance\";s:17:\"Using Inheritance\";s:12:\"new_document\";s:12:\"New Document\";s:6:\"parent\";s:6:\"Parent\";s:16:\"update_available\";s:16:\"Update Available\";s:23:\"target_document_invalid\";s:51:\"Please select a target document with valid language\";s:30:\"target_document_needs_language\";s:36:\"Target document needs a language set\";s:5:\"tools\";s:5:\"Tools\";s:12:\"perspectives\";s:12:\"Perspectives\";s:13:\"filter_active\";s:14:\"Filter active!\";s:17:\"save_grid_options\";s:17:\"Save Grid Options\";s:12:\"reset_config\";s:13:\"Reset changes\";s:20:\"reset_config_tooltip\";s:88:\"This will reset (and save) the grid column configuration for this element to its default\";s:22:\"error_resetting_config\";s:29:\"Error resetting configuration\";s:18:\"marketing_settings\";s:18:\"Marketing Settings\";s:30:\"cross_tree_moves_not_supported\";s:34:\"Cross tree moves not yet supported\";s:13:\"add_printpage\";s:13:\"Add PrintPage\";s:18:\"add_printcontainer\";s:18:\"Add PrintContainer\";s:21:\"web2print_preview_pdf\";s:22:\"Generate & Preview PDF\";s:29:\"web2print_cancel_pdf_creation\";s:19:\"Cancel PDF Creation\";s:22:\"web2print_generate_pdf\";s:12:\"Generate PDF\";s:22:\"web2print_download_pdf\";s:12:\"Download PDF\";s:24:\"web2print_last-generated\";s:14:\"Last Generated\";s:31:\"web2print_last-generate-message\";s:21:\"Last Generate Message\";s:9:\"web2print\";s:12:\"Web-to-Print\";s:32:\"web2print_prepare_pdf_generation\";s:22:\"Prepare PDF Generation\";s:30:\"web2print_start_html_rendering\";s:20:\"Start HTML Rendering\";s:33:\"web2print_finished_html_rendering\";s:23:\"Finished HTML Rendering\";s:25:\"web2print_saved_html_file\";s:15:\"Saved HTML File\";s:24:\"web2print_pdf_conversion\";s:14:\"PDF Conversion\";s:29:\"web2print_saving_pdf_document\";s:17:\"Save PDF Document\";s:16:\"web2print_author\";s:6:\"Author\";s:22:\"web2print_printermarks\";s:12:\"Printermarks\";s:22:\"web2print_addOverprint\";s:12:\"Overprinting\";s:19:\"web2print_bookmarks\";s:9:\"Bookmarks\";s:9:\"close_tab\";s:9:\"Close Tab\";s:24:\"web2print_only_published\";s:39:\"Only possible with published documents.\";s:27:\"web2print_documents_changed\";s:44:\"Documents changed since last pdf generation.\";s:25:\"web2print_enableDebugMode\";s:17:\"Enable debug mode\";s:32:\"web2print_enableLenientHttpsMode\";s:25:\"Enable lenient HTTPS mode\";s:36:\"web2print_enableLenientHttpsMode_txt\";s:72:\"Enable this option if PDFreactor fails to connect successfully via HTTPS\";s:13:\"about_pimcore\";s:22:\"ABOUT PIMCORE PLATFORM\";s:5:\"phone\";s:5:\"Phone\";s:24:\"workflow_additional_info\";s:22:\"Additional Information\";s:5:\"notes\";s:5:\"Notes\";s:16:\"workflow_actions\";s:7:\"Actions\";s:23:\"workflow_perform_action\";s:14:\"Perform Action\";s:23:\"workflow_notes_required\";s:16:\"Notes (Required)\";s:23:\"workflow_notes_optional\";s:16:\"Notes (Optional)\";s:36:\"workflow_notes_requred_field_message\";s:25:\"\"%s\" is a required field.\";s:40:\"workflow_transition_applied_successfully\";s:27:\"Action applied successfully\";s:42:\"workflow_change_email_notification_subject\";s:39:\"Workflow update for %s in workflow \'%s\'\";s:39:\"workflow_change_email_notification_text\";s:65:\"For %s with ID %s the action \"%s\" was triggered in workflow \'%s\'.\";s:43:\"workflow_change_email_notification_deeplink\";s:24:\"Deeplink to the element.\";s:39:\"workflow_change_email_notification_note\";s:11:\"Note Added:\";s:16:\"workflow_details\";s:16:\"Workflow Details\";s:14:\"workflow_graph\";s:14:\"Workflow Graph\";s:22:\"workflow_current_state\";s:13:\"Current State\";s:22:\"workflow_cmd_not_found\";s:86:\"Please install the \"%s\" console executable on the server to render the workflow graph.\";s:32:\"please_enter_the_id_of_the_asset\";s:64:\"Please enter the ID or Path (e.g. /images/logo.jpg) of the asset\";s:33:\"please_enter_the_id_of_the_object\";s:41:\"Please enter the ID or Path of the object\";s:35:\"please_enter_the_id_of_the_document\";s:73:\"Please enter the ID, Path or URL (also including http://) of the document\";s:27:\"element_has_unsaved_changes\";s:27:\"Element has unsaved changes\";s:31:\"element_unsaved_changes_message\";s:54:\"All unsaved changes will be lost, are you really sure?\";s:35:\"newsletter_enableTrackingParameters\";s:32:\"Add Tracking Parameters to Links\";s:6:\"medium\";s:6:\"Medium\";s:22:\"newsletter_sendingMode\";s:12:\"Sending Mode\";s:29:\"newsletter_sendingmode_single\";s:39:\"Single (Render every Mail individually)\";s:28:\"newsletter_sendingmode_batch\";s:29:\"Batch (Render Mail only once)\";s:23:\"newsletter_sendingPanel\";s:24:\"Newsletter Sending Panel\";s:24:\"newsletter_dirty_warning\";s:47:\"Newsletter is not saved yet. Please save first.\";s:18:\"newsletter_sending\";s:18:\"Sending Newsletter\";s:24:\"newsletter_sourceAdapter\";s:22:\"Address Source Adapter\";s:18:\"newsletter_default\";s:19:\"Default Object List\";s:18:\"newsletter_csvList\";s:8:\"CSV List\";s:19:\"newsletter_testsend\";s:23:\"Newsletter Test Sending\";s:28:\"newsletter_test_sent_message\";s:33:\"Test Newsletter sent successfully\";s:20:\"add_object_mbx_title\";s:25:\"Add new Object of type %s\";s:18:\"merge_translations\";s:18:\"Merge Translations\";s:24:\"newsletter_choose_report\";s:15:\"Choose a report\";s:27:\"newsletter_email_field_name\";s:16:\"Email field name\";s:4:\"mode\";s:4:\"Mode\";s:15:\"custom_download\";s:15:\"Custom Download\";s:13:\"original_file\";s:13:\"Original File\";s:10:\"web_format\";s:10:\"Web Format\";s:12:\"print_format\";s:12:\"Print Format\";s:13:\"office_format\";s:13:\"Office Format\";s:15:\"change_password\";s:15:\"Change Password\";s:32:\"file_is_bigger_that_upload_limit\";s:73:\"The following file is bigger than the actual upload limit of your server:\";s:23:\"send_test_email_success\";s:95:\"Your test-email has been sent. Would you like to keep this window open to send the email again?\";s:32:\"press_crtl_and_select_to_compare\";s:35:\"Compare: Press CTRL + Click Version\";s:13:\"clear_filters\";s:13:\"Clear Filters\";s:18:\"tags_configuration\";s:18:\"Tags Configuration\";s:26:\"export_csv_include_headers\";s:23:\"CSV Export with headers\";s:19:\"analyze_permissions\";s:19:\"Analyze Permissions\";s:6:\"unique\";s:6:\"Unique\";s:4:\"glue\";s:4:\"Glue\";s:6:\"prefix\";s:6:\"Prefix\";s:11:\"date_format\";s:11:\"Date Format\";s:9:\"attribute\";s:9:\"Attribute\";s:17:\"forward_attribute\";s:17:\"Forward Attribute\";s:5:\"upper\";s:5:\"Upper\";s:5:\"lower\";s:5:\"Lower\";s:8:\"disabled\";s:8:\"Disabled\";s:14:\"capitalization\";s:14:\"Capitalization\";s:19:\"restrict_to_locales\";s:19:\"Restrict to locales\";s:10:\"predefined\";s:10:\"Predefined\";s:12:\"save_as_copy\";s:12:\"Save as copy\";s:16:\"set_as_favourite\";s:16:\"Set as favourite\";s:18:\"grid_configuration\";s:18:\"Grid Configuration\";s:12:\"shared_users\";s:12:\"Shared Users\";s:12:\"shared_roles\";s:12:\"Shared Roles\";s:14:\"save_and_share\";s:12:\"Save & Share\";s:19:\"save_copy_and_share\";s:17:\"Save Copy & Share\";s:6:\"locale\";s:6:\"Locale\";s:8:\"ellipses\";s:8:\"Ellipses\";s:11:\"insensitive\";s:11:\"Insensitive\";s:9:\"yes_value\";s:9:\"Yes Value\";s:8:\"no_value\";s:8:\"No Value\";s:11:\"count_empty\";s:11:\"Count Empty\";s:8:\"as_array\";s:8:\"As array\";s:14:\"metadata_field\";s:14:\"Metadata field\";s:10:\"only_count\";s:13:\"Only as count\";s:9:\"parameter\";s:9:\"Parameter\";s:17:\"forward_parameter\";s:17:\"Forward Parameter\";s:8:\"is_array\";s:10:\"Array Type\";s:9:\"php_class\";s:9:\"PHP Class\";s:15:\"additional_data\";s:15:\"Additional Data\";s:7:\"flatten\";s:7:\"Flatten\";s:18:\"return_last_result\";s:18:\"Return last result\";s:9:\"skip_null\";s:9:\"Skip Null\";s:15:\"expand_children\";s:15:\"Expand children\";s:8:\"subtract\";s:8:\"Subtract\";s:8:\"multiply\";s:8:\"Multiply\";s:6:\"divide\";s:6:\"Divide\";s:20:\"apply_to_all_objects\";s:12:\"Apply to all\";s:24:\"apply_to_all_objects_msg\";s:123:\"There are other objects which already have their own favourite settings. Do you want to apply this config to those as well?\";s:6:\"encode\";s:6:\"Encode\";s:6:\"decode\";s:6:\"Decode\";s:9:\"serialize\";s:9:\"Serialize\";s:11:\"unserialize\";s:11:\"Unserialize\";s:6:\"offset\";s:6:\"Offset\";s:13:\"col_attribute\";s:20:\"Collection Attribute\";s:15:\"brick_attribute\";s:15:\"Brick Attribute\";s:24:\"csv_column_configuration\";s:20:\"Column Configuration\";s:6:\"column\";s:6:\"Column\";s:17:\"resolver_strategy\";s:17:\"Resolver Strategy\";s:17:\"resolver_settings\";s:17:\"Resolver Settings\";s:12:\"csv_settings\";s:12:\"CSV Settings\";s:11:\"skipheadrow\";s:13:\"Skip head row\";s:16:\"csv_file_preview\";s:16:\"CSV File Preview\";s:7:\"save_as\";s:7:\"Save as\";s:4:\"load\";s:4:\"Load\";s:27:\"import_export_configuration\";s:27:\"Import Export Configuration\";s:10:\"brick_type\";s:10:\"Brick Type\";s:8:\"renderer\";s:8:\"Renderer\";s:6:\"getter\";s:6:\"Getter\";s:6:\"string\";s:6:\"String\";s:4:\"bool\";s:4:\"Bool\";s:3:\"row\";s:3:\"Row\";s:13:\"import_report\";s:13:\"Import Report\";s:13:\"import_errors\";s:46:\"Some errors occurred. Check the import report!\";s:14:\"import_is_done\";s:14:\"Import is done\";s:18:\"import_file_prefix\";s:20:\"Prefix for new files\";s:14:\"skip_if_exists\";s:18:\"Skip row if exists\";s:20:\"php_class_or_service\";s:21:\"Class or service name\";s:14:\"create_parents\";s:14:\"Create parents\";s:8:\"fullpath\";s:9:\"Full Path\";s:16:\"create_on_demand\";s:16:\"Create on demand\";s:15:\"get_by_resolver\";s:16:\"Get By Attribute\";s:6:\"direct\";s:6:\"Direct\";s:17:\"skip_empty_values\";s:17:\"Skip empty values\";s:16:\"do_not_overwrite\";s:16:\"Do not overwrite\";s:5:\"never\";s:5:\"Never\";s:12:\"if_not_empty\";s:12:\"If not empty\";s:6:\"always\";s:6:\"Always\";s:9:\"delimiter\";s:9:\"Delimiter\";s:14:\"share_globally\";s:14:\"Share globally\";s:19:\"gdpr_data_extractor\";s:19:\"GDPR Data Extractor\";s:16:\"no_configuration\";s:16:\"No Configuration\";s:20:\"share_configurations\";s:20:\"Share configurations\";s:18:\"enable_inheritance\";s:18:\"Enable Inheritance\";s:15:\"object_settings\";s:15:\"Object Settings\";s:12:\"drop_me_here\";s:43:\"Drag an item from the tree and drop it here\";s:18:\"clear_hotspots_msg\";s:96:\"This image contains additional data like markers or hotspots. Do you want to clear them as well?\";s:14:\"restore_failed\";s:14:\"Restore failed\";s:16:\"batch_append_all\";s:19:\"Batch append to all\";s:21:\"batch_append_selected\";s:24:\"Batch append to selected\";s:15:\"batch_append_to\";s:18:\"Append data to all\";s:24:\"batch_append_selected_to\";s:23:\"Append data to selected\";s:16:\"batch_remove_all\";s:21:\"Batch remove from all\";s:21:\"batch_remove_selected\";s:26:\"Batch remove from selected\";s:17:\"batch_remove_from\";s:20:\"Remove data from all\";s:26:\"batch_remove_selected_from\";s:25:\"Remove data from selected\";s:16:\"sort_children_by\";s:16:\"Sort Children By\";s:6:\"by_key\";s:12:\"Key (A to Z)\";s:14:\"by_key_reverse\";s:12:\"Key (Z to A)\";s:8:\"by_index\";s:14:\"Index (Manual)\";s:47:\"successful_object_change_children_sort_to_index\";s:40:\"Changed object children sorting to Index\";s:45:\"successful_object_change_children_sort_to_key\";s:38:\"Changed object children sorting to Key\";s:42:\"error_object_change_children_sort_to_index\";s:49:\"Unable to change object children sorting to Index\";s:40:\"error_object_change_children_sort_to_key\";s:47:\"Unable to change object children sorting to Key\";s:21:\"clear_version_message\";s:72:\"Do you really want to delete all non-published versions of this element?\";s:9:\"clear_all\";s:9:\"Clear All\";s:23:\"error_empty_file_upload\";s:14:\"File is empty!\";s:12:\"edit_as_html\";s:12:\"Edit as HTML\";s:18:\"edit_as_plain_text\";s:18:\"Edit as plain text\";s:19:\"edit_as_custom_text\";s:19:\"Edit as custom text\";s:24:\"symfony_translation_link\";s:83:\"Translation Format: https://symfony.com/doc/current/translation/message_format.html\";s:11:\"type_column\";s:11:\"Type column\";s:4:\"keep\";s:4:\"keep\";s:24:\"download_selected_as_zip\";s:30:\"Download selected items as ZIP\";s:31:\"please_select_items_to_download\";s:43:\"Please select items to download in the list\";s:24:\"unlink_existing_document\";s:24:\"Unlink existing Document\";s:34:\"scheduled_block_delete_all_in_past\";s:23:\"Delete all past entries\";s:34:\"scheduled_block_really_delete_past\";s:48:\"Really delete all entries scheduled in the past?\";s:26:\"scheduled_block_delete_all\";s:18:\"Delete all entries\";s:33:\"scheduled_block_really_delete_all\";s:62:\"Really delete all scheduled entries, including future entries?\";s:12:\"key_bindings\";s:12:\"Key Bindings\";s:26:\"keybinding_openClassEditor\";s:17:\"Open Class Editor\";s:23:\"keybinding_showMetaInfo\";s:14:\"Show Meta Info\";s:25:\"keybinding_clearAllCaches\";s:16:\"Clear all Caches\";s:25:\"keybinding_clearDataCache\";s:16:\"Clear Data Cache\";s:11:\"2fa_disable\";s:11:\"Disable 2FA\";s:16:\"renew_2fa_secret\";s:23:\"Renew Two Factor Secret\";s:25:\"two_factor_authentication\";s:25:\"Two Factor Authentication\";s:14:\"2fa_alert_text\";s:289:\"Please scan the QR-Code and add it to your Google Authenticator. <br>If you don\'t have the Google Authenticator app installed on your mobile phone, please download it from the App Store/Play Store.<br><br> You will need to reload Pimcore and enter the code shown within the App afterwards!\";s:16:\"2fa_alert_submit\";s:27:\"Reload Pimcore & Enter Code\";s:16:\"setup_two_factor\";s:31:\"Setup Two Factor Authentication\";s:17:\"2fa_setup_message\";s:152:\"Two Factor Authentication is required for your account! You have to set it up in your profile settings, otherwise you will not be able to sign in again.\";s:15:\"set_focal_point\";s:15:\"Set Focal Point\";s:32:\"toggle_image_features_visibility\";s:31:\"Toggle Image Feature Visibility\";s:13:\"saving_failed\";s:14:\"Saving failed!\";s:25:\"failed_to_create_new_item\";s:44:\"Failed to create new item, please try again.\";s:6:\"bundle\";s:6:\"Bundle\";s:7:\"bundles\";s:7:\"Bundles\";s:6:\"bricks\";s:6:\"Bricks\";s:7:\"product\";s:7:\"Product\";s:27:\"index_field_selection_field\";s:21:\"Index Field Selection\";s:24:\"indexFieldSelectionField\";s:21:\"Index Field Selection\";s:33:\"indexFieldSelectionField_settings\";s:44:\"Settings (Multi Index Field Selection Field)\";s:29:\"indexFieldSelectionFieldMulti\";s:30:\"Multiple Index Field Selection\";s:27:\"index_field_selection_combo\";s:20:\"Index Field Combobox\";s:24:\"indexFieldSelectionCombo\";s:20:\"Index Field Combobox\";s:33:\"indexFieldSelectionCombo_settings\";s:31:\"Settings (Index Field Combobox)\";s:18:\"specificPriceField\";s:20:\"Specific Price Field\";s:13:\"showAllFields\";s:15:\"Show all Fields\";s:15:\"considerTenants\";s:16:\"Consider Tenants\";s:25:\"bundle_ecommerce_mainmenu\";s:11:\"Online Shop\";s:30:\"bundle_ecommerce_pricing_rules\";s:13:\"Pricing Rules\";s:40:\"bundle_ecommerce_pricing_config_behavior\";s:8:\"Behavior\";s:39:\"bundle_ecommerce_pricing_config_additiv\";s:7:\"Additiv\";s:43:\"bundle_ecommerce_pricing_config_stopExecute\";s:9:\"Last rule\";s:51:\"bundle_ecommerce_pricing_config_condition_daterange\";s:10:\"Date range\";s:53:\"bundle_ecommerce_pricing_config_condition_cart_amount\";s:11:\"Cart amount\";s:50:\"bundle_ecommerce_pricing_config_condition_products\";s:8:\"Products\";s:8:\"category\";s:8:\"Category\";s:47:\"bundle_ecommerce_pricing_config_condition_token\";s:5:\"Token\";s:47:\"bundle_ecommerce_pricing_config_condition_sales\";s:5:\"Sales\";s:46:\"bundle_ecommerce_pricing_config_condition_sold\";s:4:\"Sold\";s:52:\"bundle_ecommerce_pricing_config_condition_sold_count\";s:5:\"Count\";s:57:\"bundle_ecommerce_pricing_config_condition_sold_count_cart\";s:10:\"Count Cart\";s:54:\"bundle_ecommerce_pricing_config_condition_voucherToken\";s:7:\"Voucher\";s:13:\"error_message\";s:13:\"Error Message\";s:48:\"bundle_ecommerce_pricing_config_condition_tenant\";s:6:\"Tenant\";s:53:\"bundle_ecommerce_pricing_config_condition_targetgroup\";s:12:\"Target Group\";s:63:\"bundle_ecommerce_pricing_config_condition_targetgroup_threshold\";s:9:\"Threshold\";s:43:\"bundle_ecommerce_pricing_config_action_gift\";s:4:\"Gift\";s:52:\"bundle_ecommerce_pricing_config_action_cart_discount\";s:13:\"Cart discount\";s:60:\"bundle_ecommerce_pricing_config_action_cart_discount_percent\";s:13:\"Discount in %\";s:59:\"bundle_ecommerce_pricing_config_action_cart_discount_amount\";s:17:\"Absolute Discount\";s:55:\"bundle_ecommerce_pricing_config_action_product_discount\";s:16:\"Product discount\";s:63:\"bundle_ecommerce_pricing_config_action_product_discount_percent\";s:13:\"Discount in %\";s:62:\"bundle_ecommerce_pricing_config_action_product_discount_amount\";s:17:\"Absolute Discount\";s:52:\"bundle_ecommerce_pricing_config_action_free_shipping\";s:13:\"Free shipping\";s:9:\"ecommerce\";s:10:\"E-Commerce\";s:13:\"preSelectMode\";s:15:\"Pre Select Mode\";s:13:\"remote_single\";s:25:\"Single Select from Remote\";s:12:\"remote_multi\";s:24:\"Multi Select from Remote\";s:12:\"local_single\";s:34:\"Single Select from predefined List\";s:11:\"local_multi\";s:33:\"Multi Select from predefined List\";s:19:\"indexFieldSelection\";s:21:\"Index Field Selection\";s:28:\"indexFieldSelection_settings\";s:30:\"Index Field Selection Settings\";s:12:\"filtergroups\";s:13:\"Filter Groups\";s:9:\"preSelect\";s:10:\"Pre Select\";s:29:\"predefined_pre_select_options\";s:29:\"Predefined pre select options\";s:35:\"bundle_ecommerce_clear_config_cache\";s:25:\"Clear configuration cache\";s:34:\"bundle_ecommerce_back-office_order\";s:22:\"Back Office - Ordering\";s:35:\"bundle_ecommerce_vouchertoolkit_tab\";s:15:\"Voucher Details\";s:26:\"bundle_ecommerce_order_tab\";s:13:\"Order Details\";s:9:\"thumbnail\";s:9:\"Thumbnail\";s:18:\"download_thumbnail\";s:18:\"Download Thumbnail\";s:21:\"no_thumbnail_selected\";s:21:\"No thumbnail selected\";s:55:\"list_thumbnail_in_download_section_on_image_detail_view\";s:55:\"List as option in download section on image detail view\";s:20:\"there_are_more_items\";s:35:\"There are more items than displayed\";s:10:\"unit_width\";s:10:\"Width Unit\";s:18:\"permission_missing\";s:51:\"You need the \'%s\' permission to perform this action\";s:25:\"paste_as_language_variant\";s:29:\"Paste as new language variant\";s:32:\"select_language_for_new_document\";s:32:\"Select language for New Document\";s:32:\"source_document_language_missing\";s:43:\"Set Language(Properties) in Source Document\";s:26:\"document_language_overview\";s:26:\"Document Language Overview\";s:15:\"language_master\";s:6:\"Master\";s:30:\"create_translation_inheritance\";s:32:\"Create Translation (Inheritance)\";s:18:\"create_translation\";s:18:\"Create Translation\";s:37:\"document_translation_parent_not_found\";s:78:\"Parent document has no translation. Create a translation for the parent first.\";s:25:\"enable_batch_edit_columns\";s:29:\"Enable Batch Edit for Columns\";s:10:\"delete_all\";s:10:\"Delete All\";s:19:\"open_linked_element\";s:19:\"Open linked Element\";s:12:\"mark_as_read\";s:12:\"Mark as read\";s:6:\"sender\";s:6:\"Sender\";s:13:\"notifications\";s:13:\"Notifications\";s:18:\"notifications_send\";s:18:\"Send Notifications\";s:5:\"group\";s:5:\"Group\";s:10:\"attachment\";s:10:\"Attachment\";s:26:\"notification_has_been_sent\";s:26:\"Notification has been sent\";s:9:\"recipient\";s:9:\"Recipient\";s:22:\"this_field_is_required\";s:22:\"This field is required\";s:35:\"paste_recursive_as_language_variant\";s:41:\"Paste as new language variant (recursive)\";s:27:\"paste_no_new_language_error\";s:54:\"All system languages already linked to source element.\";s:18:\"embedded_meta_data\";s:18:\"Embedded Meta Info\";s:8:\"duration\";s:8:\"Duration\";s:16:\"group_icon_class\";s:16:\"Group Icon Class\";s:25:\"custom_report_permissions\";s:10:\"Permission\";s:16:\"visible_to_users\";s:16:\"Visible To Users\";s:16:\"visible_to_roles\";s:16:\"Visible To Roles\";s:55:\"paste_recursive_as_language_variant_updating_references\";s:47:\"Paste language (recursive), updating references\";s:25:\"redirects_expired_cleanup\";s:25:\"Cleanup Expired Redirects\";s:25:\"redirects_cleanup_warning\";s:48:\"Do you really want to cleanup expired redirects?\";s:23:\"redirects_cleanup_error\";s:52:\"An error occurred while cleanup of expired redirects\";s:12:\"auto_convert\";s:20:\"Automatic conversion\";s:19:\"split_view_settings\";s:19:\"Split View Settings\";s:17:\"enable_split_view\";s:17:\"Enable Split View\";s:18:\"disable_split_view\";s:18:\"Disable Split View\";s:29:\"split_view_object_dirty_title\";s:14:\"Please confirm\";s:27:\"split_view_object_dirty_msg\";s:73:\"There are unsaved modifications. You will lose all changes. Are you sure?\";s:16:\"all_translations\";s:16:\"All Translations\";s:11:\"set_to_null\";s:19:\"Empty (set to null)\";s:12:\"unit_tooltip\";s:25:\"Alternative units tooltip\";s:23:\"share_via_notifications\";s:23:\"Share via Notifications\";s:14:\"asset_metadata\";s:14:\"Asset Metadata\";s:19:\"predefined_metadata\";s:19:\"Predefined Metadata\";s:16:\"default_metadata\";s:16:\"Default Metadata\";s:20:\"asset_export_warning\";s:115:\"Please note that the export does not support some fields(e.g. preview, size). Press OK to continue with the export.\";s:15:\"paste_clipboard\";s:15:\"Paste Clipboard\";s:10:\"paste_here\";s:30:\"Paste your clipboard data here\";s:61:\"cannot_save_metadata_please_try_to_edit_the_metadata_in_asset\";s:75:\"<b>Cannot save Metadata!</b><br />Please try to edit the metadata in Asset.\";s:17:\"email_log_forward\";s:13:\"Forward email\";s:24:\"complete_required_fields\";s:66:\"Please complete following required fields to publish the document:\";s:21:\"detect_image_features\";s:21:\"Detect Image Features\";s:21:\"remove_image_features\";s:21:\"Remove Image Features\";s:15:\"available_sites\";s:15:\"Available Sites\";s:19:\"no_action_available\";s:19:\"No action available\";s:8:\"fallback\";s:8:\"Fallback\";s:8:\"add_site\";s:8:\"Add Site\";s:18:\"domain_label_width\";s:18:\"Domain label width\";s:19:\"enable_grid_locking\";s:19:\"Enable grid locking\";s:28:\"redirect_performance_warning\";s:117:\"Using this feature has very bad effects on the performance of the entire application, do you really want to continue?\";s:13:\"Uncategorized\";s:13:\"Uncategorized\";s:7:\"methods\";s:7:\"Methods\";s:23:\"default_value_generator\";s:39:\"Default value generator service / class\";s:20:\"export_configuration\";s:28:\"Export Configuration As JSON\";s:13:\"property_name\";s:13:\"Property name\";s:11:\"force_value\";s:11:\"Force value\";s:17:\"composite_indices\";s:17:\"Composite indices\";s:11:\"fieldlookup\";s:12:\"Field Lookup\";s:16:\"show_fieldlookup\";s:17:\"Show Field Lookup\";s:12:\"no_value_set\";s:12:\"no value set\";s:21:\"batch_change_language\";s:21:\"Batch update language\";s:26:\"generate_type_declarations\";s:26:\"Generate Type Declarations\";s:19:\"brick_limit_reached\";s:51:\"Limit ({bricklimit}) reached for brick: {brickname}\";s:12:\"preview_item\";s:12:\"Preview Item\";s:35:\"version_currently_saved_in_database\";s:47:\"Currently saved in database (but not published)\";s:18:\"deprecated_feature\";s:67:\"<p style=\'color: orange;\'>Deprecated feature. Use %s<br>instead</p>\";s:29:\"invert_colors_on_login_screen\";s:29:\"Invert Colors on Login Screen\";s:12:\"encrypt_data\";s:12:\"Encrypt Data\";s:24:\"encrypt_data_description\";s:78:\"Data-at-Rest/Tablespace Encryption needs to be enabled on your Database Server\";s:20:\"many_to_one_relation\";s:20:\"Many-To-One Relation\";s:21:\"many_to_many_relation\";s:21:\"Many-To-Many Relation\";s:28:\"many_to_many_object_relation\";s:28:\"Many-To-Many Object Relation\";s:30:\"advanced_many_to_many_relation\";s:30:\"Advanced Many-To-Many Relation\";s:37:\"advanced_many_to_many_object_relation\";s:37:\"Advanced Many-To-Many Object Relation\";s:23:\"reverse_object_relation\";s:23:\"Reverse Object Relation\";s:8:\"url_slug\";s:8:\"URL Slug\";s:22:\"url_slug_datatype_info\";s:101:\"Enter the controller & action in the following format:<br>App\\Controller\\ProductController:slugAction\";s:17:\"controller_action\";s:19:\"Controller & Action\";s:15:\"admin_interface\";s:15:\"Admin Interface\";s:12:\"icon_library\";s:12:\"Icon Library\";s:36:\"system_performance_stability_warning\";s:281:\"Please do not perform this action unless you are sure what you are doing.<br /><b style=\'color:red\'>This action can have a major impact onto the stability and performance of the entire system, and may causes an overload or complete crash of the server!</b><br /><br />Are you sure?\";s:12:\"login_screen\";s:12:\"Login Screen\";s:17:\"color_description\";s:36:\"Use the HTML hex format, eg. #ffffff\";s:6:\"colors\";s:6:\"Colors\";s:5:\"media\";s:5:\"Media\";s:11:\"custom_logo\";s:11:\"Custom Logo\";s:29:\"custom_login_background_image\";s:29:\"Custom Login Background Image\";s:25:\"branding_logo_description\";s:96:\"Used on the login and start screen. We recommend to use a SVG (JPG & PNG are supported as well).\";s:23:\"appearance_and_branding\";s:21:\"Appearance & Branding\";s:10:\"brightness\";s:10:\"Brightness\";s:10:\"saturation\";s:10:\"Saturation\";s:3:\"hue\";s:3:\"Hue\";s:14:\"addoverlay_fit\";s:15:\"Add Overlay Fit\";s:12:\"environments\";s:12:\"Environments\";s:4:\"test\";s:4:\"Test\";s:10:\"colorspace\";s:10:\"Colorspace\";s:5:\"ratio\";s:5:\"Ratio\";s:12:\"decimal_size\";s:12:\"Decimal size\";s:17:\"decimal_precision\";s:17:\"Decimal precision\";s:23:\"decimal_mysql_type_info\";s:202:\"If decimal size or precision are specified, <code>DECIMAL(decimalSize, decimalPrecision)</code> MySQL type is used. Default values if missing are <code>64</code> as size and <code>0</code> as precision.\";s:33:\"decimal_mysql_type_naming_warning\";s:162:\"Please note that in MySQL terms, the <code>decimalSize</code> is called <code>precision</code> and the <code>decimalPrecision</code> is called <code>scale</code>.\";s:13:\"only_unsigned\";s:13:\"only unsigned\";s:7:\"integer\";s:7:\"Integer\";s:17:\"object_regex_info\";s:57:\"RegExp without delimiters, has to work in both JS and PHP\";s:16:\"regex_validation\";s:29:\"Regular Expression Validation\";s:11:\"test_string\";s:11:\"Test string\";s:5:\"regex\";s:5:\"RegEx\";s:16:\"code_before_init\";s:16:\"Code before init\";s:19:\"code_after_pageview\";s:19:\"Code after pageview\";s:20:\"code_before_pageview\";s:20:\"Code before pageview\";s:17:\"select_presetting\";s:19:\"Select a presetting\";s:4:\"good\";s:4:\"Good\";s:4:\"best\";s:4:\"Best\";s:21:\"1x1_pixel_placeholder\";s:21:\"1x1 Pixel Placeholder\";s:33:\"1x1_pixel_placeholder_description\";s:111:\"Just returns a 1x1 pixel GIF base64 encoded, in case you don\'t want to display an image for a certain condition\";s:7:\"average\";s:7:\"Average\";s:17:\"enter_media_query\";s:36:\"Please enter a valid CSS media query\";s:15:\"add_media_query\";s:15:\"Add Media Query\";s:17:\"add_media_segment\";s:17:\"Add Media Segment\";s:19:\"enter_media_segment\";s:68:\"Please enter a valid bitrate(e.g. 400k, 1500k, 1M) for video segment\";s:18:\"dash_media_message\";s:70:\"This option generates a single .mpd file with media segments(bitrates)\";s:17:\"specific_settings\";s:17:\"Specific Settings\";s:30:\"login_as_this_user_description\";s:100:\"The following link is a temporary link that allows you to login as this user in a different browser:\";s:18:\"login_as_this_user\";s:41:\"Login as this user in a different browser\";s:23:\"allowed_types_to_create\";s:23:\"Allowed types to create\";s:15:\"defaults_to_all\";s:15:\"Defaults to all\";s:33:\"analytics_universal_configuration\";s:74:\"Universal/GTag Analytics Configuration eg. {\'cookieDomain\': \'example.com\'}\";s:37:\"use_different_email_delivery_settings\";s:53:\"Use different email delivery settings for newsletters\";s:12:\"action_scope\";s:12:\"Action Scope\";s:3:\"hit\";s:3:\"Hit\";s:7:\"session\";s:7:\"Session\";s:22:\"session_with_variables\";s:24:\"Session (with variables)\";s:17:\"targeting_visitor\";s:7:\"Visitor\";s:58:\"targeting_condition_visited_page_before_piwik_data_warning\";s:92:\"This condition fetches data synchronously from Piwik which can be quite slow. Use with care!\";s:68:\"targeting_condition_visited_page_before_piwik_not_configured_warning\";s:93:\"This condition cannot be matched as Piwik is not configured and will always resolve to false.\";s:31:\"targeting_condition_url_pattern\";s:12:\"URL (RegExp)\";s:30:\"targeting_toolbar_browser_note\";s:253:\"<b>NOTE:</b> Enabling the targeting toolbar affects only the browser you are currently using. If you want to use the toolbar on another browser you need to enable it again. See <a target=\'_blank\' href=\'{targetingLink}\'>the documentation</a> for details.\";s:28:\"microsoft_word_export_notice\";s:361:\"<ul><li>It is not possible to re-import this export</li><li>The export file-format is HTML, which can be perfectly opened with Word</li><li>This export doesn\'t include the full layout information (just basic text-formatting)</li><li>The language selection is used to set the language for object\'s localized fields (only localized fields are exported!)</li></ul>\";s:18:\"fallback_languages\";s:37:\"Fallback Languages (CSV eg. de_CH,de)\";s:12:\"add_language\";s:12:\"Add Language\";s:16:\"default_language\";s:16:\"Default language\";s:23:\"wildcards_are_supported\";s:23:\"Wildcards are supported\";s:37:\"localization_and_internationalization\";s:39:\"Localization &amp; Internationalization\";s:13:\"code_settings\";s:13:\"Code Settings\";s:20:\"advanced_integration\";s:20:\"Advanced Integration\";s:26:\"assign_target_group_weight\";s:6:\"Weight\";s:12:\"target_group\";s:12:\"Target Group\";s:24:\"target_group_multiselect\";s:24:\"Target Group Multiselect\";s:21:\"select_a_target_group\";s:21:\"Select a Target Group\";s:25:\"turn_off_usage_statistics\";s:25:\"Turn off usage statistics\";s:8:\"children\";s:8:\"Children\";s:18:\"elements_to_export\";s:18:\"Elements to Export\";s:22:\"xliff_export_documents\";s:408:\"If you want to translate eg. the whole /en tree to a different language, first create a copy of the /en tree. Afterwards use the copied tree in the export and select the source language \'en\' and the target language \'de\'. When importing the translated XLIFF file, the contents of the exported documents (in this case the copied tree documents) will be overwritten by the German translations in the XLIFF file.\";s:20:\"xliff_export_objects\";s:301:\"Only fields inside a Localized Fields container are recognized. When importing the translated XLIFF the source language will be untouched, only the target language fields will be overwritten. Use Relations checkbox to include Objects & Documents from Dependencies e.g. Relation fields, Properties etc.\";s:19:\"xliff_export_notice\";s:90:\"Here you can select the documents and objects you want to export for external translation.\";s:16:\"important_notice\";s:16:\"Important Notice\";s:19:\"xliff_import_notice\";s:268:\"Select a translated XLIFF file which was previously exported by pimcore and then translated by a localization service provider (LSP) or by a CAT application. Please aware that the import will overwrite the elements which were selected by the import (read also export).\";s:9:\"composite\";s:9:\"Composite\";s:6:\"origin\";s:6:\"Origin\";s:15:\"high_resolution\";s:15:\"High Resolution\";s:19:\"pass_through_params\";s:19:\"Pass Through Params\";s:25:\"redirects_type_entire_uri\";s:10:\"Entire URI\";s:25:\"redirects_type_path_query\";s:14:\"Path and Query\";s:20:\"redirects_csv_import\";s:20:\"Redirects CSV Import\";s:22:\"redirects_import_total\";s:5:\"Total\";s:24:\"redirects_import_created\";s:7:\"Created\";s:24:\"redirects_import_updated\";s:7:\"Updated\";s:24:\"redirects_import_errored\";s:7:\"Errored\";s:23:\"redirects_import_errors\";s:6:\"Errors\";s:27:\"redirects_import_error_line\";s:4:\"Line\";s:19:\"analytics_gtag_code\";s:31:\"Use the gtag code for analytics\";s:26:\"analytics_retargeting_code\";s:46:\"Use the retargeting-code for analytics (dc.js)\";s:27:\"analytics_asynchronous_code\";s:47:\"Use the asynchronous code for analytics (ga.js)\";s:17:\"newsletter_active\";s:17:\"Newsletter Active\";s:20:\"newsletter_confirmed\";s:20:\"Newsletter Confirmed\";s:6:\"gender\";s:6:\"Gender\";s:17:\"use_original_tiff\";s:30:\"Use original TIFF (only PRINT)\";s:29:\"use_original_tiff_description\";s:73:\"Use original TIFF when source format is a TIFF image -> do not modify it.\";s:4:\"port\";s:4:\"Port\";s:17:\"delivery_settings\";s:17:\"Delivery Settings\";s:17:\"generate_previews\";s:17:\"Generate previews\";s:18:\"invalid_class_name\";s:18:\"Invalid Class Name\";s:39:\"redirect_unknown_domains_to_main_domain\";s:96:\"Redirect unknown domains (not used for a site and for redirects, ...) to the main domain (above)\";s:5:\"hours\";s:5:\"Hours\";s:7:\"minutes\";s:7:\"Minutes\";s:7:\"seconds\";s:7:\"Seconds\";s:16:\"operating_system\";s:16:\"Operating System\";s:17:\"hardware_platform\";s:17:\"Hardware Platform\";s:12:\"time_on_site\";s:12:\"Time on site\";s:27:\"visited_pages_before_number\";s:22:\"Visited n-pages before\";s:6:\"number\";s:6:\"Number\";s:19:\"visited_page_before\";s:19:\"Visited page before\";s:12:\"searchengine\";s:13:\"Search Engine\";s:8:\"referrer\";s:8:\"Referrer\";s:14:\"referring_site\";s:14:\"Referring Site\";s:3:\"AND\";s:3:\"AND\";s:2:\"OR\";s:2:\"OR\";s:7:\"AND_NOT\";s:7:\"AND NOT\";s:12:\"radius_in_km\";s:11:\"Radius (km)\";s:8:\"redirect\";s:8:\"Redirect\";s:12:\"code_snippet\";s:12:\"Code-Snippet\";s:7:\"browser\";s:7:\"Browser\";s:10:\"conditions\";s:10:\"Conditions\";s:10:\"save_order\";s:10:\"Save Order\";s:24:\"debug_admin_translations\";s:39:\"Debug Admin-Translations (wrapped in +)\";s:9:\"short_url\";s:9:\"Short URL\";s:39:\"width_and_height_must_be_an_even_number\";s:39:\"width and height must be an even number\";s:11:\"source_site\";s:11:\"Source-Site\";s:11:\"target_site\";s:11:\"Target-Site\";s:17:\"source_entire_url\";s:20:\"Entire URL as Source\";s:20:\"analytics_internalid\";s:14:\"GA Internal ID\";s:30:\"analytics_settings_description\";s:116:\"To use the complete Google Analytics integration, please configure the Google API Service Account in System Settings\";s:11:\"upload_path\";s:11:\"Upload Path\";s:17:\"selection_options\";s:17:\"Selection Options\";s:6:\"expiry\";s:6:\"Expiry\";s:6:\"mobile\";s:6:\"Mobile\";s:13:\"group_by_path\";s:13:\"Group by path\";s:5:\"flush\";s:5:\"Flush\";s:27:\"errors_from_the_last_7_days\";s:27:\"Errors from the last 7 days\";s:18:\"show_close_warning\";s:18:\"Show close warning\";s:13:\"matching_text\";s:13:\"Matching Text\";s:3:\"any\";s:3:\"Any\";s:11:\"http_method\";s:11:\"HTTP Method\";s:11:\"url_pattern\";s:40:\"URL Pattern<br />(RegExp eg. @success@i)\";s:9:\"beginning\";s:9:\"Beginning\";s:20:\"element_css_selector\";s:22:\"Element (CSS Selector)\";s:15:\"insert_position\";s:15:\"Insert Position\";s:31:\"robots_txt_exists_on_filesystem\";s:68:\"The robots.txt exists already in the document-root on the filesystem\";s:67:\"only_required_for_reporting_in_pimcore_but_not_for_code_integration\";s:143:\"The following is only required if you want to use the reporting functionalities in pimcore, but this is not required for the code integration. \";s:10:\"save_error\";s:16:\"Cannot save data\";s:9:\"all_roles\";s:9:\"All Roles\";s:8:\"add_role\";s:8:\"Add Role\";s:19:\"role_creation_error\";s:21:\"Could not create role\";s:10:\"workspaces\";s:10:\"Workspaces\";s:8:\"Username\";s:8:\"Username\";s:13:\"video_bitrate\";s:20:\"Video Bitrate (kB/s)\";s:13:\"audio_bitrate\";s:20:\"Audio Bitrate (kB/s)\";s:13:\"rasterize_svg\";s:14:\"Rasterize SVGs\";s:23:\"rasterize_svg_info_text\";s:107:\"SVGs get automatically rasterized when a transformation other than resize or scale by width/height is used.\";s:18:\"preserve_animation\";s:27:\"Preserve animations for GIF\";s:28:\"preserve_animation_info_text\";s:89:\"Supported transformations are: Frame, Cover, Contain, Resize, ScaleByWidth, ScaleByHeight\";s:36:\"valid_languages_frontend_description\";s:323:\"These settings are used in documents to specify the content language (in properties tab), for objects in localized-fields, for shared translations, ... simply everywhere the editor can choose or use a language for the content.<br />Fallback languages are currently used in object\'s localized fields and shared translations.\";s:20:\"delete_language_note\";s:152:\"Note: Removing language from the list will not delete its respective data. Please use console command \'pimcore:locale:delete-unused-tables\' for cleanup.\";s:13:\"maximum_items\";s:10:\"max. items\";s:9:\"collapsed\";s:9:\"Collapsed\";s:35:\"url_to_custom_image_on_login_screen\";s:40:\"URL to custom image for the login screen\";s:5:\"sepia\";s:5:\"Sepia\";s:7:\"sharpen\";s:7:\"Sharpen\";s:12:\"gaussianBlur\";s:13:\"Gaussian Blur\";s:6:\"radius\";s:6:\"Radius\";s:5:\"sigma\";s:5:\"Sigma\";s:9:\"threshold\";s:9:\"Threshold\";s:9:\"tolerance\";s:9:\"Tolerance\";s:9:\"grayscale\";s:9:\"Grayscale\";s:20:\"nothing_to_configure\";s:20:\"Nothing to configure\";s:11:\"preview_url\";s:11:\"Preview URL\";s:7:\"opacity\";s:7:\"Opacity\";s:9:\"applymask\";s:10:\"Apply Mask\";s:10:\"addoverlay\";s:11:\"Add Overlay\";s:15:\"transformations\";s:15:\"Transformations\";s:50:\"you_can_drag_the_tabs_to_reorder_the_media_queries\";s:66:\"You can drag the tabs to reorder the priority of the media queries\";s:5:\"frame\";s:5:\"Frame\";s:18:\"setbackgroundcolor\";s:19:\"Set Backgroundcolor\";s:18:\"setbackgroundimage\";s:20:\"Set Background Image\";s:12:\"roundcorners\";s:13:\"Round Corners\";s:6:\"rotate\";s:6:\"Rotate\";s:5:\"color\";s:5:\"Color\";s:5:\"angle\";s:5:\"Angle\";s:11:\"label_width\";s:11:\"Label Width\";s:11:\"label_align\";s:11:\"Label Align\";s:16:\"label_first_cell\";s:16:\"Label First Cell\";s:56:\"please_dont_forget_to_reload_pimcore_after_modifications\";s:82:\"Please don\'t forget to clear the cache and reload pimcore after your modifications\";s:22:\"clear_cache_and_reload\";s:22:\"Clear cache and reload\";s:42:\"extension_manager_state_change_not_allowed\";s:49:\"State changes are not allowed for this extension.\";s:6:\"enable\";s:6:\"Enable\";s:7:\"disable\";s:7:\"Disable\";s:9:\"configure\";s:9:\"Configure\";s:14:\"beginning_with\";s:14:\"Beginning with\";s:14:\"matching_exact\";s:16:\"Matching exactly\";s:15:\"add_expert_mode\";s:17:\"Add (Expert Mode)\";s:17:\"add_beginner_mode\";s:14:\"Add (Beginner)\";s:6:\"lowest\";s:6:\"lowest\";s:7:\"highest\";s:7:\"highest\";s:12:\"override_all\";s:12:\"override all\";s:10:\"deactivate\";s:10:\"Deactivate\";s:18:\"countrymultiselect\";s:23:\"Countries (Multiselect)\";s:19:\"languagemultiselect\";s:23:\"Languages (Multiselect)\";s:3:\"yes\";s:3:\"Yes\";s:2:\"no\";s:2:\"No\";s:34:\"allow_trailing_slash_for_documents\";s:27:\"Allow trailing Slash in URL\";s:15:\"localizedfields\";s:16:\"Localized Fields\";s:10:\"new_folder\";s:10:\"New Folder\";s:8:\"new_file\";s:8:\"New File\";s:8:\"gridview\";s:9:\"Grid View\";s:31:\"visibility_of_system_properties\";s:31:\"Visibility of system properties\";s:9:\"translate\";s:9:\"translate\";s:23:\"translations_admin_hint\";s:52:\"HINT: Please Reload UI to apply translation changes!\";s:13:\"allowed_types\";s:13:\"Allowed Types\";s:12:\"columnlength\";s:12:\"Columnlength\";s:23:\"visible_in_searchresult\";s:24:\"Visible in Search Result\";s:19:\"visible_in_gridview\";s:20:\"Visible in Grid View\";s:16:\"fieldcollections\";s:17:\"Field-Collections\";s:5:\"block\";s:5:\"Block\";s:7:\"tooltip\";s:7:\"Tooltip\";s:16:\"decimalPrecision\";s:17:\"Decimal-Precision\";s:9:\"css_style\";s:9:\"CSS Style\";s:11:\"add_setting\";s:11:\"Add Setting\";s:7:\"reverse\";s:7:\"Reverse\";s:10:\"geopolygon\";s:18:\"Geographic Polygon\";s:11:\"geopolyline\";s:19:\"Geographic Polyline\";s:9:\"geobounds\";s:17:\"Geographic Bounds\";s:31:\"sure_to_install_unstable_update\";s:70:\"Are you sure that you want to install a potential not working version?\";s:19:\"analytics_accountid\";s:24:\"Account-ID (eg. 1234567)\";s:26:\"verification_filename_text\";s:67:\"Verification Filename<br /><small>required for verification</small>\";s:16:\"analytics_notice\";s:147:\"Please read the documentation about the Google Analytics integration first, for the advanced mode you have to modify the Google Analytics settings.\";s:22:\"analytics_trackid_code\";s:75:\"Track-ID (eg. UA-XXXXX-X)<br /><small>required for code integration</small>\";s:11:\"multiselect\";s:14:\"Multiselection\";s:7:\"handler\";s:7:\"Handler\";s:9:\"invisible\";s:9:\"Invisible\";s:25:\"only_configured_languages\";s:49:\"Show only in system settings configured languages\";s:11:\"permissions\";s:11:\"Permissions\";s:41:\"you_are_not_allowed_to_manage_admin_users\";s:41:\"You are not allowed to manage admin users\";s:12:\"content_type\";s:12:\"Content-Type\";s:12:\"new_property\";s:12:\"New Property\";s:9:\"all_users\";s:9:\"All Users\";s:5:\"admin\";s:5:\"Admin\";s:17:\"new_document_type\";s:17:\"New Document Type\";s:8:\"timezone\";s:8:\"Timezone\";s:4:\"host\";s:4:\"Host\";s:29:\"store_version_history_in_days\";s:32:\"Store version history for x Days\";s:30:\"store_version_history_in_steps\";s:33:\"Store version history for x Steps\";s:6:\"layout\";s:6:\"Layout\";s:20:\"add_layout_component\";s:20:\"Add Layout Component\";s:18:\"add_data_component\";s:18:\"Add Data Component\";s:9:\"accordion\";s:9:\"Accordion\";s:6:\"iframe\";s:16:\"Preview / Iframe\";s:8:\"fieldset\";s:8:\"Fieldset\";s:5:\"panel\";s:5:\"Panel\";s:8:\"tabpanel\";s:8:\"Tabpanel\";s:12:\"tab_position\";s:12:\"Tab Position\";s:7:\"pattern\";s:7:\"Pattern\";s:9:\"variables\";s:9:\"Variables\";s:8:\"defaults\";s:8:\"Defaults\";s:7:\"wysiwyg\";s:7:\"WYSIWYG\";s:7:\"objects\";s:7:\"Objects\";s:13:\"allow_inherit\";s:17:\"Allow inheritance\";s:16:\"parent_php_class\";s:16:\"Parent PHP Class\";s:21:\"implements_interfaces\";s:23:\"Implements interface(s)\";s:10:\"use_traits\";s:12:\"Use (traits)\";s:16:\"general_settings\";s:16:\"General Settings\";s:15:\"layout_settings\";s:31:\"Layout Settings (Pimcore Admin)\";s:6:\"region\";s:6:\"Region\";s:11:\"collapsible\";s:11:\"Collapsible\";s:15:\"allowed_classes\";s:15:\"Allowed classes\";s:12:\"display_name\";s:12:\"Display name\";s:12:\"not_editable\";s:12:\"Not editable\";s:5:\"index\";s:7:\"Indexed\";s:14:\"mandatoryfield\";s:15:\"Mandatory field\";s:7:\"install\";s:7:\"Install\";s:9:\"uninstall\";s:9:\"Uninstall\";s:27:\"some_fields_cannot_be_saved\";s:28:\"Some fields cannot be saved.\";s:4:\"icon\";s:4:\"Icon\";s:6:\"slider\";s:6:\"Slider\";s:6:\"domain\";s:24:\"Domain (eg. example.org)\";s:8:\"datetime\";s:11:\"Date & Time\";s:13:\"default_value\";s:13:\"Default value\";s:6:\"button\";s:6:\"Button\";s:8:\"priority\";s:8:\"Priority\";s:3:\"end\";s:3:\"End\";s:13:\"select_update\";s:13:\"Select update\";s:14:\"stable_updates\";s:24:\"Available stable updates\";s:18:\"non_stable_updates\";s:28:\"Available non-stable updates\";s:40:\"latest_pimcore_version_already_installed\";s:49:\"You have installed the latest version of pimcore.\";s:5:\"table\";s:5:\"Table\";s:4:\"rows\";s:4:\"Rows\";s:14:\"language_admin\";s:35:\"Default-Language in Admin-Interface\";s:16:\"exclude_patterns\";s:16:\"Exclude Patterns\";s:5:\"cover\";s:5:\"Cover\";s:7:\"contain\";s:7:\"Contain\";s:9:\"min_value\";s:10:\"min. Value\";s:9:\"max_value\";s:10:\"max. Value\";s:9:\"increment\";s:14:\"Increment Step\";s:8:\"vertical\";s:8:\"Vertical\";s:7:\"country\";s:7:\"Country\";s:10:\"zoom_level\";s:10:\"Zoom level\";s:8:\"map_type\";s:8:\"Map type\";s:7:\"roadmap\";s:7:\"Roadmap\";s:9:\"satellite\";s:9:\"Satellite\";s:6:\"hybrid\";s:6:\"Hybrid\";s:21:\"google_api_key_simple\";s:53:\"Google API Key (Simple API Access for Maps, CSE, ...)\";s:21:\"document_restrictions\";s:21:\"Document Restrictions\";s:18:\"asset_restrictions\";s:18:\"Asset Restrictions\";s:19:\"object_restrictions\";s:19:\"Object Restrictions\";s:15:\"allow_documents\";s:15:\"allow Documents\";s:12:\"allow_assets\";s:12:\"allow Assets\";s:13:\"allow_objects\";s:13:\"allow Objects\";s:18:\"allowed_types_hint\";s:19:\"(empty = allow all)\";s:22:\"allowed_document_types\";s:22:\"Allowed Document Types\";s:19:\"allowed_asset_types\";s:19:\"Allowed Asset Types\";s:7:\"website\";s:7:\"Website\";s:19:\"user_creation_error\";s:21:\"Could not create user\";s:21:\"email_debug_addresses\";s:21:\"Debug Email Addresses\";s:36:\"user_object_dependencies_description\";s:49:\"This user is referenced in the following objects:\";s:22:\"user_admin_description\";s:176:\"Admin users do not only automatically gain all permissions listed below, they are also allowed to perform all actions on documents, assets and objects without any restrictions.\";s:23:\"user_apikey_description\";s:52:\"API key required for web service access by this user\";s:6:\"apikey\";s:7:\"API Key\";s:12:\"lazy_loading\";s:12:\"lazy loading\";s:21:\"non_owner_description\";s:309:\"Non owner objects represent relations to an other object just in the same way as objects do. The difference is, that a non-owner object field is not the owner of the relation data, it is merely a view on data stored in other objects. Please choose the owner and field name where the data is originally stored.\";s:14:\"allow_variants\";s:14:\"Allow variants\";s:13:\"show_variants\";s:21:\"Show variants in tree\";s:19:\"allowed_class_field\";s:19:\"Allowed class/field\";s:15:\"structuredTable\";s:16:\"Structured Table\";s:8:\"position\";s:8:\"Position\";s:29:\"objectsMetadata_allowed_class\";s:13:\"Allowed Class\";s:30:\"objectsMetadata_visible_fields\";s:14:\"Visible Fields\";s:31:\"objectsMetadata_type_columnbool\";s:11:\"Column Bool\";s:32:\"objectsMetadata_type_multiselect\";s:11:\"Multiselect\";s:30:\"file_explorer_saved_file_error\";s:16:\"Cannot save file\";s:26:\"reserved_field_names_error\";s:54:\"Please do not use the following reserved field names: \";s:16:\"use_current_date\";s:16:\"Use current date\";s:31:\"inherited_default_value_warning\";s:94:\"The default value is used if either inheritance is deactivated or if the parent value is empty\";s:21:\"restrict_selection_to\";s:21:\"Restrict Selection To\";s:12:\"maximum_tabs\";s:22:\"Maximum number of tabs\";s:9:\"algorithm\";s:9:\"Algorithm\";s:4:\"salt\";s:4:\"Salt\";s:12:\"saltlocation\";s:13:\"Salt location\";s:13:\"custom_layout\";s:13:\"Custom Layout\";s:24:\"custom_layout_definition\";s:24:\"Custom Layout Definition\";s:24:\"configure_custom_layouts\";s:24:\"Configure Custom Layouts\";s:10:\"add_layout\";s:10:\"Add Layout\";s:13:\"delete_layout\";s:13:\"Delete Layout\";s:16:\"special_settings\";s:16:\"Special Settings\";s:14:\"custom_layouts\";s:14:\"Custom Layouts\";s:14:\"new_definition\";s:14:\"New Definition\";s:14:\"target_subtype\";s:11:\"Target Type\";s:9:\"mandatory\";s:9:\"Mandatory\";s:18:\"disallow_addremove\";s:19:\"Disallow Add/Remove\";s:16:\"disallow_reorder\";s:20:\"Dissallow Reordering\";s:17:\"reload_definition\";s:17:\"Reload Definition\";s:6:\"saving\";s:6:\"Saving\";s:10:\"definition\";s:10:\"Definition\";s:11:\"objectbrick\";s:12:\"Object Brick\";s:10:\"select_all\";s:10:\"Select All\";s:12:\"deselect_all\";s:12:\"Deselect All\";s:17:\"definitions_saved\";s:17:\"Definitions saved\";s:31:\"predefined_metadata_definitions\";s:31:\"Predefined Metadata Definitions\";s:14:\"default_layout\";s:21:\"Use as default layout\";s:19:\"hide_edit_image_tab\";s:19:\"Hide Edit Image Tab\";s:22:\"are_you_sure_recursive\";s:62:\"There child nodes which will be deleted as well! Are you sure?\";s:17:\"log_relatedobject\";s:14:\"Related object\";s:13:\"log_component\";s:9:\"Component\";s:15:\"log_search_form\";s:16:\"Search parameter\";s:15:\"log_search_type\";s:12:\"Logging type\";s:24:\"log_search_relatedobject\";s:19:\"Related object (id)\";s:13:\"log_timestamp\";s:9:\"Timestamp\";s:14:\"log_fileobject\";s:11:\"File object\";s:21:\"log_detailinformation\";s:18:\"Detail information\";s:36:\"classificationstore_group_definition\";s:6:\"Groups\";s:36:\"classificationstore_group_limitation\";s:16:\"Max. group items\";s:40:\"classificationstore_mbx_entergroup_title\";s:9:\"New Group\";s:41:\"classificationstore_mbx_entergroup_prompt\";s:10:\"Enter name\";s:38:\"classificationstore_error_addgroup_msg\";s:18:\"Error adding group\";s:31:\"classificationstore_invalidname\";s:12:\"Invalid name\";s:42:\"classificationstore_error_group_exists_msg\";s:35:\"Group with this name already exists\";s:30:\"classificationstore_properties\";s:15:\"Key Definitions\";s:38:\"classificationstore_mbx_enterkey_title\";s:7:\"New Key\";s:42:\"classificationstore_detailed_configuration\";s:22:\"Detailed Configuration\";s:35:\"classificationstore_detailed_config\";s:15:\"Detailed Config\";s:9:\"relations\";s:9:\"Relations\";s:9:\"localized\";s:9:\"Localized\";s:17:\"allowed_group_ids\";s:23:\"Allowed Group Ids (csv)\";s:6:\"key_id\";s:6:\"Key ID\";s:6:\"sorter\";s:6:\"Sorter\";s:34:\"classificationstore_tooltip_sorter\";s:43:\"Items with lower value will be listed first\";s:41:\"classificationstore_collection_definition\";s:17:\"Group Collections\";s:8:\"group_id\";s:8:\"Group ID\";s:10:\"collection\";s:10:\"Collection\";s:45:\"classificationstore_mbx_entercollection_title\";s:14:\"New Collection\";s:22:\"class_field_name_error\";s:33:\"Following field name has an error\";s:24:\"inputQuantityValue_field\";s:20:\"Input Quantity Value\";s:12:\"abbreviation\";s:12:\"Abbreviation\";s:8:\"longname\";s:8:\"Longname\";s:8:\"baseunit\";s:9:\"Base Unit\";s:19:\"quantityValue_units\";s:29:\"QuantityValue Unit Definition\";s:25:\"valid_quantityValue_units\";s:11:\"Valid units\";s:31:\"calculatedValue_calculatorclass\";s:16:\"Calculator class\";s:27:\"calculatedValue_explanation\";s:87:\"See the official documentation to learn more about which methods need to be implemented\";s:21:\"calculatedValue_field\";s:16:\"Calculated Value\";s:16:\"conversionFactor\";s:17:\"Conversion Factor\";s:16:\"conversionOffset\";s:17:\"Conversion Offset\";s:12:\"default_unit\";s:12:\"Default Unit\";s:13:\"min_max_times\";s:15:\"Min / Max Times\";s:5:\"reset\";s:5:\"Reset\";s:13:\"password_hint\";s:135:\"Password must contain at least 10 characters, one lowercase letter, one uppercase letter, one numeric digit, and one special character!\";s:15:\"editor_settings\";s:15:\"Editor Settings\";s:14:\"language_order\";s:14:\"Language Order\";s:13:\"preview_width\";s:13:\"Preview Width\";s:14:\"preview_height\";s:14:\"Preview Height\";s:9:\"url_width\";s:9:\"URL Width\";s:13:\"externalImage\";s:14:\"External Image\";s:7:\"log_pid\";s:3:\"PID\";s:35:\"search_console_settings_description\";s:112:\"To use the Google Search Console integration, please configure the Google API Service Account in System Settings\";s:14:\"fieldcontainer\";s:15:\"Field Container\";s:5:\"store\";s:5:\"Store\";s:18:\"edit_configuration\";s:24:\"Edit Store Configuration\";s:40:\"classificationstore_mbx_enterstore_title\";s:9:\"New Store\";s:41:\"classificationstore_mbx_enterstore_prompt\";s:16:\"Enter store name\";s:38:\"classificationstore_error_addstore_msg\";s:20:\"Error creating store\";s:14:\"search_for_key\";s:10:\"Search Key\";s:17:\"width_explanation\";s:147:\"The width of this component. A numeric value will be interpreted as the number of pixels; a string value will be treated as a CSS value with units.\";s:18:\"height_explanation\";s:148:\"The height of this component. A numeric value will be interpreted as the number of pixels; a string value will be treated as a CSS value with units.\";s:32:\"web2print_enable_in_default_view\";s:52:\"Enable Web2Print documents in default documents view\";s:36:\"web2print_enable_in_default_view_txt\";s:172:\"Enables Web2Print documents in default documents view in default perspective. Either activate this or create custom views and perspectives for managing Web2Print documents.\";s:14:\"web2print_tool\";s:4:\"Tool\";s:19:\"web2print_save_mode\";s:18:\"Document Save Mode\";s:23:\"web2print_save_mode_txt\";s:152:\"Document Save Mode = cleanup deletes all not used document elements for current document. This might be necessary for useage reports in print documents.\";s:29:\"web2print_pdfreactor_settings\";s:19:\"PDFreactor Settings\";s:16:\"web2print_server\";s:6:\"Server\";s:17:\"web2print_baseURL\";s:7:\"BaseURL\";s:21:\"web2print_baseURL_txt\";s:100:\"BaseURL for PDFreactor. This is prefixed to each relative url in print templates when creating PDFs.\";s:20:\"web2print_apiKey_txt\";s:80:\"If the PDFreactor instance is set up to require API keys, you can enter it here.\";s:17:\"web2print_licence\";s:7:\"Licence\";s:30:\"web2print_wkhtmltopdf_settings\";s:20:\"Wkhtmltopdf Settings\";s:28:\"web2print_wkhtmltopdf_binary\";s:18:\"wkhtmltopdf Binary\";s:29:\"web2print_wkhtmltopdf_options\";s:7:\"Options\";s:33:\"web2print_wkhtmltopdf_options_txt\";s:78:\"One per line with \'--\' and whitespace between key and value (e.g. --key value)\";s:18:\"web2print_hostname\";s:8:\"Hostname\";s:20:\"disable_tree_preview\";s:20:\"Disable Tree Preview\";s:14:\"PHP Class Name\";s:14:\"PHP Class Name\";s:20:\"editor_configuration\";s:20:\"Editor Configuration\";s:17:\"allow_dirty_close\";s:31:\"Disable unsaved content warning\";s:25:\"high_resolution_info_text\";s:173:\"eg. for Web-to-Print or everywhere where srcset is not possible/sufficient, not necessary for normal web-thumbnails, they automatically get a srcset attribute with 1x and 2x\";s:17:\"advanced_settings\";s:17:\"Advanced settings\";s:18:\"preserve_meta_data\";s:32:\"Preserve meta data (don\'t strip)\";s:14:\"preserve_color\";s:31:\"Preserve color (profile, space)\";s:28:\"thumbnail_preserve_info_text\";s:168:\"\'Preserve meta data\' and \'preserve color\' only works for transitions without compositions (frame, background color, ...) and color modifications (greyscale, sepia, ...)\";s:22:\"path_formatter_service\";s:25:\"Formatter Service / Class\";s:9:\"separated\";s:9:\"separated\";s:17:\"log_refresh_label\";s:13:\"Refresh every\";s:28:\"website_translation_settings\";s:27:\"Shared Translation Settings\";s:20:\"language_permissions\";s:51:\"Language Permissions (no view permission means all)\";s:15:\"rendering_class\";s:21:\"Custom Renderer class\";s:14:\"rendering_data\";s:23:\"Data passed to renderer\";s:18:\"web2print_protocol\";s:8:\"Protocol\";s:10:\"rows_fixed\";s:10:\"Rows fixed\";s:10:\"cols_fixed\";s:10:\"Cols fixed\";s:12:\"force_resize\";s:12:\"Force resize\";s:8:\"site_ids\";s:8:\"Site IDs\";s:16:\"site_ids_tooltip\";s:42:\"Provide a comma-seperated list of site IDs\";s:33:\"predefined_hotspot_data_templates\";s:25:\"Predefined data templates\";s:36:\"hide_locale_labels_when_tabs_reached\";s:39:\"Hide locale labels after number of tabs\";s:36:\"classificationstore_error_addkey_msg\";s:16:\"Error adding Key\";s:42:\"classificationstore_dialog_keygroup_search\";s:16:\"Key/Group Search\";s:22:\"options_provider_class\";s:38:\"Options Provider Class or Service Name\";s:21:\"options_provider_data\";s:21:\"Options Provider Data\";s:18:\"show_applogger_tab\";s:19:\"Show App Logger Tab\";s:7:\"analyze\";s:7:\"Analyze\";s:24:\"link_generator_reference\";s:35:\"Link Provider Class or Service Name\";s:27:\"preview_generator_reference\";s:39:\"Preview Generator Class or Service Name\";s:11:\"unique_qtip\";s:62:\"Unique constraint will added. No need to check \'index\' as well\";s:20:\"temporarily_disabled\";s:20:\"Temporarily disabled\";s:19:\"enabled_in_editmode\";s:19:\"Enabled in Editmode\";s:14:\"boolean_select\";s:14:\"Boolean Select\";s:9:\"yes_label\";s:16:\"Yes Display Name\";s:8:\"no_label\";s:15:\"No Display Name\";s:11:\"empty_label\";s:18:\"Empty Display Name\";s:35:\"gdpr_dataSource_sentMail_only_email\";s:27:\"Search only based on E-Mail\";s:12:\"imageGallery\";s:13:\"Image Gallery\";s:11:\"column_type\";s:11:\"Column Type\";s:14:\"encryptedField\";s:15:\"Encrypted Field\";s:8:\"datatype\";s:8:\"Datatype\";s:13:\"used_by_class\";s:14:\"Used by class:\";s:17:\"uses_these_bricks\";s:18:\"Uses these bricks:\";s:10:\"last_login\";s:10:\"Last Login\";s:23:\"multiselect_render_type\";s:11:\"Render Type\";s:36:\"please_dont_forget_to_reload_pimcore\";s:69:\"<b>Please don\'t forget to reload pimcore after your modification!</b>\";s:12:\"2fa_required\";s:34:\"Two Factor Authentication required\";s:16:\"2fa_reset_secret\";s:16:\"Reset 2FA Secret\";s:14:\"2fa_reset_done\";s:91:\"The 2FA secret was reset, the user can generate a new one after login (My Profile section).\";s:19:\"focal_point_support\";s:19:\"Focal Point Support\";s:19:\"default_positioning\";s:19:\"Default Positioning\";s:28:\"thumbnail_focal_point_notice\";s:161:\"The image is cropped automatically based on the focal point set on the source image. If no focal point is present, the default positioning setting below is used.\";s:10:\"iframe_url\";s:10:\"IFrame URL\";s:22:\"deactivate_maintenance\";s:22:\"Deactivate Maintenance\";s:16:\"maintenance_mode\";s:16:\"Maintenance Mode\";s:22:\"maintenance_not_active\";s:51:\"It seems that the maintenance isn\'t set up properly\";s:24:\"mail_settings_incomplete\";s:46:\"It seems that the mail settings are incomplete\";s:11:\"bulk_export\";s:11:\"Bulk Export\";s:11:\"bulk_import\";s:11:\"Bulk Import\";s:19:\"warning_bulk_import\";s:123:\"The Bulk Import will overwrite your class/fieldcollection/objectbrick definitions without warning! Do you want to continue?\";s:11:\"environment\";s:11:\"Environment\";s:5:\"local\";s:5:\"Local\";s:7:\"example\";s:7:\"Example\";s:17:\"send_as_html_mime\";s:17:\"Send as HTML/Mime\";s:18:\"send_as_plain_text\";s:18:\"Send as plain text\";s:15:\"send_test_email\";s:15:\"Send Test-Email\";s:11:\"main_domain\";s:11:\"Main Domain\";s:10:\"error_page\";s:10:\"Error Page\";s:18:\"additional_domains\";s:40:\"Additional Domains (one domain per line)\";s:23:\"redirect_to_main_domain\";s:42:\"Redirect additional domains to main domain\";s:13:\"debug_mode_on\";s:10:\"DEBUG MODE\";s:5:\"scope\";s:5:\"Scope\";s:10:\"icon_class\";s:10:\"Icon Class\";s:9:\"nice_name\";s:9:\"Nice Name\";s:20:\"create_menu_shortcut\";s:23:\"Create Shortcut in Menu\";s:7:\"display\";s:7:\"Display\";s:5:\"order\";s:5:\"Order\";s:11:\"filter_type\";s:11:\"Filter Type\";s:22:\"generate_page_previews\";s:22:\"Generate Page Previews\";s:28:\"custom_report_chart_settings\";s:14:\"Chart Settings\";s:23:\"custom_report_charttype\";s:10:\"Chart Type\";s:28:\"custom_report_charttype_none\";s:4:\"None\";s:27:\"custom_report_charttype_pie\";s:9:\"Pie Chart\";s:28:\"custom_report_charttype_line\";s:10:\"Line Chart\";s:27:\"custom_report_charttype_bar\";s:9:\"Bar Chart\";s:27:\"custom_report_chart_options\";s:27:\"Type specific Chart Options\";s:20:\"custom_report_x_axis\";s:6:\"X-Axis\";s:20:\"custom_report_y_axis\";s:6:\"Y-Axis\";s:24:\"custom_report_datacolumn\";s:11:\"Data Column\";s:25:\"custom_report_labelcolumn\";s:12:\"Label Column\";s:25:\"custom_report_only_filter\";s:11:\"Only Filter\";s:29:\"custom_report_filter_and_show\";s:15:\"Filter and Show\";s:30:\"custom_report_filter_drilldown\";s:16:\"Filter Drilldown\";s:26:\"no_further_sources_allowed\";s:31:\"No further data sources allowed\";s:20:\"column_configuration\";s:35:\"Manage & Share Column Configuration\";s:23:\"show_in_google_anaytics\";s:24:\"Show in Google Analytics\";s:5:\"style\";s:5:\"Style\";s:16:\"foreground_color\";s:16:\"Foreground Color\";s:16:\"background_color\";s:16:\"Background Color\";s:22:\"system_infos_and_tools\";s:19:\"System Info & Tools\";s:8:\"php_info\";s:8:\"PHP Info\";s:18:\"php_opcache_status\";s:18:\"PHP OPcache Status\";s:25:\"system_requirements_check\";s:25:\"System-Requirements Check\";s:11:\"server_info\";s:11:\"Server Info\";s:23:\"database_administration\";s:23:\"Database Administration\";s:94:\"important_use_imagick_pecl_extensions_for_best_results_gd_is_just_a_fallback_with_less_quality\";s:125:\"IMPORTANT: Use imagick PECL extension for best results, GDlib is just a fallback with limited functionality and less quality!\";s:4:\"trim\";s:4:\"Trim\";s:19:\"server_fileexplorer\";s:20:\"Server File Explorer\";s:8:\"add_user\";s:8:\"Add User\";s:16:\"direct_sql_query\";s:16:\"Direct SQL query\";s:11:\"use_as_site\";s:11:\"Use as site\";s:11:\"remove_site\";s:11:\"Remove Site\";s:9:\"edit_site\";s:9:\"Edit Site\";s:7:\"site_id\";s:7:\"Site ID\";s:16:\"website_settings\";s:16:\"Website Settings\";s:11:\"clear_cache\";s:11:\"Clear Cache\";s:10:\"extensions\";s:10:\"Extensions\";s:6:\"update\";s:6:\"Update\";s:15:\"system_settings\";s:15:\"System Settings\";s:16:\"image_thumbnails\";s:16:\"Image Thumbnails\";s:10:\"thumbnails\";s:10:\"Thumbnails\";s:5:\"cache\";s:5:\"Cache\";s:7:\"classes\";s:7:\"Classes\";s:13:\"static_routes\";s:13:\"Static Routes\";s:10:\"structured\";s:10:\"Structured\";s:3:\"geo\";s:10:\"Geographic\";s:7:\"loading\";s:7:\"Loading\";s:5:\"steps\";s:5:\"Steps\";s:8:\"database\";s:8:\"Database\";s:8:\"location\";s:8:\"Location\";s:5:\"every\";s:5:\"Every\";s:10:\"categories\";s:10:\"Categories\";s:8:\"revision\";s:5:\"Build\";s:12:\"objectbricks\";s:12:\"Objectbricks\";s:17:\"class_definitions\";s:17:\"Class Definitions\";s:21:\"custom_layout_changed\";s:74:\"Layout was changed in the meantime. Please reload the layout and try again\";s:14:\"rule_violation\";s:14:\"Rule Violation\";s:6:\"emails\";s:6:\"Emails\";s:18:\"log_applicationlog\";s:18:\"Application Logger\";s:20:\"classification_store\";s:20:\"Classification Store\";s:19:\"quantityValue_field\";s:14:\"Quantity Value\";s:8:\"expanded\";s:8:\"Expanded\";s:12:\"display_type\";s:12:\"Display Type\";s:19:\"custom_report_class\";s:12:\"Report class\";s:4:\"hide\";s:4:\"Hide\";s:21:\"clear_full_page_cache\";s:21:\"Clear Full Page Cache\";s:10:\"all_caches\";s:10:\"All Caches\";s:18:\"web2print_settings\";s:21:\"Web-to-Print Settings\";s:18:\"admin_translations\";s:18:\"Admin Translations\";s:4:\"lock\";s:4:\"Lock\";s:6:\"unlock\";s:6:\"Unlock\";s:28:\"lock_and_propagate_to_childs\";s:30:\"Lock and propagate to children\";s:32:\"unlock_and_propagate_to_children\";s:32:\"Unlock and propagate to children\";s:10:\"data_cache\";s:10:\"Data Cache\";s:18:\"listing_use_traits\";s:20:\"Listing Use (traits)\";s:24:\"listing_parent_php_class\";s:24:\"Listing Parent PHP Class\";s:15:\"expand_cs_group\";s:63:\"There are empty features not displayed here. Click to show them\";s:15:\"hide_empty_data\";s:15:\"Hide empty data\";s:16:\"class_attributes\";s:16:\"Class Attributes\";s:20:\"operator_group_other\";s:6:\"Others\";s:26:\"operator_group_transformer\";s:12:\"Transformers\";s:24:\"operator_group_extractor\";s:10:\"Extractors\";s:24:\"operator_group_formatter\";s:10:\"Formatters\";s:23:\"operator_group_renderer\";s:8:\"Renderer\";s:26:\"operator_renderer_settings\";s:17:\"Renderer Settings\";s:15:\"refresh_preview\";s:15:\"Refresh Preview\";s:14:\"show_charcount\";s:20:\"Show Character Count\";s:10:\"max_length\";s:10:\"Max Length\";s:14:\"reports_config\";s:14:\"Reports Config\";s:25:\"exclude_from_search_index\";s:37:\"Exclude from Backend Full-Text Search\";s:4:\"left\";s:4:\"left\";s:5:\"right\";s:5:\"right\";s:3:\"top\";s:3:\"top\";s:18:\"provide_split_view\";s:18:\"Provide Split View\";s:26:\"allow_multiple_assignments\";s:26:\"Allow Multiple Assignments\";s:23:\"enable_admin_async_load\";s:26:\"Enable Async Load in Admin\";s:27:\"async_loading_warning_block\";s:73:\"WARNING: Async Loading is NOT possible within Localized Fields and Blocks\";s:29:\"activate_column_configuration\";s:29:\"Activate Column Configuration\";s:26:\"table_column_configuration\";s:20:\"Column Configuration\";s:20:\"send_invitation_link\";s:20:\"Send Invitation Link\";s:15:\"invitation_sent\";s:21:\"Login Invitation sent\";s:20:\"invitation_link_sent\";s:60:\"A temporary login link has been sent to email address: \"%s\" \";s:32:\"classificationstore_group_by_key\";s:12:\"Group by key\";s:26:\"allow_to_create_new_object\";s:46:\"Allow to create a new object in relation field\";s:23:\"puppeteer_documentation\";s:9:\"Puppeteer\";s:38:\"web2print_headlesschrome_documentation\";s:20:\"Option Documentation\";s:48:\"web2print_headlesschrome_documentation_additions\";s:18:\"Additional Options\";s:53:\"web2print_headlesschrome_documentation_additions_text\";s:126:\"There are two additional options: \"header\" and \"footer\". This options need a URL, which returns the header or footer template.\";s:14:\"json_converter\";s:22:\"Formatting the Options\";s:19:\"json_converter_link\";s:14:\"JSON Formatter\";s:8:\"Category\";s:8:\"Category\";s:5:\"Color\";s:5:\"Color\";s:4:\"Euro\";s:4:\"Euro\";s:8:\"Material\";s:8:\"Material\";s:7:\"Product\";s:7:\"Product\";s:4:\"Shop\";s:4:\"Shop\";s:5:\"login\";s:5:\"login\";s:3:\"€\";s:3:\"€\";s:27:\"gdpr_dataSource_dataObjects\";s:12:\"Data Objects\";s:38:\"keybinding_searchAndReplaceAssignments\";s:28:\"Search & Replace Assignments\";s:9:\"parent_id\";s:9:\"Parent ID\";s:16:\"modificationDate\";s:17:\"Modification Date\";s:12:\"creationDate\";s:13:\"Creation Date\";s:29:\"keybinding_sharedTranslations\";s:19:\"Shared Translations\";s:25:\"classificationstore_group\";s:5:\"Group\";s:33:\"classificationstore_tag_col_group\";s:5:\"Group\";s:40:\"classificationstore_col_groupdescription\";s:5:\"Group\";s:24:\"keybinding_customReports\";s:14:\"Custom Reports\";s:4:\"none\";s:4:\"None\";s:19:\"redirects_type_path\";s:4:\"Path\";s:17:\"keybinding_robots\";s:10:\"robots.txt\";s:14:\"web2print_port\";s:4:\"Port\";s:13:\"email_subject\";s:7:\"Subject\";s:24:\"gdpr_dataSource_sentMail\";s:11:\"Sent Emails\";s:17:\"email_log_subject\";s:7:\"Subject\";s:31:\"gdpr_data_extractor_label_email\";s:13:\"Email Address\";s:20:\"web2print_colorspace\";s:10:\"Colorspace\";s:7:\"numeric\";s:6:\"Number\";s:17:\"newsletter_report\";s:13:\"Custom Report\";s:27:\"structuredtable_type_number\";s:6:\"Number\";s:27:\"objectsMetadata_type_number\";s:6:\"Number\";s:30:\"overwrite_object_with_same_key\";s:9:\"Overwrite\";s:23:\"keybinding_openDocument\";s:13:\"Open Document\";s:20:\"keybinding_openAsset\";s:10:\"Open Asset\";s:21:\"keybinding_openObject\";s:11:\"Open Object\";s:12:\"save_success\";s:19:\"Saved successfully!\";s:32:\"file_explorer_saved_file_success\";s:19:\"Saved successfully!\";s:14:\"workflow_notes\";s:5:\"Notes\";s:21:\"keybinding_openInTree\";s:12:\"Show in Tree\";s:8:\"2fa_code\";s:4:\"Code\";s:14:\"web2print_tags\";s:4:\"Tags\";s:15:\"web2print_links\";s:5:\"Links\";s:28:\"keybinding_seoDocumentEditor\";s:19:\"SEO Document Editor\";s:16:\"clear_temp_files\";s:21:\"Clear temporary files\";s:18:\"keybinding_reports\";s:7:\"Reports\";s:16:\"keybinding_roles\";s:5:\"Roles\";s:8:\"username\";s:8:\"Username\";s:8:\"password\";s:8:\"Password\";s:6:\"submit\";s:6:\"Submit\";s:13:\"cache_enabled\";s:6:\"Enable\";s:16:\"localized_fields\";s:16:\"Localized Fields\";s:17:\"field_collections\";s:17:\"Field-Collections\";s:9:\"col_label\";s:5:\"Label\";s:17:\"piwik_widget_site\";s:4:\"Site\";s:21:\"keybinding_recycleBin\";s:11:\"Recycle Bin\";s:14:\"email_log_data\";s:4:\"Data\";s:13:\"show_metainfo\";s:4:\"Info\";s:15:\"keybinding_save\";s:4:\"Save\";s:18:\"keybinding_publish\";s:7:\"Publish\";s:17:\"keybinding_rename\";s:6:\"Rename\";s:14:\"email_log_from\";s:4:\"From\";s:10:\"email_from\";s:4:\"From\";s:15:\"log_search_from\";s:4:\"From\";s:12:\"email_log_to\";s:2:\"To\";s:8:\"email_to\";s:2:\"To\";s:13:\"log_search_to\";s:2:\"To\";s:14:\"email_log_text\";s:4:\"Text\";s:25:\"structuredtable_type_text\";s:4:\"Text\";s:25:\"objectsMetadata_type_text\";s:4:\"Text\";s:18:\"pimcore_lable_text\";s:4:\"Text\";s:35:\"classificationstore_tag_col_keyName\";s:3:\"Key\";s:28:\"gdpr_data_extractor_label_id\";s:2:\"ID\";s:15:\"web2print_title\";s:5:\"Title\";s:12:\"config_title\";s:5:\"Title\";s:20:\"keybinding_unpublish\";s:9:\"Unpublish\";s:17:\"navigation_target\";s:6:\"Target\";s:8:\"log_type\";s:4:\"Type\";s:22:\"gdpr_dataSource_export\";s:6:\"Export\";s:19:\"keybinding_glossary\";s:8:\"Glossary\";s:16:\"keybinding_users\";s:5:\"Users\";s:33:\"classificationstore_configuration\";s:13:\"Configuration\";s:33:\"classificationstore_tag_col_value\";s:5:\"Value\";s:22:\"gdpr_dataSource_assets\";s:6:\"Assets\";s:25:\"structuredtable_type_bool\";s:8:\"Checkbox\";s:27:\"objectsMetadata_type_select\";s:6:\"Select\";s:7:\"boolean\";s:4:\"Bool\";s:25:\"objectsMetadata_type_bool\";s:4:\"Bool\";s:18:\"keybinding_refresh\";s:6:\"Reload\";s:17:\"web2print_version\";s:7:\"Version\";s:35:\"gdpr_data_extractor_label_firstname\";s:9:\"Firstname\";s:34:\"gdpr_data_extractor_label_lastname\";s:8:\"Lastname\";s:20:\"keybinding_redirects\";s:9:\"Redirects\";s:10:\"log_source\";s:6:\"Source\";s:40:\"classificationstore_error_addgroup_title\";s:5:\"Error\";s:38:\"classificationstore_error_addkey_title\";s:5:\"Error\";s:20:\"element_lock_message\";s:58:\"The desired element is currently opened by another person:\";s:16:\"web2print_apiKey\";s:7:\"API Key\";s:12:\"customlayout\";s:13:\"Custom Layout\";s:24:\"special_settings_tooltip\";s:16:\"Special Settings\";s:19:\"application_logging\";s:18:\"Application Logger\";s:28:\"keybinding_applicationLogger\";s:18:\"Application Logger\";s:20:\"log_search_component\";s:9:\"Component\";s:11:\"log_message\";s:7:\"Message\";s:31:\"classificationstore_menu_config\";s:20:\"Classification Store\";s:19:\"classificationstore\";s:20:\"Classification Store\";s:39:\"classificationstore_mbx_enterkey_prompt\";s:10:\"Enter name\";s:43:\"classificationstore_error_addcollection_msg\";s:18:\"Error adding group\";s:13:\"quantityValue\";s:14:\"Quantity Value\";s:18:\"inputQuantityValue\";s:20:\"Input Quantity Value\";s:15:\"calculatedValue\";s:16:\"Calculated Value\";s:27:\"keybinding_tagConfiguration\";s:17:\"Tag Configuration\";s:14:\"log_search_pid\";s:3:\"PID\";s:13:\"piwik_site_id\";s:7:\"Site ID\";s:27:\"substring_operator_settings\";s:8:\"Settings\";s:27:\"operator_substring_settings\";s:8:\"Settings\";s:26:\"delete_gridconfig_dblcheck\";s:39:\"Do you really want to delete this item?\";s:17:\"piwik_widget_date\";s:8:\"End date\";s:19:\"log_refresh_seconds\";s:7:\"Seconds\";s:12:\"email_log_cc\";s:2:\"Cc\";s:13:\"email_log_bcc\";s:3:\"Bcc\";s:23:\"keybinding_closeAllTabs\";s:14:\"Close all tabs\";s:10:\"log_search\";s:6:\"Search\";s:4:\"cols\";s:7:\"Columns\";s:16:\"log_reset_search\";s:5:\"Reset\";s:29:\"keybinding_showElementHistory\";s:24:\"Recently Opened Elements\";s:22:\"keybinding_quickSearch\";s:12:\"Quick Search\";s:23:\"keybinding_httpErrorLog\";s:11:\"HTTP Errors\";s:22:\"keybinding_notesEvents\";s:18:\"Notes &amp; Events\";s:22:\"keybinding_searchAsset\";s:13:\"Search Assets\";s:25:\"keybinding_searchDocument\";s:16:\"Search Documents\";s:23:\"keybinding_searchObject\";s:14:\"Search Objects\";s:6:\"routes\";s:13:\"Static Routes\";s:7:\"plugins\";s:7:\"Bundles\";s:18:\"log_search_message\";s:7:\"Message\";s:9:\"rgbaColor\";s:5:\"Color\";}s:14:\"admin+intl-icu\";a:1:{s:15:\"__pimcore_dummy\";s:12:\"only_a_dummy\";}}s:56:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0metadata\";a:0:{}s:57:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0resources\";a:0:{}s:54:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0locale\";s:2:\"en\";s:65:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0fallbackCatalogue\";N;s:54:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0parent\";N;}\";',	31536000,	1621015351),
(UNHEX('7472616E736C6174696F6E5F646174615F6464306262356335616562316230333232366531616162323937646432623137'),	's:119483:\"O:46:\"Symfony\\Component\\Translation\\MessageCatalogue\":6:{s:56:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0messages\";a:2:{s:5:\"admin\";a:2289:{s:15:\"__pimcore_dummy\";s:12:\"only_a_dummy\";s:19:\"unsupported_feature\";s:78:\"Caratteristica non supportata! Si prega di controllare i requisiti di sistema!\";s:20:\"screen_size_to_small\";s:109:\"La risoluzione del tuo schermo è troppo piccola per poter visualizzare correttamente l\'anteprima desiderata.\";s:32:\"too_many_children_for_recyclebin\";s:92:\"Questo elemento contiene troppi discendenti per questo non può essere spostato nel cestino.\";s:7:\"default\";s:11:\"Predefinito\";s:8:\"metadata\";s:8:\"Metadati\";s:13:\"email_address\";s:15:\"Indirizzo Email\";s:15:\"email_blacklist\";s:18:\"Indirizzi bloccati\";s:2:\"OK\";s:2:\"OK\";s:8:\"optional\";s:9:\"opzionale\";s:32:\"search_replace_assignments_error\";s:68:\"Selezionare gli oggetti da cui rimpiazzare e una nuova destinazione.\";s:40:\"replace_assignments_in_selected_elements\";s:45:\"Cambiare i compiti degli elementi selezionati\";s:26:\"search_replace_assignments\";s:19:\"Trova e sostituisci\";s:13:\"imageadvanced\";s:17:\"Immagine Avanzata\";s:21:\"filter_active_message\";s:38:\"Vuoi esportare solo i valori filtrati?\";s:12:\"close_others\";s:12:\"Chiudi Altri\";s:9:\"close_all\";s:12:\"Chiudi Tutto\";s:16:\"close_unmodified\";s:24:\"Chiudi se non modificati\";s:7:\"classid\";s:15:\"ID della Classe\";s:8:\"parentid\";s:13:\"ID del parent\";s:8:\"mimetype\";s:9:\"MIME-Type\";s:12:\"creationdate\";s:17:\"Data di creazione\";s:16:\"usermodification\";s:20:\"Modifica dell\'Utente\";s:9:\"userowner\";s:19:\"Utente proprietario\";s:9:\"languages\";s:6:\"Lingue\";s:24:\"password_was_not_changed\";s:56:\"La password non può essere cambiata perché poco sicura\";s:9:\"marketing\";s:9:\"Marketing\";s:29:\"clear_content_of_current_view\";s:38:\"Cancella il contenuto di questa pagina\";s:27:\"highlight_editable_elements\";s:26:\"Evidenza i campi editabili\";s:8:\"continue\";s:8:\"Continua\";s:24:\"you_have_unsaved_changes\";s:29:\"Non hai salvato i cambiamenti\";s:22:\"global_targeting_rules\";s:27:\"Regole per i Target globali\";s:15:\"personalization\";s:17:\"Personalizzazione\";s:19:\"shared_translations\";s:20:\"Traduzioni condivise\";s:9:\"textfield\";s:14:\"Campo di testo\";s:8:\"add_data\";s:13:\"Aggiungi dati\";s:11:\"add_hotspot\";s:16:\"Aggiungi hotspot\";s:22:\"add_marker_or_hotspots\";s:27:\"Aggiungi markers o hotspots\";s:14:\"custom_reports\";s:23:\"Rapporti personalizzati\";s:10:\"start_date\";s:14:\"Data di inizio\";s:19:\"start_date_relative\";s:33:\"Data di inizio (relativa ad oggi)\";s:8:\"end_date\";s:12:\"Data di fine\";s:17:\"end_date_relative\";s:31:\"Data di fine (relativa ad oggi)\";s:25:\"relative_date_description\";s:38:\"es. -1m +1d (d=giorni, m=mesi, y=anni)\";s:17:\"source_definition\";s:17:\"Definizione fonte\";s:16:\"clear_thumbnails\";s:21:\"Cancella le anteprime\";s:10:\"recipients\";s:11:\"Destinatari\";s:21:\"newsletter_send_error\";s:83:\"Non è possibile inviare la newsletter, contattare per favore con l\'amministratore!\";s:23:\"newsletter_sent_message\";s:167:\"La newsletter sta per essere inviata a tutti i destinatari; questo processo si compie in background e può durare fino ad un\'ora (nel frattempo puoi chiudere pimcore).\";s:59:\"do_you_really_want_to_send_the_newsletter_to_all_recipients\";s:58:\"Vuoi veramente inviare la newsletter a tutti i destinatari\";s:20:\"send_test_newsletter\";s:27:\"Inviare Newsletter di Prova\";s:15:\"send_newsletter\";s:23:\"Invia Newsletter Adesso\";s:13:\"object_filter\";s:14:\"Filtro Oggetto\";s:14:\"add_newsletter\";s:19:\"Aggiungi Newsletter\";s:10:\"newsletter\";s:10:\"Newsletter\";s:3:\"crm\";s:3:\"CRM\";s:12:\"notes_events\";s:13:\"Note & Eventi\";s:13:\"delete_folder\";s:18:\"Eliminare Cartella\";s:4:\"home\";s:6:\"Inizio\";s:7:\"subject\";s:7:\"Oggetto\";s:12:\"poster_image\";s:18:\"Immagine copertina\";s:6:\"tablet\";s:6:\"Tablet\";s:8:\"hardlink\";s:8:\"Hardlink\";s:10:\"convert_to\";s:11:\"Converti in\";s:7:\"replace\";s:11:\"Sostituisci\";s:9:\"targeting\";s:20:\"Puntamento obiettivo\";s:17:\"paste_inheritance\";s:17:\"Incolla (eredita)\";s:12:\"are_you_sure\";s:21:\"Sicuro di continuare?\";s:24:\"all_content_will_be_lost\";s:33:\"Tutto il contenuto andrà perduto\";s:23:\"content_master_document\";s:31:\"Contenuto del documento maestro\";s:9:\"overwrite\";s:11:\"Sovrascrivi\";s:24:\"click_right_to_overwrite\";s:44:\"Clicca con il tasto destro per sovrascrivere\";s:19:\"open_document_by_id\";s:14:\"Apri documento\";s:16:\"open_asset_by_id\";s:10:\"Apri asset\";s:17:\"open_object_by_id\";s:12:\"Apri oggetto\";s:17:\"element_not_found\";s:20:\"Elemento non trovato\";s:15:\"import_from_url\";s:17:\"Importa dalla URL\";s:40:\"do_you_really_want_to_leave_the_editmode\";s:40:\"Vuoi davvero uscire dalla modifica (NO!)\";s:31:\"or_specify_an_asset_image_below\";s:38:\"o specifica un elemento immagine sotto\";s:6:\"medium\";s:6:\"Medium\";s:18:\"saved_successfully\";s:21:\"Salvato correttamente\";s:8:\"qr_codes\";s:9:\"Codici QR\";s:7:\"element\";s:8:\"Elemento\";s:26:\"details_for_selected_event\";s:34:\"Dettagli dell\'elemento selezionato\";s:6:\"fields\";s:5:\"Campi\";s:24:\"not_possible_with_paging\";s:118:\"Purtroppo questa operazione non è possibile in elementi paginati, riorganizzare i dati per evitare pagine nell\'albero\";s:9:\"inherited\";s:9:\"Ereditato\";s:6:\"length\";s:9:\"Lunghezza\";s:12:\"show_in_tree\";s:18:\"Mostra nell\'albero\";s:10:\"exactmatch\";s:21:\"Corrispondenza esatta\";s:7:\"desktop\";s:7:\"Desktop\";s:7:\"drag_me\";s:10:\"Trascinami\";s:10:\"serverVars\";s:20:\"Variabili del server\";s:11:\"http_errors\";s:11:\"Errori HTTP\";s:10:\"attributes\";s:9:\"Attributi\";s:4:\"code\";s:6:\"Codice\";s:4:\"tags\";s:3:\"Tag\";s:21:\"Click here to proceed\";s:29:\"Fare click qui per continuare\";s:98:\"Your browser is not supported. Please install the latest version of one of the following browsers.\";s:110:\"Il vostro browser non è supportato. Vi preghiamo di installare l\'ultima versione di uno dei seguenti browsers\";s:18:\"open_in_new_window\";s:26:\"Apri in una nuova finestra\";s:13:\"limit_reached\";s:28:\"Il limite è stato raggiunto\";s:13:\"casesensitive\";s:28:\"rispetta maiuscole/minuscole\";s:12:\"path_aliases\";s:18:\"Alias dei percorsi\";s:10:\"pretty_url\";s:10:\"URL carino\";s:16:\"pretty_url_label\";s:64:\"URL carino (sovrascrive il percorso dall\'albero della struttura)\";s:26:\"search_engine_optimization\";s:44:\"Ottimizzazione per i motori di ricerca (SEO)\";s:26:\"password_cannot_be_changed\";s:36:\"La password non può essere cambiata\";s:12:\"old_password\";s:16:\"Vecchia Password\";s:12:\"new_password\";s:14:\"Nuova Password\";s:15:\"retype_password\";s:22:\"Riscrivere la Password\";s:19:\"seo_document_editor\";s:20:\"Editor Documento SEO\";s:7:\"reports\";s:8:\"Rapporti\";s:5:\"roles\";s:5:\"Ruoli\";s:8:\"Password\";s:8:\"Password\";s:20:\"Forgot your password\";s:20:\"Recupera la password\";s:13:\"Back to Login\";s:14:\"Torna al login\";s:76:\"Enter your username and pimcore will send a login link to your email address\";s:100:\"Inserisci il tuo nome utente e pimcore invierà un collegamento per l\'accesso al tuo indirizzo email\";s:26:\"Please check your mailbox.\";s:34:\"Controlla la tua casella di posta.\";s:5:\"Login\";s:7:\"Accesso\";s:6:\"Submit\";s:5:\"Invia\";s:59:\"A temporary login link has been sent to your email address.\";s:62:\"È stato inviato un link di login al vostro indirizzo di email\";s:38:\"use_current_player_position_as_preview\";s:53:\"Usare la posizione corrente del player come anteprima\";s:20:\"select_image_preview\";s:32:\"Selezionare l\'anteprima immagine\";s:21:\"preview_not_available\";s:25:\"Anteprima non disponibile\";s:6:\"status\";s:5:\"Stato\";s:25:\"video_preview_in_progress\";s:40:\"L\'anteprima per questo video è in corso\";s:54:\"php_cli_binary_and_or_ffmpeg_binary_setting_is_missing\";s:147:\"L\'eseguibile FFMPEG o PHP-CLI non sono disponibili, assicurati che entrambi siano installati/eseguibili e configurati nelle impostazioni di sistema\";s:16:\"video_thumbnails\";s:15:\"Anteprime video\";s:35:\"do_you_really_want_to_close_pimcore\";s:36:\"Si vuole veramente chiudere Pimcore?\";s:17:\"drop_element_here\";s:23:\"Spostare qui l\'elemento\";s:29:\"select_specific_area_of_image\";s:43:\"Selezionare un\'area specifica dell\'immagine\";s:35:\"paste_recursive_updating_references\";s:48:\"Incolla ricorsivamente aggiornando i riferimenti\";s:12:\"add_hardlink\";s:18:\"Aggiungi hard-link\";s:11:\"source_path\";s:16:\"Percorso origine\";s:22:\"properties_from_source\";s:47:\"Utilizza le proprietà del documento di origine\";s:18:\"childs_from_source\";s:47:\"Utilizza i discendenti del documento di origine\";s:28:\"click_right_for_more_options\";s:65:\"Fare click con il pulsante destro del mouse per ulteriori opzioni\";s:11:\"move_to_tab\";s:15:\"Spostati al Tab\";s:13:\"not_supported\";s:14:\"Non supportato\";s:9:\"edit_link\";s:13:\"Modifica Link\";s:6:\"resize\";s:12:\"Ridimensiona\";s:13:\"scalebyheight\";s:23:\"Ridimensiona in altezza\";s:12:\"scalebywidth\";s:24:\"Ridimensiona in ampiezza\";s:4:\"crop\";s:8:\"Ritaglia\";s:7:\"cleanup\";s:7:\"Pulizia\";s:29:\"this_element_cannot_be_edited\";s:42:\"Questo elemento non può essere modificato\";s:7:\"details\";s:8:\"Dettagli\";s:63:\"cannot_save_object_please_try_to_edit_the_object_in_detail_view\";s:87:\"<b>Impossibile salvare l\'Oggetto!</b><br/>Modificare l\'Oggetto nella vista dettagliata.\";s:4:\"size\";s:10:\"Dimensione\";s:13:\"select_a_file\";s:17:\"Seleziona un file\";s:25:\"upload_compatibility_mode\";s:38:\"Carica un file (modalità compatibile)\";s:45:\"the_system_is_in_maintenance_mode_please_wait\";s:48:\"Il sistema è in modalità manutenzione, attendi\";s:8:\"activate\";s:8:\"Attivare\";s:18:\"image_is_too_small\";s:58:\"L\'immagine è troppo piccola, selezionarne una più grande\";s:19:\"name_is_not_allowed\";s:25:\"Il nome non è consentito\";s:18:\"import_from_server\";s:18:\"Importa dal server\";s:12:\"upload_files\";s:12:\"Carica files\";s:10:\"upload_zip\";s:22:\"Carica un archivio ZIP\";s:13:\"document_root\";s:16:\"Radice Documento\";s:21:\"batch_change_selected\";s:45:\"Modifica in blocco degli elementi selezionati\";s:15:\"download_as_zip\";s:16:\"Scarica come ZIP\";s:6:\"locked\";s:8:\"Bloccato\";s:43:\"element_cannot_be_move_because_it_is_locked\";s:55:\"L\'elemento non può essere spostato perché è bloccato\";s:23:\"element_cannot_be_moved\";s:55:\"L\'elemento non può essere spostato in questa posizione\";s:22:\"no_collections_allowed\";s:27:\"Nessuna raccolta consentita\";s:16:\"filter_condition\";s:21:\"Condizioni del filtro\";s:9:\"all_types\";s:12:\"Tutti i tipi\";s:5:\"audio\";s:5:\"Audio\";s:5:\"video\";s:5:\"Video\";s:7:\"archive\";s:8:\"Archivio\";s:7:\"unknown\";s:11:\"Sconosciuto\";s:5:\"class\";s:6:\"Classe\";s:4:\"page\";s:6:\"Pagina\";s:7:\"snippet\";s:9:\"Frammento\";s:6:\"folder\";s:8:\"Cartella\";s:14:\"your_selection\";s:16:\"La tua selezione\";s:37:\"double_click_to_add_item_to_selection\";s:73:\"Fate doppio clic su un elemento a sinistra per aggiungerlo alla selezione\";s:5:\"label\";s:9:\"Etichetta\";s:17:\"error_auth_failed\";s:39:\"Autenticazione fallita!<br />Riprovare.\";s:21:\"error_session_expired\";s:48:\"Sessione scaduta!<br />Ripetere l\'autenticazione\";s:4:\"site\";s:4:\"Sito\";s:10:\"descending\";s:11:\"Decrescente\";s:9:\"ascending\";s:9:\"Crescente\";s:4:\"sort\";s:6:\"Ordina\";s:7:\"results\";s:9:\"Risultati\";s:9:\"dimension\";s:10:\"Dimensione\";s:6:\"metric\";s:7:\"Metrico\";s:7:\"segment\";s:8:\"Segmento\";s:13:\"data_explorer\";s:13:\"Data explorer\";s:10:\"navigation\";s:11:\"Navigazione\";s:9:\"entrances\";s:7:\"Entrate\";s:5:\"exits\";s:6:\"Uscite\";s:7:\"restore\";s:10:\"Ripristina\";s:6:\"amount\";s:7:\"Importo\";s:16:\"flush_recyclebin\";s:17:\"Svuota il cestino\";s:10:\"recyclebin\";s:7:\"Cestino\";s:9:\"deletedby\";s:13:\"Cancellato da\";s:18:\"open_select_editor\";s:26:\"Apri l\'editor di selezione\";s:6:\"ignore\";s:6:\"Ignora\";s:16:\"email_log_resend\";s:11:\"Invia Email\";s:27:\"email_log_resend_window_msg\";s:69:\"Conferma che intendi inviare di nuovo la Email a tutti i destinatari.\";s:11:\"select_site\";s:17:\"Seleziona un sito\";s:9:\"main_site\";s:15:\"Sito principale\";s:8:\"filename\";s:13:\"Nome del file\";s:20:\"unsupported_filetype\";s:27:\"Tipo di file non supportato\";s:39:\"email_log_resend_window_success_message\";s:61:\"La Email è stata inviata con successo a tutti i destinatari.\";s:37:\"email_log_resend_window_error_message\";s:60:\"Si è verificato un errore, la Email non è stata reinviata.\";s:10:\"error_jobs\";s:18:\"Operazione fallita\";s:12:\"batch_change\";s:27:\"Modifica in blocco di tutto\";s:16:\"batch_edit_field\";s:28:\"Modifica in blocco del campo\";s:9:\"published\";s:10:\"Pubblicato\";s:3:\"all\";s:5:\"tutti\";s:14:\"items_per_page\";s:15:\"Voci per pagina\";s:22:\"reload_pimcore_changes\";s:85:\"Occorre ricaricare Pimcore affinché le modifiche abbiano effetto, vuoi farlo adesso?\";s:4:\"info\";s:12:\"Informazioni\";s:2:\"or\";s:1:\"o\";s:14:\"paste_contents\";s:29:\"Incolla solo il contenuto qui\";s:14:\"paste_as_child\";s:19:\"Incolla come figlio\";s:25:\"paste_recursive_as_childs\";s:31:\"Incolla come figlio (ricorsivo)\";s:13:\"view_original\";s:14:\"Vedi originale\";s:4:\"feed\";s:6:\"Flusso\";s:14:\"no_items_found\";s:23:\"Nessun elemento trovato\";s:10:\"public_url\";s:12:\"URL pubblico\";s:9:\"pageviews\";s:12:\"Pagine viste\";s:6:\"visits\";s:6:\"Visite\";s:6:\"detail\";s:9:\"Dettaglio\";s:15:\"report_settings\";s:23:\"Impostazioni del report\";s:8:\"overview\";s:10:\"Panoramica\";s:16:\"visitor_overview\";s:21:\"Panoramica visitatori\";s:5:\"other\";s:5:\"Altri\";s:16:\"google_analytics\";s:16:\"Google Analytics\";s:21:\"reports_and_marketing\";s:20:\"Rapporti e Marketing\";s:25:\"save_only_scheduled_tasks\";s:36:\"Salva solo le operazioni pianificate\";s:15:\"modified_assets\";s:16:\"Media modificati\";s:22:\"modification_statistic\";s:32:\"Modifiche negli ultimi 31 giorni\";s:11:\"add_portlet\";s:20:\"Aggiungi una Portlet\";s:18:\"modified_documents\";s:20:\"Documenti modificati\";s:16:\"modified_objects\";s:18:\"Oggetti modificati\";s:7:\"welcome\";s:9:\"Benvenuto\";s:16:\"save_and_publish\";s:16:\"Salva e pubblica\";s:6:\"delete\";s:8:\"Cancella\";s:4:\"save\";s:5:\"Salva\";s:10:\"add_assets\";s:14:\"Aggiungi media\";s:7:\"preview\";s:9:\"Anteprima\";s:8:\"advanced\";s:8:\"Avanzato\";s:5:\"basic\";s:8:\"Semplice\";s:4:\"list\";s:5:\"Lista\";s:4:\"view\";s:4:\"Vedi\";s:7:\"publish\";s:8:\"Pubblica\";s:6:\"rename\";s:8:\"Rinomina\";s:8:\"settings\";s:12:\"Impostazioni\";s:10:\"properties\";s:10:\"Proprietà\";s:8:\"versions\";s:8:\"Versioni\";s:3:\"add\";s:8:\"Aggiungi\";s:4:\"date\";s:4:\"Data\";s:4:\"user\";s:6:\"Utente\";s:4:\"note\";s:4:\"Nota\";s:8:\"email_cc\";s:2:\"Cc\";s:9:\"email_bcc\";s:3:\"Bcc\";s:14:\"email_settings\";s:18:\"Impostazioni email\";s:35:\"email_settings_receiver_description\";s:237:\"Per specificare destinatari multipli separare l\'indirizzo email con un puntoevirgola. <br />Ad esempio: receiver@pimcore.org; receiver2@pimcore.org<br /> Per il campo \'Da\' puoi usare la sintassi <i>My Name &lt;my-name@example.com&gt;</i>\";s:10:\"email_logs\";s:13:\"Email inviate\";s:19:\"email_log_sent_Date\";s:13:\"Data di invio\";s:24:\"predefined_document_type\";s:29:\"Tipo di documento predefinito\";s:10:\"controller\";s:10:\"Controller\";s:6:\"action\";s:6:\"Azione\";s:7:\"actions\";s:6:\"Azioni\";s:8:\"template\";s:7:\"Modello\";s:3:\"key\";s:6:\"Chiave\";s:2:\"id\";s:2:\"ID\";s:4:\"name\";s:4:\"Nome\";s:5:\"title\";s:6:\"Titolo\";s:11:\"description\";s:11:\"Descrizione\";s:9:\"unpublish\";s:21:\"Annulla pubblicazione\";s:6:\"target\";s:9:\"Obiettivo\";s:4:\"type\";s:4:\"Tipo\";s:25:\"please_enter_the_new_name\";s:24:\"Inserisci il nuovo nome:\";s:8:\"add_page\";s:15:\"Aggiungi pagina\";s:11:\"add_snippet\";s:18:\"Aggiungi Frammento\";s:9:\"add_email\";s:14:\"Aggiungi email\";s:8:\"add_link\";s:21:\"Aggiungi collegamento\";s:4:\"copy\";s:5:\"Copia\";s:5:\"paste\";s:7:\"Incolla\";s:14:\"close_all_tabs\";s:18:\"Chiudi tutti i tab\";s:6:\"search\";s:5:\"Cerca\";s:6:\"import\";s:7:\"Importa\";s:6:\"export\";s:7:\"Esporta\";s:8:\"glossary\";s:9:\"Glossario\";s:14:\"document_types\";s:17:\"Tipi di documento\";s:21:\"predefined_properties\";s:22:\"Proprietà predefinite\";s:5:\"users\";s:6:\"Utenti\";s:7:\"profile\";s:14:\"Profilo utente\";s:10:\"my_profile\";s:11:\"Mio profilo\";s:13:\"documentation\";s:14:\"Documentazione\";s:11:\"report_bugs\";s:16:\"Segnala problemi\";s:5:\"about\";s:15:\"Informazioni su\";s:4:\"file\";s:4:\"File\";s:6:\"extras\";s:5:\"Extra\";s:4:\"help\";s:5:\"Aiuto\";s:13:\"configuration\";s:14:\"Configurazione\";s:5:\"value\";s:6:\"Valore\";s:21:\"add_a_custom_property\";s:38:\"Aggiungi una proprietà personalizzata\";s:7:\"general\";s:8:\"Generale\";s:8:\"language\";s:6:\"Lingua\";s:7:\"quality\";s:8:\"Qualità\";s:6:\"format\";s:7:\"Formato\";s:9:\"documents\";s:9:\"Documenti\";s:6:\"assets\";s:5:\"Media\";s:6:\"upload\";s:6:\"Carica\";s:5:\"width\";s:9:\"Larghezza\";s:6:\"height\";s:7:\"Altezza\";s:5:\"empty\";s:5:\"Vuoto\";s:8:\"workflow\";s:16:\"Flusso di lavoro\";s:6:\"modify\";s:9:\"Modifica \";s:6:\"create\";s:5:\"Crea \";s:4:\"edit\";s:8:\"Modifica\";s:6:\"logout\";s:4:\"Esci\";s:7:\"refresh\";s:8:\"Aggiorna\";s:5:\"input\";s:14:\"Campo di testo\";s:8:\"checkbox\";s:20:\"Casella di selezione\";s:8:\"textarea\";s:13:\"Area di testo\";s:5:\"image\";s:8:\"Immagine\";s:6:\"select\";s:9:\"Selezione\";s:4:\"base\";s:4:\"Base\";s:10:\"add_object\";s:16:\"Aggiungi oggetto\";s:6:\"border\";s:5:\"Bordo\";s:8:\"document\";s:11:\"Documento  \";s:5:\"asset\";s:5:\"Media\";s:6:\"object\";s:7:\"Oggetto\";s:6:\"remove\";s:8:\"Rimuovi \";s:19:\"hidden_dependencies\";s:64:\"Il tuo utente non ha i premessi per vedere ulteriori dipendenze.\";s:4:\"open\";s:4:\"Apri\";s:4:\"days\";s:6:\"Giorni\";s:7:\"seemode\";s:7:\"Seemode\";s:17:\"edit_current_page\";s:22:\"Modifica questa pagina\";s:5:\"close\";s:6:\"Chiudi\";s:19:\"name_already_in_use\";s:22:\"Il nome è già in uso\";s:28:\"name_and_key_must_be_defined\";s:40:\"Il nome e il tipo devono essere definiti\";s:21:\"mandatory_field_empty\";s:32:\"Riempi tutti i campi obbligatori\";s:6:\"reload\";s:8:\"Ricarica\";s:8:\"schedule\";s:9:\"Pianifica\";s:4:\"time\";s:3:\"Ora\";s:7:\"version\";s:8:\"Versione\";s:6:\"active\";s:6:\"Attivo\";s:7:\"success\";s:8:\"Successo\";s:12:\"translations\";s:10:\"Traduzioni\";s:9:\"firstname\";s:4:\"Nome\";s:8:\"lastname\";s:7:\"Cognome\";s:5:\"email\";s:5:\"Email\";s:24:\"cant_move_node_to_target\";s:28:\"Impossibile spostare il nodo\";s:19:\"error_moving_object\";s:34:\"L\'oggetto non può essere spostato\";s:31:\"translations_are_not_configured\";s:34:\"Le traduzioni non sono configurate\";s:14:\"read_more_here\";s:22:\"Ulteriori informazioni\";s:15:\"publish_version\";s:17:\"Pubblica versione\";s:5:\"start\";s:6:\"Inizio\";s:2:\"su\";s:2:\"Do\";s:2:\"mo\";s:2:\"Lu\";s:2:\"tu\";s:2:\"Ma\";s:2:\"we\";s:2:\"Me\";s:2:\"th\";s:2:\"Gi\";s:2:\"fr\";s:2:\"Ve\";s:2:\"sa\";s:2:\"Sa\";s:18:\"session_error_text\";s:69:\"Sembra che ci sia un problema con la sessione. Continuare ugualmente?\";s:13:\"session_error\";s:18:\"Errore di sessione\";s:11:\"please_wait\";s:19:\"Attendere prego ...\";s:8:\"download\";s:7:\"Scarica\";s:11:\"inheritable\";s:11:\"Ereditabile\";s:9:\"redirects\";s:16:\"Reindirizzamenti\";s:6:\"source\";s:8:\"Sorgente\";s:4:\"link\";s:12:\"Collegamento\";s:4:\"abbr\";s:5:\"Abbr.\";s:4:\"stop\";s:5:\"Ferma\";s:12:\"dependencies\";s:9:\"Requisiti\";s:8:\"requires\";s:8:\"Richiede\";s:11:\"required_by\";s:12:\"Richiesto da\";s:11:\"search_edit\";s:25:\"Cerca, Modifica e Esporta\";s:7:\"subtype\";s:10:\"Sotto tipo\";s:12:\"initializing\";s:19:\"Inizializzazione...\";s:20:\"please_select_a_type\";s:19:\"Selezionare un tipo\";s:6:\"filter\";s:6:\"Filtro\";s:5:\"field\";s:5:\"Campo\";s:8:\"operator\";s:9:\"Operatore\";s:5:\"apply\";s:7:\"Applica\";s:4:\"show\";s:6:\"Mostra\";s:6:\"public\";s:8:\"Pubblico\";s:18:\"maximum_2_versions\";s:38:\"Puoi confrontare al massimo 2 versioni\";s:5:\"error\";s:6:\"Errore\";s:17:\"element_is_locked\";s:34:\"Elemento aperto da un altro utente\";s:21:\"element_lock_question\";s:29:\"Si desidera aprirlo comunque?\";s:5:\"since\";s:3:\"Dal\";s:9:\"longitude\";s:11:\"Longitudine\";s:8:\"latitude\";s:10:\"Latitudine\";s:8:\"geopoint\";s:16:\"Punti Geografici\";s:6:\"cancel\";s:7:\"Annulla\";s:18:\"open_search_editor\";s:18:\"Editor Open Search\";s:10:\"parameters\";s:9:\"Parametri\";s:6:\"anchor\";s:6:\"Ancora\";s:9:\"accesskey\";s:17:\"Chiave di accesso\";s:8:\"relation\";s:9:\"Relazione\";s:8:\"tabindex\";s:9:\"Tab-index\";s:7:\"not_set\";s:13:\"non impostato\";s:10:\"export_csv\";s:14:\"Esporta in CSV\";s:10:\"import_csv\";s:14:\"Importa in CSV\";s:19:\"show_welcome_screen\";s:42:\"Mostra la schermata di benvenuto all\'avvio\";s:20:\"importFileHasHeadRow\";s:25:\"prima riga = intestazione\";s:42:\"overwrite_object_with_same_key_description\";s:614:\"Quando l\'opzione Sovrascrivi è selezionata anziché creare un nuovo oggetto per ogni riga importata, gli oggetti con la stessa chiave sono sovrascritti. Gli oggetti esistenti nella cartella di importazione le cui chiavi non sono contenute nel file da importare non vengono modificati. Tutti gli oggetti con una delle chiavi del file da importare verranno sostituiti nella cartella destinazione. Questo avverrà anche per gli oggetti basati su classi diverse o anche per le cartelle di oggetti! I campi degli oggetti che sono configurati come Ignora nella mappatura dei campi manterranno il loro valore originario.\";s:34:\"object_import_filename_description\";s:62:\"selezionare il campo usato per generare la chiave dell\'oggetto\";s:17:\"save_pubish_close\";s:23:\"Salva, pubblica ed esci\";s:10:\"save_close\";s:13:\"Salva ed esci\";s:13:\"error_general\";s:75:\"Il server ha riscontrato un\'eccezione - impossibile completare l\'operazione\";s:11:\"owner_class\";s:23:\"Classe del proprietario\";s:11:\"owner_field\";s:22:\"Campo del proprietario\";s:22:\"nonownerobject_warning\";s:135:\"L\'oggetto corrente non è il proprietario di queste relazioni, fare delle modifiche qui potrebbe rallentare il salvataggio dell\'oggetto\";s:30:\"element_implicit_edit_question\";s:59:\"Volete ancora modificarlo implicitamente con questa azione?\";s:20:\"element_open_message\";s:50:\"L\'elemento referenziato è già aperto in modifica\";s:30:\"nonownerobjects_self_selection\";s:127:\"Negli oggetti non proprietari non è permessa una relazione riflessa, usate il campo originale anziché quello non proprietario\";s:7:\"warning\";s:11:\"Attenzione!\";s:25:\"csv_object_export_warning\";s:175:\"L\'esportazione in formato CSV non supporta tutti i tipi di dati. La reimportazione di un file CSV in Pimcore può portare a perdita di informazioni. Premere OK per continuare.\";s:18:\"navigation_exclude\";s:25:\"Escludi dalla navigazione\";s:8:\"variants\";s:8:\"Varianti\";s:7:\"variant\";s:8:\"Variante\";s:11:\"add_variant\";s:21:\"Aggiungi una variante\";s:27:\"delete_message_dependencies\";s:48:\"Ci sono delle dipendenze. Cancellare ugualmente?\";s:14:\"delete_message\";s:36:\"Si vuole cancellare questo elemento?\";s:20:\"delete_message_batch\";s:47:\"Sei sicuro di voler cancellare questi elementi?\";s:31:\"no_further_objectbricks_allowed\";s:42:\"Non sono consentiti ulteriori objectbricks\";s:21:\"grid_current_language\";s:15:\"Lingua corrente\";s:14:\"object_columns\";s:21:\"Colonne degli oggetti\";s:14:\"system_columns\";s:18:\"Colonne di sistema\";s:7:\"columns\";s:7:\"colonne\";s:13:\"children_grid\";s:14:\"Griglia figlio\";s:13:\"only_children\";s:45:\"soltanto gli oggetti direttamente discendenti\";s:3:\"cut\";s:6:\"Taglia\";s:17:\"paste_cut_element\";s:27:\"Incolla l\'elemento tagliato\";s:13:\"memorize_tabs\";s:29:\"Ricorda quali tab sono aperti\";s:15:\"element_history\";s:16:\"Elementi recenti\";s:10:\"dashboards\";s:21:\"Pannelli di controllo\";s:20:\"portlet_customreport\";s:23:\"Rapporto personalizzato\";s:24:\"clear_marker_or_hotspots\";s:48:\"Cancella segnapunto, Hotspot e ritaglio immagine\";s:16:\"hotspots_cleared\";s:50:\"Hotspot, Segnapunti e ritaglio immagine cancellati\";s:8:\"deeplink\";s:21:\"Collegamento profondo\";s:13:\"click_to_open\";s:19:\"(clicca per aprire)\";s:12:\"add_metadata\";s:17:\"Aggiungi Metadati\";s:26:\"pimcore_icon_edit_pdf_text\";s:23:\"Modifica versione testo\";s:7:\"chapter\";s:9:\"Carattere\";s:15:\"search_and_move\";s:14:\"Cerca & Sposta\";s:9:\"searching\";s:19:\"Ricerca in corso...\";s:25:\"predefined_asset_metadata\";s:26:\"Metadati media predefiniti\";s:35:\"add_predefined_metadata_definitions\";s:32:\"Aggiungi definizione predefinita\";s:9:\"scheduled\";s:11:\"Pianificato\";s:26:\"naming_requirements_3chars\";s:72:\"Il nome deve essere composto da lettere e numeri e di almeno 3 caratteri\";s:22:\"there_are_more_columns\";s:55:\"Ci sono altre colonne oltre quelle attualmente mostrate\";s:9:\"merge_csv\";s:24:\"Importa &amp; Unisci CSV\";s:26:\"translation_merger_current\";s:14:\"Testo corrente\";s:22:\"translation_merger_csv\";s:12:\"Testo da CSV\";s:16:\"nothing_to_merge\";s:23:\"Non c\'è nulla da unire\";s:21:\"csv_seperated_options\";s:23:\"Opzioni separazione CSV\";s:26:\"csv_seperated_options_info\";s:199:\"La lista delle opzioni disponibili può essere specificata come lista con separatori di virgola, come valori a colonna singola o misti. In caso di singola colonna, la chiave varrà anche come valore.\";s:10:\"first_page\";s:12:\"Prima Pagina\";s:13:\"previous_page\";s:17:\"Pagina Precedente\";s:9:\"next_page\";s:15:\"Prossima Pagina\";s:9:\"last_page\";s:13:\"Ultima Pagina\";s:18:\"no_data_to_display\";s:23:\"Nessun dato da mostrare\";s:29:\"classificationstore_no_groups\";s:21:\"Nessun gruppo trovato\";s:27:\"classificationstore_no_keys\";s:22:\"Nessuna chiave trovata\";s:12:\"remove_group\";s:14:\"Rimuovi gruppo\";s:34:\"classificationstore_no_collections\";s:18:\"Nessuna collezione\";s:9:\"reference\";s:11:\"Riferimento\";s:25:\"element_tag_configuration\";s:18:\"Configurazione Tag\";s:20:\"element_tag_all_tags\";s:11:\"Tutti i Tag\";s:25:\"enter_new_name_of_the_tag\";s:31:\"Inserisci il nuovo nome del tag\";s:13:\"assigned_tags\";s:13:\"Tag assegnati\";s:11:\"filter_tags\";s:14:\"Filtra per tag\";s:19:\"consider_child_tags\";s:22:\"Valuta anche tag figli\";s:15:\"tags_assignment\";s:16:\"Attribuzione tag\";s:11:\"tags_search\";s:11:\"Ricerca tag\";s:13:\"batch_applied\";s:16:\"Blocco applicato\";s:10:\"apply_tags\";s:19:\"applica tag a figli\";s:21:\"remove_and_apply_tags\";s:29:\"rimuovi e applica tag a figli\";s:16:\"batch_assignment\";s:26:\"Attribuzione tag in blocco\";s:22:\"batch_assignment_error\";s:33:\"Errore attribuzione tag in blocco\";s:17:\"no_children_found\";s:27:\"Nessun discendente trovato.\";s:12:\"asset_search\";s:11:\"Cerca Media\";s:15:\"document_search\";s:15:\"Cerca documenti\";s:13:\"object_search\";s:13:\"Cerca oggetti\";s:4:\"more\";s:5:\"Altro\";s:16:\"open_translation\";s:15:\"Apri traduzione\";s:22:\"link_existing_document\";s:27:\"Collega documento esistente\";s:17:\"using_inheritance\";s:25:\"Utilizzando ereditarietà\";s:12:\"new_document\";s:15:\"Nuovo documento\";s:16:\"update_available\";s:25:\"Aggiornamento disponibile\";s:30:\"target_document_needs_language\";s:51:\"Documento di destinazione richiede un set di lingua\";s:5:\"tools\";s:9:\"Strumenti\";s:12:\"perspectives\";s:5:\"Viste\";s:13:\"filter_active\";s:13:\"Filtro attivo\";s:12:\"reset_config\";s:21:\"Reimposta cambiamenti\";s:20:\"reset_config_tooltip\";s:121:\"Questo reimposterà (e salverà) la configurazione di incolonnamento di griglia per questo elemento al valore predefinito\";s:22:\"error_resetting_config\";s:40:\"Errore nel reimpostare la configurazione\";s:18:\"marketing_settings\";s:22:\"Impostazioni marketing\";s:30:\"cross_tree_moves_not_supported\";s:55:\"Spostamenti incrociati tra alberi non ancora supportati\";s:13:\"add_printpage\";s:18:\"Aggiunge PrintPage\";s:18:\"add_printcontainer\";s:23:\"Aggiunge PrintContainer\";s:21:\"web2print_preview_pdf\";s:24:\"Genera PDF con anteprima\";s:29:\"web2print_cancel_pdf_creation\";s:21:\"Annulla creazione PDF\";s:22:\"web2print_generate_pdf\";s:10:\"Genera PDF\";s:22:\"web2print_download_pdf\";s:11:\"Scarica PDF\";s:24:\"web2print_last-generated\";s:15:\"Ultimo generato\";s:31:\"web2print_last-generate-message\";s:28:\"Messaggio ultima generazione\";s:9:\"web2print\";s:9:\"Web2Print\";s:32:\"web2print_prepare_pdf_generation\";s:23:\"Prepara generazione PDF\";s:30:\"web2print_start_html_rendering\";s:27:\"Avvio rappresentazione HTML\";s:33:\"web2print_finished_html_rendering\";s:26:\"Fine rappresentazione HTML\";s:25:\"web2print_saved_html_file\";s:17:\"HTML file salvato\";s:24:\"web2print_pdf_conversion\";s:15:\"Conversione PDF\";s:29:\"web2print_saving_pdf_document\";s:22:\"Salva il documento PDF\";s:16:\"web2print_author\";s:6:\"Autore\";s:22:\"web2print_printermarks\";s:12:\"Printermarks\";s:19:\"web2print_bookmarks\";s:10:\"Segnalibri\";s:9:\"close_tab\";s:10:\"Chiudi tab\";s:24:\"web2print_only_published\";s:40:\"Possibile solo con documenti pubblicati.\";s:27:\"web2print_documents_changed\";s:67:\"I documenti sono stati modificati dopo l\'ultima conversione in pdf.\";s:13:\"about_pimcore\";s:14:\"COS\'É PIMCORE\";s:5:\"phone\";s:8:\"Telefono\";s:24:\"workflow_additional_info\";s:23:\"Informazioni aggiuntive\";s:23:\"workflow_perform_action\";s:13:\"Esegui Azione\";s:23:\"workflow_notes_required\";s:19:\"Note (obbligatorio)\";s:23:\"workflow_notes_optional\";s:18:\"Note (facoltativo)\";s:32:\"please_enter_the_id_of_the_asset\";s:60:\"Inserisci ID o percorso (es. /images/logo.jpg) dell\'elemento\";s:33:\"please_enter_the_id_of_the_object\";s:36:\"Inserisci ID o percorso dell\'oggetto\";s:35:\"please_enter_the_id_of_the_document\";s:60:\"Inserisci ID, percorso o URL (incluso http://) del documento\";s:27:\"element_has_unsaved_changes\";s:37:\"L\'elemento ha cambiamenti non salvati\";s:31:\"element_unsaved_changes_message\";s:57:\"Tutti i cambiamenti non salvati andranno perduti, sicuro?\";s:35:\"newsletter_enableTrackingParameters\";s:54:\"Aggiungi parametri per il tracciamento ai collegamenti\";s:22:\"newsletter_sendingMode\";s:15:\"Modalità Invio\";s:29:\"newsletter_sendingmode_single\";s:52:\"Singola (rappresenta individualmente ogni messaggio)\";s:28:\"newsletter_sendingmode_batch\";s:48:\"Blocco (rappresenta una sola volta il messaggio)\";s:23:\"newsletter_sendingPanel\";s:25:\"Pannello Invio Newsletter\";s:24:\"newsletter_dirty_warning\";s:85:\"La Newsletter non è ancora salvata. Prima di poter far altro è necessario salvarla.\";s:18:\"newsletter_sending\";s:16:\"Invio Newsletter\";s:24:\"newsletter_sourceAdapter\";s:26:\"Connettore fonte indirizzo\";s:18:\"newsletter_default\";s:25:\"Lista oggetto predefinito\";s:18:\"newsletter_csvList\";s:9:\"Lista CSV\";s:19:\"newsletter_testsend\";s:24:\"Test di invio Newsletter\";s:28:\"newsletter_test_sent_message\";s:54:\"L\'invio della Newsletter di test è andato a buon fine\";s:20:\"add_object_mbx_title\";s:34:\"Aggiungi nuovo oggetto del tipo %s\";s:24:\"newsletter_choose_report\";s:18:\"Scegli un rapporto\";s:27:\"newsletter_email_field_name\";s:16:\"Nome campo email\";s:4:\"mode\";s:9:\"Modalità\";s:15:\"custom_download\";s:27:\"Scaricamento personalizzato\";s:13:\"original_file\";s:14:\"File originale\";s:10:\"web_format\";s:11:\"Formato Web\";s:12:\"print_format\";s:21:\"Formato per la Stampa\";s:13:\"office_format\";s:14:\"Formato Office\";s:15:\"change_password\";s:15:\"Cambia password\";s:32:\"file_is_bigger_that_upload_limit\";s:93:\"Il file seguente è più grande rispetto ai limiti di caricamento configurati sul tuo server:\";s:23:\"send_test_email_success\";s:110:\"La tua email di test è stata inviata. Vuoi mantenere questa finestra aperta per poter inviare ancora l\'email?\";s:32:\"press_crtl_and_select_to_compare\";s:48:\"Per confrontare: premi CTRL + clicca la versione\";s:13:\"clear_filters\";s:13:\"Svuota filtri\";s:18:\"tags_configuration\";s:18:\"Configurazione tag\";s:26:\"export_csv_include_headers\";s:33:\"Esportazione CSV con intestazioni\";s:16:\"open_data_object\";s:12:\"Apri oggetto\";s:12:\"data_objects\";s:7:\"Oggetti\";s:29:\"asset_type_change_not_allowed\";s:125:\"<strong>Solo media dello stesso tipo sono consentiti.</strong><br/>[ tipo media caricato: \"%s\" | tipo media esistente: \"%s\" ]\";s:38:\"clear_content_of_selected_target_group\";s:50:\"Pulisci contenuto del Gruppo Obiettivo selezionato\";s:86:\"visitors_of_this_page_will_be_automatically_associated_with_the_selected_target_groups\";s:93:\"Visitatori di questa pagina saranno associati automaticamente ai Gruppi Obiettivo selezionati\";s:19:\"assign_target_group\";s:24:\"Assegna Gruppo Obiettivo\";s:20:\"assign_target_groups\";s:24:\"Assegna Gruppi Obiettivo\";s:13:\"target_groups\";s:16:\"Gruppi Obiettivo\";s:29:\"edit_content_for_target_group\";s:39:\"Modifica contenuto per Gruppo Obiettivo\";s:14:\"email_reply_to\";s:10:\"Rispondi A\";s:25:\"element_tag_filtered_tags\";s:12:\"Tag filtrati\";s:22:\"web2print_addOverprint\";s:11:\"Sovrastampa\";s:19:\"analyze_permissions\";s:17:\"Analizza Permessi\";s:6:\"unique\";s:7:\"Univoco\";s:4:\"glue\";s:5:\"Colla\";s:11:\"date_format\";s:12:\"Formato Data\";s:9:\"attribute\";s:9:\"Attributo\";s:17:\"forward_attribute\";s:16:\"Avanza attributo\";s:5:\"upper\";s:9:\"Superiore\";s:5:\"lower\";s:9:\"Inferiore\";s:8:\"disabled\";s:12:\"Disabilitato\";s:14:\"capitalization\";s:16:\"Capitalizzazione\";s:19:\"restrict_to_locales\";s:19:\"Limita a traduzioni\";s:10:\"predefined\";s:11:\"Predefinito\";s:12:\"save_as_copy\";s:16:\"Salva come copia\";s:16:\"set_as_favourite\";s:22:\"Imposta come preferito\";s:18:\"grid_configuration\";s:22:\"Configurazione griglia\";s:12:\"shared_users\";s:16:\"Utenti Condivisi\";s:12:\"shared_roles\";s:15:\"Ruoli condivisi\";s:14:\"save_and_share\";s:17:\"Salva & Condividi\";s:19:\"save_copy_and_share\";s:27:\"Salva una copia & Condividi\";s:6:\"locale\";s:10:\"Traduzione\";s:8:\"ellipses\";s:7:\"Ellissi\";s:11:\"insensitive\";s:11:\"Insensibile\";s:9:\"yes_value\";s:10:\"Valore Sì\";s:8:\"no_value\";s:9:\"Valore No\";s:11:\"count_empty\";s:15:\"Conteggio vuoto\";s:8:\"as_array\";s:12:\"Come matrice\";s:14:\"metadata_field\";s:14:\"Campo metadati\";s:10:\"only_count\";s:14:\"Solo come cont\";s:9:\"parameter\";s:9:\"Parametro\";s:17:\"forward_parameter\";s:17:\"Inoltra parametro\";s:8:\"is_array\";s:12:\"Tipo Matrice\";s:9:\"php_class\";s:10:\"Classe PHP\";s:15:\"additional_data\";s:16:\"Dati addizionali\";s:7:\"flatten\";s:11:\"Appiattisci\";s:18:\"return_last_result\";s:24:\"Ritorna ultimo risultato\";s:9:\"skip_null\";s:10:\"Salta null\";s:15:\"expand_children\";s:19:\"Espandi discendente\";s:8:\"multiply\";s:10:\"Moltiplica\";s:6:\"divide\";s:6:\"Dividi\";s:20:\"apply_to_all_objects\";s:15:\"Applica a tutti\";s:24:\"apply_to_all_objects_msg\";s:137:\"Ci sono altri oggetti che hanno già proprie impostazioni preferite. Vuoi estendere anche a loro l\'applicazione di questa configurazione?\";s:6:\"encode\";s:8:\"Codifica\";s:6:\"decode\";s:10:\"Decodifica\";s:9:\"serialize\";s:10:\"Serializza\";s:11:\"unserialize\";s:12:\"Deserializza\";s:6:\"offset\";s:19:\"Scostamento (0-...)\";s:13:\"col_attribute\";s:20:\"Attributo collezione\";s:15:\"brick_attribute\";s:15:\"Attributo brick\";s:24:\"csv_column_configuration\";s:22:\"Configurazione colonna\";s:6:\"column\";s:7:\"Colonna\";s:17:\"resolver_strategy\";s:20:\"Strategia risolutore\";s:17:\"resolver_settings\";s:23:\"Impostazioni risolutore\";s:12:\"csv_settings\";s:16:\"Impostazioni CSV\";s:11:\"skipheadrow\";s:22:\"Salta la riga di testa\";s:16:\"csv_file_preview\";s:18:\"Anteprima file CSV\";s:7:\"save_as\";s:10:\"Salva come\";s:27:\"import_export_configuration\";s:30:\"Importa esporta configurazione\";s:10:\"brick_type\";s:10:\"Tipo brick\";s:8:\"renderer\";s:16:\"Rappresentazione\";s:6:\"getter\";s:6:\"Getter\";s:6:\"string\";s:7:\"Stringa\";s:3:\"row\";s:6:\"Rigaù\";s:13:\"import_report\";s:24:\"Rapporto di importazione\";s:13:\"import_errors\";s:62:\"Rilevati alcuni errori. Controlla il rapporto di importazione.\";s:14:\"import_is_done\";s:18:\"Importazione fatta\";s:18:\"import_file_prefix\";s:23:\"Prefisso per nuovi file\";s:14:\"create_parents\";s:13:\"Crea genitori\";s:8:\"fullpath\";s:17:\"Percorso completo\";s:16:\"create_on_demand\";s:17:\"Crea su richiesta\";s:15:\"get_by_resolver\";s:24:\"Restituisci da attributo\";s:6:\"direct\";s:7:\"Diretto\";s:17:\"skip_empty_values\";s:18:\"Salta valori vuoti\";s:16:\"do_not_overwrite\";s:17:\"Non sovrascrivere\";s:5:\"never\";s:3:\"Mai\";s:12:\"if_not_empty\";s:19:\"Se diverso da vuoto\";s:6:\"always\";s:6:\"Sempre\";s:9:\"delimiter\";s:12:\"Delimitatore\";s:14:\"share_globally\";s:21:\"Condividi globalmente\";s:19:\"gdpr_data_extractor\";s:27:\"Estrattore dati RGPD (GDPR)\";s:16:\"no_configuration\";s:22:\"Nessuna configurazione\";s:20:\"share_configurations\";s:27:\"Condivisione configurazioni\";s:18:\"enable_inheritance\";s:21:\"Abilita ereditarietà\";s:15:\"object_settings\";s:20:\"Impostazioni oggetto\";s:12:\"drop_me_here\";s:49:\"Trascina un elemento dall\'albero e rilascialo qui\";s:18:\"clear_hotspots_msg\";s:94:\"Questa immagine contiene dati aggiuntivi come marcatori o hotspot. Vuoi ripulire anche questi?\";s:14:\"restore_failed\";s:17:\"Reimposta fallito\";s:8:\"subtract\";s:7:\"Sottrai\";s:16:\"batch_append_all\";s:24:\"Accoda in blocco a tutti\";s:21:\"batch_append_selected\";s:30:\"Accoda in blocco a selezionati\";s:15:\"batch_append_to\";s:13:\"Accoda dati a\";s:30:\"login_token_invalid_user_error\";s:18:\"Utente non valido.\";s:41:\"login_token_as_admin_non_admin_user_error\";s:70:\"Solo utenti con privilegi idonei possono accedere come amministratori.\";s:29:\"login_token_no_password_error\";s:39:\"L\'utente non ha una password impostata.\";s:17:\"targeting_toolbar\";s:36:\"Barra strumenti puntamento obiettivo\";s:16:\"sort_children_by\";s:22:\"Ordina discendenti per\";s:6:\"by_key\";s:19:\"Chiave (alfabetica)\";s:8:\"by_index\";s:20:\"Indice (manualmente)\";s:47:\"successful_object_change_children_sort_to_index\";s:41:\"Cambiato ordinamento discendenti a Indice\";s:45:\"successful_object_change_children_sort_to_key\";s:41:\"Cambiato ordinamento discendenti a Chiave\";s:42:\"error_object_change_children_sort_to_index\";s:55:\"Impossibile cambiare l\'ordinamento discendenti a Indice\";s:40:\"error_object_change_children_sort_to_key\";s:55:\"Impossibile cambiare l\'ordinamento discendenti a Chiave\";s:12:\"edit_as_html\";s:18:\"Modifica come HTML\";s:18:\"edit_as_plain_text\";s:28:\"Modifica come testo semplice\";s:23:\"error_empty_file_upload\";s:11:\"File vuoto.\";s:11:\"type_column\";s:12:\"Tipo colonna\";s:4:\"keep\";s:8:\"mantieni\";s:21:\"clear_version_message\";s:77:\"Vuoi veramente cancellare tutte le versioni non pubblicatedi questo elemento?\";s:9:\"clear_all\";s:13:\"Pulisci tutto\";s:24:\"unlink_existing_document\";s:28:\"Scollega documento esistente\";s:12:\"grid_options\";s:15:\"Opzioni griglia\";s:17:\"save_grid_options\";s:21:\"Salva opzioni griglia\";s:24:\"download_selected_as_zip\";s:41:\"Scarica gli elementi selezionati come ZIP\";s:31:\"please_select_items_to_download\";s:44:\"Scegli gli elementi da scaricare dalla lista\";s:12:\"key_bindings\";s:14:\"Vincoli chiave\";s:26:\"keybinding_openClassEditor\";s:18:\"Apri editor Classe\";s:23:\"keybinding_showMetaInfo\";s:16:\"Mostra meta info\";s:25:\"keybinding_clearAllCaches\";s:22:\"Pulisci tutte le cache\";s:25:\"keybinding_clearDataCache\";s:25:\"Pulisci la cache dei dati\";s:34:\"scheduled_block_delete_all_in_past\";s:37:\"Elimina tutti gli inserimenti passati\";s:34:\"scheduled_block_really_delete_past\";s:61:\"Cancellare davvero tutti gli elementi pianificati in passato?\";s:26:\"scheduled_block_delete_all\";s:29:\"Elimina tutti gli inserimenti\";s:33:\"scheduled_block_really_delete_all\";s:73:\"Cancellare davvero tutti gli elementi pianificati, inclusi quelli futuri?\";s:11:\"2fa_disable\";s:14:\"Disabilita F2A\";s:16:\"renew_2fa_secret\";s:37:\"Rinnova la sicurezza a doppio fattore\";s:25:\"two_factor_authentication\";s:31:\"Autenticazione a doppio fattore\";s:14:\"2fa_alert_text\";s:228:\"Scansiona il codice QR ed aggiungilo al tuo Google Authenticator.<br>Se non hai installato Google Authenticator sul tuo dispositivo, scaricalo.<br><br>Devi ricaricare Pimcore ed inseririe il codice visualizzato attraverso l\'app!\";s:16:\"2fa_alert_submit\";s:35:\"Ricarica Pimcore & Inserisci Codice\";s:16:\"setup_two_factor\";s:39:\"Imposta autenticazione a doppio fattore\";s:17:\"2fa_setup_message\";s:158:\"L\'autenticazione a doppio fattore è necessaria per il tuo accesso. Devi impostarla nelle impostazioni del profilo, altrimenti non potrai accedere nuovamente.\";s:15:\"set_focal_point\";s:20:\"Imposta punto focale\";s:11:\"quicksearch\";s:28:\"Ricerca veloce (Ctrl+Spazio)\";s:16:\"standard_preview\";s:17:\"Anteprima di base\";s:18:\"upload_new_version\";s:21:\"Carica nuova versione\";s:10:\"360_viewer\";s:12:\"Visore 360°\";s:12:\"invalid_name\";s:15:\"Nome non valido\";s:5:\"clone\";s:5:\"Clona\";s:30:\"enter_the_name_of_the_new_item\";s:36:\"Inserisci il nome del nuovo elemento\";s:9:\"html_tags\";s:8:\"Tag HTML\";s:21:\"clear_temporary_files\";s:25:\"Pulisci i file temporanei\";s:18:\"error_pasting_item\";s:32:\"Impossibile incollare l\'elemento\";s:16:\"modificationdate\";s:16:\"Data di modifica\";s:5:\"blank\";s:5:\"Vuoto\";s:7:\"message\";s:9:\"Messaggio\";s:4:\"from\";s:2:\"Da\";s:2:\"to\";s:1:\"A\";s:4:\"html\";s:4:\"HTML\";s:4:\"text\";s:5:\"Testo\";s:13:\"create_folder\";s:17:\"Aggiungi cartella\";s:19:\"error_deleting_item\";s:32:\"Impossibile eliminare l\'elemento\";s:19:\"error_renaming_item\";s:33:\"Errore nel rinominare l\'elemento.\";s:6:\"revert\";s:10:\"Ripristina\";s:6:\"parent\";s:8:\"Genitore\";s:18:\"merge_translations\";s:18:\"Combina traduzioni\";s:6:\"prefix\";s:8:\"Prefisso\";s:4:\"load\";s:6:\"Carica\";s:13:\"saving_failed\";s:20:\"Salvataggio fallito!\";s:25:\"failed_to_create_new_item\";s:49:\"Creazione nuovo elemento fallita, prova di nuovo.\";s:6:\"bundle\";s:8:\"Raccolta\";s:7:\"product\";s:8:\"Prodotto\";s:27:\"index_field_selection_field\";s:22:\"Selezione campo indice\";s:24:\"indexFieldSelectionField\";s:22:\"Selezione campo indice\";s:33:\"indexFieldSelectionField_settings\";s:44:\"Impostazioni selezione campo indice multipla\";s:29:\"indexFieldSelectionFieldMulti\";s:31:\"Selezione campo indice multipla\";s:27:\"index_field_selection_combo\";s:32:\"Selezione combinata campo indice\";s:24:\"indexFieldSelectionCombo\";s:32:\"Selezione combinata campo indice\";s:33:\"indexFieldSelectionCombo_settings\";s:13:\"Impostazioni \";s:18:\"specificPriceField\";s:22:\"Campo prezzo specifico\";s:13:\"showAllFields\";s:20:\"Mostra tutti i campi\";s:15:\"considerTenants\";s:24:\"Considera comproprietari\";s:25:\"bundle_ecommerce_mainmenu\";s:11:\"Online Shop\";s:30:\"bundle_ecommerce_pricing_rules\";s:13:\"Regole prezzo\";s:40:\"bundle_ecommerce_pricing_config_behavior\";s:13:\"Comportamento\";s:39:\"bundle_ecommerce_pricing_config_additiv\";s:7:\"Additiv\";s:43:\"bundle_ecommerce_pricing_config_stopExecute\";s:13:\"Ultima regola\";s:51:\"bundle_ecommerce_pricing_config_condition_daterange\";s:15:\"Intervallo data\";s:53:\"bundle_ecommerce_pricing_config_condition_cart_amount\";s:15:\"Totale carrello\";s:50:\"bundle_ecommerce_pricing_config_condition_products\";s:8:\"Prodotti\";s:8:\"category\";s:9:\"Categoria\";s:47:\"bundle_ecommerce_pricing_config_condition_token\";s:16:\"Codice simbolico\";s:47:\"bundle_ecommerce_pricing_config_condition_sales\";s:7:\"Vendite\";s:46:\"bundle_ecommerce_pricing_config_condition_sold\";s:7:\"Venduto\";s:52:\"bundle_ecommerce_pricing_config_condition_sold_count\";s:17:\"Unità di venduto\";s:57:\"bundle_ecommerce_pricing_config_condition_sold_count_cart\";s:26:\"Unità carrello di venduto\";s:54:\"bundle_ecommerce_pricing_config_condition_voucherToken\";s:7:\"Voucher\";s:48:\"bundle_ecommerce_pricing_config_condition_tenant\";s:15:\"Comproprietario\";s:53:\"bundle_ecommerce_pricing_config_condition_targetgroup\";s:16:\"Gruppo Obiettivo\";s:63:\"bundle_ecommerce_pricing_config_condition_targetgroup_threshold\";s:6:\"Soglia\";s:43:\"bundle_ecommerce_pricing_config_action_gift\";s:7:\"Omaggio\";s:52:\"bundle_ecommerce_pricing_config_action_cart_discount\";s:15:\"Sconto Carrello\";s:60:\"bundle_ecommerce_pricing_config_action_cart_discount_percent\";s:11:\"Sconto in %\";s:59:\"bundle_ecommerce_pricing_config_action_cart_discount_amount\";s:15:\"Sconto assoluto\";s:55:\"bundle_ecommerce_pricing_config_action_product_discount\";s:15:\"Sconto prodotto\";s:63:\"bundle_ecommerce_pricing_config_action_product_discount_percent\";s:11:\"Sconto in %\";s:62:\"bundle_ecommerce_pricing_config_action_product_discount_amount\";s:15:\"Sconto assoluto\";s:52:\"bundle_ecommerce_pricing_config_action_free_shipping\";s:19:\"Spedizione gratuita\";s:9:\"ecommerce\";s:21:\"Commercio elettronico\";s:13:\"preSelectMode\";s:23:\"Modalità pre selezione\";s:13:\"remote_single\";s:27:\"Selezione singola da remoto\";s:12:\"remote_multi\";s:28:\"Selezione multipla da remoto\";s:12:\"local_single\";s:38:\"Selezione singola da lista predefinita\";s:11:\"local_multi\";s:39:\"Selezione multipla da lista predefinita\";s:19:\"indexFieldSelection\";s:22:\"Selezione campo indice\";s:28:\"indexFieldSelection_settings\";s:35:\"Impostazioni selezione campo indice\";s:12:\"filtergroups\";s:13:\"Gruppi filtro\";s:9:\"preSelect\";s:13:\"Pre selezione\";s:29:\"predefined_pre_select_options\";s:33:\"Opzioni pre selezione predefinite\";s:35:\"bundle_ecommerce_clear_config_cache\";s:34:\"Pulisci la cache di configurazione\";s:34:\"bundle_ecommerce_back-office_order\";s:25:\"Gestione interna - Ordini\";s:35:\"bundle_ecommerce_vouchertoolkit_tab\";s:16:\"Dettagli voucher\";s:4:\"path\";s:8:\"Percorso\";s:9:\"thumbnail\";s:9:\"Anteprima\";s:18:\"download_thumbnail\";s:17:\"Scarica anteprima\";s:21:\"no_thumbnail_selected\";s:29:\"Nessuna anteprima selezionata\";s:55:\"list_thumbnail_in_download_section_on_image_detail_view\";s:76:\"Mostra come opzione di scaricamento nella sezione di dettaglio dell\'immagine\";s:20:\"there_are_more_items\";s:35:\"There are more items than displayed\";s:16:\"workflow_actions\";s:6:\"Azioni\";s:36:\"workflow_notes_requred_field_message\";s:27:\"\"%s\" è un campo richiesto.\";s:40:\"workflow_transition_applied_successfully\";s:30:\"Azione applicata correttamente\";s:42:\"workflow_change_email_notification_subject\";s:39:\"Workflow update for %s in workflow \'%s\'\";s:39:\"workflow_change_email_notification_text\";s:65:\"For %s with ID %s the action \"%s\" was triggered in workflow \'%s\'.\";s:43:\"workflow_change_email_notification_deeplink\";s:24:\"Deeplink to the element.\";s:39:\"workflow_change_email_notification_note\";s:11:\"Note Added:\";s:16:\"workflow_details\";s:16:\"Workflow Details\";s:14:\"workflow_graph\";s:14:\"Workflow Graph\";s:22:\"workflow_current_state\";s:14:\"Stato corrente\";s:22:\"workflow_cmd_not_found\";s:86:\"Please install the \"%s\" console executable on the server to render the workflow graph.\";s:10:\"unit_width\";s:10:\"Width Unit\";s:18:\"permission_missing\";s:45:\"Devi avere il permesso \'%s\' per questa azione\";s:25:\"paste_as_language_variant\";s:29:\"Paste as new language variant\";s:32:\"select_language_for_new_document\";s:32:\"Select language for New Document\";s:32:\"source_document_language_missing\";s:43:\"Set Language(Properties) in Source Document\";s:26:\"open_preview_in_new_window\";s:36:\"Apri anteprima in una nuova finestra\";s:4:\"data\";s:4:\"Dati\";s:5:\"links\";s:4:\"Link\";s:10:\"robots.txt\";s:10:\"robots.txt\";s:5:\"notes\";s:4:\"Note\";s:4:\"bool\";s:4:\"Bool\";s:7:\"consent\";s:8:\"Consenso\";s:10:\"add_marker\";s:10:\"Add marker\";s:18:\"identifier_warning\";s:95:\"Presta attenzione all\'ID univoco in quanto i nomi di tabella possono contenere solo 64 lettere.\";s:17:\"unique_identifier\";s:10:\"ID univoco\";s:18:\"invalid_identifier\";s:13:\"ID non valido\";s:25:\"identifier_already_exists\";s:17:\"ID già esistente\";s:7:\"content\";s:9:\"Contenuto\";s:4:\"send\";s:5:\"Invia\";s:34:\"you_can_only_drop_one_element_here\";s:37:\"Puoi rilasciare solo un elemento qui!\";s:11:\"translation\";s:10:\"Traduzione\";s:18:\"delete_error_batch\";s:84:\"Following items cannot be deleted, do you wanna proceed with deleting the remaining?\";s:12:\"delete_error\";s:35:\"The item cannot be deleted. Reason:\";s:25:\"batch_edit_field_selected\";s:25:\"Batch edit selected field\";s:24:\"batch_append_selected_to\";s:23:\"Append data to selected\";s:25:\"enable_batch_edit_columns\";s:29:\"Enable Batch Edit for Columns\";s:10:\"delete_all\";s:13:\"Elimina tutto\";s:19:\"open_linked_element\";s:19:\"Open linked Element\";s:12:\"mark_as_read\";s:16:\"Segna come letto\";s:6:\"sender\";s:8:\"Mittente\";s:13:\"notifications\";s:9:\"Notifiche\";s:18:\"notifications_send\";s:15:\"Invia notifiche\";s:5:\"group\";s:6:\"Gruppo\";s:10:\"attachment\";s:8:\"Allegato\";s:26:\"notification_has_been_sent\";s:26:\"Notification has been sent\";s:9:\"recipient\";s:12:\"Destinatario\";s:22:\"this_field_is_required\";s:28:\"Questo campo è obbligatorio\";s:35:\"paste_recursive_as_language_variant\";s:41:\"Paste as new language variant (recursive)\";s:27:\"paste_no_new_language_error\";s:54:\"All system languages already linked to source element.\";s:18:\"embedded_meta_data\";s:18:\"Embedded Meta Info\";s:8:\"duration\";s:6:\"Durata\";s:15:\"custom_metadata\";s:23:\"Metadati personalizzati\";s:16:\"group_icon_class\";s:16:\"Group Icon Class\";s:25:\"custom_report_permissions\";s:8:\"Permesso\";s:16:\"visible_to_users\";s:20:\"Visibile agli utenti\";s:16:\"visible_to_roles\";s:17:\"Visibile ai ruoli\";s:8:\"open_url\";s:8:\"Apri URL\";s:26:\"document_language_overview\";s:26:\"Document Language Overview\";s:15:\"language_master\";s:6:\"Master\";s:30:\"create_translation_inheritance\";s:27:\"Crea traduzione (ereditato)\";s:18:\"create_translation\";s:15:\"Crea traduzione\";s:37:\"document_translation_parent_not_found\";s:77:\"Documento primario non tradotto. Effettuarne la traduzione prima di procedere\";s:55:\"paste_recursive_as_language_variant_updating_references\";s:47:\"Paste language (recursive), updating references\";s:25:\"redirects_expired_cleanup\";s:32:\"Pulizia reindirizzamenti scaduti\";s:25:\"redirects_cleanup_warning\";s:46:\"Vuoi davvero pulire i reindirizzamenti scaduti\";s:23:\"redirects_cleanup_error\";s:52:\"An error occurred while cleanup of expired redirects\";s:16:\"all_translations\";s:19:\"Tutte le traduzioni\";s:17:\"only_unreferenced\";s:21:\"Solo non referenziati\";s:19:\"split_view_settings\";s:19:\"Split View Settings\";s:17:\"enable_split_view\";s:17:\"Enable Split View\";s:18:\"disable_split_view\";s:18:\"Disable Split View\";s:29:\"split_view_object_dirty_title\";s:14:\"Please confirm\";s:27:\"split_view_object_dirty_msg\";s:73:\"There are unsaved modifications. You will lose all changes. Are you sure?\";s:17:\"converter_service\";s:17:\"Converter service\";s:12:\"auto_convert\";s:22:\"Conversione automatica\";s:25:\"web2print_enableDebugMode\";s:22:\"Attiva modalità debug\";s:11:\"set_to_null\";s:19:\"Empty (set to null)\";s:7:\"bundles\";s:9:\"Pacchetti\";s:23:\"target_document_invalid\";s:51:\"Please select a target document with valid language\";s:16:\"metainfo_copy_id\";s:22:\"Copia ID negli appunti\";s:22:\"metainfo_copy_fullpath\";s:40:\"Copia l\'indirizzo completo negli appunti\";s:22:\"metainfo_copy_deeplink\";s:26:\"Copy deeplink to clipboard\";s:10:\"plain_text\";s:14:\"Testo semplice\";s:21:\"plain_text_email_part\";s:31:\"Sezione email in testo semplice\";s:13:\"error_message\";s:13:\"Error Message\";s:26:\"bundle_ecommerce_order_tab\";s:13:\"Order Details\";s:13:\"access_denied\";s:15:\"Accesso negato!\";s:25:\"access_denied_description\";s:82:\"Non hai sufficienti permessi per aprire l\'elemento o eseguire l\'azione desiderata.\";s:17:\"validation_failed\";s:18:\"Validation Failed!\";s:11:\"export_xlsx\";s:11:\"XLSX Export\";s:21:\"object_export_warning\";s:98:\"Please note that the export does not support all data types. Press OK to continue with the export.\";s:32:\"web2print_enableLenientHttpsMode\";s:25:\"Enable lenient HTTPS mode\";s:36:\"web2print_enableLenientHttpsMode_txt\";s:72:\"Enable this option if PDFreactor fails to connect successfully via HTTPS\";s:15:\"paste_clipboard\";s:15:\"Incolla appunti\";s:10:\"paste_here\";s:30:\"Paste your clipboard data here\";s:14:\"asset_metadata\";s:14:\"Asset Metadata\";s:19:\"predefined_metadata\";s:20:\"Metadati predefiniti\";s:16:\"default_metadata\";s:21:\"Metadati prestabiliti\";s:20:\"asset_export_warning\";s:115:\"Please note that the export does not support some fields(e.g. preview, size). Press OK to continue with the export.\";s:23:\"share_via_notifications\";s:23:\"Share via Notifications\";s:61:\"cannot_save_metadata_please_try_to_edit_the_metadata_in_asset\";s:75:\"<b>Cannot save Metadata!</b><br />Please try to edit the metadata in Asset.\";s:17:\"email_log_forward\";s:13:\"Forward email\";s:3:\"sum\";s:5:\"Somma\";s:30:\"area_brick_assign_info_message\";s:61:\"Please use drag & drop to assign a brick to the desired block\";s:16:\"batch_remove_all\";s:21:\"Batch remove from all\";s:21:\"batch_remove_selected\";s:26:\"Batch remove from selected\";s:17:\"batch_remove_from\";s:20:\"Remove data from all\";s:26:\"batch_remove_selected_from\";s:25:\"Remove data from selected\";s:12:\"unit_tooltip\";s:25:\"Alternative units tooltip\";s:32:\"toggle_image_features_visibility\";s:31:\"Toggle Image Feature Visibility\";s:21:\"detect_image_features\";s:21:\"Detect Image Features\";s:21:\"remove_image_features\";s:21:\"Remove Image Features\";s:15:\"available_sites\";s:15:\"Available Sites\";s:8:\"fallback\";s:8:\"Fallback\";s:8:\"add_site\";s:8:\"Add Site\";s:18:\"domain_label_width\";s:18:\"Domain label width\";s:24:\"complete_required_fields\";s:66:\"Please complete following required fields to publish the document:\";s:13:\"Uncategorized\";s:15:\"Senza categoria\";s:14:\"skip_if_exists\";s:18:\"Skip row if exists\";s:20:\"php_class_or_service\";s:21:\"Class or service name\";s:28:\"redirect_performance_warning\";s:117:\"Using this feature has very bad effects on the performance of the entire application, do you really want to continue?\";s:8:\"test_url\";s:12:\"URL di prova\";s:16:\"create_redirects\";s:55:\"Create redirects to keep URLs working (incl. children)?\";s:11:\"auto_create\";s:11:\"Auto create\";s:7:\"methods\";s:6:\"Metodi\";s:15:\"batch_operation\";s:15:\"Batch Operation\";s:4:\"move\";s:6:\"Sposta\";s:13:\"property_name\";s:15:\"Nome proprietà\";s:11:\"force_value\";s:11:\"Force value\";s:19:\"enable_grid_locking\";s:19:\"Enable grid locking\";s:20:\"export_configuration\";s:28:\"Export Configuration As JSON\";s:17:\"composite_indices\";s:17:\"Composite indices\";s:23:\"default_value_generator\";s:39:\"Default value generator service / class\";s:12:\"no_value_set\";s:23:\"nessun valore impostato\";s:20:\"delete_class_message\";s:41:\"Do you really want to delete class \'%s\' ?\";s:35:\"replace_assignments_in_all_elements\";s:35:\"Replace assignments in all elements\";s:11:\"fieldlookup\";s:12:\"Field Lookup\";s:16:\"show_fieldlookup\";s:17:\"Show Field Lookup\";s:27:\"different_number_of_columns\";s:27:\"Different number of columns\";s:19:\"brick_limit_reached\";s:51:\"Limit ({bricklimit}) reached for brick: {brickname}\";s:26:\"generate_type_declarations\";s:26:\"Generate Type Declarations\";s:21:\"batch_change_language\";s:21:\"Batch update language\";s:12:\"preview_item\";s:12:\"Preview Item\";s:14:\"by_key_reverse\";s:12:\"Key (Z to A)\";s:10:\"deprecated\";s:10:\"Deprecated\";s:35:\"version_currently_saved_in_database\";s:47:\"Currently saved in database (but not published)\";s:18:\"deprecated_feature\";s:67:\"<p style=\'color: orange;\'>Deprecated feature. Use %s<br>instead</p>\";s:19:\"edit_as_custom_text\";s:19:\"Edit as custom text\";s:24:\"symfony_translation_link\";s:83:\"Translation Format: https://symfony.com/doc/current/translation/message_format.html\";s:19:\"no_action_available\";s:19:\"No action available\";s:6:\"bricks\";s:6:\"Bricks\";s:5:\"draft\";s:5:\"Draft\";s:9:\"auto_save\";s:9:\"Auto save\";s:10:\"save_draft\";s:10:\"Save draft\";s:21:\"selected_grid_columns\";s:21:\"Selected grid columns\";s:10:\"brightness\";s:11:\"Luminosità\";s:10:\"saturation\";s:11:\"Saturazione\";s:3:\"hue\";s:9:\"Tonalità\";s:14:\"addoverlay_fit\";s:19:\"Applica Fit Overlay\";s:11:\"environment\";s:8:\"Ambiente\";s:4:\"test\";s:4:\"Test\";s:5:\"local\";s:6:\"Locale\";s:5:\"ratio\";s:11:\"Proporzione\";s:17:\"decimal_precision\";s:22:\"Numeri dopo la virgola\";s:13:\"only_unsigned\";s:16:\"solo senza segno\";s:7:\"integer\";s:6:\"Intero\";s:17:\"object_regex_info\";s:77:\"Espressione regolare senza delimitatori, deve funzionare sia su JS che su PHP\";s:16:\"regex_validation\";s:32:\"Validazione espressione regolare\";s:11:\"test_string\";s:15:\"Stringa di test\";s:5:\"regex\";s:20:\"Espressione regolare\";s:16:\"code_before_init\";s:20:\"Codice prima di init\";s:19:\"code_after_pageview\";s:20:\"Codice dopo pageview\";s:20:\"code_before_pageview\";s:24:\"Codice prima di pageview\";s:17:\"select_presetting\";s:35:\"Scegli una impostazione predefinita\";s:4:\"good\";s:5:\"Buono\";s:4:\"best\";s:6:\"Ottimo\";s:7:\"average\";s:5:\"Media\";s:7:\"example\";s:7:\"Esempio\";s:15:\"add_media_query\";s:20:\"Aggiungi Media Query\";s:17:\"send_as_html_mime\";s:25:\"Invia mail come HTML/Mime\";s:18:\"send_as_plain_text\";s:30:\"Invia mail come testo semplice\";s:15:\"send_test_email\";s:19:\"Invia Email di test\";s:17:\"specific_settings\";s:23:\"Impostazioni specifiche\";s:30:\"login_as_this_user_description\";s:118:\"Il seguente è un collegamento temporaneo che ti consente l\'accesso con lo stesso utente in una postazione differente:\";s:18:\"login_as_this_user\";s:50:\"Accesso con stesso utente in postazione differente\";s:23:\"allowed_types_to_create\";s:32:\"Tipi consentiti per la creazione\";s:15:\"defaults_to_all\";s:19:\"Predefinito a tutti\";s:33:\"analytics_universal_configuration\";s:72:\"Configurazione Universal Analytics - es. {\'CookieDomain\': \'example.com\'}\";s:10:\"error_page\";s:16:\"Pagina di errore\";s:11:\"main_domain\";s:18:\"Dominio principale\";s:18:\"additional_domains\";s:40:\"Domini aggiuntivi (un dominio per linea)\";s:23:\"redirect_to_main_domain\";s:57:\"Redireziona domini aggiuntivi verso il dominio principale\";s:37:\"use_different_email_delivery_settings\";s:63:\"Usa differenti impostazioni di consegna email per le newsletter\";s:5:\"scope\";s:5:\"Scopo\";s:3:\"hit\";s:15:\"Successo visite\";s:7:\"session\";s:8:\"Sessione\";s:18:\"fallback_languages\";s:46:\"Salvaguardia lingue (formato CSV es. de_CH,de)\";s:12:\"add_language\";s:15:\"Aggiungi Lingua\";s:16:\"default_language\";s:17:\"Lingua di default\";s:37:\"localization_and_internationalization\";s:39:\"Localizzazione e Internazionalizzazione\";s:22:\"deactivate_maintenance\";s:22:\"Disattiva Manutenzione\";s:13:\"code_settings\";s:22:\"Impostazione di codice\";s:20:\"advanced_integration\";s:21:\"Integrazione avanzata\";s:12:\"target_group\";s:16:\"Target di gruppo\";s:8:\"children\";s:5:\"Figli\";s:18:\"elements_to_export\";s:21:\"Elementi da esportare\";s:22:\"xliff_export_documents\";s:284:\"Se vuoi tradurre es. l\'intero albero /en in una lingua diversa, crea prima una copia di /en, es. /de poi esporta /de per la traduzione. Nell\'importazione del XLIFF tradotto i contenuti in Inglese in /de saranno sovrascritti dalla traduzione dalla traduzione in Tedesco del file XLIFF.\";s:20:\"xliff_export_objects\";s:216:\"Solo campi all\'interno di contenitori Localized Fields sono riconosciuti. Durante l\'importazione del XLIFF tradotto la lingua sorgente rimarrà intatta, solo i campi della lingua di destinazione saranno sovrascritti.\";s:19:\"xliff_export_notice\";s:82:\"Qui puoi selezionare i Documenti e gli Oggetti da esportare per tradurli off-line.\";s:16:\"important_notice\";s:23:\"Informazione importante\";s:19:\"xliff_import_notice\";s:290:\"Scegli un file XLIFF esportato in precedenza da pimcore e tradotto successivamente sa un servizio di traduzione (LSP) o attraverso un\'applicazione CAT. Prendi nota che l\'importazione sovrascriverà gli elementi che erano stati selezionati dall\'importazione (lettura vale come esportazione).\";s:9:\"composite\";s:8:\"Composto\";s:6:\"origin\";s:7:\"Origine\";s:15:\"high_resolution\";s:16:\"Alta Risoluzione\";s:20:\"create_menu_shortcut\";s:25:\"Crea scorciatoia nel menu\";s:9:\"nice_name\";s:13:\"Nome Accurato\";s:10:\"icon_class\";s:12:\"Classe icona\";s:7:\"display\";s:6:\"Mostra\";s:5:\"order\";s:6:\"Ordine\";s:11:\"filter_type\";s:14:\"Tipo di Filtro\";s:20:\"column_configuration\";s:28:\"Configurazione della Colonna\";s:28:\"custom_report_chart_settings\";s:20:\"Impostazioni grafici\";s:23:\"custom_report_charttype\";s:15:\"Tipo di grafici\";s:28:\"custom_report_charttype_none\";s:7:\"Nessuno\";s:27:\"custom_report_charttype_pie\";s:15:\"Grafico a torta\";s:28:\"custom_report_charttype_line\";s:15:\"Grafico a linea\";s:27:\"custom_report_charttype_bar\";s:15:\"Grafico a barre\";s:27:\"custom_report_chart_options\";s:35:\"Opzioni relative al tipo di grafico\";s:20:\"custom_report_x_axis\";s:6:\"Asse X\";s:20:\"custom_report_y_axis\";s:6:\"Asse Y\";s:24:\"custom_report_datacolumn\";s:12:\"Colonna Dati\";s:25:\"custom_report_labelcolumn\";s:17:\"Colonna Etichette\";s:25:\"custom_report_only_filter\";s:11:\"Filtra solo\";s:29:\"custom_report_filter_and_show\";s:15:\"Filtra e mostra\";s:30:\"custom_report_filter_drilldown\";s:18:\"Profondità Filtro\";s:26:\"no_further_sources_allowed\";s:39:\"Nessuna fonte dati ulteriore consentita\";s:19:\"pass_through_params\";s:26:\"Passare Mediante Parametri\";s:26:\"analytics_retargeting_code\";s:45:\"Usa retargeting-code per la analitica (dc.js)\";s:27:\"analytics_asynchronous_code\";s:42:\"Usa codice asincrono per analytics (ga.js)\";s:17:\"newsletter_active\";s:17:\"Newsletter Attiva\";s:20:\"newsletter_confirmed\";s:21:\"Newsletter Confermata\";s:6:\"gender\";s:5:\"Sesso\";s:17:\"use_original_tiff\";s:37:\"Usare la TIFF originale (solo stampa)\";s:29:\"use_original_tiff_description\";s:81:\"Usare la TIFF originale quando il formato dell\'origine è TIFF -> non modificarla\";s:22:\"generate_page_previews\";s:30:\"Genera anteprime per le pagine\";s:4:\"port\";s:5:\"Porta\";s:17:\"delivery_settings\";s:24:\"Impostazioni di consegna\";s:17:\"generate_previews\";s:16:\"Genera anteprime\";s:18:\"invalid_class_name\";s:24:\"Nome della classe errato\";s:39:\"redirect_unknown_domains_to_main_domain\";s:104:\"Redireziona domini sconosciuti (non usato per siti e per redirezioni, ...) al dominio principale (sopra)\";s:5:\"hours\";s:3:\"Ore\";s:7:\"minutes\";s:6:\"Minuti\";s:7:\"seconds\";s:7:\"Secondi\";s:16:\"operating_system\";s:17:\"Sistema operativo\";s:17:\"hardware_platform\";s:20:\"Piattaforma Hardware\";s:12:\"time_on_site\";s:14:\"Tempo sul sito\";s:27:\"visited_pages_before_number\";s:23:\"Visitate n-pagine prima\";s:6:\"number\";s:6:\"Numero\";s:19:\"visited_page_before\";s:21:\"Pagine visitate prima\";s:12:\"searchengine\";s:17:\"Motore di ricerca\";s:8:\"referrer\";s:11:\"Provenienza\";s:14:\"referring_site\";s:19:\"Sito di provenienza\";s:3:\"AND\";s:3:\"AND\";s:2:\"OR\";s:2:\"OR\";s:7:\"AND_NOT\";s:7:\"AND NOT\";s:12:\"radius_in_km\";s:11:\"Raggio (km)\";s:8:\"redirect\";s:11:\"Redirezione\";s:12:\"code_snippet\";s:19:\"Frammento di codice\";s:7:\"browser\";s:7:\"Browser\";s:10:\"conditions\";s:10:\"Condizioni\";s:24:\"debug_admin_translations\";s:22:\"Debug traduzioni Admin\";s:9:\"short_url\";s:9:\"URL breve\";s:39:\"width_and_height_must_be_an_even_number\";s:48:\"larghezza ed altezza devono avere un valore pari\";s:11:\"source_site\";s:13:\"Sito sorgente\";s:11:\"target_site\";s:17:\"Sito destinazione\";s:17:\"source_entire_url\";s:24:\"Intera URL come sorgente\";s:20:\"analytics_internalid\";s:13:\"ID interno GA\";s:23:\"show_in_google_anaytics\";s:26:\"Mostra in Google Analytics\";s:5:\"style\";s:5:\"Stile\";s:16:\"foreground_color\";s:21:\"Colore in primo piano\";s:16:\"background_color\";s:19:\"Colore dello sfondo\";s:30:\"analytics_settings_description\";s:132:\"Per utilizzare l\'integrazione completa delle Google Analytics, configura il Google API Service Account nelle impostazioni di sistema\";s:11:\"upload_path\";s:27:\"Percorso per il caricamento\";s:17:\"selection_options\";s:20:\"Opzioni di selezione\";s:6:\"expiry\";s:8:\"Scadenza\";s:6:\"mobile\";s:6:\"Mobile\";s:13:\"group_by_path\";s:22:\"Raggruppa per percorso\";s:5:\"flush\";s:6:\"Svuota\";s:18:\"show_close_warning\";s:25:\"Mostra avvisi di chiusura\";s:13:\"matching_text\";s:20:\"Testo corrispondente\";s:3:\"any\";s:9:\"Qualunque\";s:11:\"http_method\";s:11:\"Metodo HTTP\";s:11:\"url_pattern\";s:52:\"Pattern URL (Espressione Regolare ad es. @success@i)\";s:9:\"beginning\";s:6:\"Inizio\";s:20:\"element_css_selector\";s:23:\"Elemento (CSS Selector)\";s:15:\"insert_position\";s:18:\"Inserire Posizione\";s:31:\"robots_txt_exists_on_filesystem\";s:50:\"Il file robots.txt esiste già nella document-root\";s:67:\"only_required_for_reporting_in_pimcore_but_not_for_code_integration\";s:122:\"Richiesto solo se si intendono usare le funzionalità di reporting di Pimcore, non richiesto per l\'integrazione del codice\";s:10:\"save_error\";s:26:\"Impossibile salvare i dati\";s:9:\"all_roles\";s:13:\"Tutti i ruoli\";s:8:\"add_role\";s:17:\"Aggiungi un ruolo\";s:19:\"role_creation_error\";s:27:\"Impossibile creare il ruolo\";s:10:\"workspaces\";s:18:\"Ambienti di lavoro\";s:8:\"Username\";s:11:\"Nome Utente\";s:13:\"video_bitrate\";s:24:\"Bitrate del video (kB/s)\";s:13:\"audio_bitrate\";s:25:\"Bitrate dell\'audio (kB/s)\";s:36:\"valid_languages_frontend_description\";s:245:\"Questa impostazione è usata nei documenti per specificare la lingua del contenuto (nel tab delle proprietà) oppure nei campi multilingua degli oggetti... in pratica ovunque l\'editor possa scegliere o usare una lingua specifica per il contenuto\";s:13:\"maximum_items\";s:12:\"max elementi\";s:9:\"collapsed\";s:7:\"Ridotto\";s:35:\"url_to_custom_image_on_login_screen\";s:60:\"URL dell\'immagine personalizzata per la schermata di accesso\";s:22:\"system_infos_and_tools\";s:35:\"Informazioni di sistema e Strumenti\";s:5:\"sepia\";s:6:\"Seppia\";s:7:\"sharpen\";s:9:\"Nitidezza\";s:12:\"gaussianBlur\";s:19:\"Sfocatura Gaussiana\";s:6:\"radius\";s:6:\"Raggio\";s:5:\"sigma\";s:5:\"Sigma\";s:9:\"threshold\";s:7:\"Livello\";s:4:\"trim\";s:6:\"Taglia\";s:9:\"tolerance\";s:10:\"Tolleranza\";s:9:\"grayscale\";s:14:\"Toni di grigio\";s:20:\"nothing_to_configure\";s:32:\"Non è possibile alcuna modifica\";s:11:\"preview_url\";s:18:\"URL dell\'anteprima\";s:7:\"opacity\";s:8:\"Opacità\";s:9:\"applymask\";s:16:\"Applica Maschera\";s:10:\"addoverlay\";s:15:\"Applica Overlay\";s:94:\"important_use_imagick_pecl_extensions_for_best_results_gd_is_just_a_fallback_with_less_quality\";s:158:\"IMPORTANTE: per ottenere migliori risultati consigliamo di usare l\'estensione PECL Imagemagick. In alternativa GDlib è compatibile ma con qualità inferiore.\";s:15:\"transformations\";s:14:\"Trasformazioni\";s:5:\"frame\";s:7:\"Cornice\";s:18:\"setbackgroundcolor\";s:24:\"Imposta colore di sfondo\";s:18:\"setbackgroundimage\";s:28:\"Imposta l\'immagine di sfondo\";s:12:\"roundcorners\";s:17:\"Bordi arrotondati\";s:6:\"rotate\";s:5:\"Ruota\";s:5:\"color\";s:6:\"Colore\";s:5:\"angle\";s:6:\"Angolo\";s:11:\"label_width\";s:24:\"Larghezza dell\'etichetta\";s:16:\"label_first_cell\";s:26:\"Etichettare la prima cella\";s:56:\"please_dont_forget_to_reload_pimcore_after_modifications\";s:80:\"Ricordarsi di pulire la copia temporanea e ricaricare Pimcore dopo le modifiche.\";s:6:\"enable\";s:7:\"Abilita\";s:7:\"disable\";s:10:\"Disabilita\";s:9:\"configure\";s:9:\"Configura\";s:14:\"beginning_with\";s:13:\"Iniziando con\";s:14:\"matching_exact\";s:21:\"Corrispondenza esatta\";s:15:\"add_expert_mode\";s:29:\"Aggiungi (modalità avanzata)\";s:17:\"add_beginner_mode\";s:29:\"Aggiungi (modalità semplice)\";s:6:\"lowest\";s:13:\"il più basso\";s:7:\"highest\";s:12:\"il più alto\";s:12:\"override_all\";s:15:\"applica a tutto\";s:16:\"maintenance_mode\";s:22:\"Modalità Manutenzione\";s:18:\"countrymultiselect\";s:26:\"Paesi (Selezione multipla)\";s:19:\"languagemultiselect\";s:27:\"Lingue (Selezione multipla)\";s:3:\"yes\";s:2:\"Si\";s:2:\"no\";s:2:\"No\";s:34:\"allow_trailing_slash_for_documents\";s:28:\"Consenti / in coda degli URL\";s:15:\"localizedfields\";s:17:\"Campi localizzati\";s:10:\"new_folder\";s:14:\"Nuova Cartella\";s:8:\"new_file\";s:10:\"Nuovo File\";s:19:\"server_fileexplorer\";s:23:\"Esplora file sul server\";s:8:\"gridview\";s:15:\"Vista a Griglia\";s:31:\"visibility_of_system_properties\";s:39:\"Visibilità delle proprietà di sistema\";s:9:\"translate\";s:7:\"traduci\";s:23:\"translations_admin_hint\";s:80:\"Suggerimento: Ricarica l\'interfaccia per applicare le modifiche alla traduzione!\";s:4:\"lock\";s:6:\"Blocca\";s:6:\"unlock\";s:7:\"Sblocca\";s:28:\"lock_and_propagate_to_childs\";s:38:\"Blocca l\'elemento e i suoi discendenti\";s:32:\"unlock_and_propagate_to_children\";s:39:\"Sblocca l\'elemento e i suoi discendenti\";s:13:\"allowed_types\";s:15:\"Tipi consentiti\";s:12:\"columnlength\";s:23:\"Larghezza della colonna\";s:16:\"direct_sql_query\";s:17:\"Query SQL diretta\";s:23:\"visible_in_searchresult\";s:36:\"Visibile nei risultati della ricerca\";s:19:\"visible_in_gridview\";s:30:\"Visibile nella vista a griglia\";s:16:\"fieldcollections\";s:16:\"Collezioni Campi\";s:5:\"block\";s:6:\"Blocco\";s:7:\"tooltip\";s:12:\"Suggerimento\";s:16:\"decimalPrecision\";s:19:\"Precisione Decimale\";s:9:\"css_style\";s:19:\"Foglio di stile CSS\";s:13:\"debug_mode_on\";s:15:\"MODALITÀ DEBUG\";s:11:\"add_setting\";s:21:\"Aggiungi impostazione\";s:16:\"website_settings\";s:25:\"Impostazioni del sito web\";s:7:\"reverse\";s:7:\"Inverti\";s:10:\"geopolygon\";s:19:\"Poligoni geografici\";s:9:\"geobounds\";s:16:\"Aree geografiche\";s:31:\"sure_to_install_unstable_update\";s:77:\"Siete sicuri di voler installare una versione potenzialmente non funzionante?\";s:19:\"analytics_accountid\";s:27:\"ID-Account (ad es. 1234567)\";s:26:\"verification_filename_text\";s:81:\"Nome FIle per la verifica<br/><small>richiesto per effettuare la verifica</small>\";s:16:\"analytics_notice\";s:149:\"Leggere la documentazione sull\'integrazione con Google Analytics, per la modalità avanzata occorrerà modificare le impostazioni di Google Analytics\";s:22:\"analytics_trackid_code\";s:72:\"Track-ID (ad es. UA-XXXXX-X)<br/>richiesto per l\'integrazione del codice\";s:11:\"multiselect\";s:18:\"Selezione multipla\";s:7:\"handler\";s:7:\"Gestore\";s:25:\"only_configured_languages\";s:48:\"Mostra solo nelle lingue configurate nel sistema\";s:11:\"permissions\";s:8:\"Permessi\";s:9:\"edit_site\";s:13:\"Modifica sito\";s:11:\"clear_cache\";s:27:\"Pulisci la copia temporanea\";s:41:\"you_are_not_allowed_to_manage_admin_users\";s:44:\"Non sei abilitato a gestire gli utenti admin\";s:6:\"update\";s:8:\"Aggiorna\";s:12:\"content_type\";s:17:\"Tipo di contenuto\";s:12:\"new_property\";s:16:\"Nuova proprietà\";s:9:\"all_users\";s:16:\"Tutti gli utenti\";s:5:\"admin\";s:15:\"Amministrazione\";s:17:\"new_document_type\";s:23:\"Nuovo tipo di documento\";s:15:\"system_settings\";s:23:\"Impostazioni di sistema\";s:8:\"timezone\";s:10:\"Ora locale\";s:4:\"host\";s:4:\"Host\";s:16:\"image_thumbnails\";s:24:\"Miniature delle immagini\";s:10:\"thumbnails\";s:9:\"Miniature\";s:5:\"cache\";s:16:\"Copia temporanea\";s:29:\"store_version_history_in_days\";s:33:\"Conserva la versione per x giorni\";s:30:\"store_version_history_in_steps\";s:35:\"Conserva la versione per x passaggi\";s:13:\"static_routes\";s:16:\"Percorsi statici\";s:6:\"layout\";s:12:\"Disposizione\";s:20:\"add_layout_component\";s:35:\"Aggiungi un componente disposizione\";s:18:\"add_data_component\";s:30:\"Aggiungi un componente ai Dati\";s:9:\"accordion\";s:19:\"Effetto fisarmonica\";s:5:\"panel\";s:8:\"Pannello\";s:8:\"tabpanel\";s:16:\"Pannello con tab\";s:7:\"pattern\";s:6:\"Schema\";s:8:\"defaults\";s:11:\"Predefiniti\";s:7:\"wysiwyg\";s:7:\"WYSIWYG\";s:7:\"objects\";s:7:\"Oggetti\";s:10:\"structured\";s:11:\"Strutturato\";s:3:\"geo\";s:10:\"Geografico\";s:13:\"allow_inherit\";s:22:\"Consenti ereditarietà\";s:10:\"use_traits\";s:12:\"Use (traits)\";s:16:\"general_settings\";s:21:\"Impostazioni generali\";s:15:\"layout_settings\";s:51:\"Impostazioni disposizione (Amministrazione Pimcore)\";s:6:\"region\";s:7:\"Regione\";s:11:\"collapsible\";s:10:\"Pieghevole\";s:15:\"allowed_classes\";s:17:\"Classi consentite\";s:12:\"display_name\";s:11:\"Mostra nome\";s:12:\"not_editable\";s:16:\"Non modificabile\";s:5:\"index\";s:11:\"Indicizzato\";s:14:\"mandatoryfield\";s:18:\"Campo obbligatorio\";s:11:\"use_as_site\";s:13:\"Usa come sito\";s:11:\"remove_site\";s:12:\"Rimuovi sito\";s:7:\"loading\";s:13:\"Sto caricando\";s:8:\"add_user\";s:15:\"Aggiungi utente\";s:5:\"steps\";s:5:\"Passi\";s:8:\"database\";s:8:\"Database\";s:7:\"install\";s:8:\"Installa\";s:9:\"uninstall\";s:11:\"Disinstalla\";s:27:\"some_fields_cannot_be_saved\";s:39:\"Alcuni campi non possono essere salvati\";s:4:\"icon\";s:5:\"Icona\";s:6:\"slider\";s:7:\"Cursore\";s:6:\"domain\";s:27:\"Dominio (ad es. esempio.it)\";s:8:\"datetime\";s:10:\"Data e ora\";s:13:\"default_value\";s:18:\"Valore predefinito\";s:6:\"button\";s:7:\"Bottone\";s:8:\"priority\";s:9:\"Priorità\";s:3:\"end\";s:4:\"Fine\";s:8:\"location\";s:5:\"Luogo\";s:5:\"every\";s:4:\"Ogni\";s:13:\"select_update\";s:25:\"Seleziona l\'aggiornamento\";s:14:\"stable_updates\";s:33:\"Aggiornamenti stabili disponibili\";s:18:\"non_stable_updates\";s:39:\"Aggiornamenti \"non-stabili\" disponibili\";s:40:\"latest_pimcore_version_already_installed\";s:43:\"Hai installato l\'ultima versione di Pimcore\";s:8:\"revision\";s:9:\"Revisione\";s:5:\"table\";s:7:\"Tabella\";s:4:\"rows\";s:5:\"Righe\";s:14:\"language_admin\";s:38:\"Lingua predefinita dell\'Amministratore\";s:16:\"exclude_patterns\";s:21:\"Elementi da escludere\";s:22:\"maintenance_not_active\";s:61:\"Sembra che la manuntenzione non sia configurata correttamente\";s:24:\"mail_settings_incomplete\";s:49:\"Sembra che le impostazioni email siano incomplete\";s:5:\"cover\";s:9:\"Copertina\";s:7:\"contain\";s:8:\"Contiene\";s:9:\"min_value\";s:11:\"Valore min.\";s:9:\"max_value\";s:11:\"Valore max.\";s:9:\"increment\";s:17:\"Valore incremento\";s:7:\"country\";s:7:\"Nazione\";s:10:\"zoom_level\";s:12:\"Livello Zoom\";s:8:\"map_type\";s:10:\"Tipo Mappa\";s:7:\"roadmap\";s:14:\"Mappa stradale\";s:9:\"satellite\";s:9:\"Satellite\";s:6:\"hybrid\";s:6:\"Ibrido\";s:21:\"google_api_key_simple\";s:53:\"Chiave delle Google API (Accesso alle mappe, CSE,...)\";s:21:\"document_restrictions\";s:25:\"Restrizioni sui documenti\";s:18:\"asset_restrictions\";s:26:\"Restrizioni sugli elementi\";s:19:\"object_restrictions\";s:25:\"Restrizioni sugli oggetti\";s:15:\"allow_documents\";s:18:\"consenti Documenti\";s:12:\"allow_assets\";s:17:\"consenti Elementi\";s:13:\"allow_objects\";s:16:\"consenti Oggetti\";s:18:\"allowed_types_hint\";s:24:\"(vuoto = consenti tutto)\";s:22:\"allowed_document_types\";s:28:\"Tipi di documenti consentiti\";s:19:\"allowed_asset_types\";s:27:\"Tipi di elementi consentiti\";s:7:\"website\";s:8:\"Sito web\";s:19:\"user_creation_error\";s:38:\"Non è stato possibile creare l\'utente\";s:21:\"email_debug_addresses\";s:39:\"Indirizzi email per i messaggi di debug\";s:36:\"user_object_dependencies_description\";s:46:\"L\'utente è referenziato dai seguenti oggetti:\";s:22:\"user_admin_description\";s:314:\"Gli amministratori non solo ottengono i permessi elencati qui sotto, possono inoltre compiere tutte le operazioni sui documenti, elementi e oggetti. Inoltre, gli amministratori possono accedere agli elementi Pimcore utilizzando WebDAV e le API SOAP (se WebDAV e l\'accesso ai web service è abilitato e configurato)\";s:23:\"user_apikey_description\";s:72:\"È richiesta una chiave API di accesso ai web services per questo utente\";s:6:\"apikey\";s:10:\"Chiave API\";s:12:\"lazy_loading\";s:24:\"caricamento su richiesta\";s:21:\"non_owner_description\";s:374:\"Gli oggetti non proprietari hanno relazioni con altri oggetti nello stesso modo degli oggetti veri e propri. La differenza è che un campo oggetto non proprietario non è il proprietario dei dati della relazione, è solo una vista dei dati memorizzati in altri oggetti. Vi preghiamo di selezionare il proprietario ed il nome del campo dove i dati originali sono memorizzati.\";s:14:\"allow_variants\";s:17:\"Consenti varianti\";s:13:\"show_variants\";s:31:\"Mostra le differenze nell\'abero\";s:19:\"allowed_class_field\";s:23:\"Classe/campo consentiti\";s:12:\"objectbricks\";s:11:\"Objectbriks\";s:17:\"class_definitions\";s:21:\"Definizione di classe\";s:15:\"structuredTable\";s:19:\"Tabella strutturata\";s:8:\"position\";s:9:\"Posizione\";s:29:\"objectsMetadata_allowed_class\";s:17:\"Classi consentite\";s:30:\"objectsMetadata_visible_fields\";s:14:\"Campi visibili\";s:30:\"file_explorer_saved_file_error\";s:25:\"Non posso salvare il file\";s:26:\"reserved_field_names_error\";s:46:\"Non usare le seguenti parole chiave nei campi:\";s:16:\"use_current_date\";s:20:\"Usa la data corrente\";s:21:\"restrict_selection_to\";s:18:\"Limita selezione a\";s:12:\"maximum_tabs\";s:21:\"Numero massimo di tab\";s:9:\"algorithm\";s:9:\"Algoritmo\";s:12:\"saltlocation\";s:27:\"Posizione sale di algoritmo\";s:13:\"custom_layout\";s:27:\"Disposizione personalizzata\";s:24:\"custom_layout_definition\";s:39:\"Definizione disposizione personalizzato\";s:24:\"configure_custom_layouts\";s:37:\"Configura disposizione personalizzata\";s:10:\"add_layout\";s:21:\"Aggiungi disposizione\";s:13:\"delete_layout\";s:21:\"Cancella disposizione\";s:16:\"special_settings\";s:21:\"Impostazioni Speciali\";s:14:\"custom_layouts\";s:27:\"Disposizioni personalizzate\";s:21:\"custom_layout_changed\";s:84:\"La disposizione è stata cambiata nel frattempo. Si prega di ricaricarla e riprovare\";s:14:\"new_definition\";s:17:\"Nuova Definizione\";s:14:\"rule_violation\";s:20:\"Violazione di regole\";s:9:\"mandatory\";s:12:\"Obbligatorio\";s:6:\"emails\";s:5:\"Email\";s:18:\"disallow_addremove\";s:31:\"Non consentire Aggiungi/Rimuovi\";s:16:\"disallow_reorder\";s:23:\"Non consentire Riordino\";s:17:\"reload_definition\";s:20:\"Ricarica Definizioni\";s:11:\"bulk_export\";s:21:\"Esportazione in massa\";s:11:\"bulk_import\";s:21:\"Importazione in massa\";s:6:\"saving\";s:20:\"Salvataggio in corso\";s:10:\"definition\";s:11:\"Definizioni\";s:11:\"objectbrick\";s:12:\"Object Brick\";s:10:\"select_all\";s:15:\"Seleziona tutto\";s:12:\"deselect_all\";s:17:\"Deseleziona tutto\";s:17:\"definitions_saved\";s:20:\"Definizione salvata!\";s:19:\"warning_bulk_import\";s:117:\"L\'importazione in massa sovrascriverà definizioni class/fieldcollection/objectbrick senza avvisare. Vuoi proseguire?\";s:14:\"default_layout\";s:33:\"Usa come disposizione predefinita\";s:19:\"hide_edit_image_tab\";s:30:\"Nascondi tab modifica immagine\";s:15:\"log_search_form\";s:17:\"Parametro ricerca\";s:24:\"log_search_relatedobject\";s:22:\"Oggetto collegato (id)\";s:21:\"log_detailinformation\";s:22:\"Informazione dettaglio\";s:36:\"classificationstore_group_definition\";s:6:\"Gruppi\";s:40:\"classificationstore_mbx_entergroup_title\";s:12:\"Nuovo gruppo\";s:41:\"classificationstore_mbx_entergroup_prompt\";s:14:\"Inserisci nome\";s:38:\"classificationstore_error_addgroup_msg\";s:36:\"Errore durante l\'aggiunta del gruppo\";s:31:\"classificationstore_invalidname\";s:15:\"Nome non valido\";s:30:\"classificationstore_properties\";s:18:\"Definizioni chiave\";s:38:\"classificationstore_mbx_enterkey_title\";s:12:\"Nuova chiave\";s:42:\"classificationstore_detailed_configuration\";s:26:\"Configurazione dettagliata\";s:35:\"classificationstore_detailed_config\";s:16:\"Conf dettagliata\";s:9:\"relations\";s:9:\"Relazioni\";s:9:\"localized\";s:11:\"Localizzato\";s:6:\"key_id\";s:9:\"ID Chiave\";s:6:\"sorter\";s:10:\"Ordinatore\";s:41:\"classificationstore_collection_definition\";s:17:\"Collezioni gruppo\";s:8:\"group_id\";s:9:\"ID Gruppo\";s:10:\"collection\";s:10:\"Collezione\";s:45:\"classificationstore_mbx_entercollection_title\";s:16:\"Nuova collezione\";s:12:\"abbreviation\";s:13:\"Abbreviazione\";s:8:\"baseunit\";s:11:\"Unità base\";s:25:\"valid_quantityValue_units\";s:13:\"Unità valide\";s:31:\"calculatedValue_calculatorclass\";s:18:\"Classe calcolatore\";s:12:\"default_unit\";s:18:\"Unità predefinita\";s:13:\"min_max_times\";s:13:\"Tempi min/max\";s:15:\"editor_settings\";s:19:\"Impostazioni editor\";s:14:\"language_order\";s:13:\"Ordine lingua\";s:13:\"preview_width\";s:19:\"Larghezza anteprima\";s:14:\"preview_height\";s:17:\"Altezza anteprima\";s:9:\"url_width\";s:13:\"Larghezza URL\";s:13:\"externalImage\";s:16:\"Immagine esterna\";s:5:\"store\";s:8:\"Deposito\";s:40:\"classificationstore_mbx_enterstore_title\";s:14:\"Nuovo deposito\";s:41:\"classificationstore_mbx_enterstore_prompt\";s:23:\"Inserisci nome deposito\";s:38:\"classificationstore_error_addstore_msg\";s:40:\"Errore durante la creazione del deposito\";s:16:\"web2print_server\";s:6:\"Server\";s:17:\"web2print_licence\";s:7:\"Licenza\";s:30:\"web2print_wkhtmltopdf_settings\";s:24:\"Impostazioni wkhtmltopdf\";s:29:\"web2print_wkhtmltopdf_options\";s:7:\"Opzioni\";s:18:\"web2print_hostname\";s:8:\"Hostname\";s:18:\"web2print_settings\";s:25:\"Impostazioni di Web2Print\";s:8:\"php_info\";s:8:\"PHP Info\";s:25:\"system_requirements_check\";s:29:\"Verifica requisiti di sistema\";s:11:\"server_info\";s:19:\"Informazioni server\";s:23:\"database_administration\";s:24:\"Amministrazione Database\";s:9:\"invisible\";s:10:\"Invisibile\";s:10:\"extensions\";s:10:\"Estensioni\";s:7:\"classes\";s:6:\"Classi\";s:8:\"fieldset\";s:9:\"Set campi\";s:9:\"variables\";s:9:\"Variabili\";s:10:\"categories\";s:9:\"Categorie\";s:8:\"vertical\";s:9:\"Verticale\";s:14:\"target_subtype\";s:14:\"Tipo di Target\";s:22:\"are_you_sure_recursive\";s:65:\"Ci sono anche nodi discendenti che saranno eliminati. Sei sicuro?\";s:17:\"log_relatedobject\";s:17:\"Oggetto collegato\";s:13:\"log_component\";s:10:\"Componente\";s:13:\"log_timestamp\";s:6:\"Orario\";s:14:\"log_fileobject\";s:12:\"Oggetto file\";s:8:\"expanded\";s:7:\"Espanso\";s:20:\"disable_tree_preview\";s:27:\"Disabilita anteprima albero\";s:12:\"display_type\";s:11:\"Mostra tipo\";s:4:\"hide\";s:8:\"Nascondi\";s:14:\"PHP Class Name\";s:15:\"Nome Classe PHP\";s:35:\"gdpr_dataSource_sentMail_only_email\";s:29:\"Ricerca basata solo su E-mail\";s:12:\"imageGallery\";s:17:\"Galleria immagini\";s:11:\"column_type\";s:12:\"Tipo colonna\";s:15:\"admin_interface\";s:30:\"Interfaccia di amministrazione\";s:12:\"login_screen\";s:20:\"Schermata di accesso\";s:17:\"color_description\";s:36:\"Usa formato esadecimale, es. #ffffff\";s:6:\"colors\";s:6:\"Colori\";s:11:\"custom_logo\";s:19:\"Logo personalizzato\";s:14:\"encryptedField\";s:19:\"Campo crittografato\";s:8:\"datatype\";s:9:\"Tipo dato\";s:10:\"all_caches\";s:25:\"Tutte le copie temporanee\";s:10:\"data_cache\";s:24:\"Copie temporanee di dati\";s:15:\"log_search_type\";s:11:\"Tipo diario\";s:19:\"quantityValue_field\";s:16:\"Valore quantità\";s:27:\"calculatedValue_explanation\";s:95:\"Consulta la documentazione ufficiale per sapere quali metodi necessitano di essere implementati\";s:21:\"calculatedValue_field\";s:16:\"Valore calcolato\";s:17:\"web2print_baseURL\";s:7:\"BaseURL\";s:21:\"web2print_baseURL_txt\";s:127:\"BaseURL per PDFreactor. Viene utilizzato come prefisso ad ogni URL relativo nei modelli di stampa durante la creazione dei PDF.\";s:17:\"allow_dirty_close\";s:42:\"Disabilita avviso di contenuto non salvato\";s:18:\"preserve_meta_data\";s:31:\"Mantiene meta dati (non toglie)\";s:4:\"salt\";s:17:\"Sale di algoritmo\";s:31:\"predefined_metadata_definitions\";s:32:\"Definizioni Metadata predefinite\";s:17:\"allowed_group_ids\";s:26:\"ID gruppi (CSV) consentiti\";s:34:\"classificationstore_tooltip_sorter\";s:62:\"Gli elementi scritti in minuscolo verranno mostrati come primi\";s:22:\"class_field_name_error\";s:39:\"Il nome del campo seguente ha un errore\";s:8:\"longname\";s:13:\"Nome completo\";s:19:\"quantityValue_units\";s:32:\"Definizione unità QuantityValue\";s:16:\"conversionFactor\";s:19:\"Fattore conversione\";s:16:\"conversionOffset\";s:23:\"Scostamento conversione\";s:5:\"reset\";s:9:\"Reimposta\";s:13:\"password_hint\";s:134:\"La password deve contenere come minimo 10 caratteri, una lettera minuscola, una maiuscola, un numero e un carattere speciale (@ # ...)\";s:7:\"log_pid\";s:3:\"PID\";s:35:\"search_console_settings_description\";s:117:\"Per usare l\'integrazione Google Search Console, configura il profilo Google API Service nelle impostazioni di sistema\";s:14:\"fieldcontainer\";s:17:\"Contenitore campo\";s:18:\"edit_configuration\";s:32:\"Modifica configurazione deposito\";s:14:\"search_for_key\";s:14:\"Chiave ricerca\";s:32:\"web2print_enable_in_default_view\";s:58:\"Abilita Web2Print nella schermata di default dei Documenti\";s:36:\"web2print_enable_in_default_view_txt\";s:198:\"Abilita documenti Web2Print per la vista documenti predefinita nella prospettiva predefinita. Come alternativa attiva questo o crea viste e prospettive personalizzate per gestire documenti Web2Print\";s:14:\"web2print_tool\";s:9:\"Strumento\";s:19:\"web2print_save_mode\";s:31:\"Modalità salvataggio documento\";s:23:\"web2print_save_mode_txt\";s:191:\"Modalità salvataggio documento = cleanup elimina ogni elemento di documento non usato per il documento corrente. Potrebbe essere richiesto per i rapporti di utilizzo nei documenti in stampa.\";s:29:\"web2print_pdfreactor_settings\";s:23:\"Impostazioni PDFreactor\";s:28:\"web2print_wkhtmltopdf_binary\";s:22:\"Eseguibile wkhtmltopdf\";s:33:\"web2print_wkhtmltopdf_options_txt\";s:73:\"Una per linea con \'--\' e spazio tra chiave e valore (es. --chiave valore)\";s:18:\"php_opcache_status\";s:18:\"Status PHP OPcache\";s:19:\"custom_report_class\";s:15:\"Classe rapporto\";s:20:\"editor_configuration\";s:21:\"Configurazione editor\";s:25:\"high_resolution_info_text\";s:170:\"es. per Web-to-Print od ovunque dove srcset non è possibile/sufficiente, non necessario per minuature web normali, ricevono in automatico un attributo srcset con 1x e 2x\";s:17:\"advanced_settings\";s:21:\"Impostazioni avanzate\";s:14:\"preserve_color\";s:33:\"Mantieni colore (profilo, spazio)\";s:28:\"thumbnail_preserve_info_text\";s:163:\"\'Preserve meta data\' e \'preserve color\' valgono solo per transizioni senza composizioni (frame, background color, ...) e alterazioni colore (greyscale, sepia, ...)\";s:9:\"separated\";s:8:\"separato\";s:17:\"log_refresh_label\";s:13:\"Aggiorna ogni\";s:28:\"website_translation_settings\";s:36:\"Impostazioni di traduzione condivisa\";s:20:\"language_permissions\";s:58:\"Permessi lingua (nessun permesso di vista significa tutto)\";s:15:\"rendering_class\";s:41:\"Classe di rappresentazione personalizzata\";s:14:\"rendering_data\";s:33:\"Dati passati per rappresentazione\";s:18:\"web2print_protocol\";s:10:\"Protocollo\";s:10:\"rows_fixed\";s:22:\"Dimensione fissa righe\";s:10:\"cols_fixed\";s:24:\"Dimensione fissa colonne\";s:12:\"force_resize\";s:23:\"Forza ridimensionamento\";s:7:\"site_id\";s:7:\"ID Sito\";s:8:\"site_ids\";s:16:\"ID multipli Sito\";s:16:\"site_ids_tooltip\";s:42:\"Indica una lista di ID separati da virgola\";s:33:\"predefined_hotspot_data_templates\";s:24:\"Modelli dati predefiniti\";s:36:\"hide_locale_labels_when_tabs_reached\";s:46:\"Nascondi etichette tradotte dopo numeri di tab\";s:36:\"classificationstore_error_addkey_msg\";s:31:\"Errore di aggiunta della chiave\";s:42:\"classificationstore_dialog_keygroup_search\";s:19:\"Cerca Chiave/Gruppo\";s:12:\"environments\";s:8:\"Ambienti\";s:12:\"decimal_size\";s:15:\"Misura decimale\";s:23:\"decimal_mysql_type_info\";s:238:\"Se dimensione decimale o precisione sono indicate, viene usato il tipo di dato MySQL <code>DECIMAL(decimalSize, decimalPrecision)</code>. Se mandante i valori predefiniti sono <code>64</code> per dimensione e <code>0</code>per precisione.\";s:33:\"decimal_mysql_type_naming_warning\";s:163:\"Prendi nota che in termini MySQL <code>decimalSize</code> si riferisce a <code>precision</code> e <code>decimalPrecision</code> si riferisce a <code>scale</code>.\n\";s:12:\"action_scope\";s:13:\"Ambito Azione\";s:22:\"session_with_variables\";s:24:\"Sessione (con variabili)\";s:17:\"targeting_visitor\";s:10:\"Visitatore\";s:58:\"targeting_condition_visited_page_before_piwik_data_warning\";s:100:\"Questa condizione recupera in modo sincrono dati da Piwik e ciò può essere lento. Usa con cautela.\";s:68:\"targeting_condition_visited_page_before_piwik_not_configured_warning\";s:110:\"Questa condizione non può essere combinata visto che Piwik non è configurato e il risultato è sempre falso.\";s:31:\"targeting_condition_url_pattern\";s:26:\"URL (Espressione Regolare)\";s:26:\"assign_target_group_weight\";s:4:\"Peso\";s:24:\"target_group_multiselect\";s:35:\"Gruppo Obiettivo selezione multipla\";s:21:\"select_a_target_group\";s:29:\"Seleziona un Gruppo Obiettivo\";s:25:\"turn_off_usage_statistics\";s:33:\"Disattiva statistiche di utilizzo\";s:25:\"redirects_type_entire_uri\";s:12:\"URI completo\";s:25:\"redirects_type_path_query\";s:26:\"Percorso ed interrogazione\";s:20:\"redirects_csv_import\";s:28:\"Redireziona importazione CSV\";s:22:\"redirects_import_total\";s:6:\"Totale\";s:24:\"redirects_import_created\";s:6:\"Creati\";s:24:\"redirects_import_updated\";s:10:\"Aggiornati\";s:24:\"redirects_import_errored\";s:10:\"Con errori\";s:23:\"redirects_import_errors\";s:6:\"Errori\";s:27:\"redirects_import_error_line\";s:5:\"Linea\";s:10:\"save_order\";s:12:\"Salva Ordine\";s:22:\"clear_cache_and_reload\";s:35:\"Pulisci copie temporanee e ricarica\";s:42:\"extension_manager_state_change_not_allowed\";s:63:\"Cambiamenti di stato non sono consentiti per questa estensione.\";s:31:\"objectsMetadata_type_columnbool\";s:15:\"Colonna Binario\";s:32:\"objectsMetadata_type_multiselect\";s:18:\"Selezione multipla\";s:24:\"inputQuantityValue_field\";s:28:\"Valore inserimento quantità\";s:18:\"show_applogger_tab\";s:21:\"Mostra tab diario app\";s:7:\"analyze\";s:8:\"Analizza\";s:11:\"unique_qtip\";s:82:\"Sarà aggiunto un vincolo univicità. Non è necessario specificare anche \'indice\'\";s:20:\"temporarily_disabled\";s:28:\"Temporaneamente disabilitato\";s:19:\"enabled_in_editmode\";s:31:\"Abilitato in modalità modifica\";s:14:\"boolean_select\";s:17:\"Selezione binaria\";s:22:\"options_provider_class\";s:40:\"Classe fornitore opzioni o Nome servizio\";s:21:\"options_provider_data\";s:22:\"Dati fornitore opzioni\";s:24:\"link_generator_reference\";s:45:\"Classe fornitore collegamento o Nome servizio\";s:9:\"yes_label\";s:20:\"Nome mostrato per Si\";s:8:\"no_label\";s:20:\"Nome mostrato per No\";s:11:\"empty_label\";s:23:\"Nome mostrato per Vuoto\";s:25:\"branding_logo_description\";s:101:\"Usato nella schermata di accesso ed avvio. Consigliato un file SVG (sono anche supportati JPG & PNG).\";s:23:\"appearance_and_branding\";s:19:\"Aspetto & identità\";s:20:\"web2print_apiKey_txt\";s:86:\"Se l\'istanza di PDFreactor è impostata per richiedere chiavi API, puoi inserirla qui.\";s:13:\"used_by_class\";s:16:\"Usato da classe:\";s:17:\"uses_these_bricks\";s:23:\"Utilizza questi bricks:\";s:19:\"analytics_gtag_code\";s:29:\"Usa codice GTag per analytics\";s:30:\"targeting_toolbar_browser_note\";s:409:\"<b>NOTA:</b> L\'abilitazione degli strumenti di obiettivo riguarda solo la sessione della postazione corrente. Se vuoi utilizzare gli strumenti su una postazione diversa devi abilitarlo di nuovo. Leggi la <a target=\'_blank\' href=\'https://pimcore.com/docs/5.1.x/Development_Documentation/Tools_and_Features/Targeting_and_Personalization/index.html#page_Debugging-Targeting-Data\'>documentazione</a> per dettagli.\";s:10:\"deactivate\";s:9:\"Disattiva\";s:18:\"admin_translations\";s:25:\"Traduzioni amministratore\";s:10:\"last_login\";s:14:\"Ultimo accesso\";s:27:\"errors_from_the_last_7_days\";s:28:\"Errori degli ultimi 7 giorni\";s:28:\"microsoft_word_export_notice\";s:428:\"<ul><li>Non è possibile reimportare questa esportazione</li><li>Il formato di esportazione è HTML, che può essere tranquillamente aperto con Word</li><li>Questa esportazione non include l\'informazione completa di disposizione (solamente la formattazione di testo base)</li><li>La selezione di lingua è usata per impostare la lingua per le traduzioni dei campi dell\'oggetto (solo i campi tradotti vengono esportati)</li></ul>\";s:23:\"multiselect_render_type\";s:21:\"Tipo rappresentazione\";s:36:\"please_dont_forget_to_reload_pimcore\";s:62:\"<b>Non dimenticare di ricaricare pimcore dopo le modifiche</b>\";s:12:\"2fa_required\";s:41:\"Autenticazione a doppio fattore richiesta\";s:16:\"2fa_reset_secret\";s:26:\"Reimposta la sicurezza F2A\";s:14:\"2fa_reset_done\";s:108:\"Sicurezza F2A reimpostata, l\'utente può generare una nuova versione dopo l\'accesso (dalla sezione Profilo).\";s:19:\"focal_point_support\";s:21:\"Supporto punto focale\";s:19:\"default_positioning\";s:26:\"Posizionamento Predefinito\";s:28:\"thumbnail_focal_point_notice\";s:192:\"L\'immagine è ritagliata in automatico in base al punto focale impostato nella sorgente. Se nessun punto focale è presente, sono usate le impostazione di posizionamento predefinite qua sotto.\";s:6:\"iframe\";s:18:\"Anteprima / Iframe\";s:16:\"parent_php_class\";s:19:\"Classe PHP genitore\";s:10:\"iframe_url\";s:10:\"URL Iframe\";s:13:\"rasterize_svg\";s:26:\"Rendi SVG a mappa di punti\";s:23:\"rasterize_svg_info_text\";s:147:\"I file SVG sono convertiti automaticamente a mappa di punti quando sono usate trasformazioni diverse da ridimensiona o scala per larghezza/altezza.\";s:23:\"wildcards_are_supported\";s:26:\"Caratteri jolly supportati\";s:20:\"classification_store\";s:20:\"Classification Store\";s:36:\"system_performance_stability_warning\";s:281:\"Please do not perform this action unless you are sure what you are doing.<br /><b style=\'color:red\'>This action can have a major impact onto the stability and performance of the entire system, and may causes an overload or complete crash of the server!</b><br /><br />Are you sure?\";s:18:\"listing_use_traits\";s:20:\"Listing Use (traits)\";s:24:\"listing_parent_php_class\";s:24:\"Listing Parent PHP Class\";s:21:\"clear_full_page_cache\";s:21:\"Clear Full Page Cache\";s:12:\"icon_library\";s:12:\"Icon Library\";s:15:\"expand_cs_group\";s:63:\"There are empty features not displayed here. Click to show them\";s:15:\"hide_empty_data\";s:15:\"Hide empty data\";s:10:\"colorspace\";s:10:\"Colorspace\";s:16:\"class_attributes\";s:16:\"Class Attributes\";s:20:\"operator_group_other\";s:6:\"Others\";s:26:\"operator_group_transformer\";s:12:\"Transformers\";s:24:\"operator_group_extractor\";s:10:\"Extractors\";s:24:\"operator_group_formatter\";s:10:\"Formatters\";s:23:\"operator_group_renderer\";s:8:\"Renderer\";s:26:\"operator_renderer_settings\";s:17:\"Renderer Settings\";s:15:\"refresh_preview\";s:15:\"Refresh Preview\";s:20:\"many_to_one_relation\";s:20:\"Many-To-One Relation\";s:21:\"many_to_many_relation\";s:21:\"Many-To-Many Relation\";s:28:\"many_to_many_object_relation\";s:28:\"Many-To-Many Object Relation\";s:30:\"advanced_many_to_many_relation\";s:30:\"Advanced Many-To-Many Relation\";s:37:\"advanced_many_to_many_object_relation\";s:37:\"Advanced Many-To-Many Object Relation\";s:29:\"custom_login_background_image\";s:29:\"Custom Login Background Image\";s:14:\"show_charcount\";s:20:\"Show Character Count\";s:10:\"max_length\";s:10:\"Max Length\";s:25:\"exclude_from_search_index\";s:37:\"Exclude from Backend Full-Text Search\";s:5:\"media\";s:5:\"Media\";s:12:\"encrypt_data\";s:12:\"Encrypt Data\";s:24:\"encrypt_data_description\";s:78:\"Data-at-Rest/Tablespace Encryption needs to be enabled on your Database Server\";s:14:\"reports_config\";s:14:\"Reports Config\";s:4:\"left\";s:4:\"left\";s:5:\"right\";s:5:\"right\";s:18:\"provide_split_view\";s:18:\"Provide Split View\";s:26:\"allow_multiple_assignments\";s:26:\"Allow Multiple Assignments\";s:23:\"enable_admin_async_load\";s:26:\"Enable Async Load in Admin\";s:27:\"async_loading_warning_block\";s:73:\"WARNING: Async Loading is NOT possible within Localized Fields and Blocks\";s:22:\"path_formatter_service\";s:25:\"Formatter Service / Class\";s:12:\"tab_position\";s:12:\"Tab Position\";s:29:\"invert_colors_on_login_screen\";s:29:\"Invert Colors on Login Screen\";s:29:\"activate_column_configuration\";s:29:\"Activate Column Configuration\";s:26:\"table_column_configuration\";s:20:\"Column Configuration\";s:20:\"delete_language_note\";s:152:\"Note: Removing language from the list will not delete its respective data. Please use console command \'pimcore:locale:delete-unused-tables\' for cleanup.\";s:20:\"send_invitation_link\";s:20:\"Send Invitation Link\";s:15:\"invitation_sent\";s:21:\"Login Invitation sent\";s:20:\"invitation_link_sent\";s:60:\"A temporary login link has been sent to email address: \"%s\" \";s:11:\"geopolyline\";s:19:\"Geographic Polyline\";s:42:\"classificationstore_error_group_exists_msg\";s:35:\"Group with this name already exists\";s:32:\"classificationstore_group_by_key\";s:12:\"Group by key\";s:26:\"allow_to_create_new_object\";s:46:\"Allow to create a new object in relation field\";s:31:\"inherited_default_value_warning\";s:94:\"The default value is used if either inheritance is deactivated or if the parent value is empty\";s:8:\"url_slug\";s:8:\"URL Slug\";s:22:\"url_slug_datatype_info\";s:101:\"Enter the controller & action in the following format:<br>App\\Controller\\ProductController:slugAction\";s:17:\"controller_action\";s:19:\"Controller & Action\";s:21:\"implements_interfaces\";s:23:\"Implements interface(s)\";s:17:\"enter_media_query\";s:36:\"Please enter a valid CSS media query\";s:21:\"1x1_pixel_placeholder\";s:21:\"1x1 Pixel Placeholder\";s:33:\"1x1_pixel_placeholder_description\";s:111:\"Just returns a 1x1 pixel GIF base64 encoded, in case you don\'t want to display an image for a certain condition\";s:50:\"you_can_drag_the_tabs_to_reorder_the_media_queries\";s:66:\"You can drag the tabs to reorder the priority of the media queries\";s:36:\"classificationstore_group_limitation\";s:16:\"Max. group items\";s:18:\"preserve_animation\";s:27:\"Preserve animations for GIF\";s:28:\"preserve_animation_info_text\";s:89:\"Supported transformations are: Frame, Cover, Contain, Resize, ScaleByWidth, ScaleByHeight\";s:11:\"label_align\";s:11:\"Label Align\";s:3:\"top\";s:3:\"top\";s:17:\"width_explanation\";s:147:\"The width of this component. A numeric value will be interpreted as the number of pixels; a string value will be treated as a CSS value with units.\";s:18:\"height_explanation\";s:148:\"The height of this component. A numeric value will be interpreted as the number of pixels; a string value will be treated as a CSS value with units.\";s:23:\"reverse_object_relation\";s:23:\"Reverse Object Relation\";s:17:\"add_media_segment\";s:17:\"Add Media Segment\";s:19:\"enter_media_segment\";s:68:\"Please enter a valid bitrate(e.g. 400k, 1500k, 1M) for video segment\";s:18:\"dash_media_message\";s:70:\"This option generates a single .mpd file with media segments(bitrates)\";s:18:\"log_applicationlog\";s:18:\"Application Logger\";s:23:\"puppeteer_documentation\";s:9:\"Puppeteer\";s:38:\"web2print_headlesschrome_documentation\";s:20:\"Option Documentation\";s:48:\"web2print_headlesschrome_documentation_additions\";s:18:\"Additional Options\";s:53:\"web2print_headlesschrome_documentation_additions_text\";s:126:\"There are two additional options: \"header\" and \"footer\". This options need a URL, which returns the header or footer template.\";s:14:\"json_converter\";s:22:\"Formatting the Options\";s:19:\"json_converter_link\";s:14:\"JSON Formatter\";s:27:\"preview_generator_reference\";s:39:\"Preview Generator Class or Service Name\";i:15;s:2:\"15\";s:4:\"15.5\";s:4:\"15.5\";i:16;s:2:\"16\";s:4:\"16.5\";s:4:\"16.5\";i:17;s:2:\"17\";s:4:\"17.5\";s:4:\"17.5\";i:18;s:2:\"18\";s:4:\"18.5\";s:4:\"18.5\";i:19;s:2:\"19\";s:4:\"19.5\";s:4:\"19.5\";i:20;s:2:\"20\";s:4:\"20.5\";s:4:\"20.5\";i:21;s:2:\"21\";s:4:\"21.5\";s:4:\"21.5\";i:22;s:2:\"22\";s:4:\"22.5\";s:4:\"22.5\";i:23;s:2:\"23\";s:4:\"23.5\";s:4:\"23.5\";i:24;s:2:\"24\";s:4:\"24.5\";s:4:\"24.5\";i:25;s:2:\"25\";s:4:\"25.5\";s:4:\"25.5\";i:26;s:2:\"26\";s:4:\"26.5\";s:4:\"26.5\";i:27;s:2:\"27\";s:4:\"27.5\";s:4:\"27.5\";i:28;s:2:\"28\";s:4:\"28.5\";s:4:\"28.5\";i:29;s:2:\"29\";s:4:\"29.5\";s:4:\"29.5\";i:30;s:2:\"30\";s:4:\"30.5\";s:4:\"30.5\";i:31;s:2:\"31\";s:4:\"31.5\";s:4:\"31.5\";i:32;s:2:\"32\";s:4:\"32.5\";s:4:\"32.5\";i:33;s:2:\"33\";s:4:\"33.5\";s:4:\"33.5\";i:34;s:2:\"34\";s:4:\"34.5\";s:4:\"34.5\";i:35;s:2:\"35\";s:4:\"35.5\";s:4:\"35.5\";i:36;s:2:\"36\";s:4:\"36.5\";s:4:\"36.5\";i:37;s:2:\"37\";s:4:\"37.5\";s:4:\"37.5\";i:38;s:2:\"38\";s:4:\"38.5\";s:4:\"38.5\";i:39;s:2:\"39\";s:4:\"39.5\";s:4:\"39.5\";s:3:\"3XL\";s:3:\"3XL\";i:40;s:2:\"40\";s:4:\"40.5\";s:4:\"40.5\";i:41;s:2:\"41\";s:4:\"41.5\";s:4:\"41.5\";i:42;s:2:\"42\";s:4:\"42.5\";s:4:\"42.5\";i:43;s:2:\"43\";s:4:\"43.5\";s:4:\"43.5\";i:44;s:2:\"44\";s:4:\"44.5\";s:4:\"44.5\";i:45;s:2:\"45\";s:4:\"45.5\";s:4:\"45.5\";i:46;s:2:\"46\";s:4:\"46.5\";s:4:\"46.5\";i:47;s:2:\"47\";s:4:\"47.5\";s:4:\"47.5\";i:48;s:2:\"48\";s:4:\"48.5\";s:4:\"48.5\";i:49;s:2:\"49\";s:4:\"49.5\";s:4:\"49.5\";i:50;s:2:\"50\";s:4:\"50.5\";s:4:\"50.5\";i:51;s:2:\"51\";s:4:\"51.5\";s:4:\"51.5\";i:52;s:2:\"52\";s:13:\"A Bathing Ape\";s:13:\"A Bathing Ape\";s:60:\"API key does not satisfy the minimum length of 16 characters\";s:60:\"API key does not satisfy the minimum length of 16 characters\";s:19:\"Abercrombie & Fitch\";s:19:\"Abercrombie & Fitch\";s:6:\"Adidas\";s:6:\"Adidas\";s:11:\"Afghanistan\";s:11:\"Afghanistan\";s:9:\"Afternoon\";s:9:\"Afternoon\";s:7:\"Albania\";s:7:\"Albania\";s:7:\"Algeria\";s:7:\"Algeria\";s:25:\"American Eagle Outfitters\";s:25:\"American Eagle Outfitters\";s:14:\"American Samoa\";s:14:\"American Samoa\";s:7:\"Andorra\";s:7:\"Andorra\";s:6:\"Angola\";s:6:\"Angola\";s:8:\"Anguilla\";s:8:\"Anguilla\";s:10:\"Antarctica\";s:10:\"Antarctica\";s:17:\"Antigua & Barbuda\";s:17:\"Antigua & Barbuda\";s:9:\"Argentina\";s:9:\"Argentina\";s:6:\"Armani\";s:6:\"Armani\";s:15:\"Armani Exchange\";s:15:\"Armani Exchange\";s:7:\"Armenia\";s:7:\"Armenia\";s:10:\"Artificial\";s:10:\"Artificial\";s:5:\"Aruba\";s:5:\"Aruba\";s:16:\"Ascension Island\";s:16:\"Ascension Island\";s:10:\"Attributes\";s:10:\"Attributes\";s:17:\"Attributes Region\";s:17:\"Attributes Region\";s:9:\"Australia\";s:9:\"Australia\";s:7:\"Austria\";s:7:\"Austria\";s:10:\"Azerbaijan\";s:10:\"Azerbaijan\";s:12:\"Aéropostale\";s:12:\"Aéropostale\";s:7:\"Bahamas\";s:7:\"Bahamas\";s:7:\"Bahrain\";s:7:\"Bahrain\";s:10:\"Balenciaga\";s:10:\"Balenciaga\";s:15:\"Banana Republic\";s:15:\"Banana Republic\";s:10:\"Bangladesh\";s:10:\"Bangladesh\";s:8:\"Barbados\";s:8:\"Barbados\";s:7:\"Belarus\";s:7:\"Belarus\";s:7:\"Belgium\";s:7:\"Belgium\";s:6:\"Belize\";s:6:\"Belize\";s:5:\"Benin\";s:5:\"Benin\";s:7:\"Bermuda\";s:7:\"Bermuda\";s:6:\"Bhutan\";s:6:\"Bhutan\";s:9:\"Billabong\";s:9:\"Billabong\";s:7:\"Bolivia\";s:7:\"Bolivia\";s:13:\"Bombay Shades\";s:13:\"Bombay Shades\";s:20:\"Bosnia & Herzegovina\";s:20:\"Bosnia & Herzegovina\";s:8:\"Botswana\";s:8:\"Botswana\";s:13:\"Bouvet Island\";s:13:\"Bouvet Island\";s:5:\"Brand\";s:5:\"Brand\";s:6:\"Brazil\";s:6:\"Brazil\";s:30:\"British Indian Ocean Territory\";s:30:\"British Indian Ocean Territory\";s:22:\"British Virgin Islands\";s:22:\"British Virgin Islands\";s:6:\"Brunei\";s:6:\"Brunei\";s:7:\"Bulgari\";s:7:\"Bulgari\";s:8:\"Bulgaria\";s:8:\"Bulgaria\";s:12:\"Bundle Price\";s:12:\"Bundle Price\";s:15:\"Bundle Products\";s:15:\"Bundle Products\";s:8:\"Burberry\";s:8:\"Burberry\";s:12:\"Burkina Faso\";s:12:\"Burkina Faso\";s:7:\"Burundi\";s:7:\"Burundi\";s:3:\"C&A\";s:3:\"C&A\";s:10:\"CSV Export\";s:10:\"CSV Export\";s:12:\"Calvin Klein\";s:12:\"Calvin Klein\";s:8:\"Cambodia\";s:8:\"Cambodia\";s:8:\"Cameroon\";s:8:\"Cameroon\";s:6:\"Canada\";s:6:\"Canada\";s:14:\"Canary Islands\";s:14:\"Canary Islands\";s:10:\"Cape Verde\";s:10:\"Cape Verde\";s:21:\"Caribbean Netherlands\";s:21:\"Caribbean Netherlands\";s:8:\"Carrhart\";s:8:\"Carrhart\";s:7:\"Cartier\";s:7:\"Cartier\";s:14:\"Categorization\";s:14:\"Categorization\";s:8:\"Category\";s:8:\"Category\";s:13:\"Category Code\";s:13:\"Category Code\";s:20:\"Category Information\";s:20:\"Category Information\";s:13:\"Category Name\";s:13:\"Category Name\";s:13:\"Category data\";s:13:\"Category data\";s:14:\"Cayman Islands\";s:14:\"Cayman Islands\";s:24:\"Central African Republic\";s:24:\"Central African Republic\";s:15:\"Ceuta & Melilla\";s:15:\"Ceuta & Melilla\";s:4:\"Chad\";s:4:\"Chad\";s:8:\"Champion\";s:8:\"Champion\";s:5:\"Chile\";s:5:\"Chile\";s:5:\"China\";s:5:\"China\";s:14:\"Christian Dior\";s:14:\"Christian Dior\";s:16:\"Christmas Island\";s:16:\"Christmas Island\";s:4:\"City\";s:4:\"City\";s:6:\"Clarks\";s:6:\"Clarks\";s:6:\"Closed\";s:6:\"Closed\";s:12:\"Closing Time\";s:12:\"Closing Time\";s:23:\"Cocos (Keeling) Islands\";s:23:\"Cocos (Keeling) Islands\";s:8:\"Colombia\";s:8:\"Colombia\";s:5:\"Color\";s:5:\"Color\";s:10:\"Color Data\";s:10:\"Color Data\";s:17:\"Color Information\";s:17:\"Color Information\";s:8:\"Columbia\";s:8:\"Columbia\";s:7:\"Comoros\";s:7:\"Comoros\";s:11:\"Composition\";s:11:\"Composition\";s:19:\"Congo - Brazzaville\";s:19:\"Congo - Brazzaville\";s:16:\"Congo - Kinshasa\";s:16:\"Congo - Kinshasa\";s:9:\"Continued\";s:9:\"Continued\";s:8:\"Converse\";s:8:\"Converse\";s:12:\"Cook Islands\";s:12:\"Cook Islands\";s:10:\"Costa Rica\";s:10:\"Costa Rica\";s:12:\"Country Code\";s:12:\"Country Code\";s:7:\"Croatia\";s:7:\"Croatia\";s:4:\"Cuba\";s:4:\"Cuba\";s:8:\"Curaçao\";s:8:\"Curaçao\";s:6:\"Cyprus\";s:6:\"Cyprus\";s:7:\"Czechia\";s:7:\"Czechia\";s:16:\"Côte d’Ivoire\";s:16:\"Côte d’Ivoire\";s:4:\"DKNY\";s:4:\"DKNY\";s:15:\"Day of the Week\";s:15:\"Day of the Week\";s:7:\"Denmark\";s:7:\"Denmark\";s:18:\"Diamond Supply Co.\";s:18:\"Diamond Supply Co.\";s:12:\"Diego Garcia\";s:12:\"Diego Garcia\";s:6:\"Diesel\";s:6:\"Diesel\";s:10:\"Dimensions\";s:10:\"Dimensions\";s:8:\"Djibouti\";s:8:\"Djibouti\";s:15:\"Dolce & Gabbana\";s:15:\"Dolce & Gabbana\";s:8:\"Dominica\";s:8:\"Dominica\";s:18:\"Dominican Republic\";s:18:\"Dominican Republic\";s:8:\"EAN Code\";s:8:\"EAN Code\";s:7:\"Ecuador\";s:7:\"Ecuador\";s:5:\"Egypt\";s:5:\"Egypt\";s:11:\"El Salvador\";s:11:\"El Salvador\";s:7:\"Ellesse\";s:7:\"Ellesse\";s:14:\"Emporio Armani\";s:14:\"Emporio Armani\";s:7:\"English\";s:7:\"English\";s:17:\"Equatorial Guinea\";s:17:\"Equatorial Guinea\";s:7:\"Eritrea\";s:7:\"Eritrea\";s:17:\"Ermenegildo Zegna\";s:17:\"Ermenegildo Zegna\";s:7:\"Estonia\";s:7:\"Estonia\";s:8:\"Eswatini\";s:8:\"Eswatini\";s:8:\"Ethiopia\";s:8:\"Ethiopia\";s:4:\"Euro\";s:4:\"Euro\";s:8:\"Everlast\";s:8:\"Everlast\";s:7:\"Express\";s:7:\"Express\";s:16:\"Falkland Islands\";s:16:\"Falkland Islands\";s:13:\"Faroe Islands\";s:13:\"Faroe Islands\";s:5:\"Fendi\";s:5:\"Fendi\";s:4:\"Fiji\";s:4:\"Fiji\";s:4:\"Fila\";s:4:\"Fila\";s:7:\"Finland\";s:7:\"Finland\";s:10:\"Forever 21\";s:10:\"Forever 21\";s:6:\"France\";s:6:\"France\";s:10:\"Fred Perry\";s:10:\"Fred Perry\";s:6:\"French\";s:6:\"French\";s:17:\"French Connection\";s:17:\"French Connection\";s:13:\"French Guiana\";s:13:\"French Guiana\";s:16:\"French Polynesia\";s:16:\"French Polynesia\";s:27:\"French Southern Territories\";s:27:\"French Southern Territories\";s:6:\"Friday\";s:6:\"Friday\";s:10:\"G-Star Raw\";s:10:\"G-Star Raw\";s:5:\"Gabon\";s:5:\"Gabon\";s:6:\"Gambia\";s:6:\"Gambia\";s:4:\"Gant\";s:4:\"Gant\";s:8:\"Gap Inc.\";s:8:\"Gap Inc.\";s:7:\"Georgia\";s:7:\"Georgia\";s:7:\"Germany\";s:7:\"Germany\";s:5:\"Ghana\";s:5:\"Ghana\";s:9:\"Gibraltar\";s:9:\"Gibraltar\";s:8:\"Givenchy\";s:8:\"Givenchy\";s:6:\"Greece\";s:6:\"Greece\";s:14:\"Greek (Greece)\";s:14:\"Greek (Greece)\";s:9:\"Greenland\";s:9:\"Greenland\";s:7:\"Grenada\";s:7:\"Grenada\";s:10:\"Guadeloupe\";s:10:\"Guadeloupe\";s:4:\"Guam\";s:4:\"Guam\";s:9:\"Guatemala\";s:9:\"Guatemala\";s:5:\"Gucci\";s:5:\"Gucci\";s:8:\"Guernsey\";s:8:\"Guernsey\";s:5:\"Guess\";s:5:\"Guess\";s:6:\"Guinea\";s:6:\"Guinea\";s:13:\"Guinea-Bissau\";s:13:\"Guinea-Bissau\";s:6:\"Guyana\";s:6:\"Guyana\";s:3:\"H&M\";s:3:\"H&M\";s:14:\"Hackett London\";s:14:\"Hackett London\";s:5:\"Haiti\";s:5:\"Haiti\";s:8:\"Has Heel\";s:8:\"Has Heel\";s:24:\"Heard & McDonald Islands\";s:24:\"Heard & McDonald Islands\";s:4:\"Heel\";s:4:\"Heel\";s:11:\"Heel Height\";s:11:\"Heel Height\";s:10:\"Heel Panel\";s:10:\"Heel Panel\";s:12:\"Helly Hansen\";s:12:\"Helly Hansen\";s:7:\"Hermès\";s:7:\"Hermès\";s:13:\"Hollister Co.\";s:13:\"Hollister Co.\";s:8:\"Honduras\";s:8:\"Honduras\";s:19:\"Hong Kong SAR China\";s:19:\"Hong Kong SAR China\";s:9:\"Hugo Boss\";s:9:\"Hugo Boss\";s:7:\"Hungary\";s:7:\"Hungary\";s:7:\"Iceland\";s:7:\"Iceland\";s:9:\"ImageInfo\";s:9:\"ImageInfo\";s:6:\"Images\";s:6:\"Images\";s:5:\"India\";s:5:\"India\";s:9:\"Indonesia\";s:9:\"Indonesia\";s:4:\"Iran\";s:4:\"Iran\";s:4:\"Iraq\";s:4:\"Iraq\";s:7:\"Ireland\";s:7:\"Ireland\";s:11:\"Isle of Man\";s:11:\"Isle of Man\";s:6:\"Israel\";s:6:\"Israel\";s:7:\"Italian\";s:7:\"Italian\";s:5:\"Italy\";s:5:\"Italy\";s:7:\"J. Crew\";s:7:\"J. Crew\";s:7:\"Jamaica\";s:7:\"Jamaica\";s:5:\"Japan\";s:5:\"Japan\";s:6:\"Jersey\";s:6:\"Jersey\";s:6:\"Jordan\";s:6:\"Jordan\";s:5:\"Kappa\";s:5:\"Kappa\";s:10:\"Kazakhstan\";s:10:\"Kazakhstan\";s:12:\"Kenneth Cole\";s:12:\"Kenneth Cole\";s:5:\"Kenya\";s:5:\"Kenya\";s:5:\"Kenzo\";s:5:\"Kenzo\";s:8:\"Kiribati\";s:8:\"Kiribati\";s:6:\"Kosovo\";s:6:\"Kosovo\";s:6:\"Kuwait\";s:6:\"Kuwait\";s:10:\"Kyrgyzstan\";s:10:\"Kyrgyzstan\";s:1:\"L\";s:1:\"L\";s:7:\"Lacoste\";s:7:\"Lacoste\";s:4:\"Laos\";s:4:\"Laos\";s:6:\"Latvia\";s:6:\"Latvia\";s:7:\"Lebanon\";s:7:\"Lebanon\";s:3:\"Lee\";s:3:\"Lee\";s:7:\"Lesotho\";s:7:\"Lesotho\";s:18:\"Levi Strauss & Co.\";s:18:\"Levi Strauss & Co.\";s:7:\"Liberia\";s:7:\"Liberia\";s:5:\"Libya\";s:5:\"Libya\";s:13:\"Liechtenstein\";s:13:\"Liechtenstein\";s:9:\"Lithuania\";s:9:\"Lithuania\";s:4:\"Long\";s:4:\"Long\";s:14:\"Louis Phillipe\";s:14:\"Louis Phillipe\";s:13:\"Louis Vuitton\";s:13:\"Louis Vuitton\";s:10:\"Luxembourg\";s:10:\"Luxembourg\";s:1:\"M\";s:1:\"M\";s:15:\"Macao SAR China\";s:15:\"Macao SAR China\";s:10:\"Madagascar\";s:10:\"Madagascar\";s:7:\"Made In\";s:7:\"Made In\";s:6:\"Malawi\";s:6:\"Malawi\";s:8:\"Malaysia\";s:8:\"Malaysia\";s:8:\"Maldives\";s:8:\"Maldives\";s:4:\"Mali\";s:4:\"Mali\";s:5:\"Malta\";s:5:\"Malta\";s:12:\"Map Location\";s:12:\"Map Location\";s:11:\"Marc Jacobs\";s:11:\"Marc Jacobs\";s:11:\"Marc O\'Polo\";s:11:\"Marc O\'Polo\";s:16:\"Marshall Islands\";s:16:\"Marshall Islands\";s:10:\"Martinique\";s:10:\"Martinique\";s:13:\"Massimo Dutti\";s:13:\"Massimo Dutti\";s:6:\"Master\";s:6:\"Master\";s:19:\"Master (Admin Mode)\";s:19:\"Master (Admin Mode)\";s:8:\"Material\";s:8:\"Material\";s:13:\"Material Code\";s:13:\"Material Code\";s:13:\"Material Data\";s:13:\"Material Data\";s:20:\"Material Information\";s:20:\"Material Information\";s:13:\"Material Name\";s:13:\"Material Name\";s:9:\"Materials\";s:9:\"Materials\";s:10:\"Mauritania\";s:10:\"Mauritania\";s:9:\"Mauritius\";s:9:\"Mauritius\";s:7:\"Mayotte\";s:7:\"Mayotte\";s:6:\"Medium\";s:6:\"Medium\";s:6:\"Mexico\";s:6:\"Mexico\";s:12:\"Michael Kors\";s:12:\"Michael Kors\";s:10:\"Micronesia\";s:10:\"Micronesia\";s:7:\"Moldova\";s:7:\"Moldova\";s:6:\"Monaco\";s:6:\"Monaco\";s:7:\"Moncler\";s:7:\"Moncler\";s:6:\"Monday\";s:6:\"Monday\";s:8:\"Mongolia\";s:8:\"Mongolia\";s:10:\"Montenegro\";s:10:\"Montenegro\";s:10:\"Montserrat\";s:10:\"Montserrat\";s:7:\"Morning\";s:7:\"Morning\";s:7:\"Morocco\";s:7:\"Morocco\";s:10:\"Mozambique\";s:10:\"Mozambique\";s:15:\"Myanmar (Burma)\";s:15:\"Myanmar (Burma)\";s:20:\"Name and Description\";s:20:\"Name and Description\";s:7:\"Namibia\";s:7:\"Namibia\";s:7:\"Natural\";s:7:\"Natural\";s:5:\"Nauru\";s:5:\"Nauru\";s:7:\"Nautica\";s:7:\"Nautica\";s:5:\"Nepal\";s:5:\"Nepal\";s:11:\"Netherlands\";s:11:\"Netherlands\";s:11:\"New Balance\";s:11:\"New Balance\";s:13:\"New Caledonia\";s:13:\"New Caledonia\";s:11:\"New Zealand\";s:11:\"New Zealand\";s:9:\"Nicaragua\";s:9:\"Nicaragua\";s:5:\"Niger\";s:5:\"Niger\";s:7:\"Nigeria\";s:7:\"Nigeria\";s:4:\"Nike\";s:4:\"Nike\";s:4:\"Niue\";s:4:\"Niue\";s:14:\"Norfolk Island\";s:14:\"Norfolk Island\";s:11:\"North Korea\";s:11:\"North Korea\";s:15:\"North Macedonia\";s:15:\"North Macedonia\";s:24:\"Northern Mariana Islands\";s:24:\"Northern Mariana Islands\";s:6:\"Norway\";s:6:\"Norway\";s:6:\"Oakley\";s:6:\"Oakley\";s:9:\"Off-White\";s:9:\"Off-White\";s:4:\"Oman\";s:4:\"Oman\";s:13:\"Opening Hours\";s:13:\"Opening Hours\";s:12:\"Opening Time\";s:12:\"Opening Time\";s:10:\"OpeningDay\";s:10:\"OpeningDay\";s:8:\"Openings\";s:8:\"Openings\";s:9:\"Packaging\";s:9:\"Packaging\";s:8:\"Pakistan\";s:8:\"Pakistan\";s:6:\"Palace\";s:6:\"Palace\";s:5:\"Palau\";s:5:\"Palau\";s:23:\"Palestinian Territories\";s:23:\"Palestinian Territories\";s:6:\"Panama\";s:6:\"Panama\";s:16:\"Papua New Guinea\";s:16:\"Papua New Guinea\";s:8:\"Paraguay\";s:8:\"Paraguay\";s:15:\"Part of the Day\";s:15:\"Part of the Day\";s:9:\"Patagonia\";s:9:\"Patagonia\";s:10:\"Paul Smith\";s:10:\"Paul Smith\";s:7:\"Percent\";s:7:\"Percent\";s:6:\"Person\";s:6:\"Person\";s:4:\"Peru\";s:4:\"Peru\";s:11:\"Philippines\";s:11:\"Philippines\";s:12:\"Phone Number\";s:12:\"Phone Number\";s:16:\"Pitcairn Islands\";s:16:\"Pitcairn Islands\";s:6:\"Poland\";s:6:\"Poland\";s:6:\"Polish\";s:6:\"Polish\";s:8:\"Portugal\";s:8:\"Portugal\";s:10:\"Portuguese\";s:10:\"Portuguese\";s:5:\"Prada\";s:5:\"Prada\";s:5:\"Price\";s:5:\"Price\";s:7:\"Product\";s:7:\"Product\";s:12:\"Product Data\";s:12:\"Product Data\";s:19:\"Product Information\";s:19:\"Product Information\";s:12:\"Product Name\";s:12:\"Product Name\";s:8:\"Province\";s:8:\"Province\";s:14:\"Pseudo-Accents\";s:14:\"Pseudo-Accents\";s:11:\"Pseudo-Bidi\";s:11:\"Pseudo-Bidi\";s:11:\"Puerto Rico\";s:11:\"Puerto Rico\";s:11:\"Pull & Bear\";s:11:\"Pull & Bear\";s:4:\"Puma\";s:4:\"Puma\";s:5:\"Qatar\";s:5:\"Qatar\";s:11:\"Quicksilver\";s:11:\"Quicksilver\";s:12:\"Ralph Lauren\";s:12:\"Ralph Lauren\";s:6:\"Reebok\";s:6:\"Reebok\";s:5:\"Rolex\";s:5:\"Rolex\";s:7:\"Romania\";s:7:\"Romania\";s:6:\"Russia\";s:6:\"Russia\";s:6:\"Rwanda\";s:6:\"Rwanda\";s:8:\"Réunion\";s:8:\"Réunion\";s:1:\"S\";s:1:\"S\";s:3:\"SEO\";s:3:\"SEO\";s:3:\"SKU\";s:3:\"SKU\";s:11:\"Sail Racing\";s:11:\"Sail Racing\";s:19:\"Salvatore Ferragamo\";s:19:\"Salvatore Ferragamo\";s:5:\"Samoa\";s:5:\"Samoa\";s:10:\"San Marino\";s:10:\"San Marino\";s:8:\"Saturday\";s:8:\"Saturday\";s:12:\"Saudi Arabia\";s:12:\"Saudi Arabia\";s:10:\"Schott NYC\";s:10:\"Schott NYC\";s:13:\"Scotch & Soda\";s:13:\"Scotch & Soda\";s:7:\"Senegal\";s:7:\"Senegal\";s:6:\"Serbia\";s:6:\"Serbia\";s:10:\"Seychelles\";s:10:\"Seychelles\";s:17:\"Shirts Attributes\";s:17:\"Shirts Attributes\";s:16:\"ShirtsAttributes\";s:16:\"ShirtsAttributes\";s:16:\"Shoes Attributes\";s:16:\"Shoes Attributes\";s:15:\"ShoesAttributes\";s:15:\"ShoesAttributes\";s:4:\"Shop\";s:4:\"Shop\";s:10:\"Shop Image\";s:10:\"Shop Image\";s:9:\"Shop Name\";s:9:\"Shop Name\";s:5:\"Short\";s:5:\"Short\";s:17:\"Short Description\";s:17:\"Short Description\";s:12:\"Sierra Leone\";s:12:\"Sierra Leone\";s:9:\"Singapore\";s:9:\"Singapore\";s:12:\"Sint Maarten\";s:12:\"Sint Maarten\";s:4:\"Size\";s:4:\"Size\";s:10:\"Size Panel\";s:10:\"Size Panel\";s:13:\"Sleeve Length\";s:13:\"Sleeve Length\";s:8:\"Slovakia\";s:8:\"Slovakia\";s:8:\"Slovenia\";s:8:\"Slovenia\";s:15:\"Solomon Islands\";s:15:\"Solomon Islands\";s:7:\"Somalia\";s:7:\"Somalia\";s:12:\"South Africa\";s:12:\"South Africa\";s:38:\"South Georgia & South Sandwich Islands\";s:38:\"South Georgia & South Sandwich Islands\";s:11:\"South Korea\";s:11:\"South Korea\";s:11:\"South Sudan\";s:11:\"South Sudan\";s:5:\"Spain\";s:5:\"Spain\";s:7:\"Spanish\";s:7:\"Spanish\";s:9:\"Sri Lanka\";s:9:\"Sri Lanka\";s:15:\"St. Barthélemy\";s:15:\"St. Barthélemy\";s:10:\"St. Helena\";s:10:\"St. Helena\";s:17:\"St. Kitts & Nevis\";s:17:\"St. Kitts & Nevis\";s:9:\"St. Lucia\";s:9:\"St. Lucia\";s:10:\"St. Martin\";s:10:\"St. Martin\";s:21:\"St. Pierre & Miquelon\";s:21:\"St. Pierre & Miquelon\";s:24:\"St. Vincent & Grenadines\";s:24:\"St. Vincent & Grenadines\";s:12:\"Stone Island\";s:12:\"Stone Island\";s:6:\"Street\";s:6:\"Street\";s:5:\"Sudan\";s:5:\"Sudan\";s:6:\"Sunday\";s:6:\"Sunday\";s:7:\"Supreme\";s:7:\"Supreme\";s:8:\"Suriname\";s:8:\"Suriname\";s:20:\"Svalbard & Jan Mayen\";s:20:\"Svalbard & Jan Mayen\";s:6:\"Sweden\";s:6:\"Sweden\";s:11:\"Switzerland\";s:11:\"Switzerland\";s:9:\"Synthetic\";s:9:\"Synthetic\";s:5:\"Syria\";s:5:\"Syria\";s:22:\"São Tomé & Príncipe\";s:22:\"São Tomé & Príncipe\";s:6:\"Taiwan\";s:6:\"Taiwan\";s:10:\"Tajikistan\";s:10:\"Tajikistan\";s:8:\"Tanzania\";s:8:\"Tanzania\";s:9:\"Ted Baker\";s:9:\"Ted Baker\";s:8:\"Thailand\";s:8:\"Thailand\";s:14:\"The North Face\";s:14:\"The North Face\";s:22:\"The Timberland Company\";s:22:\"The Timberland Company\";s:8:\"Thursday\";s:8:\"Thursday\";s:13:\"Tiffany & Co.\";s:13:\"Tiffany & Co.\";s:11:\"Timor-Leste\";s:11:\"Timor-Leste\";s:4:\"Togo\";s:4:\"Togo\";s:7:\"Tokelau\";s:7:\"Tokelau\";s:8:\"Tom Ford\";s:8:\"Tom Ford\";s:14:\"Tommy Hilfiger\";s:14:\"Tommy Hilfiger\";s:5:\"Tonga\";s:5:\"Tonga\";s:6:\"Topman\";s:6:\"Topman\";s:18:\"TranslationSummary\";s:18:\"TranslationSummary\";s:22:\"Translations Completed\";s:22:\"Translations Completed\";s:17:\"Trinidad & Tobago\";s:17:\"Trinidad & Tobago\";s:16:\"Tristan da Cunha\";s:16:\"Tristan da Cunha\";s:7:\"Tuesday\";s:7:\"Tuesday\";s:7:\"Tunisia\";s:7:\"Tunisia\";s:6:\"Turkey\";s:6:\"Turkey\";s:12:\"Turkmenistan\";s:12:\"Turkmenistan\";s:22:\"Turks & Caicos Islands\";s:22:\"Turks & Caicos Islands\";s:6:\"Tuvalu\";s:6:\"Tuvalu\";s:8:\"Typology\";s:8:\"Typology\";s:21:\"U.S. Outlying Islands\";s:21:\"U.S. Outlying Islands\";s:19:\"U.S. Virgin Islands\";s:19:\"U.S. Virgin Islands\";s:6:\"Uganda\";s:6:\"Uganda\";s:7:\"Ukraine\";s:7:\"Ukraine\";s:5:\"Umbro\";s:5:\"Umbro\";s:12:\"Under Armour\";s:12:\"Under Armour\";s:6:\"Uniqlo\";s:6:\"Uniqlo\";s:20:\"United Arab Emirates\";s:20:\"United Arab Emirates\";s:14:\"United Kingdom\";s:14:\"United Kingdom\";s:13:\"United States\";s:13:\"United States\";s:7:\"Uruguay\";s:7:\"Uruguay\";s:10:\"Uzbekistan\";s:10:\"Uzbekistan\";s:9:\"Valentino\";s:9:\"Valentino\";s:4:\"Vans\";s:4:\"Vans\";s:7:\"Vanuatu\";s:7:\"Vanuatu\";s:12:\"Vatican City\";s:12:\"Vatican City\";s:9:\"Venezuela\";s:9:\"Venezuela\";s:7:\"Versace\";s:7:\"Versace\";s:7:\"Vietnam\";s:7:\"Vietnam\";s:14:\"Vineyard Vines\";s:14:\"Vineyard Vines\";s:18:\"Wahrehouse Address\";s:18:\"Wahrehouse Address\";s:15:\"Wallis & Futuna\";s:15:\"Wallis & Futuna\";s:9:\"Warehouse\";s:9:\"Warehouse\";s:14:\"Warehouse Data\";s:14:\"Warehouse Data\";s:21:\"Warehouse Information\";s:21:\"Warehouse Information\";s:9:\"Wednesday\";s:9:\"Wednesday\";s:14:\"Western Sahara\";s:14:\"Western Sahara\";s:8:\"Wrangler\";s:8:\"Wrangler\";s:2:\"XL\";s:2:\"XL\";s:11:\"XLSX Export\";s:11:\"XLSX Export\";s:2:\"XS\";s:2:\"XS\";s:3:\"XXL\";s:3:\"XXL\";s:3:\"XXS\";s:3:\"XXS\";s:5:\"Yemen\";s:5:\"Yemen\";s:18:\"Yves Saint Laurent\";s:18:\"Yves Saint Laurent\";s:6:\"Zambia\";s:6:\"Zambia\";s:4:\"Zara\";s:4:\"Zara\";s:8:\"Zimbabwe\";s:8:\"Zimbabwe\";s:8:\"Zip Code\";s:8:\"Zip Code\";s:3:\"aaa\";s:3:\"aaa\";s:9:\"classname\";s:9:\"classname\";s:5:\"clear\";s:5:\"clear\";s:4:\"down\";s:4:\"down\";s:7:\"dynamic\";s:7:\"dynamic\";s:15:\"fieldcollection\";s:15:\"fieldcollection\";s:5:\"login\";s:5:\"login\";s:38:\"object_add_dialog_custom_text.Category\";s:38:\"object_add_dialog_custom_text.Category\";s:35:\"object_add_dialog_custom_text.Color\";s:35:\"object_add_dialog_custom_text.Color\";s:38:\"object_add_dialog_custom_text.Material\";s:38:\"object_add_dialog_custom_text.Material\";s:37:\"object_add_dialog_custom_text.Product\";s:37:\"object_add_dialog_custom_text.Product\";s:34:\"object_add_dialog_custom_text.Shop\";s:34:\"object_add_dialog_custom_text.Shop\";s:39:\"object_add_dialog_custom_title.Category\";s:39:\"object_add_dialog_custom_title.Category\";s:36:\"object_add_dialog_custom_title.Color\";s:36:\"object_add_dialog_custom_title.Color\";s:39:\"object_add_dialog_custom_title.Material\";s:39:\"object_add_dialog_custom_title.Material\";s:38:\"object_add_dialog_custom_title.Product\";s:38:\"object_add_dialog_custom_title.Product\";s:35:\"object_add_dialog_custom_title.Shop\";s:35:\"object_add_dialog_custom_title.Shop\";s:16:\"operator_ifempty\";s:16:\"operator_ifempty\";s:24:\"operator_locale_switcher\";s:24:\"operator_locale_switcher\";s:3:\"sku\";s:3:\"sku\";s:2:\"up\";s:2:\"up\";s:14:\"Åland Islands\";s:14:\"Åland Islands\";s:3:\"€\";s:3:\"€\";s:27:\"gdpr_dataSource_dataObjects\";s:7:\"Oggetti\";s:38:\"keybinding_searchAndReplaceAssignments\";s:19:\"Trova e sostituisci\";s:9:\"parent_id\";s:13:\"ID del parent\";s:16:\"modificationDate\";s:16:\"Data di modifica\";s:12:\"creationDate\";s:17:\"Data di creazione\";s:29:\"keybinding_sharedTranslations\";s:20:\"Traduzioni condivise\";s:25:\"classificationstore_group\";s:6:\"Gruppo\";s:33:\"classificationstore_tag_col_group\";s:6:\"Gruppo\";s:40:\"classificationstore_col_groupdescription\";s:6:\"Gruppo\";s:24:\"keybinding_customReports\";s:23:\"Rapporti personalizzati\";s:4:\"none\";s:7:\"Nessuno\";s:19:\"redirects_type_path\";s:8:\"Percorso\";s:17:\"keybinding_robots\";s:10:\"robots.txt\";s:14:\"web2print_port\";s:5:\"Porta\";s:13:\"email_subject\";s:7:\"Oggetto\";s:24:\"gdpr_dataSource_sentMail\";s:13:\"Email inviate\";s:17:\"email_log_subject\";s:7:\"Oggetto\";s:31:\"gdpr_data_extractor_label_email\";s:15:\"Indirizzo Email\";s:20:\"web2print_colorspace\";s:10:\"Colorspace\";s:7:\"numeric\";s:6:\"Numero\";s:17:\"newsletter_report\";s:23:\"Rapporto personalizzato\";s:27:\"structuredtable_type_number\";s:6:\"Numero\";s:27:\"objectsMetadata_type_number\";s:6:\"Numero\";s:30:\"overwrite_object_with_same_key\";s:11:\"Sovrascrivi\";s:23:\"keybinding_openDocument\";s:14:\"Apri documento\";s:20:\"keybinding_openAsset\";s:10:\"Apri asset\";s:21:\"keybinding_openObject\";s:12:\"Apri oggetto\";s:12:\"save_success\";s:21:\"Salvato correttamente\";s:32:\"file_explorer_saved_file_success\";s:21:\"Salvato correttamente\";s:14:\"workflow_notes\";s:4:\"Note\";s:21:\"keybinding_openInTree\";s:18:\"Mostra nell\'albero\";s:8:\"2fa_code\";s:6:\"Codice\";s:14:\"web2print_tags\";s:3:\"Tag\";s:15:\"web2print_links\";s:4:\"Link\";s:28:\"keybinding_seoDocumentEditor\";s:20:\"Editor Documento SEO\";s:16:\"clear_temp_files\";s:25:\"Pulisci i file temporanei\";s:18:\"keybinding_reports\";s:8:\"Rapporti\";s:16:\"keybinding_roles\";s:5:\"Ruoli\";s:8:\"username\";s:11:\"Nome Utente\";s:8:\"password\";s:8:\"Password\";s:6:\"submit\";s:5:\"Invia\";s:13:\"cache_enabled\";s:7:\"Abilita\";s:16:\"localized_fields\";s:17:\"Campi localizzati\";s:17:\"field_collections\";s:16:\"Collezioni Campi\";s:9:\"col_label\";s:9:\"Etichetta\";s:17:\"piwik_widget_site\";s:4:\"Sito\";s:21:\"keybinding_recycleBin\";s:7:\"Cestino\";s:14:\"email_log_data\";s:4:\"Dati\";s:13:\"show_metainfo\";s:12:\"Informazioni\";s:15:\"keybinding_save\";s:5:\"Salva\";s:18:\"keybinding_publish\";s:8:\"Pubblica\";s:17:\"keybinding_rename\";s:8:\"Rinomina\";s:14:\"email_log_from\";s:2:\"Da\";s:10:\"email_from\";s:2:\"Da\";s:15:\"log_search_from\";s:2:\"Da\";s:12:\"email_log_to\";s:1:\"A\";s:8:\"email_to\";s:1:\"A\";s:13:\"log_search_to\";s:1:\"A\";s:14:\"email_log_text\";s:5:\"Testo\";s:25:\"structuredtable_type_text\";s:5:\"Testo\";s:25:\"objectsMetadata_type_text\";s:5:\"Testo\";s:18:\"pimcore_lable_text\";s:5:\"Testo\";s:35:\"classificationstore_tag_col_keyName\";s:6:\"Chiave\";s:28:\"gdpr_data_extractor_label_id\";s:2:\"ID\";s:15:\"web2print_title\";s:6:\"Titolo\";s:12:\"config_title\";s:6:\"Titolo\";s:20:\"keybinding_unpublish\";s:21:\"Annulla pubblicazione\";s:17:\"navigation_target\";s:9:\"Obiettivo\";s:8:\"log_type\";s:4:\"Tipo\";s:22:\"gdpr_dataSource_export\";s:7:\"Esporta\";s:19:\"keybinding_glossary\";s:9:\"Glossario\";s:16:\"keybinding_users\";s:6:\"Utenti\";s:33:\"classificationstore_configuration\";s:14:\"Configurazione\";s:33:\"classificationstore_tag_col_value\";s:6:\"Valore\";s:22:\"gdpr_dataSource_assets\";s:5:\"Media\";s:25:\"structuredtable_type_bool\";s:20:\"Casella di selezione\";s:27:\"objectsMetadata_type_select\";s:9:\"Selezione\";s:7:\"boolean\";s:4:\"Bool\";s:25:\"objectsMetadata_type_bool\";s:4:\"Bool\";s:18:\"keybinding_refresh\";s:8:\"Ricarica\";s:17:\"web2print_version\";s:8:\"Versione\";s:35:\"gdpr_data_extractor_label_firstname\";s:4:\"Nome\";s:34:\"gdpr_data_extractor_label_lastname\";s:7:\"Cognome\";s:20:\"keybinding_redirects\";s:16:\"Reindirizzamenti\";s:10:\"log_source\";s:8:\"Sorgente\";s:40:\"classificationstore_error_addgroup_title\";s:6:\"Errore\";s:38:\"classificationstore_error_addkey_title\";s:6:\"Errore\";s:20:\"element_lock_message\";s:34:\"Elemento aperto da un altro utente\";s:16:\"web2print_apiKey\";s:10:\"Chiave API\";s:12:\"customlayout\";s:27:\"Disposizione personalizzata\";s:24:\"special_settings_tooltip\";s:21:\"Impostazioni Speciali\";s:19:\"application_logging\";s:18:\"Application Logger\";s:28:\"keybinding_applicationLogger\";s:18:\"Application Logger\";s:20:\"log_search_component\";s:10:\"Componente\";s:11:\"log_message\";s:9:\"Messaggio\";s:31:\"classificationstore_menu_config\";s:20:\"Classification Store\";s:19:\"classificationstore\";s:20:\"Classification Store\";s:39:\"classificationstore_mbx_enterkey_prompt\";s:14:\"Inserisci nome\";s:43:\"classificationstore_error_addcollection_msg\";s:36:\"Errore durante l\'aggiunta del gruppo\";s:13:\"quantityValue\";s:16:\"Valore quantità\";s:18:\"inputQuantityValue\";s:28:\"Valore inserimento quantità\";s:15:\"calculatedValue\";s:16:\"Valore calcolato\";s:27:\"keybinding_tagConfiguration\";s:18:\"Configurazione Tag\";s:14:\"log_search_pid\";s:3:\"PID\";s:13:\"piwik_site_id\";s:7:\"ID Sito\";s:27:\"substring_operator_settings\";s:12:\"Impostazioni\";s:27:\"operator_substring_settings\";s:12:\"Impostazioni\";s:26:\"delete_gridconfig_dblcheck\";s:36:\"Si vuole cancellare questo elemento?\";s:17:\"piwik_widget_date\";s:12:\"Data di fine\";s:19:\"log_refresh_seconds\";s:7:\"Secondi\";s:12:\"email_log_cc\";s:2:\"Cc\";s:13:\"email_log_bcc\";s:3:\"Bcc\";s:23:\"keybinding_closeAllTabs\";s:18:\"Chiudi tutti i tab\";s:10:\"log_search\";s:5:\"Cerca\";s:4:\"cols\";s:7:\"colonne\";s:16:\"log_reset_search\";s:9:\"Reimposta\";s:29:\"keybinding_showElementHistory\";s:16:\"Elementi recenti\";s:22:\"keybinding_quickSearch\";s:28:\"Ricerca veloce (Ctrl+Spazio)\";s:23:\"keybinding_httpErrorLog\";s:11:\"Errori HTTP\";s:22:\"keybinding_notesEvents\";s:13:\"Note & Eventi\";s:22:\"keybinding_searchAsset\";s:11:\"Cerca Media\";s:25:\"keybinding_searchDocument\";s:15:\"Cerca documenti\";s:23:\"keybinding_searchObject\";s:13:\"Cerca oggetti\";s:6:\"routes\";s:16:\"Percorsi statici\";s:7:\"plugins\";s:9:\"Pacchetti\";s:18:\"log_search_message\";s:9:\"Messaggio\";s:9:\"rgbaColor\";s:6:\"Colore\";}s:14:\"admin+intl-icu\";a:1:{s:15:\"__pimcore_dummy\";s:12:\"only_a_dummy\";}}s:56:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0metadata\";a:0:{}s:57:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0resources\";a:0:{}s:54:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0locale\";s:2:\"it\";s:65:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0fallbackCatalogue\";N;s:54:\"\0Symfony\\Component\\Translation\\MessageCatalogue\0parent\";N;}\";',	31536000,	1621009255),
(UNHEX('7472616E736C61746F72007461677300'),	'i:29;',	NULL,	1621015391);

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` varchar(50) NOT NULL,
  `name` varchar(190) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `classes` (`id`, `name`) VALUES
('CAT',	'Category'),
('COL',	'Color'),
('MAT',	'Material'),
('PRD',	'Product'),
('SHO',	'Shop');

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

INSERT INTO `dependencies` (`id`, `sourcetype`, `sourceid`, `targettype`, `targetid`) VALUES
(3,	'object',	162,	'asset',	9),
(1,	'object',	162,	'object',	5),
(2,	'object',	162,	'object',	158),
(27,	'object',	163,	'asset',	4),
(4,	'object',	163,	'object',	54),
(28,	'object',	164,	'asset',	5),
(5,	'object',	164,	'object',	17),
(26,	'object',	165,	'asset',	6),
(6,	'object',	165,	'object',	64),
(25,	'object',	166,	'asset',	7),
(7,	'object',	166,	'object',	66),
(23,	'object',	167,	'asset',	8),
(8,	'object',	167,	'object',	125),
(24,	'object',	168,	'asset',	10),
(9,	'object',	168,	'object',	129),
(22,	'object',	169,	'asset',	11),
(10,	'object',	169,	'object',	153),
(21,	'object',	170,	'asset',	12),
(11,	'object',	170,	'object',	155),
(12,	'object',	171,	'object',	7),
(13,	'object',	171,	'object',	158),
(14,	'object',	171,	'object',	160),
(18,	'object',	172,	'asset',	14),
(15,	'object',	172,	'object',	19),
(20,	'object',	173,	'asset',	16),
(17,	'object',	173,	'object',	77),
(19,	'object',	174,	'asset',	15),
(16,	'object',	174,	'object',	66),
(29,	'object',	175,	'object',	162),
(30,	'object',	175,	'object',	171),
(31,	'object',	180,	'asset',	18),
(32,	'object',	181,	'asset',	19),
(34,	'object',	182,	'asset',	20);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

INSERT INTO `documents` (`id`, `parentId`, `type`, `key`, `path`, `index`, `published`, `creationDate`, `modificationDate`, `userOwner`, `userModification`, `versionCount`) VALUES
(1,	0,	'page',	'',	'/',	999999,	1,	1613764830,	1619542130,	1,	2,	1);

DROP TABLE IF EXISTS `documents_editables`;
CREATE TABLE `documents_editables` (
  `documentId` int(11) unsigned NOT NULL DEFAULT 0,
  `name` varchar(750) CHARACTER SET ascii NOT NULL DEFAULT '',
  `type` varchar(50) DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  PRIMARY KEY (`documentId`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
  `prettyUrl` varchar(255) DEFAULT NULL,
  `contentMasterDocumentId` int(11) DEFAULT NULL,
  `targetGroupIds` varchar(255) DEFAULT NULL,
  `missingRequiredEditable` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prettyUrl` (`prettyUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `documents_page` (`id`, `controller`, `template`, `title`, `description`, `metaData`, `prettyUrl`, `contentMasterDocumentId`, `targetGroupIds`, `missingRequiredEditable`) VALUES
(1,	'App\\Controller\\DefaultController::defaultAction',	'default/default.html.twig',	'',	'',	'a:0:{}',	NULL,	NULL,	'',	NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4;


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `gridconfigs` (`id`, `ownerId`, `classId`, `name`, `searchType`, `type`, `config`, `description`, `creationDate`, `modificationDate`, `shareGlobally`) VALUES
(1,	2,	'PRD',	'Product Export',	'folder',	'object',	'{\"language\":\"en\",\"pageSize\":25,\"sortinfo\":false,\"classId\":\"PRD\",\"columns\":{\"id\":{\"name\":\"id\",\"position\":1,\"hidden\":false,\"width\":44,\"locked\":false,\"fieldConfig\":{\"key\":\"id\",\"type\":\"system\",\"label\":\"id\",\"locked\":false,\"position\":1,\"width\":44}},\"fullpath\":{\"name\":\"fullpath\",\"position\":2,\"hidden\":false,\"width\":236,\"locked\":false,\"fieldConfig\":{\"key\":\"fullpath\",\"type\":\"system\",\"label\":\"fullpath\",\"locked\":false,\"position\":2,\"width\":236}},\"sku\":{\"name\":\"sku\",\"position\":3,\"hidden\":false,\"width\":77,\"locked\":false,\"fieldConfig\":{\"key\":\"sku\",\"type\":\"input\",\"label\":\"SKU\",\"config\":{\"width\":null},\"layout\":{\"fieldtype\":\"input\",\"width\":null,\"defaultValue\":null,\"queryColumnType\":\"varchar\",\"columnType\":\"varchar\",\"columnLength\":190,\"phpdocType\":\"string\",\"regex\":\"\",\"unique\":true,\"showCharCount\":false,\"name\":\"sku\",\"title\":\"SKU\",\"tooltip\":\"\",\"mandatory\":true,\"noteditable\":false,\"index\":false,\"locked\":false,\"style\":\"\",\"permissions\":null,\"datatype\":\"data\",\"relationType\":false,\"invisible\":false,\"visibleGridView\":false,\"visibleSearch\":false,\"defaultValueGenerator\":\"\"},\"position\":3,\"width\":77,\"locked\":false}},\"price\":{\"name\":\"price\",\"position\":4,\"hidden\":false,\"width\":66,\"locked\":false,\"fieldConfig\":{\"key\":\"price\",\"type\":\"quantityValue\",\"label\":\"Price\",\"config\":{\"width\":null},\"layout\":{\"fieldtype\":\"quantityValue\",\"width\":null,\"unitWidth\":null,\"defaultValue\":null,\"defaultUnit\":\"1\",\"validUnits\":[\"1\"],\"decimalPrecision\":null,\"autoConvert\":false,\"queryColumnType\":{\"value\":\"double\",\"unit\":\"bigint(20)\"},\"columnType\":{\"value\":\"double\",\"unit\":\"bigint(20)\"},\"phpdocType\":\"\\\\Pimcore\\\\Model\\\\DataObject\\\\Data\\\\QuantityValue\",\"name\":\"price\",\"title\":\"Price\",\"tooltip\":\"\",\"mandatory\":false,\"noteditable\":false,\"index\":false,\"locked\":false,\"style\":\"\",\"permissions\":null,\"datatype\":\"data\",\"relationType\":false,\"invisible\":false,\"visibleGridView\":false,\"visibleSearch\":false,\"defaultValueGenerator\":\"\"},\"position\":4,\"width\":66,\"locked\":false}},\"name\":{\"name\":\"name\",\"position\":5,\"hidden\":false,\"width\":113,\"locked\":false,\"fieldConfig\":{\"key\":\"name\",\"type\":\"input\",\"label\":\"Product Name\",\"config\":{\"width\":null},\"layout\":{\"fieldtype\":\"input\",\"width\":null,\"defaultValue\":null,\"queryColumnType\":\"varchar\",\"columnType\":\"varchar\",\"columnLength\":190,\"phpdocType\":\"string\",\"regex\":\"\",\"unique\":false,\"showCharCount\":false,\"name\":\"name\",\"title\":\"Product Name\",\"tooltip\":\"\",\"mandatory\":false,\"noteditable\":false,\"index\":false,\"locked\":false,\"style\":\"\",\"permissions\":null,\"datatype\":\"data\",\"relationType\":false,\"invisible\":false,\"visibleGridView\":false,\"visibleSearch\":false,\"defaultValueGenerator\":\"\"},\"position\":5,\"width\":113,\"locked\":false}},\"brand\":{\"name\":\"brand\",\"position\":6,\"hidden\":false,\"width\":89,\"locked\":false,\"fieldConfig\":{\"key\":\"brand\",\"type\":\"select\",\"label\":\"Brand\",\"config\":{\"width\":\"\"},\"layout\":{\"fieldtype\":\"select\",\"options\":[{\"key\":\"Nike\",\"value\":\"1\"},{\"key\":\"Ralph Lauren\",\"value\":\"2\"},{\"key\":\"Hugo Boss\",\"value\":\"3\"},{\"key\":\"Tommy Hilfiger\",\"value\":\"4\"},{\"key\":\"Levi Strauss & Co.\",\"value\":\"5\"},{\"key\":\"Burberry\",\"value\":\"6\"},{\"key\":\"Gucci\",\"value\":\"7\"},{\"key\":\"Adidas\",\"value\":\"8\"},{\"key\":\"Lacoste\",\"value\":\"9\"},{\"key\":\"Versace\",\"value\":\"10\"},{\"key\":\"The North Face\",\"value\":\"11\"},{\"key\":\"Louis Vuitton\",\"value\":\"12\"},{\"key\":\"Rolex\",\"value\":\"13\"},{\"key\":\"Calvin Klein\",\"value\":\"14\"},{\"key\":\"Diesel\",\"value\":\"15\"},{\"key\":\"Prada\",\"value\":\"16\"},{\"key\":\"Armani Exchange\",\"value\":\"17\"},{\"key\":\"Tom Ford\",\"value\":\"18\"},{\"key\":\"Zara\",\"value\":\"19\"},{\"key\":\"Givenchy\",\"value\":\"20\"},{\"key\":\"Armani\",\"value\":\"21\"},{\"key\":\"Emporio Armani\",\"value\":\"22\"},{\"key\":\"The Timberland Company\",\"value\":\"23\"},{\"key\":\"Champion\",\"value\":\"24\"},{\"key\":\"Under Armour\",\"value\":\"25\"},{\"key\":\"Vans\",\"value\":\"26\"},{\"key\":\"H&M\",\"value\":\"27\"},{\"key\":\"Guess\",\"value\":\"28\"},{\"key\":\"Hollister Co.\",\"value\":\"29\"},{\"key\":\"Herm\\u00e8s\",\"value\":\"30\"},{\"key\":\"Abercrombie & Fitch\",\"value\":\"31\"},{\"key\":\"J. Crew\",\"value\":\"32\"},{\"key\":\"Dolce & Gabbana\",\"value\":\"33\"},{\"key\":\"Christian Dior\",\"value\":\"34\"},{\"key\":\"Supreme\",\"value\":\"35\"},{\"key\":\"American Eagle Outfitters\",\"value\":\"36\"},{\"key\":\"Michael Kors\",\"value\":\"37\"},{\"key\":\"Banana Republic\",\"value\":\"38\"},{\"key\":\"Balenciaga\",\"value\":\"39\"},{\"key\":\"Fendi\",\"value\":\"40\"},{\"key\":\"Fred Perry\",\"value\":\"41\"},{\"key\":\"Stone Island\",\"value\":\"42\"},{\"key\":\"Converse\",\"value\":\"43\"},{\"key\":\"Nautica\",\"value\":\"44\"},{\"key\":\"Off-White\",\"value\":\"45\"},{\"key\":\"Uniqlo\",\"value\":\"46\"},{\"key\":\"Patagonia\",\"value\":\" Inc.\"},{\"key\":\"A Bathing Ape\",\"value\":\"48\"},{\"key\":\"Gap Inc.\",\"value\":\"49\"},{\"key\":\"Cartier\",\"value\":\"50\"},{\"key\":\"Fila\",\"value\":\"51\"},{\"key\":\"Puma\",\"value\":\"52\"},{\"key\":\"Wrangler\",\"value\":\"53\"},{\"key\":\"Oakley\",\"value\":\" Inc.\"},{\"key\":\"Vineyard Vines\",\"value\":\"55\"},{\"key\":\"Lee\",\"value\":\"56\"},{\"key\":\"New Balance\",\"value\":\"57\"},{\"key\":\"Marc Jacobs\",\"value\":\"58\"},{\"key\":\"Salvatore Ferragamo\",\"value\":\"59\"},{\"key\":\"DKNY\",\"value\":\"60\"},{\"key\":\"Bulgari\",\"value\":\"61\"},{\"key\":\"Reebok\",\"value\":\"62\"},{\"key\":\"Topman\",\"value\":\"63\"},{\"key\":\"Kenneth Cole\",\"value\":\"64\"},{\"key\":\"Yves Saint Laurent\",\"value\":\"65\"},{\"key\":\"Pull & Bear\",\"value\":\"66\"},{\"key\":\"Palace\",\"value\":\"67\"},{\"key\":\"Columbia\",\"value\":\"68\"},{\"key\":\"Carrhart\",\"value\":\"69\"},{\"key\":\"Kappa\",\"value\":\"70\"},{\"key\":\"A\\u00e9ropostale\",\"value\":\"71\"},{\"key\":\"Quicksilver\",\"value\":\"72\"},{\"key\":\"Moncler\",\"value\":\"73\"},{\"key\":\"French Connection\",\"value\":\"74\"},{\"key\":\"Ted Baker\",\"value\":\"75\"},{\"key\":\"Express\",\"value\":\" Inc.\"},{\"key\":\"Tiffany & Co.\",\"value\":\"77\"},{\"key\":\"Massimo Dutti\",\"value\":\"78\"},{\"key\":\"Gant\",\"value\":\"79\"},{\"key\":\"Ellesse\",\"value\":\"80\"},{\"key\":\"Paul Smith\",\"value\":\"81\"},{\"key\":\"Billabong\",\"value\":\"82\"},{\"key\":\"Kenzo\",\"value\":\"83\"},{\"key\":\"Helly Hansen\",\"value\":\"84\"},{\"key\":\"Clarks\",\"value\":\"85\"},{\"key\":\"Diamond Supply Co.\",\"value\":\"86\"},{\"key\":\"Valentino\",\"value\":\"87\"},{\"key\":\"G-Star Raw\",\"value\":\"88\"},{\"key\":\"Ermenegildo Zegna\",\"value\":\"89\"},{\"key\":\"Scotch & Soda\",\"value\":\"90\"},{\"key\":\"Forever 21\",\"value\":\"91\"},{\"key\":\"Hackett London\",\"value\":\"92\"},{\"key\":\"Louis Phillipe\",\"value\":\"93\"},{\"key\":\"Marc O\'Polo\",\"value\":\"94\"},{\"key\":\"Everlast\",\"value\":\"95\"},{\"key\":\"Bombay Shades\",\"value\":\"96\"},{\"key\":\"Schott NYC\",\"value\":\"97\"},{\"key\":\"Sail Racing\",\"value\":\"98\"},{\"key\":\"C&A\",\"value\":\"99\"},{\"key\":\"Umbro\",\"value\":\"100\"}],\"width\":\"\",\"defaultValue\":\"\",\"optionsProviderClass\":\"\",\"optionsProviderData\":\"\",\"queryColumnType\":\"varchar\",\"columnType\":\"varchar\",\"columnLength\":190,\"phpdocType\":\"string\",\"dynamicOptions\":false,\"name\":\"brand\",\"title\":\"Brand\",\"tooltip\":\"\",\"mandatory\":false,\"noteditable\":false,\"index\":false,\"locked\":false,\"style\":\"\",\"permissions\":null,\"datatype\":\"data\",\"relationType\":false,\"invisible\":false,\"visibleGridView\":false,\"visibleSearch\":false,\"defaultValueGenerator\":\"\"},\"position\":6,\"width\":89,\"locked\":false}},\"#6075605352143\":{\"name\":\"#6075605352143\",\"position\":7,\"hidden\":false,\"width\":104,\"locked\":false,\"fieldConfig\":{\"key\":\"#6075605352143\",\"position\":7,\"isOperator\":true,\"attributes\":{\"label\":\"Category Name\",\"type\":\"operator\",\"class\":\"AnyGetter\",\"childs\":[{\"label\":\"Category (category)\",\"type\":\"value\",\"class\":\"DefaultValue\",\"attribute\":\"category\",\"dataType\":\"manyToOneRelation\",\"childs\":[]}],\"attribute\":\"name\",\"param1\":\"\",\"isArrayType\":false,\"forwardAttribute\":\"\",\"forwardParam1\":\"\",\"returnLastResult\":false},\"width\":104,\"locked\":false},\"isOperator\":true}},\"onlyDirectChildren\":false,\"searchFilter\":\"\",\"sqlFilter\":\"o_type = \'object\'\",\"pimcore_version\":\"v6.8.4\",\"pimcore_revision\":\"e2d8837a46ce0a99711be8cc5927418bb221286b\",\"context\":\"[]\"}',	'',	1618305199,	1618321300,	0);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

INSERT INTO `http_error_log` (`id`, `uri`, `code`, `parametersGet`, `parametersPost`, `cookies`, `serverVars`, `date`, `count`) VALUES
(1,	'http://localhost:8888/pimcore-graphql-webservices/my-datahub-configuration',	403,	'a:0:{}',	'a:0:{}',	'a:5:{s:3:\"_ga\";s:26:\"GA1.1.960218608.1549525243\";s:5:\"hblid\";s:32:\"jMpCDLBMFlazGzIR3m39N0Na6oW3rIEb\";s:5:\"olfsk\";s:21:\"olfsk2437698274903195\";s:9:\"PHPSESSID\";s:32:\"9af0d3d4adcbd4f3d211e79b8c2af93a\";s:17:\"pimcore_admin_sid\";s:1:\"1\";}',	'a:74:{s:15:\"REDIRECT_STATUS\";s:3:\"200\";s:9:\"HTTP_HOST\";s:14:\"localhost:8888\";s:15:\"HTTP_CONNECTION\";s:10:\"keep-alive\";s:14:\"CONTENT_LENGTH\";s:4:\"1550\";s:14:\"HTTP_SEC_CH_UA\";s:64:\"\"Google Chrome\";v=\"89\", \"Chromium\";v=\"89\", \";Not A Brand\";v=\"99\"\";s:11:\"HTTP_ACCEPT\";s:16:\"application/json\";s:21:\"HTTP_SEC_CH_UA_MOBILE\";s:2:\"?0\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36\";s:12:\"CONTENT_TYPE\";s:16:\"application/json\";s:11:\"HTTP_ORIGIN\";s:21:\"http://localhost:8888\";s:19:\"HTTP_SEC_FETCH_SITE\";s:11:\"same-origin\";s:19:\"HTTP_SEC_FETCH_MODE\";s:4:\"cors\";s:19:\"HTTP_SEC_FETCH_DEST\";s:5:\"empty\";s:12:\"HTTP_REFERER\";s:83:\"http://localhost:8888/pimcore-datahub-webservices/explorer/my-datahub-configuration\";s:20:\"HTTP_ACCEPT_ENCODING\";s:17:\"gzip, deflate, br\";s:20:\"HTTP_ACCEPT_LANGUAGE\";s:35:\"it-IT,it;q=0.9,en-US;q=0.8,en;q=0.7\";s:11:\"HTTP_COOKIE\";s:164:\"_ga=GA1.1.960218608.1549525243; hblid=jMpCDLBMFlazGzIR3m39N0Na6oW3rIEb; olfsk=olfsk2437698274903195; PHPSESSID=9af0d3d4adcbd4f3d211e79b8c2af93a; pimcore_admin_sid=1\";s:4:\"PATH\";s:60:\"/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin\";s:16:\"SERVER_SIGNATURE\";s:72:\"<address>Apache/2.4.38 (Debian) Server at localhost Port 8888</address>\n\";s:15:\"SERVER_SOFTWARE\";s:22:\"Apache/2.4.38 (Debian)\";s:11:\"SERVER_NAME\";s:9:\"localhost\";s:11:\"SERVER_ADDR\";s:10:\"172.23.0.6\";s:11:\"SERVER_PORT\";s:4:\"8888\";s:11:\"REMOTE_ADDR\";s:10:\"172.23.0.1\";s:13:\"DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:14:\"REQUEST_SCHEME\";s:4:\"http\";s:14:\"CONTEXT_PREFIX\";s:0:\"\";s:21:\"CONTEXT_DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:12:\"SERVER_ADMIN\";s:19:\"webmaster@localhost\";s:15:\"SCRIPT_FILENAME\";s:25:\"/var/www/html/web/app.php\";s:11:\"REMOTE_PORT\";s:5:\"56554\";s:12:\"REDIRECT_URL\";s:53:\"/pimcore-graphql-webservices/my-datahub-configuration\";s:17:\"GATEWAY_INTERFACE\";s:7:\"CGI/1.1\";s:15:\"SERVER_PROTOCOL\";s:8:\"HTTP/1.1\";s:14:\"REQUEST_METHOD\";s:4:\"POST\";s:12:\"QUERY_STRING\";s:0:\"\";s:11:\"REQUEST_URI\";s:53:\"/pimcore-graphql-webservices/my-datahub-configuration\";s:11:\"SCRIPT_NAME\";s:8:\"/app.php\";s:8:\"PHP_SELF\";s:8:\"/app.php\";s:18:\"REQUEST_TIME_FLOAT\";d:1617782457.983507;s:12:\"REQUEST_TIME\";i:1617782457;s:4:\"argv\";a:0:{}s:4:\"argc\";i:0;s:8:\"HOSTNAME\";s:12:\"ac3070cdc7e7\";s:11:\"PHP_VERSION\";s:6:\"7.4.11\";s:14:\"APACHE_CONFDIR\";s:12:\"/etc/apache2\";s:7:\"PHP_MD5\";s:0:\"\";s:11:\"PHP_INI_DIR\";s:18:\"/usr/local/etc/php\";s:8:\"GPG_KEYS\";s:81:\"42670A7FE4D0441C8E4632349E4FDC074A4EF02D 5A52880781F755608BF815FC910DEB46F53EA312\";s:11:\"PHP_LDFLAGS\";s:12:\"-Wl,-O1 -pie\";s:3:\"PWD\";s:13:\"/var/www/html\";s:20:\"APACHE_DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:14:\"APACHE_LOG_DIR\";s:16:\"/var/log/apache2\";s:4:\"LANG\";s:1:\"C\";s:10:\"PHP_SHA256\";s:64:\"5d31675a9b9c21b5bd03389418218c30b26558246870caba8eb54f5856e2d6ce\";s:15:\"APACHE_PID_FILE\";s:28:\"/var/run/apache2/apache2.pid\";s:11:\"PHPIZE_DEPS\";s:76:\"autoconf 		dpkg-dev 		file 		g++ 		gcc 		libc-dev 		make 		pkg-config 		re2c\";s:7:\"PHP_URL\";s:51:\"https://www.php.net/distributions/php-7.4.11.tar.xz\";s:16:\"APACHE_RUN_GROUP\";s:8:\"www-data\";s:15:\"APACHE_LOCK_DIR\";s:17:\"/var/lock/apache2\";s:24:\"PHP_EXTRA_CONFIGURE_ARGS\";s:26:\"--with-apxs2 --disable-cgi\";s:5:\"SHLVL\";s:1:\"0\";s:24:\"COMPOSER_ALLOW_SUPERUSER\";s:1:\"1\";s:10:\"PHP_CFLAGS\";s:83:\"-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64\";s:21:\"COMPOSER_MEMORY_LIMIT\";s:2:\"-1\";s:14:\"APACHE_RUN_DIR\";s:16:\"/var/run/apache2\";s:14:\"APACHE_ENVVARS\";s:20:\"/etc/apache2/envvars\";s:15:\"APACHE_RUN_USER\";s:8:\"www-data\";s:20:\"PHP_EXTRA_BUILD_DEPS\";s:11:\"apache2-dev\";s:11:\"PHP_ASC_URL\";s:55:\"https://www.php.net/distributions/php-7.4.11.tar.xz.asc\";s:12:\"PHP_CPPFLAGS\";s:83:\"-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64\";s:7:\"APP_ENV\";s:4:\"prod\";s:11:\"SYMFONY_ENV\";s:4:\"prod\";s:19:\"PIMCORE_ENVIRONMENT\";s:4:\"prod\";}',	1617782464,	3),
(2,	'http://localhost:8888/pimcore-graphql-webservices/my-datahub-configuration?apikey=ada60c2ac58fa2b195cf20ee3b316',	403,	'a:1:{s:6:\"apikey\";s:29:\"ada60c2ac58fa2b195cf20ee3b316\";}',	'a:0:{}',	'a:5:{s:3:\"_ga\";s:26:\"GA1.1.960218608.1549525243\";s:5:\"hblid\";s:32:\"jMpCDLBMFlazGzIR3m39N0Na6oW3rIEb\";s:5:\"olfsk\";s:21:\"olfsk2437698274903195\";s:9:\"PHPSESSID\";s:32:\"9af0d3d4adcbd4f3d211e79b8c2af93a\";s:17:\"pimcore_admin_sid\";s:1:\"1\";}',	'a:75:{s:15:\"REDIRECT_STATUS\";s:3:\"200\";s:9:\"HTTP_HOST\";s:14:\"localhost:8888\";s:15:\"HTTP_CONNECTION\";s:10:\"keep-alive\";s:14:\"CONTENT_LENGTH\";s:4:\"1550\";s:14:\"HTTP_SEC_CH_UA\";s:64:\"\"Google Chrome\";v=\"89\", \"Chromium\";v=\"89\", \";Not A Brand\";v=\"99\"\";s:11:\"HTTP_ACCEPT\";s:16:\"application/json\";s:21:\"HTTP_SEC_CH_UA_MOBILE\";s:2:\"?0\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36\";s:12:\"CONTENT_TYPE\";s:16:\"application/json\";s:11:\"HTTP_ORIGIN\";s:21:\"http://localhost:8888\";s:19:\"HTTP_SEC_FETCH_SITE\";s:11:\"same-origin\";s:19:\"HTTP_SEC_FETCH_MODE\";s:4:\"cors\";s:19:\"HTTP_SEC_FETCH_DEST\";s:5:\"empty\";s:12:\"HTTP_REFERER\";s:120:\"http://localhost:8888/pimcore-datahub-webservices/explorer/my-datahub-configuration?apikey=ada60c2ac58fa2b195cf20ee3b316\";s:20:\"HTTP_ACCEPT_ENCODING\";s:17:\"gzip, deflate, br\";s:20:\"HTTP_ACCEPT_LANGUAGE\";s:35:\"it-IT,it;q=0.9,en-US;q=0.8,en;q=0.7\";s:11:\"HTTP_COOKIE\";s:164:\"_ga=GA1.1.960218608.1549525243; hblid=jMpCDLBMFlazGzIR3m39N0Na6oW3rIEb; olfsk=olfsk2437698274903195; PHPSESSID=9af0d3d4adcbd4f3d211e79b8c2af93a; pimcore_admin_sid=1\";s:4:\"PATH\";s:60:\"/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin\";s:16:\"SERVER_SIGNATURE\";s:72:\"<address>Apache/2.4.38 (Debian) Server at localhost Port 8888</address>\n\";s:15:\"SERVER_SOFTWARE\";s:22:\"Apache/2.4.38 (Debian)\";s:11:\"SERVER_NAME\";s:9:\"localhost\";s:11:\"SERVER_ADDR\";s:10:\"172.23.0.6\";s:11:\"SERVER_PORT\";s:4:\"8888\";s:11:\"REMOTE_ADDR\";s:10:\"172.23.0.1\";s:13:\"DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:14:\"REQUEST_SCHEME\";s:4:\"http\";s:14:\"CONTEXT_PREFIX\";s:0:\"\";s:21:\"CONTEXT_DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:12:\"SERVER_ADMIN\";s:19:\"webmaster@localhost\";s:15:\"SCRIPT_FILENAME\";s:25:\"/var/www/html/web/app.php\";s:11:\"REMOTE_PORT\";s:5:\"56640\";s:12:\"REDIRECT_URL\";s:53:\"/pimcore-graphql-webservices/my-datahub-configuration\";s:21:\"REDIRECT_QUERY_STRING\";s:36:\"apikey=ada60c2ac58fa2b195cf20ee3b316\";s:17:\"GATEWAY_INTERFACE\";s:7:\"CGI/1.1\";s:15:\"SERVER_PROTOCOL\";s:8:\"HTTP/1.1\";s:14:\"REQUEST_METHOD\";s:4:\"POST\";s:12:\"QUERY_STRING\";s:36:\"apikey=ada60c2ac58fa2b195cf20ee3b316\";s:11:\"REQUEST_URI\";s:90:\"/pimcore-graphql-webservices/my-datahub-configuration?apikey=ada60c2ac58fa2b195cf20ee3b316\";s:11:\"SCRIPT_NAME\";s:8:\"/app.php\";s:8:\"PHP_SELF\";s:8:\"/app.php\";s:18:\"REQUEST_TIME_FLOAT\";d:1617782487.015551;s:12:\"REQUEST_TIME\";i:1617782487;s:4:\"argv\";a:1:{i:0;s:36:\"apikey=ada60c2ac58fa2b195cf20ee3b316\";}s:4:\"argc\";i:1;s:8:\"HOSTNAME\";s:12:\"ac3070cdc7e7\";s:11:\"PHP_VERSION\";s:6:\"7.4.11\";s:14:\"APACHE_CONFDIR\";s:12:\"/etc/apache2\";s:7:\"PHP_MD5\";s:0:\"\";s:11:\"PHP_INI_DIR\";s:18:\"/usr/local/etc/php\";s:8:\"GPG_KEYS\";s:81:\"42670A7FE4D0441C8E4632349E4FDC074A4EF02D 5A52880781F755608BF815FC910DEB46F53EA312\";s:11:\"PHP_LDFLAGS\";s:12:\"-Wl,-O1 -pie\";s:3:\"PWD\";s:13:\"/var/www/html\";s:20:\"APACHE_DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:14:\"APACHE_LOG_DIR\";s:16:\"/var/log/apache2\";s:4:\"LANG\";s:1:\"C\";s:10:\"PHP_SHA256\";s:64:\"5d31675a9b9c21b5bd03389418218c30b26558246870caba8eb54f5856e2d6ce\";s:15:\"APACHE_PID_FILE\";s:28:\"/var/run/apache2/apache2.pid\";s:11:\"PHPIZE_DEPS\";s:76:\"autoconf 		dpkg-dev 		file 		g++ 		gcc 		libc-dev 		make 		pkg-config 		re2c\";s:7:\"PHP_URL\";s:51:\"https://www.php.net/distributions/php-7.4.11.tar.xz\";s:16:\"APACHE_RUN_GROUP\";s:8:\"www-data\";s:15:\"APACHE_LOCK_DIR\";s:17:\"/var/lock/apache2\";s:24:\"PHP_EXTRA_CONFIGURE_ARGS\";s:26:\"--with-apxs2 --disable-cgi\";s:5:\"SHLVL\";s:1:\"0\";s:24:\"COMPOSER_ALLOW_SUPERUSER\";s:1:\"1\";s:10:\"PHP_CFLAGS\";s:83:\"-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64\";s:21:\"COMPOSER_MEMORY_LIMIT\";s:2:\"-1\";s:14:\"APACHE_RUN_DIR\";s:16:\"/var/run/apache2\";s:14:\"APACHE_ENVVARS\";s:20:\"/etc/apache2/envvars\";s:15:\"APACHE_RUN_USER\";s:8:\"www-data\";s:20:\"PHP_EXTRA_BUILD_DEPS\";s:11:\"apache2-dev\";s:11:\"PHP_ASC_URL\";s:55:\"https://www.php.net/distributions/php-7.4.11.tar.xz.asc\";s:12:\"PHP_CPPFLAGS\";s:83:\"-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64\";s:7:\"APP_ENV\";s:4:\"prod\";s:11:\"SYMFONY_ENV\";s:4:\"prod\";s:19:\"PIMCORE_ENVIRONMENT\";s:4:\"prod\";}',	1617782497,	3),
(3,	'http://localhost:8888/bundles/sintrainventory/img/classes/warehouse.svg',	404,	'a:0:{}',	'a:0:{}',	'a:5:{s:3:\"_ga\";s:26:\"GA1.1.960218608.1549525243\";s:5:\"hblid\";s:32:\"jMpCDLBMFlazGzIR3m39N0Na6oW3rIEb\";s:5:\"olfsk\";s:21:\"olfsk2437698274903195\";s:9:\"PHPSESSID\";s:32:\"6ab48f4c763ef3844269e3230c8686aa\";s:17:\"pimcore_admin_sid\";s:1:\"1\";}',	'a:71:{s:15:\"REDIRECT_STATUS\";s:3:\"200\";s:9:\"HTTP_HOST\";s:14:\"localhost:8888\";s:15:\"HTTP_CONNECTION\";s:10:\"keep-alive\";s:14:\"HTTP_SEC_CH_UA\";s:64:\"\"Google Chrome\";v=\"89\", \"Chromium\";v=\"89\", \";Not A Brand\";v=\"99\"\";s:21:\"HTTP_SEC_CH_UA_MOBILE\";s:2:\"?0\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36\";s:11:\"HTTP_ACCEPT\";s:64:\"image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8\";s:19:\"HTTP_SEC_FETCH_SITE\";s:11:\"same-origin\";s:19:\"HTTP_SEC_FETCH_MODE\";s:7:\"no-cors\";s:19:\"HTTP_SEC_FETCH_DEST\";s:5:\"image\";s:12:\"HTTP_REFERER\";s:56:\"http://localhost:8888/admin/?_dc=1618214928&perspective=\";s:20:\"HTTP_ACCEPT_ENCODING\";s:17:\"gzip, deflate, br\";s:20:\"HTTP_ACCEPT_LANGUAGE\";s:35:\"it-IT,it;q=0.9,en-US;q=0.8,en;q=0.7\";s:11:\"HTTP_COOKIE\";s:164:\"_ga=GA1.1.960218608.1549525243; hblid=jMpCDLBMFlazGzIR3m39N0Na6oW3rIEb; olfsk=olfsk2437698274903195; PHPSESSID=6ab48f4c763ef3844269e3230c8686aa; pimcore_admin_sid=1\";s:4:\"PATH\";s:60:\"/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin\";s:16:\"SERVER_SIGNATURE\";s:72:\"<address>Apache/2.4.38 (Debian) Server at localhost Port 8888</address>\n\";s:15:\"SERVER_SOFTWARE\";s:22:\"Apache/2.4.38 (Debian)\";s:11:\"SERVER_NAME\";s:9:\"localhost\";s:11:\"SERVER_ADDR\";s:10:\"172.23.0.6\";s:11:\"SERVER_PORT\";s:4:\"8888\";s:11:\"REMOTE_ADDR\";s:10:\"172.23.0.1\";s:13:\"DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:14:\"REQUEST_SCHEME\";s:4:\"http\";s:14:\"CONTEXT_PREFIX\";s:0:\"\";s:21:\"CONTEXT_DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:12:\"SERVER_ADMIN\";s:19:\"webmaster@localhost\";s:15:\"SCRIPT_FILENAME\";s:25:\"/var/www/html/web/app.php\";s:11:\"REMOTE_PORT\";s:5:\"52176\";s:12:\"REDIRECT_URL\";s:50:\"/bundles/sintrainventory/img/classes/warehouse.svg\";s:17:\"GATEWAY_INTERFACE\";s:7:\"CGI/1.1\";s:15:\"SERVER_PROTOCOL\";s:8:\"HTTP/1.1\";s:14:\"REQUEST_METHOD\";s:3:\"GET\";s:12:\"QUERY_STRING\";s:0:\"\";s:11:\"REQUEST_URI\";s:50:\"/bundles/sintrainventory/img/classes/warehouse.svg\";s:11:\"SCRIPT_NAME\";s:8:\"/app.php\";s:8:\"PHP_SELF\";s:8:\"/app.php\";s:18:\"REQUEST_TIME_FLOAT\";d:1618215163.530199;s:12:\"REQUEST_TIME\";i:1618215163;s:4:\"argv\";a:0:{}s:4:\"argc\";i:0;s:8:\"HOSTNAME\";s:12:\"ac3070cdc7e7\";s:11:\"PHP_VERSION\";s:6:\"7.4.11\";s:14:\"APACHE_CONFDIR\";s:12:\"/etc/apache2\";s:7:\"PHP_MD5\";s:0:\"\";s:11:\"PHP_INI_DIR\";s:18:\"/usr/local/etc/php\";s:8:\"GPG_KEYS\";s:81:\"42670A7FE4D0441C8E4632349E4FDC074A4EF02D 5A52880781F755608BF815FC910DEB46F53EA312\";s:11:\"PHP_LDFLAGS\";s:12:\"-Wl,-O1 -pie\";s:3:\"PWD\";s:13:\"/var/www/html\";s:20:\"APACHE_DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:14:\"APACHE_LOG_DIR\";s:16:\"/var/log/apache2\";s:4:\"LANG\";s:1:\"C\";s:10:\"PHP_SHA256\";s:64:\"5d31675a9b9c21b5bd03389418218c30b26558246870caba8eb54f5856e2d6ce\";s:15:\"APACHE_PID_FILE\";s:28:\"/var/run/apache2/apache2.pid\";s:11:\"PHPIZE_DEPS\";s:76:\"autoconf 		dpkg-dev 		file 		g++ 		gcc 		libc-dev 		make 		pkg-config 		re2c\";s:7:\"PHP_URL\";s:51:\"https://www.php.net/distributions/php-7.4.11.tar.xz\";s:16:\"APACHE_RUN_GROUP\";s:8:\"www-data\";s:15:\"APACHE_LOCK_DIR\";s:17:\"/var/lock/apache2\";s:24:\"PHP_EXTRA_CONFIGURE_ARGS\";s:26:\"--with-apxs2 --disable-cgi\";s:5:\"SHLVL\";s:1:\"0\";s:24:\"COMPOSER_ALLOW_SUPERUSER\";s:1:\"1\";s:10:\"PHP_CFLAGS\";s:83:\"-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64\";s:21:\"COMPOSER_MEMORY_LIMIT\";s:2:\"-1\";s:14:\"APACHE_RUN_DIR\";s:16:\"/var/run/apache2\";s:14:\"APACHE_ENVVARS\";s:20:\"/etc/apache2/envvars\";s:15:\"APACHE_RUN_USER\";s:8:\"www-data\";s:20:\"PHP_EXTRA_BUILD_DEPS\";s:11:\"apache2-dev\";s:11:\"PHP_ASC_URL\";s:55:\"https://www.php.net/distributions/php-7.4.11.tar.xz.asc\";s:12:\"PHP_CPPFLAGS\";s:83:\"-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64\";s:7:\"APP_ENV\";s:4:\"prod\";s:11:\"SYMFONY_ENV\";s:4:\"prod\";s:19:\"PIMCORE_ENVIRONMENT\";s:4:\"prod\";}',	1618215469,	5),
(4,	'http://localhost:8888/bundles/app/js/pimcore/startup.js?_dc=1618329455',	404,	'a:1:{s:3:\"_dc\";s:10:\"1618329455\";}',	'a:0:{}',	'a:5:{s:3:\"_ga\";s:26:\"GA1.1.960218608.1549525243\";s:5:\"hblid\";s:32:\"jMpCDLBMFlazGzIR3m39N0Na6oW3rIEb\";s:5:\"olfsk\";s:21:\"olfsk2437698274903195\";s:9:\"PHPSESSID\";s:32:\"9d642d91932d63e9b775aa94b5ed89fe\";s:17:\"pimcore_admin_sid\";s:1:\"1\";}',	'a:72:{s:15:\"REDIRECT_STATUS\";s:3:\"200\";s:9:\"HTTP_HOST\";s:14:\"localhost:8888\";s:15:\"HTTP_CONNECTION\";s:10:\"keep-alive\";s:14:\"HTTP_SEC_CH_UA\";s:64:\"\"Google Chrome\";v=\"89\", \"Chromium\";v=\"89\", \";Not A Brand\";v=\"99\"\";s:21:\"HTTP_SEC_CH_UA_MOBILE\";s:2:\"?0\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36\";s:11:\"HTTP_ACCEPT\";s:3:\"*/*\";s:19:\"HTTP_SEC_FETCH_SITE\";s:11:\"same-origin\";s:19:\"HTTP_SEC_FETCH_MODE\";s:7:\"no-cors\";s:19:\"HTTP_SEC_FETCH_DEST\";s:6:\"script\";s:12:\"HTTP_REFERER\";s:28:\"http://localhost:8888/admin/\";s:20:\"HTTP_ACCEPT_ENCODING\";s:17:\"gzip, deflate, br\";s:20:\"HTTP_ACCEPT_LANGUAGE\";s:35:\"it-IT,it;q=0.9,en-US;q=0.8,en;q=0.7\";s:11:\"HTTP_COOKIE\";s:164:\"_ga=GA1.1.960218608.1549525243; hblid=jMpCDLBMFlazGzIR3m39N0Na6oW3rIEb; olfsk=olfsk2437698274903195; PHPSESSID=9d642d91932d63e9b775aa94b5ed89fe; pimcore_admin_sid=1\";s:4:\"PATH\";s:60:\"/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin\";s:16:\"SERVER_SIGNATURE\";s:72:\"<address>Apache/2.4.38 (Debian) Server at localhost Port 8888</address>\n\";s:15:\"SERVER_SOFTWARE\";s:22:\"Apache/2.4.38 (Debian)\";s:11:\"SERVER_NAME\";s:9:\"localhost\";s:11:\"SERVER_ADDR\";s:10:\"172.20.0.6\";s:11:\"SERVER_PORT\";s:4:\"8888\";s:11:\"REMOTE_ADDR\";s:10:\"172.20.0.1\";s:13:\"DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:14:\"REQUEST_SCHEME\";s:4:\"http\";s:14:\"CONTEXT_PREFIX\";s:0:\"\";s:21:\"CONTEXT_DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:12:\"SERVER_ADMIN\";s:19:\"webmaster@localhost\";s:15:\"SCRIPT_FILENAME\";s:25:\"/var/www/html/web/app.php\";s:11:\"REMOTE_PORT\";s:5:\"39322\";s:12:\"REDIRECT_URL\";s:34:\"/bundles/app/js/pimcore/startup.js\";s:21:\"REDIRECT_QUERY_STRING\";s:14:\"_dc=1618329455\";s:17:\"GATEWAY_INTERFACE\";s:7:\"CGI/1.1\";s:15:\"SERVER_PROTOCOL\";s:8:\"HTTP/1.1\";s:14:\"REQUEST_METHOD\";s:3:\"GET\";s:12:\"QUERY_STRING\";s:14:\"_dc=1618329455\";s:11:\"REQUEST_URI\";s:49:\"/bundles/app/js/pimcore/startup.js?_dc=1618329455\";s:11:\"SCRIPT_NAME\";s:8:\"/app.php\";s:8:\"PHP_SELF\";s:8:\"/app.php\";s:18:\"REQUEST_TIME_FLOAT\";d:1618329457.574372;s:12:\"REQUEST_TIME\";i:1618329457;s:4:\"argv\";a:1:{i:0;s:14:\"_dc=1618329455\";}s:4:\"argc\";i:1;s:8:\"HOSTNAME\";s:12:\"f7eb688004f5\";s:11:\"PHP_VERSION\";s:6:\"7.4.11\";s:14:\"APACHE_CONFDIR\";s:12:\"/etc/apache2\";s:7:\"PHP_MD5\";s:0:\"\";s:11:\"PHP_INI_DIR\";s:18:\"/usr/local/etc/php\";s:8:\"GPG_KEYS\";s:81:\"42670A7FE4D0441C8E4632349E4FDC074A4EF02D 5A52880781F755608BF815FC910DEB46F53EA312\";s:11:\"PHP_LDFLAGS\";s:12:\"-Wl,-O1 -pie\";s:3:\"PWD\";s:13:\"/var/www/html\";s:20:\"APACHE_DOCUMENT_ROOT\";s:17:\"/var/www/html/web\";s:14:\"APACHE_LOG_DIR\";s:16:\"/var/log/apache2\";s:4:\"LANG\";s:1:\"C\";s:10:\"PHP_SHA256\";s:64:\"5d31675a9b9c21b5bd03389418218c30b26558246870caba8eb54f5856e2d6ce\";s:15:\"APACHE_PID_FILE\";s:28:\"/var/run/apache2/apache2.pid\";s:11:\"PHPIZE_DEPS\";s:76:\"autoconf 		dpkg-dev 		file 		g++ 		gcc 		libc-dev 		make 		pkg-config 		re2c\";s:7:\"PHP_URL\";s:51:\"https://www.php.net/distributions/php-7.4.11.tar.xz\";s:16:\"APACHE_RUN_GROUP\";s:8:\"www-data\";s:15:\"APACHE_LOCK_DIR\";s:17:\"/var/lock/apache2\";s:24:\"PHP_EXTRA_CONFIGURE_ARGS\";s:26:\"--with-apxs2 --disable-cgi\";s:5:\"SHLVL\";s:1:\"0\";s:24:\"COMPOSER_ALLOW_SUPERUSER\";s:1:\"1\";s:10:\"PHP_CFLAGS\";s:83:\"-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64\";s:21:\"COMPOSER_MEMORY_LIMIT\";s:2:\"-1\";s:14:\"APACHE_RUN_DIR\";s:16:\"/var/run/apache2\";s:14:\"APACHE_ENVVARS\";s:20:\"/etc/apache2/envvars\";s:15:\"APACHE_RUN_USER\";s:8:\"www-data\";s:20:\"PHP_EXTRA_BUILD_DEPS\";s:11:\"apache2-dev\";s:11:\"PHP_ASC_URL\";s:55:\"https://www.php.net/distributions/php-7.4.11.tar.xz.asc\";s:12:\"PHP_CPPFLAGS\";s:83:\"-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64\";s:7:\"APP_ENV\";s:4:\"prod\";s:11:\"SYMFONY_ENV\";s:4:\"prod\";s:19:\"PIMCORE_ENVIRONMENT\";s:4:\"prod\";}',	1618329458,	1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `importconfigs` (`id`, `ownerId`, `classId`, `name`, `config`, `description`, `creationDate`, `modificationDate`, `shareGlobally`) VALUES
(1,	2,	'PRD',	'Import Products',	'{\"dataFields\":[\"field_0\",\"field_1\",\"field_2\",\"field_3\",\"field_4\",\"field_5\",\"rowId\"],\"targetFields\":[[\"sku\",\"SKU(input)\"],[\"bundlePrice\",\"Bundle Price(numeric)\"],[\"brand\",\"Brand(select)\"],[\"made_in\",\"Made In(country)\"]],\"selectedGridColumns\":[{\"isValue\":true,\"attributes\":{\"label\":\"Full Path (fullpath)\",\"type\":\"value\",\"class\":\"DefaultValue\",\"attribute\":\"fullpath\",\"dataType\":\"system\",\"childs\":[]}},{\"isValue\":true,\"attributes\":{\"label\":\"SKU (sku)\",\"type\":\"value\",\"class\":\"DefaultValue\",\"attribute\":\"sku\",\"dataType\":\"input\",\"childs\":[]}},{\"isValue\":true,\"attributes\":{\"label\":\"Price (price)\",\"type\":\"value\",\"class\":\"DefaultValue\",\"attribute\":\"price\",\"dataType\":\"quantityValue\",\"childs\":[]}},{\"isValue\":true,\"attributes\":{\"label\":\"Product Name (name)\",\"type\":\"value\",\"class\":\"DefaultValue\",\"attribute\":\"name\",\"dataType\":\"input\",\"childs\":[]}},{\"isOperator\":true,\"attributes\":{\"type\":\"operator\",\"class\":\"PHPCode\",\"label\":\"Brand (brand)\",\"phpClass\":\"AppBundle\\\\Import\\\\Operators\\\\SelectOperator\",\"additionalData\":\"{\\\"field\\\":\\\"brand\\\"}\",\"childs\":[]}},{\"isValue\":true,\"attributes\":{\"label\":\"Category (category)\",\"type\":\"value\",\"class\":\"DefaultValue\",\"attribute\":\"category\",\"dataType\":\"manyToOneRelation\",\"childs\":[]}}],\"resolverSettings\":{\"skipHeadRow\":true,\"language\":\"en\",\"strategy\":\"fullpath\",\"column\":0,\"objectType\":\"keep\",\"createOnDemand\":true,\"createParents\":true,\"phpClassOrService\":\"\"},\"shareSettings\":{\"configName\":\"Import Products\",\"configDescription\":\"\",\"shareGlobally\":false,\"sharedUserIds\":\"\",\"sharedRoleIds\":\"\"},\"csvSettings\":{\"delimiter\":\";\",\"escapechar\":\"\\\\\",\"lineterminator\":\"0d0a\",\"quotechar\":\"\\\"\"},\"rows\":3,\"cols\":6,\"classId\":\"PRD\",\"isShared\":false,\"pimcore_version\":\"v6.8.4\",\"pimcore_revision\":\"e2d8837a46ce0a99711be8cc5927418bb221286b\"}',	'',	1618232822,	1618327654,	0);

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
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201008082752',	'2021-04-27 18:42:17',	457),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201008091131',	'2021-04-27 18:42:17',	2),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201008101817',	'2021-04-27 18:42:17',	376),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201008132324',	'2021-04-27 18:42:18',	381),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201009095924',	'2021-04-27 18:42:18',	390),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201012154224',	'2021-04-27 18:42:18',	368),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201014101437',	'2021-04-27 18:42:19',	1),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201113143914',	'2021-04-27 18:42:19',	443),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20201201084201',	'2021-04-27 18:42:19',	375),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210107103923',	'2021-04-27 18:42:20',	244),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210218142556',	'2021-04-27 18:42:20',	5),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210323082921',	'2021-04-27 18:42:20',	12),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210323110055',	'2021-04-27 18:42:20',	0),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210324152822',	'2021-04-27 18:42:20',	499),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210330132354',	'2021-04-27 18:42:20',	30),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210408153226',	'2021-05-12 17:17:21',	1387),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210412112812',	'2021-04-27 18:42:20',	29),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210428145320',	'2021-05-12 17:17:22',	6),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210430124911',	'2021-05-12 17:17:22',	1281),
('Pimcore\\Bundle\\CoreBundle\\Migrations\\Version20210505093841',	'2021-05-12 17:17:23',	27);

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
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

INSERT INTO `objects` (`o_id`, `o_parentId`, `o_type`, `o_key`, `o_path`, `o_index`, `o_published`, `o_creationDate`, `o_modificationDate`, `o_userOwner`, `o_userModification`, `o_classId`, `o_className`, `o_childrenSortBy`, `o_childrenSortOrder`, `o_versionCount`) VALUES
(1,	0,	'folder',	'',	'/',	999999,	1,	1613764830,	1613764830,	1,	1,	NULL,	NULL,	NULL,	NULL,	0),
(2,	1,	'folder',	'Categories',	'/',	NULL,	1,	1614196736,	1614196736,	2,	2,	NULL,	NULL,	NULL,	NULL,	2),
(3,	2,	'folder',	'Jerseys and Shirts',	'/Categories/',	NULL,	1,	1614196847,	1614196847,	2,	2,	NULL,	NULL,	NULL,	NULL,	2),
(5,	3,	'object',	'T-Shirt',	'/Categories/Jerseys and Shirts/',	0,	1,	1614196985,	1614197130,	2,	2,	'CAT',	'Category',	NULL,	NULL,	2),
(6,	2,	'folder',	'Trousers',	'/Categories/',	NULL,	1,	1614197188,	1614197188,	2,	2,	NULL,	NULL,	NULL,	NULL,	2),
(7,	6,	'object',	'Shorts',	'/Categories/Trousers/',	0,	1,	1614197218,	1614197285,	2,	2,	'CAT',	'Category',	NULL,	NULL,	3),
(9,	1,	'folder',	'Colors',	'/',	NULL,	1,	1614197335,	1614197335,	2,	2,	NULL,	NULL,	NULL,	NULL,	2),
(10,	9,	'object',	'Aliceblue',	'/Colors/',	NULL,	1,	1614197403,	1614197403,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(11,	9,	'object',	'Antiquewhite',	'/Colors/',	NULL,	1,	1614197405,	1614197405,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(12,	9,	'object',	'Aqua',	'/Colors/',	NULL,	1,	1614197407,	1614197407,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(13,	9,	'object',	'Aquamarine',	'/Colors/',	NULL,	1,	1614197409,	1614197409,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(14,	9,	'object',	'Azure',	'/Colors/',	NULL,	1,	1614197411,	1614197411,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(15,	9,	'object',	'Beige',	'/Colors/',	NULL,	1,	1614197413,	1614197413,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(16,	9,	'object',	'Bisque',	'/Colors/',	NULL,	1,	1614197414,	1614197414,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(17,	9,	'object',	'Black',	'/Colors/',	NULL,	1,	1614197416,	1614197416,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(18,	9,	'object',	'Blanchedalmond',	'/Colors/',	NULL,	1,	1614197418,	1614197418,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(19,	9,	'object',	'Blue',	'/Colors/',	NULL,	1,	1614197420,	1614197420,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(20,	9,	'object',	'Blueviolet',	'/Colors/',	NULL,	1,	1614197421,	1614197421,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(21,	9,	'object',	'Brown',	'/Colors/',	NULL,	1,	1614197423,	1614197423,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(22,	9,	'object',	'Burlywood',	'/Colors/',	NULL,	1,	1614197425,	1614197425,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(23,	9,	'object',	'Cadetblue',	'/Colors/',	NULL,	1,	1614197427,	1614197427,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(24,	9,	'object',	'Chartreuse',	'/Colors/',	NULL,	1,	1614197429,	1614197429,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(25,	9,	'object',	'Chocolate',	'/Colors/',	NULL,	1,	1614197431,	1614197431,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(26,	9,	'object',	'Coral',	'/Colors/',	NULL,	1,	1614197433,	1614197433,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(27,	9,	'object',	'Cornflowerblue',	'/Colors/',	NULL,	1,	1614197435,	1614197435,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(28,	9,	'object',	'Cornsilk',	'/Colors/',	NULL,	1,	1614197436,	1614197436,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(29,	9,	'object',	'Crimson',	'/Colors/',	NULL,	1,	1614197438,	1614197438,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(30,	9,	'object',	'Cyan',	'/Colors/',	NULL,	1,	1614197440,	1614197440,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(31,	9,	'object',	'Darkblue',	'/Colors/',	NULL,	1,	1614197442,	1614197442,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(32,	9,	'object',	'Darkcyan',	'/Colors/',	NULL,	1,	1614197444,	1614197444,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(33,	9,	'object',	'Darkgoldenrod',	'/Colors/',	NULL,	1,	1614197445,	1614197445,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(34,	9,	'object',	'Darkgray',	'/Colors/',	NULL,	1,	1614197447,	1614197447,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(35,	9,	'object',	'Darkgreen',	'/Colors/',	NULL,	1,	1614197449,	1614197449,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(36,	9,	'object',	'Darkgrey',	'/Colors/',	NULL,	1,	1614197451,	1614197451,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(37,	9,	'object',	'Darkkhaki',	'/Colors/',	NULL,	1,	1614197453,	1614197453,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(38,	9,	'object',	'Darkmagenta',	'/Colors/',	NULL,	1,	1614197455,	1614197455,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(39,	9,	'object',	'Darkolivegreen',	'/Colors/',	NULL,	1,	1614197457,	1614197457,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(40,	9,	'object',	'Darkorange',	'/Colors/',	NULL,	1,	1614197459,	1614197459,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(41,	9,	'object',	'Darkorchid',	'/Colors/',	NULL,	1,	1614197460,	1614197460,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(42,	9,	'object',	'Darkred',	'/Colors/',	NULL,	1,	1614197462,	1614197462,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(43,	9,	'object',	'Darksalmon',	'/Colors/',	NULL,	1,	1614197464,	1614197464,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(44,	9,	'object',	'Darkseagreen',	'/Colors/',	NULL,	1,	1614197466,	1614197466,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(45,	9,	'object',	'Darkslateblue',	'/Colors/',	NULL,	1,	1614197467,	1614197467,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(46,	9,	'object',	'Darkslategray',	'/Colors/',	NULL,	1,	1614197469,	1614197469,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(47,	9,	'object',	'Darkslategrey',	'/Colors/',	NULL,	1,	1614197471,	1614197471,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(48,	9,	'object',	'Darkturquoise',	'/Colors/',	NULL,	1,	1614197473,	1614197473,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(49,	9,	'object',	'Darkviolet',	'/Colors/',	NULL,	1,	1614197475,	1614197475,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(50,	9,	'object',	'Deeppink',	'/Colors/',	NULL,	1,	1614197477,	1614197477,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(51,	9,	'object',	'Deepskyblue',	'/Colors/',	NULL,	1,	1614197479,	1614197479,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(52,	9,	'object',	'Dimgray',	'/Colors/',	NULL,	1,	1614197481,	1614197481,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(53,	9,	'object',	'Dimgrey',	'/Colors/',	NULL,	1,	1614197483,	1614197483,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(54,	9,	'object',	'Dodgerblue',	'/Colors/',	NULL,	1,	1614197485,	1614197485,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(55,	9,	'object',	'Firebrick',	'/Colors/',	NULL,	1,	1614197487,	1614197487,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(56,	9,	'object',	'Floralwhite',	'/Colors/',	NULL,	1,	1614197489,	1614197489,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(57,	9,	'object',	'Forestgreen',	'/Colors/',	NULL,	1,	1614197492,	1614197492,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(58,	9,	'object',	'Fuchsia',	'/Colors/',	NULL,	1,	1614197494,	1614197494,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(59,	9,	'object',	'Gainsboro',	'/Colors/',	NULL,	1,	1614197496,	1614197496,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(60,	9,	'object',	'Ghostwhite',	'/Colors/',	NULL,	1,	1614197498,	1614197498,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(61,	9,	'object',	'Gold',	'/Colors/',	NULL,	1,	1614197500,	1614197500,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(62,	9,	'object',	'Goldenrod',	'/Colors/',	NULL,	1,	1614197501,	1614197501,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(63,	9,	'object',	'Gray',	'/Colors/',	NULL,	1,	1614197504,	1614197504,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(64,	9,	'object',	'Green',	'/Colors/',	NULL,	1,	1614197506,	1614197506,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(65,	9,	'object',	'Greenyellow',	'/Colors/',	NULL,	1,	1614197508,	1614197508,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(66,	9,	'object',	'Grey',	'/Colors/',	NULL,	1,	1614197510,	1614197510,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(67,	9,	'object',	'Honeydew',	'/Colors/',	NULL,	1,	1614197512,	1614197512,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(68,	9,	'object',	'Hotpink',	'/Colors/',	NULL,	1,	1614197513,	1614197513,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(69,	9,	'object',	'Indianred',	'/Colors/',	NULL,	1,	1614197515,	1614197515,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(70,	9,	'object',	'Indigo',	'/Colors/',	NULL,	1,	1614197518,	1614197518,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(71,	9,	'object',	'Ivory',	'/Colors/',	NULL,	1,	1614197520,	1614197520,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(72,	9,	'object',	'Khaki',	'/Colors/',	NULL,	1,	1614197523,	1614197523,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(73,	9,	'object',	'Lavender',	'/Colors/',	NULL,	1,	1614197525,	1614197525,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(74,	9,	'object',	'Lavenderblush',	'/Colors/',	NULL,	1,	1614197527,	1614197527,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(75,	9,	'object',	'Lawngreen',	'/Colors/',	NULL,	1,	1614197529,	1614197529,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(76,	9,	'object',	'Lemonchiffon',	'/Colors/',	NULL,	1,	1614197531,	1614197531,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(77,	9,	'object',	'Lightblue',	'/Colors/',	NULL,	1,	1614197533,	1614197533,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(78,	9,	'object',	'Lightcoral',	'/Colors/',	NULL,	1,	1614197535,	1614197535,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(79,	9,	'object',	'Lightcyan',	'/Colors/',	NULL,	1,	1614197537,	1614197537,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(80,	9,	'object',	'Lightgoldenrodyellow',	'/Colors/',	NULL,	1,	1614197540,	1614197540,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(81,	9,	'object',	'Lightgray',	'/Colors/',	NULL,	1,	1614197542,	1614197542,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(82,	9,	'object',	'Lightgreen',	'/Colors/',	NULL,	1,	1614197544,	1614197544,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(83,	9,	'object',	'Lightgrey',	'/Colors/',	NULL,	1,	1614197546,	1614197546,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(84,	9,	'object',	'Lightpink',	'/Colors/',	NULL,	1,	1614197547,	1614197547,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(85,	9,	'object',	'Lightsalmon',	'/Colors/',	NULL,	1,	1614197550,	1614197550,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(86,	9,	'object',	'Lightseagreen',	'/Colors/',	NULL,	1,	1614197552,	1614197552,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(87,	9,	'object',	'Lightskyblue',	'/Colors/',	NULL,	1,	1614197554,	1614197554,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(88,	9,	'object',	'Lightslategray',	'/Colors/',	NULL,	1,	1614197555,	1614197555,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(89,	9,	'object',	'Lightslategrey',	'/Colors/',	NULL,	1,	1614197557,	1614197557,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(90,	9,	'object',	'Lightsteelblue',	'/Colors/',	NULL,	1,	1614197559,	1614197559,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(91,	9,	'object',	'Lightyellow',	'/Colors/',	NULL,	1,	1614197561,	1614197561,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(92,	9,	'object',	'Lime',	'/Colors/',	NULL,	1,	1614197563,	1614197563,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(93,	9,	'object',	'Limegreen',	'/Colors/',	NULL,	1,	1614197565,	1614197565,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(94,	9,	'object',	'Linen',	'/Colors/',	NULL,	1,	1614197567,	1614197567,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(95,	9,	'object',	'Magenta',	'/Colors/',	NULL,	1,	1614197570,	1614197570,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(96,	9,	'object',	'Maroon',	'/Colors/',	NULL,	1,	1614197572,	1614197572,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(97,	9,	'object',	'Mediumaquamarine',	'/Colors/',	NULL,	1,	1614197575,	1614197575,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(98,	9,	'object',	'Mediumblue',	'/Colors/',	NULL,	1,	1614197578,	1614197578,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(99,	9,	'object',	'Mediumorchid',	'/Colors/',	NULL,	1,	1614197580,	1614197580,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(100,	9,	'object',	'Mediumpurple',	'/Colors/',	NULL,	1,	1614197582,	1614197582,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(101,	9,	'object',	'Mediumseagreen',	'/Colors/',	NULL,	1,	1614197584,	1614197584,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(102,	9,	'object',	'Mediumslateblue',	'/Colors/',	NULL,	1,	1614197585,	1614197585,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(103,	9,	'object',	'Mediumspringgreen',	'/Colors/',	NULL,	1,	1614197587,	1614197587,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(104,	9,	'object',	'Mediumturquoise',	'/Colors/',	NULL,	1,	1614197589,	1614197589,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(105,	9,	'object',	'Mediumvioletred',	'/Colors/',	NULL,	1,	1614197591,	1614197591,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(106,	9,	'object',	'Midnightblue',	'/Colors/',	NULL,	1,	1614197594,	1614197594,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(107,	9,	'object',	'Mintcream',	'/Colors/',	NULL,	1,	1614197596,	1614197596,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(108,	9,	'object',	'Mistyrose',	'/Colors/',	NULL,	1,	1614197598,	1614197598,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(109,	9,	'object',	'Moccasin',	'/Colors/',	NULL,	1,	1614197600,	1614197600,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(110,	9,	'object',	'Navajowhite',	'/Colors/',	NULL,	1,	1614197602,	1614197602,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(111,	9,	'object',	'Navy',	'/Colors/',	NULL,	1,	1614197604,	1614197604,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(112,	9,	'object',	'Oldlace',	'/Colors/',	NULL,	1,	1614197606,	1614197606,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(113,	9,	'object',	'Olive',	'/Colors/',	NULL,	1,	1614197607,	1614197607,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(114,	9,	'object',	'Olivedrab',	'/Colors/',	NULL,	1,	1614197609,	1614197609,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(115,	9,	'object',	'Orange',	'/Colors/',	NULL,	1,	1614197611,	1614197611,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(116,	9,	'object',	'Orangered',	'/Colors/',	NULL,	1,	1614197613,	1614197613,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(117,	9,	'object',	'Orchid',	'/Colors/',	NULL,	1,	1614197616,	1614197616,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(118,	9,	'object',	'Palegoldenrod',	'/Colors/',	NULL,	1,	1614197617,	1614197617,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(119,	9,	'object',	'Palegreen',	'/Colors/',	NULL,	1,	1614197619,	1614197619,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(120,	9,	'object',	'Paleturquoise',	'/Colors/',	NULL,	1,	1614197621,	1614197621,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(121,	9,	'object',	'Palevioletred',	'/Colors/',	NULL,	1,	1614197623,	1614197623,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(122,	9,	'object',	'Papayawhip',	'/Colors/',	NULL,	1,	1614197625,	1614197625,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(123,	9,	'object',	'Peachpuff',	'/Colors/',	NULL,	1,	1614197627,	1614197627,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(124,	9,	'object',	'Peru',	'/Colors/',	NULL,	1,	1614197629,	1614197629,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(125,	9,	'object',	'Pink',	'/Colors/',	NULL,	1,	1614197631,	1614197631,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(126,	9,	'object',	'Plum',	'/Colors/',	NULL,	1,	1614197633,	1614197633,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(127,	9,	'object',	'Powderblue',	'/Colors/',	NULL,	1,	1614197635,	1614197635,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(128,	9,	'object',	'Purple',	'/Colors/',	NULL,	1,	1614197636,	1614197636,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(129,	9,	'object',	'Red',	'/Colors/',	NULL,	1,	1614197638,	1614197638,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(130,	9,	'object',	'Rosybrown',	'/Colors/',	NULL,	1,	1614197640,	1614197640,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(131,	9,	'object',	'Royalblue',	'/Colors/',	NULL,	1,	1614197642,	1614197642,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(132,	9,	'object',	'Saddlebrown',	'/Colors/',	NULL,	1,	1614197644,	1614197644,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(133,	9,	'object',	'Salmon',	'/Colors/',	NULL,	1,	1614197646,	1614197646,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(134,	9,	'object',	'Sandybrown',	'/Colors/',	NULL,	1,	1614197647,	1614197647,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(135,	9,	'object',	'Seagreen',	'/Colors/',	NULL,	1,	1614197649,	1614197649,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(136,	9,	'object',	'Seashell',	'/Colors/',	NULL,	1,	1614197651,	1614197651,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(137,	9,	'object',	'Sienna',	'/Colors/',	NULL,	1,	1614197653,	1614197653,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(138,	9,	'object',	'Silver',	'/Colors/',	NULL,	1,	1614197655,	1614197655,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(139,	9,	'object',	'Skyblue',	'/Colors/',	NULL,	1,	1614197657,	1614197657,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(140,	9,	'object',	'Slateblue',	'/Colors/',	NULL,	1,	1614197659,	1614197659,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(141,	9,	'object',	'Slategray',	'/Colors/',	NULL,	1,	1614197661,	1614197661,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(142,	9,	'object',	'Slategrey',	'/Colors/',	NULL,	1,	1614197663,	1614197663,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(143,	9,	'object',	'Snow',	'/Colors/',	NULL,	1,	1614197665,	1614197665,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(144,	9,	'object',	'Springgreen',	'/Colors/',	NULL,	1,	1614197666,	1614197666,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(145,	9,	'object',	'Steelblue',	'/Colors/',	NULL,	1,	1614197668,	1614197668,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(146,	9,	'object',	'Tan',	'/Colors/',	NULL,	1,	1614197670,	1614197670,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(147,	9,	'object',	'Teal',	'/Colors/',	NULL,	1,	1614197672,	1614197672,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(148,	9,	'object',	'Thistle',	'/Colors/',	NULL,	1,	1614197674,	1614197674,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(149,	9,	'object',	'Tomato',	'/Colors/',	NULL,	1,	1614197676,	1614197676,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(150,	9,	'object',	'Turquoise',	'/Colors/',	NULL,	1,	1614197678,	1614197678,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(151,	9,	'object',	'Violet',	'/Colors/',	NULL,	1,	1614197680,	1614197680,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(152,	9,	'object',	'Wheat',	'/Colors/',	NULL,	1,	1614197682,	1614197682,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(153,	9,	'object',	'White',	'/Colors/',	NULL,	1,	1614197684,	1614197684,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(154,	9,	'object',	'Whitesmoke',	'/Colors/',	NULL,	1,	1614197686,	1614197686,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(155,	9,	'object',	'Yellow',	'/Colors/',	NULL,	1,	1614197687,	1614197687,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(156,	9,	'object',	'Yellowgreen',	'/Colors/',	NULL,	1,	1614197689,	1614197689,	2,	2,	'COL',	'Color',	NULL,	NULL,	1),
(157,	1,	'folder',	'Materials',	'/',	NULL,	1,	1614197775,	1614197775,	2,	2,	NULL,	NULL,	NULL,	NULL,	2),
(158,	157,	'object',	'Cotton',	'/Materials/',	0,	1,	1614197787,	1614197938,	2,	2,	'MAT',	'Material',	NULL,	NULL,	2),
(159,	157,	'object',	'Silk',	'/Materials/',	0,	1,	1614198099,	1614198138,	2,	2,	'MAT',	'Material',	NULL,	NULL,	2),
(160,	157,	'object',	'Viscose',	'/Materials/',	0,	1,	1614198174,	1614198245,	2,	2,	'MAT',	'Material',	NULL,	NULL,	2),
(161,	1,	'folder',	'Products',	'/',	NULL,	1,	1614198258,	1614198257,	2,	2,	NULL,	NULL,	NULL,	NULL,	2),
(162,	161,	'object',	'Classic T-Shirt',	'/Products/',	0,	1,	1614198299,	1620840309,	2,	2,	'PRD',	'Product',	NULL,	NULL,	17),
(163,	162,	'variant',	'Azureblue',	'/Products/Classic T-Shirt/',	0,	1,	1614199202,	1614200978,	2,	2,	'PRD',	'Product',	NULL,	NULL,	3),
(164,	162,	'variant',	'Black',	'/Products/Classic T-Shirt/',	0,	1,	1614199345,	1614200989,	2,	2,	'PRD',	'Product',	NULL,	NULL,	3),
(165,	162,	'variant',	'Green',	'/Products/Classic T-Shirt/',	0,	1,	1614199391,	1614200969,	2,	2,	'PRD',	'Product',	NULL,	NULL,	4),
(166,	162,	'variant',	'Grey',	'/Products/Classic T-Shirt/',	0,	1,	1614199451,	1614200960,	2,	2,	'PRD',	'Product',	NULL,	NULL,	4),
(167,	162,	'variant',	'Pink',	'/Products/Classic T-Shirt/',	0,	1,	1614199502,	1614200940,	2,	2,	'PRD',	'Product',	NULL,	NULL,	3),
(168,	162,	'variant',	'Red',	'/Products/Classic T-Shirt/',	0,	1,	1614199542,	1614200949,	2,	2,	'PRD',	'Product',	NULL,	NULL,	3),
(169,	162,	'variant',	'White',	'/Products/Classic T-Shirt/',	0,	1,	1614199579,	1614200927,	2,	2,	'PRD',	'Product',	NULL,	NULL,	3),
(170,	162,	'variant',	'Yellow',	'/Products/Classic T-Shirt/',	0,	1,	1614199619,	1614200918,	2,	2,	'PRD',	'Product',	NULL,	NULL,	3),
(171,	161,	'object',	'Jeans Shorts',	'/Products/',	0,	1,	1614199957,	1620840365,	2,	2,	'PRD',	'Product',	NULL,	NULL,	11),
(172,	171,	'variant',	'Blue',	'/Products/Jeans Shorts/',	0,	1,	1614200657,	1614200848,	2,	2,	'PRD',	'Product',	NULL,	NULL,	4),
(173,	171,	'variant',	'Lightblue',	'/Products/Jeans Shorts/',	0,	1,	1614200666,	1614200866,	2,	2,	'PRD',	'Product',	NULL,	NULL,	3),
(174,	171,	'variant',	'Grey',	'/Products/Jeans Shorts/',	0,	1,	1614200672,	1614200856,	2,	2,	'PRD',	'Product',	NULL,	NULL,	4),
(175,	161,	'object',	'T-Shirt & Jeans',	'/Products/',	0,	1,	1615225671,	1621009518,	2,	2,	'PRD',	'Product',	NULL,	NULL,	20),
(176,	2,	'folder',	'Shoes',	'/Categories/',	NULL,	1,	1617802511,	1617802511,	2,	2,	NULL,	NULL,	NULL,	NULL,	2),
(177,	176,	'object',	'Running',	'/Categories/Shoes/',	0,	1,	1617802524,	1617802650,	2,	2,	'CAT',	'Category',	NULL,	NULL,	2),
(179,	1,	'folder',	'Shops',	'/',	NULL,	1,	1618215392,	1618215391,	2,	2,	NULL,	NULL,	NULL,	NULL,	2),
(180,	179,	'object',	'Rome',	'/Shops/',	0,	1,	1618215419,	1618216026,	2,	2,	'SHO',	'Shop',	NULL,	NULL,	7),
(181,	179,	'object',	'Paris',	'/Shops/',	0,	1,	1618215767,	1618216176,	2,	2,	'SHO',	'Shop',	NULL,	NULL,	3),
(182,	179,	'object',	'London',	'/Shops/',	0,	1,	1618216416,	1618216564,	2,	2,	'SHO',	'Shop',	NULL,	NULL,	5);

DROP TABLE IF EXISTS `object_brick_query_ShirtsAttributes_PRD`;
CREATE TABLE `object_brick_query_ShirtsAttributes_PRD` (
  `o_id` int(11) NOT NULL DEFAULT 0,
  `fieldname` varchar(190) NOT NULL DEFAULT '',
  `sleeve_lenght` varchar(190) DEFAULT NULL,
  `size` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`o_id`,`fieldname`),
  KEY `o_id` (`o_id`),
  KEY `fieldname` (`fieldname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_brick_query_ShirtsAttributes_PRD` (`o_id`, `fieldname`, `sleeve_lenght`, `size`) VALUES
(162,	'attributes',	'1',	'M'),
(163,	'attributes',	'1',	'M'),
(164,	'attributes',	'1',	'M'),
(165,	'attributes',	'1',	'M'),
(166,	'attributes',	'1',	'M'),
(167,	'attributes',	'1',	'M'),
(168,	'attributes',	'1',	'M'),
(169,	'attributes',	'1',	'M'),
(170,	'attributes',	'1',	'M');

DROP TABLE IF EXISTS `object_brick_query_ShoesAttributes_PRD`;
CREATE TABLE `object_brick_query_ShoesAttributes_PRD` (
  `o_id` int(11) NOT NULL DEFAULT 0,
  `fieldname` varchar(190) NOT NULL DEFAULT '',
  `size` varchar(190) DEFAULT NULL,
  `has_heel` tinyint(1) DEFAULT NULL,
  `heel_height__value` double DEFAULT NULL,
  `heel_height__unit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`o_id`,`fieldname`),
  KEY `o_id` (`o_id`),
  KEY `fieldname` (`fieldname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `object_brick_store_ShirtsAttributes_PRD`;
CREATE TABLE `object_brick_store_ShirtsAttributes_PRD` (
  `o_id` int(11) NOT NULL DEFAULT 0,
  `fieldname` varchar(190) NOT NULL DEFAULT '',
  `sleeve_lenght` varchar(190) DEFAULT NULL,
  `size` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`o_id`,`fieldname`),
  KEY `o_id` (`o_id`),
  KEY `fieldname` (`fieldname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_brick_store_ShirtsAttributes_PRD` (`o_id`, `fieldname`, `sleeve_lenght`, `size`) VALUES
(162,	'attributes',	'1',	'M');

DROP TABLE IF EXISTS `object_brick_store_ShoesAttributes_PRD`;
CREATE TABLE `object_brick_store_ShoesAttributes_PRD` (
  `o_id` int(11) NOT NULL DEFAULT 0,
  `fieldname` varchar(190) NOT NULL DEFAULT '',
  `size` varchar(190) DEFAULT NULL,
  `has_heel` tinyint(1) DEFAULT NULL,
  `heel_height__value` double DEFAULT NULL,
  `heel_height__unit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`o_id`,`fieldname`),
  KEY `o_id` (`o_id`),
  KEY `fieldname` (`fieldname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `object_CAT`;
CREATE TABLE `object_CAT` (
  `oo_id` int(11) DEFAULT NULL,
  `oo_classId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oo_className` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_id` int(11) unsigned DEFAULT NULL,
  `o_parentId` int(11) unsigned DEFAULT NULL,
  `o_type` enum('object','folder','variant') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_path` varchar(765) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_index` int(11) unsigned DEFAULT NULL,
  `o_published` tinyint(1) unsigned DEFAULT NULL,
  `o_creationDate` int(11) unsigned DEFAULT NULL,
  `o_modificationDate` int(11) unsigned DEFAULT NULL,
  `o_userOwner` int(11) unsigned DEFAULT NULL,
  `o_userModification` int(11) unsigned DEFAULT NULL,
  `o_classId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_className` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_childrenSortBy` enum('key','index') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_childrenSortOrder` enum('ASC','DESC') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_versionCount` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `object_classificationstore_data_PROD`;
CREATE TABLE `object_classificationstore_data_PROD` (
  `o_id` bigint(20) NOT NULL,
  `collectionId` bigint(20) DEFAULT NULL,
  `groupId` bigint(20) NOT NULL,
  `keyId` bigint(20) NOT NULL,
  `value` longtext DEFAULT NULL,
  `value2` longtext DEFAULT NULL,
  `fieldname` varchar(70) NOT NULL,
  `language` varchar(10) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`o_id`,`fieldname`,`groupId`,`keyId`,`language`),
  KEY `keyId` (`keyId`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `object_classificationstore_groups_PROD`;
CREATE TABLE `object_classificationstore_groups_PROD` (
  `o_id` bigint(20) NOT NULL,
  `groupId` bigint(20) NOT NULL,
  `fieldname` varchar(70) NOT NULL,
  PRIMARY KEY (`o_id`,`fieldname`,`groupId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `object_COL`;
CREATE TABLE `object_COL` (
  `oo_id` int(11) DEFAULT NULL,
  `oo_classId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oo_className` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color__rgb` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color__a` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_id` int(11) unsigned DEFAULT NULL,
  `o_parentId` int(11) unsigned DEFAULT NULL,
  `o_type` enum('object','folder','variant') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_path` varchar(765) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_index` int(11) unsigned DEFAULT NULL,
  `o_published` tinyint(1) unsigned DEFAULT NULL,
  `o_creationDate` int(11) unsigned DEFAULT NULL,
  `o_modificationDate` int(11) unsigned DEFAULT NULL,
  `o_userOwner` int(11) unsigned DEFAULT NULL,
  `o_userModification` int(11) unsigned DEFAULT NULL,
  `o_classId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_className` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_childrenSortBy` enum('key','index') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_childrenSortOrder` enum('ASC','DESC') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_versionCount` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `object_collection_Dimensions_PRD`;
CREATE TABLE `object_collection_Dimensions_PRD` (
  `o_id` int(11) NOT NULL DEFAULT 0,
  `index` int(11) NOT NULL DEFAULT 0,
  `fieldname` varchar(190) NOT NULL DEFAULT '',
  `description` varchar(190) DEFAULT NULL,
  `weight__value` double DEFAULT NULL,
  `weight__unit` bigint(20) DEFAULT NULL,
  `width__value` double DEFAULT NULL,
  `width__unit` bigint(20) DEFAULT NULL,
  `height__value` double DEFAULT NULL,
  `height__unit` bigint(20) DEFAULT NULL,
  `depth__value` double DEFAULT NULL,
  `depth__unit` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`o_id`,`index`,`fieldname`),
  KEY `index` (`index`),
  KEY `fieldname` (`fieldname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `object_collection_ImageInfo_PRD`;
CREATE TABLE `object_collection_ImageInfo_PRD` (
  `o_id` int(11) NOT NULL DEFAULT 0,
  `index` int(11) NOT NULL DEFAULT 0,
  `fieldname` varchar(190) NOT NULL DEFAULT '',
  `image` int(11) DEFAULT NULL,
  PRIMARY KEY (`o_id`,`index`,`fieldname`),
  KEY `index` (`index`),
  KEY `fieldname` (`fieldname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_collection_ImageInfo_PRD` (`o_id`, `index`, `fieldname`, `image`) VALUES
(162,	0,	'images',	9),
(163,	0,	'images',	4),
(164,	0,	'images',	5),
(165,	0,	'images',	6),
(166,	0,	'images',	7),
(167,	0,	'images',	8),
(168,	0,	'images',	10),
(169,	0,	'images',	11),
(170,	0,	'images',	12),
(172,	0,	'images',	14),
(173,	0,	'images',	16),
(174,	0,	'images',	15);

DROP TABLE IF EXISTS `object_collection_OpeningDay_SHO`;
CREATE TABLE `object_collection_OpeningDay_SHO` (
  `o_id` int(11) NOT NULL DEFAULT 0,
  `index` int(11) NOT NULL DEFAULT 0,
  `fieldname` varchar(190) NOT NULL DEFAULT '',
  `closed` tinyint(1) DEFAULT NULL,
  `dayofweek` varchar(190) DEFAULT NULL,
  `partofday` varchar(190) DEFAULT NULL,
  `opening` varchar(5) DEFAULT NULL,
  `closing` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`o_id`,`index`,`fieldname`),
  KEY `index` (`index`),
  KEY `fieldname` (`fieldname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_collection_OpeningDay_SHO` (`o_id`, `index`, `fieldname`, `closed`, `dayofweek`, `partofday`, `opening`, `closing`) VALUES
(180,	0,	'openings',	NULL,	'Mon',	'continued',	'09:00',	'19:00'),
(180,	1,	'openings',	NULL,	'Tue',	'continued',	'09:00',	'19:00'),
(180,	2,	'openings',	NULL,	'Wed',	'continued',	'09:00',	'19:00'),
(180,	3,	'openings',	NULL,	'Thu',	'continued',	'09:00',	'19:00'),
(180,	4,	'openings',	NULL,	'Fri',	'continued',	'09:00',	'19:00'),
(180,	5,	'openings',	0,	'Sat',	'continued',	'09:00',	'19:00'),
(180,	6,	'openings',	1,	'Sun',	'continued',	'',	''),
(182,	0,	'openings',	NULL,	'Mon',	'continued',	'09:00',	'19:00'),
(182,	1,	'openings',	NULL,	'Tue',	'continued',	'09:00',	'19:00'),
(182,	2,	'openings',	NULL,	'Wed',	'continued',	'09:00',	'19:00'),
(182,	3,	'openings',	NULL,	'Thu',	'continued',	'09:00',	'19:00'),
(182,	4,	'openings',	NULL,	'Fri',	'continued',	'09:00',	'19:00'),
(182,	5,	'openings',	0,	'Sat',	'continued',	'09:00',	'19:00'),
(182,	6,	'openings',	1,	'Sun',	'continued',	'',	'');

DROP TABLE IF EXISTS `object_localized_CAT_el_GR`;
CREATE TABLE `object_localized_CAT_el_GR` (
  `oo_id` int(11) DEFAULT NULL,
  `oo_classId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oo_className` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_id` int(11) unsigned DEFAULT NULL,
  `o_parentId` int(11) unsigned DEFAULT NULL,
  `o_type` enum('object','folder','variant') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_path` varchar(765) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_index` int(11) unsigned DEFAULT NULL,
  `o_published` tinyint(1) unsigned DEFAULT NULL,
  `o_creationDate` int(11) unsigned DEFAULT NULL,
  `o_modificationDate` int(11) unsigned DEFAULT NULL,
  `o_userOwner` int(11) unsigned DEFAULT NULL,
  `o_userModification` int(11) unsigned DEFAULT NULL,
  `o_classId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_className` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_childrenSortBy` enum('key','index') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_childrenSortOrder` enum('ASC','DESC') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_versionCount` int(10) unsigned DEFAULT NULL,
  `ooo_id` int(11) DEFAULT NULL,
  `language` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP VIEW IF EXISTS `object_localized_CAT_en`;
CREATE TABLE `object_localized_CAT_en` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_CAT_es`;
CREATE TABLE `object_localized_CAT_es` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_CAT_fr`;
CREATE TABLE `object_localized_CAT_fr` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_CAT_it`;
CREATE TABLE `object_localized_CAT_it` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_CAT_pl`;
CREATE TABLE `object_localized_CAT_pl` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_CAT_pt`;
CREATE TABLE `object_localized_CAT_pt` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP TABLE IF EXISTS `object_localized_data_CAT`;
CREATE TABLE `object_localized_data_CAT` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_data_CAT` (`ooo_id`, `language`, `name`, `description`) VALUES
(5,	'el_GR',	NULL,	NULL),
(5,	'en',	'T-Shirt',	'<p>A leader as simple as it is revolutionary. It is the t-shirt, a garment that has changed the fate of fashion history with its unisex and informal vocation. The shirt, in fact, is a garment without collar and without buttons, with short or long sleeves, which dresses women and men without distinction and is declined in an infinite variant of models, more or less expensive.<br />\n&nbsp;</p>\n'),
(5,	'es',	NULL,	NULL),
(5,	'fr',	NULL,	NULL),
(5,	'it',	'T-Shirt',	'<p>Un capo tanto semplice quanto rivoluzionario. È la t-shirt, un indumento che ha cambiato le sorti della storia della moda con la sua vocazione unisex e informale. La maglietta, infatti, è un capo senza colletto e senza bottoni, a maniche corte o lunghe, che veste indistintamente donne e uomini e si declina in una variante infinita di modelli, più o meno costosi.<br />\n&nbsp;</p>\n'),
(5,	'pl',	NULL,	NULL),
(5,	'pt',	NULL,	NULL),
(7,	'el_GR',	NULL,	NULL),
(7,	'en',	'Shorts',	'<p>The shorts are basically short shorts. The most beautiful are the high-waisted hot pants, 50s pin up style, so to speak.</p>\n'),
(7,	'es',	NULL,	NULL),
(7,	'fr',	NULL,	NULL),
(7,	'it',	'Shorts',	'<p>Gli shorts sono sostanzialmente pantaloncini corti. I più belli sono gli hot pants a vita alta, stile pin up anni ’50, per intenderci.</p>\n'),
(7,	'pl',	NULL,	NULL),
(7,	'pt',	NULL,	NULL),
(177,	'el_GR',	NULL,	NULL),
(177,	'en',	'Running',	'<p>Running shoes&nbsp;are shoes primarily designed for sports or other forms of physical exercise but that are now also widely used for everyday casual wear.</p>\n'),
(177,	'es',	NULL,	NULL),
(177,	'fr',	NULL,	NULL),
(177,	'it',	'Da Ginnastica',	'<p>Scarpa da ginnastica&nbsp;è il nome generico per una scarpa creata per svolgere attività sportive. Originariamente erano utilizzate solamente in ambito sportivo,[1] mentre ora sono indossate comunemente nell\'abbigliamento casual.</p>\n'),
(177,	'pl',	NULL,	NULL),
(177,	'pt',	NULL,	NULL);

DROP TABLE IF EXISTS `object_localized_data_MAT`;
CREATE TABLE `object_localized_data_MAT` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_data_MAT` (`ooo_id`, `language`, `name`, `description`) VALUES
(158,	'el_GR',	NULL,	NULL),
(158,	'en',	'Cotton',	'Cotton is obtained from the down that forms on the seeds of the plant of the same name. The climates that favor the cultivation of the cotton plant are hot and humid. Currently the major cotton producers are the United States, China, Russia, India, Sudan and Egypt. The textile production of cotton is even 50% of that worldwide. Its fiber is qualified in relation to the length, whose sizes vary from 20 to 40 mm, the longer the length of the fiber the more the cotton is shiny and resistant, therefore more valuable. The main producers of cotton are egypt, peru, sudan and india; from the latter the most valuable quality is produced. Cotton fiber has many advantages: not only does it not ruin washing but it improves its quality, plus it is an electrostatic insulator; it is a very hygienic, fresh and comfortable fabric.'),
(158,	'es',	NULL,	NULL),
(158,	'fr',	NULL,	NULL),
(158,	'it',	'Cotone',	'Il cotone si ricava dalla peluria che si forma sui semi della omonima pianta. I climi che favoriscono la coltivazione della pianta del cotone sono caldo-umidi. Attualmente i maggiori produttori di cotone sono gli stati uniti, cina, russia, india, sudan, egitto. La produzione tessile del cotone è addirittura del 50% di quella mondiale. La sua fibra viene qualificata in rapporto alla lunghezza, le cui misure variano dai 20 ai 40 mm, maggiore è la lunghezza della fibra più il cotone è lucido e resistente, quindi più pregiato. I maggiori produttori di cotone sono l’egitto, il perù, il sudan e l’india; da quest’ultima è prodotta la qualità più pregiata. La fibra di cotone ha molti pregi: non solo non si rovina al lavaggio ma migliora la sua qualità, in più è un isolante elettrostatico; è un tessuto molto igienico, fresco e confortevole.'),
(158,	'pl',	NULL,	NULL),
(158,	'pt',	NULL,	NULL),
(159,	'el_GR',	NULL,	NULL),
(159,	'en',	'Silk',	'Silk is a textile fiber of animal origin, which arises precisely from the natural activity of the serac worm. The latter is nourished with mulberry leaves and has the characteristic of building a cocoon around itself with the filament of a \"substance\" secreted by itself; it is this filament that, with particular techniques already known 4500 years ago in China, becomes raw silk. In the West it was already known by the ancient Romans who imported it from the east, but its production in the West began only in the sixth century. d.C. on the initiative of the Emperor Justinian. Later sericulture spread to England, Spain, France, the Netherlands and Italy; in the latter the best period was undoubtedly the Renaissance, during this period the silks produced in Venice, Milan and Florence were sought after throughout Europe.\n'),
(159,	'es',	NULL,	NULL),
(159,	'fr',	NULL,	NULL),
(159,	'it',	'Seta',	'La seta è una fibra tessile di origine animale, che nasce appunto dall’attività naturale del baco serigeno. Quest’ultimo viene nutrito con foglie di gelso ed ha la caratteristica di costruirsi attorno un bozzolo col filamento di una “sostanza” secreta da se stesso; è appunto questo filamento che, con tecniche particolari conosciute già 4500 anni fa in cina, diventa la seta grezza. In occidente era conosciuta già dagli antichi romani che la importavano dall’est, ma la sua produzione in occidente è iniziata solo nel vi sec. d.C. dietro iniziativa dell’imperatore giustiniano. In seguito la sericoltura si diffuse in inghilterra, spagna, francia, paesi bassi e italia; in quest’ultima il periodo migliore fu senz’altro il rinascimento, durante questo periodo le sete prodotte a venezia, milano e firenze erano ricercate in tutta europa.'),
(159,	'pl',	NULL,	NULL),
(159,	'pt',	NULL,	NULL),
(160,	'el_GR',	NULL,	NULL),
(160,	'en',	'Viscose',	'Viscose is a term often used to represent the viscose fiber that is made from natural sources such as wood and agricultural products that are regenerated as cellulose fiber. The molecular structure of natural cellulose is preserved in the process'),
(160,	'es',	NULL,	NULL),
(160,	'fr',	NULL,	NULL),
(160,	'it',	'Viscosa',	'La viscosa è un tessuto in cellulosa che imita la morbidezza delle pregiate fibre usate storicamente presentando inoltre una lucentezza serica, per cui veniva un tempo anche chiamata \"seta artificiale\". Tuttavia, ogni riferimento alla seta è stato vietato dalla legge che tutela la seta ed ora anche dalla legge europea in tema di etichettatura tessile'),
(160,	'pl',	NULL,	NULL),
(160,	'pt',	NULL,	NULL);

DROP TABLE IF EXISTS `object_localized_data_PRD`;
CREATE TABLE `object_localized_data_PRD` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_data_PRD` (`ooo_id`, `language`, `name`, `short_description`, `description`) VALUES
(162,	'el_GR',	NULL,	NULL,	NULL),
(162,	'en',	'Classic T-Shirt',	'Soft and comfortable, this t-shirt is made of a high-quality Pima cotton jersey. Proposed in bright colors, it accompanies modern man every day',	'<p>Pima cotton jersey<br />\nChoker<br />\nRegular cut<br />\nLogo transfer inside the neck<br />\nGreen crocodile embroidered on the chest<br />\nCotton (100%)&nbsp;</p>\n'),
(162,	'es',	NULL,	NULL,	NULL),
(162,	'fr',	NULL,	NULL,	NULL),
(162,	'it',	'T-Shirt Classica',	'Morbida e confortevole, questa t-shirt è confezionata in jersey di cotone Pima di alta qualità. Proposta in tinte vivaci, accompagna tutti i giorni l\'uomo moderno',	'<p>Jersey di cotone Pima<br />\nGirocollo<br />\nTaglio regolare<br />\nLogo transfer all\'interno del collo<br />\nCoccodrillo verde ricamato sul petto<br />\nCotone (100%)</p>\n'),
(162,	'pl',	NULL,	NULL,	NULL),
(162,	'pt',	NULL,	NULL,	NULL),
(163,	'el_GR',	NULL,	NULL,	NULL),
(163,	'en',	NULL,	NULL,	NULL),
(163,	'es',	NULL,	NULL,	NULL),
(163,	'fr',	NULL,	NULL,	NULL),
(163,	'it',	NULL,	NULL,	NULL),
(163,	'pl',	NULL,	NULL,	NULL),
(163,	'pt',	NULL,	NULL,	NULL),
(164,	'el_GR',	NULL,	NULL,	NULL),
(164,	'en',	NULL,	NULL,	NULL),
(164,	'es',	NULL,	NULL,	NULL),
(164,	'fr',	NULL,	NULL,	NULL),
(164,	'it',	NULL,	NULL,	NULL),
(164,	'pl',	NULL,	NULL,	NULL),
(164,	'pt',	NULL,	NULL,	NULL),
(165,	'el_GR',	NULL,	NULL,	NULL),
(165,	'en',	NULL,	NULL,	NULL),
(165,	'es',	NULL,	NULL,	NULL),
(165,	'fr',	NULL,	NULL,	NULL),
(165,	'it',	NULL,	NULL,	NULL),
(165,	'pl',	NULL,	NULL,	NULL),
(165,	'pt',	NULL,	NULL,	NULL),
(166,	'el_GR',	NULL,	NULL,	NULL),
(166,	'en',	NULL,	NULL,	NULL),
(166,	'es',	NULL,	NULL,	NULL),
(166,	'fr',	NULL,	NULL,	NULL),
(166,	'it',	NULL,	NULL,	NULL),
(166,	'pl',	NULL,	NULL,	NULL),
(166,	'pt',	NULL,	NULL,	NULL),
(167,	'el_GR',	NULL,	NULL,	NULL),
(167,	'en',	NULL,	NULL,	NULL),
(167,	'es',	NULL,	NULL,	NULL),
(167,	'fr',	NULL,	NULL,	NULL),
(167,	'it',	NULL,	NULL,	NULL),
(167,	'pl',	NULL,	NULL,	NULL),
(167,	'pt',	NULL,	NULL,	NULL),
(168,	'el_GR',	NULL,	NULL,	NULL),
(168,	'en',	NULL,	NULL,	NULL),
(168,	'es',	NULL,	NULL,	NULL),
(168,	'fr',	NULL,	NULL,	NULL),
(168,	'it',	NULL,	NULL,	NULL),
(168,	'pl',	NULL,	NULL,	NULL),
(168,	'pt',	NULL,	NULL,	NULL),
(169,	'el_GR',	NULL,	NULL,	NULL),
(169,	'en',	NULL,	NULL,	NULL),
(169,	'es',	NULL,	NULL,	NULL),
(169,	'fr',	NULL,	NULL,	NULL),
(169,	'it',	NULL,	NULL,	NULL),
(169,	'pl',	NULL,	NULL,	NULL),
(169,	'pt',	NULL,	NULL,	NULL),
(170,	'el_GR',	NULL,	NULL,	NULL),
(170,	'en',	NULL,	NULL,	NULL),
(170,	'es',	NULL,	NULL,	NULL),
(170,	'fr',	NULL,	NULL,	NULL),
(170,	'it',	NULL,	NULL,	NULL),
(170,	'pl',	NULL,	NULL,	NULL),
(170,	'pt',	NULL,	NULL,	NULL),
(171,	'el_GR',	NULL,	NULL,	NULL),
(171,	'en',	'Jeans Shorts',	'Denim shorts with turn-up hem',	'<p>Denim shorts with turn-up hem, belt loops, pockets, and zip and button closure.</p>\n'),
(171,	'es',	NULL,	NULL,	NULL),
(171,	'fr',	NULL,	NULL,	NULL),
(171,	'it',	'Shorts in Jeans',	'Shorts di jeans con risvolto sull\'orlo',	'<p>Shorts di jeans con risvolto sull\'orlo, vita con passante, tasche e chiusura con cerniera e bottone.</p>\n'),
(171,	'pl',	NULL,	NULL,	NULL),
(171,	'pt',	NULL,	NULL,	NULL),
(172,	'el_GR',	NULL,	NULL,	NULL),
(172,	'en',	NULL,	NULL,	NULL),
(172,	'es',	NULL,	NULL,	NULL),
(172,	'fr',	NULL,	NULL,	NULL),
(172,	'it',	NULL,	NULL,	NULL),
(172,	'pl',	NULL,	NULL,	NULL),
(172,	'pt',	NULL,	NULL,	NULL),
(173,	'el_GR',	NULL,	NULL,	NULL),
(173,	'en',	NULL,	NULL,	NULL),
(173,	'es',	NULL,	NULL,	NULL),
(173,	'fr',	NULL,	NULL,	NULL),
(173,	'it',	NULL,	NULL,	NULL),
(173,	'pl',	NULL,	NULL,	NULL),
(173,	'pt',	NULL,	NULL,	NULL),
(174,	'el_GR',	NULL,	NULL,	NULL),
(174,	'en',	NULL,	NULL,	NULL),
(174,	'es',	NULL,	NULL,	NULL),
(174,	'fr',	NULL,	NULL,	NULL),
(174,	'it',	NULL,	NULL,	NULL),
(174,	'pl',	NULL,	NULL,	NULL),
(174,	'pt',	NULL,	NULL,	NULL),
(175,	'el_GR',	NULL,	NULL,	NULL),
(175,	'en',	'T-Shirt & Jeans',	NULL,	NULL),
(175,	'es',	NULL,	NULL,	NULL),
(175,	'fr',	NULL,	NULL,	NULL),
(175,	'it',	'T-Shirt & Jeans',	NULL,	NULL),
(175,	'pl',	NULL,	NULL,	NULL),
(175,	'pt',	NULL,	NULL,	NULL);

DROP VIEW IF EXISTS `object_localized_MAT_el_GR`;
CREATE TABLE `object_localized_MAT_el_GR` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `typology` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_MAT_en`;
CREATE TABLE `object_localized_MAT_en` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `typology` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_MAT_es`;
CREATE TABLE `object_localized_MAT_es` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `typology` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_MAT_fr`;
CREATE TABLE `object_localized_MAT_fr` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `typology` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_MAT_it`;
CREATE TABLE `object_localized_MAT_it` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `typology` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_MAT_pl`;
CREATE TABLE `object_localized_MAT_pl` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `typology` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_MAT_pt`;
CREATE TABLE `object_localized_MAT_pt` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `typology` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `description` longtext);


DROP VIEW IF EXISTS `object_localized_PRD_el_GR`;
CREATE TABLE `object_localized_PRD_el_GR` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `sku` varchar(190), `price__value` double, `price__unit` varchar(50), `brand` varchar(190), `made_in` varchar(190), `category__id` int(11), `category__type` enum('document','asset','object'), `materials` text, `color__id` int(11), `color__type` enum('document','asset','object'), `bundle_products` text, `bundlePrice` double, `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `short_description` longtext, `description` longtext, `translationCompleted` varchar(190));


DROP VIEW IF EXISTS `object_localized_PRD_en`;
CREATE TABLE `object_localized_PRD_en` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `sku` varchar(190), `price__value` double, `price__unit` varchar(50), `brand` varchar(190), `made_in` varchar(190), `category__id` int(11), `category__type` enum('document','asset','object'), `materials` text, `color__id` int(11), `color__type` enum('document','asset','object'), `bundle_products` text, `bundlePrice` double, `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `short_description` longtext, `description` longtext, `translationCompleted` varchar(190));


DROP VIEW IF EXISTS `object_localized_PRD_es`;
CREATE TABLE `object_localized_PRD_es` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `sku` varchar(190), `price__value` double, `price__unit` varchar(50), `brand` varchar(190), `made_in` varchar(190), `category__id` int(11), `category__type` enum('document','asset','object'), `materials` text, `color__id` int(11), `color__type` enum('document','asset','object'), `bundle_products` text, `bundlePrice` double, `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `short_description` longtext, `description` longtext, `translationCompleted` varchar(190));


DROP VIEW IF EXISTS `object_localized_PRD_fr`;
CREATE TABLE `object_localized_PRD_fr` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `sku` varchar(190), `price__value` double, `price__unit` varchar(50), `brand` varchar(190), `made_in` varchar(190), `category__id` int(11), `category__type` enum('document','asset','object'), `materials` text, `color__id` int(11), `color__type` enum('document','asset','object'), `bundle_products` text, `bundlePrice` double, `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `short_description` longtext, `description` longtext, `translationCompleted` varchar(190));


DROP VIEW IF EXISTS `object_localized_PRD_it`;
CREATE TABLE `object_localized_PRD_it` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `sku` varchar(190), `price__value` double, `price__unit` varchar(50), `brand` varchar(190), `made_in` varchar(190), `category__id` int(11), `category__type` enum('document','asset','object'), `materials` text, `color__id` int(11), `color__type` enum('document','asset','object'), `bundle_products` text, `bundlePrice` double, `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `short_description` longtext, `description` longtext, `translationCompleted` varchar(190));


DROP VIEW IF EXISTS `object_localized_PRD_pl`;
CREATE TABLE `object_localized_PRD_pl` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `sku` varchar(190), `price__value` double, `price__unit` varchar(50), `brand` varchar(190), `made_in` varchar(190), `category__id` int(11), `category__type` enum('document','asset','object'), `materials` text, `color__id` int(11), `color__type` enum('document','asset','object'), `bundle_products` text, `bundlePrice` double, `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `short_description` longtext, `description` longtext, `translationCompleted` varchar(190));


DROP VIEW IF EXISTS `object_localized_PRD_pt`;
CREATE TABLE `object_localized_PRD_pt` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `sku` varchar(190), `price__value` double, `price__unit` varchar(50), `brand` varchar(190), `made_in` varchar(190), `category__id` int(11), `category__type` enum('document','asset','object'), `materials` text, `color__id` int(11), `color__type` enum('document','asset','object'), `bundle_products` text, `bundlePrice` double, `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned, `ooo_id` int(11), `language` varchar(10), `name` varchar(190), `short_description` longtext, `description` longtext, `translationCompleted` varchar(190));


DROP TABLE IF EXISTS `object_localized_query_CAT_el_GR`;
CREATE TABLE `object_localized_query_CAT_el_GR` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_CAT_el_GR` (`ooo_id`, `language`, `name`, `description`) VALUES
(5,	'el_GR',	NULL,	''),
(7,	'el_GR',	NULL,	''),
(177,	'el_GR',	NULL,	'');

DROP TABLE IF EXISTS `object_localized_query_CAT_en`;
CREATE TABLE `object_localized_query_CAT_en` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_CAT_en` (`ooo_id`, `language`, `name`, `description`) VALUES
(5,	'en',	'T-Shirt',	'A leader as simple as it is revolutionary. It is the t-shirt, a garment that has changed the fate of fashion history with its unisex and informal vocation. The shirt, in fact, is a garment without collar and without buttons, with short or long sleeves, which dresses women and men without distinction and is declined in an infinite variant of models, more or less expensive. &nbsp; '),
(7,	'en',	'Shorts',	'The shorts are basically short shorts. The most beautiful are the high-waisted hot pants, 50s pin up style, so to speak. '),
(177,	'en',	'Running',	'Running shoes&nbsp;are shoes primarily designed for sports or other forms of physical exercise but that are now also widely used for everyday casual wear. ');

DROP TABLE IF EXISTS `object_localized_query_CAT_es`;
CREATE TABLE `object_localized_query_CAT_es` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_CAT_es` (`ooo_id`, `language`, `name`, `description`) VALUES
(5,	'es',	NULL,	''),
(7,	'es',	NULL,	''),
(177,	'es',	NULL,	'');

DROP TABLE IF EXISTS `object_localized_query_CAT_fr`;
CREATE TABLE `object_localized_query_CAT_fr` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_CAT_fr` (`ooo_id`, `language`, `name`, `description`) VALUES
(5,	'fr',	NULL,	''),
(7,	'fr',	NULL,	''),
(177,	'fr',	NULL,	'');

DROP TABLE IF EXISTS `object_localized_query_CAT_it`;
CREATE TABLE `object_localized_query_CAT_it` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_CAT_it` (`ooo_id`, `language`, `name`, `description`) VALUES
(5,	'it',	'T-Shirt',	'Un capo tanto semplice quanto rivoluzionario. È la t-shirt, un indumento che ha cambiato le sorti della storia della moda con la sua vocazione unisex e informale. La maglietta, infatti, è un capo senza colletto e senza bottoni, a maniche corte o lunghe, che veste indistintamente donne e uomini e si declina in una variante infinita di modelli, più o meno costosi. &nbsp; '),
(7,	'it',	'Shorts',	'Gli shorts sono sostanzialmente pantaloncini corti. I più belli sono gli hot pants a vita alta, stile pin up anni ’50, per intenderci. '),
(177,	'it',	'Da Ginnastica',	'Scarpa da ginnastica&nbsp;è il nome generico per una scarpa creata per svolgere attività sportive. Originariamente erano utilizzate solamente in ambito sportivo,[1] mentre ora sono indossate comunemente nell\'abbigliamento casual. ');

DROP TABLE IF EXISTS `object_localized_query_CAT_pl`;
CREATE TABLE `object_localized_query_CAT_pl` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_CAT_pl` (`ooo_id`, `language`, `name`, `description`) VALUES
(5,	'pl',	NULL,	''),
(7,	'pl',	NULL,	''),
(177,	'pl',	NULL,	'');

DROP TABLE IF EXISTS `object_localized_query_CAT_pt`;
CREATE TABLE `object_localized_query_CAT_pt` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_CAT_pt` (`ooo_id`, `language`, `name`, `description`) VALUES
(5,	'pt',	NULL,	''),
(7,	'pt',	NULL,	''),
(177,	'pt',	NULL,	'');

DROP TABLE IF EXISTS `object_localized_query_MAT_el_GR`;
CREATE TABLE `object_localized_query_MAT_el_GR` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_MAT_el_GR` (`ooo_id`, `language`, `name`, `description`) VALUES
(158,	'el_GR',	NULL,	NULL),
(159,	'el_GR',	NULL,	NULL),
(160,	'el_GR',	NULL,	NULL);

DROP TABLE IF EXISTS `object_localized_query_MAT_en`;
CREATE TABLE `object_localized_query_MAT_en` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_MAT_en` (`ooo_id`, `language`, `name`, `description`) VALUES
(158,	'en',	'Cotton',	'Cotton is obtained from the down that forms on the seeds of the plant of the same name. The climates that favor the cultivation of the cotton plant are hot and humid. Currently the major cotton producers are the United States, China, Russia, India, Sudan and Egypt. The textile production of cotton is even 50% of that worldwide. Its fiber is qualified in relation to the length, whose sizes vary from 20 to 40 mm, the longer the length of the fiber the more the cotton is shiny and resistant, therefore more valuable. The main producers of cotton are egypt, peru, sudan and india; from the latter the most valuable quality is produced. Cotton fiber has many advantages: not only does it not ruin washing but it improves its quality, plus it is an electrostatic insulator; it is a very hygienic, fresh and comfortable fabric.'),
(159,	'en',	'Silk',	'Silk is a textile fiber of animal origin, which arises precisely from the natural activity of the serac worm. The latter is nourished with mulberry leaves and has the characteristic of building a cocoon around itself with the filament of a \"substance\" secreted by itself; it is this filament that, with particular techniques already known 4500 years ago in China, becomes raw silk. In the West it was already known by the ancient Romans who imported it from the east, but its production in the West began only in the sixth century. d.C. on the initiative of the Emperor Justinian. Later sericulture spread to England, Spain, France, the Netherlands and Italy; in the latter the best period was undoubtedly the Renaissance, during this period the silks produced in Venice, Milan and Florence were sought after throughout Europe.\n'),
(160,	'en',	'Viscose',	'Viscose is a term often used to represent the viscose fiber that is made from natural sources such as wood and agricultural products that are regenerated as cellulose fiber. The molecular structure of natural cellulose is preserved in the process');

DROP TABLE IF EXISTS `object_localized_query_MAT_es`;
CREATE TABLE `object_localized_query_MAT_es` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_MAT_es` (`ooo_id`, `language`, `name`, `description`) VALUES
(158,	'es',	NULL,	NULL),
(159,	'es',	NULL,	NULL),
(160,	'es',	NULL,	NULL);

DROP TABLE IF EXISTS `object_localized_query_MAT_fr`;
CREATE TABLE `object_localized_query_MAT_fr` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_MAT_fr` (`ooo_id`, `language`, `name`, `description`) VALUES
(158,	'fr',	NULL,	NULL),
(159,	'fr',	NULL,	NULL),
(160,	'fr',	NULL,	NULL);

DROP TABLE IF EXISTS `object_localized_query_MAT_it`;
CREATE TABLE `object_localized_query_MAT_it` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_MAT_it` (`ooo_id`, `language`, `name`, `description`) VALUES
(158,	'it',	'Cotone',	'Il cotone si ricava dalla peluria che si forma sui semi della omonima pianta. I climi che favoriscono la coltivazione della pianta del cotone sono caldo-umidi. Attualmente i maggiori produttori di cotone sono gli stati uniti, cina, russia, india, sudan, egitto. La produzione tessile del cotone è addirittura del 50% di quella mondiale. La sua fibra viene qualificata in rapporto alla lunghezza, le cui misure variano dai 20 ai 40 mm, maggiore è la lunghezza della fibra più il cotone è lucido e resistente, quindi più pregiato. I maggiori produttori di cotone sono l’egitto, il perù, il sudan e l’india; da quest’ultima è prodotta la qualità più pregiata. La fibra di cotone ha molti pregi: non solo non si rovina al lavaggio ma migliora la sua qualità, in più è un isolante elettrostatico; è un tessuto molto igienico, fresco e confortevole.'),
(159,	'it',	'Seta',	'La seta è una fibra tessile di origine animale, che nasce appunto dall’attività naturale del baco serigeno. Quest’ultimo viene nutrito con foglie di gelso ed ha la caratteristica di costruirsi attorno un bozzolo col filamento di una “sostanza” secreta da se stesso; è appunto questo filamento che, con tecniche particolari conosciute già 4500 anni fa in cina, diventa la seta grezza. In occidente era conosciuta già dagli antichi romani che la importavano dall’est, ma la sua produzione in occidente è iniziata solo nel vi sec. d.C. dietro iniziativa dell’imperatore giustiniano. In seguito la sericoltura si diffuse in inghilterra, spagna, francia, paesi bassi e italia; in quest’ultima il periodo migliore fu senz’altro il rinascimento, durante questo periodo le sete prodotte a venezia, milano e firenze erano ricercate in tutta europa.'),
(160,	'it',	'Viscosa',	'La viscosa è un tessuto in cellulosa che imita la morbidezza delle pregiate fibre usate storicamente presentando inoltre una lucentezza serica, per cui veniva un tempo anche chiamata \"seta artificiale\". Tuttavia, ogni riferimento alla seta è stato vietato dalla legge che tutela la seta ed ora anche dalla legge europea in tema di etichettatura tessile');

DROP TABLE IF EXISTS `object_localized_query_MAT_pl`;
CREATE TABLE `object_localized_query_MAT_pl` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_MAT_pl` (`ooo_id`, `language`, `name`, `description`) VALUES
(158,	'pl',	NULL,	NULL),
(159,	'pl',	NULL,	NULL),
(160,	'pl',	NULL,	NULL);

DROP TABLE IF EXISTS `object_localized_query_MAT_pt`;
CREATE TABLE `object_localized_query_MAT_pt` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_MAT_pt` (`ooo_id`, `language`, `name`, `description`) VALUES
(158,	'pt',	NULL,	NULL),
(159,	'pt',	NULL,	NULL),
(160,	'pt',	NULL,	NULL);

DROP TABLE IF EXISTS `object_localized_query_PRD_el_GR`;
CREATE TABLE `object_localized_query_PRD_el_GR` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `translationCompleted` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_PRD_el_GR` (`ooo_id`, `language`, `name`, `short_description`, `description`, `translationCompleted`) VALUES
(162,	'el_GR',	NULL,	NULL,	'',	'no'),
(163,	'el_GR',	NULL,	NULL,	'',	NULL),
(164,	'el_GR',	NULL,	NULL,	'',	NULL),
(165,	'el_GR',	NULL,	NULL,	'',	NULL),
(166,	'el_GR',	NULL,	NULL,	'',	NULL),
(167,	'el_GR',	NULL,	NULL,	'',	NULL),
(168,	'el_GR',	NULL,	NULL,	'',	NULL),
(169,	'el_GR',	NULL,	NULL,	'',	NULL),
(170,	'el_GR',	NULL,	NULL,	'',	NULL),
(171,	'el_GR',	NULL,	NULL,	'',	NULL),
(172,	'el_GR',	NULL,	NULL,	'',	NULL),
(173,	'el_GR',	NULL,	NULL,	'',	NULL),
(174,	'el_GR',	NULL,	NULL,	'',	NULL),
(175,	'el_GR',	NULL,	NULL,	'',	NULL);

DROP TABLE IF EXISTS `object_localized_query_PRD_en`;
CREATE TABLE `object_localized_query_PRD_en` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `translationCompleted` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_PRD_en` (`ooo_id`, `language`, `name`, `short_description`, `description`, `translationCompleted`) VALUES
(162,	'en',	'Classic T-Shirt',	'Soft and comfortable, this t-shirt is made of a high-quality Pima cotton jersey. Proposed in bright colors, it accompanies modern man every day',	'Pima cotton jersey Choker Regular cut Logo transfer inside the neck Green crocodile embroidered on the chest Cotton (100%)&nbsp; ',	'yes'),
(163,	'en',	'Classic T-Shirt',	'Soft and comfortable, this t-shirt is made of a high-quality Pima cotton jersey. Proposed in bright colors, it accompanies modern man every day',	'Pima cotton jersey Choker Regular cut Logo transfer inside the neck Green crocodile embroidered on the chest Cotton (100%)&nbsp; ',	NULL),
(164,	'en',	'Classic T-Shirt',	'Soft and comfortable, this t-shirt is made of a high-quality Pima cotton jersey. Proposed in bright colors, it accompanies modern man every day',	'Pima cotton jersey Choker Regular cut Logo transfer inside the neck Green crocodile embroidered on the chest Cotton (100%)&nbsp; ',	NULL),
(165,	'en',	'Classic T-Shirt',	'Soft and comfortable, this t-shirt is made of a high-quality Pima cotton jersey. Proposed in bright colors, it accompanies modern man every day',	'Pima cotton jersey Choker Regular cut Logo transfer inside the neck Green crocodile embroidered on the chest Cotton (100%)&nbsp; ',	NULL),
(166,	'en',	'Classic T-Shirt',	'Soft and comfortable, this t-shirt is made of a high-quality Pima cotton jersey. Proposed in bright colors, it accompanies modern man every day',	'Pima cotton jersey Choker Regular cut Logo transfer inside the neck Green crocodile embroidered on the chest Cotton (100%)&nbsp; ',	NULL),
(167,	'en',	'Classic T-Shirt',	'Soft and comfortable, this t-shirt is made of a high-quality Pima cotton jersey. Proposed in bright colors, it accompanies modern man every day',	'Pima cotton jersey Choker Regular cut Logo transfer inside the neck Green crocodile embroidered on the chest Cotton (100%)&nbsp; ',	NULL),
(168,	'en',	'Classic T-Shirt',	'Soft and comfortable, this t-shirt is made of a high-quality Pima cotton jersey. Proposed in bright colors, it accompanies modern man every day',	'Pima cotton jersey Choker Regular cut Logo transfer inside the neck Green crocodile embroidered on the chest Cotton (100%)&nbsp; ',	NULL),
(169,	'en',	'Classic T-Shirt',	'Soft and comfortable, this t-shirt is made of a high-quality Pima cotton jersey. Proposed in bright colors, it accompanies modern man every day',	'Pima cotton jersey Choker Regular cut Logo transfer inside the neck Green crocodile embroidered on the chest Cotton (100%)&nbsp; ',	NULL),
(170,	'en',	'Classic T-Shirt',	'Soft and comfortable, this t-shirt is made of a high-quality Pima cotton jersey. Proposed in bright colors, it accompanies modern man every day',	'Pima cotton jersey Choker Regular cut Logo transfer inside the neck Green crocodile embroidered on the chest Cotton (100%)&nbsp; ',	NULL),
(171,	'en',	'Jeans Shorts',	'Denim shorts with turn-up hem',	'Denim shorts with turn-up hem, belt loops, pockets, and zip and button closure. ',	NULL),
(172,	'en',	'Jeans Shorts',	'Denim shorts with turn-up hem',	'Denim shorts with turn-up hem, belt loops, pockets, and zip and button closure. ',	NULL),
(173,	'en',	'Jeans Shorts',	'Denim shorts with turn-up hem',	'Denim shorts with turn-up hem, belt loops, pockets, and zip and button closure. ',	NULL),
(174,	'en',	'Jeans Shorts',	'Denim shorts with turn-up hem',	'Denim shorts with turn-up hem, belt loops, pockets, and zip and button closure. ',	NULL),
(175,	'en',	'T-Shirt & Jeans',	NULL,	'',	NULL);

DROP TABLE IF EXISTS `object_localized_query_PRD_es`;
CREATE TABLE `object_localized_query_PRD_es` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `translationCompleted` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_PRD_es` (`ooo_id`, `language`, `name`, `short_description`, `description`, `translationCompleted`) VALUES
(162,	'es',	NULL,	NULL,	'',	'no'),
(163,	'es',	NULL,	NULL,	'',	NULL),
(164,	'es',	NULL,	NULL,	'',	NULL),
(165,	'es',	NULL,	NULL,	'',	NULL),
(166,	'es',	NULL,	NULL,	'',	NULL),
(167,	'es',	NULL,	NULL,	'',	NULL),
(168,	'es',	NULL,	NULL,	'',	NULL),
(169,	'es',	NULL,	NULL,	'',	NULL),
(170,	'es',	NULL,	NULL,	'',	NULL),
(171,	'es',	NULL,	NULL,	'',	NULL),
(172,	'es',	NULL,	NULL,	'',	NULL),
(173,	'es',	NULL,	NULL,	'',	NULL),
(174,	'es',	NULL,	NULL,	'',	NULL),
(175,	'es',	NULL,	NULL,	'',	NULL);

DROP TABLE IF EXISTS `object_localized_query_PRD_fr`;
CREATE TABLE `object_localized_query_PRD_fr` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `translationCompleted` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_PRD_fr` (`ooo_id`, `language`, `name`, `short_description`, `description`, `translationCompleted`) VALUES
(162,	'fr',	NULL,	NULL,	'',	'no'),
(163,	'fr',	NULL,	NULL,	'',	NULL),
(164,	'fr',	NULL,	NULL,	'',	NULL),
(165,	'fr',	NULL,	NULL,	'',	NULL),
(166,	'fr',	NULL,	NULL,	'',	NULL),
(167,	'fr',	NULL,	NULL,	'',	NULL),
(168,	'fr',	NULL,	NULL,	'',	NULL),
(169,	'fr',	NULL,	NULL,	'',	NULL),
(170,	'fr',	NULL,	NULL,	'',	NULL),
(171,	'fr',	NULL,	NULL,	'',	NULL),
(172,	'fr',	NULL,	NULL,	'',	NULL),
(173,	'fr',	NULL,	NULL,	'',	NULL),
(174,	'fr',	NULL,	NULL,	'',	NULL),
(175,	'fr',	NULL,	NULL,	'',	NULL);

DROP TABLE IF EXISTS `object_localized_query_PRD_it`;
CREATE TABLE `object_localized_query_PRD_it` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `translationCompleted` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_PRD_it` (`ooo_id`, `language`, `name`, `short_description`, `description`, `translationCompleted`) VALUES
(162,	'it',	'T-Shirt Classica',	'Morbida e confortevole, questa t-shirt è confezionata in jersey di cotone Pima di alta qualità. Proposta in tinte vivaci, accompagna tutti i giorni l\'uomo moderno',	'Jersey di cotone Pima Girocollo Taglio regolare Logo transfer all\'interno del collo Coccodrillo verde ricamato sul petto Cotone (100%) ',	'yes'),
(163,	'it',	'T-Shirt Classica',	'Morbida e confortevole, questa t-shirt è confezionata in jersey di cotone Pima di alta qualità. Proposta in tinte vivaci, accompagna tutti i giorni l\'uomo moderno',	'Jersey di cotone Pima Girocollo Taglio regolare Logo transfer all\'interno del collo Coccodrillo verde ricamato sul petto Cotone (100%) ',	NULL),
(164,	'it',	'T-Shirt Classica',	'Morbida e confortevole, questa t-shirt è confezionata in jersey di cotone Pima di alta qualità. Proposta in tinte vivaci, accompagna tutti i giorni l\'uomo moderno',	'Jersey di cotone Pima Girocollo Taglio regolare Logo transfer all\'interno del collo Coccodrillo verde ricamato sul petto Cotone (100%) ',	NULL),
(165,	'it',	'T-Shirt Classica',	'Morbida e confortevole, questa t-shirt è confezionata in jersey di cotone Pima di alta qualità. Proposta in tinte vivaci, accompagna tutti i giorni l\'uomo moderno',	'Jersey di cotone Pima Girocollo Taglio regolare Logo transfer all\'interno del collo Coccodrillo verde ricamato sul petto Cotone (100%) ',	NULL),
(166,	'it',	'T-Shirt Classica',	'Morbida e confortevole, questa t-shirt è confezionata in jersey di cotone Pima di alta qualità. Proposta in tinte vivaci, accompagna tutti i giorni l\'uomo moderno',	'Jersey di cotone Pima Girocollo Taglio regolare Logo transfer all\'interno del collo Coccodrillo verde ricamato sul petto Cotone (100%) ',	NULL),
(167,	'it',	'T-Shirt Classica',	'Morbida e confortevole, questa t-shirt è confezionata in jersey di cotone Pima di alta qualità. Proposta in tinte vivaci, accompagna tutti i giorni l\'uomo moderno',	'Jersey di cotone Pima Girocollo Taglio regolare Logo transfer all\'interno del collo Coccodrillo verde ricamato sul petto Cotone (100%) ',	NULL),
(168,	'it',	'T-Shirt Classica',	'Morbida e confortevole, questa t-shirt è confezionata in jersey di cotone Pima di alta qualità. Proposta in tinte vivaci, accompagna tutti i giorni l\'uomo moderno',	'Jersey di cotone Pima Girocollo Taglio regolare Logo transfer all\'interno del collo Coccodrillo verde ricamato sul petto Cotone (100%) ',	NULL),
(169,	'it',	'T-Shirt Classica',	'Morbida e confortevole, questa t-shirt è confezionata in jersey di cotone Pima di alta qualità. Proposta in tinte vivaci, accompagna tutti i giorni l\'uomo moderno',	'Jersey di cotone Pima Girocollo Taglio regolare Logo transfer all\'interno del collo Coccodrillo verde ricamato sul petto Cotone (100%) ',	NULL),
(170,	'it',	'T-Shirt Classica',	'Morbida e confortevole, questa t-shirt è confezionata in jersey di cotone Pima di alta qualità. Proposta in tinte vivaci, accompagna tutti i giorni l\'uomo moderno',	'Jersey di cotone Pima Girocollo Taglio regolare Logo transfer all\'interno del collo Coccodrillo verde ricamato sul petto Cotone (100%) ',	NULL),
(171,	'it',	'Shorts in Jeans',	'Shorts di jeans con risvolto sull\'orlo',	'Shorts di jeans con risvolto sull\'orlo, vita con passante, tasche e chiusura con cerniera e bottone. ',	NULL),
(172,	'it',	'Shorts in Jeans',	'Shorts di jeans con risvolto sull\'orlo',	'Shorts di jeans con risvolto sull\'orlo, vita con passante, tasche e chiusura con cerniera e bottone. ',	NULL),
(173,	'it',	'Shorts in Jeans',	'Shorts di jeans con risvolto sull\'orlo',	'Shorts di jeans con risvolto sull\'orlo, vita con passante, tasche e chiusura con cerniera e bottone. ',	NULL),
(174,	'it',	'Shorts in Jeans',	'Shorts di jeans con risvolto sull\'orlo',	'Shorts di jeans con risvolto sull\'orlo, vita con passante, tasche e chiusura con cerniera e bottone. ',	NULL),
(175,	'it',	'T-Shirt & Jeans',	NULL,	'',	NULL);

DROP TABLE IF EXISTS `object_localized_query_PRD_pl`;
CREATE TABLE `object_localized_query_PRD_pl` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `translationCompleted` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_PRD_pl` (`ooo_id`, `language`, `name`, `short_description`, `description`, `translationCompleted`) VALUES
(162,	'pl',	NULL,	NULL,	'',	'no'),
(163,	'pl',	NULL,	NULL,	'',	NULL),
(164,	'pl',	NULL,	NULL,	'',	NULL),
(165,	'pl',	NULL,	NULL,	'',	NULL),
(166,	'pl',	NULL,	NULL,	'',	NULL),
(167,	'pl',	NULL,	NULL,	'',	NULL),
(168,	'pl',	NULL,	NULL,	'',	NULL),
(169,	'pl',	NULL,	NULL,	'',	NULL),
(170,	'pl',	NULL,	NULL,	'',	NULL),
(171,	'pl',	NULL,	NULL,	'',	NULL),
(172,	'pl',	NULL,	NULL,	'',	NULL),
(173,	'pl',	NULL,	NULL,	'',	NULL),
(174,	'pl',	NULL,	NULL,	'',	NULL),
(175,	'pl',	NULL,	NULL,	'',	NULL);

DROP TABLE IF EXISTS `object_localized_query_PRD_pt`;
CREATE TABLE `object_localized_query_PRD_pt` (
  `ooo_id` int(11) NOT NULL DEFAULT 0,
  `language` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(190) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `translationCompleted` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`ooo_id`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_localized_query_PRD_pt` (`ooo_id`, `language`, `name`, `short_description`, `description`, `translationCompleted`) VALUES
(162,	'pt',	NULL,	NULL,	'',	'no'),
(163,	'pt',	NULL,	NULL,	'',	NULL),
(164,	'pt',	NULL,	NULL,	'',	NULL),
(165,	'pt',	NULL,	NULL,	'',	NULL),
(166,	'pt',	NULL,	NULL,	'',	NULL),
(167,	'pt',	NULL,	NULL,	'',	NULL),
(168,	'pt',	NULL,	NULL,	'',	NULL),
(169,	'pt',	NULL,	NULL,	'',	NULL),
(170,	'pt',	NULL,	NULL,	'',	NULL),
(171,	'pt',	NULL,	NULL,	'',	NULL),
(172,	'pt',	NULL,	NULL,	'',	NULL),
(173,	'pt',	NULL,	NULL,	'',	NULL),
(174,	'pt',	NULL,	NULL,	'',	NULL),
(175,	'pt',	NULL,	NULL,	'',	NULL);

DROP VIEW IF EXISTS `object_MAT`;
CREATE TABLE `object_MAT` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `code` varchar(190), `typology` varchar(190), `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned);


DROP TABLE IF EXISTS `object_metadata_PRD`;
CREATE TABLE `object_metadata_PRD` (
  `o_id` int(11) NOT NULL DEFAULT 0,
  `dest_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(50) NOT NULL DEFAULT '',
  `fieldname` varchar(71) NOT NULL,
  `column` varchar(190) NOT NULL,
  `data` text DEFAULT NULL,
  `ownertype` enum('object','fieldcollection','localizedfield','objectbrick') NOT NULL DEFAULT 'object',
  `ownername` varchar(70) NOT NULL DEFAULT '',
  `position` varchar(70) NOT NULL DEFAULT '0',
  `index` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`o_id`,`dest_id`,`type`,`fieldname`,`column`,`ownertype`,`ownername`,`position`,`index`),
  KEY `dest_id` (`dest_id`),
  KEY `fieldname` (`fieldname`),
  KEY `column` (`column`),
  KEY `ownertype` (`ownertype`),
  KEY `ownername` (`ownername`),
  KEY `position` (`position`),
  KEY `index` (`index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_metadata_PRD` (`o_id`, `dest_id`, `type`, `fieldname`, `column`, `data`, `ownertype`, `ownername`, `position`, `index`) VALUES
(162,	158,	'object',	'materials',	'percent',	'100%',	'object',	'',	'0',	1),
(171,	158,	'object',	'materials',	'percent',	'95%',	'object',	'',	'0',	1),
(171,	160,	'object',	'materials',	'percent',	'5%',	'object',	'',	'0',	2);

DROP VIEW IF EXISTS `object_PRD`;
CREATE TABLE `object_PRD` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `sku` varchar(190), `price__value` double, `price__unit` varchar(50), `brand` varchar(190), `made_in` varchar(190), `category__id` int(11), `category__type` enum('document','asset','object'), `materials` text, `color__id` int(11), `color__type` enum('document','asset','object'), `bundle_products` text, `bundlePrice` double, `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned);


DROP TABLE IF EXISTS `object_query_CAT`;
CREATE TABLE `object_query_CAT` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `oo_classId` varchar(50) DEFAULT 'CAT',
  `oo_className` varchar(255) DEFAULT 'Category',
  `code` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_query_CAT` (`oo_id`, `oo_classId`, `oo_className`, `code`) VALUES
(5,	'CAT',	'Category',	'TSH'),
(7,	'CAT',	'Category',	'SHT'),
(177,	'CAT',	'Category',	'RUN');

DROP TABLE IF EXISTS `object_query_COL`;
CREATE TABLE `object_query_COL` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `oo_classId` varchar(50) DEFAULT 'COL',
  `oo_className` varchar(255) DEFAULT 'Color',
  `name` varchar(190) DEFAULT NULL,
  `color__rgb` varchar(6) DEFAULT NULL,
  `color__a` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_query_COL` (`oo_id`, `oo_classId`, `oo_className`, `name`, `color__rgb`, `color__a`) VALUES
(10,	'COL',	'Color',	'Aliceblue',	'f0f8ff',	'ff'),
(11,	'COL',	'Color',	'Antiquewhite',	'faebd7',	'ff'),
(12,	'COL',	'Color',	'Aqua',	'00ffff',	'ff'),
(13,	'COL',	'Color',	'Aquamarine',	'7fffd4',	'ff'),
(14,	'COL',	'Color',	'Azure',	'f0ffff',	'ff'),
(15,	'COL',	'Color',	'Beige',	'f5f5dc',	'ff'),
(16,	'COL',	'Color',	'Bisque',	'ffe4c4',	'ff'),
(17,	'COL',	'Color',	'Black',	'000000',	'ff'),
(18,	'COL',	'Color',	'Blanchedalmond',	'ffebcd',	'ff'),
(19,	'COL',	'Color',	'Blue',	'0000ff',	'ff'),
(20,	'COL',	'Color',	'Blueviolet',	'8a2be2',	'ff'),
(21,	'COL',	'Color',	'Brown',	'a52a2a',	'ff'),
(22,	'COL',	'Color',	'Burlywood',	'deb887',	'ff'),
(23,	'COL',	'Color',	'Cadetblue',	'5f9ea0',	'ff'),
(24,	'COL',	'Color',	'Chartreuse',	'7fff00',	'ff'),
(25,	'COL',	'Color',	'Chocolate',	'd2691e',	'ff'),
(26,	'COL',	'Color',	'Coral',	'ff7f50',	'ff'),
(27,	'COL',	'Color',	'Cornflowerblue',	'6495ed',	'ff'),
(28,	'COL',	'Color',	'Cornsilk',	'fff8dc',	'ff'),
(29,	'COL',	'Color',	'Crimson',	'dc143c',	'ff'),
(30,	'COL',	'Color',	'Cyan',	'00ffff',	'ff'),
(31,	'COL',	'Color',	'Darkblue',	'00008b',	'ff'),
(32,	'COL',	'Color',	'Darkcyan',	'008b8b',	'ff'),
(33,	'COL',	'Color',	'Darkgoldenrod',	'b8860b',	'ff'),
(34,	'COL',	'Color',	'Darkgray',	'a9a9a9',	'ff'),
(35,	'COL',	'Color',	'Darkgreen',	'006400',	'ff'),
(36,	'COL',	'Color',	'Darkgrey',	'a9a9a9',	'ff'),
(37,	'COL',	'Color',	'Darkkhaki',	'bdb76b',	'ff'),
(38,	'COL',	'Color',	'Darkmagenta',	'8b008b',	'ff'),
(39,	'COL',	'Color',	'Darkolivegreen',	'556b2f',	'ff'),
(40,	'COL',	'Color',	'Darkorange',	'ff8c00',	'ff'),
(41,	'COL',	'Color',	'Darkorchid',	'9932cc',	'ff'),
(42,	'COL',	'Color',	'Darkred',	'8b0000',	'ff'),
(43,	'COL',	'Color',	'Darksalmon',	'e9967a',	'ff'),
(44,	'COL',	'Color',	'Darkseagreen',	'8fbc8f',	'ff'),
(45,	'COL',	'Color',	'Darkslateblue',	'483d8b',	'ff'),
(46,	'COL',	'Color',	'Darkslategray',	'2f4f4f',	'ff'),
(47,	'COL',	'Color',	'Darkslategrey',	'2f4f4f',	'ff'),
(48,	'COL',	'Color',	'Darkturquoise',	'00ced1',	'ff'),
(49,	'COL',	'Color',	'Darkviolet',	'9400d3',	'ff'),
(50,	'COL',	'Color',	'Deeppink',	'ff1493',	'ff'),
(51,	'COL',	'Color',	'Deepskyblue',	'00bfff',	'ff'),
(52,	'COL',	'Color',	'Dimgray',	'696969',	'ff'),
(53,	'COL',	'Color',	'Dimgrey',	'696969',	'ff'),
(54,	'COL',	'Color',	'Dodgerblue',	'1e90ff',	'ff'),
(55,	'COL',	'Color',	'Firebrick',	'b22222',	'ff'),
(56,	'COL',	'Color',	'Floralwhite',	'fffaf0',	'ff'),
(57,	'COL',	'Color',	'Forestgreen',	'228b22',	'ff'),
(58,	'COL',	'Color',	'Fuchsia',	'ff00ff',	'ff'),
(59,	'COL',	'Color',	'Gainsboro',	'dcdcdc',	'ff'),
(60,	'COL',	'Color',	'Ghostwhite',	'f8f8ff',	'ff'),
(61,	'COL',	'Color',	'Gold',	'ffd700',	'ff'),
(62,	'COL',	'Color',	'Goldenrod',	'daa520',	'ff'),
(63,	'COL',	'Color',	'Gray',	'808080',	'ff'),
(64,	'COL',	'Color',	'Green',	'008000',	'ff'),
(65,	'COL',	'Color',	'Greenyellow',	'adff2f',	'ff'),
(66,	'COL',	'Color',	'Grey',	'808080',	'ff'),
(67,	'COL',	'Color',	'Honeydew',	'f0fff0',	'ff'),
(68,	'COL',	'Color',	'Hotpink',	'ff69b4',	'ff'),
(69,	'COL',	'Color',	'Indianred',	'cd5c5c',	'ff'),
(70,	'COL',	'Color',	'Indigo',	'4b0082',	'ff'),
(71,	'COL',	'Color',	'Ivory',	'fffff0',	'ff'),
(72,	'COL',	'Color',	'Khaki',	'f0e68c',	'ff'),
(73,	'COL',	'Color',	'Lavender',	'e6e6fa',	'ff'),
(74,	'COL',	'Color',	'Lavenderblush',	'fff0f5',	'ff'),
(75,	'COL',	'Color',	'Lawngreen',	'7cfc00',	'ff'),
(76,	'COL',	'Color',	'Lemonchiffon',	'fffacd',	'ff'),
(77,	'COL',	'Color',	'Lightblue',	'add8e6',	'ff'),
(78,	'COL',	'Color',	'Lightcoral',	'f08080',	'ff'),
(79,	'COL',	'Color',	'Lightcyan',	'e0ffff',	'ff'),
(80,	'COL',	'Color',	'Lightgoldenrodyellow',	'fafad2',	'ff'),
(81,	'COL',	'Color',	'Lightgray',	'd3d3d3',	'ff'),
(82,	'COL',	'Color',	'Lightgreen',	'90ee90',	'ff'),
(83,	'COL',	'Color',	'Lightgrey',	'd3d3d3',	'ff'),
(84,	'COL',	'Color',	'Lightpink',	'ffb6c1',	'ff'),
(85,	'COL',	'Color',	'Lightsalmon',	'ffa07a',	'ff'),
(86,	'COL',	'Color',	'Lightseagreen',	'20b2aa',	'ff'),
(87,	'COL',	'Color',	'Lightskyblue',	'87cefa',	'ff'),
(88,	'COL',	'Color',	'Lightslategray',	'778899',	'ff'),
(89,	'COL',	'Color',	'Lightslategrey',	'778899',	'ff'),
(90,	'COL',	'Color',	'Lightsteelblue',	'b0c4de',	'ff'),
(91,	'COL',	'Color',	'Lightyellow',	'ffffe0',	'ff'),
(92,	'COL',	'Color',	'Lime',	'00ff00',	'ff'),
(93,	'COL',	'Color',	'Limegreen',	'32cd32',	'ff'),
(94,	'COL',	'Color',	'Linen',	'faf0e6',	'ff'),
(95,	'COL',	'Color',	'Magenta',	'ff00ff',	'ff'),
(96,	'COL',	'Color',	'Maroon',	'800000',	'ff'),
(97,	'COL',	'Color',	'Mediumaquamarine',	'66cdaa',	'ff'),
(98,	'COL',	'Color',	'Mediumblue',	'0000cd',	'ff'),
(99,	'COL',	'Color',	'Mediumorchid',	'ba55d3',	'ff'),
(100,	'COL',	'Color',	'Mediumpurple',	'9370db',	'ff'),
(101,	'COL',	'Color',	'Mediumseagreen',	'3cb371',	'ff'),
(102,	'COL',	'Color',	'Mediumslateblue',	'7b68ee',	'ff'),
(103,	'COL',	'Color',	'Mediumspringgreen',	'00fa9a',	'ff'),
(104,	'COL',	'Color',	'Mediumturquoise',	'48d1cc',	'ff'),
(105,	'COL',	'Color',	'Mediumvioletred',	'c71585',	'ff'),
(106,	'COL',	'Color',	'Midnightblue',	'191970',	'ff'),
(107,	'COL',	'Color',	'Mintcream',	'f5fffa',	'ff'),
(108,	'COL',	'Color',	'Mistyrose',	'ffe4e1',	'ff'),
(109,	'COL',	'Color',	'Moccasin',	'ffe4b5',	'ff'),
(110,	'COL',	'Color',	'Navajowhite',	'ffdead',	'ff'),
(111,	'COL',	'Color',	'Navy',	'000080',	'ff'),
(112,	'COL',	'Color',	'Oldlace',	'fdf5e6',	'ff'),
(113,	'COL',	'Color',	'Olive',	'808000',	'ff'),
(114,	'COL',	'Color',	'Olivedrab',	'6b8e23',	'ff'),
(115,	'COL',	'Color',	'Orange',	'ffa500',	'ff'),
(116,	'COL',	'Color',	'Orangered',	'ff4500',	'ff'),
(117,	'COL',	'Color',	'Orchid',	'da70d6',	'ff'),
(118,	'COL',	'Color',	'Palegoldenrod',	'eee8aa',	'ff'),
(119,	'COL',	'Color',	'Palegreen',	'98fb98',	'ff'),
(120,	'COL',	'Color',	'Paleturquoise',	'afeeee',	'ff'),
(121,	'COL',	'Color',	'Palevioletred',	'db7093',	'ff'),
(122,	'COL',	'Color',	'Papayawhip',	'ffefd5',	'ff'),
(123,	'COL',	'Color',	'Peachpuff',	'ffdab9',	'ff'),
(124,	'COL',	'Color',	'Peru',	'cd853f',	'ff'),
(125,	'COL',	'Color',	'Pink',	'ffc0cb',	'ff'),
(126,	'COL',	'Color',	'Plum',	'dda0dd',	'ff'),
(127,	'COL',	'Color',	'Powderblue',	'b0e0e6',	'ff'),
(128,	'COL',	'Color',	'Purple',	'800080',	'ff'),
(129,	'COL',	'Color',	'Red',	'ff0000',	'ff'),
(130,	'COL',	'Color',	'Rosybrown',	'bc8f8f',	'ff'),
(131,	'COL',	'Color',	'Royalblue',	'4169e1',	'ff'),
(132,	'COL',	'Color',	'Saddlebrown',	'8b4513',	'ff'),
(133,	'COL',	'Color',	'Salmon',	'fa8072',	'ff'),
(134,	'COL',	'Color',	'Sandybrown',	'f4a460',	'ff'),
(135,	'COL',	'Color',	'Seagreen',	'2e8b57',	'ff'),
(136,	'COL',	'Color',	'Seashell',	'fff5ee',	'ff'),
(137,	'COL',	'Color',	'Sienna',	'a0522d',	'ff'),
(138,	'COL',	'Color',	'Silver',	'c0c0c0',	'ff'),
(139,	'COL',	'Color',	'Skyblue',	'87ceeb',	'ff'),
(140,	'COL',	'Color',	'Slateblue',	'6a5acd',	'ff'),
(141,	'COL',	'Color',	'Slategray',	'708090',	'ff'),
(142,	'COL',	'Color',	'Slategrey',	'708090',	'ff'),
(143,	'COL',	'Color',	'Snow',	'fffafa',	'ff'),
(144,	'COL',	'Color',	'Springgreen',	'00ff7f',	'ff'),
(145,	'COL',	'Color',	'Steelblue',	'4682b4',	'ff'),
(146,	'COL',	'Color',	'Tan',	'd2b48c',	'ff'),
(147,	'COL',	'Color',	'Teal',	'008080',	'ff'),
(148,	'COL',	'Color',	'Thistle',	'd8bfd8',	'ff'),
(149,	'COL',	'Color',	'Tomato',	'ff6347',	'ff'),
(150,	'COL',	'Color',	'Turquoise',	'40e0d0',	'ff'),
(151,	'COL',	'Color',	'Violet',	'ee82ee',	'ff'),
(152,	'COL',	'Color',	'Wheat',	'f5deb3',	'ff'),
(153,	'COL',	'Color',	'White',	'ffffff',	'ff'),
(154,	'COL',	'Color',	'Whitesmoke',	'f5f5f5',	'ff'),
(155,	'COL',	'Color',	'Yellow',	'ffff00',	'ff'),
(156,	'COL',	'Color',	'Yellowgreen',	'9acd32',	'ff');

DROP TABLE IF EXISTS `object_query_MAT`;
CREATE TABLE `object_query_MAT` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `oo_classId` varchar(50) DEFAULT 'MAT',
  `oo_className` varchar(255) DEFAULT 'Material',
  `code` varchar(190) DEFAULT NULL,
  `typology` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_query_MAT` (`oo_id`, `oo_classId`, `oo_className`, `code`, `typology`) VALUES
(158,	'MAT',	'Material',	'CTN',	'N'),
(159,	'MAT',	'Material',	'SLK',	''),
(160,	'MAT',	'Material',	'VIS',	'A');

DROP TABLE IF EXISTS `object_query_PRD`;
CREATE TABLE `object_query_PRD` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `oo_classId` varchar(50) DEFAULT 'PRD',
  `oo_className` varchar(255) DEFAULT 'Product',
  `sku` varchar(190) DEFAULT NULL,
  `price__value` double DEFAULT NULL,
  `price__unit` varchar(50) DEFAULT NULL,
  `brand` varchar(190) DEFAULT NULL,
  `made_in` varchar(190) DEFAULT NULL,
  `category__id` int(11) DEFAULT NULL,
  `category__type` enum('document','asset','object') DEFAULT NULL,
  `materials` text DEFAULT NULL,
  `color__id` int(11) DEFAULT NULL,
  `color__type` enum('document','asset','object') DEFAULT NULL,
  `bundle_products` text DEFAULT NULL,
  `bundlePrice` double DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_query_PRD` (`oo_id`, `oo_classId`, `oo_className`, `sku`, `price__value`, `price__unit`, `brand`, `made_in`, `category__id`, `category__type`, `materials`, `color__id`, `color__type`, `bundle_products`, `bundlePrice`) VALUES
(162,	'PRD',	'Product',	'0001',	49.99,	'1',	'9',	'CN',	5,	'object',	',158,',	NULL,	NULL,	NULL,	NULL),
(163,	'PRD',	'Product',	'0001-AZ',	49.99,	'1',	'9',	'CN',	5,	'object',	',158,',	54,	'object',	NULL,	NULL),
(164,	'PRD',	'Product',	'0001-BK',	49.99,	'1',	'9',	'CN',	5,	'object',	',158,',	17,	'object',	NULL,	NULL),
(165,	'PRD',	'Product',	'0001-GR',	49.99,	'1',	'9',	'CN',	5,	'object',	',158,',	64,	'object',	NULL,	NULL),
(166,	'PRD',	'Product',	'0001-GY',	49.99,	'1',	'9',	'CN',	5,	'object',	',158,',	66,	'object',	NULL,	NULL),
(167,	'PRD',	'Product',	'0001-PK',	49.99,	'1',	'9',	'CN',	5,	'object',	',158,',	125,	'object',	NULL,	NULL),
(168,	'PRD',	'Product',	'0001-RD',	49.99,	'1',	'9',	'CN',	5,	'object',	',158,',	129,	'object',	NULL,	NULL),
(169,	'PRD',	'Product',	'0001-WH',	49.99,	'1',	'9',	'CN',	5,	'object',	',158,',	153,	'object',	NULL,	NULL),
(170,	'PRD',	'Product',	'0001-YW',	49.99,	'1',	'9',	'CN',	5,	'object',	',158,',	155,	'object',	NULL,	NULL),
(171,	'PRD',	'Product',	'0002',	19.99,	'1',	'66',	'IT',	7,	'object',	',158,160,',	NULL,	NULL,	NULL,	NULL),
(172,	'PRD',	'Product',	'0002-BL',	19.99,	'1',	'66',	'IT',	7,	'object',	',158,160,',	19,	'object',	NULL,	NULL),
(173,	'PRD',	'Product',	'0002-LB',	19.99,	'1',	'66',	'IT',	7,	'object',	',158,160,',	77,	'object',	NULL,	NULL),
(174,	'PRD',	'Product',	'0002-GY',	19.99,	'1',	'66',	'IT',	7,	'object',	',158,160,',	66,	'object',	NULL,	NULL),
(175,	'PRD',	'Product',	'Bundle1',	74.99,	'1',	'',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	',162,171,',	59.99);

DROP TABLE IF EXISTS `object_query_SHO`;
CREATE TABLE `object_query_SHO` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `oo_classId` varchar(50) DEFAULT 'SHO',
  `oo_className` varchar(255) DEFAULT 'Shop',
  `name` varchar(190) DEFAULT NULL,
  `phone` varchar(190) DEFAULT NULL,
  `email` varchar(190) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `street` varchar(190) DEFAULT NULL,
  `zip` varchar(190) DEFAULT NULL,
  `city` varchar(190) DEFAULT NULL,
  `province` varchar(190) DEFAULT NULL,
  `region` varchar(190) DEFAULT NULL,
  `country` varchar(190) DEFAULT NULL,
  `map_location__longitude` double DEFAULT NULL,
  `map_location__latitude` double DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_query_SHO` (`oo_id`, `oo_classId`, `oo_className`, `name`, `phone`, `email`, `image`, `street`, `zip`, `city`, `province`, `region`, `country`, `map_location__longitude`, `map_location__latitude`) VALUES
(180,	'SHO',	'Shop',	'Rome',	'1234567890',	'rome@shop.test.com',	18,	'Piazza del Colosseo, 1',	'00184 ',	'Roma ',	'RM',	'Lazio',	'IT',	12.491167423298,	41.890224),
(181,	'SHO',	'Shop',	'Paris',	'0987654321',	'paris@shop.test.com',	19,	'Champ de Mars, 5 Avenue Anatole France',	'75007 ',	'Paris',	NULL,	'Île-de-France',	'FR',	2.2978203933222,	48.85614465),
(182,	'SHO',	'Shop',	'London',	'3333333333',	'london@shop.test.com',	20,	'Victoria St, Westminster',	'SW1P 1LT',	'London',	'',	'London',	'GB',	12.491167423298,	41.890224);

DROP TABLE IF EXISTS `object_relations_CAT`;
CREATE TABLE `object_relations_CAT` (
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


DROP TABLE IF EXISTS `object_relations_COL`;
CREATE TABLE `object_relations_COL` (
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


DROP TABLE IF EXISTS `object_relations_MAT`;
CREATE TABLE `object_relations_MAT` (
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


DROP TABLE IF EXISTS `object_relations_PRD`;
CREATE TABLE `object_relations_PRD` (
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_relations_PRD` (`id`, `src_id`, `dest_id`, `type`, `fieldname`, `index`, `ownertype`, `ownername`, `position`) VALUES
(4,	163,	54,	'object',	'color',	0,	'object',	'',	'0'),
(5,	164,	17,	'object',	'color',	0,	'object',	'',	'0'),
(6,	165,	64,	'object',	'color',	0,	'object',	'',	'0'),
(7,	166,	66,	'object',	'color',	0,	'object',	'',	'0'),
(8,	167,	125,	'object',	'color',	0,	'object',	'',	'0'),
(9,	168,	129,	'object',	'color',	0,	'object',	'',	'0'),
(10,	169,	153,	'object',	'color',	0,	'object',	'',	'0'),
(11,	170,	155,	'object',	'color',	0,	'object',	'',	'0'),
(15,	172,	19,	'object',	'color',	0,	'object',	'',	'0'),
(16,	174,	66,	'object',	'color',	0,	'object',	'',	'0'),
(17,	173,	77,	'object',	'color',	0,	'object',	'',	'0'),
(22,	175,	162,	'object',	'bundle_products',	1,	'object',	'',	'0'),
(23,	175,	171,	'object',	'bundle_products',	2,	'object',	'',	'0'),
(27,	171,	7,	'object',	'category',	0,	'object',	'',	'0'),
(28,	171,	158,	'object',	'materials',	1,	'object',	'',	'0'),
(29,	171,	160,	'object',	'materials',	2,	'object',	'',	'0'),
(30,	162,	5,	'object',	'category',	0,	'object',	'',	'0'),
(33,	162,	158,	'object',	'materials',	1,	'object',	'',	'0');

DROP TABLE IF EXISTS `object_relations_SHO`;
CREATE TABLE `object_relations_SHO` (
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


DROP VIEW IF EXISTS `object_SHO`;
CREATE TABLE `object_SHO` (`oo_id` int(11), `oo_classId` varchar(50), `oo_className` varchar(255), `name` varchar(190), `phone` varchar(190), `email` varchar(190), `image` int(11), `street` varchar(190), `zip` varchar(190), `city` varchar(190), `province` varchar(190), `region` varchar(190), `country` varchar(190), `map_location__longitude` double, `map_location__latitude` double, `o_id` int(11) unsigned, `o_parentId` int(11) unsigned, `o_type` enum('object','folder','variant'), `o_key` varchar(255), `o_path` varchar(765), `o_index` int(11) unsigned, `o_published` tinyint(1) unsigned, `o_creationDate` int(11) unsigned, `o_modificationDate` int(11) unsigned, `o_userOwner` int(11) unsigned, `o_userModification` int(11) unsigned, `o_classId` varchar(50), `o_className` varchar(255), `o_childrenSortBy` enum('key','index'), `o_childrenSortOrder` enum('ASC','DESC'), `o_versionCount` int(10) unsigned);


DROP TABLE IF EXISTS `object_store_CAT`;
CREATE TABLE `object_store_CAT` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `code` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`oo_id`),
  UNIQUE KEY `u_index_code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_store_CAT` (`oo_id`, `code`) VALUES
(177,	'RUN'),
(7,	'SHT'),
(5,	'TSH');

DROP TABLE IF EXISTS `object_store_COL`;
CREATE TABLE `object_store_COL` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(190) DEFAULT NULL,
  `color__rgb` varchar(6) DEFAULT NULL,
  `color__a` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_store_COL` (`oo_id`, `name`, `color__rgb`, `color__a`) VALUES
(10,	'Aliceblue',	'f0f8ff',	'ff'),
(11,	'Antiquewhite',	'faebd7',	'ff'),
(12,	'Aqua',	'00ffff',	'ff'),
(13,	'Aquamarine',	'7fffd4',	'ff'),
(14,	'Azure',	'f0ffff',	'ff'),
(15,	'Beige',	'f5f5dc',	'ff'),
(16,	'Bisque',	'ffe4c4',	'ff'),
(17,	'Black',	'000000',	'ff'),
(18,	'Blanchedalmond',	'ffebcd',	'ff'),
(19,	'Blue',	'0000ff',	'ff'),
(20,	'Blueviolet',	'8a2be2',	'ff'),
(21,	'Brown',	'a52a2a',	'ff'),
(22,	'Burlywood',	'deb887',	'ff'),
(23,	'Cadetblue',	'5f9ea0',	'ff'),
(24,	'Chartreuse',	'7fff00',	'ff'),
(25,	'Chocolate',	'd2691e',	'ff'),
(26,	'Coral',	'ff7f50',	'ff'),
(27,	'Cornflowerblue',	'6495ed',	'ff'),
(28,	'Cornsilk',	'fff8dc',	'ff'),
(29,	'Crimson',	'dc143c',	'ff'),
(30,	'Cyan',	'00ffff',	'ff'),
(31,	'Darkblue',	'00008b',	'ff'),
(32,	'Darkcyan',	'008b8b',	'ff'),
(33,	'Darkgoldenrod',	'b8860b',	'ff'),
(34,	'Darkgray',	'a9a9a9',	'ff'),
(35,	'Darkgreen',	'006400',	'ff'),
(36,	'Darkgrey',	'a9a9a9',	'ff'),
(37,	'Darkkhaki',	'bdb76b',	'ff'),
(38,	'Darkmagenta',	'8b008b',	'ff'),
(39,	'Darkolivegreen',	'556b2f',	'ff'),
(40,	'Darkorange',	'ff8c00',	'ff'),
(41,	'Darkorchid',	'9932cc',	'ff'),
(42,	'Darkred',	'8b0000',	'ff'),
(43,	'Darksalmon',	'e9967a',	'ff'),
(44,	'Darkseagreen',	'8fbc8f',	'ff'),
(45,	'Darkslateblue',	'483d8b',	'ff'),
(46,	'Darkslategray',	'2f4f4f',	'ff'),
(47,	'Darkslategrey',	'2f4f4f',	'ff'),
(48,	'Darkturquoise',	'00ced1',	'ff'),
(49,	'Darkviolet',	'9400d3',	'ff'),
(50,	'Deeppink',	'ff1493',	'ff'),
(51,	'Deepskyblue',	'00bfff',	'ff'),
(52,	'Dimgray',	'696969',	'ff'),
(53,	'Dimgrey',	'696969',	'ff'),
(54,	'Dodgerblue',	'1e90ff',	'ff'),
(55,	'Firebrick',	'b22222',	'ff'),
(56,	'Floralwhite',	'fffaf0',	'ff'),
(57,	'Forestgreen',	'228b22',	'ff'),
(58,	'Fuchsia',	'ff00ff',	'ff'),
(59,	'Gainsboro',	'dcdcdc',	'ff'),
(60,	'Ghostwhite',	'f8f8ff',	'ff'),
(61,	'Gold',	'ffd700',	'ff'),
(62,	'Goldenrod',	'daa520',	'ff'),
(63,	'Gray',	'808080',	'ff'),
(64,	'Green',	'008000',	'ff'),
(65,	'Greenyellow',	'adff2f',	'ff'),
(66,	'Grey',	'808080',	'ff'),
(67,	'Honeydew',	'f0fff0',	'ff'),
(68,	'Hotpink',	'ff69b4',	'ff'),
(69,	'Indianred',	'cd5c5c',	'ff'),
(70,	'Indigo',	'4b0082',	'ff'),
(71,	'Ivory',	'fffff0',	'ff'),
(72,	'Khaki',	'f0e68c',	'ff'),
(73,	'Lavender',	'e6e6fa',	'ff'),
(74,	'Lavenderblush',	'fff0f5',	'ff'),
(75,	'Lawngreen',	'7cfc00',	'ff'),
(76,	'Lemonchiffon',	'fffacd',	'ff'),
(77,	'Lightblue',	'add8e6',	'ff'),
(78,	'Lightcoral',	'f08080',	'ff'),
(79,	'Lightcyan',	'e0ffff',	'ff'),
(80,	'Lightgoldenrodyellow',	'fafad2',	'ff'),
(81,	'Lightgray',	'd3d3d3',	'ff'),
(82,	'Lightgreen',	'90ee90',	'ff'),
(83,	'Lightgrey',	'd3d3d3',	'ff'),
(84,	'Lightpink',	'ffb6c1',	'ff'),
(85,	'Lightsalmon',	'ffa07a',	'ff'),
(86,	'Lightseagreen',	'20b2aa',	'ff'),
(87,	'Lightskyblue',	'87cefa',	'ff'),
(88,	'Lightslategray',	'778899',	'ff'),
(89,	'Lightslategrey',	'778899',	'ff'),
(90,	'Lightsteelblue',	'b0c4de',	'ff'),
(91,	'Lightyellow',	'ffffe0',	'ff'),
(92,	'Lime',	'00ff00',	'ff'),
(93,	'Limegreen',	'32cd32',	'ff'),
(94,	'Linen',	'faf0e6',	'ff'),
(95,	'Magenta',	'ff00ff',	'ff'),
(96,	'Maroon',	'800000',	'ff'),
(97,	'Mediumaquamarine',	'66cdaa',	'ff'),
(98,	'Mediumblue',	'0000cd',	'ff'),
(99,	'Mediumorchid',	'ba55d3',	'ff'),
(100,	'Mediumpurple',	'9370db',	'ff'),
(101,	'Mediumseagreen',	'3cb371',	'ff'),
(102,	'Mediumslateblue',	'7b68ee',	'ff'),
(103,	'Mediumspringgreen',	'00fa9a',	'ff'),
(104,	'Mediumturquoise',	'48d1cc',	'ff'),
(105,	'Mediumvioletred',	'c71585',	'ff'),
(106,	'Midnightblue',	'191970',	'ff'),
(107,	'Mintcream',	'f5fffa',	'ff'),
(108,	'Mistyrose',	'ffe4e1',	'ff'),
(109,	'Moccasin',	'ffe4b5',	'ff'),
(110,	'Navajowhite',	'ffdead',	'ff'),
(111,	'Navy',	'000080',	'ff'),
(112,	'Oldlace',	'fdf5e6',	'ff'),
(113,	'Olive',	'808000',	'ff'),
(114,	'Olivedrab',	'6b8e23',	'ff'),
(115,	'Orange',	'ffa500',	'ff'),
(116,	'Orangered',	'ff4500',	'ff'),
(117,	'Orchid',	'da70d6',	'ff'),
(118,	'Palegoldenrod',	'eee8aa',	'ff'),
(119,	'Palegreen',	'98fb98',	'ff'),
(120,	'Paleturquoise',	'afeeee',	'ff'),
(121,	'Palevioletred',	'db7093',	'ff'),
(122,	'Papayawhip',	'ffefd5',	'ff'),
(123,	'Peachpuff',	'ffdab9',	'ff'),
(124,	'Peru',	'cd853f',	'ff'),
(125,	'Pink',	'ffc0cb',	'ff'),
(126,	'Plum',	'dda0dd',	'ff'),
(127,	'Powderblue',	'b0e0e6',	'ff'),
(128,	'Purple',	'800080',	'ff'),
(129,	'Red',	'ff0000',	'ff'),
(130,	'Rosybrown',	'bc8f8f',	'ff'),
(131,	'Royalblue',	'4169e1',	'ff'),
(132,	'Saddlebrown',	'8b4513',	'ff'),
(133,	'Salmon',	'fa8072',	'ff'),
(134,	'Sandybrown',	'f4a460',	'ff'),
(135,	'Seagreen',	'2e8b57',	'ff'),
(136,	'Seashell',	'fff5ee',	'ff'),
(137,	'Sienna',	'a0522d',	'ff'),
(138,	'Silver',	'c0c0c0',	'ff'),
(139,	'Skyblue',	'87ceeb',	'ff'),
(140,	'Slateblue',	'6a5acd',	'ff'),
(141,	'Slategray',	'708090',	'ff'),
(142,	'Slategrey',	'708090',	'ff'),
(143,	'Snow',	'fffafa',	'ff'),
(144,	'Springgreen',	'00ff7f',	'ff'),
(145,	'Steelblue',	'4682b4',	'ff'),
(146,	'Tan',	'd2b48c',	'ff'),
(147,	'Teal',	'008080',	'ff'),
(148,	'Thistle',	'd8bfd8',	'ff'),
(149,	'Tomato',	'ff6347',	'ff'),
(150,	'Turquoise',	'40e0d0',	'ff'),
(151,	'Violet',	'ee82ee',	'ff'),
(152,	'Wheat',	'f5deb3',	'ff'),
(153,	'White',	'ffffff',	'ff'),
(154,	'Whitesmoke',	'f5f5f5',	'ff'),
(155,	'Yellow',	'ffff00',	'ff'),
(156,	'Yellowgreen',	'9acd32',	'ff');

DROP TABLE IF EXISTS `object_store_MAT`;
CREATE TABLE `object_store_MAT` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `code` varchar(190) DEFAULT NULL,
  `typology` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`oo_id`),
  UNIQUE KEY `u_index_code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_store_MAT` (`oo_id`, `code`, `typology`) VALUES
(158,	'CTN',	'N'),
(159,	'SLK',	''),
(160,	'VIS',	'A');

DROP TABLE IF EXISTS `object_store_PRD`;
CREATE TABLE `object_store_PRD` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `sku` varchar(190) DEFAULT NULL,
  `price__value` double DEFAULT NULL,
  `price__unit` varchar(50) DEFAULT NULL,
  `brand` varchar(190) DEFAULT NULL,
  `made_in` varchar(190) DEFAULT NULL,
  `bundlePrice` double DEFAULT NULL,
  PRIMARY KEY (`oo_id`),
  UNIQUE KEY `u_index_sku` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_store_PRD` (`oo_id`, `sku`, `price__value`, `price__unit`, `brand`, `made_in`, `bundlePrice`) VALUES
(162,	'0001',	49.99,	'1',	'9',	'CN',	NULL),
(163,	'0001-AZ',	NULL,	NULL,	'',	NULL,	NULL),
(164,	'0001-BK',	NULL,	NULL,	'',	NULL,	NULL),
(165,	'0001-GR',	NULL,	NULL,	'',	NULL,	NULL),
(166,	'0001-GY',	NULL,	NULL,	'',	NULL,	NULL),
(167,	'0001-PK',	NULL,	NULL,	'',	NULL,	NULL),
(168,	'0001-RD',	NULL,	NULL,	'',	NULL,	NULL),
(169,	'0001-WH',	NULL,	NULL,	'',	NULL,	NULL),
(170,	'0001-YW',	NULL,	NULL,	'',	NULL,	NULL),
(171,	'0002',	19.99,	'1',	'66',	'IT',	NULL),
(172,	'0002-BL',	NULL,	NULL,	'',	NULL,	NULL),
(173,	'0002-LB',	NULL,	NULL,	'',	NULL,	NULL),
(174,	'0002-GY',	NULL,	NULL,	'',	NULL,	NULL),
(175,	'Bundle1',	74.99,	'1',	'',	NULL,	59.99);

DROP TABLE IF EXISTS `object_store_SHO`;
CREATE TABLE `object_store_SHO` (
  `oo_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(190) DEFAULT NULL,
  `phone` varchar(190) DEFAULT NULL,
  `email` varchar(190) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  `street` varchar(190) DEFAULT NULL,
  `zip` varchar(190) DEFAULT NULL,
  `city` varchar(190) DEFAULT NULL,
  `province` varchar(190) DEFAULT NULL,
  `region` varchar(190) DEFAULT NULL,
  `country` varchar(190) DEFAULT NULL,
  `map_location__longitude` double DEFAULT NULL,
  `map_location__latitude` double DEFAULT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `object_store_SHO` (`oo_id`, `name`, `phone`, `email`, `image`, `street`, `zip`, `city`, `province`, `region`, `country`, `map_location__longitude`, `map_location__latitude`) VALUES
(180,	'Rome',	'1234567890',	'rome@shop.test.com',	18,	'Piazza del Colosseo, 1',	'00184 ',	'Roma ',	'RM',	'Lazio',	'IT',	12.491167423298,	41.890224),
(181,	'Paris',	'0987654321',	'paris@shop.test.com',	19,	'Champ de Mars, 5 Avenue Anatole France',	'75007 ',	'Paris',	NULL,	'Île-de-France',	'FR',	2.2978203933222,	48.85614465),
(182,	'London',	'3333333333',	'london@shop.test.com',	20,	'Victoria St, Westminster',	'SW1P 1LT',	'London',	'',	'London',	'GB',	12.491167423298,	41.890224);

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
('pimcore_core',	'20180724144005',	'2020-04-21 10:05:25'),
('pimcore_core',	'20180830113528',	'2020-04-21 10:05:25'),
('pimcore_core',	'20180830122128',	'2020-04-21 10:05:25'),
('pimcore_core',	'20180904201947',	'2020-04-21 10:05:25'),
('pimcore_core',	'20180906142115',	'2020-04-21 10:05:25'),
('pimcore_core',	'20180907115436',	'2020-04-21 10:05:25'),
('pimcore_core',	'20180912140913',	'2020-04-21 10:05:26'),
('pimcore_core',	'20180913132106',	'2020-04-21 10:05:26'),
('pimcore_core',	'20180924111736',	'2020-04-21 10:05:26'),
('pimcore_core',	'20181008132414',	'2020-04-21 10:05:26'),
('pimcore_core',	'20181009135158',	'2020-04-21 10:05:26'),
('pimcore_core',	'20181115114003',	'2020-04-21 10:05:26'),
('pimcore_core',	'20181126094412',	'2020-04-21 10:05:26'),
('pimcore_core',	'20181126144341',	'2020-04-21 10:05:26'),
('pimcore_core',	'20181128074035',	'2020-04-21 10:05:26'),
('pimcore_core',	'20181128112320',	'2020-04-21 10:05:26'),
('pimcore_core',	'20181214145532',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190102143436',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190102153226',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190108131401',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190124105627',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190131074054',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190131095936',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190320133439',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190402073052',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190403120728',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190405112707',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190408084129',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190508074339',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190515130651',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190520151448',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190522130545',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190527121800',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190618154000',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190701141857',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190708175236',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190729085052',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190802090149',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190806160450',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190807121356',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190828142756',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190902085052',	'2020-04-21 10:05:26'),
('pimcore_core',	'20190904154339',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191015131700',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191107141816',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191114123638',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191114132014',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191121150326',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191125135853',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191125200416',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191126130004',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191208175348',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191213115045',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191218073528',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191230103524',	'2020-04-21 10:05:26'),
('pimcore_core',	'20191230104529',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200113120101',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200116181758',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200121095650',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200121131304',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200127102432',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200129102132',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200210101048',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200210164037',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200211115044',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200212130011',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200218104052',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200226102938',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200310122412',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200313092019',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200317163018',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200318100042',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200324141723',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200407120641',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200407132737',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200407145422',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200410112354',	'2020-04-21 10:05:26'),
('pimcore_core',	'20200421142950',	'2020-07-01 14:34:55'),
('pimcore_core',	'20200422090352',	'2020-07-01 14:34:55'),
('pimcore_core',	'20200428082346',	'2020-07-01 14:34:55'),
('pimcore_core',	'20200428111313',	'2020-07-01 14:34:55'),
('pimcore_core',	'20200529121630',	'2020-07-01 14:34:55'),
('pimcore_core',	'20200604110336',	'2020-07-01 14:34:55'),
('pimcore_core',	'20200619071650',	'2021-02-19 20:00:34'),
('pimcore_core',	'20200703093410',	'2021-02-19 20:00:34'),
('pimcore_core',	'20200721123847',	'2021-02-19 20:00:34'),
('pimcore_core',	'20200807105448',	'2021-02-19 20:00:34'),
('pimcore_core',	'20200812160035',	'2021-02-19 20:00:34'),
('pimcore_core',	'20200817133132',	'2021-02-19 20:00:34'),
('pimcore_core',	'20200820151104',	'2021-02-19 20:00:34'),
('pimcore_core',	'20200828091305',	'2021-02-19 20:00:34'),
('pimcore_core',	'20200902111642',	'2021-02-19 20:00:34'),
('pimcore_core',	'20201001133558',	'2021-02-19 20:00:34');

DROP TABLE IF EXISTS `PLEASE_DELETE__locks`;
CREATE TABLE `PLEASE_DELETE__locks` (
  `id` varchar(150) NOT NULL DEFAULT '',
  `date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `plugin_datahub_workspaces_asset`;
CREATE TABLE `plugin_datahub_workspaces_asset` (
  `cid` int(11) unsigned NOT NULL DEFAULT 0,
  `cpath` varchar(765) CHARACTER SET utf8 DEFAULT NULL,
  `configuration` varchar(50) NOT NULL DEFAULT '0',
  `create` tinyint(1) unsigned DEFAULT 0,
  `read` tinyint(1) unsigned DEFAULT 0,
  `update` tinyint(1) unsigned DEFAULT 0,
  `delete` tinyint(1) unsigned DEFAULT 0,
  PRIMARY KEY (`cid`,`configuration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `plugin_datahub_workspaces_document`;
CREATE TABLE `plugin_datahub_workspaces_document` (
  `cid` int(11) unsigned NOT NULL DEFAULT 0,
  `cpath` varchar(765) CHARACTER SET utf8 DEFAULT NULL,
  `configuration` varchar(50) NOT NULL DEFAULT '0',
  `create` tinyint(1) unsigned DEFAULT 0,
  `read` tinyint(1) unsigned DEFAULT 0,
  `update` tinyint(1) unsigned DEFAULT 0,
  `delete` tinyint(1) unsigned DEFAULT 0,
  PRIMARY KEY (`cid`,`configuration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `plugin_datahub_workspaces_object`;
CREATE TABLE `plugin_datahub_workspaces_object` (
  `cid` int(11) unsigned NOT NULL DEFAULT 0,
  `cpath` varchar(765) CHARACTER SET utf8 DEFAULT NULL,
  `configuration` varchar(50) NOT NULL DEFAULT '0',
  `create` tinyint(1) unsigned DEFAULT 0,
  `read` tinyint(1) unsigned DEFAULT 0,
  `update` tinyint(1) unsigned DEFAULT 0,
  `delete` tinyint(1) unsigned DEFAULT 0,
  PRIMARY KEY (`cid`,`configuration`)
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

INSERT INTO `quantityvalue_units` (`id`, `group`, `abbreviation`, `longname`, `baseunit`, `factor`, `conversionOffset`, `reference`, `converter`) VALUES
('1',	NULL,	'€',	'Euro',	NULL,	NULL,	NULL,	NULL,	NULL);

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


DROP TABLE IF EXISTS `settings_store`;
CREATE TABLE `settings_store` (
  `id` varchar(190) NOT NULL DEFAULT '',
  `scope` varchar(190) NOT NULL DEFAULT '',
  `data` longtext DEFAULT NULL,
  `type` enum('bool','int','float','string') NOT NULL DEFAULT 'string',
  PRIMARY KEY (`id`,`scope`),
  KEY `scope` (`scope`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
('thumb_4__e06b3d634d09b24bc5d6ecd8dcafda78',	'image-optimize-queue',	'/Products/Classic T-Shirt/image-thumb__4__pimcore-system-treepreview/Azureblue@2x.jpg',	0,	1621015402,	1621620202);

DROP TABLE IF EXISTS `tracking_events`;
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
('Attributes',	NULL,	'cs',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'de',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'en',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'es',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'fa',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'fr',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'hu',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'it',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'ja',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'nl',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'pl',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'pt_BR',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'ru',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'sk',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'sv',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'sv_FI',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'th',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'tr',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'uk',	'',	1621015387,	1621015387),
('Attributes',	NULL,	'zh_Hans',	'',	1621015387,	1621015387),
('Bundle Price',	NULL,	'cs',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'de',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'en',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'es',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'fa',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'fr',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'hu',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'it',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'ja',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'nl',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'pl',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'pt_BR',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'ru',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'sk',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'sv',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'sv_FI',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'th',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'tr',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'uk',	'',	1621015388,	1621015388),
('Bundle Price',	NULL,	'zh_Hans',	'',	1621015388,	1621015388),
('Bundle Products',	NULL,	'cs',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'de',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'en',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'es',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'fa',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'fr',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'hu',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'it',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'ja',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'nl',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'pl',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'pt_BR',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'ru',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'sk',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'sv',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'sv_FI',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'th',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'tr',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'uk',	'',	1621015390,	1621015390),
('Bundle Products',	NULL,	'zh_Hans',	'',	1621015390,	1621015390),
('CSV Export',	NULL,	'cs',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'de',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'en',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'es',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'fa',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'fr',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'hu',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'it',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'ja',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'nl',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'pl',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'pt_BR',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'ru',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'sk',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'sv',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'sv_FI',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'th',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'tr',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'uk',	'',	1621015386,	1621015386),
('CSV Export',	NULL,	'zh_Hans',	'',	1621015386,	1621015386),
('Categorization',	NULL,	'cs',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'de',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'en',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'es',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'fa',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'fr',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'hu',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'it',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'ja',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'nl',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'pl',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'pt_BR',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'ru',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'sk',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'sv',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'sv_FI',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'th',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'tr',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'uk',	'',	1621015387,	1621015387),
('Categorization',	NULL,	'zh_Hans',	'',	1621015387,	1621015387),
('Category',	NULL,	'cs',	'',	1618936088,	1618936088),
('Category',	NULL,	'de',	'',	1618936088,	1618936088),
('Category',	NULL,	'en',	'',	1618936088,	1618936088),
('Category',	NULL,	'es',	'',	1618936088,	1618936088),
('Category',	NULL,	'fa',	'',	1618936088,	1618936088),
('Category',	NULL,	'fr',	'',	1618936088,	1618936088),
('Category',	NULL,	'hu',	'',	1618936088,	1618936088),
('Category',	NULL,	'it',	'',	1618936088,	1618936088),
('Category',	NULL,	'ja',	'',	1618936088,	1618936088),
('Category',	NULL,	'nl',	'',	1618936088,	1618936088),
('Category',	NULL,	'pl',	'',	1618936088,	1618936088),
('Category',	NULL,	'pt_BR',	'',	1618936088,	1618936088),
('Category',	NULL,	'ru',	'',	1618936088,	1618936088),
('Category',	NULL,	'sk',	'',	1618936088,	1618936088),
('Category',	NULL,	'sv',	'',	1618936088,	1618936088),
('Category',	NULL,	'sv_FI',	'',	1618936088,	1618936088),
('Category',	NULL,	'th',	'',	1618936088,	1618936088),
('Category',	NULL,	'tr',	'',	1618936088,	1618936088),
('Category',	NULL,	'uk',	'',	1618936088,	1618936088),
('Category',	NULL,	'zh_Hans',	'',	1618936088,	1618936088),
('Color',	NULL,	'cs',	'',	1618936089,	1618936089),
('Color',	NULL,	'de',	'',	1618936089,	1618936089),
('Color',	NULL,	'en',	'',	1618936089,	1618936089),
('Color',	NULL,	'es',	'',	1618936089,	1618936089),
('Color',	NULL,	'fa',	'',	1618936089,	1618936089),
('Color',	NULL,	'fr',	'',	1618936089,	1618936089),
('Color',	NULL,	'hu',	'',	1618936089,	1618936089),
('Color',	NULL,	'it',	'',	1618936089,	1618936089),
('Color',	NULL,	'ja',	'',	1618936089,	1618936089),
('Color',	NULL,	'nl',	'',	1618936089,	1618936089),
('Color',	NULL,	'pl',	'',	1618936089,	1618936089),
('Color',	NULL,	'pt_BR',	'',	1618936089,	1618936089),
('Color',	NULL,	'ru',	'',	1618936089,	1618936089),
('Color',	NULL,	'sk',	'',	1618936089,	1618936089),
('Color',	NULL,	'sv',	'',	1618936089,	1618936089),
('Color',	NULL,	'sv_FI',	'',	1618936089,	1618936089),
('Color',	NULL,	'th',	'',	1618936089,	1618936089),
('Color',	NULL,	'tr',	'',	1618936089,	1618936089),
('Color',	NULL,	'uk',	'',	1618936089,	1618936089),
('Color',	NULL,	'zh_Hans',	'',	1618936089,	1618936089),
('Composition',	NULL,	'cs',	'',	1621015387,	1621015387),
('Composition',	NULL,	'de',	'',	1621015387,	1621015387),
('Composition',	NULL,	'en',	'',	1621015387,	1621015387),
('Composition',	NULL,	'es',	'',	1621015387,	1621015387),
('Composition',	NULL,	'fa',	'',	1621015387,	1621015387),
('Composition',	NULL,	'fr',	'',	1621015387,	1621015387),
('Composition',	NULL,	'hu',	'',	1621015387,	1621015387),
('Composition',	NULL,	'it',	'',	1621015387,	1621015387),
('Composition',	NULL,	'ja',	'',	1621015387,	1621015387),
('Composition',	NULL,	'nl',	'',	1621015387,	1621015387),
('Composition',	NULL,	'pl',	'',	1621015387,	1621015387),
('Composition',	NULL,	'pt_BR',	'',	1621015387,	1621015387),
('Composition',	NULL,	'ru',	'',	1621015387,	1621015387),
('Composition',	NULL,	'sk',	'',	1621015387,	1621015387),
('Composition',	NULL,	'sv',	'',	1621015387,	1621015387),
('Composition',	NULL,	'sv_FI',	'',	1621015387,	1621015387),
('Composition',	NULL,	'th',	'',	1621015387,	1621015387),
('Composition',	NULL,	'tr',	'',	1621015387,	1621015387),
('Composition',	NULL,	'uk',	'',	1621015387,	1621015387),
('Composition',	NULL,	'zh_Hans',	'',	1621015387,	1621015387),
('English',	NULL,	'cs',	'',	1621015388,	1621015388),
('English',	NULL,	'de',	'',	1621015388,	1621015388),
('English',	NULL,	'en',	'',	1621015388,	1621015388),
('English',	NULL,	'es',	'',	1621015388,	1621015388),
('English',	NULL,	'fa',	'',	1621015388,	1621015388),
('English',	NULL,	'fr',	'',	1621015388,	1621015388),
('English',	NULL,	'hu',	'',	1621015388,	1621015388),
('English',	NULL,	'it',	'',	1621015388,	1621015388),
('English',	NULL,	'ja',	'',	1621015388,	1621015388),
('English',	NULL,	'nl',	'',	1621015388,	1621015388),
('English',	NULL,	'pl',	'',	1621015388,	1621015388),
('English',	NULL,	'pt_BR',	'',	1621015388,	1621015388),
('English',	NULL,	'ru',	'',	1621015388,	1621015388),
('English',	NULL,	'sk',	'',	1621015388,	1621015388),
('English',	NULL,	'sv',	'',	1621015388,	1621015388),
('English',	NULL,	'sv_FI',	'',	1621015388,	1621015388),
('English',	NULL,	'th',	'',	1621015388,	1621015388),
('English',	NULL,	'tr',	'',	1621015388,	1621015388),
('English',	NULL,	'uk',	'',	1621015388,	1621015388),
('English',	NULL,	'zh_Hans',	'',	1621015388,	1621015388),
('Euro',	NULL,	'cs',	'',	1621015316,	1621015316),
('Euro',	NULL,	'de',	'',	1621015316,	1621015316),
('Euro',	NULL,	'en',	'',	1621015316,	1621015316),
('Euro',	NULL,	'es',	'',	1621015316,	1621015316),
('Euro',	NULL,	'fa',	'',	1621015316,	1621015316),
('Euro',	NULL,	'fr',	'',	1621015316,	1621015316),
('Euro',	NULL,	'hu',	'',	1621015316,	1621015316),
('Euro',	NULL,	'it',	'',	1621015316,	1621015316),
('Euro',	NULL,	'ja',	'',	1621015316,	1621015316),
('Euro',	NULL,	'nl',	'',	1621015316,	1621015316),
('Euro',	NULL,	'pl',	'',	1621015316,	1621015316),
('Euro',	NULL,	'pt_BR',	'',	1621015316,	1621015316),
('Euro',	NULL,	'ru',	'',	1621015316,	1621015316),
('Euro',	NULL,	'sk',	'',	1621015316,	1621015316),
('Euro',	NULL,	'sv',	'',	1621015316,	1621015316),
('Euro',	NULL,	'sv_FI',	'',	1621015316,	1621015316),
('Euro',	NULL,	'th',	'',	1621015316,	1621015316),
('Euro',	NULL,	'tr',	'',	1621015316,	1621015316),
('Euro',	NULL,	'uk',	'',	1621015316,	1621015316),
('Euro',	NULL,	'zh_Hans',	'',	1621015316,	1621015316),
('French',	NULL,	'cs',	'',	1621015389,	1621015389),
('French',	NULL,	'de',	'',	1621015389,	1621015389),
('French',	NULL,	'en',	'',	1621015389,	1621015389),
('French',	NULL,	'es',	'',	1621015389,	1621015389),
('French',	NULL,	'fa',	'',	1621015389,	1621015389),
('French',	NULL,	'fr',	'',	1621015389,	1621015389),
('French',	NULL,	'hu',	'',	1621015389,	1621015389),
('French',	NULL,	'it',	'',	1621015389,	1621015389),
('French',	NULL,	'ja',	'',	1621015389,	1621015389),
('French',	NULL,	'nl',	'',	1621015389,	1621015389),
('French',	NULL,	'pl',	'',	1621015389,	1621015389),
('French',	NULL,	'pt_BR',	'',	1621015389,	1621015389),
('French',	NULL,	'ru',	'',	1621015389,	1621015389),
('French',	NULL,	'sk',	'',	1621015389,	1621015389),
('French',	NULL,	'sv',	'',	1621015389,	1621015389),
('French',	NULL,	'sv_FI',	'',	1621015389,	1621015389),
('French',	NULL,	'th',	'',	1621015389,	1621015389),
('French',	NULL,	'tr',	'',	1621015389,	1621015389),
('French',	NULL,	'uk',	'',	1621015389,	1621015389),
('French',	NULL,	'zh_Hans',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'cs',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'de',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'en',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'es',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'fa',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'fr',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'hu',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'it',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'ja',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'nl',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'pl',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'pt_BR',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'ru',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'sk',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'sv',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'sv_FI',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'th',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'tr',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'uk',	'',	1621015389,	1621015389),
('Greek (Greece)',	NULL,	'zh_Hans',	'',	1621015389,	1621015389),
('Images',	NULL,	'cs',	'',	1621015388,	1621015388),
('Images',	NULL,	'de',	'',	1621015388,	1621015388),
('Images',	NULL,	'en',	'',	1621015388,	1621015388),
('Images',	NULL,	'es',	'',	1621015388,	1621015388),
('Images',	NULL,	'fa',	'',	1621015388,	1621015388),
('Images',	NULL,	'fr',	'',	1621015388,	1621015388),
('Images',	NULL,	'hu',	'',	1621015388,	1621015388),
('Images',	NULL,	'it',	'',	1621015388,	1621015388),
('Images',	NULL,	'ja',	'',	1621015388,	1621015388),
('Images',	NULL,	'nl',	'',	1621015388,	1621015388),
('Images',	NULL,	'pl',	'',	1621015388,	1621015388),
('Images',	NULL,	'pt_BR',	'',	1621015388,	1621015388),
('Images',	NULL,	'ru',	'',	1621015388,	1621015388),
('Images',	NULL,	'sk',	'',	1621015388,	1621015388),
('Images',	NULL,	'sv',	'',	1621015388,	1621015388),
('Images',	NULL,	'sv_FI',	'',	1621015388,	1621015388),
('Images',	NULL,	'th',	'',	1621015388,	1621015388),
('Images',	NULL,	'tr',	'',	1621015388,	1621015388),
('Images',	NULL,	'uk',	'',	1621015388,	1621015388),
('Images',	NULL,	'zh_Hans',	'',	1621015388,	1621015388),
('Italian',	NULL,	'cs',	'',	1621015388,	1621015388),
('Italian',	NULL,	'de',	'',	1621015388,	1621015388),
('Italian',	NULL,	'en',	'',	1621015388,	1621015388),
('Italian',	NULL,	'es',	'',	1621015388,	1621015388),
('Italian',	NULL,	'fa',	'',	1621015388,	1621015388),
('Italian',	NULL,	'fr',	'',	1621015388,	1621015388),
('Italian',	NULL,	'hu',	'',	1621015388,	1621015388),
('Italian',	NULL,	'it',	'',	1621015388,	1621015388),
('Italian',	NULL,	'ja',	'',	1621015388,	1621015388),
('Italian',	NULL,	'nl',	'',	1621015388,	1621015388),
('Italian',	NULL,	'pl',	'',	1621015388,	1621015388),
('Italian',	NULL,	'pt_BR',	'',	1621015388,	1621015388),
('Italian',	NULL,	'ru',	'',	1621015388,	1621015388),
('Italian',	NULL,	'sk',	'',	1621015388,	1621015388),
('Italian',	NULL,	'sv',	'',	1621015388,	1621015388),
('Italian',	NULL,	'sv_FI',	'',	1621015388,	1621015388),
('Italian',	NULL,	'th',	'',	1621015388,	1621015388),
('Italian',	NULL,	'tr',	'',	1621015388,	1621015388),
('Italian',	NULL,	'uk',	'',	1621015388,	1621015388),
('Italian',	NULL,	'zh_Hans',	'',	1621015388,	1621015388),
('Master',	NULL,	'cs',	'',	1621015386,	1621015386),
('Master',	NULL,	'de',	'',	1621015386,	1621015386),
('Master',	NULL,	'en',	'',	1621015386,	1621015386),
('Master',	NULL,	'es',	'',	1621015386,	1621015386),
('Master',	NULL,	'fa',	'',	1621015386,	1621015386),
('Master',	NULL,	'fr',	'',	1621015386,	1621015386),
('Master',	NULL,	'hu',	'',	1621015386,	1621015386),
('Master',	NULL,	'it',	'',	1621015386,	1621015386),
('Master',	NULL,	'ja',	'',	1621015386,	1621015386),
('Master',	NULL,	'nl',	'',	1621015386,	1621015386),
('Master',	NULL,	'pl',	'',	1621015386,	1621015386),
('Master',	NULL,	'pt_BR',	'',	1621015386,	1621015386),
('Master',	NULL,	'ru',	'',	1621015386,	1621015386),
('Master',	NULL,	'sk',	'',	1621015386,	1621015386),
('Master',	NULL,	'sv',	'',	1621015386,	1621015386),
('Master',	NULL,	'sv_FI',	'',	1621015386,	1621015386),
('Master',	NULL,	'th',	'',	1621015386,	1621015386),
('Master',	NULL,	'tr',	'',	1621015386,	1621015386),
('Master',	NULL,	'uk',	'',	1621015386,	1621015386),
('Master',	NULL,	'zh_Hans',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'cs',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'de',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'en',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'es',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'fa',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'fr',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'hu',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'it',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'ja',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'nl',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'pl',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'pt_BR',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'ru',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'sk',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'sv',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'sv_FI',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'th',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'tr',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'uk',	'',	1621015386,	1621015386),
('Master (Admin Mode)',	NULL,	'zh_Hans',	'',	1621015386,	1621015386),
('Material',	NULL,	'cs',	'',	1618936089,	1618936089),
('Material',	NULL,	'de',	'',	1618936089,	1618936089),
('Material',	NULL,	'en',	'',	1618936089,	1618936089),
('Material',	NULL,	'es',	'',	1618936089,	1618936089),
('Material',	NULL,	'fa',	'',	1618936089,	1618936089),
('Material',	NULL,	'fr',	'',	1618936089,	1618936089),
('Material',	NULL,	'hu',	'',	1618936089,	1618936089),
('Material',	NULL,	'it',	'',	1618936089,	1618936089),
('Material',	NULL,	'ja',	'',	1618936089,	1618936089),
('Material',	NULL,	'nl',	'',	1618936089,	1618936089),
('Material',	NULL,	'pl',	'',	1618936089,	1618936089),
('Material',	NULL,	'pt_BR',	'',	1618936089,	1618936089),
('Material',	NULL,	'ru',	'',	1618936089,	1618936089),
('Material',	NULL,	'sk',	'',	1618936089,	1618936089),
('Material',	NULL,	'sv',	'',	1618936089,	1618936089),
('Material',	NULL,	'sv_FI',	'',	1618936089,	1618936089),
('Material',	NULL,	'th',	'',	1618936089,	1618936089),
('Material',	NULL,	'tr',	'',	1618936089,	1618936089),
('Material',	NULL,	'uk',	'',	1618936089,	1618936089),
('Material',	NULL,	'zh_Hans',	'',	1618936089,	1618936089),
('Name and Description',	NULL,	'cs',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'de',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'en',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'es',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'fa',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'fr',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'hu',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'it',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'ja',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'nl',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'pl',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'pt_BR',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'ru',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'sk',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'sv',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'sv_FI',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'th',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'tr',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'uk',	'',	1621015388,	1621015388),
('Name and Description',	NULL,	'zh_Hans',	'',	1621015388,	1621015388),
('Polish',	NULL,	'cs',	'',	1621015389,	1621015389),
('Polish',	NULL,	'de',	'',	1621015389,	1621015389),
('Polish',	NULL,	'en',	'',	1621015389,	1621015389),
('Polish',	NULL,	'es',	'',	1621015389,	1621015389),
('Polish',	NULL,	'fa',	'',	1621015389,	1621015389),
('Polish',	NULL,	'fr',	'',	1621015389,	1621015389),
('Polish',	NULL,	'hu',	'',	1621015389,	1621015389),
('Polish',	NULL,	'it',	'',	1621015389,	1621015389),
('Polish',	NULL,	'ja',	'',	1621015389,	1621015389),
('Polish',	NULL,	'nl',	'',	1621015389,	1621015389),
('Polish',	NULL,	'pl',	'',	1621015389,	1621015389),
('Polish',	NULL,	'pt_BR',	'',	1621015389,	1621015389),
('Polish',	NULL,	'ru',	'',	1621015389,	1621015389),
('Polish',	NULL,	'sk',	'',	1621015389,	1621015389),
('Polish',	NULL,	'sv',	'',	1621015389,	1621015389),
('Polish',	NULL,	'sv_FI',	'',	1621015389,	1621015389),
('Polish',	NULL,	'th',	'',	1621015389,	1621015389),
('Polish',	NULL,	'tr',	'',	1621015389,	1621015389),
('Polish',	NULL,	'uk',	'',	1621015389,	1621015389),
('Polish',	NULL,	'zh_Hans',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'cs',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'de',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'en',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'es',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'fa',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'fr',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'hu',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'it',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'ja',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'nl',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'pl',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'pt_BR',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'ru',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'sk',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'sv',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'sv_FI',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'th',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'tr',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'uk',	'',	1621015389,	1621015389),
('Portuguese',	NULL,	'zh_Hans',	'',	1621015389,	1621015389),
('Price',	NULL,	'cs',	'',	1621015388,	1621015388),
('Price',	NULL,	'de',	'',	1621015388,	1621015388),
('Price',	NULL,	'en',	'',	1621015388,	1621015388),
('Price',	NULL,	'es',	'',	1621015388,	1621015388),
('Price',	NULL,	'fa',	'',	1621015388,	1621015388),
('Price',	NULL,	'fr',	'',	1621015388,	1621015388),
('Price',	NULL,	'hu',	'',	1621015388,	1621015388),
('Price',	NULL,	'it',	'',	1621015388,	1621015388),
('Price',	NULL,	'ja',	'',	1621015388,	1621015388),
('Price',	NULL,	'nl',	'',	1621015388,	1621015388),
('Price',	NULL,	'pl',	'',	1621015388,	1621015388),
('Price',	NULL,	'pt_BR',	'',	1621015388,	1621015388),
('Price',	NULL,	'ru',	'',	1621015388,	1621015388),
('Price',	NULL,	'sk',	'',	1621015388,	1621015388),
('Price',	NULL,	'sv',	'',	1621015388,	1621015388),
('Price',	NULL,	'sv_FI',	'',	1621015388,	1621015388),
('Price',	NULL,	'th',	'',	1621015388,	1621015388),
('Price',	NULL,	'tr',	'',	1621015388,	1621015388),
('Price',	NULL,	'uk',	'',	1621015388,	1621015388),
('Price',	NULL,	'zh_Hans',	'',	1621015388,	1621015388),
('Product',	NULL,	'cs',	'',	1618936089,	1618936089),
('Product',	NULL,	'de',	'',	1618936089,	1618936089),
('Product',	NULL,	'en',	'',	1618936089,	1618936089),
('Product',	NULL,	'es',	'',	1618936089,	1618936089),
('Product',	NULL,	'fa',	'',	1618936089,	1618936089),
('Product',	NULL,	'fr',	'',	1618936089,	1618936089),
('Product',	NULL,	'hu',	'',	1618936089,	1618936089),
('Product',	NULL,	'it',	'',	1618936089,	1618936089),
('Product',	NULL,	'ja',	'',	1618936089,	1618936089),
('Product',	NULL,	'nl',	'',	1618936089,	1618936089),
('Product',	NULL,	'pl',	'',	1618936089,	1618936089),
('Product',	NULL,	'pt_BR',	'',	1618936089,	1618936089),
('Product',	NULL,	'ru',	'',	1618936089,	1618936089),
('Product',	NULL,	'sk',	'',	1618936089,	1618936089),
('Product',	NULL,	'sv',	'',	1618936089,	1618936089),
('Product',	NULL,	'sv_FI',	'',	1618936089,	1618936089),
('Product',	NULL,	'th',	'',	1618936089,	1618936089),
('Product',	NULL,	'tr',	'',	1618936089,	1618936089),
('Product',	NULL,	'uk',	'',	1618936089,	1618936089),
('Product',	NULL,	'zh_Hans',	'',	1618936089,	1618936089),
('Product Data',	NULL,	'cs',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'de',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'en',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'es',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'fa',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'fr',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'hu',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'it',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'ja',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'nl',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'pl',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'pt_BR',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'ru',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'sk',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'sv',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'sv_FI',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'th',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'tr',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'uk',	'',	1621015387,	1621015387),
('Product Data',	NULL,	'zh_Hans',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'cs',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'de',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'en',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'es',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'fa',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'fr',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'hu',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'it',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'ja',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'nl',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'pl',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'pt_BR',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'ru',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'sk',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'sv',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'sv_FI',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'th',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'tr',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'uk',	'',	1621015387,	1621015387),
('Product Information',	NULL,	'zh_Hans',	'',	1621015387,	1621015387),
('Product Name',	NULL,	'cs',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'de',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'en',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'es',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'fa',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'fr',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'hu',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'it',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'ja',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'nl',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'pl',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'pt_BR',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'ru',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'sk',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'sv',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'sv_FI',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'th',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'tr',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'uk',	'',	1621015390,	1621015390),
('Product Name',	NULL,	'zh_Hans',	'',	1621015390,	1621015390),
('SKU',	NULL,	'cs',	'',	1621015388,	1621015388),
('SKU',	NULL,	'de',	'',	1621015388,	1621015388),
('SKU',	NULL,	'en',	'',	1621015388,	1621015388),
('SKU',	NULL,	'es',	'',	1621015388,	1621015388),
('SKU',	NULL,	'fa',	'',	1621015388,	1621015388),
('SKU',	NULL,	'fr',	'',	1621015388,	1621015388),
('SKU',	NULL,	'hu',	'',	1621015388,	1621015388),
('SKU',	NULL,	'it',	'',	1621015388,	1621015388),
('SKU',	NULL,	'ja',	'',	1621015388,	1621015388),
('SKU',	NULL,	'nl',	'',	1621015388,	1621015388),
('SKU',	NULL,	'pl',	'',	1621015388,	1621015388),
('SKU',	NULL,	'pt_BR',	'',	1621015388,	1621015388),
('SKU',	NULL,	'ru',	'',	1621015388,	1621015388),
('SKU',	NULL,	'sk',	'',	1621015388,	1621015388),
('SKU',	NULL,	'sv',	'',	1621015388,	1621015388),
('SKU',	NULL,	'sv_FI',	'',	1621015388,	1621015388),
('SKU',	NULL,	'th',	'',	1621015388,	1621015388),
('SKU',	NULL,	'tr',	'',	1621015388,	1621015388),
('SKU',	NULL,	'uk',	'',	1621015388,	1621015388),
('SKU',	NULL,	'zh_Hans',	'',	1621015388,	1621015388),
('Shop',	NULL,	'cs',	'',	1618936089,	1618936089),
('Shop',	NULL,	'de',	'',	1618936089,	1618936089),
('Shop',	NULL,	'en',	'',	1618936089,	1618936089),
('Shop',	NULL,	'es',	'',	1618936089,	1618936089),
('Shop',	NULL,	'fa',	'',	1618936089,	1618936089),
('Shop',	NULL,	'fr',	'',	1618936089,	1618936089),
('Shop',	NULL,	'hu',	'',	1618936089,	1618936089),
('Shop',	NULL,	'it',	'',	1618936089,	1618936089),
('Shop',	NULL,	'ja',	'',	1618936089,	1618936089),
('Shop',	NULL,	'nl',	'',	1618936089,	1618936089),
('Shop',	NULL,	'pl',	'',	1618936089,	1618936089),
('Shop',	NULL,	'pt_BR',	'',	1618936089,	1618936089),
('Shop',	NULL,	'ru',	'',	1618936089,	1618936089),
('Shop',	NULL,	'sk',	'',	1618936089,	1618936089),
('Shop',	NULL,	'sv',	'',	1618936089,	1618936089),
('Shop',	NULL,	'sv_FI',	'',	1618936089,	1618936089),
('Shop',	NULL,	'th',	'',	1618936089,	1618936089),
('Shop',	NULL,	'tr',	'',	1618936089,	1618936089),
('Shop',	NULL,	'uk',	'',	1618936089,	1618936089),
('Shop',	NULL,	'zh_Hans',	'',	1618936089,	1618936089),
('Short Description',	NULL,	'cs',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'de',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'en',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'es',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'fa',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'fr',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'hu',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'it',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'ja',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'nl',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'pl',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'pt_BR',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'ru',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'sk',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'sv',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'sv_FI',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'th',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'tr',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'uk',	'',	1621015390,	1621015390),
('Short Description',	NULL,	'zh_Hans',	'',	1621015390,	1621015390),
('Spanish',	NULL,	'cs',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'de',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'en',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'es',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'fa',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'fr',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'hu',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'it',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'ja',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'nl',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'pl',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'pt_BR',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'ru',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'sk',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'sv',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'sv_FI',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'th',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'tr',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'uk',	'',	1621015389,	1621015389),
('Spanish',	NULL,	'zh_Hans',	'',	1621015389,	1621015389),
('Translations Completed',	NULL,	'cs',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'de',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'en',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'es',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'fa',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'fr',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'hu',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'it',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'ja',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'nl',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'pl',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'pt_BR',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'ru',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'sk',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'sv',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'sv_FI',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'th',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'tr',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'uk',	'',	1621015390,	1621015390),
('Translations Completed',	NULL,	'zh_Hans',	'',	1621015390,	1621015390),
('XLSX Export',	NULL,	'cs',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'de',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'en',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'es',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'fa',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'fr',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'hu',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'it',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'ja',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'nl',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'pl',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'pt_BR',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'ru',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'sk',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'sv',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'sv_FI',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'th',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'tr',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'uk',	'',	1621015386,	1621015386),
('XLSX Export',	NULL,	'zh_Hans',	'',	1621015386,	1621015386),
('down',	NULL,	'cs',	'',	1621015390,	1621015390),
('down',	NULL,	'de',	'',	1621015390,	1621015390),
('down',	NULL,	'en',	'',	1621015390,	1621015390),
('down',	NULL,	'es',	'',	1621015390,	1621015390),
('down',	NULL,	'fa',	'',	1621015390,	1621015390),
('down',	NULL,	'fr',	'',	1621015390,	1621015390),
('down',	NULL,	'hu',	'',	1621015390,	1621015390),
('down',	NULL,	'it',	'',	1621015390,	1621015390),
('down',	NULL,	'ja',	'',	1621015390,	1621015390),
('down',	NULL,	'nl',	'',	1621015390,	1621015390),
('down',	NULL,	'pl',	'',	1621015390,	1621015390),
('down',	NULL,	'pt_BR',	'',	1621015390,	1621015390),
('down',	NULL,	'ru',	'',	1621015390,	1621015390),
('down',	NULL,	'sk',	'',	1621015390,	1621015390),
('down',	NULL,	'sv',	'',	1621015390,	1621015390),
('down',	NULL,	'sv_FI',	'',	1621015390,	1621015390),
('down',	NULL,	'th',	'',	1621015390,	1621015390),
('down',	NULL,	'tr',	'',	1621015390,	1621015390),
('down',	NULL,	'uk',	'',	1621015390,	1621015390),
('down',	NULL,	'zh_Hans',	'',	1621015390,	1621015390),
('login',	NULL,	'en',	'',	1618935895,	1618935895),
('login',	NULL,	'it',	'',	1618935895,	1618935895),
('up',	NULL,	'cs',	'',	1621015390,	1621015390),
('up',	NULL,	'de',	'',	1621015390,	1621015390),
('up',	NULL,	'en',	'',	1621015390,	1621015390),
('up',	NULL,	'es',	'',	1621015390,	1621015390),
('up',	NULL,	'fa',	'',	1621015390,	1621015390),
('up',	NULL,	'fr',	'',	1621015390,	1621015390),
('up',	NULL,	'hu',	'',	1621015390,	1621015390),
('up',	NULL,	'it',	'',	1621015390,	1621015390),
('up',	NULL,	'ja',	'',	1621015390,	1621015390),
('up',	NULL,	'nl',	'',	1621015390,	1621015390),
('up',	NULL,	'pl',	'',	1621015390,	1621015390),
('up',	NULL,	'pt_BR',	'',	1621015390,	1621015390),
('up',	NULL,	'ru',	'',	1621015390,	1621015390),
('up',	NULL,	'sk',	'',	1621015390,	1621015390),
('up',	NULL,	'sv',	'',	1621015390,	1621015390),
('up',	NULL,	'sv_FI',	'',	1621015390,	1621015390),
('up',	NULL,	'th',	'',	1621015390,	1621015390),
('up',	NULL,	'tr',	'',	1621015390,	1621015390),
('up',	NULL,	'uk',	'',	1621015390,	1621015390),
('up',	NULL,	'zh_Hans',	'',	1621015390,	1621015390),
('€',	NULL,	'cs',	'',	1621015316,	1621015316),
('€',	NULL,	'de',	'',	1621015316,	1621015316),
('€',	NULL,	'en',	'',	1621015316,	1621015316),
('€',	NULL,	'es',	'',	1621015316,	1621015316),
('€',	NULL,	'fa',	'',	1621015316,	1621015316),
('€',	NULL,	'fr',	'',	1621015316,	1621015316),
('€',	NULL,	'hu',	'',	1621015316,	1621015316),
('€',	NULL,	'it',	'',	1621015316,	1621015316),
('€',	NULL,	'ja',	'',	1621015316,	1621015316),
('€',	NULL,	'nl',	'',	1621015316,	1621015316),
('€',	NULL,	'pl',	'',	1621015316,	1621015316),
('€',	NULL,	'pt_BR',	'',	1621015316,	1621015316),
('€',	NULL,	'ru',	'',	1621015316,	1621015316),
('€',	NULL,	'sk',	'',	1621015316,	1621015316),
('€',	NULL,	'sv',	'',	1621015316,	1621015316),
('€',	NULL,	'sv_FI',	'',	1621015316,	1621015316),
('€',	NULL,	'th',	'',	1621015316,	1621015316),
('€',	NULL,	'tr',	'',	1621015316,	1621015316),
('€',	NULL,	'uk',	'',	1621015316,	1621015316),
('€',	NULL,	'zh_Hans',	'',	1621015316,	1621015316);

DROP TABLE IF EXISTS `translations_messages`;
CREATE TABLE `translations_messages` (
  `key` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `type` varchar(10) DEFAULT NULL,
  `language` varchar(10) NOT NULL DEFAULT '',
  `text` text DEFAULT NULL,
  `creationDate` int(11) unsigned DEFAULT NULL,
  `modificationDate` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`key`,`language`),
  KEY `language` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `parentId`, `type`, `name`, `password`, `firstname`, `lastname`, `email`, `language`, `contentLanguages`, `admin`, `active`, `permissions`, `roles`, `welcomescreen`, `closeWarning`, `memorizeTabs`, `allowDirtyClose`, `docTypes`, `classes`, `twoFactorAuthentication`, `activePerspective`, `perspectives`, `websiteTranslationLanguagesEdit`, `websiteTranslationLanguagesView`, `lastLogin`, `keyBindings`) VALUES
(0,	0,	'user',	'system',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(2,	0,	'user',	'admin',	'$2y$10$sJDE7TgaO4W8fdCj0Fje9.6Ybx9Q2vo1bX56PNGlljRcug9e0ES/O',	NULL,	NULL,	NULL,	'en',	NULL,	1,	1,	'',	'',	0,	1,	1,	0,	'',	'',	'null',	NULL,	'',	'',	'',	1621014346,	NULL);

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
('plugin_datahub_config',	''),
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
  `autoSave` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `ctype_cid` (`ctype`,`cid`),
  KEY `date` (`date`),
  KEY `binaryFileHash` (`binaryFileHash`),
  KEY `autoSave` (`autoSave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `webdav_locks`;
CREATE TABLE `webdav_locks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner` varchar(100) DEFAULT NULL,
  `timeout` int(10) unsigned DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `token` varbinary(100) DEFAULT NULL,
  `scope` tinyint(4) DEFAULT NULL,
  `depth` tinyint(4) DEFAULT NULL,
  `uri` varbinary(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`),
  KEY `uri` (`uri`(100))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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


DROP TABLE IF EXISTS `object_localized_CAT_en`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_CAT_en` AS select `object_query_CAT`.`oo_id` AS `oo_id`,`object_query_CAT`.`oo_classId` AS `oo_classId`,`object_query_CAT`.`oo_className` AS `oo_className`,`object_query_CAT`.`code` AS `code`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`en`.`ooo_id` AS `ooo_id`,`en`.`language` AS `language`,`en`.`name` AS `name`,`en`.`description` AS `description` from ((`object_query_CAT` join `objects` on(`objects`.`o_id` = `object_query_CAT`.`oo_id`)) left join `object_localized_query_CAT_en` `en` on(1 and `object_query_CAT`.`oo_id` = `en`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_CAT_es`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_CAT_es` AS select `object_query_CAT`.`oo_id` AS `oo_id`,`object_query_CAT`.`oo_classId` AS `oo_classId`,`object_query_CAT`.`oo_className` AS `oo_className`,`object_query_CAT`.`code` AS `code`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`es`.`ooo_id` AS `ooo_id`,`es`.`language` AS `language`,`es`.`name` AS `name`,`es`.`description` AS `description` from ((`object_query_CAT` join `objects` on(`objects`.`o_id` = `object_query_CAT`.`oo_id`)) left join `object_localized_query_CAT_es` `es` on(1 and `object_query_CAT`.`oo_id` = `es`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_CAT_fr`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_CAT_fr` AS select `object_query_CAT`.`oo_id` AS `oo_id`,`object_query_CAT`.`oo_classId` AS `oo_classId`,`object_query_CAT`.`oo_className` AS `oo_className`,`object_query_CAT`.`code` AS `code`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`fr`.`ooo_id` AS `ooo_id`,`fr`.`language` AS `language`,`fr`.`name` AS `name`,`fr`.`description` AS `description` from ((`object_query_CAT` join `objects` on(`objects`.`o_id` = `object_query_CAT`.`oo_id`)) left join `object_localized_query_CAT_fr` `fr` on(1 and `object_query_CAT`.`oo_id` = `fr`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_CAT_it`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_CAT_it` AS select `object_query_CAT`.`oo_id` AS `oo_id`,`object_query_CAT`.`oo_classId` AS `oo_classId`,`object_query_CAT`.`oo_className` AS `oo_className`,`object_query_CAT`.`code` AS `code`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`it`.`ooo_id` AS `ooo_id`,`it`.`language` AS `language`,`it`.`name` AS `name`,`it`.`description` AS `description` from ((`object_query_CAT` join `objects` on(`objects`.`o_id` = `object_query_CAT`.`oo_id`)) left join `object_localized_query_CAT_it` `it` on(1 and `object_query_CAT`.`oo_id` = `it`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_CAT_pl`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_CAT_pl` AS select `object_query_CAT`.`oo_id` AS `oo_id`,`object_query_CAT`.`oo_classId` AS `oo_classId`,`object_query_CAT`.`oo_className` AS `oo_className`,`object_query_CAT`.`code` AS `code`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`pl`.`ooo_id` AS `ooo_id`,`pl`.`language` AS `language`,`pl`.`name` AS `name`,`pl`.`description` AS `description` from ((`object_query_CAT` join `objects` on(`objects`.`o_id` = `object_query_CAT`.`oo_id`)) left join `object_localized_query_CAT_pl` `pl` on(1 and `object_query_CAT`.`oo_id` = `pl`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_CAT_pt`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_CAT_pt` AS select `object_query_CAT`.`oo_id` AS `oo_id`,`object_query_CAT`.`oo_classId` AS `oo_classId`,`object_query_CAT`.`oo_className` AS `oo_className`,`object_query_CAT`.`code` AS `code`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`pt`.`ooo_id` AS `ooo_id`,`pt`.`language` AS `language`,`pt`.`name` AS `name`,`pt`.`description` AS `description` from ((`object_query_CAT` join `objects` on(`objects`.`o_id` = `object_query_CAT`.`oo_id`)) left join `object_localized_query_CAT_pt` `pt` on(1 and `object_query_CAT`.`oo_id` = `pt`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_MAT_el_GR`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_MAT_el_GR` AS select `object_query_MAT`.`oo_id` AS `oo_id`,`object_query_MAT`.`oo_classId` AS `oo_classId`,`object_query_MAT`.`oo_className` AS `oo_className`,`object_query_MAT`.`code` AS `code`,`object_query_MAT`.`typology` AS `typology`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`el_GR`.`ooo_id` AS `ooo_id`,`el_GR`.`language` AS `language`,`el_GR`.`name` AS `name`,`el_GR`.`description` AS `description` from ((`object_query_MAT` join `objects` on(`objects`.`o_id` = `object_query_MAT`.`oo_id`)) left join `object_localized_query_MAT_el_GR` `el_GR` on(1 and `object_query_MAT`.`oo_id` = `el_GR`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_MAT_en`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_MAT_en` AS select `object_query_MAT`.`oo_id` AS `oo_id`,`object_query_MAT`.`oo_classId` AS `oo_classId`,`object_query_MAT`.`oo_className` AS `oo_className`,`object_query_MAT`.`code` AS `code`,`object_query_MAT`.`typology` AS `typology`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`en`.`ooo_id` AS `ooo_id`,`en`.`language` AS `language`,`en`.`name` AS `name`,`en`.`description` AS `description` from ((`object_query_MAT` join `objects` on(`objects`.`o_id` = `object_query_MAT`.`oo_id`)) left join `object_localized_query_MAT_en` `en` on(1 and `object_query_MAT`.`oo_id` = `en`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_MAT_es`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_MAT_es` AS select `object_query_MAT`.`oo_id` AS `oo_id`,`object_query_MAT`.`oo_classId` AS `oo_classId`,`object_query_MAT`.`oo_className` AS `oo_className`,`object_query_MAT`.`code` AS `code`,`object_query_MAT`.`typology` AS `typology`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`es`.`ooo_id` AS `ooo_id`,`es`.`language` AS `language`,`es`.`name` AS `name`,`es`.`description` AS `description` from ((`object_query_MAT` join `objects` on(`objects`.`o_id` = `object_query_MAT`.`oo_id`)) left join `object_localized_query_MAT_es` `es` on(1 and `object_query_MAT`.`oo_id` = `es`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_MAT_fr`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_MAT_fr` AS select `object_query_MAT`.`oo_id` AS `oo_id`,`object_query_MAT`.`oo_classId` AS `oo_classId`,`object_query_MAT`.`oo_className` AS `oo_className`,`object_query_MAT`.`code` AS `code`,`object_query_MAT`.`typology` AS `typology`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`fr`.`ooo_id` AS `ooo_id`,`fr`.`language` AS `language`,`fr`.`name` AS `name`,`fr`.`description` AS `description` from ((`object_query_MAT` join `objects` on(`objects`.`o_id` = `object_query_MAT`.`oo_id`)) left join `object_localized_query_MAT_fr` `fr` on(1 and `object_query_MAT`.`oo_id` = `fr`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_MAT_it`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_MAT_it` AS select `object_query_MAT`.`oo_id` AS `oo_id`,`object_query_MAT`.`oo_classId` AS `oo_classId`,`object_query_MAT`.`oo_className` AS `oo_className`,`object_query_MAT`.`code` AS `code`,`object_query_MAT`.`typology` AS `typology`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`it`.`ooo_id` AS `ooo_id`,`it`.`language` AS `language`,`it`.`name` AS `name`,`it`.`description` AS `description` from ((`object_query_MAT` join `objects` on(`objects`.`o_id` = `object_query_MAT`.`oo_id`)) left join `object_localized_query_MAT_it` `it` on(1 and `object_query_MAT`.`oo_id` = `it`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_MAT_pl`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_MAT_pl` AS select `object_query_MAT`.`oo_id` AS `oo_id`,`object_query_MAT`.`oo_classId` AS `oo_classId`,`object_query_MAT`.`oo_className` AS `oo_className`,`object_query_MAT`.`code` AS `code`,`object_query_MAT`.`typology` AS `typology`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`pl`.`ooo_id` AS `ooo_id`,`pl`.`language` AS `language`,`pl`.`name` AS `name`,`pl`.`description` AS `description` from ((`object_query_MAT` join `objects` on(`objects`.`o_id` = `object_query_MAT`.`oo_id`)) left join `object_localized_query_MAT_pl` `pl` on(1 and `object_query_MAT`.`oo_id` = `pl`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_MAT_pt`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_MAT_pt` AS select `object_query_MAT`.`oo_id` AS `oo_id`,`object_query_MAT`.`oo_classId` AS `oo_classId`,`object_query_MAT`.`oo_className` AS `oo_className`,`object_query_MAT`.`code` AS `code`,`object_query_MAT`.`typology` AS `typology`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`pt`.`ooo_id` AS `ooo_id`,`pt`.`language` AS `language`,`pt`.`name` AS `name`,`pt`.`description` AS `description` from ((`object_query_MAT` join `objects` on(`objects`.`o_id` = `object_query_MAT`.`oo_id`)) left join `object_localized_query_MAT_pt` `pt` on(1 and `object_query_MAT`.`oo_id` = `pt`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_PRD_el_GR`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_PRD_el_GR` AS select `object_query_PRD`.`oo_id` AS `oo_id`,`object_query_PRD`.`oo_classId` AS `oo_classId`,`object_query_PRD`.`oo_className` AS `oo_className`,`object_query_PRD`.`sku` AS `sku`,`object_query_PRD`.`price__value` AS `price__value`,`object_query_PRD`.`price__unit` AS `price__unit`,`object_query_PRD`.`brand` AS `brand`,`object_query_PRD`.`made_in` AS `made_in`,`object_query_PRD`.`category__id` AS `category__id`,`object_query_PRD`.`category__type` AS `category__type`,`object_query_PRD`.`materials` AS `materials`,`object_query_PRD`.`color__id` AS `color__id`,`object_query_PRD`.`color__type` AS `color__type`,`object_query_PRD`.`bundle_products` AS `bundle_products`,`object_query_PRD`.`bundlePrice` AS `bundlePrice`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`el_GR`.`ooo_id` AS `ooo_id`,`el_GR`.`language` AS `language`,`el_GR`.`name` AS `name`,`el_GR`.`short_description` AS `short_description`,`el_GR`.`description` AS `description`,`el_GR`.`translationCompleted` AS `translationCompleted` from ((`object_query_PRD` join `objects` on(`objects`.`o_id` = `object_query_PRD`.`oo_id`)) left join `object_localized_query_PRD_el_GR` `el_GR` on(1 and `object_query_PRD`.`oo_id` = `el_GR`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_PRD_en`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_PRD_en` AS select `object_query_PRD`.`oo_id` AS `oo_id`,`object_query_PRD`.`oo_classId` AS `oo_classId`,`object_query_PRD`.`oo_className` AS `oo_className`,`object_query_PRD`.`sku` AS `sku`,`object_query_PRD`.`price__value` AS `price__value`,`object_query_PRD`.`price__unit` AS `price__unit`,`object_query_PRD`.`brand` AS `brand`,`object_query_PRD`.`made_in` AS `made_in`,`object_query_PRD`.`category__id` AS `category__id`,`object_query_PRD`.`category__type` AS `category__type`,`object_query_PRD`.`materials` AS `materials`,`object_query_PRD`.`color__id` AS `color__id`,`object_query_PRD`.`color__type` AS `color__type`,`object_query_PRD`.`bundle_products` AS `bundle_products`,`object_query_PRD`.`bundlePrice` AS `bundlePrice`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`en`.`ooo_id` AS `ooo_id`,`en`.`language` AS `language`,`en`.`name` AS `name`,`en`.`short_description` AS `short_description`,`en`.`description` AS `description`,`en`.`translationCompleted` AS `translationCompleted` from ((`object_query_PRD` join `objects` on(`objects`.`o_id` = `object_query_PRD`.`oo_id`)) left join `object_localized_query_PRD_en` `en` on(1 and `object_query_PRD`.`oo_id` = `en`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_PRD_es`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_PRD_es` AS select `object_query_PRD`.`oo_id` AS `oo_id`,`object_query_PRD`.`oo_classId` AS `oo_classId`,`object_query_PRD`.`oo_className` AS `oo_className`,`object_query_PRD`.`sku` AS `sku`,`object_query_PRD`.`price__value` AS `price__value`,`object_query_PRD`.`price__unit` AS `price__unit`,`object_query_PRD`.`brand` AS `brand`,`object_query_PRD`.`made_in` AS `made_in`,`object_query_PRD`.`category__id` AS `category__id`,`object_query_PRD`.`category__type` AS `category__type`,`object_query_PRD`.`materials` AS `materials`,`object_query_PRD`.`color__id` AS `color__id`,`object_query_PRD`.`color__type` AS `color__type`,`object_query_PRD`.`bundle_products` AS `bundle_products`,`object_query_PRD`.`bundlePrice` AS `bundlePrice`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`es`.`ooo_id` AS `ooo_id`,`es`.`language` AS `language`,`es`.`name` AS `name`,`es`.`short_description` AS `short_description`,`es`.`description` AS `description`,`es`.`translationCompleted` AS `translationCompleted` from ((`object_query_PRD` join `objects` on(`objects`.`o_id` = `object_query_PRD`.`oo_id`)) left join `object_localized_query_PRD_es` `es` on(1 and `object_query_PRD`.`oo_id` = `es`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_PRD_fr`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_PRD_fr` AS select `object_query_PRD`.`oo_id` AS `oo_id`,`object_query_PRD`.`oo_classId` AS `oo_classId`,`object_query_PRD`.`oo_className` AS `oo_className`,`object_query_PRD`.`sku` AS `sku`,`object_query_PRD`.`price__value` AS `price__value`,`object_query_PRD`.`price__unit` AS `price__unit`,`object_query_PRD`.`brand` AS `brand`,`object_query_PRD`.`made_in` AS `made_in`,`object_query_PRD`.`category__id` AS `category__id`,`object_query_PRD`.`category__type` AS `category__type`,`object_query_PRD`.`materials` AS `materials`,`object_query_PRD`.`color__id` AS `color__id`,`object_query_PRD`.`color__type` AS `color__type`,`object_query_PRD`.`bundle_products` AS `bundle_products`,`object_query_PRD`.`bundlePrice` AS `bundlePrice`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`fr`.`ooo_id` AS `ooo_id`,`fr`.`language` AS `language`,`fr`.`name` AS `name`,`fr`.`short_description` AS `short_description`,`fr`.`description` AS `description`,`fr`.`translationCompleted` AS `translationCompleted` from ((`object_query_PRD` join `objects` on(`objects`.`o_id` = `object_query_PRD`.`oo_id`)) left join `object_localized_query_PRD_fr` `fr` on(1 and `object_query_PRD`.`oo_id` = `fr`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_PRD_it`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_PRD_it` AS select `object_query_PRD`.`oo_id` AS `oo_id`,`object_query_PRD`.`oo_classId` AS `oo_classId`,`object_query_PRD`.`oo_className` AS `oo_className`,`object_query_PRD`.`sku` AS `sku`,`object_query_PRD`.`price__value` AS `price__value`,`object_query_PRD`.`price__unit` AS `price__unit`,`object_query_PRD`.`brand` AS `brand`,`object_query_PRD`.`made_in` AS `made_in`,`object_query_PRD`.`category__id` AS `category__id`,`object_query_PRD`.`category__type` AS `category__type`,`object_query_PRD`.`materials` AS `materials`,`object_query_PRD`.`color__id` AS `color__id`,`object_query_PRD`.`color__type` AS `color__type`,`object_query_PRD`.`bundle_products` AS `bundle_products`,`object_query_PRD`.`bundlePrice` AS `bundlePrice`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`it`.`ooo_id` AS `ooo_id`,`it`.`language` AS `language`,`it`.`name` AS `name`,`it`.`short_description` AS `short_description`,`it`.`description` AS `description`,`it`.`translationCompleted` AS `translationCompleted` from ((`object_query_PRD` join `objects` on(`objects`.`o_id` = `object_query_PRD`.`oo_id`)) left join `object_localized_query_PRD_it` `it` on(1 and `object_query_PRD`.`oo_id` = `it`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_PRD_pl`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_PRD_pl` AS select `object_query_PRD`.`oo_id` AS `oo_id`,`object_query_PRD`.`oo_classId` AS `oo_classId`,`object_query_PRD`.`oo_className` AS `oo_className`,`object_query_PRD`.`sku` AS `sku`,`object_query_PRD`.`price__value` AS `price__value`,`object_query_PRD`.`price__unit` AS `price__unit`,`object_query_PRD`.`brand` AS `brand`,`object_query_PRD`.`made_in` AS `made_in`,`object_query_PRD`.`category__id` AS `category__id`,`object_query_PRD`.`category__type` AS `category__type`,`object_query_PRD`.`materials` AS `materials`,`object_query_PRD`.`color__id` AS `color__id`,`object_query_PRD`.`color__type` AS `color__type`,`object_query_PRD`.`bundle_products` AS `bundle_products`,`object_query_PRD`.`bundlePrice` AS `bundlePrice`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`pl`.`ooo_id` AS `ooo_id`,`pl`.`language` AS `language`,`pl`.`name` AS `name`,`pl`.`short_description` AS `short_description`,`pl`.`description` AS `description`,`pl`.`translationCompleted` AS `translationCompleted` from ((`object_query_PRD` join `objects` on(`objects`.`o_id` = `object_query_PRD`.`oo_id`)) left join `object_localized_query_PRD_pl` `pl` on(1 and `object_query_PRD`.`oo_id` = `pl`.`ooo_id`));

DROP TABLE IF EXISTS `object_localized_PRD_pt`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_localized_PRD_pt` AS select `object_query_PRD`.`oo_id` AS `oo_id`,`object_query_PRD`.`oo_classId` AS `oo_classId`,`object_query_PRD`.`oo_className` AS `oo_className`,`object_query_PRD`.`sku` AS `sku`,`object_query_PRD`.`price__value` AS `price__value`,`object_query_PRD`.`price__unit` AS `price__unit`,`object_query_PRD`.`brand` AS `brand`,`object_query_PRD`.`made_in` AS `made_in`,`object_query_PRD`.`category__id` AS `category__id`,`object_query_PRD`.`category__type` AS `category__type`,`object_query_PRD`.`materials` AS `materials`,`object_query_PRD`.`color__id` AS `color__id`,`object_query_PRD`.`color__type` AS `color__type`,`object_query_PRD`.`bundle_products` AS `bundle_products`,`object_query_PRD`.`bundlePrice` AS `bundlePrice`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount`,`pt`.`ooo_id` AS `ooo_id`,`pt`.`language` AS `language`,`pt`.`name` AS `name`,`pt`.`short_description` AS `short_description`,`pt`.`description` AS `description`,`pt`.`translationCompleted` AS `translationCompleted` from ((`object_query_PRD` join `objects` on(`objects`.`o_id` = `object_query_PRD`.`oo_id`)) left join `object_localized_query_PRD_pt` `pt` on(1 and `object_query_PRD`.`oo_id` = `pt`.`ooo_id`));

DROP TABLE IF EXISTS `object_MAT`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_MAT` AS select `object_query_MAT`.`oo_id` AS `oo_id`,`object_query_MAT`.`oo_classId` AS `oo_classId`,`object_query_MAT`.`oo_className` AS `oo_className`,`object_query_MAT`.`code` AS `code`,`object_query_MAT`.`typology` AS `typology`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount` from (`object_query_MAT` join `objects` on(`objects`.`o_id` = `object_query_MAT`.`oo_id`));

DROP TABLE IF EXISTS `object_PRD`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_PRD` AS select `object_query_PRD`.`oo_id` AS `oo_id`,`object_query_PRD`.`oo_classId` AS `oo_classId`,`object_query_PRD`.`oo_className` AS `oo_className`,`object_query_PRD`.`sku` AS `sku`,`object_query_PRD`.`price__value` AS `price__value`,`object_query_PRD`.`price__unit` AS `price__unit`,`object_query_PRD`.`brand` AS `brand`,`object_query_PRD`.`made_in` AS `made_in`,`object_query_PRD`.`category__id` AS `category__id`,`object_query_PRD`.`category__type` AS `category__type`,`object_query_PRD`.`materials` AS `materials`,`object_query_PRD`.`color__id` AS `color__id`,`object_query_PRD`.`color__type` AS `color__type`,`object_query_PRD`.`bundle_products` AS `bundle_products`,`object_query_PRD`.`bundlePrice` AS `bundlePrice`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount` from (`object_query_PRD` join `objects` on(`objects`.`o_id` = `object_query_PRD`.`oo_id`));

DROP TABLE IF EXISTS `object_SHO`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `object_SHO` AS select `object_query_SHO`.`oo_id` AS `oo_id`,`object_query_SHO`.`oo_classId` AS `oo_classId`,`object_query_SHO`.`oo_className` AS `oo_className`,`object_query_SHO`.`name` AS `name`,`object_query_SHO`.`phone` AS `phone`,`object_query_SHO`.`email` AS `email`,`object_query_SHO`.`image` AS `image`,`object_query_SHO`.`street` AS `street`,`object_query_SHO`.`zip` AS `zip`,`object_query_SHO`.`city` AS `city`,`object_query_SHO`.`province` AS `province`,`object_query_SHO`.`region` AS `region`,`object_query_SHO`.`country` AS `country`,`object_query_SHO`.`map_location__longitude` AS `map_location__longitude`,`object_query_SHO`.`map_location__latitude` AS `map_location__latitude`,`objects`.`o_id` AS `o_id`,`objects`.`o_parentId` AS `o_parentId`,`objects`.`o_type` AS `o_type`,`objects`.`o_key` AS `o_key`,`objects`.`o_path` AS `o_path`,`objects`.`o_index` AS `o_index`,`objects`.`o_published` AS `o_published`,`objects`.`o_creationDate` AS `o_creationDate`,`objects`.`o_modificationDate` AS `o_modificationDate`,`objects`.`o_userOwner` AS `o_userOwner`,`objects`.`o_userModification` AS `o_userModification`,`objects`.`o_classId` AS `o_classId`,`objects`.`o_className` AS `o_className`,`objects`.`o_childrenSortBy` AS `o_childrenSortBy`,`objects`.`o_childrenSortOrder` AS `o_childrenSortOrder`,`objects`.`o_versionCount` AS `o_versionCount` from (`object_query_SHO` join `objects` on(`objects`.`o_id` = `object_query_SHO`.`oo_id`));

-- 2021-05-14 18:03:56
