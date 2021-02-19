<?php 
  require('../common/head_info.php');
  require('../common/database.php');
  require('../common/header.php');
?> 

<div class="main-top">
  <div class="community-create">
    <div class="tweet-top">
    <form action="" method='post' class='form review-form'>
      <div class='button-container'>
        <textarea name="message" cols="50" rows="5"></textarea>
          <input type="submit" value='投稿する'>
      </div>
    </form>
    </div>
  </div>
</div>

<?php 
 require('../common/footer.php');
?>  