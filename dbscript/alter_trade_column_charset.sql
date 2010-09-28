ALTER TABLE `lawsive`.`trade` MODIFY COLUMN `trade_area` VARCHAR(256)  CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '适用的法律区域',
 MODIFY COLUMN `trade_type` VARCHAR(100)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '交易类型',
 MODIFY COLUMN `description1` TEXT  CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '交易概述1（从客户角度）',
 MODIFY COLUMN `description2` TEXT  CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '交易概述2（从律师角度）',
 MODIFY COLUMN `description3` TEXT  CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '交易概述3（从第三方/其他角度）';
