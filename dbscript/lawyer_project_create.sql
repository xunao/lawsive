CREATE TABLE `lawsive`.`lawyer_project` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `name` varchar(500)  NOT NULL COMMENT '项目名称',
  `project_type` varchar(256)  NOT NULL COMMENT '项目性质',
  `value` varchar(30)  NOT NULL COMMENT '项目金额',
  `client` varchar(500)  NOT NULL COMMENT '客户',
  `result` varchar(1000)  NOT NULL COMMENT '项目结果',
  `income` varchar(20)  NOT NULL COMMENT '客户收益',
  `project_period` varchar(20)  NOT NULL COMMENT '项目周期',
  `comment` text  COMMENT '客户评价',
  `law_in` varchar(256)  NOT NULL COMMENT '使用哪国法律，中间使用/分割',
  PRIMARY KEY (`id`)
)
COMMENT = '律师项目';
