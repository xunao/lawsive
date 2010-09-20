ALTER TABLE `lawsive`.`message` MODIFY COLUMN `status` INTEGER  NOT NULL DEFAULT 1 COMMENT '短信状态 1：未读短信，2：已读短信，其他暂时未定义',
 ADD COLUMN `sender_delete` int  NOT NULL DEFAULT 0 COMMENT '发送者是否已删除，1为已删除' AFTER `content`,
 ADD COLUMN `receiver_delete` int  NOT NULL DEFAULT 0 COMMENT '接收者是否已删除，1为已删除' AFTER `sender_delete`;
