<?php
if(empty($_POST['name']) || $_POST['mode']=='back'){ ?>
<html>
<head>
<title>部分一致で検索</title>
</head>
<body>
<form action="db_access_kadai8.php" method="POST">
名前<input type="text" name="name" value=""><br>
<input type=submit name="btn" value="送 信">
<input type=hidden name="mode" value="ok">
</form>
</body>
</html>

<?php
}else{
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
	     }catch(PDOException $e){
		die('接続に失敗しました:'.$e -> getMessage());
		}
			$sql = "SELECT * FROM profiles WHERE name LIKE :name";
			$query = $pdo->prepare($sql);
			$query->bindValue(':name','%'.$_POST['name'].'%');
    
    try{
        $query->execute();
    } catch (PDOException $e) {
        //接続オブジェクトを初期化することでDB接続を切断
        $pdo=null;
        echo $e->getMessage();
    }
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if(!empty($result)){
    foreach($result as $value){
    	foreach($value as $key => $value){
    		if($key=='profilesID'){
    			echo 'ID：'.$value.'<br>';
    		}
    		if($key=='name'){
    			echo '名前：'.$value.'<br>';
    		}
    		if($key=='tell'){
    			echo '電話番号：'.$value.'<br>';
    		}
    		if($key=='age'){
    			echo '年齢：'.$value.'<br>';
    		}
    		if($key=='birthday'){
    			echo '誕生日：'.$value.'<br>';
    		}
    	}
    }
    ?>
    <form action="db_access_kadai8.php" method="POST">
    <input type=submit name="btn" value="入力画面へ戻る">
    <input type=hidden name="mode" value="back">
    </form>
    
    <?php
    }else{
    	echo '該当するデータはありません。';
    	?>
    	 <form action="db_access_kadai8.php" method="POST">
        <input type=submit name="mode" value="入力画面へ戻る">
        <input type=hidden name="mode" value="back">
        </form>
        <?php
    }
   }
   ?>
