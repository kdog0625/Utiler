<?php 
  require('../common/head_info.php');
  require('../common/database.php');
  require('../common/header.php');
?> 

<div class="main-top">
  <?php
    if(!empty($_SESSION['user_id'])) {
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
    </div>
  </div>
</div>


<?php 
 require('../common/footer.php');
?>  