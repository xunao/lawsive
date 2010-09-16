ALTER TABLE `lawsive`.`member_base_info` ADD COLUMN `contact` TEXT  COMMENT '联系方式一' AFTER `mobile2`,
 ADD COLUMN `contact2` TEXT  AFTER `contact`;
