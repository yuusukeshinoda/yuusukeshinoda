<?php
require_once '/Applications/MAMP/htdocs/UserManagementSystem-ver1.0/common/defineUtil.php';


  function return_top(){
      return "<a href='".ROOT_URL."'>トップへ戻る</a>";
  }
  function present_time(){
    $timeStamp = time();
    $time = date('Y-m-d H:i:s',$timeStamp);
    return $time;
  }
?>
