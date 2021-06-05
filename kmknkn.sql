/*
 Navicat Premium Data Transfer

 Source Server         : mysql_db
 Source Server Type    : MySQL
 Source Server Version : 100133
 Source Host           : localhost:3306
 Source Schema         : manajemen-inventori

 Target Server Type    : MySQL
 Target Server Version : 100133
 File Encoding         : 65001

 Date: 09/01/2021 19:47:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_barang` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_barang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `reorder` int(10) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 194 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (6, 'TC24-02', 'TC 24 Benhur', 30, '2021-01-05 21:37:45', '2021-01-05 14:37:45');
INSERT INTO `barang` VALUES (7, 'TC24-03', 'TC 24 Turqis ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (8, 'TC24-04', 'TC 24 Fuji', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (9, 'TC24-05', 'TC 24 Merah', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (10, 'TC24-06', 'TC 24 Hitam ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (11, 'TC24-07', 'TC 24 Coklat', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (12, 'TC24-08', 'TC 24 Ungu Tua', 25, '2021-01-05 21:37:59', '2021-01-05 14:37:59');
INSERT INTO `barang` VALUES (13, 'TC24-09', 'TC 24 Toska', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (14, 'TC24-10', 'TC 24 Marun ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (15, 'TC24-11', 'TC 24 Fanta ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (16, 'TC24-12', 'TC 24 Kenari ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (17, 'TC24-13', 'TC 24 Kuning Mas ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (18, 'TC24-14', 'TC 24 Biru Langit', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (19, 'TC24-15', 'TC 24 Stabilo ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (20, 'TC24-16', 'TC 24 Orange', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (21, 'TC24-17', 'TC 24 Ungu Muda', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (22, 'TC24-18', 'TC 24 Putih', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (23, 'TC24-19', 'TC 24 Abu Asap', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (24, 'TC24-20', 'TC 24 Misty M71 ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (25, 'TC24-21', 'TC 24 Misty M81', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (26, 'TC24-22', 'TC 24 Misty M61', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (27, 'TC24-23', 'TC 24 Army', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (28, 'TC24-24', 'TC 24 Kuning Busuk', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (29, 'TC24-25', 'TC 24 Ungu Sedang', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (30, 'TC30-01', 'TC 30 Navy ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (31, 'TC30-02', 'TC 30 Benhur ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (32, 'TC30-03', 'TC 30 Turqis ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (33, 'TC30-04', 'TC 30 Fuji', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (34, 'TC30-05', 'TC 30 Merah ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (35, 'TC30-06', 'TC 30 Hitam ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (36, 'TC30-07', 'TC 30 Coklat ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (37, 'TC30-08', 'TC 30 Ungu Tua ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (38, 'TC30-09', 'TC 30 Toska ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (39, 'TC30-10', 'TC 30 Marun ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (40, 'TC30-11', 'TC 30 Fanta ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (41, 'TC30-12', 'TC 30 Kenari ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (42, 'TC30-13', 'TC 30 Kuning Mas ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (43, 'TC30-14', 'TC 30 Biru Langit', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (44, 'TC30-15', 'TC 30 Stabilo ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (45, 'TC30-16', 'TC 30 Orange ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (46, 'TC30-17', 'TC 30 Ungu Muda', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (47, 'TC30-18', 'TC 30 Putih', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (48, 'TC30-19', 'TC 30 Abu Asap ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (49, 'TC30-20', 'TC 30 Misty M71', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (50, 'TC30-21', 'TC 30 Misty M81', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (51, 'TC30-22', 'TC 30 Misty M61', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (52, 'TC30-23', 'TC 30 Army', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (53, 'TC30-24', 'TC 30 Kuning Busuk', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (54, 'CD30-06', 'CD 30\'S Hitam', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (55, 'TC30-26', 'TC 30 Pink Baby ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (56, 'TC30-27', 'TC 30 Biru Baby ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (57, 'TC30-28', 'TC 30 Kuning Baby ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (58, 'TC30-29', 'TC 30 Hijau Baby ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (59, 'TC30-30', 'TC 30 Putih D  ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (60, 'PE24-01', 'PE 24 Navy ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (61, 'PE24-02', 'PE 24 Benhur ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (62, 'PE24-03', 'PE 24 Turqis ', 20, '2021-01-05 21:36:32', NULL);
INSERT INTO `barang` VALUES (63, 'PE24-04', 'PE 24 Fuji ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (64, 'PE24-05', 'PE 24 Merah ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (65, 'PE24-06', 'PE 24 Hitam ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (66, 'PE24-07', 'PE 24 Coklat ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (67, 'PE24-08', 'PE 24 Ungu Tua ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (68, 'PE24-09', 'PE 24 Toska ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (69, 'PE24-10', 'PE 24 Marun ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (70, 'PE24-11', 'PE 24 Fanta ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (71, 'PE24-12', 'PE 24 Kenari ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (72, 'PE24-13', 'PE 24 Kuning Mas ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (73, 'PE24-14', 'PE 24 Biru Langit ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (74, 'PE24-15', 'PE 24 Stabilo ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (75, 'PE24-16', 'PE 24 Orange ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (76, 'PE24-17', 'PE 24 Ungu Muda ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (77, 'PE24-18', 'PE 24 Putih', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (78, 'PE24-19', 'PE 24 Abu Asap ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (79, 'PE24-20', 'PE 24 Misty M71', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (80, 'PE24-21', 'PE 24 Misty M81', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (81, 'PE24-22', 'PE 24 Misty M61', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (82, 'PE24-23', 'PE 24 Army ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (83, 'PE24-24', 'PE 24 Kuning Busuk ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (84, 'PE24-25', 'PE 24 Ungu Sedang', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (85, 'PE30-01', 'PE 30 Navy ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (86, 'PE30-02', 'PE 30 Benhur ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (87, 'PE30-03', 'PE 30 Turqis ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (88, 'PE30-04', 'PE 30 Fuji', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (89, 'PE30-05', 'PE 30 Merah ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (90, 'PE30-06', 'PE 30 Hitam ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (91, 'PE30-07', 'PE 30 Coklat ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (92, 'PE30-08', 'PE 30 Ungu Tua ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (93, 'PE30-09', 'PE 30 Toska ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (94, 'PE30-10', 'PE 30 Marun ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (95, 'PE30-11', 'PE 30 Fanta ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (96, 'PE30-12', 'PE 30 Kenari ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (97, 'PE30-13', 'PE 30 Kuning Mas ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (98, 'PE30-14', 'PE 30 Biru Langit', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (99, 'PE30-15', 'PE 30 Stabilo ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (100, 'PE30-16', 'PE 30 Orange ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (101, 'PE30-17', 'PE 30 Ungu Muda', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (102, 'PE30-18', 'PE 30 Putih', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (103, 'PE30-19', 'PE 30 Abu Asap ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (104, 'PE30-20', 'PE 30 Misty M71', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (105, 'PE30-21', 'PE 30 Misty M81', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (106, 'PE30-22', 'PE 30 Misty M61', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (107, 'PE30-23', 'PE 30 Army', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (108, 'PE30-24', 'PE 30 Kuning Busuk', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (109, 'PE30-25', 'PE 30 Ungu Sedang', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (110, 'PE30-26', 'PE 30 Pink Baby ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (111, 'PE30-27', 'PE 30 Biru Baby ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (112, 'PE30-28', 'PE 30 Kuning Baby ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (113, 'RibTC-01', 'Rib TC Navy ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (114, 'RibTC-02', 'Rib TC Benhur ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (115, 'RibTC-03', 'Rib TC Turqis ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (116, 'RibTC-04', 'Rib TC Fuji', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (117, 'RibTC-05', 'Rib TC Merah ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (118, 'RibTC-06', 'Rib TC Hitam ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (119, 'RibTC-07', 'Rib TC Coklat ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (120, 'RibTC-08', 'Rib TC Ungu Tua ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (121, 'RibTC-09', 'Rib TC Toska ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (122, 'RibTC-10', 'Rib TC Marun ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (123, 'RibTC-11', 'Rib TC Fanta ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (124, 'RibTC-12', 'Rib TC Kenari ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (125, 'RibTC-13', 'Rib TC Kuning Mas ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (126, 'RibTC-14', 'Rib TC Biru Langit', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (127, 'RibTC-15', 'Rib TC Stabilo ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (128, 'RibTC-16', 'Rib TC Orange ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (129, 'RibTC-17', 'Rib TC Ungu Muda', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (130, 'RibTC-18', 'Rib TC Putih', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (131, 'RibTC-19', 'Rib TC Abu Asap ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (132, 'RibTC-20', 'Rib TC Misty M71', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (133, 'RibTC-21', 'Rib TC Misty M81', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (134, 'RibTC-22', 'Rib TC Misty M61', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (135, 'RibTC-23', 'Rib TC Army', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (136, 'RibTC-24', 'Rib TC Kuning Busuk ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (137, 'RIBCD-06', 'RIB CD HITAM', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (138, 'RibTC-26', 'Rib TC Pink Baby ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (139, 'RibTC-27', 'Rib TC Biru Baby ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (140, 'RibTC-28', 'Rib TC Kuning Baby ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (141, 'RibTC-29', 'Rib TC Hijau Baby ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (142, 'RibTC-30', 'Rib TC Putih D', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (143, 'RibPE-01', 'Rib PE Navy', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (144, 'RibPE-02', 'Rib PE Benhur', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (145, 'RibPE-03', 'Rib PE Turqis', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (146, 'RibPE-04', 'Rib PE Fuji', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (147, 'RibPE-05', 'Rib PE Merah', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (148, 'RibPE-06', 'Rib PE Hitam ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (149, 'RibPE-07', 'Rib PE Coklat', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (150, 'RibPE-08', 'Rib PE Ungu Tua', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (151, 'RibPE-09', 'Rib PE Toska', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (152, 'RibPE-10', 'Rib PE Marun', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (153, 'RibPE-11', 'Rib PE Fanta', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (154, 'RibPE-12', 'Rib PE Kenari', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (155, 'RibPE-13', 'Rib PE Kuning Mas', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (156, 'RibPE-14', 'Rib PE Biru Langit ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (157, 'RibPE-15', 'Rib PE Stabilo', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (158, 'RibPE-16', 'Rib PE Orange', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (159, 'RibPE-17', 'Rib PE Ungu Muda', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (160, 'RibPE-18', 'Rib PE Putih', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (161, 'RibPE-19', 'Rib PE Abu Asap', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (162, 'RibPE-20', 'Rib PE Misty M71', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (163, 'RibPE-21', 'Rib PE Misty M81', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (164, 'RibPE-22', 'Rib PE Misty M61', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (165, 'RibPE-23', 'Rib PE Army', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (166, 'RibPE-24', 'Rib PE Kuning Busuk ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (167, 'RibPE-25', 'Rib PE Ungu Sedang ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (168, 'LKCVC24-01', 'Lakos CVC 24\'s Navy', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (169, 'LKCVC24-02', 'Lakos CVC 24\'s Benhur ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (170, 'LKCVC24-03', 'Lakos CVC 24\'s Turqis ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (171, 'LKCVC24-06', 'Lakos CVC 24\'s Hitam ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (172, 'LKCVC24-10', 'Lakos CVC 24\'s Marun ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (173, 'LKCVC24-18', 'Lakos CVC 24\'s Putih ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (174, 'LKCVC24-23', 'Lakos CVC 24\'s Army ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (175, 'LKCVC24-24', 'Lakos CVC 24\'s Kubus', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (176, 'KR-01', 'Kerah Navy', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (177, 'KR-02', 'Kerah Benhur', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (178, 'KR-03', 'Kerah Turqis ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (179, 'KR-06', 'Kerah Hitam', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (180, 'KR-10', 'Kerah Marun ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (181, 'KR-18', 'Kerah Putih ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (182, 'KR-23', 'Kerah Army ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (183, 'KR-24', 'Kerah Kubus', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (184, 'MS-01', 'Manset Navy', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (185, 'MS-02', 'Manset Benhur', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (186, 'MS-03', 'Manset Turqis ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (187, 'MS-06', 'Manset Hitam ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (188, 'MS-10', 'Manset Marun', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (189, 'MS-18', 'Manset Putih', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (190, 'MS-23', 'Manset Army ', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (191, 'MS-24', 'Manset Kubus', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (192, 'PE30-29', 'PE 30 Hijau Baby', 20, '2021-01-05 21:36:33', NULL);
INSERT INTO `barang` VALUES (193, 'Tes', 'Tes', 90, '2021-01-05 14:40:59', '2021-01-05 14:40:59');

-- ----------------------------
-- Table structure for barang_masuk
-- ----------------------------
DROP TABLE IF EXISTS `barang_masuk`;
CREATE TABLE `barang_masuk`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_barang_masuk` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_barang` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kg_in` double(20, 0) NULL DEFAULT NULL,
  `harga_in` int(255) NULL DEFAULT NULL,
  `is_save` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of barang_masuk
-- ----------------------------
INSERT INTO `barang_masuk` VALUES (12, NULL, 'PE24-14', 300, 10800000, '0', 1, '2021-01-08 22:46:11', '2021-01-08 15:46:11');
INSERT INTO `barang_masuk` VALUES (13, NULL, 'RibPE-14', 15, 500000, '0', 1, '2021-01-08 22:45:20', '2021-01-08 15:45:20');
INSERT INTO `barang_masuk` VALUES (14, NULL, 'PE24-18', 900, 21059500, '0', 1, '2021-01-08 08:49:22', '2021-01-08 08:49:22');

-- ----------------------------
-- Table structure for barang_masuk_temp
-- ----------------------------
DROP TABLE IF EXISTS `barang_masuk_temp`;
CREATE TABLE `barang_masuk_temp`  (
  `id` bigint(20) NOT NULL,
  `kode_barang_masuk` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_barang` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kg_in` double(20, 0) NULL DEFAULT NULL,
  `harga_in` int(255) NULL DEFAULT NULL,
  `is_save` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for histori_barang_masuk
-- ----------------------------
DROP TABLE IF EXISTS `histori_barang_masuk`;
CREATE TABLE `histori_barang_masuk`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `tanggal_transaksi` date NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (3, 'Admin keuangan', 'admin_keuangan', '$2y$10$Si60Hqa39XF0pmiw2Aa8COfwUBnNriE.zqnI.Ild5mQIZFZTuBNam', 'Admin Keuangan', NULL, '2020-12-07 16:22:43', '2020-12-07 16:22:43');
INSERT INTO `users` VALUES (4, 'Admin Gudang', 'admin_gudang', '$2y$10$Woiqx0KONogh3Tg8PDLeEOWFnD/nDqEfFvlBxrwN3BgLZOaJzAg0.', 'Admin Gudang', NULL, '2020-12-07 16:23:13', '2020-12-07 16:23:13');
INSERT INTO `users` VALUES (5, 'admin toko', 'admin_toko', '$2y$10$oIlmOek5xE578a/8YaFqZOEawv38MydxZrl3dDmqDeyDs1z6ZLt9a', 'Admin Toko', NULL, '2021-01-03 12:06:50', '2021-01-03 12:16:17');

SET FOREIGN_KEY_CHECKS = 1;
