<?php
//エラーハンドリングを行い、PDOでデータベースにアクセス
try{
	$pdo_object=
	new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
}catch(PDOException $Exception){
	die('接続に失敗しました:'.$Exception->getMessage());
}

//指定した要素を変更するSQL文を変数に格納
$sql = "UPDATE profiles SET name = :name, age = :age, birthday = :birthday WHERE profilesID = :id";

//SQLを実行する変数を用意
$query = $pdo_object -> prepare($sql);

//変更する値をバインド
$query -> bindValue(':name','松岡 修造');
$query -> bindValue(':age',48);
$query -> bindValue(':birthday','1967-11-06');
$query -> bindValue(':id',1);

//SQLを実行
$query -> execute();

?>