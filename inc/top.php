<div id="title">
                    <div id="title_ad"><a href=""><img src="/images/index/title_ad.jpg" border="0"></a></div>
                    <div id="title_log">
                              <div id="t_l_l"></div><div id="t_l_c"><a href=""><font>咨询</font></a><font>|</font><a href=""><font>中文网</font></a><font>|</font><a href=""><font>法学院</font></a><font>|</font><a href=""><font>个人服务</font></a></div>
                              <?php if($user == ''){?>
                              <div id="t_l_r">
			                                 <div class="t_l_r_c" >用户名：</div><div class="t_l_r_c"><input id="login_name" type="text" name="login_name" size=10/></div>
			                                 <div class="t_l_r_c" >密码：</div><div class="t_l_r_c"><input id="password" type="password" name="password"/></div>
			                                 <div class="t_l_r_c" id="login_btn0"><img src="/images/index/log_in.jpg" border=0/></div><div id="zhuce"><a href=""><font  color=#BBBBBB>注册</font></a></div>
                              </div>
                              <?php }else{?>
                              <div id="t_l_r">
								      <div class="t_l_r_c" >欢迎您，<?php $level = $user->member_level; if($level==1){echo '普通会员';}elseif($level==2){echo '二级会员';}elseif($level==3){echo '三级会员';}elseif($level==4){echo '四级会员';};?><?php if($user->name == ''){echo $user->name;}else{echo $user->login_name;} ;?></div>
									  <div class="t_l_r_c" >用户ID：<?php echo $user->id;?></div>
									  <div class="logout">退出登录</div>
								</div>
                              <?php }?>
                     </div>
                     <div id="title_b">
                             <div id="logo"><a href=""><img src="/images/index/logo_lawsive.jpg" border="0"></a></div>
                             <div id="people">
	                                 <div id="people_t"><div>>人物专栏</div><div class="people_t_r"><img src="/images/index/people_t_r.jpg"></div><div class="people_t_r"><img src="/images/index/people_t_l.jpg"></div></div>
	                                 <div id="people_j"><div id="people_j_t">日本地产商觊觎中国市场</div><a href=""><font>他们认为，自己在经验和声誉上具有相对的优势，他们认为，自己在经验和声誉上具有</font></a></div>
	                                 <div id="people_a"><a href=""><img src="/images/index/jp_ad.jpg" border="0"></a></div>
                              </div>
                              <div id="mes">
                                     <div id="mes_up">
                                           <div id="mes_u_f">会员信息：</div><div style="width:230px;"><div><a href="" ><font color="#D7D7D7">中国东方集团将发行美元债发行美元债</font></a></div>
		                                   <div style="margin:10px 0 0 0;width:100%;"><a href="" ><font color="#D7D7D7">中国东方集团将发行美元债发行美元债</font></a></div></div>
                                     </div>  
                                     <div id="mes_c"><font style="color:white;">文章</font><font>|</font><font>日期</font></div>
                                     <div id="mes_down">
                                           <div id="search"><input type="text" name="search" ></div><div id="search_add"><button type="submit"></button></div>
                                           <div id="search_r"><a href="#"><img src="/images/index/search_r.jpg" border="0"/></a></div>
                                     </div>
                              </div> 
                     </div>
                     <div id="head">
				            <div id="head_l">
				                     <div id="head_l_l"><a href="" style="margin-left:25px">首页</a><a href="">动态</a><a href="">人物</a><a href="">观点</a><a href="">
				                     专家库</a><a href="">专业</a><a href="">会议</a><a href="">职位</a><a href="">研究中心</a><a href="">法学院</a><a href="">订阅</a><a href="">榜单</a><a href="">会员</a><a href="">律所</a></div>
				            </div>
				            <div id="head_r"><a href="">我的律氏</a></div>
                     </div>
                     <div id="center_h"><a href="" >交易</a>|<a href="">律所</a>|<a href="">律师</a>|<a href="">媒体</a>|<a href="">专题报道</a>|<a href="">新闻</a></div>
              </div>