CREATE TABLE `lawsive`.`member_photo` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` INTEGER  NOT NULL,
  `member_name` VARCHAR(50)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` VARCHAR(50)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '照片标题',
  `category_id` INTEGER  NOT NULL COMMENT 'album_id专辑编号',
  `src` VARCHAR(60)  NOT NULL COMMENT '照片地址',
  `created_at` DATETIME  NOT NULL,
  `last_edit_at` DATETIME  NOT NULL,
  `description` VARCHAR(500)  CHARACTER SET utf8 COLLATE utf8_general_ci,
  `ip` VARCHAR(100) ,
  `visit_count` INTEGER  NOT NULL DEFAULT 0 COMMENT '访问次数',
  `comment_count` INTEGER  NOT NULL DEFAULT 0 COMMENT '关注/评论次数',
  PRIMARY KEY (`id`)
)
 ENGINE = MyISAM
 CHARACTER SET utf8 COLLATE utf8_general_ci
 COMMENT = '用户相册照片';
