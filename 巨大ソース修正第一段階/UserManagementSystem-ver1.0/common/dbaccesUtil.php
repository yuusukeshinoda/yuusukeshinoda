<?php
require_once '/Applications/MAMP/htdocs/UserManagementSystem-ver1.0/common/defineUtil.php';
require_once '/Applications/MAMP/htdocs/UserManagementSystem-ver1.0/common/scriptUtil.php';

//DBへの接続用を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','yussuke','mofcarro');
        return $pdo;
    } catch (PDOException $e) {
        die('接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}
?>
