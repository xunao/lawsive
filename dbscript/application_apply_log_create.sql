CREATE TABLE `lawsive`.`application_apply_log` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `application_id` int  NOT NULL COMMENT '应用id
',
  `application_name` varchar(50)  NOT NULL COMMENT '应用名称',
  `member_id` int  NOT NULL COMMENT '申请用户id',
  `apply_date` datetime  NOT NULL COMMENT '申请日期',
  `admin_id` int  COMMENT '审批者id（即后台操作用户id）',
  `admin_date` datetime  COMMENT '后台审批时间',
  `status` int  NOT NULL DEFAULT 0 COMMENT '申请状态 0未审批，1已审批',
  PRIMARY KEY (`id`),
  INDEX `new_index`(`apply_date`),
  INDEX `new_index1`(`status`)
)COMMENT = '用户申请付费应用日志' DEFAULT CHARSET=utf8;

