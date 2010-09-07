EDIT `lawsive`.`friend` if exists;CREATE  TABLE `lawsive`.`friend` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `u_id` INT NOT NULL ,
  `f_id` INT NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `f_name` VARCHAR(45) NOT NULL ,
  `f_login_name` VARCHAR(45) NOT NULL ,
  `f_avatar` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `u_id` (`u_id` ASC, `f_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = ucs2
COMMENT = '好友';

