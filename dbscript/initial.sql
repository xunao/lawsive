DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `nick_name` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role_name` varchar(255) DEFAULT 'member',
  `role_level` int(10) unsigned DEFAULT '0',
  `image_src` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `Index_2` (`name`,`password`)
)CHARSET=utf8;
insert into admin_user (name,nick_name,password,role_name,image_src) values ('admin','超级管理员','b4b529fa33de4048ca016cd66995e2e2','sys_admin',NULL);
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE  `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `description` text,
  `priority` int(10) unsigned DEFAULT '100',
  `target` varchar(255) DEFAULT NULL,
  `is_root` tinyint(1) NOT NULL DEFAULT '0',
  `role_level` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`parent_id`)
)DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `rights`;
CREATE TABLE  `rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '权限类型1：系统权限2：后台菜单权限',
  `nick_name` varchar(255) DEFAULT NULL COMMENT '昵称',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `role`;
CREATE TABLE  `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comment` text COMMENT '备注',
  `nick_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `new_index` (`name`)
)DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `role_rights`;
CREATE TABLE `role_rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `rights_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;