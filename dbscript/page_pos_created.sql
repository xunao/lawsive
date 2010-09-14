CREATE TABLE  `lawsive`.`page_pos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `description` text,
  `href` varchar(256) DEFAULT NULL,
  `static_href` varchar(256) DEFAULT NULL,
  `image1` varchar(256) DEFAULT NULL,
  `image2` varchar(256) DEFAULT NULL,
  `reserve1` varchar(1000) DEFAULT NULL,
  `reserve2` text,
  PRIMARY KEY (`id`),
  KEY `new_index` (`page`)
) DEFAULT CHARSET=utf8 COMMENT='页面位置管理'
