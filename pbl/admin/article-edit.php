<?php 

require('scripts/config.php'); 

$edit = isset($_GET['edit']) ? $_GET['edit'] : '';

$sql_edit = "SELECT * FROM articles WHERE id = '$edit'" or die ("Unable to join tables!");
$result_edit = mysqli_query($resultdb,$sql_edit) or die ("Unable to get data for editation!");

while($row = mysqli_fetch_array($result_edit)){ 

	$id = $row['ID'];  	
	$title = $row['title'];	
	$content = $row['content'];      
		
}

if (isset($_POST['submit'])){
require('scripts/config.php'); 
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

  $sql = "UPDATE articles SET title='$title', content='$content' WHERE ID='$id'";  
  $result = mysqli_query($resultdb,$sql) or die("Unable to update article");
 
  header('Location: http://localhost/cmstest/pbl/admin/page-articles.php'); 
  mysqli_close($resultdb);


}

?>

<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Upravit/pridat clanok k podsluzbe 1,2 alebo 3?</h1>
	<form method="POST" action="">
		<div class="form-basic" id="form">
			<div class="form-group">
				<label>Titulek:</label>
				<input type="text" class="form-ctrl" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
				<input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?> />
			</div>
			<div class="form-group">
				<label>Obsah:</label>
				<input type="text" class="form-ctrl" <?php echo 'value="'.$content .'"'; ?> name="content" id="title">
			</div>
			<div class="form-group">
				<label>Attachment:</label>
				<input type="file" name="fileToUpload" id="fileToUpload">
			</div>
			<button class="btn btn-submit" id="btn" data-id="about" name="submit" >Save</button>
		  </div>
	  </form>

</div>
</body>
</html>