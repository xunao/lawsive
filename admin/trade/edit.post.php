<?php 
	session_start();
	include_once('../../frame.php');
	$user = AdminUser::current_user();
	$db = get_db();
	$trade_id = $_POST['id'] ? $_POST['id'] : 0;
	$trade = new Table('trade');
	$member_trade = new Table('member_trade');
	if($trade_id){
		$trade->find($trade_id);
	}
	$trade->update_attributes($_POST['trade'],false);
//	$trade->update_file_attributes('trade'); 修改文件的属性
//	if(!$trade->admin_user_id){
//		$trade->admin_user_id = $user->id;
//	}
//	$table_change = array('<p>'=>'');
//	$table_change += array('</p>'=>'');
//	$trade->title = strtr($trade->title,$table_change);
//	$trade->last_edited_at = now();	
//	if(!$trade->id){
//		//insert news
//		$trade->created_at = now();
//	}
	$trade->save();
	$member_trade->trade_id=$trade->id;
	$member_trade->u_type=$trade->trade_type;
	$member_trade->u_id=2;
	$member_trade->save();
	//handle the publish schedule
//	if(isset($_POST['publish_schedule_date'])){
//		$schedule = new Table('publish_schedule');
//		if($id){
//			$schedule->find_by_resource_id($id);
//		}
//		if($_POST['publish_schedule_date']){
//			$schedule->publish_date = $_POST['publish_schedule_date'];
//			$schedule->resource_id = $trade->id;
//			$schedule->resource_type= 'news';
//			$schedule->save();
//		}else{
//			if($schedule->id){
//				$schedule->delete();
//			}
//		}
//		if ($schedule->publish_date<=time()) {
//			$trade->is_adopt=1;
//		}else {
//			$trade->created_at=time();
//			$trade->last_edited_at=$schedule;
//		}
//		$trade->save();
//	}
//
//	if($_POST['copy_news']){
//		$trade->copy_from = $trade->id;
//		$trade->id = 0;
//		$trade->category_id = intval($_POST['copy_news']);
//		$trade->save();
//	}
	$href = "index.php";
	redirect($href.'?category='.$_POST['trade']['trade_id']);
	#var_dump($trade);
?>