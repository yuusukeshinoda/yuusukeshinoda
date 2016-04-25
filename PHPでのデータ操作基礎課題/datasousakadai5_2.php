<HTML>
<HEAD>
<TITLE>ファイルのアップロード</TITLE>
</HEAD>
<BODY>
<?php
$file_dir = "/Applications/XAMPP/xamppfiles/htdocs/";
$file_path = $file_dir.$_FILES["uploadfile"]["name"];

if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$file_path)){
	$img_dir = "/image/";
	$img_path = $img_dir.$_FILES["uploadfile"]["name"];
	$size = getimagesize($file_path);
?>
ファイルアップロードを完了しました。<BR>
<IMG src="<?=$img_path?>">
<?php
}
?>
</BODY>
</HTML>