<?php 
	class member extends ActiveRecord {
	static $s_primary_key = "id";
	static $s_database = '';
	static $s_fields_info;
	static $s_table_name = '';
	static $s_belongs_to = array();
	/*
	 * static $s_has_many = array(
								"friends" => array('class_name' => 'friend' , "bind_field" => "u_id")//friends 访问的名称，class_name关联的class，bind_field关联的字段
							);
	 */
	static $s_has_many = array();
	/*
	 * 虚拟字段，用于跨表查询，定义格式如下
	 * static $s_virtual_fields = array(
											array(
												"table"=>"eb_category", //目标表名，必填
												"from_field" => "category_id",//自身表用于关联的字段，选填，如果不定义，则为 table_id
												"to_field" =>"id",//目标表关联字段，选填，不定义则默认为"id"
												"fields"=>array(  //需要关联的字段信息
																array("name"=>"name", //需要选择的字段 必填
																	  "alias" => "category_name"//别名,即读取时的名字.选填,默认为上面的name.
																	  )
														       )
												)
										);
	 */
	static $s_virtual_fields = array();
										
	}