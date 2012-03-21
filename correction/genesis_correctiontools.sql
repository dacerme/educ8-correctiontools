/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50017
Source Host           : localhost:3306
Source Database       : genesis_correctiontools

Target Server Type    : MYSQL
Target Server Version : 50017
File Encoding         : 65001

Date: 2012-03-21 17:39:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ct_group`
-- ----------------------------
DROP TABLE IF EXISTS `ct_group`;
CREATE TABLE `ct_group` (
  `gid` int(11) NOT NULL auto_increment,
  `groupname` varchar(20) NOT NULL,
  `status` int(1) NOT NULL default '1',
  PRIMARY KEY  (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_group
-- ----------------------------
INSERT INTO `ct_group` VALUES ('1', 'admin', '1');
INSERT INTO `ct_group` VALUES ('2', 'user', '1');
INSERT INTO `ct_group` VALUES ('3', 'teacher', '1');

-- ----------------------------
-- Table structure for `ct_user`
-- ----------------------------
DROP TABLE IF EXISTS `ct_user`;
CREATE TABLE `ct_user` (
  `uid` int(11) NOT NULL auto_increment COMMENT 'userid',
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` int(1) default NULL,
  `country` varchar(20) default NULL,
  `active` int(1) NOT NULL default '1',
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_user
-- ----------------------------

-- ----------------------------
-- Table structure for `ct_user_plus`
-- ----------------------------
DROP TABLE IF EXISTS `ct_user_plus`;
CREATE TABLE `ct_user_plus` (
  `uid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL default '2',
  `lastip` varchar(20) default NULL,
  `lastsignin` timestamp NULL default NULL,
  `account` float(4,2) default '0.00',
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_user_plus
-- ----------------------------
