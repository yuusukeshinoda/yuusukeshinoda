<?php
$name = '篠田祐介';

//名前のバイト数を取得して表示
$length = strlen($name);
echo "$length<br>";

//日本語としての文字数を取得
$jp_length = mb_strlen($name);
echo $jp_length;
?>