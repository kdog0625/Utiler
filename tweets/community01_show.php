<?php
require('../common/function.php');

require('../common/database.php');
?>
<?php
require('../common/head_info.php');
$database_handler = getDatabaseConnection();
$tweets=$database_handler->query('SELECT * FROM tweets ORDER BY id DESC;');
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
    if(!empty($_SESSION['user']['id'])) {
  ?>
    <a href="community01_edit.php?id=<?php print($tweet['id']);?>">編集する</a>
    <a href="community01_update.php?id=<?php print($tweet['id']);?>">削除する</a>
  <?php
    }
  ?>
</article>
  </div>
</div>

