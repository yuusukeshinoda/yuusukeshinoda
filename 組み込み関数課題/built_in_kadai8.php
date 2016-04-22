<?php

$file_name = "myself_introduction.txt";
$contents = '篠田祐介です。';
//"myself_introduction.txt"というファイルを新しく作り、自己紹介文を書き込んで保存する。
file_put_contents($file_name,$contents);

?>