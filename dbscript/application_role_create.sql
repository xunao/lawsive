CREATE TABLE  `lawsive`.`application_role` (
  `role` int(11) NOT NULL COMMENT '用户类型1合伙人2青年律师3法务官4教授5法官/检察官6读者7法务院学生8律师事务所9公司法务部10律师',
  `application_id` int(11) NOT NULL COMMENT '应用id',
  `is_default` int(11) NOT NULL DEFAULT '0' COMMENT '是否默认显示 0为不显示，1为显示',
  `is_free` int(11) NOT NULL DEFAULT '1' COMMENT '是否免费插件（即是否需要后台审批通过）1为免费，0为付费',
  KEY `new_index` (`role`)
)DEFAULT CHARSET=utf8 COMMENT='应用和用户角色关联表'
