<?php

try{
	$pdo_object=
	new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
}catch(PDOException $Exception){
	die('接続に失敗しました:'.$Exception->getMessage());
}

?>