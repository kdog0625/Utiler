<html>
<head>
<title>working_space</title>
</head>
<body>
<?php 
 require('header.php');
?> 

<div class="main-top">
  <div class="main-container">
    <h2>
      <span>working_spaceは</span><br>
      光熱費について共有するサービスです。<br>
    </h2>
    <p class='main-explain'>
      1人暮らししてみたいけど光熱費どれくらいかかるんだろう<br>
      同棲、結婚する家族の場合、光熱費どれくらいかかるんだろう<br>
      自分の経験をもとに誰かの役に立つ貴重な情報源となるかもしれません。<br>
    </p>
    <p class='main-explain-2'>
        まずはユーザー登録して、投稿してみよう
    </p>
    <p class='main-register'>
        <a href='register.php' class='register-link'><i class="fas fa-user-plus"></i>ユーザー登録する</a>
    </p>
    <p class='main-explain-2'>
        ユーザー登録済みの方はログイン
    </p>
    <p class='main-login'>
        <a href='login.php' class='login-link'><i class="fas fa-sign-in-alt"></i>ログインする</a>
    </p>
  </div>
  <div class='main-pic-container'>

            <panel class='main-panel'>
                    <a href='community01.php'><img src="image/main_pic01.jpg" alt="" class='image'></a>
                <p class='costs'>
                    電気代
                </p>
            </panel>
            
            <panel class='main-panel'>
                    <a href='community02.php'><img src="image/main_pic02.jpg" alt=""class='image'></a>
                <p class='costs'>
                    ガス代
                </p>
            </panel>

            <panel class='main-panel'>
                    <a href='community03.php'><img src="image/main_pic03.jpg" alt=""class='image'></a>
                <p class='costs'>
                    水道代
                </p>
            </panel>
        </div>  
</div>
</body>
</html>