<?php

define('message01', '入力必須です');


/**
 * PDOを使ってデータベースに接続する
 * @return PDO
 */
function getDatabaseConnection() {
    try
    {
        $database_handler = new PDO('mysql:dbname=utiler;host = 127.0.0.1;;port=8889;charset=utf8', 'root', 'root');
    }
    catch (PDOException $e)
    {
        echo "DB接続に失敗しました。<br />";
        echo $e->getMessage();
        exit;
    }
    return $database_handler;
}

// //=================================
// //エラーメッセージ格納用の配列
// //=================================

$err_msg = array();

function validateNot($str,$value){
    if(empty($str)) {
        global $err_msg;
        $err_msg[$value] = message01;
    }
}