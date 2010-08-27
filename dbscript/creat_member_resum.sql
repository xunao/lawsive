CREATE TABLE `lawsive`.`member_resume` (
  `id` INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` INTEGER(11) UNSIGNED COMMENT '用户接口表索引id',
  `photo` VARCHAR(128)  COMMENT '照片',
  `company` VARCHAR(128)  COMMENT '所在公司',
  `title` VARCHAR(255)  COMMENT '职务',
  `nationality` VARCHAR(50)  COMMENT '国籍',
  `license` VARCHAR(255)  COMMENT '专业执照',
  `qualification` VARCHAR(255)  COMMENT '相关资质',
  `work_form` DATETIME  COMMENT '首次执业时间',
  `work_years` INTEGER(10)  COMMENT '从业年数',
  `professional_field` VARCHAR(255)  COMMENT '专业领域',
  `vista` VARCHAR(255)  COMMENT '发展目标',
  `languages` VARCHAR(128)  COMMENT '工作语言',
  `profession_overage` VARCHAR(255)  COMMENT '专业领域',
  `introduce` VARCHAR(128)  COMMENT '自我评价',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM
 COMMENT = '个人简历';

