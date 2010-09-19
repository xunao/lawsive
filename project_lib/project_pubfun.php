<?php
function judge_application($app){
	$member = member::current();
	if(!$member) return false;
	$db = get_db();
	$db->query("select id from application where sid='$app'");
	if($db->record_count <=0) return false;
	$app_id = $db->field_by_name('id');
	$db->query("select id from member_application where status=1 and member_id={$member->id}");
	if($db->record_count > 0) return true;
	$db->query("select application_id from application_role where is_free=1 and (role =0 or role={$member->role})");
	if($db->record_count <=0) return false;
	return true;
}