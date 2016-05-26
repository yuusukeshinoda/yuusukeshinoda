<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
session_start();//再入力時用
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>変更入力画面</title>
</head>
<body>
  <?php
  //詳細情報画面から「変更」を押した場合のみ処理を行う
  if(empty($_POST['mode']) || !$_POST['mode']=="UPDATE"){
    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
  }else{
    ?>

    <form action="<?php echo UPDATE_RESULT ?>" method="POST">
    <?php
    $result = profile_detail($_POST['id']);

    //$resultの'birthday'を'year','month','day'の要素に分割して$birthdayに配列として格納
    $birthday = explode('-',$result[0]['birthday']);


    //更新確認画面からこのページに戻ってきた場合に、変更した値を保持しておくために、scriptUtilに定義した関数を使用
    ?>
    名前:
    <input type="text" name="name" value="<?php echo $name = show_data('name'); ?>">
    <br><br>

    生年月日:　
    <?php
    //配列$birthdayのそれぞれの要素'year','month','day'と一致する$iをselected。
    ?>
    <select name="year">
        <option value="">----</option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>" <?php echo $year = select_birthday('year'); ?>><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>" <?php echo $month = select_birthday('month'); ?>><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i;?>" <?php echo $day = select_birthday('day'); ?>><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <?php
    for($i = 1; $i<=3; $i++){ ?>
    <input type="radio" name="type" value="<?php echo $i; ?>"<?php echo $type = show_type('type');?>>
    <?php echo ex_typenum($i);?><br>
    <?php } ?>
    <br>

    電話番号:
    <input type="text" name="tell" value="<?php echo $name = show_data('tell'); ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $comment = show_data('comment'); ?></textarea><br><br>

    <input type="hidden" name="mode"  value="RESULT">
    <input type="hidden" name="id"  value="<?php echo $_POST['id'] ?>">
    <input type="submit" name="btnSubmit" value="以上の内容で更新を行う">
    </form>
    <form action="<?php echo RESULT_DETAIL; ?>" method="GET">
      <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
      <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
    </form>
  <?php
  }
  echo return_top();
  ?>
</body>

</html>
