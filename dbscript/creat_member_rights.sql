CREATE TABLE `lawsive`.`member_rights` (
  `id` INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64)  COMMENT '权限名称',
  `description` VARCHAR(128)  COMMENT '描述',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM
COMMENT = '用户权限表';

