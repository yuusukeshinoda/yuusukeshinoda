<?php

//エラーハンドリングを行い、PDOでデータベースにアクセス
try{
	$pdo =
	new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	die('接続に失敗しました:'.$e->getMessage());
}

//profilesテーブルに任意のメンバーを追加するSQL文を変数に格納
$sql = "INSERT INTO profiles(profilesID,name,tell,age,birthday)
VALUES(:profilesID,:name,:tell,:age,:birthday)";

//SQLを実行する変数を用意
$insert_query = $pdo -> prepare($sql);

//bindValueを用いて実数値を入れていく
$insert_query -> bindValue(';profilesID',7);
$insert_query -> bindValue(':name','山田孝');
$insert_query -> bindValue(':tell','090-9999-1111');
$insert_query -> bindValue(':age',45);
$insert_query -> bindValue(':birthday','1971-07-23');

//SQLを実行
try{
	$insert_query -> execute();
}catch(PDOException $e){
	$pdo = null;
	$e -> getMessage();
}

?>