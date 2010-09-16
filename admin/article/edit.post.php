<?php 
	session_start();
	include_once('../../frame.php');
	$user = AdminUser::current_user();
	$db = get_db();
	$article_id = $_POST['id'] ? $_POST['id'] : 0;
	//$news = new Table('news');
	$article=new Table('article');
	if($article_id){
		$article->find($article_id);
	}
	
	$article->update_attributes($_POST['news'],false);
	$article->update_file_attributes('news');
	if(!$article->admin_user_id){
		$article->admin_user_id = $user->id;
	}
	
	if ($article->priority == ""){
		$article->priority = 100;
	}
	$table_change = array('<p>'=>'');
	$table_change += array('</p>'=>'');
	$article->title = strtr($article->title,$table_change);
	//news->short_title = strtr($news->short_title,$table_change);
	$article->last_edited_at = now();	
	if(!$article->id){
		//insert news
		$article->created_at = now();
		//$news->click_count = 0;					
	}
	$article->save();
	/*
	 * news saved
	 */
	
	//handle the keywords
	$keywords = explode('||', $article->keywords);
	if($keywords){
		foreach($keywords as $val){
			if(empty($val)) continue;
			$db->execute("insert into eb_news_keywords (name) values('{$val}') on duplicate key update name='{$val}'");
		}
	}
	
	//handle the publish schedule
	if(isset($_POST['publish_schedule_date'])){
		$schedule = new Table('publish_schedule');
		if($id){
			$schedule->find_by_resource_id($id);
		}
		if($_POST['publish_schedule_date']){
			$schedule->publish_date = $_POST['publish_schedule_date'];
			$schedule->resource_id = $article->id;
			$schedule->resource_type= 'news';
			$schedule->save();
		}else{
			if($schedule->id){
				$schedule->delete();
			}
		}
		if ($schedule->publish_date<=time()) {
			$article->is_adopt=1;
		}else {
			$article->is_adopt=0;
			$article->created_at=time();
			$article->last_edited_at=$schedule->publish_date;
		}
		$article->save();
	}

	if($_POST['copy_news']){
		//$news->copy_from = $news->id;
		$article->id = 0;
		//$news->category_id = intval($_POST['copy_news']);
		$article->save();
	}
	$href = "index.php";
	redirect($href);
	//redirect($href.'?category='.$_POST['news']['category_id']);
	#var_dump($news);
	
?>