CREATE TABLE `lawsive`.`plug` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` INTEGER  NOT NULL,
  `is_adopt` INTEGER  NOT NULL DEFAULT 0,
  `adopt_type` INTEGER  NOT NULL DEFAULT 0 COMMENT '发布方式',
  `member_id` INTEGER  NOT NULL,
  `member_name` VARCHAR(50)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` VARCHAR(50)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` VARCHAR(250)  CHARACTER SET utf8 COLLATE utf8_general_ci,
  `content` TEXT  NOT NULL,
  `priority` INTEGER  NOT NULL DEFAULT 100,
  `created_at` DATETIME  NOT NULL,
  `lasted_at` DATETIME  NOT NULL,
  `photo` VARCHAR(120)  CHARACTER SET utf8 COLLATE utf8_general_ci  COMMENT '照片地址',
  `file` VARCHAR(120)  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '上传文档地址',
  `href` VARCHAR(120)  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '外部网页地址',
  PRIMARY KEY (`id`)
)
 ENGINE = MyISAM
 CHARACTER SET utf8 COLLATE utf8_general_ci
 COMMENT = '专栏';
