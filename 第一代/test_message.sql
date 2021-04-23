/*
 Navicat Premium Data Transfer

 Source Server         : sql
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : test_message

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 23/04/2021 22:40:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `admin_password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `pub_date` date NOT NULL,
  PRIMARY KEY (`comment_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES (9, 'user', '这是一个测试内容！', '2021-04-20');
INSERT INTO `comment` VALUES (1, 'user', '在吗？', '2021-04-19');
INSERT INTO `comment` VALUES (8, 'user', 'Hello World 社区！', '2021-04-19');
INSERT INTO `comment` VALUES (11, 'user1', '测试', '2021-04-20');
INSERT INTO `comment` VALUES (12, 'user1', '测试2', '2021-04-20');
INSERT INTO `comment` VALUES (27, 'user1', '测试', '2021-04-23');
INSERT INTO `comment` VALUES (15, 'user3', '测试留言！', '2021-04-21');
INSERT INTO `comment` VALUES (17, 'user1', '测试', '2021-04-21');
INSERT INTO `comment` VALUES (18, 'user1', '测试', '2021-04-21');
INSERT INTO `comment` VALUES (19, 'user1', '测试', '2021-04-21');
INSERT INTO `comment` VALUES (20, 'user1', '测试', '2021-04-21');
INSERT INTO `comment` VALUES (21, 'user1', '测试', '2021-04-21');
INSERT INTO `comment` VALUES (22, 'user1', '测试', '2021-04-21');
INSERT INTO `comment` VALUES (23, 'user1', '测试', '2021-04-21');
INSERT INTO `comment` VALUES (24, 'user1', '测试', '2021-04-21');
INSERT INTO `comment` VALUES (25, 'user1', '测试', '2021-04-22');
INSERT INTO `comment` VALUES (26, 'user1', '测试', '2021-04-22');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `user_pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `join_date` date NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE INDEX `user_name`(`user_name`) USING BTREE,
  UNIQUE INDEX `user_email`(`user_email`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'user', 'user@qq.com', '202cb962ac59075b964b07152d234b70', './upload/default/pic.jpg', '2021-04-18');
INSERT INTO `users` VALUES (2, 'user1', 'user1@qq.com', '24c9e15e52afc47c225b757e7bee1f9d', './images/1.jpg', '2021-04-20');
INSERT INTO `users` VALUES (4, 'user3', 'user3@qq.com', '92877af70a45fd6a2ed7fe81e1236b78', './images/1.jpg', '2021-04-20');

SET FOREIGN_KEY_CHECKS = 1;
