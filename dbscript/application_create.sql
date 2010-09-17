CREATE TABLE `lawsive`.`application` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `name` varchar(100)  NOT NULL,
  `description` text  COMMENT '描述',
  `role` varchar(20)  NOT NULL DEFAULT 0 COMMENT '何种用户等级的用户可以添加该应用，0为所有用户。多种用户可以使用时，使用逗号分割',
  PRIMARY KEY (`id`)
)COMMENT = 'sns应用' DEFAULT CHARSET=utf8;
