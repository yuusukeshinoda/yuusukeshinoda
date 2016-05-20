<?php require_once '/Applications/MAMP/htdocs/UserManagementSystem-ver1.0/common/defineUtil.php';?>
<?php require_once '/Applications/MAMP/htdocs/UserManagementSystem-ver1.0/common/scriptUtil.php';?>
<?php session_start();?>
<?php
$receive = return_top();
echo $receive;


if (isset($_SESSION['name'])){$name = $_SESSION['name'];}

if (isset($_SESSION['birthday'])){$birthday = $_SESSION['birthday'];}
//if (isset($_SESSION['type'])){$type = $_SESSION['type'];}
$type = $_SESSION['type'];
if (isset($_SESSION['tell'])){$tell = $_SESSION['tell'];}
if (isset($_SESSION['comment'])){$comment = $_SESSION['comment'];}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <input type="text" name="name" value="<?php echo $name ?>">
    <br><br>

    生年月日:　
    <select name="year" >
        <option value="----" <?php if($_SESSION['year']=="----"){echo "selected";}?>>----</option>
        <?php
        for($i=1950; $i<=2010; $i++){?>
        <option value="<?php echo $i;?>" <?php if($i==$_SESSION['year']){echo "selected";}?>><?php echo $i;?></option>
        <?php } ?>
    </select>年

    <select name="month">
        <option value="--" <?php if($_SESSION['month']=="--"){echo "selected";}?>>--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>" <?php if($i==$_SESSION['month']){echo "selected";}?>><?php echo $i;?></option>
        <?php };?>
    </select>月

    <select name="day">
        <option value="--" <?php if($_SESSION['day']=="--"){echo "selected";}?>>--</option>
        <?php
        for($i = 1; $i<=31; $i++){?>
        <option value="<?php echo $i;?>" <?php if($i==$_SESSION['day']){echo "selected";}?>><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <input type="radio" name="type" value="エンジニア"<?php if($type=="エンジニア"){echo "checked";}?>>エンジニア<br>
    <input type="radio" name="type" value="営業"<?php if($type=="営業"){echo "checked";}?>>営業<br>
    <input type="radio" name="type" value="その他"<?php if($type=="その他"){echo "checked";}?>>その他<br>
    <br>

    電話番号:
    <input type="text" name="tell" value="<?php echo $tell; ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $comment?></textarea><br><br>

    <input type="submit" name="btnSubmit" value="確認画面へ">


    </form>
</body>
</html>
