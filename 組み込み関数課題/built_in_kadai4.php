<?php
//特定の時刻のタイムスタンプを二つ取得
$timestamp1 = mktime(0,0,0,1,1,2015);
$timestamp2 = mktime(23,59,59,12,31,2015);

//二つのタイムスタンプの差を取得して表示
$seconds = $timestamp2 - $timestamp1;
echo $seconds;
?>