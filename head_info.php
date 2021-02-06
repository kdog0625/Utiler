<?php
try{
  //new PDO(DBを扱う)でオブジェクトのインスタンスを作っている。
  $db = new PDO ('mysql:dbname=working_space;host=127.0.0.1;port=8889;charset=utf8', 'root', 'root');
  //接続できなければ$eという形で受け取り、それを画面に出力する。
}catch(PDOException $e){
  echo 'DB接続エラー:' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/header.css">
</head>
