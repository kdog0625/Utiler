<?php
    require('../common/head_info.php');
?>
<?php
    require('../common/database.php');

    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass = $_POST['pass'];
    $pass_re = $_POST['pass_re'];


    $database_handler = getDatabaseConnection();
    $statement = $database_handler->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
    $password = password_hash($pass, PASSWORD_DEFAULT);

    $statement->bindParam(':name', htmlspecialchars($name));
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
    $statement->execute();

//     //POST送信された場合
// if(!empty($_POST)) {

//   debug('POSTの中身:'.print_r($_POST, true));
  
//   $statement = $db->prepare('INSERT INTO users SET email=?, password=?, name=?, created=NOW()');
//   $statement->execute(array(
//     $_SESSION['name'],
//     $_SESSION['email'],
//     sha1($_SESSION['password'])
//   ));      
//   header('Location: ../tweets/index.php');
//   exit();
// }
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
            <input type="text" name='name' placeholder="ニックネーム"  value="<?php print(htmlspecialchars($_POST['name'],ENT_QUOTES));?>">
          </label>
        </p>
        <p>
          <label>
            <input type="text" name='email' placeholder="メールアドレス" value="<?php print(htmlspecialchars($_POST['email'],ENT_QUOTES));?>">
          </label>
        </p>
        <p>
          <label>
            <input type="password" name='pass' placeholder="パスワード"  value="<?php print(htmlspecialchars($_POST['pass'],ENT_QUOTES));?>"></br>
            <span class='form-rule'>※英数字8文字以上</span>
          </label>
        </p>
        <p>
          <label>
            <input type="password" name='pass_re' placeholder="パスワード確認"  value="<?php print(htmlspecialchars($_POST['pass_re'],ENT_QUOTES));?>"></br>
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