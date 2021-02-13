<?php
    require('../common/head_info.php');
?>
<?php 
  require('../common/database.php');

//POST送信された場合
if(!empty($_POST)) {
  $email=$_POST['email'];
  $pass = $_POST['pass'];

  //未入力チェック
  validateNot($email,'email');
  validateNot($pass,'pass');

  print_r($err_msg);

  if(empty($err_msg[$value])) {

  $database_handler = getDatabaseConnection();
  // プリペアドステートメントで SQLをあらかじめ用意しておく
  $statement = $database_handler->prepare('SELECT * FROM users');

  $statement->bindParam(':email', htmlspecialchars($email));
  $statement->bindParam(':password', $password);
  $statement->execute();
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
            <input type="text" name='email' placeholder="メールアドレス"  value="<?php print(htmlspecialchars($_POST['email'],ENT_QUOTES));?>">
            <div class="error_mes">
            <?php 
            if(!empty($err_msg['email'])) echo $err_msg['email'];
            ?>
            </div>
          </label>
          <label>
            <input type="password" name='pass' placeholder="パスワード"   value="<?php print(htmlspecialchars($_POST['pass'],ENT_QUOTES));?>"></br>
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