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
	public $title;
	
	function generat($member_id,$resource_type,$resource_id){
		$this->member_id = $member_id;
		$this->resource_id = $resource_id;
		$this->resource_type = $resource_type;
		$db = get_db();
		switch ($this->resource_type) {
			case 'diary':
				$sql = "select a.id,a.admin_user_id,a.title,a.content,a.created_at,b.name from article a left join member b on a.admin_user_id = b.id where a.id ={$resource_id}";
				$result = $db->query($sql);
				$result = $result[0];
				if(!$result) return false;
				$this->title = "<a href='/home/member.php?id={$result->admin_user_id}'>{$result->name}</a>　发布了一篇日记　";
				$this->title .="<a href='/home/application/diary/show.php?id={$result->id}'>". mb_substr($result->title, 0,10,'utf-8') ."</a>";
				$this->created_at = $result->created_at;
				$this->content = mb_substr($result->content, 0,200,'utf-8');
			break;
			
			default:
				;
			break;
		}
	}
}