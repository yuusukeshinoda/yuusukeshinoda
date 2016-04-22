<?php
num_discern(18);

function num_discern($num){
	$answer = $num % 2;
	if($answer == 0){
		echo $num.'は偶数です。<br>';
	}else{
		echo $num.'は奇数です。<br>';
	}
}

?>
