<?php
    require('../common/head_info.php');
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
        <p>
          <label>
            <input type="text" name='email' placeholder="メールアドレス">
          </label>
        </p>
        <p>
          <label>
            <input type="password" name='pass' placeholder="パスワード"></br>
            <span class='form-rule'>※英数字8文字以上</span>
          </label>
        </p>
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