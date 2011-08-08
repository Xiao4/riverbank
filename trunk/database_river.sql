# MySQL-Front 3.2  (Build 14.3)

/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='SYSTEM' */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;


# Host: localhost    Database: river
# ------------------------------------------------------
# Server version 5.0.90-community-nt

DROP DATABASE IF EXISTS `river`;
CREATE DATABASE `river` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `river`;

#
# Table structure for table message
#

CREATE TABLE `message` (
  `id` int(11) NOT NULL auto_increment,
  `addtime` int(11) default '0',
  `method` varchar(50) default '0',
  `content` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

#
# Dumping data for table message
#

INSERT INTO `message` VALUES (9,1312431227,'email ',NULL);
INSERT INTO `message` VALUES (11,1312431250,'email ',NULL);
INSERT INTO `message` VALUES (13,1312431269,'email ',NULL);
INSERT INTO `message` VALUES (19,1312468243,'email ',NULL);

#
# Table structure for table sys_date
#

CREATE TABLE `sys_date` (
  `id` int(11) NOT NULL auto_increment,
  `starttime` int(11) default '0',
  `type` varchar(5) default '0',
  `dateid` int(2) default NULL,
  `endtime` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

#
# Dumping data for table sys_date
#

INSERT INTO `sys_date` VALUES (9,1312431227,'1',NULL,0);
INSERT INTO `sys_date` VALUES (11,1312431250,'2',NULL,0);
INSERT INTO `sys_date` VALUES (13,1312431269,'13',NULL,0);
INSERT INTO `sys_date` VALUES (19,1312468243,'4',NULL,0);

#
# Table structure for table user
#

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `addtime` int(11) default '0',
  `nickname` varchar(50) default '0',
  `truename` varchar(10) default '0',
  `amount` float(6,2) default NULL,
  `maxdeviaceid` int(2) default '0',
  `email` varchar(50) default '0',
  `password` varchar(16) default '0',
  `userid` int(1) default NULL,
  PRIMARY KEY  (`id`),
  KEY `email` (`email`,`amount`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

#
# Dumping data for table user
#

INSERT INTO `user` VALUES (9,1312431227,'中文','0',0,0,'email ','1',NULL);
INSERT INTO `user` VALUES (11,1312431250,'nickname 去','0',0,0,'email ','2',NULL);
INSERT INTO `user` VALUES (13,1312431269,'nickname  谢谢','0',290.2,0,'u13','13',NULL);
INSERT INTO `user` VALUES (19,1312468243,'年看你们','0',1779.6,0,'email ','4',NULL);

#
# Table structure for table user_category
#

CREATE TABLE `user_category` (
  `id` int(11) NOT NULL auto_increment,
  `addtime` int(11) default '0',
  `nickname` varchar(50) default '0',
  `truename` varchar(10) default '0',
  `amount` float(6,2) default NULL,
  `maxdeviaceid` int(2) default '0',
  `email` varchar(50) default '0',
  `password` varchar(16) default '0',
  `userid` int(1) default NULL,
  PRIMARY KEY  (`id`),
  KEY `email` (`email`,`amount`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

#
# Dumping data for table user_category
#

INSERT INTO `user_category` VALUES (9,1312431227,'中文','0',0,0,'email ','1',NULL);
INSERT INTO `user_category` VALUES (11,1312431250,'nickname 去','0',0,0,'email ','2',NULL);
INSERT INTO `user_category` VALUES (13,1312431269,'nickname  谢谢','0',0,0,'u13','13',NULL);
INSERT INTO `user_category` VALUES (19,1312468243,'年看你们','0',0,0,'email ','4',NULL);

#
# Table structure for table user_sum
#

CREATE TABLE `user_sum` (
  `id` int(11) NOT NULL auto_increment,
  `addtime` int(11) default '0',
  `sumname` varchar(20) default '0',
  `amount` float(6,2) default NULL,
  `comment` varchar(50) default '0',
  `userid` int(1) default NULL,
  PRIMARY KEY  (`id`),
  KEY `email` (`amount`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

#
# Dumping data for table user_sum
#

INSERT INTO `user_sum` VALUES (9,1312431227,'中文',0,'1',NULL);
INSERT INTO `user_sum` VALUES (11,1312431250,'nickname 去',0,'2',NULL);
INSERT INTO `user_sum` VALUES (13,1312431269,'nickname  谢谢',0,'13',NULL);
INSERT INTO `user_sum` VALUES (19,1312468243,'年看你们',0,'4',NULL);

#
# Table structure for table wallet_sum
#

CREATE TABLE `wallet_sum` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) default '0',
  `addtime` int(11) default '0',
  `amount` float(6,2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Dumping data for table wallet_sum
#

INSERT INTO `wallet_sum` VALUES (1,0,0,9999.99);

#
# Table structure for table wallet_tag
#

CREATE TABLE `wallet_tag` (
  `id` int(11) NOT NULL auto_increment,
  `tag` varchar(20) default '0',
  `addtime` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Dumping data for table wallet_tag
#

INSERT INTO `wallet_tag` VALUES (1,'0',0);

#
# Table structure for table wallet_tag_item
#

CREATE TABLE `wallet_tag_item` (
  `id` int(11) NOT NULL auto_increment,
  `tag` varchar(20) default '0',
  `addtime` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Dumping data for table wallet_tag_item
#

INSERT INTO `wallet_tag_item` VALUES (1,'0',0);

#
# Table structure for table wallet_vary
#

CREATE TABLE `wallet_vary` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) default '0',
  `addtime` int(11) default '0',
  `thing` varchar(50) default '0',
  `category` int(5) default '0',
  `amount` float(6,2) default '0.00',
  `tags` varchar(200) default '0',
  `comment` text,
  `sync` varchar(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=utf8;

#
# Dumping data for table wallet_vary
#

INSERT INTO `wallet_vary` VALUES (11,9,123,'士力架2',0,16.91,'0','','0');
INSERT INTO `wallet_vary` VALUES (28,9,1312421474,'公交',0,2,'0','','0');
INSERT INTO `wallet_vary` VALUES (29,9,1312421490,'地铁2',0,6,'0','','0');
INSERT INTO `wallet_vary` VALUES (30,9,1312466643,'包子',0,3.6,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (38,9,1312511125,'鸡蛋',0,11,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (39,9,1312511142,'卡夫饼干',0,11.9,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (40,9,1312511156,'公交',0,0.8,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (41,9,1312511169,'地铁',0,6,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (42,0,1312689922,'地铁',0,6,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (43,0,1312689946,'公交',0,1.2,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (44,0,1312689970,'苏氏牛肉面*2',0,24,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (45,9,1312689981,'羊肉泡馍',0,40,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (80,13,1312737100,'鸡蛋',0,22,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (81,13,1312737118,'士力架',0,16.9,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (82,13,1312737140,'卡夫饼干',0,13.5,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (83,13,1312737151,'卡夫饼干',0,13.9,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (84,13,1312737165,'苏氏牛肉面*2',0,24,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (85,13,1312737178,'羊肉泡馍*2',0,40,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (86,13,1312737404,'地铁',0,18,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (87,13,1312737416,'公交',0,10,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (88,13,1312737425,'馒头',0,3.3,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (89,13,1312737439,'牛肉',0,8.7,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (111,13,1312767722,'鸡蛋',0,11,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (114,13,1312767778,'地铁',0,2,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (115,13,1312770699,'笔记本散热器',0,89,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (126,13,1312775907,'士力架',0,16.9,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (137,13,1312776089,'代收货',0,1,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (152,19,1312781575,'nimei',0,20,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (153,19,1312781590,'ok',0,3,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (154,19,1312781591,'nidaye',0,15,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (155,19,1312781672,'xiaojj',0,30,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (157,19,1312782236,'tamei',0,20.1,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (165,19,1312783473,'nidaye',0,15,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (167,19,1312784577,'nook color',0,1150,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (168,19,1312784620,'中文不好看吧',0,0.1,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (180,19,1312795740,'骗小女孩',0,500,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (183,19,1312795889,'鸡蛋',0,10.8,'0',NULL,'0');
INSERT INTO `wallet_vary` VALUES (184,19,1312797085,'南方黑芝麻糊',0,15.6,'0',NULL,'0');

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
