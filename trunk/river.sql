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
# Table structure for table rv_user
#

CREATE TABLE `rv_user` (
  `id` int(11) NOT NULL auto_increment,
  `info` text,
  `addtime` int(11) default '0',
  `nickname` varchar(50) default '0',
  `truename` varchar(10) default '0',
  `amount` float(6,2) default NULL,
  `maxdeviaceid` int(2) default '0',
  `email` varchar(50) default '0',
  `password` varchar(16) default '0',
  PRIMARY KEY  (`id`),
  KEY `email` (`email`,`amount`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

#
# Dumping data for table rv_user
#

INSERT INTO `rv_user` VALUES (9,NULL,1312431227,'中文','0',0,0,'a','1');
INSERT INTO `rv_user` VALUES (11,NULL,1312431250,'nickname 去','0',0,0,'b','2');
INSERT INTO `rv_user` VALUES (13,'a:1:{s:5:\"today\";s:4:\"5.10\";}',1312431269,'nickname  谢谢','0',3047,0,'u13','13');
INSERT INTO `rv_user` VALUES (19,'a:1:{s:5:\"today\";s:5:\"49.00\";}',1312468243,'年看你们','0',1802.8,0,'email ','4');

#
# Table structure for table rv_wallet_count
#

CREATE TABLE `rv_wallet_count` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) default '0',
  `addtime` int(11) default '0',
  `amount` float(6,2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Dumping data for table rv_wallet_count
#

INSERT INTO `rv_wallet_count` VALUES (1,0,0,9999.99);

#
# Table structure for table rv_wallet_input_history
#

CREATE TABLE `rv_wallet_input_history` (
  `id` int(11) NOT NULL auto_increment,
  `input` varchar(40) default '0',
  `times` int(3) default '0',
  `info` text,
  PRIMARY KEY  (`id`),
  KEY `tag` (`input`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

#
# Dumping data for table rv_wallet_input_history
#


#
# Table structure for table rv_wallet_keyword
#

CREATE TABLE `rv_wallet_keyword` (
  `id` int(11) NOT NULL auto_increment,
  `word` varchar(20) default '0',
  `addtime` int(11) default '0',
  `info` text,
  PRIMARY KEY  (`id`),
  KEY `tag` (`word`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

#
# Dumping data for table rv_wallet_keyword
#

INSERT INTO `rv_wallet_keyword` VALUES (135,'地铁',1313976961,'a:4:{s:4:\"name\";s:6:\"地铁\";s:4:\"aigo\";a:5:{i:1;i:0;i:2;i:0;i:3;i:100;i:4;i:0;i:5;i:0;}s:5:\"count\";a:5:{i:1;i:0;i:2;i:0;i:3;i:18;i:4;i:0;i:5;i:0;}s:2:\"id\";s:3:\"135\";}');
INSERT INTO `rv_wallet_keyword` VALUES (136,'过期蛋挞',1313131632,'a:4:{s:4:\"name\";s:12:\"过期蛋挞\";s:4:\"aigo\";a:5:{i:1;i:80;i:2;i:20;i:3;i:0;i:4;i:0;i:5;i:0;}s:5:\"count\";a:5:{i:1;i:4;i:2;i:1;i:3;i:0;i:4;i:0;i:5;i:0;}s:2:\"id\";s:3:\"136\";}');
INSERT INTO `rv_wallet_keyword` VALUES (137,'卡夫饼干',1313149660,'a:4:{s:4:\"name\";s:12:\"卡夫饼干\";s:4:\"aigo\";a:5:{i:1;i:100;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:0;}s:5:\"count\";a:5:{i:1;i:6;i:2;i:0;i:3;i:0;i:4;i:0;i:5;i:0;}s:2:\"id\";s:3:\"137\";}');
INSERT INTO `rv_wallet_keyword` VALUES (138,'公交',1313945866,'a:4:{s:4:\"name\";s:6:\"公交\";s:4:\"aigo\";a:5:{i:1;i:0;i:2;i:0;i:3;i:100;i:4;i:0;i:5;i:0;}s:5:\"count\";a:5:{i:1;i:0;i:2;i:0;i:3;i:107;i:4;i:0;i:5;i:0;}s:2:\"id\";s:3:\"138\";}');

#
# Table structure for table rv_wallet_limit
#

CREATE TABLE `rv_wallet_limit` (
  `id` int(11) NOT NULL auto_increment,
  `amount_now` float(8,2) default '0.00',
  `ratio` float(6,2) default '0.00',
  `userid` int(11) default '0',
  `name` varchar(30) default '0',
  `startdate` int(11) default NULL,
  `enddate` int(11) default NULL,
  `amount_predict` float(8,2) default '0.00',
  `addtime` int(11) default '0',
  `info` text,
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`,`enddate`,`startdate`,`ratio`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

#
# Dumping data for table rv_wallet_limit
#

INSERT INTO `rv_wallet_limit` VALUES (9,2627.1,131.35,13,'0',20110811,20110824,2000,1313890674,'a:3:{s:12:\"average_past\";d:238.81999999999999317878973670303821563720703125;s:12:\"average_left\";d:-209.030000000000001136868377216160297393798828125;s:12:\"average_goal\";d:142.849999999999994315658113919198513031005859375;}');
INSERT INTO `rv_wallet_limit` VALUES (10,2627.1,87.57,13,'0',20110810,20110825,3000,1313890632,'a:3:{s:12:\"average_past\";d:218.919999999999987494447850622236728668212890625;s:12:\"average_left\";d:93.219999999999998863131622783839702606201171875;s:12:\"average_goal\";d:187.5;}');
INSERT INTO `rv_wallet_limit` VALUES (13,2622,874,13,'0',20110813,20110821,300,1313376966,'a:3:{s:12:\"average_past\";d:327.75;s:12:\"average_left\";i:-2322;s:12:\"average_goal\";d:33.3299999999999982946974341757595539093017578125;}');
INSERT INTO `rv_wallet_limit` VALUES (16,5.1,8.5,13,'0',20110822,20110828,60,1313901025,'a:3:{s:12:\"average_past\";d:5.089999999999999857891452847979962825775146484375;s:12:\"average_left\";d:7.839999999999999857891452847979962825775146484375;s:12:\"average_goal\";d:8.57000000000000028421709430404007434844970703125;}');
INSERT INTO `rv_wallet_limit` VALUES (19,2577.2,99.12,13,'0',20110821,20110828,2600,1313909456,'a:3:{s:12:\"average_past\";d:2577.19000000000005456968210637569427490234375;s:12:\"average_left\";d:3.25;s:12:\"average_goal\";i:325;}');
INSERT INTO `rv_wallet_limit` VALUES (20,0,0,19,'0',20110822,20110828,400,1313938219,NULL);
INSERT INTO `rv_wallet_limit` VALUES (21,49,11.4,19,'0',20110821,20110828,430,1313938234,'a:3:{s:12:\"average_past\";i:49;s:12:\"average_left\";d:47.61999999999999744204615126363933086395263671875;s:12:\"average_goal\";d:53.75;}');

#
# Table structure for table rv_wallet_tag
#

CREATE TABLE `rv_wallet_tag` (
  `id` int(11) NOT NULL auto_increment,
  `tag` varchar(20) default '0',
  `addtime` int(11) default '0',
  `wid` int(11) NOT NULL default '0',
  `uid` int(11) NOT NULL default '0',
  `thedate` int(11) default '0',
  PRIMARY KEY  (`id`),
  KEY `tag` (`tag`),
  KEY `uid` (`uid`,`tag`)
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=utf8;

#
# Dumping data for table rv_wallet_tag
#

INSERT INTO `rv_wallet_tag` VALUES (153,'花生米',1313927384,394,13,20110821);
INSERT INTO `rv_wallet_tag` VALUES (154,'卡夫',1313929620,395,13,20110821);
INSERT INTO `rv_wallet_tag` VALUES (155,'太平',1313929620,395,13,20110821);
INSERT INTO `rv_wallet_tag` VALUES (156,'饼干',1313929620,395,13,20110821);
INSERT INTO `rv_wallet_tag` VALUES (161,'公交',1313933847,401,13,20110821);
INSERT INTO `rv_wallet_tag` VALUES (162,'卷',1313934168,402,13,20110821);
INSERT INTO `rv_wallet_tag` VALUES (163,'饼',1313934168,402,13,20110821);
INSERT INTO `rv_wallet_tag` VALUES (164,'大行',1313934225,403,13,20110821);
INSERT INTO `rv_wallet_tag` VALUES (165,'招商',1313934225,403,13,20110821);
INSERT INTO `rv_wallet_tag` VALUES (166,'车',1313934225,403,13,20110821);
INSERT INTO `rv_wallet_tag` VALUES (168,'粉丝',1313938892,405,19,20110821);
INSERT INTO `rv_wallet_tag` VALUES (169,'水',1313940354,406,13,20110821);
INSERT INTO `rv_wallet_tag` VALUES (170,'苹果',1313940507,407,19,20110821);
INSERT INTO `rv_wallet_tag` VALUES (171,'橘子',1313940516,408,19,20110821);
INSERT INTO `rv_wallet_tag` VALUES (173,'香蕉',1313940547,410,19,20110821);
INSERT INTO `rv_wallet_tag` VALUES (175,'葡萄',1313940589,412,19,20110821);
INSERT INTO `rv_wallet_tag` VALUES (176,'火龙果',1313940601,413,19,20110821);
INSERT INTO `rv_wallet_tag` VALUES (179,'公交',1313945866,417,13,20110822);
INSERT INTO `rv_wallet_tag` VALUES (181,'地铁',1313976961,419,13,20110822);
INSERT INTO `rv_wallet_tag` VALUES (183,'过期',1313983904,421,13,20110822);
INSERT INTO `rv_wallet_tag` VALUES (184,'蛋糕',1313983904,421,13,20110822);

#
# Table structure for table rv_wallet_vary
#

CREATE TABLE `rv_wallet_vary` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) default '0',
  `thedate` char(8) default '0',
  `addtime` int(11) default '0',
  `thing` varchar(50) default '0',
  `category` int(5) default '0',
  `amount` float(6,2) default '0.00',
  `tags` varchar(200) default '0',
  `comment` text,
  `sync` varchar(1) default '0',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`,`category`)
) ENGINE=MyISAM AUTO_INCREMENT=422 DEFAULT CHARSET=utf8;

#
# Dumping data for table rv_wallet_vary
#

INSERT INTO `rv_wallet_vary` VALUES (11,9,'0',123,'士力架2',0,16.91,'0','','0');
INSERT INTO `rv_wallet_vary` VALUES (28,9,'0',1312421474,'公交',0,2,'0','','0');
INSERT INTO `rv_wallet_vary` VALUES (29,9,'0',1312421490,'地铁2',0,6,'0','','0');
INSERT INTO `rv_wallet_vary` VALUES (30,9,'0',1312466643,'包子',0,3.6,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (38,9,'0',1312511125,'鸡蛋',0,11,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (39,9,'0',1312511142,'卡夫饼干',0,11.9,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (40,9,'0',1312511156,'公交',0,0.8,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (41,9,'0',1312511169,'地铁',0,6,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (42,0,'0',1312689922,'地铁',0,6,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (43,0,'0',1312689946,'公交',0,1.2,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (44,0,'0',1312689970,'苏氏牛肉面*2',0,24,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (45,9,'0',1312689981,'羊肉泡馍',0,40,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (80,13,'0',1312737100,'鸡蛋',0,22,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (81,13,'0',1312737118,'士力架',0,16.9,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (82,13,'0',1312737140,'卡夫饼干',0,13.5,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (83,13,'0',1312737151,'卡夫饼干',0,13.9,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (84,13,'0',1312737165,'苏氏牛肉面*2',0,24,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (85,13,'0',1312737178,'羊肉泡馍*2',0,40,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (86,13,'0',1312737404,'地铁',0,18,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (87,13,'0',1312737416,'公交',0,10,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (88,13,'0',1312737425,'馒头',0,3.3,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (89,13,'0',1312737439,'牛肉',0,8.7,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (111,13,'0',1312767722,'鸡蛋',0,11,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (114,13,'0',1312767778,'地铁',0,2,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (115,13,'0',1312770699,'笔记本散热器',0,89,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (126,13,'0',1312775907,'士力架',0,16.9,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (137,13,'0',1312776089,'代收货',0,1,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (167,19,'0',1312784577,'nook color',0,1150,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (180,19,'0',1312795740,'骗小女孩',0,500,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (183,19,'0',1312795889,'鸡蛋',0,10.8,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (184,19,'0',1312797085,'南方黑芝麻糊',0,15.6,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (190,13,'0',1312808764,'米饭',0,2.5,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (196,13,'0',1312808939,'芝麻糊',0,-15,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (197,13,'0',1312809028,'橘子',0,2.3,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (198,13,'0',1312809038,'面条',0,3.5,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (199,13,'0',1312809053,'咖啡',0,96.5,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (202,13,'0',1312859170,'卡夫饼干',0,11.9,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (204,13,'0',1312859217,'过期蛋挞',0,6,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (205,13,'0',1312859236,'公交',0,0.8,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (210,19,'0',1312941667,'炒鸡蛋',0,8,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (211,19,'0',1312941669,'煎鸡蛋',0,10.8,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (212,19,'0',1312941672,'公交',0,0.4,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (213,19,'0',1312941675,'鸡蛋',0,11,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (214,19,'0',1312941678,'士力架',0,16.9,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (215,19,'0',1312941681,'炒鸡蛋',0,8,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (216,19,'0',1312941683,'煎鸡蛋',0,10.8,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (217,19,'0',1312941686,'修眼镜',0,0.5,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (218,13,'0',1312941701,'公交',0,0.4,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (219,13,'0',1312941704,'地铁',0,2,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (224,13,'0',1312987926,'公交',0,0.4,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (225,13,'0',1313041416,'公交',0,0.8,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (226,13,'0',1313041420,'过期蛋挞',0,6,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (227,13,'0',1313043386,'馒头',0,3.3,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (228,13,'0',1313043397,'猪肝',0,5.9,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (229,13,'0',1313112825,'公交',0,0.4,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (230,13,'0',1313112831,'地铁',0,2,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (239,19,'0',1313200063,'鸡蛋',0,11,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (335,13,'20110815',1313404045,'出租',0,31,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (336,13,'20110817',1313545377,'地铁',3,8,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (337,13,'20110817',1313545380,'地铁',3,2,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (338,13,'20110817',1313545390,'蛋糕',0,3.3,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (339,13,'20110818',1313655570,'公交',3,0.6,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (340,13,'20110818',1313655574,'地铁',3,2,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (341,13,'20110818',1313678675,'公交',3,0.6,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (342,13,'20110819',1313684314,'公交',3,0.4,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (343,13,'20110819',1313684322,'地铁',3,2,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (356,13,'20110821',1313898681,'卷饼',0,4,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (359,13,'20110821',1313901087,'过期面包',0,8,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (360,13,'20110821',1313901097,'过期果汁',0,9.9,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (361,13,'20110821',1313901156,'饼干',0,2.9,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (394,13,'20110821',1313927384,'花生米',0,9.9,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (395,13,'20110821',1313929619,'卡夫 太平 饼干',0,6,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (401,13,'20110821',1313933847,'公交',3,0.4,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (402,13,'20110821',1313934168,'卷 饼',0,4,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (403,13,'20110821',1313934225,'大行 招商 车',0,2525,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (405,19,'20110821',1313938892,'粉丝',0,4.5,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (406,13,'20110821',1313940354,'水',0,2,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (407,19,'20110821',1313940507,'苹果',0,0.5,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (408,19,'20110821',1313940516,'橘子',0,20,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (410,19,'20110821',1313940547,'香蕉',0,4,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (412,19,'20110821',1313940589,'葡萄',0,5,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (413,19,'20110821',1313940601,'火龙果',0,15,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (417,13,'20110822',1313945866,'公交',3,0.4,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (419,13,'20110822',1313976961,'地铁',3,2,'0',NULL,'0');
INSERT INTO `rv_wallet_vary` VALUES (421,13,'20110822',1313983904,'过期 蛋糕',0,2.7,'0',NULL,'0');

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
