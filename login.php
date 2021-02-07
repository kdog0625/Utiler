<?php
//共通変数・関数ファイルを読み込む
require('function.php');

//$_POSTが空でない場合にエラーチェックを走らせる。
if(!empty($_POST)){
  //変数にユーザー名を格納
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  ////未入力チェック
  validatenot($email,'email');
  validatenot($pass,'pass');
}

require('head_info.php');
?>

<?php 
 require('header.php');
?> 
<div class='main-top'>
  <div class='form-login'>
    <h2><i class="fas fa-sign-in-alt"></i>ログイン</h2>
      <section class='guestuser'>
          ゲストユーザーの方は以下のメールアドレス・パスワードを使用してください。
          <p><i class="far fa-envelope"></i>メールアドレス：guest@mail.com</p>
          <p><i class="fas fa-unlock-alt"></i>パスワード：guestuser</p>
      </section>

      <form action="" method='post' class='form'>
        <label>
            メールアドレス</br>
            <input type="text" name='email' value="<?php print(htmlspecialchars($_POST['email'],ENT_QUOTES));?>">
        </label>
        <div class="error_mes">
          <?php 
          if(!empty($reg['email'])) echo $reg['email'];
          ?>
        </div>
          <label>
          パスワード<span class='form-rule'>※英数字8文字以上</span></br>
          <input type="password" name='pass' value="<?php print(htmlspecialchars($_POST['pass'],ENT_QUOTES));?>">
          </label>
        <div class="error_mes">
          <?php 
          if(!empty($reg['pass'])) echo $reg['pass'];
        ?>
          </div>
          <label>
              <input type="checkbox" name='pass_save'>次回ログインを省略する
          </label>

          <div class='button-container'>
              <input type="submit" value='ログインする'>
          </div>

      </form>

        </div>

    </div>
