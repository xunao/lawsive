CREATE TABLE `lawsive`.`member_trade` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `u_id` int  NOT NULL COMMENT '律所或者律所的id',
  `u_type` varchar(256)  NOT NULL COMMENT '类型: lawyer  office',
  `trade_id` int  NOT NULL COMMENT '交易id',
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM;
