<?php
class AdminUser extends ActiveRecord {
	static $s_primary_key = "id";
	static $s_database = '';
	static $s_fields_info;
	static $s_table_name = 'admin_user';
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
	
	static function login($name,$password,$md5=true){
		$db = get_db();
		if($md5){
			$password = md5($password);
		}
		$user = self::find(array('conditions' => "name='$name' and password='$password'",'limit' => 1));
		if(!$user) return false;
		$_SESSION["s_admin_user_id"] = $user->id;	
		return $user;
	}
	
	static function current_user(){
		global $_g_current_admin_user;
		if(is_object($_g_current_admin_user)) return $_g_current_admin_user;
		$user_id = intval($_SESSION['s_admin_user_id']);
		if(!$user_id) return false;
		$_g_current_admin_user = self::find($user_id);
		return $_g_current_admin_user;
	}
	
	function get_admin_menu(){
		$db = get_db();
		$db->query("select id from role where name='{$this->role_name}'");
		if($db->record_count <= 0) return null;
		$role_id = $db->field_by_name('id');
		$menu_ids = $db->query("select name from rights where id in (select rights_id from role_rights where role_id={$role_id}) and type=2");

		$menu_ids || $menu_ids = array();
		foreach ($menu_ids as $menu){
			$result[] = $menu->name;
		}
		return $result;
	}
}