CREATE TABLE `lawsive`.`member_role` (
  `id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50)  NOT NULL,
  `description` VARCHAR(128) ,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM
COMMENT = '用户角色表';

