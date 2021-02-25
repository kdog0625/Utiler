<pre>
   <?php
   require('../common/database.php');

   
   $statement=$db->prepare('UPDATE tweets SET tweet=? WHERE id=?');
   $statement->execute(array($_POST['tweet'],$_POST['id']));
   ?>
</pre>
<p>メモの内容を変更しました</p>
<p><a href="./tweets/community01.php">戻る</a></p>