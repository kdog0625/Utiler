<?php
session_start();
require('../common/validate.php');

require('../common/database.php');
?>
<?php
require('../common/head_info.php');
$database_handler = getDatabaseConnection();
  // 削除するreviewのidの特定
  $tweets=$database_handler->query('SELECT * FROM tweets WHERE id=?');
  $tweets->execute();
  $tweet= $tweets->fetch();
    $tweet = $database_handler->prepare('DELETE FROM tweets WHERE id=?');
    $tweet->execute(); 
print_r($tweets);
header('Location:../tweets/community01.php'); //自分自身に遷移する
exit();
?>