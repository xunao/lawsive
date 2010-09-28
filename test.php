<?php 
include 'frame.php';
echo ord('A');
echo ord('Z'),'<br/>';

function translate($x,$y){
	$str = "=U+U+M";
	$len = strlen($str);
	$add = 0;
	$result = '';
	for($i=0;$i< $len; $i++){
		$c = $str{$i};
		if($c == '='){
			$add = $x;
			continue;
		}
		if($c == '+'){
			$add = $y;
			continue;
		}
		$num = ord($c) + $add;
		if($num < 65){
			$num = 90 -(65 - $num) -1;
		}
		if($num > 90){
			$num = 65 + ( $num - 90) -1;
		}
		$result .= chr($num);
	}
	return $result;
}

for($x=-26; $x< 26; $x++){
	for($y=-26;$y< 26;$y++){
		$result[] = translate($x, $y);
	}
}
$result = array_unique($result);
var_dump($result);