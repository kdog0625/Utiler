<?php
    
    require '../common/auth.php';

    if(isLogin()) {
        header('Location: ../tweets/index.php');
        exit;
    }
?>
<?php
require('../common/function.php');
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

        if (password_verify($pass, $user['password'])) {
            // ユーザー情報保持
            $_SESSION['user'] = [
                'name' => $name,
                'id' => $id
            ];

            // 更新日が最新のメモ情報保持
            if ($statement = $database_handler->prepare("SELECT id, title, content FROM memos WHERE user_id = :user_id ORDER BY updated_at DESC LIMIT 1")) {
                $statement->bindParam(":user_id", $id);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);

                if ($result) {
                    $_SESSION['select_tweets'] = [
                        'id' => $result['id'],
                        'title' => $result['title'],
                        'content' => $result['content']
                    ];
                }
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
            <input type="text" name='email' placeholder="メールアドレス" autocomplete="off">
            <div class="error_mes">
            <?php 
            if(!empty($err_msg['email'])) echo $err_msg['email'];
            ?>
            </div>
          </label>
          <label>
            <input type="password" name='pass' placeholder="パスワード"  autocomplete="off"></br>
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