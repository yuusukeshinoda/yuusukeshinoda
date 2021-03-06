<?php

//エラーハンドリングを行い、PDOでデータベースにアクセス
try{
	$pdo =
	new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
}catch(PDOException $e){
	die('接続に失敗しました:'.$e->getMessage());
}

//profilesテーブルの全要素を取得するSQL文を変数に格納
$sql = "select * from profiles";

//SQLを実行する変数を用意
$query = $pdo -> prepare($sql);

//SQLを実行
$query -> execute();

//連想配列形式で$resultに結果を格納
$result = $query -> fetchall(PDO::FETCH_ASSOC);

//foreach文でブラウザに全要素を表示
foreach($result as $value1){
	foreach($value1 as $key => $value2){
		echo $key.":".$value2.'<br>';
	}
	echo '<br>';
}
?>