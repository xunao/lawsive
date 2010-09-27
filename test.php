<?php 
include 'frame.php';
use_jquery();
set_charset();
init_page_items('index');
js_include_tag('jquery.colorbox');
css_include_tag('colorbox');
$user = member::current();
var_dump($user->get_friend_news('diary'));
