CREATE TABLE `lawsive`.`member_job_history` (
  `id` INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` INTEGER(11) UNSIGNED COMMENT '用户接口表索引id',
  `company` VARCHAR(128)  COMMENT '公司',
  `title` VARCHAR(255)  COMMENT '职务',
  `start_date` VARCHAR(50)  COMMENT '开始时间',
  `end_date` VARCHAR(50)  COMMENT '结束时间',
  `description` VARCHAR(512)  COMMENT '描述',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM
 COMMENT = '用户工作经历';

