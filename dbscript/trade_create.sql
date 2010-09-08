CREATE TABLE `lawsive`.`trade` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `created_at` datetime  NOT NULL COMMENT '记录创建日期',
  `trade_at` datetime  NOT NULL COMMENT '交易日期',
  `client` varchar(500)  NOT NULL COMMENT '客户',
  `trade_value` int  NOT NULL COMMENT '交易金额',
  `trade_area` varchar(256)  COMMENT '适用的法律区域',
  `trade_type` varchar(100)  NOT NULL COMMENT '交易类型',
  `description1` text  COMMENT '交易概述1（从客户角度）',
  `description2` text  COMMENT '交易概述2（从律师角度）',
  `description3` text  COMMENT '交易概述3（从第三方/其他角度）',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM;
