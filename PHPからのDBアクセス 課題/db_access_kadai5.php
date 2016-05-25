<?php

//エラーハンドリングを行い、PDOでデータベースにアクセス
try{
	$pdo =
	new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
}catch(PDOException $e){
	die('接続に失敗しました:'.$e -> getMessage());
}

//profilesテーブルからnameに'茂'が含まれるレコードを取得するSQL文を変数に格納
$sql = "SELECT * FROM profiles WHERE name LIKE :name";

//SQLを実行する変数を用意
$query = $pdo -> prepare($sql);

//検索する名前の一部を%で囲んでバインド
$query -> bindValue(':name','%'.'茂'.'%');

//SQLを実行
$query -> execute();

//連想配列形式で$resultに結果を格納
$result = $query -> fetchall(PDO::FETCH_ASSOC);

//foreach文でブラウザに目的のレコードのデータを表示
foreach($result as $value1){
	foreach($value1 as $key => $value2){
		echo $key.":".$value2.'<br>';
	}
	echo '<br>';
}
?>