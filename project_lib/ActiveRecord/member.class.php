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
	
	static function register($login_name,$name,$password,$email,$level,$role){
		if(mb_strlen($login_name)>48){return -3;}
		elseif(mb_strlen($login_name)<6){return -4;}
			else{
				if(member::find(array('conditions' => "login_name='$login_name'"))){return -1;}
			}
		
		if(mb_strlen($name)>50){return -6;}
		
		if(mb_strlen($password)>50){return -8;}
		if(mb_strlen($password)<6){return -7;}
		
		if(intval($level)>4){return -10;}
		
		if(intval($role)>10){return -11;}
		
		if(mb_strlen($email)>256){return -9;}
		if(!ereg("^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+\.[a-zA-Z_.]+$",$email)){return -5;}
		if(member::find(array('conditions' => "email='$email'"))){return -2;}
		
		$password = md5($password);
		$db = get_db();
		$sql = $db->execute("insert into member (login_name,name,password,email,member_level,role,created_at)value('$login_name','$name','$password','$email','$level','$role',now())");
		if($sql){
			return 1;
			}else{
				return -15;
				}
	}
											
	static function login($login_name, $password, $expire){
	    if(mb_strlen($login_name)>48 or mb_strlen($login_name)<6){return null;}
	    if(mb_strlen($password)>50 or mb_strlen($password)<6){return null;}
		$s_expire=$expire*86400;
		$md5_password=md5($password);
		$record=member::find(array('conditions' => "password='$md5_password' and login_name='$login_name'"));
		if(count($record)==1){
			$cache_name=rand_str(20);
			@setcookie("cache_name",$cache_name,time(),'/');
			$db = get_db();
			$db->execute("update lawsive.member set cache_name='{$cache_name}' where id='{$record->id}'");
			if ($s_expire!=0){
				@setcookie("login_name",$login_name,time()+$s_expire,'/');
				@setcookie("password",$password,time()+$s_expire,'/');
			}
			return $record;
			
		    }else{
				return NULL;
			}	
	    }
	
	//just test
	static function delete($member_id,$member_name){
		$db = get_db();
		$sql=$db->query("select * from lawsive.member where id='{$member_id}' and login_name='{$member_name}'");
		if($sql){
			$db->execute("delete lawsive.member  where id='{$member_id} '");
			return true;
		}else return false;
		
	}
	
	
	//just test
	static function current(){
		$cache_name=$_COOKIE(cache_name);
	    $record=member::find(array('conditions' => "cache_name='$cache_name'"));
		if(count($record)==1){
			return $record;
		}else{
			return NULL;
			}
	}
	
	//just test
	function logout(){
		@setcookie("cache_name",null,0,'/');
	}
	
	}
?>
