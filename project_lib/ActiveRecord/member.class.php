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
										
	
	static function login($login_name, $password, $expire){
		$s_expire=$expire*86400;
		$md5_password=md5($password);
		$record=$db->query("select * from lawsive.member where password='{$md5_password}' and login_name='{$login_name}'");
		if(count($record)==1){
			$cache_name=rand_str(20);
			@setcookie("cache_name",$cache_name,time(),'/');
			if ($s_expire!=0){
				@setcookie("login_name",$login_name,time()+$s_expire,'/');
				@setcookie("password",$password,time()+$s_expire,'/');
			}
			return member::find(array('conditions' => "login_name='$login_name'"));
			
		}else{
			return NULL;
		}	
	}
	
	//just test
	static function delete($param){
		$db = get_db();
		if(is_numeric($param)){
			return $db->execute("delete from member where id=$param");
		}elseif(is_string($param)){
			return $db->execute("delete from member where login_name='$param'");
		}else {
			return false;
		}
		
	}
	
	
	//just test
	static function current(){
		$cache_name=$_COOKIE(cache_name);
		$record=$db->query("select * from lawsive.member where cache_name='{$cache_name}'");
		if(count($record)==1){
			return member::find(array('conditions' => "cache_name='$cache_name'"));
		}else{
			return NULL;
			}
	}
	
	//just test
	function logout(){
		$db->execute("update lawsive.member set cache_name=null where id='{$user->id}' ");
		@setcookie("cache_name",null,0,'/');
	}
	
	}
	?>