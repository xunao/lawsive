CREATE  TABLE `lawsive`.`mood` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `u_id` INT(10) NOT NULL COMMENT '用户ID' ,
  `content` VARCHAR(45) NOT NULL COMMENT '心情内容' ,
  `created_at` DATETIME NOT NULL COMMENT '创建时间' ,
  `u_name` VARCHAR(45) NOT NULL COMMENT '用户昵称' ,
  `comment_count` INT(10) NOT NULL DEFAULT 0 COMMENT '评论数' ,
  PRIMARY KEY (`id`) )
 ENGINE = MyISAM 
 DEFAULT CHARACTER SET = utf8 
 COMMENT = '一句话心情'; 

