CREATE TABLE `lawsive`.`member_appliaction` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `member_id` int  NOT NULL COMMENT '用户的id',
  `name` varchar(100)  NOT NULL COMMENT '应用名称',
  `application_id` int  NOT NULL COMMENT '应用的id',
  `url` varchar(256)  NOT NULL COMMENT '应用链接地址',
  `created_at` datetime  NOT NULL,
  `status` int  NOT NULL DEFAULT 0 COMMENT '开通状态，0：未开通，1：已开通并在使用，2：用户已开通，但不在显示列表',
  PRIMARY KEY (`id`),
  INDEX `new_index`(`member_id`)
) COMMENT = '用户加载的应用' DEFAULT CHARSET=utf8;
