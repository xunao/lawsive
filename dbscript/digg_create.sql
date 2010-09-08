DROP TABLE IF EXISTS `lawsive`.`dig`;
CREATE TABLE  `lawsive`.`dig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_type` VARCHAR(100) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `up` int(11) DEFAULT '0',
  `down` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `new_index` (`resource_type`,`resource_id`)
)  DEFAULT CHARSET=utf8
