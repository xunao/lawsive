 <div id="bom_up">
                       <?php if($user == ''){?>
                              <div id="b_u_u">
			                                 <div class="t_l_r_c" >用户名：</div><div class="t_l_r_c"><input id="name1" type="text" name="login_name" size=10/></div>
			                                 <div class="t_l_r_c" >密码：</div><div class="t_l_r_c"><input id="password1" type="password" name="password"/></div>
			                                 <div class="t_l_r_c" id="login_btn0"><img src="/images/index/log_in.jpg" border=0/></div><div id="zhuce"><a href=""><font  color=#BBBBBB>注册</font></a></div>
                              </div>
                              <?php }else{?>
                              <div id="b_u_u">
								      <div class="t_l_r_c" >欢迎您，<?php $level = $user->member_level; if($level==1){echo '普通会员';}elseif($level==2){echo '二级会员';}elseif($level==3){echo '三级会员';}elseif($level==4){echo '四级会员';};?><?php if($user->name == ''){echo $user->name;}else{echo $user->login_name;} ;?></div>
									  <div class="t_l_r_c" >用户ID：<?php echo $user->id;?></div>
									  <div class="logout">退出登录</div>
								</div>
                              <?php }?>
                       <div id="b_u_d"><a href=""><font>关于律氏中文网</font></a>-<a href=""><font>动态新闻</font></a>-<a href=""><font>广告服务</font></a>-<a href=""><font>诚聘英才</font></a>-<a href=""><font>会员活动</font></a>-<a href=""><font>隐私声明</font></a>-<a href=""><font>网站声明</font></a>-<a href=""><font>联系我们</font></a></div>
             </div>
             <div id="bottom">
                     <div id="bom_down">
                              <div class="b_d"><a href="" class="b_d_h"><font>[动态]</font></a><br><a href=""><font>最新案件</font></a><br><a href=""><font>律所</font></a><br><a href=""><font>律师</font></a><br><a href=""><font>专题报道</font></a><br><a href=""><font>新闻</font></a></div>
                              <div class="b_d_x"></div><div class="b_d"><a href="" class="b_d_h"><font>[动态]</font></a><br><a href=""><font>最新案件</font></a><br><a href=""><font>律所</font></a><br><a href=""><font>律师</font></a><br><a href=""><font>专题报道</font></a><br><a href=""><font>新闻</font></a></div>
                              <div class="b_d_x"></div><div class="b_d"><a href="" class="b_d_h"><font>[动态]</font></a><br><a href=""><font>最新案件</font></a><br><a href=""><font>律所</font></a><br><a href=""><font>律师</font></a><br><a href=""><font>专题报道</font></a><br><a href=""><font>新闻</font></a></div>
                              <div class="b_d_x" ></div><div class="b_d"><a href="" class="b_d_h"><font>[动态]</font></a><br><a href=""><font>最新案件</font></a><br><a href=""><font>律所</font></a><br><a href=""><font>律师</font></a><br><a href=""><font>专题报道</font></a><br><a href=""><font>新闻</font></a></div>
                              <div class="b_d_x"></div><div class="b_d"><a href="" class="b_d_h"><font>[动态]</font></a><br><a href=""><font>最新案件</font></a><br><a href=""><font>律所</font></a><br><a href=""><font>律师</font></a><br><a href=""><font>专题报道</font></a><br><a href=""><font>新闻</font></a></div>
                              <div class="b_d_x"></div><div class="b_d"><a href="" class="b_d_h"><font>[动态]</font></a><br><a href=""><font>最新案件</font></a><br><a href=""><font>律所</font></a><br><a href=""><font>律师</font></a><br><a href=""><font>专题报道</font></a><br><a href=""><font>新闻</font></a></div>
                     </div>      
                     <div id="bottom1">电话：010-52550331 传真：010-51411547 E-mail：editor@legalweek.cn</div><div id="bottom2">ⓒCopyright 北京新华律讯商业咨询有限公司 2008</div><div id="bottom3">网络备案许可证：京ICP备09001622号</div>
            </div>       