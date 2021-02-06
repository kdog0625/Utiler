<?php
try{
  //new PDO(DBを扱う)でオブジェクトのインスタンスを作っている。
  $db = new PDO ('mysql:dbname=working_space;host=127.0.0.1;port=8889;charset=utf8', 'root', 'root');
  //接続できなければ$eという形で受け取り、それを画面に出力する。
} catch(PDOException $e){
  echo 'DB接続エラー:' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
</body>