CREATE TABLE `lawsive`.`member_avatar` (
  `id` INTEGER  NOT NULL AUTO_INCREMENT,
  `member_id` INTEGER  NOT NULL,
  `member_avatar` VARCHAR(120)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` DATETIME  NOT NULL,
  PRIMARY KEY (`id`)
)
 ENGINE = MyISAM
 CHARACTER SET utf8 COLLATE utf8_general_ci
 COMMENT = '用户头像库';
