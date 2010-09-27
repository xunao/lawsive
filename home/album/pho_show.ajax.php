				<?php 
					include ('../../frame.php');
					$cat_id = intval($_POST['cat_id']);
					$db=get_db();
					$user = member::current();
					if($cat_id !='0'){
						$photo = $db->query("select * from lawsive.member_photo where category_id='$cat_id' order by last_edit_at asc");
						$num = count($photo);
						$album = new Table('album');
						$album->find($cat_id);
					}
					$i = intval($_POST['i']);
					if(!$i){$i = 0;}
					if($num != 0){
				?>
					<div id="ps_t">
						<div id="ps_total">第<?php $t= $i+1 ;echo $t;?>/<?php echo $num;?>张</div>
						<input id="max" type="hidden" value="<?php echo $num?>" />
						<input id="cat_id" type="hidden" value="<?php echo $cat_id?>" />
						<input id="pho_id" type="hidden" value="<?php echo $photo[$i]->id;?>" />
						<?php if($user->id == $album->member_id){?>
				      	<div class="ps_work"><a href="pho_edit.php?pho_id=<?php echo $photo[$i]->id;?>">[编辑该相片]</a></div>
				      	<div class="ps_work"><a id="pho_del" href="#">[删除该相片]</a></div>
				      	<div class="ps_work"><a href="pho_edit.php">[添加新相片]</a></div>
				      	<?php }?>
				      	<div class="ps_work2" id="tr"><a id="up" href="">下一页</a></div>
				      	<div class="ps_work2" id="tr"><a id="down" href="">上一页</a></div>
		   			</div>
		      		<div id="imgbx">
		      			<img src="<?php echo $photo[$i]->src;?>" />
		      		</div>
		      		<div id="ps_t">
		      			<div class="ps_info">照片标题：<font><?php echo $photo[$i]->name;?></font></div>
		      			<div class="ps_info">所属专辑：<font><?php echo $album->name;?></font></div>
		      			<div class="ps_info" id="tr">最后更新于：<a href=""></a><?php echo $photo[$i]->last_edit_at;?></div>
		      		</div>
		      		<div id="ps_t">
		      			<div class="ps_des">照片描述：<?php echo htmlspecialchars($photo[$i]->description);?></div>
	      			</div>
	      			<div id="comment">
          				<div class="c_title" ><div class="c_t_n" ><font>访客评论</font><div class="c_t_b" style="width:510px;"></div></div></div>
          				<div id="good">赞</div>
						<div id="pub_comment_box">
						</div>
						<script type="text/javascript">
					 	pub_comment('member_photo',<?php echo $photo[0]->id;?>,'pub_comment_box');
						</script>
          			</div>
          			<?php }else{?>
          			<div class="al_bx">
          				<font>该专辑暂时没有相片！
          				<?php if($user->id == $album->member_id){?>
          					<br><a href="pho_edit.php">立刻添加新的照片！</a></font>
          				<?php }?>
          			</div>
          			<?php }?>
	      			<script type="text/javascript">
	      			$(function(){
	      				$('#up').click(function(e){
	      					e.preventDefault();
	      					var max = $('#max').val();
	      					var i = $('#test').val();
	      					i = ++i;
	      					if(i < max){
	      						next_image(i);
	      					}else{
	      						alert('这是最后一张了！');
	      						return false;
	      					}
	      				});
	      				$('#imgbx').find('img').click(function(){
	      					var max = $('#max').val();
	      					var i = $('#test').val();
	      					i = ++i;
	      					if(i < max){
	      						next_image(i);
	      					}else{
	      						alert('这是最后一张了！');
	      						return false;
	      					}
	      				});
	      				$('#down').click(function(e){
	      					e.preventDefault();
	      					var i = $('#test').val();
	      					i = i-1;
	      					if(i >-1){
	      						next_image(i);
	      					}else{
	      						alert('这是第一张了！');
	      						return false;
	      					}
	      				});
		      		});
	      			</script> 		