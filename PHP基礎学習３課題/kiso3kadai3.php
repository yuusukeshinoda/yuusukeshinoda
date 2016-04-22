<?php
function calc($num,$num2 = 5,$type = false){
	$answer = $num * $num2;
	if($type === false){
		echo $answer;
	}else{
		$answer *= $answer;
		echo $answer;
	}
}
calc(3,6,true);
?>
