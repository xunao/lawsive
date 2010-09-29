<?php	
//		include_once(dirname(__FILE__).'./../../frame.php'); 
//		use_jquery_ui();
//		init_page_items('index');
  	?>
<style>
	#add{margin:5px; }
</style>
<div class="index_img_a" <?php $pos="index_img_a";show_page_pos($pos,'link_i');?>>
<a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/index/add.jpg';?>" id="add"></a>
</div>