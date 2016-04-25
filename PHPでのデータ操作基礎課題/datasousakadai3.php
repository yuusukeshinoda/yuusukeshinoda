<?php
date_default_timezone_set('Asia/Tokyo');
$last_accesstime = date('Y年m月d日 H時i分s秒');

setcookie("LastLoginTime",$last_accesstime);
$last_time = $_COOKIE["LastLoginTime"];

echo "前回のログイン時刻は  ".$last_time."  です。";

?>