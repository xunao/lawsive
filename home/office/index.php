<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		session_start();
		include ('../../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','diary','comment','home/office');
		js_include_tag('admin/office/office');
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
		$conditions[] = "(resource_type = 'lawyer' or resource_type = 'lawfirm' )";
		$conditions[] = "member_id='{$id}'";
		if( $file_category != '0'){
			$conditions[] = "category = '$file_category'";
		}
		$diarys = new Table("plug");
		$diary = $diarys->paginate('all',array('conditions' => join(' and ', $conditions),'order' => "priority,created_at desc"),4);
		$total = $db->query("select * from lawsive.plug where (resource_type = 'lawyer' or resource_type='lawfirm')  and member_id='{$id}'");
		$total2 = $db->query("select * from lawsive.plug where (resource_type =  'lawyer' or resource_type='lawfirm') and member_id='{$id}'and category = '-1'");
		if($diary === false) die('数据库执行失败');
  	?>
<body>
      <div id="ibody">
      	<?php include_once(INC_DIR.'/home/top.php'); ?>
      	<?php include_once(INC_DIR.'/home/left.php'); ?>
      	<div id="diary_box">
      		<div id="diary_title">
      			<img src="../../../images/diary/logo_diary.jpg" />
      			<?php if($id == $user->id){
      				echo '我';
      			}else{
      				$member = new Table('member');
      				$member->find($id);
      				echo $member->name;
      			}?>
      			的律师&律所推荐
      			<input type="hidden" id="id" value="<?php echo $id ?>">
      			<div id="e_ret"><a href="/home/">&gt;&gt;返回我的首页</a></div>
      		</div>
      		<div id="d_m">
      			<div id="dm_t_l"></div>
      			<div id="dm_t_m">
      			<?php if($file_category == '0'){?>律师&律所
      			<?php }elseif($file_category == '-1'){?>未分类律师&律所推荐
      			<?php }else{
      				$cat_name= new Table('member_category');
      				$cat_name->find($file_category);
      				echo $cat_name->name;
      			}?>
      			</div>
      			<div id="dm_t_r"></div>
      			<div id="dm_t_o">
      			<?php if($id==$user->id){echo "<a href='edit.php'>写新的律师&律所推荐</a>";}?></div>
      			<?php 
      				if(count($diary) != '0'){
      				for($i=0; $i<count($diary);$i++){
      				if($diary[$i]->category != '-1'){
      					$cat_name2= new Table('member_category');
      					$cat_name2->find($diary[$i]->category);
      					$cat_name = $cat_name2->name;
      					$cat_id = $cat_name2->id;
      				}else{
      					$cat_name = '未指定';
      					$cat_id = '-1';
      				}
      				
      				?>
      			<div id="dia_box">
      				<div class="dm_diary">
      					<div style="width:650px;"><div class="dia_t"><a href="show.php?id=<?php echo $diary[$i]->id;?>"><?php echo htmlspecialchars($diary[$i]->title);?></a></div>
      					<div class="dia_info"><?php echo mb_substr($diary[$i]->lasted_at,0,16);?>发表	分类：<?php echo $diary[$i]->resource_type;?></div></div>
      				<?php if($id==$user->id){?>
      					<div class="dia_edit">
      						<a href="edit.php?a_id=<?php echo $diary[$i]->id;?>">编辑</a>　<font>|</font><a class="del" href="#">删除</a>
      						<input  id="diary_id" type="hidden" value="<?php echo $diary[$i]->id;?>" />
      					</div>
      				<?php }?>
      				</div>
      				<div class="dia_cont">
      					<div class="dia_word"><?php echo mb_substr(htmlspecialchars_decode($diary[$i]->content),0,600,utf8);?></div>
      				<?php if($id!=$user->id){?>
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
      		<?php if($diary != false){?>
      			<div id="paginate"><?php paginate("",null,"page",true);?></div>
      		<?php }?>
				<input type="hidden" id="dia_del_auth" name="dia_del_auth" value="<?php echo $auth;?>" />
      		</div>
      	</div>
      	<?php include_once(INC_DIR.'/home/bottom.php'); ?>
	</div>
</body>
</html>