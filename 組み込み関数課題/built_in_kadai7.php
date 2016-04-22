<?php

$strings = "きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます";
echo "$strings<br>";
$search1 = 'U';
$replace1 = 'う';
$search2 = 'I';
$replace2 = 'い';

$result1 = str_replace($search1,$replace1,$strings);
$result2 = str_replace($search2,$replace2,$result1);
echo "$result1<br>";
echo $result2;

?>