/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xm

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-12-07 14:07:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin_role`;
CREATE TABLE `tp_admin_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `role_name` varchar(30) DEFAULT NULL COMMENT '角色名称',
  `act_list` text COMMENT '权限列表',
  `role_desc` varchar(255) DEFAULT NULL COMMENT '角色描述',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_admin_role
-- ----------------------------

-- ----------------------------
-- Table structure for tp_admin_users
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin_users`;
CREATE TABLE `tp_admin_users` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `email` varchar(60) NOT NULL DEFAULT '' COMMENT '邮箱',
  `password` varchar(60) NOT NULL DEFAULT '' COMMENT '密码',
  `end_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `role_id` smallint(5) NOT NULL DEFAULT '0' COMMENT '角色id',
  `nav_id` smallint(5) NOT NULL DEFAULT '0' COMMENT '权限id',
  `end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后登录时间',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_admin_users
-- ----------------------------

-- ----------------------------
-- Table structure for tp_system_module
-- ----------------------------
DROP TABLE IF EXISTS `tp_system_module`;
CREATE TABLE `tp_system_module` (
  `mod_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '模块id',
  `module` enum('top','menu','module') DEFAULT 'module' COMMENT '模块类型 module模块 menu菜单栏',
  `level` tinyint(1) DEFAULT NULL COMMENT '层级',
  `ctl` varchar(20) DEFAULT '' COMMENT '控制器名称',
  `act` varchar(30) DEFAULT '' COMMENT '方法名称',
  `title` varchar(20) DEFAULT '' COMMENT '菜单名称',
  `visible` tinyint(1) DEFAULT '1' COMMENT '是否有效 1有效 0无效',
  `parent_id` smallint(6) DEFAULT '0' COMMENT '父类id',
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_system_module
-- ----------------------------
INSERT INTO `tp_system_module` VALUES ('1', 'menu', '1', '', '', '管理员管理', '1', '0');
INSERT INTO `tp_system_module` VALUES ('2', 'menu', '1', '', '', '会员管理', '1', '0');
INSERT INTO `tp_system_module` VALUES ('3', 'menu', '1', '', '', '订单管理', '1', '0');
INSERT INTO `tp_system_module` VALUES ('4', 'menu', '1', '', '', '分类管理', '1', '0');
