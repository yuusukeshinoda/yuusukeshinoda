<?php
//特定の時刻のタイムスタンプを取得
$time = mktime(10,0,0,11,4,2016);

//タイムスタンプを日時に変換して表示
$time_display = date('Y-m-d H:i:s',$time);
echo $time_display;

?>