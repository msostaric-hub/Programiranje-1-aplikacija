SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administratori
-- ----------------------------
DROP TABLE IF EXISTS `administratori`;
CREATE TABLE `administratori` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) DEFAULT NULL,
  `prezime` varchar(100) DEFAULT NULL,
  `korisnicko_ime` varchar(100) DEFAULT NULL,
  `lozinka` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of administratori
-- ----------------------------
INSERT INTO `administratori` VALUES ('1', 'Mace', 'Windu', 'mace', 'windu');

-- ----------------------------
-- Table structure for savezi
-- ----------------------------
DROP TABLE IF EXISTS `savezi`;
CREATE TABLE `savezi` (
  `id_saveza` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) DEFAULT NULL,
  `vladar` int(11) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_saveza`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Records of savezi
-- ----------------------------

INSERT INTO `savezi` VALUES ('1', 'Galactic Empire', '1', "savez_1.png");
INSERT INTO `savezi` VALUES ('2', 'Rebel Alliance', '2', "savez_2.png");
INSERT INTO `savezi` VALUES ('3', 'Hutt Cartel', '3', "savez_3.png");

-- ----------------------------
-- Table structure for vladari
-- ----------------------------
DROP TABLE IF EXISTS `vadari`;
CREATE TABLE `vladari` (
  `id_vladara` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) DEFAULT NULL,
  `prezime` varchar(255) DEFAULT NULL,
  `savez` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vladara`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `vladari` VALUES ('1', 'Sheev', 'Palpatine', '1');
INSERT INTO `vladari` VALUES ('2', 'Mon', 'Mothma', '2');
INSERT INTO `vladari` VALUES ('3', 'Jabba', 'Desilijic Tiure', '3');
