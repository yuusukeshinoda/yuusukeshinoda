<?php
$member_list = array(
"山田太郎" => array("ID" => 123,"名前" => '山田太郎',"生年月日" => '1993.10.03',"住所" => '東京'),
"松下涼子" => array("ID" => 456,"名前" => '松下涼子',"生年月日" => '1998.09.23',"住所" => '和歌山'),
"山本正治" => array("ID" => 789,"名前" => '山本正治',"生年月日" => '1960.02.19',"住所" => '東京')
);
foreach($member_list as $key => $value){
	foreach($value as $key => $value){
		if(($key == "ID") || ($key == "住所")){
			continue;
		}
		echo "$key:"."$value<br>";
	}
	echo '<br>';
}
	
?>