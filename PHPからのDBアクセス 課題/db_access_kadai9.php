<html>
<head>
<title>データの挿入</title>
</head>
<body>

<?php
//POSTが存在しない、またはPOST['mode']がbackのときに入力画面を表示
if(!isset($_POST['mode']) || $_POST['mode']=='back'){ ?>

<p><font size="5" color="blue">情報登録画面</font></p>
<form action="db_access_kadai9.php" method="POST">
名前<input type="text" name="name" value=""><br>
電話番号<input type="text" name="tell" value=""><br>
年齢<input type="text" name="age" value=""><br>
誕生日
<select name="year">
<?php
for($i=1900;$i<=2010;$i++){ ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php } ?>
        </select>年
        
<select name="month">
<?php
for($i=1;$i<=12;$i++){ ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php } ?>
</select>月

<select name="day">
<?php
for($i=1;$i<=31;$i++){ ?>
	<option value="<?php echo $i ?>"><?php echo $i; ?></option>
	<?php } ?>
</select>日<br><br>

<?php 
//modeの値を'ok'でリダイレクトすることでelse以降の処理を行う
 ?>
<input type=hidden name="mode" value="ok">
<input type="submit" value="登 録">
</form>
<?php
}else{
	//未入力項目がある場合は入力画面に戻る
	if(empty($_POST['name']) || empty($_POST['tell']) || empty($_POST['age'])){
		$emptyItem = array();
		if(empty($_POST['name'])){
			array_push($emptyItem,'名前');
		}
		if(empty($_POST['tell'])){
			array_push($emptyItem,'電話番号');
		}
		if(empty($_POST['age'])){
			array_push($emptyItem,'年齢');
		}
		//array_pushで未入力項目を配列に格納していき、最後にimplodeで表示
		echo implode(",",$emptyItem).' が未記入です。<br>'.'再度入力を行ってください。'; ?>
<form action="db_access_kadai9.php" method="POST">
<input type=submit name="btn" value="戻る">
<?php
//modeをbackでリダイレクトすることで最初のif文の条件式を満たし、入力画面を表示
?>
<input type=hidden name="mode" value="back">
</form>

<?php
	}else{
//年、月、日を連結し一つの文字列にして変数に格納
$birthday = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

//データベースに接続
try{
	$pdo =
	new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
}catch(PDOException $e){
	die('接続に失敗しました:'.$e -> getMessage());
}

$sql = "INSERT INTO profiles(name,tell,age,birthday) values(:name,:tell,:age,:birthday)";
$query = $pdo->prepare($sql);

$query->bindValue(':name',$_POST['name']);
$query->bindValue(':tell',$_POST['tell']);
$query->bindValue(':age',$_POST['age']);
$query->bindValue(':birthday',$birthday);

$query->execute();
?>
<p>以下の内容で登録しました。</p>
<?php
echo '名前：'.$_POST['name'].'<br>';
echo '電話番号：'.$_POST['tell'].'<br>';
echo '年齢：'.$_POST['age'].'<br>';
echo '誕生日：'.$birthday.'<br>';
?>
<form action="db_access_kadai9.php" method="POST">
<input type=hidden name="mode" value="back">
<input type="submit" name="btn" value="入力画面へ戻る">
</form>
            <?php }
}
 ?>



</body>
</html>
