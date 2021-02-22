<?php
require('../common/function.php');

require('../common/database.php');
?>
<?php
require('../common/head_info.php');
$database_handler = getDatabaseConnection();
$tweets=$database_handler->query('SELECT * FROM tweets ORDER BY id DESC;');
$tweets->execute();
?>
<?php 
require('../common/header.php');
?> 

<div class="main-top">
  <?php
    if(!empty($_SESSION['user']['id'])) {
  ?>
  <div class="community-create">
    <div class="tweet-top">
      <a href="../tweets/community01_create.php">投稿する</a>
    </div>
  </div>
  <?php
    }
  ?>
  <div class="create-list">
    <div class="create-list-container">
      <div class="create-list-top">
        <p>
          電気代の共有一覧
        </p>
      </div>
      <div class="create-list-content">
        <?php foreach($tweets as $tweet): ?>
            <div class="title-list>"><?php print(mb_substr($tweet['content'],0,50)); ?></div>
            <time><?php echo($tweet['created_at']); ?></time>
            <hr>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>


<?php 
 require('../common/footer.php');
?>  