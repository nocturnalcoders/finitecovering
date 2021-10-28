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

 Date: 28/10/2021 22:08:27
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
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_gizi
-- ----------------------------
INSERT INTO `tb_gizi` VALUES (1, 'Ayam', 0, 1, 1, 1, 0, 0, 0, 1, 0, 1, 0, '2021-08-28', '1 Potong', 1, 'b7ba165d92e90bd4faf2b7b47b305b5f.jpg', NULL, 1);
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
INSERT INTO `tb_gizi` VALUES (23, 'IKAAAAAAAAA', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', '10 Buah', 1, '0fccd031b63edc3ccbf4622ad9be486d.png', NULL, 0);
INSERT INTO `tb_gizi` VALUES (24, 'AAA', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', '10', NULL, '37fb681bf7d3381956adae2b2b6ca7b8.jpg', NULL, NULL);
INSERT INTO `tb_gizi` VALUES (25, 'skldlasjdlaskj', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', '10 buah', NULL, 'none.png', NULL, NULL);
INSERT INTO `tb_gizi` VALUES (26, 'ayyaya', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', '10 bahan', NULL, 'd3450fc405986a977e1dbb880ff38441.jpeg', NULL, NULL);
INSERT INTO `tb_gizi` VALUES (27, 'askdljalj', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', 'lasjdlasjdsa', NULL, 'c76e3d32478e1d37666443e00247eab3.jpg', NULL, NULL);
INSERT INTO `tb_gizi` VALUES (28, 'almalma', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', '10 buah', NULL, '575578531970f24a2c07959c6bb889d4.png', NULL, NULL);
INSERT INTO `tb_gizi` VALUES (29, 'lndlkadlajdlaj', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', '19 batang', NULL, 'b4096b1b57e5db0477e0a8de6140857c.jpg', NULL, NULL);
INSERT INTO `tb_gizi` VALUES (30, 'aljdlajlk', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', '10 butir', NULL, 'b0cf58318dec53dac6d10ceb59404a88.jpg', NULL, NULL);
INSERT INTO `tb_gizi` VALUES (31, 'asdad', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', '12', NULL, 'e05f9b8968258c708ac7e49c8f3d0e45.jpg', NULL, NULL);
INSERT INTO `tb_gizi` VALUES (32, 'gfgfg', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', '12', NULL, 'ce4945dea1b39c284e413e16e3437cdd.jpg', NULL, NULL);
INSERT INTO `tb_gizi` VALUES (33, 'asada', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', 'asdasda', NULL, '4bb9033532f9f4bbc2e4cea10532abbc.jpg', NULL, NULL);
INSERT INTO `tb_gizi` VALUES (34, 'sdjalsdj', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', '0912u30123u', NULL, '6957244f53ae92b3f7a768f59e487fa4.jpg', '9555dbbeb28a656f6db248b50324f076.jpg', NULL);
INSERT INTO `tb_gizi` VALUES (35, 'yayaya', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '0000-00-00', '10', NULL, 'ca54de4900523c732241e7f58b79080e.jpg', 'a91a8edca1c2c3dbf5e24cde5e49f843.jpg', NULL);

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
  `nama_user` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  INDEX `role_id`(`role_id`) USING BTREE,
  CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'admin', 'admin@admin.com', 'admin', '$2y$10$.uGFILJdwEpLKRXSMz98w.6w4OZrrtrt0hUuQsQy7uqFldJxJ0LvC', 1);
INSERT INTO `tb_user` VALUES (2, 'Ika', 'ika@user.com', NULL, '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a', 2);
INSERT INTO `tb_user` VALUES (3, 'tester2', 'tester2@gmail.com', NULL, '$2y$10$ajFVMtEu.A9A0HURO2f4h.2jrgx8inWINEv5fdPkDnIJh3xkCazu6', 2);
INSERT INTO `tb_user` VALUES (4, 'haha', 'haha@gmail.com', 'hoho', '$2y$10$RrhlHyC7t/zCfa66H9O2zeo51ImMNgTCZ3uQiMQPz1E2LwlJ1lSza', 2);
INSERT INTO `tb_user` VALUES (5, 'ikoyikoy', 'ikoy@gmail.com', 'ikoyikoy123', '$2y$10$.uGFILJdwEpLKRXSMz98w.6w4OZrrtrt0hUuQsQy7uqFldJxJ0LvC', 2);

SET FOREIGN_KEY_CHECKS = 1;
