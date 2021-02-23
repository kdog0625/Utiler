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
<form action="" method="post">
  <!-- 以下の記述でデータを編集画面に渡す。 -->
  <input type="hidden" name="id" value="<?php print($tweet['id']);?>">
  <input type="text" name='title' placeholder="タイトル" value="<?php print($tweet['content']);?>">
  <textarea name="content" cols="50" rows="10"><?php print($tweet['content']);?></textarea><br>
  <button type="submit">登録する</button>
</form>
</div>