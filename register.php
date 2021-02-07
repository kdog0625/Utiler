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
          ニックネーム<span class='form-rule'>※10文字以内</span></br>
          <input type="text" name='name' value="<?php print(htmlspecialchars($_POST['name'],ENT_QUOTES));?>"/>
      </label>
      <div class="error_mes">
          <?php 
          if(!empty($reg['name'])) echo $reg['name'];
          ?>
      </div>
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
        パスワード(再入力)<span class='form-rule'>※英数字8文字以上</span></br>
        <input type="password" name='pass_re'  value="<?php print(htmlspecialchars($_POST['pass_re'],ENT_QUOTES));?>">
      </label>
      <div class="error_mes">
        <?php 
          if(!empty($reg['pass_re'])) echo $reg['pass_re'];
          ?>
      </div>
        <div class='button-container'>
          <input type="submit" value='登録する'>
        </div>
    </form>
  </div>
</div>