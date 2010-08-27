CREATE TABLE `lawsive`.`member` (
  `id` INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login_name` VARCHAR(48)  COMMENT '登录名',
  `password` VARCHAR(50)  COMMENT '密码',
  `name` VARCHAR(50)  COMMENT '昵称',
  `email` VARCHAR(256)  COMMENT '邮箱地址',
  `avatar` VARCHAR(256)  COMMENT '头像',
  `role` INTEGER(11)  COMMENT '用户类型：合伙人,青年律师，法务官，教授，法官/检察官，读者，法务院学生，律师事务所，公司法务部',
  `member_level` INTEGER(11)  NOT NULL DEFAULT 1 COMMENT '会员等级 {1:普通会员，2：二级会员，3：三级会员，4：四级会员}',
  `cache_name` CHAR(20)  COMMENT '登录后的标示',
  `last_login_time` DATETIME  COMMENT '最后登录时间',
  `created_at` DATETIME  NOT NULL COMMENT '创建时间',
  `base_info_id` INTEGER(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户基础信息表索引id，默认为0，即还未填写基本信息',
  `member_resume_id` INTEGER(11) UNSIGNED COMMENT '个人简历索引id',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM;
 COMMENT = '用户接口表';
