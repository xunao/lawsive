ALTER TABLE `lawsive`.`trade` ADD COLUMN `trade_role` VARCHAR(200)  NOT NULL COMMENT '交易角色' AFTER `description3`,
 ADD COLUMN `trade_name` VARCHAR(255)  NOT NULL COMMENT '交易名称' AFTER `trade_role`;
