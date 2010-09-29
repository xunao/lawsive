<style>
	#right_lawyer{width:355px; }
	#right_lawyer #law_h{width:355px; height:24px; font-size:12px;  line-height:24px;  background:url("/images/index/lawyer_h.jpg"); color:white; margin-bottom:10px; }
	#right_lawyer #law_h a{color:white}
	#right_lawyer #law_h a:hover{color:black}
	#right_lawyer #law_h div{width:67px; height:24px; margin:0 2px;  color:white; text-align:center; font-weight:bold;}
	#right_lawyer #law_h div:hover{ background:url("/images/index/lawyer_h_q.jpg");  color:black}
	#right_lawyer .law_tt{margin:10px 20px 5px  10px; display:none;}
	#right_lawyer .lawyer1{width:325px; height:58px; line-height:52px; color:red; border-bottom:1px dotted #666666 ; }
	#right_lawyer .lawyer1 img{margin-left:10px; float:left; }
	#right_lawyer .lawyer_t{font-size:12px; line-height:20px; color:black; font-weight:bold; margin-left:5px; width:195px; }
	#right_lawyer .lawyer_s{font-size:12px; line-height:16px; color:#666666; margin-left:5px; width:195px; letter-spacing:0.2px; }
	#right_lawyer .lawyer_p{font-size:12px; line-height:20px; color:#666666; margin-left:8px; width:300px; letter-spacing:0.2px; }
	#right_lawyer .lawyer2{width:325px; height:25px; border-bottom:1px dotted #666666 ; margin-top:5px; }
	#right_lawyer .lawyer_c{width:16px; height:16px; background:url("/images/index/lawyer_c.jpg"); font-size:12px; line-height:16px; text-align:center; }
	.lawyer1 img{width:92px; height:52px;}
</style>
<div id="right_lawyer" class="border">
	<div id="law_h"><div ><a href="" >律师排行</a></div><div><a href="">律所排行</a></div><div><a href="">专业排行</a></div><div><a href="">最佳雇主</a></div><a href="" style="float:right">更多>></a></div>
	<?php for($j = 0 ; $j < 4 ; $j ++){?>
	<div id="law_tt_<?php echo $j;?>" class="law_tt">
		<div class="lawyer1" <?php $pos="index_desc_a_$j";show_page_pos($pos,'link_d_i');?>><div class="lawyer_c" style="margin-top:18px;">1</div><img src="<?php echo $pos_items[$pos]->image1;?>"><div class="lawyer_t"><a href="<?php echo $pos_items[$pos]->href;?>"><?php echo $pos_items[$pos]->title ?$pos_items[$pos]->title : '无信息';?></a></div><div class="lawyer_s"><a href="<?php echo $pos_items[$pos]->href;?>"><?php echo $pos_items[$pos]->description;?></a></div></div>
		<div class="lawyer2" <?php $pos="index_desc_b_$j";show_page_pos($pos,'link');?>><div class="lawyer_c" style="margin-top:2px;">2</div><div class="lawyer_p"><a href="<?php echo $pos_items[$pos]->href;?>"><?php echo $pos_items[$pos]->title ?$pos_items[$pos]->title : '无信息';?></a></div></div>
		<div class="lawyer2" <?php $pos="index_desc_c_$j";show_page_pos($pos,'link');?>><div class="lawyer_c" style="margin-top:2px;">3</div><div class="lawyer_p"><a href="<?php echo $pos_items[$pos]->href;?>"><?php echo $pos_items[$pos]->title ?$pos_items[$pos]->title : '无信息';?></a></div></div>
		<div class="lawyer2" <?php $pos="index_desc_d_$j";show_page_pos($pos,'link');?>><div class="lawyer_c" style="margin-top:2px;">4</div><div class="lawyer_p"><a href="<?php echo $pos_items[$pos]->href;?>"><?php echo $pos_items[$pos]->title ?$pos_items[$pos]->title : '无信息';?></a></div></div>
		<div class="lawyer2" <?php $pos="index_desc_e_$j";show_page_pos($pos,'link');?>><div class="lawyer_c" style="margin-top:2px;">5</div><div class="lawyer_p"><a href="<?php echo $pos_items[$pos]->href;?>"><?php echo $pos_items[$pos]->title ?$pos_items[$pos]->title : '无信息';?></a></div></div>
		<div class="lawyer2"  <?php $pos="index_desc_f_$j";show_page_pos($pos,'link');?>style="border:0px;"><div class="lawyer_c" style="margin-top:2px;">6</div><div class="lawyer_p"><a href="<?php echo $pos_items[$pos]->href;?>"><?php echo $pos_items[$pos]->title ?$pos_items[$pos]->title : '无信息';?></a></div></div>
	</div>
	<?php }?>
</div>