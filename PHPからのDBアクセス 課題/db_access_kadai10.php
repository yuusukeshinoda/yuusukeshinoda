<?php
if(!isset($_POST['mode']) || $_POST['mode']=="back"){
?>
<html>
<head>
<title>データの削除</title>
</head>
<body>
<p><font size='5' color='blue'>登録データの削除</font></p>
<form action="db_access_kadai10.php" method="POST">
<input type="text" name="name" value="">
<input type="hidden" name="mode" value="search">
<input type="submit" name="btn" value="検 索">
</form>
<?php
}elseif(isset($_POST['name']) && $_POST['name']==null){
	echo '名前を入力してください';
?>
<form action="db_access_kadai10.php" method="POST">
<input type="submit" name="btn" value="戻 る">
<input type="hidden" name="mode" value="back">
</form> 
<?php
}elseif(isset($_POST['name'])){
	
//データベースに接続
try{
	$pdo =
	new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
}catch(PDOException $e){
	die('接続に失敗しました:'.$e -> getMessage());
}

$sql = "SELECT * FROM profiles WHERE name LIKE :name";
$query = $pdo->prepare($sql);

$query->bindValue(':name','%'.$_POST['name'].'%');

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

    if(empty($result)){
    	echo'該当するデータはありません<br>';
    	?>
    	<form action="db_access_kadai10.php" method="POST">
    	<input type="submit" name="btn" value="戻 る">
    	<input type="hidden" name="mode" value="back">
    	</form>
    	<?php
     }else{
?>
<p><font size="4">検索結果</font></p>

<?php
foreach($result as $value){
	foreach($value as $key => $value){
		if($key=='profilesID'){
			echo 'ID：'.$value.'<br>';
			$id = $value;
		}
		if($key=='name'){
			echo '名前：'.$value.'<br>';
		}
		if($key=='age'){
			echo '年齢：'.$value.'<br>';
		}
		if($key=='tell'){
			echo '電話番号：'.$value.'<br>';
		}
		if($key=='birthday'){
			echo '生年月日：'.$value.'<br>';
		}
	}
	?>
	<form action="db_access_kadai10.php" method="POST">
    	<input type="submit" name="btn" value="削 除">
    	<input type="hidden" name="mode" value="delete">
    	<input type="hidden" name="id" value="<?php echo $id; ?>">
    	</form>
	<?php
	echo'<br>';
}
?>
<form action="db_access_kadai10.php" method="POST">
<input type="submit" name="btn" value="トップへ戻る">
<input type="hidden" name="mode" value="back">
</form> 
<?php
}

}else{

try{
	$pdo =
	new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
}catch(PDOException $e){
	die('接続に失敗しました:'.$e -> getMessage());
}

$sql = "DELETE FROM profiles WHERE profilesID = :id";
$query = $pdo->prepare($sql);

$query->bindValue(':id',$_POST['id']);

$query->execute();

echo '削除を完了しました<br><br>';
?>
<form action="db_access_kadai10.php" method="POST">
<input type="submit" name="btn" value="トップへ戻る">
<input type="hidden" name="mode" value="back">
</form>
<?php
}
?>






