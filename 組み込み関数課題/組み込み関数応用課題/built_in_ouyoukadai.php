<?php
/*
【組み込み関数 応用課題】講義で扱われていない組み込み関数を利用してロジックを作成する
人狼ゲームのロジックを作る
本来のルールでは昼のターンに参加者全員で会議をして人狼だと思う人に投票して最多得票者を処刑、夜のターンに人狼が村人を一人襲う。これを繰り返して人狼の数が村人の数と同数以上になれば人狼側の勝利、人狼が全滅すれば村人側の勝利となるが、このロジックでは昼のターンだけを繰り返し行う。
*/

//ロジックで使用した講義で扱われていない組み込み関数はコードの末尾にまとめてあります。


$start_time = date("Y-m-d H:i:s");
$start = '「'."$start_time".'　開始」';

//ログファイルに開始時間を書き込む
$fp = fopen("logfile.txt","w");
fwrite($fp,"$start");
fclose($fp);

//rand関数で8人から24人の間でランダムに参加人数を設定する
$participants_number = rand(8,24);
echo "参加人数は$participants_number",'人です';
echo '<br>';

//人狼の数を参加人数全体の5分の1に設定する
$jinrou_number = $participants_number / 5;
echo $jinrou_number;
echo '<br>';

//人狼の数が小数点になった場合を想定し、ceil関数で切り上げておく
$jinrou_number = ceil($jinrou_number);
echo "人狼は$jinrou_number".'人です。<br>';
echo '<br>';

//参加人数から人狼の数を引いて村人の数を設定する
$villager_number = $participants_number - $jinrou_number;
echo "村人は$villager_number".'人です。<br>';
echo '<br>';



//array_fill関数で人狼と村人それぞれの数だけ要素をもつ配列を作成。valueを"人狼","村人"と設定
echo '人狼配列を表示<br>';
$jinrou_array = array_fill(0,$jinrou_number,"人狼");
print_r($jinrou_array);
echo '<br><br>';

$villager_array = array_fill(0,$participants_number - $jinrou_number,"村人");
echo '村人配列を表示<br>';
print_r($villager_array);
echo '<br><br>';

//array_merge関数で人狼配列と村人配列を合成
$all_member = array_merge($jinrou_array,$villager_array);
echo '全メンバーの配列を表示<br>';
print_r($all_member);
echo '<br>';
echo '<br>';
echo '<br>';

//処刑される参加者を決定するための投票箱となる空の配列を用意
$ballot_box = array();




//村人の数が人狼の数よりも多く、かつ人狼が全滅していない間ループ処理を行う
while(count($jinrou_array) < count($villager_array) && !empty($jinrou_array)){
	foreach($all_member as $value){

	//all_member配列における全参加者のインデックスからランダムに数値を取得(インデックスは0から始まるので参加人数から1を引く)
	$vote = rand(0,$participants_number - 1);

	//array_push関数で空の配列にランダムな数値を要素として追加していく
	array_push($ballot_box,$vote);
	}
	echo '投票箱の中身を表示(インデックスが投票者の番号、バリューが投票先のメンバーのインデックス)<br>';
	print_r($ballot_box);
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';

	//array_count_values関数(引数に指定した配列の値をキーとして、その配列におけるその値の出現回数を値とした配列を返す)で得票数を調べて変数ballot_resultに格納する。インデックスが投票されたメンバーの番号、バリューが得票数になる
	$ballot_result = array_count_values($ballot_box);
	echo '投票結果を表示(キーが投票されたメンバーのall_member配列におけるインデックス、バリューが獲得票数)';
	print_r($ballot_result);
	echo '<br><br>';

	//最多得票者を調べる
	$i = 0;
	foreach($ballot_result as $key => $value){
		if($i==0){
			$maximum_value = $value;
			$maximum_value_key = $key;
			$i = 1;
			continue;
		}elseif($maximum_value>=$value){
			continue;
		}else{
			$maximum_value = $value;
			$maximum_value_key = $key;
		}
	}
	echo '最多得票者の得票数を表示<br>';
	echo $maximum_value;
	echo '<br><br>';
	echo '最多得票者のall_member配列におけるインデックスを表示<br>';
	echo $maximum_value_key;
	echo '<br><br>';

	//最多得票者のall_member配列におけるバリューを変数contentsに格納
	$contents = $all_member[$maximum_value_key];
	echo "処刑されるのは$contents".'です<br>';
	echo '<br><br>';

	//処刑されたのが人狼なら配列jinrou_arrayからunset関数で要素を一つ削除する
	//処刑されたのが村人なら配列villager_arrayからunset関数で要素を一つ削除する
	if($contents == "人狼"){
		unset($jinrou_array[0]);
		$jinrou_array = array_values($jinrou_array);
		echo '人狼配列を表示<br>';
		print_r($jinrou_array);
		echo '<br><br>';
		}else{
			unset($villager_array[0]);
			$villager_array = array_values($villager_array);
			echo '村人配列を表示<br>';
			print_r($villager_array);
			echo '<br><br>';
		}

		//配列all_memberから最多得票者のインデックスに対応する要素を削除
		unset($all_member[$maximum_value_key]);
		print_r($all_member);
		echo '<br><br>';

		//削除されたインデックスが虫食いされた状態になっているのでarray_values関数でインデックスを0から付け直す
		$all_member = array_values($all_member);

		//参加者数をデクリメント
		$participants_number--;

		echo '処刑が実行された後の全メンバーをインデックスを付け直して表示<br>';
		print_r($all_member);
		echo '<br><br><br>';

		//投票箱を空にする
		$ballot_box = array();

}

//人狼の数が村人の数と同数になれば人狼側の勝利、人狼が全滅すれば村人側の勝利となるようにif文で場合分けする
if(count($jinrou_array) >= count($villager_array)){
	echo '人狼側の勝利です！';
}else{
	echo '村人側の勝利です！';
}
echo '<br><br>';


$end_time = date("Y-m-d H:i:s");
$end = '「'."$end_time".'　終了」';

//ログファイルに終了時間を書き込む
$fp = fopen("logfile.txt","a");
fwrite($fp,"$end");
fclose($fp);

$filename = "logfile.txt";
if(is_readable($filename)){
	$contents = file_get_contents($filename);
	echo $contents;
}else{
	echo "$filenameは読み込めません。";
}

/*
【ロジックで使用した組み込み関数一覧と使用した行】
・rand()　20,71行目
・ceil()　30行目
・array_fill()　43,47行目
・array_merge()　53行目
・empty()　67行目
・array_count_values()　84行目
・unset()　118,124,132行目
・array_values()　119,125,137行目
・count()　152行目
*/

?>
