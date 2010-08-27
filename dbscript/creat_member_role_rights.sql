CREATE TABLE `lawsive`.`member_role_rights` (
  `member_role_id` INTEGER(11)  NOT NULL,
  `member_right_id` VARCHAR(50)  NOT NULL,
  `description` VARCHAR(128) ,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM
 COMMENT = '用户角色权限关联表';

