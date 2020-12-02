/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100315
 Source Host           : localhost:3306
 Source Schema         : uygulama

 Target Server Type    : MySQL
 Target Server Version : 100315
 File Encoding         : 65001

 Date: 16/11/2020 13:08:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ayar
-- ----------------------------
DROP TABLE IF EXISTS `ayar`;
CREATE TABLE `ayar`  (
  `ayar_id` int NOT NULL AUTO_INCREMENT,
  `facebook` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `linkedin` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `twitter` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `youtube` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `logo` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `duyuru_durum` bit(1) NULL DEFAULT NULL,
  `duyuru_tip` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `duyuru_text` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ayar_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of ayar
-- ----------------------------
INSERT INTO `ayar` VALUES (1, 'http://ulascannacaksiz.com/', 'http://ulascannacaksiz.com/', 'http://ulascannacaksiz.com/', 'https://www.youtube.com/', 'Ulas Can', b'0', 'primary', 'SİTE DUYURU TESTİ');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `aciklama` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tag` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Programlama', 'programlama');
INSERT INTO `kategori` VALUES (2, 'Diğer konular', 'diger-konular');
INSERT INTO `kategori` VALUES (3, 'Web programlama', 'web-programlama');
INSERT INTO `kategori` VALUES (4, 'Dizi/Film', 'dizi-film');
INSERT INTO `kategori` VALUES (5, 'Nasıl Yapılır', 'nasil-yapilir');

-- ----------------------------
-- Table structure for mail
-- ----------------------------
DROP TABLE IF EXISTS `mail`;
CREATE TABLE `mail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of mail
-- ----------------------------
INSERT INTO `mail` VALUES (1, 'ulascannacaksiz@gmail.com');
INSERT INTO `mail` VALUES (2, '');
INSERT INTO `mail` VALUES (3, '');
INSERT INTO `mail` VALUES (4, 'ulascannacaksiz11@gmail.com');
INSERT INTO `mail` VALUES (5, 'ulascannacaksiz11@gmail.com');
INSERT INTO `mail` VALUES (6, 'dsdsadsaq@hotmail.com');
INSERT INTO `mail` VALUES (7, 'gtyyryr@hotmail.com');
INSERT INTO `mail` VALUES (8, 'rtertert@hotmail.com');
INSERT INTO `mail` VALUES (9, 'rtertert@hotmail.com');
INSERT INTO `mail` VALUES (10, 'rtertert@hotmail.com');
INSERT INTO `mail` VALUES (11, 'rtertert@hotmail.com');
INSERT INTO `mail` VALUES (12, 'rtertert@hotmail.com');
INSERT INTO `mail` VALUES (13, 'rtertert@hotmail.com');
INSERT INTO `mail` VALUES (14, 'rtertert@hotmail.com');
INSERT INTO `mail` VALUES (15, 'rtertert@hotmail.com');
INSERT INTO `mail` VALUES (16, 'erwr@hot.df');
INSERT INTO `mail` VALUES (17, 'sdfsd@hotmail.com');
INSERT INTO `mail` VALUES (18, 'asd@gmail.com');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `menu_id` int NOT NULL AUTO_INCREMENT,
  `menu_aciklama` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `menu_url` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `siralama` int NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (4, 'Anasayfa', 'index', 2);
INSERT INTO `menu` VALUES (5, 'Hakkımda', 'hakkimda', 3);
INSERT INTO `menu` VALUES (6, 'Projelerim', 'projelerim', 0);

-- ----------------------------
-- Table structure for resimler
-- ----------------------------
DROP TABLE IF EXISTS `resimler`;
CREATE TABLE `resimler`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `yazi_id` int NULL DEFAULT NULL,
  `yol` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kapak` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of resimler
-- ----------------------------
INSERT INTO `resimler` VALUES (1, 1, 'uploads', '0c51df1eb2829a9a232518ed2dd9b2ac.jpg', b'1');
INSERT INTO `resimler` VALUES (2, 2, 'uploads', '86f2307573ab7e2a39b7eeac6bbb3a0f.jpg', b'1');
INSERT INTO `resimler` VALUES (3, 3, 'uploads', '410987ad4609215b14e7b384f4692f6a.png', b'1');
INSERT INTO `resimler` VALUES (4, 4, 'uploads', 'dsdsadsadsa.jpg', b'1');
INSERT INTO `resimler` VALUES (5, 5, 'uploads', 'dsfsdfsdfsd.jpg', b'1');
INSERT INTO `resimler` VALUES (6, 6, 'uploads', '83fedbf64e8ad03cca840a5d0e2a511f.jpg', b'1');

-- ----------------------------
-- Table structure for uyeler
-- ----------------------------
DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE `uyeler`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kullanici_tur` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'default',
  `isim` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `soyisim` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `eposta` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sifre` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uyelik_tarihi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `durum` tinyint(1) NULL DEFAULT NULL COMMENT '1=>onaylı\r\n0=>onaysız\r\n3=> banlı',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of uyeler
-- ----------------------------
INSERT INTO `uyeler` VALUES (1, 'admin', 'ULAŞ CAN', 'NACAKSIZ', 'ulas@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '11-11-2020', 1);
INSERT INTO `uyeler` VALUES (2, 'default', 'Ahmet', 'test', 'ulas@ddsfds.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '11-11-2020', 1);
INSERT INTO `uyeler` VALUES (3, 'default', 'Faruk', 'sdas', 'ulascannacaksz11@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '11-11-2020', 1);
INSERT INTO `uyeler` VALUES (4, 'default', 'Kemal', 'can', 'dfsfdsfsdf33@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '11-11-2020', 1);
INSERT INTO `uyeler` VALUES (5, 'default', 'Ulaş Can', 'Nacaksız', 'ulascannacaksiz@hotmail.com', '4e3b280e4188034c649b58d08548e0fb8e2bd005ced950d3ab94239e993849a3', '11-11-2020', 1);
INSERT INTO `uyeler` VALUES (9, 'default', 'ulas', 'test', 'dsadasd@gmail.com', '82b0aea8d6e33847aa10a9a9ccfd9168e57b6d54d9deb2c5888e4b1af578944d', '11-11-2020', 1);
INSERT INTO `uyeler` VALUES (10, 'admin', 'Ulaş', 'can', 'ulascannacaksiz54@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '13-11-2020', 1);

-- ----------------------------
-- Table structure for yazilar
-- ----------------------------
DROP TABLE IF EXISTS `yazilar`;
CREATE TABLE `yazilar`  (
  `yid` int NOT NULL AUTO_INCREMENT,
  `yazar_id` int NULL DEFAULT NULL,
  `baslik` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `yazi` varchar(5000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `yazar_ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `tarih` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `kategori_id` int NULL DEFAULT NULL,
  `sef` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`yid`) USING BTREE,
  UNIQUE INDEX `sef`(`sef`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of yazilar
-- ----------------------------
INSERT INTO `yazilar` VALUES (1, 1, 'Test Programlama', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum massa sapien, vitae pulvinar ex mollis non. Sed felis enim, euismod in lorem a, gravida blandit odio. Suspendisse potenti. Sed odio lacus, euismod sit amet tempus quis, mollis eget sapien. Vivamus ullamcorper at risus et luctus. Etiam auctor dolor eget vestibulum lobortis. Proin aliquet vulputate lorem, volutpat blandit neque pellentesque non. Donec dolor felis, suscipit quis malesuada in, fringilla ac sapien. Nullam eleifend arcu mauris, eget venenatis lorem consequat eget. Duis scelerisque blandit hendrerit. Aliquam suscipit tellus est, sed tristique velit facilisis a.</p>\r\n\r\n<p>Aenean non velit ante. Sed tristique lobortis lacus, euismod dictum felis dapibus id. Duis eu egestas ex. Curabitur quis erat magna. Aenean a volutpat dolor. Mauris quam magna, iaculis ac purus mattis, rhoncus fringilla libero. Curabitur aliquam vehicula commodo. Etiam dictum turpis vitae magna efficitur, rutrum mollis est tristique. Ut et laoreet justo.</p>\r\n\r\n<p>Cras commodo, lacus quis laoreet lacinia, sapien lacus gravida est, vulputate eleifend metus nibh quis purus. In imperdiet tincidunt erat, ut finibus nibh porttitor at. Sed vel tempor risus. Donec dolor lectus, ultrices id mauris vitae, ornare aliquet metus. Duis luctus purus in nulla sollicitudin, eget porta dolor auctor. Integer vel sem turpis. Sed non magna ante. Praesent vestibulum tempor diam tincidunt tristique. Sed ante lacus, cursus ut eros auctor, porta placerat leo. Donec feugiat sodales tortor, at euismod turpis. Nulla sed pellentesque mi. Morbi eu tellus ut turpis ullamcorper ornare. Donec eu lectus a tortor condimentum consectetur non id justo. Nunc rhoncus erat vel congue fringilla.</p>\r\n\r\n<p>Cras vitae rhoncus est. Phasellus euismod dolor sit amet nulla fermentum, at blandit est dapibus. Proin viverra, lectus at viverra finibus, libero nisi imperdiet elit, a pretium quam nisl a dui. Donec sagittis sit amet ligula vel vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras convallis lorem sit amet purus fringilla tincidunt. Curabitur congue diam velit, vitae sagittis felis dictum id. Curabitur a dolor vel diam pharetra aliquam non non nibh. In hac habitasse platea dictumst. Vivamus in est eu turpis euismod mattis. Quisque lacinia libero in tristique hendrerit. Donec ac egestas ligula. Duis vulputate bibendum odio commodo posuere. Vestibulum congue volutpat hendrerit.</p>\r\n\r\n<p>Duis bibendum faucibus fringilla. Donec eu sem nec turpis interdum ultrices ut porta ante. Integer ut quam at nibh molestie faucibus. Donec tincidunt augue non elit facilisis, non congue dolor cursus. Morbi vitae ante eget tortor efficitur eleifend vitae eu enim. Ut commodo nibh ut erat elementum, eget hendrerit est feugiat. Aliquam fermentum sem non elit tempus, in porttitor neque rutrum. Phasellus viverra libero eget sem dapibus luctus vel non erat. In vestibulum velit at dui finibus, sollicitudin feugiat ante tincidunt. Praesent aliquet magna sed blandit finibus. Quisque eget erat libero. Duis consequat sem at lacus tristique, sed scelerisque erat blandit.</p>\r\n', NULL, '09/11/2020', 1, 'test-programlama');
INSERT INTO `yazilar` VALUES (2, 1, 'Test Diger Konular', '<p></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum massa sapien, vitae pulvinar ex mollis non. Sed felis enim, euismod in lorem a, gravida blandit odio. Suspendisse potenti. Sed odio lacus, euismod sit amet tempus quis, mollis eget sapien. Vivamus ullamcorper at risus et luctus. Etiam auctor dolor eget vestibulum lobortis. Proin aliquet vulputate lorem, volutpat blandit neque pellentesque non. Donec dolor felis, suscipit quis malesuada in, fringilla ac sapien. Nullam eleifend arcu mauris, eget venenatis lorem consequat eget. Duis scelerisque blandit hendrerit. Aliquam suscipit tellus est, sed tristique velit facilisis a.</p>\r\n\r\n<p>Aenean non velit ante. Sed tristique lobortis lacus, euismod dictum felis dapibus id. Duis eu egestas ex. Curabitur quis erat magna. Aenean a volutpat dolor. Mauris quam magna, iaculis ac purus mattis, rhoncus fringilla libero. Curabitur aliquam vehicula commodo. Etiam dictum turpis vitae magna efficitur, rutrum mollis est tristique. Ut et laoreet justo.</p>\r\n\r\n<p>Cras commodo, lacus quis laoreet lacinia, sapien lacus gravida est, vulputate eleifend metus nibh quis purus. In imperdiet tincidunt erat, ut finibus nibh porttitor at. Sed vel tempor risus. Donec dolor lectus, ultrices id mauris vitae, ornare aliquet metus. Duis luctus purus in nulla sollicitudin, eget porta dolor auctor. Integer vel sem turpis. Sed non magna ante. Praesent vestibulum tempor diam tincidunt tristique. Sed ante lacus, cursus ut eros auctor, porta placerat leo. Donec feugiat sodales tortor, at euismod turpis. Nulla sed pellentesque mi. Morbi eu tellus ut turpis ullamcorper ornare. Donec eu lectus a tortor condimentum consectetur non id justo. Nunc rhoncus erat vel congue fringilla.</p>\r\n\r\n<p>Cras vitae rhoncus est. Phasellus euismod dolor sit amet nulla fermentum, at blandit est dapibus. Proin viverra, lectus at viverra finibus, libero nisi imperdiet elit, a pretium quam nisl a dui. Donec sagittis sit amet ligula vel vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras convallis lorem sit amet purus fringilla tincidunt. Curabitur congue diam velit, vitae sagittis felis dictum id. Curabitur a dolor vel diam pharetra aliquam non non nibh. In hac habitasse platea dictumst. Vivamus in est eu turpis euismod mattis. Quisque lacinia libero in tristique hendrerit. Donec ac egestas ligula. Duis vulputate bibendum odio commodo posuere. Vestibulum congue volutpat hendrerit.</p>\r\n\r\n<p>Duis bibendum faucibus fringilla. Donec eu sem nec turpis interdum ultrices ut porta ante. Integer ut quam at nibh molestie faucibus. Donec tincidunt augue non elit facilisis, non congue dolor cursus. Morbi vitae ante eget tortor efficitur eleifend vitae eu enim. Ut commodo nibh ut erat elementum, eget hendrerit est feugiat. Aliquam fermentum sem non elit tempus, in porttitor neque rutrum. Phasellus viverra libero eget sem dapibus luctus vel non erat. In vestibulum velit at dui finibus, sollicitudin feugiat ante tincidunt. Praesent aliquet magna sed blandit finibus. Quisque eget erat libero. Duis consequat sem at lacus tristique, sed scelerisque erat blandit.</p>\r\n', NULL, '09/11/2020', 1, 'test-diger-konular');
INSERT INTO `yazilar` VALUES (3, 1, 'Test Web', '\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum massa sapien, vitae pulvinar ex mollis non. Sed felis enim, euismod in lorem a, gravida blandit odio. Suspendisse potenti. Sed odio lacus, euismod sit amet tempus quis, mollis eget sapien. Vivamus ullamcorper at risus et luctus. Etiam auctor dolor eget vestibulum lobortis. Proin aliquet vulputate lorem, volutpat blandit neque pellentesque non. Donec dolor felis, suscipit quis malesuada in, fringilla ac sapien. Nullam eleifend arcu mauris, eget venenatis lorem consequat eget. Duis scelerisque blandit hendrerit. Aliquam suscipit tellus est, sed tristique velit facilisis a.</p>\r\n\r\n<p>Aenean non velit ante. Sed tristique lobortis lacus, euismod dictum felis dapibus id. Duis eu egestas ex. Curabitur quis erat magna. Aenean a volutpat dolor. Mauris quam magna, iaculis ac purus mattis, rhoncus fringilla libero. Curabitur aliquam vehicula commodo. Etiam dictum turpis vitae magna efficitur, rutrum mollis est tristique. Ut et laoreet justo.</p>\r\n\r\n<p>Cras commodo, lacus quis laoreet lacinia, sapien lacus gravida est, vulputate eleifend metus nibh quis purus. In imperdiet tincidunt erat, ut finibus nibh porttitor at. Sed vel tempor risus. Donec dolor lectus, ultrices id mauris vitae, ornare aliquet metus. Duis luctus purus in nulla sollicitudin, eget porta dolor auctor. Integer vel sem turpis. Sed non magna ante. Praesent vestibulum tempor diam tincidunt tristique. Sed ante lacus, cursus ut eros auctor, porta placerat leo. Donec feugiat sodales tortor, at euismod turpis. Nulla sed pellentesque mi. Morbi eu tellus ut turpis ullamcorper ornare. Donec eu lectus a tortor condimentum consectetur non id justo. Nunc rhoncus erat vel congue fringilla.</p>\r\n\r\n<p>Cras vitae rhoncus est. Phasellus euismod dolor sit amet nulla fermentum, at blandit est dapibus. Proin viverra, lectus at viverra finibus, libero nisi imperdiet elit, a pretium quam nisl a dui. Donec sagittis sit amet ligula vel vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras convallis lorem sit amet purus fringilla tincidunt. Curabitur congue diam velit, vitae sagittis felis dictum id. Curabitur a dolor vel diam pharetra aliquam non non nibh. In hac habitasse platea dictumst. Vivamus in est eu turpis euismod mattis. Quisque lacinia libero in tristique hendrerit. Donec ac egestas ligula. Duis vulputate bibendum odio commodo posuere. Vestibulum congue volutpat hendrerit.</p>\r\n\r\n<p>Duis bibendum faucibus fringilla. Donec eu sem nec turpis interdum ultrices ut porta ante. Integer ut quam at nibh molestie faucibus. Donec tincidunt augue non elit facilisis, non congue dolor cursus. Morbi vitae ante eget tortor efficitur eleifend vitae eu enim. Ut commodo nibh ut erat elementum, eget hendrerit est feugiat. Aliquam fermentum sem non elit tempus, in porttitor neque rutrum. Phasellus viverra libero eget sem dapibus luctus vel non erat. In vestibulum velit at dui finibus, sollicitudin feugiat ante tincidunt. Praesent aliquet magna sed blandit finibus. Quisque eget erat libero. Duis consequat sem at lacus tristique, sed scelerisque erat blandit.</p>\r\n\r\n', NULL, '09/11/2020', 1, 'test-web');
INSERT INTO `yazilar` VALUES (4, 1, 'Test Dizi', '\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum massa sapien, vitae pulvinar ex mollis non. Sed felis enim, euismod in lorem a, gravida blandit odio. Suspendisse potenti. Sed odio lacus, euismod sit amet tempus quis, mollis eget sapien. Vivamus ullamcorper at risus et luctus. Etiam auctor dolor eget vestibulum lobortis. Proin aliquet vulputate lorem, volutpat blandit neque pellentesque non. Donec dolor felis, suscipit quis malesuada in, fringilla ac sapien. Nullam eleifend arcu mauris, eget venenatis lorem consequat eget. Duis scelerisque blandit hendrerit. Aliquam suscipit tellus est, sed tristique velit facilisis a.</p>\r\n\r\n<p>Aenean non velit ante. Sed tristique lobortis lacus, euismod dictum felis dapibus id. Duis eu egestas ex. Curabitur quis erat magna. Aenean a volutpat dolor. Mauris quam magna, iaculis ac purus mattis, rhoncus fringilla libero. Curabitur aliquam vehicula commodo. Etiam dictum turpis vitae magna efficitur, rutrum mollis est tristique. Ut et laoreet justo.</p>\r\n\r\n<p>Cras commodo, lacus quis laoreet lacinia, sapien lacus gravida est, vulputate eleifend metus nibh quis purus. In imperdiet tincidunt erat, ut finibus nibh porttitor at. Sed vel tempor risus. Donec dolor lectus, ultrices id mauris vitae, ornare aliquet metus. Duis luctus purus in nulla sollicitudin, eget porta dolor auctor. Integer vel sem turpis. Sed non magna ante. Praesent vestibulum tempor diam tincidunt tristique. Sed ante lacus, cursus ut eros auctor, porta placerat leo. Donec feugiat sodales tortor, at euismod turpis. Nulla sed pellentesque mi. Morbi eu tellus ut turpis ullamcorper ornare. Donec eu lectus a tortor condimentum consectetur non id justo. Nunc rhoncus erat vel congue fringilla.</p>\r\n\r\n<p>Cras vitae rhoncus est. Phasellus euismod dolor sit amet nulla fermentum, at blandit est dapibus. Proin viverra, lectus at viverra finibus, libero nisi imperdiet elit, a pretium quam nisl a dui. Donec sagittis sit amet ligula vel vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras convallis lorem sit amet purus fringilla tincidunt. Curabitur congue diam velit, vitae sagittis felis dictum id. Curabitur a dolor vel diam pharetra aliquam non non nibh. In hac habitasse platea dictumst. Vivamus in est eu turpis euismod mattis. Quisque lacinia libero in tristique hendrerit. Donec ac egestas ligula. Duis vulputate bibendum odio commodo posuere. Vestibulum congue volutpat hendrerit.</p>\r\n\r\n<p>Duis bibendum faucibus fringilla. Donec eu sem nec turpis interdum ultrices ut porta ante. Integer ut quam at nibh molestie faucibus. Donec tincidunt augue non elit facilisis, non congue dolor cursus. Morbi vitae ante eget tortor efficitur eleifend vitae eu enim. Ut commodo nibh ut erat elementum, eget hendrerit est feugiat. Aliquam fermentum sem non elit tempus, in porttitor neque rutrum. Phasellus viverra libero eget sem dapibus luctus vel non erat. In vestibulum velit at dui finibus, sollicitudin feugiat ante tincidunt. Praesent aliquet magna sed blandit finibus. Quisque eget erat libero. Duis consequat sem at lacus tristique, sed scelerisque erat blandit.</p>\r\n\r\n', NULL, '09/11/2020', 1, 'test-dizi');
INSERT INTO `yazilar` VALUES (5, 1, 'Test Nasıl ', '\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum massa sapien, vitae pulvinar ex mollis non. Sed felis enim, euismod in lorem a, gravida blandit odio. Suspendisse potenti. Sed odio lacus, euismod sit amet tempus quis, mollis eget sapien. Vivamus ullamcorper at risus et luctus. Etiam auctor dolor eget vestibulum lobortis. Proin aliquet vulputate lorem, volutpat blandit neque pellentesque non. Donec dolor felis, suscipit quis malesuada in, fringilla ac sapien. Nullam eleifend arcu mauris, eget venenatis lorem consequat eget. Duis scelerisque blandit hendrerit. Aliquam suscipit tellus est, sed tristique velit facilisis a.</p>\r\n\r\n<p>Aenean non velit ante. Sed tristique lobortis lacus, euismod dictum felis dapibus id. Duis eu egestas ex. Curabitur quis erat magna. Aenean a volutpat dolor. Mauris quam magna, iaculis ac purus mattis, rhoncus fringilla libero. Curabitur aliquam vehicula commodo. Etiam dictum turpis vitae magna efficitur, rutrum mollis est tristique. Ut et laoreet justo.</p>\r\n\r\n<p>Cras commodo, lacus quis laoreet lacinia, sapien lacus gravida est, vulputate eleifend metus nibh quis purus. In imperdiet tincidunt erat, ut finibus nibh porttitor at. Sed vel tempor risus. Donec dolor lectus, ultrices id mauris vitae, ornare aliquet metus. Duis luctus purus in nulla sollicitudin, eget porta dolor auctor. Integer vel sem turpis. Sed non magna ante. Praesent vestibulum tempor diam tincidunt tristique. Sed ante lacus, cursus ut eros auctor, porta placerat leo. Donec feugiat sodales tortor, at euismod turpis. Nulla sed pellentesque mi. Morbi eu tellus ut turpis ullamcorper ornare. Donec eu lectus a tortor condimentum consectetur non id justo. Nunc rhoncus erat vel congue fringilla.</p>\r\n\r\n<p>Cras vitae rhoncus est. Phasellus euismod dolor sit amet nulla fermentum, at blandit est dapibus. Proin viverra, lectus at viverra finibus, libero nisi imperdiet elit, a pretium quam nisl a dui. Donec sagittis sit amet ligula vel vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras convallis lorem sit amet purus fringilla tincidunt. Curabitur congue diam velit, vitae sagittis felis dictum id. Curabitur a dolor vel diam pharetra aliquam non non nibh. In hac habitasse platea dictumst. Vivamus in est eu turpis euismod mattis. Quisque lacinia libero in tristique hendrerit. Donec ac egestas ligula. Duis vulputate bibendum odio commodo posuere. Vestibulum congue volutpat hendrerit.</p>\r\n\r\n<p>Duis bibendum faucibus fringilla. Donec eu sem nec turpis interdum ultrices ut porta ante. Integer ut quam at nibh molestie faucibus. Donec tincidunt augue non elit facilisis, non congue dolor cursus. Morbi vitae ante eget tortor efficitur eleifend vitae eu enim. Ut commodo nibh ut erat elementum, eget hendrerit est feugiat. Aliquam fermentum sem non elit tempus, in porttitor neque rutrum. Phasellus viverra libero eget sem dapibus luctus vel non erat. In vestibulum velit at dui finibus, sollicitudin feugiat ante tincidunt. Praesent aliquet magna sed blandit finibus. Quisque eget erat libero. Duis consequat sem at lacus tristique, sed scelerisque erat blandit.</p>\r\n\r\n', NULL, '09/11/2020', 1, 'test-nasil');
INSERT INTO `yazilar` VALUES (6, 1, 'Test Deneme', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>BM, söz konusu duyuru sırasında Dünya Ekonomik Forumu’nun hazırladığı İşin Geleceği Raporu’nun 2022 yılında tüm işlerin yüzde 42&#39;si önemli ölçüde değişim geçireceğini ve analitik veya tasarım odaklı düşünme gibi yeni beceriler ile karmaşık sorun çözme gibi teknik olmayan becerilerin öne çıkacağını gösterdiğini hatırlattı. IBM’in açıklamasına göre Open P-Tech, katılımcıları bilişim teknolojileri ile tanıştırmanın yanı sıra tasarım odaklı düşünme, çeviklik gibi profesyonel beceriler konusunda da eğitimler veriyor. Ayrıca açıklamalara göre bu eğitimler, “yeni yaka meslekler” olarak adlandırılan doğru becerilere sahip olmanın; belirli bir diplomaya sahip olmaktan daha önemli olduğu iş kollarını da kapsıyor</p>\r\n', NULL, '09/11/2020', 1, 'test-deneme');

-- ----------------------------
-- Table structure for yorum
-- ----------------------------
DROP TABLE IF EXISTS `yorum`;
CREATE TABLE `yorum`  (
  `yorum_id` int NOT NULL AUTO_INCREMENT,
  `yazi_id` int NULL DEFAULT NULL,
  `uye_id` int NULL DEFAULT NULL,
  `üst_id` int NULL DEFAULT NULL COMMENT 'üst_id=Yorum id ye alt yorumdur demek',
  `yorum` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `onay` tinyint(1) NULL DEFAULT NULL,
  `tarih` varchar(10) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`yorum_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yorum
-- ----------------------------
INSERT INTO `yorum` VALUES (1, 1, 1, 0, 'Yorum bir', NULL, 1, '09/11/2020');
INSERT INTO `yorum` VALUES (2, 1, 1, 0, 'Yorum iki', NULL, 1, '09/11/2020');
INSERT INTO `yorum` VALUES (3, 1, 2, 1, 'Birinci yorumun yanıtı', NULL, 1, '09/11/2020');
INSERT INTO `yorum` VALUES (4, 1, 1, 1, 'Birinci yorumun ikinci yanıtı', NULL, 1, '10/11/2020');
INSERT INTO `yorum` VALUES (5, 1, 2, 2, 'İkinci yorumun yanıtı', NULL, 1, '10/11/2020');
INSERT INTO `yorum` VALUES (6, 1, 3, 0, 'Üçüncü yorum testi ', '0', 1, '11-11-2020');
INSERT INTO `yorum` VALUES (7, 1, 3, 0, '3. Yorum yanıtı testiii yyoaaa', '0', 1, '11-11-2020');
INSERT INTO `yorum` VALUES (8, 1, 3, 6, '3. Yorum yanıtı testiii yyoaaa', '0', 1, '11-11-2020');
INSERT INTO `yorum` VALUES (9, 1, 3, 0, '4 yorum metini testi ', '0', 1, '11-11-2020');
INSERT INTO `yorum` VALUES (13, 2, 3, 0, ' Remove all characters except letters, digits and !#$%&&#39;*+-=?^_`{|}~@.[]. ', '0', 1, '11-11-2020');
INSERT INTO `yorum` VALUES (14, 2, 3, 0, '5.yorum', '0', 1, '11-11-2020');
INSERT INTO `yorum` VALUES (15, 2, 3, 0, 'Ulas can nacaksız', '0', 1, '12-11-2020');
INSERT INTO `yorum` VALUES (16, 2, 3, 0, 'test 123456', '0', 1, '12-11-2020');

SET FOREIGN_KEY_CHECKS = 1;
