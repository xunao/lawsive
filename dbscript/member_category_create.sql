CREATE TABLE `lawsive`.`member_category` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `resource_type` varchar(50)  NOT NULL COMMENT '分类名称，如 diary表示日志分类',
  `member_id` int  NOT NULL,
  `name` varchar(50)  NOT NULL COMMENT '分类名称，不能超过50个字符',
  `created_at` datetime  NOT NULL,
  PRIMARY KEY (`id`)
)COMMENT = 'sns用户自定义分类表' DEFAULT CHARSET=utf8;
