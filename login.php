<?php
    require('head_info.php');
?>

<?php 
 require('header.php');
?> 
<div id=contents class='main-top'>
  <div class='form-container'>
    <h2><i class="fas fa-sign-in-alt"></i>ログイン</h2>
      <section class='guestuser'>
          ゲストユーザーの方は以下のメールアドレス・パスワードを使用してください。
          <p><i class="far fa-envelope"></i>メールアドレス：guest@mail.com</p>
          <p><i class="fas fa-unlock-alt"></i>パスワード：guestuser</p>
      </section>

      <form action="" method='post' class='form'>
        <label>
            メールアドレス
            <input type="text" name='email'>
        </label>
          <label>
              パスワード
              <input type="password" name='pass'>
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
