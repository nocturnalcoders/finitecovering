/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : finitecoveringdb

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 20/10/2021 11:53:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_gizi
-- ----------------------------
DROP TABLE IF EXISTS `tb_gizi`;
CREATE TABLE `tb_gizi`  (
  `id_gizi` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `zat_karbohidrat` tinyint(1) NOT NULL,
  `zat_protein` tinyint(1) NOT NULL,
  `zat_lemak` tinyint(1) NOT NULL,
  `vitamin_a` tinyint(1) NOT NULL,
  `vitamin_d` tinyint(1) NOT NULL,
  `vitamin_e` tinyint(1) NOT NULL,
  `vitamin_k` tinyint(1) NOT NULL,
  `asam_folat` tinyint(1) NOT NULL,
  `zat_kalsium` tinyint(1) NOT NULL,
  `zat_seng` tinyint(1) NOT NULL,
  `zat_besi` tinyint(1) NOT NULL,
  `date_created` date NOT NULL,
  `jumlah_takaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `foto_bahan_makanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lampiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_active` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_gizi`) USING BTREE,
  INDEX `id_takaran`(`jumlah_takaran`) USING BTREE,
  INDEX `tb_gizi_ibfk_1`(`id_user`) USING BTREE,
  CONSTRAINT `tb_gizi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_gizi
-- ----------------------------
INSERT INTO `tb_gizi` VALUES (1, 'Ayam', 0, 1, 1, 1, 0, 0, 0, 1, 0, 1, 0, '2021-08-28', '1 Potong', 1, NULL, NULL, 1);
INSERT INTO `tb_gizi` VALUES (2, 'Tuna', 0, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, '2021-08-28', '2 Potong', 1, NULL, NULL, 1);
INSERT INTO `tb_gizi` VALUES (3, 'Nasi', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-08-28', '1', 1, NULL, NULL, 1);
INSERT INTO `tb_gizi` VALUES (4, 'Kentang', 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '2021-08-28', '1', 1, NULL, NULL, 1);
INSERT INTO `tb_gizi` VALUES (5, 'Brokoli', 0, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, '2021-08-28', '1', 1, NULL, NULL, 1);
INSERT INTO `tb_gizi` VALUES (6, 'Kacang Kedelai', 0, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, '2021-08-28', '1', 1, NULL, NULL, 1);
INSERT INTO `tb_gizi` VALUES (7, 'Wortel', 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, '2021-08-28', '1', 1, NULL, NULL, 1);
INSERT INTO `tb_gizi` VALUES (8, 'Tomat', 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, '2021-08-28', '1', 1, NULL, NULL, 1);
INSERT INTO `tb_gizi` VALUES (9, 'Udang', 0, 1, 0, 0, 1, 0, 0, 0, 1, 1, 1, '2021-08-28', '1', 1, NULL, NULL, 1);
INSERT INTO `tb_gizi` VALUES (10, 'Bayam', 0, 0, 0, 1, 0, 1, 1, 1, 1, 0, 1, '2021-08-28', '1', 1, NULL, NULL, 1);
INSERT INTO `tb_gizi` VALUES (11, 'Pare', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-08-28', '2', 1, NULL, NULL, 0);
INSERT INTO `tb_gizi` VALUES (12, 'Jahe', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, '2021-08-28', '1', 1, '', NULL, 0);
INSERT INTO `tb_gizi` VALUES (20, 'ToLie', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '0000-00-00', '1 butir', 2, '09166b7448fefd8199dc06c60e695a96.jpg', NULL, 1);
INSERT INTO `tb_gizi` VALUES (21, 'Ika', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '0000-00-00', '3 butir', 2, '09166b7448fefd8199dc06c60e695a96.jpg', NULL, 0);

-- ----------------------------
-- Table structure for tb_history
-- ----------------------------
DROP TABLE IF EXISTS `tb_history`;
CREATE TABLE `tb_history`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_gizi` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_gizi`(`id_gizi`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `tb_history_ibfk_1` FOREIGN KEY (`id_gizi`) REFERENCES `tb_gizi` (`id_gizi`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tb_history_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_history
-- ----------------------------
INSERT INTO `tb_history` VALUES (1, 1, 2);
INSERT INTO `tb_history` VALUES (2, 2, 2);
INSERT INTO `tb_history` VALUES (5, 5, 2);
INSERT INTO `tb_history` VALUES (6, 6, 2);
INSERT INTO `tb_history` VALUES (7, 11, 2);
INSERT INTO `tb_history` VALUES (8, 12, 2);

-- ----------------------------
-- Table structure for tb_role
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_role
-- ----------------------------
INSERT INTO `tb_role` VALUES (1, 'Administrator');
INSERT INTO `tb_role` VALUES (2, 'Member');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role_id` int NULL DEFAULT NULL,
  `is_active` int NULL DEFAULT NULL,
  `image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `date_created` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'admin', 'admin@admin.com', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', 1, 1, NULL, NULL);
INSERT INTO `tb_user` VALUES (2, 'Ika', 'ika@user.com', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', 2, 1, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
