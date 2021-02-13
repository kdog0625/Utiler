<?php
    require('head_info.php');
?>
<header>
  <div class='header-top'>
    <h1><a href="../tweets/index.php">Utiler</a></h1>
    <nav id='top-nav'>
      <ul>
        <?php
          if(empty($_SESSION['user_id'])) {
        ?>
          <li class=nav_register><a href='../users/register.php'><i class="fas fa-user-plus"></i>ユーザー登録</a></li>
          <li class="nav_login"><a href='../users/login.php'><i class="fas fa-sign-in-alt"></i>ログイン</a></li>
        <?php 
          }else{
        ?>
          <li class=nav_register><a href='../users/mypage.php'><i class="fas fa-user"></i>マイページ</a></li>
          <li class="nav_login"><a href='../users/logout.php'><i class="fas fa-sign-out-alt"></i>ログアウト</a></li>
        <?php
          }
        ?>
      </ul>
    </nav>
  </div>
</header>
<div class="header_bottom">
  <p class="header_bottom_title">
    光熱費に対する悩みを共有しましょう。
  </p>
</div>