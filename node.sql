/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:3306
 Source Schema         : node

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 22/10/2024 02:11:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for hg_level
-- ----------------------------
DROP TABLE IF EXISTS `hg_level`;
CREATE TABLE `hg_level`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `level` int(3) NULL DEFAULT NULL,
  `start_time` datetime NULL DEFAULT NULL,
  `end_time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hg_level
-- ----------------------------
INSERT INTO `hg_level` VALUES (1, 1, 3, '2024-10-21 17:44:18', '2024-10-22 17:44:22');
INSERT INTO `hg_level` VALUES (2, 1, 2, '2024-10-21 17:44:18', '2024-10-22 17:44:22');
INSERT INTO `hg_level` VALUES (3, 1, 1, '2024-10-21 17:44:18', '2024-10-22 17:44:22');
INSERT INTO `hg_level` VALUES (4, 2, 1, '2024-10-21 17:44:18', '2024-10-22 17:44:22');

-- ----------------------------
-- Table structure for hg_page
-- ----------------------------
DROP TABLE IF EXISTS `hg_page`;
CREATE TABLE `hg_page`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(3) NULL DEFAULT NULL,
  `page` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hg_page
-- ----------------------------
INSERT INTO `hg_page` VALUES (1, 1, 'first');
INSERT INTO `hg_page` VALUES (2, 2, 'second');
INSERT INTO `hg_page` VALUES (3, 3, 'third');
INSERT INTO `hg_page` VALUES (4, 4, 'four');
INSERT INTO `hg_page` VALUES (5, 5, 'five');
INSERT INTO `hg_page` VALUES (6, 6, 'six');

-- ----------------------------
-- Table structure for hg_user
-- ----------------------------
DROP TABLE IF EXISTS `hg_user`;
CREATE TABLE `hg_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `salt` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hg_user
-- ----------------------------
INSERT INTO `hg_user` VALUES (1, 1, '123456');

-- ----------------------------
-- Table structure for m_captcha
-- ----------------------------
DROP TABLE IF EXISTS `m_captcha`;
CREATE TABLE `m_captcha`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `code` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 62 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_captcha
-- ----------------------------
INSERT INTO `m_captcha` VALUES (56, 'ihacker.top@hotmail.com', '797810', '0', '2024-10-22 01:47:54');
INSERT INTO `m_captcha` VALUES (57, 'ihacker.top@hotmail.com', '102146', '0', '2024-10-22 01:58:48');
INSERT INTO `m_captcha` VALUES (58, 'ihacker.top@hotmail.com', '800279', '0', '2024-10-22 02:00:26');
INSERT INTO `m_captcha` VALUES (59, 'ihacker.top@hotmail.com', '931983', '0', '2024-10-22 02:01:38');
INSERT INTO `m_captcha` VALUES (60, 'ihacker.top@hotmail.com', '360864', '0', '2024-10-22 02:06:11');
INSERT INTO `m_captcha` VALUES (61, 'ihacker.top@hotmail.com', '608296', '0', '2024-10-22 02:09:53');

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (1, 'ihacker', '123456', 'ihacker.top@hotmail.com', '2024-10-21 00:02:44');

-- ----------------------------
-- Table structure for rss_conf
-- ----------------------------
DROP TABLE IF EXISTS `rss_conf`;
CREATE TABLE `rss_conf`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `update` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of rss_conf
-- ----------------------------
INSERT INTO `rss_conf` VALUES (1, '2024-10-10 00:52:57');

-- ----------------------------
-- Table structure for rss_jsdata
-- ----------------------------
DROP TABLE IF EXISTS `rss_jsdata`;
CREATE TABLE `rss_jsdata`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '标题',
  `href` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '地址',
  `create_time` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '分类',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rss_jsdata
-- ----------------------------
INSERT INTO `rss_jsdata` VALUES (1, '揭露美国炒作“伏特台风”行动计划真相', '/p/be444b86aa54', '2024-10-16 09:49:46', '安全资讯');
INSERT INTO `rss_jsdata` VALUES (2, '中国主要城市成美网络秘密入侵目标，美国植入超5万个间谍程序！', '/p/230c12ede4f8', '2024-10-16 09:48:39', '安全资讯');

SET FOREIGN_KEY_CHECKS = 1;
