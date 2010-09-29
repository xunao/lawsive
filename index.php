<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>律氏中文网</title>
<meta name="keywords" content="律氏" />
<meta name="description" content="律氏" />
<?php	
		include_once(dirname(__FILE__).'/frame.php');
		use_jquery_ui();
		css_include_tag('index','public','colorbox');
		js_include_tag('login','index','logout','jquery.colorbox-min');
		init_page_items('index');
		$user = member::current();
  	?>
<body>
      <div id="ibody">
              <?php include_once(dirname(__FILE__).'/inc/top.php'); ?>
              <div id="center">
                       <div id="center_l">
                                <div id="c_people">
                                        <div class="c_title" ><div class="c_t_n" ><font>本期人物</font><div class="c_t_b" style="width:450px;"></div><img src="/images/index/c_t_right.jpg"><img src="/images/index/c_t_left.jpg"></div></div>
                                        <div class='c_banner' <?php $pos="index_people";show_page_pos($pos,'index_people');?>>
	                                        <a href="">
	                                        	<img id="c_p_i"  src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/index/people.jpg';?>" border="0"></a>
	                                        <div id="c_p_r">
	                                                <div id="c_p_r_l">
				                                             <a href="<?php echo $pos_items[$pos]->href;?>" target="_blank"><font id="c_p_r_1" ><?php echo $pos_items[$pos]->description;?></font></a><font id="c_p_r_2"><?php echo $pos_items[$pos]->title;?>专访：</font><font  id="c_p_r_3"><?php echo $pos_items[$pos]->reserve1;?></font>
	<!--			                                             <font  id="c_p_r_4" >关键词： 个性 理想 专业</font>-->
				                                             <div  id="d_c_p_r_5" ><?php echo $pos_items[$pos]->reserve2;?></div>
				                                    </div>
	                                        </div>
                                        </div>
                                 </div>
                                 <div id="view">
                                         <div class="c_title"><div class="c_t_n" ><font>新闻·分析</font><div class="c_t_b" style="width:200px;"></div><img src="/images/index/c_t_right.jpg"><img src="/images/index/c_t_left.jpg"></div></div>
                                         <div class="v_c_b" <?php $pos="index_v_c_t_a";show_page_pos($pos,'link_t_d');?>><a href="<?php $pos_items[$pos]->href;?>"><font class="v_c_t_1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font></a><font color="red" class="l_add"></font><font class="v_c_t_2"><?php echo $pos_items[$pos]->description;?></font></div>
                                         <div class="v_c_b" <?php $pos="index_v_c_t_b";show_page_pos($pos,'link_t_d');?>><a href="<?php $pos_items[$pos]->href;?>"><font class="v_c_t_1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font></a><font color="red" class="l_add"></font><font class="v_c_t_2"><?php echo $pos_items[$pos]->description;?></font></div>
                                         <div class="v_c_b" <?php $pos="index_v_c_t_c";show_page_pos($pos,'link_t_d');?>><a href="<?php $pos_items[$pos]->href;?>"><font class="v_c_t_1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font></a><font color="red" class="l_add"></font><font class="v_c_t_2"><?php echo $pos_items[$pos]->description;?></font></div>
                                         <div class="v_c_b" <?php $pos="index_v_c_t_d";show_page_pos($pos,'link_t_d');?>><a href="<?php $pos_items[$pos]->href;?>"><font class="v_c_t_1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font></a><font color="red" class="l_add"></font><font class="v_c_t_2"><?php echo $pos_items[$pos]->description;?></font></div>
                                         <div class="v_c_b" <?php $pos="index_v_c_t_e";show_page_pos($pos,'link_t_d');?>><a href="<?php $pos_items[$pos]->href;?>"><font class="v_c_t_1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font></a><font color="red" class="l_add"></font><font class="v_c_t_2"><?php echo $pos_items[$pos]->description;?></font></div>
                                         <div class="v_c_b" <?php $pos="index_v_c_t_f";show_page_pos($pos,'link_t_d');?>><a href="<?php $pos_items[$pos]->href;?>"><font class="v_c_t_1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font></a><font color="red" class="l_add"></font><font class="v_c_t_2"><?php echo $pos_items[$pos]->description;?></font></div>
                                         <div class="v_c_b"  <?php $pos="index_v_c_t_g";show_page_pos($pos,'link_t_d');?>><a href="<?php $pos_items[$pos]->href;?>"><font class="v_c_t_1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font></a><font color="red" class="l_add"></font><font class="v_c_t_2"><?php echo $pos_items[$pos]->description;?></font></div>
                                 </div>
			                     <div id="change">
			                            <div class="c_title"><div class="c_t_n" ><font>观点·专栏</font><div class="c_t_b" style="width:60px;"></div><img src="/images/index/c_t_right.jpg"><img src="/images/index/c_t_left.jpg"></div></div>
                                        <div class="change_b">
									            <div class="change_t" <?php $pos="index_v_c_t_g_a";show_page_pos($pos,'index_column');?>><a href="<?php echo $pos_items[$pos]->href ;?>" ><font class="change_t1" ><?php echo $pos_items[$pos]->reserve1;?></font></a><font class="cha_tt" ><?php echo $pos_items[$pos]->title ?  $pos_items[$pos]->title : '无信息';?></font><img src="<?php echo $pos_items[$pos]->image1;?>" style="margin-right:5px; float:left;">
									            	<?php echo $pos_items[$pos]->description;?>
									            </div>
									             <div class="change_t" <?php $pos="index_v_c_t_g_b";show_page_pos($pos,'index_column');?>><a href="<?php echo $pos_items[$pos]->href ;?>" ><font class="change_t1" ><?php echo $pos_items[$pos]->reserve1;?></font></a><font class="cha_tt" ><?php echo $pos_items[$pos]->title ?  $pos_items[$pos]->title : '无信息';?></font><img src="<?php echo $pos_items[$pos]->image1;?>" style="margin-right:5px; float:left;">
									            	<?php echo $pos_items[$pos]->description;?>
									            </div>
									            <div class="change_t" <?php $pos="index_v_c_t_g_c";show_page_pos($pos,'index_column');?>><a href="<?php echo $pos_items[$pos]->href ;?>" ><font class="change_t1" ><?php echo $pos_items[$pos]->reserve1;?></font></a><font class="cha_tt" ><?php echo $pos_items[$pos]->title ?  $pos_items[$pos]->title : '无信息';?></font><img src="<?php echo $pos_items[$pos]->image1;?>" style="margin-right:5px; float:left;">
									            	<?php echo $pos_items[$pos]->description;?>
									            </div>
						                </div>
						                <div class="change_t" <?php $pos="index_v_c_t_g_d";show_page_pos($pos,'index_column');?>><a href="<?php echo $pos_items[$pos]->href ;?>" ><font class="change_t1" ><?php echo $pos_items[$pos]->reserve1;?></font></a><font class="cha_tt" ><?php echo $pos_items[$pos]->title ?  $pos_items[$pos]->title : '无信息';?></font><img src="<?php echo $pos_items[$pos]->image1;?>" style="margin-right:5px; float:left;">
									            	<?php echo $pos_items[$pos]->description;?>
									     </div>
									     <div class="change_t" <?php $pos="index_v_c_t_g_e";show_page_pos($pos,'index_column');?>><a href="<?php echo $pos_items[$pos]->href ;?>" ><font class="change_t1" ><?php echo $pos_items[$pos]->reserve1;?></font></a><font class="cha_tt" ><?php echo $pos_items[$pos]->title ?  $pos_items[$pos]->title : '无信息';?></font><img src="<?php echo $pos_items[$pos]->image1;?>" style="margin-right:5px; float:left;">
									            	<?php echo $pos_items[$pos]->description;?>
							            </div>
						         </div>
						         <div id="lecture">
						                 <div class="c_title"><div class="c_t_n" ><font>在线调查</font><div class="c_t_b" style="width:260px;"></div></div></div>
						                 <div id="s_l" >
						                        <font>―北大教授力挺郭德纲，赞其是民族英雄，你认为？</font>
					                            <form action = "http://www.blabla.cn/asdocs/html_tutorials/choose.asp" method = "post">
					                                    <div> <input type="radio" name="fruit" value = "vote">支持</div><div><input type="radio" name="fruit" value = "against">反对</div><div><input type="radio" name="fruit" value = "nothing">无所谓了</div>
					                                    <div id="s_l_i" style="width:210px;"><a href=""><img src="/images/index/talk_t.jpg" border="0"></a><a href=""><img src="/images/index/talk_s.jpg" border="0"></a></div> 
												</form>
												<div><a href=""><font>更多律师调查&gt;&gt;</font></a></div>
										 </div>
						         </div>
                                 <div id="award"  <?php $pos="index_hr_image";show_page_pos($pos,'link_i');?>><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/index/award_p.jpg';?>" border="0"></a></div>
		                         <div id="column">
		                                 <div class="c_title"><div class="c_t_n" ><font>专栏</font><div class="c_t_b" style="width:485px;"></div><img src="/images/index/c_t_right.jpg"><img src="/images/index/c_t_left.jpg"></div></div>
		                                 <div id="column_c">
						                       <div class="column_d" <?php $pos="index_bot_people_a";show_page_pos($pos,'pg');?>><font class="column_d_h"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font><img src="<?php echo $pos_items[$pos]->image1?>"><div class="v_c_t"><font class="column_d_h"><?php echo $pos_items[$pos]->title;?></font><font class="v_c_t_2"><?php echo $pos_items[$pos]->description;?></font></div> </div>  
						                       <div class="column_d" <?php $pos="index_bot_people_b";show_page_pos($pos,'pg');?>><font class="column_d_h"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font><img src="<?php echo $pos_items[$pos]->image1?>"><div class="v_c_t"><font class="column_d_h"><?php echo $pos_items[$pos]->title;?></font><font class="v_c_t_2"><?php echo $pos_items[$pos]->description;?></font></div> </div>
						                       <div class="column_d" <?php $pos="index_bot_people_c";show_page_pos($pos,'pg');?>><font class="column_d_h"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font><img src="<?php echo $pos_items[$pos]->image1?>"><div class="v_c_t"><font class="column_d_h"><?php echo $pos_items[$pos]->title;?></font><font class="v_c_t_2"><?php echo $pos_items[$pos]->description;?></font></div> </div>
		                                 </div>
		                         </div>
		                         <div class="talk">
		                                <div class="talk_t">
		                                       <div class="c_title"><div class="c_t_n" ><font>高端访谈</font><div class="c_t_b" style="width:145px;"></div><img src="/images/index/c_t_right.jpg"><img src="/images/index/c_t_left.jpg"></div></div>
		                                       <div class="talk_c" <?php $pos="index_b_people_a";show_page_pos($pos,'pg');?>><img src="<?php echo $pos_items[$pos]->image1;?>"><div class="talk1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></div><div class="talk2"><?php echo $pos_items[$pos]->description;?></div></div>
		                                       <div class="talk_c" <?php $pos="index_b_people_b";show_page_pos($pos,'pg');?>><img src="<?php echo $pos_items[$pos]->image1;?>"><div class="talk1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></div><div class="talk2"><?php echo $pos_items[$pos]->description;?></div></div>
		                                       <div class="talk_c" <?php $pos="index_b_people_c";show_page_pos($pos,'pg');?>><img src="<?php echo $pos_items[$pos]->image1;?>"><div class="talk1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></div><div class="talk2"><?php echo $pos_items[$pos]->description;?></div></div>
		                                </div>
		                                <div class="talk_t" style="float:right">
		                                       <div class="c_title"><div class="c_t_n" ><font>青年律师</font><div class="c_t_b" style="width:145px;"></div><img src="/images/index/c_t_right.jpg"><img src="/images/index/c_t_left.jpg"></div> </div>
		                                       <div class="talk_c" <?php $pos="index_b_people_d";show_page_pos($pos,'pg');?>><img src="<?php echo $pos_items[$pos]->image1;?>"><div class="talk1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></div><div class="talk2"><?php echo $pos_items[$pos]->description;?></div></div>
		                                       <div class="talk_c" <?php $pos="index_b_people_e";show_page_pos($pos,'pg');?>><img src="<?php echo $pos_items[$pos]->image1;?>"><div class="talk1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></div><div class="talk2"><?php echo $pos_items[$pos]->description;?></div></div>
		                                       <div class="talk_c" <?php $pos="index_b_people_f";show_page_pos($pos,'pg');?>><img src="<?php echo $pos_items[$pos]->image1;?>"><div class="talk1"><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></div><div class="talk2"><?php echo $pos_items[$pos]->description;?></div></div>
		                                </div> 
		                         </div>
		                         <div class="ylawyer">
		                                <div class="ylaw">
		                                      <div class="c_title">
		                                      	<div class="c_t_n"   <?php $pos="index_aa";show_page_pos($pos,'link');?>><font><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font>
		                                      	<div class="c_t_b" style="width:145px;"></div>
		                                      		<img src="/images/index/c_t_right.jpg">
		                                      		<img src="/images/index/c_t_left.jpg">
		                                      	</div>
		                                      </div>
		                                      <div class="ylaw1"  <?php $pos="index_a";show_page_pos($pos,'pg');?>>
		                                      	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      	<img src="<?php echo $pos_items[$pos]->image1;?>" style="width:73px; height:74px;">
		                                      	<div class="ylaw2"><?php echo $pos_items[$pos]->description;?></div>
		                                      <div class="c_p_r_r" <?php $pos="index_a_a";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      <div class="c_p_r_r" <?php $pos="index_a_b";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                       <div class="c_p_r_r" <?php $pos="index_a_c";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                </div>
		                                <div class="ylaw" style="float:right">
                                              <div class="c_title">
	                                              	<div class="c_t_n"   <?php $pos="index_bb";show_page_pos($pos,'link');?>><font><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font>
	                                              	<div class="c_t_b" style="width:145px;"></div>
	                                              		<img src="/images/index/c_t_right.jpg">
	                                              		<img src="/images/index/c_t_left.jpg">
	                                              	</div>
												</div>
                                             <div class="ylaw1"  <?php $pos="index_b";show_page_pos($pos,'pg');?>>
		                                      	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      <img src="<?php echo $pos_items[$pos]->image1;?>" style="width:73px; height:74px;">
	                                      		<div class="ylaw2"><?php echo $pos_items[$pos]->description;?></div>
                                              <div class="c_p_r_r" <?php $pos="index_b_a";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      <div class="c_p_r_r" <?php $pos="index_b_b";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                       <div class="c_p_r_r" <?php $pos="index_b_c";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                </div>
		                         </div>
		                         <div class="ylawyer">
		                               <div class="ylaw">
                                              <div class="c_title">
	                                              	<div class="c_t_n"   <?php $pos="index_cc";show_page_pos($pos,'link');?>><font><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font>
	                                              	<div class="c_t_b" style="width:145px;"></div>
	                                              		<img src="/images/index/c_t_right.jpg">
	                                              		<img src="/images/index/c_t_left.jpg">
	                                              	</div>
												</div>
                                             <div class="ylaw1"  <?php $pos="index_c";show_page_pos($pos,'pg');?>>
		                                      	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      <img src="<?php echo $pos_items[$pos]->image1;?>" style="width:73px; height:74px;">
	                                      		<div class="ylaw2"><?php echo $pos_items[$pos]->description;?></div>
                                              <div class="c_p_r_r" <?php $pos="index_c_a";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      <div class="c_p_r_r" <?php $pos="index_c_b";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                       <div class="c_p_r_r" <?php $pos="index_c_c";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                </div>
		                               <div class="ylaw" style="float:right">
                                              <div class="c_title">
	                                              	<div class="c_t_n"   <?php $pos="index_dd";show_page_pos($pos,'link');?>><font><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font>
	                                              	<div class="c_t_b" style="width:145px;"></div>
	                                              		<img src="/images/index/c_t_right.jpg">
	                                              		<img src="/images/index/c_t_left.jpg">
	                                              	</div>
												</div>
                                             <div class="ylaw1"  <?php $pos="index_d";show_page_pos($pos,'pg');?>>
		                                      	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      <img src="<?php echo $pos_items[$pos]->image1;?>" style="width:73px; height:74px;">
	                                      		<div class="ylaw2"><?php echo $pos_items[$pos]->description;?></div>
                                              <div class="c_p_r_r" <?php $pos="index_d_a";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      <div class="c_p_r_r" <?php $pos="index_d_b";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                       <div class="c_p_r_r" <?php $pos="index_d_c";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                </div>
		                         </div>
		                         <div class="ylawyer">
		                                <div class="ylaw">
                                              <div class="c_title">
	                                              	<div class="c_t_n"   <?php $pos="index_ee";show_page_pos($pos,'link');?>><font><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font>
	                                              	<div class="c_t_b" style="width:145px;"></div>
	                                              		<img src="/images/index/c_t_right.jpg">
	                                              		<img src="/images/index/c_t_left.jpg">
	                                              	</div>
												</div>
                                             <div class="ylaw1"  <?php $pos="index_e";show_page_pos($pos,'pg');?>>
		                                      	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      <img src="<?php echo $pos_items[$pos]->image1;?>" style="width:73px; height:74px;">
	                                      		<div class="ylaw2"><?php echo $pos_items[$pos]->description;?></div>
                                              <div class="c_p_r_r" <?php $pos="index_e_a";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      <div class="c_p_r_r" <?php $pos="index_e_b";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                       <div class="c_p_r_r" <?php $pos="index_e_c";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                </div>
		                                <div class="ylaw" style="float:right">
                                              <div class="c_title">
	                                              	<div class="c_t_n"   <?php $pos="index_ff";show_page_pos($pos,'link');?>><font><?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?></font>
	                                              	<div class="c_t_b" style="width:145px;"></div>
	                                              		<img src="/images/index/c_t_right.jpg">
	                                              		<img src="/images/index/c_t_left.jpg">
	                                              	</div>
												</div>
                                             <div class="ylaw1"  <?php $pos="index_f";show_page_pos($pos,'pg');?>>
		                                      	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      <img src="<?php echo $pos_items[$pos]->image1;?>" style="width:73px; height:74px;">
	                                      		<div class="ylaw2"><?php echo $pos_items[$pos]->description;?></div>
                                              <div class="c_p_r_r" <?php $pos="index_f_a";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                      <div class="c_p_r_r" <?php $pos="index_f_b";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                       <div class="c_p_r_r" <?php $pos="index_f_c";show_page_pos($pos,'link');?>>
		                                      		<font class="point">·</font>	<?php echo $pos_items[$pos]->title ? $pos_items[$pos]->title : '无信息';?>
		                                      </div>
		                                </div>
		                         </div>
                       </div>
                       <div id="center_r">
                       	<?php 
                       		include(ROOT_DIR.'/inc/right/right_add.php');
							include(ROOT_DIR.'/inc/right/right_lawyer.php');
							include(ROOT_DIR.'/inc/right/right_rss.php');
							include(ROOT_DIR.'/inc/right/right_hot.php');
							include(ROOT_DIR.'/inc/right/right_expert.php');
							include(ROOT_DIR.'/inc/right/right_rank.php');
                       	?>
                       </div>
                       <div id="cl_ad" <?php $pos="index_link_i";show_page_pos($pos,'link_i');?>><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/index/cl_ad.jpg';?>" border=0></a></div>
             </div>
             <div id="logout"></div>
            <?php include_once(dirname(__FILE__).'/inc/bottom.php'); ?>       
      </div>
</body>
</html>