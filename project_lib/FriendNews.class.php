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
	public $description;
	public $content;
	public $photo;
	public $title;
	
	static public function load($db_items){
		if (!is_array($db_items)) return array();
		foreach ($db_items as $db_item) {
			$tmp = new self();
			$tmp->id = $db_item->id;
			$tmp->member_id = $db_item->member_id;
			$tmp->resource_type = $db_item->resource_type;
			$tmp->resource_id = $db_item->resource_id;
			$tmp->created_at = $db_item->created_at;
			$tmp->description = $db_item->description;
			$tmp->content = $db_item->content;
			$tmp->photo = $db_item->photo;
			$tmp->title = $db_item->title;
			$result[] = $tmp;
		}
		return $result;
	}
	
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
			case 'comment':
				$sql = "select resource_type,resource_id,nick_name,comment,user_id,a.created_at,b.name from comment a left join member b on a.user_id=b.id where a.id=$resource_id";
				$comment = $db->query($sql);
				if(!$comment) return false;
				$comment = $comment[0];
				$comment_resource_type = $comment->resource_type;
				$comment_resource_id = $comment->resource_id;
				echo $comment_resource_type;
				if(!in_array($comment_resource_type, array('diary','mood','album','member_photo'))){
					return false;
				}
				switch ($comment_resource_type) {
					case 'diary':
						$sql = "select a.id,a.admin_user_id,a.title,a.content,a.created_at,b.name from article a left join member b on a.admin_user_id = b.id where a.id ={$comment_resource_id}";
						$result = $db->query($sql);
						$result = $result[0];
						$this->title = "<a href='/home/member.php?id={$result->admin_user_id}'>{$result->name}</a>　的日记　";
						$this->title .="<a href='/home/application/diary/show.php?id={$result->id}'>". mb_substr($result->title, 0,10,'utf-8') ."</a>";
						$this->title .="　被 <a href='/home/member.php?id={$comment->user_id}'>{$comment->nick_name}</a>　评论到：";
					break;
					
					default:
						;
					break;
				}
				$this->created_at = $comment->created_at;
				$this->content = mb_substr($comment->comment, 0,200,'utf-8');
			break;
			
			default:
				;
			break;
		}
		
	}
	
	function save(){
		$db = get_db();
		$sql = "insert into friend_news (member_id,title,photo,description,content,created_at,resource_type,resource_id) values(";
		$sql .= $this->member_id .",'".addslashes($this->title)."','".addslashes($this->photo)."','".addslashes($this->description)."','".addslashes($this->content)."','{$this->created_at}','{$this->resource_type}',{$this->resource_id})";
		return $db->execute($sql);

	}
	
}