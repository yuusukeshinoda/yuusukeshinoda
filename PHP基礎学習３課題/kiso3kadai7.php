<?php
$num = 3;
function user_define(){
	global $num;
	$num *= 2;
	static $count_function = 0;
	$count_function += 1;
	if($count_function >= 20){
		echo "$count_function".'回目の実行です<br>';
	}
}
for($i=0;$i<20;$i++){
	user_define();
}
echo "$num<br>";
?>