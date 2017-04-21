<?php
defined('BASEPATH') OR exit('No direct script access allowed');

-- MySQL dump 10.13  Distrib 5.7.17, for Linux (i686)
--
-- Host: localhost    Database: hzxcsydb
-- User: hzxcsydbadmin Password: hzxcsyzj
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
-- Table structure for table `xc_article`
--

DROP TABLE IF EXISTS `xc_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xc_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(128) NOT NULL COMMENT '文章标题',
  `contant` text NOT NULL COMMENT '文章内容',
  `pv` int(11) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建id的时间',
  `create_user` varchar(32) NOT NULL DEFAULT 'admin' COMMENT '创建者',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '显示的状态, 0表示显示，非0表示不显示',
  `summary` varchar(256) DEFAULT NULL,
  `item_img` varchar(128) DEFAULT NULL,
  `cato_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_cato_fk` (`cato_id`),
  CONSTRAINT `article_cato_fk` FOREIGN KEY (`cato_id`) REFERENCES `xc_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xc_cangku`
--

DROP TABLE IF EXISTS `xc_cangku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xc_cangku` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(16) NOT NULL DEFAULT '杭州协创实业有限公司' COMMENT '中心库名称',
  `address` varchar(128) NOT NULL COMMENT '中心库地址',
  `phone` varchar(64) DEFAULT NULL COMMENT '联系电话',
  `email` varchar(64) DEFAULT NULL COMMENT '联系邮箱',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建id的时间',
  `create_user` varchar(32) NOT NULL DEFAULT 'admin' COMMENT '创建者',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '显示的状态, 0表示显示，非0表示不显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xc_carousel`
--

DROP TABLE IF EXISTS `xc_carousel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xc_carousel` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `img_path` varchar(128) NOT NULL DEFAULT 'carousel_default_img.png' COMMENT '轮播图片路径',
  `url` varchar(128) DEFAULT NULL COMMENT '链接',
  `item_desc` varchar(32) DEFAULT NULL COMMENT '轮播描述',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建id的时间',
  `create_user` varchar(32) NOT NULL DEFAULT 'admin' COMMENT '创建者',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '显示的状态, 0表示显示，非0表示不显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xc_category`
--

DROP TABLE IF EXISTS `xc_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xc_category` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(16) NOT NULL DEFAULT '公司咨询',
  `en_name` varchar(16) DEFAULT 'News' COMMENT '分类英文名称',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建id的时间',
  `create_user` varchar(32) NOT NULL DEFAULT 'admin' COMMENT '创建者',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '显示的状态, 0表示显示，非0表示不显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xc_cooperator`
--

DROP TABLE IF EXISTS `xc_cooperator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xc_cooperator` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(10) NOT NULL COMMENT '合作伙伴名称',
  `img_path` varchar(128) NOT NULL DEFAULT 'cooperator_default_img.png' COMMENT '合作伙伴图片路径',
  `url` varchar(128) DEFAULT NULL COMMENT '链接',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建id的时间',
  `create_user` varchar(32) NOT NULL DEFAULT 'admin' COMMENT '创建者',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '显示的状态, 0表示显示，非0表示不显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xc_galley`
--

DROP TABLE IF EXISTS `xc_galley`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xc_galley` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `img_src` varchar(256) NOT NULL COMMENT '相册item的路径',
  `img_small_src` varchar(256) NOT NULL COMMENT '相册item缩略图的路径',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建id的时间',
  `create_user` varchar(32) NOT NULL DEFAULT 'admin' COMMENT '创建者',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '显示的状态, 0表示显示，非0表示不显示',
  `group_id` int(3) NOT NULL COMMENT '相册组的外键',
  PRIMARY KEY (`id`),
  KEY `fk_xc_galley_togroup` (`group_id`),
  CONSTRAINT `fk_xc_galley_togroup` FOREIGN KEY (`group_id`) REFERENCES `xc_galley_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xc_galley_group`
--

DROP TABLE IF EXISTS `xc_galley_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xc_galley_group` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cover_img_path` varchar(128) NOT NULL COMMENT '图集封面',
  `name` varchar(16) NOT NULL DEFAULT '协创相册' COMMENT '协创相册',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建id的时间',
  `create_user` varchar(32) NOT NULL DEFAULT 'admin' COMMENT '创建者',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '显示的状态, 0表示显示，非0表示不显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xc_job`
--

DROP TABLE IF EXISTS `xc_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xc_job` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `NAME` varchar(16) NOT NULL COMMENT '职位名称',
  `address` varchar(32) NOT NULL COMMENT '工作地点',
  `recruit_count` int(3) NOT NULL DEFAULT '0' COMMENT '招聘人数',
  `ability` text NOT NULL COMMENT '岗位职能',
  `requirement` text NOT NULL COMMENT '职位要求',
  `remark` text COMMENT '备注',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建id的时间',
  `create_user` varchar(32) NOT NULL DEFAULT 'admin' COMMENT '创建者',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '显示的状态, 0表示显示，非0表示不显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xc_navbar`
--

DROP TABLE IF EXISTS `xc_navbar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xc_navbar` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(10) NOT NULL COMMENT '导航名称',
  `pid` int(4) NOT NULL DEFAULT '0' COMMENT '父级id, 若是一级则父级id为0,若是二级则此id是父级id',
  `url` varchar(256) NOT NULL DEFAULT '/' COMMENT '链接',
  `rel` varchar(32) NOT NULL DEFAULT '/index' COMMENT '标识当前链接，以便高亮导航菜单',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建id的时间',
  `create_user` varchar(32) NOT NULL DEFAULT 'admin' COMMENT '创建者',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '显示的状态, 0表示显示，非0表示不显示',
  `target` varchar(10) DEFAULT NULL COMMENT '链接属性',
  `sort` int(2) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xc_user`
--

DROP TABLE IF EXISTS `xc_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xc_user` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `useremail` varchar(64) NOT NULL COMMENT '用户邮箱',
  `password` varchar(64) NOT NULL COMMENT '密码',
  `avatar` varchar(256) NOT NULL DEFAULT '/static/img/logo-small.png' COMMENT '头像',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建id的时间',
  `create_user` varchar(32) NOT NULL DEFAULT 'admin' COMMENT '创建者',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '显示的状态, 0表示显示，非0表示不显示',
  PRIMARY KEY (`id`),
  UNIQUE KEY `useremail` (`useremail`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-19 15:40:37
