<?php
//共通変数・関数ファイルを読み込む
require('function.php');

//$_POSTが空でない場合にエラーチェックを走らせる。
if(!empty($_POST)){
  //変数にユーザー名を格納
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $pass_re = $_POST['pass_re'];

  ////未入力チェック
  validatenot($name,'name');
  validatenot($email,'email');
  validatenot($pass,'pass');
  validatenot($pass_re,'pass_re');

  if(empty($err_msg)) {
  //ニックネームの最大文字数チェック
  validNameMaxLen($name, 'name');
  //emailの形式チェック
  validEmail($email, 'email');
  //パスワードの最大文字数チェック
  vaildpassMaxLen($pass,'pass');
  //パスワードの最小文字数チェック
  vaildpassMinLen($pass,'pass');
  //パスワード再確認の最大文字数チェック
  vaildpass_re_MaxLen($pass_re,'pass_re');
  //パスワード再確認の最小文字数チェック
  vaildpass_re_MinLen($pass_re,'pass_re');
  print_r($error_mes);
  }
}
  require('head_info.php');
?>

<?php
  require('header.php');
?>

<div class='main-top'>
  <div class='form-register'>
    <h2><i class="fas fa-user-plus"></i>ユーザー登録</h2>
    <!-- form actionが空の場合は自分自身のページにジャンプさせる。 -->
    <form action="" method='post' class='form'>
      <label>
          ニックネーム</br>
          <input type="text" name='name' value="<?php print(htmlspecialchars($_POST['name'],ENT_QUOTES));?>"/>
      </label>
      <div class="error_mes">
          <?php 
          if(!empty($error_mes['name'])) echo $error_mes['name'];
          ?>
      </div>
      <label>
        メールアドレス</br>
        <input type="text" name='email' value="<?php print(htmlspecialchars($_POST['email'],ENT_QUOTES));?>">
      </label>
      <div class="error_mes">
          <?php 
          if(!empty($error_mes['email'])) echo $error_mes['email'];
          ?>
      </div>
      <label>
        パスワード<span class='form-rule'>※英数字8文字以上</span></br>
        <input type="password" name='pass' value="<?php print(htmlspecialchars($_POST['pass'],ENT_QUOTES));?>">
      </label>
      <div class="error_mes">
          <?php 
          if(!empty($error_mes['pass'])) echo $error_mes['pass'];
          ?>
      </div>
      <label>
        パスワード(再入力)<span class='form-rule'>※英数字8文字以上</span></br>
        <input type="password" name='pass_re'  value="<?php print(htmlspecialchars($_POST['pass_re'],ENT_QUOTES));?>">
      </label>
      <div class="error_mes">
        <?php 
          if(!empty($error_mes['pass_re'])) echo $error_mes['pass_re'];
          ?>
      </div>
        <div class='button-container'>
          <input type="submit" value='登録する'>
        </div>
    </form>
  </div>
</div>