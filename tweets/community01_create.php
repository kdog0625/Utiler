<?php 
  require('../common/head_info.php');
  require('../common/database.php');
?>

<?php
  //post送信されていた場合
if(!empty($_POST)) {
  debug('POST送信があります。');
  debug('POSTの中身：'.print_r($_POST, true));

  //バリデーションチェック
  $title = (isset($_POST['title'])) ? $_POST['title'] : '';
  $content = (isset($_POST['content'])) ? $_POST['content'] : '';

  //最大文字数チェック
  validMaxLen($comment, 'comment');
  //未入力チェック
  validNotEntered($comment, 'comment');

  if(empty($err_msg)) {
      debug('バリデーションOKです。');

      //例外処理
      try {
          //DB接続 
          $database_handler = getDatabaseConnection();
          // プリペアドステートメントで SQLをあらかじめ用意しておく
          $statement = $database_handler->prepare('INSERT INTO tweets (title, content) VALUES (:title, :content)');
          //指定された変数名にパラメータをバインド(紐付け)
          $statement->bindParam(':title', htmlspecialchars($name));
          $statement->bindParam(':content', htmlspecialchars($email));
          $statement->execute();


          //クエリ成功の場合
          if($statement) {
              $_POST = array(); //postをクリア
              debug('口コミ投稿ページへ遷移します。');
              header('Location:../tweets/community01.php'); //自分自身に遷移する
              exit();
          }

      } catch(Exception $e) {
          error_log('エラー発生：'. $e->getMessage());
          $err_msg['common'] = MSG08;
      }
  }
}
debug('画面表示処理終了 <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<');
?>

<?php
require('../common/header.php');
?>
<div class="main-top">
    <form action="" method='post' class='form review-form'>
      <div class='button-containers'>
        <div class="tweet-header">電気代について共有しましょう</div>
        <div class="tweet-body">
          <div class="tweet-tops">
            <label>
              <input type="text" name='title' placeholder="タイトル"  value="<?php print(htmlspecialchars($_POST['title'],ENT_QUOTES));?>"></br>
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
 require('../common/footer.php');
?>  