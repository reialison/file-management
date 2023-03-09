/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dsm1

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-03-09 10:57:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `afm_activitylogs`
-- ----------------------------
DROP TABLE IF EXISTS `afm_activitylogs`;
CREATE TABLE `afm_activitylogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext,
  `userID` int(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of afm_activitylogs
-- ----------------------------
INSERT INTO `afm_activitylogs` VALUES ('1', 'Successfully logged in.', '1', '2023-03-09 10:44:11');
INSERT INTO `afm_activitylogs` VALUES ('2', 'Successfully logged in.', '1', '2023-03-09 10:44:47');
INSERT INTO `afm_activitylogs` VALUES ('3', 'Successfully logged in.', '1', '2023-03-09 10:45:22');
INSERT INTO `afm_activitylogs` VALUES ('4', 'Successfully logged in.', '1', '2023-03-09 10:47:47');
INSERT INTO `afm_activitylogs` VALUES ('5', 'Updated info for user admin', '1', '2023-03-09 10:47:53');
INSERT INTO `afm_activitylogs` VALUES ('6', 'Updated info for user admin', '1', '2023-03-09 10:55:49');
INSERT INTO `afm_activitylogs` VALUES ('7', 'Updated script settings.', '1', '2023-03-09 10:57:39');

-- ----------------------------
-- Table structure for `afm_categories`
-- ----------------------------
DROP TABLE IF EXISTS `afm_categories`;
CREATE TABLE `afm_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `userID` int(20) DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of afm_categories
-- ----------------------------

-- ----------------------------
-- Table structure for `afm_downloads`
-- ----------------------------
DROP TABLE IF EXISTS `afm_downloads`;
CREATE TABLE `afm_downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idFile` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `size` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of afm_downloads
-- ----------------------------

-- ----------------------------
-- Table structure for `afm_extensions`
-- ----------------------------
DROP TABLE IF EXISTS `afm_extensions`;
CREATE TABLE `afm_extensions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of afm_extensions
-- ----------------------------
INSERT INTO `afm_extensions` VALUES ('1', '2023-03-09 10:43:40', 'AVI');
INSERT INTO `afm_extensions` VALUES ('2', '2023-03-09 10:43:40', 'BMP');
INSERT INTO `afm_extensions` VALUES ('3', '2023-03-09 10:43:40', 'BSH');
INSERT INTO `afm_extensions` VALUES ('4', '2023-03-09 10:43:40', 'C');
INSERT INTO `afm_extensions` VALUES ('5', '2023-03-09 10:43:40', 'CC');
INSERT INTO `afm_extensions` VALUES ('6', '2023-03-09 10:43:40', 'CPP');
INSERT INTO `afm_extensions` VALUES ('7', '2023-03-09 10:43:40', 'CS');
INSERT INTO `afm_extensions` VALUES ('8', '2023-03-09 10:43:40', 'CSH');
INSERT INTO `afm_extensions` VALUES ('9', '2023-03-09 10:43:40', 'CSS');
INSERT INTO `afm_extensions` VALUES ('10', '2023-03-09 10:43:40', 'CV');
INSERT INTO `afm_extensions` VALUES ('11', '2023-03-09 10:43:40', 'CYC');
INSERT INTO `afm_extensions` VALUES ('12', '2023-03-09 10:43:40', 'DOC');
INSERT INTO `afm_extensions` VALUES ('13', '2023-03-09 10:43:40', 'GIF');
INSERT INTO `afm_extensions` VALUES ('14', '2023-03-09 10:43:40', 'HTM');
INSERT INTO `afm_extensions` VALUES ('15', '2023-03-09 10:43:40', 'HTML');
INSERT INTO `afm_extensions` VALUES ('16', '2023-03-09 10:43:40', 'JAVA');
INSERT INTO `afm_extensions` VALUES ('17', '2023-03-09 10:43:40', 'JPEG');
INSERT INTO `afm_extensions` VALUES ('18', '2023-03-09 10:43:40', 'JPG');
INSERT INTO `afm_extensions` VALUES ('19', '2023-03-09 10:43:40', 'JS');
INSERT INTO `afm_extensions` VALUES ('20', '2023-03-09 10:43:40', 'M');
INSERT INTO `afm_extensions` VALUES ('21', '2023-03-09 10:43:40', 'MOV');
INSERT INTO `afm_extensions` VALUES ('22', '2023-03-09 10:43:40', 'MP3');
INSERT INTO `afm_extensions` VALUES ('23', '2023-03-09 10:43:40', 'MP4');
INSERT INTO `afm_extensions` VALUES ('24', '2023-03-09 10:43:40', 'MXML');
INSERT INTO `afm_extensions` VALUES ('25', '2023-03-09 10:43:40', 'PDF');
INSERT INTO `afm_extensions` VALUES ('26', '2023-03-09 10:43:40', 'PERL');
INSERT INTO `afm_extensions` VALUES ('27', '2023-03-09 10:43:40', 'PHP');
INSERT INTO `afm_extensions` VALUES ('28', '2023-03-09 10:43:40', 'PL');
INSERT INTO `afm_extensions` VALUES ('29', '2023-03-09 10:43:40', 'PM');
INSERT INTO `afm_extensions` VALUES ('30', '2023-03-09 10:43:40', 'PNG');
INSERT INTO `afm_extensions` VALUES ('31', '2023-03-09 10:43:40', 'PY');
INSERT INTO `afm_extensions` VALUES ('32', '2023-03-09 10:43:40', 'RAR');
INSERT INTO `afm_extensions` VALUES ('33', '2023-03-09 10:43:40', 'RB');
INSERT INTO `afm_extensions` VALUES ('34', '2023-03-09 10:43:40', 'SH');
INSERT INTO `afm_extensions` VALUES ('35', '2023-03-09 10:43:40', 'SQL');
INSERT INTO `afm_extensions` VALUES ('36', '2023-03-09 10:43:40', 'TXT');
INSERT INTO `afm_extensions` VALUES ('37', '2023-03-09 10:43:40', 'VB');
INSERT INTO `afm_extensions` VALUES ('38', '2023-03-09 10:43:40', 'WMA');
INSERT INTO `afm_extensions` VALUES ('39', '2023-03-09 10:43:40', 'WMV');
INSERT INTO `afm_extensions` VALUES ('40', '2023-03-09 10:43:40', 'XHTML');
INSERT INTO `afm_extensions` VALUES ('41', '2023-03-09 10:43:40', 'XLS');
INSERT INTO `afm_extensions` VALUES ('42', '2023-03-09 10:43:40', 'XLSX');
INSERT INTO `afm_extensions` VALUES ('43', '2023-03-09 10:43:40', 'XML');
INSERT INTO `afm_extensions` VALUES ('44', '2023-03-09 10:43:40', 'XSL');
INSERT INTO `afm_extensions` VALUES ('45', '2023-03-09 10:43:40', 'ZIP');

-- ----------------------------
-- Table structure for `afm_files`
-- ----------------------------
DROP TABLE IF EXISTS `afm_files`;
CREATE TABLE `afm_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `size` double DEFAULT NULL,
  `extension` varchar(20) DEFAULT NULL,
  `userID` int(20) DEFAULT NULL,
  `catID` int(20) DEFAULT NULL,
  `dateUploaded` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of afm_files
-- ----------------------------

-- ----------------------------
-- Table structure for `afm_folders`
-- ----------------------------
DROP TABLE IF EXISTS `afm_folders`;
CREATE TABLE `afm_folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` datetime DEFAULT NULL,
  `parentID` int(20) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of afm_folders
-- ----------------------------
INSERT INTO `afm_folders` VALUES ('1', '2023-03-09 10:43:40', '0', 'uploads');

-- ----------------------------
-- Table structure for `afm_messages`
-- ----------------------------
DROP TABLE IF EXISTS `afm_messages`;
CREATE TABLE `afm_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fileID` int(20) NOT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of afm_messages
-- ----------------------------

-- ----------------------------
-- Table structure for `afm_settings`
-- ----------------------------
DROP TABLE IF EXISTS `afm_settings`;
CREATE TABLE `afm_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notify_delete` int(20) DEFAULT '2',
  `notify_upload` int(20) DEFAULT '2',
  `notify_edit` int(20) DEFAULT '2',
  `notify_email` varchar(255) DEFAULT 'reialison@pointonesolutions.com.ph',
  `allow_registrations` tinyint(5) NOT NULL DEFAULT '2' COMMENT '1 - allow 2 - dont allow',
  `public_directory` tinyint(5) NOT NULL DEFAULT '2' COMMENT '1 - enabled 2 - disabled',
  `auto_approve` tinyint(5) NOT NULL DEFAULT '2' COMMENT '1 - auto 2 - manual',
  `require_login_download` tinyint(5) NOT NULL DEFAULT '2',
  `auto_create_user_folder` tinyint(5) NOT NULL DEFAULT '2',
  `extensions` varchar(255) DEFAULT '',
  `upload_dirs` varchar(255) DEFAULT '',
  `quota` int(11) DEFAULT '0',
  `filesize` int(11) DEFAULT '0',
  `email_from_name` varchar(200) DEFAULT 'Rei Alison',
  `email_from_email` varchar(200) DEFAULT 'reialison@pointonesolutions.com.ph',
  `smtp_protocol` enum('php_mail','sendmail','smtp') NOT NULL DEFAULT 'php_mail',
  `smtp_port` varchar(200) DEFAULT '',
  `smtp_password` varchar(200) DEFAULT '',
  `smtp_username` varchar(200) DEFAULT '',
  `smtp_server` varchar(200) DEFAULT '',
  `sendmail_path` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of afm_settings
-- ----------------------------
INSERT INTO `afm_settings` VALUES ('1', '2', '2', '2', 'admin@something.com', '2', '2', '2', '2', '2', '', '', '0', '0', 'Rei Alison', 'reialison@pointonesolutions.com.ph', 'php_mail', '', '', '', '', '');

-- ----------------------------
-- Table structure for `afm_users`
-- ----------------------------
DROP TABLE IF EXISTS `afm_users`;
CREATE TABLE `afm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreated` datetime DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `extensions` varchar(255) DEFAULT NULL,
  `quota` double DEFAULT NULL,
  `filesize` double DEFAULT NULL,
  `active` tinyint(5) DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `accesslevel` varchar(255) DEFAULT NULL,
  `upload_dir` varchar(255) NOT NULL DEFAULT 'uploads',
  `upload_dirs` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of afm_users
-- ----------------------------
INSERT INTO `afm_users` VALUES ('1', '2023-03-09 10:43:40', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'reialison@pointonesolutions.com.ph', 'AVI,BMP,BSH,C,CC,CPP,CS,CSH,CSS,CV,CYC,DOC,GIF,HTM,HTML,JAVA,JPEG,JPG,JS,M,MOV,MP3,MP4,MXML,PDF,PERL,PHP,PL,PM,PNG,PY,RAR,RB,SH,SQL,TXT,VB,WMA,WMV,XHTML,XLS,XLSX,XML,XSL,ZIP', '10000', '10000', '1', '2023-03-09 10:47:47', 'abcdefghijklmnopqrstuvwxyz', 'uploads', '1');
