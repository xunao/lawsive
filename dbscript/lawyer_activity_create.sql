CREATE TABLE `lawsive`.`lawyer_activity` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `member_id` int  NOT NULL COMMENT '律师id',
  `name` varchar(300)  NOT NULL COMMENT '活动名称',
  `activity_type` varchar(256)  NOT NULL COMMENT '活动性质',
  `activity_date` DATE  NOT NULL COMMENT '活动日期',
  `role` varchar(500)  NOT NULL COMMENT '角色',
  `sponsor` varchar(300)  NOT NULL COMMENT '主办方',
  `description` text  COMMENT '活动概述',
  `comment` text  COMMENT '备注',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM COMMENT = '律师社会活动' DEFAULT CHARSET=utf8;
