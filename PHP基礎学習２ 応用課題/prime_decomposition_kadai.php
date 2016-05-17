<?php

//クエリストリングを利用して素因数分解のロジックを作成する。

$num = $_GET['num'];
echo $num."を素因数分解する".'<br>';
$num_original = $num;

//一桁の素数を格納する変数を用意
$num_one_digit = null;

//二桁以上の素数を格納する変数を用意
$num_more_one_digit = null;

//1の素数は1として考える
if($num==1){
	$num_one_digit = 1;
}elseif($num<=0){
	echo '正の整数を入力してください。<br>';
}else{


for($i=2;$i<10;$i++){
	//渡された数値が$iで割り切れる場合、$iを素数格納用の変数に格納していく。$iで割り切れなくなれば$iをカウントアップ
	while($num%$i==0){
		$num = $num / $i;
		if($num_one_digit!=null){
			$num_one_digit = "$num_one_digit,$i";
		}else{
			$num_one_digit = $i;
		}
	}
}

//二桁以上の素数を見つける処理
for($i=10;10<=$i;$i++){
	if($i<=$num){
		while($num%$i==0){
			$num = $num / $i;
			if($num_more_one_digit!=null){
				$num_more_one_digit = "$num_more_one_digit,$i";
			}else{
				$num_more_one_digit = $i;
			}
		}
	}else{
		//$iの値が渡された数値よりも大きくなった時点でループから離脱する。
		break;
	}
}

echo "元の値：".$num_original.'<br>';
if($num_one_digit==null){
	echo '一桁の素因数：なし<br>';
}else{
	echo "一桁の素因数：".$num_one_digit.'<br>';
}
if($num_more_one_digit==null){
	echo 'その他：なし<br>';
}else{
	echo "その他：".$num_more_one_digit.'<br>';
}
}


?>