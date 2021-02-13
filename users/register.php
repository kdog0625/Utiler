<?php
    require('../common/head_info.php');
?>
<?php
    require('../common/database.php');


//POST送信された場合
if(!empty($_POST)) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass = $_POST['pass'];
    $pass_re = $_POST['pass_re'];

    //未入力チェック
    validateNot($name,'name');
    validateNot($email,'email');
    validateNot($pass,'pass');
    validateNot($pass_re,'pass_re');

    print_r($err_msg);

    if(empty($err_msg)) {
      //ニックネームの最大文字数チェック
      validateNameMaxLen($name, 'name');

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
        $statement = $database_handler->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $password = password_hash($pass, PASSWORD_DEFAULT);

        $statement->bindParam(':name', htmlspecialchars($name));
        $statement->bindParam(':email', htmlspecialchars($email));
        $statement->bindParam(':password', $password);
        $statement->execute();
        header('Location:../tweets/index.php');
      }
    }
}
?>
  
<?php 
 require('../common/header.php');
?> 

<div class='main-top'>
  <div class='form-register'>
    <div class="form-register-list">
      <h2><i class="fas fa-user-plus"></i>ユーザー登録</h2>
      <form action="" method='post' class='form'>
          <label>
            <input type="text" name='name' placeholder="ニックネーム"  value="<?php print(htmlspecialchars($_POST['name'],ENT_QUOTES));?>">
            <div class="error_mes">
            <?php 
            if(!empty($err_msg['name'])) echo $err_msg['name'];
            ?>
            </div>
          </label>
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
            <input type="password" name='pass_re' placeholder="パスワード確認"  value="<?php print(htmlspecialchars($_POST['pass_re'],ENT_QUOTES));?>"></br>
            <div class="error_mes">
            <?php 
            if(!empty($err_msg['pass_re'])) echo $err_msg['pass_re'];
            ?>
            </div>
            <span class='form-rule'>※英数字8文字以上</span>
          </label>      
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