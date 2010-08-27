CREATE TABLE `lawsive`.`member` (
  `id` INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login_name` VARCHAR(48)  COMMENT '登录名',
  `password` VARCHAR(50)  COMMENT '密码',
  `name` VARCHAR(50)  COMMENT '昵称',
  `email` VARCHAR(256)  COMMENT '邮箱地址',
  `avatar` VARCHAR(256)  COMMENT '头像',
  `role` INTEGER(11)  COMMENT '角色分类',
  `member_level` INTEGER(11)  NOT NULL DEFAULT 1 COMMENT '用户等级',
  `cache_name` CHAR(20)  COMMENT '缓存名',
  `last_login_time` DATETIME  COMMENT '最后登录时间',
  `created_at` DATETIME  NOT NULL COMMENT '创建时间',
  `base_info_id` INTEGER(11) UNSIGNED COMMENT '用户基础信息表索引id',
  `member_resume_id` INTEGER(11) UNSIGNED COMMENT '个人简历索引id',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM;
COMMENT = '用户接口表';
