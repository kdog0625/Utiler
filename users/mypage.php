<?php
session_start();
require('../common/auth.php');
require('../common/validate.php');
require('../common/database.php');
require('../common/head_info.php');

$database_handler = getDatabaseConnection();
//SESSIONにidやtimeが保存されてた場合
if(isset($_SESSION['user'])){
  // DBのusersテーブルからidを取得し、どのユーザーがログインしているかSESSIONで受け取る
  $users = $database_handler->prepare('SELECT * FROM users WHERE id=?');
  // $u_id = $_SESSION['user']['id'];
  $users->execute(array($_SESSION['user']['id']));
  $user = $users->fetch();
  $tweets = $database_handler->prepare('SELECT * FROM tweets LEFT JOIN users ON tweets.user_id = users.id WHERE tweets.user_id = users.id ');

  // $tweets=$database_handler->prepare('SELECT t.id, t.name, t.content, u.* FROM tweets t, user u WHERE t.user_id=u.id AND tweets.id=? ORDER BY t.created_at DESC');
  $tweets->execute();
  $tweet=$tweets->fetch();
  print_r($tweet);
  // //エラーデバックコード
  // var_dump($id);
  // var_dump($db->errorInfo()); 
  
}
else{
  header('Location: ../users/login.php');
  exit();
}
?>

<?php 
require('../common/header.php');
?> 

<div class="main-top">
  <p> 
    <p>ようこそ、<?php print(htmlspecialchars($user['name'] ,ENT_QUOTES)); ?>さん</p>
  </p>
</div>