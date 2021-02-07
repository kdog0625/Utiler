<?php
//defineでエラーメッセージの定数を設定。
define("err_message_1", "入力必須項目です。");
define("err_message_2", "名前は256文字以内で入力して下さい。");
define("err_message_3", "パスワードは8文字以上で入力して下さい。");
define("err_message_4", "パスワードは256文字以内で入力して下さい。");
define("err_message_5", "メールアドレスは正しい形式で入力して下さい。");


$error_mes=array();

//バリデーション関数（未入力チェック）
function validatenot($reg, $value){
  if(empty($reg)){
    global $error_mes;
    $error_mes[$value]=err_message_1;
  }
}

//バリデーション関数（名前最大文字数チェック）
function validNameMaxLen($reg, $value){
  if(mb_strlen($reg)>256){
    global $error_mes;
    $error_mes[$value]=err_message_2;
  }
}

//バリデーション関数（パスワード最小文字数チェック）
function vaildpassMinLen($reg, $value) {
  if(mb_strlen($reg)<8){
      global $error_mes;
      $error_mes[$value] = err_message_3;
  }
}

//バリデーション関数（パスワード最大文字数チェック）
function vaildpassMaxLen($reg, $value) {
  if(mb_strlen($reg)>256){
      global $error_mes;
      $error_mes[$value] = err_message_4;
  }
}

//バリデーション関数（パスワード最小確認文字数チェック）
function vaildpass_re_MinLen($reg, $value) {
  if(mb_strlen($reg)<8){
      global $error_mes;
      $error_mes[$value] = err_message_3;
  }
}

//バリデーション関数（パスワード最大確認文字数チェック）
function vaildpass_re_MaxLen($reg, $value) {
  if(mb_strlen($reg)>256){
      global $error_mes;
      $error_mes[$value] = err_message_4;
  }
}

//バリデーション関数（E-mail形式チェック）
function validEmail($reg, $value) {
  if(mb_strlen($reg)>10){
      global $error_mes;
      $error_mes[$value] = err_message_5;
  }
}
?>