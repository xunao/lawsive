<?php 
if(!defined('FRAME_VERSION')) die('not allowed!');

class Comment{
	private $type;
	private $r_id;
	private $items;
	
	function __construct($type=null,$r_id=null) {
		$db = get_db();
		if(!empty($type))$this->type = $type;
		if(!empty($r_id))$this->r_id = $r_id;
		
		if(!empty($type)&&!empty($r_id)){
			$this->items = $db->query("select * from comment where resource_type='$type' and resource_id=$r_id");
		}
	}
	
	function set_type($type=null){
		if(!empty($type)){
			$this->type = $type;
		}
	}
	
	function set_rid($r_id=null){
		if(!empty($r_id)){
			$this->r_id = $r_id;
		}
	}
	
	
}

?>