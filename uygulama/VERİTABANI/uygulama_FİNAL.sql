/*
 Navicat Premium Data Transfer

 Source Server         : LocalHost
 Source Server Type    : MySQL
 Source Server Version : 100416
 Source Host           : localhost:3306
 Source Schema         : uygulama

 Target Server Type    : MySQL
 Target Server Version : 100416
 File Encoding         : 65001

 Date: 24/11/2020 19:02:57
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
INSERT INTO `menu` VALUES (6, 'Projelerim', 'projeler', 0);

-- ----------------------------
-- Table structure for projeler
-- ----------------------------
DROP TABLE IF EXISTS `projeler`;
CREATE TABLE `projeler`  (
  `proje_id` int NOT NULL AUTO_INCREMENT,
  `proje_isim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `amaci` varchar(5000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `versiyon` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `bug` varchar(5000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `ozellikler` varchar(5000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `surum_notlari` varchar(5000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `link` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `sef_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`proje_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10000005 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of projeler
-- ----------------------------
INSERT INTO `projeler` VALUES (10000001, 'Test isim', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid at debitis deleniti est eum exercitationem explicabo in nemo, nesciunt odio officiis optio quaerat quo saepe sed sequi sint veritatis vero.</p>\r\n', '10.2.1.3', NULL, 'Yapılan işler,Yapılan işlerYapılan işler', 'Güncelleme Yapıldı Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus accusantium architecto asperiores aut autem corporis doloribus exercitationem, in ipsam iure nulla repellat similique sint voluptatem! Eligendi id nesciunt quisquam. ', 'www.indir.com/ttt', 'test-isim');
INSERT INTO `projeler` VALUES (10000003, 'Test Programlama', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid at debitis deleniti est eum exercitationem explicabo in nemo, nesciunt odio officiis optio quaerat quo saepe sed sequi sint veritatis vero.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid at debitis deleniti est eum exercitationem explicabo in nemo, nesciunt odio officiis optio quaerat quo saepe sed sequi sint veritatis vero.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid at debitis deleniti est eum exercitationem explicabo in nemo, nesciunt odio officiis optio quaerat quo saepe sed sequi sint veritatis vero.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid at debitis deleniti est eum exercitationem explicabo in nemo, nesciunt odio officiis optio quaerat quo saepe sed sequi sint veritatis vero.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid at debitis deleniti est eum exercitationem explicabo in nemo, nesciunt odio officiis optio quaerat quo saepe sed sequi sint veritatis vero.</p>\r\n', '35.00.1', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid at debitis deleniti est eum exercitationem explicabo in nemo, nesciunt odio officiis optio quaerat quo saepe sed sequi sint veritatis vero.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid at debitis deleniti est eum exercitationem explicabo in nemo, nesciunt odio officiis optio quaerat quo saepe sed sequi sint veritatis vero.', 'www.google.com', 'test-programlama');
INSERT INTO `projeler` VALUES (10000004, 'Test projesi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tincidunt risus eu odio luctus, ac fringilla est ultrices. Phasellus eget ornare nulla. Donec nec commodo orci. Maecenas at metus et nunc mollis rhoncus sed at lectus. Fusce viverra in urna suscipit tristique. Nulla facilisi. Nulla facilisi. Donec nec massa in libero sodales molestie sit amet vulputate leo. Aliquam quis efficitur nulla. Mauris lobortis efficitur ipsum eget accumsan. Quisque malesuada placerat elit, sit amet tristique urna accumsan cursus. Vivamus ornare dictum felis quis pellentesque. Vivamus vulputate posuere cursus. Praesent augue velit, malesuada non lobortis et, porta sit amet lacus. Sed varius vehicula ante vitae vestibulum.</p>\r\n\r\n<p>Donec interdum congue sem eu vehicula. Nulla nulla velit, pretium a aliquam in, ultricies quis lacus. Praesent congue blandit egestas. Etiam eros libero, venenatis in mi a, congue laoreet orci. Donec rhoncus pretium viverra. Phasellus placerat suscipit erat, sed pellentesque nibh sollicitudin non. Vivamus in fringilla augue.</p>\r\n\r\n<p>Etiam rutrum gravida eros, et commodo est semper et. Vestibulum feugiat magna vitae sagittis ullamcorper. Sed quis ex facilisis, vehicula elit eget, eleifend dolor. Aenean leo augue, posuere vehicula metus eget, feugiat pharetra tellus. Quisque vel augue elit. Nullam in nisi aliquam, venenatis libero id, facilisis nibh. Aliquam erat massa, hendrerit tempor ante nec, hendrerit posuere diam. Donec varius, sapien non vulputate auctor, dolor quam tempor orci, ut semper massa nisi sit amet ipsum. Ut viverra lorem sed nisl facilisis, in laoreet est cursus. Quisque faucibus imperdiet leo id iaculis.</p>\r\n', '1', NULL, '<li>Test</li>\r\n<li>Test</li>\r\n<li>Test</li>', '<li>Test</li>\r\n<li>Test</li>\r\n<li>Test</li>', 'Google.com', 'test-projesi');

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
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of resimler
-- ----------------------------
INSERT INTO `resimler` VALUES (1, 10000001, 'uploads', 'a813e304c1ab70ef7ef7dd144040196f.jpg', b'0');
INSERT INTO `resimler` VALUES (2, 2, 'uploads', 'b6897838aab3c9c6881dedd45250ca5d.jpg', b'1');
INSERT INTO `resimler` VALUES (3, 3, 'uploads', '57942f15d0feb499750700482e35fd51.jpg', b'1');
INSERT INTO `resimler` VALUES (4, 4, 'uploads', 'dsdsadsadsa.jpg', b'1');
INSERT INTO `resimler` VALUES (5, 5, 'uploads', 'dsfsdfsdfsd.jpg', b'1');
INSERT INTO `resimler` VALUES (6, 6, 'uploads', '83fedbf64e8ad03cca840a5d0e2a511f.jpg', b'1');
INSERT INTO `resimler` VALUES (7, 10000001, 'uploads', '649eb9f933a88c50edee67792093caa2.jpg', b'0');
INSERT INTO `resimler` VALUES (8, 10000001, 'uploads', '649eb9f933a88c50edee67792093caa2.jpg', b'0');
INSERT INTO `resimler` VALUES (9, 10000001, 'uploads', '649eb9f933a88c50edee67792093caa2.jpg', b'0');
INSERT INTO `resimler` VALUES (10, 10000001, 'uploads', 'd84a7ac74f7e4f5ec69a7f3215616cf4.jpg', b'1');
INSERT INTO `resimler` VALUES (11, 10000002, 'uploads', 'bebf45cc2dffa7a37f8aba03e1ad675e.jpg', b'0');
INSERT INTO `resimler` VALUES (12, 10000002, 'uploads', 'bebf45cc2dffa7a37f8aba03e1ad675e.jpg', b'0');
INSERT INTO `resimler` VALUES (13, NULL, 'uploads', 'c3e45a37adb5064948cf938b5a5043ff.png', b'1');
INSERT INTO `resimler` VALUES (14, 10000002, 'uploads', 'bebf45cc2dffa7a37f8aba03e1ad675e.jpg', b'0');
INSERT INTO `resimler` VALUES (15, 10000002, 'uploads', 'f5fb4669db53670c4d4863f03931f577.jpg', b'1');
INSERT INTO `resimler` VALUES (16, 10000002, 'uploads', 'bebf45cc2dffa7a37f8aba03e1ad675e.jpg', b'0');
INSERT INTO `resimler` VALUES (20, 10000003, 'uploads', 'a4147146e8a332e3940d9af83a1f646a.jpg', b'0');
INSERT INTO `resimler` VALUES (21, 10000003, 'uploads', '541bd442aa61ca52e48026cdd9067fab.jpg', b'0');
INSERT INTO `resimler` VALUES (22, 10000003, 'uploads', 'f4f440ac871f96b2b9f4dd2c9fab5398.jpg', b'0');
INSERT INTO `resimler` VALUES (23, 10000003, 'uploads', '3507201789a6a1e4fb218b3a19e70a12.png', b'0');
INSERT INTO `resimler` VALUES (24, 10000003, 'uploads', '24244a52822eb9c895413de0848f04df.jpg', b'1');
INSERT INTO `resimler` VALUES (25, 2, 'uploads', '21580b3165599a7bb62160d550601f67.jpg', b'0');
INSERT INTO `resimler` VALUES (26, 3, 'uploads', '0d4446b4a6bb1822a4ce4268f9367c9d.jpg', b'0');
INSERT INTO `resimler` VALUES (27, 10000004, 'uploads', '56150472adc62bb75ec179706558b640.jpg', b'0');
INSERT INTO `resimler` VALUES (28, 10000004, 'uploads', '8ab4eefe1fe4c9720716e549d15007e0.jpg', b'0');
INSERT INTO `resimler` VALUES (29, 10000004, 'uploads', 'bcf753ce8859d094e6efc4189428c516.jpg', b'0');
INSERT INTO `resimler` VALUES (30, 10000004, 'uploads', 'dd372b60e53b38121c9494f03a881e10.jpg', b'0');
INSERT INTO `resimler` VALUES (31, 10000004, 'uploads', '03808f7d3c39528ac9d0b865238c79fc.jpg', b'1');

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
INSERT INTO `yazilar` VALUES (2, 1, 'Test Diger Konular', '<p> </p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum massa sapien, vitae pulvinar ex mollis non. Sed felis enim, euismod in lorem a, gravida blandit odio. Suspendisse potenti. Sed odio lacus, euismod sit amet tempus quis, mollis eget sapien. Vivamus ullamcorper at risus et luctus. Etiam auctor dolor eget vestibulum lobortis. Proin aliquet vulputate lorem, volutpat blandit neque pellentesque non. Donec dolor felis, suscipit quis malesuada in, fringilla ac sapien. Nullam eleifend arcu mauris, eget venenatis lorem consequat eget. Duis scelerisque blandit hendrerit. Aliquam suscipit tellus est, sed tristique velit facilisis a.</p>\r\n\r\n<p>Aenean non velit ante. Sed tristique lobortis lacus, euismod dictum felis dapibus id. Duis eu egestas ex. Curabitur quis erat magna. Aenean a volutpat dolor. Mauris quam magna, iaculis ac purus mattis, rhoncus fringilla libero. Curabitur aliquam vehicula commodo. Etiam dictum turpis vitae magna efficitur, rutrum mollis est tristique. Ut et laoreet justo.</p>\r\n\r\n<p>Cras commodo, lacus quis laoreet lacinia, sapien lacus gravida est, vulputate eleifend metus nibh quis purus. In imperdiet tincidunt erat, ut finibus nibh porttitor at. Sed vel tempor risus. Donec dolor lectus, ultrices id mauris vitae, ornare aliquet metus. Duis luctus purus in nulla sollicitudin, eget porta dolor auctor. Integer vel sem turpis. Sed non magna ante. Praesent vestibulum tempor diam tincidunt tristique. Sed ante lacus, cursus ut eros auctor, porta placerat leo. Donec feugiat sodales tortor, at euismod turpis. Nulla sed pellentesque mi. Morbi eu tellus ut turpis ullamcorper ornare. Donec eu lectus a tortor condimentum consectetur non id justo. Nunc rhoncus erat vel congue fringilla.</p>\r\n\r\n<p>Cras vitae rhoncus est. Phasellus euismod dolor sit amet nulla fermentum, at blandit est dapibus. Proin viverra, lectus at viverra finibus, libero nisi imperdiet elit, a pretium quam nisl a dui. Donec sagittis sit amet ligula vel vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras convallis lorem sit amet purus fringilla tincidunt. Curabitur congue diam velit, vitae sagittis felis dictum id. Curabitur a dolor vel diam pharetra aliquam non non nibh. In hac habitasse platea dictumst. Vivamus in est eu turpis euismod mattis. Quisque lacinia libero in tristique hendrerit. Donec ac egestas ligula. Duis vulputate bibendum odio commodo posuere. Vestibulum congue volutpat hendrerit.</p>\r\n\r\n<p>Duis bibendum faucibus fringilla. Donec eu sem nec turpis interdum ultrices ut porta ante. Integer ut quam at nibh molestie faucibus. Donec tincidunt augue non elit facilisis, non congue dolor cursus. Morbi vitae ante eget tortor efficitur eleifend vitae eu enim. Ut commodo nibh ut erat elementum, eget hendrerit est feugiat. Aliquam fermentum sem non elit tempus, in porttitor neque rutrum. Phasellus viverra libero eget sem dapibus luctus vel non erat. In vestibulum velit at dui finibus, sollicitudin feugiat ante tincidunt. Praesent aliquet magna sed blandit finibus. Quisque eget erat libero. Duis consequat sem at lacus tristique, sed scelerisque erat blandit.</p>\r\n', NULL, '24/11/2020', 1, 'test-diger-konular');
INSERT INTO `yazilar` VALUES (3, 1, 'Test Web', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum massa sapien, vitae pulvinar ex mollis non. Sed felis enim, euismod in lorem a, gravida blandit odio. Suspendisse potenti. Sed odio lacus, euismod sit amet tempus quis, mollis eget sapien. Vivamus ullamcorper at risus et luctus. Etiam auctor dolor eget vestibulum lobortis. Proin aliquet vulputate lorem, volutpat blandit neque pellentesque non. Donec dolor felis, suscipit quis malesuada in, fringilla ac sapien. Nullam eleifend arcu mauris, eget venenatis lorem consequat eget. Duis scelerisque blandit hendrerit. Aliquam suscipit tellus est, sed tristique velit facilisis a.</p>\r\n\r\n<p>Aenean non velit ante. Sed tristique lobortis lacus, euismod dictum felis dapibus id. Duis eu egestas ex. Curabitur quis erat magna. Aenean a volutpat dolor. Mauris quam magna, iaculis ac purus mattis, rhoncus fringilla libero. Curabitur aliquam vehicula commodo. Etiam dictum turpis vitae magna efficitur, rutrum mollis est tristique. Ut et laoreet justo.</p>\r\n\r\n<p>Cras commodo, lacus quis laoreet lacinia, sapien lacus gravida est, vulputate eleifend metus nibh quis purus. In imperdiet tincidunt erat, ut finibus nibh porttitor at. Sed vel tempor risus. Donec dolor lectus, ultrices id mauris vitae, ornare aliquet metus. Duis luctus purus in nulla sollicitudin, eget porta dolor auctor. Integer vel sem turpis. Sed non magna ante. Praesent vestibulum tempor diam tincidunt tristique. Sed ante lacus, cursus ut eros auctor, porta placerat leo. Donec feugiat sodales tortor, at euismod turpis. Nulla sed pellentesque mi. Morbi eu tellus ut turpis ullamcorper ornare. Donec eu lectus a tortor condimentum consectetur non id justo. Nunc rhoncus erat vel congue fringilla.</p>\r\n\r\n<p>Cras vitae rhoncus est. Phasellus euismod dolor sit amet nulla fermentum, at blandit est dapibus. Proin viverra, lectus at viverra finibus, libero nisi imperdiet elit, a pretium quam nisl a dui. Donec sagittis sit amet ligula vel vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras convallis lorem sit amet purus fringilla tincidunt. Curabitur congue diam velit, vitae sagittis felis dictum id. Curabitur a dolor vel diam pharetra aliquam non non nibh. In hac habitasse platea dictumst. Vivamus in est eu turpis euismod mattis. Quisque lacinia libero in tristique hendrerit. Donec ac egestas ligula. Duis vulputate bibendum odio commodo posuere. Vestibulum congue volutpat hendrerit.</p>\r\n\r\n<p>Duis bibendum faucibus fringilla. Donec eu sem nec turpis interdum ultrices ut porta ante. Integer ut quam at nibh molestie faucibus. Donec tincidunt augue non elit facilisis, non congue dolor cursus. Morbi vitae ante eget tortor efficitur eleifend vitae eu enim. Ut commodo nibh ut erat elementum, eget hendrerit est feugiat. Aliquam fermentum sem non elit tempus, in porttitor neque rutrum. Phasellus viverra libero eget sem dapibus luctus vel non erat. In vestibulum velit at dui finibus, sollicitudin feugiat ante tincidunt. Praesent aliquet magna sed blandit finibus. Quisque eget erat libero. Duis consequat sem at lacus tristique, sed scelerisque erat blandit.</p>\r\n', NULL, '24/11/2020', 1, 'test-web');
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
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

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
