<?php
/**
* ログインしているユーザーIDを取得する
* @return |null
*/
function getLoginUserId() {
   if (isset($_SESSION['user'])) {
       return $_SESSION['user']['id'];
   }

   return null;
}

