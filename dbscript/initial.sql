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
DROP TABLE IF EXISTS `admin_log`;
CREATE TABLE  `admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `log` text,
  `ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COMMENT='用户登录日志';
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (1,'内容管理','#',0,'内容管理',1,'#',1);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (2,'系统管理','#',0,'系统管理',2,'#',1);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (3,'类别管理','#',0,'类别管理',3,'#',1);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (4,'页面管理','#',0,'页面管理',4,'#',1);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (5,'新闻管理','/admin/news/',1,'新闻管理',1,'admin_iframe',0);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (6,'图片管理','/admin/image/',1,'新闻管理',2,'admin_iframe',0);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (7,'视频管理','/admin/video/',1,'视频管理',3,'admin_iframe',0);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (8,'新闻类别管理','/admin/category/?type=news',3,'新闻类别管理',1,'admin_iframe',0);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (9,'图片类别管理','/admin/category/?type=image',3,'图片类别管理',1,'admin_iframe',0);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (10,'视频类别管理','/admin/category/?type=video',3,'视频类别管理',1,'admin_iframe',0);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (11,'菜单管理','/admin/menu/',2,'菜单管理',1,'admin_iframe',0);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (12,'角色管理','/admin/role/',2,'角色管理',2,'admin_iframe',0);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (13,'后台用户管理','/admin/admin_user/',2,'后台用户管理',2,'admin_iframe',0);
insert into admin_menu (id,name,href,parent_id,description,priority,target,is_root) values (14,'数据库同步','/admin/dbadmin/',2,'数据库同步',2,'admin_iframe',0);
insert into role(id,name,comment,nick_name) values (1,'member','普通会员','普通会员');
insert into role(id,name,comment,nick_name) values (2,'admin','管理员','管理员');
insert into role(id,name,comment,nick_name) values (3,'sys_admin','超级管理员','超级管理员');
insert into rights(id,name,type,nick_name) values (1,'5',2,'新闻管理');
insert into rights(id,name,type,nick_name) values (2,'6',2,'图片管理');
insert into rights(id,name,type,nick_name) values (3,'7',2,'视频管理');
insert into rights(id,name,type,nick_name) values (4,'8',2,'新闻类别管理');
insert into rights(id,name,type,nick_name) values (5,'9',2,'图片类别管理');
insert into rights(id,name,type,nick_name) values (6,'10',2,'视频类别管理');
insert into rights(id,name,type,nick_name) values (7,'11',2,'菜单管理');
insert into rights(id,name,type,nick_name) values (8,'12',2,'角色管理');
insert into rights(id,name,type,nick_name) values (9,'13',2,'后台用户管理');
insert into rights(id,name,type,nick_name) values (10,'14',2,'数据库同步');
insert into role_rights(role_id,rights_id) values (1,1);
insert into role_rights(role_id,rights_id) values (1,2);
insert into role_rights(role_id,rights_id) values (1,3);
insert into role_rights(role_id,rights_id) values (1,4);
insert into role_rights(role_id,rights_id) values (1,5);
insert into role_rights(role_id,rights_id) values (1,6);
insert into role_rights(role_id,rights_id) values (2,1);
insert into role_rights(role_id,rights_id) values (2,2);
insert into role_rights(role_id,rights_id) values (2,3);
insert into role_rights(role_id,rights_id) values (2,4);
insert into role_rights(role_id,rights_id) values (2,5);
insert into role_rights(role_id,rights_id) values (2,6);
insert into role_rights(role_id,rights_id) values (2,7);
insert into role_rights(role_id,rights_id) values (2,9);
insert into role_rights(role_id,rights_id) values (2,10);
insert into role_rights(role_id,rights_id) values (3,1);
insert into role_rights(role_id,rights_id) values (3,2);
insert into role_rights(role_id,rights_id) values (3,3);
insert into role_rights(role_id,rights_id) values (3,4);
insert into role_rights(role_id,rights_id) values (3,5);
insert into role_rights(role_id,rights_id) values (3,6);
insert into role_rights(role_id,rights_id) values (3,7);
insert into role_rights(role_id,rights_id) values (3,8);
insert into role_rights(role_id,rights_id) values (3,9);
insert into role_rights(role_id,rights_id) values (3,10);
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL COMMENT '新闻类别ID',
  `priority` int(11) DEFAULT '100' COMMENT '优先级',
  `click_count` int(11) DEFAULT '0' COMMENT '点击次数',
  `is_adopt` int(11) DEFAULT '0' COMMENT '是否发布',
  `forbbide_copy` int(11) DEFAULT NULL COMMENT '禁止复制',
  `tags` varchar(255) DEFAULT NULL COMMENT '标签',
  `title` text COMMENT '标题',
  `short_title` text COMMENT '短标题',
  `description` text COMMENT '简介',
  `content` text COMMENT '内容',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `last_edited_at` datetime DEFAULT NULL COMMENT '最后编辑时间',
  `admin_user_id` int(11) DEFAULT NULL COMMENT '发布者',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `news_type` varchar(255) DEFAULT '1' COMMENT '新闻类型',
  `file_name` varchar(255) DEFAULT NULL COMMENT '文件新闻的文件名',
  `target_url` varchar(255) DEFAULT NULL COMMENT '链接新闻的链接地址',
  `photo_src` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `video_photo_src` varchar(255) DEFAULT NULL COMMENT '视频图片地址',
  `image_flag` int(10) unsigned DEFAULT '0' COMMENT '是否是图片新闻',
  `video_flag` int(10) unsigned DEFAULT '0' COMMENT '是否是视频新闻',
  `video_src` varchar(255) DEFAULT NULL COMMENT '视频地址',
  `author` varchar(255) DEFAULT NULL COMMENT '作者',
  `related_news` varchar(100) DEFAULT NULL COMMENT '相关新闻ID，记录相关新闻的id，使用，分割',
  `sub_headline` varchar(100) DEFAULT NULL COMMENT '子头条',
  `recommand` int(10) unsigned DEFAULT '0' COMMENT '是否置顶',
  `copy_from` int(11) DEFAULT '0' COMMENT '复制新闻ID',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`created_at`),
  KEY `Index_3` (`category_id`,`is_adopt`),
  KEY `Index_6` (`is_adopt`),
  KEY `Index_5` (`admin_user_id`)
) DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_type` varchar(255) DEFAULT NULL COMMENT '类别类型',
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `description` varchar(255) DEFAULT NULL COMMENT '简介',
  `parent_id` int(10) DEFAULT 0 COMMENT '父类别',
  `priority` int(10) unsigned DEFAULT '100' COMMENT '优先级',
  `sort_id` int(11) NOT NULL DEFAULT '0' COMMENT '归类ID',
  `level` int(10) unsigned DEFAULT NULL COMMENT '级别',
  `image` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index_2` (`name`)
) DEFAULT CHARSET=utf8;
