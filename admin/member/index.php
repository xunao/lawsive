<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php 
		session_start();
		include_once('../../frame.php')
	?>
	<title><?php echo $_g_site_name;?>前台用户管理</title>
	<?php
		css_include_tag('admin/base');
		use_jquery();
		use_jquery_ui();
		js_include_tag('admin/member/index');
		$filter_search = urldecode($_GET['filter_search']);
		$base_info =isset($_GET['base_info']) ?  intval($_GET['base_info']): -1;
		$member_resume =isset($_GET['member_resume']) ?  intval($_GET['member_resume']): -1;
		$member_level =isset($_GET['member_level']) ?  intval($_GET['member_level']): -1;
		$conditions = array();
		if($filter_search != ''){
			$conditions[] = "(login_name like '%$filter_search%' or name like '%$filter_search%' or email like '%$filter_search%')";
		}
		if($member_level != -1){
			$conditions[] = "member_level = $member_level";
		}
		if($member_resume != -1){
			if($member_resume != 0){
				$conditions[] = "member_resume_id != 0";
			}else{$conditions[] = "member_resume_id = 0";}
		}
		if($base_info != -1){
			if($base_info != 0){
			$conditions[] = "base_info_id != '0'";
		}else{$conditions[] = "base_info_id = '0'";}
		}
		$member = new Table("member");
		$record = $member->paginate('all',array('conditions' => join(' and ', $conditions)),30);
		if($member == false) die('数据库执行失败');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>前台用户管理</div>
	  <a href="edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id="filter_search" type="text" value="<?php echo $filter_search;?>">
		<select id="member_level" style="width:90px" class="sau_search">
				<option value="-1">会员等级</option>
				<option value="1">一级</option>
				<option value="2">二级</option>
				<option value="3">三级</option>
				<option value="4">四级</option>
		</select>
		<select id="member_resume" style="width:90px" class="sau_search">
				<option value="-1">简历状态</option>
				<option value="1">已填写</option>
				<option value="0">未填写</option>
		</select>
		<select id="base_info" style="width:90px" class="sau_search">
				<option value="-1">资料状态</option>
				<option value="1">已填写</option>
				<option value="0">未填写</option>
		</select>
		<script type="text/javascript">
			$('#member_level').val('<?php echo $member_level;?>');
			$('#member_resume').val('<?php echo $member_resume;?>');
			$('#base_info').val('<?php echo $base_info;?>');
		</script>
		<input type="button" value="搜索" id="search_button">
		<input type="hidden" id="filter_category" value="<?php echo $filter_category;?>" />
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="15%">登录名</td><td width="15%">姓名</td><td width="15%">会员等级</td><td width="10%">简历状态</td><td width="10%">资料状态</td><td width="5%">用户项目</td><td width="15%">最后登录时间</td><td width="15%">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
		<tr class=tr3 id=<?php echo $record[$i]->id;?> >
			<td style="text-align:left; text-indent:12px;"><?php echo strip_tags($record[$i]->login_name);?></td>
			<td><?php echo $record[$i]->name;?></td>
			<td><?php $level=$record[$i]->member_level; if($level==1){echo '普通会员';}elseif($level==2){echo '二级会员';}elseif($level==3){echo '三级会员';}elseif($level==4){echo '四级会员';};?></td>
			
			<td><?php if($record[$i]->member_resume_id == '0'){echo '无';}else{echo "<a href='resume_edit.php?id=".$record[$i]->id."'>编辑<a>";}?></td>
			<td><?php if($record[$i]->base_info_id == '0'){echo '无';}else{echo "<a href='info_edit.php?id=".$record[$i]->id."'>编辑<a>";}?></td>
			<td><a href="/admin/project/index.php?member_id=<?php echo $record[$i]->id; ?>">查看</a></td>
			<td><?php echo $record[$i]->last_login_time;?></td>
			<td><a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
			<span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
			<input type="hidden" class="priority"  name="<?php echo $record[$i]->id;?>"  value="" style="width:40px;">
			</td>
		</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
			</td>
		</tr>
  </table>
</div>	
</body>
</html>