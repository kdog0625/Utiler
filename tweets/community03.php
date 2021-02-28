<?php
session_start();
require('../common/validate.php');
require('../common/database.php');
require('../common/head_info.php');
$database_handler = getDatabaseConnection();
$tweets=$database_handler->prepare('SELECT * FROM tweets ORDER BY id DESC;');
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
      <a href="../tweets/community03_create.php">投稿する</a>
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
      <?php 
        if(!empty($tweets)){
      ?>
          <ul class="create-list-content">
            <?php foreach($tweets as $tweet): ?>
              <li class="list-menu">
                <div class="title-list">
                  <p><a href="community03_show.php?id=<?php echo($tweet['id']);?>"><?php print(mb_substr($tweet['title'],0,50)); ?></a></p>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
      <?php 
        }else{
      ?>
          <p style="text-align:center;line-height:20;">投稿はまだありません</p>
      <?php
        } 
      ?>
      
    </div>
  </div>
</div>


<?php 
 require('../common/footer.php');
?>  