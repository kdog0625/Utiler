<?php

define('message01', '入力必須です');
define('message02', 'ニックネームは256文字以内で入力してください。');
define('message03', 'パスワードは256文字以内で入力してください。');
define('message04', 'パスワードは半角英数字8文字以上で入力してください。');

//================================
// ログ
//================================
//画面にエラーを表示させるか
// ini_set('display_errors', 'On');
//ログを取るか
ini_set('log_errors', 'On');
//ログの出力ファイルを指示
ini_set('error_log', 'php.log');
//セッションを使う
session_start();

// //=================================
// //エラーメッセージ格納用の配列
// //=================================

$err_msg = array();

//未入力チェック
function validateNot($str,$value){
    if(empty($str)) {
        global $err_msg;
        $err_msg[$value] = message01;
    }
}

//ニックネームの最大文字数チェック
function validateNameMaxLen($str,$value){
    //全角も半角も1文字として扱う
    if(mb_strlen($str)>256){
        global $err_msg;
        $err_msg[$value] = message02;
    }
}

//パスワードの最大文字数チェック
function validatePassMaxLen($str,$value){
    //全角も半角も1文字として扱う
    if(mb_strlen($str)>256){
        global $err_msg;
        $err_msg[$value] = message03;
    }
}

//パスワードの最小文字数チェック
function validatePassMinLen($str,$value){
    //全角も半角も1文字として扱う
    if(mb_strlen($str)<8){
        global $err_msg;
        $err_msg[$value] = message04;
    }
}
