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

 Date: 23/10/2024 17:11:53
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
INSERT INTO `hg_level` VALUES (1, 3, 3, '2024-10-21 17:44:18', '2024-10-22 17:44:22');
INSERT INTO `hg_level` VALUES (2, 3, 2, '2024-10-21 17:44:18', '2024-10-22 17:44:22');
INSERT INTO `hg_level` VALUES (3, 3, 1, '2024-10-21 17:44:18', '2024-10-22 17:44:22');
INSERT INTO `hg_level` VALUES (4, 4, 1, '2024-10-21 17:44:18', '2024-10-22 17:44:22');

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
) ENGINE = MyISAM AUTO_INCREMENT = 151 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_captcha
-- ----------------------------
INSERT INTO `m_captcha` VALUES (134, 'ihacker.top@hotmail.com', '960907', '0', '2024-10-23 08:33:14');
INSERT INTO `m_captcha` VALUES (135, 'ihacker.top@hotmail.com', '618673', '0', '2024-10-23 08:34:16');
INSERT INTO `m_captcha` VALUES (136, 'ihacker.top@hotmail.com', '612052', '0', '2024-10-23 08:35:28');
INSERT INTO `m_captcha` VALUES (137, 'ihacker.top@hotmail.com', '723195', '0', '2024-10-23 08:48:50');
INSERT INTO `m_captcha` VALUES (138, 'ihacker.top@hotmail.com', '372135', '0', '2024-10-23 08:49:57');
INSERT INTO `m_captcha` VALUES (139, 'ihacker.top@hotmail.com', '482206', '0', '2024-10-23 09:27:10');
INSERT INTO `m_captcha` VALUES (140, 'ihacker.top@hotmail.com', '886789', '0', '2024-10-23 09:51:44');
INSERT INTO `m_captcha` VALUES (141, 'ihacker.top@hotmail.com', '331142', '0', '2024-10-23 09:59:52');
INSERT INTO `m_captcha` VALUES (142, 'ihacker.top@hotmail.com', '636083', '0', '2024-10-23 10:10:36');
INSERT INTO `m_captcha` VALUES (143, 'ihacker.top@hotmail.com', '295463', '0', '2024-10-23 10:13:15');
INSERT INTO `m_captcha` VALUES (144, 'ihacker.top@hotmail.com', '111591', '0', '2024-10-23 13:43:40');
INSERT INTO `m_captcha` VALUES (145, 'admin@ihacker.top', '767546', '0', '2024-10-23 14:56:13');
INSERT INTO `m_captcha` VALUES (146, 'admin@ihacker.top', '319223', '0', '2024-10-23 14:58:12');
INSERT INTO `m_captcha` VALUES (147, 'admin@ihacker.top', '169633', '0', '2024-10-23 15:13:55');
INSERT INTO `m_captcha` VALUES (148, 'admin@ihacker.top', '855903', '0', '2024-10-23 15:17:14');
INSERT INTO `m_captcha` VALUES (149, 'admin@ihacker.top', '956489', '0', '2024-10-23 16:46:49');
INSERT INTO `m_captcha` VALUES (150, 'admin@ihacker.top', '434847', '0', '2024-10-23 17:02:42');

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `salt` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_time` datetime NULL DEFAULT NULL,
  `token` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `token_ctime` datetime NULL DEFAULT NULL,
  `login_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (3, 'ihacker.top@hotmail.com', '78bf1d289432feb89a152fd24c7a0e35', '2024-10-22 00:00:00', 'ZiySVJZ646pUIzL/ZqjM/4aP5Qi+IaX8c8X3in91ETXr4sOjrSDPNfFwDwqhqprp7A/kdhjCOBDbhJNRNqifQj7S9yre8HV1o3Gfp5AUuTLHhbVe0ImmfOB9vuTDFWkXK7jaLWGNlOLEZ+Q6zj+wzHRZLGwo6a7zqO9ktGbYYUTIuD6ui1hUh1ongAhzs8GTxqBFgviJ9TBZ7nDvqtPy3slvJtvOeRZM/Z1lb2+RUaZJSmTh1T/DWpDrq/OQHKc+', '2024-10-23 13:43:52', '127.0.0.1');
INSERT INTO `m_user` VALUES (4, 'admin@ihacker.top', 'f47df370a95a4a5a265ca00059a1ec4e', '2024-10-22 00:00:00', 'WegbLNqZwNPhQOL09CBUWmUsgxAktRzlWMEp0w+AHc1/KrSMK+ZMhDzYAlTGx5z8A2VaLLWv16HvSaVObCJ20T7/Cut17XcDBMI8As4TAmGyX1Vfm/jn8DXzHtkn0weRg1TxZxtdmnNomK+2MZ84aei6zP8mUp9jiIqHo4UfrZ2Tbp6Ms3jKCT8jJnGSh2ixO1t+KWyWDkIg/JCVl5wZhnwrBlIINxK1+5WfXbDKpTQ=', '2024-10-23 17:02:49', '::1');

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
