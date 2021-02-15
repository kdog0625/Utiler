<?php
    require('../common/head_info.php');
?>
<?php
    require('../common/database.php');
?>

<?php
//POST送信された場合
if(!empty($_POST)) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass = $_POST['pass'];
    $pass_re = $_POST['pass_re'];

    //未入力チェック
    validateNot($name,'name');
    validateNot($email,'email');
    validateNot($pass,'pass');
    validateNot($pass_re,'pass_re');

    if(empty($err_msg)) {
      //ニックネームの最大文字数チェック
      validateNameMaxLen($name, 'name');

      //メールアドレスの重複チェック

      //メールアドレスの形式チェック

      //パスワードの最大文字数チェック
      validatePassMaxLen($pass,'pass');
      //パスワードの最小文字数チェック
      validatePassMinLen($pass,'pass');
      //パスワードの半角英数字チェック

      if(empty($err_msg)) {
        try {
          //DB接続 
          $database_handler = getDatabaseConnection();
          // プリペアドステートメントで SQLをあらかじめ用意しておく
          $statement = $database_handler->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
          $password = password_hash($pass, PASSWORD_DEFAULT);

          //指定された変数名にパラメータをバインド(紐付け)
          $statement->bindParam(':name', htmlspecialchars($name));
          $statement->bindParam(':email', htmlspecialchars($email));
          $statement->bindParam(':password', $password);
          $statement->execute();

          //クエリ成功の場合
          if($statement) {
            //ログイン有効期限（デフォルトを1時間とする）
            $sessionLimit = 60*60;
            //最終ログイン日時を現在日時に
            $_SESSION['login_date'] = time();
            $_SESSION['login_limit'] = $sessionLimit;
            //ユーザーIDを格納
            $_SESSION['user_id'] = $database_handler->lastInsertId();
          }
          header('Location:../tweets/index.php');
        }catch(Exception $e) {
          error_log('エラー発生：' . $e -> getMessage());
          $err_msg['common'] = MSG08;
        }
      }
    }
} 
?>
  
<?php 
 require('../common/header.php');
?> 

<div class='main-top'>
  <div class='form-register'>
    <div class="form-register-list">
      <h2><i class="fas fa-user-plus"></i>ユーザー登録</h2>
      <form action="" method='post' class='form'>
          <label>
            <input type="text" name='name' placeholder="ニックネーム"  value="<?php print(htmlspecialchars($_POST['name'],ENT_QUOTES));?>">
            <div class="error_mes">
            <?php 
            if(!empty($err_msg['name'])) echo $err_msg['name'];
            ?>
            </div>
          </label>
          <label>
            <input type="text" name='email' placeholder="メールアドレス" value="<?php print(htmlspecialchars($_POST['email'],ENT_QUOTES));?>">
            <div class="error_mes">
            <?php 
            if(!empty($err_msg['email'])) echo $err_msg['email'];
            ?>
            </div>
          </label>
          <label>
            <input type="password" name='pass' placeholder="パスワード"  value="<?php print(htmlspecialchars($_POST['pass'],ENT_QUOTES));?>"></br>
            <div class="error_mes">
            <?php 
            if(!empty($err_msg['pass'])) echo $err_msg['pass'];
            ?>
            </div>
            <span class='form-rule'>※英数字8文字以上</span>
          </label>
          <label>
            <input type="password" name='pass_re' placeholder="パスワード確認"  value="<?php print(htmlspecialchars($_POST['pass_re'],ENT_QUOTES));?>"></br>
            <div class="error_mes">
            <?php 
            if(!empty($err_msg['pass_re'])) echo $err_msg['pass_re'];
            ?>
            </div>
            <span class='form-rule'>※英数字8文字以上</span>
          </label>      
          <div class='button-container'>
            <input type="submit" value='登録する'>
          </div>
      </form>
    </div>
  </div>
</div>

<?php 
 require('../common/footer.php');
?>    