<?php
if(!defined('FRAME_VERSION')) die('not allowed!');
class Category 
{
	public $items;
	private $table;
	public $group_items;
	function __construct($type=null,$name=null) {
		$table = new Table('category');
		$conditions = array();
		$type && $conditions[] = "category_type='{$type}'";
		$name && $conditions[] = "name='{$name}'";
		$conditions = implode(' and ', $conditions);
		$items = $table->find('all',array('conditions' => $conditions,'order' => 'sort_id,priority'));
		if($items){
			foreach ($items as $item) {
				$this->items[$item->id] = $item;
				$this->group_items[$item->parent_id][]=$item->id;
				$this->group_items[$item->id] = array();
			}
		}
		
	}
	
	public function children_map($id, $include_self = true){
		$result = array();
		if($include_self) $result[] = $id;
		if($this->group_items[$id]){
			foreach ($this->group_items[$id] as $g) {
				$result = array_merge($result,$this->children_map($g,true));
			}
		} 
		return $result;
		
	}
	
	public function &find($id){
		return $this->items[$id];
	}
	
	public function &find_by_name($name){
		foreach($this->items as $k => $v){
			if($v->name == $name) return $this->items[$k];
		}	
		return false;
	}
	
	public function tree_map($current_id){
		$result = array();
		$result[] = $current_id;
		while(intval($current_id) > 0){
			$current = $this->find($current_id);
			if($current->parent_id){
				$result[] = $current->parent_id;
				$current_id = $current->parent_id;
			}
			else{
				break;
			}

		}
		return $result;
	}
	
	public function tree_map_name($current_id){
		$result = array();
		$result[] = $this->items[$current_id]->name;
		while(intval($current_id) > 0){
			$current = $this->find($current_id);
			if($current->parent_id){
				$result[] = $this->items[$current->parent_id]->name;
				$current_id = $current->parent_id;
			}
			else{
				break;
			}

		}
		return $result;
	}
	
	public function find_sub_category($parent_id=null){
		$ret = array();
		if(empty($parent_id)){
			foreach ($this->items as $v) {
				if(!$v->parent_id){
					array_push($ret, $v );
				}
			}
			return $ret;
		}
		if(array_key_exists($parent_id, $this->items)){
			return null;
		}

		foreach ($this->items as $v) {
			if($v->parent_id == $parent_id){
				array_push($ret ,$v );
			};
		}
	}
	
	public function echo_jsdata($var_name='category'){
		?>
		<script>
			var <?php echo $var_name;?> = new category_class();
			<?php if($this->items){ foreach ($this->items as $v) {
				echo "$var_name.push(new category_item_class('$v->id','$v->name','$v->parent_id','$v->priority'));";
			}}?>
		</script>
		<?php
	}
	
	public function echo_select($name="category_select"){
		?>
		<script>			
			var relation = new Array();			
		</script>
		<?php
	}
	
}
?>