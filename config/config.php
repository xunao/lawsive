<?php
/*
 * 载入开发者环境配置，如果上面的变量需要重载，在apache配置文件中添加开发者姓名，并在config目录下添加配置文件
 * eg：在apache 配置文件中添加SetEnv env_dev sauger
 * 然后在config目录中添加sauger_config.php
 * 在sauger_config.php中，重新设置以上变量的值即可
 * 
 * 
 * 配置变量定义
 */
global $_g_debug_tag; //是否打开调试开关
global $_g_db_type;//数据库类型，一般未为mysql
global $_g_db_server_name;//数据库地址
global $_g_db_user;//数据库用户名
global $_g_db_database;//数据库名
global $_g_db_password;//数据库密码
global $_g_db_code;//数据库编码，一般为utf8
global $_g_table_prex;//表前缀名
global $_g_admin_dir;//后台目录名

/*
 * ucenter相关配置
 */

//global $g_ucenter_ip;//ucenter地址，不同环境需要重载
//global $bbs_uc_key;//bbs application key
//global $app_uc_key;//应用application key
//global $app_uc_id;//应用application id

/*
 * 其他设置
 */
global $_g_log_dir;//日志目录，需要可写权限
global $_g_site_name;//网站后台显示名称
global $_g_site_domain;//网站域名，不同环境需要重载
global $static_dir;
global $static_url;

/*
 * 变量赋值
 */

$_g_db_type = 'mysql';
$_g_db_database = 'lawsive';
$_g_db_code = 'utf8';

$_g_log_dir = dirname(__FILE__)."/../data/";
$_g_site_name = '网趣宝贝';

/////////////////////////////////////////////////////////////////////////
//*****************************一般需要重载的变量*************************//
////////////////////////////////////////////////////////////////////////
$_g_debug_tag = true;
$_g_db_server = '192.168.1.2';
$_g_db_user = 'eachbb'; 
$_g_db_password = 'xunao';

//$g_ucenter_ip = 'http://210.51.48.244';
//$site_domain = 'http://210.51.48.244';

/*
 * load developer environment
 */

$developer = getenv('env_dev');
if($developer){
	$file_name = dirname(__FILE__)."/{$developer}_config.php";
	if(file_exists($file_name)){
		require_once $file_name;
	}
}
$_g_static_dir = ROOT_DIR;
//$_g_static_url = $site_domain;
//ucenter configuration
/*
define('UC_CONNECT', 'mysql');
define('UC_DBHOST', $db_server_name);
define('UC_DBUSER', $db_user_name);
define('UC_DBPW', $db_password);
define('UC_DBNAME', $db_database_name);
define('UC_DBCHARSET', 'utf8');
define('UC_DBTABLEPRE', '`eachbb`.uc_');
define('UC_DBCONNECT', '0');

define('UC_API', $site_domain .'/ucenter');
define('UC_CHARSET', 'utf-8');
define('UC_PPP', '20');
*/