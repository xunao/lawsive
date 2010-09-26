CREATE  TABLE `lawsive`.`mood` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `u_id` INT(10) NOT NULL COMMENT '用户ID' ,
  `content` VARCHAR(45)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '心情内容' ,
  `created_at` DATETIME NOT NULL COMMENT '创建时间' ,
  `u_name` VARCHAR(45)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户昵称' ,
  `comment_count` INT(10) NOT NULL DEFAULT 0 COMMENT '评论数' ,
  PRIMARY KEY (`id`) )
 ENGINE = MyISAM 
 CHARACTER SET utf8 COLLATE utf8_general_ci
 COMMENT = '一句话心情'; 

