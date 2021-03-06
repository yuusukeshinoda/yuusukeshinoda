<?php

//エラーハンドリングを行い、PDOでデータベースにアクセス
try{
	$pdo =
	new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
}catch(PDOException $e){
	die('接続に失敗しました:'.$e->getMessage());
}

//profilesテーブルからprofilesID=1のレコードを取得するSQL文を変数に格納
$sql = "SELECT * FROM profiles WHERE profilesID = :id";

//SQLを実行する変数を用意
$query = $pdo -> prepare($sql);

//profilesIDをバインド
$query -> bindValue(':id',1);

//SQLを実行
$query -> execute();

//連想配列形式で$resultに結果を格納
$result = $query -> fetchall(PDO::FETCH_ASSOC);

//foreach文でブラウザにprofilesID=1のデータを表示
foreach($result as $value1){
	foreach($value1 as $key => $value2){
		echo $key.":".$value2.'<br>';
	}
	echo '<br>';
}
?>