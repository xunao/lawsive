CREATE TABLE `lawsive`.`friend_news` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` INTEGER  NOT NULL COMMENT '用户ID',
  `resource_type` VARCHAR(30)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '动态类型',
  `resource_id` INTEGER COMMENT '消息源ID',
  `created_at` DATETIME  NOT NULL,
  `description` VARCHAR(500)  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '描述',
  `content` VARCHAR(500)  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '内容',
  `member_name` VARCHAR(120)  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '用户名',
  `photo` VARCHAR(500)  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '用户照片',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT = '好友动态';
