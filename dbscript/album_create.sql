CREATE TABLE `lawsive`.`album` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` INTEGER  NOT NULL,
  `member_name` VARCHAR(50)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` VARCHAR(50)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `front_cover` VARCHAR(60)  CHARACTER SET utf8 COLLATE utf8_general_ci,
  `description` VARCHAR(120)  CHARACTER SET utf8 COLLATE utf8_general_ci,
  `created_at` DATETIME  NOT NULL,
  `visit_count` INTEGER  NOT NULL DEFAULT 0,
  `comment_count` INTEGER  NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)
 ENGINE = MyISAM
 CHARACTER SET utf8 COLLATE utf8_general_ci
 COMMENT = '相册';
