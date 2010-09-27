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
	
	private $_base_info = null;
	
	static function register($login_name,$name,$password,$email,$level,$role,$avatar){
		if(mb_strlen($login_name)>128){return -3;}
			else{
				if(member::find(array('conditions' => "login_name='$login_name'"))){return -1;}
			}
		if(mb_strlen($login_name)<6){return -4;}
		if(!ereg("^[_.a-zA-Z0-9-]+@[a-zA-Z0-9-]+\.[a-zA-Z_.]+$",$login_name)){return -5;}
		
		if(mb_strlen($name)>50){return -6;}
		
		if(mb_strlen($password)>50){return -8;}
		if(mb_strlen($password)<6){return -7;}
		
		if(intval($level)>4){return -10;}
		
		if(intval($role)>10){return -11;}
		
		if(mb_strlen($email)>128){return -9;}
		if(!ereg("^[_.a-zA-Z0-9-]+@[a-zA-Z0-9-]+\.[a-zA-Z_.]+$",$email)){return -5;}
		
		if(member::find(array('conditions' => "email='$email'"))){return -2;}
		if(member::find(array('conditions' => "login_name='$login_name'"))){return -1;}
		if($level == null){$level = '1';}
		
		$db = get_db();
		$password = md5($password);
		$sql = $db->execute("insert into lawsive.member (login_name,name,password,email,member_level,role,created_at,avatar)value('$login_name','$name','$password','$email','$level','$role',now(),'$avatar')");
		if($sql){
			return 1;
			}else{
				return -15;
				}
	}
	
	static function login($login_name, $password, $expire){
	    if(mb_strlen($login_name)>128 or mb_strlen($login_name)<6){return null;}
	    if(mb_strlen($password)>50 or mb_strlen($password)<6){return null;}
		$s_expire=$expire*86400;
		$md5_password=md5($password);
		$record=member::find(array('conditions' => "password='$md5_password' and login_name='$login_name'"));
		if(count($record)==1){
			$cache_name=rand_str(20);
			@setcookie("cache_name",$cache_name,0,'/');
			$db = get_db();
			$db->execute("update lawsive.member set cache_name='{$cache_name}',last_login_time=now() where id='{$record[0]->id}'");
			if ($s_expire!=0){
				$s_expire = time() + $s_expire;
			}else{
				$s_expire = 0;
			}
			@setcookie("email",$login_name,$s_expire,'/');
			@setcookie("password",$password,$s_expire,'/');
			return $record[0];
			
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
		global $_g_current_member;
		if(is_object($_g_current_member)) return $_g_current_member;
		$cache_name = $_COOKIE[cache_name];
	    $record=member::find(array('conditions' => "cache_name='$cache_name'"));
		if(count($record)==1){
			$_g_current_member = $record[0];
		}else{
			$_g_current_member = null;
		}
		return $_g_current_member;
	}
	
	//just test
	function logout($u_id){
		$db = get_db();
		$db->execute("update lawsive.member set last_login_time=now() where id ='{$u_id}'");
		@setcookie("cache_name",null,0,'/');
	}
	
	//$byid=1 $param传入为用户id，否则，传入用户名
	function add_friend($param,$byid){
		$db = get_db();
		if ($byid==1) {
			$record=member::find(array('conditions' => "id='{$param}'"));
		}else{
			$record=member::find(array('conditions' => "name='{$param}'"));	
		}
		if(count($record)==1){
		$db->execute("insert into lawsive.friend (u_id,f_id,created_at,f_name,f_login_name)values('{$this->id}','{$record[0]->id}',now(),'{$record[0]->name}','{$record[0]->login_name}')");
		return true;
		}else{return false;}
	}
	
	//$byid=1 $param传入为用户id，否则，传入用户名
	function delete_friend($param,$byid){
		$db = get_db();
		if ($byid==1) {
			  $db->execute("delete from lawsive.friend  where f_id='{$param}' and u_id='{$this->id}'");
			  return true;
		}else{
			$db->execute("delete from lawsive.friend  where f_name='{$param}' and u_id='{$this->id}'");
			return true;
		}
	}
	
	//如果不传入参数，返回所有好友，也可按用户id和用户login_name或者name获得
	/*
	 * 如果参数为空，则获得用户所有好友
	 * 可接收1个参数，当该参数为整数时，按好友id查询
	 * 当参数为数组时，需指定查找字段和匹配的值，此时，改参数必须为一个数组
	 * $user->get_friends(array('name'=>'sauger'));
	 */
	function get_friends(){
		$func_num=func_num_args();
		$sql = "select * from lawsive.friend";
		$conditions = array('u_id='. $this->id);
		if($func_num >= 0){
			$fun_value=func_get_arg(0);
			if(is_numeric($fun_value)){
				$conditions[] = 'f_id=' .$fun_value;
			}elseif (is_array($fun_value)){
				foreach ($fun_value as $key => $val){
					if(in_array($key, array('name','login_name'))){
						$conditions[] = "$key='$val'";
					}
				}
			}
		}
		$sql .= ' where ' . join(' and ', $conditions);
		$db = get_db();
		return $db->query($sql);		
	}
	function get_message($u_id,$status){
		if($status !='-1'){
		$sql = "select * from lawsive.message where status ='{$status}' id = '{$u_id}'";
		}else{
		$sql = "select * from lawsive.message where id = '{$u_id}'";
		}
		return count($sql);
	}
	function send_message($u_id,$msg,$r_id){
		$sender = member::find(array('conditions' => "id='$u_id'"));
		$receiver = member::find(array('conditions' => "id='$r_id'"));
		$sql = "insert into lawsive.message (sender_id,sender_name,receiver_id,receiver_name,status,content,created_at)values('{$sender_id}','{$sender[0]->name}','1',{$r_id}','{$receiver[0]->name}','{$msg}',now())";
		if($sql){return true;}else{return false;}
	}
	
	function get_apps(){
		$db = get_db();
		//get the system default applications
		$apps = $db->query("select b.* from application_role a left join application b on a.application_id = b.id where a.is_default=1 and (role =0 or role={$this->role})");
		!$apps && $apps = array();
		//get the user applications
		$user_apps = $db->query("select b.* from member_application a left join application b on a.application_id = b.id where a.member_id={$this->id} and a.status = 1");
		!$user_apps && $user_apps = array();
		$apps = array_merge($apps,$user_apps);
		return $apps;
	}
	
	function get_base_info(){
		if($this->_base_info) return $this->_base_info;
		$this->_base_info = new Table('member_base_info');
		$this->_base_info->find($this->base_info_id);
		return $this->_base_info;
		
	}
	
	function role_name(){
		switch ($this->role) {
			case 1:
				return "合伙人";
				break;
			case 2:
				return "青年律师";
				break;			
			case 3:
				return "法务官";
				break;
			case 4:
				return "教授";
				break;
			case 5:
				return "法官/检察官";
				break;
			case 6:
				return "读者";
				break;
			case 7:
				return "法务院学生";
				break;
			case 8:
				return "律师事务所";
				break;
			case 9:
				return "公司法务部";
				break;
			case 10:
				return "律师";
				break;
			default:
				;
			break;
		}
	}
	
	function head_info_path(){
		$url = ROOT_DIR ."/home/head_info/_". $this->role .".php";
		if(file_exists($url)){
			return $url;
		}else{
			return ROOT_DIR . "/home/head_info/_default.php";
		}
	}
	
	function user_quick_link(){
		$return  = array("修改头像"=>"/home/avatar/","详细资料"=>"/home/info.php");
		switch ($this->role) {
			case 1:
				//return "合伙人";
				break;
			case 2:
				//return "青年律师";
				break;			
			case 3:
				//return "法务官";
				break;
			case 4:
				//return "教授";
				break;
			case 5:
				//return "法官/检察官";
				break;
			case 6:
				//return "读者";
				break;
			case 7:
				//return "法务院学生";
				break;
			case 8:
				//return "律师事务所";
				break;
			case 9:
				//return "公司法务部";
				break;
			case 10:
				//return "律师";
				$return['个人简历'] = '/home/resume/';
				break;
			default:
				;
			break;
		}
		return $return;
	}
	
	function get_friend_news($type='all',$limit=20){
		$db = get_db();
		if($type == 'all'){
			$sql = "select * from friend_news where member_id in (select f_id from friend where u_id={$this->id}) order by created_at desc limit $limit";
		}else{
			$sql = "select * from friend_news where resource_type='$type' and member_id in (select f_id from friend where u_id={$this->id}) order by created_at desc limit $limit";
		}
		$items = $db->query($sql);
		$news = FriendNews::load($items);
		!$news && $news = array();
		$len = count($news);
		if($len < $limit){
			$limit = $limit - $len;
			if($type == 'all'){
				$sql = "select * from friend_news where member_id != {$this->id} and member_id not in (select f_id from friend where u_id={$this->id}) order by created_at desc limit $limit";
			}
			else{
				$sql = "select * from friend_news where resource_type='$type' and member_id != {$this->id} and member_id not in (select f_id from friend where u_id={$this->id}) order by created_at desc limit $limit";
			}
			$items = $db->query($sql);
			$news1 = FriendNews::load($items);
			!$news1 && $news1 = array();
			$news = array_merge($news,$news1);
		}
		return $news;
		
	}
	
}
