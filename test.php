<?php 
include 'frame.php';
use_jquery();
set_charset();
init_page_items('index');
js_include_tag('jquery.colorbox');
css_include_tag('colorbox');
$news = new FriendNews();
$news->generat(1, 'comment', 22);
$news->save();
$db = get_db();
$db_item = $db->query("select * from friend_news");
$friend_news = FriendNews::load($db_item);
foreach ($friend_news as $item) {
	echo $item->title,'<br/>',$item->content,'<br/>';
}
