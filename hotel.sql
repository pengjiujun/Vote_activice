/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : hotel

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 16/04/2019 09:00:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(32) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '超级管理员用户名称',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '超级管理员用户密码',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES (1, 'admin', '4297f44b13955235245b2497399d7a93');

-- ----------------------------
-- Table structure for hotel
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` char(32) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL COMMENT '酒店所在城市',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '酒店名称',
  `datetime` datetime NOT NULL COMMENT '酒店添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hotel
-- ----------------------------
INSERT INTO `hotel` VALUES (10, '上海', '东升酒店', '2019-04-15 11:05:00');
INSERT INTO `hotel` VALUES (9, '上海', '985宾馆', '2019-03-31 13:30:10');
INSERT INTO `hotel` VALUES (8, '郑州', ' 速8酒店', '2019-04-12 10:57:36');
INSERT INTO `hotel` VALUES (6, '上海', '泰安酒店', '2019-04-12 10:57:26');
INSERT INTO `hotel` VALUES (7, '上海', '天艺酒店', '2019-04-12 10:57:31');
INSERT INTO `hotel` VALUES (11, '郑州', '海滨国际', '2019-04-15 11:13:47');
INSERT INTO `hotel` VALUES (12, '郑州', '建正东方中心', '2019-04-15 11:14:26');
INSERT INTO `hotel` VALUES (13, '上海', '嘉怡东方中心', '2019-04-15 13:28:04');
INSERT INTO `hotel` VALUES (15, '北京', '桔子水晶', '2019-04-15 22:52:54');
INSERT INTO `hotel` VALUES (18, '北京', '望京大厦', '2019-04-16 22:54:16');
INSERT INTO `hotel` VALUES (20, '北京', '盘古七星', '2019-04-16 22:55:19');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL COMMENT '控制活动是否开启，1为开启，2为不开启',
  `k_time` datetime NULL DEFAULT NULL COMMENT '活动开启时间',
  `g_time` datetime NULL DEFAULT NULL COMMENT '活动关闭时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES (1, 1, '2019-04-04 00:00:00', '2019-05-16 00:00:00');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '用户昵称',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '用户密码',
  `hotel_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '用户所选酒店id',
  `datetime` datetime NOT NULL COMMENT '用户创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'jack', '4297f44b13955235245b2497399d7a93', '15,18,20||8,11,15||10,9,7||10,9,13||10,7,13||10,9,6||8,6,7||', '2019-04-12 11:26:39');
INSERT INTO `user` VALUES (5, '楚留', '5bd1ba44696f2d3163616a3acd06de7b', '9,8,11||10||', '2019-04-12 13:28:22');

SET FOREIGN_KEY_CHECKS = 1;
