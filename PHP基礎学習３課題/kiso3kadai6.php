<?php
$name_part = "山本";
$result = search_member($name_part);
if($result != null){
	foreach($result as $key => $value){
	echo "$key:$value".'<br>';
	}
}else{
	echo "該当者はいません。".'<br>';
}

function search_member($name_part){
	$member1 = array("ID" => 123,"名前" => '山田太郎',"生年月日" => '1993.10.03',"住所" => '東京');
	$member2 = array("ID" => 456,"名前" => '松下涼子',"生年月日" => '1998.09.23',"住所" => '和歌山');
	$member3 = array("ID" => 789,"名前" => '山本正治',"生年月日" => '1960.02.19',"住所" => '東京');
	$member_list = array("山田太郎","松下涼子","山本正治");
			if(stristr($member_list[0],$name_part)){
				return $member1;
			}elseif(stristr($member_list[1],$name_part)){
				return $member2;
			}elseif(stristr($member_list[2],$name_part)){
				return $member3;
			}else{
				return null;			
			}
}
?>