<?php
if(!defined("FRAME_VERSION")) die('invalid request!');
if(substr(PHP_VERSION,0,3) != '5.3')
{
	die("ActiveClass need php version high than 5.3!");
}
class TableField {
	public $name;
	public $type;
	public $short_type;
	public $type_length;
	public $key;
	public $comment;
	public $null;
	public $default;
	public $extra;
}

class ARHasMany{
	private $class_name;
	private $bind_field;
	private $belongs_to;
	public $objs = array();
	private $loaded = false;
	
	public function __construct($class_name,$bind_field,$belongs_to){
		$this->class_name = $class_name;
		$this->bind_field = $bind_field;
		$this->belongs_to = $belongs_to;
	}
	
	public function initialize_objs(){
		$this->objs = $this->find();
		//var_dump($this->objs);
		$this->loaded = true;
	}
	
	public function __call($name,$args){
		$key = $this->belongs_to->primary_key;
		$args[] = array("conditions" => "{$this->bind_field}={$this->belongs_to->$key}");
		return call_user_func_array(array($this->class_name,$name), $args);
	}
	
	public function __get($name){
		if ($name == 'loaded'){
			return $this->loaded;
		}
	}
	
}

class ActiveRecord {
	static $s_primary_key = "id";
	static $s_database = '';
	static $s_fields_info;
	static $s_belongs_to;
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
	
	protected $fields = array(); //表字段
	protected $virtual_fields = array();//用于记录虚拟字段的的值,在构造函数时初始化	
	protected $changed_fields = array();
	protected $_table_name;
	protected $_has_many_objs = array();
	function __construct() {
		if(empty(static::$s_fields_info)){
			$db = get_db();
			$sql = "show full fields from " .$this->table_name;
			
			if ($db->query($sql) === false) {
				return ;
			}
			if (!$db->move_first()) return;
			do {
				$name = $db->field_by_index(0);
				static::$s_fields_info[$name] = new TableField();						
				static::$s_fields_info[$name]->name = $name;
				static::$s_fields_info[$name]->type = $db->field_by_index(1);
				static::$s_fields_info[$name]->short_type = $this->_get_mysql_short_type($db->field_by_index(1));
				static::$s_fields_info[$name]->key = $db->field_by_index(4);
				static::$s_fields_info[$name]->comment = $db->field_by_index(8);
				static::$s_fields_info[$name]->default = $db->field_by_index(5);
				static::$s_fields_info[$name]->null = $db->field_by_index(3);
				static::$s_fields_info[$name]->extra = $db->field_by_index(5);
			}while ($db->move_next());
			$this->_default_values();
		}
		
		foreach (static::$s_fields_info as $key => $val) {
			$this->fields[$key]['value'] = $val->default;
			$this->fields[$key]['changed'] = true;;
		}
		
		//initalize the virtual_fields
		if(static::$s_virtual_fields){
			foreach (static::$s_virtual_fields as $fields){
				foreach ($fields['fields'] as $field){
					$field_name = $field['alias'] ? $field['alias'] : $field['name'];
					$this->virtual_fields[$field_name] = null;
				}
				
			}
		}
		
		//initialize the has many objects
		if(static::$s_has_many){
			foreach (static::$s_has_many as $key => $val) {
				//create the AHHasMany object				
				$this->_has_many_objs[$key] = new ARHasMany($val['class_name'],$val['bind_field'],$this);
			}
		}
		
	}
	
	static public function &find(){
		$db = get_db();
		$params = func_get_args();
		$class_name = self::class_name();
		$item = new $class_name();
		$result = call_user_func_array(array($item,"_find"), $params);	
		return $result;
	}
	
	//翻页操作，可自动从$_GET 或 $_POST中读取当前页数
	static public function &paginate(){		
		$params = func_get_args();
		$params[] = array("paginate" => true);
		return call_user_func_array("self::find",$params);
	}

	
	protected static function table_name(){
		return static::$s_table_name ? static::$s_table_name : get_called_class();
	}
	
	protected static function class_name(){
		return get_called_class();
	}
	
	public function &load(){
		$params = func_get_args();
		return call_user_func_array(array($this, "_find"),$params);
	}
	
	public function save($force=false){
		$key = $this->primary_key;
		if($this->$key > 0){
			return $this->_update($force);
		}else{
			return $this->_insert($force);
		}
	}
	
	public function update_attributes($params,$auto_save = true){
		if(is_array($params)){
			foreach ($params as $key => $val){
				$this->$key = $val;
			}
			if($auto_save){
				return $this->save();
			}
			return true;
		}
		return false;
	}
	
	public function update_file_attributes($name){
		if(!$_FILES[$name]['name']) return true;
		$default_filter = array('jpg','png','bmp','gif','icon','flv','wmv','wav','mp3','mp4','avi','rm','wma');
		$default_save_dir = '/upload';
		$default_limit = '0';
		global $msg_fail;
		global $msg_max_size;
		global $msg_error_type;
		if(!isset($msg_fail)) $msg_fail = 'fail to upload the file';
		if(!isset($msg_max_size)) $msg_max_size = 'fail to upload file!out of max size range';
		if(!isset($msg_error_type)) $msg_error_type = 'unknown file type!';
		$result = true;
		foreach ($_FILES[$name]['name'] as $key => $val) {
			if(!$val) continue;
			$filter = $key ."_filter";
			$save_dir = $key ."_save_dir";
			$limit = $key ."_limit";
			global $$filter;
			global $$save_dir;
			global $$limit;

			if(!isset($$filter)) $$filter = $default_filter;
			if(!isset($$save_dir)) $$save_dir = $default_save_dir;
			
			if($_FILES[$name]['error'][$key] != UPLOAD_ERR_OK){
				alert($msg_fail);
				$result =  false;
			}
			if($_FILES[$name]['size'][$key] > $$limit & $this->max_file_size > 0){
				alert($msg_max_size);
				$result =  false;
			}		
			$path_info = pathinfo($val);
			$extension = strtolower($path_info['extension']);
			if(!in_array($extension,$$filter)){
				alert($msg_error_type);
				$result =  false;
			}
			$save_name = rand_str() .'.'.$extension;
			$save = ROOT_DIR .$$save_dir . '/'. $save_name;
			if(move_uploaded_file($_FILES[$name]['tmp_name'][$key],$save)){
				$this->$key = $$save_dir .'/' . $save_name;
			}else{
				debug_info('fail to upload file:' .$val,'js');
			}
		}
		return $result;
	}
	
	protected function _default_values(){
		if(static::$s_fields_info){
			foreach (static::$s_fields_info as $key => $val){
				$this->fields[$key]['value'] = $val->default;
			}
		}
	}
	
	protected function _update($force){
		$key = $this->primary_key;
		if(intval($this->$key) <= 0) return false;
		foreach ($this->fields as $name => $field){
			if($name == $key){
				continue;
			}
			if(!$force && !$field['changed']) continue;
			if($name == 'created_at') continue;
			if($name == 'last_edit_at'){
				$this->name = now();
			}
			$value = is_null($field['value']) ? "NULL" : ($field['value'] == 'NULL' ? $field['value'] : "'" .$field['value'] ."'");
			if($value != 'NULL' && static::$s_fields_info[$name]->short_type == 'int'){
				$value= intval($field['value']);
			}
			$set[] = "{$name}={$value}";
		}
		if(empty($set)) return  true;
		$sql = "update " .$this->table_name ." set " .join(',', $set) ." where {$key}=" .$this->$key ;
		$db = get_db();
		$result = $db->execute($sql);
		if($result === false) return false;
		foreach ($this->fields as $field){
			$field['changed'] = false;
		}
		return true;
	}
	
	protected function _insert($force){
		$key = $this->primary_key;
		foreach ($this->fields as $name => $field){
			if($name == $key) continue;
			if($name == 'created_at' || $name == 'last_edit_at'){
				$field['value'] = now();
			}
			$insert_fields[]=$name;
			$value = is_null($field['value']) ? "NULL" : "'" .$field['value'] ."'";
			$insert_values[] = $value;
		}
		$sql = "insert into " .$this->table_name ." (" .join(',', $insert_fields) .") values (" .join(',', $insert_values) .")";
		$db = get_db();
		$result = $db->execute($sql);
		if($result === false) return false;
		$this->fields[$key]['value'] = $db->last_insert_id;
		return true;
	}
	
	protected function &_find(){
		$this->reset();
		$limit = 0;
		$conditions = array();
		$order = null;
		$include = true;
		$group = null;
		$paginate = false;		
		$num = func_num_args();
		if($num > 0){
			$param1 = func_get_arg(0);
			if(is_numeric($param1)){
				$limit = 1;
				$conditions[] = "t.". static::$s_primary_key . '=' . $param1;
			}
			if(is_string($param1) && strtolower($param1) == 'first'){
				$limit = 1;
			}
		}
		for($i=0;$i<$num;$i++){
			$param = func_get_arg($i);
			if(is_array($param)){
				if(array_key_exists('limit', $param)){
					$limit = intval($param['limit']);
				}
				if(array_key_exists('conditions', $param) && $param['conditions']){
					$conditions[] = $param['conditions'];
				}
				if(array_key_exists('order', $param)){
					$order = $param['order'];
				}
				if(array_key_exists('group', $param)){
					$group = $param['group'];
				}
				if(array_key_exists('include', $param)){
					$include = $param['include'];
				}
				if(array_key_exists('paginate', $param)){
					$paginate = $param['paginate'];
				}
				if(array_key_exists('page_var', $param)){
					$page_var = $param['page_var'];
				}
				if(array_key_exists('per_page', $param)){
					$per_page = $param['per_page'];
				}
			}
		}
		
		$sql = $this->_generate_find_sql($include, $conditions, $group, $order, $limit);
		$db = get_db();
		if($paginate){
			$tmp_result = $db->paginate($sql,$per_page,$page_var);			
		}else{
			$tmp_result = $db->query($sql);
		}
		if ($tmp_result === false) return false;
		if($limit == 1){
			if ($db->record_count <= 0) return null;
			
			foreach ($this->fields as $k => $v){
				$this->fields[$k]['value'] = $db->field_by_name($k);
				$this->fields[$k]['changed'] = false;
			}
			foreach ($this->virtual_fields as $k => $v){
				$this->virtual_fields[$k] = $db->field_by_name($k);
			}
			$result = $this;
		}else {
			$result = array();
			if($db->record_count <= 0) return $result;
			$db->move_first();
			do {
				$tmp = clone $this;
				foreach ($tmp->fields as $k => $v){
					$tmp->fields[$k]['value'] = $db->field_by_name($k);
					$tmp->fields[$k]['changed'] = false;
				}
				foreach ($this->virtual_fields as $k => $v){
					$tmp->virtual_fields[$k] = $db->field_by_name($k);
				}
				array_push($result,$tmp);
			}while ($db->move_next());
			foreach ($this->fields as $k => $v) {
				$this->fields[$k]['value'] = $result[0]->$key;
			}
			foreach ($this->virtual_fields as $k => $v){
				$this->virtual_fields[$k]['value'] = $result[0]->$key;
			}
		}
		return $result;
		
	}
	
	protected function _generate_find_sql($include,$conditions,$group,$order,$limit){
		$sql = 'select t.*';
		$left_jions = array();
		if($include && static::$s_virtual_fields){
			$len = count(static::$s_virtual_fields);
			for($i=0;$i<$len;$i++){
				$table = static::$s_virtual_fields[$i]['table'];
				$from_field = static::$s_virtual_fields[$i]['from_field'] ? static::$s_virtual_fields[$i]['from_field'] : "{$table}_id";
				$to_field = static::$s_virtual_fields[$i]['to_field'] ? static::$s_virtual_fields[$i]['to_field'] : 'id';
				$left_jions[] = " left join $table t{$i} on t.{$from_field} = t{$i}.{$to_field}";
				foreach (static::$s_virtual_fields[$i]['fields'] as $field) {
					$name = $field['alias'] ? $field['alias'] : $field['name'];
					$select_fields[] = "t{$i}.{$field['name']} as {$name}";
				}
			}
			$sql .= "," .join(',', $select_fields);
		}
		
		$sql .= " from " .$this->table_name ." t ";
		if($left_jions){
			$sql .= join(' ', $left_jions);
		}
		if($conditions){
			$sql .= " where ". join(' and ', $conditions);
		}
		
		if($group){
			$sql .= " group by " .$group;
		}
		
		if($order){
			$sql .= " order by " . $order;
		}
		
		if($limit){
			$sql .= " limit " .$limit;
		}
		
		return $sql;
	}
	
	protected function _get_mysql_short_type($type){
		if(strpos(strtolower($type),'int') === 0){
			return 'int';
		}
		if(strpos(strtolower($type),'varchar') === 0){
			return 'varchar';
		}
		if(strpos(strtolower($type),'float') === 0){
			return 'float';
		}
		if(strpos(strtolower($type),'char') === 0){
			return 'char';
		}
		if(strpos(strtolower($type),'text') === 0){
			return 'text';
		}
		return $type;
	}
	
	protected function reset(){
		
	}
	
	public function __set($name,$value){
		if($name == 'echo_sql'){
			$db = get_db();
			$db->echo_sql = $value;
		}
		if(array_key_exists($name, $this->fields)){
			if($this->$name === $value) return ;
			$this->fields[$name]['value'] = $value;
			$this->fields[$name]['changed'] = true;
		}
	}
	
	public function __get($name){
		switch ($name) {
			case 'table_name':
				if(!$this->_table_name){
					$this->_table_name = self::table_name();	
				}
				return (static::$s_database ? '`' .static::$s_database . '`.' : '') . $this->_table_name;
			break;
			case 'primary_key':
				return static::$s_primary_key;
			break;
			default:
				if(array_key_exists($name, $this->fields)){
					return $this->fields[$name]['value'];
				};
				if(array_key_exists($name, $this->virtual_fields)){
					return $this->virtual_fields[$name];
				};
				if(array_key_exists($name, $this->_has_many_objs)){
					return $this->_has_many_objs[$name];
				}
				$len = strlen($name);
				if($name{$len-1} == 's'){
					$tmp_name = substr($name, 0,$len-1);
					if(array_key_exists($tmp_name, $this->_has_many_objs)){
						if(!$this->_has_many_objs[$tmp_name]->loaded){
							$this->_has_many_objs[$tmp_name]->initialize_objs();
						}
						return $this->_has_many_objs[$tmp_name]->objs;
					}
				}
			break;
		}
	}
	
}