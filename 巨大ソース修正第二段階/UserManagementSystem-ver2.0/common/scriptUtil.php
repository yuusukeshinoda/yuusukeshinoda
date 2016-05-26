<?php
require_once '../common/defineUtil.php';

/**
 * 使用した場所にトップページへのリンクを挿入する
 * @return トップページへのリンクのaタグ
 */
function return_top(){
    return "<a href='".ROOT_URL."'>トップへ戻る</a>";
}

/**
 * 種別番号から実際の種別名を返却する
 * @param type $type 種別と対応した数字
 * @return string 種別名
 */
function ex_typenum($type){
    switch ($type){
        case 1;
            return "エンジニア";
        case 2;
            return "営業";
        case 3;
            return "その他";
    }
}

/**
 * フォームの再入力時に、すでにセッションに対応した値があるときはその値を返却する
 * @param type $name formのname属性
 * @return type セッションに入力されていた値
 */
function form_value($name){
    if(isset($_POST['mode']) && $_POST['mode']=='REINPUT'){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
    }
}

/**
 * ポストからセッションに存在チェックしてから値を渡す。
 * 二回目以降のアクセス用に、ポストから値の上書きがされない該当セッションは初期化する
 * @param type $name
 * @return type
 */
function bind_p2s($name){
    if(!empty($_POST[$name])){
        $_SESSION[$name] = $_POST[$name];
        return $_POST[$name];
    }else{
        $_SESSION[$name] = null;
        return null;
    }
}

//update.phpにおいて名前を変更してからupdate_result.phpに進み、登録せずに入力画面に戻ったときに変更した値にselectedする。
//セッションがない場合は登録済みのデータをselectedする。
function show_data($name){
  global $result;
  if(isset($_SESSION[$name])){
    return $_SESSION[$name];
  }else{
    return $result[0][$name];
  }
}

//update.phpにおいて生年月日を変更してからupdate_result.phpに進み、登録せずに入力画面に戻ったときに変更した値にselectedする。
//セッションがない場合は登録済みのデータをselectedする。
function select_birthday($bd){
  global $i;
  global $birthday;
  if(isset($_SESSION[$bd])){
    if($_SESSION[$bd]==$i){
      return 'selected';
    }
  }elseif($birthday[0]==$i){
    return 'selected';
  }
}

//update.phpにおいて種別を変更してからupdate_result.phpに進み、登録せずに入力画面に戻ったときに変更した値にcheckedする。
//セッションがない場合は登録済みのデータをselectedする。
function show_type($type){
  global $i;
  global $result;
  if(isset($_SESSION[$type])){
    if($_SESSION[$type]==$i){
      echo "checked";
    }
  }elseif($i==$result[0]['type']){
    echo "checked";
  }
}
