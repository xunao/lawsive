<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php
		session_start();
		include_once('../frame.php');
	//require_role('admin');
	?>
	<title><?php echo $_g_site_name; ?>-后台</title>
	<?php	
		$user = AdminUser::current_user();
		if(!$user){
			redirect('login.php');
			die();
		}
		css_include_tag('admin/index','colorbox');
		use_jquery();
		use_jquery_ui();
		js_include_tag('jquery.colorbox');
  ?>
</head>
<body style="background:url(/images/admin/bg.jpg);">
<div id=ibody>
		<div id=top>
			<div id=site><?php echo $site_name; ?>后台管理</div>
			<div id=login>欢迎你：  <?php echo $user->nick_name; ?> [<a href="/admin/logout.post.php">退出</a>]</div>
		</div>
		<div id=nav1>
			<?php 
				$db = get_db();
				$sub_menu_ids = $user->get_admin_menu();
				$sub_menu_ids = join(',',$sub_menu_ids);
				$sub_menus = $db->query("select * from admin_menu where id in({$sub_menu_ids}) order by parent_id, priority asc");
				$main_menus = $db->query("select * from admin_menu where parent_id =0 order by priority asc");
				$main_menu_id = $_REQUEST['main_menu_id'] ? $_REQUEST['main_menu_id'] : $main_menus[0]->id;
				$sub_menu_id = $_REQUEST['sub_menu_id'] ? $_REQUEST['sub_menu_id'] : $sub_menus[0]->id;
				$i=0;
				$j=0;
				foreach($main_menus as $val){
			?>
			<div class="nav1_menu <?php if($i==0){echo 'selected'; $j=$val->id;}?>" param_id="<?php echo $val->id;?>"><?php echo $val->name;?></div>
			<?php 
				}
			?>		
			<div id=nav1_index><a href="/index.php" target="_blank">动态首页</a></div>
		</div>
		<div id=nav2>
			<?php 
				foreach($sub_menus as $val){	
			?>
			<div class="nav2_menu nav2_menu_<?php echo $val->parent_id;?>" <?php if($j==$val->parent_id){echo 'style="display:inline"';}?> param_href="<?php echo $val->href;?>"><a href="<?php echo $val->href;?>" target="<?php echo $val->target;?>"><?php echo $val->name;?></a></div>
			<?php 
				}
			?>
			<div id="page_admin_tool" style="float:right;margin-right:10px; margin-top:5px; display:none; color:green; cursor:pointer;">可编辑状态</div>
		</div>
		<div id="admin_content">
		  <iframe id=admin_iframe name="admin_iframe" scrolling="auto" frameborder="0" src="/admin/news/" width="1046" height="1300"></iframe>
		</div>
	</div>
</body>
<script>
$(function(){
	$(".nav1_menu").each(function(){
		if($('div .nav2_menu_' + $(this).attr('param_id')).length <= 0){
			$(this).remove();
		}else{
			$(this).show();
		}
	});
	
	$(".nav1_menu").click(function(e){
		 $(".nav1_menu").removeClass('selected');
		 $(this).addClass('selected');

		 $(".nav2_menu").hide();
		 $(".nav2_menu").css("color","#0000ff");
		 
		 var param_id=$(this).attr("param_id");
		 $(".nav2_menu_"+param_id).show();
	});
	$(".nav1_menu:first").click();
	//alert($(".nav2_menu:visible:first").length);
	

	$(".nav2_menu a").click(function(e){
		 $(".nav2_menu a").css("color","#0000ff");
		 $(this).css("color","#ff0000");
	});
	$('#admin_iframe').attr('src',$(".nav2_menu:visible:first a").attr('href'));
});
</script>
</html>