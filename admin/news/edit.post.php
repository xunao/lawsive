<?php 
	session_start();
	include_once('../../frame.php');
	$user = AdminUser::current_user();
	$db = get_db();
	$news_id = $_POST['id'] ? $_POST['id'] : 0;
	$news = new Table('news');
	if($news_id){
		$news->find($news_id);
	}
	
	$news->update_attributes($_POST['news'],false);
	$news->update_file_attributes('news');
	if(!$news->admin_user_id){
		$news->admin_user_id = $user->id;
	}
	
	if ($news->priority == ""){
		$news->priority = 100;
	}
	$table_change = array('<p>'=>'');
	$table_change += array('</p>'=>'');
	$news->title = strtr($news->title,$table_change);
	$news->short_title = strtr($news->short_title,$table_change);
	$news->last_edited_at = now();	
	if(!$news->id){
		//insert news
		$news->created_at = now();
		$news->click_count = 0;					
	}
	if($news->is_adopt){
		publish_news($news);
	}else{
		$news->save();
	}
	/*
	 * news saved
	 */
	
	//handle the keywords
	$keywords = explode('||', $news->keywords);
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
			$schedule->resource_id = $news->id;
			$schedule->resource_type= 'news';
			$schedule->save();
		}else{
			if($schedule->id){
				$schedule->delete();
			}
		}
	}

	if($_POST['copy_news']){
		$news->copy_from = $news->id;
		$news->id = 0;
		$news->category_id = intval($_POST['copy_news']);
		$news->save();
	}
	$href = "index.php";
	#redirect($href.'?category='.$_POST['news']['category_id']);
	#var_dump($news);
	
?>