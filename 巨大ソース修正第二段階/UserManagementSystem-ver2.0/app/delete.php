<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>削除確認画面</title>
</head>
  <body>
  <?php
  //詳細情報画面から「削除」を押した場合のみ処理を行う
  if(empty($_GET['mode']) || !$_GET['mode']=="DELETE"){
    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
  }else{
    //
    $result = profile_detail($_GET['id']);
    //エラーが発生しなければ表示を行う
    if(is_array($result)){
    ?>
    <h1>削除確認</h1>
    <?php //見やすいように「よろしいですか？」の後を改行しておく ?>
    以下の内容を削除します。よろしいですか？<br>
    名前:<?php echo $result[0]['name'];?><br>
    生年月日:<?php echo $result[0]['birthday'];?><br>
    種別:<?php echo ex_typenum($result[0]['type']);?><br>
    電話番号:<?php echo $result[0]['tell'];?><br>
    自己紹介:<?php echo $result[0]['comment'];?><br>
    登録日時:<?php echo date('Y年n月j日　G時i分s秒', strtotime($result[0]['newDate'])); ?><br>

    <form action="<?php echo DELETE_RESULT; ?>" method="GET">
      <input type="submit" name="YES" value="はい"style="width:100px">
      <input type="hidden" name="mode" value="RESULT_DETAIL">
      <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    </form><br>
    <form action="<?php echo ROOT_URL; ?>" method="POST">
      <input type="submit" name="NO" value="いいえ"style="width:100px">
      <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    </form>

    <?php
    }else{
        echo 'データの取得に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
  }
    ?>
   </body>
</html>
