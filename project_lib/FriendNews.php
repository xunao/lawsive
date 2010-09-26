<?php
if(!defined('FRAME_VERSION')){
	die('invalid request!');
}

class FriendNews {
	public $id = 0;
	public $member_id;
	public $resource_type;
	public $resource_id;
	public $created_at;
	public $decription;
	public $photo;
	
	function generat($member_id,$resource_type,$resource_id){
		$this->member_id = $member_id;
		$this->resource_id = $resource_id;
		$this->resource_type = $resource_type;
		
	}
}