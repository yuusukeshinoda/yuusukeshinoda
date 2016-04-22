<?php

$strings = "きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます";
$search = array('I','U');
$replace = array('い','う');

$result = str_replace($search,$replace,$strings);
echo "$result<br>";

?>