-- MySQL dump 10.13  Distrib 5.5.40, for linux2.6 (x86_64)
--
-- Host: localhost    Database: bmw_xdl
-- ------------------------------------------------------
-- Server version	5.5.40-log

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
-- Table structure for table `xdl_arrange`
--

DROP TABLE IF EXISTS `xdl_arrange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_arrange` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `carId` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` set('0','1','2','3') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_arrange`
--

LOCK TABLES `xdl_arrange` WRITE;
/*!40000 ALTER TABLE `xdl_arrange` DISABLE KEYS */;
INSERT INTO `xdl_arrange` VALUES (1,1,'2015-03-16','1,3'),(2,2,'2015-03-16','0,3'),(3,0,'2015-03-19','0'),(4,0,'2015-03-21','0'),(5,21,'2015-03-27','1');
/*!40000 ALTER TABLE `xdl_arrange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_auth_group`
--

DROP TABLE IF EXISTS `xdl_auth_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_auth_group`
--

LOCK TABLES `xdl_auth_group` WRITE;
/*!40000 ALTER TABLE `xdl_auth_group` DISABLE KEYS */;
INSERT INTO `xdl_auth_group` VALUES (1,'超级管理员',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99'),(2,'管理员',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99'),(3,'客服',1,'1,2,3,4,5,6,7,8,9,10,17,23,32,33,34,35,36,37,38,39,54,89,98');
/*!40000 ALTER TABLE `xdl_auth_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_auth_group_access`
--

DROP TABLE IF EXISTS `xdl_auth_group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_auth_group_access` (
  `uid` int(8) unsigned NOT NULL,
  `group_id` int(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_auth_group_access`
--

LOCK TABLES `xdl_auth_group_access` WRITE;
/*!40000 ALTER TABLE `xdl_auth_group_access` DISABLE KEYS */;
INSERT INTO `xdl_auth_group_access` VALUES (1,1),(2,2),(4,2),(5,3),(6,2),(9,3);
/*!40000 ALTER TABLE `xdl_auth_group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_auth_rule`
--

DROP TABLE IF EXISTS `xdl_auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_auth_rule`
--

LOCK TABLES `xdl_auth_rule` WRITE;
/*!40000 ALTER TABLE `xdl_auth_rule` DISABLE KEYS */;
INSERT INTO `xdl_auth_rule` VALUES (1,'Login/index','登陆首页',1,1,''),(2,'Login/doLogin','处理登陆',1,1,''),(3,'Login/logout','退出',1,1,''),(4,'Layout/layout','父模板',1,1,''),(5,'Index/main','首页',1,1,''),(6,'Vip/index','修改密码',1,1,''),(7,'Vip/mod','处理修改',1,1,''),(8,'Vip/checkPassword','验证密码',1,1,''),(75,'Models/brandList','品牌列表',1,1,''),(76,'Models/addBrand','添加品牌',1,1,''),(77,'Models/checkBrand','检查品牌是否存在',1,1,''),(78,'Models/insertBrand','处理插入品牌',1,1,''),(79,'Models/delBrand','删除品牌',1,1,''),(9,'Tech/index','技师页面',1,1,''),(10,'Tech/updateTime','修改时间',1,1,''),(11,'AutoReply/index','自动回复首页',1,1,''),(12,'AutoReply/mod','修改自动回复',1,1,''),(13,'AutoReply/domod','处理修改',1,1,''),(14,'AutoReply/add','添加自动回复',1,1,''),(15,'AutoReply/insert','插入数据库',1,1,''),(16,'AutoReply/del','删除',1,1,''),(17,'Combo/comboList','套餐列表',1,1,''),(18,'Combo/delCombo','删除套餐',1,1,''),(19,'Combo/modCombo','修改套餐',1,1,''),(20,'Combo/updateCombo','处理修改',1,1,''),(21,'Combo/addCombo','添加套餐',1,1,''),(22,'Combo/insertCombo','插入',1,1,''),(23,'Combo/priceList','价格列表',1,1,''),(24,'Combo/modPrice','修改价格',1,1,''),(25,'Combo/updatePrice','处理修改价格',1,1,''),(26,'Combo/addPrice','添加价格',1,1,''),(27,'Combo/insertPrice','插入数据',1,1,''),(28,'Combo/selectSerie','选择车系',1,1,''),(29,'Combo/selectType','选择车型',1,1,''),(30,'Customer/userList','用户列表',1,1,''),(31,'Customer/wechat','微信用户',1,1,''),(32,'Order/index','订单首页',1,1,''),(33,'Order/cancel','取消页面',1,1,''),(34,'Order/mod','修改',1,1,''),(35,'Order/updateOrder','更新数据',1,1,''),(36,'Order/cancelOrder','取消订单',1,1,''),(37,'Order/del','删除订单',1,1,''),(38,'Order/pass','审核',1,1,''),(39,'Order/modLastPrice','修改最终价格',1,1,''),(40,'Manage/set','设置',1,1,''),(41,'Manage/updateSet','修改设置',1,1,''),(42,'Manage/onOff','开关',1,1,''),(43,'Manage/updateSwitch','修改开关',1,1,''),(44,'Manage/myList','订单列表',1,1,''),(45,'Manage/add','添加订单',1,1,''),(46,'Manage/insert','插入数据',1,1,''),(47,'Manage/able','禁用启用',1,1,''),(48,'Manage/checkName','检查名字',1,1,''),(49,'Manage/mod','修改',1,1,''),(50,'Manage/doMod','处理修改',1,1,''),(51,'Manage/auth','权限',1,1,''),(52,'Manage/authMod','修改权限',1,1,''),(53,'ServerCar/carList','服务车列表',1,1,''),(54,'ServerCar/storeCarList','4S店配置',1,1,''),(55,'ServerCar/storeList','4S列表',1,1,''),(56,'ServerCar/addStore','添加4S店',1,1,''),(57,'ServerCar/insertStore','处理添加',1,1,''),(58,'ServerCar/modStore','修改4S店',1,1,''),(59,'ServerCar/updateStore','修改4S店',1,1,''),(60,'ServerCar/delStore','删除4S店',1,1,''),(61,'ServerCar/serverCarList','服务车列表',1,1,''),(62,'ServerCar/addServerCar','添加服务车',1,1,''),(63,'ServerCar/insertServerCar','处理添加服务车',1,1,''),(64,'ServerCar/modServerCar','修改服务车',1,1,''),(65,'ServerCar/updateServerCar','处理修改服务车信息',1,1,''),(66,'ServerCar/delServerCar','删除服务车信息',1,1,''),(67,'ServerCar/check','ajax检查',1,1,''),(68,'ServerCar/checkName','检查名字',1,1,''),(69,'ServerCar/selectServiceman','选择技师',1,1,''),(70,'ServerCar/insertServiceman','插入数据',1,1,''),(71,'ServerCar/servicemanList','技师列表',1,1,''),(72,'ServerCar/mod','修改',1,1,''),(73,'ServerCar/doMod','处理修改',1,1,''),(74,'ServerCar/able','禁用或启用',1,1,''),(80,'Models/modBrand','修改品牌',1,1,''),(81,'Models/updateBrand','修改品牌',1,1,''),(82,'Models/seriesList','车系列表',1,1,''),(83,'Models/addSeries','添加车系',1,1,''),(84,'Models/insertSeries','插入车系',1,1,''),(85,'Models/modSeries','修改车系',1,1,''),(86,'Models/updateSeries','修改车系',1,1,''),(87,'Models/seriesCheck','检查车系',1,1,''),(88,'Models/delSeries','删除车系',1,1,''),(89,'Models/typesList','车型列表',1,1,''),(90,'Models/addTypes','添加车型',1,1,''),(91,'Models/getSeries','获得车系',1,1,''),(92,'Models/insertType','插入车型',1,1,''),(93,'Models/checkTypes','检查车型',1,1,''),(94,'Models/modTypes','修改车型',1,1,''),(95,'Models/updateType','更新车型',1,1,''),(96,'Models/delType','删除车型',1,1,''),(97,'ServerCar/addServiceman','添加技师',1,1,''),(98,'ServerCar/insert','选择技师',1,1,''),(99,'ServerCar/storeCheck','检测4S店是否存在',1,1,'');
/*!40000 ALTER TABLE `xdl_auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_brand`
--

DROP TABLE IF EXISTS `xdl_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_brand`
--

LOCK TABLES `xdl_brand` WRITE;
/*!40000 ALTER TABLE `xdl_brand` DISABLE KEYS */;
INSERT INTO `xdl_brand` VALUES (1,'宝马');
/*!40000 ALTER TABLE `xdl_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_city`
--

DROP TABLE IF EXISTS `xdl_city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `province` varchar(20) NOT NULL COMMENT '省份名称',
  `city` varchar(20) NOT NULL COMMENT '城市名称',
  `county` varchar(20) NOT NULL COMMENT '县的名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_city`
--

LOCK TABLES `xdl_city` WRITE;
/*!40000 ALTER TABLE `xdl_city` DISABLE KEYS */;
INSERT INTO `xdl_city` VALUES (1,'北京','北京','昌平区'),(2,'北京','北京','朝阳区'),(3,'上海','上海','虹桥');
/*!40000 ALTER TABLE `xdl_city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_combo`
--

DROP TABLE IF EXISTS `xdl_combo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_combo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_combo`
--

LOCK TABLES `xdl_combo` WRITE;
/*!40000 ALTER TABLE `xdl_combo` DISABLE KEYS */;
INSERT INTO `xdl_combo` VALUES (1,'机油机率'),(2,'微尘滤清器'),(4,'后部制动盘及制动片'),(5,'前部制动片'),(6,'前部制动盘及制动片'),(7,'火花塞'),(8,'车辆检查'),(12,'后部制动盘及制动片');
/*!40000 ALTER TABLE `xdl_combo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_customer`
--

DROP TABLE IF EXISTS `xdl_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户的id',
  `telephone` char(11) NOT NULL COMMENT '登录手机号',
  `name` varchar(25) NOT NULL COMMENT '姓名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_customer`
--

LOCK TABLES `xdl_customer` WRITE;
/*!40000 ALTER TABLE `xdl_customer` DISABLE KEYS */;
INSERT INTO `xdl_customer` VALUES (1,'13245678901','张三'),(2,'13245678901','李四'),(3,'13245678901','王五'),(4,'13245678901','二麻子'),(5,'13245678901','狗蛋'),(9,'15670691243','谢谢'),(10,'13641144289','或小城'),(11,'15638080805',''),(12,'15175060448',''),(13,'18612631805','');
/*!40000 ALTER TABLE `xdl_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_evaluate`
--

DROP TABLE IF EXISTS `xdl_evaluate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_evaluate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `time` int(10) NOT NULL,
  `grade` enum('4','3','2','1','0') NOT NULL,
  `orderId` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_evaluate`
--

LOCK TABLES `xdl_evaluate` WRITE;
/*!40000 ALTER TABLE `xdl_evaluate` DISABLE KEYS */;
INSERT INTO `xdl_evaluate` VALUES (1,'哈哈',1454345432,'2',1212,1);
/*!40000 ALTER TABLE `xdl_evaluate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_manager`
--

DROP TABLE IF EXISTS `xdl_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '人员的id',
  `name` varchar(50) NOT NULL COMMENT '工作人员名称',
  `password` char(32) NOT NULL COMMENT '登录后台密码',
  `telephone` char(11) NOT NULL,
  `auth` enum('0','1','2') NOT NULL DEFAULT '2' COMMENT '权限',
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '后台人员的状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_manager`
--

LOCK TABLES `xdl_manager` WRITE;
/*!40000 ALTER TABLE `xdl_manager` DISABLE KEYS */;
INSERT INTO `xdl_manager` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','15670691243','0','0'),(2,'root','827ccb0eea8a706c4c34a16891f84e7b','15670691243','1','0'),(4,'dxx','827ccb0eea8a706c4c34a16891f84e7b','15670691243','2','0'),(5,'zxj','827ccb0eea8a706c4c34a16891f84e7b','15670691243','2','0'),(6,'kefu','827ccb0eea8a706c4c34a16891f84e7b','13456789098','2','0'),(9,'yuruian','b0663f6630af12fabc58d6f6a013f556','15670691243','2','0');
/*!40000 ALTER TABLE `xdl_manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_models`
--

DROP TABLE IF EXISTS `xdl_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_models` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'è½¦åž‹id',
  `brand` varchar(100) NOT NULL COMMENT 'è½¦çš„å“ç‰Œ',
  `series` varchar(100) NOT NULL COMMENT 'è½¦ç³»',
  `types` varchar(100) NOT NULL COMMENT 'è½¦åž‹',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_models`
--

LOCK TABLES `xdl_models` WRITE;
/*!40000 ALTER TABLE `xdl_models` DISABLE KEYS */;
INSERT INTO `xdl_models` VALUES (1,'宝马','BMW 1系 两厢轿车','116i'),(2,'宝马','BMW 1系 两厢轿车','118i'),(3,'宝马','BMW 1系 两厢轿车','125i'),(4,'宝马','BMW 1系 两厢轿车(2011年之前上市)','120i'),(5,'宝马','BMW 1系 两厢轿车(2011年之前上市)','130i'),(6,'宝马','BMW 2系 双门轿车','220i'),(7,'宝马','BMW 3系 GT','320i'),(8,'宝马','BMW 3系 GT','328i'),(9,'宝马','BMW 3系 GT','335i'),(10,'宝马','BMW 3系 敞篷轿跑车','325i'),(11,'宝马','BMW 3系 敞篷轿跑车','330i'),(12,'宝马','BMW 3系 敞篷轿跑车','335i'),(13,'宝马','BMW 3系 旅行轿车 ','320i'),(14,'宝马','BMW 3系 旅行轿车 ','328i'),(15,'宝马','BMW 3系 双门轿跑车','325i'),(16,'宝马','BMW 3系 双门轿跑车','330i'),(17,'宝马','BMW 3系 双门轿跑车','335i'),(18,'宝马','BMW 3系 四门轿车(2005-2008年上市)','320i'),(19,'宝马','BMW 3系 四门轿车(2005-2008年上市)','325i'),(20,'宝马','BMW 3系 四门轿车(2005-2008年上市)','330i'),(21,'宝马','BMW 3系 四门轿车(2008-2012年上市)','318i'),(22,'宝马','BMW 3系 四门轿车(2008-2012年上市)','320i'),(23,'宝马','BMW 3系 四门轿车(2008-2012年上市)','325i'),(24,'宝马','BMW 3系 四门轿车(2008-2012年上市)','335i'),(25,'宝马','BMW 3系 四门轿车(自2012年上市)','316i'),(26,'宝马','BMW 3系 四门轿车(自2012年上市)','320i'),(27,'宝马','BMW 3系 四门轿车(自2012年上市)','320Li'),(28,'宝马','BMW 3系 四门轿车(自2012年上市)','328i'),(29,'宝马','BMW 3系 四门轿车(自2012年上市)','328Li'),(30,'宝马','BMW 3系 四门轿车(自2012年上市)','335Li'),(31,'宝马','BMW 4系 双门轿跑车','428i'),(32,'宝马','BMW 4系 双门轿跑车','428i xDrive'),(33,'宝马','BMW 4系 双门轿跑车','435i'),(34,'宝马','BMW 4系 双门轿跑车','435i xDrive'),(35,'宝马','BMW 5系 GT','GranTurismo35i'),(36,'宝马','BMW 5系 GT','GranTurismo50i'),(37,'宝马','BMW 5系 旅行轿车(2010年之前上市)','520i'),(38,'宝马','BMW 5系 旅行轿车(2010年之前上市)','528i'),(39,'宝马','BMW 5系 旅行轿车(2010年之前上市)','528ixDrive'),(40,'宝马','BMW 5系 四门轿车','520i'),(41,'宝马','BMW 5系 四门轿车','520Li'),(42,'宝马','BMW 5系 四门轿车','523i'),(43,'宝马','BMW 5系 四门轿车','523Li'),(44,'宝马','BMW 5系 四门轿车','525Li'),(45,'宝马','BMW 5系 四门轿车','528ixDrive'),(46,'宝马','BMW 5系 四门轿车','528Li'),(47,'宝马','BMW 5系 四门轿车','530Li'),(48,'宝马','BMW 5系 四门轿车','535i'),(49,'宝马','BMW 5系 四门轿车','535ixDrive'),(50,'宝马','BMW 5系 四门轿车','535Li'),(51,'宝马','BMW 5系 四门轿车(2010年之前上市)','520i'),(52,'宝马','BMW 5系 四门轿车(2010年之前上市)','520Li'),(53,'宝马','BMW 5系 四门轿车(2010年之前上市)','523i/523Li'),(54,'宝马','BMW 5系 四门轿车(2010年之前上市)','525i/525LiN52*'),(55,'宝马','BMW 5系 四门轿车(2010年之前上市)','525iM54*'),(56,'宝马','BMW 5系 四门轿车(2010年之前上市)','530i/530LiN52*'),(57,'宝马','BMW 5系 四门轿车(2010年之前上市)','530iM54*'),(58,'宝马','BMW 5系 四门轿车(2010年之前上市)','540i'),(59,'宝马','BMW 5系 四门轿车(2010年之前上市)','545i'),(60,'宝马','BMW 5系 四门轿车(2010年之前上市)','550i'),(61,'宝马','BMW 6系 敞篷轿跑车','630i'),(62,'宝马','BMW 6系 敞篷轿跑车','645i'),(63,'宝马','BMW 6系 敞篷轿跑车','650i'),(64,'宝马','BMW 6系 双门轿跑车','630i'),(65,'宝马','BMW 6系 双门轿跑车','645i'),(66,'宝马','BMW 6系 双门轿跑车','650i'),(67,'宝马','BMW 7系 四门轿车','730Li'),(68,'宝马','BMW 7系 四门轿车','740Li'),(69,'宝马','BMW 7系 四门轿车','750Li'),(70,'宝马','BMW 7系 四门轿车','750LixDrive'),(71,'宝马','BMW 7系 四门轿车','760Li'),(72,'宝马','BMW 7系 四门轿车(2009年之前上市)','730LiM54*'),(73,'宝马','BMW 7系 四门轿车(2009年之前上市)','730LiN52*'),(74,'宝马','BMW 7系 四门轿车(2009年之前上市)','735Li'),(75,'宝马','BMW 7系 四门轿车(2009年之前上市)','740Li'),(76,'宝马','BMW 7系 四门轿车(2009年之前上市)','745Li'),(77,'宝马','BMW 7系 四门轿车(2009年之前上市)','750Li'),(78,'宝马','BMW 7系 四门轿车(2009年之前上市)','760Li'),(79,'宝马','BMW M系','1系M'),(80,'宝马','BMW M系(自2005年至2010年)','M5'),(81,'宝马','BMW M系(自2005年至2010年)','M6'),(82,'宝马','BMW M系(自2005年至2010年)','X5M'),(83,'宝马','BMW M系(自2005年至2010年)','X6M'),(84,'宝马','BMW M系(自2011年上市)','M5'),(85,'宝马','BMW M系敞篷轿跑车','M3'),(86,'宝马','BMW M系双门轿跑车','M3'),(87,'宝马','BMW M系四门轿车','M3'),(88,'宝马','BMW X1','sDrive 18i'),(89,'宝马','BMW X1','sDrive 20i'),(90,'宝马','BMW X1','xDrive 20i'),(91,'宝马','BMW X1','xDrive 28i'),(92,'宝马','BMW X1(2012年之前上市)','sDrive 18i'),(93,'宝马','BMW X1(2012年之前上市)','xDrive 25i'),(94,'宝马','BMW X1(2012年之前上市)','xDrive 28i'),(95,'宝马','BMW X3','20i'),(96,'宝马','BMW X3','28i'),(97,'宝马','BMW X3','35i'),(98,'宝马','BMW X5','3.0si'),(99,'宝马','BMW X5','35i'),(100,'宝马','BMW X5','4.8i'),(101,'宝马','BMW X5','40i'),(102,'宝马','BMW X5','50i'),(103,'宝马','BMW X5(2014年上市)','sDrive30d'),(104,'宝马','BMW X5(2014年上市)','sDrive35i'),(105,'宝马','BMW X5(2014年上市)','sDrive50i'),(106,'宝马','BMW X6','3.5ix'),(107,'宝马','BMW X6','5.0i'),(108,'宝马','BMW X6(2012年上市)','35i'),(109,'宝马','BMW X6(2012年上市)','40i'),(110,'宝马','BMW X6(2012年上市)','50i'),(111,'宝马','BMW Z4 敞篷跑车','sDrive 23i'),(112,'宝马','BMW Z4 敞篷跑车','sDrive 30i'),(113,'宝马','BMW Z4 敞篷跑车','sDrive 35i'),(114,'宝马','新BMW Z4 敞篷跑车(2013年上市)','sDrive20i'),(115,'宝马','新BMW Z4 敞篷跑车(2013年上市)','sDrive28i'),(116,'宝马','新BMW Z4 敞篷跑车(2013年上市)','sDrive35i'),(117,'宝马','新BMW Z4 敞篷跑车(2013年上市)','sDrive35is'),(118,'宝马','BMW 1系 两厢轿车(2011年之前上市)','120i');
/*!40000 ALTER TABLE `xdl_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_order`
--

DROP TABLE IF EXISTS `xdl_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单号',
  `carType` varchar(255) NOT NULL COMMENT '车型',
  `carNumber` varchar(7) NOT NULL COMMENT '车牌号',
  `vin` char(7) DEFAULT NULL COMMENT 'vin码值',
  `serverCarId` int(11) NOT NULL COMMENT '服务车id',
  `combo` char(200) NOT NULL COMMENT '套餐',
  `remark` text NOT NULL COMMENT '备注',
  `createTime` int(11) NOT NULL COMMENT '下单时间',
  `orderTime` varchar(20) NOT NULL COMMENT '预约时间',
  `orderDate` date NOT NULL COMMENT '预约日期',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '1' COMMENT '订单状态(已提交,已确认,已出发,已完成，已付款，已取消,已评价)',
  `lastPrice` varchar(11) NOT NULL COMMENT '最终价格',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `address` varchar(255) NOT NULL COMMENT '详细地址',
  `telephone` varchar(11) NOT NULL COMMENT '联系电话',
  `user` varchar(50) NOT NULL COMMENT '联系人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000000014 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_order`
--

LOCK TABLES `xdl_order` WRITE;
/*!40000 ALTER TABLE `xdl_order` DISABLE KEYS */;
INSERT INTO `xdl_order` VALUES (32,'宝马,BMW 1系 两厢轿车(2011年之前上市),130i','陕122121','1223',0,'微尘滤清器,后部制动片','',1426812294,'08:00-10:00','2015-03-23','2','1853-1921',9,'北京 北京 昌平区 123','15670691243','1·23'),(33,'宝马,BMW 2系 双门轿车,220i','京Ayuyj0','w32',0,'前部制动片,前部制动盘及制动片','无',1426986561,'08:00-10:00','2015-03-26','2','6472',9,'上海 上海 虹桥 323路公交车路线','15670691243','尤贵'),(1000000000,'宝马,BMW 2系 双门轿车,220i','京AQWE23','23123',0,'机油机率,后部制动盘及制动片','231',1426991182,'08:00-10:00','2015-03-26','2','3240',9,'北京 北京 昌平区 123','15670691243','尤贵'),(1000000001,'宝马,BMW 1系 两厢轿车(2011年之前上市),130i','京A121we','23321',0,'机油机率,微尘滤清器','879',1426997226,'08:00-10:00','2015-03-24','0','1476-1544',9,'北京 北京 昌平区 北京市122路','15670691243','123'),(1000000002,'宝马,BMW 1系 两厢轿车(2011年之前上市),130i','京A23123','123',0,'机油机率,后部制动盘及制动片,前部制动盘及制动片','送扥啊',1427080986,'08:00-10:00','2015-03-28','2','8175-3995',9,'上海 上海 虹桥 北京市23路','15670691243','张晓静'),(1000000003,'宝马,BMW 2系 双门轿车,220i','京A11111','',0,'','11111',1427090760,'16:00-18:00','2015-03-26','2','',10,'北京 北京 昌平区 北京市丰台区北京南站-地铁站','13641144289','或小城'),(1000000004,'宝马,BMW 2系 双门轿车,220i','京A212','1212',0,'后部制动盘及制动片,前部制动盘及制动片','wqe',1427114488,'08:00-10:00','2015-03-28','2','7472',9,'北京 北京 昌平区 北京市122路','15670691243','21'),(1000000005,'宝马,BMW 5系 四门轿车(2010年之前上市),525i/525LiN52*','京A45678','',0,'后部制动盘及制动片,前部制动片','服务不错',1427181714,'16:00-18:00','2015-03-26','2','5301-5536',11,'北京 北京 朝阳区 回龙观东大街-道路','15638080805','丁晓旭'),(1000000006,'宝马,BMW 1系 两厢轿车(2011年之前上市),130i','京A12','1221',0,'机油机率,微尘滤清器','121',1427181911,'08:00-10:00','2015-03-26','1','1165',9,'北京 北京 昌平区 北京市120路','15670691243','尤贵'),(1000000007,'宝马,BMW 5系 四门轿车(2010年之前上市),525i/525LiN52*','京A88888','',0,'后部制动盘及制动片,前部制动片','私车公用',1427181961,'14:00-16:00','2015-03-26','2','5534',11,'北京 北京 朝阳区 回龙观东大街-道路','15638080805','丁晓旭'),(1000000008,'宝马,BMW 3系 敞篷轿跑车,325i','京A5454','545454',21,'机油机率,火花塞','fdsgf',1427184580,'10:00-12:00','2015-03-27','5','1161元',9,'北京 北京 昌平区 北京市345快','15670691243','dfd'),(1000000009,'宝马,BMW M系敞篷轿跑车,M3','京A45555','',0,'微尘滤清器,后部制动盘及制动片,前部制动片,前部制动盘及制动片','嘎嘎嘎',1427186468,'16:00-18:00','2015-03-25','0','10008-10243',11,'北京 北京 朝阳区 回龙观东大街-道路','15638080805','丁晓旭'),(1000000010,'宝马,BMW 1系 两厢轿车(2011年之前上市),120i','京A88888','0000000',0,'微尘滤清器','我要速度快点的',1427240722,'08:00-10:00','2015-03-28','2','315',9,'北京 北京 昌平区 北京市昌平区北京市育荣教育园区','15670691243','尤贵'),(1000000011,'宝马,BMW 1系 两厢轿车,116i','京A12344','12345',0,'后部制动盘及制动片','',1427255762,'10:00-12:00','2015-03-27','2','536-0',9,'北京 北京 昌平区 北京市昌平区回龙观-地铁站','15670691243','wr'),(1000000012,'宝马,BMW M系敞篷轿跑车,M3','京A12345','1111111',0,'微尘滤清器,后部制动盘及制动片','啊啊啊啊啊啊啊啊啊啊',1427285698,'10:00-12:00','2015-03-28','2','7227',11,'北京 北京 朝阳区 回龙观东大街-道路','15638080805','对对对'),(1000000013,'宝马,BMW 2系 双门轿车,220i','京A12321','1234567',0,'后部制动盘及制动片,前部制动片,前部制动盘及制动片','恰额外企鹅',1427330027,'16:00-18:00','2015-03-28','1','9711',9,'北京 北京 昌平区 北京市120路','15670691243','尤贵');
/*!40000 ALTER TABLE `xdl_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_price`
--

DROP TABLE IF EXISTS `xdl_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '套餐的id',
  `typeId` int(11) NOT NULL COMMENT '车型id',
  `comboName` varchar(50) NOT NULL COMMENT '套餐的名称',
  `lowPrice` int(11) NOT NULL COMMENT '最低价格',
  `highPrice` int(11) DEFAULT NULL COMMENT '最高价格',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1175 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_price`
--

LOCK TABLES `xdl_price` WRITE;
/*!40000 ALTER TABLE `xdl_price` DISABLE KEYS */;
INSERT INTO `xdl_price` VALUES (1,1,'后部制动盘及制动片',536,0),(2,1,'微尘滤清器',433,559),(4,1,'后部制动盘及制动片',2818,NULL),(5,1,'前部制动片',1729,1999),(6,1,'前部制动盘及制动片',3421,NULL),(7,1,'火花塞',891,NULL),(8,1,'车辆检查',222,NULL),(10,1,'雨刮片',536,NULL),(11,2,'机油机率',865,NULL),(12,2,'微尘滤清器',433,559),(14,2,'后部制动盘及制动片',2818,NULL),(15,2,'前部制动片',1959,NULL),(16,2,'前部制动盘及制动片',3825,NULL),(17,2,'火花塞',891,NULL),(18,2,'车辆检查',222,NULL),(20,2,'雨刮片',536,NULL),(21,3,'机油机率',965,NULL),(22,3,'微尘滤清器',433,559),(24,3,'后部制动盘及制动片',3239,NULL),(25,3,'前部制动片',2239,NULL),(26,3,'前部制动盘及制动片',4233,NULL),(27,3,'火花塞',1050,NULL),(28,3,'车辆检查',222,NULL),(30,3,'雨刮片',536,NULL),(31,4,'机油机率',861,NULL),(32,4,'微尘滤清器',315,383),(34,4,'后部制动盘及制动片',2571,NULL),(35,4,'前部制动片',1740,1849),(36,4,'前部制动盘及制动片',3243,3442),(37,4,'火花塞',892,929),(38,4,'车辆检查',296,NULL),(40,4,'雨刮片',437,NULL),(41,5,'机油机率',1161,NULL),(42,5,'微尘滤清器',315,383),(44,5,'后部制动盘及制动片',3027,NULL),(45,5,'前部制动片',2002,NULL),(46,5,'前部制动盘及制动片',3987,3995),(47,5,'火花塞',1375,1412),(48,5,'车辆检查',296,NULL),(50,5,'雨刮片',437,NULL),(51,6,'机油机率',965,NULL),(52,6,'微尘滤清器',559,NULL),(54,6,'后部制动盘及制动片',3239,NULL),(55,6,'前部制动片',2239,NULL),(56,6,'前部制动盘及制动片',4233,NULL),(57,6,'火花塞',1050,NULL),(58,6,'车辆检查',222,NULL),(60,6,'雨刮片',536,NULL),(61,7,'机油机率',965,NULL),(62,7,'微尘滤清器',559,NULL),(64,7,'后部制动盘及制动片',3274,NULL),(65,7,'前部制动片',1959,NULL),(66,7,'前部制动盘及制动片',3825,NULL),(67,7,'火花塞',1050,NULL),(68,7,'车辆检查',222,NULL),(70,7,'雨刮片',666,NULL),(71,8,'机油机率',965,NULL),(72,8,'微尘滤清器',559,NULL),(74,8,'后部制动盘及制动片',3274,NULL),(75,8,'前部制动片',2239,NULL),(76,8,'前部制动盘及制动片',4601,NULL),(77,8,'火花塞',1050,NULL),(78,8,'车辆检查',222,NULL),(80,8,'雨刮片',666,NULL),(81,9,'机油机率',1161,NULL),(82,9,'微尘滤清器',559,NULL),(84,9,'后部制动盘及制动片',4060,NULL),(85,9,'前部制动片',2239,NULL),(86,9,'前部制动盘及制动片',5433,NULL),(87,9,'火花塞',1757,NULL),(88,9,'车辆检查',222,NULL),(90,9,'雨刮片',666,NULL),(91,10,'机油机率',1161,NULL),(92,10,'微尘滤清器',315,383),(94,10,'后部制动盘及制动片',3027,NULL),(95,10,'前部制动片',932,2010),(96,10,'前部制动盘及制动片',3755,NULL),(97,10,'火花塞',871,1005),(98,10,'车辆检查',296,NULL),(100,10,'雨刮片',456,NULL),(101,11,'机油机率',1161,NULL),(102,11,'微尘滤清器',315,383),(104,11,'后部制动盘及制动片',3413,NULL),(105,11,'前部制动片',1932,NULL),(106,11,'前部制动盘及制动片',3917,NULL),(107,11,'火花塞',1375,NULL),(108,11,'车辆检查',296,NULL),(110,11,'雨刮片',456,NULL),(111,12,'机油机率',1161,NULL),(112,12,'微尘滤清器',315,383),(114,12,'后部制动盘及制动片',3413,NULL),(115,12,'前部制动片',1940,NULL),(116,12,'前部制动盘及制动片',4645,NULL),(117,12,'火花塞',1544,1715),(118,12,'车辆检查',296,NULL),(120,12,'雨刮片',456,NULL),(121,13,'机油机率',965,NULL),(122,13,'微尘滤清器',559,NULL),(124,13,'后部制动盘及制动片',3274,NULL),(125,13,'前部制动片',1959,NULL),(126,13,'前部制动盘及制动片',3825,NULL),(127,13,'火花塞',1050,NULL),(128,13,'车辆检查',222,NULL),(130,13,'雨刮片',666,NULL),(131,14,'机油机率',965,NULL),(132,14,'微尘滤清器',559,NULL),(134,14,'后部制动盘及制动片',3274,NULL),(135,14,'前部制动片',2239,NULL),(136,14,'前部制动盘及制动片',4601,NULL),(137,14,'火花塞',1050,NULL),(138,14,'车辆检查',222,NULL),(140,14,'雨刮片',666,NULL),(141,15,'机油机率',1161,NULL),(142,15,'微尘滤清器',315,383),(144,15,'后部制动盘及制动片',3027,NULL),(145,15,'前部制动片',1932,2010),(146,15,'前部制动盘及制动片',3755,3917),(147,15,'火花塞',1375,NULL),(148,15,'车辆检查',296,NULL),(150,15,'雨刮片',456,NULL),(151,16,'机油机率',1161,NULL),(152,16,'微尘滤清器',315,383),(154,16,'后部制动盘及制动片',3413,NULL),(155,16,'前部制动片',1932,1940),(156,16,'前部制动盘及制动片',3917,3925),(157,16,'火花塞',871,1375),(158,16,'车辆检查',296,NULL),(160,16,'雨刮片',456,NULL),(161,17,'机油机率',1161,NULL),(162,17,'微尘滤清器',315,383),(164,17,'后部制动盘及制动片',3413,NULL),(165,17,'前部制动片',1940,NULL),(166,17,'前部制动盘及制动片',4645,NULL),(167,17,'火花塞',1544,1715),(168,17,'车辆检查',222,NULL),(170,17,'雨刮片',456,NULL),(171,18,'机油机率',861,NULL),(172,18,'微尘滤清器',315,383),(174,18,'后部制动盘及制动片',2571,3027),(175,18,'前部制动片',1849,2002),(176,18,'前部制动盘及制动片',3352,3443),(177,18,'火花塞',892,929),(178,18,'车辆检查',296,NULL),(180,18,'雨刮片',496,NULL),(181,19,'机油机率',1161,NULL),(183,19,'后部制动盘及制动片',3027,NULL),(184,19,'前部制动片',1932,2010),(185,19,'前部制动盘及制动片',3525,3755),(186,19,'车辆检查',296,NULL),(188,19,'雨刮片',496,NULL),(189,19,'微尘滤清器',315,383),(190,19,'火花塞',1375,1412),(191,20,'后部制动盘及制动片',3413,NULL),(192,20,'机油机率',1161,NULL),(193,20,'前部制动片',1940,NULL),(194,20,'火花塞',1412,NULL),(195,20,'车辆检查',296,NULL),(196,20,'微尘滤清器',315,383),(198,20,'前部制动盘及制动片',3917,NULL),(200,20,'雨刮片',496,NULL),(201,21,'机油机率',861,NULL),(202,21,'微尘滤清器',315,383),(204,21,'后部制动盘及制动片',3027,NULL),(205,21,'前部制动片',1849,NULL),(206,21,'前部制动盘及制动片',3442,NULL),(207,21,'火花塞',892,990),(208,21,'车辆检查',222,NULL),(210,21,'雨刮片',496,NULL),(211,22,'机油机率',861,NULL),(212,22,'微尘滤清器',315,383),(214,22,'后部制动盘及制动片',3027,NULL),(215,22,'前部制动片',1849,2002),(216,22,'前部制动盘及制动片',3442,NULL),(217,22,'火花塞',892,990),(218,22,'车辆检查',222,NULL),(220,22,'雨刮片',496,NULL),(221,23,'机油机率',1161,NULL),(222,23,'微尘滤清器',315,383),(224,23,'后部制动盘及制动片',3027,NULL),(225,23,'前部制动片',1940,2010),(226,23,'前部制动盘及制动片',3775,NULL),(227,23,'火花塞',871,1509),(228,23,'车辆检查',222,NULL),(230,23,'雨刮片',496,NULL),(231,24,'机油机率',1161,NULL),(232,24,'微尘滤清器',315,383),(233,24,'前部制动片',1940,NULL),(234,24,'前部制动盘及制动片',4645,NULL),(235,24,'火花塞',1375,1715),(236,24,'车辆检查',222,NULL),(238,24,'雨刮片',496,NULL),(240,24,'后部制动盘及制动片',3413,NULL),(241,25,'微尘滤清器',559,NULL),(243,25,'后部制动盘及制动片',3285,NULL),(244,25,'前部制动片',1989,NULL),(245,25,'前部制动盘及制动片',3983,NULL),(246,25,'火花塞',891,NULL),(247,25,'车辆检查',222,NULL),(249,25,'雨刮片',666,NULL),(250,25,'机油机率',865,NULL),(251,26,'机油机率',965,NULL),(252,26,'微尘滤清器',559,NULL),(254,26,'后部制动盘及制动片',3289,NULL),(255,26,'前部制动片',1959,2239),(256,26,'前部制动盘及制动片',3825,NULL),(257,26,'火花塞',1050,NULL),(258,26,'车辆检查',222,NULL),(260,26,'雨刮片',666,NULL),(261,27,'机油机率',965,NULL),(262,27,'微尘滤清器',559,NULL),(264,27,'后部制动盘及制动片',3248,NULL),(265,27,'前部制动片',1989,NULL),(266,27,'前部制动盘及制动片',3983,NULL),(267,27,'火花塞',1050,NULL),(268,27,'车辆检查',222,NULL),(270,27,'雨刮片',666,NULL),(271,28,'机油机率',965,NULL),(272,28,'微尘滤清器',559,NULL),(274,28,'后部制动盘及制动片',3274,NULL),(275,28,'前部制动片',2239,NULL),(276,28,'前部制动盘及制动片',4601,NULL),(277,28,'火花塞',1050,NULL),(278,28,'车辆检查',222,NULL),(280,28,'雨刮片',666,NULL),(281,29,'机油机率',965,NULL),(282,29,'微尘滤清器',559,NULL),(284,29,'后部制动盘及制动片',3248,NULL),(285,29,'前部制动片',1989,NULL),(286,29,'前部制动盘及制动片',3983,NULL),(287,29,'火花塞',1050,NULL),(288,29,'车辆检查',222,NULL),(290,29,'雨刮片',666,NULL),(291,30,'机油机率',1161,NULL),(292,30,'微尘滤清器',559,NULL),(293,30,'前部制动片',2489,NULL),(294,30,'火花塞',1757,NULL),(295,30,'车辆检查',222,NULL),(298,30,'后部制动盘及制动片',4023,NULL),(299,30,'前部制动盘及制动片',5683,NULL),(300,30,'雨刮片',666,NULL),(301,31,'机油机率',965,NULL),(302,31,'微尘滤清器',559,NULL),(304,31,'后部制动盘及制动片',3274,NULL),(305,31,'前部制动片',2239,NULL),(306,31,'前部制动盘及制动片',4601,NULL),(307,31,'火花塞',1050,NULL),(308,31,'车辆检查',222,NULL),(310,31,'雨刮片',528,NULL),(311,32,'机油机率',965,NULL),(312,32,'微尘滤清器',559,NULL),(314,32,'后部制动盘及制动片',3274,NULL),(315,32,'前部制动片',2239,NULL),(316,32,'前部制动盘及制动片',4601,NULL),(317,32,'火花塞',1050,NULL),(318,32,'车辆检查',222,NULL),(320,32,'雨刮片',528,NULL),(321,33,'机油机率',1161,NULL),(322,33,'微尘滤清器',559,NULL),(324,33,'后部制动盘及制动片',4060,NULL),(325,33,'前部制动片',2239,NULL),(326,33,'前部制动盘及制动片',5396,NULL),(327,33,'火花塞',1757,NULL),(328,33,'车辆检查',222,NULL),(330,33,'雨刮片',528,NULL),(331,34,'机油机率',1161,NULL),(332,34,'微尘滤清器',559,NULL),(334,34,'后部制动盘及制动片',4060,NULL),(335,34,'前部制动片',2239,NULL),(336,34,'前部制动盘及制动片',5396,NULL),(337,34,'火花塞',1757,NULL),(338,34,'车辆检查',222,NULL),(340,34,'雨刮片',528,NULL),(341,35,'机油机率',1161,NULL),(342,35,'微尘滤清器',1228,NULL),(344,35,'后部制动盘及制动片',4183,NULL),(345,35,'前部制动片',3613,NULL),(346,35,'前部制动盘及制动片',6986,NULL),(347,35,'火花塞',1449,NULL),(348,35,'车辆检查',222,NULL),(350,35,'雨刮片',658,NULL),(351,36,'机油机率',1536,NULL),(352,36,'微尘滤清器',1228,NULL),(354,36,'后部制动盘及制动片',4508,NULL),(355,36,'前部制动片',3613,NULL),(356,36,'前部制动盘及制动片',7896,NULL),(357,36,'火花塞',1821,NULL),(358,36,'车辆检查',222,NULL),(360,36,'雨刮片',658,NULL),(361,37,'机油机率',965,NULL),(362,37,'微尘滤清器',1228,NULL),(364,37,'后部制动盘及制动片',3785,NULL),(365,37,'前部制动片',1989,NULL),(366,37,'前部制动盘及制动片',4544,NULL),(367,37,'火花塞',668,NULL),(368,37,'车辆检查',259,NULL),(370,37,'雨刮片',528,NULL),(371,38,'机油机率',965,NULL),(372,38,'微尘滤清器',1228,NULL),(374,38,'后部制动盘及制动片',3785,NULL),(375,38,'前部制动片',2089,NULL),(376,38,'前部制动盘及制动片',5500,NULL),(377,38,'火花塞',668,NULL),(378,38,'车辆检查',259,NULL),(380,38,'雨刮片',528,NULL),(381,39,'机油机率',942,NULL),(382,39,'微尘滤清器',1228,NULL),(384,39,'后部制动盘及制动片',3785,NULL),(385,39,'前部制动片',2089,NULL),(386,39,'前部制动盘及制动片',5500,NULL),(387,39,'火花塞',668,NULL),(388,39,'车辆检查',259,NULL),(390,39,'雨刮片',528,NULL),(391,40,'机油机率',965,NULL),(392,40,'微尘滤清器',1228,NULL),(394,40,'后部制动盘及制动片',3748,NULL),(395,40,'前部制动片',1989,NULL),(396,40,'前部制动盘及制动片',4544,NULL),(397,40,'火花塞',656,NULL),(398,40,'车辆检查',259,NULL),(400,40,'雨刮片',528,NULL),(401,41,'机油机率',965,1161),(402,41,'微尘滤清器',1228,NULL),(404,41,'后部制动盘及制动片',3480,NULL),(405,41,'前部制动片',1949,2089),(406,41,'前部制动盘及制动片',4072,4948),(407,41,'火花塞',668,797),(408,41,'车辆检查',259,NULL),(410,41,'雨刮片',528,NULL),(411,42,'机油机率',1161,NULL),(412,42,'微尘滤清器',1228,NULL),(414,42,'后部制动盘及制动片',3748,NULL),(415,42,'前部制动片',1989,NULL),(416,42,'前部制动盘及制动片',4544,NULL),(417,42,'火花塞',797,NULL),(418,42,'车辆检查',259,NULL),(420,42,'雨刮片',528,NULL),(421,43,'机油机率',1161,NULL),(422,43,'微尘滤清器',1228,NULL),(424,43,'后部制动盘及制动片',3480,NULL),(425,43,'前部制动片',1949,2089),(426,43,'前部制动盘及制动片',4072,NULL),(427,43,'火花塞',668,797),(428,43,'车辆检查',259,NULL),(430,43,'雨刮片',528,NULL),(431,44,'机油机率',965,NULL),(432,44,'微尘滤清器',1228,NULL),(434,44,'后部制动盘及制动片',3480,NULL),(435,44,'前部制动片',1949,NULL),(436,44,'前部制动盘及制动片',4072,NULL),(437,44,'火花塞',668,797),(438,44,'车辆检查',259,NULL),(440,44,'雨刮片',528,NULL),(441,45,'机油机率',942,NULL),(442,45,'微尘滤清器',1228,NULL),(444,45,'后部制动盘及制动片',3748,NULL),(445,45,'前部制动片',2089,NULL),(446,45,'前部制动盘及制动片',5500,NULL),(447,45,'火花塞',656,NULL),(448,45,'车辆检查',259,NULL),(450,45,'雨刮片',528,NULL),(451,46,'机油机率',1161,NULL),(452,46,'微尘滤清器',1228,NULL),(454,46,'后部制动盘及制动片',3480,NULL),(455,46,'前部制动片',1949,NULL),(456,46,'前部制动盘及制动片',4072,NULL),(457,46,'火花塞',797,NULL),(458,46,'车辆检查',259,NULL),(460,46,'雨刮片',528,NULL),(461,47,'机油机率',1161,NULL),(462,47,'微尘滤清器',1228,NULL),(464,47,'后部制动盘及制动片',3480,NULL),(465,47,'前部制动片',1949,2089),(466,47,'前部制动盘及制动片',4072,4212),(467,47,'火花塞',797,NULL),(468,47,'车辆检查',259,NULL),(470,47,'雨刮片',528,NULL),(471,48,'机油机率',1161,NULL),(472,48,'微尘滤清器',1228,NULL),(474,48,'后部制动盘及制动片',4075,NULL),(475,48,'前部制动片',2089,3613),(476,48,'前部制动盘及制动片',6986,NULL),(477,48,'火花塞',1449,NULL),(478,48,'车辆检查',259,NULL),(480,48,'雨刮片',528,NULL),(481,49,'机油机率',1161,NULL),(482,49,'微尘滤清器',1228,NULL),(484,49,'后部制动盘及制动片',4305,NULL),(485,49,'前部制动片',2089,3613),(486,49,'前部制动盘及制动片',6986,NULL),(487,49,'火花塞',1449,NULL),(488,49,'车辆检查',259,NULL),(490,49,'雨刮片',528,NULL),(491,50,'机油机率',1161,NULL),(492,50,'微尘滤清器',1228,NULL),(494,50,'后部制动盘及制动片',3480,NULL),(495,50,'前部制动片',2089,NULL),(496,50,'前部制动盘及制动片',4908,NULL),(497,50,'火花塞',1449,NULL),(498,50,'车辆检查',259,NULL),(500,50,'雨刮片',528,NULL),(501,51,'机油机率',1132,NULL),(502,51,'微尘滤清器',854,NULL),(504,51,'后部制动盘及制动片',3534,NULL),(505,51,'前部制动片',1767,2002),(506,51,'前部制动盘及制动片',4029,NULL),(507,51,'火花塞',1301,NULL),(508,51,'车辆检查',370,NULL),(510,51,'雨刮片',592,NULL),(511,52,'机油机率',861,NULL),(512,52,'微尘滤清器',854,NULL),(514,52,'后部制动盘及制动片',3534,NULL),(515,52,'前部制动片',1767,NULL),(516,52,'前部制动盘及制动片',3853,NULL),(517,52,'火花塞',1240,NULL),(518,52,'车辆检查',259,NULL),(520,52,'雨刮片',592,NULL),(521,53,'机油机率',1161,NULL),(522,53,'微尘滤清器',854,NULL),(524,53,'后部制动盘及制动片',3534,NULL),(525,53,'前部制动片',1767,NULL),(526,53,'前部制动盘及制动片',3853,NULL),(527,53,'火花塞',1523,NULL),(528,53,'车辆检查',370,NULL),(530,53,'雨刮片',592,NULL),(531,54,'机油机率',1132,NULL),(532,54,'微尘滤清器',854,NULL),(534,54,'后部制动盘及制动片',3534,NULL),(535,54,'前部制动片',1767,2002),(536,54,'前部制动盘及制动片',3853,NULL),(537,54,'火花塞',1301,NULL),(538,54,'车辆检查',370,NULL),(540,54,'雨刮片',592,NULL),(541,55,'机油机率',1132,NULL),(542,55,'微尘滤清器',854,NULL),(544,55,'后部制动盘及制动片',3534,NULL),(545,55,'前部制动片',1767,2002),(546,55,'前部制动盘及制动片',3853,NULL),(547,55,'火花塞',1301,NULL),(548,55,'车辆检查',370,NULL),(550,55,'雨刮片',592,NULL),(551,56,'机油机率',1161,NULL),(552,56,'微尘滤清器',854,NULL),(554,56,'后部制动盘及制动片',3534,NULL),(555,56,'前部制动片',2002,NULL),(556,56,'前部制动盘及制动片',4029,NULL),(557,56,'火花塞',1019,1523),(558,56,'车辆检查',370,NULL),(560,56,'雨刮片',592,NULL),(561,57,'机油机率',1132,NULL),(562,57,'微尘滤清器',854,NULL),(564,57,'后部制动盘及制动片',3534,NULL),(565,57,'前部制动片',2002,NULL),(566,57,'前部制动盘及制动片',4029,NULL),(567,57,'火花塞',1301,NULL),(568,57,'车辆检查',370,NULL),(570,57,'雨刮片',592,NULL),(571,58,'机油机率',1375,NULL),(572,58,'微尘滤清器',854,NULL),(574,58,'后部制动盘及制动片',3950,NULL),(575,58,'前部制动片',2002,3262),(576,58,'前部制动盘及制动片',4826,NULL),(577,58,'火花塞',1932,NULL),(578,58,'车辆检查',370,NULL),(580,58,'雨刮片',592,NULL),(581,59,'机油机率',1375,NULL),(582,59,'微尘滤清器',854,NULL),(584,59,'后部制动盘及制动片',3950,NULL),(585,59,'前部制动片',2002,3262),(586,59,'前部制动盘及制动片',4826,NULL),(587,59,'火花塞',1932,NULL),(588,59,'车辆检查',370,NULL),(590,59,'雨刮片',592,NULL),(591,60,'机油机率',1375,NULL),(592,60,'微尘滤清器',854,NULL),(594,60,'后部制动盘及制动片',3950,NULL),(595,60,'前部制动片',2002,3262),(596,60,'前部制动盘及制动片',6820,NULL),(597,60,'火花塞',1932,NULL),(598,60,'车辆检查',370,NULL),(600,60,'雨刮片',592,NULL),(601,61,'机油机率',1161,NULL),(602,61,'微尘滤清器',854,NULL),(604,61,'后部制动盘及制动片',3534,NULL),(605,61,'前部制动片',1767,NULL),(606,61,'前部制动盘及制动片',4029,NULL),(607,61,'火花塞',1019,1523),(608,61,'车辆检查',592,NULL),(610,61,'雨刮片',693,NULL),(611,62,'机油机率',1375,NULL),(612,62,'微尘滤清器',854,NULL),(614,62,'后部制动盘及制动片',3951,NULL),(615,62,'前部制动片',2002,NULL),(616,62,'前部制动盘及制动片',4826,NULL),(617,62,'火花塞',1932,NULL),(618,62,'车辆检查',592,NULL),(620,62,'雨刮片',693,NULL),(621,63,'机油机率',1375,NULL),(622,63,'微尘滤清器',854,NULL),(624,63,'后部制动盘及制动片',3951,NULL),(625,63,'前部制动片',2002,3262),(626,63,'前部制动盘及制动片',6820,NULL),(627,63,'火花塞',1932,NULL),(628,63,'车辆检查',592,NULL),(630,63,'雨刮片',693,NULL),(631,64,'机油机率',1161,NULL),(632,64,'微尘滤清器',854,NULL),(634,64,'后部制动盘及制动片',3534,NULL),(635,64,'前部制动片',1767,NULL),(636,64,'前部制动盘及制动片',4029,NULL),(637,64,'前部制动盘及制动片',1523,NULL),(638,64,'车辆检查',370,NULL),(640,64,'雨刮片',693,NULL),(641,65,'机油机率',1375,NULL),(642,65,'微尘滤清器',854,NULL),(644,65,'后部制动盘及制动片',3950,NULL),(645,65,'前部制动片',2002,NULL),(646,65,'前部制动盘及制动片',4826,NULL),(647,65,'火花塞',1932,NULL),(648,65,'车辆检查',370,NULL),(650,65,'雨刮片',693,NULL),(651,66,'机油机率',1375,NULL),(652,66,'微尘滤清器',854,NULL),(654,66,'后部制动盘及制动片',3950,NULL),(655,66,'前部制动片',2002,3262),(656,66,'前部制动盘及制动片',6820,NULL),(657,66,'火花塞',1932,NULL),(658,66,'车辆检查',370,NULL),(660,66,'雨刮片',693,NULL),(661,67,'机油机率',1161,NULL),(662,67,'微尘滤清器',1003,1128),(664,67,'后部制动盘及制动片',4209,NULL),(665,67,'前部制动片',3613,NULL),(666,67,'前部制动盘及制动片',6986,NULL),(667,67,'火花塞',797,1301),(668,67,'车辆检查',222,NULL),(670,67,'雨刮片',658,NULL),(671,68,'机油机率',1161,NULL),(672,68,'微尘滤清器',1228,NULL),(674,68,'后部制动盘及制动片',4209,NULL),(675,68,'前部制动片',3613,NULL),(676,68,'前部制动盘及制动片',7896,NULL),(677,68,'火花塞',1523,NULL),(678,68,'车辆检查',222,NULL),(680,68,'雨刮片',658,NULL),(681,69,'机油机率',1536,NULL),(682,69,'微尘滤清器',1003,1228),(684,69,'后部制动盘及制动片',4534,NULL),(685,69,'前部制动片',3613,NULL),(686,69,'前部制动盘及制动片',7896,NULL),(687,69,'火花塞',1784,1858),(688,69,'车辆检查',222,NULL),(690,69,'雨刮片',658,NULL),(691,70,'机油机率',1536,NULL),(692,70,'微尘滤清器',560,1228),(694,70,'后部制动盘及制动片',4534,NULL),(695,70,'前部制动片',3613,NULL),(696,70,'前部制动盘及制动片',7896,NULL),(697,70,'火花塞',1784,NULL),(698,70,'车辆检查',222,NULL),(700,70,'雨刮片',658,NULL),(701,71,'机油机率',1755,NULL),(702,71,'微尘滤清器',560,NULL),(704,71,'后部制动盘及制动片',4534,NULL),(705,71,'前部制动片',3583,3613),(706,71,'前部制动盘及制动片',7896,NULL),(707,71,'火花塞',3046,NULL),(708,71,'车辆检查',222,NULL),(710,71,'雨刮片',658,NULL),(711,72,'机油机率',1243,NULL),(712,72,'微尘滤清器',1070,NULL),(714,72,'后部制动盘及制动片',3331,NULL),(715,72,'前部制动片',2002,NULL),(716,72,'前部制动盘及制动片',4536,NULL),(717,72,'火花塞',1449,NULL),(718,72,'车辆检查',296,NULL),(720,72,'雨刮片',373,564),(721,73,'机油机率',1161,NULL),(722,73,'微尘滤清器',1070,NULL),(724,73,'后部制动盘及制动片',3331,NULL),(725,73,'前部制动片',2002,NULL),(726,73,'前部制动盘及制动片',4536,NULL),(727,73,'火花塞',1486,NULL),(728,73,'车辆检查',296,NULL),(730,73,'雨刮片',373,564),(731,74,'机油机率',1374,NULL),(732,74,'微尘滤清器',1070,NULL),(734,74,'后部制动盘及制动片',4096,NULL),(735,74,'前部制动片',2002,NULL),(736,74,'前部制动盘及制动片',4826,NULL),(737,74,'火花塞',1784,NULL),(738,74,'车辆检查',296,NULL),(740,74,'雨刮片',373,564),(741,75,'机油机率',1374,NULL),(742,75,'微尘滤清器',1070,NULL),(744,75,'后部制动盘及制动片',3840,NULL),(745,75,'前部制动片',2002,NULL),(746,75,'前部制动盘及制动片',4826,NULL),(747,75,'火花塞',1784,NULL),(748,75,'车辆检查',296,NULL),(750,75,'雨刮片',373,564),(751,76,'机油机率',1374,NULL),(752,76,'微尘滤清器',1070,NULL),(754,76,'后部制动盘及制动片',4096,NULL),(755,76,'前部制动片',2002,3206),(756,76,'前部制动盘及制动片',6188,NULL),(757,76,'火花塞',1784,NULL),(758,76,'车辆检查',296,NULL),(760,76,'雨刮片',373,564),(761,77,'机油机率',1437,NULL),(762,77,'微尘滤清器',1070,NULL),(764,77,'后部制动盘及制动片',4296,NULL),(765,77,'前部制动片',2002,3357),(766,77,'前部制动盘及制动片',6819,NULL),(767,77,'火花塞',4669,NULL),(768,77,'车辆检查',296,NULL),(770,77,'雨刮片',373,564),(771,78,'机油机率',1374,NULL),(772,78,'微尘滤清器',1070,NULL),(774,78,'后部制动盘及制动片',3331,NULL),(775,78,'前部制动片',2002,NULL),(776,78,'前部制动盘及制动片',4536,NULL),(777,78,'火花塞',1784,NULL),(778,78,'车辆检查',296,NULL),(780,78,'雨刮片',373,564),(781,79,'机油机率',1161,NULL),(782,79,'微尘滤清器',383,NULL),(784,79,'后部制动盘及制动片',6978,NULL),(785,79,'前部制动片',2452,NULL),(786,79,'前部制动盘及制动片',7655,NULL),(787,79,'火花塞',1441,1575),(788,79,'车辆检查',222,NULL),(790,79,'雨刮片',437,NULL),(791,80,'机油机率',2554,NULL),(792,80,'微尘滤清器',1291,NULL),(794,80,'后部制动盘及制动片',6008,NULL),(795,80,'前部制动片',2665,NULL),(796,80,'前部制动盘及制动片',7942,NULL),(797,80,'火花塞',3007,3288),(798,80,'车辆检查',333,NULL),(800,80,'雨刮片',456,NULL),(801,81,'机油机率',2554,NULL),(802,81,'微尘滤清器',1291,NULL),(804,81,'后部制动盘及制动片',6008,NULL),(805,81,'前部制动片',2665,NULL),(806,81,'前部制动盘及制动片',7942,NULL),(807,81,'火花塞',3007,3288),(808,81,'车辆检查',222,NULL),(810,81,'雨刮片',456,NULL),(811,82,'机油机率',2554,NULL),(812,82,'微尘滤清器',1291,NULL),(814,82,'后部制动盘及制动片',6008,NULL),(815,82,'前部制动片',2665,NULL),(816,82,'前部制动盘及制动片',7942,NULL),(817,82,'火花塞',3007,3288),(818,82,'车辆检查',222,NULL),(820,82,'雨刮片',496,NULL),(821,83,'机油机率',2736,NULL),(822,83,'微尘滤清器',854,NULL),(824,83,'后部制动盘及制动片',6373,NULL),(825,83,'前部制动片',3605,NULL),(826,83,'前部制动盘及制动片',9783,NULL),(827,83,'火花塞',3805,NULL),(828,83,'车辆检查',370,NULL),(830,83,'雨刮片',592,NULL),(831,84,'机油机率',1541,NULL),(832,84,'微尘滤清器',1228,NULL),(834,84,'后部制动盘及制动片',7750,NULL),(835,84,'前部制动片',5330,NULL),(836,84,'前部制动盘及制动片',13340,NULL),(837,84,'火花塞',2984,NULL),(838,84,'车辆检查',259,NULL),(840,84,'雨刮片',528,NULL),(841,85,'机油机率',2810,NULL),(842,85,'微尘滤清器',854,NULL),(844,85,'后部制动盘及制动片',6373,NULL),(845,85,'前部制动片',3605,NULL),(846,85,'前部制动盘及制动片',9783,NULL),(847,85,'火花塞',3805,NULL),(848,85,'车辆检查',370,NULL),(850,85,'雨刮片',693,NULL),(851,86,'机油机率',1541,NULL),(852,86,'微尘滤清器',821,1274),(854,86,'后部制动盘及制动片',5738,NULL),(855,86,'前部制动片',4474,NULL),(856,86,'前部制动盘及制动片',9983,NULL),(857,86,'火花塞',2807,NULL),(858,86,'车辆检查',296,NULL),(860,86,'雨刮片',618,NULL),(861,87,'机油机率',1541,NULL),(862,87,'微尘滤清器',821,1274),(864,87,'后部制动盘及制动片',5738,NULL),(865,87,'前部制动片',4474,NULL),(866,87,'前部制动盘及制动片',9983,NULL),(867,87,'火花塞',2807,NULL),(868,87,'车辆检查',296,NULL),(870,87,'雨刮片',618,NULL),(871,88,'机油机率',861,NULL),(872,88,'微尘滤清器',383,NULL),(874,88,'后部制动盘及制动片',3023,NULL),(875,88,'前部制动片',2017,NULL),(876,88,'前部制动盘及制动片',3762,NULL),(877,88,'火花塞',892,990),(878,88,'车辆检查',222,NULL),(880,88,'雨刮片',476,NULL),(881,89,'机油机率',965,NULL),(882,89,'微尘滤清器',383,NULL),(884,89,'后部制动盘及制动片',3023,NULL),(885,89,'前部制动片',2017,NULL),(886,89,'前部制动盘及制动片',3762,NULL),(887,89,'火花塞',705,815),(888,89,'车辆检查',222,NULL),(890,89,'雨刮片',476,NULL),(891,90,'机油机率',1036,NULL),(892,90,'微尘滤清器',383,NULL),(894,90,'后部制动盘及制动片',3023,NULL),(895,90,'前部制动片',2021,NULL),(896,90,'前部制动盘及制动片',3766,NULL),(897,90,'火花塞',705,815),(898,90,'车辆检查',222,NULL),(900,90,'雨刮片',476,NULL),(901,91,'机油机率',1036,NULL),(902,91,'微尘滤清器',383,NULL),(904,91,'后部制动盘及制动片',3023,NULL),(905,91,'前部制动片',2021,NULL),(906,91,'前部制动盘及制动片',3766,NULL),(907,91,'火花塞',705,815),(908,91,'车辆检查',222,NULL),(910,91,'雨刮片',476,NULL),(911,92,'机油机率',861,NULL),(912,92,'微尘滤清器',383,NULL),(914,92,'后部制动盘及制动片',3023,NULL),(915,92,'前部制动片',2017,NULL),(916,92,'前部制动盘及制动片',3762,NULL),(917,92,'火花塞',892,990),(918,92,'车辆检查',222,NULL),(920,92,'雨刮片',476,NULL),(921,93,'机油机率',1161,NULL),(922,93,'微尘滤清器',383,NULL),(924,93,'后部制动盘及制动片',3023,NULL),(925,93,'前部制动片',1951,NULL),(926,93,'前部制动盘及制动片',3936,NULL),(927,93,'火花塞',871,1005),(928,93,'车辆检查',222,NULL),(930,93,'雨刮片',476,NULL),(931,94,'机油机率',1161,NULL),(932,94,'微尘滤清器',383,NULL),(934,94,'后部制动盘及制动片',3023,3409),(935,94,'前部制动片',1951,NULL),(936,94,'前部制动盘及制动片',4656,NULL),(937,94,'火花塞',705,1375),(938,94,'车辆检查',222,NULL),(940,94,'雨刮片',476,NULL),(941,95,'机油机率',948,NULL),(942,95,'微尘滤清器',524,567),(944,95,'后部制动盘及制动片',3921,NULL),(945,95,'前部制动片',2086,NULL),(946,95,'前部制动盘及制动片',4658,NULL),(947,95,'火花塞',668,815),(948,95,'车辆检查',222,NULL),(950,95,'雨刮片',541,NULL),(951,96,'机油机率',1161,NULL),(952,96,'微尘滤清器',397,567),(954,96,'后部制动盘及制动片',3921,NULL),(955,96,'前部制动片',2086,NULL),(956,96,'前部制动盘及制动片',4658,NULL),(957,96,'火花塞',797,NULL),(958,96,'车辆检查',222,NULL),(960,96,'雨刮片',541,NULL),(961,97,'机油机率',1161,NULL),(962,97,'微尘滤清器',397,567),(964,97,'后部制动盘及制动片',3921,NULL),(965,97,'前部制动片',2086,NULL),(966,97,'前部制动盘及制动片',4658,NULL),(967,97,'火花塞',1412,NULL),(968,97,'车辆检查',222,NULL),(970,97,'雨刮片',541,NULL),(971,98,'机油机率',1161,NULL),(972,98,'微尘滤清器',821,1274),(974,98,'后部制动盘及制动片',4018,NULL),(975,98,'前部制动片',2851,NULL),(976,98,'前部制动盘及制动片',5593,NULL),(977,98,'火花塞',834,1338),(978,98,'车辆检查',370,NULL),(980,98,'雨刮片',618,NULL),(981,99,'机油机率',1161,NULL),(982,99,'微尘滤清器',821,1274),(984,99,'后部制动盘及制动片',4018,NULL),(985,99,'前部制动片',2828,NULL),(986,99,'前部制动盘及制动片',5810,NULL),(987,99,'火花塞',1412,NULL),(988,99,'车辆检查',296,NULL),(990,99,'雨刮片',618,NULL),(991,100,'机油机率',1375,NULL),(992,100,'微尘滤清器',821,1274),(994,100,'后部制动盘及制动片',4246,NULL),(995,100,'前部制动片',2422,2851),(996,100,'前部制动盘及制动片',5884,NULL),(997,100,'火花塞',1932,1338),(998,100,'车辆检查',296,NULL),(1000,100,'雨刮片',618,NULL),(1001,101,'机油机率',1161,NULL),(1002,101,'微尘滤清器',821,1274),(1004,101,'后部制动盘及制动片',4018,NULL),(1005,101,'前部制动片',2828,NULL),(1006,101,'前部制动盘及制动片',5810,NULL),(1007,101,'火花塞',1412,NULL),(1008,101,'车辆检查',222,NULL),(1010,101,'雨刮片',618,NULL),(1011,102,'机油机率',1536,NULL),(1012,102,'微尘滤清器',821,1274),(1014,102,'后部制动盘及制动片',4246,NULL),(1015,102,'前部制动片',3617,NULL),(1016,102,'前部制动盘及制动片',8231,NULL),(1017,102,'火花塞',2030,NULL),(1018,102,'车辆检查',296,NULL),(1020,102,'雨刮片',618,NULL),(1021,103,'机油机率',1179,NULL),(1022,103,'微尘滤清器',1274,NULL),(1024,103,'后部制动盘及制动片',4821,NULL),(1025,103,'前部制动片',2828,NULL),(1026,103,'前部制动盘及制动片',5787,NULL),(1027,103,'火花塞',0,NULL),(1028,103,'车辆检查',222,NULL),(1030,103,'雨刮片',666,NULL),(1031,104,'机油机率',1161,NULL),(1032,104,'微尘滤清器',1274,NULL),(1034,104,'后部制动盘及制动片',4611,NULL),(1035,104,'前部制动片',2828,NULL),(1036,104,'前部制动盘及制动片',5787,NULL),(1037,104,'火花塞',1523,NULL),(1038,104,'车辆检查',222,NULL),(1040,104,'雨刮片',666,NULL),(1041,105,'机油机率',1525,NULL),(1042,105,'微尘滤清器',1274,NULL),(1044,105,'后部制动盘及制动片',4611,NULL),(1045,105,'前部制动片',3617,NULL),(1046,105,'前部制动盘及制动片',8448,NULL),(1047,105,'火花塞',1392,NULL),(1048,105,'车辆检查',222,NULL),(1050,105,'雨刮片',666,NULL),(1051,106,'机油机率',1161,NULL),(1052,106,'微尘滤清器',821,1274),(1054,106,'后部制动盘及制动片',4246,NULL),(1055,106,'前部制动片',2851,NULL),(1056,106,'前部制动盘及制动片',5833,NULL),(1057,106,'火花塞',1375,1560),(1058,106,'车辆检查',296,NULL),(1060,106,'雨刮片',618,NULL),(1061,107,'机油机率',1536,NULL),(1062,107,'微尘滤清器',821,1274),(1064,107,'后部制动盘及制动片',5428,NULL),(1065,107,'前部制动片',2422,3622),(1066,107,'前部制动盘及制动片',8236,NULL),(1067,107,'火花塞',2326,NULL),(1068,107,'车辆检查',296,NULL),(1070,107,'雨刮片',618,NULL),(1071,108,'机油机率',1161,NULL),(1072,108,'微尘滤清器',821,1274),(1074,108,'后部制动盘及制动片',4018,4246),(1075,108,'前部制动片',2422,2828),(1076,108,'前部制动盘及制动片',5810,5884),(1077,108,'火花塞',1375,1560),(1078,108,'车辆检查',296,NULL),(1080,108,'雨刮片',618,NULL),(1081,109,'机油机率',1161,NULL),(1082,109,'微尘滤清器',821,1274),(1084,109,'后部制动盘及制动片',4018,4246),(1085,109,'前部制动片',2828,NULL),(1086,109,'前部制动盘及制动片',5810,NULL),(1087,109,'火花塞',1375,NULL),(1088,109,'车辆检查',222,NULL),(1090,109,'雨刮片',618,NULL),(1091,110,'机油机率',1536,NULL),(1092,110,'微尘滤清器',821,1274),(1094,110,'后部制动盘及制动片',5428,NULL),(1095,110,'前部制动片',3622,NULL),(1096,110,'前部制动盘及制动片',8236,NULL),(1097,110,'火花塞',2326,NULL),(1098,110,'车辆检查',296,NULL),(1100,110,'雨刮片',618,NULL),(1101,111,'机油机率',1161,NULL),(1102,111,'微尘滤清器',437,556),(1104,111,'后部制动盘及制动片',3197,NULL),(1105,111,'前部制动片',1957,NULL),(1106,111,'前部制动盘及制动片',3550,NULL),(1107,111,'火花塞',1367,1428),(1108,111,'车辆检查',222,NULL),(1110,111,'雨刮片',490,NULL),(1111,112,'机油机率',1161,NULL),(1112,112,'微尘滤清器',437,556),(1114,112,'后部制动盘及制动片',3197,NULL),(1115,112,'前部制动片',1957,NULL),(1116,112,'前部制动盘及制动片',4390,NULL),(1117,112,'火花塞',1367,1428),(1118,112,'车辆检查',222,NULL),(1120,112,'雨刮片',490,NULL),(1121,113,'机油机率',1161,NULL),(1122,113,'微尘滤清器',437,556),(1124,113,'后部制动盘及制动片',3522,NULL),(1125,113,'前部制动片',1957,NULL),(1126,113,'前部制动盘及制动片',5286,NULL),(1127,113,'火花塞',1367,1428),(1128,113,'车辆检查',222,NULL),(1130,113,'雨刮片',490,NULL),(1131,114,'机油机率',965,NULL),(1132,114,'微尘滤清器',556,NULL),(1134,114,'后部制动盘及制动片',3197,NULL),(1135,114,'前部制动片',1957,NULL),(1136,114,'前部制动盘及制动片',3550,NULL),(1137,114,'火花塞',668,717),(1138,114,'车辆检查',222,NULL),(1140,114,'雨刮片',490,NULL),(1141,115,'机油机率',965,NULL),(1142,115,'微尘滤清器',556,NULL),(1144,115,'后部制动盘及制动片',3225,NULL),(1145,115,'前部制动片',1957,NULL),(1146,115,'前部制动盘及制动片',4390,NULL),(1147,115,'火花塞',668,717),(1148,115,'车辆检查',222,NULL),(1150,115,'雨刮片',490,NULL),(1151,116,'机油机率',1161,NULL),(1152,116,'微尘滤清器',556,NULL),(1154,116,'后部制动盘及制动片',3522,NULL),(1155,116,'前部制动片',1957,NULL),(1156,116,'前部制动盘及制动片',5286,NULL),(1157,116,'火花塞',1367,1428),(1158,116,'车辆检查',222,NULL),(1160,116,'雨刮片',490,NULL),(1161,117,'机油机率',1161,NULL),(1162,117,'微尘滤清器',556,NULL),(1164,117,'后部制动盘及制动片',3522,NULL),(1165,117,'前部制动片',1957,NULL),(1166,117,'前部制动盘及制动片',5286,NULL),(1167,117,'火花塞',1367,1428),(1168,117,'车辆检查',222,NULL),(1170,117,'雨刮片',490,NULL),(1171,6,'机油机率',123,1234),(1172,6,'机油机率',123,1234),(1173,68,'火花塞',0,0),(1174,6,'微尘滤清器',0,0);
/*!40000 ALTER TABLE `xdl_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_series`
--

DROP TABLE IF EXISTS `xdl_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_series` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `series` varchar(255) NOT NULL,
  `brandId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_series`
--

LOCK TABLES `xdl_series` WRITE;
/*!40000 ALTER TABLE `xdl_series` DISABLE KEYS */;
INSERT INTO `xdl_series` VALUES (1,'BMW 1系 两厢轿车',1),(2,'BMW 1系 两厢轿车(2011年之前上市)',1),(3,'BMW 2系 双门轿车',1),(4,'BMW 3系 GT',1),(5,'BMW 3系 敞篷轿跑车',1),(6,'BMW 3系 旅行轿车',1),(7,'BMW 3系 双门轿跑车',1),(8,'BMW 3系 四门轿车(2005-2008年上市)',1),(9,'BMW 3系 四门轿车(2008-2012年上市)',1),(10,'BMW 3系 四门轿车(自2012年上市)',1),(11,'BMW 4系 双门轿跑车',1),(12,'BMW 5系 GT',1),(13,'BMW 5系 旅行轿车(2010年之前上市)',1),(14,'BMW 5系 四门轿车',1),(15,'BMW 5系 四门轿车(2010年之前上市)',1),(16,'BMW 6系 敞篷娇跑车',1),(17,'BMW 6系 双门娇跑车',1),(18,'BMW 7系 四门轿车',1),(19,'BMW 7系 四门轿车(2009年之前上市)',1),(20,'BMW 7系 四门轿车(2010年之前上市)',1),(21,'BMW 7系 四门轿车(2011年之前上市)',1),(22,'BMW 7系 四门轿车(2012年之前上市)',1),(23,'BMW 7系 四门轿车(2013年之前上市)',1),(24,'BMW 7系 四门轿车(2014年之前上市)',1),(25,'BMW 7系 四门轿车(2015年之前上市)',1),(26,'BMW 7系 四门轿车(2016年之前上市)',1),(27,'BMW 7系 四门轿车(2017年之前上市)',1),(28,'BMW 7系 四门轿车(2018年之前上市)',1),(29,'BMW 7系 四门轿车(2019年之前上市)',1),(30,'BMW M系',1),(31,'BMW X1',1),(32,'BMW X1(2012年之前上市)',1),(33,'BMW X3',1),(34,'BMW X5',1),(35,'BMW X5(2014年上市)',1),(36,'BMW X6',1),(37,'BMW X6(2012年上市)',1),(38,'BMW Z4 敞篷跑车',1),(39,'新BMW Z4 敞篷跑车(2013年上市)',1);
/*!40000 ALTER TABLE `xdl_series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_server_car`
--

DROP TABLE IF EXISTS `xdl_server_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_server_car` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mark` char(20) NOT NULL,
  `storeId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_server_car`
--

LOCK TABLES `xdl_server_car` WRITE;
/*!40000 ALTER TABLE `xdl_server_car` DISABLE KEYS */;
INSERT INTO `xdl_server_car` VALUES (21,'A',27),(22,'天津的',29);
/*!40000 ALTER TABLE `xdl_server_car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_serviceman`
--

DROP TABLE IF EXISTS `xdl_serviceman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_serviceman` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `telephone` char(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_serviceman`
--

LOCK TABLES `xdl_serviceman` WRITE;
/*!40000 ALTER TABLE `xdl_serviceman` DISABLE KEYS */;
INSERT INTO `xdl_serviceman` VALUES (8,'jishi','dad37675f09f4e28b516fdcc2a4fc2e2','0','15670691243'),(10,'技师','dad37675f09f4e28b516fdcc2a4fc2e2','0','18888888888'),(11,'jishi2','9771f9c775742ec7af62ac9c90811f42','0','19999999999'),(12,'jishi3','77448df8eebe1ea1f34e8a89f17c0d9b','0','17777777777'),(13,'hello','827ccb0eea8a706c4c34a16891f84e7b','0','15638080805');
/*!40000 ALTER TABLE `xdl_serviceman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_serviceman_car`
--

DROP TABLE IF EXISTS `xdl_serviceman_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_serviceman_car` (
  `carId` int(11) DEFAULT NULL,
  `servicemanId` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_serviceman_car`
--

LOCK TABLES `xdl_serviceman_car` WRITE;
/*!40000 ALTER TABLE `xdl_serviceman_car` DISABLE KEYS */;
INSERT INTO `xdl_serviceman_car` VALUES (21,'8,11'),(22,'10,12');
/*!40000 ALTER TABLE `xdl_serviceman_car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_store`
--

DROP TABLE IF EXISTS `xdl_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_store` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `storeName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_store`
--

LOCK TABLES `xdl_store` WRITE;
/*!40000 ALTER TABLE `xdl_store` DISABLE KEYS */;
INSERT INTO `xdl_store` VALUES (27,'北京昌平区回龙观牛叉4S店'),(29,' 天津八部回族维修点');
/*!40000 ALTER TABLE `xdl_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_user_address`
--

DROP TABLE IF EXISTS `xdl_user_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '地址的id',
  `telephone` char(11) NOT NULL COMMENT '联系电话',
  `uid` int(11) NOT NULL COMMENT '用户id(登录的手机号)',
  `city` varchar(255) NOT NULL COMMENT '省,市,区',
  `street` varchar(255) NOT NULL COMMENT '地址名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_user_address`
--

LOCK TABLES `xdl_user_address` WRITE;
/*!40000 ALTER TABLE `xdl_user_address` DISABLE KEYS */;
INSERT INTO `xdl_user_address` VALUES (1,'12345678901',1,'上海 上海 虹桥','育荣教育园'),(2,'12345678901',2,'1','北京'),(3,'18010411664',7,'北京 北京 昌平区','育荣教育园区'),(4,'18010411664',6,'上海 上海 虹桥','和平大街91号'),(13,'15670691243',9,'北京 北京 昌平区','北京市122路'),(14,'15670691243',9,'上海 上海 虹桥','北京市23路'),(15,'13641144289',10,'北京 北京 昌平区','北京市丰台区北京南站-地铁站'),(20,'15670691243',9,'北京 北京 昌平区','北京市345快'),(21,'15670691243',9,'北京 北京 昌平区','北京市昌平区北京市育荣教育园区'),(22,'15670691243',9,'北京 北京 昌平区','北京市昌平区回龙观-地铁站'),(23,'15670691243',9,'北京 北京 昌平区','北京市120路');
/*!40000 ALTER TABLE `xdl_user_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_user_model`
--

DROP TABLE IF EXISTS `xdl_user_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_user_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `typeId` int(11) NOT NULL COMMENT '用户车型id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_user_model`
--

LOCK TABLES `xdl_user_model` WRITE;
/*!40000 ALTER TABLE `xdl_user_model` DISABLE KEYS */;
INSERT INTO `xdl_user_model` VALUES (21,12,7),(22,14,6),(32,2,10),(33,2,0),(40,5,9),(41,85,11),(42,10,9),(43,4,9),(44,1,9),(45,11,13),(46,6,9);
/*!40000 ALTER TABLE `xdl_user_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_webset`
--

DROP TABLE IF EXISTS `xdl_webset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_webset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '网站标题',
  `keyWords` varchar(30) NOT NULL COMMENT '网站关键字',
  `description` varchar(50) NOT NULL COMMENT '网站描述',
  `webLogo` varchar(50) NOT NULL COMMENT '网站logo',
  `webStatus` enum('0','1') NOT NULL DEFAULT '1' COMMENT '网站状态（0关闭,1开启）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_webset`
--

LOCK TABLES `xdl_webset` WRITE;
/*!40000 ALTER TABLE `xdl_webset` DISABLE KEYS */;
INSERT INTO `xdl_webset` VALUES (1,'标题1','关键字','描述','20150310211314673.jpg','1');
/*!40000 ALTER TABLE `xdl_webset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_wechat_user`
--

DROP TABLE IF EXISTS `xdl_wechat_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_wechat_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '关注者的id',
  `wechatId` varchar(255) NOT NULL COMMENT '微信号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_wechat_user`
--

LOCK TABLES `xdl_wechat_user` WRITE;
/*!40000 ALTER TABLE `xdl_wechat_user` DISABLE KEYS */;
INSERT INTO `xdl_wechat_user` VALUES (1,'123123123123123123123'),(2,'41324123123123123'),(3,'2132123123123123123');
/*!40000 ALTER TABLE `xdl_wechat_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_wx_message`
--

DROP TABLE IF EXISTS `xdl_wx_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_wx_message` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `msgid` bigint(20) NOT NULL,
  `tousername` varchar(32) NOT NULL,
  `fromusername` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_wx_message`
--

LOCK TABLES `xdl_wx_message` WRITE;
/*!40000 ALTER TABLE `xdl_wx_message` DISABLE KEYS */;
INSERT INTO `xdl_wx_message` VALUES (1,6130224736100496087,'gh_a4507ea89518','oiBFus2-4ev-WmB7d4JePMW15iGc',1427304171,'4444');
/*!40000 ALTER TABLE `xdl_wx_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_wx_reply`
--

DROP TABLE IF EXISTS `xdl_wx_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_wx_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_wx_reply`
--

LOCK TABLES `xdl_wx_reply` WRITE;
/*!40000 ALTER TABLE `xdl_wx_reply` DISABLE KEYS */;
INSERT INTO `xdl_wx_reply` VALUES (8,'技师登录','欢迎:\r\nhttp://121.42.31.5/tech.php'),(9,'1','11'),(10,'2','22'),(11,'3','33'),(12,'aaa','aaaaaaaaaaaaaaaaa');
/*!40000 ALTER TABLE `xdl_wx_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdl_wx_user`
--

DROP TABLE IF EXISTS `xdl_wx_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdl_wx_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tousername` char(50) NOT NULL,
  `fromusername` char(50) NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdl_wx_user`
--

LOCK TABLES `xdl_wx_user` WRITE;
/*!40000 ALTER TABLE `xdl_wx_user` DISABLE KEYS */;
INSERT INTO `xdl_wx_user` VALUES (1,'gh_a4507ea89518','oiBFus2-4ev-WmB7d4JePMW15iGc',1427073275),(5,'gh_a4507ea89518','oiBFus6ovgR2PcscYyrIwzz2gHjw',1427075190),(6,'gh_a4507ea89518','oiBFus5dJnF0-4bjfkREOHxXzzBg',1427080597),(7,'gh_a4507ea89518','oiBFus72wnpbYchstgpCGKO2VhRw',1427113717),(8,'gh_a4507ea89518','oiBFus-HROvy-D8Nzxuxbn73NUTc',1427115164),(9,'gh_a4507ea89518','oiBFus6mP1h8XANJjFrHzhu0ZbCk',1427115621),(10,'gh_a4507ea89518','oiBFusxJ3ifSzg36fk7gg4kbftDg',1427115736),(11,'gh_a4507ea89518','oiBFus1qnIHjeweREFGrFCRD-FqU',1427073275),(12,'gh_a4507ea89518','oiBFusznW7U0Cl7y8zGNM6kqymnk',1427073275),(13,'gh_a4507ea89518','oiBFus9dNBGaHzI76-bTx-R7ImsY',1427123120),(14,'gh_a4507ea89518','oiBFusw0xAvDZaMZRYtVdEpOnahI',1427129231),(15,'gh_a4507ea89518','oiBFus__ofJ75qngfDcMjivnl_No',1427160237),(16,'gh_a4507ea89518','oiBFus381vqFOHUtkoEM_jMCr2NE',1427175245),(17,'gh_a4507ea89518','oiBFus7EUOMOvPoG3Fo9P0WQQwq0',1427206445),(18,'gh_a4507ea89518','oiBFusw1O9IJtLoCCUYM6mULrtus',1427250230),(19,'gh_a4507ea89518','oiBFus6BsOwKaOCrjA_k38XzjCYo',1427250234),(20,'gh_a4507ea89518','oiBFus-XoEfQ-mV1QvcLDIgzJHfc',1427250245),(21,'gh_a4507ea89518','oiBFus3JCFUIbVr97FBsy3AVxiM0',1427250273),(22,'gh_a4507ea89518','oiBFuszVVz7VzUbynQtHU8OWlrvs',1427250275),(23,'gh_a4507ea89518','oiBFus8IpE5quYjeF0aCRTZzjweY',1427250277),(24,'gh_a4507ea89518','oiBFus6kaqOqD8KU9e7Sg7xFBWl0',1427250279);
/*!40000 ALTER TABLE `xdl_wx_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-26 18:08:16
