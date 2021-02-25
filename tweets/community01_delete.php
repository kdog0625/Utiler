<?php
session_start();
require('../common/validate.php');

require('../common/database.php');
?>
<?php
require('../common/head_info.php');
$database_handler = getDatabaseConnection();
if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
  $id=$_REQUEST['id'];
  $tweets=$database_handler->prepare('DELETE FROM tweets WHERE id=?');
  $tweets->execute(array($id));
}
print_r($tweets);
header('Location:../tweets/community01.php'); //自分自身に遷移する
exit();
?>