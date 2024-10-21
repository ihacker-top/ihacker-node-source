/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:3306
 Source Schema         : node

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 21/10/2024 13:13:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
-- Table structure for hg_user_level
-- ----------------------------
DROP TABLE IF EXISTS `hg_user_level`;
CREATE TABLE `hg_user_level`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `level` int(3) NULL DEFAULT NULL,
  `salt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hg_user_level
-- ----------------------------
INSERT INTO `hg_user_level` VALUES (1, 1, 3, '123');

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
