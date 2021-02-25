<?php
session_start();
require('../common/auth.php');
require('../common/validate.php');
require('../common/database.php');
require('../common/head_info.php');
$user_id = getLoginUserId();
$database_handler = getDatabaseConnection();
$tweets=$database_handler->prepare('SELECT * FROM tweets;');
$users=$database_handler->prepare('SELECT * FROM users;');
$tweets->execute();
$tweet = $tweets->fetch();
?>
<?php 
require('../common/header.php');
?> 

<div class="main-top">
  <div class="community-show">
  <article>
  <h1 class="item-name"><?php print($tweet['title']);?></h1>

  <div class="item-main-content"><?php print($tweet['content']);?></div>
  <?php
    if($tweet['user_id']==$users['id']) {
  ?>
    <a href="community01_edit.php?id=<?php print($tweet['id']);?>">編集する</a>
    <a href="community01_delete.php?id=<?php print($tweet['id']);?>">削除する</a>
    <button type="submit" class="btn btn-danger" formaction="./tweets/community01_delete.php"><i class="fas fa-trash-alt"></i></button>
  <?php
    }
  ?>
</article>
  </div>
</div>

