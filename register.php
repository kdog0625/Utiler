<?php
if(!empty($_POST)){
  if($_POST['name']===''){
    $error['name']='blank';
  }
  if($_POST['email']===''){
    $error['email']='blank';
  }
  if($_POST['password']===''){
    $error['password']='blank';
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
          ニックネーム<span class='form-rule'>※10文字以内</span>
          <input type="text" name='name'>
          <?php if($error['name']==='blank'):?>
          <p class="error">※ニックネームを入力してください</p>
          <?php endif; ?>
      </label>
        </br>
      <label>
        メールアドレス
        <input type="text" name='email'>
        <?php if($error['email']==='blank'):?>
          <p class="error">※メールアドレスを入力してください</p>
        <?php endif; ?>
      </label>
        </br>
      <label>
        パスワード<span class='form-rule'>※英数字8文字以上</span>
        <input type="password" name='pass'>
        <?php if($error['password']==='blank'):?>
        <p class="error">※パスワードを入力してください</p>
        <?php endif; ?>
      </label>
        </br>
      <label>
        パスワード(再入力)<span class='form-rule'>※英数字8文字以上</span>
        <input type="password" name='pass_re'>
        <div class='button-container'>
          <input type="submit" value='登録する'>
        </div>
      </label>
    </form>
  </div>
</div>