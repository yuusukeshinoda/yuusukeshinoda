<?php

//エラーハンドリングを行い、PDOでデータベースにアクセス
try{
	$pdo_object=
	new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
}catch(PDOException $Exception){
	die('接続に失敗しました:'.$Exception->getMessage());
}

//profilesテーブルから課題2で追加したレコードを削除するSQL文を変数に格納
$sql = "delete from profiles where profilesID = :id";

//SQLを実行する変数を用意
$query = $pdo_object -> prepare($sql);

$query -> bindValue(':id',6);

//SQLを実行
$query -> execute();

//profilesテーブルの全要素を取得するSQL文を変数に格納
$sql = "select * from profiles";

//SQLを実行する変数を用意
$query = $pdo_object -> prepare($sql);

//SQLを実行
$query -> execute();


//連想配列形式で$resultに結果を格納
$result = $query -> fetchall(PDO::FETCH_ASSOC);

//foreach文でブラウザにprofilesテーブルの全要素を表示
foreach($result as $value1){
	foreach($value1 as $key => $value2){
		echo $key.":".$value2.'<br>';
	}
	echo '<br>';
}
?>