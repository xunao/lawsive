<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
	<meta name="description" content="律氏" />
<?php	
		include ('../../../frame.php');
		use_jquery_ui();
		css_include_tag('person_public','diary');
		js_include_tag('login');
		$user = member::current();
		$id=intval($_POST['id']);
		$db=get_db();
		$file_category = intval($_GET['filter_category']);
		$filter_adopt = isset($_GET['filter_adopt']) ?  intval($_GET['filter_adopt']) : -1;
		$filter_search = urldecode($_GET['filter_search']);
		$conditions = array();
		if($filter_category > 0){
			$cats = join(',',$category->children_map($filter_category));
			if($cats){
				$conditions[] = "category_id in ($cats)";
			}
		}
		if($filter_adopt >=0){
			$conditions[] = "is_adopt = $filter_adopt";
		}
		if($filter_search){
			$conditions[] = "(title like '%$filter_search%' or keywords like '%$filter_search%' or description like '%$filter_search%')";
		}
//		if(!$user)
//		{
//			die('对不起，您的登录已过期！请重新登录！');
//		}
		$diary = new Table('article');
//		$auth = rand_str();
//		$_SESSION['info_auth'] = $auth;
		$diarys = $diary->paginate('all',array('conditions' => "admin_user_id='{$id}',resource_type='diary'",'orderby' => "created_at desc"),12);
		if($diarys === false) die('数据库执行失败');
		var_dump($user->id);
  	?>
<body>
      <div id="ibody">
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/top.php'); ?></div>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/left.php'); ?>
      	<div id="diary_box">
      		<div id="diary_title">
      			<img src="../../../images/diary/logo_diary.jpg" />日记
      			<div id="e_ret"><a href="/home/">>>返回我的首页</a></div>	
      		</div>
      		<div id="d_m">
      			<div id="dm_t_l"></div>
      			<div id="dm_t_m">全部日记</div>
      			<div id="dm_t_r"></div>
      			<div id="dm_t_o">
      			<?php if($id==$user->id){echo "<a href='#'>写新日记</a>";}?></div>
      			<div id="dia_other">
      				<div id="dia_mn">日记分类：</div>
      				<div class="dia_cate">
      				<div class="dc_t"><img style="display:inline" src="/../../../images/diary/dc_t.jpg"></div>
      				<div class="dc_name" value="<?php echo $diarys->category?>">全部日记（1）</div>
      				<?php for($i=0; $i<2;$i++){?>
      					<div class="dc_t"><img style="display:inline" src="/../../../images/diary/dc_t.jpg"></div>
      					<div class="dc_name" value="<?php echo $diarys->category?>">全部日记（1）</div>
      				<?php }?>
      					<div id="add_more"><a href="/home/application/diary/category_edit.php">分类管理>></a></div>
      				</div>
      			</div>
      			<?php for($i=0; $i<2;$i++){?>
      			<div id="dia_box">
      				<div class="dm_diary">
      					<div style="width:470px;"><div class="dia_t"><a href="#">赛巴提斯</a></div>
      					<div class="dia_info">2010-10-10 12:88发表	分类：XXXXXX	权限：好友可见</div></div>
      					<div class="dia_edit"><a href="#">编辑</a>　<font>|</font>　<a href="#">删除</a>　</div>
      				</div>
      				<div class="dia_cont">
      					<div class="dia_word">好律师来这里，不好的律师来不了，好律师才来这里，不好的律师来了也马上变好律师，真的好律师早就在这里了，你看到这里也就已经是好律师了发觉了嘛</div>
      					<div class="dia_add"><a href="#">评论</a>　<font>|</font>　<a href="#">赞</a>　</div>
      				</div>
      			</div>
      			<?php }?>
      		</div>
      		
      		
      	</div>
      	<?php include_once(dirname(__FILE__).'/../../../inc/home/bottom.php'); ?>
      </div>
</body>
</html>