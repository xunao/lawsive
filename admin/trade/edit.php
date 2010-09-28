<?php
	session_start();
	include_once('../../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title><?php echo $_g_sitename;?>发布交易</title>
	<?php 
		judge_admin();
		css_include_tag('admin/base','colorbox');
		use_jquery_ui();
		use_ckeditor();
		js_include_tag('category','jquery.colorbox','admin/trade/edit','pubfun');
		$id = intval($_GET['id']);
		$trade = new Table('trade');
		if($id){
			$trade = $trade->find($id);
			$trade_id = $trade->id;
		}
	?>
</head>
<body>
	<div id="icaption">
	    <div id="title">发布交易</div>
		  <a href="index.php" id="btn_back"></a>
	</div>
	<div id="itable">
		<form id="news_edit" action="edit.post.php" method="post"> 
		<table cellspacing="1" align="center">
			<tr class="tr4">
				<td class=td1 width="15%">交易名称</td>
				<td><input type="text" name="trade[trade_name]" id="trade_name" value="<?php echo strip_tags($trade->trade_name);?>"></td>
			</tr>
			<tr class="tr4">
				<td class=td1 width="15%">客户名称</td>
				<td><input type="text" name="trade[client]" id="trade_client" value="<?php echo strip_tags($trade->client);?>"></td>
			</tr>
			<tr class="tr4">
				<td class="td1">交易角色</td>
				<td> 
					<input type="text" name="trade[trade_role]" value="<?php echo strip_tags($trade->trade_role);?>">
				</td>
			</tr>
			<tr class="tr4">
				<td class="td1">交易类型</td>
				<td> 
					<input type="text" name="trade[trade_type]" value="<?php echo strip_tags($trade->trade_type);?>">
				</td>
			</tr>
			<tr class="tr4">
				<td class="td1">交易金额</td>
				<td><input type="text" name="trade[trade_value]" id="trade_trade_value" value="<?php echo strip_tags($trade->trade_value);?>"></input></td>
			</tr>
			<tr class="tr4">
				<td class="td1">适用的法律区域</td>
				<td><input type="text" name=trade[trade_area] id="trade_area"  class="number" value="<?php echo $trade->trade_area;?>"></td>
			</tr>
			<?php if($trade){?>
			<tr class="tr4">
				<td class="td1">创建日期</td>
				<td><?php echo substr($trade->created_at,0,10) ? substr($trade->created_at,0,10) :substr(now(),0,10);?></td>
			</tr>
			<?php }?>
			<tr class="tr4">
				<td class="td1">交易日期</td>
				<td><input readonly="readonly" type="text" name=trade[trade_at] id="trade_at"  class="number" value="<?php echo substr($trade->trade_at,0,10);?>"></td>
			</tr>	
			<tr class="tr4 normal trade_content">
				<td  class="td1">交易（客户角度）</td><td><?php show_fckeditor('trade[description1]','Admin',false,"100",$trade->description1);?></td>
			</tr>
			
			<tr class="tr4 normal trade_content">
				<td  class="td1">交易（律师角度）</td><td><?php show_fckeditor('trade[description2]','Admin',false,"215",$trade->description2);?></td>
			</tr>
			<tr class="tr4 normal trade_content">
				<td  class="td1">交易（第三方角度）</td><td><?php show_fckeditor('trade[description3]','Admin',false,"215",$trade->description3);?></td>
			</tr>
			<tr class="btools">
				<td colspan="2">
					<input id="button_submit" type="button" value="提交">
					<input type="hidden" name="trade[id]" id="category_id" value="<?php echo $trade->id;?>">
				</td>
			</tr>	
		</table>
		</form>
	</div>
</body>
</html>