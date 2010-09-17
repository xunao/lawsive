ALTER TABLE `lawsive`.`article` MODIFY COLUMN `admin_user_id` INTEGER  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '发布者',
 MODIFY COLUMN `category` integer  CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '文章子分类';

