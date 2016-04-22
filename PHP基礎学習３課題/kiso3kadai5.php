<?php
list($id,$name,$bd,$address) = get_info();
echo "ID : $id<br>"."名前 : $name<br>"."生年月日 : $bd<br>"."住所 : $address<br>";

function get_info(){
	$id = 12345;
	$name = '山田';
	$bd = '1980年4月5日';
	$address = '日本';
	return array($id,$name,$bd,$address);
}
	
?>