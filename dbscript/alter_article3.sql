ALTER TABLE `lawsive`.`article` MODIFY COLUMN `admin_user_id` INTEGER  NOT NULL COMMENT '发布者',
 MODIFY COLUMN `category` INTEGER  DEFAULT NULL COMMENT '文章子分类';

