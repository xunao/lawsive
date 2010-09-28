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
	
	private $can_save =false;
	
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
		$this->can_save = false;
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
						$this->title .="　被 <a href='/home/member.php?id={$comment->user_id}'>{$comment->nick_name}</a>　评论道：";
					break;
					case 'mood':
						$sql = "select a.id,a.u_id,a.content,a.created_at,b.name from mood a left join member b on a.u_id = b.id where a.id ={$comment_resource_id}";
						$result = $db->query($sql);
						$result = $result[0];
						$this->title = "<a href='/home/member.php?id={$result->u_id}'>{$result->name}</a>　的心情　";
						$this->title .="<a href='/home/mood/show.php?id={$result->id}'>". mb_substr($result->content, 0,10,'utf-8') ."</a>";
						$this->title .="　被 <a href='/home/member.php?id={$comment->user_id}'>{$comment->nick_name}</a>　评论道：";
					break;
					case 'member_photo':
						$sql = "select * from member_photo where id ={$comment_resource_id}";
						$result = $db->query($sql);
						$result = $result[0];
						$this->title = "<a href='/home/member.php?id={$result->member_id}'>{$result->member_name}</a>　的相片　";
						$this->title .="<a href='/home/album/pho_show.php?album_id={$result->category_id}'>". mb_substr($result->name, 0,10,'utf-8') ."</a>";
						$this->title .="　被 <a href='/home/member.php?id={$comment->user_id}'>{$comment->nick_name}</a>　评论道：";
					break;
					
					default:
						return false;
					break;
				}
				$this->created_at = $comment->created_at;
				$this->content = mb_substr($comment->comment, 0,200,'utf-8');
			break;
			case 'mood':
				$sql = "select a.id,a.u_id,a.content,a.created_at,b.name from mood a left join member b on a.u_id = b.id where a.id ={$resource_id}";
				$result = $db->query($sql);
				$result = $result[0];
				if(!$result) return false;
				$this->title = "<a href='/home/member.php?id={$result->u_id}'>{$result->name}</a>　发布了一个心情　";
				$this->title .="<a href='/home/mood/show.php?id={$result->id}'>". mb_substr($result->content, 0,10,'utf-8') ."</a>";
				$this->created_at = $result->created_at;
				$this->content = mb_substr($result->content, 0,200,'utf-8');
			break;
			case 'photo':
				$sql = "select * from member_photo where id ={$resource_id}";
				$result = $db->query($sql);
				$result = $result[0];
				if(!$result) return false;
				$this->title = "<a href='/home/member.php?id={$result->member_id}'>{$result->member_name}</a>　更新了专辑　";
				$this->title .="<a href='/home/album/pho_show.php?album_id={$result->category_id}'>". mb_substr($result->name, 0,10,'utf-8') ."</a>";
				$this->created_at = $result->last_edit_at;
				$this->content = mb_substr($result->description, 0,200,'utf-8');
				$this->photo = "<a target='_blank' href='{$result->src}'><img src='{$result->src}' border=0 /></a>";
			break;
			case 'photo_del':
				$sql = "select * from member_photo where id ={$resource_id}";
				$result = $db->query($sql);
				$result = $result[0];
				$time = now();
				if(!$result) return false;
				$this->title = "<a href='/home/member.php?id={$result->member_id}'>{$result->member_name}</a>　删除了相片　";
				$this->title .= mb_substr($result->name, 0,10,'utf-8');
				$this->created_at = $time;
			break;
			case 'album':
				$sql = "select * from album where id ={$resource_id}";
				$result = $db->query($sql);
				$result = $result[0];
				if(!$result) return false;
				$this->title = "<a href='/home/member.php?id={$result->member_id}'>{$result->member_name}</a>　添加了新的专辑　";
				$this->title .="<a href='/home/album/index.php?id={$result->member_id}'>". mb_substr($result->name, 0,10,'utf-8') ."</a>";
				$this->created_at = $result->last_edit_at;
				$this->content = mb_substr($result->description, 0,200,'utf-8');
				$this->photo = "<a target='_blank' href='{$result->front_cover}'><img src='{$result->front_cover}' border=0 /></a>";
			break;
			case 'album_del':
				$sql = "select * from member_photo where id ={$resource_id}";
				$result = $db->query($sql);
				$result = $result[0];
				$time = now();
				if(!$result) return false;
				$this->title = "<a href='/home/member.php?id={$result->member_id}'>{$result->member_name}</a>　删除了专辑　";
				$this->title .= mb_substr($result->name, 0,10,'utf-8') ."以及其中的照片";
				$this->created_at = $time;
			break;
			
			default:
				return  false;;
			break;
		}
		
		$this->can_save =true;
	}
	
	function save(){
		if($this->can_save == false) return false;
		$db = get_db();
		$sql = "insert into friend_news (member_id,title,photo,description,content,created_at,resource_type,resource_id) values(";
		$sql .= $this->member_id .",'".addslashes($this->title)."','".addslashes($this->photo)."','".addslashes($this->description)."','".addslashes($this->content)."','{$this->created_at}','{$this->resource_type}',{$this->resource_id})";
		return $db->execute($sql);

	}
	
}