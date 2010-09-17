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
	$trade->save();
	$member_trade->trade_id=$trade->id;
	$member_trade->u_type=$trade->trade_type;
	$member_trade->u_id=2;
	$member_trade->save();
	$href = "index.php";
	redirect($href.'?category='.$_POST['trade']['trade_id']);
?>