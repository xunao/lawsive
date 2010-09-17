<?php
if(!defined('FRAME_VERSION')) die('not allowed!');

class Comment{
	public $r_type;
	public $r_id;
	public $limit;
	
	function __construct($type=null,$id=null) {
		if($type)$this->r_type = $type;
		if($id)$this->r_id = $id;
	}
	
	public function echo_num($use_order=true){
?>
	<div class="pub_comment_num">
	<?php if($use_order){?>
	 	<font color="#000000">排序：</font>
	 	<select id="comment_order">
	 		<option value="desc">时间倒序</option>
	 		<option value="asc">时间顺序</option>
	 	</select>
	 <?php }?>
	 	<font color="#0088FF">评论总数</font>
	 	<a><font color="#A84749">[ <span id="comment_num">1</span> 条 ]</font></a>
	 </div>
<?php 
	}
	
	public function echo_comment($limit=5){
		if($limit)$this->limit;
		echo '<div id="comment_show"></div>';
		echo '<input type="hidden" id="resource_id" value="'.$this->r_id.'">';
		echo '<input type="hidden" id="resource_type" value="'.$this->r_type.'">';
		echo '<input type="hidden" id="comment_limit" value="'.$this->limit.'">';
	}
	
	public function echo_text(){
		echo '<div class="pub_comment_login" id="comment_text"></div>';
	}
} 
?>