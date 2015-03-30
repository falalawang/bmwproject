-- MySQL dump 10.13  Distrib 5.5.40, for linux2.6 (x86_64)
--
-- Host: localhost    Database: bjbmw
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
-- Table structure for table `bmw_brand`
--

DROP TABLE IF EXISTS `bmw_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL COMMENT '品牌名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_brand`
--

LOCK TABLES `bmw_brand` WRITE;
/*!40000 ALTER TABLE `bmw_brand` DISABLE KEYS */;
INSERT INTO `bmw_brand` VALUES (1,'大众'),(2,'奥迪'),(3,'宝马'),(4,'奔驰');
/*!40000 ALTER TABLE `bmw_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_car`
--

DROP TABLE IF EXISTS `bmw_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_car` (
  `carid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `technicians` varchar(255) DEFAULT NULL COMMENT '技师人员',
  `shopid` int(11) DEFAULT NULL COMMENT '所属公司id',
  `carname` varchar(32) DEFAULT NULL COMMENT '服务车的名称',
  PRIMARY KEY (`carid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_car`
--

LOCK TABLES `bmw_car` WRITE;
/*!40000 ALTER TABLE `bmw_car` DISABLE KEYS */;
INSERT INTO `bmw_car` VALUES (1,'',0,'--'),(2,'小崽子',1,'奔驰'),(3,'admin567',1,'宝马');
/*!40000 ALTER TABLE `bmw_car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_city`
--

DROP TABLE IF EXISTS `bmw_city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(255) DEFAULT NULL COMMENT '用来标记4s店是那个城市的',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_city`
--

LOCK TABLES `bmw_city` WRITE;
/*!40000 ALTER TABLE `bmw_city` DISABLE KEYS */;
INSERT INTO `bmw_city` VALUES (1,'北京'),(3,'天津');
/*!40000 ALTER TABLE `bmw_city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_client`
--

DROP TABLE IF EXISTS `bmw_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_client` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clientname` varchar(255) DEFAULT NULL COMMENT '客户姓名',
  `tel` varchar(11) DEFAULT NULL COMMENT '电话',
  `lpnum` varchar(32) DEFAULT NULL COMMENT '客户的车牌号',
  `address1` varchar(255) DEFAULT NULL COMMENT '常用地址1',
  `address2` varchar(255) DEFAULT NULL COMMENT '常用地址2',
  `address3` varchar(255) DEFAULT NULL COMMENT '常用地址3',
  `astatus` enum('0','1','2') DEFAULT NULL COMMENT '用哪个地址作为默认地址',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_client`
--

LOCK TABLES `bmw_client` WRITE;
/*!40000 ALTER TABLE `bmw_client` DISABLE KEYS */;
INSERT INTO `bmw_client` VALUES (1,'张三','18610878225','2','北京市朝阳区','北京市海淀区','','1'),(8,'刘玉星','18964974363',NULL,'葫芦岛','西单','沙河',NULL),(11,'郭','18272706033',NULL,'123','咯空间',NULL,NULL);
/*!40000 ALTER TABLE `bmw_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_config`
--

DROP TABLE IF EXISTS `bmw_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_config` (
  `id` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT NULL COMMENT '网站开关状态',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键字',
  `description` text COMMENT '描述',
  `copyright` varchar(255) DEFAULT NULL COMMENT '版权',
  `logo` varchar(255) DEFAULT NULL COMMENT 'logo图片名',
  `link` text COMMENT '友情链接',
  `webname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_config`
--

LOCK TABLES `bmw_config` WRITE;
/*!40000 ALTER TABLE `bmw_config` DISABLE KEYS */;
INSERT INTO `bmw_config` VALUES (1,'1','23','213','©2015 YuRuiAn  宇瑞安 京ICP证030173号 ','./Logo/2015-03-23/5510279645b3b.jpg','<p>13</p>','宇瑞安网');
/*!40000 ALTER TABLE `bmw_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_model`
--

DROP TABLE IF EXISTS `bmw_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_model` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(255) DEFAULT NULL COMMENT '车型',
  `brandid` varchar(255) DEFAULT NULL COMMENT '品牌id',
  `seriesid` varchar(255) DEFAULT NULL COMMENT '车系id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_model`
--

LOCK TABLES `bmw_model` WRITE;
/*!40000 ALTER TABLE `bmw_model` DISABLE KEYS */;
INSERT INTO `bmw_model` VALUES (1,'大众111','1','1'),(2,'大众222','1','2'),(3,'奥迪11222','1','1');
/*!40000 ALTER TABLE `bmw_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_operatecord`
--

DROP TABLE IF EXISTS `bmw_operatecord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_operatecord` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `operation` varchar(255) DEFAULT NULL COMMENT '操作详细信息  table  操作的字段 什么操作 谁操作的',
  `otime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_operatecord`
--

LOCK TABLES `bmw_operatecord` WRITE;
/*!40000 ALTER TABLE `bmw_operatecord` DISABLE KEYS */;
INSERT INTO `bmw_operatecord` VALUES (11,2,'231',1411231324),(12,NULL,'修改了1号订单,最终价格：1423,日期：1424242423,时间：请选择,服务车：  ,订单状态：确定',1426126662),(13,NULL,'修改了1号订单,最终价格：1423,日期：1424242423,时间：请选择,服务车：  ,订单状态：确定',1426127280),(14,NULL,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：8:00-9:00,服务车：2222  奔驰,订单状态：确定',1426128224),(15,NULL,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：8:00-9:00,服务车：2222  奔驰,订单状态：取消',1426128300),(16,NULL,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：9:00-10:00,服务车：2222  奔驰,订单状态：确定',1426128348),(17,NULL,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：请选择,服务车：  ,订单状态：确定',1426128589),(18,NULL,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：9:00-10:00,服务车：2222  奔驰,订单状态：确定',1426128634),(19,2,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：11:00-12:00,服务车：2222  宝马,订单状态：确定',1426129005),(20,2,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：请选择,服务车：  ,订单状态：取消',1426129275),(21,2,'修改了2号订单,最终价格：1800,日期：23332332,时间：请选择,服务车：  ,订单状态：确定',1426129532),(22,2,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：请选择,服务车：  ,订单状态：确定',1426130145),(23,2,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：请选择,服务车：  ,订单状态：确定',1426130188),(24,2,'修改了2号订单,最终价格：1800,日期：23332332,时间：请选择,服务车：  ,订单状态：确定',1426130205),(25,2,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：请选择,服务车：  --,订单状态：取消',1426130553),(26,2,'修改了2号订单,最终价格：1800,日期：23332332,时间：请选择,服务车：  --,订单状态：取消',1426130568),(27,2,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：请选择,服务车：  --,订单状态：确定',1426130578),(28,2,'修改了2号订单,最终价格：1800,日期：23332332,时间：请选择,服务车：  --,订单状态：确定',1426130589),(29,2,'修改了2号订单,最终价格：1800,日期：23332332,时间：请选择,服务车：  --,订单状态：取消',1426130667),(30,2,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：请选择,服务车：  --,订单状态：取消',1426130699),(31,2,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：请选择,服务车：  --,订单状态：确定',1426130846),(32,2,'修改了3号订单,最终价格：12300,日期：1,时间：请选择,服务车：  --,订单状态：确定',1426141756),(33,2,'修改了2号订单,最终价格：1800,日期：23332332,时间：请选择,服务车：  --,订单状态：确定',1426141939),(34,3,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：9:00-10:00,服务车：2222  宝马,订单状态：确定',1426227818),(35,3,'修改了2号订单,最终价格：1800,日期：2015-3-20,时间：11:00-12:00,服务车：2222  奔驰,订单状态：确定',1426228234),(36,3,'修改了3号订单,最终价格：12300,日期：1,时间：请选择,服务车：  --,订单状态：取消',1426228431),(37,3,'修改了2号订单,最终价格：1800,日期：2015-3-20,时间：请选择,服务车：  --,订单状态：取消',1426228441),(38,3,'修改了2号订单,最终价格：1800,日期：2015-3-20,时间：请选择,服务车：  --,订单状态：确定',1426228469),(39,3,'修改了3号订单,最终价格：12300,日期：1,时间：请选择,服务车：  --,订单状态：确定',1426228485),(40,2,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：8:00-9:00,服务车：2222  宝马,订单状态：确定',1427092312),(41,2,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：10:00-11:00,服务车：2222  奔驰,订单状态：确定',1427092608),(42,2,'修改了1号订单,最终价格：1500,日期：2015-3-10,时间：8:00-9:00,服务车：2222  奔驰,订单状态：确定',1427092768),(43,2,'修改了15号订单,最终价格：2000,日期：2015/03/21,时间：8:00-9:00,服务车：2222  奔驰,订单状态：确定',1427092799),(44,2,'修改了14260923591号订单,车品牌：大众,车系：大众1,车型：大众111',1427095246),(45,2,'修改了14260923591号订单,最终价格：1500,日期：2015-3-10,时间：9:00-10:00,服务车：2222  奔驰,订单状态：确定',1427095392),(46,2,'修改了14261207972号订单,最终价格：1800,日期：2015-3-20,时间：12:00-13:00,服务车：2222  宝马,订单状态：确定',1427095883),(47,2,'修改了14261207972号订单,车品牌：大众,车系：大众2,车型：大众222',1427095955),(48,10,'修改了14260923591号订单,最终价格：1500,日期：2015-3-10,时间：请选择,服务车：  --,订单状态：确定',1427158089),(49,10,'修改了14260923591号订单,最终价格：1500,日期：2015-3-10,时间：请选择,服务车：  --,订单状态：取消',1427158127),(50,10,'修改了14261207972号订单,最终价格：1800,日期：2015-3-20,时间：9:00-10:00,服务车：  --,订单状态：取消',1427158148),(51,10,'修改了14261207975号订单,最终价格：12300,日期：2015/3/25,时间：9:00-10:00,服务车：2222  奔驰,订单状态：确定',1427158185),(52,3,'修改了14260923591号订单,车品牌：大众,车系：大众1,车型：大众111',1427158652),(53,3,'修改了14261207972号订单,车品牌：大众,车系：大众2,车型：大众222',1427158682),(54,3,'修改了14260923591号订单,车品牌：大众,车系：大众1,车型：大众111',1427159565),(55,3,'修改了14261207972号订单,车品牌：大众,车系：大众2,车型：大众222',1427159582),(56,NULL,'修改了142716452917号订单,最终价格：10000,日期：2015/03/28,时间：11:00-12:00,服务车：2222  奔驰,订单状态：确定',1427164659),(57,3,'修改了14261207975号订单,最终价格：12300,日期：2015/03/25,时间：9:00-10:00地点：北京市昌平区回龙观,服务车：2222  宝马,订单状态：确定',1427183425),(58,3,'修改了142718589237号订单,最终价格：3369,日期：2015/03/29,时间：请选择,地点：沙河,服务车：2222  奔驰,订单状态：确定',1427185992),(59,3,'修改了142718589237号订单,最终价格：3369,日期：2015/03/29,时间：14:00-15:00,地点：沙河,服务车：2222  宝马,订单状态：确定',1427186056),(60,3,'修改了14260923591号订单,车品牌：大众,车系：大众1,车型：大众111',1427201069),(61,3,'修改了14261207975号订单,最终价格：6646,日期：2015/03/25,时间：11:00-12:00,地点：北京市昌平区回龙观,服务车：2222  奔驰,订单状态：确定',1427201089),(62,3,'修改了14260923591号订单,最终价格：1500,日期：2015/03/25,时间：9:00-10:00,地点：1,服务车：2222  奔驰,订单状态：确定',1427201154),(63,3,'修改了142726501854号订单,最终价格：123,日期：2015/03/26,时间：9:00-10:00,地点：123,服务车：宝马4S店  奔驰,订单状态：确定',1427265148),(64,3,'修改了142726501854号订单,最终价格：123,日期：2015/03/26,时间：8:00-9:00,地点：呵呵,服务车：宝马4S店  宝马,订单状态：确定',1427301348),(65,3,'修改了14261207972号订单,车品牌：大众,车系：大众2,车型：大众222',1427301389);
/*!40000 ALTER TABLE `bmw_operatecord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_order`
--

DROP TABLE IF EXISTS `bmw_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单号 主键自增',
  `tel` varchar(11) NOT NULL COMMENT '手机号',
  `city` varchar(32) DEFAULT NULL COMMENT '所在城市',
  `vin` varchar(32) DEFAULT NULL COMMENT 'vin码',
  `carmodel` varchar(255) DEFAULT NULL COMMENT '品牌、车系、车型的组合',
  `status` enum('7','6','5','4','3','2','1','0') DEFAULT NULL COMMENT '0已取消 1已提交 2已确认 3已出发 4已接车 5已完成 6已付款 7已评价',
  `hopedata` varchar(255) DEFAULT NULL COMMENT '预约日期',
  `hopetime` varchar(255) DEFAULT NULL COMMENT '预约时间',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `carid` int(11) DEFAULT NULL COMMENT '服务车id',
  `massage` text COMMENT '留言',
  `evaluate` varchar(255) DEFAULT NULL COMMENT '用户评价',
  `checkreport` varchar(255) DEFAULT NULL COMMENT '体检报告',
  `services` varchar(255) DEFAULT NULL COMMENT '订单所需服务项用逗号连接的服务项id',
  `oldprice` varchar(32) DEFAULT NULL COMMENT '订单的价格',
  `finalprice` int(11) DEFAULT NULL COMMENT '最终价格',
  `ordernumber` varchar(32) DEFAULT '' COMMENT '订单号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_order`
--

LOCK TABLES `bmw_order` WRITE;
/*!40000 ALTER TABLE `bmw_order` DISABLE KEYS */;
INSERT INTO `bmw_order` VALUES (1,'18610878225','北京','12','大众 大众1 大众111','2','2015/03/25','9:00-10:00','1',2,'a','0','a','1,2,3','0',1500,'14260923591'),(2,'18272706033','北京','2','大众 大众2 大众222','7','2015/03/25','9:00-10:00','2',3,'65','2','2','4,5,6','3377-4246',1800,'14261207972'),(3,'18272706033','北京','23456456','大众 大众1 大众111','7','2015/03/25','11:00-12:00','北京市昌平区回龙观',2,'31','','2','1,2,3,4,5,6','6623-6646',6646,'14261207975'),(15,'18610878224','北京','','大众 大众1 大众111','2','2015/03/21','8:00-9:00','东直门\r\n',3,'assssssssss',NULL,NULL,'1,2,3','3246-3269',2000,'142664814515'),(33,'18272706033','北京','','大众 大众1 大众111','7','2015/03/28','14:00-15:00','北京市朝阳区',1,'',NULL,NULL,'4','131',NULL,'142718384233'),(35,'18964974363','北京','123456','大众 大众1 大众111','7','2015/03/31','15:00-16:00','葫芦岛',1,'aaaa',NULL,NULL,'6','3123 ',NULL,'142718542335'),(37,'18272706033','北京','123456','大众 大众1 大众111','7','2015/03/29','14:00-15:00','沙河',3,'hhhhhhhhhh','较好',NULL,'5,6,7','3369',3369,'142718589237'),(51,'18272706033','北京','1234567','大众 大众1 大众111','7','2015/03/26','8:00-9:00','葫芦岛',1,'二位','非常满意',NULL,'2,3,4','3377-3354',NULL,'142720745451'),(54,'18272706033','北京','4556','大众 大众2 大众222','7','2015/03/26','8:00-9:00','呵呵',3,'1234','满意','','4,5','254-1123',123,'142726501854'),(56,'18272706033','北京','123545','大众 大众1 大众111','7','2015/03/27','11:00-12:00','咯空间',1,'1233456','较好',NULL,'3,5,6,8','4600-4577',NULL,'142730062156'),(57,'18272706033','北京','回家咯','大众 大众1 大众111','7','2015/03/27','12:00-13:00','咯空间',1,'1233','满意',NULL,'3,5,6,10','3492-3469',NULL,'142730077257');
/*!40000 ALTER TABLE `bmw_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_sercode`
--

DROP TABLE IF EXISTS `bmw_sercode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_sercode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL COMMENT '服务名',
  `sercode` varchar(255) NOT NULL COMMENT '字符代码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_sercode`
--

LOCK TABLES `bmw_sercode` WRITE;
/*!40000 ALTER TABLE `bmw_sercode` DISABLE KEYS */;
INSERT INTO `bmw_sercode` VALUES (1,'机油机滤','eoof'),(2,'微尘滤清器','microfil'),(3,'后部制动片','rearbpiece'),(4,'后部制动盘及制动片','rearbdisc'),(5,'前部制动片','fbpiece'),(6,'前部制动盘及制动片','frontbdisc'),(7,'火花塞','ngk'),(8,'车辆检查','carcheck'),(9,'空气滤清器','aircleaner'),(10,'雨刮片','nwb');
/*!40000 ALTER TABLE `bmw_sercode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_series`
--

DROP TABLE IF EXISTS `bmw_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_series` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `series` varchar(255) DEFAULT NULL COMMENT '车系名',
  `brandid` varchar(255) DEFAULT NULL COMMENT '品牌id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_series`
--

LOCK TABLES `bmw_series` WRITE;
/*!40000 ALTER TABLE `bmw_series` DISABLE KEYS */;
INSERT INTO `bmw_series` VALUES (1,'大众1','1'),(2,'大众2','1'),(3,'奥迪1','2'),(4,'奥迪2','2');
/*!40000 ALTER TABLE `bmw_series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_serprice`
--

DROP TABLE IF EXISTS `bmw_serprice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_serprice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(32) DEFAULT NULL COMMENT '品牌',
  `series` varchar(32) DEFAULT NULL COMMENT '车系',
  `model` varchar(32) DEFAULT NULL COMMENT '车型',
  `eoof` varchar(255) DEFAULT NULL COMMENT '机油机滤',
  `microfil` varchar(255) DEFAULT NULL COMMENT '微尘滤清器',
  `rearbpiece` varchar(255) DEFAULT NULL COMMENT '后部制动片',
  `rearbdisc` varchar(255) DEFAULT NULL COMMENT '后部制动盘及制动片',
  `fbpiece` varchar(255) DEFAULT NULL COMMENT '前部制动片',
  `frontbdisc` varchar(255) DEFAULT NULL COMMENT '前部制动盘及制动片',
  `ngk` varchar(255) DEFAULT NULL COMMENT '火花塞',
  `carcheck` varchar(255) DEFAULT NULL COMMENT '车辆检查',
  `aircleaner` varchar(255) DEFAULT NULL COMMENT '空气滤清器',
  `nwb` varchar(255) DEFAULT NULL COMMENT '雨刮片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_serprice`
--

LOCK TABLES `bmw_serprice` WRITE;
/*!40000 ALTER TABLE `bmw_serprice` DISABLE KEYS */;
INSERT INTO `bmw_serprice` VALUES (1,'大众','大众1','大众111','23','3123','123/100','131','123','3123','123','1231','123','123'),(2,'大众','大众2','大众222','23','3123','123','131/1000','123','3123','123','1231','123','123');
/*!40000 ALTER TABLE `bmw_serprice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_shop`
--

DROP TABLE IF EXISTS `bmw_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopname` varchar(255) DEFAULT NULL COMMENT '4s店名',
  `ofcity` varchar(255) DEFAULT NULL COMMENT '属于哪个城市  城市名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_shop`
--

LOCK TABLES `bmw_shop` WRITE;
/*!40000 ALTER TABLE `bmw_shop` DISABLE KEYS */;
INSERT INTO `bmw_shop` VALUES (1,'宝马4S店','北京'),(3,'奥迪4S店','天津');
/*!40000 ALTER TABLE `bmw_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmw_user`
--

DROP TABLE IF EXISTS `bmw_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmw_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL COMMENT '用户账号',
  `password` char(32) NOT NULL,
  `status` enum('3','2','1','0') NOT NULL COMMENT '用户权限 0超级管理员 1管理员 2客服 3技师',
  `username` varchar(255) DEFAULT NULL COMMENT '用户昵称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmw_user`
--

LOCK TABLES `bmw_user` WRITE;
/*!40000 ALTER TABLE `bmw_user` DISABLE KEYS */;
INSERT INTO `bmw_user` VALUES (1,'2','132','1','123'),(2,'a','202cb962ac59075b964b07152d234b70','0','123'),(3,'admin','21232f297a57a5a743894a0e4a801fc3','0','2'),(4,'aa','202cb962ac59075b964b07152d234b70','2','zzzzzzz'),(6,'afd','1','0','af'),(7,'12','23','3','aaaaa '),(8,'1','2','2',''),(9,'er','1','2',''),(10,'demo','fe01ce2a7fbac8fafaed7c982a04e229','2','aaaa'),(11,'test','098f6bcd4621d373cade4e832627b4f6','3','admin567');
/*!40000 ALTER TABLE `bmw_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-26 18:11:12
