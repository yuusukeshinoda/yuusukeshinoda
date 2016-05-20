<?php require_once '/Applications/MAMP/htdocs/UserManagementSystem-ver1.0/common/defineUtil.php';?>
<?php require_once '/Applications/MAMP/htdocs/UserManagementSystem-ver1.0/common/scriptUtil.php';?>
<?php session_start();
$receive = return_top();
echo $receive;
echo '<br>';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php
    if(!empty($_POST['name']) && $_POST['year']!=='----' && $_POST['month']!=='--' && $_POST['day']!=='--' && !empty($_POST['type'])
            && !empty($_POST['tell']) && !empty($_POST['comment'])){

        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];

        //セッション情報に格納
        $_SESSION['name'] = $post_name;
        $_SESSION['birthday'] = $post_birthday;
        $_SESSION['type'] = $post_type;
        $_SESSION['tell'] = $post_tell;
        $_SESSION['comment'] = $post_comment;
        $_SESSION['year'] = $_POST['year'];
        $_SESSION['month'] = $_POST['month'];
        $_SESSION['day'] = $_POST['day'];
    ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">
          <input type="submit" name="yes" value="はい">
          <input type="hidden" name="formerPage" value="true"/>
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>

    <?php }else{ ?>
        <h1>入力項目が不完全です</h1><br>
        <?php
        $incompleteItem = null;
        if(empty($_POST['name'])){
          $incompleteItem = $incompleteItem.'「名前」';
        }else{$_SESSION['name'] = $_POST['name'];}

        if($_POST['year']=='----' || $_POST['month']=='--' || $_POST['day']=='--'){
          $_SESSION['year'] = $_POST['year'];
          $_SESSION['month'] = $_POST['month'];
          $_SESSION['day'] = $_POST['day'];
          $incompleteItem = $incompleteItem.'「生年月日」';
        }else{$_SESSION['year'] = $_POST['year'];$_SESSION['month'] = $_POST['month'];$_SESSION['day'] = $_POST['day'];}
        if(empty($_POST['type'])){
          $incompleteItem = $incompleteItem.'「種別」';
        }else{$_SESSION['type'] = $_POST['type'];}
        if(empty($_POST['tell'])){
          $incompleteItem = $incompleteItem.'「電話番号」';
        }else{$_SESSION['tell'] = $_POST['tell'];}
        if(empty($_POST['comment'])){
          $incompleteItem = $incompleteItem.'「自己紹介文」';
        }else{$_SESSION['comment'] = $_POST['comment'];}
        echo "$incompleteItem".'の入力が不完全です。<br>';

        ?>
        再度入力を行ってください
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
    <?php }?>
</body>
</html>
