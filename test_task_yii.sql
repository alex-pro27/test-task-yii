/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50638
 Source Host           : localhost:3306
 Source Schema         : test_task_yii

 Target Server Type    : MySQL
 Target Server Version : 50638
 File Encoding         : 65001

 Date: 18/04/2018 19:09:02
*/

CREATE DATABASE IF NOT EXISTS test_task_yii DEFAULT CHARACTER SET = 'utf8' DEFAULT COLLATE 'utf8_general_ci';

USE test_task_yii;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for test_task_employee
-- ----------------------------
DROP TABLE IF EXISTS `test_task_employee`;
CREATE TABLE `test_task_employee`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `salary` float NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of test_task_employee
-- ----------------------------
INSERT INTO `test_task_employee` VALUES (1, 'Хельга', 'Браун', 20000);
INSERT INTO `test_task_employee` VALUES (2, 'Барак', 'Обама', 30000);
INSERT INTO `test_task_employee` VALUES (3, 'Денис', 'Козлов ', 40000);

-- ----------------------------
-- Table structure for test_task_migration
-- ----------------------------
DROP TABLE IF EXISTS `test_task_migration`;
CREATE TABLE `test_task_migration`  (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apply_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of test_task_migration
-- ----------------------------
INSERT INTO `test_task_migration` VALUES ('m000000_000000_base', 1523938031);
INSERT INTO `test_task_migration` VALUES ('m180416_165348_init', 1523987642);

-- ----------------------------
-- Table structure for test_task_week_day
-- ----------------------------
DROP TABLE IF EXISTS `test_task_week_day`;
CREATE TABLE `test_task_week_day`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `count_calls` int(11) NULL DEFAULT NULL,
  `employee_id` int(11) NULL DEFAULT NULL,
  `presence_view` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx-employee_id`(`employee_id`) USING BTREE,
  CONSTRAINT `fk-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `test_task_employee` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of test_task_week_day
-- ----------------------------
INSERT INTO `test_task_week_day` VALUES (1, '2018-04-01', 10, 1, 1);
INSERT INTO `test_task_week_day` VALUES (2, '2018-04-01', 10, 2, 1);
INSERT INTO `test_task_week_day` VALUES (3, '2018-04-01', 10, 3, 1);
INSERT INTO `test_task_week_day` VALUES (4, '2018-04-02', 40, 1, 1);
INSERT INTO `test_task_week_day` VALUES (5, '2018-04-02', 20, 2, 1);
INSERT INTO `test_task_week_day` VALUES (6, '2018-04-02', 10, 3, 1);
INSERT INTO `test_task_week_day` VALUES (8, '2018-04-03', 40, 1, 1);
INSERT INTO `test_task_week_day` VALUES (10, '2018-04-03', 10, 2, 1);
INSERT INTO `test_task_week_day` VALUES (11, '2018-04-03', 10, 3, 1);
INSERT INTO `test_task_week_day` VALUES (12, '2018-04-04', 30, 1, 1);
INSERT INTO `test_task_week_day` VALUES (13, '2018-04-04', 30, 2, 1);
INSERT INTO `test_task_week_day` VALUES (14, '2018-04-04', 30, 3, 1);
INSERT INTO `test_task_week_day` VALUES (15, '2018-04-05', 10, 1, 1);
INSERT INTO `test_task_week_day` VALUES (16, '2018-04-05', 10, 2, 1);
INSERT INTO `test_task_week_day` VALUES (17, '2018-04-05', 10, 3, 1);
INSERT INTO `test_task_week_day` VALUES (18, '2018-04-06', NULL, 1, 2);
INSERT INTO `test_task_week_day` VALUES (19, '2018-04-06', NULL, 2, 2);
INSERT INTO `test_task_week_day` VALUES (20, '2018-04-06', NULL, 3, 2);
INSERT INTO `test_task_week_day` VALUES (21, '2018-04-07', NULL, 1, 2);
INSERT INTO `test_task_week_day` VALUES (22, '2018-04-07', NULL, 2, 2);
INSERT INTO `test_task_week_day` VALUES (23, '2018-04-07', NULL, 3, 2);
INSERT INTO `test_task_week_day` VALUES (24, '2018-04-08', 10, 1, 1);
INSERT INTO `test_task_week_day` VALUES (25, '2018-04-08', 10, 2, 1);
INSERT INTO `test_task_week_day` VALUES (26, '2018-04-08', 10, 3, 1);
INSERT INTO `test_task_week_day` VALUES (27, '2018-04-09', 20, 1, 1);
INSERT INTO `test_task_week_day` VALUES (28, '2018-04-09', NULL, 2, 3);
INSERT INTO `test_task_week_day` VALUES (29, '2018-04-09', 10, 3, 1);
INSERT INTO `test_task_week_day` VALUES (30, '2018-04-10', 30, 1, 1);
INSERT INTO `test_task_week_day` VALUES (31, '2018-04-10', NULL, 2, 3);
INSERT INTO `test_task_week_day` VALUES (32, '2018-04-10', 30, 3, 1);
INSERT INTO `test_task_week_day` VALUES (33, '2018-04-11', 10, 1, 1);
INSERT INTO `test_task_week_day` VALUES (34, '2018-04-11', NULL, 2, 3);
INSERT INTO `test_task_week_day` VALUES (35, '2018-04-11', 10, 3, 1);
INSERT INTO `test_task_week_day` VALUES (36, '2018-04-12', 20, 1, 1);
INSERT INTO `test_task_week_day` VALUES (37, '2018-04-12', NULL, 2, 3);
INSERT INTO `test_task_week_day` VALUES (38, '2018-04-12', 20, 3, 1);
INSERT INTO `test_task_week_day` VALUES (39, '2018-04-13', NULL, 1, 2);
INSERT INTO `test_task_week_day` VALUES (40, '2018-04-13', NULL, 2, 2);
INSERT INTO `test_task_week_day` VALUES (41, '2018-04-13', NULL, 3, 2);
INSERT INTO `test_task_week_day` VALUES (42, '2018-04-14', NULL, 1, 2);
INSERT INTO `test_task_week_day` VALUES (43, '2018-04-14', NULL, 2, 2);
INSERT INTO `test_task_week_day` VALUES (44, '2018-04-14', NULL, 3, 2);

SET FOREIGN_KEY_CHECKS = 1;
