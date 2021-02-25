<?php
require('../common/auth.php');

require('../common/validate.php');

require('../common/database.php');
?>
<?php
require('../common/head_info.php');
$user_id = getLoginUserId();
$database_handler = getDatabaseConnection();
if(isset($_REQUEST['id'])&& is_numeric($_REQUEST['id'])){
  $id=$_REQUEST['id'];

  $tweets=$database_handler->prepare('SELECT * FROM tweets WHERE id=:user_id');
  $tweets->execute();
  $tweet=$tweets->fetch();
}
?>
<?php 
//formaction属性は、フォームデータ送信先URLを指定する属性

require('../common/header.php');
?> 

<div class="main-top">
<form action="community01_update.php" method="post">
  <!-- 以下の記述でデータを編集画面に渡す。 -->
  <input type="hidden" name="id" value="<?php print($id);?>">
  <input type="text" name='title' placeholder="タイトル">
  <textarea name="content" cols="50" rows="10"></textarea><br>
  <button type="submit">登録する</button>
</form>
</div>