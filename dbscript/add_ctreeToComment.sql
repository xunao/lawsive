ALTER TABLE `lawsive`.`comment` ADD COLUMN `comment_tree` varchar(512)  COMMENT '评论树，存储评论回复关系' AFTER `reserve`;
