<?php
    require('../common/head_info.php');
    require('../common/database.php');
?>
<?php 
 require('../common/header.php');
?> 

<div class='main-top'>
  <div class='form-register'>
    <div class="form-register-list">
      <h2><i class="fas fa-user-plus"></i>ユーザー登録</h2>
      <form action="" method='post' class='form'>
        <p>
          <label>
            <input type="text" name='name' placeholder="ニックネーム">
          </label>
        </p>
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
        <p>
          <label>
            <input type="password" name='pass_re' placeholder="パスワード確認"></br>
            <span class='form-rule'>※英数字8文字以上</span>
          </label>
        </p>
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