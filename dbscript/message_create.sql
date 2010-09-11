CREATE TABLE `lawsive`.`message` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `sender_id` int  NOT NULL COMMENT '发送者id，系统消息则为0',
  `sender_name` varchar(256)  NOT NULL COMMENT '发送者名称，系统消息则显示“系统消息“',
  `receiver_id` int  NOT NULL COMMENT '接收短信用户ID',
  `receiver_name` varchar(256)  NOT NULL COMMENT '接收短信的名称',
  `status` int  NOT NULL DEFAULT 0 COMMENT '短信状态 1：未读短信，2：已读短信，其他暂时未定义',
  `created_at` datetime  NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`id`)
)
COMMENT = '用户转内短信' DEFAULT CHARSET=utf8 ;

