<?php
    require('../common/head_info.php');
    require('../common/database.php');
?>
<?php 
 require('../common/header.php');
?> 

<?php
print_r($_SESSION);
?>
<div class="main-top">
  <div class='main-pic-container'>
    <panel class='main-panel'>
      <a href='../tweets/community01.php'><img src="../public/images/main_pic01.jpg" alt="" class='image'></a>
        <p class='costs'>
          電気代
        </p>
    </panel>          
    <panel class='main-panel'>
      <a href='../tweets/community02.php'><img src="../public/images/main_pic02.jpg" alt=""class='image'></a>
        <p class='costs'>
          ガス代
        </p>
    </panel>

    <panel class='main-panel'>
      <a href='../tweets/community03.php'><img src="../public/images/main_pic03.jpg" alt=""class='image'></a>
        <p class='costs'>
          水道代
        </p>
    </panel>
  </div>  
</div>

<?php 
 require('../common/footer.php');
?>   