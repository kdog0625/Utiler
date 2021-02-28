<?php
session_start();
require('../common/auth.php');
require('../common/validate.php');
require('../common/database.php');
require('../common/head_info.php');
$user_id = getLoginUserId();
$database_handler = getDatabaseConnection();
$id=$_REQUEST['id'];
print_r($id);
if(!is_numeric($id) || $id<=0){
  print('1以上の数字で指定してください');
  exit();
  }
$tweets=$database_handler->prepare('SELECT * FROM tweets  WHERE id=?');
$tweets->execute(array($_REQUEST['id']));
$tweet = $tweets->fetch();
?>
<?php 
require('../common/header.php');
?> 

<div class="main-top">
  <div class="community-show">
  <article>
  <h1 class="item-name"><?php print($tweet['title']);?></h1>
  <?php
    if($tweet['user_id']==$user_id) {
  ?>
  <div class="item-main-content"><?php print($tweet['content']);?></div>
    <a href="community03_edit.php?id=<?php print($tweet['id']);?>">編集する</a>
    <a href="community03_delete.php?id=<?php print($tweet['id']);?>">削除する</a>
  <?php 
    }
  ?>    
</article>
  </div>
</div>

