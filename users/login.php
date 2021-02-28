<?php
session_start();
require('../common/validate.php');
require('../common/database.php');
require('../common/head_info.php');
?>


<?php 
//POST送信された場合
if(!empty($_POST)) {
  $email=$_POST['email'];
  $pass = $_POST['pass'];

  //未入力チェック
  validateNot($email,'email');
  validateNot($pass,'pass');

  if(empty($err_msg)) {

    //メールアドレスの重複チェック

    //メールアドレスの形式チェック

    //パスワードの最大文字数チェック
    validatePassMaxLen($pass,'pass');
    //パスワードの最小文字数チェック
    validatePassMinLen($pass,'pass');
    //パスワードの半角英数字チェック

    if(empty($err_msg)) {

      $database_handler = getDatabaseConnection();
      // プリペアドステートメントで SQLをあらかじめ用意しておく
      if ($statement = $database_handler->prepare('SELECT id, name, password FROM users WHERE email = :email')) {
          $statement->bindParam(':email', $email);
          $statement->execute();
          //クエリ結果の値を取得
          $user = $statement->fetch();
         
          if (!$user) {
              $_SESSION['errors'] = [
                  'メールアドレスまたはパスワードが間違っています。'
              ];
              header('Location: ../users/login.php');
              exit;
          }

        $name = $user['name'];
        $id = $user['id'];
        //password_verifyはパスワードがハッシュにマッチするかどうかを調べる
        if (!empty($user) && password_verify($pass, $user['password'])) {
            // ユーザー情報保持
            $_SESSION['user'] = [
                'id' => $id,
                'name' => $name,
            ];
        }
            header('Location: ../tweets/index.php');
            exit;
      } else {
            $_SESSION['errors'] = [
                'メールアドレスまたはパスワードが間違っています。'
            ];
            header('Location: ../users/login.php');
            exit;
        }
      }
    }
  }
?> 

<?php
require('../common/header.php');
?>

<div class='main-top'>
  <div class='form-login'>
    <div class="form-login-list">
      <h2><i class="fas fa-sign-in-alt"></i>ログイン</h2>
      <section class='guestuser'>
        ゲストユーザー用
        <p><i class="far fa-envelope"></i>メールアドレス：guest@mail.com</p>
        <p><i class="fas fa-unlock-alt"></i>パスワード：guestuser</p>
      </section>

      <form action="" method='post' class='form'>
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
            <input type="checkbox" name='pass_save'>次回ログインを省略する
          </label>
        <div class='button-container'>
          <input type="submit" value='ログインする'>
        </div>
      </form>
    </div>    
  </div>
</div> 
    
<?php 
 require('../common/footer.php');
?>    