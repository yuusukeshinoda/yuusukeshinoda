<?php

//日本時間に設定
date_default_timezone_set('Asia/Tokyo');
//セッション開始
session_start();

//前回アクセスしていればセッションのデータを表示
if(isset($_SESSION["LastLoginTime"])){
	echo "前回のログイン時刻は ".$_SESSION["LastLoginTime"]." です。";
}else{
	echo "はじめてのログインです。";
}

//アクセスした時刻を取得
$access_time = date("Y年m月d日 H時i分s秒");
//セッションでデータを保存
$_SESSION["LastLoginTime"] = $access_time;

?>