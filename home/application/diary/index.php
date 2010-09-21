<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		session_start();
		include ('../../../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','diary','comment');
		js_include_tag('diary');
		use_ckeditor();
		$user = member::current();
		
		if(!$user)
		{
			die('对不起，您的登录已过期！请重新登录！');
			redirect('/home/login.php?last_url=/home/application/dairy');
		}
		$auth = rand_str();
		$_SESSION['dia_del_auth'] = $auth;
		
		$id=intval($_GET['id']);
		$db=get_db();
		$file_category = intval($_GET['file_category']);
		if(!$id){
			$id=$user->id;
		}
		$conditions = array();
		$conditions[] = "resource_type = 'diary'";
		$conditions[] = "admin_user_id='{$id}'";
		if($file_category != '0'){
			$conditions[] = "category = '$file_category'";
		}
		$diarys = new Table("article");
		$diary = $diarys->paginate('all',array('conditions' => join(' and ', $conditions),'order by' => "created_at desc"),4);
		$total = $diarys->paginate('all',array('conditions'=>("resource_type = 'diary' and admin_user_id='{$id}'")));
		$total2 = $diarys->paginate('all',array('conditions'=>("resource_type = 'diary' and admin_user_id='{$id}' and category = '0'")));
		if($diary === false) die('数据库执行失败');
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/top.php'); ?>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/left.php'); ?>
      	<div id="diary_box">
      		<div id="diary_title">
      			<img src="../../../images/diary/logo_diary.jpg" />日志
      			<input type="hidden" id="id" value="<?php echo $id ?>">
      			<div id="e_ret"><a href="/home/">&gt;&gt;返回我的首页</a></div>
      		</div>
      		<div id="d_m">
      			<div id="dm_t_l"></div>
      			<div id="dm_t_m">
      			<?php if($file_category == '0'){?>全部日志
      			<?php }else{
      				$cat_name= new Table('member_category');
      				$cat_name->find($file_category);
      				echo $cat_name->name;
      			}?>
      			</div>
      			<div id="dm_t_r"></div>
      			<div id="dm_t_o">
      			<?php if($id==$user->id){echo "<a href='edit.php'>写新日志</a>";}?></div>
      			<div id="dia_other">
      				<div id="dia_mn">日志分类：</div>
      				<div class="dia_cate">
      				<div class="dc_t"><img style="display:inline" src="/../../../images/diary/dc_t.jpg"></div>
      				<div class="dc_name">全部日志（<?php echo count($total)?>）</div>
      				<?php 
      					$categorys = $db->query("select id,name from lawsive.member_category where resource_type = 'diary' and member_id = '$id'");
      					for($i=0; $i<count($categorys);$i++){
      					$count = count($db->query("select id from lawsive.article where category = '{$categorys[$i]->id}'"));
      				?>
      					<div class="dc_t"><img style="display:inline" src="/../../../images/diary/dc_t.jpg"></div>
      					<div class="dc_name">
	      					<?php echo $categorys[$i]->name?>(<?php echo $count ?>)
	      					<input class="category_id" type="hidden" value="<?php echo $categorys[$i]->id;?>" />
      					</div>
      				<?php }?>
      				<div class="dc_t"><img style="display:inline" src="/../../../images/diary/dc_t.jpg"></div>
      				<div class="dc_name">未分类日志（<?php echo count($total2)?>）</div>
      				<?php if($id == $user->id){?>
      					<div id="add_more"><a href="category_edit.php">分类管理&gt;&gt;</a></div>
      				<?php }?>
      				</div>
      			</div>
      			<?php 
      				if(count($diary) != '0'){
      				for($i=0; $i<count($diary);$i++){
      				if($diary[$i]->category != '0'){
      					$cat_name2= new Table('member_category');
      					$cat_name2->find($diary[$i]->category);
      					$cat_name2 = $cat_name2->name;
      				}else{
      					$cat_name2 = '未指定';
      				}
      				
      				?>
      			<div id="dia_box">
      				<div class="dm_diary">
      					<div style="width:470px;"><div class="dia_t"><a href="show.php?id=<?php echo $diary[$i]->id;?>"><?php echo htmlspecialchars($diary[$i]->title);?></a></div>
      					<div class="dia_info"><?php echo mb_substr($diary[$i]->created_at,0,16);?>发表	分类：<?php echo $cat_name2?></div></div>
      				<?php if($id==$user->id){?>
      					<div class="dia_edit">
      						<a href="edit.php?a_id=<?php echo $diary[$i]->id;?>">编辑</a>　<font>|</font><a class="del" href="#">删除</a>
      						<input  id="diary_id" type="hidden" value="<?php echo $diary[$i]->id;?>" />
      					</div>
      				<?php }?>
      				</div>
      				<div class="dia_cont">
      					<div class="dia_word"><?php echo mb_substr(htmlspecialchars_decode($diary[$i]->content),0,600,utf8);?></div>
      				<?php if($id==$user->id){?>
      					<div class="dia_add">
      						<a href="show.php?id=<?php echo $diary[$i]->id;?>">评论</a>　<font>|</font>　<a class = "up" href="#">赞</a>
      						<input  id="diary_id" type="hidden" value="<?php echo $diary[$i]->id;?>" />
      					</div>
      				<?php }?>
      				</div>
      				
      			</div>
      			<?php }
      				}else{
      			?>
      			<div id="dia_box">
      				<div id="nodia">该分类暂无日记！</div>
      			</div>
      			<?php }?>
      			<div id="paginate"><?php paginate("",null,"page",true);?></div>
				<input type="text" id="dia_del_auth" name="dia_del_auth" value="<?php echo $auth;?>" />
      		</div>
      	</div>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/bottom.php'); ?>
	</div>
</body>
</html>