<?php
function my_profile(){
	$name = '篠田祐介';
	$birth = '1990年11月1日';
	$introduction = '好きな映画のジャンルはSFです。';
	echo '私の名前は'.$name.'です。<br>';
	echo $birth.'生まれです。<br>';
	echo $introduction.'<br>';
	return true;
}

if(my_profile()){
	echo '<br>この処理は正しく実行されました。<br><br>';
	for($i=0;$i<10;$i++){
		$count = $i + 1;
		echo $count.'回目<br>';
		my_profile();
		echo '<br>';
	}
}
?>