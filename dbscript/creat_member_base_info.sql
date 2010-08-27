CREATE TABLE `lawsive`.`member_base_info` (
  `id` INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` INTEGER(11) UNSIGNED COMMENT '用户接口表索引id',
  `name` VARCHAR(60)  COMMENT '用户姓名',
  `first_name` VARCHAR(20)  COMMENT '姓',
  `middle_name` VARCHAR(20) ,
  `last_name` VARCHAR(20) ,
  `office` VARCHAR(128)  COMMENT '所在律师事务所',
  `title` VARCHAR(255)  COMMENT '职务',
  `gender` VARCHAR(10)  COMMENT '性别',
  `birthday` DATETIME  COMMENT '生日',
  `nationality` VARCHAR(50)  COMMENT '国籍',
  `comment` TEXT  COMMENT '备注',
  `address` VARCHAR(128)  COMMENT '公司地址1',
  `phone` VARCHAR(50)  COMMENT '联系电话1',
  `email` VARCHAR(128)  COMMENT '电子邮箱',
  `fax` VARCHAR(50)  COMMENT '传真1',
  `zip` VARCHAR(50)  COMMENT '邮编1',
  `address2` VARCHAR(128)  COMMENT '公司地址2',
  `phone2` VARCHAR(50)  COMMENT '联系电话2',
  `email2` VARCHAR(128)  COMMENT '电子邮箱2',
  `fax2` VARCHAR(50)  COMMENT '传真2',
  `zip2` VARCHAR(50)  COMMENT '邮编2',
  `mobile` VARCHAR(20)  COMMENT '移动电话1',
  `mobile2` VARCHAR(20)  COMMENT '移动电话2',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM
 COMMENT = '用户基础信息表';

