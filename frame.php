<?php	
	define("ROOT_DIR",dirname(__FILE__));
	define('LIB_DIR',ROOT_DIR . "/lib");
	define('INC_DIR',ROOT_DIR ."/inc");
	define('PROJECT_LIB_DIR', ROOT_DIR . "/project_lib");
	define("FRAME_VERSION",'1.0');
	include_once ROOT_DIR .'/config/config.php';
	include_once LIB_DIR ."/pubfun.php";
	include_once ROOT_DIR .'/lib/Category.class.php';
	global $_g_admin_dir;
	define('ADMIN_DIR',ROOT_DIR ."/".$_g_admin_dir);
	define('ADMIN_PATH',"/{$_g_admin_dir}");
	if(file_exists(PROJECT_LIB_DIR ."/project_pubfun.php")){
		require_once PROJECT_LIB_DIR ."/project_pubfun.php";
	}
	
	function __autoload($class_name){
		if(file_exists(PROJECT_LIB_DIR .'/ActiveRecord/' . $class_name .'.class.php')){
			require_once PROJECT_LIB_DIR .'/ActiveRecord/' . $class_name .'.class.php';
			return ;
		}
		if(file_exists(LIB_DIR .'/' . $class_name .'.class.php')){
			require_once LIB_DIR .'/' . $class_name .'.class.php';
			return ;
		}
		if(file_exists(PROJECT_LIB_DIR .'/' . $class_name .'.class.php')){
			require_once PROJECT_LIB_DIR .'/' . $class_name .'.class.php';
			return ;
		}
	}
	
	function &get_db() {
		global $_g_db;		
		if(!is_object($_g_db)){
			$_g_db = new DataBase();
		}
		if($_g_db->connected) return $_g_db;
		global $_g_db_server;
		global $_g_db_user;
		global $_g_db_database;
		global $_g_db_password;
		global $_g_db_code;
		
		$_g_db->connect($_g_db_server,$_g_db_database,$_g_db_user,$_g_db_password,$_g_db_code);		
		return $_g_db;
	}
	
	function close_db() {
		$db = &get_db();
		$db->close();
	}
	
	function use_jquery(){
		js_include_once_tag('jquery');
	}
	
	function use_jquery_ui(){
		js_include_once_tag('jquery');
		js_include_once_tag('jquery-ui');
		css_include_tag('jquery_ui');
	}
	
	function use_ckeditor(){
		include_once(ROOT_DIR . '/ckeditor/ckeditor_php5.php');
		include_once(ROOT_DIR . '/ckfinder/ckfinder.php');
		echo '<script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>';
	}
	
	function js_include_tag($js){
		if (func_num_args()>1) {
			foreach (func_get_args() as $v){
				js_include_tag($v);
			}
			return ;
		}
		$js = _get_js_file($js);
		echo '<script type="text/javascript" language="javascript" src="' .$js .'"></script>';		
	}
	function _get_js_file($js){
		if (strtolower($js) == "default") {
			return ROOT_PATH ."javascript/jquery.js";	
		}else {
			$ljs = strtolower($js);
			if (strpos($ljs, "http://") !== false || strpos($ljs,"www.") !== false) {	
				return $js;
			}else {
				if (substr($ljs,-3) == ".js"){$js = substr_replace($js,"",-3);}			
				return  ROOT_PATH ."javascript/" .$js .".js";			
			}
		}
	}
#only include once
	function js_include_once_tag($js){
		global $loaded_js;
		if (empty($loaded_js)){
			$loaded_js = array();
		}
		if (func_num_args()>1) {
			foreach (func_get_args() as $v){
				js_include_once_tag($v);
			}
			return ;
		}
		$js_name = _get_js_file($js);
		if (in_array($js_name,$loaded_js,false)) {
			return ;
		}else {
			$loaded_js[] = $js_name;
			js_include_tag($js);
		}
	}
	
	function css_include_tag($filename){
		if (func_num_args()>1) {
			foreach (func_get_args() as $v){
				css_include_tag($v);
			}
			return ;
		}
		$css_name = _get_css_file($filename);	
		echo '<link href="' .$css_name .'" rel="stylesheet" type="text/css">';	
	}
	
	function _get_css_file($filename){
		$ljs = strtolower($filename);
		if (strpos($ljs, "http://") !== false || strpos($ljs,"www.") !== false) {	
			return $ljs;				
		}else {
			if (substr($ljs,-4) == ".css"){$filename = substr_replace($filename,"",-4);}			
			$ljs = ROOT_PATH ."css/" .$filename .".css";			
		}
		return $ljs;
	}
	
	function css_include_once_tag($filename){
		global $loaded_css;
		if (empty($loaded_css)){
			$loaded_css = array();
		}
		if (func_num_args()>1) {
			foreach (func_get_args() as $v){
				css_include_once_tag($v);
			}
			return ;
		}
		$f = _get_css_file($filename);
		if (in_array($f,$loaded_css,false)) {	
			return ;	
		}else {
			$loaded_css[] = $f;
			css_include_tag($filename);
		}
	}	
	

	function judge_role(){
		return require_role('admin');
	}
	
	function show_fckeditor($name,$toolbarset='Admin',$expand_toolbar=true,$height="200",$value="",$width = null) {
		$editor = new CKEditor(ROOT_DIR . '/ckeditor');
		$editor->config['toolbar'] = $toolbarset;
		$editor->config['toolbarStartupExpanded'] = $expand_toolbar;
		$editor->config['height'] = $height;
		CKFinder::SetupCKEditor($editor, '/ckfinder/');
		if($width){
			$editor->config['width'] = $width;
		}
		$editor->editor($name,$value);
	}

function get_page_url($url,$page,$token,$type='normal'){
	switch ($type){
		case 'normal':
			strpos($url, '?') === false && $url .= "?";
			$query = $_SERVER['QUERY_STRING'];
			$pattern = '/(&?' .$token.'=\d*)/';
			$query = preg_replace($pattern, '', $query);
			$query = $query ? $query ."&".$token ."={$page}" : $token ."={$page}" ;
			
			return substr($url, -1)=='?' ? $url ."{$query}" : $url ."&{$query}" ;				
			break;
		case 'fake_static': //伪静态方式，在url后添加/page/2方式；
			$pattern = '/\/'.$token .'\/\d*\/?$/';
			$url = preg_replace($pattern, '',$url);
			return $url ."/". $token ."/{$page}";
			break;
		case 'static': //静态方式，类似00213_2.shtml
			$pattern = '/(\.[^\/]*)$/';
			$ret = $page == 1 ? $url :preg_replace($pattern, "_$page$1", $url);
			return $ret;
			break;
		default:
			break;
	}
}
	
function paginate($url="",$ajax_dom=null,$page_var="page",$force_show = false,$type='normal',$show_type=1)
{
	global $page_type;
	$pageindextoken = empty($page_var) ? "page" : $page_var;
	$record_count_token = $pageindextoken . "_record_count";	

	$pagecounttoken = $pageindextoken . "_page_count";

	global $$pagecounttoken;
	global $$record_count_token;
	$pageindex = isset($_REQUEST[$pageindextoken]) ? $_REQUEST[$pageindextoken] : 1;
	$pagecount = isset($_REQUEST[$pagecounttoken]) ? $_REQUEST[$pagecounttoken] : $$pagecounttoken;
	if ($pagecount <= 1 && !$force_show) return;
	if(empty($url)){
		$url = $_SERVER['PHP_SELF'] ."?";
	}
	$pagefirst = get_page_url($url, 1, $page_var,$type);
	$pagenext = get_page_url($url, $pageindex + 1, $page_var,$type);
	$pageprev = get_page_url($url, $pageindex-1, $page_var,$type);
	$pagelast = get_page_url($url, $pagecount, $page_var,$type);
	
	if($show_type==1){
		
		if ($pageindex == 1)
		{?>
		  <span>[首页]</span> 
		  <span>[上页]</span>	
		  <?php 
		  	if($pagecount > 1){
		  ?>
		  <span><a class="paginate_link" href="<?php echo $pagenext; ?>">[下页]</a></span> 
		  <span><a class="paginate_link" href="<?php echo $pagelast; ?>">[尾页]</a></span>
		  <?php }else{?>
		  <span>[下页]</span> 
		  <span>[尾页]</span>		  
		<?php	
		  }
		}
		if ($pageindex < $pagecount && $pageindex > 1 )
		{?>
		  <span><a class="paginate_link" href="<?php echo $pagefirst; ?>">[首页]</a></span> 
		  <span><a class="paginate_link" href="<?php echo $pageprev; ?>">[上页]</a></span>			
		  <span><a class="paginate_link" href="<?php echo $pagenext; ?>">[下页]</a></span> 
		  <span><a class="paginate_link" href="<?php echo $pagelast; ?>">[尾页]</a></span>		
		 <?php
		}
		if ($pageindex == $pagecount && $pageindex != 1)
		{?>
		  <span><a class="paginate_link" href="<?php echo $pagefirst; ?>">[首页]</a></span> 
		  <span><a class="paginate_link" href="<?php echo $pageprev; ?>">[上页]</a></span>
		  <span>[下页]</span> 
		  <span>[尾页]</span>	  		
		<?php	
		}
		?>共找到<?php echo $$record_count_token; ?>条记录　
	  当前第<select name="pageselect" class="pageselect">
		<?php	
		//产生所有页面链接
		for($i=1;$i<=$pagecount;$i++){ 
			$ourl = get_page_url($url, $i, $page_var,$type);
		?>
			<option <?php if($pageindex== $i) echo 'selected="selected"';?> value="<?php echo $ourl;?>" ><?php echo $i;?></option>
			<?php
		}
		?>
		</select>页　共<?php echo $pagecount;?>页
		<script>
			$('.pageselect').change(function(){
				var ourl = $(this).val();
				<?php 
					if($ajax_dom){
						echo "$('#{$ajax_dom}').load(ourl)";
					}else{ 
						echo "window.location.href=ourl;";
					}
				?>
			}); 
		</script>
		
		<?php
		if(!empty($ajax_dom)){
			?>
			<script>
				$(".paginate_link").click(function(e){
					e.preventDefault();
					$("#<?php echo $ajax_dom;?>").load($(this).attr('href'));
				});
			</script>
			<?php
		}
	}else if($show_type==2){
		//文章翻页样式,只有上页 下页 和中间的
		if($pageindex == 1){
			echo "<span class='paginate_botton'>上页</span>";
		}else {
			$turl = get_page_url($url, $pageindex-1, $page_var,$type);
			echo "<span class='paginate_botton'><a href='$turl'>上页</a></span>";
		}
		for($i=1;$i<=$pagecount;$i++){
			if($i==$pageindex){	
				echo "<span class='page_span2'>{$i}</span>";
			}else{
				$turl = get_page_url($url, $i, $page_var,$type);
				echo "<span class='page_span'><a href='$turl'>$i</a></span>";
			}
		}
		if($pageindex == $pagecount){
			echo "<span class='paginate_botton'>下页</span>";
		}else {
			$turl = get_page_url($url, $pageindex+1, $page_var,$type);
			echo "<span class='paginate_botton'><a href='$turl'>下页</a></span>";
		}
	}
}

function redirect_login($type='js',$referer=true){
	$url = '/admin/login.php';
	if($referer){
		$url .= '?last_url=' .get_current_url();		
	}
	redirect($url,$type);	
}

function require_role($role='member'){
	if(empty($_SESSION[role_name])){
		redirect_login();
		die();
	}	
}

function role_name(){
	return $_SESSION[role_name];
};

function has_right($right_name){
	return @in_array($right_name,$_SESSION['admin_menu_rights']) || @in_array($right_name,$_SESSION['admin_system_rights']);
}

function role_include($file, $role='member'){
	if ($_SESSION['role_name'] == $role){
		include($file);
	}
}

function require_login($type="redirect"){
	if($_COOKIE['cache_name']){
		return true;
	}
	if($type == 'redirect'){
		$url = '/login/?last_url=' . get_current_url();
		redirect($url);		
	}else{
		return false;
	}
}

function search_content($key,$table_name='news',$conditions=null,$page_count = 10, $order='',$full_text=false){
	$db = &get_db();
	if($key){
		$change = array('('=>'\(',')' => '\)');
		strtr($key,$change);
		$key = str_replace('　', ' ', $key);
		$key = str_replace(',', ' ', $key);
		$key = explode(' ',$key);	
		$len = count($key);
		for($i=0;$i<$len;$i++){
			$key[$i] = "({$key[$i]})+";
		}
		$key = implode('|',$key);
	}
	$sql = "select * from {$table_name} where language_tag = 0 ";
	if($conditions){
		$sql .= " and {$conditions}";
	}
	if($key){
		$sql .= " and (title regexp '{$key}' or short_title regexp '{$key}' or keywords regexp '{$key}'";
		if($full_text){
			$sql .= " or content regexp '{$key}'";
		}
		$sql .= ")";
	}
	if( $order ){
		$sql .= " order by " .$order;
	}
	if($page_count > 0){
		return $db->paginate($sql,$page_count);	
	}else{
		return $db->query($sql);
	}
}

function write_log($msg){
	global $g_log_dir;
	if(empty($g_log_dir)){
		return;
	}
	if(is_dir($g_log_dir) === false) return ;
	$file = $g_log_dir .substr(now(),0,10)  .".log";
	$msg = now() . ": " .$msg .chr(13).chr(10);
	write_to_file($file,$msg);
}

function admin_log($msg){
	$db = get_db();
}

//后台管理页面需要调用，判断是否登录
function judge_admin(){
	global $g_admin;
	$g_admin = AdminUser::current_user();
	if(!$g_admin) {
		redirect_login();
		exit();
	}
}



function get_page_type(){
	global $page_type;
	return $_REQUEST['page_type'] ? $_REQUEST['page_type'] : ($page_type ? $page_type : 'dynamic');  
}


function init_page_items($page){
	global $pos_items;
	global $pos_page;
	$pos_page = $page;
	if($pos_items) return;
	$pos_items = PagePos::load($page);
	$page_type = get_page_type();
	if($page_type == 'admin'){
		js_include_tag('jquery.colorbox-min');
		css_include_tag('colorbox','admin/page_pos');
		js_include_tag('admin/page_pos/page_admin');	
	}
}

function show_page_pos($pos,$name='default'){
	global $page_type;
	global $pos_page;
	$type = $_REQUEST['page_type'] ? $_REQUEST['page_type']: $page_type ;
	if($type == 'admin'){
		echo " page=\"{$pos_page}\" pos=\"{$pos}\" pos_tag='{$name}'";
	}	
}