<?php
session_start();
require('../common/auth.php');
require('../common/validate.php');
require('../common/database.php');
?>
<?php
require('../common/head_info.php');
$user_id = getLoginUserId();
$database_handler = getDatabaseConnection();
if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
  $id=$_REQUEST['id'];
  $tweets=$database_handler->prepare('DELETE FROM tweets WHERE id=?');
  $tweets->execute(array($id));
}
header('Location:../tweets/community02.php'); //自分自身に遷移する
exit();
?>