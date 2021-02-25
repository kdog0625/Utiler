<?php
session_start();
require('../common/auth.php');
require('../common/validate.php');
require('../common/database.php');
require('../common/head_info.php');

  //post送信されていた場合
if(!empty($_POST)) {
  //バリデーションチェック
  $title = (isset($_POST['title'])) ? $_POST['title'] : '';
  $content = (isset($_POST['content'])) ? $_POST['content'] : '';
  // //最大文字数チェック
  // validMaxLen($comment, 'comment');
  // //未入力チェック
  // validNotEntered($comment, 'comment');

  if(empty($err_msg)) {
      //例外処理
      try {
          $user_id = getLoginUserId();
          //DB接続 
          $database_handler = getDatabaseConnection();
          // プリペアドステートメントで SQLをあらかじめ用意しておく。
          //VALUES (:user_id, :title, :content)とすることで変数の値を置き換えられる。
          $statement = $database_handler->prepare('INSERT INTO tweets (user_id, title, content) VALUES (:user_id, :title, :content)');
          //指定された変数名にパラメータをバインド(紐付け)
          $statement->bindParam(':title', $title);
          $statement->bindParam(':content', $content);
          $statement->bindParam(':user_id', $user_id);
          $statement->execute();

         
          $_SESSION['tweets'] = [
            'id' => $database_handler->lastInsertId(),
            'title' => $title,
            'content' => $content,
        ];
              header('Location:../tweets/community01.php'); //自分自身に遷移する
              exit();
      } catch(Exception $e) {
          error_log('エラー発生：'. $e->getMessage());
      }
  }
}
?>

<?php
require('../common/header.php');
?>

<?php
    if(!empty($_SESSION['user']['id'])) {
  ?>
<div class="main-top">
    <form action="" method='post' class='form review-form'>
      <div class='button-containers'>
        <div class="tweet-header">電気代について共有しましょう</div>
        <div class="tweet-body">
          <div class="tweet-tops">
            <label>
              <input type="text" name='title' placeholder="タイトル">
              <div class="error_mes">
              <?php 
              if(!empty($err_msg['pass'])) echo $err_msg['pass'];
              ?>
              </div>
            </label>
            <label>
              <textarea name="content"  cols="82" rows="10" class='review-textarea'></textarea>
              <div class="error_mes">
              <?php 
              if(!empty($err_msg['pass'])) echo $err_msg['pass'];
              ?>
              </div>
            </label>
            <div class='button-container'>
              <input type="submit" value='投稿する'>
            </div>
          </div>
        </div>
      </div>
    </form>
</div>
<?php
  }
?>
<?php 
 require('../common/footer.php');
?>  
