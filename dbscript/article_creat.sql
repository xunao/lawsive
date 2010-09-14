CREATE TABLE `lawsive`.`article` (
 `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
 `resource_type` VARCHAR(30)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章类型',
 `is_adopt` INTEGER  NOT NULL DEFAULT 0 COMMENT '是否发布',
 `admin_user_id` VARCHAR(60)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '发布者',
 `category` VARCHAR(60)  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '文章子分类',
 `priority` INTEGER  NOT NULL DEFAULT 100 COMMENT '优先级',
 `title` VARCHAR(120)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章标题',
 `description` TEXT  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章描述',
 `content` TEXT  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容',
 `created_at` DATETIME  NOT NULL COMMENT '发布时间',
 `last_edit_at` DATETIME  COMMENT '最后修改时间',
 `keywords` VARCHAR(250)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '关键词',
 `file_name` VARCHAR(250)  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '下载文档名',
 `photo_src` VARCHAR(250)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图片地址',
 `file_src` VARCHAR(250)  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '下载文档地址',
 `research_src` VARCHAR(250)  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '引用其他新闻的地址',
 `author` VARCHAR(120)  CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '作者',
 `recommand` INTEGER  NOT NULL DEFAULT 0 COMMENT '是否发布',
 `reserve` VARCHAR(0)  CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '保留字段',
 PRIMARY KEY (`id`)
)
 ENGINE = MyISAM
 CHARACTER SET utf8 COLLATE utf8_general_ci
 COMMENT = '非新闻类文章';
