<?php
	
require('config.php'); 
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   //$data = htmlspecialchars($data);
   $data = str_replace(array("\r","\n"),"",$data);
   return $data;
}
  $title_set = isset($_POST['title']) ? $_POST['title'] : '';
  $content_set = isset($_POST['content']) ? $_POST['content'] : '';
  $id_set = isset($_POST['id']) ? $_POST['id'] : '';
 
  $title=test_input($title_set);
  $content=test_input($content_set);
  $id=test_input($id_set);

  echo 'POSLANEEEEEE IDEEEEEEEE' . $id_set;
 
  $sql = "UPDATE articles SET title='$title', content='$content' WHERE ID='$id'";  
  $result = mysqli_query($resultdb,$sql) or die("Unable to update article");
 
  /*header('Location: http://localhost/cmstest/pbl/admin/page-articles.php');*/ 
  mysqli_close($resultdb);
?>