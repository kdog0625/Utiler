<?php
//defineでエラーメッセージの定数を設定。
define("err_message_1", "入力必須項目です。");

//バリデーション関数（未入力チェック）
function validatenot($reg, $key){
  if(empty($reg)){
    global $reg;
    $reg[$key]=err_message_1;
  }
}
?>