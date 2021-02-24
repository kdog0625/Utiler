<?php
/**
 * PDOを使ってデータベースに接続する
 * @return PDO
 */
function getDatabaseConnection() {
    try
    {
        $database_handler = new PDO('mysql:dbname=utiler;host = 127.0.0.1;port=8889;charset=utf8', 'root', 'root');
        //PDO::ERRMODE_EXCEPTIONの値を設定することでエラーが発生したときに、PDOExceptionの例外を投げるように設定。
        // $database_handler->setAttribute(setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING));
    }
    catch (PDOException $e)
    {
        echo "DB接続に失敗しました。<br />";
        echo $e->getMessage();
        exit;
    }
    return $database_handler;
}

