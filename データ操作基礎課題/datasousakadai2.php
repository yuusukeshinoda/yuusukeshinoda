<?php

//各データをPOSTで受け取って表示する
echo "名前：".$_POST["name"].'<br><br>';
echo "性別：".$_POST["gender"].'<br><br>';
echo "趣味：<br>";
echo nl2br($_POST["hobby"]);

?>